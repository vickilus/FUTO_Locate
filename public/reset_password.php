<?php
// reset_password.php

session_start();

// Retrieve token from form data and session
$formToken = $_POST['token'] ?? '';
$sessionToken = $_SESSION['reset_token'] ?? '';

if ($formToken !== $sessionToken) {
    die("Invalid or expired token.");
}

// Validate and process the new password
$newPassword = $_POST['new_password'];
$confirmPassword = $_POST['confirm_password'];

// Check password confirmation
if ($newPassword !== $confirmPassword) {
    die("Passwords do not match.");
}

// Hash the new password and update it in the database (replace this with your actual password update logic)
$hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
// Assume $userId is the user ID associated with the password reset

// Example of updating password in the database
// $db->prepare("UPDATE users SET password = :password WHERE id = :id")
//     ->execute([':password' => $hashedPassword, ':id' => $userId]);

// Clear the reset token from the session after a successful password reset
unset($_SESSION['reset_token']);

// Redirect or provide feedback to the user
echo "Password reset successfully.";
?>
