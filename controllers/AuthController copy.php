<?php
require_once __DIR__ . '/../models/userModel.php';

class AuthController {
    private $user;

    public function __construct() {
        $this->user = new User();
    }

    /**
     * Signup a new user
     * @param string $username
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function signup($username, $email, $password) {
        // Check if email already exists
        if ($this->user->findByEmail($email)) {
            return false; // Email already registered
        }
        
        // Hash the password and create the new user
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        return $this->user->create($username, $email, $hashedPassword);
    }

    /**
     * Login a user
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function login($email, $password) {
        $user = $this->user->findByEmail($email);
        
        if ($user && password_verify($password, $user['password'])) {
            // Start the session and set user data
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role']; // Could be 'user' or 'admin'

            return true;
        }
        
        return false; // Login failed
    }

    /**
     * Logout a user
     */
    public function logout() {
        session_start();
        
        // Clear all session data and destroy the session
        $_SESSION = [];
        session_destroy();
        
        // Optionally, redirect to the login page
        header("Location: /../views/home.php");
        exit();
    }
}
?>

