<?php
 require_once('student_top.php');
 
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
	

		$studentid = clean_html($_POST['studid']);
		$studentid1 = strip_tags($_POST['studid']);
		
		$cpass = clean_html($_POST['cpass']);
		$cpass1 = strip_tags($_POST['cpass']);
		
		$npass = clean_html($_POST['npass']);
		$npass1 = strip_tags($_POST['npass']);
		

    	date_default_timezone_set('Asia/Dhaka');	
		$date=date('Y-m-d');		


 $gsess="select * from borno_student_login where borno_student_info_id='$studentid1' AND borno_student_password='$cpass1'";
 	$qterm=$mysqli->query($gsess);
	$shterm=$qterm->fetch_assoc();
	$gtermsess=$shterm['borno_student_info_id'];

	if("$gtermsess"=="$studentid1")
	{
 $insmk="UPDATE `borno_student_login` SET `borno_student_password`='$npass1', `borno_modify_date`='$date' where `borno_student_info_id`=$studentid1";
	
	
							
	$qterm=$mysqli->query($insmk);
	}


	if($qterm) { header('location:promotion.php?msg=1');} else { header('location:promotion.php?msg=2');}
		
		
			
 ?>

