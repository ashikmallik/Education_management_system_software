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
	$apikey='R60008765e60e94e498941.65575245';
	if($smsType==1){
		
		$message1=strip_tags($_POST['message']);
		$schId=$_POST['schId'];	
		$stsess=trim($_POST['gtstsess']);
		
		
		date_default_timezone_set('Asia/Dhaka');
		$smsdate=date('Y-m-d');
		$smstime=date('H:I:s');

		$gtTotalstudent="select * from borno_student_info where borno_school_id='$schId' AND borno_school_session='$stsess' order by borno_school_roll asc";
	
	    $qgtTotalstudent=$mysqli->query($gtTotalstudent);
	    $shgtTotalstudent=$qgtTotalstudent->fetch_assoc();
		$sendTotalSMS1=count($shgtTotalstudent['borno_school_phone']);
		
	 $countc=strlen($message1);
    if($countc<=160){$count=1;}
    elseif($countc<=300){$count=2;}
    elseif($countc<=440){$count=3;}
    elseif($countc<=580){$count=4;}
    elseif($countc<=720){$count=5;}
    elseif($countc<=860){$count=6;}
	
	$sendTotalSMS=$sendTotalSMS1*$count;
		
		
		
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
			
			
			//-------------API---START-------------------
	$url = "http://api.rankstelecom.com/api/sendsms/plain?user=mostafizbd&password=mostafizbd@01818306782&sender=88044456029160&GSM=8$To&SMSText=".  urlencode($message1);
		
 //$url = "http://log.smsdokan.com.bd/smsapi?api_key=$apikey&type=text&contacts=$To&senderid=8809601000500&msg=".  urlencode($message1);

//$url = "https://71bulksms.com/sms_api/bulk_sms_sender.php?api_key=16660178185125092020/05/0708:00:04amMustafizur Rahman&type=text&sender_id=436&mobile_no=$To&User_Email=psoftbd@gmail.com&message=$message1";
		
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
		
$bornosentSMS="INSERT INTO `borno_sent_sms` (`borno_school_id`,`borno_school_branch_id`,`borno_school_class_id`,`borno_school_shift_id`,`borno_school_section_id`,`borno_school_session`,`borno_school_roll`,`borno_school_student_name`, `borno_sent_sms_phone`,`borno_sms_status`,`borno_sms_type`, `borno_sent_sms_message`,`borno_sms_date`,`borno_sms_time`,`borno_count_sms`) 
				VALUES ('$schId','$branchid','$classid','$shiftid','$section','$stsess','$roll','$name', '$To','All student','$smsType', '$message1','$smsdate','$smstime','$count')";
				$rsQuery = $mysqli->query($bornosentSMS);	
		
		}
		  
		  if($rsQuery) { header("location:success_message.php?msg=1"); } else { header("location:success_message.php?msg=2"); }		
 }
	
	} else if($smsType==2){
		
		
		
		
		
        $message1=strip_tags($_POST['message']);
		$schId=$_POST['schId'];	
		$stsess=trim($_POST['gtstsess']);
		
		
		date_default_timezone_set('Asia/Dhaka');
		$smsdate=date('Y-m-d');
		$smstime=date('H:I:s');

		$gtTotalstudent="select * from borno_student_info where borno_school_id='$schId' AND borno_school_session='$stsess' order by borno_school_roll asc";
	
	    $qgtTotalstudent=$mysqli->query($gtTotalstudent);
	    $shgtTotalstudent=$qgtTotalstudent->fetch_assoc();
		$sendTotalSMS1=count($shgtTotalstudent['borno_school_phone']);
		
	$countc=mb_strlen($message1);
    if($countc<=70){$count=1;}
    elseif($countc<=130){$count=2;}
    elseif($countc<=190){$count=3;}
    elseif($countc<=250){$count=4;}
    elseif($countc<=310){$count=5;}
    elseif($countc<=370){$count=6;}
	
	$sendTotalSMS=$sendTotalSMS1*$count;
		
		
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
		
			
			//-------------API---START-------------------
$url = "http://api.rankstelecom.com/api/v3/sendsms/plain?user=mostafizbd&password=mostafizbd@01818306782&sender=8804445629160&datacoding=8&GSM=8$To&SMSText=".  urlencode($message1);
		
 //$url = "http://log.smsdokan.com.bd/smsapi?api_key=$apikey&type=text&contacts=$To&senderid=8809601000500&msg=".  urlencode($message1);
 
//$url = "https://71bulksms.com/sms_api/bulk_sms_sender.php?api_key=16660178185125092020/05/0708:00:04amMustafizur Rahman&type=text&sender_id=536&mobile_no=$To&User_Email=psoftbd@gmail.com&message=$message1";	
		
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
		
$bornosentSMS="INSERT INTO `borno_sent_sms` (`borno_school_id`,`borno_school_branch_id`,`borno_school_class_id`,`borno_school_shift_id`,`borno_school_section_id`,`borno_school_session`,`borno_school_roll`,`borno_school_student_name`, `borno_sent_sms_phone`,`borno_sms_status`,`borno_sms_type`, `borno_sent_sms_message`,`borno_sms_date`,`borno_sms_time`,`borno_count_sms`) 
				VALUES ('$schId','$branchid','$classid','$shiftid','$section','$stsess','$roll','$name', '$To','All student','$smsType', '$message1','$smsdate','$smstime','$count')";
				$rsQuery = $mysqli->query($bornosentSMS);	
		
		}
		 if($rsQuery) { header("location:success_message.php?msg=1"); } else { header("location:success_message.php?msg=2"); }
		
		}
		
	}
	
	
		
	 
?>