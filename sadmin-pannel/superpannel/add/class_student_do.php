<?php
ob_start();
include('../../../connection.php');
	
 
		
		
  echo  $schlid=$_POST['schlid'];	
	echo $classid=$_POST['classid'];	
	echo $stsess=$_POST['stsess'];	

die();
	
	for($i=0; $i<count($schlid); $i++){
		
	$gtschlid="select * from borno_school where borno_school_id='$schlid[$i]'";
	$qgtschlid=$mysqli->query($gtschlid);
	while($schoolid=$qgtschlid->fetch_assoc()){ 
	

			$roll=$shroll['borno_school_roll'];
			$name=$shroll['borno_school_student_name'];
			
			
		$data="select * from borno_school_set_class where borno_school_id='$gtschoolId' and borno_school_class_id ='$classid'";
		$qdata=$mysqli->query($data);
		$sl1=0;
		while($showdata=$qdata->fetch_assoc()){ $sl1++;
		$stclass=$showdata['borno_school_class_id'];
		
		
		  $gtclass="SELECT * FROM borno_school_class where borno_school_class_id=$stclass";
		$qgtclass=$mysqli->query($gtclass);
		$sqgtclass=$qgtclass->fetch_assoc();
		$fnsclass=$sqgtclass['borno_school_class_name'];
			
			
			
				
		

	
		
		
		
	
	
			
				

		
	}
	
	}
}
	 
?>