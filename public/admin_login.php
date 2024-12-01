<?php
require_once __DIR__ .'/../controllers/AuthController.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $auth = new AuthController();
    $user = $auth->login($email, $password);

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_role'] = $user['role'];
        $_SESSION['username'] = $user['username'];
        header("Location: ../views/admin_dashboard.php");
        exit();
    } else {
        echo "Invalid email or password";
    }
}
?>