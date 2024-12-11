<?php
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
		
		$group = clean_html($_POST['group']);
		$group1 = strip_tags($_POST['group']);
		
		 $gtterm="select * from borno_result_add_term where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1'";
				
				$qgterm=$mysqli->query($gtterm);
				$totalterm=mysqli_num_rows($qgterm);	
				
				
//---------------- Grading  ---------------------------------------------------	
	
$getgrdpoint="select * from borno_grading_chart where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1'";
		$qgetgrdpoint=$mysqli->query($getgrdpoint);
		$shgetgrdpoint=$qgetgrdpoint->fetch_assoc();
		
	
		$gtlettergrd1=$shgetgrdpoint['letter_grade1'];
		$gtlettergrd2=$shgetgrdpoint['letter_grade2'];
		$gtlettergrd3=$shgetgrdpoint['letter_grade3'];
		$gtlettergrd4=$shgetgrdpoint['letter_grade4'];
		$gtlettergrd5=$shgetgrdpoint['letter_grade5'];
		$gtlettergrd6=$shgetgrdpoint['letter_grade6'];
		$gtlettergrd7=$shgetgrdpoint['letter_grade7'];
		
		
		$gtgrtpoint1=$shgetgrdpoint['grade_point1'];
		$gtgrtpoint2=$shgetgrdpoint['grade_point2'];
		$gtgrtpoint3=$shgetgrdpoint['grade_point3'];
		$gtgrtpoint4=$shgetgrdpoint['grade_point4'];
		$gtgrtpoint5=$shgetgrdpoint['grade_point5'];
		$gtgrtpoint6=$shgetgrdpoint['grade_point6'];
		$gtgrtpoint7=$shgetgrdpoint['grade_point7'];	
		
//---------------- Grading  ---------------------------------------------------							
	
//------------------------------------Nine To Ten GrandTotal GPA Set-------------------
if($studClass1==1 OR $studClass1==2)
{
$delinfo="delete from borno_school_910_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_subject_nine_ten_dept='$group1' AND borno_result_term_id='0'";
	
	$mysqli->query($delinfo);

$gtcterm="select * from borno_result_add_term where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND term_type='1'";
    $qgtcterm=$mysqli->query($gtcterm);
    $shgtcterm=$qgtcterm->fetch_assoc();
	$term=$shgtcterm['borno_result_term_id']; 	

$gtcterm1="select * from borno_result_add_term where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND term_type='2'";
    $qgtcterm1=$mysqli->query($gtcterm1);
    $shgtcterm1=$qgtcterm1->fetch_assoc();
	$term1=$shgtcterm1['borno_result_term_id'];
	
$gtcterm2="select * from borno_result_add_term where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND term_type='3'";
    $qgtcterm2=$mysqli->query($gtcterm2);
    $shgtcterm2=$qgtcterm2->fetch_assoc();
	$term2=$shgtcterm2['borno_result_term_id'];
	
$gtctmarg1="select * from borno_school_9_10_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_school_stud_group='$group1' group by borno_student_info_id asc";
  
  
  
    $qgtctmarg1=$mysqli->query($gtctmarg1);
	while($shgtctmarg1=$qgtctmarg1->fetch_assoc()){
		
		$totalmark = 0;
		$totalmark3 = 0;
		$totalconvartmark = array();
		$totalconvartmark1 = array();
		$totalgpa=0;
		$totalgpa2=0;
		$gtgap= array();
		$gtgap1= array();
		
		$studinfoId1=$shgtctmarg1['borno_student_info_id']; 
		

		$gtctmarg="select * from borno_school_9_10_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_school_stud_group='$group1' AND borno_result_term_id!='$term' AND borno_student_info_id='$studinfoId1'";
  
	
    $qgtctmarg=$mysqli->query($gtctmarg);
	$totalsubject=mysqli_num_rows($qgtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){

		$studinfoId = $shgtctmarg['borno_student_info_id']; 
		$studName = $shgtctmarg['borno_school_student_name']; 
		$studRoll = $shgtctmarg['borno_school_roll']; 
		
		
	
		$totalconvartmark[] = $shgtctmarg['grandtotal'];
		$totalconvartmark1[] = $shgtctmarg['grandtotal1'];
		$gtgap[] = $shgtctmarg['gpa'];
		$gtgap1[] = $shgtctmarg['gpa1'];

	  
	   $totalmark1 = array_sum($totalconvartmark); 
	   $totalmark2 = array_sum($totalconvartmark1); 
	   
	   $totalmark=$totalmark1/2;
	   $totalmark3=$totalmark2/2;
	   
	   
	   $totalgpa1 = array_sum($gtgap);
	   $totalgpa2 = array_sum($gtgap1);
	   
	   $gttotalgpa=$totalgpa1/2;
	   $gttotalgpa3=$totalgpa2/2;
	   $gtFinalGPA=substr($gttotalgpa,0,4);
	   $gtFinalGPA1=substr($gttotalgpa3,0,4);
	   
		 
}

	$gtctfail1="select * from borno_school_9_10_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_school_stud_group='$group1' AND borno_result_term_id='$term1' AND borno_student_info_id='$studinfoId1'";
    $qgtctfail1=$mysqli->query($gtctfail1);
	$shgtctfail1=$qgtctfail1->fetch_assoc();
	$fail1=$shgtctfail1['gpa']; 	
	
	$gtctfail2="select * from borno_school_9_10_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_school_stud_group='$group1' AND borno_result_term_id='$term2' AND borno_student_info_id='$studinfoId1'";
    $qgtctfail2=$mysqli->query($gtctfail2);
	$shgtctfail2=$qgtctfail2->fetch_assoc();
	$fail2=$shgtctfail2['gpa']; 
	
	if($fail1>0 AND $fail2>0 AND $gtFinalGPA>=1){$fail=0;}
	elseif($fail1==0 AND $fail2>0 AND $gtFinalGPA>=1){$fail=1;}
	elseif($fail1>0 AND $fail2==0 AND $gtFinalGPA>=1){$fail=2;}	
	elseif($fail1==0 AND $fail2==0){$fail=3;}
	else{$fail=4;}
	
	if($gtFinalGPA==$gtgrtpoint1){$finallg=$gtlettergrd1;}
	elseif($gtFinalGPA>=$gtgrtpoint2 AND $gtFinalGPA<$gtgrtpoint1){$finallg=$gtlettergrd2;}
	elseif($gtFinalGPA>=$gtgrtpoint3 AND $gtFinalGPA<$gtgrtpoint2){$finallg=$gtlettergrd3;}
	elseif($gtFinalGPA>=$gtgrtpoint4 AND $gtFinalGPA<$gtgrtpoint3){$finallg=$gtlettergrd4;}
	elseif($gtFinalGPA>=$gtgrtpoint5 AND $gtFinalGPA<$gtgrtpoint4){$finallg=$gtlettergrd5;}
	elseif($gtFinalGPA>=$gtgrtpoint6 AND $gtFinalGPA<$gtgrtpoint5){$finallg=$gtlettergrd6;}
	elseif($gtFinalGPA>=$gtgrtpoint7 AND $gtFinalGPA<$gtgrtpoint6){$finallg=$gtlettergrd7;}	

    if($gtFinalGPA<1){$gtFinalGPA=0;}
	
	    if($totalmark!=0)
{
    
	$insfmark="INSERT INTO `borno_school_910_avg_merit` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`,`borno_subject_nine_ten_dept`, `borno_result_term_id`, `borno_student_info_id`, `borno_school_roll`, `borno_school_student_name`, `grandtotal`,`grandtotal1`, `gpa`, `gpa1`, `finallg`, `meritno_class`, `merit_class`, `meritno_shift`, `merit_shift`, `meritno_section`, `merit_section`, `failno`, `fail_subject`) 
	
	VALUES ('$schId', '$branchId1', '$studClass1', '$shiftId1', '$section1', '$stsess1', '$group1', '0', '$studinfoId', '$studRoll', '$studName', '$totalmark','$totalmark3', '$gtFinalGPA','$gtFinalGPA1', '$finallg', '0', '', '0', '', '0','', '$fail', '')";
		
		
 	$qins=$mysqli->query($insfmark);

 		}
	}
}
//------------------------------------End Six To Eight GrandTotal GPA Set-------------------
	
//------------------------------------Six To Eight GrandTotal GPA Set-------------------
elseif($studClass1==3 OR $studClass1==4 OR $studClass1==5)
{
	
	$delinfo="delete from borno_school_68_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0'";
	
	$mysqli->query($delinfo);

$gtcterm="select * from borno_result_add_term where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND term_type='1'";
    $qgtcterm=$mysqli->query($gtcterm);
    $shgtcterm=$qgtcterm->fetch_assoc();
	$term=$shgtcterm['borno_result_term_id'];

$gtcterm1="select * from borno_result_add_term where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND term_type='2'";
    $qgtcterm1=$mysqli->query($gtcterm1);
    $shgtcterm1=$qgtcterm1->fetch_assoc();
	$term1=$shgtcterm1['borno_result_term_id'];
	
$gtcterm2="select * from borno_result_add_term where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND term_type='3'";
    $qgtcterm2=$mysqli->query($gtcterm2);
    $shgtcterm2=$qgtcterm2->fetch_assoc();
	$term2=$shgtcterm2['borno_result_term_id'];
	
$gtctmarg1="select * from borno_school_6_8_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' group by borno_student_info_id asc";
  
  
  
    $qgtctmarg1=$mysqli->query($gtctmarg1);
	while($shgtctmarg1=$qgtctmarg1->fetch_assoc()){
		
		$totalmark = 0;
		$totalconvartmark = array();
		
		$totalgpa=0;
		$gtgap= array();
		
		
		$studinfoId1=$shgtctmarg1['borno_student_info_id']; 
		

		$gtctmarg="select * from borno_school_6_8_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id!='$term' AND borno_student_info_id='$studinfoId1'";
 
	$qgtctmarg=$mysqli->query($gtctmarg);
	$totalsubject=mysqli_num_rows($qgtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){

		$studinfoId = $shgtctmarg['borno_student_info_id']; 
		$studName = $shgtctmarg['borno_school_student_name']; 
		$studRoll = $shgtctmarg['borno_school_roll']; 
		
		
	
		$totalconvartmark[] = $shgtctmarg['grandtotal'];
		$gtgap[] = $shgtctmarg['gpa'];

	  
	   $totalmark1 = array_sum($totalconvartmark); 
	   
	   $totalmark=$totalmark1/2;
	   
	   
	   $totalgpa1 = array_sum($gtgap);
	   
	   $gttotalgpa=$totalgpa1/2;
	   $gtFinalGPA=substr($gttotalgpa,0,4);
	   
		 
}

	$gtctfail1="select * from borno_school_6_8_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$term1' AND borno_student_info_id='$studinfoId1'";
    $qgtctfail1=$mysqli->query($gtctfail1);
	$shgtctfail1=$qgtctfail1->fetch_assoc();
	$fail1=$shgtctfail1['gpa']; 	
	
	$gtctfail2="select * from borno_school_6_8_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$term2' AND borno_student_info_id='$studinfoId1'";
    $qgtctfail2=$mysqli->query($gtctfail2);
	$shgtctfail2=$qgtctfail2->fetch_assoc();
	$fail2=$shgtctfail2['gpa']; 
	
	if($fail1>0 AND $fail2>0 AND $gtFinalGPA>=1){$fail=0;}
	elseif($fail1==0 AND $fail2>0 AND $gtFinalGPA>=1){$fail=1;}
	elseif($fail1>0 AND $fail2==0 AND $gtFinalGPA>=1){$fail=2;}	
	elseif($fail1==0 AND $fail2==0){$fail=3;}
	else{$fail=4;}
	
	if($gtFinalGPA==$gtgrtpoint1){$finallg=$gtlettergrd1;}
	elseif($gtFinalGPA>=$gtgrtpoint2 AND $gtFinalGPA<$gtgrtpoint1){$finallg=$gtlettergrd2;}
	elseif($gtFinalGPA>=$gtgrtpoint3 AND $gtFinalGPA<$gtgrtpoint2){$finallg=$gtlettergrd3;}
	elseif($gtFinalGPA>=$gtgrtpoint4 AND $gtFinalGPA<$gtgrtpoint3){$finallg=$gtlettergrd4;}
	elseif($gtFinalGPA>=$gtgrtpoint5 AND $gtFinalGPA<$gtgrtpoint4){$finallg=$gtlettergrd5;}
	elseif($gtFinalGPA>=$gtgrtpoint6 AND $gtFinalGPA<$gtgrtpoint5){$finallg=$gtlettergrd6;}
	elseif($gtFinalGPA>=$gtgrtpoint7 AND $gtFinalGPA<$gtgrtpoint6){$finallg=$gtlettergrd7;}
	
	if($gtFinalGPA<1){$gtFinalGPA=0;}
	
	    if($totalmark!=0)
{

	$insfmark="INSERT INTO `borno_school_68_avg_merit` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, `borno_result_term_id`, `borno_student_info_id`, `borno_school_roll`, `borno_school_student_name`, `grandtotal`, `gpa`, `finallg`, `meritno_class`, `merit_class`, `meritno_shift`, `merit_shift`, `meritno_section`, `merit_section`, `failno`, `fail_subject`) 
	
	VALUES ('$schId', '$branchId1', '$studClass1', '$shiftId1', '$section1', '$stsess1', '0', '$studinfoId', '$studRoll', '$studName', '$totalmark', '$gtFinalGPA', '$finallg', '0', '', '0', '', '0', '', '$fail', '')";
		
		
 	$qins=$mysqli->query($insfmark);

 		}
	}
}
//------------------------------------End Six To Eight GrandTotal GPA Set-------------------


