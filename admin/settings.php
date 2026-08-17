<?php
require_once __DIR__ . '/../includes/auth.php';
requireAdminRole('super_admin');
$admin = getCurrentAdmin();
$msg = ''; $msgType = 'success';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // SQLite-compatible: INSERT OR REPLACE
        $stmt = null;
        foreach ($_POST['settings'] as $key => $value) {
            dbQuery(
                "INSERT OR REPLACE INTO settings (setting_key, setting_value) VALUES (?, ?)",
                [$key, trim($value)]
            );
        }
        // Handle logo upload
        if (!empty($_FILES['site_logo']['tmp_name'])) {
            $mime = mime_content_type($_FILES['site_logo']['tmp_name']);
            if (in_array($mime, ['image/jpeg','image/png','image/webp','image/gif'])) {
                $ext = pathinfo($_FILES['site_logo']['name'], PATHINFO_EXTENSION);
                $fn  = 'logo.' . $ext;
                $path = ROOT_PATH . '/assets/images/' . $fn;
                if (move_uploaded_file($_FILES['site_logo']['tmp_name'], $path)) {
                    // Compress
                    if (function_exists('imagecreatefrompng') && $mime === 'image/png') {
                        $img = imagecreatefrompng($path);
                        $nw = 300; $nh = 300;
                        $new = imagecreatetruecolor($nw, $nh);
                        imagealphablending($new, false); imagesavealpha($new, true);
                        $trans = imagecolorallocatealpha($new, 0, 0, 0, 127);
                        imagefilledrectangle($new, 0, 0, $nw, $nh, $trans);
                        imagecopyresampled($new, $img, 0, 0, 0, 0, $nw, $nh, imagesx($img), imagesy($img));
                        imagepng($new, $path, 7);
                        imagedestroy($img); imagedestroy($new);
                    }
                    dbQuery("INSERT OR REPLACE INTO settings (setting_key, setting_value) VALUES (?, ?)", ['site_logo', 'assets/images/' . $fn]);
                    dbQuery("INSERT OR REPLACE INTO settings (setting_key, setting_value) VALUES (?, ?)", ['site_favicon', 'assets/images/' . $fn]);
                    // Also update footer logo
                    copy($path, ROOT_PATH . '/assets/images/footer-logo.png');
                }
            }
        }
        logAdminActivity('settings_updated', 'Updated site settings');
        $msg = '✅ Settings saved successfully!';
    } catch (Exception $e) {
        $msg = '❌ Error: ' . $e->getMessage(); $msgType = 'danger';
    }
}

$allSettings = dbFetchAll("SELECT * FROM settings");
$s = [];
foreach ($allSettings as $row) $s[$row['setting_key']] = $row['setting_value'];
$siteLogo = $s['site_logo'] ?? 'assets/images/logo.png';

$pageTitle = 'Site Settings';
include __DIR__ . '/includes/admin-header.php';
?>

<?php if ($msg): ?>
<div class="alert alert-<?php echo $msgType; ?> alert-dismissible fade show"><?php echo $msg; ?> <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
<?php endif; ?>

