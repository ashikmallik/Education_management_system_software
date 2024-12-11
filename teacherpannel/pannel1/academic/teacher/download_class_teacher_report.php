<?php

$branchId=$_POST['branchId'];
$shiftId=$_POST['shiftId'];
$schId=1;

include('../../../connection.php');
					$gtschoolName="SELECT * FROM borno_school where borno_school_id=$schId";
					$qgtschoolName=$mysqli->query($gtschoolName);
					$sqgtschoolName=$qgtschoolName->fetch_assoc();

$fnschname=$sqgtschoolName['borno_school_name'];

$gtbranch="SELECT * FROM borno_school_branch where borno_school_id=$schId AND borno_school_branch_id=$branchId";
					$qgtbranch=$mysqli->query($gtbranch);
					$sqgtbranch=$qgtbranch->fetch_assoc();
$fnsbranch1=$sqgtbranch['borno_school_branch_name'];
$fnsbranch="Branch : $fnsbranch1";

$gtshift="SELECT * FROM borno_school_shift where borno_school_shift_id=$shiftId";
					$qgtshift=$mysqli->query($gtshift);
					$sqgtshift=$qgtshift->fetch_assoc();
$fnsshift1=$sqgtshift['borno_school_shift_name'];
$fnsshift="Shift : $fnsshift1";

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


	$this->Cell(190,5,$GLOBALS['fnschname'],0,1,'C');
    // Line break
    $this->Ln();
    $this->SetFont('Arial','',14);
    $this->Cell(190,5,$GLOBALS['fnsbranch'],0,0,"C");
    $this->Ln();
    $this->SetFont('Arial','B',11);
    $this->Cell(190,5,$GLOBALS['fnsshift'],0,5,"C");
    $this->Ln();    
    $this->Cell(190,5,"Class Teacher Report",0,5,"C");
    $this->Ln();
    $this->SetFont('Arial','B',10);
    	$this->Cell(10,5,SL,1,0,'C');
        $this->Cell(90,5,"Teachers' Name",1,0,"L");
		$this->Cell(30,5,"Mobile No",1,0,'C');
		$this->Cell(30,5,"Class",1,0,'C');
		$this->Cell(30,5,"Section",1,0,'C');
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



 $pdf->SetFont('Arial','',10);
			
	
					$data="SELECT * FROM borno_set_class_teacher where borno_school_session=2019 AND borno_school_branch_id=$branchId AND borno_school_shift_id=$shiftId order by 	borno_set_class_teacher_id asc";
					$qdata=$mysqli->query($data);
					while($showdata=$qdata->fetch_assoc()){ $sl++;
					
		
		$techid=$showdata['borno_school_teacher_id'];
		$classid=$showdata['borno_school_class_id'];
		$sectionid=$showdata['borno_school_section_id']; 
		
$gtclass="SELECT * FROM borno_school_class where borno_school_class_id=$classid";
					$qgtclass=$mysqli->query($gtclass);
					$sqgtclass=$qgtclass->fetch_assoc();
$fnsclass=$sqgtclass['borno_school_class_name'];

$gtsection="SELECT * FROM borno_school_section where borno_school_section_id=$sectionid";
					$qgtsection=$mysqli->query($gtsection);
					$sqgtsection=$qgtsection->fetch_assoc();
$fnssection=$sqgtsection['borno_school_section_name'];
			
 $gtheadmaster="SELECT * FROM borno_teacher_info where borno_teacher_info_id=$techid";
		$qgtheadmaster=$mysqli->query($gtheadmaster);
		$sqgtheadmaster=$qgtheadmaster->fetch_assoc();
		$tname=$sqgtheadmaster['borno_teacher_name']; 
		$tno=substr($sqgtheadmaster['borno_teacher_phone'],2,11);
		

		
					
	  
		$pdf->Cell(10,5,$sl,1,0,"C");
		$pdf->Cell(90,5,$tname,1,0,"L");
		$pdf->Cell(30,5,$tno,1,0,"C");
		$pdf->Cell(30,5,$fnsclass,1,0,"C");	
		$pdf->Cell(30,5,$fnssection,1,0,"C");
		$pdf->Ln();
}



$pdf->Output();
?>