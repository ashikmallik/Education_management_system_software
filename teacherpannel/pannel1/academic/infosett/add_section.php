<?php require_once('information_top.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>Information Settings</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <!-- Meta tag -->
    <meta charset="utf-8">
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
</head>
<body>
 <script>   
function callpage()
	{
	 document.frmcontent.action="add_section.php";
	 document.frmcontent.submit();
	}
</script>	
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
                <h3> Information Settings </h3>
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Add Section</h2></div>
                <div class="form">
                    <center>
                    <form name="frmcontent" action="section_do.php" method="post" enctype="multipart/form-data">
                        <table style="border: 1px solid #005067;">
                        <?php
                	$msg=$_GET['msg'];
					if($msg==1){ echo "Add Section Successfull"; }
					else if($msg==2){ echo "Failed"; }
					else if($msg==3){ echo "Section Already Exist"; }
					
				?>
                            <tr>
                              <td width="100" class="text_table">Select Branch :</td>
                              <td width="320"><select name="branchId" id="branchId" onChange="callpage();">
                                <option value="">--Select--</option>
                                <?php
                                        
                                        $data="select * from borno_school_branch where borno_school_id='$schId'";
                                        $qdata=$mysqli->query($data);
                                        while($showdata=$qdata->fetch_assoc()){ $sl++;
                                    
                                    ?>
                                <option value=" <?php echo $showdata['borno_school_branch_id']; ?>" <?php if($showdata['borno_school_branch_id']==$_REQUEST['branchId']) { echo "selected"; }  ?>> <?php echo $showdata['borno_school_branch_name']; ?></option>
                                <?php } ?>
                              </select>
                              
                              
                              </td>
                            </tr>
                            <tr>
                              <td width="100" class="text_table">Select Class :</td>
                              <td width="320"><select name="studClass" id="studClass" onChange="callpage();">
                               <option value="">--Select--</option>
                                <?php                                       
									    $gtfbranchId=$_REQUEST['branchId'];
										
										$getClassId="select * from borno_school_set_class where borno_school_id='$schId' AND borno_school_branch_id='$gtfbranchId'";
		
		
		$qgetClassId=$mysqli->query($getClassId);
		while($shgetClassId=$qgetClassId->fetch_assoc()){
										
										$getfClassId=$shgetClassId['borno_school_class_id']; 
                                        $gstclass="select * from borno_school_class where borno_school_class_id='$getfClassId'";
                                        $qgstclass=$mysqli->query($gstclass);
                                        $shgstclass=$qgstclass->fetch_assoc(); 
                                    
                                    ?>
                                <option value=" <?php echo $shgstclass['borno_school_class_id']; ?>" <?php if($shgstclass['borno_school_class_id']==$_REQUEST['studClass']) { echo "selected"; }  ?>> <?php echo $shgstclass['borno_school_class_name']; ?></option>
                                <?php } ?>
                              </select></td>
                            </tr>
                            <tr>
                              <td width="100" class="text_table">Select Shift :</td>
                              <td width="320"><select name="shiftId" id="shiftId" onChange="callpage();">
            <option value="">--Select--</option>
            <?php
					$studClass=$_REQUEST['studClass'];
					$gstshift="select * from borno_school_shift";
					$qggstshift=$mysqli->query($gstshift);
					while($shggstshift=$qggstshift->fetch_assoc()){ $sl++;
				
				?>
            <option value=" <?php echo $shggstshift['borno_school_shift_id']; ?>" <?php if($shggstshift['borno_school_shift_id']==$_REQUEST['shiftId']) { echo "selected"; }  ?>> <?php echo $shggstshift['borno_school_shift_name']; ?></option>
            <?php } ?>
          </select></td>
                            </tr>
                            <tr>
                                <td width="100" class="text_table" >Section Name :</td>
                                <td width="320"><input name="section" type="text" id="section"></td>
                            </tr>                            
                            <tr>
                                <td></td>
                                <td><center><input type="submit" name="" value="Save">
                                </center></td>
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