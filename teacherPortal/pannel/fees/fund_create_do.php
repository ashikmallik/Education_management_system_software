<?php 
require_once('report_sett_top.php');


$studid=$_POST['studid'];

//echo $studid;

$gtstudentinfo="SELECT * FROM `borno_student_info` WHERE  `borno_student_info_id` ='$studid' AND `borno_student_status` = 1";

$qgtstudentinfo=$mysqli->query($gtstudentinfo);
		while($shgtstudentinfo=$qgtstudentinfo->fetch_assoc()){
	
		$studentinfoid = $shgtstudentinfo['borno_student_info_id'];
		$classid = $shgtstudentinfo['borno_school_class_id'];
		$branchid = $shgtstudentinfo['borno_school_branch_id'];
		$group = $shgtstudentinfo['borno_school_stud_group'];
		$stsess = $shgtstudentinfo['borno_school_session'];
		
			$gttype="SELECT * FROM `fees_head` WHERE `class_id` ='$classid' AND `branch_id`='$branchid' AND `stsess` = '$stsess'";

	
		$qgttype=$mysqli->query($gttype);
		while($shqgttype=$qgttype->fetch_assoc()){	
		   $type = $shqgttype['head_type'];
		   $fiscalid = $shqgttype['fiscal_year_id'];
		   
		  	if($type == 'Monthly'){

		
			    
		
		$gtheadid="SELECT * FROM `fees_head` WHERE `class_id` ='$classid' AND `branch_id`='$branchid' AND `fiscal_year_id` = '$fiscalid' AND head_type ='Monthly'";

	
		$qgtheadid=$mysqli->query($gtheadid);
		while($shgtheadid=$qgtheadid->fetch_assoc()){
		$headid = $shgtheadid['head_id'];
		$amount = $shgtheadid['amount'];
		$getmonthname = "SELECT * FROM `fiscal_year_details` WHERE `fiscal_year_id` = '$fiscalid'";
		$qgetmonthname=$mysqli->query($getmonthname);
		while($shqqgetmonthname=$qgetmonthname->fetch_assoc()){
		    
        $monthsortname = $shqqgetmonthname['month_short_name'];
        $year = $shqqgetmonthname['year'];
        $monthid = $shqqgetmonthname['month'];
        $yeardetails = $shqqgetmonthname['fiscal_year_details_id'];


		
		
			$infeesstuden="INSERT INTO `student_fees`(`session`, `student_id`, `fees_head_id`, `due_amount`, `total_amount`, `paid_amount`, `receive_amount`, `advance_amount`, `month_id`,`fiscal_year_details_id`, `month_name`, `year`, `fiscal_year_id`, `isPaid`, `isComplete`,`bank_trans_id`, `money_receipt_no`, `published_date`, `receive_date`, `remarks`) 
	                                          VALUES ('$stsess','$studentinfoid','$headid','$amount','$amount','0','0','0','$monthid','$yeardetails','$monthsortname','$year','$fiscalid','0','0','','0','$cdate','','')";
	        						$qinfeesstuden=$mysqli->query($infeesstuden);
		}

     
       }
	}
		
       
		
	else{
	    	
	    	//	echo "test";
		
		$gtheadid="SELECT * FROM `fees_head` WHERE `class_id` ='$classid' AND `branch_id`='$branchid' AND `fiscal_year_id` = '$fiscalid' AND `head_type` ='$type'  ORDER BY `fees_head_id`";

	
		$qgtheadid=$mysqli->query($gtheadid);
		while($shgtheadid=$qgtheadid->fetch_assoc()){
	
		$headid = $shgtheadid['head_id'];
		$amount = $shgtheadid['amount'];
		$monthid = $shgtheadid['month_id'];
		if($monthid==0){
		$monthsortname = "";
        $year = 0;
        $yeardetails = 0;
		}
		else{
		 $getmonthname = "SELECT * FROM `fiscal_year_details` WHERE `month` = '$monthid' AND `fiscal_year_id`  = '$fiscalid'";
		$qgetmonthname=$mysqli->query($getmonthname);
        $shqqgetmonthname=$qgetmonthname->fetch_assoc();
        $monthsortname = $shqqgetmonthname['month_short_name'];
        $year = $shqqgetmonthname['year'];
        $yeardetails = $shqqgetmonthname['fiscal_year_details_id'];
		}



		
		
			$infeesstuden="INSERT INTO `student_fees`(`session`, `student_id`, `fees_head_id`, `due_amount`, `total_amount`, `paid_amount`, `receive_amount`, `advance_amount`, `month_id`,`fiscal_year_details_id`, `month_name`, `year`, `fiscal_year_id`, `isPaid`, `isComplete`,`bank_trans_id` ,`money_receipt_no`, `published_date`, `receive_date`, `remarks`) 
	                                          VALUES ('$stsess','$studentinfoid','$headid','$amount','$amount','0','0','0','$monthid','$yeardetails','$monthsortname','$year','$fiscalid','0','0','','0','$cdate','','')";
	        						$qinfeesstuden=$mysqli->query($infeesstuden);
	        						

     
       }

		}
		   
		   
		    
		}
		
	if($qinfeesstuden){ header('location:fund_create.php?msg=1');} else {  header('location:fund_create.php?msg=2'); }	
		
}
?>