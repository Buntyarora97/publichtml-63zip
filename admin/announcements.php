<?php
require_once __DIR__ . '/../includes/auth.php';
requireAdminLogin();
$admin = getCurrentAdmin();
$msg = '';
$msgType = 'success';

// Handle actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    if ($action === 'add' || $action === 'edit') {
        $content    = trim($_POST['content'] ?? '');
        $content_hi = trim($_POST['content_hi'] ?? '');
        $icon       = trim($_POST['icon'] ?? 'bell');
        $status     = (int)($_POST['status'] ?? 1);
        $sort_order = (int)($_POST['sort_order'] ?? 0);
        if ($content) {
            if ($action === 'add') {
                dbQuery("INSERT INTO marquee_announcements (content, content_hi, icon, status, sort_order) VALUES (?,?,?,?,?)",
                    [$content, $content_hi, $icon, $status, $sort_order]);
                logAdminActivity('announcement_added', "Added announcement: " . mb_strimwidth($content, 0, 50));
                $msg = '✅ Announcement added!';
            } else {
                $id = (int)$_POST['id'];
                dbQuery("UPDATE marquee_announcements SET content=?, content_hi=?, icon=?, status=?, sort_order=? WHERE id=?",
                    [$content, $content_hi, $icon, $status, $sort_order, $id]);
                logAdminActivity('announcement_updated', "Updated announcement #$id");
                $msg = '✅ Announcement updated!';
            }
        } else { $msg = '❌ Content required.'; $msgType = 'danger'; }
    } elseif ($action === 'delete') {
        $id = (int)$_POST['id'];
        dbQuery("DELETE FROM marquee_announcements WHERE id=?", [$id]);
        logAdminActivity('announcement_deleted', "Deleted announcement #$id");
        $msg = '✅ Deleted.';
    } elseif ($action === 'toggle') {
        $id = (int)$_POST['id'];
        dbQuery("UPDATE marquee_announcements SET status = CASE WHEN status=1 THEN 0 ELSE 1 END WHERE id=?", [$id]);
        $msg = '✅ Status toggled.';
    }
}

$announcements = dbFetchAll("SELECT * FROM marquee_announcements ORDER BY sort_order, id DESC");
$editItem = null;
if (isset($_GET['edit'])) {
    $editItem = dbFetch("SELECT * FROM marquee_announcements WHERE id=?", [(int)$_GET['edit']]);
}
$pageTitle = 'Marquee Announcements';
include __DIR__ . '/includes/admin-header.php';
?>

<?php if ($msg): ?>
<div class="alert alert-<?php echo $msgType; ?> alert-dismissible fade show">
    <?php echo $msg; ?> <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>

<div class="row g-4">
    <!-- Form -->
    <div class="col-lg-4">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fas fa-<?php echo $editItem ? 'edit' : 'plus'; ?>"></i> <?php echo $editItem ? 'Edit Announcement' : 'Add Announcement'; ?></h5>
                <?php if ($editItem): ?><a href="announcements.php" class="btn btn-sm btn-outline-secondary">+ Add New</a><?php endif; ?>
            </div>
            <div class="admin-card-body">
                <form method="POST">
                    <input type="hidden" name="action" value="<?php echo $editItem ? 'edit' : 'add'; ?>">
                    <?php if ($editItem): ?><input type="hidden" name="id" value="<?php echo $editItem['id']; ?>"><?php endif; ?>

                    <div class="mb-3">
                        <label class="form-label">English Text <span class="text-danger">*</span></label>
                        <textarea name="content" class="form-control" rows="3" placeholder="🕉️ Jai Shri Ram! Welcome..." required><?php echo e($editItem['content'] ?? ''); ?></textarea>
                        <small class="text-muted">Use emoji for visual appeal ✨</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hindi Text (हिंदी)</label>
                        <textarea name="content_hi" class="form-control" rows="3" placeholder="🕉️ जय श्री राम..."><?php echo e($editItem['content_hi'] ?? ''); ?></textarea>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label">Icon</label>
                            <select name="icon" class="form-select">
                                <?php foreach (['om','bell','star','fire','heart','landmark','pray'] as $ico): ?>
                                <option value="<?php echo $ico; ?>" <?php echo ($editItem['icon'] ?? 'bell') === $ico ? 'selected' : ''; ?>><?php echo ucfirst($ico); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Sort Order</label>
                            <input type="number" name="sort_order" class="form-control" value="<?php echo $editItem['sort_order'] ?? 0; ?>" min="0">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="status" value="1" id="statusCheck" <?php echo ($editItem['status'] ?? 1) ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="statusCheck">Active (show in marquee)</label>
                        </div>
                    </div>
                    <button type="submit" class="btn w-100" style="background:#F55900;color:#fff">
                        <i class="fas fa-save me-2"></i><?php echo $editItem ? 'Update' : 'Add Announcement'; ?>
                    </button>
                </form>
            </div>
        </div>

        <!-- Preview -->
        <div class="admin-card mt-3">
            <div class="admin-card-header"><h5><i class="fas fa-eye"></i> Marquee Preview</h5></div>
            <div class="admin-card-body">
                <div style="background:#F55900;color:#fff;padding:8px 12px;border-radius:8px;overflow:hidden;white-space:nowrap;font-size:13px">
                    <?php foreach ($announcements as $a): if ($a['status']): ?>
                    🕉️ <?php echo e($a['content']); ?> &nbsp;&nbsp;&nbsp;
                    <?php endif; endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- List -->
    <div class="col-lg-8">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fas fa-list"></i> All Announcements (<?php echo count($announcements); ?>)</h5>
            </div>
            <div class="admin-card-body p-0">
                <table class="admin-table">
                    <thead><tr><th>#</th><th>Content</th><th>Hindi</th><th>Order</th><th>Status</th><th>Actions</th></tr></thead>
                    <tbody>
                        <?php foreach ($announcements as $a): ?>
                        <tr>
                            <td><?php echo $a['id']; ?></td>
                            <td style="max-width:200px"><?php echo e(mb_strimwidth($a['content'], 0, 60, '…')); ?></td>
                            <td style="max-width:150px;font-size:12px"><?php echo e(mb_strimwidth($a['content_hi'] ?? '', 0, 40, '…')); ?></td>
                            <td><?php echo $a['sort_order']; ?></td>
                            <td>
                                <form method="POST" class="d-inline">
                                    <input type="hidden" name="action" value="toggle">
                                    <input type="hidden" name="id" value="<?php echo $a['id']; ?>">
                                    <button type="submit" class="btn btn-sm <?php echo $a['status'] ? 'btn-success' : 'btn-secondary'; ?>" style="font-size:11px">
                                        <?php echo $a['status'] ? 'Active' : 'Inactive'; ?>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <a href="?edit=<?php echo $a['id']; ?>" class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></a>
                                <form method="POST" class="d-inline" onsubmit="return confirm('Delete this announcement?')">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="id" value="<?php echo $a['id']; ?>">
                                    <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php if (empty($announcements)): ?>
                        <tr><td colspan="6" class="text-center py-4 text-muted">No announcements yet.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/includes/admin-footer.php'; ?>
