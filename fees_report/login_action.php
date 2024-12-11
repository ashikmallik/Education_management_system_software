<?php

ob_start();

include('../connection.php');



session_start();

	$loginId=$_POST['loginId'];
	$pass1=$_POST['loginPass'];
	
	$pass=md5($pass1);
	
	
	$userid = "Amir";
	$pw ='mmsc147741';
	$password = "d19741ac204f9c9b4691bb921900297e";

//  $query="SELECT * FROM borno_student_info WHERE `borno_student_info_id`='".trim($loginId)."' AND `password`='".trim($pass)."'";

								
// 									$rsquery =$mysqli->query($query);								

// 									$result=$rsquery->fetch_assoc();

									

// 									$userid=$result['borno_student_info_id'];

// 									$password=$result['password'];

								

// 									$stdid=$result["borno_student_info_id"];

	
				//	echo $userid;				

									if($userid==$loginId && $pw== $pass1)

										{	

											$_SESSION['schId']=1;
																				
					
											header("Location:pannel/report_pannel.php");

													

										}

										else 

										{																	

									      header("location:index.php?msg=2");

										

										}



?>