<?php
ob_start();
require_once('result_top.php');
$addate = date("d/m/Y");
extract($_POST);
//====================Nine Ten Start============================ 
if($studClass==1 OR $studClass==2)
{
$getsubjstatus="select * from borno_result_nine_ten_subject_details where borno_school_id='$schId' AND borno_school_class_id=$studClass AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' AND borin_subject_nine_ten_id='$stusubjId'";
$qgetsubjstatus=$mysqli->query($getsubjstatus);
$shgetsubjstatus=$qgetsubjstatus->fetch_assoc();

$subpare=$shgetsubjstatus['pare'];

$uncountable=$shgetsubjstatus['uncountable'];
$con1=$shgetsubjstatus['number_type1_conv'];
$con2=$shgetsubjstatus['number_type2_conv'];
$con3=$shgetsubjstatus['number_type3_conv'];
$con4=$shgetsubjstatus['number_type4_conv'];
$con5=$shgetsubjstatus['number_type5_conv'];
$con6=$shgetsubjstatus['number_type6_conv'];
}
//====================Nine Ten End============================
//====================Six to Eight Start============================
elseif($studClass==3 OR $studClass==4 OR $studClass==5)
{
$getsubjstatus="select * from borno_result_six_eight_subject_details where borno_school_id='$schId' AND borno_school_class_id=$studClass AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' AND subject_id_six_eight='$stusubjId'";
$qgetsubjstatus=$mysqli->query($getsubjstatus);
$shgetsubjstatus=$qgetsubjstatus->fetch_assoc();

$sub4th=$shgetsubjstatus['six_eight_4th_subject'];
$uncountable=$shgetsubjstatus['uncountable'];

$con1=$shgetsubjstatus['number_type1_conv'];
$con2=$shgetsubjstatus['number_type2_conv'];
$con3=$shgetsubjstatus['number_type3_conv'];
$con4=$shgetsubjstatus['number_type4_conv'];
$con5=$shgetsubjstatus['number_type5_conv'];
$con6=$shgetsubjstatus['number_type6_conv'];

$getsubpare="select * from borno_subject_six_eight where subject_id_six_eight='$stusubjId'";
$qgetsubpare=$mysqli->query($getsubpare);
$shqgetsubpare=$qgetsubpare->fetch_assoc();
if($schId==51)
{
$pare=0;
}
else
{
$pare=$shqgetsubpare['six_eight_subject_pare'];
}

}
//====================Six to Eight End============================
//====================Play to Five Start============================
else
{
$getsubjstatus="select * from borno_result_subject_details where borno_school_id='$schId' AND borno_school_class_id=$studClass AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' AND borno_result_subject_id='$stusubjId'";
$qgetsubjstatus=$mysqli->query($getsubjstatus);
$shgetsubjstatus=$qgetsubjstatus->fetch_assoc();

$sunstatus=$shgetsubjstatus['subject_type'];
$pare=$shgetsubjstatus['pare'];

$con1=$shgetsubjstatus['number_type1_conv'];
$con2=$shgetsubjstatus['number_type2_conv'];
$con3=$shgetsubjstatus['number_type3_conv'];
$con4=$shgetsubjstatus['number_type4_conv'];
$con5=$shgetsubjstatus['number_type5_conv'];
$con6=$shgetsubjstatus['number_type6_conv'];
}

//====================Play to Five End============================
///==================================================== Delete temp table==================////////////////////////////	
		

 $gtempdel="delete  from borno_class1_temp_mark where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id=$studClass AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' AND borno_result_subject_id='$stusubjId'";
  
    $mysqli->query($gtempdel);	
///==================================Insert temp1  table Start==================
//====================Nine Ten Start============================ 
if($studClass==1 OR $studClass==2)
{
for($i=0; $i<count($stuName); $i++){
				
				if($stuName[$i]!=""){
$total=$ntype1[$i]*$con1/100+$ntype2[$i]*$con2/100+$ntype3[$i]*$con3/100+$ntype4[$i]*$con4/100+$ntype5[$i]*$con5/100+$ntype6[$i]*$con6/100;					
	
	 if($ntype1[$i]!="") { $ntype1[$i]=$ntype1[$i]; } else { $ntype1[$i]=0; }
	 if($ntype2[$i]!="") { $ntype2[$i]=$ntype2[$i]; } else { $ntype2[$i]=0; }
	 if($ntype3[$i]!="") { $ntype3[$i]=$ntype3[$i]; } else { $ntype3[$i]=0; }
	 if($ntype4[$i]!="") { $ntype4[$i]=$ntype4[$i]; } else { $ntype4[$i]=0; }
	 if($ntype5[$i]!="") { $ntype5[$i]=$ntype5[$i]; } else { $ntype5[$i]=0; }
	 if($ntype6[$i]!="") { $ntype6[$i]=$ntype6[$i]; } else { $ntype6[$i]=0; }
	 

	 $subject4th="select * from borno_set_subject_nine_ten where borno_student_info_id='$studId[$i]'";
	$qsubject4th=$mysqli->query($subject4th);
	$shqsubject4th=$qsubject4th->fetch_assoc();
	
	$group1=$shqsubject4th['borno_subject_nine_ten_dept'];
    $subject13=$shqsubject4th['borno_subject_nine_ten_13sub'];
	$subje4th2=$shqsubject4th['borno_subject_nine_ten_4thsub'];
	
	if(empty($group1)){
	   $getgroup="SELECT * FROM `borno_student_info` where borno_student_info_id='$studId[$i]'";
	$qgetgroup=$mysqli->query($getgroup);
	$shqgetgroup=$qgetgroup->fetch_assoc();
	
	$group=$shqgetgroup['borno_school_stud_group'];
	}
	else{
	    $group=$group1;
	}
	
	
	if($subje4th2==$stusubjId){$stu4th=1;}
	else{$stu4th=0;}
	$subject1=1;
	$subject2=2;
	$subject3=3;
	$subject4=4;
	$subject5=5;
	$subject6=6;
	$subject7=7;
	$subject8=8;
	$subject9=9;
	
	if($group==1){
	$subject10=10;
	$subject11=11;
	$subject12=12;
	}
	if($group==2){
	$subject10=18;
	$subject11=26;
	$subject12=28;    
	}
	if($group==3){
	$subject10=18;
	$subject11=19;
	$subject12=20;    
	}

if($subject1==$stusubjId OR $subject2==$stusubjId OR $subject3==$stusubjId OR $subject4==$stusubjId OR $subject5==$stusubjId OR $subject6==$stusubjId OR $subject7==$stusubjId OR $subject8==$stusubjId OR $subject9==$stusubjId OR $subject10==$stusubjId OR $subject11==$stusubjId OR $subject12==$stusubjId OR $subject13==$stusubjId OR $subje4th2==$stusubjId)	
{

//     echo $schId." ";echo $branchId." ";echo $studClass." ";echo $shiftId." ";echo $section." ";echo $stsess." ";echo $stusubjId." ";echo $selTerm." ";echo $studId[$i]." ";echo $stuRoll[$i]." ";echo $stuName[$i]." ";
//     echo $ntype1[$i]." ";echo $ntype2[$i]." ";echo $ntype3[$i]." ";echo $ntype4[$i]." ";
//  echo $ntype5[$i]." ";echo $ntype6[$i]." ";echo $subpare." ";echo $group." ";echo $stu4th." ";echo $total." ";echo $uncountable." ";echo $userid." ";
// echo $addate."<br>"; 

	 $insfmark1="INSERT INTO `borno_class9_10_temp_mark1` 
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
			`total_marks`,
			`uncountable`,
			`addBy`, 
			`addDate`, 
			`updateBy`, 
			`updateDate`)
				   
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
					'$subpare',
					'$group',
					'$stu4th',
					'$total',
					'$uncountable',
					'$userid',
					'$addate',
					'',
					''
			  )
			  ";
		$qinstm1=$mysqli->query($insfmark1);
	}
				}
}
}
//====================Nine Ten End============================
//====================Six to Eight Start============================
elseif($studClass==3 OR $studClass==4 OR $studClass==5)
{
for($i=0; $i<count($stuName); $i++){
				
				if($stuName[$i]!=""){
					
$total=$ntype1[$i]*$con1/100+$ntype2[$i]*$con2/100+$ntype3[$i]*$con3/100+$ntype4[$i]*$con4/100+$ntype5[$i]*$con5/100+$ntype6[$i]*$con6/100;

     if($ntype1[$i]!="") { $ntype1[$i]=$ntype1[$i]; } else { $ntype1[$i]=0; }
	 if($ntype2[$i]!="") { $ntype2[$i]=$ntype2[$i]; } else { $ntype2[$i]=0; }
	 if($ntype3[$i]!="") { $ntype3[$i]=$ntype3[$i]; } else { $ntype3[$i]=0; }
	 if($ntype4[$i]!="") { $ntype4[$i]=$ntype4[$i]; } else { $ntype4[$i]=0; }
	 if($ntype5[$i]!="") { $ntype5[$i]=$ntype5[$i]; } else { $ntype5[$i]=0; }
	 if($ntype6[$i]!="") { $ntype6[$i]=$ntype6[$i]; } else { $ntype6[$i]=0; }



$insfmark1="INSERT INTO `borno_class6_8_temp_mark1` 
	(
			`borno_school_id`,
			`borno_school_branch_id`,
			`borno_school_class_id`,
			`borno_school_shift_id`,
			`borno_school_section_id`,
			`borno_school_session`,
			`subject_id_six_eight`,
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
			`total_mark`)
				   
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
					'$pare',
					'$total'
			  )
			  ";
			 
		$qinstm1=$mysqli->query($insfmark1);
	}
}
}

