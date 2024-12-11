<?php
error_reporting(0);

 $date1=$_POST['datepicker'];
 $date2=$_POST['datepicker1'];
 $schId=$_POST['schId'];
 $smstype=$_POST['smstype'];

include('../../connection.php');

$gtschoolName ="select * from borno_school where borno_school_id=$schId";
$qgtschoolName=$mysqli->query($gtschoolName);
$showdata=$qgtschoolName->fetch_assoc();
		$fnschname=$showdata['borno_school_name'];

$date="From : $date1 To : $date2";
$smsreport="SMS Report of $smstype";

require('fpdf/fpdf.php');
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
//    $this->Image('logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',20);
    // Move to the right
    //$this->Cell(80);
    // Title
  
	$this->Cell(280,5,$GLOBALS['fnschname'],0,1,'C');
    // Line break
    $this->Ln();
    $this->SetFont('Arial','',12);
    $this->Cell(280,5,$GLOBALS['date'],0,1,'C');
    $this->Ln();
    $this->SetFont('Arial','',11);
    $this->Cell(280,5,$GLOBALS['smsreport'],0,1,'C');
    $this->Ln();
    $this->SetFont('Arial','',10);
    	$this->Cell(13,5,SL,1,0,'C');
		$this->Cell(25,5,"Class Name",1,0,'C');
		$this->Cell(22,5,"Shift Name",1,0,'C');
		$this->Cell(25,5,"Section Name",1,0,'C');
		$this->Cell(15,5,"Roll No",1,0,'C');
		$this->Cell(100,5,"Student Name",1,0,'C');
		$this->Cell(80,5,"Contact No",1,0,'C');
   $this->Ln();

	
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage(L);



$pdf->SetFont('Arial','',10);


 $result ="select * from borno_sent_sms where borno_sms_date between '$date1' AND '$date2' AND borno_school_id='$schId' AND borno_sms_status='$smstype' order by borno_sent_sms_id";
$qgtresult=$mysqli->query($result);
$sl=0;
while($row=$qgtresult->fetch_assoc()) { $sl++;
$sms=$row['borno_sent_sms_message'];
$classid=$row['borno_school_class_id'];
$shiftid=$row['borno_school_shift_id'];
$sectionid=$row['borno_school_section_id'];
$rollno=$row['borno_school_roll'];
$infoid=$row['borno_student_info_id'];
$contactno=$row['borno_sent_sms_phone'];

$gtclassName ="select * from borno_school_class where borno_school_class_id=$classid";
$qgtclassName=$mysqli->query($gtclassName);
$shqgtclassName=$qgtclassName->fetch_assoc();
 $fclassname=$shqgtclassName['borno_school_class_name'];

$gtshiftName ="select * from borno_school_shift where borno_school_shift_id=$shiftid";
$qgtshiftName=$mysqli->query($gtshiftName);
$shqgtshiftName=$qgtshiftName->fetch_assoc();
 $fshiftname=$shqgtshiftName['borno_school_shift_name'];

 $gtsectiontName ="select * from borno_school_section where borno_school_section_id=$sectionid";
$qggtsectiontName=$mysqli->query($gtsectiontName);
$shgtsectiontName=$qggtsectiontName->fetch_assoc();
  $fsectionname=$shgtsectiontName['borno_school_section_name'];

$gtstdName ="select * from borno_student_info where  borno_student_info_id=$infoid";
$qgtstdName=$mysqli->query($gtstdName);
$shqgtstdName=$qgtstdName->fetch_assoc();
$fstdname=$shqgtstdName['borno_school_student_name'];

$pdf->Cell(13,5,$sl,1,0,"C");
$pdf->Cell(25,5,"$fclassname",1,0,'C');
$pdf->Cell(22,5,"$fshiftname",1,0,'C');
$pdf->Cell(25,5,"$fsectionname",1,0,'C');
$pdf->Cell(15,5,"$rollno",1,0,'C');
$pdf->Cell(100,5,"$fstdname",1,0,'L');
$pdf->Cell(80,5,"$contactno",1,0,'C');



$pdf->Ln();		
		
		
}



$pdf->Output();
?>