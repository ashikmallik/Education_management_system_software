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
		
		$selTerm = clean_html($_POST['selTerm']);
		$selTerm1 = strip_tags($_POST['selTerm']);
		
	//	$group = clean_html($_POST['group']);
	//	$group1 = strip_tags($_POST['group']);
	
	
//---------------- Grading  ---------------------------------------------------	
	
$getgrdpoint="select * from borno_grading_chart where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1'";
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
//-------------------------Nine To Ten GrandTotal GPA Set-------------------
if($studClass1==1 OR $studClass1==2)
{
    
//===========================Subject Count Start=======================    
    $uncoun="select * from borno_result_nine_ten_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' AND borin_subject_nine_ten_id='7' AND uncountable=1"; 
 
    $guncoun=$mysqli->query($uncoun);
    $sguncoun=$guncoun->fetch_assoc();
	$uncountable1=$sguncoun['borin_subject_nine_ten_id']; 
	if($uncountable1!=""){$uncs1=1;}else{$uncs1=0;}

   $uncoun1="select * from borno_result_nine_ten_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' AND borin_subject_nine_ten_id='9' AND uncountable=1"; 
   
    $guncoun1=$mysqli->query($uncoun1);
    $sguncoun1=$guncoun1->fetch_assoc();
	$uncountable2=$sguncoun1['borin_subject_nine_ten_id']; 
	if($uncountable2!=""){$uncs2=1;}else{$uncs2=0;}
	
    $uncoun2="select * from borno_result_nine_ten_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' AND borin_subject_nine_ten_id='7' AND uncountable=0"; 
    $guncoun2=$mysqli->query($uncoun2);
    $sguncoun2=$guncoun2->fetch_assoc();
	$uncountable3=$sguncoun2['borin_subject_nine_ten_id']; 
	if($uncountable3!=""){$uncs3=1;}else{$uncs3=0;}

    $uncoun3="select * from borno_result_nine_ten_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' AND borin_subject_nine_ten_id='9' AND uncountable=0"; 
    $guncoun3=$mysqli->query($uncoun3);
    $sguncoun3=$guncoun3->fetch_assoc();
	$uncountable4=$sguncoun3['borin_subject_nine_ten_id']; 
	if($uncountable4!=""){$uncs4=1;}else{$uncs4=0;}	
	
	
	if($uncs1==1 AND $uncs2==1 AND $uncs3==0 AND $uncs4==0)
	{$getmotsub=9;}	
	elseif($uncs1==0 AND $uncs2==0 AND $uncs3==1 AND $uncs4==1)
	{$getmotsub=11;}
	elseif($uncs1==0 AND $uncs2==0 AND $uncs3==0 AND $uncs4==0)
	{$getmotsub=9;}

//===========================Subject Count End=======================  

	$delinfo="delete from borno_school_9_10_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' ";
	
	$mysqli->query($delinfo);
	


 $gtctmarg1="select borno_student_info_id from borno_class9_10_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1'  group by borno_student_info_id asc";
     $qgtctmarg1=$mysqli->query($gtctmarg1);
	while($shgtctmarg1=$qgtctmarg1->fetch_assoc()){
		
		$totalmark = 0;
		$totalconvartmark = array();
		
		$totalgpa1=0;
		$totalgpa=0;
		$gtgap= array();
		
	
		
		$studinfoId1=$shgtctmarg1['borno_student_info_id']; 

		$gtctmarg="select * from borno_class9_10_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1'  AND borno_student_info_id='$studinfoId1' AND stu4thsub=0 AND uncountable=0";
  
	
    $qgtctmarg=$mysqli->query($gtctmarg);	
	$totalsubject=mysqli_num_rows($qgtctmarg);	
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){
		  
	
		$studinfoId = $shgtctmarg['borno_student_info_id']; 
		$studName = $shgtctmarg['borno_school_student_name']; 
		$studRoll = $shgtctmarg['borno_school_roll']; 
		$group1 = $shgtctmarg['borno_school_stud_group']; 
		
		//=============================================== 4th Subject ===================================
		$get4thsubmrk="select * from borno_class9_10_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1'  AND borno_student_info_id='$studinfoId1' AND borno_student_info_id='$studinfoId1'  AND stu4thsub=1";
		
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
	
	
    if($totalmark!=0)
{
    
$b = str_replace( ',', '', $totalmark );

if( is_numeric( $b ) ) {
    $totalmark = $b;
}

$b1 = str_replace( ',', '', $totalmark3 );

if( is_numeric( $b1 ) ) {
    $totalmark3 = $b1;
}    
    $gtFinalGPA11=substr($gtFinalGPA,0,4);
    $gtFinalGPA12=substr($gtFinalGPA1,0,4);
	 $insfmark="INSERT INTO `borno_school_9_10_merit` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`,`borno_school_stud_group`, `borno_result_term_id`, `borno_student_info_id`, `borno_school_roll`, `borno_school_student_name`, `grandtotal`,`grandtotal1`, `gpa`, `gpa1`, `finallg`, `meritno_class`, `merit_class`, `meritno_shift`, `merit_shift`, `meritno_section`, `merit_section`, `failno`, `fail_subject`) 
	
	VALUES ('$schId', '$branchId1', '$studClass1', '$shiftId1', '$section1', '$stsess1','$group1', '$selTerm1', '$studinfoId', '$studRoll', '$studName', '$totalmark', '$totalmark3', '$gtFinalGPA11', '$gtFinalGPA12', '$finallg', '0', '', '0', '', '0', '', '0', '')";
		
	
 	$qins=$mysqli->query($insfmark);
}
 		}

}	

