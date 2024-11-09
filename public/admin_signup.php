<?php
session_start();
include '../config/Database.php'; // Database connection file

$errors = [];
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Form validation
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (empty($username)) {
        $errors[] = "Username is required.";
    }

    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters.";
    }

    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    // If no validation errors, proceed with database insertion
    if (empty($errors)) {
        if (isset($conn)) {
            // Check if email already exists
            $stmt = $conn->prepare("SELECT id FROM admin WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $errors[] = "An account with this email already exists.";
            } else {
                // Hash the password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Insert new admin
                $stmt = $conn->prepare("INSERT INTO admins (email, username, password) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $email, $username, $hashed_password);

                if ($stmt->execute()) {
                    $success = "Registration successful! You can now log in.";
                } else {
                    $errors[] = "Registration failed. Please try again.";
                }
            }
            $stmt->close();
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
    <title>Admin Signup</title>
    <link rel="stylesheet" href="../public/css/styles.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="signup-container">
        <h2>Admin Signup</h2>

        <!-- Success message -->
        <?php if (!empty($success)) : ?>
            <div class="success"><?php echo htmlspecialchars($success); ?></div>
        <?php endif; ?>

        <!-- Display errors, if any -->
        <?php if (!empty($errors)) : ?>
            <div class="errors">
                <?php foreach ($errors as $error) : ?>
                    <p><?php echo htmlspecialchars($error); ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form action="admin_signup.php" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <br><br>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <br><br>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <br><br>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
                <br><br>
            </div>
            <button type="submit">Sign Up</button>
        </form>
    </div>
</body>
</html>
