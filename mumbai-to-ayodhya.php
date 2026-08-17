<?php
/**
 * Mumbai to Ayodhya Travel Guide - 3000+ words SEO page
 * AyodhyaRamMandir.in
 */

$pageTitle = 'मुंबई से अयोध्या कैसे जाएं - Train, Flight, Bus सम्पूर्ण गाइड 2025 | Mumbai to Ayodhya';

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/functions.php';

$lang = getCurrentLang();

$pageSchema = json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'TravelGuide',
    'name' => 'Mumbai to Ayodhya Travel Guide 2025',
    'description' => 'Complete guide to travel from Mumbai to Ayodhya by train, flight, bus. Distance 1490 km, all routes with cost and timing for Ram Mandir darshan.',
    'url' => SITE_URL . '/mumbai-to-ayodhya',
    'image' => SITE_URL . '/assets/images/ayodhya-mandir.jpg',
    'author' => ['@type' => 'Organization', 'name' => 'AyodhyaRamMandir.in'],
    'publisher' => ['@type' => 'Organization', 'name' => 'AyodhyaRamMandir.in', 'url' => SITE_URL],
    'datePublished' => '2024-01-22',
    'dateModified' => date('Y-m-d'),
    'inLanguage' => ['hi', 'en'],
    'about' => [['@type' => 'Place', 'name' => 'Ayodhya'], ['@type' => 'Place', 'name' => 'Mumbai']],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include __DIR__ . '/includes/header.php';
?>

<!-- Hero Section -->
<section style="background: linear-gradient(135deg, #0a1628 0%, #1a2d5e 50%, #0d3b7a 100%); padding: 100px 0 60px; position:relative; overflow:hidden;">
    <div style="position:absolute;top:0;left:0;right:0;bottom:0; background:url('assets/images/ayodhya-mandir.jpg') center/cover; opacity:0.12;"></div>
    <div class="container text-center" style="position:relative;z-index:2;">
        <div data-aos="fade-down">
            <span style="background:rgba(255,165,0,0.2); color:#FFD700; padding:8px 20px; border-radius:30px; font-size:13px; letter-spacing:2px; text-transform:uppercase;">✈️ यात्रा गाइड | Travel Guide</span>
            <h1 style="color:#fff; font-size:clamp(1.8rem,5vw,3rem); font-weight:800; margin:20px 0 15px; font-family:'Noto Serif Devanagari',serif;">
                मुंबई से अयोध्या कैसे जाएं?
            </h1>
            <p style="color:#FFD48A; font-size:1.1rem; max-width:750px; margin:0 auto 20px;">
                ट्रेन, फ्लाइट, बस — हर माध्यम से सम्पूर्ण यात्रा जानकारी | दूरी: ~1,490 km | समय: 2-26 घंटे
            </p>
            <div style="display:flex; gap:15px; justify-content:center; flex-wrap:wrap; margin-top:20px;">
                <span style="background:rgba(255,255,255,0.15); color:#fff; padding:8px 18px; border-radius:20px; font-size:14px;">📏 ~1,490 km दूरी</span>
                <span style="background:rgba(255,255,255,0.15); color:#fff; padding:8px 18px; border-radius:20px; font-size:14px;">✈️ फ्लाइट: ~2 घंटे</span>
                <span style="background:rgba(255,255,255,0.15); color:#fff; padding:8px 18px; border-radius:20px; font-size:14px;">🚂 ट्रेन: 24-26 घंटे</span>
            </div>
            <nav aria-label="breadcrumb" class="mt-3">
                <ol class="breadcrumb justify-content-center" style="background:none;">
                    <li class="breadcrumb-item"><a href="<?php echo SITE_URL; ?>/" style="color:#FFD48A;">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo SITE_URL; ?>/ayodhya-guide" style="color:#FFD48A;">Ayodhya Guide</a></li>
                    <li class="breadcrumb-item active" style="color:#fff;">Mumbai to Ayodhya</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- Quick Stats -->
