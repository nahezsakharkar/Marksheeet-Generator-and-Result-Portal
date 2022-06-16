<?php
include 'connect.php';

$fname = $_POST['fName'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$npass = $_POST['nPass'];
$cpass = $_POST['cPass'];

if ($npass == $cpass) {
  $pass = $npass;
}
$signupData = "INSERT INTO `marksheet_generator`.`users` (`fname`, `surname`, `email`, `passwd`, `pfp`, `datetime`) VALUES ('$fname', '$surname', '$email', '$pass', 'pfp-placeholder.png', current_timestamp());";

$securityData = "INSERT INTO `marksheet_generator`.`security` (`email`, `passwd`) VALUES ('$email', '$pass');";

session_start();
$_SESSION['email'] = $email;
$_SESSION['password'] = $pass;

$conn->query($signupData);
$conn->query($securityData);

$conn->close();

?>