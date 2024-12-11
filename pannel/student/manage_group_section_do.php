<?php
 require_once('student_top.php');
 
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
	
		$addBranch = clean_html($_POST['branchId']);
		 $addBranchf = strip_tags($_POST['branchId']);
						
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
		

$bornoschBranch="UPDATE `borno_student_info` SET `borno_school_stud_group`='$group1' where `borno_school_id`='$schId' AND `borno_school_branch_id`='$addBranchf' AND `borno_school_class_id`='$studClass1' AND `borno_school_shift_id`='$shiftId1' AND `borno_school_section_id`='$section1' AND `borno_school_session`='$stsess1'";
					
				$qbornoschBranch = $mysqli->prepare($bornoschBranch);
				$qbornoschBranch->execute();
				
				if($qbornoschBranch) { header("location:manage_group_section.php?msg=1&branchId=$addBranchf&studClass=$studClass1&shiftId=$shiftId1&section=$section1&stsess=$stsess1"); } else { header('location:manage_group_section.php?msg=2'); }					
			
 
 ?>

