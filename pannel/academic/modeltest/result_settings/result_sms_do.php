<?php
 require_once('result_sett_top.php');
 
 require_once '../../../../lib/htmlpurifier/library/HTMLPurifier.auto.php';
    
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
	
		$branchId = clean_html($_POST['branchId']);
		$branchId1 = strip_tags($_POST['branchId']);

		$studClass = clean_html($_POST['studClass']);
		$studClass1 = strip_tags($_POST['studClass']);
		
		$shiftId = clean_html($_POST['shiftId']);
		$shiftId1 = strip_tags($_POST['shiftId']);
		
		$section = clean_html($_POST['section']);
		$section1 = strip_tags($_POST['section']);

		$stsess = clean_html($_POST['stsess']);
		$stsess1 = strip_tags($_POST['stsess']);
		
		$selTerm = clean_html($_POST['selTerm']);
		$selTerm1 = strip_tags($_POST['selTerm']);
	

    date_default_timezone_set('Asia/Dhaka');
	$smsdate=date('Y-m-d');
	$smstime=date('H:I:s');
	
	
if($studClass1==1 OR $studClass1==2)
{
		$gtstnamePhone="select * from modeltest_school_9_10_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' order by borno_school_roll asc";
		$qgtstnamePhone=$mysqli->query($gtstnamePhone);
		while($shgtstnamePhone=$qgtstnamePhone->fetch_assoc()){;
		
		$roll=$shgtstnamePhone['borno_school_roll'];
		$name=$shgtstnamePhone['borno_school_student_name'];
		//$To=$shgtstnamePhone['borno_school_phone'];
		$stdinfoId=$shgtstnamePhone['borno_student_info_id'];
		$gpa=$shgtstnamePhone['gpa'];
		$fail=$shgtstnamePhone['fail_subject'];
		$header="Dear parents, your child";
		
		$getstuph="select * from borno_student_info where borno_student_info_id='$stdinfoId'";
		$qgetstuph=$mysqli->query($getstuph);
		$shgetstuph=$qgetstuph->fetch_assoc();
		
		$To=$shgetstuph['borno_school_phone'];
		
		
		if($gpa==0)
		{
		    
		$message1="Failed in $fail in the first model test.";
		}
		else
		{
		$message1="secured GPA $gpa in the first model test.";
		}
		
		$footer=" Headmistress(MGGHS)";
		
		 $fmessage=$header." ".$name." ".$message1."".$footer;
		
			
	//=================API Start=======================================	
				$url = "http://api.rankstelecom.com/api/v3/sendsms/plain?user=mostafizbd&password=mostafizbd@01818306782&sender=8804445629160&GSM=$To&SMSText=".  urlencode($fmessage);
		
		
		
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
		
		
		
		
		$bornosentSMS="INSERT INTO `borno_sent_sms` (`borno_school_id`,`borno_student_info_id`,`borno_school_branch_id`,`borno_school_class_id`,`borno_school_shift_id`,`borno_school_section_id`,`borno_school_session`,`borno_school_roll`,`borno_school_student_name`, `borno_sent_sms_phone`,`borno_sms_status`,`borno_sms_type`, `borno_sent_sms_message`,`borno_sms_date`,`borno_sms_time`,`total_sms_count`,`bangla_message`) 
				VALUES ('$schId','$stdinfoId','$branchId1','$studClass1','$shiftId1','$section1','$stsess1','$roll','$name', '$To','Result SMS','1', '$fmessage','$smsdate','$smstime','1','$message1')";
				$rsQuery = $mysqli->query($bornosentSMS);	
		
		
		  
		  if($rsQuery) { header("location:result_sms.php?msg=1"); } else { header("location:result_sms.php?msg=2"); }		
}
	 
}


