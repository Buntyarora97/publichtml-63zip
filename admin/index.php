<?php
/**
 * Admin Panel Front Controller
 * Routes /admin/* requests to correct admin page file
 */

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
// Strip leading slash and 'admin' prefix
$path = preg_replace('#^/?admin/?#', '', $uri);
$path = trim($path, '/');

// Map path to file
$adminDir = __DIR__;

// Default to dashboard
if ($path === '' || $path === 'index.php') {
    require $adminDir . '/dashboard.php';
    exit;
}

// Allowed admin pages
$allowedPages = [
    'dashboard', 'hero', 'gallery', 'announcements',
    'city-pages', 'user-uploads', 'messages', 'settings',
    'login', 'logout', 'profile',
];

// Extract page name (strip .php if present)
$page = pathinfo($path, PATHINFO_FILENAME);

if (in_array($page, $allowedPages)) {
    $file = $adminDir . '/' . $page . '.php';
    if (file_exists($file)) {
        // Preserve query string
        require $file;
        exit;
    }
}

// Check if includes folder
if (strpos($path, 'includes/') === 0) {
    $file = $adminDir . '/' . $path;
    if (file_exists($file)) {
        require $file;
        exit;
    }
}

// Fallback: 404
http_response_code(404);
echo '<h1>404 - Admin page not found</h1><p>Path: ' . htmlspecialchars($path) . '</p>';
