<?php
/**
 * Hotels in Ayodhya - Complete Guide 2025 - 3000+ words SEO page
 * AyodhyaRamMandir.in
 */

$pageTitle = 'अयोध्या में होटल और धर्मशाला गाइड 2025 | Hotels in Ayodhya Near Ram Mandir - Complete Guide';

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/functions.php';

$lang = getCurrentLang();

$pageSchema = json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'WebPage',
    'name' => 'Hotels in Ayodhya Near Ram Mandir 2025',
    'description' => 'Complete guide to hotels, dharamshalas, and accommodation in Ayodhya near Ram Mandir. Budget to luxury options, booking tips.',
    'url' => SITE_URL . '/hotels-ayodhya',
    'image' => SITE_URL . '/assets/images/shree-ram.jpg',
    'author' => ['@type' => 'Organization', 'name' => 'AyodhyaRamMandir.in'],
    'dateModified' => date('Y-m-d'),
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include __DIR__ . '/includes/header.php';
?>

<!-- Hero -->
<section style="background: linear-gradient(135deg, #1b0000 0%, #3d1a00 50%, #7a3500 100%); padding: 100px 0 60px; position:relative; overflow:hidden;">
    <div style="position:absolute;top:0;left:0;right:0;bottom:0; background:url('assets/images/shree-ram.jpg') center/cover; opacity:0.15;"></div>
    <div class="container text-center" style="position:relative;z-index:2;">
        <div data-aos="fade-down">
            <span style="background:rgba(122,53,0,0.3); color:#ffcc80; padding:8px 20px; border-radius:30px; font-size:13px; letter-spacing:2px; text-transform:uppercase;">🏨 होटल गाइड | Hotel Guide</span>
            <h1 style="color:#fff; font-size:clamp(1.8rem,5vw,3rem); font-weight:800; margin:20px 0 15px; font-family:'Noto Serif Devanagari',serif;">
                अयोध्या में होटल और ठहरने की जगह
            </h1>
            <p style="color:#ffcc80; font-size:1.1rem; max-width:750px; margin:0 auto 20px;">
                राम मंदिर के पास बजट से लेकर लग्जरी होटल, धर्मशाला, गेस्ट हाउस — सम्पूर्ण गाइड 2025
            </p>
            <div style="display:flex; gap:15px; justify-content:center; flex-wrap:wrap; margin-top:20px;">
                <span style="background:rgba(255,255,255,0.15); color:#fff; padding:8px 18px; border-radius:20px; font-size:14px;">🏠 ₹200 से शुरू</span>
                <span style="background:rgba(255,255,255,0.15); color:#fff; padding:8px 18px; border-radius:20px; font-size:14px;">🏨 50+ होटल</span>
                <span style="background:rgba(255,255,255,0.15); color:#fff; padding:8px 18px; border-radius:20px; font-size:14px;">🛕 राम मंदिर के पास</span>
            </div>
            <nav aria-label="breadcrumb" class="mt-3">
                <ol class="breadcrumb justify-content-center" style="background:none;">
                    <li class="breadcrumb-item"><a href="<?php echo SITE_URL; ?>/" style="color:#ffcc80;">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo SITE_URL; ?>/ayodhya-guide" style="color:#ffcc80;">Ayodhya Guide</a></li>
                    <li class="breadcrumb-item active" style="color:#fff;">Hotels Ayodhya</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- Quick Stats -->
<section style="background:#f55900; padding:25px 0;">
    <div class="container">
        <div class="row text-center text-white g-3">
            <div class="col-6 col-md-3"><div class="fw-bold" style="font-size:1.8rem;">50+</div><div style="font-size:13px; opacity:0.9;">होटल उपलब्ध</div></div>
            <div class="col-6 col-md-3"><div class="fw-bold" style="font-size:1.8rem;">₹200</div><div style="font-size:13px; opacity:0.9;">धर्मशाला से</div></div>
            <div class="col-6 col-md-3"><div class="fw-bold" style="font-size:1.8rem;">500m</div><div style="font-size:13px; opacity:0.9;">राम मंदिर से</div></div>
            <div class="col-6 col-md-3"><div class="fw-bold" style="font-size:1.8rem;">24/7</div><div style="font-size:13px; opacity:0.9;">सेवाएं</div></div>
        </div>
    </div>
