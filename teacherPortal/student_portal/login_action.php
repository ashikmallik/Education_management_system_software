<?php

ob_start();

include('../../connection.php');



session_start();

	$loginId=$_POST['loginId'];
	$pass1=$_POST['loginPass'];
	
	$pass=md5($pass1);

 $query="SELECT * FROM borno_student_info WHERE `borno_student_info_id`='".trim($loginId)."'";

								
									$rsquery =$mysqli->query($query);								

									$result=$rsquery->fetch_assoc();

									

									$userid=$result['borno_student_info_id'];

									$password=$result['password'];

								

									$stdid=$result["borno_student_info_id"];

	
				//	echo $userid;				

									if($userid=="")

										{	

											

											header("location:index.php?msg=2");		

										}

										else 

										{																	

									
											$_SESSION['stdid']=$stdid;
																				
					
											header("Location:pannel/index.php");
										

										}



?>