<?php 
$datas = file_get_contents('php://input');
$data = json_decode($datas,true);
//$data = json_decode($sessionData, true );
$dataPart1 = explode('"',$datas);



		  $skey1=$dataPart1[3];
          $skey2=$dataPart1[7];
          $skey3=$dataPart1[11];
          $skey4=$dataPart1[15];
		 
		// echo "<br>".$skey1." ";echo $skey2." ";echo $skey3." ";echo $skey4." ";
		
	if($skey1 == "aggscRocket" AND $skey2 == "c57c26acea8df0df277ce225e4ece188256f84c9")	{
	    
	 //   $month_id = substr($skey4,0,2);
	//    $year = substr($skey4,2);
	    $student_id = $skey3;
	    $biller_id = $skey4;
	 //   $trxid = uniqid();
	    $bill_due_date = date("Ymd");
	    $querytime = date("Ymdhi");
	    $clientIp = $_SERVER['REMOTE_ADDR'];
	    include('connection.php');
	    
	   $chk = "SELECT * FROM `student_addmission` where `user_id` = '$student_id'";
        	$qchk=$mysqli->query($chk);
			$shqchk=$qchk->fetch_assoc();
			
	if(!empty($shqchk['user_id'])){
	 
	 
	       if($skey4 == 4232) {
           $send_datas = '{"Error_code": "19","Error_msg": "Biller Id Invalid"}';
	       echo ($send_datas);
       } 
	  else{  
	   $getdue = "SELECT * FROM `student_addmissions` where `user_id` = '$student_id' AND `due_amount` > 0";
	 
	   // $getdue = "SELECT SUM(`due_amount`) as totaldue FROM `student_fees` WHERE `due_amount` > 0 AND `student_id` = '$student_id' AND `fiscal_year_details_id`<='$detailsid'";
	    $qgetdue=$mysqli->query($getdue);
		$shqgetdue=$qgetdue->fetch_assoc();	
		
		$dueamount = $shqgetdue['due_amount'];
	//	$dueamount1 = $dueamount + 20;
		//echo $dueamount."<br>";

// 		$insert_bKash_payment_table = "INSERT INTO `bKash_payment`(`student_id`, `clientip`, `bill_amount`, `trans_start_date`, `month_id`, `year`, `trans_id`, `result`, `result_code`, `trans_date`,`user_mpbile_no`) 
// 		                               VALUES ('$student_id','$clientIp','$dueamount','$bill_due_date','$month_id','$year','$trxid','','','','')";
	    
// 	    $qinspt=$mysqli->query($insert_bKash_payment_table);
if($dueamount == 0){
    	    	$send_datas = '{"Error_code":"15","Error_msg":"Already paid"}';
	 echo ($send_datas);
}
else{
	$send_datas = '{"Error_code":"00","Error_msg":"Validation  Successful","consumer_name":"'.$student_name.'","biller_id":"'.$biller_id.'","bill_amount":"'.$dueamount.'","bill_due_date":"'.$bill_due_date.'","querytime":"'.$querytime.'"}';
	 echo ($send_datas); 
}
}
	}		
	 else{   
	    $getstudentinfo ="SELECT * FROM `borno_student_info` WHERE `borno_student_info_id` ='$student_id'";
		$qgetstudentinfo=$mysqli->query($getstudentinfo);
		$shqgetstudentinfo=$qgetstudentinfo->fetch_assoc();	
		$student_name = $shqgetstudentinfo['borno_school_student_name'];
		$session =$shqgetstudentinfo['borno_school_session'];
	    $class_id = $shqgetstudentinfo['borno_school_class_id'];
	    $branchid = $shqgetstudentinfo['borno_school_branch_id'];

       if(($class_id == 16 OR $class_id == 17) AND $skey4 == 4232) {
           $send_datas = '{"Error_code": "19","Error_msg": "Biller Id Invalid"}';
	       echo ($send_datas);
       }
       elseif(($class_id != 16 OR $class_id != 17) AND $skey4 == 4233){
                      $send_datas = '{"Error_code": "19","Error_msg": "Biller Id Invalid"}';
	       echo ($send_datas);
       }
	else{	
		if(empty($student_name)){
		   $send_datas = '{"Error_code": "14","Error_msg": "Student ID Mismatch"}';
	       echo ($send_datas);
		}
		else{
	    

	        $getdue = "SELECT SUM(`due_amount`) as totaldue FROM `student_fees` WHERE `due_amount` > 0 AND `student_id` = '$student_id'";
	 
	   // $getdue = "SELECT SUM(`due_amount`) as totaldue FROM `student_fees` WHERE `due_amount` > 0 AND `student_id` = '$student_id' AND `fiscal_year_details_id`<='$detailsid'";
	    $qgetdue=$mysqli->query($getdue);
		$shqgetdue=$qgetdue->fetch_assoc();	
		
		$dueamount = $shqgetdue['totaldue'];
	//	$dueamount1 = $dueamount + 20;
		//echo $dueamount."<br>";

// 		$insert_bKash_payment_table = "INSERT INTO `bKash_payment`(`student_id`, `clientip`, `bill_amount`, `trans_start_date`, `month_id`, `year`, `trans_id`, `result`, `result_code`, `trans_date`,`user_mpbile_no`) 
// 		                               VALUES ('$student_id','$clientIp','$dueamount','$bill_due_date','$month_id','$year','$trxid','','','','')";
	    
// 	    $qinspt=$mysqli->query($insert_bKash_payment_table);
if($dueamount == 0){
    	    	$send_datas = '{"Error_code":"15","Error_msg":"Already paid"}';
	 echo ($send_datas);
}
else{
	$send_datas = '{"Error_code":"00","Error_msg":"Validation  Successful","consumer_name":"'.$student_name.'","biller_id":"'.$biller_id.'","bill_amount":"'.$dueamount.'","bill_due_date":"'.$bill_due_date.'","querytime":"'.$querytime.'"}';
	 echo ($send_datas); 
}
	}
}
}
}
	
//}
    
//}
	else{
	    	$send_datas = '{"Error_code":"01","Error_msg":"Invalid BasicAuthentication"}';
	 echo ($send_datas);
	}	 

		 

?>