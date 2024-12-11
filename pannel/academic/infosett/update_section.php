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
	
		$addBranch = clean_html($_POST['branchId']);
		$addBranchf = strip_tags($_POST['branchId']);
		
		$studClass = clean_html($_POST['studClass']);
		$studClass1 = strip_tags($_POST['studClass']);
		
		$shiftId = clean_html($_POST['shiftId']);
		$shiftId1 = strip_tags($_POST['shiftId']);
		
		$section = clean_html($_POST['section']);
		$section1 = strip_tags($_POST['section']);
		
		$sectId=strip_tags($_POST['sectId']);
		
			
		
echo $updateShift="UPDATE borno_school_section SET borno_school_branch_id='$addBranchf',borno_school_class_id='$studClass1',borno_school_shift_id='$shiftId1', borno_school_section_name='$section1' where borno_school_section_id='$sectId'";
	
	

	$qupdateShift=$mysqli->query($updateShift);
	
	if($qupdateShift){ header('location:manage_section.php?msg=1'); } else { header('location:manage_section.php?msg=2'); }			
				
		
 
 ?>

