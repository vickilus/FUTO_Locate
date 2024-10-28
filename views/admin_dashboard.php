<?php
session_start();
require_once __DIR__ . '/../controllers/DashboardController.php';
require_once __DIR__ . '/../config/database.php';

// Check if the user is an admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Initialize dashboard controller
$db = new Database();
$connection = $db->getConnection();
$dashboardController = new DashboardController($connection);

// Fetch data for admin dashboard
$data = $dashboardController->getAdminDashboardData();
$users = $data['users'];
$locations = $data['locations'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="/public/assets/css/styles.css">
</head>
<body>
    <h2>Admin Dashboard</h2>

    <section>
        <h3>All Users</h3>
        <ul>
            <?php foreach ($users as $user): ?>
                <li>
                    <?php echo htmlspecialchars($user['username']); ?> - <?php echo htmlspecialchars($user['email']); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>

    <section>
        <h3>All Locations</h3>
        <ul>
            <?php foreach ($locations as $location): ?>
                <li>
                    <h4><?php echo htmlspecialchars($location['name']); ?></h4>
                    <p><?php echo htmlspecialchars($location['description']); ?></p>
                    <p>Latitude: <?php echo htmlspecialchars($location['latitude']); ?>, Longitude: <?php echo htmlspecialchars($location['longitude']); ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
</body>
</html>
