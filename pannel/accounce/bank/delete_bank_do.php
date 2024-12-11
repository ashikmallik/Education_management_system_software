<?php
 require_once('bank_sett_top.php');
 
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

   	$gsess="select * from borno_school_bank where borno_school_bank_id = '$memo'";
 	$qterm=$mysqli->query($gsess);
	$shterm=$qterm->fetch_assoc();
	
	$gtermsess=$shterm['borno_school_bank_id'];
	$gtermdate=$shterm['borno_school_date'];
	
	if($gtermsess=="") { header('location:delete_bank_memo.php?msg=3'); } 
	elseif($receiptdate!=$gtermdate) { header('location:delete_bank_memo.php?msg=4'); } 
	else {
	
	
	$gbal="select * from borno_school_bank where borno_school_bank_id = '$memo'";
 	$qgbal=$mysqli->query($gbal);
	$shqgbal=$qgbal->fetch_assoc();
	

	$receiptdate1=$shqgbal['borno_school_date'];
	$schsId=$shqgbal['borno_school_id'];
	$branchId=$shqgbal['borno_school_branch_id'];
	$bname=$shqgbal['borno_school_bank_name'];
	$acno=$shqgbal['borno_school_bank_ac_no'];    
	$type=$shqgbal['borno_school_transection_type'];
	$des=$shqgbal['borno_school_transection_no'];
	$gbalfee=$shqgbal['borno_school_amount'];
	


				
	
	
	$insfmark1="INSERT INTO `borno_school_delete_bank` 
	     (
	        `borno_school_delete_date`,
	        `borno_school_memo`,
	        `borno_school_date`,
			`borno_school_id`,
			`borno_school_branch_id`,
			`borno_school_bank_name`,
			`borno_school_bank_ac_no`,
			`borno_school_transection_type`,
			`borno_school_transection_no`,
			`borno_school_amount`
			)
				   
			VALUES (
			        '$receiptdate',
					'$memo', 
					'$receiptdate1',
					'$schsId', 
					'$branchId',
					'$bname',
					'$acno',
					'$type',
					'$des',
					'$gbalfee')";
			  
		$qinstm1=$mysqli->query($insfmark1);
	
	
	$getstdcoll="select * from borno_school_bank where borno_school_id='$schId' AND borno_school_bank_id='$memo'";
	$qgetstdcoll =$mysqli->query($getstdcoll);
	$shgetstdc0ll=$qgetstdcoll->fetch_assoc();
	$amount=$shgetstdc0ll['borno_school_amount'];
	$ttype=$shgetstdc0ll['borno_school_transection_type'];	
	
	if($ttype==1){$deposit1=$amount; $withdraw1=0; }
	elseif($ttype==2){$deposit1=0; $withdraw1=$amount; }
	else{$deposit1=0; $withdraw1=0; }
	
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
		
	$deposit=$deposit2-$deposit1;
	$withdraw=$withdraw2-$withdraw1;
	
        $income=$prevbal+$stdcoll1+$other+$withdraw;
        $expence=$deposit+$expen;
        $balan=$income-$expence;
        
     	$insfaccc="UPDATE `borno_school_central_account` SET bank_withdraw=$withdraw,bank_deposit=$deposit,balance=$balan where borno_school_date='$receiptdate'";	
		$qinsacc=$mysqli->query($insfaccc); 
		
	$delmemo="delete from borno_school_bank where borno_school_bank_id='$memo'";
	
	$mysqli->query($delmemo);
		

	
if($qinstm1) { header("location:delete_bank_memo.php?msg=1"); } 

else  {   header("location:delete_bank_memo.php?msg=2"); }
	}		
			
 ?>

