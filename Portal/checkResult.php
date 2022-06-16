<?php
include 'connect.php';

$roll = $_POST['roll'];
$mother = $_POST['mother'];

$CheckQuery = "SELECT * FROM marksheets WHERE rollno = '$roll' and mothername = '$mother' ";
$CheckQuery_run = mysqli_query($conn, $CheckQuery);
$CheckQuery_run_fetchall = mysqli_fetch_assoc($CheckQuery_run);

if (mysqli_num_rows($CheckQuery_run) > 0) {
    $result_id = $CheckQuery_run_fetchall['id'];
    $result_status = $CheckQuery_run_fetchall['status'];
    if($result_status == "Posted") {
        session_start();
        $_SESSION['idSession'] = $result_id;
        echo "found";
    }
    else {
        echo "not-found";
    }
}
else {
    echo "not-found";
}

$conn->close();

?>