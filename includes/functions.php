<?php
/**
 * Ayodhya Ram Mandir - Core Functions
 * All helper functions for the website
 */

require_once __DIR__ . '/../config/database.php';

// ============================================
// SITE SETTINGS FUNCTIONS
// ============================================

/**
 * Get a site setting value
 */
function getSetting($key, $default = '') {
    static $settings = null;
    if ($settings === null) {
        $settings = [];
        try {
            $rows = dbFetchAll("SELECT setting_key, setting_value FROM settings");
            foreach ($rows as $row) {
                $settings[$row['setting_key']] = $row['setting_value'];
            }
        } catch (Exception $e) {
            error_log("Settings load error: " . $e->getMessage());
        }
    }
    return isset($settings[$key]) ? $settings[$key] : $default;
}

/**
 * Get all settings by group
 */
function getSettingsByGroup($group) {
    return dbFetchAll("SELECT * FROM settings WHERE setting_group = ?", [$group]);
}

// ============================================
// LANGUAGE FUNCTIONS
// ============================================

/**
 * Get current language
 */
function getCurrentLang() {
    if (isset($_SESSION['lang']) && in_array($_SESSION['lang'], ['en', 'hi'])) {
        return $_SESSION['lang'];
    }
    // Check URL parameter
    if (isset($_GET['lang']) && in_array($_GET['lang'], ['en', 'hi'])) {
        $_SESSION['lang'] = $_GET['lang'];
        return $_GET['lang'];
    }
    // Default to Hindi for this devotional site
    return 'hi';
}

/**
 * Get text based on current language
 */
function __t($en, $hi = '') {
    $lang = getCurrentLang();
    if ($lang === 'hi' && !empty($hi)) {
        return $hi;
    }
    return $en;
}

/**
 * Switch language URL
 */
function switchLangUrl($lang) {
    $url = $_SERVER['REQUEST_URI'];
    $url = preg_replace('/[?&]lang=[a-z]{2}/', '', $url);
    $separator = (strpos($url, '?') !== false) ? '&' : '?';
    return $url . $separator . 'lang=' . $lang;
}

// ============================================
// SECURITY FUNCTIONS
// ============================================

/**
 * Generate CSRF Token
 */
function generateCSRFToken() {
    if (empty($_SESSION[CSRF_TOKEN_NAME])) {
        $_SESSION[CSRF_TOKEN_NAME] = bin2hex(random_bytes(32));
    }
    return $_SESSION[CSRF_TOKEN_NAME];
}

/**
 * Verify CSRF Token
 */
function verifyCSRFToken($token) {
    return isset($_SESSION[CSRF_TOKEN_NAME]) && hash_equals($_SESSION[CSRF_TOKEN_NAME], $token);
}

/**
 * Get CSRF Token Field
 */
function csrfField() {
    return '<input type="hidden" name="' . CSRF_TOKEN_NAME . '" value="' . generateCSRFToken() . '">';
}

/**
 * Sanitize input
 */
function cleanInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

/**
 * Sanitize output for display
 */
function e($string) {
    return htmlspecialchars($string ?? '', ENT_QUOTES, 'UTF-8');
}

/**
 * Generate random string
 */
function generateRandomString($length = 16) {
    return bin2hex(random_bytes($length / 2));
}

/**
 * Hash password
 */
function hashPassword($password) {
    return password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
}

/**
 * Verify password
 */
function verifyPassword($password, $hash) {
    return password_verify($password, $hash);
}

// ============================================
// URL & REDIRECT FUNCTIONS
// ============================================

/**
 * Get current page slug
 */
function getCurrentSlug() {
    $uri = $_SERVER['REQUEST_URI'];
    $uri = parse_url($uri, PHP_URL_PATH);
    $uri = trim($uri, '/');
    return $uri;
}

/**
 * Get page URL
 */
function pageUrl($slug) {
    return SITE_URL . '/' . ltrim($slug, '/');
}

/**
 * Get asset URL
 */
function assetUrl($path) {
    return ASSETS_URL . '/' . ltrim($path, '/');
}

/**
 * Redirect
 */
function redirect($url) {
    header("Location: " . $url);
    exit();
}

/**
 * Refresh page
 */
function refresh() {
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit();
}

// ============================================
// FLASH MESSAGES
// ============================================

/**
 * Set flash message
 */
function setFlash($type, $message) {
    $_SESSION['flash'] = ['type' => $type, 'message' => $message];
}

/**
 * Get flash message
 */
function getFlash() {
    if (isset($_SESSION['flash'])) {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }
    return null;
}

/**
 * Display flash message
 */
