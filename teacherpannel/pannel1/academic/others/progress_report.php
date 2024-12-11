<?php require_once('others_top.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>::[Result]::</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <!-- Meta tag -->
    <meta charset="utf-8">
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
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
		
		if(document.frmcontent.selTerm.value=="")
		{
			alert("Please Select Term");
			document.frmcontent.selTerm.focus();
			return (false);
		}
		
		
	}
	
	
	function callpage()
	{
	 document.frmcontent.action="progress_report.php";
	 document.frmcontent.submit();
	}
	
	
	
</script>
    
    
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
             <
        </div>
        <div class="fixed_logo">
            <a href=""><img src="../assets/images/logo.jpg" class="img-fluid"></a>
        </div>
    </div><!-- side bar end -->

    <div class="ot_main_content">
        <div class="admin_logout">
            <div class="admin_head">
                <h3>Result Panel [ <?php echo $shget_schoolName['borno_teacher_name']; ?> ] </h3>
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2> Progress Report</h2></div>
                <div class="form">
               

 
      

 

       

<br>
<form name="frmcontent" id="myform" action="set_fail_do.php" method="post" enctype="multipart/form-data">
<table width="650" border="0" cellspacing="0" cellpadding="0" class="projectlist" align="center">
  <tr>
    <td><strong>Session *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td>
    <select name="stsess" id="stsess" onchange="callpage();">
      <option value="">--Select--</option>
      <option value="2018" <?php if($_REQUEST['stsess']==2018) { echo "selected"; } ?>> 2018 </option>
      <option value="2019" <?php if($_REQUEST['stsess']==2019) { echo "selected"; } ?>> 2019 </option>
      <option value="2020" <?php if($_REQUEST['stsess']==2020) { echo "selected"; } ?>> 2020 </option>
    </select></td>
  </tr>
<tr>
    <td width="195"><strong>Select Branch *</strong></td>
    <td width="35" align="center"><strong>:</strong></td>
    <td width="420">
      <?php
    $data="select * from borno_set_class_teacher where borno_school_teacher_id='$stdid'";
                $qdata=$mysqli->query($data);
                $showdata=$qdata->fetch_assoc();
                $brid=$showdata['borno_school_branch_id'];
                
    $databr="select * from borno_school_branch where borno_school_branch_id='$brid'";
                $qdatabr=$mysqli->query($databr);
                $showdatabr=$qdatabr->fetch_assoc();                        
                $branchname=$showdatabr['borno_school_branch_name'];
                                            
                                            ?>
      <input type="text" name="branchId1"  id="branchId1" value="<?php echo $branchname; ?>" size="24">
    <input type="hidden" name="branchId"  id="branchId" value="<?php echo $brid; ?>" size="24">
      </td>
  </tr>
  <tr>
    <td><strong>Select Class *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td>
      <?php
					$gstclass="select * from borno_set_class_teacher where borno_school_teacher_id='$stdid'";
					$qgstclass=$mysqli->query($gstclass);
					$shgstclass=$qgstclass->fetch_assoc();
				    $studClass=$shgstclass['borno_school_class_id'];
				    
			
                    $gstclass1="select * from borno_school_class where borno_school_class_id='$studClass'";
                                        $qgstclass1=$mysqli->query($gstclass1);
                                        $shgstclass1=$qgstclass1->fetch_assoc(); 
				?>
