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
	
							
		$studClass = clean_html($_POST['studClass']);
		$studClass1 = strip_tags($_POST['studClass']);
		
		$stsess = clean_html($_POST['stsess']);
		$stsess1 = strip_tags($_POST['stsess']);
		
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
		
		
		
		
		
		
		
		
		$gsess="select * from borno_result_number_type_voc where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1'";
	

	
 	$qterm=$mysqli->query($gsess);
	$shterm=$qterm->fetch_assoc();
	
	$gtermsess=$shterm['borno_school_session'];
	
	if($gtermsess!="") { header('location:add_number_type05.php?msg=1'); } else {
		
		
					  
					
									
											$insmk="INSERT INTO `borno_result_number_type_voc` (`borno_school_id`,`borno_school_class_id`,`borno_school_session`, `borno_school_number_type1`, `borno_school_number_type2`,`borno_school_number_type3`,`borno_school_number_type4`,`borno_school_number_type5`,`borno_school_number_type6`)
											
											 VALUES ('$schId','$studClass1','$stsess1', '$termName11', '$termName21','$termName31','$termName41','$termName51','$termName61')";
											 
									
											 $qterm=$mysqli->query($insmk);
										
										
										if($qterm) { header('location:add_number_type05.php?msg=2');} else { header('location:add_number_type05.php?msg=3');}
										
						  }
	

		
		
			
 ?>

