<?php
include '../php/connect.php';

session_start();

$emailLogin = $_SESSION['email'];
$passLogin = $_SESSION['password'];


$sql_query = "SELECT * FROM `users` WHERE email = '$emailLogin' and passwd = '$passLogin'; ";
$row = mysqli_query($conn, $sql_query);
$result = mysqli_fetch_assoc($row);
$fname = $result['fname'];

//pfp----------------------------------------------------
$target_dir = 'uploads/';
$imgName = $_FILES['pfp']['name'];
$imgTmp = $_FILES['pfp']['tmp_name'];
$imgSize = $_FILES['pfp']['size'];
$imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

if ($imgName) {
    $result_pfp = $target_dir . $result['pfp'];

    $allowExt  = array('jpeg', 'jpg', 'png');
    if (in_array($imgExt, $allowExt)) {
        if($result['pfp'] != 'pfp-placeholder.png') {
            unlink($result_pfp);
            $userPic = time() . '_' . $fname . '.' . $imgExt;
            move_uploaded_file($imgTmp, $target_dir . $userPic);
        }
        else {
            $userPic = time() . '_' . $fname . '.' . $imgExt;
            move_uploaded_file($imgTmp, $target_dir . $userPic);
        }
    }
    else {
        $userPic = 'pfp-placeholder.png';
    }

}
else {
    $userPic = $result['pfp'];
}

//----------------------------------------------------------


$fileData = "UPDATE `marksheet_generator`.`users` SET pfp = '$userPic' WHERE email = '$emailLogin' and passwd = '$passLogin';";

$conn->query($fileData);

$conn->close();

?>