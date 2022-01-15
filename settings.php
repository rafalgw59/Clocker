<?php
include_once 'header.php';
include_once './helpers/validate_inputs.php';
?>

<h1 style="color:white; text-align:center;">Zmień swoje ustawienia</h1>
<form class="forms" method="post" action="controllers/Users.php">
    <input type="hidden" name="type" value="change_settings">
<!--    Tutaj będzie trzeba nadal sprawdzać wartości które są wprowadzane, ale tylko te, które user chce wprowadzić-->
<!--    Można to też zrobić jakimiś buttonami, typu Zmień imie czy coś-->
<!--    A jeśli ktoś zostawi puste, no to nie wykona się po prostu nic-->

    <label>
        Imię: <br>
        <input type="text" name="usersFirstName" maxlength="50" placeholder="Wpisz swoje imię">
    </label> <br>

    <label>
        Nazwisko: <br>
        <input type="text" name="usersLastName" maxlength="50" placeholder="Wpisz swoje nazwisko">
    </label> <br>

    <label>
        Login: <br>
        <input type="text" name="usersLogin" maxlength="50" placeholder="Wpisz swoj login">
    </label> <br>

    <label>
        E-mail: <br>
        <input type="text" name="usersEmail" maxlength="50" placeholder="Wpisz swoj e-mail">
    </label> <br>

    <label>
        Hasło: <br>
        <input type="password" name="usersPassword" maxlength="25" placeholder="Wpisz swoje haslo">
    </label> <br>

    <label>
        Powtórz hasło: <br>
        <input type="password" name="repeatUsersPassword" maxlength="25" placeholder="Wpisz ponownie swoje haslo">
    </label> <br>
    <?php checkInputs('register') ?>
    <button type="submit" name="submit"> Zmień ustawienia </button>
</form>
<h1 style="color:white; text-align:center;">Usuń konto</h1>
<?php
include_once 'delete_account_button.php';
?>

<?php
include_once 'footer.php'
?>