//------------------------------------Play To Five GrandTotal GPA Set-------------------
else
{
$delinfo="delete from borno_school_play_5_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0'";
	
	$mysqli->query($delinfo);

$gtcterm="select * from borno_result_add_term where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND term_type='1'";
    $qgtcterm=$mysqli->query($gtcterm);
    $shgtcterm=$qgtcterm->fetch_assoc();
	$term1=$shgtcterm['borno_result_term_id'];

$gtcterm1="select * from borno_result_add_term where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND term_type='2'";
    $qgtcterm1=$mysqli->query($gtcterm1);
    $shgtcterm1=$qgtcterm1->fetch_assoc();
	$term2=$shgtcterm1['borno_result_term_id'];
	
$gtcterm2="select * from borno_result_add_term where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND term_type='3'";
    $qgtcterm2=$mysqli->query($gtcterm2);
    $shgtcterm2=$qgtcterm2->fetch_assoc();
	$term3=$shgtcterm2['borno_result_term_id'];
	

	
$gtctmarg1="select * from borno_school_play_5_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' group by borno_student_info_id asc";
  
  
  
    $qgtctmarg1=$mysqli->query($gtctmarg1);
	while($shgtctmarg1=$qgtctmarg1->fetch_assoc()){
		
		$totalmark = 0;
		$totalconvartmark = array();
		
		$totalgpa=0;
		$gtgap= array();
		
		
		$studinfoId1=$shgtctmarg1['borno_student_info_id']; 
		

		$gtctmarg="select * from borno_school_play_5_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_student_info_id='$studinfoId1'";
  
	
    $qgtctmarg=$mysqli->query($gtctmarg);
	$totalsubject=mysqli_num_rows($qgtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){

		$studinfoId = $shgtctmarg['borno_student_info_id']; 
		$studName = $shgtctmarg['borno_school_student_name']; 
		$studRoll = $shgtctmarg['borno_school_roll']; 
		
		
	
		$totalconvartmark[] = $shgtctmarg['grandtotal'];
		$gtgap[] = $shgtctmarg['gpa'];

	  
	   $totalmark1 = array_sum($totalconvartmark); 
	   
	   $totalmark=$totalmark1/$totalterm;
	   
	   
	   $totalgpa1 = array_sum($gtgap);
	   
	   $gttotalgpa=$totalgpa1/$totalterm;
	   $gtFinalGPA=substr($gttotalgpa,0,4);
	   
		 
}

	$gtctfail1="select * from borno_school_play_5_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$term1' AND borno_student_info_id='$studinfoId1'";
    $qgtctfail1=$mysqli->query($gtctfail1);
	$shgtctfail1=$qgtctfail1->fetch_assoc();
	$fail1=$shgtctfail1['gpa']; 	
	
	$gtctfail2="select * from borno_school_play_5_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$term2' AND borno_student_info_id='$studinfoId1'";
    $qgtctfail2=$mysqli->query($gtctfail2);
	$shgtctfail2=$qgtctfail2->fetch_assoc();
	$fail2=$shgtctfail2['gpa']; 

	$gtctfail3="select * from borno_school_play_5_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$term3' AND borno_student_info_id='$studinfoId1'";
    $qgtctfail3=$mysqli->query($gtctfail3);
	$shgtctfail3=$qgtctfail3->fetch_assoc();
	$fail3=$shgtctfail3['gpa']; 	
	
	if($fail1>0 AND $fail2>0 AND $fail3>0 AND $gtFinalGPA>=1){$fail=0;}
	elseif($fail1==0 AND $fail2>0 AND $fail3>0 AND $gtFinalGPA>=1){$fail=1;}
	elseif($fail1>0 AND $fail2==0 AND $fail3>0 AND $gtFinalGPA>=1){$fail=1;}	
	elseif($fail1>0 AND $fail2>0 AND $fail3==0 AND $gtFinalGPA>=1){$fail=1;}
	elseif(($fail1>0 OR $fail2>0 OR $fail3>0) AND $gtFinalGPA>=1){$fail=2;}	
	elseif($fail1==0 AND $fail2==0 AND $fail3==0){$fail=3;}
	else{$fail=4;}
	
	
	if($gtFinalGPA==$gtgrtpoint1){$finallg=$gtlettergrd1;}
	elseif($gtFinalGPA>=$gtgrtpoint2 AND $gtFinalGPA<$gtgrtpoint1){$finallg=$gtlettergrd2;}
	elseif($gtFinalGPA>=$gtgrtpoint3 AND $gtFinalGPA<$gtgrtpoint2){$finallg=$gtlettergrd3;}
	elseif($gtFinalGPA>=$gtgrtpoint4 AND $gtFinalGPA<$gtgrtpoint3){$finallg=$gtlettergrd4;}
	elseif($gtFinalGPA>=$gtgrtpoint5 AND $gtFinalGPA<$gtgrtpoint4){$finallg=$gtlettergrd5;}
	elseif($gtFinalGPA>=$gtgrtpoint6 AND $gtFinalGPA<$gtgrtpoint5){$finallg=$gtlettergrd6;}
	elseif($gtFinalGPA>=$gtgrtpoint7 AND $gtFinalGPA<$gtgrtpoint6){$finallg=$gtlettergrd7;}	
    
    if($gtFinalGPA<1){$gtFinalGPA=0;}
	    if($totalmark!=0)
{
    
	$insfmark="INSERT INTO `borno_school_play_5_avg_merit` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, `borno_result_term_id`, `borno_student_info_id`, `borno_school_roll`, `borno_school_student_name`, `grandtotal`, `gpa`, `finallg`, `meritno_class`, `merit_class`, `meritno_shift`, `merit_shift`, `meritno_section`, `merit_section`, `failno`, `fail_subject`) 
	
	VALUES ('$schId', '$branchId1', '$studClass1', '$shiftId1', '$section1', '$stsess1', '0', '$studinfoId', '$studRoll', '$studName', '$totalmark', '$gtFinalGPA', '$finallg', '0', '', '0', '', '0', '', '$fail', '')";
		
		
 	$qins=$mysqli->query($insfmark);

 		}

}

}

//======================================Merit Section========================================
	$delinfo1="delete from borno_merit_no where empty='0'";
	$mysqli->query($delinfo1);

	$delinfo2="delete from borno_gpa where empty='0'";
	$mysqli->query($delinfo2);
	
if($studClass1==1 OR $studClass1==2)
{
    
//=============================failno0==========================    
 $gtctmarg="select * from borno_school_910_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_subject_nine_ten_dept='$group1' AND gpa!=0 AND failno=0 group by gpa, grandtotal";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
		
		
		
		$studinfoId=$shgtctmarg['grandtotal']; 
		
	$styGPA=$shgtctmarg['gpa'];
		
	
		
	
$insfmark="INSERT INTO `borno_merit_no` (`gpa`, `grandtotal`, `meritno`)
		
		
		 VALUES ('$styGPA', '$studinfoId', '0')";
		
		
 $qins=$mysqli->query($insfmark);
 

}

$meritno2="select * from borno_merit_no group by gpa"; 
$qmeritno2=$mysqli->query($meritno2);
	while($sqmeritno2=$qmeritno2->fetch_assoc()){ 		
		
	 				
$styGPA2=$sqmeritno2['gpa'];
$insfmark2="INSERT INTO `borno_gpa` (`gpa`)
		
		
		 VALUES ('$styGPA2')";
		
		
 $qins2=$mysqli->query($insfmark2);
 

}
	
	$meritno="select * from borno_gpa order by gpa desc"; 
    $qmeritno=$mysqli->query($meritno);
	$sl=0;	
	while($shqmeritno=$qmeritno->fetch_assoc()){ 
	$styGPA1=$shqmeritno['gpa'];	
		
		
	
	$meritno5="select * from borno_merit_no where gpa='$styGPA1' order by grandtotal desc"; 
	
    $qmeritno5=$mysqli->query($meritno5);
	
	while($shqmeritno5=$qmeritno5->fetch_assoc()){$sl++;
	

	$studin=$shqmeritno5['grandtotal']; 

	

  $insfmark1="UPDATE borno_merit_no SET meritno='$sl' where gpa='$styGPA1' AND grandtotal='$studin'";
		
		
 $qins=$mysqli->query($insfmark1);
	}
}

$meritno1="select * from borno_merit_no order by meritno"; 

    $qmeritno1=$mysqli->query($meritno1);
	while($sqqqmeritno1=$qmeritno1->fetch_assoc()){ 
	
		
		
    $mno=$sqqqmeritno1['meritno'];
	 $styGPA11=$sqqqmeritno1['gpa'];
	 $studin1=$sqqqmeritno1['grandtotal']; 

	

 $insfmark11="UPDATE borno_school_910_avg_merit SET meritno_section='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_subject_nine_ten_dept='$group1' AND gpa='$styGPA11' AND grandtotal='$studin1'";
		
		
 $qins=$mysqli->query($insfmark11);

		}


	$delinfo1="delete from borno_merit_no where empty='0'";
	$mysqli->query($delinfo1);

	$delinfo2="delete from borno_gpa where empty='0'";
	$mysqli->query($delinfo2);		
//=============================failno1==========================    
 $gtctmarg="select * from borno_school_910_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_subject_nine_ten_dept='$group1' AND gpa!=0 AND failno=1 group by gpa, grandtotal";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
		
		
		
		$studinfoId=$shgtctmarg['grandtotal']; 
		
	$styGPA=$shgtctmarg['gpa'];
		
	
		
	
$insfmark="INSERT INTO `borno_merit_no` (`gpa`, `grandtotal`, `meritno`)
		
		
		 VALUES ('$styGPA', '$studinfoId', '0')";
		
		
 $qins=$mysqli->query($insfmark);
 

}

$meritno2="select * from borno_merit_no group by gpa"; 
$qmeritno2=$mysqli->query($meritno2);
	while($sqmeritno2=$qmeritno2->fetch_assoc()){ 		
		
	 				
$styGPA2=$sqmeritno2['gpa'];
$insfmark2="INSERT INTO `borno_gpa` (`gpa`)
		
		
		 VALUES ('$styGPA2')";
		
		
 $qins2=$mysqli->query($insfmark2);
 

}
	
	$meritno="select * from borno_gpa order by gpa desc"; 
    $qmeritno=$mysqli->query($meritno);
	while($shqmeritno=$qmeritno->fetch_assoc()){ 
	$styGPA1=$shqmeritno['gpa'];	
		
		
	
	$meritno5="select * from borno_merit_no where gpa='$styGPA1' order by grandtotal desc"; 
	
    $qmeritno5=$mysqli->query($meritno5);
	
	while($shqmeritno5=$qmeritno5->fetch_assoc()){$sl++;
	

	$studin=$shqmeritno5['grandtotal']; 

	

  $insfmark1="UPDATE borno_merit_no SET meritno='$sl' where gpa='$styGPA1' AND grandtotal='$studin'";
		
		
 $qins=$mysqli->query($insfmark1);
	}
}