//====================Six to Eight End============================
//====================Play to Five Start============================
else
{
for($i=0; $i<count($stuName); $i++){
				
				if($stuName[$i]!=""){
$total=$ntype1[$i]*$con1/100+$ntype2[$i]*$con2/100+$ntype3[$i]*$con3/100+$ntype4[$i]*$con4/100+$ntype5[$i]*$con5/100+$ntype6[$i]*$con6/100;	
	 
	 if($ntype1[$i]!="") { $ntype1[$i]=$ntype1[$i]; } else { $ntype1[$i]=0; }
	 if($ntype2[$i]!="") { $ntype2[$i]=$ntype2[$i]; } else { $ntype2[$i]=0; }
	 if($ntype3[$i]!="") { $ntype3[$i]=$ntype3[$i]; } else { $ntype3[$i]=0; }
	 if($ntype4[$i]!="") { $ntype4[$i]=$ntype4[$i]; } else { $ntype4[$i]=0; }
	 if($ntype5[$i]!="") { $ntype5[$i]=$ntype5[$i]; } else { $ntype5[$i]=0; }
	 if($ntype6[$i]!="") { $ntype6[$i]=$ntype6[$i]; } else { $ntype6[$i]=0; }
	 
	 
	 $insfmark1="INSERT INTO `borno_class1_temp_mark1` 
	(
			`borno_school_id`,
			`borno_school_branch_id`,
			`borno_school_class_id`,
			`borno_school_shift_id`,
			`borno_school_section_id`,
			`borno_school_session`,
			`borno_result_subject_id`,
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
			`totalmark`,
			`pare`)
				   
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
					'$total',
					'$pare'
			  )
			  ";
		
		$qinstm1=$mysqli->query($insfmark1);
	}
}
}
//====================Play to Five End============================

///==================================Insert temp1  table End==================

//==================== Average Result Start==================================
//====================Nine Ten Start============================ 
if($studClass==1 OR $studClass==2)
{
	$termperc="select * from borno_result_add_term where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm'";
	$qtermperc=$mysqli->query($termperc);
	$shtermperc=$qtermperc->fetch_assoc();
	
	$gettermperc=$shtermperc['borno_result_term_percent'];



	$gettarmmark="select * from borno_class9_10_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND 	borno_subject_nine_ten_id='$stusubjId' AND borno_result_term_id='$selTerm'";
  
    $qgettarmmark=$mysqli->query($gettarmmark);
	while($shgettarmmark=$qgettarmmark->fetch_assoc()){
		  
		
		
		$persstudinfoId=$shgettarmmark['borno_student_info_id']; 
		$persstudName=$shgettarmmark['borno_school_student_name']; 
		$persstudRoll=$shgettarmmark['borno_school_roll']; 
		$group=$shgettarmmark['borno_school_stud_group'];
		$sub4th12=$shgettarmmark['stu4thsub'];
		
		
		$gettempmforperc1=$shgettarmmark['temp_res_number_type1'];		
		$getnt1perc=($gettempmforperc1*$gettermperc)/100;
		
		
		$gettempmforperc2=$shgettarmmark['temp_res_number_type2'];
		$getnt2perc=($gettempmforperc2*$gettermperc)/100;
		
		$gettempmforperc3=$shgettarmmark['temp_res_number_type3'];
		$getnt3perc=($gettempmforperc3*$gettermperc)/100;
		
		
		$gettempmforperc4=$shgettarmmark['temp_res_number_type4'];
		$getnt4perc=($gettempmforperc4*$gettermperc)/100;
		
		
		$gettempmforperc5=$shgettarmmark['temp_res_number_type5'];
		$getnt5perc=($gettempmforperc5*$gettermperc)/100;
		
		
		$gettempmforperc6=$shgettarmmark['temp_res_number_type6'];
		$getnt6perc=($gettempmforperc6*$gettermperc)/100;
		
		
		
		 $insc1avrgmark="INSERT INTO `borno_class9_10_average_mark2` 
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
			`uncountable`)
				   
			VALUES (
					'$schId', 
					'$branchId',
					'$studClass',
					'$shiftId',
					'$section',
					'$stsess',
					'$stusubjId',
					'$selTerm',
					'$persstudinfoId',
					'$persstudRoll',
					'$persstudName',
					'$getnt1perc',
					'$getnt2perc',
					'$getnt3perc',
					'$getnt4perc',
					'$getnt5perc',
					'$getnt6perc',
					'$subpare',
					'$group',
					'$sub4th12',
					'$uncountable'
			  )
			  ";
		$qinsc1avrgmark=$mysqli->query($insc1avrgmark);
		}
}
//====================Nine Ten End============================ 
//====================Six to Eight Start============================ 
elseif($studClass==3 OR $studClass==4 OR $studClass==5)
{
	$termperc="select * from borno_result_add_term where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm'";
	$qtermperc=$mysqli->query($termperc);
	$shtermperc=$qtermperc->fetch_assoc();
	
	$gettermperc=$shtermperc['borno_result_term_percent'];



	$gettarmmark="select * from borno_class6_8_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND subject_id_six_eight='$stusubjId' AND borno_result_term_id='$selTerm'";
  
    $qgettarmmark=$mysqli->query($gettarmmark);
	while($shgettarmmark=$qgettarmmark->fetch_assoc()){
		  
		
		
		$persstudinfoId=$shgettarmmark['borno_student_info_id']; 
		$persstudName=$shgettarmmark['borno_school_student_name']; 
		$persstudRoll=$shgettarmmark['borno_school_roll']; 
    	
		
		$gettempmforperc1=$shgettarmmark['temp_res_number_type1'];		
		$getnt1perc=($gettempmforperc1*$gettermperc)/100;
		
		
		$gettempmforperc2=$shgettarmmark['temp_res_number_type2'];
		$getnt2perc=($gettempmforperc2*$gettermperc)/100;
		
		$gettempmforperc3=$shgettarmmark['temp_res_number_type3'];
		$getnt3perc=($gettempmforperc3*$gettermperc)/100;
		
		
		$gettempmforperc4=$shgettarmmark['temp_res_number_type4'];
		$getnt4perc=($gettempmforperc4*$gettermperc)/100;
		
		
		$gettempmforperc5=$shgettarmmark['temp_res_number_type5'];
		$getnt5perc=($gettempmforperc5*$gettermperc)/100;
		
		
		$gettempmforperc6=$shgettarmmark['temp_res_number_type6'];
		$getnt6perc=($gettempmforperc6*$gettermperc)/100;
		
		
		
		 $insc1avrgmark="INSERT INTO `borno_class6_8_average_mark` 
	(
			`borno_school_id`,
			`borno_school_branch_id`,
			`borno_school_class_id`,
			`borno_school_shift_id`,
			`borno_school_section_id`,
			`borno_school_session`,
			`subject_id_six_eight`,
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
			`subject_pare`)
				   
			VALUES (
					'$schId', 
					'$branchId',
					'$studClass',
					'$shiftId',
					'$section',
					'$stsess',
					'$stusubjId',
					'$selTerm',
					'$persstudinfoId',
					'$persstudRoll',
					'$persstudName',
					'$getnt1perc',
					'$getnt2perc',
					'$getnt3perc',
					'$getnt4perc',
					'$getnt5perc',
					'$getnt6perc',
					'$pare'
			  )
			  ";
		$qinsc1avrgmark=$mysqli->query($insc1avrgmark);
		}
}
//====================Six to Eight End============================ 
//====================Play to Five Start============================ 
else
{
	$termperc="select * from borno_result_add_term where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm'";
	$qtermperc=$mysqli->query($termperc);
	$shtermperc=$qtermperc->fetch_assoc();
	
	$gettermperc=$shtermperc['borno_result_term_percent'];



	$gettarmmark="select * from borno_class1_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_subject_id='$stusubjId' AND borno_result_term_id='$selTerm'";
  
    $qgettarmmark=$mysqli->query($gettarmmark);
	while($shgettarmmark=$qgettarmmark->fetch_assoc()){
		  
		
		
		$persstudinfoId=$shgettarmmark['borno_student_info_id']; 
		$persstudName=$shgettarmmark['borno_school_student_name']; 
		$persstudRoll=$shgettarmmark['borno_school_roll']; 
		
		
		$gettempmforperc1=$shgettarmmark['temp_res_number_type1'];		
		$getnt1perc=($gettempmforperc1*$gettermperc)/100;
		
		
		$gettempmforperc2=$shgettarmmark['temp_res_number_type2'];
		$getnt2perc=($gettempmforperc2*$gettermperc)/100;
		
		$gettempmforperc3=$shgettarmmark['temp_res_number_type3'];
		$getnt3perc=($gettempmforperc3*$gettermperc)/100;
		
		
		$gettempmforperc4=$shgettarmmark['temp_res_number_type4'];
		$getnt4perc=($gettempmforperc4*$gettermperc)/100;
		
		
		$gettempmforperc5=$shgettarmmark['temp_res_number_type5'];
		$getnt5perc=($gettempmforperc5*$gettermperc)/100;
		
		
		$gettempmforperc6=$shgettarmmark['temp_res_number_type6'];
		$getnt6perc=($gettempmforperc6*$gettermperc)/100;
		
		
		
		 $insc1avrgmark="INSERT INTO `borno_class1_average_mark` 
	(
			`borno_school_id`,
			`borno_school_branch_id`,
			`borno_school_class_id`,
			`borno_school_shift_id`,
			`borno_school_section_id`,
			`borno_school_session`,
			`borno_result_subject_id`,
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
			`pare`)
				   
			VALUES (
					'$schId', 
					'$branchId',
					'$studClass',
					'$shiftId',
					'$section',
					'$stsess',
					'$stusubjId',
					'$selTerm',
					'$persstudinfoId',
					'$persstudRoll',
					'$persstudName',
					'$getnt1perc',
					'$getnt2perc',
					'$getnt3perc',
					'$getnt4perc',
					'$getnt5perc',
					'$getnt6perc',
					'$pare'
			  )
			  ";
		$qinsc1avrgmark=$mysqli->query($insc1avrgmark);
		}
}

