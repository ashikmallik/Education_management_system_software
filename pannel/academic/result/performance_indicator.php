<?php
$schId=$_GET['schId'];
$studClass=$_GET['studClass'];
$shiftId=$_GET['shiftId'];
$section=$_GET['section'];
$stsess=$_GET['stsess'];
//$CurrentDate = ;

include('../../../connection.php');
					$gtschoolName="SELECT * FROM borno_school where borno_school_id= '$schId'";
					$qgtschoolName=$mysqli->query($gtschoolName);
					$sqgtschoolName=$qgtschoolName->fetch_assoc();
$fnschname=$sqgtschoolName['borno_school_name'];
$fnshead=$sqgtschoolName['borno_school_head'];
$address = $sqgtschoolName['borno_school_address'];

	$gtschoolLogo=$sqgtschoolName['borno_school_logo'];
	if($gtschoolLogo!=""){
	
	$finalSchoolLogo="../infosett/school-logo/$gtschoolLogo";
	
	} else {
		$finalSchoolLogo="../infosett/school-logo/nologo.png";
		}
		


$gtschoolsignature=$sqgtschoolName['signature'];
	if($gtschoolsignature!=""){
	
	$finalgtschoolsignature="../teacher/signature/$gtschoolsignature";
	
	} else {
		$finalgtschoolsignature="../teacher/signature/nophoto.jpg";
		}
		


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

$gtterm="SELECT * FROM borno_result_add_term where borno_result_term_id='$term'";
					$qgtterm=$mysqli->query($gtterm);
					$sqgtterm=$qgtterm->fetch_assoc();
$fnsterm=$sqgtterm['borno_result_term_name'];



$gtstotalday ="select * from borno_school_schooling_day where borno_school_class_id='$studClass'  AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term'";
	                $qggtstotalday=$mysqli->query($gtstotalday);
					$stgqggtstotalday=$qggtstotalday->fetch_assoc();
					$schoolingday=$stgqggtstotalday['borno_school_schooling_day'];
					$publish=$stgqggtstotalday['borno_school_publish_date'];
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
  
	//$this->Cell(30,10,$GLOBALS['gtSchoolName'],0,1,'C');
    // Line break
    //$this->Ln(20);
	
	$finalSchoolLogo1=$GLOBALS['finalSchoolLogo'];
  
    $this->Image($finalSchoolLogo1,9,5,25,25);
	
	
}

