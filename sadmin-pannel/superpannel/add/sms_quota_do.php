<?php
 include('pannel_top.php');
 
 require_once '../../../lib/htmlpurifier/library/HTMLPurifier.auto.php';
    
    $purifier = new HTMLPurifier();
    //$clean_html = $purifier->purify($dirty_html);
	
	if (!function_exists('clean_html')) {
		function clean_html($dirty_html = ''){
			if(empty($dirty_html))
			return $dirty_html;		
				
			global $purifier;
			$clean_html = $purifier->purify($dirty_html);
			return $clean_html;
		}
		
	}
 

$schoolId=$_POST['instituteId'];
$adsms=$_POST['adsms'];

$gdate=$_POST['smsDay'];
$gmonth=$_POST['smsMonth'];
$gyear=$_POST['smsYear'];
$comments=strip_tags($_POST['comments']);
$comentforClient=strip_tags($_POST['comentforClient']);

  $smsExpd=$_POST['datepicker'];


	date_default_timezone_set('Asia/Dhaka');
	$smsdate=date('Y-m-d');
	$smstime=date('H:I:s');



	echo $inssms="INSERT INTO `sms_quota` (`schlog_id`, `sms_date`, `sms_time`, `total_sms`, `expire_date`,`quota_comments`,`coments_clients`) 
	
							  VALUES ('$schoolId', '$smsdate', '$smstime', '$adsms', '$smsExpd','$comments','$comentforClient')";
		$qud=$mysqli->query($inssms);
		
		if($qud) { header("location:sms_quota.php?msg=1"); } else { header("location:sms_quota.php?msg=2"); }					  


/*

$goldsms="select * from schlog where schlog_id='$schoolId'";
$qgsms=$mysqli->query($goldsms);
$shsms=$qgsms->fetch_assoc();

$oldsms=$shsms['quota'];

 $fquota=$oldsms+$adsms;
 
$udsms="UPDATE schlog set quota='$fquota' where schlog_id='$schoolId'";
$qud=$mysqli->query($udsms);

if($qud) { echo "Success"; } else { echo "Failed"; }

*/


?>