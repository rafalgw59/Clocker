
<?php
    session_start();
if (isset($_SESSION['usersId'])) {
    include_once 'logout.php';
}
?>

<h1 id="index-text"> <?php
    if (isset($_SESSION['usersId'])) {
        echo "Użytkownik " . $_SESSION['usersLogin'];
    }
    else {
        echo '<h1 class="menu"> CLOCKER</h1>';
        echo '<h3 class="menu"> Twój czas jest na wagę złota </h3>';
    }
    ?> </h1>


<!--Wyświetlanie ogólnych statystyk (jeżeli user nie jest zalogowany) lub panel usera (jeżeli user jest zalogowany)-->
<?php
if (!isset($_SESSION['usersId'])) {
    include_once 'login_and_register_buttons.php';
}
?>
<?php
if (!isset($_SESSION['usersId'])) {
    //include_once 'stats_for_everyone.php';
} else {
    if ($_SESSION['usersLogin'] == 'admin')
        include_once 'adminpanel.php';
    if ($_SESSION['usersLogin'] != 'admin')
        include_once 'userpanel.php';
}
?>

<!--Możliwość logowania i rejestracji (jeżeli user nie jest zalogowany) lub wylogowywania (jeżeli user jest zalogowany)-->

