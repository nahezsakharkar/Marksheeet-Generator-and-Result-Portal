<?php
include 'connect.php';

$emailLogin = trim($_POST['emailLogin']);
$passLogin = trim($_POST['passLogin']);

session_start();
$_SESSION['email'] = $emailLogin;
$_SESSION['password'] = $passLogin;

$sql_query = "SELECT * FROM `users` WHERE email = '$emailLogin' and passwd = '$passLogin'; ";
$result = mysqli_query($conn, $sql_query);

if (mysqli_num_rows($result) > 0) {
    echo "Success";
    return false;
}
else {
    echo "Failed";
    return false;
}

$conn->close();

?>