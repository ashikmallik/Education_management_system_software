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


	
	$group=trim($_POST['group']);
	$number=$_POST['number'];
	$name=$_POST['name'];	
	$schId=$_POST['schId'];	
	
	
	$group123="select * from `borno_school_group` where `borno_school_id`='$schId' AND `borno_school_group_Name`='$group'";
	$rsQuery2 = $mysqli->query($group123);
	$groupfound=$rsQuery2->fetch_assoc();
	
	$groupid=$groupfound['borno_school_group_id'];


	$sms="select * from `borno_school_group_number` where `borno_school_group_id`='$groupid' AND `borno_school_group_us_name`='$name'";
	$rsQuery1 = $mysqli->query($sms);
	$smsfound=$rsQuery1->fetch_assoc();
		
		if($smsfound['borno_school_group_us_name']==$name){
			header("location:add_group_number.php?msg=3");
			
			}
			else
			{
				

		$bornosentSMS="INSERT INTO `borno_school_group_number` (`borno_school_id`, `borno_school_group_id`, `borno_school_group_us_name`, `borno_school_group_us_number`) 
				VALUES ('$schId','$groupid','$name','88$number')";
				
				
	
				$rsQuery = $mysqli->query($bornosentSMS);	
		
		
		  
		  if($rsQuery) { header("location:add_group_number.php?msg=1"); } else { header("location:add_group_number.php?msg=2"); }		
	
		}
	 
?>