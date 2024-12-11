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
    
</head>
<body>
</script>
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

<script language="javascript">
function callpage()
{
 document.frmcontent.action="promotion.php";
 document.frmcontent.submit();
}
</script>
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
</script> 
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
<!--            <a href=""><img src="../assets/images/logo.jpg" class="img-fluid"></a>
-->        </div>
    </div><!-- side bar end -->

    <div class="ot_main_content">
        <div class="admin_logout">
            <div class="admin_head">
                <h3> My Profile [<?php echo $shget_schoolName['borno_school_student_name']; ?>] </h3>
                 
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Change Password</h2></div>
                <div class="form">
                    <center>
                    	<form name="frmcontent" action="promotion_do.php" method="post" enctype="multipart/form-data">
                       
                        <?php 
                        $msg=$_GET['msg'];
                        if($msg==1){echo Success;}
                        elseif($msg==2){echo failed;}
                        
                        ?>
                        
                       
                            <table width="400" border="1" style="border: 1px solid #005067;">
                
                 <tr>
               <td width="200" align="left">Type Student ID</td>
               <td width="200"><input type="text" name="studid" id="studid" size="25"></td>
               
                               </tr>
                  
               <tr>
               <td width="200" align="left">Type Current Password</td>
               <td width="200"><input type="password" name="cpass" id="cpass" size="25"></td>
               
                               </tr>
                <tr>
               <td width="200" align="left">Type New Password</td>
               <td width="200"><input type="password" name="npass" id="npass" size="25"></td>
               
                               </tr>                                              
                               
                    
                               <tr>
                              
                                 <td colspan="3" align="center"><input type="submit" name="button" id="button" value="Change"></td>
                               </tr>
                              </tr>
                            </table>
                        
                        
                        </form>
                        <br>
                        
                  </center>
                </div>
            </div>
        </div><!-- Main Body part end -->
    </div><!-- Main Content end -->
</div>

<!--Script part-->

</body>
</html>