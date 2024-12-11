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
		
		$selTerm = clean_html($_POST['term']);
		$selTerm1 = strip_tags($_POST['term']);
		
		
	$teacher= $_POST['teacher'];
	$schooling= $_POST['schooling'];
	$datepicker= $_POST['datepicker'];
		
		
		
	
		$gsess="select * from borno_school_schooling_day where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1'";
	

		
		
 	$qterm=$mysqli->query($gsess);
	$shterm=$qterm->fetch_assoc();
	
	$gtermsess=$shterm['borno_result_term_id'];
	
	if($gtermsess!="") { 
	
	$gsessdel="delete from borno_school_schooling_day where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1'";
	$qtermdel=$mysqli->query($gsessdel);
	
	$insmk="INSERT INTO `borno_school_schooling_day` (`borno_school_id`,`borno_school_branch_id`,`borno_school_class_id`,`borno_school_shift_id`,`borno_school_section_id`,`borno_school_session`, `borno_result_term_id`, `borno_school_teacher_name`,`borno_school_schooling_day`,`borno_school_publish_date`)
											
											 VALUES ('$schId','$branchId1','$studClass1','$shiftId1','$section1','$stsess1', '$selTerm1', '$teacher','$schooling','$datepicker')";
											
							
									
											 $qterm=$mysqli->query($insmk);
	
	
	header('location:set_schooling_day.php?msg=1'); } else {
		
		 
											$insmk="INSERT INTO `borno_school_schooling_day` (`borno_school_id`,`borno_school_branch_id`,`borno_school_class_id`,`borno_school_shift_id`,`borno_school_section_id`,`borno_school_session`, `borno_result_term_id`, `borno_school_teacher_name`,`borno_school_schooling_day`,`borno_school_publish_date`)
											
											 VALUES ('$schId','$branchId1','$studClass1','$shiftId1','$section1','$stsess1', '$selTerm1', '$teacher','$schooling','$datepicker')";
											
											 
									
											 $qterm=$mysqli->query($insmk);
									
								
										if($qterm) { header('location:set_schooling_day.php?msg=3');} else { header('location:set_schooling_day.php?msg=2');}
										
						  }
	

		
		
			
 ?>

