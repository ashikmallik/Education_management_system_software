<?php
ob_start();
require_once('result_top.php');

$branchId=$_POST['branchId'];
$studClass=$_POST['studClass'];
$shiftId=$_POST['shiftId'];
$section=$_POST['section'];
$stsess=$_POST['stsess'];
$dept=$_POST['dept'];
$styear=$_POST['styear'];
$stusubjId=$_POST['stusubjId'];
$selTerm=$_POST['selTerm'];
$csv=$_POST['csv'];
$substatus=$_POST['substatus'];

//die();

	$allowed =  array('csv');
	$filename = $_FILES['csv']['name'];
	$ext = pathinfo($filename, PATHINFO_EXTENSION);
	if(!in_array($ext,$allowed) ) {
	 header('location:upload_marks.php?msg=3');
	} else {

$grade="select * from borno_grading_chart where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess'";
	$qgrade=$mysqli->query($grade);
	$shqgrade=$qgrade->fetch_assoc();
	
	$greadsystem=$shqgrade['marks_from1'];
	
	if($greadsystem=="")
	{
	header('location:upload_marks.php?msg=4');
	}

	else
	{
//$gtprevdata="select * from borno_class1_temp_mark where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_subject_id='$stusubjId' AND borno_result_term_id='$selTerm'";



//$qgtprevdata=$mysqli->query($gtprevdata);
//$shgtprevdata=$qgtprevdata->fetch_assoc();

//$getsubjecyId=$shgtprevdata['borno_result_subject_id'];

//die();

//if($getsubjecyId==""){
	
	// header('location:upload_marks.php?msg=3');
	
	//}


//else {




$csv=$_POST['csv'];



$handle = fopen($_FILES['csv']['tmp_name'], "r");


$firstRow = true;

while (($data = fgetcsv($handle, 10000, ",")) !== FALSE) {

	if($firstRow) { $firstRow = false; }
	else {
		
		
		
		$import="INSERT INTO `borno_class1_temp_mark` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, `borno_result_term_id`,`borno_result_subject_id1`,`borno_result_subject`,`borno_student_info_id`,`borno_result_subject_id`,`borno_school_roll`, `borno_school_student_name`, `temp_res_number_type1`, `temp_res_number_type2`, `temp_res_number_type3`, `temp_res_number_type4`, `temp_res_number_type5`, `temp_res_number_type6`, `subst`)
		
		 VALUES (
					'$schId',
					'$branchId',
					'$studClass',
					'$shiftId',
					'$section',
					'$stsess',										
					'$selTerm',
					'$stusubjId',
					'$data[0]',
					'$data[1]',
					'$data[2]',
					'$data[3]',
					'$data[4]',
					'$data[5]',
					'$data[6]',
					'$data[7]',
					'$data[8]',
					'$data[9]',
					'$data[10]',
					'$substatus'
					
				
				)";

		$qins=$mysqli->query($import);
	}
}

fclose($handle);
//==============Delete Wrong Info===================================
 $gtdelinfo="select * from borno_class1_temp_mark where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_subject_id='$stusubjId' AND borno_result_term_id='$selTerm' order by borno_school_roll asc";
		$qgtdelinfo=$mysqli->query($gtdelinfo);
		$s=0;
		while($shqgtdelinfo=$qgtdelinfo->fetch_assoc()){$s++;
		$stdtermid=$shqgtdelinfo['borno_class1_tmpmrk_id'];
		$stdroll=$shqgtdelinfo['borno_school_roll'];
		$stdid=$shqgtdelinfo['borno_student_info_id'];
		
		
		
 $gtinfo="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND 	borno_school_stud_group='$dept' AND borno_school_roll='$stdroll' AND borno_student_info_id='$stdid'";		
		$qgtinfo=$mysqli->query($gtinfo);
		$shqgtinfo=$qgtinfo->fetch_assoc();
		
		$stdroll1=$shqgtinfo['borno_school_roll'];
		
		
		if($stdroll1=="")
		{
		$delinfo="delete from borno_class1_temp_mark where borno_class1_tmpmrk_id='$stdtermid'";
		
		$mysqli->query($delinfo);	
		}
		

		}
//==============Delete Wrong Info End===================================		
		
//==============Delete existing Info===================================
$gtdelinfo="select * from borno_class1_temp_mark where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_subject_id='$stusubjId' AND borno_result_term_id='$selTerm' order by borno_school_roll asc";
		$qgtdelinfo=$mysqli->query($gtdelinfo);
		$s=0;
		while($shqgtdelinfo=$qgtdelinfo->fetch_assoc()){$s++;
		$stdtermid=$shqgtdelinfo['borno_class1_tmpmrk_id'];
		$stdroll=$shqgtdelinfo['borno_school_roll'];
		$stdid=$shqgtdelinfo['borno_student_info_id'];
		
		
 $gtinfo="select * from borno_class11_12_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_subject_eleven_twelve_id='$stusubjId' AND borno_result_term_id='$selTerm' AND borno_result_exam_year='$styear' AND borno_school_roll='$stdroll' AND borno_student_info_id='$stdid'";		
		$qgtinfo=$mysqli->query($gtinfo);
		$shqgtinfo=$qgtinfo->fetch_assoc();
		
		$stdroll1=$shqgtinfo['borno_school_roll'];
		if($stdroll1!="")
		{
		$delinfo="delete from borno_class1_temp_mark where borno_class1_tmpmrk_id='$stdtermid'";
		
		$mysqli->query($delinfo);	
		}
		}
//==============Delete existing Info End===================================
//==============Delete Wrong Subject===================================
$gtdelsub1="select * from borno_class1_temp_mark where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess'";
		$qgtdelsub1=$mysqli->query($gtdelsub1);
		$shqgtdelsub1=$qgtdelsub1->fetch_assoc();
		$stsubid1=$shqgtdelsub1['borno_result_subject_id1'];
		$stsubid2=$shqgtdelsub1['borno_result_subject_id'];
if($stsubid1!=$stsubid2)		
{
$gtdelsub2="delete  from borno_class1_temp_mark where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess'";
$mysqli->query($gtdelsub2);		
header('location:upload_marks.php?msg=3');	
}
//==============Delete Wrong Subject===================================
else
{
if($qins) { 
header('location:upload_marks.php?msg=1');
header("location:show_marks_temp_success.php?schoolId=$schId&branchId=$branchId&classId=$studClass&shiftId=$shiftId&sectionId=$section&stsess=$stsess&subjId=$stusubjId&dept=$dept&styear=$styear&gttermId=$selTerm"); } else  { header('location:upload_marks.php?msg=2');
 }
}
}
	}
		//}
?>
