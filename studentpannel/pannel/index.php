<?php
error_reporting(0);
ob_start();
	include('../../connection.php');
	
	
	session_start();

	$stdid=$_SESSION['stdid'];
	if($stdid== "")
	{
	header("location:index.php");
	}
/*
	
	$get_schoolName="select * from borno_school where borno_school_id='$schId'";
	$qget_schoolName =$mysqli->query($get_schoolName);
	$shget_schoolName=$qget_schoolName->fetch_assoc();
*/	
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Borno Sky</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<!-- Meta -->
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="main">
	<div class="left_fixed">
		<div class="logo_top">
			
		</div>
		<div class="logo">
			<img src="../images/logo.jpg">
		</div>
	</div>
	<div class="main_content">    
    
   		
				<div class="top_item" style="margin-left:650px;">

					<a href="logout.php"><img src="../images/sms/06.jpg" height="60px" width="85px"></a>
				</div>
			
    
		<div class="main_part">
			<div class="admin">
				<div class="admin_top">
					<div class="admin_item item1">
					    	<a href="academic/index.php">
							<img src="../images/admin/Academic.jpg" height="160px" width="230px">
							<p>Academic</p>
						</a>
					</div>
					<div class="admin_item">
						<a href="accounce/index.php">
							<img src="../images/admin/account.jpg" height="160px" width="230px">
							<p>Payment History</p>
						</a>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>