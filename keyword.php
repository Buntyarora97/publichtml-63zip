<?php
/**
 * Ayodhya Ram Mandir - Keyword Page Template
 * 100+ keyword pages for SEO
 */

require_once __DIR__ . '/includes/functions.php';
$lang = getCurrentLang();

$slug = trim($_GET['slug'] ?? '');

if (empty($slug)) {
    $allKeywords = dbFetchAll("SELECT * FROM keyword_pages WHERE status = 1 ORDER BY keyword");
    $pageTitle = __t('Ram Mandir Keywords - Complete Guide | AyodhyaRamMandir.in', 'राम मंदिर संबंधित सभी विषय');
    $pageType = 'keyword_list';
    $pageSlug = 'keywords';
    $pageSchema = '{}';
    $seo = ['title' => $pageTitle, 'description' => 'Complete guide to all topics related to Ram Mandir, Shri Ram, Ramayan and Ayodhya.', 'keywords' => 'Ram Mandir, Shri Ram, Ramayan, Ayodhya, Hanuman Ji'];
    include __DIR__ . '/includes/header.php';
    ?>
    <div class="page-hero">
        <div class="container text-center">
            <h1 class="page-hero-title"><?php echo __t('🕉️ Ram Mandir Topics','🕉️ राम मंदिर विषय'); ?></h1>
            <p class="page-hero-subtitle"><?php echo __t('Explore all topics about Shri Ram, Ramayan, and Ayodhya','श्री राम, रामायण और अयोध्या के सभी विषय खोजें'); ?></p>
        </div>
    </div>
    <section class="section-padding" style="background:#FFF8F0;">
        <div class="container">
            <div class="city-tags-cloud">
                <?php foreach ($allKeywords as $kw):
                    $kwTitle = $lang === 'hi' ? ($kw['keyword_hi'] ?? $kw['keyword']) : $kw['keyword'];
                ?>
                <a href="keyword.php?slug=<?php echo e($kw['slug']); ?>" class="city-tag"><?php echo e($kwTitle); ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php include __DIR__ . '/includes/footer.php'; return;
}

$kw = dbFetch("SELECT * FROM keyword_pages WHERE slug = ? AND status = 1", [$slug]);

if (!$kw) {
    header('HTTP/1.0 404 Not Found');
    $pageType = '404'; $pageSlug = '404';
    include __DIR__ . '/includes/header.php';
    echo '<div class="container text-center py-5"><h1>404 - Not Found</h1><a href="/" class="btn-hero btn-hero-primary">Home</a></div>';
    include __DIR__ . '/includes/footer.php';
    exit;
}

$pageType = 'keyword';
$pageId = $kw['id'];
$pageSlug = $slug;

$kwTitle = $lang === 'hi' ? ($kw['keyword_hi'] ?? $kw['keyword']) : $kw['keyword'];
$kwContent = $lang === 'hi' ? ($kw['content_hi'] ?? $kw['content']) : $kw['content'];
$pageTitle = $kw['seo_title'] ?? "{$kw['keyword']} - Complete Guide | AyodhyaRamMandir.in";

$pageSchema = json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Article',
    'headline' => $pageTitle,
    'description' => $kw['seo_description'] ?? '',
    'author' => ['@type' => 'Organization', 'name' => 'AyodhyaRamMandir.in'],
    'publisher' => ['@type' => 'Organization', 'name' => 'AyodhyaRamMandir.in', 'url' => SITE_URL],
    'url' => SITE_URL . '/keyword.php?slug=' . urlencode($slug),
    'about' => ['@type' => 'Thing', 'name' => $kw['keyword']],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

$seo = [
    'title' => $pageTitle,
    'description' => $kw['seo_description'] ?? "Complete information about {$kw['keyword']} - history, significance, stories from Ramayana, and connection with Ayodhya Ram Mandir.",
    'keywords' => $kw['keyword'] . ', ' . $kw['keyword_hi'] . ', Ram Mandir, Ayodhya, Shri Ram',
];

include __DIR__ . '/includes/header.php';
?>

<div class="page-hero">
    <div class="container text-center">
        <div class="breadcrumb-nav justify-content-center">
            <a href="<?php echo SITE_URL; ?>/"><i class="fas fa-home"></i> <?php echo __t('Home','होम'); ?></a>
            <span>›</span>
            <span><?php echo e($kwTitle); ?></span>
        </div>
        <h1 class="page-hero-title">
            <span style="color:#FFD700">🕉️</span> <?php echo e($kwTitle); ?>
        </h1>
        <p class="page-hero-subtitle"><?php echo __t('Complete Guide & Information','सम्पूर्ण गाइड और जानकारी'); ?> | AyodhyaRamMandir.in</p>
    </div>
</div>

