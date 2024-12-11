<?php
error_reporting(0);
$sid="230907";//$_GET['sid'];
include('db_contection.php');
$cheksl ="SELECT * FROM `admition_form` WHERE `student_id`='$sid'";
$qcheksl=$mysqli->query($cheksl);
$shqcheksl=$qcheksl->fetch_assoc();
$nameb = $shqcheksl['std_name_b'];

require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    //$this->Image('logo.png',10,6,30);
    // Arial bold 15
    //$this->SetFont('Arial','B',15);
    // Move to the right
    //$this->Cell(80);
    // Title
  
	//$this->Cell(30,10,$GLOBALS['gtSchoolName'],0,1,'C');
    // Line break
    //$this->Ln(20);
	
	$finalSchoolLogo1="aggsc logo.png";
  
    $this->Image($finalSchoolLogo1,9,15,25,25);
	$this->Ln(8);
	
}

// Page footer
function Footer()
{
    
	$finalgtschoolsignature1=$GLOBALS['finalgtschoolsignature'];
  
   // $this->Image($finalgtschoolsignature1,220,185,30,10);
	
	// Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','',14);
    // Page number
	$this->Cell(90,1,"----------------------------",0,0,"C"); 
	$this->Cell(90,1,"-------------------------------------",0,0,"C"); 
	
	$this->Cell(90,1,"---------------------------------------",0,0,"C"); 
	$this->Ln();
	$this->Cell(90,5,$GLOBALS['nameb'],0,0,"C"); 
	
 if( $schId!=94)

{ 
$this->Cell(90,5,"অধ্যক্ষ",0,0,"C");
}
else{
  $this->Cell(90,5,"Class In-charge  Signature",0,0,"C");  
    

}
	    
	       

	    	$this->Cell(45,5,$GLOBALS['fnshead'],0,0,"R");
	$this->Cell(45,5," Signature",0,0,"L"); 

	

	
	$this->Ln();
		$this->SetFont('Arial','',8);
	if($schId==140){
	$this->Cell(110,5,"Publish Date : 8/12/2021",0,0,"L");
}

// 	$this->Cell(20,5,"Publish Date : ",0,0,"L");
// 	$this->Cell(90,5,$GLOBALS['publish'],0,0,"L"); 

   // $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P');







$pdf->Output();
?>