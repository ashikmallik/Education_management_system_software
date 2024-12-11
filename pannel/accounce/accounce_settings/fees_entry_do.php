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
		
		for($i=0; $i<=count($fundAmount); $i++){
		
		if($fundAmount[$i]!=""){
		
		$setsubfund="select * from borno_school_sub_fund where borno_school_id='$schId' AND sub_fund_name='$fundName[$i]'";		
		$qsetsubfund=$mysqli->query($setsubfund);
		$shsetsubfund=$qsetsubfund->fetch_assoc();
		
		$subfundId=$shsetsubfund['borno_school_sub_fund_id'];
        if($subfundId==""){$subfundId=0;}
        
		$feeEntqry="select * from borno_school_fees where borno_school_id='$schId' AND borno_school_branch_id='$addBranchf' AND borno_school_class_id=$studClass1 AND borno_school_session='$stsess1' AND borno_school_fund_name='$fundName[$i]'";
  
    $qfeeEntqry=$mysqli->query($feeEntqry);
	$shfeeEntqry=$qfeeEntqry->fetch_assoc();
	
	$getfundName=$shfeeEntqry['borno_school_fund_name'];
	
		
				
				if($getfundName==""){
					
				
					
	
	$insfmark1="INSERT INTO `borno_school_fees` 
	     (
			`borno_school_id`,
			`borno_school_branch_id`,
			`borno_school_class_id`,
			`borno_school_session`,
			`borno_school_fund_name`,
			`borno_school_fund_id`,
			`borno_school_sub_fund_id`,
			`borno_school_fee`
			)
				   
			VALUES (
					'$schId', 
					'$addBranchf',
					'$studClass1',
					'$stsess1',
					'$fundName[$i]',
					'$fundId[$i]',
					'$subfundId',
					'$fundAmount[$i]'
					)
			  ";
			  
			  

		$qinstm1=$mysqli->query($insfmark1);
		
		
	
	}
}
	
	}
if($qinstm1) { header("location:fees_entry.php?branchId=$addBranchf&studClass=$studClass1&stsess=$stsess1&msg=1"); } 

else  {   header("location:fees_entry.php?msg=2"); }
		
			
 ?>

