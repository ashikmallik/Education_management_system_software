<?php


 $schId=$_GET['schId'];
 $branchId=$_GET['branchId'];
 $examtype=$_GET['gtexamtype'];
 $examyear=$_GET['gtexamyear'];
 $classId=$_GET['classId'];



include('../../../connection.php');
$gtschoolName="SELECT * FROM borno_school where borno_school_id=$schId";
					$qgtschoolName=$mysqli->query($gtschoolName);
					$sqgtschoolName=$qgtschoolName->fetch_assoc();

                    $fnschname=$sqgtschoolName['borno_school_name'];

$gtbranch="SELECT * FROM borno_school_branch where borno_school_id=$schId AND borno_school_branch_id=$branchId";
					$qgtbranch=$mysqli->query($gtbranch);
					$sqgtbranch=$qgtbranch->fetch_assoc();
$fnsbranch=$sqgtbranch['borno_school_branch_name'];

$gtclass="SELECT * FROM borno_school_class where borno_school_class_id=$classId";
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
  
	$this->Cell(200,5,$GLOBALS['fnschname'],0,0,'C');
    // Line break
    $this->Ln();
    $this->SetFont('Arial','',14);
    $this->Cell(100,5,"Branch :",0,0,"R");
    $this->Cell(100,5,$GLOBALS['fnsbranch'],0,0,"L");
    $this->Ln();
     $this->SetFont('Arial','',12);
    $this->Cell(190,5,"Exam Routine Class Wise ",0,0,"C");
    $this->Ln();
    $this->SetFont('Arial','',11);
    $this->Cell(12,5,'Class :',0,0,'L');
    $this->Cell(18,5,$GLOBALS['fnsclass'],0,0,'L');
    $this->SetFont('Arial','',11);
    $this->Cell(70,5,'Exam Type :',0,0,'R');
    $this->Cell(70,5,$GLOBALS['examtype'],0,0,'L');
    
    $this->SetFont('Arial','',11);
    $this->Cell(7,5,'Exam Year :',0,0,'R');
    $this->Cell(7,5,$GLOBALS['examyear'],0,0,'L');
    
    $this->Ln();
    $this->SetFont('Arial','',10);
        $this->Cell(40,5,"Exam Date",1,0,"C");
		$this->Cell(40,5,"Exam day",1,0,'C');
		$this->Cell(70,5,"Subject Name",1,0,'C');
		$this->Cell(40,5,"Exam Time",1,0,'C');
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


  $data="Select * from borno_school_exam_routine where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_exam_term_name='$examtype' AND borno_exam_term_year='$examyear' AND borno_school_exam_routine_class='$classId' order by borno_school_exam_routine_date asc";
	

$sl=0;
					$qdata=$mysqli->query($data);
					while($showdata=$qdata->fetch_assoc()){ $sl++;

		             $examdate=$showdata['borno_school_exam_routine_date'];
		    $day=$showdata['borno_school_exam_routine_day'];
		  $subject=$showdata['borno_school_exam_routine_subject'];
		  $timefrom=$showdata['borno_school_exam_routine_time_from'];
		        $timeto=$showdata['borno_school_exam_routine_time_to'];
		               
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(40,7,$examdate,1,0,"C");
		$pdf->Cell(40,7,$day,1,0,"C");
		$pdf->Cell(70,7,$subject,1,0,"C");
		$pdf->Cell(40,7,"$timefrom - $timeto",1,0,"C");
	$pdf->Ln();

		



}
	

$pdf->Output();
?>