<?php
ob_start();
require_once('result_top.php');

extract($_POST);


$getsubjstatus="select * from borno_result_eleven_twelve_subject_details where borno_school_id='$schId' AND borno_school_class_id=$studClass AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' AND borno_school_stud_group='$group' AND  borno_subject_eleven_twelve_id='$stusubjId'";
$qgetsubjstatus=$mysqli->query($getsubjstatus);
$shgetsubjstatus=$qgetsubjstatus->fetch_assoc();
$subpare=$shgetsubjstatus['pare'];
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


$grade="select * from borno_grading_chart where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess'";
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
					
					


 $subject4th="select * from borno_set_subject_eleven_twelve where borno_student_info_id='$studId[$i]' AND borno_school_session='$stsess' AND borno_school_class_id='$studClass' ";
	$qsubject4th=$mysqli->query($subject4th);
	$shqsubject4th=$qsubject4th->fetch_assoc();

	$subject1=$shqsubject4th['borno_school_subject_1st'];
	$subject2=$shqsubject4th['borno_school_subject_2nd'];
	$subject3=$shqsubject4th['borno_school_subject_3rd'];
	$subject4=$shqsubject4th['borno_school_subject_4th'];
	$subject5=$shqsubject4th['borno_school_subject_5th'];
	$subject6=$shqsubject4th['borno_school_subject_6th'];
	$subject7=$shqsubject4th['borno_school_subject_7th'];
	$subject8=$shqsubject4th['borno_school_subject_8th'];
	$subject9=$shqsubject4th['borno_school_subject_9th'];
	$subject10=$shqsubject4th['borno_school_subject_10th'];
	$subject11=$shqsubject4th['borno_school_subject_11th'];
	$subje4th1=$shqsubject4th['borno_school_subject_12th'];
	$subje4th2=$shqsubject4th['borno_school_subject_13th'];
	

if($subject1==$stusubjId OR $subject2==$stusubjId OR $subject3==$stusubjId OR $subject4==$stusubjId OR $subject5==$stusubjId OR $subject6==$stusubjId OR $subject7==$stusubjId OR $subject8==$stusubjId OR $subject9==$stusubjId OR $subject10==$stusubjId OR $subject11==$stusubjId OR $subje4th1==$stusubjId OR $subje4th2==$stusubjId)	
{	
if($subje4th1==$stusubjId OR $subje4th2==$stusubjId)
{$stu4th=1;}
else{$stu4th=0;}
echo  $studId[$i];echo  $stusubjId;
	$term1="select * from borno_class11_12_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_subject_eleven_twelve_id='$stusubjId' AND borno_result_term_id='$selTerm' AND borno_school_stud_group='$group' AND borno_result_exam_year='$styear' AND borno_student_info_id='$studId[$i]'";
	$qterm1=$mysqli->query($term1);
	$shqterm1=$qterm1->fetch_assoc();
	$gettermid=$shqterm1['borno_student_info_id'];
	if($gettermid=="")
	{
echo  "test";
	$total=$ntype1[$i]*$con1/100+$ntype2[$i]*$con2/100+$ntype3[$i]*$con3/100+$ntype4[$i]*$con4/100+$ntype5[$i]*$con5/100+$ntype6[$i]*$con6/100;
	
 $insfmark1="INSERT INTO `borno_class11_12_temp_mark1` 
	(
	
	
			`borno_school_id`,
			`borno_school_branch_id`,
			`borno_school_class_id`,
			`borno_school_shift_id`,
			`borno_school_section_id`,
			`borno_school_session`,
			`borno_subject_eleven_twelve_id`,
			`borno_result_term_id`,
			`borno_result_exam_year`,
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
					'$styear',
					'$studId[$i]',
					'$stuRoll[$i]',
					'$stuName[$i]',
					'$ntype1[$i]',
					'$ntype2[$i]',
					'$ntype3[$i]',
					'$ntype4[$i]',
					'$ntype5[$i]',
					'$ntype6[$i]',
					'$subpare',
					'$group',
					'$stu4th',
					'$total'
			  )
			  ";
			  
		  
		$qinstm1=$mysqli->query($insfmark1);
		
		
		if($qinstm1){
		    		    echo $schId." ";echo $branchId." ";echo $studClass." ";echo $shiftId." ";echo $section." ";
		    echo $stsess." ";echo $stusubjId." ";echo $selTerm." ";echo $styear." ";echo $studId[$i]." ";
		    echo $ntype1[$i]." ";echo $ntype2[$i]." ";echo $ntype3[$i]." ";echo $ntype4[$i]." ";echo $ntype5[$i]." ";
		    echo $subpare." ";echo $stu4th." ";echo $total."<br>";
		}
		
		
	}	
	}
	}
}


