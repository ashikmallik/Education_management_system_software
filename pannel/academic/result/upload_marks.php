<?php require_once('result_top.php');?>
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
	 document.frmcontent.action="upload_marks.php";
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
                <a href=""><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2> Upload Marks </h2></div>
                <div class="form">
                <?php
	$msg=$_GET['msg'];
	if($msg==1){	
?>

 <table width="600" border="0" cellspacing="0" cellpadding="0" class="projectlist" align="center">
          <tr>
            <td height="75" style="color:#008000; font-weight:bold; font-size:32px; text-align:center; background:#CCC">  Upload Success </td>
          </tr>
        </table>


<?php
	
   }	else if($msg==3){	
?>

        <table width="600" border="0" cellspacing="0" cellpadding="0" class="projectlist" align="center">
          <tr>
            <td height="75" style="color:#F00; font-weight:bold; font-size:32px; text-align:center; background:#CCC"> Wrong Subject Upload </td>
          </tr>
        </table>


<?php 
	} else if($msg==2){

 ?>
 
       <table width="600" border="0" cellspacing="0" cellpadding="0" class="projectlist" align="center">
          <tr>
            <td height="75" style="color:#F00; font-weight:bold; font-size:32px; text-align:center;background:#CCC"> ! Upload Failed  </td>
          </tr>
        </table>
        

<?php 
	} else if($msg==4){

 ?>
 
       <table width="600" border="0" cellspacing="0" cellpadding="0" class="projectlist" align="center">
          <tr>
            <td height="75" style="color:#F00; font-weight:bold; font-size:32px; text-align:center;background:#CCC"> ! Grading System Not Found  </td>
          </tr>
        </table>
        

 <?php } else { echo ""; } ?>

                    <center>
                    
                         <form name="frmcontent" id="myform" action="upload_marks_do.php" method="post" enctype="multipart/form-data">
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
      <option value=" <?php echo $showdata['borno_school_branch_id']; ?>" <?php if($showdata['borno_school_branch_id']==$_REQUEST['branchId']) { echo "selected"; }  ?>> <?php echo $showdata['borno_school_branch_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
  <tr>
    <td><strong>Select Class *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><select name="studClass" id="studClass" onchange="callpage();">
      <option value=""> Select Class</option>
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
      <option value=""> Select </option>
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
      <option value=""> Select </option>
      <?php
                
											$gtfbranchId=$_REQUEST['branchId'];
											$shiftId=$_REQUEST['shiftId'];
										    echo $section;
												
                                              echo  $gstsection="select * from borno_school_section where borno_school_class_id='$studClass' AND borno_school_branch_id='$gtfbranchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId'";
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
      <option value=""> Select </option>
      <option value="2018" <?php if($_REQUEST['stsess']==2018) { echo "selected"; } ?>> 2018 </option>
      <option value="2019" <?php if($_REQUEST['stsess']==2019) { echo "selected"; } ?>> 2019 </option>
      <option value="2020" <?php if($_REQUEST['stsess']==2020) { echo "selected"; } ?>> 2020 </option>
      <option value="2021" <?php if($_REQUEST['stsess']==2021) { echo "selected"; } ?>> 2021 </option>
      <option value="2022" <?php if($_REQUEST['stsess']==2022) { echo "selected"; } ?>> 2022 </option>
    </select></td>
  </tr>
  <tr>
    <td><strong>Select Term *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td>
      <select name="selTerm" id="selTerm">
      <option value=""> Select </option>
	  <?php
	  			$studClass=$_REQUEST['studClass'];
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
  <tr>
    <td><strong>Subject  *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><select name="stusubjId" id="stusubjId" onchange="callpage();">
      <option value="">Select</option>
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
			$studSetSub="SELECT * FROM `borno_set_subject_six_eight` where borno_school_id ='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$clSess'";
	
	$qstudSetSub = $mysqli->query($studSetSub);
	while($shstudSetSub = $qstudSetSub->fetch_assoc()) {
		
		$getSubjId=$shstudSetSub['subject_id_six_eight'];
			
			$gsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getSubjId' order by subject_id_six_eight asc";
			$qgsubjName=$mysqli->query($gsubjName);
			$shgsubjName=$qgsubjName->fetch_assoc();
		?>
        <option value="<?php echo $shgsubjName['subject_id_six_eight']; ?>" <?php if($shgsubjName['subject_id_six_eight']==$_REQUEST['stusubjId']) { echo "selected"; } ?>> <?php echo $shgsubjName['six_eight_subject_name']; ?></option>
      <?php }}
	  else
	  {
			$gsubjName="select * from borno_result_subject where borno_school_class_id='$studClass' AND borno_school_session='$clSess' AND borno_school_id='$schId'";
			$qgsubjName=$mysqli->query($gsubjName);
			while($shgsubjName=$qgsubjName->fetch_assoc()){
		?>
	    <option value="<?php echo $shgsubjName['borno_result_subject_id']; ?>" <?php if($shgsubjName['borno_result_subject_id']==$_REQUEST['stusubjId']) { echo "selected"; } ?>> <?php echo $shgsubjName['borno_school_subject_name']; ?></option>
      <?php }}?>
    </select></td>
  </tr>
  
  
  <tr>
    <td><strong>Browse CSV</strong> *</td>
    <td align="center"><strong>:</strong></td>
    <td><label for="csv"></label>
      <input type="file" name="csv" id="csv"></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
        <label>
          	<input type="submit" name="Submit" value="Upload" onClick="return contalt_valid()">
            
             <input type="hidden" name="substatus" id="substatus" value="
	  
	   <?php 
	  
	  		$stusubjId=$_REQUEST['stusubjId'];
			$gsubjstatus="select * from borno_result_subject where borno_school_class_id='$studClass' AND borno_school_session='$clSess' AND borno_school_id='$schId' AND borno_result_subject_id='$stusubjId'";
			$qgsubjstatus=$mysqli->query($gsubjstatus);
			$shgsubjstatus=$qgsubjstatus->fetch_assoc();
				
				
			echo $shgsubjstatus['subst'];	
				
	  
	  
	   ?>
      
      
      " />
            
        </label>
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
<!--<script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js"></script>-->
</body>
</html>