<?php
/**
 * Ayodhya Ram Mandir - Admin Panel Header Template
 */

if (!isset($admin)) {
    $admin = getCurrentAdmin();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($pageTitle ?? 'Admin'); ?> - Ayodhya Ram Mandir</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs5.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <style>
        :root {
            --admin-primary: #F55900;
            --admin-secondary: #FF8237;
            --admin-accent: #FFAA6E;
            --admin-light: #FFD3A5;
            --admin-bg: #FFFEBC;
            --admin-sidebar: #1a1a2e;
            --admin-sidebar-hover: #16213e;
            --admin-card-bg: #fff;
        }
        
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: 'Inter', sans-serif;
            background: #f5f0e8;
            min-height: 100vh;
        }
        
        /* Sidebar */
        .admin-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 260px;
            height: 100vh;
            background: linear-gradient(180deg, var(--admin-sidebar) 0%, #0f0f23 100%);
            z-index: 1000;
            overflow-y: auto;
            transition: all 0.3s;
        }
        
        .sidebar-brand {
            padding: 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .sidebar-brand img {
            height: 40px;
        }
        
        .sidebar-brand h4 {
            font-family: 'Cinzel', serif;
            font-size: 14px;
            color: #fff;
            margin: 0;
        }
        
        .sidebar-brand span {
            font-size: 11px;
            color: var(--admin-accent);
        }
        
        .sidebar-nav {
            padding: 15px 0;
        }
        
        .sidebar-nav .nav-section {
            padding: 10px 20px 5px;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: rgba(255,255,255,0.4);
        }
        
        .sidebar-nav a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 20px;
            color: rgba(255,255,255,0.7);
            font-size: 13px;
            transition: all 0.3s;
            text-decoration: none;
            border-left: 3px solid transparent;
        }
        
        .sidebar-nav a:hover,
        .sidebar-nav a.active {
            background: var(--admin-sidebar-hover);
            color: #fff;
            border-left-color: var(--admin-primary);
        }
        
        .sidebar-nav a i {
            width: 20px;
            text-align: center;
        }
        
        /* Main Content */
        .admin-main {
            margin-left: 260px;
            min-height: 100vh;
        }
        
        /* Topbar */
        .admin-topbar {
            background: #fff;
            padding: 12px 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .topbar-left h4 {
            font-family: 'Cinzel', serif;
            font-size: 18px;
            color: var(--admin-primary);
            margin: 0;
        }
        
        .topbar-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .topbar-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--admin-primary), var(--admin-secondary));
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 14px;
        }
        
        .admin-content {
            padding: 25px;
        }
        
        /* Stat Cards */
        .stat-card {
            background: #fff;
            border-radius: 16px;
            padding: 25px;
            display: flex;
            align-items: center;
            gap: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            transition: all 0.3s;
        }
        
        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }
        
        .stat-icon {
            width: 55px;
            height: 55px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 22px;
        }
        
        .stat-info h3 {
            font-size: 24px;
            font-weight: 700;
            color: #2d2d2d;
            margin: 0;
        }
        
        .stat-info p {
            font-size: 13px;
            color: #888;
            margin: 0;
        }
        
        /* Alert Cards */
        .alert-card {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 15px 20px;
            border-radius: 12px;
            font-size: 13px;
        }
        
        .alert-card i {
            font-size: 20px;
        }
        
        .alert-card strong {
            font-size: 18px;
            display: block;
        }
        
        .alert-card a {
            font-size: 12px;
            font-weight: 600;
            text-decoration: underline;
        }
        
        .alert-warning-card { background: #fff8e1; color: #e65100; }
        .alert-info-card { background: #e3f2fd; color: #1565c0; }
        .alert-success-card { background: #e8f5e9; color: #2e7d32; }
        
        /* Admin Cards */
        .admin-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            overflow: hidden;
        }
        
        .admin-card-header {
            padding: 18px 20px;
            border-bottom: 1px solid #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .admin-card-header h5 {
            font-size: 15px;
            font-weight: 600;
            margin: 0;
            color: #2d2d2d;
        }
        
        .admin-card-header h5 i {
            color: var(--admin-primary);
            margin-right: 8px;
        }
        
        .admin-card-header a {
            font-size: 12px;
            color: var(--admin-primary);
            font-weight: 500;
        }
        
        .admin-card-body {
            padding: 20px;
        }
        
        /* Tables */
        .admin-table {
            width: 100%;
            font-size: 13px;
        }
        
        .admin-table thead th {
            background: #f8f9fa;
            padding: 12px 15px;
            font-weight: 600;
            color: #555;
            border-bottom: 2px solid #e0e0e0;
            white-space: nowrap;
        }
        
        .admin-table tbody td {
            padding: 12px 15px;
            border-bottom: 1px solid #f0f0f0;
            vertical-align: middle;
        }
        
        .admin-table tbody tr:hover {
            background: #fafafa;
        }
        
        /* Quick Actions */
        .quick-actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }
        
        .quick-action-btn {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 15px;
            background: #f8f9fa;
            border-radius: 10px;
            color: #2d2d2d;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .quick-action-btn:hover {
            background: var(--admin-primary);
            color: #fff;
        }
        
        .quick-action-btn i {
            color: var(--admin-primary);
        }
        
        .quick-action-btn:hover i {
            color: #fff;
        }
        
        /* Activity List */
        .activity-list {
            max-height: 300px;
            overflow-y: auto;
        }
        
        .activity-item {
            display: flex;
            gap: 12px;
            padding: 10px 0;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .activity-icon {
            color: var(--admin-accent);
            padding-top: 3px;
        }
        
        .activity-content p {
            font-size: 13px;
            margin: 0;
            color: #2d2d2d;
        }
        
        .activity-content span {
            font-size: 11px;
            color: #888;
        }
        
        /* Forms */
        .admin-form .form-label {
            font-size: 13px;
            font-weight: 500;
            color: #555;
        }
        
        .admin-form .form-control,
        .admin-form .form-select {
            border: 2px solid #e8e8e8;
            border-radius: 10px;
            padding: 10px 14px;
            font-size: 13px;
        }
        
        .admin-form .form-control:focus,
        .admin-form .form-select:focus {
            border-color: var(--admin-secondary);
            box-shadow: 0 0 0 3px rgba(255, 130, 55, 0.1);
        }
        
        /* Buttons */
        .btn-admin-primary {
            background: linear-gradient(135deg, var(--admin-primary), var(--admin-secondary));
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 10px 24px;
            font-weight: 600;
            font-size: 13px;
        }
        
        .btn-admin-primary:hover {
            color: #fff;
            box-shadow: 0 4px 15px rgba(245, 89, 0, 0.3);
        }
        
        .btn-admin-secondary {
            background: #f0f0f0;
            color: #555;
            border: none;
            border-radius: 10px;
            padding: 10px 24px;
            font-weight: 500;
            font-size: 13px;
        }
        
        /* Status Badges */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 500;
        }
        
        .status-published { background: #e8f5e9; color: #2e7d32; }
        .status-draft { background: #fff3e0; color: #e65100; }
        .status-pending { background: #e3f2fd; color: #1565c0; }
        .status-approved { background: #e8f5e9; color: #2e7d32; }
        .status-rejected { background: #ffebee; color: #c62828; }
        
        /* Summernote fix */
        .note-editor {
            border-radius: 10px !important;
            border: 2px solid #e8e8e8 !important;
        }
        
        /* Responsive */
        @media (max-width: 991px) {
            .admin-sidebar {
                transform: translateX(-100%);
            }
            .admin-sidebar.show {
                transform: translateX(0);
            }
            .admin-main {
                margin-left: 0;
            }
            .quick-actions {
                grid-template-columns: 1fr;
            }
        }
        
        /* Modal */
        .admin-modal .modal-content {
            border-radius: 16px;
            border: none;
        }
        
        .admin-modal .modal-header {
            border-bottom: 1px solid #f0f0f0;
            padding: 18px 24px;
        }
        
        .admin-modal .modal-body {
            padding: 24px;
        }
        
        /* Media Upload Preview */
        .media-preview {
            width: 100%;
            max-height: 200px;
            object-fit: cover;
            border-radius: 10px;
            border: 2px dashed #ddd;
        }
        
        /* Tabs */
        .admin-tabs .nav-link {
            font-size: 13px;
            font-weight: 500;
            color: #888;
            padding: 10px 18px;
            border: none;
            border-bottom: 2px solid transparent;
        }
        
        .admin-tabs .nav-link.active {
            color: var(--admin-primary);
            border-bottom-color: var(--admin-primary);
            background: none;
        }
        
        /* Toast */
        .admin-toast {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            min-width: 300px;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <aside class="admin-sidebar" id="adminSidebar">
        <div class="sidebar-brand">
            <img src="<?php echo assetUrl('images/logo.png'); ?>" alt="Logo" onerror="this.style.display='none'">
            <div>
                <h4><i class="fas fa-om"></i> Ayodhya Ram Mandir</h4>
                <span>Admin Panel</span>
            </div>
        </div>
        
        <nav class="sidebar-nav">
            <?php 
            // FontAwesome icon mapping
            $faIconMap = [
                'dashboard'  => 'tachometer-alt',
                'image'      => 'image',
                'menu'       => 'bars',
                'scroll'     => 'scroll',
                'hero'       => 'images',
                'home'       => 'home',
                'info'       => 'info-circle',
                'file'       => 'file-alt',
                'book'       => 'book-open',
                'fire'       => 'fire',
                'heart'      => 'heart',
                'map'        => 'map',
                'landmark'   => 'landmark',
                'blog'       => 'blog',
                'categories' => 'th-list',
                'om'         => 'om',
                'music'      => 'music',
                'video'      => 'video',
                'star'       => 'star',
                'calendar'   => 'calendar-alt',
                'sun'        => 'sun',
                'quote'      => 'quote-right',
                'festival'   => 'dharmachakra',
                'images'     => 'images',
                'upload'     => 'upload',
                'reviews'    => 'star-half-alt',
                'robot'      => 'robot',
                'donation'   => 'donate',
                'message'    => 'envelope',
                'map-pin'    => 'map-marker-alt',
                'seo'        => 'search',
                'ad'         => 'ad',
                'faq'        => 'question-circle',
                'link'       => 'link',
                'users'      => 'users',
                'chart'      => 'chart-line',
                'settings'   => 'cog',
                'shield'     => 'shield-alt',
                'backup'     => 'database',
            ];
            // Show only built pages (others redirect to 404)
            $builtPages = ['dashboard','hero','gallery','announcements','city-pages','user-uploads','messages','settings'];
            $menuItems = getAdminSidebarMenu();
            $currentUri = $_SERVER['REQUEST_URI'] ?? '';
            foreach ($menuItems as $item):
                $page = basename($item['url'], '.php');
                if (!in_array($page, $builtPages)) continue;
                $isActive = strpos($currentUri, $page) !== false;
                $faIcon = $faIconMap[$item['icon']] ?? $item['icon'];
            ?>
            <a href="<?php echo SITE_URL . $item['url']; ?>" class="<?php echo $isActive ? 'active' : ''; ?>">
                <i class="fas fa-<?php echo $faIcon; ?>"></i>
                <?php echo e($item['label']); ?>
            </a>
            <?php endforeach; ?>
            
            <div class="nav-section">Account</div>
            <a href="<?php echo ADMIN_URL; ?>/logout.php">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </nav>
    </aside>
    
    <!-- Main -->
    <div class="admin-main">
        <!-- Topbar -->
        <header class="admin-topbar">
            <div class="topbar-left">
                <h4><i class="fas fa-om" style="color: var(--admin-primary);"></i> <?php echo e($pageTitle ?? 'Dashboard'); ?></h4>
            </div>
            <div class="topbar-right">
                <a href="<?php echo SITE_URL; ?>/" target="_blank" class="btn btn-sm btn-outline-secondary">
                    <i class="fas fa-external-link-alt"></i> View Site
                </a>
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" style="border: none; background: none;">
                        <div class="d-flex align-items-center gap-2">
                            <div class="topbar-avatar"><?php echo strtoupper(substr($admin['name'], 0, 1)); ?></div>
                            <span style="font-size: 13px; font-weight: 500;"><?php echo e($admin['name']); ?></span>
                        </div>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="<?php echo ADMIN_URL; ?>/profile.php"><i class="fas fa-user"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="<?php echo ADMIN_URL; ?>/settings.php"><i class="fas fa-cog"></i> Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="<?php echo ADMIN_URL; ?>/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </header>
        
        <!-- Content -->
        <div class="admin-content">