<?php

ob_start();

include('../connection.php');



session_start();

	$sid=$_POST['sid'];
	$term=$_POST['term'];
	
	echo $term ; 
// 	$pass1=$_POST['loginPass'];
	
// 	$pass=md5($pass1);

 $query="SELECT `due_amount` FROM `student_fees` WHERE `student_id` ='$sid' AND `month_id` = '5'";

								
									$rsquery =$mysqli->query($query);								

									$result=$rsquery->fetch_assoc();

									

									$due=$result["due_amount"];
									
 $query1="SELECT `due_amount` FROM `student_fees` WHERE `student_id` ='$sid' AND `fees_head_id` = '4'";

								
									$rsquery1 =$mysqli->query($query1);								

									$result1=$rsquery1->fetch_assoc();

									

									$due1=$result1["due_amount"];									

		

									

									if($due==0 AND $due1 == 0 )

										{	

                                    $data="select * from borno_student_info where borno_student_info_id = '$sid'";
					                $qdata=$mysqli->query($data);
				                    $showdata=$qdata->fetch_assoc();
				                    $schId = $showdata['borno_school_id'];
				                    $gtfbranchId = $showdata['borno_school_branch_id'];
				                    $studClass = $showdata['borno_school_class_id'];
				                    $shiftId = $showdata['borno_school_shift_id'];
				                    $section = $showdata['borno_school_section_id'];
                                    $stsess = $showdata['borno_school_session'];
                                    
                                    
								        header("Location:download_admit_card4.php?schoolId= $schId&stbranch=$gtfbranchId&classId=$studClass&shiftId=$shiftId&sectionId=$section&scsess=$stsess&sctermId=$term&studid=$sid");

    
	    
			

										}

										else 

										{																	


							//	    }

								$message = 'প্রবেশপত্র পেতে আপনাকে পরীক্ষার ফি সহ মে মাস পর্যন্ত টিউশন ফি দিতে হবে';
                                
                                echo "<SCRIPT> 
                                alert('$message')
                                window.location.replace('index.php');
                                </SCRIPT>";
										

										}



?>