<?php
/**
 * Ayodhya Ram Mandir - Authentication & Session Management
 */

require_once __DIR__ . '/functions.php';

// Start session
if (session_status() === PHP_SESSION_NONE) {
    session_name(SESSION_NAME);
    session_start();
}

/**
 * Check if admin is logged in
 */
function isAdminLoggedIn() {
    return isset($_SESSION['admin_id']) && 
           isset($_SESSION['admin_logged_in']) && 
           $_SESSION['admin_logged_in'] === true &&
           !empty($_SESSION['admin_role']);
}

/**
 * Get current admin data
 */
function getCurrentAdmin() {
    if (!isAdminLoggedIn()) return null;
    
    static $admin = null;
    if ($admin === null) {
        $admin = dbFetch("SELECT id, username, name, email, role, status, last_login FROM admins WHERE id = ? AND status = 1", [$_SESSION['admin_id']]);
    }
    return $admin;
}

/**
 * Require admin login
 */
function requireAdminLogin() {
    if (!isAdminLoggedIn()) {
        setFlash('error', 'Please login to access the admin panel.');
        redirect(ADMIN_URL . '/login.php');
    }
    
    // Check session timeout
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > SESSION_LIFETIME)) {
        adminLogout();
        setFlash('error', 'Session expired. Please login again.');
        redirect(ADMIN_URL . '/login.php');
    }
    
    $_SESSION['last_activity'] = time();
}

/**
 * Require specific admin role
 */
function requireAdminRole($requiredRole) {
    requireAdminLogin();
    
    $roles = ['super_admin' => 3, 'admin' => 2, 'editor' => 1];
    $currentRole = $_SESSION['admin_role'] ?? 'editor';
    
    if (!isset($roles[$currentRole]) || $roles[$currentRole] < ($roles[$requiredRole] ?? 0)) {
        setFlash('error', 'You do not have permission to access this page.');
        redirect(ADMIN_URL . '/dashboard.php');
    }
}

/**
 * Admin login
 */
function adminLogin($username, $password) {
    // Check login attempts
    $ip = $_SERVER['REMOTE_ADDR'] ?? '';
    $attemptKey = 'login_attempts_' . md5($ip . $username);
    
    if (isset($_SESSION[$attemptKey]) && $_SESSION[$attemptKey] >= MAX_LOGIN_ATTEMPTS) {
        if (isset($_SESSION[$attemptKey . '_time']) && (time() - $_SESSION[$attemptKey . '_time']) < LOGIN_LOCKOUT_TIME) {
            return ['success' => false, 'error' => 'Too many login attempts. Please try again after ' . ceil((LOGIN_LOCKOUT_TIME - (time() - $_SESSION[$attemptKey . '_time'])) / 60) . ' minutes.'];
        }
        unset($_SESSION[$attemptKey]);
        unset($_SESSION[$attemptKey . '_time']);
    }
    
    $admin = dbFetch("SELECT * FROM admins WHERE username = ? AND status = 1", [$username]);
    
    if (!$admin || !verifyPassword($password, $admin['password'])) {
        // Track failed attempt
        $_SESSION[$attemptKey] = ($_SESSION[$attemptKey] ?? 0) + 1;
        if ($_SESSION[$attemptKey] >= MAX_LOGIN_ATTEMPTS) {
            $_SESSION[$attemptKey . '_time'] = time();
        }
        return ['success' => false, 'error' => 'Invalid username or password.'];
    }
    
    // Successful login
    $_SESSION['admin_id'] = $admin['id'];
    $_SESSION['admin_username'] = $admin['username'];
    $_SESSION['admin_name'] = $admin['name'];
    $_SESSION['admin_role'] = $admin['role'];
    $_SESSION['admin_logged_in'] = true;
    $_SESSION['last_activity'] = time();
    
    // Clear failed attempts
    unset($_SESSION[$attemptKey]);
    unset($_SESSION[$attemptKey . '_time']);
    
    // Update last login (SQLite-compatible)
    dbQuery("UPDATE admins SET last_login = datetime('now','localtime') WHERE id = ?", [$admin['id']]);
    
    // Log activity
    logAdminActivity('login', 'Admin logged in successfully');
    
    return ['success' => true];
}

/**
 * Admin logout
 */
