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
$this->Cell(200,5,"Total Income Report",0,0,"C");
$this->Ln();
$this->Cell(200,5,"",0,0,"C");
$this->Ln();
$this->SetFont('Arial','',8); 
$this->Cell(50,5,'',0,0,"C");
$this->Cell(80,5,"Fund Name",1,0,"C");
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

$stdtotalinocme=0;
$stdtotal=array();
$totalother=array();
$totalotherinocme=0; 

  $result ="select * from borno_school_receipt where borno_school_date between '$fdate' AND '$tdate' AND borno_school_id='$schId' group by borno_school_fund_id asc";
		$qresult=$mysqli->query($result);
		while($shgresult=$qresult->fetch_assoc()){

		
		$fund=$shgresult['borno_school_fund_id'];
$totalamount=0;		
$total = array();		
		
$gtreceipt ="select * from borno_school_receipt where borno_school_date between '$fdate' AND '$tdate' AND borno_school_fund_id='$fund' AND borno_school_id='$schId' order by borno_school_memo,borno_school_sub_fund_id asc";
					$qgstreceipt=$mysqli->query($gtreceipt);
					while($streceipt=$qgstreceipt->fetch_assoc()){
					    
		$stamount=$streceipt['borno_school_fee'];
        $total[]=$stamount;
        $totalamount=array_sum($total);					    
					    
					}


$gtClassName ="select * from borno_school_fund where borno_school_fund_id='$fund'";
					$qgstClassName=$mysqli->query($gtClassName);
					$stClassName=$qgstClassName->fetch_assoc();
                    $fststgtfund=$stClassName['borno_school_fund_name'];
        $pdf->Cell(50,5,'',0,0,"L");
        $pdf->Cell(80,5,$fststgtfund,1,0,"L");
        $pdf->Cell(20,5,"$totalamount/-",1,0,"C");
        $stdtotal[]=$totalamount;
        $stdtotalinocme=array_sum($stdtotal);        
        $pdf->Ln();

}


$gtshift ="select * from borno_school_other_income where borno_school_other_income_date between '$fdate' AND '$tdate' AND borno_school_id='$schId' group by borno_school_income_head asc";
					$qgstshifte=$mysqli->query($gtshift);
					while($stgtshift=$qgstshifte->fetch_assoc()){
					$inhead=$stgtshift['borno_school_income_head'];    
					

$totalinamn=0;		
$intotal = array();
$gtsection = "select * from borno_school_other_income where borno_school_other_income_date between '$fdate' AND '$tdate' AND borno_school_income_head='$inhead' AND borno_school_id='$schId' order by borno_school_other_income_memo asc";
					$qgstsection=$mysqli->query($gtsection);
					while($stgtsection=$qgstsection->fetch_assoc())
					{
$intotal[]=$stgtsection['borno_school_income_amount'];					    
$totalinamn=array_sum($intotal);					    
					}

$pdf->Cell(50,5,'',0,0,"L");
$pdf->Cell(80,5,$inhead,1,0,"L");
$pdf->Cell(20,5,"$totalinamn/-",1,0,"C");                  
$totalother[]=$totalinamn;
$totalotherinocme=array_sum($totalother); 
$pdf->Ln();
					}
$totalincome=$totalotherinocme+$stdtotalinocme;	
$pdf->Cell(50,5,'',0,0,"L");
$pdf->Cell(80,5,"Total Income",1,0,"L");
$pdf->Cell(20,5,"$totalincome/-",1,0,"C");		

$pdf->Output();
?>