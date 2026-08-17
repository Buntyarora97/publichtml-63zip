
-- ============================================
-- 1. ADMINS TABLE
-- ============================================
CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(20),
    role ENUM('super_admin','admin','editor') DEFAULT 'editor',
    avatar VARCHAR(255),
    last_login DATETIME,
    status TINYINT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 2. ADMIN ACTIVITY LOGS
-- ============================================
CREATE TABLE admin_activity_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    admin_id INT,
    action VARCHAR(100) NOT NULL,
    description TEXT,
    ip_address VARCHAR(45),
    user_agent TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (admin_id) REFERENCES admins(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- ============================================
-- 3. SITE SETTINGS
-- ============================================
CREATE TABLE settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    setting_key VARCHAR(100) NOT NULL UNIQUE,
    setting_value TEXT,
    setting_label VARCHAR(200),
    setting_group VARCHAR(50),
    is_public TINYINT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 4. SITE LANGUAGES
-- ============================================
CREATE TABLE site_languages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    lang_code VARCHAR(10) NOT NULL UNIQUE,
    lang_name VARCHAR(50) NOT NULL,
    lang_name_native VARCHAR(50),
    is_default TINYINT DEFAULT 0,
    is_active TINYINT DEFAULT 1,
    flag_icon VARCHAR(50),
    sort_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 5. MEDIA LIBRARY
-- ============================================
CREATE TABLE media_library (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    original_name VARCHAR(255),
    file_path VARCHAR(500) NOT NULL,
    file_type ENUM('image','video','audio','document') DEFAULT 'image',
    file_extension VARCHAR(20),
    file_size INT,
    width INT,
    height INT,
    alt_text VARCHAR(255),
    caption TEXT,
    folder VARCHAR(100) DEFAULT 'general',
    uploaded_by INT,
    is_used TINYINT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (uploaded_by) REFERENCES admins(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- ============================================
-- 6. MENU ITEMS
-- ============================================
CREATE TABLE menu_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    parent_id INT DEFAULT 0,
    menu_type ENUM('main','footer','sidebar','mobile') DEFAULT 'main',
    title VARCHAR(200) NOT NULL,
    title_hi VARCHAR(200),
    url VARCHAR(500),
    page_slug VARCHAR(200),
    icon_class VARCHAR(50),
    mega_menu TINYINT DEFAULT 0,
    mega_columns INT DEFAULT 1,
    column_group VARCHAR(100),
    sort_order INT DEFAULT 0,
    target ENUM('_self','_blank') DEFAULT '_self',
    status TINYINT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 7. MARQUEE ANNOUNCEMENTS
-- ============================================
CREATE TABLE marquee_announcements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    content TEXT NOT NULL,
    content_hi TEXT,
    icon VARCHAR(50) DEFAULT 'bell',
    color VARCHAR(20) DEFAULT '#F55900',
    bg_color VARCHAR(20) DEFAULT '#FFFEBC',
    sort_order INT DEFAULT 0,
    status TINYINT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 8. HERO SECTION
-- ============================================
CREATE TABLE hero_section (
    id INT AUTO_INCREMENT PRIMARY KEY,
    page_slug VARCHAR(100) DEFAULT 'home',
    title VARCHAR(255),
    title_hi VARCHAR(255),
    subtitle TEXT,
    subtitle_hi TEXT,
    background_type ENUM('image','video','slider') DEFAULT 'image',
    background_image VARCHAR(255),
    background_video VARCHAR(255),
    fallback_image VARCHAR(255),
    right_frame_type ENUM('image','video','youtube') DEFAULT 'image',
    right_frame_source VARCHAR(500),
    right_frame_poster VARCHAR(255),
    button1_text VARCHAR(100),
    button1_url VARCHAR(255),
    button2_text VARCHAR(100),
    button2_url VARCHAR(255),
    button3_text VARCHAR(100),
    button3_url VARCHAR(255),
    button4_text VARCHAR(100),
    button4_url VARCHAR(255),
    enable_particles TINYINT DEFAULT 1,
    enable_flags TINYINT DEFAULT 1,
    sort_order INT DEFAULT 0,
    status TINYINT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 9. HOME SECTIONS
-- ============================================
CREATE TABLE home_sections (
    id INT AUTO_INCREMENT PRIMARY KEY,
    section_key VARCHAR(50) NOT NULL UNIQUE,
    section_name VARCHAR(100) NOT NULL,
    section_name_hi VARCHAR(100),
    title VARCHAR(255),
    title_hi VARCHAR(255),
    subtitle TEXT,
    subtitle_hi TEXT,
    content TEXT,
    content_hi TEXT,
    background_image VARCHAR(255),
    bg_color VARCHAR(20),
    text_color VARCHAR(20),
    sort_order INT DEFAULT 0,
    status TINYINT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 10. ABOUT SECTIONS
-- ============================================
CREATE TABLE about_sections (
    id INT AUTO_INCREMENT PRIMARY KEY,
    section_key VARCHAR(50) NOT NULL UNIQUE,
    section_name VARCHAR(100) NOT NULL,
    section_name_hi VARCHAR(100),
    title VARCHAR(255),
    title_hi VARCHAR(255),
    subtitle TEXT,
    subtitle_hi TEXT,
    content TEXT,
    content_hi TEXT,
    image VARCHAR(255),
    icon VARCHAR(50),
    sort_order INT DEFAULT 0,
    status TINYINT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 11. PAGES (Dynamic CMS Pages)
-- ============================================
CREATE TABLE pages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    title_hi VARCHAR(255),
    slug VARCHAR(200) NOT NULL UNIQUE,
    parent_slug VARCHAR(200),
    category VARCHAR(100),
    excerpt TEXT,
    excerpt_hi TEXT,
    content LONGTEXT,
    content_hi LONGTEXT,
    featured_image VARCHAR(255),
    hero_image VARCHAR(255),
    meta_title VARCHAR(255),
    meta_description TEXT,
    meta_keywords TEXT,
    og_image VARCHAR(255),
    schema_type VARCHAR(50),
    schema_markup TEXT,
    view_count INT DEFAULT 0,
    sort_order INT DEFAULT 0,
    status ENUM('draft','published','archived') DEFAULT 'draft',
    is_featured TINYINT DEFAULT 0,
    created_by INT,
    updated_by INT,
    published_at DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (created_by) REFERENCES admins(id) ON DELETE SET NULL,
    FOREIGN KEY (updated_by) REFERENCES admins(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- ============================================
-- 12. RAMAYAN CHAPTERS
-- ============================================
CREATE TABLE ramayan_chapters (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kand ENUM('balkand','ayodhyakand','aranyakand','kishkindhakand','sunderkand','lankakand','uttarakand') NOT NULL,
    kand_name VARCHAR(100),
    kand_name_hi VARCHAR(100),
    chapter_number INT,
    title VARCHAR(255) NOT NULL,
    title_hi VARCHAR(255),
    slug VARCHAR(200) NOT NULL UNIQUE,
    summary TEXT,
    summary_hi TEXT,
    content LONGTEXT,
    content_hi LONGTEXT,
    featured_image VARCHAR(255),
    hero_image VARCHAR(255),
    meta_title VARCHAR(255),
    meta_description TEXT,
    video_url VARCHAR(500),
    audio_url VARCHAR(500),
    sort_order INT DEFAULT 0,
    status TINYINT DEFAULT 1,
    view_count INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 13. HANUMAN CHAPTERS
-- ============================================
CREATE TABLE hanuman_chapters (
    id INT AUTO_INCREMENT PRIMARY KEY,
    chapter_number INT,
    title VARCHAR(255) NOT NULL,
    title_hi VARCHAR(255),
    slug VARCHAR(200) NOT NULL UNIQUE,
    summary TEXT,
    summary_hi TEXT,
    content LONGTEXT,
    content_hi LONGTEXT,
    featured_image VARCHAR(255),
    hero_image VARCHAR(255),
    meta_title VARCHAR(255),
    meta_description TEXT,
    video_url VARCHAR(500),
    audio_url VARCHAR(500),
    sort_order INT DEFAULT 0,
    status TINYINT DEFAULT 1,
    view_count INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 14. MATA SITA CHAPTERS
-- ============================================
CREATE TABLE sita_chapters (
    id INT AUTO_INCREMENT PRIMARY KEY,
    chapter_number INT,
    title VARCHAR(255) NOT NULL,
    title_hi VARCHAR(255),
    slug VARCHAR(200) NOT NULL UNIQUE,
    summary TEXT,
    summary_hi TEXT,
    content LONGTEXT,
    content_hi LONGTEXT,
    featured_image VARCHAR(255),
    hero_image VARCHAR(255),
    meta_title VARCHAR(255),
    meta_description TEXT,
    video_url VARCHAR(500),
    audio_url VARCHAR(500),
    sort_order INT DEFAULT 0,
    status TINYINT DEFAULT 1,
    view_count INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 15. TRAVEL PAGES
-- ============================================
CREATE TABLE travel_pages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    title_hi VARCHAR(255),
    slug VARCHAR(200) NOT NULL UNIQUE,
    category VARCHAR(100),
    excerpt TEXT,
    excerpt_hi TEXT,
    content LONGTEXT,
    content_hi LONGTEXT,
    featured_image VARCHAR(255),
    hero_image VARCHAR(255),
    meta_title VARCHAR(255),
    meta_description TEXT,
    sort_order INT DEFAULT 0,
    status TINYINT DEFAULT 1,
    view_count INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 16. PLACES TO VISIT
-- ============================================
CREATE TABLE places_to_visit (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    title_hi VARCHAR(255),
    slug VARCHAR(200) NOT NULL UNIQUE,
    category VARCHAR(100),
    distance VARCHAR(50),
    timing VARCHAR(200),
    entry_fee VARCHAR(100),
    description TEXT,
    description_hi TEXT,
    content LONGTEXT,
    content_hi LONGTEXT,
    address TEXT,
    map_embed TEXT,
    images TEXT,
    featured_image VARCHAR(255),
    meta_title VARCHAR(255),
    meta_description TEXT,
    rating DECIMAL(2,1) DEFAULT 5.0,
    review_count INT DEFAULT 0,
    sort_order INT DEFAULT 0,
    status TINYINT DEFAULT 1,
    view_count INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 17. BLOGS
-- ============================================
CREATE TABLE blogs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    title_hi VARCHAR(255),
    slug VARCHAR(200) NOT NULL UNIQUE,
    excerpt TEXT,
    excerpt_hi TEXT,
    content LONGTEXT,
    content_hi LONGTEXT,
    featured_image VARCHAR(255),
    category_id INT,
    author_name VARCHAR(100) DEFAULT 'Ayodhya Ram Mandir Team',
    is_featured TINYINT DEFAULT 0,
    is_popular TINYINT DEFAULT 0,
    meta_title VARCHAR(255),
    meta_description TEXT,
    meta_keywords TEXT,
    og_image VARCHAR(255),
    schema_markup TEXT,
    view_count INT DEFAULT 0,
    status ENUM('draft','published','archived') DEFAULT 'draft',
    published_at DATETIME,
    created_by INT,
    updated_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (created_by) REFERENCES admins(id) ON DELETE SET NULL,
    FOREIGN KEY (updated_by) REFERENCES admins(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- ============================================
-- 18. BLOG CATEGORIES
-- ============================================
CREATE TABLE blog_categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    name_hi VARCHAR(100),
    slug VARCHAR(100) NOT NULL UNIQUE,
    description TEXT,
    description_hi TEXT,
    parent_id INT DEFAULT 0,
    sort_order INT DEFAULT 0,
    status TINYINT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 19. BLOG TAGS
-- ============================================
CREATE TABLE blog_tags (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 20. BLOG TAG MAP
-- ============================================
CREATE TABLE blog_tag_map (
    id INT AUTO_INCREMENT PRIMARY KEY,
    blog_id INT NOT NULL,
    tag_id INT NOT NULL,
    FOREIGN KEY (blog_id) REFERENCES blogs(id) ON DELETE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES blog_tags(id) ON DELETE CASCADE,
    UNIQUE KEY blog_tag (blog_id, tag_id)
) ENGINE=InnoDB;

-- ============================================
-- 21. AARTI LINKS
-- ============================================
CREATE TABLE aarti_links (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    title_hi VARCHAR(255),
    deity VARCHAR(100),
    aarti_type ENUM('morning','evening','live','recorded') DEFAULT 'recorded',
    youtube_url VARCHAR(500),
    audio_url VARCHAR(500),
    lyrics TEXT,
    lyrics_hi TEXT,
    meaning TEXT,
    meaning_hi TEXT,
    thumbnail VARCHAR(255),
    is_live TINYINT DEFAULT 0,
    is_featured TINYINT DEFAULT 0,
    sort_order INT DEFAULT 0,
    status TINYINT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 22. BHAJANS
-- ============================================
CREATE TABLE bhajans (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    title_hi VARCHAR(255),
    singer VARCHAR(200),
    deity VARCHAR(100),
    category VARCHAR(100),
    youtube_url VARCHAR(500),
    audio_url VARCHAR(500),
    lyrics TEXT,
    lyrics_hi TEXT,
    duration VARCHAR(20),
    thumbnail VARCHAR(255),
    is_featured TINYINT DEFAULT 0,
    play_count INT DEFAULT 0,
    sort_order INT DEFAULT 0,
    status TINYINT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 23. INSTAGRAM REELS
-- ============================================
CREATE TABLE instagram_reels (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    instagram_url VARCHAR(500),
    video_file VARCHAR(255),
    thumbnail VARCHAR(255),
    sort_order INT DEFAULT 0,
    status TINYINT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 24. KUNDLI PAGES
-- ============================================
CREATE TABLE kundli_pages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    title_hi VARCHAR(255),
    slug VARCHAR(200) NOT NULL UNIQUE,
    content LONGTEXT,
    content_hi LONGTEXT,
    featured_image VARCHAR(255),
    meta_title VARCHAR(255),
    meta_description TEXT,
    sort_order INT DEFAULT 0,
    status TINYINT DEFAULT 1,
    view_count INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 25. KUNDLI MILAN REQUESTS
-- ============================================
CREATE TABLE kundli_milan_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    boy_name VARCHAR(100) NOT NULL,
    boy_dob DATE NOT NULL,
    boy_tob TIME,
    boy_pob VARCHAR(200),
    girl_name VARCHAR(100) NOT NULL,
    girl_dob DATE NOT NULL,
    girl_tob TIME,
    girl_pob VARCHAR(200),
    email VARCHAR(100),
    phone VARCHAR(20),
    result_data TEXT,
    status ENUM('pending','completed','cancelled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 26. RASHIFAL
-- ============================================
CREATE TABLE rashifal (
    id INT AUTO_INCREMENT PRIMARY KEY,
    rashi_name VARCHAR(50) NOT NULL,
    rashi_name_hi VARCHAR(50),
    rashi_symbol VARCHAR(50),
    rashi_type ENUM('daily','weekly','monthly','yearly') DEFAULT 'daily',
    rashi_date DATE,
    prediction TEXT,
    prediction_hi TEXT,
    lucky_number VARCHAR(20),
    lucky_color VARCHAR(50),
    lucky_time VARCHAR(50),
    business_rating INT DEFAULT 3,
    love_rating INT DEFAULT 3,
    health_rating INT DEFAULT 3,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY unique_rashifal (rashi_name, rashi_type, rashi_date)
) ENGINE=InnoDB;

-- ============================================
-- 27. PANCHANG
-- ============================================
CREATE TABLE panchang (
    id INT AUTO_INCREMENT PRIMARY KEY,
    panchang_date DATE NOT NULL UNIQUE,
    sunrise TIME,
    sunset TIME,
    tithi VARCHAR(100),
    tithi_hi VARCHAR(100),
    nakshatra VARCHAR(100),
    nakshatra_hi VARCHAR(100),
    yoga VARCHAR(100),
    karana VARCHAR(100),
    paksha ENUM('shukla','krishna') DEFAULT 'shukla',
    rahu_kalam VARCHAR(50),
    yamagandam VARCHAR(50),
    gulika_kalam VARCHAR(50),
    abhijit_muhurat VARCHAR(50),
    amrit_kalam VARCHAR(50),
    varjyam VARCHAR(50),
    dur_muhurat VARCHAR(50),
    festival TEXT,
    festival_hi TEXT,
    special_notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 28. DAILY SUVICHAR
-- ============================================
CREATE TABLE daily_suvichar (
    id INT AUTO_INCREMENT PRIMARY KEY,
    suvichar_date DATE,
    content TEXT NOT NULL,
    content_hi TEXT,
    author VARCHAR(100),
    author_hi VARCHAR(100),
    source VARCHAR(200),
    background_image VARCHAR(255),
    is_featured TINYINT DEFAULT 0,
    status TINYINT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 29. FESTIVAL CALENDAR
-- ============================================
CREATE TABLE festival_calendar (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    title_hi VARCHAR(255),
    festival_date DATE,
    tithi VARCHAR(100),
    description TEXT,
    description_hi TEXT,
    image VARCHAR(255),
    is_major TINYINT DEFAULT 0,
    status TINYINT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 30. GALLERY
-- ============================================
CREATE TABLE gallery (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    title_hi VARCHAR(255),
    category VARCHAR(100),
    image VARCHAR(255) NOT NULL,
    thumbnail VARCHAR(255),
    description TEXT,
    description_hi TEXT,
    sort_order INT DEFAULT 0,
    status TINYINT DEFAULT 1,
    view_count INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 31. USER UPLOADS
-- ============================================
CREATE TABLE user_uploads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    city VARCHAR(100),
    email VARCHAR(100),
    phone VARCHAR(20),
    description TEXT,
    description_hi TEXT,
    image VARCHAR(255) NOT NULL,
    is_approved TINYINT DEFAULT 0,
    is_featured TINYINT DEFAULT 0,
    is_rejected TINYINT DEFAULT 0,
    rejection_reason TEXT,
    ip_address VARCHAR(45),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 32. REVIEWS
-- ============================================
CREATE TABLE reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    city VARCHAR(100),
    email VARCHAR(100),
    rating INT NOT NULL DEFAULT 5,
    review_text TEXT NOT NULL,
    review_text_hi TEXT,
    photo VARCHAR(255),
    is_approved TINYINT DEFAULT 0,
    is_featured TINYINT DEFAULT 0,
    is_rejected TINYINT DEFAULT 0,
    reply_text TEXT,
    ip_address VARCHAR(45),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 33. DEVOTEE EXPERIENCES
-- ============================================
CREATE TABLE devotee_experiences (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    city VARCHAR(100),
    email VARCHAR(100),
    phone VARCHAR(20),
    experience TEXT NOT NULL,
    experience_hi TEXT,
    visit_date DATE,
    photo VARCHAR(255),
    is_approved TINYINT DEFAULT 0,
    is_featured TINYINT DEFAULT 0,
    ip_address VARCHAR(45),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 34. CHATBOT FAQS
-- ============================================
CREATE TABLE chatbot_faqs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question VARCHAR(500) NOT NULL,
    question_hi VARCHAR(500),
    answer TEXT NOT NULL,
    answer_hi TEXT,
    keywords TEXT,
    category VARCHAR(100),
    sort_order INT DEFAULT 0,
    status TINYINT DEFAULT 1,
    hit_count INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 35. DONATION SETTINGS
-- ============================================
CREATE TABLE donation_settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    setting_key VARCHAR(100) NOT NULL UNIQUE,
    setting_value TEXT,
    setting_label VARCHAR(200),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 36. DONATION REQUESTS
-- ============================================
CREATE TABLE donation_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    donor_name VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    phone VARCHAR(20),
    address TEXT,
    amount DECIMAL(10,2) NOT NULL,
    currency VARCHAR(10) DEFAULT 'INR',
    payment_method ENUM('upi','qr_code','bank_transfer','cash') DEFAULT 'upi',
    transaction_id VARCHAR(100),
    purpose VARCHAR(200),
    message TEXT,
    receipt_sent TINYINT DEFAULT 0,
    status ENUM('pending','completed','failed','cancelled') DEFAULT 'pending',
    ip_address VARCHAR(45),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 37. CONTACT MESSAGES
-- ============================================
CREATE TABLE contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    subject VARCHAR(200),
    message TEXT NOT NULL,
    is_read TINYINT DEFAULT 0,
    is_replied TINYINT DEFAULT 0,
    reply_text TEXT,
    ip_address VARCHAR(45),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 38. SEO META
-- ============================================
CREATE TABLE seo_meta (
    id INT AUTO_INCREMENT PRIMARY KEY,
    page_type VARCHAR(50) NOT NULL,
    page_id INT DEFAULT 0,
    page_slug VARCHAR(200),
    meta_title VARCHAR(255),
    meta_description TEXT,
    meta_keywords TEXT,
    og_title VARCHAR(255),
    og_description TEXT,
    og_image VARCHAR(255),
    og_type VARCHAR(50) DEFAULT 'website',
    twitter_card VARCHAR(50) DEFAULT 'summary_large_image',
    canonical_url VARCHAR(500),
    schema_markup TEXT,
    hreflang_hi VARCHAR(500),
    hreflang_en VARCHAR(500),
    robots_meta VARCHAR(100) DEFAULT 'index, follow',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY unique_seo (page_type, page_id, page_slug)
) ENGINE=InnoDB;

-- ============================================
-- 39. ADSENSE CODES
-- ============================================
CREATE TABLE adsense_codes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    slot_name VARCHAR(100) NOT NULL,
    slot_code TEXT NOT NULL,
    slot_position ENUM('header','sidebar','content_top','content_mid','content_bottom','footer','in_article','sticky') DEFAULT 'content_mid',
    page_type VARCHAR(50) DEFAULT 'all',
    is_active TINYINT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 40. FAQ ITEMS
-- ============================================
CREATE TABLE faq_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(100),
    question TEXT NOT NULL,
    question_hi TEXT,
    answer TEXT NOT NULL,
    answer_hi TEXT,
    page_slug VARCHAR(200),
    sort_order INT DEFAULT 0,
    status TINYINT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 41. FOOTER LINKS
-- ============================================
CREATE TABLE footer_links (
    id INT AUTO_INCREMENT PRIMARY KEY,
    column_name VARCHAR(50) DEFAULT 'column1',
    title VARCHAR(200) NOT NULL,
    title_hi VARCHAR(200),
    url VARCHAR(500),
    sort_order INT DEFAULT 0,
    status TINYINT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 42. GOOGLE MAP SETTINGS
-- ============================================
CREATE TABLE google_map_settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    map_embed TEXT,
    latitude DECIMAL(10,8),
    longitude DECIMAL(11,8),
    zoom INT DEFAULT 15,
    marker_title VARCHAR(200),
    map_type ENUM('roadmap','satellite','hybrid','terrain') DEFAULT 'roadmap',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 43. GLOBAL COUNTRY PAGES
-- ============================================
CREATE TABLE global_country_pages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    country_name VARCHAR(100) NOT NULL,
    country_code VARCHAR(10),
    title VARCHAR(255),
    title_hi VARCHAR(255),
    slug VARCHAR(200) NOT NULL UNIQUE,
    content LONGTEXT,
    content_hi LONGTEXT,
    meta_title VARCHAR(255),
    meta_description TEXT,
    status TINYINT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 44. CITY PAGES
-- ============================================
CREATE TABLE city_pages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    city_name VARCHAR(100) NOT NULL,
    city_name_hi VARCHAR(100),
    state VARCHAR(100),
    country VARCHAR(100),
    title VARCHAR(255),
    title_hi VARCHAR(255),
    slug VARCHAR(200) NOT NULL UNIQUE,
    content LONGTEXT,
    content_hi LONGTEXT,
    meta_title VARCHAR(255),
    meta_description TEXT,
    status TINYINT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 45. SEARCH LOGS
-- ============================================
CREATE TABLE search_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    search_query VARCHAR(500) NOT NULL,
    lang VARCHAR(10) DEFAULT 'en',
    results_count INT DEFAULT 0,
    ip_address VARCHAR(45),
    user_agent TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 46. PAGE VIEWS
-- ============================================
CREATE TABLE page_views (
    id INT AUTO_INCREMENT PRIMARY KEY,
    page_type VARCHAR(50),
    page_id INT,
    page_slug VARCHAR(200),
    ip_address VARCHAR(45),
    user_agent TEXT,
    referrer VARCHAR(500),
    view_date DATE,
    view_hour INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 47. NEWSLETTER SUBSCRIBERS
-- ============================================
CREATE TABLE newsletter_subscribers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL UNIQUE,
    name VARCHAR(100),
    status ENUM('subscribed','unsubscribed','bounced') DEFAULT 'subscribed',
    ip_address VARCHAR(45),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 48. TRIP PLANNER OPTIONS
-- ============================================
CREATE TABLE trip_planner_options (
    id INT AUTO_INCREMENT PRIMARY KEY,
    option_type VARCHAR(50) NOT NULL,
    option_key VARCHAR(100) NOT NULL,
    option_value TEXT,
    option_value_hi TEXT,
    sort_order INT DEFAULT 0,
    status TINYINT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 49. BACKUPS
-- ============================================
CREATE TABLE backups (
    id INT AUTO_INCREMENT PRIMARY KEY,
    backup_type VARCHAR(50) NOT NULL,
    backup_file VARCHAR(255),
    backup_size BIGINT,
    backup_tables TEXT,
    created_by INT,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (created_by) REFERENCES admins(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- ============================================
-- INSERT DEFAULT DATA
-- ============================================

-- Default Admin (password: Admin@123 - change after first login)
INSERT INTO admins (username, password, name, email, phone, role, status) VALUES
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Super Admin', 'info@ayodhyarammandir.in', '8168877332', 'super_admin', 1);

-- Default Languages
INSERT INTO site_languages (lang_code, lang_name, lang_name_native, is_default, is_active, sort_order) VALUES
('en', 'English', 'English', 1, 1, 1),
('hi', 'Hindi', 'हिन्दी', 0, 1, 2);

-- Default Settings
INSERT INTO settings (setting_key, setting_value, setting_label, setting_group) VALUES
('site_name', 'Ayodhya Ram Mandir', 'Site Name', 'general'),
('site_name_hi', 'अयोध्या राम मंदिर', 'Site Name (Hindi)', 'general'),
('site_tagline', 'Complete Digital Guide to Shri Ram, Ramayan & Ayodhya', 'Site Tagline', 'general'),
('site_tagline_hi', 'श्री राम, रामायण और अयोध्या का संपूर्ण डिजिटल गाइड', 'Site Tagline (Hindi)', 'general'),
('site_logo', 'assets/images/logo.png', 'Site Logo', 'general'),
('site_favicon', 'assets/images/favicon.ico', 'Site Favicon', 'general'),
('site_email', 'info@ayodhyarammandir.in', 'Site Email', 'general'),
('site_phone', '8168877332', 'Site Phone', 'general'),
('site_address', 'Ayodhya Dham, Uttar Pradesh, India', 'Site Address', 'general'),
('footer_logo', 'assets/images/footer-logo.png', 'Footer Logo', 'general'),
('contact_whatsapp', '918168877332', 'WhatsApp Number', 'contact'),
('google_map', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3560.7640!2d82.1949!3d26.7956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399be9c0091e5e2f%3A0x34447c3f5733578c!2sShri%20Ram%20Janmabhoomi!5e0!3m2!1sen!2sin!4v1704000000000!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>', 'Google Map Embed', 'contact'),
('seo_default_title', 'Ayodhya Ram Mandir - Complete Guide to Shri Ram & Ayodhya', 'Default SEO Title', 'seo'),
('seo_default_description', 'Ayodhya Ram Mandir - Your complete devotional guide to Shri Ram, Ram Lalla, Ramayan, Hanuman Ji, Mata Sita, Ayodhya travel, aarti, bhajan, kundli and more.', 'Default SEO Description', 'seo'),
('seo_default_keywords', 'Ayodhya Ram Mandir, Shri Ram, Ram Lalla, Ramayan, Hanuman Ji, Ayodhya travel, Ram Mandir darshan, Ram aarti, Ram bhajan', 'Default SEO Keywords', 'seo'),
('adsense_enabled', '0', 'AdSense Enabled', 'adsense'),
('social_facebook', 'https://facebook.com/ayodhyarammandir', 'Facebook URL', 'social'),
('social_instagram', 'https://instagram.com/ayodhyarammandir', 'Instagram URL', 'social'),
('social_youtube', 'https://youtube.com/@ayodhyarammandir', 'YouTube URL', 'social'),
('social_twitter', 'https://twitter.com/ayodhyarammandir', 'Twitter URL', 'social'),
('color_primary', '#F55900', 'Primary Color', 'theme'),
('color_secondary', '#FF8237', 'Secondary Color', 'theme'),
('color_accent', '#FFAA6E', 'Accent Color', 'theme'),
('color_light', '#FFD3A5', 'Light Color', 'theme'),
('color_bg', '#FFFEBC', 'Background Color', 'theme');

-- Default Marquee
INSERT INTO marquee_announcements (content, content_hi, icon, sort_order, status) VALUES
('Welcome to Ayodhya Ram Mandir - Your complete guide to Shri Ram & Ayodhya Dham', 'अयोध्या राम मंदिर में आपका स्वागत है - श्री राम और अयोध्या धाम की संपूर्ण जानकारी', 'om', 1, 1),
('Jai Shri Ram! Plan your Ayodhya darshan with our complete travel guide.', 'जय श्री राम! हमारी संपूर्ण यात्रा गाइड के साथ अपनी अयोध्या यात्रा की योजना बनाएं।', 'temple', 2, 1);

-- Default Blog Categories
INSERT INTO blog_categories (name, name_hi, slug, description, description_hi, sort_order, status) VALUES
('Ram Mandir', 'राम मंदिर', 'ram-mandir', 'All about Ayodhya Ram Mandir', 'अयोध्या राम मंदिर के बारे में सब कुछ', 1, 1),
('Ramayan', 'रामायण', 'ramayan', 'Complete Ramayan stories and chapters', 'संपूर्ण रामायण की कथाएं और अध्याय', 2, 1),
('Hanuman Ji', 'हनुमान जी', 'hanuman-ji', 'Stories and devotion of Hanuman Ji', 'हनुमान जी की कथाएं और भक्ति', 3, 1),
('Mata Sita', 'माता सीता', 'mata-sita', 'Life and stories of Mata Sita', 'माता सीता का जीवन और कथाएं', 4, 1),
('Ayodhya Travel', 'अयोध्या यात्रा', 'ayodhya-travel', 'Travel guides for Ayodhya Dham', 'अयोध्या धाम की यात्रा गाइड', 5, 1),
('Aarti Bhajan', 'आरती भजन', 'aarti-bhajan', 'Aarti, bhajan and devotional songs', 'आरती, भजन और भक्ति गीत', 6, 1),
('Astrology', 'ज्योतिष', 'astrology', 'Kundli, rashifal and panchang', 'कुंडली, राशिफल और पंचांग', 7, 1),
('Festivals', 'त्योहार', 'festivals', 'Festival celebrations in Ayodhya', 'अयोध्या में त्योहार उत्सव', 8, 1),
('NRI Guide', 'एनआरआई गाइड', 'nri-guide', 'Guide for NRI devotees', 'एनआरआई भक्तों के लिए गाइड', 9, 1);

-- Default Donation Settings
INSERT INTO donation_settings (setting_key, setting_value, setting_label) VALUES
('upi_id', 'ayodhyarammandir@upi', 'UPI ID'),
('qr_code_image', 'assets/images/donation-qr.png', 'QR Code Image'),
('bank_name', 'State Bank of India', 'Bank Name'),
('account_name', 'Ayodhya Ram Mandir Trust', 'Account Name'),
('account_number', '12345678901', 'Account Number'),
('ifsc_code', 'SBIN0001234', 'IFSC Code'),
('branch_name', 'Ayodhya Branch', 'Branch Name'),
('donation_note', 'Your donation helps maintain this devotional portal and support temple activities.', 'Donation Note'),
('donation_note_hi', 'आपका दान इस भक्ति पोर्टल के रखरखाव और मंदिर गतिविधियों का समर्थन करने में मदद करता है।', 'Donation Note (Hindi)'),
('min_donation', '11', 'Minimum Donation Amount (INR)'),
('enable_upi', '1', 'Enable UPI Payment'),
('enable_qr', '1', 'Enable QR Code'),
('enable_bank', '1', 'Enable Bank Transfer');

-- Default Footer Links
INSERT INTO footer_links (column_name, title, title_hi, url, sort_order, status) VALUES
('column1', 'Home', 'होम', '/', 1, 1),
('column1', 'About Us', 'हमारे बारे में', '/about-us', 2, 1),
('column1', 'Contact Us', 'संपर्क करें', '/contact', 3, 1),
('column1', 'Privacy Policy', 'गोपनीयता नीति', '/privacy-policy', 4, 1),
('column1', 'Terms & Conditions', 'नियम और शर्तें', '/terms-conditions', 5, 1);

INSERT INTO footer_links (column_name, title, title_hi, url, sort_order, status) VALUES
('column2', 'Shri Ram', 'श्री राम', '/shri-ram', 1, 1),
('column2', 'Ram Mandir', 'राम मंदिर', '/ram-mandir', 2, 1),
('column2', 'Complete Ramayan', 'संपूर्ण रामायण', '/ramayan', 3, 1),
('column2', 'Hanuman Ji', 'हनुमान जी', '/hanuman-ji', 4, 1),
('column2', 'Mata Sita', 'माता सीता', '/mata-sita', 5, 1);

INSERT INTO footer_links (column_name, title, title_hi, url, sort_order, status) VALUES
('column3', 'Ayodhya Guide', 'अयोध्या गाइड', '/ayodhya-guide', 1, 1),
('column3', 'Places to Visit', 'दर्शनीय स्थल', '/places-to-visit', 2, 1),
('column3', 'Aarti & Bhajan', 'आरती और भजन', '/aarti-bhajan', 3, 1),
('column3', 'Kundli & Rashifal', 'कुंडली और राशिफल', '/kundli-rashifal', 4, 1),
('column3', 'Gallery', 'गैलरी', '/gallery', 5, 1);

INSERT INTO footer_links (column_name, title, title_hi, url, sort_order, status) VALUES
('column4', 'Blog', 'ब्लॉग', '/blog', 1, 1),
('column4', 'Reviews', 'समीक्षाएं', '/reviews', 2, 1),
('column4', 'Disclaimer', 'अस्वीकरण', '/disclaimer', 4, 1),
('column4', 'Copyright Policy', 'कॉपीराइट नीति', '/copyright-policy', 5, 1);

-- Default FAQ Items
INSERT INTO faq_items (category, question, question_hi, answer, answer_hi, sort_order, status) VALUES
('general', 'What is Ayodhya Ram Mandir?', 'अयोध्या राम मंदिर क्या है?', 'Ayodhya Ram Mandir is a grand temple being built at the birthplace of Lord Ram in Ayodhya, Uttar Pradesh. It is one of the most significant religious sites for Hindus worldwide.', 'अयोध्या राम मंदिर उत्तर प्रदेश के अयोध्या में भगवान राम के जन्मस्थान पर बन रहा एक भव्य मंदिर है। यह दुनिया भर के हिंदुओं के लिए सबसे महत्वपूर्ण धार्मिक स्थलों में से एक है।', 1, 1);

INSERT INTO faq_items (category, question, question_hi, answer, answer_hi, sort_order, status) VALUES
('general', 'How to reach Ayodhya?', 'अयोध्या कैसे पहुंचे?', 'Ayodhya is well connected by road, rail and air. The nearest airport is Ayodhya International Airport (AYJ). Ayodhya Junction is the main railway station. Regular buses ply from Lucknow, Varanasi and other major cities.', 'अयोध्या सड़क, रेल और हवाई मार्ग से अच्छी तरह जुड़ा हुआ है। निकटतम हवाई अड्डा अयोध्या अंतर्राष्ट्रीय हवाई अड्डा (AYJ) है। अयोध्या जंक्शन मुख्य रेलवे स्टेशन है। लखनऊ, वाराणसी और अन्य प्रमुख शहरों से नियमित बसें चलती हैं।', 2, 1);

INSERT INTO faq_items (category, question, question_hi, answer, answer_hi, sort_order, status) VALUES
('general', 'What is the best time to visit Ayodhya?', 'अयोध्या जाने का सबसे अच्छा समय क्या है?', 'The best time to visit Ayodhya is from October to March when the weather is pleasant. Ram Navami (March-April) and Deepotsav (Diwali) are the most auspicious times to visit.', 'अयोध्या जाने का सबसे अच्छा समय अक्टूबर से मार्च है जब मौसम सुखद होता है। राम नवमी (मार्च-अप्रैल) और दीपोत्सव (दीवाली) आने का सबसे शुभ समय है।', 3, 1);

-- Default Chatbot FAQs
INSERT INTO chatbot_faqs (question, question_hi, answer, answer_hi, keywords, category, sort_order, status) VALUES
('How to reach Ayodhya?', 'अयोध्या कैसे पहुंचे?', 'You can reach Ayodhya by flight (Ayodhya Airport AYJ), train (Ayodhya Junction), or road. It is about 135 km from Lucknow.', 'आप अयोध्या हवाई मार्ग (अयोध्या हवाई अड्डा AYJ), रेल (अयोध्या जंक्शन) या सड़क मार्ग से पहुंच सकते हैं। यह लखनऊ से लगभग 135 किमी दूर है।', 'reach,ayodhya,how,travel,train,flight', 'travel', 1, 1);

INSERT INTO chatbot_faqs (question, question_hi, answer, answer_hi, keywords, category, sort_order, status) VALUES
('What is Ram Mandir history?', 'राम मंदिर का इतिहास क्या है?', 'The Ram Mandir is being built at Shri Ram Janmabhoomi, the birthplace of Lord Ram. After centuries of devotion, the temple construction began in 2020 and the Pran Pratishtha was performed on January 22, 2024.', 'राम मंदिर भगवान राम के जन्मस्थान श्री राम जन्मभूमि पर बन रहा है। सदियों की भक्ति के बाद, मंदिर निर्माण 2020 में शुरू हुआ और 22 जनवरी 2024 को प्राण प्रतिष्ठा संपन्न हुई।', 'ram mandir,history,shri ram,janmabhoomi', 'ram_mandir', 2, 1);

INSERT INTO chatbot_faqs (question, question_hi, answer, answer_hi, keywords, category, sort_order, status) VALUES
('What are the Ram Mandir timings?', 'राम मंदिर का समय क्या है?', 'Ram Mandir darshan timings: Morning 7:00 AM to 11:30 AM, Evening 2:00 PM to 7:00 PM. Aarti timings: Morning 6:30 AM, Evening 6:30 PM.', 'राम मंदिर दर्शन समय: सुबह 7:00 से 11:30, शाम 2:00 से 7:00। आरती समय: सुबह 6:30, शाम 6:30।', 'timing,ram mandir,darshan,aarti,time', 'ram_mandir', 3, 1);

INSERT INTO chatbot_faqs (question, question_hi, answer, answer_hi, keywords, category, sort_order, status) VALUES
('Who is Hanuman Ji?', 'हनुमान जी कौन हैं?', 'Hanuman Ji is the greatest devotee of Lord Ram. He is the son of wind god Pawan (Vayu) and Anjani. He is known for his strength, devotion, and service to Shri Ram.', 'हनुमान जी भगवान राम के सबसे महान भक्त हैं। वे वायु देवता पवन और अंजनी के पुत्र हैं। वे अपनी शक्ति, भक्ति और श्री राम की सेवा के लिए जाने जाते हैं।', 'hanuman,who,hanuman ji,ram bhakt', 'hanuman', 4, 1);

INSERT INTO chatbot_faqs (question, question_hi, answer, answer_hi, keywords, category, sort_order, status) VALUES
('Tell me about Mata Sita', 'माता सीता के बारे में बताएं', 'Mata Sita is the wife of Lord Ram and daughter of King Janak. She is considered an incarnation of Goddess Lakshmi and the ideal of purity and devotion.', 'माता सीता भगवान राम की पत्नी और राजा जनक की पुत्री हैं। उन्हें देवी लक्ष्मी का अवतार और पवित्रता और भक्ति की आदर्श माना जाता है।', 'sita,mata sita,ram wife,janak', 'mata_sita', 5, 1);

INSERT INTO chatbot_faqs (question, question_hi, answer, answer_hi, keywords, category, sort_order, status) VALUES
('What is Hanuman Chalisa?', 'हनुमान चालीसा क्या है?', 'Hanuman Chalisa is a 40-verse hymn composed by Tulsidas in praise of Hanuman Ji. It is one of the most popular Hindu devotional prayers.', 'हनुमान चालीसा तुलसीदास द्वारा रचित 40 छंदों का स्तोत्र है जो हनुमान जी की स्तुति में है। यह सबसे लोकप्रिय हिंदू भक्ति प्रार्थनाओं में से एक है।', 'hanuman chalisa,what,chaupai,tulsidas', 'hanuman', 6, 1);

INSERT INTO chatbot_faqs (question, question_hi, answer, answer_hi, keywords, category, sort_order, status) VALUES
('How to book Ayodhya trip?', 'अयोध्या यात्रा कैसे बुक करें?', 'You can plan your Ayodhya trip using our trip planner. We provide complete guides for hotels, transport, darshan booking and itinerary planning.', 'आप हमारी ट्रिप प्लानर का उपयोग करके अपनी अयोध्या यात्रा की योजना बना सकते हैं। हम होटल, परिवहन, दर्शन बुकिंग और यात्रा कार्यक्रम योजना के लिए संपूर्ण गाइड प्रदान करते हैं।', 'book,trip,ayodhya,plan,hotel,darshan', 'travel', 7, 1);

INSERT INTO chatbot_faqs (question, question_hi, answer, answer_hi, keywords, category, sort_order, status) VALUES
('What is Ram Navami?', 'राम नवमी क्या है?', 'Ram Navami is the birthday of Lord Ram, celebrated on the ninth day of Chaitra month. It is one of the most important festivals in Ayodhya.', 'राम नवमी भगवान राम का जन्मदिन है, जो चैत्र मास के नवमी तिथि को मनाया जाता है। यह अयोध्या का सबसे महत्वपूर्ण त्योहारों में से एक है।', 'ram navami,festival,birthday,ram', 'festival', 8, 1);

-- ============================================
-- INDEXES
-- ============================================
CREATE INDEX idx_pages_slug ON pages(slug);
CREATE INDEX idx_pages_status ON pages(status);
CREATE INDEX idx_pages_category ON pages(category);
CREATE INDEX idx_blogs_slug ON blogs(slug);
CREATE INDEX idx_blogs_status ON blogs(status);
CREATE INDEX idx_blogs_category ON blogs(category_id);
CREATE INDEX idx_menu_parent ON menu_items(parent_id);
CREATE INDEX idx_menu_type ON menu_items(menu_type);
CREATE INDEX idx_media_folder ON media_library(folder);
CREATE INDEX idx_pageviews_date ON page_views(view_date);
CREATE INDEX idx_search_query ON search_logs(search_query);
CREATE INDEX idx_reviews_approved ON reviews(is_approved);
CREATE INDEX idx_uploads_approved ON user_uploads(is_approved);

-- ============================================
-- VIEWS
-- ============================================
CREATE VIEW vw_published_pages AS
SELECT p.*, c.name as category_name, c.name_hi as category_name_hi
FROM pages p
LEFT JOIN blog_categories c ON p.category = c.slug
WHERE p.status = 'published';

CREATE VIEW vw_published_blogs AS
SELECT b.*, c.name as category_name, c.name_hi as category_name_hi
FROM blogs b
LEFT JOIN blog_categories c ON b.category_id = c.id
WHERE b.status = 'published';