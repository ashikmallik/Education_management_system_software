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
	
							
		$branchId = clean_html($_POST['branchId']);
		$branchId1 = strip_tags($_POST['branchId']);
		
		$studClass = clean_html($_POST['studClass']);
		$studClass1 = strip_tags($_POST['studClass']);
		
		$shiftId = clean_html($_POST['shiftId']);
		$shiftId1 = strip_tags($_POST['shiftId']);
		
		$section = clean_html($_POST['section']);
		$section1 = strip_tags($_POST['section']);
		
		$stsess = clean_html($_POST['stsess']);
		$stsess1 = strip_tags($_POST['stsess']);
		
		$dept = clean_html($_POST['dept']);
		$dept1 = strip_tags($_POST['dept']);
		
	$roll= $_POST['roll'];
	$stdid= $_POST['stdid'];
	$name= $_POST['name'];
	$sub3rd= $_POST['sub3rd'];
	$sub4th= $_POST['sub4th'];


					
									for($i=0; $i<count($stdid); $i++){
										
										
										
										if($sub3rd[$i]!=""){
											
											if($sub3rd[$i]!=$sub4th[$i]){
												
				
												
												
								 $insmk="Update `borno_set_subject_nine_ten` SET `borno_subject_nine_ten_13sub`='$sub3rd[$i]', `borno_subject_nine_ten_4thsub`='$sub4th[$i]' where borno_student_info_id='$stdid[$i]'"; 
											 
						
											 $qterm=$mysqli->query($insmk);
											
									if($qterm) { header('location:manage_3rd_4th_subject.php?msg=1');} else { header('location:manage_3rd_4th_subject.php?msg=2');}
										
						  
}
										} 
									}
									
		
		
			
 ?>

