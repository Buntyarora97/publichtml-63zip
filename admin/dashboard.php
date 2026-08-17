<?php
require_once __DIR__ . '/../includes/auth.php';
requireAdminLogin();

$admin = getCurrentAdmin();
$today = date('Y-m-d');
$sevenDaysAgo = date('Y-m-d', strtotime('-7 days'));

// Dashboard stats - SQLite compatible
$stats = [
    'total_pages'     => dbFetch("SELECT COUNT(*) as c FROM pages")['c'] ?? 0,
    'published_pages' => dbFetch("SELECT COUNT(*) as c FROM pages WHERE status='published'")['c'] ?? 0,
    'total_gallery'   => dbFetch("SELECT COUNT(*) as c FROM gallery")['c'] ?? 0,
    'total_cities'    => dbFetch("SELECT COUNT(*) as c FROM city_pages")['c'] ?? 0,
    'pending_uploads' => dbFetch("SELECT COUNT(*) as c FROM user_uploads WHERE is_approved=0 AND is_rejected=0")['c'] ?? 0,
    'total_views'     => dbFetch("SELECT COUNT(*) as c FROM page_views")['c'] ?? 0,
    'today_views'     => dbFetch("SELECT COUNT(*) as c FROM page_views WHERE view_date=?", [$today])['c'] ?? 0,
    'subscribers'     => dbFetch("SELECT COUNT(*) as c FROM newsletter_subscribers WHERE status=1")['c'] ?? 0,
    'announcements'   => dbFetch("SELECT COUNT(*) as c FROM marquee_announcements WHERE status=1")['c'] ?? 0,
    'hero_slides'     => dbFetch("SELECT COUNT(*) as c FROM hero_section WHERE status=1")['c'] ?? 0,
    'unread_msgs'     => dbFetch("SELECT COUNT(*) as c FROM contact_messages WHERE is_read=0")['c'] ?? 0,
    'total_keywords'  => dbFetch("SELECT COUNT(*) as c FROM keyword_pages")['c'] ?? 0,
];

// Recent activity
$recentActivity = dbFetchAll("SELECT l.*, a.name as admin_name FROM admin_activity_logs l LEFT JOIN admins a ON l.admin_id = a.id ORDER BY l.created_at DESC LIMIT 8");

// Recent contact messages
$recentMessages = dbFetchAll("SELECT * FROM contact_messages ORDER BY created_at DESC LIMIT 5");

// Page views last 7 days - SQLite compatible
$viewsData = dbFetchAll("SELECT view_date, COUNT(*) as views FROM page_views WHERE view_date >= ? GROUP BY view_date ORDER BY view_date", [$sevenDaysAgo]);

$pageTitle = 'Dashboard';
include __DIR__ . '/includes/admin-header.php';
?>

