<?php
/**
 * Ayodhya Ram Mandir - City Page Template
 * 100+ city pages for Ayodhya travel guide
 */

require_once __DIR__ . '/includes/functions.php';
$lang = getCurrentLang();

$slug = trim($_GET['slug'] ?? '');

// If no slug, show all cities list
if (empty($slug)) {
    $allCities = dbFetchAll("SELECT * FROM city_pages WHERE status = 1 ORDER BY city_name");
    $pageTitle = __t('Ayodhya Travel Guide - City-wise Routes | AyodhyaRamMandir.in','अयोध्या यात्रा गाइड - शहरवार मार्ग');
    $pageType = 'city_list';
    $pageSlug = 'city-list';
    $pageSchema = json_encode(['@context'=>'https://schema.org','@type'=>'WebPage','name'=>$pageTitle,'url'=>SITE_URL.'/city.php'],JSON_UNESCAPED_SLASHES);
    $seo = ['title'=>$pageTitle,'description'=>'Complete travel guide from 100+ cities of India to Ayodhya Ram Mandir. Find distance, routes, trains, buses and stay options.','keywords'=>'Ayodhya travel guide, how to reach Ayodhya, city to Ayodhya'];
    include __DIR__ . '/includes/header.php';
    ?>
    <div class="page-hero">
        <div class="container text-center">
            <div class="breadcrumb-nav justify-content-center">
                <a href="<?php echo SITE_URL; ?>/"><i class="fas fa-home"></i> <?php echo __t('Home','होम'); ?></a>
                <span>›</span><span><?php echo __t('City Guides','शहर गाइड'); ?></span>
            </div>
            <h1 class="page-hero-title"><?php echo __t('🏙️ City-wise Ayodhya Travel Guide','🏙️ शहरवार अयोध्या यात्रा गाइड'); ?></h1>
            <p class="page-hero-subtitle"><?php echo __t('Complete travel guide from 100+ Indian cities to Ayodhya Ram Mandir','100+ भारतीय शहरों से अयोध्या राम मंदिर का संपूर्ण यात्रा गाइड'); ?></p>
        </div>
    </div>
    <section class="section-padding" style="background:#FFF8F0;">
        <div class="container">
            <div class="section-header text-center">
                <h2 class="section-title"><?php echo __t('Select Your City','अपना शहर चुनें'); ?></h2>
                <p class="section-subtitle"><?php echo __t('Click on your city to get complete travel guide to Ayodhya Ram Mandir','अयोध्या राम मंदिर का संपूर्ण यात्रा गाइड पाने के लिए अपना शहर क्लिक करें'); ?></p>
            </div>
            <div class="city-tags-cloud">
                <?php foreach($allCities as $city): 
                    $cityName = $lang === 'hi' ? ($city['city_name_hi'] ?? $city['city_name']) : $city['city_name'];
                ?>
                <a href="city.php?slug=<?php echo e($city['slug']); ?>" class="city-tag">
                    <?php echo e($cityName); ?>
                    <small style="opacity:.7;font-size:10px;display:block"><?php echo e($city['state']); ?></small>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php include __DIR__ . '/includes/footer.php'; ?>
    <?php return;
}

// Get specific city page
$city = dbFetch("SELECT * FROM city_pages WHERE slug = ? AND status = 1", [$slug]);

if (!$city) {
    header('HTTP/1.0 404 Not Found');
    $pageTitle = '404 - Page Not Found';
    $pageType = '404';
    $pageSlug = '404';
    include __DIR__ . '/includes/header.php';
    echo '<div class="container text-center py-5"><h1>404 - City page not found</h1><a href="city.php" class="btn-hero btn-hero-primary">All Cities</a></div>';
    include __DIR__ . '/includes/footer.php';
    exit;
}

$pageType = 'city';
$pageId = $city['id'];
$pageSlug = $slug;

$cityName = $lang === 'hi' ? ($city['city_name_hi'] ?? $city['city_name']) : $city['city_name'];
$cityContent = $lang === 'hi' ? ($city['content_hi'] ?? $city['content']) : $city['content'];
$pageTitle = $city['seo_title'] ?? "Ayodhya from {$city['city_name']} - Travel Guide | AyodhyaRamMandir.in";

