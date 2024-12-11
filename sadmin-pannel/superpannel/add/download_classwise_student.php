<?php


 $studClass=$_POST['studClass'];
 $stsess=$_POST['stsess'];
 $schlid=$_POST['schlid'];


include('../../../connection.php');



$gtclass="SELECT * FROM borno_school_class where borno_school_class_id=$studClass";
					$qgtclass=$mysqli->query($gtclass);
					$sqgtclass=$qgtclass->fetch_assoc();
$fnsclass=$sqgtclass['borno_school_class_name'];


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
  
	$this->Cell(200,5,'BornoSKY Class Wise Student',0,1,'C');
    // Line break
    $this->Ln();
    $this->SetFont('Arial','',12);
    $this->Cell(100,5,"Class :",0,0,"R");
    $this->Cell(100,5,$GLOBALS['fnsclass'],0,0,"L");
    $this->Ln();
    $this->Cell(103,5,'Session : ',0,0,'R');
    $this->Cell(100,5,$GLOBALS['stsess'],0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',10);
    	$this->Cell(10,5,SL,1,0,'C');
        $this->Cell(150,5,"School Name",1,0,"L");
        $this->Cell(30,5,Student,1,0,'C');
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
        
		for($i=0;$i<count($schlid);$i++){
			$data="select * from borno_student_info where borno_school_id='$schlid[$i]' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess'";
					$qdata=$mysqli->query($data);
					$showdata=mysqli_num_rows($qdata); 
					
					$gtschoolName="SELECT * FROM borno_school where borno_school_id=$schlid[$i]";
					$qgtschoolName=$mysqli->query($gtschoolName);
					$sqgtschoolName=$qgtschoolName->fetch_assoc();
                    $fnschname=$sqgtschoolName['borno_school_name'];			
	
        $sl=$i+1;
	    $totalstd[]=$showdata; 
		$pdf->Cell(10,5,$sl,1,0,"C");
		$pdf->Cell(150,5,$fnschname,1,0,"L");
		$pdf->Cell(30,5,$showdata,1,0,"C");
		$pdf->Ln();
        
        $finaltotalstd = array_sum($totalstd);
}
        $pdf->Cell(10,5,'',0,0,"C");
		$pdf->Cell(150,5,'Total Student :',0,0,"R");
		$pdf->Cell(30,5,$finaltotalstd,0,0,"C");
		
$pdf->Output();
?>