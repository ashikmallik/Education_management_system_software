<?php require_once('student_top.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Pannel</title>
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
        <div class="top_part_menu">
            <h3>Student   Panel</h3>
            <ul>
                <?php
               		require_once('leftmenu.php');
			   ?>                 
            </ul>
        </div>
        <div class="fixed_logo">
            <a href=""><img src="../assets/images/logo.jpg" class="img-fluid"></a>
        </div>
    </div><!-- side bar end -->

    <div class="ot_main_content">
        <div class="admin_logout">
            <div class="admin_head">
                <h3>Student Panel</h3>
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->


<link rel="stylesheet" href="datCss/jquery-ui.css">
    <link rel="stylesheet" href="datCss/jquery-ui1.css">
    <link rel="stylesheet" href="datCss/style.css">
    <script src="datCss/jquery-1.12.4.js"></script>
    <script src="datCss/jquery-ui.js"></script>
    <script src="datCss/jquery-ui1.js"></script>

<script>
  $( function() {
    $( "#datepicker" ).datepicker();
	
  } );
  </script> 
<script language="javascript">
	function callpage()
	{
	 document.frmcontent.action="manage_group_indv.php";
	 document.frmcontent.submit();
	}
</script>	
	
	

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading"><h2>Manage Student</h2></div>
                <div class="form">
               <table style="border: 1px solid #005067; margin-left:50px;">
               
                     <tr >               
					<td width="6" align="center" style="color:#090">
					<?php
        	$msg=$_GET['msg'];
			if($msg==1) { echo "Student Update Successfully"; } 
			else if($msg==2) { echo "Failed"; }  
			else if($msg==3) { echo "Roll Is Already Exist Please Select Another On"; }
			else if($msg==4) { echo "Student Delete Successfully"; }
		?>
        </td>
        </tr> 
               <tr>    
                  <td>
                   
                  </td>
                  <td width="414" valign="top">
                        <center>
                   <form name="frmcontent" id="myform" action="update_stud_indvgroup.php" method="post" enctype="multipart/form-data">

   
                        <table align="center" style="border: 1px solid #F90;">
   <tr>
<td colspan="2" align="center"  style="color:#0F0"> Search Option </td>
</tr>
  
   <tr>
    <td class="text_table">Select Branch *</td>
    <td><select name="branchId" id="branchId" onchange="callpage();">
      <option value="">--Branch--</option>
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
    <td class="text_table">Select Class *</td>
    
    <td><select name="studClass" id="studClass" onchange="callpage();">
      <option value="">--Class--</option>
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
    <td class="text_table">Select Shift *</td>
   
    <td><select name="shiftId" id="shiftId" onchange="callpage();">
      <option value="">--Shift--</option>
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
  <?php
 // $shiftId=$_POST['shiftId'];
			//	echo	$gstsection="select * from borno_school_section where borno_school_class_id='$studClass' AND borno_school_branch_id='$gtfbranchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId'";
  ?>
  <tr>
    <td class="text_table">Select  Section *</td>
     
    <td >
      <select name="section" id="section" onchange="callpage();">
       <option value="">--Section--</option>
      
        <?php
					$shiftId=$_REQUEST['shiftId'];
					$gstsection="select * from borno_school_section where borno_school_class_id='$studClass' AND borno_school_branch_id='$gtfbranchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId'";
					$qgstsection=$mysqli->query($gstsection);
					while($shggstsection=$qgstsection->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $shggstsection['borno_school_section_id']; ?>" <?php if($shggstsection['borno_school_section_id']==$_REQUEST['section']) { echo "selected"; }  ?>> <?php echo $shggstsection['borno_school_section_name']; ?></option>
      <?php } ?>
      
      
      </select>
      
      </td>
  </tr>
  <tr>
    <td class="text_table">Session *</td>
    <td><select name="stsess" id="stsess" onchange="callpage();">
    <option value="">--Session--</option>
      <?php
					$data1="select borno_school_session from borno_student_info where borno_school_id='$schId' group by borno_school_session asc";
					$qdata1=$mysqli->query($data1);
					while($showdata1=$qdata1->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $showdata1['borno_school_session']; ?>" <?php if($showdata1['borno_school_session']==$_REQUEST['stsess']) { echo "selected"; }  ?>> <?php echo $showdata1['borno_school_session']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
                        </table>
                   
                 
                   <br>
                   <div style=" height:440px;">
                   <table align="center" border="0" cellpadding="0" cellspacing="0" class="projectlist">
                   <tr>
    <td width="39">Roll </td>
    <td width="101">Student Name</td>
    <td width="84">Group</td>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  
  <?php
  	 
 	$stsess=$_REQUEST['stsess'];
	$section=$_REQUEST['section'];
	if($section!="" and $stsess!=""){
	
$gtstudent="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$gtfbranchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session=$stsess order by borno_school_roll asc";
	
	$qgtstudent=$mysqli->query($gtstudent);
	$sl=0;
	while($shgtstudent=$qgtstudent->fetch_assoc()){ $sl++;
	

	
  
  ?>

  <tr>
    <td align="center"><?php echo $shgtstudent['borno_school_roll']; ?></td>
    <td><?php echo stripslashes($shgtstudent['borno_school_student_name']); ?>
      <input type="hidden" name="studId[]" id="studId[]" value="<?php echo $shgtstudent['borno_student_info_id']; ?>"></td>
    <td colspan="3"><select name="group[]" id="group[]">
      <option value="" <?php if($shgtstudent['borno_school_stud_group']=='') { echo "selected";} ?>> None </option>
      <option value="1" <?php if($shgtstudent['borno_school_stud_group']=='1') { echo "selected";} ?>> Science </option>
      <option value="3" <?php if($shgtstudent['borno_school_stud_group']=='3') { echo "selected";} ?>> Humanities </option>
      <option value="2" <?php if($shgtstudent['borno_school_stud_group']=='2') { echo "selected";} ?>> Business Studies </option>
      <option value="4" <?php if($shgtstudent['borno_school_stud_group']==4) { echo "selected"; } ?>> General </option>
    </select></td>
    </tr>
 
  
  
  <?php
  
	}
	  	}
  
  ?>
                  
   <tr>
    <td align="center">&nbsp;</td>
    <td><input type="submit" name="button" id="button" value="Save"></td>
    <td colspan="3">&nbsp;</td>
  </tr>
                   </table>
                   </div>
  </form>                 
                    </center>
                    </td>
                    </tr>
                    </table>
                      </div>  
               
            </div>
        </div><!-- Main Body part end -->
    </div><!-- Main Content end -->
</div>

<!--Script part-->

</body>
</html>