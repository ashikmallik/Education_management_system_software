<?php 
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
   		

$studentname= $_POST['studentname'];
$fiscalyeardeatilsid= $_POST['fiscalyeardeatilsid'];
$fiscalyearid= $_POST['fiscalyearid'];
$studentid= $_POST['studentid'];
$totalammount= $_POST['totalammount'];
$branchid= $_POST['branchid'];
$prvdue= $_POST['prvdue'];
$mobile= $_POST['mobile'];
//$optcard= $_POST['optcard'];


$paymentdate = date("Y-m-d");

$totaldues = $prvdue+$totalammount;
$billamount1 = $prvdue+$totalammount;
$billamount = $billamount1;
$bank_fee = 0;

   echo $studentname."<br> ";echo $studentid."<br> ";echo $billamount."<br> ";echo $paymentdate."<br> ";echo $mobile."<br> ";echo $prvdue."<br> ";echo $branchid."<br> ";
   
   		
   		
		$txnrefnum = $studentid;
		logger('txnrefnum:'.$txnrefnum);
		$clientIp = $_SERVER['REMOTE_ADDR']; ///'18.42.12.56'; // $_SERVER['REMOTE_ADDR'];
		logger('clientIp:'.$clientIp);
	
		
		
// 		$billamount = $_POST['amount'];
// 		logger('billamount:'.$billamount);		
// 		$billamount = $billamount * 100; // Convert Taka into Paisa  //
// 		$fee = $_POST['fee']; 
// 		$fee = $fee* 100;			// Convert Taka into Paisa  //
// 		$merchant_fee = 0;
		$totalpayableamount = $totaldues;  //10;
		$totalpayableamount = $totalpayableamount;   // Convert Taka into Paisa  //
		logger('totalamount:'.$totalpayableamount);	
		// $totalamount = $billamount+$fee+$merchant_fee; 

//		$submername = 'MMSC-School_Motijheel';
//		$submerid = '000599002240001';
//		$terminalid = '59905341';

// 		$submername = 'SHL-Paystation';
//      	$submerid = '000599002390001';
// 		$terminalid = '59905577';
    
$post_data ='{
"AccessUser":{
	"userName":"a2i@pmo",
	"password":"sbPayment0002"
},
"invoiceNo":"$studentid", 
"amount":"$billamount",
"invoiceDate":$paymentdate, 
"accounts": [
      {
  "crAccount": "0002634313655",
  "crAmount": $billamount
   } 
  ]
}';

//$data_json = json_encode($post_data);
//echo $post_data;

        $ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://spgapi.sblesheba.com:6314/api/v2/SpgService/GetAccessToken");
		//added
		curl_setopt($ch, CURLOPT_TIMEOUT, 100);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 100);
		curl_setopt($ch, CURLOPT_POST, 1 );

		//added

		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json","Authorization: Basic ZHVVc2VyMjAxNDpkdVVzZXJQYXltZW50MjAxNA=="));
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC

		//$result = curl_exec($ch);
		//curl_close($ch);
		;
		/*  echo $result; 
		var_dump($result);
		return;  */

        curl_setopt($ch, CURLOPT_FRESH_CONNECT, TRUE);
		$content = curl_exec($ch);

		$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		//echo $code;
		//echo $content;
		//$code=0;;

		//echo "<br>";
	//	print_r( $content);
		// return; 
				$sessionData="";

		if($code == 200)
		{
			curl_close( $ch);
			$sessionData = $content;
		} 
		else 
		{
			curl_close( $ch);
			$msg="<font size=4 color=red><b>Network Problem. Please Try again later.</b></font>";
			//echo $rot.'-'.$cont.'-'.$cont_status.'-'.$assignmentType.'-'.$msg;
		//	return;
		//	$this->cnfTruckEntryForm($rot,$cont,$cont_status,$assignmentType,$msg);
		//	return;
			echo "FAILED TO CONNECT  API";
		/* 	echo "FAILED TO CONNECT  API";
			exit; */ 
		}

         // $data = json_decode($sessionData, true );
	
		  $dataPart = explode('"',$sessionData);


		  $skey=$dataPart[11];

	//	  echo $skey;

// print nen $skey
		  

