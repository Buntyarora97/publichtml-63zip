<?php
/**
 * Diwali Ayodhya Deepotsav - Complete Guide
 * Deepawali celebration, Ram's return, Deepotsav UP event
 * 3000+ words SEO page
 */

$pageType = 'page';
$pageSlug = 'diwali-ayodhya-deepotsav';
$pageTitle = 'दीवाली अयोध्या दीपोत्सव 2025 | Diwali Ayodhya Deepotsav Complete Guide - AyodhyaRamMandir.in';

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/functions.php';

$lang = getCurrentLang();

$pageSchema = json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Event',
    'name' => 'Ayodhya Deepotsav 2025',
    'description' => 'Annual Diwali celebration at Ayodhya - millions of diyas lit on Saryu river banks. World record event.',
    'url' => SITE_URL . '/diwali-ayodhya-deepotsav',
    'image' => SITE_URL . '/assets/images/ram-wapsi-ayodhya.jpg',
    'location' => ['@type' => 'Place', 'name' => 'Ayodhya', 'address' => ['@type' => 'PostalAddress', 'addressLocality' => 'Ayodhya', 'addressRegion' => 'Uttar Pradesh', 'addressCountry' => 'IN']],
    'organizer' => ['@type' => 'Organization', 'name' => 'Government of Uttar Pradesh'],
    'inLanguage' => ['hi', 'en'],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include __DIR__ . '/includes/header.php';
?>

<!-- Page Hero - Diwali Theme -->
<section style="background: linear-gradient(135deg, #1A0000 0%, #3D0A00 50%, #7A1A00 100%); padding: 100px 0 60px; position:relative; overflow:hidden;">
    <!-- Animated diyas -->
    <div style="position:absolute; top:0; left:0; right:0; bottom:0; overflow:hidden;">
        <?php for ($i = 0; $i < 15; $i++): ?>
        <div style="position:absolute; font-size:<?php echo rand(20,50); ?>px; opacity:0.15; 
            left:<?php echo rand(0,100); ?>%; top:<?php echo rand(0,100); ?>%; 
            animation:float <?php echo rand(3,6); ?>s ease-in-out infinite <?php echo rand(0,3); ?>s;">🪔</div>
        <?php endfor; ?>
    </div>
    <div style="position:absolute;top:0;left:0;right:0;bottom:0; background:url('assets/images/ram-wapsi-ayodhya.jpg') center/cover; opacity:0.12;"></div>
    
    <div class="container text-center" style="position:relative;z-index:2;">
        <div data-aos="fade-down">
            <span style="background:rgba(255,140,0,0.2); color:#FFD700; padding:8px 20px; border-radius:30px; font-size:13px; letter-spacing:2px;">🪔 दीपावली | Deepawali</span>
            <h1 style="color:#fff; font-size:clamp(1.8rem,5vw,3.2rem); font-weight:800; margin:20px 0 15px; font-family:'Noto Serif Devanagari',serif;">
                <?php echo __t('Diwali Ayodhya Deepotsav - Complete Guide 2025', 'दीवाली अयोध्या दीपोत्सव - सम्पूर्ण गाइड 2025'); ?>
            </h1>
            <p style="color:#FFD48A; font-size:1.1rem; max-width:750px; margin:0 auto 20px; line-height:1.7;">
                <?php echo __t(
                    'Why Diwali is celebrated, Ram\'s return to Ayodhya, Deepotsav world record event, how to attend, best places to see, travel tips and complete spiritual guide',
                    'दीवाली क्यों मनाई जाती है, राम की अयोध्या वापसी, दीपोत्सव विश्व रिकॉर्ड, कैसे शामिल हों, देखने की सर्वोत्तम जगहें, यात्रा टिप्स'
                ); ?>
            </p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center" style="background:none;">
                    <li class="breadcrumb-item"><a href="<?php echo SITE_URL; ?>/" style="color:#FFD700;">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo SITE_URL; ?>/ayodhya-guide" style="color:#FFD700;">Ayodhya Guide</a></li>
                    <li class="breadcrumb-item active" style="color:#fff;">Diwali Deepotsav</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- Quick Facts Bar -->
<div style="background: linear-gradient(90deg, #F55900, #FF8237, #FFAA6E, #FF8237, #F55900); padding:20px 0;">
    <div class="container">
        <div class="row g-3 text-center">
            <?php
            $quickFacts = [
                ['🪔', '25+ Lakh', '25+ लाख', 'Diyas Lit', 'दीये जलाए'],
                ['🌊', 'Saryu River', 'सरयू नदी', 'Main Venue', 'मुख्य स्थान'],
                ['🏆', 'Guinness', 'गिनीज', 'World Record', 'विश्व रिकॉर्ड'],
                ['👥', '50+ Lakh', '50+ लाख', 'Visitors', 'दर्शनार्थी'],
                ['🎆', 'Fireworks', 'आतिशबाजी', 'Grand Display', 'भव्य प्रदर्शन'],
                ['🎭', 'Ram Leela', 'रामलीला', 'Cultural Shows', 'सांस्कृतिक शो'],
            ];
            foreach ($quickFacts as $f):
            ?>
            <div class="col-4 col-md-2">
                <div style="color:#fff;">
                    <div style="font-size:1.8rem;"><?php echo $f[0]; ?></div>
                    <div style="font-size:1rem; font-weight:800;"><?php echo $lang === 'hi' ? $f[2] : $f[1]; ?></div>
                    <div style="font-size:0.75rem; opacity:0.9;"><?php echo $lang === 'hi' ? $f[4] : $f[3]; ?></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- ====== SECTION 1: WHY DIWALI ====== -->
