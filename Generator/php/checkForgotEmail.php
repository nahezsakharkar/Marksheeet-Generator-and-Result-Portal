<?php
include 'connect.php';

$emailCheck = $_POST['emailLogin-forgot'];

session_start();
$_SESSION['emailForgotPassword'] = $emailCheck;

$emailCheckQuery = "SELECT * FROM `security` WHERE email = '$emailCheck' ";
$emailCheckQuery_run = mysqli_query($conn, $emailCheckQuery);

if (mysqli_num_rows($emailCheckQuery_run) > 0) 
{
    $emailCheckQuery_run_fetchall = mysqli_fetch_assoc($emailCheckQuery_run);
    $result_question = $emailCheckQuery_run_fetchall['question'];
    $result_answer = $emailCheckQuery_run_fetchall['answer'];
    if($result_question == "") {
        echo "insecure";
        session_unset();
        session_destroy();
    }
    else {
        echo $result_question;
    }
}
else
{
    echo "Not Registered";
    session_unset();
    session_destroy();
}


?>