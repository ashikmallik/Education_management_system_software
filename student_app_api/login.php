<?php
// $conn=mysqli_connect("localhost","root","");
// mysqli_select_db($conn,"apidb");

include('../connection.php');

//   $name=$_POST['name'];
//   $email=$_POST['email'];  
$studentId=trim($_POST['studentId']);  
$pswd=trim($_POST['password']); 

//   $qry="SELECT * FROM `borno_student_info`"; 
		
//   $res=mysqli_query($conn,$qry);		 
  
//   if($res==true)
//   $response="inserted";
//   else
//   $response="failed";

//   echo $response;


$qry="SELECT * FROM `borno_student_info` Where `borno_student_info_id` ='$studentId' AND `password` = '$pswd'";
$raw=$mysqli->query($qry);
$res=$raw->fetch_assoc();
// while($res=mysqli_fetch_array($raw))
// {
// 	 $data[]=$res;
// }

	   if($res==true)
	   $response['message']="exist";
	   else
	   $response['message']="failed";
	   
	   echo json_encode($response);
 
//print(json_encode($data));
  
?>