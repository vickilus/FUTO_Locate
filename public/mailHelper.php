<?php
require_once '/../helpers/mailHelper.php';

$recipientEmail = 'user@example.com';
$subject = 'Welcome to FUTO Locate';
$body = '<h1>Welcome!</h1><p>Thank you for joining FUTO Locate.</p>';

$response = sendMail($recipientEmail, $subject, $body);

if ($response['success']) {
    echo 'Email sent successfully!';
} else {
    echo 'Error: ' . $response['message'];
}
?>