//------------------------------------End Nine Ten GrandTotal GPA Set-------------------
		
//------------------------------------Six To Eight GrandTotal GPA Set-------------------
elseif($studClass1==3 OR $studClass1==4 OR $studClass1==5)
{
 $gettotlsub="select * from borno_result_six_eight_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND six_eight_4th_subject=0 AND uncountable=0";
 	 $qgettotlsub=$mysqli->query($gettotlsub);	
	 $getmotsub1=mysqli_num_rows($qgettotlsub);
		
 
	
	
	

	$getpare1="select * from borno_result_six_eight_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND subject_id_six_eight='1'";
		
		$qgetpare1=$mysqli->query($getpare1);
		$shqgetpare1=$qgetpare1->fetch_assoc();	 
		$pare1=$shqgetpare1['subject_id_six_eight']; 
		if($pare1!=""){$p1=1;}
		else{$p1=0;}
    $getpare2="select * from borno_result_six_eight_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND subject_id_six_eight='3'";
		
		$qgetpare2=$mysqli->query($getpare2);
		$shqgetpare2=$qgetpare2->fetch_assoc();	
		$pare2=$shqgetpare2['subject_id_six_eight']; 
		if($pare2!=""){$p2=1;}
		else{$p2=0;}
		$ptotal=$p1+$p2;	 
	 if($schId==51){$ptotal=0;}
	$getmotsub=$getmotsub1-$ptotal;
        
         
	$delinfo="delete from borno_school_6_8_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1'";
	
	$mysqli->query($delinfo);

$gtctmarg1="select borno_student_info_id from borno_class6_8_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' group by borno_student_info_id asc";
  
  
  
    $qgtctmarg1=$mysqli->query($gtctmarg1);
	while($shgtctmarg1=$qgtctmarg1->fetch_assoc()){
		
		$totalmark = 0;
		$totalconvartmark = array();

		$totalgpa=0;
		$gtgap= array();
		
		
		$studinfoId1=$shgtctmarg1['borno_student_info_id']; 
		

		$gtctmarg="select * from borno_class6_8_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_student_info_id='$studinfoId1' AND six_eight_4th_subject=0 AND uncountable=0";
  
	
    $qgtctmarg=$mysqli->query($gtctmarg);
	$totalsubject=mysqli_num_rows($qgtctmarg);  
	

	while($shgtctmarg=$qgtctmarg->fetch_assoc()){

		$studinfoId = $shgtctmarg['borno_student_info_id']; 
		$studName = $shgtctmarg['borno_school_student_name']; 
		$studRoll = $shgtctmarg['borno_school_roll']; 
		
		//=============================================== 4th Subject ===================================
    	$get4thsubmrk="select * from borno_class6_8_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_student_info_id='$studinfoId1' AND six_eight_4th_subject=1 AND uncountable=0";
		
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
	  
	   
	   $totalgpa1 = array_sum($gtgap);
	   
	   $gttotalgpa=($totalgpa1+$gtfinalgpa)/$totalsubject;
	   
	   if($gttotalgpa>5) { $totalgpa=5; } else { $totalgpa=$gttotalgpa; } 
	   
	   
	    if(in_array(0,$gtgap)) { $gtFinalGPA=0; }
		
		else if($getmotsub!=$totalsubject) { $gtFinalGPA=0; }
		
		 else { $gtFinalGPA=$totalgpa; }
		 
}

	if($gtFinalGPA==$gtgrtpoint1){$finallg=$gtlettergrd1;}
	elseif($gtFinalGPA>=$gtgrtpoint2 AND $gtFinalGPA<$gtgrtpoint1){$finallg=$gtlettergrd2;}
	elseif($gtFinalGPA>=$gtgrtpoint3 AND $gtFinalGPA<$gtgrtpoint2){$finallg=$gtlettergrd3;}
	elseif($gtFinalGPA>=$gtgrtpoint4 AND $gtFinalGPA<$gtgrtpoint3){$finallg=$gtlettergrd4;}
	elseif($gtFinalGPA>=$gtgrtpoint5 AND $gtFinalGPA<$gtgrtpoint4){$finallg=$gtlettergrd5;}
	elseif($gtFinalGPA>=$gtgrtpoint6 AND $gtFinalGPA<$gtgrtpoint5){$finallg=$gtlettergrd6;}
	elseif($gtFinalGPA>=$gtgrtpoint7 AND $gtFinalGPA<$gtgrtpoint6){$finallg=$gtlettergrd7;}
	

    if($totalmark!=0)
{
$b = str_replace( ',', '', $totalmark );

if( is_numeric( $b ) ) {
    $totalmark = $b;
}    
    
    $gtFinalGPA1=substr($gtFinalGPA,0,4);
	$insfmark="INSERT INTO `borno_school_6_8_merit` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, `borno_result_term_id`, `borno_student_info_id`, `borno_school_roll`, `borno_school_student_name`, `grandtotal`, `gpa`, `finallg`, `meritno_class`, `merit_class`, `meritno_shift`, `merit_shift`, `meritno_section`, `merit_section`, `failno`, `fail_subject`) 
	
	VALUES ('$schId', '$branchId1', '$studClass1', '$shiftId1', '$section1', '$stsess1', '$selTerm1', '$studinfoId', '$studRoll', '$studName', '$totalmark', '$gtFinalGPA1', '$finallg', '0', '0', '0', '0', '0', '0', '0', '0')";
		
	
 	$qins=$mysqli->query($insfmark);

 }		}


  
}
//------------------------------------End Six To Eight GrandTotal GPA Set-------------------

