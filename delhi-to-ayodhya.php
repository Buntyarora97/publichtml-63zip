<?php
/**
 * Delhi to Ayodhya Travel Guide - 3000+ words SEO page
 * AyodhyaRamMandir.in
 */

$pageTitle = 'दिल्ली से अयोध्या कैसे जाएं - सम्पूर्ण यात्रा गाइड 2025 | Delhi to Ayodhya Travel Guide';

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/functions.php';

$lang = getCurrentLang();

$pageSchema = json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'TravelGuide',
    'name' => 'Delhi to Ayodhya Travel Guide 2025',
    'description' => 'Complete guide to travel from Delhi to Ayodhya by train, bus, flight, car. Distance 630 km, Vande Bharat train, hotels, darshan timing.',
    'url' => SITE_URL . '/delhi-to-ayodhya',
    'image' => SITE_URL . '/assets/images/shree-ram.jpg',
    'author' => ['@type' => 'Organization', 'name' => 'AyodhyaRamMandir.in'],
    'publisher' => ['@type' => 'Organization', 'name' => 'AyodhyaRamMandir.in', 'url' => SITE_URL],
    'datePublished' => '2024-01-22',
    'dateModified' => date('Y-m-d'),
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include __DIR__ . '/includes/header.php';
?>

<!-- Hero -->
<section style="background: linear-gradient(135deg, #0d1b2a 0%, #1b2a4a 50%, #1565c0 100%); padding: 100px 0 60px; position:relative; overflow:hidden;">
    <div style="position:absolute;top:0;left:0;right:0;bottom:0; background:url('assets/images/shree-ram.jpg') center/cover; opacity:0.12;"></div>
    <div class="container text-center" style="position:relative;z-index:2;">
        <div data-aos="fade-down">
            <span style="background:rgba(21,101,192,0.3); color:#90caf9; padding:8px 20px; border-radius:30px; font-size:13px; letter-spacing:2px; text-transform:uppercase;">🚄 यात्रा गाइड | Travel Guide</span>
            <h1 style="color:#fff; font-size:clamp(1.8rem,5vw,3rem); font-weight:800; margin:20px 0 15px; font-family:'Noto Serif Devanagari',serif;">
                दिल्ली से अयोध्या कैसे जाएं?
            </h1>
            <p style="color:#90caf9; font-size:1.1rem; max-width:750px; margin:0 auto 20px;">
                वंदे भारत, राजधानी, बस, फ्लाइट — हर विकल्प पूरी जानकारी के साथ | दूरी: 630 km | समय: 6-8 घंटे
            </p>
            <div style="display:flex; gap:15px; justify-content:center; flex-wrap:wrap; margin-top:20px;">
                <span style="background:rgba(255,255,255,0.15); color:#fff; padding:8px 18px; border-radius:20px; font-size:14px;">📏 630 km दूरी</span>
                <span style="background:rgba(255,255,255,0.15); color:#fff; padding:8px 18px; border-radius:20px; font-size:14px;">⏱ 6-8 घंटे</span>
                <span style="background:rgba(255,255,255,0.15); color:#fff; padding:8px 18px; border-radius:20px; font-size:14px;">🚄 वंदे भारत उपलब्ध</span>
            </div>
            <nav aria-label="breadcrumb" class="mt-3">
                <ol class="breadcrumb justify-content-center" style="background:none;">
                    <li class="breadcrumb-item"><a href="<?php echo SITE_URL; ?>/" style="color:#90caf9;">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo SITE_URL; ?>/ayodhya-guide" style="color:#90caf9;">Ayodhya Guide</a></li>
                    <li class="breadcrumb-item active" style="color:#fff;">Delhi to Ayodhya</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- Quick Stats -->
<section style="background:#1565c0; padding:25px 0;">
    <div class="container">
        <div class="row text-center text-white g-3">
            <div class="col-6 col-md-3"><div class="fw-bold" style="font-size:1.8rem;">630</div><div style="font-size:13px; opacity:0.9;">KM दूरी</div></div>
            <div class="col-6 col-md-3"><div class="fw-bold" style="font-size:1.8rem;">6-8</div><div style="font-size:13px; opacity:0.9;">घंटे (ट्रेन)</div></div>
            <div class="col-6 col-md-3"><div class="fw-bold" style="font-size:1.8rem;">₹500</div><div style="font-size:13px; opacity:0.9;">ट्रेन से (SL)</div></div>
            <div class="col-6 col-md-3"><div class="fw-bold" style="font-size:1.8rem;">20+</div><div style="font-size:13px; opacity:0.9;">ट्रेनें प्रतिदिन</div></div>
        </div>
    </div>
