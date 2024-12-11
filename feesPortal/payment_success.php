<?php

// $DB_NAME = 'ecomtest';
// $DB_HOST = 'localhost';
// $DB_USER = 'root';
// $DB_PASS = 'root@123';

session_start();
//include('config.php');
    $userid = '000599992240000';
    $pwd    = 'c57c26acea8df0df277ce225e4ece188256f84c9';
    
function logger($logmsg)
{
	try {
		$logmsg = "\n".date("Y.n.j H:i:s")."#".$logmsg;
		file_put_contents('./logs/dbblpay.'.date("Y.n.j").'.log',$logmsg,FILE_APPEND);
	} catch(Exception $e) {
		file_put_contents('./logs/dbblpay.'.date("Y.n.j").'.log',$e->getMessage(),FILE_APPEND);
	}
}    
logger('---------------------- Complete New Transaction---------------------');

$errmsg = "";
//$trans_id = $_SESSION['trans_id'];
//----- Result Value Fields Declare -----//
$RESULT = "N/A"; 
$RESULT_CODE = "N/A";
$DSECURE = "N/A"; 
$RRN = "N/A";
$APPROVAL_CODE = "N/A";
$CARD_NUMBER = "N/A";
$AMOUNT = "N/A";
$CARDNAME = "N/A"; 
$DESCRIPTION = "N/A";
$TRANS_DATE = "N/A";
$RESULTSTR = "N/A"; 