// Page footer
function Footer()
{
    
	$finalgtschoolsignature1=$GLOBALS['finalgtschoolsignature'];
  
    $this->Image($finalgtschoolsignature1,220,187,30,10);
	
	// Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','',14);
    // Page number
	$this->Cell(90,1,"----------------------------",0,0,"C"); 
	$this->Cell(90,1,"-------------------------------------",0,0,"C"); 
	
	$this->Cell(90,1,"---------------------------------------",0,0,"C"); 
	$this->Ln();
	$this->Cell(90,5,"Guardian's Signature",0,0,"C"); 
	

$this->Cell(90,5,"Class Teacher's Signature",0,0,"C");
	
	
	$this->Cell(45,5,$GLOBALS['fnshead'],0,0,"R");
	$this->Cell(45,5," Signature",0,0,"L"); 
	$this->SetFont('Arial','',8);
	$this->Ln();
	$this->Cell(20,5,"Publish Date : ",0,0,"L"); 
//	$this->Cell(90,5,"10/06/22",0,0,"L"); 
$this->Cell(90,5,$GLOBALS['publish'],0,0,"L"); 
   // $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L');

  $result23 ="select * from `borno_student_info` where borno_school_class_id='$studClass'  AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess'  order by borno_school_roll asc";
$snl=0;
					$qgresult23=$mysqli->query($result23);
					while($row23=$qgresult23->fetch_assoc()){ $snl++;

					$gtstotal111=$row23['borno_school_roll'];
                    $gtstdid=$row23['borno_student_info_id'];

   

//----------------- School Name ------------------------------------------------------------------
$pdf->SetFont('Arial','',20);
$pdf->Cell(220,4,$fnschname,0,0,"C");
$pdf->Cell(220,2,"",0,0,"C");
$pdf->SetFont('Arial','',7);  
$pdf->Cell(60,6,"",1,0,"C");

$pdf->Ln();

$pdf->SetFont('Arial','',14);
$pdf->Cell(220,8,"$address",0,0,"C");




	$pdf->Ln();
 


//----------------- Branch Name ------------------------------------------------------------------








//	$pdf->Ln();
	$pdf->Ln(3);
	
	
	
 $gtstname ="select * from borno_student_info where borno_student_info_id='$gtstdid'";

$pdf->SetFont('Arial','',12);
					$qgtstname=$mysqli->query($gtstname);
					$stgtstname=$qgtstname->fetch_assoc();
$fstname=$stgtstname['borno_school_student_name'];
$pdf->Cell(20,10,"",10,0,"L");
$pdf->Cell(70,10,"Name : $fstname",10,0,"L");
$pdf->Cell(15,10,"Class :",0,0,"L");
$pdf->SetFont('Arial','I',10);
$pdf->Cell(25,10,$fnsclass,0,0,"L");
$pdf->SetFont('Arial','',10);
$pdf->Cell(10,10,"Roll :",0,0,"L");
$pdf->SetFont('Arial','I',10);
$pdf->Cell(25,10,$gtstotal111,0,0,"L");
$pdf->SetFont('Arial','',10);
$pdf->Cell(10,10,"Shift :",0,0,"L");
$pdf->SetFont('Arial','I',10);
$pdf->Cell(25,10,$fnsshift,0,0,"L");
$pdf->SetFont('Arial','',10);
$pdf->Cell(15,10,"Section :",0,0,"L");
$pdf->SetFont('Arial','I',10);
$pdf->Cell(25,10,$fnssection,0,0,"L");

$pdf->Ln();
$pdf->Cell(20,4,"",10,0,"L");
$pdf->SetFont('Arial','B',11);

$sq="sq.jpg";
$ci="ci.jpg";
$tr="tr.jpg";

$pdf->Cell(220,6,"Level of performance : 1.Elementary         2.Intermediate         3.Expert",10,0,"C");

			        $pdf->Image("$sq", 143, 37.5, 6, 6);
                    $pdf->Image("$ci", 179, 37.5, 6, 6);
                    $pdf->Image("$tr", 205, 37.5, 6, 6);
$pdf->Ln();
	$pdf->SetFont('Arial','U',13);  
$pdf->Cell(220,5,'Performance Indicator',0,0,"C"); 
$pdf->Ln();

if($studClass == 5){
$pdf->SetFont('Arial','',10);
$pdf->Cell(60,12,"Bangla",1);
$pdf->Cell(20,6,"PI",1,0,"C");
$pdf->Cell(23,6,"6.1.1",1,0,"C");
$pdf->Cell(23,6,"6.1.2",1,0,"C");
$pdf->Cell(23,6,"6.2.1",1,0,"C");
$pdf->Cell(23,6,"6.2.2",1,0,"C");
$pdf->Cell(23,6,"6.3.1",1,0,"C");
$pdf->Cell(23,6,"6.3.2",1,0,"C");
$pdf->Cell(23,6,"6.3.3",1,0,"C");
$pdf->Cell(23,6,"6.4.1",1,0,"C");
//$pdf->Cell(20,6,"",1,0,"C");
$pdf->Ln();
$pdf->Cell(60,6,"",0);
$pdf->Cell(20,6,"PS",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
//$pdf->Cell(20,6,"",1,0,"C");

	                $stphotofina ="singel.png";
	                
	                

			        $pdf->Image("$stphotofina", 98, 54.7, 8, 6);
                    $pdf->Image("$stphotofina", 120, 54.7, 8, 6);
                    $pdf->Image("$stphotofina", 142, 54.7, 8, 6);
                    $pdf->Image("$stphotofina", 166, 54.7, 8, 6);
                    $pdf->Image("$stphotofina", 190, 54.7, 8, 6);
                    $pdf->Image("$stphotofina", 211, 54.7, 8, 6);
                    $pdf->Image("$stphotofina", 234, 54.7, 8, 6);
                    $pdf->Image("$stphotofina", 256, 54.7, 8, 6);

$pdf->Ln();
$pdf->Cell(60,12,"Eglish",1);
$pdf->Cell(20,6,"PI",1,0,"C");
$pdf->Cell(23,6,"6.1.1",1,0,"C");
$pdf->Cell(23,6,"6.2.2",1,0,"C");
$pdf->Cell(23,6,"6.4.1",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Ln();
$pdf->Cell(60,6,"",0);
$pdf->Cell(20,6,"PS",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
			        $pdf->Image("$stphotofina", 98, 66.5, 8, 6);
                    $pdf->Image("$stphotofina", 120, 66.5, 8, 6);
                    $pdf->Image("$stphotofina", 142, 66.5, 8, 6);

$pdf->Ln();
$pdf->Cell(60,12,"Mathematics",1);
$pdf->Cell(20,6,"PI",1,0,"C");
$pdf->Cell(23,6,"6.1.1",1,0,"C");
$pdf->Cell(23,6,"6.1.2",1,0,"C");
$pdf->Cell(23,6,"6.2.1",1,0,"C");
$pdf->Cell(23,6,"6.3.1",1,0,"C");
$pdf->Cell(23,6,"6.3.2",1,0,"C");
$pdf->Cell(23,6,"6.4.1",1,0,"C");
$pdf->Cell(23,6,"6.7.1",1,0,"C");
$pdf->Cell(23,6,"6.7.2",1,0,"C");
$pdf->Ln();
$pdf->Cell(60,6,"",0);
$pdf->Cell(20,6,"PS",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");

			        $pdf->Image("$stphotofina", 98, 78.5, 8, 6);
                    $pdf->Image("$stphotofina", 120, 78.5, 8, 6);
                    $pdf->Image("$stphotofina", 142, 78.5, 8, 6);
                    $pdf->Image("$stphotofina", 166, 78.5, 8, 6);
                    $pdf->Image("$stphotofina", 190, 78.5, 8, 6);
                    $pdf->Image("$stphotofina", 211, 78.5, 8, 6);
                    $pdf->Image("$stphotofina", 234, 78.5, 8, 6);
                    $pdf->Image("$stphotofina", 256, 78.5, 8, 6);
$pdf->Ln();
$pdf->Cell(60,12,"Science",1);
$pdf->Cell(20,6,"PI",1,0,"C");
$pdf->Cell(23,6,"6.1.1",1,0,"C");
$pdf->Cell(23,6,"6.4.1",1,0,"C");
$pdf->Cell(23,6,"6.10.1",1,0,"C");
$pdf->Cell(23,6,"6.10.2",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Ln();
$pdf->Cell(60,6,"",0);
$pdf->Cell(20,6,"PS",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
			        $pdf->Image("$stphotofina", 98, 90.5, 8, 6);
                    $pdf->Image("$stphotofina", 120, 90.5, 8, 6);
                    $pdf->Image("$stphotofina", 142, 90.5, 8, 6);
                    $pdf->Image("$stphotofina", 166, 90.5, 8, 6);

$pdf->Ln();
$pdf->Cell(60,12,"History & Social Science",1);
$pdf->Cell(20,6,"PI",1,0,"C");
$pdf->Cell(23,6,"6.1.1",1,0,"C");
$pdf->Cell(23,6,"6.1.2",1,0,"C");
$pdf->Cell(23,6,"6.1.3",1,0,"C");
$pdf->Cell(23,6,"6.2.1",1,0,"C");
$pdf->Cell(23,6,"6.3.1",1,0,"C");
$pdf->Cell(23,6,"6.4.1",1,0,"C");
$pdf->Cell(23,6,"6.5.1",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Ln();
$pdf->Cell(60,6,"",0);
$pdf->Cell(20,6,"PS",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
			        $pdf->Image("$stphotofina", 98, 102.5, 8, 6);
                    $pdf->Image("$stphotofina", 120, 102.5, 8, 6);
                    $pdf->Image("$stphotofina", 142, 102.5, 8, 6);
                    $pdf->Image("$stphotofina", 166, 102.5, 8, 6);
                    $pdf->Image("$stphotofina", 190, 102.5, 8, 6);
                    $pdf->Image("$stphotofina", 211, 102.5, 8, 6);
                    $pdf->Image("$stphotofina", 234, 102.5, 8, 6);
                    
$pdf->Ln();
$pdf->Cell(60,12,"Religion & Moral Education",1);
$pdf->Cell(20,6,"PI",1,0,"C");
$pdf->Cell(23,6,"6.1.1",1,0,"C");
$pdf->Cell(23,6,"6.1.2",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Ln();
$pdf->Cell(60,6,"",0);
$pdf->Cell(20,6,"PS",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
			        $pdf->Image("$stphotofina", 98, 114.5, 8, 6);
                    $pdf->Image("$stphotofina", 120, 114.5, 8, 6);

$pdf->Ln();
$pdf->Cell(60,12,"Digital Technology",1);
$pdf->Cell(20,6,"PI",1,0,"C");
$pdf->Cell(23,6,"6.1",1,0,"C");
$pdf->Cell(23,6,"6.4",1,0,"C");
$pdf->Cell(23,6,"6.6",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Ln();
$pdf->Cell(60,6,"",0);
$pdf->Cell(20,6,"PS",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
			        $pdf->Image("$stphotofina", 98, 126.5, 8, 6);
                    $pdf->Image("$stphotofina", 120, 126.5, 8, 6);
                    $pdf->Image("$stphotofina", 142, 126.5, 8, 6);

$pdf->Ln();
$pdf->Cell(60,12,"Life & Livehood",1);
$pdf->Cell(20,6,"PI",1,0,"C");
$pdf->Cell(23,6,"6.2.1",1,0,"C");
$pdf->Cell(23,6,"6.2.2",1,0,"C");
$pdf->Cell(23,6,"6.4.1",1,0,"C");
$pdf->Cell(23,6,"6.4.2",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Ln();
$pdf->Cell(60,6,"",0);
$pdf->Cell(20,6,"PS",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
			        $pdf->Image("$stphotofina", 98, 138.5, 8, 6);
                    $pdf->Image("$stphotofina", 120, 138.5, 8, 6);
                    $pdf->Image("$stphotofina", 142, 138.5, 8, 6);
                    $pdf->Image("$stphotofina", 166, 138.5, 8, 6);

$pdf->Ln();
$pdf->Cell(60,12,"Well Being",1);
$pdf->Cell(20,6,"PI",1,0,"C");
$pdf->Cell(23,6,"6.1.1",1,0,"C");
$pdf->Cell(23,6,"6.1.2",1,0,"C");
$pdf->Cell(23,6,"6.2.1",1,0,"C");
$pdf->Cell(23,6,"6.2.2",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Ln();
$pdf->Cell(60,6,"",0);
$pdf->Cell(20,6,"PS",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
			        $pdf->Image("$stphotofina", 98, 150.5, 8, 6);
                    $pdf->Image("$stphotofina", 120, 150.5, 8, 6);
                    $pdf->Image("$stphotofina", 142, 150.5, 8, 6);
                    $pdf->Image("$stphotofina", 166, 150.5, 8, 6);

$pdf->Ln();
$pdf->Cell(60,12,"Art & Culture",1);
$pdf->Cell(20,6,"PI",1,0,"C");
$pdf->Cell(23,6,"6.1.1",1,0,"C");
$pdf->Cell(23,6,"6.2.1",1,0,"C");
$pdf->Cell(23,6,"6.5.1",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Ln();
$pdf->Cell(60,6,"",0);
$pdf->Cell(20,6,"PS",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
			        $pdf->Image("$stphotofina", 98, 162.3, 8, 5.3);
                    $pdf->Image("$stphotofina", 120, 162.3, 8, 5.3);
                    $pdf->Image("$stphotofina", 142, 162.3, 8, 5.3);

}
else{
    $pdf->SetFont('Arial','',10);
$pdf->Cell(60,12,"Bangla",1);
$pdf->Cell(20,6,"PI",1,0,"C");
$pdf->Cell(23,6,"7.1.1",1,0,"C");
$pdf->Cell(23,6,"7.2.1",1,0,"C");
$pdf->Cell(23,6,"7.3.1",1,0,"C");
$pdf->Cell(23,6,"7.3.2",1,0,"C");
$pdf->Cell(23,6,"7.3.3",1,0,"C");
$pdf->Cell(23,6,"7.4.1",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Ln();
$pdf->Cell(60,6,"",0);
$pdf->Cell(20,6,"PS",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");

	                $stphotofina ="singel.png";
	                
	                

			        $pdf->Image("$stphotofina", 98, 54.7, 8, 6);
                    $pdf->Image("$stphotofina", 120, 54.7, 8, 6);
                    $pdf->Image("$stphotofina", 142, 54.7, 8, 6);
                    $pdf->Image("$stphotofina", 166, 54.7, 8, 6);
                    $pdf->Image("$stphotofina", 190, 54.7, 8, 6);
                    $pdf->Image("$stphotofina", 211, 54.7, 8, 6);


$pdf->Ln();
$pdf->Cell(60,12,"Eglish",1);
$pdf->Cell(20,6,"PI",1,0,"C");
$pdf->Cell(23,6,"7.2.1",1,0,"C");
$pdf->Cell(23,6,"7.2.2",1,0,"C");
$pdf->Cell(23,6,"7.3.1",1,0,"C");
$pdf->Cell(23,6,"7.3.2",1,0,"C");
$pdf->Cell(23,6,"7.4.2",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");

$pdf->Ln();
$pdf->Cell(60,6,"",0);
$pdf->Cell(20,6,"PS",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");

			        $pdf->Image("$stphotofina", 98, 66.5, 8, 6);
                    $pdf->Image("$stphotofina", 120, 66.5, 8, 6);
                    $pdf->Image("$stphotofina", 142, 66.5, 8, 6);
                    $pdf->Image("$stphotofina", 166, 66.5, 8, 6);
                    $pdf->Image("$stphotofina", 190, 66.5, 8, 6);
$pdf->Ln();
$pdf->Cell(60,12,"Mathematics",1);
$pdf->Cell(20,6,"PI",1,0,"C");
$pdf->Cell(23,6,"7.1.1",1,0,"C");
$pdf->Cell(23,6,"7.1.2",1,0,"C");
$pdf->Cell(23,6,"7.2.2",1,0,"C");
$pdf->Cell(23,6,"7.5.1",1,0,"C");
$pdf->Cell(23,6,"7.5.2",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");

$pdf->Ln();
$pdf->Cell(60,6,"",0);
$pdf->Cell(20,6,"PS",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");


			        $pdf->Image("$stphotofina", 98, 78.5, 8, 6);
                    $pdf->Image("$stphotofina", 120, 78.5, 8, 6);
                    $pdf->Image("$stphotofina", 142, 78.5, 8, 6);
                    $pdf->Image("$stphotofina", 166, 78.5, 8, 6);
                    $pdf->Image("$stphotofina", 190, 78.5, 8, 6);
                   

$pdf->Ln();
$pdf->Cell(60,12,"Science",1);
$pdf->Cell(20,6,"PI",1,0,"C");
$pdf->Cell(23,6,"7.1.1",1,0,"C");
$pdf->Cell(23,6,"7.1.2",1,0,"C");
$pdf->Cell(23,6,"7.3.2",1,0,"C");
$pdf->Cell(23,6,"7.8.1",1,0,"C");
$pdf->Cell(23,6,"7.8.2",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");

$pdf->Ln();
$pdf->Cell(60,6,"",0);
$pdf->Cell(20,6,"PS",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");

			        $pdf->Image("$stphotofina", 98, 90.5, 8, 6);
                    $pdf->Image("$stphotofina", 120, 90.5, 8, 6);
                    $pdf->Image("$stphotofina", 142, 90.5, 8, 6);
                    $pdf->Image("$stphotofina", 166, 90.5, 8, 6);
                    $pdf->Image("$stphotofina", 190, 90.5, 8, 6);

$pdf->Ln();
$pdf->Cell(60,12,"History & Social Science",1);
$pdf->Cell(20,6,"PI",1,0,"C");
$pdf->Cell(23,6,"7.1.1",1,0,"C");
$pdf->Cell(23,6,"7.1.2",1,0,"C");
$pdf->Cell(23,6,"7.2.2",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");

$pdf->Ln();
$pdf->Cell(60,6,"",0);
$pdf->Cell(20,6,"PS",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");

			        $pdf->Image("$stphotofina", 98, 102.5, 8, 6);
                    $pdf->Image("$stphotofina", 120, 102.5, 8, 6);
                    $pdf->Image("$stphotofina", 142, 102.5, 8, 6);

                    
$pdf->Ln();
$pdf->Cell(60,12,"Religion & Moral Education",1);
$pdf->Cell(20,6,"PI",1,0,"C");
$pdf->Cell(23,6,"7.1.1",1,0,"C");
$pdf->Cell(23,6,"7.2.1",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");

$pdf->Ln();
$pdf->Cell(60,6,"",0);
$pdf->Cell(20,6,"PS",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");

			        $pdf->Image("$stphotofina", 98, 114.5, 8, 6);
                    $pdf->Image("$stphotofina", 120, 114.5, 8, 6);

$pdf->Ln();
$pdf->Cell(60,12,"Digital Technology",1);
$pdf->Cell(20,6,"PI",1,0,"C");
$pdf->Cell(23,6,"7.1",1,0,"C");
$pdf->Cell(23,6,"7.4",1,0,"C");
$pdf->Cell(23,6,"7.6",1,0,"C");
$pdf->Cell(23,6,"7.7",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");

$pdf->Ln();
$pdf->Cell(60,6,"",0);
$pdf->Cell(20,6,"PS",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");

			        $pdf->Image("$stphotofina", 98, 126.5, 8, 6);
                    $pdf->Image("$stphotofina", 120, 126.5, 8, 6);
                    $pdf->Image("$stphotofina", 142, 126.5, 8, 6);
                    $pdf->Image("$stphotofina", 166, 126.5, 8, 6);

$pdf->Ln();
$pdf->Cell(60,12,"Life & Livehood",1);
$pdf->Cell(20,6,"PI",1,0,"C");
$pdf->Cell(23,6,"7.2.1",1,0,"C");
$pdf->Cell(23,6,"7.2.2",1,0,"C");
$pdf->Cell(23,6,"7.4.1",1,0,"C");
$pdf->Cell(23,6,"7.4.2",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");

$pdf->Ln();
$pdf->Cell(60,6,"",0);
$pdf->Cell(20,6,"PS",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");

			        $pdf->Image("$stphotofina", 98, 138.5, 8, 6);
                    $pdf->Image("$stphotofina", 120, 138.5, 8, 6);
                    $pdf->Image("$stphotofina", 142, 138.5, 8, 6);
                    $pdf->Image("$stphotofina", 166, 138.5, 8, 6);

$pdf->Ln();
$pdf->Cell(60,12,"Well Being",1);
$pdf->Cell(20,6,"PI",1,0,"C");
$pdf->Cell(23,6,"7.1.1",1,0,"C");
$pdf->Cell(23,6,"7.1.2",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");

$pdf->Ln();
$pdf->Cell(60,6,"",0);
$pdf->Cell(20,6,"PS",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");

			        $pdf->Image("$stphotofina", 98, 150.5, 8, 6);
                    $pdf->Image("$stphotofina", 120, 150.5, 8, 6);


$pdf->Ln();
$pdf->Cell(60,12,"Art & Culture",1);
$pdf->Cell(20,6,"PI",1,0,"C");
$pdf->Cell(23,6,"7.1.1",1,0,"C");
$pdf->Cell(23,6,"7.1.2",1,0,"C");
$pdf->Cell(23,6,"7.5.1",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6,"",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");

$pdf->Ln();
$pdf->Cell(60,6,"",0);
$pdf->Cell(20,6,"PS",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");
$pdf->Cell(23,6," ",1,0,"C");

			        $pdf->Image("$stphotofina", 98, 162.3, 8, 5.3);
                    $pdf->Image("$stphotofina", 120, 162.3, 8, 5.3);
                    $pdf->Image("$stphotofina", 142, 162.3, 8, 5.3);
}
$pdf->Ln(8);
	$pdf->SetFont('Arial','U',13);  
	$pdf->Cell(220,2,"Behavioural Indicator",0,0,"C");
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont('Arial','',10);
$pdf->Cell(10,5,"BI",1,0,"C");
$pdf->Cell(23,5,"Bangla",1,0,"C");
$pdf->Cell(23,5,"English",1,0,"C");
$pdf->Cell(23,5,"Math",1,0,"C");
$pdf->Cell(23,5,"Science",1,0,"C");
$pdf->Cell(23,5,"History",1,0,"C");
$pdf->Cell(20,5,"Religion",1,0,"C");
$pdf->Cell(30,5,"Digital Technology",1,0,"C");
$pdf->Cell(26,5,"Life & Livehood",1,0,"C");
$pdf->Cell(20,5,"Well Bing",1,0,"C");
$pdf->Cell(23,5,"Art & Culture",1,0,"C");
$pdf->Cell(20,5,"Remarks",1,0,"C");
$pdf->Ln();
$pdf->Cell(10,5,"BS",1,0,"C");
$pdf->Cell(23,5," ",1,0,"C");
$pdf->Cell(23,5," ",1,0,"C");
$pdf->Cell(23,5," ",1,0,"C");
$pdf->Cell(23,5," ",1,0,"C");
$pdf->Cell(23,5," ",1,0,"C");
$pdf->Cell(20,5," ",1,0,"C");
$pdf->Cell(30,5," ",1,0,"C");
$pdf->Cell(26,5," ",1,0,"C");
$pdf->Cell(20,5,"",1,0,"C");
$pdf->Cell(23,5,"",1,0,"C");
$pdf->Cell(20,5,"",1,0,"C");
                    $pdf->Image("$stphotofina", 27, 179.2, 7, 4.5);
                    $pdf->Image("$stphotofina", 50, 179.2, 7, 4.5);
                    $pdf->Image("$stphotofina", 73, 179.2, 7, 4.5);
			        $pdf->Image("$stphotofina", 96, 179.2, 7, 4.5);
                    $pdf->Image("$stphotofina", 120, 179.2, 7, 4.5);
                    $pdf->Image("$stphotofina", 142, 179.2, 7, 4.5);
                    $pdf->Image("$stphotofina", 166, 179.2, 7, 4.5);
                    $pdf->Image("$stphotofina", 194, 179.2, 7, 4.5);
                    $pdf->Image("$stphotofina", 216, 179.2, 7, 4.5);
                    $pdf->Image("$stphotofina", 237, 179.2, 7, 4.5);
                    
                    
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
}
$pdf->Output();
?>