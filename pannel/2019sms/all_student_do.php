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
		
			$message1=strip_tags($_POST['message']);
			$totcountSMS=strlen($message1);
			
			if($totcountSMS<=160) { $totcountSMS1=1;  }
			else if($totcountSMS>=161 AND $totcountSMS<=310 ) { $totcountSMS1=2;  }
			else if($totcountSMS>=311 AND $totcountSMS<=450 ) { $totcountSMS1=3;  }
		
		
		
		
		date_default_timezone_set('Asia/Dhaka');
		$smsdate=date('Y-m-d');
		$smstime=date('H:I:s');

		$gtTotalstudent="select * from borno_student_info where borno_school_id='$schId' AND borno_school_session='$stsess' order by borno_school_roll asc";
	
	    $qgtTotalstudent=$mysqli->query($gtTotalstudent);
	    $shgtTotalstudent=$qgtTotalstudent->fetch_assoc();
		$sendTotalSMS=count($shgtTotalstudent['borno_school_phone']);
		
		
		$avlSMS=$_POST['avlSMS'];
		if($sendTotalSMS>$avlSMS){
		
		header("location:success_message.php?msg=3");
		
		} else {
	
	$gtstudent="select * from borno_student_info where borno_school_id='$schId' AND borno_school_session='$stsess' order by borno_school_roll asc";
	
	$qgtstudent=$mysqli->query($gtstudent);
	while($shroll=$qgtstudent->fetch_assoc()){ 
			
			$branchid=$shroll['borno_school_branch_id'];
			$classid=$shroll['borno_school_class_id'];
			$shiftid=$shroll['borno_school_shift_id'];
			$section=$shroll['borno_school_section_id'];
			$roll=$shroll['borno_school_roll'];
			$name=$shroll['borno_school_student_name'];
			$To=$shroll['borno_school_phone'];	
		$stdinfoId=$shroll['borno_student_info_id'];	
			
			
			//-------------API---START-------------------
			$url = "http://api.rankstelecom.com/api/v3/sendsms/plain?user=mostafizbd&password=mostafizbd@01818306782&sender=8804445629163&type=longSMS&GSM=$To&SMSText=".  urlencode($message1);
		
		
		
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
		
$bornosentSMS="INSERT INTO `borno_sent_sms` (`borno_school_id`,`borno_student_info_id`,`borno_school_branch_id`,`borno_school_class_id`,`borno_school_shift_id`,`borno_school_section_id`,`borno_school_session`,`borno_school_roll`,`borno_school_student_name`, `borno_sent_sms_phone`,`borno_sms_status`,`borno_sms_type`, `borno_sent_sms_message`,`borno_sms_date`,`borno_sms_time`,`total_sms_count`,`bangla_message`) 
				VALUES ('$schId','$stdinfoId','$branchid','$classid','$shiftid','$section','$stsess','$roll','$name', '$To','All student','$smsType', '$message1','$smsdate','$smstime','$totcountSMS1','$message1')";
				$rsQuery = $mysqli->query($bornosentSMS);	
		
		}
		  
		  if($rsQuery) { header("location:success_message.php?msg=1"); } else { header("location:success_message.php?msg=2"); }		
 }
	
	} else if($smsType==2){
		
		
		
		
		
        $message1=strip_tags($_POST['message']);
		$schId=$_POST['schId'];	
		$stsess=$_POST['gtstsess'];
		
		$utf8 = $message1;
		$totcountSMS=mb_strlen($utf8);	
			
		if($totcountSMS<=70) { echo $totcountSMS1=1;  }
		else if($totcountSMS>=71 AND $totcountSMS<=130 ) { echo $totcountSMS1=2;  }
		else if($totcountSMS>=131 AND $totcountSMS<=196 ) { echo $totcountSMS1=3;  }
		else if($totcountSMS>=197 AND $totcountSMS<=260 ) { echo $totcountSMS1=4;  }
		else if($totcountSMS>=261 AND $totcountSMS<=330 ) { echo $totcountSMS1=5;  }
		else if($totcountSMS>=331 AND $totcountSMS<=390 ) { echo $totcountSMS1=6;  }
		
		
		date_default_timezone_set('Asia/Dhaka');
		$smsdate=date('Y-m-d');
		$smstime=date('H:I:s');

		$gtTotalstudent="select * from borno_student_info where borno_school_id='$schId' AND borno_school_session='$stsess' order by borno_school_roll asc";
	
	    $qgtTotalstudent=$mysqli->query($gtTotalstudent);
	    $shgtTotalstudent=$qgtTotalstudent->fetch_assoc();
		$sendTotalSMS=count($shgtTotalstudent['borno_school_phone']);
		
		
		$avlSMS=$_POST['avlSMS'];
		if($sendTotalSMS>$avlSMS){
		
		header("location:success_message.php?msg=3");
		
		} else {
	
	
	
	$gtstudent="select * from borno_student_info where borno_school_id='$schId' AND borno_school_session='$stsess' order by borno_school_roll asc";
	
	$qgtstudent=$mysqli->query($gtstudent);
	while($shroll=$qgtstudent->fetch_assoc()){ 

            $branchid=$shroll['borno_school_branch_id'];
			$classid=$shroll['borno_school_class_id'];
			$shiftid=$shroll['borno_school_shift_id'];
			$section=$shroll['borno_school_section_id'];
			$roll=$shroll['borno_school_roll'];
			$name=$shroll['borno_school_student_name'];		
			$To=$shroll['borno_school_phone'];
		$stdinfoId=$shroll['borno_student_info_id'];
			
			//-------------API---START-------------------
			$url = "http://api.rankstelecom.com/api/v3/sendsms/plain?user=mostafizbd&password=mostafizbd@01818306782&sender=8804445629163&datacoding=8&type=longSMS&GSM=$To&SMSText=".  urlencode($message1);
		
		
		
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
		
$bornosentSMS="INSERT INTO `borno_sent_sms` (`borno_school_id`,`borno_student_info_id`,`borno_school_branch_id`,`borno_school_class_id`,`borno_school_shift_id`,`borno_school_section_id`,`borno_school_session`,`borno_school_roll`,`borno_school_student_name`, `borno_sent_sms_phone`,`borno_sms_status`,`borno_sms_type`, `borno_sent_sms_message`,`borno_sms_date`,`borno_sms_time`,`total_sms_count`,`bangla_message`) 
				VALUES ('$schId','$stdinfoId','$branchid','$classid','$shiftid','$section','$stsess','$roll','$name', '$To','All student','$smsType', '$message1','$smsdate','$smstime','$totcountSMS1','$message1')";
				$rsQuery = $mysqli->query($bornosentSMS);	
		
		}
		 if($rsQuery) { header("location:success_message.php?msg=1"); } else { header("location:success_message.php?msg=2"); }
		
		}
		
	}
	
	
		
	 
?>