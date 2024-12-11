<?php

$branchId=$_GET['branchId'];
$schId=$_GET['schoolId'];
$studClass=$_GET['studClass'];
$shiftId=$_GET['shiftId'];
$section=$_GET['section'];
$stsess=trim($_GET['stsess']);

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

 $gtminroll="select * from borno_student_info where borno_school_section_id=$section AND borno_school_session='$stsess' order by borno_school_roll asc limit 0,1";
					$qgtminroll=$mysqli->query($gtminroll);
					$sqgtminroll=$qgtminroll->fetch_assoc();
 $minroll=$sqgtminroll['borno_school_roll'];

$gtmaxroll="select * from borno_student_info where borno_school_section_id=$section AND borno_school_session='$stsess' order by borno_school_roll desc limit 0,1";
					$qgtmaxroll=$mysqli->query($gtmaxroll);
					$sqgtmaxroll=$qgtmaxroll->fetch_assoc();
$maxroll=$sqgtmaxroll['borno_school_roll'];
$maxroll1=$maxroll+1;
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
   // $this->SetFont('Arial','',14);
   // $this->Cell(100,5,"Branch :",0,0,"R");
   // $this->Cell(100,5,$GLOBALS['fnsbranch'],0,0,"L");
   // $this->Ln();
    $this->SetFont('Arial','',16);
    $this->Cell(200,5,'Student Info For Id Card',0,5,"C");
    $this->Ln();
    $this->SetFont('Arial','',11);
    $this->Cell(12,5,'Class : ',0,0,'L');
    $this->Cell(40,5,$GLOBALS['fnsclass'],0,0,'L');
    $this->Cell(12,5,'Shift : ',0,0,'L');
    $this->Cell(40,5,$GLOBALS['fnsshift'],0,0,'L');
    $this->Cell(15,5,'Section : ',0,0,'L');
    $this->Cell(40,5,$GLOBALS['fnssection'],0,0,'L');
    $this->Cell(18,5,'Session : ',0,0,'L');
    $this->Cell(40,5,$GLOBALS['stsess'],0,0,'L');
    $this->Ln();
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
$data= mysqli_query($mysqli,"select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_school_roll between '$minroll' AND '$maxroll' order by borno_school_roll asc");
foreach($data as $info){
       
        $rollno1=$info['borno_school_roll'];
		$stName1=$info['borno_school_student_name'];
		$stdphone1=$info['borno_school_phone'];
		$fname1=$info['borno_school_father_name'];
		$mname1=$info['borno_school_mother_name'];
		$dob1=$info['borno_school_dob'];	
		$blg1=$info['borno_school_blood_group'];	 
		$stid1=$info['borno_student_info_id'];
		
    $pdf->SetFont('Arial','',13);
    	$pdf->Cell(40,5,"Student ID",0);
    	$pdf->Cell(58,5,": $stid1",0);
		$pdf->Ln();
		$pdf->Cell(40,5,"Student Name",0);
		$pdf->Cell(58,5,": $stName1",0);
		$pdf->Ln();
		$pdf->Cell(40,5,"Student Roll",0);
		$pdf->Cell(58,5,": $rollno1",0);
		$pdf->Ln();
		$pdf->Cell(40,5,"Father Name",0);
		$pdf->Cell(117,5,": $fname1",0);
		$pdf->Cell(58,5,"Photo",0);
		$pdf->Ln();
		$pdf->Cell(40,5,"Mother Name",0);
		$pdf->Cell(58,5,": $mname1",0);
		$pdf->Ln();
		$pdf->Cell(40,5,"Phone Number",0);
		$pdf->Cell(58,5,": $stdphone1",0);
		$pdf->Ln();
		$pdf->Cell(40,5,"Date of Birth",0);
		$pdf->Cell(58,5,":$dob1",0);
		$pdf->Ln();
		$pdf->Cell(40,5,"Blood Group",0);
		$pdf->Cell(105,5,": $blg1",0);

		$pdf->Cell(40,-35,"",1,0,"C");
		$pdf->Ln();
		$pdf->AddPage();
    
}
$pdf->Output();
?>

































