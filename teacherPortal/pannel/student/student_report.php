<?php require_once('student_top.php');

	$query="SELECT * FROM `borno_set_class_teacher` WHERE `borno_school_teacher_id`='$teacherid'";

								
									$rsquery =$mysqli->query($query);								

									$result=$rsquery->fetch_assoc();
									$branch=$result['borno_school_branch_id'];
									$shift=$result['borno_school_shift_id'];
									$session=$result['borno_school_session'];
									$class=$result['borno_school_class_id'];
									$secid=$result['borno_school_section_id'];

?>
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
       <div class="ot_main_body" style="margin-top:2px; margin-left:2px;">
            <div class="ot_body_fixed">
                <div class="default_heading"><h2>Student Report</h2></div>
                             
                <div class="form">
                    
          
                        <center>
                   <form name="frmcontent" id="myform" action="#" method="post" enctype="multipart/form-data">
 <table align="center" border="1" cellspacing="0" cellpadding="0" style="color:#000; margin-top:-35px" > 
                        <tr>
    <td class="">Select Branch *</td>
    <td><select name="branchId" id="branchId" onchange="callpage();">
      <option value="">--Select--</option>
      <?php
                    if(empty($branch)){
					$data="select * from borno_school_branch where borno_school_id='$schId'";
                    }
                    else{
                        $data="select * from borno_school_branch where borno_school_branch_id='$branch'";
                    }
					$qdata=$mysqli->query($data);
					while($showdata=$qdata->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $showdata['borno_school_branch_id']; ?>" <?php if($showdata['borno_school_branch_id']==$_REQUEST['branchId']) { echo "selected"; }  ?>> <?php echo $showdata['borno_school_branch_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
  <tr>
    <td class="">Select Class *</td>
    
    <td>
    <select name="studClass" id="studClass" onChange="callpage();">
                                <option value="">--Select--</option>
                                <?php  
                                
                                if(empty($class)){
									    $gtfbranchId=$_POST['branchId'];
										
										$getClassId="select * from borno_school_set_class where borno_school_id='$schId' AND borno_school_branch_id='$gtfbranchId' order by class_order ";
		
		
		$qgetClassId=$mysqli->query($getClassId);
		while($shgetClassId=$qgetClassId->fetch_assoc()){
										
										$getfClassId=$shgetClassId['borno_school_class_id']; 
                                        $gstclass="select * from borno_school_class where borno_school_class_id='$getfClassId'";
                                        $qgstclass=$mysqli->query($gstclass);
                                        $shgstclass=$qgstclass->fetch_assoc(); 
                                    
                                    ?>
                                <option value=" <?php echo $shgstclass['borno_school_class_id']; ?>" <?php if($shgstclass['borno_school_class_id']==$_POST['studClass']) { echo "selected"; }  ?>> <?php echo $shgstclass['borno_school_class_name']; ?></option>
                              
                                                              <?php 
		}
                                }
                                else{
                                 $gstclass="select * from borno_school_class where borno_school_class_id IN (SELECT borno_school_class_id FROM `borno_set_class_teacher` WHERE `borno_school_teacher_id`='$teacherid')";
                                        $qgstclass=$mysqli->query($gstclass);
                                         
                                        while($shgstclass=$qgstclass->fetch_assoc()){ $sl++;
                              ?>
                              										
                                     
                                    
                              
                                <option value=" <?php echo $shgstclass['borno_school_class_id']; ?>" <?php if($shgstclass['borno_school_class_id']==$_POST['studClass']) { echo "selected"; }  ?>> <?php echo $shgstclass['borno_school_class_name']; ?></option>
                              
                              <?php
                                        }
                              }?>
                              </select>

    </td>
  </tr>
  <tr>
    <td class="">Select Shift *</td>
   
    <td><select name="shiftId" id="shiftId" onchange="callpage();">
      <option value="">--Select--</option>
      <?php
					$studClass=$_REQUEST['studClass'];
					if(empty($shift)){
					$gstshift="select * from borno_school_shift";
					}
					else{
					    $gstshift="select * from borno_school_shift Where borno_school_shift_id IN (SELECT borno_school_shift_id FROM `borno_set_class_teacher` WHERE `borno_school_teacher_id`='$teacherid')";
					}
					$qggstshift=$mysqli->query($gstshift);
					while($shggstshift=$qggstshift->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $shggstshift['borno_school_shift_id']; ?>" <?php if($shggstshift['borno_school_shift_id']==$_REQUEST['shiftId']) { echo "selected"; }  ?>> <?php echo $shggstshift['borno_school_shift_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>

  <tr>
    <td class="">Select  Section *</td>
     
    <td >
      <select name="section" id="section" onchange="callpage();">
       <option value="">--Select--</option>
      
        <?php
					$shiftId=$_REQUEST['shiftId'];
					if(empty($secid)){
					$gstsection="select * from borno_school_section where borno_school_class_id='$studClass' AND borno_school_branch_id='$gtfbranchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId'";
					}
					else{
					    $gstsection="select * from borno_school_section where borno_school_section_id IN (SELECT borno_school_section_id FROM `borno_set_class_teacher` WHERE `borno_school_teacher_id`='$teacherid') ";
					}
					$qgstsection=$mysqli->query($gstsection);
					while($shggstsection=$qgstsection->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $shggstsection['borno_school_section_id']; ?>" <?php if($shggstsection['borno_school_section_id']==$_REQUEST['section']) { echo "selected"; }  ?>> <?php echo $shggstsection['borno_school_section_name']; ?></option>
      <?php } ?>
      
      
      </select>
      
      </td>
  </tr>
  <tr>
    <td class="">Session *</td>
    <td><select name="stsess" id="stsess" onchange="callpage();">
      <option value="">--Select--</option>
      <?php
                   if(empty($session)){
					$data1="select borno_school_session from borno_student_info where borno_school_id='$schId' group by borno_school_session asc";
                   }
                   else{
                       $data1="select borno_school_session from borno_student_info where borno_school_session IN (SELECT trim(borno_school_session) FROM `borno_set_class_teacher` WHERE `borno_school_teacher_id`='$teacherid') group by borno_school_session asc";
                   }
					$qdata1=$mysqli->query($data1);
					while($showdata1=$qdata1->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $showdata1['borno_school_session']; ?>" <?php if($showdata1['borno_school_session']==trim($_REQUEST['stsess'])) { echo "selected"; }  ?>> <?php echo $showdata1['borno_school_session']; ?></option>
      <?php } ?>
    </select></td>
    
  </tr>
                        </table>
                   
                   </form>
                   </br>
                   <?php
                   $stsess=trim($_REQUEST['stsess']);
	$section=$_REQUEST['section'];
	?>
 <table width="330px" border="1" cellspacing="0" cellpadding="0" style="color:#000;" >
                     					<?php
					if($userid == "Amir"){
					?>
  <tr>
    <td class="" align=""><a href="download_summary.php?stsess=<?php echo $_POST['stsess']; ?>&schoolId=<?php echo 2; ?>" target="_blank">Download Summary</a></td>
  </tr>
  <tr>
    <td class="" align=""><a href="download_student_info.php?branchId=<?php echo $_POST['branchId']; ?>&schoolId=<?php echo 2; ?>&studClass=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&section=<?php echo $section; ?>&stsess=<?php echo $stsess; ?>" target="_blank">Download All Student</a></td>
  </tr>
  
    <tr>
    <td class="" align=""><a href="download_student_voter.php?branchId=<?php echo $_POST['branchId']; ?>&schoolId=<?php echo 2; ?>&studClass=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&section=<?php echo $section; ?>&stsess=<?php echo $stsess; ?>" target="_blank">Download Voter List</a></td>
  </tr>
    <tr>
    <td class="" align=""><a href="download_student_info_picture.php?branchId=<?php echo $_POST['branchId']; ?>&schoolId=<?php echo 2; ?>&studClass=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&section=<?php echo $section; ?>&stsess=<?php echo $stsess; ?>" target="_blank">Download All Student With Photo</a></td>
  </tr>
  <tr>
    <td class="" align=""><a href="download_student_info_details.php?branchId=<?php echo $_POST['branchId']; ?>&schoolId=<?php echo 2; ?>&studClass=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&section=<?php echo $section; ?>&stsess=<?php echo $stsess; ?>" target="_blank">Download All Student Details</a></td>
  </tr>
  <tr>
    <td class="" align=""><a href="download_student_info_id_card.php?branchId=<?php echo $_POST['branchId']; ?>&schoolId=<?php echo 2; ?>&studClass=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&section=<?php echo $section; ?>&stsess=<?php echo $stsess; ?>" target="_blank">Download Student Info For ID Card</a></td>
  </tr>
  <tr>
    <td class="" align=""><a href="download_student_info_id_card2.php?branchId=<?php echo $_POST['branchId']; ?>&schoolId=<?php echo 2; ?>&studClass=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&section=<?php echo $section; ?>&stsess=<?php echo $stsess; ?>" target="_blank">Download Student Info For ID Card(by shukriti)</a></td>
  </tr>
  
    <tr>
    <td class="" align=""><a href="download_student_id_card.php?branchId=<?php echo $_POST['branchId']; ?>&schoolId=<?php echo 2; ?>&studClass=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&section=<?php echo $section; ?>&stsess=<?php echo $stsess; ?>" target="_blank">Download ID Card Default</a></td>
  </tr>

  <tr>
    <td class="" align=""><a href="download_id_card.php?branchId=<?php echo $_POST['branchId']; ?>&roll=<?php echo $roll; ?>&schoolId=<?php echo 2; ?>&studClass=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&section=<?php echo $section; ?>&stsess=<?php echo $stsess; ?>" target="_blank">Download ID Card Front</a></td>
  </tr>
    <td class="" align=""><a href="download_id_card_back.php?branchId=<?php echo $_POST['branchId']; ?>&schoolId=<?php echo 2; ?>&studClass=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&section=<?php echo $section; ?>&stsess=<?php echo $stsess; ?>" target="_blank">Download ID Card Back</a></td>
  </tr>
                                	<?php
					}
					else{
					?>
					  <tr>
    <td class="" align=""><a href="download_student_info.php?branchId=<?php echo $_POST['branchId']; ?>&schoolId=<?php echo 2; ?>&studClass=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&section=<?php echo $section; ?>&stsess=<?php echo $stsess; ?>" target="_blank">Download All Student</a></td>
  </tr>
					
					                    <?php
					}
				
					?>
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
  
  
 	//$stsess=trim($_REQUEST['stsess']);
	$section=$_REQUEST['section'];
	
// 	echo $stsess;
// 	echo $section;
//	if($stsess!=""){
//	echo $gtfbranchId;
 $gtstudent="select * from borno_student_info where  borno_school_section_id='$section' AND borno_school_session=trim('$stsessn') order by borno_school_roll asc";
	
	$qgtstudent=$mysqli->query($gtstudent);
	$sl=0;
	while($shgtstudent=$qgtstudent->fetch_assoc()){ $sl++;
	//echo $sl;
	
	
  
  ?>
  
 
							 
							 
							
							
  
  <tr>
    <td><?php echo $shgtstudent['borno_school_roll']; ?></td>
    <td><?php echo stripslashes($shgtstudent['borno_school_student_name']); ?></td>
    <!--<td><?php echo substr($shgtstudent['borno_school_phone'],2,11); ?></td>-->
     <td><?php echo $shgtstudent['borno_school_phone']; ?></td>
      <td><a href="download_student_info_individual.php?stdid=<?php echo $shgtstudent['borno_student_info_id']; ?>&branchId=<?php echo $_POST['branchId']; ?>&schoolId=<?php echo $schId; ?>&studClass=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&section=<?php echo $section; ?>&stsess=<?php echo $stsess; ?>" target="_blank">Download</a></td>
    
  </tr>
  
  
  <?php
  
//	} 
	}
  
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