<?php 

require_once('fees_sett_top.php');

    $id = $_POST['id'];

    $query = "SELECT * FROM borno_student_info WHERE borno_student_info_id= '$id'";
   
   
    $result = $mysqli->query($query);
    
   $row = mysqli_fetch_assoc($result);
  // print_r($row);exit;
   echo $row['borno_school_student_name']."##".$id;
   
?>

