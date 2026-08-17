<?php
/**
 * Ayodhya Ram Mandir - Admin Login
 */

require_once __DIR__ . '/../includes/auth.php';

// Redirect if already logged in
if (isAdminLoggedIn()) {
    redirect(ADMIN_URL . '/dashboard.php');
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if (empty($username) || empty($password)) {
        $error = 'Please enter both username and password.';
    } else {
        $result = adminLogin($username, $password);
        if ($result['success']) {
            redirect(ADMIN_URL . '/dashboard.php');
        } else {
            $error = $result['error'];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Ayodhya Ram Mandir</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --color-primary: #F55900;
            --color-secondary: #FF8237;
            --color-accent: #FFAA6E;
            --color-light: #FFD3A5;
            --color-bg: #FFFEBC;
        }
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--color-bg) 0%, var(--color-light) 50%, var(--color-accent) 100%);
            font-family: 'Inter', sans-serif;
        }
        .login-container {
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }
        .login-card {
            background: #fff;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(245, 89, 0, 0.2);
            border: 1px solid var(--color-light);
        }
        .login-logo {
            text-align: center;
            margin-bottom: 30px;
        }
        .login-logo img {
            height: 70px;
            margin-bottom: 10px;
        }
        .login-logo h2 {
            font-family: 'Cinzel', serif;
            font-size: 22px;
            color: var(--color-primary);
            margin: 0;
        }
        .login-logo p {
            font-size: 13px;
            color: #666;
            margin: 0;
        }
        .form-control {
            border: 2px solid var(--color-light);
            border-radius: 12px;
            padding: 12px 15px;
            font-size: 14px;
        }
        .form-control:focus {
            border-color: var(--color-secondary);
            box-shadow: 0 0 0 4px rgba(255, 130, 55, 0.1);
        }
        .btn-login {
            background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
            color: #fff;
            border: none;
            border-radius: 12px;
            padding: 14px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(245, 89, 0, 0.3);
            color: #fff;
        }
        .input-group-text {
            background: var(--color-bg);
            border: 2px solid var(--color-light);
            border-right: none;
            color: var(--color-primary);
        }
        .form-control {
            border-left: none;
        }
        .alert {
            border-radius: 12px;
            font-size: 14px;
        }
        .back-link {
            text-align: center;
            margin-top: 20px;
        }
        .back-link a {
            color: var(--color-primary);
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-logo">
                <img src="<?php echo assetUrl('images/logo.png'); ?>" alt="Ayodhya Ram Mandir" onerror="this.style.display='none'">
                <h2><i class="fas fa-om"></i> Ayodhya Ram Mandir</h2>
                <p>Admin Panel</p>
            </div>
            
            <?php if ($error): ?>
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i> <?php echo e($error); ?>
            </div>
            <?php endif; ?>
            
            <form method="POST" action="">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" name="username" class="form-control" placeholder="Enter username" required autofocus>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-login">
                    <i class="fas fa-sign-in-alt"></i> Login
                </button>
            </form>
        </div>
        <div class="back-link">
            <a href="<?php echo SITE_URL; ?>/"><i class="fas fa-arrow-left"></i> Back to Website</a>
        </div>
    </div>
</body>
</html>