<?php
require_once '../config/Database.php'; // Ensure the path to db.php is correct

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    // Check if the mysqli connection is established
    
    $mysqli = new mysqli("localhost", "root", "", "futo_locate");
    
    // Check connection
    if ($mysqli->connect_error) {
        die("Database connection failed: " . $mysqli->connect_error);
    }
    
    // Insert the new location into the database
    $query = "INSERT INTO locations (name, category, description, latitude, longitude) 
              VALUES (?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);

    if ($stmt) {
        $stmt->bind_param("sssdd", $name, $category, $description, $latitude, $longitude);

        if ($stmt->execute()) {
            echo "Location added successfully!";
        } else {
            echo "Error executing query: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $mysqli->error;
    }

    $mysqli->close();
}
?>
