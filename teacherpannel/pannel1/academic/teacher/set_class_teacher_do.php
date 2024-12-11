<?php
 require_once('teacher_top.php');
 
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
						
		$shiftId = clean_html($_POST['shiftId']);
		$shiftId1 = strip_tags($_POST['shiftId']);
		
		$teacherid = clean_html($_POST['teacherid']);
		$teacherid1 = strip_tags($_POST['teacherid']);
		
		$stsess = clean_html($_POST['stsess']);
		$stsess1 = strip_tags($_POST['stsess']);
		
		$studclass = clean_html($_POST['studClass']);
		$studclass1 = strip_tags($_POST['studClass']);
		
		$section = clean_html($_POST['section']);
		$section1 = strip_tags($_POST['section']);
		
	
		
	$branch="select * from `borno_set_class_teacher` where `borno_school_teacher_id`='$teacherid1' AND `borno_school_session`='$stsess1'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
		
		if($smsbranch['borno_school_session']!=""){
			header("location:set_class_teacher.php?msg=3");
			
			}
			else
			{
			
   $bornoschBranch="INSERT INTO `borno_set_class_teacher` (`borno_school_id`,`borno_school_branch_id`,`borno_school_shift_id`,`borno_school_teacher_id`,`borno_school_session`,`borno_school_class_id`, `borno_school_section_id`)
											
															VALUES ('1','$addBranchf','$shiftId1','$teacherid1', '$stsess1','$studclass1','$section1')";
							
							
			
				$qbornoschBranch = $mysqli->prepare($bornoschBranch);
				$qbornoschBranch->execute();
				
				if($qbornoschBranch) { header('location:set_class_teacher.php?msg=1'); } else { header('location:set_class_teacher.php?msg=2'); }	
				
			}
 
 ?>