function showFlash() {
    $flash = getFlash();
    if ($flash) {
        $alertClass = match($flash['type']) {
            'success' => 'alert-success',
            'error' => 'alert-danger',
            'warning' => 'alert-warning',
            'info' => 'alert-info',
            default => 'alert-info'
        };
        echo '<div class="alert ' . $alertClass . ' alert-dismissible fade show" role="alert">';
        echo e($flash['message']);
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
    }
}

// ============================================
// PAGINATION
// ============================================

/**
 * Get pagination data
 */
function getPagination($total, $page = 1, $perPage = 12) {
    $page = max(1, intval($page));
    $totalPages = ceil($total / $perPage);
    $page = min($page, max(1, $totalPages));
    $offset = ($page - 1) * $perPage;
    
    return [
        'page' => $page,
        'perPage' => $perPage,
        'total' => $total,
        'totalPages' => $totalPages,
        'offset' => $offset,
        'hasPrev' => $page > 1,
        'hasNext' => $page < $totalPages
    ];
}

/**
 * Render pagination HTML
 */
function renderPagination($pagination, $baseUrl) {
    if ($pagination['totalPages'] <= 1) return '';
    
    $html = '<nav class="pagination-nav"><ul class="pagination">';
    
    // Previous
    if ($pagination['hasPrev']) {
        $html .= '<li><a href="' . $baseUrl . '?page=' . ($pagination['page'] - 1) . '" class="prev">&laquo; Prev</a></li>';
    }
    
    // Page numbers
    $start = max(1, $pagination['page'] - 2);
    $end = min($pagination['totalPages'], $pagination['page'] + 2);
    
    if ($start > 1) {
        $html .= '<li><a href="' . $baseUrl . '?page=1">1</a></li>';
        if ($start > 2) $html .= '<li class="dots">...</li>';
    }
    
    for ($i = $start; $i <= $end; $i++) {
        $active = $i == $pagination['page'] ? 'active' : '';
        $html .= '<li><a href="' . $baseUrl . '?page=' . $i . '" class="' . $active . '">' . $i . '</a></li>';
    }
    
    if ($end < $pagination['totalPages']) {
        if ($end < $pagination['totalPages'] - 1) $html .= '<li class="dots">...</li>';
        $html .= '<li><a href="' . $baseUrl . '?page=' . $pagination['totalPages'] . '">' . $pagination['totalPages'] . '</a></li>';
    }
    
    // Next
    if ($pagination['hasNext']) {
        $html .= '<li><a href="' . $baseUrl . '?page=' . ($pagination['page'] + 1) . '" class="next">Next &raquo;</a></li>';
    }
    
    $html .= '</ul></nav>';
    return $html;
}

// ============================================
// IMAGE FUNCTIONS
// ============================================

/**
 * Get image URL with fallback
 */
function getImageUrl($image, $fallback = 'assets/images/placeholder.jpg') {
    if (!empty($image)) {
        $path = ROOT_PATH . '/' . $image;
        if (file_exists($path)) {
            return SITE_URL . '/' . $image;
        }
    }
    return SITE_URL . '/' . $fallback;
}

/**
 * Upload image
 */
function uploadImage($file, $folder = 'general', $maxSize = 5242880) {
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    $uploadDir = UPLOADS_PATH . '/' . $folder . '/';
    
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }
    
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return ['success' => false, 'error' => 'Upload failed'];
    }
    
    if (!in_array($file['type'], $allowedTypes)) {
        return ['success' => false, 'error' => 'Invalid file type. Only JPG, PNG, GIF, WebP allowed.'];
    }
    
    if ($file['size'] > $maxSize) {
        return ['success' => false, 'error' => 'File too large. Max ' . ($maxSize / 1048576) . 'MB'];
    }
    
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = generateRandomString(16) . '_' . time() . '.' . $ext;
    $filepath = $uploadDir . $filename;
    
    if (move_uploaded_file($file['tmp_name'], $filepath)) {
        return [
            'success' => true,
            'filename' => $filename,
            'path' => 'assets/uploads/' . $folder . '/' . $filename,
            'url' => SITE_URL . '/assets/uploads/' . $folder . '/' . $filename
        ];
    }
    
    return ['success' => false, 'error' => 'Failed to save file'];
}

// ============================================
// SEO FUNCTIONS
// ============================================

/**
 * Get SEO meta for a page
 */
