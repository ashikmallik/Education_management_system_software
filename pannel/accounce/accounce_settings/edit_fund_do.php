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
		$fandName= $_POST['fandName'];
		$fundStutas= $_POST['fundStutas'];

		
		$getFabdName="select * from borno_school_receipt where borno_school_id='$schId' AND borno_school_fund_id='$fundId'";
 	$qgetFabdName=$mysqli->query($getFabdName);
	$shgetFabdName=$qgetFabdName->fetch_assoc();
	
	$gqfundName=$shgetFabdName['borno_school_fund_id'];
	
		
	if($gqfundName!="") { header('location:edit_fund.php?msg=3'); } else {
	
	
	$insfund="UPDATE `borno_school_fund` SET `borno_school_fund_name`='$fandName',`fund_type`='$fundStutas' where borno_school_fund_id='$fundId'";
	
	

						$qfund=$mysqli->query($insfund);
						
						if($qfund)  { header('location:edit_fund.php?msg=1'); } else {header('location:edit_fund.php?msg=2');}
	}
		
		
			
 ?>

