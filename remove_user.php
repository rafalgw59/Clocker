<?php
require_once 'helpers/session.php';
require_once 'controllers/Users.php';

class UserForRemoval {
    private $userController;

    public function __construct(){
        $this->userController = new Users;

    }

    public function deleteUser(){
        $user_id = $_SESSION['usersLogin'];
        $this->userController->deleteUser($user_id);
        $this->userController->destroySession();
        echo 'Konto zostało usunięte';
    }
}

$userForRemoval = new UserForRemoval;

if ($_SERVER['REQUEST_METHOD']=='POST'){
    if($_POST['type']=='del'){
        $userForRemoval->deleteUser();
    }
}

