<?php require_once('student_top.php');

   $studId=$_GET['studId'];
   $status=$_GET['status'];

     $gtstudent="UPDATE `borno_student_info` SET `borno_student_status` = $status where borno_student_info_id='$studId'";
	
	$qgtstudent=$mysqli->query($gtstudent);
	
	header("location:student_info_by_search.php");

?>