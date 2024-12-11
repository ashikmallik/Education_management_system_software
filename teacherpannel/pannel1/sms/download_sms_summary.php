<?php
error_reporting(0);

 $date1=$_POST['datepicker'];
 $date2=$_POST['datepicker1'];
 $schId=$_POST['schId'];


include('../../connection.php');



require('fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();



$gtschoolName ="select * from borno_school where borno_school_id=$schId";
$qgtschoolName=$mysqli->query($gtschoolName);
$showdata=$qgtschoolName->fetch_assoc();
		$pdf->SetFont('Arial','',20);
		$fnschname=$showdata['borno_school_name'];
		$pdf->Cell(200,5,$fnschname,0,0,"C");
   
$pdf->Ln();
$pdf->Cell(200,2,"",0,0,"C");
$pdf->Ln();
$pdf->SetFont('Arial','',10); 
$pdf->Cell(200,5,"From : $date1 To : $date2",0,0,"C");
$pdf->Ln();
$pdf->Cell(200,2,"",0,0,"C");
$pdf->SetFont('Arial','',10); 
$pdf->Ln();
$pdf->Cell(200,5,"SMS Summary",0,0,"C");
$pdf->Ln();
$pdf->Cell(200,5,"",0,0,"C");
$pdf->Ln();
$pdf->SetFont('Arial','',10); 
$pdf->Cell(30,5,"",0,0,"C");
$pdf->Cell(80,5,"SMS Type",1,0,"C");
$pdf->Cell(50,5,"Total SMS",1,0,"C");


$result ="select * from borno_sent_sms where borno_sms_date between '$date1' AND '$date2' group by borno_sms_status asc";
$qgtresult=$mysqli->query($result);
while($row=$qgtresult->fetch_assoc()) { 
	$pdf->Ln();
	//foreach($row as $column)
		
		$status=$row['borno_sms_status'];
		
	
		$gtttalst="select * from borno_sent_sms where borno_sms_date between '$date1' AND '$date2' AND borno_sms_status='$status' AND borno_school_id='$schId'";
		
		
		$qgtgtttalst=$mysqli->query($gtttalst);
		$totalSMS=mysqli_num_rows($qgtgtttalst);
		$sqgtgtttalst=$qgtgtttalst->fetch_assoc();

		
$pdf->Cell(30,5,"",0,0,"C");
$pdf->Cell(80,5,$status,1,0,"C");
$pdf->Cell(50,5,$totalSMS,1,0,"C");


		
		
		
}



$pdf->Output();
?>