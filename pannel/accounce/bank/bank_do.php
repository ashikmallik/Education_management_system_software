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
	

						
		$addBranch = clean_html($_POST['branchId']);
		$addBranchf = strip_tags($_POST['branchId']);
		
		$bankname = clean_html($_POST['bankname']);
		$bankname1 = trim(strip_tags($_POST['bankname']));
		
		$acno = clean_html($_POST['acno']);
		$acno1 = trim(strip_tags($_POST['acno']));
		
		$type = clean_html($_POST['type']);
		$type1 = strip_tags($_POST['type']);

		$bankname2=$_POST['bankname1'];
		$acno2=$_POST['acno1'];
		$typeno1=$_POST['typeno'];
		$amount=$_POST['amount'];


	date_default_timezone_set('Asia/Dhaka');
	$receiptdate=date('Y-m-d');	
	
	if($amount!=""){
					
					if ($bankname2=="")
					{
					$bankname11=$bankname1;
					}
					else
					{
					$bankname11=$bankname2;	
					}
					
					if ($acno2=="")
					{
					$acno11=$acno1;
					}
					else
					{
					$acno11=$acno2;	
					}
					

if($addBranchf!="" AND $bankname11!="" AND $acno11!="" AND $type1!="" AND $typeno1!="")
    {
			
	if($type1==2 OR $type1==4){
	    
	$memo191 ="select SUM(borno_school_amount) As withdraw from borno_school_bank where borno_school_id='$schId' AND borno_school_bank_name='$bankname11' AND borno_school_bank_ac_no='$acno11' AND (borno_school_transection_type='2' OR borno_school_transection_type='4')";
		$qmemo191=$mysqli->query($memo191);
		$shgmemo191=$qmemo191->fetch_assoc();
		$fees191=$shgmemo191['withdraw'];   
		
		$memo19 ="select SUM(borno_school_amount) As deposit from borno_school_bank where borno_school_id='$schId' AND borno_school_bank_name='$bankname11' AND borno_school_bank_ac_no='$acno11' AND (borno_school_transection_type='1' OR borno_school_transection_type='3')";
		$qmemo19=$mysqli->query($memo19);
		$shgmemo19=$qmemo19->fetch_assoc();
		$fees19=$shgmemo19['deposit']; 	
		
	$balance=$fees19-$fees191;	
	
	if($balance<$amount){goto last;}
	else{goto first;}
	}
	
	first:
	$insfmark1="INSERT INTO `borno_school_bank` 
	     (
			`borno_school_id`,
			`borno_school_branch_id`,
			`borno_school_bank_name`,
			`borno_school_bank_ac_no`,
			`borno_school_transection_type`,
			`borno_school_transection_no`,
			`borno_school_date`,
			`borno_school_amount`
			)
				   
			VALUES (
					'$schId', 
					'$addBranchf',
					'$bankname11',
					'$acno11',
					'$type1',
					'$typeno1',
					'$receiptdate',
					'$amount'
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
        $expen=$shqggtcstdacc['expence'];
        $other=$shqggtcstdacc['other_income'];
        
    $getstdcoll1="select * from borno_school_bank where borno_school_id='$schId' AND borno_school_date='$receiptdate' AND borno_school_transection_type=1";
	$qgetstdcoll1 =$mysqli->query($getstdcoll1);
	while($shgetstdc0ll1=$qgetstdcoll1->fetch_assoc()){
		$getstdcollect1[]=$shgetstdc0ll1['borno_school_amount'];
		}
		$deposit=array_sum($getstdcollect1); 
 
     $getstdcoll2="select * from borno_school_bank where borno_school_id='$schId' AND borno_school_date='$receiptdate' AND borno_school_transection_type=2";
	$qgetstdcoll2 =$mysqli->query($getstdcoll2);
	while($shgetstdc0ll2=$qgetstdcoll2->fetch_assoc()){
		$getstdcollect2[]=$shgetstdc0ll2['borno_school_amount'];
		}
		$withdraw=array_sum($getstdcollect2);        

    if($deposit==""){$deposit=0;}
    if($withdraw==""){$withdraw=0;}

        $income=$prevbal+$stdbal+$other+$withdraw;
        $expence=$deposit+$expen;
        $balan=$income-$expence;
     	$insfaccc="UPDATE `borno_school_central_account` SET previous_balance=$previousbalance,bank_withdraw=$withdraw,bank_deposit=$deposit,balance=$balan where borno_school_date='$receiptdate'";	
		$qinsacc=$mysqli->query($insfaccc);   
    }
    else
    {
    $getstdcoll1="select * from borno_school_bank where borno_school_id='$schId' AND borno_school_date='$receiptdate' AND borno_school_transection_type=1";
	$qgetstdcoll1 =$mysqli->query($getstdcoll1);
	while($shgetstdc0ll1=$qgetstdcoll1->fetch_assoc()){
		$getstdcollect1[]=$shgetstdc0ll1['borno_school_amount'];
		}
		$deposit=array_sum($getstdcollect1); 
 
     $getstdcoll2="select * from borno_school_bank where borno_school_id='$schId' AND borno_school_date='$receiptdate' AND borno_school_transection_type=2";
	$qgetstdcoll2 =$mysqli->query($getstdcoll2);
	while($shgetstdc0ll2=$qgetstdcoll2->fetch_assoc()){
		$getstdcollect2[]=$shgetstdc0ll2['borno_school_amount'];
		}
		$withdraw=array_sum($getstdcollect2); 
        
    if($deposit==""){$deposit=0;}
    if($withdraw==""){$withdraw=0;}
        
        $balan=$previousbalance+$withdraw-$deposit;
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
					'$withdraw',
					'0',
					'0',
					'$deposit',
					'$balan'
					)
			  ";

		$qinsacc=$mysqli->query($insfaccc);    
    }
    //==================== end==central account=================================
	
//==================== Start Memo no=================================

$gstmemono="select * from borno_school_bank where borno_school_id='$schId' order by borno_school_bank_id desc limit 0,1";
    $qgstmemono=$mysqli->query($gstmemono);
	$shqgstmemono=$qgstmemono->fetch_assoc();
	$memono=$shqgstmemono['borno_school_bank_id'];

//==================== End Start Memo no =================================	
	
	

if($qinstm1) { header("location:bank.php?msg=1&memono=$memono"); } 

else  { header("location:bank.php?msg=2");
    last:
    header("location:bank.php?msg=3"); }
	
		
		
			
 ?>

