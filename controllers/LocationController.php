<?php
class LocationController {
    private $connection;

    public function __construct($dbConnection) {
        $this->connection = $dbConnection;
    }

    // Search location by name and category
    public function searchLocation($name, $category) {
        $query = "SELECT * FROM locations WHERE name LIKE ? AND category LIKE ?";
        $stmt = $this->connection->prepare($query);

        $name = "%$name%";
        $category = $category ? "%$category%" : '%';
        $stmt->bind_param("ss", $name, $category);
        $stmt->execute();
        
        $result = $stmt->get_result();
        $locations = [];

        while ($row = $result->fetch_assoc()) {
            $locations[] = $row;
        }

        // Return results as JSON
        header('Content-Type: application/json');
        echo json_encode($locations);
    }

    // Show specific location details
    public function showLocation($id) {
        $query = "SELECT * FROM locations WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $location = $result->fetch_assoc();

        // Render detailed view with PHP or return JSON
        include __DIR__ . '/../views/location_detail.php';
    }
}
?>