try {
	// echo 'trans_id:'. $_SESSION['trans_id'];
	if(isset($_POST['trans_id']) && !empty($_POST['trans_id'])) {
		logger("Get trans_id From Post Value:".$_POST['trans_id']);
		$trans_id = $_POST['trans_id'];
	} else if(isset($_SESSION['trans_id']) && !empty($_SESSION['trans_id'])) {
		logger("Get trans_id From Session Value:".$_SESSION['trans_id']);
		$trans_id = $_SESSION['trans_id'];
	} else if(isset($_COOKIE['trans_id']) && !empty($_COOKIE['trans_id'])) {
		logger("Get trans_id From Cookie Value:".$_COOKIE['trans_id']);
		$trans_id = $_COOKIE['trans_id'];
	} else{
		$trans_id = "N/A";
	}
	
	
	if($trans_id == "N/A") { 
		$errmsg =  "transaction id missing";
		logger($errmsg);
	} else {

		$wsdlUrl = 'https://ecom1.dutchbanglabank.com/ecomws/dbblecomtxn?wsdl';

		$client = new SoapClient($wsdlUrl, [
					'stream_context' => stream_context_create([
					'ssl' => [
					'allow_self_signed' => true,
					],
			]),
		]);


		//---- Declare and Assign Web Service Data -----//
		
		$clientIp = $_SERVER['REMOTE_ADDR'];
		logger('clientIp:'.$clientIp);
		if(!empty($_POST['trans_id'])){
		    
		    $trans_id = $_POST['trans_id'];
		}
		elseif(!empty($_SESSION['trans_id'])){
		    $trans_id = $_SESSION['trans_id'];
		}
		
		$trans_id = trim($trans_id);
		logger('trans_id:'.$trans_id);
		
		$Parameters = array(
		'userid' => $userid,
		'pwd' => $pwd,
		'transid' => $trans_id,
		'clientip' => $clientIp,
		'billinginfo' => 'Test'
		);

		$result = $client->getresultfield($Parameters);
		//	print_r($result);
			
		foreach ($result as $value)
		logger('result:'.$value);	
		// echo 'Result:'.$value;	
			
		//echo "-------------Start of Array-----------------<br/>";
		
		$part1 = "";
		$part2 = "";
		if (strpos($value,"RESULT") !== false) {
			$arr = explode("^",$value);
			$arrlength = count($arr);
			for ($x = 0; $x < $arrlength; $x++) {
				$parts = explode(">", $arr[$x]);
				$part1 = $parts[0];
				$part2 = $parts[1];
				
				if ($part1 == "RESULT") {
					$RESULT = $part2;
				} else if ($part1 == "RESULT_CODE") {
					$RESULT_CODE = $part2;
				} else if ($part1  == "DSECURE") {
					$DSECURE = $part2;
				} else if ($part1 == "RRN") {
					$RRN = $part2;
				} else if ($part1  == "APPROVAL_CODE") {
					$APPROVAL_CODE = $part2;
				} else if ($part1 == "CARD_NUMBER") {
					$CARD_NUMBER = $part2;
				} else if ($part1 == "AMOUNT") {
					$AMOUNT = $part2;
					$AMOUNT = $AMOUNT/100;
				} else if ($part1 == "CARDNAME") {
					$CARDNAME = $part2;
				} else if ($part1 == "DESCRIPTION") {
					$DESCRIPTION = $part2;
				} else if ($part1 == "TRANS_DATE") {
					$TRANS_DATE = $part2;
					// echo "TRANS_DATE:".$TRANS_DATE;
				}else {
					// Unknown value;
					
				}
			}
			if($RESULT_CODE == '000' & $RESULT == 'OK'){
				$RESULTSTR = 'Successful';
			include('../connection.php');
        	$receiptn=date("dhis");
        $paymentdate = date("d/m/Y");
        
		$queryStr = "update dbbl_payment set 
					 result = '$RESULT', result_code = '$RESULT_CODE', dsecure = '$DSECURE', 
					 rrn = '$RRN', approval_code = '$APPROVAL_CODE', card_number = '$CARD_NUMBER', 
					 card_name = '$CARDNAME', trans_date = STR_TO_DATE('$TRANS_DATE', '%Y-%m-%d %h:%i:%s %p')
					 where bank_trans_id = '$trans_id'";
			$qinstdbbl=$mysqli->query($queryStr);
			
		$getfeesid="SELECT * FROM `temp_table_dbbl` WHERE `bank_trans_id` = '$trans_id'";
		$sl=0;
		$qgetfeesid=$mysqli->query($getfeesid);
		$shqgetfeesid=$qgetfeesid->fetch_assoc();	
		$feeid = $shqgetfeesid['student_fees_id'];
		$receiptno = $feeid.$receiptn;
			
	$updatestudentfees="SELECT * FROM `temp_table_dbbl` WHERE `bank_trans_id` = '$trans_id' AND due_amount > 0";
		$sl=0;
		$qupdatestudentfees=$mysqli->query($updatestudentfees);
		while($shqupdatestudentfees=$qupdatestudentfees->fetch_assoc()){
		$sl++;
		$feesid = $shqupdatestudentfees['student_fees_id'];
		$due = $shqupdatestudentfees['due_amount'];
		$sid = $shqupdatestudentfees['student_id'];
		$branchid = $shqupdatestudentfees['branch_id'];
        $fees_head_id = $shqupdatestudentfees['fees_head_id'];
        
        
        
		$update="UPDATE `student_fees` SET `due_amount`=`due_amount`-'$due',`paid_amount`=`paid_amount`+'$due',`receive_amount`=`receive_amount`+'$due',`isPaid`='1',`isComplete`='1',`bank_trans_id`='$trans_id',`money_receipt_no`='$receiptno',`receive_date`='$paymentdate' WHERE `student_fees_id` = '$feesid'";
		    $qinstemdbbl=$mysqli->query($update);
		   logger($receiptno,$trans_id,$due); 
		   if($due > 0 ){
		       
		       
		       
		    if($branchid == 3){
		    $chk = "SELECT * FROM `student_addmission` where `user_id`='$sid'";
        	$qchk=$mysqli->query($chk);
			$shqchk=$qchk->fetch_assoc();
            $newstudentid = $shqchk['user_id'];
            $student_group = $shqchk['student_group'];
		    }
// 		    else{
// 		 	$chk = "SELECT * FROM `student_addmission` where `student_id`='$sid' AND `is_paid` = 0";
//         	$qchk=$mysqli->query($chk);
// 			$shqchk=$qchk->fetch_assoc();
//             $newstudentid = $shqchk['student_id'];
// 		    }
       
            
      
            
	if(!empty($newstudentid)){
	    $cdate = date("d/m/Y");
	    
	    if($branchid == 3){
	       $userid = $newstudentid;
	       
	       if($student_group == 1){
	           
	           $chkstudent = "SELECT * FROM `borno_student_info` WHERE  `borno_school_session` = '2022-23' AND `borno_school_stud_group` = 1 ORDER BY `borno_school_roll` DESC LIMIT 1";
	           $qchkstudent=$mysqli->query($chkstudent);
			   $shqchkstudent=$qchkstudent->fetch_assoc();
			   $studentid = $shqchkstudent['borno_student_info_id'];
			   $roll = $shqchkstudent['borno_school_roll'];
			   if(empty($studentid)){
			       $newstudentid = "MSC23111001";
			       $roll =1001;
			   }
			   else{
			      $roll = $roll + 1;
			      $nsid = "MSC2311".$roll;
			      $newstudentid = $nsid;
			   }
			   if($roll < 1101){
			      $section_id =174; 
			   }
			   if($roll < 1201 AND $roll > 1100 ){
			      $section_id =175; 
			   }
			   if($roll > 1200){
			       $section_id =176;
			   }
			   
	       }
	       	       if($student_group == 2){
	           
	           $chkstudent = "SELECT * FROM `borno_student_info` WHERE  `borno_school_session` = '2022-23' AND `borno_school_stud_group` = 2 ORDER BY `borno_school_roll` DESC LIMIT 1";
	           $qchkstudent=$mysqli->query($chkstudent);
			   $shqchkstudent=$qchkstudent->fetch_assoc();
			   $studentid = $shqchkstudent['borno_student_info_id'];
			   $roll = $shqchkstudent['borno_school_roll'];
			   if(empty($studentid)){
			       $newstudentid = "MSC23110501";
			       $roll =501;
			   }
			   else{
			      $roll = $roll + 1;
			      $nsid = "MSC23110".$roll;
			      $newstudentid = $nsid;
			   }
			   $section_id =177;
	       }
	       	       if($student_group == 3){
	           
	           $chkstudent = "SELECT * FROM `borno_student_info` WHERE  `borno_school_session` = '2022-23' AND `borno_school_stud_group` = 3 ORDER BY `borno_school_roll` DESC LIMIT 1";
	           $qchkstudent=$mysqli->query($chkstudent);
			   $shqchkstudent=$qchkstudent->fetch_assoc();
			   $studentid = $shqchkstudent['borno_student_info_id'];
			   $roll = $shqchkstudent['borno_school_roll'];
			   if(empty($studentid)){
			       $newstudentid = "MSC23110001";
			       $roll =1;
			   }
			   else{
			      $roll = $roll + 1;
			      if($roll < 10){
			        $nsid = "MSC2311000".$roll;  
			      }
			      	if($roll < 100 AND $roll > 9){
			        $nsid = "MSC231100".$roll;  
			      }
			      if($roll < 1000 AND $roll > 99){
			        $nsid = "MSC23110".$roll;  
			      }
			      $newstudentid = $nsid;
			   }
			  $section_id =178; 
	       }
	       
	       
	       	$updatestudentadmission="UPDATE `student_addmission` SET `student_id`='$newstudentid',`section_id`='$section_id',`due_amount` =0,`is_paid`='1',`tran_id`='$trans_id',`payment_date`='$paymentdate' WHERE `user_id` = '$userid'";
		    $qupdatestudentadmission=$mysqli->query($updatestudentadmission);
		    
		    $insertStudent = "INSERT INTO `borno_student_info`(`borno_student_info_id`, `borno_school_id`, `borno_school_branch_id`, `borno_school_version`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, 
		    `borno_student_id`, `borno_final_student_id`, `borno_school_student_name`, `borno_school_father_name`, `borno_school_mother_name`, `borno_school_gender`, `borno_school_address`, 
		    `borno_school_permanentaddress`, `borno_school_phone`, `borno_school_blood_group`, `borno_school_dob`, `borno_student_birth_reg_no`, `borno_school_religion`, `borno_school_status`, `borno_school_org`, 
		    `borno_school_stud_group`, `borno_school_roll`, `borno_school_photo`, `borno_student_status`, `student_type`, `student_category`) 
		    SELECT '$newstudentid','1',`branch_id`,`version`,`class_id`, `shift_id`, `section_id`, `session`,'','',`student_name`,`father_name`,`mother_name`,'','','',`contact_no`,'','','','','','School',`student_group`,'$roll','','1','1',`student_category` FROM `student_addmission` WHERE `user_id` = '$userid'";
		  $qinsertStudent=$mysqli->query($insertStudent);
	       
	        $updateStfees ="UPDATE `student_fees` SET `student_id` ='$newstudentid' WHERE `student_id` ='$userid'";
	        $qupdateStfees=$mysqli->query($updateStfees);
	        $sid = $newstudentid; 
	    }
	    else{
	        $updatestudentadmission="UPDATE `student_addmission` SET due_amount =0,`is_paid`='1',`tran_id`='$trans_id',`payment_date`='$paymentdate' WHERE `student_id` = '$newstudentid'";
		    $qupdatestudentadmission=$mysqli->query($updatestudentadmission);
		    
		    $insertStudent = "INSERT INTO `borno_student_info`(`borno_student_info_id`, `borno_school_id`, `borno_school_branch_id`, `borno_school_version`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, 
		    `borno_student_id`, `borno_final_student_id`, `borno_school_student_name`, `borno_school_father_name`, `borno_school_mother_name`, `borno_school_gender`, `borno_school_address`, 
		    `borno_school_permanentaddress`, `borno_school_phone`, `borno_school_blood_group`, `borno_school_dob`, `borno_student_birth_reg_no`, `borno_school_religion`, `borno_school_status`, `borno_school_org`, 
		    `borno_school_stud_group`, `borno_school_roll`, `borno_school_photo`, `borno_student_status`, `student_type`, `student_category`) 
		    SELECT '$newstudentid','1',`branch_id`,`version`,`class_id`, `shift_id`, `section_id`, `session`,'','',`student_name`,`father_name`,`mother_name`,'','','',`contact_no`,'','','','','','School',`student_group`,'0','','1','1',`student_category` FROM `student_addmission` WHERE `student_id` = '$newstudentid'";
		  $qinsertStudent=$mysqli->query($insertStudent);
		   $sid = $newstudentid;
	    }
	    

		  
		  $gtstudentinfo="SELECT * FROM `borno_student_info` WHERE  `borno_student_info_id` ='$newstudentid' AND `borno_student_status` = 1";
          $qgtstudentinfo=$mysqli->query($gtstudentinfo);
		  while($shgtstudentinfo=$qgtstudentinfo->fetch_assoc()){
	
		$studentinfoid = $shgtstudentinfo['borno_student_info_id'];
		$classid = $shgtstudentinfo['borno_school_class_id'];
		$branchid = $shgtstudentinfo['borno_school_branch_id'];
		$group = $shgtstudentinfo['borno_school_stud_group'];
		$stsess = $shgtstudentinfo['borno_school_session'];
		
			$gttype="SELECT * FROM `fees_head` WHERE `class_id` ='$classid' AND `branch_id`='$branchid' AND `stsess` = '$stsess'";

	
		$qgttype=$mysqli->query($gttype);
		while($shqgttype=$qgttype->fetch_assoc()){	
		   $type = $shqgttype['head_type'];
		   $fiscalid = $shqgttype['fiscal_year_id'];
		   
		  	if($type == 'Monthly'){

		
			    
		
		$gtheadid="SELECT * FROM `fees_head` WHERE `class_id` ='$classid' AND `branch_id`='$branchid' AND `fiscal_year_id` = '$fiscalid' AND head_type ='Monthly'";

	
		$qgtheadid=$mysqli->query($gtheadid);
		while($shgtheadid=$qgtheadid->fetch_assoc()){
		$headid = $shgtheadid['head_id'];
		$amount = $shgtheadid['amount'];
		if($fiscalid == 8){
		  $getmonthname = "SELECT * FROM `fiscal_year_details` WHERE `fiscal_year_id` = '$fiscalid'";  
		}
		else{
		  $getmonthname = "SELECT * FROM `fiscal_year_details` WHERE `fiscal_year_id` = '$fiscalid' AND `month` NOT IN (1)";  
		}
		$qgetmonthname=$mysqli->query($getmonthname);
		while($shqqgetmonthname=$qgetmonthname->fetch_assoc()){
		    
        $monthsortname = $shqqgetmonthname['month_short_name'];
        $year = $shqqgetmonthname['year'];
        $monthid = $shqqgetmonthname['month'];
        $yeardetails = $shqqgetmonthname['fiscal_year_details_id'];


		
		
			$infeesstuden="INSERT INTO `student_fees`(`session`, `student_id`, `fees_head_id`, `due_amount`, `total_amount`, `paid_amount`, `receive_amount`, `advance_amount`, `month_id`,`fiscal_year_details_id`, `month_name`, `year`, `fiscal_year_id`, `isPaid`, `isComplete`,`bank_trans_id`, `money_receipt_no`, `published_date`, `receive_date`, `remarks`) 
	                                          VALUES ('$stsess','$studentinfoid','$headid','$amount','$amount','0','0','0','$monthid','$yeardetails','$monthsortname','$year','$fiscalid','0','0','','0','$cdate','','')";
	        						$qinfeesstuden=$mysqli->query($infeesstuden);
		}

     
       }
	}
		
       
		
	else{
	    	
	    	//	echo "test";
		
		$gtheadid="SELECT * FROM `fees_head` WHERE `class_id` ='$classid' AND `branch_id`='$branchid' AND `fiscal_year_id` = '$fiscalid' AND `head_type` ='$type' AND `head_id` NOT IN (1)  ORDER BY `fees_head_id`";

	
		$qgtheadid=$mysqli->query($gtheadid);
		while($shgtheadid=$qgtheadid->fetch_assoc()){
	
		$headid = $shgtheadid['head_id'];
		$amount = $shgtheadid['amount'];
		$monthid = $shgtheadid['month_id'];
		if($monthid==0){
		$monthsortname = "";
        $year = 0;
        $yeardetails = 0;
		}
		else{
		 $getmonthname = "SELECT * FROM `fiscal_year_details` WHERE `month` = '$monthid' AND `fiscal_year_id`  = '$fiscalid'";
		$qgetmonthname=$mysqli->query($getmonthname);
        $shqqgetmonthname=$qgetmonthname->fetch_assoc();
        $monthsortname = $shqqgetmonthname['month_short_name'];
        $year = $shqqgetmonthname['year'];
        $yeardetails = $shqqgetmonthname['fiscal_year_details_id'];
		}



		
		
			$infeesstuden="INSERT INTO `student_fees`(`session`, `student_id`, `fees_head_id`, `due_amount`, `total_amount`, `paid_amount`, `receive_amount`, `advance_amount`, `month_id`,`fiscal_year_details_id`, `month_name`, `year`, `fiscal_year_id`, `isPaid`, `isComplete`,`bank_trans_id` ,`money_receipt_no`, `published_date`, `receive_date`, `remarks`) 
	                                          VALUES ('$stsess','$studentinfoid','$headid','$amount','$amount','0','0','0','$monthid','$yeardetails','$monthsortname','$year','$fiscalid','0','0','','0','$cdate','','')";
	        						$qinfeesstuden=$mysqli->query($infeesstuden);
	        						

     
       }

		}
		   
		   
		    
		}
		

		
}
		  
	}  
   
		$gettrans="SELECT * FROM `collection_details` WHERE `bank_trans_id` = '$trans_id'";
		$qgettrans=$mysqli->query($gettrans);
		$shqgettrans=$qgettrans->fetch_assoc();	
		$trans = $shqgettrans['bank_trans_id'];
	//	if(empty($trans)){
		  $studentinfo = "SELECT * FROM `borno_student_info` WHERE `borno_student_info_id` = '$sid'";
		 $qstudentinfo=$mysqli->query($studentinfo);
		$shqstudentinfo=$qstudentinfo->fetch_assoc();	
		$branch_id = $shqstudentinfo['borno_school_branch_id'];
		$class_id = $shqstudentinfo['borno_school_class_id'];
		$shift_id = $shqstudentinfo['borno_school_shift_id'];
		$section_id = $shqstudentinfo['borno_school_section_id'];
		$session = $shqstudentinfo['borno_school_session'];
		$student_name = $shqstudentinfo['borno_school_student_name'];
		$roll = $shqstudentinfo['borno_school_roll'];
		    
		  $insertintocdetailsTable="INSERT INTO `collection_details`( `student_id`,`branch_id`, `class_id`, `shift_id`, `section_id`, `session`, `student_name`, `roll`, `student_fees_id`, `fees_head_id`, `receive_amount`, `bank_trans_id`, `money_receipt_no`, `receive_date`,`received_from`) 
	                         VALUES ('$sid','$branch_id','$class_id','$shift_id','$section_id','$session','$student_name','$roll','$feesid','$fees_head_id','$due','$trans_id','$receiptno','$paymentdate','Rocket_ecom')";
		    $qinscdetails=$mysqli->query($insertintocdetailsTable); 
		    

	    
	
//		}
		   }
		    logger($receiptno,$trans_id,$due);
		}
		 logger('=================== Transaction Completed =======================');   
		$message = "Transaction Successful";
		echo "<SCRIPT> 
        alert('$message')
        window.location.replace('index.php?memo=$receiptno');
        </SCRIPT>";
		    
	
				
			} else if($RESULT_CODE == '116'){
				$RESULTSTR = 'Not Sufficient Amount';
				
			logger('Not Sufficient Amount');	
		$message = "Not Sufficient Amount";
		echo "<SCRIPT> 
        alert('$message')
        window.location.replace('index.php');
        </SCRIPT>";
				
			} else if($RESULT_CODE == '117'){
				$RESULTSTR = 'Incorrect PIN';
				
			logger('Incorrect PIN');	
		$message = "Incorrect PIN";
				echo "<SCRIPT> 
        alert('$message')
        window.location.replace('index.php');
        </SCRIPT>";
				logger('Incorrect PIN');
			} else {
				$RESULTSTR = 'Failed';
				
				logger('Failed');
				    $message = "Error";
		echo "<SCRIPT> 
        alert('$message')
        window.location.replace('index.php');
        </SCRIPT>";
			}
		} else {
			$errmsg = $value;	
		}
	//echo "-----------End of Array-------------------<br/>";

		//**** Insert Data Into DB Start******//

		//$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);


