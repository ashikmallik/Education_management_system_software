<?php
    function isMobileDevice() {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }
    if(isMobileDevice()){
        //echo "It is a mobile device";
		header('location:/../mobile/');
    }
    else {
       // echo "It is desktop or computer device";
    
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Borno Sky</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
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
			<img src="images/logo.jpg">
		</div>
	</div>
	<div class="main_content">
		<div class="main_part">
			<div class="baner_menu">
				<?php require_once('banner.php');?>
				<div class="main_menu">
					<?php require_once('mainmenu.php');?>
				</div>
			</div>

			<div class="login_social">
				<?php require_once('login.php');?>
				<div class="social_part">
					<?php require_once('social_media.php'); ?>
				</div>
			</div>

		</div>
	</div>
</div>

<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>