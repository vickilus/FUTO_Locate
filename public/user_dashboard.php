<?php
session_start();
require_once __DIR__ . '/../controllers/DashboardController.php';
require_once __DIR__ . '/../config/Database.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Initialize dashboard controller
$db = new Database();
$connection = $db->getConnection();
$dashboardController = new DashboardController($connection);

// Fetch user data
$userId = $_SESSION['user_id'];
$data = $dashboardController->getUserDashboardData($userId);
$user = $data['user'];
$bookmarkedLocations = $data['bookmarkedLocations'];
?>

