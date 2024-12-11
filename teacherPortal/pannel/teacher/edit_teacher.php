<?php require_once('teacher_top.php');?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Teacher Panel</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <!-- Meta tag -->
    
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
    
    
    <script language="javascript">
	function contalt_valid()
	{
		
		if(document.frmcontent.designation.value=="")
		{
			alert("Please Select Designation");
			document.frmcontent.designation.focus();
			return (false);
		}
		
		if(document.frmcontent.branchId.value=="")
		{
			alert("Please Select Branch");
			document.frmcontent.branchId.focus();
			return (false);
		}
		
		if(document.frmcontent.shiftId.value=="")
		{
			alert("Please Select Shift");
			document.frmcontent.shiftId.focus();
			return (false);
		}
		
		if(document.frmcontent.teacher.value=="")
		{
			alert("Please Write Teacher Name");
			document.frmcontent.teacher.focus();
			return (false);
		}
		
// 		if(document.frmcontent.serial.value=="")
// 		{
// 			alert("Please Write Serial");
// 			document.frmcontent.serial.focus();
// 			return (false);
// 		}
		
		if(document.frmcontent.orgType.value=="")
		{
			alert("Please Select Organization Type");
			document.frmcontent.orgType.focus();
			return (false);
		}
		
		if(document.frmcontent.phone.value=="")
		{
			alert("Please Write Mobile Number");
			document.frmcontent.phone.focus();
			return (false);
		}
		
		
	}
	function callpage()
{
	 document.frmcontent.action="set_class_teacher.php";
	 document.frmcontent.submit();
}
	
	
</script>
    

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
                <div class="default_heading"><h2>Manage Teacher</h2></div>
                <div class="form">
                    <center>
                    <form name="frmcontent" action="update_teacher.php" method="post" enctype="multipart/form-data">
                      <p>
                         <?php
        			
			
			$techId=$_GET['techId'];

 $gtstudent="select * from borno_teacher_info where borno_teacher_info_id='$techId'";
	
	$qgtstudent=$mysqli->query($gtstudent);
	
		
	$shgtstudent=$qgtstudent->fetch_assoc();
		?>
                      </p>
                      <p>&nbsp; </p>
                        <table style="border: 1px solid #005067;">
                         <tr>
                              <td class="text_table">Image</td>
                              <td><img src="teacherphoto/<?php echo $shgtstudent['borno_teacher_photo']; ?>" width="50" height="50"</td>
                            </tr>
                            <tr>
                              <td class="text_table">Select Designation</td>
                              <td>
<select name="designation" id="designation">
<option value=""> Select </option>
<option value="Headmaster"<?php if($shgtstudent['borno_teachers_designation']=='Headmaster') { echo "selected"; } ?>> Headmaster </option>
 <option value="Assistant Headmaster (Morning)"<?php if($shgtstudent['borno_teachers_designation']=='Assistant Headmaster (Morning)') { echo "selected"; } ?>> Assistant Headmaster (Morning) </option>
 <option value="Assistant Headmaster (Day)"<?php if($shgtstudent['borno_teachers_designation']=='Assistant Headmaster (Day)') { echo "selected"; } ?>> Assistant Headmaster (Day) </option>
 <option value="Assistant Teacher (Morning)"<?php if($shgtstudent['borno_teachers_designation']=='Assistant Teacher (Morning)') { echo "selected"; } ?>> Assistant Teacher (Morning) </option>
 <option value="Assistant Teacher (Day)"<?php if($shgtstudent['borno_teachers_designation']=='Assistant Teacher (Day)') { echo "selected"; } ?>> Assistant Teacher (Day) </option>
