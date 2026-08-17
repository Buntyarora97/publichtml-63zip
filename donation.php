<?php
/**
 * Ayodhya Ram Mandir - Donation & Prasad Page
 */

require_once __DIR__ . '/includes/functions.php';

$pageType = 'page';
$pageSlug = 'donation';
$pageTitle = 'Donation & Prasad';

// Get donation settings
$donationSettings = [];
$settings = dbFetchAll("SELECT * FROM donation_settings");
foreach ($settings as $s) {
    $donationSettings[$s['setting_key']] = $s['setting_value'];
}

// Handle donation request
$success = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $name = cleanInput($_POST['donor_name'] ?? '');
        $email = cleanInput($_POST['email'] ?? '');
        $phone = cleanInput($_POST['phone'] ?? '');
        $amount = floatval($_POST['amount'] ?? 0);
        $method = cleanInput($_POST['payment_method'] ?? 'upi');
        $purpose = cleanInput($_POST['purpose'] ?? '');
        
        if ($name && $amount > 0) {
            dbQuery(
                "INSERT INTO donation_requests (donor_name, email, phone, amount, payment_method, purpose, ip_address) VALUES (?, ?, ?, ?, ?, ?, ?)",
                [$name, $email, $phone, $amount, $method, $purpose, $_SERVER['REMOTE_ADDR'] ?? '']
            );
            $success = 'Jai Shri Ram! Your donation request has been received. Please complete the payment using the details below.';
        }
    } catch (Exception $e) {
        $error = 'Something went wrong. Please try again.';
    }
}

$lang = getCurrentLang();

include __DIR__ . '/includes/header.php';
?>

