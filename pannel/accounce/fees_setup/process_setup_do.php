
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
	
							

		
		
		$studClass = $_POST['studClass'];
		$fiscalid=$_POST['fiscalid'];
        $processname=$_POST['processname'];
        $stsess = $_POST['stsess'];

		
	$getFabdName="select * from process_setup WHERE class_id = '$studClass' AND fiscal_year_id = '$fiscalid'";
 	$qgetFabdName=$mysqli->query($getFabdName);
	$shgetFabdName=$qgetFabdName->fetch_assoc();
	
	$gqfundName=$shgetFabdName['process_name'];
	$class_id=$shgetFabdName['class_id'];
	

	
	

		
	if($gqfundName==$processname &&  $class_id == $studClass ) { 

	
	$message = 'Process Already Exist.';

    echo "<SCRIPT> 
        alert('$message')
        window.location.replace('process_setup.php');
    </SCRIPT>";
	    
	}
	
	else {
	

	
	$infiscalyear="INSERT INTO `process_setup`(`process_name`, `class_id`, `fiscal_year_id`, `stsess`)
	                    		 VALUES ('$processname','$studClass','$fiscalid','$stsess')";
	        						$qfiscalyear=$mysqli->query($infiscalyear);
						
     						if($qfiscalyear)  { 
     						 
     						    $getdate="select * from fiscal_year WHERE fiscal_year_id = $fiscalid";
     						    $qgetdate=$mysqli->query($getdate);
                             	$sgetdate=$qgetdate->fetch_assoc();
	                            $fromdate=$sgetdate['from_date'];
	                            $todate=$sgetdate['to_date'];
	                           
	                           
	                            $getprocessid="select * from process_setup WHERE class_id = '$studClass' AND fiscal_year_id = '$fiscalid'";
     						    $qgetprocessid=$mysqli->query($getprocessid);
                             	$sgetprocessid=$qgetprocessid->fetch_assoc();
	                            $processid=$sgetprocessid['process_setup_id'];
	                           
     						   
     						    
     						    $start    = (new DateTime("$fromdate"))->modify('first day of this month');
                                $end      = (new DateTime("$todate"))->modify('first day of next month');
                                $interval = DateInterval::createFromDateString('1 month');
                                $period   = new DatePeriod($start, $interval, $end);

                                foreach ($period as $dt) {
                                     $month=$dt->format("m");
                                     $monthsortname=$dt->format("M");
                                     $monthname=$dt->format("F");
                                     $year=$dt->format("Y");
                                     
                                     $infiscalyeardetails="INSERT INTO `process_details`(`month_id`, `month_name`,`month_short_name`, `year`, `process_setup_id`, `isProcessed`, `isPublished`)
	                    		                                              VALUES ('$month','$monthname','$monthsortname','$year','$processid','0','0')";
	        						$qfiscalyeardetails=$mysqli->query($infiscalyeardetails);
	        						
	        						if($qfiscalyeardetails) {
	        						  
	        						   	$message = 'Success.';
                                            echo "<SCRIPT> 
                                                alert('$message')
                                                window.location.replace('process_setup.php');
                                            </SCRIPT>";
	        						}
                                     
                                   
                                }
    
                             } 
                             else {
                                 
                                
                                 	  $message = 'Failed.';
                                            echo "<SCRIPT> 
                                                alert('$message')
                                                window.location.replace('process_setup.php');
                                            </SCRIPT>";
                             }
     	}
		
		
			
 ?>