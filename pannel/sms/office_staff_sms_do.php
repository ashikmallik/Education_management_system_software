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
	
	$stPhone=$_POST['stPhone'];
	$message1=strip_tags($_POST['message']);
	$schId=$_POST['schId'];	
	$sendTotalSMS1=count($_POST['stPhone']);
	
	 $countc=strlen($message1);
    if($countc<=160){$count=1;}
    elseif($countc<=300){$count=2;}
    elseif($countc<=440){$count=3;}
    elseif($countc<=580){$count=4;}
    elseif($countc<=720){$count=5;}
    elseif($countc<=860){$count=6;}
	
	$sendTotalSMS=$sendTotalSMS1*$count;
	
	$avlSMS=$_POST['avlSMS'];;
	 if($sendTotalSMS>$avlSMS){
	 
	 header("location:success_message.php?msg=3");
	 
	 } else {

 	
	
	
    date_default_timezone_set('Asia/Dhaka');
	$smsdate=date('Y-m-d');
	$smstime=date('H:I:s');
	
	
	
	for($i=0; $i<count($stPhone); $i++){
		
			$To=$stPhone[$i];
			
			
			$numbers = $To . ',';
		
		    $tonumbers .=  $numbers;
			
	$gtstudent="select * from borno_mgt_staff_info where borno_mgt_staf_phone='$stPhone[$i]'";
	$qgtstudent=$mysqli->query($gtstudent);
	while($shroll=$qgtstudent->fetch_assoc()){ 
	
			$branchid=$shroll['borno_school_branch_id'];
			$name=$shroll['borno_mgt_staf_name'];		
		//-------------API---START-------------------

	
	/*
	 * Response success or failur
	 */
	if(!empty($response)) {
	  echo $response;
	}		
		//-------------API---Close-------------------
		$bornosentSMS="INSERT INTO `borno_sent_sms` (`borno_school_id`,`borno_school_branch_id`,`borno_school_class_id`,`borno_school_shift_id`,`borno_school_section_id`,`borno_school_session`,`borno_school_roll`,`borno_school_student_name`, `borno_sent_sms_phone`,`borno_sms_status`,`borno_sms_type`, `borno_sent_sms_message`,`borno_sms_date`,`borno_sms_time`,`borno_count_sms`) 
				VALUES ('$schId','$branchid','0','0','0','0','0','$name', '$To','Office Staff','$smsType', '$message1','$smsdate','$smstime','$count')";
				$rsQuery = $mysqli->query($bornosentSMS);	

		}
	}
	$fmessage=$message1;
$ap_key='177161949137347020230717045327amE2QSBl5b'; 
$sender_id='105';
$mobile_no=$tonumbers;
$message=$fmessage;
$user_email='bdsoft2020@gmail.com';
techno_bulk_sms($ap_key,$sender_id,$mobile_no,$message,$user_email);	
		  if($rsQuery) { header("location:success_message.php?msg=1"); } else { header("location:success_message.php?msg=2"); }		
	 }
	
	} else if($smsType==2){
		
			
		
	$stPhone=$_POST['stPhone'];
	$message1=strip_tags($_POST['message']);
	$schId=$_POST['schId'];	
	$sendTotalSMS1=count($_POST['stPhone']);
	
		$countc=mb_strlen($message1);
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
	 
	 } else {
		

    date_default_timezone_set('Asia/Dhaka');
	$smsdate=date('Y-m-d');
	$smstime=date('H:I:s');
    $s=0;
    $max = count($stPhone);	
	
	
	for($i=0; $i<count($stPhone); $i++){$s++;
		
			$To=$stPhone[$i];
			
		$gtstudent="select * from borno_mgt_staff_info where borno_mgt_staf_phone='$stPhone[$i]'";
	$qgtstudent=$mysqli->query($gtstudent);
	$shroll=$qgtstudent->fetch_assoc(); 
	
			$branchid=$shroll['borno_school_branch_id'];
			$name=$shroll['borno_mgt_staf_name'];	
			//-------------API---START-------------------
			$fmessage=$message1;
// 				if($s==1){
// 			    $numbers = $To .'",';
// 			}
// 			else if($s<$max)	{
// 			    $numbers = '"'.$To .'",';
// 			}		
// 			else{
// 			    $numbers = '"'.$To;
// 			}
		
// 		    $tonumbers.=$numbers;	

		    			$numbers = $To . ',';
		
		    $tonumbers .=  $numbers;
			

	
// 	/*
// 	 * Response success or failur
// 	 */
// 	if(!empty($response)) {
// 	  echo $response;
// 	}		
		

		
		//-------------API---Close-------------------
		$bornosentSMS="INSERT INTO `borno_sent_sms` (`borno_school_id`,`borno_school_branch_id`,`borno_school_class_id`,`borno_school_shift_id`,`borno_school_section_id`,`borno_school_session`,`borno_school_roll`,`borno_school_student_name`, `borno_sent_sms_phone`,`borno_sms_status`,`borno_sms_type`, `borno_sent_sms_message`,`borno_sms_date`,`borno_sms_time`,`borno_count_sms`) 
				VALUES ('$schId','$branchid','0','0','0','0','0','$name', '$To','Office Staff','$smsType', '$message1','$smsdate','$smstime','$count')";
				$rsQuery = $mysqli->query($bornosentSMS);	
		
		
	}
			$ap_key='177161949137347020230717045327amE2QSBl5b'; 
$sender_id='105';
$mobile_no=$tonumbers;
$message=$fmessage;
$user_email='bdsoft2020@gmail.com';
techno_bulk_sms($ap_key,$sender_id,$mobile_no,$message,$user_email);	 
	if($rsQuery) { header("location:success_message.php?msg=1"); } else { header("location:success_message.php?msg=2"); }		
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
// 		echo $result;
// 		curl_close($ch);
		
		
	//	if($rsQuery) { header("location:success_message.php?msg=1"); } else { header("location:success_message.php?msg=2"); }
	
 function techno_bulk_sms($ap_key,$sender_id,$mobile_no,$message,$user_email){
 	$url = 'https://24bulksms.com/24bulksms/api/api-sms-send';
 	$data = array('api_key' => $ap_key,
 	 'sender_id' => $sender_id,
	 'message' => $message,
 	 'mobile_no' =>$mobile_no,
 	 'user_email'=> $user_email		
	 );

// 	// use key 'http' even if you send the request to https://...
	 $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
     curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
     curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);     
     $output = curl_exec($curl);
     curl_close($curl);
	//print_r($output); 
}
		
	 
?>