//=========================================== /////////////////// Result Calculation=======///////////////////////////////////////////
$delbtbornores="DELETE from borno_class11_12_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_subject_eleven_twelve_id='$stusubjId' AND borno_school_stud_group='$group' AND borno_result_term_id='$selTerm' AND borno_result_exam_year='$styear'";
$mysqli->query($delbtbornores);


$delbtbornores12="DELETE from borno_class11_12_test_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND pare='$subpare' AND borno_result_term_id='$selTerm' AND borno_school_stud_group='$group' AND borno_result_exam_year='$styear'";
$mysqli->query($delbtbornores12);

$delgpa="DELETE from borno_school_11_12_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' AND borno_school_stud_group='$group' AND borno_result_exam_year='$styear'";
$mysqli->query($delgpa);
//----------- Get Subject Details Mark -------------------------------------------------------------------------------------------------

 $gtsdmrk="select * from borno_result_eleven_twelve_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' AND borno_school_stud_group='$group' AND borno_subject_eleven_twelve_id='$stusubjId'";
				
				$qgtsdmrk=$mysqli->query($gtsdmrk);
				$shsubjdet=$qgtsdmrk->fetch_assoc();
				$pare=$shsubjdet['pare'];
if($pare!=0)
{	
$gtsdmrk1="select * from borno_result_eleven_twelve_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' AND borno_school_stud_group='$group' AND borno_subject_eleven_twelve_id='$stusubjId' AND pare='$pare'";
				
				$qgtsdmrk1=$mysqli->query($gtsdmrk1);
				$shsubjdet1=$qgtsdmrk1->fetch_assoc();
		
				
				$numbtype11_conv=$shsubjdet1['number_type1_conv'];
				$numbtype12_conv=$shsubjdet1['number_type2_conv'];
				$numbtype13_conv=$shsubjdet1['number_type3_conv'];
				$numbtype14_conv=$shsubjdet1['number_type4_conv'];
				$numbtype15_conv=$shsubjdet1['number_type5_conv'];
				$numbtype16_conv=$shsubjdet1['number_type6_conv'];
				
				$gtnumty11pass=$shsubjdet1['number_type1_pass'];
				$gtnumty12pass=$shsubjdet1['number_type2_pass'];
				$gtnumty13pass=$shsubjdet1['number_type3_pass'];
				$gtnumty14pass=$shsubjdet1['number_type4_pass'];
				$gtnumty15pass=$shsubjdet1['number_type5_pass'];
				$gtnumty16pass=$shsubjdet1['number_type6_pass'];
				$gtsubjfmark1=$shsubjdet1['borno_eleven_twelve_subfullmark'];	
					
		 $gtsdmrk2="select * from borno_result_eleven_twelve_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' AND borno_school_stud_group='$group' AND borno_subject_eleven_twelve_id!='$stusubjId' AND pare='$pare'";
				
				$qgtsdmrk2=$mysqli->query($gtsdmrk2);
				$shsubjdet2=$qgtsdmrk2->fetch_assoc();
		
				$stusubjId1=$shsubjdet2['borno_subject_eleven_twelve_id'];
				$numbtype21_conv=$shsubjdet2['number_type1_conv'];
				$numbtype22_conv=$shsubjdet2['number_type2_conv'];
				$numbtype23_conv=$shsubjdet2['number_type3_conv'];
				$numbtype24_conv=$shsubjdet2['number_type4_conv'];
				$numbtype25_conv=$shsubjdet2['number_type5_conv'];
				$numbtype26_conv=$shsubjdet2['number_type6_conv'];
				
				$gtnumty21pass=$shsubjdet2['number_type1_pass'];
				$gtnumty22pass=$shsubjdet2['number_type2_pass'];
				$gtnumty23pass=$shsubjdet2['number_type3_pass'];
				$gtnumty24pass=$shsubjdet2['number_type4_pass'];
				$gtnumty25pass=$shsubjdet2['number_type5_pass'];
				$gtnumty26pass=$shsubjdet2['number_type6_pass'];
				
				$gtsubjfmark2=$shsubjdet2['borno_eleven_twelve_subfullmark'];
				
				$gtnumty1pass=$gtnumty11pass+$gtnumty21pass;
				$gtnumty2pass=$gtnumty12pass+$gtnumty22pass;
				$gtnumty3pass=$gtnumty13pass+$gtnumty23pass;
				$gtnumty4pass=$gtnumty14pass+$gtnumty24pass;
				$gtnumty5pass=$gtnumty15pass+$gtnumty25pass;
				$gtnumty6pass=$gtnumty16pass+$gtnumty26pass;
									


	

	
	
	$gtsubjfmark=$gtsubjfmark1+$gtsubjfmark2;
	
			 $gtsdmrk3="select * from borno_result_eleven_twelve_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' AND borno_school_stud_group='$group' AND pare='$pare' order by borno_subject_eleven_twelve_id desc limit 0,1";
				
				$qgtsdmrk3=$mysqli->query($gtsdmrk3);
				$shsubjdet3=$qgtsdmrk3->fetch_assoc();
				$subjectidpare=$shsubjdet3['borno_subject_eleven_twelve_id'];
}
else
{								
				$numbtype1_conv=$shsubjdet['number_type1_conv'];
				$numbtype2_conv=$shsubjdet['number_type2_conv'];
				$numbtype3_conv=$shsubjdet['number_type3_conv'];
				$numbtype4_conv=$shsubjdet['number_type4_conv'];
				$numbtype5_conv=$shsubjdet['number_type5_conv'];
				$numbtype6_conv=$shsubjdet['number_type6_conv'];
				$gtsubjfmark=$shsubjdet['borno_eleven_twelve_subfullmark'];

	
	
}

