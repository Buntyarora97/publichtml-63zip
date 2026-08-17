<?php
require_once __DIR__ . '/../includes/auth.php';
requireAdminLogin();
$admin = getCurrentAdmin();
$msg = ''; $msgType = 'success';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    if ($action === 'edit') {
        $id = (int)$_POST['id'];
        dbQuery("UPDATE city_pages SET seo_title=?, seo_description=?, seo_keywords=?, status=? WHERE id=?",
            [trim($_POST['seo_title']), trim($_POST['seo_description']), trim($_POST['seo_keywords']), (int)($_POST['status'] ?? 1), $id]);
        logAdminActivity('city_page_updated', "Updated city page #$id");
        $msg = '✅ City page updated!';
        header("Location: city-pages.php?msg=" . urlencode($msg)); exit;
    } elseif ($action === 'toggle') {
        dbQuery("UPDATE city_pages SET status = CASE WHEN status=1 THEN 0 ELSE 1 END WHERE id=?", [(int)$_POST['id']]);
        $msg = '✅ Status toggled.';
    } elseif ($action === 'toggle_all') {
        $newStatus = (int)$_POST['new_status'];
        dbQuery("UPDATE city_pages SET status=?", [$newStatus]);
        $msg = '✅ All city pages ' . ($newStatus ? 'enabled' : 'disabled') . '.';
    }
}

if (isset($_GET['msg'])) $msg = $_GET['msg'];

$search   = trim($_GET['q'] ?? '');
$state    = trim($_GET['state'] ?? '');
$perPage  = 30;
$page     = max(1, (int)($_GET['p'] ?? 1));
$offset   = ($page - 1) * $perPage;

$where = '1=1';
$params = [];
if ($search) { $where .= " AND (city_name LIKE ? OR city_name_hi LIKE ? OR slug LIKE ?)"; $params = array_merge($params, ["%$search%", "%$search%", "%$search%"]); }
if ($state) { $where .= " AND state=?"; $params[] = $state; }

$total = dbFetch("SELECT COUNT(*) as c FROM city_pages WHERE $where", $params)['c'] ?? 0;
$cities = dbFetchAll("SELECT * FROM city_pages WHERE $where ORDER BY state, city_name LIMIT $perPage OFFSET $offset", $params);
$totalPages = ceil($total / $perPage);

$states = dbFetchAll("SELECT DISTINCT state FROM city_pages ORDER BY state");
$activeCount = dbFetch("SELECT COUNT(*) as c FROM city_pages WHERE status=1")['c'] ?? 0;

$editCity = null;
if (isset($_GET['edit'])) $editCity = dbFetch("SELECT * FROM city_pages WHERE id=?", [(int)$_GET['edit']]);

$pageTitle = 'City Pages Manager';
include __DIR__ . '/includes/admin-header.php';
?>

<?php if ($msg): ?>
<div class="alert alert-<?php echo $msgType; ?> alert-dismissible fade show"><?php echo $msg; ?> <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
<?php endif; ?>

<?php if ($editCity): ?>
<!-- Edit Panel -->
<div class="admin-card mb-4">
    <div class="admin-card-header">
        <h5><i class="fas fa-edit"></i> Edit City: <?php echo e($editCity['city_name']); ?> (<?php echo e($editCity['state']); ?>)</h5>
        <a href="city-pages.php" class="btn btn-sm btn-outline-secondary">← Back to List</a>
    </div>
    <div class="admin-card-body">
        <form method="POST" class="row g-3">
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="id" value="<?php echo $editCity['id']; ?>">
            <div class="col-md-3"><label class="form-label">City Name (EN)</label><input class="form-control" value="<?php echo e($editCity['city_name']); ?>" disabled></div>
            <div class="col-md-3"><label class="form-label">City Name (HI)</label><input class="form-control" value="<?php echo e($editCity['city_name_hi']); ?>" disabled></div>
            <div class="col-md-3"><label class="form-label">State</label><input class="form-control" value="<?php echo e($editCity['state']); ?>" disabled></div>
            <div class="col-md-3"><label class="form-label">URL Slug</label><code class="d-block mt-2 p-2 bg-light rounded">/city/<?php echo $editCity['slug']; ?></code></div>
            <div class="col-12"><label class="form-label fw-semibold">SEO Title</label>
                <input type="text" name="seo_title" class="form-control" value="<?php echo e($editCity['seo_title']); ?>"></div>
            <div class="col-12"><label class="form-label fw-semibold">SEO Description</label>
                <textarea name="seo_description" class="form-control" rows="2"><?php echo e($editCity['seo_description']); ?></textarea></div>
            <div class="col-12"><label class="form-label">SEO Keywords</label>
                <input type="text" name="seo_keywords" class="form-control" value="<?php echo e($editCity['seo_keywords']); ?>"></div>
            <div class="col-12 col-md-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="1" <?php echo $editCity['status'] ? 'selected' : ''; ?>>Active (indexed)</option>
                    <option value="0" <?php echo !$editCity['status'] ? 'selected' : ''; ?>>Inactive (hidden)</option>
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn me-2" style="background:#F55900;color:#fff"><i class="fas fa-save me-2"></i>Save SEO Settings</button>
                <a href="<?php echo SITE_URL; ?>/city/<?php echo $editCity['slug']; ?>" target="_blank" class="btn btn-outline-success"><i class="fas fa-external-link-alt me-1"></i>Preview Page</a>
            </div>
        </form>
    </div>
