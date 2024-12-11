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
	    
	    if(empty($_POST['branchId'])){
	       $_POST['branchId']=null; 
	    }
	    else{
	        $addBranchf = clean_html($_POST['branchId']);
	        $addBranchf1 = strip_tags($_POST['branchId']);
	    }
		

		 if(empty($_POST['shiftId'])){
	       $_POST['shiftId']=null; 
	    }
	    else{
	        $shiftId = clean_html($_POST['shiftId']);
	         $shiftId1 = strip_tags($_POST['shiftId']);
	    }
		

		
		 if(empty($_POST['designation'])){
	       $_POST['designation']=null; 
	    }
	    else{
	       $designation = clean_html($_POST['designation']);
	        $designation1 = strip_tags($_POST['designation']);
	    }

	    
		 if(empty($_POST['teacher'])){
	       $_POST['teacher']=null; 
	    }
	    else{
	       $teacher = clean_html($_POST['teacher']);
	       $teacher1 = strip_tags($_POST['teacher']);
	    }

	    
	     if(empty($_POST['father'])){
	       $_POST['father']=null; 
	    }
	    else{
	      $father = clean_html($_POST['father']);
	       $father1 = strip_tags($_POST['father']);
	    }

	    
	    if(empty($_POST['mother'])){
	       $_POST['mother']=null; 
	    }
	    else{
	     $mother = clean_html($_POST['mother']);
	     $mother1 = strip_tags($_POST['mother']);
	    }

	    
	    if(empty($_POST['spouse'])){
	       $_POST['spouse']=null; 
	    }
	    else{
	     $spouse = clean_html($_POST['spouse']);
	     $spouse1 = strip_tags($_POST['spouse']);
	    }

		if(empty($_POST['teacherid'])){
	       $_POST['teacherid']=null; 
	    }
	    else{
	     $teacherid = clean_html($_POST['teacherid']);
		$teacherid1 = strip_tags($_POST['teacherid']);
	    }
		
		
			if(empty($_POST['gadget'])){
	       $_POST['gadget']=null; 
	    }
	    else{
	     $gadget = clean_html($_POST['gadget']);
		$gadget1 = strip_tags($_POST['gadget']);
	    }	
		
		
		if(empty($_POST['dob'])){
	       $_POST['dob']=null; 
	    }
	    else{
		$dob = clean_html($_POST['dob']);
		$dob1 = strip_tags($_POST['dob']);
	    }
		
		
		if(empty($_POST['religion'])){
	     $_POST['religion']=null; 
	    }
	    else{
		$religion = clean_html($_POST['religion']);
		$religion1 = strip_tags($_POST['religion']);
	    }
		

		if(empty($_POST['gender'])){
	     $_POST['gender']=null; 
	    }
	    else{
		$gender = clean_html($_POST['gender']);
		$gender1 = strip_tags($_POST['gender']);
	    }

		
		if(empty($_POST['meritalStatus'])){
	     $_POST['meritalStatus']=null; 
	    }
	    else{
		$meritalStatus = clean_html($_POST['meritalStatus']);
		$meritalStatus1 = strip_tags($_POST['meritalStatus']);
	    }
		

		
		if(empty($_POST['blgroup'])){
	     $_POST['blgroup']=null; 
	    }
	    else{
		$blgroup = clean_html($_POST['blgroup']);
		$blgroup1 = strip_tags($_POST['blgroup']);
	    }
		

		if(empty($_POST['qualification'])){
	     $_POST['qualification']=null; 
	    }
	    else{
		$qualification = clean_html($_POST['qualification']);
		$qualification1 = strip_tags($_POST['qualification']);
	    }
	    
	    if(empty($_POST['subject'])){
	     $_POST['subject']=null; 
	    }
	    else{
		$subject = clean_html($_POST['subject']);
		$subject1 = strip_tags($_POST['subject']);
	    }

		if(empty($_POST['nationId'])){
	     $_POST['nationId']=null; 
	    }
	    else{
			$nationId = clean_html($_POST['nationId']);
		$nationId1 = strip_tags($_POST['nationId']);
		
	    }

		if(empty($_POST['passport'])){
	     $_POST['passport']=null; 
	    }
	    else{
		$passport = clean_html($_POST['passport']);
		$passport1 = strip_tags($_POST['passport']);
		
	    }

		if(empty($_POST['emailId'])){
	     $_POST['emailId']=null; 
	    }
	    else{
		$emailId = clean_html($_POST['emailId']);
		$emailId1 = strip_tags($_POST['emailId']);
		
	    }
		
		if(empty($_POST['tin'])){
	     $_POST['tin']=null; 
	    }
	    else{
		$tin = clean_html($_POST['tin']);
		$tin1 = strip_tags($_POST['tin']);
		
	    }
		
		if(empty($_POST['fjdate'])){
	     $_POST['fjdate']=null; 
	    }
	    else{
		$fjdate = clean_html($_POST['fjdate']);
		$fjdate1 = strip_tags($_POST['fjdate']);
		
	    }
		
		if(empty($_POST['jdits'])){
	     $_POST['jdits']=null; 
	    }
	    else{
		$jdits = clean_html($_POST['jdits']);
		$jdits1 = strip_tags($_POST['jdits']);
		
	    }
		
		if(empty($_POST['presAdd'])){
	     $_POST['presAdd']=null; 
	    }
	    else{
		$presAdd = clean_html($_POST['presAdd']);
		$presAdd1 = strip_tags($_POST['presAdd']);
		
	    }
		
		if(empty($_POST['perAdd'])){
	     $_POST['perAdd']=null; 
	    }
	    else{
		$perAdd = clean_html($_POST['perAdd']);
		$perAdd1 = strip_tags($_POST['perAdd']);
		
	    }

		if(empty($_POST['serial'])){
	     $_POST['serial']=null; 
	    }
	    else{
		$serial = clean_html($_POST['serial']);
		$serial1 = strip_tags($_POST['serial']);
		
	    }

		
		if(empty($_POST['orgType'])){
	     $_POST['orgType']=null; 
	    }
	    else{
		$orgType = clean_html($_POST['orgType']);
		$orgType1 = strip_tags($_POST['orgType']);
		
	    }
		
		if(empty($_POST['phone'])){
	     $_POST['phone']=null; 
	    }
	    else{
		$phone = clean_html($_POST['phone']);
		$phone1 = strip_tags($_POST['phone']);
		
	    }
		
		if(empty($_POST['attandance'])){
	     $_POST['attandance']=0; 
	    }
	    else{
		$attandance = clean_html($_POST['attandance']);
		$attandance1 = strip_tags($_POST['attandance']);
		
	    }

		if(empty($_POST['intime'])){
	     $_POST['intime']=null; 
	    }
	    else{
		$intime = clean_html($_POST['intime']);
		$intime1 = strip_tags($_POST['intime']);
		
	    }


		
		if($addBranchf1==1){
		    $user_id= 'mmscm';
		}
		elseif($addBranchf1==2){
		    $user_id= 'mmscb';
		}
				elseif($addBranchf1==3){
		    $user_id= 'mmscc';
		}
		
			$branch="select * from `borno_teacher_info` where `borno_school_id`='$schId' AND `borno_teacher_phone`='$phone1'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
		
		if($smsbranch['borno_teacher_phone']==$phone1){
			header("location:teacher_pannel.php?msg=3");
			
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
			$uploaddir = 'teacherphoto/';
			$fnme = $rand."_".basename($_FILES['timg']['name']);		
			$uploadfile = $uploaddir . $fnme;
			move_uploaded_file($_FILES['timg']['tmp_name'], $uploadfile);
			
			if($_FILES['timg']['name']!=""){ $fnme=$fnme; } else { $fnme=""; }
			}
		
   $bornoschBranch="INSERT INTO `borno_teacher_info` (`borno_teachers_serial_no`,`borno_school_id`, `borno_school_branch_id`, `borno_school_shift_id`, `borno_teachers_designation`,`borno_teacher_name`,`borno_teachers_father_name`,`borno_teachers_mother_name`, `borno_teachers_spouse_name`,`borno_teachers_id`,`borno_teachers_gadget_no`,`borno_teachers_dob`,`borno_teachers_religion`,`borno_teachers_gender`,`borno_teachers_marital_status`,`borno_teachers_blood_group`,`borno_teachers_qualification`,`borno_teachers_subject`,`borno_teachers_national_id`,`borno_teachers_passport_no`, `borno_teachers_email_id`,`borno_teachers_tin`,`borno_teachers_first_join`,`borno_teachers_join_in_school`,`borno_teachers_mailing_address`,`borno_teacher_permanent_address`,`borno_teacher_org_type`, `borno_teacher_phone`, `borno_teacher_photo`, `teacher_attandance_id`, `teacher_in_time`,`user_id`)
											
															VALUES ('$serial1', '$schId','$addBranchf1','$shiftId1','$designation1','$teacher1','$father1','$mother1','$spouse1','$teacherid1','$gadget1','$dob1','$religion1','$gender1','$meritalStatus1','$blgroup1','$qualification1','$subject1','$nationId1','$passport1','$emailId1','0','$fjdate1','$jdits1', '$presAdd1', '$perAdd1', '$orgType1', '88$phone1', '$fnme', '0', '$intime1','$user_id')";
							
						
			
				$qbornoschBranch = $mysqli->prepare($bornoschBranch);
				$qbornoschBranch->execute();
				
				if($qbornoschBranch) { header('location:teacher_pannel.php?msg=1'); } else { header('location:teacher_pannel.php?msg=2'); }				
				
			}
 
 ?>

