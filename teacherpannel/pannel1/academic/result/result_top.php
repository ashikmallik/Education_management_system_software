<?php
error_reporting(0);
ob_start();
	include('../../../connection.php');
	
	
	session_start();
	//$schname=$_SESSION['schname'];
	//$logo=$_SESSION['logo'];	
	$techId=trim($_GET['stdid']);	
	$techId=trim($_SESSION['stdid']);
	
	$schId=trim($_GET['schId']);	
	$schId=trim($_SESSION['schId']);
	
	if($techId== "")
	{
	header("location:index.php");
	}

	
$get_schoolName="select * from borno_teacher_info where borno_teacher_info_id='$techId'";
	$qget_schoolName =$mysqli->query($get_schoolName);
	$shget_schoolName=$qget_schoolName->fetch_assoc();
	
?>


    