<?php

ob_start();

include('connection.php');



session_start();

	$loginId=$_POST['loginId'];
	$pass1=$_POST['loginPass'];
	
//	$pass=md5($pass1);

 $query="SELECT * FROM borno_student_login WHERE `borno_student_info_id`='".trim($loginId)."' AND `borno_student_password`='".trim($pass1)."' AND `borno_student_status`='1'";

								
									$rsquery =$mysqli->query($query);								

									$result=$rsquery->fetch_assoc();

									

									$userid=$result["borno_student_info_id"];

									$password=$result["borno_student_password"];

								

									$stdid=$result["borno_student_info_id"];

	
									

									if($userid=="" && $password=="")

										{	

											

											header("location:borno_login.php?msg=2");		

										}

										else 

										{																	

									
											$_SESSION['stdid']=$stdid;
																				
					
											header("Location:pannel/index.php");
										

										}



?>