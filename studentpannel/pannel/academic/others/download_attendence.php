<?php

include('others_top.php');

 $fdate=$_POST['datepicker'];
 $tdate=$_POST['datepicker1'];
 $stdid=$_POST['stdid'];






  $gtschoolName1 ="select * from borno_student_info  where borno_student_info_id=$stdid";
					$qgstschool=$mysqli->query($gtschoolName1);
					$shsch=$qgstschool->fetch_assoc();
                    $schId=$shsch['borno_school_id'];
                    $studClass=$shsch['borno_school_class_id'];
		            $shiftId=$shsch['borno_school_shift_id'];
	            	$section=$shsch['borno_school_section_id'];
	            	$stsess=$shsch['borno_school_session'];
	            	$roll=$shsch['borno_school_roll'];
	            	$name=$shsch['borno_school_student_name'];



 $gtschoolName ="select * from borno_school where borno_school_id=$schId";
					$qgstschoolName=$mysqli->query($gtschoolName);
					$shschname=$qgstschoolName->fetch_assoc();
                  $fnschname=$shschname['borno_school_name'];
                  


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
    $this->SetFont('Arial','B',16);
    // Move to the right
    //$this->Cell(80);
    // Title
 // $this->SetTextColor(0,0,255);
	$this->Cell(200,5,$GLOBALS['fnschname'],0,1,'C');

      $this->Ln();
    $this->SetFont('Arial','',14);
    $this->Cell(200,5,"Attendence Report",0,0,"C");

$this->Ln();
$this->Ln();
$this->SetFont('Arial','B',10);
$this->Cell(80,5,"Date From : ",0,0,"R");
$this->SetFont('Arial','B',10);
$this->Cell(20,5,$GLOBALS['fdate'],0,0,"L");
$this->SetFont('Arial','B',10);
$this->Cell(17,5,"Date To : ",0,0,"L");
$this->SetFont('Arial','B',10);
$this->Cell(90,5,$GLOBALS['tdate'],0,0,"L");

$this->Ln();
$this->Ln();
   $this->SetFont('Arial','B',10);
$this->Cell(30,5,"Student Name  : ",0,0,"L");
$this->Cell(20,5,$GLOBALS['name'],0,1,'L');


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


$fdate=date("Y-m-d",strtotime($fdate));
$tdate=date("Y-m-d",strtotime($tdate));

  $result ="select * from  	borno_sent_sms  where borno_sms_date between '$fdate' AND '$tdate' AND borno_student_info_id=$stdid Order by borno_sms_date asc";
 
		$qresult=$mysqli->query($result);
		while($shgresult=$qresult->fetch_assoc()){
		    
		    $shabdate=$shgresult['borno_sms_date'];
		    $abdate=date("d-m-Y",strtotime($shabdate));


$pdf->SetFont('Arial','',12);

		
		$pdf->Cell(30,10,"Class",1,0,"C");
		$pdf->Cell(40,10,"Shift",1,0,"C");
		$pdf->Cell(40,10,"Section",1,0,"C");
		$pdf->Cell(20,10,"Roll",1,0,"C");
		$pdf->Cell(60,10,"Absent date",1,0,"C");
		$pdf->Ln();
		$pdf->Cell(30,10,"$fnsclass",1,0,"C");	
		$pdf->Cell(40,10,"$fnsshift",1,0,"C");
		$pdf->Cell(40,10,"$fnssection",1,0,"C");
		$pdf->Cell(20,10,"$roll",1,0,"C");
		$pdf->Cell(60,10,"$abdate",1,0,"C");

	   
	   
}
	   
	  	
		$pdf->Ln();	
	
$pdf->Output();
?>