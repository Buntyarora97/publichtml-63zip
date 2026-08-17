<?php
/**
 * Ayodhya Darshan Guide - Complete Guide for Visiting Ram Mandir
 * AyodhyaRamMandir.in
 */

$pageTitle = 'अयोध्या दर्शन गाइड 2025 - राम मंदिर, हनुमानगढ़ी, समय, पार्किंग, पूरी जानकारी | Ayodhya Darshan Guide';

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/functions.php';

$lang = getCurrentLang();

$pageSchema = json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'TouristAttraction',
    'name' => 'Ayodhya Ram Mandir Darshan Guide 2025',
    'description' => 'Complete guide for Ayodhya darshan - Ram Mandir timings, dress code, parking, nearby temples, best time to visit, hotels, and tips for pilgrims.',
    'url' => SITE_URL . '/ayodhya-darshan-guide',
    'image' => SITE_URL . '/assets/images/ram-lala.jpg',
    'touristType' => 'Pilgrimage',
    'address' => ['@type' => 'PostalAddress', 'addressLocality' => 'Ayodhya', 'addressRegion' => 'Uttar Pradesh', 'addressCountry' => 'IN'],
    'author' => ['@type' => 'Organization', 'name' => 'AyodhyaRamMandir.in'],
    'publisher' => ['@type' => 'Organization', 'name' => 'AyodhyaRamMandir.in', 'url' => SITE_URL],
    'datePublished' => '2024-01-22',
    'dateModified' => date('Y-m-d'),
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include __DIR__ . '/includes/header.php';
?>

<!-- Hero Section -->
<section style="background: linear-gradient(135deg, #1A0500 0%, #3D1A00 50%, #F55900 100%); padding: 100px 0 60px; position:relative; overflow:hidden;">
    <div style="position:absolute;top:0;left:0;right:0;bottom:0; background:url('assets/images/ram-lala.jpg') center top/cover; opacity:0.15;"></div>
    <div style="position:absolute; inset:0; background:linear-gradient(135deg, rgba(26,5,0,0.85) 0%, rgba(61,26,0,0.7) 100%);"></div>
    <div class="container text-center" style="position:relative;z-index:2;">
        <div data-aos="fade-down">
            <span style="background:rgba(255,215,0,0.25); color:#FFD700; padding:8px 20px; border-radius:30px; font-size:13px; letter-spacing:2px; text-transform:uppercase;">🛕 सम्पूर्ण यात्रा गाइड</span>
            <h1 style="color:#fff; font-size:clamp(1.8rem,5vw,3rem); font-weight:800; margin:20px 0 15px; font-family:'Noto Serif Devanagari',serif;">
                अयोध्या दर्शन गाइड 2025
            </h1>
            <p style="color:#FFD48A; font-size:1.1rem; max-width:800px; margin:0 auto 20px;">
                राम मंदिर दर्शन का समय, ड्रेस कोड, पार्किंग, सभी मंदिर, बेस्ट टाइम — सब कुछ एक जगह
            </p>
            <div style="display:flex; gap:12px; justify-content:center; flex-wrap:wrap; margin-top:20px;">
                <span style="background:rgba(255,215,0,0.2); color:#FFD700; padding:8px 18px; border-radius:20px; font-size:14px; border:1px solid rgba(255,215,0,0.4);">⏰ दर्शन: 6 AM – 10 PM</span>
                <span style="background:rgba(255,215,0,0.2); color:#FFD700; padding:8px 18px; border-radius:20px; font-size:14px; border:1px solid rgba(255,215,0,0.4);">🆓 नि:शुल्क प्रवेश</span>
                <span style="background:rgba(255,215,0,0.2); color:#FFD700; padding:8px 18px; border-radius:20px; font-size:14px; border:1px solid rgba(255,215,0,0.4);">📅 पूरे वर्ष खुला</span>
            </div>
            <nav aria-label="breadcrumb" class="mt-3">
                <ol class="breadcrumb justify-content-center" style="background:none;">
                    <li class="breadcrumb-item"><a href="<?php echo SITE_URL; ?>/" style="color:#FFD48A;">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo SITE_URL; ?>/ayodhya-guide" style="color:#FFD48A;">Ayodhya Guide</a></li>
                    <li class="breadcrumb-item active" style="color:#fff;">Darshan Guide</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- Quick Info Bar -->