//---------- END Subject Details ----------------------------------------------------------------------------------------------------------------------------------


//---------------- Grading  ---------------------------------------------------

		$getgrdpoint="select * from borno_grading_chart where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess'";
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

		$gtctmarg="select * from borno_class11_12_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_subject_eleven_twelve_id='$stusubjId' AND borno_result_term_id='$selTerm' AND borno_school_stud_group='$group' AND borno_result_exam_year='$styear'";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){
		  
		
		
		$studinfoId=$shgtctmarg['borno_student_info_id']; 
		$studName=$shgtctmarg['borno_school_student_name']; 
		$studRoll=$shgtctmarg['borno_school_roll']; 
		$subpare=$shgtctmarg['subject_pare']; 
		$sub4th=$shgtctmarg['stu4thsub']; 
		
		if($subpare!=0)
		{
			
 $delpare1="delete from borno_class11_12_test_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND pare='$subpare' AND borno_result_term_id='$selTerm' AND borno_school_stud_group='$group' AND borno_result_exam_year='$styear' AND borno_subject_eleven_twelve_id='$subjectidpare' AND borno_student_info_id='$studinfoId'";
    $mysqli->query($delpare1);	



			//------ Subject 1-----------------------
				$gtctmarg1="select * from borno_class11_12_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_subject_eleven_twelve_id='$stusubjId' AND borno_result_term_id='$selTerm' AND borno_school_stud_group='$group' AND borno_result_exam_year='$styear' AND borno_student_info_id='$studinfoId' AND subject_pare='$subpare'";
  
    $qgtctmarg1=$mysqli->query($gtctmarg1);
	$shgtctmarg1=$qgtctmarg1->fetch_assoc();
		
		if($shgtctmarg1['temp_res_number_type1']!="")
		{	
		$numbty11=$shgtctmarg1['temp_res_number_type1'];
		$convnumbty11=($numbty11/100) * $numbtype11_conv;
		
		
		$numbty12=$shgtctmarg1['temp_res_number_type2'];
		$convnumbty12=($numbty12/100)  * $numbtype12_conv;
		
		
		$numbty13=$shgtctmarg1['temp_res_number_type3']; 
		$convnumbty13=($numbty13/100)  * $numbtype13_conv;
		
		
		$numbty14=$shgtctmarg1['temp_res_number_type4']; 
		$convnumbty14=($numbty14/100)  * $numbtype14_conv;
		
		
		$numbty15=$shgtctmarg1['temp_res_number_type5'];
		$convnumbty15=($numbty15/100)  * $numbtype15_conv;
		
		
		$numbty16=$shgtctmarg1['temp_res_number_type6'];
		$convnumbty16=($numbty16/100)  * $numbtype16_conv;
		
		
	   $gttotalmrk1=($numbty11+$numbty12+$numbty13+$numbty14+$numbty15+$numbty16);
		$gtconvtotal1=($convnumbty11+$convnumbty12+$convnumbty13+$convnumbty14+$convnumbty15+$convnumbty16);
		
		$markinpers1=($gtconvtotal1*100)/$gtsubjfmark1;
		
		}

//------ Subject 2-----------------------

				 $gtctmarg2="select * from borno_class11_12_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_subject_eleven_twelve_id!='$stusubjId' AND borno_result_term_id='$selTerm' AND borno_school_stud_group='$group' AND borno_result_exam_year='$styear' AND borno_student_info_id='$studinfoId' AND subject_pare='$subpare'";
  
    $qgtctmarg2=$mysqli->query($gtctmarg2);
	$shgtctmarg2=$qgtctmarg2->fetch_assoc();
	
	
		
		if($shgtctmarg2['temp_res_number_type1']!="")
		{	
		$numbty21=$shgtctmarg2['temp_res_number_type1'];
		$convnumbty21=($numbty21/100) * $numbtype21_conv;
		
		
		$numbty22=$shgtctmarg2['temp_res_number_type2'];
		$convnumbty22=($numbty22/100)  * $numbtype22_conv;
		
		
		$numbty23=$shgtctmarg2['temp_res_number_type3']; 
		$convnumbty23=($numbty23/100)  * $numbtype23_conv;
		
		
		$numbty24=$shgtctmarg2['temp_res_number_type4']; 
		$convnumbty24=($numbty24/100)  * $numbtype24_conv;
		
		
		$numbty25=$shgtctmarg2['temp_res_number_type5'];
		$convnumbty25=($numbty25/100)  * $numbtype25_conv;
		
		
		$numbty26=$shgtctmarg2['temp_res_number_type6'];
		$convnumbty26=($numbty26/100)  * $numbtype26_conv;
		
		
	    $gttotalmrk2=($numbty21+$numbty22+$numbty23+$numbty24+$numbty25+$numbty26);
		$gtconvtota21=($convnumbty21+$convnumbty22+$convnumbty13+$convnumbty14+$convnumbty15+$convnumbty16);
		}


//------ get number type from query top -----------------------	
	if($shgtctmarg1['temp_res_number_type1']!="" AND $shgtctmarg2['temp_res_number_type1']!="")
	{
		$numbty1=$numbty11+$numbty21;
		$numbty2=$numbty12+$numbty22;
		$numbty3=$numbty13+$numbty23;
		$numbty4=$numbty14+$numbty24;
		$numbty5=$numbty15+$numbty25;
		$numbty6=$numbty16+$numbty26;

		$convnumbty1=$convnumbty11+$convnumbty21;
		$convnumbty2=$convnumbty12+$convnumbty22;
		$convnumbty3=$convnumbty13+$convnumbty23;
		$convnumbty4=$convnumbty14+$convnumbty24;
		$convnumbty5=$convnumbty15+$convnumbty25;
		$convnumbty6=$convnumbty16+$convnumbty26;
		
		$gttotalmrk=$numbty1+$numbty2+$numbty3+$numbty4+$numbty5+$numbty6;
		$gtconvtotal=$convnumbty1+$convnumbty2+$convnumbty3+$convnumbty4+$convnumbty5+$convnumbty6;	
		$markinpers=($gtconvtotal*100)/$gtsubjfmark;
		
		
	}
	elseif($shgtctmarg1['temp_res_number_type1']!="" AND $shgtctmarg2['temp_res_number_type1']=="")
	{
		$numbty1=$numbty11+0;
		$numbty2=$numbty12+0;
		$numbty3=$numbty13+0;
		$numbty4=$numbty14+0;
		$numbty5=$numbty15+0;
		$numbty6=$numbty16+0;

		$convnumbty1=$convnumbty11+0;
		$convnumbty2=$convnumbty12+0;
		$convnumbty3=$convnumbty13+0;
		$convnumbty4=$convnumbty14+0;
		$convnumbty5=$convnumbty15+0;
		$convnumbty6=$convnumbty16+0;

		$gttotalmrk=$numbty1+$numbty2+$numbty3+$numbty4+$numbty5+$numbty6;
		$gtconvtotal=$convnumbty1+$convnumbty2+$convnumbty3+$convnumbty4+$convnumbty5+$convnumbty6;	
		$markinpers=($gtconvtotal*100)/$gtsubjfmark;
	}
	elseif($shgtctmarg1['temp_res_number_type1']=="" AND $shgtctmarg2['temp_res_number_type1']!="")
	{
		$numbty1=0+$numbty21;
		$numbty2=0+$numbty22;
		$numbty3=0+$numbty23;
		$numbty4=0+$numbty24;
		$numbty5=0+$numbty25;
		$numbty6=0+$numbty26;
		
		$convnumbty1=0+$convnumbty21;
		$convnumbty2=0+$convnumbty22;
		$convnumbty3=0+$convnumbty23;
		$convnumbty4=0+$convnumbty24;
		$convnumbty5=0+$convnumbty25;
		$convnumbty6=0+$convnumbty26;
		

		$gttotalmrk=$numbty1+$numbty2+$numbty3+$numbty4+$numbty5+$numbty6;
		$gtconvtotal=$convnumbty1+$convnumbty2+$convnumbty3+$convnumbty4+$convnumbty5+$convnumbty6;	
	 $gtsubjfmark;	
		$markinpers=($gtconvtotal*100)/$gtsubjfmark;
	}
		}
		
		
		
		else
		{
		$delpare1="delete from borno_class11_12_test_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND pare='$subpare' AND borno_result_term_id='$selTerm' AND borno_school_stud_group='$group' AND borno_result_exam_year='$styear' AND borno_subject_eleven_twelve_id='$stusubjId' AND borno_student_info_id='$studinfoId'";
    $mysqli->query($delpare1);		
			
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
		
		$markinpers=($gtconvtotal*100)/$gtsubjfmark;

		$gtnumty1=$shsubjdet['number_type1_marks'];
		$gtnumty1pass=$shsubjdet['number_type1_pass'];
		
		
		$gtnumty2=$shsubjdet['number_type2_marks'];
		$gtnumty2pass=$shsubjdet['number_type2_pass'];
		
		
		$gtnumty3=$shsubjdet['number_type3_marks'];
		$gtnumty3pass=$shsubjdet['number_type3_pass'];
		
		
		$gtnumty4=$shsubjdet['number_type4_marks'];
		$gtnumty4pass=$shsubjdet['number_type4_pass'];
		
		
		$gtnumty5=$shsubjdet['number_type5_marks'];
		$gtnumty5pass=$shsubjdet['number_type5_pass'];
		
		
		$gtnumty6=$shsubjdet['number_type6_marks'];
		$gtnumty6pass=$shsubjdet['number_type6_pass'];
		}
//----------------------------- Grading ------------------------------------------------------------------

		//------ get number type from query top -----------------------
		



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
		
		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $markinpers>=$gtmarksfrom7) { $finallg=$gtlettergrd7; } 
		
		else { $finallg='F'; } 
