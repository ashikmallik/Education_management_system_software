<?php require_once('student_top.php');?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Student Pannel</title>
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
	 document.frmcontent1.action="edit_student.php";
	 document.frmcontent1.submit();
	}
</script>	
	
	

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading"><h2>Edit Student</h2></div>
                <div class="form">
                    <center>
               <table >
               
                     <tr >               
					<td align="center" style="color:#090">
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
                   <form name="frmcontent1" action="update_student.php" method="post" enctype="multipart/form-data">
                  <table style="border: 1px solid #005067; margin-left:50px;">
                 
                   <?php
        			
			if($_REQUEST['studentId'] == ""){
			    $studId=$_GET['studId']; 
			}
			else{
			    $studId=$_REQUEST['studentId'];
			}
			

 $gtstudent="select * from borno_student_info where borno_student_info_id='$studId'";
	
	$qgtstudent=$mysqli->query($gtstudent);
		
	$shgtstudent=$qgtstudent->fetch_assoc();
	
	
	
		?>
                        <tr>
                              <td class="text_table">Image</td>
                              <td><img src="studentphoto/<?php echo $shgtstudent['borno_school_photo']; ?>" width="50" height="50"></td>
                            </tr>
     <tr>
    <td class="text_table">Session *</td>
    <td><select name="stsess" id="stsess">
    <option value="">--Session--</option>
      <?php
                    if($_REQUEST['stsess'] == ""){
                    $_REQUEST['stsess']=$shgtstudent['borno_school_session'];
                    }
					$data1="select borno_school_session from borno_student_info where borno_school_id='$schId' group by borno_school_session desc";
					$qdata1=$mysqli->query($data1);
					while($showdata1=$qdata1->fetch_assoc()){ $sl++;
				
				?>
 <option value=" <?php echo $showdata1['borno_school_session']; ?>" <?php if($showdata1['borno_school_session']==$_REQUEST['stsess']) { echo "selected"; }  ?>> <?php echo $showdata1['borno_school_session']; ?></option>
      <?php } ?>
     </select></td>
  </tr>                        
                        <tr>
    <td class="text_table">Select Branch *</td>
    <td><select name="branchId" id="branchId" onchange="callpage();">
      <option value="">--Branch--</option>
      <?php
                    if($_REQUEST['branchId'] == ""){
                    $_REQUEST['branchId']=$shgtstudent['borno_school_branch_id'];
                    }
					$data="select * from borno_school_branch where borno_school_id='1'";
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
      <option value="">--Class--</option>
      <?php
					$gtfbranchId=$_REQUEST['branchId'];
					  if($_REQUEST['studClass'] == ""){
                    $_REQUEST['studClass']=$shgtstudent['borno_school_class_id'];
                    }
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
      <option value="">--Shift--</option>
      <?php
					$studClass=$_REQUEST['studClass'];
					if($_REQUEST['shiftId'] == ""){
                    $_REQUEST['shiftId']=$shgtstudent['borno_school_shift_id'];
                    }
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
      <select name="section" id="section">
       <option value="">--Section--</option>
      
        <?php
					$shiftId=$_REQUEST['shiftId'];
				   if($_REQUEST['stsess']==""){
                    $stsess=trim($shgtstudent['borno_school_session']);
                    }
                    else{
					$stsess =$_REQUEST['stsess'];
                    }
                    
					if($_REQUEST['section'] == ""){
                    $_REQUEST['section']=$shgtstudent['borno_school_section_id'];
                    }
                    
					$gstsection="select * from borno_school_section where borno_school_class_id='$studClass' AND borno_school_branch_id='$gtfbranchId' AND borno_school_shift_id='$shiftId' AND `year`='$stsess'";
					$qgstsection=$mysqli->query($gstsection);
					while($shggstsection=$qgstsection->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $shggstsection['borno_school_section_id']; ?>" <?php if($shggstsection['borno_school_section_id']==$_REQUEST['section']) { echo "selected"; }  ?>> <?php echo $shggstsection['borno_school_section_name']; ?></option>
      <?php } ?>
      
      
      </select>
      
      </td>
  </tr>
 
  
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
                                    <td class="text_table">Gender </td>
                                    <td><select name="gender" id="gender">
                                       <option value="" <?php if($shgtstudent['borno_school_gender']=='') { echo "selected";} ?>> None </option>
                                      <option value="Female" <?php if($shgtstudent['borno_school_gender']=='Female') { echo "selected";} ?>> Female </option>
                                      <option value="Male" <?php if($shgtstudent['borno_school_gender']=='Male') { echo "selected";} ?>> Male </option>
                                
                                      
                                      </select></td>
                            </tr>
                             <tr>
                                <td class="text_table">Address</td>
                                <td><input type="text" name="stuaddress" id="stuaddress" value="<?php echo stripslashes($shgtstudent['borno_school_address']); ?>"></td>
                            </tr>
                             <tr>
                                <td class="text_table">Phone * (For SMS)</td>
                                <td><input type="text" name="stuphone" id="stuphone" value="<?php echo $shgtstudent['borno_school_phone']; ?>"></td>
                                <!--substr($shgtstudent['borno_school_phone'],2,11);-->
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
    <td class="text_table">Student ID* </td>
     <td><input type="text" readonly name="stuid" id="stuid" value="<?php echo $shgtstudent['borno_student_info_id']; ?>"></td>
  </tr>
  
  <tr>
    <td class="text_table">Group </td>
    <td><select name="group" id="group">
       <option value="" <?php if($shgtstudent['borno_school_stud_group']=='') { echo "selected";} ?>> None </option>
      <option value="1" <?php if($shgtstudent['borno_school_stud_group']=='1') { echo "selected";} ?>> Science </option>
      <option value="3" <?php if($shgtstudent['borno_school_stud_group']=='3') { echo "selected";} ?>> Humanities </option>
      <option value="2" <?php if($shgtstudent['borno_school_stud_group']=='2') { echo "selected";} ?>> Business Studies </option>
      <option value="4" <?php if($shgtstudent['borno_school_stud_group']== 4) { echo "selected"; } ?>> General </option>
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

                      </div>  
               </tr>
                    </table>
                    </center>
                      </div> 
            </div>
        </div><!-- Main Body part end -->
    <!-- Main Content end -->


<!--Script part-->

</body>
</html>