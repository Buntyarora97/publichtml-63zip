<?php
/**
 * Ayodhya Ram Mandir - Chatbot API
 * Ram Mandir Guide Bot
 */

require_once __DIR__ . '/../includes/functions.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$message = strtolower(trim($data['message'] ?? ''));
$lang = $_GET['lang'] ?? 'en';

if (empty($message)) {
    echo json_encode(['answer' => 'Jai Shri Ram! Please ask your question.']);
    exit;
}

// Try to find matching FAQ from database
$faqs = dbFetchAll("SELECT * FROM chatbot_faqs WHERE status = 1");
$bestMatch = null;
$highestScore = 0;

foreach ($faqs as $faq) {
    $questions = [
        strtolower($faq['question'] ?? ''),
        strtolower($faq['question_hi'] ?? ''),
    ];
    $keywords = array_filter(array_map('trim', explode(',', strtolower($faq['keywords'] ?? ''))));
    
    $score = 0;
    foreach ($questions as $q) {
        if (!empty($q)) {
            similar_text($message, $q, $percent);
            $score = max($score, $percent * 0.7);
        }
    }
    
    foreach ($keywords as $kw) {
        if (stripos($message, $kw) !== false) {
            $score += 15;
        }
    }
    
    if ($score > $highestScore && $score > 30) {
        $highestScore = $score;
        $bestMatch = $faq;
    }
}

if ($bestMatch) {
    // Update hit count
    dbQuery("UPDATE chatbot_faqs SET hit_count = hit_count + 1 WHERE id = ?", [$bestMatch['id']]);
    
    $answer = ($lang === 'hi' && !empty($bestMatch['answer_hi'])) ? $bestMatch['answer_hi'] : $bestMatch['answer'];
    echo json_encode(['answer' => $answer, 'confidence' => round($highestScore, 2)]);
    exit;
}

