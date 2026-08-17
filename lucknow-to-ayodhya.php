<?php
/**
 * Lucknow to Ayodhya Travel Guide - 3000+ words SEO page
 * AyodhyaRamMandir.in
 */

$pageTitle = 'लखनऊ से अयोध्या कैसे जाएं - सम्पूर्ण यात्रा गाइड 2025 | Lucknow to Ayodhya Travel Guide';

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/functions.php';

$lang = getCurrentLang();

$pageSchema = json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'TravelGuide',
    'name' => 'Lucknow to Ayodhya Travel Guide 2025',
    'description' => 'Complete guide to travel from Lucknow to Ayodhya by train, bus, car, taxi. Distance 135 km, all routes, hotels, darshan timing.',
    'url' => SITE_URL . '/lucknow-to-ayodhya',
    'image' => SITE_URL . '/assets/images/shree-ram.jpg',
    'author' => ['@type' => 'Organization', 'name' => 'AyodhyaRamMandir.in'],
    'publisher' => ['@type' => 'Organization', 'name' => 'AyodhyaRamMandir.in', 'url' => SITE_URL],
    'datePublished' => '2024-01-22',
    'dateModified' => date('Y-m-d'),
    'inLanguage' => ['hi', 'en'],
    'about' => [['@type' => 'Place', 'name' => 'Ayodhya'], ['@type' => 'Place', 'name' => 'Lucknow']],
    'mentions' => [
        ['@type' => 'BusTrip', 'name' => 'Lucknow to Ayodhya Bus'],
        ['@type' => 'TrainTrip', 'name' => 'Lucknow to Ayodhya Train']
    ]
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include __DIR__ . '/includes/header.php';
?>

<!-- Hero Section -->
<section style="background: linear-gradient(135deg, #1a0533 0%, #2d0b5e 50%, #4a1080 100%); padding: 100px 0 60px; position:relative; overflow:hidden;">
    <div style="position:absolute;top:0;left:0;right:0;bottom:0; background:url('assets/images/shree-ram.jpg') center/cover; opacity:0.12;"></div>
    <div class="container text-center" style="position:relative;z-index:2;">
        <div data-aos="fade-down">
            <span style="background:rgba(138,43,226,0.25); color:#d4a8ff; padding:8px 20px; border-radius:30px; font-size:13px; letter-spacing:2px; text-transform:uppercase;">🚗 यात्रा गाइड | Travel Guide</span>
            <h1 style="color:#fff; font-size:clamp(1.8rem,5vw,3rem); font-weight:800; margin:20px 0 15px; font-family:'Noto Serif Devanagari',serif;">
                लखनऊ से अयोध्या कैसे जाएं?
            </h1>
            <p style="color:#d4a8ff; font-size:1.1rem; max-width:750px; margin:0 auto 20px;">
                ट्रेन, बस, टैक्सी, कार — हर माध्यम से सम्पूर्ण यात्रा जानकारी | दूरी: 135 km | समय: 2-3 घंटे
            </p>
            <div style="display:flex; gap:15px; justify-content:center; flex-wrap:wrap; margin-top:20px;">
                <span style="background:rgba(255,255,255,0.15); color:#fff; padding:8px 18px; border-radius:20px; font-size:14px;">📏 135 km दूरी</span>
                <span style="background:rgba(255,255,255,0.15); color:#fff; padding:8px 18px; border-radius:20px; font-size:14px;">⏱ 2-3 घंटे</span>
                <span style="background:rgba(255,255,255,0.15); color:#fff; padding:8px 18px; border-radius:20px; font-size:14px;">🚂 ट्रेन | 🚌 बस | 🚗 कार</span>
            </div>
            <nav aria-label="breadcrumb" class="mt-3">
                <ol class="breadcrumb justify-content-center" style="background:none;">
                    <li class="breadcrumb-item"><a href="<?php echo SITE_URL; ?>/" style="color:#d4a8ff;">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo SITE_URL; ?>/ayodhya-guide" style="color:#d4a8ff;">Ayodhya Guide</a></li>
                    <li class="breadcrumb-item active" style="color:#fff;">Lucknow to Ayodhya</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- Quick Stats -->
