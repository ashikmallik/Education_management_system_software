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
	
		$schoolName = clean_html($_POST['schoolName']);
		$schoolName1 = strip_tags($_POST['schoolName']);
		
		$Address = clean_html($_POST['Address']);
		$Address1 = strip_tags($_POST['Address']);
		
		$phone = clean_html($_POST['phone']);
		$phone1 = strip_tags($_POST['phone']);
		
		$email = clean_html($_POST['email']);
		$email1 = strip_tags($_POST['email']);
		
		$loginId = clean_html($_POST['loginId']);
		$loginId1 = strip_tags($_POST['loginId']);
		

		
		
		$bornoschBranch="UPDATE `borno_school` SET `borno_school_name`='$schoolName1',`borno_school_address`='$Address1',`borno_school_phone`='$phone1',`borno_school_email`='$email1',`borno_school_logid`='$loginId1' Where `borno_school_id`='$schId'";
															
				$qbornoschBranch = $mysqli->prepare($bornoschBranch);
				$qbornoschBranch->execute();
				
				if($qbornoschBranch) { header('location:information_pannel.php?msg=1'); } else { header('location:information_pannel.php?msg=2'); }				
				
		
 
 ?>

