<?php 
ob_start();
require_once('result_top.php');



 $schoolId=$_POST['schoolId'];
 $branchId=$_POST['branchId'];
 $studClass=$_POST['studClass'];
 $shiftId=$_POST['shiftId'];
 $section=$_POST['section'];
 $stsess=$_POST['stsess'];
 $stusubjId=$_POST['stusubjId'];
 $gttermId=$_POST['gttermId'];
//====================Nine Ten Start============================ 
 if($studClass==1 OR $studClass==2)
		{
$gtresSubd="select * from modeltest_result_nine_ten_subject_details where borno_school_id='$schoolId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id='$gttermId' AND borin_subject_nine_ten_id='$stusubjId'";
$qgtresSubd=$mysqli->query($gtresSubd);
$showgtresSubd=$qgtresSubd->fetch_assoc();

$gtsubjdet_ntype1=$showgtresSubd['number_type1_marks'];
$gtsubjdet_ntype2=$showgtresSubd['number_type2_marks'];
$gtsubjdet_ntype3=$showgtresSubd['number_type3_marks'];
$gtsubjdet_ntype4=$showgtresSubd['number_type4_marks']; 
$gtsubjdet_ntype5=$showgtresSubd['number_type5_marks'];
$gtsubjdet_ntype6=$showgtresSubd['number_type6_marks'];
		}
//====================Nine Ten End============================
//====================Six to Eight Start============================
	elseif($studClass==3 OR $studClass==4 OR $studClass==5)
		{
$gtresSubd="select * from modeltest_six_eight_subject_details where borno_school_id='$schoolId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id='$gttermId' AND subject_id_six_eight='$stusubjId'";
$qgtresSubd=$mysqli->query($gtresSubd);
$showgtresSubd=$qgtresSubd->fetch_assoc();

$gtsubjdet_ntype1=$showgtresSubd['number_type1_marks'];
$gtsubjdet_ntype2=$showgtresSubd['number_type2_marks'];
$gtsubjdet_ntype3=$showgtresSubd['number_type3_marks'];
$gtsubjdet_ntype4=$showgtresSubd['number_type4_marks']; 
$gtsubjdet_ntype5=$showgtresSubd['number_type5_marks'];
$gtsubjdet_ntype6=$showgtresSubd['number_type6_marks'];
}
//====================Six to Eight End============================
//====================Play to Five Start============================
else
{
$gtresSubd="select * from modeltest_subject_details where borno_school_id='$schoolId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id='$gttermId' AND borno_result_subject_id='$stusubjId'";
$qgtresSubd=$mysqli->query($gtresSubd);
$showgtresSubd=$qgtresSubd->fetch_assoc();

$gtsubjdet_ntype1=$showgtresSubd['number_type1_marks'];
$gtsubjdet_ntype2=$showgtresSubd['number_type2_marks'];
$gtsubjdet_ntype3=$showgtresSubd['number_type3_marks'];
$gtsubjdet_ntype4=$showgtresSubd['number_type4_marks']; 
$gtsubjdet_ntype5=$showgtresSubd['number_type5_marks'];
$gtsubjdet_ntype6=$showgtresSubd['number_type6_marks'];
}	
//====================Play to Five End============================
?>
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
		
		if(document.frmcontent.stusubjId.value=="")
		{
			alert("Please Select Subject");
			document.frmcontent.stusubjId.focus();
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
	 document.frmcontent.action="show_marks_temp.php";
	 document.frmcontent.submit();
	}
	
	
	
</script>
    
    
</head>
<body>

<div class="wrapper">
    <div class="side_main_menu">
        <div class="top_part_menu">
            <h3>Result    Panel</h3>
            <ul>
               <?php
               		require_once('result_left.php');
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
                <h3>Result Panel [ <?php echo $shget_schoolName['borno_school_name']; ?> ] </h3>
            </div>
            <div class="log_out">
                <a href=""><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2> Upload Marks </h2></div>
                <div class="form">
               

       

<br>

