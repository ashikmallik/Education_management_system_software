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
	
		$month = clean_html($_POST['month']);
		$month1 = strip_tags($_POST['month']);
						
		$addBranch = clean_html($_POST['branchId']);
		$addBranchf = strip_tags($_POST['branchId']);
		
		$exhead = clean_html($_POST['exhead']);
		$exhead1 = strip_tags($_POST['exhead']);
		
		$exname = clean_html($_POST['exname']);
		$exname1 = strip_tags($_POST['exname']);
		

		$amount=$_POST['amount'];
		$exhead2=$_POST['exhead1'];
		$exname2=$_POST['exname1'];
		$narr=$_POST['narr'];

$gstmemo="select * from borno_school_other_income order by borno_school_other_income_memo desc limit 0,1";
					$qggstmemo=$mysqli->query($gstmemo);
					while($shqggstmemo=$qggstmemo->fetch_assoc())
		   	       $memo=$shqggstmemo['borno_school_other_income_memo'];
	
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
					
	
	date_default_timezone_set('Asia/Dhaka');
	$receiptdate=date('Y-m-d');				
	
	$insfmark1="INSERT INTO `borno_school_other_income` 
	     (
			`borno_school_id`,
			`borno_school_branch_id`,
			`borno_school_month`,
			`borno_school_income_head`,
			`borno_school_income_name`,
			`borno_school_income_narration`,
			`borno_school_income_amount`,
			`borno_school_user_id`,
			`borno_school_user_name`,
			`borno_school_other_income_date`,
			`borno_school_other_income_memo`
			)
				   
			VALUES (
					'$schId', 
					'$addBranchf',
					'$month1',
					'$exhead11',
					'$exname11',
					'$narr',
					'$amount',
					'',
					'',
					'$receiptdate',
					'$memono'
					)
			  ";
		
		$qinstm1=$mysqli->query($insfmark1);
		
		
	

	
	}
if($qinstm1) { header("location:other_income.php?msg=1"); } 



else  {header("location:other_income.php?msg=2"); }
	
		
		
			
 ?>

