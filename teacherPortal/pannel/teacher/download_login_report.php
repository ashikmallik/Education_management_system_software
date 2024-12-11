<?php

$branchId=$_POST['branchId'];
$shiftId1=$_POST['shiftId'];

require_once('teacher_top.php');

include('../../../connection.php');
					$gtschoolName="SELECT * FROM borno_school where borno_school_id=$schId";
					$qgtschoolName=$mysqli->query($gtschoolName);
					$sqgtschoolName=$qgtschoolName->fetch_assoc();

$fnschname=$sqgtschoolName['borno_school_name'];

$gtbranch="SELECT * FROM borno_school_branch where borno_school_id=$schId AND borno_school_branch_id=$branchId";
					$qgtbranch=$mysqli->query($gtbranch);
					$sqgtbranch=$qgtbranch->fetch_assoc();
$fnsbranch=$sqgtbranch['borno_school_branch_name'];



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


	$this->Cell(200,5,$GLOBALS['fnschname'],0,1,'C');
    // Line break
    $this->Ln();
    $this->SetFont('Arial','',14);
    $this->Cell(100,5,"Branch :",0,0,"R");
    $this->Cell(100,5,$GLOBALS['fnsbranch'],0,0,"L");
    $this->Ln();
    $this->SetFont('Arial','',11);
    $this->Cell(200,5,"Teacher's Login Report",0,5,"C");
    $this->Ln();
    $this->SetFont('Arial','',10);
    	$this->Cell(8,5,'SL',1,0,'C');
    	$this->Cell(15,5,'Shift',1,0,'C');
        $this->Cell(80,5,'Name',1,0,"C");
		$this->Cell(30,5,"Contact No",1,0,'C');
		$this->Cell(25,5,"User ID",1,0,'C');
		$this->Cell(30,5,'Password',1,0,'C');
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




			
	
					$data="SELECT * FROM borno_teacher_info where borno_school_branch_id=$branchId AND borno_school_shift_id='$shiftId1' AND borno_school_id=$schId order by borno_teacher_info_id asc";
					$qdata=$mysqli->query($data);
					while($showdata=$qdata->fetch_assoc()){ $sl++;
					
		
		$shiftid=$showdata['borno_school_shift_id'];
		$techname=$showdata['borno_teacher_name'];
		$tecdesig1=$showdata['borno_teachers_designation'];
		$techPhone=substr($showdata['borno_teacher_phone'],2,11);
		$tecdid=$showdata['borno_teacher_info_id']; 

			
$gtheadmaster="SELECT * FROM borno_teacher_login where borno_teacher_info_id=$tecdid";
		$qgtheadmaster=$mysqli->query($gtheadmaster);
		$sqgtheadmaster=$qgtheadmaster->fetch_assoc();
		$pass=$sqgtheadmaster['borno_teacher_password']; 
		
		 if($shiftid==1) { $final="No"; }
		 elseif($shiftid==2) { $final="Morning"; }
		 elseif($shiftid==3) { $final="Day"; }
		
					
	  
		$pdf->Cell(8,5,$sl,1);
		$pdf->Cell(15,5,$final,1,0,"C");
		$pdf->Cell(80,5,$techname,1);
		$pdf->Cell(30,5,$techPhone,1,0,"C");	
		$pdf->Cell(25,5,$tecdid,1,0,"C");
		$pdf->Cell(30,5,$pass,1,0,"C");
		$pdf->Ln();
}



$pdf->Output();
?>