<section class="section-padding" style="background:#fff8f0;">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <span class="section-label"><i class="fas fa-fire"></i> <?php echo __t('Origin of Diwali', 'दीवाली की उत्पत्ति'); ?></span>
                <h2 class="section-title"><?php echo __t('Why Is Diwali Celebrated? The Story of Ram\'s Return', 'दीवाली क्यों मनाई जाती है? राम की वापसी की कहानी'); ?></h2>
                
                <p style="color:#444; line-height:2; font-size:1.05rem; margin-bottom:18px;">
                    <?php echo __t(
                        'Diwali (Deepawali - meaning "row of lights") is celebrated to commemorate one of the most joyous events in Hindu history - the return of Lord Ram to Ayodhya after 14 years of exile (vanvas) and his glorious victory over the demon king Ravan.',
                        'दीवाली (दीपावली - अर्थ "दीपों की पंक्ति") हिंदू इतिहास की सबसे खुशी के क्षणों में से एक को याद करने के लिए मनाई जाती है - 14 वर्ष के वनवास के बाद भगवान राम की अयोध्या वापसी और राक्षस राजा रावण पर उनकी गौरवशाली विजय।'
                    ); ?>
                </p>
                <p style="color:#444; line-height:2; font-size:1.05rem; margin-bottom:18px;">
                    <?php echo __t(
                        'When Ram, Sita, and Lakshman returned to Ayodhya on the night of Kartik Amavasya (new moon night), the city was in darkness. The people of Ayodhya, overjoyed at the return of their beloved king, lit thousands upon thousands of diyas (oil lamps) to illuminate the path and welcome them home.',
                        'जब राम, सीता और लक्ष्मण कार्तिक अमावस्या (अमावस रात) को अयोध्या लौटे, तो शहर अंधेरे में था। अपने प्रिय राजा की वापसी से प्रसन्न अयोध्यावासियों ने रास्ता रोशन करने और उनका स्वागत करने के लिए हजारों-हजार दीये जलाए।'
                    ); ?>
                </p>
                <p style="color:#444; line-height:2; font-size:1.05rem; margin-bottom:18px;">
                    <?php echo __t(
                        'This became the birth of Diwali - a tradition that has been followed for thousands of years. Every year on Kartik Amavasya, Hindus across India and the world light diyas to symbolize the victory of light over darkness, good over evil, and knowledge over ignorance.',
                        'यह दीवाली का जन्म बना - एक परंपरा जो हजारों वर्षों से चली आ रही है। हर साल कार्तिक अमावस्या पर, भारत और दुनिया भर में हिंदू अंधकार पर प्रकाश की, बुराई पर अच्छाई की, और अज्ञान पर ज्ञान की जीत के प्रतीक के रूप में दीये जलाते हैं।'
                    ); ?>
                </p>
                <div style="background:linear-gradient(135deg, #FFF3E0, #FFECD5); border-radius:15px; padding:20px; border-left:4px solid #F55900;">
                    <p style="color:#555; font-style:italic; margin:0; line-height:1.8; font-size:1rem;">
                        🕯️ <?php echo __t('"The people of Ayodhya lit diyas on Kartik Amavasya to welcome Ram - thus began the tradition of Diwali that continues to this day."', '"अयोध्यावासियों ने राम के स्वागत में कार्तिक अमावस्या पर दीये जलाए - इस प्रकार दीवाली की परंपरा शुरू हुई जो आज भी जारी है।"'); ?>
                        <br><small style="color:#F55900; font-style:normal; font-weight:600;">— Valmiki Ramayan, Uttar Kand</small>
                    </p>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div style="text-align:center; padding:40px; background:linear-gradient(135deg, #1A0A00, #3D1A00); border-radius:20px; box-shadow:0 20px 50px rgba(0,0,0,0.3);">
                    <div style="font-size:100px; line-height:1; margin-bottom:25px; filter:drop-shadow(0 0 30px orange);">🪔</div>
                    <h3 style="color:#FFD700; font-family:'Noto Serif Devanagari',serif; font-size:1.5rem; margin-bottom:10px;">दीपावली का अर्थ</h3>
                    <p style="color:#FFD48A; font-size:1rem; margin-bottom:25px;">दीप + आवली = दीपों की पंक्ति<br>Deepa + Avali = Row of Lights</p>
                    
                    <div style="border-top:1px solid rgba(255,140,0,0.2); padding-top:20px;">
                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:15px; text-align:center;">
                            <div style="background:rgba(255,255,255,0.07); border-radius:10px; padding:15px;">
                                <div style="font-size:1.5rem;">🌑</div>
                                <div style="color:#FFD700; font-size:0.85rem; font-weight:600;"><?php echo __t('Kartik Amavasya', 'कार्तिक अमावस्या'); ?></div>
                                <div style="color:#FFD48A; font-size:0.75rem;"><?php echo __t('New Moon Night', 'अमावस रात'); ?></div>
                            </div>
                            <div style="background:rgba(255,255,255,0.07); border-radius:10px; padding:15px;">
                                <div style="font-size:1.5rem;">🛦</div>
                                <div style="color:#FFD700; font-size:0.85rem; font-weight:600;"><?php echo __t('Pushpak Viman', 'पुष्पक विमान'); ?></div>
                                <div style="color:#FFD48A; font-size:0.75rem;"><?php echo __t('Ram\'s Return Vehicle', 'राम की वापसी'); ?></div>
                            </div>
                            <div style="background:rgba(255,255,255,0.07); border-radius:10px; padding:15px;">
                                <div style="font-size:1.5rem;">🏆</div>
                                <div style="color:#FFD700; font-size:0.85rem; font-weight:600;"><?php echo __t('Ravan Vadh', 'रावण वध'); ?></div>
                                <div style="color:#FFD48A; font-size:0.75rem;"><?php echo __t('Evil Defeated', 'बुराई का अंत'); ?></div>
                            </div>
                            <div style="background:rgba(255,255,255,0.07); border-radius:10px; padding:15px;">
                                <div style="font-size:1.5rem;">👑</div>
                                <div style="color:#FFD700; font-size:0.85rem; font-weight:600;"><?php echo __t('Ram Rajyabhishek', 'राम राज्याभिषेक'); ?></div>
                                <div style="color:#FFD48A; font-size:0.75rem;"><?php echo __t('Coronation of Ram', 'राम का राज्याभिषेक'); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ====== SECTION 2: DEEPOTSAV ====== -->
