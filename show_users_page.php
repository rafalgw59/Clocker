
<?php
include_once __DIR__ . '/header.php';
require_once __DIR__ . '/models/Admin.php';
//todo dorobic css
?>


<div class="container">
    <table class="usersTable">
        <thead style="border: 1px solid black">
            <tr>
                <th>UserId</th>
                <th>UserLogin</th>
                <th>UserFirsName</th>
                <th>UserLastName</th>
                <th>UserEmail</th>
                <th>UserPassword</th>


                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php

        $model = new Admin();
        $data = $model->showAllUsers();
            foreach($data as $rows) {


        ?>
                <tr>
                    <td><?php echo $rows->usersId;?></td>
                    <td><?php echo $rows->usersLogin;?></td>
                    <td><?php echo $rows->usersFirstName;?></td>
                    <td><?php echo $rows->usersLastName; ?></td>
                    <td><?php echo $rows->usersEmail; ?></td>
                    <td><?php echo $rows->usersPassword;?></td>


                    <td>
                        <form action="controllers/Admins.php" method="post">
                            <input type="hidden" name="type" value="delete">
                            <button type="submit" name="user_delete" value="<?php echo $rows->usersId;?>">Delete</button>
                        </form>
                    </td>

                </tr>

        <?php    } ?>

            <tr>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>

            </tr>
        </tbody>
    </table>
</div>
<?php
include_once __DIR__ .'/footer.php';
?>