<input type="text" name="studClass1"  id="studClass1" value="<?php echo $shgstclass1['borno_school_class_name']; ?>" size="24">
    <input type="hidden" name="studClass"  id="studClass" value="<?php echo $shgstclass['borno_school_class_id']; ?>" size="24">				
     </td>
  </tr>
   <tr>
    <td><strong>Select Shift *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td>
      <?php
                    
					$gstclassshift="select * from borno_set_class_teacher where borno_school_teacher_id='$stdid'";
					$qgstclassshift=$mysqli->query($gstclassshift);
					$shgstclassshift=$qgstclassshift->fetch_assoc();
				
					$shiftId=$shgstclassshift['borno_school_shift_id']; 
					
                    $gstclass11="select * from borno_school_shift where borno_school_shift_id='$shiftId'";
                        $qgstclass11=$mysqli->query($gstclass11);
                        $shgstclass11=$qgstclass11->fetch_assoc(); 
				?>

    <input type="text" name="shiftId1"  id="shiftId1" value="<?php echo $shgstclass11['borno_school_shift_name']; ?>" size="24">
    <input type="hidden" name="shiftId"  id="shiftId" value="<?php echo $shgstclass11['borno_school_shift_id']; ?>" size="24">  
    </select>
    
    </td>
  </tr>

  <tr>
    <td><strong>Select  Section *</strong></td>
    <td align="center"><strong>:</strong></td>
   
    <td>
      <?php
                                                       
			$gstclassshift="select * from borno_set_class_teacher where borno_school_teacher_id='$stdid'";
					$qgstclassshift=$mysqli->query($gstclassshift);
					$shgstclassshift=$qgstclassshift->fetch_assoc();       
					$getfsection=$shgstclassshift['borno_school_section_id']; 
					$clSess=$shgstclassshift['borno_school_session'];			$schId=$shgstclassshift['borno_school_id'];				
    $gstsection="select * from borno_school_section where borno_school_section_id='$getfsection'";
            $qgstsection=$mysqli->query($gstsection);
            $shggstsection=$qgstsection->fetch_assoc();
                                            
                                            ?>
 <input type="text" name="section1"  id="section1" value="<?php echo $shggstsection['borno_school_section_name']; ?>" size="24">
    <input type="hidden" name="section"  id="section" value="<?php echo $getfsection; ?>" size="24"></td>
  </tr>
  <tr>
    <td><strong>Select Term *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td>
      <select name="selTerm" id="selTerm" onchange="callpage();">
      <option value="">--Select--</option>
	  <?php
	  
			$schexterm="select * from borno_result_add_term where borno_school_class_id='$studClass' AND borno_school_session='$clSess' AND borno_school_id='$schId'";
			$qschexterm=$mysqli->query($schexterm);
			while($shschexterm=$qschexterm->fetch_assoc()){
	  ?>
        <option value="<?php echo $shschexterm['borno_result_term_id']; ?>" <?php if($shschexterm['borno_result_term_id']==$_REQUEST['selTerm']) { echo "selected"; } ?>><?php echo $shschexterm['borno_result_term_name']; ?></option>
        
      <?php } ?>  
        
      </select>
    </td>
  </tr>


    <?php if($studClass==1 OR $studClass==2) 
   {
	   ?>  
  <tr>
  <td><strong>Select Group *</strong></td>
    <td align="center"><strong>:</strong></td>
     <td><select name="group" id="group" onchange="callpage();">
      <option value="">--Select--</option>
      <option value="1" <?php if($_POST['group']==1) { echo "selected"; } ?> > Science </option>
      <option value="2" <?php if($_POST['group']==2) { echo "selected"; } ?>> Business </option>
      <option value="3" <?php if($_POST['group']==3) { echo "selected"; } ?>> Humanities </option>

      
      </select></td>
      
  </tr>
  <?php } ?>
