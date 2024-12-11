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
	
	
		
		$branchId = clean_html($_POST['branchId']);
		$branchId1 = strip_tags($_POST['branchId']);
		
		$shiftId = clean_html($_POST['shiftId']);
		$shiftId1 = strip_tags($_POST['shiftId']);
		
		$teacherid = $_POST['teacherid'];
		$status = $_POST['status'];
		
	for($i=0; $i<count($status); $i++){
 	$bornoschBranch="Update `borno_teacher_login` SET `borno_teacher_status`='$status[$i]' where borno_teacher_info_id='$teacherid[$i]'";
						
		
				$qbornoschBranch = $mysqli->prepare($bornoschBranch);
				$qbornoschBranch->execute();
			
				
	}		
			
	
				if($qbornoschBranch) { header("location:active_inactive_login.php?msg=1&branchId=$branchId1&shiftId=$shiftId1"); } else { header('location:active_inactive_login.php?msg=2'); }				
				
			
 ?>

