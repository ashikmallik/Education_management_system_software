<?php
ini_set('max_execution_time', 800);
 require_once('../result_settings/result_sett_top.php');
 
 require_once '../../../lib/htmlpurifier/library/HTMLPurifier.auto.php';
    
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
		
		$group = clean_html($_POST['group']);
		$group1 = strip_tags($_POST['group']);
	
//------------------------------------Nine To Ten 13 subject Set-------------------

	$gtctmarg1="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_school_stud_group='$group1' Order by borno_student_info_id";
     $qgtctmarg1=$mysqli->query($gtctmarg1);
	while($shgtctmarg1=$qgtctmarg1->fetch_assoc()){
    $studinfoId1=$shgtctmarg1['borno_student_info_id'];

	   $gtcsub="select * from borno_set_subject_nine_ten where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_student_info_id='$studinfoId1'";
	  $ggtcsub=$mysqli->query($gtcsub);
	  $shggtcsub=$ggtcsub->fetch_assoc();
	 	$sub3th=$shggtcsub['borno_subject_nine_ten_13sub']; 
		//$sub4th=$shggtcsub['borno_subject_nine_ten_4thsub'];

//==================3rd Subject Update==========================		
$gtctmarg3rd="update borno_class9_10_final_result SET stu4thsub=0 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$group1' AND borno_student_info_id='$studinfoId1' AND borno_subject_nine_ten_id='$sub3th'";
		$mysqli->query($gtctmarg3rd);
		
$gtctmarg3rd1="update borno_class9_10_temp_mark1 SET stu4thsub=0 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$group1' AND borno_student_info_id='$studinfoId1' AND borno_subject_nine_ten_id='$sub3th'";
		$thrdsub=$mysqli->query($gtctmarg3rd1);	
/*		
$gtctmarg4th="update borno_class9_10_final_result SET stu4thsub=1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$group1' AND borno_student_info_id='$studinfoId1' AND borno_subject_nine_ten_id='$sub4th'";
		$mysqli->query($gtctmarg4th);
		
$gtctmarg4th1="update borno_class9_10_temp_mark1 SET stu4thsub=1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$group1' AND borno_student_info_id='$studinfoId1' AND borno_subject_nine_ten_id='$sub4th'";
		$mysqli->query($gtctmarg4th1);		
*/
}

/*$gtctmardel="delete from borno_class9_10_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$group1' AND stu4thsub='2'";
		$mysqli->query($gtctmardel);
		
$gtctmardel1="delete from borno_class9_10_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$group1' AND stu4thsub='2'";
		$mysqli->query($gtctmardel1);
*/

if($thrdsub) { header('location:set_merit9_101.php?msg=1');} else { header('location:set_merit9_101.php?msg=2');}
?>