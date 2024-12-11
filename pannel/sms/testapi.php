<?php

$aa = array(array('01714358448'),'hello world');

	    $phone = serialize($aa);
		$token = "149161744";
		$url = "http://bulksms.myitpal.com/onreceive/sent_data_sms/";
		$data= array(
			"to"=>$phone,
			"token"=>'$token'
		); 
		$ch = curl_init(); 
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		  $smsresult = curl_exec($ch);echo $smsresult;