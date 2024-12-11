<?php
error_reporting(0);
ob_start();
	include('../../connection.php');
	
	
	session_start();
	$schname=$_SESSION['schname'];
	$logo=$_SESSION['logo'];
	
		
	$schId=$_SESSION['schId'];
	if($schId== "")
	{
	header("location:index.php");
	}

	
	$get_schoolName="select * from borno_school where borno_school_id='$schId'";
	$qget_schoolName =$mysqli->query($get_schoolName);
	$shget_schoolName=$qget_schoolName->fetch_assoc();
	
	$sch_sms_status=$shget_schoolName['sch_sms_status'];
	
	
	

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
//	$usetotalsms=mysqli_num_rows($qsendTotSMS);
	while($shsendTotSMS=$qsendTotSMS->fetch_assoc()){

	$usetotalsms12[]=$shsendTotSMS['total_sms_count'];
	}
		
	$usetotalsms=array_sum($usetotalsms12);
	$avlSMS=($finalTotalSms-$usetotalsms);		

?>


    