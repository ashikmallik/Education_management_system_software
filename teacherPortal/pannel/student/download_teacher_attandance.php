<?php

$date=$_REQUEST['date'];



include('../../../connection.php');
 require_once('student_top.php');          
					$gtschoolName="SELECT * FROM borno_school where borno_school_id='$schId'";
					$qgtschoolName=$mysqli->query($gtschoolName);
					$sqgtschoolName=$qgtschoolName->fetch_assoc();
$fnschname=$sqgtschoolName['borno_school_name'];

$date=date("d-M-Y",strtotime($date));

$bannar="Date : $date";

require('../../fpdf/fpdf.php');
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
  
	$this->Cell(200,5,$GLOBALS['fnschname'],0,0,'C');
    	$this->Cell(1,6,'',0,0,'C');	
    // Line break
    $this->Ln();
    $this->SetFont('Arial','',14);
    $this->Cell(200,5,"Teacher Attandance Sheet",0,0,"C");

    $this->Ln();
    $this->SetFont('Arial','',11);
    $this->Cell(200,5,$GLOBALS['bannar'],0,0,"C");

    $this->Ln();
    
    $this->SetFont('Arial','B',10);
    	$this->Cell(10,5,'SL',1,0,'C');
		$this->Cell(70,5,"Teacher Name",1);
		$this->Cell(20,5,"In Time",1,0,'C');
		$this->Cell(20,5,"Out Time",1,0,'C');	
		$this->Cell(20,5,"Late Time",1,0,'C');	
		$this->Cell(20,5,"Work Time",1,0,'C');		
		$this->Cell(20,5,'Remarks',1,0,'C');
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
$pdf->AddPage();
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','',9);
$date=date("Y-m-d",strtotime($date));
			$data="select * from borno_teacher_attandance where borno_school_id='$schId' AND borno_school_date='$date' order by  	borno_teacher_attandance_id asc";
					$qdata=$mysqli->query($data);
					$sl=0;
					while($showdata=$qdata->fetch_assoc()){ $sl++;
					
		

		$techname=$showdata['borno_teacher_name'];
		$intime=$showdata['borno_in_time'];
		$outtime=$showdata['borno_out_time'];
		$late=$showdata['borno_late_time'];
		$worktime=$showdata['borno_work_time'];		
		$absent=$showdata['borno_absent'];		
        if($absent=="True"){$absent="Absent";}
		$pdf->Cell(10,5,$sl,1,0,"C");
		$pdf->Cell(70,5,$techname,1);
		$pdf->Cell(20,5,$intime,1,0,"C");	
		$pdf->Cell(20,5,$outtime,1,0,"C");
		$pdf->Cell(20,5,$late,1,0,"C");
		$pdf->Cell(20,5,$worktime,1,0,"C");
		$pdf->Cell(20,5,$absent,1,0,"C");		
		$pdf->Ln();
}








$pdf->Output();
?>