<section class="section-padding" style="background: linear-gradient(180deg, #1A0A00 0%, #2D1500 100%);">
    <div class="container">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-label text-warning"><i class="fas fa-fire-flame-curved"></i> 🪔 <?php echo __t('Ayodhya Deepotsav', 'अयोध्या दीपोत्सव'); ?></span>
            <h2 class="section-title text-white"><?php echo __t('Deepotsav - World\'s Largest Diwali Celebration', 'दीपोत्सव - दुनिया का सबसे बड़ा दीवाली उत्सव'); ?></h2>
            <p style="color:#FFD48A; max-width:700px; margin:0 auto 40px; font-size:1.1rem; line-height:1.8;">
                <?php echo __t(
                    'Every year on Diwali, the Uttar Pradesh government organizes the grand Deepotsav at Ayodhya - a spectacular event where millions of diyas are lit along the banks of Saryu river, breaking Guinness World Records and attracting millions of visitors.',
                    'हर साल दीवाली पर, उत्तर प्रदेश सरकार अयोध्या में भव्य दीपोत्सव का आयोजन करती है - एक शानदार कार्यक्रम जहां सरयू नदी के किनारे लाखों दीये जलाए जाते हैं, गिनीज विश्व रिकॉर्ड तोड़े जाते हैं।'
                ); ?>
            </p>
        </div>
        
        <!-- World Records Timeline -->
        <div class="row justify-content-center g-4 mb-5">
            <?php
            $records = [
                ['2017', '1.71 Lakh', '1.71 लाख', 'First Deepotsav', 'पहला दीपोत्सव'],
                ['2018', '3.01 Lakh', '3.01 लाख', 'Guinness Record #1', 'गिनीज रिकॉर्ड #1'],
                ['2019', '4.10 Lakh', '4.10 लाख', 'Guinness Record #2', 'गिनीज रिकॉर्ड #2'],
                ['2021', '6 Lakh', '6 लाख', 'Post COVID Record', 'पोस्ट कोविड रिकॉर्ड'],
                ['2022', '15.76 Lakh', '15.76 लाख', 'Historic Record', 'ऐतिहासिक रिकॉर्ड'],
                ['2023', '22.23 Lakh', '22.23 लाख', 'Biggest Ever!', 'अब तक का सबसे बड़ा!'],
            ];
            foreach ($records as $i => $r):
            ?>
            <div class="col-6 col-md-4 col-lg-2" data-aos="zoom-in" data-aos-delay="<?php echo $i * 60; ?>">
                <div style="background:rgba(255,255,255,0.07); border:1px solid rgba(255,140,0,0.3); border-radius:15px; padding:20px 15px; text-align:center;">
                    <div style="color:#FFD700; font-size:1.3rem; font-weight:800;"><?php echo $r[0]; ?></div>
                    <div style="color:#fff; font-size:1.1rem; font-weight:700; margin:5px 0;"><?php echo $lang === 'hi' ? $r[2] : $r[1]; ?></div>
                    <div style="color:#FFD48A; font-size:0.75rem;"><?php echo $lang === 'hi' ? $r[4] : $r[3]; ?></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <!-- What Happens at Deepotsav -->
        <div class="row g-4">
            <?php
            $events = [
                ['🪔', 'Diya Lighting', 'दीया जलाना', 'Millions of clay diyas lit on Saryu river ghats, Ram Ki Paidi, and throughout Ayodhya city by volunteers and officials.', 'सरयू नदी के घाटों पर लाखों मिट्टी के दीये जलाए जाते हैं।'],
                ['🎭', 'Ram Leela', 'रामलीला', 'Grand Ram Leela performances with top Bollywood actors playing Ram, Sita, Hanuman, and other characters from Ramayan.', 'बॉलीवुड अभिनेताओं के साथ भव्य रामलीला प्रदर्शन।'],
                ['🎆', 'Fireworks', 'आतिशबाजी', 'Spectacular firework display over Saryu river that can be seen from miles away - a visual feast for millions of visitors.', 'सरयू नदी पर शानदार आतिशबाजी प्रदर्शन।'],
                ['🚣', 'Saryu Aarti', 'सरयू आरती', 'Grand Saryu river aarti performed by hundreds of priests simultaneously with brass diyas - a divine and moving ceremony.', 'सैकड़ों पुजारियों द्वारा एक साथ भव्य सरयू नदी आरती।'],
                ['🏛️', 'Temple Illumination', 'मंदिर रोशनी', 'All major temples including Ram Mandir, Hanumangarhi, and Kanak Bhawan are beautifully illuminated with lights and diyas.', 'राम मंदिर, हनुमानगढ़ी सहित सभी प्रमुख मंदिर रोशनी से सजते हैं।'],
                ['🎵', 'Cultural Programs', 'सांस्कृतिक कार्यक्रम', 'Classical and devotional music performances, folk dances, and religious discourses throughout the day and night.', 'शास्त्रीय और भक्ति संगीत, लोक नृत्य, धार्मिक प्रवचन।'],
            ];
            foreach ($events as $i => $ev):
            ?>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="<?php echo $i * 60; ?>">
                <div style="background:rgba(255,255,255,0.07); border:1px solid rgba(255,140,0,0.2); border-radius:15px; padding:25px;">
                    <div style="font-size:2.5rem; margin-bottom:12px;"><?php echo $ev[0]; ?></div>
                    <h4 style="color:#FFD700; font-size:1rem; margin-bottom:10px;"><?php echo $lang === 'hi' ? $ev[2] : $ev[1]; ?></h4>
                    <p style="color:#FFD48A; font-size:0.9rem; line-height:1.7; margin:0;"><?php echo $lang === 'hi' ? $ev[4] : $ev[3]; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ====== SECTION 3: HOW TO ATTEND DEEPOTSAV ====== -->