<tr>
    <td><strong>From Roll *</strong></td>
     <td align="center"><strong>:</strong></td>
    <td><select name="roll1" id="roll1" onchange="callpage();">
        <option value=""> Select </option>
        <?php
		echo	$stsess=$_POST['stsess'];
			$branchId=$_POST['branchId'];
			$section=$_POST['section'];
			$selTerm=$_POST['selTerm'];
			$group=$_POST['group'];
			if($studClass==1 OR $studClass==2)
{
			$schexroll="select * from borno_school_9_10_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' AND borno_school_stud_group='$group' order by borno_school_roll asc";
			$qschexroll=$mysqli->query($schexroll);
			while($shschexroll=$qschexroll->fetch_assoc()){
	  ?>
        <option value="<?php echo $shschexroll['borno_school_roll']; ?>" <?php if($shschexroll['borno_school_roll']==$_POST['roll1']) { echo "selected"; } ?>><?php echo $shschexroll['borno_school_roll']; ?></option>
        
        <?php }} 			
        elseif($studClass==3 OR $studClass==4 OR $studClass==5)
{
			$schexroll="select * from borno_school_6_8_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' order by borno_school_roll asc";
			$qschexroll=$mysqli->query($schexroll);
			while($shschexroll=$qschexroll->fetch_assoc()){
	  ?>
        <option value="<?php echo $shschexroll['borno_school_roll']; ?>" <?php if($shschexroll['borno_school_roll']==$_POST['roll1']) { echo "selected"; } ?>><?php echo $shschexroll['borno_school_roll']; ?></option>
        
        <?php }}         
        else
{
			$schexroll="select * from borno_school_play_5_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' order by borno_school_roll asc";
			$qschexroll=$mysqli->query($schexroll);
			while($shschexroll=$qschexroll->fetch_assoc()){
	  ?>
        <option value="<?php echo $shschexroll['borno_school_roll']; ?>" <?php if($shschexroll['borno_school_roll']==$_POST['roll1']) { echo "selected"; } ?>><?php echo $shschexroll['borno_school_roll']; ?></option>
        
        <?php }}  ?>  
        
        </select></td>
  </tr> 
  <tr>
    <td><strong>To Roll *</strong></td>
     <td align="center"><strong>:</strong></td>
    <td><select name="roll2" id="roll2" onchange="callpage();">
        <option value=""> Select </option>
        <?php
			$stsess=$_POST['stsess'];
			$branchId=$_POST['branchId'];
			$section=$_POST['section'];
			$selTerm=$_POST['selTerm'];
			$group=$_POST['group'];
			if($studClass==1 OR $studClass==2)
{
			$schexroll="select * from borno_school_9_10_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' AND borno_school_stud_group='$group' order by borno_school_roll asc";
			$qschexroll=$mysqli->query($schexroll);
			while($shschexroll=$qschexroll->fetch_assoc()){
	  ?>
        <option value="<?php echo $shschexroll['borno_school_roll']; ?>" <?php if($shschexroll['borno_school_roll']==$_POST['roll2']) { echo "selected"; } ?>><?php echo $shschexroll['borno_school_roll']; ?></option>
        
        <?php }} 			
        elseif($studClass==3 OR $studClass==4 OR $studClass==5)
{
			$schexroll="select * from borno_school_6_8_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' order by borno_school_roll asc";
			$qschexroll=$mysqli->query($schexroll);
			while($shschexroll=$qschexroll->fetch_assoc()){
	  ?>
        <option value="<?php echo $shschexroll['borno_school_roll']; ?>" <?php if($shschexroll['borno_school_roll']==$_POST['roll2']) { echo "selected"; } ?>><?php echo $shschexroll['borno_school_roll']; ?></option>
        
        <?php }}         
        else
{
			$schexroll="select * from borno_school_play_5_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' order by borno_school_roll asc";
			$qschexroll=$mysqli->query($schexroll);
			while($shschexroll=$qschexroll->fetch_assoc()){
	  ?>
        <option value="<?php echo $shschexroll['borno_school_roll']; ?>" <?php if($shschexroll['borno_school_roll']==$_POST['roll2']) { echo "selected"; } ?>><?php echo $shschexroll['borno_school_roll']; ?></option>
        
        <?php }}  ?>  
        
        </select></td>
  </tr>  
  <?php
