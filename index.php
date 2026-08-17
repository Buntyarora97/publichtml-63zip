<?php
/**
 * Ayodhya Ram Mandir - Home Page (Complete Redesigned)
 * Premium design with hero slider, animations, full SEO
 */

$pageType = 'home';
$pageSlug = '';
$pageTitle = 'Ayodhya Ram Mandir - Jai Shri Ram | Complete Guide to Shri Ram & Ayodhya';

require_once __DIR__ . '/includes/functions.php';

// Get hero slides
$heroSlides = dbFetchAll("SELECT * FROM hero_section WHERE page_slug = 'home' AND status = 1 ORDER BY sort_order");

// Get quick cards data
$quickCards = [
    ['icon' => 'fa-place-of-worship', 'title' => 'Ram Lalla Darshan', 'title_hi' => 'राम लला दर्शन', 'desc' => 'Complete darshan guide', 'desc_hi' => 'दर्शन की संपूर्ण जानकारी', 'slug' => 'ram-mandir-darshan-guide', 'color' => '#F55900'],
    ['icon' => 'fa-landmark', 'title' => 'Ram Mandir History', 'title_hi' => 'राम मंदिर इतिहास', 'desc' => 'Divine history of Ram Mandir', 'desc_hi' => 'राम मंदिर का दिव्य इतिहास', 'slug' => 'ram-mandir', 'color' => '#FF8237'],
    ['icon' => 'fa-baby', 'title' => 'Shri Ram Janam', 'title_hi' => 'श्री राम जन्म', 'desc' => 'Birth story of Lord Ram', 'desc_hi' => 'भगवान राम की जन्म कथा', 'slug' => 'shri-ram-janam-katha', 'color' => '#FFAA6E'],
    ['icon' => 'fa-fire', 'title' => 'Hanuman Ji Katha', 'title_hi' => 'हनुमान जी कथा', 'desc' => 'Stories of Bajrangbali', 'desc_hi' => 'बजरंगबली की कथाएं', 'slug' => 'hanuman-ji', 'color' => '#F55900'],
    ['icon' => 'fa-heart', 'title' => 'Mata Sita Story', 'title_hi' => 'माता सीता कथा', 'desc' => 'Life of Goddess Sita', 'desc_hi' => 'देवी सीता का जीवन', 'slug' => 'mata-sita', 'color' => '#FF8237'],
    ['icon' => 'fa-book-open', 'title' => 'Complete Ramayan', 'title_hi' => 'संपूर्ण रामायण', 'desc' => 'Read full Ramayan online', 'desc_hi' => 'संपूर्ण रामायण ऑनलाइन', 'slug' => 'ramayan', 'color' => '#FFAA6E'],
    ['icon' => 'fa-om', 'title' => 'Live Aarti', 'title_hi' => 'लाइव आरती', 'desc' => 'Watch live aarti online', 'desc_hi' => 'लाइव आरती देखें', 'slug' => 'live-aarti', 'color' => '#F55900'],
    ['icon' => 'fa-map-location-dot', 'title' => 'Ayodhya Guide', 'title_hi' => 'अयोध्या गाइड', 'desc' => 'Complete travel guide', 'desc_hi' => 'संपूर्ण यात्रा गाइड', 'slug' => 'ayodhya-guide', 'color' => '#FF8237'],
    ['icon' => 'fa-hands-praying', 'title' => 'Hanumangarhi', 'title_hi' => 'हनुमानगढ़ी', 'desc' => 'Ancient Hanuman temple', 'desc_hi' => 'प्राचीन हनुमान मंदिर', 'slug' => 'hanumangarhi', 'color' => '#FFAA6E'],
    ['icon' => 'fa-hotel', 'title' => 'Dharamshala', 'title_hi' => 'धर्मशाला', 'desc' => 'Free stay guide', 'desc_hi' => 'मुफ्त ठहरने की जानकारी', 'slug' => 'dharamshala-ayodhya', 'color' => '#F55900'],
];

// Get timeline events
$timelineEvents = [
    ['title_hi' => 'श्री राम जन्म', 'title' => 'Shri Ram Birth', 'desc_hi' => 'अयोध्या में भगवान राम का जन्म', 'desc' => 'Birth of Lord Ram in Ayodhya', 'icon' => 'fa-baby', 'year' => 'त्रेतायुग'],
    ['title_hi' => 'गुरु वशिष्ठ शिक्षा', 'title' => 'Guru Vashishtha', 'desc_hi' => 'गुरु वशिष्ठ के मार्गदर्शन में शिक्षा', 'desc' => 'Education under Guru Vashishtha', 'icon' => 'fa-graduation-cap', 'year' => 'बाल काण्ड'],
    ['title_hi' => 'सीता स्वयंवर', 'title' => 'Sita Swayamvar', 'desc_hi' => 'शिव धनुष का भंग और सीता से विवाह', 'desc' => 'Breaking of Shiv Dhanush', 'icon' => 'fa-ring', 'year' => 'बाल काण्ड'],
    ['title_hi' => 'राम वनवास', 'title' => 'Ram Vanvas', 'desc_hi' => '14 वर्ष का वनवास', 'desc' => '14 years of forest exile', 'icon' => 'fa-tree', 'year' => 'अयोध्या काण्ड'],
    ['title_hi' => 'सीता हरण', 'title' => 'Sita Haran', 'desc_hi' => 'रावण द्वारा सीता का हरण', 'desc' => 'Abduction of Sita by Ravan', 'icon' => 'fa-triangle-exclamation', 'year' => 'अरण्य काण्ड'],
    ['title_hi' => 'हनुमान मिलन', 'title' => 'Hanuman Milan', 'desc_hi' => 'हनुमान जी से मिलन', 'desc' => 'Meeting with Hanuman Ji', 'icon' => 'fa-handshake', 'year' => 'किष्किंधा काण्ड'],
    ['title_hi' => 'लंका दहन', 'title' => 'Lanka Dahan', 'desc_hi' => 'हनुमान द्वारा लंका दहन', 'desc' => 'Burning of Lanka by Hanuman', 'icon' => 'fa-fire-flame-curved', 'year' => 'सुंदर काण्ड'],
    ['title_hi' => 'राम सेतु', 'title' => 'Ram Setu', 'desc_hi' => 'समुद्र पर पुल का निर्माण', 'desc' => 'Building bridge over ocean', 'icon' => 'fa-bridge', 'year' => 'युद्ध काण्ड'],
    ['title_hi' => 'रावण वध', 'title' => 'Ravan Vadh', 'desc_hi' => 'रावण पर विजय', 'desc' => 'Victory over Ravan', 'icon' => 'fa-bolt', 'year' => 'युद्ध काण्ड'],
    ['title_hi' => 'अयोध्या वापसी', 'title' => 'Ayodhya Return', 'desc_hi' => 'पुष्पक विमान से अयोध्या लौटना', 'desc' => 'Return to Ayodhya', 'icon' => 'fa-crown', 'year' => 'उत्तर काण्ड'],
];

// Get gallery images
$galleryImages = dbFetchAll("SELECT * FROM gallery WHERE status = 1 ORDER BY sort_order LIMIT 12");

// Get reviews
$reviews = dbFetchAll("SELECT * FROM reviews WHERE is_approved = 1 AND is_featured = 1 ORDER BY id DESC LIMIT 6");

// Get daily suvichar
$todaySuvichar = dbFetch("SELECT * FROM daily_suvichar WHERE status = 1 ORDER BY id DESC LIMIT 1");

// Get user uploads
$userUploads = dbFetchAll("SELECT * FROM user_uploads WHERE is_approved = 1 ORDER BY created_at DESC LIMIT 8");

$lang = getCurrentLang();

