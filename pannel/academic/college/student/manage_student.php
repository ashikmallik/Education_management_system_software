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
            <a href=""><img src="../../assets/images/logo.jpg" class="img-fluid"></a>
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
		
		if(document.frmcontent1.branchId.value=="")
		{
			alert("Please Select Branch");
			document.frmcontent1.branchId.focus();
			return (false);
		}
		
		if(document.frmcontent1.studClass.value=="")
		{
			alert("Please Select Class");
			document.frmcontent1.studClass.focus();
			return (false);
		}
		
		if(document.frmcontent1.shiftId.value=="")
		{
			alert("Please Select Shift");
			document.frmcontent1.shiftId.focus();
			return (false);
		}
		
		if(document.frmcontent1.section.value=="")
		{
			alert("Please Select Section");
			document.frmcontent1.section.focus();
			return (false);
		}
		
		if(document.frmcontent1.stsess.value=="")
		{
			alert("Please Select Session");
			document.frmcontent1.stsess.focus();
			return (false);
		}
		
		if(document.frmcontent1.stuName.value=="")
		{
			alert("Please Enter Student Name");
			document.frmcontent1.stuName.focus();
			return (false);
		}
		
		
		
		
		if(document.frmcontent1.stuphone.value=="")
		{
			alert("Please Enter Phone for SMS");
			document.frmcontent1.stuphone.focus();
			return (false);
		}
		
		if(document.frmcontent1.status.value=="")
		{
			alert("Please Select Status");
			document.frmcontent1.status.focus();
			return (false);
		}
		
		if(document.frmcontent1.orgType.value=="")
		{
			alert("Please Select Organization");
			document.frmcontent1.orgType.focus();
			return (false);
		}
		
		if(document.frmcontent1.sturoll.value=="")
		{
			alert("Please Enter Student Roll");
			document.frmcontent1.sturoll.focus();
			return (false);
		}
	}
	
</script>	
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
	 document.frmcontent.action="manage_student.php";
	 document.frmcontent.submit();
	}
