<?php
 require_once('result_sett_top.php');
 
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



	$getTechid1="select * from borno_school_voc_routine where borno_school_teacher_id='$teacherid' AND borno_school_session='$stsess' AND borno_school_routine_day='$dayid' AND borno_school_routine_period='$firstp'";
	$qgetTechid1=$mysqli->query($getTechid1);
	$shgetTechid1=$qgetTechid1->fetch_assoc();
	
 if($shgetTechid1['borno_school_routine_period']==""){   
     
 $insroutineinfo1="INSERT INTO `borno_school_voc_routine` (`borno_school_id`, `borno_school_branch_id`, `borno_school_shift_id`, `borno_school_teacher_id`, `borno_school_session`, `borno_school_routine_day`,`borno_school_routine_period`,`borno_school_class_id`,`borno_school_section_id`, `borno_school_subject_id`,`borno_school_routine_time`)
	 VALUES ('$schId','$branchId','$shiftId','$teacherid','$stsess', '$dayid','$firstp','$studClass1','$studSection1','$sub1','$time1')";

					$qinsroutineinfo1=$mysqli->query($insroutineinfo1);
 }					

	$getTechid2="select * from borno_school_voc_routine where borno_school_teacher_id='$teacherid' AND borno_school_session='$stsess' AND borno_school_routine_day='$dayid' AND borno_school_routine_period='$secondp'";
	$qgetTechid2=$mysqli->query($getTechid2);
	$shgetTechid2=$qgetTechid2->fetch_assoc();
	
 if($shgetTechid2['borno_school_routine_period']==""){ 
     
 $insroutineinfo2="INSERT INTO `borno_school_voc_routine` (`borno_school_id`, `borno_school_branch_id`, `borno_school_shift_id`, `borno_school_teacher_id`, `borno_school_session`, `borno_school_routine_day`,`borno_school_routine_period`,`borno_school_class_id`,`borno_school_section_id`, `borno_school_subject_id`,`borno_school_routine_time`)
	 VALUES ('$schId','$branchId','$shiftId','$teacherid','$stsess', '$dayid','$secondp','$studClass2','$studSection2','$sub2','$time2')";

					$qinsroutineinfo2=$mysqli->query($insroutineinfo2);		
 }

    $getTechid3="select * from borno_school_voc_routine where borno_school_teacher_id='$teacherid' AND borno_school_session='$stsess' AND borno_school_routine_day='$dayid' AND borno_school_routine_period='$thirdp'";
	$qgetTechid3=$mysqli->query($getTechid3);
	$shgetTechid3=$qgetTechid3->fetch_assoc();
	
 if($shgetTechid3['borno_school_routine_period']==""){ 
					
 $insroutineinfo3="INSERT INTO `borno_school_voc_routine` (`borno_school_id`, `borno_school_branch_id`, `borno_school_shift_id`, `borno_school_teacher_id`, `borno_school_session`, `borno_school_routine_day`,`borno_school_routine_period`,`borno_school_class_id`,`borno_school_section_id`, `borno_school_subject_id`,`borno_school_routine_time`)
	 VALUES ('$schId','$branchId','$shiftId','$teacherid','$stsess', '$dayid','$thirdp','$studClass3','$studSection3','$sub3','$time3')";
	 
	 		$qinsroutineinfo3=$mysqli->query($insroutineinfo3);	
 }

    $getTechid4="select * from borno_school_voc_routine where borno_school_teacher_id='$teacherid' AND borno_school_session='$stsess' AND borno_school_routine_day='$dayid' AND borno_school_routine_period='$fourthp'";
	$qgetTechid4=$mysqli->query($getTechid4);
	$shgetTechid4=$qgetTechid4->fetch_assoc();
	
 if($shgetTechid4['borno_school_routine_period']==""){ 
     
 $insroutineinfo4="INSERT INTO `borno_school_voc_routine` (`borno_school_id`, `borno_school_branch_id`, `borno_school_shift_id`, `borno_school_teacher_id`, `borno_school_session`, `borno_school_routine_day`,`borno_school_routine_period`,`borno_school_class_id`,`borno_school_section_id`, `borno_school_subject_id`,`borno_school_routine_time`)
	 VALUES ('$schId','$branchId','$shiftId','$teacherid','$stsess', '$dayid','$fourthp','$studClass4','$studSection4','$sub4','$time4')";	 

					$qinsroutineinfo4=$mysqli->query($insroutineinfo4);		
 }
 
     $getTechid5="select * from borno_school_voc_routine where borno_school_teacher_id='$teacherid' AND borno_school_session='$stsess' AND borno_school_routine_day='$dayid' AND borno_school_routine_period='$fifthp'";
	$qgetTechid5=$mysqli->query($getTechid5);
	$shgetTechid5=$qgetTechid5->fetch_assoc();
	
 if($shgetTechid5['borno_school_routine_period']==""){ 
     
 $insroutineinfo5="INSERT INTO `borno_school_voc_routine` (`borno_school_id`, `borno_school_branch_id`, `borno_school_shift_id`, `borno_school_teacher_id`, `borno_school_session`, `borno_school_routine_day`,`borno_school_routine_period`,`borno_school_class_id`,`borno_school_section_id`, `borno_school_subject_id`,`borno_school_routine_time`)
	 VALUES ('$schId','$branchId','$shiftId','$teacherid','$stsess', '$dayid','$fifthp','$studClass5','$studSection5','$sub5','$time5')";	 

					$qinsroutineinfo5=$mysqli->query($insroutineinfo5);		
 }
 
      $getTechid6="select * from borno_school_voc_routine where borno_school_teacher_id='$teacherid' AND borno_school_session='$stsess' AND borno_school_routine_day='$dayid' AND borno_school_routine_period='$sixthp'";
	$qgetTechid6=$mysqli->query($getTechid6);
	$shgetTechid6=$qgetTechid6->fetch_assoc();
	
 if($shgetTechid6['borno_school_routine_period']==""){ 
     
 $insroutineinfo6="INSERT INTO `borno_school_voc_routine` (`borno_school_id`, `borno_school_branch_id`, `borno_school_shift_id`, `borno_school_teacher_id`, `borno_school_session`, `borno_school_routine_day`,`borno_school_routine_period`,`borno_school_class_id`,`borno_school_section_id`, `borno_school_subject_id`,`borno_school_routine_time`)
	 VALUES ('$schId','$branchId','$shiftId','$teacherid','$stsess', '$dayid','$sixthp','$studClass6','$studSection6','$sub6','$time6')";	 

					$qinsroutineinfo6=$mysqli->query($insroutineinfo6);	
 }
 
      $getTechid7="select * from borno_school_voc_routine where borno_school_teacher_id='$teacherid' AND borno_school_session='$stsess' AND borno_school_routine_day='$dayid' AND borno_school_routine_period='$seventhp'";
	$qgetTechid7=$mysqli->query($getTechid7);
	$shgetTechid7=$qgetTechid7->fetch_assoc();
	
 if($shgetTechid7['borno_school_routine_period']==""){ 
     
 $insroutineinfo7="INSERT INTO `borno_school_voc_routine` (`borno_school_id`, `borno_school_branch_id`, `borno_school_shift_id`, `borno_school_teacher_id`, `borno_school_session`, `borno_school_routine_day`,`borno_school_routine_period`,`borno_school_class_id`,`borno_school_section_id`, `borno_school_subject_id`,`borno_school_routine_time`)
	 VALUES ('$schId','$branchId','$shiftId','$teacherid','$stsess', '$dayid','$seventhp','$studClass7','$studSection7','$sub7','$time7')";	 

					$qinsroutineinfo7=$mysqli->query($insroutineinfo7);	
 }
 
    $getTechid8="select * from borno_school_voc_routine where borno_school_teacher_id='$teacherid' AND borno_school_session='$stsess' AND borno_school_routine_day='$dayid' AND borno_school_routine_period='$eighthp'";
	$qgetTechid8=$mysqli->query($getTechid8);
	$shgetTechid8=$qgetTechid8->fetch_assoc();
	
 if($shgetTechid8['borno_school_routine_period']==""){
     
 $insroutineinfo8="INSERT INTO `borno_school_voc_routine` (`borno_school_id`, `borno_school_branch_id`, `borno_school_shift_id`, `borno_school_teacher_id`, `borno_school_session`, `borno_school_routine_day`,`borno_school_routine_period`,`borno_school_class_id`,`borno_school_section_id`, `borno_school_subject_id`,`borno_school_routine_time`)
	 VALUES ('$schId','$branchId','$shiftId','$teacherid','$stsess', '$dayid','$eighthp','$studClass8','$studSection8','$sub8','$time8')";	 

					$qinsroutineinfo8=$mysqli->query($insroutineinfo8);	
 }			
					
		if($qinsroutineinfo1 OR $qinsroutineinfo2 OR $qinsroutineinfo3 OR $qinsroutineinfo4 OR $qinsroutineinfo5 OR $qinsroutineinfo6 OR $qinsroutineinfo7 OR $qinsroutineinfo8) { 
					
					header("location:class_routine_settings.php?msg=1&branchId=$branchId&shiftId=$shiftId&teacherid=$teacherid&stsess=$stsess");
					
					} else
					
					{
						 header('location:class_routine_settings.php?msg=2');
						
						}
	


?>