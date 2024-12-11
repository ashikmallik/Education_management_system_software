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
                <h3> Information Settings [<?php echo $shget_schoolName['borno_school_name']; ?>]</h3>
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
	 document.frmcontent.action="manage_section.php";
	 document.frmcontent.submit();
	}
	
	
	
</script> 
                    <form name="frmcontent" action="manage_section_do.php" method="post" enctype="multipart/form-data">
                        <table style="border: 1px solid #005067;">
                        <?php
                	$msg=$_GET['msg'];
					if($msg==1){ echo "Update Section Successfull"; }
					else if($msg==2){ echo "Failed"; }
					
					
				?>
                            <tr>
                              <td width="86" class="text_table">Select Branch</td>
                              <td width="320"><select name="branchId" id="branchId" onChange="callpage();">
                                <option value=""> Select Branch </option>
                                <?php
                                        
                                        $data="select * from borno_school_branch where borno_school_id='$schId'";
                                        $qdata=$mysqli->query($data);
                                        while($showdata=$qdata->fetch_assoc()){ $sl++;
                                    
                                    ?>
                                <option value=" <?php echo $showdata['borno_school_branch_id']; ?>" <?php if($showdata['borno_school_branch_id']==$_POST['branchId']) { echo "selected"; }  ?>> <?php echo $showdata['borno_school_branch_name']; ?></option>
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
										
										$getClassId="select * from borno_school_set_class where borno_school_id='$schId' AND borno_school_branch_id='$gtfbranchId'";
		
		
		$qgetClassId=$mysqli->query($getClassId);
		while($shgetClassId=$qgetClassId->fetch_assoc()){
										
										$getfClassId=$shgetClassId['borno_school_class_id']; 
                                        $gstclass="select * from borno_school_class where borno_school_class_id='$getfClassId'";
                                        $qgstclass=$mysqli->query($gstclass);
                                        $shgstclass=$qgstclass->fetch_assoc(); 
                                    
                                    ?>
                                <option value=" <?php echo $shgstclass['borno_school_class_id']; ?>" <?php if($shgstclass['borno_school_class_id']==$_POST['studClass']) { echo "selected"; }  ?>> <?php echo $shgstclass['borno_school_class_name']; ?></option>
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
            <option value=" <?php echo $shggstshift['borno_school_shift_id']; ?>" <?php if($shggstshift['borno_school_shift_id']==$_POST['shiftId']) { echo "selected"; }  ?>> <?php echo $shggstshift['borno_school_shift_name']; ?></option>
            <?php } ?>
          </select></td>
                            </tr>
                            <tr>
                              <td class="text_table">&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                        </table>
                       </br>
                    </form>
                    <table width="415" border="0" cellspacing="0" cellpadding="0" align="center" class="projectlist">
  <tr>
    <td width="31" align="center">SL</td>
    <td width="288">Section Name</td>
    <td colspan="2" align="center">Action</td>
  </tr>
	<?php		
		$secftId=$_GET['secftId'];
		if($secftId!=""){
		/*	 $gstsection="select * from borno_student_info where borno_school_id='$schId' AND borno_school_section_id=$secftId";
                    $qgstsection=$mysqli->query($gstsection);
                    $shgstsection=$qgstsection->fetch_assoc();
                    $sectionid=$shgstsection['borno_school_section_id'];
            if($sectionid=="")
            {  */
			$delsec="delete from borno_school_section where borno_school_section_id='$secftId'";
			$mysqli->query($delsec);
			echo "Delete Success";
            }
            else
            {
            echo "Delete Not Possible";    
            }
                
          //  }		
		
		$shiftId=$_POST['shiftId'];
		$sectionName="select * from borno_school_section where borno_school_branch_id ='$gtfbranchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId'  AND borno_school_id='$schId'";
			$sl=0;
		$qsectionName=$mysqli->query($sectionName );
		while($shsectionName=$qsectionName->fetch_assoc()){ $sl++;
    
    ?>
  <tr>
    <td align="center"><?php echo $sl; ?></td>
    <td> <?php echo $shsectionName['borno_school_section_name']; echo $shsectionName['borno_school_section_id'];?> </td>
    <td width="47" align="center"><a href="edit_section.php?secftId=<?php echo $shsectionName['borno_school_section_id']; ?>">Edit</a></td>
    <td width="49" align="center"><a href="manage_section.php?secftId=<?php echo $shsectionName['borno_school_section_id']; ?>" onClick="return confirm('Seure To Delete')">Delete</a></td>
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