$pageSchema = json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'TouristTrip',
    'name' => "Ayodhya Ram Mandir Trip from {$city['city_name']}",
    'description' => $city['seo_description'] ?? '',
    'url' => SITE_URL . '/city.php?slug=' . urlencode($slug),
    'touristType' => 'Religious Pilgrims',
    'itinerary' => [
        '@type' => 'ItemList',
        'name' => "Places to Visit in Ayodhya",
        'itemListElement' => [
            ['@type'=>'ListItem','position'=>1,'name'=>'Ram Janmabhoomi (Ram Mandir)'],
            ['@type'=>'ListItem','position'=>2,'name'=>'Hanumangarhi'],
            ['@type'=>'ListItem','position'=>3,'name'=>'Kanak Bhawan'],
            ['@type'=>'ListItem','position'=>4,'name'=>'Saryu Ghat'],
        ]
    ]
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

$seo = [
    'title' => $pageTitle,
    'description' => $city['seo_description'] ?? "Complete guide to travel from {$city['city_name']} to Ayodhya Ram Mandir - distance, train, bus, flight, hotels.",
    'keywords' => $city['seo_keywords'] ?? "Ayodhya from {$city['city_name']}, {$city['city_name']} to Ayodhya",
];

include __DIR__ . '/includes/header.php';
?>

<div class="city-page-hero">
    <div class="container text-center">
        <div class="breadcrumb-nav justify-content-center">
            <a href="<?php echo SITE_URL; ?>/"><i class="fas fa-home"></i> <?php echo __t('Home','होम'); ?></a>
            <span>›</span>
            <a href="city.php"><?php echo __t('City Guides','शहर गाइड'); ?></a>
            <span>›</span>
            <span><?php echo e($cityName); ?></span>
        </div>
        <h1 class="city-title">
            <i class="fas fa-map-location-dot" style="color:#FFD700"></i>
            <?php echo __t("Ayodhya from {$city['city_name']}", "{$cityName} से अयोध्या"); ?>
        </h1>
        <div class="city-meta">
            <span><i class="fas fa-map-marker-alt"></i> <?php echo e($city['state']); ?></span>
            <span><i class="fas fa-om"></i> <?php echo __t('Ram Mandir Travel Guide','राम मंदिर यात्रा गाइड'); ?></span>
            <span><i class="fas fa-train"></i> <?php echo __t('Ayodhya Dham Junction','अयोध्या धाम जंक्शन'); ?></span>
        </div>
    </div>
</div>

