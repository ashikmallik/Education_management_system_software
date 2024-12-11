<?php
require_once('student_top.php');
	
		$studId = $_POST['stdid'];
		$branchId = $_POST['branchId'];
		$studClass = $_POST['studClass'];
		$shiftId = $_POST['shiftId'];
		$section = trim($_POST['section']);
		$stsess = trim($_POST['stsess']);
	
	date_default_timezone_set('Asia/Dhaka');
	$smsdate=date('Y-m-d');
	$smstime=date('H:I:s');
	$month=substr($smsdate,5,2);
	$date=substr($smsdate,8,2);
		
	$branch="select * from `borno_student_info` where `borno_school_id`='$schId' AND `borno_school_branch_id`='$branchId' AND `borno_school_shift_id`='$shiftId' AND `borno_school_class_id`='$studClass' AND `borno_school_section_id`='$section' AND `borno_school_session`='$stsess' order by borno_school_roll asc";
	$rsQuery1 = $mysqli->query($branch);
	while($smsbranch=$rsQuery1->fetch_assoc()){;
	$studentid=$smsbranch['borno_student_info_id'];
	$studentroll=$smsbranch['borno_school_roll'];
	$studentname=$smsbranch['borno_school_student_name'];
	
	$gtstnamePhone="select * from borno_student_attandance where `borno_student_info_id`='$studentid' AND `borno_school_year`='$stsess' AND `borno_school_month`='$month' AND `borno_school_date`='$date'";
	$qgtstnamePhone=$mysqli->query($gtstnamePhone);
	$shgtstnamePhone=$qgtstnamePhone->fetch_assoc();
	
	if($shgtstnamePhone['borno_student_info_id']==""){	
	$bornoschBranch="INSERT INTO `borno_student_attandance` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`,`borno_school_shift_id`,`borno_school_section_id`,`borno_school_session`,`borno_student_info_id`,`borno_school_roll`,`borno_school_student_name`,`borno_school_year`, `borno_school_month`, `borno_school_date`, `borno_school_attandance`)
											
															VALUES ('$schId', '$branchId', '$studClass', '$shiftId', '$section', '$stsess','$studentid','$studentroll','$studentname','$stsess','$month','$date','P')";
										
				$qbornoschBranch = $mysqli->prepare($bornoschBranch);
				$qbornoschBranch->execute();	
	}
	}

    date_default_timezone_set('Asia/Dhaka');
	$smsdate=date('Y-m-d');
	$smstime=date('H:I:s');
	

		for($i=0;$i<=count($studId);$i++){
			
		$bornoschBranch="UPDATE `borno_student_attandance` SET `borno_school_attandance`='A' where `borno_student_info_id`='$studId[$i]' AND `borno_school_year`='$stsess' AND `borno_school_month`='$month' AND `borno_school_date`='$date'";
		$qbornoschBranch = $mysqli->query($bornoschBranch);
				
	
		$gtstnamePhone="select * from borno_student_info where borno_student_info_id='$studId[$i]'";
		$qgtstnamePhone=$mysqli->query($gtstnamePhone);
		$shgtstnamePhone=$qgtstnamePhone->fetch_assoc();
		
		$roll=$shgtstnamePhone['borno_school_roll'];
		$name=$shgtstnamePhone['borno_school_student_name'];
		$To=$shgtstnamePhone['borno_school_phone'];
		
		$gtstnamePhone="select * from defalt_msg where schlog_id='$schId'";
		$qgtstnamePhone=$mysqli->query($gtstnamePhone);
		$shgtstnamePhone=$qgtstnamePhone->fetch_assoc();		
		$header=$shgtstnamePhone['msg_head'];
		$message1=$shgtstnamePhone['msg_details'];
		$footer=$shgtstnamePhone['shortname'];
		$smsType=$shgtstnamePhone['msg_type'];
		
		 $fmessage=$header." ".$name." ".$message1." ".$smsdate."".$footer;	
    
    if($smsType==1){
    $countc=strlen($fmessage);
    if($countc<=80){$count=1;}
    elseif($countc<=160){$count=2;}
    elseif($countc<=240){$count=3;}
    }
    elseif($smsType==2){
    $countc=mb_strlen($fmessage);
    if($countc<=70){$count=2;}
    elseif($countc<=130){$count=3;}
    elseif($countc<=190){$count=4;}
    elseif($countc<=250){$count=5;}
    elseif($countc<=310){$count=6;}	
    }
    else{$countc=1;}
/*
	//=================API Start=======================================	
			//	$url = "http://api.rankstelecom.com/api/v3/sendsms/plain?user=mostafizbd&password=mostafizbd@01818306782&sender=8804445629160&GSM=$To&SMSText=".  urlencode($fmessage);
		
	 $url = "http://log.smsdokan.com.bd/smsapi?api_key=R60008765e216957977f80.58052879&type=text&contacts=$To&senderid=8809601000500&msg=".  urlencode($message1);			
		
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
	 /*
	if(!empty($response)) {
	  echo $response;
	}

		
	$bornosentSMS="INSERT INTO `borno_sent_sms` (`borno_school_id`,`borno_school_branch_id`,`borno_school_class_id`,`borno_school_shift_id`,`borno_school_section_id`,`borno_school_session`,`borno_school_roll`,`borno_school_student_name`, `borno_sent_sms_phone`,`borno_sms_status`,`borno_sms_type`, `borno_sent_sms_message`,`borno_sms_date`,`borno_sms_time`,`borno_count_sms`) 
				VALUES ('$schId','$branchId','$studClass','$shiftId','$section','$stsess','$roll','$name', '$To','Absent','$smsType', '$fmessage','$smsdate','$smstime','$countc')";
				$rsQuery = $mysqli->query($bornosentSMS);			
	//=================API End=======================================			
	*/	    
		}
				
				if($qbornoschBranch) { header('location:absent_sms.php?msg=1'); } else { header('location:absent_sms.php?msg=2'); }				
				
		
 
 ?>

