<?php require_once('result_top.php'); ?>
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
	 document.frmcontent.action="marks_entry.php";
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
                  <h2>  Marks Entry</h2></div>
                <div class="form">
               
<?php
	$msg=$_GET['msg'];
	if($msg==1){	
?>

 <table width="600" border="0" cellspacing="0" cellpadding="0" class="projectlist" align="center">
          <tr>
            <td height="75" style="color:#008000; font-weight:bold; font-size:32px; text-align:center; background:#CCC">  Entry Success </td>
          </tr>
        </table>


<?php
	
   }	else if($msg==2){	
?>

        <table width="600" border="0" cellspacing="0" cellpadding="0" class="projectlist" align="center">
          <tr>
            <td height="75" style="color:#F00; font-weight:bold; font-size:32px; text-align:center; background:#CCC"> Failed </td>
          </tr>
        </table>


<?php
	
   }	else if($msg==3){	
?>

        <table width="600" border="0" cellspacing="0" cellpadding="0" class="projectlist" align="center">
          <tr>
            <td height="75" style="color:#F00; font-weight:bold; font-size:32px; text-align:center; background:#CCC"> Grading System Not Found </td>
          </tr>
        </table>


<?php } else { echo ""; } ?>
 
      

 

       

<br>

<form name="frmcontent" id="myform" action="marks_entry_do.php" method="post" enctype="multipart/form-data">
<table width="650" border="0" cellspacing="0" cellpadding="0" class="projectlist" align="center">
  <tr>
    <td width="195"><strong>Select Branch *</strong></td>
    <td width="35" align="center"><strong>:</strong></td>
    <td width="420"><select name="branchId" id="branchId" onchange="callpage();">
      <option value=""> Select </option>
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
    <td><strong>Select Class *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><select name="studClass" id="studClass" onchange="callpage();">
      <option value=""> Select Class</option>
      <?php
					$gstclass="select * from borno_school_set_class where borno_school_id='$schId' AND class_order between 4 AND 5";
					$qgstclass=$mysqli->query($gstclass);
					while($shgstclass=$qgstclass->fetch_assoc()){ $sl++;
				
					$getfClassId=$shgstclass['borno_school_class_id']; 
                    $gstclass1="select * from borno_school_class where borno_school_class_id='$getfClassId'";
                                        $qgstclass1=$mysqli->query($gstclass1);
                                        $shgstclass1=$qgstclass1->fetch_assoc(); 
				?>
      <option value=" <?php echo $shgstclass1['borno_school_class_id']; ?>" <?php if($shgstclass1['borno_school_class_id']==$_REQUEST['studClass']) { echo "selected"; }  ?>> <?php echo $shgstclass1['borno_school_class_name']; ?></option>
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
                                                $gstshift="select * from borno_school_shift";
                                                $qggstshift=$mysqli->query($gstshift);
                                                while($shggstshift=$qggstshift->fetch_assoc()){ $sl++;
                                            
                                            ?>
      <option value=" <?php echo $shggstshift['borno_school_shift_id']; ?>" <?php if($shggstshift['borno_school_shift_id']==$_POST['shiftId']) { echo "selected"; }  ?>> <?php echo $shggstshift['borno_school_shift_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
  <?php
 // $shiftId=$_REQUEST['shiftId'];
			//	echo	$gstsection="select * from borno_school_section where borno_school_class_id='$studClass' AND borno_school_branch_id='$gtfbranchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId'";
  ?>
  <tr>
    <td><strong>Select  Section *</strong></td>
    <td align="center"><strong>:</strong></td>
   
    <td><select name="section" id="section">
      <option value=""> Select </option>
      <?php
                                                
											$gtfbranchId=$_POST['branchId'];
											$shiftId=$_POST['shiftId'];
												
												
                                                $gstsection="select * from borno_school_section where borno_school_class_id='$studClass' AND borno_school_branch_id='$gtfbranchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId'";
                                                $qgstsection=$mysqli->query($gstsection);
                                                while($shggstsection=$qgstsection->fetch_assoc()){ $sl++;
                                            
                                            ?>
      <option value=" <?php echo $shggstsection['borno_school_section_id']; ?>" <?php if($shggstsection['borno_school_section_id']==$_POST['section']) { echo "selected"; }  ?>> <?php echo $shggstsection['borno_school_section_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
  <tr>
    <td><strong>Session *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td>
    <select name="stsess" id="stsess" onchange="callpage();">
      <option value=""> Select </option>
      <option value="2018" <?php if($_POST['stsess']==2018) { echo "selected"; } ?>> 2018 </option>
      <option value="2019" <?php if($_POST['stsess']==2019) { echo "selected"; } ?>> 2019 </option>
      <option value="2020" <?php if($_POST['stsess']==2020) { echo "selected"; } ?>> 2020 </option>
    </select></td>
  </tr>
  <tr>
    <td><strong>Subject  *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><select name="stusubjId" id="stusubjId" onchange="callpage();">
      <option value="">Select</option>
      <?php
			$studClass=$_REQUEST['studClass'];
			$clSess=$_REQUEST['stsess'];
			
			
			$gsubjName="select * from borno_result_subject_voc where borno_school_class_id='$studClass' AND borno_school_session='$clSess' AND borno_school_id='$schId' order by borno_result_subject_voc_id asc";
			$qgsubjName=$mysqli->query($gsubjName);
			while($shgsubjName=$qgsubjName->fetch_assoc()){
		?>
      <option value="<?php echo $shgsubjName['borno_result_subject_voc_id']; ?>" <?php if($shgsubjName['borno_result_subject_voc_id']==$_REQUEST['stusubjId']) { echo "selected"; } ?>> <?php echo $shgsubjName['borno_school_subject_name']; ?></option>
      <?php }?>
    </select></td>
  </tr>
  
  <tr>
    <td><strong>Select Term *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td>
      <select name="selTerm" id="selTerm" onchange="callpage();">
      <option value=""> Select </option>
	  <?php
			$schexterm="select * from borno_result_add_term_voc where borno_school_class_id='$studClass' AND borno_school_session='$clSess' AND borno_school_id='$schId'";
			$qschexterm=$mysqli->query($schexterm);
			while($shschexterm=$qschexterm->fetch_assoc()){
	  ?>
        <option value="<?php echo $shschexterm['borno_result_term_id']; ?>" <?php if($shschexterm['borno_result_term_id']==$_REQUEST['selTerm']) { echo "selected"; } ?>><?php echo $shschexterm['borno_result_term_name']; ?></option>
        
      <?php } ?>  
        
      </select>
    </td>
  </tr>
   <tr>
    <td><strong>Trade *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td>
    <select name="group" id="group" onchange="callpage();">
      <option value=""> Select </option>
<option value="Electrical" <?php if($_POST['group']=='Electrical') { echo "selected";} ?>> Electrical </option>
<option value="Computer" <?php if($_POST['group']=='Computer') { echo "selected";} ?>> Computer </option>
<option value="Building Maintaince" <?php if($_POST['group']=='Building Maintaince') { echo "selected";} ?>> Building Maintaince </option>
<option value="General Mechanix" <?php if($_POST['group']=='General Mechanix') { echo "selected";} ?>> General Mechanix </option>
    </select></td>
  </tr>
  
</table>
<br>
<table width="650" border="0" cellspacing="0" cellpadding="0" align="center" class="projectlist">
  <?php
			$selTerm=$_POST['selTerm'];
			$stusubjId=$_POST['stusubjId'];
			$group=$_POST['group'];
		
	$assnty="select * from borno_result_number_type_voc where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$clSess'";
	$qassnty=$mysqli->query($assnty);
	$shassnty=$qassnty->fetch_assoc();
	
	$gtnumberty1=$shassnty['borno_school_number_type1'];
	$gtnumberty2=$shassnty['borno_school_number_type2'];
	$gtnumberty3=$shassnty['borno_school_number_type3'];
	$gtnumberty4=$shassnty['borno_school_number_type4'];
	$gtnumberty5=$shassnty['borno_school_number_type5'];
	$gtnumberty6=$shassnty['borno_school_number_type6'];
	
 $assnty1="select * from borno_result_subject_details_voc where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$clSess' AND borno_result_term_id='$selTerm' AND borno_result_trade='$group' AND borno_result_subject_id='$stusubjId'";
	$qassnty1=$mysqli->query($assnty1);
	$shassnty1=$qassnty1->fetch_assoc();
	
	$gtnumberty11=$shassnty1['number_type1_marks'];
	$gtnumberty12=$shassnty1['number_type2_marks'];
	$gtnumberty13=$shassnty1['number_type3_marks'];
	$gtnumberty14=$shassnty1['number_type4_marks'];
	$gtnumberty15=$shassnty1['number_type5_marks'];
	$gtnumberty16=$shassnty1['number_type6_marks'];	
  
  ?>
  <tr>
    <td align="center">Name</td>
    <td align="center">Roll</td>
    <td align="center"><?php echo $gtnumberty1; ?> (<?php echo $gtnumberty11; ?>)</td>
    <td align="center"><?php echo $gtnumberty2; ?> (<?php echo $gtnumberty12; ?>)</td>
    <td align="center"><?php echo $gtnumberty3; ?> (<?php echo $gtnumberty13; ?>)</td>
    <td align="center"><?php echo $gtnumberty4; ?> (<?php echo $gtnumberty14; ?>)</td>
    <td align="center"><?php echo $gtnumberty5; ?> (<?php echo $gtnumberty15; ?>)</td>
    <td align="center"><?php echo $gtnumberty6; ?> (<?php echo $gtnumberty16; ?>)</td>
  </tr>
  <?php
  
			$section=$_POST['section'];

	
		$gtctmarg="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$gtfbranchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$clSess' AND borno_school_stud_group='$group' order by borno_school_roll asc";
  
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
			?>
          			<input name="ntype1[]" type="text" id="ntype1[]" size="1">
            <?php } else { ?>  
            <input name="textfield" type="text" disabled id="textfield" size="1">
            <?php } ?>
             
    </td>
    <td align="center">
    	<?php
            	if($gtnumberty2!=""){
			?>
              <input name="ntype2[]" type="text" id="ntype2[]" size="1">
            <?php } else { ?>  
            <input name="textfield" type="text" disabled id="textfield" size="1">
            <?php } ?>
    </td>
    <td align="center">
    	<?php
            	if($gtnumberty3!=""){
			?>
              <input name="ntype3[]" type="text" id="ntype3[]" size="1">
            <?php } else { ?>  
            <input name="textfield" type="text" disabled id="textfield" size="1">
            <?php } ?>
    </td>
    <td align="center">
    	<?php
            	if($gtnumberty4!=""){
			?>
              <input name="ntype4[]" type="text" id="ntype4[]" size="1">
            <?php } else { ?>  
            <input name="textfield" type="text" disabled id="textfield" size="1">
            <?php } ?>
    </td>
    <td align="center">
    		<?php
            	if($gtnumberty5!=""){
			?>
              <input name="ntype5[]" type="text" id="ntype5[]" size="1">
            <?php } else { ?>  
            <input name="textfield" type="text" disabled id="textfield" size="1">
            <?php } ?>
    </td>
    <td align="center">
    		<?php
            	if($gtnumberty6!=""){
			?>
              <input name="ntype6[]" type="text" id="ntype6[]" size="1">
            <?php } else { ?>  
            <input name="textfield" type="text" disabled id="textfield" size="1">
            <?php } ?>
    </td>
  </tr>
  <?php }?>
  <tr>
    <td colspan="8" align="center"><input type="submit" name="button" id="button" value="Save"></td>
    </tr>
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