// SEO Schema
$pageSchema = json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'WebSite',
    'name' => 'AyodhyaRamMandir.in',
    'url' => SITE_URL,
    'description' => 'Complete guide to Ayodhya Ram Mandir, Shri Ram, Ramayan, Hanuman Ji, and Ayodhya travel',
    'potentialAction' => [
        '@type' => 'SearchAction',
        'target' => SITE_URL . '/search?q={search_term_string}',
        'query-input' => 'required name=search_term_string'
    ]
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include __DIR__ . '/includes/header.php';
?>

<!-- ====== LUXURY HERO SECTION ====== -->
<section class="hero-section" id="home">
    <!-- Animated Background -->
    <div class="hero-bg" style="background-image: url('<?php echo assetUrl('images/ayodhya-nagri.jpg'); ?>')"></div>
    <div class="hero-overlay"></div>
    
    <!-- Particle Canvas -->
    <canvas id="particles-canvas" class="hero-particles"></canvas>
    
    <!-- Light Rays -->
    <div class="light-rays">
        <div class="ray"></div><div class="ray"></div><div class="ray"></div>
        <div class="ray"></div><div class="ray"></div>
    </div>
    
    <!-- Floating Diyas -->
    <div class="floating-diyas">
        <span class="diya">🪔</span><span class="diya">🪔</span>
        <span class="diya">🪔</span><span class="diya">🪔</span>
        <span class="diya">🪔</span><span class="diya">🪔</span>
    </div>
    
    <div class="container hero-content">
        <div class="row align-items-center min-vh-90">
            <!-- Left: Content -->
            <div class="col-lg-6 col-xl-5" data-aos="fade-right">
                <div class="hero-badge animate-glow">
                    <span class="om-symbol">🕉️</span>
                    <?php echo __t('Jai Shri Ram - Welcome to Ayodhya Dham', 'जय श्री राम - अयोध्या धाम में आपका स्वागत'); ?>
                </div>
                
                <h1 class="hero-title">
                    <?php echo __t(
                        '<span class="hero-hi">जय श्री राम</span><br><span class="highlight">Ayodhya Ram Mandir</span>',
                        '<span class="hero-hi">जय श्री राम</span><br><span class="highlight">अयोध्या राम मंदिर</span>'
                    ); ?>
                </h1>
                
                <p class="hero-subtitle">
                    <?php echo __t(
                        'Complete Digital Guide to Ram Lalla, Shri Ram Katha, Ramayan, Hanuman Ji, Mata Sita, Ayodhya Darshan & Travel Guide.',
                        'राम लला, श्री राम कथा, रामायण, हनुमान जी, माता सीता, अयोध्या दर्शन और यात्रा गाइड का संपूर्ण डिजिटल गाइड।'
                    ); ?>
                </p>

                <!-- Stats Row -->
                <div class="hero-stats" data-aos="fade-up" data-aos-delay="200">
                    <div class="hero-stat">
                        <span class="stat-icon">🏛️</span>
                        <div>
                            <span class="stat-num">500+</span>
                            <span class="stat-txt"><?php echo __t('Pages', 'पेज'); ?></span>
                        </div>
                    </div>
                    <div class="hero-stat">
                        <span class="stat-icon">🙏</span>
                        <div>
                            <span class="stat-num">100+</span>
                            <span class="stat-txt"><?php echo __t('Cities', 'शहर'); ?></span>
                        </div>
                    </div>
                    <div class="hero-stat">
                        <span class="stat-icon">📖</span>
                        <div>
                            <span class="stat-num">∞</span>
                            <span class="stat-txt"><?php echo __t('Stories', 'कथाएं'); ?></span>
                        </div>
                    </div>
                </div>
                
                <div class="hero-buttons" data-aos="fade-up" data-aos-delay="300">
                    <a href="<?php echo pageUrl('ram-mandir'); ?>" class="btn-hero btn-hero-primary">
                        <i class="fas fa-landmark"></i>
                        <?php echo __t('Ram Mandir History', 'राम मंदिर इतिहास'); ?>
                    </a>
                    <a href="<?php echo pageUrl('ayodhya-guide'); ?>" class="btn-hero btn-hero-outline">
                        <i class="fas fa-map-location-dot"></i>
                        <?php echo __t('Ayodhya Guide', 'अयोध्या गाइड'); ?>
                    </a>
                    <a href="<?php echo pageUrl('ramayan'); ?>" class="btn-hero btn-hero-outline">
                        <i class="fas fa-book-open"></i>
                        <?php echo __t('Ramayan', 'रामायण'); ?>
                    </a>
                    <a href="gallery.php" class="btn-hero btn-hero-primary">
                        <i class="fas fa-images"></i>
                        <?php echo __t('Gallery', 'गैलरी'); ?>
                    </a>
                </div>
                
                <!-- Suvichar -->
                <?php if ($todaySuvichar): ?>
                <div class="hero-suvichar" data-aos="fade-up" data-aos-delay="400">
                    <i class="fas fa-quote-left quote-icon"></i>
                    <p><?php echo e($lang === 'hi' ? ($todaySuvichar['content_hi'] ?? $todaySuvichar['content']) : $todaySuvichar['content']); ?></p>
                </div>
                <?php endif; ?>
            </div>
            
            <!-- Right: Media Slider -->
            <div class="col-lg-6 col-xl-7" data-aos="fade-left" data-aos-delay="200">
                <div class="hero-slider-wrap">
                    <div class="hero-slider" id="heroSlider">
                        <?php 
                        $slides = $heroSlides ?: [
                            ['right_frame_type' => 'image', 'right_frame_source' => 'assets/images/ram-lala.jpg', 'title' => 'Ram Lalla', 'title_hi' => 'राम लला'],
                            ['right_frame_type' => 'image', 'right_frame_source' => 'assets/images/ayodhya-mandir.jpg', 'title' => 'Ayodhya Mandir', 'title_hi' => 'अयोध्या मंदिर'],
                            ['right_frame_type' => 'image', 'right_frame_source' => 'assets/images/shree-ram.jpg', 'title' => 'Shree Ram', 'title_hi' => 'श्री राम'],
                            ['right_frame_type' => 'image', 'right_frame_source' => 'assets/images/ram-wapsi-ayodhya.jpg', 'title' => 'Ram Wapsi', 'title_hi' => 'राम वापसी'],
                            ['right_frame_type' => 'image', 'right_frame_source' => 'assets/images/hanuman-parvat.jpg', 'title' => 'Hanuman Ji', 'title_hi' => 'हनुमान जी'],
                            ['right_frame_type' => 'video', 'right_frame_source' => 'assets/images/ram-sita.mp4', 'right_frame_poster' => 'assets/images/ram-wapsi-ayodhya.jpg', 'title' => 'Ram Sita', 'title_hi' => 'राम सीता'],
                        ];
                        foreach ($slides as $i => $slide): 
                            $isActive = $i === 0 ? 'active' : '';
                        ?>
                        <div class="hero-slide <?php echo $isActive; ?>" data-index="<?php echo $i; ?>">
                            <div class="hero-frame diya-glow">
                                <?php if ($slide['right_frame_type'] === 'video'): ?>
                                    <video class="slide-media" muted loop playsinline 
                                           poster="<?php echo e($slide['right_frame_poster'] ?? 'assets/images/ram-wapsi-ayodhya.jpg'); ?>"
                                           <?php echo $i === 0 ? 'autoplay' : ''; ?>>
                                        <source src="<?php echo e($slide['right_frame_source']); ?>" type="video/mp4">
                                    </video>
                                    <div class="slide-play-btn" onclick="this.previousElementSibling.play()">
                                        <i class="fas fa-play"></i>
                                    </div>
                                <?php elseif ($slide['right_frame_type'] === 'youtube'): ?>
                                    <iframe class="slide-media" src="https://www.youtube.com/embed/<?php echo e($slide['right_frame_source']); ?>?autoplay=0&rel=0&mute=1" 
                                        frameborder="0" allowfullscreen></iframe>
                                <?php else: ?>
                                    <img class="slide-media" src="<?php echo e($slide['right_frame_source']); ?>" 
                                         alt="<?php echo e($lang === 'hi' ? ($slide['title_hi'] ?? $slide['title']) : $slide['title']); ?>"
                                         loading="<?php echo $i === 0 ? 'eager' : 'lazy'; ?>">
                                <?php endif; ?>
                                
                                <!-- Slide Caption -->
                                <div class="slide-caption">
                                    <span class="slide-label">
                                        <?php echo e($lang === 'hi' ? ($slide['title_hi'] ?? $slide['title']) : $slide['title']); ?>
                                    </span>
                                </div>
                                
                                <!-- Decorative corners -->
                                <div class="frame-corner tl"></div>
                                <div class="frame-corner tr"></div>
                                <div class="frame-corner bl"></div>
                                <div class="frame-corner br"></div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <!-- Slider Controls -->
                    <button class="slider-btn slider-prev" onclick="heroSliderPrev()">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="slider-btn slider-next" onclick="heroSliderNext()">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                    
                    <!-- Slider Dots -->
                    <div class="slider-dots" id="sliderDots">
                        <?php foreach ($slides as $i => $slide): ?>
                        <button class="slider-dot <?php echo $i === 0 ? 'active' : ''; ?>" onclick="heroSliderGo(<?php echo $i; ?>)"></button>
                        <?php endforeach; ?>
                    </div>
                    
                    <!-- Slide Thumbnails -->
                    <div class="slide-thumbs">
                        <?php foreach ($slides as $i => $slide): 
                            $thumb = $slide['right_frame_type'] === 'video' ? ($slide['right_frame_poster'] ?? 'assets/images/ram-wapsi-ayodhya.jpg') : $slide['right_frame_source'];
                        ?>
                        <div class="slide-thumb <?php echo $i === 0 ? 'active' : ''; ?>" onclick="heroSliderGo(<?php echo $i; ?>)">
                            <img src="<?php echo e($thumb); ?>" alt="slide <?php echo $i+1; ?>">
                            <?php if ($slide['right_frame_type'] === 'video'): ?>
                            <span class="thumb-play"><i class="fas fa-play"></i></span>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Scroll Down -->
    <div class="hero-scroll-down">
        <a href="#quick-cards">
            <i class="fas fa-chevron-down"></i>
        </a>
    </div>