elseif($studClass1==3 OR $studClass1==4 OR $studClass1==5)
{
		$gtstnamePhone="select * from modeltest_school_6_8_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' order by borno_school_roll asc";
		$qgtstnamePhone=$mysqli->query($gtstnamePhone);
		while($shgtstnamePhone=$qgtstnamePhone->fetch_assoc()){;
		
		$roll=$shgtstnamePhone['borno_school_roll'];
		$name=$shgtstnamePhone['borno_school_student_name'];
		$To=$shgtstnamePhone['borno_school_phone'];
		$stdinfoId=$shgtstnamePhone['borno_student_info_id'];
		$gpa=$shgtstnamePhone['gpa'];
		$fail=$shgtstnamePhone['fail_subject'];
		$header="Dear parents, your child";
		
		$getstuph="select * from borno_student_info where borno_student_info_id='$stdinfoId'";
		$qgetstuph=$mysqli->query($getstuph);
		$shgetstuph=$qgetstuph->fetch_assoc();
		
		$To=$shgetstuph['borno_school_phone'];
		
		
		if($gpa==0)
		{
		    
		$message1="Failed in $fail in the first model test.";
		}
		else
		{
		$message1="secured GPA $gpa in the first model test.";
		}
		
		$footer=" Headmistress(MGGHS)";
		
		 $fmessage=$header." ".$name." ".$message1."".$footer;
		
			
	//=================API Start=======================================	
			
				$url = "http://api.rankstelecom.com/api/v3/sendsms/plain?user=mostafizbd&password=mostafizbd@01818306782&sender=8804445629160&GSM=$To&SMSText=".  urlencode($fmessage);
		
		
		
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
		
		
		
		
		$bornosentSMS="INSERT INTO `borno_sent_sms` (`borno_school_id`,`borno_student_info_id`,`borno_school_branch_id`,`borno_school_class_id`,`borno_school_shift_id`,`borno_school_section_id`,`borno_school_session`,`borno_school_roll`,`borno_school_student_name`, `borno_sent_sms_phone`,`borno_sms_status`,`borno_sms_type`, `borno_sent_sms_message`,`borno_sms_date`,`borno_sms_time`,`total_sms_count`,`bangla_message`) 
				VALUES ('$schId','$stdinfoId','$branchId1','$studClass1','$shiftId1','$section1','$stsess1','$roll','$name', '$To','Result SMS','1', '$fmessage','$smsdate','$smstime','1','$message1')";
				$rsQuery = $mysqli->query($bornosentSMS);		
		
		
		  
		  if($rsQuery) { header("location:result_sms.php?msg=1"); } else { header("location:result_sms.php?msg=2"); }		
}
	 
}

else
{
		$gtstnamePhone="select * from modeltest_play_5_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' order by borno_school_roll asc";
		$qgtstnamePhone=$mysqli->query($gtstnamePhone);
		while($shgtstnamePhone=$qgtstnamePhone->fetch_assoc()){
		
		$roll=$shgtstnamePhone['borno_school_roll'];
		$name=$shgtstnamePhone['borno_school_student_name'];
		//$To=$shgtstnamePhone['borno_school_phone'];
		$stdinfoId=$shgtstnamePhone['borno_student_info_id'];
		$gpa=$shgtstnamePhone['gpa'];
		$fail=$shgtstnamePhone['fail_subject'];
		$header="Dear parents, your child";
		
		$getstuph="select * from borno_student_info where borno_student_info_id='$stdinfoId'";
		$qgetstuph=$mysqli->query($getstuph);
		$shgetstuph=$qgetstuph->fetch_assoc();
		
		$To=$shgetstuph['borno_school_phone'];
		
		
	
		
		
		
		if($gpa==0)
		{
		    
		$message1="Failed in $fail in the first model test.";
		}
		else
		{
		$message1="secured GPA $gpa in the first model test.";
		}
		
		$footer=" Headmistress(MGGHS)";
		
		 $fmessage=$header." ".$name." ".$message1."".$footer;
		
			
	//=================API Start=======================================	
			$url = "http://api.rankstelecom.com/api/v3/sendsms/plain?user=mostafizbd&password=mostafizbd@01818306782&sender=8804445629160&GSM=$To&SMSText=".  urlencode($fmessage);
		
		
		
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
		
		
		
		
		$bornosentSMS="INSERT INTO `borno_sent_sms` (`borno_school_id`,`borno_student_info_id`,`borno_school_branch_id`,`borno_school_class_id`,`borno_school_shift_id`,`borno_school_section_id`,`borno_school_session`,`borno_school_roll`,`borno_school_student_name`, `borno_sent_sms_phone`,`borno_sms_status`,`borno_sms_type`, `borno_sent_sms_message`,`borno_sms_date`,`borno_sms_time`,`total_sms_count`,`bangla_message`) 
				VALUES ('$schId','$stdinfoId','$branchId1','$studClass1','$shiftId1','$section1','$stsess1','$roll','$name', '$To','Result SMS','1', '$fmessage','$smsdate','$smstime','1','$message1')";
				$rsQuery = $mysqli->query($bornosentSMS);		
		
		
		  
		  if($rsQuery) { header("location:result_sms.php?msg=1"); } else { header("location:result_sms.php?msg=2"); }		
}
	 
}
		
	 
?>