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
                    
                    
                    
                    
$stuinfo = "SELECT * FROM `collection_details` as sf
            WHERE STR_TO_DATE(`receive_date`, '%d/%m/%Y') BETWEEN STR_TO_DATE('$fdate', '%d/%m/%Y') AND STR_TO_DATE('$tdate', '%d/%m/%Y') group by `money_receipt_no` ORDER BY STR_TO_DATE(`receive_date`, '%d/%m/%Y') ASC";
     $qstuinfo=$mysqli->query($stuinfo);

  $data = "";

$data.="Motijheel Model School & College"."\n"."\n";

$data.="Date".","."Branch".","."Class".","."Shift".","."Section".","."Session".","."Student ID".","."Roll".","."Student Name".","."Receipt No".","."Bank Trans Id".","."Received By".","."Amount"."\n";

     
while($shqstuinfo=$qstuinfo->fetch_assoc()){
    
    $sid = $shqstuinfo['student_id'];
    $session1 = $shqstuinfo['session'];
    if($session1 == '2022' OR $session1 == '2023'OR $session1 == '2021'){
        if($session1 == '2021'){
        $session1 = "2022";
        }
       // $session = $shqstuinfo['session'];
         $result ="SELECT `receive_date`,`borno_school_branch_name`,`borno_school_class_name`,`borno_school_shift_name`,`borno_school_section_name`,`session`,`student_id`,`roll`,`student_name`,`money_receipt_no`,`bank_trans_id`,`received_from`,SUM(`receive_amount`) as amount FROM `collection_details` as sf
            INNER JOIN `borno_school_class` as sc ON sc.`borno_school_class_id` = sf.`class_id` 
            INNER JOIN `borno_school_shift` as ss ON ss.`borno_school_shift_id` = sf.`shift_id` 
            LEFT JOIN `borno_school_section` as sse ON sse.`borno_school_section_id` = sf.`section_id` AND sse.`year` = '$session1'
            INNER JOIN `borno_school_branch` as sb ON sb.`borno_school_branch_id` = sf.`branch_id` 
            WHERE `student_id` = '$sid' AND STR_TO_DATE(`receive_date`, '%d/%m/%Y') BETWEEN STR_TO_DATE('$fdate', '%d/%m/%Y') AND STR_TO_DATE('$tdate', '%d/%m/%Y') group by `money_receipt_no` ORDER BY STR_TO_DATE(`receive_date`, '%d/%m/%Y') ASC";
    }
    else{
        //$session = 0;
          $result ="SELECT `receive_date`,`borno_school_branch_name`,`borno_school_class_name`,`borno_school_shift_name`,`borno_school_section_name`,`session`,`student_id`,`roll`,`student_name`,`money_receipt_no`,`bank_trans_id`,`received_from`,SUM(`receive_amount`) as amount FROM `collection_details` as sf
            INNER JOIN `borno_school_class` as sc ON sc.`borno_school_class_id` = sf.`class_id` 
            INNER JOIN `borno_school_shift` as ss ON ss.`borno_school_shift_id` = sf.`shift_id` 
            LEFT JOIN `borno_school_section` as sse ON sse.`borno_school_section_id` = sf.`section_id` 
            INNER JOIN `borno_school_branch` as sb ON sb.`borno_school_branch_id` = sf.`branch_id` 
            WHERE `student_id` = '$sid' AND STR_TO_DATE(`receive_date`, '%d/%m/%Y') BETWEEN STR_TO_DATE('$fdate', '%d/%m/%Y') AND STR_TO_DATE('$tdate', '%d/%m/%Y') group by `money_receipt_no` ORDER BY STR_TO_DATE(`receive_date`, '%d/%m/%Y') ASC";
    }
    
    
    



  $qresult=$mysqli->query($result);

		
		while($shgresult=$qresult->fetch_assoc()){

		
		$student_id=$shgresult['student_id'];
		$memo = $shgresult['money_receipt_no'];
		$stdate=$shgresult['receive_date'];
		 $totalamount=$shgresult['amount'];
		 $fstClassName=$shgresult['borno_school_class_name'];
		 $fstshift=$shgresult['borno_school_shift_name'];
		 $fstsection=$shgresult['borno_school_section_name'];
		 $fstbranch=$shgresult['borno_school_branch_name']; 
		 $stroll=$shgresult['roll'];
	     $stdname=$shgresult['student_name'];
	     $banktransid=$shgresult['bank_trans_id'];
	     $receivedfrom=$shgresult['received_from'];
	     $session=$shgresult['session'];

		

$data .= $stdate.",".$fstbranch.",".$fstClassName.",".$fstshift.",".$fstsection.",".$session.",".$student_id.",".$stroll.",".$stdname.",".$memo.",".$banktransid.",".$receivedfrom.",".$totalamount."\n";

    

// echo $stdate ."<br>";
// echo $fstbranch;
}

//$data .= $data;
//echo $data;
// header('Content-Type: application/csv');
// header('Content-Disposition: attachement; filename="Student_Collection_Report.csv"');


}
 //exit();
 header('Content-Type: application/csv');
 header('Content-Disposition: attachement; filename="Student_Collection_Report.csv"');
echo $data; exit();
?>