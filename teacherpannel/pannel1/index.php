<?php
error_reporting(0);
ob_start();
	include('../connection.php');
	
	
	session_start();

	$stdid=$_SESSION['stdid'];
	if($stdid== "")
	{
	header("location:index.php");
	}

		date_default_timezone_set('Asia/Dhaka');	
		$year=date('Y');
		
 	$get_schoolName="select * from borno_set_class_teacher where 	borno_school_teacher_id='$stdid' AND borno_school_session='$year'";
	$qget_schoolName =$mysqli->query($get_schoolName);
	$shget_schoolName=$qget_schoolName->fetch_assoc();
	$section=$shget_schoolName['borno_school_section_id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Borno Sky</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
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
                
                	<a style="color:#FFF" href="software/TeamViewer 7_Setup.exe" target="_blank"> TeamViewer  | </a> 
                    <a style="color:#FFF" href="software/Result Analysis.doc" target="_blank">Result Analysis Form  | </a> 
                    <a style="color:#FFF" href="software/FoxitReader43_enu_Setup.exe" target="_blank"> PDF Reader  </a> 
                
					<a href="logout.php"><img src="../images/sms/06.jpg" height="60px" width="85px"></a>
				</div>
			
    
		<div class="main_part">
			<div class="admin">
				<div class="admin_top">
					<div class="admin_item">
						<a href="academic/index.php">
							<img src="../images/admin/Academic.jpg" height="160px" width="230px">
							<p>Academic</p>
						</a>
					</div>


			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>