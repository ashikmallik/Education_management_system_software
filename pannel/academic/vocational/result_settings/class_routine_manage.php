<?php require_once('result_sett_top.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>:: [Class Routine Settings]::</title>
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
<!--            <a href=""><img src="../assets/images/logo.jpg" class="img-fluid"></a>
-->        </div>
    </div><!-- side bar end -->

    <div class="ot_main_content">
        <div class="admin_logout">
            <div class="admin_head">
                <h3> Result Settings </h3>
                
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Class Routine Manage</h2></div>
                <div class="form">
                    <center>


<script language="javascript">
function callpage()
{
	 document.frmcontent.action="class_routine_manage.php";
	 document.frmcontent.submit();
}
</script>

<script language="javascript">
	function contalt_valid()
	{
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

	if(document.frmcontent.stsess.value=="")
		{
			alert("Please Select Session");
			document.frmcontent.stsess.focus();
			return (false);
		}
	if(document.frmcontent.teacherid.value=="")
		{
			alert("Please Select Teacher");
			document.frmcontent.teacherid.focus();
			return (false);
		}
						
	}
</script> 


<form name="frmcontent" action="manage_routine_do.php" method="post" enctype="multipart/form-data">

<table width="400" border="0" cellspacing="0" cellpadding="0" align="center" class="projectlist">

    <tr>
    <td colspan="3" align="center" style="color: #FE0000; font-size:24px">
    	<?php
        	$msg=$_GET['msg'];
			if($msg==1) { echo "Delete Successfully"; } else if($msg==2) { echo "Failed"; }  else if($msg==3) { echo "Edit Successfull"; } 
		?>
    </td>
    </tr>
  <tr>
    <td><strong>Select Branch *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><select name="branchId" id="branchId" onchange="callpage();">
      <option value=""> --Select-- </option>
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
    <td><strong>Select Shift *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><select name="shiftId" id="shiftId" onchange="callpage();">
      <option value=""> --Select-- </option>
      <?php
					
					$gstshift="select * from borno_school_shift";
					$qggstshift=$mysqli->query($gstshift);
					while($shggstshift=$qggstshift->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $shggstshift['borno_school_shift_id']; ?>" <?php if($shggstshift['borno_school_shift_id']==$_REQUEST['shiftId']) { echo "selected"; }  ?>> <?php echo $shggstshift['borno_school_shift_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
  
  <tr>
    <td><strong>Select Teacher *</strong></td>
    <td align="center"><strong>:</strong></td>
    
    <td>
      <select name="teacherid" id="teacherid"  onchange="callpage();">
      <option value=""> --Select-- </option>
		  <?php
                        $branchId=$_REQUEST['branchId'];
                        $shiftId=$_REQUEST['shiftId'];
                        $gstteacher="select * from borno_teacher_info where borno_school_id='$schId'  and borno_school_shift_id='$shiftId' AND borno_school_branch_id='$branchId'";
                        $qgstteacher=$mysqli->query($gstteacher);
                        while($shgstteacher=$qgstteacher->fetch_assoc()){ $sl++;				
         ?>
        <option value=" <?php echo $shgstteacher['borno_teacher_info_id']; ?>" <?php if($shgstteacher['borno_teacher_info_id']==$_REQUEST['teacherid']) { echo "selected"; }  ?>> <?php echo $shgstteacher['borno_teacher_name']; ?></option>
        
        <?php } ?>
        
      </select>
    </td>
  </tr>
  <tr>
  <td><strong>Session *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><select name="stsess" id="stsess" onchange="callpage();">
      <option value=""> --Select-- </option>
      <option value="2019" <?php if($_REQUEST['stsess']==2019) { echo "selected"; } ?>> 2019 </option>
      <option value="2020" <?php if($_REQUEST['stsess']==2020) { echo "selected"; } ?>> 2020 </option>
      <option value="2021" <?php if($_REQUEST['stsess']==2021) { echo "selected"; } ?>> 2021 </option>
    </select></td>
  </tr>

      
</table>

</form>
<br>

    
    
<table width="800" border="0" cellspacing="0" cellpadding="0" align="center" class="projectlist">
  <tr align="center">
       <td  align="center">SL</td>
    <td  align="center">Teacher Name</td>
    <td  align="center">Day</td>
    <td  align="center">Period</td>
    <td  align="center">Class</td>
    <td  align="center">Section</td>
    <td  align="center">Subject</td>
    <td colspan="2" align="center">Action</td>
 </tr>
  <tr >
  <?php
  $TechId=$_GET['TechId'];
  		$deletestud="delete from borno_school_class_routine where borno_school_routine_id='$TechId'";
		$mysqli->query($deletestud);
  
                          $teacherid=trim($_REQUEST['teacherid']);
                        $stsess=trim($_REQUEST['stsess']);
  
	$getTechid="select * from borno_school_class_routine where borno_school_teacher_id='$teacherid' AND borno_school_session='$stsess' ";
    
    	$qgetTechid=$mysqli->query($getTechid);
	$sl=0;
	while($shgetTechid=$qgetTechid->fetch_assoc()){ $sl++;
  
		$Techerid=$shgetTechid['borno_school_teacher_id'];	
		$classid=$shgetTechid['borno_school_class_id'];
 $gstclass1="select * from borno_school_class where borno_school_class_id='$classid'";
                        $qgstclass1=$mysqli->query($gstclass1);
                        $shgstclass1=$qgstclass1->fetch_assoc();		
		
		$sectionid=$shgetTechid['borno_school_section_id'];
						$gstsection="select * from borno_school_section where borno_school_section_id='$sectionid'";
					$qgstsection=$mysqli->query($gstsection);
					$shggstsection=$qgstsection->fetch_assoc();	
		
		$subjid=$shgetTechid['borno_school_subject_id'];
		
if($classid=='15' OR  $classid=='14' OR  $classid=='13' OR  $classid=='10' OR  $classid=='6'){					
    $gsubjNamesixeight="select * from borno_result_subject where borno_result_subject_id='$subjid'";
			$qgsubjNamesixeight=$mysqli->query($gsubjNamesixeight);
			$shgsubjNamesixeight=$qgsubjNamesixeight->fetch_assoc();
			$subjectname=$shgsubjNamesixeight['borno_school_subject_name'];
}
elseif($classid=='3' OR  $classid=='4' OR  $classid=='5'){
     $gsubjNamesixeight="select * from borno_subject_six_eight where subject_id_six_eight='$subjid'";
			$qgsubjNamesixeight=$mysqli->query($gsubjNamesixeight);
			$shgsubjNamesixeight=$qgsubjNamesixeight->fetch_assoc();
			$subjectname=$shgsubjNamesixeight['six_eight_subject_name'];
}
elseif($classid=='1' OR  $classid=='2'){
     $gsubjNamesixeight="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$subjid'";
			$qgsubjNamesixeight=$mysqli->query($gsubjNamesixeight);
			$shgsubjNamesixeight=$qgsubjNamesixeight->fetch_assoc();
			$subjectname=$shgsubjNamesixeight['borno_subject_nine_ten_name'];
}
		 $gstteacher1="select * from borno_teacher_info where borno_teacher_info_id='$Techerid' ";
                        $qgstteacher1=$mysqli->query($gstteacher1);
                        $shgstteacher1=$qgstteacher1->fetch_assoc();  
  
  
  ?>
   <td ><?php echo $sl; ?></td>
     <td ><?php echo $shgstteacher1['borno_teacher_name']; ?></td>
    <td align="center">
	
	<?php 	
	 if ($shgetTechid['borno_school_routine_day']==1){echo "Saturday";}
	 else if ($shgetTechid['borno_school_routine_day']==2){echo "Sunday";}
	 else if ($shgetTechid['borno_school_routine_day']==3){echo "Monday";}
	else if ($shgetTechid['borno_school_routine_day']==4){echo "Tuesday";}
    else if ($shgetTechid['borno_school_routine_day']==5){echo "Wednesday";}
	else if ($shgetTechid['borno_school_routine_day']==6){echo "Thursday";}
	
	
	?>
    </td>
    <td ><?php echo $shgetTechid['borno_school_routine_period']; ?></td>
    <td ><?php echo $shgstclass1['borno_school_class_name']; ?></td>
    <td ><?php echo $shggstsection['borno_school_section_name']; ?></td>
    <td ><?php echo $subjectname; ?></td>
        <td  align="center"><a href="class_routine_edit.php?TechId=<?php echo $shgetTechid['borno_school_routine_id']; ?>&branchId=<?php echo $shgetTechid['borno_school_branch_id']; ?>&shiftId=<?php echo $shgetTechid['borno_school_shift_id']; ?>&teacherid=<?php echo $shgetTechid['borno_school_teacher_id']; ?>&stsess=<?php echo $shgetTechid['borno_school_session']; ?>&dayid=<?php echo $shgetTechid['borno_school_routine_day']; ?>&period=<?php echo $shgetTechid['borno_school_routine_period']; ?>&studClass1=<?php echo $shgetTechid['borno_school_class_id']; ?>&studSection1=<?php echo $shgetTechid['borno_school_section_id']; ?>&sub1=<?php echo $shgetTechid['borno_school_subject_id']; ?>">Edit</a></td>
        
        <td><a href="class_routine_manage.php?TechId=<?php echo $shgetTechid['borno_school_routine_id']; ?>&branchId=<?php echo $shgetTechid['borno_school_branch_id']; ?>&shiftId=<?php echo $shgetTechid['borno_school_shift_id']; ?>&teacherid=<?php echo $shgetTechid['borno_school_teacher_id']; ?>&stsess=<?php echo $shgetTechid['borno_school_session']; ?>&msg=1" onclick="return confirm('Seure to Delete')">Delete</a></td>
  
  
  </tr>
  


  <?php
  

	  	
	}
  ?>

  
  </table>


<br>
 <br>
                        
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