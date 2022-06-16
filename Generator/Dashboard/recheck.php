<?php
include '../php/connect.php';

session_start();
$id = $_POST['id'];

$sql_query = "UPDATE `marksheet_generator`.`marksheets` SET `status` = 'Rechecking' WHERE `id` = '$id'; ";

$conn->query($sql_query);

$conn->close();

?>