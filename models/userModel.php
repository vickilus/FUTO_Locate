<?php
require_once '../config/Database.php';

class User {
    private $conn;
    private $table = 'users';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->conn;
    }

        // Fetch user details by ID
        public function getUserById($userId) {
            $stmt = $this->connection->prepare("SELECT * FROM users WHERE id = ?");
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            $stmt->close();
            return $user;
        }
    
        // Get all users for admin dashboard
        public function getAllUsers() {
            $stmt = $this->connection->prepare("SELECT * FROM users");
            $stmt->execute();
            $result = $stmt->get_result();
            $users = $result->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
            return $users;
        }
    

    // Create a new user
    public function create($username, $email, $password) {
        // Check if the username already exists
        $checkStmt = $this->conn->prepare("SELECT COUNT(*) FROM $this->table WHERE username = ?");
        $checkStmt->bind_param("s", $username);
        $checkStmt->execute();
        $checkStmt->bind_result($count);
        $checkStmt->fetch();
        $checkStmt->close();
    
        if ($count > 0) {
            // Username already exists, return false or handle the error as needed
            echo "Username already exists. Please choose a different one.";
            return false;
        }
    
        // If username is unique, proceed with the insertion
        $stmt = $this->conn->prepare("INSERT INTO $this->table (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);
        return $stmt->execute();
    }
    

    // Find user by email
    public function findByEmail($email) {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc(); // Return user data as associative array
    }

     // Find user by ID
     public function findById($userId) {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Update user profile information
    public function update($userId, $username, $email) {
        $stmt = $this->conn->prepare("UPDATE $this->table SET username = ?, email = ? WHERE id = ?");
        $stmt->bind_param("ssi", $username, $email, $userId);
        return $stmt->execute();
    }

    // Update user password
    public function updatePassword($userId, $password) {
        $stmt = $this->conn->prepare("UPDATE $this->table SET password = ? WHERE id = ?");
        $stmt->bind_param("si", $password, $userId);
        return $stmt->execute();
    }
}
?>
