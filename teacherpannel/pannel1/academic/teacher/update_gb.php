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
						
		$mgtType = clean_html($_POST['mgtType']);
		$mgtType1 = strip_tags($_POST['mgtType']);
		
		$teacher = clean_html($_POST['teacher']);
		$teacher1 = strip_tags($_POST['teacher']);
		
		$address = clean_html($_POST['address']);
		$address1 = strip_tags($_POST['address']);
		
		$stfdesig = clean_html($_POST['stfdesig']);
		$stfdesig1 = strip_tags($_POST['stfdesig']);
		
		$phone = clean_html($_POST['phone']);
		$phone1 = strip_tags($_POST['phone']);
		
		$techId = strip_tags($_POST['techId']);
		
		
		
	$bornoschBranch="Update `borno_gb_info` SET `borno_school_id`='$schId', `borno_school_branch_id`='$addBranchf', `borno_gb_type`='$mgtType1', `borno_gb_name`='$teacher1', `borno_gb_address`= '$address1', `borno_gb_desig`='$stfdesig1', `borno_gb_phone`='$phone1' where borno_gb_info_id='$techId' ";
													
				$qbornoschBranch = $mysqli->prepare($bornoschBranch);
				$qbornoschBranch->execute();
				
				if($qbornoschBranch) { header('location:manage_gb.php?msg=1'); } else { header('location:manage_gb.php?msg=2'); }				
				
			
 ?>