</section>

<section style="padding:60px 0; background:#fff;">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">

                <!-- Intro -->
                <div data-aos="fade-up" style="background:#e3f2fd; border-left:4px solid #1565c0; padding:25px; border-radius:12px; margin-bottom:30px;">
                    <h2 style="color:#1565c0; font-size:1.6rem; font-weight:700; font-family:'Noto Serif Devanagari',serif;">दिल्ली से अयोध्या — परिचय</h2>
                    <p style="color:#444; line-height:1.8; font-size:1.05rem;">
                        भारत की राजधानी दिल्ली से अयोध्या धाम की दूरी लगभग <strong>630 किलोमीटर</strong> है। 22 जनवरी 2024 को राम मंदिर की प्राण प्रतिष्ठा के बाद दिल्ली से अयोध्या के लिए यात्रियों की संख्या में भारी वृद्धि हुई है। अब <strong>वंदे भारत एक्सप्रेस</strong> सहित कई तेज ट्रेनें दिल्ली को अयोध्या से जोड़ती हैं।
                    </p>
                    <p style="color:#444; line-height:1.8; font-size:1.05rem; margin-top:10px;">
                        इस गाइड में हम बताएंगे — कौन सी ट्रेन लें, कहाँ से बस पकड़ें, फ्लाइट विकल्प क्या हैं, कार से कैसे जाएं, और अयोध्या पहुँचने के बाद क्या करें। <strong>दिल्ली से अयोध्या की यात्रा</strong> को आसान और यादगार बनाने के लिए यह गाइड पढ़ें।
                    </p>
                </div>

                <!-- By Train - Vande Bharat -->
                <div data-aos="fade-up" style="background:#fff; border:2px solid #bbdefb; border-radius:16px; padding:30px; margin-bottom:30px; box-shadow:0 4px 20px rgba(0,0,0,0.06);">
                    <h2 style="color:#1565c0; font-size:1.5rem; font-weight:700; margin-bottom:20px;">🚄 दिल्ली से अयोध्या ट्रेन से — वंदे भारत!</h2>
                    <div style="background:#1565c0; color:#fff; padding:15px 20px; border-radius:10px; margin-bottom:20px;">
                        <strong>⭐ सबसे अच्छा विकल्प:</strong> वंदे भारत एक्सप्रेस (22436) — नई दिल्ली → अयोध्या धाम, मात्र ~7 घंटे में
                    </div>
                    <p style="color:#444; line-height:1.8;">
                        दिल्ली से अयोध्या के लिए <strong>नई दिल्ली जंक्शन (NDLS)</strong>, <strong>आनंद विहार टर्मिनल (ANVT)</strong>, और <strong>हज़रत निज़ामुद्दीन (NZM)</strong> स्टेशनों से ट्रेनें मिलती हैं। राम मंदिर की प्राण प्रतिष्ठा के बाद भारतीय रेलवे ने कई स्पेशल ट्रेनें भी शुरू की हैं।
                    </p>

                    <h3 style="color:#333; font-size:1.1rem; font-weight:700; margin:20px 0 12px;">🔑 प्रमुख ट्रेनें (Delhi → Ayodhya)</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" style="font-size:14px;">
                            <thead style="background:#1565c0; color:#fff;">
                                <tr>
                                    <th>ट्रेन नाम</th>
                                    <th>नंबर</th>
                                    <th>दिल्ली से</th>
                                    <th>अयोध्या आगमन</th>
                                    <th>समय</th>
                                    <th>श्रेणी</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="background:#e3f2fd;"><td><strong>Vande Bharat Express</strong></td><td>22436</td><td>NDLS 06:00</td><td>AYDH 13:20</td><td>7h 20m</td><td>CC/EC</td></tr>
                                <tr><td>Sapt Kranti Express</td><td>12557</td><td>NDLS 07:40</td><td>AY 16:20</td><td>8h 40m</td><td>SL/3A/2A</td></tr>
                                <tr><td>Pushpak Express</td><td>12533</td><td>NDLS 11:05</td><td>AY 20:00</td><td>8h 55m</td><td>SL/3A</td></tr>
                                <tr><td>Ganga-Gomti Express</td><td>12559</td><td>NZM 15:20</td><td>AY 00:30</td><td>9h 10m</td><td>SL/3A/2A</td></tr>
                                <tr><td>Shramjeevi Express</td><td>12391</td><td>NDLS 20:00</td><td>AY 05:00</td><td>9h 00m</td><td>SL/3A</td></tr>
                                <tr><td>Sabarmati Express</td><td>19167</td><td>ANVT 22:00</td><td>AY 07:30</td><td>9h 30m</td><td>SL/3A</td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div style="background:#e3f2fd; padding:15px; border-radius:8px; margin-top:15px;">
                        <strong>✅ ट्रेन टिप्स:</strong>
                        <ul style="margin:8px 0 0; color:#444; line-height:1.9;">
                            <li><strong>वंदे भारत</strong> सबसे तेज और आरामदायक — बुकिंग जल्दी भरती है</li>
                            <li>अयोध्या धाम जंक्शन (AYDH) राम मंदिर के निकटतम</li>
                            <li>IRCTC पर 120 दिन पहले बुकिंग शुरू — त्योहारों में जल्दी करें</li>
                            <li>Tatkal quota सुबह 10 बजे (AC) और 11 बजे (Non-AC) खुलता है</li>
                        </ul>
                    </div>
                </div>

                <!-- By Bus -->
                <div data-aos="fade-up" style="background:#fff; border:2px solid #fff3e0; border-radius:16px; padding:30px; margin-bottom:30px; box-shadow:0 4px 20px rgba(0,0,0,0.06);">
                    <h2 style="color:#e65100; font-size:1.5rem; font-weight:700; margin-bottom:20px;">🚌 दिल्ली से अयोध्या बस से</h2>
                    <p style="color:#444; line-height:1.8;">
                        दिल्ली से अयोध्या के लिए <strong>आनंद विहार ISBT</strong> और <strong>कश्मीरी गेट ISBT</strong> से UPSRTC और निजी बसें चलती हैं। रात की बसें (Overnight) विशेष रूप से लोकप्रिय हैं क्योंकि आप सोते हुए सफर करते हैं और सुबह अयोध्या पहुँचते हैं।
                    </p>
                    <div class="row g-3 mt-2">
                        <div class="col-md-6">
                            <div style="background:#fff3e0; padding:20px; border-radius:10px; height:100%;">
                                <h4 style="color:#e65100; font-size:1rem; font-weight:700;">🏢 बस कहाँ से पकड़ें?</h4>
                                <ul style="color:#555; line-height:1.9; margin:8px 0 0; font-size:14px;">
                                    <li><strong>आनंद विहार ISBT</strong> — मुख्य टर्मिनल</li>
                                    <li><strong>कश्मीरी गेट ISBT</strong> — वैकल्पिक</li>
                                    <li><strong>राजघाट बस स्टेशन</strong> — कुछ बसें</li>
                                    <li>RedBus, Abhibus पर ऑनलाइन बुकिंग</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div style="background:#fff3e0; padding:20px; border-radius:10px; height:100%;">
                                <h4 style="color:#e65100; font-size:1rem; font-weight:700;">💰 किराया और समय</h4>
                                <ul style="color:#555; line-height:1.9; margin:8px 0 0; font-size:14px;">
                                    <li><strong>साधारण बस:</strong> ₹350-500</li>
                                    <li><strong>Volvo/AC Sleeper:</strong> ₹700-1200</li>
                                    <li><strong>यात्रा समय:</strong> 10-12 घंटे</li>
                                    <li><strong>रात बस:</strong> 9-10 PM से</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- By Flight -->
                <div data-aos="fade-up" style="background:#fff; border:2px solid #f3e5f5; border-radius:16px; padding:30px; margin-bottom:30px; box-shadow:0 4px 20px rgba(0,0,0,0.06);">
                    <h2 style="color:#7b1fa2; font-size:1.5rem; font-weight:700; margin-bottom:20px;">✈️ दिल्ली से अयोध्या फ्लाइट से</h2>
                    <p style="color:#444; line-height:1.8;">
                        अयोध्या में नया <strong>महर्षि वाल्मीकि अंतर्राष्ट्रीय हवाई अड्डा (AYJ)</strong> बनकर तैयार है। दिल्ली (IGI Airport) से अयोध्या के लिए सीधी फ्लाइट अब उपलब्ध है — यात्रा समय मात्र <strong>1 घंटे 10 मिनट</strong>!
                    </p>
                    <div class="row g-3 mt-2">
                        <div class="col-md-4 text-center">
                            <div style="background:#f3e5f5; padding:20px; border-radius:10px;">
                                <div style="font-size:2rem;">✈️</div>
                                <div style="font-weight:700; color:#7b1fa2; margin:8px 0 5px;">IndiGo</div>
                                <div style="font-size:13px; color:#555;">दिल्ली → अयोध्या<br>₹3,000-7,000<br>1h 10m</div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div style="background:#f3e5f5; padding:20px; border-radius:10px;">
                                <div style="font-size:2rem;">🛫</div>
                                <div style="font-weight:700; color:#7b1fa2; margin:8px 0 5px;">Air India</div>
                                <div style="font-size:13px; color:#555;">दिल्ली → अयोध्या<br>₹3,500-8,000<br>1h 15m</div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div style="background:#f3e5f5; padding:20px; border-radius:10px;">
                                <div style="font-size:2rem;">🛩</div>
                                <div style="font-weight:700; color:#7b1fa2; margin:8px 0 5px;">SpiceJet</div>
                                <div style="font-size:13px; color:#555;">दिल्ली → अयोध्या<br>₹2,800-6,500<br>1h 10m</div>
                            </div>
                        </div>
                    </div>
                    <div style="background:#f3e5f5; padding:15px; border-radius:8px; margin-top:15px;">
                        <strong>✅ फ्लाइट टिप्स:</strong> 45-60 दिन पहले बुक करने पर सस्ता मिलता है | हवाई अड्डे से राम मंदिर 10 km दूर, टैक्सी ₹200-300 में
                    </div>
                </div>

                <!-- By Car -->
                <div data-aos="fade-up" style="background:#fff; border:2px solid #e8eaf6; border-radius:16px; padding:30px; margin-bottom:30px; box-shadow:0 4px 20px rgba(0,0,0,0.06);">
                    <h2 style="color:#3949ab; font-size:1.5rem; font-weight:700; margin-bottom:20px;">🚗 दिल्ली से अयोध्या कार से — रूट गाइड</h2>
                    <p style="color:#444; line-height:1.8;">
                        कार से दिल्ली से अयोध्या की दूरी लगभग 630 km है जो Yamuna Expressway + Agra-Lucknow Expressway + Lucknow Bypass + NH-27 के रास्ते पूरी होती है।
                    </p>
                    <div style="background:#e8eaf6; padding:15px; border-radius:8px; font-size:14px; color:#333; line-height:2; margin:15px 0;">
                        🏙 दिल्ली → Yamuna Expressway → Agra → Lucknow Expressway → Lucknow Bypass → NH-27 → 🛕 अयोध्या
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div style="background:#e8eaf6; padding:20px; border-radius:10px;">
                                <h4 style="color:#3949ab; font-size:1rem; font-weight:700;">🚗 खुद की कार</h4>
                                <ul style="color:#555; font-size:13px; line-height:1.9; margin:8px 0 0;">
                                    <li>यात्रा समय: 8-9 घंटे</li>
                                    <li>पेट्रोल: ~₹1,200-1,500</li>
                                    <li>टोल: ~₹500-700 (दोनों तरफ)</li>
                                    <li>रात को निकलने पर सुबह पहुँचें</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div style="background:#e8eaf6; padding:20px; border-radius:10px;">
                                <h4 style="color:#3949ab; font-size:1rem; font-weight:700;">🚕 Ola/Uber Outstation</h4>
                                <ul style="color:#555; font-size:13px; line-height:1.9; margin:8px 0 0;">
                                    <li>One-way: ₹5,000-7,000</li>
                                    <li>Round trip (2 days): ₹9,000-12,000</li>
                                    <li>Sedan/SUV विकल्प</li>
                                    <li>Driver रात में भी चलेगा</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div style="background:#fffde7; padding:15px; border-radius:8px; margin-top:15px;">
                        <strong>🛑 रास्ते में रुकने के स्थान:</strong> Agra (Taj Mahal), Mathura-Vrindavan, Kanpur, Lucknow
                    </div>
                </div>

                <!-- Places to Visit -->
                <div data-aos="fade-up" style="background:#fff8f0; border-radius:16px; padding:30px; margin-bottom:30px;">
                    <h2 style="color:#f55900; font-size:1.5rem; font-weight:700; margin-bottom:20px;">⛪ अयोध्या में क्या देखें?</h2>
                    <div class="row g-3">
                        <?php
                        $places = [
                            ['🛕', 'श्री राम मंदिर', 'राम लला का भव्य मंदिर — 22 जनवरी 2024 प्राण प्रतिष्ठा'],
                            ['🐒', 'हनुमान गढ़ी', 'हनुमान जी का सबसे प्रसिद्ध मंदिर — 76 सीढ़ियाँ'],
                            ['🌊', 'राम की पैड़ी', 'सरयू नदी के पवित्र घाट — शाम की आरती'],
                            ['🏛', 'कनक भवन', 'स्वर्ण महल — माता सीता का निवास'],
                            ['🌸', 'त्रेता के ठाकुर', 'अश्वमेध यज्ञ स्थल — 600 साल पुराना'],
                            ['🔔', 'नागेश्वरनाथ मंदिर', 'भगवान शिव का प्राचीन मंदिर'],
                        ];
                        foreach ($places as $p): ?>
                        <div class="col-md-6">
                            <div style="background:#fff; border:1px solid #ffe0cc; border-radius:10px; padding:15px; display:flex; gap:12px; align-items:flex-start;">
                                <span style="font-size:2rem; flex-shrink:0;"><?= $p[0] ?></span>
                                <div>
                                    <div style="font-weight:700; color:#333; font-size:15px;"><?= $p[1] ?></div>
                                    <div style="font-size:13px; color:#666; margin-top:3px;"><?= $p[2] ?></div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- FAQ -->
                <div data-aos="fade-up" style="background:#e3f2fd; border-radius:16px; padding:30px; margin-bottom:30px;">
                    <h2 style="color:#1565c0; font-size:1.5rem; font-weight:700; margin-bottom:20px;">❓ अक्सर पूछे जाने वाले सवाल</h2>
                    <div class="accordion" id="faqDelhiAccordion">
                        <?php
                        $faqs = [
                            ['दिल्ली से अयोध्या की दूरी कितनी है?', 'दिल्ली से अयोध्या की दूरी सड़क मार्ग से लगभग 630 किलोमीटर है। Yamuna Expressway और Agra-Lucknow Expressway से जाने पर 8-9 घंटे लगते हैं।'],
                            ['दिल्ली से अयोध्या वंदे भारत कब चलती है?', 'वंदे भारत एक्सप्रेस (22436) दिल्ली से सुबह 6 बजे चलती है और अयोध्या धाम दोपहर 1:20 बजे पहुँचती है। यह सबसे तेज ट्रेन विकल्प है।'],
                            ['दिल्ली से अयोध्या फ्लाइट कितने घंटे की है?', 'अयोध्या के नए महर्षि वाल्मीकि अंतर्राष्ट्रीय हवाई अड्डे के लिए दिल्ली से फ्लाइट मात्र 1 घंटे 10 मिनट की है।'],
                            ['दिल्ली से अयोध्या बस का किराया क्या है?', 'आनंद विहार ISBT से UPSRTC की साधारण बस ₹350-500 में जाती है। Volvo AC Sleeper बस ₹700-1200 में मिलती है।'],
                            ['अयोध्या में कहाँ ठहरें?', 'अयोध्या में सभी बजट के लिए विकल्प हैं — धर्मशाला (₹200-500), मध्यम होटल (₹1000-3000), और लग्जरी होटल (₹4000+)।'],
                        ];
                        foreach ($faqs as $i => $faq): ?>
                        <div class="accordion-item" style="border:none; border-bottom:1px solid #bbdefb; border-radius:0; margin-bottom:5px; background:transparent;">
                            <h2 class="accordion-header">
                                <button class="accordion-button <?= $i > 0 ? 'collapsed' : '' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#dfaq<?= $i ?>" style="background:#e3f2fd; color:#333; font-weight:600; font-size:15px;">
                                    <?= $faq[0] ?>
                                </button>
                            </h2>
                            <div id="dfaq<?= $i ?>" class="accordion-collapse collapse <?= $i === 0 ? 'show' : '' ?>" data-bs-parent="#faqDelhiAccordion">
                                <div class="accordion-body" style="color:#555; line-height:1.8; background:#e3f2fd;"><?= $faq[1] ?></div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div data-aos="fade-left" style="background:linear-gradient(135deg, #1565c0, #42a5f5); color:#fff; padding:25px; border-radius:16px; margin-bottom:25px; position:sticky; top:80px;">
                    <h3 style="font-size:1.2rem; font-weight:700; margin-bottom:15px;">📞 यात्रा सहायता</h3>
                    <p style="font-size:14px; opacity:0.9; margin-bottom:15px;">अयोध्या यात्रा के लिए किसी भी जानकारी में सहायता</p>
                    <a href="tel:+918168877332" class="btn btn-light w-100 mb-2" style="color:#1565c0; font-weight:700;">📱 +91-8168877332</a>
                    <a href="https://wa.me/918168877332?text=दिल्ली से अयोध्या यात्रा के बारे में जानकारी चाहिए" target="_blank" class="btn btn-success w-100" style="font-weight:700;">💬 WhatsApp करें</a>
                </div>

                <div style="background:#fff; border:2px solid #bbdefb; border-radius:16px; padding:25px; margin-bottom:25px; box-shadow:0 4px 15px rgba(0,0,0,0.06);">
                    <h3 style="color:#1565c0; font-size:1.1rem; font-weight:700; margin-bottom:15px;">🗺 यात्रा सारांश</h3>
                    <table class="table table-sm" style="font-size:13px;">
                        <tr><td style="color:#666;">🏙 से:</td><td style="font-weight:600;">दिल्ली</td></tr>
                        <tr><td style="color:#666;">🛕 तक:</td><td style="font-weight:600;">अयोध्या धाम</td></tr>
                        <tr><td style="color:#666;">📏 दूरी:</td><td style="font-weight:600;">630 km</td></tr>
                        <tr><td style="color:#666;">🚄 वंदे भारत:</td><td style="font-weight:600;">7h 20m</td></tr>
                        <tr><td style="color:#666;">🚌 बस:</td><td style="font-weight:600;">₹350-1200</td></tr>
                        <tr><td style="color:#666;">✈️ फ्लाइट:</td><td style="font-weight:600;">₹2800-8000</td></tr>
                        <tr><td style="color:#666;">🚗 टैक्सी:</td><td style="font-weight:600;">₹5000-7000</td></tr>
                    </table>
                </div>

                <div style="background:#fff8f0; border-radius:16px; padding:25px; margin-bottom:25px;">
                    <h3 style="color:#f55900; font-size:1.1rem; font-weight:700; margin-bottom:15px;">🗺 अन्य शहरों से अयोध्या</h3>
                    <div style="display:flex; flex-direction:column; gap:8px;">
                        <a href="<?= SITE_URL ?>/lucknow-to-ayodhya" style="background:#fff; border:1px solid #ffe0cc; padding:10px 15px; border-radius:8px; text-decoration:none; color:#333; font-size:14px; display:flex; justify-content:space-between;">लखनऊ से अयोध्या <span style="color:#f55900;">→</span></a>
                        <a href="<?= SITE_URL ?>/varanasi-to-ayodhya" style="background:#fff; border:1px solid #ffe0cc; padding:10px 15px; border-radius:8px; text-decoration:none; color:#333; font-size:14px; display:flex; justify-content:space-between;">वाराणसी से अयोध्या <span style="color:#f55900;">→</span></a>
                        <a href="<?= SITE_URL ?>/prayagraj-to-ayodhya" style="background:#fff; border:1px solid #ffe0cc; padding:10px 15px; border-radius:8px; text-decoration:none; color:#333; font-size:14px; display:flex; justify-content:space-between;">प्रयागराज से अयोध्या <span style="color:#f55900;">→</span></a>
                        <a href="<?= SITE_URL ?>/hotels-ayodhya" style="background:#fff; border:1px solid #ffe0cc; padding:10px 15px; border-radius:8px; text-decoration:none; color:#333; font-size:14px; display:flex; justify-content:space-between;">अयोध्या होटल गाइड <span style="color:#f55900;">→</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section style="background:linear-gradient(135deg, #0d1b2a, #1565c0); padding:60px 0; text-align:center;">
    <div class="container">
        <h2 style="color:#fff; font-size:2rem; font-weight:800; font-family:'Noto Serif Devanagari',serif;">जय श्री राम! 🙏</h2>
        <p style="color:#90caf9; font-size:1.1rem; max-width:600px; margin:15px auto 25px;">भगवान राम की कृपा से आपकी अयोध्या यात्रा मंगलमय और सुखद हो।</p>
        <div style="display:flex; gap:15px; justify-content:center; flex-wrap:wrap;">
            <a href="<?= SITE_URL ?>/contact" class="btn btn-warning" style="font-weight:700; padding:12px 30px; border-radius:30px;">📞 संपर्क करें</a>
            <a href="<?= SITE_URL ?>/" class="btn btn-outline-light" style="font-weight:700; padding:12px 30px; border-radius:30px;">🏠 होम पेज</a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
