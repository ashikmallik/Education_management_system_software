<?php

ob_start();

include('connection.php');



session_start();

	$loginId=$_POST['loginId'];
	$pass1=$_POST['loginPass'];
	
//	echo $loginId." "; echo $pass1." ";
	
//	$pass=md5($pass1);

 $query="SELECT * FROM borno_set_class_teacher WHERE `borno_teeacher_log_id`='".trim($loginId)."' AND `borno_teacher_login_pw`='".trim($pass1)."' AND `borno_teacher_status`='1'";

								
									$rsquery =$mysqli->query($query);								

									$result=$rsquery->fetch_assoc();

									

									$userid=$result["borno_school_teacher_id"];

									$password=$result["borno_teacher_login_pw"];

								

									$teacherid=$result["borno_school_teacher_id"];
									
									$schId=$result["borno_school_id"];

	
									

									if($userid=="" && $password=="")

										{	

											

											header("location:borno_login.php?msg=2");		

										}

										else 

										{																	

									
											$_SESSION['teacherid']=$teacherid;
											$_SESSION['schId']=$schId;
																				
					
											header("Location:pannel/dashBoard.php");
										

										}



?>