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

		$schName=strip_tags($_POST['schName']);
		$schAddress=strip_tags($_POST['schAddress']);
		$schPhone=strip_tags($_POST['schPhone']);
		$schEmail=strip_tags($_POST['schEmail']);
		$schlogId=strip_tags($_POST['schlogId']);
		$schPass=strip_tags($_POST['schPass']);
		$schlogo=strip_tags($_POST['schlogo']);
		
		$scId=$_POST['schoolId'];


		$hosch=strip_tags($_POST['hosch']);



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


		 $updschool="UPDATE borno_school SET borno_school_name='$schName',borno_school_address='$schAddress',borno_school_phone='$schPhone',borno_school_email='$schEmail',borno_school_logid='$schlogId',borno_school_logpass='$schPass', signature='$hosch' where borno_school_id='$scId'";
		
		    $updateSchool=$mysqli->query($updschool);	
			
			if($updateSchool) { header('location:add_school.php?msg=1'); } else { header('location:add_school,php?msg=2'); }
		
		
	
?>