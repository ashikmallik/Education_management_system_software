<?php require_once('student_top.php');?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>:: [Class Routine Settings]::</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <!-- Meta tag -->
    
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
                <h3> Result Settings </h3>
                
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Create Calender</h2></div>
                <div class="form">
                    <center>


<script language="javascript">
function callpage()
{
	 document.frmcontent.action="calender_remarks.php";
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


<form name="frmcontent" action="calender_remarks_do.php" method="post" enctype="multipart/form-data">

<table width="800" border="0" cellspacing="0" cellpadding="0" align="center" class="projectlist">

    <tr>
    <td colspan="6" align="center" style="color: #FE0000; font-size:24px">
    	<?php
        	$msg=$_GET['msg'];
			if($msg==1) { echo "Successfull"; } else if($msg==2) { echo "Failed"; }  else if($msg==3) { echo "Already Exist"; } 
		?>
    </td>
    </tr>
  
  <tr>
  <td width="95"><strong>Year *</strong></td>
    <td width="8" align="center"><strong>:</strong></td>
    <td colspan="4"><select name="stsess" id="stsess" onchange="callpage();">
      <option value=""> --Select-- </option>
      <option value="2020" <?php if($_REQUEST['stsess']==2020) { echo "selected"; } ?>> 2020 </option>
      <option value="2021" <?php if($_REQUEST['stsess']==2021) { echo "selected"; } ?>> 2021 </option>
      <option value="2022" <?php if($_REQUEST['stsess']==2022) { echo "selected"; } ?>> 2022 </option>
    </select></td>
  </tr>
 <tr>
  <td><strong>Month *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td colspan="4"><select name="month" id="month" onchange="callpage();">
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
  <td><strong>Date *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td width="195">Comments</td>
    <td width="81" align="center">Day</td>
    <td width="67" align="center">Off Day</td>
    <td width="354">
    
            <table width="300" border="1" cellspacing="1" cellpadding="1">
              <tr>
                <td colspan="4" align="center">Color</td>
                </tr>
              <tr>
                <td bgcolor="#DFF0D8">&nbsp;</td>
                <td bgcolor="#B2B1B1">&nbsp;</td>
                <td bgcolor="#BC88F7">&nbsp;</td>
                <td bgcolor="#E5F98A">&nbsp;</td>
              </tr>
              <tr>
                <td align="center">Color-1</td>
                <td align="center">Color-2</td>
                <td align="center">Color-3</td>
                <td align="center">Color-4</td>
              </tr>
            </table>

    
    </td>
  </tr>
  <?php 
    $stsess=$_REQUEST['stsess'];
    $month=$_REQUEST['month'];
    
  	$branch1="select * from `borno_school_calender` where `borno_school_id`='$schId' AND `borno_year`='$stsess' AND `borno_month`='$month' order by borno_date asc";
	$rsQuery11 = $mysqli->query($branch1);
	while($smsbranch1=$rsQuery11->fetch_assoc()){		
		
  ?>
  <tr>
  <td><strong><?php echo $grdatfName=$smsbranch1['borno_date']; ?></strong></td>
    <td align="center"><strong>:</strong></td>
    <td><input type="text" name="remarks[]" id="remarks[]" value="<?php echo $smsbranch1['borno_remarks']; ?>" size="26"/>
    <input type="hidden" name="calid[]" id="calid[]" value="<?php echo $smsbranch1['borno_calender_id']; ?>"/></td>
    <td align="center">
    	<?php
		/*
		$gttdate=$grdatfName.'-'.$month.'-'.$stsess; 
		$nameOfDay = date('D', strtotime($gttdate));
		echo $nameOfDay;
		*/
		echo $smsbranch1['borno_day'];
		?>
    </td>
    <td align="center">
          <select style="width:100px" name="offDay[]" id="offDay[]">
          		<option value=""> Select </option>
                <option value="1" <?php if($smsbranch1['borno_day_status']==1) { echo "selected";} ?>> Off Day </option>
          </select>
    </td>
    <td>    	
			<select style="width:100px" name="dtcolor[]" id="dtcolor[]">
          		<option value=""> Select </option>
                <option value="#DFF0D8" <?php if($smsbranch1['borno_color']=='#DFF0D8') { echo "selected";} ?>> Color 1 </option>
                <option value="#B2B1B1" <?php if($smsbranch1['borno_color']=='#B2B1B1') { echo "selected";} ?>> Color 2 </option>
                <option value="#BC88F7" <?php if($smsbranch1['borno_color']=='#BC88F7') { echo "selected";} ?>> Color 3 </option>
                <option value="#E5F98A" <?php if($smsbranch1['borno_color']=='#E5F98A') { echo "selected";} ?>> Color 4 </option>
          </select>	
    </td>
  </tr>
  <?php } ?>
  <tr> 
  <td colspan="6"><center><input type="submit" name="buttun" value="Set" onClick="return contalt_valid()"></center></td>
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