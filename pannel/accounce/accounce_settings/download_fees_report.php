<?php

$branchId=$_REQUEST['branchId'];
$studClass=$_REQUEST['studClass'];
$stsess=$_REQUEST['stsess'];

include('accounce_sett_top.php');

$gtschoolName ="select * from borno_school where borno_school_id=$schId";
					$qgstschoolName=$mysqli->query($gtschoolName);
					$shschname=$qgstschoolName->fetch_assoc();
                    $fnschname=$shschname['borno_school_name'];

$gtbranchName ="select * from borno_school_branch where borno_school_branch_id=$branchId";
					$qgstbranchName=$mysqli->query($gtbranchName);
					$shbrname=$qgstbranchName->fetch_assoc();
                    $fnbranchname=$shbrname['borno_school_branch_name'];



$gtClassName ="select * from borno_school_class where borno_school_class_id='$studClass'";
					$qgstClassName=$mysqli->query($gtClassName);
					$stClassName=$qgstClassName->fetch_assoc();
                    $fstClassName=$stClassName['borno_school_class_name'];




$banner="Branch : $fnbranchname    Class : $fstClassName    Session : $stsess";
require('../../fpdf/fpdf.php');
class PDF extends FPDF
{
// Page header
function Header()
{
//$finalSchoolLogo1=$GLOBALS['finalSchoolLogo'];    
//$this->Image($finalSchoolLogo1,30,5,150,20);      
$this->SetFont('Arial','B',20);
$this->Cell(200,5,$GLOBALS['fnschname'],0,0,"C");
$this->Ln();
$this->SetFont('Arial','B',10); 
$this->Ln();
$this->Cell(200,5,"Fees Report",0,0,"C");

$this->Cell(200,5,"",0,0,"C");
$this->Ln();
$this->Cell(190,5,$GLOBALS['banner'],0,0,"C");
$this->Ln();
$this->Ln();
$this->Cell(10,5,'SL',1,0,"L");
$this->Cell(140,5,"Fund Name",1,0,"L");
$this->Cell(40,5,"Amount",1,0,"R");	
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

$pdf->SetFont('Arial','',9); 

  $result ="select * from borno_school_fees where borno_school_id=$schId AND borno_school_branch_id=$branchId AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' order by borno_school_fund_id,borno_school_sub_fund_id asc";
		$qresult=$mysqli->query($result);
		$sl=0;
		while($shgresult=$qresult->fetch_assoc()){$sl++;
        //$fundname=$shgresult['borno_school_fund_name'];
		$fess=$shgresult['borno_school_fee'];
		$fundid=$shgresult['borno_school_fund_id'];
		$subfundid=$shgresult['borno_school_sub_fund_id'];

		$gtfundid="select * from borno_school_fund where borno_school_fund_id='$fundid'  ";  
		$qgtfundid=$mysqli->query($gtfundid);
		$stqgtfundid=$qgtfundid->fetch_assoc();
        $fundName=$stqgtfundid['borno_school_fund_name'];

		$gtsubfundid="select * from borno_school_sub_fund where borno_school_fund_id='$fundid' and borno_school_sub_fund_id='$subfundid'  ";  
		$qgtsubfundid=$mysqli->query($gtsubfundid);
		$stqgsubtfundid=$qgtsubfundid->fetch_assoc();
        $subfundName=$stqgsubtfundid['sub_fund_name'];

 

$pdf->Cell(10,5,$sl,1,0,"C");
$pdf->Cell(140,5,"$fundName $subfundName",1,0,"L");
$pdf->Cell(40,5,$fess,1,0,"R");

$pdf->Ln();	
}


$pdf->Output();
?>