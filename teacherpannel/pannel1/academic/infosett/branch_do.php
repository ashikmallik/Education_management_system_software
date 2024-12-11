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
	
		$addBranch = clean_html($_POST['addBranch']);
		$addBranchf = strip_tags($_POST['addBranch']);
		
			$branch="select * from `borno_school_branch` where `borno_school_id`='$schId' AND `borno_school_branch_name`='$addBranchf'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
		
		if($smsbranch['borno_school_branch_name']==$addBranchf){
			header("location:add_branch.php?msg=3");
			
			}
			else
			{
		
		
		
		$bornoschBranch="INSERT INTO `borno_school_branch` (`borno_school_id`, `borno_school_branch_name`)
											
															VALUES ('$schId', '$addBranchf')";
															
				$qbornoschBranch = $mysqli->prepare($bornoschBranch);
				$qbornoschBranch->execute();
				
				if($qbornoschBranch) { header('location:add_branch.php?msg=1'); } else { header('location:add_branch.php?msg=2'); }				
				
			}
 
 ?>

