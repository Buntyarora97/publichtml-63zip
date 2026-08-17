<?php
require_once __DIR__ . '/../includes/auth.php';
requireAdminLogin();
$admin = getCurrentAdmin();
$msg = ''; $msgType = 'success';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $id = (int)($_POST['id'] ?? 0);
    if ($action === 'approve' && $id) {
        dbQuery("UPDATE user_uploads SET is_approved=1, is_rejected=0 WHERE id=?", [$id]);
        $u = dbFetch("SELECT * FROM user_uploads WHERE id=?", [$id]);
        if ($u) {
            // Copy approved file to gallery
            dbQuery("INSERT INTO gallery (title, file_path, file_type, alt_text, status) VALUES (?,?,?,?,1)",
                [($u['name'] ? $u['name'] . ' - ' : '') . 'Devotee Photo', $u['file_path'], $u['file_type'], 'Devotee photo from ' . ($u['city'] ?: 'India')]);
        }
        logAdminActivity('upload_approved', "Approved user upload #$id");
        $msg = '✅ Upload approved and added to gallery!';
    } elseif ($action === 'reject' && $id) {
        dbQuery("UPDATE user_uploads SET is_rejected=1, is_approved=0 WHERE id=?", [$id]);
        logAdminActivity('upload_rejected', "Rejected user upload #$id");
        $msg = '✅ Upload rejected.'; $msgType = 'warning';
    } elseif ($action === 'delete' && $id) {
        $u = dbFetch("SELECT file_path FROM user_uploads WHERE id=?", [$id]);
        if ($u && $u['file_path']) {
            $full = ROOT_PATH . '/' . $u['file_path'];
            if (file_exists($full)) @unlink($full);
        }
        dbQuery("DELETE FROM user_uploads WHERE id=?", [$id]);
        logAdminActivity('upload_deleted', "Deleted user upload #$id");
        $msg = '✅ Deleted.';
    } elseif ($action === 'bulk') {
        $ids = $_POST['ids'] ?? [];
        $bulkAction = $_POST['bulk_action'] ?? '';
        foreach ($ids as $bid) {
            $bid = (int)$bid;
            if ($bulkAction === 'approve') {
                dbQuery("UPDATE user_uploads SET is_approved=1, is_rejected=0 WHERE id=?", [$bid]);
            } elseif ($bulkAction === 'reject') {
                dbQuery("UPDATE user_uploads SET is_rejected=1, is_approved=0 WHERE id=?", [$bid]);
            } elseif ($bulkAction === 'delete') {
                $u = dbFetch("SELECT file_path FROM user_uploads WHERE id=?", [$bid]);
                if ($u && $u['file_path']) { $f = ROOT_PATH . '/' . $u['file_path']; if (file_exists($f)) @unlink($f); }
                dbQuery("DELETE FROM user_uploads WHERE id=?", [$bid]);
            }
        }
        $msg = '✅ Bulk action applied to ' . count($ids) . ' items.';
    }
}

$filter = $_GET['filter'] ?? 'pending';
$where = match($filter) {
    'approved' => 'WHERE is_approved=1',
    'rejected'  => 'WHERE is_rejected=1',
    default     => 'WHERE is_approved=0 AND is_rejected=0',
};

$uploads = dbFetchAll("SELECT * FROM user_uploads $where ORDER BY created_at DESC");
$counts = [
    'pending'  => dbFetch("SELECT COUNT(*) as c FROM user_uploads WHERE is_approved=0 AND is_rejected=0")['c'] ?? 0,
    'approved' => dbFetch("SELECT COUNT(*) as c FROM user_uploads WHERE is_approved=1")['c'] ?? 0,
    'rejected' => dbFetch("SELECT COUNT(*) as c FROM user_uploads WHERE is_rejected=1")['c'] ?? 0,
];

$pageTitle = 'User Uploads';
include __DIR__ . '/includes/admin-header.php';
?>

<?php if ($msg): ?>
<div class="alert alert-<?php echo $msgType; ?> alert-dismissible fade show"><?php echo $msg; ?> <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
<?php endif; ?>

<!-- Filter Tabs -->
<div class="d-flex gap-2 mb-4">
    <a href="?filter=pending" class="btn btn-<?php echo $filter==='pending'?'warning':'outline-warning'; ?>">
        <i class="fas fa-clock me-1"></i> Pending <span class="badge bg-dark ms-1"><?php echo $counts['pending']; ?></span>
    </a>
    <a href="?filter=approved" class="btn btn-<?php echo $filter==='approved'?'success':'outline-success'; ?>">
        <i class="fas fa-check-circle me-1"></i> Approved <span class="badge bg-dark ms-1"><?php echo $counts['approved']; ?></span>
    </a>
    <a href="?filter=rejected" class="btn btn-<?php echo $filter==='rejected'?'danger':'outline-danger'; ?>">
        <i class="fas fa-times-circle me-1"></i> Rejected <span class="badge bg-dark ms-1"><?php echo $counts['rejected']; ?></span>
    </a>
</div>