//------------------------------------Play To Five GrandTotal GPA Set-------------------
else
{
$gettotlsub="select * from borno_result_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND subject_type=0";
 	 $qgettotlsub=$mysqli->query($gettotlsub);	 
	  $getmotsub1=mysqli_num_rows($qgettotlsub);
	  
    	$getpare1="select * from borno_result_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND pare='1'";
		
		$qgetpare1=$mysqli->query($getpare1);
		$shqgetpare1=$qgetpare1->fetch_assoc();	 
		$pare1=$shqgetpare1['pare']; 
		if($pare1!=""){$p1=1;}
		else{$p1=0;}
    	$getpare2="select * from borno_result_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND pare='2'";
		
		$qgetpare2=$mysqli->query($getpare2);
		$shqgetpare2=$qgetpare2->fetch_assoc();	
		$pare2=$shqgetpare2['pare']; 
		if($pare2!=""){$p2=1;}
		else{$p2=0;}
		$ptotal=$p1+$p2;
		$getmotsub=$getmotsub1-$ptotal;

	
	$delinfo="delete from borno_school_play_5_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1'";
	
	$mysqli->query($delinfo);

$gtctmarg1="select borno_student_info_id from borno_class1_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' group by borno_student_info_id asc";
  
  
  
    $qgtctmarg1=$mysqli->query($gtctmarg1);
	while($shgtctmarg1=$qgtctmarg1->fetch_assoc()){
		
		$totalmark = 0;
		$totalconvartmark = array();
		
		$totalgpa=0;
		$gtgap= array();
		
		
		$studinfoId1=$shgtctmarg1['borno_student_info_id']; 
		

		$gtctmarg="select * from borno_class1_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_student_info_id='$studinfoId1' AND subst=0";
  
	
    $qgtctmarg=$mysqli->query($gtctmarg);
	$totalsubject=mysqli_num_rows($qgtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){
		  
		
		
		$get4thsubmrk="select * from borno_class1_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_student_info_id='$studinfoId1' AND subst=0";
		
		
		

		$studinfoId = $shgtctmarg['borno_student_info_id']; 
		$studName = $shgtctmarg['borno_school_student_name']; 
		$studRoll = $shgtctmarg['borno_school_roll']; 
		
		//=============================================== 4th Subject ===================================
		
		
		
        
	//============================================== End ===================================================	
	
		$totalconvartmark[] = $shgtctmarg['res_total_conv'];
		$gtgap[] = $shgtctmarg['res_gpa'];

	  
	   $totalmark1 = array_sum($totalconvartmark); 
	   
	   $totalmark=number_format($totalmark1);
	   
	   
	   $totalgpa1 = array_sum($gtgap);
	   
	   $gttotalgpa=$totalgpa1/$totalsubject;
	   
	   if($gttotalgpa>5) { $totalgpa=5; } else { $totalgpa=$gttotalgpa; } 
	   
	   
	    if(in_array(0,$gtgap)) { $gtFinalGPA=0; }
		
		else if($getmotsub!=$totalsubject) { $gtFinalGPA=0; }
		
		 else { $gtFinalGPA=$totalgpa; }
		 }
		
	if($gtFinalGPA==$gtgrtpoint1){$finallg=$gtlettergrd1;}
	elseif($gtFinalGPA>=$gtgrtpoint2 AND $gtFinalGPA<$gtgrtpoint1){$finallg=$gtlettergrd2;}
	elseif($gtFinalGPA>=$gtgrtpoint3 AND $gtFinalGPA<$gtgrtpoint2){$finallg=$gtlettergrd3;}
	elseif($gtFinalGPA>=$gtgrtpoint4 AND $gtFinalGPA<$gtgrtpoint3){$finallg=$gtlettergrd4;}
	elseif($gtFinalGPA>=$gtgrtpoint5 AND $gtFinalGPA<$gtgrtpoint4){$finallg=$gtlettergrd5;}
	elseif($gtFinalGPA>=$gtgrtpoint6 AND $gtFinalGPA<$gtgrtpoint5){$finallg=$gtlettergrd6;}
	elseif($gtFinalGPA>=$gtgrtpoint7 AND $gtFinalGPA<$gtgrtpoint6){$finallg=$gtlettergrd7;}	

    if($totalmark!=0)
{
$b = str_replace( ',', '', $totalmark );

if( is_numeric( $b ) ) {
    $totalmark = $b;
}    
    
    $gtFinalGPA1=substr($gtFinalGPA,0,4);
	$insfmark="INSERT INTO `borno_school_play_5_merit` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, `borno_result_term_id`, `borno_student_info_id`, `borno_school_roll`, `borno_school_student_name`, `grandtotal`, `gpa`, `finallg`, `meritno_class`, `merit_class`, `meritno_shift`, `merit_shift`, `meritno_section`, `merit_section`, `failno`, `fail_subject`) 
	
	VALUES ('$schId', '$branchId1', '$studClass1', '$shiftId1', '$section1', '$stsess1', '$selTerm1', '$studinfoId', '$studRoll', '$studName', '$totalmark', '$gtFinalGPA1', '$finallg', '0', '0', '0', '0', '0', '0', '0', '0')";
		
		
 	$qins=$mysqli->query($insfmark);
}
 		}

}

