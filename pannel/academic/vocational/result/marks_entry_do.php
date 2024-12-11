<?php
ob_start();
require_once('result_top.php');

extract($_POST);


$getsubjstatus="select * from borno_result_subject_details_voc where borno_school_id='$schId' AND borno_school_class_id=$studClass AND borno_school_session='$stsess' AND borno_result_trade='$group' AND borno_result_term_id='$selTerm' AND borno_result_subject_id='$stusubjId'";
$qgetsubjstatus=$mysqli->query($getsubjstatus);
$shgetsubjstatus=$qgetsubjstatus->fetch_assoc();
$sub4th=$shgetsubjstatus['sub4th'];
$uncountable=$shgetsubjstatus['uncountable'];
$num1=$shgetsubjstatus['number_type1_marks'];
$num2=$shgetsubjstatus['number_type2_marks'];
$num3=$shgetsubjstatus['number_type3_marks'];
$num4=$shgetsubjstatus['number_type4_marks'];
$num5=$shgetsubjstatus['number_type5_marks'];
$num6=$shgetsubjstatus['number_type6_marks'];

$con1=$shgetsubjstatus['number_type1_conv'];
$con2=$shgetsubjstatus['number_type2_conv'];
$con3=$shgetsubjstatus['number_type3_conv'];
$con4=$shgetsubjstatus['number_type4_conv'];
$con5=$shgetsubjstatus['number_type5_conv'];
$con6=$shgetsubjstatus['number_type6_conv'];


