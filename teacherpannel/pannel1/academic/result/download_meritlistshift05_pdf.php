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
	$this->Cell(190,5,"Merit List in Shift",0,0,'C');
	$this->Ln();
	if($GLOBALS['studClass']==1 OR $GLOBALS['studClass']==2)
	{
	if($GLOBALS['group']==1)
	{
	$this->SetFont('Arial','',12);    
	$this->Cell(190,5,"Department : Science",0,0,'C');
	$this->Ln(); 
	} 
	if($GLOBALS['group']==2)
	{
	$this->SetFont('Arial','',12);    
	$this->Cell(190,5,"Department : Business Studies",0,0,'C');
	$this->Ln(); 
	} 
	if($GLOBALS['group']==3)
	{
	$this->SetFont('Arial','',12);    
	$this->Cell(190,5,"Department : Humanities",0,0,'C');
	$this->Ln(); 
	} 
	}
	$this->SetFont('Arial','',11);
	$this->Cell(12,5,"Class : ",0,0,'L');
	$this->Cell(15,5,$GLOBALS['fnsclass'],0,0,'L');
	$this->Cell(12,5,"Shift : ",0,0,'L');
	$this->Cell(15,5,$GLOBALS['fnsshift'],0,0,'L');
	$this->Cell(12,5,"Term : ",0,0,'L');
	$this->Cell(40,5,$GLOBALS['fnsterm'],0,0,'L');
	$this->Cell(17,5,"Session : ",0,0,'L');
	$this->Cell(15,5,$GLOBALS['stsess'],0,0,'L');
	$this->Ln();
	
		$this->Cell(8,5,"SL",1,0,"C");
		$this->Cell(30,5,"Section",1,0,"C");
		$this->Cell(10,5,"Roll",1,0,"C");
		$this->Cell(70,5,"Name",1);
		$this->Cell(25,5,"Grand Total",1,0,"C");
		$this->Cell(15,5,"GPA",1,0,"C");
		$this->Cell(30,5,"Merit Position",1,0,"C");
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

				

$pdf->SetFont('Arial','',10);





		


if($studClass==1 OR $studClass==2)
{				
					$data="select * from borno_school_9_10_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND meritno_shift!=0 order by meritno_shift asc";
					$qdata=$mysqli->query($data);
					while($showdata=$qdata->fetch_assoc()){ $sl++;
					
		
		$roll=$showdata['borno_school_roll'];
		$techname=$showdata['borno_school_student_name'];
		$section=$showdata['borno_school_section_id'];		
		$grand=$showdata['grandtotal'];
		$gpa=$showdata['gpa'];
		$merit=$showdata['merit_shift'];
		 
$gtsection="SELECT * FROM borno_school_section where borno_school_section_id=$section";
					$qgtsection=$mysqli->query($gtsection);
					$sqgtsection=$qgtsection->fetch_assoc();
$fnssection=$sqgtsection['borno_school_section_name'];		
		
					

		$pdf->Cell(8,5,$sl,1,0,"C");
		$pdf->Cell(30,5,$fnssection,1,0,"C");		
		$pdf->Cell(10,5,$roll,1,0,"C");
		$pdf->Cell(70,5,$techname,1);
		$pdf->Cell(25,5,$grand,1,0,"C");	
		$pdf->Cell(15,5,$gpa,1,0,"C");
		$pdf->Cell(30,5,$merit,1,0,"C");
		$pdf->Ln();
}
	$data1="select * from borno_school_9_10_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND meritno_shift!=0";
					$qdata1=$mysqli->query($data1);
					$meritno=mysqli_num_rows($qdata1); 
				
		$pdf->Cell(143,5,'',0,0,"C");						
	    $pdf->Cell(35,5,"Total Student : $meritno",0,0,"L");	
}
elseif($studClass==3 OR $studClass==4 OR $studClass==5)
{				
					$data="select * from borno_school_6_8_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND meritno_shift!=0 order by meritno_shift asc";
					$qdata=$mysqli->query($data);
					while($showdata=$qdata->fetch_assoc()){ $sl++;
					
	
		$roll=$showdata['borno_school_roll'];
		$techname=$showdata['borno_school_student_name'];
		$section=$showdata['borno_school_section_id'];		
		$grand=$showdata['grandtotal'];
		$gpa=$showdata['gpa'];
		$merit=$showdata['merit_shift'];
		
$gtsection="SELECT * FROM borno_school_section where borno_school_section_id=$section";
					$qgtsection=$mysqli->query($gtsection);
					$sqgtsection=$qgtsection->fetch_assoc();
$fnssection=$sqgtsection['borno_school_section_name'];		 
		
		
					

		$pdf->Cell(8,5,$sl,1,0,"C");
		$pdf->Cell(30,5,$fnssection,1,0,"C");		
		$pdf->Cell(10,5,$roll,1,0,"C");
		$pdf->Cell(70,5,$techname,1);
		$pdf->Cell(25,5,$grand,1,0,"C");	
		$pdf->Cell(15,5,$gpa,1,0,"C");
		$pdf->Cell(30,5,$merit,1,0,"C");
			$pdf->Ln();
}
	$data1="select * from borno_school_6_8_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND meritno_shift!=0";
					$qdata1=$mysqli->query($data1);
					$meritno=mysqli_num_rows($qdata1); 
			
		$pdf->Cell(143,5,'',0,0,"C");						
	    $pdf->Cell(35,5,"Total Student : $meritno",0,0,"L");	
}
else
{				
					$data="select * from borno_school_play_5_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND meritno_shift!=0 order by meritno_shift asc";
					$qdata=$mysqli->query($data);
					while($showdata=$qdata->fetch_assoc()){ $sl++;
					
		
		$roll=$showdata['borno_school_roll'];
		$techname=$showdata['borno_school_student_name'];
		$section=$showdata['borno_school_section_id'];		
		$grand=$showdata['grandtotal'];
		$gpa=$showdata['gpa'];
		$merit=$showdata['merit_shift'];
		 
$gtsection="SELECT * FROM borno_school_section where borno_school_section_id=$section";
					$qgtsection=$mysqli->query($gtsection);
					$sqgtsection=$qgtsection->fetch_assoc();
$fnssection=$sqgtsection['borno_school_section_name'];		
		
					

		$pdf->Cell(8,5,$sl,1,0,"C");
		$pdf->Cell(30,5,$fnssection,1,0,"C");		
		$pdf->Cell(10,5,$roll,1,0,"C");
		$pdf->Cell(70,5,$techname,1);
		$pdf->Cell(25,5,$grand,1,0,"C");	
		$pdf->Cell(15,5,$gpa,1,0,"C");
		$pdf->Cell(30,5,$merit,1,0,"C");
			$pdf->Ln();
}
	$data1="select * from borno_school_play_5_merit where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND meritno_shift!=0";
					$qdata1=$mysqli->query($data1);
					$meritno=mysqli_num_rows($qdata1); 
			
		$pdf->Cell(143,5,'',0,0,"C");							
	    $pdf->Cell(35,5,"Total Student : $meritno",0,0,"L");
}

$pdf->Output();
?>