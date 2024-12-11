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
				<div class="create_form">
					<div class="main_form_login">
                    	<?php
                        	$msg=$_GET['msg'];
							if($msg==2){							
						?>
						<h4> Incorrect ID or Mobile No</h4>
						<?php } elseif($msg==1) { ?>
                        <h4> Create Account Successfull</h4>
                        <?php } elseif($msg==3) { ?>
                        <h4> Account Already Created</h4>
                        <?php } else { ?>
                        <h4> Create Account</h4>
                        <?php } ?>
						   <form action="create_action.php" method="post" enctype="multipart/form-data">
								<input type="text" name="loginId" placeholder="Type Student ID">
								<input name="conno" type="text" id="conno" placeholder="Type Contact No">										
								<input type="password" name="loginPass" placeholder="Type Password">
							<center><button type="submit" value="Login">Create</button> </center>
						</form>
					</div>
				</div>
				<div class="main_menu">
					<?php require_once('mainmenu.php');?>
				</div>
			</div>

			<div class="login_social">
				<div class="login_btn">
					<div class="login_menu_create">
						
					</div>
				</div>
				<div class="social_part">
					<div class="social_menu">
						<a href="">
							<img src="images/flogo.jpg" height="50px" width="50px">
							<p>Facebook</p>
						</a>
					</div>
					<div class="social_menu">
						<a href="">
							<img src="images/tlogo.jpg" height="50px" width="50px">
							<p>Twitter</p>
						</a>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>