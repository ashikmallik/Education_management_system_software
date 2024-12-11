<?php 
$data='{
	"AccessUser":{"userName":"bdtaxUser2014","password":"duUserPayment2014"},
	"TransactionId": "2204060301245156",
	"RequiestId":"0301245156",
	"RefTranNo": "inv",
	"RefTranDateTime": "2022-04-06",
	"TranAmount": "500",
	"PayAmount": "510",
	"PayMode": "A02",
	"ScrollNo": "N",
	"StatusCode": "200"
}';

$url = "https://amareskul.com/mmsc/spghittest.php";
$ch = curl_init($url);
$send_data = json_encode($data);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $send_data);
$result = curl_exec($ch);
curl_close($ch);
if (!$result) {
          $result = file_get_contents($url);
      }
      return $result; 
 //header("Location:https://amareskul.com/mmsc/spghittest.php");     
?>