$post_data2='{
"authentication":{
  "apiAccessUserId": "a2i@pmo",
  "apiAccessToken": "'.$skey.'"
},  
  "referenceInfo": {
  "InvoiceNo": "$studentid",
  "invoiceDate": "$paymentdate",
  "returnUrl": "https://amareskul.com/mmsc/feesPortal/payment_success_spg.php",
  "totalAmount": "$billamount",
  "applicentName": "$studentname",
  "applicentContactNo": "$mobile",
  "extraRefNo": "2132"
   },
  "creditInformations": [
   {
    "slno": "1",
    "crAccount": "0002634313655",
    "crAmount": "$billamount",
    "tranMode": "TRN"
   }
  ]
}';

	//$data_json1 = json_encode($post_data2);

	//echo $data_json1;
		$handle = curl_init();
		curl_setopt($handle, CURLOPT_URL, "https://spgapi.sblesheba.com:6314/api/v2/SpgService/CreatePaymentRequest");
		//added
		curl_setopt($handle, CURLOPT_TIMEOUT, 30);
		curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($handle, CURLOPT_POST, 1 );


		//added

		curl_setopt($handle, CURLOPT_HTTPHEADER, array("Content-Type: application/json","Authorization: Basic ZHVVc2VyMjAxNDpkdVVzZXJQYXltZW50MjAxNA=="));
		curl_setopt($handle, CURLOPT_POST, 1);
		curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data2);

		curl_setopt($handle, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC


		$content2 = curl_exec($handle);

		$code1 = curl_getinfo($handle, CURLINFO_HTTP_CODE);

//          echo $code1;
//		 echo $content2;
	
		if($code1 == 200)
			{
			curl_close( $handle);
			$getData = $content2;
			} 
		else 
			{
			curl_close( $handle);
			$msg="<font size=4 color=red><b>Network Problem. Please Try again later.</b></font>";
	
			//$this->cnfTruckEntryForm($rot,$cont,$cont_status,$assignmentType,$msg);
			return;
			}

        // $data1 = json_decode($getData, true );
	
		  $dataPart1 = explode('"',$getData);


		  $skey1=$dataPart1[7];

	//	  echo $skey1;

header("Location:https://spg.sblesheba.com:6313/SpgLanding/SpgLanding/$skey1");
		
// 		//---- Declare and Assign Web Service Data -----//
// 		$wsdlUrl = 'https://ecom1.dutchbanglabank.com/ecomws/dbblecomtxn?wsdl';
// 		$options = array(
// 		'cache_wsdl' => 0,
// 		'trace' => 1,
// 		'stream_context' => stream_context_create(array(
// 			  'ssl' => array(
// 				   'verify_peer' => false,
// 					'verify_peer_name' => false,
// 					'allow_self_signed' => true
// 			  )
// 		)));
// 		$client = new SoapClient($wsdlUrl, $options);
// 		$cParameters = array(
// 		'userid' => $userid,
// 		'pwd' => $pwd,
// 		'submername' => $submername,
// 		'submerid' => $submerid,
// 		'terminalid' => $terminalid,
// 		'amount' => $totalpayableamount,
// 		'cardtype' => $cardType,
// 		'txnrefnum' => $txnrefnum,
// 		'clientip' => $clientIp
// 		);



// 		$result = $client->getsubmertransid($cParameters);
// 		// print_r($result);
			
// 		foreach ($result as $value)
// 		logger('result:'.$value);			
// 		 //echo 'Result:'.$value;	
			
// 		//"-------------Result Processing Start-----------------";
// 		$TRANSACTION_ID = "N/A"; 
// 		$part1 = "";
// 		$part2 = "";
// 		$errmsg = '';
		
// 		if (strpos($value,"TRANSACTION_ID") !== false) {
		
// 			$arr = explode(":",$value);
// 			$part1 = $arr[0];
// 			$part2 = $arr[1];
// 			if ($part1 == "TRANSACTION_ID") {
// 				$TRANSACTION_ID = $part2;
// 				$_SESSION['trans_id'] = $TRANSACTION_ID;
// 				$trans_id_en = urlencode($TRANSACTION_ID);
				
// 				setcookie('trans_id',$TRANSACTION_ID,time()+300,"/");
				
// 				//**** Insert Data Into DB Start******//
// 			// include('db.php');
//                  include('../connection.php');
                 
                 
//                  $gtstdName ="select * from `borno_student_info` where `borno_student_info_id`='$studentid'";
// 					$qgststdName=$mysqli->query($gtstdName);
// 					$shsstdname=$qgststdName->fetch_assoc();
//                     $session = $shsstdname['borno_school_session'];
// 				//$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
// 				$queryStr = "INSERT INTO spg_payment(merchant_id,txnrefnum,clientip,bill_amount,bank_fee, merchant_fee,total_amount,bank_trans_id, trans_start_date) 
// 					VALUES('$submerid','$txnrefnum','$clientIp','$billamount','$bank_fee','0','$totalpayableamount','$TRANSACTION_ID', now())";
// 					$qinstdbbl=$mysqli->query($queryStr);
		
// 		if(empty($fiscalyeardeatilsid))	{
// 		    $gtduelist1="SELECT * FROM `student_fees` WHERE `due_amount` > 0 AND `student_id` ='$studentid' AND trim(`session`) = '$session' AND `fiscal_year_details_id` = 0";
// 		    		$sl=0;
// 		$qgtduelist1=$mysqli->query($gtduelist1);
// 		while($shgtduelist1=$qgtduelist1->fetch_assoc()){
// 		$sl++;
// 		$feesid = $shgtduelist1['student_fees_id'];
// 		$feesHeadId = $shgtduelist1['fees_head_id'];
// 		if ($feesHeadId == 4) {
// 	    if($prvdue == 0){
// 		    $due = 0;
// 		}
// 		else{
// 		$due = $prvdue;
// 		}
			
// 		}
// 		else{
// 			$due = $shgtduelist1['due_amount'];
// 		}

// 		$insertintotempTable="INSERT INTO `temp_table_dbbl`(`student_id`,`branch_id`,`student_fees_id`,`due_amount`,`bank_trans_id`) 
// 		     VALUES ('$studentid','$branchid','$feesid','$due','$TRANSACTION_ID')";
// 		    $qinstemdbbl=$mysqli->query($insertintotempTable);
// 		}
// 		}	
// 		else{
// 		    $gtduelist="SELECT * FROM `student_fees` WHERE `due_amount` > 0 AND `student_id` ='$studentid'AND `fiscal_year_details_id` <= '$fiscalyeardeatilsid' AND `fiscal_year_id`='$fiscalyearid'";
// 		    		$sl=0;
// 		$qgtduelist=$mysqli->query($gtduelist);
// 		while($shgtduelist=$qgtduelist->fetch_assoc()){
// 		$sl++;
// 		$feesid = $shgtduelist['student_fees_id'];
// 		$feesHeadId = $shgtduelist['fees_head_id'];
// 		if ($feesHeadId == 4) {
// 			$due = $prvdue;
			
// 		}
// 		else{
// 			$due = $shgtduelist['due_amount'];
// 		}
// 		$insertintotempTable="INSERT INTO `temp_table_dbbl`(`student_id`,`branch_id`,`student_fees_id`,`due_amount`,`bank_trans_id`) 
// 		     VALUES ('$studentid','$branchid','$feesid','$due','$TRANSACTION_ID')";
// 		    $qinstemdbbl=$mysqli->query($insertintotempTable);
// 		}
// 		}
	


// 				// if (!($stmt = $mysqli->prepare($queryStr))) {
// 				// 	echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
// 				// }
// 				// if (!$stmt->bind_param("sssssssss", $userid,$txnrefnum,$cardType, $clientIp,$billamount,$fee, $merchant_fee,$totalamount,$TRANSACTION_ID)) {
// 				// 	echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
// 				// }
// 				// if (!$stmt->execute()) {
// 				// 	echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
// 				// }
// 				// $stmt->close();
				
// 				//$mysqli->close();
// 				/* close connection */
// 				//**** Insert Data Into DB End******//

// 				logger('Forward to DBBL Payment Gateway Page:'.$dbblurl."/ecomm2/ClientHandler?card_type=".$cardType."&trans_id=".$trans_id_en);
// 				// ***** Send To DBBL Payment Gateway Start *******//
// 				header("Location: https://ecom1.dutchbanglabank.com/ecomm2/ClientHandler?card_type=".$cardType."&trans_id=".$trans_id_en);

// 			} else {
// 				$errmsg = $value;
// 				// echo $errmsg;
// 			} 
// 		//"-------------Result Processing End-----------------";	
// 	   } else {
// 				$errmsg = $value;
// 			}

	}
} catch(Exception $e) {
	$errmsg =  "System Problem";
//	logger($e->getMessage());
}


?>