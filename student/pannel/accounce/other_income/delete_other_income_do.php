<?php
 require_once('other_sett_top.php');
 
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
	


        $memo= $_POST['memo'];

   	$gsess="select * from borno_school_other_income where  borno_school_other_income_memo = '$memo'";
 	$qterm=$mysqli->query($gsess);
	$shterm=$qterm->fetch_assoc();
	
	$gtermsess=$shterm['borno_school_other_income_memo'];
	
	if($gtermsess=="") { header('location:delete_other_income.php?msg=3'); } 
	else {
	
	
	$gbal="select * from borno_school_other_income where borno_school_other_income_memo = '$memo'";
 	$qgbal=$mysqli->query($gbal);
	$shqgbal=$qgbal->fetch_assoc();
	

	$receiptdate1=$shqgbal['borno_school_other_income_date'];
	$schsId=$shqgbal['borno_school_id'];
	$branchId=$shqgbal['borno_school_branch_id'];
	$month=$shqgbal['borno_school_month'];
	$exhead=$shqgbal['borno_school_income_head'];    
	$exname=$shqgbal['borno_school_income_name'];
	$exby=$shqgbal['borno_school_income_narration'];
	$userid=$shqgbal['borno_school_user_id'];
	$username=$shqgbal['borno_school_user_name'];
	$gbalfee=$shqgbal['borno_school_income_amount'];
	

	date_default_timezone_set('Asia/Dhaka');
	$receiptdate=date('Y-m-d');
				
	
	
	$insfmark1="INSERT INTO `borno_school_delete_other` 
	     (
	        `borno_school_delete_date`,
		 	`borno_school_other_income_memo`,
			`borno_school_other_income_date`,
			`borno_school_id`,
			`borno_school_branch_id`,
			`borno_school_month`,
			`borno_school_income_head`,
			`borno_school_income_name`,
			`borno_school_income_narration`,
			`borno_school_user_id`,
			`borno_school_user_name`,
			`borno_school_deletar_user_id`,
			`borno_school_deletar_user_name`,
			`borno_school_income_amount`
			)
				   
			VALUES (
			        '$receiptdate',
					'$memo', 
					'$receiptdate1',
					'$schsId', 
					'$branchId',
					'$month',
					'$exhead',
					'$exname',
					'$exby',
					'$userid',
					'$username',
					'',
					'',
					'$gbalfee')";
			  
		$qinstm1=$mysqli->query($insfmark1);
	
	
		
	$delmemo="delete from borno_school_other_income where borno_school_other_income_memo='$memo'";
	
	$mysqli->query($delmemo);
		

	
if($qinstm1) { header("location:delete_other_income.php?msg=1"); } 

else  {   header("location:delete_other_income.php?msg=2"); }
	}		
			
 ?>

