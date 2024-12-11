<?php 
// $DB_NAME = 'ecomtest';
// $DB_HOST = 'localhost';
// $DB_USER = 'root';
// $DB_PASS = 'root@123';
// try {	
// 	if (isset($_POST['pay'])) {

// 	}
// } catch(Exception $e) {
// 	$errmsg =  "System Problem";
// 	logger($e->getMessage());
// }
//session_start();
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
logger('=================== Start New Transaction ===================');
//logger("Session ID:".session_id());
$errmsg = "";

// if(!isset($_SESSION['userid']) && empty($_SESSION['userid'])) {
// 	session_destroy();
// 	header("Location: index.php");
// }	

try {	
	if (isset($_POST['pay'])) {
   		
$submername= $_POST['submername'];
$submerid= $_POST['submerid'];
$terminalid= $_POST['terminalid'];
$fiscalyeardeatilsid= $_POST['fiscalyeardeatilsid'];
$fiscalyearid= $_POST['fiscalyearid'];
$studentid= $_POST['studentid'];
$bankcharge= $_POST['bankcharge'];
$totalammount= $_POST['totalammount'];
$branchid= $_POST['branchid'];
$classid= $_POST['classid'];
$prvdue= $_POST['prvdue'];
//$session= $_POST['session'];
//$optcard= $_POST['optcard'];




$totaldues = $prvdue+$totalammount;
$billamount1 = $prvdue+$totalammount - 20 ;
$billamount = $billamount1 * 100;
$bank_fee = 20 * 100;
// echo $submername."<br>";
// echo $submerid."<br>";
// echo $terminalid."<br>";
// echo $fiscalyeardeatilsid."<br>";
// echo $fiscalyearid."<br>";
// echo $studentid."<br>";
// echo $bankcharge."<br>";
// echo $totaldues."<br>";
// echo $optcard."<br>";
   		
   		
   		
		$txnrefnum = $studentid;
		logger('txnrefnum:'.$txnrefnum);
		$clientIp = $_SERVER['REMOTE_ADDR']; ///'18.42.12.56'; // $_SERVER['REMOTE_ADDR'];
		logger('clientIp:'.$clientIp);
		$cardType = 6;
		logger('card type:'.$cardType);	
		
// 		$billamount = $_POST['amount'];
// 		logger('billamount:'.$billamount);		
// 		$billamount = $billamount * 100; // Convert Taka into Paisa  //
// 		$fee = $_POST['fee']; 
// 		$fee = $fee* 100;			// Convert Taka into Paisa  //
// 		$merchant_fee = 0;
		$totalpayableamount = $totaldues;  //10;
		$totalpayableamount = $totalpayableamount * 100;   // Convert Taka into Paisa  //
		logger('totalamount:'.$totalpayableamount);	
		// $totalamount = $billamount+$fee+$merchant_fee; 

//		$submername = 'MMSC-School_Motijheel';
//		$submerid = '000599002240001';
//		$terminalid = '59905341';

// 		$submername = 'SHL-Paystation';
//      	$submerid = '000599002390001';
// 		$terminalid = '59905577';
    

		
		//---- Declare and Assign Web Service Data -----//
		$wsdlUrl = 'https://ecom1.dutchbanglabank.com/ecomws/dbblecomtxn?wsdl';
		$options = array(
		'cache_wsdl' => 0,
		'trace' => 1,
		'stream_context' => stream_context_create(array(
			  'ssl' => array(
				   'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
			  )
		)));
		$client = new SoapClient($wsdlUrl, $options);
		$cParameters = array(
		'userid' => $userid,
		'pwd' => $pwd,
		'submername' => $submername,
		'submerid' => $submerid,
		'terminalid' => $terminalid,
		'amount' => $totalpayableamount,
		'cardtype' => $cardType,
		'txnrefnum' => $txnrefnum,
		'clientip' => $clientIp
		);



		$result = $client->getsubmertransid($cParameters);
		// print_r($result);
			
		foreach ($result as $value)
		logger('result:'.$value);			
		 //echo 'Result:'.$value;	
			
		//"-------------Result Processing Start-----------------";
		$TRANSACTION_ID = "N/A"; 
		$part1 = "";
		$part2 = "";
		$errmsg = '';
		
		if (strpos($value,"TRANSACTION_ID") !== false) {
		
			$arr = explode(":",$value);
			$part1 = $arr[0];
			$part2 = $arr[1];
			if ($part1 == "TRANSACTION_ID") {
				$TRANSACTION_ID = $part2;
				$_SESSION['trans_id'] = $TRANSACTION_ID;
				$trans_id_en = urlencode($TRANSACTION_ID);
				
				setcookie('trans_id',$TRANSACTION_ID,time()+300,"/");
				
				//**** Insert Data Into DB Start******//
			// include('db.php');
                 include('../connection.php');
                 
            if($branchid == 3){
            $chk = "SELECT * FROM `student_addmission` where `user_id`='$studentid'";
        	$qchk=$mysqli->query($chk);
			$shqchk=$qchk->fetch_assoc();
            $newstudentid = $shqchk['user_id'];
            }   
            
//             else{
//             $chk = "SELECT * FROM `student_addmission` where `student_id`='$studentid' AND `is_paid` = 0";
//         	$qchk=$mysqli->query($chk);
// 			$shqchk=$qchk->fetch_assoc();
//             $newstudentid = $shqchk['student_id'];
//             }
                 

	

	
	
	if(!empty($newstudentid)){ 
	    
	                     $published = date("d/m/Y");
	                     
	           $deleteStudentinfo="DELETE FROM `student_fees` WHERE `student_id` = '$studentid'";
	           $qdeleteStudentinfo=$mysqli->query($deleteStudentinfo);
              
             if($branchid == 3){
                    $gtstdName ="SELECT * FROM `student_addmission` where `user_id`='$studentid'";
					$qgststdName=$mysqli->query($gtstdName);
					$shsstdname=$qgststdName->fetch_assoc();
                    $session = $shsstdname['session'];
                    $amount = $shsstdname['due_amount'];
                    $tw = $shsstdname['student_category'];
                    $version = $shsstdname['version'];
                    
                    $due = $amount;
            $insertfeesTable = "INSERT INTO `student_fees`(`session`, `student_id`, `fees_head_id`, `due_amount`, `total_amount`, `paid_amount`, `receive_amount`, `advance_amount`, `month_id`, 
				                `fiscal_year_details_id`, `month_name`, `year`, `fiscal_year_id`, `isPaid`, `isComplete`, `bank_trans_id`, `money_receipt_no`, `published_date`, `receive_date`, `remarks`, `add_by`, `update_by`) 
				            VALUES ('$session','$studentid','1','$due','$due','0','0','0','0','$fiscalyeardeatilsid','Jan','2023','$fiscalyearid','0','0','','','$published','','','','')";
					$qinsertfeesTable=$mysqli->query($insertfeesTable);
                    
             }
             else{
                 $gtstdName ="SELECT * FROM `student_addmission` where `student_id`='$studentid'";
					$qgststdName=$mysqli->query($gtstdName);
					$shsstdname=$qgststdName->fetch_assoc();
                    $session = $shsstdname['session'];
                    $amount = $shsstdname['due_amount'];
                    $tw = $shsstdname['student_category'];
                    $version = $shsstdname['version'];
                    if(!empty($tw)){
                        $due = $amount;
                        				$insertfeesTable = "INSERT INTO `student_fees`(`session`, `student_id`, `fees_head_id`, `due_amount`, `total_amount`, `paid_amount`, `receive_amount`, `advance_amount`, `month_id`, 
				                                `fiscal_year_details_id`, `month_name`, `year`, `fiscal_year_id`, `isPaid`, `isComplete`, `bank_trans_id`, `money_receipt_no`, `published_date`, `receive_date`, `remarks`, `add_by`, `update_by`) 
				                          VALUES ('$session','$studentid','$s','$due','$due','0','0','0','1','$fiscalyeardeatilsid','Jan','2023','$fiscalyearid','0','0','','','$published','','','','')";
					$qinsertfeesTable=$mysqli->query($insertfeesTable);
                    }
                    else{
                        if($version == "Bangla"){
                            $due = $amount - 1000 ;
                            $s=0;
                            do{
                                $s++;
                            $insertfeesTable = "INSERT INTO `student_fees`(`session`, `student_id`, `fees_head_id`, `due_amount`, `total_amount`, `paid_amount`, `receive_amount`, `advance_amount`, `month_id`, 
				                                `fiscal_year_details_id`, `month_name`, `year`, `fiscal_year_id`, `isPaid`, `isComplete`, `bank_trans_id`, `money_receipt_no`, `published_date`, `receive_date`, `remarks`, `add_by`, `update_by`) 
				                          VALUES ('$session','$studentid','$s','$due','$due','0','0','0','1','$fiscalyeardeatilsid','Jan','2023','$fiscalyearid','0','0','','','$published','','','','')";
					                         $qinsertfeesTable=$mysqli->query($insertfeesTable);
					                         
					           $due = $amount - $due;            
                            }while($s<2);              
	
                            
                        }
                        else{
                            $due = $amount - 1300 ;
                            $s=0;
                            do{
                                $s++;
                            $insertfeesTable = "INSERT INTO `student_fees`(`session`, `student_id`, `fees_head_id`, `due_amount`, `total_amount`, `paid_amount`, `receive_amount`, `advance_amount`, `month_id`, 
				                                `fiscal_year_details_id`, `month_name`, `year`, `fiscal_year_id`, `isPaid`, `isComplete`, `bank_trans_id`, `money_receipt_no`, `published_date`, `receive_date`, `remarks`, `add_by`, `update_by`) 
				                          VALUES ('$session','$studentid','$s','$due','$due','0','0','0','1','$fiscalyeardeatilsid','Jan','2023','$fiscalyearid','0','0','','','$published','','','','')";
					                         $qinsertfeesTable=$mysqli->query($insertfeesTable);
					                         
					           $due = $amount - $due;            
                            }while($s<2); 
                        }
                        
                    }
             }
	    
	}
	else{
                 $gtstdName ="select * from `borno_student_info` where `borno_student_info_id`='$studentid'";
					$qgststdName=$mysqli->query($gtstdName);
					$shsstdname=$qgststdName->fetch_assoc();
                    $session = $shsstdname['borno_school_session'];
			}                
				//$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
				$queryStr = "INSERT INTO dbbl_payment(merchant_id,txnrefnum,cardtype, clientip,bill_amount,bank_fee, merchant_fee,total_amount,bank_trans_id, trans_start_date) 
					VALUES('$submerid','$txnrefnum','$cardType','$clientIp','$billamount','$bank_fee','0','$totalpayableamount','$TRANSACTION_ID', now())";
					$qinstdbbl=$mysqli->query($queryStr);
		
		if(empty($fiscalyeardeatilsid))	{
		    
		    if($session == '2020-21'){
		        		    $gtduelist1="SELECT * FROM `student_fees` WHERE `due_amount` > 0 AND `student_id` ='$studentid' AND trim(`session`) = '$session'";
		    		$sl=0;
		$qgtduelist1=$mysqli->query($gtduelist1);
		while($shgtduelist1=$qgtduelist1->fetch_assoc()){
		$sl++;
		$feesid = $shgtduelist1['student_fees_id'];
		$feesHeadId = $shgtduelist1['fees_head_id'];
		if ($feesHeadId == 4) {
	    if($prvdue == 0){
		    $due = 0;
		}
		else{
		$due = $prvdue;
		}
			
		}
		else{
			$due = $shgtduelist1['due_amount'];
		}

		$insertintotempTable="INSERT INTO `temp_table_dbbl`(`student_id`,`branch_id`,`student_fees_id`,`fees_head_id`,`due_amount`,`bank_trans_id`) 
		     VALUES ('$studentid','$branchid','$feesid','$feesHeadId','$due','$TRANSACTION_ID')";
		    $qinstemdbbl=$mysqli->query($insertintotempTable);
		}
		        
		    }
		    else if($session == '2022' AND $classid == 1){
		        		    $gtduelist1="SELECT * FROM `student_fees` WHERE `due_amount` > 0 AND `student_id` ='$studentid' AND trim(`session`) = '$session'";
		    		$sl=0;
		$qgtduelist1=$mysqli->query($gtduelist1);
		while($shgtduelist1=$qgtduelist1->fetch_assoc()){
		$sl++;
		$feesid = $shgtduelist1['student_fees_id'];
		$feesHeadId = $shgtduelist1['fees_head_id'];
		if ($feesHeadId == 4) {
	    if($prvdue == 0){
		    $due = 0;
		}
		else{
		$due = $prvdue;
		}
			
		}
		else{
			$due = $shgtduelist1['due_amount'];
		}

		$insertintotempTable="INSERT INTO `temp_table_dbbl`(`student_id`,`branch_id`,`student_fees_id`,`fees_head_id`,`due_amount`,`bank_trans_id`) 
		     VALUES ('$studentid','$branchid','$feesid','$feesHeadId','$due','$TRANSACTION_ID')";
		    $qinstemdbbl=$mysqli->query($insertintotempTable);
		}
		        
		    }
		    else{
		        if ($branchid == 3){
		            if($session=='2021-22'){
		              $gtduelist1="SELECT * FROM `student_fees` WHERE `due_amount` > 0 AND `student_id` ='$studentid' AND trim(`session`) <= '$session'  AND `fiscal_year_id` <= $fiscalyearid";  //AND `fiscal_year_details_id` = 0
		            }
		            else{
		                $gtduelist1="SELECT * FROM `student_fees` WHERE `due_amount` > 0 AND `student_id` ='$studentid' AND trim(`session`) <= '$session' AND `fiscal_year_details_id` = 0  AND `fiscal_year_id` = $fiscalyearid";
		            }
		            
		        }
		        else{
		            $gtduelist1="SELECT * FROM `student_fees` WHERE `due_amount` > 0 AND `student_id` ='$studentid' AND trim(`session`) <= '$session' AND `fiscal_year_details_id` = 0";
		        }
		       
		    		$sl=0;
		$qgtduelist1=$mysqli->query($gtduelist1);
		while($shgtduelist1=$qgtduelist1->fetch_assoc()){
		$sl++;
		$feesid = $shgtduelist1['student_fees_id'];
		$feesHeadId = $shgtduelist1['fees_head_id'];
		if ($feesHeadId == 4) {
	    if($prvdue == 0){
		    $due = 0;
		}
		else{
		$due = $prvdue;
		}
			
		}
		else{
			$due = $shgtduelist1['due_amount'];
		}

		$insertintotempTable="INSERT INTO `temp_table_dbbl`(`student_id`,`branch_id`,`student_fees_id`,`fees_head_id`,`due_amount`,`bank_trans_id`) 
		     VALUES ('$studentid','$branchid','$feesid','$feesHeadId','$due','$TRANSACTION_ID')";
		    $qinstemdbbl=$mysqli->query($insertintotempTable);
		}
		    }
		    

		}	
		else{
		    if ($branchid == 3){
		     if($session=='2021-22'){
		         $gtduelist="SELECT * FROM `student_fees` WHERE `due_amount` > 0 AND `student_id` ='$studentid'  AND `fiscal_year_id`<='$fiscalyearid'"; //AND `fiscal_year_details_id` <= '$fiscalyeardeatilsid'
		     }
		     else{
		         $gtduelist="SELECT * FROM `student_fees` WHERE `due_amount` > 0 AND `student_id` ='$studentid' AND `fiscal_year_details_id` <= '$fiscalyeardeatilsid' AND `fiscal_year_id`='$fiscalyearid'";
		     }
		    
		    }
		    else{
		        $gtduelist="SELECT * FROM `student_fees` WHERE `due_amount` > 0 AND `student_id` ='$studentid' AND `fiscal_year_details_id` <= '$fiscalyeardeatilsid' AND `fiscal_year_id` <='$fiscalyearid'";
		    }
		    		$sl=0;
		$qgtduelist=$mysqli->query($gtduelist);
		while($shgtduelist=$qgtduelist->fetch_assoc()){
		$sl++;
		$feesid = $shgtduelist['student_fees_id'];
		$feesHeadId = $shgtduelist['fees_head_id'];
		if ($feesHeadId == 4) {
			$due = $prvdue;
			
		}
		else{
			$due = $shgtduelist['due_amount'];
		}
		$insertintotempTable="INSERT INTO `temp_table_dbbl`(`student_id`,`branch_id`,`student_fees_id`,`fees_head_id`,`due_amount`,`bank_trans_id`) 
		     VALUES ('$studentid','$branchid','$feesid','$feesHeadId','$due','$TRANSACTION_ID')";
		    $qinstemdbbl=$mysqli->query($insertintotempTable);
		}
		}
	
