<?php
/**
 * Ayodhya Ram Mandir - Dynamic Page Template
 * Handles all dynamic CMS pages
 */

require_once __DIR__ . '/includes/functions.php';

// Get slug from URL
$slug = $_GET['slug'] ?? '';
if (empty($slug)) {
    redirect(SITE_URL . '/');
}

// Try to find page in various tables
$page = null;
$pageType = 'page';

// Check pages table
$page = dbFetch("SELECT * FROM pages WHERE slug = ? AND status = 'published'", [$slug]);

// Check ramayan chapters
if (!$page) {
    $page = dbFetch("SELECT * FROM ramayan_chapters WHERE slug = ? AND status = 1", [$slug]);
    if ($page) $pageType = 'ramayan';
}

// Check hanuman chapters
if (!$page) {
    $page = dbFetch("SELECT * FROM hanuman_chapters WHERE slug = ? AND status = 1", [$slug]);
    if ($page) $pageType = 'hanuman';
}

// Check sita chapters
if (!$page) {
    $page = dbFetch("SELECT * FROM sita_chapters WHERE slug = ? AND status = 1", [$slug]);
    if ($page) $pageType = 'sita';
}

// Check travel pages
if (!$page) {
    $page = dbFetch("SELECT * FROM travel_pages WHERE slug = ? AND status = 1", [$slug]);
    if ($page) $pageType = 'travel';
}

// Check places
if (!$page) {
    $page = dbFetch("SELECT * FROM places_to_visit WHERE slug = ? AND status = 1", [$slug]);
    if ($page) $pageType = 'place';
}

// Check blogs
if (!$page) {
    $page = dbFetch("SELECT * FROM blogs WHERE slug = ? AND status = 'published'", [$slug]);
    if ($page) $pageType = 'blog';
}

// Check kundli pages
if (!$page) {
    $page = dbFetch("SELECT * FROM kundli_pages WHERE slug = ? AND status = 1", [$slug]);
    if ($page) $pageType = 'kundli';
}

// Check static/special pages
$specialPages = [
    'ram-mandir', 'ram-lalla-mandir-history', 'shri-ram-janmabhoomi', 'ram-mandir-architecture',
    'ram-mandir-darshan-guide', 'shri-ram', 'shri-ram-janam-katha', 'vishnu-avatar-story',
    'raja-dashrath-story', 'mata-kaushalya-story', 'mata-kaikeyi-story', 'mata-sumitra-story',
    'lakshman-ji-story', 'bharat-ji-story', 'shatrughna-ji-story', 'guru-vashishtha',
    'shri-ram-maryada-purushottam', 'shri-ram-rajya', 'shri-ram-ke-108-naam',
    'ramayan', 'sita-swayamvar', 'shri-ram-vanvas', 'bharat-milap', 'panchvati',
    'sita-haran', 'jatayu-story', 'shabri-katha', 'hanuman-ji', 'hanuman-ji-birth-story',
    'hanuman-ji-and-shri-ram-milan', 'hanuman-ji-lanka-yatra', 'mata-sita-and-hanuman-ji-milan',
    'lanka-dahan', 'ram-setu', 'lanka-yudh', 'ravan-vadh', 'ayodhya-wapsi', 'ram-rajya',
    'mata-sita', 'mata-sita-janam-katha', 'mata-sita-ki-mahima',
    'hanuman-chalisa', 'hanuman-chalisa-meaning', 'live-aarti', 'ram-bhajan',
    'daily-suvichar', 'kundli', 'kundli-milan', 'daily-rashifal', 'panchang-today',
    'ayodhya-guide', 'how-to-reach-ayodhya', 'places-to-visit-in-ayodhya',
    'ayodhya-trip-planner', 'ram-navami-guide', 'ayodhya-deepotsav-guide',
    'gallery', 'reviews', 'blog', 'prasad',
    'about-us', 'contact', 'privacy-policy', 'terms-conditions', 'disclaimer',
    'copyright-policy', 'refund-policy'
];