<section class="section-padding" style="background:#FFFEBC;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Quick Info Box -->
                <div class="quick-info-box mb-4" data-aos="fade-up">
                    <h3><i class="fas fa-info-circle"></i> <?php echo __t('Quick Travel Info','त्वरित यात्रा जानकारी'); ?></h3>
                    <div class="row g-3">
                        <div class="col-6 col-md-3">
                            <div class="info-stat">
                                <i class="fas fa-train"></i>
                                <span><?php echo __t('Train','ट्रेन'); ?></span>
                                <strong><?php echo __t('Available','उपलब्ध'); ?></strong>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="info-stat">
                                <i class="fas fa-bus"></i>
                                <span><?php echo __t('Bus','बस'); ?></span>
                                <strong><?php echo __t('Available','उपलब्ध'); ?></strong>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="info-stat">
                                <i class="fas fa-plane"></i>
                                <span><?php echo __t('Flight','फ्लाइट'); ?></span>
                                <strong>AYJ</strong>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="info-stat">
                                <i class="fas fa-clock"></i>
                                <span><?php echo __t('Darshan','दर्शन'); ?></span>
                                <strong>6AM-10PM</strong>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Main Content -->
                <div class="page-content" data-aos="fade-up">
                    <?php
                    $paragraphs = explode("\n\n", $cityContent);
                    $firstH2 = true;
                    foreach ($paragraphs as $para) {
                        $para = trim($para);
                        if (empty($para)) continue;
                        if (preg_match('/^(Distance|How to|Best Time|Stay|Places|Prasad|Important|Emergency|ट्रेन|सड़क|हवाई|राम मंदिर|रहने|घूमने|जरूरी|#{2,})/', $para)) {
                            // It's a heading
                            $lines = explode("\n", $para, 2);
                            echo '<h2 style="margin-top:30px">' . e($lines[0]) . '</h2>';
                            if (!empty($lines[1])) echo '<p>' . nl2br(e($lines[1])) . '</p>';
                        } else {
                            echo '<p>' . nl2br(e($para)) . '</p>';
                        }
                    }
                    ?>
                </div>
                
                <!-- Places to Visit Cards -->
                <div class="mt-5" data-aos="fade-up">
                    <h2><?php echo __t('Places to Visit in Ayodhya','अयोध्या में घूमने की जगहें'); ?></h2>
                    <div class="row g-3 mt-1">
                        <?php
                        $places = [
                            ['Ram Janmabhoomi', 'राम जन्मभूमि', 'fa-landmark', 'ram-mandir', '#F55900'],
                            ['Hanumangarhi', 'हनुमानगढ़ी', 'fa-fire-flame-curved', 'hanumangarhi', '#FF8237'],
                            ['Kanak Bhawan', 'कनक भवन', 'fa-crown', 'kanak-bhawan', '#FFAA6E'],
                            ['Saryu Ghat', 'सरयू घाट', 'fa-water', 'saryu-ghat', '#F55900'],
                            ['Ram Ki Paidi', 'राम की पैड़ी', 'fa-person-swimming', 'saryu-ghat', '#FF8237'],
                            ['Dashrath Mahal', 'दशरथ महल', 'fa-building-columns', 'ayodhya-guide', '#FFAA6E'],
                        ];
                        foreach ($places as $p): $pt = $lang === 'hi' ? $p[1] : $p[0]; ?>
                        <div class="col-6 col-md-4">
                            <a href="<?php echo pageUrl($p[3]); ?>" class="place-mini-card" style="--pc:<?php echo $p[4]; ?>">
                                <i class="fas <?php echo $p[2]; ?>"></i>
                                <span><?php echo e($pt); ?></span>
                                <i class="fas fa-arrow-right arrow"></i>
                            </a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <!-- Darshan Info Table -->
                <div class="mt-5" data-aos="fade-up">
                    <h2><?php echo __t('Ram Mandir Darshan Information','राम मंदिर दर्शन जानकारी'); ?></h2>
                    <table class="info-table">
                        <tr><th><?php echo __t('Timing','समय'); ?></th><th><?php echo __t('Session','सत्र'); ?></th></tr>
                        <tr><td>6:00 AM – 12:00 PM</td><td><?php echo __t('Morning Session','प्रातः सत्र'); ?></td></tr>
                        <tr><td>2:00 PM – 10:00 PM</td><td><?php echo __t('Evening Session','संध्या सत्र'); ?></td></tr>
                        <tr><td>4:00 AM</td><td><?php echo __t('Mangala Aarti (Special)','मंगला आरती (विशेष)'); ?></td></tr>
                        <tr><td>7:30 PM</td><td><?php echo __t('Sandhya Aarti','संध्या आरती'); ?></td></tr>
                    </table>
                </div>
                
                <!-- SEO content for 2500+ words -->
                <div class="mt-4 page-content" data-aos="fade-up">
                    <h2><?php echo __t("Why Visit Ayodhya Ram Mandir from {$city['city_name']}", "{$cityName} से अयोध्या राम मंदिर क्यों जाएं"); ?></h2>
                    <p><?php echo __t(
                        "Ayodhya Ram Mandir is the most sacred pilgrimage destination for Hindus worldwide. The grand temple, consecrated on 22 January 2024, is located at the exact birthplace of Lord Ram (Ram Janmabhoomi). Visiting this divine place is considered the highest form of religious merit (punya) in Hindu tradition.",
                        "अयोध्या राम मंदिर दुनिया भर के हिंदुओं के लिए सबसे पवित्र तीर्थस्थल है। 22 जनवरी 2024 को प्राण प्रतिष्ठित यह भव्य मंदिर भगवान राम के जन्मस्थान (राम जन्मभूमि) पर स्थित है।"
                    ); ?></p>
                    
                    <h2><?php echo __t('About Ayodhya Ram Mandir','अयोध्या राम मंदिर के बारे में'); ?></h2>
                    <p><?php echo __t(
                        "The Shri Ram Janmabhoomi Mandir is built in Nagara style of Hindu temple architecture. The temple is 380 feet long, 250 feet wide, and 161 feet high. It has 392 pillars and 44 doors. The temple complex spans 70 acres and can accommodate thousands of pilgrims at a time. The main deity is Ram Lalla - the child form of Lord Ram, a 51-inch idol carved by Arun Yogiraj.",
                        "श्री राम जन्मभूमि मंदिर हिंदू मंदिर वास्तुकला की नागर शैली में बना है। मंदिर 380 फीट लंबा, 250 फीट चौड़ा और 161 फीट ऊंचा है। इसमें 392 खंभे और 44 द्वार हैं।"
                    ); ?></p>
                    
                    <h2><?php echo __t('Best Time to Visit','जाने का सबसे अच्छा समय'); ?></h2>
                    <p><?php echo __t(
                        "The best time to visit Ayodhya from " . $city['city_name'] . " is October to March when the weather is pleasant. Special occasions like Ram Navami (March/April), Diwali Deepotsav (October/November), and Kartik Purnima offer unforgettable spiritual experiences.",
                        $cityName . " से अयोध्या जाने का सबसे अच्छा समय अक्टूबर से मार्च है जब मौसम सुहावना होता है। राम नवमी, दीपावली दीपोत्सव और कार्तिक पूर्णिमा पर विशेष दर्शन होते हैं।"
                    ); ?></p>
                    
                    <h2><?php echo __t('Accommodation Near Ram Mandir','राम मंदिर के पास आवास'); ?></h2>
                    <p><?php echo __t(
                        "Ayodhya offers accommodation for all budgets - from free dharamshalas to luxury hotels. The most economical option is dharamshalas which offer free or very affordable rooms (Rs. 50-300 per night). Budget hotels are available from Rs. 500-1500 per night. Luxury hotels from Rs. 3000+ per night are also available near Ram Mandir.",
                        "अयोध्या में सभी बजट के लिए आवास उपलब्ध है - मुफ्त धर्मशालाओं से लेकर लग्जरी होटल तक। धर्मशालाएं मुफ्त या बहुत सस्ती (₹50-300/रात) में उपलब्ध हैं। बजट होटल ₹500-1500/रात में मिलते हैं।"
                    ); ?></p>
                    
                    <h2><?php echo __t('Complete Ayodhya Itinerary','संपूर्ण अयोध्या यात्रा कार्यक्रम'); ?></h2>
                    <p><?php echo __t(
                        "Day 1: Arrive in Ayodhya, check-in to hotel/dharamshala, visit Hanumangarhi (first, as per tradition), then Ram Mandir for evening darshan and Sandhya Aarti. Day 2: Morning Mangala Aarti at Ram Mandir, visit Kanak Bhawan, Saryu Ghat, Ram Ki Paidi, Dashrath Mahal. Evening at Saryu Aarti. Day 3: Visit remaining temples, shopping in market, departure.",
                        "दिन 1: अयोध्या पहुंचें, होटल/धर्मशाला में चेक-इन, पहले हनुमानगढ़ी फिर राम मंदिर दर्शन और संध्या आरती। दिन 2: सुबह मंगला आरती, कनक भवन, सरयू घाट, राम की पैड़ी, दशरथ महल। संध्या सरयू आरती। दिन 3: शेष मंदिर दर्शन, बाजार में खरीदारी, प्रस्थान।"
                    ); ?></p>
                    
                    <h2><?php echo __t('Emergency Contacts','आपातकालीन संपर्क'); ?></h2>
                    <p><?php echo __t(
                        "Police: 112 | Tourist Helpline: 1800-180-5522 | Ayodhya Railway Station: 0527-2323081 | UP Tourism: 0522-2226211 | Maharishi Valmiki Airport: 05278-254001",
                        "पुलिस: 112 | पर्यटक हेल्पलाइन: 1800-180-5522 | अयोध्या रेलवे स्टेशन: 0527-2323081 | UP पर्यटन: 0522-2226211"
                    ); ?></p>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar">
                    <!-- Quick Links -->
                    <div class="sidebar-widget">
                        <h3 class="sidebar-title"><i class="fas fa-link"></i> <?php echo __t('Quick Links','त्वरित लिंक'); ?></h3>
                        <ul class="sidebar-links">
                            <li><a href="<?php echo pageUrl('ram-mandir'); ?>"><i class="fas fa-landmark"></i> <?php echo __t('Ram Mandir','राम मंदिर'); ?></a></li>
                            <li><a href="<?php echo pageUrl('hanumangarhi'); ?>"><i class="fas fa-fire"></i> <?php echo __t('Hanumangarhi','हनुमानगढ़ी'); ?></a></li>
                            <li><a href="<?php echo pageUrl('dharamshala-ayodhya'); ?>"><i class="fas fa-hotel"></i> <?php echo __t('Dharamshala','धर्मशाला'); ?></a></li>
                            <li><a href="<?php echo pageUrl('ayodhya-guide'); ?>"><i class="fas fa-map"></i> <?php echo __t('Ayodhya Guide','अयोध्या गाइड'); ?></a></li>
                            <li><a href="<?php echo pageUrl('ramayan'); ?>"><i class="fas fa-book-open"></i> <?php echo __t('Ramayan','रामायण'); ?></a></li>
                            <li><a href="<?php echo pageUrl('live-aarti'); ?>"><i class="fas fa-om"></i> <?php echo __t('Live Aarti','लाइव आरती'); ?></a></li>
                        </ul>
                    </div>
                    
                    <!-- Nearby Cities -->
                    <div class="sidebar-widget">
                        <h3 class="sidebar-title"><i class="fas fa-city"></i> <?php echo __t('Nearby Cities','नजदीकी शहर'); ?></h3>
                        <div class="city-tags-cloud" style="justify-content:flex-start">
                            <?php
                            $nearbyCities = dbFetchAll("SELECT * FROM city_pages WHERE slug != ? AND status = 1 ORDER BY RAND() LIMIT 8", [$slug]);
                            foreach ($nearbyCities as $nc):
                                $ncName = $lang === 'hi' ? ($nc['city_name_hi'] ?? $nc['city_name']) : $nc['city_name'];
                            ?>
                            <a href="city.php?slug=<?php echo e($nc['slug']); ?>" class="city-tag" style="font-size:12px;padding:5px 12px"><?php echo e($ncName); ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                    <!-- Donation Widget -->
                    <div class="sidebar-widget text-center" style="background:linear-gradient(135deg,#F55900,#FF8237);color:#fff;">
                        <i class="fas fa-hand-holding-heart fa-2x mb-3"></i>
                        <h4 style="color:#fff"><?php echo __t('Support Ram Mandir','राम मंदिर को सहयोग'); ?></h4>
                        <p style="color:rgba(255,255,255,.9);font-size:13px"><?php echo __t('Help spread Ram Bhakti','राम भक्ति फैलाने में सहयोग करें'); ?></p>
                        <a href="donation.php" class="btn btn-light btn-sm mt-2 fw-bold"><?php echo __t('Donate','दान करें'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- More Cities -->
<section class="section-padding" style="background:#fff;">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="section-title"><?php echo __t('Ayodhya from Other Cities','अन्य शहरों से अयोध्या'); ?></h2>
        </div>
        <div class="city-tags-cloud">
            <?php
            $moreCities = dbFetchAll("SELECT * FROM city_pages WHERE slug != ? AND status = 1 ORDER BY city_name LIMIT 30", [$slug]);
            foreach ($moreCities as $mc):
                $mcName = $lang === 'hi' ? ($mc['city_name_hi'] ?? $mc['city_name']) : $mc['city_name'];
            ?>
            <a href="city.php?slug=<?php echo e($mc['slug']); ?>" class="city-tag"><?php echo e($mcName); ?></a>
            <?php endforeach; ?>
            <a href="city.php" class="city-tag city-tag-more"><?php echo __t('All Cities','सभी शहर'); ?> →</a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
<style>
.quick-info-box{background:#fff;border-radius:20px;padding:24px;box-shadow:0 5px 25px rgba(245,89,0,.08);border:1px solid rgba(245,89,0,.1)}.quick-info-box h3{font-size:18px;font-weight:800;color:#F55900;margin-bottom:16px}.info-stat{text-align:center;background:#FFF8F0;border-radius:14px;padding:16px;border:1px solid rgba(245,89,0,.1)}.info-stat i{font-size:24px;color:#F55900;display:block;margin-bottom:6px}.info-stat span{font-size:12px;color:#666;display:block}.info-stat strong{font-size:14px;color:#1A1A1A;font-weight:700}.place-mini-card{display:flex;align-items:center;gap:10px;background:#fff;border:1.5px solid rgba(245,89,0,.15);border-radius:12px;padding:12px;text-decoration:none;color:#333;font-size:13px;font-weight:600;transition:all .3s}.place-mini-card i{color:var(--pc,#F55900);font-size:18px}.place-mini-card:hover{background:var(--pc,#F55900);color:#fff;border-color:transparent;transform:translateY(-2px)}.place-mini-card:hover i{color:#fff}.place-mini-card .arrow{margin-left:auto;font-size:11px}
</style>