//====================Play to Five End============================ 
//==================== Average Result End==================================
//=========================================== /////////////////// Result Calculation=======///////////////////////////////////////////
//================Delete Data Final Table Start============================
//============Nine Ten Start=======================
if($studClass==1 OR $studClass==2)
{
$delbtbornores="DELETE from borno_class9_10_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_subject_nine_ten_id='$stusubjId' AND borno_result_term_id='$selTerm'";
$mysqli->query($delbtbornores);
}
//============Nine Ten End=======================
//============Six to Eight Start=======================
elseif($studClass==3 OR $studClass==4 OR $studClass==5)
{
$delbtbornores="DELETE from borno_class6_8_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND subject_id_six_eight='$stusubjId' AND borno_result_term_id='$selTerm'";
$mysqli->query($delbtbornores);
}
//============Six to Eight End=======================
//============Play to Five Start=======================
else
{
$delbtbornores="DELETE from borno_class1_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_subject_id='$stusubjId' AND borno_result_term_id='$selTerm'";
$mysqli->query($delbtbornores);
}
//============Play to Five End=======================
//================Delete Data Final Table End============================

//----------- Get Subject Details Mark Start ----------------------------------------------------------------------------------------------------------------------------
//============Nine Ten Start=======================
if($studClass==1 OR $studClass==2)
{
//============Subject Bangla Start=======================    
if($stusubjId==1 OR $stusubjId==2)
{
    // 	echo "test2";
  $gtsdmrk1="select * from borno_result_nine_ten_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' AND borin_subject_nine_ten_id='1'";
				
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
				
				$gtsubjfmark1=$shsubjdet1['borno_nine_ten_subfullmark'];
				
 $gtsdmrk2="select * from borno_result_nine_ten_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' AND borin_subject_nine_ten_id='2'";
				
				$qgtsdmrk2=$mysqli->query($gtsdmrk2);
				$shsubjdet2=$qgtsdmrk2->fetch_assoc();
				
				
				
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
		
				$gtsubjfmark2=$shsubjdet2['borno_nine_ten_subfullmark'];
		
	    $gtnumty1pass=$gtnumty11pass+$gtnumty21pass;
		$gtnumty2pass=$gtnumty12pass+$gtnumty22pass;
		$gtnumty3pass=$gtnumty13pass+$gtnumty23pass;
		$gtnumty4pass=$gtnumty14pass+$gtnumty24pass;
		$gtnumty5pass=$gtnumty15pass+$gtnumty25pass;
		$gtnumty6pass=$gtnumty16pass+$gtnumty26pass;
		

	
	
	
	
	
	
	$gtsubjfmark=$gtsubjfmark2+$gtsubjfmark1;
	
}
//============Subject Bangla End======================= 
//============Subject English Start======================= 
elseif($stusubjId==3 OR $stusubjId==4)
{	
 $gtsdmrk1="select * from borno_result_nine_ten_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' AND borin_subject_nine_ten_id='3'";
				
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
				
				$gtsubjfmark1=$shsubjdet1['borno_nine_ten_subfullmark'];
				
 $gtsdmrk2="select * from borno_result_nine_ten_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' AND borin_subject_nine_ten_id='4'";
				
				$qgtsdmrk2=$mysqli->query($gtsdmrk2);
				$shsubjdet2=$qgtsdmrk2->fetch_assoc();
				
				
				
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
		
				$gtsubjfmark2=$shsubjdet2['borno_nine_ten_subfullmark'];
		
		
	    $gtnumty1pass=$gtnumty11pass+$gtnumty21pass;
		$gtnumty2pass=$gtnumty12pass+$gtnumty22pass;
		$gtnumty3pass=$gtnumty13pass+$gtnumty23pass;
		$gtnumty4pass=$gtnumty14pass+$gtnumty24pass;
		$gtnumty5pass=$gtnumty15pass+$gtnumty25pass;
		$gtnumty6pass=$gtnumty16pass+$gtnumty26pass;
		

	
	
	$gtsubjfmark=$gtsubjfmark2+$gtsubjfmark1;
}
//============Subject English End======================= 
//============Subject Other Start======================= 
else
{	
 $gtsdmrk="select * from borno_result_nine_ten_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' AND borin_subject_nine_ten_id='$stusubjId'";
				
				$qgtsdmrk=$mysqli->query($gtsdmrk);
				$shsubjdet=$qgtsdmrk->fetch_assoc();
				
				
				
				$numbtype1_conv=$shsubjdet['number_type1_conv'];
				$numbtype2_conv=$shsubjdet['number_type2_conv'];
				$numbtype3_conv=$shsubjdet['number_type3_conv'];
				$numbtype4_conv=$shsubjdet['number_type4_conv'];
				$numbtype5_conv=$shsubjdet['number_type5_conv'];
				$numbtype6_conv=$shsubjdet['number_type6_conv'];
				

	
	$gtsubjfmark=$shsubjdet['borno_nine_ten_subfullmark'];
}
//============Subject Other End======================= 	
}
//============Nine Ten End======================= 
//============Six to Eight Start======================= 
elseif($studClass==3 OR $studClass==4 OR $studClass==5)
{
//============Subject Bangla Start=======================     
if($pare==1)
{	
  $gtsdmrk1="select * from borno_result_six_eight_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' AND subject_id_six_eight='1'";
				
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
				
				$type11=$shsubjdet1['type1'];
				$type12=$shsubjdet1['type2'];
				$type13=$shsubjdet1['type3'];
				
 $gtsdmrk2="select * from borno_result_six_eight_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' AND subject_id_six_eight='2'";
				
				$qgtsdmrk2=$mysqli->query($gtsdmrk2);
				$shsubjdet2=$qgtsdmrk2->fetch_assoc();
				
				
				
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
		
				$type21=$shsubjdet2['type1'];
				$type22=$shsubjdet2['type2'];
				$type23=$shsubjdet2['type3'];
				
				$pass=$shsubjdet2['pass'];
		
	    $gtnumty1pass=$gtnumty11pass+$gtnumty21pass;
		$gtnumty2pass=$gtnumty12pass+$gtnumty22pass;
		$gtnumty3pass=$gtnumty13pass+$gtnumty23pass;
		$gtnumty4pass=$gtnumty14pass+$gtnumty24pass;
		$gtnumty5pass=$gtnumty15pass+$gtnumty25pass;
		$gtnumty6pass=$gtnumty16pass+$gtnumty26pass;
		
	$gtsubjfm1="select * from borno_set_subject_six_eight where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND subject_id_six_eight='1'";
	$qggtsubjfm1=$mysqli->query($gtsubjfm1);
	$shgtsubjfm1=$qggtsubjfm1->fetch_assoc();
	
	$gtsubjfmark1=$shgtsubjfm1['sub_six_eight_fullmark'];
	
	$gtsubjfm2="select * from borno_set_subject_six_eight where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND subject_id_six_eight='2'";
	$qggtsubjfm2=$mysqli->query($gtsubjfm2);
	$shgtsubjfm2=$qggtsubjfm2->fetch_assoc();
	
	$gtsubjfmark2=$shgtsubjfm2['sub_six_eight_fullmark'];
	$gtsubjfmark=$gtsubjfmark2+$gtsubjfmark1;
	
}
//============Subject Bangla End======================= 
//============Subject English Start=======================  
elseif($pare==2)
{	
 $gtsdmrk1="select * from borno_result_six_eight_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' AND subject_id_six_eight='3'";
				
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
				
				$type11=$shsubjdet1['type1'];
				$type12=$shsubjdet1['type2'];
				$type13=$shsubjdet1['type3'];
				
 $gtsdmrk2="select * from borno_result_six_eight_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' AND subject_id_six_eight='4'";
				
				$qgtsdmrk2=$mysqli->query($gtsdmrk2);
				$shsubjdet2=$qgtsdmrk2->fetch_assoc();
				
				
				
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
		
				$type21=$shsubjdet2['type1'];
				$type22=$shsubjdet2['type2'];
				$type23=$shsubjdet2['type3'];
				
				$pass=$shsubjdet2['pass'];
						
		
	    $gtnumty1pass=$gtnumty11pass+$gtnumty21pass;
		$gtnumty2pass=$gtnumty12pass+$gtnumty22pass;
		$gtnumty3pass=$gtnumty13pass+$gtnumty23pass;
		$gtnumty4pass=$gtnumty14pass+$gtnumty24pass;
		$gtnumty5pass=$gtnumty15pass+$gtnumty25pass;
		$gtnumty6pass=$gtnumty16pass+$gtnumty26pass;
		
	$gtsubjfm1="select * from borno_set_subject_six_eight where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND subject_id_six_eight='3'";
	$qggtsubjfm1=$mysqli->query($gtsubjfm1);
	$shgtsubjfm1=$qggtsubjfm1->fetch_assoc();
	
	$gtsubjfmark1=$shgtsubjfm1['sub_six_eight_fullmark'];
	
	$gtsubjfm2="select * from borno_set_subject_six_eight where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND subject_id_six_eight='4'";
	$qggtsubjfm2=$mysqli->query($gtsubjfm2);
	$shgtsubjfm2=$qggtsubjfm2->fetch_assoc();
	
	$gtsubjfmark2=$shgtsubjfm2['sub_six_eight_fullmark'];
	$gtsubjfmark=$gtsubjfmark2+$gtsubjfmark1;
}
//============Subject English End=======================  
//============Subject Other Start=======================  
else
{	
		 $gtsdmrk="select * from borno_result_six_eight_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' AND subject_id_six_eight='$stusubjId'";
				
				$qgtsdmrk=$mysqli->query($gtsdmrk);
				$shsubjdet=$qgtsdmrk->fetch_assoc();
		
				
				$numbtype1_conv=$shsubjdet['number_type1_conv'];
				$numbtype2_conv=$shsubjdet['number_type2_conv'];
				$numbtype3_conv=$shsubjdet['number_type3_conv'];
				$numbtype4_conv=$shsubjdet['number_type4_conv'];
				$numbtype5_conv=$shsubjdet['number_type5_conv'];
				$numbtype6_conv=$shsubjdet['number_type6_conv'];
				
				$type1=$shsubjdet['type1'];
				$type2=$shsubjdet['type2'];
				$type3=$shsubjdet['type3'];
				$pass=$shsubjdet['pass'];				
			
	$gtsubjfm="select * from borno_set_subject_six_eight where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND subject_id_six_eight='$stusubjId'";
	$qggtsubjfm=$mysqli->query($gtsubjfm);
	$shgtsubjfm=$qggtsubjfm->fetch_assoc();
	
	$gtsubjfmark=$shgtsubjfm['sub_six_eight_fullmark'];
}
//============Subject Other End=======================  
}
//============Six to Eight End=======================  
//===================Play to Five Start======================================

