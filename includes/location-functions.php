<?php
require_once '../config/Database.php';

function searchLocations($name, $category) {
    global $mysqli;
    $query = "SELECT * FROM locations WHERE name LIKE ?";
    $params = ["%$name%"];
    $types = "s";
    
    if ($category) {
        $query .= " AND category = ?";
        $params[] = $category;
        $types .= "s";
    }

    $stmt = $mysqli->prepare($query);
    $stmt->bind_param($types, ...$params);
    
    $stmt->execute();
    $result = $stmt->get_result();
    $locations = $result->fetch_all(MYSQLI_ASSOC);
    
    $stmt->close();
    return $locations;
}
?>
