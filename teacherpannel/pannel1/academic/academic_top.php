<?php
//error_reporting(0);
ob_start();
	include('../../connection.php');
	
	
	session_start();
	$stdid=$_SESSION['stdid'];
	if($stdid== "")
	{
	header("location:index.php");
	}

	
	$get_schoolName="select * from borno_teacher_info where borno_teacher_info_id='$stdid'";
	$qget_schoolName =$mysqli->query($get_schoolName);
	$shget_schoolName=$qget_schoolName->fetch_assoc();
	$incharge1=$shget_schoolName['borno_teachers_designation'];
	if($incharge1=="Incharge (Morning)" OR $incharge1=="Incharge (Day)" OR $incharge1=="Co-Incharge (Day)" OR $incharge1=="Co-Incharge (Day)")
	{$incharge=1;}
	
?>


    