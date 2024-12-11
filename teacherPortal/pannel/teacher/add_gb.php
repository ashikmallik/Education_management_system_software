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
                <h3>Teacher Panel [<?php echo $shget_schoolName['borno_school_name']; ?>]</h3>
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading"><h2>Add GB</h2></div>
                <div class="form">
                    <center>
                    <form name="frmcontent" action="add_gb_do.php" method="post" enctype="multipart/form-data">
                     <?php
                	$msg=$_GET['msg'];
					if($msg==1){ echo "Add GB Successfull"; }
					else if($msg==2){ echo "Failed"; }
					else if($msg==3){ echo "This GB is Already Added"; }
					
					
				?>
                        <table style="border: 1px solid #005067;">
                            <tr>
                                <td class="text_table">Branch :</td>
                                <td><select name="branchId" id="branchId" onchange="callpage();">
      <option value=""> Select </option>
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
    <td class="text_table">Type :</td>
    
    <td><input type="text" name="mgtType" id="mgtType"></td>
  </tr>   
                       <tr>
                                <td class="text_table">GB Name :</td>
                                <td><input type="text" name="teacher" id="teacher"></td>
                            </tr>
                            <tr>
    <td class="text_table">Designation :</td>
 
    <td><label for="stfdesig"></label>
      <input type="text" name="stfdesig" id="stfdesig" /></td>
  </tr>
                             <tr>
                                <td class="text_table">Address :</td>
                                <td><input type="text" name="address" id="address"></td>
                            </tr>
                            <tr>
                                <td class="text_table" style="width:100px">Phone :</td>
                                <td><input type="text" name="phone" id="phone"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><center><input type="submit" name="" value="Save"></center></td>
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