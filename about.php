<?php
/**
 * Ayodhya Ram Mandir - About Us Page
 * 10 Sections, 3000+ words, Complete SEO
 */

$pageType = 'page';
$pageSlug = 'about-us';
$pageTitle = 'About Us - AyodhyaRamMandir.in | Complete Guide to Shri Ram & Ayodhya';

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/functions.php';

$lang = getCurrentLang();

$pageSchema = json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'AboutPage',
    'name' => 'About AyodhyaRamMandir.in',
    'url' => SITE_URL . '/about-us',
    'description' => 'AyodhyaRamMandir.in is India\'s most comprehensive digital guide to Shri Ram, Ram Mandir Ayodhya, Ramayan, Hanuman Ji and Ayodhya travel.',
    'publisher' => [
        '@type' => 'Organization',
        'name' => 'AyodhyaRamMandir.in',
        'url' => SITE_URL,
        'telephone' => '+91-8168877332',
        'email' => 'info@ayodhyarammandir.in'
    ]
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include __DIR__ . '/includes/header.php';
?>

<!-- Page Hero -->
<section class="page-hero-section" style="background: linear-gradient(135deg, #1A0A00 0%, #2D1500 50%, #F55900 100%); padding: 100px 0 60px; position:relative; overflow:hidden;">
    <div class="container text-center" style="position:relative;z-index:2;">
        <div data-aos="fade-down">
            <span style="background:rgba(255,140,0,0.2); color:#FFD700; padding:8px 20px; border-radius:30px; font-size:14px; letter-spacing:2px; text-transform:uppercase;">🕉️ Jai Shri Ram</span>
            <h1 style="color:#fff; font-size:clamp(2rem,5vw,3.5rem); font-weight:800; margin:20px 0 15px; font-family:'Noto Serif Devanagari',serif;">
                <?php echo __t('About AyodhyaRamMandir.in', 'हमारे बारे में - अयोध्या राम मंदिर'); ?>
            </h1>
            <p style="color:#FFD48A; font-size:1.2rem; max-width:700px; margin:0 auto;">
                <?php echo __t('India\'s most complete digital guide to Shri Ram, Ayodhya & Ramayan', 'श्री राम, अयोध्या और रामायण का भारत का सबसे संपूर्ण डिजिटल गाइड'); ?>
            </p>
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" style="margin-top:20px;">
                <ol class="breadcrumb justify-content-center" style="background:none;">
                    <li class="breadcrumb-item"><a href="<?php echo SITE_URL; ?>/" style="color:#FFD700;">Home</a></li>
                    <li class="breadcrumb-item active" style="color:#fff;">About Us</li>
                </ol>
            </nav>
        </div>
    </div>
    <div style="position:absolute;top:0;left:0;right:0;bottom:0; background:url('assets/images/ayodhya-mandir.jpg') center/cover; opacity:0.12;"></div>
</section>

