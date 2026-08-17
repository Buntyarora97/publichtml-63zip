<?php
require_once __DIR__ . '/../includes/auth.php';
requireAdminLogin();
$admin = getCurrentAdmin();
$msg = ''; $msgType = 'success';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    if ($action === 'add' || $action === 'edit') {
        $title      = trim($_POST['title'] ?? '');
        $title_hi   = trim($_POST['title_hi'] ?? '');
        $page_slug  = trim($_POST['page_slug'] ?? 'home');
        $slide_type = $_POST['slide_type'] ?? 'image';
        $sort_order = (int)($_POST['sort_order'] ?? 0);
        $status     = (int)($_POST['status'] ?? 1);
        $right_frame_source = trim($_POST['right_frame_source'] ?? '');
        $right_frame_type   = $_POST['right_frame_type'] ?? 'image';

        // Upload right-frame media (image/video)
        if (!empty($_FILES['right_file']['tmp_name'])) {
            $mime = mime_content_type($_FILES['right_file']['tmp_name']);
            $allowed = ['image/jpeg','image/png','image/webp','image/gif','video/mp4','video/webm'];
            if (in_array($mime, $allowed)) {
                $ext = pathinfo($_FILES['right_file']['name'], PATHINFO_EXTENSION);
                $filename = 'hero_' . time() . '_' . mt_rand(100,999) . '.' . $ext;
                $uploadDir = ROOT_PATH . '/assets/uploads/hero/';
                if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
                if (move_uploaded_file($_FILES['right_file']['tmp_name'], $uploadDir . $filename)) {
                    $right_frame_source = 'assets/uploads/hero/' . $filename;
                    $right_frame_type = strpos($mime, 'video') !== false ? 'video' : 'image';
                }
            } else { $msg = '❌ Invalid file type.'; $msgType = 'danger'; }
        }
        if (!$msg) {
            if ($action === 'add') {
                dbQuery("INSERT INTO hero_section (page_slug, slide_type, title, title_hi, right_frame_type, right_frame_source, status, sort_order) VALUES (?,?,?,?,?,?,?,?)",
                    [$page_slug, $slide_type, $title, $title_hi, $right_frame_type, $right_frame_source, $status, $sort_order]);
                logAdminActivity('hero_slide_added', "Added hero slide: $title");
                $msg = '✅ Hero slide added!';
            } else {
                $id = (int)$_POST['id'];
                dbQuery("UPDATE hero_section SET page_slug=?, slide_type=?, title=?, title_hi=?, right_frame_type=?, right_frame_source=?, status=?, sort_order=? WHERE id=?",
                    [$page_slug, $slide_type, $title, $title_hi, $right_frame_type, $right_frame_source, $status, $sort_order, $id]);
                logAdminActivity('hero_slide_updated', "Updated hero slide #$id");
                $msg = '✅ Updated!';
                header("Location: hero.php?msg=" . urlencode($msg)); exit;
            }
        }
    } elseif ($action === 'delete') {
        $id = (int)$_POST['id'];
        $slide = dbFetch("SELECT right_frame_source FROM hero_section WHERE id=?", [$id]);
        if ($slide && $slide['right_frame_source'] && strpos($slide['right_frame_source'], 'uploads/') !== false) {
            $full = ROOT_PATH . '/' . $slide['right_frame_source'];
            if (file_exists($full)) @unlink($full);
        }
        dbQuery("DELETE FROM hero_section WHERE id=?", [$id]);
        logAdminActivity('hero_slide_deleted', "Deleted hero slide #$id");
        $msg = '✅ Deleted.';
    } elseif ($action === 'toggle') {
        dbQuery("UPDATE hero_section SET status = CASE WHEN status=1 THEN 0 ELSE 1 END WHERE id=?", [(int)$_POST['id']]);
        $msg = '✅ Status toggled.';
    }
}

if (isset($_GET['msg'])) $msg = $_GET['msg'];

