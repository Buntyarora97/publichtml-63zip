<?php
/**
 * Ayodhya Ram Mandir - User Upload API
 * Handles user photo/video uploads for gallery
 */

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

require_once __DIR__ . '/../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// Verify CSRF
$token = $_POST['csrf_token'] ?? '';
if (!verifyCSRFToken($token)) {
    echo json_encode(['success' => false, 'message' => 'Invalid security token. Please refresh the page.']);
    exit;
}

// Validate input
$name = trim($_POST['name'] ?? '');
$city = trim($_POST['city'] ?? '');
$message = trim($_POST['message'] ?? '');

if (empty($name)) {
    echo json_encode(['success' => false, 'message' => 'Name is required.']);
    exit;
}

if (strlen($name) > 100 || strlen($city) > 100 || strlen($message) > 500) {
    echo json_encode(['success' => false, 'message' => 'Input too long.']);
    exit;
}

// Sanitize
$name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
$city = htmlspecialchars($city, ENT_QUOTES, 'UTF-8');
$message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

// Check file
if (empty($_FILES['media']) || $_FILES['media']['error'] !== UPLOAD_ERR_OK) {
    $errorMessages = [
        UPLOAD_ERR_INI_SIZE => 'File too large (server limit)',
        UPLOAD_ERR_FORM_SIZE => 'File too large',
        UPLOAD_ERR_PARTIAL => 'File upload incomplete',
        UPLOAD_ERR_NO_FILE => 'No file uploaded',
        UPLOAD_ERR_NO_TMP_DIR => 'Server error - no temp directory',
        UPLOAD_ERR_CANT_WRITE => 'Server error - cannot write file',
    ];
    $errCode = $_FILES['media']['error'] ?? UPLOAD_ERR_NO_FILE;
    echo json_encode(['success' => false, 'message' => $errorMessages[$errCode] ?? 'Upload error. Please try again.']);
    exit;
}

$file = $_FILES['media'];
$maxSize = 20 * 1024 * 1024; // 20MB

if ($file['size'] > $maxSize) {
    echo json_encode(['success' => false, 'message' => 'File too large. Maximum 20MB allowed.']);
    exit;
}

// Allowed types
$allowedImages = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];
$allowedVideos = ['video/mp4', 'video/webm', 'video/ogg'];
$allowedTypes = array_merge($allowedImages, $allowedVideos);

$mimeType = mime_content_type($file['tmp_name']);
if (!in_array($mimeType, $allowedTypes)) {
    echo json_encode(['success' => false, 'message' => 'Invalid file type. Only JPG, PNG, WebP, MP4, WebM are allowed.']);
    exit;
}

$isVideo = in_array($mimeType, $allowedVideos);
$fileType = $isVideo ? 'video' : 'image';

// Create upload directory
$uploadDir = ROOT_PATH . '/assets/uploads/' . ($isVideo ? 'user-photos' : 'user-photos');
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

// Generate unique filename
$ext = $isVideo ? 'mp4' : 'jpg';
if ($mimeType === 'image/png') $ext = 'png';
elseif ($mimeType === 'image/webp') $ext = 'webp';
elseif ($mimeType === 'image/gif') $ext = 'gif';
elseif ($mimeType === 'video/webm') $ext = 'webm';

$filename = 'user_' . time() . '_' . bin2hex(random_bytes(8)) . '.' . $ext;
$filepath = $uploadDir . '/' . $filename;
$webPath = 'assets/uploads/user-photos/' . $filename;

// Move file
if (!move_uploaded_file($file['tmp_name'], $filepath)) {
    echo json_encode(['success' => false, 'message' => 'Failed to save file. Please try again.']);
    exit;
}

// Compress image if possible
if (!$isVideo && function_exists('imagejpeg') && in_array($mimeType, ['image/jpeg', 'image/png', 'image/webp'])) {
    try {
        if ($mimeType === 'image/jpeg') $img = imagecreatefromjpeg($filepath);
        elseif ($mimeType === 'image/png') $img = imagecreatefrompng($filepath);
        elseif ($mimeType === 'image/webp') $img = imagecreatefromwebp($filepath);
        
        if (!empty($img)) {
            // Resize if too large
            $w = imagesx($img);
            $h = imagesy($img);
            $maxW = 1920;
            if ($w > $maxW) {
                $newH = (int)($h * $maxW / $w);
                $resized = imagescale($img, $maxW, $newH);
                if ($resized) {
                    imagedestroy($img);
                    $img = $resized;
                }
            }
            imagejpeg($img, $filepath, 85);
            imagedestroy($img);
        }
    } catch (Exception $e) {
        // Ignore compression errors
    }
}

// Save to database
try {
    $insertId = dbInsert(
        "INSERT INTO user_uploads (name, city, message, file_path, file_type, is_approved) VALUES (?, ?, ?, ?, ?, 0)",
        [$name, $city, $message, $webPath, $fileType]
    );
    
    echo json_encode([
        'success' => true,
        'message' => 'Upload successful! Your photo will be reviewed and published shortly.',
        'id' => $insertId,
        'file_type' => $fileType,
    ]);
} catch (Exception $e) {
    // Delete file if DB insert failed
    if (file_exists($filepath)) unlink($filepath);
    echo json_encode(['success' => false, 'message' => 'Database error. Please try again.']);
}