else
{
 $gtsdmrk="select * from borno_result_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' AND borno_result_subject_id='$stusubjId'";
				
				$qgtsdmrk=$mysqli->query($gtsdmrk);
				$shsubjdet=$qgtsdmrk->fetch_assoc();
				$pare=$shsubjdet['pare'];
if($pare==1)
	{	
	 $gtsdmrk1="select * from borno_result_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' AND borno_result_subject_id='$stusubjId' AND pare='1'";
				
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
						
		 $gtsdmrk2="select * from borno_result_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' AND borno_result_subject_id!='$stusubjId' AND pare='1'";
				
				$qgtsdmrk2=$mysqli->query($gtsdmrk2);
				$shsubjdet2=$qgtsdmrk2->fetch_assoc();
		
				$stusubjId1=$shsubjdet2['borno_result_subject_id'];
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
				
		$gtnumty1pass=$gtnumty11pass+$gtnumty21pass;
		$gtnumty2pass=$gtnumty12pass+$gtnumty22pass;
		$gtnumty3pass=$gtnumty13pass+$gtnumty23pass;
		$gtnumty4pass=$gtnumty14pass+$gtnumty24pass;
		$gtnumty5pass=$gtnumty15pass+$gtnumty25pass;
		$gtnumty6pass=$gtnumty16pass+$gtnumty26pass;
									
	$gtsubjfm1="select * from borno_result_subject where borno_result_subject_id='$stusubjId'";
	$qggtsubjfm1=$mysqli->query($gtsubjfm1);
	$shgtsubjfm1=$qggtsubjfm1->fetch_assoc();
	$gtsubjfmark1=$shgtsubjfm1['borno_school_subject_fullmark'];
	
	$gtsubjfm2="select * from borno_result_subject where borno_result_subject_id='$stusubjId1'";
	$qggtsubjfm2=$mysqli->query($gtsubjfm2);
	$shgtsubjfm2=$qggtsubjfm2->fetch_assoc();
	$gtsubjfmark2=$shgtsubjfm2['borno_school_subject_fullmark'];
	
	$gtsubjfmark=$gtsubjfmark1+$gtsubjfmark2;
	
			 $gtsdmrk3="select * from borno_result_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' AND pare='1' order by borno_result_subject_id desc limit 0,1";
				
				$qgtsdmrk3=$mysqli->query($gtsdmrk3);
				$shsubjdet3=$qgtsdmrk3->fetch_assoc();
				$subjectidpare=$shsubjdet3['borno_result_subject_id'];
}
elseif($pare==2)
	{	
	 $gtsdmrk1="select * from borno_result_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' AND borno_result_subject_id='$stusubjId' AND pare='2'";
				
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
						
		 $gtsdmrk2="select * from borno_result_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' AND borno_result_subject_id!='$stusubjId' AND pare='2'";
				
				$qgtsdmrk2=$mysqli->query($gtsdmrk2);
				$shsubjdet2=$qgtsdmrk2->fetch_assoc();
		
				$stusubjId1=$shsubjdet2['borno_result_subject_id'];
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
				
		$gtnumty1pass=$gtnumty11pass+$gtnumty21pass;
		$gtnumty2pass=$gtnumty12pass+$gtnumty22pass;
		$gtnumty3pass=$gtnumty13pass+$gtnumty23pass;
		$gtnumty4pass=$gtnumty14pass+$gtnumty24pass;
		$gtnumty5pass=$gtnumty15pass+$gtnumty25pass;
		$gtnumty6pass=$gtnumty16pass+$gtnumty26pass;
						
	$gtsubjfm1="select * from borno_result_subject where borno_result_subject_id='$stusubjId'";
	$qggtsubjfm1=$mysqli->query($gtsubjfm1);
	$shgtsubjfm1=$qggtsubjfm1->fetch_assoc();
	$gtsubjfmark1=$shgtsubjfm1['borno_school_subject_fullmark'];
	
	$gtsubjfm2="select * from borno_result_subject where borno_result_subject_id='$stusubjId1'";
	$qggtsubjfm2=$mysqli->query($gtsubjfm2);
	$shgtsubjfm2=$qggtsubjfm2->fetch_assoc();
	$gtsubjfmark2=$shgtsubjfm2['borno_school_subject_fullmark'];
	
	$gtsubjfmark=$gtsubjfmark1+$gtsubjfmark2;
	
				 $gtsdmrk3="select * from borno_result_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' AND pare='2' order by borno_result_subject_id desc limit 0,1";
				
				$qgtsdmrk3=$mysqli->query($gtsdmrk3);
				$shsubjdet3=$qgtsdmrk3->fetch_assoc();
				$subjectidpare=$shsubjdet3['borno_result_subject_id'];
}				
else
{								
				$numbtype1_conv=$shsubjdet['number_type1_conv'];
				$numbtype2_conv=$shsubjdet['number_type2_conv'];
				$numbtype3_conv=$shsubjdet['number_type3_conv'];
				$numbtype4_conv=$shsubjdet['number_type4_conv'];
				$numbtype5_conv=$shsubjdet['number_type5_conv'];
				$numbtype6_conv=$shsubjdet['number_type6_conv'];
				
	$gtsubjfm="select * from borno_result_subject where borno_result_subject_id='$stusubjId'";
	$qggtsubjfm=$mysqli->query($gtsubjfm);
	$shgtsubjfm=$qggtsubjfm->fetch_assoc();
	
	$gtsubjfmark=$shgtsubjfm['borno_school_subject_fullmark'];
}
}
//===================Play to Five End======================================
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
//===================Nine Ten Start======================================
if($studClass==1 OR $studClass==2)
{
		$gtctmarg="select * from borno_class9_10_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_subject_nine_ten_id='$stusubjId' AND borno_result_term_id='$selTerm' order by borno_school_roll asc";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){
		  
		
		
		$studinfoId=$shgtctmarg['borno_student_info_id']; 
		$studName=$shgtctmarg['borno_school_student_name']; 
		$studRoll=$shgtctmarg['borno_school_roll']; 
		$group=$shgtctmarg['borno_school_stud_group']; 
		$stu4th=$shgtctmarg['stu4thsub']; 
		
		echo $stusubjId;
		if($stusubjId==1 OR $stusubjId==2)
		{
// 			echo "test";
$delpare1="delete from borno_class9_10_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND pare='1' AND borno_result_term_id='$selTerm' AND borno_student_info_id='$studinfoId'";
    $mysqli->query($delpare1);	
	

			
			//------ Bangla-1-----------------------
				$gtctmarg1="select * from borno_class9_10_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_subject_nine_ten_id='1' AND borno_result_term_id='$selTerm' AND borno_student_info_id='$studinfoId'";
  
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
		}
//------ Bangla-2-----------------------

				$gtctmarg2="select * from borno_class9_10_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_subject_nine_ten_id='2' AND borno_result_term_id='$selTerm' AND borno_student_info_id='$studinfoId'";
  
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
		$markinpers=(($gtconvtotal*100)/$gtsubjfmark);
		
		
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
		$markinpers=(($gtconvtotal*100)/$gtsubjfmark);
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
		$markinpers=(($gtconvtotal*100)/$gtsubjfmark);
	}


		//------ get number type from query top -----------------------
		
	
		}
		elseif($stusubjId==3 OR $stusubjId==4)
		{
		$delpare1="delete from borno_class9_10_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND pare='2' AND borno_result_term_id='$selTerm' AND borno_student_info_id='$studinfoId'";
    $mysqli->query($delpare1);	
	

			
			//------ English-1-----------------------
				$gtctmarg1="select * from borno_class9_10_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_subject_nine_ten_id='3' AND borno_result_term_id='$selTerm' AND borno_student_info_id='$studinfoId'";
  
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
		}
