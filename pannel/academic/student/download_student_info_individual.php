<?php

 $branchId=$_GET['branchId'];
 $schId=$_GET['schoolId'];
 $studClass=$_GET['studClass'];
 $shiftId=$_GET['shiftId'];
 $section=$_GET['section'];
 $stsess=trim($_GET['stsess']);
 $stdid=$_GET['stdid'];

include('../../../connection.php');

					$gtschoolName="SELECT * FROM borno_school where borno_school_id=$schId";
					$qgtschoolName=$mysqli->query($gtschoolName);
					$sqgtschoolName=$qgtschoolName->fetch_assoc();
$fnschname=$sqgtschoolName['borno_school_name'];

$gtbranch="SELECT * FROM borno_school_branch where borno_school_id=$schId AND borno_school_branch_id=$branchId";
					$qgtbranch=$mysqli->query($gtbranch);
					$sqgtbranch=$qgtbranch->fetch_assoc();
$fnsbranch=$sqgtbranch['borno_school_branch_name'];

$gtclass="SELECT * FROM borno_school_class where borno_school_class_id=$studClass";
					$qgtclass=$mysqli->query($gtclass);
					$sqgtclass=$qgtclass->fetch_assoc();
$fnsclass=$sqgtclass['borno_school_class_name'];

$gtshift="SELECT * FROM borno_school_shift where borno_school_shift_id=$shiftId";
					$qgtshift=$mysqli->query($gtshift);
					$sqgtshift=$qgtshift->fetch_assoc();
$fnsshift=$sqgtshift['borno_school_shift_name'];

$gtsection="SELECT * FROM borno_school_section where borno_school_section_id=$section";
					$qgtsection=$mysqli->query($gtsection);
					$sqgtsection=$qgtsection->fetch_assoc();
$fnssection=$sqgtsection['borno_school_section_name'];

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
    $this->Ln();
    $this->SetFont('Arial','B',12);
    $this->Cell(15,5,'Class : ',0,0,'L');
    $this->Cell(18,5,$GLOBALS['fnsclass'],0,0,'L');
    $this->Cell(15,5,'Shift : ',0,0,'L');
    $this->Cell(25,5,$GLOBALS['fnsshift'],0,0,'L');
    $this->Cell(20,5,'Section : ',0,0,'L');
    $this->Cell(65,5,$GLOBALS['fnssection'],0,0,'L');
    $this->Ln();
    $this->Ln();
    $this->Cell(20,5,'Session : ',0,0,'L');
    $this->Cell(10,5,$GLOBALS['stsess'],0,0,'L');
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
$pdf->SetFont('Arial','',12);

					$data="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_student_info_id='$stdid'";
					$qdata=$mysqli->query($data);
					$showdata=$qdata->fetch_assoc();
					
		
		$roll=$showdata['borno_school_roll'];
		$name=$showdata['borno_school_student_name'];
		$father=$showdata['borno_school_father_name'];
		$mother=$showdata['borno_school_mother_name'];
		$maddress=$showdata['borno_school_address'];
		$paddress=$showdata['borno_school_permanentaddress'];
		$blood=$showdata['borno_school_blood_group'];
		$dob=$showdata['borno_school_dob'];
		$religion=$showdata['borno_school_religion'];
		$status=$showdata['borno_school_status'];
		$org=$showdata['borno_school_org'];
		$group=$showdata['borno_school_stud_group'];
		$phone=substr($showdata['borno_school_phone'],2,11);
		$photo=$showdata['borno_school_photo'];	
		$eightDigit = $showdata['eight_digit_student_id'];
		if($showdata['borno_school_photo']!=""){
	
	$stphotofina="../student/studentphoto/$photo";
	
	} else {
	
	$stphotofina="../student/studentphoto/nophoto.jpg";
	
	}
	   
	    $pdf->Image("$stphotofina", 165, 18, 30, 30);
		$pdf->Ln();	
		
		$pdf->Cell(40,10,"Student ID",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		if($schId == 33){
		    $pdf->Cell(140,10,$eightDigit,1,0,"L");
		}
		else{
		    $pdf->Cell(140,10,$stdid,1,0,"L");
		}
			
		$pdf->Ln();
		if($schId != 33){
		$pdf->Cell(40,10,"Roll No",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(140,10,$roll,1,0,"L");	
		$pdf->Ln();
		}
		$pdf->Cell(40,10,"Student Name",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(140,10,$name,1,0,"L");	
		$pdf->Ln();
		$pdf->Cell(40,10,"Father's Name",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(140,10,$father,1,0,"L");	
		$pdf->Ln();
		$pdf->Cell(40,10,"Mother's Name",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(140,10,$mother,1,0,"L");	
		$pdf->Ln();
		$pdf->Cell(40,10,"Date of Birth",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(140,10,$dob,1,0,"L");	
		$pdf->Ln();
		$pdf->Cell(40,10,"Blood Group",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(140,10,$blood,1,0,"L");	
		$pdf->Ln();
		$pdf->Cell(40,10,"Religion",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(140,10,$religion,1,0,"L");	
		$pdf->Ln();
		$pdf->Cell(40,10,"Status",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(140,10,$status,1,0,"L");	
		$pdf->Ln();	
		$pdf->Cell(40,10,"Organization",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(140,10,$org,1,0,"L");	
		$pdf->Ln();	
		$pdf->Cell(40,10,"Group",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(140,10,$group,1,0,"L");	
		$pdf->Ln();	
		$pdf->Cell(40,10,"Phone",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(140,10,$phone,1,0,"L");	
		$pdf->Ln();	
		$pdf->Cell(40,10,"Mailing Address",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(140,10,$maddress,1,0,"L");	
		$pdf->Ln();		
		$pdf->Cell(40,10,"Parmanent Address",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(140,10,$paddress,1,0,"L");	
		$pdf->Ln();	
	
$pdf->Output();
?>