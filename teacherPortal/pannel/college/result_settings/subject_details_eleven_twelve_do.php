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
		
		$dept = clean_html($_POST['dept']);
		$dept1 = strip_tags($_POST['dept']);
		
		$term = clean_html($_POST['term']);
		$term1 = strip_tags($_POST['term']);
		
		$subid= $_POST['subid'];
		$full= $_POST['Full'];
				
		$mark1= $_POST['mark1'];
		$mark2= $_POST['mark2'];
		$mark3= $_POST['mark3'];
		$mark4= $_POST['mark4'];
		$mark5= $_POST['mark5'];
		$mark6= $_POST['mark6'];
		
		$pass1= $_POST['pass1'];
		$pass2= $_POST['pass2'];
		$pass3= $_POST['pass3'];
		$pass4= $_POST['pass4'];
		$pass5= $_POST['pass5'];
		$pass6= $_POST['pass6'];
		
		$con1= $_POST['con1'];
		$con2= $_POST['con2'];
		$con3= $_POST['con3'];
		$con4= $_POST['con4'];
		$con5= $_POST['con5'];
		$con6= $_POST['con6'];
		
		
		
		
		$gsess="select * from borno_result_eleven_twelve_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='$term1' AND borno_school_stud_group='$dept1'";
	

	
 	$qterm=$mysqli->query($gsess);
	$shterm=$qterm->fetch_assoc();
	
	$gtermsess=$shterm['borno_school_session'];
	
	if($gtermsess!="") { header('location:subject_details_eleven_twelve.php?msg=3'); } else {
		
		
					  
					
									for($i=0; $i<count($full); $i++){
										
										
										
										if($full[$i]!=""){
											
	$gpare="select * from borno_subject_eleven_twelve
where borno_subject_eleven_twelve_id='$subid[$i]'";
	$qgpare=$mysqli->query($gpare);
	$shqgpare=$qgpare->fetch_assoc();	
	$pare=$shqgpare['borno_subject_eleven_twelve_pare'];

	
 								
										$insmk="INSERT INTO `borno_result_eleven_twelve_subject_details` (`borno_school_id`,`borno_school_class_id`,`borno_school_stud_group`,`borno_school_session`, `borno_result_term_id`,`borno_subject_eleven_twelve_id`,`borno_eleven_twelve_subfullmark`, `number_type1_marks`,`number_type2_marks`,`number_type3_marks`,`number_type4_marks`,`number_type5_marks`,`number_type6_marks`,`number_type1_pass`,`number_type2_pass`,`number_type3_pass`,`number_type4_pass`,`number_type5_pass`,`number_type6_pass`,`number_type1_conv`,`number_type2_conv`,`number_type3_conv`,`number_type4_conv`,`number_type5_conv`,`number_type6_conv`,`pare`)
											
											 VALUES ('$schId','$studClass1','$dept1','$stsess1','$term1', '$subid[$i]','$full[$i]', '$mark1[$i]','$mark2[$i]','$mark3[$i]','$mark4[$i]','$mark5[$i]','$mark6[$i]','$pass1[$i]','$pass2[$i]','$pass3[$i]','$pass4[$i]','$pass5[$i]','$pass6[$i]','$con1[$i]','$con2[$i]','$con3[$i]','$con4[$i]','$con5[$i]','$con6[$i]','$pare')";
											 
									
											 $qterm=$mysqli->query($insmk);
										
										} 
									}
									
								
										if($qterm) { header('location:subject_details_eleven_twelve.php?msg=1');} else { header('location:subject_details_eleven_twelve.php?msg=2');}
										
						  }
	

		
		
			
 ?>