</section>

<!-- ====== QUICK DEVOTIONAL CARDS ====== -->
<section class="section-padding quick-cards-section" id="quick-cards" data-aos="fade-up">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label"><i class="fas fa-om"></i> <?php echo __t('Quick Access', 'त्वरित पहुंच'); ?></span>
            <h2 class="section-title"><?php echo __t('Divine Resources', 'दिव्य संसाधन'); ?></h2>
            <p class="section-subtitle"><?php echo __t('Everything about Shri Ram at your fingertips', 'श्री राम की सभी जानकारी आपकी उंगलियों पर'); ?></p>
        </div>
        
        <div class="row g-3 g-md-4">
            <?php foreach ($quickCards as $index => $card): ?>
            <div class="col-6 col-md-4 col-lg-3 col-xl-2-custom" data-aos="fade-up" data-aos-delay="<?php echo $index * 50; ?>">
                <a href="<?php echo pageUrl($card['slug']); ?>" class="quick-card">
                    <div class="quick-card-icon" style="background: linear-gradient(135deg, <?php echo $card['color']; ?>22, <?php echo $card['color']; ?>55);">
                        <i class="fas <?php echo $card['icon']; ?>" style="color: <?php echo $card['color']; ?>"></i>
                    </div>
                    <h3><?php echo e($lang === 'hi' ? $card['title_hi'] : $card['title']); ?></h3>
                    <p><?php echo e($lang === 'hi' ? $card['desc_hi'] : $card['desc']); ?></p>
                    <span class="quick-card-arrow"><i class="fas fa-arrow-right"></i></span>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ====== RAM MANDIR HIGHLIGHT ====== -->
<section class="section-padding ram-mandir-section" style="background: linear-gradient(135deg, #FFF8F0 0%, #FFE8CC 100%);">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="section-header text-start">
                    <span class="section-label"><i class="fas fa-landmark"></i> <?php echo __t('Ram Mandir', 'राम मंदिर'); ?></span>
                    <h2 class="section-title"><?php echo __t('Ayodhya Ram Mandir - 22 January 2024', 'अयोध्या राम मंदिर - 22 जनवरी 2024'); ?></h2>
                </div>
                <p class="lead-text">
                    <?php echo __t(
                        'The grand Shri Ram Janmabhoomi Mandir was consecrated on 22 January 2024 with the historic Pran Pratishtha ceremony. Built in Nagara style architecture, this magnificent temple stands 161 feet tall on a 70-acre complex.',
                        'श्री राम जन्मभूमि मंदिर का 22 जनवरी 2024 को ऐतिहासिक प्राण प्रतिष्ठा समारोह के साथ अभिषेक किया गया। नागर शैली में निर्मित यह भव्य मंदिर 70 एकड़ के परिसर में 161 फीट ऊंचा खड़ा है।'
                    ); ?>
                </p>
                
                <!-- Stats -->
                <div class="mandir-stats">
                    <div class="stat-box" data-aos="zoom-in" data-aos-delay="100">
                        <div class="stat-number" data-target="161">0</div>
                        <div class="stat-unit"><?php echo __t('Feet Height', 'फीट ऊंचाई'); ?></div>
                    </div>
                    <div class="stat-box" data-aos="zoom-in" data-aos-delay="200">
                        <div class="stat-number" data-target="70">0</div>
                        <div class="stat-unit"><?php echo __t('Acres Complex', 'एकड़ परिसर'); ?></div>
                    </div>
                    <div class="stat-box" data-aos="zoom-in" data-aos-delay="300">
                        <div class="stat-number" data-target="392">0</div>
                        <div class="stat-unit"><?php echo __t('Pillars', 'खंभे'); ?></div>
                    </div>
                    <div class="stat-box" data-aos="zoom-in" data-aos-delay="400">
                        <div class="stat-number" data-target="44">0</div>
                        <div class="stat-unit"><?php echo __t('Gates', 'द्वार'); ?></div>
                    </div>
                </div>
                
                <div class="d-flex gap-3 mt-4">
                    <a href="<?php echo pageUrl('ram-mandir'); ?>" class="btn-hero btn-hero-primary">
                        <i class="fas fa-book-open"></i> <?php echo __t('Full History', 'पूरा इतिहास'); ?>
                    </a>
                    <a href="<?php echo pageUrl('ram-mandir-darshan-guide'); ?>" class="btn-hero btn-hero-outline">
                        <i class="fas fa-compass"></i> <?php echo __t('Darshan Guide', 'दर्शन गाइड'); ?>
                    </a>
                </div>
            </div>
            
            <div class="col-lg-6" data-aos="fade-left">
                <div class="mandir-gallery-grid">
                    <div class="mg-main">
                        <img src="<?php echo assetUrl('images/ayodhya-mandir.jpg'); ?>" alt="Ayodhya Ram Mandir" class="img-fluid">
                        <div class="mg-badge">🕉️ <?php echo __t('Ram Janmabhoomi', 'राम जन्मभूमि'); ?></div>
                    </div>
                    <div class="mg-side">
                        <div class="mg-small">
                            <img src="<?php echo assetUrl('images/ram-lala.jpg'); ?>" alt="Ram Lalla" class="img-fluid">
                        </div>
                        <div class="mg-small">
                            <img src="<?php echo assetUrl('images/ram-mandir-real.jpg'); ?>" alt="Ram Mandir" class="img-fluid">
                        </div>
                        <div class="mg-small">
                            <img src="<?php echo assetUrl('images/ram-lala-statue.jpg'); ?>" alt="Ram Lala Statue" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ====== RAMAYAN TIMELINE ====== -->
