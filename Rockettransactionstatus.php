<?php 
$datas = file_get_contents('php://input');
$data = json_decode($datas,true);
//$data = json_decode($sessionData, true );
$dataPart1 = explode('"',$datas);

//print_r($data);

		  $skey1=$dataPart1[3];
          $skey2=$dataPart1[7];
          $skey3=$dataPart1[11];

		// echo "<br>".$skey1." ";echo $skey2." ";
		
	if($skey1 == "aggscRocket" AND $skey2 == "c57c26acea8df0df277ce225e4ece188256f84c9")	{
	    
	    

include('connection.php');
 $trxid =  $skey3;
$gettrans = "SELECT `bank_trans_id` FROM `collection_details` WHERE `bank_trans_id` = '$trxid'";
	    $qgettrans=$mysqli->query($gettrans);
		$shqgettrans=$qgettrans->fetch_assoc();	
		$trnxid = $shqgettrans['bank_trans_id'];
		
		if(empty($trnxid)){
		  $send_datas = '{"Error_code": "18","Error_msg":"Transaction id not found"}';
	      echo ($send_datas);
		}
       else{
           $gettransinfo = "SELECT * FROM `Rocket_payment` WHERE `trans_id` = '$trxid'";
	    $qgettransinfo=$mysqli->query($gettransinfo);
		$shqgettransinfo=$qgettransinfo->fetch_assoc();	
		
		$bill_amount = $shqgettransinfo['bill_amount_bank_charge'];
		$trans_id = $shqgettransinfo['trans_id'];
		$paytime = $shqgettransinfo['trans_date'];
		
		  $send_datas = '{"Error_code":"00","Error_msg":"Confirmation Successful","bill_amount":"'.$bill_amount.'","trxid":"'.$trans_id.'","paytime":"'.$paytime.'"}';
  	      echo ($send_datas);
           
       }


       
	}
	else{
	    	$send_datas = '{"Error_code": "03","Error_msg": "Invalid Authentication"}';
	 echo ($send_datas);
	}	 

		 

?>