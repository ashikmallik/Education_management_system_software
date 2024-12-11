<?php
// $conn=mysqli_connect("localhost","root","");
// mysqli_select_db($conn,"apidb");

include('../connection.php');

//   $name=$_POST['name'];
//   $email=$_POST['email'];  
$studentId='BBD2003153';
//$studentId=trim($_POST['studentId']);  
//$pswd=trim($_POST['password']); 

//   $qry="SELECT * FROM `borno_student_info`"; 
		
//   $res=mysqli_query($conn,$qry);		 
  
//   if($res==true)
//   $response="inserted";
//   else
//   $response="failed";

//   echo $response;
$month = date("m");
$year =date("Y") ;

fristline:
    
    if($month > 12){
      goto lastline;  
    }


$check = "SELECT * FROM `student_fees` WHERE `student_id` = '$studentId' AND `due_amount` > 0 AND `month_id`='$month' AND `year`='$year'";
$rawcheck=$mysqli->query($check);
$rescheck=$rawcheck->fetch_assoc();


if(empty($rescheck['student_id']) AND $month == 12 ){
    
    $due = 0;
    goto lastline; 
}
else{
if(empty($rescheck['student_id'])){
    
    $month = $month+1;
    goto fristline;
}
}
lastline:



if($due != 0){
$qry="SELECT *,SUM(`due_amount`) AS totaldue FROM `borno_student_info` AS si INNER JOIN `student_fees` AS sf ON si.`borno_student_info_id` = sf.`student_id` Where  `borno_student_info_id` ='$studentId' AND `due_amount` > 0 AND `month_id` <='$month' AND `year` ='$year'";
}
else{
  $qry="SELECT * FROM `borno_student_info` Where `borno_student_info_id` ='$studentId'";  
}
$raw=$mysqli->query($qry);
$res=$raw->fetch_assoc();
// while($res=mysqli_fetch_array($raw))
// {
// 	 $data[]=$res;
// }

	   if($res==true){
	   $response['borno_school_student_name']=substr($res['borno_school_student_name'],0,15);
	   $response['borno_student_info_id']=$res['borno_student_info_id'];
	   if(empty($res['totaldue'])){
	      $res['totaldue'] = "0"; 
	   }
	   $response['totaldue']=$res['totaldue'];
	   }
	   else
	   $response['borno_school_student_name']=" ";
	   
	   echo json_encode($response);
 
//print(json_encode($data));
  
?>