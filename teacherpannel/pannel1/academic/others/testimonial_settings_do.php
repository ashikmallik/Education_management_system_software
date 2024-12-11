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
	
		$extype = clean_html($_POST['extype']);
		$extype1 = strip_tags($_POST['extype']);
									
		$stdtype1 = clean_html($_POST['stdtype1']);
		$stdtype11 = strip_tags($_POST['stdtype1']);
		
		$stdtype2 = clean_html($_POST['stdtype2']);
		$stdtype21 = strip_tags($_POST['stdtype2']);
		
		$stdtype3 = clean_html($_POST['stdtype3']);
		$stdtype31 = strip_tags($_POST['stdtype3']);
		
		$stdtype4 = clean_html($_POST['stdtype4']);
		$stdtype41 = strip_tags($_POST['stdtype4']);

		$child = clean_html($_POST['child']);
		$child1 = strip_tags($_POST['child']);
						
		$address= $_POST['address'];
		$exam= $_POST['exam'];

		
		
		
		
		
		$gsess="select * from borno_testimonial_settings where borno_school_id='$schId' AND borno_school_exam_type='$extype1'";
	

	
 	$qterm=$mysqli->query($gsess);
	$shterm=$qterm->fetch_assoc();
	
	$gtermsess=$shterm['borno_school_exam_type'];
	
	if($gtermsess!="") { header('location:testimonial_settings.php?msg=3'); } else {
		
		 
		 

					
				
					  
					

											$insmk="INSERT INTO `borno_testimonial_settings` (`borno_school_id`,`borno_school_exam_type`,`borno_school_address`, `borno_school_exam`, `borno_school_std_type1`,`borno_school_std_type2`,`borno_school_std_type3`,`borno_school_std_type4`,`borno_school_child_type`)
											
											 VALUES ('$schId','$extype1','$address', '$exam', '$stdtype11','$stdtype21','$stdtype31','$stdtype41','$child1')";
											 
									
											 $qterm=$mysqli->query($insmk);
									
										
	}
								
										if($qterm) { header('location:testimonial_settings.php?msg=1');} else { header('location:testimonial_settings.php?msg=2');}
										
						 
	

		
		
			
 ?>

