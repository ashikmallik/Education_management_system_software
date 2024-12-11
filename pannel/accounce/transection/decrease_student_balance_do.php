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
		
		$amount= $_POST['amount'];
        $balId=$_POST['balId'];
		
		for($i=0; $i<=count($amount); $i++){
		
		if($amount[$i]!=""){
		
	$feeEntqry="select * from borno_school_balance where  	borno_school_balance_id='$balId[$i]'";
  
    $qfeeEntqry=$mysqli->query($feeEntqry);
	$shfeeEntqry=$qfeeEntqry->fetch_assoc();
	
	$getfee1=$shfeeEntqry['borno_school_fee'];
    
    if($getfee1>=$amount[$i])
    {
    $getfee=$getfee1-$amount[$i];
    }
    else
    {
    $getfee=$getfee1;    
    }
	$insfmark1="UPDATE `borno_school_balance` SET `borno_school_fee`='$getfee' where borno_school_balance_id='$balId[$i]'";
			  
			  

		$qinstm1=$mysqli->query($insfmark1);
		
		
	
	}
}
	
	
if($qinstm1) { header("location:decrease_student_balance.php?branchId=$addBranchf&studClass=$studClass1&shiftId=$shiftId1&section=$section1&stsess=$stsess1&msg=1"); } 

else  {   header("location:decrease_student_balance.php?msg=2"); }
		
			
 ?>

