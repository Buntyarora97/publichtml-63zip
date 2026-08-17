<?php
/**
 * Ayodhya Ram Mandir - Dynamic XML Sitemap Generator
 * Generates 500+ page sitemap for all pages
 */

require_once __DIR__ . '/config/database.php';

header('Content-Type: application/xml; charset=UTF-8');
header('Cache-Control: public, max-age=86400');

$baseUrl = 'https://ayodhyarammandir.in';

$urls = [];

// Homepage
$urls[] = ['url' => $baseUrl . '/', 'changefreq' => 'daily', 'priority' => '1.0', 'lastmod' => date('Y-m-d')];

// Static core pages
$corePages = [
    'ram-mandir', 'ram-lalla-mandir-history', 'shri-ram-janmabhoomi', 'ram-mandir-architecture',
    'ram-mandir-darshan-guide', 'shri-ram', 'shri-ram-janam-katha', 'vishnu-avatar-story',
    'raja-dashrath-story', 'mata-kaushalya-story', 'mata-kaikeyi-story',
    'lakshman-ji-story', 'bharat-ji-story', 'shatrughna-ji-story', 'guru-vashishtha',
    'shri-ram-maryada-purushottam', 'shri-ram-rajya', 'shri-ram-ke-108-naam',
    'ramayan', 'sita-swayamvar', 'shri-ram-vanvas', 'bharat-milap', 'panchvati',
    'sita-haran', 'jatayu-story', 'shabri-katha',
    'hanuman-ji', 'hanuman-ji-birth-story', 'hanuman-ji-and-shri-ram-milan',
    'hanuman-ji-lanka-yatra', 'lanka-dahan', 'ram-setu', 'lanka-yudh', 'ravan-vadh',
    'ayodhya-wapsi', 'ram-rajya', 'mata-sita', 'mata-sita-janam-katha', 'mata-sita-ki-mahima',
    'hanuman-chalisa', 'hanuman-chalisa-meaning', 'live-aarti', 'ram-bhajan',
    'daily-suvichar', 'panchang-today',
    'ayodhya-guide', 'how-to-reach-ayodhya', 'places-to-visit-in-ayodhya',
    'ayodhya-trip-planner', 'ram-navami-guide', 'ayodhya-deepotsav-guide',
    'hanumangarhi', 'kanak-bhawan', 'saryu-ghat', 'dashrath-mahal',
    'dharamshala-ayodhya', 'hotels-near-ram-mandir',
    'about-us', 'contact', 'privacy-policy', 'terms-conditions', 'disclaimer',
];

foreach ($corePages as $slug) {
    $urls[] = ['url' => $baseUrl . '/' . $slug, 'changefreq' => 'weekly', 'priority' => '0.9', 'lastmod' => date('Y-m-d')];
}

// Gallery, City list, Keyword list
$urls[] = ['url' => $baseUrl . '/gallery.php', 'changefreq' => 'daily', 'priority' => '0.8', 'lastmod' => date('Y-m-d')];
$urls[] = ['url' => $baseUrl . '/city.php', 'changefreq' => 'weekly', 'priority' => '0.8', 'lastmod' => date('Y-m-d')];
$urls[] = ['url' => $baseUrl . '/keyword.php', 'changefreq' => 'weekly', 'priority' => '0.7', 'lastmod' => date('Y-m-d')];

