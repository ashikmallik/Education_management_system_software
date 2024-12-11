<?php
ob_start();
include('../../connection.php');

 


$gtstudent="SELECT `borno_school_phone` FROM `borno_student_info` WHERE `borno_school_id`='96' and `borno_school_class_id`='4'";
	
	$qgtstudent=$mysqli->query($gtstudent);
	while($shroll=$qgtstudent->fetch_assoc()){
	    echo $shroll['borno_school_phone'];
	}
	?>