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
//	$apikey='R60008765e60e94e498941.6557521557';
	if($smsType==1){
		
	$schId=$_POST['schId'];	
	$branchid=$_POST['branchid'];	
	$classid=$_POST['classid'];	
	$shiftid=$_POST['shiftid'];	
	$section=$_POST['section'];	
	$stsess=trim($_POST['stsess']);	
	$stdid=$_POST['stdid'];
	$sendTotalSMS1=count($_POST['stdid']);
	$message1=strip_tags($_POST['message']);	
	
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
	
	
	
	
    date_default_timezone_set('Asia/Dhaka');
	$smsdate=date('Y-m-d');
	$smstime=date('H:I:s');
	
	
	$s=0;
    $max = count($stdid);
	
	
	for($i=0; $i<count($stdid); $i++){ $s++;
		
	$gtstudent="select * from borno_student_info where borno_student_info_id='$stdid[$i]'";
	$qgtstudent=$mysqli->query($gtstudent);
	while($shroll=$qgtstudent->fetch_assoc()){ 
	

			$roll=$shroll['borno_school_roll'];
			$name=$shroll['borno_school_student_name'];
			$To=$shroll['borno_school_phone'];
			
	//-------------for masking-------------------	
						
	//				$fmessage=$message1;
		
// 		if($s==1){
// 			    $numbers = $To .'",';
// 			}
// 			else if($s<$max)	{
// 			    $numbers = '"'.$To .'",';
// 			}		
// 			else{
// 			    $numbers = '"'.$To;
// 			}
		
// 		    $tonumbers.=$numbers;
		    
	//-------------for non-masking-------------------	
		    			$numbers = $To . ',';
		
		    $tonumbers .=  $numbers;
			
// 		$store= "INSERT INTO `bornosky_sms_individual` (`borno_school_id`, `borno_school_class_id`, `borno_section_id`, `borno_school_session`, `borno_school_branch_id`, `borno_school_date`, `borno_school_time`,`number` ,`message` ,`name` ,`borno_school_shift_id`,`status`,`send_status`) VALUES ('$schId', '$classid', '$section', '$stsess', '$branchid', '$smsdate', '$smstime', '$To', '$message1', '$name', '$shiftid','Without Name','0')";	
		
// 		$rsQuery2 = $mysqli->query($store);
			
		//=================API Start=======================================	
// 	$url = "http://api.rankstelecom.com/api/sendsms/plain?user=mostafizbd&password=mostafizbd@01818306782&sender=8804415576029160&GSM=$To&SMSText=".  urlencode($message1);
		
// 		// $url = "https://api.mobireach.com.bd/SendTextMessage?Username=psoft&Password=Bornoskybd@01818306782&From=8801847159930&To=$To&Message=".  urlencode($message1);
	
// 	 //$url = "http://log.smsdokan.com.bd/smsapi?api_key=$apikey&type=text&contacts=$To&senderid=8809601000780&msg=".  urlencode($message1);
	 
// // $url = "https://71bulksms.com/sms_api/bulk_sms_sender.php?api_key=16660178185125092020/05/0708:00:04amMustafizur Rahman&type=text&sender_id=436&mobile_no=$To&User_Email=psoftbd@gmail.com&message=$message1";	
		

		
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
	
	
$ap_key='177161949137347020230717045327amE2QSBl5b'; 
$sender_id='105';
$mobile_no=$tonumbers;
$message=$fmessage;
$user_email='bdsoft2020@gmail.com';
techno_bulk_sms($ap_key,$sender_id,$mobile_no,$message,$user_email);
	/*
	 * Response success or failur
	 */
// 	if(!empty($response)) {
// 	  echo $response;
// 	}
		
		
		//=================API End=======================================			
		
		$bornosentSMS="INSERT INTO `borno_sent_sms` (`borno_school_id`,`borno_school_branch_id`,`borno_school_class_id`,`borno_school_shift_id`,`borno_school_section_id`,`borno_school_session`,`borno_school_roll`,`borno_school_student_name`, `borno_sent_sms_phone`,`borno_sms_status`,`borno_sms_type`, `borno_sent_sms_message`,`borno_sms_date`,`borno_sms_time`,`borno_count_sms`) 
				VALUES ('$schId','$branchid','$classid','$shiftid','$section','$stsess','$roll','$name', '$To','individual','$smsType', '$message1','$smsdate','$smstime','$count')";
				$rsQuery = $mysqli->query($bornosentSMS);	
		
		}
	}
	 if($rsQuery) { header("location:success_message.php?msg=1"); } else { header("location:success_message.php?msg=2"); }		
	 }
	
	} else if($smsType==2){
		
	$schId=$_POST['schId'];	
	$branchid=$_POST['branchid'];	
	$classid=$_POST['classid'];	
	$shiftid=$_POST['shiftid'];	
	$section=$_POST['section'];	
	$stsess=trim($_POST['stsess']);	
	$stdid=$_POST['stdid'];		
	$sendTotalSMS1=count($_POST['stdid']);
	
	$message1=strip_tags($_POST['message']);	
		
	$countc=mb_strlen($_POST['message']);
    if($countc<=70){$count=1;}
    elseif($countc<=130){$count=2;}
    elseif($countc<=190){$count=3;}
    elseif($countc<=250){$count=4;}
    elseif($countc<=310){$count=5;}
    elseif($countc<=370){$count=6;}
	
	$sendTotalSMS=$sendTotalSMS1*$count;	

	$avlSMS=$_POST['avlSMS'];;
	 if($sendTotalSMS>$avlSMS){
	 
	 header("location:success_message.php?msg=3");
	 
	 } 
	 else {	
		
	
    date_default_timezone_set('Asia/Dhaka');
	$smsdate=date('Y-m-d');
	$smstime=date('H:I:s');
    $s=0;
    $max = count($stdid);	
	
	
	for($i=0; $i<count($stdid); $i++){
		
	$gtstudent="select * from borno_student_info where borno_student_info_id='$stdid[$i]'";
	$qgtstudent=$mysqli->query($gtstudent);
	while($shroll=$qgtstudent->fetch_assoc()){ $s++;
	

			$roll=$shroll['borno_school_roll'];
			$name=$shroll['borno_school_student_name'];
			$To=$shroll['borno_school_phone'];
		
		
	//-------------for masking-------------------	
						
	//				$fmessage=$message1;
		
// 		if($s==1){
// 			    $numbers = $To .'",';
// 			}
// 			else if($s<$max)	{
// 			    $numbers = '"'.$To .'",';
// 			}		
// 			else{
// 			    $numbers = '"'.$To;
// 			}
		
// 		    $tonumbers.=$numbers;
		    
	//-------------for non-masking-------------------	
		    			$numbers = $To . ',';
		
		    $tonumbers .=  $numbers;	
			
			
				// 	$store= "INSERT INTO `bornosky_sms_individual` (`borno_school_id`, `borno_school_class_id`, `borno_section_id`, `borno_school_session`, `borno_school_branch_id`, `borno_school_date`, `borno_school_time`,`number` ,`message` ,`name` ,`borno_school_shift_id`,`status`,`send_status`) VALUES ('$schId', '$classid', '$section', '$stsess', '$branchid', '$smsdate', '$smstime', '$To', '$message1', '$name', '$shiftid','Without Name','0')";
					
				// 	$rsQuery3 = $mysqli->query($store);
	//=================API Start=======================================	
			
//	$url = "http://api.rankstelecom.com/api/v3/sendsms/plain?user=mostafizbd&password=mostafizbd@01818306782&sender=880441557629160&datacoding=8&GSM=$To&SMSText=".  urlencode($message1);
		
// 	 $url = "https://api.mobireach.com.bd/SendTextMessage?Username=psoft&Password=Bornoskybd@01818306782&From=8801847169930&To=$To&Message=".  urlencode($message1);	
	
//  //$url = "http://log.smsdokan.com.bd/smsapi?api_key=$apikey&type=text&contacts=$To&senderid=8809601000780&msg=".  urlencode($message1);
 
// // $url = "https://71bulksms.com/sms_api/bulk_sms_sender.php?api_key=16660178185125092020/05/0708:00:04amMustafizur Rahman&type=text&sender_id=436&mobile_no=$To&User_Email=psoftbd@gmail.com&message=$message1";	
	

		
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

$ap_key='177161949137347020230717045327amE2QSBl5b'; 
$sender_id='105';
$mobile_no=$tonumbers;
$message=$fmessage;
$user_email='bdsoft2020@gmail.com';
techno_bulk_sms($ap_key,$sender_id,$mobile_no,$message,$user_email);
	
	/*
	 * Response success or failur
	 */
	if(!empty($response)) {
	  echo $response;
	}	
	
			//=================API End=======================================	
			
				
		$bornosentSMS="INSERT INTO `borno_sent_sms` (`borno_school_id`,`borno_school_branch_id`,`borno_school_class_id`,`borno_school_shift_id`,`borno_school_section_id`,`borno_school_session`,`borno_school_roll`,`borno_school_student_name`, `borno_sent_sms_phone`,`borno_sms_status`,`borno_sms_type`, `borno_sms_date`,`borno_sms_time`,`borno_count_sms`,`bangla_message`) 
				VALUES ('$schId','$branchid','$classid','$shiftid','$section','$stsess','$roll','$name', '$To','Class wise','$smsType','$smsdate','$smstime','$count', '$message1')";
				
				
				$rsQuery = $mysqli->query($bornosentSMS);	
		}
	}
		 
	
	 }
		if($rsQuery) { header("location:success_message.php?msg=1"); } else { header("location:success_message.php?msg=2"); }
	}
	
