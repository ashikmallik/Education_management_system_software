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
		
		$selTerm = clean_html($_POST['selTerm']);
		$selTerm1 = strip_tags($_POST['selTerm']);
		
		$trade = clean_html($_POST['trade']);
		$trade1 = strip_tags($_POST['trade']);
	
	
//---------------- Grading  ---------------------------------------------------	
	
$getgrdpoint="select * from borno_grading_chart_voc where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1'";
		$qgetgrdpoint=$mysqli->query($getgrdpoint);
		$shgetgrdpoint=$qgetgrdpoint->fetch_assoc();
		
	
		$gtlettergrd1=$shgetgrdpoint['letter_grade1'];
		$gtlettergrd2=$shgetgrdpoint['letter_grade2'];
		$gtlettergrd3=$shgetgrdpoint['letter_grade3'];
		$gtlettergrd4=$shgetgrdpoint['letter_grade4'];
		$gtlettergrd5=$shgetgrdpoint['letter_grade5'];
		$gtlettergrd6=$shgetgrdpoint['letter_grade6'];
		$gtlettergrd7=$shgetgrdpoint['letter_grade7'];
		
		
		$gtgrtpoint1=$shgetgrdpoint['grade_point1'];
		$gtgrtpoint2=$shgetgrdpoint['grade_point2'];
		$gtgrtpoint3=$shgetgrdpoint['grade_point3'];
		$gtgrtpoint4=$shgetgrdpoint['grade_point4'];
		$gtgrtpoint5=$shgetgrdpoint['grade_point5'];
		$gtgrtpoint6=$shgetgrdpoint['grade_point6'];
		$gtgrtpoint7=$shgetgrdpoint['grade_point7'];	
		
//---------------- Grading  ---------------------------------------------------		
//------------------------------------Nine To Ten GrandTotal GPA Set-------------------

$gettotlsub="select * from borno_result_subject_details_voc where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_trade='$trade1' AND borno_result_term_id='$selTerm1' AND sub4th=0 AND uncountable=0";
 	 $qgettotlsub=$mysqli->query($gettotlsub);	 
	$getmotsub1=mysqli_num_rows($qgettotlsub);
	 
	$getmotsub=$getmotsub1;
	
	$delinfo="delete from borno_school_9_10voc_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_trade='$trade1' AND borno_result_term_id='$selTerm1'";
	
	$mysqli->query($delinfo);

