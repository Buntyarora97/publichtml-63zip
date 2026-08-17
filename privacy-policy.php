<?php
/**
 * Privacy Policy - Google AdSense Compliant
 * Complete privacy policy for AyodhyaRamMandir.in
 */

$pageType = 'page';
$pageSlug = 'privacy-policy';
$pageTitle = 'Privacy Policy - AyodhyaRamMandir.in | Gupaniyata Niti';

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/functions.php';

$lang = getCurrentLang();
include __DIR__ . '/includes/header.php';
?>

<section style="background: linear-gradient(135deg, #1A0A00 0%, #2D1500 100%); padding:100px 0 50px;">
    <div class="container text-center" style="position:relative;z-index:2;">
        <h1 style="color:#fff; font-size:clamp(1.8rem,4vw,2.8rem); font-weight:800; margin-bottom:15px;">🔒 Privacy Policy</h1>
        <p style="color:#FFD48A; font-size:1rem;">Last Updated: <?php echo date('F d, Y'); ?> | Effective Date: January 22, 2024</p>
        <nav aria-label="breadcrumb" class="mt-3">
            <ol class="breadcrumb justify-content-center" style="background:none;">
                <li class="breadcrumb-item"><a href="<?php echo SITE_URL; ?>/" style="color:#FFD700;">Home</a></li>
                <li class="breadcrumb-item active" style="color:#fff;">Privacy Policy</li>
            </ol>
        </nav>
    </div>
</section>

