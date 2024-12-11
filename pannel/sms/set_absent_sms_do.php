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

	$header=strip_tags($_POST['header']);
	$footer=strip_tags($_POST['footer']);
	$message1=strip_tags($_POST['message']);
	$schId=$_POST['schId'];	

	
	$sms="select * from `defalt_msg` where `schlog_id`='$schId' AND `msg_type`='1'";
	$rsQuery1 = $mysqli->query($sms);
	$smsfound=$rsQuery1->fetch_assoc();
	
	if($smsfound['msg_details']!=""){
		
		
		$bornosentSMS="UPDATE `defalt_msg` SET `msg_head`='$header',`msg_details`='$message1',`shortname`='$footer' 
				where `schlog_id`='$schId' AND `msg_type`='1'";
				$rsQuery = $mysqli->query($bornosentSMS);
		
		
		if($rsQuery){header("location:success_message.php?msg=4");}
		
		}
	else{

		
		$bornosentSMS="INSERT INTO `defalt_msg` (`schlog_id`, `msg_type`, `msg_head`,`msg_details`,`shortname`) 
				VALUES ('$schId', '1', '$header','$message1','$footer')";
				$rsQuery = $mysqli->query($bornosentSMS);	
		
		
		  
		  if($rsQuery) { header("location:success_message.php?msg=3"); } else { header("location:success_message.php?msg=2"); }		
	}
	
	} else if($smsType==2){
		
		
		
		
		
		
		$message1=strip_tags($_POST['message']);
		$schId=$_POST['schId'];	
		$gtstsess=$_POST['gtstsess'];
	
	
    	$sms="select * from `defalt_msg` where `schlog_id`='$schId' AND `msg_type`='2'";
	$rsQuery1 = $mysqli->query($sms);
	$smsfound=$rsQuery1->fetch_assoc();
	
	if($smsfound['msg_details']!=""){
		
		
		$bornosentSMS="UPDATE `defalt_msg` SET `msg_details`='$message1'
				where `schlog_id`='$schId' AND `msg_type`='2'";
				$rsQuery = $mysqli->query($bornosentSMS);
		
		
		if($rsQuery){header("location:success_message.php?msg=4");}
		
		}
	else{
		
		//-------------API---Close-------------------
		
$bornosentSMS="INSERT INTO `defalt_msg` (`schlog_id`, `msg_type`, `msg_head`,`msg_details`,`shortname`) 
				VALUES ('$schId', '2', '','$message1','')";
				$rsQuery = $mysqli->query($bornosentSMS);	
		
		
		 if($rsQuery) { header("location:success_message.php?msg=3"); } else { header("location:success_message.php?msg=2"); }
		
	}
		
	}
	
	
		
	 
?>