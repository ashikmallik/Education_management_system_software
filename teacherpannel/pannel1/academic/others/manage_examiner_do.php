<?php
ob_start();
require_once('others_top.php');

extract($_POST);

	$gstclassshift11="select * from borno_set_class_teacher where borno_school_teacher_id='$stdid'";
	$qgstclassshift11=$mysqli->query($gstclassshift11);
	$shgstclassshift11=$qgstclassshift11->fetch_assoc();       
	$studClass=$shgstclassshift11['borno_school_class_id']; 
	$stsess=$shgstclassshift11['borno_school_session'];			
	$schId=$shgstclassshift11['borno_school_id'];
	$shiftId=$shgstclassshift11['borno_school_shift_id'];
	$branchId=$shgstclassshift11['borno_school_branch_id'];
	$section=$shgstclassshift11['borno_school_section_id'];	
	 


///==================================================== General Subject ============================////////////////////////////
//========================Nine Ten Start=============================
if($studClass==1 OR $studClass==2)
{

for($i=0; $i<count($stuName); $i++){
				
	if($teacherid[$i]!=""){


	
		
	
	  $insfmark1="UPDATE `borno_set_examiner` SET `borno_teacher_info_id`='$teacherid[$i]' where	borno_set_examiner_id=$stuName[$i]";
	

		$qinstm1=$mysqli->query($insfmark1);
		
	
}
	}
}

//========================Nine Ten End=============================
//========================Six to Eight Start==========================
elseif($studClass==3 OR $studClass==4 OR $studClass==5)
{

for($i=0; $i<count($stuName); $i++){
				
	if($teacherid[$i]!=""){

		
		
	
	  $insfmark1="UPDATE `borno_set_examiner` SET `borno_teacher_info_id`='$teacherid[$i]' where	borno_set_examiner_id=$stuName[$i]";
		$qinstm1=$mysqli->query($insfmark1);
	
	}
	
	
}
}
//========================Six to Eight End==========================
//========================Primary Start==========================
else
{
for($i=0; $i<count($stuName); $i++){
				
				if($teacherid[$i]!=""){

		
		
	
	  $insfmark1="UPDATE `borno_set_examiner` SET `borno_teacher_info_id`='$teacherid[$i]' where	borno_set_examiner_id=$stuName[$i]";
			  
			
		$qinstm1=$mysqli->query($insfmark1);
}
				}

}


if($qinstm1) { header("location:manage_examiner.php?msg=1&branchId=$branchId&studClass=$studClass&shiftId=$shiftId&section=$section&stsess=$stsess&selTerm=$selTerm");} else {  header('location:manage_examiner.php?msg=2'); }
	

?>