function adminLogout() {
    if (isset($_SESSION['admin_id'])) {
        logAdminActivity('logout', 'Admin logged out');
    }
    
    session_unset();
    session_destroy();
    
    // Start fresh session
    session_name(SESSION_NAME);
    session_start();
}

/**
 * Generate password reset token
 */
function generatePasswordResetToken($email) {
    $admin = dbFetch("SELECT id FROM admins WHERE email = ? AND status = 1", [$email]);
    if (!$admin) return false;
    
    $token = bin2hex(random_bytes(32));
    $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));
    
    // Store token in settings temporarily
    dbQuery(
        "INSERT INTO settings (setting_key, setting_value) VALUES (?, ?) 
         ON DUPLICATE KEY UPDATE setting_value = ?",
        ["reset_token_" . $admin['id'], $token . '|' . $expires, $token . '|' . $expires]
    );
    
    return $token;
}

/**
 * Verify password reset token
 */
function verifyResetToken($token) {
    $settings = dbFetchAll("SELECT setting_key, setting_value FROM settings WHERE setting_key LIKE 'reset_token_%'");
    
    foreach ($settings as $setting) {
        $parts = explode('|', $setting['setting_value']);
        if ($parts[0] === $token && strtotime($parts[1]) > time()) {
            $adminId = str_replace('reset_token_', '', $setting['setting_key']);
            return (int)$adminId;
        }
    }
    
    return false;
}

/**
 * Reset password
 */
function resetPassword($adminId, $newPassword) {
    $hashed = hashPassword($newPassword);
    dbQuery("UPDATE admins SET password = ? WHERE id = ?", [$hashed, $adminId]);
    dbQuery("DELETE FROM settings WHERE setting_key = ?", ["reset_token_" . $adminId]);
    logAdminActivity('password_reset', 'Password reset for admin ID: ' . $adminId);
    return true;
}

/**
 * Get admin sidebar menu
 */