//===================Play to Five End==============================



//====================Fail Subject Start===========================
/*
 $gtctmarg1="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_school_stud_group='$group1' Order by borno_student_info_id";
  
  
  
    $qgtctmarg1=$mysqli->query($gtctmarg1);
	while($shgtctmarg1=$qgtctmarg1->fetch_assoc()){
		
		
		
		
		$studinfoId1=$shgtctmarg1['borno_student_info_id']; 
		
		
//=========================Nine Ten Start=============================		
if($studClass==1 OR $studClass==2)
{		
		$insfmark3="UPDATE `borno_school_9_10_merit` SET `fail_subject`='' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$group1' AND borno_student_info_id='$studinfoId1'";		
		$qins3=$mysqli->query($insfmark3);
		
		$gtctmarg="select * from borno_class9_10_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$group1' AND borno_student_info_id='$studinfoId1' AND res_gpa=0 AND stu4thsub=0 AND uncountable=0 Order by borno_subject_nine_ten_id asc";
  
	
    $qgtctmarg=$mysqli->query($gtctmarg);
	
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){
		
		
//==============================Count Fail No===============================
				$gtttalst="select * from borno_class9_10_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$group1' AND borno_student_info_id='$studinfoId1' AND res_gpa=0 AND stu4thsub=0 AND uncountable=0";
	                $qschool=$mysqli->query($gtttalst);
					$failno=mysqli_num_rows($qschool); 
					
	$insfmark1="UPDATE`borno_school_9_10_merit` SET failno='$failno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$group1' AND borno_student_info_id='$studinfoId1'";		
	$qins1=$mysqli->query($insfmark1);	
   //==============================Count Fail No===============================

//============================= Fail Subject =================================

	 $totalfail1 = $shgtctmarg['borno_subject_nine_ten_id'];
	$subject="select * from borno_subject_nine_ten where borno_subject_nine_ten_id= '$totalfail1'";
		 $qsubject=$mysqli->query($subject);
		 $shqsubject=$qsubject->fetch_assoc();
		
		$totalfail2= substr($shqsubject['borno_subject_nine_ten_name'],0,3);
	

		$subject1="select * from borno_school_9_10_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$group1' AND borno_student_info_id='$studinfoId1'";
	      
		  $qsubject1=$mysqli->query($subject1);
		  $shqsubject1=$qsubject1->fetch_assoc();
		  $totalfail3= $shqsubject1['fail_subject'];
	

	
		

	if($totalfail3!='')	
	{
	$insfmark="UPDATE`borno_school_9_10_merit` SET fail_subject='$totalfail3,$totalfail2' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$group1' AND borno_student_info_id='$studinfoId1'";	
	}
	else
	{
	$insfmark="UPDATE`borno_school_9_10_merit` SET fail_subject='$totalfail2' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$group1' AND borno_student_info_id='$studinfoId1'";	
	}

		
 	$qins=$mysqli->query($insfmark);	
		
		
		
		
}
	}
//=========================Nine Ten End=============================

//=========================Six to Eight Start=============================	
elseif($studClass==3 OR $studClass==4 OR $studClass==5)
{		
		$insfmark3="UPDATE `borno_school_6_8_merit` SET `fail_subject`='' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_student_info_id='$studinfoId1'";		
		$qins3=$mysqli->query($insfmark3);
		
		$gtctmarg="select * from borno_class6_8_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_student_info_id='$studinfoId1' AND res_gpa=0 AND six_eight_4th_subject=0 AND uncountable=0 Order by subject_id_six_eight asc";
  
	
    $qgtctmarg=$mysqli->query($gtctmarg);
	
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){
		
		
//===============================Count Fail No==============================
				$gtttalst="select * from borno_class6_8_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_student_info_id='$studinfoId1' AND res_gpa=0 AND six_eight_4th_subject=0 AND uncountable=0";
	                $qschool=$mysqli->query($gtttalst);
					$failno=mysqli_num_rows($qschool); 
					
	$insfmark1="UPDATE`borno_school_6_8_merit` SET failno='$failno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_student_info_id='$studinfoId1'";		
	$qins1=$mysqli->query($insfmark1);	
   
	//============================================== Fail Subject ===================================================	
	 $totalfail1 = $shgtctmarg['subject_id_six_eight'];
	$subject="select * from borno_subject_six_eight where subject_id_six_eight= '$totalfail1'";
		 $qsubject=$mysqli->query($subject);
		 $shqsubject=$qsubject->fetch_assoc();
		
		$totalfail2= substr($shqsubject['six_eight_subject_name'],0,3);
	

		$subject1="select * from borno_school_6_8_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_student_info_id='$studinfoId1'";
	      
		  $qsubject1=$mysqli->query($subject1);
		  $shqsubject1=$qsubject1->fetch_assoc();
		  $totalfail3= $shqsubject1['fail_subject'];
	

	
		

	if($totalfail3!='')	
	{
	$insfmark="UPDATE`borno_school_6_8_merit` SET fail_subject='$totalfail3,$totalfail2' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_student_info_id='$studinfoId1'";	
	}
	else
	{
	$insfmark="UPDATE`borno_school_6_8_merit` SET fail_subject='$totalfail2' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_student_info_id='$studinfoId1'";	
	}

		
 	$qins=$mysqli->query($insfmark);	
		
		
		
		
}
	}
//=========================Six to Eight End=============================

//=========================Play to Five Start=============================	
else
{		
		$insfmark3="UPDATE `borno_school_play_5_merit` SET `fail_subject`='' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_student_info_id='$studinfoId1'";		
		$qins3=$mysqli->query($insfmark3);
		
		$gtctmarg="select * from borno_class1_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_student_info_id='$studinfoId1' AND res_gpa=0 AND subst=0 Order by borno_result_subject_id asc";
  
	
    $qgtctmarg=$mysqli->query($gtctmarg);
	
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){
		
		
//=============================Count Fail No =================================
				$gtttalst="select * from borno_class1_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_student_info_id='$studinfoId1' AND res_gpa=0 AND subst=0";
	                $qschool=$mysqli->query($gtttalst);
					$failno=mysqli_num_rows($qschool); 
					
	$insfmark1="UPDATE`borno_school_play_5_merit` SET failno='$failno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_student_info_id='$studinfoId1'";		
	$qins1=$mysqli->query($insfmark1);	
   
	//================================== Fail Subject ===================================================	
	 $totalfail1 = $shgtctmarg['borno_result_subject_id'];
	$subject="select * from borno_result_subject where borno_school_id='$schId' AND borno_school_session='$stsess1' AND borno_school_class_id='$studClass1' AND borno_result_subject_id= '$totalfail1'";
		 $qsubject=$mysqli->query($subject);
		 $shqsubject=$qsubject->fetch_assoc();
		
		$totalfail2= substr($shqsubject['borno_school_subject_name'],0,3);
	

		$subject1="select * from borno_school_play_5_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_student_info_id='$studinfoId1'";
	      
		  $qsubject1=$mysqli->query($subject1);
		  $shqsubject1=$qsubject1->fetch_assoc();
		  $totalfail3= $shqsubject1['fail_subject'];
	

	
		

	if($totalfail3!='')	
	{
	$insfmark="UPDATE`borno_school_play_5_merit` SET fail_subject='$totalfail3,$totalfail2' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_student_info_id='$studinfoId1'";	
	}
	else
	{
	$insfmark="UPDATE`borno_school_play_5_merit` SET fail_subject='$totalfail2' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_student_info_id='$studinfoId1'";	
	}

		
 	$qins=$mysqli->query($insfmark);	
		
		
	
		
}	
	}
	}
*/
//=========================Play to Five End=============================
//====================Fail Subject End=============================




