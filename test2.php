<?php 



// 		$gtheadid="SELECT * FROM `student_fees` WHERE `bank_trans_id` !=' ' AND `student_id` IN (SELECT `borno_student_info_id` FROM `borno_student_info` WHERE `borno_school_branch_id` = 1 AND `borno_school_class_id` IN (1) AND `borno_school_session` = '2023') GROUP BY `bank_trans_id`";

	
// 		$qgtheadid=$mysqli->query($gtheadid);
// 		while($shgtheadid=$qgtheadid->fetch_assoc()){
	
// 		$bank_trans_id = $shgtheadid['bank_trans_id'];
// 		$money_receipt_no = $shgtheadid['money_receipt_no'];
// 		$receive_date = $shgtheadid['receive_date'];
		



// 		echo "test";
		
// 			$infeesstuden="UPDATE `collection_details` SET `money_receipt_no`='$money_receipt_no',`receive_date`='$receive_date' WHERE `bank_trans_id` = '$bank_trans_id'";
// 	        						$qinfeesstuden=$mysqli->query($infeesstuden);
	        						
// 	        			// 			if($qinfeesstuden){
	        						    
// 	        			// 			}
// 	        			// 			else{
// 	        			// 			    $message = 'Something Wrong !';
//             //                                 echo "<SCRIPT> 
//             //                                     alert('$message')
//             //                                     window.location.replace('process.php');
//             //                                 </SCRIPT>";
// 	        			// 			}
     
//       }
// 		$gtheadid="SELECT * FROM `student_fees` WHERE `student_fees_id` IN (SELECT `student_fees_id` FROM `collection_details` WHERE `fees_head_id` = 4) AND `fees_head_id` NOT IN (4)";

	
// 		$qgtheadid=$mysqli->query($gtheadid);
// 		while($shgtheadid=$qgtheadid->fetch_assoc()){
	
// 		$student_fees_id = $shgtheadid['student_fees_id'];
// 		$totalamont = $shgtheadid['totalamont'];
// 	//	$receive_date = $shgtheadid['receive_date'];
// 	//	$student_fees_id = $shgtheadid['student_fees_id'];



// 		echo "test";
		
// 			$infeesstuden="UPDATE `collection_details` SET `fees_head_id`='2' WHERE `student_fees_id` = '$student_fees_id'";
// 	        						$qinfeesstuden=$mysqli->query($infeesstuden);
	        						
// 	        			// 			if($qinfeesstuden){
	        						    
// 	        			// 			}
// 	        			// 			else{
// 	        			// 			    $message = 'Something Wrong !';
//             //                                 echo "<SCRIPT> 
//             //                                     alert('$message')
//             //                                     window.location.replace('process.php');
//             //                                 </SCRIPT>";
// 	        			// 			}
     
//       }

        //	$receiptn=date("dhis");
        //$paymentdate = date("d/m/Y");
//         $gettrans =" SELECT `bank_trans_id` FROM `dbbl_payment` WHERE `trans_date` BETWEEN '2023-07-14 00:00:00' AND '2023-07-18 13:00:00' AND `result_code` = 000 ";
//         $qgettrans=$mysqli->query($gettrans);
// 		while($shqgettrans=$qgettrans->fetch_assoc()){
		    
// 		$trans_id = $shqgettrans['bank_trans_id'];
        
        

// 		$getfeesid="SELECT * FROM `collection_details` WHERE `bank_trans_id` ='$trans_id'";
// 		$sl=0;
// 		$qgetfeesid=$mysqli->query($getfeesid);
// 		$shqgetfeesid=$qgetfeesid->fetch_assoc();	
// 		$feeid = $shqgetfeesid['student_fees_id'];
// // 		$receiptno = $feeid.$receiptn;

// if(empty($feeid)){

// 		$getreciptno="SELECT * FROM `student_fees` WHERE `bank_trans_id` ='$trans_id'";
// 		$sl=0;
// 		$qgetreciptno=$mysqli->query($getreciptno);
// 		$shqgetreciptno=$qgetreciptno->fetch_assoc();	
// 		$paymentdate = $shqgetreciptno['receive_date'];
//         $receiptno = $shqgetreciptno['money_receipt_no'];

// $updatestudentfees="SELECT * FROM `temp_table_dbbl` WHERE `bank_trans_id` = '$trans_id' AND due_amount > 0";
// 		$sl=0;
// 		$qupdatestudentfees=$mysqli->query($updatestudentfees);
// 		while($shqupdatestudentfees=$qupdatestudentfees->fetch_assoc()){
// 		$sl++;
// 		$feesid = $shqupdatestudentfees['student_fees_id'];
// 		$due = $shqupdatestudentfees['due_amount'];
// 		$sid = $shqupdatestudentfees['student_id'];
// 		$branchid = $shqupdatestudentfees['branch_id'];
//         $fees_head_id = $shqupdatestudentfees['fees_head_id'];
        
        
        
// // 		$update="UPDATE `student_fees` SET `due_amount`=`due_amount`-'$due',`paid_amount`='$due',`receive_amount`='$due',`isPaid`='1',`isComplete`='1',`bank_trans_id`='$trans_id',`money_receipt_no`='$receiptno',`receive_date`='$paymentdate' WHERE `student_fees_id` = '$feesid'";
// // 		    $qinstemdbbl=$mysqli->query($update);
// // 		   logger($receiptno,$trans_id,$due); 

// 	$insertintocdetailsTable="INSERT INTO `collection_details`( `student_id`, `student_fees_id`, `fees_head_id`, `receive_amount`, `bank_trans_id`, `money_receipt_no`, `receive_date`) 
// 	                         VALUES ('$sid','$feesid','$fees_head_id','$due','$trans_id','$receiptno','$paymentdate')";
// 		    $qinscdetails=$mysqli->query($insertintocdetailsTable);
		    
// 		    if($qinscdetails){
// 		        echo "okay";
// 		    }
// }
// }
// }
?>