function getSeoMeta($pageType, $pageId = 0, $pageSlug = '') {
    $seo = dbFetch(
        "SELECT * FROM seo_meta WHERE page_type = ? AND (page_id = ? OR page_slug = ?) LIMIT 1",
        [$pageType, $pageId, $pageSlug]
    );
    
    if (!$seo) {
        return [
            'meta_title' => getSetting('seo_default_title'),
            'meta_description' => getSetting('seo_default_description'),
            'meta_keywords' => getSetting('seo_default_keywords'),
            'og_title' => getSetting('seo_default_title'),
            'og_description' => getSetting('seo_default_description'),
            'og_image' => SITE_URL . '/assets/images/og-image.jpg',
            'og_type' => 'website',
            'twitter_card' => 'summary_large_image',
            'canonical_url' => SITE_URL . $_SERVER['REQUEST_URI'],
            'schema_markup' => '',
            'hreflang_hi' => '',
            'hreflang_en' => '',
            'robots_meta' => 'index, follow'
        ];
    }
    
    return $seo;
}

/**
 * Render SEO meta tags
 */
function renderSeoMeta($seo) {
    $html = '';
    $html .= '<title>' . e($seo['meta_title']) . '</title>' . PHP_EOL;
    $html .= '<meta name="description" content="' . e($seo['meta_description']) . '">' . PHP_EOL;
    $html .= '<meta name="keywords" content="' . e($seo['meta_keywords']) . '">' . PHP_EOL;
    $html .= '<meta name="robots" content="' . e($seo['robots_meta']) . '">' . PHP_EOL;
    $html .= '<link rel="canonical" href="' . e($seo['canonical_url']) . '">' . PHP_EOL;
    
    // Open Graph
    $html .= '<meta property="og:title" content="' . e($seo['og_title'] ?? $seo['meta_title']) . '">' . PHP_EOL;
    $html .= '<meta property="og:description" content="' . e($seo['og_description'] ?? $seo['meta_description']) . '">' . PHP_EOL;
    $html .= '<meta property="og:image" content="' . e($seo['og_image']) . '">' . PHP_EOL;
    $html .= '<meta property="og:type" content="' . e($seo['og_type']) . '">' . PHP_EOL;
    $html .= '<meta property="og:url" content="' . e($seo['canonical_url']) . '">' . PHP_EOL;
    $html .= '<meta property="og:site_name" content="' . e(getSetting('site_name')) . '">' . PHP_EOL;
    
    // Twitter
    $html .= '<meta name="twitter:card" content="' . e($seo['twitter_card']) . '">' . PHP_EOL;
    $html .= '<meta name="twitter:title" content="' . e($seo['og_title'] ?? $seo['meta_title']) . '">' . PHP_EOL;
    $html .= '<meta name="twitter:description" content="' . e($seo['og_description'] ?? $seo['meta_description']) . '">' . PHP_EOL;
    $html .= '<meta name="twitter:image" content="' . e($seo['og_image']) . '">' . PHP_EOL;
    
    // Hreflang
    if (!empty($seo['hreflang_hi'])) {
        $html .= '<link rel="alternate" hreflang="hi" href="' . e($seo['hreflang_hi']) . '">' . PHP_EOL;
    }
    if (!empty($seo['hreflang_en'])) {
        $html .= '<link rel="alternate" hreflang="en" href="' . e($seo['hreflang_en']) . '">' . PHP_EOL;
    }
    $html .= '<link rel="alternate" hreflang="x-default" href="' . e($seo['canonical_url']) . '">' . PHP_EOL;
    
    // Schema
    if (!empty($seo['schema_markup'])) {
        $html .= '<script type="application/ld+json">' . $seo['schema_markup'] . '</script>' . PHP_EOL;
    }
    
    return $html;
}

// ============================================
// MENU FUNCTIONS
// ============================================

/**
 * Get menu items
 */
function getMenuItems($menuType = 'main', $parentId = 0) {
    return dbFetchAll(
        "SELECT * FROM menu_items WHERE menu_type = ? AND parent_id = ? AND status = 1 ORDER BY sort_order",
        [$menuType, $parentId]
    );
}

/**
 * Get menu with children
 */
function getMenuTree($menuType = 'main') {
    $items = dbFetchAll(
        "SELECT * FROM menu_items WHERE menu_type = ? AND status = 1 ORDER BY parent_id, sort_order",
        [$menuType]
    );
    
    $tree = [];
    $children = [];
    
    foreach ($items as $item) {
        if ($item['parent_id'] == 0) {
            $tree[$item['id']] = $item;
            $tree[$item['id']]['children'] = [];
        } else {
            $children[$item['parent_id']][] = $item;
        }
    }
    
    foreach ($children as $parentId => $childItems) {
        if (isset($tree[$parentId])) {
            $tree[$parentId]['children'] = $childItems;
        }
    }
    
    return $tree;
}

// ============================================
// MARQUEE FUNCTIONS
// ============================================

/**
 * Get active marquee announcements
 */
