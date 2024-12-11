
<?php
include('config.php');
 
 //require_once '../../../lib/htmlpurifier/library/HTMLPurifier.auto.php';
    
if(isset($_POST['add'])){

   	    $yearname = $_POST['year_name'];
   	    $category = $_POST['category'];
		//$fundStutas= $_POST['fundStutas'];
		$fdate=$_POST['fromdate'];
        $tdate=$_POST['todate'];
       $adddate = date("d/m/Y");

		
		$getFabdName="select * from `academic_year` WHERE  status = 1  order by `academic_year_id` DESC";
 	$qgetFabdName=$mysqli->query($getFabdName);
	$shgetFabdName=$qgetFabdName->fetch_assoc();
	
	$gqfundName=$shgetFabdName['year_name'];
	$from_date=$shgetFabdName['from_date'];
	$to_date=$shgetFabdName['to_date'];
	
	
// 	echo  $fiscalyearname;
// 	echo  $fdate;
// 	echo  $tdate;
	
	
// 	echo  $gqfundName;
// 	echo  $from_date;
// 	echo  $to_date;
	
		
	if($gqfundName==$yearname) { 
	    
	   // echo "tes1";
	  //  header('Location: fiscal_year_setup.php?msg=3');  
	
	$message = 'Academic Year Already Exist.';

    echo "<SCRIPT> 
        alert('$message')
        window.location.replace('set_academic_year.php');
    </SCRIPT>";
	    
	}
	
	else if($to_date > $fdate ) {
	   // echo "test2";
	   //  header('location:fiscal_year_setup.php?msg=3');
	
	$message = 'Date range not valid.';
    echo "<SCRIPT> 
        alert('$message')
        window.location.replace('set_academic_year.php');
    </SCRIPT>";
	}
	
	else {
	
//	echo "test3";
	
	$infiscalyear="INSERT INTO `academic_year`(`year_name`,`from_date`, `to_date`, `status`,`add_date`)
	                    		 VALUES ('$yearname','$fdate','$tdate','1','$adddate')";
	        						$qfiscalyear=$mysqli->query($infiscalyear);
						
     						if($qfiscalyear)  { 
     						   //echo "test4";
     						    //$getdate="select * from fiscal_year where fiscal_year_name ='$fiscalyearname'";
     						    $getdate="select * from `academic_year` order by `academic_year_id` DESC";
     						    $qgetdate=$mysqli->query($getdate);
                             	$sgetdate=$qgetdate->fetch_assoc();
	                            $fromdate=$sgetdate['from_date'];
	                            $todate=$sgetdate['to_date'];
	                            $academic_year_id = $sgetdate['academic_year_id'];
     						    //header('location:assign_fund.php?msg=1');
     						    echo $fromdate." ";echo $todate." ";echo $academic_year_id." ";
     						    
     						    $start    = (new DateTime("$fromdate"))->modify('first day of this month');
                                $end      = (new DateTime("$todate"))->modify('first day of next month');
                                $interval = DateInterval::createFromDateString('1 month');
                                $period   = new DatePeriod($start, $interval, $end);
                                //echo $start." "; echo $end." "; echo $interval." ";

                                foreach ($period as $dt) {
                                    
                                     $month=$dt->format("m");
                                     $monthsortname=$dt->format("M");
                                     $monthname=$dt->format("F");
                                     $year=$dt->format("Y");
                                     
                                     $infiscalyeardetails="INSERT INTO `academic_year_details`(`month_id`,`month_name`,`month_short_name`,`year`,`academic_year_id`)
	                    		                                              VALUES ('$month','$monthname','$monthsortname','$year','$academic_year_id')";
	        						$qfiscalyeardetails=$mysqli->query($infiscalyeardetails);
	        						

                                     
                                    // header('location:fiscal_year_setup.php?msg=1');  
                                }
                                $start1    = (new DateTime("$fromdate"));//->modify('first day of this month');
                                $end1      = (new DateTime("$todate"));//->modify('first day of next month');
                                $interval1 = DateInterval::createFromDateString('1 day');
                                $period1   = new DatePeriod($start1, $interval1, $end1);
                                
                                foreach ($period1 as $dt1) {
                                    
                                     $day_name=$dt1->format("l");
                                     $day=$dt1->format("d");
                                     $month1=$dt1->format("m");
                                     $monthsortname1=$dt1->format("M");
                                     $monthname1=$dt1->format("F");
                                     $year1=$dt1->format("Y");
                                     
                                     $infiscalyeardetails1="INSERT INTO `academic_calender_details`(`day`, `day_name`, `month_id`, `month_name`, `month_short_name`, `year`, `academic_year_id`, `cetagory`, `holiday_type`, `holiday_remarks`, `holiday_color`, `add_date`) 
                                                                                              VALUES ('$day','$day_name','$month1','$monthname1','$monthsortname1','$year1','$academic_year_id','$category','','','','$adddate')";
	        						$qfiscalyeardetails1=$mysqli->query($infiscalyeardetails1);
	        						
	        						if($qfiscalyeardetails1) {
	        						   // header('location:fiscal_year_setup.php?msg=1');
	        						   echo "test5" ;
	        						   	$message = 'Success.';
                                            echo "<SCRIPT> 
                                                alert('$message')
                                                window.location.replace('set_academic_year.php');
                                            </SCRIPT>";
	        						}
                                     
                                    // header('location:fiscal_year_setup.php?msg=1');  
                                }
    
                             } 
                             else {
                                 
                                // header('location:fiscal_year_setup.php?msg=2');
                                 	  $message = 'Failed.';
                                            echo "<SCRIPT> 
                                                alert('$message')
                                                window.location.replace('set_academic_year.php');
                                            </SCRIPT>";
                             }
     	}
}
	
							

		
		
	
		
		
			
 ?>