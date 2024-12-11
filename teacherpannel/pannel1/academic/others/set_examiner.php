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
    
    <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
    	<script type="text/javascript">
    	$(document).ready(function(){
    		$(".check").change(function(){
    			if($(this).is(':checked')) {
                    $(this).closest('tr').find('.textVal').val($(this).val());
                } else {
                    $(this).closest('tr').find('.textVal').val('');
                }

                var total = 0;
                $(".textVal").each(function(i,j){
                    if(!isNaN(parseFloat($(this).val()))) {
                        total += parseFloat($(this).val());
                    }
                });
                $('#totalDiv').html(total);
    		});
    	});
</script>   
    
          <link rel="stylesheet" href="../student/datCss/jquery-ui.css">
    <link rel="stylesheet" href="../student/datCss/jquery-ui1.css">
    <link rel="stylesheet" href="../student/datCss/style.css">
    <script src="../student/datCss/jquery-1.12.4.js"></script>
    <script src="../student/datCss/jquery-ui.js"></script>
    <script src="../student/datCss/jquery-ui1.js"></script>
    
   <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
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
	 document.frmcontent.action="set_examiner.php";
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
                <h3>Result Settings [ <?php echo $shget_schoolName['borno_teacher_name']; ?> ] </h3>
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2> Set Examiner</h2></div>
                <div class="form">
               
<?php
	$msg=$_GET['msg'];
	if($msg==1){	
?>

 <table width="600" border="0" cellspacing="0" cellpadding="0" class="projectlist" align="center">
          <tr>
            <td height="75" style="color:#008000; font-weight:bold; font-size:32px; text-align:center; background:#CCC">Set Examiner Successfull </td>
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
            <td height="75" style="color:#F00; font-weight:bold; font-size:32px; text-align:center; background:#CCC"> Failed </td>
          </tr>
        </table>


<?php } else { echo ""; } ?>
 
      

 

       

<br>

<form name="frmcontent" id="myform" action="set_examiner_do.php" method="post" enctype="multipart/form-data">
<table width="650" border="0" cellspacing="0" cellpadding="0" class="projectlist" align="center">
  <tr>
    <td width="195"><strong>Branch *</strong></td>
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
    <td><strong> Class *</strong></td>
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
    <td><strong> Shift *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td>
      <?php
					$gstclass123="select * from borno_set_class_teacher where borno_school_teacher_id='$stdid'";
					$qgstclass123=$mysqli->query($gstclass123);
					$shgstclass123=$qgstclass123->fetch_assoc();
				    $shift=$shgstclass123['borno_school_shift_id'];
				    
			
                    $gstclass133="select * from borno_school_shift where borno_school_shift_id='$shift'";
                                $qgstclass133=$mysqli->query($gstclass133);
                                $shgstclass133=$qgstclass133->fetch_assoc(); 
				?>
