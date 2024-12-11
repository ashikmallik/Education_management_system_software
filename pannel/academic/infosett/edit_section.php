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
                  <h2>Manage Section</h2></div>
                <div class="form">
                    <center>
               <script language="javascript">
		
	function callpage()
	{
	 document.frmcontent.action="edit_section.php";
	 document.frmcontent.submit();
	}
	
	
	
</script>      
                    <form name="frmcontent" action="update_section.php" method="post" enctype="multipart/form-data">
                        <table>
                        <?php
                	$msg=$_GET['msg'];
					if($msg==1){ echo "Add Section Successfull"; }
					else if($msg==2){ echo "Failed"; }
					else if($msg==3){ echo "Section Already Exist"; }
					
					$branchId=$_GET['branchId'];
					$secftId=$_GET['secftId'];
					$sectionName="select * from borno_school_section where borno_school_section_id ='$secftId'";
			
					$qsectionName=$mysqli->query($sectionName );
					$shsectionName=$qsectionName->fetch_assoc();
					
				?>
                            <tr>
                              <td class="text_table">Select Branch</td>
                              <td width="320"><select name="branchId" id="branchId" onChange="callpage();">
                                <option value=""> Select Branch </option>
                                <?php
                                        
                                        $data="select * from borno_school_branch where borno_school_id='$schId'";
                                        $qdata=$mysqli->query($data);
                                        while($showdata=$qdata->fetch_assoc()){ $sl++;
                                    
                                    ?>
                                <option value=" <?php echo $showdata['borno_school_branch_id']; ?>" <?php if($showdata['borno_school_branch_id']==$shsectionName['borno_school_branch_id']) { echo "selected"; }  ?>> <?php echo $showdata['borno_school_branch_name']; ?></option>
                                <?php } ?>
                              </select>
                              
                              
                              </td>
                            </tr>
                            <tr>
                              <td class="text_table">Select Class</td>
                              <td width="320"><select name="studClass" id="studClass" onChange="callpage();">
                                <option value=""> Select Class</option>
                                <?php
                                        $gtfbranchId=$_POST['branchId'];
                                        $gstclass="select * from borno_school_class order by clorder asc";
                                        $qgstclass=$mysqli->query($gstclass);
                                        while($shgstclass=$qgstclass->fetch_assoc()){ $sl++;
                                    
                                    ?>
                                <option value=" <?php echo $shgstclass['borno_school_class_id']; ?>" <?php if($shgstclass['borno_school_class_id']==$shsectionName['borno_school_class_id']) { echo "selected"; }  ?>> <?php echo $shgstclass['borno_school_class_name']; ?></option>
                                <?php } ?>
                              </select></td>
                            </tr>
                            <tr>
                              <td class="text_table">Select Shift</td>
                              <td width="320"><select name="shiftId" id="shiftId" onChange="callpage();">
            <option value=""> Select Shift </option>
            <?php
					$studClass=$_POST['studClass'];
					$gstshift="select * from borno_school_shift";
					$qggstshift=$mysqli->query($gstshift);
					while($shggstshift=$qggstshift->fetch_assoc()){ $sl++;
				
				?>
            <option value=" <?php echo $shggstshift['borno_school_shift_id']; ?>" <?php if($shggstshift['borno_school_shift_id']==$shsectionName['borno_school_shift_id']) { echo "selected"; }  ?>> <?php echo $shggstshift['borno_school_shift_name']; ?></option>
            <?php } ?>
          </select></td>
                            </tr>
                            <tr>
                                <td width="86" class="text_table">Section Name</td>
                                <td width="320"><input name="section" type="text" id="section"  value="<?php echo $shsectionName['borno_school_section_name']; ?>"></td>
                            </tr>                            
                            <tr>
                                <td></td>
                                <td><center><input type="submit" name="" value="Update">
                                 <input type="hidden" name="sectId" id="sectId" value="<?php echo $shsectionName['borno_school_section_id']; ?>" />
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