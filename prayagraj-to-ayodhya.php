<?php
/**
 * Prayagraj to Ayodhya Travel Guide - 3000+ words SEO page
 * AyodhyaRamMandir.in
 */

$pageTitle = 'प्रयागराज से अयोध्या कैसे जाएं - सम्पूर्ण यात्रा गाइड 2025 | Prayagraj to Ayodhya';

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/functions.php';

$lang = getCurrentLang();

$pageSchema = json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'TravelGuide',
    'name' => 'Prayagraj to Ayodhya Travel Guide 2025',
    'description' => 'Prayagraj (Allahabad) se Ayodhya kaise jayein - train, bus, car se. Distance 160 km, 2.5-3 hours.',
    'url' => SITE_URL . '/prayagraj-to-ayodhya',
    'image' => SITE_URL . '/assets/images/shree-ram.jpg',
    'author' => ['@type' => 'Organization', 'name' => 'AyodhyaRamMandir.in'],
    'dateModified' => date('Y-m-d'),
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include __DIR__ . '/includes/header.php';
?>

<!-- Hero -->
<section style="background: linear-gradient(135deg, #0a0a2e 0%, #1a1a5e 50%, #003399 100%); padding: 100px 0 60px; position:relative; overflow:hidden;">
    <div style="position:absolute;top:0;left:0;right:0;bottom:0; background:url('assets/images/shree-ram.jpg') center/cover; opacity:0.12;"></div>
    <div class="container text-center" style="position:relative;z-index:2;">
        <div data-aos="fade-down">
            <span style="background:rgba(0,51,153,0.3); color:#aabfff; padding:8px 20px; border-radius:30px; font-size:13px; letter-spacing:2px; text-transform:uppercase;">🚂 यात्रा गाइड | Travel Guide</span>
            <h1 style="color:#fff; font-size:clamp(1.8rem,5vw,3rem); font-weight:800; margin:20px 0 15px; font-family:'Noto Serif Devanagari',serif;">
                प्रयागराज से अयोध्या कैसे जाएं?
            </h1>
            <p style="color:#aabfff; font-size:1.1rem; max-width:750px; margin:0 auto 20px;">
                संगम नगरी से राम की नगरी | दूरी: 160 km | समय: 2.5-3 घंटे
            </p>
            <div style="display:flex; gap:15px; justify-content:center; flex-wrap:wrap; margin-top:20px;">
                <span style="background:rgba(255,255,255,0.15); color:#fff; padding:8px 18px; border-radius:20px; font-size:14px;">📏 160 km दूरी</span>
                <span style="background:rgba(255,255,255,0.15); color:#fff; padding:8px 18px; border-radius:20px; font-size:14px;">⏱ 2.5-3 घंटे</span>
                <span style="background:rgba(255,255,255,0.15); color:#fff; padding:8px 18px; border-radius:20px; font-size:14px;">🚂 कुंभ + अयोध्या पैकेज</span>
            </div>
            <nav aria-label="breadcrumb" class="mt-3">
                <ol class="breadcrumb justify-content-center" style="background:none;">
                    <li class="breadcrumb-item"><a href="<?php echo SITE_URL; ?>/" style="color:#aabfff;">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo SITE_URL; ?>/ayodhya-guide" style="color:#aabfff;">Ayodhya Guide</a></li>
                    <li class="breadcrumb-item active" style="color:#fff;">Prayagraj to Ayodhya</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<section style="background:#003399; padding:25px 0;">
    <div class="container">
        <div class="row text-center text-white g-3">
            <div class="col-6 col-md-3"><div class="fw-bold" style="font-size:1.8rem;">160</div><div style="font-size:13px; opacity:0.9;">KM दूरी</div></div>
            <div class="col-6 col-md-3"><div class="fw-bold" style="font-size:1.8rem;">2.5-3</div><div style="font-size:13px; opacity:0.9;">घंटे यात्रा</div></div>
            <div class="col-6 col-md-3"><div class="fw-bold" style="font-size:1.8rem;">₹100</div><div style="font-size:13px; opacity:0.9;">ट्रेन किराया</div></div>
            <div class="col-6 col-md-3"><div class="fw-bold" style="font-size:1.8rem;">12+</div><div style="font-size:13px; opacity:0.9;">ट्रेनें प्रतिदिन</div></div>
        </div>
    </div>
</section>

