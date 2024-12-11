<?php

 $branchId=$_GET['stbranch'];
  $schId=$_GET['schoolId'];
  $studClass=$_GET['classId'];
  $shiftId=$_GET['shiftId'];
  $section=$_GET['sectionId'];
  $stsess=$_GET['scsess'];
   $gttermId=$_GET['sctermId'];
   $dept=$_GET['dept'];
     $styear=$_GET['styear']; 
include('../../../../connection.php');
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

 $gtsection="select * from borno_result_add_term where borno_school_id=$schId AND borno_school_class_id=$studClass AND borno_school_session='$stsess' AND borno_result_term_id='$gttermId'";
					$qgtsection=$mysqli->query($gtsection);
					$sqgtsection=$qgtsection->fetch_assoc();
$fnschname1=$sqgtsection['borno_result_term_name'];

 $gtmaxroll="select * from borno_student_info where borno_school_section_id='$section' AND borno_school_session='$stsess' order by borno_school_roll desc limit 0,1";
					$qgtmaxroll=$mysqli->query($gtmaxroll);
					$sqgtmaxroll=$qgtmaxroll->fetch_assoc();
$maxroll=$sqgtmaxroll['borno_school_roll'];
$maxroll1=$maxroll+1;

$gtminroll="select * from borno_student_info where borno_school_section_id='$section' AND borno_school_session='$stsess' order by borno_school_roll asc limit 0,1";
					$qgtminroll=$mysqli->query($gtminroll);
					$sqgtminroll=$qgtminroll->fetch_assoc();
$minroll=$sqgtminroll['borno_school_roll'];

if($dept==1){$deptname="Science";}
elseif($dept==2){$deptname="Business Studies";}
elseif($dept==3){$deptname="Humanities";}

$banner1="Class : $fnsclass   Shift : $fnsshift   Section : $fnssection   Group : $deptname";
$banner2="Term : $fnschname1   Exam Year : $styear   Session : $stsess   Subject Name :";

require('../../../fpdf/fpdf.php');
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
    $this->Cell(200,5,"Number Sheet",0,0,"C");

    $this->Ln();

    $this->SetFont('Arial','',11);
    $this->Cell(200,5,$GLOBALS['banner1'],0,0,'C');
    $this->Ln();
    $this->Cell(200,5,$GLOBALS['banner2'],0,0,'L');
    $this->Ln();    
    $this->SetFont('Arial','',10);
        $this->Cell(15,5,"Roll No",1,0,"C");
		$this->Cell(70,5,"Student Name",1);
		$this->Cell(25,5,'Creative',1,0,'C');
		$this->Cell(25,5,'MCQ',1,0,'C');
		$this->Cell(25,5,'Practical',1,0,'C');
		$this->Cell(25,5,'CA',1,0,'C');
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

				$data="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_school_stud_group='$dept' AND borno_school_roll between '$minroll' AND '$maxroll' order by borno_school_roll asc";
$sl=0;
					$qdata=$mysqli->query($data);
					while($showdata=$qdata->fetch_assoc()){ $sl++;
		             $stroll=$showdata['borno_school_roll'];
		             $stName=$showdata['borno_school_student_name'];
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(15,5,$stroll,1,0,"C");
		$pdf->Cell(70,5,$stName,1);
		$pdf->Cell(25,5,'',1);
		$pdf->Cell(25,5,'',1);
		$pdf->Cell(25,5,'',1);
		$pdf->Cell(25,5,'',1);

		
$pdf->Ln();


}

$pdf->Cell(40,5,"Teacher's Name :",0,0,"L");
$pdf->Ln();
$pdf->Cell(40,1,'',0,5,"L");
$pdf->Cell(40,5,"Teacher's Mobile No :",0,0,"L");
$pdf->Ln();
$pdf->Output();
?>