<section class="section-padding" style="background:#fff;">
    <div class="container">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-label"><i class="fas fa-calendar-check"></i> <?php echo __t('How to Attend', 'कैसे शामिल हों'); ?></span>
            <h2 class="section-title"><?php echo __t('Complete Guide to Attend Ayodhya Deepotsav', 'अयोध्या दीपोत्सव में शामिल होने की पूरी गाइड'); ?></h2>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-7" data-aos="fade-right">
                <?php
                $steps = [
                    ['1', 'Plan Well in Advance', '1 महीने पहले योजना बनाएं', 'Book trains/buses at least 1 month before Diwali. Hotels near Ram Mandir fill up extremely fast. Deepotsav is usually 1-2 days before Diwali.', 'दीवाली से कम से कम 1 महीने पहले ट्रेन/बस बुक करें। राम मंदिर के पास होटल बहुत तेजी से भरते हैं।'],
                    ['2', 'Reach Ayodhya on Deepotsav Day', 'दीपोत्सव के दिन अयोध्या पहुंचें', 'Ayodhya Dham Railway Station is 2km from Ram Mandir. Lucknow (135km) is the nearest major airport/hub. Morning arrival recommended.', 'अयोध्या धाम रेलवे स्टेशन राम मंदिर से 2 किमी है। लखनऊ (135 किमी) निकटतम प्रमुख हवाई अड्डा है।'],
                    ['3', 'Best Places to Watch Deepotsav', 'दीपोत्सव देखने की सर्वोत्तम जगहें', 'Ram Ki Paidi (main venue), Saryu river ghats, Lakshmana Ghat, Naya Ghat. Reach early (by 4 PM) to get a good spot. Massive crowds expected.', 'राम की पैड़ी (मुख्य स्थान), सरयू घाट, लक्ष्मण घाट। अच्छी जगह के लिए जल्दी पहुंचें (शाम 4 बजे तक)।'],
                    ['4', 'Do\'s & Don\'ts', 'क्या करें और क्या नहीं', 'Wear light, comfortable clothes. Carry water, small torch. No vehicles allowed near ghats after 3 PM. Follow police/security directions.', 'हल्के, आरामदायक कपड़े पहनें। पानी, छोटी टॉर्च लेकर चलें। शाम 3 बजे के बाद घाट के पास वाहन नहीं।'],
                ];
                foreach ($steps as $i => $step):
                ?>
                <div style="display:flex; gap:20px; margin-bottom:25px;" data-aos="fade-right" data-aos-delay="<?php echo $i * 60; ?>">
                    <div style="width:50px; height:50px; background:linear-gradient(135deg, #F55900, #FF8237); border-radius:50%; display:flex; align-items:center; justify-content:center; color:#fff; font-weight:800; font-size:1.2rem; flex-shrink:0;"><?php echo $step[0]; ?></div>
                    <div>
                        <h4 style="color:#333; font-size:1rem; margin-bottom:8px;"><?php echo $lang === 'hi' ? $step[2] : $step[1]; ?></h4>
                        <p style="color:#666; font-size:0.9rem; line-height:1.7; margin:0;"><?php echo $lang === 'hi' ? $step[4] : $step[3]; ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            
            <div class="col-lg-5" data-aos="fade-left">
                <div style="background:linear-gradient(135deg, #FFF3E0, #FFECD5); border-radius:20px; padding:30px; border:2px solid rgba(245,89,0,0.15);">
                    <h3 style="color:#F55900; font-size:1.2rem; margin-bottom:20px; text-align:center;">📋 <?php echo __t('Deepotsav Quick Info', 'दीपोत्सव त्वरित जानकारी'); ?></h3>
                    <?php
                    $info = [
                        ['📅', 'When', 'कब', 'Day before Diwali (Kartik Amavasya)', 'दीवाली से एक दिन पहले'],
                        ['📍', 'Where', 'कहां', 'Ram Ki Paidi, Saryu River Ghats', 'राम की पैड़ी, सरयू नदी घाट'],
                        ['🎟️', 'Entry', 'प्रवेश', 'Free (No ticket required)', 'निःशुल्क (कोई टिकट नहीं)'],
                        ['⏰', 'Time', 'समय', '3 PM - 10 PM (Diya lighting at sunset)', 'शाम 3 बजे से 10 बजे'],
                        ['🚌', 'How to Reach', 'कैसे पहुंचें', 'Train to Ayodhya Dham Jn. + Walk/E-rickshaw', 'अयोध्या धाम जंक्शन ट्रेन + पैदल/ई-रिक्शा'],
                        ['🏨', 'Stay', 'ठहरना', 'Book at least 1 month in advance', 'कम से कम 1 महीने पहले बुक करें'],
                        ['👗', 'Dress Code', 'ड्रेस कोड', 'Traditional/Ethnic preferred', 'पारंपरिक/जातीय पसंद किया जाता है'],
                        ['🌡️', 'Season', 'मौसम', 'October-November (Pleasant weather)', 'अक्टूबर-नवंबर (सुखद मौसम)'],
                    ];
                    foreach ($info as $item):
                    ?>
                    <div style="display:flex; align-items:flex-start; gap:12px; margin-bottom:14px; padding-bottom:14px; border-bottom:1px solid rgba(245,89,0,0.1);">
                        <span style="font-size:1.3rem; min-width:25px;"><?php echo $item[0]; ?></span>
                        <div>
                            <strong style="color:#F55900; font-size:0.85rem; display:block;"><?php echo $lang === 'hi' ? $item[2] : $item[1]; ?></strong>
                            <span style="color:#555; font-size:0.9rem;"><?php echo $lang === 'hi' ? $item[4] : $item[3]; ?></span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ====== SECTION 4: DIWALI SIGNIFICANCE ====== -->
