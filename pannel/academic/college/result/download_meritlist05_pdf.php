<?php

$branchId=$_GET['stbranch'];
$schId=$_GET['schoolId'];
$studClass=$_GET['classId'];
$shiftId=$_GET['shiftId'];
$section=$_GET['sectionId'];
$stsess=$_GET['scsess'];
$term=$_GET['sctermId'];
$group=$_GET['group'];
$styear=$_GET['styear'];


include('../../../../connection.php');

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

require('../../../fpdf/fpdf.php');
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
}

// Page footer
function Footer()
{    
    
//     // Position at 1.5 cm from bottom
//     $this->SetY(-15);
//     // Arial italic 8
//     $this->SetFont('Arial','',14);
    
//     $this->Cell(90,5,"-------------------------",0,0,"L");
//     $this->Cell(40);
//     $this->Cell(200,5,"--------------------------------------",0,0,"L");
//     $this->Ln();
    
//     $this->Cell(90,5,"Principal Signature",0,0,"L");
//     $this->Cell(40);
//     $this->Cell(200,5,"Convenor of Exam Committe",0,0,"L");
// 	$this->SetFont('Arial','',8);
// 	$this->Ln();
// 	$date=date('d-m-Y');
// 	$time=date('h:i:s');
// 	$this->Cell(90,5,"Print Date & Time : $date $time",0,0,"L"); 
//     $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'R');

	$finalgtschoolsignature1 = "model_principal.png";
	$finalgtschoolsignature2 = "mmsc_col_inc.jpg";
  
    $this->Image($finalgtschoolsignature1,158,270,35,10);
    $this->Image($finalgtschoolsignature2,90,270,30,10);
	
	// Position at 1.5 cm from bottom
    $this->SetY(-16);
    // Arial italic 8
   
	$this->SetFont('Arial','',10); 
// 	$this->Cell(60,1,"----------------------------",0,0,"C"); 
// 	$this->Cell(70,1,"-------------------------------------",0,0,"C"); 
// 	$this->Cell(60,1,"--------------------------------",0,0,"C"); 
// 	$this->Ln();
	$this->Cell(60,1,"Class Teacher",0,0,"C"); 
	$this->Cell(70,1,"Masuda Ahmed",0,0,"C"); 
	$this->Cell(70,3,"",0,0,"C"); 
	$this->Ln();
	$this->Cell(60,5,"",0,0,"C"); 
	$this->Cell(70,5,"In-Charge(College)",0,0,"C"); 
	$this->Cell(25,5,$GLOBALS['fnshead'],0,0,"R");
	$this->Cell(-20,5,"",0,0,"L"); 
// 	$this->Cell(60,5,"Guardian's Signature",0,0,"C"); 
// 	$this->Cell(70,5,"Class Teacher's Signature",0,0,"C"); 
// 	$this->Cell(14,5,$GLOBALS['fnshead'],0,0,"R");
// 	$this->Cell(-10,5,"Principal's Signature",0,0,"L"); 
    // Page number
	$this->SetFont('Arial','',8);
	$this->Ln();
	$this->Cell(20,5,"Publish Date : ",0,0,"L"); 
	$this->Cell(90,5,$GLOBALS['publish'],0,0,"L"); 
		$this->SetFont('Arial','',10);
	$this->Cell(108,3,"Principal",0,0,"C");

}
}


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

					$gtschoolName="SELECT * FROM borno_school where borno_school_id=$schId";
					$qgtschoolName=$mysqli->query($gtschoolName);
					$sqgtschoolName=$qgtschoolName->fetch_assoc();

$pdf->SetFont('Arial','',20);
$fnschname=$sqgtschoolName['borno_school_name'];
$pdf->Cell(200,2,$fnschname,0,5,"C");

$pdf->SetFont('Arial','',14); 
$pdf->Cell(200,5,'',0,5,"C"); 
//$pdf->Cell(200,5,'Merit List in Section',0,5,"C");

if($group==1)   
{
    $pdf->Cell(200,5,'Merit List in Science',0,5,"C");
$pdf->Cell(200,5,"Group : Science",0,5,"C");
}
elseif($group==2)   
{
    $pdf->Cell(200,5,'Merit List in Business Studies',0,5,"C");
$pdf->Cell(200,5,"Group : Business Studies",0,5,"C");
} 
elseif($group==3)   
{
    $pdf->Cell(200,5,'Merit List in Humanities',0,5,"C");
$pdf->Cell(200,5,"Group : Humanities",0,5,"C");
} 
$pdf->Ln();
$pdf->SetFont('Arial','',12); 
$pdf->Cell(200,2,"Branch : $fnsbranch Class : $fnsclass  Section : $fnssection Session : $stsess",0,5,"L"); 
$pdf->Ln();
$pdf->Cell(200,5,"Term : $fnsterm",0,5,"L"); 
$pdf->Cell(200,1,'',0,5,"C"); 

$pdf->SetFont('Arial','',10);




		$pdf->Cell(8,5,'SL',1,0,"C");
		$pdf->Cell(10,5,'Roll',1,0,"C");
		$pdf->Cell(80,5,'Name',1);
		$pdf->Cell(30,5,"Grand Total",1,0,"C");
		$pdf->Cell(15,5,'GPA',1,0,"C");
		$pdf->Cell(35,5,"Merit Position",1,0,"C");
		
	$sl=0;
					$data="select * from borno_school_11_12_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_result_exam_year='$styear' AND meritno_section!=0 order by meritno_section asc";
					$qdata=$mysqli->query($data);
					while($showdata=$qdata->fetch_assoc()){ $sl++;
				
		$pdf->Ln();
		$roll=$showdata['borno_school_roll'];
		$techname=$showdata['borno_school_student_name'];
		$grand=$showdata['grandtotal'];
		$gpa=$showdata['gpa'];
		$merit=$showdata['merit_section'];
		 
		
		
					

		$pdf->Cell(8,5,$sl,1,0,"C");
		$pdf->Cell(10,5,$roll,1,0,"C");
		$pdf->Cell(80,5,$techname,1);
		$pdf->Cell(30,5,$grand,1,0,"C");	
		$pdf->Cell(15,5,$gpa,1,0,"C");
		$pdf->Cell(35,5,$merit,1,0,"C");
}
    	$data1="select * from borno_school_11_12_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_result_exam_year='$styear' AND meritno_section!=0";
					$qdata1=$mysqli->query($data1);
					$meritno=mysqli_num_rows($qdata1); 
			$pdf->Ln();	
		$pdf->Cell(143,5,'',0,0,"C");			
	    $pdf->Cell(35,5,"Total Student : $meritno",0,0,"L");				



$pdf->Output();
?>