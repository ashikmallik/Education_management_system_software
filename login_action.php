<?php

ob_start();

include('connection.php');



session_start();

	$loginId=$_POST['loginId'];
	$pass1=$_POST['loginPass'];
	
	$pass=md5($pass1);

 $query="SELECT * FROM borno_school WHERE `borno_school_logid`='".trim($loginId)."' AND `borno_school_logpass`='".trim($pass)."' AND `borno_school_status`='1'";

								
									$rsquery =$mysqli->query($query);								

									$result=$rsquery->fetch_assoc();

									

									$userid=$result["borno_school_logid"];

									$password=$result["borno_school_logpass"];

								

									$schname=$result["borno_school_name"];

									$schId=$result["borno_school_id"]; //die();

									//$logo=$result["school_logo"];
									$schsId=$result["borno_user_id"];

									

									if($username=="" && $password=="")

										{	

											

											header("location:borno_login.php?msg=2");		

										}

										else 

										{																	

											$_SESSION['schname']=$schname;

											$_SESSION['schId']=$schId;
																				
											$_SESSION['schsId']=$schsId;

											header("Location:pannel/index.php");
										

										}



?>