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
                <div class="default_heading"><h2>Manage Staff</h2></div>
                <div class="form">
                    <center>
                    <form name="frmcontent" action="update_staff.php" method="post" enctype="multipart/form-data">
                     <?php
                	$msg=$_GET['msg'];
					if($msg==1){ echo "Add Staff Successfull"; }
					else if($msg==2){ echo "Failed"; }
					else if($msg==3){ echo "This Staff is Already Added"; }
					
					$techId=$_GET['techId'];
			$techinfo="select * from borno_mgt_staff_info where borno_mgt_staff_info_id='$techId'";
	        $qtechinfo=$mysqli->query($techinfo);	
	        $shtechinfo=$qtechinfo->fetch_assoc();
					
				?>
                        <table>
                            <tr>
                                <td class="text_table">Branch</td>
                                <td><select name="branchId" id="branchId" onchange="callpage();">
      <option value=""> Select </option>
      <?php
					$data="select * from borno_school_branch where borno_school_id='$schId'";
					$qdata=$mysqli->query($data);
					while($showdata=$qdata->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $showdata['borno_school_branch_id']; ?>" <?php if($showdata['borno_school_branch_id']==$shtechinfo['borno_school_branch_id']) { echo "selected"; }  ?>> <?php echo $showdata['borno_school_branch_name']; ?></option>
      <?php } ?>
    </select></td>
                            </tr>
                          <tr>
    <td class="text_table">Type </td>
    
    <td>
      <select name="mgtType" id="mgtType">
        	<option> Select </option>
            <option value="Management" <?php if($shtechinfo['borno_mgt_staff_type']=='Management') { echo "selected"; } ?> > Management </option>
            <option value="Staff" <?php if($shtechinfo['borno_mgt_staff_type']=='Staff') { echo "selected"; } ?>> Staff </option>
      </select></td>
  </tr>   
                       <tr>
                                <td class="text_table">Staff Name</td>
                                <td><input type="text" name="teacher" id="teacher" value="<?php echo $shtechinfo['borno_mgt_staf_name']; ?>"></td>
                            </tr>
                            <tr>
    <td class="text_table">Designation</td>
 
    <td><label for="stfdesig"></label>
      <input type="text" name="stfdesig" id="stfdesig" value="<?php echo $shtechinfo['borno_mgt_staf_desig']; ?>"/></td>
  </tr>
                             <tr>
                                <td class="text_table">Address</td>
                                <td><input type="text" name="address" id="address" value="<?php echo $shtechinfo['borno_mgt_staf_address']; ?>"></td>
                            </tr>
                            <tr>
                                <td class="text_table">Phone</td>
                                <td><input type="text" name="phone" id="phone" value="<?php echo $shtechinfo['borno_mgt_staf_phone']; ?>"></td>
                            </tr>
                            <tr>
                              <td colspan="2" align="center">Phone Format 88018XXXXXXXX</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><center><input type="submit" name="" value="Update"></center>
                                 <input type="hidden" name="techId" id="techId" value="<?php echo $shtechinfo['borno_mgt_staff_info_id']; ?>">
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
<script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js"></script>
</body>
</html>