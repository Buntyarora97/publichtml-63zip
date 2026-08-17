<?php
/**
 * Admin Password Reset Utility
 * AyodhyaRamMandir.in
 * 
 * SECURITY: Delete or rename this file after use!
 * इस फाइल को उपयोग के बाद तुरंत डिलीट करें!
 */

// Simple security token — change this before uploading
define('RESET_TOKEN', 'ayodhya_reset_2025');

require_once __DIR__ . '/config/database.php';

$message = '';
$error = '';
$step = 'form';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = trim($_POST['token'] ?? '');
    $newPassword = $_POST['new_password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';
    $username = trim($_POST['username'] ?? 'admin');

    if ($token !== RESET_TOKEN) {
        $error = '❌ गलत Security Token। पुनः प्रयास करें।';
    } elseif (strlen($newPassword) < 8) {
        $error = '❌ पासवर्ड कम से कम 8 अक्षर का होना चाहिए।';
    } elseif ($newPassword !== $confirmPassword) {
        $error = '❌ पासवर्ड और Confirm Password मेल नहीं खाते।';
    } else {
        try {
            $db = getDatabase();
            $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

            // Check if user exists
            $stmt = $db->prepare('SELECT id, username FROM users WHERE username = ?');
            $stmt->execute([$username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                // Update existing user
                $update = $db->prepare('UPDATE users SET password = ?, updated_at = ? WHERE username = ?');
                $update->execute([$hashedPassword, date('Y-m-d H:i:s'), $username]);
                $message = "✅ \"$username\" का पासवर्ड सफलतापूर्वक बदल दिया गया! अब admin panel में login करें।";
            } else {
                // Create new admin user
                $insert = $db->prepare('INSERT INTO users (username, password, name, email, role, is_active, created_at) VALUES (?, ?, ?, ?, ?, 1, ?)');
                $insert->execute([$username, $hashedPassword, 'Admin User', 'info@ayodhyarammandir.in', 'super_admin', date('Y-m-d H:i:s')]);
                $message = "✅ नया Admin User \"$username\" बना दिया गया! अब login करें।";
            }
            $step = 'success';
        } catch (Exception $e) {
            $error = '❌ Database Error: ' . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Password Reset — AyodhyaRamMandir.in</title>
    <meta name="robots" content="noindex, nofollow">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #1a0000, #4a0e00); min-height: 100vh; display: flex; align-items: center; justify-content: center; font-family: 'Segoe UI', sans-serif; }
        .card { max-width: 500px; width: 100%; border-radius: 20px; box-shadow: 0 20px 60px rgba(0,0,0,0.5); border: none; }
        .card-header { background: linear-gradient(135deg, #f55900, #ff8237); color: #fff; border-radius: 20px 20px 0 0; padding: 25px; text-align: center; }
        .warning-box { background: #fff3cd; border: 2px solid #ffc107; border-radius: 10px; padding: 15px; margin-bottom: 20px; font-size: 13px; }
        .form-control:focus { border-color: #f55900; box-shadow: 0 0 0 0.2rem rgba(245,89,0,0.25); }
        .btn-primary { background: #f55900; border-color: #f55900; font-weight: 700; padding: 12px; border-radius: 10px; }
        .btn-primary:hover { background: #d44a00; border-color: #d44a00; }
    </style>
</head>
<body>
<div class="container">
    <div class="card mx-auto">
        <div class="card-header">
            <div style="font-size: 2.5rem; margin-bottom: 10px;">🛕</div>
            <h4 class="mb-0 fw-bold">Admin Password Reset</h4>
            <div style="font-size: 13px; opacity: 0.9; margin-top: 5px;">AyodhyaRamMandir.in</div>
        </div>
        <div class="card-body p-4">

            <div class="warning-box">
                ⚠️ <strong>सुरक्षा चेतावनी:</strong> इस फाइल को उपयोग के बाद तुरंत <strong>डिलीट या rename</strong> करें! यह फाइल server पर सार्वजनिक रूप से accessible है।
            </div>

            <?php if ($error): ?>
            <div class="alert alert-danger rounded-3">
                <?= htmlspecialchars($error) ?>
            </div>
            <?php endif; ?>

            <?php if ($step === 'success' && $message): ?>
            <div class="alert alert-success rounded-3 text-center">
                <div style="font-size: 2rem; margin-bottom: 10px;">✅</div>
                <strong><?= htmlspecialchars($message) ?></strong>
                <hr>
                <a href="/admin" class="btn btn-success btn-sm mt-2">Admin Panel खोलें</a>
                <div style="font-size: 12px; color: #666; margin-top: 10px;">⚠️ कृपया अब इस फाइल को server से <strong>डिलीट</strong> करें!</div>
            </div>
            <?php else: ?>

            <form method="POST" autocomplete="off">
                <div class="mb-3">
                    <label class="form-label fw-semibold">🔐 Security Token</label>
                    <input type="password" name="token" class="form-control" placeholder="Security token दर्ज करें" required>
                    <div class="form-text">Default: <code>ayodhya_reset_2025</code> (पहले reset-admin-password.php में RESET_TOKEN बदलें)</div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">👤 Username</label>
                    <input type="text" name="username" class="form-control" value="admin" placeholder="admin">
                    <div class="form-text">Admin username (default: admin)</div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">🔑 नया पासवर्ड</label>
                    <input type="password" name="new_password" class="form-control" placeholder="कम से कम 8 अक्षर" required minlength="8">
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">🔑 पासवर्ड Confirm करें</label>
                    <input type="password" name="confirm_password" class="form-control" placeholder="पासवर्ड दोबारा दर्ज करें" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    🔓 पासवर्ड Reset करें
                </button>
            </form>

            <div class="text-center mt-3">
                <a href="/admin" style="color: #f55900; font-size: 14px;">← Admin Panel पर जाएं</a>
            </div>

            <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html>
