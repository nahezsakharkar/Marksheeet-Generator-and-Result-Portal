<?php
include '../php/connect.php';

session_start();

$emailLogin = $_SESSION['email'];
$passLogin = $_SESSION['password'];

$fname = $_POST['name-pf-update'];
$surname = $_POST['surname-pf-update'];
$dob = $_POST['DOB-update'];
$phone = $_POST['phone-update'];
$profession = $_POST['pro-update'];
$institution = $_POST['institution-update'];

$updateData = "UPDATE `marksheet_generator`.`users` SET fname = '$fname', surname = '$surname', dob = '$dob', phone = '$phone', profession = '$profession', institution = '$institution' WHERE email = '$emailLogin' and passwd = '$passLogin';";

$conn->query($updateData);

$question = $_POST['security-question-update'];
$answer = $_POST['security-answer-update'];

$updateSecurity = "UPDATE `marksheet_generator`.`security` SET question = '$question', answer = '$answer' WHERE email = '$emailLogin' and passwd = '$passLogin';";
    
$conn->query($updateSecurity);


$conn->close();

?>