//===========================Merit Section Start===========================

//==========================Delete Merit Table==============================
	$delinfo1="delete from borno_merit_no where empty='0'";
	$mysqli->query($delinfo1);

//==========================Delete GPA Table=================================
	$delinfo2="delete from borno_gpa where empty='0'";
	$mysqli->query($delinfo2);

//=========================Nine Ten Start==================================
if($studClass1==1 OR $studClass1==2)
{
  $gtctmarg="select gpa, grandtotal from borno_school_9_10_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1'  AND gpa!=0 group by gpa, grandtotal";
  
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

	

 $insfmark11="UPDATE borno_school_9_10_merit SET meritno_section='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1'  AND gpa='$styGPA11' AND grandtotal='$studin1'";
		
		
 $qins=$mysqli->query($insfmark11);

		}
		
	$gtcmerit="select * from borno_merit_position order by number";
	$qgtcmerit=$mysqli->query($gtcmerit);
	while($shqgtcmerit=$qgtcmerit->fetch_assoc()){
	
	$number=$shqgtcmerit['number'];
	$positionlist=$shqgtcmerit['positionlist'];

	$gtctmarg="select * from borno_school_9_10_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1'  AND borno_result_term_id='$selTerm1' order by meritno_section asc";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
	
		
		
  		$studinfoId=$shgtctmarg['borno_student_info_id']; 
	    $meritno=$shgtctmarg['meritno_section']; 
		
			if($meritno==$number) {

	
		
	$insfmark111="UPDATE borno_school_9_10_merit SET merit_section='$positionlist' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1'  AND borno_student_info_id='$studinfoId'";
		
		
 $qins=$mysqli->query($insfmark111);

 
 } 
}
}
}
//=========================Nine Ten End==================================

