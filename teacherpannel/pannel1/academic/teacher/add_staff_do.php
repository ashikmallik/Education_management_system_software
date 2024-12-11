<?php
 require_once('teacher_top.php');
 
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
	
		$designation = clean_html($_POST['designation']);
		$designation1 = strip_tags($_POST['designation']);
		
		$addBranch = clean_html($_POST['branchId']);
		$addBranchf = strip_tags($_POST['branchId']);
						
		$shiftId = clean_html($_POST['shiftId']);
		$shiftId1 = strip_tags($_POST['shiftId']);
		
		$teacher = clean_html($_POST['teacher']);
		$teacher1 = strip_tags($_POST['teacher']);
		
		$father = clean_html($_POST['father']);
		$father1 = strip_tags($_POST['father']);
		
		$mother = clean_html($_POST['mother']);
		$mother1 = strip_tags($_POST['mother']);
		
		$spouse = clean_html($_POST['spouse']);
		$spouse1 = strip_tags($_POST['spouse']);
		
		$teacherid = clean_html($_POST['teacherid']);
		$teacherid1 = strip_tags($_POST['teacherid']);
		
		$gadget = clean_html($_POST['gadget']);
		$gadget1 = strip_tags($_POST['gadget']);
		
		$dob = clean_html($_POST['dob']);
		$dob1 = strip_tags($_POST['dob']);
		
		$religion = clean_html($_POST['religion']);
		$religion1 = strip_tags($_POST['religion']);
		
		$gender = clean_html($_POST['gender']);
		$gender1 = strip_tags($_POST['gender']);
		
		$meritalStatus = clean_html($_POST['meritalStatus']);
		$meritalStatus1 = strip_tags($_POST['meritalStatus']);
		
		$blgroup = clean_html($_POST['blgroup']);
		$blgroup1 = strip_tags($_POST['blgroup']);
		
		$qualification = clean_html($_POST['qualification']);
		$qualification1 = strip_tags($_POST['qualification']);
		
		$subject = clean_html($_POST['subject']);
		$subject1 = strip_tags($_POST['subject']);
		
		$nationId = clean_html($_POST['nationId']);
		$nationId1 = strip_tags($_POST['nationId']);
		
		$passport = clean_html($_POST['passport']);
		$passport1 = strip_tags($_POST['passport']);
		
		$emailId = clean_html($_POST['emailId']);
		$emailId1 = strip_tags($_POST['emailId']);
		
		$tin = clean_html($_POST['tin']);
		$tin1 = strip_tags($_POST['tin']);
		
		$fjdate = clean_html($_POST['fjdate']);
		$fjdate1 = strip_tags($_POST['fjdate']);
		
		$jdits = clean_html($_POST['jdits']);
		$jdits1 = strip_tags($_POST['jdits']);
		
		$presAdd = clean_html($_POST['presAdd']);
		$presAdd1 = strip_tags($_POST['presAdd']);
		
		$perAdd = clean_html($_POST['perAdd']);
		$perAdd1 = strip_tags($_POST['perAdd']);
		
		$serial = clean_html($_POST['serial']);
		$serial1 = strip_tags($_POST['serial']);
		
		$orgType = clean_html($_POST['orgType']);
		$orgType1 = strip_tags($_POST['orgType']);
		
		$phone = clean_html($_POST['phone']);
		$phone1 = strip_tags($_POST['phone']);
		
			$branch="select * from `borno_mgt_staff_info` where `borno_school_id`='$schId' AND `borno_staff_phone`='$phone1'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
		
		if($smsbranch['borno_staff_phone']==$phone1){
			header("location:add_staff.php?msg=3");
			
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
			$uploaddir = 'staffphoto/';
			$fnme = $rand."_".basename($_FILES['timg']['name']);		
			$uploadfile = $uploaddir . $fnme;
			move_uploaded_file($_FILES['timg']['tmp_name'], $uploadfile);
			
			if($_FILES['timg']['name']!=""){ $fnme=$fnme; } else { $fnme=""; }
			}
		
	echo	$bornoschBranch="INSERT INTO `borno_mgt_staff_info` (`borno_staff_serial_no`,`borno_school_id`, `borno_school_branch_id`, `borno_school_shift_id`, `borno_mgt_staf_desig`,`borno_mgt_staff_name`,`borno_staff_father_name`,`borno_staff_mother_name`, `borno_staff_spouse_name`,`borno_staff_id`,`borno_staff_gadget_no`,`borno_staff_dob`,`borno_staff_religion`,`borno_staff_gender`,`borno_staff_marital_status`,`borno_staff_blood_group`,`borno_staff_qualification`,`borno_staff_subject`,`borno_staff_national_id`,`borno_staff_passport_no`, `borno_staff_email_id`,`borno_staff_tin`,`borno_staff_first_join`,`borno_staff_join_in_school`,`borno_staff_mailing_address`,`borno_staff_permanent_address`,`borno_staff_org_type`, `borno_staff_phone`, `borno_staff_photo`)
											
															VALUES ('$serial1', '$schId','$addBranchf','$shiftId1','$designation1','$teacher1','$father1','$mother1','$spouse1','$teacherid1','$gadget1','$dob1','$religion1','$gender1','$meritalStatus1','$blgroup1','$qualification1','$subject1','$nationId1','$passport1','$emailId1','$tin1','$fjdate1','$jdits1', '$presAdd1', '$perAdd1', '$orgType1', '88$phone1', '$fnme')";
											
				$qbornoschBranch = $mysqli->prepare($bornoschBranch);
				$qbornoschBranch->execute();
				
				if($qbornoschBranch) { header('location:add_staff.php?msg=1'); } else { header('location:add_staff.php?msg=2'); }				
				
			}
 
 ?>

