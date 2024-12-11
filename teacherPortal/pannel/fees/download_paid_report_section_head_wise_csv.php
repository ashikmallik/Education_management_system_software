<?php

// $fdate=$_POST['datepicker'];
// $tdate=$_POST['datepicker1'];
$schId=1;
$session=trim($_GET['session']);
$section=$_GET['section'];
$classid=$_GET['classid'];
$branchid=$_GET['branchid'];
$fiscalid=$_GET['fiscalid'];
$fundId=$_GET['fundId'];
$monthid=$_GET['monthid'];
$type=trim($_GET['type']);
// $fdate=date("d/m/Y",strtotime($fdate));
// $tdate=date("d/m/Y",strtotime($tdate));

// echo $fdate;
// echo $tdate;

include('report_sett_top.php');


$gtschoolName ="select * from borno_school where borno_school_id=$schId";
					$qgstschoolName=$mysqli->query($gtschoolName);
					$shschname=$qgstschoolName->fetch_assoc();
                    $fnschname=$shschname['borno_school_name'];
                    
                    
                    
 					$gstsess="SELECT * FROM `fees_head_name` WHERE `head_id` = '$fundId'";
                    $qgstsess=$mysqli->query($gstsess);
                    $shgstsess=$qgstsess->fetch_assoc(); 
                    $head_name=$shgstsess['head_name'];

// echo $head_name;

  $data = "";


if($classid == 0){
$data.=" Fund And Section Wise Paid Report"."\n";
}
else{
$data.=" Fund And Class Wise Paid Report"."\n";   
}
$data.=" Fund Name : ".$head_name."\n\n";

