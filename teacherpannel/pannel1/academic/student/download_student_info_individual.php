<?php

include('student_top.php');

	$data="select * from borno_teacher_info where borno_teacher_info_id='$stdid'";
					$qdata=$mysqli->query($data);
					$showdata=$qdata->fetch_assoc();
					
		$schId=$showdata['borno_school_id'];
		$branchId=$showdata['borno_school_branch_id'];
		$shiftId=$showdata['borno_school_shift_id'];
		$name=$showdata['borno_teacher_name'];
		$father=$showdata['borno_teachers_father_name'];
		$mother=$showdata['borno_teachers_mother_name'];
		$spouse=$showdata['borno_teachers_spouse_name'];
		$maddress=$showdata['borno_teachers_mailing_address'];
		$paddress=$showdata['borno_teacher_permanent_address'];
		$blood=$showdata['borno_teachers_blood_group'];
		$dob=$showdata['borno_teachers_dob'];
		$religion=$showdata['borno_teachers_religion'];
		$mstatus=$showdata['borno_teachers_marital_status'];
		$org=$showdata['borno_teacher_org_type'];
		$qualification=$showdata['borno_teachers_qualification'];
		$phone=substr($showdata['borno_teacher_phone'],2,11);
		$photo=$showdata['borno_teacher_photo'];	
		$nid=$showdata['borno_teachers_national_id'];
		$pno=$showdata['borno_teachers_passport_no'];
		$email=$showdata['borno_teachers_email_id'];
		$gender=$showdata['borno_teachers_gender'];
		$addate=$showdata['borno_school_admission_date'];
		
		if($showdata['borno_teacher_photo']!=""){
	
	$stphotofina="../../../../bornosky/pannel/academic/teacher/teacherphoto/$photo";
	
	} else {
	
	$stphotofina="../../../../bornosky/pannel/academic/teacher/teacherphoto/nophoto.jpg";
	
	}
	   
		$datedob=date("d-M-Y",strtotime($dob));
		$datedoa=date("d-M-Y",strtotime($addate));	

$gtschoolName="SELECT * FROM borno_school where borno_school_id=$schId";
					$qgtschoolName=$mysqli->query($gtschoolName);
					$sqgtschoolName=$qgtschoolName->fetch_assoc();
$fnschname=$sqgtschoolName['borno_school_name'];

$gtbranch="SELECT * FROM borno_school_branch where borno_school_id=$schId AND borno_school_branch_id=$branchId";
					$qgtbranch=$mysqli->query($gtbranch);
					$sqgtbranch=$qgtbranch->fetch_assoc();
$fnsbranch=$sqgtbranch['borno_school_branch_name'];


$gtshift="SELECT * FROM borno_school_shift where borno_school_shift_id=$shiftId";
					$qgtshift=$mysqli->query($gtshift);
					$sqgtshift=$qgtshift->fetch_assoc();
$fnsshift=$sqgtshift['borno_school_shift_name'];


 
	   
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
    $this->Cell(100,5,"Shift :",0,0,"R");
    $this->Cell(100,5,$GLOBALS['fnsshift'],0,0,"L");
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
$pdf->SetFont('Arial','',12);

   
	   
	   

	   
	  //  $pdf->Image("$stphotofina", 165, 18, 30, 30);
		$pdf->Ln();	
		
		$pdf->Cell(40,10,"Teacher ID",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(140,10,$stdid,1,0,"L");	
		$pdf->Ln();
		$pdf->Cell(40,10,"National ID",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(140,10,$nid,1,0,"L");	
		$pdf->Ln();
		$pdf->Cell(40,10,"Teacher Name",1,0,"L");
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
		$pdf->Cell(40,10,"Spuse Name",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(140,10,$spouse,1,0,"L");	
		$pdf->Ln();
		$pdf->Cell(40,10,"Date of Birth",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(140,10,$datedob,1,0,"L");	
		$pdf->Ln();
		$pdf->Cell(40,10,"Blood Group",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(140,10,$blood,1,0,"L");	
		$pdf->Ln();
		$pdf->Cell(40,10,"Religion",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(140,10,$religion,1,0,"L");	
		$pdf->Ln();
		$pdf->Cell(40,10,"Marital Status",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(140,10,$mstatus,1,0,"L");	
		$pdf->Ln();	
		$pdf->Cell(40,10,"Organization",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(140,10,$org,1,0,"L");	
		$pdf->Ln();	
		$pdf->Cell(40,10,"Mobile No",1,0,"L");
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
	    $pdf->Cell(40,10,"Passport No",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(140,10,$pno,1,0,"L");	
		$pdf->Ln();
		$pdf->Cell(40,10,"email ID",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(140,10,$email,1,0,"L");	
		$pdf->Ln();	
		$pdf->Cell(40,10,"Qualification",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(140,10,$qualification,1,0,"L");	
		$pdf->Ln();	
		$pdf->Cell(40,10,"Gender",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(140,10,$gender,1,0,"L");	
		$pdf->Ln();			

$pdf->Output();
?>