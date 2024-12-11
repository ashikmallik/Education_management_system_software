<?php
 require_once('teacher_top.php');
 
 require_once '../../../lib/htmlpurifier/library/HTMLPurifier.auto.php';
    
    $purifier = new HTMLPurifier();
    $clean_html = $purifier->purify($dirty_html);
	
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
				
		$mgtType = clean_html($_POST['mgtType']);
		$mgtType1 = strip_tags($_POST['mgtType']);
						
		$teacher = clean_html($_POST['teacher']);
		$teacher1 = strip_tags($_POST['teacher']);
		
		$address = clean_html($_POST['address']);
		$address1 = strip_tags($_POST['address']);
		
		$stfdesig = clean_html($_POST['stfdesig']);
		$stfdesig1 = strip_tags($_POST['stfdesig']);
		
		$phone = clean_html($_POST['phone']);
		$phone1 = strip_tags($_POST['phone']);
		
			$branch="select * from `borno_gb_info` where `borno_school_id`='$schId' AND `borno_school_branch_id`='$addBranchf' AND `borno_gb_type`='$mgtType1' AND `borno_gb_name`='$teacher1'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
		
		echo $schId." ",$addBranchf." ",$mgtType1." ",$teacher1." ",$address1." ",$stfdesig1." ",$phone1;
		
		if($smsbranch['borno_gb_name']==$teacher1){
			header("location:add_gb.php?msg=3");
			
			}
			else
			{
		
		
		
		$bornoschBranch="INSERT INTO `borno_gb_info` (`borno_school_id`, `borno_school_branch_id`, `borno_gb_type`, `borno_gb_name`, `borno_gb_address`, `borno_gb_desig`, `borno_gb_phone`)
											
															VALUES ('$schId', '$addBranchf', '$mgtType1', '$teacher1', '$address1', '$stfdesig1', '88$phone1')";
															
															
				$qbornoschBranch = $mysqli->prepare($bornoschBranch);
				$qbornoschBranch->execute();
				
				if($qbornoschBranch) { header('location:add_gb.php?msg=1'); } else { header('location:add_gb.php?msg=2'); }				
				
			}
 
 ?>

