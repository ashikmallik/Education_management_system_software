<?php
ob_start();
include('../../connection.php');
error_reporting(0);

//   bulk sms  method Start  IT Pal


//   bulk sms  method End  IT Pal


$schId=$_POST['schId'];
$csv=$_POST['csv'];
//$tststus=$_POST['tststus'];

   date_default_timezone_set('Asia/Dhaka');
	$smsdate=date('Y-m-d');
	$smstime=date('H:I:s');

$handle = fopen($_FILES['csv']['tmp_name'], "r");
$firstRow = true;
$a = 1;
while (($data = fgetcsv($handle, 10000, ",")) !== FALSE) {

	if($firstRow) { $firstRow = false; }
	else {
		
		$a[]=count($data[1]);
		
		array_sum($a);
		
		

		
		
		 $To='880'.$data[1];
		 $message1=$data[0];
		 //--------API PART-------------
	
echo $a++;
//$message1='বাজার লাগবে? কাঁচা শাক-সবজিসহ, নিত্য প্রয়োজনীয় সকল মুদি পণ্য বাসায় পৌঁছে দিচ্ছে বাজারতরি। হোম ডেলিভারির জন্য যোগাযোগ 01757560304';
	
		     //   Sms Send  Start  IT Pal
		    // sms($cats,$message1);

            
            


            
            
	        //    Sms Send End  IT Pal
		 
 
		 //--------------------------------------API CODE----------------------------------------------
// 	$url = "http://api.rankstelecom.com/api/sendsms/plain?user=mostafizbd&password=mostafizbd@01818306782&sender=88044456029160&GSM=$To&SMSText=".  urlencode($message1);
		
		
		
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
		   	    
		   	$sender_id='45';
            $apiKey='YmRzb2Z0OjEyMzQ1Ng=='; 
            $mobileNo= $To;
            $message=$message1;
            techno_bulk_sms($sender_id,$apiKey,$mobileNo,$message);

	// * Response success or failur
	
	

    
//---------------------------------------END API-----------------------------------------------	
		
	

	if(!empty($response)) {
	  echo $response;
	}		
		
// 		$bornosentSMS="INSERT INTO `borno_sent_sms` (`borno_school_id`,`borno_school_branch_id`,`borno_school_class_id`,`borno_school_shift_id`,`borno_school_section_id`,`borno_school_session`,`borno_school_roll`,`borno_school_student_name`, `borno_sent_sms_phone`,`borno_sms_status`,`borno_sms_type`, `borno_sent_sms_message`,`borno_sms_date`,`borno_sms_time`) 
// 				VALUES ('$schId','0','0','0','0','0','0','0', '$To','CSV','1', '$message1','$smsdate','$smstime')";
// 				$rsQuery = $mysqli->query($bornosentSMS);	
	}
}


fclose($handle);

 header("location:success_message.php?msg=1"); 

function techno_bulk_sms($sender_id,$apiKey,$mobileNo,$message){
$url = 'https://smspanellogin.com/api/bulkSmsApi';
$data = array('sender_id' => $sender_id,
 'apiKey' => $apiKey,
 'mobileNo' => $mobileNo,
 'message' =>$message	
 );

 $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);     
    $output = curl_exec($curl);
    curl_close($curl);

    echo $output;
}


?>