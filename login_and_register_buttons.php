<link rel="stylesheet" href="style.css"/>
<div class="wrap">
<ul>
<li><button class="menu" onclick="window.location.href='login.php';"> Zaloguj się</li>
<li><button class="menu" onclick="window.location.href='register.php';">Zarejestruj się</li>
<li><button class="menu" onclick="document.getElementById('Guest').submit();">Wypróbuj jako gość</li>
<form id="Guest" method="post" action="controllers/Users.php">
    	<input type="hidden" name="type" value="login">
        <input type="hidden" name="usersLogin" value="Guest"><!-- Login: Guest-->
        <input type="hidden" name="usersPassword" value="EBxe9y2NWuAPPLe"><!-- Hasło: zmienić-->
</form>

</ul>
</div>