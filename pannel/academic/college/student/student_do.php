<?php
 require_once('student_top.php');
 
 require_once '../../../../lib/htmlpurifier/library/HTMLPurifier.auto.php';
    
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
	
		$addBranch = clean_html($_POST['branchId']);
		$addBranchf = strip_tags($_POST['branchId']);
						
		$studClass = clean_html($_POST['studClass']);
		$studClass1 = strip_tags($_POST['studClass']);
		
		$shiftId = clean_html($_POST['shiftId']);
		$shiftId1 = strip_tags($_POST['shiftId']);
		
		$section = clean_html($_POST['section']);
		$section1 = strip_tags($_POST['section']);
		
		$stsess = clean_html($_POST['stsess']);
		$stsess1 = strip_tags($_POST['stsess']);
		
		$stuName = clean_html($_POST['stuName']);
		$stuName1 = strip_tags($_POST['stuName']);
		
		$stuFname = clean_html($_POST['stuFname']);
		$stuFname1 = strip_tags($_POST['stuFname']);
		
		$stuMname = clean_html($_POST['stuMname']);
		$stuMname1 = strip_tags($_POST['stuMname']);
		
		$stuaddress = clean_html($_POST['stuaddress']);
		$stuaddress1 = strip_tags($_POST['stuaddress']);
		
		$stuphone = clean_html($_POST['stuphone']);
		$stuphone1 = strip_tags($_POST['stuphone']);
		
		$blgroup = clean_html($_POST['blgroup']);
		$blgroup1 = strip_tags($_POST['blgroup']);
		
		$datepicker = clean_html($_POST['datepicker']);
		$datepicker1 = strip_tags($_POST['datepicker']);
		
		$religion = clean_html($_POST['religion']);
		$religion1 = strip_tags($_POST['religion']);
		
		$status = clean_html($_POST['status']);
		$status1 = strip_tags($_POST['status']);
		
		$orgType = clean_html($_POST['orgType']);
		$orgType1 = strip_tags($_POST['orgType']);
		
		$group = clean_html($_POST['group']);
		$group1 = strip_tags($_POST['group']);
		
		$sturoll = clean_html($_POST['sturoll']);
		$sturoll1 = strip_tags($_POST['sturoll']);
		
		$stuid = clean_html($_POST['stuid']);
		$stuid1 = strip_tags($_POST['stuid']);
				 $gender = clean_html($_POST['gender']);
		 $gender1 = strip_tags($_POST['gender']);
		
			$allowed =  array('gif','png' ,'jpg','JPG');
			$filename = $_FILES['timg']['name'];
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			if(!in_array($ext,$allowed) ) {
			$fnme="";
			} else {
			
			$rand = time();
			$uploaddir = 'studentphoto/';
			$fnme = $rand."_".basename($_FILES['timg']['name']);		
			$uploadfile = $uploaddir . $fnme;
			move_uploaded_file($_FILES['timg']['tmp_name'], $uploadfile);
			
			if($_FILES['timg']['name']!=""){ $fnme=$fnme; } else { $fnme=""; }
			}
			
		
			$branch="select * from `borno_student_info` where `borno_school_id`='$schId' AND `borno_school_branch_id`='$addBranchf' AND `borno_school_shift_id`='$shiftId1' AND `borno_school_class_id`='$studClass1' AND `borno_school_section_id`='$section1' AND `borno_school_session`='$stsess1' AND `borno_school_roll`='$sturoll1'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
		
		if($smsbranch['borno_school_roll']==$sturoll1){
			header("location:student_pannel.php?msg=3");
			
			}
			else
			{
		
		
		
		echo $bornoschBranch="INSERT INTO `borno_student_info` (`borno_student_info_id`,`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`,`borno_school_shift_id`,`borno_school_section_id`,`borno_school_session`,`borno_school_student_name`,`borno_school_father_name`,`borno_school_gender`, `borno_school_mother_name`, `borno_school_address`, `borno_school_phone`, `borno_school_blood_group`, `borno_school_dob`, `borno_school_religion`, `borno_school_status`, `borno_school_org`, `borno_school_stud_group`, `borno_school_roll`, `borno_school_photo`,`borno_student_status`)
											
															VALUES ('$stuid1','$schId', '$addBranchf', '$studClass1', '$shiftId1', '$section1', '$stsess1','$stuName1','$stuFname1','$stuMname1','$gender1','$stuaddress1','$stuphone1','$blgroup1','$datepicker1','$religion1','$status1','College', '$group1','$sturoll1','$fnme','1')";
															
			
				$qbornoschBranch = $mysqli->prepare($bornoschBranch);
				$qbornoschBranch->execute();
				
		if($qbornoschBranch) { 
			header("location:student_pannel.php?msg=1&branchId=$addBranchf&shiftId=$shiftId1&studClass=$studClass1&section=$section1");

				} else { 
			header("location:student_pannel.php?msg=2&branchId=$addBranchf&shiftId=$shiftId1&studClass=$studClass1&section=$section1");				
				
			}
			}
 ?>

