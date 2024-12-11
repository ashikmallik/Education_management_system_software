<?php

ob_start();

include('../connection.php');



session_start();

	$loginId=$_POST['loginId'];
	$pass1=$_POST['loginPass'];
	
	$pass=md5($pass1);
	
	
	$userid = "Amir";
	$pw ='mmsc741159';
	$password = "d19741ac204f9c9b4691bb921900297e";
	
	$userid1 = "Fahad";
	$pw1 ='mmsc159987';
	
	$userid2 = "Mintu";
	$pw2 ='mmsc159951';

//  $query="SELECT * FROM borno_student_info WHERE `borno_student_info_id`='".trim($loginId)."' AND `password`='".trim($pass)."'";

								
// 									$rsquery =$mysqli->query($query);								

// 									$result=$rsquery->fetch_assoc();

									

// 									$userid=$result['borno_student_info_id'];

// 									$password=$result['password'];

								

// 									$stdid=$result["borno_student_info_id"];

	
				//	echo $userid;				

									if($userid==$loginId && $pw == $pass1)

										{	

											$_SESSION['schId']=1;
											$_SESSION['userid'] = $userid;									
					
											header("Location:pannel/index.php");

													

										}
									else if($userid1==$loginId && $pw1 == $pass1){
										    $_SESSION['schId']=1;
											$_SESSION['userid'] = $userid1;									
					
											header("Location:pannel/index.php");
										}
									else if($userid2==$loginId && $pw2 == $pass1){
										    $_SESSION['schId']=1;
											$_SESSION['userid'] = $userid2;									
					
											header("Location:pannel/index.php");
										}
										else 

										{	
										    
								$query="SELECT * FROM `borno_teacher_info` as ti INNER JOIN `borno_set_class_teacher` ct ON ct.`borno_school_teacher_id` = ti.`borno_teacher_info_id` WHERE `user_id` = '$loginId' AND `teacher_password` = '$pass'";

								
									$rsquery =$mysqli->query($query);								

									$result=$rsquery->fetch_assoc();
									$userid=$result['borno_teacher_name'];
									$teacherid=$result['borno_school_teacher_id']; 
									$barnchid=$result['borno_school_branch_id'];
									
									if($userid!=""){
									    
									    $_SESSION['schId']=1;
										$_SESSION['userid'] = $userid;
									    $_SESSION['teacherid'] = $teacherid;
									    $_SESSION['barnchid'] = $barnchid;
									    header("Location:pannel/index.php");
									}

                                        else{
									      header("location:index.php?msg=2");
                                        }
										

										}



?>