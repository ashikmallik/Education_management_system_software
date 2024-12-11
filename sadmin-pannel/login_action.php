<?php
ob_start();
include('../connection.php');


    session_start();

	$loginId=$_POST['loginId'];
	$pass1=$_POST['loginPass'];
	
	$pass=md5($pass1);
	
	

    $query="SELECT * FROM `borno_admin_log` WHERE `borno_log_id`='".trim($loginId)."' AND `borno_admin_pass`='".trim($pass)."'";

								
									$rsquery =$mysqli->query($query);								

									$result=$rsquery->fetch_assoc();

									

									$userid=$result["borno_log_id"];

									$password=$result["borno_admin_pass"];

								

									//$schname=$result["borno_school_name"];

									//$schId=$result["borno_school_id"]; //die();

									//$logo=$result["school_logo"];
									//$schsId=$result["borno_user_id"];

									

									if($userid=="" && $password=="")

										{	

											

											header("location:index.php?msg=2");		

										}

										else 

										{																	

											//$_SESSION['schname']=$schname;

											//$_SESSION['schId']=$schId;
																				
											$_SESSION['userid']=$userid;

											header("Location:superpannel/index.php");
										

										}



?>