<?php
/**
 * Ayodhya Ram Mandir - Ram Vanvas 14 Varsh - Complete Journey
 * 14 Year Exile Journey of Lord Ram - All Stops with Images
 * 3000+ words SEO optimized page
 */

$pageType = 'page';
$pageSlug = 'ram-vanvas-14-varsh';
$pageTitle = 'राम का 14 वर्ष वनवास - सम्पूर्ण यात्रा | Ram 14 Varsh Vanvas Complete Guide - AyodhyaRamMandir.in';

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/functions.php';

$lang = getCurrentLang();

$pageSchema = json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Article',
    'headline' => 'राम का 14 वर्ष वनवास - सम्पूर्ण यात्रा गाइड',
    'description' => 'भगवान राम का 14 वर्ष का वनवास - सभी पड़ाव, घटनाएं और स्थान। Shri Ram 14 years of forest exile complete journey with all stops.',
    'url' => SITE_URL . '/ram-vanvas-14-varsh',
    'image' => SITE_URL . '/assets/images/shree-ram.jpg',
    'author' => ['@type' => 'Organization', 'name' => 'AyodhyaRamMandir.in'],
    'publisher' => ['@type' => 'Organization', 'name' => 'AyodhyaRamMandir.in', 'url' => SITE_URL],
    'datePublished' => '2024-01-22',
    'dateModified' => date('Y-m-d'),
    'inLanguage' => ['hi', 'en'],
    'about' => [['@type' => 'Thing', 'name' => 'Ram Vanvas'], ['@type' => 'Thing', 'name' => 'Ramayan']]
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include __DIR__ . '/includes/header.php';
?>

<!-- Page Hero -->
<section style="background: linear-gradient(135deg, #0D2B0D 0%, #1A4A1A 50%, #2D7A2D 100%); padding: 100px 0 60px; position:relative; overflow:hidden;">
    <div style="position:absolute;top:0;left:0;right:0;bottom:0; background:url('assets/images/shree-ram.jpg') center/cover; opacity:0.15;"></div>
    <div class="container text-center" style="position:relative;z-index:2;">
        <div data-aos="fade-down">
            <span style="background:rgba(77,175,74,0.2); color:#a8d5a8; padding:8px 20px; border-radius:30px; font-size:13px; letter-spacing:2px; text-transform:uppercase;">🌿 राम वनवास | Ram Vanvas</span>
            <h1 style="color:#fff; font-size:clamp(1.8rem,5vw,3rem); font-weight:800; margin:20px 0 15px; font-family:'Noto Serif Devanagari',serif;">
                <?php echo __t('Ram Ka 14 Varsh Vanvas - Sampoorna Yatra', 'राम का 14 वर्ष वनवास - सम्पूर्ण यात्रा'); ?>
            </h1>
            <p style="color:#a8d5a8; font-size:1.1rem; max-width:750px; margin:0 auto 20px;">
                <?php echo __t(
                    'Complete journey of Lord Ram\'s 14 years of forest exile - every stop, every event, every place from Ayodhya to Lanka and back',
                    'भगवान राम के 14 वर्ष के वनवास की सम्पूर्ण यात्रा - अयोध्या से लंका और वापसी तक हर पड़ाव, हर घटना, हर स्थान'
                ); ?>
            </p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center" style="background:none;">
                    <li class="breadcrumb-item"><a href="<?php echo SITE_URL; ?>/" style="color:#a8d5a8;">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo SITE_URL; ?>/ramayan" style="color:#a8d5a8;">Ramayan</a></li>
                    <li class="breadcrumb-item active" style="color:#fff;">14 Varsh Vanvas</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Floating leaves animation -->
    <div style="position:absolute; top:20px; right:20px; font-size:3rem; opacity:0.3; animation:float 3s ease-in-out infinite;">🌿</div>
    <div style="position:absolute; bottom:40px; left:20px; font-size:2rem; opacity:0.2; animation:float 4s ease-in-out infinite 1s;">🍃</div>
</section>