function getMarqueeAnnouncements() {
    return dbFetchAll(
        "SELECT * FROM marquee_announcements WHERE status = 1 ORDER BY sort_order"
    );
}

// ============================================
// PAGE VIEW TRACKING
// ============================================

/**
 * Track page view
 */
function trackPageView($pageType, $pageId = 0, $pageSlug = '') {
    try {
        $viewDate = date('Y-m-d');
        $viewHour = (int)date('H');
        dbQuery(
            "INSERT INTO page_views (page_type, page_id, page_slug, ip_address, user_agent, referrer, view_date, view_hour) 
             VALUES (?, ?, ?, ?, ?, ?, ?, ?)",
            [
                $pageType, $pageId, $pageSlug,
                $_SERVER['REMOTE_ADDR'] ?? '',
                $_SERVER['HTTP_USER_AGENT'] ?? '',
                $_SERVER['HTTP_REFERER'] ?? '',
                $viewDate,
                $viewHour
            ]
        );
    } catch (Exception $e) {
        error_log("Page view tracking error: " . $e->getMessage());
    }
}

// ============================================
// ADSENSE FUNCTIONS
// ============================================

/**
 * Get AdSense code by position
 */
function getAdSenseCode($position, $pageType = 'all') {
    if (getSetting('adsense_enabled') != '1') return '';
    
    $ad = dbFetch(
        "SELECT slot_code FROM adsense_codes 
         WHERE slot_position = ? AND (page_type = ? OR page_type = 'all') AND is_active = 1 
         LIMIT 1",
        [$position, $pageType]
    );
    
    return $ad ? $ad['slot_code'] : '';
}

// ============================================
// UTILITY FUNCTIONS
// ============================================

/**
 * Format date
 */
function formatDate($date, $format = 'd M, Y') {
    return date($format, strtotime($date));
}

/**
 * Format datetime
 */
function formatDateTime($datetime, $format = 'd M, Y h:i A') {
    return date($format, strtotime($datetime));
}

/**
 * Truncate text
 */
function truncateText($text, $length = 150) {
    if (strlen($text) <= $length) return $text;
    return substr($text, 0, $length) . '...';
}

/**
 * Get time ago
 */
function timeAgo($datetime) {
    $time = strtotime($datetime);
    $now = time();
    $diff = $now - $time;
    
    if ($diff < 60) return 'Just now';
    if ($diff < 3600) return floor($diff / 60) . ' min ago';
    if ($diff < 86400) return floor($diff / 3600) . ' hours ago';
    if ($diff < 604800) return floor($diff / 86400) . ' days ago';
    if ($diff < 2592000) return floor($diff / 604800) . ' weeks ago';
    return formatDate($datetime);
}

/**
 * Convert number to Hindi
 */
function toHindiNumber($number) {
    $hindi = ['०', '१', '२', '३', '४', '५', '६', '७', '८', '९'];
    $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
    return str_replace($english, $hindi, $number);
}

/**
 * Get YouTube video ID from URL
 */
function getYouTubeId($url) {
    preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([^&\s?]+)/', $url, $matches);
    return $matches[1] ?? '';
}

/**
 * Create slug from text
 */
function createSlug($text) {
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    $text = preg_replace('~[^-\w]+~', '', $text);
    $text = trim($text, '-');
    $text = preg_replace('~-+~', '-', $text);
    $text = strtolower($text);
    return $text ?: 'untitled';
}

/**
 * Get rating stars HTML
 */
function getRatingStars($rating) {
    $html = '<div class="rating-stars">';
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $rating) {
            $html .= '<span class="star filled">&#9733;</span>';
        } elseif ($i - 0.5 <= $rating) {
            $html .= '<span class="star half">&#9733;</span>';
        } else {
            $html .= '<span class="star">&#9734;</span>';
        }
    }
    $html .= '</div>';
    return $html;
}

/**
 * Send email
 */
function sendEmail($to, $subject, $body, $from = '') {
    if (empty($from)) {
        $from = getSetting('site_email', 'noreply@ayodhyarammandir.in');
    }
    
    $headers = "From: " . getSetting('site_name') . " <" . $from . ">\r\n";
    $headers .= "Reply-To: " . $from . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    
    return mail($to, $subject, $body, $headers);
}

/**
 * Log admin activity
 */
function logAdminActivity($action, $description = '') {
    $adminId = $_SESSION['admin_id'] ?? null;
    dbQuery(
        "INSERT INTO admin_activity_logs (admin_id, action, description, ip_address, user_agent) VALUES (?, ?, ?, ?, ?)",
        [$adminId, $action, $description, $_SERVER['REMOTE_ADDR'] ?? '', $_SERVER['HTTP_USER_AGENT'] ?? '']
    );
}
