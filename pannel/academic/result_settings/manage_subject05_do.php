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
	
							

		
		
	$perc= $_POST['perc'];
	$termName= $_POST['termName'];
	$addsub= $_POST['addsub'];
	$termtype= $_POST['termtype'];
		
		
		 
		 

					
				
					  
					
									for($i=0; $i<count($perc); $i++){
										
										
										
										if($perc[$i]!=""){
										$insmk="Update `borno_result_subject` SET `borno_school_subject_name`='".trim($termName[$i])."',`borno_school_subject_fullmark`='$perc[$i]',`subst`='$addsub[$i]' where `borno_result_subject_id`='$termtype[$i]'";
											 
									
											 $qterm=$mysqli->query($insmk);
											 
											 
									  $onlinemks="Update `schl_subjs` SET `schl_subj_name`='".trim($termName[$i])."',`borno_school_subject_fullmark`='$perc[$i]',`subst`='$addsub[$i]' where `borno_school_subject_id`='$termtype[$i]'";
							
							           $qterms=$mysqli->query($onlinemks);
										} 
									}
								
										if($qterm) { header('location:manage_subject05.php?msg=1');} else { header('location:manage_subject05.php?msg=2');}
										
						  
	

		
		
			
 ?>

