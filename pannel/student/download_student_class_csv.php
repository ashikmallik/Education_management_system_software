<?php
ob_start();
require_once('student_top.php');

$schId=$_GET['schoolId'];
$gtfbranchId=$_GET['branchId'];
$studClass=$_GET['studClass'];
$stsess=trim($_GET['stsess']);


 "SELECT * FROM `borno_student_info` WHERE `borno_school_id`='$schId' AND `borno_school_class_id`='$studClass'  AND `borno_school_session`='$stsess'";




$qry = $mysqli->query("SELECT * FROM `borno_student_info` WHERE `borno_school_id`='$schId' AND `borno_school_class_id`='$studClass'  AND `borno_school_session`='$stsess' order by borno_school_roll asc");



$data = "";



$data.="StudentID".","."StudentName".","."FatherName".","."MotherName".","."ClassName".","."Shift".","."StdSection".","."StdSession".","."RollNo".","."ContactNo".","."DateofBirth".","."BldGroup".","."Religion"." ,"."Address"."\n";


while($row = $qry->fetch_assoc()) {
    
    $studid = $row['borno_student_info_id'];
    $studid1 = $row['borno_school_student_id'];
    $studClass = $row['borno_school_class_id'];
    $shiftId = $row['borno_school_shift_id'];
    $section = $row['borno_school_section_id'];
			$classSql = "SELECT * FROM `borno_school_class` WHERE `borno_school_class_id`='". $studClass ."'";
		$classQuery = $mysqli->query($classSql);
		$classInfo = $classQuery->fetch_assoc();
		
	$shiftSql = "SELECT `borno_school_shift_name` FROM `borno_school_shift` WHERE `borno_school_shift_id`='". $shiftId ."'";
		$shiftQuery = $mysqli->query($shiftSql);
		$shiftInfo = $shiftQuery->fetch_assoc();

		
		$sectionSql = "SELECT * FROM `borno_school_section` WHERE `borno_school_section_id`='". $section ."'";
		$sectionQuery = $mysqli->query($sectionSql);
		$sectionInfo = $sectionQuery->fetch_assoc();
		
		if($schId==33){	
		if($studid1==""){$studid1=$studid;}  		    
  $data .= $studid1.",".$row['borno_school_student_name'].",".$row['borno_school_father_name'].",".$row['borno_school_mother_name'].",".$classInfo['borno_school_class_name'].",".$shiftInfo['borno_school_shift_name'].",".$sectionInfo['borno_school_section_name'].",".$row['borno_school_session'].",".$row['borno_school_roll'].",".substr($row['borno_school_phone'],2,11).",".$row['borno_school_dob'].",".$row['borno_school_blood_group'].",".$row['borno_school_religion']." ,".$row['borno_school_address']."\n";

}
else
{
  $data .= $row['borno_student_info_id'].",".$row['borno_school_student_name'].",".$row['borno_school_father_name'].",".$row['borno_school_mother_name'].",".$classInfo['borno_school_class_name'].",".$shiftInfo['borno_school_shift_name'].",".$sectionInfo['borno_school_section_name'].",".$row['borno_school_session'].",".$row['borno_school_roll'].",".substr($row['borno_school_phone'],2,11).",".$row['borno_school_dob'].",".$row['borno_school_blood_group'].",".$row['borno_school_religion']." ,".$row['borno_school_address']."\n";    
}

}

header('Content-Type: application/csv');
header('Content-Disposition: attachement; filename="student_info_class.csv"');
echo $data; exit();

?>