$meritno1="select * from borno_merit_no order by meritno"; 

    $qmeritno1=$mysqli->query($meritno1);
	while($sqqqmeritno1=$qmeritno1->fetch_assoc()){ 
	
		
		
    $mno=$sqqqmeritno1['meritno'];
	 $styGPA11=$sqqqmeritno1['gpa'];
	 $studin1=$sqqqmeritno1['grandtotal']; 

	

 $insfmark11="UPDATE borno_school_910_avg_merit SET meritno_section='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_subject_nine_ten_dept='$group1' AND gpa='$styGPA11' AND grandtotal='$studin1'";
		
		
 $qins=$mysqli->query($insfmark11);

		}


	$delinfo1="delete from borno_merit_no where empty='0'";
	$mysqli->query($delinfo1);

	$delinfo2="delete from borno_gpa where empty='0'";
	$mysqli->query($delinfo2);		
//=============================failno2==========================    
 $gtctmarg="select * from borno_school_910_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_subject_nine_ten_dept='$group1' AND gpa!=0 AND failno=2 group by gpa, grandtotal";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
		
		
		
		$studinfoId=$shgtctmarg['grandtotal']; 
		
	$styGPA=$shgtctmarg['gpa'];
		
	
		
	
$insfmark="INSERT INTO `borno_merit_no` (`gpa`, `grandtotal`, `meritno`)
		
		
		 VALUES ('$styGPA', '$studinfoId', '0')";
		
		
 $qins=$mysqli->query($insfmark);
 

}

$meritno2="select * from borno_merit_no group by gpa"; 
$qmeritno2=$mysqli->query($meritno2);
	while($sqmeritno2=$qmeritno2->fetch_assoc()){ 		
		
	 				
$styGPA2=$sqmeritno2['gpa'];
$insfmark2="INSERT INTO `borno_gpa` (`gpa`)
		
		
		 VALUES ('$styGPA2')";
		
		
 $qins2=$mysqli->query($insfmark2);
 

}
	
	$meritno="select * from borno_gpa order by gpa desc"; 
    $qmeritno=$mysqli->query($meritno);
	while($shqmeritno=$qmeritno->fetch_assoc()){ 
	$styGPA1=$shqmeritno['gpa'];	
		
		
	
	$meritno5="select * from borno_merit_no where gpa='$styGPA1' order by grandtotal desc"; 
	
    $qmeritno5=$mysqli->query($meritno5);
	
	while($shqmeritno5=$qmeritno5->fetch_assoc()){$sl++;
	

	$studin=$shqmeritno5['grandtotal']; 

	

  $insfmark1="UPDATE borno_merit_no SET meritno='$sl' where gpa='$styGPA1' AND grandtotal='$studin'";
		
		
 $qins=$mysqli->query($insfmark1);
	}
}

$meritno1="select * from borno_merit_no order by meritno"; 

    $qmeritno1=$mysqli->query($meritno1);
	while($sqqqmeritno1=$qmeritno1->fetch_assoc()){ 
	
		
		
    $mno=$sqqqmeritno1['meritno'];
	 $styGPA11=$sqqqmeritno1['gpa'];
	 $studin1=$sqqqmeritno1['grandtotal']; 

	

 $insfmark11="UPDATE borno_school_910_avg_merit SET meritno_section='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_subject_nine_ten_dept='$group1' AND gpa='$styGPA11' AND grandtotal='$studin1'";
		
		
 $qins=$mysqli->query($insfmark11);

		}		
		
	$gtcmerit="select * from borno_merit_position order by number";
	$qgtcmerit=$mysqli->query($gtcmerit);
	while($shqgtcmerit=$qgtcmerit->fetch_assoc()){
	
	$number=$shqgtcmerit['number'];
	$positionlist=$shqgtcmerit['positionlist'];

	$gtctmarg="select * from borno_school_910_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_subject_nine_ten_dept='$group1' AND borno_result_term_id='0' order by meritno_section asc";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
	
		
		
  		$studinfoId=$shgtctmarg['borno_student_info_id']; 
	    $meritno=$shgtctmarg['meritno_section']; 
		
			if($meritno==$number) {

	
		
	$insfmark111="UPDATE borno_school_910_avg_merit SET merit_section='$positionlist' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_subject_nine_ten_dept='$group1' AND borno_student_info_id='$studinfoId'";
		
		
 $qins=$mysqli->query($insfmark111);

 
 } 
}
}
}

elseif($studClass1==3 OR $studClass1==4 OR $studClass1==5)
{
    
//================================failno0==========================    
 $gtctmarg="select * from borno_school_68_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND gpa!=0 AND failno=0 group by gpa, grandtotal";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
		
		
		
		$studinfoId=$shgtctmarg['grandtotal']; 
		
	$styGPA=$shgtctmarg['gpa'];
		
	
		
	
$insfmark="INSERT INTO `borno_merit_no` (`gpa`, `grandtotal`, `meritno`)
		
		
		 VALUES ('$styGPA', '$studinfoId', '0')";
		
		
 $qins=$mysqli->query($insfmark);
 

}

$meritno2="select * from borno_merit_no group by gpa"; 
$qmeritno2=$mysqli->query($meritno2);
	while($sqmeritno2=$qmeritno2->fetch_assoc()){ 		
		
	 				
$styGPA2=$sqmeritno2['gpa'];
$insfmark2="INSERT INTO `borno_gpa` (`gpa`)
		
		
		 VALUES ('$styGPA2')";
		
		
 $qins2=$mysqli->query($insfmark2);
 

}
	
	$meritno="select * from borno_gpa order by gpa desc"; 
    $qmeritno=$mysqli->query($meritno);
	$sl=0;	
	while($shqmeritno=$qmeritno->fetch_assoc()){ 
	$styGPA1=$shqmeritno['gpa'];	
		
		
	
	$meritno5="select * from borno_merit_no where gpa='$styGPA1' order by grandtotal desc"; 
	
    $qmeritno5=$mysqli->query($meritno5);
	
	while($shqmeritno5=$qmeritno5->fetch_assoc()){ 	$sl++;
	

	$studin=$shqmeritno5['grandtotal']; 

	

  $insfmark1="UPDATE borno_merit_no SET meritno='$sl' where gpa='$styGPA1' AND grandtotal='$studin'";
		
		
 $qins=$mysqli->query($insfmark1);
	}
}

$meritno1="select * from borno_merit_no order by meritno"; 

    $qmeritno1=$mysqli->query($meritno1);
	while($sqqqmeritno1=$qmeritno1->fetch_assoc()){ 
	
		
		
    $mno=$sqqqmeritno1['meritno'];
	 $styGPA11=$sqqqmeritno1['gpa'];
	 $studin1=$sqqqmeritno1['grandtotal']; 

	

 $insfmark11="UPDATE borno_school_68_avg_merit SET meritno_section='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND gpa='$styGPA11' AND grandtotal='$studin1'";
		
		
 $qins=$mysqli->query($insfmark11);

		}

	$delinfo1="delete from borno_merit_no where empty='0'";
	$mysqli->query($delinfo1);

	$delinfo2="delete from borno_gpa where empty='0'";
	$mysqli->query($delinfo2);		
//================================failno1==========================    
 $gtctmarg="select * from borno_school_68_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND gpa!=0 AND failno=1 group by gpa, grandtotal";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
		
		
		
		$studinfoId=$shgtctmarg['grandtotal']; 
		
	$styGPA=$shgtctmarg['gpa'];
		
	
		
	
$insfmark="INSERT INTO `borno_merit_no` (`gpa`, `grandtotal`, `meritno`)
		
		
		 VALUES ('$styGPA', '$studinfoId', '0')";
		
		
 $qins=$mysqli->query($insfmark);
 

}

$meritno2="select * from borno_merit_no group by gpa"; 
$qmeritno2=$mysqli->query($meritno2);
	while($sqmeritno2=$qmeritno2->fetch_assoc()){ 		
		
	 				
$styGPA2=$sqmeritno2['gpa'];
$insfmark2="INSERT INTO `borno_gpa` (`gpa`)
		
		
		 VALUES ('$styGPA2')";
		
		
 $qins2=$mysqli->query($insfmark2);
 

}
	
	$meritno="select * from borno_gpa order by gpa desc"; 
    $qmeritno=$mysqli->query($meritno);
	while($shqmeritno=$qmeritno->fetch_assoc()){ 
	$styGPA1=$shqmeritno['gpa'];	
		
		
	
	$meritno5="select * from borno_merit_no where gpa='$styGPA1' order by grandtotal desc"; 
	
    $qmeritno5=$mysqli->query($meritno5);
	
	while($shqmeritno5=$qmeritno5->fetch_assoc()){ 	$sl++;
	

	$studin=$shqmeritno5['grandtotal']; 

	

  $insfmark1="UPDATE borno_merit_no SET meritno='$sl' where gpa='$styGPA1' AND grandtotal='$studin'";
		
		
 $qins=$mysqli->query($insfmark1);
	}
}

$meritno1="select * from borno_merit_no order by meritno"; 

    $qmeritno1=$mysqli->query($meritno1);
	while($sqqqmeritno1=$qmeritno1->fetch_assoc()){ 
	
		
		
    $mno=$sqqqmeritno1['meritno'];
	 $styGPA11=$sqqqmeritno1['gpa'];
	 $studin1=$sqqqmeritno1['grandtotal']; 

	

 $insfmark11="UPDATE borno_school_68_avg_merit SET meritno_section='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND gpa='$styGPA11' AND grandtotal='$studin1'";
		
		
 $qins=$mysqli->query($insfmark11);

		}

	$delinfo1="delete from borno_merit_no where empty='0'";
	$mysqli->query($delinfo1);

	$delinfo2="delete from borno_gpa where empty='0'";
	$mysqli->query($delinfo2);		
//================================failno2==========================    
 $gtctmarg="select * from borno_school_68_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND gpa!=0 AND failno=2 group by gpa, grandtotal";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
		
		
		
		$studinfoId=$shgtctmarg['grandtotal']; 
		
	$styGPA=$shgtctmarg['gpa'];
		
	
		
	
$insfmark="INSERT INTO `borno_merit_no` (`gpa`, `grandtotal`, `meritno`)
		
		
		 VALUES ('$styGPA', '$studinfoId', '0')";
		
		
 $qins=$mysqli->query($insfmark);
 

}

$meritno2="select * from borno_merit_no group by gpa"; 
$qmeritno2=$mysqli->query($meritno2);
	while($sqmeritno2=$qmeritno2->fetch_assoc()){ 		
		
	 				
$styGPA2=$sqmeritno2['gpa'];
$insfmark2="INSERT INTO `borno_gpa` (`gpa`)
		
		
		 VALUES ('$styGPA2')";
		
		
 $qins2=$mysqli->query($insfmark2);
 

}
	
	$meritno="select * from borno_gpa order by gpa desc"; 
    $qmeritno=$mysqli->query($meritno);
	while($shqmeritno=$qmeritno->fetch_assoc()){ 
	$styGPA1=$shqmeritno['gpa'];	
		
		
	
	$meritno5="select * from borno_merit_no where gpa='$styGPA1' order by grandtotal desc"; 
	
    $qmeritno5=$mysqli->query($meritno5);
	
	while($shqmeritno5=$qmeritno5->fetch_assoc()){ 	$sl++;
	

	$studin=$shqmeritno5['grandtotal']; 

	

  $insfmark1="UPDATE borno_merit_no SET meritno='$sl' where gpa='$styGPA1' AND grandtotal='$studin'";
		
		
 $qins=$mysqli->query($insfmark1);
	}
}

$meritno1="select * from borno_merit_no order by meritno"; 

    $qmeritno1=$mysqli->query($meritno1);
	while($sqqqmeritno1=$qmeritno1->fetch_assoc()){ 
	
		
		
    $mno=$sqqqmeritno1['meritno'];
	 $styGPA11=$sqqqmeritno1['gpa'];
	 $studin1=$sqqqmeritno1['grandtotal']; 

	

 $insfmark11="UPDATE borno_school_68_avg_merit SET meritno_section='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND gpa='$styGPA11' AND grandtotal='$studin1'";
		
		
 $qins=$mysqli->query($insfmark11);

		}		
		
	$gtcmerit="select * from borno_merit_position order by number";
	$qgtcmerit=$mysqli->query($gtcmerit);
	while($shqgtcmerit=$qgtcmerit->fetch_assoc()){
	
	$number=$shqgtcmerit['number'];
	$positionlist=$shqgtcmerit['positionlist'];

	$gtctmarg="select * from borno_school_68_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' order by meritno_section asc";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
	
		
		
  		$studinfoId=$shgtctmarg['borno_student_info_id']; 
	    $meritno=$shgtctmarg['meritno_section']; 
		
			if($meritno==$number) {

	
		
	$insfmark111="UPDATE borno_school_68_avg_merit SET merit_section='$positionlist' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId'";
		
		
 $qins=$mysqli->query($insfmark111);
 
 } 
}
}
}

