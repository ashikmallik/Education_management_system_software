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
	
	date_default_timezone_set('Asia/Dhaka');
	$receiptdate=date('Y-m-d');

        $memo= $_POST['memo'];

   	$gsess="select * from borno_school_other_income where  borno_school_other_income_memo = '$memo'";
 	$qterm=$mysqli->query($gsess);
	$shterm=$qterm->fetch_assoc();
	
	$gtermsess=$shterm['borno_school_other_income_memo'];
	$gtermdate=$shterm['borno_school_other_income_date'];
	if($gtermsess=="") { header('location:delete_other_income.php?msg=3'); } 
	elseif($receiptdate!=$gtermdate) { header('location:delete_other_income.php?msg=4'); } 	
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
	
	
		$getstdcoll="select * from borno_school_other_income where borno_school_id='$schId' AND borno_school_other_income_memo='$memo'";
	$qgetstdcoll =$mysqli->query($getstdcoll);
	$shgetstdc0ll=$qgetstdcoll->fetch_assoc();
	$amount=$shgetstdc0ll['borno_school_income_amount'];
	
	$gtcstdacc="select * from borno_school_central_account where borno_school_id='$schId' AND borno_school_date='$receiptdate'";
    $qggstdacc=$mysqli->query($gtcstdacc);
	$shqggtcstdacc=$qggstdacc->fetch_assoc();
	    $prevbal=$shqggtcstdacc['previous_balance'];
	    $stdcoll1=$shqggtcstdacc['student_collection'];
        $other1=$shqggtcstdacc['other_income'];
        $withdraw2=$shqggtcstdacc['bank_withdraw'];
        $expen=$shqggtcstdacc['expence'];
        $deposit2=$shqggtcstdacc['bank_deposit'];
        $balance1=$shqggtcstdacc['balance'];
	    
	    $other=$other1-$amount;
	    $balance=$balance1-$amount;

     	$insfaccc="UPDATE `borno_school_central_account` SET other_income=$other,balance=$balance where borno_school_date='$receiptdate'";	
		$qinsacc=$mysqli->query($insfaccc); 
	
		
	$delmemo="delete from borno_school_other_income where borno_school_other_income_memo='$memo'";
	
	$mysqli->query($delmemo);
		

	
if($qinstm1) { header("location:delete_other_income.php?msg=1"); } 

else  {   header("location:delete_other_income.php?msg=2"); }
	}		
			
 ?>

