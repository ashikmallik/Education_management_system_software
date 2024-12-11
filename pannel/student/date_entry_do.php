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
	
	$year=$_POST['year'];
	$month=$_POST['month'];
	$week=$_POST['week'];
	$serial=$_POST['serial'];
	$date=$_POST['date'];
		

for($i=0; $i<count($date); $i++){
    
    if($serial[$i]==1){$day="Saturday";}
    elseif($serial[$i]==2){$day="Sunday";}
    elseif($serial[$i]==3){$day="Monday";}   
    elseif($serial[$i]==4){$day="Tuesday";}
    elseif($serial[$i]==5){$day="Wednesay";} 
    elseif($serial[$i]==6){$day="Thursday";}
    elseif($serial[$i]==7){$day="Friday";} 
    
	  $insfmark1="INSERT INTO `borno_calender` 
	(
			`borno_year`,
			`borno_month`,
			`borno_week`,
			`borno_week_serial`,
			`borno_date`,
			`borno_day`,
			`borno_remarks`)
				   
			VALUES (
					'$year', 
					'$month',
					'$week[$i]',
					'$serial[$i]',
					'$date[$i]',
					'$day',
					''
			  )
			  ";
			  
			
		$qinstm1=$mysqli->query($insfmark1);
}

			if($qinstm1) { header('location:date_entry.php?msg=1'); } else { header('location:date_entry.php?msg=2'); }
 
 ?>