//------ English-2-----------------------

				$gtctmarg2="select * from borno_class9_10_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_subject_nine_ten_id='4' AND borno_result_term_id='$selTerm' AND borno_student_info_id='$studinfoId'";
  
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
		$markinpers=(($gtconvtotal*100)/$gtsubjfmark);
		
		
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
		$markinpers=(($gtconvtotal*100)/$gtsubjfmark);
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
		$markinpers=(($gtconvtotal*100)/$gtsubjfmark);
	}


		}
		
		else
		{
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
		
		$markinpers=(($gtconvtotal*100)/$gtsubjfmark);
		



		//------ get number type from query top -----------------------
		
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
//==================Bangla Start===============================
if($stusubjId==1 OR $stusubjId==2)
{
   	echo "test1"; 
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
 
 if($gtconvtotal1!="") { $gtconvtotal1=$gtconvtotal1; } else { $gtconvtotal1=0; }
 if($gtconvtota21!="") { $gtconvtota21=$gtconvtota21; } else { $gtconvtota21=0; } 
 
 
//  echo $schId." ";echo $branchId." ";echo $studClass." ";echo $shiftId." ";echo $section." ";echo $stsess." ";echo $selTerm." ";echo $studinfoId." ";echo $studRoll." ";echo $studName." ";echo $numbty1." ";echo $convnumbty1." ";echo $numbty2." ";echo $convnumbty2." ";
//  echo $numbty3." ";echo $convnumbty3." ";echo $numbty4." ";echo $convnumbty4." ";echo $numbty5." ";echo $convnumbty5." ";echo $numbty6." ";echo $convnumbty6." ";
//  echo $gttotalmrk." ";echo $gtconvtotal." ";echo $markinpers." ";echo $finalGpa." ";echo $finallg." ";echo $sub4th." ";echo $gtconvtotal1." ";echo $gtconvtota21."<br>";
 
 
 $insfmark="INSERT INTO `borno_class9_10_final_result` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, `borno_subject_nine_ten_id`, `borno_result_term_id`, `borno_student_info_id`, `borno_school_roll`, `borno_school_student_name`, `temp_res_number_type1`, `temp_res_number_type1_conv`, `res_number_type2`, `res_number_type2_conv`, `res_number_type3`, `res_number_type3_conv`, `res_number_type4`, `res_number_type4_conv`, `res_number_type5`, `res_number_type5_conv`, `res_number_type6`, `res_number_type6_conv`, `res_total_mark`, `res_total_conv`,`mark_in_present`, `res_gpa`, `res_lg`,`pare`,`six_eight_4th_subject`,`uncountable`,`borno_school_stud_group`,`stu4thsub`,`heightsubjt1`,`heightsubjt2`)
		
		
		 VALUES ('$schId', '$branchId', '$studClass', '$shiftId', '$section', '$stsess', '2', '$selTerm', '$studinfoId', '$studRoll', '$studName', '$numbty1', '$convnumbty1', '$numbty2', '$convnumbty2', '$numbty3', '$convnumbty3', '$numbty4', '$convnumbty4', '$numbty5', '$convnumbty5', '$numbty6', '$convnumbty6', '$gttotalmrk', '$gtconvtotal','$markinpers', '$finalGpa', '$finallg','1','$sub4th','$uncountable','$group','$stu4th','$gtconvtotal1','$gtconvtota21')";

$quygeneralsubmark=$mysqli->query($insfmark);
}
//==================Bangla End===============================
//==================English Start===============================
elseif($stusubjId==3 OR $stusubjId==4)
{
    
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
 
 if($gtconvtotal1!="") { $gtconvtotal1=$gtconvtotal1; } else { $gtconvtotal1=0; }
 if($gtconvtota21!="") { $gtconvtota21=$gtconvtota21; } else { $gtconvtota21=0; } 
 
 
 $insfmark="INSERT INTO `borno_class9_10_final_result` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, `borno_subject_nine_ten_id`, `borno_result_term_id`, `borno_student_info_id`, `borno_school_roll`, `borno_school_student_name`, `temp_res_number_type1`, `temp_res_number_type1_conv`, `res_number_type2`, `res_number_type2_conv`, `res_number_type3`, `res_number_type3_conv`, `res_number_type4`, `res_number_type4_conv`, `res_number_type5`, `res_number_type5_conv`, `res_number_type6`, `res_number_type6_conv`, `res_total_mark`, `res_total_conv`,`mark_in_present`, `res_gpa`, `res_lg`,`pare`,`six_eight_4th_subject`,`uncountable`,`borno_school_stud_group`,`stu4thsub`,`heightsubjt1`,`heightsubjt2`)
		
		
		 VALUES ('$schId', '$branchId', '$studClass', '$shiftId', '$section', '$stsess', '4', '$selTerm', '$studinfoId', '$studRoll', '$studName', '$numbty1', '$convnumbty1', '$numbty2', '$convnumbty2', '$numbty3', '$convnumbty3', '$numbty4', '$convnumbty4', '$numbty5', '$convnumbty5', '$numbty6', '$convnumbty6', '$gttotalmrk', '$gtconvtotal','$markinpers', '$finalGpa', '$finallg','2','$sub4th','$uncountable','$group','$stu4th','$gtconvtotal1','$gtconvtota21')";
		
$quygeneralsubmark=$mysqli->query($insfmark);
}
//==================English End===============================
else
{
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
 
  if($pare!="") { $pare=$pare; } else { $pare=0; }
  
//     echo $schId." ";echo $branchId." ";echo $studClass." ";echo $shiftId." ";echo $section." ";echo $stsess." ";echo $selTerm." ";echo $studinfoId." ";echo $studRoll." ";echo $studName." ";echo $numbty1." ";echo $convnumbty1." ";echo $numbty2." ";echo $convnumbty2." ";
//  echo $numbty3." ";echo $convnumbty3." ";echo $numbty4." ";echo $convnumbty4." ";echo $numbty5." ";echo $convnumbty5." ";echo $numbty6." ";echo $convnumbty6." ";
//  echo $gttotalmrk." ";echo $gtconvtotal." ";echo $markinpers." ";echo $finalGpa." ";echo $finallg." ";echo $sub4th." ";echo $gtconvtotal1." ";echo $gtconvtota21."<br>"; 
    
 $insfmark="INSERT INTO `borno_class9_10_final_result` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, `borno_subject_nine_ten_id`, `borno_result_term_id`, `borno_student_info_id`, `borno_school_roll`, `borno_school_student_name`, `temp_res_number_type1`, `temp_res_number_type1_conv`, `res_number_type2`, `res_number_type2_conv`, `res_number_type3`, `res_number_type3_conv`, `res_number_type4`, `res_number_type4_conv`, `res_number_type5`, `res_number_type5_conv`, `res_number_type6`, `res_number_type6_conv`, `res_total_mark`, `res_total_conv`,`mark_in_present`, `res_gpa`, `res_lg`,`pare`,`six_eight_4th_subject`,`uncountable`,`borno_school_stud_group`,`stu4thsub`,`heightsubjt1`,`heightsubjt2`)
		
		
		 VALUES ('$schId', '$branchId', '$studClass', '$shiftId', '$section', '$stsess', '$stusubjId', '$selTerm', '$studinfoId', '$studRoll', '$studName', '$numbty1', '$convnumbty1', '$numbty2', '$convnumbty2', '$numbty3', '$convnumbty3', '$numbty4', '$convnumbty4', '$numbty5', '$convnumbty5', '$numbty6', '$convnumbty6', '$gttotalmrk', '$gtconvtotal','$markinpers', '$finalGpa', '$finallg','$pare','$sub4th','$uncountable','$group','$stu4th','$pare','$pare')";
		
$quygeneralsubmark=$mysqli->query($insfmark);
}
	
}
}
//==================Nine Ten End===============================
//==================Six to Eight Start===============================
elseif($studClass==3 OR $studClass==4 OR $studClass==5)
{
	$gtctmarg="select * from borno_class6_8_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND subject_id_six_eight='$stusubjId' AND borno_result_term_id='$selTerm' order by borno_school_roll asc";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){
		  
		
		
		$studinfoId=$shgtctmarg['borno_student_info_id']; 
		$studName=$shgtctmarg['borno_school_student_name']; 
		$studRoll=$shgtctmarg['borno_school_roll']; 
		
		if($pare==1)
		{
			
$delpare1="delete from borno_class6_8_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND pare='1' AND borno_result_term_id='$selTerm' AND borno_student_info_id='$studinfoId'";
    $mysqli->query($delpare1);	
	

			
			//------ Bangla-1-----------------------
				$gtctmarg1="select * from borno_class6_8_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND subject_id_six_eight='1' AND borno_result_term_id='$selTerm' AND borno_student_info_id='$studinfoId'";
  
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
		}
//------ Bangla-2-----------------------

				$gtctmarg2="select * from borno_class6_8_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND subject_id_six_eight='2' AND borno_result_term_id='$selTerm' AND borno_student_info_id='$studinfoId'";
  
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
		
		if($type11==1 AND $type12==1 AND $type21==1 AND $type22==1)
		{
		$numbty=$numbty1+$numbty2;
		}
		elseif($type11==1 AND $type12==1 AND $type13==1 AND $type21==1 AND $type22==1 AND $type23==1)
		{
		$numbty=$numbty1+$numbty2+$numbty3;
		}
		else
		{
		$numbty=0;
		}
				
		$gttotalmrk=$numbty1+$numbty2+$numbty3+$numbty4+$numbty5+$numbty6;
		$gtconvtotal=$convnumbty1+$convnumbty2+$convnumbty3+$convnumbty4+$convnumbty5+$convnumbty6;	
		$markinpers=(($gtconvtotal*100)/$gtsubjfmark);
		
		
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

		if($type11==1 AND $type12==1 AND $type21==1 AND $type22==1)
		{
		$numbty=$numbty1+$numbty2;
		}
		elseif($type11==1 AND $type12==1 AND $type13==1 AND $type21==1 AND $type22==1 AND $type23==1)
		{
		$numbty=$numbty1+$numbty2+$numbty3;
		}
		else
		{
		$numbty=0;
		}
		
		$gttotalmrk=$numbty1+$numbty2+$numbty3+$numbty4+$numbty5+$numbty6;
		$gtconvtotal=$convnumbty1+$convnumbty2+$convnumbty3+$convnumbty4+$convnumbty5+$convnumbty6;	
		$markinpers=(($gtconvtotal*100)/$gtsubjfmark);
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
		
		if($type11==1 AND $type12==1 AND $type21==1 AND $type22==1)
		{
		$numbty=$numbty1+$numbty2;
		}
		elseif($type11==1 AND $type12==1 AND $type13==1 AND $type21==1 AND $type22==1 AND $type23==1)
		{
		$numbty=$numbty1+$numbty2+$numbty3;
		}
		else
		{
		$numbty=0;
		}
		
		$gttotalmrk=$numbty1+$numbty2+$numbty3+$numbty4+$numbty5+$numbty6;
		$gtconvtotal=$convnumbty1+$convnumbty2+$convnumbty3+$convnumbty4+$convnumbty5+$convnumbty6;	
		$markinpers=(($gtconvtotal*100)/$gtsubjfmark);
	}


		//------ get number type from query top -----------------------
		
	
		}
		elseif($pare==2)
		{
		$delpare1="delete from borno_class6_8_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND pare='2' AND borno_result_term_id='$selTerm' AND borno_student_info_id='$studinfoId'";
    $mysqli->query($delpare1);	
	

			
			//------ English-1-----------------------
				$gtctmarg1="select * from borno_class6_8_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND subject_id_six_eight='3' AND borno_result_term_id='$selTerm' AND borno_student_info_id='$studinfoId'";
  
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
		}
