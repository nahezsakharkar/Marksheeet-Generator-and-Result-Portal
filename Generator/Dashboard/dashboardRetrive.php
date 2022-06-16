<?php
include '../php/connect.php';
error_reporting(0);

session_start();

$emailLogin = $_SESSION['email'];
$passLogin = $_SESSION['password'];

$sql_query = "SELECT * FROM `users` WHERE email = '$emailLogin' and passwd = '$passLogin'; ";
$row = mysqli_query($conn, $sql_query);
$result = mysqli_fetch_assoc($row);
$result_fname = $result['fname'];
$result_surname = $result['surname'];
$result_fullname = $result_fname . " " . $result_surname;
$result_email = $result['email'];
$result_dob = $result['dob'];
$result_phone = $result['phone'];
$result_profession = $result['profession'];
$result_institution = $result['institution'];
$target_dir = 'uploads/';
$result_pfp = $target_dir . $result['pfp'];

$sql_query_security = "SELECT * FROM `security` WHERE email = '$emailLogin' and passwd = '$passLogin'; ";
$row_security = mysqli_query($conn, $sql_query_security);
$result_security = mysqli_fetch_assoc($row_security);
$result_question = $result_security['question'];
$result_answer = $result_security['answer'];

$sql_query_marksheetsNo = "SELECT * FROM `marksheets` WHERE madeby = '$emailLogin' ";
$rows_marksheets = mysqli_query($conn, $sql_query_marksheetsNo);
$noOfRows = mysqli_num_rows($rows_marksheets);

$sql_query_marksheetsPosted = "SELECT * FROM `marksheets` WHERE `madeby` = '$emailLogin' and `status` = 'Posted' ";
$rows_marksheetsPosted = mysqli_query($conn, $sql_query_marksheetsPosted);
$noOfRowsPosted = mysqli_num_rows($rows_marksheetsPosted);

$sql_query_marksheetsPending = "SELECT * FROM `marksheets` WHERE `madeby` = '$emailLogin' and `status` = 'Pending' ";
$rows_marksheetsPending = mysqli_query($conn, $sql_query_marksheetsPending);
$noOfRowsPending = mysqli_num_rows($rows_marksheetsPending);

$sql_query_marksheetsRechecking = "SELECT * FROM `marksheets` WHERE `madeby` = '$emailLogin' and `status` = 'Rechecking' ";
$rows_marksheetsRechecking = mysqli_query($conn, $sql_query_marksheetsRechecking);
$noOfRowsRechecking = mysqli_num_rows($rows_marksheetsRechecking);

$sql_query_Pos1 = "SELECT * FROM `marksheets` WHERE madeby = '$emailLogin' ORDER BY `marksheets`.`time` DESC LIMIT 1 ";
$row_pos1 = mysqli_query($conn, $sql_query_Pos1);
$fetched1 = mysqli_fetch_assoc($row_pos1);

$sql_query_Pos2 = "SELECT * FROM `marksheets` WHERE madeby = '$emailLogin' ORDER BY `marksheets`.`time` DESC LIMIT 1 OFFSET 1";
$row_pos2 = mysqli_query($conn, $sql_query_Pos2);
$fetched2 = mysqli_fetch_assoc($row_pos2);

$sql_query_Pos3 = "SELECT * FROM `marksheets` WHERE madeby = '$emailLogin' ORDER BY `marksheets`.`time` DESC LIMIT 1 OFFSET 2";
$row_pos3 = mysqli_query($conn, $sql_query_Pos3);
$fetched3 = mysqli_fetch_assoc($row_pos3);

$sql_query_Pos4 = "SELECT * FROM `marksheets` WHERE madeby = '$emailLogin' ORDER BY `marksheets`.`time` DESC LIMIT 1 OFFSET 3";
$row_pos4 = mysqli_query($conn, $sql_query_Pos4);
$fetched4 = mysqli_fetch_assoc($row_pos4);

$sql_query_Pos5 = "SELECT * FROM `marksheets` WHERE madeby = '$emailLogin' ORDER BY `marksheets`.`time` DESC LIMIT 1 OFFSET 4";
$row_pos5 = mysqli_query($conn, $sql_query_Pos5);
$fetched5 = mysqli_fetch_assoc($row_pos5);

$sql_query_Pos6 = "SELECT * FROM `marksheets` WHERE madeby = '$emailLogin' ORDER BY `marksheets`.`time` DESC LIMIT 1 OFFSET 5";
$row_pos6 = mysqli_query($conn, $sql_query_Pos6);
$fetched6 = mysqli_fetch_assoc($row_pos6);

$sql_query_Pos7 = "SELECT * FROM `marksheets` WHERE madeby = '$emailLogin' ORDER BY `marksheets`.`time` DESC LIMIT 1 OFFSET 6";
$row_pos7 = mysqli_query($conn, $sql_query_Pos7);
$fetched7 = mysqli_fetch_assoc($row_pos7);


$conn->close();

?>