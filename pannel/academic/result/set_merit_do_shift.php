<?php
 require_once('../result_settings/result_sett_top.php');
 
//  require_once '../../../lib/htmlpurifier/library/HTMLPurifier.auto.php';
    
//     $purifier = new HTMLPurifier();
//     //$clean_html = $purifier->purify($dirty_html);
	
// 	if (!function_exists('clean_html')) {
// 		function clean_html($dirty_html = ''){
// 			if(empty($dirty_html))
// 			return $dirty_html;		
				
// 			global $purifier;
// 			$clean_html = $purifier->purify($dirty_html);
// 			return $clean_html;
// 		}
		
// 	}
	
	//	$branchId = clean_html($_POST['branchId']);
		$branchId1 = strip_tags($_POST['branchId']);	
							
	//	$studClass = clean_html($_POST['studClass']);
		$studClass1 = strip_tags($_POST['studClass']);
		
	//	$shiftId = clean_html($_POST['shiftId']);
		$shiftId1 = strip_tags($_POST['shiftId']);
		
	//	$section = clean_html($_POST['section']);
		$section1 = strip_tags($_POST['section']);
		
	//	$stsess = clean_html($_POST['stsess']);
		$stsess1 = strip_tags($_POST['stsess']);
		
	//	$selTerm = clean_html($_POST['selTerm']);
		$selTerm1 = strip_tags($_POST['selTerm']);
		
	//	$group = clean_html($_POST['group']);
		if(empty($_POST['group'])){
		    $group1 =0;
		}
		else{
		$group1 = strip_tags($_POST['group']);
		}
	




//==============================Merit Shift Start============================

//=========================Delete Merit Table================================
	$delinfo1="TRUNCATE TABLE borno_merit_no";
	$mysqli->query($delinfo1);

//=========================Delete GPA Table==================================
	$delinfo2="TRUNCATE TABLE from borno_gpa";
	$mysqli->query($delinfo2);

//=========================Nine Ten Start================================
if($studClass1==1 OR $studClass1==2)
{
    echo $studClass1." ";
 $gtctmarg="select gpa, grandtotal from borno_school_9_10_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$group1' AND gpa!=0 group by gpa, grandtotal";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
		
	//	echo $studClass1." ";
		
		$studinfoId=$shgtctmarg['grandtotal']; 
		
	$styGPA=$shgtctmarg['gpa'];
		
//	echo $studinfoId." "; echo $styGPA."<br>";
		
	
$insfmark="INSERT INTO `borno_merit_no` (`gpa`, `grandtotal`, `meritno`)
		
		
		 VALUES ('$styGPA', '$studinfoId', '0')";
		
		
 $qins=$mysqli->query($insfmark);
 
 if($qins){
     echo $studinfoId." "; echo $styGPA."<br>";
 }

}

$meritno2="select gpa from borno_merit_no group by gpa"; 
$qmeritno2=$mysqli->query($meritno2);
	while($sqmeritno2=$qmeritno2->fetch_assoc()){ 		
		
	 				
$styGPA2=$sqmeritno2['gpa'];
$insfmark2="INSERT INTO `borno_gpa` (`gpa`)
		
		
		 VALUES ('$styGPA2')";
		
		
 $qins2=$mysqli->query($insfmark2);
 

}

		
		
 if($schId == 182){
//      	$meritno="select * from borno_gpa order by gpa desc"; 
//     $qmeritno=$mysqli->query($meritno);
// 	$sl=0;	
// 	while($shqmeritno=$qmeritno->fetch_assoc()){ 
// 	$styGPA1=$shqmeritno['gpa'];	
		
		
	
	$meritno5="select * from borno_merit_no GROUP BY grandtotal desc"; 
	
    $qmeritno5=$mysqli->query($meritno5);
	$sl=0;
	while($shqmeritno5=$qmeritno5->fetch_assoc()){ 	$sl++;
	

	$studin=$shqmeritno5['grandtotal']; 

	

  $insfmark1="UPDATE borno_merit_no SET meritno='$sl' where grandtotal='$studin'";
		
		
 $qins=$mysqli->query($insfmark1);
	}
//}
 }
 else {
     	$meritno="select * from borno_gpa  GROUP BY gpa desc"; 
    $qmeritno=$mysqli->query($meritno);
	$sl=0;	
	while($shqmeritno=$qmeritno->fetch_assoc()){ 
	$styGPA1=$shqmeritno['gpa'];	
		
		
	
	$meritno5="select * from borno_merit_no where gpa='$styGPA1' order by grandtotal desc"; 
	
    $qmeritno5=$mysqli->query($meritno5);
	
	while($shqmeritno5=$qmeritno5->fetch_assoc()){ 	$sl++;
	

	$studin=$shqmeritno5['grandtotal']; 

		echo $sl." "; echo $studin." "; echo $styGPA1." "; 

$insfmark1="UPDATE borno_merit_no SET meritno='$sl' where gpa='$styGPA1' AND ABS(grandtotal-$studin)< .01";
		
		
 $qins=$mysqli->query($insfmark1);
	}
}
 }
	




