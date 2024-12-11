<?php
 require_once('student_top.php');
 
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
		
		$nstudClass = clean_html($_POST['nstudClass']);
		$nstudClass1 = strip_tags($_POST['nstudClass']);
		
		$nshiftId = clean_html($_POST['nshiftId']);
		$nshiftId1 = strip_tags($_POST['nshiftId']);
		
		$nsection = clean_html($_POST['nsection']);
		$nsection1 = strip_tags($_POST['nsection']);
		
		$nstsess = clean_html($_POST['nstsess']);
		$nstsess1 = strip_tags($_POST['nstsess']);
		
		   
		   $group = strip_tags($_POST['group']); 
		   $ngroup = strip_tags($_POST['ngroup']); 
	

		
	$roll= $_POST['roll'];
	$stdid= $_POST['stdid'];
	$stname= $_POST['stname'];
	$newroll= $_POST['newroll'];
		
	for($i=0; $i<count($newroll); $i++){
	if($newroll[$i]!=""){
//	    echo $newroll[$i];
	
       
                $gsess="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$nstudClass1' AND borno_school_shift_id='$nshiftId1' AND borno_school_section_id='$nsection1' AND borno_school_session='$nstsess1' AND borno_school_roll='$newroll[$i]'";

 	$qterm=$mysqli->query($gsess);
	$shterm=$qterm->fetch_assoc();
	$gtermsess=$shterm['borno_school_roll'];
	echo $gtermsess." ";
	
	if($gtermsess=="")
	{
 $insmk="UPDATE `borno_student_info` SET `borno_school_class_id`='$nstudClass1',`borno_school_shift_id`='$nshiftId1',`borno_school_section_id`='$nsection1',`borno_school_session`='$nstsess1',`borno_school_roll`='$newroll[$i]' where `borno_student_info_id`='$stdid[$i]'";
	
	
								
	$qterm=$mysqli->query($insmk);
	
// 	if($qterm){
// 	    echo $newroll[$i];
// 	}
	}
	}
	}
	
								
										if($qterm) { header('location:promotion.php?msg=3');} else { header('location:promotion.php?msg=2');}
										
					
	

		
		
			
 ?>

