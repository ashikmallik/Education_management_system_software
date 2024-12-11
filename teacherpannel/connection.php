<?php
$server = 'localhost';
$user = 'bornosky_aggsc_user';
$pass = 'aggsc_user`22';
$db_name = 'bornosky_aggsc';
$mysqli = mysqli_connect($server, $user, $pass, $db_name);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
?>