<form name="frmcontent" id="myform" action="save_class1_tempmarks_step1.php" method="post" enctype="multipart/form-data">
<table width="650" border="0" cellspacing="0" cellpadding="0" class="projectlist" align="center">
  <tr>
    <td width="375"><strong>Select Branch *</strong></td>
    <td width="57" align="center"><strong>:</strong></td>
    <td width="218"><select name="branchId" id="branchId" onchange="callpage();">
      <option value=""> Select </option>
      <?php
					$data="select * from borno_school_branch where borno_school_branch_id='$branchId'";
					$qdata=$mysqli->query($data);
					while($showdata=$qdata->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $showdata['borno_school_branch_id']; ?>" <?php if($showdata['borno_school_branch_id']==$branchId) { echo "selected"; }  ?>> <?php echo $showdata['borno_school_branch_name']; ?></option>
      <?php } ?>
      </select></td>
  </tr>
  <tr>
    <td><strong>Select Class *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><select name="studClass" id="studClass" onchange="callpage();">
      <option value=""> Select </option>
      <?php
					$gtfbranchId=$_POST['branchId'];
					$gstclass="select * from borno_school_class where borno_school_class_id=$studClass";
					$qgstclass=$mysqli->query($gstclass);
					while($shgstclass=$qgstclass->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $shgstclass['borno_school_class_id']; ?>" <?php if($shgstclass['borno_school_class_id']==$studClass) { echo "selected"; }  ?>> <?php echo $shgstclass['borno_school_class_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
  <tr>
    <td><strong>Select Shift *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><select name="shiftId" id="shiftId" onchange="callpage();">
      <option value=""> Select </option>
      <?php
					$studClass=$_POST['studClass'];
					$gstshift="select * from borno_school_shift where borno_school_shift_id='$shiftId'";
					$qggstshift=$mysqli->query($gstshift);
					while($shggstshift=$qggstshift->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $shggstshift['borno_school_shift_id']; ?>" <?php if($shggstshift['borno_school_shift_id']==$shiftId) { echo "selected"; }  ?>> <?php echo $shggstshift['borno_school_shift_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
 
  <tr>
    <td><strong>Select  Section *</strong></td>
    <td align="center"><strong>:</strong></td>
   
    <td>
      <select name="section" id="section">
       <option value=""> Select </option>
      
        <?php
					
					$gstsection="select * from borno_school_section where borno_school_section_id='$section'";
					$qgstsection=$mysqli->query($gstsection);
					while($shggstsection=$qgstsection->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $shggstsection['borno_school_section_id']; ?>" <?php if($shggstsection['borno_school_section_id']==$section) { echo "selected"; }  ?>> <?php echo $shggstsection['borno_school_section_name']; ?></option>
      <?php } ?>
      
      
      </select>
      
      </td>
  </tr>
  <tr>
    <td><strong>Session *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><select name="stsess" id="stsess">
      
      <option value="2017" <?php if($stsess==2017) { echo "selected"; } ?> > 2017 </option>
      <option value="2018" <?php if($stsess==2018) { echo "selected"; } ?>> 2018 </option>
      <option value="2019" <?php if($stsess==2019) { echo "selected"; } ?>> 2019 </option>
      <option value="2020" <?php if($stsess==2020) { echo "selected"; } ?>> 2020 </option>
    </select></td>
  </tr>
  <tr>
    <td><strong>Select Term *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><select name="selTerm" id="selTerm">
      <option value=""> Select </option>
      <?php
			$schexterm="select * from modeltest_add_term where borno_school_id='$schoolId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess'";
			$qschexterm=$mysqli->query($schexterm);
			while($shschexterm=$qschexterm->fetch_assoc()){
	  ?>
      <option value="<?php echo $shschexterm['borno_result_term_id']; ?>" <?php if($shschexterm['borno_result_term_id']==$gttermId) { echo "selected"; }  ?>><?php echo $shschexterm['borno_result_term_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
  <tr>
    <td><strong>Subject  *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><select name="stusubjId" id="stusubjId" onchange="callpage();">
      <option value="">Select</option>
      <?php
			$studClass=$_POST['studClass'];
			$clSess=$_POST['stsess'];
			
			if($studClass==1 OR $studClass==2)
			{
			$gsubjName="select * from borno_subject_nine_ten";
			$qgsubjName=$mysqli->query($gsubjName);
			while($shgsubjName=$qgsubjName->fetch_assoc()){
		?>
      <option value="<?php echo $shgsubjName['borno_subject_nine_ten_id']; ?>" <?php if($shgsubjName['borno_subject_nine_ten_id']==$stusubjId) { echo "selected"; } ?>> <?php echo $shgsubjName['borno_subject_nine_ten_name']; ?></option>
      <?php }}  elseif($studClass==3 OR $studClass==4 OR $studClass==5)
	  {
			$gsubjName="select * from borno_subject_six_eight";
			$qgsubjName=$mysqli->query($gsubjName);
			while($shgsubjName=$qgsubjName->fetch_assoc()){
		?>
      <option value="<?php echo $shgsubjName['subject_id_six_eight']; ?>" <?php if($shgsubjName['subject_id_six_eight']==$stusubjId) { echo "selected"; } ?>> <?php echo $shgsubjName['six_eight_subject_name']; ?></option>
      <?php }}   else
	  {
			$gsubjName="select * from modeltest_result_subject where borno_school_class_id='$studClass' AND borno_school_id='$schoolId' AND borno_school_session='$stsess'";
			$qgsubjName=$mysqli->query($gsubjName);
			while($shgsubjName=$qgsubjName->fetch_assoc()){
		?>
      <option value="<?php echo $shgsubjName['modeltest_result_subject_id']; ?>" <?php if($shgsubjName['modeltest_result_subject_id']==$stusubjId) { echo "selected"; } ?>> <?php echo $shgsubjName['borno_school_subject_name']; ?></option>
      <?php }}  ?>    </select></td>
  </tr>
</table>

<br>

<table width="650" border="0" cellspacing="0" cellpadding="0" align="center" class="projectlist">
  <?php
	$assnty="select * from modeltest_assign_number_type where borno_school_id='$schoolId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess'";
	$qassnty=$mysqli->query($assnty);
	$shassnty=$qassnty->fetch_assoc();
	
	$gtnumberty1=$shassnty['borno_school_number_type1'];
	$gtnumberty2=$shassnty['borno_school_number_type2'];
	$gtnumberty3=$shassnty['borno_school_number_type3'];
	$gtnumberty4=$shassnty['borno_school_number_type4'];
	$gtnumberty5=$shassnty['borno_school_number_type5'];
	$gtnumberty6=$shassnty['borno_school_number_type6'];
  
  ?>
  <tr>
    <td align="center">Name</td>
    <td align="center">Roll</td>
    <td align="center"><?php echo $gtnumberty1; ?></td>
    <td align="center"><?php echo $gtnumberty2; ?></td>
    <td align="center"><?php echo $gtnumberty3; ?></td>
    <td align="center"><?php echo $gtnumberty4; ?></td>
    <td align="center"><?php echo $gtnumberty5; ?></td>
    <td align="center"><?php echo $gtnumberty6; ?></td>
  </tr>
  <?php
  
	
		$gtctmarg="select * from modeltest_class1_temp_mark where borno_school_id='$schoolId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_subject_id='$stusubjId' AND borno_result_term_id='$gttermId' order by borno_school_roll asc";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){
  
  
  ?>
  <tr>
    <td><?php echo $shgtctmarg['borno_school_student_name']; ?>
      <input type="hidden" name="stuName[]" id="stuName[]" value="<?php echo $shgtctmarg['borno_school_student_name']; ?>" /></td>
    <td align="center"><?php echo $shgtctmarg['borno_school_roll']; ?>
      <input type="hidden" name="stuRoll[]" id="stuRoll[]" value="<?php echo $shgtctmarg['borno_school_roll']; ?>" />
      <input type="hidden" name="studId[]" id="studId[]" value="<?php echo $shgtctmarg['borno_student_info_id']; ?>" /></td>
    <td align="center">
    		<?php
            	if($gtnumberty1!=""){
				$numberty1=$shgtctmarg['temp_res_number_type1'];
			if($numberty1<=$gtsubjdet_ntype1){
			?>
              <input name="ntype1[]" type="text" id="ntype1[]" size="1" value="<?php echo $shgtctmarg['temp_res_number_type1']; ?>">
            <?php } else { ?> 
            <input name="ntype1[]" type="text" id="ntype1[]" size="1" value="0">
            <?php }} else { ?>   
            <input name="textfield" type="text" disabled id="textfield" size="1">
            <?php } ?>
             
    </td>
    <td align="center">
    	<?php
            	if($gtnumberty2!=""){
				$numberty2=$shgtctmarg['temp_res_number_type2'];
			if($numberty2<=$gtsubjdet_ntype2){
			?>
              <input name="ntype2[]" type="text" id="ntype2[]" size="1" value="<?php echo $shgtctmarg['temp_res_number_type2']; ?>">
            <?php } else { ?> 
            <input name="ntype2[]" type="text" id="ntype2[]" size="1" value="0">
            <?php }} else { ?>   
            <input name="textfield" type="text" disabled id="textfield" size="1">
            <?php } ?>
    </td>
    <td align="center">
    	<?php
            	if($gtnumberty3!=""){
				$numberty3=$shgtctmarg['temp_res_number_type3'];
			if($numberty3<=$gtsubjdet_ntype3){
			?>
              <input name="ntype3[]" type="text" id="ntype3[]" size="1" value="<?php echo $shgtctmarg['temp_res_number_type3']; ?>">
            <?php } else { ?> 
            <input name="ntype3[]" type="text" id="ntype3[]" size="1" value="0">
            <?php }} else { ?>   
            <input name="textfield" type="text" disabled id="textfield" size="1">
            <?php } ?>
    </td>
    <td align="center">
    	<?php
            	if($gtnumberty4!=""){
				$numberty4=$shgtctmarg['temp_res_number_type4'];
			if($numberty4<=$gtsubjdet_ntype4){
			?>
              <input name="ntype4[]" type="text" id="ntype4[]" size="1" value="<?php echo $shgtctmarg['temp_res_number_type4']; ?>">
            <?php } else { ?> 
            <input name="ntype4[]" type="text" id="ntype4[]" size="1" value="0">
            <?php }} else { ?>   
            <input name="textfield" type="text" disabled id="textfield" size="1">
            <?php } ?>
    </td>
    <td align="center">
    		<?php
            	if($gtnumberty5!=""){
				$numberty5=$shgtctmarg['temp_res_number_type5'];
			if($numberty5<=$gtsubjdet_ntype5){
			?>
              <input name="ntype5[]" type="text" id="ntype5[]" size="1" value="<?php echo $shgtctmarg['temp_res_number_type5']; ?>">
            <?php } else { ?> 
            <input name="ntype5[]" type="text" id="ntype5[]" size="1" value="0">
            <?php }} else { ?>   
            <input name="textfield" type="text" disabled id="textfield" size="1">
            <?php } ?>
    </td>
    <td align="center">
    		<?php
            	if($gtnumberty6!=""){
				$numberty6=$shgtctmarg['temp_res_number_type6'];
			if($numberty6<=$gtsubjdet_ntype6){
			?>
              <input name="ntype6[]" type="text" id="ntype6[]" size="1" value="<?php echo $shgtctmarg['temp_res_number_type6']; ?>">
            <?php } else { ?> 
            <input name="ntype6[]" type="text" id="ntype6[]" size="1" value="0">
            <?php }} else { ?>   
            <input name="textfield" type="text" disabled id="textfield" size="1">
            <?php } ?>
    </td>
  </tr>
  <?php } ?>
  <tr>
    <td colspan="8" align="center"><input type="submit" name="button" id="button" value="Save"></td>
    </tr>
</table>

<?php //} ?>

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