</div>
<?php endif; ?>

<!-- Stats Row -->
<div class="row g-3 mb-3">
    <div class="col-md-3"><div class="stat-card"><div class="stat-icon" style="background:linear-gradient(135deg,#27ae60,#2ecc71)"><i class="fas fa-city"></i></div><div class="stat-info"><h3><?php echo $total; ?></h3><p>Total Cities</p></div></div></div>
    <div class="col-md-3"><div class="stat-card"><div class="stat-icon" style="background:linear-gradient(135deg,#F55900,#FF8237)"><i class="fas fa-check-circle"></i></div><div class="stat-info"><h3><?php echo $activeCount; ?></h3><p>Active Pages</p></div></div></div>
    <div class="col-md-3"><div class="stat-card"><div class="stat-icon" style="background:linear-gradient(135deg,#8e44ad,#9b59b6)"><i class="fas fa-map-marker-alt"></i></div><div class="stat-info"><h3><?php echo count($states); ?></h3><p>States</p></div></div></div>
    <div class="col-md-3">
        <div class="admin-card h-100 d-flex align-items-center justify-content-center p-3 gap-2">
            <form method="POST" class="d-inline"><input type="hidden" name="action" value="toggle_all"><input type="hidden" name="new_status" value="1"><button class="btn btn-sm btn-success">Enable All</button></form>
            <form method="POST" class="d-inline"><input type="hidden" name="action" value="toggle_all"><input type="hidden" name="new_status" value="0"><button class="btn btn-sm btn-secondary">Disable All</button></form>
        </div>
    </div>
</div>

<div class="admin-card">
    <div class="admin-card-header">
        <h5><i class="fas fa-list"></i> City Pages</h5>
        <form method="GET" class="d-flex gap-2">
            <input type="text" name="q" class="form-control form-control-sm" placeholder="Search city..." value="<?php echo e($search); ?>" style="width:160px">
            <select name="state" class="form-select form-select-sm" style="width:160px">
                <option value="">All States</option>
                <?php foreach ($states as $s): ?>
                <option value="<?php echo e($s['state']); ?>" <?php echo $state === $s['state'] ? 'selected' : ''; ?>><?php echo e($s['state']); ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" class="btn btn-sm btn-primary">Filter</button>
            <a href="city-pages.php" class="btn btn-sm btn-outline-secondary">Clear</a>
        </form>
    </div>
    <div class="admin-card-body p-0">
        <table class="admin-table">
            <thead><tr><th>City</th><th>Hindi</th><th>State</th><th>Slug</th><th>SEO Title</th><th>Status</th><th>Actions</th></tr></thead>
            <tbody>
                <?php foreach ($cities as $city): ?>
                <tr>
                    <td><strong><?php echo e($city['city_name']); ?></strong></td>
                    <td><?php echo e($city['city_name_hi']); ?></td>
                    <td><span class="badge bg-light text-dark"><?php echo e($city['state']); ?></span></td>
                    <td><code style="font-size:11px"><?php echo e($city['slug']); ?></code></td>
                    <td style="font-size:12px;max-width:180px;overflow:hidden;white-space:nowrap;text-overflow:ellipsis"><?php echo e($city['seo_title'] ?? '—'); ?></td>
                    <td>
                        <form method="POST" class="d-inline">
                            <input type="hidden" name="action" value="toggle">
                            <input type="hidden" name="id" value="<?php echo $city['id']; ?>">
                            <button type="submit" class="btn btn-xs <?php echo $city['status'] ? 'btn-success' : 'btn-secondary'; ?>" style="font-size:11px;padding:2px 8px">
                                <?php echo $city['status'] ? 'Active' : 'Off'; ?>
                            </button>
                        </form>
                    </td>
                    <td>
                        <a href="?edit=<?php echo $city['id']; ?>" class="btn btn-sm btn-outline-primary" title="Edit SEO"><i class="fas fa-edit"></i></a>
                        <a href="<?php echo SITE_URL; ?>/city/<?php echo $city['slug']; ?>" target="_blank" class="btn btn-sm btn-outline-success" title="View"><i class="fas fa-external-link-alt"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if (empty($cities)): ?>
                <tr><td colspan="7" class="text-center py-4 text-muted">No cities found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php if ($totalPages > 1): ?>
    <div class="admin-card-body pt-0">
        <nav><ul class="pagination pagination-sm mb-0">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?php echo $i === $page ? 'active' : ''; ?>">
                <a class="page-link" href="?p=<?php echo $i; ?>&q=<?php echo urlencode($search); ?>&state=<?php echo urlencode($state); ?>"><?php echo $i; ?></a>
            </li>
            <?php endfor; ?>
        </ul></nav>
    </div>
    <?php endif; ?>
</div>

<?php include __DIR__ . '/includes/admin-footer.php'; ?>
