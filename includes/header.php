<?php
/**
 * Ayodhya Ram Mandir - Frontend Header Template
 */

require_once __DIR__ . '/functions.php';

trackPageView($pageType ?? 'page', $pageId ?? 0, $pageSlug ?? '');
$seo = getSeoMeta($pageType ?? 'page', $pageId ?? 0, $pageSlug ?? '');
$lang = getCurrentLang();
$marqueeItems = getMarqueeAnnouncements();
$mainMenu = getMenuTree('main');

$siteName = getSetting('site_name', 'AyodhyaRamMandir.in');
$siteTagline = getSetting('site_tagline', 'जय श्री राम');
$siteLogo = getSetting('site_logo', 'assets/images/logo.png');
$siteFavicon = getSetting('site_favicon', 'assets/images/logo.png');

$organizationSchema = json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => 'AyodhyaRamMandir.in',
    'url' => SITE_URL,
    'logo' => SITE_URL . '/' . $siteLogo,
    'description' => 'Complete Digital Guide to Shri Ram, Ramayan & Ayodhya',
    'address' => [
        '@type' => 'PostalAddress',
        'streetAddress' => 'Ayodhya Dham',
        'addressLocality' => 'Ayodhya',
        'addressRegion' => 'Uttar Pradesh',
        'postalCode' => '224123',
        'addressCountry' => 'IN'
    ],
    'contactPoint' => [
        '@type' => 'ContactPoint',
        'telephone' => '+91-8168877332',
        'email' => 'info@ayodhyarammandir.in',
        'contactType' => 'customer support',
        'availableLanguage' => ['Hindi', 'English']
    ],
    'sameAs' => array_filter([
        getSetting('social_facebook', ''),
        getSetting('social_instagram', ''),
        getSetting('social_youtube', ''),
    ])
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

