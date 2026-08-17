<?php
require_once __DIR__ . '/../includes/auth.php';
requireAdminLogin();
$admin = getCurrentAdmin();
$msg = ''; $msgType = 'success';

// Handle actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    if ($action === 'add') {
        $title    = trim($_POST['title'] ?? '');
        $title_hi = trim($_POST['title_hi'] ?? '');
        $alt_text = trim($_POST['alt_text'] ?? $title);
        $file_type = $_POST['file_type'] ?? 'image';
        $sort_order = (int)($_POST['sort_order'] ?? 0);
        $file_path = '';
        if (!empty($_FILES['media_file']['tmp_name'])) {
            $allowedImages = ['image/jpeg','image/png','image/webp','image/gif'];
            $allowedVideos = ['video/mp4','video/webm'];
            $mime = mime_content_type($_FILES['media_file']['tmp_name']);
            $allowed = array_merge($allowedImages, $allowedVideos);
            if (in_array($mime, $allowed)) {
                $ext = pathinfo($_FILES['media_file']['name'], PATHINFO_EXTENSION);
                $filename = 'gallery_' . time() . '_' . mt_rand(100,999) . '.' . $ext;
                $uploadDir = ROOT_PATH . '/assets/uploads/gallery/';
                if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
                if (move_uploaded_file($_FILES['media_file']['tmp_name'], $uploadDir . $filename)) {
                    $file_path = 'assets/uploads/gallery/' . $filename;
                    $file_type = strpos($mime, 'video') !== false ? 'video' : 'image';
                } else { $msg = '❌ Upload failed.'; $msgType = 'danger'; }
            } else { $msg = '❌ Invalid file type.'; $msgType = 'danger'; }
        }
        if (!$msg) {
            if ($file_path || $title) {
                dbQuery("INSERT INTO gallery (title, title_hi, file_path, file_type, alt_text, sort_order, status) VALUES (?,?,?,?,?,?,1)",
                    [$title, $title_hi, $file_path, $file_type, $alt_text, $sort_order]);
                logAdminActivity('gallery_added', "Added gallery item: $title");
                $msg = '✅ Gallery item added!';
            } else { $msg = '❌ Title or file required.'; $msgType = 'danger'; }
        }
    } elseif ($action === 'delete') {
        $id = (int)$_POST['id'];
        $item = dbFetch("SELECT file_path FROM gallery WHERE id=?", [$id]);
        if ($item && $item['file_path']) {
            $full = ROOT_PATH . '/' . $item['file_path'];
            if (file_exists($full)) @unlink($full);
        }
        dbQuery("DELETE FROM gallery WHERE id=?", [$id]);
        logAdminActivity('gallery_deleted', "Deleted gallery item #$id");
        $msg = '✅ Item deleted.';
    } elseif ($action === 'toggle') {
        dbQuery("UPDATE gallery SET status = CASE WHEN status=1 THEN 0 ELSE 1 END WHERE id=?", [(int)$_POST['id']]);
        $msg = '✅ Status toggled.';
    } elseif ($action === 'edit') {
        $id = (int)$_POST['id'];
        dbQuery("UPDATE gallery SET title=?, title_hi=?, alt_text=?, sort_order=?, status=? WHERE id=?",
            [trim($_POST['title']), trim($_POST['title_hi']), trim($_POST['alt_text']), (int)$_POST['sort_order'], (int)($_POST['status'] ?? 1), $id]);
        // Handle replacement file
        if (!empty($_FILES['media_file']['tmp_name'])) {
            $mime = mime_content_type($_FILES['media_file']['tmp_name']);
            $allowed = ['image/jpeg','image/png','image/webp','image/gif','video/mp4','video/webm'];
            if (in_array($mime, $allowed)) {
                $ext = pathinfo($_FILES['media_file']['name'], PATHINFO_EXTENSION);
                $filename = 'gallery_' . time() . '_' . mt_rand(100,999) . '.' . $ext;
                $uploadDir = ROOT_PATH . '/assets/uploads/gallery/';
                if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
                if (move_uploaded_file($_FILES['media_file']['tmp_name'], $uploadDir . $filename)) {
                    $ftype = strpos($mime, 'video') !== false ? 'video' : 'image';
                    dbQuery("UPDATE gallery SET file_path=?, file_type=? WHERE id=?",
                        ['assets/uploads/gallery/' . $filename, $ftype, $id]);
                }
            }
        }
        logAdminActivity('gallery_updated', "Updated gallery item #$id");
        $msg = '✅ Updated!';
        header("Location: gallery.php?msg=" . urlencode($msg));
        exit;
    }
}

