<?php
error_reporting(0);
ob_start();
	include('../../connection.php');
	
	
	session_start();
			
	$userid=$_SESSION['userid'];
	if($userid== "")
	{
	header("location:../index.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Borno Sky</title>
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
	<!-- Meta -->
	<meta charset="UTF-8">
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
						<a href="add/index.php">
							<img src="../images/admin/Academic.jpg" height="160px" width="230px">
							<p> Add Data </p>
						</a>
					</div>
					<!--
                    <div class="admin_item">
						<a href="academic/index.php">
							<img src="../images/admin/account.jpg" height="160px" width="230px">
							<p>Academic Manag...</p>
						</a>
					</div>
                    !-->
				</div>
				<div class="admin_bottom">
					<!--
                    <div class="admin_item item1">
						<a href="sms/index.php">
							<img src="../images/admin/smsPanel.jpg" height="160px" width="230px">
							<p>SMS Panel</p>
						</a>
					</div>
					<div class="admin_item">
						<a href="">
							<img src="../images/admin/webAdmin.jpg" height="160px" width="230px">
							<p>Web Admin</p>
						</a>
					</div>
                    !-->
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>