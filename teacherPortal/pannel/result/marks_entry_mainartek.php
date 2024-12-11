<?php require_once('result_top.php'); ?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>::[Result]::</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <!-- Meta tag -->
    
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
	 document.frmcontent.action="marks_entry_mainartek.php";
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
             <h3>Average Result</h3>
            <ul>
               <?php
               		require_once('result_bottom.php');
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
                <h3 style="font-size:25px">Result Panel [ <?php echo $shget_schoolName['borno_school_name']; ?> ] </h3>
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
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

<form name="frmcontent" id="myform" action="marks_entry_mainartek_do.php" method="post" enctype="multipart/form-data">
<table width="650" border="0" cellspacing="0" cellpadding="0" class="projectlist" align="center">
  <tr>
    <td width="195"><strong>Select Branch *</strong></td>
    <td width="35" align="center"><strong>:</strong></td>
    <td width="420"><select name="branchId" id="branchId" onchange="callpage();">
      <option value="">--Select--</option>
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
    <td><strong>Select Class *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><select name="studClass" id="studClass" onchange="callpage();">
      <option value="">--Select--</option>
      <?php
					$gstclass="select * from borno_school_set_class where borno_school_id='$schId' order by class_order asc";
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
      <option value="">--Select--</option>
      <?php
                                        $studClass=$_REQUEST['studClass'];
                                                $gstshift="select * from borno_school_shift";
                                                $qggstshift=$mysqli->query($gstshift);
                                                while($shggstshift=$qggstshift->fetch_assoc()){ $sl++;
                                            
                                            ?>
      <option value=" <?php echo $shggstshift['borno_school_shift_id']; ?>" <?php if($shggstshift['borno_school_shift_id']==$_REQUEST['shiftId']) { echo "selected"; }  ?>> <?php echo $shggstshift['borno_school_shift_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>

  <tr>
    <td><strong>Select  Section *</strong></td>
    <td align="center"><strong>:</strong></td>
   
    <td><select name="section" id="section" onchange="callpage();">
      <option value="">--Select--</option>
      <?php
                                                
										$gtfbranchId=$_REQUEST['branchId'];
										$shiftId=$_REQUEST['shiftId'];
												
												
                                                $gstsection="select * from borno_school_section where borno_school_class_id='$studClass' AND borno_school_branch_id='$gtfbranchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId'";
                                                $qgstsection=$mysqli->query($gstsection);
                                                while($shggstsection=$qgstsection->fetch_assoc()){ $sl++;
                                            
                                            ?>
      <option value=" <?php echo $shggstsection['borno_school_section_id']; ?>" <?php if($shggstsection['borno_school_section_id']==$_REQUEST['section']) { echo "selected"; }  ?>> <?php echo $shggstsection['borno_school_section_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
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
    <td><strong>Select Term *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td>
      <select name="selTerm" id="selTerm" onchange="callpage();">
      <option value="">--Select--</option>
	  <?php
	  $clSess=$_REQUEST['stsess'];
			$schexterm="select * from borno_result_add_term where borno_school_class_id='$studClass' AND borno_school_session='$clSess' AND borno_school_id='$schId'";
			$qschexterm=$mysqli->query($schexterm);
			while($shschexterm=$qschexterm->fetch_assoc()){
	  ?>
        <option value="<?php echo $shschexterm['borno_result_term_id']; ?>" <?php if($shschexterm['borno_result_term_id']==$_REQUEST['selTerm']) { echo "selected"; } ?>><?php echo $shschexterm['borno_result_term_name']; ?></option>
        
      <?php } ?>  
        
      </select>
    </td>
  </tr>
  <?php
  
  /*
  $studClass=$_REQUEST['studClass'];
			$clSess=$_REQUEST['stsess'];
  
  echo $gsubjName="select * from borno_set_subject_six_eight where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$clSess' order by subject_id_six_eight asc";
 */
  ?>
  <tr>
    <td><strong>Subject  *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><select name="stusubjId" id="stusubjId" onchange="callpage();">
      <option value="">--Select--</option>
      <?php
			$studClass=$_REQUEST['studClass'];
			$clSess=$_REQUEST['stsess'];
			
			if($studClass==1 OR $studClass==2)
	  		{
			$gsubjName="select * from borno_subject_nine_ten order by borno_subject_nine_ten_id asc";
			$qgsubjName=$mysqli->query($gsubjName);
			while($shgsubjName=$qgsubjName->fetch_assoc()){
		?>
      <option value="<?php echo $shgsubjName['borno_subject_nine_ten_id']; ?>" <?php if($shgsubjName['borno_subject_nine_ten_id']==$_REQUEST['stusubjId']) { echo "selected"; } ?>> <?php echo $shgsubjName['borno_subject_nine_ten_name']; ?></option>
      <?php }} 
	  elseif($studClass==3 OR $studClass==4 OR $studClass==5)
	  		{
		echo	$gsubjName="select * from borno_set_subject_six_eight where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$clSess' order by subject_id_six_eight asc";
			$qgsubjName=$mysqli->query($gsubjName);
			while($shgsubjName=$qgsubjName->fetch_assoc()){
			    
			 $subidno=$shgsubjName['subject_id_six_eight'];
		  $assnty112="select * from borno_subject_six_eight where subject_id_six_eight='$subidno'";
	$qassnty112=$mysqli->query($assnty112);
	$shassnty112=$qassnty112->fetch_assoc();    
			    
			    
		?>
      <option value="<?php echo $shassnty112['subject_id_six_eight']; ?>" <?php if($shassnty112['subject_id_six_eight']==$_REQUEST['stusubjId']) { echo "selected"; } ?>> <?php echo $shassnty112['six_eight_subject_name']; ?></option>
      <?php }} 
	  else
	  		{
			$gsubjName="select * from borno_result_subject where borno_school_class_id='$studClass' AND borno_school_session='$clSess' AND borno_school_id='$schId'";
			$qgsubjName=$mysqli->query($gsubjName);
			while($shgsubjName=$qgsubjName->fetch_assoc()){
		?>
      <option value="<?php echo $shgsubjName['borno_result_subject_id']; ?>" <?php if($shgsubjName['borno_result_subject_id']==$_REQUEST['stusubjId']) { echo "selected"; } ?>> <?php echo $shgsubjName['borno_school_subject_name']; ?></option>
      <?php }} ?>
    </select></td>
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
  
</table>
<br>
<table width="650" border="0" cellspacing="0" cellpadding="0" align="center" class="projectlist">
  <?php
	$assnty="select * from borno_result_number_type where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$clSess'";
	$qassnty=$mysqli->query($assnty);
	$shassnty=$qassnty->fetch_assoc();
	
	$gtnumberty1=$shassnty['borno_school_number_type1'];
	$gtnumberty2=$shassnty['borno_school_number_type2'];
	$gtnumberty3=$shassnty['borno_school_number_type3'];
	$gtnumberty4=$shassnty['borno_school_number_type4'];
	$gtnumberty5=$shassnty['borno_school_number_type5'];
	$gtnumberty6=$shassnty['borno_school_number_type6'];
	
  	
  	$selTerm=$_POST['selTerm'];
  	$stusubjId=$_POST['stusubjId'];
  	
  	if($studClass==1 OR $studClass==2)
	{
  $assnty1="select * from borno_result_nine_ten_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$clSess' AND borno_result_term_id='$selTerm' AND borin_subject_nine_ten_id='$stusubjId'";
	$qassnty1=$mysqli->query($assnty1);
	$shassnty1=$qassnty1->fetch_assoc();
	
	$gtnumberty11=$shassnty1['number_type1_marks'];
	$gtnumberty12=$shassnty1['number_type2_marks'];
	$gtnumberty13=$shassnty1['number_type3_marks'];
	$gtnumberty14=$shassnty1['number_type4_marks'];
	$gtnumberty15=$shassnty1['number_type5_marks'];
	$gtnumberty16=$shassnty1['number_type6_marks'];
	}
	elseif($studClass==3 OR $studClass==4 OR $studClass==5)
	{
  $assnty1="select * from borno_result_six_eight_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$clSess' AND borno_result_term_id='$selTerm' AND subject_id_six_eight='$stusubjId'";
	$qassnty1=$mysqli->query($assnty1);
	$shassnty1=$qassnty1->fetch_assoc();
	
	$gtnumberty11=$shassnty1['number_type1_marks'];
	$gtnumberty12=$shassnty1['number_type2_marks'];
	$gtnumberty13=$shassnty1['number_type3_marks'];
	$gtnumberty14=$shassnty1['number_type4_marks'];
	$gtnumberty15=$shassnty1['number_type5_marks'];
	$gtnumberty16=$shassnty1['number_type6_marks'];
	}
	else
	{
  $assnty1="select * from borno_result_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$clSess' AND borno_result_term_id='$selTerm' AND borno_result_subject_id='$stusubjId'";
	$qassnty1=$mysqli->query($assnty1);
	$shassnty1=$qassnty1->fetch_assoc();
	
	$gtnumberty11=$shassnty1['number_type1_marks'];
	$gtnumberty12=$shassnty1['number_type2_marks'];
	$gtnumberty13=$shassnty1['number_type3_marks'];
	$gtnumberty14=$shassnty1['number_type4_marks'];
	$gtnumberty15=$shassnty1['number_type5_marks'];
	$gtnumberty16=$shassnty1['number_type6_marks'];
	}	
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
			$selTerm=$_POST['selTerm'];
			$stusubjId=$_POST['stusubjId'];
			$group=$_POST['group'];
		
		if($gtnumberty11!=""){
		if($studClass==1 OR $studClass==2)
	  		{	
	  	if($group==""){	    
		$gtctmarg="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$gtfbranchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$clSess' order by borno_school_roll asc";
	  	}
	  	else{
		$gtctmarg="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$gtfbranchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$clSess' AND borno_school_stud_group='$group' order by borno_school_roll asc";	  	    
	  	}
  	$sal=0;
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ $sal++
  
  
  ?>
  <tr>
    <td><?php echo $shgtctmarg['borno_school_student_name']; ?>
      <input type="hidden" name="stuName[]" id="stuName[]" value="<?php echo $shgtctmarg['borno_school_student_name']; ?>"/></td>
    <td align="center"><?php echo $shgtctmarg['borno_school_roll']; ?>
      <input type="hidden" name="stuRoll[]" id="stuRoll[]" value="<?php echo $shgtctmarg['borno_school_roll']; ?>" />
      <input type="hidden" name="studId[]" id="studId[]" value="<?php echo $shgtctmarg['borno_student_info_id']; ?>" /></td>
    <td align="center">
    		
          			<input name="ntype1[]" type="text" id="ntype1[]" size="1" tabindex=<?php echo $sal; ?> value="0">
           
             
    </td>
    <td align="center">
    	
              <input name="ntype2[]" type="text" id="ntype2[]" size="1" tabindex=<?php echo $sal+250; ?> value="0">
           
    </td>
    <td align="center">
    	
              <input name="ntype3[]" type="text" id="ntype3[]" size="1" tabindex=<?php echo $sal+500; ?> value="0">
           
    </td>
    <td align="center">
    	
              <input name="ntype4[]" type="text" id="ntype4[]" size="1" tabindex=<?php echo $sal+1000; ?> value="0">
            
    </td>
    <td align="center">
    	
              <input name="ntype5[]" type="text" id="ntype5[]" size="1" tabindex=<?php echo $sal+1250; ?> value="0">
           
    </td>
    <td align="center">
    		
              <input name="ntype6[]" type="text" id="ntype6[]" size="1" tabindex=<?php echo $sal+1500; ?> value="0"> 
           
    </td>
  </tr>
  <?php }} 
  elseif($studClass==3 OR $studClass==4 OR $studClass==5)
	  		{	
		$gtctmarg="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$gtfbranchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$clSess' order by borno_school_roll asc";
  $sl=0;
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){$sl++;
  
  
  ?>
  <tr>
    <td><?php echo $shgtctmarg['borno_school_student_name']; ?>
      <input type="hidden" name="stuName[]" id="stuName[]" value="<?php echo $shgtctmarg['borno_school_student_name']; ?>" /></td>
       <td align="center"><?php echo $shgtctmarg['borno_school_roll']; ?>
      <input type="hidden" name="stuRoll[]" id="stuRoll[]" value="<?php echo $shgtctmarg['borno_school_roll']; ?>" />
      <input type="hidden" name="studId[]" id="studId[]" value="<?php echo $shgtctmarg['borno_student_info_id']; ?>" /></td>
    <td align="center">
    	
          			<input name="ntype1[]" type="text" id="ntype1[]" size="1" tabindex=<?php echo $sl; ?> value="0">
           
             
    </td>
    <td align="center">
    	
              <input name="ntype2[]" type="text" id="ntype2[]" size="1" tabindex=<?php echo $sl+250; ?> value="0">
            
    </td>
    <td align="center">
    	
              <input name="ntype3[]" type="text" id="ntype3[]" size="1" tabindex=<?php echo $sl+500; ?> value="0">
            
    </td>
    <td align="center">
    	
              <input name="ntype4[]" type="text" id="ntype4[]" size="1" tabindex=<?php echo $sl+750; ?> value="0">
           
    </td>
    <td align="center">
    		
              <input name="ntype5[]" type="text" id="ntype5[]" size="1" tabindex=<?php echo $sl+1000; ?> value="0">
           
    </td>
    <td align="center">
    		
              <input name="ntype6[]" type="text" id="ntype6[]" size="1" tabindex=<?php echo $sl+1300; ?> value="0">
           
    </td>
  </tr>
  <?php }} else
  {	
		$gtctmarg="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$gtfbranchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$clSess' order by borno_school_roll asc";
  	$sbl=0;
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ $sbl++;
  
  
  ?>
  <tr>
    <td><?php echo $shgtctmarg['borno_school_student_name']; ?>
      <input type="hidden" name="stuName[]" id="stuName[]" value="<?php echo $shgtctmarg['borno_school_student_name']; ?>" /></td>
    <td align="center"><?php echo $shgtctmarg['borno_school_roll']; ?>
      <input type="hidden" name="stuRoll[]" id="stuRoll[]" value="<?php echo $shgtctmarg['borno_school_roll']; ?>" />
      <input type="hidden" name="studId[]" id="studId[]" value="<?php echo $shgtctmarg['borno_student_info_id']; ?>" /></td>
    <td align="center">
    		
          			<input name="ntype1[]" type="text" id="ntype1[]" size="1" tabindex=<?php echo $sbl; ?> value="0">
           
             
    </td>
    <td align="center">
    	
              <input name="ntype2[]" type="text" id="ntype2[]" size="1" tabindex=<?php echo $sbl+250; ?> value="0">
           
    </td>
    <td align="center">
    	
              <input name="ntype3[]" type="text" id="ntype3[]" size="1" tabindex=<?php echo $sbl+500; ?> value="0">
          
    </td>
    <td align="center">
    	
              <input name="ntype4[]" type="text" id="ntype4[]" size="1" tabindex=<?php echo $sbl+750; ?> value="0">
          
    </td>
    <td align="center">
    		
              <input name="ntype5[]" type="text" id="ntype5[]" size="1" tabindex=<?php echo $sbl+1000; ?> value="0">
           
    </td>
    <td align="center">
    		
              <input name="ntype6[]" type="text" id="ntype6[]" size="1" tabindex=<?php echo $sbl+1500; ?> value="0">
           
    </td>
  </tr>
  <?php }} } ?>
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