<section class="section-padding ramayan-timeline-section" style="background: linear-gradient(180deg, #1A0A00 0%, #2D1500 100%);">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label text-warning"><i class="fas fa-book-open"></i> <?php echo __t('Ramayan', 'रामायण'); ?></span>
            <h2 class="section-title text-white"><?php echo __t('Journey of Shri Ram', 'श्री राम की यात्रा'); ?></h2>
            <p class="section-subtitle text-warning"><?php echo __t('From Birth to Ram Rajya', 'जन्म से रामराज्य तक'); ?></p>
        </div>
        
        <div class="timeline-wrapper">
            <?php foreach ($timelineEvents as $i => $event): ?>
            <div class="timeline-item <?php echo $i % 2 === 0 ? 'left' : 'right'; ?>" data-aos="<?php echo $i % 2 === 0 ? 'fade-right' : 'fade-left'; ?>" data-aos-delay="<?php echo $i * 80; ?>">
                <div class="timeline-content">
                    <div class="timeline-icon">
                        <i class="fas <?php echo $event['icon']; ?>"></i>
                    </div>
                    <div class="timeline-body">
                        <span class="timeline-kand"><?php echo e($event['year']); ?></span>
                        <h4><?php echo e($lang === 'hi' ? $event['title_hi'] : $event['title']); ?></h4>
                        <p><?php echo e($lang === 'hi' ? $event['desc_hi'] : $event['desc']); ?></p>
                    </div>
                </div>
                <div class="timeline-dot"></div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center mt-5">
            <a href="<?php echo pageUrl('ramayan'); ?>" class="btn-hero btn-hero-primary btn-lg">
                <i class="fas fa-book-open"></i> <?php echo __t('Read Complete Ramayan', 'संपूर्ण रामायण पढ़ें'); ?>
            </a>
        </div>
    </div>
</section>

<!-- ====== FEATURED IMAGES SECTION ====== -->
<section class="section-padding featured-images-section" style="background: linear-gradient(135deg, #FFF3E0 0%, #FFE0B2 100%);">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label"><i class="fas fa-images"></i> <?php echo __t('Divine Gallery', 'दिव्य गैलरी'); ?></span>
            <h2 class="section-title"><?php echo __t('Sacred Images of Ram & Ayodhya', 'राम और अयोध्या की पवित्र तस्वीरें'); ?></h2>
        </div>
        
        <!-- Masonry Gallery -->
        <div class="masonry-gallery">
            <div class="masonry-item tall" data-aos="fade-up">
                <img src="<?php echo assetUrl('images/shree-ram.jpg'); ?>" alt="Shree Ram" loading="lazy">
                <div class="masonry-overlay">
                    <span><?php echo __t('Shree Ram', 'श्री राम'); ?></span>
                </div>
            </div>
            <div class="masonry-item" data-aos="fade-up" data-aos-delay="100">
                <img src="<?php echo assetUrl('images/ram-lala.jpg'); ?>" alt="Ram Lalla" loading="lazy">
                <div class="masonry-overlay"><span><?php echo __t('Ram Lalla', 'राम लला'); ?></span></div>
            </div>
            <div class="masonry-item" data-aos="fade-up" data-aos-delay="150">
                <img src="<?php echo assetUrl('images/ayodhya-mandir.jpg'); ?>" alt="Ayodhya Mandir" loading="lazy">
                <div class="masonry-overlay"><span><?php echo __t('Ayodhya Mandir', 'अयोध्या मंदिर'); ?></span></div>
            </div>
            <div class="masonry-item tall" data-aos="fade-up" data-aos-delay="200">
                <img src="<?php echo assetUrl('images/hanuman-parvat.jpg'); ?>" alt="Hanuman Ji" loading="lazy">
                <div class="masonry-overlay"><span><?php echo __t('Hanuman Ji', 'हनुमान जी'); ?></span></div>
            </div>
            <div class="masonry-item" data-aos="fade-up" data-aos-delay="250">
                <img src="<?php echo assetUrl('images/ram-ravan-yudh.jpg'); ?>" alt="Ram Ravan" loading="lazy">
                <div class="masonry-overlay"><span><?php echo __t('Ram-Ravan Yudh', 'राम-रावण युद्ध'); ?></span></div>
            </div>
            <div class="masonry-item" data-aos="fade-up" data-aos-delay="300">
                <img src="<?php echo assetUrl('images/ram-sita-hanuman-laxman.jpg'); ?>" alt="Ram Darbar" loading="lazy">
                <div class="masonry-overlay"><span><?php echo __t('Ram Darbar', 'राम दरबार'); ?></span></div>
            </div>
            <div class="masonry-item" data-aos="fade-up" data-aos-delay="350">
                <img src="<?php echo assetUrl('images/ram-setu.jpg'); ?>" alt="Ram Setu" loading="lazy">
                <div class="masonry-overlay"><span><?php echo __t('Ram Setu', 'राम सेतु'); ?></span></div>
            </div>
            <div class="masonry-item" data-aos="fade-up" data-aos-delay="400">
                <img src="<?php echo assetUrl('images/ayodhya-nagri.jpg'); ?>" alt="Ayodhya Nagri" loading="lazy">
                <div class="masonry-overlay"><span><?php echo __t('Ayodhya Nagri', 'अयोध्या नगरी'); ?></span></div>
            </div>
        </div>
        
        <div class="text-center mt-5">
            <a href="gallery.php" class="btn-hero btn-hero-primary">
                <i class="fas fa-images"></i> <?php echo __t('View Full Gallery', 'पूरी गैलरी देखें'); ?>
            </a>
        </div>
    </div>
</section>

<!-- ====== AYODHYA HIGHLIGHTS ====== -->
<section class="section-padding ayodhya-highlights" style="background: linear-gradient(135deg, #FFFEBC 0%, #FFD3A5 100%);">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label"><i class="fas fa-map-location-dot"></i> <?php echo __t('Ayodhya', 'अयोध्या'); ?></span>
            <h2 class="section-title"><?php echo __t('Places to Visit in Ayodhya', 'अयोध्या में घूमने की जगहें'); ?></h2>
        </div>
        
        <div class="row g-4">
            <?php
            $places = [
                ['img' => 'ayodhya-mandir.jpg', 'title' => 'Ram Janmabhoomi', 'title_hi' => 'राम जन्मभूमि', 'desc' => 'Birthplace of Lord Ram', 'desc_hi' => 'भगवान राम का जन्मस्थान', 'slug' => 'ram-mandir', 'color' => '#F55900'],
                ['img' => 'hanuman-ji.jpg', 'title' => 'Hanumangarhi', 'title_hi' => 'हनुमानगढ़ी', 'desc' => 'Ancient Hanuman temple', 'desc_hi' => 'प्राचीन हनुमान मंदिर', 'slug' => 'hanumangarhi', 'color' => '#FF8237'],
                ['img' => 'ram-lala.jpg', 'title' => 'Kanak Bhawan', 'title_hi' => 'कनक भवन', 'desc' => 'Golden Palace of Ram-Sita', 'desc_hi' => 'राम-सीता का सोने का महल', 'slug' => 'kanak-bhawan', 'color' => '#FFAA6E'],
                ['img' => 'ram-silhouette.jpg', 'title' => 'Saryu Ghat', 'title_hi' => 'सरयू घाट', 'desc' => 'Sacred river ghats', 'desc_hi' => 'पवित्र नदी घाट', 'slug' => 'saryu-ghat', 'color' => '#F55900'],
                ['img' => 'ayodhya-nagri.jpg', 'title' => 'Ram Ki Paidi', 'title_hi' => 'राम की पैड़ी', 'desc' => 'Sacred bathing ghats', 'desc_hi' => 'पवित्र स्नान घाट', 'slug' => 'saryu-ghat', 'color' => '#FF8237'],
                ['img' => 'ram-mandir-real.jpg', 'title' => 'Dashrath Mahal', 'title_hi' => 'दशरथ महल', 'desc' => 'Palace of King Dashrath', 'desc_hi' => 'राजा दशरथ का महल', 'slug' => 'ayodhya-guide', 'color' => '#FFAA6E'],
            ];
            foreach ($places as $i => $place):
            ?>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="<?php echo $i * 80; ?>">
                <a href="<?php echo pageUrl($place['slug']); ?>" class="place-card">
                    <div class="place-img">
                        <img src="<?php echo assetUrl('images/' . $place['img']); ?>" 
                             alt="<?php echo $lang === 'hi' ? $place['title_hi'] : $place['title']; ?>" loading="lazy">
                        <div class="place-overlay" style="background: linear-gradient(to top, <?php echo $place['color']; ?>dd, transparent)"></div>
                    </div>
                    <div class="place-body">
                        <h3><?php echo e($lang === 'hi' ? $place['title_hi'] : $place['title']); ?></h3>
                        <p><?php echo e($lang === 'hi' ? $place['desc_hi'] : $place['desc']); ?></p>
                        <span class="place-link"><?php echo __t('Explore', 'जानें'); ?> <i class="fas fa-arrow-right"></i></span>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center mt-5">
            <a href="<?php echo pageUrl('ayodhya-guide'); ?>" class="btn-hero btn-hero-primary">
                <i class="fas fa-map-location-dot"></i> <?php echo __t('Complete Ayodhya Guide', 'पूरा अयोध्या गाइड'); ?>
            </a>
        </div>
    </div>
