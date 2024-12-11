<?php
ob_start();
require_once('result_top.php');

$updatedate = date("d/m/Y");

extract($_POST);




///==================================================== General Subject ============================////////////////////////////	
if($studClass==1 OR $studClass==2)
{



	 $insfmark1="UPDATE `borno_class9_10_temp_mark1` SET `borno_school_branch_id` ='$branchId',`borno_school_class_id` = '$studClass',`borno_school_shift_id` = '$shiftId',`borno_school_section_id` = '$section',`borno_school_session` = '$stsess',`borno_school_roll` = '$stuRoll' WHERE `borno_student_info_id` = '$studId' AND `borno_result_term_id` = '$selTerm'";
	
		$qinstm1=$mysqli->query($insfmark1);
		if($qinstm1){
			 $insfres1="UPDATE `borno_class9_10_final_result` SET `borno_school_branch_id` ='$branchId',`borno_school_class_id` = '$studClass',`borno_school_shift_id` = '$shiftId',`borno_school_section_id` = '$section',`borno_school_session` = '$stsess',`borno_school_roll` = '$stuRoll' WHERE `borno_student_info_id` = '$studId' AND `borno_result_term_id` = '$selTerm'";
	

		$qinstm2=$mysqli->query($insfres1);
	if($qinstm2){	
			 $insfmerit1="UPDATE `borno_school_9_10_merit` SET `borno_school_branch_id` ='$branchId',`borno_school_class_id` = '$studClass',`borno_school_shift_id` = '$shiftId',`borno_school_section_id` = '$section',`borno_school_session` = '$stsess',`borno_school_roll` = '$stuRoll' WHERE `borno_student_info_id` = '$studId' AND `borno_result_term_id` = '$selTerm'";
	

		$qinstm3=$mysqli->query($insfmerit1);
}
else{
		   header('location:student_update_mark_table.php?msg=2'); 
		}
		}
		else{
		   header('location:student_update_mark_table.php?msg=2'); 
		}
	

}
elseif($studClass==3 OR $studClass==4 OR $studClass==5)
{

	 $insfmark1="UPDATE `borno_class6_8_temp_mark1` SET `borno_school_branch_id` ='$branchId',`borno_school_class_id` = '$studClass',`borno_school_shift_id` = '$shiftId',`borno_school_section_id` = '$section',`borno_school_session` = '$stsess',`borno_school_roll` = '$stuRoll' WHERE `borno_student_info_id` = '$studId' AND `borno_result_term_id` = '$selTerm'";
	
		$qinstm1=$mysqli->query($insfmark1);
		if($qinstm1){
			 $insfres1="UPDATE `borno_class6_8_final_result` SET `borno_school_branch_id` ='$branchId',`borno_school_class_id` = '$studClass',`borno_school_shift_id` = '$shiftId',`borno_school_section_id` = '$section',`borno_school_session` = '$stsess',`borno_school_roll` = '$stuRoll' WHERE `borno_student_info_id` = '$studId' AND `borno_result_term_id` = '$selTerm'";
	

		$qinstm2=$mysqli->query($insfres1);
	if($qinstm2){	
			 $insfmerit1="UPDATE `borno_school_6_8_merit` SET `borno_school_branch_id` ='$branchId',`borno_school_class_id` = '$studClass',`borno_school_shift_id` = '$shiftId',`borno_school_section_id` = '$section',`borno_school_session` = '$stsess',`borno_school_roll` = '$stuRoll' WHERE `borno_student_info_id` = '$studId' AND `borno_result_term_id` = '$selTerm'";
	

		$qinstm3=$mysqli->query($insfmerit1);
}
else{
		   header('location:student_update_mark_table.php?msg=2'); 
		}
		}
		else{
		   header('location:student_update_mark_table.php?msg=2'); 
		}
		
		
	

}

else
{
			
	
	 $insfmark1="UPDATE `borno_class1_temp_mark1` SET `borno_school_branch_id` ='$branchId',`borno_school_class_id` = '$studClass',`borno_school_shift_id` = '$shiftId',`borno_school_section_id` = '$section',`borno_school_session` = '$stsess',`borno_school_roll` = '$stuRoll' WHERE `borno_student_info_id` = '$studId' AND `borno_result_term_id` = '$selTerm'";
	
		$qinstm1=$mysqli->query($insfmark1);
		if($qinstm1){
			 $insfres1="UPDATE `borno_class1_final_result` SET `borno_school_branch_id` ='$branchId',`borno_school_class_id` = '$studClass',`borno_school_shift_id` = '$shiftId',`borno_school_section_id` = '$section',`borno_school_session` = '$stsess',`borno_school_roll` = '$stuRoll' WHERE `borno_student_info_id` = '$studId' AND `borno_result_term_id` = '$selTerm'";
	

		$qinstm2=$mysqli->query($insfres1);
	if($qinstm2){	
			 $insfmerit1="UPDATE `borno_school_play_5_merit` SET `borno_school_branch_id` ='$branchId',`borno_school_class_id` = '$studClass',`borno_school_shift_id` = '$shiftId',`borno_school_section_id` = '$section',`borno_school_session` = '$stsess',`borno_school_roll` = '$stuRoll' WHERE `borno_student_info_id` = '$studId' AND `borno_result_term_id` = '$selTerm'";
	

		$qinstm3=$mysqli->query($insfmerit1);
}
else{
		   header('location:student_update_mark_table.php?msg=2'); 
		}
		}
		else{
		   header('location:student_update_mark_table.php?msg=2'); 
		}

}




if($qinstm3) { header("location:student_update_mark_table.php?msg=1&branchId=$branchId&studClass=$studClass&shiftId=$shiftId&section=$section&stsess=$stsess&selTerm=$selTerm&group=$group");} else {  header('location:edit_marks.php?msg=2'); }
	

?>