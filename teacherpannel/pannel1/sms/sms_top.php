<?php
error_reporting(0);
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
	$schId=$shget_schoolName['borno_school_id'];
/*
	
	$get_schoolName="select * from borno_school where borno_school_id='$schId'";
	$qget_schoolName =$mysqli->query($get_schoolName);
	$shget_schoolName=$qget_schoolName->fetch_assoc();
*/	

  //================ Count Total SMS ==================================
    $getTotSMS="select * from sms_quota where schlog_id='$schId'";
	$qgetTotSMS =$mysqli->query($getTotSMS);
	while($shgetTotSMS=$qgetTotSMS->fetch_assoc()){
		
		$getTotSMSQ[]=$shgetTotSMS['total_sms'];
		}
			$finalTotalSms=array_sum($getTotSMSQ);
			
//================== Count Use Total SMS ================================
			
	$sendTotSMS="select * from borno_sent_sms where borno_school_id='$schId'";
	$qsendTotSMS =$mysqli->query($sendTotSMS);
	$usetotalsms=mysqli_num_rows($qsendTotSMS);
	$shsendTotSMS=$qsendTotSMS->fetch_assoc();
		
	$avlSMS=($finalTotalSms-$usetotalsms);		

?>


    