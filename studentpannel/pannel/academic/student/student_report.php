<?php require_once('student_top.php');?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>My Profile</title>
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
                <h3> My Profile [<?php echo $shget_schoolName['borno_school_student_name']; ?>] </h3>
            </div>
            <div class="log_out">
                <a href=""><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->


        <div class="ot_main_body" style="margin-top:5px; margin-left:5px;">
            <div class="ot_body_fixed">
                <div class="default_heading"><h2>Student Profile</h2></div>
                             
                <div class="form">
                    
          
                        <center>


       	<form name="frmcontent" action="download_student_info_individual.php" method="post" enctype="multipart/form-data" target="_blank">

<table width="545" height="450"  border="" cellpadding="0" cellspacing="0" style="color:#000; margin-left:50px; margin-top:-35px; text-indent:3px" > 
                 
                   <?php

 $gtstudent="select * from borno_student_info where borno_student_info_id='$stdid'";
	
	$qgtstudent=$mysqli->query($gtstudent);		
	$shgtstudent=$qgtstudent->fetch_assoc();
	$clsid=$shgtstudent['borno_school_class_id'];
	$shiftid=$shgtstudent['borno_school_shift_id'];
	$sectionid=$shgtstudent['borno_school_section_id'];
	$session=$shgtstudent['borno_school_session'];
	$gender=$shgtstudent['borno_school_gender'];
	$religion=$shgtstudent['borno_school_religion'];
	$status=$shgtstudent['borno_school_status'];
	$stdgroup=$shgtstudent['borno_school_stud_group'];
		?>
           <tr>
             <td colspan="3" align="center">
       <img src="../../../../pannel/academic/student/motherphoto/<?php echo $shgtstudent['borno_school_mphoto']; ?>" width="100" height="100">
       <img src="../../../../pannel/academic/student/studentphoto/<?php echo $shgtstudent['borno_school_photo']; ?>" width="100" height="100">
       <img src="../../../../pannel/academic/student/fatherphoto/<?php echo $shgtstudent['borno_school_fphoto']; ?>" width="100" height="100">
       </td>
               </tr>
 
  <tr>
    <td width="272">Class Name</td>
     <td width="56" align="center"  style="text-align:center; "><b>:</b></td>
          <?php
					
					$gstclass="select * from borno_school_class where borno_school_class_id='$clsid'";
					$qgstclass=$mysqli->query($gstclass);
					$shgstclass=$qgstclass->fetch_assoc();
				
				?>
    
<td><input type="text" name="studClass" id="studClass" value="<?php echo stripslashes($shgstclass['borno_school_class_name']); ?>" readonly></td>
  
  </tr>
  <tr>
    <td width="272">Shift Name</td>
     <td width="56" align="center"  style="text-align:center; "><b>:</b></td>
          <?php
					
					$gstshift="select * from borno_school_shift where borno_school_shift_id='$shiftid'";
					$qggstshift=$mysqli->query($gstshift);
					$shggstshift=$qggstshift->fetch_assoc();
				
				?>
    
<td width="209"><input type="text" name="shiftId" id="shiftId" value="<?php echo stripslashes($shggstshift['borno_school_shift_name']); ?>" readonly></td>    

  </tr>

  <tr>
    <td width="272">Section Name</td>
      <td width="56" align="center"  style="text-align:center; "><b>:</b></td>
            <?php
					
					$gstsection="select * from borno_school_section where borno_school_section_id='$sectionid'";
					$qgstsection=$mysqli->query($gstsection);
					$shggstsection=$qgstsection->fetch_assoc();
				
				?>
    
<td><input type="text" name="section" id="section" value="<?php echo stripslashes($shggstsection['borno_school_section_name']); ?>" readonly></td>   

  </tr>
  <tr>
    <td width="272">Session </td>
     <td width="56" align="center"  style="text-align:center; "><b>:</b></td>
