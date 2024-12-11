<?php
 require_once('expence_sett_top.php');
 
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

   	$gsess="select * from borno_school_expence where  borno_school_expence_memo = '$memo'";
 	$qterm=$mysqli->query($gsess);
	$shterm=$qterm->fetch_assoc();
	
	$gtermsess=$shterm['borno_school_expence_memo'];
	
	if($gtermsess=="") { header('location:delete_expence_memo.php?msg=3'); } 
	else {
	
	
	$gbal="select * from borno_school_expence where borno_school_expence_memo = '$memo'";
 	$qgbal=$mysqli->query($gbal);
	$shqgbal=$qgbal->fetch_assoc();
	

	$receiptdate1=$shqgbal['borno_school_ex_date'];
	$schsId=$shqgbal['borno_school_id'];
	$branchId=$shqgbal['borno_school_branch_id'];
	$month=$shqgbal['borno_school_month'];
	$exhead=$shqgbal['borno_school_exhead'];    
	$exname=$shqgbal['borno_school_exname'];
	$exby=$shqgbal['borno_school_exby'];
	$userid=$shqgbal['borno_school_user_id'];
	$username=$shqgbal['borno_school_user_name'];
	$gbalfee=$shqgbal['borno_school_expence_amount'];
	

	date_default_timezone_set('Asia/Dhaka');
	$receiptdate=date('Y-m-d');
				
	
	
	$insfmark1="INSERT INTO `borno_school_delete_expence` 
	     (
	        `borno_school_delete_date`,
		 	`borno_school_expence_memo`,
			`borno_school_ex_date`,
			`borno_school_id`,
			`borno_school_branch_id`,
			`borno_school_month`,
			`borno_school_exhead`,
			`borno_school_exname`,
			`borno_school_exby`,
			`borno_school_user_id`,
			`borno_school_user_name`,
			`borno_school_deletar_user_id`,
			`borno_school_deletar_user_name`,
			`borno_school_expence_amount`
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
	
	
		
	$delmemo="delete from borno_school_expence where borno_school_expence_memo='$memo'";
	
	$mysqli->query($delmemo);
		

	
if($qinstm1) { header("location:delete_expence_memo.php?msg=1"); } 

else  {   header("location:delete_expence_memo.php?msg=2"); }
	}		
			
 ?>