else
{
  
//===============failno1==========================  
    
 $gtctmarg="select * from borno_school_play_5_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND gpa!=0 AND failno=0 group by gpa, grandtotal";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
		
		
		
		$studinfoId=$shgtctmarg['grandtotal']; 
		
	$styGPA=$shgtctmarg['gpa'];
		
	
		
	
$insfmark="INSERT INTO `borno_merit_no` (`gpa`, `grandtotal`, `meritno`)
		
		
		 VALUES ('$styGPA', '$studinfoId', '0')";
		
		
 $qins=$mysqli->query($insfmark);
 

}

$meritno2="select * from borno_merit_no group by gpa"; 
$qmeritno2=$mysqli->query($meritno2);
	while($sqmeritno2=$qmeritno2->fetch_assoc()){ 		
		
	 				
$styGPA2=$sqmeritno2['gpa'];
$insfmark2="INSERT INTO `borno_gpa` (`gpa`)
		
		
		 VALUES ('$styGPA2')";
		
		
 $qins2=$mysqli->query($insfmark2);
 

}
	
	$meritno="select * from borno_gpa order by gpa desc"; 
    $qmeritno=$mysqli->query($meritno);
	$sl=0;	
	while($shqmeritno=$qmeritno->fetch_assoc()){ 
	$styGPA1=$shqmeritno['gpa'];	
		
		
	
	$meritno5="select * from borno_merit_no where gpa='$styGPA1' order by grandtotal desc"; 
	
    $qmeritno5=$mysqli->query($meritno5);
	
	while($shqmeritno5=$qmeritno5->fetch_assoc()){ 	$sl++;
	

	$studin=$shqmeritno5['grandtotal']; 

	

  $insfmark1="UPDATE borno_merit_no SET meritno='$sl' where gpa='$styGPA1' AND grandtotal='$studin'";
		
		
 $qins=$mysqli->query($insfmark1);
	}
}

$meritno1="select * from borno_merit_no order by meritno"; 

    $qmeritno1=$mysqli->query($meritno1);
	while($sqqqmeritno1=$qmeritno1->fetch_assoc()){ 
	
		
		
    $mno=$sqqqmeritno1['meritno'];
	 $styGPA11=$sqqqmeritno1['gpa'];
	 $studin1=$sqqqmeritno1['grandtotal']; 

	

 $insfmark11="UPDATE borno_school_play_5_avg_merit SET meritno_section='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND gpa='$styGPA11' AND grandtotal='$studin1'";
		
		
 $qins=$mysqli->query($insfmark11);

}

//===============failno2==========================  
	$delinfo1="delete from borno_merit_no where empty='0'";
	$mysqli->query($delinfo1);

	$delinfo2="delete from borno_gpa where empty='0'";
	$mysqli->query($delinfo2); 
 
    
 $gtctmarg1="select * from borno_school_play_5_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND gpa!=0 AND failno=1 group by gpa, grandtotal";
  
    $qgtctmarg1=$mysqli->query($gtctmarg1);
	while($shgtctmarg1=$qgtctmarg1->fetch_assoc()){ 
		
		
		
		$studinfoId=$shgtctmarg1['grandtotal']; 
		
	$styGPA=$shgtctmarg1['gpa'];
		
	
		
	
$insfmark1="INSERT INTO `borno_merit_no` (`gpa`, `grandtotal`, `meritno`)
		
		
		 VALUES ('$styGPA', '$studinfoId', '0')";
		
		
 $qins1=$mysqli->query($insfmark1);
 

}

$meritno21="select * from borno_merit_no group by gpa"; 
$qmeritno21=$mysqli->query($meritno21);
	while($sqmeritno21=$qmeritno21->fetch_assoc()){ 		
		
	 				
$styGPA2=$sqmeritno21['gpa'];
$insfmark21="INSERT INTO `borno_gpa` (`gpa`)
		
		
		 VALUES ('$styGPA2')";
		
		
 $qins21=$mysqli->query($insfmark21);
 

}

	
	$meritno1="select * from borno_gpa order by gpa desc"; 
    $qmeritno1=$mysqli->query($meritno1);
	while($shqmeritno1=$qmeritno1->fetch_assoc()){ 
	$styGPA1=$shqmeritno1['gpa'];	
		
		
	
	$meritno51="select * from borno_merit_no where gpa='$styGPA1' order by grandtotal desc"; 
	
    $qmeritno51=$mysqli->query($meritno51);
	
	while($shqmeritno51=$qmeritno51->fetch_assoc()){ 	$sl++;
	

	$studin=$shqmeritno51['grandtotal']; 

	

  $insfmark11="UPDATE borno_merit_no SET meritno='$sl' where gpa='$styGPA1' AND grandtotal='$studin'";
		
		
 $qins1=$mysqli->query($insfmark11);
	}
}

$meritno11="select * from borno_merit_no order by meritno"; 

    $qmeritno11=$mysqli->query($meritno11);
	while($sqqqmeritno11=$qmeritno11->fetch_assoc()){ 
	
		
		
    $mno=$sqqqmeritno11['meritno'];
	 $styGPA11=$sqqqmeritno11['gpa'];
	 $studin1=$sqqqmeritno11['grandtotal']; 

	

 $insfmark111="UPDATE borno_school_play_5_avg_merit SET meritno_section='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND gpa='$styGPA11' AND grandtotal='$studin1'";
		
		
 $qins1=$mysqli->query($insfmark111);

}
		
//===============failno3==========================  
	$delinfo1="delete from borno_merit_no where empty='0'";
	$mysqli->query($delinfo1);

	$delinfo2="delete from borno_gpa where empty='0'";
	$mysqli->query($delinfo2);
    
 $gtctmarg1="select * from borno_school_play_5_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND gpa!=0 AND failno=2 group by gpa, grandtotal";
  
    $qgtctmarg1=$mysqli->query($gtctmarg1);
	while($shgtctmarg1=$qgtctmarg1->fetch_assoc()){ 
		
		
		
		$studinfoId=$shgtctmarg1['grandtotal']; 
		
	$styGPA=$shgtctmarg1['gpa'];
		
	
		
	
$insfmark1="INSERT INTO `borno_merit_no` (`gpa`, `grandtotal`, `meritno`)
		
		
		 VALUES ('$styGPA', '$studinfoId', '0')";
		
		
 $qins1=$mysqli->query($insfmark1);
 

}

$meritno21="select * from borno_merit_no group by gpa"; 
$qmeritno21=$mysqli->query($meritno21);
	while($sqmeritno21=$qmeritno21->fetch_assoc()){ 		
		
	 				
$styGPA2=$sqmeritno21['gpa'];
$insfmark21="INSERT INTO `borno_gpa` (`gpa`)
		
		
		 VALUES ('$styGPA2')";
		
		
 $qins21=$mysqli->query($insfmark21);
 

}
	
	$meritno1="select * from borno_gpa order by gpa desc"; 
    $qmeritno1=$mysqli->query($meritno1);
	while($shqmeritno1=$qmeritno1->fetch_assoc()){ 
	$styGPA1=$shqmeritno1['gpa'];	
		
		
	
	$meritno51="select * from borno_merit_no where gpa='$styGPA1' order by grandtotal desc"; 
	
    $qmeritno51=$mysqli->query($meritno51);
	
	while($shqmeritno51=$qmeritno51->fetch_assoc()){ 	$sl++;
	

	$studin=$shqmeritno51['grandtotal']; 

	

  $insfmark11="UPDATE borno_merit_no SET meritno='$sl' where gpa='$styGPA1' AND grandtotal='$studin'";
		
		
 $qins1=$mysqli->query($insfmark11);
	}
}

$meritno11="select * from borno_merit_no order by meritno"; 

    $qmeritno11=$mysqli->query($meritno11);
	while($sqqqmeritno11=$qmeritno11->fetch_assoc()){ 
	
		
		
    $mno=$sqqqmeritno11['meritno'];
	 $styGPA11=$sqqqmeritno11['gpa'];
	 $studin1=$sqqqmeritno11['grandtotal']; 

	

 $insfmark111="UPDATE borno_school_play_5_avg_merit SET meritno_section='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND gpa='$styGPA11' AND grandtotal='$studin1'";
		
		
 $qins1=$mysqli->query($insfmark111);

}

	$gtcmerit="select * from borno_merit_position order by number";
	$qgtcmerit=$mysqli->query($gtcmerit);
	while($shqgtcmerit=$qgtcmerit->fetch_assoc()){
	
	$number=$shqgtcmerit['number'];
	$positionlist=$shqgtcmerit['positionlist'];

	$gtctmarg="select * from borno_school_play_5_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' order by meritno_section asc";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
	
		
		
  		$studinfoId=$shgtctmarg['borno_student_info_id']; 
	    $meritno=$shgtctmarg['meritno_section']; 
		
			if($meritno==$number) {

	
		
	$insfmark111="UPDATE borno_school_play_5_avg_merit SET merit_section='$positionlist' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId'";
		
		
 $qins=$mysqli->query($insfmark111);
 
 } 
}
}
}
//======================================Merit Section========================================


//======================================Merit Shift========================================
	$delinfo1="delete from borno_merit_no where empty='0'";
	$mysqli->query($delinfo1);

	$delinfo2="delete from borno_gpa where empty='0'";
	$mysqli->query($delinfo2);


if($studClass1==1 OR $studClass1==2)
{
//=====================failno0=========================    
 $gtctmarg="select * from borno_school_910_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_subject_nine_ten_dept='$group1' AND gpa!=0 AND failno=0 group by gpa, grandtotal";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
		
		
		
		$studinfoId=$shgtctmarg['grandtotal']; 
		
	$styGPA=$shgtctmarg['gpa'];
		
	
		
	
$insfmark="INSERT INTO `borno_merit_no` (`gpa`, `grandtotal`, `meritno`)
		
		
		 VALUES ('$styGPA', '$studinfoId', '0')";
		
		
 $qins=$mysqli->query($insfmark);
 

}


		
		
$meritno2="select * from borno_merit_no group by gpa"; 
$qmeritno2=$mysqli->query($meritno2);
	while($sqmeritno2=$qmeritno2->fetch_assoc()){ 		
		
	 				
$styGPA2=$sqmeritno2['gpa'];
$insfmark2="INSERT INTO `borno_gpa` (`gpa`)
		
		
		 VALUES ('$styGPA2')";
		
		
 $qins2=$mysqli->query($insfmark2);
 

}
	
	$meritno="select * from borno_gpa order by gpa desc"; 
    $qmeritno=$mysqli->query($meritno);
	$sl=0;	
	while($shqmeritno=$qmeritno->fetch_assoc()){ 
	$styGPA1=$shqmeritno['gpa'];	
		
		
	
	$meritno5="select * from borno_merit_no where gpa='$styGPA1' order by grandtotal desc"; 
	
    $qmeritno5=$mysqli->query($meritno5);
	
	while($shqmeritno5=$qmeritno5->fetch_assoc()){ 	$sl++;
	

	$studin=$shqmeritno5['grandtotal']; 

	

  $insfmark1="UPDATE borno_merit_no SET meritno='$sl' where gpa='$styGPA1' AND grandtotal='$studin'";
		
		
 $qins=$mysqli->query($insfmark1);
	}
}

$meritno1="select * from borno_merit_no order by meritno"; 

    $qmeritno1=$mysqli->query($meritno1);
	while($sqqqmeritno1=$qmeritno1->fetch_assoc()){ 
	
		
		
    $mno=$sqqqmeritno1['meritno'];
	 $styGPA11=$sqqqmeritno1['gpa'];
	 $studin1=$sqqqmeritno1['grandtotal']; 

	

 $insfmark11="UPDATE borno_school_910_avg_merit SET meritno_shift='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_subject_nine_ten_dept='$group1' AND gpa='$styGPA11' AND grandtotal='$studin1'";
		
		
 $qins=$mysqli->query($insfmark11);

		}

	$delinfo1="delete from borno_merit_no where empty='0'";
	$mysqli->query($delinfo1);

	$delinfo2="delete from borno_gpa where empty='0'";
	$mysqli->query($delinfo2);	
//=====================failno1=========================    
 $gtctmarg="select * from borno_school_910_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_subject_nine_ten_dept='$group1' AND gpa!=0 AND failno=1 group by gpa, grandtotal";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
		
		
		
		$studinfoId=$shgtctmarg['grandtotal']; 
		
	$styGPA=$shgtctmarg['gpa'];
		
	
		
	
