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
$this->Cell(200,5,"Bank Report",0,0,"C");
$this->Ln();
$this->Cell(200,5,"",0,0,"C");
$this->Ln();
$this->SetFont('Arial','B',8); 
$this->Cell(20,5,"Date",1,0,"C");
$this->Cell(10,5,"Memo",1,0,"C");
$this->Cell(65,5,"Bank Name",1,0,"L");
$this->Cell(30,5,"A/C No",1,0,"L");
$this->Cell(25,5,"Transection Type",1,0,"L");
$this->Cell(20,5,"Debit",1,0,"L");
$this->Cell(20,5,"Credit",1,0,"C");
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
$pdf->SetFont('Arial','',8); 
$fdate=date("Y-m-d",strtotime($fdate));
$tdate=date("Y-m-d",strtotime($tdate));
	
$totalamount1=0;		
$total1 = array();
  $result1 ="select * from borno_school_bank where borno_school_id=$schId AND 	borno_school_date between '$fdate' AND '$tdate' AND ( borno_school_transection_type=1 OR borno_school_transection_type=3) order by 	borno_school_bank_id asc";
		$qresult1=$mysqli->query($result1);
		while($shgresult1=$qresult1->fetch_assoc()){
		 $stamount1=$shgresult1['borno_school_amount'];   
$total1[]=$stamount1;
$totalamount1=array_sum($total1);		    
		}

$totalamount2=0;		
$total2 = array();
  $result2 ="select * from borno_school_bank where borno_school_id=$schId AND 	borno_school_date between '$fdate' AND '$tdate' AND ( borno_school_transection_type=2 OR borno_school_transection_type=4) order by 	borno_school_bank_id asc";
		$qresult2=$mysqli->query($result2);
		while($shgresult2=$qresult2->fetch_assoc()){
		 $stamount2=$shgresult2['borno_school_amount'];   
$total2[]=$stamount2;
$totalamount2=array_sum($total2);		    
		}	

$balance=$totalamount1-$totalamount2;

  $result ="select * from borno_school_bank where borno_school_id=$schId AND 	borno_school_date between '$fdate' AND '$tdate' order by 	borno_school_bank_id asc";
		$qresult=$mysqli->query($result);
		while($shgresult=$qresult->fetch_assoc()){
		$memo=$shgresult['borno_school_bank_id'];
		
	
$gtreceipt ="select * from borno_school_bank where borno_school_bank_id='$memo'";
					$qgstreceipt=$mysqli->query($gtreceipt);
					$streceipt=$qgstreceipt->fetch_assoc();
                    
        $stdate=$streceipt['borno_school_date'];
		$bankname=$streceipt['borno_school_bank_name'];
		$acno=$streceipt['borno_school_bank_ac_no'];
		$type=$streceipt['borno_school_transection_type'];
		$description=$streceipt['borno_school_transection_no'];
		$stamount=$streceipt['borno_school_amount'];
if($type==1){$typename="Deposit";}
elseif($type==2){$typename="Withdraw";}
elseif($type==3){$typename="Profit";}
elseif($type==4){$typename="Service Charge";}		
		

$stdate=date("d-m-Y",strtotime($stdate));
$pdf->Cell(20,5,$stdate,1,0,"C");
$pdf->Cell(10,5,$memo,1,0,"C");
$pdf->Cell(65,5,$bankname,1,0,"L");
$pdf->Cell(30,5,$acno,1,0,"L");
$pdf->Cell(25,5,$typename,1,0,"L");
if($type==1 OR $type==3)
{
$pdf->Cell(20,5,"",1,0,"L");
$pdf->Cell(20,5,"$stamount/-",1,0,"C");
}
if($type==2 OR $type==4)
{
$pdf->Cell(20,5,"$stamount/-",1,0,"C");
$pdf->Cell(20,5,"",1,0,"L");
}
$pdf->Ln();	
}

$pdf->SetFont('Arial','B',8); 
$pdf->Cell(170,5,"Total Credit Amount",1,0,"L");
$pdf->Cell(20,5,"$totalamount1/-",1,0,"C");
$pdf->Ln();
$pdf->Cell(150,5,"Total Debit Amount",1,0,"L");
$pdf->Cell(20,5,"$totalamount2/-",1,0,"C");
$pdf->Cell(20,5,"",1,0,"L");
$pdf->Ln();
$pdf->Cell(170,5,"Balance",1,0,"L");
$pdf->Cell(20,5,"$balance/-",1,0,"C");


$pdf->Output();
?>