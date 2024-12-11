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
	
		$month = clean_html($_POST['month']);
		$month1 = strip_tags($_POST['month']);
						
		$addBranch = clean_html($_POST['branchId']);
		$addBranchf = strip_tags($_POST['branchId']);
		
		$exhead = clean_html($_POST['exhead']);
		$exhead1 = trim(strip_tags($_POST['exhead']));
		
		$exname = clean_html($_POST['exname']);
		$exname1 = trim(strip_tags($_POST['exname']));
		
		$exby = clean_html($_POST['exby']);
		$exby1 = strip_tags(trim($_POST['exby']));
		
		$amount=$_POST['amount'];
		$exhead2=$_POST['exhead1'];
		$exname2=$_POST['exname1'];
		$exby2=$_POST['exby1'];

	date_default_timezone_set('Asia/Dhaka');
	$receiptdate=date('Y-m-d');	
	
$gstmemo="select * from borno_school_expence order by borno_school_expence_memo desc limit 0,1";
					$qggstmemo=$mysqli->query($gstmemo);
					while($shqggstmemo=$qggstmemo->fetch_assoc())
		   	       $memo=$shqggstmemo['borno_school_expence_memo'];
	
	if($memo!="")
	{$memono=$memo+1;}
	else
	{$memono=10000001;}	
	
	if($amount!=""){
					
					if ($exhead2=="")
					{
					$exhead11=$exhead1;
					}
					else
					{
					$exhead11=$exhead2;	
					}
					
					if ($exname2=="")
					{
					$exname11=$exname1;
					}
					else
					{
					$exname11=$exname2;	
					}
					
					if ($exby2=="")
					{
					$exby11=$exby1;
					}
					else
					{
					$exby11=$exby2;	
					}
				
			
	
if($month1!="" AND $addBranchf!="" AND $exhead11!="" AND $exname11!="" AND $exby11!="")
	{
	$insfmark1="INSERT INTO `borno_school_expence` 
	     (
			`borno_school_id`,
			`borno_school_branch_id`,
			`borno_school_month`,
			`borno_school_exhead`,
			`borno_school_exname`,
			`borno_school_exby`,
			`borno_school_expence_amount`,
			`borno_school_user_id`,
			`borno_school_user_name`,
			`borno_school_ex_date`,
			`borno_school_expence_memo`
			)
				   
			VALUES (
					'$schId', 
					'$addBranchf',
					'$month1',
					'$exhead11',
					'$exname11',
					'$exby11',
					'$amount',
					'',
					'',
					'$receiptdate',
					'$memono'
					)
			  ";
		
		$qinstm1=$mysqli->query($insfmark1);
		
	}	
	

	
	}
	
	
	  //======================central account=================================
     $gtmaxdate="select * from borno_school_central_account where  	borno_school_id='$schId' AND borno_school_date!='$receiptdate' order by borno_school_date desc limit 0,1";
					$qgtmaxdate=$mysqli->query($gtmaxdate);
					$sqgtmaxdate=$qgtmaxdate->fetch_assoc();
    $maxdate=$sqgtmaxdate['borno_school_date'];
    if($maxdate==""){$previousbalance=0;}
    else{$previousbalance=$sqgtmaxdate['balance'];}
    
     $gtcstdacc="select * from borno_school_central_account where borno_school_id='$schId' AND borno_school_date='$receiptdate'";
    $qggstdacc=$mysqli->query($gtcstdacc);
	$shqggtcstdacc=$qggstdacc->fetch_assoc();
	
    if($shqggtcstdacc['borno_school_date']!="")
    {
        $prevbal=$shqggtcstdacc['previous_balance'];
        $stdbal=$shqggtcstdacc['student_collection'];
        $withdraw=$shqggtcstdacc['bank_withdraw'];
        $other=$shqggtcstdacc['other_income'];
        $deposit=$shqggtcstdacc['bank_deposit'];
        
    $getstdcoll="select * from borno_school_expence where borno_school_id='$schId' AND borno_school_ex_date='$receiptdate'";
	$qgetstdcoll =$mysqli->query($getstdcoll);
	while($shgetstdc0ll=$qgetstdcoll->fetch_assoc()){
		
		$getstdcollect[]=$shgetstdc0ll['borno_school_expence_amount'];
		}
			$expen=array_sum($getstdcollect); 
        $income=$prevbal+$stdbal+$other+$withdraw;
        $expence=$deposit+$expen;
        $balan=$income-$expence;
     	$insfaccc="UPDATE `borno_school_central_account` SET previous_balance=$previousbalance,expence=$expen,balance=$balan where borno_school_date='$receiptdate'";	
		$qinsacc=$mysqli->query($insfaccc);   
    }
    else
    {
    $getstdcoll="select * from borno_school_expence where borno_school_id='$schId' AND borno_school_ex_date='$receiptdate'";
	$qgetstdcoll =$mysqli->query($getstdcoll);
	while($shgetstdc0ll=$qgetstdcoll->fetch_assoc()){
		
		$getstdcollect[]=$shgetstdc0ll['borno_school_expence_amount'];
		}
			$expen=array_sum($getstdcollect); 
        
        $balan=$previousbalance-$expen;
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
					'0',
					'0',
					'0',
					'$expen',
					'0',
					'$balan'
					)
			  ";

		$qinsacc=$mysqli->query($insfaccc);    
    }
    //======================central account=================================
	
//==================== Start Memo no=================================

$gstmemono="select * from borno_school_expence where borno_school_id='$schId' order by borno_school_expence_memo desc limit 0,1";
    $qgstmemono=$mysqli->query($gstmemono);
	$shqgstmemono=$qgstmemono->fetch_assoc();
	$memono=$shqgstmemono['borno_school_expence_memo'];

//==================== End Start Memo no =================================		
	
	
if($qinstm1) { header("location:expence.php?msg=1&memono=$memono"); } 



else  {header("location:expence.php?msg=2"); }
	
		
		
			
 ?>