// ------------------------ Eng lg --------------------------------------------------------------			




//------------------------------------  Greade Point (GPA)-1 ----------------------------------------------------------------------	
		if($numbty11>=$gtnumty11pass AND $numbty12>=$gtnumty12pass AND $numbty13>=$gtnumty13pass AND $numbty14>=$gtnumty14pass AND $numbty15>=$gtnumty15pass AND $numbty16>=$gtnumty16pass AND $markinpers1>=$gtmarksfrom1) { $finalGpa1=$gtgrtpoint1; } 
		
		else if($numbty11>=$gtnumty11pass AND $numbty12>=$gtnumty12pass AND $numbty13>=$gtnumty13pass AND $numbty14>=$gtnumty14pass AND $numbty15>=$gtnumty15pass AND $numbty16>=$gtnumty16pass AND $markinpers1>=$gtmarksfrom2) { $finalGpa1=$gtgrtpoint2; }
		
		else if($numbty11>=$gtnumty11pass AND $numbty12>=$gtnumty12pass AND $numbty13>=$gtnumty13pass AND $numbty14>=$gtnumty14pass AND $numbty15>=$gtnumty15pass AND $numbty16>=$gtnumty16pass AND $markinpers1>=$gtmarksfrom3) { $finalGpa1=$gtgrtpoint3; } 
		
		else if($numbty11>=$gtnumty11pass AND $numbty12>=$gtnumty12pass AND $numbty13>=$gtnumty13pass AND $numbty14>=$gtnumty14pass AND $numbty15>=$gtnumty15pass AND $numbty16>=$gtnumty16pass AND $markinpers1>=$gtmarksfrom4) { $finalGpa1=$gtgrtpoint4; } 
		
		else if($numbty11>=$gtnumty11pass AND $numbty12>=$gtnumty12pass AND $numbty13>=$gtnumty13pass AND $numbty14>=$gtnumty14pass AND $numbty15>=$gtnumty15pass AND $numbty16>=$gtnumty16pass AND $markinpers1>=$gtmarksfrom5) { $finalGpa1=$gtgrtpoint5; } 
		
		else if($numbty11>=$gtnumty11pass AND $numbty12>=$gtnumty12pass AND $numbty13>=$gtnumty13pass AND $numbty14>=$gtnumty14pass AND $numbty15>=$gtnumty15pass AND $numbty16>=$gtnumty16pass AND $markinpers1>=$gtmarksfrom6) { $finalGpa1=$gtgrtpoint6; } 
		
		else if($numbty11>=$gtnumty11pass AND $numbty12>=$gtnumty12pass AND $numbty13>=$gtnumty13pass AND $numbty14>=$gtnumty14pass AND $numbty15>=$gtnumty15pass AND $numbty16>=$gtnumty16pass AND $markinpers1>=$gtmarksfrom7) { $finalGpa1=$gtgrtpoint7; } 
		
		else { $finalGpa1=0; } 