$insfmark="INSERT INTO `borno_merit_no` (`gpa`, `grandtotal`, `meritno`)
		
		
		 VALUES ('$styGPA', '$studinfoId', '0')";
		
		
 $qins=$mysqli->query($insfmark);
 

}


		
		
$meritno2="select * from borno_merit_no group by gpa"; 
$qmeritno2=$mysqli->query($meritno2);
	while($sqmeritno2=$qmeritno2->fetch_assoc()){ 		
		
	 				
$styGPA2=$sqmeritno2['gpa'];
$insfmark2="INSERT INTO `borno_gpa` (`gpa`)
		
		
		 VALUES ('$styGPA2')";
		
		
 $qins2=$mysqli->query($insfmark2);
 

}
	
	$meritno="select * from borno_gpa order by gpa desc"; 
    $qmeritno=$mysqli->query($meritno);
	while($shqmeritno=$qmeritno->fetch_assoc()){ 
	$styGPA1=$shqmeritno['gpa'];	
		
		
	
	$meritno5="select * from borno_merit_no where gpa='$styGPA1' order by grandtotal desc"; 
	
    $qmeritno5=$mysqli->query($meritno5);
	
	while($shqmeritno5=$qmeritno5->fetch_assoc()){ 	$sl++;
	

	$studin=$shqmeritno5['grandtotal']; 

	

  $insfmark1="UPDATE borno_merit_no SET meritno='$sl' where gpa='$styGPA1' AND grandtotal='$studin'";
		
		
 $qins=$mysqli->query($insfmark1);
	}
}

$meritno1="select * from borno_merit_no order by meritno"; 

    $qmeritno1=$mysqli->query($meritno1);
	while($sqqqmeritno1=$qmeritno1->fetch_assoc()){ 
	
		
		
    $mno=$sqqqmeritno1['meritno'];
	 $styGPA11=$sqqqmeritno1['gpa'];
	 $studin1=$sqqqmeritno1['grandtotal']; 

	

 $insfmark11="UPDATE borno_school_910_avg_merit SET meritno_shift='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_subject_nine_ten_dept='$group1' AND gpa='$styGPA11' AND grandtotal='$studin1'";
		
		
 $qins=$mysqli->query($insfmark11);

		}

	$delinfo1="delete from borno_merit_no where empty='0'";
	$mysqli->query($delinfo1);

	$delinfo2="delete from borno_gpa where empty='0'";
	$mysqli->query($delinfo2);		
//=====================failno0=========================    
 $gtctmarg="select * from borno_school_910_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_subject_nine_ten_dept='$group1' AND gpa!=0 AND failno=2 group by gpa, grandtotal";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
		
		
		
		$studinfoId=$shgtctmarg['grandtotal']; 
		
	$styGPA=$shgtctmarg['gpa'];
		
	
		
	
$insfmark="INSERT INTO `borno_merit_no` (`gpa`, `grandtotal`, `meritno`)
		
		
		 VALUES ('$styGPA', '$studinfoId', '0')";
		
		
 $qins=$mysqli->query($insfmark);
 

}


		
		
$meritno2="select * from borno_merit_no group by gpa"; 
$qmeritno2=$mysqli->query($meritno2);
	while($sqmeritno2=$qmeritno2->fetch_assoc()){ 		
		
	 				
$styGPA2=$sqmeritno2['gpa'];
$insfmark2="INSERT INTO `borno_gpa` (`gpa`)
		
		
		 VALUES ('$styGPA2')";
		
		
 $qins2=$mysqli->query($insfmark2);
 

}
	
	$meritno="select * from borno_gpa order by gpa desc"; 
    $qmeritno=$mysqli->query($meritno);
	while($shqmeritno=$qmeritno->fetch_assoc()){ 
	$styGPA1=$shqmeritno['gpa'];	
		
		
	
	$meritno5="select * from borno_merit_no where gpa='$styGPA1' order by grandtotal desc"; 
	
    $qmeritno5=$mysqli->query($meritno5);
	
	while($shqmeritno5=$qmeritno5->fetch_assoc()){ 	$sl++;
	

	$studin=$shqmeritno5['grandtotal']; 

	

  $insfmark1="UPDATE borno_merit_no SET meritno='$sl' where gpa='$styGPA1' AND grandtotal='$studin'";
		
		
 $qins=$mysqli->query($insfmark1);
	}
}

$meritno1="select * from borno_merit_no order by meritno"; 

    $qmeritno1=$mysqli->query($meritno1);
	while($sqqqmeritno1=$qmeritno1->fetch_assoc()){ 
	
		
		
    $mno=$sqqqmeritno1['meritno'];
	 $styGPA11=$sqqqmeritno1['gpa'];
	 $studin1=$sqqqmeritno1['grandtotal']; 

	

 $insfmark11="UPDATE borno_school_910_avg_merit SET meritno_shift='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_subject_nine_ten_dept='$group1' AND gpa='$styGPA11' AND grandtotal='$studin1'";
		
		
 $qins=$mysqli->query($insfmark11);

		}		
		
	$gtcmerit="select * from borno_merit_position order by number";
	$qgtcmerit=$mysqli->query($gtcmerit);
	while($shqgtcmerit=$qgtcmerit->fetch_assoc()){
	
	$number=$shqgtcmerit['number'];
	$positionlist=$shqgtcmerit['positionlist'];

	$gtctmarg="select * from borno_school_910_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_subject_nine_ten_dept='$group1' order by meritno_shift asc";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
	
		
		
  		$studinfoId=$shgtctmarg['borno_student_info_id']; 
	    $meritno=$shgtctmarg['meritno_shift']; 
		
			if($meritno==$number) {

	
		
	$insfmark111="UPDATE borno_school_910_avg_merit SET merit_shift='$positionlist' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_subject_nine_ten_dept='$group1' AND borno_student_info_id='$studinfoId'";
		
		
 $qins=$mysqli->query($insfmark111);
 
 } 
}
}
}
elseif($studClass1==3 OR $studClass1==4 OR $studClass1==5)
{
//=======================failno0============================    
 $gtctmarg="select * from borno_school_68_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND gpa!=0 AND failno=0 group by gpa, grandtotal";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
		
		
		
		$studinfoId=$shgtctmarg['grandtotal']; 
		
	$styGPA=$shgtctmarg['gpa'];
		
	
		
	
$insfmark="INSERT INTO `borno_merit_no` (`gpa`, `grandtotal`, `meritno`)
		
		
		 VALUES ('$styGPA', '$studinfoId', '0')";
		
		
 $qins=$mysqli->query($insfmark);
 

}


		
		
$meritno2="select * from borno_merit_no group by gpa"; 
$qmeritno2=$mysqli->query($meritno2);
	while($sqmeritno2=$qmeritno2->fetch_assoc()){ 		
		
	 				
$styGPA2=$sqmeritno2['gpa'];
$insfmark2="INSERT INTO `borno_gpa` (`gpa`)
		
		
		 VALUES ('$styGPA2')";
		
		
 $qins2=$mysqli->query($insfmark2);
 

}
	
	$meritno="select * from borno_gpa order by gpa desc"; 
    $qmeritno=$mysqli->query($meritno);
	$sl=0;	
	while($shqmeritno=$qmeritno->fetch_assoc()){ 
	$styGPA1=$shqmeritno['gpa'];	
		
		
	
	$meritno5="select * from borno_merit_no where gpa='$styGPA1' order by grandtotal desc"; 
	
    $qmeritno5=$mysqli->query($meritno5);
	
	while($shqmeritno5=$qmeritno5->fetch_assoc()){ 	$sl++;
	

	$studin=$shqmeritno5['grandtotal']; 

	

  $insfmark1="UPDATE borno_merit_no SET meritno='$sl' where gpa='$styGPA1' AND grandtotal='$studin'";
		
		
 $qins=$mysqli->query($insfmark1);
	}
}

$meritno1="select * from borno_merit_no order by meritno"; 

    $qmeritno1=$mysqli->query($meritno1);
	while($sqqqmeritno1=$qmeritno1->fetch_assoc()){ 
	
		
		
    $mno=$sqqqmeritno1['meritno'];
	 $styGPA11=$sqqqmeritno1['gpa'];
	 $studin1=$sqqqmeritno1['grandtotal']; 

	

 $insfmark11="UPDATE borno_school_68_avg_merit SET meritno_shift='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND gpa='$styGPA11' AND grandtotal='$studin1'";
		
		
 $qins=$mysqli->query($insfmark11);

		}


	$delinfo1="delete from borno_merit_no where empty='0'";
	$mysqli->query($delinfo1);

	$delinfo2="delete from borno_gpa where empty='0'";
	$mysqli->query($delinfo2);		
//=======================failno1============================    
 $gtctmarg="select * from borno_school_68_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND gpa!=0 AND failno=1 group by gpa, grandtotal";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
		
		
		
		$studinfoId=$shgtctmarg['grandtotal']; 
		
	$styGPA=$shgtctmarg['gpa'];
		
	
		
	
$insfmark="INSERT INTO `borno_merit_no` (`gpa`, `grandtotal`, `meritno`)
		
		
		 VALUES ('$styGPA', '$studinfoId', '0')";
		
		
 $qins=$mysqli->query($insfmark);
 

}


		
		
$meritno2="select * from borno_merit_no group by gpa"; 
$qmeritno2=$mysqli->query($meritno2);
	while($sqmeritno2=$qmeritno2->fetch_assoc()){ 		
		
	 				
$styGPA2=$sqmeritno2['gpa'];
$insfmark2="INSERT INTO `borno_gpa` (`gpa`)
		
		
		 VALUES ('$styGPA2')";
		
		
 $qins2=$mysqli->query($insfmark2);
 

}
	
	$meritno="select * from borno_gpa order by gpa desc"; 
    $qmeritno=$mysqli->query($meritno);
	while($shqmeritno=$qmeritno->fetch_assoc()){ 
	$styGPA1=$shqmeritno['gpa'];	
		
		
	
	$meritno5="select * from borno_merit_no where gpa='$styGPA1' order by grandtotal desc"; 
	
    $qmeritno5=$mysqli->query($meritno5);
	
	while($shqmeritno5=$qmeritno5->fetch_assoc()){ 	$sl++;
	

	$studin=$shqmeritno5['grandtotal']; 

	

  $insfmark1="UPDATE borno_merit_no SET meritno='$sl' where gpa='$styGPA1' AND grandtotal='$studin'";
		
		
 $qins=$mysqli->query($insfmark1);
	}
}

$meritno1="select * from borno_merit_no order by meritno"; 

    $qmeritno1=$mysqli->query($meritno1);
	while($sqqqmeritno1=$qmeritno1->fetch_assoc()){ 
	
		
		
    $mno=$sqqqmeritno1['meritno'];
	 $styGPA11=$sqqqmeritno1['gpa'];
	 $studin1=$sqqqmeritno1['grandtotal']; 

	

 $insfmark11="UPDATE borno_school_68_avg_merit SET meritno_shift='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND gpa='$styGPA11' AND grandtotal='$studin1'";
		
		
 $qins=$mysqli->query($insfmark11);

		}

	$delinfo1="delete from borno_merit_no where empty='0'";
	$mysqli->query($delinfo1);

	$delinfo2="delete from borno_gpa where empty='0'";
	$mysqli->query($delinfo2);		
	//=======================failno2============================    
 $gtctmarg="select * from borno_school_68_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND gpa!=0 AND failno=2 group by gpa, grandtotal";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
		
		
		
		$studinfoId=$shgtctmarg['grandtotal']; 
		
	$styGPA=$shgtctmarg['gpa'];
		
	
		
	
$insfmark="INSERT INTO `borno_merit_no` (`gpa`, `grandtotal`, `meritno`)
		
		
		 VALUES ('$styGPA', '$studinfoId', '0')";
		
		
 $qins=$mysqli->query($insfmark);
 

}


		
		
$meritno2="select * from borno_merit_no group by gpa"; 
$qmeritno2=$mysqli->query($meritno2);
	while($sqmeritno2=$qmeritno2->fetch_assoc()){ 		
		
	 				
$styGPA2=$sqmeritno2['gpa'];
$insfmark2="INSERT INTO `borno_gpa` (`gpa`)
		
		
		 VALUES ('$styGPA2')";
		
		
 $qins2=$mysqli->query($insfmark2);
 

}
	
	$meritno="select * from borno_gpa order by gpa desc"; 
    $qmeritno=$mysqli->query($meritno);
	while($shqmeritno=$qmeritno->fetch_assoc()){ 
	$styGPA1=$shqmeritno['gpa'];	
		
		
	
	$meritno5="select * from borno_merit_no where gpa='$styGPA1' order by grandtotal desc"; 
	
    $qmeritno5=$mysqli->query($meritno5);
	
	while($shqmeritno5=$qmeritno5->fetch_assoc()){ 	$sl++;
	

	$studin=$shqmeritno5['grandtotal']; 

	

  $insfmark1="UPDATE borno_merit_no SET meritno='$sl' where gpa='$styGPA1' AND grandtotal='$studin'";
		
		
 $qins=$mysqli->query($insfmark1);
	}
}

