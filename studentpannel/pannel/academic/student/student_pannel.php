<?php require_once('student_top.php');?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>My Profile</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <!-- Meta tag -->
    
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    
      <link rel="stylesheet" href="datCss/jquery-ui.css">
    <link rel="stylesheet" href="datCss/jquery-ui1.css">
    <link rel="stylesheet" href="datCss/style.css">
    <script src="datCss/jquery-1.12.4.js"></script>
    <script src="datCss/jquery-ui.js"></script>
    <script src="datCss/jquery-ui1.js"></script>

<script>
  $( function() {
    $( "#datepicker" ).datepicker();
	$( "#datepicker1" ).datepicker();
  } );
  </script> 
    
</head>
<body>

<div class="wrapper">
    <div class="side_main_menu">
        <div class="top_part_menu">
            <h3>My Profile</h3>
            <ul>
                <?php
               		require_once('leftmenu.php');
			   ?>         
            </ul>
        </div>
        <div class="fixed_logo">
            <a href=""><img src="../assets/images/logo.jpg" class="img-fluid"></a>
        </div>
    </div><!-- side bar end -->


   <div class="ot_main_content">
        <div class="admin_logout">
            <div class="admin_head">
                <h3>My Profile [ <?php echo $shget_schoolName['borno_school_student_name']; ?> ]</h3>
            </div>
            <div class="log_out">
                <a href=""><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

<script language="javascript">

	
	function callpage()
	{
	 document.frmcontent.action="student_pannel.php";
	 document.frmcontent.submit();
	}
	
	
	
</script>
        
    <div class="ot_main_body" style="margin-top:5px; margin-left:5px;">
            <div class="ot_body_fixed">
                <div class="default_heading"><h2>My Profile</h2></div>
                <div class="form">

                </div>
            </div>
        </div><!-- Main Body part end -->
    </div><!-- Main Content end -->
</div>

<!--Script part-->

</body>
</html>