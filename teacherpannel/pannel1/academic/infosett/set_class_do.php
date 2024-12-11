<?php
require_once('information_top.php');
 
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
	
	$branchId=$_POST['branchId'];
	$classId=$_POST['classId'];
	$clid=$_POST['clid'];
	
	
	
	for($i=0;$i<count($classId);$i++){
		
		
		
		$getClassId="select * from borno_school_set_class where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$classId[$i]'";
		
		$qgetClassId=$mysqli->query($getClassId);
		$shgetClassId=$qgetClassId->fetch_assoc();
		
		$shgetClassId['borno_school_class_id'];
		
		if($shgetClassId['borno_school_class_id']==""){
			
		$getClassorder="select * from borno_school_class where  borno_school_class_id='$classId[$i]'";
		
		$qgetClassorder=$mysqli->query($getClassorder);
		$shqgetClassorder=$qgetClassorder->fetch_assoc();	
		$clorder=$shqgetClassorder['clorder'];
		
		$insClass="INSERT INTO `borno_school_set_class` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `class_order`) 
		
		                                         VALUES ('$schId', '$branchId', '$classId[$i]', '$clorder')";
				
									 
			$qsetClass=$mysqli->query($insClass);
													 
		
		} 
		 }
		
		if($insClass) { header('location:set_inst_class.php?msg=1'); } else { header('location:set_inst_class.php?msg=2'); }
	

?>