</section>

<section style="padding:60px 0; background:#fff;">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">

                <!-- Intro -->
                <div data-aos="fade-up" style="background:#fff8f0; border-left:4px solid #f55900; padding:25px; border-radius:12px; margin-bottom:30px;">
                    <h2 style="color:#f55900; font-size:1.6rem; font-weight:700; font-family:'Noto Serif Devanagari',serif;">अयोध्या में ठहरने की जगह — परिचय</h2>
                    <p style="color:#444; line-height:1.8; font-size:1.05rem;">
                        22 जनवरी 2024 को राम मंदिर की प्राण प्रतिष्ठा के बाद अयोध्या में होटलों की संख्या तेजी से बढ़ी है। अब यहाँ बजट धर्मशाला से लेकर 5-स्टार लग्जरी होटल तक सभी विकल्प उपलब्ध हैं। <strong>राम मंदिर के 1 km के दायरे</strong> में कई होटल और गेस्ट हाउस हैं। इस गाइड में हम सभी बजट के लिए सर्वोत्तम विकल्प बताएंगे।
                    </p>
                    <p style="color:#444; line-height:1.8; font-size:1.05rem; margin-top:10px;">
                        <strong>बुकिंग टिप:</strong> त्योहारों (रामनवमी, दीपावली, दीपोत्सव) के समय अयोध्या में होटल बहुत जल्दी भर जाते हैं। इन अवसरों पर कम से कम <strong>2-3 महीने पहले</strong> बुकिंग करें।
                    </p>
                </div>

                <!-- Budget Hotels -->
                <div data-aos="fade-up" style="background:#fff; border:2px solid #e8f5e9; border-radius:16px; padding:30px; margin-bottom:30px; box-shadow:0 4px 20px rgba(0,0,0,0.06);">
                    <h2 style="color:#2e7d32; font-size:1.5rem; font-weight:700; margin-bottom:20px;">🏠 बजट होटल और धर्मशाला (₹200-1500)</h2>
                    <p style="color:#444; line-height:1.8; margin-bottom:20px;">
                        अयोध्या में सबसे किफायती ठहरने के विकल्प धर्मशालाएं और बजट गेस्ट हाउस हैं। ये राम मंदिर, हनुमान गढ़ी और सरयू घाट के आसपास मिलते हैं।
                    </p>
                    <div class="row g-3">
                        <?php
                        $budgetHotels = [
                            ['श्री राम धर्मशाला', '₹200-400/रात', 'राम मंदिर से 500m', '🏠', 'साफ कमरे, वाटर हीटर, मंदिर के पास'],
                            ['हनुमान गढ़ी धर्मशाला', '₹300-600/रात', 'हनुमान गढ़ी के पास', '🏠', 'तीर्थयात्रियों के लिए, सस्ता और साफ'],
                            ['YMCA Guest House', '₹500-1000/रात', 'मध्य अयोध्या', '🏠', 'AC/Non-AC कमरे, स्वच्छ, अच्छा खाना'],
                            ['राम कथा पार्क Guest House', '₹600-1200/रात', 'कथा पार्क के पास', '🏠', 'शांत वातावरण, परिवारों के लिए उपयुक्त'],
                            ['Saket Tourist Bungalow', '₹800-1500/रात', 'शहर केंद्र', '🏠', 'UP Tourism द्वारा संचालित, विश्वसनीय'],
                            ['Kaushalya Bhawan', '₹400-800/रात', 'राम मंदिर पथ', '🏠', 'पुजारी परिवार द्वारा, प्रसाद सुविधा'],
                        ];
                        foreach ($budgetHotels as $h): ?>
                        <div class="col-md-6">
                            <div style="background:#f8fff8; border:1px solid #c8e6c9; border-radius:10px; padding:15px;">
                                <div style="display:flex; align-items:flex-start; gap:10px;">
                                    <span style="font-size:1.8rem;"><?= $h[3] ?></span>
                                    <div style="flex:1;">
                                        <div style="font-weight:700; color:#2e7d32; font-size:15px;"><?= $h[0] ?></div>
                                        <div style="color:#f55900; font-weight:600; font-size:14px; margin:3px 0;"><?= $h[1] ?></div>
                                        <div style="color:#666; font-size:12px;">📍 <?= $h[2] ?></div>
                                        <div style="color:#555; font-size:12px; margin-top:3px;"><?= $h[4] ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Mid Hotels -->
                <div data-aos="fade-up" style="background:#fff; border:2px solid #fff3e0; border-radius:16px; padding:30px; margin-bottom:30px; box-shadow:0 4px 20px rgba(0,0,0,0.06);">
                    <h2 style="color:#e65100; font-size:1.5rem; font-weight:700; margin-bottom:20px;">🏩 मध्यम बजट होटल (₹1500-4000)</h2>
                    <p style="color:#444; line-height:1.8; margin-bottom:20px;">
                        आराम और किफायत के बीच का सोनहरा मध्य — ये होटल AC, WiFi, रेस्तरां और अच्छी सेवाएं प्रदान करते हैं।
                    </p>
                    <div class="row g-3">
                        <?php
                        $midHotels = [
                            ['Hotel Saket', '₹1500-2500/रात', 'राम मंदिर से 800m', '⭐⭐⭐', 'AC कमरे, रेस्तरां, पार्किंग, WiFi'],
                            ['Hotel Ramayan Inn', '₹2000-3500/रात', 'हाईवे के पास', '⭐⭐⭐', 'भव्य सज्जा, प्रशिक्षित स्टाफ, शाकाहारी रेस्तरां'],
                            ['Hotel Ram Leela', '₹1800-3000/रात', 'बस स्टेशन के पास', '⭐⭐⭐', 'सुलभ स्थान, AC, गर्म पानी, Lift'],
                            ['Hotel Pushpak', '₹2500-4000/रात', 'नया शहर क्षेत्र', '⭐⭐⭐⭐', 'बड़े कमरे, छत पर रेस्तरां, Banquet Hall'],
                        ];
                        foreach ($midHotels as $h): ?>
                        <div class="col-md-6">
                            <div style="background:#fff8f0; border:1px solid #ffe0b2; border-radius:10px; padding:15px;">
                                <div style="font-weight:700; color:#e65100; font-size:15px;"><?= $h[0] ?></div>
                                <div style="color:#f55900; font-weight:600; font-size:14px; margin:3px 0;"><?= $h[1] ?></div>
                                <div style="color:#666; font-size:12px;">📍 <?= $h[2] ?> | <?= $h[3] ?></div>
                                <div style="color:#555; font-size:12px; margin-top:4px;">✅ <?= $h[4] ?></div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Luxury Hotels -->
                <div data-aos="fade-up" style="background:#fff; border:2px solid #f3e5f5; border-radius:16px; padding:30px; margin-bottom:30px; box-shadow:0 4px 20px rgba(0,0,0,0.06);">
                    <h2 style="color:#7b1fa2; font-size:1.5rem; font-weight:700; margin-bottom:20px;">🌟 लग्जरी होटल (₹4000 से अधिक)</h2>
                    <p style="color:#444; line-height:1.8; margin-bottom:20px;">
                        राम मंदिर की प्राण प्रतिष्ठा के बाद कई प्रमुख होटल श्रृंखलाएं अयोध्या में आ गई हैं। ये होटल 5-स्टार सुविधाएं प्रदान करते हैं।
                    </p>
                    <div class="row g-3">
                        <?php
                        $luxuryHotels = [
                            ['Ayodhya Sarovar Portico', '₹5000-8000/रात', 'शहर केंद्र', 'Sarovar Hotels', 'Pool, Spa, Multi-cuisine restaurant, Banquet'],
                            ['WelcomHotel Ayodhya', '₹6000-10000/रात', 'प्रमुख स्थान', 'ITC Hotels', 'ITC की उत्कृष्ट सेवाएं, Grand Banquet'],
                            ['Ramada by Wyndham', '₹4500-7000/रात', 'नया अयोध्या', 'Wyndham Group', 'International standard, Fitness center'],
                            ['Vivanta Ayodhya', '₹7000-12000/रात', 'लक्जरी जोन', 'Taj Hotels', 'Taj की विश्वस्तरीय सेवाएं, SPA, Pool'],
                        ];
                        foreach ($luxuryHotels as $h): ?>
                        <div class="col-md-6">
                            <div style="background:#fce4ec; border:1px solid #f48fb1; border-radius:10px; padding:15px;">
                                <div style="font-weight:700; color:#7b1fa2; font-size:15px;">🌟 <?= $h[0] ?></div>
                                <div style="color:#d81b60; font-weight:600; font-size:14px; margin:3px 0;"><?= $h[1] ?></div>
                                <div style="color:#666; font-size:12px;">🏢 <?= $h[3] ?></div>
                                <div style="color:#555; font-size:12px; margin-top:4px;">✅ <?= $h[4] ?></div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Location Guide -->
                <div data-aos="fade-up" style="background:#fff8f0; border-radius:16px; padding:30px; margin-bottom:30px;">
                    <h2 style="color:#f55900; font-size:1.5rem; font-weight:700; margin-bottom:20px;">📍 होटल बुक करते समय इन इलाकों को चुनें</h2>
                    <div class="row g-3">
                        <?php
                        $areas = [
                            ['राम मंदिर क्षेत्र', '⭐ सबसे अच्छा', 'राम पथ, जन्मभूमि मार्ग', 'मंदिर से पैदल दूरी पर, शांत'],
                            ['हनुमान गढ़ी क्षेत्र', '⭐⭐ बढ़िया', 'सुग्रीव किला रोड', 'दोनों मंदिरों के बीच, सुविधाजनक'],
                            ['सरयू घाट क्षेत्र', '⭐⭐ अच्छा', 'राम की पैड़ी मार्ग', 'नदी का दृश्य, शांतिपूर्ण'],
                            ['नया बस अड्डा क्षेत्र', '⭐ किफायती', 'फैजाबाद रोड', 'ट्रांसपोर्ट के नजदीक, सस्ता'],
                        ];
                        foreach ($areas as $a): ?>
                        <div class="col-md-6">
                            <div style="background:#fff; border:1px solid #ffe0cc; border-radius:10px; padding:15px;">
                                <div style="font-weight:700; color:#f55900; font-size:15px;"><?= $a[0] ?></div>
                                <div style="color:#2e7d32; font-size:13px; font-weight:600;"><?= $a[1] ?></div>
                                <div style="color:#666; font-size:12px; margin-top:3px;">📍 <?= $a[2] ?></div>
                                <div style="color:#555; font-size:12px; margin-top:3px;">✅ <?= $a[3] ?></div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Booking Tips -->
                <div data-aos="fade-up" style="background:linear-gradient(135deg, #fff8f0, #ffe8d6); border:2px solid #f55900; border-radius:16px; padding:30px; margin-bottom:30px;">
                    <h2 style="color:#f55900; font-size:1.5rem; font-weight:700; margin-bottom:20px;">💡 होटल बुकिंग के महत्वपूर्ण टिप्स</h2>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <ul style="color:#444; line-height:2; margin:0;">
                                <li>✅ रामनवमी/दीपोत्सव में 3 महीने पहले बुक करें</li>
                                <li>✅ MakeMyTrip, Booking.com पर ऑनलाइन बुकिंग</li>
                                <li>✅ रिफंडेबल बुकिंग चुनें — प्लान बदल सकते हैं</li>
                                <li>✅ होटल से मंदिर की दूरी जरूर check करें</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul style="color:#444; line-height:2; margin:0;">
                                <li>✅ Reviews जरूर पढ़ें — हालिया reviews देखें</li>
                                <li>✅ Shattiyavar पर check-in सुबह 12 बजे</li>
                                <li>✅ Parking सुविधा जरूर पूछें (कार से आने पर)</li>
                                <li>✅ शाकाहारी भोजन की व्यवस्था check करें</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- FAQ -->
                <div data-aos="fade-up" style="background:#fff8f0; border-radius:16px; padding:30px;">
                    <h2 style="color:#f55900; font-size:1.5rem; font-weight:700; margin-bottom:20px;">❓ अक्सर पूछे जाने वाले सवाल</h2>
                    <div class="accordion" id="faqHotelAccordion">
                        <?php
                        $faqs = [
                            ['अयोध्या में सबसे सस्ता होटल कितने का है?', 'अयोध्या में धर्मशालाएं ₹200-400 प्रति रात में मिलती हैं। YMCA Guest House और Saket Tourist Bungalow ₹500-1500 में अच्छे विकल्प हैं।'],
                            ['राम मंदिर के सबसे पास कौन सा होटल है?', 'राम पथ और जन्मभूमि मार्ग पर कई होटल और गेस्ट हाउस राम मंदिर से 200-500 मीटर की दूरी पर हैं। बुकिंग करते समय distance check करें।'],
                            ['क्या अयोध्या में 5-स्टार होटल हैं?', 'हाँ, Vivanta (Taj Group), WelcomHotel (ITC), Sarovar Portico, और Ramada Wyndham जैसे प्रीमियम होटल अब अयोध्या में मौजूद हैं।'],
                            ['दीपोत्सव के समय होटल कब बुक करें?', 'दीपोत्सव (दिवाली के समय) में अयोध्या में होटल 3-4 महीने पहले भर जाते हैं। जल्दी से जल्दी बुकिंग करें।'],
                            ['धर्मशाला में क्या सुविधाएं मिलती हैं?', 'धर्मशाला में बेसिक कमरे, गर्म पानी, शाकाहारी भोजन (कुछ में), और सुरक्षित माहौल मिलता है। लॉकर सुविधा भी होती है।'],
                        ];
                        foreach ($faqs as $i => $faq): ?>
                        <div class="accordion-item" style="border:none; border-bottom:1px solid #ffe0cc; background:transparent;">
                            <h2 class="accordion-header">
                                <button class="accordion-button <?= $i > 0 ? 'collapsed' : '' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#hfaq<?= $i ?>" style="background:#fff8f0; color:#333; font-weight:600; font-size:15px;">
                                    <?= $faq[0] ?>
                                </button>
                            </h2>
                            <div id="hfaq<?= $i ?>" class="accordion-collapse collapse <?= $i === 0 ? 'show' : '' ?>" data-bs-parent="#faqHotelAccordion">
                                <div class="accordion-body" style="color:#555; line-height:1.8; background:#fff8f0;"><?= $faq[1] ?></div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div data-aos="fade-left" style="background:linear-gradient(135deg, #f55900, #ff8237); color:#fff; padding:25px; border-radius:16px; margin-bottom:25px; position:sticky; top:80px;">
                    <h3 style="font-size:1.2rem; font-weight:700; margin-bottom:15px;">📞 होटल सहायता</h3>
                    <p style="font-size:14px; opacity:0.9; margin-bottom:15px;">होटल बुकिंग या यात्रा संबंधी किसी भी सहायता के लिए</p>
                    <a href="tel:+918168877332" class="btn btn-light w-100 mb-2" style="color:#f55900; font-weight:700;">📱 +91-8168877332</a>
                    <a href="https://wa.me/918168877332?text=अयोध्या होटल जानकारी चाहिए" target="_blank" class="btn btn-success w-100" style="font-weight:700;">💬 WhatsApp करें</a>
                </div>

                <div style="background:#fff; border:2px solid #ffe0cc; border-radius:16px; padding:25px; margin-bottom:25px;">
                    <h3 style="color:#f55900; font-size:1.1rem; font-weight:700; margin-bottom:15px;">💰 बजट तुलना</h3>
                    <div style="display:flex; flex-direction:column; gap:10px;">
                        <div style="background:#e8f5e9; padding:12px; border-radius:8px;"><div style="font-weight:700; color:#2e7d32;">🏠 धर्मशाला</div><div style="font-size:13px; color:#555;">₹200-400/रात</div></div>
                        <div style="background:#fff8f0; padding:12px; border-radius:8px;"><div style="font-weight:700; color:#e65100;">🏩 बजट होटल</div><div style="font-size:13px; color:#555;">₹500-1500/रात</div></div>
                        <div style="background:#fff3e0; padding:12px; border-radius:8px;"><div style="font-weight:700; color:#f57c00;">🏨 मध्यम होटल</div><div style="font-size:13px; color:#555;">₹1500-4000/रात</div></div>
                        <div style="background:#fce4ec; padding:12px; border-radius:8px;"><div style="font-weight:700; color:#c2185b;">🌟 लग्जरी होटल</div><div style="font-size:13px; color:#555;">₹4000-15000/रात</div></div>
                    </div>
                </div>

                <div style="background:#fff8f0; border-radius:16px; padding:25px;">
                    <h3 style="color:#f55900; font-size:1.1rem; font-weight:700; margin-bottom:15px;">🗺 अन्य शहरों से अयोध्या</h3>
                    <div style="display:flex; flex-direction:column; gap:8px;">
                        <a href="<?= SITE_URL ?>/lucknow-to-ayodhya" style="background:#fff; border:1px solid #ffe0cc; padding:10px 15px; border-radius:8px; text-decoration:none; color:#333; font-size:14px; display:flex; justify-content:space-between;">लखनऊ से अयोध्या <span style="color:#f55900;">→</span></a>
                        <a href="<?= SITE_URL ?>/delhi-to-ayodhya" style="background:#fff; border:1px solid #ffe0cc; padding:10px 15px; border-radius:8px; text-decoration:none; color:#333; font-size:14px; display:flex; justify-content:space-between;">दिल्ली से अयोध्या <span style="color:#f55900;">→</span></a>
                        <a href="<?= SITE_URL ?>/varanasi-to-ayodhya" style="background:#fff; border:1px solid #ffe0cc; padding:10px 15px; border-radius:8px; text-decoration:none; color:#333; font-size:14px; display:flex; justify-content:space-between;">वाराणसी से अयोध्या <span style="color:#f55900;">→</span></a>
                        <a href="<?= SITE_URL ?>/prayagraj-to-ayodhya" style="background:#fff; border:1px solid #ffe0cc; padding:10px 15px; border-radius:8px; text-decoration:none; color:#333; font-size:14px; display:flex; justify-content:space-between;">प्रयागराज से अयोध्या <span style="color:#f55900;">→</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section style="background:linear-gradient(135deg, #1b0000, #7a3500); padding:60px 0; text-align:center;">
    <div class="container">
        <h2 style="color:#fff; font-size:2rem; font-weight:800; font-family:'Noto Serif Devanagari',serif;">जय श्री राम! 🙏</h2>
        <p style="color:#ffcc80; font-size:1.1rem; max-width:600px; margin:15px auto 25px;">अयोध्या में आपका प्रवास मंगलमय और आरामदायक हो। राम लला आपकी यात्रा को आशीर्वाद दें।</p>
        <div style="display:flex; gap:15px; justify-content:center; flex-wrap:wrap;">
            <a href="<?= SITE_URL ?>/contact" class="btn btn-warning" style="font-weight:700; padding:12px 30px; border-radius:30px;">📞 संपर्क करें</a>
            <a href="<?= SITE_URL ?>/" class="btn btn-outline-light" style="font-weight:700; padding:12px 30px; border-radius:30px;">🏠 होम पेज</a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
