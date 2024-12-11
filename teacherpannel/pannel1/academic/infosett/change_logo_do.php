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
	
		$schlogo = clean_html($_POST['schlogo']);
		$schlogo = strip_tags($_POST['schlogo']);
		
		 $allowed =  array('gif','png' ,'jpg','JPG');
		$filename = $_FILES['schlogo']['name'];
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		if(!in_array($ext,$allowed) ) {
		//echo 'Image Must Be gif','png' ,'jpg','JPG';
			} else {
			
					$rand = time();
					$uploaddir = 'school-logo/';
					$fnme = $rand."_".basename($_FILES['schlogo']['name']);		
					$uploadfile = $uploaddir . $fnme;
					move_uploaded_file($_FILES['schlogo']['tmp_name'], $uploadfile);
			
			}
			
			
			$updateSpass="UPDATE borno_school SET borno_school_logo ='$fnme' where borno_school_id='$schId'";
	
	$qchangp=$mysqli->query($updateSpass);
		
		
		
		if($qchangp) { header('location:change_logo.php?msg=1'); } 
		else {  header('location:change_logo.php?msg=2'); }

		
	 
 ?>
