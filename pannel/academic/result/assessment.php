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
	 document.frmcontent.action="assessment.php";
	 document.frmcontent.submit();
	}
	
	
	
</script>
    
    
</head>
<body>

<div class="wrapper">
    <div class="side_main_menu">
        <div class="top_part_menu">
            <h3>Result Panel</h3>
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
                  <h2>  Summative Assessment</h2></div>
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

<form name="frmcontent" id="myform" action="download_assessment.php" method="post"  enctype="multipart/form-data">
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
					$gstclass="select * from borno_school_set_class where borno_school_class_id IN (4,5) AND borno_school_id='$schId'  order by class_order asc";
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
      <option value="2022" <?php if($_REQUEST['stsess']==2022) { echo "selected"; } ?>> 2022 </option>
    <option value="2023" <?php if($_REQUEST['stsess']==2023) { echo "selected"; } ?>> 2023 </option>
      <option value="2024" <?php if($_REQUEST['stsess']==2024) { echo "selected"; } ?>> 2024 </option>
      <option value="2025" <?php if($_REQUEST['stsess']==2025) { echo "selected"; } ?>> 2025 </option>
      
    </select></td>
  </tr>
  

  <tr>
    <td><strong>Subject  *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><select name="stusubjId" id="stusubjId" onchange="callpage();">
      <option value="">--Select--</option>
      <?php
			$studClass=$_REQUEST['studClass'];
			$stsess=$_REQUEST['stsess'];
			

		echo	$gsubjName="select * from summetive_subject_table";
			$qgsubjName=$mysqli->query($gsubjName);
			while($shgsubjName=$qgsubjName->fetch_assoc()){
			    
			 $subidno=$shgsubjName['subject_id'];
		  $assnty112="select * from `summetive_subject_table` where subject_id='$subidno'";
	$qassnty112=$mysqli->query($assnty112);
	$shassnty112=$qassnty112->fetch_assoc();    
			    
			    
		?>
      <option value="<?php echo $shassnty112['subject_id']; ?>" <?php if($shassnty112['subject_id']==$_REQUEST['stusubjId']) { echo "selected"; } ?>> <?php echo $shassnty112['subject_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
  
   <tr>
    <td colspan="8" align="center">
        <input type="hidden" name="schId" id="schId" value="<?php echo $schId; ?>">
        <input type="submit" name="button" id="button" target="_blank" value="Download"></td>
    </tr>
       <tr>
        <?php
        $section = $_REQUEST['section'];
        $stusubjId = $_REQUEST['stusubjId'];
        $stsess = trim($_REQUEST['stsess']);
        ?>   
        <td colspan="8" align="center"><a href="subject_assesment.php?schId=<?php echo $schId; ?>&studClass=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&section=<?php echo $section; ?>&stsess=<?php echo $stsess; ?>&stusubjId=<?php echo $stusubjId; ?>" target="_blank">Subject Assessment Transcript</a></td>
            </tr>
            <tr>
        <td colspan="8" align="center"><a href="download_behavioral_transcript.php?schId=<?php echo $schId; ?>&studClass=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&section=<?php echo $section; ?>&stsess=<?php echo $stsess; ?>" target="_blank">Behavioral Transcript</a></td>
        
    </tr>
  <tr>
        <td colspan="8" align="center"><a href="performance_indicator.php?schId=<?php echo $schId; ?>&studClass=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&section=<?php echo $section; ?>&stsess=<?php echo $stsess; ?>" target="_blank">Performance Indicator</a></td>
        
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