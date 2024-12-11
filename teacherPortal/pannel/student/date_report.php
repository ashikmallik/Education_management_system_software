<?php require_once('student_top.php');?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Student Pannel</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <!-- Meta tag -->
    
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
</head>
<body>

<div class="wrapper">
    <div class="side_main_menu">
        <div class="top_part_menu">
            <h3>Student   Panel</h3>
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
                <h3>Student Panel</h3>
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

<script language="javascript">
	function contalt_valid()
	{
	   	if(document.frmcontent.stsess.value=="")
		{
			alert("Please Select Session");
			document.frmcontent.stsess.focus();
			return (false);
		}
		
		if(document.frmcontent.branchId.value=="")
		{
			alert("Please Select Branch");
			document.frmcontent.branchId.focus();
			return (false);
		}
		

		
	}
	
	
	function callpage()
	{
	 document.frmcontent.action="date_report.php";
	 document.frmcontent.submit();
	}
	
	
	
</script>
        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading"><h2>Date Report</h2></div>
                             
                <div class="form">
                    
          
                        <center>
<form name="frmcontent" id="myform" action="download_date_report.php" method="post" enctype="multipart/form-data">
                    
					
		<?php
        	$msg=$_GET['msg'];
			if($msg==1) { echo "Manage Group Successfully"; } 
			else if($msg==2) { echo "Failed"; }  
			else if($msg==3) { echo "Roll Is Already Exist Please Select Another On"; }
		?>
   
   <table align="center" style="border: 1px solid #005067;">
  <tr>
    <td class="text_table">Select Year *</td>
    <td><select name="year" id="year" onchange="callpage();">
            <option value=""> Select Year </option>
            <option value="2020" <?php if($_REQUEST['year']==2020) { echo "selected"; } ?>> 2020 </option>
            <option value="2021" <?php if($_REQUEST['year']==2021) { echo "selected"; } ?>> 2021 </option>
            <option value="2022" <?php if($_REQUEST['year']==2022) { echo "selected"; } ?>> 2022 </option>            
          </select></td>
    
  </tr>
  <tr>
    <td class="text_table">Select Month *</td>
    <td><select name="month" id="month" onchange="callpage();">
            <option value=""> Select Month </option>
            <option value="1" <?php if($_REQUEST['month']==1) { echo "selected"; } ?>> January </option>
            <option value="2" <?php if($_REQUEST['month']==2) { echo "selected"; } ?>> February </option>
            <option value="3" <?php if($_REQUEST['month']==3) { echo "selected"; } ?>> March </option>   
            <option value="4" <?php if($_REQUEST['month']==4) { echo "selected"; } ?>> April </option>
            <option value="5" <?php if($_REQUEST['month']==5) { echo "selected"; } ?>> May </option>
            <option value="6" <?php if($_REQUEST['month']==6) { echo "selected"; } ?>> June </option> 
            <option value="7" <?php if($_REQUEST['month']==7) { echo "selected"; } ?>> July </option>
            <option value="8" <?php if($_REQUEST['month']==8) { echo "selected"; } ?>> August </option>
            <option value="9" <?php if($_REQUEST['month']==9) { echo "selected"; } ?>> September </option> 
            <option value="10" <?php if($_REQUEST['month']==10) { echo "selected"; } ?>> October </option>
            <option value="11" <?php if($_REQUEST['month']==11) { echo "selected"; } ?>> November </option>
            <option value="12" <?php if($_REQUEST['month']==12) { echo "selected"; } ?>> December </option>             
          </select></td>
  </tr>
  
  
  <tr>
    <td colspan="2" align="center"><input type="submit" name="button" id="button" value="Show" formtarget="_blank"  onClick="return contalt_valid()"></td>
   </tr>                      </table>
                   
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