<option value="Principal"<?php if($shgtstudent['borno_teachers_designation']=='Principal') { echo "selected"; } ?>> Principal </option>
<option value="Vice Principal"<?php if($shgtstudent['borno_teachers_designation']=='Vice Principal') { echo "selected"; } ?>> Vice Principal </option>
<option value="Professor"<?php if($shgtstudent['borno_teachers_designation']=='Professor') { echo "selected"; } ?>> Professor </option>
<option value="Lecturer"<?php if($shgtstudent['borno_teachers_designation']=='Lecturer') { echo "selected"; } ?>> Lecturer </option>

                        </select> 
                        </td>
                    <td class="text_table">Branch</td>
                                <td><select name="branchId" id="branchId" onchange="callpage();">
     <?php
     
                        if($_REQUEST['branchId'] == ""){
                            $_REQUEST['branchId'] = $shgtstudent['borno_school_branch_id'];
                        }     
					$data="select * from borno_school_branch where borno_school_id='$schId'";
					$qdata=$mysqli->query($data);
					while($showdata=$qdata->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $showdata['borno_school_branch_id']; ?>" <?php if($showdata['borno_school_branch_id']==$_REQUEST['branchId']) { echo "selected"; }  ?>> <?php echo $showdata['borno_school_branch_name']; ?></option>
      <?php } ?>
      
      </select></td>
                            </tr>
                            <tr>
                                <td class="text_table">Shift</td>
                                <td><select name="shiftId" id="shiftId" onchange="callpage();">
        <option value="2" <?php if($shgtstudent['borno_school_shift_id']=='2') { echo "selected";} ?> > Morning </option>
        <option value="3" <?php if($shgtstudent['borno_school_shift_id']=='3') { echo "selected";} ?>> Day </option>
    </select></td>
                        <td class="text_table">Teacher Name</td>
                                <td><input type="text" name="teacher" id="teacher" value="<?php echo stripslashes($shgtstudent['borno_teacher_name']); ?>"></td>
                            </tr>
                             
                            <tr>
                                <td class="text_table">Father's Name</td>
                                <td><input type="text" name="father" id="father" value="<?php echo stripslashes($shgtstudent['borno_teachers_father_name']); ?>"></td>
                                 <td class="text_table">Mother's Name</td>
                                <td><input type="text" name="mother" id="mother" value="<?php echo stripslashes($shgtstudent['borno_teachers_mother_name']); ?>"></td>
                            </tr>
                            <tr>
                                <td class="text_table">Spouse Name</td>
                                <td><input type="text" name="spouse" id="spouse" value="<?php echo stripslashes($shgtstudent['borno_teachers_spouse_name']); ?>"></td>
                                 <td class="text_table">Teacher's ID</td>
                                <td><input type="text" name="teacherid" id="teacherid" value="<?php echo stripslashes($shgtstudent['borno_teachers_id']); ?>"></td>
                            </tr>
                           
                            <tr>
                                <td class="text_table">Gadget Serial No</td>
                                <td><input type="text" name="gadget" id="gadget" value="<?php echo stripslashes($shgtstudent['borno_teachers_gadget_no']); ?>"></td>
                                <?php
        
		date_default_timezone_set('Asia/Dhaka');	
		
		$cdate=date('Y-m-d');
		
		?>
                                <td class="text_table">Date of Birth</td>
                                <td><input type="text" name="dob" id="dob" value="<?php echo stripslashes($shgtstudent['borno_teachers_dob']); ?>"></td>
                            </tr>
                           <tr>
                                <td class="text_table">Religion</td>
                                <td><select name="religion" id="religion">
                                 <option value=""> Select </option>
        <option value="Islam" <?php if($shgtstudent['borno_teachers_religion']=='Islam') { echo "selected";} ?> > Islam </option>
        <option value="Hindu" <?php if($shgtstudent['borno_teachers_religion']=='Hindu') { echo "selected";} ?>> Hindu </option>
        <option value="Christian" <?php if($shgtstudent['borno_teachers_religion']=='Christian') { echo "selected";} ?>> Christian </option>
        <option value="Buddhist" <?php if($shgtstudent['borno_teachers_religion']=='Buddhist') { echo "selected";} ?>> Buddhist </option>
        <option value="Other" <?php if($shgtstudent['borno_teachers_religion']=='Other') { echo "selected";} ?>> Other </option>
                                 
                                  </select>
                                </td>
                                 <td class="text_table">Gender</td>
                                <td><select name="gender" id="gender">
                                <option value=""> Select </option>
                                <option value="Male"<?php if($shgtstudent['borno_teachers_gender']=='Male') { echo "selected"; } ?>> Male </option>
                                <option value="Female"<?php if($shgtstudent['borno_teachers_gender']=='Female') { echo "selected"; } ?>> Female </option>
                               
                                 </select>
                                </td>
                          </tr>
                             <tr>
                              <td class="text_table">Marital Status</td>
                              <td><select name="meritalStatus" id="meritalStatus">
                              <option value=""> Select </option>
                              <option value="Married"<?php if($shgtstudent['borno_teachers_marital_status']=='Married') { echo "selected"; } ?>> Married </option>
                              <option value="Unmarried"<?php if($shgtstudent['borno_teachers_marital_status']=='Unmarried') { echo "selected"; } ?>> Unmarried </option>

                              </select>
                              </td>
                            <td class="text_table">Blood Group</td>
                                <td> <select name="blgroup" id="blgroup">
                                    <option value="">Select </option>
          <option value="O +"<?php if($shgtstudent['borno_teachers_blood_group']=='O +') { echo "selected"; } ?>> O + </option>
      <option value="O -" <?php if($shgtstudent['borno_teachers_blood_group']=='O -') { echo "selected"; } ?>> O - </option>
      <option value="A +" <?php if($shgtstudent['borno_teachers_blood_group']=='A +') { echo "selected"; } ?>> A + </option>
      <option value="A -" <?php if($shgtstudent['borno_teachers_blood_group']=='A -') { echo "selected"; } ?>> A - </option>
      <option value="B +" <?php if($shgtstudent['borno_teachers_blood_group']=='B +') { echo "selected"; } ?>> B + </option>
      <option value="B -" <?php if($shgtstudent['borno_teachers_blood_group']=='B -') { echo "selected"; } ?>> B - </option>
      <option value="AB +" <?php if($shgtstudent['borno_teachers_blood_group']=='AB +') { echo "selected"; } ?>> AB + </option>
      <option value="AB -" <?php if($shgtstudent['borno_teachers_blood_group']=='AB -') { echo "selected"; } ?>> AB - </option>
      								</select></td>
                            </tr>
                            <tr>
                                <td class="text_table">Qualification</td>
                              <td><input type="text" name="qualification" id="qualification" value="<?php echo stripslashes($shgtstudent['borno_teachers_qualification']); ?>"></td>
   								<td class="text_table">Subject</td>
                                <td><input type="text" name="subject" id="subject" value="<?php echo stripslashes($shgtstudent['borno_teachers_subject']); ?>"></td>
                            </tr>
                            <tr>
                                <td class="text_table">National ID</td>
                                <td><input type="text" name="nationId" id="nationId" value="<?php echo stripslashes($shgtstudent['borno_teachers_national_id']); ?>"></td>
                                 <td class="text_table">Passport No</td>
                                <td><input type="text" name="passport" id="passport" value="<?php echo stripslashes($shgtstudent['borno_teachers_passport_no']); ?>"></td>
                            </tr>
                            <tr>
                                <td class="text_table">E-mail ID</td>
                                <td><input type="text" name="emailId" id="emailId" value="<?php echo stripslashes($shgtstudent['borno_teachers_email_id']); ?>"></td>
                                <td class="text_table">TIN</td>
                                <td><input type="text" name="tin" id="tin" value="<?php echo stripslashes($shgtstudent['borno_teachers_tin']); ?>"></td>
                            </tr>
                             <tr>
                      <td class="text_table">First Joining Date</td>
                      <td><input type="text" name="fjdate" id="fjdate" value="<?php echo stripslashes($shgtstudent['borno_teachers_first_join']); ?>"></td>
                      <td class="text_table">Joining Date In This School</td>
                      <td><input type="text" name="jdits" id="jdits" value="<?php echo stripslashes($shgtstudent['borno_teachers_join_in_school']); ?>"></td>
                            </tr>
                            <tr>
                                <td class="text_table">Mailing Address (Present)</td>
                                <td><input type="text" name="presAdd" id="presAdd" value="<?php echo stripslashes($shgtstudent['borno_teachers_mailing_address']); ?>"></td>
                                <td class="text_table">Permanent Address</td>
                                <td><input type="text" name="perAdd" id="perAdd" value="<?php echo stripslashes($shgtstudent['borno_teacher_permanent_address']); ?>"></td>
                            </tr>
                          <tr>
                                <td class="text_table">Serial No</td>
                        <td><input type="text" name="serial" id="serial" value="<?php echo stripslashes($shgtstudent['borno_teachers_serial_no']); ?>"></td>
                                <td class="text_table">Organization Type</td>
                                <td><select name="orgType" id="orgType">
                                   <option value="" <?php if($shgtstudent['borno_teacher_org_type']=='') { echo "selected";} ?>></option>
                                      <option value="School" <?php if($shgtstudent['borno_teacher_org_type']=='School') { echo "selected";} ?>>School</option>
       <option value="College" <?php if($shgtstudent['borno_teacher_org_type']=='College') { echo "selected";} ?>>College</option>
       <option value="Others" <?php if($shgtstudent['borno_teacher_org_type']=='Others') { echo "selected";} ?>>Others</option>
                                     
                                    </select></td>
                            </tr>
                             
              <tr>
                                <td class="text_table">Phone</td>
                                <td><input type="text" name="phone" id="phone" value="<?php echo $shgtstudent['borno_teacher_phone']; ?>"></td>
                                <td class="text_table">Images</td>
                                <td><input type="file" name="timg" id="timg"></td>
                          </tr>
                           
                          <tr>
                                <td class="text_table">Attandance ID</td>
                                <td><input type="text" name="attandance" id="attandance" value="<?php echo $shgtstudent['teacher_attandance_id']; ?>"></td>
                                <td class="text_table">In Time</td>
                                <td><input type="text" name="intime" id="intime" value="<?php echo $shgtstudent['teacher_in_time']; ?>" placeholder="07:00"></td>                                
                          </tr>
              <tr>
                                <td colspan="4"><center><input type="submit" name="" value="Update" onClick="return contalt_valid()"></center>
                                <input type="hidden" name="techId" id="techId" value="<?php echo $shgtstudent['borno_teacher_info_id']; ?>">
                                
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