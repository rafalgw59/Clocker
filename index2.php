<?php
switch ($_REQUEST['action']) {
    case 'user-login':
        require __DIR__."/login.php";
        break;
}