$meritno1="select * from borno_merit_no order by meritno"; 

    $qmeritno1=$mysqli->query($meritno1);
	while($sqqqmeritno1=$qmeritno1->fetch_assoc()){ 
	
		
		
    $mno=$sqqqmeritno1['meritno'];
	 $styGPA11=$sqqqmeritno1['gpa'];
	 $studin1=$sqqqmeritno1['grandtotal']; 

	

 $insfmark11="UPDATE borno_school_9_10_merit SET meritno_shift='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$group1' AND gpa='$styGPA11' AND grandtotal='$studin1'";
		
		
 $qins=$mysqli->query($insfmark11);

		}
		
	$gtcmerit="select * from borno_merit_position order by number";
	$qgtcmerit=$mysqli->query($gtcmerit);
	while($shqgtcmerit=$qgtcmerit->fetch_assoc()){
	
	$number=$shqgtcmerit['number'];
	$positionlist=$shqgtcmerit['positionlist'];

	$gtctmarg="select * from borno_school_9_10_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$group1' order by meritno_shift asc";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
	
		
		
  		$studinfoId=$shgtctmarg['borno_student_info_id']; 
	    $meritno=$shgtctmarg['meritno_shift']; 
		
			if($meritno==$number) {

	
		
	$insfmark111="UPDATE borno_school_9_10_merit SET merit_shift='$positionlist' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$group1' AND borno_student_info_id='$studinfoId'";
		
		
 $qins=$mysqli->query($insfmark111);
 
 } 
}
}
}
//=========================Nine Ten End================================

//=========================Six to Eight Start=============================
elseif($studClass1==3 OR $studClass1==4 OR $studClass1==5)
{
 $gtctmarg="select gpa, grandtotal from borno_school_6_8_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND gpa!=0 group by gpa, grandtotal";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
		
		
		
		$studinfoId=$shgtctmarg['grandtotal']; 
		
	$styGPA=$shgtctmarg['gpa'];
		
	
		
	
$insfmark="INSERT INTO `borno_merit_no` (`gpa`, `grandtotal`, `meritno`)
		
		
		 VALUES ('$styGPA', '$studinfoId', '0')";
		
		
 $qins=$mysqli->query($insfmark);
 

}


		
		