<section class="page-hero" style="background: linear-gradient(135deg, var(--color-primary), var(--color-secondary)); padding: 80px 0 60px; text-align: center; color: #fff;">
    <div class="container">
        <h1 style="font-family: var(--font-display); font-size: clamp(28px, 4vw, 42px); font-weight: 700;">
            <?php echo __t('Donation & Prasad', 'दान और प्रसाद'); ?>
        </h1>
        <p class="mt-3" style="opacity: 0.9;">
            <?php echo __t('Support this devotional portal and receive divine blessings', 'इस भक्ति पोर्टल का समर्थन करें और दिव्य आशीर्वाद प्राप्त करें'); ?>
        </p>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <?php if ($success): ?>
        <div class="alert alert-success mb-4"><i class="fas fa-check-circle"></i> <?php echo e($success); ?></div>
        <?php endif; ?>
        
        <div class="row g-4">
            <!-- UPI / QR Code -->
            <div class="col-lg-4">
                <div class="contact-card text-center">
                    <div class="donation-icon mb-3">
                        <i class="fas fa-qrcode" style="font-size: 48px; color: var(--color-primary);"></i>
                    </div>
                    <h4><?php echo __t('UPI / QR Code', 'UPI / QR कोड'); ?></h4>
                    <p class="mb-3"><?php echo __t('Scan QR code or use UPI ID to donate instantly', 'तुरंत दान करने के लिए QR कोड स्कैन करें या UPI ID का उपयोग करें'); ?></p>
                    
                    <?php if (!empty($donationSettings['qr_code_image'])): ?>
                    <img src="<?php echo SITE_URL . '/' . $donationSettings['qr_code_image']; ?>" alt="Donation QR" class="img-fluid mb-3" style="max-width: 200px;">
                    <?php endif; ?>
                    
                    <?php if (!empty($donationSettings['upi_id'])): ?>
                    <div class="upi-id-box p-3 rounded" style="background: var(--color-bg);">
                        <p class="mb-1" style="font-size: 12px; color: var(--color-text-light);">UPI ID</p>
                        <p class="mb-0" style="font-weight: 600; color: var(--color-primary);"><i class="fas fa-copy"></i> <?php echo e($donationSettings['upi_id']); ?></p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Bank Transfer -->
            <div class="col-lg-4">
                <div class="contact-card">
                    <div class="donation-icon mb-3 text-center">
                        <i class="fas fa-university" style="font-size: 48px; color: var(--color-secondary);"></i>
                    </div>
                    <h4 class="text-center"><?php echo __t('Bank Transfer', 'बैंक ट्रांसफर'); ?></h4>
                    <p class="text-center mb-3"><?php echo __t('Transfer directly to our bank account', 'सीधे हमारे बैंक खाते में ट्रांसफर करें'); ?></p>
                    
                    <table class="table table-borderless" style="font-size: 14px;">
                        <?php if (!empty($donationSettings['bank_name'])): ?>
                        <tr><td><strong><?php echo __t('Bank', 'बैंक'); ?></strong></td><td><?php echo e($donationSettings['bank_name']); ?></td></tr>
                        <?php endif; ?>
                        <?php if (!empty($donationSettings['account_name'])): ?>
                        <tr><td><strong><?php echo __t('Account Name', 'खाता नाम'); ?></strong></td><td><?php echo e($donationSettings['account_name']); ?></td></tr>
                        <?php endif; ?>
                        <?php if (!empty($donationSettings['account_number'])): ?>
                        <tr><td><strong><?php echo __t('Account No', 'खाता संख्या'); ?></strong></td><td><?php echo e($donationSettings['account_number']); ?></td></tr>
                        <?php endif; ?>
                        <?php if (!empty($donationSettings['ifsc_code'])): ?>
                        <tr><td><strong>IFSC</strong></td><td><?php echo e($donationSettings['ifsc_code']); ?></td></tr>
                        <?php endif; ?>
                        <?php if (!empty($donationSettings['branch_name'])): ?>
                        <tr><td><strong><?php echo __t('Branch', 'शाखा'); ?></strong></td><td><?php echo e($donationSettings['branch_name']); ?></td></tr>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
            
            <!-- Donation Form -->
            <div class="col-lg-4">
                <div class="contact-card">
                    <div class="donation-icon mb-3 text-center">
                        <i class="fas fa-hand-holding-heart" style="font-size: 48px; color: var(--color-primary);"></i>
                    </div>
                    <h4 class="text-center"><?php echo __t('Donation Form', 'दान फॉर्म'); ?></h4>
                    
                    <form method="POST" action="">
                        <?php echo csrfField(); ?>
                        <div class="mb-3">
                            <label class="form-label"><?php echo __t('Full Name', 'पूरा नाम'); ?></label>
                            <input type="text" name="donor_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><?php echo __t('Email', 'ईमेल'); ?></label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><?php echo __t('Phone', 'फोन'); ?></label>
                            <input type="tel" name="phone" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><?php echo __t('Amount (INR)', 'राशि (₹)'); ?></label>
                            <input type="number" name="amount" class="form-control" min="11" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><?php echo __t('Payment Method', 'भुगतान विधि'); ?></label>
                            <select name="payment_method" class="form-select">
                                <option value="upi">UPI</option>
                                <option value="bank_transfer">Bank Transfer</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><?php echo __t('Purpose (Optional)', 'उद्देश्य (वैकल्पिक)'); ?></label>
                            <textarea name="purpose" class="form-control" rows="2"></textarea>
                        </div>
                        <button type="submit" class="btn-hero btn-hero-primary w-100">
                            <i class="fas fa-donate"></i> <?php echo __t('Donate Now', 'दान करें'); ?>
                        </button>
                    </form>
                    
                    <p class="mt-3" style="font-size: 12px; color: var(--color-text-light);">
                        <i class="fas fa-info-circle"></i> 
                        <?php echo e($lang === 'hi' ? ($donationSettings['donation_note_hi'] ?? '') : ($donationSettings['donation_note'] ?? '')); ?>
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Disclaimer -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle"></i> 
                    <strong><?php echo __t('Disclaimer:', 'अस्वीकरण:'); ?></strong> 
                    <?php echo __t(
                        'This is a devotional information portal. All donations are voluntary and used for maintaining this website and supporting temple-related activities. Please consult a financial advisor for large donations.',
                        'यह एक भक्ति सूचना पोर्टल है। सभी दान स्वैच्छिक हैं और इस वेबसाइट के रखरखाव और मंदिर संबंधी गतिविधियों का समर्थन करने के लिए उपयोग किए जाते हैं। बड़े दान के लिए कृपया वित्तीय सलाहकार से परामर्श करें।'
                    ); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>