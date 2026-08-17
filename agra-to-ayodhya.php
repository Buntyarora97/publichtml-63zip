<?php
/**
 * Agra to Ayodhya Travel Guide - 3000+ words SEO page
 * AyodhyaRamMandir.in
 */

$pageTitle = 'आगरा से अयोध्या कैसे जाएं - Train, Bus, Car सम्पूर्ण गाइड 2025 | Agra to Ayodhya';

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/functions.php';

$lang = getCurrentLang();

$pageSchema = json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'TravelGuide',
    'name' => 'Agra to Ayodhya Travel Guide 2025',
    'description' => 'Complete guide to travel from Agra to Ayodhya by train, bus, car, taxi. Distance 390 km, all routes with cost and timing for Ram Mandir darshan.',
    'url' => SITE_URL . '/agra-to-ayodhya',
    'image' => SITE_URL . '/assets/images/ram-mandir-real.jpg',
    'author' => ['@type' => 'Organization', 'name' => 'AyodhyaRamMandir.in'],
    'publisher' => ['@type' => 'Organization', 'name' => 'AyodhyaRamMandir.in', 'url' => SITE_URL],
    'datePublished' => '2024-01-22',
    'dateModified' => date('Y-m-d'),
    'inLanguage' => ['hi', 'en'],
    'about' => [['@type' => 'Place', 'name' => 'Ayodhya'], ['@type' => 'Place', 'name' => 'Agra']],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include __DIR__ . '/includes/header.php';
?>

<!-- Hero Section -->
<section style="background: linear-gradient(135deg, #1a0800 0%, #4a1a00 50%, #7a2d00 100%); padding: 100px 0 60px; position:relative; overflow:hidden;">
    <div style="position:absolute;top:0;left:0;right:0;bottom:0; background:url('assets/images/ram-mandir-real.jpg') center/cover; opacity:0.12;"></div>
    <div class="container text-center" style="position:relative;z-index:2;">
        <div data-aos="fade-down">
            <span style="background:rgba(255,140,0,0.25); color:#FFD700; padding:8px 20px; border-radius:30px; font-size:13px; letter-spacing:2px; text-transform:uppercase;">🚗 यात्रा गाइड | Travel Guide</span>
            <h1 style="color:#fff; font-size:clamp(1.8rem,5vw,3rem); font-weight:800; margin:20px 0 15px; font-family:'Noto Serif Devanagari',serif;">
                आगरा से अयोध्या कैसे जाएं?
            </h1>
            <p style="color:#FFD48A; font-size:1.1rem; max-width:750px; margin:0 auto 20px;">
                ताजमहल देखकर राम मंदिर के दर्शन करें | ट्रेन, बस, कार, टैक्सी — सम्पूर्ण जानकारी | दूरी: ~390 km
            </p>
            <div style="display:flex; gap:15px; justify-content:center; flex-wrap:wrap; margin-top:20px;">
                <span style="background:rgba(255,255,255,0.15); color:#fff; padding:8px 18px; border-radius:20px; font-size:14px;">📏 ~390 km दूरी</span>
                <span style="background:rgba(255,255,255,0.15); color:#fff; padding:8px 18px; border-radius:20px; font-size:14px;">⏱ 6-8 घंटे</span>
                <span style="background:rgba(255,255,255,0.15); color:#fff; padding:8px 18px; border-radius:20px; font-size:14px;">🚂 ट्रेन | 🚌 बस | 🚗 टैक्सी</span>
            </div>
            <nav aria-label="breadcrumb" class="mt-3">
                <ol class="breadcrumb justify-content-center" style="background:none;">
                    <li class="breadcrumb-item"><a href="<?php echo SITE_URL; ?>/" style="color:#FFD48A;">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo SITE_URL; ?>/ayodhya-guide" style="color:#FFD48A;">Ayodhya Guide</a></li>
                    <li class="breadcrumb-item active" style="color:#fff;">Agra to Ayodhya</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- Quick Stats -->
