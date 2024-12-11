<?php require_once('fees_sett_top.php');
//$schId=1;


$sid = $_POST['sid'];
$totalReceive = $_POST['totalReceive'];
$datepicker = $_POST['datepicker'];
if(empty($_POST['remarks'])){
    $remarks ='';
}
else{
    $remarks = $_POST['remarks'];
}

$totaldue = $_POST['totaldue'];
$stsess1 = $_POST['stsess1'];

// echo $sid;
// echo $totalReceive;
// echo $datepicker;
// echo $remarks;

$receiptno=date("ymdhis");
$paymentdate = date("d-m-y");
$paymentmonth = date("M");


    $getfeesinfo = "SELECT * FROM `student_fees` WHERE `student_id` = '$sid' GROUP BY `month_id` ORDER BY `student_fees`.`month_id` DESC";
     $qgetfeesinfo=$mysqli->query($getfeesinfo);
	 $shqgetfeesinfo=$qgetfeesinfo->fetch_assoc();
	 
	 $monthid = $shqgetfeesinfo['month_id'];
	 $year = $shqgetfeesinfo['year'];

if($totalReceive == $totaldue){
    
   $insertcollectionmaster="INSERT INTO `fees_collection_master`(`student_id`, `month_id`, `session`, `year`, `money_receipt`, `payment_date`, `total_amount`, `receive_amount`, `total_discount_amount`, `payment_month`, `payment_type`, `cheque_no`, `bank_name`, `remarks`, `bank_collection_date`, `TrxID`, `PCS_BankName`, `PCS_TrxID`) 
   VALUES ('$sid','$monthid','$stsess1','$year','$receiptno','$paymentdate','$totaldue','$totalReceive','0','$paymentmonth','','','','$remarks','','','','')";
       
          $qinsertcollectionmaster=$mysqli->query($insertcollectionmaster);
        
        $getmasterid = "SELECT * FROM `fees_collection_master` WHERE `student_id` = '$sid' AND `month_id` ='$monthid' AND `session` = '$stsess1' AND `year`= '$year'";
        
         $qgetmasterid=$mysqli->query($getmasterid);
	     $shqgetmasterid=$qgetmasterid->fetch_assoc();
	     
	     $masterid = $shqgetmasterid['master_id'];
	     $receiptno1 = $shqgetmasterid['money_receipt'];
        
        $getdue="SELECT * FROM `student_fees` WHERE `student_id` = '$sid'";
   	     $sl=0;
		$qgtduelist=$mysqli->query($getdue);
		while($shgtduelist=$qgtduelist->fetch_assoc()){
		 $sl++;
		 
		 $headid = $shgtduelist['fees_head_id'];
		 $dueamount = $shgtduelist['due_amount'];
		 $monthid1 = $shgtduelist['month_id'];
	     $year1 = $shgtduelist['year'];
	
	      $insertcollectiondetails ="INSERT INTO `fees_collection_details`
	        (`master_id`, `head_id`, `total_amount`, `due_amount`,`advance_amount`, `scholarship_amount`, `discount_amount`, `receive_amount`, `month_id`, `year`, `remarks`) 
	      VALUES ('$masterid','$headid','$dueamount','0','0','0','0','$dueamount','$monthid1','$year1','')" ;
	      
	      $qinsertcollectiondetails=$mysqli->query($insertcollectiondetails);
	
	   $updatestudentfees="UPDATE `student_fees` SET `due_amount`='0' ,`paid_amount`='$dueamount' ,`receive_amount`='$dueamount',`advance_amount`='0',`isPaid`='1',`isComplete`='1',`money_receipt_no`='$receiptno1',`receive_date`='$paymentdate',`remarks`=''WHERE `student_id`='$sid' AND `fees_head_id`='$headid' AND`month_id` ='$monthid1' AND `year` ='$year1' ";
	
	    $qupdatestudentfees=$mysqli->query($updatestudentfees);
	
		}
       
       
       
    	if($qupdatestudentfees) {
	       header("location:fees_collection.php?msg=1&msg1=$receiptno1");
	        }
	        else{
	            header('location:fees_collection.php?msg=2');
	        }

}
else if($totalReceive > $totaldue){
    
}
else{
    
}






   $getdue="SELECT * FROM `student_fees` WHERE `student_id` = 35";
   	     $sl=0;
		$qgtduelist=$mysqli->query($getdue);
		while($shgtduelist=$qgtduelist->fetch_assoc()){
		 $sl++;
	
	
		}

?>