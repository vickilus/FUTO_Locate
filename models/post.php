<?php
require_once '../config/Database.php';

class Post {
    private $conn;
    private $table = 'posts';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->conn;
    }

    // Get featured posts for the home page
    public function getFeaturedPosts() {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE is_featured = 1 ORDER BY created_at DESC LIMIT 5");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