$slides = dbFetchAll("SELECT * FROM hero_section ORDER BY sort_order, id ASC");
$editSlide = null;
if (isset($_GET['edit'])) $editSlide = dbFetch("SELECT * FROM hero_section WHERE id=?", [(int)$_GET['edit']]);

$pageTitle = 'Hero Slides Manager';
include __DIR__ . '/includes/admin-header.php';
?>

<?php if ($msg): ?>
<div class="alert alert-<?php echo $msgType; ?> alert-dismissible fade show">
    <?php echo $msg; ?> <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>

<div class="row g-4">
    <!-- Form -->
    <div class="col-lg-5">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fas fa-<?php echo $editSlide ? 'edit' : 'plus'; ?>"></i> <?php echo $editSlide ? 'Edit Slide' : 'Add Hero Slide'; ?></h5>
                <?php if ($editSlide): ?><a href="hero.php" class="btn btn-sm btn-outline-secondary">+ Add New</a><?php endif; ?>
            </div>
            <div class="admin-card-body">
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="<?php echo $editSlide ? 'edit' : 'add'; ?>">
                    <?php if ($editSlide): ?><input type="hidden" name="id" value="<?php echo $editSlide['id']; ?>"><?php endif; ?>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Heading (English)</label>
                        <input type="text" name="title" class="form-control" value="<?php echo e($editSlide['title'] ?? ''); ?>" placeholder="जय श्री राम">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Heading (Hindi)</label>
                        <input type="text" name="title_hi" class="form-control" value="<?php echo e($editSlide['title_hi'] ?? ''); ?>" placeholder="जय श्री राम">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Right Frame Media <span class="text-danger">*</span></label>
                        <input type="file" name="right_file" class="form-control" accept="image/*,video/mp4" onchange="previewMedia(this)">
                        <small class="text-muted">Upload image (JPG/PNG/WebP) or video (MP4) for the right panel</small>
                        <div id="mediaPreview" class="mt-2">
                            <?php if ($editSlide && $editSlide['right_frame_source']): ?>
                            <?php if ($editSlide['right_frame_type'] === 'video'): ?>
                            <video src="<?php echo SITE_URL . '/' . $editSlide['right_frame_source']; ?>" style="max-height:150px;border-radius:8px" controls></video>
                            <?php else: ?>
                            <img src="<?php echo SITE_URL . '/' . $editSlide['right_frame_source']; ?>" style="max-height:150px;border-radius:8px;object-fit:cover" class="img-fluid">
                            <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label">Sort Order</label>
                            <input type="number" name="sort_order" class="form-control" value="<?php echo $editSlide['sort_order'] ?? 0; ?>" min="0">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Page</label>
                            <select name="page_slug" class="form-select">
                                <option value="home" <?php echo ($editSlide['page_slug'] ?? 'home') === 'home' ? 'selected' : ''; ?>>Home</option>
                                <option value="gallery" <?php echo ($editSlide['page_slug'] ?? '') === 'gallery' ? 'selected' : ''; ?>>Gallery</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="status" value="1" <?php echo ($editSlide['status'] ?? 1) ? 'checked' : ''; ?>>
                            <label class="form-check-label">Active (show on website)</label>
                        </div>
                    </div>

                    <button type="submit" class="btn w-100" style="background:#F55900;color:#fff;font-weight:600">
                        <i class="fas fa-save me-2"></i><?php echo $editSlide ? 'Save Changes' : 'Add Slide'; ?>
                    </button>
                </form>
            </div>
        </div>

        <!-- Instructions -->
        <div class="admin-card mt-3">
            <div class="admin-card-header"><h5><i class="fas fa-info-circle"></i> Tips</h5></div>
            <div class="admin-card-body" style="font-size:13px">
                <ul class="mb-0 ps-3">
                    <li>Upload <strong>portrait images</strong> (3:4 ratio) for the right panel</li>
                    <li>Recommended size: <strong>600×800px</strong></li>
                    <li>Videos should be <strong>MP4 format</strong>, max 10MB</li>
                    <li>Sort Order: lower number = appears first</li>
                    <li>Up to <strong>6 slides</strong> recommended</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Slides List -->
    <div class="col-lg-7">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fas fa-th-large"></i> All Slides (<?php echo count($slides); ?>)</h5>
            </div>
            <div class="admin-card-body">
                <?php if (empty($slides)): ?>
                <div class="text-center py-5 text-muted">
                    <i class="fas fa-images fa-3x mb-3 d-block"></i>
                    No hero slides yet. Add your first slide!
                </div>
                <?php endif; ?>
                <div class="row g-3">
                    <?php foreach ($slides as $slide): ?>
                    <div class="col-md-6">
                        <div style="border:2px solid <?php echo $slide['status'] ? '#F55900' : '#ddd'; ?>;border-radius:12px;overflow:hidden;position:relative">
                            <?php if (!$slide['status']): ?>
                            <div style="position:absolute;top:8px;left:8px;z-index:2"><span class="badge bg-secondary">Hidden</span></div>
                            <?php endif; ?>
                            <div style="position:absolute;top:8px;right:8px;z-index:2"><span class="badge bg-dark">#<?php echo $slide['sort_order']; ?></span></div>
                            <?php if ($slide['right_frame_source']): ?>
                            <?php if ($slide['right_frame_type'] === 'video'): ?>
                            <video src="<?php echo SITE_URL . '/' . $slide['right_frame_source']; ?>" style="width:100%;height:160px;object-fit:cover;background:#000" muted></video>
                            <div style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);color:rgba(255,255,255,0.8);font-size:28px"><i class="fas fa-play-circle"></i></div>
                            <?php else: ?>
                            <img src="<?php echo SITE_URL . '/' . $slide['right_frame_source']; ?>" style="width:100%;height:160px;object-fit:cover" loading="lazy">
                            <?php endif; ?>
                            <?php else: ?>
                            <div style="width:100%;height:160px;background:linear-gradient(135deg,#F55900,#FF8237);display:flex;align-items:center;justify-content:center;color:#fff;font-size:13px">No media</div>
                            <?php endif; ?>
                            <div style="padding:10px;background:#fff">
                                <p style="font-size:13px;font-weight:600;margin:0"><?php echo e($slide['title'] ?: '(No heading)'); ?></p>
                                <p style="font-size:11px;color:#888;margin:2px 0 8px"><?php echo e($slide['title_hi'] ?? ''); ?></p>
                                <div class="d-flex gap-1">
                                    <a href="?edit=<?php echo $slide['id']; ?>" class="btn btn-sm btn-outline-primary flex-fill"><i class="fas fa-edit me-1"></i>Edit</a>
                                    <form method="POST" class="d-inline">
                                        <input type="hidden" name="action" value="toggle">
                                        <input type="hidden" name="id" value="<?php echo $slide['id']; ?>">
                                        <button type="submit" class="btn btn-sm <?php echo $slide['status'] ? 'btn-outline-warning' : 'btn-outline-success'; ?>" title="<?php echo $slide['status'] ? 'Hide' : 'Show'; ?>">
                                            <i class="fas fa-eye<?php echo $slide['status'] ? '-slash' : ''; ?>"></i>
                                        </button>
                                    </form>
                                    <form method="POST" class="d-inline" onsubmit="return confirm('Delete this slide?')">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="id" value="<?php echo $slide['id']; ?>">
                                        <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function previewMedia(input) {
    const preview = document.getElementById('mediaPreview');
    if (input.files && input.files[0]) {
        const file = input.files[0];
        const reader = new FileReader();
        reader.onload = e => {
            if (file.type.startsWith('video/')) {
                preview.innerHTML = `<video src="${e.target.result}" style="max-height:150px;border-radius:8px" controls></video>`;
            } else {
                preview.innerHTML = `<img src="${e.target.result}" style="max-height:150px;border-radius:8px;object-fit:cover" class="img-fluid">`;
            }
        };
        reader.readAsDataURL(file);
    }
}
</script>
<?php include __DIR__ . '/includes/admin-footer.php'; ?>