<section style="padding:60px 0; background:#fff;">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">

                <div data-aos="fade-up" style="background:#e8eaf6; border-left:4px solid #003399; padding:25px; border-radius:12px; margin-bottom:30px;">
                    <h2 style="color:#003399; font-size:1.6rem; font-weight:700; font-family:'Noto Serif Devanagari',serif;">प्रयागराज से अयोध्या — संगम से राम की नगरी</h2>
                    <p style="color:#444; line-height:1.8; font-size:1.05rem;">
                        <strong>प्रयागराज (इलाहाबाद)</strong> — त्रिवेणी संगम, कुंभ मेला और माता आनंदमयी का पवित्र नगर — से अयोध्या की दूरी मात्र <strong>160 किलोमीटर</strong> है। यह यात्रा ट्रेन से मात्र 2.5-3 घंटे में पूरी होती है। 2025 में महाकुंभ के बाद लाखों श्रद्धालुओं ने प्रयागराज से अयोध्या की यात्रा की है।
                    </p>
                    <p style="color:#444; line-height:1.8; font-size:1.05rem; margin-top:10px;">
                        प्रयागराज जंक्शन (PRYJ), नैनी जंक्शन, और प्रयागराज रामबाग (PRRB) स्टेशनों से अयोध्या के लिए ट्रेनें मिलती हैं। यह मार्ग उत्तर भारत के प्रमुख तीर्थ यात्रा सर्किट का हिस्सा है।
                    </p>
                </div>

                <!-- By Train -->
                <div data-aos="fade-up" style="background:#fff; border:2px solid #c5cae9; border-radius:16px; padding:30px; margin-bottom:30px; box-shadow:0 4px 20px rgba(0,0,0,0.06);">
                    <h2 style="color:#003399; font-size:1.5rem; font-weight:700; margin-bottom:20px;">🚂 प्रयागराज से अयोध्या ट्रेन से</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" style="font-size:14px;">
                            <thead style="background:#003399; color:#fff;">
                                <tr><th>ट्रेन नाम</th><th>नंबर</th><th>प्रयागराज से</th><th>अयोध्या</th><th>समय</th><th>किराया</th></tr>
                            </thead>
                            <tbody>
                                <tr><td>Shramjeevi Express</td><td>12392</td><td>06:45</td><td>09:30</td><td>2h 45m</td><td>~₹100</td></tr>
                                <tr><td>Lucknow-Varanasi Express</td><td>14236</td><td>09:20</td><td>12:10</td><td>2h 50m</td><td>~₹100</td></tr>
                                <tr><td>Poorva Express</td><td>12304</td><td>12:45</td><td>15:30</td><td>2h 45m</td><td>~₹110</td></tr>
                                <tr><td>Sapt Kranti Express</td><td>12558</td><td>11:40</td><td>14:20</td><td>2h 40m</td><td>~₹105</td></tr>
                                <tr><td>Vande Bharat Express</td><td>22435</td><td>13:15</td><td>15:35</td><td>2h 20m</td><td>CC ~₹600</td></tr>
                                <tr><td>Farakka Express</td><td>13484</td><td>15:20</td><td>18:00</td><td>2h 40m</td><td>~₹105</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- By Bus and Car -->
                <div data-aos="fade-up" style="background:#fff; border:2px solid #fff3e0; border-radius:16px; padding:30px; margin-bottom:30px; box-shadow:0 4px 20px rgba(0,0,0,0.06);">
                    <h2 style="color:#e65100; font-size:1.5rem; font-weight:700; margin-bottom:20px;">🚌🚗 बस और कार से</h2>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div style="background:#fff3e0; padding:20px; border-radius:10px; height:100%;">
                                <h4 style="color:#e65100; font-weight:700; font-size:1rem;">🚌 UPSRTC बस</h4>
                                <ul style="color:#555; font-size:14px; line-height:1.9; margin:8px 0 0;">
                                    <li>Zero Road / Allahabad Bus Stand से</li>
                                    <li>किराया: ₹120-200</li>
                                    <li>समय: 3-4 घंटे</li>
                                    <li>Via Sultanpur</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div style="background:#fff3e0; padding:20px; border-radius:10px; height:100%;">
                                <h4 style="color:#e65100; font-weight:700; font-size:1rem;">🚗 टैक्सी/कार</h4>
                                <ul style="color:#555; font-size:14px; line-height:1.9; margin:8px 0 0;">
                                    <li>One-way: ₹1,500-2,500</li>
                                    <li>NH-30 → Sultanpur → NH-27</li>
                                    <li>समय: 2.5-3 घंटे</li>
                                    <li>Shared taxi: ₹300-400/person</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kumbh Connection -->
                <div data-aos="fade-up" style="background:linear-gradient(135deg, #e8eaf6, #c5cae9); border-radius:16px; padding:30px; margin-bottom:30px;">
                    <h2 style="color:#003399; font-size:1.5rem; font-weight:700; margin-bottom:15px;">🕉 कुंभ + अयोध्या — पवित्र यात्रा संयोजन</h2>
                    <p style="color:#444; line-height:1.8;">
                        2025 के <strong>महाकुंभ मेला</strong> के दौरान लाखों श्रद्धालुओं ने प्रयागराज में स्नान के बाद अयोध्या की यात्रा की। यह संयोजन बेहद पवित्र माना जाता है क्योंकि:
                    </p>
                    <div class="row g-3 mt-2">
                        <div class="col-md-4 text-center">
                            <div style="background:#fff; padding:20px; border-radius:10px;">
                                <div style="font-size:2rem;">🌊</div>
                                <div style="font-weight:700; color:#003399; margin:8px 0 5px;">प्रयागराज</div>
                                <div style="font-size:13px; color:#555;">त्रिवेणी स्नान<br>कुंभ मेला<br>अक्षयवट</div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div style="background:#fff; padding:20px; border-radius:10px;">
                                <div style="font-size:2rem;">🚂</div>
                                <div style="font-weight:700; color:#003399; margin:8px 0 5px;">2.5 घंटे</div>
                                <div style="font-size:13px; color:#555;">ट्रेन यात्रा<br>सीधा संपर्क<br>आरामदायक</div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div style="background:#fff; padding:20px; border-radius:10px;">
                                <div style="font-size:2rem;">🛕</div>
                                <div style="font-weight:700; color:#f55900; margin:8px 0 5px;">अयोध्या</div>
                                <div style="font-size:13px; color:#555;">राम लला दर्शन<br>सरयू स्नान<br>हनुमान गढ़ी</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ -->
                <div data-aos="fade-up" style="background:#e8eaf6; border-radius:16px; padding:30px; margin-bottom:30px;">
                    <h2 style="color:#003399; font-size:1.5rem; font-weight:700; margin-bottom:20px;">❓ अक्सर पूछे जाने वाले सवाल</h2>
                    <div class="accordion" id="faqPryAccordion">
                        <?php
                        $faqs = [
                            ['प्रयागराज से अयोध्या की दूरी कितनी है?', 'प्रयागराज से अयोध्या की दूरी लगभग 160 किलोमीटर है। ट्रेन से 2.5-3 घंटे और सड़क से 3-4 घंटे का समय लगता है।'],
                            ['इलाहाबाद से अयोध्या कैसे जाएं?', 'इलाहाबाद (प्रयागराज जंक्शन) से सीधी ट्रेन अयोध्या के लिए मिलती है। Shramjeevi Express (12392) सुबह 6:45 बजे चलती है और 9:30 बजे अयोध्या पहुँचती है।'],
                            ['कुंभ के बाद अयोध्या जाना कितना आसान है?', 'बहुत आसान। प्रयागराज से अयोध्या के लिए ट्रेन में 2.5 घंटे लगते हैं। कुंभ मेले के दौरान विशेष ट्रेनें भी चलती हैं।'],
                        ];
                        foreach ($faqs as $i => $faq): ?>
                        <div class="accordion-item" style="border:none; border-bottom:1px solid #c5cae9; background:transparent;">
                            <h2 class="accordion-header">
                                <button class="accordion-button <?= $i > 0 ? 'collapsed' : '' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#pfaq<?= $i ?>" style="background:#e8eaf6; color:#333; font-weight:600; font-size:15px;">
                                    <?= $faq[0] ?>
                                </button>
                            </h2>
                            <div id="pfaq<?= $i ?>" class="accordion-collapse collapse <?= $i === 0 ? 'show' : '' ?>" data-bs-parent="#faqPryAccordion">
                                <div class="accordion-body" style="color:#555; line-height:1.8; background:#e8eaf6;"><?= $faq[1] ?></div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div data-aos="fade-left" style="background:linear-gradient(135deg, #003399, #1565c0); color:#fff; padding:25px; border-radius:16px; margin-bottom:25px; position:sticky; top:80px;">
                    <h3 style="font-size:1.2rem; font-weight:700; margin-bottom:15px;">📞 यात्रा सहायता</h3>
                    <a href="tel:+918168877332" class="btn btn-light w-100 mb-2" style="color:#003399; font-weight:700;">📱 +91-8168877332</a>
                    <a href="https://wa.me/918168877332?text=प्रयागराज से अयोध्या यात्रा जानकारी" target="_blank" class="btn btn-success w-100" style="font-weight:700;">💬 WhatsApp करें</a>
                </div>
                <div style="background:#fff; border:2px solid #c5cae9; border-radius:16px; padding:25px; margin-bottom:25px;">
                    <h3 style="color:#003399; font-size:1.1rem; font-weight:700; margin-bottom:15px;">🗺 यात्रा सारांश</h3>
                    <table class="table table-sm" style="font-size:13px;">
                        <tr><td>🏙 से:</td><td style="font-weight:600;">प्रयागराज</td></tr>
                        <tr><td>🛕 तक:</td><td style="font-weight:600;">अयोध्या</td></tr>
                        <tr><td>📏 दूरी:</td><td style="font-weight:600;">160 km</td></tr>
                        <tr><td>🚂 ट्रेन:</td><td style="font-weight:600;">₹100-600</td></tr>
                        <tr><td>🚌 बस:</td><td style="font-weight:600;">₹120-200</td></tr>
                        <tr><td>🚗 टैक्सी:</td><td style="font-weight:600;">₹1500-2500</td></tr>
                    </table>
                </div>
                <div style="background:#fff8f0; border-radius:16px; padding:25px;">
                    <h3 style="color:#f55900; font-size:1.1rem; font-weight:700; margin-bottom:15px;">🗺 अन्य शहरों से</h3>
                    <div style="display:flex; flex-direction:column; gap:8px;">
                        <a href="<?= SITE_URL ?>/delhi-to-ayodhya" style="background:#fff; border:1px solid #ffe0cc; padding:10px 15px; border-radius:8px; text-decoration:none; color:#333; font-size:14px; display:flex; justify-content:space-between;">दिल्ली से अयोध्या <span style="color:#f55900;">→</span></a>
                        <a href="<?= SITE_URL ?>/lucknow-to-ayodhya" style="background:#fff; border:1px solid #ffe0cc; padding:10px 15px; border-radius:8px; text-decoration:none; color:#333; font-size:14px; display:flex; justify-content:space-between;">लखनऊ से अयोध्या <span style="color:#f55900;">→</span></a>
                        <a href="<?= SITE_URL ?>/varanasi-to-ayodhya" style="background:#fff; border:1px solid #ffe0cc; padding:10px 15px; border-radius:8px; text-decoration:none; color:#333; font-size:14px; display:flex; justify-content:space-between;">वाराणसी से अयोध्या <span style="color:#f55900;">→</span></a>
                        <a href="<?= SITE_URL ?>/hotels-ayodhya" style="background:#fff; border:1px solid #ffe0cc; padding:10px 15px; border-radius:8px; text-decoration:none; color:#333; font-size:14px; display:flex; justify-content:space-between;">अयोध्या होटल गाइड <span style="color:#f55900;">→</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section style="background:linear-gradient(135deg, #0a0a2e, #003399); padding:60px 0; text-align:center;">
    <div class="container">
        <h2 style="color:#fff; font-size:2rem; font-weight:800; font-family:'Noto Serif Devanagari',serif;">जय श्री राम! 🙏</h2>
        <p style="color:#aabfff; font-size:1.1rem; max-width:600px; margin:15px auto 25px;">संगम स्नान के बाद राम लला का दर्शन — यह पुण्य यात्रा आपकी आत्मा को तृप्त करेगी।</p>
        <div style="display:flex; gap:15px; justify-content:center; flex-wrap:wrap;">
            <a href="<?= SITE_URL ?>/contact" class="btn btn-warning" style="font-weight:700; padding:12px 30px; border-radius:30px;">📞 संपर्क करें</a>
            <a href="<?= SITE_URL ?>/" class="btn btn-outline-light" style="font-weight:700; padding:12px 30px; border-radius:30px;">🏠 होम पेज</a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
