<?php
// forgot_password.php (controller logic)

// Start the session
session_start();

// Generate a unique reset token
$token = bin2hex(random_bytes(32)); // Example for a 64-character token
$_SESSION['reset_token'] = $token;

// Redirect to reset_password.php without including the token in the URL
header("Location: ../views/reset_password.php");
exit();
?>