<!-- ====== INTRO SECTION ====== -->
<section class="section-padding" style="background:#f9fff9;">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-7" data-aos="fade-right">
                <span class="section-label" style="color:#2D7A2D; background:rgba(45,122,45,0.1);"><i class="fas fa-tree"></i> <?php echo __t('The Great Exile', 'महान वनवास'); ?></span>
                <h2 style="font-size:clamp(1.5rem,4vw,2.5rem); color:#1A4A1A; font-weight:800; margin-bottom:20px; font-family:'Noto Serif Devanagari',serif;">
                    <?php echo __t('Why Did Ram Go to Vanvas? (14 Years Forest Exile)', 'राम वनवास क्यों गए? (14 वर्ष वन यात्रा)'); ?>
                </h2>
                <p style="color:#444; line-height:2; font-size:1.05rem; margin-bottom:15px;">
                    <?php echo __t(
                        'When King Dashrath was preparing for Ram\'s coronation as the next king of Ayodhya, Queen Kaikeyi demanded two boons she had been promised long ago. She demanded that her son Bharat be made king instead of Ram, and that Ram be exiled to the forest for 14 years.',
                        'जब राजा दशरथ राम के अयोध्या के अगले राजा के रूप में राज्याभिषेक की तैयारी कर रहे थे, रानी कैकेयी ने दो वरदान मांगे जो बहुत पहले दिए गए थे। उन्होंने मांग की कि राम की जगह उनके पुत्र भरत को राजा बनाया जाए और राम को 14 वर्ष के लिए वन में भेजा जाए।'
                    ); ?>
                </p>
                <p style="color:#444; line-height:2; font-size:1.05rem; margin-bottom:15px;">
                    <?php echo __t(
                        'Ram, the ideal son (Maryada Purushottam), accepted this command with a smile, maintaining his father\'s honor and the sacred tradition of "Raghukul Reet" - "Pran Jaye Par Vachan Na Jaye" (Life may go but word shall not be broken). Without any complaint or anger, Ram immediately prepared for forest life.',
                        'राम, आदर्श पुत्र (मर्यादा पुरुषोत्तम), ने मुस्कुराते हुए यह आज्ञा स्वीकार की, अपने पिता के सम्मान और रघुकुल की पवित्र परंपरा को बनाए रखा - "प्राण जाए पर वचन न जाए"। बिना किसी शिकायत या क्रोध के, राम ने तुरंत वन जीवन की तैयारी की।'
                    ); ?>
                </p>
                <p style="color:#444; line-height:2; font-size:1.05rem; margin-bottom:25px;">
                    <?php echo __t(
                        'Mata Sita, being the ideal wife (Pativrata), refused to stay in the palace and insisted on accompanying Ram into the forest. Younger brother Lakshman also would not hear of Ram going alone and joined them. Thus began one of the most profound journeys in Hindu history - 14 years that would change the world.',
                        'माता सीता, आदर्श पत्नी (पतिव्रता) होने के नाते, महल में रहने से इनकार कर दिया और वन में राम के साथ जाने पर जोर दिया। छोटे भाई लक्ष्मण ने भी राम को अकेले जाते नहीं सुना और उनके साथ चले। इस प्रकार हिंदू इतिहास की सबसे गहन यात्राओं में से एक शुरू हुई - 14 वर्ष जो दुनिया बदल देंगे।'
                    ); ?>
                </p>
                <div class="row g-3">
                    <?php
                    $facts = [
                        ['🗓️', '14 Varsh', '14 वर्ष', 'Duration of Exile', 'वनवास की अवधि'],
                        ['👣', '3 Persons', '3 व्यक्ति', 'Ram, Sita, Lakshman', 'राम, सीता, लक्ष्मण'],
                        ['🌿', '7 Kand', '7 कांड', 'In Ramayan', 'रामायण में'],
                        ['🗺️', '12+ Places', '12+ स्थान', 'Major Stops', 'प्रमुख पड़ाव'],
                    ];
                    foreach ($facts as $f):
                    ?>
                    <div class="col-6">
                        <div style="background:#fff; border-radius:12px; padding:15px; text-align:center; border:2px solid rgba(45,122,45,0.15); box-shadow:0 3px 10px rgba(0,0,0,0.05);">
                            <div style="font-size:2rem; margin-bottom:5px;"><?php echo $f[0]; ?></div>
                            <div style="font-size:1.3rem; font-weight:800; color:#2D7A2D;"><?php echo $lang === 'hi' ? $f[2] : $f[1]; ?></div>
                            <div style="font-size:0.8rem; color:#666;"><?php echo $lang === 'hi' ? $f[4] : $f[3]; ?></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-lg-5" data-aos="fade-left">
                <div style="position:relative; border-radius:20px; overflow:hidden; box-shadow:0 20px 50px rgba(0,0,0,0.25);">
                    <img src="assets/images/shree-ram.jpg" alt="Shri Ram Vanvas" class="img-fluid w-100">
                    <div style="position:absolute;bottom:0;left:0;right:0; background:linear-gradient(to top, rgba(13,43,13,0.9), transparent); padding:30px 20px 20px;">
                        <p style="color:#a8d5a8; font-style:italic; font-size:1rem; margin:0; text-align:center;">
                            "<?php echo __t('Pran Jaye Par Vachan Na Jaye - Raghukul Reet', 'प्राण जाए पर वचन न जाए - रघुकुल रीत'); ?>"
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ====== 14 STOPS JOURNEY SECTION ====== -->
<section class="section-padding" style="background: linear-gradient(180deg, #0D2B0D 0%, #1A4A1A 100%);">
    <div class="container">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-label" style="color:#a8d5a8; background:rgba(168,213,168,0.1);"><i class="fas fa-map-marked-alt"></i> <?php echo __t('Complete Journey Map', 'सम्पूर्ण यात्रा मानचित्र'); ?></span>
            <h2 style="color:#fff; font-size:clamp(1.5rem,4vw,2.5rem); font-weight:800; margin-bottom:15px;">
                <?php echo __t('14 Varsh Vanvas - Ek Ek Padav (Every Stop)', '14 वर्ष वनवास - एक एक पड़ाव'); ?>
            </h2>
            <p style="color:#a8d5a8; max-width:700px; margin:0 auto 40px; font-size:1rem; line-height:1.8;">
                <?php echo __t('From Ayodhya to Lanka and back - complete detailed journey with every important stop, event, and divine happening', 'अयोध्या से लंका और वापसी - हर महत्वपूर्ण पड़ाव, घटना और दिव्य प्रसंग के साथ सम्पूर्ण विस्तृत यात्रा'); ?>
            </p>
        </div>

        <?php
        $stops = [
            [
                'num' => '01',
                'name' => 'Ayodhya - Vanvas Ki Vidaai',
                'name_hi' => 'अयोध्या - वनवास की विदाई',
                'state' => 'Uttar Pradesh',
                'image' => 'ayodhya-nagri.jpg',
                'desc' => 'The journey began when Ram, Sita, and Lakshman left the glittering palace of Ayodhya in simple forest clothes. Citizens of Ayodhya wept and many followed them to the edge of the city. Ram convinced them to return and proceeded on his sacred duty. King Dashrath died of grief shortly after.',
                'desc_hi' => 'यात्रा तब शुरू हुई जब राम, सीता और लक्ष्मण साधारण वन वस्त्रों में अयोध्या का चमकता महल छोड़ा। अयोध्या के नागरिक रोए और कई लोग शहर की सीमा तक उनके पीछे गए। राम ने उन्हें वापस लौटने के लिए मनाया। राजा दशरथ की शोक में जल्द ही मृत्यु हो गई।',
                'events' => ['Vidaai from Ayodhya', 'Citizens follow Ram', 'Dashrath Mrityu'],
                'events_hi' => ['अयोध्या से विदाई', 'नागरिक राम के पीछे', 'दशरथ मृत्यु'],
                'kand' => 'Ayodhya Kand',
            ],
            [
                'num' => '02',
                'name' => 'Shringaverapura - Guha Ka Milan',
                'name_hi' => 'श्रृंगवेरपुर - गुह का मिलान',
                'state' => 'Uttar Pradesh (near Prayagraj)',
                'image' => 'ram-silhouette.jpg',
                'desc' => 'At Shringaverapura (modern Singraur near Allahabad), Ram met Guha, the king of Nishad community, who was a great devotee. Guha arranged a boat to cross the Ganga river. Here Ram sent Sumantra (charioteer) and the chariot back to Ayodhya. Ram, Sita, and Lakshman crossed Ganga on foot and by boat.',
                'desc_hi' => 'श्रृंगवेरपुर (आधुनिक सिंगरौर, इलाहाबाद के पास) में, राम ने निषाद समुदाय के राजा गुह से मिले, जो एक महान भक्त थे। गुह ने गंगा नदी पार करने के लिए नाव की व्यवस्था की। यहां राम ने सुमंत्र (सारथी) और रथ को अयोध्या वापस भेजा। राम, सीता और लक्ष्मण पैदल और नाव से गंगा पार किए।',
                'events' => ['Met Nishad King Guha', 'Crossed Ganga River', 'Sent chariot back to Ayodhya'],
                'events_hi' => ['निषाद राज गुह से मिलन', 'गंगा नदी पार', 'रथ वापस अयोध्या'],
                'kand' => 'Ayodhya Kand',
            ],
            [
                'num' => '03',
                'name' => 'Prayag - Bhardwaj Ashram',
                'name_hi' => 'प्रयाग - भरद्वाज आश्रम',
                'state' => 'Uttar Pradesh (Allahabad)',
                'image' => 'ram-sita-hanuman-laxman.jpg',
                'desc' => 'At Prayag (Allahabad), at the Triveni Sangam (confluence of Ganga, Yamuna, and Saraswati), Ram visited the ashram of great sage Bharadvaj. The sage welcomed them warmly and guided them for their forest life. He advised Ram to stay at Chitrakoot as the ideal place for forest dwelling.',
                'desc_hi' => 'प्रयाग (इलाहाबाद) में त्रिवेणी संगम (गंगा, यमुना और सरस्वती के संगम) पर, राम ने महान ऋषि भरद्वाज के आश्रम का दौरा किया। ऋषि ने उनका गर्मजोशी से स्वागत किया और वन जीवन के लिए मार्गदर्शन दिया। उन्होंने राम को वन निवास के लिए आदर्श स्थान के रूप में चित्रकूट में रहने की सलाह दी।',
                'events' => ['Bharadvaj Ashram visit', 'Guidance for forest life', 'Valmiki Ashram nearby'],
                'events_hi' => ['भरद्वाज आश्रम भ्रमण', 'वन जीवन का मार्गदर्शन', 'पास में वाल्मीकि आश्रम'],
                'kand' => 'Ayodhya Kand',
            ],
            [
                'num' => '04',
                'name' => 'Chitrakoot - 11 Years Stay',
                'name_hi' => 'चित्रकूट - 11 वर्ष का निवास',
                'state' => 'Madhya Pradesh / Uttar Pradesh border',
                'image' => 'ayodhya-mandir.jpg',
                'desc' => 'Chitrakoot was Ram\'s most important stop where they spent about 11 years! Here the famous "Bharat Milap" took place when Bharat came with all Ayodhyavasis to request Ram to return. But Ram refused to break the dharma of the 14-year exile. Bharat took Ram\'s padukas (sandals) and placed them on the throne, ruling as regent. Ram also met many great sages here including Atri, Anasuya, and Agastya.',
                'desc_hi' => 'चित्रकूट राम का सबसे महत्वपूर्ण पड़ाव था जहां उन्होंने लगभग 11 वर्ष बिताए! यहां प्रसिद्ध "भरत मिलाप" हुआ जब भरत सभी अयोध्यावासियों के साथ राम से वापस लौटने का अनुरोध करने आए। लेकिन राम ने 14 वर्ष के वनवास के धर्म को तोड़ने से इनकार कर दिया। भरत ने राम की पादुकाएं ली और उन्हें सिंहासन पर रखकर प्रतिनिधि के रूप में शासन किया।',
                'events' => ['Bharat Milap', 'Sage Atri & Anasuya visit', 'Agastya Muni ashram', '11 years of peaceful life'],
                'events_hi' => ['भरत मिलाप', 'ऋषि अत्रि और अनुसूया भ्रमण', 'अगस्त्य मुनि आश्रम', '11 वर्ष का शांतिपूर्ण जीवन'],
                'kand' => 'Ayodhya Kand',
            ],
            [
                'num' => '05',
                'name' => 'Dandakaranya - The Dense Forest',
                'name_hi' => 'दंडकारण्य - घना वन',
                'state' => 'Central India (MP, Chhattisgarh, Odisha, Telangana)',
                'image' => 'ram-silhouette2.jpg',
                'desc' => 'After Chitrakoot, Ram moved into the vast Dandakaranya forest region covering modern Madhya Pradesh, Chhattisgarh, Odisha and Telangana. Here they visited many sage ashrams and Ram killed numerous demons (rakshasas) who were terrorizing the sages. Notable events: killed demon Viradha, met sage Sharabhanga who gave up his body, met Sutikshna Muni, and killed Khara-Dushan (Surpanakha\'s brothers) with their army of 14,000 demons.',
                'desc_hi' => 'चित्रकूट के बाद, राम आधुनिक मध्यप्रदेश, छत्तीसगढ़, ओडिशा और तेलंगाना को कवर करने वाले विशाल दंडकारण्य वन क्षेत्र में चले गए। यहां उन्होंने कई ऋषि आश्रमों का दौरा किया और राम ने कई राक्षसों को मारा जो ऋषियों को आतंकित कर रहे थे। उल्लेखनीय घटनाएं: राक्षस विराध का वध, शरभंग ऋषि से मिलन, सुतीक्ष्ण मुनि, और 14,000 राक्षसों की सेना के साथ खर-दूषण (शूर्पणखा के भाइयों) का वध।',
                'events' => ['Killed demon Viradha', 'Met Sage Sharabhanga', 'Killed Khara-Dushan & 14,000 demons', 'Protected sages\' ashrams'],
                'events_hi' => ['राक्षस विराध का वध', 'शरभंग ऋषि से मिलन', 'खर-दूषण और 14,000 राक्षसों का वध', 'ऋषियों के आश्रमों की रक्षा'],
                'kand' => 'Aranya Kand',
            ],
            [
                'num' => '06',
                'name' => 'Panchvati (Nashik) - Sita Haran',
                'name_hi' => 'पंचवटी (नासिक) - सीता हरण',
                'state' => 'Maharashtra (Nashik)',
                'image' => 'mata-sita.jpg',
                'desc' => 'Panchvati on the banks of Godavari River (modern Nashik, Maharashtra) was one of the most dramatic locations of the vanvas. Ram built a beautiful cottage here. Surpanakha (Ravan\'s sister) was attracted to Ram, was rejected, and had her nose cut by Lakshman. Ravan then plotted revenge - sent Marich as a golden deer to lure Ram away. While Ram chased the deer and Lakshman went to help Ram, Ravan abducted Sita in the form of a hermit. The tragic Sita Haran happened at Panchvati.',
                'desc_hi' => 'गोदावरी नदी के किनारे पंचवटी (आधुनिक नासिक, महाराष्ट्र) वनवास के सबसे नाटकीय स्थानों में से एक था। राम ने यहां एक सुंदर कुटिया बनाई। शूर्पणखा (रावण की बहन) राम से आकर्षित हुई, अस्वीकृत हुई, और लक्ष्मण ने उसकी नाक काट दी। तब रावण ने बदला लेने की योजना बनाई - राम को दूर ले जाने के लिए मारीच को सोने के हिरण के रूप में भेजा। जबकि राम हिरण का पीछा कर रहे थे और लक्ष्मण राम की मदद के लिए गए, रावण ने साधु के वेश में सीता का अपहरण किया।',
                'events' => ['Built cottage on Godavari banks', 'Surpanakha incident', 'Golden Deer (Marich) trap', 'SITA HARAN by Ravan', 'Jatayu tried to save Sita'],
                'events_hi' => ['गोदावरी किनारे कुटिया निर्माण', 'शूर्पणखा प्रसंग', 'सोने का हिरण (मारीच) जाल', 'रावण द्वारा सीता हरण', 'जटायु ने सीता को बचाने की कोशिश की'],
                'kand' => 'Aranya Kand',
            ],
            [
                'num' => '07',
                'name' => 'Jatayu Mrityu & Shabri Ashram',
                'name_hi' => 'जटायु मृत्यु और शबरी आश्रम',
                'state' => 'Maharashtra / Karnataka border',
                'image' => 'ram-silhouette.jpg',
                'desc' => 'After Sita\'s abduction, Ram and Lakshman searched desperately. They found Jatayu (the divine eagle king) mortally wounded - he had fought bravely with Ravan to save Sita. Jatayu told Ram that Ravan had taken Sita south. Ram performed the last rites of Jatayu with the same respect as a son would for a father. Then they reached Shabri\'s ashram - the devoted woman who tasted each berry before offering to Ram. Ram\'s acceptance of Shabri\'s tasted berries is one of the most moving examples of devotee\'s love.',
                'desc_hi' => 'सीता के अपहरण के बाद, राम और लक्ष्मण बेताबी से खोज करने लगे। उन्होंने जटायु (दिव्य गरुड़ राजा) को घातक रूप से घायल पाया - उसने सीता को बचाने के लिए रावण से बहादुरी से लड़ा था। जटायु ने राम को बताया कि रावण सीता को दक्षिण ले गया है। राम ने जटायु का अंतिम संस्कार उसी सम्मान के साथ किया जैसे एक पुत्र पिता के लिए करता है। फिर वे शबरी के आश्रम पहुंचे - वह भक्त महिला जो राम को अर्पित करने से पहले प्रत्येक बेर चखती थी।',
                'events' => ['Met dying Jatayu', 'Jatayu\'s last rites by Ram', 'Shabri\'s tasted berries for Ram', 'Learned Sita is in Lanka'],
                'events_hi' => ['मरते हुए जटायु से मिलन', 'राम द्वारा जटायु का अंतिम संस्कार', 'शबरी के चखे हुए बेर', 'जाना कि सीता लंका में है'],
                'kand' => 'Aranya Kand',
            ],
            [
                'num' => '08',
                'name' => 'Kishkindha - Hanuman Milan',
                'name_hi' => 'किष्किंधा - हनुमान मिलान',
                'state' => 'Karnataka (near Hampi/Hospet)',
                'image' => 'hanuman-parvat.jpg',
                'desc' => 'Kishkindha (near modern Hampi, Karnataka) was one of the most pivotal stops. Here Ram met Hanuman Ji, who was in disguise. Hanuman immediately recognized Ram as the divine Lord. Ram and Sugreev formed an alliance - Ram killed Vali (Sugreev\'s brother who had usurped his kingdom) and restored Sugreev as king. In return, Sugreev promised to use the entire Vanar Sena (monkey army) to find and rescue Sita. Hanuman Ji was identified as the one who could reach Lanka.',
                'desc_hi' => 'किष्किंधा (आधुनिक हम्पी, कर्नाटक के पास) सबसे महत्वपूर्ण पड़ावों में से एक था। यहां राम ने हनुमान जी से मिले, जो भेष में थे। हनुमान ने तुरंत राम को दिव्य प्रभु के रूप में पहचाना। राम और सुग्रीव ने गठबंधन बनाया - राम ने वाली (सुग्रीव के भाई जिसने उनका राज्य हड़प लिया था) को मारा और सुग्रीव को राजा बहाल किया। बदले में, सुग्रीव ने सीता को खोजने और बचाने के लिए पूरी वानर सेना का उपयोग करने का वचन दिया।',
                'events' => ['HANUMAN JI MILAN - Most sacred moment', 'Ram-Sugreev alliance', 'Vali Vadh by Ram', 'Formation of Vanar Sena (Monkey Army)', 'Hanuman chosen to find Sita'],
                'events_hi' => ['हनुमान जी मिलान - सबसे पवित्र क्षण', 'राम-सुग्रीव गठबंधन', 'राम द्वारा वाली वध', 'वानर सेना का गठन', 'हनुमान को सीता खोजने के लिए चुना गया'],
                'kand' => 'Kishkindha Kand',
            ],
            [
                'num' => '09',
                'name' => 'Hanuman Lanka Yatra - Sita Khoj',
                'name_hi' => 'हनुमान लंका यात्रा - सीता खोज',
                'state' => 'Sri Lanka (Lanka)',
                'image' => 'panchmukhi-hanuman.jpg',
                'desc' => 'Hanuman Ji\'s journey to Lanka was miraculous. He leaped across the ocean (96 miles), encountered obstacles like Sursa, Simhika, and reached Lanka. In Lanka\'s Ashoka Vatika, he found Sita Ji being guarded by rakshasis. He gave her Ram\'s ring as proof and received Sita\'s Chudamani (jewel) to take back to Ram. Then came Lanka Dahan - Hanuman allowed himself to be captured, his tail was set on fire. Hanuman used this burning tail to set Lanka ablaze, destroying a large part of Ravan\'s capital.',
                'desc_hi' => 'हनुमान जी की लंका यात्रा चमत्कारी थी। उन्होंने समुद्र पार कूद (96 मील), सुरसा, सिंहिका जैसी बाधाओं का सामना किया और लंका पहुंचे। लंका के अशोक वाटिका में, उन्होंने सीता जी को राक्षसियों द्वारा पहरे में पाया। उन्होंने सीता को प्रमाण के रूप में राम की अंगूठी दी और राम को वापस ले जाने के लिए सीता की चूड़ामणि (गहना) प्राप्त किया। फिर आया लंका दहन।',
                'events' => ['Hanuman leaps across ocean', 'Found Sita in Ashoka Vatika', 'Gave Ram\'s ring to Sita', 'Got Sita\'s Chudamani', 'LANKA DAHAN - Burned Lanka'],
                'events_hi' => ['हनुमान समुद्र पार छलांग', 'अशोक वाटिका में सीता मिली', 'सीता को राम की अंगूठी दी', 'सीता की चूड़ामणि ली', 'लंका दहन - लंका जलाई'],
                'kand' => 'Sundar Kand',
            ],
            [
                'num' => '10',
                'name' => 'Rameshwaram - Ram Setu Nirman',
                'name_hi' => 'रामेश्वरम - राम सेतु निर्माण',
                'state' => 'Tamil Nadu',
                'image' => 'ram-setu.jpg',
                'desc' => 'At Rameshwaram, before crossing to Lanka, Ram worshipped Lord Shiva (installed the Rameshwar Jyotirlinga). Then the great engineering marvel of Ram Setu (Adam\'s Bridge) was built. The entire Vanar Sena participated - monkeys floated stones in the sea with Ram\'s name written on them. Neel and Nala (who had a boon that anything they touched would float) led the construction. A bridge of 96 miles was built across the ocean in just 5 days!',
                'desc_hi' => 'रामेश्वरम में, लंका पार करने से पहले, राम ने भगवान शिव की पूजा की (रामेश्वर ज्योतिर्लिंग स्थापित किया)। फिर राम सेतु (एडम्स ब्रिज) का महान इंजीनियरिंग चमत्कार बनाया गया। पूरी वानर सेना ने भाग लिया - बंदरों ने समुद्र में पत्थर तैराए जिन पर राम का नाम लिखा था। 96 मील का पुल केवल 5 दिनों में बनाया गया!',
                'events' => ['Worshipped Lord Shiva at Rameshwaram', 'RAM SETU construction begins', 'Stones float with Ram\'s name', 'Bridge completed in 5 days', 'Vanar Sena crosses to Lanka'],
                'events_hi' => ['रामेश्वरम में भगवान शिव की पूजा', 'राम सेतु निर्माण शुरू', 'राम के नाम से पत्थर तैरते हैं', '5 दिनों में पुल पूरा', 'वानर सेना लंका पार'],
                'kand' => 'Lanka Kand (Yuddha Kand)',
            ],
            [
                'num' => '11',
                'name' => 'Lanka Yudh - Ravan Vadh',
                'name_hi' => 'लंका युद्ध - रावण वध',
                'state' => 'Sri Lanka (Lanka)',
                'image' => 'ram-ravan-yudh.jpg',
                'desc' => 'The epic war in Lanka lasted for several days. Many great warriors fell on both sides. Key events: Hanuman brought the Sanjeevani herb to save Lakshman who was struck by Meghnad\'s arrow. Finally, Ram and Ravan faced each other. Despite Ravan\'s many heads being cut and regrowing, Ram struck a divine Brahmastra arrow into Ravan\'s navel, destroying him. Vibhishan (Ravan\'s virtuous brother) was made the new king of Lanka. Sita was rescued and Agni Pariksha took place.',
                'desc_hi' => 'लंका में महायुद्ध कई दिनों तक चला। दोनों पक्षों के कई महान योद्धा शहीद हुए। मुख्य घटनाएं: हनुमान ने संजीवनी बूटी लाई जब लक्ष्मण मेघनाद के बाण से मूर्छित हुए। अंत में राम और रावण आमने सामने हुए। रावण के कई सिर कटने और पुनर्जीवित होने के बावजूद, राम ने दिव्य ब्रह्मास्त्र रावण की नाभि में मारा, उसे नष्ट किया। विभीषण (रावण के धर्मी भाई) को लंका का नया राजा बनाया। सीता मुक्त हुईं।',
                'events' => ['Epic war begins', 'Lakshman falls unconscious', 'Sanjeevani herb by Hanuman', 'RAVAN VADH by Ram', 'Sita rescued', 'Agni Pariksha of Sita', 'Vibhishan made King of Lanka'],
                'events_hi' => ['महायुद्ध शुरू', 'लक्ष्मण मूर्छित', 'हनुमान संजीवनी बूटी', 'राम द्वारा रावण वध', 'सीता मुक्त', 'सीता की अग्नि परीक्षा', 'विभीषण लंका के राजा'],
                'kand' => 'Lanka Kand (Yuddha Kand)',
            ],
            [
                'num' => '12',
                'name' => 'Ayodhya Wapsi - Pushpak Viman',
                'name_hi' => 'अयोध्या वापसी - पुष्पक विमान',
                'state' => 'From Sri Lanka to Uttar Pradesh',
                'image' => 'ram-wapsi-ayodhya.jpg',
                'desc' => 'After the victory, Ram, Sita, Lakshman, Hanuman, Sugreev, Vibhishan and the entire army returned to Ayodhya in the magnificent Pushpak Viman (divine aerial vehicle). This was exactly on the day of Kartik Amavasya - the night of no moon. The people of Ayodhya lit millions of diyas (lamps) to welcome their beloved Ram home. This day became DIWALI - the festival of lights. The city was illuminated with joy, and Ram was coronated as King of Ayodhya - beginning the era of Ram Rajya (ideal governance).',
                'desc_hi' => 'विजय के बाद, राम, सीता, लक्ष्मण, हनुमान, सुग्रीव, विभीषण और पूरी सेना शानदार पुष्पक विमान (दिव्य हवाई वाहन) में अयोध्या लौटे। यह ठीक कार्तिक अमावस्या के दिन था - बिना चंद्रमा की रात। अयोध्या के लोगों ने अपने प्रिय राम का स्वागत करने के लिए लाखों दीये जलाए। यह दिन दीवाली बना - प्रकाश का पर्व।',
                'events' => ['Pushpak Viman journey back', 'Visited Shabri, Sita etc. during flight', 'ARRIVAL IN AYODHYA on Diwali day', 'People lit diyas = Diwali origin', 'Ram Rajyabhishek (Coronation)', 'Beginning of Ram Rajya'],
                'events_hi' => ['पुष्पक विमान से वापसी यात्रा', 'उड़ान के दौरान शबरी, सीता आदि से मिलना', 'दीवाली के दिन अयोध्या आगमन', 'लोगों ने दीये जलाए = दीवाली की उत्पत्ति', 'राम राज्याभिषेक', 'राम राज्य की शुरुआत'],
                'kand' => 'Uttar Kand',
            ],
        ];
        
        foreach ($stops as $i => $stop):
            $isEven = $i % 2 === 0;
        ?>
        <div class="row align-items-center g-4 mb-5" data-aos="fade-up">
            <?php if ($isEven): ?>
            <div class="col-lg-4">
                <div style="position:relative; border-radius:15px; overflow:hidden; box-shadow:0 15px 40px rgba(0,0,0,0.4);">
                    <img src="assets/images/<?php echo $stop['image']; ?>" alt="<?php echo $lang === 'hi' ? $stop['name_hi'] : $stop['name']; ?>" class="img-fluid w-100" style="height:280px; object-fit:cover;" loading="lazy">
                    <div style="position:absolute; top:15px; left:15px; background:#2D7A2D; color:#fff; padding:5px 15px; border-radius:20px; font-size:0.8rem; font-weight:600;"><?php echo $stop['kand']; ?></div>
                    <div style="position:absolute; bottom:0; left:0; right:0; background:linear-gradient(to top, rgba(0,0,0,0.7), transparent); padding:20px 15px 15px; color:#a8d5a8; font-size:0.85rem;"><i class="fas fa-map-marker-alt"></i> <?php echo $stop['state']; ?></div>
                </div>
            </div>
            <?php endif; ?>
            
            <div class="col-lg-8">
                <div style="background:rgba(255,255,255,0.05); border:1px solid rgba(168,213,168,0.2); border-radius:15px; padding:30px;">
                    <div style="display:flex; align-items:flex-start; gap:15px; margin-bottom:15px;">
                        <div style="background:#2D7A2D; color:#fff; width:50px; height:50px; border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:1.1rem; flex-shrink:0;"><?php echo $stop['num']; ?></div>
                        <div>
                            <h3 style="color:#a8d5a8; font-size:1.3rem; font-weight:800; margin-bottom:3px; font-family:'Noto Serif Devanagari',serif;"><?php echo $lang === 'hi' ? $stop['name_hi'] : $stop['name']; ?></h3>
                            <span style="color:rgba(168,213,168,0.6); font-size:0.85rem;"><i class="fas fa-map-marker-alt"></i> <?php echo $stop['state']; ?> | <?php echo $stop['kand']; ?></span>
                        </div>
                    </div>
                    <p style="color:#c8e6c8; line-height:1.9; font-size:0.97rem; margin-bottom:20px;"><?php echo $lang === 'hi' ? $stop['desc_hi'] : $stop['desc']; ?></p>
                    
                    <div>
                        <strong style="color:#FFD700; font-size:0.85rem; text-transform:uppercase; letter-spacing:1px;"><?php echo __t('Key Events:', 'मुख्य घटनाएं:'); ?></strong>
                        <div style="display:flex; flex-wrap:wrap; gap:8px; margin-top:10px;">
                            <?php 
                            $events = $lang === 'hi' ? $stop['events_hi'] : $stop['events'];
                            foreach ($events as $event):
                            ?>
                            <span style="background:rgba(45,122,45,0.3); border:1px solid rgba(168,213,168,0.3); color:#a8d5a8; padding:4px 12px; border-radius:20px; font-size:0.8rem;">✓ <?php echo $event; ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php if (!$isEven): ?>
            <div class="col-lg-4">
                <div style="position:relative; border-radius:15px; overflow:hidden; box-shadow:0 15px 40px rgba(0,0,0,0.4);">
                    <img src="assets/images/<?php echo $stop['image']; ?>" alt="<?php echo $lang === 'hi' ? $stop['name_hi'] : $stop['name']; ?>" class="img-fluid w-100" style="height:280px; object-fit:cover;" loading="lazy">
                    <div style="position:absolute; top:15px; left:15px; background:#2D7A2D; color:#fff; padding:5px 15px; border-radius:20px; font-size:0.8rem; font-weight:600;"><?php echo $stop['kand']; ?></div>
                    <div style="position:absolute; bottom:0; left:0; right:0; background:linear-gradient(to top, rgba(0,0,0,0.7), transparent); padding:20px 15px 15px; color:#a8d5a8; font-size:0.85rem;"><i class="fas fa-map-marker-alt"></i> <?php echo $stop['state']; ?></div>
                </div>
            </div>
            <?php endif; ?>
            
            <?php if ($i < count($stops) - 1): ?>
            <div class="col-12" style="text-align:center; padding:5px 0;">
                <div style="border-left:2px dashed rgba(168,213,168,0.3); height:30px; width:1px; margin:0 auto;"></div>
                <i class="fas fa-chevron-down" style="color:rgba(168,213,168,0.4); font-size:1.2rem;"></i>
            </div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- ====== LESSONS FROM VANVAS ====== -->
