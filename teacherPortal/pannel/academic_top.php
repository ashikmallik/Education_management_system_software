<?php
error_reporting(0);
ob_start();
	include('../../connection.php');
	
	
	session_start();
	$schname=$_SESSION['schname'];
	
	$userid = $_SESSION['userid'];
		
   $teacherid = $_SESSION['teacherid'];
if(empty($userid)){
    session_destroy();
}
	
	$get_schoolName="select * from borno_school where borno_school_id='1'";
	$qget_schoolName =$mysqli->query($get_schoolName);
	$shget_schoolName=$qget_schoolName->fetch_assoc();
	
?>