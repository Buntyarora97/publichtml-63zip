<?php
/**
 * Ayodhya Ram Mandir - Contact Page
 */

require_once __DIR__ . '/includes/functions.php';

$pageType = 'page';
$pageSlug = 'contact';
$pageTitle = 'Contact Us';

// Handle form submission
$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $name = cleanInput($_POST['name'] ?? '');
        $email = cleanInput($_POST['email'] ?? '');
        $phone = cleanInput($_POST['phone'] ?? '');
        $subject = cleanInput($_POST['subject'] ?? '');
        $message = cleanInput($_POST['message'] ?? '');
        
        if (empty($name) || empty($email) || empty($message)) {
            $error = 'Please fill in all required fields.';
        } else {
            dbQuery(
                "INSERT INTO contact_messages (name, email, phone, subject, message, ip_address) VALUES (?, ?, ?, ?, ?, ?)",
                [$name, $email, $phone, $subject, $message, $_SERVER['REMOTE_ADDR'] ?? '']
            );
            
            // Send notification email
            $adminEmail = getSetting('site_email', 'info@ayodhyarammandir.in');
            $emailSubject = 'New Contact Message - Ayodhya Ram Mandir';
            $emailBody = "<h3>New Contact Message</h3>
                <p><strong>Name:</strong> {$name}</p>
                <p><strong>Email:</strong> {$email}</p>
                <p><strong>Phone:</strong> {$phone}</p>
                <p><strong>Subject:</strong> {$subject}</p>
                <p><strong>Message:</strong> {$message}</p>";
            sendEmail($adminEmail, $emailSubject, $emailBody);
            
            $success = 'Jai Shri Ram! Your message has been sent successfully. We will get back to you soon.';
        }
    } catch (Exception $e) {
        $error = 'Something went wrong. Please try again.';
    }
}

$lang = getCurrentLang();
$siteAddress = getSetting('site_address', 'Ayodhya Dham, Uttar Pradesh, India');
$sitePhone = getSetting('site_phone', '8168877332');
$siteEmail = getSetting('site_email', 'info@ayodhyarammandir.in');
$siteEmailOfficial = getSetting('site_email_official', 'officialayodhyarammandir.in@gmail.com');
$googleMap = getSetting('google_map', '');
$whatsapp = getSetting('contact_whatsapp', '918168877332');

include __DIR__ . '/includes/header.php';
?>

<section class="page-hero" style="background: linear-gradient(135deg, var(--color-primary), var(--color-secondary)); padding: 80px 0 60px; text-align: center; color: #fff;">
    <div class="container">
        <h1 style="font-family: var(--font-display); font-size: clamp(28px, 4vw, 42px); font-weight: 700;">
            <?php echo __t('Contact Us', 'संपर्क करें'); ?>
        </h1>
        <p class="mt-3" style="opacity: 0.9;">
            <?php echo __t('We are here to help you with your Ayodhya journey', 'हम आपकी अयोध्या यात्रा में मदद के लिए यहाँ हैं'); ?>
        </p>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="row g-4">
            <!-- Contact Info -->
            <div class="col-lg-4">
                <div class="contact-card">
                    <h4 class="mb-4"><i class="fas fa-address-card" style="color: var(--color-primary);"></i> <?php echo __t('Contact Information', 'संपर्क जानकारी'); ?></h4>
                    
                    <div class="contact-info-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <h6><?php echo __t('Address', 'पता'); ?></h6>
                            <p><?php echo e($siteAddress); ?></p>
                        </div>
                    </div>
                    
                    <div class="contact-info-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <h6><?php echo __t('Phone', 'फोन'); ?></h6>
                            <p><a href="tel:+91<?php echo e($sitePhone); ?>">+91-<?php echo e($sitePhone); ?></a></p>
                        </div>
                    </div>
                    
                    <div class="contact-info-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h6><?php echo __t('Email', 'ईमेल'); ?></h6>
                            <p><a href="mailto:<?php echo e($siteEmail); ?>"><?php echo e($siteEmail); ?></a></p>
                        </div>
                    </div>
                    
                    <div class="contact-info-item">
                        <i class="fab fa-whatsapp" style="color: #25D366;"></i>
                        <div>
                            <h6>WhatsApp</h6>
                            <p><a href="https://wa.me/<?php echo e($whatsapp); ?>" target="_blank">+91-<?php echo e($sitePhone); ?></a></p>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <h6 class="mb-3"><?php echo __t('Quick Contact', 'त्वरित संपर्क'); ?></h6>
                    <div class="d-grid gap-2">
                        <a href="tel:+91<?php echo e($sitePhone); ?>" class="btn btn-hero btn-hero-primary">
                            <i class="fas fa-phone"></i> <?php echo __t('Call Now', 'अभी कॉल करें'); ?>
                        </a>
                        <a href="https://wa.me/<?php echo e($whatsapp); ?>" class="btn" style="background: #25D366; color: #fff;" target="_blank">
                            <i class="fab fa-whatsapp"></i> WhatsApp
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div class="col-lg-8">
                <div class="contact-card">
                    <h4 class="mb-4"><i class="fas fa-paper-plane" style="color: var(--color-primary);"></i> <?php echo __t('Send Message', 'संदेश भेजें'); ?></h4>
                    
                    <?php if ($success): ?>
                    <div class="alert alert-success"><i class="fas fa-check-circle"></i> <?php echo e($success); ?></div>
                    <?php endif; ?>
                    
                    <?php if ($error): ?>
                    <div class="alert alert-danger"><i class="fas fa-exclamation-circle"></i> <?php echo e($error); ?></div>
                    <?php endif; ?>
                    
                    <form method="POST" action="">
                        <?php echo csrfField(); ?>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label"><?php echo __t('Full Name *', 'पूरा नाम *'); ?></label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><?php echo __t('Email *', 'ईमेल *'); ?></label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><?php echo __t('Phone', 'फोन'); ?></label>
                                <input type="tel" name="phone" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><?php echo __t('Subject', 'विषय'); ?></label>
                                <input type="text" name="subject" class="form-control" placeholder="<?php echo __t('How can we help?', 'हम कैसे मदद कर सकते हैं?'); ?>">
                            </div>
                            <div class="col-12">
                                <label class="form-label"><?php echo __t('Message *', 'संदेश *'); ?></label>
                                <textarea name="message" class="form-control" rows="5" required placeholder="<?php echo __t('Type your message here...', 'अपना संदेश यहाँ लिखें...'); ?>"></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn-hero btn-hero-primary">
                                    <i class="fas fa-paper-plane"></i> <?php echo __t('Send Message', 'संदेश भेजें'); ?>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                
                <!-- Google Map -->
                <?php if ($googleMap): ?>
                <div class="contact-card mt-4">
                    <h4 class="mb-3"><i class="fas fa-map-marked-alt" style="color: var(--color-primary);"></i> <?php echo __t('Our Location', 'हमारा स्थान'); ?></h4>
                    <div class="map-container" style="border-radius: 12px; overflow: hidden;">
                        <?php echo $googleMap; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>