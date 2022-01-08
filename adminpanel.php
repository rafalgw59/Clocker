<?php
include_once 'header_admin.php';
?>
<h2> Panel admina </h2>

<!-- -->
<!--Szukanie usera po loginie -->
<p>Szukanie usera:</p>
<?php
include_once 'show_specific_user.php';


/*
if(isset($_POST['submit'])) {
    if (empty($_POST['userSearchInput'])) {
        echo "bro";
    }
    $searchInput = $_POST['userSearchInput'];
    //echo $searchInput;



}
*/
if(isset($data)){
    foreach ($data as $rows){

        ?>
    <tr>
        <td><?php echo $rows->usersId;?></td>
        <td><?php echo $rows->usersLogin;?></td>
        <td><?php echo $rows->usersFirstName;?></td>
        <td><?php echo $rows->usersLastName; ?></td>
        <td><?php echo $rows->usersEmail; ?></td>
        <td><?php echo $rows->usersPassword;?></td>
        <td>
            <form action="../controllers/Admins.php" method="post">
                <input type="hidden" name="type" value="delete">
                <button type="submit" name="user_delete" value="<?php echo $rows->usersId;?>">Delete</button>
            </form>
        </td>
    </tr>
    <?php    }} ?>




<!-- Pokaz wszystkich userow -->
<?php
include_once 'show_users.php';
include_once 'logout.php';
?>

<!--Wglad w dane usera -->