// If page found in database
if ($page) {
    $pageId = $page['id'];
    $title = $page['title'] ?? ($page['title_hi'] ?? '');
    $titleHi = $page['title_hi'] ?? '';
    $content = $page['content'] ?? '';
    $contentHi = $page['content_hi'] ?? '';
    $excerpt = $page['excerpt'] ?? '';
    $featuredImage = $page['featured_image'] ?? '';
    $heroImage = $page['hero_image'] ?? '';
    
    // Override for different table structures
    if ($pageType === 'ramayan') {
        $title = $page['title'];
        $titleHi = $page['title_hi'];
        $content = $page['content'];
        $contentHi = $page['content_hi'];
        $excerpt = $page['summary'];
        $featuredImage = $page['featured_image'];
        $heroImage = $page['hero_image'];
    }
    
    $displayTitle = ($lang === 'hi' && !empty($titleHi)) ? $titleHi : $title;
    $displayContent = ($lang === 'hi' && !empty($contentHi)) ? $contentHi : $content;
    
    if (empty($displayContent)) {
        $displayContent = generatePageContent($slug, $displayTitle, $lang);
    }
    
    $pageTitle = $displayTitle;
    $pageSlug = $slug;
    
    // SEO
    $seo = getSeoMeta($pageType, $pageId, $slug);
    if (empty($seo['meta_title'])) {
        $seo['meta_title'] = $displayTitle . ' - ' . getSetting('site_name');
    }
    if (empty($seo['meta_description'])) {
        $seo['meta_description'] = !empty($excerpt) ? strip_tags($excerpt) : truncateText(strip_tags($displayContent), 160);
    }
    
    // Schema
    $pageSchema = json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'Article',
        'headline' => $displayTitle,
        'description' => $seo['meta_description'],
        'image' => getImageUrl($featuredImage),
        'author' => [
            '@type' => 'Organization',
            'name' => 'Ayodhya Ram Mandir Team'
        ],
        'publisher' => [
            '@type' => 'Organization',
            'name' => getSetting('site_name'),
            'logo' => [
                '@type' => 'ImageObject',
                'url' => SITE_URL . '/' . getSetting('site_logo')
            ]
        ],
        'datePublished' => $page['created_at'] ?? date('Y-m-d'),
        'dateModified' => $page['updated_at'] ?? date('Y-m-d')
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

} elseif (in_array($slug, $specialPages)) {
    // Generate content for special pages
    $pageTitle = generatePageTitle($slug, $lang);
    $displayTitle = $pageTitle;
    $displayContent = generatePageContent($slug, $pageTitle, $lang);
    $featuredImage = '';
    $pageId = 0;
    $pageSlug = $slug;
    $pageType = 'page';
    
    $seo = getSeoMeta('page', 0, $slug);
    $seo['meta_title'] = $pageTitle . ' - ' . getSetting('site_name');
    $seo['meta_description'] = truncateText(strip_tags($displayContent), 160);
    
    $pageSchema = json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'Article',
        'headline' => $pageTitle,
        'description' => $seo['meta_description'],
        'author' => ['@type' => 'Organization', 'name' => 'Ayodhya Ram Mandir Team']
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
} else {
    // 404 - Page not found
    header("HTTP/1.0 404 Not Found");
    $pageTitle = 'Page Not Found';
    $displayTitle = __t('Page Not Found', 'पृष्ठ नहीं मिला');
    $displayContent = '<div class="text-center py-5"><i class="fas fa-search" style="font-size: 64px; color: var(--color-accent);"></i><h2 class="mt-4">' . $displayTitle . '</h2><p>' . __t('The page you are looking for does not exist.', 'आप जिस पृष्ठ को खोज रहे हैं वह मौजूद नहीं है।') . '</p><a href="' . SITE_URL . '/" class="btn-hero btn-hero-primary">' . __t('Go Home', 'होम पर जाएं') . '</a></div>';
    $featuredImage = '';
    $pageId = 0;
    $pageSlug = $slug;
    $pageType = 'page';
    $seo = getSeoMeta('page', 0, '');
    $pageSchema = '';
}

$lang = getCurrentLang();

include __DIR__ . '/includes/header.php';
?>

<!-- Page Hero -->
<section class="page-hero" style="background: linear-gradient(135deg, var(--color-primary), var(--color-secondary)); padding: 80px 0 60px; text-align: center; color: #fff;">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb justify-content-center" style="--bs-breadcrumb-divider: '>';">
                <li class="breadcrumb-item"><a href="<?php echo SITE_URL; ?>/" style="color: rgba(255,255,255,0.8);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="color: #fff;"><?php echo e($displayTitle); ?></li>
            </ol>
        </nav>
        
        <h1 style="font-family: var(--font-display); font-size: clamp(28px, 4vw, 42px); font-weight: 700; text-shadow: 2px 2px 4px rgba(0,0,0,0.2);">
            <?php echo e($displayTitle); ?>
        </h1>
        
        <?php if (!empty($excerpt)): ?>
        <p class="mt-3" style="font-size: 16px; opacity: 0.9; max-width: 600px; margin: 0 auto;">
            <?php echo e(strip_tags($excerpt)); ?>
        </p>
        <?php endif; ?>
    </div>
</section>

<!-- AdSense Content Top -->
<div class="container mt-4">
    <?php echo getAdSenseCode('content_top', $pageType); ?>
</div>

