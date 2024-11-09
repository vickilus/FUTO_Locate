<?php
session_start();
include '../config/Database.php'; // Database connection file

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Form validation
    if (empty($email)) {
        $errors[] = "Email is required.";
    }
    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    // If no validation errors
    if (empty($errors)) {
        if (isset($conn)) {
            // Prepare the SQL statement to fetch admin details
            $stmt = $conn->prepare("SELECT * FROM admins WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $admin = $result->fetch_assoc();

                // Verify the password
                if (password_verify($password, $admin['password'])) {
                    // Successful login: Set session variables
                    $_SESSION['admin_id'] = $admin['id'];
                    $_SESSION['admin_email'] = $admin['email'];
                    $_SESSION['admin_username'] = $admin['username'];

                    // Redirect to admin dashboard
                    header("Location: ../views/admin_dashboard.php");
                    exit();
                } else {
                    $errors[] = "Incorrect password.";
                }
            } else {
                $errors[] = "No admin found with this email.";
            }
        } else {
            $errors[] = "Database connection error.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../public/css/styles.css">  <!-- Link to your CSS file -->
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>

        <!-- Display errors, if any -->
        <?php if (!empty($errors)) : ?>
            <div class="errors">
                <?php foreach ($errors as $error) : ?>
                    <p><?php echo htmlspecialchars($error); ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form action="admin_login.php" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
