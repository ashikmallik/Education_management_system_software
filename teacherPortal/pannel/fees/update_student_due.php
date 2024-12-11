<?php 

require_once('report_sett_top.php');

extract($_POST);

for($i=0; $i<count($feesmasterid); $i++){
				
				if($feesmasterid[$i]!=""){
					

	
 $insfmark1="UPDATE `student_fees` SET `due_amount` ='$due[$i]',`update_by` = 'Amir' 
WHERE `student_fees_id` = '$feesmasterid[$i]' ";
			  

// echo $studId[$i]." ";
// echo $prevDue[$i]."<br> ";
		$qinstm1=$mysqli->query($insfmark1);
		

	
	}
}
if($qinstm1) { header("location:due_student_wise.php?msg=1");} else {  header('location:due_student_wise.php?msg=2'); }