<section style="background: linear-gradient(90deg, #F55900, #FF8237); padding:25px 0;">
    <div class="container">
        <div class="row text-center text-white g-3">
            <div class="col-6 col-md-3"><div class="fw-bold" style="font-size:1.8rem;">390</div><div style="font-size:13px; opacity:0.9;">KM दूरी</div></div>
            <div class="col-6 col-md-3"><div class="fw-bold" style="font-size:1.8rem;">6-8</div><div style="font-size:13px; opacity:0.9;">घंटे यात्रा समय</div></div>
            <div class="col-6 col-md-3"><div class="fw-bold" style="font-size:1.8rem;">₹100</div><div style="font-size:13px; opacity:0.9;">बस किराया (शुरू)</div></div>
            <div class="col-6 col-md-3"><div class="fw-bold" style="font-size:1.8rem;">₹800</div><div style="font-size:13px; opacity:0.9;">टैक्सी (शेयर)</div></div>
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
                <div style="background:linear-gradient(135deg,#FFF8F0,#FFE8CC); border-left:5px solid #F55900; padding:25px; border-radius:0 15px 15px 0; margin-bottom:35px;">
                    <h2 style="color:#F55900; font-size:1.4rem; margin-bottom:12px;">🙏 आगरा से अयोध्या — दो धाम एक यात्रा</h2>
                    <p style="color:#444; line-height:1.9; margin:0;">
                        आगरा (ताजमहल का शहर) और अयोध्या (भगवान राम की नगरी) — दोनों उत्तर प्रदेश के प्रमुख तीर्थ और पर्यटन स्थल हैं। आगरा से अयोध्या की दूरी लगभग <strong>390-400 किलोमीटर</strong> है। यात्रा आगरा-लखनऊ एक्सप्रेसवे (NH-19) और NH-27 से होकर जाती है। 2-3 दिन की ट्रिप में आप ताजमहल देखकर राम जन्मभूमि का भी दर्शन कर सकते हैं।
                    </p>
                </div>

                <!-- Car/Taxi Section -->
                <h2 style="color:#1A0500; font-size:1.6rem; font-weight:700; padding-bottom:10px; border-bottom:3px solid #F55900; margin-bottom:25px;">
                    🚗 विकल्प 1: आगरा से अयोध्या कार/टैक्सी (सबसे सुविधाजनक)
                </h2>

                <p style="color:#444; line-height:1.9; margin-bottom:20px;">
                    कार या टैक्सी से यात्रा सबसे सुविधाजनक विकल्प है क्योंकि आप बीच में रुककर Mathura, Kannauj जैसे स्थान भी देख सकते हैं। <strong>आगरा-लखनऊ एक्सप्रेसवे</strong> से यात्रा बहुत आरामदायक है।
                </p>

                <div style="background:#E3F2FD; border-radius:15px; padding:25px; margin-bottom:30px;">
                    <h3 style="color:#0277BD; font-size:1.2rem; margin-bottom:15px;"><i class="fas fa-route"></i> आगरा → अयोध्या — मुख्य रूट</h3>
                    <div style="display:flex; gap:10px; flex-wrap:wrap; align-items:center; margin-bottom:15px;">
                        <span style="background:#F55900; color:#fff; padding:8px 16px; border-radius:20px; font-weight:600; font-size:14px;">आगरा</span>
                        <span style="color:#F55900; font-size:1.2rem;">→</span>
                        <span style="background:#fff; border:2px solid #F55900; color:#F55900; padding:8px 16px; border-radius:20px; font-size:14px;">Lucknow (NH-19, 330 km)</span>
                        <span style="color:#F55900; font-size:1.2rem;">→</span>
                        <span style="background:linear-gradient(135deg,#F55900,#FFD700); color:#fff; padding:8px 16px; border-radius:20px; font-weight:600; font-size:14px;">🛕 अयोध्या (135 km)</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead style="background:#F55900; color:#fff;">
                                <tr><th>रूट</th><th>दूरी</th><th>समय</th><th>हाईवे</th></tr>
                            </thead>
                            <tbody>
                                <tr><td>आगरा → लखनऊ</td><td>330 km</td><td>~3.5 घंटे</td><td>NH-19 (Agra-Lucknow Expressway)</td></tr>
                                <tr><td>लखनऊ → अयोध्या</td><td>135 km</td><td>~2.5 घंटे</td><td>NH-27</td></tr>
                                <tr style="background:#FFF3E0; font-weight:700;"><td>कुल (आगरा → अयोध्या)</td><td>~465 km</td><td>~6-7 घंटे</td><td>—</td></tr>
                            </tbody>
                        </table>
                    </div>
                    <p style="color:#555; font-size:14px; margin:10px 0 0;"><strong>💡 टिप:</strong> सुबह 4-5 बजे निकलें तो शाम तक अयोध्या पहुंचकर संध्या आरती में शामिल हो सकते हैं।</p>
                </div>

                <div style="background:#E8F5E9; border-radius:12px; padding:20px; margin-bottom:30px;">
                    <h4 style="color:#2E7D32; margin-bottom:12px;"><i class="fas fa-rupee-sign"></i> टैक्सी किराया</h4>
                    <div class="row g-3">
                        <div class="col-6 col-md-3">
                            <div style="background:#fff; border-radius:10px; padding:12px; text-align:center;">
                                <div style="font-size:1.2rem; font-weight:700; color:#F55900;">₹3,500–5,000</div>
                                <div style="font-size:12px; color:#666;">प्राइवेट टैक्सी</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div style="background:#fff; border-radius:10px; padding:12px; text-align:center;">
                                <div style="font-size:1.2rem; font-weight:700; color:#F55900;">₹800–1,200</div>
                                <div style="font-size:12px; color:#666;">शेयर टैक्सी (प्रति व्यक्ति)</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div style="background:#fff; border-radius:10px; padding:12px; text-align:center;">
                                <div style="font-size:1.2rem; font-weight:700; color:#F55900;">₹4,000–7,000</div>
                                <div style="font-size:12px; color:#666;">Ola/Uber</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div style="background:#fff; border-radius:10px; padding:12px; text-align:center;">
                                <div style="font-size:1.2rem; font-weight:700; color:#F55900;">₹120–180</div>
                                <div style="font-size:12px; color:#666;">Toll (Expressway)</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Train Section -->
                <h2 style="color:#1A0500; font-size:1.6rem; font-weight:700; padding-bottom:10px; border-bottom:3px solid #F55900; margin-bottom:25px;">
                    🚂 विकल्प 2: आगरा से अयोध्या ट्रेन
                </h2>

                <p style="color:#444; line-height:1.9; margin-bottom:20px;">
                    आगरा से अयोध्या के लिए <strong>कोई सीधी एक्सप्रेस ट्रेन</strong> नहीं है। अधिकतर ट्रेनें <strong>लखनऊ होकर</strong> जाती हैं। <strong>आगरा कैंट (AGC)</strong> और <strong>आगरा फोर्ट (AF)</strong> मुख्य रेलवे स्टेशन हैं।
                </p>

                <div class="table-responsive" style="margin-bottom:25px;">
                    <table class="table table-bordered table-hover">
                        <thead style="background:#F55900; color:#fff; text-align:center;">
                            <tr>
                                <th>ट्रेन नाम</th>
                                <th>नंबर</th>
                                <th>रवाना (AGC)</th>
                                <th>पहुंचना (AY)</th>
                                <th>समय</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>आगरा-वाराणसी इंटरसिटी</strong></td>
                                <td>12403</td>
                                <td>AGC 06:00</td>
                                <td>LKO → AY ~16:30</td>
                                <td>~10 घंटे</td>
                            </tr>
                            <tr>
                                <td><strong>Janata Express</strong></td>
                                <td>15015</td>
                                <td>AGC 21:20</td>
                                <td>AY 08:20+1</td>
                                <td>~11 घंटे</td>
                            </tr>
                            <tr>
                                <td><strong>Pushpak Express</strong></td>
                                <td>12534</td>
                                <td>AGC 01:22</td>
                                <td>AY 07:45</td>
                                <td>~6.5 घंटे</td>
                            </tr>
                            <tr>
                                <td><strong>Mahanagari Express</strong></td>
                                <td>11094</td>
                                <td>AGC 22:55</td>
                                <td>AY 05:35+1</td>
                                <td>~6.5 घंटे</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div style="background:#FFF3CD; border-radius:12px; padding:18px; margin-bottom:30px;">
                    <h4 style="color:#856404; margin-bottom:10px;">💡 Agra → Lucknow → Ayodhya (2 ट्रेन विकल्प)</h4>
                    <p style="color:#555; font-size:14px; margin:0; line-height:1.8;">
                        <strong>Step 1:</strong> आगरा से लखनऊ (शताब्दी या इंटरसिटी — 3-4 घंटे, ₹200–600)<br>
                        <strong>Step 2:</strong> लखनऊ से अयोध्या (ट्रेन/बस — 2-3 घंटे, ₹30–200)<br>
                        यह सबसे सुनियोजित विकल्प है जिसमें आगरा से सुबह निकलकर दोपहर तक अयोध्या पहुंचा जा सकता है।
                    </p>
                </div>

                <!-- Bus Section -->
                <h2 style="color:#1A0500; font-size:1.6rem; font-weight:700; padding-bottom:10px; border-bottom:3px solid #F55900; margin-bottom:25px;">
                    🚌 विकल्प 3: आगरा से अयोध्या बस
                </h2>

                <p style="color:#444; line-height:1.9; margin-bottom:20px;">
                    <strong>UPSRTC (UP सरकारी बस)</strong> और प्राइवेट बसें आगरा से अयोध्या के लिए चलती हैं, हालांकि ये अधिकतर <strong>लखनऊ होकर</strong> जाती हैं। आईएसबीटी आगरा से लखनऊ की बसें हर 30-60 मिनट पर उपलब्ध रहती हैं।
                </p>

                <div style="background:#F3E5F5; border-radius:15px; padding:25px; margin-bottom:30px;">
                    <h4 style="color:#6A1B9A; margin-bottom:15px;">🚌 बस रूट और किराया</h4>
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead style="background:#6A1B9A; color:#fff;">
                                <tr><th>बस प्रकार</th><th>रूट</th><th>किराया</th><th>समय</th></tr>
                            </thead>
                            <tbody>
                                <tr><td>UPSRTC (साधारण)</td><td>आगरा → लखनऊ → अयोध्या</td><td>₹200–350</td><td>7-9 घंटे</td></tr>
                                <tr><td>Volvo AC Bus</td><td>आगरा → लखनऊ (ISBT → ISBT)</td><td>₹350–600</td><td>4-5 घंटे</td></tr>
                                <tr><td>प्राइवेट Sleeper</td><td>आगरा → लखनऊ रात्रि</td><td>₹400–700</td><td>4-5 घंटे</td></tr>
                                <tr><td>UPSRTC</td><td>लखनऊ → अयोध्या</td><td>₹50–100</td><td>2-3 घंटे</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Agra + Mathura + Ayodhya Tour -->
                <h2 style="color:#1A0500; font-size:1.6rem; font-weight:700; padding-bottom:10px; border-bottom:3px solid #F55900; margin-bottom:25px;">
                    🗺️ आगरा-मथुरा-अयोध्या — 3 धाम यात्रा (5 दिन प्लान)
                </h2>

                <p style="color:#444; line-height:1.9; margin-bottom:20px;">
                    आगरा से अयोध्या यात्रा में <strong>मथुरा-वृंदावन</strong> भी शामिल करके एक यादगार 5 दिन की तीर्थयात्रा बना सकते हैं:
                </p>

                <div style="background:linear-gradient(135deg,#FFF3E0,#FFE8CC); border-radius:15px; padding:25px; margin-bottom:30px;">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div style="background:#fff; border-radius:12px; padding:18px; border-top:4px solid #F55900;">
                                <h5 style="color:#F55900; margin-bottom:10px;">📅 दिन 1-2: आगरा</h5>
                                <ul style="color:#444; font-size:13px; line-height:2; margin:0; padding-left:16px;">
                                    <li>ताजमहल</li>
                                    <li>आगरा का किला</li>
                                    <li>फतेहपुर सीकरी</li>
                                    <li>मेहताब बाग</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div style="background:#fff; border-radius:12px; padding:18px; border-top:4px solid #FFD700;">
                                <h5 style="color:#F55900; margin-bottom:10px;">📅 दिन 2-3: मथुरा-वृंदावन</h5>
                                <ul style="color:#444; font-size:13px; line-height:2; margin:0; padding-left:16px;">
                                    <li>कृष्ण जन्मभूमि</li>
                                    <li>द्वारकाधीश मंदिर</li>
                                    <li>वृंदावन बांके बिहारी</li>
                                    <li>गोवर्धन पर्वत</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div style="background:#fff; border-radius:12px; padding:18px; border-top:4px solid #FF6B35;">
                                <h5 style="color:#F55900; margin-bottom:10px;">📅 दिन 4-5: अयोध्या</h5>
                                <ul style="color:#444; font-size:13px; line-height:2; margin:0; padding-left:16px;">
                                    <li>राम जन्मभूमि मंदिर</li>
                                    <li>हनुमानगढ़ी</li>
                                    <li>कनक भवन</li>
                                    <li>सरयू घाट आरती</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Route Comparison -->
                <h2 style="color:#1A0500; font-size:1.6rem; font-weight:700; padding-bottom:10px; border-bottom:3px solid #F55900; margin-bottom:25px;">
                    📊 कौन सा रास्ता सही? — तुलना
                </h2>

                <div class="table-responsive" style="margin-bottom:35px;">
                    <table class="table table-bordered">
                        <thead style="background:#1A0500; color:#FFD700; text-align:center;">
                            <tr><th>माध्यम</th><th>समय</th><th>किराया</th><th>सुविधा</th><th>सुझाव</th></tr>
                        </thead>
                        <tbody>
                            <tr style="background:#E8F5E9;">
                                <td><strong>🚗 कार/टैक्सी</strong></td>
                                <td>6-7 घंटे</td>
                                <td>₹3,500–5,000</td>
                                <td>⭐⭐⭐⭐⭐</td>
                                <td>परिवार/ग्रुप के लिए सर्वोत्तम</td>
                            </tr>
                            <tr>
                                <td><strong>🚂 ट्रेन</strong></td>
                                <td>6.5–11 घंटे</td>
                                <td>₹100–600</td>
                                <td>⭐⭐⭐⭐</td>
                                <td>बजट यात्री</td>
                            </tr>
                            <tr>
                                <td><strong>🚌 UPSRTC बस</strong></td>
                                <td>7-9 घंटे</td>
                                <td>₹200–350</td>
                                <td>⭐⭐⭐</td>
                                <td>किफायती लेकिन लंबा</td>
                            </tr>
                            <tr>
                                <td><strong>🚖 Agra→LKO→AY</strong></td>
                                <td>5-7 घंटे</td>
                                <td>₹400–800</td>
                                <td>⭐⭐⭐⭐</td>
                                <td>लचीला विकल्प</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Ayodhya Highlights -->
                <h2 style="color:#1A0500; font-size:1.6rem; font-weight:700; padding-bottom:10px; border-bottom:3px solid #F55900; margin-bottom:25px;">
                    🛕 अयोध्या में मुख्य दर्शनीय स्थल
                </h2>

                <div class="row g-3 mb-4">
                    <?php
                    $places = [
                        ['name' => 'राम जन्मभूमि मंदिर', 'desc' => 'भगवान राम का भव्य नया मंदिर — प्राण प्रतिष्ठा 22 Jan 2024', 'icon' => '🛕'],
                        ['name' => 'हनुमानगढ़ी', 'desc' => '76 सीढ़ियों पर स्थित श्री बजरंगबली का प्रमुख मंदिर', 'icon' => '🐒'],
                        ['name' => 'कनक भवन', 'desc' => 'माता सीता और राम जी का सोने का महल — मनोकामना पूर्ण', 'icon' => '🏛️'],
                        ['name' => 'सरयू घाट', 'desc' => 'पवित्र सरयू नदी के तट पर संध्या आरती — अद्भुत दृश्य', 'icon' => '🌊'],
                        ['name' => 'दशरथ महल', 'desc' => 'राजा दशरथ का प्राचीन महल — ऐतिहासिक महत्व', 'icon' => '🏰'],
                        ['name' => 'नागेश्वरनाथ मंदिर', 'desc' => 'भगवान शिव का मंदिर — राम जी द्वारा स्थापित', 'icon' => '🔱'],
                    ];
                    foreach ($places as $p):
                    ?>
                    <div class="col-md-6">
                        <div style="background:#FFF8F0; border:1px solid #FFD0B0; border-radius:12px; padding:15px; display:flex; gap:12px; align-items:flex-start; height:100%;">
                            <div style="font-size:1.8rem; flex-shrink:0;"><?php echo $p['icon']; ?></div>
                            <div>
                                <h5 style="color:#F55900; margin-bottom:5px; font-size:0.95rem;"><?php echo $p['name']; ?></h5>
                                <p style="color:#555; font-size:13px; margin:0;"><?php echo $p['desc']; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- FAQ -->
                <h2 style="color:#1A0500; font-size:1.6rem; font-weight:700; padding-bottom:10px; border-bottom:3px solid #F55900; margin-bottom:25px;">
                    ❓ अक्सर पूछे जाने वाले सवाल (FAQ)
                </h2>

                <div>
                    <?php
                    $faqs = [
                        ['q' => 'आगरा से अयोध्या की दूरी कितनी है?', 'a' => 'आगरा से अयोध्या की दूरी सड़क मार्ग से लगभग 390-410 km है। आगरा-लखनऊ एक्सप्रेसवे (NH-19) से लखनऊ (330 km) और फिर NH-27 से अयोध्या (135 km) — कुल लगभग 465 km।'],
                        ['q' => 'क्या आगरा से अयोध्या की सीधी ट्रेन है?', 'a' => 'हाँ, पुष्पक एक्सप्रेस (12534) और माहानगरी एक्सप्रेस (11094) आगरा कैंट से होकर अयोध्या जाती हैं, लेकिन ये रात की ट्रेनें हैं। सुबह की यात्रा के लिए लखनऊ बदलना पड़ सकता है।'],
                        ['q' => 'आगरा से अयोध्या कितने घंटे का रास्ता है?', 'a' => 'कार से एक्सप्रेसवे द्वारा 6-7 घंटे (लखनऊ होते हुए), ट्रेन से 6.5-11 घंटे (ट्रेन के अनुसार), और बस से 7-9 घंटे।'],
                        ['q' => 'क्या आगरा-ताजमहल-मथुरा-अयोध्या एक टूर में हो सकता है?', 'a' => 'हाँ! 5 दिन की "4 धाम UP यात्रा" बना सकते हैं: दिल्ली → आगरा (ताजमहल) → मथुरा-वृंदावन → अयोध्या → वाराणसी। यह उत्तर प्रदेश पर्यटन का सबसे लोकप्रिय सर्किट है।'],
                        ['q' => 'आगरा से अयोध्या ऑटो-रिक्शा या टेंपो से जा सकते हैं?', 'a' => 'नहीं, ऑटो-रिक्शा इतनी लंबी दूरी के लिए नहीं होते। आगरा से लखनऊ तक बस/ट्रेन/टैक्सी से जाएं, फिर लखनऊ से अयोध्या के लिए शेयर टैक्सी, बस, या ट्रेन लें।'],
                        ['q' => 'अयोध्या राम मंदिर का दर्शन समय क्या है?', 'a' => 'राम मंदिर सुबह 6 बजे से रात 10 बजे तक खुला रहता है। सुबह 6:30 बजे मंगला आरती और शाम 7:00 बजे संध्या आरती होती है। दर्शन के लिए ऑनलाइन बुकिंग उपलब्ध है।'],
                    ];
                    foreach ($faqs as $i => $faq):
                    ?>
                    <div style="border:1px solid #FFD0B0; border-radius:10px; margin-bottom:10px; overflow:hidden;">
                        <button class="btn w-100 text-start" style="background:<?php echo $i===0?'#FFF8F0':'#fff'; ?>; padding:15px 20px; font-weight:600; color:#1A0500; border:none; font-size:15px;" type="button" data-bs-toggle="collapse" data-bs-target="#faq<?php echo $i; ?>">
                            <i class="fas fa-question-circle" style="color:#F55900; margin-right:10px;"></i><?php echo $faq['q']; ?>
                            <i class="fas fa-chevron-down float-end mt-1" style="color:#F55900;"></i>
                        </button>
                        <div class="collapse <?php echo $i===0?'show':''; ?>" id="faq<?php echo $i; ?>">
                            <div style="padding:15px 20px; background:#FFFBF5; color:#444; font-size:14px; line-height:1.8; border-top:1px solid #FFD0B0;">
                                <?php echo $faq['a']; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div style="position:sticky; top:20px;">

                    <!-- Quick Book -->
                    <div style="background:linear-gradient(135deg,#F55900,#FF8237); border-radius:20px; padding:25px; color:#fff; margin-bottom:25px;">
                        <h3 style="font-size:1.2rem; margin-bottom:15px;"><i class="fas fa-train"></i> ट्रेन/बस बुक करें</h3>
                        <div style="display:flex; flex-direction:column; gap:10px;">
                            <a href="https://www.irctc.co.in/nget/train-search?fromStation=AGC&toStation=AY" target="_blank" rel="noopener noreferrer" style="background:rgba(255,255,255,0.2); color:#fff; padding:12px 18px; border-radius:10px; text-decoration:none; font-weight:600; display:flex; align-items:center; gap:10px;">
                                <i class="fas fa-train"></i> IRCTC पर ट्रेन बुक करें
                            </a>
                            <a href="https://www.redbus.in/bus-tickets/agra-to-ayodhya" target="_blank" rel="noopener noreferrer" style="background:rgba(255,255,255,0.2); color:#fff; padding:12px 18px; border-radius:10px; text-decoration:none; font-weight:600; display:flex; align-items:center; gap:10px;">
                                <i class="fas fa-bus"></i> RedBus पर बस बुक करें
                            </a>
                        </div>
                    </div>

                    <!-- Contact -->
                    <div style="background:#FFF8F0; border:2px solid #FFD0B0; border-radius:20px; padding:25px; margin-bottom:25px;">
                        <h3 style="color:#F55900; font-size:1.1rem; margin-bottom:15px;"><i class="fas fa-headset"></i> सहायता चाहिए?</h3>
                        <a href="tel:+918168877332" style="display:flex; align-items:center; gap:10px; background:#F55900; color:#fff; padding:12px 18px; border-radius:10px; text-decoration:none; font-weight:700; margin-bottom:10px;">
                            <i class="fas fa-phone"></i> +91-8168877332
                        </a>
                        <a href="mailto:info@ayodhyarammandir.in" style="display:flex; align-items:center; gap:10px; background:#333; color:#fff; padding:10px 18px; border-radius:10px; text-decoration:none; font-size:13px;">
                            <i class="fas fa-envelope"></i> info@ayodhyarammandir.in
                        </a>
                    </div>

                    <!-- Related Links -->
                    <div style="background:#fff; border:1px solid #eee; border-radius:20px; padding:25px; margin-bottom:25px;">
                        <h3 style="color:#1A0500; font-size:1.1rem; margin-bottom:15px;"><i class="fas fa-link" style="color:#F55900;"></i> संबंधित पेज</h3>
                        <ul style="list-style:none; padding:0; margin:0;">
                            <?php
                            $links = [
                                ['url' => 'delhi-to-ayodhya', 'label' => '🚆 दिल्ली से अयोध्या'],
                                ['url' => 'lucknow-to-ayodhya', 'label' => '🚌 लखनऊ से अयोध्या'],
                                ['url' => 'mumbai-to-ayodhya', 'label' => '✈️ मुंबई से अयोध्या'],
                                ['url' => 'varanasi-to-ayodhya', 'label' => '🚂 वाराणसी से अयोध्या'],
                                ['url' => 'prayagraj-to-ayodhya', 'label' => '🚆 प्रयागराज से अयोध्या'],
                                ['url' => 'hotels-ayodhya', 'label' => '🏨 अयोध्या में होटल'],
                                ['url' => 'ram-mandir-darshan-guide', 'label' => '🛕 दर्शन गाइड'],
                            ];
                            foreach ($links as $link):
                            ?>
                            <li style="border-bottom:1px solid #f0f0f0; padding:10px 0;">
                                <a href="<?php echo SITE_URL . '/' . $link['url']; ?>" style="color:#444; text-decoration:none; font-size:14px; display:flex; align-items:center; gap:8px;">
                                    <?php echo $link['label']; ?>
                                    <i class="fas fa-arrow-right" style="color:#F55900; font-size:11px; margin-left:auto;"></i>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Darshan Timing -->
                    <div style="background:linear-gradient(135deg,#1A0500,#3D1A00); border-radius:20px; padding:25px; color:#fff;">
                        <h3 style="color:#FFD700; font-size:1.1rem; margin-bottom:15px;"><i class="fas fa-clock"></i> राम मंदिर दर्शन समय</h3>
                        <ul style="list-style:none; padding:0; margin:0; font-size:14px;">
                            <li style="border-bottom:1px solid rgba(255,215,0,0.2); padding:8px 0;">🌅 खुलता है: <strong style="color:#FFD700;">6:00 AM</strong></li>
                            <li style="border-bottom:1px solid rgba(255,215,0,0.2); padding:8px 0;">🌙 बंद होता है: <strong style="color:#FFD700;">10:00 PM</strong></li>
                            <li style="border-bottom:1px solid rgba(255,215,0,0.2); padding:8px 0;">🔔 मंगला आरती: <strong style="color:#FFD700;">6:30 AM</strong></li>
                            <li style="padding:8px 0;">🪔 संध्या आरती: <strong style="color:#FFD700;">7:00 PM</strong></li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<!-- CTA Section -->
