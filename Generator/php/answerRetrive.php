<?php
include 'connect.php';

session_start();
$emailCheck = $_SESSION['emailForgotPassword'];

$typedAnswer = $_POST['answer-forgot'];

$emailCheckQuery = "SELECT * FROM `security` WHERE email = '$emailCheck' ";
$emailCheckQuery_run = mysqli_query($conn, $emailCheckQuery);
$emailCheckQuery_run_fetchall = mysqli_fetch_assoc($emailCheckQuery_run);
$result_answer = $emailCheckQuery_run_fetchall['answer'];

if ($typedAnswer != $result_answer) {
    echo "incorrect";
}
else {
    echo "correct";
}


$conn->close();

?>