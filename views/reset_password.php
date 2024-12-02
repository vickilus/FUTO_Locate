<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../src/models/UserModel.php';
require_once __DIR__ . '/../src/utilities/AuthHelper.php';

// Initialize database connection
$db = new Database();
$connection = $db->getConnection();

// Instantiate the UserModel
$userModel = new UserModel($connection);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // Validate token, passwords, and confirmation match
    if (empty($token)) {
        header("Location: reset_password.php?error=Invalid token.");
        exit();
    }
    if ($newPassword !== $confirmPassword) {
        header("Location: reset_password.php?token=$token&error=Passwords do not match.");
        exit();
    }

    // Verify the token and get user ID
    $userId = $userModel->verifyResetToken($token);
    if (!$userId) {
        header("Location: reset_password.php?error=Invalid or expired token.");
        exit();
    }

    // Hash the new password
    $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

    // Update the user's password and clear reset token
    if ($userModel->updatePassword($userId, $hashedPassword)) {
        $userModel->clearResetToken($userId);
        header("Location: login.php?success=Password reset successfully. Please log in.");
    } else {
        header("Location: reset_password.php?token=$token&error=Failed to reset password.");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="/public/assets/css/styles.css">
</head>
<body>
    <h2>Reset Your Password</h2>

    <?php
    // Display error or success messages
    if (isset($_GET['error'])) {
        echo '<p class="error-message">' . htmlspecialchars($_GET['error']) . '</p>';
    } elseif (isset($_GET['success'])) {
        echo '<p class="success-message">' . htmlspecialchars($_GET['success']) . '</p>';
    }
    ?>

    <form action="reset_password.php" method="POST">
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token'] ?? ''); ?>">
        
        <label for="new_password">New Password:</label>
        <input type="password" name="new_password" required>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" name="confirm_password" required>

        <button type="submit">Reset Password</button>
    </form>
</body>
</html>