// Default responses based on keywords
$defaultResponses = [
    'hi' => [
        'keywords' => ['hello', 'hi', 'namaste', 'jai', 'ram', 'shri ram'],
        'en' => 'Jai Shri Ram! Welcome to Ayodhya Ram Mandir. How can I help you today?',
        'hi' => 'जय श्री राम! अयोध्या राम मंदिर में आपका स्वागत है। मैं आज आपकी क्या सहायता कर सकता हूँ?'
    ],
    'ayodhya' => [
        'keywords' => ['ayodhya', 'reach', 'pahunche', 'jaye', 'travel', 'yatra'],
        'en' => 'Ayodhya is well connected by road, rail and air. Nearest airport: Ayodhya International (AYJ). Railway: Ayodhya Junction. Road: NH27 connects to Lucknow (135km), Varanasi (200km).',
        'hi' => 'अयोध्या सड़क, रेल और हवाई मार्ग से अच्छी तरह जुड़ा है। निकटतम हवाई अड्डा: अयोध्या अंतर्राष्ट्रीय (AYJ)। रेलवे: अयोध्या जंक्शन। सड़क: NH27 लखनऊ (135 किमी), वाराणसी (200 किमी) से जुड़ता है।'
    ],
    'darshan' => [
        'keywords' => ['darshan', 'timing', 'time', 'visit', 'samay', 'ghante'],
        'en' => 'Ram Mandir Darshan Timings: Morning 7:00 AM - 11:30 AM, Evening 2:00 PM - 7:00 PM. Aarti: Morning 6:30 AM, Evening 6:30 PM. Free entry. No booking required for general darshan.',
        'hi' => 'राम मंदिर दर्शन समय: सुबह 7:00 - 11:30, शाम 2:00 - 7:00। आरती: सुबह 6:30, शाम 6:30। निःशुल्क प्रवेश। सामान्य दर्शन के लिए कोई बुकिंग आवश्यक नहीं।'
    ],
    'hotel' => [
        'keywords' => ['hotel', 'stay', 'room', 'rahna', 'dharamshala'],
        'en' => 'Ayodhya has many hotels, dharamshalas and guest houses. Budget options start from Rs 500/night. Premium hotels: Ramayana Hotel, The Ramaya Ayodhya, and various dharamshalas near temple.',
        'hi' => 'अयोध्या में कई होटल, धर्मशालाएं और गेस्ट हाउस हैं। बजट विकल्प Rs 500/रात से शुरू। प्रीमियम होटल: रामायण होटल, द रामया अयोध्या, और मंदिर के पास विभिन्न धर्मशालाएं।'
    ],
    'history' => [
        'keywords' => ['history', 'historical', 'purana', 'itihaas', 'kab bana'],
        'en' => 'Ram Mandir history spans thousands of years. The current temple construction began in 2020 after Supreme Court verdict of Nov 2019. Pran Pratishtha was done on Jan 22, 2024 by PM Modi. The temple stands at Ram Janmabhoomi, believed birthplace of Lord Ram.',
        'hi' => 'राम मंदिर का इतिहास हजारों साल पुराना है। नवंबर 2019 के सुप्रीम कोर्ट फैसले के बाद 2020 में निर्माण शुरू हुआ। प्राण प्रतिष्ठा 22 जनवरी 2024 को पीएम मोदी द्वारा संपन्न हुई। मंदिर राम जन्मभूमि पर खड़ा है, जो भगवान राम का जन्मस्थान माना जाता है।'
    ],
    'hanuman' => [
        'keywords' => ['hanuman', 'bajrangbali', 'pawanputra', 'anjani'],
        'en' => 'Hanuman Ji is the greatest devotee of Lord Ram. He was born to Pawan Dev and Mata Anjani. He is known for his devotion, strength, and service. Key events: Lanka Yatra, Lanka Dahan, Sanjeevani Booti. Hanuman Garhi in Ayodhya is a must-visit temple dedicated to him.',
        'hi' => 'हनुमान जी भगवान राम के सबसे महान भक्त हैं। वे पवन देव और माता अंजनी के पुत्र हैं। वे अपनी भक्ति, शक्ति और सेवा के लिए जाने जाते हैं। मुख्य घटनाएं: लंका यात्रा, लंका दहन, संजीवनी बूटी। अयोध्या में हनुमान गढ़ी उनके समर्पित एक अवश्य देखने योग्य मंदिर है।'
    ],
    'contact' => [
        'keywords' => ['contact', 'phone', 'number', 'email', 'call', 'reach'],
        'en' => 'You can contact us at: Phone: +91-8168877332, Email: info@ayodhyarammandir.in, Official Email: officialayodhyarammandir.in@gmail.com, Address: Ayodhya Dham, Uttar Pradesh, India. WhatsApp: +91-8168877332',
        'hi' => 'आप हमसे संपर्क कर सकते हैं: फोन: +91-8168877332, ईमेल: info@ayodhyarammandir.in, आधिकारिक ईमेल: officialayodhyarammandir.in@gmail.com, पता: अयोध्या धाम, उत्तर प्रदेश, भारत। व्हाट्सएप: +91-8168877332'
    ],
    'chalisa' => [
        'keywords' => ['chalisa', 'chaupai', 'doha', 'tulsidas'],
        'en' => 'Hanuman Chalisa is a 40-verse hymn by Tulsidas Ji in praise of Hanuman Ji. It is one of the most popular Hindu prayers. Reading Chalisa removes obstacles and brings blessings. You can read the full Chalisa with meaning on our Hanuman Chalisa page.',
        'hi' => 'हनुमान चालीसा तुलसीदास जी द्वारा रचित हनुमान जी की स्तुति में 40 छंदों का स्तोत्र है। यह सबसे लोकप्रिय हिंदू प्रार्थनाओं में से एक है। चालीसा पढ़ने से संकट दूर होते हैं और आशीर्वाद मिलता है। आप हमारे हनुमान चालीसा पेज पर पूरा अर्थ सहित पढ़ सकते हैं।'
    ],
    'aarti' => [
        'keywords' => ['aarti', 'arti', 'arti', 'evening', 'morning', 'bhajan'],
        'en' => 'You can watch live aarti from Ayodhya on our Live Aarti page. Morning Aarti: 6:30 AM, Evening Aarti: 6:30 PM. We also have a collection of Ram Bhajans and Hanuman Bhajans on our Aarti & Bhajan page.',
        'hi' => 'आप हमारे लाइव आरती पेज पर अयोध्या से लाइव आरती देख सकते हैं। सुबह की आरती: 6:30, शाम की आरती: 6:30। हमारे आरती और भजन पेज पर राम भजन और हनुमान भजन का संग्रह भी है।'
    ],
];

foreach ($defaultResponses as $response) {
    foreach ($response['keywords'] as $kw) {
        if (stripos($message, $kw) !== false) {
            $reply = ($lang === 'hi' && !empty($response['hi'])) ? $response['hi'] : $response['en'];
            echo json_encode(['answer' => $reply]);
            exit;
        }
    }
}

// Fallback response
$fallbacks = [
    'en' => [
        'Jai Shri Ram! I am still learning. Please ask about Ayodhya Ram Mandir, travel guide, darshan timings, history, Hanuman Ji, or contact information.',
        'Jai Shri Ram! For detailed information, please browse our website or contact us at +91-8168877332 or email info@ayodhyarammandir.in.',
        'Jai Shri Ram! You can find more information on our website. May Lord Ram bless you!'
    ],
    'hi' => [
        'जय श्री राम! मैं अभी सीख रहा हूँ। कृपया अयोध्या राम मंदिर, यात्रा गाइड, दर्शन समय, इतिहास, हनुमान जी, या संपर्क जानकारी के बारे में पूछें।',
        'जय श्री राम! विस्तृत जानकारी के लिए कृपया हमारी वेबसाइट ब्राउज़ करें या हमसे +91-8168877332 पर संपर्क करें।',
        'जय श्री राम! आप हमारी वेबसाइट पर और जानकारी पा सकते हैं। भगवान राम आपका कल्याण करें!'
    ]
];

$fb = $fallbacks[$lang] ?? $fallbacks['en'];
echo json_encode(['answer' => $fb[array_rand($fb)]]);