<input type="text" name="shiftid1"  id="shiftid1" value="<?php echo $shgstclass133['borno_school_shift_name']; ?>" size="24">
    <input type="hidden" name="shiftid"  id="shiftid" value="<?php echo $shgstclass123['borno_school_shift_id']; ?>" size="24">				
     </td>
  </tr>

  <tr>
    <td><strong>  Section *</strong></td>
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

 
 
  
   
  
</table>
<br>
<table width="650" border="0" cellspacing="0" cellpadding="0" align="center" class="projectlist">

  <tr>
    <td colspan="4" align="center">Subject Name</td>
    <td colspan="4" align="center">Teacher Name</td>
   
  </tr>
  <?php
  
			
			$selTerm=$_POST['selTerm'];
			$stusubjId=$_POST['stusubjId'];
			$group=$_POST['group'];
	
	$gstclassshift11="select * from borno_set_class_teacher where borno_school_teacher_id='$stdid'";
	$qgstclassshift11=$mysqli->query($gstclassshift11);
	$shgstclassshift11=$qgstclassshift11->fetch_assoc();       
	$studClass=$shgstclassshift11['borno_school_class_id']; 
	$clSess=$shgstclassshift11['borno_school_session'];			
	$schId=$shgstclassshift11['borno_school_id'];
	$shiftId=$shgstclassshift11['borno_school_shift_id'];
	$gtfbranchId=$shgstclassshift11['borno_school_branch_id'];
	$section=$shgstclassshift11['borno_school_section_id'];				
		if($studClass==1 OR $studClass==2)
	  		{	

		$gtctmarg="select * from borno_subject_nine_ten order by borno_subject_nine_ten_id asc";

  	$sal=0;
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ $sal++
  
  
  ?>
 <tr>
    <td colspan="4"><?php echo $shgtctmarg['borno_subject_nine_ten_name']; ?>
      <input type="hidden" name="stuName[]" id="stuName[]" value="<?php echo $shgtctmarg['borno_subject_nine_ten_id']; ?>" />
            <input type="hidden" name="stuRoll[]" id="stuRoll[]" value="<?php echo $shgtctmarg['borno_subject_nine_ten_id']; ?>" /></td>
    <td colspan="4" align="center">
 <select name="teacherid[]" id="teacherid[]">
      <option value=""> --Select-- </option>
		  <?php

                        $gstteacher="select * from borno_teacher_info where borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_branch_id='$gtfbranchId'";
                        $qgstteacher=$mysqli->query($gstteacher);
                        while($shgstteacher=$qgstteacher->fetch_assoc()){ $sl++;				
         ?>
        <option value=" <?php echo $shgstteacher['borno_teacher_info_id']; ?>" <?php if($shgstteacher['borno_teacher_info_id']==$_REQUEST['teacherid']) { echo "selected"; }  ?>> <?php echo $shgstteacher['borno_teacher_name']; ?></option>
        
        <?php } ?>
        
      </select>
</td>
   
  </tr>
  <?php }} 
  elseif($studClass==3 OR $studClass==4 OR $studClass==5)
	  		{	
		$gtctmarg="select * from borno_set_subject_six_eight where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$clSess' order by subject_id_six_eight asc";
  $sl=0;
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){$sl++;
  	 $subidno=$shgtctmarg['subject_id_six_eight'];
  	$assnty112="select * from borno_subject_six_eight where subject_id_six_eight='$subidno'";
	$qassnty112=$mysqli->query($assnty112);
	$shassnty112=$qassnty112->fetch_assoc(); 
  
  ?>
  <tr>
    <td colspan="4"><?php echo $shassnty112['six_eight_subject_name']; ?>
      <input type="hidden" name="stuName[]" id="stuName[]" value="<?php echo $shgtctmarg['subject_id_six_eight']; ?>" />
            <input type="hidden" name="stuRoll[]" id="stuRoll[]" value="<?php echo $shgtctmarg['subject_id_six_eight']; ?>" /></td>
    <td colspan="4" align="center">
 <select name="teacherid[]" id="teacherid[]">
      <option value=""> --Select-- </option>
		  <?php

                        $gstteacher="select * from borno_teacher_info where borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_branch_id='$gtfbranchId'";
                        $qgstteacher=$mysqli->query($gstteacher);
                        while($shgstteacher=$qgstteacher->fetch_assoc()){ $sl++;				
         ?>
        <option value=" <?php echo $shgstteacher['borno_teacher_info_id']; ?>" <?php if($shgstteacher['borno_teacher_info_id']==$_REQUEST['teacherid']) { echo "selected"; }  ?>> <?php echo $shgstteacher['borno_teacher_name']; ?></option>
        
        <?php } ?>
        
      </select>
</td>
   
  </tr>
  <?php }} else
  {	
		$gtctmarg="select * from borno_result_subject where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$clSess' order by borno_result_subject_id asc";
  	$sbl=0;
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ $sbl++;
  
  
  ?>
  <tr>
    <td colspan="4"><?php echo $shgtctmarg['borno_school_subject_name']; ?>
      <input type="hidden" name="stuName[]" id="stuName[]" value="<?php echo $shgtctmarg['borno_result_subject_id']; ?>" />
            <input type="hidden" name="stuRoll[]" id="stuRoll[]" value="<?php echo $shgtctmarg['borno_result_subject_id']; ?>" /></td>
    <td colspan="4" align="center">
 <select name="teacherid[]" id="teacherid[]">
      <option value=""> --Select-- </option>
		  <?php

                        $gstteacher="select * from borno_teacher_info where borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_branch_id='$gtfbranchId'";
                        $qgstteacher=$mysqli->query($gstteacher);
                        while($shgstteacher=$qgstteacher->fetch_assoc()){ $sl++;				
         ?>
        <option value=" <?php echo $shgstteacher['borno_teacher_info_id']; ?>" <?php if($shgstteacher['borno_teacher_info_id']==$_REQUEST['teacherid']) { echo "selected"; }  ?>> <?php echo $shgstteacher['borno_teacher_name']; ?></option>
        
        <?php } ?>
        
      </select>
</td>
   
  </tr>
  <?php }}?>
  <tr>
    <td colspan="8" align="center"><input type="submit" name="button" id="button" value="Set"></td>
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