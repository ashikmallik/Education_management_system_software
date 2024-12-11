<?php require_once('sms_top.php');?>

<!DOCTYPE html>
<html>
<head>
	<title>Borno Sky [:: SMS Pannel ::] </title>
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
	<!-- Meta -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<div class="main">
	<div class="left_fixed">
    	<?php require_once('home_top.php');?>		
		<div class="logo">
			<img src="../../images/logo.jpg">
		</div>
	</div>
	<div class="main_content">
		<div class="main_part_smsp">
			<div class="sms_part_top">
            <?php require_once('sms_topmenu.php');?>				
			</div>
			<div class="sms_part_bottom" style="color:#FFFFFF; font-size:24px; text-align:center">
				<?php
                	$msg=$_GET['msg'];
					if($msg==1){ echo "Your Message Has Been Sent Successfully"; }
					else if($msg==2){ echo "Your Message Sending failed"; }
					else if($msg==3){ echo "SMS Quota Are Unavailable? Please Increase Quota"; }
					
					
				?>
			</div>

			
		</div>
	</div>
</div>

<script type="text/javascript" src="../../js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
</body>
</html>