<!-- Main Content -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <?php if (!empty($featuredImage)): ?>
                <div class="page-featured-image mb-4 rounded-4 overflow-hidden shadow">
                    <img src="<?php echo getImageUrl($featuredImage); ?>" alt="<?php echo e($displayTitle); ?>" class="img-fluid" loading="lazy">
                </div>
                <?php endif; ?>
                
                <!-- Table of Contents -->
                <?php if (strlen($displayContent) > 1000): ?>
                <div class="toc-wrapper mb-4">
                    <div class="toc-header" onclick="this.nextElementSibling.classList.toggle('show')">
                        <h5><i class="fas fa-list"></i> <?php echo __t('Table of Contents', 'विषय सूची'); ?></h5>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="toc-content" id="tableOfContents"></div>
                </div>
                <?php endif; ?>
                
                <!-- Content -->
                <div class="page-content">
                    <?php echo $displayContent; ?>
                </div>
                
                <!-- AdSense Content Mid -->
                <div class="my-4">
                    <?php echo getAdSenseCode('content_mid', $pageType); ?>
                </div>
                
                <!-- Share Buttons -->
                <div class="share-section mt-5 pt-4 border-top">
                    <h5><?php echo __t('Share This:', 'इसे साझा करें:'); ?></h5>
                    <div class="share-buttons">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(SITE_URL . '/' . $slug); ?>" target="_blank" class="btn btn-sm" style="background: #3b5998; color: #fff;"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(SITE_URL . '/' . $slug); ?>&text=<?php echo urlencode($displayTitle); ?>" target="_blank" class="btn btn-sm" style="background: #1da1f2; color: #fff;"><i class="fab fa-twitter"></i></a>
                        <a href="https://wa.me/?text=<?php echo urlencode($displayTitle . ' - ' . SITE_URL . '/' . $slug); ?>" target="_blank" class="btn btn-sm" style="background: #25d366; color: #fff;"><i class="fab fa-whatsapp"></i></a>
                        <a href="https://t.me/share/url?url=<?php echo urlencode(SITE_URL . '/' . $slug); ?>&text=<?php echo urlencode($displayTitle); ?>" target="_blank" class="btn btn-sm" style="background: #0088cc; color: #fff;"><i class="fab fa-telegram"></i></a>
                    </div>
                </div>
                
                <!-- Author & Date -->
                <div class="page-meta mt-4 pt-4 border-top">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center gap-2">
                            <i class="fas fa-user" style="color: var(--color-primary);"></i>
                            <span><?php echo __t('By Ayodhya Ram Mandir Team', 'अयोध्या राम मंदिर टीम द्वारा'); ?></span>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <i class="fas fa-calendar" style="color: var(--color-primary);"></i>
                            <span><?php echo __t('Last Updated:', 'अंतिम अपडेट:'); ?> <?php echo date('d M, Y'); ?></span>
                        </div>
                    </div>
                </div>
                
                <!-- FAQ Section -->
                <?php 
                $pageFaqs = dbFetchAll("SELECT * FROM faq_items WHERE page_slug = ? AND status = 1 ORDER BY sort_order", [$slug]);
                if (!empty($pageFaqs)): 
                ?>
                <div class="page-faq mt-5">
                    <h3><i class="fas fa-question-circle" style="color: var(--color-primary);"></i> <?php echo __t('Frequently Asked Questions', 'अक्सर पूछे जाने वाले प्रश्न'); ?></h3>
                    <div class="accordion mt-3" id="faqAccordion">
                        <?php foreach ($pageFaqs as $index => $faq): ?>
                        <div class="accordion-item" style="border: 1px solid var(--color-light); border-radius: 10px; margin-bottom: 10px; overflow: hidden;">
                            <h2 class="accordion-header">
                                <button class="accordion-button <?php echo $index > 0 ? 'collapsed' : ''; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#faq<?php echo $faq['id']; ?>" style="font-size: 14px; font-weight: 500;">
                                    <?php echo e($lang === 'hi' && !empty($faq['question_hi']) ? $faq['question_hi'] : $faq['question']); ?>
                                </button>
                            </h2>
                            <div id="faq<?php echo $faq['id']; ?>" class="accordion-collapse collapse <?php echo $index === 0 ? 'show' : ''; ?>" data-bs-parent="#faqAccordion">
                                <div class="accordion-body" style="font-size: 14px; color: var(--color-text-light);">
                                    <?php echo nl2br(e($lang === 'hi' && !empty($faq['answer_hi']) ? $faq['answer_hi'] : $faq['answer'])); ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
                
                <!-- AdSense Content Bottom -->
                <div class="my-4">
                    <?php echo getAdSenseCode('content_bottom', $pageType); ?>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- AdSense Sidebar -->
                <div class="mb-4">
                    <?php echo getAdSenseCode('sidebar', $pageType); ?>
                </div>
                
                <!-- Related Pages -->
                <div class="sidebar-widget">
                    <h5><i class="fas fa-link" style="color: var(--color-primary);"></i> <?php echo __t('Related Pages', 'संबंधित पेज'); ?></h5>
                    <ul class="sidebar-links">
                        <?php
                        $related = dbFetchAll("SELECT title, title_hi, slug FROM pages WHERE slug != ? AND status = 'published' ORDER BY RAND() LIMIT 6", [$slug]);
                        foreach ($related as $r):
                        ?>
                        <li><a href="<?php echo pageUrl($r['slug']); ?>"><i class="fas fa-chevron-right"></i> <?php echo e($lang === 'hi' && !empty($r['title_hi']) ? $r['title_hi'] : $r['title']); ?></a></li>
                        <?php endforeach; ?>
                        <?php if (empty($related)): ?>
                        <li><a href="<?php echo pageUrl('ram-mandir'); ?>"><i class="fas fa-chevron-right"></i> <?php echo __t('Ram Mandir', 'राम मंदिर'); ?></a></li>
                        <li><a href="<?php echo pageUrl('ramayan'); ?>"><i class="fas fa-chevron-right"></i> <?php echo __t('Complete Ramayan', 'संपूर्ण रामायण'); ?></a></li>
                        <li><a href="<?php echo pageUrl('hanuman-ji'); ?>"><i class="fas fa-chevron-right"></i> <?php echo __t('Hanuman Ji', 'हनुमान जी'); ?></a></li>
                        <li><a href="<?php echo pageUrl('mata-sita'); ?>"><i class="fas fa-chevron-right"></i> <?php echo __t('Mata Sita', 'माता सीता'); ?></a></li>
                        <li><a href="<?php echo pageUrl('ayodhya-guide'); ?>"><i class="fas fa-chevron-right"></i> <?php echo __t('Ayodhya Guide', 'अयोध्या गाइड'); ?></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                
                <!-- Related Blogs -->
                <div class="sidebar-widget">
                    <h5><i class="fas fa-blog" style="color: var(--color-primary);"></i> <?php echo __t('Related Blogs', 'संबंधित ब्लॉग'); ?></h5>
                    <?php
                    $relatedBlogs = dbFetchAll("SELECT title, title_hi, slug, featured_image FROM blogs WHERE status = 'published' ORDER BY created_at DESC LIMIT 4");
                    foreach ($relatedBlogs as $rb):
                    ?>
                    <a href="<?php echo pageUrl('blog/' . $rb['slug']); ?>" class="sidebar-blog-item d-flex gap-3 mb-3">
                        <img src="<?php echo getImageUrl($rb['featured_image'], 'assets/images/blog-placeholder.jpg'); ?>" alt="" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                        <div>
                            <h6 style="font-size: 13px;"><?php echo e($lang === 'hi' && !empty($rb['title_hi']) ? $rb['title_hi'] : $rb['title']); ?></h6>
                        </div>
                    </a>
                    <?php endforeach; ?>
                </div>
                
                <!-- Quick Links -->
                <div class="sidebar-widget">
                    <h5><i class="fas fa-bolt" style="color: var(--color-primary);"></i> <?php echo __t('Quick Links', 'त्वरित लिंक'); ?></h5>
                    <div class="d-grid gap-2">
                        <a href="<?php echo pageUrl('live-aarti'); ?>" class="btn btn-sm" style="background: linear-gradient(135deg, var(--color-primary), var(--color-secondary)); color: #fff;"><i class="fas fa-om"></i> <?php echo __t('Live Aarti', 'लाइव आरती'); ?></a>
                        <a href="<?php echo pageUrl('contact'); ?>" class="btn btn-sm" style="background: var(--color-bg); border: 1px solid var(--color-light); color: var(--color-primary);"><i class="fas fa-envelope"></i> <?php echo __t('Contact Us', 'संपर्क करें'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.page-content {
    font-size: 16px;
    line-height: 1.8;
}
.page-content h2 {
    font-family: var(--font-display);
    color: var(--color-primary);
    margin-top: 30px;
    margin-bottom: 15px;
    font-size: 24px;
}
.page-content h3 {
    font-family: var(--font-display);
    color: var(--color-secondary);
    margin-top: 25px;
    margin-bottom: 12px;
    font-size: 20px;
}
.page-content p {
    margin-bottom: 15px;
}
.page-content img {
    border-radius: 12px;
    margin: 15px 0;
}
.page-content blockquote {
    background: linear-gradient(135deg, var(--color-bg), var(--color-light));
    border-left: 4px solid var(--color-primary);
    padding: 20px 25px;
    border-radius: 0 12px 12px 0;
    font-style: italic;
    margin: 20px 0;
}

.toc-wrapper {
    background: var(--color-bg);
    border-radius: 12px;
    border: 1px solid var(--color-light);
    overflow: hidden;
}
.toc-header {
    padding: 15px 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    cursor: pointer;
}
.toc-header h5 {
    font-size: 15px;
    margin: 0;
    color: var(--color-primary);
}
.toc-content {
    padding: 0 20px 15px;
}
.toc-content ul {
    list-style: none;
    padding: 0;
    margin: 0;
}
.toc-content li a {
    display: block;
    padding: 5px 0;
    font-size: 14px;
    color: var(--color-text);
}
.toc-content li a:hover {
    color: var(--color-primary);
}

.sidebar-widget {
    background: var(--color-white);
    border-radius: 12px;
    padding: 20px;
    margin-bottom: 20px;
    border: 1px solid var(--color-light);
}
.sidebar-widget h5 {
    font-size: 15px;
    font-weight: 600;
    margin-bottom: 15px;
    padding-bottom: 10px;
    border-bottom: 2px solid var(--color-light);
}
.sidebar-links {
    list-style: none;
    padding: 0;
    margin: 0;
}
.sidebar-links li a {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 8px 0;
    font-size: 14px;
    color: var(--color-text);
    transition: all 0.3s;
}
.sidebar-links li a:hover {
    color: var(--color-primary);
    padding-left: 5px;
}
.sidebar-links li a i {
    font-size: 10px;
    color: var(--color-secondary);
}
.sidebar-blog-item {
    text-decoration: none;
    color: var(--color-text);
    transition: all 0.3s;
}
.sidebar-blog-item:hover {
    color: var(--color-primary);
}
.share-buttons {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}
.share-buttons a {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
            align-items: center;
    justify-content: center;
    font-size: 14px;
    transition: all 0.3s;
}
.share-buttons a:hover {
    transform: translateY(-2px);
}
</style>

<script>
// Auto-generate TOC
document.addEventListener('DOMContentLoaded', function() {
    const content = document.querySelector('.page-content');
    const tocContainer = document.getElementById('tableOfContents');
    
    if (content && tocContainer) {
        const headings = content.querySelectorAll('h2, h3');
        if (headings.length > 0) {
            const ul = document.createElement('ul');
            headings.forEach((h, i) => {
                if (!h.id) h.id = 'section-' + i;
                const li = document.createElement('li');
                li.innerHTML = '<a href="#' + h.id + '">' + h.textContent + '</a>';
                ul.appendChild(li);
            });
            tocContainer.appendChild(ul);
        }
    }
});
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>

<?php
/**
 * Generate page title from slug
 */
function generatePageTitle($slug, $lang) {
    $titles = [
        'en' => [
            'ram-mandir' => 'Ayodhya Ram Mandir',
            'ram-lalla-mandir-history' => 'Ram Lalla Mandir History',
            'shri-ram-janmabhoomi' => 'Shri Ram Janmabhoomi',
            'ram-mandir-architecture' => 'Ram Mandir Architecture',
            'ram-mandir-darshan-guide' => 'Ram Mandir Darshan Guide',
            'shri-ram' => 'About Shri Ram',
            'shri-ram-janam-katha' => 'Shri Ram Janam Katha',
            'vishnu-avatar-story' => 'Bhagwan Vishnu Avatar Story',
            'raja-dashrath-story' => 'Raja Dashrath Story',
            'mata-kaushalya-story' => 'Mata Kaushalya Story',
            'mata-kaikeyi-story' => 'Mata Kaikeyi Story',
            'mata-sumitra-story' => 'Mata Sumitra Story',
            'lakshman-ji-story' => 'Lakshman Ji Story',
            'bharat-ji-story' => 'Bharat Ji Story',
            'shatrughna-ji-story' => 'Shatrughna Ji Story',
            'guru-vashishtha' => 'Guru Vashishtha',
            'shri-ram-maryada-purushottam' => 'Shri Ram Maryada Purushottam',
            'shri-ram-rajya' => 'Ram Rajya',
            'shri-ram-ke-108-naam' => 'Shri Ram Ke 108 Naam',
            'ramayan' => 'Complete Ramayan',
            'sita-swayamvar' => 'Sita Swayamvar',
            'shri-ram-vanvas' => 'Shri Ram Vanvas',
            'bharat-milap' => 'Bharat Milap',
            'panchvati' => 'Panchvati',
            'sita-haran' => 'Sita Haran',
            'jatayu-story' => 'Jatayu Story',
            'shabri-katha' => 'Shabri Katha',
            'hanuman-ji' => 'About Hanuman Ji',
            'hanuman-ji-birth-story' => 'Hanuman Ji Birth Story',
            'hanuman-ji-and-shri-ram-milan' => 'Hanuman Ji and Shri Ram Milan',
            'hanuman-ji-lanka-yatra' => 'Hanuman Ji Lanka Yatra',
            'mata-sita-and-hanuman-ji-milan' => 'Mata Sita and Hanuman Ji Milan',
            'lanka-dahan' => 'Lanka Dahan',
            'ram-setu' => 'Ram Setu',
            'lanka-yudh' => 'Lanka Yudh',
            'ravan-vadh' => 'Ravan Vadh',
            'ayodhya-wapsi' => 'Ayodhya Wapsi',
            'ram-rajya' => 'Ram Rajya',
            'mata-sita' => 'About Mata Sita',
            'mata-sita-janam-katha' => 'Mata Sita Janam Katha',
            'mata-sita-ki-mahima' => 'Mata Sita Ki Mahima',
            'hanuman-chalisa' => 'Hanuman Chalisa',
            'hanuman-chalisa-meaning' => 'Hanuman Chalisa Meaning',
            'live-aarti' => 'Live Aarti',
            'ram-bhajan' => 'Ram Bhajan',
            'daily-suvichar' => 'Daily Suvichar',
            'kundli' => 'Kundli',
            'kundli-milan' => 'Kundli Milan',
            'daily-rashifal' => 'Daily Rashifal',
            'panchang-today' => 'Panchang Today',
            'ayodhya-guide' => 'Ayodhya Travel Guide',
            'how-to-reach-ayodhya' => 'How to Reach Ayodhya',
            'places-to-visit-in-ayodhya' => 'Places to Visit in Ayodhya',
            'gallery' => 'Photo Gallery',
            'reviews' => 'Devotee Reviews',
            'blog' => 'Blog',
            'donation' => 'Donation & Prasad',
            'prasad' => 'Prasad Information',
            'about-us' => 'About Us',
            'contact' => 'Contact Us',
            'privacy-policy' => 'Privacy Policy',
            'terms-conditions' => 'Terms & Conditions',
            'disclaimer' => 'Disclaimer',
            'copyright-policy' => 'Copyright Policy',
            'refund-policy' => 'Refund Policy',
        ],
        'hi' => [
            'ram-mandir' => 'अयोध्या राम मंदिर',
            'ram-lalla-mandir-history' => 'राम लalla मंदिर का इतिहास',
            'shri-ram-janmabhoomi' => 'श्री राम जन्मभूमि',
            'ram-mandir-architecture' => 'राम मंदिर वास्तुकला',
            'ram-mandir-darshan-guide' => 'राम मंदिर दर्शन गाइड',
            'shri-ram' => 'श्री राम के बारे में',
            'shri-ram-janam-katha' => 'श्री राम जन्म कथा',
            'vishnu-avatar-story' => 'भगवान विष्णु अवतार कथा',
            'raja-dashrath-story' => 'राजा दशरथ कथा',
            'mata-kaushalya-story' => 'माता कौशल्या कथा',
            'mata-kaikeyi-story' => 'माता कैकेयी कथा',
            'mata-sumitra-story' => 'माता सुमित्रा कथा',
            'lakshman-ji-story' => 'लक्ष्मण जी कथा',
            'bharat-ji-story' => 'भरत जी कथा',
            'shatrughna-ji-story' => 'शत्रुघ्न जी कथा',
            'guru-vashishtha' => 'गुरु वशिष्ठ',
            'shri-ram-maryada-purushottam' => 'श्री राम मर्यादा पुरुषोत्तम',
            'shri-ram-rajya' => 'राम राज्य',
            'ramayan' => 'संपूर्ण रामायण',
            'sita-swayamvar' => 'सीता स्वयंवर',
            'shri-ram-vanvas' => 'श्री राम वनवास',
            'bharat-milap' => 'भरत मिलाप',
            'panchvati' => 'पंचवटी',
            'sita-haran' => 'सीता हरण',
            'jatayu-story' => 'जटायु कथा',
            'shabri-katha' => 'शबरी कथा',
            'hanuman-ji' => 'हनुमान जी के बारे में',
            'hanuman-ji-birth-story' => 'हनुमान जी जन्म कथा',
            'hanuman-ji-and-shri-ram-milan' => 'हनुमान जी और श्री राम मिलन',
            'hanuman-ji-lanka-yatra' => 'हनुमान जी लंका यात्रा',
            'mata-sita-and-hanuman-ji-milan' => 'माता सीता और हनुमान जी मिलन',
            'lanka-dahan' => 'लंका दहन',
            'ram-setu' => 'राम सेतु',
            'lanka-yudh' => 'लंका युद्ध',
            'ravan-vadh' => 'रावण वध',
            'ayodhya-wapsi' => 'अयोध्या वापसी',
            'ram-rajya' => 'राम राज्य',
            'mata-sita' => 'माता सीता के बारे में',
            'mata-sita-janam-katha' => 'माता सीता जन्म कथा',
            'mata-sita-ki-mahima' => 'माता सीता की महिमा',
            'hanuman-chalisa' => 'हनुमान चालीसा',
            'hanuman-chalisa-meaning' => 'हनुमान चालीसा अर्थ',
            'live-aarti' => 'लाइव आरती',
            'ram-bhajan' => 'राम भजन',
            'daily-suvichar' => 'दैनिक सुविचार',
            'kundli' => 'कुंडली',
            'kundli-milan' => 'कुंडली मिलान',
            'daily-rashifal' => 'दैनिक राशिफल',
            'panchang-today' => 'आज का पंचांग',
            'ayodhya-guide' => 'अयोध्या यात्रा गाइड',
            'how-to-reach-ayodhya' => 'अयोध्या कैसे पहुंचें',
            'places-to-visit-in-ayodhya' => 'अयोध्या में दर्शनीय स्थल',
            'gallery' => 'फोटो गैलरी',
            'reviews' => 'भक्त समीक्षाएं',
            'blog' => 'ब्लॉग',
            'donation' => 'दान और प्रसाद',
            'prasad' => 'प्रसाद जानकारी',
            'about-us' => 'हमारे बारे में',
            'contact' => 'संपर्क करें',
            'privacy-policy' => 'गोपनीयता नीति',
            'terms-conditions' => 'नियम और शर्तें',
            'disclaimer' => 'अस्वीकरण',
            'copyright-policy' => 'कॉपीराइट नीति',
            'refund-policy' => 'रिफंड नीति',
        ]
    ];
    
    return $titles[$lang][$slug] ?? ucwords(str_replace('-', ' ', $slug));
}

/**
 * Generate rich page content from slug
 */
function generatePageContent($slug, $title, $lang) {
    // Try to get from database first
    $page = dbFetch("SELECT content, content_hi FROM pages WHERE slug = ? AND status = 'published'", [$slug]);
    if ($page && !empty($page['content'])) {
        return $lang === 'hi' && !empty($page['content_hi']) ? $page['content_hi'] : $page['content'];
    }
    
    // Generate based on page type
    $generators = [
        'ram-mandir' => function($l) {
            return $l === 'hi' ? 
                '<h2>अयोध्या राम मंदिर</h2><p>अयोध्या राम मंदिर भगवान राम के जन्मस्थान पर बना एक भव्य मंदिर है। यह मंदिर भारतीय वास्तुकला का अद्भुत उदाहरण है। 22 जनवरी 2024 को प्रधानमंत्री नरेंद्र मोदी द्वारा प्राण प्रतिष्ठा संपन्न हुई।</p><h3>मंदिर का इतिहास</h3><p>राम मंदिर का इतिहास सदियों पुराना है। इस स्थान को भगवान राम का जन्मस्थान माना जाता है। 1528 में इस स्थान पर एक मस्जिद बनाई गई थी। 1992 में विवादित ढांचे को गिरा दिया गया। 2019 में सुप्रीम कोर्ट ने पूरा भूमि राम लला को सौंपने का फैसला दिया।</p><h3>मंदिर वास्तुकला</h3><p>मंदिर की ऊंचाई 161 फीट है और यह तीन मंजिला है। मंदिर में 392 स्तंभ और 44 द्वार हैं। मुख्य गर्भगृह में Ram Lalla की मूर्ति विराजमान है। मंदिर का निर्माण पारंपरिक भारतीय शैली में किया गया है।</p>' :
                '<h2>Ayodhya Ram Mandir</h2><p>The Ayodhya Ram Mandir is a grand temple built at the birthplace of Lord Ram. It is a magnificent example of Indian architecture. The Pran Pratishtha was performed by PM Narendra Modi on January 22, 2024.</p><h3>History of the Temple</h3><p>The history of Ram Mandir spans centuries. This site is believed to be the birthplace of Lord Ram. In 1528, a mosque was built at this site. In 1992, the disputed structure was demolished. In 2019, the Supreme Court awarded the entire land to Ram Lalla.</p><h3>Temple Architecture</h3><p>The temple stands 161 feet tall with three floors. It features 392 pillars and 44 doors. The main sanctum houses the divine idol of Ram Lalla. The construction follows traditional Indian architectural style using pink sandstone.</p>';
        },
        'shri-ram' => function($l) {
            return $l === 'hi' ?
                '<h2>भगवान श्री राम</h2><p>श्री राम भगवान विष्णु के सातवें अवतार हैं। वे अयोध्या के राजा दशरथ और माता कौशल्या के सबसे बड़े पुत्र थे। उन्हें मर्यादा पुरुषोत्तम कहा जाता है क्योंकि उन्होंने हमेशा धर्म का पालन किया।</p><h3>श्री राम का जन्म</h3><p>श्री राम का जन्म चैत्र मास की नवमी तिथि को हुआ था। यह दिन राम नवमी के रूप में मनाया जाता है। उनका जन्म अयोध्या में राजा दशरथ के यहां हुआ था।</p><h3>श्री राम के 108 नाम</h3><p>श्री राम के 108 नामों का जाप बहुत फलदायी माना जाता है। राम, रामचंद्र, रघुनाथ, रघुपति, सीतापति, दशरथनंदन आदि उनके प्रसिद्ध नाम हैं।</p>' :
                '<h2>Lord Shri Ram</h2><p>Shri Ram is the seventh incarnation of Lord Vishnu. He was the eldest son of King Dashrath and Mata Kaushalya of Ayodhya. He is called Maryada Purushottam because he always followed the path of righteousness.</p><h3>Birth of Shri Ram</h3><p>Shri Ram was born on the ninth day (Navami) of Chaitra month. This day is celebrated as Ram Navami. He was born in Ayodhya to King Dashrath.</p><h3>108 Names of Shri Ram</h3><p>Chanting 108 names of Shri Ram is considered very auspicious. Ram, Ramchandra, Raghunath, Raghupati, Sitapati, Dashrathnandana are some of his famous names.</p>';
        },
        'hanuman-ji' => function($l) {
            return $l === 'hi' ?
                '<h2>पवन पुत्र हनुमान जी</h2><p>हनुमान जी भगवान शिव के ग्यारहवें रुद्र अवतार माने जाते हैं। वे पवन देव और माता अंजनी के पुत्र हैं। उन्हें राम भक्तों में सबसे श्रेष्ठ माना जाता है।</p><h3>हनुमान जी की शक्तियां</h3><p>हनुमान जी में अनेक दिव्य शक्तियां थीं। वे अनंत बल के स्वामी थे। उनमें नौ सिद्धियां और आठ निधियां थीं। वे अपनी पूंछ को बड़ा और छोटा कर सकते थे।</p><h3>हनुमान चालीसा</h3><p>हनुमान चालीसा हनुमान जी की महिमा का वर्णन करने वाला 40 छंदों का स्तोत्र है। इसके रचयिता गोस्वामी तुलसीदास जी हैं। हनुमान चालीसा का पाठ करने से सभी संकट दूर होते हैं।</p>' :
                '<h2>Pawan Putra Hanuman Ji</h2><p>Hanuman Ji is considered the eleventh Rudra incarnation of Lord Shiva. He is the son of Pawan Dev and Mata Anjani. He is regarded as the greatest among all devotees of Ram.</p><h3>Powers of Hanuman Ji</h3><p>Hanuman Ji possessed many divine powers. He was the master of infinite strength. He had nine siddhis and eight nidhis. He could enlarge and shrink his tail at will.</p><h3>Hanuman Chalisa</h3><p>Hanuman Chalisa is a 40-verse hymn describing the glories of Hanuman Ji. It was composed by Goswami Tulsidas. Reciting Hanuman Chalisa removes all obstacles and dangers.</p>';
        },
        'ramayan' => function($l) {
            return $l === 'hi' ?
                '<h2>संपूर्ण रामायण</h2><p>रामायण भगवान राम की कथा का विश्व का सबसे प्राचीन महाकाव्य है। इसके रचयिता महर्षि वाल्मीकि हैं। रामायण में 24,000 श्लोक हैं और यह सात कांडों में विभाजित है।</p><h2>बालकांड</h2><p>बालकांड में श्री राम के जन्म, बाल्यकाल, गुरु वशिष्ठ के आश्रम में शिक्षा, विश्वामित्र के साथ यात्रा, ताड़का वध, अहिल्या उद्धार, सीता स्वयंवर और विवाह का वर्णन है।</p><h2>अयोध्याकांड</h2><p>अयोध्याकांड में श्री राम के वनवास की कथा है। कैकेयी के वरदान के कारण श्री राम को 14 वर्ष का वनवास मिलता है। सीता और लक्ष्मण उनके साथ जाते हैं।</p><h2>अरण्यकांड</h2><p>अरण्यकांड में वनवास के दौरान की घटनाएं हैं। शूर्पणखा का आगमन, सोने का हिरण, सीता हरण और जटायु का वीरगति प्राप्त होना।</p><h2>किष्किंधाकांड</h2><p>किष्किंधाकांड में हनुमान जी और श्री राम का मिलन, सुग्रीव से मित्रता, बालि वध और वानर सेना का एकत्रीकरण।</p><h2>सुंदरकांड</h2><p>सुंदरकांड में हनुमान जी की लंका यात्रा, समुद्र पार करना, लंका में प्रवेश, अशोक वाटिका में सीता माता से मिलना और लंका दहन।</p><h2>लंकाकांड</h2><p>लंकाकांड में राम-रावण युद्ध, कुंभकर्ण और मेघनाद का वध, अंत में रावण वध और विजय।</p><h2>उत्तरकांड</h2><p>उत्तरकांड में अयोध्या वापसी, राज्याभिषेक और राम राज्य का वर्णन है।</p>' :
                '<h2>Complete Ramayan</h2><p>The Ramayan is the world\'s oldest epic depicting the story of Lord Ram. It was composed by Maharishi Valmiki. It contains 24,000 verses divided into seven Kands.</p><h2>Balkand</h2><p>Balkand describes the birth of Shri Ram, his childhood, education at Guru Vashishtha\'s ashram, journey with Vishwamitra, Tadaka Vadh, Ahilya Uddhar, Sita Swayamvar, and marriage.</p><h2>Ayodhyakand</h2><p>Ayodhyakand narrates the story of Shri Ram\'s exile. Due to Kaikeyi\'s boon, Shri Ram is sent to 14 years of forest exile. Sita and Lakshman accompany him.</p><h2>Aranyakand</h2><p>Aranyakand contains events during the exile. Shurpanakha\'s arrival, the golden deer, Sita\'s abduction, and Jatayu\'s martyrdom.</p><h2>Kishkindhakand</h2><p>Kishkindhakand features the meeting of Hanuman Ji and Shri Ram, friendship with Sugriva, Bali Vadh, and gathering the Vanar army.</p><h2>Sunderkand</h2><p>Sunderkand describes Hanuman Ji\'s journey to Lanka, crossing the ocean, entering Lanka, meeting Mata Sita at Ashok Vatika, and burning Lanka.</p><h2>Lankakand</h2><p>Lankakand features the Ram-Ravan war, the defeat of Kumbhkaran and Meghnad, and finally the slaying of Ravan and victory.</p><h2 Uttarakand</h2><p>Uttarakand describes the return to Ayodhya, coronation, and the glory of Ram Rajya.</p>';
        },
    ];
    
    // Find matching generator
    foreach ($generators as $key => $generator) {
        if (strpos($slug, $key) !== false) {
            return $generator($lang);
        }
    }
    
    // Default content
    return $lang === 'hi' ?
        '<h2>' . $title . '</h2><p>इस पृष्ठ की सामग्री जल्द ही अपडेट की जाएगी। अधिक जानकारी के लिए कृपया हमसे संपर्क करें। जय श्री राम!</p>' :
        '<h2>' . $title . '</h2><p>This page content will be updated soon. Please contact us for more information. Jai Shri Ram!</p>';
}
