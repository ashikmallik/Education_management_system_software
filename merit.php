<?php 

include('connection.php');

$schId = 1;
$studClass = 1 ;
$stsess = '2022';
$branchId = 1 ;
$selTerm = 45;


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
  
  
  

		$gtctmarg="select * from borno_class9_10_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_subject_nine_ten_id='$stusubjId'
		AND borno_result_term_id='$selTerm'  order by borno_school_roll asc";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){
		  
		
		
		$studinfoId=$shgtctmarg['borno_student_info_id']; 
		$studName=$shgtctmarg['borno_school_student_name']; 
		$studRoll=$shgtctmarg['borno_school_roll']; 
		$stu4thsub123=$shgtctmarg['stu4thsub']; 
		
		
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
		if($schId==60){$gtconvtotal=number_format($gtconvtotal);}
		$markinpers=(($gtconvtotal*100)/$gtsubjfmark);
		}
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

 
  if($numbty1!="") { $numbty1=$numbty1; } else { $numbty1=0; }
 if($convnumbty1!="") { $convnumbty1=$convnumbty1; } else { $convnumbty1=0; }
 
 if($numbty2!="") { $numbty2=$numbty2; } else { $numbty2=0; }
 if($convnumbty2!="") { $convnumbty2=$convnumbty2; } else { $convnumbty2=0; }
 
 if($numbty3!="") { $numbty3=$numbty3; } else { $numbty3=0; }
 if($convnumbty3!="") { $convnumbty3=$convnumbty3; } else { $convnumbty3=0; }
 
 if($numbty4!="") { $numbty4=$numbty4; } else { $numbty4=0; }
 if($convnumbty4!="") { $convnumbty4=$convnumbty4; } else { $convnumbty4=0; }
 
 if($numbty5!="") { $numbty5=$numbty5; } else { $numbty5=0; }
 if($convnumbty5!="") { $convnumbty5=$convnumbty5; } else { $convnumbty5=0; }
 
 if($numbty6!="") { $numbty6=$numbty6; } else { $numbty6=0; }
 if($convnumbty6!="") { $convnumbty6=$convnumbty6; } else { $convnumbty6=0; }
 
 if($sub4th!="") { $sub4th=$sub4th; } else { $sub4th=0; }
 

   $insfmark="INSERT INTO `borno_class9_10_final_result` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, `borno_subject_nine_ten_id`, `borno_result_term_id`, `borno_student_info_id`, `borno_school_roll`, `borno_school_student_name`, `temp_res_number_type1`, `temp_res_number_type1_conv`, `res_number_type2`, `res_number_type2_conv`, `res_number_type3`, `res_number_type3_conv`, `res_number_type4`, `res_number_type4_conv`, `res_number_type5`, `res_number_type5_conv`, `res_number_type6`, `res_number_type6_conv`, `res_total_mark`, `res_total_conv`,`mark_in_present`, `res_gpa`, `res_lg`,`pare`,`six_eight_4th_subject`,`uncountable`,`borno_school_stud_group`,`stu4thsub`,`heightsubjt1`,`heightsubjt2`)
		
		
		 VALUES ('$schId', '$branchId', '$studClass', '$shiftId', '$section', '$stsess', '$stusubjId', '$selTerm', '$studinfoId', '$studRoll', '$studName', '$numbty1', '$convnumbty1', '$numbty2', '$convnumbty2', '$numbty3', '$convnumbty3', '$numbty4', '$convnumbty4', '$numbty5', '$convnumbty5', '$numbty6', '$convnumbty6', '$gttotalmrk', '$gtconvtotal','$markinpers', '$finalGpa', '$finallg','$pare','$sub4th','$uncountable','$group','$stu4thsub123','$gtconvtotal','$gtconvtotal')";
		$quygeneralsubmark=$mysqli->query($insfmark);






?>