$meritno1="select * from borno_merit_no order by meritno"; 

    $qmeritno1=$mysqli->query($meritno1);
	while($sqqqmeritno1=$qmeritno1->fetch_assoc()){ 
	
		
		
    $mno=$sqqqmeritno1['meritno'];
	 $styGPA11=$sqqqmeritno1['gpa'];
	 $studin1=$sqqqmeritno1['grandtotal']; 

	

 $insfmark11="UPDATE borno_school_68_avg_merit SET meritno_shift='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND gpa='$styGPA11' AND grandtotal='$studin1'";
		
		
 $qins=$mysqli->query($insfmark11);

		}
		
		
	$gtcmerit="select * from borno_merit_position order by number";
	$qgtcmerit=$mysqli->query($gtcmerit);
	while($shqgtcmerit=$qgtcmerit->fetch_assoc()){
	
	$number=$shqgtcmerit['number'];
	$positionlist=$shqgtcmerit['positionlist'];

	$gtctmarg="select * from borno_school_68_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' order by meritno_shift asc";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
	
		
		
  		$studinfoId=$shgtctmarg['borno_student_info_id']; 
	    $meritno=$shgtctmarg['meritno_shift']; 
		
			if($meritno==$number) {

	
		
	$insfmark111="UPDATE borno_school_68_avg_merit SET merit_shift='$positionlist' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId'";
		
		
 $qins=$mysqli->query($insfmark111);
 
 } 
}
}
}
else
{

//=============================failno0=========================    
 $gtctmarg="select * from borno_school_play_5_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND gpa!=0 AND failno=0 group by gpa, grandtotal";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
		
		
		
		$studinfoId=$shgtctmarg['grandtotal']; 
		
	$styGPA=$shgtctmarg['gpa'];
		
	
		
	
$insfmark="INSERT INTO `borno_merit_no` (`gpa`, `grandtotal`, `meritno`)
		
		
		 VALUES ('$styGPA', '$studinfoId', '0')";
		
		
 $qins=$mysqli->query($insfmark);
 

}


		
		
$meritno2="select * from borno_merit_no group by gpa"; 
$qmeritno2=$mysqli->query($meritno2);
	while($sqmeritno2=$qmeritno2->fetch_assoc()){ 		
		
	 				
$styGPA2=$sqmeritno2['gpa'];
$insfmark2="INSERT INTO `borno_gpa` (`gpa`)
		
		
		 VALUES ('$styGPA2')";
		
		
 $qins2=$mysqli->query($insfmark2);
 

}
	
	$meritno="select * from borno_gpa order by gpa desc"; 
    $qmeritno=$mysqli->query($meritno);
	$sl=0;	
	while($shqmeritno=$qmeritno->fetch_assoc()){ 
	$styGPA1=$shqmeritno['gpa'];	
		
		
	
	$meritno5="select * from borno_merit_no where gpa='$styGPA1' order by grandtotal desc"; 
	
    $qmeritno5=$mysqli->query($meritno5);
	
	while($shqmeritno5=$qmeritno5->fetch_assoc()){ 	$sl++;
	

	$studin=$shqmeritno5['grandtotal']; 

	

  $insfmark1="UPDATE borno_merit_no SET meritno='$sl' where gpa='$styGPA1' AND grandtotal='$studin'";
		
		
 $qins=$mysqli->query($insfmark1);
	}
}

$meritno1="select * from borno_merit_no order by meritno"; 

    $qmeritno1=$mysqli->query($meritno1);
	while($sqqqmeritno1=$qmeritno1->fetch_assoc()){ 
	
		
		
    $mno=$sqqqmeritno1['meritno'];
	 $styGPA11=$sqqqmeritno1['gpa'];
	 $studin1=$sqqqmeritno1['grandtotal']; 

	

 $insfmark11="UPDATE borno_school_play_5_avg_merit SET meritno_shift='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND gpa='$styGPA11' AND grandtotal='$studin1'";
		
		
 $qins=$mysqli->query($insfmark11);

		}


	$delinfo1="delete from borno_merit_no where empty='0'";
	$mysqli->query($delinfo1);

	$delinfo2="delete from borno_gpa where empty='0'";
	$mysqli->query($delinfo2);
//=============================failno1=========================    
 $gtctmarg="select * from borno_school_play_5_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND gpa!=0 AND failno=1 group by gpa, grandtotal";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
		
		
		
		$studinfoId=$shgtctmarg['grandtotal']; 
		
	$styGPA=$shgtctmarg['gpa'];
		
	
		
	
$insfmark="INSERT INTO `borno_merit_no` (`gpa`, `grandtotal`, `meritno`)
		
		
		 VALUES ('$styGPA', '$studinfoId', '0')";
		
		
 $qins=$mysqli->query($insfmark);
 

}


		
		
$meritno2="select * from borno_merit_no group by gpa"; 
$qmeritno2=$mysqli->query($meritno2);
	while($sqmeritno2=$qmeritno2->fetch_assoc()){ 		
		
	 				
$styGPA2=$sqmeritno2['gpa'];
$insfmark2="INSERT INTO `borno_gpa` (`gpa`)
		
		
		 VALUES ('$styGPA2')";
		
		
 $qins2=$mysqli->query($insfmark2);
 

}
	
	$meritno="select * from borno_gpa order by gpa desc"; 
    $qmeritno=$mysqli->query($meritno);
	while($shqmeritno=$qmeritno->fetch_assoc()){ 
	$styGPA1=$shqmeritno['gpa'];	
		
		
	
	$meritno5="select * from borno_merit_no where gpa='$styGPA1' order by grandtotal desc"; 
	
    $qmeritno5=$mysqli->query($meritno5);
	
	while($shqmeritno5=$qmeritno5->fetch_assoc()){ 	$sl++;
	

	$studin=$shqmeritno5['grandtotal']; 

	

  $insfmark1="UPDATE borno_merit_no SET meritno='$sl' where gpa='$styGPA1' AND grandtotal='$studin'";
		
		
 $qins=$mysqli->query($insfmark1);
	}
}

$meritno1="select * from borno_merit_no order by meritno"; 

    $qmeritno1=$mysqli->query($meritno1);
	while($sqqqmeritno1=$qmeritno1->fetch_assoc()){ 
	
		
		
    $mno=$sqqqmeritno1['meritno'];
	 $styGPA11=$sqqqmeritno1['gpa'];
	 $studin1=$sqqqmeritno1['grandtotal']; 

	

 $insfmark11="UPDATE borno_school_play_5_avg_merit SET meritno_shift='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND gpa='$styGPA11' AND grandtotal='$studin1'";
		
		
 $qins=$mysqli->query($insfmark11);

		}
		

	$delinfo1="delete from borno_merit_no where empty='0'";
	$mysqli->query($delinfo1);

	$delinfo2="delete from borno_gpa where empty='0'";
	$mysqli->query($delinfo2);		
//=============================failno2=========================    
 $gtctmarg="select * from borno_school_play_5_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND gpa!=0 AND failno=2 group by gpa, grandtotal";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
		
		
		
		$studinfoId=$shgtctmarg['grandtotal']; 
		
	$styGPA=$shgtctmarg['gpa'];
		
	
		
	
$insfmark="INSERT INTO `borno_merit_no` (`gpa`, `grandtotal`, `meritno`)
		
		
		 VALUES ('$styGPA', '$studinfoId', '0')";
		
		
 $qins=$mysqli->query($insfmark);
 

}


		
		
$meritno2="select * from borno_merit_no group by gpa"; 
$qmeritno2=$mysqli->query($meritno2);
	while($sqmeritno2=$qmeritno2->fetch_assoc()){ 		
		
	 				
$styGPA2=$sqmeritno2['gpa'];
$insfmark2="INSERT INTO `borno_gpa` (`gpa`)
		
		
		 VALUES ('$styGPA2')";
		
		
 $qins2=$mysqli->query($insfmark2);
 

}
	
	$meritno="select * from borno_gpa order by gpa desc"; 
    $qmeritno=$mysqli->query($meritno);
	while($shqmeritno=$qmeritno->fetch_assoc()){ 
	$styGPA1=$shqmeritno['gpa'];	
		
		
	
	$meritno5="select * from borno_merit_no where gpa='$styGPA1' order by grandtotal desc"; 
	
    $qmeritno5=$mysqli->query($meritno5);
	
	while($shqmeritno5=$qmeritno5->fetch_assoc()){ 	$sl++;
	

	$studin=$shqmeritno5['grandtotal']; 

	

  $insfmark1="UPDATE borno_merit_no SET meritno='$sl' where gpa='$styGPA1' AND grandtotal='$studin'";
		
		
 $qins=$mysqli->query($insfmark1);
	}
}

$meritno1="select * from borno_merit_no order by meritno"; 

    $qmeritno1=$mysqli->query($meritno1);
	while($sqqqmeritno1=$qmeritno1->fetch_assoc()){ 
	
		
		
    $mno=$sqqqmeritno1['meritno'];
	 $styGPA11=$sqqqmeritno1['gpa'];
	 $studin1=$sqqqmeritno1['grandtotal']; 

	

 $insfmark11="UPDATE borno_school_play_5_avg_merit SET meritno_shift='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND gpa='$styGPA11' AND grandtotal='$studin1'";
		
		
 $qins=$mysqli->query($insfmark11);

		}		
		
	$gtcmerit="select * from borno_merit_position order by number";
	$qgtcmerit=$mysqli->query($gtcmerit);
	while($shqgtcmerit=$qgtcmerit->fetch_assoc()){
	
	$number=$shqgtcmerit['number'];
	$positionlist=$shqgtcmerit['positionlist'];

	$gtctmarg="select * from borno_school_play_5_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' order by meritno_shift asc";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
	
		
		
  		$studinfoId=$shgtctmarg['borno_student_info_id']; 
	    $meritno=$shgtctmarg['meritno_shift']; 
		
			if($meritno==$number) {

	
		
	$insfmark111="UPDATE borno_school_play_5_avg_merit SET merit_shift='$positionlist' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId'";
		
		
 $qins=$mysqli->query($insfmark111);
 
 } 
}
}
}
//======================================Merit Shift========================================

//======================================Merit Class========================================
	$delinfo1="delete from borno_merit_no where empty='0'";
	$mysqli->query($delinfo1);

	$delinfo2="delete from borno_gpa where empty='0'";
	$mysqli->query($delinfo2);

if($studClass1==1 OR $studClass1==2)
{
//============================failno0=====================
 $gtctmarg="select * from borno_school_910_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_subject_nine_ten_dept='$group1' AND gpa!=0 AND failno=0 group by gpa, grandtotal";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
		
		
		
		$studinfoId=$shgtctmarg['grandtotal']; 
		
	$styGPA=$shgtctmarg['gpa'];
		
	
		
	
$insfmark="INSERT INTO `borno_merit_no` (`gpa`, `grandtotal`, `meritno`)
		
		
		 VALUES ('$styGPA', '$studinfoId', '0')";
		
		
 $qins=$mysqli->query($insfmark);
 

}


		
		
$meritno2="select * from borno_merit_no group by gpa"; 
$qmeritno2=$mysqli->query($meritno2);
	while($sqmeritno2=$qmeritno2->fetch_assoc()){ 		
		
	 				
$styGPA2=$sqmeritno2['gpa'];
$insfmark2="INSERT INTO `borno_gpa` (`gpa`)
		
		
		 VALUES ('$styGPA2')";
		
		
 $qins2=$mysqli->query($insfmark2);
 

}
	
	$meritno="select * from borno_gpa order by gpa desc"; 
    $qmeritno=$mysqli->query($meritno);
	$sl=0;	
	while($shqmeritno=$qmeritno->fetch_assoc()){ 
	$styGPA1=$shqmeritno['gpa'];	
		
		
	
	$meritno5="select * from borno_merit_no where gpa='$styGPA1' order by grandtotal desc"; 
	
    $qmeritno5=$mysqli->query($meritno5);
	
	while($shqmeritno5=$qmeritno5->fetch_assoc()){ 	$sl++;
	

	$studin=$shqmeritno5['grandtotal']; 

	

  $insfmark1="UPDATE borno_merit_no SET meritno='$sl' where gpa='$styGPA1' AND grandtotal='$studin'";
		
		
 $qins=$mysqli->query($insfmark1);
	}
}

