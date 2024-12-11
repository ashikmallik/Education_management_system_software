<?php
include('config.php');
$schId = 1;
	
		$studId = $_POST['stdid'];
		$studClass = $_POST['studClass'];
		$shiftId = $_POST['shiftId'];
		$section = trim($_POST['section']);
		$stsess = trim($_POST['stsess']);
	
	date_default_timezone_set('Asia/Dhaka');
	$smsdate=date('Y-m-d');
	$smstime=date('H:I:s');
	$month=substr($smsdate,5,2);
	$date=substr($smsdate,8,2);
		
	$branch="select * from `borno_student_info` where `borno_school_id`='$schId'  AND `borno_school_shift_id`='$shiftId' AND `borno_school_class_id`='$studClass' AND `borno_school_section_id`='$section' AND `borno_school_session`='$stsess' order by borno_school_roll asc";
	$rsQuery1 = $mysqli->query($branch);
	while($smsbranch=$rsQuery1->fetch_assoc()){;
	$studentid=$smsbranch['borno_student_info_id'];
	$studentroll=$smsbranch['borno_school_roll'];
	$studentname=$smsbranch['borno_school_student_name'];
	
	$gtstnamePhone="select * from borno_student_attandance where `borno_student_info_id`='$studentid' AND `borno_school_year`='$stsess' AND `borno_school_month`='$month' AND `borno_school_date`='$date'";
	$qgtstnamePhone=$mysqli->query($gtstnamePhone);
	$shgtstnamePhone=$qgtstnamePhone->fetch_assoc();
	
	if($shgtstnamePhone['borno_student_info_id']==""){	
	$bornoschBranch="INSERT INTO `borno_student_attandance` (`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`,`borno_school_shift_id`,`borno_school_section_id`,`borno_school_session`,`borno_student_info_id`,`borno_school_roll`,`borno_school_student_name`,`borno_school_year`, `borno_school_month`, `borno_school_date`, `borno_school_attandance`)
											
						VALUES ('$schId', '0', '$studClass', '$shiftId', '$section', '$stsess','$studentid','$studentroll','$studentname','$stsess','$month','$date','P')";
										
				$qbornoschBranch = $mysqli->prepare($bornoschBranch);
				$qbornoschBranch->execute();	
	}
	}
	

		for($i=0;$i<=count($studId);$i++){
			
		$sqlupdate="UPDATE `borno_student_attandance` SET `borno_school_attandance`='A' where `borno_student_info_id`='$studId[$i]' AND `borno_school_year`='$stsess' AND `borno_school_month`='$month' AND `borno_school_date`='$date'";
					
												
				$qbsqlupdate = $mysqli->query($sqlupdate);
				
		}
				
				if($qbornoschBranch) { header("location:absent.php?msg=1&studClass=$studClass&shiftId=$shiftId&section=$section&stsess=$stsess"); } else { header("location:absent.php?msg=2&studClass=$studClass&shiftId=$shiftId&section=$section&stsess=$stsess"); }				
				
		
 
 ?>