$gtctmarg1="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_school_stud_group='$trade1' Order by borno_student_info_id";
  
  
  
    $qgtctmarg1=$mysqli->query($gtctmarg1);
	while($shgtctmarg1=$qgtctmarg1->fetch_assoc()){
		
		$totalmark = 0;
		$totalconvartmark = array();
		
		$totalgpa=0;
		$gtgap= array();
		
		
		$studinfoId1=$shgtctmarg1['borno_student_info_id']; 
		

		$gtctmarg="select * from borno_class9_10voc_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_school_stud_group='$trade1' AND borno_result_term_id='$selTerm1' AND borno_student_info_id='$studinfoId1' AND stu4thsub=0 AND uncountable=0";
  
	
    $qgtctmarg=$mysqli->query($gtctmarg);
	$totalsubject=mysqli_num_rows($qgtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){

		$studinfoId = $shgtctmarg['borno_student_info_id']; 
		$studName = $shgtctmarg['borno_school_student_name']; 
		$studRoll = $shgtctmarg['borno_school_roll']; 
		
		//=============================================== 4th Subject ===================================
    	$get4thsubmrk="select * from borno_class9_10voc_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_school_stud_group='$trade1' AND borno_result_term_id='$selTerm1' AND borno_student_info_id='$studinfoId1' AND stu4thsub=1 AND uncountable=0";
		
		$qget4thsubmrk=$mysqli->query($get4thsubmrk);
		$shget4thsubmrk=$qget4thsubmrk->fetch_assoc();
		
		$gtforthsubMark=$shget4thsubmrk['res_total_conv'];
		$gtforthsubGPA=$shget4thsubmrk['res_gpa'];
		
		if($gtforthsubMark<=40) { $sofsubtot=0;  } else { $sofsubtot=($gtforthsubMark-40); }
		if($gtforthsubGPA<=2) { $gtfinalgpa=0;  } else { $gtfinalgpa=($gtforthsubGPA-2); }
        		
//============================================== End ===================================================	
	
		$totalconvartmark[] = $shgtctmarg['res_total_conv'];
		$gtgap[] = $shgtctmarg['res_gpa'];

	  
	   $totalmark1 = array_sum($totalconvartmark); 
	   
	   $totalmark=number_format($totalmark1+$sofsubtot);
	   $totalmark3=number_format($totalmark1);
	   
	   
	   $totalgpa1 = array_sum($gtgap);
	   
	   $gttotalgpa=($totalgpa1+$gtfinalgpa)/$totalsubject;
	    $gttotalgpa1=$totalgpa1/$totalsubject;
		
	   if($gttotalgpa>5) { $totalgpa=5; } else { $totalgpa=$gttotalgpa; } 
	   if(in_array(0,$gtgap)) { $gtFinalGPA=0; $gtFinalGPA1=0; }
	   else if($getmotsub!=$totalsubject) { $gtFinalGPA=0; $gtFinalGPA1=0;}
	   else { $gtFinalGPA=$totalgpa; $gtFinalGPA1=$gttotalgpa1;}
		 
}

	if($gtFinalGPA==$gtgrtpoint1){$finallg=$gtlettergrd1;}
	elseif($gtFinalGPA>=$gtgrtpoint2 AND $gtFinalGPA<$gtgrtpoint1){$finallg=$gtlettergrd2;}
	elseif($gtFinalGPA>=$gtgrtpoint3 AND $gtFinalGPA<$gtgrtpoint2){$finallg=$gtlettergrd3;}
	elseif($gtFinalGPA>=$gtgrtpoint4 AND $gtFinalGPA<$gtgrtpoint3){$finallg=$gtlettergrd4;}
	elseif($gtFinalGPA>=$gtgrtpoint5 AND $gtFinalGPA<$gtgrtpoint4){$finallg=$gtlettergrd5;}
	elseif($gtFinalGPA>=$gtgrtpoint6 AND $gtFinalGPA<$gtgrtpoint5){$finallg=$gtlettergrd6;}
	elseif($gtFinalGPA>=$gtgrtpoint7 AND $gtFinalGPA<$gtgrtpoint6){$finallg=$gtlettergrd7;}	

	$insfmark="INSERT INTO `borno_school_9_10voc_merit` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`,`borno_school_stud_group`, `borno_result_term_id`, `borno_student_info_id`, `borno_school_roll`, `borno_school_student_name`, `grandtotal`,`grandtotal1`, `gpa`,`gpa1`, `finallg`, `meritno_class`, `merit_class`, `meritno_shift`, `merit_shift`, `meritno_section`, `merit_section`, `failno`, `fail_subject`) 
	
	VALUES ('$schId', '$branchId1', '$studClass1', '$shiftId1', '$section1', '$stsess1','$trade1', '$selTerm1', '$studinfoId', '$studRoll', '$studName', '$totalmark','$totalmark3', '$gtFinalGPA','$gtFinalGPA1', '$finallg', '', '', '', '', '', '', '', '')";
		
		
 	$qins=$mysqli->query($insfmark);

 		}





//======================================Merit Section========================================

	$delinfo1="delete from borno_merit_no where empty='0'";
	$mysqli->query($delinfo1);

	$delinfo2="delete from borno_gpa where empty='0'";
	$mysqli->query($delinfo2);


 $gtctmarg="select * from borno_school_9_10voc_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$trade1' AND gpa!=0 group by gpa, grandtotal";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
		
		
		
		$studinfoId=$shgtctmarg['grandtotal']; 
		
	$styGPA=$shgtctmarg['gpa'];
		
	
		
	
$insfmark="INSERT INTO `borno_merit_no` (`gpa`, `grandtotal`, `meritno`)
		
		
		 VALUES ('$styGPA', '$studinfoId', '0')";
		
		
 $qins=$mysqli->query($insfmark);
 

}

$meritno2="select * from borno_merit_no group by gpa"; 
$qmeritno2=$mysqli->query($meritno2);
	while($sqmeritno2=$qmeritno2->fetch_assoc()){ 		
		
	 				
$styGPA2=$sqmeritno2['gpa'];
$insfmark2="INSERT INTO `borno_gpa` (`gpa`)
		
		
		 VALUES ('$styGPA2')";
		
		
 $qins2=$mysqli->query($insfmark2);
 

}
	
	$meritno="select * from borno_gpa order by gpa desc"; 
    $qmeritno=$mysqli->query($meritno);
	$sl=0;	
	while($shqmeritno=$qmeritno->fetch_assoc()){ 
	$styGPA1=$shqmeritno['gpa'];	
		
		
	
	$meritno5="select * from borno_merit_no where gpa='$styGPA1' order by grandtotal desc"; 
	
    $qmeritno5=$mysqli->query($meritno5);
	
	while($shqmeritno5=$qmeritno5->fetch_assoc()){ 	$sl++;
	

	$studin=$shqmeritno5['grandtotal']; 

	

  $insfmark1="UPDATE borno_merit_no SET meritno='$sl' where gpa='$styGPA1' AND grandtotal='$studin'";
		
		
 $qins=$mysqli->query($insfmark1);
	}
}

