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
	$stsess=$_POST['gtstsess'];
	$branchid=$_POST['branchId'];
	
	
    date_default_timezone_set('Asia/Dhaka');
	$smsdate=date('Y-m-d');
	$smstime=date('H:I:s');
	
	 $gtTotalstudent="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$branchid' AND borno_school_session='$stsess' order by borno_school_roll asc";
	
	    $qgtTotalstudent=$mysqli->query($gtTotalstudent);
	    $shgtTotalstudent=$qgtTotalstudent->fetch_assoc();
		$sendTotalSMS=mysqli_num_rows($qgtTotalstudent);
		//$sendTotalSMS=count($shgtTotalstudent['borno_school_phone']);
		
		
		$avlSMS=$_POST['avlSMS'];
		if($sendTotalSMS>$avlSMS){
		
		header("location:success_message.php?msg=3");
		
		} else {

	
	
	
	$gtstudent="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$branchid' AND borno_school_session='$stsess' order by borno_school_roll asc";
	
	$qgtstudent=$mysqli->query($gtstudent);
	while($shroll=$qgtstudent->fetch_assoc()){ 
		
			$classid=$shroll['borno_school_class_id'];
			$shiftid=$shroll['borno_school_shift_id'];
			$section=$shroll['borno_school_section_id'];
			$roll=$shroll['borno_school_roll'];
			$name=$shroll['borno_school_student_name'];
			$To=$shroll['borno_school_phone'];
			
			
		//-------------API---START-------------------
			
		$url = "http://api.rankstelecom.com/api/v3/sendsms/plain?user=mostafizbd&password=mostafizbd@01818306782&sender=8804445629160&GSM=$To&SMSText=".  urlencode($message1);
		
		
		
	$headr = array();
	$headr[] = 'Accept: application/json';
	$headr[] = 'Content-type: application/json';
	//$headr[] = 'Authorization: basic '.$credentials;
	
	$ch = curl_init();
	
	//test
	curl_setopt($ch, CURLOPT_URL, $url);
	
	//curl_setopt($ch, CURLOPT_POST, 1);
	//curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($requestBody));
	//curl_setopt($ch, CURLOPT_USERPWD, $credentials);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	//curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,0);
	curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
	
	$response = curl_exec ($ch); 
	curl_close ($ch);
	
	/*
	 * Response success or failur
	 */
	if(!empty($response)) {
	  echo $response;
	}		
		//-------------API---Close-------------------
		$bornosentSMS="INSERT INTO `borno_sent_sms` (`borno_school_id`,`borno_school_branch_id`,`borno_school_class_id`,`borno_school_shift_id`,`borno_school_section_id`,`borno_school_session`,`borno_school_roll`,`borno_school_student_name`, `borno_sent_sms_phone`,`borno_sms_status`,`borno_sms_type`, `borno_sent_sms_message`,`borno_sms_date`,`borno_sms_time`) 
				VALUES ('$schId','$branchid','$classid','$shiftid','$section','$stsess','$roll','$name', '$To','Branch wise','$smsType', '$message1','$smsdate','$smstime')";
				$rsQuery = $mysqli->query($bornosentSMS);	

		}
		  
		  if($rsQuery) { header("location:success_message.php?msg=1"); } else { header("location:success_message.php?msg=2"); }		
		}
	
	} else if($smsType==2){
		
		
		
		
		
		
		$message1=strip_tags($_POST['message']);
		$schId=$_POST['schId'];	
		$stsess=$_POST['gtstsess'];
		$branchid=$_POST['branchId'];
	
	
	
    date_default_timezone_set('Asia/Dhaka');
	$smsdate=date('Y-m-d');
	$smstime=date('H:I:s');
	
	 $gtTotalstudent="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$branchid' AND borno_school_session='$stsess' order by borno_school_roll asc";
	
	    $qgtTotalstudent=$mysqli->query($gtTotalstudent);
	    $shgtTotalstudent=$qgtTotalstudent->fetch_assoc();
		$sendTotalSMS=mysqli_num_rows($qgtTotalstudent);
		//$sendTotalSMS=count($shgtTotalstudent['borno_school_phone']);
		
		
		$avlSMS=$_POST['avlSMS'];
		if($sendTotalSMS>$avlSMS){
		
		header("location:success_message.php?msg=3");
		
		} else {

	
	
	$gtstudent="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$branchid' AND borno_school_session='$stsess' order by borno_school_roll asc";
	
	$qgtstudent=$mysqli->query($gtstudent);
	while($shroll=$qgtstudent->fetch_assoc()){ 
		
			$classid=$shroll['borno_school_class_id'];
			$shiftid=$shroll['borno_school_shift_id'];
			$section=$shroll['borno_school_section_id'];
			$roll=$shroll['borno_school_roll'];
			$name=$shroll['borno_school_student_name'];
			$To=$shroll['borno_school_phone'];
		
			//-------------API---START-------------------
			
		
			$url = "http://api.rankstelecom.com/api/v3/sendsms/plain?user=mostafizbd&password=mostafizbd@01818306782&sender=8804445629160&datacoding=8&GSM=$To&SMSText=".  urlencode($message1);
		
		
		
	$headr = array();
	$headr[] = 'Accept: application/json';
	$headr[] = 'Content-type: application/json';
	//$headr[] = 'Authorization: basic '.$credentials;
	
	$ch = curl_init();
	
	//test
	curl_setopt($ch, CURLOPT_URL, $url);
	
	//curl_setopt($ch, CURLOPT_POST, 1);
	//curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($requestBody));
	//curl_setopt($ch, CURLOPT_USERPWD, $credentials);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	//curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,0);
	curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
	
	$response = curl_exec ($ch); 
	curl_close ($ch);
	
	/*
	 * Response success or failur
	 */
	if(!empty($response)) {
	  echo $response;
	}		
		//-------------API---Close-------------------
		$bornosentSMS="INSERT INTO `borno_sent_sms` (`borno_school_id`,`borno_school_branch_id`,`borno_school_class_id`,`borno_school_shift_id`,`borno_school_section_id`,`borno_school_session`,`borno_school_roll`,`borno_school_student_name`, `borno_sent_sms_phone`,`borno_sms_status`,`borno_sms_type`, `borno_sent_sms_message`,`borno_sms_date`,`borno_sms_time`) 
				VALUES ('$schId','$branchid','$classid','$shiftid','$section','$stsess','$roll','$name', '$To','Branch wise','$smsType', '$message1','$smsdate','$smstime')";
				$rsQuery = $mysqli->query($bornosentSMS);	
		
		}
		 if($rsQuery) { header("location:success_message.php?msg=1"); } else { header("location:success_message.php?msg=2"); }
		}
		
		
	}
	
	
		
	 
?>