$meritno1="select * from borno_merit_no order by meritno"; 

    $qmeritno1=$mysqli->query($meritno1);
	while($sqqqmeritno1=$qmeritno1->fetch_assoc()){ 
	
		
		
    $mno=$sqqqmeritno1['meritno'];
	 $styGPA11=$sqqqmeritno1['gpa'];
	 $studin1=$sqqqmeritno1['grandtotal']; 

	

 $insfmark11="UPDATE borno_school_910_avg_merit SET meritno_class='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1'  AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_subject_nine_ten_dept='$group1' AND gpa='$styGPA11' AND grandtotal='$studin1'";
		
		
 $qins=$mysqli->query($insfmark11);

		}

	$delinfo1="delete from borno_merit_no where empty='0'";
	$mysqli->query($delinfo1);

	$delinfo2="delete from borno_gpa where empty='0'";
	$mysqli->query($delinfo2);		
//============================failno1=====================
 $gtctmarg="select * from borno_school_910_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_subject_nine_ten_dept='$group1' AND gpa!=0 AND failno=1 group by gpa, grandtotal";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
		
		
		
		$studinfoId=$shgtctmarg['grandtotal']; 
		
	$styGPA=$shgtctmarg['gpa'];
		
	
		
	
$insfmark="INSERT INTO `borno_merit_no` (`gpa`, `grandtotal`, `meritno`)
		
		
		 VALUES ('$styGPA', '$studinfoId', '0')";
		
		
 $qins=$mysqli->query($insfmark);
 

}


		
		
$meritno2="select * from borno_merit_no group by gpa"; 
$qmeritno2=$mysqli->query($meritno2);
	while($sqmeritno2=$qmeritno2->fetch_assoc()){ 		
		
	 				
$styGPA2=$sqmeritno2['gpa'];
$insfmark2="INSERT INTO `borno_gpa` (`gpa`)
		
		
		 VALUES ('$styGPA2')";
		
		
 $qins2=$mysqli->query($insfmark2);
 

}
	
	$meritno="select * from borno_gpa order by gpa desc"; 
    $qmeritno=$mysqli->query($meritno);
	while($shqmeritno=$qmeritno->fetch_assoc()){ 
	$styGPA1=$shqmeritno['gpa'];	
		
		
	
	$meritno5="select * from borno_merit_no where gpa='$styGPA1' order by grandtotal desc"; 
	
    $qmeritno5=$mysqli->query($meritno5);
	
	while($shqmeritno5=$qmeritno5->fetch_assoc()){ 	$sl++;
	

	$studin=$shqmeritno5['grandtotal']; 

	

  $insfmark1="UPDATE borno_merit_no SET meritno='$sl' where gpa='$styGPA1' AND grandtotal='$studin'";
		
		
 $qins=$mysqli->query($insfmark1);
	}
}

$meritno1="select * from borno_merit_no order by meritno"; 

    $qmeritno1=$mysqli->query($meritno1);
	while($sqqqmeritno1=$qmeritno1->fetch_assoc()){ 
	
		
		
    $mno=$sqqqmeritno1['meritno'];
	 $styGPA11=$sqqqmeritno1['gpa'];
	 $studin1=$sqqqmeritno1['grandtotal']; 

	

 $insfmark11="UPDATE borno_school_910_avg_merit SET meritno_class='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1'  AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_subject_nine_ten_dept='$group1' AND gpa='$styGPA11' AND grandtotal='$studin1'";
		
		
 $qins=$mysqli->query($insfmark11);

		}


	$delinfo1="delete from borno_merit_no where empty='0'";
	$mysqli->query($delinfo1);

	$delinfo2="delete from borno_gpa where empty='0'";
	$mysqli->query($delinfo2);		
//============================failno2=====================
 $gtctmarg="select * from borno_school_910_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_subject_nine_ten_dept='$group1' AND gpa!=0 AND failno=2 group by gpa, grandtotal";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
		
		
		
		$studinfoId=$shgtctmarg['grandtotal']; 
		
	$styGPA=$shgtctmarg['gpa'];
		
	
		
	
$insfmark="INSERT INTO `borno_merit_no` (`gpa`, `grandtotal`, `meritno`)
		
		
		 VALUES ('$styGPA', '$studinfoId', '0')";
		
		
 $qins=$mysqli->query($insfmark);
 

}


		
		
$meritno2="select * from borno_merit_no group by gpa"; 
$qmeritno2=$mysqli->query($meritno2);
	while($sqmeritno2=$qmeritno2->fetch_assoc()){ 		
		
	 				
$styGPA2=$sqmeritno2['gpa'];
$insfmark2="INSERT INTO `borno_gpa` (`gpa`)
		
		
		 VALUES ('$styGPA2')";
		
		
 $qins2=$mysqli->query($insfmark2);
 

}
	
	$meritno="select * from borno_gpa order by gpa desc"; 
    $qmeritno=$mysqli->query($meritno);
	while($shqmeritno=$qmeritno->fetch_assoc()){ 
	$styGPA1=$shqmeritno['gpa'];	
		
		
	
	$meritno5="select * from borno_merit_no where gpa='$styGPA1' order by grandtotal desc"; 
	
    $qmeritno5=$mysqli->query($meritno5);
	
	while($shqmeritno5=$qmeritno5->fetch_assoc()){ 	$sl++;
	

	$studin=$shqmeritno5['grandtotal']; 

	

  $insfmark1="UPDATE borno_merit_no SET meritno='$sl' where gpa='$styGPA1' AND grandtotal='$studin'";
		
		
 $qins=$mysqli->query($insfmark1);
	}
}

$meritno1="select * from borno_merit_no order by meritno"; 

    $qmeritno1=$mysqli->query($meritno1);
	while($sqqqmeritno1=$qmeritno1->fetch_assoc()){ 
	
		
		
    $mno=$sqqqmeritno1['meritno'];
	 $styGPA11=$sqqqmeritno1['gpa'];
	 $studin1=$sqqqmeritno1['grandtotal']; 

	

 $insfmark11="UPDATE borno_school_910_avg_merit SET meritno_class='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1'  AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_subject_nine_ten_dept='$group1' AND gpa='$styGPA11' AND grandtotal='$studin1'";
		
		
 $qins=$mysqli->query($insfmark11);

		}
		
		
	$gtcmerit="select * from borno_merit_position order by number";
	$qgtcmerit=$mysqli->query($gtcmerit);
	while($shqgtcmerit=$qgtcmerit->fetch_assoc()){
	
	$number=$shqgtcmerit['number'];
	$positionlist=$shqgtcmerit['positionlist'];

	$gtctmarg="select * from borno_school_910_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_subject_nine_ten_dept='$group1' order by meritno_class asc";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
	
		
		
  		$studinfoId=$shgtctmarg['borno_student_info_id']; 
	    $meritno=$shgtctmarg['meritno_class']; 
		
			if($meritno==$number) {

	
		
	$insfmark111="UPDATE borno_school_910_avg_merit SET merit_class='$positionlist' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_subject_nine_ten_dept='$group1' AND borno_student_info_id='$studinfoId'";
		
		
 $qins=$mysqli->query($insfmark111);
 
 } 
}
}
}
elseif($studClass1==3 OR $studClass1==4 OR $studClass1==5)
{

//==========================failno0==============================
 $gtctmarg="select * from borno_school_68_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND gpa!=0 AND failno=0 group by gpa, grandtotal";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
		
		
		
		$studinfoId=$shgtctmarg['grandtotal']; 
		
	$styGPA=$shgtctmarg['gpa'];
		
	
		
	
$insfmark="INSERT INTO `borno_merit_no` (`gpa`, `grandtotal`, `meritno`)
		
		
		 VALUES ('$styGPA', '$studinfoId', '0')";
		
		
 $qins=$mysqli->query($insfmark);
 

}


		
		
$meritno2="select * from borno_merit_no group by gpa"; 
$qmeritno2=$mysqli->query($meritno2);
	while($sqmeritno2=$qmeritno2->fetch_assoc()){ 		
		
	 				
$styGPA2=$sqmeritno2['gpa'];
$insfmark2="INSERT INTO `borno_gpa` (`gpa`)
		
		
		 VALUES ('$styGPA2')";
		
		
 $qins2=$mysqli->query($insfmark2);
 

}
	
	$meritno="select * from borno_gpa order by gpa desc"; 
    $qmeritno=$mysqli->query($meritno);
	$sl=0;	
	while($shqmeritno=$qmeritno->fetch_assoc()){ 
	$styGPA1=$shqmeritno['gpa'];	
		
		
	
	$meritno5="select * from borno_merit_no where gpa='$styGPA1' order by grandtotal desc"; 
	
    $qmeritno5=$mysqli->query($meritno5);
	
	while($shqmeritno5=$qmeritno5->fetch_assoc()){ 	$sl++;
	

	$studin=$shqmeritno5['grandtotal']; 

	

  $insfmark1="UPDATE borno_merit_no SET meritno='$sl' where gpa='$styGPA1' AND grandtotal='$studin'";
		
		
 $qins=$mysqli->query($insfmark1);
	}
}

$meritno1="select * from borno_merit_no order by meritno"; 

    $qmeritno1=$mysqli->query($meritno1);
	while($sqqqmeritno1=$qmeritno1->fetch_assoc()){ 
	
		
		
    $mno=$sqqqmeritno1['meritno'];
	 $styGPA11=$sqqqmeritno1['gpa'];
	 $studin1=$sqqqmeritno1['grandtotal']; 

	

 $insfmark11="UPDATE borno_school_68_avg_merit SET meritno_class='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1'  AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND gpa='$styGPA11' AND grandtotal='$studin1'";
		
		
 $qins=$mysqli->query($insfmark11);

		}
		

	$delinfo1="delete from borno_merit_no where empty='0'";
	$mysqli->query($delinfo1);

	$delinfo2="delete from borno_gpa where empty='0'";
	$mysqli->query($delinfo2);		
//==========================failno1==============================
 $gtctmarg="select * from borno_school_68_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND gpa!=0 AND failno=1 group by gpa, grandtotal";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
		
		
		
		$studinfoId=$shgtctmarg['grandtotal']; 
		
	$styGPA=$shgtctmarg['gpa'];
		
	
		
	
$insfmark="INSERT INTO `borno_merit_no` (`gpa`, `grandtotal`, `meritno`)
		
		
		 VALUES ('$styGPA', '$studinfoId', '0')";
		
		
 $qins=$mysqli->query($insfmark);
 

}


		
		
$meritno2="select * from borno_merit_no group by gpa"; 
$qmeritno2=$mysqli->query($meritno2);
	while($sqmeritno2=$qmeritno2->fetch_assoc()){ 		
		
	 				
$styGPA2=$sqmeritno2['gpa'];
$insfmark2="INSERT INTO `borno_gpa` (`gpa`)
		
		
		 VALUES ('$styGPA2')";
		
		
 $qins2=$mysqli->query($insfmark2);
 

}
	
	$meritno="select * from borno_gpa order by gpa desc"; 
    $qmeritno=$mysqli->query($meritno);
	while($shqmeritno=$qmeritno->fetch_assoc()){ 
	$styGPA1=$shqmeritno['gpa'];	
		
		
	
	$meritno5="select * from borno_merit_no where gpa='$styGPA1' order by grandtotal desc"; 
	
    $qmeritno5=$mysqli->query($meritno5);
	
	while($shqmeritno5=$qmeritno5->fetch_assoc()){ 	$sl++;
	

	$studin=$shqmeritno5['grandtotal']; 

	

  $insfmark1="UPDATE borno_merit_no SET meritno='$sl' where gpa='$styGPA1' AND grandtotal='$studin'";
		
		
 $qins=$mysqli->query($insfmark1);
	}
}

$meritno1="select * from borno_merit_no order by meritno"; 

    $qmeritno1=$mysqli->query($meritno1);
	while($sqqqmeritno1=$qmeritno1->fetch_assoc()){ 
	
		
		
    $mno=$sqqqmeritno1['meritno'];
	 $styGPA11=$sqqqmeritno1['gpa'];
	 $studin1=$sqqqmeritno1['grandtotal']; 

	

 $insfmark11="UPDATE borno_school_68_avg_merit SET meritno_class='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1'  AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND gpa='$styGPA11' AND grandtotal='$studin1'";
		
		
 $qins=$mysqli->query($insfmark11);

		}

	$delinfo1="delete from borno_merit_no where empty='0'";
	$mysqli->query($delinfo1);

	$delinfo2="delete from borno_gpa where empty='0'";
	$mysqli->query($delinfo2);		
