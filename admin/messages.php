<?php
require_once __DIR__ . '/../includes/auth.php';
requireAdminLogin();
$admin = getCurrentAdmin();
$msg = ''; $msgType = 'success';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $id = (int)($_POST['id'] ?? 0);
    if ($action === 'mark_read' && $id) {
        dbQuery("UPDATE contact_messages SET is_read=1 WHERE id=?", [$id]);
        $msg = '✅ Marked as read.';
    } elseif ($action === 'delete' && $id) {
        dbQuery("DELETE FROM contact_messages WHERE id=?", [$id]);
        $msg = '✅ Message deleted.';
    } elseif ($action === 'mark_all_read') {
        dbQuery("UPDATE contact_messages SET is_read=1 WHERE is_read=0");
        $msg = '✅ All messages marked as read.';
    }
}

$filter = $_GET['filter'] ?? 'all';
$where = $filter === 'unread' ? 'WHERE is_read=0' : '';
$messages = dbFetchAll("SELECT * FROM contact_messages $where ORDER BY created_at DESC");
$unreadCount = dbFetch("SELECT COUNT(*) as c FROM contact_messages WHERE is_read=0")['c'] ?? 0;

// View single message
$viewMsg = null;
if (isset($_GET['view'])) {
    $viewMsg = dbFetch("SELECT * FROM contact_messages WHERE id=?", [(int)$_GET['view']]);
    if ($viewMsg && !$viewMsg['is_read']) {
        dbQuery("UPDATE contact_messages SET is_read=1 WHERE id=?", [(int)$_GET['view']]);
        $viewMsg['is_read'] = 1;
    }
}

$pageTitle = 'Contact Messages';
include __DIR__ . '/includes/admin-header.php';
?>

<?php if ($msg): ?>
<div class="alert alert-<?php echo $msgType; ?> alert-dismissible fade show"><?php echo $msg; ?> <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
<?php endif; ?>

<div class="row g-4">
    <!-- Messages List -->
    <div class="col-lg-<?php echo $viewMsg ? '5' : '12'; ?>">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fas fa-envelope"></i> Messages
                    <?php if ($unreadCount): ?><span class="badge ms-1" style="background:#F55900"><?php echo $unreadCount; ?> unread</span><?php endif; ?>
                </h5>
                <div class="d-flex gap-2">
                    <a href="?filter=all" class="btn btn-sm <?php echo $filter==='all'?'btn-primary':'btn-outline-secondary'; ?>">All</a>
                    <a href="?filter=unread" class="btn btn-sm <?php echo $filter==='unread'?'btn-warning':'btn-outline-warning'; ?>">Unread</a>
                    <?php if ($unreadCount): ?>
                    <form method="POST" class="d-inline"><input type="hidden" name="action" value="mark_all_read"><button class="btn btn-sm btn-outline-success">Mark All Read</button></form>
                    <?php endif; ?>
                </div>
            </div>
            <div class="admin-card-body p-0">
                <table class="admin-table">
                    <thead><tr><th></th><th>Name</th><th>Subject</th><th>Email</th><th>Date</th><th>Actions</th></tr></thead>
                    <tbody>
                        <?php foreach ($messages as $m): ?>
                        <tr style="<?php echo !$m['is_read'] ? 'background:#fff8f5;font-weight:600' : ''; ?>">
                            <td style="width:30px"><?php echo !$m['is_read'] ? '<span style="color:#F55900;font-size:8px">●</span>' : ''; ?></td>
                            <td><?php echo e($m['name']); ?></td>
                            <td style="max-width:200px;overflow:hidden;white-space:nowrap;text-overflow:ellipsis"><?php echo e($m['subject'] ?? 'No Subject'); ?></td>
                            <td style="font-size:12px"><?php echo e($m['email']); ?></td>
                            <td style="font-size:11px;white-space:nowrap"><?php echo timeAgo($m['created_at']); ?></td>
                            <td>
                                <a href="?view=<?php echo $m['id']; ?>&filter=<?php echo $filter; ?>" class="btn btn-sm btn-outline-primary" title="View"><i class="fas fa-eye"></i></a>
                                <form method="POST" class="d-inline" onsubmit="return confirm('Delete this message?')">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="id" value="<?php echo $m['id']; ?>">
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php if (empty($messages)): ?>
                        <tr><td colspan="6" class="text-center py-4 text-muted">No messages yet.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- View Single -->
    <?php if ($viewMsg): ?>
    <div class="col-lg-7">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fas fa-envelope-open"></i> Message Details</h5>
                <a href="messages.php" class="btn btn-sm btn-outline-secondary">← Close</a>
            </div>
            <div class="admin-card-body">
                <table class="table table-sm mb-4" style="font-size:13px">
                    <tr><th style="width:100px">From</th><td><strong><?php echo e($viewMsg['name']); ?></strong></td></tr>
                    <tr><th>Email</th><td><a href="mailto:<?php echo e($viewMsg['email']); ?>"><?php echo e($viewMsg['email']); ?></a></td></tr>
                    <tr><th>Phone</th><td><?php echo e($viewMsg['phone'] ?? '—'); ?></td></tr>
                    <tr><th>Subject</th><td><?php echo e($viewMsg['subject'] ?? 'No Subject'); ?></td></tr>
                    <tr><th>City</th><td><?php echo e($viewMsg['city'] ?? '—'); ?></td></tr>
                    <tr><th>Date</th><td><?php echo date('d M Y, h:i A', strtotime($viewMsg['created_at'])); ?></td></tr>
                    <tr><th>IP</th><td><?php echo e($viewMsg['ip_address'] ?? '—'); ?></td></tr>
                </table>

                <div style="background:#f8f9fa;border-radius:10px;padding:16px;border-left:4px solid #F55900;margin-bottom:20px">
                    <p style="font-size:14px;line-height:1.7;margin:0"><?php echo nl2br(e($viewMsg['message'])); ?></p>
                </div>

                <div class="d-flex gap-2">
                    <a href="mailto:<?php echo e($viewMsg['email']); ?>?subject=Re: <?php echo urlencode($viewMsg['subject'] ?? 'Your message'); ?>" class="btn btn-success">
                        <i class="fas fa-reply me-1"></i> Reply via Email
                    </a>
                    <?php if ($viewMsg['phone']): ?>
                    <a href="https://wa.me/91<?php echo preg_replace('/[^0-9]/', '', $viewMsg['phone']); ?>" target="_blank" class="btn btn-outline-success">
                        <i class="fab fa-whatsapp me-1"></i> WhatsApp
                    </a>
                    <?php endif; ?>
                    <form method="POST" class="d-inline" onsubmit="return confirm('Delete?')">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="id" value="<?php echo $viewMsg['id']; ?>">
                        <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash me-1"></i> Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<?php include __DIR__ . '/includes/admin-footer.php'; ?>
