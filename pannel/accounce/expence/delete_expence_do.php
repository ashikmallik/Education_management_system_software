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
	
	date_default_timezone_set('Asia/Dhaka');
	$receiptdate=date('Y-m-d');

        $memo= $_POST['memo'];

   	$gsess="select * from borno_school_expence where  borno_school_expence_memo = '$memo'";
 	$qterm=$mysqli->query($gsess);
	$shterm=$qterm->fetch_assoc();
	
	$gtermsess=$shterm['borno_school_expence_memo'];
	$gtermdate=$shterm['borno_school_ex_date'];
	if($gtermsess=="") { header('location:delete_expence_memo.php?msg=3'); } 
	elseif($receiptdate!=$gtermdate) { header('location:delete_expence_memo.php?msg=4'); } 	
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
	
	$getstdcoll="select * from borno_school_expence where borno_school_id='$schId' AND borno_school_expence_memo='$memo'";
	$qgetstdcoll =$mysqli->query($getstdcoll);
	$shgetstdc0ll=$qgetstdcoll->fetch_assoc();
	$amount=$shgetstdc0ll['borno_school_expence_amount'];
	
	$gtcstdacc="select * from borno_school_central_account where borno_school_id='$schId' AND borno_school_date='$receiptdate'";
    $qggstdacc=$mysqli->query($gtcstdacc);
	$shqggtcstdacc=$qggstdacc->fetch_assoc();
	    $prevbal=$shqggtcstdacc['previous_balance'];
	    $stdcoll1=$shqggtcstdacc['student_collection'];
        $other=$shqggtcstdacc['other_income'];
        $withdraw2=$shqggtcstdacc['bank_withdraw'];
        $expen=$shqggtcstdacc['expence'];
        $deposit2=$shqggtcstdacc['bank_deposit'];
        $balance1=$shqggtcstdacc['balance'];
	    
	    $expence=$expen-$amount;
	    $balance=$balance1+$amount;

     	$insfaccc="UPDATE `borno_school_central_account` SET expence=$expence,balance=$balance where borno_school_date='$receiptdate'";	
		$qinsacc=$mysqli->query($insfaccc); 
		
	$delmemo="delete from borno_school_expence where borno_school_expence_memo='$memo'";
	
	$mysqli->query($delmemo);
		

	
if($qinstm1) { header("location:delete_expence_memo.php?msg=1"); } 

else  {   header("location:delete_expence_memo.php?msg=2"); }
	}		
			
 ?>

