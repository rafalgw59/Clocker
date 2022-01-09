<link rel="stylesheet" href="style.css"/>
<div class="header-div">
    <button class="bar" onclick="window.location.href='index.php';"> Strona główna </button>
<!--    tylko dla wyglądu-->
    <button class="bar" onclick="window.location.href='index.php';"> About us </button>
    <button class="bar" onclick="window.location.href='index.php';"> Contact </button>
    <button class="bar" onclick="window.location.href='index.php';"> FAQ </button>
    <?php
    session_start();
    if (isset($_SESSION['usersId'])) {
        include_once 'logout.php';
    }
    ?>
</div>


