<?php 


// array(
// 	"AccessUser"=>array(
// 		"userName"=>'a2i@pmo',
// 		"password"=>'sbPayment0002'				
// 	 ),		
// 	"invoiceNo"=>'INV123456791',
// 	"amount"=>'200',
// 	"invoiceDate"=>'2022-06-05',
// 	"accounts"=>array(
// 		"crAccount"=>'0002634313655',
// 		"crAmount"=>'200'				
// 	 ),
	
// );

// $data_json = json_encode($post_data);

$paymentdate = date("Y-m-d");
$billamount = "200";

$post_data ='{
"AccessUser":{
	"userName":"a2i@pmo",
	"password":"sbPayment0002"
},
"invoiceNo":"INV123456791", 
"amount": "$billamount",
"invoiceDate":"$paymentdate", 
"accounts": [
      {
  "crAccount": "0002634313655",
  "crAmount": 200
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

		echo $code;
		echo $content;
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

		//  echo $skey;

// print nen $skey
		  

// $post_data2='{
// "authentication":{
//   "apiAccessUserId": "a2i@pmo",
//   "apiAccessToken": "'.$skey.'"
// },  
//   "referenceInfo": {
//   "InvoiceNo": "INV123456791",
//   "invoiceDate": "2022-05-15",
//   "returnUrl": "https://amareskul.com/mmsc/xmltest.php",
//   "totalAmount": "200",
//   "applicentName": "Md. Hasan Monsur",
//   "applicentContactNo": "01710563521",
//   "extraRefNo": "2132"
//   },
//   "creditInformations": [
//   {
//     "slno": "1",
//     "crAccount": "0002634313655",
//     "crAmount": "200",
//     "tranMode": "TRN"
//   }
//   ]
// }';

// 	//$data_json1 = json_encode($post_data2);

// 	//echo $data_json1;
// 		$handle = curl_init();
// 		curl_setopt($handle, CURLOPT_URL, "https://spgapi.sblesheba.com:6314/api/v2/SpgService/CreatePaymentRequest");
// 		//added
// 		curl_setopt($handle, CURLOPT_TIMEOUT, 30);
// 		curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
// 		curl_setopt($handle, CURLOPT_POST, 1 );


// 		//added

// 		curl_setopt($handle, CURLOPT_HTTPHEADER, array("Content-Type: application/json","Authorization: Basic ZHVVc2VyMjAxNDpkdVVzZXJQYXltZW50MjAxNA=="));
// 		curl_setopt($handle, CURLOPT_POST, 1);
// 		curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data2);

// 		curl_setopt($handle, CURLOPT_FOLLOWLOCATION, 1);
// 		curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
// 		curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC


// 		$content2 = curl_exec($handle);

// 		$code1 = curl_getinfo($handle, CURLINFO_HTTP_CODE);

// //          echo $code1;
// //		 echo $content2;
	
// 		if($code1 == 200)
// 			{
// 			curl_close( $handle);
// 			$getData = $content2;
// 			} 
// 		else 
// 			{
// 			curl_close( $handle);
// 			$msg="<font size=4 color=red><b>Network Problem. Please Try again later.</b></font>";
	
// 			$this->cnfTruckEntryForm($rot,$cont,$cont_status,$assignmentType,$msg);
// 			return;
// 			}

//         // $data1 = json_decode($getData, true );
	
// 		  $dataPart1 = explode('"',$getData);


// 		  $skey1=$dataPart1[7];

// 	//	  echo $skey1;

//header("Location:https://spg.sblesheba.com:6313/SpgLanding/SpgLanding/$skey1");
?>
