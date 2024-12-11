<?php
ob_start();
include('../../../connection.php');

$schId=$_GET['schId'];
$gtfbranchId=$_GET['gtfbranchId'];
$shiftId=$_GET['shiftId'];


	$branchName="select * from borno_school_branch where borno_school_branch_id='$gtfbranchId'";
	$qbranchName=$mysqli->query($branchName);
	$shbranchName=$qbranchName->fetch_assoc();
	
	$gtschbranchName=$shbranchName['borno_school_branch_name'];
	
		
	$schshift="select * from borno_school_shift where borno_school_shift_id='$shiftId'";
	$qschshift=$mysqli->query($schshift);
	$shschshift=$qschshift->fetch_assoc();
	
	$gtschshiftname=$shschshift['borno_school_shift_name'];
	
	
	$gtscnmlogo="select * from borno_school where borno_school_id='$schId'";
	$qgtscnmlogo=$mysqli->query($gtscnmlogo);
	$shgtscnmlogo=$qgtscnmlogo->fetch_assoc();
	
	$gtschoolName=$shgtscnmlogo['borno_school_name'];
	



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>  </title>

<style>
.projectlist {
    border-left: 1px solid #2b032a;
    border-top: 1px solid #2b032a;
}
.projectlist th {
    background-color: #2b032a;
    border-bottom: 1px solid #2b032a;
    border-right: 1px solid #2b032a;
    color: #420000;
    font-size: 12px;
    height: 30px;
    text-align: center;
}
.projectlist td {
    border-bottom: 1px solid #2b032a;
    border-right: 1px solid #2b032a;
    padding: 1px;
}




</style>
</head>

<body>

<table width="1040" border="0" cellspacing="0" cellpadding="0" style="border:2px #2b032a solid" align="center">
  <tr>
    <td>



<table width="1024" border="0" cellspacing="0" cellpadding="0" align="center">
<tr>
    <td align="center" style="font-size:26px; font-family:Arial, Helvetica, sans-serif">
    	

<button onclick="myFunction()">Print this page</button>

<script>
function myFunction() {
    window.print();
}
</script>
    </td>
  </tr>
  <tr>
    <td align="center" style="font-size:32px; font-family:Arial, Helvetica, sans-serif">
    	<i><?php echo $gtschoolName; ?></i>
    </td>
  </tr>
  <tr>
    <td align="center" style="font-size:22px; font-family:Arial, Helvetica, sans-serif">
    	<i>School Routine</i>
    </td>
  </tr>
   <tr>
    <td>&nbsp;
    	
    </td>
  </tr>
  <tr>
    <td>
                <table width="354" border="0" cellspacing="0" cellpadding="0" align="center">
                  <tr>
                    <td width="114"><em>Branch</em></td>
                    <td width="24" align="center">:</td>
                    <td width="216">
                    		<i><?php echo $gtschbranchName; ?></i>
                    </td>
                  </tr>
                  
                    <tr>
                    <td><em>Shift</em></td>
                    <td align="center">:</td>
                    <td><i><?php echo $gtschshiftname; ?></i></td>
                  </tr>

                </table>

    </td>
  </tr>
  <tr>
    <td>&nbsp;
    	
    </td>
  </tr>
