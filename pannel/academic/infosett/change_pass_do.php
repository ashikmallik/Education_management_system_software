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
	
	$schPass = clean_html($_POST['changepw']);

$schPass1=strip_tags($_POST['changepw']);

$changepw=md5($schPass1);


if($changepw!="") {
	
	$updateSpass="UPDATE borno_school SET borno_school_logpass='$changepw' where borno_school_id='$schId'";
	
	$qchangp=$mysqli->query($updateSpass);
		
		
		
		if($qchangp) 
		
		{ header('location:change_password.php?msg=1'); }
			
	} else 
	
		
	 { header('location:change_password.php?msg=2'); }	
		
		






?>