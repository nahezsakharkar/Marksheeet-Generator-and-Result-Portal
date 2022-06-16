<?php
include 'connect.php';

session_start();
$emailCheck = $_SESSION['emailForgotPassword'];

$pass = $_POST['resetnewpass-forgot'];

$signupData = "UPDATE `marksheet_generator`.`users` SET passwd = '$pass' WHERE email = '$emailCheck'";
$securityData = "UPDATE `marksheet_generator`.`security` SET passwd = '$pass' WHERE email = '$emailCheck'";

$conn->query($signupData);
$conn->query($securityData);

$conn->close();

?>