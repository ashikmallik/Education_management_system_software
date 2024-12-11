<?php require_once('fees_sett_top.php');

$detailsid=$_GET['detailsid'];

	$getFeesHeadName="select * from process_details WHERE  process_details_id = '$detailsid'";
 	$qgetFeesHeadName=$mysqli->query($getFeesHeadName);
	$shFeesHeadName=$qgetFeesHeadName->fetch_assoc();
	
	$monthid=$shFeesHeadName['month_id'];
	$monthsortname=$shFeesHeadName['month_short_name'];
	$year=$shFeesHeadName['year'];
	$processid=$shFeesHeadName['process_setup_id'];
	$cdate = date("d/m/Y");
	
	
	
	$getprocessinfo = "SELECT * FROM `process_setup` WHERE process_setup_id = '$processid'";
	$qgetprocessinfo=$mysqli->query($getprocessinfo);
	$shgetprocessinfo=$qgetprocessinfo->fetch_assoc();
	
	$classid = $shgetprocessinfo['class_id'];
	$fiscal_year_id = $shgetprocessinfo['fiscal_year_id'];
	$stsess = trim($shgetprocessinfo['stsess']);

     
     if($classid!=""){
	  
	 // echo $classid;
  		$gtstudentinfo="SELECT * FROM `borno_student_info` WHERE `borno_school_class_id`='$classid' AND `borno_school_session`='$stsess' AND `student_type` = 0";
	
		$qgtstudentinfo=$mysqli->query($gtstudentinfo);
		while($shgtstudentinfo=$qgtstudentinfo->fetch_assoc()){
	
		$studentinfoid = $shgtstudentinfo['borno_student_info_id'];
		
	//	echo $studentinfoid;
		
		$gtheadid="SELECT * FROM `fees_head` WHERE `class_id` ='$classid'  AND fiscal_year_id = '$fiscal_year_id' AND head_type ='Monthly'";
	
		$qgtheadid=$mysqli->query($gtheadid);
		while($shgtheadid=$qgtheadid->fetch_assoc()){
	
		$headid = $shgtheadid['fees_head_id'];
		$amount = $shgtheadid['amount'];
		
		
// 		echo $stsess;
// 		echo $studentinfoid;
// 		echo $headid;
// 		echo $amount;
// 		echo $monthid;
// 		echo $monthsortname;
// 		echo $year;
// 		echo $fiscal_year_id;
// 		echo $cdate;

		
		
			$infeesstuden="INSERT INTO `student_fees`(`session`, `student_id`, `fees_head_id`, `due_amount`, `total_amount`, `paid_amount`, `receive_amount`, `advance_amount`, `month_id`, `month_name`, `year`, `fiscal_year_id`, `isPaid`, `isComplete`, `money_receipt_no`, `published_date`, `receive_date`, `remarks`) 
	                                          VALUES ('$stsess','$studentinfoid','$headid','$amount','$amount','0','0','0','$monthid','$monthsortname','$year','$fiscal_year_id','0','0','0','$cdate','','')";
	        						$qinfeesstuden=$mysqli->query($infeesstuden);
	        						
	        			// 			if($qinfeesstuden){
	        						    
	        			// 			}
	        			// 			else{
	        			// 			    $message = 'Something Wrong !';
            //                                 echo "<SCRIPT> 
            //                                     alert('$message')
            //                                     window.location.replace('process.php');
            //                                 </SCRIPT>";
	        			// 			}
     
       }
		
		
     
       }
       
         		$gtstudentinfo="SELECT * FROM `borno_student_info` WHERE `borno_school_class_id`='$classid' AND `borno_school_session`='$stsess' AND `student_type` = 1";
	
		$qgtstudentinfo=$mysqli->query($gtstudentinfo);
		while($shgtstudentinfo=$qgtstudentinfo->fetch_assoc()){
	
		$studentinfoid = $shgtstudentinfo['borno_student_info_id'];
		
	//	echo $studentinfoid;
		
		$gtheadid="SELECT * FROM `fees_head` WHERE `class_id` ='$classid'  AND fiscal_year_id = '$fiscal_year_id' AND head_type ='Monthly'";
	
		$qgtheadid=$mysqli->query($gtheadid);
		while($shgtheadid=$qgtheadid->fetch_assoc()){
	
		$headid = $shgtheadid['fees_head_id'];
		$amount = $shgtheadid['civilian_students_amount'];
		
		
// 		echo $stsess;
// 		echo $studentinfoid;
// 		echo $headid;
// 		echo $amount;
// 		echo $monthid;
// 		echo $monthsortname;
// 		echo $year;
// 		echo $fiscal_year_id;
// 		echo $cdate;

		
		
			$infeesstuden="INSERT INTO `student_fees`(`session`, `student_id`, `fees_head_id`, `due_amount`, `total_amount`, `paid_amount`, `receive_amount`, `advance_amount`, `month_id`, `month_name`, `year`, `fiscal_year_id`, `isPaid`, `isComplete`, `money_receipt_no`, `published_date`, `receive_date`, `remarks`) 
	                                          VALUES ('$stsess','$studentinfoid','$headid','$amount','$amount','0','0','0','$monthid','$monthsortname','$year','$fiscal_year_id','0','0','0','$cdate','','')";
	        						$qinfeesstuden=$mysqli->query($infeesstuden);
	        						
	        			// 			if($qinfeesstuden){
	        						    
	        			// 			}
	        			// 			else{
	        			// 			    $message = 'Something Wrong !';
            //                                 echo "<SCRIPT> 
            //                                     alert('$message')
            //                                     window.location.replace('process.php');
            //                                 </SCRIPT>";
	        			// 			}
     
       }
		
		
     
       }
       
 
       
       
}

			$updateprocess="UPDATE `process_details` SET `isProcessed`='1' WHERE process_details_id = '$detailsid'";
	        						$qupdateprocess=$mysqli->query($updateprocess);
	        						
	        						if($qupdateprocess){
	        						    $message = 'Process Sucsses';
                                            echo "<SCRIPT> 
                                                alert('$message')
                                                window.location.replace('process.php');
                                            </SCRIPT>";
	        						}
	        						else{
	        						    $message = 'Process Details doesnot updated!';
                                            echo "<SCRIPT> 
                                                alert('$message')
                                                window.location.replace('process.php');
                                            </SCRIPT>";
	        						}
 


 

?>