<?php
// reset_password.php

session_start();

// Check if reset token exists in the session
if (!isset($_SESSION['reset_token'])) {
    die("Token not found. Please request a new password reset.");
}

// Retrieve the token from the session
$token = $_SESSION['reset_token'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reset Password</title>
  <link rel="stylesheet" href="../public/css/webpage.css">
</head>
<body>
  <h2>Reset Your Password</h2>
  <form action="reset_password.php" method="POST">
    <!-- Embed the token securely as a hidden field -->
    <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">

    <label for="newPassword">New Password:</label>
    <input type="password" id="newPassword" name="new_password" required minlength="8">

    <label for="confirmPassword">Confirm New Password:</label>
    <input type="password" id="confirmPassword" name="confirm_password" required minlength="8">

    <button type="submit">Reset Password</button>
  </form>
</body>
</html>

