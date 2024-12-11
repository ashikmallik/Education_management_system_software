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
        <div class="top_part_menu">
           <?php require_once('lefymenu.php');?>
        </div>
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
		
		if(document.frmcontent.serial.value=="")
		{
			alert("Please Write Serial");
			document.frmcontent.serial.focus();
			return (false);
		}
		
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
	
	
	
</script>
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
                <div class="default_heading"><h2>Add Teacher</h2></div>
                <div class="form">
                    <center>
                    <form name="frmcontent" action="add_teacher_do.php" method="post" enctype="multipart/form-data">
                     <?php
                	$msg=$_GET['msg'];
					if($msg==1){ echo "Add Teacher Successfull"; }
					else if($msg==2){ echo "Failed"; }
					else if($msg==3){ echo "This Teacher is Already Added"; }
					
					
				?>
                        <table style="border: 1px solid #005067;">
                            <tr>
                              <td class="text_table">Select Designation</td>
                              <td>
         <select name="designation" id="designation">
         <option value=""> Select </option>
         <option value="Headmaster"> Headmaster </option>
         <option value="Assistant Headmaster (Morning)"> Assistant Headmaster (Morning) </option>
         <option value="Assistant Headmaster (Day)"> Assistant Headmaster (Day) </option>
         <option value="Assistant Teacher (Morning)"> Assistant Teacher (Morning) </option>
         <option value="Assistant Teacher (Day)"> Assistant Teacher (Day) </option>
         <option value="Principal"> Principal </option>
         <option value="Vice Principal"> Vice Principal </option>
         <option value="Professor"> Professor </option>
         <option value="Lecturer"> Lecturer </option>
                        </select> 
                        </td>
                        <td class="text_table">Branch</td>
                                <td><select name="branchId" id="branchId" onchange="callpage();">
      <option value=""> Select </option>
      <option value="0"> All </option>
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
                                <td class="text_table">Shift</td>
                                <td><select name="shiftId" id="shiftId">
      <option value=""> Select </option>
      <?php
					$branchId=$_POST['branchId'];
					$gstshift="select * from borno_school_shift";
					$qggstshift=$mysqli->query($gstshift);
					while($shggstshift=$qggstshift->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $shggstshift['borno_school_shift_id']; ?>" <?php if($shggstshift['borno_school_shift_id']==$_POST['shiftId']) { echo "selected"; }  ?>> <?php echo $shggstshift['borno_school_shift_name']; ?></option>
      <?php } ?>
    </select></td>
                        <td class="text_table">Teacher Name</td>
                                <td><input type="text" name="teacher" id="teacher"></td>
                            </tr>
                             
                            <tr>
                                <td class="text_table">Father's Name</td>
                                <td><input type="text" name="father" id="father"></td>
                                 <td class="text_table">Mother's Name</td>
                                <td><input type="text" name="mother" id="mother"></td>
                            </tr>
                            <tr>
                                <td class="text_table">Spouse Name</td>
                                <td><input type="text" name="spouse" id="spouse"></td>
                                 <td class="text_table">Teacher's ID</td>
                                <td><input type="text" name="teacherid" id="teacherid"></td>
                            </tr>
                           
                            <tr>
                                <td class="text_table">Gadget Serial No</td>
                                <td><input type="text" name="gadget" id="gadget"></td>
                                <?php
        
		date_default_timezone_set('Asia/Dhaka');	
		
		$cdate=date('Y-m-d');
	    $smstime=date('H:i:s');			
        $smstime=substr($smstime,0,5);	
		?>
                                <td class="text_table">Date of Birth</td>
                                <td><input type="text" name="dob" id="dob" value="<?php echo $cdate; ?>"></td>
                            </tr>
                           <tr>
                                <td class="text_table">Religion</td>
                                <td><select name="religion" id="religion">
                                 <option value=""> Select </option>
                                 <option value="Islam"> Islam </option>
                                 <option value="Hindu"> Hindu </option>
                                 <option value="Christian"> Christian </option>
                                 <option value="Buddhist"> Buddhist </option>
                                 <option value="Other"> Other </option>
                                  </select>
                                </td>
                                 <td class="text_table">Gender</td>
                                <td><select name="gender" id="gender">
                                <option value=""> Select </option>
                                <option value="Male"> Male </option>
                                 <option value="Female"> Female </option>
                                 </select>
                                </td>
                            </tr>
                             <tr>
                              <td class="text_table">Marital Status</td>
                              <td><select name="meritalStatus" id="meritalStatus">
                              <option value=""> Select </option>
                              <option value="Married"> Married </option>
                              <option value="Unmarried"> Unmarried </option>
                              </select>
                              </td>
                            <td class="text_table">Blood Group</td>
                                <td> <select name="blgroup" id="blgroup">
                                    <option value="">Select </option>
                                    <option value="O +"> O + </option>
                                    <option value="O -"> O - </option>
                                    <option value="A +"> A + </option>
                                    <option value="A -"> A - </option>
                                    <option value="B +"> B + </option>
                                    <option value="B -"> B - </option>
                                    <option value="AB +"> AB + </option>
                                    <option value="AB -"> AB - </option>
      								</select></td>
                            </tr>
                            <tr>
                                <td class="text_table">Qualification</td>
                              <td><input type="text" name="qualification" id="qualification"></td>
   								<td class="text_table">Subject</td>
                                <td><input type="text" name="subject" id="subject"></td>
                            </tr>
                            <tr>
                                <td class="text_table">National ID</td>
                                <td><input type="text" name="nationId" id="nationId"></td>
                                 <td class="text_table">Passport No</td>
                                <td><input type="text" name="passport" id="passport"></td>
                            </tr>
                            <tr>
                                <td class="text_table">E-mail ID</td>
                                <td><input type="text" name="emailId" id="emailId"></td>
                                <td class="text_table">TIN</td>
                                <td><input type="text" name="tin" id="tin"></td>
                            </tr>
                             <tr>
                      <td class="text_table">First Joining Date</td>
                      <td><input type="text" name="fjdate" id="fjdate" value="<?php echo $cdate; ?>"></td>
                      <td class="text_table">Joining Date In This School</td>
                      <td><input type="text" name="jdits" id="jdits" value="<?php echo $cdate; ?>"></td>
                            </tr>
                            <tr>
                                <td class="text_table">Mailing Address (Present)</td>
                                <td><input type="text" name="presAdd" id="presAdd"></td>
                                <td class="text_table">Permanent Address</td>
                                <td><input type="text" name="perAdd" id="perAdd"></td>
                            </tr>
                            <tr>
                                <td class="text_table">Serial No</td>
                                <td><input type="text" name="serial" id="serial"></td>
                                <td class="text_table">Organization Type</td>
                                <td><select name="orgType" id="orgType">
                                                                            <option value="School">School</option>
                                      <option value="College">College</option>
                                      <option value="Others">Others</option>
                                    </select></td>
                            </tr>
                             
                            <tr>
                                <td class="text_table">Phone</td>
                                <td><input type="text" name="phone" id="phone"></td>
                                <td class="text_table">Images</td>
                                <td><input type="file" name="timg" id="timg"></td>
                            </tr>
                           <tr>
                                <td class="text_table">Attandance ID</td>
                                <td><input type="text" name="attandance" id="attandance"></td>
                                <td class="text_table">In Time</td>
                                <td><input type="text" name="intime" id="intime" value="<?php echo $smstime; ?>"></td>                                
                            </tr>                            
                           
                            <tr>
                                <td colspan="4"><center><input type="submit" name="" value="Save" onClick="return contalt_valid()"></center></td>
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