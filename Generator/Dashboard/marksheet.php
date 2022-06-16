<?php
include '../php/connect.php';

session_start();
$emailLogin = $_SESSION['email'];
$passLogin = $_SESSION['password'];

$iImg = $_SESSION['logoImageSession'];
$iImg_tmp = $_SESSION['logoTmpImageSession'];
$sign1 = $_SESSION['sign1ImageSession'];
$sign1_tmp = $_SESSION['sign1TmpImageSession'];
$sign2 = $_SESSION['sign2ImageSession'];
$sign2_tmp = $_SESSION['sign2TmpImageSession'];

$target_dir = '../../Portal/result/marksheetData/';

move_uploaded_file($iImg_tmp, $target_dir . $iImg);
move_uploaded_file($sign1_tmp, $target_dir . $sign1);
move_uploaded_file($sign2_tmp, $target_dir . $sign2);

$iName = $_POST['iName'];
$iLoc = $_POST['iLoc'];
$iDesc = $_POST['iDesc'];
$cTeach = $_POST['cTeach'];
$HOD = $_POST['iDesc'];

$sRn = $_POST['sRn'];
$sClass = $_POST['sClass'];
$sName = $_POST['sName'];
$sMother = $_POST['sMother'];
$sMerit = $_POST['sMerit'];
$sDepart = $_POST['sDepart'];
$sSem = $_POST['sSem'];

$grade = $_POST['grade'];
$total = $_POST['total'];
$percent = $_POST['percent'];
$remark = $_POST['remark'];

$code1 = $_POST['code1'];
$name1 = $_POST['name1'];
$theory1 = $_POST['theory1'];
$practical1 = $_POST['practical1'];
$internal1 = $_POST['internal1'];
$total1 = $_POST['total1'];
$grade1 = $_POST['grade1'];

$code2 = $_POST['code2'];
$name2 = $_POST['name2'];
$theory2 = $_POST['theory2'];
$practical2 = $_POST['practical1'];
$internal2 = $_POST['internal1'];
$total2 = $_POST['total2'];
$grade2 = $_POST['grade2'];

$code3 = $_POST['code3'];
$name3 = $_POST['name3'];
$theory3 = $_POST['theory3'];
$practical3 = $_POST['practical3'];
$internal3 = $_POST['internal3'];
$total3 = $_POST['total3'];
$grade3 = $_POST['grade3'];

$code4 = $_POST['code4'];
$name4 = $_POST['name4'];
$theory4 = $_POST['theory4'];
$practical4 = $_POST['practical4'];
$internal4 = $_POST['internal4'];
$total4 = $_POST['total4'];
$grade4 = $_POST['grade4'];

$code5 = $_POST['code5'];
$name5 = $_POST['name5'];
$theory5 = $_POST['theory5'];
$practical5 = $_POST['practical5'];
$internal5 = $_POST['internal5'];
$total5 = $_POST['total5'];
$grade5 = $_POST['grade5'];

$code6 = $_POST['code6'];
$name6 = $_POST['name6'];
$theory6 = $_POST['theory6'];
$practical6 = $_POST['practical6'];
$internal6 = $_POST['internal6'];
$total6 = $_POST['total6'];
$grade6 = $_POST['grade6'];

$code7 = $_POST['code7'];
$name7 = $_POST['name7'];
$theory7 = $_POST['theory7'];
$practical7 = $_POST['practical7'];
$internal7 = $_POST['internal7'];
$total7 = $_POST['total7'];
$grade7 = $_POST['grade7'];



$marksheetData_institutionTable = "INSERT INTO `marksheet_generator`.`institution` (`institutionname`, `institutionlocation`, `institutiondesciption`, `institutionlogo`, `classteacher`, `classteachersign`, `hod`, `hodsign`) VALUES ('$iName', '$iLoc', '$iDesc', 'logo.png', '$cTeach', 'sign1.png', '$HOD', 'sign2.png');";

$marksheetData_marksheetsTable = "INSERT INTO `marksheet_generator`.`marksheets` (`studentname`, `mothername`, `rollno`, `class`, `department`, `merit`, `semester`, `madeby`, `status`, `time`) VALUES ('$sName', '$sMother', '$sRn', '$sClass', '$sDepart', '$sMerit', '$sSem', '$emailLogin', 'Posted', current_timestamp());";

$marksheetData_marksTable = "INSERT INTO `marksheet_generator`.`marks` (`grade`, `total`, `percent`, `remark`) VALUES ('$grade', '$total', '$percent', '$remark');";

$marksheetData_sub1Table = "INSERT INTO `marksheet_generator`.`subject1` (`code`, `name`, `theory`, `practical`, `internal`, `total`, `grade`) VALUES ('$code1', '$name1', '$theory1', '$practical1', '$internal1', '$total1', '$grade1');";

$marksheetData_sub2Table = "INSERT INTO `marksheet_generator`.`subject2` (`code`, `name`, `theory`, `practical`, `internal`, `total`, `grade`) VALUES ('$code2', '$name2', '$theory2', '$practical2', '$internal2', '$total2', '$grade2');";

$marksheetData_sub3Table = "INSERT INTO `marksheet_generator`.`subject3` (`code`, `name`, `theory`, `practical`, `internal`, `total`, `grade`) VALUES ('$code3', '$name3', '$theory3', '$practical3', '$internal3', '$total3', '$grade3');";

$marksheetData_sub4Table = "INSERT INTO `marksheet_generator`.`subject4` (`code`, `name`, `theory`, `practical`, `internal`, `total`, `grade`) VALUES ('$code4', '$name4', '$theory4', '$practical4', '$internal4', '$total4', '$grade4');";

$marksheetData_sub5Table = "INSERT INTO `marksheet_generator`.`subject5` (`code`, `name`, `theory`, `practical`, `internal`, `total`, `grade`) VALUES ('$code5', '$name5', '$theory5', '$practical5', '$internal5', '$total5', '$grade5');";

$marksheetData_sub6Table = "INSERT INTO `marksheet_generator`.`subject6` (`code`, `name`, `theory`, `practical`, `internal`, `total`, `grade`) VALUES ('$code6', '$name6', '$theory6', '$practical6', '$internal6', '$total6', '$grade6');";

$marksheetData_sub7Table = "INSERT INTO `marksheet_generator`.`subject7` (`code`, `name`, `theory`, `practical`, `internal`, `total`, `grade`) VALUES ('$code7', '$name7', '$theory7', '$practical7', '$internal7', '$total7', '$grade7');";


$conn->query($marksheetData_institutionTable);

$conn->query($marksheetData_marksheetsTable);

$conn->query($marksheetData_marksTable);

$conn->query($marksheetData_sub1Table);
$conn->query($marksheetData_sub2Table);
$conn->query($marksheetData_sub3Table);
$conn->query($marksheetData_sub4Table);
$conn->query($marksheetData_sub5Table);
$conn->query($marksheetData_sub6Table);
$conn->query($marksheetData_sub7Table);

unset($_SESSION['logoImageSession']);
unset($_SESSION['logoTmpImageSession']);
unset($_SESSION['sign1ImageSession']);
unset($_SESSION['sign1TmpImageSession']);
unset($_SESSION['sign2ImageSession']);
unset($_SESSION['sign2TmpImageSession']);

$conn->close();

?>