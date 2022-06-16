<?php
include 'connect.php';

if (isset($_POST['check_submit_btn'])) 
{
  $emailCheck = $_POST['email_id'];
  $emailCheckQuery = "SELECT * FROM users WHERE email = '$emailCheck' ";
  $emailCheckQuery_run = mysqli_query($conn, $emailCheckQuery);

  if (mysqli_num_rows($emailCheckQuery_run) > 0) 
  {
    echo "This Email is already in use.";
  }
  else
  {
    echo "";
  }
}

?>