<section class="section-padding" style="background: linear-gradient(135deg, #FFF8F0 0%, #FFE8CC 100%);">
    <div class="container">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-label"><i class="fas fa-om"></i> <?php echo __t('Spiritual Significance', 'आध्यात्मिक महत्व'); ?></span>
            <h2 class="section-title"><?php echo __t('Diwali - The Deep Spiritual Meaning', 'दीवाली - गहरा आध्यात्मिक अर्थ'); ?></h2>
        </div>
        <div class="row g-4">
            <?php
            $meanings = [
                ['💡', '#F55900', 'Light Over Darkness', 'अंधेरे पर प्रकाश', 'Just as Ram\'s return brought light to the dark night of Kartik Amavasya, Diwali reminds us that the light of dharma always prevails over the darkness of adharma.', 'जैसे राम की वापसी ने कार्तिक अमावस्या की अंधेरी रात में प्रकाश लाया, दीवाली हमें याद दिलाती है कि धर्म का प्रकाश हमेशा अधर्म के अंधेरे पर हावी होता है।'],
                ['⚖️', '#FF8237', 'Good Over Evil', 'बुराई पर अच्छाई', 'Ravan, despite having great power and 10 heads of wisdom, was defeated by Ram - because he had chosen the path of adharma. Diwali celebrates the eternal victory of goodness.', 'रावण, महान शक्ति और 10 सिरों के ज्ञान के बावजूद, राम से हार गया - क्योंकि उसने अधर्म का मार्ग चुना था।'],
                ['🧠', '#FFAA6E', 'Knowledge Over Ignorance', 'अज्ञान पर ज्ञान', 'Lamps lit on Diwali symbolize the lamp of knowledge that dispels the darkness of ignorance. Worshipping Goddess Saraswati alongside Lakshmi represents this.', 'दीवाली पर जलाए जाने वाले दीये ज्ञान के उस दीप का प्रतीक हैं जो अज्ञान के अंधेरे को दूर करता है।'],
                ['🏠', '#F55900', 'Joy of Homecoming', 'घर वापसी की खुशी', 'Ram\'s return after 14 years of exile teaches us the joy of reunion, the importance of family, and that no matter how long the journey, home is always the destination.', 'राम की 14 वर्ष के वनवास के बाद वापसी पुनर्मिलन की खुशी, परिवार का महत्व सिखाती है।'],
                ['💰', '#FF8237', 'Lakshmi Puja', 'लक्ष्मी पूजा', 'Diwali coincides with the beginning of the new financial year in many Hindu traditions. Goddess Lakshmi is worshipped for prosperity, wealth, and good fortune.', 'दीवाली कई हिंदू परंपराओं में नए वित्तीय वर्ष की शुरुआत के साथ मेल खाती है। समृद्धि के लिए लक्ष्मी पूजा।'],
                ['🌿', '#FFAA6E', 'New Beginnings', 'नई शुरुआत', 'Diwali marks the end of the harvest season and beginning of winter. It\'s a time to clean homes (removing old negativity), light new lamps, and begin fresh.', 'दीवाली फसल के मौसम के अंत और सर्दी की शुरुआत का प्रतीक है। घरों की सफाई, नए दीये जलाना, ताज़ी शुरुआत।'],
            ];
            foreach ($meanings as $i => $m):
            ?>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="<?php echo $i * 60; ?>">
                <div style="background:#fff; border-radius:15px; padding:25px; height:100%; box-shadow:0 5px 20px rgba(0,0,0,0.07); border-top:3px solid <?php echo $m[1]; ?>;">
                    <div style="font-size:2.5rem; margin-bottom:12px;"><?php echo $m[0]; ?></div>
                    <h4 style="color:#333; font-size:1rem; margin-bottom:10px;"><?php echo $lang === 'hi' ? $m[3] : $m[2]; ?></h4>
                    <p style="color:#666; font-size:0.9rem; line-height:1.7; margin:0;"><?php echo $lang === 'hi' ? $m[5] : $m[4]; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ====== SECTION 5: 5 DAYS OF DIWALI ====== -->
