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
		
		//$shiftId = clean_html($_POST['shiftId']);
		//$shiftId1 = strip_tags($_POST['shiftId']);
		
		//$section = clean_html($_POST['section']);
		//$section1 = strip_tags($_POST['section']);
		
		$stsess = clean_html($_POST['stsess']);
		$stsess1 = strip_tags(trim($_POST['stsess']));					


	$getFabdName="select * from borno_school_fees where borno_school_id='$schId' AND borno_school_branch_id ='$addBranchf' AND borno_school_class_id ='$studClass1' AND borno_school_session ='$stsess1'";
 	$qgetFabdName=$mysqli->query($getFabdName);
	$shgetFabdName=$qgetFabdName->fetch_assoc();
	$gqfundName=$shgetFabdName['borno_school_fee'];
			
	if($gqfundName=="") { header('location:create_leadger.php?msg=4'); }
	else {
	
	
 $gtstudInfo="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$addBranchf' AND borno_school_class_id='$studClass1'  AND borno_school_session='$stsess1' Order by borno_student_info_id asc";
 
 
  
    $qgtstudInfo=$mysqli->query($gtstudInfo);
	while($shgtstudInfo=$qgtstudInfo->fetch_assoc()){
		

		$shiftId1 = $shgtstudInfo['borno_school_shift_id']; 
		$section1 = $shgtstudInfo['borno_school_section_id'];
		$studinfoId = $shgtstudInfo['borno_student_info_id']; 
		$studRoll = $shgtstudInfo['borno_school_roll']; 



		$gtctmarg="select * from borno_school_fees where borno_school_id='$schId' AND borno_school_branch_id='$addBranchf' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' Order by borno_school_fund_id";
  
	
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){
		
		 $studfund = $shgtctmarg['borno_school_fund_id']; 
		 $studSubfund = $shgtctmarg['borno_school_sub_fund_id'];
		$studfees = $shgtctmarg['borno_school_fee']; 
		
		
		$getBalance="select * from  borno_school_balance where borno_school_id='$schId' AND borno_school_branch_id='$addBranchf' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_student_info_id='$studinfoId' AND borno_school_fund_id='$studfund' AND borno_school_sub_fund_id='$studSubfund'";
		
		$qgetBalance=$mysqli->query($getBalance);
		$shgetBalance=$qgetBalance->fetch_assoc();
		
		$getstudId=$shgetBalance['borno_student_info_id'];
		$getfundId=$shgetBalance['borno_school_fund_id'];
		$getsubfundId=$shgetBalance['borno_school_sub_fund_id'];
	
		if($getstudId=="" AND $getfundId=="" AND $getsubfundId==""){
		
	

	$insfmark="INSERT INTO `borno_school_balance` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, `borno_student_info_id`, `borno_school_roll`, `borno_school_fund_id`,`borno_school_sub_fund_id`, `borno_school_fee`) 
	
	VALUES ('$schId', '$addBranchf', '$studClass1', '$shiftId1', '$section1', '$stsess1', '$studinfoId', '$studRoll', '$studfund','$studSubfund', '$studfees')";
		

 	$qins=$mysqli->query($insfmark);

		}
	
	}
	}
						
						if($qins)  { header("location:create_leadger.php?msg=1&branchId=$addBranchf&studClass=$studClass1&shiftId=$shiftId1&section=$section1&stsess=$stsess1"); } else {header("location:create_leadger.php?msg=2&branchId=$addBranchf&studClass=$studClass1&shiftId=$shiftId1&section=$section1&stsess=$stsess1");}
	}
		
		
			
 ?>

