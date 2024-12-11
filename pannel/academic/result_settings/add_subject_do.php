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
	
							
		$studClass = clean_html($_POST['studClass']);
		$studClass1 = strip_tags($_POST['studClass']);
		
		$stsess = clean_html($_POST['stsess']);
		$stsess1 = strip_tags($_POST['stsess']);
		
		
		$perc= $_POST['perc'];
	$termName= $_POST['termName'];
	$addsub= $_POST['addsub'];
		
		
		
		
		
		$gsess="select * from borno_result_subject where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1'";
	

	
 	$qterm=$mysqli->query($gsess);
	$shterm=$qterm->fetch_assoc();
	
	$gtermsess=$shterm['borno_school_session'];
	
	if($gtermsess!="") { header('location:add_subject05.php?msg=3'); } else {
		
		 
		 

					
				
					  
					
									for($i=0; $i<count($perc); $i++){
										
										
										
										if($perc[$i]!=""){
											$insmk="INSERT INTO `borno_result_subject` (`borno_school_id`,`borno_school_class_id`,`borno_school_session`, `borno_school_subject_name`,`borno_subject_name_short`, `borno_school_subject_fullmark`,`subst`)
											
											 VALUES ('$schId','$studClass1','$stsess1', '$termName[$i]','', '$perc[$i]','$addsub[$i]')";
											 
									
											 $qterm=$mysqli->query($insmk);
									
										} 
									}
								
								
		$onlineMarks="INSERT INTO `schl_subjs` (`sch_class_id`,`schl_subj_name`,`borno_school_subject_id`, `borno_school_id`,`borno_school_session`, `borno_school_subject_fullmark`,`borno_result_term_id`)
		SELECT `borno_school_class_id`,`borno_school_subject_name` ,`borno_result_subject_id`,`borno_school_id`,`borno_school_session`,`borno_school_subject_fullmark`,'0' FROM `borno_result_subject` WHERE `borno_school_id` = '$schId' AND `borno_school_class_id` = '$studClass1' AND `borno_school_session` = '$stsess1' ";
								
				 $qterms=$mysqli->query($onlineMarks);				
								

							    
										if($qterm) { 
										    
										    header('location:add_subject05.php?msg=4');} else { header('location:add_subject05.php?msg=5');}

						  
						
	}
	

										


		
			
 ?>

