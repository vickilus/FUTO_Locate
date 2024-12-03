<?php
// Autoload PHPMailer
require '../vendor/src/PHPMailer.php';
require '../vendor/src/SMTP.php';
require '../vendor/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendMail($recipientEmail, $subject, $body, $recipientName = "User") {
    $mail = new PHPMailer(true);

    try {
        // SMTP server configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com'; // Replace with your SMTP server (e.g., smtp.gmail.com for Gmail)
        $mail->SMTPAuth = true;
        $mail->Username = 'your_email@example.com'; // Your email address
        $mail->Password = 'your_password'; // Your email password or app-specific password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587; // Use port 587 for TLS or 465 for SSL

        // Email headers and body
        $mail->setFrom('your_email@example.com', 'FUTO Locate Admin'); // Replace with your email and sender name
        $mail->addAddress($recipientEmail, $recipientName); // Recipient email and name

        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = $body;

        $mail->send();
        return ["success" => true, "message" => "Email sent successfully."];
    } catch (Exception $e) {
        return ["success" => false, "message" => "Mailer Error: {$mail->ErrorInfo}"];
    }
}
?>
