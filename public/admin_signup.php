<?php
require_once '../controllers/AuthController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $auth = new AuthController();
    $result = $auth->signup($username, $email, $password);

    if ($result) {
        header("Location:../views/admin_login.php");
        exit();
    } else {
        echo "Error: user already exist.";
    }
}
?>