</table>




			<table width="895" border="0" cellspacing="0" cellpadding="0" align="center" class="projectlist">
  <tr>
    <td width="81" align="center"><strong>Day/Period</strong></td>
    <td width="120" align="center"><strong>First</strong></td>
    <td width="120" align="center"><strong>Second </strong></td>
    <td width="120" align="center"><strong>Third</strong></td>
    <td width="120" align="center"><strong>Four</strong></td>
    <td width="120" align="center"><strong>Five </strong></td>
    <td width="120" align="center"><strong>Six</strong></td>
    <td width="120" align="center"><strong>Seven</strong></td>
    <td width="120" align="center"><strong>Eight</strong></td>
    </tr>
 
  <tr>
    <td>
		Saturday
    
    </td>
    <td>
	   <?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND borno_school_routine_day=1";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub1'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass1'];	
			$getsecId= $stgetdata['borno_school_routine_studSection1'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?>
    
    </td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=1";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub2'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass2'];	
			$getsecId= $stgetdata['borno_school_routine_studSection2'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
   <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=1";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub3'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass3'];	
			$getsecId= $stgetdata['borno_school_routine_studSection3'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=1";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub4'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass4'];	
			$getsecId= $stgetdata['borno_school_routine_studSection4'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
   <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=1";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub5'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass5'];	
			$getsecId= $stgetdata['borno_school_routine_studSection5'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=1";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub6'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass6'];	
			$getsecId= $stgetdata['borno_school_routine_studSection6'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
   <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=1";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub7'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass7'];	
			$getsecId= $stgetdata['borno_school_routine_studSection7'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
      <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=1";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub8'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass8'];	
			$getsecId= $stgetdata['borno_school_routine_studSection8'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
    </tr>
  <tr>
    <td>Sunday</td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=2";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub1'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass1'];	
			$getsecId= $stgetdata['borno_school_routine_studSection1'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=2";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub2'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass2'];	
			$getsecId= $stgetdata['borno_school_routine_studSection2'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=2";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub3'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass3'];	
			$getsecId= $stgetdata['borno_school_routine_studSection3'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=2";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub4'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass4'];	
			$getsecId= $stgetdata['borno_school_routine_studSection4'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=2";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub5'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass5'];	
			$getsecId= $stgetdata['borno_school_routine_studSection5'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=2";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub6'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass6'];	
			$getsecId= $stgetdata['borno_school_routine_studSection6'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=2";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub7'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass7'];	
			$getsecId= $stgetdata['borno_school_routine_studSection7'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=2";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub8'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass8'];	
			$getsecId= $stgetdata['borno_school_routine_studSection8'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
  </tr>
<tr>
<td>Monday</td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=3";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub1'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass1'];	
			$getsecId= $stgetdata['borno_school_routine_studSection1'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=3";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub2'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass2'];	
			$getsecId= $stgetdata['borno_school_routine_studSection2'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=3";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub3'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass3'];	
			$getsecId= $stgetdata['borno_school_routine_studSection3'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=3";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub4'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass4'];	
			$getsecId= $stgetdata['borno_school_routine_studSection4'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=3";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub5'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass5'];	
			$getsecId= $stgetdata['borno_school_routine_studSection5'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=3";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub6'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass6'];	
			$getsecId= $stgetdata['borno_school_routine_studSection6'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=3";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub7'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass7'];	
			$getsecId= $stgetdata['borno_school_routine_studSection7'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=3";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub8'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass8'];	
			$getsecId= $stgetdata['borno_school_routine_studSection8'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
</tr>
<tr>
<td>Tuesday </td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=4";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub1'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass1'];	
			$getsecId= $stgetdata['borno_school_routine_studSection1'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=4";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub2'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass2'];	
			$getsecId= $stgetdata['borno_school_routine_studSection2'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=4";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub3'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass3'];	
			$getsecId= $stgetdata['borno_school_routine_studSection3'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=4";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub4'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass4'];	
			$getsecId= $stgetdata['borno_school_routine_studSection4'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=4";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub5'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass5'];	
			$getsecId= $stgetdata['borno_school_routine_studSection5'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=4";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub6'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass6'];	
			$getsecId= $stgetdata['borno_school_routine_studSection6'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>

    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=4";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub7'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass7'];	
			$getsecId= $stgetdata['borno_school_routine_studSection7'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=4";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub8'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass8'];	
			$getsecId= $stgetdata['borno_school_routine_studSection8'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
</tr>
<tr>
<td>Wednesday </td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=5";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub1'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass1'];	
			$getsecId= $stgetdata['borno_school_routine_studSection1'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=5";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub2'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass2'];	
			$getsecId= $stgetdata['borno_school_routine_studSection2'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=5";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub3'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass3'];	
			$getsecId= $stgetdata['borno_school_routine_studSection3'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=5";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub4'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass4'];	
			$getsecId= $stgetdata['borno_school_routine_studSection4'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=5";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub5'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass5'];	
			$getsecId= $stgetdata['borno_school_routine_studSection5'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=5";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub6'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass6'];	
			$getsecId= $stgetdata['borno_school_routine_studSection6'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=5";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub7'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass7'];	
			$getsecId= $stgetdata['borno_school_routine_studSection7'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=5";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub8'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass8'];	
			$getsecId= $stgetdata['borno_school_routine_studSection8'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
</tr>
<tr>
<td>Thursday </td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=6";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub1'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass1'];	
			$getsecId= $stgetdata['borno_school_routine_studSection1'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=6";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub2'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass2'];	
			$getsecId= $stgetdata['borno_school_routine_studSection2'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=6";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub3'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass3'];	
			$getsecId= $stgetdata['borno_school_routine_studSection3'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=6";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub4'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass4'];	
			$getsecId= $stgetdata['borno_school_routine_studSection4'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=6";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub5'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass5'];	
			$getsecId= $stgetdata['borno_school_routine_studSection5'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=6";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub6'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass6'];	
			$getsecId= $stgetdata['borno_school_routine_studSection6'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=6";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub7'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass7'];	
			$getsecId= $stgetdata['borno_school_routine_studSection7'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
    <td><?php 

						
			$getdata="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$gtfbranchId' AND borno_school_routine_shift_id='$shiftId'  AND 	borno_school_routine_day=6";
			$qgetdata=$mysqli->query($getdata);
			while($stgetdata=$qgetdata->fetch_assoc()){
			echo '[';
			
			$getsubId= $stgetdata['borno_school_routine_sub8'];
			$gettchId= $stgetdata['borno_school_routine_teacher_name'];
			$getclsId= $stgetdata['borno_school_routine_studClass8'];	
			$getsecId= $stgetdata['borno_school_routine_studSection8'];
			
	$classId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qclassId=$mysqli->query($classId);
	$gqclass=$qclassId->fetch_assoc();
	
			echo $gqclass['borno_school_class_name'];
			echo ',';
			
	$sectionId="select * from borno_school_section where borno_school_section_id='$getsecId'";
	$qsectionId=$mysqli->query($sectionId);
	$qsectionId=$qsectionId->fetch_assoc();
	
			echo $qsectionId['borno_school_section_name'];
			echo ',';

	$rclassId="select * from borno_school_class where borno_school_class_id='$getclsId'";
	$qrclassId=$mysqli->query($rclassId);
	$gqrclass=$qrclassId->fetch_assoc();

			if($gqrclass['class_step']==0){
				
					$getsubjName="select * from borno_result_subject where borno_result_subject_id='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
					echo $shgetsubjName['borno_school_subject_name'];
				
				}
				
			elseif($gqrclass['class_step']==1){
				 
					$getsubjName="select * from borno_subject_six_eight where subject_id_six_eight='$getsubId'";
					$qgetsubjName=$mysqli->query($getsubjName);
					$shgetsubjName=$qgetsubjName->fetch_assoc();
					
				echo $shgetsubjName['six_eight_subject_name'];
				
				}	
		elseif($gqrclass['class_step']==2){
				
		$getsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$getsubId'";
		$qgetsubjName=$mysqli->query($getsubjName);
		$shgetsubjName=$qgetsubjName->fetch_assoc();
					
		echo $shgetsubjName['borno_subject_nine_ten_name'];
				
				}	
	 
	      echo ',';	
	 	$gettchName="select * from borno_teacher_info where borno_teacher_info_id='$gettchId'";
		$qgettchName=$mysqli->query($gettchName);
		$tchName=$qgettchName->fetch_assoc();
					
		echo $tchName['borno_teacher_name'];
		
		echo ']'; echo ' ';	} 
	 ?></td>
</tr>
      </table>

</td>
  </tr>
</table>
</body>
</html>
