<?php
 require_once('student_top.php');
 
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
	

    $csv=$_POST['csv'];
		
$handle = fopen($_FILES['csv']['tmp_name'], "r");
$firstRow = true;


while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

	if($firstRow) { $firstRow = false; }
	else {

		$emp_no=$data[1]; 
		$date=$data[5]; 
		
	if($emp_no!=0){	
	$branch="select * from `borno_teacher_info` where `teacher_attandance_id`='$emp_no' AND `borno_school_id`='$schId'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$name=$smsbranch['borno_teacher_name'];
	$techid=$smsbranch['borno_teacher_info_id'];	
	$branch=$smsbranch['borno_school_branch_id'];
	$shift=$smsbranch['borno_school_shift_id'];
	$intime=$smsbranch['teacher_in_time'];
	
	$intime1=substr($intime,0,2);
	$intime2=substr($intime,3,2);	

	$intime3=substr($data[9],0,2);
	$intime4=substr($data[9],3,2);
	
	$l1=($intime1*60+$intime2);
	$l2=($intime3*60+$intime4);
	
	if($data[9]==""){$late="";}
	elseif($l2>$l1){$l=$l2-$l1; $late="$l minute";}
	else{$late="";}

	$date=date("Y-m-d",strtotime($date));
	
	$branchd="select * from `borno_teacher_attandance` where `borno_teacher_info_id`='$techid' AND `borno_school_date`='$date'";
	$rsQuery1d = $mysqli->query($branchd);
	$smsbranchd=$rsQuery1d->fetch_assoc();
	$teid=$smsbranchd['borno_teacher_info_id'];
	
	if($teid==""){
		
		$bornosentSMS="INSERT INTO `borno_teacher_attandance` (`borno_school_id`,`borno_school_branch_id`,`borno_school_shift_id`,`borno_school_date`,`borno_teacher_info_id`,`borno_teacher_name`,`borno_teacher_in_time`,`borno_in_time`,`borno_out_time`,`borno_late_time`, `borno_work_time`,`borno_absent`) 
				VALUES ('$schId','$branch','$shift','$date','$techid','$name','$intime','$data[9]','$data[10]','$late', '$data[17]','$data[15]')";
				$rsQuery = $mysqli->query($bornosentSMS);	
	}
	}
}
}
fclose($handle);
		if($rsQuery) { header('location:teacher_attandance.php?msg=1'); } else { header('location:teacher_attandance.php?msg=2'); }	
				
			
	
 ?>

