<?php
require_once '../config/Database.php';

function searchLocations($query) {
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT * FROM locations WHERE name LIKE ?");
    $searchQuery = "%" . $query . "%";
    $stmt->bind_param("s", $searchQuery);
    
    $stmt->execute();
    $result = $stmt->get_result();
    $locations = $result->fetch_all(MYSQLI_ASSOC);
    
    $stmt->close();
    return $locations;
}
?>
