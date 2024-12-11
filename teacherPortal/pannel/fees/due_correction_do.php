<?php 

require_once('report_sett_top.php');

extract($_POST);

for($i=0; $i<count($studId); $i++){
				
				if($studId[$i]!=""){
					

	
 $insfmark1="UPDATE `student_fees` SET `due_amount` ='$prevDue[$i]',`update_by` = 'Amir' 
WHERE `student_id` ='$studId[$i]'  AND `fees_head_id` = 4 AND `due_amount` !=0";
			  

// echo $studId[$i]." ";
// echo $prevDue[$i]."<br> ";
		$qinstm1=$mysqli->query($insfmark1);
		

	
	}
}
if($qinstm1) { header("location:due_correction.php?msg=1");} else {  header('locationdue_correction.php?msg=2'); }
 	

?>