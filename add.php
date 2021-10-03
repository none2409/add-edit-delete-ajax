<?php
include_once("dbclass.php");
$viewUser = new User();
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf', 'doc', 'ppt'); // valid extensions
$path = 'img/'; // upload directory
$userName = $_POST['userName'];
$cPassword = $_POST['cPass'];
$fullName = $_POST['fullName'];
$birthDate = $_POST['birthDate'];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$createDate = date("Y-m-d H:i:s");
if (!empty($userName) || !empty($cPassword) || !empty($fullName) || !empty($birthDate) || $_FILES['image']) {
    $img = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    // get uploaded file's extension
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    // can upload same image using rand function
    $final_image = rand(1000, 1000000) . $img;
    // check format img
    in_array($ext, $valid_extensions);
    $path = $path . strtolower($final_image);
    move_uploaded_file($tmp, $path);
    $sql = $viewUser->addUser($userName, $cPassword, $fullName, $birthDate, $path, 0, $createDate);
}