$meritno1="select * from borno_merit_no order by meritno"; 

    $qmeritno1=$mysqli->query($meritno1);
	while($sqqqmeritno1=$qmeritno1->fetch_assoc()){ 
	
		
		
    $mno=$sqqqmeritno1['meritno'];
	 $styGPA11=$sqqqmeritno1['gpa'];
	 $studin1=$sqqqmeritno1['grandtotal']; 

	

 $insfmark11="UPDATE borno_school_9_10voc_merit SET meritno_section='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND  borno_school_stud_group='$trade1' AND gpa='$styGPA11' AND grandtotal='$studin1'";
		
		
 $qins=$mysqli->query($insfmark11);

		}
		
	$gtcmerit="select * from borno_merit_position order by number";
	$qgtcmerit=$mysqli->query($gtcmerit);
	while($shqgtcmerit=$qgtcmerit->fetch_assoc()){
	
	$number=$shqgtcmerit['number'];
	$positionlist=$shqgtcmerit['positionlist'];

	$gtctmarg="select * from borno_school_9_10voc_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_school_stud_group='$trade1' AND borno_result_term_id='$selTerm1' order by meritno_section asc";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
	
		
		
  		$studinfoId=$shgtctmarg['borno_student_info_id']; 
	    $meritno=$shgtctmarg['meritno_section']; 
		
			if($meritno==$number) {

	
		
	$insfmark111="UPDATE borno_school_9_10voc_merit SET merit_section='$positionlist' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$trade1' AND borno_student_info_id='$studinfoId'";
		
		
 $qins=$mysqli->query($insfmark111);

 
 } 
}
}

//======================================Merit Section========================================


//======================================Merit Shift========================================

	$delinfo1="delete from borno_merit_no where empty='0'";
	$mysqli->query($delinfo1);

	$delinfo2="delete from borno_gpa where empty='0'";
	$mysqli->query($delinfo2);



 $gtctmarg="select * from borno_school_9_10voc_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$trade1' AND gpa!=0 group by gpa, grandtotal";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
		
		
		
		$studinfoId=$shgtctmarg['grandtotal']; 
		
	$styGPA=$shgtctmarg['gpa'];
		
	
		
	
$insfmark="INSERT INTO `borno_merit_no` (`gpa`, `grandtotal`, `meritno`)
		
		
		 VALUES ('$styGPA', '$studinfoId', '0')";
		
		
 $qins=$mysqli->query($insfmark);
 

}


		
		
$meritno2="select * from borno_merit_no group by gpa"; 
$qmeritno2=$mysqli->query($meritno2);
	while($sqmeritno2=$qmeritno2->fetch_assoc()){ 		
		
	 				
$styGPA2=$sqmeritno2['gpa'];
$insfmark2="INSERT INTO `borno_gpa` (`gpa`)
		
		
		 VALUES ('$styGPA2')";
		
		
 $qins2=$mysqli->query($insfmark2);
 

}
	
	$meritno="select * from borno_gpa order by gpa desc"; 
    $qmeritno=$mysqli->query($meritno);
	$sl=0;	
	while($shqmeritno=$qmeritno->fetch_assoc()){ 
	$styGPA1=$shqmeritno['gpa'];	
		
		
	
	$meritno5="select * from borno_merit_no where gpa='$styGPA1' order by grandtotal desc"; 
	
    $qmeritno5=$mysqli->query($meritno5);
	
	while($shqmeritno5=$qmeritno5->fetch_assoc()){ 	$sl++;
	

	$studin=$shqmeritno5['grandtotal']; 

	

  $insfmark1="UPDATE borno_merit_no SET meritno='$sl' where gpa='$styGPA1' AND grandtotal='$studin'";
		
		
 $qins=$mysqli->query($insfmark1);
	}
}

