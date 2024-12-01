<?php
// Place this at the top of admin_dashboard.php to handle session and fetch users
session_start();
include '../config/Database.php';

// Fetch users from the database
function fetchUsers($conn) {
    $result = $conn->query("SELECT * FROM users");
    return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
}

$users = fetchUsers($conn);

// Create a new user
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);
    $stmt->execute();
    header("Location: ../views/admin_dashboard.php");
    exit();
}

// Update an existing user
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("UPDATE users SET username = ?, email = ? WHERE id = ?");
    $stmt->bind_param("ssi", $username, $email, $id);
    $stmt->execute();
    header("Location: ../views/admin_dashboard.php");
    exit();
}

// Delete a user
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: ../views/admin_dashboard.php");
    exit();
}

// Fetch users to display
$users = fetchUsers($conn);
?>