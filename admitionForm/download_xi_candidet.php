<?php

$group=$_GET['group'];
include('db_contection.php');

					$gtschoolName="SELECT * FROM borno_school where borno_school_id=134";
					$qgtschoolName=$mysqli->query($gtschoolName);
					$sqgtschoolName=$qgtschoolName->fetch_assoc();
$fnschname=$sqgtschoolName['borno_school_name'];



require('fpdf/fpdf.php');
class PDF extends FPDF
{
 
   function mycell($w,$h,$x,$t){
    
    $hig = $h/3;
    $fir = $hig+2;
    $sec = $hig+$hig+$hig+3;
    $len = strlen($t);
    if($len>35){
        $txt = str_split($t,35);
        $this->setX($x);
        $this->cell($w,$fir,$txt[0],'','L','');
        $this->setX($x);
        $this->cell($w,$sec,$txt[1],'','L','');
        $this->setX($x);
        $this->cell($w,$h,'','LTRB',0,'L',0);
        
    }
    else{
        $this->setX($x);
        $this->cell($w,$h,$t,'LTRB',0,'L',0);
    }
    
}   
    
    
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
  
	$this->Cell(200,5,$GLOBALS['fnschname'],0,1,'C');
    // Line break
    $this->Ln();
    $this->SetFont('Arial','',14);
    $this->Cell(100,5,"Group :",0,0,"R");
    $this->Cell(100,5,"",0,0,"L");
    $this->Ln();
    $this->SetFont('Arial','',11);
    $this->Cell(12,5,' ',0,0,'L');
    $this->Cell(18,5,'',0,0,'L');
    $this->Cell(12,5,' ',0,0,'L');
    $this->Cell(18,5,'',0,0,'L');
    $this->Cell(15,5,'',0,0,'L');
    $this->Cell(65,5,'',0,0,'L');
    $this->Cell(18,5,' ',0,0,'L');
    $this->Cell(10,5,'',0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',10);
        $this->Cell(25,5,'SSC Roll',1,0,"C");
		$this->Cell(60,5,"Student Name",1);
		$this->Cell(35,5,'Student ID',1,0,'C');
		$this->Cell(15,5,"Roll",1,0,'C');
		$this->Cell(35,5,"Father's Contact No",1,0,'C');
		$this->Cell(25,5,'Photo',1,0,'C');
		
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

					$data="SELECT * FROM `admition_form` WHERE `group` = '$group'";
					$qdata=$mysqli->query($data);
					while($showdata=$qdata->fetch_assoc()){ $sl++;
					
		$sscroll=$showdata['ssc_roll'];
		$roll=$showdata['roll'];
		$sid=$showdata['student_id'];
		$techname=$showdata['std_name'];
		$techPhone=$showdata['fmobile'];
		$stphoto1=$showdata['imagePath'];
	
	
	

		 $w =60;
         $h =15;
		$pdf->Cell(25,15,$sscroll,1);
		
		$x= $pdf->getX();
        $pdf->mycell($w,$h,$x,$techname);
		//$pdf->Cell(80,15,$techname,1);
		$pdf->Cell(35,15,$sid,1);
		$pdf->Cell(15,15,$roll,1);
		$pdf->Cell(35,15,$techPhone,1);
		$pdf->Cell(25,15,'',1);

		$pdf->Ln();
}



$pdf->Output();
?>