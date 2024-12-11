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
	
		$addBranch = clean_html($_POST['branchId']);
		$addBranchf = strip_tags($_POST['branchId']);
						
		$studClass = clean_html($_POST['studClass']);
		$studClass1 = strip_tags($_POST['studClass']);
		
		$shiftId = clean_html($_POST['shiftId']);
		$shiftId1 = strip_tags($_POST['shiftId']);
		
		$section = clean_html($_POST['section']);
		$section1 = strip_tags($_POST['section']);
		
		$stsess = clean_html($_POST['stsess']);
		$stsess1 = trim(strip_tags($_POST['stsess']));
		
		$stuName = clean_html($_POST['stuName']);
		$stuName1 = strip_tags($_POST['stuName']);
		
		$stuFname = clean_html($_POST['stuFname']);
		$stuFname1 = strip_tags($_POST['stuFname']);
		
		$stuMname = clean_html($_POST['stuMname']);
		$stuMname1 = strip_tags($_POST['stuMname']);
		
		$stuaddress = clean_html($_POST['stuaddress']);
		$stuaddress1 = strip_tags($_POST['stuaddress']);
		
		$gender = clean_html($_POST['gender']);
		$gender1 = strip_tags($_POST['gender']);
		
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
		
		$stuid = clean_html($_POST['stuid']);
		$stuid1 = strip_tags($_POST['stuid']);
		
		$group = clean_html($_POST['group']);
		$group1 = strip_tags($_POST['group']);
		
		$sturoll = clean_html($_POST['sturoll']);
		$sturoll1 = strip_tags($_POST['sturoll']);
		
		$studentId = strip_tags($_POST['studentId']);
		
		
			
			$branch="select * from `borno_student_info` where `borno_school_id`='$schId' AND `borno_school_branch_id`='$addBranchf' AND `borno_school_shift_id`='$shiftId1' AND `borno_school_class_id`='$studClass1' AND `borno_school_section_id`='$section1' AND `borno_school_session`='$stsess1' AND `borno_school_roll`='$sturoll1' AND `borno_student_info_id`!='$studentId'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
		
		if($smsbranch['borno_school_roll']==$sturoll1){
			header("location:edit_student.php?msg=3&studId=$studentId");
			
			}
			else
			{
		
			$allowed =  array('gif','png' ,'jpg','JPG');
			$filename = $_FILES['timg']['name'];
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			if(!in_array($ext,$allowed) ) {
			//echo 'error';
			
			$bornoschBranch="UPDATE `borno_student_info` SET `borno_school_id`='$schId', `borno_school_branch_id`='$addBranchf', `borno_school_class_id`='$studClass1',`borno_school_shift_id`='$shiftId1',`borno_school_section_id`='$section1',`borno_school_session`='$stsess1',`borno_school_student_name`='$stuName1',`borno_school_father_name`='$stuFname1', `borno_school_mother_name`='$stuMname1',`borno_school_gender`='$gender1', `borno_school_address`='$stuaddress1', `borno_school_phone`='88$stuphone1', `borno_school_blood_group`='$blgroup1', `borno_school_dob`='$datepicker1', `borno_school_religion`='$religion1', `borno_school_status`='$status1', `borno_student_info_id`='$stuid1', `borno_school_stud_group`='$group1', `borno_school_roll`='$sturoll1' where `borno_student_info_id`='$studentId'";
			
			} else {
			
			$rand = time();
			$uploaddir = 'studentphoto/';
			$fnme = $rand."_".basename($_FILES['timg']['name']);		
			$uploadfile = $uploaddir . $fnme;
			move_uploaded_file($_FILES['timg']['tmp_name'], $uploadfile);
			
			if($_FILES['timg']['name']!=""){ $fnme=$fnme; } else { $fnme=""; }
			}
			
		if($fnme!="")
		{
		$bornoschBranch="UPDATE `borno_student_info` SET `borno_school_id`='$schId', `borno_school_branch_id`='$addBranchf', `borno_school_class_id`='$studClass1',`borno_school_shift_id`='$shiftId1',`borno_school_section_id`='$section1',`borno_school_session`='$stsess1',`borno_school_student_name`='$stuName1',`borno_school_father_name`='$stuFname1', `borno_school_mother_name`='$stuMname1',`borno_school_gender`='$gender1', `borno_school_address`='$stuaddress1', `borno_school_phone`='88$stuphone1', `borno_school_blood_group`='$blgroup1', `borno_school_dob`='$datepicker1', `borno_school_religion`='$religion1', `borno_school_status`='$status1', `borno_student_info_id`='$stuid1', `borno_school_stud_group`='$group1', `borno_school_roll`='$sturoll1', `borno_school_photo`='$fnme' where `borno_student_info_id`='$studentId'";
					
		}
		else
		{
		$bornoschBranch="UPDATE `borno_student_info` SET `borno_school_id`='$schId', `borno_school_branch_id`='$addBranchf', `borno_school_class_id`='$studClass1',`borno_school_shift_id`='$shiftId1',`borno_school_section_id`='$section1',`borno_school_session`='$stsess1',`borno_school_student_name`='$stuName1',`borno_school_father_name`='$stuFname1', `borno_school_mother_name`='$stuMname1',`borno_school_gender`='$gender1', `borno_school_address`='$stuaddress1', `borno_school_phone`='88$stuphone1', `borno_school_blood_group`='$blgroup1', `borno_school_dob`='$datepicker1', `borno_school_religion`='$religion1', `borno_school_status`='$status1', `borno_student_info_id`='$stuid1', `borno_school_stud_group`='$group1', `borno_school_roll`='$sturoll1' where `borno_student_info_id`='$studentId'";
					
		}
													
				$qbornoschBranch = $mysqli->prepare($bornoschBranch);
				$qbornoschBranch->execute();
				
				if($qbornoschBranch) { header("location:edit_student.php?msg=1&studId=$studentId"); } else { header("location:edit_student.php.php?msg=2&studId=$studentId"); }				
				
			}
 
 ?>

