<?php

// error_reporting(0);

//-----------------------------------------------------------------

$servername = "localhost";
$username = "root";
$password = "";
$database = "marksheet_generator";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//-----------------------------------------------------------------

?>