<section class="section-padding" style="background:#fff8f0;">
    <div class="container">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-label"><i class="fas fa-calendar-days"></i> <?php echo __t('5 Day Festival', '5 दिन का उत्सव'); ?></span>
            <h2 class="section-title"><?php echo __t('Diwali - 5 Days Festival Guide', 'दीवाली - 5 दिन का उत्सव गाइड'); ?></h2>
        </div>
        <div class="row g-4 justify-content-center">
            <?php
            $days = [
                ['1', '🏮', 'Day 1: Dhanteras', 'दिन 1: धनतेरस', 'Worship of Goddess Lakshmi and Lord Dhanvantari. Buy gold, silver, or new utensils for prosperity. Ayodhya: special puja at Ram Mandir.', 'लक्ष्मी और धनवंतरि पूजा। सोना, चांदी या नए बर्तन खरीदें। अयोध्या में राम मंदिर में विशेष पूजा।'],
                ['2', '🪔', 'Day 2: Choti Diwali (Naraka Chaturdashi)', 'दिन 2: छोटी दीवाली', 'Celebration of Lord Krishna\'s victory over demon Narakasura. Light diyas in the evening. In Ayodhya - preparations for Deepotsav begin.', 'कृष्ण की नरकासुर पर विजय। शाम को दीये जलाएं। अयोध्या में दीपोत्सव की तैयारी।'],
                ['3', '✨', 'Day 3: MAIN DIWALI (Kartik Amavasya)', 'दिन 3: मुख्य दीवाली', 'THE BIG DAY! Ram returns to Ayodhya. Light diyas everywhere. Lakshmi Puja. Deepotsav in Ayodhya! Exchange sweets. Fireworks. Family celebrations.', 'मुख्य दिन! राम अयोध्या लौटे। हर जगह दीये जलाएं। लक्ष्मी पूजा। अयोध्या दीपोत्सव! मिठाई बांटें।'],
                ['4', '👫', 'Day 4: Govardhan Puja / Annakoot', 'दिन 4: गोवर्धन पूजा', 'Celebration of Lord Krishna lifting Govardhan mountain. Annakoot (mountain of food) offered to deities. New year in Gujarat.', 'गोवर्धन पर्वत उठाने का उत्सव। देवताओं को अन्नकूट अर्पण। गुजरात में नया साल।'],
                ['5', '💝', 'Day 5: Bhai Dooj', 'दिन 5: भाई दूज', 'Sisters pray for their brothers\' long life and prosperity. Brothers give gifts to sisters. Like Ram-Lakshman\'s return where Shanta (Ram\'s sister) welcomed them.', 'बहनें भाइयों की दीर्घ आयु के लिए प्रार्थना। भाई बहनों को उपहार देते हैं। राम-लक्ष्मण की वापसी जैसा उत्सव।'],
            ];
            foreach ($days as $i => $day):
            ?>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="<?php echo $i * 60; ?>">
                <div style="background:#fff; border-radius:15px; overflow:hidden; box-shadow:0 5px 20px rgba(0,0,0,0.08); height:100%; <?php echo $i === 2 ? 'border:3px solid #F55900;' : ''; ?>">
                    <?php if ($i === 2): ?>
                    <div style="background:#F55900; color:#fff; text-align:center; padding:8px; font-size:0.85rem; font-weight:600;">⭐ MAIN DIWALI / मुख्य दीवाली ⭐</div>
                    <?php endif; ?>
                    <div style="padding:25px;">
                        <div style="display:flex; align-items:center; gap:15px; margin-bottom:15px;">
                            <div style="width:50px; height:50px; background:linear-gradient(135deg, #F55900, #FF8237); border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:800; color:#fff; font-size:1.1rem;"><?php echo $day[0]; ?></div>
                            <div>
                                <div style="font-size:1.5rem;"><?php echo $day[1]; ?></div>
                                <h4 style="color:#333; font-size:0.95rem; margin:0;"><?php echo $lang === 'hi' ? $day[3] : $day[2]; ?></h4>
                            </div>
                        </div>
                        <p style="color:#666; font-size:0.9rem; line-height:1.7; margin:0;"><?php echo $lang === 'hi' ? $day[5] : $day[4]; ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ====== SECTION 6: PLACES TO VISIT ON DIWALI ====== -->