//=========================Six to Eight Start==================================
elseif($studClass1==3 OR $studClass1==4 OR $studClass1==5)
{
 $gtctmarg="select gpa, grandtotal from borno_school_6_8_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND gpa!=0 group by gpa, grandtotal";
  
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

	

 $insfmark11="UPDATE borno_school_6_8_merit SET meritno_section='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND gpa='$styGPA11' AND grandtotal='$studin1'";
		
		
 $qins=$mysqli->query($insfmark11);

		}
		
	$gtcmerit="select * from borno_merit_position order by number";
	$qgtcmerit=$mysqli->query($gtcmerit);
	while($shqgtcmerit=$qgtcmerit->fetch_assoc()){
	
	$number=$shqgtcmerit['number'];
	$positionlist=$shqgtcmerit['positionlist'];

	$gtctmarg="select * from borno_school_6_8_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' order by meritno_section asc";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
	
		
		
  		$studinfoId=$shgtctmarg['borno_student_info_id']; 
	    $meritno=$shgtctmarg['meritno_section']; 
		
			if($meritno==$number) {

	
		
	$insfmark111="UPDATE borno_school_6_8_merit SET merit_section='$positionlist' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_student_info_id='$studinfoId'";
		
		
 $qins=$mysqli->query($insfmark111);
 
 } 
}
}
}
//=========================Six to Eight End==================================

