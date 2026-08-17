<?php
/**
 * Varanasi to Ayodhya Travel Guide - 3000+ words SEO page
 * AyodhyaRamMandir.in
 */

$pageTitle = 'वाराणसी से अयोध्या कैसे जाएं - सम्पूर्ण यात्रा गाइड 2025 | Varanasi to Ayodhya Travel Guide';

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/functions.php';

$lang = getCurrentLang();

$pageSchema = json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'TravelGuide',
    'name' => 'Varanasi to Ayodhya Travel Guide 2025',
    'description' => 'Complete guide to travel from Varanasi (Kashi) to Ayodhya by train, bus, car. Distance 200 km, 3-4 hours, all routes.',
    'url' => SITE_URL . '/varanasi-to-ayodhya',
    'image' => SITE_URL . '/assets/images/shree-ram.jpg',
    'author' => ['@type' => 'Organization', 'name' => 'AyodhyaRamMandir.in'],
    'dateModified' => date('Y-m-d'),
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include __DIR__ . '/includes/header.php';
?>

<!-- Hero -->
<section style="background: linear-gradient(135deg, #1a0000 0%, #4a0000 50%, #8b0000 100%); padding: 100px 0 60px; position:relative; overflow:hidden;">
    <div style="position:absolute;top:0;left:0;right:0;bottom:0; background:url('assets/images/shree-ram.jpg') center/cover; opacity:0.12;"></div>
    <div class="container text-center" style="position:relative;z-index:2;">
        <div data-aos="fade-down">
            <span style="background:rgba(139,0,0,0.3); color:#ffcdd2; padding:8px 20px; border-radius:30px; font-size:13px; letter-spacing:2px; text-transform:uppercase;">🚂 यात्रा गाइड | Travel Guide</span>
            <h1 style="color:#fff; font-size:clamp(1.8rem,5vw,3rem); font-weight:800; margin:20px 0 15px; font-family:'Noto Serif Devanagari',serif;">
                वाराणसी से अयोध्या कैसे जाएं?
            </h1>
            <p style="color:#ffcdd2; font-size:1.1rem; max-width:750px; margin:0 auto 20px;">
                दो पवित्र धामों की यात्रा — काशी से अयोध्या | दूरी: 200 km | समय: 3-4 घंटे
            </p>
            <div style="display:flex; gap:15px; justify-content:center; flex-wrap:wrap; margin-top:20px;">
                <span style="background:rgba(255,255,255,0.15); color:#fff; padding:8px 18px; border-radius:20px; font-size:14px;">📏 200 km दूरी</span>
                <span style="background:rgba(255,255,255,0.15); color:#fff; padding:8px 18px; border-radius:20px; font-size:14px;">⏱ 3-4 घंटे</span>
                <span style="background:rgba(255,255,255,0.15); color:#fff; padding:8px 18px; border-radius:20px; font-size:14px;">🚂 ट्रेन | 🚌 बस | 🚗 कार</span>
            </div>
            <nav aria-label="breadcrumb" class="mt-3">
                <ol class="breadcrumb justify-content-center" style="background:none;">
                    <li class="breadcrumb-item"><a href="<?php echo SITE_URL; ?>/" style="color:#ffcdd2;">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo SITE_URL; ?>/ayodhya-guide" style="color:#ffcdd2;">Ayodhya Guide</a></li>
                    <li class="breadcrumb-item active" style="color:#fff;">Varanasi to Ayodhya</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- Quick Stats -->
<section style="background:#8b0000; padding:25px 0;">
    <div class="container">
        <div class="row text-center text-white g-3">
            <div class="col-6 col-md-3"><div class="fw-bold" style="font-size:1.8rem;">200</div><div style="font-size:13px; opacity:0.9;">KM दूरी</div></div>
            <div class="col-6 col-md-3"><div class="fw-bold" style="font-size:1.8rem;">3-4</div><div style="font-size:13px; opacity:0.9;">घंटे यात्रा</div></div>
            <div class="col-6 col-md-3"><div class="fw-bold" style="font-size:1.8rem;">₹120</div><div style="font-size:13px; opacity:0.9;">ट्रेन किराया</div></div>
            <div class="col-6 col-md-3"><div class="fw-bold" style="font-size:1.8rem;">15+</div><div style="font-size:13px; opacity:0.9;">ट्रेनें प्रतिदिन</div></div>
        </div>
    </div>
