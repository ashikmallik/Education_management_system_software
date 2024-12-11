<?php
// $conn=mysqli_connect("localhost","root","");
// mysqli_select_db($conn,"apidb");

include('../connection.php');

//   $name=$_POST['name'];
//   $email=$_POST['email'];  
//$studentId='BBD2003153';
$studentId=trim($_POST['studentId']);  


$qry1="SELECT * FROM `borno_student_info` Where `borno_student_info_id` ='$studentId'";  
$raw1=$mysqli->query($qry1);
$res1=$raw1->fetch_assoc();
$classId = $res1['borno_school_class_id'];
$session = $res1['borno_school_session'];



$qry="SELECT * FROM `borno_sent_sms` Where `borno_student_info_id` ='$studentId' AND `borno_school_session` = '$session' ORDER BY `borno_sent_sms_id` DESC LIMIT 10 ";  
$raw=$mysqli->query($qry);
while($res=mysqli_fetch_array($raw))
{
	 $data[]=$res;
}
//echo $data;
printr(json_encode($data));

//print_r(json_encode($data))



  
?>