$meritno2="select gpa from borno_merit_no group by gpa"; 
$qmeritno2=$mysqli->query($meritno2);
	while($sqmeritno2=$qmeritno2->fetch_assoc()){ 		
		
	 				
$styGPA2=$sqmeritno2['gpa'];
$insfmark2="INSERT INTO `borno_gpa` (`gpa`)
		
		
		 VALUES ('$styGPA2')";
		
		
 $qins2=$mysqli->query($insfmark2);
 

}
	

 if($schId == 182){
//      	$meritno="select * from borno_gpa order by gpa desc"; 
//     $qmeritno=$mysqli->query($meritno);
// 	$sl=0;	
// 	while($shqmeritno=$qmeritno->fetch_assoc()){ 
// 	$styGPA1=$shqmeritno['gpa'];	
		
		
	
	$meritno5="select * from borno_merit_no GROUP BY grandtotal desc"; 
	
    $qmeritno5=$mysqli->query($meritno5);
	$sl=0;
	while($shqmeritno5=$qmeritno5->fetch_assoc()){ 	$sl++;
	

	$studin=$shqmeritno5['grandtotal']; 

	

  $insfmark1="UPDATE borno_merit_no SET meritno='$sl' where grandtotal='$studin'";
		
		
 $qins=$mysqli->query($insfmark1);
	}
//}
 }
 else {
     	$meritno="select * from borno_gpa  GROUP BY gpa desc"; 
    $qmeritno=$mysqli->query($meritno);
	$sl=0;	
	while($shqmeritno=$qmeritno->fetch_assoc()){ 
	$styGPA1=$shqmeritno['gpa'];	
		
		
	
	$meritno5="select * from borno_merit_no where gpa='$styGPA1' order by grandtotal desc"; 
	
    $qmeritno5=$mysqli->query($meritno5);
	
	while($shqmeritno5=$qmeritno5->fetch_assoc()){ 	$sl++;
	

	$studin=$shqmeritno5['grandtotal']; 

	echo $sl." "; echo 	$styGPA1." "; echo 	$studin."<br>"; 

$insfmark1="UPDATE borno_merit_no SET meritno='$sl' where gpa='$styGPA1' AND ABS(grandtotal-$studin)< .01";
		
		
 $qins=$mysqli->query($insfmark1);
	}
}
 }

$meritno1="select * from borno_merit_no order by meritno"; 

    $qmeritno1=$mysqli->query($meritno1);
	while($sqqqmeritno1=$qmeritno1->fetch_assoc()){ 
	
		
		
    $mno=$sqqqmeritno1['meritno'];
	 $styGPA11=$sqqqmeritno1['gpa'];
	 $studin1=$sqqqmeritno1['grandtotal']; 

	

 $insfmark11="UPDATE borno_school_6_8_merit SET meritno_shift='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND gpa='$styGPA11' AND grandtotal='$studin1'";
		
		
 $qins=$mysqli->query($insfmark11);

		}
		
	$gtcmerit="select * from borno_merit_position order by number";
	$qgtcmerit=$mysqli->query($gtcmerit);
	while($shqgtcmerit=$qgtcmerit->fetch_assoc()){
	
	$number=$shqgtcmerit['number'];
	$positionlist=$shqgtcmerit['positionlist'];

	$gtctmarg="select * from borno_school_6_8_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' order by meritno_shift asc";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
	
		
		
  		$studinfoId=$shgtctmarg['borno_student_info_id']; 
	    $meritno=$shgtctmarg['meritno_shift']; 
		
			if($meritno==$number) {

	
		
	$insfmark111="UPDATE borno_school_6_8_merit SET merit_shift='$positionlist' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_student_info_id='$studinfoId'";
		
		
 $qins=$mysqli->query($insfmark111);
 
 } 
}
}
}
//=========================Six to Eight End=============================

//=========================Play to Five Start=============================
else
{
 $gtctmarg="select gpa, grandtotal from borno_school_play_5_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND gpa!=0 group by gpa, grandtotal";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
		
		
		
		$studinfoId=$shgtctmarg['grandtotal']; 
		
	$styGPA=$shgtctmarg['gpa'];
		
	
		
	
$insfmark="INSERT INTO `borno_merit_no` (`gpa`, `grandtotal`, `meritno`)
		
		
		 VALUES ('$styGPA', '$studinfoId', '0')";
		
		
 $qins=$mysqli->query($insfmark);
 

}


		
		
