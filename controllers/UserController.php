<?php
require_once '../models/User.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    /**
     * Get user data by ID.
     * 
     * @param int $userId
     * @return array|null User data or null if not found.
     */
    public function getUserData($userId) {
        return $this->userModel->findById($userId);
    }

    /**
     * Update user profile information.
     * 
     * @param int $userId
     * @param string $username
     * @param string $email
     * @return bool
     */
    public function updateProfile($userId, $username, $email) {
        // Validate new email or other checks as necessary
        return $this->userModel->update($userId, $username, $email);
    }

    /**
     * Update user password.
     * 
     * @param int $userId
     * @param string $newPassword
     * @return bool
     */
    public function updatePassword($userId, $newPassword) {
        // Hash the new password before saving
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
        return $this->userModel->updatePassword($userId, $hashedPassword);
    }
}
?>