<section class="section-padding" style="background: linear-gradient(180deg, #1A0A00 0%, #2D1500 100%);">
    <div class="container">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-label text-warning"><i class="fas fa-map-location-dot"></i> <?php echo __t('Must Visit Places', 'जरूर देखें'); ?></span>
            <h2 class="section-title text-white"><?php echo __t('Best Places to Visit in Ayodhya on Diwali', 'दीवाली पर अयोध्या में घूमने की सर्वोत्तम जगहें'); ?></h2>
        </div>
        <div class="row g-4">
            <?php
            $places = [
                ['🏛️', 'Ram Mandir (Ram Janmabhoomi)', 'राम मंदिर (राम जन्मभूमि)', 'The grand Ram Mandir is spectacularly illuminated on Diwali with thousands of lights and diyas. Darshan on Diwali is an experience of a lifetime. Book darshan slot online.', 'दीवाली पर राम मंदिर हजारों रोशनियों से शानदार तरीके से रोशन होता है। दर्शन ऑनलाइन बुक करें।', 'Ram Janmabhoomi, Ayodhya'],
                ['🐒', 'Hanumangarhi', 'हनुमानगढ़ी', '76 steps to this ancient Hanuman temple which is beautifully decorated on Diwali. Special aarti and prasad. Hanuman Ji is worshipped extensively on Diwali.', 'इस प्राचीन हनुमान मंदिर तक 76 सीढ़ियां। दीवाली पर विशेष आरती और प्रसाद।', 'Civil Lines, Ayodhya'],
                ['🌊', 'Ram Ki Paidi (Saryu Ghat)', 'राम की पैड़ी (सरयू घाट)', 'THE main Deepotsav venue. Millions of diyas create a breathtaking view on Saryu\'s banks. Grand Saryu Aarti performed by hundreds of priests. Arrive by 4 PM.', 'मुख्य दीपोत्सव स्थल। सरयू किनारे लाखों दीये अद्भुत नजारा बनाते हैं। शाम 4 बजे तक पहुंचें।', 'Ram Ki Paidi, Saryu, Ayodhya'],
                ['👑', 'Kanak Bhawan', 'कनक भवन', 'The golden palace gifted by Mata Kaikeyi to Sita on her wedding. Diwali puja here is especially significant. Beautiful lighting and floral decorations.', 'माता कैकेयी द्वारा सीता को विवाह पर उपहार में दिया गया स्वर्ण महल। यहां दीवाली पूजा विशेष रूप से महत्वपूर्ण है।', 'Kanak Bhawan, Ayodhya'],
                ['🏠', 'Dashrath Mahal', 'दशरथ महल', 'The ancient palace of King Dashrath. On Diwali, it represents the welcome Ram received after returning from exile. Special Ram Rajyabhishek reenactment.', 'राजा दशरथ का प्राचीन महल। दीवाली पर राम राज्याभिषेक का विशेष मंचन।', 'Dashrath Mahal, Ayodhya'],
                ['🌿', 'Lakshman Ghat', 'लक्ष्मण घाट', 'Named after Lakshman. Beautiful and relatively less crowded ghat on the Saryu river. Great view of the Deepotsav celebrations. Evening boat rides available.', 'लक्ष्मण के नाम पर। सरयू नदी पर सुंदर घाट। शाम की नाव सवारी उपलब्ध।', 'Lakshman Ghat, Saryu, Ayodhya'],
            ];
            foreach ($places as $i => $place):
            ?>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="<?php echo $i * 60; ?>">
                <div style="background:rgba(255,255,255,0.07); border:1px solid rgba(255,140,0,0.2); border-radius:15px; padding:25px; height:100%;">
                    <div style="font-size:2.5rem; margin-bottom:12px;"><?php echo $place[0]; ?></div>
                    <h4 style="color:#FFD700; font-size:1rem; margin-bottom:8px;"><?php echo $lang === 'hi' ? $place[2] : $place[1]; ?></h4>
                    <p style="color:#FFD48A; font-size:0.9rem; line-height:1.7; margin-bottom:10px;"><?php echo $lang === 'hi' ? $place[4] : $place[3]; ?></p>
                    <span style="color:rgba(255,212,138,0.6); font-size:0.8rem;"><i class="fas fa-map-marker-alt"></i> <?php echo $place[5]; ?></span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ====== FAQ SECTION ====== -->