</section>

<!-- ====== RAM KATHA CARDS ====== -->
<section class="section-padding" style="background: linear-gradient(180deg, #1A0A00 0%, #3D1A00 100%);">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label text-warning"><i class="fas fa-book-open"></i> <?php echo __t('Divine Stories', 'दिव्य कथाएं'); ?></span>
            <h2 class="section-title text-white"><?php echo __t('Ram Katha & Stories', 'राम कथा और कहानियां'); ?></h2>
        </div>
        
        <div class="row g-4">
            <?php
            $stories = [
                ['img' => 'shree-ram.jpg', 'title' => 'Shri Ram Janam Katha', 'title_hi' => 'श्री राम जन्म कथा', 'desc' => 'Complete birth story of Lord Ram in Ayodhya', 'desc_hi' => 'अयोध्या में भगवान राम की संपूर्ण जन्म कथा', 'slug' => 'shri-ram-janam-katha'],
                ['img' => 'ram-sita-hanuman-laxman.jpg', 'title' => 'Mata Sita Story', 'title_hi' => 'माता सीता की कथा', 'desc' => 'Complete life story of Goddess Sita', 'desc_hi' => 'देवी सीता का संपूर्ण जीवन परिचय', 'slug' => 'mata-sita'],
                ['img' => 'hanuman-parvat.jpg', 'title' => 'Hanuman Ji Katha', 'title_hi' => 'हनुमान जी की कथा', 'desc' => 'Stories of Bajrangbali and Sundarkand', 'desc_hi' => 'बजरंगबली और सुंदरकांड की कथाएं', 'slug' => 'hanuman-ji'],
                ['img' => 'ram-ravan-yudh.jpg', 'title' => 'Ravan Vadh Katha', 'title_hi' => 'रावण वध कथा', 'desc' => 'The epic war and victory of Good over Evil', 'desc_hi' => 'महायुद्ध और अच्छाई की बुराई पर जीत', 'slug' => 'ramayan'],
                ['img' => 'ram-setu.jpg', 'title' => 'Ram Setu Story', 'title_hi' => 'राम सेतु की कथा', 'desc' => 'Building of the bridge over the ocean', 'desc_hi' => 'समुद्र पर पुल के निर्माण की कथा', 'slug' => 'ramayan'],
                ['img' => 'ram-wapsi-ayodhya.jpg', 'title' => 'Ram Wapsi & Rajyabhishek', 'title_hi' => 'राम वापसी और राज्याभिषेक', 'desc' => 'Return to Ayodhya and coronation of Ram', 'desc_hi' => 'अयोध्या वापसी और राम का राज्याभिषेक', 'slug' => 'ramayan'],
            ];
            foreach ($stories as $i => $story):
            ?>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="<?php echo $i * 80; ?>">
                <a href="<?php echo pageUrl($story['slug']); ?>" class="story-card">
                    <div class="story-img">
                        <img src="<?php echo assetUrl('images/' . $story['img']); ?>" 
                             alt="<?php echo $lang === 'hi' ? $story['title_hi'] : $story['title']; ?>" loading="lazy">
                    </div>
                    <div class="story-body">
                        <h3><?php echo e($lang === 'hi' ? $story['title_hi'] : $story['title']); ?></h3>
                        <p><?php echo e($lang === 'hi' ? $story['desc_hi'] : $story['desc']); ?></p>
                        <span class="read-more"><?php echo __t('Read Full Story', 'पूरी कथा पढ़ें'); ?> <i class="fas fa-arrow-right"></i></span>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ====== USER TESTIMONIALS ====== -->
<?php if (!empty($reviews)): ?>
<section class="section-padding testimonials-section" style="background: linear-gradient(135deg, #FFF8F0 0%, #FFECD5 100%);">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label"><i class="fas fa-star"></i> <?php echo __t('Devotee Experiences', 'भक्तों के अनुभव'); ?></span>
            <h2 class="section-title"><?php echo __t('What Pilgrims Say', 'तीर्थयात्री क्या कहते हैं'); ?></h2>
        </div>
        
        <div class="row g-4">
            <?php foreach ($reviews as $i => $review): ?>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="<?php echo $i * 80; ?>">
                <div class="review-card">
                    <div class="review-stars">
                        <?php for ($s = 0; $s < ($review['rating'] ?? 5); $s++): ?>
                        <i class="fas fa-star"></i>
                        <?php endfor; ?>
                    </div>
                    <p class="review-text">"<?php echo e($review['review']); ?>"</p>
                    <div class="review-author">
                        <div class="review-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div>
                            <strong><?php echo e($review['name']); ?></strong>
                            <span><?php echo e($review['city']); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ====== USER GALLERY UPLOADS ====== -->
