<?php require_once('information_top.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>Information Settings</title>
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
	
  } );
  </script>
</head>
<body>

<div class="wrapper">
    <div class="side_main_menu">
        <?php require_once('leftmenu.php');?>	
        <div class="fixed_logo">
            <a href=""><img src="../assets/images/logo.jpg" class="img-fluid"></a>
        </div>
    </div><!-- side bar end -->

    <div class="ot_main_content">
        <div class="admin_logout">
            <div class="admin_head">
                <h3> <?php echo $shget_schoolName['borno_school_name']; ?> </h3>
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->
        
        
        <script language="javascript">
	function contalt_valid()
	{
		
		if(document.frmcontent.schoolName.value=="")
		{
			alert("Please Write School Name");
			document.frmcontent.schoolName.focus();
			return (false);
		}
			if(document.frmcontent.Address.value=="")
		{
			alert("Please Write Address");
			document.frmcontent.Address.focus();
			return (false);
		}
		
		if(document.frmcontent.phone.value=="")
		{
			alert("Please Write Phone No.");
			document.frmcontent.phone.focus();
			return (false);
		}
		
		if(document.frmcontent.email.value=="")
		{
			alert("Please Write Email Id");
			document.frmcontent.email.focus();
			return (false);
		}
		
		if(document.frmcontent.loginId.value=="")
		{
			alert("Please Write Login Id");
			document.frmcontent.loginId.focus();
			return (false);
		}
		
	
	}
	
	
	function callpage()
	{
	 document.frmcontent.action="information_pannel.php";
	 document.frmcontent.submit();
	}
	
	
	
</script>
        
        
        

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading"><h2>Admin Profile</h2></div>
                <div class="form">
                    <center>
                    <form name="frmcontent" action="information_pannel_do.php" method="post" enctype="multipart/form-data">
                        <?php
                	$msg=$_GET['msg'];
					if($msg==1){ echo "Profile Update Successfull"; }
					else if($msg==2){ echo "Failed"; }
								
				?>
                        <table style="border: 1px solid #005067;">
                            <tr>
                                <td width="100" class="text_table">School Name :</td>
                                <td><input name="schoolName" type="text" id="schoolName"></td>
                            </tr>
                             <tr>
                                <td width="100" class="text_table">Address  :</td>
                                <td><input name="Address" type="text" id="Address"></td>
                            </tr>
                             <tr>
                                <td width="100" class="text_table">Phone :</td>
                                <td><input name="phone" type="text" id="phone"></td>
                            </tr>
                             <tr>
                                <td width="100" class="text_table">E-mail :</td>
                                <td><input name="email" type="text" id="email"></td>
                            </tr>
                             <tr>
                                <td width="100" class="text_table">Login ID :</td>
                                <td><input name="loginId" type="text" id="loginId"></td>
                            </tr>
                            
                            <tr>
                                <td></td>
                                <td><center><input type="submit" name="" value="Save" onClick="return contalt_valid()"></center></td>
                            </tr>
                        </table>
                    </form>
                    </center>
                </div>
            </div>
        </div><!-- Main Body part end -->
    </div><!-- Main Content end -->
</div>

<!--Script part-->
<script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js"></script>
</body>
</html>