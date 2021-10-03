<?php
include_once("dbclass.php");
$registerUser = new User();
$idUser = $_POST["idUser"];
if (isset($_POST['idUser'])) {
    $sql = $registerUser->deleteUser($idUser);
    if ($sql) {
        header('Location:index.php?delete=success');
    } else {
        header('Location:index.php?delete =error');
    }
}