$grade="select * from borno_grading_chart_voc where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess'";
	$qgrade=$mysqli->query($grade);
	$shqgrade=$qgrade->fetch_assoc();
	
	$greadsystem=$shqgrade['marks_from1'];
	
	if($greadsystem=="")
	{
	header('location:marks_entry.php?msg=3');
	}

	else
	{
///==================================================== General Subject ============================////////////////////////////	


for($i=0; $i<count($stuName); $i++){
				
				if($stuName[$i]!=""){
					
	if($ntype1[$i]>$num1){$ntype1[$i]=0;}
	if($ntype2[$i]>$num2){$ntype2[$i]=0;}
	if($ntype3[$i]>$num3){$ntype3[$i]=0;}
	if($ntype4[$i]>$num4){$ntype4[$i]=0;}
	if($ntype5[$i]>$num5){$ntype5[$i]=0;}
	if($ntype6[$i]>$num6){$ntype6[$i]=0;}
					
	$term1="select * from borno_class9_10voc_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_subject_nine_ten_id='$stusubjId' AND borno_result_term_id='$selTerm' AND 	borno_school_stud_group='$group' AND borno_student_info_id='$studId[$i]'";
	$qterm1=$mysqli->query($term1);
	$shqterm1=$qterm1->fetch_assoc();
	$gettermid=$shqterm1['borno_student_info_id'];
	if($gettermid=="")
	{
				
$totalmark=$ntype1[$i]*$con1/100+$ntype2[$i]*$con2/100+$ntype3[$i]*$con3/100+$ntype4[$i]*$con4/100+$ntype5[$i]*$con5/100+$ntype6[$i]*$con6/100;
	 $insfmark1="INSERT INTO `borno_class9_10voc_temp_mark1` 
	(
			`borno_school_id`,
			`borno_school_branch_id`,
			`borno_school_class_id`,
			`borno_school_shift_id`,
			`borno_school_section_id`,
			`borno_school_session`,
			`borno_subject_nine_ten_id`,
			`borno_result_term_id`,
			`borno_student_info_id`,
			`borno_school_roll`, 
			`borno_school_student_name`,
			`temp_res_number_type1`,
			`temp_res_number_type2`,
			`temp_res_number_type3`,
			`temp_res_number_type4`,
			`temp_res_number_type5`,
			`temp_res_number_type6`,
			`subject_pare`,
			`borno_school_stud_group`,
			`stu4thsub`,
			`total_marks`)
				   
			VALUES (
					'$schId', 
					'$branchId',
					'$studClass',
					'$shiftId',
					'$section',
					'$stsess',
					'$stusubjId',
					'$selTerm',
					'$studId[$i]',
					'$stuRoll[$i]',
					'$stuName[$i]',
					'$ntype1[$i]',
					'$ntype2[$i]',
					'$ntype3[$i]',
					'$ntype4[$i]',
					'$ntype5[$i]',
					'$ntype6[$i]',
					'0',
					'$group',
					'$sub4th',
					'$totalmark'
			  )
			  ";
	

		$qinstm1=$mysqli->query($insfmark1);
		
	}
	
	}
}



//=========================================== /////////////////// Result Calculation=======///////////////////////////////////////////

$delbtbornores="DELETE from borno_class9_10voc_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_subject_nine_ten_id='$stusubjId' AND borno_result_term_id='$selTerm' AND borno_school_stud_group='$group'";

$mysqli->query($delbtbornores);

//----------- Get Subject Details Mark ----------------------------------------------------------------------------------------------------------------------------

 $gtsdmrk="select * from borno_result_subject_details_voc where borno_school_id='$schId' AND borno_school_class_id=$studClass AND borno_school_session='$stsess' AND borno_result_trade='$group' AND borno_result_term_id='$selTerm' AND borno_result_subject_id='$stusubjId'";
				
				$qgtsdmrk=$mysqli->query($gtsdmrk);
				$shsubjdet=$qgtsdmrk->fetch_assoc();
				
				$numbtype1_conv=$shsubjdet['number_type1_conv'];
				$numbtype2_conv=$shsubjdet['number_type2_conv'];
				$numbtype3_conv=$shsubjdet['number_type3_conv'];
				$numbtype4_conv=$shsubjdet['number_type4_conv'];
				$numbtype5_conv=$shsubjdet['number_type5_conv'];
				$numbtype6_conv=$shsubjdet['number_type6_conv'];
				
				$gtnumty1pass=$shsubjdet['number_type1_pass'];
				$gtnumty2pass=$shsubjdet['number_type2_pass'];
				$gtnumty3pass=$shsubjdet['number_type3_pass'];
				$gtnumty4pass=$shsubjdet['number_type4_pass'];
				$gtnumty5pass=$shsubjdet['number_type5_pass'];
				$gtnumty6pass=$shsubjdet['number_type6_pass'];
			
	$gtsubjfm="select * from borno_result_subject_voc where borno_result_subject_voc_id='$stusubjId'";
	$qggtsubjfm=$mysqli->query($gtsubjfm);
	$shgtsubjfm=$qggtsubjfm->fetch_assoc();
	

				$gtsubjfmark=$shgtsubjfm['borno_school_subject_fullmark'];

//---------- END Subject Details ----------------------------------------------------------------------------------------------------------------------------------

//---------- END Subject Details ----------------------------------------------------------------------------------------------------------------------------------

//---------------- Grading  ---------------------------------------------------

		$getgrdpoint="select * from borno_grading_chart_voc where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess'";
		$qgetgrdpoint=$mysqli->query($getgrdpoint);
		$shgetgrdpoint=$qgetgrdpoint->fetch_assoc();
		
		$gtmarksfrom1=$shgetgrdpoint['marks_from1'];
		$gtmarksfrom2=$shgetgrdpoint['marks_from2'];
		$gtmarksfrom3=$shgetgrdpoint['marks_from3'];
		$gtmarksfrom4=$shgetgrdpoint['marks_from4'];
		$gtmarksfrom5=$shgetgrdpoint['marks_from5'];
		$gtmarksfrom6=$shgetgrdpoint['marks_from6'];
		$gtmarksfrom7=$shgetgrdpoint['marks_from7'];
		
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

//------------------- End Grading ----------------------------------------------

		$gtctmarg="select * from borno_class9_10voc_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_subject_nine_ten_id='$stusubjId' AND borno_result_term_id='$selTerm' AND borno_school_stud_group='$group' order by borno_school_roll asc";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){
		  
		
		
		$studinfoId=$shgtctmarg['borno_student_info_id']; 
		$studName=$shgtctmarg['borno_school_student_name']; 
		$studRoll=$shgtctmarg['borno_school_roll']; 
		
		
		
		$numbty1=$shgtctmarg['temp_res_number_type1'];
		$convnumbty1=($numbty1/100) * $numbtype1_conv;
		$numbty2=$shgtctmarg['temp_res_number_type2'];
		$convnumbty2=($numbty2/100)  * $numbtype2_conv;
		$numbty3=$shgtctmarg['temp_res_number_type3']; 
		$convnumbty3=($numbty3/100)  * $numbtype3_conv;
		$numbty4=$shgtctmarg['temp_res_number_type4']; 
		$convnumbty4=($numbty4/100)  * $numbtype4_conv;
		$numbty5=$shgtctmarg['temp_res_number_type5'];
		$convnumbty5=($numbty5/100)  * $numbtype5_conv;
		$numbty6=$shgtctmarg['temp_res_number_type6'];
		$convnumbty6=($numbty6/100)  * $numbtype6_conv;
		
		
	    $gttotalmrk=($numbty1+$numbty2+$numbty3+$numbty4+$numbty5+$numbty6);
		$gtconvtotal=($convnumbty1+$convnumbty2+$convnumbty3+$convnumbty4+$convnumbty5+$convnumbty6);
		
		$markinpers=number_format(($gtconvtotal*100)/$gtsubjfmark);
		
//---------------------------Grading------------------------------------------------------------
	//------------------------------------  Greade Point (GPA) ----------------------------------------------------------------------	
		if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom1) { $finalGpa=$gtgrtpoint1; } 
		
		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom2) { $finalGpa=$gtgrtpoint2; }
		
		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom3) { $finalGpa=$gtgrtpoint3; } 
		
		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom4) { $finalGpa=$gtgrtpoint4; } 
		
		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom5) { $finalGpa=$gtgrtpoint5; } 
		
		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom6) { $finalGpa=$gtgrtpoint6; } 
		
		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom7) { $finalGpa=$gtgrtpoint7; } 
		
		else { $finalGpa=0; } 
