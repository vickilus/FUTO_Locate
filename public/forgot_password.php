<?php
// forgot_password.php

// Include database connection and mailer setup
include('Database.php');
include('mailer.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["status" => "error", "message" => "Invalid email format."]);
        exit;
    }

    // Check if email exists in the database
    $query = $db->prepare("SELECT id FROM users WHERE email = :email");
    $query->bindParam(':email', $email);
    $query->execute();

    if ($query->rowCount() == 0) {
        echo json_encode(["status" => "error", "message" => "Email not found."]);
        exit;
    }

    // Generate a unique token
    $token = bin2hex(random_bytes(32));
    $expiry = date("Y-m-d H:i:s", strtotime("+1 hour")); // Token valid for 1 hour

    // Store the token and expiry in the database
    $user = $query->fetch();
    $insertToken = $db->prepare("INSERT INTO password_resets (user_id, token, expiry) VALUES (:user_id, :token, :expiry)");
    $insertToken->execute([':user_id' => $user['id'], ':token' => $token, ':expiry' => $expiry]);

    // Send reset link email
    $resetLink = "https://yourwebsite.com/reset_password.php?token=$token";
    $subject = "Password Reset Request";
    $message = "Click the link to reset your password: $resetLink";
    
    if (sendEmail($email, $subject, $message)) {
        echo json_encode(["status" => "success", "message" => "A reset link has been sent to your email."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to send reset link."]);
    }
}
?>
