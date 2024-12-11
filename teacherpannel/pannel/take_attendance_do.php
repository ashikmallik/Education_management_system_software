<?php
include('config.php');
$schId = 134;
	
		$studId = $_POST['stdid'];
		$studClass = $_POST['studClass'];
		$shiftId = $_POST['shiftId'];
		$section = trim($_POST['section']);
		$stsess = trim($_POST['stsess']);
		$teacherid = $_POST['teacherid'];
		
		
	
	date_default_timezone_set('Asia/Dhaka');
	$smsdate=date('Y-m-d');
	$smstime=date('H:I:s');
	$month=substr($smsdate,5,2);
	$date=substr($smsdate,8,2);
		
	$branch="select * from `borno_student_info` where `borno_school_id`='$schId'  AND `borno_school_shift_id`='$shiftId' AND `borno_school_class_id`='$studClass' AND `borno_school_section_id`='$section' AND `borno_school_session`='$stsess' order by borno_school_roll asc";
	$rsQuery1 = $mysqli->query($branch);
	while($smsbranch=$rsQuery1->fetch_assoc()){;
	$studentid=$smsbranch['borno_student_info_id'];
	$studentroll=$smsbranch['borno_school_roll'];
	$studentname=$smsbranch['borno_school_student_name'];
	
	$gtstnamePhone="select * from borno_student_attandance where `borno_student_info_id`='$studentid' AND `borno_school_year`='$stsess' AND `borno_school_month`='$month' AND `borno_school_date`='$date'";
	$qgtstnamePhone=$mysqli->query($gtstnamePhone);
	$shgtstnamePhone=$qgtstnamePhone->fetch_assoc();
	
	if(empty($shgtstnamePhone['borno_student_info_id'])){	
	$bornoschBranch="INSERT INTO `borno_student_attandance` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`,`borno_school_shift_id`,`borno_school_section_id`,`borno_school_session`,`borno_student_info_id`,`borno_school_roll`,`borno_school_student_name`,`borno_school_year`, `borno_school_month`, `borno_school_date`, `borno_school_attandance`,`borno_school_leave`,`takken_by`)
											
						VALUES ('$schId', '0', '$studClass', '$shiftId', '$section', '$stsess','$studentid','$studentroll','$studentname','$stsess','$month','$date','P','0','$teacherid')";
						
			//	echo $schId." ";echo $studClass." ";echo $shiftId." ";echo $section." ";echo $stsess." ";echo $studentid." ";echo $studentroll." ";echo $studentname." ";echo $stsess." ";echo $month." ";echo $date." ";echo $teacherid." ";		
										
				$qbornoschBranch = $mysqli->prepare($bornoschBranch);
				$qbornoschBranch->execute();	
	}
	}
	

		for($i=0;$i<count($studId);$i++){
			
		$sqlupdate="UPDATE `borno_student_attandance` SET `borno_school_attandance`='A' where `borno_student_info_id`='$studId[$i]' AND `borno_school_year`='$stsess' AND `borno_school_month`='$month' AND `borno_school_date`='$date'";
					
												
				$qbsqlupdate = $mysqli->query($sqlupdate);
				
				
		$gtstudent="select * from borno_student_info where borno_student_info_id='$studId[$i]'";
	$qgtstudent=$mysqli->query($gtstudent);
	$shroll=$qgtstudent->fetch_assoc();
	

			$roll=$shroll['borno_school_roll'];
			$name=$shroll['borno_school_student_name'];
			$To=$shroll['borno_school_phone'];	
			
	$fmessage = $name." আজ স্কুলে অনুপস্থিত। (AGGSC)";
   // $fmessage =".";		
		
    date_default_timezone_set('Asia/Dhaka');
	$smsdate=date('Y-m-d');
	$smstime=date('H:I:s');
	
$bornosentSMS="INSERT INTO `borno_sent_sms` (`borno_school_id`,`borno_school_branch_id`,`borno_school_class_id`,`borno_school_shift_id`,`borno_school_section_id`,`borno_school_session`,`borno_school_roll`,`borno_school_student_name`, `borno_sent_sms_phone`,`borno_sms_status`,`borno_sms_type`, `borno_sent_sms_message`,`borno_sms_date`,`borno_sms_time`,`borno_count_sms`) 
	           VALUES ('$schId','136','$studClass','$shiftId','$section','$stsess','$roll','$name', '$To','absent_msg','2', '$fmessage','$smsdate','$smstime','1')";
				$rsQuery = $mysqli->query($bornosentSMS);
				
				
$ap_key='177161949137347020230717045327amE2QSBl5b'; 
$sender_id='105';
$mobile_no=$To;
$message=$fmessage;
$user_email='bdsoft2020@gmail.com';
techno_bulk_sms($ap_key,$sender_id,$mobile_no,$message,$user_email);		
		}
				
				if($qbornoschBranch) { header("location:dashBoard.php"); } else { header("location:take_attendance.php"); }				
				
	function techno_bulk_sms($ap_key,$sender_id,$mobile_no,$message,$user_email){
	//  echo  $ap_key,$sender_id,$mobile_no,$message,$user_email."<br>";
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
 
 ?>