// ------------------------ End GPA --------------------------------------------------------------	

//----------------------------- Latter Grade ------------------------------------------------------------------
		if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom1) { $finallg=$gtlettergrd1; } 
		
		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom2) { $finallg=$gtlettergrd2; }
		
		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom3) { $finallg=$gtlettergrd3; } 
		
		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom4) { $finallg=$gtlettergrd4; } 
		
		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom5) { $finallg=$gtlettergrd5; } 
		
		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom6) { $finallg=$gtlettergrd6; } 
		
		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6passt AND $markinpers>=$gtmarksfrom7) { $finallg=$gtlettergrd7; } 
		
		else { $finallg='F'; } 
		
		
// ------------------------ Eng lg --------------------------------------------------------------			


  $insfmark="INSERT INTO `borno_class9_10voc_final_result` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, `borno_subject_nine_ten_id`, `borno_result_term_id`, `borno_student_info_id`, `borno_school_roll`, `borno_school_student_name`, `temp_res_number_type1`, `temp_res_number_type1_conv`, `res_number_type2`, `res_number_type2_conv`, `res_number_type3`, `res_number_type3_conv`, `res_number_type4`, `res_number_type4_conv`, `res_number_type5`, `res_number_type5_conv`, `res_number_type6`, `res_number_type6_conv`, `res_total_mark`, `res_total_conv`,`mark_in_present`, `res_gpa`, `res_lg`,`pare`,`six_eight_4th_subject`,`uncountable`,`borno_school_stud_group`,`stu4thsub`,`heightsubjt1`,`heightsubjt2`)
		
		
		 VALUES ('$schId', '$branchId', '$studClass', '$shiftId', '$section', '$stsess', '$stusubjId', '$selTerm', '$studinfoId', '$studRoll', '$studName', '$numbty1', '$convnumbty1', '$numbty2', '$convnumbty2', '$numbty3', '$convnumbty3', '$numbty4', '$convnumbty4', '$numbty5', '$convnumbty5', '$numbty6', '$convnumbty6', '$gttotalmrk', '$gtconvtotal','$markinpers', '$finalGpa', '$finallg','0','0','$uncountable','$group','$sub4th','$gtconvtotal','$gtconvtotal')";
		$quygeneralsubmark=$mysqli->query($insfmark);
}


		//======================================== Height Mark ======================================================//
	
		$getheightmarkdel="ddelete  from  borno_height_mark_class9_10_voc where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_school_stud_group='$group' AND borno_subject_nine_ten_id='$stusubjId' AND borno_result_term_id='$selTerm'";
	$mysqli->query($getheightmarkdel);		
		 


			$getheightmark="select * from borno_class9_10voc_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_school_stud_group='$group' AND borno_subject_nine_ten_id='$stusubjId' AND borno_result_term_id='$selTerm' order by total_marks desc limit 0,1";
			
			
			$qgetheightmark=$mysqli->query($getheightmark);
	        $shgetheightmark=$qgetheightmark->fetch_assoc();
			
			$gensubheightMark=$shgetheightmark['total_marks'];
		
			$insgensubmaxnum="INSERT INTO `borno_height_mark_class9_10_voc` ( `borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`,`borno_subject_nine_ten_id`,`borno_result_term_id`, `getmaxmark`, `borno_school_stud_group`)
			
			 VALUES ('$schId', '$branchId', '$studClass', '$shiftId', '$section', '$stsess',  '$stusubjId','$selTerm', '$gensubheightMark','$group')";
			
			$mysqli->query($insgensubmaxnum);



if($qinstm1) { header("location:marks_entry.php?msg=1&branchId=$schsId&studClass=$studClass&shiftId=$shiftId&section=$section&stsess=$stsess&selTerm=$selTerm");} else {  header('location:marks_entry.php?msg=2'); }
	}

?>