// 	$phoneNo= [$tonumbers];
	
	
// 	$post_data =array(
    
//           'UserName'=>'amar.school',
//           'Password'=>'quicktext123',
//           'Message'=>$fmessage,
//           'Mask'=>'mmodel.edu',
//           //'MSISDN'=>trim($phoneNo,"><\/Ref")
//           'MSISDN'=>$phoneNo
    
//     );

// $data_json = stripslashes(json_encode($post_data, JSON_UNESCAPED_UNICODE));
// //echo $post_data;
// // echo $data_json ."<br>";

//         $ch = curl_init();
// 		curl_setopt($ch, CURLOPT_URL, "https://portal.quicktextbd.com/API/SendSMSv2");
// 		//added
// 		curl_setopt($ch, CURLOPT_TIMEOUT, 100);
// 		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 100);
// 		curl_setopt($ch, CURLOPT_POST, 1 );

// 		//added

// 		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
// 		curl_setopt($ch, CURLOPT_POST, 1);
// 		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
// 		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

// 		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// 		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC

// 		$result = curl_exec($ch);
// 		curl_close($ch);
// 	//	echo $result;	
	
// if($rsQuery) { header("location:success_message.php?msg=1"); } else { header("location:success_message.php?msg=2"); }	

function techno_bulk_sms($ap_key,$sender_id,$mobile_no,$message,$user_email){
	$url = 'https://24bulksms.com/24bulksms/api/api-sms-send';
	$data = array('api_key' => $ap_key,
	 'sender_id' => $sender_id,
	 'message' => $message,
	 'mobile_no' =>$mobile_no,
	 'user_email'=> $user_email		
	 );

	// use key 'http' even if you send the request to https://...
	 $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);     
    $output = curl_exec($curl);
    curl_close($curl);
	print_r($output); 
}
//}
	 
?>