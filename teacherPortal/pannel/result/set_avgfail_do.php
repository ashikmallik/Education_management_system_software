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
		




if($studClass==1 OR $studClass==2)
{
      $gtctmarg1="select * from borno_school_910_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1'  AND borno_result_term_id='0' AND borno_subject_nine_ten_dept='$group1' Order by borno_student_info_id asc";
  
  

    $qgtctmarg1=$mysqli->query($gtctmarg1);
	while($shgtctmarg1=$qgtctmarg1->fetch_assoc()){
	$studinfoId1=$shgtctmarg1['borno_student_info_id'];
    
		$insfmark3="UPDATE `borno_school_910_avg_merit` SET `fail_subject`='' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_subject_nine_ten_dept='$group1' AND borno_student_info_id='$studinfoId1'";		
		$qins3=$mysqli->query($insfmark3);
		
		$gtctmarg="select * from borno_class_avg_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$group1' AND borno_student_info_id='$studinfoId1' AND res_gpa=0 AND 4th_subject=0 AND uncountable=0 AND `subject_id` NOT IN (1,3) Order by subject_id asc";
  

    $qgtctmarg=$mysqli->query($gtctmarg);
	
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){
		
		
		//=============================================== Fail No ===================================
				$gtttalst="select * from borno_class_avg_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$group1' AND borno_student_info_id='$studinfoId1' AND res_gpa=0 AND 4th_subject=0 AND uncountable=0 AND `subject_id` NOT IN (1,3)";
	                $qschool=$mysqli->query($gtttalst);
					$failno=mysqli_num_rows($qschool); 
					
	$insfmark1="UPDATE`borno_school_910_avg_merit` SET failno='$failno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_subject_nine_ten_dept='$group1' AND borno_student_info_id='$studinfoId1'";		
	$qins1=$mysqli->query($insfmark1);	
   
	//============================================== Fail Subject ===================================================	
	 $totalfail1 = $shgtctmarg['subject_id'];
	
	if($totalfail1==10){$totalfail2="BGS";}
	elseif($totalfail1==2){$totalfail2="Ban";}	
	elseif($totalfail1==4){$totalfail2="Eng";}	
	else{
	$subject="select * from borno_subject_nine_ten where borno_subject_nine_ten_id= '$totalfail1'";
		 $qsubject=$mysqli->query($subject);
		 $shqsubject=$qsubject->fetch_assoc();
	  	 $totalfail2= substr($shqsubject['borno_subject_nine_ten_name'],0,4);
	}

		$subject1="select * from borno_school_910_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_subject_nine_ten_dept='$group1' AND borno_student_info_id='$studinfoId1'";
	      
		  $qsubject1=$mysqli->query($subject1);
		  $shqsubject1=$qsubject1->fetch_assoc();
		  $totalfail3= $shqsubject1['fail_subject'];
	

	
		

	if($totalfail3!='')	
	{
	$insfmark="UPDATE`borno_school_910_avg_merit` SET fail_subject='$totalfail3,$totalfail2' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_subject_nine_ten_dept='$group1' AND borno_student_info_id='$studinfoId1'";	
	}
	else
	{
	$insfmark="UPDATE`borno_school_910_avg_merit` SET fail_subject='$totalfail2' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_subject_nine_ten_dept='$group1' AND borno_student_info_id='$studinfoId1'";	
	}

		
 	$qins=$mysqli->query($insfmark);	
		
		
	}		
		
}
	}
