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
/*
	
	$get_schoolName="select * from borno_school where borno_school_id='$schId'";
	$qget_schoolName =$mysqli->query($get_schoolName);
	$shget_schoolName=$qget_schoolName->fetch_assoc();
*/	

  //================ Count Total SMS ==================================
    $getTotSMS="select SUM(`total_sms`) as totalsms from sms_quota where schlog_id='$schId'";
	$qgetTotSMS =$mysqli->query($getTotSMS);
	$shgetTotSMS=$qgetTotSMS->fetch_assoc();
		
		$finalTotalSms=$shgetTotSMS['totalsms'];
//		}
		//	$finalTotalSms=array_sum($getTotSMSQ);
			
//================== Count Use Total SMS ================================
			
 	$sendTotSMS="select SUM(`borno_count_sms`) as count_sms from borno_sent_sms where borno_school_id='$schId'";
 	$qsendTotSMS =$mysqli->query($sendTotSMS);
	
 		$usetotalsms=$qsendTotSMS->fetch_assoc();
		
// 		$getusetotalsms[]=$usetotalsms['borno_count_sms'];
// 		}
	
 	$usetotalsendsms=$usetotalsms['count_sms'];
		
 	$avlSMS=($finalTotalSms-$usetotalsendsms);			

?>


    