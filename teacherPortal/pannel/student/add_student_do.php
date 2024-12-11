<?php
 require_once('student_top.php');

/* require_once '../../../lib/htmlpurifier/library/HTMLPurifier.auto.php';
    
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
	*/
	   // $addBranch = clean_html($_POST['branchId']);
		  $addBranchf = strip_tags($_POST['branchId']);
				
	//	$studClass = clean_html($_POST['studClass']);
		 $studClass1 = strip_tags($_POST['studClass']);
				
	//	$shiftId = clean_html($_POST['shiftId']);
		 $shiftId1 = strip_tags($_POST['shiftId']);
		
	//	$stsess = clean_html($_POST['stsess']);
		 $stsess1 = strip_tags($_POST['stsess']);
		
	//	$status = clean_html($_POST['status']);
		$status1 = strip_tags($_POST['status']);
		
	//	$orgType = clean_html($_POST['orgType']);
		$orgType1 = strip_tags($_POST['orgType']);
		
	//	$section = clean_html($_POST['section']);
		$section1 = strip_tags($_POST['section']);
	

		
				
		//$stuaddress = clean_html($_POST['stuaddress']);
		//$stuaddress1 = strip_tags($_POST['stuaddress']);

		
		//$blgroup = clean_html($_POST['blgroup']);
		//$blgroup1 = strip_tags($_POST['blgroup']);
		
		//$datepicker = clean_html($_POST['datepicker']);
	//	$datepicker1 = strip_tags($_POST['datepicker']);

		

		
		//-------------------------------------------
		//$stuName = clean_html($_POST['stuName']);
		$stuName1 = $_POST['stuName'];
		
		//$stuFname = clean_html($_POST['stuFname']);
		$stuFname1 = $_POST['stuFname'];
		
		//$stuMname = clean_html($_POST['stuMname']);
		$stuMname1 = $_POST['stuMname'];
						
	//	$stuphone = clean_html($_POST['stuphone']);
		$stuphone1 = $_POST['stuphone'];
				
	//	$religion = clean_html($_POST['religion']);
		$religion1 = $_POST['religion'];
		
		//$group = clean_html($_POST['group']);
		$group1 = $_POST['group'];
		
	//	$sturoll = clean_html($_POST['sturoll']);
		$sturoll1 = $_POST['sturoll'];
		
		$stuid1 = $_POST['stuid'];		
	for($i=0; $i<count($sturoll1); $i++){	
		
		if($sturoll1[$i]!="" and $stuName1[$i] !=""){
		

			echo $schId." ";echo $addBranchf." ";echo $studClass1." ";echo $shiftId1." ";echo $section1." ";echo $stsess1." ";echo $stuName1[$i]." ";echo $stuphone1[$i]." ";echo $religion1[$i]." ";echo $status1." ";echo $orgType1." ";echo $group1[$i]." ";echo $sturoll1[$i]."<br> ";
		
			$branch="select * from `borno_student_info` where `borno_school_id`='$schId' AND `borno_school_branch_id`='$addBranchf' AND `borno_school_shift_id`='$shiftId1' AND `borno_school_class_id`='$studClass1' AND `borno_school_section_id`='$section1' AND `borno_school_session`='$stsess1' AND `borno_school_roll`='$sturoll1[$i]'";
			
		
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
		
		if($smsbranch['borno_school_roll']!=$sturoll1[$i]){
			//header("location:add_student.php?msg=3&branchId=$addBranchf&shiftId=$shiftId1&studClass=$studClass1&section=$section1");
			
			//}
		//	else
		//	{
		
		
		
	 $bornoschBranch="INSERT INTO `borno_student_info` (`borno_school_student_id`,`borno_school_id`, `borno_school_branch_id`, `borno_school_class_id`,`borno_school_shift_id`,`borno_school_section_id`,`borno_school_session`,`borno_school_student_name`,`borno_school_father_name`, `borno_school_mother_name`, `borno_school_address`, `borno_school_phone`, `borno_school_blood_group`, `borno_school_dob`, `borno_school_religion`, `borno_school_status`, `borno_school_org`, `borno_school_stud_group`, `borno_school_roll`, `borno_school_photo`)
											
															VALUES ('$stuid1[$i]','$schId', '$addBranchf', '$studClass1', '$shiftId1', '$section1', '$stsess1','$stuName1[$i]','$stuFname1[$i]','$stuMname1[$i]','','88$stuphone1[$i]','','','$religion1[$i]','$status1','$orgType1', '$group1[$i]','$sturoll1[$i]','')";
															
		
			
				$qbornoschBranch = $mysqli->prepare($bornoschBranch);
				$qbornoschBranch->execute();
				
				if($qbornoschBranch) { 
			header("location:add_student.php?msg=1&branchId=$addBranchf&shiftId=$shiftId1&studClass=$studClass1&section=$section1");

				} else { 
			header("location:add_student.php?msg=2&branchId=$addBranchf&shiftId=$shiftId1&studClass=$studClass1&section=$section1");
 }				
				
			}
			
		}
	}
 
 ?>