<section class="section-padding" style="background:#fff8f0;">
    <div class="container">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-label"><i class="fas fa-lightbulb"></i> <?php echo __t('Divine Lessons', 'दिव्य सीख'); ?></span>
            <h2 class="section-title"><?php echo __t('What We Learn from Ram\'s 14 Year Vanvas', 'राम के 14 वर्ष वनवास से हम क्या सीखते हैं'); ?></h2>
        </div>
        <div class="row g-4">
            <?php
            $lessons = [
                ['🙏', 'Dharma Above All', 'सबसे ऊपर धर्म', 'Ram accepted exile to uphold his father\'s word and the tradition of Raghukul - teaching us that dharma (right conduct) must be upheld even at the cost of personal comfort.', 'राम ने अपने पिता के वचन और रघुकुल की परंपरा को बनाए रखने के लिए वनवास स्वीकार किया - हमें सिखाया कि धर्म का पालन व्यक्तिगत सुख की कीमत पर भी करना चाहिए।'],
                ['❤️', 'Unconditional Love', 'बिना शर्त प्रेम', 'Sita\'s love that chose forest over palace, Lakshman\'s devotion that chose exile over kingdom, Hanuman\'s selfless service - all teach the purest forms of love and loyalty.', 'सीता का प्रेम जिसने महल की जगह वन चुना, लक्ष्मण की भक्ति जिसने राज्य की जगह वनवास चुना, हनुमान की निःस्वार्थ सेवा - सभी प्रेम और वफादारी के शुद्धतम रूप सिखाते हैं।'],
                ['🦁', 'Courage in Adversity', 'विपरीत परिस्थिति में साहस', 'Despite abduction of Sita, loss of everything, and facing the mightiest demon king, Ram never gave up. His courage shows us how to face life\'s greatest challenges.', 'सीता के अपहरण, सब कुछ खोने, और सबसे शक्तिशाली राक्षस राजा का सामना करने के बावजूद, राम ने कभी हार नहीं मानी।'],
                ['🤝', 'True Friendship', 'सच्ची मित्रता', 'Ram\'s alliance with Sugreev, Vibhishan, and especially the divine friendship with Hanuman Ji shows that true friendship transcends all barriers of caste, species, and status.', 'सुग्रीव, विभीषण के साथ राम का गठबंधन, और विशेष रूप से हनुमान जी के साथ दिव्य मित्रता दर्शाती है कि सच्ची मित्रता जाति, प्रजाति और स्थिति की सभी बाधाओं को पार करती है।'],
                ['⚖️', 'Victory of Good over Evil', 'बुराई पर अच्छाई की जीत', 'The entire vanvas culminated in the defeat of Ravan - the ultimate lesson that no matter how powerful evil becomes, righteousness always prevails in the end.', 'पूरा वनवास रावण की हार के साथ समाप्त हुआ - अंतिम सबक कि चाहे बुराई कितनी भी शक्तिशाली क्यों न हो, अंत में धर्म की हमेशा जीत होती है।'],
                ['🕯️', 'Joy After Darkness', 'अंधेरे के बाद उजाला', 'Ram\'s return to Ayodhya after 14 years is celebrated as Diwali - teaching us that no night lasts forever, and every darkness is followed by the light of Diwali.', 'राम की 14 वर्ष बाद अयोध्या वापसी को दीवाली के रूप में मनाया जाता है - हमें सिखाता है कि कोई रात हमेशा नहीं रहती, और हर अंधेरे के बाद दीवाली का उजाला आता है।'],
            ];
            foreach ($lessons as $i => $l):
            ?>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="<?php echo $i * 60; ?>">
                <div style="background:#fff; border-radius:15px; padding:25px; height:100%; box-shadow:0 5px 20px rgba(0,0,0,0.07); border-top:3px solid #2D7A2D;">
                    <div style="font-size:2.5rem; margin-bottom:15px;"><?php echo $l[0]; ?></div>
                    <h4 style="color:#1A4A1A; font-size:1.05rem; margin-bottom:10px;"><?php echo $lang === 'hi' ? $l[2] : $l[1]; ?></h4>
                    <p style="color:#666; font-size:0.9rem; line-height:1.7; margin:0;"><?php echo $lang === 'hi' ? $l[4] : $l[3]; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ====== FAQ SECTION ====== -->
