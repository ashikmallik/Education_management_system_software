<?php
 require_once('student_top.php');

	$calid = $_POST['calid'];
	$remarks = $_POST['remarks'];	
	$offDay=$_POST['offDay'];
	$dtcolor=$_POST['dtcolor'];
	
			
for($i=0;$i<count($remarks);$i++){
	
	if($offDay[$i]!="") { $offDay[$i]=$offDay[$i]; } else { $offDay[$i]=0; }
	
if($remarks[$i]!="" OR $offDay[$i]!="" OR $dtcolor[$i]!=""){		
 echo $bornoschBranch="UPDATE `borno_school_calender` SET `borno_remarks`='$remarks[$i]',`borno_day_status`='$offDay[$i]',`borno_color`='$dtcolor[$i]' where `borno_calender_id`='$calid[$i]'";
					
				$qbornoschBranch = $mysqli->prepare($bornoschBranch);
				$qbornoschBranch->execute();
}				
}	


			if($qbornoschBranch) { header('location:calender_remarks.php?msg=1'); } else { header('location:calender_remarks.php?msg=2'); }	
				
			
	
 ?>