// Dynamic pages from database
try {
    // Pages table
    $pages = dbFetchAll("SELECT slug, updated_at FROM pages WHERE status = 'published'");
    foreach ($pages as $p) {
        if (in_array($p['slug'], ['donation', 'prasad'], true)) continue;
        $urls[] = ['url' => $baseUrl . '/' . $p['slug'], 'changefreq' => 'weekly', 'priority' => '0.8', 'lastmod' => substr($p['updated_at'] ?? date('Y-m-d'), 0, 10)];
    }
    
    // City pages
    $cities = dbFetchAll("SELECT slug, updated_at FROM city_pages WHERE status = 1");
    foreach ($cities as $c) {
        $urls[] = ['url' => $baseUrl . '/city.php?slug=' . $c['slug'], 'changefreq' => 'monthly', 'priority' => '0.7', 'lastmod' => substr($c['updated_at'] ?? date('Y-m-d'), 0, 10)];
    }
    
    // Keyword pages
    $keywords = dbFetchAll("SELECT slug, updated_at FROM keyword_pages WHERE status = 1");
    foreach ($keywords as $k) {
        $urls[] = ['url' => $baseUrl . '/keyword.php?slug=' . $k['slug'], 'changefreq' => 'monthly', 'priority' => '0.6', 'lastmod' => substr($k['updated_at'] ?? date('Y-m-d'), 0, 10)];
    }
    
    // Blogs
    $blogs = dbFetchAll("SELECT slug, updated_at FROM blogs WHERE status = 'published'");
    foreach ($blogs as $b) {
        $urls[] = ['url' => $baseUrl . '/blog/' . $b['slug'], 'changefreq' => 'weekly', 'priority' => '0.7', 'lastmod' => substr($b['updated_at'] ?? date('Y-m-d'), 0, 10)];
    }
    
    // Ramayan chapters
    $chapters = dbFetchAll("SELECT slug, updated_at FROM ramayan_chapters WHERE status = 1");
    foreach ($chapters as $ch) {
        $urls[] = ['url' => $baseUrl . '/' . $ch['slug'], 'changefreq' => 'monthly', 'priority' => '0.8', 'lastmod' => substr($ch['updated_at'] ?? date('Y-m-d'), 0, 10)];
    }
    
    // Gallery
    $gallery = dbFetchAll("SELECT id FROM gallery WHERE status = 1");
    if (!empty($gallery)) {
        $urls[] = ['url' => $baseUrl . '/gallery.php?type=photos', 'changefreq' => 'weekly', 'priority' => '0.6', 'lastmod' => date('Y-m-d')];
        $urls[] = ['url' => $baseUrl . '/gallery.php?type=videos', 'changefreq' => 'weekly', 'priority' => '0.6', 'lastmod' => date('Y-m-d')];
    }

} catch (Exception $e) {
    // Continue with static URLs only
}

// New important pages added
$newPages = [
    'about-us', 'about',
    'ram-vanvas-14-varsh', 'ram-14-varsh-vanvas', '14-varsh-vanvas',
    'diwali-ayodhya-deepotsav', 'diwali-ayodhya', 'deepotsav-ayodhya', 'diwali', 'deepawali', 'dipawali',
    'privacy-policy',
    // City Travel Pages
    'lucknow-to-ayodhya', 'lucknow-ayodhya', 'lucknow-se-ayodhya',
    'delhi-to-ayodhya', 'delhi-ayodhya', 'delhi-se-ayodhya',
    'varanasi-to-ayodhya', 'varanasi-ayodhya', 'kashi-to-ayodhya', 'banaras-to-ayodhya',
    'prayagraj-to-ayodhya', 'prayagraj-ayodhya', 'allahabad-to-ayodhya',
    'hotels-ayodhya', 'ayodhya-hotels', 'hotel-ayodhya', 'dharamshala-ayodhya',
    // New City Travel Pages
    'mumbai-to-ayodhya', 'mumbai-ayodhya', 'mumbai-se-ayodhya', 'bombay-to-ayodhya',
    'agra-to-ayodhya', 'agra-ayodhya', 'agra-se-ayodhya',
    // Ayodhya Darshan Guide
    'ayodhya-darshan-guide', 'ram-mandir-darshan-guide', 'darshan-guide', 'ayodhya-darshan',
];
foreach ($newPages as $slug) {
    $urls[] = ['url' => $baseUrl . '/' . $slug, 'changefreq' => 'weekly', 'priority' => '0.9', 'lastmod' => date('Y-m-d')];
}