<section style="background: linear-gradient(90deg, #F55900, #FF8237); padding:25px 0;">
    <div class="container">
        <div class="row text-center text-white g-3">
            <div class="col-6 col-md-3"><div class="fw-bold" style="font-size:1.8rem;">1,490</div><div style="font-size:13px; opacity:0.9;">KM दूरी</div></div>
            <div class="col-6 col-md-3"><div class="fw-bold" style="font-size:1.8rem;">~2 घंटे</div><div style="font-size:13px; opacity:0.9;">फ्लाइट से</div></div>
            <div class="col-6 col-md-3"><div class="fw-bold" style="font-size:1.8rem;">₹2,000+</div><div style="font-size:13px; opacity:0.9;">फ्लाइट किराया (शुरू)</div></div>
            <div class="col-6 col-md-3"><div class="fw-bold" style="font-size:1.8rem;">₹500+</div><div style="font-size:13px; opacity:0.9;">ट्रेन किराया (शुरू)</div></div>
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
                    <h2 style="color:#F55900; font-size:1.4rem; margin-bottom:12px;">🙏 मुंबई से अयोध्या — राम भक्तों के लिए सम्पूर्ण गाइड</h2>
                    <p style="color:#444; line-height:1.9; margin:0;">
                        मुंबई से अयोध्या की यात्रा लगभग 1,490 किलोमीटर की है। यह दूरी भले ही लंबी लगे, लेकिन अब फ्लाइट की सुविधा से यह यात्रा मात्र 2 घंटे में पूरी हो सकती है। अयोध्या में नए महर्षि वाल्मीकि अंतर्राष्ट्रीय हवाईअड्डे के खुलने के बाद मुंबई से सीधी फ्लाइट उपलब्ध है। ट्रेन से यात्रा करने वाले भक्तों के लिए भी माहानगरी एक्सप्रेस, पुष्पक एक्सप्रेस जैसी कई ट्रेनें उपलब्ध हैं।
                    </p>
                </div>

                <!-- Flight Section -->
                <h2 style="color:#1A0500; font-size:1.6rem; font-weight:700; padding-bottom:10px; border-bottom:3px solid #F55900; margin-bottom:25px;">
                    ✈️ विकल्प 1: मुंबई से अयोध्या फ्लाइट (सबसे तेज़)
                </h2>

                <p style="color:#444; line-height:1.9; margin-bottom:20px;">
                    <strong>मुंबई (BOM) से अयोध्या (AYJ)</strong> के लिए सीधी फ्लाइट सबसे सुविधाजनक और तेज़ विकल्प है। अयोध्या का <strong>महर्षि वाल्मीकि अंतर्राष्ट्रीय हवाईअड्डा (AYJ)</strong> जनवरी 2024 में खुला, जिसके बाद कई एयरलाइंस ने मुंबई से सीधी उड़ानें शुरू कीं।
                </p>

                <div style="background:#F0F8FF; border-radius:15px; padding:25px; margin-bottom:30px;">
                    <h3 style="color:#0066CC; font-size:1.2rem; margin-bottom:15px;"><i class="fas fa-plane"></i> मुंबई–अयोध्या फ्लाइट जानकारी</h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead style="background:#F55900; color:#fff;">
                                <tr><th>एयरलाइन</th><th>रूट</th><th>समय</th><th>किराया (शुरू)</th></tr>
                            </thead>
                            <tbody>
                                <tr><td>IndiGo</td><td>BOM → AYJ</td><td>~2 घंटे</td><td>₹2,000–6,000</td></tr>
                                <tr><td>Air India</td><td>BOM → AYJ</td><td>~2 घंटे</td><td>₹2,500–8,000</td></tr>
                                <tr><td>SpiceJet</td><td>BOM → AYJ</td><td>~2 घंटे</td><td>₹1,800–5,500</td></tr>
                                <tr><td>Vistara/TATA</td><td>BOM → AYJ</td><td>~2 घंटे</td><td>₹3,000–9,000</td></tr>
                            </tbody>
                        </table>
                    </div>
                    <p style="color:#555; font-size:14px; margin-top:10px; margin-bottom:0;">
                        <strong>💡 टिप:</strong> कम से कम 3-4 हफ्ते पहले बुकिंग करें — त्योहारों जैसे राम नवमी, दीपोत्सव के समय किराया बढ़ जाता है। MakeMyTrip, IXIGO, Google Flights से तुलना करें।
                    </p>
                </div>

                <div style="background:#FFF3CD; border-radius:12px; padding:20px; margin-bottom:30px;">
                    <h4 style="color:#856404; margin-bottom:10px;">✈️ अयोध्या हवाईअड्डे से राम मंदिर कैसे जाएं?</h4>
                    <ul style="color:#555; line-height:2; margin:0; padding-left:20px;">
                        <li>हवाईअड्डे से राम मंदिर की दूरी: <strong>~12 km</strong></li>
                        <li>प्री-पेड टैक्सी: ₹200–400 (30-40 मिनट)</li>
                        <li>ऑटो रिक्शा: ₹100–200</li>
                        <li>UPSRTC बस: ₹30–50 (उपलब्ध हो तो)</li>
                    </ul>
                </div>

                <!-- Train Section -->
                <h2 style="color:#1A0500; font-size:1.6rem; font-weight:700; padding-bottom:10px; border-bottom:3px solid #F55900; margin-bottom:25px;">
                    🚂 विकल्प 2: मुंबई से अयोध्या ट्रेन
                </h2>

                <p style="color:#444; line-height:1.9; margin-bottom:20px;">
                    ट्रेन से यात्रा करने वाले भक्तों के लिए मुंबई और अयोध्या के बीच कई ट्रेनें उपलब्ध हैं। <strong>मुंबई CST (CSTM), बांद्रा टर्मिनस (BDTS), और लोकमान्य तिलक टर्मिनस (LTT)</strong> से ट्रेनें खुलती हैं और <strong>अयोध्या जंक्शन (AY)</strong> पहुंचती हैं।
                </p>

                <div class="table-responsive" style="margin-bottom:30px;">
                    <table class="table table-bordered table-hover">
                        <thead style="background:#F55900; color:#fff; text-align:center;">
                            <tr>
                                <th>ट्रेन नाम</th>
                                <th>ट्रेन नंबर</th>
                                <th>रवाना (मुंबई)</th>
                                <th>पहुंचना (अयोध्या)</th>
                                <th>समय</th>
                                <th>दिन</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>माहानगरी एक्सप्रेस</strong></td>
                                <td>11093</td>
                                <td>CSTM 17:05</td>
                                <td>AY 17:20+1</td>
                                <td>~24 घंटे</td>
                                <td>रोज़</td>
                            </tr>
                            <tr>
                                <td><strong>पुष्पक एक्सप्रेस</strong></td>
                                <td>12533</td>
                                <td>LTT 18:10</td>
                                <td>AY 19:45+1</td>
                                <td>~25 घंटे</td>
                                <td>रोज़</td>
                            </tr>
                            <tr>
                                <td><strong>अवध एक्सप्रेस</strong></td>
                                <td>19037</td>
                                <td>BDTS 08:15</td>
                                <td>AY 12:20+2</td>
                                <td>~28 घंटे</td>
                                <td>सभी</td>
                            </tr>
                            <tr>
                                <td><strong>कुशीनगर एक्सप्रेस</strong></td>
                                <td>12521</td>
                                <td>LTT 06:00</td>
                                <td>AY 10:20+1</td>
                                <td>~28 घंटे</td>
                                <td>चुनिंदा</td>
                            </tr>
                            <tr>
                                <td><strong>गोरखपुर एक्सप्रेस</strong></td>
                                <td>15017</td>
                                <td>LTT 20:25</td>
                                <td>AY 04:15+2</td>
                                <td>~32 घंटे</td>
                                <td>सभी</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div style="background:#E8F5E9; border-radius:12px; padding:20px; margin-bottom:30px;">
                    <h4 style="color:#2E7D32; margin-bottom:12px;"><i class="fas fa-rupee-sign"></i> ट्रेन किराया (अनुमानित)</h4>
                    <div class="row g-3">
                        <div class="col-6 col-md-3">
                            <div style="background:#fff; border-radius:10px; padding:15px; text-align:center;">
                                <div style="font-size:1.3rem; font-weight:700; color:#F55900;">₹350–550</div>
                                <div style="font-size:12px; color:#666;">स्लीपर (SL)</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div style="background:#fff; border-radius:10px; padding:15px; text-align:center;">
                                <div style="font-size:1.3rem; font-weight:700; color:#F55900;">₹950–1,400</div>
                                <div style="font-size:12px; color:#666;">3AC (3A)</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div style="background:#fff; border-radius:10px; padding:15px; text-align:center;">
                                <div style="font-size:1.3rem; font-weight:700; color:#F55900;">₹1,400–2,200</div>
                                <div style="font-size:12px; color:#666;">2AC (2A)</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div style="background:#fff; border-radius:10px; padding:15px; text-align:center;">
                                <div style="font-size:1.3rem; font-weight:700; color:#F55900;">₹2,500–4,500</div>
                                <div style="font-size:12px; color:#666;">1AC (1A)</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Via Lucknow Option -->
                <h2 style="color:#1A0500; font-size:1.6rem; font-weight:700; padding-bottom:10px; border-bottom:3px solid #F55900; margin-bottom:25px;">
                    🔄 विकल्प 3: मुंबई → लखनऊ → अयोध्या
                </h2>

                <p style="color:#444; line-height:1.9; margin-bottom:20px;">
                    यदि सीधी ट्रेन या फ्लाइट उपलब्ध न हो, तो <strong>मुंबई से लखनऊ</strong> जाकर वहाँ से अयोध्या जा सकते हैं। यह एक लोकप्रिय विकल्प है।
                </p>

                <div style="background:#F3E5F5; border-radius:15px; padding:25px; margin-bottom:30px;">
                    <h4 style="color:#6A1B9A; margin-bottom:15px;">📍 Mumbai → Lucknow → Ayodhya रूट</h4>
                    <div style="display:flex; align-items:center; gap:15px; flex-wrap:wrap;">
                        <div style="background:#fff; border-radius:10px; padding:15px 20px; text-align:center; min-width:120px;">
                            <div style="font-size:1.5rem;">🌆</div>
                            <div style="font-weight:700;">मुंबई</div>
                            <div style="font-size:12px; color:#666;">रवाना</div>
                        </div>
                        <div style="font-size:1.5rem; color:#F55900;">→</div>
                        <div style="background:#fff; border-radius:10px; padding:15px 20px; text-align:center; min-width:120px;">
                            <div style="font-size:1.5rem;">🏙️</div>
                            <div style="font-weight:700;">लखनऊ</div>
                            <div style="font-size:12px; color:#666;">ट्रेन: ~20-22 घंटे</div>
                        </div>
                        <div style="font-size:1.5rem; color:#F55900;">→</div>
                        <div style="background:linear-gradient(135deg,#FF6B35,#FFD700); border-radius:10px; padding:15px 20px; text-align:center; min-width:120px;">
                            <div style="font-size:1.5rem;">🛕</div>
                            <div style="font-weight:700; color:#fff;">अयोध्या</div>
                            <div style="font-size:12px; color:rgba(255,255,255,0.85);">ट्रेन/बस: 2-3 घंटे</div>
                        </div>
                    </div>
                    <p style="color:#555; margin-top:15px; margin-bottom:0; font-size:14px;">
                        मुंबई से लखनऊ के लिए शताब्दी, राजधानी, तेजस एक्सप्रेस और अनेक मेल ट्रेनें उपलब्ध हैं।
                    </p>
                </div>

                <!-- Best Route Comparison -->
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
                                <td><strong>✈️ फ्लाइट</strong></td>
                                <td>~2 घंटे</td>
                                <td>₹2,000–8,000</td>
                                <td>⭐⭐⭐⭐⭐</td>
                                <td>परिवार / समय की कमी</td>
                            </tr>
                            <tr>
                                <td><strong>🚂 ट्रेन (सीधी)</strong></td>
                                <td>24–26 घंटे</td>
                                <td>₹350–4,500</td>
                                <td>⭐⭐⭐⭐</td>
                                <td>बजट यात्री / वरिष्ठ नागरिक</td>
                            </tr>
                            <tr>
                                <td><strong>🚆 मुंबई→LKO→AY</strong></td>
                                <td>22–26 घंटे</td>
                                <td>₹500–3,000</td>
                                <td>⭐⭐⭐⭐</td>
                                <td>ज़्यादा ट्रेन विकल्प</td>
                            </tr>
                            <tr>
                                <td><strong>🚌 बस (डायरेक्ट)</strong></td>
                                <td>36–42 घंटे</td>
                                <td>₹800–2,500</td>
                                <td>⭐⭐</td>
                                <td>अनुशंसित नहीं</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Packing and Tips -->
                <h2 style="color:#1A0500; font-size:1.6rem; font-weight:700; padding-bottom:10px; border-bottom:3px solid #F55900; margin-bottom:25px;">
                    🎒 यात्रा की तैयारी — मुंबई के भक्तों के लिए टिप्स
                </h2>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <div style="background:#FFF8F0; border:1px solid #FFD0B0; border-radius:12px; padding:20px; height:100%;">
                            <h4 style="color:#F55900; font-size:1rem; margin-bottom:12px;">🌡️ सही समय कब जाएं</h4>
                            <ul style="color:#555; line-height:2; margin:0; padding-left:18px; font-size:14px;">
                                <li><strong>अक्टूबर–मार्च:</strong> ठंडा, सुहावना मौसम (सर्वोत्तम)</li>
                                <li><strong>राम नवमी (अप्रैल):</strong> भव्य उत्सव, लाखों भक्त</li>
                                <li><strong>दीपोत्सव (नवंबर):</strong> दीपों की नगरी — अद्भुत नज़ारा</li>
                                <li><strong>मई–जुलाई:</strong> गर्मी अधिक, टालें तो बेहतर</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="background:#F0FFF4; border:1px solid #B2DFDB; border-radius:12px; padding:20px; height:100%;">
                            <h4 style="color:#2E7D32; font-size:1rem; margin-bottom:12px;">📦 क्या साथ लाएं</h4>
                            <ul style="color:#555; line-height:2; margin:0; padding-left:18px; font-size:14px;">
                                <li>हल्के, शालीन कपड़े (ट्रेडिशनल बेहतर)</li>
                                <li>आरामदायक जूते/चप्पल (बहुत चलना होगा)</li>
                                <li>पानी की बोतल, नाश्ता (लंबी ट्रेन यात्रा)</li>
                                <li>ID Card — Aadhar / Voter ID</li>
                                <li>Cash + UPI (मंदिर प्रसाद, होटल)</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Ayodhya Darshan from Mumbai -->
                <h2 style="color:#1A0500; font-size:1.6rem; font-weight:700; padding-bottom:10px; border-bottom:3px solid #F55900; margin-bottom:25px;">
                    🛕 अयोध्या में क्या देखें — मुंबई से आने वालों के लिए 2-दिन प्लान
                </h2>

                <div style="background:linear-gradient(135deg,#FFF3E0,#FFE8CC); border-radius:15px; padding:25px; margin-bottom:30px;">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <h4 style="color:#F55900; border-bottom:2px solid #F55900; padding-bottom:8px;">🌅 पहला दिन</h4>
                            <ul style="color:#444; line-height:2.2; margin:0; padding-left:18px; font-size:14px;">
                                <li>सुबह 6 बजे: सरयू स्नान और आरती</li>
                                <li>7:00 AM: राम मंदिर पहले दर्शन</li>
                                <li>9:00 AM: हनुमानगढ़ी दर्शन</li>
                                <li>11:00 AM: कनक भवन दर्शन</li>
                                <li>1:00 PM: विश्राम + भोजन</li>
                                <li>4:00 PM: राम की पैड़ी भ्रमण</li>
                                <li>संध्या: सरयू आरती (7 PM)</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h4 style="color:#F55900; border-bottom:2px solid #F55900; padding-bottom:8px;">🌄 दूसरा दिन</h4>
                            <ul style="color:#444; line-height:2.2; margin:0; padding-left:18px; font-size:14px;">
                                <li>सुबह 6 बजे: राम मंदिर — दूसरे दर्शन</li>
                                <li>8:00 AM: दशरथ महल दर्शन</li>
                                <li>10:00 AM: त्रेता का ठाकुर मंदिर</li>
                                <li>12:00 PM: नागेश्वरनाथ मंदिर</li>
                                <li>2:00 PM: खरीदारी — प्रसाद, स्मृति चिह्न</li>
                                <li>4:00 PM: वापसी यात्रा की तैयारी</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Hotels near Ram Mandir -->
                <h2 style="color:#1A0500; font-size:1.6rem; font-weight:700; padding-bottom:10px; border-bottom:3px solid #F55900; margin-bottom:25px;">
                    🏨 अयोध्या में ठहरने की व्यवस्था
                </h2>

                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <div style="background:#FFF; border:2px solid #FFD0B0; border-radius:12px; padding:20px; text-align:center;">
                            <div style="font-size:2rem; margin-bottom:8px;">🏚️</div>
                            <h4 style="color:#F55900; font-size:1rem;">बजट</h4>
                            <div style="font-size:1.3rem; font-weight:700; color:#333;">₹300–800</div>
                            <div style="font-size:12px; color:#666;">धर्मशाला, गेस्टहाउस</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div style="background:#FFF; border:2px solid #FFD700; border-radius:12px; padding:20px; text-align:center;">
                            <div style="font-size:2rem; margin-bottom:8px;">🏩</div>
                            <h4 style="color:#F55900; font-size:1rem;">मध्यम</h4>
                            <div style="font-size:1.3rem; font-weight:700; color:#333;">₹1,000–3,000</div>
                            <div style="font-size:12px; color:#666;">होटल/OYO</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div style="background:#FFF; border:2px solid #28A745; border-radius:12px; padding:20px; text-align:center;">
                            <div style="font-size:2rem; margin-bottom:8px;">🏨</div>
                            <h4 style="color:#F55900; font-size:1rem;">लक्ज़री</h4>
                            <div style="font-size:1.3rem; font-weight:700; color:#333;">₹4,000+</div>
                            <div style="font-size:12px; color:#666;">Marriott, Radisson</div>
                        </div>
                    </div>
                </div>

                <!-- FAQ -->
                <h2 style="color:#1A0500; font-size:1.6rem; font-weight:700; padding-bottom:10px; border-bottom:3px solid #F55900; margin-bottom:25px;">
                    ❓ अक्सर पूछे जाने वाले सवाल (FAQ)
                </h2>

                <div style="margin-bottom:15px;">
                    <?php
                    $faqs = [
                        ['q' => 'क्या मुंबई से अयोध्या के लिए सीधी ट्रेन है?', 'a' => 'हाँ, माहानगरी एक्सप्रेस (11093), पुष्पक एक्सप्रेस (12533) और अवध एक्सप्रेस (19037) मुंबई से सीधी अयोध्या जाती हैं। यात्रा का समय लगभग 24-28 घंटे है।'],
                        ['q' => 'मुंबई से अयोध्या फ्लाइट कितने घंटे की है?', 'a' => 'मुंबई से अयोध्या (AYJ) की सीधी फ्लाइट लगभग 2 घंटे की होती है। IndiGo, Air India और SpiceJet के पास नियमित उड़ानें हैं।'],
                        ['q' => 'मुंबई से अयोध्या की दूरी कितनी है?', 'a' => 'मुंबई से अयोध्या की दूरी सड़क मार्ग से लगभग 1,490 km है। ट्रेन मार्ग लगभग 1,500-1,600 km का है।'],
                        ['q' => 'क्या मुंबई से अयोध्या के लिए बस जाती है?', 'a' => 'हाँ, प्राइवेट टूरिस्ट बसें मुंबई से अयोध्या जाती हैं लेकिन यात्रा 35-40 घंटे की होती है। लंबी दूरी के कारण ट्रेन या फ्लाइट बेहतर विकल्प है।'],
                        ['q' => 'अयोध्या में राम मंदिर दर्शन का समय क्या है?', 'a' => 'राम मंदिर सुबह 6 बजे से रात 10 बजे तक खुला रहता है। सुबह 6-7 बजे और शाम 6-7 बजे की आरती विशेष होती है।'],
                        ['q' => 'मुंबई से अयोध्या यात्रा पर कुल कितना खर्च आएगा?', 'a' => 'ट्रेन से 2 दिन का कुल खर्च (आना-जाना + होटल + खाना): ₹2,000–6,000 प्रति व्यक्ति। फ्लाइट से: ₹5,000–15,000 प्रति व्यक्ति।'],
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

                    <!-- Quick Booking Card -->
                    <div style="background:linear-gradient(135deg,#F55900,#FF8237); border-radius:20px; padding:25px; color:#fff; margin-bottom:25px;">
                        <h3 style="font-size:1.2rem; margin-bottom:15px;"><i class="fas fa-train"></i> ट्रेन/फ्लाइट बुक करें</h3>
                        <div style="display:flex; flex-direction:column; gap:10px;">
                            <a href="https://www.irctc.co.in/nget/train-search?fromStation=CSTM&toStation=AY" target="_blank" rel="noopener noreferrer" style="background:rgba(255,255,255,0.2); color:#fff; padding:12px 18px; border-radius:10px; text-decoration:none; font-weight:600; display:flex; align-items:center; gap:10px;">
                                <i class="fas fa-train"></i> IRCTC पर ट्रेन बुक करें
                            </a>
                            <a href="https://www.makemytrip.com/flights/mumbai-to-ayodhya-cheap-flights.html" target="_blank" rel="noopener noreferrer" style="background:rgba(255,255,255,0.2); color:#fff; padding:12px 18px; border-radius:10px; text-decoration:none; font-weight:600; display:flex; align-items:center; gap:10px;">
                                <i class="fas fa-plane"></i> MakeMyTrip पर फ्लाइट
                            </a>
                        </div>
                    </div>

                    <!-- Contact Card -->
                    <div style="background:#FFF8F0; border:2px solid #FFD0B0; border-radius:20px; padding:25px; margin-bottom:25px;">
                        <h3 style="color:#F55900; font-size:1.1rem; margin-bottom:15px;"><i class="fas fa-headset"></i> सहायता चाहिए?</h3>
                        <p style="color:#555; font-size:14px; margin-bottom:15px;">अयोध्या यात्रा के बारे में किसी भी सवाल के लिए हमसे संपर्क करें।</p>
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
                                ['url' => 'varanasi-to-ayodhya', 'label' => '🚂 वाराणसी से अयोध्या'],
                                ['url' => 'prayagraj-to-ayodhya', 'label' => '🚆 प्रयागराज से अयोध्या'],
                                ['url' => 'agra-to-ayodhya', 'label' => '🚌 आगरा से अयोध्या'],
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

                    <!-- Ram Mandir Darshan Timing -->
                    <div style="background:linear-gradient(135deg,#1A0500,#3D1A00); border-radius:20px; padding:25px; color:#fff;">
                        <h3 style="color:#FFD700; font-size:1.1rem; margin-bottom:15px;"><i class="fas fa-clock"></i> राम मंदिर दर्शन समय</h3>
                        <ul style="list-style:none; padding:0; margin:0; font-size:14px;">
                            <li style="border-bottom:1px solid rgba(255,215,0,0.2); padding:8px 0;">🌅 सुबह खुलता है: <strong style="color:#FFD700;">6:00 AM</strong></li>
                            <li style="border-bottom:1px solid rgba(255,215,0,0.2); padding:8px 0;">🌙 शाम बंद होता है: <strong style="color:#FFD700;">10:00 PM</strong></li>
                            <li style="border-bottom:1px solid rgba(255,215,0,0.2); padding:8px 0;">🔔 सुबह आरती: <strong style="color:#FFD700;">6:30 AM</strong></li>
                            <li style="padding:8px 0;">🪔 संध्या आरती: <strong style="color:#FFD700;">7:00 PM</strong></li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<!-- Call to Action -->
<section style="background:linear-gradient(135deg,#F55900,#FF8237); padding:60px 0; text-align:center;">
    <div class="container">
        <h2 style="color:#fff; font-size:clamp(1.5rem,4vw,2.2rem); font-weight:800; margin-bottom:15px;">
            🙏 जय श्री राम! मुंबई से अयोध्या की यात्रा करें
        </h2>
        <p style="color:rgba(255,255,255,0.9); font-size:1.1rem; margin-bottom:30px; max-width:600px; margin-left:auto; margin-right:auto;">
            राम जन्मभूमि के दर्शन करें, पवित्र सरयू में स्नान करें और राम राज्य की अनुभूति लें
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
