<?php
 require_once('result_sett_top.php');
 
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
	
							

		
		
	$perc= $_POST['perc'];
	$subname= $_POST['subname'];
	$subid= $_POST['subid'];
	$pare= $_POST['pare'];
	$sub4th= $_POST['sub4th'];
	$uncountable= $_POST['uncountable'];
	
		
		
		 
		 

					
				
					  
					
									for($i=0; $i<count($subid); $i++){
										
										
										
										if($subid[$i]!=""){
										$insmk="Update `modeltest_set_subject_six_eight` SET `sub_six_eight_fullmark`='".trim($perc[$i])."',`six_eight_subject_pare`='$pare[$i]',`six_eight_4th_subject`='$sub4th[$i]',`uncountable`='$uncountable[$i]' where `borno_set_subject_six_eight_id`='$subid[$i]'";
											 
									
											 $qterm=$mysqli->query($insmk);
							
										} 
									}
								
										if($qterm) { header('location:manage_subject68.php?msg=1');} else { header('location:manage_subject68.php?msg=2');}
										
						  
	

		
		
			
 ?>

