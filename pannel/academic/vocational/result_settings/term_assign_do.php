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
		
		
		$perc= $_POST['perc'];
		$termName= $_POST['termName'];
		$termtype= $_POST['termtype'];
		
		
		
		
		
		$gsess="select * from borno_result_add_term_voc where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1'";
	

	
 	$qterm=$mysqli->query($gsess);
	$shterm=$qterm->fetch_assoc();
	
	$gtermsess=$shterm['borno_school_session'];
	
	if($gtermsess!="") { header('location:term_assign.php?msg=3'); } else {
		
		 $ttmmrk=array_sum($perc);
		 
		 
	$ttmmrk;
					
					  if($ttmmrk<100) { header('location:term_assign.php?msg=1'); }
					  else if($ttmmrk>100) { header('location:term_assign.php?msg=2'); }
					  else {
					  
					
									for($i=0; $i<count($perc); $i++){
										
										
										
										if($perc[$i]!=""){
											$insmk="INSERT INTO `borno_result_add_term_voc` (`borno_school_id`,`borno_school_class_id`,`borno_school_session`, `borno_result_term_name`, `borno_result_term_percent`,`term_type`)
											
											 VALUES ('$schId','$studClass1','$stsess1', '$termName[$i]', '$perc[$i]','$termtype[$i]')";
											 
									
											 $qterm=$mysqli->query($insmk);
										
										} 
									}
										if($qterm) { header('location:term_assign.php?msg=4');} else { header('location:term_assign.php?msg=5');}
										
						  }
	}

		
		
			
 ?>