<form method="POST" id="bulkForm">
    <input type="hidden" name="action" value="bulk">

    <?php if ($filter === 'pending' && !empty($uploads)): ?>
    <div class="d-flex gap-2 mb-3 align-items-center">
        <button type="button" onclick="selectAll()" class="btn btn-sm btn-outline-secondary">Select All</button>
        <select name="bulk_action" class="form-select form-select-sm w-auto">
            <option value="">Bulk Action</option>
            <option value="approve">✅ Approve Selected</option>
            <option value="reject">❌ Reject Selected</option>
            <option value="delete">🗑️ Delete Selected</option>
        </select>
        <button type="submit" class="btn btn-sm btn-primary" onclick="return confirm('Apply bulk action?')">Apply</button>
        <span class="text-muted ms-2" style="font-size:13px"><?php echo count($uploads); ?> items</span>
    </div>
    <?php endif; ?>

    <div class="row g-3">
        <?php foreach ($uploads as $upload): ?>
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="admin-card h-100" style="border:2px solid <?php echo $upload['is_approved'] ? '#27ae60' : ($upload['is_rejected'] ? '#e74c3c' : '#f39c12'); ?>">
                <?php if ($filter === 'pending'): ?>
                <div style="position:absolute;top:10px;left:10px;z-index:2">
                    <input type="checkbox" name="ids[]" value="<?php echo $upload['id']; ?>" class="upload-check form-check-input" style="width:18px;height:18px">
                </div>
                <?php endif; ?>
                <!-- Media preview -->
                <div style="position:relative;overflow:hidden;border-radius:10px 10px 0 0">
                    <?php if ($upload['file_type'] === 'video'): ?>
                    <video src="<?php echo SITE_URL . '/' . $upload['file_path']; ?>" style="width:100%;height:180px;object-fit:cover;background:#000" controls></video>
                    <?php elseif ($upload['file_path'] && file_exists(ROOT_PATH . '/' . $upload['file_path'])): ?>
                    <img src="<?php echo SITE_URL . '/' . $upload['file_path']; ?>" style="width:100%;height:180px;object-fit:cover" loading="lazy">
                    <?php else: ?>
                    <div style="height:180px;background:#f5f5f5;display:flex;align-items:center;justify-content:center;color:#aaa">
                        <i class="fas fa-image fa-3x"></i>
                    </div>
                    <?php endif; ?>
                    <div style="position:absolute;top:8px;right:8px">
                        <span class="badge" style="background:<?php echo $upload['is_approved'] ? '#27ae60' : ($upload['is_rejected'] ? '#e74c3c' : '#f39c12'); ?>">
                            <?php echo $upload['is_approved'] ? '✓ Approved' : ($upload['is_rejected'] ? '✗ Rejected' : '⏳ Pending'); ?>
                        </span>
                    </div>
                </div>
                <div class="p-3">
                    <p style="font-size:13px;font-weight:600;margin:0 0 2px"><?php echo e($upload['name'] ?: 'Anonymous'); ?></p>
                    <p style="font-size:12px;color:#888;margin:0 0 4px"><i class="fas fa-map-marker-alt me-1"></i><?php echo e($upload['city'] ?: '—'); ?></p>
                    <?php if ($upload['message']): ?>
                    <p style="font-size:12px;color:#555;border-left:3px solid #F55900;padding-left:8px;margin:6px 0"><?php echo e(mb_strimwidth($upload['message'], 0, 80, '…')); ?></p>
                    <?php endif; ?>
                    <p style="font-size:11px;color:#aaa;margin:4px 0 10px"><?php echo timeAgo($upload['created_at']); ?></p>
                    <div class="d-flex gap-1 flex-wrap">
                        <?php if (!$upload['is_approved']): ?>
                        <form method="POST" class="d-inline">
                            <input type="hidden" name="action" value="approve">
                            <input type="hidden" name="id" value="<?php echo $upload['id']; ?>">
                            <button type="submit" class="btn btn-sm btn-success" style="font-size:12px"><i class="fas fa-check me-1"></i>Approve</button>
                        </form>
                        <?php endif; ?>
                        <?php if (!$upload['is_rejected']): ?>
                        <form method="POST" class="d-inline">
                            <input type="hidden" name="action" value="reject">
                            <input type="hidden" name="id" value="<?php echo $upload['id']; ?>">
                            <button type="submit" class="btn btn-sm btn-outline-danger" style="font-size:12px"><i class="fas fa-times me-1"></i>Reject</button>
                        </form>
                        <?php endif; ?>
                        <form method="POST" class="d-inline" onsubmit="return confirm('Permanently delete?')">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?php echo $upload['id']; ?>">
                            <button type="submit" class="btn btn-sm btn-outline-secondary" style="font-size:12px"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php if (empty($uploads)): ?>
        <div class="col-12">
            <div class="admin-card text-center py-5 text-muted">
                <i class="fas fa-inbox fa-3x mb-3 d-block"></i>
                No <?php echo $filter; ?> uploads.
            </div>
        </div>
        <?php endif; ?>
    </div>
</form>

<script>
function selectAll() {
    document.querySelectorAll('.upload-check').forEach(c => c.checked = !c.checked);
}
</script>
<?php include __DIR__ . '/includes/admin-footer.php'; ?>
