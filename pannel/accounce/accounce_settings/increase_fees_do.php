<?php
 require_once('accounce_sett_top.php');
 
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
        
		$stsess = clean_html($_POST['stsess']);
		$stsess1 = strip_tags($_POST['stsess']);
		
		$fundAmount= $_POST['fundAmount'];
		$fundName= $_POST['fundName'];
		$fundId= $_POST['fundId'];
        $subfundId=$_POST['subfundId'];
        $feesId=$_POST['feesId'];
		
		for($i=0; $i<=count($fundAmount); $i++){
		
		if($fundAmount[$i]!=""){
		
		$feeEntqry="select * from borno_school_fees where borno_school_fees_id='$feesId[$i]'";
  
    $qfeeEntqry=$mysqli->query($feeEntqry);
	$shfeeEntqry=$qfeeEntqry->fetch_assoc();
	
	$getfee1=$shfeeEntqry['borno_school_fee'];

    $getfee=$getfee1+$fundAmount[$i];

	$insfmark1="UPDATE `borno_school_fees` SET `borno_school_fee`='$getfee' where borno_school_fees_id='$feesId[$i]'";
			  
			  

		$qinstm1=$mysqli->query($insfmark1);
		
		
	
	}
}
	
	
if($qinstm1) { header("location:increase_fees.php?branchId=$addBranchf&studClass=$studClass1&stsess=$stsess1&msg=1"); } 

else  {   header("location:increase_fees.php?msg=2"); }
		
			
 ?>

