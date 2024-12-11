<?php
require_once('student_top.php');
	
		$studId = $_POST['studId'];
		$group = $_POST['group'];
		
		for($i=0;$i<=count($studId);$i++){
			
		echo $bornoschBranch="UPDATE `borno_student_info` SET `borno_school_stud_group`='$group[$i]' where `borno_student_info_id`='$studId[$i]'";
					
													
				$qbornoschBranch = $mysqli->query($bornoschBranch);
				
		}
				
				if($qbornoschBranch) { header('location:manage_group_indv.php?msg=1'); } else { header('location:manage_group_indv.php?msg=2'); }				
				
		
 
 ?>

