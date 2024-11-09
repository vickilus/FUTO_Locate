<?php
require_once '../config/Database.php'; // Ensure the path to db.php is correct

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Retrieve all users
    $result = $mysqli->query("SELECT id, username, email, role, status FROM users");
    $users = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($users);
    exit;
}
 
    // Check if the mysqli connection is established
    
    $mysqli = new mysqli("localhost", "root", "", "futo_locate");
    
    // Check connection
    if ($mysqli->connect_error) {
        die("Database connection failed: " . $mysqli->connect_error);
    }


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = ["success" => false, "message" => "Invalid action."];
    
    if (isset($_POST['action']) && isset($_POST['user_id'])) {
        $userId = (int)$_POST['user_id'];

        if ($_POST['action'] === 'change_status' && isset($_POST['status'])) {
            $newStatus = $_POST['status'] === 'active' ? 'active' : 'inactive';
            $stmt = $mysqli->prepare("UPDATE users SET status = ? WHERE id = ?");
            $stmt->bind_param("si", $newStatus, $userId);
            $response["success"] = $stmt->execute();
            $response["message"] = $response["success"] ? "User status updated." : "Failed to update user status.";
            $stmt->close();
        } elseif ($_POST['action'] === 'change_role' && isset($_POST['role'])) {
            $newRole = $_POST['role'] === 'admin' ? 'admin' : 'user';
            $stmt = $mysqli->prepare("UPDATE users SET role = ? WHERE id = ?");
            $stmt->bind_param("si", $newRole, $userId);
            $response["success"] = $stmt->execute();
            $response["message"] = $response["success"] ? "User role updated." : "Failed to update user role.";
            $stmt->close();
        }
    }

    echo json_encode($response);
    exit;
}

$mysqli->close();
?>
