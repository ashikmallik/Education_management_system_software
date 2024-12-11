<?php
 require_once('../result_settings/result_sett_top.php');
 
 require_once '../../../lib/htmlpurifier/library/HTMLPurifier.auto.php';
    
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
		
		$group = clean_html($_POST['group']);
		

		
	$roll= $_POST['roll'];
	$stdid= $_POST['stdid'];
	$stname= $_POST['stname'];
	$regulation= $_POST['regulation'];
	$patritism= $_POST['patritism'];
	$honesty= $_POST['honesty'];	
	$leadership= $_POST['leadership'];
	$discipline= $_POST['discipline'];
	$cooperation= $_POST['cooperation'];
	$participation= $_POST['participation'];
	$sympathy= $_POST['sympathy'];
	$awareness= $_POST['awareness'];
	$punctuality= $_POST['punctuality'];
	
	
	
	if($studClass==1 OR $studClass==2)
{
 $result23 ="select * from borno_school_9_10_merit where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' AND borno_school_stud_group='$group'";

					$qgresult23=$mysqli->query($result23);
					while($row23=$qgresult23->fetch_assoc()){ 
					
					$gtstotal111=$row23['borno_school_roll'];
					
					$gtstname ="select * from borno_student_info where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111'";
					
					$qgtstname=$mysqli->query($gtstname);
					$shqgtstname=$qgtstname->fetch_assoc();
					
					$getStudPhone=$shqgtstname['borno_school_phone'];
					$getStudName=$shqgtstname['borno_school_student_name']; 
					
					$textgo="Halfyearly Result Is";
					
					$fconcat=$getStudName.' '.$textgo;
					
					$Grand12345="Grand Total : ";
					 
					$getgrandTotal=$row23['grandtotal']; 
					
					$GPA12345="GPA : ";  
					
					$getGpa=$row23['gpa'];		
								
					$LG12345="LG : ";  
					
					$getflg=$row23['finallg'];
					
	
				$gomessageStud=  $fconcat.' '.$Grand12345.'  '.$getgrandTotal.' , '.$GPA12345.'  '.$getGpa.' , '.$LG12345.'  '.$getflg;
		
				
	
	
	
	
					//=================API Start=======================================	
			$url = "http://api.rankstelecom.com/api/v3/sendsms/plain?user=mostafizbd&password=mostafizbd@01818306782&sender=8804445629160&GSM=$getStudPhone&SMSText=".  urlencode($gomessageStud);
		
		
		
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
	  $response;
	}
		
		
		//=================API End=======================================			
		
		$bornosentSMS="INSERT INTO `borno_sent_sms` (`borno_school_id`,`borno_school_branch_id`,`borno_school_class_id`,`borno_school_shift_id`,`borno_school_section_id`,`borno_school_session`,`borno_school_roll`,`borno_school_student_name`, `borno_sent_sms_phone`,`borno_sms_status`,`borno_sms_type`, `borno_sent_sms_message`,`borno_sms_date`,`borno_sms_time`) 
				VALUES ('$schId','$branchid','$classid','$shiftid','$section','$stsess','$roll','$name', '$To','individual','$smsType', '$message1','$smsdate','$smstime')";
				$rsQuery = $mysqli->query($bornosentSMS);	
		
		}
		header('location:result_sms.php');
	}
	
	if($studClass==3 OR $studClass==4 OR $studClass==5)
    {
	
	$gtstotal1 ="select * from borno_school_6_8_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$selTerm";
					$qgtstotal1=$mysqli->query($gtstotal1);
					while($stggtstotal1=$qgtstotal1->fetch_assoc()){
						
						
						$gtstotal111=$stggtstotal1['borno_school_roll'];
					
					$gtstname ="select * from borno_student_info where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111'";
					
					$qgtstname=$mysqli->query($gtstname);
					$shqgtstname=$qgtstname->fetch_assoc();
					
					$getStudPhone=$shqgtstname['borno_school_phone'];
					$getStudName=$shqgtstname['borno_school_student_name']; 
					
					$textgo="Half Yearly Result Is";
					
					$fconcat=$getStudName.' '.$textgo;
					
					$Grand12345="Grand Total : ";
					 
					$getgrandTotal=$stggtstotal1['grandtotal']; 
					
					$GPA12345="GPA : ";  
					
					$getGpa=$stggtstotal1['gpa'];		
								
					$LG12345="LG : ";  
					
					$getflg=$stggtstotal1['finallg'];
					
	
			$gomessageStud=  $fconcat.' '.$Grand12345.'  '.$getgrandTotal.' , '.$GPA12345.'  '.$getGpa.' , '.$LG12345.'  '.$getflg;
		
				
	

	
		//=================API Start=======================================	
			$url = "http://api.rankstelecom.com/api/v3/sendsms/plain?user=mostafizbd&password=mostafizbd@01818306782&sender=8804445629160&GSM=$getStudPhone&SMSText=".  urlencode($gomessageStud);
		
		
		
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
	  $response;
	}
		
		
		//=================API End=======================================			
		
		$bornosentSMS="INSERT INTO `borno_sent_sms` (`borno_school_id`,`borno_school_branch_id`,`borno_school_class_id`,`borno_school_shift_id`,`borno_school_section_id`,`borno_school_session`,`borno_school_roll`,`borno_school_student_name`, `borno_sent_sms_phone`,`borno_sms_status`,`borno_sms_type`, `borno_sent_sms_message`,`borno_sms_date`,`borno_sms_time`) 
				VALUES ('$schId','$branchid','$classid','$shiftid','$section','$stsess','$roll','$name', '$To','individual','$smsType', '$message1','$smsdate','$smstime')";
				$rsQuery = $mysqli->query($bornosentSMS);	
	
	
	
	
	
	
	
		}
		header('location:result_sms.php');
	}
						
	else {
		
	$gtstotal1 ="select * from borno_school_play_5_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$selTerm";
					$qgtstotal1=$mysqli->query($gtstotal1);
					while($stggtstotal1=$qgtstotal1->fetch_assoc()){
						
						
					$gtstotal111=$stggtstotal1['borno_school_roll'];
					
					$gtstname ="select * from borno_student_info where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111'";
					
					$qgtstname=$mysqli->query($gtstname);
					$shqgtstname=$qgtstname->fetch_assoc();
					
				   $getStudPhone=$shqgtstname['borno_school_phone'];
					$getStudName=$shqgtstname['borno_school_student_name']; 
					
					$textgo="Half Yearly Result Is";
					
					$fconcat=$getStudName.' '.$textgo;
					
					$Grand12345="Grand Total : ";
					 
					$getgrandTotal=$stggtstotal1['grandtotal']; 
					
					$GPA12345="GPA : ";  
					
					$getGpa=$stggtstotal1['gpa'];		
								
					$LG12345="LG : ";  
					
					$getflg=$stggtstotal1['finallg'];
					
	
			$gomessageStud=  $fconcat.' '.$Grand12345.'  '.$getgrandTotal.' , '.$GPA12345.'  '.$getGpa.' , '.$LG12345.'  '.$getflg;
		
				
	

	
		//=================API Start=======================================	
			$url = "http://api.rankstelecom.com/api/v3/sendsms/plain?user=mostafizbd&password=mostafizbd@01818306782&sender=8804445629160&GSM=$getStudPhone&SMSText=".  urlencode($gomessageStud);
		
		
		
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
	  $response;
	}
		
		
		//=================API End=======================================			
		
		$bornosentSMS="INSERT INTO `borno_sent_sms` (`borno_school_id`,`borno_school_branch_id`,`borno_school_class_id`,`borno_school_shift_id`,`borno_school_section_id`,`borno_school_session`,`borno_school_roll`,`borno_school_student_name`, `borno_sent_sms_phone`,`borno_sms_status`,`borno_sms_type`, `borno_sent_sms_message`,`borno_sms_date`,`borno_sms_time`) 
				VALUES ('$schId','$branchid','$classid','$shiftid','$section','$stsess','$roll','$name', '$To','individual','$smsType', '$message1','$smsdate','$smstime')";
				$rsQuery = $mysqli->query($bornosentSMS);	
	
	
	
	
	
	
	
		}
	//}
		
		
		header('location:result_sms.php');
		
		}					

		
 ?>

