<?php

$fdate=$_POST['datepicker'];
$tdate=$_POST['datepicker1'];
$schId=$_POST['schId'];



include('report_sett_top.php');

$gtschoolName ="select * from borno_school where borno_school_id=$schId";
					$qgstschoolName=$mysqli->query($gtschoolName);
					$shschname=$qgstschoolName->fetch_assoc();
                    $fnschname=$shschname['borno_school_name'];



require('../../fpdf/fpdf.php');
class PDF extends FPDF
{
// Page header
function Header()
{

    $this->SetFont('Arial','B',20);
$this->Cell(200,5,$GLOBALS['fnschname'],0,0,"C");
$this->Ln();
$this->Cell(200,2,"",0,0,"C");
$this->Ln();
$this->SetFont('Arial','B',10);
$this->Cell(80,5,"From : ",0,0,"R");
$this->SetFont('Arial','',10);
$this->Cell(20,5,$GLOBALS['fdate'],0,0,"L");
$this->SetFont('Arial','B',10);
$this->Cell(10,5,"To : ",0,0,"L");
$this->SetFont('Arial','',10);
$this->Cell(90,5,$GLOBALS['tdate'],0,0,"L");
$this->Ln();
$this->Cell(200,2,"",0,0,"C");
$this->SetFont('Arial','B',10); 
$this->Ln();
$this->Cell(200,5,"Other Income Report",0,0,"C");
$this->Ln();
$this->Cell(200,5,"",0,0,"C");
$this->Ln();
$this->SetFont('Arial','',8); 
$this->Cell(5,5,'',0,0,"C");
$this->Cell(20,5,"Date",1,0,"C");
$this->Cell(20,5,"Memo No",1,0,"C");
$this->Cell(20,5,"Month",1,0,"C");
$this->Cell(35,5,"Income Head",1,0,"L");
$this->Cell(35,5,"Income Name",1,0,"L");
$this->Cell(30,5,"Narration",1,0,"L");
$this->Cell(20,5,"Amount",1,0,"C");
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

$fdate=date("Y-m-d",strtotime($fdate));
$tdate=date("Y-m-d",strtotime($tdate));
$totalamount=0;		
$total = array();	
  $result ="select * from borno_school_other_income where borno_school_other_income_date between '$fdate' AND '$tdate' order by borno_school_other_income_memo asc";
		$qresult=$mysqli->query($result);
		while($shgresult=$qresult->fetch_assoc()){

		
		$memo=$shgresult['borno_school_other_income_memo'];
		
	
$gtreceipt ="select * from borno_school_other_income where borno_school_other_income_memo='$memo'";
					$qgstreceipt=$mysqli->query($gtreceipt);
					$streceipt=$qgstreceipt->fetch_assoc();
                    
        $stdate=$streceipt['borno_school_other_income_date'];
		$stmon=$streceipt['borno_school_month'];
		$stexh=$streceipt['borno_school_income_head'];
		$stexn=$streceipt['borno_school_income_name'];
		$stexby=$streceipt['borno_school_income_narration'];
		$stamount=$streceipt['borno_school_income_amount'];

$total[]=$stamount;
$totalamount=array_sum($total);
$pdf->Cell(5,5,'',0,0,"C");
$stdate=date("d-m-Y",strtotime($stdate));
$pdf->Cell(20,5,$stdate,1,0,"C");
$pdf->Cell(20,5,$memo,1,0,"C");
$pdf->Cell(20,5,$stmon,1,0,"C");
$pdf->Cell(35,5,$stexh,1,0,"L");
$pdf->Cell(35,5,$stexn,1,0,"L");
$pdf->Cell(30,5,$stexby,1,0,"L");
$pdf->Cell(20,5,"$stamount/-",1,0,"C");
$pdf->Ln();	
}
	
$pdf->Cell(165,5,"Total Amount :",0,0,"R");
$pdf->Cell(20,5,"$totalamount/-",0,0,"C");		

$pdf->Output();
?>