// ------------------------ End GPA --------------------------------------------------------------	

//----------------------------- Latter Grade ------------------------------------------------------------------
		if($numbty11>=$gtnumty11pass AND $numbty12>=$gtnumty12pass AND $numbty13>=$gtnumty13pass AND $numbty14>=$gtnumty14pass AND $numbty15>=$gtnumty15pass AND $numbty16>=$gtnumty16pass AND $markinpers1>=$gtmarksfrom1) { $finallg1=$gtlettergrd1; } 
		
		else if($numbty11>=$gtnumty11pass AND $numbty12>=$gtnumty12pass AND $numbty13>=$gtnumty13pass AND $numbty14>=$gtnumty14pass AND $numbty15>=$gtnumty15pass AND $numbty16>=$gtnumty16pass AND $markinpers1>=$gtmarksfrom2) { $finallg1=$gtlettergrd2; }
		
		else if($numbty11>=$gtnumty11pass AND $numbty12>=$gtnumty12pass AND $numbty13>=$gtnumty13pass AND $numbty14>=$gtnumty14pass AND $numbty15>=$gtnumty15pass AND $numbty16>=$gtnumty16pass AND $markinpers1>=$gtmarksfrom3) { $finallg1=$gtlettergrd3; } 
		
		else if($numbty11>=$gtnumty11pass AND $numbty12>=$gtnumty12pass AND $numbty13>=$gtnumty13pass AND $numbty14>=$gtnumty14pass AND $numbty15>=$gtnumty15pass AND $numbty16>=$gtnumty16pass AND $markinpers1>=$gtmarksfrom4) { $finallg1=$gtlettergrd4; } 
		
		else if($numbty11>=$gtnumty11pass AND $numbty12>=$gtnumty12pass AND $numbty13>=$gtnumty13pass AND $numbty14>=$gtnumty14pass AND $numbty15>=$gtnumty15pass AND $numbty16>=$gtnumty16pass AND $markinpers1>=$gtmarksfrom5) { $finallg1=$gtlettergrd5; } 
		
		else if($numbty11>=$gtnumty11pass AND $numbty12>=$gtnumty12pass AND $numbty13>=$gtnumty13pass AND $numbty14>=$gtnumty14pass AND $numbty15>=$gtnumty15pass AND $numbty16>=$gtnumty16pass AND $markinpers1>=$gtmarksfrom6) { $finallg1=$gtlettergrd6; } 
		
		else if($numbty11>=$gtnumty11pass AND $numbty12>=$gtnumty12pass AND $numbty13>=$gtnumty13pass AND $numbty14>=$gtnumty14pass AND $numbty15>=$gtnumty15pass AND $numbty16>=$gtnumty16pass AND $markinpers1>=$gtmarksfrom7) { $finallg1=$gtlettergrd7; } 
		
		else { $finallg1='F'; } 
		