<section class="section-padding" style="background:#FFFEBC;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Main Content -->
                <div class="page-content" data-aos="fade-up">
                    <?php
                    $paragraphs = explode("\n\n", $kwContent);
                    foreach ($paragraphs as $para) {
                        $para = trim($para);
                        if (empty($para)) continue;
                        if (preg_match('/^(Significance|History|Connection|How to|Related|Prayers|Visit|महत्व|इतिहास|कैसे|अयोध्या|मंत्र|#{1,3}\s)/', $para)) {
                            $lines = explode("\n", $para, 2);
                            echo '<h2>' . e($lines[0]) . '</h2>';
                            if (!empty($lines[1])) echo '<p>' . nl2br(e(trim($lines[1]))) . '</p>';
                        } else {
                            echo '<p>' . nl2br(e($para)) . '</p>';
                        }
                    }
                    ?>
                </div>
                
                <!-- Ram Mandir Info -->
                <div class="quick-info-box mt-5" data-aos="fade-up">
                    <h3><i class="fas fa-landmark"></i> <?php echo __t('Ram Mandir Darshan Info','राम मंदिर दर्शन जानकारी'); ?></h3>
                    <div class="row g-3">
                        <div class="col-6 col-md-3">
                            <div class="info-stat"><i class="fas fa-clock"></i><span><?php echo __t('Darshan','दर्शन'); ?></span><strong>6AM-10PM</strong></div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="info-stat"><i class="fas fa-bell"></i><span><?php echo __t('Aarti','आरती'); ?></span><strong>6AM & 7:30PM</strong></div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="info-stat"><i class="fas fa-train"></i><span><?php echo __t('Station','स्टेशन'); ?></span><strong>AY</strong></div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="info-stat"><i class="fas fa-plane"></i><span><?php echo __t('Airport','हवाई अड्डा'); ?></span><strong>AYJ</strong></div>
                        </div>
                    </div>
                </div>
                
                <!-- Related Keywords -->
                <div class="mt-5" data-aos="fade-up">
                    <h2><?php echo __t('Related Topics','संबंधित विषय'); ?></h2>
                    <?php
                    $relatedKws = dbFetchAll("SELECT * FROM keyword_pages WHERE slug != ? AND status = 1 ORDER BY RAND() LIMIT 12", [$slug]);
                    ?>
                    <div class="city-tags-cloud" style="margin-top:16px">
                        <?php foreach ($relatedKws as $rk):
                            $rkTitle = $lang === 'hi' ? ($rk['keyword_hi'] ?? $rk['keyword']) : $rk['keyword'];
                        ?>
                        <a href="keyword.php?slug=<?php echo e($rk['slug']); ?>" class="city-tag"><?php echo e($rkTitle); ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="sidebar-widget">
                        <h3 class="sidebar-title"><i class="fas fa-link"></i> <?php echo __t('Quick Links','त्वरित लिंक'); ?></h3>
                        <ul class="sidebar-links">
                            <li><a href="<?php echo pageUrl('ram-mandir'); ?>"><i class="fas fa-landmark"></i> <?php echo __t('Ram Mandir History','राम मंदिर इतिहास'); ?></a></li>
                            <li><a href="<?php echo pageUrl('ramayan'); ?>"><i class="fas fa-book-open"></i> <?php echo __t('Complete Ramayan','संपूर्ण रामायण'); ?></a></li>
                            <li><a href="<?php echo pageUrl('hanuman-ji'); ?>"><i class="fas fa-fire"></i> <?php echo __t('Hanuman Ji','हनुमान जी'); ?></a></li>
                            <li><a href="<?php echo pageUrl('mata-sita'); ?>"><i class="fas fa-heart"></i> <?php echo __t('Mata Sita','माता सीता'); ?></a></li>
                            <li><a href="<?php echo pageUrl('ayodhya-guide'); ?>"><i class="fas fa-map"></i> <?php echo __t('Ayodhya Guide','अयोध्या गाइड'); ?></a></li>
                            <li><a href="city.php"><i class="fas fa-city"></i> <?php echo __t('City Guides','शहर गाइड'); ?></a></li>
                        </ul>
                    </div>
                    
                    <div class="sidebar-widget" style="background:linear-gradient(135deg,#1A0500,#3D1A00);color:#fff;">
                        <h3 style="color:#FFD700;margin-bottom:16px"><i class="fas fa-om"></i> <?php echo __t('Ram Aarti Timings','राम आरती समय'); ?></h3>
                        <ul style="list-style:none;padding:0;margin:0">
                            <?php
                            $aartis = [
                                ['Mangala Aarti','मंगला आरती','4:00 AM'],
                                ['Shringar Aarti','श्रृंगार आरती','6:00 AM'],
                                ['Bhog Aarti','भोग आरती','12:00 PM'],
                                ['Sandhya Aarti','संध्या आरती','7:30 PM'],
                                ['Shayan Aarti','शयन आरती','10:00 PM'],
                            ];
                            foreach ($aartis as $a):
                            ?>
                            <li style="display:flex;justify-content:space-between;padding:8px 0;border-bottom:1px solid rgba(255,215,0,.1);color:rgba(255,255,255,.85);font-size:14px">
                                <span><?php echo $lang === 'hi' ? $a[1] : $a[0]; ?></span>
                                <strong style="color:#FFD700"><?php echo $a[2]; ?></strong>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    
                    <div class="sidebar-widget text-center" style="background:linear-gradient(135deg,#F55900,#FF8237);color:#fff;">
                        <i class="fas fa-hand-holding-heart fa-2x mb-3"></i>
                        <h4 style="color:#fff"><?php echo __t('Donate for Ram Mandir','राम मंदिर के लिए दान'); ?></h4>
                        <a href="donation.php" class="btn btn-light btn-sm mt-2 fw-bold"><?php echo __t('Donate Now','अभी दान करें'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
<style>
.quick-info-box{background:#fff;border-radius:20px;padding:24px;box-shadow:0 5px 25px rgba(245,89,0,.08);border:1px solid rgba(245,89,0,.1)}.quick-info-box h3{font-size:18px;font-weight:800;color:#F55900;margin-bottom:16px}.info-stat{text-align:center;background:#FFF8F0;border-radius:14px;padding:16px;border:1px solid rgba(245,89,0,.1)}.info-stat i{font-size:24px;color:#F55900;display:block;margin-bottom:6px}.info-stat span{font-size:12px;color:#666;display:block}.info-stat strong{font-size:14px;color:#1A1A1A;font-weight:700}
</style>
