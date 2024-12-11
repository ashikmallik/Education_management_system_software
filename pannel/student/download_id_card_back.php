<?php

$branchId=$_GET['branchId'];
$schId=$_GET['schoolId'];
$studClass=$_GET['studClass'];
$shiftId=$_GET['shiftId'];
$section=$_GET['section'];
$stsess=trim($_GET['stsess']);

include('../../../connection.php');
           
$gtschoolName="SELECT * FROM borno_school where borno_school_id='$schId'";
					$qgtschoolName=$mysqli->query($gtschoolName);
					$sqgtschoolName=$qgtschoolName->fetch_assoc();
$fnschname=$sqgtschoolName['borno_school_name'];


if($schId==14){
$backimage="../student/idcard/police back id card.png";
}
elseif($schId==96){
$backimage="../student/idcard/Kamalpur id card back .png";
}
elseif($schId==97){
$backimage="../student/idcard/Shahid Arju back id card.png";
}
elseif($schId==113){
$backimage="../student/idcard/mirkamari back id card.png";
}

elseif($schId==116){
$backimage="../student/idcard/jagadish id card back .png";
}

require('../../fpdf/fpdf.php');
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
//    $this->Image('logo.png',10,6,30);
    // Arial bold 15
    //$this->SetFont('Arial','B',20);
    // Move to the right
    //$this->Cell(80);
    // Title

 	$finalbackimage=$GLOBALS['backimage']; 

	
$this->Image("$finalbackimage",15.4, 2, 57.5, 90.4);
$this->Image("$finalbackimage",83.4, 2, 57.5, 90.4);
$this->Image("$finalbackimage",152.4, 2, 57.5, 90.4);

$this->Image("$finalbackimage",15.4, 97, 57.5, 90.4);
$this->Image("$finalbackimage",83.4, 97, 57.5, 90.4);
$this->Image("$finalbackimage",152.4,97, 57.5, 90.4);

 
$this->Image("$finalbackimage",15.4, 192, 57.5, 90.4);
$this->Image("$finalbackimage",83.4, 192, 57.5, 90.4);
$this->Image("$finalbackimage",152.4, 192, 57.5, 90.4);
	
}

// Page footer
function Footer()
{


    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','',9);
    $this->SetTextColor(0,0,0);
   	//$this->Cell(42,5,$GLOBALS['stdid1'],0,1,'C');
	$this->Cell(42,5,'',0,1,'C');
    $this->SetFont('Arial','I',8);
    // Page number
    //$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','',9);

		$pdf->Cell(14.5,2,'',0);
		$pdf->Cell(32,2,'',0);
		$pdf->Cell(20,2,'',0);
		$pdf->Cell(69,2,'|',0);
		$pdf->Cell(10,2,'|',0,0);		
		$pdf->Ln();
        $pdf->Ln();   
        $pdf->Ln();
		$pdf->Cell(14.5,2,'',0);
		$pdf->Cell(32,2,'',0);
		$pdf->Cell(20,2,'',0);
		$pdf->Cell(69,2,'|',0);
		$pdf->Cell(10,2,'|',0,0);		
		$pdf->Ln();

$pdf->Output();
?>