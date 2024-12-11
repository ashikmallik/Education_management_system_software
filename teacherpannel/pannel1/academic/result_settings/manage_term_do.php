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
	
							
		$studClass = clean_html($_POST['stuclass']);
		$studClass1 = trim(strip_tags($_POST['stuclass']));
		
		$stsess = clean_html($_POST['studess']);
		$stsess1 = trim(strip_tags($_POST['studess']));
		
		
		$perc= $_POST['perc'];
		$termName= $_POST['termName'];
		$termtype= $_POST['termtype'];
		
		
		
		
		
		$gsess="select * from borno_result_add_term where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1'";


	
 	$qterm=$mysqli->query($gsess);
	$shterm=$qterm->fetch_assoc();
	
	$gtermsess=$shterm['borno_school_session'];
	
	if($gtermsess!="")  {
		
		 $ttmmrk=array_sum($perc);
		 
		 				
					  if($ttmmrk<100) { header('location:manage_term.php?msg=1'); }
					  else if($ttmmrk>100) { header('location:manage_term.php?msg=2'); }
					  else {
					  
					
									for($i=0; $i<count($perc); $i++){
										
										
										
										if($perc[$i]!=""){
										    
											$insmk="UPDATE `borno_result_add_term` SET `borno_result_term_name`='".trim($termName[$i])."',`borno_result_term_percent`='$perc[$i]' where `borno_result_term_id`='$termtype[$i]'";
											 
									
											 $qterm=$mysqli->query($insmk);
										
										} 
									}
										if($qterm) { header('location:manage_term.php?msg=4');} else { header('location:manage_term.php?msg=5');}
										
						  }
	}
	else {header('location:manage_term.php?msg=3');}

		
		
			
 ?>

