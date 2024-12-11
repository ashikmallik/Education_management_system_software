<?php require_once('student_top.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>:: [Class Routine Settings]::</title>
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
                <h3> My Profile [<?php echo $shget_schoolName['borno_teacher_name']; ?>]</h3>
                
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Parformance</h2></div>
                <div class="form">
                    <center>


<script language="javascript">
function callpage()
{
	 document.frmcontent.action="teacher_performance.php";
	 document.frmcontent.submit();
}
</script>

<script language="javascript">
	function contalt_valid()
	{
		if(document.frmcontent.branchId.value=="")
		{
			alert("Please Select Branch");
			document.frmcontent.branchId.focus();
			return (false);
		}
		if(document.frmcontent.shiftId.value=="")
		{
			alert("Please Select Shift");
			document.frmcontent.shiftId.focus();
			return (false);
		}

	if(document.frmcontent.stsess.value=="")
		{
			alert("Please Select Session");
			document.frmcontent.stsess.focus();
			return (false);
		}
	if(document.frmcontent.teacherid.value=="")
		{
			alert("Please Select Teacher");
			document.frmcontent.teacherid.focus();
			return (false);
		}
						
	}
</script> 


<form name="frmcontent" action="download_teacher_parformance.php" method="post" enctype="multipart/form-data">

<table width="400" border="0" cellspacing="0" cellpadding="0" align="center" class="projectlist">

    <tr>
    <td colspan="3" align="center" style="color: #FE0000; font-size:24px">
    	<?php
        	$msg=$_GET['msg'];
			if($msg==1) { echo "Successfull"; } else if($msg==2) { echo "Failed"; }  else if($msg==3) { echo "Already Exist"; } 
		?>
    </td>
    </tr>
 
  <tr>
  <td><strong>Exam Type *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><select name="type" id="type" onchange="callpage();">
      <option value=""> --Select-- </option>
      <option value="1" <?php if($_REQUEST['type']==1) { echo "selected"; } ?>> Half Yearly </option>
      <option value="2" <?php if($_REQUEST['type']==2) { echo "selected"; } ?>> Annual </option>

    </select></td>
  </tr>
  <tr>
  <td><strong>Session *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><select name="stsess" id="stsess" onchange="callpage();">
      <option value=""> --Select-- </option>
      <option value="2019" <?php if($_REQUEST['stsess']==2019) { echo "selected"; } ?>> 2019 </option>
      <option value="2020" <?php if($_REQUEST['stsess']==2020) { echo "selected"; } ?>> 2020 </option>
      <option value="2021" <?php if($_REQUEST['stsess']==2021) { echo "selected"; } ?>> 2021 </option>
    </select></td>
  </tr>
 
  <tr> 
  <td colspan="3"><center><input type="submit" name="buttun" formtarget="_blank" value="Download" onClick="return contalt_valid()"></center></td>
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