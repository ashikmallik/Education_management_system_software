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
	
		 $branchId1 = clean_html($_POST['branchId']);
		$branchId = strip_tags($_POST['branchId']);
										
		$shiftId1 = clean_html($_POST['shiftId']);
		$shiftId = strip_tags($_POST['shiftId']);
		
		$teacherid1 = clean_html($_POST['teacherid']);
		$teacherid = strip_tags($_POST['teacherid']);
		
		$stsess1 = clean_html($_POST['stsess']);
		$stsess = strip_tags($_POST['stsess']);
		
		$dayid1 = clean_html($_POST['dayid']);
		$dayid = strip_tags($_POST['dayid']);

		$firstp1 = clean_html($_POST['firstp']);
		$firstp = strip_tags($_POST['firstp']);

		$studClass11 = clean_html($_POST['studClass1']);
		$studClass1 = strip_tags($_POST['studClass1']);

		$studSection11 = clean_html($_POST['studSection1']);
		$studSection1 = strip_tags($_POST['studSection1']);

		$sub11 = clean_html($_POST['sub1']);
		$sub1 = strip_tags($_POST['sub1']);

		$time11 = clean_html($_POST['time1']);
		$time1 = strip_tags($_POST['time1']);

        $routineid=$_POST['routineid'];







 $insroutineinfo1="UPDATE `borno_school_class_routine` SET `borno_school_class_id`='$studClass1',`borno_school_section_id`='$studSection1', `borno_school_subject_id`='$sub1',`borno_school_routine_time`='$time1' where borno_school_routine_id='$routineid'";


					$qinsroutineinfo1=$mysqli->query($insroutineinfo1);
					
 					
				if($qinsroutineinfo1) {	header("location:class_routine_manage.php?msg=3&branchId=$branchId&shiftId=$shiftId&teacherid=$teacherid&stsess=$stsess");
					
					} else
					
					{
						 header('location:class_routine_manage.php?msg=2');
						
						}
	


?>