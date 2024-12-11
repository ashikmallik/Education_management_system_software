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
		
		$exam = clean_html($_POST['exam']);
		$exam1 = strip_tags($_POST['exam']);
		
		$passyear = clean_html($_POST['passyear']);
		$passyear1 = strip_tags($_POST['passyear']);
						
		$date= $_POST['datepicker'];
		$board= $_POST['board'];
		$roll= $_POST['roll'];
		$stuName= $_POST['stuName'];
	     $stuid= $_POST['stuid'];
		$father= $_POST['father'];
		$mother= $_POST['mother'];
		$studob= $_POST['studob'];
		$sess= $_POST['sess'];
		$roll1= $_POST['roll1'];
		$reg= $_POST['reg'];
		$gpa= $_POST['gpa'];
	

		
		for($i=0; $i<count($gpa); $i++){
										
										
										
										if($gpa[$i]!=""){
										    

	
	if ($group1!=""){ $group1=$group1; } else { $group1=0;}

	
 $insmk="INSERT INTO `borno_school_testimonial` (`borno_student_info_id`,`borno_school_id`,`borno_school_branch_id`,`borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`,`borno_school_session`,`borno_school_group`,`borno_school_passing_year`,`borno_school_exam`,`borno_school_date`,`borno_school_board`,`borno_school_roll`,`borno_school_student_name`,`borno_school_father_name`,`borno_school_mother_name`,`borno_school_dob`,`borno_school_exam_session`,`borno_school_board_roll`,`borno_school_reg`,`borno_school_gpa`)
											
											 VALUES ('$stuid[$i]','$schId','$branchId1','$studClass1', '$shiftId1', '$section1','$stsess1','$group1','$passyear1','$exam1','$date','$board','$roll[$i]','$stuName[$i]','$father[$i]','$mother[$i]','$studob[$i]','$sess[$i]','$roll1[$i]','$reg[$i]','$gpa[$i]')";
											 

											 $qterm=$mysqli->query($insmk);

}}
 
if($qterm) { header('location:testimonial_entry.php?msg=1');} else { header('location:testimonial_entry.php?msg=2');}
										
			 
		

		
		
			
 ?>

