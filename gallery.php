<?php
$pageType = 'gallery'; $pageSlug = 'gallery';
$pageTitle = 'Gallery - Photos & Videos of Ayodhya Ram Mandir | AyodhyaRamMandir.in';
require_once __DIR__ . '/includes/functions.php';
$lang = getCurrentLang();
$pageSchema = json_encode(['@context'=>'https://schema.org','@type'=>'ImageGallery','name'=>'Ayodhya Ram Mandir Gallery','url'=>SITE_URL.'/gallery.php'],JSON_UNESCAPED_SLASHES);
$seo=['title'=>$pageTitle,'description'=>'Beautiful photos and videos of Ayodhya Ram Mandir, Ram Lalla, Shree Ram, Hanuman Ji.','keywords'=>'Ram Mandir photos, Ayodhya gallery, Ram Lalla images'];
$allGallery = dbFetchAll("SELECT * FROM gallery WHERE status = 1 ORDER BY sort_order, id");
$userUploads = dbFetchAll("SELECT * FROM user_uploads WHERE is_approved = 1 ORDER BY created_at DESC LIMIT 20");
include __DIR__ . '/includes/header.php';
?>
<div class="page-hero">
    <div class="container text-center">
        <div class="breadcrumb-nav justify-content-center">
            <a href="<?php echo SITE_URL; ?>/"><i class="fas fa-home"></i> <?php echo __t('Home','होम'); ?></a>
            <span>›</span><span><?php echo __t('Gallery','गैलरी'); ?></span>
        </div>
        <h1 class="page-hero-title"><?php echo __t('🙏 Sacred Gallery','🙏 पवित्र गैलरी'); ?></h1>
        <p class="page-hero-subtitle"><?php echo __t('Photos & Videos of Ayodhya Ram Mandir, Shree Ram & Sacred Places','अयोध्या राम मंदिर, श्री राम और पवित्र स्थानों की तस्वीरें'); ?></p>
    </div>
</div>
<section class="section-padding" style="background:#FFF8F0;">
    <div class="container">
        <div class="gallery-tabs mb-5 text-center">
            <button class="gallery-tab active" onclick="filterGallery('all',this)"><i class="fas fa-th-large"></i> <?php echo __t('All','सभी'); ?></button>
            <button class="gallery-tab" onclick="filterGallery('image',this)"><i class="fas fa-image"></i> <?php echo __t('Photos','तस्वीरें'); ?></button>
            <button class="gallery-tab" onclick="filterGallery('video',this)"><i class="fas fa-video"></i> <?php echo __t('Videos','वीडियो'); ?></button>
            <button class="gallery-tab" onclick="filterGallery('user',this)"><i class="fas fa-users"></i> <?php echo __t('Devotees','भक्त'); ?></button>
        </div>
        <div class="gallery-grid" id="galleryGrid">
            <?php foreach($allGallery as $item): $isV=$item['file_type']==='video'; $t=e($lang==='hi'?($item['title_hi']??$item['title']):$item['title']); ?>
            <div class="gallery-item" data-type="<?php echo $isV?'video':'image'; ?>" onclick="openLightbox('<?php echo e($item['file_path']); ?>','<?php echo $item['file_type']; ?>','<?php echo addslashes($t); ?>')">
                <?php if($isV): ?><video src="<?php echo e($item['file_path']); ?>" preload="metadata" muted playsinline></video><div class="gallery-overlay"><i class="fas fa-play-circle"></i></div><span class="gallery-type-badge" style="background:rgba(0,100,255,.85)"><i class="fas fa-video"></i> Video</span>
                <?php else: ?><img src="<?php echo e($item['file_path']); ?>" alt="<?php echo $t; ?>" loading="lazy"><div class="gallery-overlay"><i class="fas fa-expand-alt"></i></div><?php endif; ?>
                <div class="gallery-caption"><?php echo $t; ?></div>
            </div>
            <?php endforeach; ?>
            <?php foreach($userUploads as $item): $isV=$item['file_type']==='video'; ?>
            <div class="gallery-item" data-type="user" onclick="openLightbox('<?php echo e($item['file_path']); ?>','<?php echo e($item['file_type']); ?>','<?php echo addslashes(e($item['name']).($item['city']?' - '.e($item['city']):'')); ?>')">
                <?php if($isV): ?><video src="<?php echo e($item['file_path']); ?>" preload="metadata" muted playsinline></video><div class="gallery-overlay"><i class="fas fa-play-circle"></i></div>
                <?php else: ?><img src="<?php echo e($item['file_path']); ?>" alt="<?php echo e($item['name']); ?>" loading="lazy"><div class="gallery-overlay"><i class="fas fa-expand-alt"></i></div><?php endif; ?>
                <span class="gallery-type-badge" style="background:rgba(0,150,0,.85)"><i class="fas fa-user"></i> Devotee</span>
                <div class="gallery-caption"><?php echo e($item['name']); ?><?php echo $item['city']?' · '.e($item['city']):''; ?></div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php if(empty($allGallery)&&empty($userUploads)): ?><div class="text-center py-5"><i class="fas fa-images fa-3x text-muted mb-3 d-block"></i><p class="text-muted"><?php echo __t('Gallery loading...','गैलरी लोड हो रही है...'); ?></p></div><?php endif; ?>
    </div>