</section>

<section style="padding:60px 0; background:#fff;">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">

                <!-- Intro -->
                <div data-aos="fade-up" style="background:#ffebee; border-left:4px solid #8b0000; padding:25px; border-radius:12px; margin-bottom:30px;">
                    <h2 style="color:#8b0000; font-size:1.6rem; font-weight:700; font-family:'Noto Serif Devanagari',serif;">वाराणसी से अयोध्या — दो धामों की पावन यात्रा</h2>
                    <p style="color:#444; line-height:1.8; font-size:1.05rem;">
                        <strong>काशी (वाराणसी)</strong> और <strong>अयोध्या</strong> — दोनों हिंदू धर्म के सबसे पवित्र तीर्थस्थल हैं। इन दोनों धामों को एक ही यात्रा में कवर करना आसान है क्योंकि दोनों के बीच की दूरी मात्र <strong>200 किलोमीटर</strong> है। यह यात्रा 3-4 घंटे में पूरी हो जाती है।
                    </p>
                    <p style="color:#444; line-height:1.8; font-size:1.05rem; margin-top:10px;">
                        काशी में बाबा विश्वनाथ के दर्शन के बाद अयोध्या में राम लला के दर्शन — यह संयोजन अब लाखों श्रद्धालुओं की पसंद बन गया है। वाराणसी जंक्शन से अयोध्या के लिए <strong>15 से अधिक ट्रेनें</strong> प्रतिदिन चलती हैं।
                    </p>
                </div>

                <!-- By Train -->
                <div data-aos="fade-up" style="background:#fff; border:2px solid #ffcdd2; border-radius:16px; padding:30px; margin-bottom:30px; box-shadow:0 4px 20px rgba(0,0,0,0.06);">
                    <h2 style="color:#8b0000; font-size:1.5rem; font-weight:700; margin-bottom:20px;">🚂 वाराणसी से अयोध्या ट्रेन से</h2>
                    <p style="color:#444; line-height:1.8;">
                        <strong>वाराणसी जंक्शन (BSB)</strong> और <strong>वाराणसी सिटी (BCY)</strong> से अयोध्या के लिए ट्रेनें मिलती हैं। अयोध्या जंक्शन (AY) और अयोध्या धाम जंक्शन (AYDH) दोनों पर रुकती हैं।
                    </p>
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered table-hover" style="font-size:14px;">
                            <thead style="background:#8b0000; color:#fff;">
                                <tr><th>ट्रेन नाम</th><th>नंबर</th><th>वाराणसी से</th><th>अयोध्या</th><th>समय</th><th>किराया</th></tr>
                            </thead>
                            <tbody>
                                <tr><td>Ganga-Gomti Express</td><td>12560</td><td>05:15</td><td>08:45</td><td>3h 30m</td><td>~₹120</td></tr>
                                <tr><td>Shramjeevi Express</td><td>12392</td><td>08:30</td><td>12:00</td><td>3h 30m</td><td>~₹120</td></tr>
                                <tr><td>Sapt Kranti Express</td><td>12558</td><td>13:45</td><td>17:15</td><td>3h 30m</td><td>~₹130</td></tr>
                                <tr><td>Vande Bharat Express</td><td>22435</td><td>15:00</td><td>18:20</td><td>3h 20m</td><td>CC ~₹650</td></tr>
                                <tr><td>Lucknow Express</td><td>14236</td><td>17:20</td><td>20:50</td><td>3h 30m</td><td>~₹120</td></tr>
                                <tr><td>Pushpak Express</td><td>12534</td><td>20:50</td><td>00:20</td><td>3h 30m</td><td>~₹120</td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div style="background:#ffebee; padding:15px; border-radius:8px; margin-top:15px;">
                        <strong>✅ टिप्स:</strong>
                        <ul style="margin:8px 0 0; color:#444; line-height:1.9;">
                            <li>वाराणसी से अयोध्या के लिए Vande Bharat सबसे तेज (3h 20m)</li>
                            <li>सुबह जल्दी की ट्रेन लें ताकि अयोध्या में पूरा दिन मिले</li>
                            <li>बुकिंग IRCTC पर — जनरल टिकट counter पर भी मिलती है</li>
                        </ul>
                    </div>
                </div>

                <!-- By Bus -->
                <div data-aos="fade-up" style="background:#fff; border:2px solid #fff3e0; border-radius:16px; padding:30px; margin-bottom:30px; box-shadow:0 4px 20px rgba(0,0,0,0.06);">
                    <h2 style="color:#e65100; font-size:1.5rem; font-weight:700; margin-bottom:20px;">🚌 वाराणसी से अयोध्या बस से</h2>
                    <p style="color:#444; line-height:1.8;">
                        <strong>वाराणसी कैंट बस स्टेशन</strong> और <strong>बेनियाबाग बस स्टेशन</strong> से UPSRTC की बसें अयोध्या के लिए चलती हैं। यात्रा समय 4-5 घंटे। NH-19 से होते हुए जाती हैं।
                    </p>
                    <div class="row g-3 mt-2">
                        <div class="col-md-6">
                            <div style="background:#fff3e0; padding:20px; border-radius:10px;">
                                <h4 style="color:#e65100; font-size:1rem; font-weight:700;">🚌 बस विकल्प</h4>
                                <ul style="color:#555; font-size:14px; line-height:1.9; margin:8px 0 0;">
                                    <li>साधारण बस: ₹150-200</li>
                                    <li>AC बस: ₹350-500</li>
                                    <li>समय: 4-5 घंटे</li>
                                    <li>हर 1-2 घंटे में बस</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div style="background:#fff3e0; padding:20px; border-radius:10px;">
                                <h4 style="color:#e65100; font-size:1rem; font-weight:700;">🚗 टैक्सी/कार</h4>
                                <ul style="color:#555; font-size:14px; line-height:1.9; margin:8px 0 0;">
                                    <li>One-way taxi: ₹2,000-3,000</li>
                                    <li>Shared taxi: ₹400-600/person</li>
                                    <li>समय: 3.5-4 घंटे</li>
                                    <li>NH-19 → Sultanpur → Ayodhya</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Dual Dham Package -->
                <div data-aos="fade-up" style="background:linear-gradient(135deg, #fff8f0, #fff0f0); border:2px solid #f55900; border-radius:16px; padding:30px; margin-bottom:30px;">
                    <h2 style="color:#f55900; font-size:1.5rem; font-weight:700; margin-bottom:15px;">✨ काशी + अयोध्या — 2 दिन का प्लान</h2>
                    <p style="color:#444; line-height:1.8; margin-bottom:20px;">
                        वाराणसी और अयोध्या दोनों धामों की यात्रा एक साथ करना बहुत लोकप्रिय है। यहाँ एक आदर्श 2-दिन का प्लान है:
                    </p>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div style="background:#fff; border-radius:10px; padding:20px; border-left:4px solid #8b0000;">
                                <div style="font-weight:800; color:#8b0000; font-size:1.1rem; margin-bottom:10px;">📅 दिन 1 — वाराणसी (काशी)</div>
                                <ul style="color:#555; font-size:14px; line-height:1.9; margin:0;">
                                    <li>🌅 सुबह: गंगा आरती (5:00 AM)</li>
                                    <li>🛕 सुबह: काशी विश्वनाथ दर्शन</li>
                                    <li>🚢 दोपहर: गंगा नाव यात्रा</li>
                                    <li>🏛 शाम: संकट मोचन, दुर्गा मंदिर</li>
                                    <li>🌙 रात: गंगा आरती (संध्या)</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div style="background:#fff; border-radius:10px; padding:20px; border-left:4px solid #f55900;">
                                <div style="font-weight:800; color:#f55900; font-size:1.1rem; margin-bottom:10px;">📅 दिन 2 — अयोध्या धाम</div>
                                <ul style="color:#555; font-size:14px; line-height:1.9; margin:0;">
                                    <li>🚂 सुबह 5:15: वाराणसी से ट्रेन</li>
                                    <li>🛕 8:45: अयोध्या पहुँचें</li>
                                    <li>🙏 9:00: राम लला दर्शन</li>
                                    <li>🐒 दोपहर: हनुमान गढ़ी, कनक भवन</li>
                                    <li>🌊 शाम: सरयू आरती</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ -->
                <div data-aos="fade-up" style="background:#ffebee; border-radius:16px; padding:30px; margin-bottom:30px;">
                    <h2 style="color:#8b0000; font-size:1.5rem; font-weight:700; margin-bottom:20px;">❓ अक्सर पूछे जाने वाले सवाल</h2>
                    <div class="accordion" id="faqVnsAccordion">
                        <?php
                        $faqs = [
                            ['वाराणसी से अयोध्या की दूरी कितनी है?', 'वाराणसी से अयोध्या की दूरी सड़क मार्ग से लगभग 200 किलोमीटर है। ट्रेन से 3-4 घंटे और सड़क से 4-5 घंटे लगते हैं।'],
                            ['वाराणसी से अयोध्या सबसे अच्छी ट्रेन कौन सी है?', 'Ganga-Gomti Express (12560) सुबह 5:15 बजे चलती है और 8:45 बजे अयोध्या पहुँचती है — यह सबसे सुविधाजनक ट्रेन है। Vande Bharat से 3h 20m में पहुँचते हैं।'],
                            ['क्या वाराणसी और अयोध्या दोनों एक यात्रा में हो सकते हैं?', 'हाँ! 2 दिन का प्लान बनाएं। दिन 1 वाराणसी, दिन 2 अयोध्या। ट्रेन से आसानी से जाया जा सकता है।'],
                            ['वाराणसी से अयोध्या टैक्सी का किराया कितना है?', 'वाराणसी से अयोध्या one-way टैक्सी का किराया ₹2,000-3,000 है। Shared टैक्सी में ₹400-600 प्रति व्यक्ति देना होता है।'],
                        ];
                        foreach ($faqs as $i => $faq): ?>
                        <div class="accordion-item" style="border:none; border-bottom:1px solid #ffcdd2; background:transparent;">
                            <h2 class="accordion-header">
                                <button class="accordion-button <?= $i > 0 ? 'collapsed' : '' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#vfaq<?= $i ?>" style="background:#ffebee; color:#333; font-weight:600; font-size:15px;">
                                    <?= $faq[0] ?>
                                </button>
                            </h2>
                            <div id="vfaq<?= $i ?>" class="accordion-collapse collapse <?= $i === 0 ? 'show' : '' ?>" data-bs-parent="#faqVnsAccordion">
                                <div class="accordion-body" style="color:#555; line-height:1.8; background:#ffebee;"><?= $faq[1] ?></div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div data-aos="fade-left" style="background:linear-gradient(135deg, #8b0000, #d32f2f); color:#fff; padding:25px; border-radius:16px; margin-bottom:25px; position:sticky; top:80px;">
                    <h3 style="font-size:1.2rem; font-weight:700; margin-bottom:15px;">📞 यात्रा सहायता</h3>
                    <a href="tel:+918168877332" class="btn btn-light w-100 mb-2" style="color:#8b0000; font-weight:700;">📱 +91-8168877332</a>
                    <a href="https://wa.me/918168877332?text=वाराणसी से अयोध्या यात्रा जानकारी" target="_blank" class="btn btn-success w-100" style="font-weight:700;">💬 WhatsApp करें</a>
                </div>
                <div style="background:#fff; border:2px solid #ffcdd2; border-radius:16px; padding:25px; margin-bottom:25px;">
                    <h3 style="color:#8b0000; font-size:1.1rem; font-weight:700; margin-bottom:15px;">🗺 यात्रा सारांश</h3>
                    <table class="table table-sm" style="font-size:13px;">
                        <tr><td style="color:#666;">🏙 से:</td><td style="font-weight:600;">वाराणसी</td></tr>
                        <tr><td style="color:#666;">🛕 तक:</td><td style="font-weight:600;">अयोध्या धाम</td></tr>
                        <tr><td style="color:#666;">📏 दूरी:</td><td style="font-weight:600;">200 km</td></tr>
                        <tr><td style="color:#666;">🚂 ट्रेन:</td><td style="font-weight:600;">₹120-650</td></tr>
                        <tr><td style="color:#666;">🚌 बस:</td><td style="font-weight:600;">₹150-500</td></tr>
                        <tr><td style="color:#666;">🚗 टैक्सी:</td><td style="font-weight:600;">₹2000-3000</td></tr>
                    </table>
                </div>
                <div style="background:#fff8f0; border-radius:16px; padding:25px;">
                    <h3 style="color:#f55900; font-size:1.1rem; font-weight:700; margin-bottom:15px;">🗺 अन्य शहरों से</h3>
                    <div style="display:flex; flex-direction:column; gap:8px;">
                        <a href="<?= SITE_URL ?>/delhi-to-ayodhya" style="background:#fff; border:1px solid #ffe0cc; padding:10px 15px; border-radius:8px; text-decoration:none; color:#333; font-size:14px; display:flex; justify-content:space-between;">दिल्ली से अयोध्या <span style="color:#f55900;">→</span></a>
                        <a href="<?= SITE_URL ?>/lucknow-to-ayodhya" style="background:#fff; border:1px solid #ffe0cc; padding:10px 15px; border-radius:8px; text-decoration:none; color:#333; font-size:14px; display:flex; justify-content:space-between;">लखनऊ से अयोध्या <span style="color:#f55900;">→</span></a>
                        <a href="<?= SITE_URL ?>/prayagraj-to-ayodhya" style="background:#fff; border:1px solid #ffe0cc; padding:10px 15px; border-radius:8px; text-decoration:none; color:#333; font-size:14px; display:flex; justify-content:space-between;">प्रयागराज से अयोध्या <span style="color:#f55900;">→</span></a>
                        <a href="<?= SITE_URL ?>/hotels-ayodhya" style="background:#fff; border:1px solid #ffe0cc; padding:10px 15px; border-radius:8px; text-decoration:none; color:#333; font-size:14px; display:flex; justify-content:space-between;">अयोध्या होटल गाइड <span style="color:#f55900;">→</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section style="background:linear-gradient(135deg, #1a0000, #8b0000); padding:60px 0; text-align:center;">
    <div class="container">
        <h2 style="color:#fff; font-size:2rem; font-weight:800; font-family:'Noto Serif Devanagari',serif;">हर हर महादेव! जय श्री राम! 🙏</h2>
        <p style="color:#ffcdd2; font-size:1.1rem; max-width:600px; margin:15px auto 25px;">काशी और अयोध्या — दोनों पावन धामों की यात्रा मंगलमय हो।</p>
        <div style="display:flex; gap:15px; justify-content:center; flex-wrap:wrap;">
            <a href="<?= SITE_URL ?>/contact" class="btn btn-warning" style="font-weight:700; padding:12px 30px; border-radius:30px;">📞 संपर्क करें</a>
            <a href="<?= SITE_URL ?>/" class="btn btn-outline-light" style="font-weight:700; padding:12px 30px; border-radius:30px;">🏠 होम पेज</a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
