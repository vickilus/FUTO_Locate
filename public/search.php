<?php
// Database connection
$host = 'localhost';
$dbname = 'futo_locate';
$user = 'root';
$pass = '';

// Connect using MySQLi
$mysqli = new mysqli($host, $user, $pass, $dbname);

// Check for connection errors
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Handle the search request
if (isset($_GET['q'])) {
    $searchQuery = $_GET['q'];
    $query = "SELECT * FROM locations WHERE name LIKE ?";
    $stmt = $mysqli->prepare($query);
    
    if ($stmt) {
        // Bind parameters and execute the statement
        $likeQuery = '%' . $searchQuery . '%';
        $stmt->bind_param('s', $likeQuery);
        $stmt->execute();
        
        // Get the result
        $result = $stmt->get_result();
        $locations = $result->fetch_all(MYSQLI_ASSOC);
        
        // Send JSON response
        header('Content-Type: application/json');
        echo json_encode($locations);
        
        // Close statement and connection
        $stmt->close();
    } else {
        echo "Failed to prepare statement: " . $mysqli->error;
    }
}

$mysqli->close();
?>