// LLM.txt for AI platforms
$urls[] = ['url' => $baseUrl . '/llm.txt', 'changefreq' => 'monthly', 'priority' => '0.5', 'lastmod' => date('Y-m-d')];

// Additional keyword variations (for 500+ pages)
$extraKeywords = [
    'ram-mandir-photo', 'ram-mandir-video', 'ram-mandir-history-hindi',
    'ram-lalla-darshan', 'ram-lalla-photo', 'ayodhya-darshan',
    'hanuman-ji-photo', 'hanuman-ji-bhajan', 'hanuman-ji-story',
    'mata-sita-photo', 'mata-sita-story', 'sita-swayamvar-katha',
    'ramayan-katha', 'ramayan-hindi', 'ramayan-doha',
    'ram-navami', 'ram-navami-2024', 'ram-navami-2025', 'ram-navami-puja-vidhi',
    'deepotsav-ayodhya-2025', 'saryu-aarti', 'ayodhya-mahotsav',
    'ram-mandir-pran-pratishtha', '22-january-2024-ayodhya',
    'ayodhya-hotels', 'dharamshala-near-ram-mandir', 'free-stay-ayodhya',
    'ayodhya-restaurants', 'ayodhya-prasad', 'ram-mandir-prasad',
    'ayodhya-dham-map', 'ayodhya-tourist-places', 'ram-ki-paidi',
    'hanumangarhi-darshan', 'kanak-bhawan-darshan', 'dashrath-mahal-ayodhya',
    // 14 Varsh Vanvas keywords
    'ram-vanvas-story', 'ram-14-saal-vanvas', 'ram-vanvas-ke-14-varsh',
    'chitrakoot-ram-vanvas', 'panchvati-ram-vanvas', 'kishkindha-ram-story',
    'sita-haran-katha', 'hanuman-lanka-yatra', 'lanka-dahan-story', 'ram-setu-katha',
    'bharat-milap', 'ram-wapsi-ayodhya', 'pushpak-viman',
    // Diwali keywords
    'diwali-2025', 'deepawali-2025', 'diwali-ayodhya-2025',
    'deepotsav-2025', 'ayodhya-diwali-celebration',
    'diwali-ram-ki-kahani', 'diwali-kyu-manate-hain', 'diwali-ka-itihas',
    'kartik-amavasya-diwali', 'ram-ki-wapsi-diwali',
    'saryu-diya-jalan', 'ayodhya-deepotsav-date',
    // City pages
    'ayodhya-se-delhi', 'ayodhya-se-mumbai', 'ayodhya-se-lucknow',
    'ayodhya-se-patna', 'ayodhya-se-kolkata', 'ayodhya-se-varanasi',
    'delhi-se-ayodhya-train', 'mumbai-se-ayodhya', 'lucknow-se-ayodhya',
    // About keywords
    'ayodhyarammandir-in-ke-bare-mein', 'about-ayodhyarammandir',
];

foreach ($extraKeywords as $kw) {
    $urls[] = ['url' => $baseUrl . '/' . $kw, 'changefreq' => 'monthly', 'priority' => '0.6', 'lastmod' => date('Y-m-d')];
}

// Remove duplicates
$seen = [];
$uniqueUrls = [];
foreach ($urls as $url) {
    if (!isset($seen[$url['url']])) {
        $seen[$url['url']] = true;
        $uniqueUrls[] = $url;
    }
}

// Output XML
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . "\n";

foreach ($uniqueUrls as $url) {
    echo "\t<url>\n";
    echo "\t\t<loc>" . htmlspecialchars($url['url']) . "</loc>\n";
    echo "\t\t<lastmod>" . $url['lastmod'] . "</lastmod>\n";
    echo "\t\t<changefreq>" . $url['changefreq'] . "</changefreq>\n";
    echo "\t\t<priority>" . $url['priority'] . "</priority>\n";
    echo "\t</url>\n";
}

echo '</urlset>';
?>
