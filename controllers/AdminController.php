<?php

// Handles admin-specific actions, such as managing locations and users.

class AdminController {
    private $userModel;
    private $locationModel;

    public function __construct($dbConnection) {
        $this->userModel = new UserModel($dbConnection);
        $this->locationModel = new LocationModel($dbConnection);
    }

    public function manageUsers() {
        return $this->userModel->getAllUsers();
    }

    public function manageLocations() {
        return $this->locationModel->getAllLocations();
    }
}
?>
