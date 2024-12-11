<?php

ob_start();

include('connection.php');



session_start();

	$loginId=$_POST['loginId'];
	$mno=$_POST['mno'];
	$pass1=$_POST['loginPass'];
	


  $query="SELECT * FROM borno_teacher_info WHERE `borno_teacher_info_id`='".trim($loginId)."' AND `borno_teacher_phone`='88".trim($mno)."'";

									$rsquery =$mysqli->query($query);		
									$result=$rsquery->fetch_assoc();

									

							    	$userid=$result["borno_teacher_info_id"];

									$fmobile=$result["borno_teacher_phone"];




									if($userid=="" && $fmobile=="")

										{	

											

											header("location:create.php?msg=2");		

										}

										else 

										{
		date_default_timezone_set('Asia/Dhaka');	
		$date=date('Y-m-d');
								    
	  $query1="SELECT * FROM borno_teacher_login WHERE `borno_teacher_info_id`='".trim($userid)."'";

									$rsquery1 =$mysqli->query($query1);		
									$result1=$rsquery1->fetch_assoc();
									$stdid=$result1["borno_teacher_info_id"];
	if($stdid=="")
	{
echo	$insert2="INSERT INTO `borno_teacher_login` (`borno_teacher_info_id`,`borno_teacher_password`,`borno_create_date`, `borno_modify_date`, `borno_teacher_status`)
											
															VALUES ('$userid','$pass1','$date', '$date', '1')";
	$insertstd2 = $mysqli->prepare($insert2);
	$insertstd2->execute();


											header("location:create.php?msg=1");
	}
	else
		{


											header("location:create.php?msg=3");
	}

										}



?>