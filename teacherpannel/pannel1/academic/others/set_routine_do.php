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
		$branchId = strip_tags($_POST['branchId']);
										
		$shiftId1 = clean_html($_POST['shiftId']);
		$shiftId = strip_tags($_POST['shiftId']);
		
		$teacherid1 = clean_html($_POST['teacherid']);
		$teacherid = strip_tags($_POST['teacherid']);
		
		$stsess1 = clean_html($_POST['stsess']);
		$stsess = strip_tags($_POST['stsess']);
		
		$dayid1 = clean_html($_POST['dayid']);
		$dayid = strip_tags($_POST['dayid']);

		$firstp1 = clean_html($_POST['firstp']);
		$firstp = strip_tags($_POST['firstp']);
						
		$secondp1 = clean_html($_POST['secondp']);
		$secondp = strip_tags($_POST['secondp']);
											
		$thirdp1 = clean_html($_POST['thirdp']);
		$thirdp = strip_tags($_POST['thirdp']);
		
		$fourthp1 = clean_html($_POST['fourthp']);
		$fourthp = strip_tags($_POST['fourthp']);
		
		$fifthp1 = clean_html($_POST['fifthp']);
		$fifthp = strip_tags($_POST['fifthp']);
		
		$sixthp1 = clean_html($_POST['sixthp']);
		$sixthp = strip_tags($_POST['sixthp']);

		$seventhp1 = clean_html($_POST['seventhp']);
		$seventhp = strip_tags($_POST['seventhp']);
		
		$eighthp1 = clean_html($_POST['eighthp']);
		$eighthp = strip_tags($_POST['eighthp']);
		
		$studClass11 = clean_html($_POST['studClass1']);
		$studClass1 = strip_tags($_POST['studClass1']);

		$studClass21 = clean_html($_POST['studClass2']);
		$studClass2 = strip_tags($_POST['studClass2']);
						
		$studClass31 = clean_html($_POST['studClass3']);
		$studClass3 = strip_tags($_POST['studClass3']);
											
		$studClass41 = clean_html($_POST['studClass4']);
		$studClass4 = strip_tags($_POST['studClass4']);
		
		$studClass51 = clean_html($_POST['studClass5']);
		$studClass5 = strip_tags($_POST['studClass5']);
		
		$studClass61 = clean_html($_POST['studClass6']);
		$studClass6 = strip_tags($_POST['studClass6']);
		
		$studClass71 = clean_html($_POST['studClass7']);
		$studClass7 = strip_tags($_POST['studClass7']);

		$studClass81 = clean_html($_POST['studClass8']);
		$studClass8 = strip_tags($_POST['studClass8']);

		$studSection11 = clean_html($_POST['studSection1']);
		$studSection1 = strip_tags($_POST['studSection1']);

		$studSection21 = clean_html($_POST['studSection2']);
		$studSection2 = strip_tags($_POST['studSection2']);
						
		$studSection31 = clean_html($_POST['studSection3']);
		$studSection3 = strip_tags($_POST['studSection3']);
											
		$studSection41 = clean_html($_POST['studSection4']);
		$studSection4 = strip_tags($_POST['studSection4']);
		
		$studSection51 = clean_html($_POST['studSection5']);
		$studSection5 = strip_tags($_POST['studSection5']);
		
		$studSection61 = clean_html($_POST['studSection6']);
		$studSection6 = strip_tags($_POST['studSection6']);
		
		$studSection71 = clean_html($_POST['studSection7']);
		$studSection7 = strip_tags($_POST['studSection7']);

		$studSection81 = clean_html($_POST['studSection8']);
		$studSection8 = strip_tags($_POST['studSection8']);
		
		$sub11 = clean_html($_POST['sub1']);
		$sub1 = strip_tags($_POST['sub1']);

		$sub21 = clean_html($_POST['sub2']);
		$sub2 = strip_tags($_POST['sub2']);
						
		$sub31 = clean_html($_POST['sub3']);
		$sub3 = strip_tags($_POST['sub3']);
											
		$sub41 = clean_html($_POST['sub4']);
		$sub4 = strip_tags($_POST['sub4']);
		
		$sub51 = clean_html($_POST['sub5']);
		$sub5 = strip_tags($_POST['sub5']);
		
		$sub61 = clean_html($_POST['sub6']);
		$sub6 = strip_tags($_POST['sub6']);
		
		$sub71 = clean_html($_POST['sub7']);
		$sub7 = strip_tags($_POST['sub7']);

		$sub81 = clean_html($_POST['sub8']);
		$sub8 = strip_tags($_POST['sub8']);

		$time11 = clean_html($_POST['time1']);
		$time1 = strip_tags($_POST['time1']);

		$time21 = clean_html($_POST['time2']);
		$time2 = strip_tags($_POST['time2']);
						
		$time31 = clean_html($_POST['time3']);
		$time3 = strip_tags($_POST['time3']);
											
		$time41 = clean_html($_POST['time4']);
		$time4 = strip_tags($_POST['time4']);
		
		$time51 = clean_html($_POST['time5']);
		$time5 = strip_tags($_POST['time5']);
		
		$time61 = clean_html($_POST['time6']);
		$time6 = strip_tags($_POST['time6']);
		
		$time71 = clean_html($_POST['time7']);
		$time7 = strip_tags($_POST['time7']);

		$time81 = clean_html($_POST['time8']);
		$time8 = strip_tags($_POST['time8']);



	$getTechid="select * from borno_school_class_routine where borno_school_routine_teacher_name='$teacherid' AND borno_school_routine_session='$stsess' AND borno_school_routine_day='$dayid'";
	$qgetTechid=$mysqli->query($getTechid);
	$shgetTechid=$qgetTechid->fetch_assoc();
	
	if($shgetTechid['borno_school_routine_teacher_name']!=""){
		
		header("location:class_routine_settings.php?msg=3");
		
		} else {



 $insroutineinfo="INSERT INTO `borno_school_class_routine` (`borno_school_id`, `borno_school_routine_branch_id`, `borno_school_routine_shift_id`, `borno_school_routine_teacher_name`, `borno_school_routine_session`, `borno_school_routine_day`,`borno_school_routine_firstp`,`borno_school_routine_secondp`,`borno_school_routine_thirdp`, `borno_school_routine_fourthp`,`borno_school_routine_fifthp`, `borno_school_routine_sixthp`,`borno_school_routine_seventhp`, `borno_school_routine_eighthp`, `borno_school_routine_studClass1`,`borno_school_routine_studClass2`,`borno_school_routine_studClass3`, `borno_school_routine_studClass4`, `borno_school_routine_studClass5`, `borno_school_routine_studClass6`, `borno_school_routine_studClass7`,`borno_school_routine_studClass8`,`borno_school_routine_studSection1`,`borno_school_routine_studSection2`,`borno_school_routine_studSection3`,`borno_school_routine_studSection4`,`borno_school_routine_studSection5`,`borno_school_routine_studSection6`,`borno_school_routine_studSection7`,`borno_school_routine_studSection8`,`borno_school_routine_sub1`,`borno_school_routine_sub2`,`borno_school_routine_sub3`,`borno_school_routine_sub4`,`borno_school_routine_sub5`,`borno_school_routine_sub6`,`borno_school_routine_sub7`,`borno_school_routine_sub8`,`borno_school_routine_time1`,`borno_school_routine_time2`,`borno_school_routine_time3`,`borno_school_routine_time4`,`borno_school_routine_time5`,`borno_school_routine_time6`,`borno_school_routine_time7`,`borno_school_routine_time8`)
	
	
	
	
	 VALUES (
	 
							'$schId',
							'$branchId',
							'$shiftId',
							'$teacherid', 
							'$stsess', 
							'$dayid', 
							'$firstp',
							'$secondp',
							'$thirdp',							
							'$fourthp',
							'$fifthp',
							'$sixthp',
							'$seventhp',
							'$eighthp',
							'$studClass1',
							'$studClass2',
							'$studClass3',
							'$studClass4', 
							'$studClass5',
							'$studClass6',
							'$studClass7',
							'$studClass8',
							'$studSection1',
							'$studSection2',
							'$studSection3',
							'$studSection4', 
							'$studSection5',
							'$studSection6',
							'$studSection7',
							'$studSection8',
							'$sub1',
							'$sub2',
							'$sub3',
							'$sub4', 
							'$sub5',
							'$sub6',
							'$sub7',
							'$sub8',
							'$time1',
							'$time2',
							'$time3',
							'$time4', 
							'$time5',
							'$time6',
							'$time7',
							'$time8'
				   )";



					$qinsroutineinfo=$mysqli->query($insroutineinfo);
					
					if($qinsroutineinfo) { 
					
					header("location:class_routine_settings.php?msg=1");
					
					} else
					
					{
						 header('location:class_routine_settings.php?msg=2');
						
						}
	}


?>