//}

				// if (!($stmt = $mysqli->prepare($queryStr))) {
				// 	echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
				// }
				// if (!$stmt->bind_param("sssssssss", $userid,$txnrefnum,$cardType, $clientIp,$billamount,$fee, $merchant_fee,$totalamount,$TRANSACTION_ID)) {
				// 	echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
				// }
				// if (!$stmt->execute()) {
				// 	echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
				// }
				// $stmt->close();
				
				//$mysqli->close();
				/* close connection */
				//**** Insert Data Into DB End******//

				logger("Forward to DBBL Payment Gateway Page: https://ecom1.dutchbanglabank.com/ecomm2/ClientHandler?card_type=".$cardType."&trans_id=".$trans_id_en);
				// ***** Send To DBBL Payment Gateway Start *******//
				header("Location: https://ecom1.dutchbanglabank.com/ecomm2/ClientHandler?card_type=".$cardType."&trans_id=".$trans_id_en);

			} else {
				$errmsg = $value;
				 //echo $errmsg;
			} 
		//"-------------Result Processing End-----------------";	
	   } else {
				$errmsg = $value;
			//	echo $errmsg;
			}

	}
} catch(Exception $e) {
	$errmsg =  "System Problem";
//	logger($e->getMessage());
//echo $errmsg;
}
?>