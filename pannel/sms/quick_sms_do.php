<?php
ob_start();
include('../../connection.php');


	$smsType=$_POST['smsType'];


	
	if($smsType==1){

	
	
	$message1=strip_tags($_POST['message']);
	$schId=$_POST['schId'];	
	$number=$_POST['number'];
	$cats = explode(",", $number);
	$sendTotalSMS1=count($cats);
	
	  $countc=strlen($_POST['message']);
    if($countc<=160){$count=1;}
    elseif($countc<=300){$count=2;}
    elseif($countc<=440){$count=3;}
    elseif($countc<=580){$count=4;}
    elseif($countc<=720){$count=5;}
    elseif($countc<=860){$count=6;}
	
	$sendTotalSMS=$sendTotalSMS1*$count;
	$From = '8801847169930';
	
	$avlSMS=$_POST['avlSMS'];
	
    date_default_timezone_set('Asia/Dhaka');
	$smsdate=date('Y-m-d');
	$smstime=date('H:I:s');

	 if($sendTotalSMS>$avlSMS){
	 
	 header("location:success_message.php?msg=3");
	 
	 } else {
	     
	     $s=0;
    $max = count($stdid); 	
	foreach( $cats as $i=>$cat){ $s++;
		
			$To=$cat;

		$fmessage=$message1;
		
			//$To=$cat;
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
			//-------------API---START-------------------

$ap_key='177161949137347020230717045327amE2QSBl5b'; 
$sender_id='105';
$mobile_no=$tonumbers;
$message=$fmessage;
$user_email='bdsoft2020@gmail.com';
techno_bulk_sms($ap_key,$sender_id,$mobile_no,$message,$user_email);
	

//	 * Response success or failur
	 
	if(!empty($response)) {
	  echo $response;
	}	

		//-------------API---Close-------------------
		
	

$bornosentSMS="INSERT INTO `borno_sent_sms` (`borno_school_id`,`borno_school_branch_id`,`borno_school_class_id`,`borno_school_shift_id`,`borno_school_section_id`,`borno_school_session`,`borno_school_roll`,`borno_school_student_name`, `borno_sent_sms_phone`,`borno_sms_status`,`borno_sms_type`, `borno_sent_sms_message`,`borno_sms_date`,`borno_sms_time`,`borno_count_sms`) 
				VALUES ('$schId','0','0','0','0','0','0','0', '88$To','Quick','$smsType', '$message1','$smsdate','$smstime','$count')";
				
				$rsQuery = $mysqli->query($bornosentSMS);	

	}
		if($rsQuery) { header("location:success_message.php?msg=1"); } else { header("location:success_message.php?msg=2"); }		
	 }
	}
	 else if($smsType==2){
		
	
	$message1=strip_tags($_POST['message']);
	$schId=$_POST['schId'];	
	$number=$_POST['number'];
	$cats = explode(",", $number);
	$sendTotalSMS1=count($cats);
	
	$countc=mb_strlen($_POST['message']);
    if($countc<=70){$count=1;}
    elseif($countc<=130){$count=2;}
    elseif($countc<=190){$count=3;}
    elseif($countc<=250){$count=4;}
    elseif($countc<=310){$count=5;}
    elseif($countc<=370){$count=6;}
	
	$sendTotalSMS=$sendTotalSMS1*$count;	
	$From = '8801847169930';
	
    date_default_timezone_set('Asia/Dhaka');
	$smsdate=date('Y-m-d');
	$smstime=date('H:I:s');

	$avlSMS=$_POST['avlSMS'];
	 if($sendTotalSMS>$avlSMS){
	 
	 header("location:success_message.php?msg=3");
	 
	 } else {
	     
	$s=0;
    $max = count($cats);
	     	
	foreach( $cats as $i=>$cat){ $s++;
		
		$fmessage=$message1;
		$To=$cat;
		if($max == 1){
		    $numbers = $To;
		}
		else{
			
				if($s==1){
			    $numbers = $To .'",';
			}
			else if($s<$max)	{
			    $numbers = '"'.$To .'",';
			}		
			else{
			    $numbers = '"'.$To;
			}
		}
		    $tonumbers.=$numbers;

	//-------------API---START-------------------
$ap_key='177161949137347020230717045327amE2QSBl5b'; 
$sender_id='105';
$mobile_no=$tonumbers;
$message=$fmessage;
$user_email='bdsoft2020@gmail.com';
techno_bulk_sms($ap_key,$sender_id,$mobile_no,$message,$user_email);

//	 * Response success or failur
	 
	if(!empty($response)) {
	  echo $response;
	}	

	//-------------API---Close-------------------
		

		
  $bornosentSMS="INSERT INTO `borno_sent_sms` (`borno_school_id`,`borno_school_branch_id`,`borno_school_class_id`,`borno_school_shift_id`,`borno_school_section_id`,`borno_school_session`,`borno_school_roll`,`borno_school_student_name`, `borno_sent_sms_phone`,`borno_sms_status`,`borno_sms_type`, `borno_sms_date`,`borno_sms_time`,`borno_count_sms`,`bangla_message`) 
				VALUES ('$schId','0','0','0','0','0','0','0', '$To','Quick','$smsType','$smsdate','$smstime','$count', '$message1')";
				$rsQuery = $mysqli->query($bornosentSMS);	
				
			//	echo $schId. " "; echo $To. " ";echo $smsType. " ";echo $message1. " ";echo $smsdate. " ";echo $smstime. " ";echo $count. " ";
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
// echo $data_json ."<br>";

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
	//	echo $result;	
		if($rsQuery) { 
		    
		    header("location:success_message.php?msg=1"); 
		    } else { 
		        
		        echo "failed";
		        header("location:success_message.php?msg=2"); 
		        
		    }	
// function techno_bulk_sms($ap_key,$sender_id,$mobile_no,$message,$user_email){
// 	$url = 'https://24bulksms.com/24bulksms/api/api-sms-send';
// 	$data = array('api_key' => $ap_key,
// 	 'sender_id' => $sender_id,
// 	 'message' => $message,
// 	 'mobile_no' =>$mobile_no,
// 	 'user_email'=> $user_email		
// 	 );

// 	// use key 'http' even if you send the request to https://...
// 	 $curl = curl_init($url);
//     curl_setopt($curl, CURLOPT_POST, true);
//     curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
//     curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
//     curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
//     curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);     
//     $output = curl_exec($curl);
//     curl_close($curl);
// 	print_r($output); 
// }
	 
?>