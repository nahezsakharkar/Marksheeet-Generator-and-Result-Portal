<?php
include '../php/connect.php';

session_start();

$emailLogin = $_SESSION['email'];
$passLogin = $_SESSION['password'];

$sql_query = "SELECT * FROM `users` WHERE email = '$emailLogin' and passwd = '$passLogin'; ";
$row = mysqli_query($conn, $sql_query);
$result = mysqli_fetch_assoc($row);
$target_dir = 'uploads/';
$result_pfp = $target_dir . $result['pfp'];
unlink($result_pfp);

$fileData = "UPDATE `marksheet_generator`.`users` SET pfp = 'pfp-placeholder.png' WHERE email = '$emailLogin' and passwd = '$passLogin';";

$conn->query($fileData);

$conn->close();

?>