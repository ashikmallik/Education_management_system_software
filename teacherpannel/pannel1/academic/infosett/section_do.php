<?php
 require_once('information_top.php');
 
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
		
			$branch="select * from `borno_school_section` where `borno_school_id`='$schId' AND `borno_school_branch_id`='$addBranchf' AND `borno_school_class_id`='$studClass1' AND `borno_school_shift_id`='$shiftId1' AND `borno_school_section_name`='$section1'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
		
		if($smsbranch['borno_school_section_name']==$section1){
			header("location:add_section.php?msg=3");
			
			}
			else
			{
		
		
		
		$bornoschBranch="INSERT INTO `borno_school_section` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_name`)
											
															VALUES ('$schId', '$addBranchf', '$studClass1', '$shiftId1', '$section1')";
															
				$qbornoschBranch = $mysqli->prepare($bornoschBranch);
				$qbornoschBranch->execute();
				
				if($qbornoschBranch) { header("location:add_section.php?msg=1&branchId=$addBranchf&studClass=$studClass1&shiftId=$shiftId1"); } else { header('location:add_section.php?msg=2'); }				
				
			}
 
 ?>

