<?php 
include('config.php');

//echo $year;

// $day =$_GET['day'];
// $month =$_GET['month'];
// $year =$_GET['year'];

    $gtfeeshead1="SELECT * FROM `academic_calender_details` WHERE `cetagory` = 'Student'";
    $qgtfeeshead1=$mysqli->query($gtfeeshead1);
  while($shgtfeeshead1=$qgtfeeshead1->fetch_assoc()){
    
     $json[] = $shgtfeeshead1;
  }   
   
    //     $gtfeeshead1="SELECT * FROM `academic_calender_details` WHERE `day`='$day' AND month_id = '$month' AND `year` = '$year' AND `cetagory` = 'Student'";
    //   $qgtfeeshead1=$mysqli->query($gtfeeshead1);
    //   $shgtfeeshead1=$qgtfeeshead1->fetch_assoc();
    //   $json[] = $shgtfeeshead1;
 echo json_encode($json);
    
?>