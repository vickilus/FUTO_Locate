<?php
class LocationModel {
    private $connection;

    public function __construct($dbConnection) {
        $this->connection = $dbConnection;
    }

    // Get all locations for admin view
    public function getAllLocations() {
        $stmt = $this->connection->prepare("SELECT * FROM locations");
        $stmt->execute();
        $result = $stmt->get_result();
        $locations = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $locations;
    }

    // Get bookmarked locations for a specific user
    public function getBookmarkedLocations($userId) {
        $stmt = $this->connection->prepare("SELECT * FROM locations WHERE id IN (SELECT location_id FROM user_bookmarks WHERE user_id = ?)");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $locations = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $locations;
    }
}
?>