</section>
<section class="section-padding" style="background:linear-gradient(135deg,#FFF3E0,#FFE0B2);">
    <div class="container"><div class="section-header text-center"><span class="section-label"><i class="fas fa-camera"></i> <?php echo __t('Share Your Visit','अपनी यात्रा साझा करें'); ?></span><h2 class="section-title"><?php echo __t('Upload Your Ayodhya Photos','अपनी अयोध्या की तस्वीरें अपलोड करें'); ?></h2></div>
        <div class="row justify-content-center"><div class="col-lg-8"><div class="upload-form-wrap">
            <form action="api/upload.php" method="POST" enctype="multipart/form-data" id="galleryUploadForm">
                <input type="hidden" name="csrf_token" value="<?php echo generateCSRFToken(); ?>">
                <div class="row g-3">
                    <div class="col-md-6"><input type="text" name="name" class="form-control form-control-lg" placeholder="<?php echo __t('Your Name *','आपका नाम *'); ?>" required></div>
                    <div class="col-md-6"><input type="text" name="city" class="form-control form-control-lg" placeholder="<?php echo __t('Your City','आपका शहर'); ?>"></div>
                    <div class="col-12"><input type="text" name="message" class="form-control" placeholder="<?php echo __t('Your message...','आपका संदेश...'); ?>"></div>
                    <div class="col-12">
                        <div class="file-upload-area" id="galleryUploadArea">
                            <i class="fas fa-cloud-upload-alt"></i><p><?php echo __t('Click or drag photo/video','फोटो/वीडियो यहाँ खींचें या क्लिक करें'); ?></p><span><?php echo __t('JPG, PNG, MP4 | Max 20MB','JPG, PNG, MP4 | अधिकतम 20MB'); ?></span>
                            <input type="file" name="media" id="galleryFile" accept="image/*,video/mp4,video/webm" required>
                        </div><div id="galleryPreview" class="mt-3 text-center"></div>
                    </div>
                    <div class="col-12 text-center"><button type="submit" class="btn-hero btn-hero-primary btn-lg px-5"><i class="fas fa-share-alt"></i> <?php echo __t('Share','साझा करें'); ?></button></div>
                </div>
            </form>
        </div></div></div>
    </div>
</section>
<div class="lightbox-overlay" id="lightboxOverlay" onclick="if(event.target===this)closeLightbox()">
    <div class="lightbox-content"><button class="lightbox-close" onclick="closeLightbox()"><i class="fas fa-times"></i></button><div id="lightboxMedia"></div><div id="lightboxCaption" class="lightbox-caption"></div></div>