elseif($studClass==3 OR $studClass==4 OR $studClass==5)
{
      $gtctmarg1="select * from borno_school_68_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' Order by borno_student_info_id asc";
  
  

    $qgtctmarg1=$mysqli->query($gtctmarg1);
	while($shgtctmarg1=$qgtctmarg1->fetch_assoc()){
	$studinfoId1=$shgtctmarg1['borno_student_info_id'];
	echo $studinfoId1 ." ";
	
		$insfmark3="UPDATE `borno_school_68_avg_merit` SET `fail_subject`='' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId1'";		
		$qins3=$mysqli->query($insfmark3);
		
		$gtctmarg="select * from borno_class_avg_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId1' AND res_gpa=0  AND 4th_subject=0 AND uncountable=0 AND `subject_id` NOT IN (1,3) Order by subject_id asc";
  
	
    $qgtctmarg=$mysqli->query($gtctmarg);
	
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){
		
		
		//=============================================== Fail No ===================================
				$gtttalst="select * from borno_class_avg_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId1' AND res_gpa=0  AND 4th_subject=0 AND uncountable=0 AND `subject_id` NOT IN (1,3)";
	                $qschool=$mysqli->query($gtttalst);
					$failno=mysqli_num_rows($qschool); 
					
	$insfmark1="UPDATE`borno_school_68_avg_merit` SET failno='$failno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId1'";		
	$qins1=$mysqli->query($insfmark1);	
   
	//============================================== Fail Subject ===================================================	
	 $totalfail1 = $shgtctmarg['subject_id'];
	 
	 //echo $totalfail1 ."<br>";
	
	if($totalfail1==7){$totalfail2="BGS";}
	elseif($totalfail1==1 AND $schId==51){$totalfail2="B-1";}	
	elseif($totalfail1==2 AND $schId==51){$totalfail2="B-2";}	
	elseif($totalfail1==3 AND $schId==51){$totalfail2="E-1";}	
	elseif($totalfail1==4 AND $schId==51){$totalfail2="E-2";}	
	else{ 
	$subject="select * from borno_subject_six_eight where subject_id_six_eight= '$totalfail1'";
		 $qsubject=$mysqli->query($subject);
		 $shqsubject=$qsubject->fetch_assoc();
		
		$totalfail2= substr($shqsubject['six_eight_subject_name'],0,4);
	}

		$subject1="select * from borno_school_68_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId1'";
	      
		  $qsubject1=$mysqli->query($subject1);
		  $shqsubject1=$qsubject1->fetch_assoc();
		  $totalfail3= $shqsubject1['fail_subject'];
	

	
		

	if($totalfail3!='')	
	{
	$insfmark="UPDATE`borno_school_68_avg_merit` SET fail_subject='$totalfail3,$totalfail2' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId1'";	
	}
	else
	{
	$insfmark="UPDATE`borno_school_68_avg_merit` SET fail_subject='$totalfail2' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId1'";	
	}

		
 	$qins=$mysqli->query($insfmark);	
		

		
	}		
}
	}
else
{	
      $gtctmarg1="select * from borno_school_play_5_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' Order by borno_student_info_id asc";
  
  

    $qgtctmarg1=$mysqli->query($gtctmarg1);
	while($shgtctmarg1=$qgtctmarg1->fetch_assoc()){
	$studinfoId1=$shgtctmarg1['borno_student_info_id'];
		$insfmark3="UPDATE `borno_school_play_5_avg_merit` SET `fail_subject`='' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId1'";		
		$qins3=$mysqli->query($insfmark3);

		$insfmark3="UPDATE `borno_school_play_5_avg_merit` SET `failno`='0' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId1'";		
		$qins3=$mysqli->query($insfmark3);
				
		$gtctmarg="select * from borno_class_avg_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId1' AND res_gpa=0 Order by subject_id asc";
  
	
    $qgtctmarg=$mysqli->query($gtctmarg);
	
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){
		
		
		//=============================================== Fail No ===================================
				$gtttalst="select * from borno_class_avg_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId1' AND res_gpa=0 ";
	                $qschool=$mysqli->query($gtttalst);
					$failno=mysqli_num_rows($qschool); 
					
	$insfmark1="UPDATE`borno_school_play_5_avg_merit` SET failno='$failno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId1'";		
	$qins1=$mysqli->query($insfmark1);	
   
	//============================================== Fail Subject ===================================================	
	 $totalfail1 = $shgtctmarg['subject_id'];
	$subject="select * from borno_result_subject where borno_school_id='$schId' AND borno_school_session='$stsess1' AND borno_school_class_id='$studClass1' AND borno_result_subject_id= '$totalfail1'";
		 $qsubject=$mysqli->query($subject);
		 $shqsubject=$qsubject->fetch_assoc();
		
		$totalfail2= substr($shqsubject['borno_school_subject_name'],0,4);
	

		$subject1="select * from borno_school_play_5_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId1'";
	      
		  $qsubject1=$mysqli->query($subject1);
		  $shqsubject1=$qsubject1->fetch_assoc();
		  $totalfail3= $shqsubject1['fail_subject'];
	

	
		

	if($totalfail3!='')	
	{
	$insfmark="UPDATE`borno_school_play_5_avg_merit` SET fail_subject='$totalfail3,$totalfail2' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId1'";	
	}
	else
	{
	$insfmark="UPDATE`borno_school_play_5_avg_merit` SET fail_subject='$totalfail2' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId1'";	
	}

		
 	$qins=$mysqli->query($insfmark);	
		
		
		
		
}
	}
	}

if($qins) { header("location:set_avgfail.php?msg=1&branchId=$branchId1&studClass=$studClass1&shiftId=$shiftId1&section=$section&stsess=$stsess1");} else { header('location:set_avgfail.php?msg=2');}
										
					
	

		
		
			
 ?>

