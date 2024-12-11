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
		
		$selTerm = clean_html($_POST['term']);
		$selTerm1 = strip_tags($_POST['term']);
		
		$attnd = clean_html($_POST['attnd']);
		$attnd1 = strip_tags($_POST['attnd']);
		
	$roll= $_POST['roll'];
	$stdid= $_POST['stdid'];
	$stname= $_POST['stname'];
	$attend= $_POST['attend'];
		
	for($i=0; $i<count($attend); $i++){
	if($attend[$i]!=""){	
	
$gsess="select * from borno_school_schooling_day where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1'";
 	$qterm=$mysqli->query($gsess);
	$shterm=$qterm->fetch_assoc();
	$gtermsess=$shterm['borno_school_schooling_day'];
	
	if($attnd1=="Presence")
	{	
	$absence=$gtermsess-$attend[$i];
	$gtermses1=$absence+$attend[$i];
	if($gtermsess!=$gtermses1){$absence=0;$attend[$i]=0;}
$gsess1="select * from borno_school_attendence where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_roll='$roll[$i]'";
 	$qterm1=$mysqli->query($gsess1);
	$shterm1=$qterm1->fetch_assoc();
	$gtermsess12=$shterm1['borno_school_roll'];	
	if($gtermsess12=="")
	{
$insmk="INSERT INTO `borno_school_attendence` (`borno_school_id`,`borno_school_branch_id`,`borno_school_class_id`,`borno_school_shift_id`,`borno_school_section_id`,`borno_school_session`, `borno_result_term_id`, `borno_student_info_id`,`borno_school_roll`,`borno_school_student_name`,`borno_school_presence`,`borno_school_absence`)
									 VALUES ('$schId','$branchId1','$studClass1','$shiftId1','$section1','$stsess1', '$selTerm1', '$stdid[$i]','$roll[$i]','$stname[$i]','$attend[$i]','$absence')";
									
	$qterm=$mysqli->query($insmk);
	}
	}
	elseif($attnd1=="Absence")
	{	
	$absence=$gtermsess-$attend[$i];
	$gtermses1=$absence+$attend[$i];
	if($gtermsess!=$gtermses1){$absence=0;$attend[$i]=0;}
	
	$gsess1="select * from borno_school_attendence where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_roll='$roll[$i]'";
 	$qterm1=$mysqli->query($gsess1);
	$shterm1=$qterm1->fetch_assoc();
	$gtermsess12=$shterm1['borno_school_roll'];	
	if($gtermsess12=="")
	{
 $insmk="INSERT INTO `borno_school_attendence` (`borno_school_id`,`borno_school_branch_id`,`borno_school_class_id`,`borno_school_shift_id`,`borno_school_section_id`,`borno_school_session`, `borno_result_term_id`, `borno_student_info_id`,`borno_school_roll`,`borno_school_student_name`,`borno_school_presence`,`borno_school_absence`)
									 VALUES ('$schId','$branchId1','$studClass1','$shiftId1','$section1','$stsess1', '$selTerm1', '$stdid[$i]','$roll[$i]','$stname[$i]','$absence','$attend[$i]')";
								
	$qterm=$mysqli->query($insmk);
	}
	}
	}
	}
								
										if($qterm) { header('location:attendence_entry.php?msg=3');} else { header('location:attendence_entry.php?msg=2');}
										
					
	

		
		
			
 ?>