<!-- ====== SECTION 1: OUR MISSION ====== -->
<section class="section-padding" style="background: linear-gradient(135deg, #FFF8F0 0%, #FFE8CC 100%);">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <span class="section-label"><i class="fas fa-bullseye"></i> <?php echo __t('Our Mission', 'हमारा मिशन'); ?></span>
                <h2 class="section-title"><?php echo __t('Spreading Ram\'s Divine Message Digitally', 'राम का दिव्य संदेश डिजिटल रूप से फैलाना'); ?></h2>
                <p style="font-size:1.1rem; color:#555; line-height:1.9; margin-bottom:20px;">
                    <?php echo __t(
                        'AyodhyaRamMandir.in was created with a sacred mission: to bring the divine teachings, history, and spiritual essence of Shri Ram to every devotee across the globe. In the digital age, we believe every person deserves access to authentic, comprehensive information about Lord Ram, the Ramayan, Ayodhya Dham, and the magnificent new Ram Mandir.',
                        'अयोध्याRamMandir.in एक पवित्र मिशन के साथ बनाया गया था: श्री राम की दिव्य शिक्षाओं, इतिहास और आध्यात्मिक सार को दुनिया भर के हर भक्त तक पहुंचाना। डिजिटल युग में, हम मानते हैं कि हर व्यक्ति को भगवान राम, रामायण, अयोध्या धाम और भव्य नए राम मंदिर के बारे में प्रामाणिक, व्यापक जानकारी तक पहुंच का अधिकार है।'
                    ); ?>
                </p>
                <p style="font-size:1.05rem; color:#666; line-height:1.9;">
                    <?php echo __t(
                        'Our platform serves millions of Ram Bhakts who want to deepen their understanding of the Ramayan, plan their Ayodhya pilgrimage, learn about Ram Lalla darshan, celebrate festivals like Diwali and Ram Navami with the right knowledge, and immerse themselves in the divine stories of Shri Ram, Mata Sita, Lakshman Ji and Hanuman Ji.',
                        'हमारा प्लेटफॉर्म लाखों राम भक्तों की सेवा करता है जो रामायण की अपनी समझ को गहरा करना चाहते हैं, अयोध्या तीर्थयात्रा की योजना बनाना चाहते हैं, राम लला दर्शन के बारे में जानना चाहते हैं, दीवाली और राम नवमी जैसे त्योहारों को सही ज्ञान के साथ मनाना चाहते हैं।'
                    ); ?>
                </p>
                <div class="d-flex gap-3 flex-wrap mt-4">
                    <div style="text-align:center; padding:20px; background:#fff; border-radius:15px; box-shadow:0 5px 20px rgba(245,89,0,0.1); min-width:110px;">
                        <div style="font-size:2rem; font-weight:800; color:#F55900;">500+</div>
                        <div style="font-size:0.85rem; color:#666;"><?php echo __t('Content Pages', 'कंटेंट पेज'); ?></div>
                    </div>
                    <div style="text-align:center; padding:20px; background:#fff; border-radius:15px; box-shadow:0 5px 20px rgba(245,89,0,0.1); min-width:110px;">
                        <div style="font-size:2rem; font-weight:800; color:#F55900;">100+</div>
                        <div style="font-size:0.85rem; color:#666;"><?php echo __t('City Guides', 'शहर गाइड'); ?></div>
                    </div>
                    <div style="text-align:center; padding:20px; background:#fff; border-radius:15px; box-shadow:0 5px 20px rgba(245,89,0,0.1); min-width:110px;">
                        <div style="font-size:2rem; font-weight:800; color:#F55900;">2</div>
                        <div style="font-size:0.85rem; color:#666;"><?php echo __t('Languages', 'भाषाएं'); ?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div style="position:relative; border-radius:20px; overflow:hidden; box-shadow:0 20px 50px rgba(0,0,0,0.2);">
                    <img src="assets/images/ayodhya-mandir.jpg" alt="Ayodhya Ram Mandir" class="img-fluid w-100" style="border-radius:20px;">
                    <div style="position:absolute; bottom:20px; left:20px; background:rgba(255,255,255,0.95); padding:15px 20px; border-radius:10px; border-left:4px solid #F55900;">
                        <strong style="color:#F55900; font-size:1.1rem;">🏛️ Ayodhya Ram Mandir</strong><br>
                        <span style="color:#555; font-size:0.9rem;"><?php echo __t('Consecrated: 22 January 2024', 'प्राण प्रतिष्ठा: 22 जनवरी 2024'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ====== SECTION 2: WHO WE ARE ====== -->
<section class="section-padding" style="background: linear-gradient(180deg, #1A0A00 0%, #2D1500 100%);">
    <div class="container">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-label text-warning"><i class="fas fa-users"></i> <?php echo __t('Who We Are', 'हम कौन हैं'); ?></span>
            <h2 class="section-title text-white"><?php echo __t('A Team of Devoted Ram Bhakts', 'समर्पित राम भक्तों की टीम'); ?></h2>
            <p style="color:#FFD48A; max-width:700px; margin:0 auto 40px; font-size:1.1rem; line-height:1.8;">
                <?php echo __t(
                    'We are a passionate team of Sanatan Dharma devotees, digital creators, religious scholars, and technology experts who have come together with one divine goal - to create the most comprehensive and authentic online resource for Shri Ram and Ayodhya.',
                    'हम सनातन धर्म के भक्तों, डिजिटल क्रिएटर्स, धार्मिक विद्वानों और तकनीकी विशेषज्ञों की एक उत्साही टीम हैं जो एक दिव्य लक्ष्य के साथ एकत्रित हुए हैं - श्री राम और अयोध्या के लिए सबसे व्यापक और प्रामाणिक ऑनलाइन संसाधन बनाना।'
                ); ?>
            </p>
        </div>
        
        <div class="row g-4">
            <?php
            $team = [
                ['icon' => 'fa-book-open', 'title' => 'Religious Scholars', 'title_hi' => 'धार्मिक विद्वान', 'desc' => 'Sanskrit scholars and Ramayan experts ensuring authentic content', 'desc_hi' => 'संस्कृत विद्वान और रामायण विशेषज्ञ प्रामाणिक सामग्री सुनिश्चित करते हैं'],
                ['icon' => 'fa-laptop-code', 'title' => 'Tech Team', 'title_hi' => 'तकनीकी टीम', 'desc' => 'Web developers building the fastest and most accessible platform', 'desc_hi' => 'वेब डेवलपर्स सबसे तेज़ और सुलभ प्लेटफॉर्म बना रहे हैं'],
                ['icon' => 'fa-pen-to-square', 'title' => 'Content Writers', 'title_hi' => 'कंटेंट राइटर', 'desc' => 'Bilingual writers creating deep, devotional content in Hindi & English', 'desc_hi' => 'द्विभाषी लेखक हिंदी और अंग्रेजी में गहरी भक्तिपूर्ण सामग्री बनाते हैं'],
                ['icon' => 'fa-camera', 'title' => 'Photo/Video Team', 'title_hi' => 'फोटो/वीडियो टीम', 'desc' => 'Photographers capturing the divine beauty of Ayodhya and Ram Mandir', 'desc_hi' => 'अयोध्या और राम मंदिर की दिव्य सुंदरता को कैद करने वाले फोटोग्राफर'],
                ['icon' => 'fa-magnifying-glass-chart', 'title' => 'SEO Experts', 'title_hi' => 'SEO विशेषज्ञ', 'desc' => 'Ensuring every Ram bhakt can find us on Google and all platforms', 'desc_hi' => 'यह सुनिश्चित करना कि हर राम भक्त हमें गूगल पर खोज सके'],
                ['icon' => 'fa-hands-praying', 'title' => 'Devotees', 'title_hi' => 'भक्त', 'desc' => 'Millions of Ram Bhakts who inspire us with their love and feedback', 'desc_hi' => 'लाखों राम भक्त जो अपने प्रेम और फीडबैक से हमें प्रेरित करते हैं'],
            ];
            foreach ($team as $i => $t):
            ?>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="<?php echo $i * 60; ?>">
                <div style="background:rgba(255,255,255,0.07); border:1px solid rgba(255,140,0,0.2); border-radius:15px; padding:30px; height:100%;">
                    <div style="width:60px; height:60px; background:rgba(245,89,0,0.2); border-radius:50%; display:flex; align-items:center; justify-content:center; margin-bottom:20px;">
                        <i class="fas <?php echo $t['icon']; ?>" style="font-size:1.5rem; color:#FFD700;"></i>
                    </div>
                    <h4 style="color:#fff; font-size:1.1rem; margin-bottom:10px;"><?php echo $lang === 'hi' ? $t['title_hi'] : $t['title']; ?></h4>
                    <p style="color:#FFD48A; font-size:0.95rem; line-height:1.7; margin:0;"><?php echo $lang === 'hi' ? $t['desc_hi'] : $t['desc']; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ====== SECTION 3: WHAT WE OFFER ====== -->
<section class="section-padding" style="background: #FFF3E0;">
    <div class="container">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-label"><i class="fas fa-gift"></i> <?php echo __t('What We Offer', 'हम क्या प्रदान करते हैं'); ?></span>
            <h2 class="section-title"><?php echo __t('Complete Ram Bhakti Resources', 'संपूर्ण राम भक्ति संसाधन'); ?></h2>
        </div>
        <div class="row g-4">
            <?php
            $offerings = [
                ['icon' => 'fa-landmark', 'color' => '#F55900', 'title' => 'Ram Mandir Complete Guide', 'title_hi' => 'राम मंदिर संपूर्ण गाइड', 'desc' => 'Pran Pratishtha history, architecture details, darshan timings, rules, entry procedure, and everything a pilgrim needs to know before visiting Ayodhya Ram Mandir.', 'desc_hi' => 'प्राण प्रतिष्ठा इतिहास, वास्तुकला विवरण, दर्शन समय, नियम, प्रवेश प्रक्रिया और वह सब कुछ जो एक तीर्थयात्री को अयोध्या राम मंदिर जाने से पहले जानना चाहिए।'],
                ['icon' => 'fa-book-open', 'color' => '#FF8237', 'title' => 'Complete Ramayan Online', 'title_hi' => 'संपूर्ण रामायण ऑनलाइन', 'desc' => 'All 7 Kand of Ramayan in beautiful Hindi and English - Bal Kand, Ayodhya Kand, Aranya Kand, Kishkindha Kand, Sundar Kand, Lanka Kand, and Uttar Kand.', 'desc_hi' => '7 कांड की संपूर्ण रामायण - बाल, अयोध्या, अरण्य, किष्किंधा, सुंदर, लंका, उत्तर कांड हिंदी और अंग्रेजी में।'],
                ['icon' => 'fa-tree', 'color' => '#4CAF50', 'title' => '14 Varsh Vanvas Journey', 'title_hi' => '14 वर्ष वनवास यात्रा', 'desc' => 'Detailed guide of Ram\'s 14 years of forest exile - every place, event, and story from Ayodhya to Lanka and back. Interactive map with all stops.', 'desc_hi' => 'राम के 14 वर्ष के वनवास की विस्तृत गाइड - अयोध्या से लंका और वापस हर जगह, घटना और कहानी। सभी पड़ावों के साथ इंटरएक्टिव मानचित्र।'],
                ['icon' => 'fa-fire', 'color' => '#FF5722', 'title' => 'Diwali & Deepotsav Guide', 'title_hi' => 'दीवाली और दीपोत्सव गाइड', 'desc' => 'Complete guide to Diwali celebration in Ayodhya - why Diwali is celebrated, Deepotsav event guide, best places to watch the celebration, and spiritual significance.', 'desc_hi' => 'अयोध्या में दीवाली उत्सव की संपूर्ण गाइड - दीवाली क्यों मनाई जाती है, दीपोत्सव इवेंट गाइड, उत्सव देखने की सर्वोत्तम जगह।'],
                ['icon' => 'fa-map-location-dot', 'color' => '#2196F3', 'title' => 'City-wise Travel Guide', 'title_hi' => 'शहरवार यात्रा गाइड', 'desc' => 'How to reach Ayodhya from 100+ cities across India with trains, buses, flights, distances, time, budget travel tips, and best routes for pilgrims.', 'desc_hi' => 'ट्रेन, बस, फ्लाइट, दूरी, समय, बजट यात्रा टिप्स के साथ 100+ शहरों से अयोध्या कैसे पहुंचें।'],
                ['icon' => 'fa-om', 'color' => '#9C27B0', 'title' => 'Hanuman Chalisa & Bhajans', 'title_hi' => 'हनुमान चालीसा और भजन', 'desc' => 'Complete Hanuman Chalisa with word-by-word meaning, Ram Bhajans, Aarti, Sundarkand, and all devotional content for daily puja and worship.', 'desc_hi' => 'शब्द-दर-शब्द अर्थ, राम भजन, आरती, सुंदरकांड और दैनिक पूजा के लिए सभी भक्ति सामग्री के साथ संपूर्ण हनुमान चालीसा।'],
                ['icon' => 'fa-images', 'color' => '#FF9800', 'title' => 'Divine Photo & Video Gallery', 'title_hi' => 'दिव्य फोटो और वीडियो गैलरी', 'desc' => 'HD photos and videos of Ram Lalla, Ram Mandir, Ayodhya, Saryu Ghat, Hanumangarhi, and all major religious sites with high-quality imagery.', 'desc_hi' => 'राम लला, राम मंदिर, अयोध्या, सरयू घाट, हनुमानगढ़ी और सभी प्रमुख धार्मिक स्थलों की HD फोटो और वीडियो।'],
                ['icon' => 'fa-calendar-days', 'color' => '#F44336', 'title' => 'Festival Calendar & Panchang', 'title_hi' => 'त्योहार कैलेंडर और पंचांग', 'desc' => 'Daily Panchang, Hindu festival calendar, Ram Navami guide, Diwali guide, Hanuman Jayanti, and all major festivals with puja vidhi and timing.', 'desc_hi' => 'दैनिक पंचांग, हिंदू त्योहार कैलेंडर, राम नवमी गाइड, दीवाली गाइड, हनुमान जयंती और सभी प्रमुख त्योहार।'],
            ];
            foreach ($offerings as $i => $o):
            ?>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="<?php echo $i * 50; ?>">
                <div style="background:#fff; border-radius:15px; padding:25px; height:100%; box-shadow:0 5px 20px rgba(0,0,0,0.07); border-top:4px solid <?php echo $o['color']; ?>; transition:transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                    <i class="fas <?php echo $o['icon']; ?>" style="font-size:2rem; color:<?php echo $o['color']; ?>; margin-bottom:15px;"></i>
                    <h4 style="font-size:1rem; color:#333; margin-bottom:10px;"><?php echo $lang === 'hi' ? $o['title_hi'] : $o['title']; ?></h4>
                    <p style="font-size:0.9rem; color:#666; line-height:1.7; margin:0;"><?php echo $lang === 'hi' ? $o['desc_hi'] : $o['desc']; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ====== SECTION 4: ABOUT AYODHYA ====== -->
<section class="section-padding" style="background: linear-gradient(135deg, #FFF8F0 0%, #FFECD5 100%);">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="row g-3">
                    <div class="col-6">
                        <div style="border-radius:12px; overflow:hidden; aspect-ratio:4/3;">
                            <img src="assets/images/ram-lala.jpg" alt="Ram Lalla" class="img-fluid w-100 h-100" style="object-fit:cover; object-position:center top;">
                        </div>
                    </div>
                    <div class="col-6">
                        <div style="border-radius:12px; overflow:hidden; aspect-ratio:4/3;">
                            <img src="assets/images/hanuman-ji.jpg" onerror="this.src='assets/images/hanuman-ji.jpg'" alt="Hanumangarhi" class="img-fluid w-100 h-100" style="object-fit:cover; object-position:center top;">
                        </div>
                    </div>
                    <div class="col-12">
                        <div style="border-radius:12px; overflow:hidden; aspect-ratio:16/6;">
                            <img src="assets/images/ayodhya-nagri.jpg" alt="Ayodhya Nagri" class="img-fluid w-100 h-100" style="object-fit:cover; object-position:center center;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <span class="section-label"><i class="fas fa-city"></i> <?php echo __t('Sacred Ayodhya', 'पवित्र अयोध्या'); ?></span>
                <h2 class="section-title"><?php echo __t('About Ayodhya - City of Lord Ram', 'अयोध्या - भगवान राम की नगरी'); ?></h2>
                <p style="color:#555; line-height:1.9; margin-bottom:15px;">
                    <?php echo __t(
                        'Ayodhya is one of the seven sacred cities (Sapta Puri) of Hinduism and is considered the birthplace of Lord Ram, the seventh avatar of Vishnu. Located on the banks of the sacred Saryu river in Uttar Pradesh, India, Ayodhya has been a center of Hindu pilgrimage for thousands of years.',
                        'अयोध्या हिंदू धर्म के सात पवित्र शहरों (सप्त पुरी) में से एक है और भगवान राम, विष्णु के सातवें अवतार की जन्मभूमि मानी जाती है। उत्तर प्रदेश, भारत में पवित्र सरयू नदी के किनारे स्थित अयोध्या हजारों वर्षों से हिंदू तीर्थयात्रा का केंद्र रही है।'
                    ); ?>
                </p>
                <p style="color:#555; line-height:1.9; margin-bottom:15px;">
                    <?php echo __t(
                        'On January 22, 2024, the historic Pran Pratishtha ceremony of the grand Ram Mandir transformed Ayodhya into the spiritual capital of India. The Shri Ram Janmabhoomi Mandir, built in Nagara architectural style, stands 161 feet tall on a 70-acre complex with 392 pillars and 44 gates.',
                        '22 जनवरी 2024 को भव्य राम मंदिर के ऐतिहासिक प्राण प्रतिष्ठा समारोह ने अयोध्या को भारत की आध्यात्मिक राजधानी में बदल दिया। नागर स्थापत्य शैली में निर्मित श्री राम जन्मभूमि मंदिर 70 एकड़ के परिसर में 392 स्तंभों और 44 द्वारों के साथ 161 फीट ऊंचा खड़ा है।'
                    ); ?>
                </p>
                <p style="color:#555; line-height:1.9;">
                    <?php echo __t(
                        'Major places to visit in Ayodhya include: Ram Janmabhoomi (Ram Mandir), Hanumangarhi Temple, Kanak Bhawan, Saryu Ghat, Ram Ki Paidi, Dashrath Mahal, Treta Ke Thakur, Nageshwarnath Temple, and many more ancient temples and sacred sites.',
                        'अयोध्या में घूमने की प्रमुख जगहें: राम जन्मभूमि (राम मंदिर), हनुमानगढ़ी मंदिर, कनक भवन, सरयू घाट, राम की पैड़ी, दशरथ महल, त्रेता के ठाकुर, नागेश्वरनाथ मंदिर और कई अन्य प्राचीन मंदिर और पवित्र स्थल शामिल हैं।'
                    ); ?>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ====== SECTION 5: RAM VANVAS INTRO ====== -->
<section class="section-padding" style="background: linear-gradient(135deg, #1A3A1A 0%, #2D5A2D 100%);">
    <div class="container">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-label text-warning"><i class="fas fa-tree"></i> <?php echo __t('14 Year Exile', '14 वर्ष वनवास'); ?></span>
            <h2 class="section-title text-white"><?php echo __t('Ram\'s 14 Year Vanvas - The Great Journey', 'राम का 14 वर्ष वनवास - महान यात्रा'); ?></h2>
            <p style="color:#a8d5a8; max-width:700px; margin:0 auto 40px; font-size:1.1rem; line-height:1.8;">
                <?php echo __t(
                    'When Queen Kaikeyi demanded her two boons, Ram, the ideal son, accepted exile without hesitation. The 14-year vanvas of Ram, Sita, and Lakshman is one of the most profound journeys in human history - full of devotion, sacrifice, valor, and divine purpose.',
                    'जब रानी कैकेयी ने अपने दो वरदान मांगे, राम ने बिना हिचकिचाहट के आदर्श पुत्र की भूमिका निभाते हुए वनवास स्वीकार किया। राम, सीता और लक्ष्मण का 14 वर्षीय वनवास मानव इतिहास की सबसे गहन यात्राओं में से एक है।'
                ); ?>
            </p>
        </div>
        
        <div class="row g-4 justify-content-center">
            <?php
            $stops = [
                ['num' => '01', 'place' => 'Ayodhya → Shringaverapura', 'place_hi' => 'अयोध्या → श्रृंगवेरपुर', 'desc' => 'Journey begins. Crossed Ganga at Shringaverapura, met Nishad King Guha', 'desc_hi' => 'यात्रा शुरू। श्रृंगवेरपुर में गंगा पार, निषाद राज गुह से मिलन'],
                ['num' => '02', 'place' => 'Prayag (Allahabad)', 'place_hi' => 'प्रयागराज', 'desc' => 'Met sage Bharadvaj at Triveni Sangam. Received guidance for forest life', 'desc_hi' => 'त्रिवेणी संगम पर भरद्वाज ऋषि से मिलन। वन जीवन के लिए मार्गदर्शन'],
                ['num' => '03', 'place' => 'Chitrakoot', 'place_hi' => 'चित्रकूट', 'desc' => 'Spent 11 years here. Bharat Milap happened. Valmiki ashram nearby', 'desc_hi' => '11 वर्ष यहां बिताए। भरत मिलाप हुआ। पास में वाल्मीकि आश्रम'],
                ['num' => '04', 'place' => 'Dandakaranya Forest', 'place_hi' => 'दंडकारण्य वन', 'desc' => 'Vast forest region. Killed many demons. Protected sages\' ashrams', 'desc_hi' => 'विशाल वन क्षेत्र। अनेक राक्षसों का वध। ऋषियों के आश्रमों की रक्षा'],
                ['num' => '05', 'place' => 'Panchvati (Nashik)', 'place_hi' => 'पंचवटी (नासिक)', 'desc' => 'Built hut on Godavari banks. Shurpanakha incident. Sita Haran happened here', 'desc_hi' => 'गोदावरी किनारे कुटिया बनाई। शूर्पणखा प्रसंग। यहीं हुआ सीता हरण'],
                ['num' => '06', 'place' => 'Kishkindha (Karnataka)', 'place_hi' => 'किष्किंधा', 'desc' => 'Met Hanuman Ji. Allied with Sugreev. Formed Vanar Sena (monkey army)', 'desc_hi' => 'हनुमान जी से मिलन। सुग्रीव से मित्रता। वानर सेना का गठन'],
                ['num' => '07', 'place' => 'Rameshwaram', 'place_hi' => 'रामेश्वरम', 'desc' => 'Built Ram Setu bridge to Lanka. Worshipped Shiva here before war', 'desc_hi' => 'लंका तक राम सेतु का निर्माण। युद्ध से पहले यहां शिव की पूजा'],
                ['num' => '08', 'place' => 'Lanka (Sri Lanka)', 'place_hi' => 'लंका', 'desc' => 'Epic war. Ravan vadh. Sita rescued. Return in Pushpak Viman', 'desc_hi' => 'महायुद्ध। रावण वध। सीता मुक्ति। पुष्पक विमान से वापसी'],
            ];
            foreach ($stops as $i => $stop):
            ?>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="<?php echo $i * 50; ?>">
                <div style="background:rgba(255,255,255,0.08); border:1px solid rgba(168,213,168,0.3); border-radius:15px; padding:20px; height:100%;">
                    <div style="font-size:2rem; font-weight:900; color:rgba(168,213,168,0.4); margin-bottom:10px; font-family:monospace;"><?php echo $stop['num']; ?></div>
                    <h5 style="color:#a8d5a8; font-size:0.95rem; margin-bottom:8px;"><?php echo $lang === 'hi' ? $stop['place_hi'] : $stop['place']; ?></h5>
                    <p style="color:rgba(168,213,168,0.8); font-size:0.85rem; line-height:1.6; margin:0;"><?php echo $lang === 'hi' ? $stop['desc_hi'] : $stop['desc']; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center mt-5">
            <a href="<?php echo SITE_URL; ?>/ram-vanvas-14-varsh" class="btn-hero btn-hero-primary">
                <i class="fas fa-tree"></i> <?php echo __t('Read Complete 14 Varsh Vanvas Story', '14 वर्ष वनवास की पूरी कथा पढ़ें'); ?>
            </a>
        </div>
    </div>
</section>

<!-- ====== SECTION 6: DIWALI SECTION ====== -->
<section class="section-padding" style="background: linear-gradient(135deg, #1A0A00 0%, #3D0000 100%); position:relative; overflow:hidden;">
    <div style="position:absolute; top:0; left:0; right:0; bottom:0; background:radial-gradient(circle at 50% 50%, rgba(255,140,0,0.1) 0%, transparent 70%);"></div>
    <div class="container" style="position:relative;z-index:2;">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <span class="section-label text-warning"><i class="fas fa-fire"></i> 🪔 <?php echo __t('Diwali & Deepotsav', 'दीवाली और दीपोत्सव'); ?></span>
                <h2 class="section-title text-white"><?php echo __t('Diwali - The Festival of Ram\'s Return', 'दीवाली - राम की वापसी का उत्सव'); ?></h2>
                <p style="color:#FFD48A; line-height:1.9; margin-bottom:20px;">
                    <?php echo __t(
                        'Diwali (Deepawali) is celebrated on the day Lord Ram returned to Ayodhya after 14 years of exile and his victory over demon king Ravan. The citizens of Ayodhya lit thousands of diyas (oil lamps) to welcome their beloved Ram, Sita, and Lakshman home. This tradition continues to this day as the most celebrated festival in India.',
                        'दीवाली (दीपावली) उस दिन मनाई जाती है जब भगवान राम 14 वर्ष के वनवास के बाद अयोध्या लौटे और राक्षस राजा रावण पर विजय प्राप्त की। अयोध्या के नागरिकों ने अपने प्रिय राम, सीता और लक्ष्मण का स्वागत करने के लिए हजारों दीये जलाए। यह परंपरा आज भी जारी है।'
                    ); ?>
                </p>
                <p style="color:#FFD48A; line-height:1.9; margin-bottom:20px;">
                    <?php echo __t(
                        'Ayodhya Deepotsav is the grand state celebration organized by Uttar Pradesh government every Diwali. Millions of diyas are lit along the banks of Saryu River, breaking Guinness World Records every year. Witnessing Deepotsav in Ayodhya is a life-changing spiritual experience.',
                        'अयोध्या दीपोत्सव उत्तर प्रदेश सरकार द्वारा हर दीवाली पर आयोजित भव्य राज्य उत्सव है। सरयू नदी के किनारे लाखों दीये जलाए जाते हैं, जो हर साल गिनीज विश्व रिकॉर्ड तोड़ते हैं।'
                    ); ?>
                </p>
                <a href="<?php echo SITE_URL; ?>/diwali-ayodhya-deepotsav" class="btn-hero btn-hero-primary">
                    🪔 <?php echo __t('Complete Diwali Guide', 'पूरी दीवाली गाइड'); ?>
                </a>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div style="text-align:center;">
                    <div style="font-size:120px; line-height:1; margin-bottom:20px; filter:drop-shadow(0 0 30px orange);">🪔</div>
                    <div class="row g-3 justify-content-center">
                        <?php
                        $diwaliFacts = [
                            ['🎆', 'World Record', 'विश्व रिकॉर्ड', '25+ Lakh Diyas', '25+ लाख दीये'],
                            ['🌊', 'Saryu River', 'सरयू नदी', 'Magnificent Aarti', 'भव्य आरती'],
                            ['🎭', 'Cultural Shows', 'सांस्कृतिक शो', 'Ram Leela', 'रामलीला'],
                            ['✈️', 'Tourists', 'पर्यटक', '50+ Lakh Visitors', '50+ लाख दर्शनार्थी'],
                        ];
                        foreach ($diwaliFacts as $f):
                        ?>
                        <div class="col-6">
                            <div style="background:rgba(255,255,255,0.08); border-radius:15px; padding:15px; text-align:center;">
                                <div style="font-size:2rem;"><?php echo $f[0]; ?></div>
                                <div style="color:#FFD700; font-size:0.85rem; font-weight:600;"><?php echo $lang === 'hi' ? $f[2] : $f[1]; ?></div>
                                <div style="color:#FFD48A; font-size:0.8rem;"><?php echo $lang === 'hi' ? $f[4] : $f[3]; ?></div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ====== SECTION 7: OUR VALUES ====== -->
<section class="section-padding" style="background: linear-gradient(135deg, #FFF8F0 0%, #FFE8CC 100%);">
    <div class="container">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-label"><i class="fas fa-heart"></i> <?php echo __t('Our Values', 'हमारे मूल्य'); ?></span>
            <h2 class="section-title"><?php echo __t('Guided by Ram\'s Teachings', 'राम की शिक्षाओं द्वारा निर्देशित'); ?></h2>
        </div>
        <div class="row g-4">
            <?php
            $values = [
                ['icon' => '🙏', 'title' => 'Authenticity', 'title_hi' => 'प्रामाणिकता', 'desc' => 'All religious content is verified by Sanskrit scholars and Ramayan experts. We never compromise on accuracy.', 'desc_hi' => 'सभी धार्मिक सामग्री संस्कृत विद्वानों और रामायण विशेषज्ञों द्वारा सत्यापित है। हम सटीकता पर कभी समझौता नहीं करते।'],
                ['icon' => '❤️', 'title' => 'Devotion', 'title_hi' => 'भक्ति', 'desc' => 'Every page is created with love and devotion for Shri Ram. This is not just a website - it is a digital mandir.', 'desc_hi' => 'हर पेज श्री राम के प्रति प्रेम और भक्ति के साथ बनाया गया है। यह सिर्फ एक वेबसाइट नहीं है - यह एक डिजिटल मंदिर है।'],
                ['icon' => '🌍', 'title' => 'Accessibility', 'title_hi' => 'पहुंच', 'desc' => 'Available in Hindi and English so every Ram Bhakt regardless of language can access divine knowledge.', 'desc_hi' => 'हिंदी और अंग्रेजी में उपलब्ध ताकि भाषा की परवाह किए बिना हर राम भक्त दिव्य ज्ञान तक पहुंच सके।'],
                ['icon' => '🔄', 'title' => 'Always Updated', 'title_hi' => 'हमेशा अपडेट', 'desc' => 'Daily Panchang, latest news from Ayodhya, festival guides, and new content added regularly for pilgrims.', 'desc_hi' => 'दैनिक पंचांग, अयोध्या की ताज़ा खबरें, त्योहार गाइड और तीर्थयात्रियों के लिए नियमित रूप से नई सामग्री।'],
            ];
            foreach ($values as $i => $v):
            ?>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="<?php echo $i * 80; ?>">
                <div style="background:#fff; border-radius:15px; padding:30px; text-align:center; height:100%; box-shadow:0 5px 20px rgba(0,0,0,0.07);">
                    <div style="font-size:3rem; margin-bottom:15px;"><?php echo $v['icon']; ?></div>
                    <h4 style="color:#F55900; margin-bottom:10px;"><?php echo $lang === 'hi' ? $v['title_hi'] : $v['title']; ?></h4>
                    <p style="color:#666; font-size:0.95rem; line-height:1.7;"><?php echo $lang === 'hi' ? $v['desc_hi'] : $v['desc']; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ====== SECTION 8: KEY PAGES ====== -->
<section class="section-padding" style="background:#fff;">
    <div class="container">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-label"><i class="fas fa-sitemap"></i> <?php echo __t('Explore Website', 'वेबसाइट एक्सप्लोर करें'); ?></span>
            <h2 class="section-title"><?php echo __t('Important Sections of Our Website', 'हमारी वेबसाइट के महत्वपूर्ण अनुभाग'); ?></h2>
        </div>
        <div class="row g-3">
            <?php
            $keyPages = [
                ['/ram-mandir', 'fa-landmark', '#F55900', 'Ram Mandir History', 'राम मंदिर इतिहास'],
                ['/ramayan', 'fa-book-open', '#FF8237', 'Complete Ramayan', 'संपूर्ण रामायण'],
                ['/ram-vanvas-14-varsh', 'fa-tree', '#4CAF50', '14 Varsh Vanvas', '14 वर्ष वनवास'],
                ['/diwali-ayodhya-deepotsav', 'fa-fire', '#FF5722', 'Diwali Ayodhya', 'दीवाली अयोध्या'],
                ['/hanuman-ji', 'fa-fire-flame-curved', '#FF9800', 'Hanuman Ji', 'हनुमान जी'],
                ['/mata-sita', 'fa-heart', '#E91E63', 'Mata Sita', 'माता सीता'],
                ['/ayodhya-guide', 'fa-map-location-dot', '#2196F3', 'Ayodhya Guide', 'अयोध्या गाइड'],
                ['/hanuman-chalisa', 'fa-om', '#9C27B0', 'Hanuman Chalisa', 'हनुमान चालीसा'],
                ['/ram-mandir-darshan-guide', 'fa-place-of-worship', '#00BCD4', 'Darshan Guide', 'दर्शन गाइड'],
                ['/places-to-visit-in-ayodhya', 'fa-city', '#795548', 'Places to Visit', 'घूमने की जगहें'],
                ['/dharamshala-ayodhya', 'fa-hotel', '#607D8B', 'Dharamshala', 'धर्मशाला'],
                ['/how-to-reach-ayodhya', 'fa-plane-arrival', '#009688', 'How to Reach', 'कैसे पहुंचें'],
                ['/gallery.php', 'fa-images', '#FF5722', 'Gallery', 'गैलरी'],
                ['/contact', 'fa-envelope', '#3F51B5', 'Contact Us', 'संपर्क करें'],
                ['/privacy-policy', 'fa-shield-halved', '#455A64', 'Privacy Policy', 'गोपनीयता नीति'],
                ['/sitemap.xml', 'fa-sitemap', '#757575', 'Sitemap', 'साइटमैप'],
            ];
            foreach ($keyPages as $p):
            ?>
            <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up">
                <a href="<?php echo SITE_URL . $p[0]; ?>" style="display:flex; align-items:center; gap:10px; padding:15px; background:#f8f9fa; border-radius:10px; text-decoration:none; border-left:3px solid <?php echo $p[2]; ?>; transition:all 0.3s;" onmouseover="this.style.background='<?php echo $p[2]; ?>22'; this.style.transform='translateX(3px)'" onmouseout="this.style.background='#f8f9fa'; this.style.transform='translateX(0)'">
                    <i class="fas <?php echo $p[1]; ?>" style="color:<?php echo $p[2]; ?>; font-size:1.2rem; min-width:20px;"></i>
                    <span style="color:#333; font-size:0.9rem; font-weight:500;"><?php echo $lang === 'hi' ? $p[4] : $p[3]; ?></span>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ====== SECTION 9: TESTIMONIALS ====== -->
<section class="section-padding" style="background: linear-gradient(135deg, #FFF8F0 0%, #FFE8CC 100%);">
    <div class="container">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-label"><i class="fas fa-star"></i> <?php echo __t('Devotee Reviews', 'भक्त समीक्षाएं'); ?></span>
            <h2 class="section-title"><?php echo __t('What Ram Bhakts Say About Us', 'राम भक्त हमारे बारे में क्या कहते हैं'); ?></h2>
        </div>
        <div class="row g-4">
            <?php
            $testimonials = [
                ['name' => 'Rajesh Mishra', 'city' => 'Lucknow, UP', 'stars' => 5, 'text' => 'This website is a divine gift for Ram Bhakts. I planned my complete Ayodhya trip using this site. The darshan guide, city guide, and hotel information is extremely helpful. Jai Shri Ram!', 'text_hi' => 'यह वेबसाइट राम भक्तों के लिए एक दिव्य उपहार है। मैंने इस साइट का उपयोग करके अपनी पूरी अयोध्या यात्रा की योजना बनाई। जय श्री राम!'],
                ['name' => 'Priya Sharma', 'city' => 'Delhi', 'stars' => 5, 'text' => 'I read the complete Ramayan here. The 14 Varsh Vanvas guide is absolutely amazing - I never knew Ram visited so many places during exile. Thank you for this beautiful resource!', 'text_hi' => 'मैंने यहां पूरी रामायण पढ़ी। 14 वर्ष वनवास गाइड बिल्कुल अद्भुत है। धन्यवाद!'],
                ['name' => 'Suresh Gupta', 'city' => 'Patna, Bihar', 'stars' => 5, 'text' => 'Best website for Ayodhya travel planning. I found the Diwali Deepotsav guide very useful. Ayodhya ki Diwali is an experience of a lifetime. God bless the creators!', 'text_hi' => 'अयोध्या यात्रा योजना के लिए सबसे अच्छी वेबसाइट। दीपोत्सव गाइड बहुत उपयोगी। भगवान निर्माताओं को आशीर्वाद दें!'],
            ];
            foreach ($testimonials as $i => $t):
            ?>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="<?php echo $i * 80; ?>">
                <div style="background:#fff; border-radius:15px; padding:25px; height:100%; box-shadow:0 5px 20px rgba(0,0,0,0.08);">
                    <div style="color:#F55900; margin-bottom:10px;"><?php echo str_repeat('⭐', $t['stars']); ?></div>
                    <p style="color:#555; line-height:1.7; font-style:italic; margin-bottom:20px;">"<?php echo $lang === 'hi' ? $t['text_hi'] : $t['text']; ?>"</p>
                    <div style="display:flex; align-items:center; gap:12px;">
                        <div style="width:45px; height:45px; background:#F55900; border-radius:50%; display:flex; align-items:center; justify-content:center;">
                            <i class="fas fa-user" style="color:#fff;"></i>
                        </div>
                        <div>
                            <strong style="color:#333; display:block;"><?php echo $t['name']; ?></strong>
                            <span style="color:#888; font-size:0.85rem;"><?php echo $t['city']; ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ====== SECTION 10: CONTACT US ====== -->
<section class="section-padding" style="background: linear-gradient(135deg, #1A0A00 0%, #2D1500 100%);">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <span class="section-label text-warning"><i class="fas fa-envelope"></i> <?php echo __t('Get In Touch', 'संपर्क करें'); ?></span>
                <h2 class="section-title text-white"><?php echo __t('Contact Us - We\'re Here to Help', 'हमसे संपर्क करें - हम मदद के लिए यहां हैं'); ?></h2>
                <p style="color:#FFD48A; line-height:1.9; margin-bottom:30px;">
                    <?php echo __t(
                        'Have questions about Ayodhya travel, Ram Mandir darshan, or want to report incorrect information? Our team is available to help all Ram Bhakts. Contact us through any of the channels below.',
                        'अयोध्या यात्रा, राम मंदिर दर्शन के बारे में प्रश्न हैं, या गलत जानकारी रिपोर्ट करना चाहते हैं? हमारी टीम सभी राम भक्तों की मदद के लिए उपलब्ध है।'
                    ); ?>
                </p>
                
                <div style="display:flex; flex-direction:column; gap:20px;">
                    <div style="display:flex; align-items:center; gap:15px;">
                        <div style="width:50px; height:50px; background:rgba(245,89,0,0.2); border-radius:50%; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <i class="fas fa-phone" style="color:#FFD700; font-size:1.3rem;"></i>
                        </div>
                        <div>
                            <div style="color:#FFD700; font-size:0.85rem; font-weight:600; text-transform:uppercase;"><?php echo __t('Phone / WhatsApp', 'फोन / व्हाट्सएप'); ?></div>
                            <a href="tel:+918168877332" style="color:#fff; text-decoration:none; font-size:1.2rem; font-weight:600;">+91-8168877332</a>
                        </div>
                    </div>
                    <div style="display:flex; align-items:center; gap:15px;">
                        <div style="width:50px; height:50px; background:rgba(245,89,0,0.2); border-radius:50%; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <i class="fas fa-envelope" style="color:#FFD700; font-size:1.3rem;"></i>
                        </div>
                        <div>
                            <div style="color:#FFD700; font-size:0.85rem; font-weight:600; text-transform:uppercase;"><?php echo __t('Official Email', 'आधिकारिक ईमेल'); ?></div>
                            <a href="mailto:officialayodhyarammandir.in@gmail.com" style="color:#fff; text-decoration:none; font-size:1rem;">officialayodhyarammandir.in@gmail.com</a>
                        </div>
                    </div>
                    <div style="display:flex; align-items:center; gap:15px;">
                        <div style="width:50px; height:50px; background:rgba(245,89,0,0.2); border-radius:50%; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <i class="fas fa-envelope-open" style="color:#FFD700; font-size:1.3rem;"></i>
                        </div>
                        <div>
                            <div style="color:#FFD700; font-size:0.85rem; font-weight:600; text-transform:uppercase;"><?php echo __t('Info Email', 'जानकारी ईमेल'); ?></div>
                            <a href="mailto:info@ayodhyarammandir.in" style="color:#fff; text-decoration:none; font-size:1rem;">info@ayodhyarammandir.in</a>
                        </div>
                    </div>
                    <div style="display:flex; align-items:center; gap:15px;">
                        <div style="width:50px; height:50px; background:rgba(245,89,0,0.2); border-radius:50%; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <i class="fas fa-map-marker-alt" style="color:#FFD700; font-size:1.3rem;"></i>
                        </div>
                        <div>
                            <div style="color:#FFD700; font-size:0.85rem; font-weight:600; text-transform:uppercase;"><?php echo __t('Address', 'पता'); ?></div>
                            <span style="color:#FFD48A; font-size:0.95rem;">Ayodhya Dham, Uttar Pradesh - 224123</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div style="background:rgba(255,255,255,0.07); border:1px solid rgba(255,140,0,0.2); border-radius:20px; padding:35px;">
                    <h4 style="color:#FFD700; margin-bottom:25px; text-align:center;">📧 <?php echo __t('Send Us a Message', 'हमें संदेश भेजें'); ?></h4>
                    <form action="api/contact.php" method="POST">
                        <div class="mb-3">
                            <input type="text" name="name" class="form-control" placeholder="<?php echo __t('Your Name', 'आपका नाम'); ?>" required style="background:rgba(255,255,255,0.1); border:1px solid rgba(255,140,0,0.3); color:#fff;">
                        </div>
                        <div class="mb-3">
                            <input type="tel" name="phone" class="form-control" placeholder="<?php echo __t('Phone Number', 'फोन नंबर'); ?>" style="background:rgba(255,255,255,0.1); border:1px solid rgba(255,140,0,0.3); color:#fff;">
                        </div>
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" placeholder="<?php echo __t('Email Address', 'ईमेल पता'); ?>" required style="background:rgba(255,255,255,0.1); border:1px solid rgba(255,140,0,0.3); color:#fff;">
                        </div>
                        <div class="mb-3">
                            <textarea name="message" class="form-control" rows="4" placeholder="<?php echo __t('Your Message', 'आपका संदेश'); ?>" required style="background:rgba(255,255,255,0.1); border:1px solid rgba(255,140,0,0.3); color:#fff; resize:none;"></textarea>
                        </div>
                        <button type="submit" class="btn-hero btn-hero-primary w-100">
                            <i class="fas fa-paper-plane"></i> <?php echo __t('Send Message', 'संदेश भेजें'); ?>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
