<?php
ob_start();
require_once('others_top.php');

extract($_POST);

	$gstclassshift11="select * from borno_set_class_teacher where borno_school_teacher_id='$stdid'";
	$qgstclassshift11=$mysqli->query($gstclassshift11);
	$shgstclassshift11=$qgstclassshift11->fetch_assoc();       
	$studClass=$shgstclassshift11['borno_school_class_id']; 
	$stsess=$shgstclassshift11['borno_school_session'];			
	$schId=$shgstclassshift11['borno_school_id'];
	$shiftId=$shgstclassshift11['borno_school_shift_id'];
	$branchId=$shgstclassshift11['borno_school_branch_id'];
	$section=$shgstclassshift11['borno_school_section_id'];	
	 


///==================================================== General Subject ============================////////////////////////////
//========================Nine Ten Start=============================
if($studClass==1 OR $studClass==2)
{

for($i=0; $i<count($stuName); $i++){
				
	if($teacherid[$i]!=""){


	$term1="select * from borno_set_examiner where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_subject_id='$stuRoll[$i]' AND borno_result_term_id='$selTerm'";
	$qterm1=$mysqli->query($term1);
	$shqterm1=$qterm1->fetch_assoc();
	$gettermid=$shqterm1['borno_teacher_info_id'];
	if($gettermid=="")
	{		
		
	
	  $insfmark1="INSERT INTO `borno_set_examiner` 
	(
			`borno_school_id`,
			`borno_school_branch_id`,
			`borno_school_class_id`,
			`borno_school_shift_id`,
			`borno_school_section_id`,
			`borno_school_session`,
			`borno_result_subject_id`,
			`borno_result_term_id`,
			`borno_teacher_info_id`)
				   
			VALUES (
					'$schId', 
					'$branchId',
					'$studClass',
					'$shiftId',
					'$section',
					'$stsess',
					'$stuRoll[$i]',
					'$selTerm',
					'$teacherid[$i]'
			  )
			  ";
	

		$qinstm1=$mysqli->query($insfmark1);
		
	}
}
	}
}

//========================Nine Ten End=============================
//========================Six to Eight Start==========================
elseif($studClass==3 OR $studClass==4 OR $studClass==5)
{

for($i=0; $i<count($stuName); $i++){
				
	if($teacherid[$i]!=""){


	$term1="select * from borno_set_examiner where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_subject_id='$stuRoll[$i]' AND borno_result_term_id='$selTerm'";
	$qterm1=$mysqli->query($term1);
	$shqterm1=$qterm1->fetch_assoc();
	$gettermid=$shqterm1['borno_teacher_info_id'];
	if($gettermid=="")
	{		
		
	
	  $insfmark1="INSERT INTO `borno_set_examiner` 
	(
			`borno_school_id`,
			`borno_school_branch_id`,
			`borno_school_class_id`,
			`borno_school_shift_id`,
			`borno_school_section_id`,
			`borno_school_session`,
			`borno_result_subject_id`,
			`borno_result_term_id`,
			`borno_teacher_info_id`)
				   
			VALUES (
					'$schId', 
					'$branchId',
					'$studClass',
					'$shiftId',
					'$section',
					'$stsess',
					'$stuRoll[$i]',
					'$selTerm',
					'$teacherid[$i]'
			  )
			  ";
		$qinstm1=$mysqli->query($insfmark1);
	
	}
	
	}
}
}
//========================Six to Eight End==========================
//========================Primary Start==========================
else
{
for($i=0; $i<count($stuName); $i++){
				
				if($teacherid[$i]!=""){


	$term1="select * from borno_set_examiner where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_subject_id='$stuRoll[$i]' AND borno_result_term_id='$selTerm'";
	$qterm1=$mysqli->query($term1);
	$shqterm1=$qterm1->fetch_assoc();
	$gettermid=$shqterm1['borno_teacher_info_id'];
	if($gettermid=="")
	{		
		
	
	  $insfmark1="INSERT INTO `borno_set_examiner` 
	(
			`borno_school_id`,
			`borno_school_branch_id`,
			`borno_school_class_id`,
			`borno_school_shift_id`,
			`borno_school_section_id`,
			`borno_school_session`,
			`borno_result_subject_id`,
			`borno_result_term_id`,
			`borno_teacher_info_id`)
				   
			VALUES (
					'$schId', 
					'$branchId',
					'$studClass',
					'$shiftId',
					'$section',
					'$stsess',
					'$stuRoll[$i]',
					'$selTerm',
					'$teacherid[$i]'
				
			  )
			  ";
			  
			
		$qinstm1=$mysqli->query($insfmark1);
}
				}
}

}

if($qinstm1) { header("location:set_examiner.php?msg=1&branchId=$branchId&studClass=$studClass&shiftId=$shiftId&section=$section&stsess=$stsess&selTerm=$selTerm");} else {  header('location:set_examiner.php?msg=2'); }
	

?>