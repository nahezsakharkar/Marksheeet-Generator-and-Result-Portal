<?php
include '../php/connect.php';

session_start();
$id = $_POST['id'];

$sql_query = "UPDATE `marksheet_generator`.`marksheets` SET `status` = 'Posted' WHERE `id` = '$id'; ";

$conn->query($sql_query);

$conn->close();

?>