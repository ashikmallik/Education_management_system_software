
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
	
							

		
		
		$fiscalyearname = $_POST['fiscalyearname'];
		//$fundStutas= $_POST['fundStutas'];
		$fdate=$_POST['fromdate'];
        $tdate=$_POST['todate'];
        $stsess = $_POST['stsess'];
        $type = $_POST['type'];

		
		$getFabdName="select * from fiscal_year WHERE type='$type' AND status = 1 AND trim(session) ='$stsess'   order by fiscal_year_id DESC";
 	$qgetFabdName=$mysqli->query($getFabdName);
	$shgetFabdName=$qgetFabdName->fetch_assoc();
	
	$gqfundName=$shgetFabdName['fiscal_year_name'];
	$from_date=$shgetFabdName['from_date'];
	$to_date=$shgetFabdName['to_date'];
	
	
// 	echo  $fiscalyearname;
// 	echo  $fdate;
// 	echo  $tdate;
	
	
// 	echo  $gqfundName;
// 	echo  $from_date;
// 	echo  $to_date;
	
		
	if($gqfundName==$fiscalyearname) { 
	    
	   // echo "tes1";
	  //  header('Location: fiscal_year_setup.php?msg=3');  
	
	$message = 'Fiscal Year Already Exist.';

    echo "<SCRIPT> 
        alert('$message')
        window.location.replace('fiscal_year_setup.php');
    </SCRIPT>";
	    
	}
	
	else if($to_date > $fdate ) {
	   // echo "test2";
	   //  header('location:fiscal_year_setup.php?msg=3');
	
	$message = 'Date range not valid.';
    echo "<SCRIPT> 
        alert('$message')
        window.location.replace('fiscal_year_setup.php');
    </SCRIPT>";
	}
	
	else {
	
	echo "test3";
	
	$infiscalyear="INSERT INTO `fiscal_year`(`fiscal_year_name`,`from_date`, `to_date`, `session`,`type`, `status`)
	                    		 VALUES ('$fiscalyearname','$fdate','$tdate','$stsess','$type','1')";
	        						$qfiscalyear=$mysqli->query($infiscalyear);
						
     						if($qfiscalyear)  { 
     						  // echo "test4";
     						    //$getdate="select * from fiscal_year where fiscal_year_name ='$fiscalyearname'";
     						    $getdate="select * from fiscal_year order by fiscal_year_id DESC";
     						    $qgetdate=$mysqli->query($getdate);
                             	$sgetdate=$qgetdate->fetch_assoc();
	                            $fromdate=$sgetdate['from_date'];
	                            $todate=$sgetdate['to_date'];
	                            $fiscal_year_id = $sgetdate['fiscal_year_id'];
     						    //header('location:assign_fund.php?msg=1'); 
     						    
     						    $start    = (new DateTime("$fromdate"))->modify('first day of this month');
                                $end      = (new DateTime("$todate"))->modify('first day of next month');
                                $interval = DateInterval::createFromDateString('1 month');
                                $period   = new DatePeriod($start, $interval, $end);

                                foreach ($period as $dt) {
                                     $month=$dt->format("m");
                                     $monthsortname=$dt->format("M");
                                     $monthname=$dt->format("F");
                                     $year=$dt->format("Y");
                                     
                                     $infiscalyeardetails="INSERT INTO `fiscal_year_details`(`month`,`month_name`,`month_short_name`,`year`,`fiscal_year_id`)
	                    		                                              VALUES ('$month','$monthname','$monthsortname','$year','$fiscal_year_id')";
	        						$qfiscalyeardetails=$mysqli->query($infiscalyeardetails);
	        						
	        						if($qfiscalyeardetails) {
	        						   // header('location:fiscal_year_setup.php?msg=1');
	        						   	$message = 'Success.';
                                            echo "<SCRIPT> 
                                                alert('$message')
                                                window.location.replace('fiscal_year_setup.php');
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
                                                window.location.replace('fiscal_year_setup.php');
                                            </SCRIPT>";
                             }
     	}
		
		
			
 ?>