//=========================Play to Five Start===============================
else
{
 $gtctmarg="select gpa, grandtotal from borno_school_play_5_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND gpa!=0 group by gpa, grandtotal";
  
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
	
	$meritno="select * from borno_gpa order by gpa desc"; 
    $qmeritno=$mysqli->query($meritno);
	$sl=0;	
	while($shqmeritno=$qmeritno->fetch_assoc()){ 
	$styGPA1=$shqmeritno['gpa'];	
		
		
	
	$meritno5="select * from borno_merit_no where gpa='$styGPA1' order by grandtotal desc"; 
	
    $qmeritno5=$mysqli->query($meritno5);
	
	while($shqmeritno5=$qmeritno5->fetch_assoc()){ 	$sl++;
	

	$studin=$shqmeritno5['grandtotal']; 

	

//  $insfmark1="UPDATE borno_merit_no SET meritno='$sl' where gpa='$styGPA1' AND grandtotal='$studin'";
  
    $insfmark1="UPDATE borno_merit_no SET meritno='$sl' where gpa='$styGPA1' AND ABS(grandtotal-$studin)< .01";
	
		
 $qins=$mysqli->query($insfmark1);
	}
}

$meritno1="select * from borno_merit_no order by meritno"; 

    $qmeritno1=$mysqli->query($meritno1);
	while($sqqqmeritno1=$qmeritno1->fetch_assoc()){ 
	
		
		
    $mno=$sqqqmeritno1['meritno'];
	 $styGPA11=$sqqqmeritno1['gpa'];
	 $studin1=$sqqqmeritno1['grandtotal']; 

	

// $insfmark11="UPDATE borno_school_play_5_merit SET meritno_section='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND gpa='$styGPA11' AND grandtotal='$studin1'";

 $insfmark11="UPDATE borno_school_play_5_merit SET meritno_section='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND gpa='$styGPA11' AND ABS(grandtotal-$studin1)< .01";		
		
 $qins=$mysqli->query($insfmark11);

		}
		
	$gtcmerit="select * from borno_merit_position order by number";
	$qgtcmerit=$mysqli->query($gtcmerit);
	while($shqgtcmerit=$qgtcmerit->fetch_assoc()){
	
	$number=$shqgtcmerit['number'];
	$positionlist=$shqgtcmerit['positionlist'];

	$gtctmarg="select * from borno_school_play_5_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' order by meritno_section asc";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
	
		
		
  		$studinfoId=$shgtctmarg['borno_student_info_id']; 
	    $meritno=$shgtctmarg['meritno_section']; 
		
			if($meritno==$number) {

	
		
	$insfmark111="UPDATE borno_school_play_5_merit SET merit_section='$positionlist' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_section_id='$section1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_student_info_id='$studinfoId'";
		
		
 $qins=$mysqli->query($insfmark111);
 
 } 
}
}
}
//=========================Play to Five End===============================

//============================Merit Section End=======================

