<?php
/**
 * Ayodhya Ram Mandir - Frontend Footer Template
 */

// Get footer links
$footerCol1 = dbFetchAll("SELECT * FROM footer_links WHERE column_name = 'column1' AND status = 1 ORDER BY sort_order");
$footerCol2 = dbFetchAll("SELECT * FROM footer_links WHERE column_name = 'column2' AND status = 1 ORDER BY sort_order");
$footerCol3 = dbFetchAll("SELECT * FROM footer_links WHERE column_name = 'column3' AND status = 1 ORDER BY sort_order");
$footerCol4 = dbFetchAll("SELECT * FROM footer_links WHERE column_name = 'column4' AND status = 1 ORDER BY sort_order");

$footerLogo = getSetting('footer_logo', $siteLogo);
$googleMap = getSetting('google_map', '');
$whatsappNumber = getSetting('contact_whatsapp', '918168877332');

// Get latest blogs for footer
$latestBlogs = dbFetchAll("SELECT title, title_hi, slug FROM blogs WHERE status = 'published' ORDER BY created_at DESC LIMIT 3");

$lang = getCurrentLang();
?>
    <!-- Footer Section -->
    <footer class="main-footer">
        <!-- Footer Top - Saffron Wave -->
        <div class="footer-wave">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0,60 C360,120 720,0 1080,60 C1260,90 1380,80 1440,60 L1440,120 L0,120 Z" fill="#F55900" opacity="0.15"/>
                <path d="M0,80 C360,40 720,100 1080,40 C1260,20 1380,30 1440,50 L1440,120 L0,120 Z" fill="#F55900" opacity="0.3"/>
                <path d="M0,100 C360,80 720,110 1080,80 C1260,60 1380,70 1440,90 L1440,120 L0,120 Z" fill="#F55900"/>
            </svg>
        </div>
        
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <!-- Column 1: About -->
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <a href="<?php echo SITE_URL; ?>/" class="footer-brand">
                                <img src="<?php echo SITE_URL . '/' . $footerLogo; ?>" alt="<?php echo e($siteName); ?>" class="footer-logo-img">
                            </a>
                            <p class="footer-desc">
                                <?php echo __t(
                                    'Your complete digital guide to Shri Ram, Ram Lalla, Ramayan, Hanuman Ji, Mata Sita, and Ayodhya Dham. Experience divine blessings online.',
                                    'श्री राम, राम लalla, रामायण, हनुमान जी, माता सीता और अयोध्या धाम के लिए आपका संपूर्ण डिजिटल गाइड। ऑनलाइन दिव्य आशीर्वाद का अनुभव करें।'
                                ); ?>
                            </p>
                            <div class="footer-social">
                                <?php if ($fb = getSetting('social_facebook')): ?>
                                <a href="<?php echo e($fb); ?>" target="_blank" rel="noopener"><i class="fab fa-facebook-f"></i></a>
                                <?php endif; ?>
                                <?php if ($ig = getSetting('social_instagram')): ?>
                                <a href="<?php echo e($ig); ?>" target="_blank" rel="noopener"><i class="fab fa-instagram"></i></a>
                                <?php endif; ?>
                                <?php if ($yt = getSetting('social_youtube')): ?>
                                <a href="<?php echo e($yt); ?>" target="_blank" rel="noopener"><i class="fab fa-youtube"></i></a>
                                <?php endif; ?>
                                <?php if ($tw = getSetting('social_twitter')): ?>
                                <a href="<?php echo e($tw); ?>" target="_blank" rel="noopener"><i class="fab fa-twitter"></i></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Column 2: Quick Links -->
                    <div class="col-lg-2 col-md-6">
                        <div class="footer-widget">
                            <h4 class="footer-title"><?php echo __t('Quick Links', 'त्वरित लिंक'); ?></h4>
                            <ul class="footer-links">
                                <?php foreach ($footerCol1 as $link): 
                                    $linkTitle = $lang === 'hi' && !empty($link['title_hi']) ? $link['title_hi'] : $link['title'];
                                ?>
                                <li><a href="<?php echo e($link['url']); ?>"><?php echo e($linkTitle); ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- Column 3: Devotion -->
                    <div class="col-lg-2 col-md-6">
                        <div class="footer-widget">
                            <h4 class="footer-title"><?php echo __t('Devotion', 'भक्ति'); ?></h4>
                            <ul class="footer-links">
                                <?php foreach ($footerCol2 as $link): 
                                    $linkTitle = $lang === 'hi' && !empty($link['title_hi']) ? $link['title_hi'] : $link['title'];
                                ?>
                                <li><a href="<?php echo e($link['url']); ?>"><?php echo e($linkTitle); ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- Column 4: Resources -->
                    <div class="col-lg-2 col-md-6">
                        <div class="footer-widget">
                            <h4 class="footer-title"><?php echo __t('Resources', 'संसाधन'); ?></h4>
                            <ul class="footer-links">
                                <?php foreach ($footerCol3 as $link): 
                                    $linkTitle = $lang === 'hi' && !empty($link['title_hi']) ? $link['title_hi'] : $link['title'];
                                ?>
                                <li><a href="<?php echo e($link['url']); ?>"><?php echo e($linkTitle); ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- Column 5: Contact -->
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h4 class="footer-title"><?php echo __t('Contact Us', 'संपर्क करें'); ?></h4>
                            <ul class="footer-contact">
                                <li>
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span><?php echo e(getSetting('site_address', 'Ayodhya Dham, Uttar Pradesh, India')); ?></span>
                                </li>
                                <li>
                                    <i class="fas fa-phone"></i>
                                    <a href="tel:+918168877332">+91-8168877332</a>
                                </li>
                                <li>
                                    <i class="fas fa-envelope"></i>
                                    <a href="mailto:info@ayodhyarammandir.in">info@ayodhyarammandir.in</a>
                                </li>
                                <li>
                                    <i class="fas fa-envelope"></i>
                                    <a href="mailto:officialayodhyarammandir.in@gmail.com">officialayodhyarammandir.in@gmail.com</a>
                                </li>
                            </ul>
                            
                            <!-- Newsletter -->
                            <div class="footer-newsletter mt-3">
                                <h5><?php echo __t('Newsletter', 'न्यूजलेटर'); ?></h5>
                                <form action="<?php echo SITE_URL; ?>/api/subscribe.php" method="POST" class="newsletter-form" id="newsletterForm">
                                    <div class="input-group">
                                        <input type="email" name="email" class="form-control" placeholder="<?php echo __t('Enter your email', 'अपना ईमेल दर्ज करें'); ?>" required>
                                        <button type="submit" class="btn"><i class="fas fa-paper-plane"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Google Map -->
                <?php if (!empty($googleMap)): ?>
                <div class="footer-map mt-4">
                    <div class="map-container">
                        <?php echo $googleMap; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <!-- Quick important links row -->
                <div class="row mb-2">
                    <div class="col-12 text-center" style="padding:12px 0; border-bottom:1px solid rgba(255,255,255,0.08);">
                        <div style="display:flex; flex-wrap:wrap; gap:5px 15px; justify-content:center; font-size:0.82rem;">
                            <a href="<?php echo SITE_URL; ?>/about-us" style="color:#FFD48A; text-decoration:none;"><?php echo __t('About Us', 'हमारे बारे में'); ?></a>
                            <span style="color:rgba(255,255,255,0.2)">|</span>
                            <a href="<?php echo SITE_URL; ?>/ram-vanvas-14-varsh" style="color:#FFD48A; text-decoration:none;">🌿 <?php echo __t('14 Varsh Vanvas', '14 वर्ष वनवास'); ?></a>
                            <span style="color:rgba(255,255,255,0.2)">|</span>
                            <a href="<?php echo SITE_URL; ?>/diwali-ayodhya-deepotsav" style="color:#FFD48A; text-decoration:none;">🪔 <?php echo __t('Diwali Deepotsav', 'दीवाली दीपोत्सव'); ?></a>
                            <span style="color:rgba(255,255,255,0.2)">|</span>
                            <a href="<?php echo SITE_URL; ?>/privacy-policy" style="color:#FFD48A; text-decoration:none;"><?php echo __t('Privacy Policy', 'गोपनीयता नीति'); ?></a>
                            <span style="color:rgba(255,255,255,0.2)">|</span>
                            <a href="<?php echo SITE_URL; ?>/contact" style="color:#FFD48A; text-decoration:none;"><?php echo __t('Contact', 'संपर्क'); ?></a>
                            <span style="color:rgba(255,255,255,0.2)">|</span>
                            <a href="<?php echo SITE_URL; ?>/sitemap.xml" style="color:#FFD48A; text-decoration:none;">Sitemap</a>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p class="copyright">
                            &copy; <?php echo date('Y'); ?> <?php echo e($siteName); ?>. 
                            <?php echo __t('All Rights Reserved.', 'सर्वाधिकार सुरक्षित।'); ?> |
                            <a href="<?php echo SITE_URL; ?>/privacy-policy" style="color:#FFD48A; font-size:0.82rem;"><?php echo __t('Privacy Policy', 'गोपनीयता नीति'); ?></a>
                        </p>
                    </div>
                    <div class="col-md-6 text-end">
                        <p class="footer-credit">
                            <i class="fas fa-om"></i> 
                            <?php echo __t('Jai Shri Ram', 'जय श्री राम'); ?> |
                            <?php echo __t('Made with devotion', 'भक्ति से बनाया गया'); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Floating Buttons -->
    <div class="floating-buttons">
        <!-- WhatsApp -->
        <a href="https://wa.me/<?php echo $whatsappNumber; ?>?text=Jai%20Shri%20Ram!%20I%20have%20a%20question%20about%20Ayodhya%20Ram%20Mandir." 
           class="float-btn whatsapp-btn" 
           target="_blank" 
           rel="noopener"
           title="<?php echo __t('Chat on WhatsApp', 'व्हाट्सएप पर चैट करें'); ?>">
            <i class="fab fa-whatsapp"></i>
        </a>
        
        <!-- Chatbot -->
        <button class="float-btn chatbot-btn" id="chatbotToggle" title="<?php echo __t('Ram Mandir Guide Bot', 'राम मंदिर गाइड बॉट'); ?>">
            <i class="fas fa-robot"></i>
        </button>
        
        <!-- Back to Top -->
        <button class="float-btn back-to-top" id="backToTop" title="<?php echo __t('Back to Top', 'ऊपर जाएं'); ?>">
            <i class="fas fa-chevron-up"></i>
        </button>
    </div>
    
    <!-- Chatbot Panel -->
    <div class="chatbot-panel" id="chatbotPanel">
        <div class="chatbot-header">
            <div class="chatbot-avatar">
                <img src="<?php echo assetUrl('images/chatbot-avatar.png'); ?>" alt="Chatbot">
            </div>
            <div class="chatbot-info">
                <h5><?php echo __t('Ram Mandir Guide Bot', 'राम मंदिर गाइड बॉट'); ?></h5>
                <span class="status"><i class="fas fa-circle"></i> <?php echo __t('Online', 'ऑनलाइन'); ?></span>
            </div>
            <button class="chatbot-close" id="chatbotClose"><i class="fas fa-times"></i></button>
        </div>
        <div class="chatbot-messages" id="chatbotMessages">
            <div class="message bot-message">
                <div class="message-content">
                    <p><?php echo __t(
                        'Jai Shri Ram! I am your Ram Mandir Guide. How can I help you today? Ask me about Ayodhya, Ram Mandir, Ramayan, or travel guides.',
                        'जय श्री राम! मैं आपका राम मंदिर गाइड हूँ। मैं आज आपकी कैसे मदद कर सकता हूँ? अयोध्या, राम मंदिर, रामायण, या यात्रा गाइड के बारे में पूछें।'
                    ); ?></p>
                </div>
            </div>
        </div>
        <div class="chatbot-quick-links">
            <button class="quick-btn" data-question="<?php echo __t('How to reach Ayodhya', 'अयोध्या कैसे पहुंचे'); ?>">
                <?php echo __t('Reach Ayodhya', 'अयोध्या पहुंचें'); ?>
            </button>
            <button class="quick-btn" data-question="<?php echo __t('Ram Mandir timings', 'राम मंदिर समय'); ?>">
                <?php echo __t('Darshan Timings', 'दर्शन समय'); ?>
            </button>
            <button class="quick-btn" data-question="<?php echo __t('What to carry for darshan', 'दर्शन के लिए क्या लेकर जाएं'); ?>">
                <?php echo __t('Darshan Guide', 'दर्शन गाइड'); ?>
            </button>
        </div>
        <div class="chatbot-input">
            <input type="text" id="chatbotInput" placeholder="<?php echo __t('Type your question...', 'अपना प्रश्न लिखें...'); ?>">
            <button id="chatbotSend"><i class="fas fa-paper-plane"></i></button>
        </div>
    </div>
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="<?php echo assetUrl('js/main.js'); ?>"></script>
    
    <!-- AdSense Footer Code -->
    <?php echo getAdSenseCode('footer'); ?>
</body>
</html>