$meritno1="select * from borno_merit_no order by meritno"; 

    $qmeritno1=$mysqli->query($meritno1);
	while($sqqqmeritno1=$qmeritno1->fetch_assoc()){ 
	
		
		
    $mno=$sqqqmeritno1['meritno'];
	 $styGPA11=$sqqqmeritno1['gpa'];
	 $studin1=$sqqqmeritno1['grandtotal']; 

	

 $insfmark11="UPDATE borno_school_9_10voc_merit SET meritno_shift='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$trade1' AND gpa='$styGPA11' AND grandtotal='$studin1'";
		
		
 $qins=$mysqli->query($insfmark11);

		}
		
	$gtcmerit="select * from borno_merit_position order by number";
	$qgtcmerit=$mysqli->query($gtcmerit);
	while($shqgtcmerit=$qgtcmerit->fetch_assoc()){
	
	$number=$shqgtcmerit['number'];
	$positionlist=$shqgtcmerit['positionlist'];

	$gtctmarg="select * from borno_school_9_10voc_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$trade1' order by meritno_shift asc";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
	
		
		
  		$studinfoId=$shgtctmarg['borno_student_info_id']; 
	    $meritno=$shgtctmarg['meritno_shift']; 
		
			if($meritno==$number) {

	
		
	$insfmark111="UPDATE borno_school_9_10voc_merit SET merit_shift='$positionlist' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$trade1' AND borno_student_info_id='$studinfoId'";
		
		
 $qins=$mysqli->query($insfmark111);
 
 } 
}
}

//======================================Merit Shift========================================

//======================================Merit Class========================================

	$delinfo1="delete from borno_merit_no where empty='0'";
	$mysqli->query($delinfo1);

	$delinfo2="delete from borno_gpa where empty='0'";
	$mysqli->query($delinfo2);

 $gtctmarg="select * from borno_school_9_10voc_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$trade1' AND gpa!=0 group by gpa, grandtotal";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
		
		
		
		$studinfoId=$shgtctmarg['grandtotal']; 
		
	$styGPA=$shgtctmarg['gpa'];
		
	
		
	
$insfmark="INSERT INTO `borno_merit_no` (`gpa`, `grandtotal`, `meritno`)
		
		
		 VALUES ('$styGPA', '$studinfoId', '0')";
		
		
 $qins=$mysqli->query($insfmark);
 

}


		
		
$meritno2="select * from borno_merit_no group by gpa"; 
$qmeritno2=$mysqli->query($meritno2);
	while($sqmeritno2=$qmeritno2->fetch_assoc()){ 		
		
	 				
$styGPA2=$sqmeritno2['gpa'];
$insfmark2="INSERT INTO `borno_gpa` (`gpa`)
		
		
		 VALUES ('$styGPA2')";
		
		
 $qins2=$mysqli->query($insfmark2);
 

}
	
	$meritno="select * from borno_gpa order by gpa desc"; 
    $qmeritno=$mysqli->query($meritno);
	$sl=0;	
	while($shqmeritno=$qmeritno->fetch_assoc()){ 
	$styGPA1=$shqmeritno['gpa'];	
		
		
	
	$meritno5="select * from borno_merit_no where gpa='$styGPA1' order by grandtotal desc"; 
	
    $qmeritno5=$mysqli->query($meritno5);
	
	while($shqmeritno5=$qmeritno5->fetch_assoc()){ 	$sl++;
	

	$studin=$shqmeritno5['grandtotal']; 

	

  $insfmark1="UPDATE borno_merit_no SET meritno='$sl' where gpa='$styGPA1' AND grandtotal='$studin'";
		
		
 $qins=$mysqli->query($insfmark1);
	}
}

$meritno1="select * from borno_merit_no order by meritno"; 

    $qmeritno1=$mysqli->query($meritno1);
	while($sqqqmeritno1=$qmeritno1->fetch_assoc()){ 
	
		
		
    $mno=$sqqqmeritno1['meritno'];
	 $styGPA11=$sqqqmeritno1['gpa'];
	 $studin1=$sqqqmeritno1['grandtotal']; 

	

 $insfmark11="UPDATE borno_school_9_10voc_merit SET meritno_class='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1'  AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$trade1' AND gpa='$styGPA11' AND grandtotal='$studin1'";
		
		
 $qins=$mysqli->query($insfmark11);

		}
		
	$gtcmerit="select * from borno_merit_position order by number";
	$qgtcmerit=$mysqli->query($gtcmerit);
	while($shqgtcmerit=$qgtcmerit->fetch_assoc()){
	
	$number=$shqgtcmerit['number'];
	$positionlist=$shqgtcmerit['positionlist'];

	$gtctmarg="select * from borno_school_9_10voc_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$trade1' order by meritno_class asc";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
	
		
		
  		$studinfoId=$shgtctmarg['borno_student_info_id']; 
	    $meritno=$shgtctmarg['meritno_class']; 
		
			if($meritno==$number) {

	
		
	$insfmark111="UPDATE borno_school_9_10voc_merit SET merit_class='$positionlist' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$trade1' AND borno_student_info_id='$studinfoId'";
		
		
 $qins=$mysqli->query($insfmark111);
 
 } 
}
}

//======================================Merit Class========================================


if($qins) { header('location:set_merit.php?msg=1');} else { header('location:set_merit.php?msg=2');}
										
					
	

		
		
			
 ?>

