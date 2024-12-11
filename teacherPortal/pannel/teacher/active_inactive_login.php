<?php require_once('teacher_top.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>Teacher Panel</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <!-- Meta tag -->
    <meta charset="utf-8">
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
</head>
<body>

<script language="javascript">

function callpage()
	{
	 document.frmcontent.action="active_inactive_login.php";
	 document.frmcontent.submit();
	}
	
	
	
</script>

<div class="wrapper">
    <div class="side_main_menu">
        <?php include('lefymenu.php'); ?>
        <div class="fixed_logo">
            <a href=""><img src="../assets/images/logo.jpg" class="img-fluid"></a>
        </div>
    </div><!-- side bar end -->

    <div class="ot_main_content">
        <div class="admin_logout">
            <div class="admin_head">
                <h3>Teacher Panel [<?php echo $shget_schoolName['borno_school_name']; ?>]</h3>
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Manage Login</h2></div>
                <div class="form">
                  <center>
                    <form name="frmcontent" action="active_inactive_login_do.php" method="post" enctype="multipart/form-data">
                     <?php
                	$msg=$_GET['msg'];
					if($msg==1){ echo "Update Successfull"; }
					else if($msg==2){ echo "Failed"; }
										
					
				?>
            <table width="393" style="border: 1px solid #005067;">
                            <tr>
                                <td width="142" class="text_table">Branch :</td>
                                <td width="239"><select name="branchId" id="branchId" onchange="callpage();">
      <option value="">--Select--</option>
      <?php
					$data="select * from borno_school_branch where borno_school_id='$schId'";
					$qdata=$mysqli->query($data);
					while($showdata=$qdata->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $showdata['borno_school_branch_id']; ?>" <?php if($showdata['borno_school_branch_id']==$_REQUEST['branchId']) { echo "selected"; }  ?>> <?php echo $showdata['borno_school_branch_name']; ?></option>
      <?php } ?>
    </select></td>
                            </tr>
                             <tr>
    <td class="text_table">Select Shift *</td>
   
    <td><select name="shiftId" id="shiftId" onchange="callpage();">
      <option value=""> Select Shift</option>
      <?php
					$gstshift="select * from borno_school_shift";
					$qggstshift=$mysqli->query($gstshift);
					while($shggstshift=$qggstshift->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $shggstshift['borno_school_shift_id']; ?>" <?php if($shggstshift['borno_school_shift_id']==$_REQUEST['shiftId']) { echo "selected"; }  ?>> <?php echo $shggstshift['borno_school_shift_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>

                      </table>    
                
                
                
                
                        
                   
    <table width="120" border="0" cellspacing="0" cellpadding="0" align="center">
        <?php  
		$brnchId=$_REQUEST['branchId'];
		$shiftId=$_REQUEST['shiftId'];
		?>            
                    
  <tr>
    <td class="text_table" align="right"><a href="download_teacher_info_pdf.php?schoolId=<?php echo $schId; ?>&brnId=<?php echo $brnchId; ?>" target="_blank">Download as PDF</a></td>
  </tr>
</table>

<table   width="785" border="0" cellspacing="0" cellpadding="0" align="center" class="projectlist">
  <tr>
    <td width="27" align="center">SL</td>
    <td  width="196" align="center">Teacher Name</td>
    <td  width="121" align="center">Phone</td>
    <td  width="121" align="center">Class</td>
    <td  width="123" align="center">Section</td>
    <td  width="123" align="center">Status</td>
   </tr>
  
 
    
    <?
	$sl=0;
		$brnchId=$_REQUEST['branchId'];
		$shiftId=$_REQUEST['shiftId'];
	$techinfo="select * from borno_set_class_teacher where  borno_school_id='$schId' and borno_school_branch_id='$brnchId' AND borno_school_shift_id='$shiftId' order by	borno_class_order,borno_school_class_id,borno_school_section_id asc";
	$qtechinfo=$mysqli->query($techinfo);	
		
	while($shtechinfo=$qtechinfo->fetch_assoc()){ $sl++;
	
	 $studClass=$shtechinfo['borno_school_class_id'];
	 $section=$shtechinfo['borno_school_section_id'];
	 $teacherid1=$shtechinfo['borno_school_teacher_id'];

 $gtshift="SELECT * FROM borno_teacher_info where borno_teacher_info_id=$teacherid1";
					$qgtshift=$mysqli->query($gtshift);
					$sqgtshift=$qgtshift->fetch_assoc();
	 
	
	$gtclass="SELECT * FROM borno_school_class where borno_school_class_id=$studClass";
					$qgtclass=$mysqli->query($gtclass);
					$sqgtclass=$qgtclass->fetch_assoc();
$fnsclass=$sqgtclass['borno_school_class_name'];

$gtsection="SELECT * FROM borno_school_section where borno_school_section_id=$section";
					$qgtsection=$mysqli->query($gtsection);
					$sqgtsection=$qgtsection->fetch_assoc();
$fnssection=$sqgtsection['borno_school_section_name'];

	 $branch="select * from `borno_teacher_login` where `borno_teacher_info_id`='$teacherid1'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$status1=$smsbranch['borno_teacher_status'];


		
  ?>
  
       
     <tr>
    <td align="center"><?php echo $sl; ?></td>
    <td> <?php echo $sqgtshift['borno_teacher_name']; ?>
    <input type="hidden" name="teacherid[]" id="teacherid[]" value="<?php echo $teacherid1; ?>">
        </td>
    <td> <?php echo substr($sqgtshift['borno_teacher_phone'],2,11); ?></td>
    <td> <?php echo $fnsclass; ?></td>
    <td> <?php echo $fnssection; ?></td>
    <td>
        
        <select name="status[]" id="status[]">
<option value="1" <?php if($smsbranch['borno_teacher_status']==1) { echo "selected"; }  ?>> Active </option>
<option value="0" <?php if($smsbranch['borno_teacher_status']==0) { echo "selected"; }  ?>> Inactive </option>     
</select></td>
   
    
   
    	
    </td>
     </tr>
    <?php } ?>   
  <tr>
                                <td colspan="6"><center><input type="submit" name="buttun" value="Update" onClick="return contalt_valid()"></center>

        </td>
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

</body>
</html>