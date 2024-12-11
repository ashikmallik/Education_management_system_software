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
	
		 $branchId1 = clean_html($_POST['branchId']);
		$branchId = trim(strip_tags($_POST['branchId']));
										
		$examtype1 = clean_html($_POST['examtype']);
		$examtype = strip_tags($_POST['examtype']);
		
		$exyear1 = clean_html($_POST['exyear']);
		$exyear = trim(strip_tags($_POST['exyear']));
		
		$studClass1 = clean_html($_POST['studClass']);
		$studClass = trim(strip_tags($_POST['studClass']));
		
		$subject1 = clean_html($_POST['subject']);
		$subject = strip_tags($_POST['subject']);

		$dayid1 = clean_html($_POST['dayid']);
		$dayid = strip_tags($_POST['dayid']);
						
		$date1 = clean_html($_POST['datepicker']);
		$date = strip_tags($_POST['datepicker']);
											
		$timefrom1 = clean_html($_POST['timefrom']);
		$timefrom = trim(strip_tags($_POST['timefrom']));
		
		$timeto1 = clean_html($_POST['timeto']);
		$timeto = trim(strip_tags($_POST['timeto']));

	


		$getclass = "select * from borno_school_exam_routine where borno_school_id='$schId' and borno_school_branch_id='$branchId' AND borno_exam_term_name='$examtype' AND borno_exam_term_year='$exyear' AND borno_school_exam_routine_class='$studClass'  AND borno_school_exam_routine_date='$date' ";
		
		$qgetclass=$mysqli->query($getclass);
		$shgetclass=$qgetclass->fetch_assoc();
		
		$examclasss=$shgetclass['borno_school_exam_routine_class'];
		
		if($examclasss==$studClass){
					 header('location:exam_routine_settings.php?msg=3');
			
			} else {


  $insexamroutine="INSERT INTO `borno_school_exam_routine` (`borno_school_id`, `borno_school_branch_id`, `borno_exam_term_name`,`borno_exam_term_year`, `borno_school_exam_routine_class`,`borno_school_exam_routine_subject`,`borno_school_exam_routine_day`,`borno_school_exam_routine_date`,`borno_school_exam_routine_time_from`,`borno_school_exam_routine_time_to`)

 
 
 		VALUES ('$schId','$branchId','$examtype','$exyear', '$studClass', '$subject','$dayid','$date','$timefrom','$timeto')";
		
		
							  
		$qinsexamroutine=$mysqli->query($insexamroutine);							  
			}
			
 if($qinsexamroutine) {
  header('location:exam_routine_settings.php?msg=1');
  
   } else 
   
    header('location:exam_routine_settings.php?msg=2');
	
			

?>