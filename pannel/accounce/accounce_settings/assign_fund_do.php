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
	
							

		
		
		$fandName= $_POST['fandName'];
		$fundStutas= $_POST['fundStutas'];

		
		$getFabdName="select * from borno_school_fund where borno_school_id='$schId' AND borno_school_fund_name ='$fandName'";
 	$qgetFabdName=$mysqli->query($getFabdName);
	$shgetFabdName=$qgetFabdName->fetch_assoc();
	
	$gqfundName=$shgetFabdName['borno_school_fund_name'];
	
		
	if($gqfundName==$fandName) { header('location:assign_fund.php?msg=3'); } else {
	
	
	$insfund="INSERT INTO `borno_school_fund` (`borno_school_id`, `borno_school_fund_id_sub`,`borno_school_fund_name`,`fund_type`)
	
	
	 VALUES ('$schId','0','$fandName','$fundStutas')";
	
										   
						$qfund=$mysqli->query($insfund);
						
						if($qfund)  { header('location:assign_fund.php?msg=1'); } else {header('location:assign_fund.php?msg=2');}
	}
		
		
			
 ?>