<section class="section-padding user-gallery-section" style="background: linear-gradient(135deg, #FFF3E0 0%, #FFE0B2 100%);">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label"><i class="fas fa-camera"></i> <?php echo __t('Devotee Gallery', 'भक्त गैलरी'); ?></span>
            <h2 class="section-title"><?php echo __t('Share Your Ayodhya Visit', 'अपनी अयोध्या यात्रा साझा करें'); ?></h2>
            <p class="section-subtitle"><?php echo __t('Upload your photos and videos from Ayodhya Ram Mandir', 'अयोध्या राम मंदिर की अपनी तस्वीरें और वीडियो अपलोड करें'); ?></p>
        </div>
        
        <?php if (!empty($userUploads)): ?>
        <div class="user-uploads-grid">
            <?php foreach ($userUploads as $upload): ?>
            <div class="user-upload-item" data-aos="zoom-in">
                <?php if ($upload['file_type'] === 'video'): ?>
                    <video src="<?php echo e($upload['file_path']); ?>" poster="<?php echo assetUrl('images/ayodhya-mandir.jpg'); ?>" controls loading="lazy"></video>
                <?php else: ?>
                    <img src="<?php echo e($upload['file_path']); ?>" alt="<?php echo e($upload['name']); ?>" loading="lazy">
                <?php endif; ?>
                <div class="upload-info">
                    <strong><?php echo e($upload['name']); ?></strong>
                    <?php if (!empty($upload['city'])): ?><span><?php echo e($upload['city']); ?></span><?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
        
        <!-- Upload Form -->
        <div class="upload-form-wrap" data-aos="fade-up">
            <h3><?php echo __t('Upload Your Photo/Video', 'अपनी फोटो/वीडियो अपलोड करें'); ?></h3>
            <form action="api/upload.php" method="POST" enctype="multipart/form-data" class="upload-form" id="userUploadForm">
                <input type="hidden" name="csrf_token" value="<?php echo generateCSRFToken(); ?>">
                <div class="row g-3">
                    <div class="col-md-4">
                        <input type="text" name="name" class="form-control" placeholder="<?php echo __t('Your Name', 'आपका नाम'); ?>" required>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="city" class="form-control" placeholder="<?php echo __t('Your City', 'आपका शहर'); ?>">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="message" class="form-control" placeholder="<?php echo __t('Your message (optional)', 'आपका संदेश (वैकल्पिक)'); ?>">
                    </div>
                    <div class="col-12">
                        <div class="file-upload-area" id="fileUploadArea">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <p><?php echo __t('Click or drag to upload photo/video', 'फोटो/वीडियो अपलोड करने के लिए क्लिक करें या खींचें'); ?></p>
                            <span><?php echo __t('Max 10MB - JPG, PNG, MP4', 'अधिकतम 10MB - JPG, PNG, MP4'); ?></span>
                            <input type="file" name="media" id="mediaFile" accept="image/*,video/*" required>
                        </div>
                        <div id="uploadPreview"></div>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn-hero btn-hero-primary btn-lg">
                            <i class="fas fa-upload"></i> <?php echo __t('Upload & Share', 'अपलोड करें और साझा करें'); ?>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- ====== TRAVEL INFO ====== -->
<section class="section-padding travel-section" style="background: linear-gradient(135deg, #1A0A00 0%, #2D1500 100%);">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label text-warning"><i class="fas fa-plane"></i> <?php echo __t('Travel Guide', 'यात्रा गाइड'); ?></span>
            <h2 class="section-title text-white"><?php echo __t('How to Reach Ayodhya', 'अयोध्या कैसे पहुंचें'); ?></h2>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up">
                <div class="travel-card">
                    <div class="travel-icon"><i class="fas fa-plane"></i></div>
                    <h3><?php echo __t('By Air', 'हवाई मार्ग'); ?></h3>
                    <p><?php echo __t('Maharishi Valmiki International Airport, Ayodhya (AYJ). Direct flights from Delhi, Mumbai, Bangalore.', 'महर्षि वाल्मीकि अंतर्राष्ट्रीय हवाई अड्डा, अयोध्या (AYJ)। दिल्ली, मुंबई, बेंगलुरु से सीधी उड़ानें।'); ?></p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="travel-card">
                    <div class="travel-icon"><i class="fas fa-train"></i></div>
                    <h3><?php echo __t('By Train', 'रेल मार्ग'); ?></h3>
                    <p><?php echo __t('Ayodhya Dham Junction (AY) connected to all major cities. 5 min from Ram Mandir.', 'अयोध्या धाम जंक्शन (AY) सभी प्रमुख शहरों से जुड़ा है। राम मंदिर से 5 मिनट।'); ?></p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="travel-card">
                    <div class="travel-icon"><i class="fas fa-bus"></i></div>
                    <h3><?php echo __t('By Road', 'सड़क मार्ग'); ?></h3>
                    <p><?php echo __t('Well connected via NH-27. Lucknow 135km, Varanasi 200km, Delhi 700km. Frequent bus services.', 'NH-27 से जुड़ा। लखनऊ 135 किमी, वाराणसी 200 किमी, दिल्ली 700 किमी।'); ?></p>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-5">
            <a href="<?php echo pageUrl('ayodhya-guide'); ?>" class="btn-hero btn-hero-primary me-3">
                <i class="fas fa-map-location-dot"></i> <?php echo __t('Full Travel Guide', 'पूरा यात्रा गाइड'); ?>
            </a>
            <a href="<?php echo pageUrl('dharamshala-ayodhya'); ?>" class="btn-hero btn-hero-outline">
                <i class="fas fa-hotel"></i> <?php echo __t('Dharamshala Guide', 'धर्मशाला गाइड'); ?>
            </a>
        </div>
    </div>
</section>

<!-- ====== 100+ CITY LINKS ====== -->
<section class="section-padding city-links-section" style="background: #FFF8F0;">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-label"><i class="fas fa-city"></i> <?php echo __t('City Guides', 'शहर गाइड'); ?></span>
            <h2 class="section-title"><?php echo __t('Ayodhya Travel from Your City', 'आपके शहर से अयोध्या यात्रा'); ?></h2>
            <p class="section-subtitle"><?php echo __t('Complete travel guide from 100+ cities of India', '100+ भारतीय शहरों से यात्रा गाइड'); ?></p>
        </div>
        
        <div class="city-tags-cloud">
            <?php
            $popularCities = [
                ['Delhi', 'दिल्ली', 'ayodhya-delhi'],
                ['Mumbai', 'मुंबई', 'ayodhya-mumbai'],
                ['Lucknow', 'लखनऊ', 'ayodhya-lucknow'],
                ['Varanasi', 'वाराणसी', 'ayodhya-varanasi'],
                ['Patna', 'पटना', 'ayodhya-patna'],
                ['Kolkata', 'कोलकाता', 'ayodhya-kolkata'],
                ['Jaipur', 'जयपुर', 'ayodhya-jaipur'],
                ['Ahmedabad', 'अहमदाबाद', 'ayodhya-ahmedabad'],
                ['Allahabad', 'प्रयागराज', 'ayodhya-prayagraj'],
                ['Gorakhpur', 'गोरखपुर', 'ayodhya-gorakhpur'],
                ['Mathura', 'मथुरा', 'ayodhya-mathura'],
                ['Haridwar', 'हरिद्वार', 'ayodhya-haridwar'],
                ['Kanpur', 'कानपुर', 'ayodhya-kanpur'],
                ['Agra', 'आगरा', 'ayodhya-agra'],
                ['Pune', 'पुणे', 'ayodhya-pune'],
                ['Hyderabad', 'हैदराबाद', 'ayodhya-hyderabad'],
                ['Bangalore', 'बेंगलुरू', 'ayodhya-bangalore'],
                ['Chennai', 'चेन्नई', 'ayodhya-chennai'],
                ['Chandigarh', 'चंडीगढ़', 'ayodhya-chandigarh'],
                ['Dehradun', 'देहरादून', 'ayodhya-dehradun'],
                ['Bhopal', 'भोपाल', 'ayodhya-bhopal'],
                ['Indore', 'इंदौर', 'ayodhya-indore'],
                ['Surat', 'सूरत', 'ayodhya-surat'],
                ['Nagpur', 'नागपुर', 'ayodhya-nagpur'],
                ['Ranchi', 'रांची', 'ayodhya-ranchi'],
                ['Ujjain', 'उज्जैन', 'ayodhya-ujjain'],
                ['Amritsar', 'अमृतसर', 'ayodhya-amritsar'],
                ['Guwahati', 'गुवाहाटी', 'ayodhya-guwahati'],
                ['Jammu', 'जम्मू', 'ayodhya-jammu'],
                ['Faizabad', 'फैजाबाद', 'ayodhya-faizabad'],
            ];
            foreach ($popularCities as $city):
            ?>
            <a href="city.php?slug=<?php echo $city[2]; ?>" class="city-tag">
                <?php echo $lang === 'hi' ? $city[1] : $city[0]; ?>
            </a>
            <?php endforeach; ?>
            <a href="city.php" class="city-tag city-tag-more">
                +70 <?php echo __t('More Cities', 'और शहर'); ?>
            </a>
        </div>
    </div>
</section>

