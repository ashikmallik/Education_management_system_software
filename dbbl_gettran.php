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
$_POST['trans_id'] = "OidddsPcz6Zmpb8IrSiCXTI9nKo=";
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
			include('connection.php');
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
        
        
        
        
		$update="UPDATE `student_fees` SET `due_amount`=`due_amount`-'$due',`paid_amount`=`paid_amount`+'$due',`receive_amount`=`receive_amount`+'$due',`isPaid`='1',`isComplete`='1',`bank_trans_id`='$trans_id',`money_receipt_no`='$receiptno',`receive_date`='$paymentdate' WHERE `student_fees_id` = '$feesid'";
		  //  $qinstemdbbl=$mysqli->query($update);
		    
		   logger($receiptno,$trans_id,$due); 
		}
		 logger('=================== Transaction Completed =======================');   
		$message = "Transaction Successful";
		echo $message;
		    
	
				
			} else if($RESULT_CODE == '116'){
				$RESULTSTR = 'Not Sufficient Amount';
				
			logger('Not Sufficient Amount');	
		$message = "Not Sufficient Amount";
		echo "$message";
				
			} else if($RESULT_CODE == '117'){
				$RESULTSTR = 'Incorrect PIN';
				
			logger('Incorrect PIN');	
		$message = "Incorrect PIN";
				echo "$message";
				logger('Incorrect PIN');
			} else {
				$RESULTSTR = 'Failed';
				
				logger('Failed');
				    $message = "Error";
		echo "$message";
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