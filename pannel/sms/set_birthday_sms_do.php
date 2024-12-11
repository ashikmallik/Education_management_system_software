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

	$smsType=$_POST['smsType'];
	
	if($smsType==1){


	$message1=strip_tags($_POST['message']);
	$schId=$_POST['schId'];	

	
	$sms="select * from `set_birthday_msg` where `schlog_id`='$schId' AND `msg_type`='1'";
	$rsQuery1 = $mysqli->query($sms);
	$smsfound=$rsQuery1->fetch_assoc();
	
	if($smsfound['msg_details']!=""){
		
		
		$bornosentSMS="UPDATE `set_birthday_msg` SET `msg_details`='$message1' 
				where `schlog_id`='$schId' AND `msg_type`='1'";
				$rsQuery = $mysqli->query($bornosentSMS);
		
		
		if($rsQuery){header("location:success_message.php?msg=4");}
		
		}
	else{

		
		$bornosentSMS="INSERT INTO `set_birthday_msg` (`schlog_id`, `msg_type`, `msg_details`) 
				VALUES ('$schId', '1','$message1')";
				$rsQuery = $mysqli->query($bornosentSMS);	
		
		
		  
		  if($rsQuery) { header("location:success_message.php?msg=3"); } else { header("location:success_message.php?msg=2"); }		
	}
	
	} else if($smsType==2){
		
		
		
		
		
		
		$message1=strip_tags($_POST['message']);
		$schId=$_POST['schId'];	
		$gtstsess=$_POST['gtstsess'];
	
	
    	$sms="select * from `set_birthday_msg` where `schlog_id`='$schId' AND `msg_type`='2'";
	$rsQuery1 = $mysqli->query($sms);
	$smsfound=$rsQuery1->fetch_assoc();
	
	if($smsfound['msg_details']!=""){
		
		
		$bornosentSMS="UPDATE `set_birthday_msg` SET `msg_details`='$message1'
				where `schlog_id`='$schId' AND `msg_type`='2'";
				$rsQuery = $mysqli->query($bornosentSMS);
		
		
		if($rsQuery){header("location:success_message.php?msg=4");}
		
		}
	else{
		
		//-------------API---Close-------------------
		
$bornosentSMS="INSERT INTO `set_birthday_msg` (`schlog_id`, `msg_type`, `msg_details`) 
				VALUES ('$schId', '2','$message1')";
				$rsQuery = $mysqli->query($bornosentSMS);	
		
		
		 if($rsQuery) { header("location:success_message.php?msg=3"); } else { header("location:success_message.php?msg=2"); }
		
	}
		
	}
	
	
		
	 
?>