<?php
 require_once('accounce_sett_top.php');
 
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
	
							

		
		
		$fundId= $_POST['fundId'];
		$subfandName= $_POST['subfandName'];

		
		$getFabdName="select * from borno_school_sub_fund where borno_school_id='$schId' AND borno_school_fund_id ='$fundId' AND sub_fund_name='$subfandName'";
 	$qgetFabdName=$mysqli->query($getFabdName);
	$shgetFabdName=$qgetFabdName->fetch_assoc();
	
	$gqfundName=$shgetFabdName['$subfandName'];
	
		
	if($gqfundName==$subfandName) { header('location:assign_sub_fund.php?msg=3'); } else {
	
	
	$insfund="INSERT INTO `borno_school_sub_fund` (`borno_school_id`, `borno_school_fund_id`,`sub_fund_name`)
	
	
	 VALUES ('$schId','$fundId','$subfandName')";
	
								   
						$qfund=$mysqli->query($insfund);
						
						if($qfund)  { header('location:assign_sub_fund.php?msg=1'); } else {header('location:assign_sub_fund.php?msg=2');}
	}
		
		
			
 ?>

