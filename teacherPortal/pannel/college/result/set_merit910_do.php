<?php
ini_set('max_execution_time', 600);
 require_once('../result_settings/result_sett_top.php');
 
 require_once '../../../../lib/htmlpurifier/library/HTMLPurifier.auto.php';
    
    $purifier = new HTMLPurifier();
    //$clean_html = $purifier->purify($dirty_html);
	
	if (!function_exists('clean_html')) {
		function clean_html($dirty_html = ''){
			if(empty($dirty_html))
			return $dirty_html;		
				
			global $purifier;
			$clean_html = $purifier->purify($dirty_html);
			return $clean_html;
		}
		
	}
	
		$branchId = clean_html($_POST['branchId']);
		$branchId1 = strip_tags($_POST['branchId']);	
							
		$studClass = clean_html($_POST['studClass']);
		$studClass1 = strip_tags($_POST['studClass']);
		
		$shiftId = clean_html($_POST['shiftId']);
		$shiftId1 = strip_tags($_POST['shiftId']);
		
		$section = clean_html($_POST['section']);
		$section1 = strip_tags($_POST['section']);
		
		$stsess = clean_html($_POST['stsess']);
		$stsess1 = strip_tags($_POST['stsess']);
		
		$selTerm = clean_html($_POST['selTerm']);
		$selTerm1 = strip_tags($_POST['selTerm']);
		
		$dept = clean_html($_POST['dept']);
		$dept1 = strip_tags($_POST['dept']);

		$styear = clean_html($_POST['styear']);
		$styear1 = strip_tags($_POST['styear']);
		
		
	$gtcgroup="update borno_class11_12_final_result SET stu4thsub='2' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$dept1' AND borno_result_exam_year='$styear1'";
	   $mysqli->query($gtcgroup); 
	   
	   $gtcgroup1="update borno_class11_12_test_result SET stu4thsub='2' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$dept1' AND borno_result_exam_year='$styear1'";
	   $mysqli->query($gtcgroup1); 		

	$gtctmarg1="select * from borno_set_subject_eleven_twelve where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_subject_eleven_twelve_dept='$dept1' Order by borno_student_info_id";
	
     $qgtctmarg1=$mysqli->query($gtctmarg1);
	while($shgtctmarg1=$qgtctmarg1->fetch_assoc()){
    $studinfoId1=$shgtctmarg1['borno_student_info_id'];
	 	
		$sub1st=$shgtctmarg1['borno_school_subject_1st']; 
		$sub2nd=$shgtctmarg1['borno_school_subject_2nd'];	
		$sub3rd=$shgtctmarg1['borno_school_subject_3rd']; 
		$sub4th=$shgtctmarg1['borno_school_subject_4th'];	
		$sub5th=$shgtctmarg1['borno_school_subject_5th']; 
		$sub6th=$shgtctmarg1['borno_school_subject_6th'];	
		$sub7th=$shgtctmarg1['borno_school_subject_7th']; 
		$sub8th=$shgtctmarg1['borno_school_subject_8th'];	
		$sub9th=$shgtctmarg1['borno_school_subject_9th']; 
		$sub10th=$shgtctmarg1['borno_school_subject_10th'];							
		$sub11st=$shgtctmarg1['borno_school_subject_11th'];	
		$sub12nd=$shgtctmarg1['borno_school_subject_12th']; 
		$sub13rd=$shgtctmarg1['borno_school_subject_13th'];		   
	 
	   
$gtctmarg1st="update borno_class11_12_final_result SET stu4thsub=0 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$dept1' AND borno_student_info_id='$studinfoId1' AND (borno_subject_eleven_twelve_id='$sub1st' OR borno_subject_eleven_twelve_id='$sub2nd' OR borno_subject_eleven_twelve_id='$sub3rd' OR borno_subject_eleven_twelve_id='$sub4th' OR borno_subject_eleven_twelve_id='$sub5th' OR borno_subject_eleven_twelve_id='$sub6th' OR borno_subject_eleven_twelve_id='$sub7th' OR borno_subject_eleven_twelve_id='$sub8th' OR borno_subject_eleven_twelve_id='$sub9th' OR borno_subject_eleven_twelve_id='$sub10th' OR borno_subject_eleven_twelve_id='$sub11st')";
		$mysqli->query($gtctmarg1st);
		

$gtctmarg2nd="update borno_class11_12_final_result SET stu4thsub=1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$dept1' AND borno_student_info_id='$studinfoId1' AND (borno_subject_eleven_twelve_id='$sub12nd' OR borno_subject_eleven_twelve_id='$sub13rd')";
		$mysqli->query($gtctmarg2nd);

$gtctmarg1st1="update borno_class11_12_test_result SET stu4thsub=0 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$dept1' AND borno_student_info_id='$studinfoId1' AND (borno_subject_eleven_twelve_id='$sub1st' OR borno_subject_eleven_twelve_id='$sub2nd' OR borno_subject_eleven_twelve_id='$sub3rd' OR borno_subject_eleven_twelve_id='$sub4th' OR borno_subject_eleven_twelve_id='$sub5th' OR borno_subject_eleven_twelve_id='$sub6th' OR borno_subject_eleven_twelve_id='$sub7th' OR borno_subject_eleven_twelve_id='$sub8th' OR borno_subject_eleven_twelve_id='$sub9th' OR borno_subject_eleven_twelve_id='$sub10th' OR borno_subject_eleven_twelve_id='$sub11st')";
		$mysqli->query($gtctmarg1st1);
		

$gtctmarg2nd1="update borno_class11_12_test_result SET stu4thsub=1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$dept1' AND borno_student_info_id='$studinfoId1' AND (borno_subject_eleven_twelve_id='$sub12nd' OR borno_subject_eleven_twelve_id='$sub13rd')";
		$mysqli->query($gtctmarg2nd1);	    
	}

	


$gtctmardel="delete from borno_class11_12_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$dept1' AND borno_result_exam_year='$styear1' AND stu4thsub='2'";
		$mysqli->query($gtctmardel);
		
$gtctmardel1="delete from borno_class11_12_test_result
where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$dept1' AND borno_result_exam_year='$styear1' AND stu4thsub='2'";
		$mysqli->query($gtctmardel1);

if($gtctmarg2nd1) { header('location:set_merit9_10.php?msg=1');} 
else { header('location:set_merit9_10.php?msg=2');}
?>