<section class="section-padding" style="background: linear-gradient(135deg, #FFF8F0 0%, #FFE8CC 100%);">
    <div class="container">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-label"><i class="fas fa-question-circle"></i> <?php echo __t('FAQs', 'अक्सर पूछे जाने वाले प्रश्न'); ?></span>
            <h2 class="section-title"><?php echo __t('14 Varsh Vanvas - Frequently Asked Questions', '14 वर्ष वनवास - अक्सर पूछे जाने वाले प्रश्न'); ?></h2>
        </div>
        <div style="max-width:800px; margin:0 auto;">
            <?php
            $faqs = [
                ['Q: राम का वनवास कितने वर्षों का था?', 'Q: How many years was Ram\'s vanvas?', 'A: भगवान राम का वनवास 14 वर्षों का था। यह कैकेयी के दो वरदानों के कारण हुआ - एक भरत का राज्याभिषेक और दूसरा राम का 14 वर्ष का वनवास।', 'A: Lord Ram\'s vanvas was 14 years. This happened because of Kaikeyi\'s two boons - one was Bharat\'s coronation and the other was Ram\'s 14-year exile.'],
                ['Q: राम वनवास में सबसे ज्यादा कहां रहे?', 'Q: Where did Ram stay the most during vanvas?', 'A: राम ने अपने 14 वर्ष के वनवास का सबसे अधिक समय चित्रकूट में बिताया, जहां वे लगभग 11 वर्ष रहे।', 'A: Ram spent most of his 14-year exile at Chitrakoot, where he stayed for about 11 years.'],
                ['Q: सीता हरण कहां हुआ था?', 'Q: Where did Sita Haran happen?', 'A: सीता हरण पंचवटी में हुआ था जो आज के नासिक, महाराष्ट्र में गोदावरी नदी के किनारे है। यहीं रावण साधु वेश में आया और सीता का अपहरण किया।', 'A: Sita Haran happened at Panchvati, which is modern-day Nashik, Maharashtra on the banks of Godavari river. Here Ravan came disguised as a hermit and abducted Sita.'],
                ['Q: हनुमान और राम की पहली मुलाकात कहां हुई?', 'Q: Where did Hanuman and Ram first meet?', 'A: हनुमान और राम की पहली मुलाकात किष्किंधा (आधुनिक हम्पी, कर्नाटक) में हुई। हनुमान ब्राह्मण के वेश में आए और तुरंत राम को पहचान लिया।', 'A: Hanuman and Ram first met at Kishkindha (modern Hampi, Karnataka). Hanuman came in the guise of a Brahmin and immediately recognized Ram.'],
                ['Q: दीवाली का राम वनवास से क्या संबंध है?', 'Q: What is the connection between Diwali and Ram\'s vanvas?', 'A: दीवाली उस दिन मनाई जाती है जब 14 वर्ष के वनवास के बाद राम, सीता और लक्ष्मण अयोध्या लौटे थे। यह कार्तिक अमावस्या की रात थी। अयोध्यावासियों ने उनके स्वागत में लाखों दीये जलाए, और यही दीवाली की शुरुआत हुई।', 'A: Diwali is celebrated on the day Ram, Sita, and Lakshman returned to Ayodhya after 14 years of exile. This was the night of Kartik Amavasya. Ayodhyavasis lit millions of diyas to welcome them, and this was the beginning of Diwali.'],
            ];
            foreach ($faqs as $i => $faq):
            ?>
            <div style="background:#fff; border-radius:12px; padding:20px 25px; margin-bottom:15px; box-shadow:0 3px 15px rgba(0,0,0,0.07);" data-aos="fade-up">
                <h4 style="color:#F55900; font-size:1rem; margin-bottom:12px; cursor:pointer;" onclick="this.nextElementSibling.style.display=this.nextElementSibling.style.display==='none'?'block':'none'">
                    <?php echo $lang === 'hi' ? $faq[0] : $faq[1]; ?>
                    <i class="fas fa-chevron-down" style="float:right; font-size:0.85rem; margin-top:3px;"></i>
                </h4>
                <p style="color:#555; line-height:1.8; margin:0; font-size:0.95rem;"><?php echo $lang === 'hi' ? $faq[2] : $faq[3]; ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA -->
<section style="background: linear-gradient(135deg, #0D2B0D, #2D7A2D); padding:60px 0; text-align:center;">
    <div class="container">
        <h2 style="color:#fff; font-size:clamp(1.5rem,4vw,2.5rem); margin-bottom:15px;">🙏 <?php echo __t('Jai Shri Ram - Read Complete Ramayan', 'जय श्री राम - सम्पूर्ण रामायण पढ़ें'); ?></h2>
        <p style="color:#a8d5a8; margin-bottom:30px; font-size:1.1rem;"><?php echo __t('Explore all 7 Kand of Ramayan for the complete story', '7 कांड की सम्पूर्ण रामायण पढ़ें'); ?></p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <a href="<?php echo SITE_URL; ?>/ramayan" class="btn-hero btn-hero-primary">
                <i class="fas fa-book-open"></i> <?php echo __t('Read Ramayan', 'रामायण पढ़ें'); ?>
            </a>
            <a href="<?php echo SITE_URL; ?>/diwali-ayodhya-deepotsav" class="btn-hero btn-hero-outline">
                🪔 <?php echo __t('Diwali Ayodhya Guide', 'दीवाली अयोध्या गाइड'); ?>
            </a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

<style>
@keyframes float { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-15px)} }
</style>
