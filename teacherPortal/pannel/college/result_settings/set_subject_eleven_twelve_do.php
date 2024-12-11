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
				
$studId=$_POST['studId'];
$stuName=$_POST['stuName'];
$studroll=$_POST['studroll'];

$firstsub=$_POST['firstsub'];
$secondsub=$_POST['secondsub'];
$thirdsub=$_POST['thirdsub'];
$fourthsub=$_POST['fourthsub'];


			
									for($i=0; $i<count($studId); $i++){
									
										
										
	if($firstsub[$i]!="" OR $secondsub[$i]!="" OR $thirdsub[$i]!="" OR $fourthsub[$i]!=""){
											
											if($thirdsub[$i]!=$fourthsub[$i]){
												
				echo $gsess="select * from borno_set_subject_eleven_twelve where  borno_student_info_id='$studId[$i]'";
	
 	$qterm=$mysqli->query($gsess);
	$shterm=$qterm->fetch_assoc();
	
	 $gtermid=$shterm['borno_student_info_id'];
	
	if($gtermid!="") { header('location:set_subject_eleven_twelve.php?msg=3'); } else {
												
	$firstsub1=$firstsub[$i]+1;
	$secondsub1=$secondsub[$i]+1;
	$thirdsub1=$thirdsub[$i]+1;
	$fourthsub1=$fourthsub[$i]+1;
	
	$inssub="INSERT INTO `borno_set_subject_eleven_twelve` (`borno_school_id`,`borno_school_branch_id`, `borno_school_class_id`,`borno_school_shift_id`,`borno_school_section_id`, `borno_school_session`, `borno_subject_eleven_twelve_dept`, `borno_student_info_id`,`borno_school_roll`,`borno_school_student_name`,`borno_school_subject_1st`,`borno_school_subject_2nd`,`borno_school_subject_3rd`,`borno_school_subject_4th`,`borno_school_subject_5th`,`borno_school_subject_6th`,`borno_school_subject_7th`,`borno_school_subject_8th`,`borno_school_subject_9th`,`borno_school_subject_10th`,`borno_school_subject_11th`,`borno_school_subject_12th`,`borno_school_subject_13th`,`borno_school_subject_id`) 
	
	
	VALUES ('$schId','$branchId1', '$studClass1','$shiftId1','$section1', '$stsess1', '$dept1','$studId[$i]','$studroll[$i]','$stuName[$i]','1','2','3','4','5','$firstsub[$i]','$firstsub1','$secondsub[$i]','$secondsub1','$thirdsub[$i]','$thirdsub1','$fourthsub[$i]','$fourthsub1','0')";
	
											 
						
											 $qterm=$mysqli->query($inssub);
											
										if($qterm) { header('location:set_subject_eleven_twelve.php?msg=1');} else { header('location:set_subject_eleven_twelve.php?msg=2');}
										
						  
}
										} 
									}
									}
		
		
			
 ?>

