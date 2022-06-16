<?php
include '../php/connect.php';

session_start();
$emailLogin = $_SESSION['email'];

$sql_query = "SELECT * FROM `marksheets` WHERE madeby = '$emailLogin' ORDER BY `marksheets`.`time` DESC ; ";
$row = mysqli_query($conn, $sql_query);
$emparray = array();
while($result = mysqli_fetch_assoc($row))
{
    $emparray[] = $result;
}
echo json_encode($emparray);

$conn->close();

?>