<!-- ====== 14 VARSH VANVAS SECTION ====== -->
<section class="section-padding" style="background: linear-gradient(135deg, #0D2B0D 0%, #1A4A1A 100%);">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <span class="section-label" style="color:#a8d5a8; background:rgba(168,213,168,0.1);"><i class="fas fa-tree"></i> 🌿 <?php echo __t('14 Varsh Vanvas', '14 वर्ष वनवास'); ?></span>
                <h2 style="color:#fff; font-size:clamp(1.5rem,4vw,2.5rem); font-weight:800; margin-bottom:20px; font-family:'Noto Serif Devanagari',serif;">
                    <?php echo __t('Ram Ka 14 Varsh Vanvas - Sampoorna Yatra', 'राम का 14 वर्ष वनवास - सम्पूर्ण यात्रा'); ?>
                </h2>
                <p style="color:#a8d5a8; line-height:1.9; margin-bottom:20px;">
                    <?php echo __t('When Queen Kaikeyi demanded Ram\'s exile, the ideal son accepted with a smile. For 14 years, Ram, Sita, and Lakshman traversed the forests of India - from Ayodhya to Lanka. This journey includes Sita Haran, Hanuman Milan, Lanka Dahan, Ram Setu, Ravan Vadh, and the glorious return that became Diwali.', 'जब रानी कैकेयी ने वनवास मांगा, आदर्श पुत्र ने मुस्कुराते हुए स्वीकार किया। 14 वर्ष तक राम, सीता, लक्ष्मण भारत के वनों में भ्रमण किए। इस यात्रा में सीता हरण, हनुमान मिलन, लंका दहन, राम सेतु, रावण वध और वह गौरवशाली वापसी शामिल है जो दीवाली बनी।'); ?>
                </p>
                <div class="row g-3 mb-4">
                    <?php
                    $vstops = [
                        ['🏙️', 'Ayodhya', 'अयोध्या'],
                        ['🏔️', 'Chitrakoot', 'चित्रकूट'],
                        ['🌿', 'Panchvati', 'पंचवटी'],
                        ['🐒', 'Kishkindha', 'किष्किंधा'],
                        ['🌊', 'Rameshwaram', 'रामेश्वरम'],
                        ['⚔️', 'Lanka', 'लंका'],
                    ];
                    foreach ($vstops as $vs):
                    ?>
                    <div class="col-4">
                        <div style="background:rgba(168,213,168,0.1); border:1px solid rgba(168,213,168,0.2); border-radius:10px; padding:10px; text-align:center;">
                            <div style="font-size:1.5rem;"><?php echo $vs[0]; ?></div>
                            <div style="color:#a8d5a8; font-size:0.8rem; font-weight:600;"><?php echo $lang === 'hi' ? $vs[2] : $vs[1]; ?></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <a href="<?php echo SITE_URL; ?>/ram-vanvas-14-varsh" class="btn-hero btn-hero-primary">
                    <i class="fas fa-tree"></i> <?php echo __t('Read Complete Vanvas Story', 'पूरी वनवास यात्रा पढ़ें'); ?>
                </a>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div style="position:relative; border-radius:20px; overflow:hidden; box-shadow:0 20px 50px rgba(0,0,0,0.4);">
                    <img src="<?php echo assetUrl('images/shree-ram.jpg'); ?>" alt="Shri Ram 14 Varsh Vanvas" class="img-fluid w-100" style="border-radius:20px; max-height:450px; object-fit:cover;">
                    <div style="position:absolute; top:15px; right:15px; background:rgba(45,122,45,0.9); color:#fff; padding:10px 20px; border-radius:25px; font-weight:700;">
                        14 <?php echo __t('Years', 'वर्ष'); ?> | 12+ <?php echo __t('Stops', 'पड़ाव'); ?>
                    </div>
                    <div style="position:absolute; bottom:0; left:0; right:0; background:linear-gradient(to top, rgba(13,43,13,0.95), transparent); padding:30px 25px 25px;">
                        <p style="color:#a8d5a8; font-size:1rem; margin:0; font-style:italic;">"<?php echo __t('Pran Jaye Par Vachan Na Jaye - Raghukul Reet', 'प्राण जाए पर वचन न जाए - रघुकुल रीत'); ?>"</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ====== DIWALI SECTION ====== -->
<section class="section-padding" style="background: linear-gradient(135deg, #1A0000 0%, #3D0A00 100%); position:relative; overflow:hidden;">
    <div style="position:absolute; top:0; left:0; right:0; bottom:0; background:radial-gradient(circle at 50% 100%, rgba(255,100,0,0.15) 0%, transparent 70%);"></div>
    <div class="container" style="position:relative;z-index:2;">
        <div class="row align-items-center g-5">
            <div class="col-lg-5" data-aos="fade-right">
                <div style="text-align:center; padding:40px; background:rgba(255,255,255,0.04); border-radius:20px; border:1px solid rgba(255,140,0,0.2);">
                    <div style="font-size:90px; line-height:1; margin-bottom:20px; filter:drop-shadow(0 0 25px orange);">🪔</div>
                    <div class="row g-3">
                        <?php
                        $diwalifacts = [
                            ['🏆', 'Guinness Record', 'गिनीज रिकॉर्ड', '22.23 Lakh Diyas', '22.23 लाख दीये'],
                            ['👥', 'Visitors', 'दर्शनार्थी', '50+ Lakh', '50+ लाख'],
                            ['🌊', 'Saryu River', 'सरयू नदी', 'Grand Aarti', 'भव्य आरती'],
                            ['🎆', 'Fireworks', 'आतिशबाजी', 'Spectacular', 'शानदार'],
                        ];
                        foreach ($diwalifacts as $df):
                        ?>
                        <div class="col-6">
                            <div style="background:rgba(255,255,255,0.06); border-radius:12px; padding:15px; text-align:center;">
                                <div style="font-size:1.8rem;"><?php echo $df[0]; ?></div>
                                <div style="color:#FFD700; font-size:0.8rem; font-weight:600;"><?php echo $lang === 'hi' ? $df[2] : $df[1]; ?></div>
                                <div style="color:#FFD48A; font-size:0.75rem;"><?php echo $lang === 'hi' ? $df[4] : $df[3]; ?></div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <span class="section-label text-warning"><i class="fas fa-fire-flame-curved"></i> 🪔 <?php echo __t('Diwali & Deepotsav', 'दीवाली और दीपोत्सव'); ?></span>
                <h2 style="color:#fff; font-size:clamp(1.5rem,4vw,2.5rem); font-weight:800; margin-bottom:20px; font-family:'Noto Serif Devanagari',serif;">
                    <?php echo __t('Diwali - Ram\'s Return & Ayodhya Deepotsav Guide', 'दीवाली - राम की वापसी और अयोध्या दीपोत्सव गाइड'); ?>
                </h2>
                <p style="color:#FFD48A; line-height:1.9; margin-bottom:20px;">
                    <?php echo __t('Diwali (Deepawali) celebrates the return of Lord Ram to Ayodhya after 14 years of exile on the night of Kartik Amavasya. The people lit thousands of diyas - and that tradition became Diwali. Today, Ayodhya Deepotsav is the world\'s largest Diwali celebration, breaking Guinness World Records every year with millions of diyas on Saryu river banks.', 'दीवाली (दीपावली) कार्तिक अमावस्या की रात 14 वर्ष के वनवास के बाद भगवान राम की अयोध्या वापसी का उत्सव है। लोगों ने हजारों दीये जलाए - और वह परंपरा दीवाली बनी। आज, अयोध्या दीपोत्सव दुनिया का सबसे बड़ा दीवाली उत्सव है।'); ?>
                </p>
                <div style="display:flex; gap:10px; flex-wrap:wrap; margin-bottom:25px;">
                    <?php
                    $diwalitags = [
                        ['🕯️', 'Why Diwali is Celebrated', 'दीवाली क्यों मनाई जाती है'],
                        ['🌊', 'Deepotsav Guinness Records', 'दीपोत्सव गिनीज रिकॉर्ड'],
                        ['🗺️', 'How to Attend Deepotsav', 'दीपोत्सव कैसे जाएं'],
                        ['🏛️', '5 Day Diwali Guide', '5 दिन दीवाली गाइड'],
                    ];
                    foreach ($diwalitags as $dt):
                    ?>
                    <span style="background:rgba(255,140,0,0.15); border:1px solid rgba(255,140,0,0.3); color:#FFD48A; padding:6px 14px; border-radius:20px; font-size:0.85rem;"><?php echo $dt[0]; ?> <?php echo $lang === 'hi' ? $dt[2] : $dt[1]; ?></span>
                    <?php endforeach; ?>
                </div>
                <a href="<?php echo SITE_URL; ?>/diwali-ayodhya-deepotsav" class="btn-hero btn-hero-primary">
                    🪔 <?php echo __t('Complete Diwali & Deepotsav Guide', 'पूरी दीवाली और दीपोत्सव गाइड'); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ====== ADSENSE / DONATION CTA ====== -->
