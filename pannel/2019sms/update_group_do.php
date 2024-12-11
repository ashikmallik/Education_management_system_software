<?php
ob_start();
include('../../connection.php');
/*
require_once '../lib/htmlpurifier/library/HTMLPurifier.auto.php';
    
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
*/



	$groupid=$_POST['groupid'];
	$message1=$_POST['group1'];

for($i=0; $i<count($groupid); $i++){
			
		$bornosentSMS="Update `borno_school_group` SET `borno_school_group_Name`='$message1[$i]' where `borno_school_group_id`=$groupid[$i]";
				$rsQuery = $mysqli->query($bornosentSMS);	
	
		
		  
		  if($rsQuery) { header("location:create_group.php?msg=4"); } else { header("location:create_group.php?msg=2"); }		
	
}
?>