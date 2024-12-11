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
                <li><a href="../index.php"><i class="fa fa-unlock-alt" aria-hidden="true"></i>Home</a></li>
                <li><a href="student_pannel.php" class="active"><i class="fa fa-user" aria-hidden="true"></i>Add Student</a></li>
                <li><a href="manage_student.php"><i class="fa fa-cog" aria-hidden="true"></i>Manage Student</a></li> 
                <li><a href="student_report.php"><i class="fa fa-cog" aria-hidden="true"></i>Student Report</a></li>                
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
                <a href=""><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

<script language="javascript">
	function contalt_valid()
	{
		
		if(document.frmcontent.branchId.value=="")
		{
			alert("Please Select Branch");
			document.frmcontent.branchId.focus();
			return (false);
		}
		
		if(document.frmcontent.studClass.value=="")
		{
			alert("Please Select Class");
			document.frmcontent.studClass.focus();
			return (false);
		}
		
		if(document.frmcontent.shiftId.value=="")
		{
			alert("Please Select Shift");
			document.frmcontent.shiftId.focus();
			return (false);
		}
		
		if(document.frmcontent.section.value=="")
		{
			alert("Please Select Section");
			document.frmcontent.section.focus();
			return (false);
		}
		
		if(document.frmcontent.stsess.value=="")
		{
			alert("Please Select Session");
			document.frmcontent.stsess.focus();
			return (false);
		}
		
		if(document.frmcontent.stuName.value=="")
		{
			alert("Please Enter Student Name");
			document.frmcontent.stuName.focus();
			return (false);
		}
		
		if(document.frmcontent.stuFname.value=="")
		{
			alert("Please Enter Student Father Name");
			document.frmcontent.stuFname.focus();
			return (false);
		}
		
		if(document.frmcontent.stuaddress.value=="")
		{
			alert("Please Enter Student Address");
			document.frmcontent.stuaddress.focus();
			return (false);
		}
		
		if(document.frmcontent.stuphone.value=="")
		{
			alert("Please Enter Phone for SMS");
			document.frmcontent.stuphone.focus();
			return (false);
		}
		
		if(document.frmcontent.datepicker.value=="")
		{
			alert("Please Enter Date of Birth");
			document.frmcontent.datepicker.focus();
			return (false);
		}
		
		if(document.frmcontent.religion.value=="")
		{
			alert("Please Select Religion");
			document.frmcontent.religion.focus();
			return (false);
		}
		
		if(document.frmcontent.sturoll.value=="")
		{
			alert("Please Enter Student Roll");
			document.frmcontent.sturoll.focus();
			return (false);
		}
	}
	
	
	function callpage()
	{
	 document.frmcontent.action="student_report.php";
	 document.frmcontent.submit();
	}
	
	
	
