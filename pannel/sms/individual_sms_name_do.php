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
$apikey='R60008765e60e94e498941.65575245';
	$schId=$_POST['schId'];	
	$branchid=$_POST['branchId'];
	$classid=$_POST['studClass'];
	$shiftid=$_POST['shiftId'];
	$section=$_POST['section'];
	$stsess=trim($_POST['stsess']);
	$stdid=$_POST['stdid'];
	$msgHead=$_POST['msgHead'];
	$message=strip_tags($_POST['message']);
    $sendTotalSMS1=count($_POST['stdid']);
    
     $countc=strlen($message);
    if($countc<=140){$count=1;}
    elseif($countc<=280){$count=2;}
    elseif($countc<=420){$count=3;}
    elseif($countc<=560){$count=4;}
    elseif($countc<=700){$count=5;}
    elseif($countc<=840){$count=6;}
    
    $sendTotalSMS=$sendTotalSMS1*$count;
  
	$avlSMS=$_POST['avlSMS'];;
	 if($sendTotalSMS>$avlSMS){
	 
	 header("location:success_message.php?msg=3");
	 
	 } else {
	
	

	
    date_default_timezone_set('Asia/Dhaka');
	$smsdate=date('Y-m-d');
	$smstime=date('H:I:s');
	
	
	
	for($i=0; $i<count($stdid); $i++){
		
		
		
		
		$gtstnamePhone="select * from borno_student_info where borno_student_info_id='$stdid[$i]'";
		$qgtstnamePhone=$mysqli->query($gtstnamePhone);
		$shgtstnamePhone=$qgtstnamePhone->fetch_assoc();
		
		$roll=$shgtstnamePhone['borno_school_roll'];
		$name=$shgtstnamePhone['borno_school_student_name'];
		$To=$shgtstnamePhone['borno_school_phone'];
		
		 $message1=$msgHead." ".$name." ".$message;
		
		
				$store= "INSERT INTO `bornosky_sms_individual` (`borno_school_id`, `borno_school_class_id`, `borno_section_id`, `borno_school_session`, `borno_school_branch_id`, `borno_school_date`, `borno_school_time`,`number` ,`message` ,`name` ,`borno_school_shift_id`,`status`,`send_status`) VALUES ('$schId', '$classid', '$section', '$stsess', '$branchid', '$smsdate', '$smstime', '$To', '$message1', '$name', '$shiftid','With Name','0')";
			
	//=================API Start=======================================	
		
		$url = "http://api.rankstelecom.com/api/sendsms/plain?user=mostafizbd&password=mostafizbd@01818306782&sender=88044456029160&GSM=$To&SMSText=".  urlencode($message1);
		
	// $url = "http://log.smsdokan.com.bd/smsapi?api_key=$apikey&type=text&contacts=$To&senderid=8809601000780&msg=".  urlencode($message1);			
		
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
		
//=================API End=======================================				
		
		$bornosentSMS="INSERT INTO `borno_sent_sms` (`borno_school_id`,`borno_school_branch_id`,`borno_school_class_id`,`borno_school_shift_id`,`borno_school_section_id`,`borno_school_session`,`borno_school_roll`,`borno_school_student_name`, `borno_sent_sms_phone`,`borno_sms_status`,`borno_sms_type`, `borno_sent_sms_message`,`borno_sms_date`,`borno_sms_time`,`borno_count_sms`) 
				VALUES ('$schId','$branchid','$classid','$shiftid','$section','$stsess','$roll','$name', '$To','individual name','1', '$message1','$smsdate','$smstime','$count')";
				$rsQuery = $mysqli->query($bornosentSMS);
		
	}
		  
		  if($rsQuery) { header("location:success_message.php?msg=1"); } else { header("location:success_message.php?msg=2"); }		
		
 }
	

		
	 
?>