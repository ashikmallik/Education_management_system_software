<!DOCTYPE html>
<!--<html>-->
<!--<head>-->
<!--	<title>Borno Sky</title>-->
<!--	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">-->
<!--	<link rel="stylesheet" type="text/css" href="css/style.css">-->
	<!-- Meta -->
<!--	<meta charset="UTF-8">-->
<!--	<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--</head>-->
<!--<body>-->
<!--<div class="main">-->
<!--	<div class="left_fixed">-->
<!--		<div class="logo_top">-->
			
<!--		</div>-->
<!--		<div class="logo">-->
<!--			<img src="images/logo.jpg">-->
<!--		</div>-->
<!--	</div>-->
<!--	<div class="main_content">-->
<!--		<div class="main_part">-->
<!--			<div class="baner_menu">-->
<!--				<?php require_once('banner.php');?>-->
<!--				<div class="main_menu">-->
<!--					<?php require_once('mainmenu.php');?>-->
<!--				</div>-->
<!--			</div>-->

<!--			<div class="login_social">-->
<!--				<?php require_once('login.php');?>-->
<!--				<div class="social_part">-->
<!--					<?php require_once('social_media.php'); ?>-->
<!--				</div>-->
<!--			</div>-->

<!--		</div>-->
<!--	</div>-->
<!--</div>-->

<!--<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>-->
<!--<script type="text/javascript" src="js/bootstrap.min.js"></script>-->
<!--</body>-->
<!--</html>-->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
    body {
  margin: 0;
  padding: 0;
  background-color: #17a2b8;
  height: 100vh;
}
#login .container #login-row #login-column #login-box {
  margin-top: 120px;
  max-width: 600px;
  height: 320px;
  border: 1px solid #9C9C9C;
  background-color: #EAEAEA;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}
</style>

<body>
    <div id="login">
        <h3 class="text-center text-white pt-5"></h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="login_action.php" method="post">
                            <h3 class="text-center text-info"> Student Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Student Id:</label><br>
                                <input type="text" name="loginId" id="loginId" placeholder ="1902369" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="text" name="loginPass" id="loginPass" placeholder="xxxxxxxxxx" class="form-control">
                            </div>
                            <div class="form-group" style="margin-left: 42%;">
                                <!--<label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>-->
                                <input type="submit" name="Login" class="btn btn-info btn-md" value="Login">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>