// 		if (!($stmt = $mysqli->prepare($queryStr))) {
// 			echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
// 		}
// 		if (!$stmt->bind_param("ssssssssss", $RESULT,$RESULT_CODE,$DSECURE, $RRN,$APPROVAL_CODE,$CARD_NUMBER, $CARDNAME,$TRANS_DATE,$RESULTSTR, $trans_id)) {
// 			echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
// 		}
// 		if (!$stmt->execute()) {
// 			echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
// 		}
// 		$stmt->close();
		
// 		$mysqli->close();
		/* close connection */
		//**** Insert Data Into DB End******//
	//	logger('=================== Transaction Completed =======================');
		

		
		
// 		if($RESULT_CODE == '000' & $RESULT == 'OK'){
// 		    $message = "Transaction Successful";
// 		echo "<SCRIPT> 
//         alert('$message')
//         window.location.replace('login_action.php?sid='$sid'&branchid='$branchid');
//         </SCRIPT>";
// 		}
// 		elseif($RESULT_CODE == '116'){
// 		    		    $message = "Not Sufficient Amount";
// 		echo "<SCRIPT> 
//         alert('$message')
//         window.location.replace('index.php');
//         </SCRIPT>";
// 		}
// 		elseif($RESULT_CODE == '117'){
// 		    		    $message = "Incorrect PIN";
// 		echo "<SCRIPT> 
//         alert('$message')
//         window.location.replace('lindex.php');
//         </SCRIPT>";
// 		}
// 		else{
// 		      $message = "Error";
// 		echo "<SCRIPT> 
//         alert('$message')
//         window.location.replace('index.php');
//         </SCRIPT>";
// 		}
		
	}
} catch(Exception $e) {
	$errmsg =  "System Problem";
	logger($e->getMessage());
}

?>