function getAdminSidebarMenu() {
    $menu = [
        ['icon' => 'dashboard', 'label' => 'Dashboard', 'url' => '/admin/dashboard.php', 'roles' => ['super_admin', 'admin', 'editor']],
        ['icon' => 'image', 'label' => 'Logo & Media', 'url' => '/admin/logo-media.php', 'roles' => ['super_admin', 'admin']],
        ['icon' => 'menu', 'label' => 'Menu Manager', 'url' => '/admin/menu.php', 'roles' => ['super_admin', 'admin']],
        ['icon' => 'scroll', 'label' => 'Marquee', 'url' => '/admin/marquee.php', 'roles' => ['super_admin', 'admin', 'editor']],
        ['icon' => 'hero', 'label' => 'Hero Section', 'url' => '/admin/hero.php', 'roles' => ['super_admin', 'admin', 'editor']],
        ['icon' => 'home', 'label' => 'Home Sections', 'url' => '/admin/home-sections.php', 'roles' => ['super_admin', 'admin', 'editor']],
        ['icon' => 'info', 'label' => 'About Sections', 'url' => '/admin/about-sections.php', 'roles' => ['super_admin', 'admin', 'editor']],
        ['icon' => 'file', 'label' => 'Pages', 'url' => '/admin/pages.php', 'roles' => ['super_admin', 'admin', 'editor']],
        ['icon' => 'book', 'label' => 'Ramayan Chapters', 'url' => '/admin/ramayan-chapters.php', 'roles' => ['super_admin', 'admin', 'editor']],
        ['icon' => 'fire', 'label' => 'Hanuman Chapters', 'url' => '/admin/hanuman-chapters.php', 'roles' => ['super_admin', 'admin', 'editor']],
        ['icon' => 'heart', 'label' => 'Mata Sita Chapters', 'url' => '/admin/sita-chapters.php', 'roles' => ['super_admin', 'admin', 'editor']],
        ['icon' => 'map', 'label' => 'Travel Pages', 'url' => '/admin/travel-pages.php', 'roles' => ['super_admin', 'admin', 'editor']],
        ['icon' => 'landmark', 'label' => 'Places to Visit', 'url' => '/admin/places.php', 'roles' => ['super_admin', 'admin', 'editor']],
        ['icon' => 'blog', 'label' => 'Blog', 'url' => '/admin/blog.php', 'roles' => ['super_admin', 'admin', 'editor']],
        ['icon' => 'categories', 'label' => 'Blog Categories', 'url' => '/admin/blog-categories.php', 'roles' => ['super_admin', 'admin', 'editor']],
        ['icon' => 'om', 'label' => 'Aarti Links', 'url' => '/admin/aarti.php', 'roles' => ['super_admin', 'admin', 'editor']],
        ['icon' => 'music', 'label' => 'Bhajans', 'url' => '/admin/bhajans.php', 'roles' => ['super_admin', 'admin', 'editor']],
        ['icon' => 'video', 'label' => 'Instagram Reels', 'url' => '/admin/reels.php', 'roles' => ['super_admin', 'admin', 'editor']],
        ['icon' => 'star', 'label' => 'Kundli & Milan', 'url' => '/admin/kundli.php', 'roles' => ['super_admin', 'admin', 'editor']],
        ['icon' => 'calendar', 'label' => 'Rashifal', 'url' => '/admin/rashifal.php', 'roles' => ['super_admin', 'admin', 'editor']],
        ['icon' => 'sun', 'label' => 'Panchang', 'url' => '/admin/panchang.php', 'roles' => ['super_admin', 'admin', 'editor']],
        ['icon' => 'quote', 'label' => 'Daily Suvichar', 'url' => '/admin/suvichar.php', 'roles' => ['super_admin', 'admin', 'editor']],
        ['icon' => 'festival', 'label' => 'Festival Calendar', 'url' => '/admin/festivals.php', 'roles' => ['super_admin', 'admin', 'editor']],
        ['icon' => 'images', 'label' => 'Gallery', 'url' => '/admin/gallery.php', 'roles' => ['super_admin', 'admin', 'editor']],
        ['icon' => 'upload', 'label' => 'User Uploads', 'url' => '/admin/user-uploads.php', 'roles' => ['super_admin', 'admin', 'editor']],
        ['icon' => 'reviews', 'label' => 'Reviews', 'url' => '/admin/reviews.php', 'roles' => ['super_admin', 'admin', 'editor']],
        ['icon' => 'robot', 'label' => 'Chatbot FAQs', 'url' => '/admin/chatbot.php', 'roles' => ['super_admin', 'admin', 'editor']],
        ['icon' => 'donation', 'label' => 'Donation/Prasad', 'url' => '/admin/donation.php', 'roles' => ['super_admin', 'admin']],
        ['icon' => 'message', 'label' => 'Contact Messages', 'url' => '/admin/messages.php', 'roles' => ['super_admin', 'admin']],
        ['icon' => 'map-pin', 'label' => 'Google Map', 'url' => '/admin/google-map.php', 'roles' => ['super_admin', 'admin']],
        ['icon' => 'seo', 'label' => 'SEO Meta', 'url' => '/admin/seo.php', 'roles' => ['super_admin', 'admin']],
        ['icon' => 'ad', 'label' => 'AdSense', 'url' => '/admin/adsense.php', 'roles' => ['super_admin', 'admin']],
        ['icon' => 'faq', 'label' => 'FAQ Manager', 'url' => '/admin/faq.php', 'roles' => ['super_admin', 'admin', 'editor']],
        ['icon' => 'link', 'label' => 'Footer Links', 'url' => '/admin/footer-links.php', 'roles' => ['super_admin', 'admin']],
        ['icon' => 'users', 'label' => 'Subscribers', 'url' => '/admin/subscribers.php', 'roles' => ['super_admin', 'admin']],
        ['icon' => 'chart', 'label' => 'Analytics', 'url' => '/admin/analytics.php', 'roles' => ['super_admin', 'admin']],
        ['icon' => 'settings', 'label' => 'Site Settings', 'url' => '/admin/settings.php', 'roles' => ['super_admin']],
        ['icon' => 'shield', 'label' => 'Admins', 'url' => '/admin/admins.php', 'roles' => ['super_admin']],
        ['icon' => 'backup', 'label' => 'Backup', 'url' => '/admin/backup.php', 'roles' => ['super_admin']],
    ];
    
    // Filter by role
    $currentRole = $_SESSION['admin_role'] ?? 'editor';
    return array_filter($menu, function($item) use ($currentRole) {
        return in_array($currentRole, $item['roles']);
    });
}
