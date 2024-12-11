<?php
$server = 'localhost';
$user = 'bornosky_usborno';
$pass = 'Bangladesh`123';
$db_name = 'bornosky_borno18';
//$connReal = mysql_connect($server,$user,$pass) or die(mysql_error());

$con = mysqli_connect($server, $user, $pass, $db_name);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  ?>
  
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
     
     <select id="cars" name="cars">
  <option value="volvo">Volvo</option>
 
</select>
</body>
</html>