<form method="POST" enctype="multipart/form-data">
<div class="row g-4">

    <!-- General Settings -->
    <div class="col-lg-6">
        <div class="admin-card">
            <div class="admin-card-header"><h5><i class="fas fa-globe"></i> General Settings</h5></div>
            <div class="admin-card-body">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Site Name (English)</label>
                    <input type="text" name="settings[site_name]" class="form-control" value="<?php echo e($s['site_name'] ?? 'AyodhyaRamMandir.in'); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Site Name (Hindi)</label>
                    <input type="text" name="settings[site_name_hi]" class="form-control" value="<?php echo e($s['site_name_hi'] ?? 'अयोध्या राम मंदिर'); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tagline (English)</label>
                    <input type="text" name="settings[site_tagline]" class="form-control" value="<?php echo e($s['site_tagline'] ?? ''); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tagline (Hindi)</label>
                    <input type="text" name="settings[site_tagline_hi]" class="form-control" value="<?php echo e($s['site_tagline_hi'] ?? ''); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Site Logo <small class="text-muted">(PNG/JPG, max 2MB)</small></label>
                    <input type="file" name="site_logo" class="form-control" accept="image/*" onchange="previewLogo(this)">
                    <div class="mt-2" id="logoPreview">
                        <img src="<?php echo SITE_URL . '/' . $siteLogo; ?>?<?php echo time(); ?>" style="height:60px;object-fit:contain;border:1px solid #eee;border-radius:8px;padding:4px;background:#fff" onerror="this.style.display='none'">
                        <small class="d-block text-muted mt-1">Current logo</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Settings -->
    <div class="col-lg-6">
        <div class="admin-card">
            <div class="admin-card-header"><h5><i class="fas fa-phone"></i> Contact Information</h5></div>
            <div class="admin-card-body">
                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="settings[site_email]" class="form-control" value="<?php echo e($s['site_email'] ?? ''); ?>" placeholder="info@ayodhyarammandir.in">
                </div>
                <div class="mb-3">
                    <label class="form-label">WhatsApp Number <small class="text-muted">(with country code, no +)</small></label>
                    <input type="text" name="settings[contact_whatsapp]" class="form-control" value="<?php echo e($s['contact_whatsapp'] ?? ''); ?>" placeholder="917988145192">
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="text" name="settings[contact_phone]" class="form-control" value="<?php echo e($s['contact_phone'] ?? ''); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <textarea name="settings[site_address]" class="form-control" rows="2"><?php echo e($s['site_address'] ?? ''); ?></textarea>
                </div>
            </div>
        </div>
    </div>

    <!-- Social Media -->
    <div class="col-lg-6">
        <div class="admin-card">
            <div class="admin-card-header"><h5><i class="fas fa-share-alt"></i> Social Media Links</h5></div>
            <div class="admin-card-body">
                <?php $socials = ['social_facebook'=>['Facebook','fab fa-facebook'],'social_instagram'=>['Instagram','fab fa-instagram'],'social_youtube'=>['YouTube','fab fa-youtube'],'social_twitter'=>['Twitter/X','fab fa-twitter'],'social_whatsapp'=>['WhatsApp Channel','fab fa-whatsapp']]; ?>
                <?php foreach ($socials as $key => [$label, $icon]): ?>
                <div class="mb-3">
                    <label class="form-label"><i class="<?php echo $icon; ?> me-2"></i><?php echo $label; ?></label>
                    <input type="url" name="settings[<?php echo $key; ?>]" class="form-control" value="<?php echo e($s[$key] ?? ''); ?>" placeholder="https://">
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- SEO Settings -->
    <div class="col-lg-6">
        <div class="admin-card">
            <div class="admin-card-header"><h5><i class="fas fa-search"></i> SEO Settings</h5></div>
            <div class="admin-card-body">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Default SEO Title</label>
                    <input type="text" name="settings[seo_default_title]" class="form-control" value="<?php echo e($s['seo_default_title'] ?? 'Ayodhya Ram Mandir - Complete Guide | AyodhyaRamMandir.in'); ?>" maxlength="60">
                    <small class="text-muted">Max 60 characters</small>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Default Meta Description</label>
                    <textarea name="settings[seo_default_description]" class="form-control" rows="3" maxlength="160"><?php echo e($s['seo_default_description'] ?? ''); ?></textarea>
                    <small class="text-muted">Max 160 characters</small>
                </div>
                <div class="mb-3">
                    <label class="form-label">Default Keywords</label>
                    <input type="text" name="settings[seo_default_keywords]" class="form-control" value="<?php echo e($s['seo_default_keywords'] ?? 'ram mandir, ayodhya, ram lalla'); ?>">
                </div>
            </div>
        </div>
    </div>

    <!-- AdSense -->
    <div class="col-lg-6">
        <div class="admin-card">
            <div class="admin-card-header"><h5><i class="fas fa-dollar-sign"></i> Google AdSense</h5></div>
            <div class="admin-card-body">
                <div class="mb-3">
                    <label class="form-label fw-semibold">AdSense Client ID</label>
                    <input type="text" name="settings[adsense_client]" class="form-control" value="<?php echo e($s['adsense_client'] ?? ''); ?>" placeholder="ca-pub-XXXXXXXXXXXXXXXX">
                </div>
                <div class="mb-3">
                    <label class="form-label">Header Ad Slot</label>
                    <input type="text" name="settings[adsense_header_slot]" class="form-control" value="<?php echo e($s['adsense_header_slot'] ?? ''); ?>" placeholder="1234567890">
                </div>
                <div class="mb-3">
                    <label class="form-label">Footer Ad Slot</label>
                    <input type="text" name="settings[adsense_footer_slot]" class="form-control" value="<?php echo e($s['adsense_footer_slot'] ?? ''); ?>" placeholder="1234567890">
                </div>
                <div class="mb-3">
                    <label class="form-label">Google Analytics ID</label>
                    <input type="text" name="settings[google_analytics]" class="form-control" value="<?php echo e($s['google_analytics'] ?? ''); ?>" placeholder="G-XXXXXXXXXX">
                </div>
            </div>
        </div>
    </div>

    <!-- Hostinger / MySQL Guide -->
    <div class="col-lg-6">
        <div class="admin-card">
            <div class="admin-card-header"><h5><i class="fas fa-server"></i> Hostinger MySQL Setup</h5></div>
            <div class="admin-card-body" style="font-size:13px">
                <div class="alert alert-info mb-3">Edit <code>config/database.php</code> on Hostinger:</div>
                <pre style="background:#1a1a2e;color:#fff;border-radius:8px;padding:14px;font-size:12px">define('DB_HOST', 'localhost');
define('DB_NAME', 'your_db_name');
define('DB_USER', 'your_db_user');
define('DB_PASS', 'your_db_pass');
define('DEMO_MODE', false); // ← false!</pre>
                <p class="mt-2 mb-0">Then open your site URL — tables auto-create on first visit.</p>
            </div>
        </div>
    </div>

</div>

<div class="text-center mt-3 mb-4">
    <button type="submit" class="btn btn-lg px-5" style="background:#F55900;color:#fff;font-weight:700;border-radius:12px">
        <i class="fas fa-save me-2"></i> Save All Settings
    </button>
</div>
</form>

<script>
function previewLogo(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById('logoPreview').innerHTML =
                `<img src="${e.target.result}" style="height:60px;object-fit:contain;border:1px solid #eee;border-radius:8px;padding:4px;background:#fff">
                 <small class="d-block text-muted mt-1">New logo (preview)</small>`;
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
<?php include __DIR__ . '/includes/admin-footer.php'; ?>