$data.="Branch".","."Class".","."Shift".","."Section".","."Session".","."Student ID".","."Roll".","."Student Name".","."Amount"."\n";

     

    

   
    if($type == "School"){
       // $session = $shqstuinfo['session'];
       if($classid == 0){
      if(empty($monthid)){ 
         $result ="SELECT `borno_school_branch_name`,`borno_school_class_name`,`borno_school_shift_name`,`borno_school_section_name`,`session`,`student_id`,`roll`,`student_name`,`receive_amount` FROM `collection_details` AS sf 
         INNER JOIN `borno_school_class` as sc ON sc.`borno_school_class_id` = sf.`class_id` 
         INNER JOIN `borno_school_shift` as ss ON ss.`borno_school_shift_id` = sf.`shift_id` 
         INNER JOIN `borno_school_branch` as sb ON sb.`borno_school_branch_id` = sf.`branch_id` 
         INNER JOIN `borno_school_section` as sse ON sse.`borno_school_section_id` = sf.`section_id` AND sse.`year` = '$session' 
         WHERE sf.`section_id` = '$section' AND sf.`branch_id`='$branchid' AND `session` = '$session' AND `fees_head_id` = '$fundId'  ORDER BY `roll`";
      }
      else{
         $result ="SELECT `borno_school_branch_name`,`borno_school_class_name`,`borno_school_shift_name`,`borno_school_section_name`,`session`,`student_id`,`borno_school_roll`,`borno_school_student_name`,SUM(`paid_amount`) AS paid_amount  FROM `student_fees` AS sf 
         INNER JOIN `borno_student_info` AS si ON si.`borno_student_info_id` = sf.`student_id` 
         INNER JOIN `borno_school_class` as sc ON sc.`borno_school_class_id` = si.`borno_school_class_id` 
         INNER JOIN `borno_school_shift` as ss ON ss.`borno_school_shift_id` = si.`borno_school_shift_id` 
         INNER JOIN `borno_school_branch` as sb ON sb.`borno_school_branch_id` = si.`borno_school_branch_id` 
         INNER JOIN `borno_school_section` as sse ON sse.`borno_school_section_id` = si.`borno_school_section_id` AND sse.`year` = '$session' 
         WHERE si.`borno_school_section_id` = '$section' AND si.`borno_school_branch_id`='$branchid' AND `borno_school_session` = '$session' AND `fees_head_id` = '$fundId' AND `month_id` <= '$monthid' AND `paid_amount` > 0 AND `fiscal_year_id` = '$fiscalid' GROUP BY sf.`student_id` ORDER BY `borno_school_roll`"; 
      }
       }
       else{
                if(empty($monthid)){ 
         $result ="SELECT `borno_school_branch_name`,`borno_school_class_name`,`borno_school_shift_name`,`borno_school_section_name`,`session`,`student_id`,`roll`,`student_name`,`receive_amount` FROM `collection_details` AS sf 
          
         INNER JOIN `borno_school_class` as sc ON sc.`borno_school_class_id` = sf.`class_id` 
         INNER JOIN `borno_school_shift` as ss ON ss.`borno_school_shift_id` = sf.`shift_id` 
         INNER JOIN `borno_school_branch` as sb ON sb.`borno_school_branch_id` = sf.`branch_id` 
         INNER JOIN `borno_school_section` as sse ON sse.`borno_school_section_id` = sf.`section_id` AND sse.`year` = '$session' 
         WHERE sf.`class_id` = '$classid'  AND `session` = '$session' AND `fees_head_id` = '$fundId'  ORDER BY `roll`";
      }
      else{
         $result ="SELECT `borno_school_branch_name`,`borno_school_class_name`,`borno_school_shift_name`,`borno_school_section_name`,`session`,`student_id`,`borno_school_roll`,`borno_school_student_name`,SUM(`paid_amount`) AS paid_amount FROM `student_fees` AS sf 
         INNER JOIN `borno_student_info` AS si ON si.`borno_student_info_id` = sf.`student_id` 
         INNER JOIN `borno_school_class` as sc ON sc.`borno_school_class_id` = si.`borno_school_class_id` 
         INNER JOIN `borno_school_shift` as ss ON ss.`borno_school_shift_id` = si.`borno_school_shift_id` 
         INNER JOIN `borno_school_branch` as sb ON sb.`borno_school_branch_id` = si.`borno_school_branch_id` 
         INNER JOIN `borno_school_section` as sse ON sse.`borno_school_section_id` = si.`borno_school_section_id` AND sse.`year` = '$session' 
         WHERE si.`borno_school_class_id` = '$classid'  AND `borno_school_session` = '$session' AND `fees_head_id` = '$fundId' AND `month_id` <= '$monthid' AND `paid_amount` > 0 AND `fiscal_year_id` = '$fiscalid' GROUP BY sf.`student_id` ORDER BY `borno_school_roll`"; 
      } 
       }
    }
    else{
        //$session = 0;
        if($classid == 0){
      if(empty($monthid)){ 
         $result ="SELECT `borno_school_branch_name`,`borno_school_class_name`,`borno_school_shift_name`,`borno_school_section_name`,`session`,`student_id`,`roll`,`student_name`,`receive_amount` FROM `collection_details` AS sf 
         
         INNER JOIN `borno_school_class` as sc ON sc.`borno_school_class_id` = sf.`class_id` 
         INNER JOIN `borno_school_shift` as ss ON ss.`borno_school_shift_id` = sf.`shift_id` 
         INNER JOIN `borno_school_branch` as sb ON sb.`borno_school_branch_id` = sf.`branch_id` 
         INNER JOIN `borno_school_section` as sse ON sse.`borno_school_section_id` = sf.`section_id` 
         WHERE sf.`section_id` = '$section' AND sf.`branch_id`='$branchid' AND `session` = '$session' AND `fees_head_id` = '$fundId'  ORDER BY `roll`";
      }
      else{
         $result ="SELECT `borno_school_branch_name`,`borno_school_class_name`,`borno_school_shift_name`,`borno_school_section_name`,`session`,`student_id`,`borno_school_roll`,`borno_school_student_name`,SUM(`paid_amount`) AS paid_amount FROM `student_fees` AS sf 
         INNER JOIN `borno_student_info` AS si ON si.`borno_student_info_id` = sf.`student_id` 
         INNER JOIN `borno_school_class` as sc ON sc.`borno_school_class_id` = si.`borno_school_class_id` 
         INNER JOIN `borno_school_shift` as ss ON ss.`borno_school_shift_id` = si.`borno_school_shift_id` 
         INNER JOIN `borno_school_branch` as sb ON sb.`borno_school_branch_id` = si.`borno_school_branch_id` 
         INNER JOIN `borno_school_section` as sse ON sse.`borno_school_section_id` = si.`borno_school_section_id` 
         WHERE si.`borno_school_section_id` = '$section' AND si.`borno_school_branch_id`='$branchid' AND `borno_school_session` = '$session' AND `fees_head_id` = '$fundId' AND `month_id` <= '$monthid' AND `paid_amount` > 0 AND `fiscal_year_id` = '$fiscalid' GROUP BY sf.`student_id` ORDER BY `borno_school_roll`"; 
      }
        }
        else{
                 if(empty($monthid)){ 
         $result ="SELECT `borno_school_branch_name`,`borno_school_class_name`,`borno_school_shift_name`,`borno_school_section_name`,`session`,`student_id`,`roll`,`student_name`,`receive_amount` FROM `collection_details` AS sf 
          
         INNER JOIN `borno_school_class` as sc ON sc.`borno_school_class_id` = sf.`class_id`
         INNER JOIN `borno_school_shift` as ss ON ss.`borno_school_shift_id` = sf.`shift_id` 
         INNER JOIN `borno_school_branch` as sb ON sb.`borno_school_branch_id` = sf.`branch_id` 
         INNER JOIN `borno_school_section` as sse ON sse.`borno_school_section_id` = sf.`section_id` 
         WHERE sf.`class_id` = '$classid'  AND `session` = '$session' AND `fees_head_id` = '$fundId'  ORDER BY `roll`";
      }
      else{
         $result ="SELECT `borno_school_branch_name`,`borno_school_class_name`,`borno_school_shift_name`,`borno_school_section_name`,`session`,`student_id`,`borno_school_roll`,`borno_school_student_name`,SUM(`paid_amount`) AS paid_amount FROM `student_fees` AS sf 
         INNER JOIN `borno_student_info` AS si ON si.`borno_student_info_id` = sf.`student_id` 
         INNER JOIN `borno_school_class` as sc ON sc.`borno_school_class_id` = si.`borno_school_class_id` 
         INNER JOIN `borno_school_shift` as ss ON ss.`borno_school_shift_id` = si.`borno_school_shift_id` 
         INNER JOIN `borno_school_branch` as sb ON sb.`borno_school_branch_id` = si.`borno_school_branch_id` 
         INNER JOIN `borno_school_section` as sse ON sse.`borno_school_section_id` = si.`borno_school_section_id` 
         WHERE si.`borno_school_class_id` = '$classid'  AND `borno_school_session` = '$session' AND `fees_head_id` = '$fundId' AND `month_id` <= '$monthid' AND `paid_amount` > 0 AND `fiscal_year_id` = '$fiscalid' GROUP BY sf.`student_id` ORDER BY `borno_school_roll`"; 
      } 
        }
    }
    
    
    



  $qresult=$mysqli->query($result);

		
		while($shgresult=$qresult->fetch_assoc()){

		
		$student_id=$shgresult['student_id'];
		if(empty($shgresult['paid_amount'])){
		    $totalamount=$shgresult['receive_amount'];
		}
		 else{
		     $totalamount=$shgresult['paid_amount'];
		     
		 }
		 $fstClassName=$shgresult['borno_school_class_name'];
		 $fstshift=$shgresult['borno_school_shift_name'];
		 $fstsection=$shgresult['borno_school_section_name'];
		 $fstbranch=$shgresult['borno_school_branch_name'];
		 if(empty($shgresult['borno_school_roll'])){
		     $stroll=$shgresult['roll'];
		 }
		 else{
		  $stroll=$shgresult['borno_school_roll'];   
		 }
		 
		 if(empty($shgresult['borno_school_student_name'])){
		     $stdname=$shgresult['student_name'];
		 }
		 else{
		     $stdname=$shgresult['borno_school_student_name'];
		 }
	     
	     $session=$shgresult['session'];

		

$data .= $fstbranch.",".$fstClassName.",".$fstshift.",".$fstsection.",".$session.",".$student_id.",".$stroll.",".$stdname.",".$totalamount."\n";

    

// echo $stdate ."<br>";
// echo $fstbranch;
}

//$data .= $data;
//echo $data;
// header('Content-Type: application/csv');
// header('Content-Disposition: attachement; filename="Student_Collection_Report.csv"');



 //exit();
 header('Content-Type: application/csv');
 if($classid == 0){
 header('Content-Disposition: attachement; filename="Student_Paid_Report_Section_Headwise.csv"');
 }
 else{
 header('Content-Disposition: attachement; filename="Student_Paid_Report_Class_Headwise.csv"');    
 }
echo $data; exit();
?>