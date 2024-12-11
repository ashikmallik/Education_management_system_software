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
		

		
	$roll= $_POST['roll'];
	$stdid= $_POST['stdid'];
	$stname= $_POST['stname'];
	$regulation= $_POST['regulation'];
	$patritism= $_POST['patritism'];
	$honesty= $_POST['honesty'];	
	$leadership= $_POST['leadership'];
	$discipline= $_POST['discipline'];
	$cooperation= $_POST['cooperation'];
	$participation= $_POST['participation'];
	$sympathy= $_POST['sympathy'];
	$awareness= $_POST['awareness'];
	$punctuality= $_POST['punctuality'];
		
	for($i=0; $i<count($regulation); $i++){
	if($regulation[$i]!=""){
		
$gsess="select * from borno_school_assesment where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1'  AND borno_student_info_id='$stdid[$i]'  AND borno_school_roll='$roll[$i]'";
 	$qterm=$mysqli->query($gsess);
	$shterm=$qterm->fetch_assoc();
	$gtermsess=$shterm['borno_student_info_id'];

	if($gtermsess=="")
	{ 	
if($regulation[$i]>3){$regulation[$i]=0;}	
if($patritism[$i]>3){$patritism[$i]=0;}
if($honesty[$i]>3){$honesty[$i]=0;}
if($leadership[$i]>3){$leadership[$i]=0;}
if($discipline[$i]>3){$discipline[$i]=0;}
if($cooperation[$i]>3){$cooperation[$i]=0;}
if($participation[$i]>3){$participation[$i]=0;}
if($sympathy[$i]>3){$sympathy[$i]=0;}
if($awareness[$i]>3){$awareness[$i]=0;}
if($punctuality[$i]>3){$punctuality[$i]=0;}	
			
$total=$regulation[$i]+$patritism[$i]+$honesty[$i]+$leadership[$i]+$discipline[$i]+$cooperation[$i]+$participation[$i]+$sympathy[$i]+$awareness[$i]+$punctuality[$i];

if($total>=26 AND $total<=30) {$remarks="Excellent";}
elseif($total>=21 AND $total<=25) {$remarks="Very Good";}
elseif($total>=16 AND $total<=20) {$remarks="Good";}
elseif($total>=10 AND $total<=15) {$remarks="Improvement Needed";}

 $insmk="INSERT INTO `borno_school_assesment` (`borno_school_id`,`borno_school_branch_id`,`borno_school_class_id`,`borno_school_shift_id`,`borno_school_section_id`,`borno_school_session`, `borno_result_term_id`, `borno_student_info_id`,`borno_school_roll`,`borno_school_student_name`,`regulation`,`patritism`,`honesty`,`leadership`,`discipline`,`cooperation`,`participation`,`sympathy`,`awareness`,`punctuality`,`total_mark`,`remarks`)
									 VALUES ('$schId','$branchId1','$studClass1','$shiftId1','$section1','$stsess1', '$selTerm1', '$stdid[$i]','$roll[$i]','$stname[$i]','$regulation[$i]','$patritism[$i]','$honesty[$i]','$leadership[$i]','$discipline[$i]','$cooperation[$i]','$participation[$i]','$sympathy[$i]','$awareness[$i]','$punctuality[$i]','$total','$remarks')";
									
	$qterm=$mysqli->query($insmk);
	}
	}
	}
								
										if($qterm) { header('location:assesment_entry.php?msg=3');} else { header('location:assesment_entry.php?msg=2');}
										
					
	

		
		
			
 ?>

