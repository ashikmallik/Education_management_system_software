<?php

$year=$_REQUEST['year'];
$month=$_REQUEST['month'];

include('../../../connection.php');
           
if($month==1){$mname="January";}
elseif($month==2){$mname="February";}
elseif($month==3){$mname="March";}
elseif($month==4){$mname="April";}
elseif($month==5){$mname="May";}
elseif($month==6){$mname="June";}
elseif($month==7){$mname="July";}
elseif($month==8){$mname="August";}
elseif($month==9){$mname="September";}
elseif($month==10){$mname="October";}
elseif($month==11){$mname="November";}
elseif($month==12){$mname="December";}
$banner="$mname-$year";
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

    // Line break
    $this->Ln();
    $this->SetFont('Arial','B',14);
    $this->Cell(189,10,$GLOBALS['banner'],1,0,"C");

    $this->Ln();

    
    $this->SetFont('Arial','B',10);
		$this->Cell(27,5,"Saturday",1,0,'C');
		$this->Cell(27,5,"Sunday",1,0,'C');
		$this->Cell(27,5,"Monday",1,0,'C');
		$this->Cell(27,5,"Tuesday",1,0,'C');
		$this->Cell(27,5,"Wednesday",1,0,'C');
		$this->Cell(27,5,"Thursday",1,0,'C');
		$this->setFillColor(250,0,0); 
		$this->Cell(27,5,"Friday",1,0,'C',1);		
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
$pdf->SetFont('Arial','B',10);

		$data="select * from borno_calender where borno_year='$year' AND borno_month='$month' order by borno_date asc";
					$qdata=$mysqli->query($data);
					while($showdata=$qdata->fetch_assoc()){ $sl++;
					
		
		$serial=$showdata['borno_week_serial'];
		$date=$showdata['borno_date'];

        if($sl==1 AND $serial==2){$pdf->Cell(27,5,'',1,0,"C");}		
		elseif($sl==1 AND $serial==3){$pdf->Cell(27,5,'',1,0,"C");$pdf->Cell(27,5,'',1,0,"C");}	
		elseif($sl==1 AND $serial==4){$pdf->Cell(27,5,'',1,0,"C");$pdf->Cell(27,5,'',1,0,"C");$pdf->Cell(27,5,'',1,0,"C");}	
		elseif($sl==1 AND $serial==5){$pdf->Cell(27,5,'',1,0,"C");$pdf->Cell(27,5,'',1,0,"C");$pdf->Cell(27,5,'',1,0,"C");$pdf->Cell(27,5,'',1,0,"C");}	
		elseif($sl==1 AND $serial==6){$pdf->Cell(27,5,'',1,0,"C");$pdf->Cell(27,5,'',1,0,"C");$pdf->Cell(27,5,'',1,0,"C");$pdf->Cell(27,5,'',1,0,"C");$pdf->Cell(27,5,'',1,0,"C");}	
		elseif($sl==1 AND $serial==7){$pdf->Cell(27,5,'',1,0,"C");$pdf->Cell(27,5,'',1,0,"C");$pdf->Cell(27,5,'',1,0,"C");$pdf->Cell(27,5,'',1,0,"C");$pdf->Cell(27,5,'',1,0,"C");$pdf->Cell(27,5,'',1,0,"C");}			

        if($serial==7){$pdf->setFillColor(250,0,0);  $pdf->Cell(27,5,$date,1,0,"C",1); $pdf->Ln();}
        else{$pdf->SetTextColor(0,0,0); $pdf->Cell(27,5,$date,1,0,"C");}
					    
		}






			


$pdf->Output();
?>