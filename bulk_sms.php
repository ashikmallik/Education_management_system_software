<?php 
include('connection.php');


//$phone = array();


$getmax = "select COUNT(id) as max FROM `phone_no`";
$qgetmax=$mysqli->query($getmax);
$sqgetmax=$qgetmax->fetch_assoc();
$max= $sqgetmax['max'];

	$gtstudent="SELECT * FROM `phone_no`";
	$qgtstudent=$mysqli->query($gtstudent);
	$s=0;
	while($shroll=$qgtstudent->fetch_assoc()){ 
	       $s++;
		

			$To=$shroll['phone_no'];
			if($s==1){
			    $numbers = $To .'",';
			}
			else if($s<$max)	{
			    $numbers = '"'.$To .'",';
			}		
			else{
			    $numbers = '"'.$To;
			}
		
		    $tonumbers.=$numbers;
		    
		    
//	$phone[] = $numbers;	    
        

}

//echo $tonumbers;
$phoneNo= [$tonumbers];
//$phone= trim($phoneNo,"><\/Ref");
$massg = "test";


$post_data =array(
    
           'UserName'=>'amar.school',
           'Password'=>'quicktext123',
           'Message'=>$massg,
           'Mask'=>'mmodel.edu',
           //'MSISDN'=>trim($phoneNo,"><\/Ref")
           'MSISDN'=>$phoneNo
    
    );

$data_json = stripslashes(json_encode($post_data));
//echo $post_data;
//echo $data_json;

        $ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://portal.quicktextbd.com/API/SendSMSv2");
		//added
		curl_setopt($ch, CURLOPT_TIMEOUT, 100);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 100);
		curl_setopt($ch, CURLOPT_POST, 1 );

		//added

		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC

		$result = curl_exec($ch);
		curl_close($ch);
//		echo $result;
//		;
		/*  echo $result; 
		var_dump($result);
		return;  */

//echo $phoneNo;
// $phones = JSON.stringify($phoneNo,"");

//$phone[] = $tonumbers;

//print_r($phone);
//echo $max;

// $curl = curl_init();

// curl_setopt_array($curl, array(
//   CURLOPT_URL => 'https://portal.quicktextbd.com/API/SendSMSv2?Content-Type=application/json',
//  // CURLOPT_URL => 'https://amareskul.com/mmsc/sms_test.php?Content-Type=application/json',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 0,
//   CURLOPT_FOLLOWLOCATION => true,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => 'POST',
//   CURLOPT_POSTFIELDS =>'{
//                         "UserName":"amar.school",
//                         "Password":"quicktext123",
//                         "Message":"test",
//                         "Mask":"mmodel.edu",
//                         "MSISDN":"'.$To.'"
//       }',
//   CURLOPT_HTTPHEADER => array(
//     'Content-Type: application/json'
//   ),
// ));

// $response = curl_exec($curl);

// curl_close($curl);
// echo $response;


//$curl = curl_init();

// curl_setopt_array($curl, array(
//   CURLOPT_URL => 'http://portal.quicktextbd.com/API/SendSMSv2?userId=amar.school&password=quicktext123&commaSeperatedReceiverNumbers=$tonumbers&mask=mmodel.edu&smsText=test',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 0,
//   CURLOPT_FOLLOWLOCATION => true,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => 'GET',
//   CURLOPT_HTTPHEADER => array(
//     'Cookie: ASP.NET_SessionId=zjm02hmlcyw2drcb0a331mze'
//   ),
// ));

// $response = curl_exec($curl);

// curl_close($curl);
// echo $response;





//echo ;
?>
