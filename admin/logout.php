<?php
/**
 * Ayodhya Ram Mandir - Admin Logout
 */

require_once __DIR__ . '/../includes/auth.php';

adminLogout();
setFlash('success', 'You have been logged out successfully.');
redirect(ADMIN_URL . '/login.php');
