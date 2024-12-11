<?php
error_reporting(0);
ob_start();
	include('../connection.php');
	
	
	session_start();
	$schname=$_SESSION['schname'];
	$logo=$_SESSION['logo'];
	
		
	$schId=$_SESSION['schId'];
	if($schId== "")
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
	<title>amarEskul</title>
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
			<img src="../../amarEskul.jpg">
		</div>
	</div>
	<div class="main_content">    
    
   		
				<div class="top_item" style="margin-left:650px;">
                
                	<a style="color:#FFF" href="software/New Student Information.pdf" target="_blank"> Student Information Form  | </a> 
                    <a style="color:#FFF" href="software/Student Update Information Form.doc" target="_blank"> Student Update Form  | </a> 
                    
                    <a style="color:#FFF" href="software/TeamViewer 7_Setup.exe" target="_blank"> TeamViewer  | </a> 
                    <a style="color:#FFF" href="software/Result Analysis.doc" target="_blank">Result Analysis Form  | </a> 
                    <a style="color:#FFF" href="software/FoxitReader43_enu_Setup.exe" target="_blank"> PDF Reader  |</a> 
                    <a style="color:#FFF" href="AnyDesk.exe" target="_blank"> AnyDesk  |</a> 
                    
                    <a style="color:#FFF" href="SMS Dokan Aditable Form.pdf" target="_blank"> BTCL SMS Form  |</a>
                
					<a href="logout.php"><img src="../images/sms/06.jpg" height="60px" width="85px"></a>
				</div>
			
    
		<div class="main_part">
			<div class="admin">
				<div class="admin_top">
					<div class="admin_item item1">
						<a href="accounce/index.php">
							<img src="../images/admin/account.jpg" height="160px" width="230px">
							<p>Accounting</p>
						</a>
					</div>
					<div class="admin_item">
						<a href="academic/index.php">
							<img src="../images/admin/Academic.jpg" height="160px" width="230px">
							<p>Academic Manag...</p>
						</a>
					</div>
				</div>
				<div class="admin_bottom">
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
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>