$meritno2="select gpa from borno_merit_no group by gpa"; 
$qmeritno2=$mysqli->query($meritno2);
	while($sqmeritno2=$qmeritno2->fetch_assoc()){ 		
		
	 				
$styGPA2=$sqmeritno2['gpa'];
$insfmark2="INSERT INTO `borno_gpa` (`gpa`)
		
		
		 VALUES ('$styGPA2')";
		
		
 $qins2=$mysqli->query($insfmark2);
 

}
	
 if($schId == 182){
//      	$meritno="select * from borno_gpa order by gpa desc"; 
//     $qmeritno=$mysqli->query($meritno);
// 	$sl=0;	
// 	while($shqmeritno=$qmeritno->fetch_assoc()){ 
// 	$styGPA1=$shqmeritno['gpa'];	
		
		
	
	$meritno5="select * from borno_merit_no GROUP BY grandtotal desc"; 
	
    $qmeritno5=$mysqli->query($meritno5);
	$sl=0;
	while($shqmeritno5=$qmeritno5->fetch_assoc()){ 	$sl++;
	

	$studin=$shqmeritno5['grandtotal']; 

	

  $insfmark1="UPDATE borno_merit_no SET meritno='$sl' where grandtotal='$studin'";
		
		
 $qins=$mysqli->query($insfmark1);
	}
//}
 }
 else {
     	$meritno="select * from borno_gpa  GROUP BY gpa desc"; 
    $qmeritno=$mysqli->query($meritno);
	$sl=0;	
	while($shqmeritno=$qmeritno->fetch_assoc()){ 
	$styGPA1=$shqmeritno['gpa'];	
		
		
	
	$meritno5="select * from borno_merit_no where gpa='$styGPA1' order by grandtotal desc"; 
	
    $qmeritno5=$mysqli->query($meritno5);
	
	while($shqmeritno5=$qmeritno5->fetch_assoc()){ 	$sl++;
	

	$studin=$shqmeritno5['grandtotal']; 

	

$insfmark1="UPDATE borno_merit_no SET meritno='$sl' where gpa='$styGPA1' AND ABS(grandtotal-$studin)< .01";
		
		
 $qins=$mysqli->query($insfmark1);
	}
}
 }

$meritno1="select * from borno_merit_no order by meritno"; 

    $qmeritno1=$mysqli->query($meritno1);
	while($sqqqmeritno1=$qmeritno1->fetch_assoc()){ 
	
		
		
    $mno=$sqqqmeritno1['meritno'];
	 $styGPA11=$sqqqmeritno1['gpa'];
	 $studin1=$sqqqmeritno1['grandtotal']; 

	

 $insfmark11="UPDATE borno_school_play_5_merit SET meritno_shift='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND gpa='$styGPA11' AND grandtotal='$studin1'";
		
		
 $qins=$mysqli->query($insfmark11);

		}
		
	$gtcmerit="select * from borno_merit_position order by number";
	$qgtcmerit=$mysqli->query($gtcmerit);
	while($shqgtcmerit=$qgtcmerit->fetch_assoc()){
	
	$number=$shqgtcmerit['number'];
	$positionlist=$shqgtcmerit['positionlist'];

	$gtctmarg="select * from borno_school_play_5_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' order by meritno_shift asc";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
	
		
		
  		$studinfoId=$shgtctmarg['borno_student_info_id']; 
	    $meritno=$shgtctmarg['meritno_shift']; 
		
			if($meritno==$number) {

	
		
	$insfmark111="UPDATE borno_school_play_5_merit SET merit_shift='$positionlist' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_student_info_id='$studinfoId'";
		
		
 $qins=$mysqli->query($insfmark111);
 
 } 
}
}
}
//=========================Play to Five End=============================
//=============================Merit Shift End==============================



if($qins) { header("location:set_merit_shift.php?msg=1&branchId=$branchId1&studClass=$studClass1&shiftId=$shiftId1&section=$section1&stsess=$stsess1&selTerm=$selTerm1");} else { header('location:set_merit.php?msg=2');}
										
					
	

		
		
			
 ?>
