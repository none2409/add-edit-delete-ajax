<?php
include_once("dbclass.php");
$viewUser = new User();
$listUser = $viewUser->getAllData();
if (isset($_POST['table'])) {
?>
    <table class="table  table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Full name</th>
                <th>Birth Of Day</th>
                <th>Avatar</th>
                <th>Create time</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                $counter = 0;
                foreach ($listUser as $listUser) {
                    $counter++;
                    echo  $viewUser->listUsers($counter, $listUser["n_id"], $listUser["v_username"], $listUser["v_fullname"], $listUser["d_birth_of_day"], $listUser["v_avatar"], $listUser["d_created_time"]);
                } ?>
            <?php
        } ?>
            </tr>
        </tbody>
    </table>