<td><input type="text" name="stsess" id="stsess" value="<?php echo $session; ?>" readonly></td> 
  </tr>
  <tr>
                    <td width="272">Student Name </td>
                     <td width="56" align="center"  style="text-align:center; "><b>:</b></td>
                    <td><input type="text" name="stuName" id="stuName" value="<?php echo stripslashes($shgtstudent['borno_school_student_name']); ?>" readonly></td>
                  </tr>
                             <tr>
                                <td width="272">Father's Name</td>
                                 <td width="56" align="center"  style="text-align:center; "><b>:</b></td>
                                <td><input type="text" name="stuFname" id="stuFname"  value="<?php echo $shgtstudent['borno_school_father_name']; ?>" readonly></td>
                            </tr>
                             <tr>
                                <td width="272">Mother's Name</td>
                                 <td width="56" align="center"  style="text-align:center; "><b>:</b></td>
    <td><input type="text" name="stuMname" id="stuMname" value="<?php echo $shgtstudent['borno_school_mother_name']; ?>" readonly></td>
                            </tr>
                            
   <tr>
    <td width="272">Gender </td>
     <td width="56" align="center"  style="text-align:center; "><b>:</b></td>
<td><input type="text" name="gender" id="gender" value="<?php echo $gender; ?>" readonly></td>   

  </tr>                           
                            
                            
                            
                             <tr>
                                <td width="272">Address</td>
                                 <td width="56" align="center"  style="text-align:center; "><b>:</b></td>
                                <td><input type="text" name="stuaddress" id="stuaddress" value="<?php echo stripslashes($shgtstudent['borno_school_address']); ?>" readonly></td>
                            </tr>
                             <tr>
                                <td width="272">Phone </td>
                                 <td width="56" align="center"  style="text-align:center; "><b>:</b></td>
         <td><input type="text" name="stuphone" id="stuphone" value="<?php echo substr($shgtstudent['borno_school_phone'],2,11); ?>" readonly></td>
                            </tr>
                             <tr>
    <td width="272">Blood Group</td>
 <td width="56" align="center"  style="text-align:center; "><b>:</b></td>
<td><input type="text" name="blgroup" id="blgroup" value="<?php echo $gender; ?>" readonly></td>  
  </tr>
  <tr>
    <td width="272">Date of birth</td>
  <td width="56" align="center"  style="text-align:center; "><b>:</b></td>
    <td>
    	<input type="text" id="datepicker" name="datepicker" value="<?php echo $shgtstudent['borno_school_dob']; ?> readonly"/>
    </td>
  </tr>
  <tr>
    <td width="272">Religion</td>
     <td width="56" align="center"  style="text-align:center; "><b>:</b></td>
<td><input type="text" name="religion" id="religion" value="<?php echo $religion; ?>" readonly></td>   
  </tr>
  <tr>
    <td width="272">Status</td>
     <td width="56" align="center"  style="text-align:center; "><b>:</b></td>
<td><input type="text" name="status" id="status" value="<?php echo $status; ?>" readonly></td>  
  </tr>

  
  <tr>
    <td width="272">Group Name</td>
     <td width="56" align="center"  style="text-align:center; "><b>:</b></td>
<?php
	  if($stdgroup=='1') { $stdgroupname= "Science";} 
	  elseif ($stdgroup=='2') { $stdgroupname= "Business Studies";}
	    elseif ($stdgroup=='3') { $stdgroupname= "Humanities";}
		else { $stdgroupname= "N/A";}

       ?>
       
<td><input type="text" name="group" id="group" value="<?php echo $stdgroupname; ?>" readonly></td>  
  </tr>
 
                            <tr>
                                <td width="272">Roll No</td>
                                 <td width="56" align="center"  style="text-align:center; "><b>:</b></td>
                                <td><input type="text" name="sturoll" id="sturoll" value="<?php echo $shgtstudent['borno_school_roll']; ?>" readonly></td>
                            </tr>
                        </table>





   <table style="border: 1px solid #005067;">       
   <tr>
<td colspan="2" align="center"><input type="submit" name="button" id="button" value="Download My Profle" onClick="return contalt_valid()"></td>
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