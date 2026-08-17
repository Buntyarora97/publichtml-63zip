<?php

/**
 * Ayodhya Ram Mandir - Database Configuration
 * Production MySQL configuration
 */

error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
ini_set('log_errors', '1');

/*
 * Hostinger/cPanel normally prefixes the database and username with the
 * hosting account ID.  The latest uploaded backup is from:
 *   u518916069_rammandir
 *
 * Keep these values overridable so the same code can be used locally and on
 * shared hosting.  On Hostinger, replace only DB_PASS if the database user
 * has a different password.
 */
define('DB_HOST', getenv('DB_HOST') ?: '127.0.0.1');
define('DB_PORT', getenv('DB_PORT') ?: '3306');
define('DB_NAME', getenv('DB_NAME') ?: 'u518916069_rammandir');
define('DB_USER', getenv('DB_USER') ?: 'u518916069_rammandir');
define('DB_PASS', getenv('DB_PASS') ?: 'Buntytech@#000#@');
define('DB_CHARSET', 'utf8mb4');

define(
    'SITE_URL',
    (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http')
    . '://'
    . ($_SERVER['HTTP_HOST'] ?? 'ayodhyarammandir.in')
);

define('ADMIN_URL', SITE_URL . '/admin');
define('ASSETS_URL', SITE_URL . '/assets');

// This file lives in /includes/config; the application root is two levels up.
define('ROOT_PATH', dirname(__DIR__, 2));
define('ASSETS_PATH', ROOT_PATH . '/assets');
define('UPLOADS_PATH', ASSETS_PATH . '/uploads');

define('CSRF_TOKEN_NAME', 'csrf_token');
define('SESSION_NAME', 'ayodhya_ram_mandir_session');
define('SESSION_LIFETIME', 7200);
define('MAX_LOGIN_ATTEMPTS', 5);
define('LOGIN_LOCKOUT_TIME', 900);

define('SECRET_KEY', 'Ay0dhy@R@mM@nd1r_S3cr3t_K3y_2024');
define('ENCRYPTION_KEY', 'R@mM@nd1r_3ncrypt!0n_K3y_2024');

date_default_timezone_set('Asia/Kolkata');

if (session_status() === PHP_SESSION_NONE) {
    ini_set('session.cookie_httponly', '1');
    ini_set('session.use_only_cookies', '1');
    ini_set('session.gc_maxlifetime', (string) SESSION_LIFETIME);
    session_name(SESSION_NAME);
    session_start();
}

define('DEMO_MODE', false);

/**
 * Get PDO MySQL Database Connection
 */
function getDB() {
    static $db = null;

    if ($db instanceof PDO) {
        return $db;
    }

    try {
        if (!extension_loaded('pdo_mysql')) {
            throw new RuntimeException('PDO MySQL extension (pdo_mysql) is not enabled on this server.');
        }

        $dsn = 'mysql:host=' . DB_HOST
             . ';port=' . DB_PORT
             . ';dbname=' . DB_NAME
             . ';charset=' . DB_CHARSET;

        $db = new PDO($dsn, DB_USER, DB_PASS, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);

        $db->exec("SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci");

        return $db;

    } catch (Throwable $e) {
        http_response_code(500);

        $message = 'DATABASE ERROR: ' . $e->getMessage();
        error_log($message);

        die(
            '<div style="font-family:Arial,sans-serif;max-width:900px;margin:50px auto;'
            . 'padding:25px;border:1px solid #ddd;border-radius:10px">'
            . '<h2>Database Connection Error</h2>'
            . '<pre style="white-space:pre-wrap">' . htmlspecialchars($message, ENT_QUOTES, 'UTF-8') . '</pre>'
            . '</div>'
        );
    }
}

function initSQLiteDB($db) {
    $tables = $db->query("SELECT name FROM sqlite_master WHERE type='table'")->fetchAll(PDO::FETCH_COLUMN);
    $alreadySeeded = in_array('settings', $tables) && in_array('seo_meta', $tables);
    // Always run CREATE TABLE IF NOT EXISTS for all tables (idempotent)

    $db->exec("
    CREATE TABLE IF NOT EXISTS settings (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        setting_key TEXT UNIQUE,
        setting_value TEXT,
        setting_label TEXT,
        setting_group TEXT,
        is_public INTEGER DEFAULT 1
    );
    CREATE TABLE IF NOT EXISTS pages (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        slug TEXT UNIQUE,
        title TEXT,
        title_hi TEXT,
        content TEXT,
        content_hi TEXT,
        excerpt TEXT,
        excerpt_hi TEXT,
        seo_title TEXT,
        seo_description TEXT,
        seo_keywords TEXT,
        featured_image TEXT,
        schema_markup TEXT,
        page_type TEXT DEFAULT 'page',
        status TEXT DEFAULT 'published',
        sort_order INTEGER DEFAULT 0,
        created_at TEXT DEFAULT CURRENT_TIMESTAMP,
        updated_at TEXT DEFAULT CURRENT_TIMESTAMP
    );
    CREATE TABLE IF NOT EXISTS gallery (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        title TEXT,
        title_hi TEXT,
        file_path TEXT,
        file_type TEXT DEFAULT 'image',
        alt_text TEXT,
        status INTEGER DEFAULT 1,
        sort_order INTEGER DEFAULT 0,
        created_at TEXT DEFAULT CURRENT_TIMESTAMP
    );
    CREATE TABLE IF NOT EXISTS user_uploads (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT,
        city TEXT,
        message TEXT,
        file_path TEXT,
        file_type TEXT DEFAULT 'image',
        is_approved INTEGER DEFAULT 0,
        is_rejected INTEGER DEFAULT 0,
        created_at TEXT DEFAULT CURRENT_TIMESTAMP
    );
    CREATE TABLE IF NOT EXISTS menu_items (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        parent_id INTEGER DEFAULT 0,
        menu_type TEXT DEFAULT 'main',
        title TEXT,
        title_hi TEXT,
        url TEXT,
        page_slug TEXT,
        icon_class TEXT,
        target TEXT DEFAULT '_self',
        mega_menu INTEGER DEFAULT 0,
        column_group TEXT,
        sort_order INTEGER DEFAULT 0,
        status INTEGER DEFAULT 1
    );
    CREATE TABLE IF NOT EXISTS hero_section (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        page_slug TEXT,
        slide_type TEXT DEFAULT 'image',
        media_source TEXT,
        media_thumb TEXT,
        background_video TEXT,
        fallback_image TEXT,
        right_frame_type TEXT DEFAULT 'image',
        right_frame_source TEXT,
        right_frame_poster TEXT,
        title TEXT,
        title_hi TEXT,
        status INTEGER DEFAULT 1,
        sort_order INTEGER DEFAULT 0
    );
    CREATE TABLE IF NOT EXISTS blogs (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        title TEXT,
        title_hi TEXT,
        slug TEXT UNIQUE,
        content TEXT,
        content_hi TEXT,
        excerpt TEXT,
        category_id INTEGER,
        featured_image TEXT,
        status TEXT DEFAULT 'published',
        published_at TEXT DEFAULT CURRENT_TIMESTAMP,
        created_at TEXT DEFAULT CURRENT_TIMESTAMP,
        updated_at TEXT DEFAULT CURRENT_TIMESTAMP
    );
    CREATE TABLE IF NOT EXISTS blog_categories (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT,
        name_hi TEXT,
        slug TEXT
    );
    CREATE TABLE IF NOT EXISTS footer_links (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        title TEXT,
        title_hi TEXT,
        url TEXT,
        column_name TEXT,
        sort_order INTEGER DEFAULT 0,
        status INTEGER DEFAULT 1
    );
    CREATE TABLE IF NOT EXISTS marquee_announcements (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        content TEXT,
        content_hi TEXT,
        icon TEXT DEFAULT 'bell',
        status INTEGER DEFAULT 1,
        sort_order INTEGER DEFAULT 0
    );
    CREATE TABLE IF NOT EXISTS bhajans (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        title TEXT,
        title_hi TEXT,
        singer TEXT,
        youtube_id TEXT,
        status INTEGER DEFAULT 1,
        sort_order INTEGER DEFAULT 0
    );
    CREATE TABLE IF NOT EXISTS aarti_links (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        title TEXT,
        title_hi TEXT,
        youtube_id TEXT,
        thumbnail TEXT,
        status INTEGER DEFAULT 1,
        sort_order INTEGER DEFAULT 0
    );
    CREATE TABLE IF NOT EXISTS reviews (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT,
        city TEXT,
        rating INTEGER DEFAULT 5,
        review TEXT,
        is_approved INTEGER DEFAULT 0,
        is_rejected INTEGER DEFAULT 0,
        is_featured INTEGER DEFAULT 0,
        created_at TEXT DEFAULT CURRENT_TIMESTAMP
    );
    CREATE TABLE IF NOT EXISTS daily_suvichar (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        content TEXT,
        content_hi TEXT,
        suvichar_date TEXT,
        status INTEGER DEFAULT 1
    );
    CREATE TABLE IF NOT EXISTS panchang (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        panchang_date TEXT,
        tithi TEXT,
        nakshatra TEXT,
        yoga TEXT
    );
    CREATE TABLE IF NOT EXISTS instagram_reels (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        title TEXT,
        instagram_url TEXT,
        thumbnail TEXT,
        status INTEGER DEFAULT 1,
        sort_order INTEGER DEFAULT 0
    );
    CREATE TABLE IF NOT EXISTS page_views (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        page_type TEXT,
        page_id INTEGER,
        page_slug TEXT,
        ip_address TEXT,
        user_agent TEXT,
        referrer TEXT,
        view_date TEXT,
        view_hour INTEGER,
        created_at TEXT DEFAULT CURRENT_TIMESTAMP
    );
    CREATE TABLE IF NOT EXISTS seo_meta (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        page_type TEXT,
        page_id INTEGER DEFAULT 0,
        page_slug TEXT,
        meta_title TEXT,
        meta_description TEXT,
        meta_keywords TEXT,
        og_title TEXT,
        og_description TEXT,
        og_image TEXT,
        og_type TEXT DEFAULT 'website',
        twitter_card TEXT DEFAULT 'summary_large_image',
        canonical_url TEXT,
        hreflang_hi TEXT,
        hreflang_en TEXT,
        robots_meta TEXT DEFAULT 'index, follow',
        schema_markup TEXT,
        created_at TEXT DEFAULT CURRENT_TIMESTAMP,
        updated_at TEXT DEFAULT CURRENT_TIMESTAMP
    );
    CREATE TABLE IF NOT EXISTS newsletter_subscribers (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        email TEXT UNIQUE,
        ip_address TEXT,
        user_agent TEXT,
        status INTEGER DEFAULT 1,
        created_at TEXT DEFAULT CURRENT_TIMESTAMP
    );
    CREATE TABLE IF NOT EXISTS faq_items (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        page_slug TEXT,
        question TEXT,
        question_hi TEXT,
        answer TEXT,
        answer_hi TEXT,
        sort_order INTEGER DEFAULT 0,
        status INTEGER DEFAULT 1
    );
    CREATE TABLE IF NOT EXISTS ramayan_chapters (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        slug TEXT UNIQUE,
        title TEXT,
        title_hi TEXT,
        content TEXT,
        content_hi TEXT,
        summary TEXT,
        featured_image TEXT,
        hero_image TEXT,
        kand TEXT,
        status INTEGER DEFAULT 1,
        created_at TEXT DEFAULT CURRENT_TIMESTAMP,
        updated_at TEXT DEFAULT CURRENT_TIMESTAMP
    );
    CREATE TABLE IF NOT EXISTS hanuman_chapters (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        slug TEXT UNIQUE,
        title TEXT,
        title_hi TEXT,
        content TEXT,
        content_hi TEXT,
        featured_image TEXT,
        hero_image TEXT,
        status INTEGER DEFAULT 1,
        created_at TEXT DEFAULT CURRENT_TIMESTAMP,
        updated_at TEXT DEFAULT CURRENT_TIMESTAMP
    );
    CREATE TABLE IF NOT EXISTS sita_chapters (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        slug TEXT UNIQUE,
        title TEXT,
        title_hi TEXT,
        content TEXT,
        content_hi TEXT,
        featured_image TEXT,
        hero_image TEXT,
        status INTEGER DEFAULT 1,
        created_at TEXT DEFAULT CURRENT_TIMESTAMP,
        updated_at TEXT DEFAULT CURRENT_TIMESTAMP
    );
    CREATE TABLE IF NOT EXISTS travel_pages (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        slug TEXT UNIQUE,
        title TEXT,
        title_hi TEXT,
        content TEXT,
        content_hi TEXT,
        featured_image TEXT,
        status INTEGER DEFAULT 1,
        created_at TEXT DEFAULT CURRENT_TIMESTAMP,
        updated_at TEXT DEFAULT CURRENT_TIMESTAMP
    );
    CREATE TABLE IF NOT EXISTS places_to_visit (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        slug TEXT UNIQUE,
        title TEXT,
        title_hi TEXT,
        content TEXT,
        content_hi TEXT,
        featured_image TEXT,
        status INTEGER DEFAULT 1,
        created_at TEXT DEFAULT CURRENT_TIMESTAMP,
        updated_at TEXT DEFAULT CURRENT_TIMESTAMP
    );
    CREATE TABLE IF NOT EXISTS kundli_pages (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        slug TEXT UNIQUE,
        title TEXT,
        content TEXT,
        status INTEGER DEFAULT 1
    );
    CREATE TABLE IF NOT EXISTS city_pages (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        city_name TEXT,
        city_name_hi TEXT,
        state TEXT,
        slug TEXT UNIQUE,
        content TEXT,
        content_hi TEXT,
        seo_title TEXT,
        seo_description TEXT,
        seo_keywords TEXT,
        featured_image TEXT,
        status INTEGER DEFAULT 1,
        created_at TEXT DEFAULT CURRENT_TIMESTAMP
    );
    CREATE TABLE IF NOT EXISTS keyword_pages (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        keyword TEXT,
        keyword_hi TEXT,
        slug TEXT UNIQUE,
        content TEXT,
        content_hi TEXT,
        seo_title TEXT,
        seo_description TEXT,
        featured_image TEXT,
        status INTEGER DEFAULT 1,
        created_at TEXT DEFAULT CURRENT_TIMESTAMP
    );
    CREATE TABLE IF NOT EXISTS admins (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username TEXT UNIQUE,
        password TEXT,
        name TEXT,
        email TEXT UNIQUE,
        role TEXT DEFAULT 'admin',
        status INTEGER DEFAULT 1,
        last_login TEXT
    );
    CREATE TABLE IF NOT EXISTS newsletters (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        email TEXT UNIQUE,
        created_at TEXT DEFAULT CURRENT_TIMESTAMP
    );
    CREATE TABLE IF NOT EXISTS contacts (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT,
        email TEXT,
        phone TEXT,
        subject TEXT,
        message TEXT,
        created_at TEXT DEFAULT CURRENT_TIMESTAMP
    );
    CREATE TABLE IF NOT EXISTS donations (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT,
        email TEXT,
        phone TEXT,
        amount REAL,
        payment_mode TEXT,
        message TEXT,
        status TEXT DEFAULT 'pending',
        created_at TEXT DEFAULT CURRENT_TIMESTAMP
    );
    CREATE TABLE IF NOT EXISTS home_sections (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        section_key TEXT,
        title TEXT,
        title_hi TEXT,
        content TEXT,
        content_hi TEXT,
        status INTEGER DEFAULT 1,
        sort_order INTEGER DEFAULT 0
    );
    CREATE TABLE IF NOT EXISTS admin_activity_logs (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        admin_id INTEGER,
        action TEXT,
        description TEXT,
        ip_address TEXT,
        user_agent TEXT,
        created_at TEXT DEFAULT CURRENT_TIMESTAMP
    );
    CREATE TABLE IF NOT EXISTS contact_messages (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT,
        email TEXT,
        phone TEXT,
        subject TEXT,
        message TEXT,
        is_read INTEGER DEFAULT 0,
        created_at TEXT DEFAULT CURRENT_TIMESTAMP
    );
    ");

    // Seed default data only if not already done
    if (!$alreadySeeded) {
        seedDefaultData($db);
    }
}

function seedDefaultData($db) {
    $settings = [
        ['site_name', 'AyodhyaRamMandir.in'],
        ['site_name_hi', 'अयोध्या राम मंदिर'],
        ['site_tagline', 'जय श्री राम - Complete Guide to Ayodhya & Ram Mandir'],
        ['site_tagline_hi', 'जय श्री राम - अयोध्या और राम मंदिर का सम्पूर्ण गाइड'],
        ['site_logo', 'assets/images/logo.png'],
        ['footer_logo', 'assets/images/footer-logo.png'],
        ['site_email', 'info@ayodhyarammandir.in'],
        ['site_email_official', 'officialayodhyarammandir.in@gmail.com'],
        ['site_phone', '8168877332'],
        ['site_address', 'Ayodhya Dham, Uttar Pradesh - 224123'],
        ['contact_whatsapp', '918168877332'],
        ['social_facebook', 'https://facebook.com/ayodhyarammandir'],
        ['social_instagram', 'https://instagram.com/ayodhyarammandir'],
        ['social_youtube', 'https://youtube.com/@ayodhyarammandir'],
        ['social_twitter', 'https://twitter.com/ayodhyarammandir'],
        ['adsense_client', ''],
        ['adsense_header_slot', ''],
        ['adsense_footer_slot', ''],
        ['google_analytics', ''],
    ];
    $stmt = $db->prepare("INSERT OR IGNORE INTO settings (setting_key, setting_value) VALUES (?, ?)");
    foreach ($settings as $s) $stmt->execute($s);

    // Admin
    $db->exec("INSERT OR IGNORE INTO admins (username, password, name, email, role) VALUES ('admin', '" . password_hash('Ram@2024', PASSWORD_DEFAULT) . "', 'Admin', 'admin@ayodhyarammandir.in', 'super_admin')");

    // Marquee
    $marquees = [
        ['🕉️ जय श्री राम! अयोध्या राम मंदिर में आपका स्वागत है', '🕉️ Jai Shri Ram! Welcome to Ayodhya Ram Mandir'],
        ['🙏 राम लला का दर्शन प्रतिदिन प्रातः 6:00 से रात्रि 10:00 बजे तक', '🙏 Ram Lalla Darshan daily from 6:00 AM to 10:00 PM'],
        ['🏛️ भव्य राम मंदिर अयोध्या - 22 जनवरी 2024 को प्राण प्रतिष्ठा हुई', '🏛️ Grand Ram Mandir Ayodhya - Pran Pratishtha on 22 January 2024'],
        ['🌸 अयोध्या दर्शन के लिए आज ही यात्रा की योजना बनाएं', '🌸 Plan your Ayodhya Darshan trip today'],
    ];
    $stmt = $db->prepare("INSERT OR IGNORE INTO marquee_announcements (content_hi, content, icon, status) VALUES (?, ?, 'om', 1)");
    foreach ($marquees as $m) $stmt->execute($m);

    // Menu Items
    $menuItems = [
        [0, 'main', 'Home', 'होम', '/', '', 'fa-home', 0],
        [0, 'main', 'Ram Mandir', 'राम मंदिर', '', 'ram-mandir', 'fa-landmark', 1],
        [0, 'main', 'Ramayan', 'रामायण', '', 'ramayan', 'fa-book-open', 0],
        [0, 'main', 'Ayodhya Guide', 'अयोध्या गाइड', '', 'ayodhya-guide', 'fa-map-location-dot', 1],
        [0, 'main', 'Gallery', 'गैलरी', '/gallery', '', 'fa-images', 0],
        [0, 'main', 'Blog', 'ब्लॉग', '/blog', '', 'fa-newspaper', 0],
        [0, 'main', 'Contact', 'संपर्क', '/contact', '', 'fa-envelope', 0],
    ];
    $stmt = $db->prepare("INSERT OR IGNORE INTO menu_items (parent_id, menu_type, title, title_hi, url, page_slug, icon_class, mega_menu) VALUES (?,?,?,?,?,?,?,?)");
    foreach ($menuItems as $m) $stmt->execute($m);

    // Hero slides
    $heroSlides = [
        ['home', 'image', 'assets/images/ram-lala.jpg', 'assets/images/ram-lala.jpg', 'Ram Lalla', 'राम लला'],
        ['home', 'image', 'assets/images/ayodhya-mandir.jpg', 'assets/images/ayodhya-mandir.jpg', 'Ayodhya Ram Mandir', 'अयोध्या राम मंदिर'],
        ['home', 'image', 'assets/images/shree-ram.jpg', 'assets/images/shree-ram.jpg', 'Shree Ram', 'श्री राम'],
        ['home', 'image', 'assets/images/ram-wapsi-ayodhya.jpg', 'assets/images/ram-wapsi-ayodhya.jpg', 'Ram Wapsi', 'राम वापसी'],
        ['home', 'image', 'assets/images/hanuman-parvat.jpg', 'assets/images/hanuman-parvat.jpg', 'Hanuman Ji', 'हनुमान जी'],
        ['home', 'video', 'assets/images/ram-sita.mp4', 'assets/images/ram-wapsi-ayodhya.jpg', 'Ram Sita Video', 'राम सीता वीडियो'],
    ];
    $stmt = $db->prepare("INSERT OR IGNORE INTO hero_section (page_slug, right_frame_type, right_frame_source, right_frame_poster, title, title_hi, status, sort_order) VALUES (?,?,?,?,?,?,1,?)");
    foreach ($heroSlides as $i => $s) $stmt->execute(array_merge($s, [$i]));

    // Gallery
    $galleryImages = [
        ['Ram Lalla Darshan', 'राम लला दर्शन', 'assets/images/ram-lala.jpg', 'image'],
        ['Ayodhya Ram Mandir', 'अयोध्या राम मंदिर', 'assets/images/ayodhya-mandir.jpg', 'image'],
        ['Shree Ram', 'श्री राम', 'assets/images/shree-ram.jpg', 'image'],
        ['Ram Ravan Yudh', 'राम रावण युद्ध', 'assets/images/ram-ravan-yudh.jpg', 'image'],
        ['Ravan', 'रावण', 'assets/images/ravan.jpg', 'image'],
        ['Ram Setu', 'राम सेतु', 'assets/images/ram-setu.jpg', 'image'],
        ['Real Ram Setu', 'असली राम सेतु', 'assets/images/real-ram-setu.jpg', 'image'],
        ['Ayodhya Nagri', 'अयोध्या नगरी', 'assets/images/ayodhya-nagri.jpg', 'image'],
        ['Ram Sita Hanuman Laxman', 'राम सीता हनुमान लक्ष्मण', 'assets/images/ram-sita-hanuman-laxman.jpg', 'image'],
        ['Ram Wapsi Ayodhya', 'राम वापसी अयोध्या', 'assets/images/ram-wapsi-ayodhya.jpg', 'image'],
        ['Hanuman Parvat', 'हनुमान पर्वत', 'assets/images/hanuman-parvat.jpg', 'image'],
        ['Panchmukhi Hanuman', 'पंचमुखी हनुमान', 'assets/images/panchmukhi-hanuman.jpg', 'image'],
        ['Hanuman Ji', 'हनुमान जी', 'assets/images/hanuman-ji.jpg', 'image'],
        ['Ram Silhouette', 'राम सिल्हूट', 'assets/images/ram-silhouette.jpg', 'image'],
        ['Ram Silhouette 2', 'राम सिल्हूट 2', 'assets/images/ram-silhouette2.jpg', 'image'],
        ['Ram Mandir Real', 'राम मंदिर असली', 'assets/images/ram-mandir-real.jpg', 'image'],
        ['Ram Lala Statue', 'राम लला मूर्ति', 'assets/images/ram-lala-statue.jpg', 'image'],
        ['Ram Sita Video', 'राम सीता वीडियो', 'assets/images/ram-sita.mp4', 'video'],
    ];
    $stmt = $db->prepare("INSERT OR IGNORE INTO gallery (title, title_hi, file_path, file_type, status, sort_order) VALUES (?,?,?,?,1,?)");
    foreach ($galleryImages as $i => $g) $stmt->execute(array_merge($g, [$i]));

    // Daily Suvichar
    $suvichars = [
        ['रघुकुल रीत सदा चली आई, प्राण जाए पर वचन न जाई।', 'The tradition of Raghukul has always been: life may go but word shall not be broken.'],
        ['जासु राज प्रिय प्रजा दुखारी, सो नृप अवसि नरक अधिकारी।', 'A king whose subjects are unhappy deserves hell.'],
        ['सिया राम मय सब जग जानी, करहुं प्रनाम जोरि जुग पानी।', 'Knowing the whole world as Sita-Ram, I bow with folded hands.'],
        ['बंदउं गुरु पद पदुम परागा, सुरुचि सुबास सरस अनुरागा।', 'I bow to the lotus feet of the Guru, fragrant with devotion.'],
        ['मंगल भवन अमंगल हारी, द्रवउ सो दसरथ अजिर बिहारी।', 'May the auspicious one who removes inauspiciousness bless us.'],
    ];
    $stmt = $db->prepare("INSERT OR IGNORE INTO daily_suvichar (content_hi, content, status) VALUES (?,?,1)");
    foreach ($suvichars as $s) $stmt->execute($s);

    // Reviews
    $reviews = [
        ['Ramesh Kumar', 'Delhi', 5, 'Bahut hi sundar website hai. Ram Mandir ki poori jankari yahan milti hai. Jai Shri Ram!'],
        ['Priya Sharma', 'Mumbai', 5, 'Excellent website! Got complete travel guide for Ayodhya. Very helpful.'],
        ['Suresh Patel', 'Ahmedabad', 5, 'Ramayan ki poori katha yahan bahut achhi tarah se di gayi hai. Jai Shri Ram!'],
        ['Anita Singh', 'Lucknow', 5, 'Ayodhya darshan ki poori planning is website se ki. Bahut helpful raha.'],
        ['Vijay Mishra', 'Varanasi', 5, 'Ram Mandir ki jankari aur Hanumangadhi ka guide bahut acha hai.'],
        ['Sunita Devi', 'Patna', 5, 'Jai Shri Ram! Itni sundar website ke liye dhanyawad. Sab kuch bahut clear hai.'],
    ];
    $stmt = $db->prepare("INSERT OR IGNORE INTO reviews (name, city, rating, review, is_approved, is_featured) VALUES (?,?,?,?,1,1)");
    foreach ($reviews as $r) $stmt->execute($r);

    // Footer links
    $footerLinks = [
        ['Ram Mandir', 'राम मंदिर', '/ram-mandir', 'column1'],
        ['Ramayan', 'रामायण', '/ramayan', 'column1'],
        ['Hanuman Ji', 'हनुमान जी', '/hanuman-ji', 'column1'],
        ['Mata Sita', 'माता सीता', '/mata-sita', 'column1'],
        ['Ayodhya Guide', 'अयोध्या गाइड', '/ayodhya-guide', 'column2'],
        ['Hanumangarhi', 'हनुमानगढ़ी', '/hanumangarhi', 'column2'],
        ['Dharamshala', 'धर्मशाला', '/dharamshala-ayodhya', 'column2'],
        ['Gallery', 'गैलरी', '/gallery', 'column2'],
        ['Live Aarti', 'लाइव आरती', '/live-aarti', 'column3'],
        ['Bhajans', 'भजन', '/bhajans', 'column3'],
        ['Daily Suvichar', 'दैनिक सुविचार', '/daily-suvichar', 'column3'],
        ['Contact', 'संपर्क', '/contact', 'column3'],
    ];
    $stmt = $db->prepare("INSERT OR IGNORE INTO footer_links (title, title_hi, url, column_name, status) VALUES (?,?,?,?,1)");
    foreach ($footerLinks as $f) $stmt->execute($f);

    // Seed key pages
    seedPages($db);
    seedCityPages($db);
    seedKeywordPages($db);
}

function seedPages($db) {
    $pages = getRamMandirPages();
    $stmt = $db->prepare("INSERT OR IGNORE INTO pages (slug, title, title_hi, content, content_hi, seo_title, seo_description, seo_keywords, page_type, status) VALUES (?,?,?,?,?,?,?,?,?,?)");
    foreach ($pages as $p) $stmt->execute($p);
}

function seedCityPages($db) {
    $cities = getCityPagesList();
    $stmt = $db->prepare("INSERT OR IGNORE INTO city_pages (city_name, city_name_hi, state, slug, content, content_hi, seo_title, seo_description, seo_keywords, status) VALUES (?,?,?,?,?,?,?,?,?,1)");
    foreach ($cities as $c) $stmt->execute($c);
}

function seedKeywordPages($db) {
    $keywords = getKeywordPagesList();
    $stmt = $db->prepare("INSERT OR IGNORE INTO keyword_pages (keyword, keyword_hi, slug, content, content_hi, seo_title, seo_description, status) VALUES (?,?,?,?,?,?,?,1)");
    foreach ($keywords as $k) $stmt->execute($k);
}

function getCityPagesList() {
    $cities = [
        ['Delhi', 'दिल्ली', 'Delhi', 'ayodhya-delhi'],
        ['Mumbai', 'मुंबई', 'Maharashtra', 'ayodhya-mumbai'],
        ['Lucknow', 'लखनऊ', 'Uttar Pradesh', 'ayodhya-lucknow'],
        ['Varanasi', 'वाराणसी', 'Uttar Pradesh', 'ayodhya-varanasi'],
        ['Allahabad', 'प्रयागराज', 'Uttar Pradesh', 'ayodhya-prayagraj'],
        ['Kanpur', 'कानपुर', 'Uttar Pradesh', 'ayodhya-kanpur'],
        ['Agra', 'आगरा', 'Uttar Pradesh', 'ayodhya-agra'],
        ['Mathura', 'मथुरा', 'Uttar Pradesh', 'ayodhya-mathura'],
        ['Vrindavan', 'वृंदावन', 'Uttar Pradesh', 'ayodhya-vrindavan'],
        ['Patna', 'पटना', 'Bihar', 'ayodhya-patna'],
        ['Kolkata', 'कोलकाता', 'West Bengal', 'ayodhya-kolkata'],
        ['Chennai', 'चेन्नई', 'Tamil Nadu', 'ayodhya-chennai'],
        ['Bangalore', 'बेंगलुरू', 'Karnataka', 'ayodhya-bangalore'],
        ['Hyderabad', 'हैदराबाद', 'Telangana', 'ayodhya-hyderabad'],
        ['Ahmedabad', 'अहमदाबाद', 'Gujarat', 'ayodhya-ahmedabad'],
        ['Pune', 'पुणे', 'Maharashtra', 'ayodhya-pune'],
        ['Jaipur', 'जयपुर', 'Rajasthan', 'ayodhya-jaipur'],
        ['Jodhpur', 'जोधपुर', 'Rajasthan', 'ayodhya-jodhpur'],
        ['Surat', 'सूरत', 'Gujarat', 'ayodhya-surat'],
        ['Nagpur', 'नागपुर', 'Maharashtra', 'ayodhya-nagpur'],
        ['Indore', 'इंदौर', 'Madhya Pradesh', 'ayodhya-indore'],
        ['Bhopal', 'भोपाल', 'Madhya Pradesh', 'ayodhya-bhopal'],
        ['Gwalior', 'ग्वालियर', 'Madhya Pradesh', 'ayodhya-gwalior'],
        ['Ujjain', 'उज्जैन', 'Madhya Pradesh', 'ayodhya-ujjain'],
        ['Chandigarh', 'चंडीगढ़', 'Punjab', 'ayodhya-chandigarh'],
        ['Amritsar', 'अमृतसर', 'Punjab', 'ayodhya-amritsar'],
        ['Ludhiana', 'लुधियाना', 'Punjab', 'ayodhya-ludhiana'],
        ['Dehradun', 'देहरादून', 'Uttarakhand', 'ayodhya-dehradun'],
        ['Haridwar', 'हरिद्वार', 'Uttarakhand', 'ayodhya-haridwar'],
        ['Rishikesh', 'ऋषिकेश', 'Uttarakhand', 'ayodhya-rishikesh'],
        ['Gorakhpur', 'गोरखपुर', 'Uttar Pradesh', 'ayodhya-gorakhpur'],
        ['Ghaziabad', 'गाजियाबाद', 'Uttar Pradesh', 'ayodhya-ghaziabad'],
        ['Meerut', 'मेरठ', 'Uttar Pradesh', 'ayodhya-meerut'],
        ['Bareilly', 'बरेली', 'Uttar Pradesh', 'ayodhya-bareilly'],
        ['Aligarh', 'अलीगढ़', 'Uttar Pradesh', 'ayodhya-aligarh'],
        ['Moradabad', 'मुरादाबाद', 'Uttar Pradesh', 'ayodhya-moradabad'],
        ['Saharanpur', 'सहारनपुर', 'Uttar Pradesh', 'ayodhya-saharanpur'],
        ['Firozabad', 'फिरोजाबाद', 'Uttar Pradesh', 'ayodhya-firozabad'],
        ['Faizabad', 'फैजाबाद', 'Uttar Pradesh', 'ayodhya-faizabad'],
        ['Sultanpur', 'सुल्तानपुर', 'Uttar Pradesh', 'ayodhya-sultanpur'],
        ['Raebareli', 'रायबरेली', 'Uttar Pradesh', 'ayodhya-raebareli'],
        ['Sitapur', 'सीतापुर', 'Uttar Pradesh', 'ayodhya-sitapur'],
        ['Lakhimpur', 'लखीमपुर', 'Uttar Pradesh', 'ayodhya-lakhimpur'],
        ['Gonda', 'गोंडा', 'Uttar Pradesh', 'ayodhya-gonda'],
        ['Bahraich', 'बहराइच', 'Uttar Pradesh', 'ayodhya-bahraich'],
        ['Shravasti', 'श्रावस्ती', 'Uttar Pradesh', 'ayodhya-shravasti'],
        ['Basti', 'बस्ती', 'Uttar Pradesh', 'ayodhya-basti'],
        ['Sant Kabir Nagar', 'संत कबीर नगर', 'Uttar Pradesh', 'ayodhya-sant-kabir-nagar'],
        ['Ambedkar Nagar', 'अंबेडकर नगर', 'Uttar Pradesh', 'ayodhya-ambedkar-nagar'],
        ['Amethi', 'अमेठी', 'Uttar Pradesh', 'ayodhya-amethi'],
        ['Ranchi', 'रांची', 'Jharkhand', 'ayodhya-ranchi'],
        ['Dhanbad', 'धनबाद', 'Jharkhand', 'ayodhya-dhanbad'],
        ['Jamshedpur', 'जमशेदपुर', 'Jharkhand', 'ayodhya-jamshedpur'],
        ['Bhubaneswar', 'भुवनेश्वर', 'Odisha', 'ayodhya-bhubaneswar'],
        ['Puri', 'पुरी', 'Odisha', 'ayodhya-puri'],
        ['Guwahati', 'गुवाहाटी', 'Assam', 'ayodhya-guwahati'],
        ['Shimla', 'शिमला', 'Himachal Pradesh', 'ayodhya-shimla'],
        ['Manali', 'मनाली', 'Himachal Pradesh', 'ayodhya-manali'],
        ['Kochi', 'कोची', 'Kerala', 'ayodhya-kochi'],
        ['Thiruvananthapuram', 'तिरुवनंतपुरम', 'Kerala', 'ayodhya-thiruvananthapuram'],
        ['Coimbatore', 'कोयम्बटूर', 'Tamil Nadu', 'ayodhya-coimbatore'],
        ['Madurai', 'मदुरई', 'Tamil Nadu', 'ayodhya-madurai'],
        ['Vishakhapatnam', 'विशाखापट्टनम', 'Andhra Pradesh', 'ayodhya-vishakhapatnam'],
        ['Vijayawada', 'विजयवाड़ा', 'Andhra Pradesh', 'ayodhya-vijayawada'],
        ['Tirupati', 'तिरुपति', 'Andhra Pradesh', 'ayodhya-tirupati'],
        ['Mysore', 'मैसूर', 'Karnataka', 'ayodhya-mysore'],
        ['Mangalore', 'मंगलुरु', 'Karnataka', 'ayodhya-mangalore'],
        ['Nashik', 'नासिक', 'Maharashtra', 'ayodhya-nashik'],
        ['Kolhapur', 'कोल्हापुर', 'Maharashtra', 'ayodhya-kolhapur'],
        ['Aurangabad', 'औरंगाबाद', 'Maharashtra', 'ayodhya-aurangabad'],
        ['Vadodara', 'वड़ोदरा', 'Gujarat', 'ayodhya-vadodara'],
        ['Rajkot', 'राजकोट', 'Gujarat', 'ayodhya-rajkot'],
        ['Bhavnagar', 'भावनगर', 'Gujarat', 'ayodhya-bhavnagar'],
        ['Jamnagar', 'जामनगर', 'Gujarat', 'ayodhya-jamnagar'],
        ['Ajmer', 'अजमेर', 'Rajasthan', 'ayodhya-ajmer'],
        ['Udaipur', 'उदयपुर', 'Rajasthan', 'ayodhya-udaipur'],
        ['Kota', 'कोटा', 'Rajasthan', 'ayodhya-kota'],
        ['Bikaner', 'बीकानेर', 'Rajasthan', 'ayodhya-bikaner'],
        ['Alwar', 'अलवर', 'Rajasthan', 'ayodhya-alwar'],
        ['Gurgaon', 'गुरुग्राम', 'Haryana', 'ayodhya-gurugram'],
        ['Faridabad', 'फरीदाबाद', 'Haryana', 'ayodhya-faridabad'],
        ['Panipat', 'पानीपत', 'Haryana', 'ayodhya-panipat'],
        ['Karnal', 'करनाल', 'Haryana', 'ayodhya-karnal'],
        ['Hisar', 'हिसार', 'Haryana', 'ayodhya-hisar'],
        ['Rohtak', 'रोहतक', 'Haryana', 'ayodhya-rohtak'],
        ['Agartala', 'अगरतला', 'Tripura', 'ayodhya-agartala'],
        ['Imphal', 'इंफाल', 'Manipur', 'ayodhya-imphal'],
        ['Shillong', 'शिलांग', 'Meghalaya', 'ayodhya-shillong'],
        ['Itanagar', 'ईटानगर', 'Arunachal Pradesh', 'ayodhya-itanagar'],
        ['Kohima', 'कोहिमा', 'Nagaland', 'ayodhya-kohima'],
        ['Aizawl', 'आइजोल', 'Mizoram', 'ayodhya-aizawl'],
        ['Gangtok', 'गैंगटोक', 'Sikkim', 'ayodhya-gangtok'],
        ['Port Blair', 'पोर्ट ब्लेयर', 'Andaman & Nicobar', 'ayodhya-port-blair'],
        ['Raipur', 'रायपुर', 'Chhattisgarh', 'ayodhya-raipur'],
        ['Bilaspur', 'बिलासपुर', 'Chhattisgarh', 'ayodhya-bilaspur'],
        ['Jammu', 'जम्मू', 'Jammu & Kashmir', 'ayodhya-jammu'],
        ['Srinagar', 'श्रीनगर', 'Jammu & Kashmir', 'ayodhya-srinagar'],
        ['Leh', 'लेह', 'Ladakh', 'ayodhya-leh'],
        ['Panaji', 'पणजी', 'Goa', 'ayodhya-goa'],
    ];
    $result = [];
    foreach ($cities as $c) {
        $content = getCityPageContent($c[0], $c[2], $c[3]);
        $content_hi = getCityPageContentHi($c[0], $c[1], $c[2], $c[3]);
        $seo_title = "Ayodhya Ram Mandir Yatra from {$c[0]} - Complete Travel Guide | AyodhyaRamMandir.in";
        $seo_desc = "{$c[0]} se Ayodhya Ram Mandir kaise jaye? Complete guide for travel from {$c[0]} to Ayodhya - distance, route, train, bus, flight, hotels, dharamshala.";
        $seo_kw = "Ayodhya from {$c[0]}, {$c[0]} to Ayodhya, {$c[0]} se Ayodhya, Ram Mandir {$c[0]}, Ayodhya yatra {$c[0]}";
        $result[] = [$c[0], $c[1], $c[2], $c[3], $content, $content_hi, $seo_title, $seo_desc, $seo_kw];
    }
    return $result;
}

function getCityPageContent($city, $state, $slug) {
    return "Complete Guide: {$city} to Ayodhya Ram Mandir Travel\n\n" .
    "Ayodhya Ram Mandir is the holiest Hindu temple, located in Ayodhya, Uttar Pradesh, India. This divine pilgrimage site draws millions of devotees from across India including {$city}, {$state}.\n\n" .
    "Distance & Route from {$city} to Ayodhya\n\nThe distance from {$city} to Ayodhya varies depending on your mode of transport. Ayodhya is well-connected by road, rail, and air from all major cities of India.\n\n" .
    "How to Reach Ayodhya from {$city}\n\n" .
    "By Train: The nearest railway station to Ram Mandir is Ayodhya Dham Junction (AY). Multiple trains run from {$city} to Ayodhya. You can book tickets on IRCTC website or app.\n\n" .
    "By Road: You can travel by bus or private car from {$city}. The National Highway network connects {$city} to Ayodhya. State roadways buses also operate on this route.\n\n" .
    "By Air: The nearest airport to Ayodhya is Maharishi Valmiki International Airport, Ayodhya (AYJ). You can fly from {$city} to Ayodhya or to Lucknow and then take a cab.\n\n" .
    "Best Time to Visit Ayodhya\n\nThe best time to visit Ayodhya Ram Mandir from {$city} is from October to March when the weather is pleasant. Special visits during Ram Navami, Diwali (Deepotsav), and Kartik Purnima are highly recommended.\n\n" .
    "Ram Mandir Darshan Timings\n\nMorning: 6:00 AM - 12:00 PM | Evening: 2:00 PM - 10:00 PM\nSpecial Aarti: Morning 6:00 AM and Evening 7:00 PM\n\n" .
    "Stay Options in Ayodhya\n\nThere are numerous hotels, dharamshalas, and guest houses available in Ayodhya for pilgrims coming from {$city}. Dharamshalas offer free or very affordable accommodation.\n\n" .
    "Places to Visit in Ayodhya\n\n1. Ram Janmabhoomi (Ram Mandir) - The main attraction\n2. Hanumangarhi - Ancient Hanuman temple\n3. Kanak Bhawan - Beautiful temple of Ram Sita\n4. Saryu Ghat - Sacred river ghats\n5. Ram Ki Paidi - Holy bathing ghats\n6. Dashrath Mahal - Palace of King Dashrath\n7. Tulsi Smarak Bhawan\n8. Mani Parvat\n9. Sita Ki Rasoi\n10. Gulab Bari\n\n" .
    "Prasad & Shopping\n\nBuy special prasad, rudraksha malas, Ram Naam chadar, religious items from the markets near Ram Mandir. Famous items include chuda-chandi of Ayodhya.\n\n" .
    "Important Tips for Pilgrims from {$city}\n\n1. Carry your ID proof\n2. Mobile phones not allowed inside Garbhagriha\n3. Dress modestly (traditional attire preferred)\n4. Book accommodation in advance during festivals\n5. Carry water and light snacks\n6. Best time for darshan: Early morning to avoid crowds\n\n" .
    "Emergency Contacts\n\nAyodhya Police: 112\nTourist Helpline: 1800-180-5522\nAyodhya Railway Station: 0527-2323081";
}

function getCityPageContentHi($city, $city_hi, $state, $slug) {
    return "{$city_hi} से अयोध्या राम मंदिर यात्रा - सम्पूर्ण गाइड\n\n" .
    "अयोध्या राम मंदिर भारत का सबसे पवित्र हिंदू मंदिर है, जो अयोध्या, उत्तर प्रदेश में स्थित है। यह दिव्य तीर्थस्थल {$city_hi} सहित पूरे भारत से लाखों श्रद्धालुओं को आकर्षित करता है।\n\n" .
    "{$city_hi} से अयोध्या की दूरी और रास्ता\n\n" .
    "ट्रेन से: राम मंदिर के सबसे नजदीक रेलवे स्टेशन अयोध्या धाम जंक्शन (AY) है। {$city_hi} से अयोध्या के लिए कई ट्रेनें चलती हैं।\n\n" .
    "सड़क मार्ग से: {$city_hi} से बस या निजी कार से यात्रा कर सकते हैं। राज्य परिवहन की बसें भी इस मार्ग पर चलती हैं।\n\n" .
    "हवाई मार्ग से: अयोध्या का नजदीकी हवाई अड्डा महर्षि वाल्मीकि अंतर्राष्ट्रीय हवाई अड्डा, अयोध्या (AYJ) है।\n\n" .
    "राम मंदिर दर्शन समय\n\nप्रातः 6:00 बजे से दोपहर 12:00 बजे तक | दोपहर 2:00 बजे से रात्रि 10:00 बजे तक\n\n" .
    "अयोध्या में घूमने की जगहें\n\n1. राम जन्मभूमि (राम मंदिर)\n2. हनुमानगढ़ी\n3. कनक भवन\n4. सरयू घाट\n5. राम की पैड़ी\n6. दशरथ महल\n7. तुलसी स्मारक भवन\n8. मणि पर्वत\n9. सीता की रसोई\n10. गुलाब बाड़ी\n\n" .
    "रहने की व्यवस्था\n\nअयोध्या में होटल, धर्मशाला और गेस्ट हाउस उपलब्ध हैं। धर्मशालाओं में मुफ्त या बहुत किफायती आवास मिलता है।\n\n" .
    "जरूरी टिप्स\n\n1. पहचान पत्र साथ रखें\n2. गर्भगृह में मोबाइल फोन की अनुमति नहीं\n3. शालीन वस्त्र पहनें\n4. त्योहारों के दौरान पहले से आवास बुक करें";
}

function getKeywordPagesList() {
    $keywords = [
        ['Ram Mandir', 'राम मंदिर', 'ram-mandir'],
        ['Shree Ram', 'श्री राम', 'shree-ram'],
        ['Sita Ram', 'सीता राम', 'sita-ram'],
        ['Jai Shree Ram', 'जय श्री राम', 'jai-shree-ram'],
        ['Siyaram', 'सियाराम', 'siyaram'],
        ['Purushottam Shree Ram', 'पुरुषोत्तम श्री राम', 'purushottam-shree-ram'],
        ['Raghupati Raghav Raja Ram', 'रघुपति राघव राजा राम', 'raghupati-raghav-raja-ram'],
        ['Maryada Purushottam Ram', 'मर्यादा पुरुषोत्तम राम', 'maryada-purushottam-ram'],
        ['Ram Lalla', 'राम लला', 'ram-lalla'],
        ['Ram Janmabhoomi', 'राम जन्मभूमि', 'ram-janmabhoomi'],
        ['Ayodhya Ram Mandir', 'अयोध्या राम मंदिर', 'ayodhya-ram-mandir'],
        ['Hanuman Ji', 'हनुमान जी', 'hanuman-ji'],
        ['Bajrangbali', 'बजरंगबली', 'bajrangbali'],
        ['Hanumangarhi', 'हनुमानगढ़ी', 'hanumangarhi'],
        ['Mata Sita', 'माता सीता', 'mata-sita'],
        ['Ramayan', 'रामायण', 'ramayan'],
        ['Ramayana Story', 'रामायण की कथा', 'ramayana-story'],
        ['Ram Setu', 'राम सेतु', 'ram-setu'],
        ['Lanka Dahan', 'लंका दहन', 'lanka-dahan'],
        ['Ravan Vadh', 'रावण वध', 'ravan-vadh'],
        ['Ram Vanvas', 'राम वनवास', 'ram-vanvas'],
        ['Ram Rajya', 'रामराज्य', 'ram-rajya'],
        ['Sita Haran', 'सीता हरण', 'sita-haran'],
        ['Pushpak Viman', 'पुष्पक विमान', 'pushpak-viman'],
        ['Ayodhya Darshan', 'अयोध्या दर्शन', 'ayodhya-darshan'],
        ['Ayodhya Dham', 'अयोध्या धाम', 'ayodhya-dham'],
        ['Ram Navami', 'राम नवमी', 'ram-navami'],
        ['Diwali Ayodhya', 'दीवाली अयोध्या', 'diwali-ayodhya'],
        ['Deepotsav Ayodhya', 'दीपोत्सव अयोध्या', 'deepotsav-ayodhya'],
        ['Saryu Ghat', 'सरयू घाट', 'saryu-ghat'],
        ['Ram Ki Paidi', 'राम की पैड़ी', 'ram-ki-paidi'],
        ['Kanak Bhawan', 'कनक भवन', 'kanak-bhawan'],
        ['Dashrath Mahal', 'दशरथ महल', 'dashrath-mahal'],
        ['Treta Ka Thakur', 'त्रेता का ठाकुर', 'treta-ka-thakur'],
        ['Nageshwarnath Temple', 'नागेश्वरनाथ मंदिर', 'nageshwarnath-temple'],
        ['Ayodhya History', 'अयोध्या का इतिहास', 'ayodhya-history'],
        ['Ram Mandir History', 'राम मंदिर का इतिहास', 'ram-mandir-history'],
        ['Pran Pratishtha', 'प्राण प्रतिष्ठा', 'pran-pratishtha'],
        ['Ram Mandir Architecture', 'राम मंदिर वास्तुकला', 'ram-mandir-architecture'],
        ['Ayodhya Travel Guide', 'अयोध्या यात्रा गाइड', 'ayodhya-travel-guide'],
        ['How to Reach Ayodhya', 'अयोध्या कैसे पहुंचे', 'how-to-reach-ayodhya'],
        ['Ayodhya Hotels', 'अयोध्या होटल', 'ayodhya-hotels'],
        ['Dharamshala Ayodhya', 'धर्मशाला अयोध्या', 'dharamshala-ayodhya'],
        ['Ayodhya Food', 'अयोध्या का खाना', 'ayodhya-food'],
        ['Ayodhya Shopping', 'अयोध्या शॉपिंग', 'ayodhya-shopping'],
        ['Ram Mandir Darshan', 'राम मंदिर दर्शन', 'ram-mandir-darshan'],
        ['Ram Mandir Timings', 'राम मंदिर समय', 'ram-mandir-timings'],
        ['Ram Mandir Prasad', 'राम मंदिर प्रसाद', 'ram-mandir-prasad'],
        ['Ram Aarti', 'राम आरती', 'ram-aarti'],
        ['Ram Chalisa', 'राम चालीसा', 'ram-chalisa'],
        ['Hanuman Chalisa', 'हनुमान चालीसा', 'hanuman-chalisa'],
        ['Ram Bhajan', 'राम भजन', 'ram-bhajan'],
        ['Ramcharitmanas', 'रामचरितमानस', 'ramcharitmanas'],
        ['Valmiki Ramayana', 'वाल्मीकि रामायण', 'valmiki-ramayana'],
        ['Goswami Tulsidas', 'गोस्वामी तुलसीदास', 'goswami-tulsidas'],
        ['Guru Vashishtha', 'गुरु वशिष्ठ', 'guru-vashishtha'],
        ['Rishi Vishwamitra', 'ऋषि विश्वामित्र', 'rishi-vishwamitra'],
        ['Shabari Ram', 'शबरी राम', 'shabari-ram'],
        ['Sugriv Ram', 'सुग्रीव राम', 'sugriv-ram'],
        ['Vibhishan Ram', 'विभीषण राम', 'vibhishan-ram'],
        ['Jatayu Ram', 'जटायु राम', 'jatayu-ram'],
        ['Ram Darbar', 'राम दरबार', 'ram-darbar'],
        ['Ram Sita Vivah', 'राम सीता विवाह', 'ram-sita-vivah'],
        ['Sita Swayamvar', 'सीता स्वयंवर', 'sita-swayamvar'],
        ['Shiv Dhanush', 'शिव धनुष', 'shiv-dhanush'],
        ['Sona Lanka', 'सोने की लंका', 'sona-lanka'],
        ['Ravan Lanka', 'रावण लंका', 'ravan-lanka'],
        ['Ravan History', 'रावण का इतिहास', 'ravan-history'],
        ['Lakshman Rekha', 'लक्ष्मण रेखा', 'lakshman-rekha'],
        ['Ram Naam', 'राम नाम', 'ram-naam'],
        ['Ram Bhakti', 'राम भक्ति', 'ram-bhakti'],
        ['Ram Mantra', 'राम मंत्र', 'ram-mantra'],
        ['Om Sri Ram', 'ॐ श्री राम', 'om-shri-ram'],
        ['Jai Ram', 'जय राम', 'jai-ram'],
        ['Jai Siya Ram', 'जय सिया राम', 'jai-siya-ram'],
        ['Ram Story Hindi', 'राम की कहानी हिंदी', 'ram-story-hindi'],
        ['Ram Katha', 'राम कथा', 'ram-katha'],
        ['Ramayana Hindi', 'रामायण हिंदी', 'ramayana-hindi'],
        ['Ram Mandir News', 'राम मंदिर न्यूज', 'ram-mandir-news'],
        ['Ram Mandir 2024', 'राम मंदिर 2024', 'ram-mandir-2024'],
        ['January 22 2024', '22 जनवरी 2024', 'ram-mandir-inauguration'],
        ['Ram Mandir Donation', 'राम मंदिर दान', 'ram-mandir-donation'],
        ['VHP Ram Mandir', 'VHP राम मंदिर', 'vhp-ram-mandir'],
        ['Ayodhya Verdict', 'अयोध्या फैसला', 'ayodhya-verdict'],
        ['Ayodhya Pilgrimage', 'अयोध्या तीर्थ', 'ayodhya-pilgrimage'],
        ['Ram Mandir Map', 'राम मंदिर मैप', 'ram-mandir-map'],
        ['Ayodhya Tour Package', 'अयोध्या टूर पैकेज', 'ayodhya-tour-package'],
        ['Ayodhya Mathura Vrindavan', 'अयोध्या मथुरा वृंदावन', 'ayodhya-mathura-vrindavan'],
        ['Panch Kosi Parikrama', 'पंच कोसी परिक्रमा', 'panch-kosi-parikrama'],
        ['Chaturdashi Kosi Parikrama', 'चतुर्दशी कोसी परिक्रमा', 'chaturdashi-kosi-parikrama'],
        ['Ayodhya Deepotsav 2024', 'अयोध्या दीपोत्सव 2024', 'ayodhya-deepotsav-2024'],
        ['Ram Janam Bhoomi History', 'राम जन्म भूमि इतिहास', 'ram-janam-bhoomi-history'],
        ['Babri Masjid Ayodhya', 'बाबरी मस्जिद अयोध्या', 'babri-masjid-ayodhya-history'],
    ];
    $result = [];
    foreach ($keywords as $k) {
        $content = getKeywordPageContent($k[0], $k[2]);
        $content_hi = getKeywordPageContentHi($k[0], $k[1], $k[2]);
        $seo_title = "{$k[0]} - Complete Information & Guide | AyodhyaRamMandir.in";
        $seo_desc = "Complete information about {$k[0]}. Know everything about {$k[0]} - history, significance, stories, and more on AyodhyaRamMandir.in";
        $result[] = [$k[0], $k[1], $k[2], $content, $content_hi, $seo_title, $seo_desc];
    }
    return $result;
}

function getKeywordPageContent($keyword, $slug) {
    return "Complete Guide to {$keyword}\n\n" .
    "{$keyword} holds immense significance in Hindu religion and culture. This page provides comprehensive information about {$keyword} including its history, significance, stories from Ramayana, and its connection to Ayodhya Ram Mandir.\n\n" .
    "Significance of {$keyword}\n\nIn the Hindu tradition, {$keyword} represents divine truth, righteousness, and devotion. Lord Ram, born in Ayodhya as the seventh incarnation of Lord Vishnu, embodies the perfect human being - Maryada Purushottam.\n\n" .
    "History & Stories Related to {$keyword}\n\nThe Ramayana by Maharishi Valmiki and Ramcharitmanas by Goswami Tulsidas describe in detail the divine stories associated with {$keyword}. These sacred texts have guided millions of devotees for thousands of years.\n\n" .
    "Connection with Ayodhya Ram Mandir\n\nThe grand Ram Mandir at Ayodhya, inaugurated on 22nd January 2024 with Pran Pratishtha ceremony, is directly connected to {$keyword}. Millions of devotees visit this sacred temple daily.\n\n" .
    "How to Experience {$keyword}\n\nYou can experience the divine essence of {$keyword} by:\n1. Visiting Ayodhya Ram Mandir\n2. Reading Ramayan and Ramcharitmanas\n3. Chanting Ram Naam\n4. Performing Ram Aarti\n5. Listening to Ram Bhajans\n6. Visiting sacred places associated with Ram\n\n" .
    "Related Sacred Places\n\nAyodhya - Birthplace of Lord Ram\nJanakpur - Birthplace of Sita Mata\nChitrakoot - Vanvas place\nHampi - Kishkindha\nRameshwaram - Ram Setu bridge\nLanka - Kingdom of Ravan\n\n" .
    "Prayers & Mantras\n\nJai Shri Ram | जय श्री राम\nRam Ram Jai Raja Ram | राम राम जय राजा राम\nRam Ram Jai Sita Ram | राम राम जय सीता राम\nShri Ram Jai Ram Jai Jai Ram | श्री राम जय राम जय जय राम\n\n" .
    "Visit Ayodhya Ram Mandir\n\nFor darshan of Ram Lalla at Ayodhya Ram Mandir:\nTimings: 6:00 AM to 10:00 PM\nAarti: 6:00 AM and 7:00 PM\nAddress: Ram Janmabhoomi, Ayodhya, UP - 224123\nNearby Station: Ayodhya Dham Junction";
}

function getKeywordPageContentHi($keyword, $keyword_hi, $slug) {
    return "{$keyword_hi} - सम्पूर्ण जानकारी\n\n" .
    "{$keyword_hi} हिंदू धर्म और संस्कृति में अत्यंत महत्वपूर्ण है। इस पेज पर {$keyword_hi} के बारे में संपूर्ण जानकारी दी गई है - इतिहास, महत्व, रामायण की कथाएं और अयोध्या राम मंदिर से इसका संबंध।\n\n" .
    "{$keyword_hi} का महत्व\n\nहिंदू परंपरा में {$keyword_hi} सत्य, धर्म और भक्ति का प्रतीक है। भगवान राम, अयोध्या में भगवान विष्णु के सातवें अवतार के रूप में जन्मे, मर्यादा पुरुषोत्तम हैं।\n\n" .
    "अयोध्या राम मंदिर और {$keyword_hi}\n\n22 जनवरी 2024 को प्राण प्रतिष्ठा समारोह के साथ उद्घाटित अयोध्या राम मंदिर {$keyword_hi} से सीधे जुड़ा है। प्रतिदिन लाखों श्रद्धालु इस पवित्र मंदिर में दर्शन करते हैं।\n\n" .
    "राम मंदिर दर्शन समय\n\nप्रातः 6:00 बजे से रात्रि 10:00 बजे तक\nआरती: प्रातः 6:00 बजे और सायं 7:00 बजे\nपता: राम जन्मभूमि, अयोध्या, UP - 224123\n\n" .
    "पवित्र मंत्र\n\nजय श्री राम | श्री राम जय राम जय जय राम | राम राम जय राजा राम | राम राम जय सीता राम";
}

function getRamMandirPages() {
    return [
        ['ram-mandir', 'Ram Mandir Ayodhya - Complete History & Guide', 'राम मंदिर अयोध्या - सम्पूर्ण इतिहास और गाइड',
         getRamMandirContent(), getRamMandirContentHi(),
         'Ram Mandir Ayodhya - History, Architecture, Darshan Guide | AyodhyaRamMandir.in',
         'Complete guide to Ram Mandir Ayodhya - history, architecture, darshan timings, how to reach, and everything you need to know about this sacred temple.',
         'Ram Mandir, Ayodhya, Ram Janmabhoomi, Ram Lalla, Pran Pratishtha', 'page', 'published'],
        ['ramayan', 'Ramayana - Complete Story of Shri Ram', 'रामायण - श्री राम की सम्पूर्ण कथा',
         getRamayanContent(), getRamayanContentHi(),
         'Ramayana Complete Story in Hindi & English | AyodhyaRamMandir.in',
         'Read complete Ramayana story online - Bal Kand, Ayodhya Kand, Aranya Kand, Kishkindha Kand, Sundar Kand, Lanka Kand, Uttar Kand.',
         'Ramayana, Ramayan, Ram Katha, Ram story, Valmiki Ramayana', 'page', 'published'],
        ['hanuman-ji', 'Hanuman Ji - Complete Story & Significance', 'हनुमान जी - सम्पूर्ण कथा और महत्व',
         getHanumanContent(), getHanumanContentHi(),
         'Hanuman Ji Complete Story, Chalisa & Significance | AyodhyaRamMandir.in',
         'Complete information about Hanuman Ji - birth story, Ram Bhakti, Sundarkand, Hanumangarhi Ayodhya, Hanuman Chalisa.',
         'Hanuman Ji, Bajrangbali, Hanuman Chalisa, Hanumangarhi', 'page', 'published'],
        ['mata-sita', 'Mata Sita - Complete Life Story & Significance', 'माता सीता - सम्पूर्ण जीवन कथा',
         getSitaContent(), getSitaContentHi(),
         'Mata Sita Complete Story | AyodhyaRamMandir.in',
         'Complete story of Mata Sita - birth in Janakpur, Swayamvar, Ram Sita Vivah, Vanvas, Sita Haran, Lanka, Agni Pariksha.',
         'Mata Sita, Sita Ram, Sita story, Sita Mata', 'page', 'published'],
        ['ayodhya-guide', 'Ayodhya Travel Guide - Complete Tourist Information', 'अयोध्या यात्रा गाइड',
         getAyodhyaGuideContent(), getAyodhyaGuideContentHi(),
         'Ayodhya Travel Guide - Hotels, Darshan, How to Reach | AyodhyaRamMandir.in',
         'Complete Ayodhya travel guide - places to visit, how to reach, best hotels, dharamshala, food, shopping, and darshan guide.',
         'Ayodhya guide, Ayodhya tourism, Ayodhya travel', 'page', 'published'],
        ['hanumangarhi', 'Hanumangarhi Temple Ayodhya - Complete Guide', 'हनुमानगढ़ी मंदिर अयोध्या',
         getHanumanGarhiContent(), getHanumanGarhiContentHi(),
         'Hanumangarhi Temple Ayodhya - History, Timings & Guide | AyodhyaRamMandir.in',
         'Complete guide to Hanumangarhi Temple in Ayodhya - history, significance, darshan timings, how to reach, and what to see.',
         'Hanumangarhi, Hanumangarhi Ayodhya, Hanuman temple Ayodhya', 'page', 'published'],
        ['dharamshala-ayodhya', 'Dharamshala in Ayodhya - Free & Budget Stay Guide', 'अयोध्या में धर्मशाला - मुफ्त और बजट रहने की जगहें',
         getDharamshaladContent(), getDharamshaladContentHi(),
         'Best Dharamshala in Ayodhya for Pilgrims | AyodhyaRamMandir.in',
         'Complete list of dharamshalas in Ayodhya offering free and budget accommodation for Ram Mandir pilgrims.',
         'Dharamshala Ayodhya, free stay Ayodhya, Ayodhya accommodation', 'page', 'published'],
        ['live-aarti', 'Ram Lalla Live Aarti - Watch Online', 'राम लला लाइव आरती - ऑनलाइन देखें',
         getLiveAartiContent(), getLiveAartiContentHi(),
         'Ram Lalla Live Aarti Ayodhya - Watch Online | AyodhyaRamMandir.in',
         'Watch Ram Lalla Live Aarti from Ayodhya Ram Mandir online. Morning and evening aarti timings and YouTube links.',
         'Ram Aarti, Ram Lalla aarti, Ayodhya aarti live', 'page', 'published'],
        ['shri-ram-janam-katha', 'Shri Ram Janam Katha - Birth Story of Lord Ram', 'श्री राम जन्म कथा',
         getRamJanamContent(), getRamJanamContentHi(),
         'Shri Ram Janam Katha - Birth Story of Lord Ram | AyodhyaRamMandir.in',
         'Complete story of Shri Ram Janam - how Lord Ram was born in Ayodhya, Putreshti Yagya, birth celebrations.',
         'Ram Janam Katha, Ram birth story, Ram Navami', 'page', 'published'],
        ['daily-suvichar', 'Daily Suvichar - Ram Bhakti Quotes', 'दैनिक सुविचार',
         'Daily devotional thoughts and quotes from Ramayan and Ram Bhakti tradition.', 'रामायण और राम भक्ति परंपरा के दैनिक भक्तिपूर्ण विचार।',
         'Daily Ram Suvichar | AyodhyaRamMandir.in',
         'Daily devotional quotes and suvichar from Ramayan, Ramcharitmanas and Ram Bhakti tradition.',
         'Ram suvichar, Ram quotes, devotional thoughts', 'page', 'published'],
        ['kundli-rashifal', 'Kundli & Rashifal - Daily Horoscope', 'कुंडली और राशिफल',
         'Daily horoscope and kundli for all 12 zodiac signs with Ram Bhakti blessings.', 'सभी 12 राशियों के लिए दैनिक राशिफल और कुंडली।',
         'Daily Rashifal & Kundli | AyodhyaRamMandir.in',
         'Daily horoscope for all zodiac signs with Ram blessings and spiritual guidance.',
         'rashifal, kundli, daily horoscope', 'page', 'published'],
        ['kanak-bhawan', 'Kanak Bhawan Ayodhya - Complete Guide', 'कनक भवन अयोध्या - सम्पूर्ण गाइड',
         getKanakBhawanContent(), getKanakBhawanContentHi(),
         'Kanak Bhawan Ayodhya - Temple Guide & History | AyodhyaRamMandir.in',
         'Complete guide to Kanak Bhawan in Ayodhya - history, significance, darshan timings, and what to see.',
         'Kanak Bhawan, Kanak Bhawan Ayodhya, Ram Sita temple', 'page', 'published'],
        ['saryu-ghat', 'Saryu Ghat Ayodhya - Sacred River Ghats', 'सरयू घाट अयोध्या',
         getSaryuGhatContent(), getSaryuGhatContentHi(),
         'Saryu Ghat Ayodhya - Complete Guide | AyodhyaRamMandir.in',
         'Complete guide to Saryu Ghat in Ayodhya - sacred bathing ghats, Ram Ki Paidi, evening Ganga Aarti.',
         'Saryu Ghat, Saryu River, Ram Ki Paidi Ayodhya', 'page', 'published'],
        ['ram-mandir-darshan-guide', 'Ram Mandir Darshan Guide - Complete Information', 'राम मंदिर दर्शन गाइड',
         getDarshanGuideContent(), getDarshanGuideContentHi(),
         'Ram Mandir Darshan Guide - Timings, Rules & Tips | AyodhyaRamMandir.in',
         'Complete Ram Mandir darshan guide - timings, entry rules, what to carry, dress code, aarti schedule.',
         'Ram Mandir darshan, darshan guide, Ram Lalla darshan', 'page', 'published'],
    ];
}

function getRamMandirContent() {
    return "Ayodhya Ram Mandir - Complete History and Guide\n\nThe Shri Ram Janmabhoomi Mandir, popularly known as Ram Mandir or Ayodhya Ram Mandir, is a Hindu temple under construction in Ayodhya, Uttar Pradesh, India. It is built at the site of Ram Janmabhoomi - the birthplace of Lord Rama.\n\nThe temple was inaugurated on 22 January 2024 with the Pran Pratishtha ceremony performed by Prime Minister Narendra Modi in the presence of thousands of saints and dignitaries. This was one of the most historic events in modern India.\n\nArchitecture of Ram Mandir\n\nThe Ram Mandir is built in the Nagara style of Hindu temple architecture. The temple is 380 feet long, 250 feet wide, and 161 feet high. It has 5 mandapas (halls): Nritya Mandap, Rang Mandap, Sabha Mandap, Prarthana Mandap, and Kirtan Mandap.\n\nThe temple is built with pink sandstone from Rajasthan (Bansi Paharpur). It has 392 pillars and 44 doors. No steel or iron is used in the construction - all pillars are made of stone. The temple can accommodate approximately 10,000 pilgrims at a time.\n\nHistory of Ram Mandir Movement\n\nThe Ram Janmabhoomi movement is one of the most significant religious and political movements in modern India. For centuries, Hindus believed that the exact spot where Lord Ram was born in Ayodhya was sacred.\n\nIn 1528 AD, Mir Baqi, a commander of Mughal Emperor Babur, demolished the original Ram Mandir and constructed the Babri Masjid at that site. This led to centuries of conflict.\n\nMultiple legal battles were fought. Finally on 9 November 2019, the Supreme Court of India gave a unanimous verdict in favor of the Ram Janmabhoomi Trust, directing the government to hand over the disputed land to the Trust for building the temple.\n\nOn 5 August 2020, Prime Minister Modi performed the Bhoomi Pujan (ground-breaking ceremony) for the Ram Mandir.\n\nOn 22 January 2024, the Pran Pratishtha ceremony was performed, consecrating the idol of Ram Lalla in the sanctum sanctorum.\n\nRam Lalla - The Main Deity\n\nThe main deity of Ram Mandir is Ram Lalla - the child form of Lord Ram. The new murti (idol) was sculpted by Arun Yogiraj, a noted sculptor from Mysuru. The idol is 51 inches tall, made of Krishna Shila (black stone), and shows Lord Ram as a 5-year-old child.\n\nDarshan Timings\n\nMorning Session: 6:00 AM to 12:00 PM\nAfternoon Break: 12:00 PM to 2:00 PM\nEvening Session: 2:00 PM to 10:00 PM\nMangala Aarti: 4:00 AM (Special darshan)\nShringar Aarti: 6:00 AM\nShodashopachar Puja: 7:30 AM\nBhog Aarti: 12:00 PM\nSandhya Aarti: 7:30 PM\nShayan Aarti: 10:00 PM\n\nHow to Reach Ram Mandir\n\nBy Air: Maharishi Valmiki International Airport, Ayodhya (AYJ) - inaugurated in December 2023\nBy Train: Ayodhya Dham Junction (AY) - well connected to all major cities\nBy Road: Well connected by NH-27 and state highways\n\nAyodhya is located approximately:\n- 135 km from Lucknow\n- 200 km from Varanasi\n- 700 km from Delhi\n- 550 km from Patna";
}

function getRamMandirContentHi() {
    return "अयोध्या राम मंदिर - सम्पूर्ण इतिहास और गाइड\n\nश्री राम जन्मभूमि मंदिर, जिसे राम मंदिर या अयोध्या राम मंदिर के नाम से जाना जाता है, अयोध्या, उत्तर प्रदेश में राम जन्मभूमि पर बना एक हिंदू मंदिर है।\n\nयह मंदिर 22 जनवरी 2024 को प्रधानमंत्री नरेंद्र मोदी द्वारा प्राण प्रतिष्ठा समारोह के साथ उद्घाटित किया गया।\n\nराम मंदिर की वास्तुकला\n\nराम मंदिर नागर शैली की हिंदू मंदिर वास्तुकला में बना है। मंदिर 380 फीट लंबा, 250 फीट चौड़ा और 161 फीट ऊंचा है। इसमें 5 मंडप हैं: नृत्य मंडप, रंग मंडप, सभा मंडप, प्रार्थना मंडप और कीर्तन मंडप।\n\nमंदिर राजस्थान के बंसी पहाड़पुर के गुलाबी बलुआ पत्थर से बना है। इसमें 392 स्तंभ और 44 द्वार हैं। निर्माण में कोई स्टील या लोहा नहीं है।\n\nराम मंदिर आंदोलन का इतिहास\n\n1528 ईस्वी में मुगल सम्राट बाबर के सेनापति मीर बाकी ने मूल राम मंदिर को तोड़कर बाबरी मस्जिद का निर्माण किया। इससे सदियों का संघर्ष शुरू हुआ।\n\n9 नवंबर 2019 को भारत के सर्वोच्च न्यायालय ने सर्वसम्मत निर्णय दिया।\n5 अगस्त 2020 को प्रधानमंत्री मोदी ने भूमि पूजन किया।\n22 जनवरी 2024 को प्राण प्रतिष्ठा समारोह हुआ।\n\nराम लला - मुख्य देवता\n\nराम मंदिर के मुख्य देवता राम लला हैं। नई मूर्ति को मैसूर के प्रसिद्ध मूर्तिकार अरुण योगीराज ने बनाया है। मूर्ति 51 इंच ऊंची, कृष्ण शिला (काले पत्थर) से बनी है।\n\nदर्शन समय\n\nप्रातः 6:00 से दोपहर 12:00 बजे तक | दोपहर 2:00 से रात्रि 10:00 बजे तक\n\nकैसे पहुंचें\n\nहवाई मार्ग: महर्षि वाल्मीकि अंतर्राष्ट्रीय हवाई अड्डा, अयोध्या\nरेल मार्ग: अयोध्या धाम जंक्शन\nसड़क मार्ग: NH-27 और राज्य राजमार्ग";
}

function getRamayanContent() {
    return "Ramayana - Complete Story of Shri Ram\n\nThe Ramayana is one of the two great epics of Hindu literature (the other being the Mahabharata). Written by Maharishi Valmiki in Sanskrit, it tells the story of Prince Rama of Ayodhya. Goswami Tulsidas later wrote Ramcharitmanas in Awadhi, making it accessible to common people.\n\nBal Kand - The Childhood of Ram\n\nKing Dashrath of Ayodhya performed the Putreshti Yagya to have children. Lord Vishnu incarnated as four sons - Ram, Lakshman, Bharat, and Shatrughna. Ram was born on the ninth day of Chaitra month (Ram Navami).\n\nUnder Guru Vishwamitra's guidance, Ram and Lakshman learned warfare and protected the yagya from demons. Ram killed the demoness Tadaka. In Mithila, Ram broke Shiva's bow (Pinaka) and won Sita's swayamvar.\n\nAyodhya Kand - The Exile\n\nKing Dashrath wanted to crown Ram as king, but Queen Kaikeyi demanded two boons - Bharat as king and Ram's 14-year exile. Ram, ever-obedient, accepted his exile. Sita and Lakshman also went with him.\n\nAranya Kand - The Forest\n\nIn the forest of Dandakaranya, Ram and Sita met many sages. The demoness Surpanakha tried to seduce Ram, and Lakshman cut off her nose and ears. Surpanakha went to her brother Ravan and described Sita's beauty.\n\nRavan sent Maricha as a golden deer. Sita asked Ram to catch the deer. When Ram left, Ravan came disguised as a sage and abducted Sita. The vulture Jatayu tried to save Sita but was mortally wounded by Ravan.\n\nKishkindha Kand - Meeting with Hanuman\n\nOn Mount Rishyamuk, Ram met Hanuman. Through Hanuman, Ram befriended Sugriv and killed Vali, helping Sugriv regain his kingdom. In return, Sugriv's army searched for Sita.\n\nSundar Kand - Hanuman's Journey to Lanka\n\nHanuman crossed the ocean with a mighty leap to Lanka. He found Sita in Ashoka Vatika and gave her Ram's ring. He burned Lanka with his tail (Lanka Dahan) and returned with news of Sita.\n\nYuddha Kand - The War\n\nRam's army built the Ram Setu (bridge over the ocean) with help of vanara sena. The great war happened in Lanka. Ram killed many demons including Kumbhkarna and Indrajit. Finally, Ram killed the ten-headed Ravan with the Brahmastra.\n\nSita's Agni Pariksha took place to prove her purity. Ram, Sita, and Lakshman returned to Ayodhya in the Pushpak Viman. The whole of Ayodhya was lit up with lamps - this is celebrated as Diwali.\n\nUttar Kand - Ram Rajya\n\nRam was crowned as king and established Ram Rajya - a kingdom of perfect justice, prosperity, and happiness. This period is considered the golden age of human civilization.";
}

function getRamayanContentHi() {
    return "रामायण - श्री राम की सम्पूर्ण कथा\n\nरामायण हिंदू साहित्य के दो महान महाकाव्यों में से एक है। महर्षि वाल्मीकि ने इसे संस्कृत में लिखा। गोस्वामी तुलसीदास ने बाद में अवधी में रामचरितमानस लिखी।\n\nबाल कांड - राम का बचपन\n\nअयोध्या के राजा दशरथ ने पुत्रेष्टि यज्ञ किया। भगवान विष्णु ने राम, लक्ष्मण, भरत और शत्रुघ्न के रूप में अवतार लिया। राम चैत्र मास की नवमी को जन्मे (राम नवमी)।\n\nगुरु विश्वामित्र के साथ राम-लक्ष्मण ने यज्ञ की रक्षा की। मिथिला में राम ने शिव धनुष तोड़कर सीता से विवाह किया।\n\nअयोध्या कांड - वनवास\n\nराजा दशरथ ने राम को राजा बनाना चाहा, लेकिन कैकेयी ने वरदान मांगे - भरत को राजा बनाना और राम को 14 वर्ष का वनवास। राम ने मर्यादा से वनवास स्वीकार किया।\n\nअरण्य कांड - वन में\n\nसुरपणखा के बाद रावण ने सीता का हरण किया। जटायु ने सीता को बचाने की कोशिश की लेकिन घायल हो गया।\n\nकिष्किंधा कांड - हनुमान से मिलन\n\nऋष्यमूक पर्वत पर राम की हनुमान से भेंट हुई। राम ने सुग्रीव से मित्रता की और वालि का वध किया।\n\nसुंदर कांड - हनुमान की लंका यात्रा\n\nहनुमान ने समुद्र पार कर लंका में सीता को ढूंढा। लंका दहन किया और राम के पास वापस आए।\n\nयुद्ध कांड - लंका युद्ध\n\nराम सेतु बना। महायुद्ध में राम ने कुंभकर्ण, इंद्रजीत और अंत में दशानन रावण का वध किया।\n\nउत्तर कांड - राम राज्य\n\nराम का राज्याभिषेक हुआ और राम राज्य की स्थापना हुई।";
}

function getHanumanContent() {
    return "Hanuman Ji - Complete Story, Significance & Guide\n\nLord Hanuman (also known as Bajrangbali, Mahavir, Pawan Putra, Anjani Putra, and Maruti) is one of the most beloved deities in Hinduism. He is the greatest devotee of Lord Ram and played a crucial role in the Ramayana.\n\nBirth of Hanuman\n\nHanuman was born to Anjana (an apsara who had been cursed to become a monkey) and Kesari (a monkey king). He is also considered to be the son of the wind god Vayu (Pavan Putra) as Vayu carried the divine pudding to Anjana. He was born on a Tuesday, which is why Tuesday is considered Hanuman's day.\n\nHanuman's Childhood\n\nAs a child, Hanuman mistook the rising sun for a ripe fruit and tried to swallow it. When Indra struck him with his thunderbolt, Vayu (wind god) became upset and stopped the flow of air. All beings started suffocating. The gods then blessed baby Hanuman with various boons to pacify Vayu.\n\nHanuman's Meeting with Ram\n\nWhen Ram was searching for Sita, he met Sugriv on Mount Rishyamuk. Sugriv sent Hanuman as a messenger. Hanuman, disguised as a brahmin, approached Ram and Lakshman. Ram recognized Hanuman's divine nature immediately.\n\nSundarkand - Hanuman's Greatest Achievement\n\nHanuman's journey to Lanka as described in Sundarkand of Valmiki Ramayana is one of the most celebrated episodes. Key events:\n1. Hanuman leaps across the ocean\n2. He enters Lanka disguised\n3. Finds Sita in Ashoka Vatika\n4. Delivers Ram's ring to Sita\n5. Destroys Ashoka Vatika\n6. Gets captured by Indrajit's Brahmastra\n7. Burns Lanka with his tail\n8. Returns to Ram with news of Sita\n\nHanumangarhi Temple\n\nHanumangarhi is one of the most important temples in Ayodhya, dedicated to Hanuman Ji. It is located on a 50-60 step high ground. The temple has a large statue of Hanuman Ji. It is believed that Hanuman resided here to protect Ram's birthplace.\n\nHanuman Chalisa\n\nGoswami Tulsidas composed the Hanuman Chalisa, consisting of 40 verses praising Hanuman's qualities and deeds. It is one of the most recited prayers in Hinduism.\n\nSignificance of Worshipping Hanuman\n\nDevotees worship Hanuman for:\n- Protection from evil forces\n- Courage and strength\n- Success in endeavors\n- Relief from Saturn's influence (Shani)\n- Resolution of problems";
}

function getHanumanContentHi() {
    return "हनुमान जी - सम्पूर्ण कथा और महत्व\n\nभगवान हनुमान (बजरंगबली, महावीर, पवन पुत्र, अंजनी पुत्र) हिंदू धर्म के सबसे प्रिय देवताओं में से एक हैं। वे भगवान राम के परम भक्त हैं।\n\nहनुमान जी का जन्म\n\nहनुमान जी का जन्म अंजना (एक अप्सरा जो श्राप से वानरी बनी) और केसरी से हुआ। वे पवन पुत्र भी हैं। मंगलवार को इनका जन्म हुआ, इसलिए मंगलवार इनका दिन है।\n\nसुंदरकांड - हनुमान जी की सबसे बड़ी उपलब्धि\n\n1. हनुमान ने समुद्र पार किया\n2. छिपकर लंका में प्रवेश किया\n3. अशोक वाटिका में सीता को ढूंढा\n4. राम की अंगूठी सीता को दी\n5. अशोक वाटिका उजाड़ी\n6. इंद्रजीत के ब्रह्मास्त्र से बंधे\n7. पूंछ से लंका जलाई\n8. राम के पास वापस आए\n\nहनुमानगढ़ी मंदिर\n\nहनुमानगढ़ी अयोध्या के सबसे महत्वपूर्ण मंदिरों में से एक है। यह 50-60 सीढ़ियां ऊपर स्थित है। ऐसा माना जाता है कि हनुमान जी यहीं रहकर राम जन्मभूमि की रक्षा करते थे।\n\nहनुमान चालीसा\n\nगोस्वामी तुलसीदास ने हनुमान चालीसा की रचना की, जिसमें 40 दोहे हैं। यह हिंदू धर्म में सबसे अधिक पढ़ी जाने वाली प्रार्थनाओं में से एक है।";
}

function getSitaContent() {
    return "Mata Sita - Complete Life Story & Divine Significance\n\nMata Sita (also known as Janaki, Vaidehi, and Maithili) is the divine consort of Lord Ram and one of the most revered deities in Hinduism. She is the embodiment of feminine virtue, strength, and devotion.\n\nBirth of Mata Sita\n\nSita was not born from a mother's womb but emerged from the earth. King Janak of Mithila found her while plowing the earth for a yagya. This is why she is called Janaki (daughter of Janak), and Vaidehi (from Videha kingdom).\n\nSita Swayamvar\n\nKing Janak declared that whoever could lift and string Shiva's divine bow (Pinaka) would marry Sita. When all princes failed, young Ram effortlessly lifted the bow and broke it, winning Sita's hand in marriage.\n\nRam Sita Vivah\n\nThe wedding of Ram and Sita is one of the most celebrated events in Ramayana. They were married in Mithila with great pomp and ceremony. Three brothers of Ram - Lakshman, Bharat, and Shatrughna - also married Sita's sisters.\n\nVanvas (Forest Exile)\n\nWhen Ram went into 14-year exile, Sita insisted on accompanying him. She chose love and duty over comfort, becoming a symbol of ideal wifehood (pativrata).\n\nSita Haran (Abduction)\n\nRavan, the demon king of Lanka, was attracted by Sita's beauty. He sent Maricha as a golden deer to lure Ram away and abducted Sita while Lakshman was absent. Jatayu, the divine eagle, tried to stop Ravan but was mortally wounded.\n\nLanka Captivity\n\nIn Lanka, Ravan kept Sita in the Ashoka Vatika. Despite all his temptations and threats, Sita remained steadfast in her devotion to Ram.\n\nAgni Pariksha\n\nAfter Ram killed Ravan and rescued Sita, she underwent the Agni Pariksha (fire test) to prove her purity. The fire god Agni protected Sita and presented her as pure to Ram.\n\nReturn to Ayodhya\n\nRam, Sita, and Lakshman returned to Ayodhya in the Pushpak Viman (divine aircraft). The entire Ayodhya was decorated and lit with lamps - this celebration became Diwali.";
}

function getSitaContentHi() {
    return "माता सीता - सम्पूर्ण जीवन कथा\n\nमाता सीता (जानकी, वैदेही, मैथिली) भगवान राम की दिव्य पत्नी और हिंदू धर्म की सबसे पूजनीय देवियों में से एक हैं।\n\nमाता सीता का जन्म\n\nसीता माँ की उत्पत्ति धरती से हुई। मिथिला के राजा जनक ने यज्ञ के लिए भूमि जोतते समय उन्हें पाया। इसीलिए उन्हें जानकी, वैदेही कहा जाता है।\n\nसीता स्वयंवर\n\nराजा जनक ने घोषणा की कि जो भी शिव का दिव्य धनुष उठा सकेगा, सीता से विवाह करेगा। जब सभी राजकुमार विफल हो गए, तब राम ने धनुष उठाया और तोड़ा।\n\nराम सीता विवाह\n\nमिथिला में धूमधाम से विवाह संपन्न हुआ।\n\nवनवास\n\nराम के वनवास जाने पर सीता ने भी साथ जाने की जिद की।\n\nसीता हरण\n\nरावण ने मारीच को सोने के हिरण के रूप में भेजा और सीता का हरण किया। जटायु ने रोकने की कोशिश की पर घायल हुए।\n\nलंका में कैद\n\nरावण ने सीता को अशोक वाटिका में रखा। सीता राम के प्रति अडिग रहीं।\n\nअग्नि परीक्षा\n\nरावण वध के बाद सीता ने अग्नि परीक्षा दी। अग्नि देव ने सीता की पवित्रता की पुष्टि की।\n\nअयोध्या वापसी\n\nपुष्पक विमान से राम, सीता और लक्ष्मण अयोध्या वापस आए। पूरी अयोध्या दीपों से सजाई गई - यही दीपावली का उत्सव है।";
}

function getAyodhyaGuideContent() {
    return "Ayodhya Travel Guide - Complete Tourist Information\n\nAyodhya, one of the seven sacred cities (Sapta Puri) of Hinduism, is the birthplace of Lord Ram. Located on the banks of the Saryu River in Uttar Pradesh, it is one of the most important pilgrimage destinations in India.\n\nPlaces to Visit in Ayodhya\n\n1. Ram Janmabhoomi (Ram Mandir) - The most sacred site, birthplace of Lord Ram\n2. Hanumangarhi - 51-foot Hanuman temple on a hillock\n3. Kanak Bhawan - Beautiful temple of Ram and Sita\n4. Saryu Ghat & Ram Ki Paidi - Sacred bathing ghats\n5. Dashrath Mahal - Ancient palace of King Dashrath\n6. Treta Ka Thakur - Temple with ancient Ram idol\n7. Mani Parvat - Ancient hill with Buddhist remains\n8. Sita Ki Rasoi - Ancient kitchen of Sita Mata\n9. Gulab Bari - Mughal-era garden\n10. Nageshwarnath Temple - Lord Shiva's ancient temple\n11. Tulsi Smarak Bhawan - Memorial of Goswami Tulsidas\n12. Ramkot - Fortress area, Ram's ancient city\n\nBest Time to Visit\n\nOctober to March: Pleasant weather, ideal for pilgrimage\nRam Navami (March/April): Birth anniversary of Lord Ram - massive celebration\nDipawali/Deepotsav (October/November): Spectacular light show with lakhs of diyas\nKartik Purnima: Sacred bathing festival\nPanguni Uttram: Special worship\n\nHow to Reach Ayodhya\n\nBy Air: Maharishi Valmiki International Airport, Ayodhya (AYJ) - direct flights from Delhi, Mumbai, Bangalore, Chennai\nBy Train: Ayodhya Dham Junction (AY) - connected to all major cities\nBy Road: Well connected via NH-27; buses from Lucknow (135 km), Varanasi (200 km), Delhi (700 km)\n\nAccommodation in Ayodhya\n\nLuxury Hotels: Multiple 4-5 star hotels near Ram Mandir\nBudget Hotels: Numerous hotels and guest houses\nDharamshalas: Free or Rs. 50-200 per night\nMAP Yojana: Government-run accommodation scheme\n\nFood in Ayodhya\n\nAyodhya is predominantly vegetarian. Famous foods:\n- Khichdi (Ram's favorite)\n- Halwa Puri\n- Malpua\n- Pedha\n- Samosa\n- Kachori\n\nShopping in Ayodhya\n\n- Ram Naam Chadar (Ram's name embroidered cloth)\n- Rudraksha Malas\n- Religious idols and books\n- Chuda-Chandi of Ayodhya\n- Silk sarees\n- Prasad items\n\nEmergency Contacts\n\nPolice: 112 | Tourist Helpline: 1800-180-5522 | Railway Station: 0527-2323081";
}

function getAyodhyaGuideContentHi() {
    return "अयोध्या यात्रा गाइड - सम्पूर्ण पर्यटक जानकारी\n\nअयोध्या, हिंदू धर्म के सात पवित्र शहरों (सप्त पुरी) में से एक, भगवान राम का जन्मस्थान है।\n\nअयोध्या में घूमने की जगहें\n\n1. राम जन्मभूमि (राम मंदिर)\n2. हनुमानगढ़ी\n3. कनक भवन\n4. सरयू घाट और राम की पैड़ी\n5. दशरथ महल\n6. त्रेता का ठाकुर\n7. मणि पर्वत\n8. सीता की रसोई\n9. गुलाब बाड़ी\n10. नागेश्वरनाथ मंदिर\n11. तुलसी स्मारक भवन\n12. रामकोट\n\nकैसे पहुंचें\n\nहवाई मार्ग: महर्षि वाल्मीकि अंतर्राष्ट्रीय हवाई अड्डा (AYJ)\nरेल मार्ग: अयोध्या धाम जंक्शन\nसड़क मार्ग: NH-27 से जुड़ा हुआ\n\nरहने की व्यवस्था\n\nलग्जरी होटल, बजट होटल, धर्मशाला (मुफ्त से ₹200/रात)\n\nखाना\n\nखिचड़ी, हलवा पूरी, मालपुआ, पेड़ा, समोसा, कचौरी\n\nखरीदारी\n\nराम नाम चादर, रुद्राक्ष माला, धार्मिक मूर्तियां, किताबें";
}

function getHanumanGarhiContent() {
    return "Hanumangarhi Temple Ayodhya - Complete Guide\n\nHanumangarhi is one of the most important and ancient temples in Ayodhya, dedicated to Lord Hanuman. Located in the heart of Ayodhya, this temple sits atop a small hillock and is approached by 76 steep steps.\n\nHistory of Hanumangarhi\n\nHanumangarhi temple was built in the 18th century by Abhay Ram Das, a devotee of Hanuman. It is believed that Hanuman Ji himself lived here to protect Ram's birthplace (Ram Janmabhoomi). The temple is managed by Nirwani Akhara.\n\nThe Main Shrine\n\nThe main shrine houses a large idol of Hanuman Ji in sitting position (known as Birajmaan Hanuman). The idol is about 6 feet tall. Below this temple is a smaller temple of Maa Anjaniya (Hanuman's mother).\n\nSignificance\n\nIt is believed that any wish made to Hanuman Ji at Hanumangarhi is fulfilled. Thousands of devotees visit daily. The temple is considered essential for any Ayodhya pilgrimage - it is customary to first visit Hanumangarhi before going to Ram Mandir.\n\nDarshan Timings\n\nSummer (April-September): 5:00 AM to 10:00 PM\nWinter (October-March): 5:30 AM to 9:30 PM\nAarti: Morning and Evening\n\nHow to Reach\n\nHanumangarhi is located in the main market area of Ayodhya, about 1.5 km from Ram Mandir. It can be reached by auto-rickshaw, e-rickshaw, or on foot.\n\nNearby Attractions\n\n- Ram Mandir (1.5 km)\n- Kanak Bhawan (0.5 km)\n- Saryu Ghat (2 km)\n\nTips for Visitors\n\n- Climb the 76 steps carefully\n- Best time: Early morning or evening\n- Wear comfortable footwear\n- Temple gets very crowded on Tuesdays and Saturdays";
}

function getHanumanGarhiContentHi() {
    return "हनुमानगढ़ी मंदिर अयोध्या - सम्पूर्ण गाइड\n\nहनुमानगढ़ी अयोध्या के सबसे महत्वपूर्ण और प्राचीन मंदिरों में से एक है। यह भगवान हनुमान को समर्पित है और 76 सीढ़ियां चढ़कर पहुंचा जाता है।\n\nइतिहास\n\n18वीं सदी में अभय राम दास ने इसका निर्माण करवाया। मान्यता है कि हनुमान जी यहीं रहकर राम जन्मभूमि की रक्षा करते हैं। इसका प्रबंधन निर्वाणी अखाड़ा करता है।\n\nमुख्य मूर्ति\n\nलगभग 6 फीट की बैठे हनुमान जी की मूर्ति। नीचे माता अंजनिया का मंदिर है।\n\nमहत्व\n\nऐसा माना जाता है कि यहाँ हनुमान जी से मांगी गई हर मनोकामना पूरी होती है। अयोध्या में पहले हनुमानगढ़ी, फिर राम मंदिर जाने की परंपरा है।\n\nदर्शन समय\n\nग्रीष्मकाल: प्रातः 5:00 से रात्रि 10:00\nशीतकाल: प्रातः 5:30 से रात्रि 9:30\n\nनजदीकी आकर्षण\n\nराम मंदिर (1.5 किमी), कनक भवन (0.5 किमी), सरयू घाट (2 किमी)";
}

function getDharamshaladContent() {
    return "Dharamshala in Ayodhya - Free & Budget Stay Guide\n\nAyodhya has hundreds of dharamshalas (free or low-cost guesthouses) that accommodate millions of pilgrims throughout the year. These are managed by religious trusts and community organizations.\n\nFamous Dharamshalas in Ayodhya\n\n1. Ram Janmabhoomi Nyas Dharamshala - Near Ram Mandir, free accommodation\n2. Kashi Dharamshala - Budget rooms available\n3. Bihar Dharamshala - Free stay for pilgrims\n4. Shri Sanatan Dharm Dharamshala\n5. Bhoomiharbrahmn Mahasabha Dharamshala\n6. Marwari Dharamshala\n7. Gujarati Dharamshala\n8. Telugu Dharamshala\n9. Tamil Nadu Dharamshala\n10. Maharashtra Dharamshala\n\nGovernment Accommodation\n\nUttar Pradesh Tourism operates tourist bungalows and circuit houses in Ayodhya. Booking can be done through UP Tourism website.\n\nOnline Booking\n\nSeveral budget hotels and dharamshalas can now be booked online through:\n- MakeMyTrip\n- Goibibo\n- OYO Rooms\n- Treebo Hotels\n\nTips for Pilgrims\n\n1. Book in advance during festivals and Ram Navami\n2. Carry government-issued ID proof\n3. Most dharamshalas require departure by 10 AM\n4. Keep your belongings safe\n5. Free langars available near Ram Mandir\n\nContact for Accommodation\n\nUP Tourism: 0522-2226211\nAyodhya Development Authority: 05278-252108";
}

function getDharamshaladContentHi() {
    return "अयोध्या में धर्मशाला - मुफ्त और बजट रहने की जगहें\n\nअयोध्या में सैकड़ों धर्मशालाएं हैं जो साल भर लाखों तीर्थयात्रियों को ठहरने की सुविधा देती हैं।\n\nप्रमुख धर्मशालाएं\n\n1. राम जन्मभूमि न्यास धर्मशाला - राम मंदिर के पास, मुफ्त आवास\n2. काशी धर्मशाला - बजट रूम\n3. बिहार धर्मशाला - मुफ्त रहने की सुविधा\n4. श्री सनातन धर्म धर्मशाला\n5. मारवाड़ी धर्मशाला\n6. गुजराती धर्मशाला\n7. तेलुगु धर्मशाला\n8. तमिलनाडु धर्मशाला\n9. महाराष्ट्र धर्मशाला\n\nसरकारी आवास\n\nउत्तर प्रदेश पर्यटन विभाग के टूरिस्ट बंगले और सर्किट हाउस\n\nजरूरी टिप्स\n\n1. त्योहारों में पहले से बुकिंग करें\n2. सरकारी पहचान पत्र साथ रखें\n3. सुबह 10 बजे तक कमरा खाली करें\n4. राम मंदिर के पास मुफ्त लंगर की सुविधा";
}

function getLiveAartiContent() {
    return "Ram Lalla Live Aarti - Watch Online from Ayodhya\n\nThe Ram Lalla Aarti from Ayodhya Ram Mandir can now be watched live online. This divine aarti is performed multiple times daily.\n\nAarti Schedule\n\nMangala Aarti: 4:00 AM - The first aarti of the day\nShringar Aarti: 6:00 AM - Beautification aarti\nBhog Aarti: 12:00 PM - Noon meal offering\nSandhya Aarti: 7:30 PM - Evening aarti (most popular)\nShayan Aarti: 10:00 PM - Night aarti\n\nHow to Watch Live Aarti\n\n1. YouTube Channel: Ram Mandir Ayodhya Official\n2. DD National TV\n3. Doordarshan Girnar\n4. App: Shravan (official Ram Mandir app)\n5. This website - Live aarti section\n\nRam Aarti Lyrics\n\nShri Ram Jai Ram Jai Jai Ram\nJai Raghunandan Jai Siya Ram\nJanaki Vallabha Sitapati Ram\nJai Jai Jai Jai Jai Sri Ram\n\nSaryu Ghat Aarti\n\nEvery evening, a spectacular Ganga-style aarti is performed at Saryu Ghat in Ayodhya. This is similar to the Ganga Aarti of Varanasi and is a must-watch for visitors.";
}

function getLiveAartiContentHi() {
    return "राम लला लाइव आरती - अयोध्या से ऑनलाइन देखें\n\nअयोध्या राम मंदिर की राम लला आरती अब ऑनलाइन लाइव देख सकते हैं।\n\nआरती समय\n\nमंगला आरती: प्रातः 4:00 बजे\nश्रृंगार आरती: प्रातः 6:00 बजे\nभोग आरती: दोपहर 12:00 बजे\nसंध्या आरती: सायं 7:30 बजे\nशयन आरती: रात्रि 10:00 बजे\n\nराम आरती के बोल\n\nश्री राम जय राम जय जय राम\nजय रघुनंदन जय सिया राम\nजानकी वल्लभ सीतापति राम\nजय जय जय जय जय श्री राम";
}

function getRamJanamContent() {
    return "Shri Ram Janam Katha - The Divine Birth of Lord Ram\n\nLord Ram was born on the ninth day of Shukla Paksha (bright fortnight) in the month of Chaitra. This day is celebrated as Ram Navami across the world.\n\nKing Dashrath's Prayer\n\nKing Dashrath of Ayodhya was a noble and just ruler, but he had no children despite having three wives - Kaushalya, Kaikeyi, and Sumitra. He performed the Putreshti Yagya (fire sacrifice for sons) under the guidance of sage Rishyashringa.\n\nDivine Vision\n\nThe gods appeared from the sacred fire carrying a golden vessel of kheer (sweet rice pudding). They told King Dashrath to distribute this kheer to his queens. He gave half to Kaushalya, remaining to Kaikeyi, and the last portion was divided between Sumitra.\n\nThe Birth\n\nAt noon on Ram Navami, Lord Vishnu incarnated as Ram in Kaushalya's womb. The whole universe rejoiced. Flowers rained from the sky. The entire Ayodhya was filled with joy and festivity.\n\nRam's Divine Form\n\nLord Ram was born with divine features - four arms, holding bow and arrows, with a golden complexion. On seeing his baby form, Kaushalya was filled with divine bliss. Ram then took the gentle infant form of a baby boy.\n\nCelebration in Ayodhya\n\nKing Dashrath gave enormous gifts to sages, priests, and poor people. The entire Ayodhya celebrated Ram's birth with songs, dances, and festivities. This tradition continues today as Ram Navami.\n\nRam Navami Celebration Today\n\nRam Navami is celebrated every year on Chaitra Shukla Navami. In Ayodhya, special pujas, abhishek, and processions are organized. Millions of devotees visit Ayodhya on this day.";
}

function getRamJanamContentHi() {
    return "श्री राम जन्म कथा - भगवान राम का दिव्य जन्म\n\nभगवान राम चैत्र मास के शुक्ल पक्ष की नवमी को प्रकट हुए। यह दिन राम नवमी के रूप में मनाया जाता है।\n\nराजा दशरथ की प्रार्थना\n\nअयोध्या के राजा दशरथ की तीन पत्नियां थीं - कौशल्या, कैकेयी और सुमित्रा। संतान न होने पर उन्होंने ऋष्यशृंग ऋषि के मार्गदर्शन में पुत्रेष्टि यज्ञ किया।\n\nदिव्य दृश्य\n\nयज्ञ की अग्नि से देवता प्रकट हुए और सोने का पात्र लेकर आए जिसमें खीर थी। राजा दशरथ ने खीर का आधा भाग कौशल्या को, शेष कैकेयी को और बाकी सुमित्रा को दिया।\n\nप्रकट होना\n\nराम नवमी के दिन दोपहर को भगवान विष्णु ने कौशल्या के गर्भ से राम के रूप में अवतार लिया। पूरा ब्रह्मांड आनंदित हुआ। आसमान से फूलों की वर्षा हुई।\n\nराम नवमी आज\n\nराम नवमी हर साल चैत्र शुक्ल नवमी को मनाई जाती है। अयोध्या में विशेष पूजा, अभिषेक और शोभायात्राएं होती हैं।";
}

function getKanakBhawanContent() {
    return "Kanak Bhawan Ayodhya - Complete Temple Guide\n\nKanak Bhawan (also known as Sone Ka Bhawan - Golden Palace) is one of the most beautiful temples in Ayodhya, dedicated to Ram and Sita. It is believed to be the private residence gifted to Sita by Kaikeyi.\n\nHistory & Legend\n\nAccording to tradition, after the marriage of Ram and Sita, Kaikeyi (Ram's step-mother) gifted this palace to Sita. Hence it is called Kanak Bhawan - the golden palace. The current structure was built in the 20th century by Vrishbhanu Kuar, the queen of Orchha.\n\nThe Divine Idols\n\nThe main sanctum houses beautiful golden idols of Ram and Sita - both adorned with golden crowns, jewelry, and royal clothes. These idols are considered exceptionally beautiful.\n\nTemple Timings\n\nMorning: 8:00 AM to 12:00 PM\nEvening: 4:00 PM to 9:00 PM\n\nSpecial Festivals\n\n- Ram Navami: Grand celebration\n- Sita Navami: Special puja for Sita Mata\n- Vivah Panchami: Ram-Sita wedding anniversary\n- Kartik Month: Special daily programs";
}

function getKanakBhawanContentHi() {
    return "कनक भवन अयोध्या - सम्पूर्ण मंदिर गाइड\n\nकनक भवन (सोने का भवन) अयोध्या के सबसे सुंदर मंदिरों में से एक है, जो राम और सीता को समर्पित है।\n\nइतिहास और किंवदंती\n\nपरंपरा के अनुसार, राम-सीता विवाह के बाद कैकेयी ने यह महल सीता को उपहार में दिया। इसीलिए इसे कनक भवन (सोने का भवन) कहते हैं। वर्तमान संरचना ओरछा की रानी वृषभानु कुवर ने 20वीं सदी में बनवाई।\n\nदिव्य मूर्तियां\n\nमुख्य गर्भगृह में राम-सीता की सोने की सुंदर मूर्तियां हैं - सोने के मुकुट, आभूषण और शाही वस्त्रों से सजी।\n\nमंदिर समय\n\nप्रातः 8:00 से दोपहर 12:00 | सायं 4:00 से रात्रि 9:00";
}

function getSaryuGhatContent() {
    return "Saryu Ghat Ayodhya - Sacred River Ghats Guide\n\nThe Saryu River flows through Ayodhya and its ghats are considered extremely sacred in Hindu tradition. Bathing in the Saryu is believed to wash away all sins.\n\nMajor Ghats in Ayodhya\n\n1. Ram Ki Paidi - The main bathing ghat, beautifully developed\n2. Guptar Ghat - Where Ram took jal samadhi\n3. Janki Ghat\n4. Laxman Ghat\n5. Swarg Dwar Ghat\n6. Bharatkund Ghat\n7. Chakra Tirtha Ghat\n8. Brahma Kund Ghat\n\nRam Ki Paidi\n\nRam Ki Paidi is the most famous ghat in Ayodhya. It was renovated and beautified with steps leading to the river. On Deepotsav, this ghat is lit with lakhs of earthen lamps, creating a spectacular view.\n\nEvening Saryu Aarti\n\nEvery evening, a beautiful Saryu Aarti is performed at Ram Ki Paidi, similar to the Ganga Aarti of Varanasi. This is a must-watch for visitors to Ayodhya.\n\nBest Time to Visit\n\nEarly morning: For holy bath (especially during festivals)\nEvening: For Saryu Aarti (around sunset)\nDeepawali: Most spectacular view with lakhs of lamps";
}

function getSaryuGhatContentHi() {
    return "सरयू घाट अयोध्या - पवित्र नदी घाट गाइड\n\nसरयू नदी अयोध्या से होकर बहती है और इसके घाट अत्यंत पवित्र माने जाते हैं।\n\nप्रमुख घाट\n\n1. राम की पैड़ी - मुख्य स्नान घाट\n2. गुप्तार घाट - जहाँ राम ने जल समाधि ली\n3. जानकी घाट, लक्ष्मण घाट\n4. स्वर्ग द्वार घाट\n5. भरतकुंड घाट\n\nसंध्या सरयू आरती\n\nहर शाम राम की पैड़ी पर सरयू आरती होती है। दीपावली पर लाखों दीपों से जगमगाते घाट का दृश्य अद्भुत होता है।";
}

function getDarshanGuideContent() {
    return "Ram Mandir Darshan Guide - Complete Information\n\nVisiting Ram Mandir in Ayodhya requires some preparation and knowledge of the rules and procedures. This guide will help you plan your darshan efficiently.\n\nDarshan Timings\n\nMangala Aarti: 4:00 AM (Special darshan)\nShringar Aarti: 6:00 AM\nBhog Aarti: 12:00 PM\nSandhya Aarti: 7:30 PM\nShayan Aarti: 10:00 PM\n\nGeneral Darshan: 6:00 AM to 10:00 PM (break from 12-2 PM)\n\nEntry Rules\n\n1. No mobile phones inside Garbhagriha\n2. No cameras inside temple\n3. Remove footwear before entry\n4. Dress modestly - traditional Indian attire preferred\n5. No leather items inside\n6. Carry ID proof for entry\n7. Large bags must be deposited at cloak room\n\nOnline Pass\n\nYou can book a VIP darshan pass online at the official Ram Mandir website. This reduces waiting time.\n\nFree Darshan\n\nFree darshan is available to all devotees. The queue management system ensures orderly entry.\n\nWhat to Carry\n\n- Government ID proof\n- Small bag with essentials\n- Water bottle (refilling available)\n- Cash for prasad\n\nTips for a Smooth Darshan\n\n1. Visit early morning (6-8 AM) to avoid crowds\n2. Weekdays are less crowded than weekends\n3. Festival days are very crowded - plan accordingly\n4. Come fasting if you wish for a spiritual experience\n5. After darshan, visit Hanumangarhi and Kanak Bhawan";
}

function getDarshanGuideContentHi() {
    return "राम मंदिर दर्शन गाइड - सम्पूर्ण जानकारी\n\nदर्शन समय\n\nमंगला आरती: प्रातः 4:00 बजे\nश्रृंगार आरती: प्रातः 6:00 बजे\nभोग आरती: दोपहर 12:00\nसंध्या आरती: सायं 7:30\nशयन आरती: रात्रि 10:00\n\nसामान्य दर्शन: सुबह 6:00 से रात 10:00 (दोपहर 12-2 बंद)\n\nप्रवेश नियम\n\n1. गर्भगृह में मोबाइल फोन नहीं\n2. कैमरा नहीं\n3. जूते-चप्पल बाहर उतारें\n4. शालीन वस्त्र पहनें\n5. चमड़े की वस्तुएं नहीं\n6. पहचान पत्र अनिवार्य\n\nजरूरी सुझाव\n\n1. सुबह 6-8 बजे जाएं - भीड़ कम होती है\n2. सप्ताह के दिन वीकेंड से कम भीड़\n3. त्योहारों पर बहुत भीड़ होती है";
}

function dbQuery($sql, $params = []) {
    $db = getDB();
    $stmt = $db->prepare($sql);
    $stmt->execute($params);
    return $stmt;
}

function dbFetch($sql, $params = []) {
    $result = dbQuery($sql, $params)->fetch();
    return $result ?: false;
}

function dbFetchAll($sql, $params = []) {
    return dbQuery($sql, $params)->fetchAll();
}

function dbInsert($sql, $params = []) {
    $db = getDB();
    $stmt = $db->prepare($sql);
    $stmt->execute($params);
    return $db->lastInsertId();
}

function dbCount($sql, $params = []) {
    return dbQuery($sql, $params)->rowCount();
}