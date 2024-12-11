<?php
 require_once('student_top.php');
 
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
	

	$stsess = clean_html($_POST['stsess']);
	$stsess1 = strip_tags($_POST['stsess']);
		

		
	$branch1="select * from `borno_calender` where `borno_year`='$stsess1' order by borno_calender_id asc";
	$rsQuery11 = $mysqli->query($branch1);
	while($smsbranch1=$rsQuery11->fetch_assoc()){;
	$month=$smsbranch1['borno_month'];
	$week=$smsbranch1['borno_week'];
	$weeksl=$smsbranch1['borno_week_serial'];
	$date=$smsbranch1['borno_date'];
	$day=$smsbranch1['borno_day'];
	
	$branch="select * from `borno_school_calender` where `borno_year`='$stsess1' AND `borno_month`='$month' AND `borno_date`='$date'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();

		
		if($smsbranch['borno_date']==""){
		
	
			
   $bornoschBranch="INSERT INTO `borno_school_calender` (`borno_school_id`,`borno_year`,`borno_month`, `borno_week`, `borno_week_serial`, `borno_date`, `borno_day`, `borno_remarks`)
											
															VALUES ('$schId','$stsess1', '$month','$week','$weeksl','$date','$day','')";
							
							
			
				$qbornoschBranch = $mysqli->prepare($bornoschBranch);
				$qbornoschBranch->execute();
		}
	
	}
				if($qbornoschBranch) { header('location:create_calender.php?msg=1'); } else { header('location:create_calender.php?msg=2'); }	
				
			
	
 ?>

