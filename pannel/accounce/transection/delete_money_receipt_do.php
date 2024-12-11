<?php
 require_once('transection_sett_top.php');
 
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

   	$gsess="select * from borno_school_receipt where  borno_school_memo = '$memo' group by borno_school_memo";
 	$qterm=$mysqli->query($gsess);
	$shterm=$qterm->fetch_assoc();
	
	$gtermsess=$shterm['borno_school_memo'];
	$gtermdate=$shterm['borno_school_date'];
	
	if($gtermsess=="") { header('location:delete_money_receipt.php?msg=3'); } 
	//elseif($gtermdate!=$receiptdate) { header('location:delete_money_receipt.php?msg=4'); } 
	else {
	

	$gbal="select * from borno_school_receipt where  borno_school_memo = '$memo' order by borno_school_fund_id,borno_school_sub_fund_id asc";
 	$qgbal=$mysqli->query($gbal);
	while($shqgbal=$qgbal->fetch_assoc())
	{

	$receiptdate1=$shqgbal['borno_school_date'];
	$schsId=$shqgbal['borno_school_id'];
	$branchId=$shqgbal['borno_school_branch_id'];
	$studClass=$shqgbal['borno_school_class_id'];
	$shiftId=$shqgbal['borno_school_shift_id'];    
	$section=$shqgbal['borno_school_section_id'];
	$gbalsess=$shqgbal['borno_school_session'];
	$gbalinfo=$shqgbal['borno_student_info_id'];
	$rollId=$shqgbal['borno_school_roll'];
	$gbalfund=$shqgbal['borno_school_fund_id'];
	$gbalsubfund=$shqgbal['borno_school_sub_fund_id'];
	$gbalfee=$shqgbal['borno_school_fee'];
	
	
	$gsbal="select * from borno_school_balance where borno_student_info_id='$gbalinfo' AND borno_school_session='$gbalsess' AND borno_school_fund_id='$gbalfund'  AND borno_school_sub_fund_id='$gbalsubfund'";
 	$qtgsbal=$mysqli->query($gsbal);
	$shqtgsbal=$qtgsbal->fetch_assoc();
	$gtpbal=$shqtgsbal['borno_school_fee'];
	
	$balancefee=$gtpbal+$gbalfee;
	
	$insbal="UPDATE `borno_school_balance` SET `borno_school_fee`='$balancefee' where borno_student_info_id='$gbalinfo' AND borno_school_session='$gbalsess' AND borno_school_fund_id='$gbalfund' AND borno_school_sub_fund_id='$gbalsubfund'";
	
	$qant=$mysqli->query($insbal);
	
	

				
	
	
	$insfmark1="INSERT INTO `borno_school_delete_memo` 
	     (
	        `borno_school_delete_date`,
		 	`borno_school_memo`,
			`borno_school_date`,
			`borno_school_id`,
			`borno_school_branch_id`,
			`borno_school_class_id`,
			`borno_school_shift_id`,
			`borno_school_section_id`,
			`borno_school_session`,
			`borno_student_info_id`,
			`borno_school_roll`,
			`borno_school_fund_id`,
			`borno_school_sub_fund_id`,
			`borno_school_fee`
			)
				   
			VALUES (
			        '$receiptdate',
					'$memo', 
					'$receiptdate1',
					'$schsId', 
					'$branchId',
					'$studClass',
					'$shiftId',
					'$section',
					'$gbalsess',
					'$gbalinfo',
					'$rollId',
					'$gbalfund',
					'$gbalsubfund',
					'$gbalfee'
					)
			  ";
		$qinstm1=$mysqli->query($insfmark1);
	
	}
	
	$getstdcoll="select * from borno_school_receipt where borno_school_id='$schId' AND borno_school_memo='$memo'";
	$qgetstdcoll =$mysqli->query($getstdcoll);
	while($shgetstdc0ll=$qgetstdcoll->fetch_assoc()){
	$getstdcollect[]=$shgetstdc0ll['borno_school_fee'];
	}
	$stdbal=array_sum($getstdcollect);
	
	$gtcstdacc="select * from borno_school_central_account where borno_school_id='$schId' AND borno_school_date='$receiptdate'";
    $qggstdacc=$mysqli->query($gtcstdacc);
	$shqggtcstdacc=$qggstdacc->fetch_assoc();
	    $prevbal=$shqggtcstdacc['previous_balance'];
	    $stdcoll1=$shqggtcstdacc['student_collection'];
        $other=$shqggtcstdacc['other_income'];
        $withdraw=$shqggtcstdacc['bank_withdraw'];
        $expen=$shqggtcstdacc['expence'];
        $deposit=$shqggtcstdacc['bank_deposit'];
        $balance1=$shqggtcstdacc['balance'];
		
	$stdcoll=$stdcoll1-$stdbal;
	$balance=$balance1-$stdbal;
	
     	$insfaccc="UPDATE `borno_school_central_account` SET student_collection=$stdcoll,balance=$balance where borno_school_date='$receiptdate'";
		$qinsacc=$mysqli->query($insfaccc);
		
	$delmemo="delete from borno_school_receipt where borno_school_memo='$memo'";
	$mysqli->query($delmemo);
		

	
if($qinstm1) { header("location:delete_money_receipt.php?msg=1"); } 

else  {   header("location:delete_money_receipt.php?msg=2"); }
	}		
			
 ?>

