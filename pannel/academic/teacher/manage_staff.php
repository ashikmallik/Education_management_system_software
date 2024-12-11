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
	 document.frmcontent.action="manage_staff.php";
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
                <div class="default_heading"><h2>Manage Staff</h2></div>
                <div class="form">
                    <center>
                    <form name="frmcontent" action="manage_staff_do.php" method="post" enctype="multipart/form-data">
                     <?php
                	$msg=$_GET['msg'];
					if($msg==1){ echo "Update Staff Successfull"; }
					else if($msg==2){ echo "Failed"; }
										
					
				?>
                        <table width="450" style="border: 1px solid #005067;">
                            <tr>
                                <td class="text_table">Branch :</td>
                                <td><select name="branchId" id="branchId" onchange="callpage();">
      <option value="">--Select--</option>
      <?php
					$data="select * from borno_school_branch where borno_school_id='$schId'";
					$qdata=$mysqli->query($data);
					while($showdata=$qdata->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $showdata['borno_school_branch_id']; ?>" <?php if($showdata['borno_school_branch_id']==$_POST['branchId']) { echo "selected"; }  ?>> <?php echo $showdata['borno_school_branch_name']; ?></option>
      <?php } ?>
    </select></td>
                            </tr>

                        </table>
                    </form>
                    <table width="120" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td class="text_table" align="right"><a href="download_staff_info_pdf.php?brnId=<?php echo $_POST['branchId']; ?>&schoolId=<?php echo $schId; ?>" target="_blank">Download as PDF</a></td>
  </tr>
</table>

<table   width="600" border="0" cellspacing="0" cellpadding="0" align="center" class="projectlist">
  <tr>
    <td width="29" align="center">SL</td>
    <td  width="206">Staff Name</td>
    <td  width="127">Phone</td>
    <td  width="127">Designation</td>
    <td  colspan="2" align="center">Action</td>
  </tr>
  
  <?php
  	
	$techId=$_GET['techId'];
	if($techId!="") {
		
			$deltect="delete from borno_mgt_staff_info where borno_mgt_staff_info_id='$techId'";
			$mysqli->query($deltect);
			
			echo "Delete Success";	
		}
  
  
 	$branchId=trim($_POST['branchId']);	
	$mgtType=trim($_POST['mgtType']);	
	$techinfo="select * from borno_mgt_staff_info where borno_school_branch_id='$branchId' AND borno_school_id='$schId'";
	$qtechinfo=$mysqli->query($techinfo);	
	$sl=0;	
	while($shtechinfo=$qtechinfo->fetch_assoc()){ $sl++;
	
	
  ?>
  
  
  <tr>
    <td align="center"><?php echo $sl; ?></td>
    <td> <?php echo $shtechinfo['borno_mgt_staff_name']; ?> </td>
    <td> <?php echo substr($shtechinfo['borno_mgt_staf_phone'],2,11); ?> </td>
    <td> <?php echo $shtechinfo['borno_mgt_staf_desig']; ?> </td>
    <td width="41" align="center"><a href="edit_staff.php?techId=<?php echo $shtechinfo['borno_mgt_staff_info_id']; ?>">Edit</a></td>
    <td width="47" align="center"><a href="manage_staff.php?techId=<?php echo $shtechinfo['borno_mgt_staff_info_id']; ?>" onClick="return confirm('Delete')">Delete</a></td>
  </tr>
<?php } ?>  
  
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