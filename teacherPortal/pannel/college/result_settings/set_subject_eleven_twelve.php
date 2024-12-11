<?php require_once('result_sett_top.php');?>
<!DOCTYPE html>
<html>
<head>
    <title> :: [Result  Settings]:: </title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <!-- Meta tag -->
    <meta charset="utf-8">
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
</head>
<body>
</script>

<script language="javascript">
	
function callpage()
{
 document.frmcontent.action="set_subject_eleven_twelve.php";
 document.frmcontent.submit();
}						
	
</script> 
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
                  <h2>Set Subject</h2></div>
                <div class="form">
                    <center>
                    	<form name="frmcontent" action="set_subject_eleven_twelve_do.php" method="post" enctype="multipart/form-data">
                        <?php
			$msg=$_GET['msg'];
	 if($msg==3) { echo "You already create 3rd AND 4th Subject"; }
			else if($msg==1) { echo "Set 3rd AND 4th Subject successful "; }
			else if($msg==2) { echo "Failed"; }

 ?>
                        <table style="border: 1px solid #005067;">
                                               
                         <tr>
    <td class="text_table">Select Branch *</td>
    <td><select name="branchId" id="branchId" onchange="callpage();">
      <option value=""> Select Branch </option>
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
    <td class="text_table">Select Class *</td>
    
    <td><select name="studClass" id="studClass" onchange="callpage();">
      <option value=""> Select Class</option>
      <?php
					$gtfbranchId=$_REQUEST['branchId'];
					$getClassId="select * from borno_school_set_class where borno_school_id='$schId' AND borno_school_branch_id='$gtfbranchId' AND class_order between 14 AND 15";
		
		
		$qgetClassId=$mysqli->query($getClassId);
		while($shgetClassId=$qgetClassId->fetch_assoc()){
										
										$getfClassId=$shgetClassId['borno_school_class_id']; 
                                        $gstclass="select * from borno_school_class where borno_school_class_id='$getfClassId'";
                                        $qgstclass=$mysqli->query($gstclass);
                                        $shgstclass=$qgstclass->fetch_assoc(); 
				
				?>
      <option value=" <?php echo $shgstclass['borno_school_class_id']; ?>" <?php if($shgstclass['borno_school_class_id']==$_REQUEST['studClass']) { echo "selected"; }  ?>> <?php echo $shgstclass['borno_school_class_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
  <tr>
    <td class="text_table">Select Shift *</td>
   
    <td><select name="shiftId" id="shiftId" onchange="callpage();">
      <option value=""> Select Shift</option>
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
    <td class="text_table">Select  Section *</td>
     
    <td >
      <select name="section" id="section" onchange="callpage();">
       <option value=""> Select Section</option>
      
        <?php
					$shiftId=$_REQUEST['shiftId'];
					$gstsection="select * from borno_school_section where borno_school_class_id='$studClass' AND borno_school_branch_id='$gtfbranchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId'";
					$qgstsection=$mysqli->query($gstsection);
					while($shggstsection=$qgstsection->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $shggstsection['borno_school_section_id']; ?>" <?php if($shggstsection['borno_school_section_id']==$_REQUEST['section']) { echo "selected"; }  ?>> <?php echo $shggstsection['borno_school_section_name']; ?></option>
      <?php } ?>
      
      
      </select>
      
      </td>
  </tr>

  <tr>
    <td class="text_table">Session *</td>
    <td><select name="stsess" id="stsess" onchange="callpage();">
     <option value=""> Select </option>
             <?php
					$section=$_REQUEST['section'];
					$gstsession="select * from 	borno_student_info where borno_school_class_id='$studClass' AND borno_school_branch_id='$gtfbranchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' group by borno_school_session asc";
					$qgstsession=$mysqli->query($gstsession);
					while($shggstsession=$qgstsession->fetch_assoc()){
				
				?>
				 <option value="<?php echo $shggstsession['borno_school_session']?>" <?php if($shggstsession['borno_school_session']==$_REQUEST['stsess']) { echo "selected"; } ?>> <?php echo $shggstsession['borno_school_session'] ?> </option>
                 
      <?php } ?>
      
            </select>
            
            
            </td>
  </tr>
  <tr>
    <td class="text_table">Department*</td>
    <td><select name="dept" id="dept" onchange="callpage();">
      <option value=""> None </option>
      <option value="1" <?php if($_POST['dept']==1) { echo "selected"; } ?>> Science </option>
      <option value="3" <?php if($_POST['dept']==3) { echo "selected"; } ?>> Humanities </option>
      <option value="2" <?php if($_POST['dept']==2) { echo "selected"; } ?>> Business Studies </option>
    </select></td>
  </tr>
   <tr>
    <td class="text_table">From Roll *</td>
    <td><select name="roll1" id="roll1" onchange="callpage();">
        <option value=""> Select </option>
        <?php
			$stsess=$_POST['stsess'];
			$branchId=$_POST['branchId'];
			$section=$_POST['section'];
			$schexroll="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' order by borno_school_roll asc";
			$qschexroll=$mysqli->query($schexroll);
			while($shschexroll=$qschexroll->fetch_assoc()){
	  ?>
        <option value="<?php echo $shschexroll['borno_school_roll']; ?>" <?php if($shschexroll['borno_school_roll']==$_POST['roll1']) { echo "selected"; } ?>><?php echo $shschexroll['borno_school_roll']; ?></option>
        
        <?php } ?>  
        
        </select></td>
  </tr> 
  <tr>
    <td class="text_table">To Roll *</td>
<td><select name="roll2" id="roll2" onchange="callpage();">
        <option value=""> Select </option>
        <?php
			$stsess=$_POST['stsess'];
			$branchId=$_POST['branchId'];
			$section=$_POST['section'];
			$schexroll="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' order by borno_school_roll asc";
			$qschexroll=$mysqli->query($schexroll);
			while($shschexroll=$qschexroll->fetch_assoc()){
	  ?>
        <option value="<?php echo $shschexroll['borno_school_roll']; ?>" <?php if($shschexroll['borno_school_roll']==$_POST['roll2']) { echo "selected"; } ?>><?php echo $shschexroll['borno_school_roll']; ?></option>
        
        <?php } ?>  
        
        </select></td>
  </tr> 
                        </table>
                       <!--</form>-->
                        <br>
                       <!-- <form name="frmcontent1" action="set_3rd_4th_subject_do.php" method="post" enctype="multipart/form-data">-->
                       
                            <table width="870" border="0" cellspacing="0" cellpadding="0" align="center" class="projectlist">
  <tr>
    <td width="30" align="center">SL</td>
    <td width="40" align="center">Roll</td>
    <td width="200">Student Name</td>
    <td width="150">1st Subject</td>
    <td width="150">2nd Subject</td>
    <td width="150">3rd Subject</td>
    <td width="150">4th Subject</td>
  </tr>
  <?php
	$branchId=$_POST['branchId'];
	$studClass=$_POST['studClass'];
	$shiftId=$_POST['shiftId'];
	$section=$_POST['section'];
	$stsess=trim($_POST['stsess']);
	$dept=$_POST['dept'];
	$roll1=$_POST['roll1'];
	$roll2=$_POST['roll2'];
	
	if($branchId=="") { echo ""; } else {

  
 $getstudinfo="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_school_stud_group='$dept' AND borno_school_roll between '$roll1' AND '$roll2' order by borno_school_roll asc";
  		
		$sll=0;
		
	$qgetstudinfo=$mysqli->query($getstudinfo);
	while($sgetstudinfo=$qgetstudinfo->fetch_assoc()){ $sll++;
  
  ?>
  <tr>
    <td align="center"> <?php echo  $sll; ?> </td>
    <td align="center"><?php echo $sgetstudinfo['borno_school_roll']; ?>
      <input type="hidden" name="studId[]" id="studId[]" value="<?php echo $sgetstudinfo['borno_student_info_id']; ?>" /></td>
    <td><?php echo $sgetstudinfo['borno_school_student_name']; ?>
      <input type="hidden" name="stuName[]" id="stuName[]" value="<?php echo $sgetstudinfo['borno_school_student_name']; ?>" />
      <input type="hidden" name="studroll[]" id="studroll[]" value="<?php echo $sgetstudinfo['borno_school_roll']; ?>" /></td>
    <td width="150">
                  
                  
                   <?php
     	$dept=$_POST['dept'];
     
		if($dept==1){
	 
	 ?>
     
      <select name="firstsub[]" id="firstsub[]">
        <option value=""> Select </option>
        <?php
        
        	$thirtsubj="select * from borno_subject_eleven_twelve where borno_subject_science=1";
			$qthirtsubj=$mysqli->query($thirtsubj);
	        while($shthirtsubj=$qthirtsubj->fetch_assoc()){$sl++;
		?>
        <option value="<?php echo $shthirtsubj['borno_subject_eleven_twelve_id']; ?>"> <?php echo $shthirtsubj['borno_subject_eleven_twelve_name']; ?> </option>
        
        <?php } ?>
        
      </select>
      
      
      <?php
		} else if($dept==2){
	  ?>
      
      <select name="firstsub[]" id="firstsub[]">
        <option value=""> Select </option>
        <?php
        	$thirtsubj="select * from borno_subject_eleven_twelve where borno_subject_business=1";
			$qthirtsubj=$mysqli->query($thirtsubj);
	        while($shthirtsubj=$qthirtsubj->fetch_assoc()){$sl++;
		?>
        <option value="<?php echo $shthirtsubj['borno_subject_eleven_twelve_id']; ?>"> <?php echo $shthirtsubj['borno_subject_eleven_twelve_name']; ?> </option>
        
        <?php } ?>
        
      </select>
      
    <?php } else if($dept==3) {  ?>  
	
			
      <select name="firstsub[]" id="firstsub[]">
        <option value=""> Select </option>
        <?php
        	$thirtsubj="select * from borno_subject_eleven_twelve where borno_subject_humanities=1";
			$qthirtsubj=$mysqli->query($thirtsubj);
	        while($shthirtsubj=$qthirtsubj->fetch_assoc()){$sl++;
		?>
        <option value="<?php echo $shthirtsubj['borno_subject_eleven_twelve_id']; ?>"> <?php echo $shthirtsubj['borno_subject_eleven_twelve_name']; ?> </option>
        
        <?php } ?>
        
      </select>
      
    <?php }  ?>  
                  
     
                  
    </td>
    <td width="150"><select name="secondsub[]" id="secondsub[]">
      <option value=""> Select </option>
      <?php
        	
			if($dept==2) {  
			
			$fourthsubj="select * from borno_subject_eleven_twelve where borno_subject_business=2";
			
			} 
			else if($dept==3) {  
			
			$fourthsubj="select * from borno_subject_eleven_twelve where borno_subject_humanities=1";
			
			} else {
				$fourthsubj="select * from borno_subject_eleven_twelve where borno_subject_science=2";
				}
			
			
			$qfourthsubj=$mysqli->query($fourthsubj);
	        while($shfourthsubj=$qfourthsubj->fetch_assoc()){$sl++;
		?>
      <option value="<?php echo $shfourthsubj['borno_subject_eleven_twelve_id']; ?>"> <?php echo $shfourthsubj['borno_subject_eleven_twelve_name']; ?></option>
      <?php } ?>
      </select></td>
      
       <td width="150"><select name="thirdsub[]" id="thirdsub[]">
      <option value=""> Select </option>
      <?php
        	
			if($dept==2) {  
			
			$fourthsubj="select * from borno_subject_eleven_twelve where borno_subject_business=3";
			
			} 
			else if($dept==3) {  
			
			$fourthsubj="select * from borno_subject_eleven_twelve where borno_subject_humanities=1";
			
			} else {
				$fourthsubj="select * from borno_subject_eleven_twelve where borno_subject_science=3";
				}
			
			
			$qfourthsubj=$mysqli->query($fourthsubj);
	        while($shfourthsubj=$qfourthsubj->fetch_assoc()){$sl++;
		?>
      <option value="<?php echo $shfourthsubj['borno_subject_eleven_twelve_id']; ?>"> <?php echo $shfourthsubj['borno_subject_eleven_twelve_name']; ?></option>
      <?php } ?>
      </select></td>
      
       <td width="150"><select name="fourthsub[]" id="fourthsub[]">
      <option value=""> Select </option>
      <?php
        	
			if($dept==2) {  
			
			if($schId==78){
				$fourthsubj="select * from borno_subject_eleven_twelve where borno_subject_business=3";
				}
			else{
			$fourthsubj="select * from borno_subject_eleven_twelve where borno_subject_business1=4";
			}
			
			} 
			else if($dept==3) {  
			
			$fourthsubj="select * from borno_subject_eleven_twelve where borno_subject_humanities1=1";
			
			} else {
				$fourthsubj="select * from borno_subject_eleven_twelve where borno_subject_science=3";
				}
			
			
			$qfourthsubj=$mysqli->query($fourthsubj);
	        while($shfourthsubj=$qfourthsubj->fetch_assoc()){$sl++;
		?>
 <option value="<?php echo $shfourthsubj['borno_subject_eleven_twelve_id']; ?>"> <?php echo $shfourthsubj['borno_subject_eleven_twelve_name']; ?></option>
      <?php } ?>
      </select></td>
  </tr>
  <?php } } ?>
  <tr>
    <td colspan="7" align="center"><input type="submit" name="button" id="button" value="Save" /></td>
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