if (isset($_GET['msg'])) { $msg = $_GET['msg']; }

// Filter
$filterType = $_GET['type'] ?? '';
$where = $filterType ? "WHERE file_type='" . $filterType . "'" : '';
$items = dbFetchAll("SELECT * FROM gallery $where ORDER BY sort_order, id DESC");
$editItem = null;
if (isset($_GET['edit'])) {
    $editItem = dbFetch("SELECT * FROM gallery WHERE id=?", [(int)$_GET['edit']]);
}
$pageTitle = 'Gallery Manager';
include __DIR__ . '/includes/admin-header.php';
?>

<?php if ($msg): ?>
<div class="alert alert-<?php echo $msgType; ?> alert-dismissible fade show">
    <?php echo $msg; ?> <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>

<div class="row g-4">
    <!-- Upload Form -->
    <div class="col-lg-4">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fas fa-<?php echo $editItem ? 'edit' : 'plus-circle'; ?>"></i> <?php echo $editItem ? 'Edit Item' : 'Upload Media'; ?></h5>
                <?php if ($editItem): ?><a href="gallery.php" class="btn btn-sm btn-outline-secondary">+ New</a><?php endif; ?>
            </div>
            <div class="admin-card-body">
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="<?php echo $editItem ? 'edit' : 'add'; ?>">
                    <?php if ($editItem): ?><input type="hidden" name="id" value="<?php echo $editItem['id']; ?>"><?php endif; ?>
                    <div class="mb-3">
                        <label class="form-label">Title (English)</label>
                        <input type="text" name="title" class="form-control" value="<?php echo e($editItem['title'] ?? ''); ?>" placeholder="Ram Mandir Darshan">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Title (Hindi)</label>
                        <input type="text" name="title_hi" class="form-control" value="<?php echo e($editItem['title_hi'] ?? ''); ?>" placeholder="राम मंदिर दर्शन">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alt Text</label>
                        <input type="text" name="alt_text" class="form-control" value="<?php echo e($editItem['alt_text'] ?? ''); ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><?php echo $editItem ? 'Replace File (optional)' : 'Upload Image/Video'; ?></label>
                        <input type="file" name="media_file" class="form-control" accept="image/*,video/mp4,video/webm" onchange="previewFile(this)">
                        <div id="filePreview" class="mt-2">
                            <?php if ($editItem && $editItem['file_path']): ?>
                            <?php if ($editItem['file_type'] === 'video'): ?>
                            <video src="<?php echo SITE_URL . '/' . $editItem['file_path']; ?>" style="max-height:120px;border-radius:8px" controls></video>
                            <?php else: ?>
                            <img src="<?php echo SITE_URL . '/' . $editItem['file_path']; ?>" style="max-height:120px;border-radius:8px;object-fit:cover" class="img-fluid">
                            <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label">Sort Order</label>
                            <input type="number" name="sort_order" class="form-control" value="<?php echo $editItem['sort_order'] ?? 0; ?>" min="0">
                        </div>
                        <?php if ($editItem): ?>
                        <div class="col-6">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="1" <?php echo ($editItem['status'] ?? 1) ? 'selected' : ''; ?>>Active</option>
                                <option value="0" <?php echo !($editItem['status'] ?? 1) ? 'selected' : ''; ?>>Inactive</option>
                            </select>
                        </div>
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn w-100" style="background:#F55900;color:#fff">
                        <i class="fas fa-<?php echo $editItem ? 'save' : 'upload'; ?> me-2"></i><?php echo $editItem ? 'Save Changes' : 'Upload to Gallery'; ?>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Gallery Grid -->
    <div class="col-lg-8">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fas fa-images"></i> Gallery (<?php echo count($items); ?> items)</h5>
                <div class="btn-group btn-group-sm">
                    <a href="gallery.php" class="btn btn-outline-secondary <?php echo !$filterType ? 'active' : ''; ?>">All</a>
                    <a href="?type=image" class="btn btn-outline-secondary <?php echo $filterType === 'image' ? 'active' : ''; ?>">Images</a>
                    <a href="?type=video" class="btn btn-outline-secondary <?php echo $filterType === 'video' ? 'active' : ''; ?>">Videos</a>
                </div>
            </div>
            <div class="admin-card-body">
                <div class="row g-3">
                    <?php foreach ($items as $item): ?>
                    <div class="col-md-4 col-6">
                        <div class="gallery-admin-card" style="border:1px solid #eee;border-radius:10px;overflow:hidden;position:relative">
                            <?php if (!$item['status']): ?>
                            <div style="position:absolute;top:5px;left:5px;z-index:2"><span class="badge bg-secondary">Hidden</span></div>
                            <?php endif; ?>
                            <?php if ($item['file_type'] === 'video'): ?>
                            <video src="<?php echo SITE_URL . '/' . $item['file_path']; ?>" style="width:100%;height:120px;object-fit:cover;background:#000"></video>
                            <div style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);color:rgba(255,255,255,0.8);font-size:24px;pointer-events:none"><i class="fas fa-play-circle"></i></div>
                            <?php elseif ($item['file_path']): ?>
                            <img src="<?php echo SITE_URL . '/' . $item['file_path']; ?>" style="width:100%;height:120px;object-fit:cover" loading="lazy">
                            <?php else: ?>
                            <div style="width:100%;height:120px;background:#f5f5f5;display:flex;align-items:center;justify-content:center;color:#aaa"><i class="fas fa-image fa-2x"></i></div>
                            <?php endif; ?>
                            <div style="padding:8px">
                                <p style="font-size:12px;font-weight:600;margin:0;overflow:hidden;white-space:nowrap;text-overflow:ellipsis"><?php echo e($item['title'] ?: 'Untitled'); ?></p>
                                <div class="d-flex gap-1 mt-2">
                                    <a href="?edit=<?php echo $item['id']; ?>" class="btn btn-xs btn-outline-primary flex-fill" style="font-size:11px;padding:3px 6px"><i class="fas fa-edit"></i></a>
                                    <form method="POST" class="d-inline">
                                        <input type="hidden" name="action" value="toggle">
                                        <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                                        <button type="submit" class="btn btn-xs <?php echo $item['status'] ? 'btn-outline-warning' : 'btn-outline-success'; ?>" style="font-size:11px;padding:3px 6px" title="Toggle status"><i class="fas fa-eye<?php echo $item['status'] ? '-slash' : ''; ?>"></i></button>
                                    </form>
                                    <form method="POST" class="d-inline" onsubmit="return confirm('Delete this item?')">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                                        <button type="submit" class="btn btn-xs btn-outline-danger" style="font-size:11px;padding:3px 6px"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php if (empty($items)): ?>
                    <div class="col-12 text-center py-5 text-muted">
                        <i class="fas fa-images fa-3x mb-3 d-block"></i>
                        No gallery items yet. Upload your first image!
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function previewFile(input) {
    const preview = document.getElementById('filePreview');
    if (input.files && input.files[0]) {
        const file = input.files[0];
        const reader = new FileReader();
        reader.onload = e => {
            if (file.type.startsWith('video/')) {
                preview.innerHTML = `<video src="${e.target.result}" style="max-height:120px;border-radius:8px" controls></video>`;
            } else {
                preview.innerHTML = `<img src="${e.target.result}" style="max-height:120px;border-radius:8px;object-fit:cover" class="img-fluid">`;
            }
        };
        reader.readAsDataURL(file);
    }
}
</script>
<?php include __DIR__ . '/includes/admin-footer.php'; ?>
