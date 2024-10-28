<?php

//Handles password recovery and reset actions.
class PasswordController {
    private $userModel;
    private $mailHelper;

    public function __construct($dbConnection) {
        $this->userModel = new UserModel($dbConnection);
        $this->mailHelper = new MailHelper();
    }

    public function requestReset($email) {
        $token = $this->userModel->createResetToken($email);
        $this->mailHelper->sendPasswordResetEmail($email, $token);
    }

    public function resetPassword($token, $newPassword) {
        return $this->userModel->updatePasswordWithToken($token, $newPassword);
    }
}
?>
