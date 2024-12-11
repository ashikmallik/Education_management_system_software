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

		
 $gtctmargroup="select * from borno_school_910_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' order by borno_school_roll asc";
  
    $qgtctmargroup=$mysqli->query($gtctmargroup);
	while($shgtctmargroup=$qgtctmargroup->fetch_assoc()){ 
	    $studinfo1=$shgtctmargroup['borno_student_info_id']; 
	    $studroll=$shgtctmargroup['borno_school_roll']; 
	    $studname=$shgtctmargroup['borno_school_student_name']; 
	    $studtotal=$shgtctmargroup['grandtotal']; 
	    $studtotal1=$shgtctmargroup['grandtotal1']; 
	    $studgpa=$shgtctmargroup['gpa']; 
	    $studgpa1=$shgtctmargroup['gpa1']; 
	    $studgroup=$shgtctmargroup['borno_subject_nine_ten_dept']; 
	    $studlg=$shgtctmargroup['finallg']; 
	    $studfailno=$shgtctmargroup['failno']; 
	    $studfailsub=$shgtctmargroup['fail_subject']; 
	    
	 	$insfmarkgroup="INSERT INTO `borno_school_910group_avg_merit` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`,`borno_subject_nine_ten_dept`, `borno_result_term_id`, `borno_student_info_id`, `borno_school_roll`, `borno_school_student_name`, `grandtotal`,`grandtotal1`, `gpa`, `gpa1`, `finallg`, `meritno_class`, `merit_class`, `meritno_shift`, `merit_shift`, `meritno_section`, `merit_section`, `failno`, `fail_subject`) 
	
	VALUES ('$schId', '$branchId1', '$studClass1', '$shiftId1', '$section1', '$stsess1', '$studgroup', '0', '$studinfo1', '$studroll', '$studname', '$studtotal','$studtotal1', '$studgpa','$studgpa1', '$studlg', '0', '', '0', '', '0','', '$studfailno', '$studfailsub')";
		
		
 	$qinsgroup=$mysqli->query($insfmarkgroup);   
	}
		
				
				



//======================================Merit Section All Group==================================
	$delinfo1="delete from borno_merit_no where empty='0'";
	$mysqli->query($delinfo1);

	$delinfo2="delete from borno_gpa where empty='0'";
	$mysqli->query($delinfo2);
	

 $gtctmarg="select * from borno_school_910group_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND gpa!=0 group by gpa, grandtotal";
  
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

	

 $insfmark11="UPDATE borno_school_910group_avg_merit SET meritno_section='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND gpa='$styGPA11' AND grandtotal='$studin1'";
		
		
 $qins=$mysqli->query($insfmark11);

		}
		
	$gtcmerit="select * from borno_merit_position order by number";
	$qgtcmerit=$mysqli->query($gtcmerit);
	while($shqgtcmerit=$qgtcmerit->fetch_assoc()){
	
	$number=$shqgtcmerit['number'];
	$positionlist=$shqgtcmerit['positionlist'];

	$gtctmarg="select * from borno_school_910group_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' order by meritno_section asc";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
	
		
		
  		$studinfoId=$shgtctmarg['borno_student_info_id']; 
	    $meritno=$shgtctmarg['meritno_section']; 
		
			if($meritno==$number) {

	
		
	$insfmark111="UPDATE borno_school_910group_avg_merit SET merit_section='$positionlist' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='0' AND borno_student_info_id='$studinfoId'";
		
		
 $qins=$mysqli->query($insfmark111);

 
 } 
}
}

//======================================Merit Section========================================



if($qins) { header('location:set_group_avgmerit.php?msg=1');} else { header('location:set_group_avgmerit.php?msg=2');}
										
					
	

		
		
			
 ?>

