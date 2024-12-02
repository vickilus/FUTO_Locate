<?php
require_once __DIR__ . '/../models/LocationModel.php';
require_once __DIR__ . '/../models/userModel.php';

class DashboardController {
    private $locationModel;
    private $userModel;

    public function __construct($dbConnection) {
        $this->locationModel = new LocationModel($dbConnection);
        $this->userModel = new UserModel($dbConnection);
    }

    // Fetch user data for the user dashboard
    public function getUserDashboardData($userId) {
        $user = $this->userModel->getUserById($userId);
        $bookmarkedLocations = $this->locationModel->getBookmarkedLocations($userId);
        return ['user' => $user, 'bookmarkedLocations' => $bookmarkedLocations];
    }

    // Fetch data for the admin dashboard
    public function getAdminDashboardData() {
        $locations = $this->locationModel->getAllLocations();
        $users = $this->userModel->getAllUsers();
        return ['locations' => $locations, 'users' => $users];
    }
}
?>
