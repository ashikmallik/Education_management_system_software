<?php
ini_set('max_execution_time', 600);
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
	
//------------------------------------Nine To Ten GrandTotal GPA Set-------------------
	$gtctmarg1="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_school_stud_group='$group1' Order by borno_student_info_id";
     $qgtctmarg1=$mysqli->query($gtctmarg1);
	while($shgtctmarg1=$qgtctmarg1->fetch_assoc()){
    $studinfoId1=$shgtctmarg1['borno_student_info_id'];
	
	//=========================Set Group==============================
	$gtcgroup="update borno_class9_10_final_result SET borno_school_stud_group='$group1',stu4thsub='2',uncountable=0 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_student_info_id='$studinfoId1'";
	   $mysqli->query($gtcgroup); 
	 
	   $gtcgroup1="update borno_class9_10_temp_mark1 SET borno_school_stud_group='$group1',stu4thsub='2',uncountable=0 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_student_info_id='$studinfoId1'";
	   $mysqli->query($gtcgroup1); 
 }


//================================Science Start================================
if($group1==1)
{

$gtctmargth="update borno_class9_10_final_result SET stu4thsub=0 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$group1' AND (borno_subject_nine_ten_id='1' OR borno_subject_nine_ten_id='2' OR borno_subject_nine_ten_id='3' OR borno_subject_nine_ten_id='4' OR borno_subject_nine_ten_id='5' OR borno_subject_nine_ten_id='6' OR borno_subject_nine_ten_id='7' OR borno_subject_nine_ten_id='8' OR borno_subject_nine_ten_id='9' OR borno_subject_nine_ten_id='10' OR borno_subject_nine_ten_id='11' OR borno_subject_nine_ten_id='12')";
		$mysqli->query($gtctmargth);
		
$gtctmargth1="update borno_class9_10_temp_mark1 SET stu4thsub=0 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$group1' AND (borno_subject_nine_ten_id='1' OR borno_subject_nine_ten_id='2' OR borno_subject_nine_ten_id='3' OR borno_subject_nine_ten_id='4' OR borno_subject_nine_ten_id='5' OR borno_subject_nine_ten_id='6' OR borno_subject_nine_ten_id='7' OR borno_subject_nine_ten_id='8' OR borno_subject_nine_ten_id='9' OR borno_subject_nine_ten_id='10'OR borno_subject_nine_ten_id='11' OR borno_subject_nine_ten_id='12')";
		$mysqli->query($gtctmargth1);			

}
//================================Science End================================
//================================Business Start================================
elseif($group1==2)
{
$gtctmargth="update borno_class9_10_final_result SET stu4thsub=0 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$group1' AND (borno_subject_nine_ten_id='1' OR borno_subject_nine_ten_id='2' OR borno_subject_nine_ten_id='3' OR borno_subject_nine_ten_id='4' OR borno_subject_nine_ten_id='5' OR borno_subject_nine_ten_id='6' OR borno_subject_nine_ten_id='7' OR borno_subject_nine_ten_id='8' OR borno_subject_nine_ten_id='9' OR borno_subject_nine_ten_id='18' OR borno_subject_nine_ten_id='26' OR borno_subject_nine_ten_id='28')";
		$mysqli->query($gtctmargth);
		
$gtctmargth1="update borno_class9_10_temp_mark1 SET stu4thsub=0 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$group1' AND (borno_subject_nine_ten_id='1' OR borno_subject_nine_ten_id='2' OR borno_subject_nine_ten_id='3' OR borno_subject_nine_ten_id='4' OR borno_subject_nine_ten_id='5' OR borno_subject_nine_ten_id='6' OR borno_subject_nine_ten_id='7' OR borno_subject_nine_ten_id='8' OR borno_subject_nine_ten_id='9' OR borno_subject_nine_ten_id='18' OR borno_subject_nine_ten_id='26' OR borno_subject_nine_ten_id='28')";
		$mysqli->query($gtctmargth1);				

}
//================================Business End================================
//================================Humanities Start============================
elseif($group1==3)
{
$gtctmargth="update borno_class9_10_final_result SET stu4thsub=0 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$group1' AND (borno_subject_nine_ten_id='1' OR borno_subject_nine_ten_id='2' OR borno_subject_nine_ten_id='3' OR borno_subject_nine_ten_id='4' OR borno_subject_nine_ten_id='5' OR borno_subject_nine_ten_id='6' OR borno_subject_nine_ten_id='7' OR borno_subject_nine_ten_id='8' OR borno_subject_nine_ten_id='9' OR borno_subject_nine_ten_id='18' OR borno_subject_nine_ten_id='19' OR borno_subject_nine_ten_id='20')";
		$mysqli->query($gtctmargth);	
		
$gtctmargth1="update borno_class9_10_temp_mark1 SET stu4thsub=0 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$group1' AND (borno_subject_nine_ten_id='1' OR borno_subject_nine_ten_id='2' OR borno_subject_nine_ten_id='3' OR borno_subject_nine_ten_id='4' OR borno_subject_nine_ten_id='5' OR borno_subject_nine_ten_id='6' OR borno_subject_nine_ten_id='7' OR borno_subject_nine_ten_id='8' OR borno_subject_nine_ten_id='9' OR borno_subject_nine_ten_id='18' OR borno_subject_nine_ten_id='19' OR borno_subject_nine_ten_id='20')";
		$mysqli->query($gtctmargth1);			

}
//================================Humanities End============================

//==========================Uncountable Update=============================
	$gtctsubcomun="select * from borno_result_nine_ten_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND uncountable='1' Order by borin_subject_nine_ten_id asc";
  	$qgtctsubcomun=$mysqli->query($gtctsubcomun);
	while($shqgtctsubcomun=$qgtctsubcomun->fetch_assoc()){		
	$subidnmun=$shqgtctsubcomun['borin_subject_nine_ten_id'];
	
$gtctmargthun="update borno_class9_10_final_result SET uncountable=1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$group1' AND borno_subject_nine_ten_id='$subidnmun'";
		$mysqli->query($gtctmargthun);	
		
$gtctmargth1un="update borno_class9_10_temp_mark1 SET uncountable=1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$group1' AND borno_subject_nine_ten_id='$subidnmun'";
		$mysqli->query($gtctmargth1un);	
	
	}


if($gtctmargth1) { header('location:set_merit9_10.php?msg=1');} else { header('location:set_merit9_10.php?msg=2');}
?>