
<?php
require_once('fees_sett_top.php');
 
 require_once '../../../lib/htmlpurifier/library/HTMLPurifier.auto.php';
    
    $purifier = new HTMLPurifier();
    //$clean_html = $purifier->purify($dirty_html);
	
	if (!function_exists('clean_html')) {
		function clean_html($dirty_html = ''){
			if(empty($dirty_html))
			return $dirty_html;		
				
			global $purifier;
			$clean_html = $purifier->purify($dirty_html);
			return $clean_html;
		}
		
	}
	
							

	$cdate = date("d/m/Y");	
		$studBranch = $_POST['studBranch'];
		$studClass = $_POST['studClass'];
		if(empty($_POST['studGroup'])){
		    $_POST['studGroup'] = 0;
		}
		$studGroup = $_POST['studGroup'];
		$fiscalid=$_POST['fiscalid'];
        $head_id=$_POST['headid'];
        $amount=$_POST['amount'];
      //  $civilian_amount=$_POST['civilian_amount'];
        $stsess =trim($_POST['stsess']);
        $type = $_POST['type'];
        if(empty($_POST['month'])){
           $month = 0; 
        }
        else{
        $month = $_POST['month'];
        }
        
        $getheadname = "SELECT * FROM `fees_head_name` WHERE  head_id = '$head_id' ";
         	$qgetheadname=$mysqli->query($getheadname);
	        $shqgetheadname=$qgetheadname->fetch_assoc();
	   $headname = $shqgetheadname['head_name'];      
	
// 	echo  $studBranch;
// 	echo  $studClass;
// 	echo $studGroup;
// 	echo  $fiscalid;
// 	echo  $headname;
// 	echo  $amount;
// 	echo  $stsess;
// 	echo  $type;

		
		$getFeesHeadName="select * from fees_head WHERE class_id = '$studClass' AND head_id = '$head_id' AND branch_id = '$studBranch' AND trim(`stsess`) = '$stsess' ";
 	$qgetFeesHeadName=$mysqli->query($getFeesHeadName);
	$shFeesHeadName=$qgetFeesHeadName->fetch_assoc();
	
	$gheadname=$shFeesHeadName['head_id'];

	
	

	
		
	if($gheadname==$head_id) { 
	    
	   // echo "tes1";
	  //  header('Location: fiscal_year_setup.php?msg=3');  
	
	$message = 'Fees Head Already Exist.';

    echo "<SCRIPT> 
        alert('$message')
        window.location.replace('fees_head_setup.php');
    </SCRIPT>";
	    
	}
	
	
	else {
	
//	echo "test3";
	
	$infeeshead="INSERT INTO `fees_head`(`branch_id`,`class_id`,`student_group`, `fiscal_year_id`, `stsess`, `head_id`, `head_name`, `amount`,`civilian_students_amount`, `head_type`,`month_id`) 
	                             VALUES ('$studBranch','$studClass','$studGroup','$fiscalid','$stsess','$head_id','$headname','$amount','','$type','$month')";
	        						$qinfeeshead=$mysqli->query($infeeshead);
	        						
	        						
	        						
	// insert into student fees table 
	
	if($studGroup == 0) {
	  		$gtstudentinfo="SELECT * FROM `borno_student_info` WHERE `borno_school_class_id`='$studClass' AND `borno_school_branch_id`='$studBranch'  AND `borno_school_session`='$stsess' AND `borno_student_status` = 1";
	}
	else{
	    $gtstudentinfo="SELECT * FROM `borno_student_info` WHERE `borno_school_class_id`='$studClass' AND `borno_school_branch_id`='$studBranch'  AND `borno_school_session`='$stsess' AND `borno_school_stud_group`='$studGroup'  AND `borno_student_status` = 1";
	    
	    //echo "test";
	}
		$qgtstudentinfo=$mysqli->query($gtstudentinfo);
		while($shgtstudentinfo=$qgtstudentinfo->fetch_assoc()){
	
		$studentinfoid = $shgtstudentinfo['borno_student_info_id'];
		$classid = $shgtstudentinfo['borno_school_class_id'];
		$branchid = $shgtstudentinfo['borno_school_branch_id'];
		$group = $shgtstudentinfo['borno_school_stud_group'];
		
	//	echo $group ;
		
	//	echo $studentinfoid;
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
		// echo $stsess." ";
		// echo $studentinfoid." ";
		// echo $headid." ";
		// echo $amount." ";
		// echo $monthid." ";
		// echo $yeardetails." ";
		// echo $monthsortname." ";
		// echo $year." ";
		// echo $fiscalid." ";
		// echo $cdate." <br>";

		
		
			$infeesstuden="INSERT INTO `student_fees`(`session`, `student_id`, `fees_head_id`, `due_amount`, `total_amount`, `paid_amount`, `receive_amount`, `advance_amount`, `month_id`,`fiscal_year_details_id`, `month_name`, `year`, `fiscal_year_id`, `isPaid`, `isComplete`,`bank_trans_id`, `money_receipt_no`, `published_date`, `receive_date`, `remarks`) 
	                                          VALUES ('$stsess','$studentinfoid','$headid','$amount','$amount','0','0','0','$monthid','$yeardetails','$monthsortname','$year','$fiscalid','0','0','','0','$cdate','','')";
	        						$qinfeesstuden=$mysqli->query($infeesstuden);
		}
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
		
       
		
	else{
	    	
	    	//	echo "test";
		
		$gtheadid="SELECT * FROM `fees_head` WHERE `class_id` ='$classid' AND `branch_id`='$branchid' AND `fiscal_year_id` = '$fiscalid' AND `head_type` NOT IN ('Monthly') ORDER BY `fees_head_id` DESC LIMIT 1";

	
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

		// echo $stsess . " ";
		// echo $studentinfoid . " ";
		// echo $headid . " ";
		// echo $amount . " ";
		// echo $monthid . " ";
		// echo $monthsortname . " ";
		// echo $year . " ";
		// echo $fiscalid . " ";
		// echo $cdate . " <br>";

		
		
			$infeesstuden="INSERT INTO `student_fees`(`session`, `student_id`, `fees_head_id`, `due_amount`, `total_amount`, `paid_amount`, `receive_amount`, `advance_amount`, `month_id`,`fiscal_year_details_id`, `month_name`, `year`, `fiscal_year_id`, `isPaid`, `isComplete`,`bank_trans_id` ,`money_receipt_no`, `published_date`, `receive_date`, `remarks`) 
	                                          VALUES ('$stsess','$studentinfoid','$headid','$amount','$amount','0','0','0','$monthid','$yeardetails','$monthsortname','$year','$fiscalid','0','0','','0','$cdate','','')";
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
	// end
	
		}
     						if($qinfeeshead AND $qinfeesstuden)  { 
	        						   // header('location:fiscal_year_setup.php?msg=1');
	        						   	$message = 'Success.';
                                            echo "<SCRIPT> 
                                                alert('$message')
                                                window.location.replace('fees_head_setup.php');
                                            </SCRIPT>";

                             } 
                             else {
                                 
                                // header('location:fiscal_year_setup.php?msg=2');
                                 	  $message = 'Failed.';
                                            echo "<SCRIPT> 
                                                alert('$message')
                                                window.location.replace('fees_head_setup.php');
                                            </SCRIPT>";
                             }
     
     	}
		
		
			
 ?>