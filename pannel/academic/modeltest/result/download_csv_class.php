<?php
ob_start();
include('../../../../connection.php');

function clean($string) {
   $string = str_replace(' ', '-', $string);
   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);

   return preg_replace('/-+/', '-', $string);
}

if(isset($_POST) && count($_POST)>0){
    $schoolId = $_POST['schoolId'];
	$branchId = $_POST['branchId'];
	$studClass = $_POST['studClass'];
	$shiftId = $_POST['shiftId'];
	$section = $_POST['section'];
	$stsess = $_POST['stsess'];
	$selTerm = $_POST['selTerm'];
	$group = $_POST['group'];
	
		
	
	$folderName = time();
	$filePath = getcwd() . '/temp/'.$folderName;
	mkdir($filePath, 0777, true);
	
	$fileName = $fileZipName = $brnchName = $brnchFileName = $className = $classFileName = $shiftName = $shiftFileName = $sectionName = $sectionFileName = "";
	
	if($schoolId && $branchId){
	$branchSql = "SELECT * FROM `borno_school_branch` WHERE `borno_school_id`='". $schoolId ."' AND `borno_school_branch_id`='". $branchId ."'";
		$branchQuery = $mysqli->query($branchSql);
		$branchInfo = $branchQuery->fetch_assoc();	
		$brnchName = $branchInfo['borno_school_branch_name'];
		$brnchFileName = clean(strtolower($brnchName));
	}
	
	if($studClass){
		//$classSql = "SELECT `borno_school_class_name` FROM `borno_school_class` WHERE `borno_school_class_id`='". $studClass ."' AND `borno_school_id`='". $schoolId ."'";
		
		$classSql = "SELECT * FROM `borno_school_class` WHERE `borno_school_class_id`='". $studClass ."'";
		
		$classQuery = $mysqli->query($classSql);
		$classInfo = $classQuery->fetch_assoc();
		$className = $classInfo['borno_school_class_name'];
		$classFileName = clean(strtolower($className));
	}
	
	if($shiftId){
		$shiftSql = "SELECT `borno_school_shift_name` FROM `borno_school_shift` WHERE `borno_school_shift_id`='". $shiftId ."'";
		$shiftQuery = $mysqli->query($shiftSql);
		$shiftInfo = $shiftQuery->fetch_assoc();
		$shiftName = $shiftInfo['borno_school_shift_name'];
		$shiftFileName = clean(strtolower($shiftName));
	}
	
	if($section){
		$sectionSql = "SELECT * FROM `borno_school_section` WHERE `borno_school_section_id`='". $section ."' AND `borno_school_id`='". $schoolId ."'";
		$sectionQuery = $mysqli->query($sectionSql);
		$sectionInfo = $sectionQuery->fetch_assoc();
		$sectionName = $sectionInfo['borno_school_section_name'];
		$sectionFileName = clean(strtolower($sectionName));
	}
	
	if($studClass==1 OR $studClass==2)
	{
	// ================== Subject Name=================================
	if($group==1)
	{	
	$subjectSql = "SELECT * FROM `borno_subject_nine_ten` where 	borno_subject_nine_ten_13th=1 ORDER BY `borno_subject_nine_ten_id` ASC";
	$subjectQuery = $mysqli->query($subjectSql);
	while($subject = $subjectQuery->fetch_assoc()) {
		if(!empty($subject['borno_subject_nine_ten_name'])){
			$subjectName = $subject['borno_subject_nine_ten_name'];
			$stusubjId = $subject['borno_subject_nine_ten_id'];
			$fileName = $brnchFileName .'_'. $classFileName .'_'. $shiftFileName .'_'. $sectionFileName .'_'. trim($stsess) .'_'. clean(strtolower($subjectName)).'.csv';
	
			//=== Number Type ===
			
			$assnty="select * from modeltest_assign_number_type where borno_school_id='$schoolId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess'";
	$qassnty=$mysqli->query($assnty);
	$shassnty=$qassnty->fetch_assoc();
	
	$gtnumberty1=$shassnty['borno_school_number_type1'];
	$gtnumberty2=$shassnty['borno_school_number_type2'];
	$gtnumberty3=$shassnty['borno_school_number_type3'];
	$gtnumberty4=$shassnty['borno_school_number_type4'];
	$gtnumberty5=$shassnty['borno_school_number_type5'];
	$gtnumberty6=$shassnty['borno_school_number_type6'];
	
	
         //=== Subject Details ===
	$bornosubjdet="SELECT * FROM modeltest_result_nine_ten_subject_details where borno_school_id='$schoolId' AND borno_school_class_id='$studClass' AND   borno_school_session='$stsess' AND   borno_result_term_id='$selTerm' AND borin_subject_nine_ten_id='$stusubjId'";
	$qbornosubjdet=$mysqli->query($bornosubjdet);
	$shbornosubjdet=$qbornosubjdet->fetch_assoc();
	
	$gtbornonumbty1=$shbornosubjdet['number_type1_marks'];
	
	if($gtbornonumbty1==0) {  $bornonumbty1=""; } else {  $bornonumbty1=$gt1bornonumbty1;}
	
	
	$gtbornonumbty2=$shbornosubjdet['number_type2_marks'];
	
	if($gtbornonumbty2==0) { $bornonumbty2=""; } else { $bornonumbty2=$gt1bornonumbty2;}
	
	$gtbornonumbty3=$shbornosubjdet['number_type3_marks'];
	
	if($gtbornonumbty3==0) { $bornonumbty3=""; } else { $bornonumbty3=$gt1bornonumbty3;}
	
	$gtbornonumbty4=$shbornosubjdet['number_type4_marks'];
	if($gtbornonumbty4==0) { $bornonumbty4=""; } else { $bornonumbty4=$gt1bornonumbty4;}
	
	$gtbornonumbty5=$shbornosubjdet['number_type5_marks'];
	if($gtbornonumbty5==0) { $bornonumbty5=""; } else { $bornonumbty5=$gt1bornonumbty5;}
	
	$gtbornonumbty6=$shbornosubjdet['number_type6_marks'];
	
	if($gtbornonumbty6==0) { $bornonumbty6=""; } else { $bornonumbty6=$gt1bornonumbty6;}
	
	//=================== End ==========================================	
			
			$dataHeader = ['Subject', 'StudentId','Subject Id', 'Roll', 'StudentName', $gtnumberty1.'('.$gtbornonumbty1.')',$gtnumberty2.'('.$gtbornonumbty2.')',$gtnumberty3.'('.$gtbornonumbty3.')',$gtnumberty4.'('.$gtbornonumbty4.')',$gtnumberty5.'('.$gtbornonumbty5.')',$gtnumberty6.'('.$gtbornonumbty6.')'];
			
			//$dataHeader = ['Subject', 'StudentId','Subject Id', 'Roll', 'StudentName', $gtnumberty1,$gtnumberty2,$gtnumberty3,$gtnumberty4,$gtnumberty5,$gtnumberty6];
			$handle = fopen($filePath.'/'.$fileName, 'w');
			fputcsv($handle, $dataHeader);		
			
			
			$studentSql = "SELECT * FROM `borno_student_info` WHERE `borno_school_id`='". $schoolId ."' AND `borno_school_branch_id`='". $branchId ."' AND `borno_school_class_id`='". $studClass ."' AND `borno_school_shift_id`='". $shiftId ."' AND `borno_school_section_id`='". $section ."' AND `borno_school_session`='". $stsess ."' ORDER BY `borno_school_roll` ASC";
			$studentQuery = $mysqli->query($studentSql);
			while($studentInfo = $studentQuery->fetch_assoc()) {				
				
				$data = [$subjectName, $studentInfo['borno_student_info_id'],$stusubjId, $studentInfo['borno_school_roll'], $studentInfo['borno_school_student_name']];
				fputcsv($handle, $data);
			}
			
			fclose($handle);
		}
	}
	}
	elseif($group==2)
	{	
	$subjectSql = "SELECT * FROM `borno_subject_nine_ten` where 	borno_subject_nine_ten_uncountable=2 ORDER BY `borno_subject_nine_ten_id` ASC";
	$subjectQuery = $mysqli->query($subjectSql);
	while($subject = $subjectQuery->fetch_assoc()) {
		if(!empty($subject['borno_subject_nine_ten_name'])){
			$subjectName = $subject['borno_subject_nine_ten_name'];
			$stusubjId = $subject['borno_subject_nine_ten_id'];
			$fileName = $brnchFileName .'_'. $classFileName .'_'. $shiftFileName .'_'. $sectionFileName .'_'. trim($stsess) .'_'. clean(strtolower($subjectName)).'.csv';
	
			//=== Number Type ===
			
			$assnty="select * from modeltest_assign_number_type where borno_school_id='$schoolId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess'";
	$qassnty=$mysqli->query($assnty);
	$shassnty=$qassnty->fetch_assoc();
	
	$gtnumberty1=$shassnty['borno_school_number_type1'];
	$gtnumberty2=$shassnty['borno_school_number_type2'];
	$gtnumberty3=$shassnty['borno_school_number_type3'];
	$gtnumberty4=$shassnty['borno_school_number_type4'];
	$gtnumberty5=$shassnty['borno_school_number_type5'];
	$gtnumberty6=$shassnty['borno_school_number_type6'];
	
	
         //=== Subject Details ===
	$bornosubjdet="SELECT * FROM modeltest_result_nine_ten_subject_details where borno_school_id='$schoolId' AND borno_school_class_id='$studClass' AND   borno_school_session='$stsess' AND   borno_result_term_id='$selTerm' AND borin_subject_nine_ten_id='$stusubjId'";
	$qbornosubjdet=$mysqli->query($bornosubjdet);
	$shbornosubjdet=$qbornosubjdet->fetch_assoc();
	
	$gtbornonumbty1=$shbornosubjdet['number_type1_marks'];
	
	if($gtbornonumbty1==0) {  $bornonumbty1=""; } else {  $bornonumbty1=$gt1bornonumbty1;}
	
	
	$gtbornonumbty2=$shbornosubjdet['number_type2_marks'];
	
	if($gtbornonumbty2==0) { $bornonumbty2=""; } else { $bornonumbty2=$gt1bornonumbty2;}
	
	$gtbornonumbty3=$shbornosubjdet['number_type3_marks'];
	
	if($gtbornonumbty3==0) { $bornonumbty3=""; } else { $bornonumbty3=$gt1bornonumbty3;}
	
	$gtbornonumbty4=$shbornosubjdet['number_type4_marks'];
	if($gtbornonumbty4==0) { $bornonumbty4=""; } else { $bornonumbty4=$gt1bornonumbty4;}
	
	$gtbornonumbty5=$shbornosubjdet['number_type5_marks'];
	if($gtbornonumbty5==0) { $bornonumbty5=""; } else { $bornonumbty5=$gt1bornonumbty5;}
	
	$gtbornonumbty6=$shbornosubjdet['number_type6_marks'];
	
	if($gtbornonumbty6==0) { $bornonumbty6=""; } else { $bornonumbty6=$gt1bornonumbty6;}
	
	//=================== End ==========================================	
			
			$dataHeader = ['Subject', 'StudentId','Subject Id', 'Roll', 'StudentName', $gtnumberty1.'('.$gtbornonumbty1.')',$gtnumberty2.'('.$gtbornonumbty2.')',$gtnumberty3.'('.$gtbornonumbty3.')',$gtnumberty4.'('.$gtbornonumbty4.')',$gtnumberty5.'('.$gtbornonumbty5.')',$gtnumberty6.'('.$gtbornonumbty6.')'];
			
			//$dataHeader = ['Subject', 'StudentId','Subject Id', 'Roll', 'StudentName', $gtnumberty1,$gtnumberty2,$gtnumberty3,$gtnumberty4,$gtnumberty5,$gtnumberty6];
			$handle = fopen($filePath.'/'.$fileName, 'w');
			fputcsv($handle, $dataHeader);		
			
			
			$studentSql = "SELECT * FROM `borno_student_info` WHERE `borno_school_id`='". $schoolId ."' AND `borno_school_branch_id`='". $branchId ."' AND `borno_school_class_id`='". $studClass ."' AND `borno_school_shift_id`='". $shiftId ."' AND `borno_school_section_id`='". $section ."' AND `borno_school_session`='". $stsess ."' ORDER BY `borno_school_roll` ASC";
			$studentQuery = $mysqli->query($studentSql);
			while($studentInfo = $studentQuery->fetch_assoc()) {				
				
				$data = [$subjectName, $studentInfo['borno_student_info_id'],$stusubjId, $studentInfo['borno_school_roll'], $studentInfo['borno_school_student_name']];
				fputcsv($handle, $data);
			}
			
			fclose($handle);
		}
	}
	}
	elseif($group==3)
	{	
	$subjectSql = "SELECT * FROM `borno_subject_nine_ten` where borno_subject_nine_ten_fullMark=3 ORDER BY `borno_subject_nine_ten_id` ASC";
	$subjectQuery = $mysqli->query($subjectSql);
	while($subject = $subjectQuery->fetch_assoc()) {
		if(!empty($subject['borno_subject_nine_ten_name'])){
			$subjectName = $subject['borno_subject_nine_ten_name'];
			$stusubjId = $subject['borno_subject_nine_ten_id'];
			$fileName = $brnchFileName .'_'. $classFileName .'_'. $shiftFileName .'_'. $sectionFileName .'_'. trim($stsess) .'_'. clean(strtolower($subjectName)).'.csv';
	
			//=== Number Type ===
			
			$assnty="select * from modeltest_assign_number_type where borno_school_id='$schoolId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess'";
	$qassnty=$mysqli->query($assnty);
	$shassnty=$qassnty->fetch_assoc();
	
	$gtnumberty1=$shassnty['borno_school_number_type1'];
	$gtnumberty2=$shassnty['borno_school_number_type2'];
	$gtnumberty3=$shassnty['borno_school_number_type3'];
	$gtnumberty4=$shassnty['borno_school_number_type4'];
	$gtnumberty5=$shassnty['borno_school_number_type5'];
	$gtnumberty6=$shassnty['borno_school_number_type6'];
	
	
         //=== Subject Details ===
	$bornosubjdet="SELECT * FROM modeltest_result_nine_ten_subject_details where borno_school_id='$schoolId' AND borno_school_class_id='$studClass' AND   borno_school_session='$stsess' AND   borno_result_term_id='$selTerm' AND borin_subject_nine_ten_id='$stusubjId'";
	$qbornosubjdet=$mysqli->query($bornosubjdet);
	$shbornosubjdet=$qbornosubjdet->fetch_assoc();
	
	$gtbornonumbty1=$shbornosubjdet['number_type1_marks'];
	
	if($gtbornonumbty1==0) {  $bornonumbty1=""; } else {  $bornonumbty1=$gt1bornonumbty1;}
	
	
	$gtbornonumbty2=$shbornosubjdet['number_type2_marks'];
	
	if($gtbornonumbty2==0) { $bornonumbty2=""; } else { $bornonumbty2=$gt1bornonumbty2;}
	
	$gtbornonumbty3=$shbornosubjdet['number_type3_marks'];
	
	if($gtbornonumbty3==0) { $bornonumbty3=""; } else { $bornonumbty3=$gt1bornonumbty3;}
	
	$gtbornonumbty4=$shbornosubjdet['number_type4_marks'];
	if($gtbornonumbty4==0) { $bornonumbty4=""; } else { $bornonumbty4=$gt1bornonumbty4;}
	
	$gtbornonumbty5=$shbornosubjdet['number_type5_marks'];
	if($gtbornonumbty5==0) { $bornonumbty5=""; } else { $bornonumbty5=$gt1bornonumbty5;}
	
	$gtbornonumbty6=$shbornosubjdet['number_type6_marks'];
	
	if($gtbornonumbty6==0) { $bornonumbty6=""; } else { $bornonumbty6=$gt1bornonumbty6;}
	
	//=================== End ==========================================	
			
			$dataHeader = ['Subject', 'StudentId','Subject Id', 'Roll', 'StudentName', $gtnumberty1.'('.$gtbornonumbty1.')',$gtnumberty2.'('.$gtbornonumbty2.')',$gtnumberty3.'('.$gtbornonumbty3.')',$gtnumberty4.'('.$gtbornonumbty4.')',$gtnumberty5.'('.$gtbornonumbty5.')',$gtnumberty6.'('.$gtbornonumbty6.')'];
			
			//$dataHeader = ['Subject', 'StudentId','Subject Id', 'Roll', 'StudentName', $gtnumberty1,$gtnumberty2,$gtnumberty3,$gtnumberty4,$gtnumberty5,$gtnumberty6];
			$handle = fopen($filePath.'/'.$fileName, 'w');
			fputcsv($handle, $dataHeader);		
			
			
			$studentSql = "SELECT * FROM `borno_student_info` WHERE `borno_school_id`='". $schoolId ."' AND `borno_school_branch_id`='". $branchId ."' AND `borno_school_class_id`='". $studClass ."' AND `borno_school_shift_id`='". $shiftId ."' AND `borno_school_section_id`='". $section ."' AND `borno_school_session`='". $stsess ."' ORDER BY `borno_school_roll` ASC";
			$studentQuery = $mysqli->query($studentSql);
			while($studentInfo = $studentQuery->fetch_assoc()) {				
				
				$data = [$subjectName, $studentInfo['borno_student_info_id'],$stusubjId, $studentInfo['borno_school_roll'], $studentInfo['borno_school_student_name']];
				fputcsv($handle, $data);
			}
			
			fclose($handle);
		}
	}
	}
	else
	{	
	$subjectSql = "SELECT * FROM `borno_subject_nine_ten` ORDER BY `borno_subject_nine_ten_id` ASC";
	$subjectQuery = $mysqli->query($subjectSql);
	while($subject = $subjectQuery->fetch_assoc()) {
		if(!empty($subject['borno_subject_nine_ten_name'])){
			$subjectName = $subject['borno_subject_nine_ten_name'];
			$stusubjId = $subject['borno_subject_nine_ten_id'];
			$fileName = $brnchFileName .'_'. $classFileName .'_'. $shiftFileName .'_'. $sectionFileName .'_'. trim($stsess) .'_'. clean(strtolower($subjectName)).'.csv';
	
			//=== Number Type ===
			
			$assnty="select * from modeltest_assign_number_type where borno_school_id='$schoolId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess'";
	$qassnty=$mysqli->query($assnty);
	$shassnty=$qassnty->fetch_assoc();
	
	$gtnumberty1=$shassnty['borno_school_number_type1'];
	$gtnumberty2=$shassnty['borno_school_number_type2'];
	$gtnumberty3=$shassnty['borno_school_number_type3'];
	$gtnumberty4=$shassnty['borno_school_number_type4'];
	$gtnumberty5=$shassnty['borno_school_number_type5'];
	$gtnumberty6=$shassnty['borno_school_number_type6'];
	
	
         //=== Subject Details ===
	$bornosubjdet="SELECT * FROM modeltest_result_nine_ten_subject_details where borno_school_id='$schoolId' AND borno_school_class_id='$studClass' AND   borno_school_session='$stsess' AND   borno_result_term_id='$selTerm' AND borin_subject_nine_ten_id='$stusubjId'";
	$qbornosubjdet=$mysqli->query($bornosubjdet);
	$shbornosubjdet=$qbornosubjdet->fetch_assoc();
	
	$gtbornonumbty1=$shbornosubjdet['number_type1_marks'];
	
	if($gtbornonumbty1==0) {  $bornonumbty1=""; } else {  $bornonumbty1=$gt1bornonumbty1;}
	
	
	$gtbornonumbty2=$shbornosubjdet['number_type2_marks'];
	
	if($gtbornonumbty2==0) { $bornonumbty2=""; } else { $bornonumbty2=$gt1bornonumbty2;}
	
	$gtbornonumbty3=$shbornosubjdet['number_type3_marks'];
	
	if($gtbornonumbty3==0) { $bornonumbty3=""; } else { $bornonumbty3=$gt1bornonumbty3;}
	
	$gtbornonumbty4=$shbornosubjdet['number_type4_marks'];
	if($gtbornonumbty4==0) { $bornonumbty4=""; } else { $bornonumbty4=$gt1bornonumbty4;}
	
	$gtbornonumbty5=$shbornosubjdet['number_type5_marks'];
	if($gtbornonumbty5==0) { $bornonumbty5=""; } else { $bornonumbty5=$gt1bornonumbty5;}
	
	$gtbornonumbty6=$shbornosubjdet['number_type6_marks'];
	
	if($gtbornonumbty6==0) { $bornonumbty6=""; } else { $bornonumbty6=$gt1bornonumbty6;}
	
	//=================== End ==========================================	
			
			$dataHeader = ['Subject', 'StudentId','Subject Id', 'Roll', 'StudentName', $gtnumberty1.'('.$gtbornonumbty1.')',$gtnumberty2.'('.$gtbornonumbty2.')',$gtnumberty3.'('.$gtbornonumbty3.')',$gtnumberty4.'('.$gtbornonumbty4.')',$gtnumberty5.'('.$gtbornonumbty5.')',$gtnumberty6.'('.$gtbornonumbty6.')'];
			
			//$dataHeader = ['Subject', 'StudentId','Subject Id', 'Roll', 'StudentName', $gtnumberty1,$gtnumberty2,$gtnumberty3,$gtnumberty4,$gtnumberty5,$gtnumberty6];
			$handle = fopen($filePath.'/'.$fileName, 'w');
			fputcsv($handle, $dataHeader);		
			
			
			$studentSql = "SELECT * FROM `borno_student_info` WHERE `borno_school_id`='". $schoolId ."' AND `borno_school_branch_id`='". $branchId ."' AND `borno_school_class_id`='". $studClass ."' AND `borno_school_shift_id`='". $shiftId ."' AND `borno_school_section_id`='". $section ."' AND `borno_school_session`='". $stsess ."' ORDER BY `borno_school_roll` ASC";
			$studentQuery = $mysqli->query($studentSql);
			while($studentInfo = $studentQuery->fetch_assoc()) {				
				
				$data = [$subjectName, $studentInfo['borno_student_info_id'],$stusubjId, $studentInfo['borno_school_roll'], $studentInfo['borno_school_student_name']];
				fputcsv($handle, $data);
			}
			
			fclose($handle);
		}
	}
	}
	}
// ================== Subject Name=================================
elseif($studClass==3 OR $studClass==4 OR $studClass==5)
	{
	
	$studSetSub="SELECT * FROM `modeltest_set_subject_six_eight` where borno_school_id ='$schoolId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess'";
	
	$qstudSetSub = $mysqli->query($studSetSub);
	while($shstudSetSub = $qstudSetSub->fetch_assoc()) {
		
		$getSubjId=$shstudSetSub['subject_id_six_eight'];
	
	$subjectSql = "SELECT * FROM `borno_subject_six_eight` where subject_id_six_eight='$getSubjId'";
	$subjectQuery = $mysqli->query($subjectSql);
	$subject = $subjectQuery->fetch_assoc();
		if(!empty($subject['six_eight_subject_name'])){
			$subjectName = $subject['six_eight_subject_name'];
			$stusubjId = $subject['subject_id_six_eight'];
			$fileName = $brnchFileName .'_'. $classFileName .'_'. $shiftFileName .'_'. $sectionFileName .'_'. trim($stsess) .'_'. clean(strtolower($subjectName)).'.csv';
	

		
//=== Number Type ===
$assnty="select * from modeltest_assign_number_type where borno_school_id='$schoolId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess'";
	$qassnty=$mysqli->query($assnty);
	$shassnty=$qassnty->fetch_assoc();
	
	$gtnumberty1=$shassnty['borno_school_number_type1'];
	$gtnumberty2=$shassnty['borno_school_number_type2'];
	$gtnumberty3=$shassnty['borno_school_number_type3'];
	$gtnumberty4=$shassnty['borno_school_number_type4'];
	$gtnumberty5=$shassnty['borno_school_number_type5'];
	$gtnumberty6=$shassnty['borno_school_number_type6'];
  //=== Subject Details ===
  $bornosubjdet="SELECT * FROM modeltest_six_eight_subject_details where borno_school_id='$schoolId' AND borno_school_class_id='$studClass' AND   borno_school_session='$stsess' AND   borno_result_term_id='$selTerm' AND subject_id_six_eight='$stusubjId'";
	$qbornosubjdet=$mysqli->query($bornosubjdet);
	$shbornosubjdet=$qbornosubjdet->fetch_assoc();
	
	$gtbornonumbty1=$shbornosubjdet['number_type1_marks'];
	
	if($gtbornonumbty1==0) {  $bornonumbty1=""; } else {  $bornonumbty1=$gt1bornonumbty1;}
	
	
	$gtbornonumbty2=$shbornosubjdet['number_type2_marks'];
	
	if($gtbornonumbty2==0) { $bornonumbty2=""; } else { $bornonumbty2=$gt1bornonumbty2;}
	
	$gtbornonumbty3=$shbornosubjdet['number_type3_marks'];
	
	if($gtbornonumbty3==0) { $bornonumbty3=""; } else { $bornonumbty3=$gt1bornonumbty3;}
	
	$gtbornonumbty4=$shbornosubjdet['number_type4_marks'];
	if($gtbornonumbty4==0) { $bornonumbty4=""; } else { $bornonumbty4=$gt1bornonumbty4;}
	
	$gtbornonumbty5=$shbornosubjdet['number_type5_marks'];
	if($gtbornonumbty5==0) { $bornonumbty5=""; } else { $bornonumbty5=$gt1bornonumbty5;}
	
	$gtbornonumbty6=$shbornosubjdet['number_type6_marks'];
	
	if($gtbornonumbty6==0) { $bornonumbty6=""; } else { $bornonumbty6=$gt1bornonumbty6;}
  //=================== End ==========================================	
			
			$dataHeader = ['Subject', 'StudentId','Subject Id', 'Roll', 'StudentName', $gtnumberty1.'('.$gtbornonumbty1.')',$gtnumberty2.'('.$gtbornonumbty2.')',$gtnumberty3.'('.$gtbornonumbty3.')',$gtnumberty4.'('.$gtbornonumbty4.')',$gtnumberty5.'('.$gtbornonumbty5.')',$gtnumberty6.'('.$gtbornonumbty6.')'];
			
			//$dataHeader = ['Subject', 'StudentId','Subject Id', 'Roll', 'StudentName', $gtnumberty1,$gtnumberty2,$gtnumberty3,$gtnumberty4,$gtnumberty5,$gtnumberty6];
			$handle = fopen($filePath.'/'.$fileName, 'w');
			fputcsv($handle, $dataHeader);		
			
			
			$studentSql = "SELECT * FROM `borno_student_info` WHERE `borno_school_id`='". $schoolId ."' AND `borno_school_branch_id`='". $branchId ."' AND `borno_school_class_id`='". $studClass ."' AND `borno_school_shift_id`='". $shiftId ."' AND `borno_school_section_id`='". $section ."' AND `borno_school_session`='". $stsess ."' ORDER BY `borno_school_roll` ASC";
			$studentQuery = $mysqli->query($studentSql);
			while($studentInfo = $studentQuery->fetch_assoc()) {				
				
				$data = [$subjectName, $studentInfo['borno_student_info_id'],$stusubjId, $studentInfo['borno_school_roll'], $studentInfo['borno_school_student_name']];
				fputcsv($handle, $data);
			}
			
			fclose($handle);
		}
	}
	}
	else
	{
  // ================== Subject Name=================================
 $subjectSql = "SELECT * FROM `modeltest_result_subject` where borno_school_id='$schoolId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' ORDER BY `modeltest_result_subject_id` ASC";
	$subjectQuery = $mysqli->query($subjectSql);
	while($subject = $subjectQuery->fetch_assoc()) {
		if(!empty($subject['borno_school_subject_name'])){
			$subjectName = $subject['borno_school_subject_name'];
			$stusubjId = $subject['modeltest_result_subject_id'];
			$fileName = $brnchFileName .'_'. $classFileName .'_'. $shiftFileName .'_'. $sectionFileName .'_'. trim($stsess) .'_'. clean(strtolower($subjectName)).'.csv';
//=== Number Type ===
$assnty="select * from modeltest_assign_number_type where borno_school_id='$schoolId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess'";
	$qassnty=$mysqli->query($assnty);
	$shassnty=$qassnty->fetch_assoc();
	
	$gtnumberty1=$shassnty['borno_school_number_type1'];
	$gtnumberty2=$shassnty['borno_school_number_type2'];
	$gtnumberty3=$shassnty['borno_school_number_type3'];
	$gtnumberty4=$shassnty['borno_school_number_type4'];
	$gtnumberty5=$shassnty['borno_school_number_type5'];
	$gtnumberty6=$shassnty['borno_school_number_type6'];
  //=== Subject Details ===
 $bornosubjdet="SELECT * FROM modeltest_subject_details where borno_school_id='$schoolId' AND borno_school_class_id='$studClass' AND   borno_school_session='$stsess' AND   borno_result_term_id='$selTerm' AND borno_result_subject_id='$stusubjId'";
	$qbornosubjdet=$mysqli->query($bornosubjdet);
	$shbornosubjdet=$qbornosubjdet->fetch_assoc();
	
	$gtbornonumbty1=$shbornosubjdet['number_type1_marks'];
	
	if($gtbornonumbty1==0) {  $bornonumbty1=""; } else {  $bornonumbty1=$gt1bornonumbty1;}
	
	
	$gtbornonumbty2=$shbornosubjdet['number_type2_marks'];
	
	if($gtbornonumbty2==0) { $bornonumbty2=""; } else { $bornonumbty2=$gt1bornonumbty2;}
	
	$gtbornonumbty3=$shbornosubjdet['number_type3_marks'];
	
	if($gtbornonumbty3==0) { $bornonumbty3=""; } else { $bornonumbty3=$gt1bornonumbty3;}
	
	$gtbornonumbty4=$shbornosubjdet['number_type4_marks'];
	if($gtbornonumbty4==0) { $bornonumbty4=""; } else { $bornonumbty4=$gt1bornonumbty4;}
	
	$gtbornonumbty5=$shbornosubjdet['number_type5_marks'];
	if($gtbornonumbty5==0) { $bornonumbty5=""; } else { $bornonumbty5=$gt1bornonumbty5;}
	
	$gtbornonumbty6=$shbornosubjdet['number_type6_marks'];
	
	if($gtbornonumbty6==0) { $bornonumbty6=""; } else { $bornonumbty6=$gt1bornonumbty6;} 
 //=================== End ==========================================	
			
			$dataHeader = ['Subject', 'StudentId','Subject Id', 'Roll', 'StudentName', $gtnumberty1.'('.$gtbornonumbty1.')',$gtnumberty2.'('.$gtbornonumbty2.')',$gtnumberty3.'('.$gtbornonumbty3.')',$gtnumberty4.'('.$gtbornonumbty4.')',$gtnumberty5.'('.$gtbornonumbty5.')',$gtnumberty6.'('.$gtbornonumbty6.')'];
			
			//$dataHeader = ['Subject', 'StudentId','Subject Id', 'Roll', 'StudentName', $gtnumberty1,$gtnumberty2,$gtnumberty3,$gtnumberty4,$gtnumberty5,$gtnumberty6];
			$handle = fopen($filePath.'/'.$fileName, 'w');
			fputcsv($handle, $dataHeader);		
			
			
			$studentSql = "SELECT * FROM `borno_student_info` WHERE `borno_school_id`='". $schoolId ."' AND `borno_school_branch_id`='". $branchId ."' AND `borno_school_class_id`='". $studClass ."' AND `borno_school_shift_id`='". $shiftId ."' AND `borno_school_section_id`='". $section ."' AND `borno_school_session`='". $stsess ."' ORDER BY `borno_school_roll` ASC";
			$studentQuery = $mysqli->query($studentSql);
			while($studentInfo = $studentQuery->fetch_assoc()) {				
				
				$data = [$subjectName, $studentInfo['borno_student_info_id'],$stusubjId, $studentInfo['borno_school_roll'], $studentInfo['borno_school_student_name']];
				fputcsv($handle, $data);
			}
			
			fclose($handle);
		}
	}
	} 
	// Get real path for our folder
	
$fileZipName = $brnchFileName .'_'. $classFileName .'_'. $shiftFileName .'_'. $sectionFileName .'_'. trim($stsess) .'_'. time() .'.zip';
    $rootPath = realpath($filePath);
	
	// Initialize archive object
	$zip = new ZipArchive();
	$zip->open($fileZipName, ZipArchive::CREATE | ZipArchive::OVERWRITE);

	// Create recursive directory iterator
	/** @var SplFileInfo[] $files */
	$files = new RecursiveIteratorIterator(
		new RecursiveDirectoryIterator($rootPath),
		RecursiveIteratorIterator::LEAVES_ONLY
	);

	foreach ($files as $name => $file)
	{
		// Skip directories (they would be added automatically)
		if (!$file->isDir())
		{
			// Get real and relative path for current file
			$filePath = $file->getRealPath();
			$relativePath = substr($filePath, strlen($rootPath) + 1);

			// Add current file to archive
			$zip->addFile($filePath, $relativePath);
		}
	}

	// Zip archive will be created only after closing object
	$zip->close();


	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename='.basename($fileZipName));
	header('Content-Transfer-Encoding: binary');
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	header('Content-Length: ' . filesize($fileZipName));
	readfile($fileZipName);
	
	$fileZipNamePath = getcwd().'/'.$fileZipName;
	$tempFilePath = getcwd().'/temp/'.$folderName.'/';
	if(file_exists($fileZipNamePath)){
		unlink($fileZipNamePath);
		rmdir($tempFilePath);
	}
}

exit;			
					
?>