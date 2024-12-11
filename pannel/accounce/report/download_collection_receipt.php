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
$this->Cell(200,5,"Only Student Collection",0,0,"C");
$this->Ln();
$this->Cell(200,5,"",0,0,"C");
$this->Ln();
$this->SetFont('Arial','',8); 
$this->Cell(20,5,"Date",1,0,"C");
$this->Cell(20,5,"Memo",1,0,"C");
$this->Cell(15,5,"Class",1,0,"C");
$this->Cell(15,5,"Shift",1,0,"C");
$this->Cell(20,5,"Section",1,0,"C");
$this->Cell(10,5,"Roll",1,0,"C");
$this->Cell(70,5,"Student Name",1,0,"L");
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
  $result ="select * from borno_school_receipt where borno_school_date between '$fdate' AND '$tdate' AND borno_school_id=$schId group by borno_school_memo asc";
		$qresult=$mysqli->query($result);
		while($shgresult=$qresult->fetch_assoc()){

		
		$memo=$shgresult['borno_school_memo'];
		
		
$gtreceipt ="select borno_school_class_id,borno_school_shift_id,borno_school_section_id,borno_school_session,borno_student_info_id,borno_school_date from borno_school_receipt where borno_school_memo='$memo' group by borno_school_class_id,borno_school_shift_id,borno_school_section_id,borno_school_session,borno_student_info_id,borno_school_date";
					$qgstreceipt=$mysqli->query($gtreceipt);
					$streceipt=$qgstreceipt->fetch_assoc();
                    
        $stcls=$streceipt['borno_school_class_id'];            
		$stsht=$streceipt['borno_school_shift_id'];
		$stsec=$streceipt['borno_school_section_id'];
		$stsess=$streceipt['borno_school_session'];
	$stdid=$streceipt['borno_student_info_id'];
		$stdate=$streceipt['borno_school_date'];

$gtClassName ="select * from borno_school_class where borno_school_class_id='$stcls'";
					$qgstClassName=$mysqli->query($gtClassName);
					$stClassName=$qgstClassName->fetch_assoc();
                    $fstClassName=$stClassName['borno_school_class_name'];



$gtshift ="select * from borno_school_shift where borno_school_shift_id=$stsht";
					$qgstshifte=$mysqli->query($gtshift);
					$stgtshift=$qgstshifte->fetch_assoc();
                    $fstshift=$stgtshift['borno_school_shift_name'];


$gtsection = "select * from borno_school_section where  borno_school_section_id='$stsec'";
					$qgstsection=$mysqli->query($gtsection);
					$stgtsection=$qgstsection->fetch_assoc();
                    $fstsection=$stgtsection['borno_school_section_name'];

 $result1 ="select * from borno_student_info where borno_school_session=$stsess AND borno_student_info_id='$stdid'";
					$qgstresult1=$mysqli->query($result1);
					$row1=$qgstresult1->fetch_assoc();
                    $stroll=$row1['borno_school_roll'];
		            $stdname=$row1['borno_school_student_name'];

$totalamount=0;		
$total = array();		
 $result2 ="select * from borno_school_receipt where borno_school_memo='$memo' order by borno_school_fund_id,borno_school_sub_fund_id asc";
					$qgstresult2=$mysqli->query($result2);
					while($row2=$qgstresult2->fetch_assoc()){
					  $total[]=$row2['borno_school_fee'];
                      $totalamount=array_sum($total);  
					    
					}

$alltotal[]=$totalamount;
$alltotalamount=array_sum($alltotal);
$stdate=date("d-m-Y",strtotime($stdate));
$pdf->Cell(20,5,$stdate,1,0,"C");
$pdf->Cell(20,5,$memo,1,0,"C");
$pdf->Cell(15,5,$fstClassName,1,0,"C");
$pdf->Cell(15,5,$fstshift,1,0,"C");
$pdf->Cell(20,5,$fstsection,1,0,"C");
$pdf->Cell(10,5,$stroll,1,0,"C");
$pdf->Cell(70,5,$stdname,1,0,"L");
$pdf->Cell(20,5,"$totalamount/-",1,0,"C");
$pdf->Ln();	
}
	
$pdf->Cell(170,5,"Total Amount :",0,0,"R");
$pdf->Cell(20,5,"$alltotalamount/-",0,0,"C");	

$pdf->Output();
?>