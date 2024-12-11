<?php require_once('others_top.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>:: [Attendance]::</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <!-- Meta tag -->
    <meta charset="utf-8">
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
</head>
<body>

<div class="wrapper">
    <div class="side_main_menu">
        <?php require_once('leftmenu.php');?>	
        <div class="fixed_logo">
<!--            <a href=""><img src="../assets/images/logo.jpg" class="img-fluid"></a>
-->        </div>
    </div><!-- side bar end -->

    <div class="ot_main_content">
        <div class="admin_logout">
            <div class="admin_head">
                <h3>[<?php echo $shget_schoolName['borno_school_student_name']; ?>] </h3>
                
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2><span style="font-size:25px">Attendance Report</span></h2>
              </div>
                <div class="form">
                    <center>


<script language="javascript">
function callpage()
{
	 document.frmcontent.action="class_routine_settings.php";
	 document.frmcontent.submit();
}
</script>

<script language="javascript">
	function contalt_valid()
	{
		if(document.frmcontent.datepicker.value=="")
		{
			alert("Please Select Date");
			document.frmcontent.datepicker.focus();
			return (false);
		}
		if(document.frmcontent.datepicker1.value=="")
		{
			alert("Please Select Date");
			document.frmcontent.datepicker1.focus();
			return (false);
		}

	
						
	}
</script> 


	<form name="frmcontent" action="download_attendence.php" method="post" enctype="multipart/form-data" target="_blank">
                        <?php
			$msg=$_GET['msg'];
			if($msg==1) { echo "Success"; }
			else if($msg==2) { echo "Failed"; }
            else if($msg==3) { echo "Fees Already Exist"; }
 ?>
                        <table style="border: 1px solid #005067;">
                	<?php
        
		date_default_timezone_set('Asia/Dhaka');	
		
		$cdate=date('d-m-Y');
		
		?>
                <tr>
            <td class="text_table">From Date *</td>
    <td><input type="text" name="datepicker" id="datepicker" value="<?php echo $cdate; ?>"></td>
  </tr>                    
     <tr>
            <td class="text_table">To Date *</td>
    <td><input type="text" name="datepicker1" id="datepicker1" value="<?php echo $cdate; ?>">
    <input type="hidden" name="stdid" id="stdid" value="<?php echo $stdid; ?>">
    </td>
  </tr>                                   
                            
                            
        
   <tr>
<td colspan="2" align="center"><input type="submit" name="button" id="button" value="Show" onClick="return contalt_valid()"></td>
  </tr>

                        </table>
                      </form>  
<br>





                        <br>
                        
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