//------ English-2-----------------------

				$gtctmarg2="select * from borno_class6_8_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND subject_id_six_eight='4' AND borno_result_term_id='$selTerm' AND borno_student_info_id='$studinfoId'";
  
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

		if($type11==1 AND $type12==1 AND $type21==1 AND $type22==1)
		{
		$numbty=$numbty1+$numbty2;
		}
		elseif($type11==1 AND $type12==1 AND $type13==1 AND $type21==1 AND $type22==1 AND $type23==1)
		{
		$numbty=$numbty1+$numbty2+$numbty3;
		}
		else
		{
		$numbty=0;
		}
				
		$gttotalmrk=$numbty1+$numbty2+$numbty3+$numbty4+$numbty5+$numbty6;
		$gtconvtotal=$convnumbty1+$convnumbty2+$convnumbty3+$convnumbty4+$convnumbty5+$convnumbty6;	
		$markinpers=(($gtconvtotal*100)/$gtsubjfmark);
		
		
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

		if($type11==1 AND $type12==1 AND $type21==1 AND $type22==1)
		{
		$numbty=$numbty1+$numbty2;
		}
		elseif($type11==1 AND $type12==1 AND $type13==1 AND $type21==1 AND $type22==1 AND $type23==1)
		{
		$numbty=$numbty1+$numbty2+$numbty3;
		}
		else
		{
		$numbty=0;
		}
		
		$gttotalmrk=$numbty1+$numbty2+$numbty3+$numbty4+$numbty5+$numbty6;
		$gtconvtotal=$convnumbty1+$convnumbty2+$convnumbty3+$convnumbty4+$convnumbty5+$convnumbty6;	
		$markinpers=(($gtconvtotal*100)/$gtsubjfmark);
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
		
		if($type11==1 AND $type12==1 AND $type21==1 AND $type22==1)
		{
		$numbty=$numbty1+$numbty2;
		}
		elseif($type11==1 AND $type12==1 AND $type13==1 AND $type21==1 AND $type22==1 AND $type23==1)
		{
		$numbty=$numbty1+$numbty2+$numbty3;
		}
		else
		{
		$numbty=0;
		}
		
		$gttotalmrk=$numbty1+$numbty2+$numbty3+$numbty4+$numbty5+$numbty6;
		$gtconvtotal=$convnumbty1+$convnumbty2+$convnumbty3+$convnumbty4+$convnumbty5+$convnumbty6;	
		$markinpers=(($gtconvtotal*100)/$gtsubjfmark);
	}


		}
		
		else
		{
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
		
		
		if($type1==1 AND $type2==1)
		{
		$numbty=$numbty1+$numbty2;
		}
		elseif($type1==1 AND $type2==1 AND $type3==1)
		{
		$numbty=$numbty1+$numbty2+$numbty3;
		}
		else
		{
		$numbty=0;
		}	
		
	    $gttotalmrk=($numbty1+$numbty2+$numbty3+$numbty4+$numbty5+$numbty6);
		$gtconvtotal=($convnumbty1+$convnumbty2+$convnumbty3+$convnumbty4+$convnumbty5+$convnumbty6);
		
		$markinpers=(($gtconvtotal*100)/$gtsubjfmark);
		



		//------ get number type from query top -----------------------
		
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
	//------------------------------------  Greade Point (GPA) ----------------------------------------------------------------------	
		if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $numbty>=$pass AND $markinpers>=$gtmarksfrom1) { $finalGpa=$gtgrtpoint1; } 
		
		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $numbty>=$pass AND $markinpers>=$gtmarksfrom2) { $finalGpa=$gtgrtpoint2; }
		
		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $numbty>=$pass AND $markinpers>=$gtmarksfrom3) { $finalGpa=$gtgrtpoint3; } 
		
		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $numbty>=$pass AND $markinpers>=$gtmarksfrom4) { $finalGpa=$gtgrtpoint4; } 
		
		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $numbty>=$pass AND $markinpers>=$gtmarksfrom5) { $finalGpa=$gtgrtpoint5; } 
		
		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $numbty>=$pass AND $markinpers>=$gtmarksfrom6) { $finalGpa=$gtgrtpoint6; } 
		
		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $numbty>=$pass AND $markinpers>=$gtmarksfrom7) { $finalGpa=$gtgrtpoint7; } 
		
		else { $finalGpa=0; } 
// ------------------------ End GPA --------------------------------------------------------------	

//----------------------------- Latter Grade ------------------------------------------------------------------
		if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $numbty>=$pass AND $markinpers>=$gtmarksfrom1) { $finallg=$gtlettergrd1; } 
		
		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $numbty>=$pass AND $markinpers>=$gtmarksfrom2) { $finallg=$gtlettergrd2; }
		
		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $numbty>=$pass AND $markinpers>=$gtmarksfrom3) { $finallg=$gtlettergrd3; } 
		
		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $numbty>=$pass AND $markinpers>=$gtmarksfrom4) { $finallg=$gtlettergrd4; } 
		
		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $numbty>=$pass AND $markinpers>=$gtmarksfrom5) { $finallg=$gtlettergrd5; } 
		
		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6pass AND $numbty>=$pass AND $markinpers>=$gtmarksfrom6) { $finallg=$gtlettergrd6; } 
		
		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6passt AND $numbty>=$pass AND $markinpers>=$gtmarksfrom7) { $finallg=$gtlettergrd7; } 
		
		else { $finallg='F'; } 
