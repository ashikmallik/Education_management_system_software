<?php
error_reporting(0);
ob_start();
	include('../../../connection.php');
	
	
	session_start();
   $_SESSION['schId'] = 1;
		$userid = $_SESSION['userid'];
		
   $teacherid = $_SESSION['teacherid'];

		
	$schId=$_SESSION['schId'];
	if($schId== "")
	{
	header("location:../index.php");
	}
/*
	
	$get_schoolName="select * from borno_school where borno_school_id='$schId'";
	$qget_schoolName =$mysqli->query($get_schoolName);
	$shget_schoolName=$qget_schoolName->fetch_assoc();
*/	
?>


    