// Build nav menu with hardcoded fallback
if (empty($mainMenu)) {
    $mainMenu = [
        ['title' => 'Home', 'title_hi' => 'होम', 'url' => '/', 'page_slug' => '', 'icon_class' => 'fas fa-home', 'children' => [], 'mega_menu' => 0],
        ['title' => 'Ram Mandir', 'title_hi' => 'राम मंदिर', 'url' => '', 'page_slug' => 'ram-mandir', 'icon_class' => 'fas fa-landmark', 'children' => [], 'mega_menu' => 0],
        ['title' => 'Ramayan', 'title_hi' => 'रामायण', 'url' => '', 'page_slug' => 'ramayan', 'icon_class' => 'fas fa-book-open', 'children' => [], 'mega_menu' => 0],
        ['title' => 'Ayodhya Guide', 'title_hi' => 'अयोध्या गाइड', 'url' => '', 'page_slug' => 'ayodhya-guide', 'icon_class' => 'fas fa-map-location-dot', 'children' => [
            ['title' => 'Hanumangarhi', 'title_hi' => 'हनुमानगढ़ी', 'url' => '', 'page_slug' => 'hanumangarhi', 'icon_class' => 'fas fa-fire', 'mega_menu' => 0],
            ['title' => 'Kanak Bhawan', 'title_hi' => 'कनक भवन', 'url' => '', 'page_slug' => 'kanak-bhawan', 'icon_class' => 'fas fa-crown', 'mega_menu' => 0],
            ['title' => 'Saryu Ghat', 'title_hi' => 'सरयू घाट', 'url' => '', 'page_slug' => 'saryu-ghat', 'icon_class' => 'fas fa-water', 'mega_menu' => 0],
            ['title' => 'Dharamshala', 'title_hi' => 'धर्मशाला', 'url' => '', 'page_slug' => 'dharamshala-ayodhya', 'icon_class' => 'fas fa-hotel', 'mega_menu' => 0],
        ], 'mega_menu' => 0],
        ['title' => 'Gallery', 'title_hi' => 'गैलरी', 'url' => '/gallery.php', 'page_slug' => '', 'icon_class' => 'fas fa-images', 'children' => [], 'mega_menu' => 0],
        ['title' => 'City Guides', 'title_hi' => 'शहर गाइड', 'url' => '/city.php', 'page_slug' => '', 'icon_class' => 'fas fa-city', 'children' => [], 'mega_menu' => 0],
    ];
}
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    google-site-verification=5oe3HWQ5qn_jvgrBTCHr72BJyk1HxzBiqFyGWVG-iks
    <?php echo renderSeoMeta($seo); ?>
    
    <link rel="icon" type="image/png" href="<?php echo SITE_URL . '/' . $siteFavicon; ?>">
    <link rel="apple-touch-icon" href="<?php echo SITE_URL . '/' . $siteLogo; ?>">
    <link rel="canonical" href="<?php echo SITE_URL . $_SERVER['REQUEST_URI']; ?>">
    
    <!-- Open Graph -->
    <meta property="og:site_name" content="AyodhyaRamMandir.in">
    <meta property="og:locale" content="<?php echo $lang === 'hi' ? 'hi_IN' : 'en_IN'; ?>">
    <meta property="og:image" content="<?php echo SITE_URL; ?>/assets/images/og-image.jpg">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@ayodhyarammandir">
    
    <!-- Preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;800;900&family=Inter:wght@300;400;500;600;700&family=Noto+Sans+Devanagari:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,700;0,900;1,700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- AOS Animations -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo assetUrl('css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo assetUrl('css/hero-new.css'); ?>">
    
    <!-- Schema Markup -->
    <script type="application/ld+json"><?php echo $organizationSchema; ?></script>
    <?php if (!empty($pageSchema)): ?>
    <script type="application/ld+json"><?php echo $pageSchema; ?></script>
    <?php endif; ?>
    
     <!-- Google AdSense global loader.
          Set the real ca-pub-* value in the adsense_client setting to enable it.
          Keeping this in the shared header loads it once on every frontend page. -->
     <?php $adsenseClient = trim((string) getSetting('adsense_client', '')); ?>
     <?php if ($adsenseClient !== '' && preg_match('/^ca-pub-\d+$/', $adsenseClient)): ?>
     <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=<?php echo e($adsenseClient); ?>" crossorigin="anonymous"></script>
     <?php endif; ?>
    
    <?php if ($ga = getSetting('google_analytics')): ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo e($ga); ?>"></script>
    <script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','<?php echo e($ga); ?>');</script>
    <?php endif; ?>
    
    <style>
    .navbar-brand img.logo-img { height: 55px; width: auto; object-fit: contain; }
    .brand-text { display: flex; flex-direction: column; line-height: 1.2; }
    .brand-name { font-family: 'Cinzel', serif; font-size: 16px; font-weight: 800; color: #fff; }
    .brand-tagline { font-size: 10px; color: rgba(255,255,255,0.75); }
    .main-header { background: linear-gradient(135deg, #1A0500 0%, #3D1A00 100%); box-shadow: 0 4px 30px rgba(0,0,0,0.3); position: sticky; top: 0; z-index: 1000; }
    .main-header.scrolled { background: rgba(26,5,0,0.97); backdrop-filter: blur(20px); }
    .nav-link { color: rgba(255,255,255,0.85) !important; font-weight: 600; font-size: 14px; padding: 8px 14px !important; border-radius: 8px; transition: all 0.3s; }
    .nav-link:hover, .nav-link.active { color: #FFD700 !important; background: rgba(255,215,0,0.1); }
    .navbar-toggler { border-color: rgba(255,215,0,0.3); }
    .navbar-toggler-icon { filter: invert(1); }
    .top-bar { background: linear-gradient(90deg, #F55900, #FF8237); color: #fff; padding: 6px 0; font-size: 13px; }
    .top-bar a { color: rgba(255,255,255,0.9); margin-right: 20px; text-decoration: none; }
    .top-bar a:hover { color: #fff; }
    .lang-switch { background: rgba(255,255,255,0.15); padding: 2px 10px; border-radius: 10px; margin-left: 8px; font-size: 12px; }
    .lang-switch.active { background: rgba(255,255,255,0.3); font-weight: 700; }
    .dropdown-menu { background: #1A0500; border: 1px solid rgba(255,215,0,0.15); border-radius: 16px; min-width: 220px; padding: 10px; }
    .dropdown-menu a { color: rgba(255,255,255,0.85); padding: 8px 14px; border-radius: 8px; display: flex; align-items: center; gap: 8px; font-size: 14px; text-decoration: none; }
    .dropdown-menu a:hover { background: rgba(255,215,0,0.1); color: #FFD700; }
    .dropdown-menu a i { color: #F55900; width: 16px; }
    .reading-progress-bar { position: fixed; top: 0; left: 0; height: 3px; background: linear-gradient(90deg, #F55900, #FFD700); z-index: 99999; width: 0%; transition: width 0.1s; }
    </style>
</head>
<body class="lang-<?php echo $lang; ?>">
    
    <div class="reading-progress-bar" id="readingProgress"></div>
    
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <a href="tel:+918168877332"><i class="fas fa-phone"></i> +91-8168877332</a>
                    <a href="mailto:info@ayodhyarammandir.in"><i class="fas fa-envelope"></i> info@ayodhyarammandir.in</a>
                </div>
                <div class="col-md-6 text-end">
                    <a href="<?php echo switchLangUrl('hi'); ?>" class="lang-switch <?php echo $lang === 'hi' ? 'active' : ''; ?>">हिंदी</a>
                    <a href="<?php echo switchLangUrl('en'); ?>" class="lang-switch <?php echo $lang === 'en' ? 'active' : ''; ?>">English</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Marquee Bar -->
    <?php if (!empty($marqueeItems)): ?>
    <div class="marquee-bar">
        <div class="marquee-wrapper">
            <div class="marquee-content">
                <?php foreach ($marqueeItems as $item): ?>
                <span class="marquee-item">
                    <i class="fas fa-<?php echo $item['icon'] ?? 'om'; ?>"></i>
                    <?php echo e($lang === 'hi' ? ($item['content_hi'] ?? $item['content']) : $item['content']); ?>
                </span>
                <?php endforeach; ?>
                <?php foreach ($marqueeItems as $item): ?>
                <span class="marquee-item">
                    <i class="fas fa-<?php echo $item['icon'] ?? 'om'; ?>"></i>
                    <?php echo e($lang === 'hi' ? ($item['content_hi'] ?? $item['content']) : $item['content']); ?>
                </span>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
    
    <!-- Main Header -->
    <header class="main-header" id="mainHeader">
        <div class="container">
            <nav class="navbar navbar-expand-lg py-2">
                <a class="navbar-brand d-flex align-items-center gap-3" href="<?php echo SITE_URL; ?>/">
                    <img src="<?php echo SITE_URL . '/' . $siteLogo; ?>" alt="<?php echo e($siteName); ?>" class="logo-img">
                    <div class="brand-text">
                        <span class="brand-name"><?php echo e($lang === 'hi' ? getSetting('site_name_hi', 'अयोध्या राम मंदिर') : $siteName); ?></span>
                        <span class="brand-tagline">🕉️ <?php echo e($lang === 'hi' ? getSetting('site_tagline_hi', 'जय श्री राम') : $siteTagline); ?></span>
                    </div>
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="mainNavbar">
                    <ul class="navbar-nav ms-auto align-items-lg-center">
                        <?php foreach ($mainMenu as $menuItem):
                            $hasChildren = !empty($menuItem['children']);
                            $title = $lang === 'hi' && !empty($menuItem['title_hi']) ? $menuItem['title_hi'] : $menuItem['title'];
                            $url = !empty($menuItem['page_slug']) ? pageUrl($menuItem['page_slug']) : ($menuItem['url'] ?? '#');
                        ?>
                        <li class="nav-item <?php echo $hasChildren ? 'dropdown' : ''; ?>">
                            <a class="nav-link <?php echo $hasChildren ? 'dropdown-toggle' : ''; ?>"
                               href="<?php echo e($url); ?>"
                               <?php echo $hasChildren ? 'data-bs-toggle="dropdown"' : ''; ?>>
                                <?php if (!empty($menuItem['icon_class'])): ?>
                                <i class="<?php echo e($menuItem['icon_class']); ?> me-1"></i>
                                <?php endif; ?>
                                <?php echo e($title); ?>
                            </a>
                            <?php if ($hasChildren): ?>
                            <ul class="dropdown-menu">
                                <?php foreach ($menuItem['children'] as $child):
                                    $childTitle = $lang === 'hi' && !empty($child['title_hi']) ? $child['title_hi'] : $child['title'];
                                    $childUrl = !empty($child['page_slug']) ? pageUrl($child['page_slug']) : ($child['url'] ?? '#');
                                ?>
                                <li><a href="<?php echo e($childUrl); ?>">
                                    <?php if (!empty($child['icon_class'])): ?>
                                    <i class="<?php echo e($child['icon_class']); ?>"></i>
                                    <?php endif; ?>
                                    <?php echo e($childTitle); ?>
                                </a></li>
                                <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                        </li>
                        <?php endforeach; ?>
                        
                    </ul>
                </div>
            </nav>
        </div>
    </header>
