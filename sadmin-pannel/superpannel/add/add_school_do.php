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
	
		$schName = clean_html($_POST['schName']);
		$schAddress = clean_html($_POST['schAddress']);
		$schPhone = clean_html($_POST['schPhone']);
		$schEmail = clean_html($_POST['schEmail']);
		
		$schlogId = clean_html($_POST['schlogId']);
		$schPass = clean_html($_POST['schPass']);
		$schlogo = clean_html($_POST['schlogo']);


		$schName=strip_tags($_POST['schName']);
		$schAddress=strip_tags($_POST['schAddress']);
		$schPhone=strip_tags($_POST['schPhone']);
		$schEmail=strip_tags($_POST['schEmail']);
		
		$schlogId=strip_tags($_POST['schlogId']);
		$schPass=md5($_POST['schPass']);
		
		$schlogo=strip_tags($_POST['schlogo']);
		
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
			if($_FILES['schlogo']['name']!="") { $fnme='../../../sadmin-pannel/superpannel/add/school-logo/'.$fnme;  } else { $fnme='../../../sadmin-pannel/superpannel/add/school-logo/no-logo.jpg'; }






   $addschool="INSERT INTO `borno_school` (`borno_school_name`, `borno_school_address`, `borno_school_phone`, `borno_school_email`, `borno_school_logid`, `borno_school_logpass`, `borno_school_logo`,`head_of_school`) 
   
   VALUES ('$schName', '$schAddress', '$schPhone', '$schEmail', '$schlogId', '$schPass', '$fnme','$hosch')";
   
   
   
   $qaddschool=$mysqli->query($addschool);
	
	if($qaddschool) { header('location:add_school.php?msg=1'); } else { header('location:add_school,php?msg=2'); }



  


?>