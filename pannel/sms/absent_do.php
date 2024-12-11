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
		
	$branchid=$_POST['branchId'];
	$classid=$_POST['studClass'];
	$shiftid=$_POST['shiftId'];
	$section=$_POST['section'];
	$stsess=trim($_POST['stsess']);	
	$message1=strip_tags($_POST['message']);
	$sendTotalSMS1=count($_POST['stdid']);
	
     $countc=strlen($message1);
    if($countc<=80){$count=1;}
    elseif($countc<=160){$count=2;}
    elseif($countc<=240){$count=3;}
    
	
	$sendTotalSMS=$sendTotalSMS1*$count;
	
	
	$avlSMS=$_POST['avlSMS'];;
	 if($sendTotalSMS>$avlSMS){
	 
	 header("location:success_message.php?msg=3");
	 
	 } else {	
		


	
	
	$stdid=$_POST['stdid'];
	$header=strip_tags($_POST['header']);
	$footer=strip_tags($_POST['footer']);
	$schId=$_POST['schId'];	
	
	
    date_default_timezone_set('Asia/Dhaka');
	$smsdate=date('Y-m-d');
	$smstime=date('H:I:s');
	
	    $s=0;
    $max = count($stdid);
	
	for($i=0; $i<count($stdid); $i++){ $s++;
		
		
		
		
		$gtstnamePhone="select * from borno_student_info where borno_student_info_id='$stdid[$i]'";
		$qgtstnamePhone=$mysqli->query($gtstnamePhone);
		$shgtstnamePhone=$qgtstnamePhone->fetch_assoc();
		
		$roll=$shgtstnamePhone['borno_school_roll'];
		$name=$shgtstnamePhone['borno_school_student_name'];
		$To=$shgtstnamePhone['borno_school_phone'];
		
		 $fmessage=$header." ".$name." ".$message1." ".$smsdate."".$footer;
		 
		 		if($s==1){
			    $numbers = $To .'",';
			}
			else if($s<$max)	{
			    $numbers = '"'.$To .'",';
			}		
			else{
			    $numbers = '"'.$To;
			}
		
		    $tonumbers.=$numbers;
		
			
	//=================API Start=======================================	
			//	$url = "http://api.rankstelecom.com/api/v3/sendsms/plain?user=mostafizbd&password=mostafizbd@01818306782&sender=8804445629160&GSM=$To&SMSText=".  urlencode($fmessage);
		
// 	 $url = "http://log.smsdokan.com.bd/smsapi?api_key=$apikey&type=text&contacts=$To&senderid=8809601000500&msg=".  urlencode($message1);			
		
// 	$headr = array();
// 	$headr[] = 'Accept: application/json';
// 	$headr[] = 'Content-type: application/json';
// 	//$headr[] = 'Authorization: basic '.$credentials;
	
// 	$ch = curl_init();
	
// 	//test
// 	curl_setopt($ch, CURLOPT_URL, $url);
	
// 	//curl_setopt($ch, CURLOPT_POST, 1);
// 	//curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($requestBody));
// 	//curl_setopt($ch, CURLOPT_USERPWD, $credentials);
// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// 	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// 	//curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
// 	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,0);
// 	curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
	
// 	$response = curl_exec ($ch); 
// 	curl_close ($ch);
	
// 	/*
// 	 * Response success or failur
// 	 */
// 	if(!empty($response)) {
// 	  echo $response;
// 	}
			
	//=================API End=======================================			
		
		
		
		
		$bornosentSMS="INSERT INTO `borno_sent_sms` (`borno_school_id`,`borno_school_branch_id`,`borno_school_class_id`,`borno_school_shift_id`,`borno_school_section_id`,`borno_school_session`,`borno_school_roll`,`borno_school_student_name`, `borno_sent_sms_phone`,`borno_sms_status`,`borno_sms_type`, `borno_sent_sms_message`,`borno_sms_date`,`borno_sms_time`,`borno_count_sms`) 
				VALUES ('$schId','$branchid','$classid','$shiftid','$section','$stsess','$roll','$name', '$To','Absent','$smsType', '$fmessage','$smsdate','$smstime','$count')";
				$rsQuery = $mysqli->query($bornosentSMS);	
		
		
		  
	//	  if($rsQuery) { header("location:success_message.php?msg=1"); } else { header("location:success_message.php?msg=2"); }		
	}
	
	
	
	
	}
	
	}
	 else if($smsType==2){
		$branchid=$_POST['branchId'];
	$classid=$_POST['studClass'];
	$shiftid=$_POST['shiftId'];
	$section=$_POST['section'];
	$stsess=trim($_POST['stsess']);	 
	$sendTotalSMS1=count($_POST['stdid']);
	$message1=strip_tags($_POST['message']);
	
		$countc=mb_strlen($_POST['message']);
    if($countc<=70){$count=2;}
    elseif($countc<=130){$count=3;}
    elseif($countc<=190){$count=4;}
    elseif($countc<=250){$count=5;}
    elseif($countc<=310){$count=6;}
	
	$sendTotalSMS=$sendTotalSMS1*$count;
	
	$avlSMS=$_POST['avlSMS'];;
	 if($sendTotalSMS>$avlSMS){
	 
	 header("location:success_message.php?msg=3");
	 
	 } else {	 
		 
		 

	
	
	$stdid=$_POST['stdid'];
	$header=strip_tags($_POST['header']);
	$footer=strip_tags($_POST['footer']);

	$schId=$_POST['schId'];	
	
	
	
    date_default_timezone_set('Asia/Dhaka');
	$smsdate=date('Y-m-d');
	$smstime=date('H:I:s');
    $s=0;
    $max = count($stdid);
	
	for($i=0; $i<count($stdid); $i++){ $s++;
		
		
		
	
		$gtstnamePhone="select * from borno_student_info where borno_student_info_id='$stdid[$i]'";
		$qgtstnamePhone=$mysqli->query($gtstnamePhone);
		$shgtstnamePhone=$qgtstnamePhone->fetch_assoc();
		
		$roll=$shgtstnamePhone['borno_school_roll'];
		$name=$shgtstnamePhone['borno_school_student_name'];
		$To=$shgtstnamePhone['borno_school_phone'];
		
		$fmessage=$message1;
		
		if($s==1){
			    $numbers = $To .'",';
			}
			else if($s<$max)	{
			    $numbers = '"'.$To .'",';
			}		
			else{
			    $numbers = '"'.$To;
			}
		
		    $tonumbers.=$numbers;
		
		//=================API Start=======================================	
				
//	$url = "http://api.rankstelecom.com/api/v3/sendsms/plain?user=mostafizbd&password=mostafizbd@01818306782&sender=8804445629160&datacoding=8&GSM=$To&SMSText=".  urlencode($fmessage);
		
// 			 $url = "http://log.smsdokan.com.bd/smsapi?api_key=$apikey&type=text&contacts=$To&senderid=8809601000500&msg=".  urlencode($message1);	
		
// 	$headr = array();
// 	$headr[] = 'Accept: application/json';
// 	$headr[] = 'Content-type: application/json';
// 	//$headr[] = 'Authorization: basic '.$credentials;
	
// 	$ch = curl_init();
	
// 	//test
// 	curl_setopt($ch, CURLOPT_URL, $url);
	
// 	//curl_setopt($ch, CURLOPT_POST, 1);
// 	//curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($requestBody));
// 	//curl_setopt($ch, CURLOPT_USERPWD, $credentials);
// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// 	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// 	//curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
// 	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,0);
// 	curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
	
// 	$response = curl_exec ($ch); 
// 	curl_close ($ch);
	
// 	/*
// 	 * Response success or failur
// 	 */
// 	if(!empty($response)) {
// 	  echo $response;
// 	}	
		
	//=================API End=======================================		
			
		
		
		
		
		$bornosentSMS="INSERT INTO `borno_sent_sms` (`borno_school_id`,`borno_school_branch_id`,`borno_school_class_id`,`borno_school_shift_id`,`borno_school_section_id`,`borno_school_session`,`borno_school_roll`,`borno_school_student_name`, `borno_sent_sms_phone`,`borno_sms_status`,`borno_sms_type`, `borno_sent_sms_message`,`borno_sms_date`,`borno_sms_time`,`borno_count_sms`) 
				VALUES ('$schId','$branchid','$classid','$shiftid','$section','$stsess','$roll','$name', '$To','Absent','$smsType', '$fmessage','$smsdate','$smstime','$count')";
				$rsQuery = $mysqli->query($bornosentSMS);	
		
		
		  
		 // 		
	}	
	
	
	
	}
		 
	 }
 	$phoneNo= [$tonumbers];
	
	
	$post_data =array(
    
           'UserName'=>'amar.school',
           'Password'=>'quicktext123',
           'Message'=>$fmessage,
           'Mask'=>'mmodel.edu',
           //'MSISDN'=>trim($phoneNo,"><\/Ref")
           'MSISDN'=>$phoneNo
    
    );

$data_json = stripslashes(json_encode($post_data, JSON_UNESCAPED_UNICODE));
//echo $post_data;
//echo $data_json;

        $ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://portal.quicktextbd.com/API/SendSMSv2");
		//added
		curl_setopt($ch, CURLOPT_TIMEOUT, 100);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 100);
		curl_setopt($ch, CURLOPT_POST, 1 );

		//added

		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC

		$result = curl_exec($ch);
		curl_close($ch);
	
if($rsQuery) { header("location:success_message.php?msg=1"); } else { header("location:success_message.php?msg=2"); }		
	 
?>