<?php 
$datas = file_get_contents('php://input');
$data = json_decode($datas,true);
//$data = json_decode($sessionData, true );
$dataPart1 = explode('"',$datas);

//print_r($data);

		  $skey1=$dataPart1[3];
          $skey2=$dataPart1[7];
          $skey3=$dataPart1[11];
          $skey4=$dataPart1[15];
          $skey5=$dataPart1[19];
		  $skey6=$dataPart1[23];
		  $skey7=$dataPart1[27];
		  $skey8=$dataPart1[31];
		// echo "<br>".$skey1." ";echo $skey2." ";
		
	if($skey1 == "aggscRocket" AND $skey2 == "c57c26acea8df0df277ce225e4ece188256f84c9")	{
	    
	    
  //	    $send_datas = '{"Error_code":"'.$skey1.'","Error_msg":"'.$skey2.'","consumer_name":"'.$skey3.'","bill_month":"'.$skey4.',"bill_amount":"'.$skey5.',"bill_due_date":"'.$skey6.',"trxid":"'.$skey7.'","querytime":"'.$skey8.'"}';
  //	 echo ($send_datas);

$biller_id = $skey4;
$student_id = $skey3;
$trxid =  $skey7;
$month_id = date("m");
$year = date("Y");
$bill_due_date = date("Ymd");
$receiptdate=date('d/m/Y');
//$receiptdatetime=date('Y-m-d h:i:s');
$querytime = $skey8;
$clientIp = $_SERVER['REMOTE_ADDR'];
$user_mpbile_no = $skey6;
include('connection.php');

$chk = "SELECT * FROM `student_addmissions` where `user_id` = '$student_id'";
        	$qchk=$mysqli->query($chk);
			$shqchk=$qchk->fetch_assoc();
	if(!empty($shqchk['user_id'])){
	    
	    
	    $getdue = "SELECT * FROM `student_addmissions` where `user_id` = '$student_id' AND `due_amount` > 0";
	 
	   // $getdue = "SELECT SUM(`due_amount`) as totaldue FROM `student_fees` WHERE `due_amount` > 0 AND `student_id` = '$student_id' AND `fiscal_year_details_id`<='$detailsid'";
	    $qgetdue=$mysqli->query($getdue);
		$shqgetdue=$qgetdue->fetch_assoc();	
		
		$student_name = $shqgetdue['student_name'];
		
		$bill_amount = $shqgetdue['due_amount'];
		if($bill_amount == 0){
    	    	$send_datas = '{"Error_code":"15","Error_msg":"Already paid"}';
	 echo ($send_datas);
} 
        else{
            if(empty($skey5)){
        	   $send_datas = '{"Error_code":"10","Error_msg":"Bill Amount Missing"}';
	     echo ($send_datas);
    }
    else{
        	   if($bill_amount != $skey5){
	   $send_datas = '{"Error_code":"11","Error_msg":"Invalid Bill Amount"}';
	     echo ($send_datas);
	   }
	   else{
	       	       if(empty($trxid)){
	           $send_datas = '{"Error_code":"13","Error_msg":"Transaction ID Missing"}';
	     echo ($send_datas);
	       }
	       else{
	   $insert_Rocket_payment_table = "INSERT INTO `Rocket_payment`(`student_id`, `clientip`, `bill_amount`,`bill_amount_bank_charge`, `trans_start_date`, `month_id`, `year`, `trans_id`, `result`, `result_code`, `trans_date`,`user_mpbile_no`) 
		VALUES ('$student_id','$clientIp','$bill_amount','$bill_amount','$bill_due_date','$month_id','$year','$trxid','Confirmation  Successful','00','$querytime','$user_mpbile_no')";
		  $qinspt=$mysqli->query($insert_Rocket_payment_table);
		  
		$updatestudentadmission="UPDATE `student_addmission` SET `due_amount` =0,`is_paid`='1',`tran_id`='$trxid',`payment_date`='$receiptdate' WHERE `user_id` = '$student_id'";
		    $qupdatestudentadmission=$mysqli->query($updatestudentadmission);
		if($qinspt) {   
		    
		$send_datas = '{"Error_code":"00","Error_msg":"Confirmation  Successful","consumer_name":"'.$student_name.'","biller_id":"'.$biller_id.'","bill_amount":"'.$bill_amount.'","bill_due_date":"'.$bill_due_date.'","trxid":"'.$trxid.'","PayTime":"'.$querytime.'"}';
	                echo ($send_datas);
		} 
			else{
		  $send_datas = '{"Error_code": "17","Error_msg": "Unable to updated payment"}';
	       echo ($send_datas); 
		}
	       }
	   }
    }
        }
	    
	}	
	
	else{

	    		$getstudentinfo ="SELECT * FROM `borno_student_info` WHERE `borno_student_info_id` ='$student_id'";
		$qgetstudentinfo=$mysqli->query($getstudentinfo);
		$shqgetstudentinfo=$qgetstudentinfo->fetch_assoc();	
		$student_name = $shqgetstudentinfo['borno_school_student_name'];
		$session = $shqgetstudentinfo['borno_school_session']; 
		$branchid = $shqgetstudentinfo['borno_school_branch_id'];
		$class_id = $shqgetstudentinfo['borno_school_class_id'];

		if(empty($student_name)){
		   $send_datas = '{"Error_code": "14","Error_msg": "Student ID Mismatch"}';
	       echo ($send_datas);
		}
		else{
		    

	        $getdue = "SELECT SUM(`due_amount`) as totaldue FROM `student_fees` WHERE `due_amount` > 0 AND `student_id` = '$student_id'";
	 
	    $qgetdue=$mysqli->query($getdue);
		$shqgetdue=$qgetdue->fetch_assoc();	
		$bill_amount = $shqgetdue['totaldue'];
		
		       if($bill_amount == 0){
    	    	$send_datas = '{"Error_code":"15","Error_msg":"Already paid"}';
	 echo ($send_datas);
}
else{
    
    if(empty($skey5)){
        	   $send_datas = '{"Error_code":"10","Error_msg":"Bill Amount Missing"}';
	     echo ($send_datas);
    }
    else{
	   if($bill_amount != $skey5){
	   $send_datas = '{"Error_code":"11","Error_msg":"Invalid Bill Amount"}';
	     echo ($send_datas);
	   } 
	   else{
	       if(empty($trxid)){
	           $send_datas = '{"Error_code":"13","Error_msg":"Transaction ID Missing"}';
	     echo ($send_datas);
	       }
	       else{
	       //echo $student_id." ";echo $clientIp." ";echo $bill_amount." ";echo $bill_due_date." ";echo $month_id." ";echo $year." ";echo $trxid." ";echo "200";echo "Success";echo $receiptdatetime." ";echo $user_mpbile_no." ";
	       
	   $insert_Rocket_payment_table = "INSERT INTO `Rocket_payment`(`student_id`, `clientip`, `bill_amount`,`bill_amount_bank_charge`, `trans_start_date`, `month_id`, `year`, `trans_id`, `result`, `result_code`, `trans_date`,`user_mpbile_no`) 
		VALUES ('$student_id','$clientIp','$bill_amount','$bill_amount','$bill_due_date','$month_id','$year','$trxid','Confirmation  Successful','00','$querytime','$user_mpbile_no')";
		  $qinspt=$mysqli->query($insert_Rocket_payment_table);
	    
	    
	    
	    	    	$receiptn=date("dhis");
	    
	    $getfeesid="SELECT * FROM `student_fees` WHERE `due_amount` > 0 AND `student_id` = '$student_id'  LIMIT 1"; //AND `Year` <= '$year' AND `month_id` <= '$month_id'
		$qgetfeesid=$mysqli->query($getfeesid);
		$shqgetfeesid=$qgetfeesid->fetch_assoc();	
		$feeid = $shqgetfeesid['student_fees_id'];
		$receiptno = $feeid.$receiptn;
	    
	    
	   $updatestudentfees="SELECT * FROM `student_fees` WHERE `due_amount` > 0 AND `student_id` = '$student_id'";
		
		$qupdatestudentfees=$mysqli->query($updatestudentfees);
		while($shqupdatestudentfees=$qupdatestudentfees->fetch_assoc()){
		    
		    
		    
		$feesid = $shqupdatestudentfees['student_fees_id'];
		$due = $shqupdatestudentfees['due_amount'];
		$sid = $shqupdatestudentfees['student_id'];
        $fees_head_id = $shqupdatestudentfees['fees_head_id'];
		    
		    

		    
		    
		    $update="UPDATE `student_fees` SET `due_amount`=`due_amount`-'$due',`paid_amount`=`paid_amount`+'$due',`receive_amount`=`receive_amount`+'$due',`isPaid`='1',`isComplete`='1',`bank_trans_id`='$trxid',`money_receipt_no`='$receiptno',`receive_date`='$receiptdate' WHERE `student_fees_id` = '$feesid'";
		    $qinstemdbbl=$mysqli->query($update);
		    
		    if($qinstemdbbl){
		        
		  $studentinfo = "SELECT * FROM `borno_student_info` WHERE `borno_student_info_id` = '$sid'";
		 $qstudentinfo=$mysqli->query($studentinfo);
		$shqstudentinfo=$qstudentinfo->fetch_assoc();	
		$branch_id = $shqstudentinfo['borno_school_branch_id'];
		$class_id = $shqstudentinfo['borno_school_class_id'];
		$shift_id = $shqstudentinfo['borno_school_shift_id'];
		$section_id = $shqstudentinfo['borno_school_section_id'];
		$session = $shqstudentinfo['borno_school_session'];
		$student_name = $shqstudentinfo['borno_school_student_name'];
		$roll = $shqstudentinfo['borno_school_roll'];
		    
		  $insertintocdetailsTable="INSERT INTO `collection_details`( `student_id`,`branch_id`, `class_id`, `shift_id`, `section_id`, `session`, `student_name`, `roll`, `student_fees_id`, `fees_head_id`, `receive_amount`, `bank_trans_id`, `money_receipt_no`, `receive_date`,`received_from`) 
	                         VALUES ('$sid','$branch_id','$class_id','$shift_id','$section_id','$session','$student_name','$roll','$feesid','$fees_head_id','$due','$trxid','$receiptno','$receiptdate','Rocket_app')";
		    $qinscdetails=$mysqli->query($insertintocdetailsTable); 
		    }
		    else{
		        	    	$send_datas = '{"Error_code": "16","Error_msg": "Unable to Update Student_Fees"}';
	                       echo ($send_datas);
		    }
		    
		}
	    
	    
	    
	 
	
		//-----------------//
		
		if($qinscdetails){
		    	   	$send_datas = '{"Error_code":"00","Error_msg":"Confirmation  Successful","consumer_name":"'.$student_name.'","biller_id":"'.$biller_id.'","bill_amount":"'.$bill_amount.'","bill_due_date":"'.$bill_due_date.'","trxid":"'.$trxid.'","PayTime":"'.$querytime.'"}';
	                echo ($send_datas); 
		}
		else{
		    
		    
		  $send_datas = '{"Error_code": "17","Error_msg": "Unable to Insert Collection_Details"}';
	       echo ($send_datas); 
		}
		

	       }  
	   
	   }
    }		    
}	
		}	
	}
}
	
	
	else{
	    	$send_datas = '{"Error_code": "03","Error_msg": "Invalid Authentication"}';
	 echo ($send_datas);
	}	 

		 

?>