<section style="background:linear-gradient(90deg,#F55900,#FF8237); padding:20px 0;">
    <div class="container">
        <div class="row text-center text-white g-2">
            <div class="col-6 col-md-3"><div style="font-size:1.5rem;">⏰</div><div style="font-size:12px; font-weight:600;">दर्शन: 6 AM–10 PM</div></div>
            <div class="col-6 col-md-3"><div style="font-size:1.5rem;">🆓</div><div style="font-size:12px; font-weight:600;">नि:शुल्क प्रवेश</div></div>
            <div class="col-6 col-md-3"><div style="font-size:1.5rem;">👗</div><div style="font-size:12px; font-weight:600;">शालीन वस्त्र अनिवार्य</div></div>
            <div class="col-6 col-md-3"><div style="font-size:1.5rem;">📱</div><div style="font-size:12px; font-weight:600;">मोबाइल बाहर रखें</div></div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section style="padding:60px 0; background:#fff;">
    <div class="container">
        <div class="row g-4">

            <!-- Main Article -->
            <div class="col-lg-8">

                <!-- Intro -->
                <div style="background:linear-gradient(135deg,#FFF8F0,#FFE8CC); border-left:5px solid #FFD700; padding:25px; border-radius:0 15px 15px 0; margin-bottom:35px;">
                    <h2 style="color:#F55900; font-size:1.4rem; margin-bottom:12px;">🙏 अयोध्या — भगवान राम की पवित्र नगरी में कैसे करें दर्शन?</h2>
                    <p style="color:#444; line-height:1.9; margin:0;">
                        अयोध्या में <strong>श्री राम जन्मभूमि मंदिर</strong> का उद्घाटन 22 जनवरी 2024 को हुआ। यह मंदिर भारत के सबसे भव्य धार्मिक स्थलों में से एक है। यहाँ दर्शन के लिए लाखों भक्त हर महीने आते हैं। इस गाइड में आपको राम मंदिर दर्शन का समय, ड्रेस कोड, क्या ले जाएं, क्या न लाएं, पार्किंग, होटल और अन्य सभी जानकारी मिलेगी।
                    </p>
                </div>

                <!-- Darshan Timings -->
                <h2 style="color:#1A0500; font-size:1.6rem; font-weight:700; padding-bottom:10px; border-bottom:3px solid #F55900; margin-bottom:25px;">
                    ⏰ राम मंदिर दर्शन समय 2025
                </h2>

                <div style="background:linear-gradient(135deg,#1A0500,#3D1A00); border-radius:20px; padding:30px; margin-bottom:30px; color:#fff;">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <h4 style="color:#FFD700; margin-bottom:20px; font-size:1.1rem;"><i class="fas fa-sun"></i> ग्रीष्मकाल (Mar–Sep)</h4>
                            <ul style="list-style:none; padding:0; margin:0; font-size:14px;">
                                <li style="border-bottom:1px solid rgba(255,215,0,0.2); padding:10px 0; display:flex; justify-content:space-between;">
                                    <span>🌅 मंगला आरती:</span>
                                    <strong style="color:#FFD700;">6:00 AM</strong>
                                </li>
                                <li style="border-bottom:1px solid rgba(255,215,0,0.2); padding:10px 0; display:flex; justify-content:space-between;">
                                    <span>🛕 दर्शन शुरू:</span>
                                    <strong style="color:#FFD700;">6:30 AM</strong>
                                </li>
                                <li style="border-bottom:1px solid rgba(255,215,0,0.2); padding:10px 0; display:flex; justify-content:space-between;">
                                    <span>☀️ भोग आरती (मध्याह्न):</span>
                                    <strong style="color:#FFD700;">12:00 PM</strong>
                                </li>
                                <li style="border-bottom:1px solid rgba(255,215,0,0.2); padding:10px 0; display:flex; justify-content:space-between;">
                                    <span>🌆 संध्या आरती:</span>
                                    <strong style="color:#FFD700;">7:00 PM</strong>
                                </li>
                                <li style="padding:10px 0; display:flex; justify-content:space-between;">
                                    <span>🌙 शयन आरती/बंद:</span>
                                    <strong style="color:#FFD700;">10:00 PM</strong>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h4 style="color:#FFD700; margin-bottom:20px; font-size:1.1rem;"><i class="fas fa-snowflake"></i> शीतकाल (Oct–Feb)</h4>
                            <ul style="list-style:none; padding:0; margin:0; font-size:14px;">
                                <li style="border-bottom:1px solid rgba(255,215,0,0.2); padding:10px 0; display:flex; justify-content:space-between;">
                                    <span>🌅 मंगला आरती:</span>
                                    <strong style="color:#FFD700;">6:30 AM</strong>
                                </li>
                                <li style="border-bottom:1px solid rgba(255,215,0,0.2); padding:10px 0; display:flex; justify-content:space-between;">
                                    <span>🛕 दर्शन शुरू:</span>
                                    <strong style="color:#FFD700;">7:00 AM</strong>
                                </li>
                                <li style="border-bottom:1px solid rgba(255,215,0,0.2); padding:10px 0; display:flex; justify-content:space-between;">
                                    <span>☀️ भोग आरती:</span>
                                    <strong style="color:#FFD700;">12:00 PM</strong>
                                </li>
                                <li style="border-bottom:1px solid rgba(255,215,0,0.2); padding:10px 0; display:flex; justify-content:space-between;">
                                    <span>🌆 संध्या आरती:</span>
                                    <strong style="color:#FFD700;">6:30 PM</strong>
                                </li>
                                <li style="padding:10px 0; display:flex; justify-content:space-between;">
                                    <span>🌙 शयन आरती/बंद:</span>
                                    <strong style="color:#FFD700;">9:30 PM</strong>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div style="background:rgba(255,215,0,0.15); border-radius:10px; padding:15px; margin-top:20px;">
                        <p style="color:#FFD48A; font-size:13px; margin:0;">
                            <strong>⚠️ ध्यान दें:</strong> राम नवमी, दीपोत्सव जैसे विशेष अवसरों पर समय अलग हो सकता है। यात्रा से पहले <a href="https://srjbtkshetra.org" target="_blank" style="color:#FFD700;">आधिकारिक वेबसाइट</a> पर जांचें।
                        </p>
                    </div>
                </div>

                <!-- Online Darshan Booking -->
                <div style="background:#E8F5E9; border-radius:15px; padding:25px; margin-bottom:35px; border:2px solid #4CAF50;">
                    <h3 style="color:#2E7D32; font-size:1.2rem; margin-bottom:15px;"><i class="fas fa-laptop"></i> ऑनलाइन दर्शन बुकिंग (VIP Pass)</h3>
                    <p style="color:#444; line-height:1.8; margin-bottom:15px; font-size:14px;">
                        लंबी कतार से बचने के लिए <strong>ऑनलाइन दर्शन स्लॉट बुकिंग</strong> उपलब्ध है। विशेष दिनों (राम नवमी, पंचमी) पर VIP Pass आवश्यक होता है।
                    </p>
                    <a href="https://srjbtkshetra.org/darshan-booking" target="_blank" rel="noopener noreferrer" style="display:inline-flex; align-items:center; gap:10px; background:#4CAF50; color:#fff; padding:12px 25px; border-radius:10px; text-decoration:none; font-weight:700;">
                        <i class="fas fa-external-link-alt"></i> ऑनलाइन बुकिंग करें →
                    </a>
                </div>

                <!-- Dress Code and Rules -->
                <h2 style="color:#1A0500; font-size:1.6rem; font-weight:700; padding-bottom:10px; border-bottom:3px solid #F55900; margin-bottom:25px;">
                    👗 ड्रेस कोड और नियम
                </h2>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <div style="background:#E8F5E9; border:2px solid #4CAF50; border-radius:15px; padding:20px; height:100%;">
                            <h4 style="color:#2E7D32; font-size:1rem; margin-bottom:12px;">✅ क्या पहनें</h4>
                            <ul style="color:#444; line-height:2.2; margin:0; padding-left:18px; font-size:14px;">
                                <li>धोती, कुर्ता, पायजामा (पुरुष)</li>
                                <li>साड़ी, सलवार कमीज (महिला)</li>
                                <li>हल्के सूती कपड़े (गर्मी में)</li>
                                <li>स्कार्फ/दुपट्टा (सिर ढकें)</li>
                                <li>आरामदायक चप्पल (बाहर रखनी होगी)</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="background:#FFEBEE; border:2px solid #F44336; border-radius:15px; padding:20px; height:100%;">
                            <h4 style="color:#C62828; font-size:1rem; margin-bottom:12px;">❌ क्या न पहनें</h4>
                            <ul style="color:#444; line-height:2.2; margin:0; padding-left:18px; font-size:14px;">
                                <li>जींस, शॉर्ट्स, स्कर्ट (छोटे)</li>
                                <li>टाइट या पारदर्शी कपड़े</li>
                                <li>चमड़े की बेल्ट/पर्स</li>
                                <li>हाई हील्स (लंबी दूरी)</li>
                                <li>काले कपड़े (अशुभ माना जाता है)</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- What to carry -->
                <h2 style="color:#1A0500; font-size:1.6rem; font-weight:700; padding-bottom:10px; border-bottom:3px solid #F55900; margin-bottom:25px;">
                    🎒 क्या लाएं — क्या न लाएं
                </h2>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <div style="background:#F3E5F5; border-radius:15px; padding:20px; height:100%;">
                            <h4 style="color:#6A1B9A; margin-bottom:12px; font-size:1rem;">✅ जरूर लाएं</h4>
                            <ul style="color:#444; line-height:2.2; margin:0; padding-left:18px; font-size:14px;">
                                <li><strong>Aadhar Card / ID Proof</strong> (अनिवार्य)</li>
                                <li>पानी की बोतल (गर्मी में बहुत जरूरी)</li>
                                <li>मोबाइल चार्जर / पावर बैंक</li>
                                <li>Cash — ₹500-1000 (प्रसाद, दान)</li>
                                <li>छाता / टोपी (धूप में)</li>
                                <li>हल्का नाश्ता</li>
                                <li>दवाइयाँ (यदि नियमित लेते हों)</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="background:#FCE4EC; border-radius:15px; padding:20px; height:100%;">
                            <h4 style="color:#880E4F; margin-bottom:12px; font-size:1rem;">🚫 अंदर लाना मना है</h4>
                            <ul style="color:#444; line-height:2.2; margin:0; padding-left:18px; font-size:14px;">
                                <li><strong>मोबाइल फोन / Camera</strong> (बाहर लॉकर में)</li>
                                <li>बड़े बैग / लगेज</li>
                                <li>धातु की वस्तुएं</li>
                                <li>तम्बाकू / सिगरेट</li>
                                <li>नशीले पदार्थ</li>
                                <li>चमड़े की वस्तुएं</li>
                                <li>बाहर का खाना / पानी</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Security Info -->
                <div style="background:#FFF3E0; border:2px solid #FF9800; border-radius:12px; padding:20px; margin-bottom:35px;">
                    <h4 style="color:#E65100; margin-bottom:10px;"><i class="fas fa-shield-alt"></i> सुरक्षा जाँच</h4>
                    <p style="color:#444; font-size:14px; line-height:1.8; margin:0;">
                        राम मंदिर में प्रवेश से पहले कड़ी सुरक्षा जाँच होती है। <strong>मोबाइल फोन को बाहर लॉकर में जमा करना अनिवार्य है।</strong> लॉकर की सुविधा मंदिर परिसर के बाहर उपलब्ध है (₹20-50)। जाँच में अधिक समय लग सकता है, इसलिए जल्दी पहुंचें।
                    </p>
                </div>

                <!-- Temple Sequence -->
                <h2 style="color:#1A0500; font-size:1.6rem; font-weight:700; padding-bottom:10px; border-bottom:3px solid #F55900; margin-bottom:25px;">
                    🗺️ अयोध्या में दर्शन अनुक्रम — सुझावित क्रम
                </h2>

                <div style="margin-bottom:35px;">
                    <?php
                    $temples = [
                        ['num' => '1', 'name' => 'सरयू स्नान (भोर में)', 'time' => '5:00–6:00 AM', 'desc' => 'यात्रा की शुरुआत पवित्र सरयू नदी में स्नान से करें। राम की पैड़ी घाट पर जाएं। पूजा-सामग्री खरीदकर संध्या आरती की तैयारी करें।', 'color' => '#2196F3'],
                        ['num' => '2', 'name' => 'हनुमानगढ़ी', 'time' => '6:00–8:00 AM', 'desc' => '76 सीढ़ियां चढ़कर बजरंगबली के दर्शन करें। यहाँ से राम मंदिर जाने से पहले बजरंगबली का आशीर्वाद लिया जाता है। भीड़ कम होने पर 45-60 मिनट लगते हैं।', 'color' => '#FF9800'],
                        ['num' => '3', 'name' => 'राम जन्मभूमि मंदिर', 'time' => '8:00–11:00 AM', 'desc' => 'भव्य राम मंदिर में राम लला के दर्शन करें। सुरक्षा जाँच → लॉकर → लाइन → दर्शन। पूरे दर्शन में 2-3 घंटे लग सकते हैं। विशेष दिनों में अधिक।', 'color' => '#F55900'],
                        ['num' => '4', 'name' => 'कनक भवन', 'time' => '11:30 AM–12:30 PM', 'desc' => 'माता सीता और भगवान राम का स्वर्णिम भवन। यहाँ भव्य प्रतिमाएं और सुंदर नक्काशी देखें। दर्शन अपेक्षाकृत जल्दी होते हैं।', 'color' => '#FFD700'],
                        ['num' => '5', 'name' => 'दशरथ महल / नागेश्वरनाथ', 'time' => '2:00–4:00 PM', 'desc' => 'राजा दशरथ का प्राचीन महल और भगवान शिव का नागेश्वरनाथ मंदिर देखें। दोनों एक-दूसरे के पास हैं।', 'color' => '#9C27B0'],
                        ['num' => '6', 'name' => 'संध्या आरती — सरयू घाट', 'time' => '6:30–8:00 PM', 'desc' => 'राम की पैड़ी पर भव्य सरयू आरती का दर्शन करें। हजारों दीप और आरती का नज़ारा अद्भुत होता है। यह अयोध्या यात्रा का सबसे यादगार क्षण होता है।', 'color' => '#FF5722'],
                    ];
                    foreach ($temples as $t):
                    ?>
                    <div style="display:flex; gap:15px; margin-bottom:20px; align-items:flex-start;">
                        <div style="flex-shrink:0; width:50px; height:50px; border-radius:50%; background:<?php echo $t['color']; ?>; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:900; font-size:1.2rem;">
                            <?php echo $t['num']; ?>
                        </div>
                        <div style="flex:1; background:#fff; border:1px solid #eee; border-radius:12px; padding:18px; border-left:4px solid <?php echo $t['color']; ?>;">
                            <div style="display:flex; justify-content:space-between; align-items:flex-start; gap:10px; flex-wrap:wrap; margin-bottom:8px;">
                                <h4 style="color:#1A0500; font-size:1rem; margin:0;"><?php echo $t['name']; ?></h4>
                                <span style="background:<?php echo $t['color']; ?>22; color:<?php echo $t['color']; ?>; padding:4px 12px; border-radius:20px; font-size:12px; font-weight:600; white-space:nowrap;">⏰ <?php echo $t['time']; ?></span>
                            </div>
                            <p style="color:#555; font-size:13px; line-height:1.7; margin:0;"><?php echo $t['desc']; ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- All Temples in Ayodhya -->
                <h2 style="color:#1A0500; font-size:1.6rem; font-weight:700; padding-bottom:10px; border-bottom:3px solid #F55900; margin-bottom:25px;">
                    🛕 अयोध्या के प्रमुख मंदिर और स्थान
                </h2>

                <div class="row g-3 mb-4">
                    <?php
                    $allPlaces = [
                        ['icon' => '🛕', 'name' => 'राम जन्मभूमि मंदिर', 'desc' => 'भगवान राम का जन्मस्थान — नवनिर्मित भव्य मंदिर', 'time' => '6 AM–10 PM'],
                        ['icon' => '🐒', 'name' => 'हनुमानगढ़ी', 'desc' => '76 सीढ़ियों पर बजरंगबली का प्रमुख मंदिर', 'time' => '5 AM–9 PM'],
                        ['icon' => '🏛️', 'name' => 'कनक भवन', 'desc' => 'माता सीता-राम का सोने का महल', 'time' => '8 AM–12 PM, 4 PM–9 PM'],
                        ['icon' => '🌊', 'name' => 'राम की पैड़ी (सरयू घाट)', 'desc' => 'पवित्र सरयू नदी का मुख्य घाट', 'time' => '24 घंटे'],
                        ['icon' => '🏰', 'name' => 'दशरथ महल', 'desc' => 'राजा दशरथ का प्राचीन राजमहल', 'time' => '9 AM–6 PM'],
                        ['icon' => '🔱', 'name' => 'नागेश्वरनाथ मंदिर', 'desc' => 'राम द्वारा स्थापित भगवान शिव का मंदिर', 'time' => '6 AM–8 PM'],
                        ['icon' => '⚔️', 'name' => 'त्रेता का ठाकुर', 'desc' => 'राम के अश्वमेध यज्ञ का स्थान', 'time' => '8 AM–8 PM'],
                        ['icon' => '🙏', 'name' => 'मणि पर्वत', 'desc' => 'हनुमान जी द्वारा लाई संजीवनी का स्थान', 'time' => '7 AM–7 PM'],
                        ['icon' => '🌸', 'name' => 'गुप्तार घाट', 'desc' => 'राम जी के जलसमाधि का पवित्र स्थल', 'time' => '24 घंटे'],
                        ['icon' => '🎪', 'name' => 'छोटी देवकाली', 'desc' => 'माँ दुर्गा का प्राचीन शक्तिपीठ', 'time' => '6 AM–9 PM'],
                        ['icon' => '🌙', 'name' => 'बड़ी देवकाली', 'desc' => 'शक्ति पूजा का प्रमुख मंदिर', 'time' => '6 AM–9 PM'],
                        ['icon' => '🔯', 'name' => 'राजद्वार (Rajdwar)', 'desc' => 'राजभवन का ऐतिहासिक प्रवेश द्वार', 'time' => '9 AM–5 PM'],
                    ];
                    foreach ($allPlaces as $p):
                    ?>
                    <div class="col-md-6">
                        <div style="background:#FFF8F0; border:1px solid #FFD0B0; border-radius:12px; padding:15px; height:100%;">
                            <div style="display:flex; gap:10px; align-items:flex-start;">
                                <span style="font-size:1.5rem; flex-shrink:0;"><?php echo $p['icon']; ?></span>
                                <div>
                                    <h5 style="color:#F55900; margin-bottom:4px; font-size:0.9rem; font-weight:700;"><?php echo $p['name']; ?></h5>
                                    <p style="color:#555; font-size:12px; margin-bottom:4px;"><?php echo $p['desc']; ?></p>
                                    <span style="background:#FFD0B0; color:#F55900; padding:2px 10px; border-radius:20px; font-size:11px; font-weight:600;">⏰ <?php echo $p['time']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- Parking Info -->
                <h2 style="color:#1A0500; font-size:1.6rem; font-weight:700; padding-bottom:10px; border-bottom:3px solid #F55900; margin-bottom:25px;">
                    🚗 पार्किंग और परिवहन जानकारी
                </h2>

                <div style="background:#E3F2FD; border-radius:15px; padding:25px; margin-bottom:30px;">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <h4 style="color:#0277BD; margin-bottom:12px; font-size:1rem;"><i class="fas fa-parking"></i> पार्किंग स्थल</h4>
                            <ul style="color:#444; font-size:14px; line-height:2; margin:0; padding-left:18px;">
                                <li><strong>नया घाट पार्किंग:</strong> ~2 km (फ्री)</li>
                                <li><strong>बस स्टेशन के पास:</strong> ₹30–50</li>
                                <li><strong>रेलवे स्टेशन:</strong> ₹20–40</li>
                                <li><strong>मंदिर के पास (शटल):</strong> दूर पार्क → शटल</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h4 style="color:#0277BD; margin-bottom:12px; font-size:1rem;"><i class="fas fa-shuttle-van"></i> मंदिर से यातायात</h4>
                            <ul style="color:#444; font-size:14px; line-height:2; margin:0; padding-left:18px;">
                                <li>ई-रिक्शा: ₹10–30 प्रति व्यक्ति</li>
                                <li>ऑटो-रिक्शा: ₹50–100</li>
                                <li>UPSRTC शटल: ₹10–20</li>
                                <li>पैदल: अधिकतर स्थान 1-2 km</li>
                            </ul>
                        </div>
                    </div>
                    <div style="background:#fff; border-radius:10px; padding:12px; margin-top:15px;">
                        <p style="color:#333; font-size:13px; margin:0;">
                            💡 <strong>टिप:</strong> विशेष अवसरों और सप्ताहांत पर मंदिर के नजदीक पार्किंग जल्दी भर जाती है। शहर के बाहर पार्क करके ई-रिक्शा/शटल से जाना बेहतर रहता है।
                        </p>
                    </div>
                </div>

                <!-- Best Time to Visit -->
                <h2 style="color:#1A0500; font-size:1.6rem; font-weight:700; padding-bottom:10px; border-bottom:3px solid #F55900; margin-bottom:25px;">
                    📅 कब जाएं — मौसम और त्योहार
                </h2>

                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <div style="background:linear-gradient(135deg,#E8F5E9,#C8E6C9); border-radius:15px; padding:20px; text-align:center; height:100%;">
                            <div style="font-size:2rem; margin-bottom:10px;">🍂</div>
                            <h4 style="color:#2E7D32; font-size:1rem; margin-bottom:10px;">अक्टूबर–मार्च</h4>
                            <div style="background:#4CAF50; color:#fff; display:inline-block; padding:4px 14px; border-radius:20px; font-size:12px; font-weight:700; margin-bottom:10px;">⭐ सर्वोत्तम</div>
                            <p style="color:#444; font-size:13px; margin:0;">ठंडा-सुहावना मौसम, भीड़ कम, पूरे दिन घूम सकते हैं। दीपोत्सव (नवंबर) — लाखों दीपों का नज़ारा।</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div style="background:linear-gradient(135deg,#FFF3E0,#FFE0B2); border-radius:15px; padding:20px; text-align:center; height:100%;">
                            <div style="font-size:2rem; margin-bottom:10px;">🌸</div>
                            <h4 style="color:#E65100; font-size:1rem; margin-bottom:10px;">मार्च–अप्रैल</h4>
                            <div style="background:#FF9800; color:#fff; display:inline-block; padding:4px 14px; border-radius:20px; font-size:12px; font-weight:700; margin-bottom:10px;">🌟 राम नवमी</div>
                            <p style="color:#444; font-size:13px; margin:0;">राम नवमी (अप्रैल) पर लाखों भक्त। भव्य उत्सव लेकिन भारी भीड़। पहले से होटल बुकिंग अनिवार्य।</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div style="background:linear-gradient(135deg,#FCE4EC,#F8BBD9); border-radius:15px; padding:20px; text-align:center; height:100%;">
                            <div style="font-size:2rem; margin-bottom:10px;">☀️</div>
                            <h4 style="color:#880E4F; font-size:1rem; margin-bottom:10px;">मई–सितंबर</h4>
                            <div style="background:#F44336; color:#fff; display:inline-block; padding:4px 14px; border-radius:20px; font-size:12px; font-weight:700; margin-bottom:10px;">⚠️ सावधानी</div>
                            <p style="color:#444; font-size:13px; margin:0;">गर्मी 45°C तक, जुलाई-अगस्त में बरसात। बुजुर्ग और बच्चों के लिए कठिन। भीड़ कम होती है।</p>
                        </div>
                    </div>
                </div>

                <!-- Tips for Special Visitors -->
                <h2 style="color:#1A0500; font-size:1.6rem; font-weight:700; padding-bottom:10px; border-bottom:3px solid #F55900; margin-bottom:25px;">
                    👴 विशेष दर्शनार्थियों के लिए सुझाव
                </h2>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <div style="background:#E8EAF6; border-radius:12px; padding:20px; height:100%;">
                            <h4 style="color:#303F9F; font-size:1rem; margin-bottom:12px;">👴 वरिष्ठ नागरिक</h4>
                            <ul style="color:#444; font-size:13px; line-height:2; margin:0; padding-left:18px;">
                                <li>Vehicle / Wheelchair सुविधा उपलब्ध</li>
                                <li>VIP/Divyang दर्शन लाइन का लाभ लें</li>
                                <li>सुबह 6-8 बजे कम भीड़ होती है</li>
                                <li>पानी हमेशा साथ रखें</li>
                                <li>विश्राम स्थल मंदिर परिसर में है</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="background:#F3E5F5; border-radius:12px; padding:20px; height:100%;">
                            <h4 style="color:#6A1B9A; font-size:1rem; margin-bottom:12px;">👶 छोटे बच्चों के साथ</h4>
                            <ul style="color:#444; font-size:13px; line-height:2; margin:0; padding-left:18px;">
                                <li>प्रैम/Stroller पर प्रतिबंध — गोद में लें</li>
                                <li>बच्चों का खाना साथ रखें</li>
                                <li>सुबह जल्दी जाएं — कम भीड़</li>
                                <li>ब्रेस्टफीडिंग रूम उपलब्ध है</li>
                                <li>बच्चों को भीड़ में पकड़े रहें</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Prasad and Shopping -->
                <h2 style="color:#1A0500; font-size:1.6rem; font-weight:700; padding-bottom:10px; border-bottom:3px solid #F55900; margin-bottom:25px;">
                    🛍️ प्रसाद और खरीदारी
                </h2>

                <div style="background:linear-gradient(135deg,#FFF3E0,#FFE8CC); border-radius:15px; padding:25px; margin-bottom:30px;">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <h4 style="color:#F55900; margin-bottom:12px; font-size:1rem;">🙏 प्रसाद की दुकानें</h4>
                            <ul style="color:#444; font-size:14px; line-height:2; margin:0; padding-left:18px;">
                                <li>राम लड्डू — अयोध्या का विशेष प्रसाद</li>
                                <li>खोए की मिठाइयां</li>
                                <li>फूल, धूप, दीप पूजा सामग्री</li>
                                <li>तुलसी माला, रुद्राक्ष</li>
                                <li>राम चरणामृत</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h4 style="color:#F55900; margin-bottom:12px; font-size:1rem;">🛒 स्मृति चिह्न (Souvenirs)</h4>
                            <ul style="color:#444; font-size:14px; line-height:2; margin:0; padding-left:18px;">
                                <li>राम मंदिर की मूर्तियां और फोटो</li>
                                <li>हस्तशिल्प — रामायण थीम</li>
                                <li>रामायण पुस्तकें (हिंदी/English)</li>
                                <li>अयोध्या की विशेष चाय (Masala)</li>
                                <li>स्थानीय हथकरघा वस्त्र</li>
                            </ul>
                        </div>
                    </div>
                    <p style="color:#555; font-size:13px; margin-top:15px; margin-bottom:0;">
                        💡 <strong>सुझाव:</strong> मंदिर परिसर के बाहर की दुकानों पर दाम negotiate करें। हनुमानगढ़ी बाज़ार में सस्ते और अच्छे सामान मिलते हैं।
                    </p>
                </div>

                <!-- Budget Planning -->
                <h2 style="color:#1A0500; font-size:1.6rem; font-weight:700; padding-bottom:10px; border-bottom:3px solid #F55900; margin-bottom:25px;">
                    💰 2 दिन अयोध्या यात्रा बजट (प्रति व्यक्ति)
                </h2>

                <div class="table-responsive mb-4">
                    <table class="table table-bordered">
                        <thead style="background:#F55900; color:#fff; text-align:center;">
                            <tr><th>खर्च का मद</th><th>बजट</th><th>मध्यम</th><th>लक्ज़री</th></tr>
                        </thead>
                        <tbody>
                            <tr><td>होटल (2 रात)</td><td>₹600–1,200</td><td>₹2,000–4,000</td><td>₹8,000–15,000</td></tr>
                            <tr><td>खाना (2 दिन)</td><td>₹400–600</td><td>₹800–1,200</td><td>₹2,000+</td></tr>
                            <tr><td>प्रसाद/दान</td><td>₹100–200</td><td>₹300–500</td><td>₹1,000+</td></tr>
                            <tr><td>यातायात (स्थानीय)</td><td>₹100–200</td><td>₹300–500</td><td>₹800–1,500</td></tr>
                            <tr><td>खरीदारी</td><td>₹200–500</td><td>₹500–1,000</td><td>₹2,000+</td></tr>
                            <tr style="background:#FFF3E0; font-weight:700;">
                                <td><strong>कुल (2 दिन)</strong></td>
                                <td><strong>₹1,400–2,700</strong></td>
                                <td><strong>₹3,900–7,200</strong></td>
                                <td><strong>₹13,800+</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- FAQ -->
                <h2 style="color:#1A0500; font-size:1.6rem; font-weight:700; padding-bottom:10px; border-bottom:3px solid #F55900; margin-bottom:25px;">
                    ❓ अक्सर पूछे जाने वाले सवाल (FAQ)
                </h2>

                <div>
                    <?php
                    $faqs = [
                        ['q' => 'राम मंदिर में दर्शन का सही समय क्या है?', 'a' => 'राम मंदिर सुबह 6 बजे से रात 10 बजे तक खुला रहता है। सबसे कम भीड़ सोमवार-मंगलवार की सुबह 6-9 बजे होती है। शनिवार-रविवार और त्योहारों पर भारी भीड़ होती है।'],
                        ['q' => 'क्या राम मंदिर दर्शन नि:शुल्क है?', 'a' => 'हाँ, राम जन्मभूमि मंदिर में प्रवेश बिल्कुल नि:शुल्क है। VIP दर्शन के लिए ऑनलाइन बुकिंग उपलब्ध है जिसमें भी कोई शुल्क नहीं है।'],
                        ['q' => 'क्या मोबाइल/कैमरा मंदिर में ले जा सकते हैं?', 'a' => 'नहीं। राम मंदिर परिसर के अंदर मोबाइल फोन और कैमरा सख्त वर्जित है। मंदिर के बाहर लॉकर सुविधा है (₹20-50) जहाँ इन्हें रख सकते हैं।'],
                        ['q' => 'अयोध्या में एक दिन में कितने मंदिर देखे जा सकते हैं?', 'a' => 'सुबह जल्दी शुरू करें तो एक दिन में: सरयू स्नान, हनुमानगढ़ी, राम मंदिर, कनक भवन, दशरथ महल और सरयू संध्या आरती — यानी 5-6 प्रमुख स्थल देखे जा सकते हैं।'],
                        ['q' => 'अयोध्या में सरयू आरती कब होती है?', 'a' => 'सरयू घाट पर संध्या आरती गर्मियों में शाम 7 बजे और सर्दियों में शाम 6:30 बजे होती है। राम की पैड़ी पर यह आरती अत्यंत भव्य होती है।'],
                        ['q' => 'क्या अयोध्या में ATM/UPI सुविधा है?', 'a' => 'हाँ, अयोध्या में पर्याप्त ATM और UPI की सुविधा है। हालांकि त्योहारों और विशेष अवसरों पर ATM में कैश की कमी हो सकती है, इसलिए पर्याप्त cash साथ रखें।'],
                        ['q' => 'अयोध्या में सबसे अच्छे भोजन की जगह कौन सी है?', 'a' => 'अयोध्या में सात्विक शाकाहारी भोजन प्रमुख है। धर्मशाला का भोजन (₹30-50), श्री राम रसोई (नि:शुल्क भोजन सेवा), और स्थानीय दाल-बाटी-चूरमा रेस्टोरेंट लोकप्रिय हैं।'],
                    ];
                    foreach ($faqs as $i => $faq):
                    ?>
                    <div style="border:1px solid #FFD0B0; border-radius:10px; margin-bottom:10px; overflow:hidden;">
                        <button class="btn w-100 text-start" style="background:<?php echo $i===0?'#FFF8F0':'#fff'; ?>; padding:15px 20px; font-weight:600; color:#1A0500; border:none; font-size:14px;" type="button" data-bs-toggle="collapse" data-bs-target="#faq<?php echo $i; ?>">
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

                    <!-- Emergency Contact -->
                    <div style="background:linear-gradient(135deg,#F55900,#FF8237); border-radius:20px; padding:25px; color:#fff; margin-bottom:25px;">
                        <h3 style="font-size:1.1rem; margin-bottom:15px;"><i class="fas fa-headset"></i> सहायता केंद्र</h3>
                        <p style="font-size:13px; opacity:0.9; margin-bottom:15px;">अयोध्या यात्रा से जुड़ी किसी भी जानकारी के लिए:</p>
                        <a href="tel:+918168877332" style="display:flex; align-items:center; gap:10px; background:rgba(255,255,255,0.2); color:#fff; padding:12px 18px; border-radius:10px; text-decoration:none; font-weight:700; margin-bottom:10px;">
                            <i class="fas fa-phone"></i> +91-8168877332
                        </a>
                        <a href="mailto:info@ayodhyarammandir.in" style="display:flex; align-items:center; gap:10px; background:rgba(255,255,255,0.15); color:#fff; padding:10px 18px; border-radius:10px; text-decoration:none; font-size:13px;">
                            <i class="fas fa-envelope"></i> info@ayodhyarammandir.in
                        </a>
                    </div>

                    <!-- Darshan Timing Card -->
                    <div style="background:linear-gradient(135deg,#1A0500,#3D1A00); border-radius:20px; padding:25px; color:#fff; margin-bottom:25px;">
                        <h3 style="color:#FFD700; font-size:1.1rem; margin-bottom:15px;"><i class="fas fa-clock"></i> राम मंदिर समय</h3>
                        <ul style="list-style:none; padding:0; margin:0; font-size:13px;">
                            <li style="border-bottom:1px solid rgba(255,215,0,0.2); padding:8px 0;">🌅 खुलता है: <strong style="color:#FFD700; float:right;">6:00 AM</strong></li>
                            <li style="border-bottom:1px solid rgba(255,215,0,0.2); padding:8px 0;">🔔 मंगला आरती: <strong style="color:#FFD700; float:right;">6:30 AM</strong></li>
                            <li style="border-bottom:1px solid rgba(255,215,0,0.2); padding:8px 0;">☀️ भोग आरती: <strong style="color:#FFD700; float:right;">12:00 PM</strong></li>
                            <li style="border-bottom:1px solid rgba(255,215,0,0.2); padding:8px 0;">🌆 संध्या आरती: <strong style="color:#FFD700; float:right;">7:00 PM</strong></li>
                            <li style="padding:8px 0;">🌙 बंद होता है: <strong style="color:#FFD700; float:right;">10:00 PM</strong></li>
                        </ul>
                    </div>

                    <!-- Travel Links -->
                    <div style="background:#FFF8F0; border:2px solid #FFD0B0; border-radius:20px; padding:25px; margin-bottom:25px;">
                        <h3 style="color:#F55900; font-size:1.1rem; margin-bottom:15px;"><i class="fas fa-route"></i> यात्रा गाइड</h3>
                        <ul style="list-style:none; padding:0; margin:0;">
                            <?php
                            $tlinks = [
                                ['url' => 'lucknow-to-ayodhya', 'label' => '🚌 लखनऊ से अयोध्या'],
                                ['url' => 'delhi-to-ayodhya', 'label' => '🚆 दिल्ली से अयोध्या'],
                                ['url' => 'mumbai-to-ayodhya', 'label' => '✈️ मुंबई से अयोध्या'],
                                ['url' => 'varanasi-to-ayodhya', 'label' => '🚂 वाराणसी से अयोध्या'],
                                ['url' => 'agra-to-ayodhya', 'label' => '🚗 आगरा से अयोध्या'],
                                ['url' => 'prayagraj-to-ayodhya', 'label' => '🚆 प्रयागराज से अयोध्या'],
                                ['url' => 'hotels-ayodhya', 'label' => '🏨 अयोध्या में होटल'],
                            ];
                            foreach ($tlinks as $tl):
                            ?>
                            <li style="border-bottom:1px solid #f0f0f0; padding:10px 0;">
                                <a href="<?php echo SITE_URL . '/' . $tl['url']; ?>" style="color:#444; text-decoration:none; font-size:13px; display:flex; align-items:center; gap:8px;">
                                    <?php echo $tl['label']; ?>
                                    <i class="fas fa-arrow-right" style="color:#F55900; font-size:11px; margin-left:auto;"></i>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Online Booking -->
                    <div style="background:linear-gradient(135deg,#1B5E20,#2E7D32); border-radius:20px; padding:25px; color:#fff;">
                        <h3 style="color:#A5D6A7; font-size:1.1rem; margin-bottom:15px;"><i class="fas fa-laptop"></i> ऑनलाइन बुकिंग</h3>
                        <div style="display:flex; flex-direction:column; gap:10px;">
                            <a href="https://srjbtkshetra.org" target="_blank" rel="noopener noreferrer" style="background:rgba(255,255,255,0.15); color:#fff; padding:12px 15px; border-radius:10px; text-decoration:none; font-size:13px; display:flex; align-items:center; gap:8px;">
                                <i class="fas fa-pray"></i> दर्शन बुकिंग
                            </a>
                            <a href="https://www.irctc.co.in" target="_blank" rel="noopener noreferrer" style="background:rgba(255,255,255,0.15); color:#fff; padding:12px 15px; border-radius:10px; text-decoration:none; font-size:13px; display:flex; align-items:center; gap:8px;">
                                <i class="fas fa-train"></i> ट्रेन बुकिंग
                            </a>
                            <a href="https://www.makemytrip.com/hotels/ayodhya-hotels.html" target="_blank" rel="noopener noreferrer" style="background:rgba(255,255,255,0.15); color:#fff; padding:12px 15px; border-radius:10px; text-decoration:none; font-size:13px; display:flex; align-items:center; gap:8px;">
                                <i class="fas fa-hotel"></i> होटल बुकिंग
                            </a>
                        </div>
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
            🙏 जय श्री राम! अयोध्या दर्शन करें
        </h2>
        <p style="color:rgba(255,255,255,0.9); font-size:1.1rem; margin-bottom:30px; max-width:600px; margin-left:auto; margin-right:auto;">
            राम जन्मभूमि का आशीर्वाद, सरयू का पावन स्पर्श — यह यात्रा आपका जीवन बदल देगी
        </p>
        <div style="display:flex; gap:15px; justify-content:center; flex-wrap:wrap;">
            <a href="<?php echo SITE_URL; ?>/how-to-reach-ayodhya" style="background:#fff; color:#F55900; padding:15px 35px; border-radius:50px; font-weight:700; text-decoration:none; font-size:1rem;">
                <i class="fas fa-map-location-dot"></i> कैसे पहुंचें
            </a>
            <a href="<?php echo SITE_URL; ?>/hotels-ayodhya" style="background:rgba(255,255,255,0.2); color:#fff; border:2px solid #fff; padding:15px 35px; border-radius:50px; font-weight:700; text-decoration:none; font-size:1rem;">
                <i class="fas fa-hotel"></i> होटल बुक करें
            </a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
