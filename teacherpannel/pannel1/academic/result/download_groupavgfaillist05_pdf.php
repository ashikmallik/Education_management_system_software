<?php

$branchId=$_GET['stbranch'];
$schId=$_GET['schoolId'];
$studClass=$_GET['classId'];
$shiftId=$_GET['shiftId'];
$section=$_GET['sectionId'];
$stsess=$_GET['scsess'];
$term=$_GET['sctermId'];
$group=$_GET['group'];
 
include('../../../connection.php');

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

$gtterm="SELECT * FROM borno_result_add_term where borno_result_term_id=$term";
					$qgtterm=$mysqli->query($gtterm);
					$sqgtterm=$qgtterm->fetch_assoc();
$fnsterm=$sqgtterm['borno_result_term_name'];

$gtschoolName="SELECT * FROM borno_school where borno_school_id=$schId";
					$qgtschoolName=$mysqli->query($gtschoolName);
					$sqgtschoolName=$qgtschoolName->fetch_assoc();
                    $fnschname=$sqgtschoolName['borno_school_name'];
                    
require('../../fpdf/fpdf.php');
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    //$this->Image('logo.png',10,6,30);
    // Arial bold 15
    //$this->SetFont('Arial','B',15);
    // Move to the right
    //$this->Cell(80);
    // Title
    $this->SetFont('Arial','',20);
    $this->Cell(190,5,$GLOBALS['fnschname'],0,1,'C');
    $this->Cell(190,2,'',0,1,'R');
	$this->SetFont('Arial','',14);
	$this->Cell(100,5,"Branch : ",0,0,'R');
	$this->Cell(85,5,$GLOBALS['fnsbranch'],0,0,'L');
	$this->Ln();
	$this->Cell(190,2,'',0,1,'R');
	$this->SetFont('Arial','',15);
	$this->Cell(190,5,"Average Fail List",0,0,'C');
	$this->Ln();
	
	$this->SetFont('Arial','',11);
	$this->Cell(12,5,"Class : ",0,0,'L');
	$this->Cell(15,5,$GLOBALS['fnsclass'],0,0,'L');
	$this->Cell(12,5,"Shift : ",0,0,'L');
	$this->Cell(15,5,$GLOBALS['fnsshift'],0,0,'L');
	$this->Cell(15,5,"Section : ",0,0,'L');
	$this->Cell(40,5,$GLOBALS['fnssection'],0,0,'L');
	$this->Cell(12,5,"Term : ",0,0,'L');
	$this->Cell(40,5,$GLOBALS['fnsterm'],0,0,'L');
	$this->Cell(17,5,"Session : ",0,0,'L');
	$this->Cell(15,5,$GLOBALS['stsess'],0,0,'L');
	$this->Ln();
	$this->SetFont('Arial','B',9);
		$this->Cell(8,5,"SL",1,0,"C");
		$this->Cell(20,5,"Group",1,0,"C");
		$this->Cell(10,5,"Roll",1,0,"C");
		$this->Cell(50,5,"Name",1);
		$this->Cell(20,5,"Grand Total",1,0,"C");
		$this->Cell(15,5,"Fail No",1,0,"C");
		$this->Cell(70,5,"Fail Subject",1,0,"C");
	$this->Ln();
	//$this->Cell(30,10,$GLOBALS['gtSchoolName'],0,1,'C');
    // Line break
    //$this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8

	$this->SetFont('Arial','',8);
	$this->Ln();
	$date=date('d-m-Y');
	$time=date('h:i:s');
	$this->Cell(90,5,"Print Date & Time : $date $time",0,0,"L"); 
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'R');
}
}


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

	$pdf->SetFont('Arial','',9);
			
					$data="select * from borno_school_910group_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='0' AND failno!=0 order by failno asc,grandtotal desc";
					$qdata=$mysqli->query($data);
					while($showdata=$qdata->fetch_assoc()){ $sl++;
					
		
		$roll=$showdata['borno_school_roll'];
		$deptid=$showdata['borno_subject_nine_ten_dept'];
		$techname=$showdata['borno_school_student_name'];
		$grand=$showdata['grandtotal'];
		$gpa=$showdata['failno'];
		$merit=$showdata['fail_subject'];
		if($deptid==1){$groupname="Science";} 
		if($deptid==2){$groupname="Business";} 
		if($deptid==3){$groupname="Humanities";} 
		
					

		$pdf->Cell(8,5,$sl,1,0,"C");
		$pdf->Cell(20,5,$groupname,1,0,"L");
		$pdf->Cell(10,5,$roll,1,0,"C");
		$pdf->Cell(50,5,$techname,1);
		$pdf->Cell(20,5,$grand,1,0,"C");	
		$pdf->Cell(15,5,$gpa,1,0,"C");
		$pdf->Cell(70,5,$merit,1,0,"L");
		$pdf->Ln();
}
$data1="select * from borno_school_910group_avg_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='0' AND failno!=0";
					$qdata1=$mysqli->query($data1);
					$meritno=mysqli_num_rows($qdata1); 
				
		$pdf->Cell(143,5,'',0,0,"C");					
	    $pdf->Cell(35,5,"Total Student : $meritno",0,0,"L");	

$pdf->Output();
?>