</div>
<?php include __DIR__ . '/includes/footer.php'; ?>
<style>
.gallery-tabs{display:flex;gap:10px;flex-wrap:wrap;justify-content:center}.gallery-tab{padding:10px 22px;border-radius:50px;border:2px solid rgba(245,89,0,.2);background:#fff;color:#F55900;font-weight:700;font-size:14px;cursor:pointer;transition:all .3s}.gallery-tab:hover,.gallery-tab.active{background:linear-gradient(135deg,#F55900,#FF8237);color:#fff;border-color:transparent;box-shadow:0 5px 15px rgba(245,89,0,.3)}.gallery-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(240px,1fr));gap:12px}.gallery-item{border-radius:14px;overflow:hidden;position:relative;aspect-ratio:4/3;cursor:pointer;background:#eee;transition:transform .3s}.gallery-item:hover{transform:scale(1.02)}.gallery-item img,.gallery-item video{width:100%;height:100%;object-fit:cover}.gallery-overlay{position:absolute;inset:0;background:rgba(26,5,0,.5);display:flex;align-items:center;justify-content:center;opacity:0;transition:opacity .3s}.gallery-item:hover .gallery-overlay{opacity:1}.gallery-overlay i{color:#FFD700;font-size:36px}.gallery-type-badge{position:absolute;top:8px;left:8px;background:rgba(245,89,0,.9);color:#fff;padding:3px 10px;border-radius:20px;font-size:11px;font-weight:700;z-index:2}.gallery-caption{position:absolute;bottom:0;left:0;right:0;background:linear-gradient(to top,rgba(0,0,0,.7),transparent);padding:25px 10px 8px;color:#fff;font-size:12px;font-weight:600}.lightbox-overlay{position:fixed;inset:0;background:rgba(0,0,0,.97);z-index:100000;display:none;align-items:center;justify-content:center;padding:20px}.lightbox-overlay.active{display:flex}.lightbox-content{position:relative;text-align:center;max-width:90vw}.lightbox-close{position:absolute;top:-50px;right:0;background:rgba(255,255,255,.1);border:none;color:#fff;font-size:22px;width:44px;height:44px;border-radius:50%;cursor:pointer;display:flex;align-items:center;justify-content:center}#lightboxMedia img,#lightboxMedia video{max-width:90vw;max-height:80vh;border-radius:12px;object-fit:contain}.lightbox-caption{color:#FFD700;font-size:16px;font-weight:700;margin-top:10px}@media(max-width:768px){.gallery-grid{grid-template-columns:repeat(2,1fr);gap:8px}}
</style>
<script>
function filterGallery(type,btn){document.querySelectorAll('.gallery-tab').forEach(t=>t.classList.remove('active'));btn.classList.add('active');document.querySelectorAll('.gallery-item').forEach(item=>{item.style.display=(type==='all'||item.dataset.type===type)?'block':'none';})}
function openLightbox(src,type,caption){const o=document.getElementById('lightboxOverlay');document.getElementById('lightboxCaption').textContent=caption;document.getElementById('lightboxMedia').innerHTML=type==='video'?`<video src="${src}" controls autoplay style="max-width:90vw;max-height:80vh;border-radius:12px;"></video>`:`<img src="${src}" alt="${caption}">`;o.classList.add('active');document.body.style.overflow='hidden';}
function closeLightbox(){document.getElementById('lightboxOverlay').classList.remove('active');document.getElementById('lightboxMedia').innerHTML='';document.body.style.overflow='';}
document.addEventListener('keydown',e=>{if(e.key==='Escape')closeLightbox();});
const gf=document.getElementById('galleryFile'),ga=document.getElementById('galleryUploadArea'),gp=document.getElementById('galleryPreview');
if(ga){ga.addEventListener('click',()=>gf.click());gf?.addEventListener('change',()=>{const f=gf.files[0];if(!f)return;const u=URL.createObjectURL(f);gp.innerHTML=f.type.startsWith('video/')?`<video src="${u}" controls class="upload-preview-media"></video>`:`<img src="${u}" class="upload-preview-media">`;});}
document.getElementById('galleryUploadForm')?.addEventListener('submit',async function(e){e.preventDefault();const btn=this.querySelector('button[type="submit"]');btn.disabled=true;btn.innerHTML='<i class="fas fa-spinner fa-spin"></i>';try{const res=await fetch('api/upload.php',{method:'POST',body:new FormData(this)});const d=await res.json();alert(d.success?'Thank you! Upload submitted for review.':(d.message||'Failed'));if(d.success){this.reset();gp.innerHTML='';}}catch(e){alert('Upload failed');}btn.disabled=false;btn.innerHTML='<i class="fas fa-share-alt"></i> Share';});
</script>