//==========================failno2==============================
 $gtctmarg="select * from borno_school_68_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND gpa!=0 AND failno=2 group by gpa, grandtotal";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
		
		
		
		$studinfoId=$shgtctmarg['grandtotal']; 
		
	$styGPA=$shgtctmarg['gpa'];
		
	
		
	
$insfmark="INSERT INTO `borno_merit_no` (`gpa`, `grandtotal`, `meritno`)
		
		
		 VALUES ('$styGPA', '$studinfoId', '0')";
		
		
 $qins=$mysqli->query($insfmark);
 

}


		
		
$meritno2="select * from borno_merit_no group by gpa"; 
$qmeritno2=$mysqli->query($meritno2);
	while($sqmeritno2=$qmeritno2->fetch_assoc()){ 		
		
	 				
$styGPA2=$sqmeritno2['gpa'];
$insfmark2="INSERT INTO `borno_gpa` (`gpa`)
		
		
		 VALUES ('$styGPA2')";
		
		
 $qins2=$mysqli->query($insfmark2);
 

}
	
	$meritno="select * from borno_gpa order by gpa desc"; 
    $qmeritno=$mysqli->query($meritno);
	while($shqmeritno=$qmeritno->fetch_assoc()){ 
	$styGPA1=$shqmeritno['gpa'];	
		
		
	
	$meritno5="select * from borno_merit_no where gpa='$styGPA1' order by grandtotal desc"; 
	
    $qmeritno5=$mysqli->query($meritno5);
	
	while($shqmeritno5=$qmeritno5->fetch_assoc()){ 	$sl++;
	

	$studin=$shqmeritno5['grandtotal']; 

	

  $insfmark1="UPDATE borno_merit_no SET meritno='$sl' where gpa='$styGPA1' AND grandtotal='$studin'";
		
		
 $qins=$mysqli->query($insfmark1);
	}
}

$meritno1="select * from borno_merit_no order by meritno"; 

    $qmeritno1=$mysqli->query($meritno1);
	while($sqqqmeritno1=$qmeritno1->fetch_assoc()){ 
	
		
		
    $mno=$sqqqmeritno1['meritno'];
	 $styGPA11=$sqqqmeritno1['gpa'];
	 $studin1=$sqqqmeritno1['grandtotal']; 

	

 $insfmark11="UPDATE borno_school_68_avg_merit SET meritno_class='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1'  AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND gpa='$styGPA11' AND grandtotal='$studin1'";
		
		
 $qins=$mysqli->query($insfmark11);

		}
						
	$gtcmerit="select * from borno_merit_position order by number";
	$qgtcmerit=$mysqli->query($gtcmerit);
	while($shqgtcmerit=$qgtcmerit->fetch_assoc()){
	
	$number=$shqgtcmerit['number'];
	$positionlist=$shqgtcmerit['positionlist'];

	$gtctmarg="select * from borno_school_68_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' order by meritno_class asc";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
	
		
		
  		$studinfoId=$shgtctmarg['borno_student_info_id']; 
	    $meritno=$shgtctmarg['meritno_class']; 
		
			if($meritno==$number) {

	
		
	$insfmark111="UPDATE borno_school_68_avg_merit SET merit_class='$positionlist' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId'";
		
		
 $qins=$mysqli->query($insfmark111);
 
 } 
}
}
}
else
{
//========================failno0==============================
 $gtctmarg="select * from borno_school_play_5_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND gpa!=0 AND failno=0 group by gpa, grandtotal";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
		
		
		
		$studinfoId=$shgtctmarg['grandtotal']; 
		
	$styGPA=$shgtctmarg['gpa'];
		
	
		
	
$insfmark="INSERT INTO `borno_merit_no` (`gpa`, `grandtotal`, `meritno`)
		
		
		 VALUES ('$styGPA', '$studinfoId', '0')";
		
		
 $qins=$mysqli->query($insfmark);
 

}


		
		
$meritno2="select * from borno_merit_no group by gpa"; 
$qmeritno2=$mysqli->query($meritno2);
	while($sqmeritno2=$qmeritno2->fetch_assoc()){ 		
		
	 				
$styGPA2=$sqmeritno2['gpa'];
$insfmark2="INSERT INTO `borno_gpa` (`gpa`)
		
		
		 VALUES ('$styGPA2')";
		
		
 $qins2=$mysqli->query($insfmark2);
 

}
	
	$meritno="select * from borno_gpa order by gpa desc"; 
    $qmeritno=$mysqli->query($meritno);
	$sl=0;	
	while($shqmeritno=$qmeritno->fetch_assoc()){ 
	$styGPA1=$shqmeritno['gpa'];	
		
		
	
	$meritno5="select * from borno_merit_no where gpa='$styGPA1' order by grandtotal desc"; 
	
    $qmeritno5=$mysqli->query($meritno5);
	
	while($shqmeritno5=$qmeritno5->fetch_assoc()){ 	$sl++;
	

	$studin=$shqmeritno5['grandtotal']; 

	

  $insfmark1="UPDATE borno_merit_no SET meritno='$sl' where gpa='$styGPA1' AND grandtotal='$studin'";
		
		
 $qins=$mysqli->query($insfmark1);
	}
}

$meritno1="select * from borno_merit_no order by meritno"; 

    $qmeritno1=$mysqli->query($meritno1);
	while($sqqqmeritno1=$qmeritno1->fetch_assoc()){ 
	
		
		
    $mno=$sqqqmeritno1['meritno'];
	 $styGPA11=$sqqqmeritno1['gpa'];
	 $studin1=$sqqqmeritno1['grandtotal']; 

	

 $insfmark11="UPDATE borno_school_play_5_avg_merit SET meritno_class='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1'  AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND gpa='$styGPA11' AND grandtotal='$studin1'";
		
		
 $qins=$mysqli->query($insfmark11);

		}


	$delinfo1="delete from borno_merit_no where empty='0'";
	$mysqli->query($delinfo1);

	$delinfo2="delete from borno_gpa where empty='0'";
	$mysqli->query($delinfo2);
//========================failno1==============================
 $gtctmarg="select * from borno_school_play_5_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND gpa!=0 AND failno=1 group by gpa, grandtotal";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
		
		
		
		$studinfoId=$shgtctmarg['grandtotal']; 
		
	$styGPA=$shgtctmarg['gpa'];
		
	
		
	
$insfmark="INSERT INTO `borno_merit_no` (`gpa`, `grandtotal`, `meritno`)
		
		
		 VALUES ('$styGPA', '$studinfoId', '0')";
		
		
 $qins=$mysqli->query($insfmark);
 

}


		
		
$meritno2="select * from borno_merit_no group by gpa"; 
$qmeritno2=$mysqli->query($meritno2);
	while($sqmeritno2=$qmeritno2->fetch_assoc()){ 		
		
	 				
$styGPA2=$sqmeritno2['gpa'];
$insfmark2="INSERT INTO `borno_gpa` (`gpa`)
		
		
		 VALUES ('$styGPA2')";
		
		
 $qins2=$mysqli->query($insfmark2);
 

}
	
	$meritno="select * from borno_gpa order by gpa desc"; 
    $qmeritno=$mysqli->query($meritno);
	while($shqmeritno=$qmeritno->fetch_assoc()){ 
	$styGPA1=$shqmeritno['gpa'];	
		
		
	
	$meritno5="select * from borno_merit_no where gpa='$styGPA1' order by grandtotal desc"; 
	
    $qmeritno5=$mysqli->query($meritno5);
	
	while($shqmeritno5=$qmeritno5->fetch_assoc()){ 	$sl++;
	

	$studin=$shqmeritno5['grandtotal']; 

	

  $insfmark1="UPDATE borno_merit_no SET meritno='$sl' where gpa='$styGPA1' AND grandtotal='$studin'";
		
		
 $qins=$mysqli->query($insfmark1);
	}
}

$meritno1="select * from borno_merit_no order by meritno"; 

    $qmeritno1=$mysqli->query($meritno1);
	while($sqqqmeritno1=$qmeritno1->fetch_assoc()){ 
	
		
		
    $mno=$sqqqmeritno1['meritno'];
	 $styGPA11=$sqqqmeritno1['gpa'];
	 $studin1=$sqqqmeritno1['grandtotal']; 

	

 $insfmark11="UPDATE borno_school_play_5_avg_merit SET meritno_class='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1'  AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND gpa='$styGPA11' AND grandtotal='$studin1'";
		
		
 $qins=$mysqli->query($insfmark11);

		}
		

	$delinfo1="delete from borno_merit_no where empty='0'";
	$mysqli->query($delinfo1);

	$delinfo2="delete from borno_gpa where empty='0'";
	$mysqli->query($delinfo2);		
//========================failno0==============================
 $gtctmarg="select * from borno_school_play_5_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND gpa!=0 AND failno=2 group by gpa, grandtotal";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
		
		
		
		$studinfoId=$shgtctmarg['grandtotal']; 
		
	$styGPA=$shgtctmarg['gpa'];
		
	
		
	
$insfmark="INSERT INTO `borno_merit_no` (`gpa`, `grandtotal`, `meritno`)
		
		
		 VALUES ('$styGPA', '$studinfoId', '0')";
		
		
 $qins=$mysqli->query($insfmark);
 

}


		
		
$meritno2="select * from borno_merit_no group by gpa"; 
$qmeritno2=$mysqli->query($meritno2);
	while($sqmeritno2=$qmeritno2->fetch_assoc()){ 		
		
	 				
$styGPA2=$sqmeritno2['gpa'];
$insfmark2="INSERT INTO `borno_gpa` (`gpa`)
		
		
		 VALUES ('$styGPA2')";
		
		
 $qins2=$mysqli->query($insfmark2);
 

}
	
	$meritno="select * from borno_gpa order by gpa desc"; 
    $qmeritno=$mysqli->query($meritno);
	while($shqmeritno=$qmeritno->fetch_assoc()){ 
	$styGPA1=$shqmeritno['gpa'];	
		
		
	
	$meritno5="select * from borno_merit_no where gpa='$styGPA1' order by grandtotal desc"; 
	
    $qmeritno5=$mysqli->query($meritno5);
	
	while($shqmeritno5=$qmeritno5->fetch_assoc()){ 	$sl++;
	

	$studin=$shqmeritno5['grandtotal']; 

	

  $insfmark1="UPDATE borno_merit_no SET meritno='$sl' where gpa='$styGPA1' AND grandtotal='$studin'";
		
		
 $qins=$mysqli->query($insfmark1);
	}
}

$meritno1="select * from borno_merit_no order by meritno"; 

    $qmeritno1=$mysqli->query($meritno1);
	while($sqqqmeritno1=$qmeritno1->fetch_assoc()){ 
	
		
		
    $mno=$sqqqmeritno1['meritno'];
	 $styGPA11=$sqqqmeritno1['gpa'];
	 $studin1=$sqqqmeritno1['grandtotal']; 

	

 $insfmark11="UPDATE borno_school_play_5_avg_merit SET meritno_class='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1'  AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND gpa='$styGPA11' AND grandtotal='$studin1'";
		
		
 $qins=$mysqli->query($insfmark11);

		}		
		
	$gtcmerit="select * from borno_merit_position order by number";
	$qgtcmerit=$mysqli->query($gtcmerit);
	while($shqgtcmerit=$qgtcmerit->fetch_assoc()){
	
	$number=$shqgtcmerit['number'];
	$positionlist=$shqgtcmerit['positionlist'];

	$gtctmarg="select * from borno_school_play_5_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' order by meritno_class asc";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
	
		
		
  		$studinfoId=$shgtctmarg['borno_student_info_id']; 
	    $meritno=$shgtctmarg['meritno_class']; 
		
			if($meritno==$number) {

	
		
	$insfmark111="UPDATE borno_school_play_5_avg_merit SET merit_class='$positionlist' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId'";
		
		
 $qins=$mysqli->query($insfmark111);
 
 } 
}
}
}
//======================================Merit Class========================================


if($qins) { header("location:set_gpaavgmerit_dakshin.php?msg=1&branchId=$branchId1&studClass=$studClass1&shiftId=$shiftId1&section=$section&stsess=$stsess1");} else { header('location:set_gpaavgmerit_dakshin.php?msg=2');}
										
					
	

		
		
			
 ?>

