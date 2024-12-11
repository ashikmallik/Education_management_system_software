<?php

ob_start();

include('../connection.php');



session_start();

	$sid=$_POST['sid'];
//	$branchid=$_POST['branchid'];
// 	$pass1=$_POST['loginPass'];
	
// 	$pass=md5($pass1);

 $query="SELECT * FROM `borno_student_info` WHERE `borno_student_info_id` ='$sid' AND `borno_student_status` = 1";

								
									$rsquery =$mysqli->query($query);								

									$result=$rsquery->fetch_assoc();

									

									$studentid=$result["borno_student_info_id"];
									$branchid = $result["borno_school_branch_id"];

								// 	$password=$result["borno_school_logpass"];

								

								// 	$schname=$result["borno_school_name"];

								// 	$schId=$result["borno_school_id"]; //die();

								// 	//$logo=$result["school_logo"];
								// 	$schsId=$result["borno_user_id"];

									

									if($studentid=="")

										{	

										$chk = substr($sid,0,2);
	
	if($chk == "NG"){
	    $newstudentid = $sid;
	}
	else{
	   $newstudentid = $sid; 
	}
	
	
	if(!empty($newstudentid)){
	   // window.location.replace('admissionPaymentWithdbbl.php?studentid=$newstudentid');
	   // $message = 'Admission will start from 18/12/22.';
	   //alert('$message')
        //       window.location.replace('index.php');
	        echo "<SCRIPT> 
	       window.location.replace('admissionPaymentWithdbbl.php?studentid=$newstudentid');
	         
        </SCRIPT>";
	}		
else{
                                $message = 'Student ID doesnot Exist.';
                                
                                echo "<SCRIPT> 
                                alert('$message')
                                window.location.replace('index.php');
                                </SCRIPT>";
	    
}
	    
			

										}

										else 

										{																	

											$_SESSION['studentid']=$studentid;
                                            $_SESSION['branchid']=$branchid;
								    // if($branchid==1){
								    //      header("Location:paymentmode.php");
								    //     //header("Location:index.php");
								    // }
								    // else{
								        header("Location:feesPaymentWithdbbl.php");
							//    }

											
										

										}



?>