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
                        <table>
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
  <option value="Incharge (Morning)"<?php if($shgtstudent['borno_teachers_designation']=='Incharge (Morning)') { echo "selected"; } ?>> Incharge (Morning) </option>
 <option value="Incharge (Day)"<?php if($shgtstudent['borno_teachers_designation']=='Incharge (Day)') { echo "selected"; } ?>> Incharge (Day) </option>
   <option value="Co-Incharge (Morning)"<?php if($shgtstudent['borno_teachers_designation']=='Co-Incharge (Morning)') { echo "selected"; } ?>> Co-Incharge (Morning) </option>
 <option value="Co-Incharge (Day)"<?php if($shgtstudent['borno_teachers_designation']=='Co-Incharge (Day)') { echo "selected"; } ?>> Co-Incharge (Day) </option>
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
                    $branchId=$shgtstudent['borno_school_branch_id'];
					$data1="select * from borno_school_branch where borno_school_branch_id='$branchId'";
					$qdata1=$mysqli->query($data1);
					$showdata1=$qdata1->fetch_assoc();
				
				?>                                
      <option value=" <?php echo $showdata1['borno_school_branch_id']; ?>" <?php if($showdata1['borno_school_branch_id']==$_REQUEST['branchId']) { echo "selected"; }  ?>> <?php echo $showdata1['borno_school_branch_name']; ?></option>
    <option value="0" <?php if($shgtstudent['borno_school_branch_id']=='0') { echo "selected";} ?> > All </option>
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
                                <td class="text_table">Shift</td>
                                <td><select name="shiftId" id="shiftId">
  <?php
                    $shift=$shgtstudent['borno_school_shift_id'];
					$gstshift1="select * from borno_school_shift where borno_school_shift_id='$shift'";
					$qggstshift1=$mysqli->query($gstshift1);
					$shggstshift1=$qggstshift1->fetch_assoc();
				?>                                
     <option value=" <?php echo $shggstshift1['borno_school_shift_id']; ?>" <?php if($shggstshift1['borno_school_shift_id']==$_REQUEST['shiftId']) { echo "selected"; }  ?>> <?php echo $shggstshift1['borno_school_shift_name']; ?></option>
     <?php
					
					$gstshift="select * from borno_school_shift order by borno_school_shift_id asc";
					$qggstshift=$mysqli->query($gstshift);
					while($shggstshift=$qggstshift->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $shggstshift['borno_school_shift_id']; ?>" <?php if($shggstshift['borno_school_shift_id']==$_REQUEST['shiftId']) { echo "selected"; }  ?>> <?php echo $shggstshift['borno_school_shift_name']; ?></option>
      <?php } ?>
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
                                <td><input type="text" name="phone" id="phone" value="<?php echo stripslashes(substr($shgtstudent['borno_teacher_phone'],2,11)); ?>"></td>
                                <td class="text_table">Images</td>
                                <td><input type="file" name="timg" id="timg"></td>
                          </tr>
               <tr>
                                <td class="text_table">Building</td>
                                <td><select name="building" id="building">
                                   <option value="1" <?php if($shgtstudent['borno_school_building_id']=='1') { echo "selected";} ?>>1</option>
       <option value="2" <?php if($shgtstudent['borno_school_building_id']=='2') { echo "selected";} ?>>2</option>
       <option value="3" <?php if($shgtstudent['borno_school_building_id']=='3') { echo "selected";} ?>>3</option>
                                     
                                    </select></td>
                                <td class="text_table"></td>
                                <td></td>
                          </tr>                          
              <tr>
                                <td colspan="4"><center><input type="submit" name="" value="Update"></center>
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