</script>
        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading"><h2>Student Report</h2></div>
                             
                <div class="form">
                    
          
                        <center>
                   <form name="frmcontent" id="myform" action="student_do.php" method="post" enctype="multipart/form-data">
                    
					
					<?php
        	$msg=$_GET['msg'];
			if($msg==1) { echo "Student Update Successfully"; } 
			else if($msg==2) { echo "Failed"; }  
			else if($msg==3) { echo "Roll Is Already Exist Please Select Another On"; }
		?>
   
                        <table align="center" style="border: 1px solid #005067;">
                        <tr>
    <td class="text_table">Select Branch *</td>
    <td><select name="branchId" id="branchId" onchange="callpage();">
      <option value=""> Select Branch </option>
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
    
    <td>
    <select name="studClass" id="studClass" onChange="callpage();">
                                <option value=""> Select </option>
                                <?php                                       
									    $gtfbranchId=$_POST['branchId'];
										$getClassId="select * from borno_school_set_class where borno_school_id='$schId' AND borno_school_branch_id='$gtfbranchId' AND class_order between 14 AND 15";
		
		
		$qgetClassId=$mysqli->query($getClassId);
		while($shgetClassId=$qgetClassId->fetch_assoc()){
										
										$getfClassId=$shgetClassId['borno_school_class_id']; 
                                        $gstclass="select * from borno_school_class where borno_school_class_id='$getfClassId'";
                                        $qgstclass=$mysqli->query($gstclass);
                                        $shgstclass=$qgstclass->fetch_assoc(); 
                                    
                                    ?>
                                <option value=" <?php echo $shgstclass['borno_school_class_id']; ?>" <?php if($shgstclass['borno_school_class_id']==$_POST['studClass']) { echo "selected"; }  ?>> <?php echo $shgstclass['borno_school_class_name']; ?></option>
                                <?php } ?>
                              </select>
    </td>
  </tr>
  <tr>
    <td class="text_table">Select Shift *</td>
   
    <td><select name="shiftId" id="shiftId" onchange="callpage();">
      <option value=""> Select Shift</option>
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
    <td class="text_table">Select  Section *</td>
     
    <td >
      <select name="section" id="section" onchange="callpage();">
       <option value=""> Select Section</option>
      
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
      <option value=""> Select Session </option>
      <?php			$section=$_REQUEST['section'];
					$data1="select * from 	borno_student_info where borno_school_class_id='$studClass' AND borno_school_branch_id='$gtfbranchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' group by borno_school_session asc";
					$qdata1=$mysqli->query($data1);
					while($showdata1=$qdata1->fetch_assoc()){ $sl++;
				
				?>
      <option value="<?php echo $showdata1['borno_school_session']; ?>" <?php if($showdata1['borno_school_session']==$_REQUEST['stsess']) {  echo "selected";  } ?>> <?php echo $showdata1['borno_school_session']; ?></option>
          
      <?php } ?>
    </select></td>
  </tr>
  <tr>
    <td class="text_table">Department*</td>
    <td><select name="dept" id="dept" onchange="callpage();">
      <option value=""> None </option>
      <option value="1" <?php if($_POST['dept']==1) { echo "selected"; } ?>> Science </option>
      <option value="3" <?php if($_POST['dept']==3) { echo "selected"; } ?>> Humanities </option>
      <option value="2" <?php if($_POST['dept']==2) { echo "selected"; } ?>> Business Studies </option>
    </select></td>
  </tr>
                        </table>
                   
                   </form>
                   </br>
                   <?php
                   $stsess=$_REQUEST['stsess'];
	$section=$_REQUEST['section'];
	?>
                   <table width="323px;"   style="border: 1px solid #005067;  ">
  <tr>
    <td class="text_table" align="right"><a href="download_summary.php?stsess=<?php echo $_POST['stsess']; ?>&schoolId=<?php echo $schId; ?>" target="_blank">Download Summary</a></td>
  </tr>
  <tr>
    <td class="text_table" align="right"><a href="download_student_info.php?branchId=<?php echo $_POST['branchId']; ?>&schoolId=<?php echo $schId; ?>&studClass=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&section=<?php echo $section; ?>&stsess=<?php echo $stsess; ?>" target="_blank">Download All Student</a></td>
  </tr>
    <tr>
    <td class="text_table" align="right"><a href="download_student_info_picture.php?branchId=<?php echo $_POST['branchId']; ?>&schoolId=<?php echo $schId; ?>&studClass=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&section=<?php echo $section; ?>&stsess=<?php echo $stsess; ?>" target="_blank">Download All Student With Photo</a></td>
  </tr>
  <tr>
    <td class="text_table" align="right"><a href="download_student_info_details.php?branchId=<?php echo $_POST['branchId']; ?>&schoolId=<?php echo $schId; ?>&studClass=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&section=<?php echo $section; ?>&stsess=<?php echo $stsess; ?>" target="_blank">Download All Student Details</a></td>
  </tr>
  <tr>
    <td class="text_table" align="right"><a href="download_student_info_id_card.php?branchId=<?php echo $_POST['branchId']; ?>&schoolId=<?php echo $schId; ?>&studClass=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&section=<?php echo $section; ?>&stsess=<?php echo $stsess; ?>" target="_blank">Download Student Info For ID Card</a></td>
  </tr>
</table>
                   <br><br>
                   <table align="center" border="0" cellpadding="0" cellspacing="0" class="projectlist">
                   <tr>
    <td width="40">Roll </td>
    <td width="168">Student Name</td>
    <td width="135">Phone</td>
    <td width="135">Download</td>
     </tr>
  
  <?php
  	
	$studId1=$_GET['studId1'];

	if($studId1!=""){
		
		$deletestud="delete from borno_student_info where borno_student_info_id='$studId1'";
		$mysqli->query($deletestud);
		echo "Delete Success";
		
		}
  
  
 	$stsess=trim($_REQUEST['stsess']);
	$section=$_REQUEST['section'];
	$dept=$_REQUEST['dept'];
	
//	if($stsess!=""){
	
 $gtstudent="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$gtfbranchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_school_stud_group='$dept' order by borno_school_roll asc";
	
	$qgtstudent=$mysqli->query($gtstudent);
	$sl=0;
	while($shgtstudent=$qgtstudent->fetch_assoc()){ $sl++;
	
	
	
  
  ?>
  
 
							 
							 
							
							
  
  <tr>
    <td><?php echo $shgtstudent['borno_school_roll']; ?></td>
    <td><?php echo stripslashes($shgtstudent['borno_school_student_name']); ?></td>
    <td><?php echo $shgtstudent['borno_school_phone']; ?></td>
      <td><a href="download_student_info_individual.php?stdid=<?php echo $shgtstudent['borno_student_info_id']; ?>&branchId=<?php echo $_POST['branchId']; ?>&schoolId=<?php echo $schId; ?>&studClass=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&section=<?php echo $section; ?>&stsess=<?php echo $stsess; ?>" target="_blank">Download</a></td>
    
  </tr>
  
  
  <?php
  
	} 
	    
//	}
  
  ?>
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