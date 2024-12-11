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
		
		$stuid = clean_html($_POST['stuid']);
		$stuid1 = strip_tags($_POST['stuid']);
		
		$group = clean_html($_POST['group']);
		$group1 = strip_tags($_POST['group']);
		
		$student_id_office = clean_html($_POST['student_id_office']);
		$student_id_office1 = strip_tags($_POST['student_id_office']);
		
		$blood_group = clean_html($_POST['blood_group']);
		$blood_group1 = strip_tags($_POST['blood_group']);
		
		$birth_reg_no = clean_html($_POST['birth_reg_no']);
		$birth_reg_no1 = strip_tags($_POST['birth_reg_no']);
		
		$father_occupation = clean_html($_POST['father_occupation']);
		$father_occupation1 = strip_tags($_POST['father_occupation']);
		
		$mother_occupation = clean_html($_POST['mother_occupation']);
		$mother_occupation1 = strip_tags($_POST['mother_occupation']);
		
		$father_mobile_no = clean_html($_POST['father_mobile_no']);
		$father_mobile_no1 = strip_tags($_POST['father_mobile_no']);
		
		$mother_mobile_no = clean_html($_POST['mother_mobile_no']);
		$mother_mobile_no1 = strip_tags($_POST['mother_mobile_no']);
		
		$father_nid_no = clean_html($_POST['father_nid_no']);
		$father_nid_no1 = strip_tags($_POST['father_nid_no']);
		
		$mother_nid_no = clean_html($_POST['mother_nid_no']);
		$mother_nid_no1 = strip_tags($_POST['mother_nid_no']);
		
		$guardians_name = clean_html($_POST['guardians_name']);
		$guardians_name1 = strip_tags($_POST['guardians_name']);
		
		$guardians_relationship = clean_html($_POST['guardians_relationship']);
		$guardians_relationship1 = strip_tags($_POST['guardians_relationship']);
		
		$pre_village = clean_html($_POST['pre_village']);
		$pre_village1 = strip_tags($_POST['pre_village']);
		
		$pre_post = clean_html($_POST['pre_post']);
		$pre_post1 = strip_tags($_POST['pre_post']);
		
		$pre_upazilla = clean_html($_POST['pre_upazilla']);
		$pre_upazilla1 = strip_tags($_POST['pre_upazilla']);
		
		$pre_district = clean_html($_POST['pre_district']);
		$pre_district1 = strip_tags($_POST['pre_district']);
		
		$pre_division = clean_html($_POST['pre_division']);
		$pre_division1 = strip_tags($_POST['pre_division']);
		
		$par_village = clean_html($_POST['par_village']);
		$par_village1 = strip_tags($_POST['par_village']);
		
		$par_post = clean_html($_POST['par_post']);
		$par_post1 = strip_tags($_POST['par_post']);
		
		$par_upazilla = clean_html($_POST['par_upazilla']);
		$par_upazilla1 = strip_tags($_POST['par_upazilla']);
		
		$par_district = clean_html($_POST['par_district']);
		$par_district1 = strip_tags($_POST['par_district']);
		
		$par_division = clean_html($_POST['par_division']);
		$par_division1 = strip_tags($_POST['par_division']);
		
		$sturoll = clean_html($_POST['sturoll']);
		$sturoll1 = strip_tags($_POST['sturoll']);
		
			$allowed =  array('gif','png' ,'jpg','JPG');
			$filename = $_FILES['timg']['name'];
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			if(!in_array($ext,$allowed) ) {
			echo 'error';
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
			header("location:student_pannel.php?msg=3&branchId=$addBranchf&shiftId=$shiftId1&studClass=$studClass1&section=$section1");
			
			}
			else
			{
		
		
		
	 $bornoschBranch="INSERT INTO `borno_student_info` (`borno_school_student_id`,`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`,`borno_school_shift_id`,`borno_school_section_id`,`borno_school_session`,`borno_school_student_name`,`borno_school_father_name`, `borno_school_mother_name`, `borno_school_address`, `borno_school_phone`, `borno_school_blood_group`, `borno_school_dob`, `borno_school_religion`, `borno_school_status`, `borno_school_org`, `borno_school_stud_group`, `borno_school_roll`, `borno_school_photo`, `student_id_office`, `blood_group`, `birth_reg_no`, `father_occupation`, `mother_occupation`, `father_mobile_no`, `mother_mobile_no`, `father_nid_no`, `mother_nid_no`, `guardians_name`, `guardians_relationship`, `pre_village`, `pre_post`, `pre_upazilla`, `pre_district`, `pre_division`, `par_village`, `par_post`, `par_upazilla`, `par_district`, `par_division`, `guardians_mobile_no`)
											
															VALUES ('$stuid1','$schId', '$addBranchf', '$studClass1', '$shiftId1', '$section1', '$stsess1','$stuName1','$stuFname1','$stuMname1','$stuaddress1','88$stuphone1','$blgroup1','$datepicker1','$religion1','$status1','School', '$group1','$sturoll1','$fnme','$student_id_office1','$blood_group1','$birth_reg_no1','$father_occupation1','$mother_occupation1','$father_mobile_no1','$mother_mobile_no1','$father_nid_no1','$mother_nid_no1','$guardians_name1','$guardians_relationship1','$pre_village1','$pre_post1','$pre_upazilla1','$pre_district1','$pre_division1','$par_village1','$par_post1','$par_upazilla1','$par_district1','$par_division1','$guardians_mobile_no')";
															
		
			
				$qbornoschBranch = $mysqli->prepare($bornoschBranch);
				$qbornoschBranch->execute();
				
				if($qbornoschBranch) { 
			header("location:student_pannel.php?msg=1&branchId=$addBranchf&studClass=$shiftId1&studClass=$studClass1&section=$section1");

				} else { 
			header("location:student_pannel.php?msg=2&branchId=$addBranchf&shiftId=$shiftId1&studClass=$studClass1&section=$section1");
 }				
				
			}
			
			
 
 ?>

