<?php require_once('student_top.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>My Profile</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <!-- Meta tag -->
    <meta charset="utf-8">
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
                <h3>My Profile [ <?php echo $shget_schoolName['borno_teacher_name']; ?> ]</h3>
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

<script language="javascript">
	function contalt_valid()
	{
		
		if(document.frmcontent.branchId.value=="")
		{
			alert("Please Select Branch");
			document.frmcontent.branchId.focus();
			return (false);
		}
		
		if(document.frmcontent.studClass.value=="")
		{
			alert("Please Select Class");
			document.frmcontent.studClass.focus();
			return (false);
		}
		
		if(document.frmcontent.shiftId.value=="")
		{
			alert("Please Select Shift");
			document.frmcontent.shiftId.focus();
			return (false);
		}
		
		if(document.frmcontent.section.value=="")
		{
			alert("Please Select Section");
			document.frmcontent.section.focus();
			return (false);
		}
		
		if(document.frmcontent.stsess.value=="")
		{
			alert("Please Select Session");
			document.frmcontent.stsess.focus();
			return (false);
		}
		
		if(document.frmcontent.stuName.value=="")
		{
			alert("Please Enter Student Name");
			document.frmcontent.stuName.focus();
			return (false);
		}
		
		
				
		if(document.frmcontent.stuphone.value=="")
		{
			alert("Please Enter Phone for SMS");
			document.frmcontent.stuphone.focus();
			return (false);
		}
					
		if(document.frmcontent.orgType.value=="")
		{
			alert("Please Select Organization");
			document.frmcontent.orgType.focus();
			return (false);
		}
		
		if(document.frmcontent.status.value=="")
		{
			alert("Please Select Status");
			document.frmcontent.status.focus();
			return (false);
		}
		
		if(document.frmcontent.sturoll.value=="")
		{
			alert("Please Enter Student Roll");
			document.frmcontent.sturoll.focus();
			return (false);
		}
	}
	
	
	function callpage()
	{
	 document.frmcontent.action="student_pannel.php";
	 document.frmcontent.submit();
	}
	
	
	
</script>
        <div class="ot_main_body">
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