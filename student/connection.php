

<?php
$server = 'localhost';
$user = 'bornosky_usborno';
$pass = 'Bangladesh`123';
$db_name = 'bornosky_borno18';
$mysqli = mysqli_connect($server, $user, $pass, $db_name);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
?>