</script>	
	
	

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading"><h2>Manage Student</h2></div>
                <div class="form">
               <table style="border: 1px solid #005067; margin-left:50px;">
               
                     <tr >               
					<td align="center" style="color:#090">
					<?php
        	$msg=$_GET['msg'];
			if($msg==1) { echo "Student Update Successfully"; } 
			else if($msg==2) { echo "Failed"; }  
			else if($msg==3) { echo "Roll Is Already Exist Please Select Another On"; }
		?>
        </td>
        </tr> 
               <tr>    
                  <td>
                   <form name="frmcontent1" action="update_student.php" method="post" enctype="multipart/form-data">
                  <table>
                 
                   <?php
        			
			
			$studId=$_GET['studId'];

 $gtstudent="select * from borno_student_info where borno_student_info_id='$studId'";
	
	$qgtstudent=$mysqli->query($gtstudent);
	
		
	$shgtstudent=$qgtstudent->fetch_assoc();
		?>
                        <tr>
                              <td class="text_table">Image</td>
                              <td><img src="studentphoto/<?php echo $shgtstudent['borno_school_photo']; ?>" width="50" height="50"></td>
                            </tr>
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
    <select name="studClass" id="studClass" onchange="callpage();">
      <option value=""> Select Class</option>
      <?php
					$gtfbranchId=$_REQUEST['branchId'];
					$gstclass="select * from borno_school_class order by clorder asc";
					$qgstclass=$mysqli->query($gstclass);
					while($shgstclass=$qgstclass->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $shgstclass['borno_school_class_id']; ?>" <?php if($shgstclass['borno_school_class_id']==$_REQUEST['studClass']) { echo "selected"; }  ?>> <?php echo $shgstclass['borno_school_class_name']; ?></option>
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
  <?php
 // $shiftId=$_POST['shiftId'];
			//	echo	$gstsection="select * from borno_school_section where borno_school_class_id='$studClass' AND borno_school_branch_id='$gtfbranchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId'";
  ?>
  <tr>
    <td class="text_table">Select  Section *</td>
     
    <td >
      <select name="section" id="section">
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
      <option value=""> --Select one-- </option>
        <option value="2021-22" <?php if($_REQUEST['stsess']=='2021-22') { echo "selected"; } ?>> 2021-22 </option>
        <option value="2022-23" <?php if($_REQUEST['stsess']=='2022-23') { echo "selected"; } ?>> 2022-23 </option>
        <option value="2024-25" <?php if($_REQUEST['stsess']=='2024-25') { echo "selected"; } ?>> 2024-25 </option>
      </select></td>

  </tr>
  <tr>
    <td class="text_table">Department*</td>
    <td><select name="dept" id="dept" onchange="callpage();">
      <option value=""> None </option>
      <option value="1" <?php if($_REQUEST['dept']==1) { echo "selected"; } ?>> Science </option>
      <option value="3" <?php if($_REQUEST['dept']==3) { echo "selected"; } ?>> Humanities </option>
      <option value="2" <?php if($_REQUEST['dept']==2) { echo "selected"; } ?>> Business Studies </option>
    </select></td>
  </tr>
  <tr>
                            <tr>
                                <td class="text_table">Student Name *</td>
                                <td><input type="text" name="stuName" id="stuName" value="<?php echo stripslashes($shgtstudent['borno_school_student_name']); ?>"></td>
                            </tr>
                             <tr>
                                <td class="text_table">Father's Name</td>
                                <td><input type="text" name="stuFname" id="stuFname"  value="<?php echo $shgtstudent['borno_school_father_name']; ?>"></td>
                            </tr>
                             <tr>
                                <td class="text_table">Mother's Name</td>
                                <td><input type="text" name="stuMname" id="stuMname" value="<?php echo $shgtstudent['borno_school_mother_name']; ?>"></td>
                            </tr>
                             <tr>
                                <td class="text_table">Address</td>
                                <td><input type="text" name="stuaddress" id="stuaddress" value="<?php echo stripslashes($shgtstudent['borno_school_address']); ?>"></td>
                            </tr>
                             <tr>
                                <td class="text_table">Phone * (For SMS)</td>
                                <td><input type="text" name="stuphone" id="stuphone" value="<?php echo substr($shgtstudent['borno_school_phone'],2,11); ?>"></td>
                            </tr>
                             <tr>
    <td class="text_table">Blood Group</td>
   
    <td>
      <select name="blgroup" id="blgroup">
        	<option value="">Select Blood Group</option>
          <option value="O +"<?php if($shgtstudent['borno_school_blood_group']=='O +') { echo "selected"; } ?>> O + </option>
      <option value="O -" <?php if($shgtstudent['borno_school_blood_group']=='O -') { echo "selected"; } ?>> O - </option>
      <option value="A +" <?php if($shgtstudent['borno_school_blood_group']=='A +') { echo "selected"; } ?>> A + </option>
      <option value="A -" <?php if($shgtstudent['borno_school_blood_group']=='A -') { echo "selected"; } ?>> A - </option>
      <option value="B +" <?php if($shgtstudent['borno_school_blood_group']=='B +') { echo "selected"; } ?>> B + </option>
      <option value="B -" <?php if($shgtstudent['borno_school_blood_group']=='B -') { echo "selected"; } ?>> B - </option>
      <option value="AB +" <?php if($shgtstudent['borno_school_blood_group']=='AB +') { echo "selected"; } ?>> AB + </option>
      <option value="AB -" <?php if($shgtstudent['borno_school_blood_group']=='AB -') { echo "selected"; } ?>> AB - </option>
      </select>
    </td>
  </tr>
  <tr>
    <td class="text_table">Date of birth</td>
 
    <td>
    	<input type="text" id="datepicker" name="datepicker" value="<?php echo $shgtstudent['borno_school_dob']; ?>"/>
    </td>
  </tr>
  <tr>
    <td class="text_table">Religion</td>
    <td>  <select name="religion" id="religion">
        <option value=""> Select Religion</option>
        <option value="Islam" <?php if($shgtstudent['borno_school_religion']=='Islam') { echo "selected";} ?> > Islam </option>
        <option value="Hindu" <?php if($shgtstudent['borno_school_religion']=='Hindu') { echo "selected";} ?>> Hindu </option>
        <option value="Christian" <?php if($shgtstudent['borno_school_religion']=='Christian') { echo "selected";} ?>> Christian </option>
        <option value="Buddhist" <?php if($shgtstudent['borno_school_religion']=='Buddhist') { echo "selected";} ?>> Buddhist </option>
        <option value="Other" <?php if($shgtstudent['borno_school_religion']=='Other') { echo "selected";} ?>> Other </option>
      </select></td>
  </tr>
  <tr>
    <td class="text_table">Status* </td>
    <td><select name="status" id="status">
      <option value="Regular" <?php if($shgtstudent['borno_school_status']=='Regular') { echo "selected";} ?>> Regular </option>
      <option value="E regular" <?php if($shgtstudent['borno_school_status']=='E regular') { echo "selected";} ?>> E regular </option>
      <option value="Pass" <?php if($shgtstudent['borno_school_status']=='Pass') { echo "selected";} ?>> Pass </option>
      <option value="TC" <?php if($shgtstudent['borno_school_status']=='TC') { echo "selected";} ?>> TC </option>
    </select></td>
  </tr>
  <tr>
    <td class="text_table">Organization Type* </td>
     <td><select name="orgType" id="orgType">
     <!-- <option value="">Select</option>
      <option value="College">College</option>-->
       <option value="School" <?php if($shgtstudent['borno_school_org']=='School') { echo "selected";} ?>>School</option>
       <option value="College" <?php if($shgtstudent['borno_school_org']=='College') { echo "selected";} ?>>College</option>
      
      </select></td>
  </tr>
  
 
 
                            <tr>
                                <td class="text_table">Roll No*</td>
                                <td><input type="text" name="sturoll" id="sturoll" value="<?php echo $shgtstudent['borno_school_roll']; ?>"></td>
                            </tr>
                            <tr>
                              <td class="text_table">Image</td>
                               <td><label for="timg"></label>
	                <input type="file" name="timg" id="timg"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><center><input type="submit" name="" value="Update" onClick="return contalt_valid()">
                                <input type="hidden" name="studentId" id="studentId" value="<?php echo $shgtstudent['borno_student_info_id']; ?>">
                                </center></td>
                            </tr>
                        </table>
                  </form>
                  </td>
                  <td valign="top">
                        <center>
                   <form name="frmcontent" id="myform" action="student_do.php" method="post" enctype="multipart/form-data">

   
                        <table align="center" style="border: 1px solid #F90;">
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
    
    <td><select name="studClass" id="studClass" onchange="callpage();">
      <option value=""> Select Class</option>
      <?php
					$gtfbranchId=$_REQUEST['branchId'];
					$getClassId="select * from borno_school_set_class where borno_school_id='$schId' AND borno_school_branch_id='$gtfbranchId' AND class_order between 14 AND 15";
		
		
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
  <?php
 // $shiftId=$_POST['shiftId'];
			//	echo	$gstsection="select * from borno_school_section where borno_school_class_id='$studClass' AND borno_school_branch_id='$gtfbranchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId'";
  ?>
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
      <option value=""> --Select one-- </option>
        <option value="2021-22" <?php if($_REQUEST['stsess']=='2021-22') { echo "selected"; } ?>> 2021-22 </option>
        <option value="2022-23" <?php if($_REQUEST['stsess']=='2022-23') { echo "selected"; } ?>> 2022-23 </option>
        <option value="2024-25" <?php if($_REQUEST['stsess']=='2024-25') { echo "selected"; } ?>> 2024-25 </option>
      </select></td>

  </tr>
  <tr>
    <td class="text_table">Department*</td>
    <td><select name="dept" id="dept" onchange="callpage();">
      <option value=""> None </option>
      <option value="1" <?php if($_REQUEST['dept']==1) { echo "selected"; } ?>> Science </option>
      <option value="3" <?php if($_REQUEST['dept']==3) { echo "selected"; } ?>> Humanities </option>
      <option value="2" <?php if($_REQUEST['dept']==2) { echo "selected"; } ?>> Business Studies </option>
    </select></td>
  </tr>
                        </table>
                   
                   </form>
                   <br>
                   <div style=" height:440px; overflow:scroll">
                   <table align="center" border="0" cellpadding="0" cellspacing="0" class="projectlist">
                   <tr>
    <td width="39">Roll </td>
    <td width="101">Student Name</td>
    <td width="84">Phone</td>
    <td colspan="2" align="center">Action</td>
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
	if($section!=""){
	
 $gtstudent="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$gtfbranchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_school_stud_group='$dept' order by borno_school_roll asc";
	
	$qgtstudent=$mysqli->query($gtstudent);
	$sl=0;
	while($shgtstudent=$qgtstudent->fetch_assoc()){ $sl++;
	


  
  ?>
  
 
							 
							 
							
							
  
  <tr>
    <td align="center"><?php echo $shgtstudent['borno_school_roll']; ?></td>
    <td><?php echo stripslashes($shgtstudent['borno_school_student_name']); ?></td>
    <td><?php echo substr($shgtstudent['borno_school_phone'],2,11); ?></td>
    <td width="29" align="center"><a href="manage_student.php?studId=<?php echo $shgtstudent['borno_student_info_id']; ?>&schsId=<?php echo $shgtstudent['borno_school_id']; ?>&branchId=<?php echo $shgtstudent['borno_school_branch_id']; ?>&studClass=<?php echo $shgtstudent['borno_school_class_id']; ?>&shiftId=<?php echo $shgtstudent['borno_school_shift_id']; ?>&section=<?php echo $shgtstudent['borno_school_section_id']; ?>&stsess=<?php echo $shgtstudent['borno_school_session']; ?>&dept=<?php echo $shgtstudent['borno_school_stud_group']; ?>"><img src="../../images/b_edit.png" width="16" height="16"></a></td>
    <td width="34" align="center"><a href="manage_student.php?studId1=<?php echo $shgtstudent['borno_student_info_id']; ?>" onclick="return confirm('Seure to Delete')"><img src="../../images/b_drop.png" width="16" height="16"></a></td>
  </tr>
  
  
  <?php
  
	}
	  	}
  
  ?>
                   </table>
                   </div>
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