<?php

$branchId=$_GET['stbranch'];
$schId=$_GET['schoolId'];
$studClass=$_GET['classId'];
$shiftId=$_GET['shiftId'];
$section=$_GET['sectionId'];
$stsess=$_GET['scsess'];
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
//if($fnsclass1=='Eleven') { $fnsclass='Twelve';  } else { $fnsclass=$fnsclass1; }

$gtshift="SELECT * FROM borno_school_shift where borno_school_shift_id=$shiftId";
					$qgtshift=$mysqli->query($gtshift);
					$sqgtshift=$qgtshift->fetch_assoc();
$fnsshift=$sqgtshift['borno_school_shift_name'];

$gtsection="SELECT * FROM borno_school_section where borno_school_section_id=$section";
					$qgtsection=$mysqli->query($gtsection);
					$sqgtsection=$qgtsection->fetch_assoc();
$fnssection=$sqgtsection['borno_school_section_name'];

$gtschoolName="SELECT * FROM borno_school where borno_school_id=$schId";
					$qgtschoolName=$mysqli->query($gtschoolName);
					$sqgtschoolName=$qgtschoolName->fetch_assoc();


$fnschname=$sqgtschoolName['borno_school_name'];

if($group==1){$gname="Science";}
elseif($group==2){$gname="Business";}
elseif($group==3){$gname="Humanities";}
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
    $this->SetFont('Arial','',16);
    $this->Cell(190,5,"4th Subject List",0,0,'C');
    $this->Ln();
    $this->SetFont('Arial','',11);
    $this->Cell(12,5,'Class : ',0,0,'L');
    $this->Cell(18,5,$GLOBALS['fnsclass'],0,0,'L');
    $this->Cell(12,5,'Shift : ',0,0,'L');
    $this->Cell(18,5,$GLOBALS['fnsshift'],0,0,'L');
    $this->Cell(15,5,'Section : ',0,0,'L');
    $this->Cell(65,5,$GLOBALS['fnssection'],0,0,'L');
    $this->Cell(18,5,'Session : ',0,0,'L');
    $this->Cell(10,5,$GLOBALS['stsess'],0,0,'L');
    $this->Ln();
    $this->Cell(15,5,'Group : ',0,0,'L');
    $this->Cell(100,5,$GLOBALS['gname'],0,0,'L');  
    $this->Ln();
    $this->SetFont('Arial','B',10);
    	$this->Cell(8,5,SL,1,0,'C');
        $this->Cell(10,5,Roll,1,0,"C");
		$this->Cell(80,5,"Student Name",1);
		$this->Cell(45,5,"3rd Subject",1,0,'C');
		$this->Cell(45,5,"4th Subject",1,0,'C');
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



 $pdf->SetFont('Arial','',10);



			
				$data="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_school_stud_group='$group' order by borno_school_roll asc";


$sl=0;
					$qdata=$mysqli->query($data);
					while($showdata=$qdata->fetch_assoc()){ $sl++;
		            
		            $stdid=$showdata['borno_student_info_id'];
		            $stdroll=$showdata['borno_school_roll'];
		            $stdname=$showdata['borno_school_student_name'];
	
	if($studClass==1 OR $studClass==2)
{	
$gtsubname="SELECT * FROM borno_set_subject_nine_ten where borno_student_info_id=$stdid";
					$qgtsubname=$mysqli->query($gtsubname);
					$sqgtsubname=$qgtsubname->fetch_assoc();
					$sub3rdid=$sqgtsubname['borno_subject_nine_ten_13sub'];
					$sub4thid=$sqgtsubname['borno_subject_nine_ten_4thsub'];
		
$gtschool3rd="SELECT * FROM borno_subject_nine_ten where borno_subject_nine_ten_id=$sub3rdid";
					$qgtschool3rd=$mysqli->query($gtschool3rd);
					$sqgtschool3rd=$qgtschool3rd->fetch_assoc();		
                    $sub3rd=$sqgtschool3rd['borno_subject_nine_ten_name'];

$gtschool4th="SELECT * FROM borno_subject_nine_ten where borno_subject_nine_ten_id=$sub4thid";
					$qgtschool4th=$mysqli->query($gtschool4th);
					$sqgtschool4th=$qgtschool4th->fetch_assoc();		
                    $sub4th=$sqgtschool4th['borno_subject_nine_ten_name'];
}    
else
{	
$gtsubname="SELECT * FROM borno_set_subject_eleven_twelve where borno_student_info_id=$stdid";
					$qgtsubname=$mysqli->query($gtsubname);
					$sqgtsubname=$qgtsubname->fetch_assoc();
					$sub3rdid=$sqgtsubname['borno_school_subject_10th'];
					$sub4thid=$sqgtsubname['borno_school_subject_12th'];
if($sub3rdid!="")
{
$gtschool3rd="SELECT * FROM borno_subject_eleven_twelve where borno_subject_eleven_twelve_id=$sub3rdid";
					$qgtschool3rd=$mysqli->query($gtschool3rd);
					$sqgtschool3rd=$qgtschool3rd->fetch_assoc();		
                    $sub3rd=$sqgtschool3rd['borno_subject_eleven_twelve_name'];

$gtschool4th="SELECT * FROM borno_subject_eleven_twelve where borno_subject_eleven_twelve_id=$sub4thid";
					$qgtschool4th=$mysqli->query($gtschool4th);
					$sqgtschool4th=$qgtschool4th->fetch_assoc();		
                    $sub4th=$sqgtschool4th['borno_subject_eleven_twelve_name'];
}
else{$sub3rd="";$sub4th="";}
} 

    	$pdf->Cell(8,5,$sl,1,0,'C');
        $pdf->Cell(10,5,$stdroll,1,0,"C");
		$pdf->Cell(80,5,$stdname,1);
		$pdf->Cell(45,5,$sub3rd,1,0,'C');
		$pdf->Cell(45,5,$sub4th,1,0,'C');					
$pdf->Ln();
}

					

$pdf->Output();
?>