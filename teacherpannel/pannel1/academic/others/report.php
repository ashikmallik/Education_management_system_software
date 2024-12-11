<?php require_once('result_sett_top.php'); ?>
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
		
		if(document.frmcontent.selTerm.value=="")
		{
			alert("Please Select Term");
			document.frmcontent.selTerm.focus();
			return (false);
		}
		
	
	}
	
	
	function callpage()
	{
	 document.frmcontent.action="report.php";
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
    
        </div>
        <div class="fixed_logo">
            <a href=""><img src="../assets/images/logo.jpg" class="img-fluid"></a>
        </div>
    </div><!-- side bar end -->

    <div class="ot_main_content">
        <div class="admin_logout">
            <div class="admin_head">
                <h3>Others Panel [ <?php echo $shget_schoolName['borno_teacher_name']; ?> ] </h3>
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>  Report </h2></div>
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

<form name="frmcontent" id="myform" action="download_report.php" method="post" enctype="multipart/form-data">
<table width="650" border="0" cellspacing="0" cellpadding="0" class="projectlist" align="center">
  <tr>
    <td width="195"><strong>Select Branch *</strong></td>
    <td width="35" align="center"><strong>:</strong></td>
    <td width="420">
      <?php
    $data="select * from borno_school_class_routine where borno_school_teacher_id='$stdid'";
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
    <td><select name="studClass" id="studClass" onchange="callpage();">
      <option value=""> Select Class</option>
      <?php
					$gstclass="select * from borno_school_class_routine where borno_school_teacher_id='$stdid' group by borno_school_class_id asc";
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
    <td><strong>Select  Section *</strong></td>
    <td align="center"><strong>:</strong></td>
   
    <td><select name="section" id="section" onchange="callpage();">
      <option value=""> Select </option>
      <?php
                                        $studClass=$_REQUEST['studClass'];               
			$gstclassshift="select * from borno_school_class_routine where borno_school_teacher_id='$stdid' AND borno_school_class_id='$studClass' group by borno_school_section_id asc";
					$qgstclassshift=$mysqli->query($gstclassshift);
					while($shgstclassshift=$qgstclassshift->fetch_assoc()){ $sl++;       
					$getfsection=$shgstclassshift['borno_school_section_id']; 
												
    $gstsection="select * from borno_school_section where borno_school_section_id='$getfsection'";
            $qgstsection=$mysqli->query($gstsection);
            $shggstsection=$qgstsection->fetch_assoc();
                                            
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
      <option value="2019" <?php if($_REQUEST['stsess']==2019) { echo "selected"; } ?>> 2019 </option>
      <option value="2020" <?php if($_REQUEST['stsess']==2020) { echo "selected"; } ?>> 2020 </option>
    </select></td>
  </tr>
  
   <tr>
    <td><strong>Subject  *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><select name="stusubjId" id="stusubjId" onchange="callpage();">
      <option value="">Select</option>
      <?php
			$studClass=$_REQUEST['studClass'];
			$section=$_REQUEST['section'];
			$clSess=$_REQUEST['stsess'];
			
			if($studClass==1 OR $studClass==2)
	  		{
	$gstclassshift="select * from borno_school_class_routine where borno_school_teacher_id='$stdid' AND borno_school_class_id='$studClass' AND borno_school_section_id='$section' AND borno_school_session='$clSess' group by borno_school_subject_id asc";
			$qgstclassshift=$mysqli->query($gstclassshift);
			while($shgstclassshift=$qgstclassshift->fetch_assoc()){ $sl++;      
			$getfsubject=$shgstclassshift['borno_school_subject_id'];	  		    
	  		    
			$gsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getfsubject'";
			$qgsubjName=$mysqli->query($gsubjName);
			$shgsubjName=$qgsubjName->fetch_assoc();
		?>
      <option value="<?php echo $shgsubjName['borno_subject_nine_ten_id']; ?>" <?php if($shgsubjName['borno_subject_nine_ten_id']==$_REQUEST['stusubjId']) { echo "selected"; } ?>> <?php echo $shgsubjName['borno_subject_nine_ten_name']; ?></option>
      <?php }} 
	  elseif($studClass==3 OR $studClass==4 OR $studClass==5)
	  		{
	$gstclassshift="select * from borno_school_class_routine where borno_school_teacher_id='$stdid' AND borno_school_class_id='$studClass' AND borno_school_section_id='$section' AND borno_school_session='$clSess' group by borno_school_subject_id asc";
			$qgstclassshift=$mysqli->query($gstclassshift);
			while($shgstclassshift=$qgstclassshift->fetch_assoc()){ $sl++;      
			$getfsubject=$shgstclassshift['borno_school_subject_id'];	  		    

		  $assnty112="select * from borno_subject_six_eight where subject_id_six_eight='$getfsubject'";
	$qassnty112=$mysqli->query($assnty112);
	$shassnty112=$qassnty112->fetch_assoc();    
			    
			    
		?>
      <option value="<?php echo $shassnty112['subject_id_six_eight']; ?>" <?php if($shassnty112['subject_id_six_eight']==$_REQUEST['stusubjId']) { echo "selected"; } ?>> <?php echo $shassnty112['six_eight_subject_name']; ?></option>
      <?php }} 
	  else
	  		{
	$gstclassshift="select * from borno_school_class_routine where borno_school_teacher_id='$stdid' AND borno_school_class_id='$studClass' AND borno_school_section_id='$section' AND borno_school_session='$clSess' group by borno_school_subject_id asc";
			$qgstclassshift=$mysqli->query($gstclassshift);
			while($shgstclassshift=$qgstclassshift->fetch_assoc()){ $sl++;      
			$getfsubject=$shgstclassshift['borno_school_subject_id'];	  
			
		$gsubjName="select * from borno_result_subject where  borno_result_subject_id='$getfsubject'";
			$qgsubjName=$mysqli->query($gsubjName);
			$shgsubjName=$qgsubjName->fetch_assoc();
		?>
      <option value="<?php echo $shgsubjName['borno_result_subject_id']; ?>" <?php if($shgsubjName['borno_result_subject_id']==$_REQUEST['stusubjId']) { echo "selected"; } ?>> <?php echo $shgsubjName['borno_school_subject_name']; ?></option>
      <?php }} ?>
    </select></td>
  </tr>
   <tr>
    <td><strong>Select Type *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td>
      <select name="type" id="type" onchange="callpage();">
      <option value=""> Select </option>
      <option value="1" <?php if($_POST['type']==1) { echo "selected"; } ?> > CT </option>
      <option value="2" <?php if($_POST['type']==2) { echo "selected"; } ?> > Diary </option> 
      <option value="3" <?php if($_POST['type']==3) { echo "selected"; } ?> > Assignment </option>         
      
      </select>
    </td>
  </tr>
  
   <tr>
    <td colspan="3" align="center"><input type="submit" formtarget="_blank" name="button" id="button" value="Show" onClick="return contalt_valid()" ></td>
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