// ------------------------ Eng lg --------------------------------------------------------------			
//=========================Bangla Start=======================
if($pare==1)
{
 $insfmark="INSERT INTO `borno_class6_8_final_result` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, `subject_id_six_eight`, `borno_result_term_id`, `borno_student_info_id`, `borno_school_roll`, `borno_school_student_name`, `temp_res_number_type1`, `temp_res_number_type1_conv`, `res_number_type2`, `res_number_type2_conv`, `res_number_type3`, `res_number_type3_conv`, `res_number_type4`, `res_number_type4_conv`, `res_number_type5`, `res_number_type5_conv`, `res_number_type6`, `res_number_type6_conv`, `res_total_mark`, `res_total_conv`,`mark_in_present`, `res_gpa`, `res_lg`,`pare`,`six_eight_4th_subject`,`uncountable`,`heightsubjt1`,`heightsubjt2`)
		
		
		 VALUES ('$schId', '$branchId', '$studClass', '$shiftId', '$section', '$stsess', '2', '$selTerm', '$studinfoId', '$studRoll', '$studName', '$numbty1', '$convnumbty1', '$numbty2', '$convnumbty2', '$numbty3', '$convnumbty3', '$numbty4', '$convnumbty4', '$numbty5', '$convnumbty5', '$numbty6', '$convnumbty6', '$gttotalmrk', '$gtconvtotal','$markinpers', '$finalGpa', '$finallg','1','$sub4th','$uncountable','$gtconvtotal1','$gtconvtota21')";
	 
$quygeneralsubmark=$mysqli->query($insfmark);
}
//=========================Bangla End=======================
//=========================English Start=======================
elseif($pare==2)
{
 $insfmark="INSERT INTO `borno_class6_8_final_result` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, `subject_id_six_eight`, `borno_result_term_id`, `borno_student_info_id`, `borno_school_roll`, `borno_school_student_name`, `temp_res_number_type1`, `temp_res_number_type1_conv`, `res_number_type2`, `res_number_type2_conv`, `res_number_type3`, `res_number_type3_conv`, `res_number_type4`, `res_number_type4_conv`, `res_number_type5`, `res_number_type5_conv`, `res_number_type6`, `res_number_type6_conv`, `res_total_mark`, `res_total_conv`,`mark_in_present`, `res_gpa`, `res_lg`,`pare`,`six_eight_4th_subject`,`uncountable`,`heightsubjt1`,`heightsubjt2`)
		
		
		 VALUES ('$schId', '$branchId', '$studClass', '$shiftId', '$section', '$stsess', '4', '$selTerm', '$studinfoId', '$studRoll', '$studName', '$numbty1', '$convnumbty1', '$numbty2', '$convnumbty2', '$numbty3', '$convnumbty3', '$numbty4', '$convnumbty4', '$numbty5', '$convnumbty5', '$numbty6', '$convnumbty6', '$gttotalmrk', '$gtconvtotal','$markinpers', '$finalGpa', '$finallg','2','$sub4th','$uncountable','$gtconvtotal1','$gtconvtota21')";
		
$quygeneralsubmark=$mysqli->query($insfmark);
}
//=========================English End=======================
//==========================Other Start=====================
else
{
 $insfmark="INSERT INTO `borno_class6_8_final_result` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, `subject_id_six_eight`, `borno_result_term_id`, `borno_student_info_id`, `borno_school_roll`, `borno_school_student_name`, `temp_res_number_type1`, `temp_res_number_type1_conv`, `res_number_type2`, `res_number_type2_conv`, `res_number_type3`, `res_number_type3_conv`, `res_number_type4`, `res_number_type4_conv`, `res_number_type5`, `res_number_type5_conv`, `res_number_type6`, `res_number_type6_conv`, `res_total_mark`, `res_total_conv`,`mark_in_present`, `res_gpa`, `res_lg`,`pare`,`six_eight_4th_subject`,`uncountable`,`heightsubjt1`,`heightsubjt2`)
		
		
		 VALUES ('$schId', '$branchId', '$studClass', '$shiftId', '$section', '$stsess', '$stusubjId', '$selTerm', '$studinfoId', '$studRoll', '$studName', '$numbty1', '$convnumbty1', '$numbty2', '$convnumbty2', '$numbty3', '$convnumbty3', '$numbty4', '$convnumbty4', '$numbty5', '$convnumbty5', '$numbty6', '$convnumbty6', '$gttotalmrk', '$gtconvtotal','$markinpers', '$finalGpa', '$finallg','$pare','$sub4th','$uncountable','$pare','$pare')";
		
$quygeneralsubmark=$mysqli->query($insfmark);
}
//=========================Other End=======================
}
}
//=========================Six to Eight End=======================
//=========================Play to Five Start=======================
else
{
		$gtctmarg="select * from borno_class1_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_subject_id='$stusubjId' AND borno_result_term_id='$selTerm'";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){
		  
		
		
		$studinfoId=$shgtctmarg['borno_student_info_id']; 
		$studName=$shgtctmarg['borno_school_student_name']; 
		$studRoll=$shgtctmarg['borno_school_roll']; 
		$pare=$shgtctmarg['pare']; 
		
		if($pare==1)
		{
			
$delpare1="delete from borno_class1_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND pare='1' AND borno_result_term_id='$selTerm' AND borno_student_info_id='$studinfoId'";
    $mysqli->query($delpare1);	
	

			
			//------ Bangla-----------------------
				$gtctmarg1="select * from borno_class1_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_subject_id='$stusubjId' AND borno_result_term_id='$selTerm' AND borno_student_info_id='$studinfoId' AND pare=1";
  
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
		}
//------ Bangla-2-----------------------

				$gtctmarg2="select * from borno_class1_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_subject_id!='$stusubjId' AND borno_result_term_id='$selTerm' AND borno_student_info_id='$studinfoId' AND pare=1";
  
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
		$markinpers=(($gtconvtotal*100)/$gtsubjfmark);
		
		
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
		$markinpers=(($gtconvtotal*100)/$gtsubjfmark);
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
		$markinpers=(($gtconvtotal*100)/$gtsubjfmark);
	}
		}
		
		elseif($pare==2)
		{
			
$delpare1="delete from borno_class1_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND pare='2' AND borno_result_term_id='$selTerm' AND borno_student_info_id='$studinfoId'";
    $mysqli->query($delpare1);	
	

			
			//------ English-----------------------
				$gtctmarg1="select * from borno_class1_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_subject_id='$stusubjId' AND borno_result_term_id='$selTerm' AND borno_student_info_id='$studinfoId' AND pare=2";
  
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
		}
//------ English-2-----------------------

				$gtctmarg2="select * from borno_class1_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_subject_id!='$stusubjId' AND borno_result_term_id='$selTerm' AND borno_student_info_id='$studinfoId' AND pare=2";
  
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
		$markinpers=(($gtconvtotal*100)/$gtsubjfmark);
		
		
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
		$markinpers=(($gtconvtotal*100)/$gtsubjfmark);
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
		$markinpers=(($gtconvtotal*100)/$gtsubjfmark);
	}
		}
		
		else
		{
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
		
		$markinpers=(($gtconvtotal*100)/$gtsubjfmark);
		
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
		
		else if($numbty1>=$gtnumty1pass AND $numbty2>=$gtnumty2pass AND $numbty3>=$gtnumty3pass AND $numbty4>=$gtnumty4pass AND $numbty5>=$gtnumty5pass AND $numbty6>=$gtnumty6passt AND $markinpers>=$gtmarksfrom7) { $finallg=$gtlettergrd7; } 
		
		else { $finallg='F'; } 
// ------------------------ Eng lg --------------------------------------------------------------			
if($pare==1)
{
  $insfmark="INSERT INTO `borno_class1_final_result` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, `borno_result_subject_id`, `borno_result_term_id`, `borno_student_info_id`, `borno_school_roll`, `borno_school_student_name`, `temp_res_number_type1`, `temp_res_number_type1_conv`, `res_number_type2`, `res_number_type2_conv`, `res_number_type3`, `res_number_type3_conv`, `res_number_type4`, `res_number_type4_conv`, `res_number_type5`, `res_number_type5_conv`, `res_number_type6`, `res_number_type6_conv`, `res_total_mark`, `res_total_conv`,`mark_in_present`, `res_gpa`, `res_lg`,`subst`,`pare`)
		
		
		 VALUES ('$schId', '$branchId', '$studClass', '$shiftId', '$section', '$stsess', '$subjectidpare', '$selTerm', '$studinfoId', '$studRoll', '$studName', '$numbty1', '$convnumbty1', '$numbty2', '$convnumbty2', '$numbty3', '$convnumbty3', '$numbty4', '$convnumbty4', '$numbty5', '$convnumbty5', '$numbty6', '$convnumbty6', '$gttotalmrk', '$gtconvtotal','$markinpers', '$finalGpa', '$finallg','$sunstatus','$pare')";
	
$quygeneralsubmark=$mysqli->query($insfmark);
}
elseif($pare==2)
{
 $insfmark="INSERT INTO `borno_class1_final_result` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, `borno_result_subject_id`, `borno_result_term_id`, `borno_student_info_id`, `borno_school_roll`, `borno_school_student_name`, `temp_res_number_type1`, `temp_res_number_type1_conv`, `res_number_type2`, `res_number_type2_conv`, `res_number_type3`, `res_number_type3_conv`, `res_number_type4`, `res_number_type4_conv`, `res_number_type5`, `res_number_type5_conv`, `res_number_type6`, `res_number_type6_conv`, `res_total_mark`, `res_total_conv`,`mark_in_present`, `res_gpa`, `res_lg`,`subst`,`pare`)
		
		
		 VALUES ('$schId', '$branchId', '$studClass', '$shiftId', '$section', '$stsess', '$subjectidpare', '$selTerm', '$studinfoId', '$studRoll', '$studName', '$numbty1', '$convnumbty1', '$numbty2', '$convnumbty2', '$numbty3', '$convnumbty3', '$numbty4', '$convnumbty4', '$numbty5', '$convnumbty5', '$numbty6', '$convnumbty6', '$gttotalmrk', '$gtconvtotal','$markinpers', '$finalGpa', '$finallg','$sunstatus','$pare')";
		
$quygeneralsubmark=$mysqli->query($insfmark);
}
else
{
 $insfmark="INSERT INTO `borno_class1_final_result` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, `borno_result_subject_id`, `borno_result_term_id`, `borno_student_info_id`, `borno_school_roll`, `borno_school_student_name`, `temp_res_number_type1`, `temp_res_number_type1_conv`, `res_number_type2`, `res_number_type2_conv`, `res_number_type3`, `res_number_type3_conv`, `res_number_type4`, `res_number_type4_conv`, `res_number_type5`, `res_number_type5_conv`, `res_number_type6`, `res_number_type6_conv`, `res_total_mark`, `res_total_conv`,`mark_in_present`, `res_gpa`, `res_lg`,`subst`,`pare`)
		
		
		 VALUES ('$schId', '$branchId', '$studClass', '$shiftId', '$section', '$stsess', '$stusubjId', '$selTerm', '$studinfoId', '$studRoll', '$studName', '$numbty1', '$convnumbty1', '$numbty2', '$convnumbty2', '$numbty3', '$convnumbty3', '$numbty4', '$convnumbty4', '$numbty5', '$convnumbty5', '$numbty6', '$convnumbty6', '$gttotalmrk', '$gtconvtotal','$markinpers', '$finalGpa', '$finallg','$sunstatus','$pare')";
		
$quygeneralsubmark=$mysqli->query($insfmark);
}
}
}			
//====================Play to Five End================================
		//======================================== Height Mark Start ======================================================// 
