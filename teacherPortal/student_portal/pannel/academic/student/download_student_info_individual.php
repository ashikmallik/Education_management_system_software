<?php

include('student_top.php');

 	$data="select * from borno_student_info where borno_student_info_id='$stdid'";


					$qdata=$mysqli->query($data);
					$showdata=$qdata->fetch_assoc();
					
		$schId=$showdata['borno_school_id'];
		$studClass=$showdata['borno_school_class_id'];
		$shiftId=$showdata['borno_school_shift_id'];
		$section=$showdata['borno_school_section_id'];
		$stsess=$showdata['borno_school_session'];
		$roll=$showdata['borno_school_roll'];
		$name=$showdata['borno_school_student_name'];
		$father=$showdata['borno_school_father_name'];
		$mother=$showdata['borno_school_mother_name'];
		$maddress=$showdata['borno_school_address'];
		$paddress=$showdata['borno_school_permanentaddress'];
		$blood=$showdata['borno_school_blood_group'];
		$dob=$showdata['borno_school_dob'];
		$gender=$showdata['borno_school_gender'];
		$religion=$showdata['borno_school_religion'];
		$status=$showdata['borno_school_status'];
		$org=$showdata['borno_school_org'];
		$stdgroup=$showdata['borno_school_stud_group'];
		
			  if($stdgroup=='1') { $stdgroupname= "Science";} 
	  elseif ($stdgroup=='2') { $stdgroupname= "Business Studies";}
	    elseif ($stdgroup=='3') { $stdgroupname= "Humanities";}
		else { $stdgroupname= "N/A";}
		
		$phone=substr($showdata['borno_school_phone'],2,11);
		$photo=$showdata['borno_school_photo'];	
		$fphoto=$showdata['borno_school_fphoto'];	
		$mphoto=$showdata['borno_school_mphoto'];	
		$phonem=substr($showdata['borno_school_mother_phone'],2,11);	
		if($showdata['borno_school_photo']!=""){
	
	$stphotofina="../../../../pannel/academic/student/studentphoto/$photo";
	
	} else {
	
	$stphotofina="../../../../pannel/academic/student/studentphoto/nophoto.jpg";
	
	}
	
		if($showdata['borno_school_fphoto']!=""){
	
	$fatherphoto="../../../../pannel/academic/student/fatherphoto/$fphoto";
	
	} else {
	
	$fatherphoto="../../../../pannel/academic/student/fatherphoto/nophoto.jpg";
	
	}	
	
		if($showdata['borno_school_mphoto']!=""){
	
	$motherphoto="../../../../pannel/academic/student/motherphoto/$mphoto";
	
	} else {
	
	$motherphoto="../../../../pannel/academic/student/motherphoto/nophoto.jpg";
	
	}	
	   
		$datedob=date("d-M-Y",strtotime($dob));
		$datedoa=date("d-M-Y",strtotime($addate));	

$gtschoolName="SELECT * FROM borno_school where borno_school_id=$schId";
					$qgtschoolName=$mysqli->query($gtschoolName);
					$sqgtschoolName=$qgtschoolName->fetch_assoc();
$fnschname=$sqgtschoolName['borno_school_name'];
$fnaddress=$sqgtschoolName['borno_school_address'];

	$gtschoolLogo=$sqgtschoolName['borno_school_logo'];
	if($gtschoolLogo!=""){
	
	$finalSchoolLogo="../../../../pannel/academic/infosett/school-logo/$gtschoolLogo";
	
	} else {
		$finalSchoolLogo="../../../../pannel/academic/infosett/school-logo/nologo.png";
		}


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

$banner="border-img.JPG";
$pageboder="page_border.JPG";
require('../../fpdf/fpdf.php');
class PDF extends FPDF
{
// Page header
function Header()
{
 	$pageboder1=$GLOBALS['pageboder'];
  
    $this->Image($pageboder1,3,1,205,297);   
    
$finalSchoolLogo1=$GLOBALS['finalSchoolLogo'];

$this->Image($finalSchoolLogo1,15,5,20,20);	
$this->Ln();

    $this->Ln();
    $this->SetFont('Arial','B',18);
    $this->Cell(190,5,$GLOBALS['fnschname'],0,0,"C");
        $this->Ln();
         $this->Ln();
    $this->SetFont('Arial','B',14);
    $this->Cell(190,5,$GLOBALS['fnaddress'],0,0,"C");

     $this->Ln();
      $this->Ln();
    $this->SetFont('Arial','',14);
    $this->Cell(190,5,"Student Information",0,0,"C");
    
    $this->Ln();
        $this->SetTextColor(0,0,0);
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



$pdf->Image("$banner", 165.5, 39.5, 30, 25);
$pdf->Image("$banner", 165.5, 67, 30, 25);
$pdf->Image("$banner", 165.5, 94, 30, 25);

	  $pdf->Image("$stphotofina", 166.5, 40.5, 28, 23.5);
	  $pdf->Image("$fatherphoto", 166.5, 68.5, 28, 23);
	  $pdf->Image("$motherphoto", 166.5, 95.5, 28, 23);

		$pdf->Cell(50,10,"Student ID",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(100,10,$stdid,1,0,"L");	
		$pdf->Ln();
	
		$pdf->Cell(50,10,"Class Name",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(100,10,$fnsclass,1,0,"L");	
		$pdf->Ln();
		$pdf->Cell(50,10,"Shift Name",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(100,10,$fnsshift,1,0,"L");	
		$pdf->Ln();
		$pdf->Cell(50,10,"Section Name",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(100,10,$fnssection,1,0,"L");	
		$pdf->Ln();
		$pdf->Cell(50,10,"Session",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(100,10,$stsess,1,0,"L");	
		$pdf->Ln();
		$pdf->Cell(50,10,"Student Name",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(100,10,$name,1,0,"L");	
		$pdf->Ln();
		$pdf->Cell(50,10,"Father's Name",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(100,10,$father,1,0,"L");	
		$pdf->Ln();
		$pdf->Cell(50,10,"Mother's Name",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(100,10,$mother,1,0,"L");	
		$pdf->Ln();
		$pdf->Cell(50,10,"Date of Birth",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(130,10,$datedob,1,0,"L");	
		$pdf->Ln();
		$pdf->Cell(50,10,"Gender",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(130,10,$gender,1,0,"L");	
		$pdf->Ln();
		$pdf->Cell(50,10,"Blood Group",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(130,10,$blood,1,0,"L");	
		$pdf->Ln();
		$pdf->Cell(50,10,"Religion",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(130,10,$religion,1,0,"L");	
		$pdf->Ln();
		$pdf->Cell(50,10,"Status",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(130,10,$status,1,0,"L");	
		$pdf->Ln();	
		$pdf->Cell(50,10,"Group Name",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(130,10,$stdgroupname,1,0,"L");	
		$pdf->Ln();	
		$pdf->Cell(50,10,"Roll No",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(130,10,$roll,1,0,"L");	
		$pdf->Ln();
		$pdf->Cell(50,10,"Contact No",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(130,10,$phone,1,0,"L");	
		$pdf->Ln();	

		$pdf->Cell(50,10,"Mailing Address",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(130,10,$maddress,1,0,"L");	
		$pdf->Ln();		
		$pdf->Cell(50,10,"Parmanent Address",1,0,"L");
		$pdf->Cell(5,10,":",1,0,"C");
		$pdf->Cell(130,10,$paddress,1,0,"L");	
		$pdf->Ln();	
	
$pdf->Output();
?>