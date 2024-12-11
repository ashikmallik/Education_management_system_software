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
	 document.frmcontent.action="manage_teacher.php";
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
                <h3>Teacher Panel</h3>
            </div>
            <div class="log_out">
                <a href=""><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Manage Teacher</h2></div>
                <div class="form">
                    <center>
                    <form name="frmcontent" action="manage_teacher_do.php" method="post" enctype="multipart/form-data">
                     <?php
                	$msg=$_GET['msg'];
					if($msg==1){ echo "Update Teacher Successfull"; }
					else if($msg==2){ echo "Failed"; }
										
					
				?>
                        <table width="450" style="border: 1px solid #005067;">
                            <tr>
                                <td class="text_table">Branch :</td>
                                <td><select name="branchId" id="branchId" onchange="callpage();">
      
      <?php
					$data="select * from borno_school_branch where borno_school_id='$schId' AND borno_school_branch_id='$branchID'";
					$qdata=$mysqli->query($data);
					while($showdata=$qdata->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $showdata['borno_school_branch_id']; ?>" <?php if($showdata['borno_school_branch_id']==$_POST['branchId']) { echo "selected"; }  ?>> <?php echo $showdata['borno_school_branch_name']; ?></option>
      <?php } ?>
    </select></td>
                            </tr>
    <tr>
    <td class="text_table"> Shift *</td>
    <td><select name="shiftId" id="shiftId" onchange="callpage();">
      <?php
					
					$gstshift="select * from borno_school_shift where borno_school_shift_id='$shiftID'";
					$qggstshift=$mysqli->query($gstshift);
					while($shggstshift=$qggstshift->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $shggstshift['borno_school_shift_id']; ?>" <?php if($shggstshift['borno_school_shift_id']==$_REQUEST['shiftId']) { echo "selected"; }  ?>> <?php echo $shggstshift['borno_school_shift_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
                            
                        </table>
                    </form>
                    <table width="450" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td class="text_table" align="right"><a href="download_teacher_info_pdf.php?branchId=<?php echo $_POST['branchId']; ?>&schoolId=<?php echo $schId; ?>" target="_blank">Download as PDF</a></td>
  </tr>
</table>

<table   width="500" border="0" cellspacing="0" cellpadding="0" align="center" class="projectlist">
  <tr>
    <td width="29" align="center">SL</td>
    <td  width="206">Teacher Name</td>
    <td  width="127">Phone</td>
    <td  colspan="2" align="center">Action</td>
  </tr>
  
  <?php
  	
	$techId=$_GET['techId'];
	if($techId!="") {
		
			$deltect="delete from borno_teacher_info where borno_teacher_info_id='$techId'";
			$mysqli->query($deltect);
			
			echo "Delete Success";	
		}
  

	

 	$branchId=trim($_POST['branchId']);
 	$shiftId=trim($_POST['shiftId']);
 	
	$techinfo="select * from borno_teacher_info where borno_school_branch_id='$branchID' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftID' order by borno_teacher_info_id asc";
	$qtechinfo=$mysqli->query($techinfo);	
		$sl=0;
	while($shtechinfo=$qtechinfo->fetch_assoc()){ $sl++;
	
	
	 if($branchID!="")
	 {	
		
  ?>
  
       
     <tr>
    <td align="center"><?php echo $sl; ?></td>
    <td> <?php echo $shtechinfo['borno_teacher_name']; ?></td>
    <td> <?php echo substr($shtechinfo['borno_teacher_phone'],2,11); ?></td>
    <td width="41" align="center"><a href="edit_teacher.php?techId=<?php echo $shtechinfo['borno_teacher_info_id']; ?>">Edit</a></td>
    <td width="47" align="center"><a href="manage_teacher.php?techId=<?php echo $shtechinfo['borno_teacher_info_id']; ?>" onClick="return confirm('Delete')">Delete</a></td>
  </tr>
    <?php }} ?>   
  
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