<section style="background:linear-gradient(135deg,#F55900,#FF8237); padding:60px 0; text-align:center;">
    <div class="container">
        <h2 style="color:#fff; font-size:clamp(1.5rem,4vw,2.2rem); font-weight:800; margin-bottom:15px;">
            🙏 जय श्री राम! आगरा से अयोध्या चलें
        </h2>
        <p style="color:rgba(255,255,255,0.9); font-size:1.1rem; margin-bottom:30px; max-width:600px; margin-left:auto; margin-right:auto;">
            ताजमहल की सुंदरता के बाद राम जन्मभूमि का दिव्य दर्शन — यात्रा अविस्मरणीय रहेगी!
        </p>
        <div style="display:flex; gap:15px; justify-content:center; flex-wrap:wrap;">
            <a href="<?php echo SITE_URL; ?>/ram-mandir-darshan-guide" style="background:#fff; color:#F55900; padding:15px 35px; border-radius:50px; font-weight:700; text-decoration:none; font-size:1rem;">
                <i class="fas fa-compass"></i> दर्शन गाइड देखें
            </a>
            <a href="<?php echo SITE_URL; ?>/hotels-ayodhya" style="background:rgba(255,255,255,0.2); color:#fff; border:2px solid #fff; padding:15px 35px; border-radius:50px; font-weight:700; text-decoration:none; font-size:1rem;">
                <i class="fas fa-hotel"></i> होटल बुक करें
            </a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
