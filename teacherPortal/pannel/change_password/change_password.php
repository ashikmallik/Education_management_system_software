<?php require_once('academic_top.php');

	$query="SELECT * FROM `borno_set_class_teacher` WHERE `borno_school_teacher_id`='$teacherid'";

								
									$rsquery =$mysqli->query($query);								

									$result=$rsquery->fetch_assoc();

									$class=$result['borno_school_class_id'];
								
?>
<!DOCTYPE html>
<html>
<head>
    <title>:: [Teacher Portal]::</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <!-- Meta tag -->
    <meta charset="utf-8">
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

      <link rel="stylesheet" href="student/datCss/jquery-ui.css">
    <link rel="stylesheet" href="student/datCss/jquery-ui1.css">
    <link rel="stylesheet" href="student/datCss/style.css">
    <script src="student/datCss/jquery-1.12.4.js"></script>
    <script src="student/datCss/jquery-ui.js"></script>
    <script src="student/datCss/jquery-ui1.js"></script>

<script>
  $( function() {
    $( "#datepicker" ).datepicker();
    $( "#datepicker1" ).datepicker();
	
  } );
  </script>     
</head>
<body>
<script language="javascript">
	function contalt_valid()
	{
		if(document.frmcontent.studClass.value=="")
		{
			alert("Please Select Class");
			document.frmcontent.studClass.focus();
			return (false);
		}
		if(document.frmcontent.termsess.value=="")
		{
			alert("Please Select Session");
			document.frmcontent.termsess.focus();
			return (false);
		}
						
	}
	
	
	function callpage()
	{
	 document.frmcontent.action="collection_report.php";
	 document.frmcontent.submit();
	}	
	
		
</script> 
<div class="wrapper">
    <div class="side_main_menu">
        <?php require_once('leftmenu.php');?>	
        <div class="fixed_logo">
            <a href=""><img src="assets/images/logo.jpg" class="img-fluid"></a>
        </div>
    </div><!-- side bar end -->

    <div class="ot_main_content">
        <div class="admin_logout">
            <div class="admin_head">
               <h3> [<?php echo $shget_schoolName['borno_school_name']; ?>]</h3>
            </div>
            <div class="log_out">
                <a href="logout.php"><img src="assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Change Password </h2></div>
                <div class="create_form">
					<div class="main_form_login">
                    	<?php
                    	error_reporting(0);
                        	$msg=$_GET['msg'];
							if($msg==2){							
						?>
						<h4> Incorrect ID or Password</h4>
                        <?php } else { ?>
                        <h4> Change Password</h4>
                        <?php } ?>
						   <form action="login_action.php" method="post" enctype="multipart/form-data">
								<input type="password" name="oldPass" placeholder="Type Old Password">
								<input type="password" name="newPass" placeholder="Type New Password">
							<center><button type="submit" value="Login">Update</button> </center>
						</form>
					</div>
				</div>
            </div>
        </div><!-- Main Body part end -->
    </div><!-- Main Content end -->
</div>


<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>


</body>
</html>