<section class="section-padding" style="background:#fff8f0;">
    <div class="container">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-label"><i class="fas fa-question-circle"></i> <?php echo __t('FAQs', 'प्रश्नोत्तर'); ?></span>
            <h2 class="section-title"><?php echo __t('Diwali Ayodhya - Frequently Asked Questions', 'दीवाली अयोध्या - अक्सर पूछे जाने वाले प्रश्न'); ?></h2>
        </div>
        <div style="max-width:800px; margin:0 auto;">
            <?php
            $faqs = [
                ['Q: अयोध्या में दीवाली कब होती है?', 'Q: When is Diwali in Ayodhya?', 'A: दीवाली हर साल कार्तिक अमावस्या को होती है (अक्टूबर-नवंबर में)। दीपोत्सव कार्यक्रम आमतौर पर दीवाली से 1-2 दिन पहले आयोजित होता है।', 'A: Diwali happens every year on Kartik Amavasya (October-November). The Deepotsav event is usually organized 1-2 days before Diwali.'],
                ['Q: दीपोत्सव में कितने दीये जलते हैं?', 'Q: How many diyas are lit at Deepotsav?', 'A: हर साल रिकॉर्ड टूटता है। 2023 में 22.23 लाख (2.2 मिलियन) दीये जलाए गए थे। 2024 में 25+ लाख का लक्ष्य था।', 'A: The record breaks every year. In 2023, 22.23 lakh (2.2 million) diyas were lit. 2024 had a target of 25+ lakh.'],
                ['Q: दीपोत्सव के लिए टिकट चाहिए?', 'Q: Do you need tickets for Deepotsav?', 'A: नहीं, दीपोत्सव में प्रवेश बिल्कुल मुफ्त है। राम की पैड़ी और सरयू घाट सभी के लिए खुले हैं।', 'A: No, entry to Deepotsav is completely free. Ram Ki Paidi and Saryu Ghats are open to all.'],
                ['Q: अयोध्या में दीवाली पर कहां ठहरें?', 'Q: Where to stay in Ayodhya during Diwali?', 'A: होटल, धर्मशाला, गेस्टहाउस 1-2 महीने पहले बुक हो जाते हैं। नजदीकी विकल्प: लखनऊ (135 किमी) या फैजाबाद।', 'A: Hotels, dharamshalas, and guesthouses get booked 1-2 months in advance. Nearby option: Lucknow (135km) or Faizabad.'],
                ['Q: दीपोत्सव देखने का सबसे अच्छा स्थान कौन सा है?', 'Q: What is the best place to see Deepotsav?', 'A: राम की पैड़ी मुख्य स्थल है। जल्दी पहुंचें (शाम 4 बजे तक)। नया घाट और लक्ष्मण घाट भी बेहतरीन नजारा देते हैं।', 'A: Ram Ki Paidi is the main venue. Arrive early (by 4 PM). Naya Ghat and Lakshman Ghat also offer great views.'],
            ];
            foreach ($faqs as $i => $faq):
            ?>
            <div style="background:#fff; border-radius:12px; padding:20px 25px; margin-bottom:15px; box-shadow:0 3px 15px rgba(0,0,0,0.07);" data-aos="fade-up">
                <h4 style="color:#F55900; font-size:1rem; margin-bottom:10px;"><?php echo $lang === 'hi' ? $faq[0] : $faq[1]; ?></h4>
                <p style="color:#555; line-height:1.8; margin:0; font-size:0.95rem;"><?php echo $lang === 'hi' ? $faq[2] : $faq[3]; ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA -->
<section style="background: linear-gradient(135deg, #F55900, #FF8237); padding:60px 0; text-align:center;">
    <div class="container">
        <h2 style="color:#fff; font-size:clamp(1.5rem,4vw,2.5rem); margin-bottom:15px;">🪔 <?php echo __t('Plan Your Ayodhya Diwali Visit Today!', 'आज ही अयोध्या दीवाली यात्रा की योजना बनाएं!'); ?></h2>
        <p style="color:rgba(255,255,255,0.9); margin-bottom:30px; font-size:1.1rem;"><?php echo __t('Witnessing Deepotsav in Ayodhya is a life-changing spiritual experience', 'अयोध्या में दीपोत्सव देखना एक जीवन बदलने वाला आध्यात्मिक अनुभव है'); ?></p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <a href="<?php echo SITE_URL; ?>/ayodhya-guide" class="btn btn-light btn-lg px-5 fw-bold">
                <i class="fas fa-map-location-dot"></i> <?php echo __t('Ayodhya Travel Guide', 'अयोध्या यात्रा गाइड'); ?>
            </a>
            <a href="<?php echo SITE_URL; ?>/ram-vanvas-14-varsh" class="btn btn-outline-light btn-lg px-5">
                🌿 <?php echo __t('14 Varsh Vanvas Story', '14 वर्ष वनवास कथा'); ?>
            </a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

<style>
@keyframes float { 0%,100%{transform:translateY(0) rotate(0deg)} 50%{transform:translateY(-20px) rotate(5deg)} }
</style>
