<?php
require_once 'helpers/session.php';
require_once 'models/Admin.php';
require_once 'controllers/Users.php';

class UserForRemoval {
    private $usrAdminModel;
    private $userController;

    public function __construct(){
        $this->usrAdminModel = new Admin;
        $this->userController = new Users;

    }

    public function deleteUser(){
        $user_id = $_SESSION['usersLogin'];
        $this->usrAdminModel->deleteUser($user_id);
        $this->userController->destroySession();
        echo 'Konto zostało usunięte');
    }
}

$userForRemoval = new UserForRemoval;

if ($_SERVER['REQUEST_METHOD']=='POST'){
    if($_POST['type']=='submit'){
        $userForRemoval->deleteUser();
    }
}