// ------------------------ Eng lg --------------------------------------------------------------		
if($subpare!=0)
{
  $insfmark="INSERT INTO `borno_class11_12_test_result` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, `borno_subject_eleven_twelve_id`, `borno_result_term_id`,`borno_result_exam_year`, `borno_student_info_id`, `borno_school_roll`, `borno_school_student_name`, `temp_res_number_type1`, `temp_res_number_type1_conv`, `res_number_type2`, `res_number_type2_conv`, `res_number_type3`, `res_number_type3_conv`, `res_number_type4`, `res_number_type4_conv`, `res_number_type5`, `res_number_type5_conv`, `res_number_type6`, `res_number_type6_conv`, `res_total_mark`, `res_total_conv`,`mark_in_present`, `res_gpa`, `res_lg`,`pare`,`uncountable`,`borno_school_stud_group`,`stu4thsub`)
		
		
		 VALUES ('$schId', '$branchId', '$studClass', '$shiftId', '$section', '$stsess', '$subjectidpare', '$selTerm','$styear', '$studinfoId', '$studRoll', '$studName', '$numbty1', '$convnumbty1', '$numbty2', '$convnumbty2', '$numbty3', '$convnumbty3', '$numbty4', '$convnumbty4', '$numbty5', '$convnumbty5', '$numbty6', '$convnumbty6', '$gttotalmrk', '$gtconvtotal','$markinpers', '$finalGpa', '$finallg','$subpare','0','$group','$sub4th')";
		 
		 
	
$quygeneralsubmark=$mysqli->query($insfmark);

  $insfmark1="INSERT INTO `borno_class11_12_final_result` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, `borno_subject_eleven_twelve_id`, `borno_result_term_id`,`borno_result_exam_year`, `borno_student_info_id`, `borno_school_roll`, `borno_school_student_name`, `temp_res_number_type1`, `temp_res_number_type1_conv`, `res_number_type2`, `res_number_type2_conv`, `res_number_type3`, `res_number_type3_conv`, `res_number_type4`, `res_number_type4_conv`, `res_number_type5`, `res_number_type5_conv`, `res_number_type6`, `res_number_type6_conv`, `res_total_mark`, `res_total_conv`,`mark_in_present`, `res_gpa`, `res_lg`,`pare`,`six_eight_4th_subject`,`uncountable`,`borno_school_stud_group`,`stu4thsub`)
		
		
		 VALUES ('$schId', '$branchId', '$studClass', '$shiftId', '$section', '$stsess', '$stusubjId', '$selTerm','$styear', '$studinfoId', '$studRoll', '$studName', '$numbty11', '$convnumbty11', '$numbty12', '$convnumbty12', '$numbty13', '$convnumbty13', '$numbty14', '$convnumbty14', '$numbty15', '$convnumbty15', '$numbty16', '$convnumbty16', '$gttotalmrk1', '$gtconvtotal1','$markinpers1', '$finalGpa1', '$finallg1','$subpare','0','0','$group','$sub4th')";
		 
		 
	
$quygeneralsubmark1=$mysqli->query($insfmark1);


}