<div class="admin-dashboard">
    <!-- Stats Row 1 -->
    <div class="row g-3 mb-3">
        <div class="col-xl-2 col-md-4 col-6">
            <div class="stat-card">
                <div class="stat-icon" style="background:linear-gradient(135deg,#F55900,#FF8237)"><i class="fas fa-landmark"></i></div>
                <div class="stat-info"><h3><?php echo $stats['hero_slides']; ?></h3><p>Hero Slides</p></div>
            </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6">
            <div class="stat-card">
                <div class="stat-icon" style="background:linear-gradient(135deg,#e67e22,#f39c12)"><i class="fas fa-images"></i></div>
                <div class="stat-info"><h3><?php echo $stats['total_gallery']; ?></h3><p>Gallery</p></div>
            </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6">
            <div class="stat-card">
                <div class="stat-icon" style="background:linear-gradient(135deg,#27ae60,#2ecc71)"><i class="fas fa-city"></i></div>
                <div class="stat-info"><h3><?php echo $stats['total_cities']; ?></h3><p>City Pages</p></div>
            </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6">
            <div class="stat-card">
                <div class="stat-icon" style="background:linear-gradient(135deg,#8e44ad,#9b59b6)"><i class="fas fa-key"></i></div>
                <div class="stat-info"><h3><?php echo $stats['total_keywords']; ?></h3><p>Keywords</p></div>
            </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6">
            <div class="stat-card">
                <div class="stat-icon" style="background:linear-gradient(135deg,#2980b9,#3498db)"><i class="fas fa-eye"></i></div>
                <div class="stat-info"><h3><?php echo number_format($stats['today_views']); ?></h3><p>Today Views</p></div>
            </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6">
            <div class="stat-card">
                <div class="stat-icon" style="background:linear-gradient(135deg,#16a085,#1abc9c)"><i class="fas fa-envelope"></i></div>
                <div class="stat-info"><h3><?php echo $stats['subscribers']; ?></h3><p>Subscribers</p></div>
            </div>
        </div>
    </div>

    <!-- Alerts -->
    <?php if ($stats['pending_uploads'] > 0 || $stats['unread_msgs'] > 0): ?>
    <div class="row g-3 mb-3">
        <?php if ($stats['pending_uploads'] > 0): ?>
        <div class="col-md-6">
            <div class="alert alert-warning d-flex align-items-center gap-2 mb-0">
                <i class="fas fa-upload"></i>
                <span><strong><?php echo $stats['pending_uploads']; ?></strong> user photos pending approval</span>
                <a href="user-uploads.php" class="ms-auto btn btn-sm btn-warning">Review</a>
            </div>
        </div>
        <?php endif; ?>
        <?php if ($stats['unread_msgs'] > 0): ?>
        <div class="col-md-6">
            <div class="alert alert-info d-flex align-items-center gap-2 mb-0">
                <i class="fas fa-envelope"></i>
                <span><strong><?php echo $stats['unread_msgs']; ?></strong> unread contact messages</span>
                <a href="messages.php" class="ms-auto btn btn-sm btn-info text-white">View</a>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>

    <div class="row g-4">
        <!-- Views Chart -->
        <div class="col-lg-8">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fas fa-chart-line"></i> Page Views (Last 7 Days)</h5>
                    <span class="badge" style="background:#F55900"><?php echo number_format($stats['total_views']); ?> total</span>
                </div>
                <div class="admin-card-body">
                    <canvas id="viewsChart" height="100"></canvas>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="col-lg-4">
            <div class="admin-card">
                <div class="admin-card-header"><h5><i class="fas fa-bolt"></i> Quick Actions</h5></div>
                <div class="admin-card-body">
                    <div class="d-grid gap-2">
                        <a href="hero.php" class="btn btn-outline-primary btn-sm text-start"><i class="fas fa-images me-2"></i> Manage Hero Slides</a>
                        <a href="gallery.php" class="btn btn-outline-primary btn-sm text-start"><i class="fas fa-photo-video me-2"></i> Manage Gallery</a>
                        <a href="announcements.php" class="btn btn-outline-primary btn-sm text-start"><i class="fas fa-bullhorn me-2"></i> Manage Announcements</a>
                        <a href="city-pages.php" class="btn btn-outline-primary btn-sm text-start"><i class="fas fa-city me-2"></i> Manage City Pages</a>
                        <a href="user-uploads.php" class="btn btn-outline-primary btn-sm text-start"><i class="fas fa-upload me-2"></i> User Uploads <?php if ($stats['pending_uploads']): ?><span class="badge bg-warning ms-1"><?php echo $stats['pending_uploads']; ?></span><?php endif; ?></a>
                        <a href="settings.php" class="btn btn-outline-secondary btn-sm text-start"><i class="fas fa-cog me-2"></i> Site Settings</a>
                        <a href="<?php echo SITE_URL; ?>/" target="_blank" class="btn btn-outline-success btn-sm text-start"><i class="fas fa-external-link-alt me-2"></i> View Website</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-1">
        <!-- Recent Messages -->
        <div class="col-lg-6">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fas fa-envelope"></i> Recent Messages</h5>
                    <a href="messages.php" class="btn btn-sm btn-link">View All</a>
                </div>
                <div class="admin-card-body p-0">
                    <table class="admin-table">
                        <thead><tr><th>Name</th><th>Subject</th><th>Date</th><th>Status</th></tr></thead>
                        <tbody>
                            <?php foreach ($recentMessages as $msg): ?>
                            <tr>
                                <td><?php echo e($msg['name']); ?></td>
                                <td><?php echo e(mb_strimwidth($msg['subject'] ?? 'No Subject', 0, 28, '…')); ?></td>
                                <td style="font-size:12px"><?php echo timeAgo($msg['created_at']); ?></td>
                                <td><?php echo $msg['is_read'] ? '<span class="badge bg-success">Read</span>' : '<span class="badge bg-warning text-dark">New</span>'; ?></td>
                            </tr>
                            <?php endforeach; ?>
                            <?php if (empty($recentMessages)): ?>
                            <tr><td colspan="4" class="text-center py-3 text-muted">No messages yet</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="col-lg-6">
            <div class="admin-card">
                <div class="admin-card-header"><h5><i class="fas fa-history"></i> Recent Activity</h5></div>
                <div class="admin-card-body">
                    <div class="activity-list">
                        <?php foreach ($recentActivity as $act): ?>
                        <div class="activity-item">
                            <div class="activity-icon"><i class="fas fa-circle" style="font-size:8px;color:#F55900"></i></div>
                            <div class="activity-content">
                                <p><?php echo e($act['description'] ?: $act['action']); ?></p>
                                <span><?php echo e($act['admin_name'] ?? 'System'); ?> · <?php echo timeAgo($act['created_at']); ?></span>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php if (empty($recentActivity)): ?>
                        <p class="text-center py-3 text-muted">No recent activity</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const viewsData = <?php echo json_encode($viewsData); ?>;
const labels = viewsData.map(v => {
    const d = new Date(v.view_date);
    return d.toLocaleDateString('en-IN', {month:'short', day:'numeric'});
});
const data = viewsData.map(v => parseInt(v.views));

new Chart(document.getElementById('viewsChart').getContext('2d'), {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'Page Views',
            data: data,
            borderColor: '#F55900',
            backgroundColor: 'rgba(245,89,0,0.08)',
            fill: true,
            tension: 0.4,
            pointBackgroundColor: '#F55900',
            pointRadius: 4
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: {
            y: { beginAtZero: true, grid: { color: 'rgba(0,0,0,0.05)' } },
            x: { grid: { display: false } }
        }
    }
});
</script>
<?php include __DIR__ . '/includes/admin-footer.php'; ?>
