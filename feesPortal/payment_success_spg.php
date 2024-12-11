<?php


$session_token = $_GET['session_token'];
$status = $_GET['status'];

echo $session_token."<br>";
echo $status."<br>";


// $sessionData = file_get_contents("php://input");
// //print_r($sessionData); // See what was loaded...

// //printf(urldecode($sessionData));

// //var_dump(parse_url( $sessionData ));

// foreach (explode('&', $sessionData) as $chunk) {
//     $param = explode("=", $chunk);

//     if ($param) {
//         //  printf("Value for parameter \"%s\" is \"%s\"<br/>\n", urldecode($param[0]), urldecode($param[1]));
        
//       $restring = $param[1];
        

//     }
// }

//  // echo  $restring;
//   $s= html_entity_decode($restring);
//  // echo $s;
  
//   $uid= str_replace("ApiAccessUserId","%2C","$s");
//   $key= str_replace("AuthenticationKey","%2C","$uid");
//   $tid= str_replace("TransactionId","%2C","$key");
//   $ttime= str_replace("TranDateTime","%2C","$tid");
//   $rtn= str_replace("RefTranNo","%2C","$ttime");
//   $rtt= str_replace("RefTranDateTime","%2C","$rtn");
//   $pa= str_replace("PayAmount","%2C","$rtt");
//   $pm= str_replace("PayMode","%2C","$pa");
//   $orc= str_replace("OrgiBrCode","%2C","$pm");
//   $stm= str_replace("StatusMsg","%2C","$orc");
//   $sn= str_replace("ScrollNo","%2C","$stm");
//   $vt= str_replace("Vat","%2C","$sn");
//   $com= str_replace("Commission","%2C","$vt");
//   $ts= str_replace("TransactionStatus","%2C","$com");
 
//  //echo $ts;
 
//   $finalstrin =  urldecode($ts);
 

  
//   $arr = explode(",", $finalstrin);
//   print_r($arr);
  
  
//   $ReferenceDate= trim($arr[11],"><\/Ref");
//   $ReferenceDate1 = substr($ReferenceDate,0,-9);                         //date('Y-m-d',$ReferenceDate);
//   $Requiestid= trim($arr[5],"></");
//   $Requiestno=substr($Requiestid,6);
//   $payMode= trim($arr[15],"></");
//   $transactionStatus= trim($arr[27],"></");
  
// //echo $payMode." "; echo $transactionStatus; //trim($ReferenceDate,"<\/Ref")
// if($payMode == "A01" AND $transactionStatus == 5017){
    
// }
// else if ($payMode == "M04" AND $transactionStatus == 200){
    
// }
// else{
//     $post_data =array(
// 	"AccessUser"=>array(
// 		"userName"=>'bdtaxUser2014',
// 		"password"=>'duUserPayment2014'				
// 	 ),		
// 	"OwnerCode"=>'bdtax',
// 	"ReferenceDate"=>$ReferenceDate1,
// 	"RequiestNo"=>$Requiestno,
// 	"isEncPwd"=> true,

//   );
	
// 	$data_json = json_encode($post_data);
// //echo $data_json;

//         $ch = curl_init();
// 		curl_setopt($ch, CURLOPT_URL, "https://spgapi.sblesheba.com:6314/api/v2/SpgService/TransactionVerificationWithToken");
// 		//added
// 		curl_setopt($ch, CURLOPT_TIMEOUT, 100);
// 		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 100);
// 		curl_setopt($ch, CURLOPT_POST, 1 );

// 		//added

// 		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json","Authorization: Basic ZHVVc2VyMjAxNDpkdVVzZXJQYXltZW50MjAxNA=="));
// 		curl_setopt($ch, CURLOPT_POST, 1);
// 		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
// 		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

// 		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// 		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC

// 		//$result = curl_exec($ch);
// 		//curl_close($ch);
// 		;
// 		/*  echo $result; 
// 		var_dump($result);
// 		return;  */

//         curl_setopt($ch, CURLOPT_FRESH_CONNECT, TRUE);
// 		$content = curl_exec($ch);

// 		$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// 		//echo $code;
// 	//	echo $content;
// 		//$code=0;;

// 		//echo "<br>";
// 	//	print_r( $content);
// 		// return; 
// 				$sessionData="";

// 		if($code == 200)
// 		{
// 			curl_close( $ch);
// 			$sessionData = $content;
// 		} 
// 		else 
// 		{
// 			curl_close( $ch);
// 			$msg="<font size=4 color=red><b>Network Problem. Please Try again later.</b></font>";
// 			//echo $rot.'-'.$cont.'-'.$cont_status.'-'.$assignmentType.'-'.$msg;
// 		//	return;
// 		//	$this->cnfTruckEntryForm($rot,$cont,$cont_status,$assignmentType,$msg);
// 		//	return;
// 			echo "FAILED TO CONNECT  API";
// 		/* 	echo "FAILED TO CONNECT  API";
// 			exit; */ 
// 		}

//           $data = json_decode($sessionData, true );
	
// 		  $dataPart = explode('"',$data);


// 		  $skey=$dataPart[3];
// }

  

	//	  echo $skey;
?>