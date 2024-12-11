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
	$asttdid= $_POST['asttdid'];
		
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
$insmk="UPDATE `borno_school_attendence` SET `borno_school_presence`='$attend[$i]',`borno_school_absence`='$absence' where borno_school_attendence_id='$asttdid[$i]'";
									
	$qterm=$mysqli->query($insmk);
	}
	elseif($attnd1=="Absence")
	{	
	$absence=$gtermsess-$attend[$i];
	$gtermses1=$absence+$attend[$i];
	if($gtermsess!=$gtermses1){$absence=0;$attend[$i]=0;}
 $insmk="UPDATE `borno_school_attendence` SET `borno_school_presence`='$absence',`borno_school_absence`='$attend[$i]' where borno_school_attendence_id='$asttdid[$i]'";
							
	$qterm=$mysqli->query($insmk);

	}
	}
	}
								
										if($qterm) { header('location:manage_attendence_entry.php?msg=3');} else { header('location:manage_attendence_entry.php?msg=2');}
										
					
	

		
		
			
 ?>

