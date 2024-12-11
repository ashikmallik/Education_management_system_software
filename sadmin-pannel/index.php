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
		<div class="logo"></div>
	</div>
	<div class="main_content">
		<div class="main_part">
			<div class="baner_menu">
				
                <div class="main_form_login">
                
                      
                             <div style="width:180px; margin:auto"> <img src="../images/logo.jpg" width="175"></div>
                        
                        <br>
                
                    	<?php
                        	$msg=$_GET['msg'];
							if($msg==2){							
						?>
						<h4> Incorrect ID or Password</h4>
                        <?php } else { ?>
                        <h4> Admin Login </h4>
                        <?php } ?>
						   <form action="login_action.php" method="post" enctype="multipart/form-data">
							 <input type="text" name="loginId" placeholder="Admin Log ID">
							 <input type="password" name="loginPass" placeholder="Admin Password">
							<center><button type="submit" value="Login">Login</button> </center>
						</form>
			  </div>
                
                
			  <div class="main_menu">
					<?php //require_once('../mainmenu.php');?>
				</div>
			</div>

			<div class="login_social">
				<?php //require_once('login.php');?>
				<div class="social_part">
					<?php //require_once('social_media.php'); ?>
				</div>
			</div>

		</div>
	</div>
</div>

<!--<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>-->
</body>
</html>