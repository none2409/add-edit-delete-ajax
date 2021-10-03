<?php

include_once("dbclass.php");
$viewUser = new User();
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf', 'doc', 'ppt'); // valid extension
$path = 'img/'; // upload directory
$idUser = $_POST['idUser'];
$editUserName = $_POST['editUserName'];
$editFullName = $_POST['editFullName'];
$editBirthDate = $_POST['editBirthDate'];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$createUpdate = date("Y-m-d H:i:s");
if (!empty($editUserName) || !empty($editFullName) || !empty($editBirthDate) || $_FILES['editUploadImage']) {
    $img = $_FILES['editUploadImage']['name'];
    $tmp = $_FILES['editUploadImage']['tmp_name'];
    // get uploaded file's extension
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    // can upload same editUploadImage using rand function
    $final_image = rand(1000, 1000000) . $img;
    // check format
    in_array($ext, $valid_extensions);
    $path = $path . strtolower($final_image);
    move_uploaded_file($tmp, $path);
    $sql = $viewUser->updateUser($idUser, $editUserName, $editFullName, $editBirthDate, $path, $createUpdate);
}
