<?php
 require_once('../result_settings/result_sett_top.php');
 
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
	
				
		$group = clean_html($_POST['group']);
		$group1 = strip_tags($_POST['group']);
		
		$exam = clean_html($_POST['exam']);
		$exam1 = strip_tags($_POST['exam']);
		
		$passyear = clean_html($_POST['passyear']);
		$passyear1 = strip_tags($_POST['passyear']);
						
		$date= $_POST['datepicker'];
		$tesid= $_POST['tesid'];
		$sess= $_POST['sess'];
		$roll1= $_POST['roll1'];
		$reg= $_POST['reg'];
		$gpa= $_POST['gpa'];
	

		
		for($i=0; $i<count($gpa); $i++){
										
										
										
										if($gpa[$i]!=""){

	
	$insmk="Update `borno_school_testimonial` SET `borno_school_exam_session`='$sess[$i]',`borno_school_board_roll`='$roll1[$i]', `borno_school_reg`='$reg[$i]',`borno_school_gpa`='$gpa[$i]',`borno_school_date`='$date' where `borno_school_testimonial_id`='$tesid[$i]'";
											 
	
											 $qterm=$mysqli->query($insmk);

}}
 
if($qterm) { header('location:manage_testimonial.php?msg=1');} else { header('location:manage_testimonial.php?msg=2');}
										
			 
		

		
		
			
 ?>