if($studClass==3 OR $studClass==4 OR $studClass==5)
{
	$delhighmark="delete  from borno_height_mark_class6_8 where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND subject_id_six_eight='$stusubjId' AND borno_result_term_id='$selTerm'";
	  $mysqli->query($delhighmark);	
			

			$getheightmark="select * from borno_class6_8_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND subject_id_six_eight='$stusubjId' AND borno_result_term_id='$selTerm' order by total_mark desc limit 0,1";
			
			
			$qgetheightmark=$mysqli->query($getheightmark);
	        $shgetheightmark=$qgetheightmark->fetch_assoc();
			
			$gensubheightMark=$shgetheightmark['total_mark'];
	
		
			
			$insgensubmaxnum="INSERT INTO `borno_height_mark_class6_8` ( `borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`,`subject_id_six_eight`,`borno_result_term_id`, `getmaxmark`)
			
			 VALUES ('$schId', '$branchId', '$studClass', '$shiftId', '$section', '$stsess',  '$stusubjId','$selTerm', '$gensubheightMark')";
			
			$mysqli->query($insgensubmaxnum);
}

elseif($studClass==1 OR $studClass==2)
{
	$delhighmark="delete  from borno_height_mark_class9_10 where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_subject_nine_ten_id='$stusubjId' AND borno_result_term_id='$selTerm'";
	  $mysqli->query($delhighmark);	
			

$getheightmark="select * from borno_class9_10_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_subject_nine_ten_id='$stusubjId' AND borno_result_term_id='$selTerm' AND borno_school_stud_group='1' order by total_marks desc limit 0,1";
			
			
			$qgetheightmark=$mysqli->query($getheightmark);
	        $shgetheightmark=$qgetheightmark->fetch_assoc();
			
			$gensubheightMark=$shgetheightmark['total_marks'];
	
		
	if($gensubheightMark!="")
	{
			$insgensubmaxnum="INSERT INTO `borno_height_mark_class9_10` ( `borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`,`borno_subject_nine_ten_id`,`borno_school_stud_group`,`borno_result_term_id`, `getmaxmark`)
			
			 VALUES ('$schId', '$branchId', '$studClass', '$shiftId', '$section', '$stsess',  '$stusubjId','1','$selTerm', '$gensubheightMark')";
			
			$mysqli->query($insgensubmaxnum);
}

$getheightmark="select * from borno_class9_10_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_subject_nine_ten_id='$stusubjId' AND borno_result_term_id='$selTerm' AND borno_school_stud_group='2' order by total_marks desc limit 0,1";
			
			
			$qgetheightmark=$mysqli->query($getheightmark);
	        $shgetheightmark=$qgetheightmark->fetch_assoc();
			
			$gensubheightMark=$shgetheightmark['total_marks'];
	
		
	if($gensubheightMark!="")
	{
			$insgensubmaxnum="INSERT INTO `borno_height_mark_class9_10` ( `borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`,`borno_subject_nine_ten_id`,`borno_school_stud_group`,`borno_result_term_id`, `getmaxmark`)
			
			 VALUES ('$schId', '$branchId', '$studClass', '$shiftId', '$section', '$stsess',  '$stusubjId','2','$selTerm', '$gensubheightMark')";
			
			$mysqli->query($insgensubmaxnum);
}

$getheightmark="select * from borno_class9_10_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_subject_nine_ten_id='$stusubjId' AND borno_result_term_id='$selTerm' AND borno_school_stud_group='3' order by total_marks desc limit 0,1";
			
			
			$qgetheightmark=$mysqli->query($getheightmark);
	        $shgetheightmark=$qgetheightmark->fetch_assoc();
			
			$gensubheightMark=$shgetheightmark['total_marks'];
	
		
	if($gensubheightMark!="")
	{
			$insgensubmaxnum="INSERT INTO `borno_height_mark_class9_10` ( `borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`,`borno_subject_nine_ten_id`,`borno_school_stud_group`,`borno_result_term_id`, `getmaxmark`)
			
			 VALUES ('$schId', '$branchId', '$studClass', '$shiftId', '$section', '$stsess',  '$stusubjId','3','$selTerm', '$gensubheightMark')";
			
			$mysqli->query($insgensubmaxnum);
}
}
else
{
	$delhighmark="delete  from borno_maxnumber_class1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_subject_id='$stusubjId' AND borno_result_term_id='$selTerm'";
	  $mysqli->query($delhighmark);	
	  		
			$getheightmark="select * from borno_class1_temp_mark1 where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_subject_id='$stusubjId' AND borno_result_term_id='$selTerm' order by totalmark desc limit 0,1";
			
			
			$qgetheightmark=$mysqli->query($getheightmark);
	        $shgetheightmark=$qgetheightmark->fetch_assoc();
			
			$gensubheightMark=$shgetheightmark['totalmark'];
		
			
			$insgensubmaxnum="INSERT INTO `borno_maxnumber_class1` ( `borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`,`borno_result_subject_id`,`borno_result_term_id`, `getmaxmark`)
			
			 VALUES ('$schId', '$branchId', '$studClass', '$shiftId', '$section', '$stsess',  '$stusubjId','$selTerm', '$gensubheightMark')";
			
			$mysqli->query($insgensubmaxnum);
}	

//======================================== Height Mark End ======================================================// 
/*
//========================GrandTotal GPA Start=========================

//========================Nine Ten Start=========================
if($studClass==1 OR $studClass==2)
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

	$delinfo="delete from borno_school_9_10_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm'";
	
	$mysqli->query($delinfo);
	


 $gtctmarg1="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id=$studClass AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' Order by borno_student_info_id";
     $qgtctmarg1=$mysqli->query($gtctmarg1);
	while($shgtctmarg1=$qgtctmarg1->fetch_assoc()){
		
		$totalmark = 0;
		$totalconvartmark = array();
		
		$totalgpa=0;
		$gtgap= array();
		
		$studinfoId1=$shgtctmarg1['borno_student_info_id']; 
		
		


		$gtctmarg="select * from borno_class9_10_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' AND borno_student_info_id='$studinfoId1' AND stu4thsub=0 AND uncountable=0";
  
	
    $qgtctmarg=$mysqli->query($gtctmarg);
	
	if($schId!=1){	
	$totalsubject=mysqli_num_rows($qgtctmarg);
	} else { $totalsubject=9; }
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){
		  
		
		

		
		
		

		$studinfoId = $shgtctmarg['borno_student_info_id']; 
		$studName = $shgtctmarg['borno_school_student_name']; 
		$studRoll = $shgtctmarg['borno_school_roll']; 
		$group = $shgtctmarg['borno_school_stud_group']; 
		//=============================================== 4th Subject ===================================
		$get4thsubmrk="select * from borno_class9_10_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$selTerm' AND borno_student_info_id='$studinfoId1' AND stu4thsub=1";
		
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
    
    $gtFinalGPA11=substr($gtFinalGPA,0,4);
    $gtFinalGPA12=substr($gtFinalGPA1,0,4);
	 $insfmark="INSERT INTO `borno_school_9_10_merit` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`,`borno_school_stud_group`, `borno_result_term_id`, `borno_student_info_id`, `borno_school_roll`, `borno_school_student_name`, `grandtotal`,`grandtotal1`, `gpa`, `gpa1`, `finallg`, `meritno_class`, `merit_class`, `meritno_shift`, `merit_shift`, `meritno_section`, `merit_section`, `failno`, `fail_subject`) 
	
	VALUES ('$schId', '$branchId', '$studClass', '$shiftId', '$section', '$stsess','$group', '$selTerm', '$studinfoId', '$studRoll', '$studName', '$totalmark', '$totalmark3', '$gtFinalGPA11', '$gtFinalGPA12', '$finallg', '0', '', '0', '', '0', '', '0', '')";
		
		
 	$qins=$mysqli->query($insfmark);
}
 		}
}
//========================Nine Ten End=========================

//========================GrandTotal GPA End=========================

*/

if($quygeneralsubmark) { header("location:upload_marks.php?msg=1&branchId=$branchId&studClass=$studClass&shiftId=$shiftId&section=$section&stsess=$stsess&selTerm=$selTerm");} else {  header('location:upload_marks.php?msg=2'); }


?>