<section class="section-padding" style="background:#fff;">
    <div class="container" style="max-width:900px;">
        
        <div style="background:#fff8f0; border-radius:15px; padding:25px; margin-bottom:30px; border-left:4px solid #F55900;">
            <p style="color:#555; margin:0; line-height:1.8;">
                Welcome to <strong>AyodhyaRamMandir.in</strong>. This Privacy Policy explains how we collect, use, and protect your information when you visit our website. By using our website, you agree to the terms of this Privacy Policy. If you do not agree, please do not use our website.
            </p>
        </div>

        <?php
        $sections = [
            [
                'title' => '1. Information We Collect',
                'title_hi' => '1. हम जो जानकारी एकत्र करते हैं',
                'content' => '
                <p>We collect the following types of information:</p>
                <h4 style="color:#F55900; margin-top:15px;">a) Information You Provide Voluntarily</h4>
                <ul>
                    <li><strong>Contact Form:</strong> When you fill our contact form, we collect your name, email address, phone number, and message.</li>
                    <li><strong>Newsletter Subscription:</strong> Your email address when you subscribe to our newsletter.</li>
                    <li><strong>Photo Uploads:</strong> Your name, city, message, and photo/video when you share your Ayodhya visit through our upload feature.</li>
                    <li><strong>Reviews:</strong> Your name, city, rating, and review text when you submit a review.</li>
                    <li><strong>Donation Forms:</strong> Name, email, phone when you fill our donation information form.</li>
                </ul>
                
                <h4 style="color:#F55900; margin-top:15px;">b) Information Collected Automatically</h4>
                <ul>
                    <li><strong>Log Data:</strong> IP address, browser type, operating system, referring URL, pages viewed, time spent on pages.</li>
                    <li><strong>Cookies:</strong> Small text files stored on your device to enhance your browsing experience. See our Cookie Policy below.</li>
                    <li><strong>Page Views:</strong> We track which pages are viewed (without personally identifying you) for analytics purposes.</li>
                    <li><strong>Language Preference:</strong> Your selected language (Hindi/English) is stored in a cookie.</li>
                </ul>

                <h4 style="color:#F55900; margin-top:15px;">c) Information from Third Parties</h4>
                <ul>
                    <li><strong>Google Analytics:</strong> Anonymized usage data including demographics and interests (if enabled).</li>
                    <li><strong>Google AdSense:</strong> Advertising-related data as described in our Advertising section below.</li>
                </ul>
                '
            ],
            [
                'title' => '2. How We Use Your Information',
                'title_hi' => '2. हम आपकी जानकारी का उपयोग कैसे करते हैं',
                'content' => '
                <p>We use the collected information for the following purposes:</p>
                <ul>
                    <li>To respond to your inquiries and contact form submissions</li>
                    <li>To send newsletter updates about Ayodhya Ram Mandir, festivals, and new content (only if you subscribed)</li>
                    <li>To moderate and display user-submitted reviews and photos</li>
                    <li>To analyze website usage and improve our content and user experience</li>
                    <li>To display personalized and relevant advertisements (via Google AdSense)</li>
                    <li>To ensure website security and prevent fraud</li>
                    <li>To comply with legal obligations</li>
                    <li>To track page views for internal analytics (non-personally identifiable)</li>
                </ul>
                <p><strong>We never sell your personal information to third parties.</strong></p>
                '
            ],
            [
                'title' => '3. Google AdSense & Advertising',
                'title_hi' => '3. Google AdSense और विज्ञापन',
                'content' => '
                <p>AyodhyaRamMandir.in uses <strong>Google AdSense</strong> to display advertisements on our website. Google AdSense is an advertising service provided by Google LLC.</p>
                
                <h4 style="color:#F55900; margin-top:15px;">How Google AdSense Works:</h4>
                <ul>
                    <li>Google AdSense uses cookies to serve ads based on your prior visits to our website and other websites on the internet.</li>
                    <li>Google uses the DoubleClick cookie to enable serving relevant advertisements.</li>
                    <li>Google may use your browsing data to show you more relevant ads across the internet.</li>
                    <li>Third-party vendors and advertising networks may use cookies to serve ads on our website.</li>
                </ul>
                
                <h4 style="color:#F55900; margin-top:15px;">Your Choices Regarding AdSense Cookies:</h4>
                <ul>
                    <li>You can opt out of personalized advertising by visiting <a href="https://www.google.com/settings/ads" target="_blank" rel="noopener" style="color:#F55900;">Google Ads Settings</a>.</li>
                    <li>You can opt out of third-party vendor cookies by visiting <a href="https://www.networkadvertising.org/managing/opt_out.asp" target="_blank" rel="noopener" style="color:#F55900;">Network Advertising Initiative opt-out page</a>.</li>
                    <li>You can also use the <a href="https://tools.google.com/dlpage/gaoptout" target="_blank" rel="noopener" style="color:#F55900;">Google Analytics Opt-out Browser Add-on</a>.</li>
                </ul>
                
                <p>For more information about how Google uses data, visit: <a href="https://policies.google.com/technologies/partner-sites" target="_blank" rel="noopener" style="color:#F55900;">How Google uses data when you use our partners\' sites or apps</a>.</p>
                '
            ],
            [
                'title' => '4. Cookies Policy',
                'title_hi' => '4. कुकीज़ नीति',
                'content' => '
                <p>Cookies are small text files placed on your device. AyodhyaRamMandir.in uses the following types of cookies:</p>
                
                <div style="overflow-x:auto;">
                <table style="width:100%; border-collapse:collapse; margin:15px 0;">
                    <thead>
                        <tr style="background:#F55900; color:#fff;">
                            <th style="padding:12px; text-align:left; border:1px solid #ddd;">Cookie Name</th>
                            <th style="padding:12px; text-align:left; border:1px solid #ddd;">Purpose</th>
                            <th style="padding:12px; text-align:left; border:1px solid #ddd;">Duration</th>
                            <th style="padding:12px; text-align:left; border:1px solid #ddd;">Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="background:#fff8f0;">
                            <td style="padding:10px; border:1px solid #ddd;"><code>lang</code></td>
                            <td style="padding:10px; border:1px solid #ddd;">Stores your language preference (Hindi/English)</td>
                            <td style="padding:10px; border:1px solid #ddd;">30 days</td>
                            <td style="padding:10px; border:1px solid #ddd;">Functional</td>
                        </tr>
                        <tr>
                            <td style="padding:10px; border:1px solid #ddd;"><code>_ga, _gid</code></td>
                            <td style="padding:10px; border:1px solid #ddd;">Google Analytics - tracks page visits and user behavior (anonymized)</td>
                            <td style="padding:10px; border:1px solid #ddd;">2 years / 24 hours</td>
                            <td style="padding:10px; border:1px solid #ddd;">Analytics</td>
                        </tr>
                        <tr style="background:#fff8f0;">
                            <td style="padding:10px; border:1px solid #ddd;"><code>__gads</code></td>
                            <td style="padding:10px; border:1px solid #ddd;">Google AdSense - serves relevant advertisements</td>
                            <td style="padding:10px; border:1px solid #ddd;">2 years</td>
                            <td style="padding:10px; border:1px solid #ddd;">Advertising</td>
                        </tr>
                        <tr>
                            <td style="padding:10px; border:1px solid #ddd;"><code>ayodhya_session</code></td>
                            <td style="padding:10px; border:1px solid #ddd;">Session management for security and CSRF protection</td>
                            <td style="padding:10px; border:1px solid #ddd;">2 hours</td>
                            <td style="padding:10px; border:1px solid #ddd;">Essential</td>
                        </tr>
                    </tbody>
                </table>
                </div>
                
                <p>You can control cookies through your browser settings. Note that disabling cookies may affect the functionality of our website.</p>
                '
            ],
            [
                'title' => '5. Data Sharing & Third Parties',
                'title_hi' => '5. डेटा साझाकरण और तृतीय पक्ष',
                'content' => '
                <p>We may share your information with the following parties:</p>
                <ul>
                    <li><strong>Google LLC</strong> - For Google Analytics (website analytics) and Google AdSense (advertising). Google\'s privacy policy applies: <a href="https://policies.google.com/privacy" target="_blank" rel="noopener" style="color:#F55900;">policies.google.com/privacy</a></li>
                    <li><strong>Law Enforcement</strong> - If required by law, court order, or government request</li>
                    <li><strong>Business Transfers</strong> - In the event of a merger or acquisition, your information may be transferred</li>
                </ul>
                <p><strong>We do NOT sell, rent, or trade your personal information to any third party for commercial purposes.</strong></p>
                '
            ],
            [
                'title' => '6. Data Retention',
                'title_hi' => '6. डेटा प्रतिधारण',
                'content' => '
                <ul>
                    <li><strong>Contact Form Submissions:</strong> Retained for 2 years for support purposes</li>
                    <li><strong>Newsletter Email:</strong> Retained until you unsubscribe</li>
                    <li><strong>User Reviews:</strong> Retained indefinitely unless you request deletion</li>
                    <li><strong>User Uploads (Photos):</strong> Retained for 1 year or until you request removal</li>
                    <li><strong>Page View Logs:</strong> Retained for 90 days (anonymized after 30 days)</li>
                    <li><strong>Cookies:</strong> As per duration listed in our Cookie Policy above</li>
                </ul>
                '
            ],
            [
                'title' => '7. Your Rights (DPDPA 2023 - India)',
                'title_hi' => '7. आपके अधिकार (DPDPA 2023 - भारत)',
                'content' => '
                <p>Under India\'s Digital Personal Data Protection Act 2023 (DPDPA), you have the following rights:</p>
                <ul>
                    <li><strong>Right to Access:</strong> You can request a copy of the personal data we hold about you</li>
                    <li><strong>Right to Correction:</strong> You can request correction of inaccurate personal data</li>
                    <li><strong>Right to Erasure:</strong> You can request deletion of your personal data</li>
                    <li><strong>Right to Withdraw Consent:</strong> You can withdraw consent for data processing at any time</li>
                    <li><strong>Right to Nominate:</strong> You can nominate another person to exercise these rights on your behalf</li>
                </ul>
                <p>To exercise these rights, contact us at: <a href="mailto:info@ayodhyarammandir.in" style="color:#F55900;">info@ayodhyarammandir.in</a></p>
                '
            ],
            [
                'title' => '8. Children\'s Privacy',
                'title_hi' => '8. बच्चों की गोपनीयता',
                'content' => '
                <p>AyodhyaRamMandir.in is a general religious and educational website. We do not knowingly collect personal information from children under 13 years of age.</p>
                <p>If we discover that we have inadvertently collected information from a child under 13, we will promptly delete that information. Parents and guardians who believe their child has submitted personal information should contact us at <a href="mailto:info@ayodhyarammandir.in" style="color:#F55900;">info@ayodhyarammandir.in</a>.</p>
                '
            ],
            [
                'title' => '9. Security of Your Information',
                'title_hi' => '9. आपकी जानकारी की सुरक्षा',
                'content' => '
                <p>We implement appropriate technical and organizational security measures to protect your personal information against unauthorized access, disclosure, alteration, or destruction, including:</p>
                <ul>
                    <li>SSL/HTTPS encryption for all data transmission</li>
                    <li>CSRF (Cross-Site Request Forgery) protection on all forms</li>
                    <li>Password hashing using bcrypt for admin accounts</li>
                    <li>Regular security updates and patches</li>
                    <li>Access controls limiting who can view personal data</li>
                </ul>
                <p>However, no method of transmission over the internet is 100% secure. We cannot guarantee absolute security of your data.</p>
                '
            ],
            [
                'title' => '10. External Links',
                'title_hi' => '10. बाहरी लिंक',
                'content' => '
                <p>Our website may contain links to external websites (YouTube, social media, religious sites). We are not responsible for the privacy practices of these external sites. We encourage you to read the privacy policy of each website you visit.</p>
                '
            ],
            [
                'title' => '11. Changes to This Privacy Policy',
                'title_hi' => '11. इस गोपनीयता नीति में बदलाव',
                'content' => '
                <p>We may update this Privacy Policy from time to time. When we make significant changes, we will:</p>
                <ul>
                    <li>Update the "Last Updated" date at the top of this page</li>
                    <li>Notify newsletter subscribers via email for major changes</li>
                    <li>Display a notice on our homepage for significant changes</li>
                </ul>
                <p>Your continued use of the website after changes constitutes acceptance of the updated Privacy Policy.</p>
                '
            ],
            [
                'title' => '12. Contact Us About Privacy',
                'title_hi' => '12. गोपनीयता के बारे में हमसे संपर्क करें',
                'content' => '
                <p>For any privacy-related questions, concerns, or to exercise your rights, contact our Privacy Team:</p>
                <div style="background:#fff8f0; border-radius:12px; padding:20px; border-left:4px solid #F55900;">
                    <p><strong>AyodhyaRamMandir.in</strong><br>
                    <i class="fas fa-envelope" style="color:#F55900;"></i> <a href="mailto:info@ayodhyarammandir.in" style="color:#F55900;">info@ayodhyarammandir.in</a><br>
                    <i class="fas fa-envelope" style="color:#F55900;"></i> <a href="mailto:officialayodhyarammandir.in@gmail.com" style="color:#F55900;">officialayodhyarammandir.in@gmail.com</a><br>
                    <i class="fas fa-phone" style="color:#F55900;"></i> <a href="tel:+918168877332" style="color:#F55900;">+91-8168877332</a><br>
                    <i class="fas fa-map-marker-alt" style="color:#F55900;"></i> Ayodhya Dham, Uttar Pradesh - 224123, India</p>
                    <p style="margin-top:10px; color:#666; font-size:0.9rem;">We will respond to privacy-related requests within 30 days.</p>
                </div>
                '
            ],
        ];
        ?>
        
        <!-- Table of Contents -->
        <div style="background:#f8f9fa; border-radius:15px; padding:25px; margin-bottom:35px;">
            <h3 style="color:#333; margin-bottom:15px; font-size:1.1rem;"><i class="fas fa-list" style="color:#F55900;"></i> Table of Contents</h3>
            <ol style="margin:0; padding-left:20px; color:#555; line-height:2;">
                <?php foreach ($sections as $i => $section): ?>
                <li><a href="#section-<?php echo $i; ?>" style="color:#F55900; text-decoration:none;"><?php echo $section['title']; ?></a></li>
                <?php endforeach; ?>
            </ol>
        </div>

        <?php foreach ($sections as $i => $section): ?>
        <div id="section-<?php echo $i; ?>" style="margin-bottom:35px; padding-bottom:35px; border-bottom:1px solid #f0e0d0;">
            <h3 style="color:#F55900; font-size:1.2rem; margin-bottom:15px;"><?php echo $lang === 'hi' ? $section['title_hi'] : $section['title']; ?></h3>
            <div style="color:#555; line-height:1.9; font-size:0.97rem;">
                <?php echo $section['content']; ?>
            </div>
        </div>
        <?php endforeach; ?>
        
        <!-- Schema for Policy page -->
        <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "WebPage",
          "name": "Privacy Policy - AyodhyaRamMandir.in",
          "url": "<?php echo SITE_URL; ?>/privacy-policy",
          "description": "Privacy Policy for AyodhyaRamMandir.in - Google AdSense compliant privacy policy covering data collection, cookies, advertising, and user rights.",
          "datePublished": "2024-01-22",
          "dateModified": "<?php echo date('Y-m-d'); ?>"
        }
        </script>
        
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
