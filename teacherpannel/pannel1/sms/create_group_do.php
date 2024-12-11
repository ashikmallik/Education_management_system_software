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




	$message1=$_POST['group'];
	$schId=$_POST['schId'];	

	$sms="select * from `borno_school_group` where `borno_school_id`='$schId' AND `borno_school_group_Name`='$message1'";
	$rsQuery1 = $mysqli->query($sms);
	$smsfound=$rsQuery1->fetch_assoc();
		
		if($smsfound['borno_school_group_Name']==$message1){
			header("location:create_group.php?msg=3");
			
			}
			else
			{
		$bornosentSMS="INSERT INTO `borno_school_group` (`borno_school_id`, `borno_school_group_Name`) 
				VALUES ('$schId','$message1')";
				$rsQuery = $mysqli->query($bornosentSMS);	
		
		
		  
		  if($rsQuery) { header("location:create_group.php?msg=1"); } else { header("location:create_group.php?msg=2"); }		
	
		}
	 
?>