<section class="section-padding donation-cta" style="background: linear-gradient(135deg, #F55900, #FF8237);">
    <div class="container text-center">
        <div data-aos="zoom-in">
            <h2 class="text-white display-5 mb-3">🙏 <?php echo __t('Support Ram Mandir Mission', 'राम मंदिर मिशन को सहयोग करें'); ?></h2>
            <p class="text-white lead mb-4"><?php echo __t('Help us spread the divine message of Shri Ram across India and the world.', 'श्री राम का दिव्य संदेश पूरे भारत और दुनिया में फैलाने में हमारी मदद करें।'); ?></p>
            <div class="d-flex gap-3 justify-content-center flex-wrap">
                <a href="donation.php" class="btn btn-light btn-lg px-5 py-3 fw-bold">
                    <i class="fas fa-hand-holding-heart"></i> <?php echo __t('Donate Now', 'अभी दान करें'); ?>
                </a>
                <a href="contact.php" class="btn btn-outline-light btn-lg px-5 py-3">
                    <i class="fas fa-envelope"></i> <?php echo __t('Contact Us', 'संपर्क करें'); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

<script>
// Hero Slider
let currentSlide = 0;
const slides = document.querySelectorAll('.hero-slide');
const dots = document.querySelectorAll('.slider-dot');
const thumbs = document.querySelectorAll('.slide-thumb');
let autoSlideInterval;

function heroSliderGo(index) {
    slides[currentSlide].classList.remove('active');
    dots[currentSlide]?.classList.remove('active');
    thumbs[currentSlide]?.classList.remove('active');
    
    // Pause video on previous slide
    const prevVideo = slides[currentSlide].querySelector('video');
    if (prevVideo) prevVideo.pause();
    
    currentSlide = index;
    slides[currentSlide].classList.add('active');
    dots[currentSlide]?.classList.add('active');
    thumbs[currentSlide]?.classList.add('active');
    
    // Autoplay video on current slide
    const video = slides[currentSlide].querySelector('video');
    if (video) video.play().catch(() => {});
}

function heroSliderNext() {
    heroSliderGo((currentSlide + 1) % slides.length);
    resetAutoSlide();
}

function heroSliderPrev() {
    heroSliderGo((currentSlide - 1 + slides.length) % slides.length);
    resetAutoSlide();
}

function resetAutoSlide() {
    clearInterval(autoSlideInterval);
    autoSlideInterval = setInterval(heroSliderNext, 4000);
}

// Start auto-slide
if (slides.length > 1) {
    autoSlideInterval = setInterval(heroSliderNext, 4000);
}

// Particle animation
(function() {
    const canvas = document.getElementById('particles-canvas');
    if (!canvas) return;
    const ctx = canvas.getContext('2d');
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    
    const particles = Array.from({length: 60}, () => ({
        x: Math.random() * canvas.width,
        y: Math.random() * canvas.height,
        r: Math.random() * 3 + 1,
        vx: (Math.random() - 0.5) * 0.5,
        vy: -Math.random() * 0.8 - 0.3,
        alpha: Math.random() * 0.7 + 0.2,
        color: ['#FFD700', '#FF8237', '#F55900', '#FFE066'][Math.floor(Math.random() * 4)]
    }));
    
    function animate() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        particles.forEach(p => {
            p.x += p.vx;
            p.y += p.vy;
            if (p.y < 0) { p.y = canvas.height; p.x = Math.random() * canvas.width; }
            ctx.beginPath();
            ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
            ctx.fillStyle = p.color;
            ctx.globalAlpha = p.alpha;
            ctx.fill();
        });
        ctx.globalAlpha = 1;
        requestAnimationFrame(animate);
    }
    animate();
    
    window.addEventListener('resize', () => {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    });
})();

// Counter animation
function animateCounters() {
    document.querySelectorAll('[data-target]').forEach(el => {
        const target = parseInt(el.dataset.target);
        let count = 0;
        const step = Math.ceil(target / 60);
        const timer = setInterval(() => {
            count = Math.min(count + step, target);
            el.textContent = count.toLocaleString('en-IN');
            if (count >= target) clearInterval(timer);
        }, 20);
    });
}

// Intersection Observer for counters
const counterSection = document.querySelector('.mandir-stats');
if (counterSection) {
    new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) { animateCounters(); }
        });
    }, {threshold: 0.5}).observe(counterSection);
}

// File upload preview
const fileInput = document.getElementById('mediaFile');
const uploadArea = document.getElementById('fileUploadArea');
const preview = document.getElementById('uploadPreview');

if (fileInput) {
    uploadArea.addEventListener('click', () => fileInput.click());
    uploadArea.addEventListener('dragover', e => { e.preventDefault(); uploadArea.classList.add('dragover'); });
    uploadArea.addEventListener('dragleave', () => uploadArea.classList.remove('dragover'));
    uploadArea.addEventListener('drop', e => {
        e.preventDefault();
        uploadArea.classList.remove('dragover');
        if (e.dataTransfer.files.length) { fileInput.files = e.dataTransfer.files; handleFilePreview(e.dataTransfer.files[0]); }
    });
    fileInput.addEventListener('change', () => {
        if (fileInput.files.length) handleFilePreview(fileInput.files[0]);
    });
}

function handleFilePreview(file) {
    if (!preview) return;
    preview.innerHTML = '';
    const url = URL.createObjectURL(file);
    if (file.type.startsWith('video/')) {
        preview.innerHTML = `<video src="${url}" controls class="upload-preview-media"></video>`;
    } else {
        preview.innerHTML = `<img src="${url}" class="upload-preview-media" alt="preview">`;
    }
}

// Upload form submit
const uploadForm = document.getElementById('userUploadForm');
if (uploadForm) {
    uploadForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        const btn = this.querySelector('button[type="submit"]');
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> <?php echo __t('Uploading...', 'अपलोड हो रहा है...'); ?>';
        try {
            const res = await fetch('api/upload.php', {method:'POST', body: formData});
            const data = await res.json();
            if (data.success) {
                alert('<?php echo __t('Thank you! Your photo will be reviewed and published shortly.', 'धन्यवाद! आपकी तस्वीर समीक्षा के बाद प्रकाशित की जाएगी।'); ?>');
                uploadForm.reset();
                if (preview) preview.innerHTML = '';
            } else {
                alert(data.message || '<?php echo __t('Upload failed. Please try again.', 'अपलोड विफल। कृपया फिर से प्रयास करें।'); ?>');
            }
        } catch(err) {
            alert('<?php echo __t('Upload failed. Please try again.', 'अपलोड विफल। कृपया फिर से प्रयास करें।'); ?>');
        }
        btn.disabled = false;
        btn.innerHTML = '<i class="fas fa-upload"></i> <?php echo __t('Upload & Share', 'अपलोड करें और साझा करें'); ?>';
    });
}
</script>
