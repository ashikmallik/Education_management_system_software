<?php 
$datas = file_get_contents('php://input');
$data = json_decode($datas,true);
//$data = json_decode($sessionData, true );
$dataPart1 = explode('"',$datas);

//print_r($data);

		  $skey1=$dataPart1[13];
          $skey2=$dataPart1[45];
		  //echo "<br>".$skey1." ";echo $skey2." ";
//if($skey1=='2204060301245156' AND $skey2 == 200 ){
if($skey2 == 200 ){
    
    $send_datas = '{"status":"'.$skey2.'","message":"Updated Successfully.","TransactionId":"'.$skey1.'"}';
   // header('Content-Type: application/json; charset=utf-8');
   // $send_data = json_encode($send_datas);
    echo ($send_datas);
//     $url = "https://amareskul.com/mmsc/spghittest.php";
// $ch = curl_init($url);
// $send_data = json_encode($send_datas);
// curl_setopt($ch, CURLOPT_POST, 1);
// curl_setopt($ch, CURLOPT_POSTFIELDS, $send_data);
// $result = curl_exec($ch);
// curl_close($ch);
// if (!$result) {
//           $result = file_get_contents($url);
//       }
//       return $result; 
}
else if($skey2 == 201){
     $send_datas = '{"status":"201","message":"Unpaid.","TransactionId":"'.$skey1.'"}';
     echo ($send_datas);
}
else if($skey2 == 400){
     $send_datas = '{"status":"400","message":"Cancel.","TransactionId":"'.$skey1.'"}';
     echo ($send_datas);
}
?>