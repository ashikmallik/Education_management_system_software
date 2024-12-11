<?php require_once('result_sett_top.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>:: [Others Info]::</title>
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
            <a href=""><img src="../assets/images/logo.jpg" class="img-fluid"></a>
        </div>
    </div><!-- side bar end -->

    <div class="ot_main_content">
        <div class="admin_logout">
            <div class="admin_head">
                <h3> Others Info </h3>
                
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2> Report Class Routine</h2></div>
                <div class="form">
                    <center>


<script language="javascript">
	
	
	function callpage()
	{
	 document.frmcontent.action="report_routine.php";
	 document.frmcontent.submit();
	}
	
	
	
</script>

<form name="frmcontent" id="myform" action="report_routine.php" method="post" enctype="multipart/form-data">
<table width="450" border="0" cellspacing="0" cellpadding="0" align="center" class="projectlist">
  <tr>
    <td colspan="3" align="center"><h3>  Teacher Report</h3></td>
    </tr>
  
  <tr>
    <td width="174"><strong>Select Branch</strong></td>
    <td width="17" align="center"><strong>:</strong></td>
    <td width="259"><select name="branchId" id="branchId" onchange="callpage();">
      <option value=""> --Select-- </option>
      <?php
					$data="select * from borno_school_branch where borno_school_id='$schId'";
					$qdata=$mysqli->query($data);
					while($showdata=$qdata->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $showdata['borno_school_branch_id']; ?>" <?php if($showdata['borno_school_branch_id']==$_POST['branchId']) { echo "selected"; }  ?>> <?php echo $showdata['borno_school_branch_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
  <tr>
    <td><strong>Select Shift</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><select name="shiftId" id="shiftId" onchange="callpage();">
      <option value=""> --Select-- </option>
      <?php
					$branchId=$_POST['branchId'];
					$gstshift="select * from borno_school_shift";
					$qggstshift=$mysqli->query($gstshift);
					while($shggstshift=$qggstshift->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $shggstshift['borno_school_shift_id']; ?>" <?php if($shggstshift['borno_school_shift_id']==$_POST['shiftId']) { echo "selected"; }  ?>> <?php echo $shggstshift['borno_school_shift_name']; ?></option>
      <?php } ?>
      </select></td>
  </tr>
  <tr>
    <td><strong>Select Teacher </strong></td>
    <td align="center"><strong>:</strong></td>
   
    <td><select name="teacherid" id="teacherid" onchange="callpage();">
     <option value=""> --Select-- </option>
		  <?php
                        $branchId=$_REQUEST['branchId'];
                        $shiftId=$_REQUEST['shiftId'];
                        $gstteacher="select * from borno_teacher_info where borno_school_id='$schId'  and borno_school_shift_id='$shiftId' AND borno_school_branch_id='$branchId'";
                        $qgstteacher=$mysqli->query($gstteacher);
                        while($shgstteacher=$qgstteacher->fetch_assoc()){ $sl++;				
         ?>
        <option value=" <?php echo $shgstteacher['borno_teacher_info_id']; ?>" <?php if($shgstteacher['borno_teacher_info_id']==$_REQUEST['teacherid']) { echo "selected"; }  ?>> <?php echo $shgstteacher['borno_teacher_name']; ?></option>
        
        <?php } ?>
        
      </select></td>
  </tr>
</table>
</form>

<br>
<table width="450" border="0" cellspacing="0" cellpadding="0" align="center" class="projectlist">
  <tr>
    <td width="343" align="Center">
    	<a href="download_class_routine.php?schId=<?php echo $schId; ?>&gtfbranchId=<?php echo $branchId; ?>&shiftId=<?php echo $shiftId; ?>&teacherid=<?php echo $teacherid=$_REQUEST['teacherid']; ?>" target="_blank">Show Teacher</a>
    	

        <br></td>
         </tr>
         <!--
       <tr width="343" align="Center">
     <td>
       <a href="show_routine_shift.php?schId=<?php echo $schId; ?>&gtfbranchId=<?php echo $branchId; ?>&shiftId=<?php echo $shiftId; ?>" target="_blank">Show Shift</a>
       </td>
        
  </tr>
       -->    
       <tr width="343" align="Center">
     <td>
       <a href="download_routine_shift.php?schId=<?php echo $schId; ?>&gtfbranchId=<?php echo $branchId; ?>&shiftId=<?php echo $shiftId; ?>" target="_blank">Show Shift</a>
       </td>
        
  </tr>
    
</table>




                        
                        
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