/*
//==============================Merit Shift Start============================

//=========================Delete Merit Table================================
	$delinfo1="delete from borno_merit_no where empty='0'";
	$mysqli->query($delinfo1);

//=========================Delete GPA Table==================================
	$delinfo2="delete from borno_gpa where empty='0'";
	$mysqli->query($delinfo2);


//=========================Nine Ten Start================================
if($studClass1==1 OR $studClass1==2)
{
 $gtctmarg="select * from borno_school_9_10_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$group1' AND gpa!=0 group by gpa, grandtotal";
  
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
 $gtctmarg="select * from borno_school_6_8_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND gpa!=0 group by gpa, grandtotal";
  
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
 $gtctmarg="select * from borno_school_play_5_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id=$studClass1 AND borno_school_shift_id='$shiftId1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND gpa!=0 group by gpa, grandtotal";
  
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
}*/
//=========================Play to Five End=============================
//=============================Merit Shift End==============================
/*
//=============================Merit Class Start=============================

//============================Delete Merit Table============================
	$delinfo1="delete from borno_merit_no where empty='0'";
	$mysqli->query($delinfo1);

//============================Delete GPA Table==============================
	$delinfo2="delete from borno_gpa where empty='0'";
	$mysqli->query($delinfo2);

//=========================Nine Ten Start=============================
if($studClass1==1 OR $studClass1==2)
{

 $gtctmarg="select * from borno_school_9_10_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$group1' AND gpa!=0 group by gpa, grandtotal";
  
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

	

 $insfmark11="UPDATE borno_school_9_10_merit SET meritno_class='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1'  AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$group1' AND gpa='$styGPA11' AND grandtotal='$studin1'";
		
		
 $qins=$mysqli->query($insfmark11);

		}
		
	$gtcmerit="select * from borno_merit_position order by number";
	$qgtcmerit=$mysqli->query($gtcmerit);
	while($shqgtcmerit=$qgtcmerit->fetch_assoc()){
	
	$number=$shqgtcmerit['number'];
	$positionlist=$shqgtcmerit['positionlist'];

	$gtctmarg="select * from borno_school_9_10_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$group1' order by meritno_class asc";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
	
		
		
  		$studinfoId=$shgtctmarg['borno_student_info_id']; 
	    $meritno=$shgtctmarg['meritno_class']; 
		
			if($meritno==$number) {

	
		
	$insfmark111="UPDATE borno_school_9_10_merit SET merit_class='$positionlist' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_school_stud_group='$group1' AND borno_student_info_id='$studinfoId'";
		
		
 $qins=$mysqli->query($insfmark111);
 
 } 
}
}
}
//=========================Nine Ten End=============================

//=========================Six to Eight Start=======================
elseif($studClass1==3 OR $studClass1==4 OR $studClass1==5)
{

 $gtctmarg="select * from borno_school_6_8_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND gpa!=0 group by gpa, grandtotal";
  
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

	

 $insfmark11="UPDATE borno_school_6_8_merit SET meritno_class='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1'  AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND gpa='$styGPA11' AND grandtotal='$studin1'";
		
		
 $qins=$mysqli->query($insfmark11);

		}
		
	$gtcmerit="select * from borno_merit_position order by number";
	$qgtcmerit=$mysqli->query($gtcmerit);
	while($shqgtcmerit=$qgtcmerit->fetch_assoc()){
	
	$number=$shqgtcmerit['number'];
	$positionlist=$shqgtcmerit['positionlist'];

	$gtctmarg="select * from borno_school_6_8_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' order by meritno_class asc";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
	
		
		
  		$studinfoId=$shgtctmarg['borno_student_info_id']; 
	    $meritno=$shgtctmarg['meritno_class']; 
		
			if($meritno==$number) {

	
		
	$insfmark111="UPDATE borno_school_6_8_merit SET merit_class='$positionlist' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_student_info_id='$studinfoId'";
		
		
 $qins=$mysqli->query($insfmark111);
 
 } 
}
}
}
//=========================Six to Eight End=============================

//=========================Play to Five Start=============================
else
{

 $gtctmarg="select * from borno_school_play_5_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND gpa!=0 group by gpa, grandtotal";
  
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

	

 $insfmark11="UPDATE borno_school_play_5_merit SET meritno_class='$mno' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1'  AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND gpa='$styGPA11' AND grandtotal='$studin1'";
		
		
 $qins=$mysqli->query($insfmark11);

		}
		
	$gtcmerit="select * from borno_merit_position order by number";
	$qgtcmerit=$mysqli->query($gtcmerit);
	while($shqgtcmerit=$qgtcmerit->fetch_assoc()){
	
	$number=$shqgtcmerit['number'];
	$positionlist=$shqgtcmerit['positionlist'];

	$gtctmarg="select * from borno_school_play_5_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' order by meritno_class asc";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){ 
	
		
		
  		$studinfoId=$shgtctmarg['borno_student_info_id']; 
	    $meritno=$shgtctmarg['meritno_class']; 
		
			if($meritno==$number) {

	
		
	$insfmark111="UPDATE borno_school_play_5_merit SET merit_class='$positionlist' where borno_school_id='$schId' AND borno_school_branch_id='$branchId1' AND borno_school_class_id='$studClass1' AND borno_school_session='$stsess1' AND borno_result_term_id='$selTerm1' AND borno_student_info_id='$studinfoId'";
		
		
 $qins=$mysqli->query($insfmark111);
 
 } 
}
}
}


*/
//=========================Play to Five End=============================
//=============================Merit Class End==========================



if($qins) { header("location:set_merit_ngghs.php?msg=1&branchId=$branchId1&studClass=$studClass1&shiftId=$shiftId1&section=$section1&stsess=$stsess1&selTerm=$selTerm1");} else { header('location:set_merit_ngghs.php?msg=2');}
										
					
	

		
		
			
 ?>

