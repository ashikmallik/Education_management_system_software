<?php
//error_reporting(0);
ob_start();
include('../../../connection.php');
	
	
	session_start();
	$stdid=$_SESSION['stdid'];
	if($stdid== "")
	{
	header("location:index.php");
	}

	
	$get_schoolName="select * from borno_student_info where borno_student_info_id='$stdid'";
	$qget_schoolName =$mysqli->query($get_schoolName);
	$shget_schoolName=$qget_schoolName->fetch_assoc();
	
?>