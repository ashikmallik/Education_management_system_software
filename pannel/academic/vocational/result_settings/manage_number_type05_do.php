<?php
 require_once('../result_settings/result_sett_top.php');
 
 require_once '../../../../lib/htmlpurifier/library/HTMLPurifier.auto.php';
    
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
	
							

		
		$termName1 = clean_html($_POST['termName1']);
		$termName11 = strip_tags($_POST['termName1']);
		
		$termName2 = clean_html($_POST['termName2']);
		$termName21 = strip_tags($_POST['termName2']);
		
		$termName3 = clean_html($_POST['termName3']);
		$termName31 = strip_tags($_POST['termName3']);
		
		$termName4 = clean_html($_POST['termName4']);
		$termName41 = strip_tags($_POST['termName4']);
		
		$termName5 = clean_html($_POST['termName5']);
		$termName51 = strip_tags($_POST['termName5']);
		
		$termName6 = clean_html($_POST['termName6']);
		$termName61 = strip_tags($_POST['termName6']);
		
		
		$termtype = $_POST['termtype'];
		
		
		
		
		

		
		
					  
					
									
											$insmk="Update `borno_result_number_type_voc` SET `borno_school_number_type1`='$termName11', `borno_school_number_type2`='$termName21',`borno_school_number_type3`='$termName31',`borno_school_number_type4`='$termName41',`borno_school_number_type5`='$termName51',`borno_school_number_type6`='$termName61' where borno_result_number_type_id='$termtype'";
											 
									
											 $qterm=$mysqli->query($insmk);
										
										
										if($qterm) { header('location:manage_number_type05.php?msg=1');} else { header('location:manage_number_type05.php?msg=2');}
										
				

		
		
			
 ?>

