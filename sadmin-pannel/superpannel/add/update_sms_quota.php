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

$schId=$_POST['instituteId'];
$adsms=$_POST['adsms'];
$smsqId=$_POST['smsqId'];
$currdate=$_POST['currdate'];

$datepicker=$_POST['datepicker'];
$comments=strip_tags($_POST['comments']);
$comentforClient=strip_tags($_POST['comentforClient']);

if($datepicker!=""){
	$smsExpd=$datepicker;
	}else{
		
		$smsExpd=$currdate;
		
		}
		
$updsms="UPDATE `sms_quota` SET `schlog_id`='$schId',`total_sms`='$adsms',`expire_date`='$smsExpd' ,`quota_comments`='$comments',`coments_clients`='$comentforClient' where `sms_quota_id`='$smsqId'";
 $qud=$mysqli->query($updsms);
 
 if	($qud) { header('location:edit_quota.php?msg=1'); } else {  header('location:edit_quota.php?msg=2'); }

 





?>