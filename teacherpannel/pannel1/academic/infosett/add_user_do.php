<?php
 require_once('information_top.php');
 
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
	

						
		$username = clean_html($_POST['username']);
		$username1 = strip_tags($_POST['username']);
		
		
		$address = clean_html($_POST['address']);
		$address1 = strip_tags($_POST['address']);
		
		$phone = clean_html($_POST['phone']);
		$phone1 = strip_tags($_POST['phone']);		
		
		$email = clean_html($_POST['email']);
		$email1 = strip_tags($_POST['email']);
		
		$gender = clean_html($_POST['gender']);
		$gender1 = strip_tags($_POST['gender']);
		
		$usertype = clean_html($_POST['ustype']);
		$usertype1 = strip_tags($_POST['ustype']);
		
		$loginId = clean_html($_POST['loginId']);
		$loginId1 = strip_tags($_POST['loginId']);
		
		$loginpw = clean_html($_POST['loginpw']);
		$loginpw1 = strip_tags($_POST['loginpw']);
		
	

		
	$logid="select * from `borno_user` where `borno_school_id`='$schId'   AND `borno_user_log_id`='$loginId1' AND `borno_user_log_pass`='$loginpw1' ";
	
	
	$rsQuery1 = $mysqli->query($logid);
	$qlogid=$rsQuery1->fetch_assoc();
		
		if($qlogid['borno_user_log_id']==$loginId1){
			header("location:add_user.php?msg=3");
			
			}
			else
			{
	
		$allowed =  array('gif','png' ,'jpg','JPG');
			$filename = $_FILES['timg']['name'];
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			if(!in_array($ext,$allowed) ) {
			echo 'error';
			} else {
			
			$rand = time();
			$uploaddir = 'userphoto/';
			$fnme = $rand."_".basename($_FILES['timg']['name']);		
			$uploadfile = $uploaddir . $fnme;
			move_uploaded_file($_FILES['timg']['tmp_name'], $uploadfile);
			
			if($_FILES['timg']['name']!=""){ $fnme=$fnme; } else { $fnme=""; }
			}
		
		
	 $insertuser="INSERT INTO `borno_user` (`borno_school_id`, `borno_user_name`, `borno_user_address`,`borno_user_phone`,`borno_user_email`,`borno_user_gender`,`borno_user_log_id`,`borno_user_log_pass`,`borno_user_photo`,`borno_user_type`, `borno_user_status`)
											
		VALUES ('$schId',  '$username1','$address1','$phone1','$email1','$gender1','$loginId1','$loginpw1','$fnme','$usertype1','1')";
															
	
			
				$qinsertuser = $mysqli->prepare($insertuser);
				$qinsertuser->execute();
				
if($qinsertuser) { header('location:add_user.php?msg=1'); } else { header('location:add_user.php?msg=2'); }				
				
			
			}
 
 ?>

