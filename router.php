<?php
/**
 * PHP Built-in Server Router
 * Routes requests similar to .htaccess for development preview
 */

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$docRoot = __DIR__;
$file = $docRoot . $uri;

// Serve existing static files directly
if ($uri !== '/' && file_exists($file) && !is_dir($file)) {
    return false; // Let PHP serve it directly
}

// Route to appropriate handler
$path = ltrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

// Homepage
if ($path === '' || $path === '/') {
    require $docRoot . '/index.php';
    return true;
}

// Admin panel
if (preg_match('/^admin/', $path)) {
    require $docRoot . '/admin/index.php';
    return true;
}

// City pages
if (preg_match('/^city\/([a-zA-Z0-9_-]+)$/', $path, $m)) {
    $_GET['slug'] = $m[1];
    require $docRoot . '/city.php';
    return true;
}

// Keyword pages
if (preg_match('/^keyword\/([a-zA-Z0-9_-]+)$/', $path, $m)) {
    $_GET['slug'] = $m[1];
    require $docRoot . '/keyword.php';
    return true;
}

// Sitemap
if ($path === 'sitemap.xml') {
    require $docRoot . '/sitemap.php';
    return true;
}

// Static PHP files
$staticFiles = ['gallery.php', 'city.php', 'keyword.php', 'contact.php', 'sitemap.php'];
foreach ($staticFiles as $sf) {
    if ($path === $sf || $path === rtrim($sf, '.php')) {
        require $docRoot . '/' . $sf;
        return true;
    }
}

// Special standalone pages - serve directly
$standalonePagesMap = [
    'about-us'                  => '/about.php',
    'about'                     => '/about.php',
    'ram-vanvas-14-varsh'       => '/ram-vanvas-14-varsh.php',
    'ram-14-varsh-vanvas'       => '/ram-vanvas-14-varsh.php',
    '14-varsh-vanvas'           => '/ram-vanvas-14-varsh.php',
    'diwali-ayodhya-deepotsav'  => '/diwali-ayodhya-deepotsav.php',
    'diwali-ayodhya'            => '/diwali-ayodhya-deepotsav.php',
    'deepotsav-ayodhya'         => '/diwali-ayodhya-deepotsav.php',
    'diwali'                    => '/diwali-ayodhya-deepotsav.php',
    'deepawali'                 => '/diwali-ayodhya-deepotsav.php',
    'dipawali'                  => '/diwali-ayodhya-deepotsav.php',
    'privacy-policy'            => '/privacy-policy.php',
    'gupaniyata-niti'           => '/privacy-policy.php',
    'llm.txt'                   => '/llm.txt',
    // City Travel Pages
    'lucknow-to-ayodhya'        => '/lucknow-to-ayodhya.php',
    'lucknow-ayodhya'           => '/lucknow-to-ayodhya.php',
    'lucknow-se-ayodhya'        => '/lucknow-to-ayodhya.php',
    'delhi-to-ayodhya'          => '/delhi-to-ayodhya.php',
    'delhi-ayodhya'             => '/delhi-to-ayodhya.php',
    'delhi-se-ayodhya'          => '/delhi-to-ayodhya.php',
    'varanasi-to-ayodhya'       => '/varanasi-to-ayodhya.php',
    'varanasi-ayodhya'          => '/varanasi-to-ayodhya.php',
    'kashi-to-ayodhya'          => '/varanasi-to-ayodhya.php',
    'banaras-to-ayodhya'        => '/varanasi-to-ayodhya.php',
    'prayagraj-to-ayodhya'      => '/prayagraj-to-ayodhya.php',
    'prayagraj-ayodhya'         => '/prayagraj-to-ayodhya.php',
    'allahabad-to-ayodhya'      => '/prayagraj-to-ayodhya.php',
    'hotels-ayodhya'            => '/hotels-ayodhya.php',
    'ayodhya-hotels'            => '/hotels-ayodhya.php',
    'hotel-ayodhya'             => '/hotels-ayodhya.php',
    'dharamshala-ayodhya'       => '/hotels-ayodhya.php',
    'reset-admin-password'      => '/reset-admin-password.php',
    // Mumbai Travel Pages
    'mumbai-to-ayodhya'         => '/mumbai-to-ayodhya.php',
    'mumbai-ayodhya'            => '/mumbai-to-ayodhya.php',
    'mumbai-se-ayodhya'         => '/mumbai-to-ayodhya.php',
    'bombay-to-ayodhya'         => '/mumbai-to-ayodhya.php',
    // Agra Travel Pages
    'agra-to-ayodhya'           => '/agra-to-ayodhya.php',
    'agra-ayodhya'              => '/agra-to-ayodhya.php',
    'agra-se-ayodhya'           => '/agra-to-ayodhya.php',
    // Ayodhya Darshan Guide
    'ayodhya-darshan-guide'     => '/ayodhya-darshan-guide.php',
    'ram-mandir-darshan-guide'  => '/ayodhya-darshan-guide.php',
    'darshan-guide'             => '/ayodhya-darshan-guide.php',
    'ayodhya-darshan'           => '/ayodhya-darshan-guide.php',
    'ram-mandir-darshan'        => '/ayodhya-darshan-guide.php',
];
if (isset($standalonePagesMap[$path])) {
    $targetFile = $docRoot . $standalonePagesMap[$path];
    if (file_exists($targetFile)) {
        require $targetFile;
        return true;
    }
}

// Blog routes
if (preg_match('/^blog\/([a-zA-Z0-9_-]+)$/', $path, $m)) {
    $_GET['slug'] = $m[1];
    $_GET['type'] = 'blog';
    require $docRoot . '/page.php';
    return true;
}

// API routes
if (preg_match('/^api\/(.+)$/', $path, $m)) {
    $apiFile = $docRoot . '/api/' . $m[1];
    if (file_exists($apiFile)) {
        require $apiFile;
        return true;
    }
}

// General slug pages
if (preg_match('/^([a-zA-Z0-9_-]+)$/', $path, $m)) {
    $_GET['slug'] = $m[1];
    require $docRoot . '/page.php';
    return true;
}

// 404
http_response_code(404);
require $docRoot . '/page.php';
return true;
