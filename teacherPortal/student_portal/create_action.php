<?php

ob_start();

include('../connection.php');



session_start();

	$loginId=$_POST['loginId'];
	$conno=$_POST['conno'];
	$pass1=$_POST['loginPass'];
	
//	$pass=md5($pass1);

 $query="SELECT * FROM borno_student_info WHERE `borno_student_info_id`='".trim($loginId)."' AND `borno_school_phone`='88".trim($conno)."' ";


									$rsquery =$mysqli->query($query);		
									$result=$rsquery->fetch_assoc();

									

					$userid=$result['borno_student_info_id'];

							$contactno=$result['borno_school_phone'];
							
							$sclId=$result['borno_school_id'];




									if($userid=="" && $contactno=="" )

										{	

											

											header("location:create.php?msg=2");		

										}

										else 

										{
		date_default_timezone_set('Asia/Dhaka');	
		$date=date('Y-m-d');
								    
	  $query1="SELECT * FROM borno_student_login WHERE `borno_student_info_id`='".trim($userid)."'";

									$rsquery1 =$mysqli->query($query1);		
									$result1=$rsquery1->fetch_assoc();
									$stdid=$result1["borno_student_info_id"];
		if($stdid=="")
	{
	$insert2="INSERT INTO `borno_student_login` (`borno_school_id`,`borno_student_info_id`,`borno_student_password`,`borno_create_date`, `borno_modify_date`, `borno_student_status`)
											
															VALUES ('$sclId','$userid','$pass1','$date', '$date', '1')";
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