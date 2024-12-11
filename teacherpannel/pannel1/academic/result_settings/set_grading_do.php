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
	
							
		$studClass = clean_html($_POST['studClass']);
		$studClass1 = trim(strip_tags($_POST['studClass']));
		
		$stsess = clean_html($_POST['stsess']);
		$stsess1 = trim(strip_tags($_POST['stsess']));
		
		$mrkfrom1 = clean_html($_POST['mrkfrom1']);
		$mrkfrom11 = strip_tags($_POST['mrkfrom1']);
		
		$mrkto1 = clean_html($_POST['mrkto1']);
		$mrkto11 = strip_tags($_POST['mrkto1']);
			
		$lg1 = clean_html($_POST['lg1']);
		$lg11 = strip_tags($_POST['lg1']);
		
		$gpa1 = clean_html($_POST['gpa1']);
		$gpa11 = strip_tags($_POST['gpa1']);
		
		$mrkfrom2 = clean_html($_POST['mrkfrom2']);
		$mrkfrom21 = strip_tags($_POST['mrkfrom2']);
		
		$mrkto2 = clean_html($_POST['mrkto2']);
		$mrkto21 = strip_tags($_POST['mrkto2']);
			
		$lg2 = clean_html($_POST['lg2']);
		$lg21 = strip_tags($_POST['lg2']);
		
		$gpa2 = clean_html($_POST['gpa2']);
		$gpa21 = strip_tags($_POST['gpa2']);
		
		$mrkfrom3 = clean_html($_POST['mrkfrom3']);
		$mrkfrom31 = strip_tags($_POST['mrkfrom3']);
		
		$mrkto3 = clean_html($_POST['mrkto3']);
		$mrkto31 = strip_tags($_POST['mrkto3']);
			
		$lg3 = clean_html($_POST['lg3']);
		$lg31 = strip_tags($_POST['lg3']);
		
		$gpa3 = clean_html($_POST['gpa3']);
		$gpa31 = strip_tags($_POST['gpa3']);
		
		$mrkfrom4 = clean_html($_POST['mrkfrom4']);
		$mrkfrom41 = strip_tags($_POST['mrkfrom4']);
		
		$mrkto4 = clean_html($_POST['mrkto4']);
		$mrkto41 = strip_tags($_POST['mrkto4']);
			
		$lg4 = clean_html($_POST['lg4']);
		$lg41 = strip_tags($_POST['lg4']);
		
		$gpa4 = clean_html($_POST['gpa4']);
		$gpa41 = strip_tags($_POST['gpa4']);
		
		$mrkfrom5 = clean_html($_POST['mrkfrom5']);
		$mrkfrom51 = strip_tags($_POST['mrkfrom5']);
		
		$mrkto5 = clean_html($_POST['mrkto5']);
		$mrkto51 = strip_tags($_POST['mrkto5']);
			
		$lg5 = clean_html($_POST['lg5']);
		$lg51 = strip_tags($_POST['lg5']);
		
		$gpa5 = clean_html($_POST['gpa5']);
		$gpa51 = strip_tags($_POST['gpa5']);
		
		$mrkfrom6 = clean_html($_POST['mrkfrom6']);
		$mrkfrom61 = strip_tags($_POST['mrkfrom6']);
		
		$mrkto6 = clean_html($_POST['mrkto6']);
		$mrkto61 = strip_tags($_POST['mrkto6']);
			
		$lg6 = clean_html($_POST['lg6']);
		$lg61 = strip_tags($_POST['lg6']);
		
		$gpa6 = clean_html($_POST['gpa6']);
		$gpa61 = strip_tags($_POST['gpa6']);
		
		$mrkfrom7 = clean_html($_POST['mrkfrom7']);
		$mrkfrom71 = strip_tags($_POST['mrkfrom7']);
		
		$mrkto7 = clean_html($_POST['mrkto7']);
		$mrkto71 = strip_tags($_POST['mrkto7']);
			
		$lg7 = clean_html($_POST['lg7']);
		$lg71 = strip_tags($_POST['lg7']);
		
		$gpa7 = clean_html($_POST['gpa7']);
		$gpa71 = strip_tags($_POST['gpa7']);
		
	$branch="select * from `borno_grading_chart` where `borno_school_id`='$schId' AND `borno_school_class_id`='$studClass1' AND `borno_school_session`='$stsess1'";


	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	
	$gectclassid=$smsbranch['borno_school_class_id'];
		
		if($gectclassid!=""){
				header("location:set_grading.php?msg=3");
		}
			else
			{
		
	 $bornoschBranch="INSERT INTO `borno_grading_chart` (`borno_school_id`, `borno_school_class_id`,`borno_school_session`,`marks_from1`,`marks_to1`, `letter_grade1`, `grade_point1`,`marks_from2`,`marks_to2`, `letter_grade2`, `grade_point2`,`marks_from3`,`marks_to3`, `letter_grade3`, `grade_point3`,`marks_from4`,`marks_to4`, `letter_grade4`, `grade_point4`,`marks_from5`,`marks_to5`, `letter_grade5`, `grade_point5`,`marks_from6`,`marks_to6`, `letter_grade6`, `grade_point6`,`marks_from7`,`marks_to7`, `letter_grade7`, `grade_point7`)
											
															VALUES ('$schId','$studClass1', '$stsess1','$mrkfrom11','$mrkto11','$lg11','$gpa11','$mrkfrom21','$mrkto21','$lg21','$gpa21','$mrkfrom31','$mrkto31','$lg31','$gpa31','$mrkfrom41','$mrkto41','$lg41','$gpa41','$mrkfrom51','$mrkto51','$lg51','$gpa51','$mrkfrom61','$mrkto61','$lg61','$gpa61','$mrkfrom71','$mrkto71','$lg71','$gpa71')";
														
												
				$qbornoschBranch = $mysqli->prepare($bornoschBranch);
				$qbornoschBranch->execute();
				
				if($qbornoschBranch) { header('location:set_grading.php?msg=1'); } else { header('location:set_grading.php?msg=2'); }	
		
		
			


				
			}
 
 ?>

