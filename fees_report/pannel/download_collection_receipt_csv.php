<?php

$fdate=$_POST['datepicker'];
$tdate=$_POST['datepicker1'];
$schId=1;

$fdate=date("d/m/Y",strtotime($fdate));
$tdate=date("d/m/Y",strtotime($tdate));

// echo $fdate;
// echo $tdate;

include('report_sett_top.php');

$gtschoolName ="select * from borno_school where borno_school_id=$schId";
					$qgstschoolName=$mysqli->query($gtschoolName);
					$shschname=$qgstschoolName->fetch_assoc();
                    $fnschname=$shschname['borno_school_name'];



  $result ="SELECT `receive_date`,`borno_school_branch_name`,`borno_school_class_name`,`borno_school_shift_name`,`borno_school_section_name`,`student_id`,`borno_school_roll`,`borno_school_student_name`,SUM(`paid_amount`) as amount FROM `student_fees` as sf 
            INNER JOIN `borno_student_info` as si ON si.`borno_student_info_id` = sf.`student_id` 
            INNER JOIN `borno_school_class` as sc ON sc.`borno_school_class_id` = si.`borno_school_class_id` 
            INNER JOIN `borno_school_shift` as ss ON ss.`borno_school_shift_id` = si.`borno_school_shift_id` 
            INNER JOIN `borno_school_section` as sse ON sse.`borno_school_section_id` = si.`borno_school_section_id` 
            INNER JOIN `borno_school_branch` as sb ON sb.`borno_school_branch_id` = si.`borno_school_branch_id` 
            WHERE STR_TO_DATE(`receive_date`, '%d/%m/%Y') BETWEEN STR_TO_DATE('$fdate', '%d/%m/%Y') AND STR_TO_DATE('$tdate', '%d/%m/%Y') group by `money_receipt_no` ORDER BY STR_TO_DATE(`receive_date`, '%d/%m/%Y') ASC";
  $qresult=$mysqli->query($result);
  $data = "";



$data.="Date".","."Branch".","."Class".","."Shift".","."Section".","."Student ID".","."Roll".","."Student Name".","."Amount"."\n";
		
		while($shgresult=$qresult->fetch_assoc()){

		
		$student_id=$shgresult['student_id'];
	//	$memo = $shgresult['money_receipt_no'];
		$stdate=$shgresult['receive_date'];
		 $totalamount=$shgresult['amount'];
		 $fstClassName=$shgresult['borno_school_class_name'];
		 $fstshift=$shgresult['borno_school_shift_name'];
		 $fstsection=$shgresult['borno_school_section_name'];
		 $fstbranch=$shgresult['borno_school_branch_name']; 
		 $stroll=$shgresult['borno_school_roll'];
	     $stdname=$shgresult['borno_school_student_name'];

		



$data .= $stdate.",".$fstbranch.",".$fstClassName.",".$fstshift.",".$fstsection.",".$student_id.",".$stroll.",".$stdname.",".$totalamount."\n";    

// echo $stdate ."<br>";
// echo $fstbranch;
}

header('Content-Type: application/csv');
header('Content-Disposition: attachement; filename="Student_Collection_Report.csv"');
echo $data; exit();
?>