<?php
include_once __DIR__ . '/header.php';
?>

<div class="wrapper">

    <h2> Panel admina </h2>

    <!-- -->
    <!--Szukanie usera po loginie -->
    <p id="search-user-p">Szukanie usera:</p>
    <?php

    include_once __DIR__ . '/show_specific_user.php';



    if (isset($_REQUEST['userSearchInput'])) {
        require_once __DIR__ . '/models/Admin.php';
        $model = new Admin();
        $data = $model->showSpecificUser($_REQUEST['userSearchInput']); //todo dodac filtering
        if (isset($data) && count($data)) {
            foreach ($data as $rows) {
                //print_r($data);

                ?>
                <tr>
                    <td>ID: <?php echo $rows->usersId; ?></td>
                    <td> Login: <?php echo $rows->usersLogin; ?></td>
                    <td><?php echo $rows->usersFirstName; ?></td>
                    <td><?php echo $rows->usersLastName; ?></td>
                    <td>E-mail: <?php echo $rows->usersEmail; ?></td>
                    <td>Hasło: <?php echo $rows->usersPassword; //todo mozna zrobic deszyfrowanie hasla, albo wgl to wywalic ?></td>
                    <td>
                        <form action="controllers/Admins.php" method="post">
                            <input type="hidden" name="type" value="delete">
                            <button type="submit" name="user_delete" value="<?php echo $rows->usersId; ?>">Delete
                            </button>
                        </form>
                    </td>
                </tr>
            <?php }
        } else {
            echo "Nothing";
        }
    } ?>




<!-- Pokaz wszystkich userow -->
<?php
include_once __DIR__ . '/show_users.php';
include_once __DIR__ . '/logout.php';
include_once  __DIR__ . '/footer.php';
?>

<!--Wglad w dane usera -->
</div>
