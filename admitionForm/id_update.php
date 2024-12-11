<?php 

include('db_contection.php');
$getid = "SELECT * FROM `admition_form` WHERE `group` = 'Business Studies' ORDER BY `id` ASC";
		$sl=0;
		$qgetid=$mysqli->query($getid);
		while($shqgetid=$qgetid->fetch_assoc()){
		
		$sl++;
		
		 $id = $shqgetid['id'];
		if($sl == 1){
		 $sid =  230501 ;
		 $roll = 501;
		}
		else{
		  $sid = $sid+1;
		  $roll = $roll+1;
		}
		
		$update = "UPDATE `admition_form` SET `student_id` = '$sid',`roll` = '$roll' WHERE id = '$id'";
       $qinsert=$mysqli->query($update);
}
?>