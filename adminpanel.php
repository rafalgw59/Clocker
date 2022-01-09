<div class="wrapper">

    <h2> Panel admina </h2>

    <!-- -->
    <!--Szukanie usera po loginie -->
    <p id="search-user-p">Szukanie usera:</p>
    <?php
    include_once 'show_specific_user.php';

    if (isset($_POST['submit'])) {
        if (empty($_POST['userSearchInput'])) {
            echo "bro";
        }
        $searchInput = $_POST['userSearchInput'];
        echo $searchInput;

    }
    ?>

<!-- Pokaz wszystkich userow -->
<?php
include_once 'show_users.php';
include_once 'logout.php';
?>

<!--Wglad w dane usera -->
</div>
