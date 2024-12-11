<?php

		$schId=$_GET['schId'];
		$branchId = $_GET['branchId'];
		$studClass = $_GET['studClass'];
		$shiftId = $_GET['shiftId'];
		$section = $_GET['section'];
		$stsess = $_GET['stsess'];
		$exam = $_GET['exam'];

include('../../../connection.php');

$gtschoolName="SELECT * FROM borno_school where borno_school_id='$schId'";
					$qgtschoolName=$mysqli->query($gtschoolName);
					$sqgtschoolName=$qgtschoolName->fetch_assoc();
$fnschname=$sqgtschoolName['borno_school_name'];


$gtclass="SELECT * FROM borno_school_class where borno_school_class_id='$studClass'";
					$qgtclass=$mysqli->query($gtclass);
					$sqgtclass=$qgtclass->fetch_assoc();
$fnsclass=$sqgtclass['borno_school_class_name'];

$gtshift="SELECT * FROM borno_school_shift where borno_school_shift_id='$shiftId'";
					$qgtshift=$mysqli->query($gtshift);
					$sqgtshift=$qgtshift->fetch_assoc();
$fnsshift=$sqgtshift['borno_school_shift_name'];

$gtsection="SELECT * FROM borno_school_section where borno_school_section_id='$section'";
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
  
	$this->Cell(280,5,$GLOBALS['fnschname'],0,1,'C');
    // Line break
    $this->Ln();
    $this->SetFont('Arial','',14);
    $this->Cell(280,5,"Testimonial List",0,0,"C");

    $this->Ln();
    $this->SetFont('Arial','',11);
    $this->Cell(12,5,'Class : ',0,0,'L');
    $this->Cell(18,5,$GLOBALS['fnsclass'],0,0,'L');
    $this->Cell(12,5,'Shift : ',0,0,'L');
    $this->Cell(18,5,$GLOBALS['fnsshift'],0,0,'L');
    $this->Cell(15,5,'Section : ',0,0,'L');
    $this->Cell(65,5,$GLOBALS['fnssection'],0,0,'L');
    $this->Cell(30,5,'Passing Year : ',0,0,'L');
    $this->Cell(30,5,$GLOBALS['stsess'],0,0,'L');
	 $this->Cell(25,5,'Exam Name : ',0,0,'L');
    $this->Cell(15,5,$GLOBALS['exam'],0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',10);
    	$this->Cell(10,5,'SL',1,0,"C");
		$this->Cell(10,5,'Roll',1,0,"C");
		$this->Cell(60,5,"Student Name",1);
		$this->Cell(60,5,"Father's Name",1);
		$this->Cell(50,5,"Mother's Name",1);
		$this->Cell(25,5,"Date of Birth",1,0,"C");
		$this->Cell(20,5,"Roll No",1,0,"C");
		$this->Cell(30,5,"Reg: No",1,0,"C");
		$this->Cell(15,5,'GPA',1,0,"C");

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
$pdf->AddPage('L');


				$data="select * from borno_school_testimonial where borno_school_id='$schId'  AND borno_school_exam='$exam' AND borno_school_passing_year='$stsess' AND borno_school_class_id= '$studClass' AND borno_school_shift_id= '$shiftId' AND borno_school_section_id= '$section' order by borno_school_roll asc";

					$qdata=$mysqli->query($data);
					$sl=0;
					while($showdata=$qdata->fetch_assoc()){ $sl++;
					$stdntid=$showdata['borno_student_info_id'];
					$board=$showdata['borno_school_board'];
					$session=$showdata['borno_school_exam_session'];
					$roll=$showdata['borno_school_board_roll'];
					$reg=$showdata['borno_school_reg'];
					$gpa=$showdata['borno_school_gpa'];

		
	$data1="select * from borno_student_info where borno_student_info_id='$stdntid' ";

					$qdata1=$mysqli->query($data1);
					$showdata1=$qdata1->fetch_assoc();
		$stdntid=$showdata1['borno_student_info_id'];
		$rollno=$showdata1['borno_school_roll'];
		$techname=$showdata1['borno_school_student_name'];
		$fname=$showdata1['borno_school_father_name'];
		$mname=$showdata1['borno_school_mother_name'];
		$dob=$showdata1['borno_school_dob'];	
		$group=$showdata1['borno_school_group'];

		
					

		$pdf->Cell(10,5,$sl,1,0,"C");
		$pdf->Cell(10,5,$rollno,1,0,"C");
		$pdf->Cell(60,5,$techname,1);
		$pdf->Cell(60,5,$fname,1);
		$pdf->Cell(50,5,$mname,1);
		$pdf->Cell(25,5,$dob,1,0,"C");
		$pdf->Cell(20,5,$roll,1,0,"C");	
		$pdf->Cell(30,5,$reg,1,0,"C");
		$pdf->Cell(15,5,$gpa,1,0,"C");
		   $pdf->Ln();
}



$pdf->Output();
?>