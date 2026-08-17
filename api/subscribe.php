<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Method not allowed']); exit;
}

$email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
if (!$email) {
    echo json_encode(['success' => false, 'message' => 'Please enter a valid email address.']); exit;
}

try {
    $existing = dbFetch("SELECT id FROM newsletter_subscribers WHERE email = ?", [$email]);
    if ($existing) {
        echo json_encode(['success' => true, 'message' => 'You are already subscribed! Jai Shri Ram 🙏']); exit;
    }
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'] ?? '';
    $ua = substr($_SERVER['HTTP_USER_AGENT'] ?? '', 0, 255);
    dbInsert("INSERT INTO newsletter_subscribers (email, ip_address, user_agent) VALUES (?, ?, ?)", [$email, $ip, $ua]);
    echo json_encode(['success' => true, 'message' => 'Subscribed! Jai Shri Ram 🙏']);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Subscription failed. Please try again.']);
}
