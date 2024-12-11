<?php
 require_once('teacher_top.php');
 
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

		
		$stsess = clean_html($_POST['stsess']);
		$stsess1 = strip_tags($_POST['stsess']);
		

		
		$branch1="select * from `borno_teacher_info` where `borno_school_id`='$schId' AND `borno_school_branch_id`='$addBranchf' order by 	borno_teacher_info_id asc";
	$rsQuery11 = $mysqli->query($branch1);
	while($smsbranch1=$rsQuery11->fetch_assoc()){;
	$teacherid1=$smsbranch1['borno_teacher_info_id'];
	
	$branch="select * from `borno_teacher_login` where `borno_teacher_info_id`='$teacherid1'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();

		
		if($smsbranch['borno_teacher_info_id']==""){
		
			date_default_timezone_set('Asia/Dhaka');	
			$date=date('Y-m-d');	
			
   $bornoschBranch="INSERT INTO `borno_teacher_login` (`borno_teacher_info_id`,`borno_teacher_password`, `borno_create_date`, `borno_modify_date`, `borno_teacher_status`)
											
															VALUES ('$teacherid1', '1231230','$date','$date','0')";
							
							
			
				$qbornoschBranch = $mysqli->prepare($bornoschBranch);
				$qbornoschBranch->execute();
		}
	
	}
				if($qbornoschBranch) { header('location:create_login.php?msg=1'); } else { header('location:create_login.php?msg=2'); }	
				
			
	
 ?>