$gtfbranchId=$_POST['branchId'];
$section=$_POST['section'];
$stsess=$_POST['stsess'];
$selTerm=$_POST['selTerm'];
$group=$_POST['group'];
$rollf=$_POST['roll1'];
$rollt=$_POST['roll2'];
if($studClass==1 OR $studClass==2)
{		
 $gtgpa ="select * from borno_school_9_10_merit where borno_school_class_id='$studClass' AND borno_school_branch_id='$gtfbranchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' AND borno_school_stud_group='$group'";
					$qgtgpa=$mysqli->query($gtgpa);
					$stqgtgpa=$qgtgpa->fetch_assoc();
					$gpa=$stqgtgpa['gpa'];	
}
elseif($studClass==3 OR $studClass==4 OR $studClass==5)
{		
$gtgpa ="select * from borno_school_6_8_merit where borno_school_class_id='$studClass' AND borno_school_branch_id='$gtfbranchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm'";
					$qgtgpa=$mysqli->query($gtgpa);
					$stqgtgpa=$qgtgpa->fetch_assoc();
					$gpa=$stqgtgpa['gpa'];	
}
else
{		
$gtgpa ="select * from borno_school_play_5_merit where borno_school_class_id='$studClass' AND borno_school_branch_id='$gtfbranchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm'";
					$qgtgpa=$mysqli->query($gtgpa);
					$stqgtgpa=$qgtgpa->fetch_assoc();
					$gpa=$stqgtgpa['gpa'];	
}
	if($gpa!="")
	{				
?>
  

    <tr>

  
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><a href="download_progress_report05.php?schoolId=<?php echo $schId; ?>&stbranch=<?php echo $gtfbranchId; ?>&classId=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&sectionId=<?php echo $section; ?>&scsess=<?php echo $stsess; ?>&sctermId=<?php echo $selTerm; ?>&group=<?php echo $group; ?>&rollf=<?php echo $rollf; ?>&rollt=<?php echo $rollt; ?>" target="_blank">Progress Report</a></td>
 </tr>
 

  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><a href="download_avg_progress_report.php?schoolId=<?php echo $schId; ?>&stbranch=<?php echo $gtfbranchId; ?>&classId=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&sectionId=<?php echo $section; ?>&scsess=<?php echo $stsess; ?>&sctermId=<?php echo $selTerm; ?>&group=<?php echo $group; ?>&rollf=<?php echo $rollf; ?>&rollt=<?php echo $rollt; ?>" target="_blank">Avg. Progress Report Two Term</a></td>
 </tr>
  
 <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><a href="download_avg1_progress_report.php?schoolId=<?php echo $schId; ?>&stbranch=<?php echo $gtfbranchId; ?>&classId=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&sectionId=<?php echo $section; ?>&scsess=<?php echo $stsess; ?>&sctermId=<?php echo $selTerm; ?>&group=<?php echo $group; ?>" target="_blank">Avg. Progress Report Three Term</a></td>
 </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><a href="download_avg2_progress_report.php?schoolId=<?php echo $schId; ?>&stbranch=<?php echo $gtfbranchId; ?>&classId=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&sectionId=<?php echo $section; ?>&scsess=<?php echo $stsess; ?>&sctermId=<?php echo $selTerm; ?>&group=<?php echo $group; ?>&rollf=<?php echo $rollf; ?>&rollt=<?php echo $rollt; ?>" target="_blank">GPA Avg. Progress Report Two Term</a></td>
 </tr>
 <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><a href="download_avg3_progress_report.php?schoolId=<?php echo $schId; ?>&stbranch=<?php echo $gtfbranchId; ?>&classId=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&sectionId=<?php echo $section; ?>&scsess=<?php echo $stsess; ?>&sctermId=<?php echo $selTerm; ?>&group=<?php echo $group; ?>" target="_blank">GPA Avg. Progress Report Three Term</a></td>
 </tr>
 <?php }?>  
  
</table>


</form>
                </div>
            </div>
        </div><!-- Main Body part end -->
    </div><!-- Main Content end -->
</div>

<!--Script part-->
<!--<script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js"></script>-->
</body>
</html>