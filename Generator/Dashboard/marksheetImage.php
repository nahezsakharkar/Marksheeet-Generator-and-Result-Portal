<?php
include '../php/connect.php';

session_start();

$emailLogin = $_SESSION['email'];
$passLogin = $_SESSION['password'];

$target_dir = 'marksheetData/';
$allowExt  = array('jpeg', 'jpg', 'png');

// logo
$iImg_name = $_FILES['institution-logo']['name'];
$iImg_tmp = $_FILES['institution-logo']['tmp_name'];
$iImg_ext = strtolower(pathinfo($iImg_name, PATHINFO_EXTENSION));

//sign1
$sign1_name = $_FILES['footer-sign-teacher']['name'];
$sign1_tmp = $_FILES['footer-sign-teacher']['tmp_name'];
$sign1_ext = strtolower(pathinfo($sign1_name, PATHINFO_EXTENSION));
//sign2
$sign2_name = $_FILES['footer-sign-hod']['name'];
$sign2_tmp = $_FILES['footer-sign-hod']['tmp_name'];
$sign2_ext = strtolower(pathinfo($sign2_name, PATHINFO_EXTENSION));

if (in_array($iImg_name, $allowExt)) {
    $iImg = time() . '_logo_' . '.' . $iImg_ext;
    $_SESSION['logoImageSession'] = $iImg;
    $_SESSION['logoTmpImageSession'] = $iImg_tmp;
    // move_uploaded_file($iImg_tmp, $target_dir . $iImg);
}
if (in_array($sign1_name, $allowExt)) {
    $sign1 = time() . '_sign1_' . '.' . $sign1_ext;
    $_SESSION['sign1ImageSession'] = $sign1;
    $_SESSION['sign1TmpImageSession'] = $sign1_tmp;
    // move_uploaded_file($sign1_tmp, $target_dir . $sign1);
}
if (in_array($sign2_name, $allowExt)) {
    $sign2 = time() . '_sign2_' . '.' . $sign2_ext;
    $_SESSION['sign2ImageSession'] = $sign2;
    $_SESSION['sign2TmpImageSession'] = $sign2_tmp;
    // move_uploaded_file($sign2_tmp, $target_dir . $sign2);
}

//----------------------------------------------------------

$conn->close();

?>