else
{
 $insfmark="INSERT INTO `borno_class11_12_test_result` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, `borno_subject_eleven_twelve_id`, `borno_result_term_id`, `borno_result_exam_year`,`borno_student_info_id`, `borno_school_roll`, `borno_school_student_name`, `temp_res_number_type1`, `temp_res_number_type1_conv`, `res_number_type2`, `res_number_type2_conv`, `res_number_type3`, `res_number_type3_conv`, `res_number_type4`, `res_number_type4_conv`, `res_number_type5`, `res_number_type5_conv`, `res_number_type6`, `res_number_type6_conv`, `res_total_mark`, `res_total_conv`,`mark_in_present`, `res_gpa`, `res_lg`,`pare`,`uncountable`,`borno_school_stud_group`,`stu4thsub`)
		
		
		 VALUES ('$schId', '$branchId', '$studClass', '$shiftId', '$section', '$stsess', '$stusubjId', '$selTerm','$styear', '$studinfoId', '$studRoll', '$studName', '$numbty1', '$convnumbty1', '$numbty2', '$convnumbty2', '$numbty3', '$convnumbty3', '$numbty4', '$convnumbty4', '$numbty5', '$convnumbty5', '$numbty6', '$convnumbty6', '$gttotalmrk', '$gtconvtotal','$markinpers', '$finalGpa', '$finallg','$subpare','0','$group','$sub4th')";
		
$quygeneralsubmark=$mysqli->query($insfmark);

  $insfmark1="INSERT INTO `borno_class11_12_final_result` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, `borno_subject_eleven_twelve_id`, `borno_result_term_id`, `borno_result_exam_year`,`borno_student_info_id`, `borno_school_roll`, `borno_school_student_name`, `temp_res_number_type1`, `temp_res_number_type1_conv`, `res_number_type2`, `res_number_type2_conv`, `res_number_type3`, `res_number_type3_conv`, `res_number_type4`, `res_number_type4_conv`, `res_number_type5`, `res_number_type5_conv`, `res_number_type6`, `res_number_type6_conv`, `res_total_mark`, `res_total_conv`,`mark_in_present`, `res_gpa`, `res_lg`,`pare`,`six_eight_4th_subject`,`uncountable`,`borno_school_stud_group`,`stu4thsub`)
		
		
		 VALUES ('$schId', '$branchId', '$studClass', '$shiftId', '$section', '$stsess', '$stusubjId', '$selTerm','$styear', '$studinfoId', '$studRoll', '$studName', '$numbty1', '$convnumbty1', '$numbty2', '$convnumbty2', '$numbty3', '$convnumbty3', '$numbty4', '$convnumbty4', '$numbty5', '$convnumbty5', '$numbty6', '$convnumbty6', '$gttotalmrk', '$gtconvtotal','$markinpers', '$finalGpa', '$finallg','$subpare','0','0','$group','$sub4th')";

$quygeneralsubmark1=$mysqli->query($insfmark1);


}
}
		

if($quygeneralsubmark) { header("location:marks_entry.php?msg=1&branchId=$schsId&studClass=$studClass&shiftId=$shiftId&section=$section&stsess=$stsess&selTerm=$selTerm");} else {  header('location:marks_entry.php?msg=2'); }
	}

?>