<section style="background:#f55900; padding:25px 0;">
    <div class="container">
        <div class="row text-center text-white g-3">
            <div class="col-6 col-md-3"><div class="fw-bold" style="font-size:1.8rem;">135</div><div style="font-size:13px; opacity:0.9;">KM दूरी</div></div>
            <div class="col-6 col-md-3"><div class="fw-bold" style="font-size:1.8rem;">2-3</div><div style="font-size:13px; opacity:0.9;">घंटे यात्रा समय</div></div>
            <div class="col-6 col-md-3"><div class="fw-bold" style="font-size:1.8rem;">₹50</div><div style="font-size:13px; opacity:0.9;">बस किराया (न्यूनतम)</div></div>
            <div class="col-6 col-md-3"><div class="fw-bold" style="font-size:1.8rem;">10+</div><div style="font-size:13px; opacity:0.9;">ट्रेनें प्रतिदिन</div></div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section style="padding:60px 0; background:#fff;">
    <div class="container">
        <div class="row g-4">

            <!-- Main Article -->
            <div class="col-lg-8">

                <!-- Introduction -->
                <div data-aos="fade-up" style="background:#fff8f0; border-left:4px solid #f55900; padding:25px; border-radius:12px; margin-bottom:30px;">
                    <h2 style="color:#f55900; font-size:1.6rem; font-weight:700; font-family:'Noto Serif Devanagari',serif;">लखनऊ से अयोध्या यात्रा - परिचय</h2>
                    <p style="color:#444; line-height:1.8; font-size:1.05rem;">
                        लखनऊ, उत्तर प्रदेश की राजधानी, से अयोध्या की दूरी मात्र <strong>135 किलोमीटर</strong> है। यह यात्रा आसान, सुविधाजनक और बजट-अनुकूल है। चाहे आप ट्रेन से जाएं, बस से या टैक्सी से — हर विकल्प उपलब्ध है। 22 जनवरी 2024 को राम मंदिर की प्राण प्रतिष्ठा के बाद से लखनऊ से अयोध्या जाने वाले तीर्थयात्रियों की संख्या कई गुना बढ़ गई है।
                    </p>
                    <p style="color:#444; line-height:1.8; font-size:1.05rem; margin-top:10px;">
                        अयोध्या धाम — भगवान श्री राम की जन्मभूमि — में राम लला का दर्शन करने का सपना हर हिंदू का होता है। लखनऊ से यह यात्रा बेहद सरल है। इस गाइड में हम आपको बताएंगे कि <strong>लखनऊ से अयोध्या कैसे जाएं</strong>, कौन सी ट्रेन पकड़ें, बस कहाँ से मिलेगी, टैक्सी का किराया क्या होगा, और अयोध्या में क्या-क्या करना न भूलें।
                    </p>
                </div>

                <!-- By Train -->
                <div data-aos="fade-up" style="background:#fff; border:2px solid #e8f5e9; border-radius:16px; padding:30px; margin-bottom:30px; box-shadow:0 4px 20px rgba(0,0,0,0.06);">
                    <h2 style="color:#2e7d32; font-size:1.5rem; font-weight:700; margin-bottom:20px;">🚂 लखनऊ से अयोध्या ट्रेन से (सबसे अच्छा विकल्प)</h2>
                    <p style="color:#444; line-height:1.8;">
                        ट्रेन से यात्रा सबसे किफायती और आरामदायक विकल्प है। लखनऊ जंक्शन (LKO), चारबाग, और लखनऊ NE से अयोध्या के लिए प्रतिदिन 10 से अधिक ट्रेनें चलती हैं। अयोध्या में दो स्टेशन हैं — <strong>अयोध्या जंक्शन (AY)</strong> और नया <strong>अयोध्या धाम जंक्शन (AYDH)</strong>।
                    </p>

                    <h3 style="color:#333; font-size:1.1rem; font-weight:700; margin:20px 0 12px;">🔑 प्रमुख ट्रेनें (Lucknow → Ayodhya)</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" style="font-size:14px;">
                            <thead style="background:#2e7d32; color:#fff;">
                                <tr>
                                    <th>ट्रेन नाम</th>
                                    <th>नंबर</th>
                                    <th>लखनऊ प्रस्थान</th>
                                    <th>अयोध्या आगमन</th>
                                    <th>समय</th>
                                    <th>किराया (SL)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td>Lucknow-Varanasi Express</td><td>14235</td><td>06:00</td><td>07:55</td><td>1h 55m</td><td>~₹150</td></tr>
                                <tr><td>Sabarmati Express</td><td>19167</td><td>09:15</td><td>11:20</td><td>2h 05m</td><td>~₹155</td></tr>
                                <tr><td>Farakka Express</td><td>13484</td><td>11:30</td><td>13:40</td><td>2h 10m</td><td>~₹150</td></tr>
                                <tr><td>Poorva Express</td><td>12303</td><td>14:25</td><td>16:15</td><td>1h 50m</td><td>~₹165</td></tr>
                                <tr><td>Shramjivi Express</td><td>12391</td><td>16:45</td><td>18:45</td><td>2h 00m</td><td>~₹155</td></tr>
                                <tr><td>Pushpak Express</td><td>12533</td><td>19:00</td><td>21:00</td><td>2h 00m</td><td>~₹160</td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div style="background:#e8f5e9; padding:15px; border-radius:8px; margin-top:15px;">
                        <strong>✅ टिप्स:</strong>
                        <ul style="margin:8px 0 0; color:#444; line-height:1.9;">
                            <li>IRCTC पर टिकट एडवांस बुक करें (Tatkal भी उपलब्ध)</li>
                            <li>अयोध्या धाम जंक्शन राम मंदिर के ज्यादा नजदीक है</li>
                            <li>स्टेशन से मंदिर तक ऑटो/ई-रिक्शा आसानी से मिलते हैं (₹30-50)</li>
                            <li>त्योहारों में ट्रेनें भरी रहती हैं — 2-3 सप्ताह पहले बुक करें</li>
                        </ul>
                    </div>
                </div>

                <!-- By Bus -->
                <div data-aos="fade-up" style="background:#fff; border:2px solid #fff3e0; border-radius:16px; padding:30px; margin-bottom:30px; box-shadow:0 4px 20px rgba(0,0,0,0.06);">
                    <h2 style="color:#e65100; font-size:1.5rem; font-weight:700; margin-bottom:20px;">🚌 लखनऊ से अयोध्या बस से</h2>
                    <p style="color:#444; line-height:1.8;">
                        UPSRTC (उत्तर प्रदेश राज्य सड़क परिवहन) की बसें लखनऊ के <strong>कैसरबाग बस अड्डा</strong> और <strong>आलमबाग बस स्टेशन</strong> से अयोध्या के लिए नियमित रूप से चलती हैं। यह विकल्प उन यात्रियों के लिए सबसे अच्छा है जो लचीला समय चाहते हैं।
                    </p>

                    <div class="row g-3 mt-2">
                        <div class="col-md-6">
                            <div style="background:#fff3e0; padding:20px; border-radius:10px; height:100%;">
                                <h4 style="color:#e65100; font-size:1rem; font-weight:700;">🏢 कहाँ से पकड़ें?</h4>
                                <ul style="color:#555; line-height:1.9; margin:8px 0 0; font-size:14px;">
                                    <li><strong>कैसरबाग बस अड्डा</strong> — मुख्य स्टेशन</li>
                                    <li><strong>आलमबाग बस स्टेशन</strong> — वैकल्पिक</li>
                                    <li><strong>चारबाग स्टेशन के पास</strong> — कुछ बसें</li>
                                    <li>बस हर 30-45 मिनट में मिलती है</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div style="background:#fff3e0; padding:20px; border-radius:10px; height:100%;">
                                <h4 style="color:#e65100; font-size:1rem; font-weight:700;">💰 किराया और समय</h4>
                                <ul style="color:#555; line-height:1.9; margin:8px 0 0; font-size:14px;">
                                    <li><strong>साधारण बस:</strong> ₹80-120</li>
                                    <li><strong>वोल्वो/AC बस:</strong> ₹200-350</li>
                                    <li><strong>यात्रा समय:</strong> 2.5-4 घंटे</li>
                                    <li><strong>पहली बस:</strong> प्रातः 5:00 बजे</li>
                                    <li><strong>आखिरी बस:</strong> रात 10:00 बजे</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <p style="color:#444; line-height:1.8; margin-top:15px;">
                        बस अयोध्या के <strong>नया बस अड्डा</strong> या <strong>पुराना बस अड्डा</strong> पर उतरती है। वहाँ से ऑटो रिक्शा, ई-रिक्शा, या टैक्सी से राम मंदिर पहुँचें (₹30-100)। निजी बसें और टेम्पो ट्रेवलर भी मिलते हैं जो थोड़े महंगे पर तेज होते हैं।
                    </p>
                </div>

                <!-- By Car/Taxi -->
                <div data-aos="fade-up" style="background:#fff; border:2px solid #e8eaf6; border-radius:16px; padding:30px; margin-bottom:30px; box-shadow:0 4px 20px rgba(0,0,0,0.06);">
                    <h2 style="color:#3949ab; font-size:1.5rem; font-weight:700; margin-bottom:20px;">🚗 लखनऊ से अयोध्या कार/टैक्सी से</h2>

                    <h3 style="color:#333; font-size:1.1rem; font-weight:700; margin-bottom:10px;">📍 रूट मैप (NH-27 Highway)</h3>
                    <p style="color:#444; line-height:1.8;">
                        लखनऊ से अयोध्या का सबसे तेज रास्ता <strong>NH-27 (लखनऊ-वाराणसी हाईवे)</strong> से है।
                    </p>
                    <div style="background:#e8eaf6; padding:15px; border-radius:8px; font-family:monospace; font-size:14px; color:#333; line-height:2;">
                        🏙 लखनऊ → 🛣 NH-27 → Barabanki Bypass → Faizabad Bypass → 🏛 अयोध्या धाम
                    </div>

                    <div class="row g-3 mt-3">
                        <div class="col-md-4">
                            <div style="background:#e8eaf6; padding:20px; border-radius:10px; text-align:center;">
                                <div style="font-size:2rem;">🚗</div>
                                <div style="font-weight:700; color:#3949ab; margin:5px 0;">खुद की कार</div>
                                <div style="font-size:13px; color:#555;">NH-27 से 2-2.5 घंटे<br>पेट्रोल ~₹400-500<br>टोल ~₹150-200</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div style="background:#e8eaf6; padding:20px; border-radius:10px; text-align:center;">
                                <div style="font-size:2rem;">🚕</div>
                                <div style="font-weight:700; color:#3949ab; margin:5px 0;">Ola/Uber/Rapido</div>
                                <div style="font-size:13px; color:#555;">One-way: ₹1,200-1,800<br>Round trip: ₹2,000-3,000<br>Duration: 2-2.5 hrs</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div style="background:#e8eaf6; padding:20px; border-radius:10px; text-align:center;">
                                <div style="font-size:2rem;">🚐</div>
                                <div style="font-weight:700; color:#3949ab; margin:5px 0;">Tempo Traveller</div>
                                <div style="font-size:13px; color:#555;">ग्रुप के लिए बेस्ट<br>12-17 सीट: ₹3,500-5,000<br>पूरे दिन: ₹5,000-7,000</div>
                            </div>
                        </div>
                    </div>

                    <div style="background:#fff3e0; padding:15px; border-radius:8px; margin-top:20px;">
                        <strong>🏨 रास्ते में प्रमुख स्थान:</strong>
                        <ul style="margin:8px 0 0; color:#555; line-height:1.9;">
                            <li><strong>बाराबंकी (Barabanki)</strong> — लखनऊ से 30 km, नाश्ते के लिए रुकें</li>
                            <li><strong>रुदौली (Rudauli)</strong> — 75 km, ईंधन स्टेशन उपलब्ध</li>
                            <li><strong>फैज़ाबाद/अयोध्या</strong> — 135 km, गंतव्य</li>
                        </ul>
                    </div>
                </div>

                <!-- Places to Visit -->
                <div data-aos="fade-up" style="background:#fff8f0; border-radius:16px; padding:30px; margin-bottom:30px;">
                    <h2 style="color:#f55900; font-size:1.5rem; font-weight:700; margin-bottom:20px;">⛪ अयोध्या में अवश्य देखें</h2>
                    <div class="row g-3">
                        <?php
                        $places = [
                            ['🛕', 'राम मंदिर', 'श्री राम लला का भव्य मंदिर — प्राण प्रतिष्ठा 22 जनवरी 2024'],
                            ['🐒', 'हनुमान गढ़ी', '76 सीढ़ियों वाला हनुमान जी का प्रसिद्ध मंदिर'],
                            ['🌊', 'सरयू घाट', 'राम की पैड़ी — पवित्र स्नान और आरती'],
                            ['🏛', 'कनक भवन', 'माता सीता को उपहार में मिला स्वर्ण महल'],
                            ['⚓', 'नागेश्वरनाथ मंदिर', 'भगवान शिव का प्राचीन मंदिर — कुश द्वारा स्थापित'],
                            ['🌸', 'त्रेता के ठाकुर', 'यहीं हुआ था अश्वमेध यज्ञ — प्राचीन मंदिर'],
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

                <!-- Best Time and Tips -->
                <div data-aos="fade-up" style="background:#fff; border:2px solid #e0f7fa; border-radius:16px; padding:30px; margin-bottom:30px; box-shadow:0 4px 20px rgba(0,0,0,0.06);">
                    <h2 style="color:#00796b; font-size:1.5rem; font-weight:700; margin-bottom:20px;">📅 जाने का सबसे अच्छा समय</h2>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div style="background:#e0f7fa; padding:20px; border-radius:10px; text-align:center;">
                                <div style="font-size:1.5rem; font-weight:800; color:#00796b;">अक्टूबर - मार्च</div>
                                <div style="font-size:13px; color:#555; margin-top:5px;">⭐ सबसे अच्छा मौसम<br>20-28°C तापमान<br>दर्शन में आसानी</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div style="background:#fff9c4; padding:20px; border-radius:10px; text-align:center;">
                                <div style="font-size:1.5rem; font-weight:800; color:#f57f17;">रामनवमी / दीपोत्सव</div>
                                <div style="font-size:13px; color:#555; margin-top:5px;">🎉 उत्सव का माहौल<br>भव्य आयोजन<br>पहले से बुकिंग जरूरी</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div style="background:#ffebee; padding:20px; border-radius:10px; text-align:center;">
                                <div style="font-size:1.5rem; font-weight:800; color:#c62828;">अप्रैल - जून</div>
                                <div style="font-size:13px; color:#555; margin-top:5px;">⚠ गर्मी का मौसम<br>40-45°C तापमान<br>सुबह जल्दी जाएं</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Darshan Info -->
                <div data-aos="fade-up" style="background:linear-gradient(135deg, #f55900, #ff8237); border-radius:16px; padding:30px; margin-bottom:30px; color:#fff;">
                    <h2 style="font-size:1.5rem; font-weight:700; margin-bottom:20px;">🛕 राम मंदिर दर्शन जानकारी</h2>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <ul style="list-style:none; padding:0; margin:0; line-height:2;">
                                <li>🕕 <strong>प्रातः आरती:</strong> 6:00 बजे</li>
                                <li>🕙 <strong>दर्शन प्रारंभ:</strong> 7:00 बजे</li>
                                <li>🕙 <strong>दर्शन समाप्त:</strong> रात 10:00 बजे</li>
                                <li>🕧 <strong>दोपहर विराम:</strong> नहीं</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul style="list-style:none; padding:0; margin:0; line-height:2;">
                                <li>💰 <strong>प्रवेश शुल्क:</strong> निःशुल्क</li>
                                <li>📱 <strong>ऑनलाइन दर्शन:</strong> उपलब्ध</li>
                                <li>👥 <strong>VIP दर्शन:</strong> ₹300-500</li>
                                <li>🎒 <strong>लॉकर:</strong> प्रवेश द्वार पर</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Hotels -->
                <div data-aos="fade-up" style="background:#fff; border:2px solid #e8f5e9; border-radius:16px; padding:30px; margin-bottom:30px; box-shadow:0 4px 20px rgba(0,0,0,0.06);">
                    <h2 style="color:#2e7d32; font-size:1.5rem; font-weight:700; margin-bottom:20px;">🏨 अयोध्या में होटल और ठहरने की जगह</h2>
                    <p style="color:#444; line-height:1.8;">
                        अयोध्या में सभी बजट के लिए होटल और धर्मशालाएं उपलब्ध हैं। राम मंदिर के आसपास कई नए होटल खुले हैं।
                    </p>
                    <div class="row g-3 mt-1">
                        <?php
                        $hotels = [
                            ['बजट (₹500-1500)', '🏠', 'धर्मशाला, YMCA, राम कथा पार्क के पास गेस्ट हाउस'],
                            ['मध्यम (₹1500-4000)', '🏩', 'Hotel Saket, Hotel Ramayan Inn, Vivanta'],
                            ['लग्जरी (₹4000+)', '🏨', 'Ayodhya Sarovar Portico, WelcomHotel, Ramada'],
                        ];
                        foreach ($hotels as $h): ?>
                        <div class="col-md-4">
                            <div style="background:#e8f5e9; padding:20px; border-radius:10px; text-align:center; height:100%;">
                                <div style="font-size:2rem;"><?= $h[1] ?></div>
                                <div style="font-weight:700; color:#2e7d32; margin:8px 0 5px; font-size:15px;"><?= $h[0] ?></div>
                                <div style="font-size:13px; color:#555;"><?= $h[2] ?></div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- FAQ -->
                <div data-aos="fade-up" style="background:#fff8f0; border-radius:16px; padding:30px; margin-bottom:30px;">
                    <h2 style="color:#f55900; font-size:1.5rem; font-weight:700; margin-bottom:20px;">❓ अक्सर पूछे जाने वाले सवाल</h2>
                    <div class="accordion" id="faqAccordion">
                        <?php
                        $faqs = [
                            ['लखनऊ से अयोध्या की दूरी कितनी है?', 'लखनऊ से अयोध्या की दूरी लगभग 135 किलोमीटर है। NH-27 हाईवे से जाने पर यह दूरी 2 से 2.5 घंटे में पूरी होती है।'],
                            ['लखनऊ से अयोध्या का ट्रेन किराया कितना है?', 'स्लीपर क्लास में ₹150 से ₹200 और जनरल में ₹50-80 में टिकट मिलती है। Tatkal में थोड़ा अधिक देना होगा।'],
                            ['लखनऊ से अयोध्या बस कहाँ से मिलेगी?', 'कैसरबाग बस अड्डा और आलमबाग बस स्टेशन से UPSRTC की बसें मिलती हैं। किराया ₹80-350 के बीच है।'],
                            ['क्या लखनऊ से अयोध्या की डे ट्रिप संभव है?', 'हाँ बिल्कुल! सुबह 6 बजे निकलें, शाम तक सभी प्रमुख मंदिरों का दर्शन करके वापस आ सकते हैं।'],
                            ['राम मंदिर में दर्शन का समय क्या है?', 'राम मंदिर में दर्शन सुबह 6 बजे से रात 10 बजे तक होता है। प्रवेश निःशुल्क है।'],
                        ];
                        foreach ($faqs as $i => $faq): ?>
                        <div class="accordion-item" style="border:none; border-bottom:1px solid #ffe0cc; border-radius:0; margin-bottom:5px;">
                            <h2 class="accordion-header">
                                <button class="accordion-button <?= $i > 0 ? 'collapsed' : '' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#faq<?= $i ?>" style="background:#fff8f0; color:#333; font-weight:600; font-size:15px;">
                                    <?= $faq[0] ?>
                                </button>
                            </h2>
                            <div id="faq<?= $i ?>" class="accordion-collapse collapse <?= $i === 0 ? 'show' : '' ?>" data-bs-parent="#faqAccordion">
                                <div class="accordion-body" style="color:#555; line-height:1.8;"><?= $faq[1] ?></div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Quick Contact -->
                <div data-aos="fade-left" style="background:linear-gradient(135deg, #f55900, #ff8237); color:#fff; padding:25px; border-radius:16px; margin-bottom:25px; position:sticky; top:80px;">
                    <h3 style="font-size:1.2rem; font-weight:700; margin-bottom:15px;">📞 यात्रा सहायता</h3>
                    <p style="font-size:14px; opacity:0.9; margin-bottom:15px;">अयोध्या यात्रा से जुड़ी किसी भी जानकारी के लिए हमसे संपर्क करें</p>
                    <a href="tel:+918168877332" class="btn btn-light w-100 mb-2" style="color:#f55900; font-weight:700;">📱 +91-8168877332</a>
                    <a href="https://wa.me/918168877332?text=लखनऊ से अयोध्या यात्रा के बारे में जानकारी चाहिए" target="_blank" class="btn btn-success w-100" style="font-weight:700;">💬 WhatsApp करें</a>
                </div>

                <!-- Route Summary -->
                <div style="background:#fff; border:2px solid #e8eaf6; border-radius:16px; padding:25px; margin-bottom:25px; box-shadow:0 4px 15px rgba(0,0,0,0.06);">
                    <h3 style="color:#3949ab; font-size:1.1rem; font-weight:700; margin-bottom:15px;">🗺 यात्रा सारांश</h3>
                    <table class="table table-sm" style="font-size:13px;">
                        <tr><td style="color:#666;">🏙 से:</td><td style="font-weight:600;">लखनऊ</td></tr>
                        <tr><td style="color:#666;">🛕 तक:</td><td style="font-weight:600;">अयोध्या धाम</td></tr>
                        <tr><td style="color:#666;">📏 दूरी:</td><td style="font-weight:600;">135 km</td></tr>
                        <tr><td style="color:#666;">⏱ समय:</td><td style="font-weight:600;">2-3 घंटे</td></tr>
                        <tr><td style="color:#666;">🚂 ट्रेन:</td><td style="font-weight:600;">₹50-200</td></tr>
                        <tr><td style="color:#666;">🚌 बस:</td><td style="font-weight:600;">₹80-350</td></tr>
                        <tr><td style="color:#666;">🚕 टैक्सी:</td><td style="font-weight:600;">₹1200-1800</td></tr>
                    </table>
                </div>

                <!-- Other City Links -->
                <div style="background:#fff8f0; border-radius:16px; padding:25px; margin-bottom:25px;">
                    <h3 style="color:#f55900; font-size:1.1rem; font-weight:700; margin-bottom:15px;">🗺 अन्य शहरों से अयोध्या</h3>
                    <div style="display:flex; flex-direction:column; gap:8px;">
                        <a href="<?= SITE_URL ?>/delhi-to-ayodhya" style="background:#fff; border:1px solid #ffe0cc; padding:10px 15px; border-radius:8px; text-decoration:none; color:#333; font-size:14px; display:flex; justify-content:space-between;">दिल्ली से अयोध्या <span style="color:#f55900;">→</span></a>
                        <a href="<?= SITE_URL ?>/varanasi-to-ayodhya" style="background:#fff; border:1px solid #ffe0cc; padding:10px 15px; border-radius:8px; text-decoration:none; color:#333; font-size:14px; display:flex; justify-content:space-between;">वाराणसी से अयोध्या <span style="color:#f55900;">→</span></a>
                        <a href="<?= SITE_URL ?>/prayagraj-to-ayodhya" style="background:#fff; border:1px solid #ffe0cc; padding:10px 15px; border-radius:8px; text-decoration:none; color:#333; font-size:14px; display:flex; justify-content:space-between;">प्रयागराज से अयोध्या <span style="color:#f55900;">→</span></a>
                        <a href="<?= SITE_URL ?>/hotels-ayodhya" style="background:#fff; border:1px solid #ffe0cc; padding:10px 15px; border-radius:8px; text-decoration:none; color:#333; font-size:14px; display:flex; justify-content:space-between;">अयोध्या होटल गाइड <span style="color:#f55900;">→</span></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- CTA Section -->
<section style="background:linear-gradient(135deg, #1a0533, #4a1080); padding:60px 0; text-align:center;">
    <div class="container">
        <h2 style="color:#fff; font-size:2rem; font-weight:800; font-family:'Noto Serif Devanagari',serif;">जय श्री राम!</h2>
        <p style="color:#d4a8ff; font-size:1.1rem; max-width:600px; margin:15px auto 25px;">भगवान राम की कृपा से आपकी अयोध्या यात्रा मंगलमय हो। अधिक जानकारी के लिए हमसे संपर्क करें।</p>
        <div style="display:flex; gap:15px; justify-content:center; flex-wrap:wrap;">
            <a href="<?= SITE_URL ?>/contact" class="btn btn-warning" style="font-weight:700; padding:12px 30px; border-radius:30px;">📞 संपर्क करें</a>
            <a href="<?= SITE_URL ?>/" class="btn btn-outline-light" style="font-weight:700; padding:12px 30px; border-radius:30px;">🏠 होम पेज</a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
