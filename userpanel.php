<h2 style="text-align:center;"> Panel usera </h2>
<?php
include_once 'time_tracker.php'
?>

<form method="post" action="controllers/Users.php">
    <input type="hidden" name="type" value="deleteMe">
    <button>Usun konto</button>
</form>