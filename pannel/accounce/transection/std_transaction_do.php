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
	
		$addBranch = clean_html($_POST['branchId']);
		$addBranchf = strip_tags($_POST['branchId']);
						
		$studClass = clean_html($_POST['studClass']);
		$studClass1 = strip_tags($_POST['studClass']);					

		$shiftId = clean_html($_POST['shiftId']);
		$shiftId1 = strip_tags($_POST['shiftId']);
		
		$section = clean_html($_POST['section']);
		$section1 = strip_tags($_POST['section']);
		
		$stsess = clean_html($_POST['stsess']);
		$stsess1 = strip_tags($_POST['stsess']);

		$roll = clean_html($_POST['roll']);
		$roll1 = strip_tags($_POST['roll']);
		

        $fundid= $_POST['fundid'];
        $subfundid= $_POST['subfundid'];
        $studId= $_POST['studId'];
		$balId= $_POST['balId'];
		$amount= $_POST['amount'];
   
	date_default_timezone_set('Asia/Dhaka');
	$receiptdate=date('Y-m-d');	
	
 $insfmemo="INSERT INTO `borno_school_memo_no` (`borno_student_info_id`,`borno_school_date`, `borno_school_session`)
			VALUES ('$studId','$receiptdate', '$stsess1')";
		$qinstmemo=$mysqli->query($insfmemo);	    
		    		

$gstmemono="select * from borno_school_memo_no where borno_student_info_id='$studId' AND borno_school_session='$stsess1' AND borno_school_date='$receiptdate' order by memo_no desc limit 0,1";
					$qggstmemono=$mysqli->query($gstmemono);
					while($shqggstmemono=$qggstmemono->fetch_assoc())
		   	        $memono=$shqggstmemono['memo_no'];		

			
	
	for($i=0; $i<=count($amount); $i++){
		
		
		if($amount[$i]!=""){
		
		
//=========================================Get Fund ============
if($balId[$i]!="")
{
  $gtcbalance="select * from borno_school_balance where borno_school_balance_id='$balId[$i]'";


    $qggtcbalance=$mysqli->query($gtcbalance);
	$shqggtcbalance=$qggtcbalance->fetch_assoc();
	
	$blfee=$shqggtcbalance['borno_school_fee'];


	
	if($blfee>=$amount[$i])
		{
		$amountnet=$blfee-$amount[$i];
		$insfmark2="UPDATE `borno_school_balance` SET borno_school_fee=$amountnet where borno_school_balance_id=$balId[$i]";	
		

				
		$qinstm2=$mysqli->query($insfmark2);
			}
	else{
	goto lastline;  
	}		

}

	//========================================== Sub Fund Section ==============================================	
	
	
//========================================================== Eand Sub Fund Section =============================================
	
	
	

		

	date_default_timezone_set('Asia/Dhaka');
	$receiptdate=date('Y-m-d');
		$smstime=date('H:I:s');			
				

	
	
	$insfmark1="INSERT INTO `borno_school_receipt` 
	     (
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
					'$memono', 
					'$receiptdate',
					'$schId', 
					'$addBranchf',
					'$studClass1',
					'$shiftId1',
					'$section1',
					'$stsess1',
					'$studId',
					'$roll1',
					'$fundid[$i]',
					'$subfundid[$i]',
					'$amount[$i]'
					)
			  ";

		$qinstm1=$mysqli->query($insfmark1);
		
	lastline:	
	}
		}
		
 //======================central account=================================
     $gtmaxdate="select * from borno_school_central_account where  	borno_school_id='$schId' AND borno_school_date!='$receiptdate' order by borno_school_date desc limit 0,1";
					$qgtmaxdate=$mysqli->query($gtmaxdate);
					$sqgtmaxdate=$qgtmaxdate->fetch_assoc();
    $maxdate=$sqgtmaxdate['borno_school_date'];
    $pbal=$sqgtmaxdate['balance'];
    if($maxdate==""){$previousbalance=0;}
    else{$previousbalance=$pbal;}
    
     $gtcstdacc="select * from borno_school_central_account where borno_school_id='$schId' AND borno_school_date='$receiptdate'";
    $qggstdacc=$mysqli->query($gtcstdacc);
	$shqggtcstdacc=$qggstdacc->fetch_assoc();
	
    if($shqggtcstdacc['borno_school_date']!="")
    {
        $prevbal=$shqggtcstdacc['previous_balance'];
        $other=$shqggtcstdacc['other_income'];
        $withdraw=$shqggtcstdacc['bank_withdraw'];
        $expen=$shqggtcstdacc['expence'];
        $deposit=$shqggtcstdacc['bank_deposit'];
        
    $getstdcoll="select * from borno_school_receipt where borno_school_id='$schId' AND borno_school_date='$receiptdate'";
	$qgetstdcoll =$mysqli->query($getstdcoll);
	while($shgetstdc0ll=$qgetstdcoll->fetch_assoc()){
		
		$getstdcollect[]=$shgetstdc0ll['borno_school_fee'];
		}
			$stdbal=array_sum($getstdcollect); 
        $income=$prevbal+$stdbal+$other+$withdraw;
        $expence=$deposit+$expen;
        $balan=$income-$expence;
     	$insfaccc="UPDATE `borno_school_central_account` SET previous_balance=$previousbalance,student_collection=$stdbal,balance=$balan where borno_school_date='$receiptdate'";	
		$qinsacc=$mysqli->query($insfaccc);   
    }
    else
    {
    $getstdcoll="select * from borno_school_receipt where borno_school_id='$schId' AND borno_school_date='$receiptdate'";
	$qgetstdcoll =$mysqli->query($getstdcoll);
	while($shgetstdc0ll=$qgetstdcoll->fetch_assoc()){
		
		$getstdcollect[]=$shgetstdc0ll['borno_school_fee'];
		}
			$stdbal=array_sum($getstdcollect); 
        
        $balan=$stdbal+$previousbalance;
    	$insfaccc="INSERT INTO `borno_school_central_account` 
	     (
		 	`borno_school_id`,
			`borno_school_date`,
			`previous_balance`,
			`student_collection`,
			`bank_withdraw`,
			`other_income`,
			`expence`,
			`bank_deposit`,
			`balance`
			)
				   
			VALUES (
					'$schId', 
					'$receiptdate',
					'$previousbalance', 
					'$stdbal',
					'0',
					'0',
					'0',
					'0',
					'$balan'
					)
			  ";

		$qinsacc=$mysqli->query($insfaccc);    
    }
    //======================central account=================================    


if($qinstm1) { 
    

 
    header("location:std_transaction.php?branchId=$addBranchf&studClass=$studClass1&shiftId=$shiftId1&section=$section1&stsess=$stsess1&msg1=$memono&msg=1"); } 

else  {   header("location:std_transaction.php?msg=2"); }
		
			
 ?>

