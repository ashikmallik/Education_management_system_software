<?php


$schId=$_GET['schoolId'];
$studClass=$_GET['classId'];
$stsess=$_GET['scsess'];
$gttermId=$_GET['sctermId'];
$dept=$_GET['dept'];


include('../../../../connection.php');
$gtschoolName="SELECT * FROM borno_school where borno_school_id=$schId";
					$qgtschoolName=$mysqli->query($gtschoolName);
					$sqgtschoolName=$qgtschoolName->fetch_assoc();

                    $fnschname=$sqgtschoolName['borno_school_name'];



$gtclass="SELECT * FROM borno_school_class where borno_school_class_id=$studClass";
					$qgtclass=$mysqli->query($gtclass);
					$sqgtclass=$qgtclass->fetch_assoc();
$fnsclass=$sqgtclass['borno_school_class_name'];

$gtsection="select * from borno_result_add_term where borno_school_id=$schId AND borno_school_class_id=$studClass AND borno_school_session='$stsess' AND borno_result_term_id='$gttermId'";
					$qgtsection=$mysqli->query($gtsection);
					$sqgtsection=$qgtsection->fetch_assoc();
$fnschname1=$sqgtsection['borno_result_term_name'];

					$numtype ="select * from borno_result_number_type where borno_school_class_id='$studClass' AND borno_school_id='$schId' AND borno_school_session='$stsess'";
					$qnumtype=$mysqli->query($numtype);
					$rowqqnumtypee=$qnumtype->fetch_assoc();
					$numbertype1=substr($rowqqnumtypee['borno_school_number_type1'],0,3);
					$numbertype2=substr($rowqqnumtypee['borno_school_number_type2'],0,3);
					$numbertype3=substr($rowqqnumtypee['borno_school_number_type3'],0,3);
					$numbertype4=substr($rowqqnumtypee['borno_school_number_type4'],0,3);
					$numbertype5=substr($rowqqnumtypee['borno_school_number_type5'],0,3);
					$numbertype6=substr($rowqqnumtypee['borno_school_number_type6'],0,3);

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
    $this->SetFont('Arial','',11);
    $this->Cell(12,5,'Class :',0,0,'L');
    $this->Cell(18,5,$GLOBALS['fnsclass'],0,0,'L');
    $this->Cell(12,5,'Term :',0,0,'L');
    $this->Cell(33,5,$GLOBALS['fnschname1'],0,0,'L');
    $this->Cell(18,5,'Session :',0,0,'L');
    $this->Cell(10,5,$GLOBALS['stsess'],0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',10);
		$this->Cell(50,5,"Subject Name",1,0,"L");
		$this->Cell(20,5,"Full Mark",1,0,"C");
		$this->Cell(10,5,$GLOBALS['numbertype1'],1,0,'C');
		$this->Cell(10,5,'Pass',1,0,'C');
		$this->Cell(10,5,'Conv',1,0,'C');
		$this->Cell(10,5,$GLOBALS['numbertype2'],1,0,'C');
		$this->Cell(10,5,'Pass',1,0,'C');
		$this->Cell(10,5,'Conv',1,0,'C');
		$this->Cell(10,5,$GLOBALS['numbertype3'],1,0,'C');
		$this->Cell(10,5,'Pass',1,0,'C');
		$this->Cell(10,5,'Conv',1,0,'C');
		$this->Cell(10,5,$GLOBALS['numbertype4'],1,0,'C');
		$this->Cell(10,5,'Pass',1,0,'C');
		$this->Cell(10,5,'Conv',1,0,'C');
		$this->Cell(10,5,$GLOBALS['numbertype5'],1,0,'C');
		$this->Cell(10,5,'Pass',1,0,'C');
		$this->Cell(10,5,'Conv',1,0,'C');
		$this->Cell(10,5,$GLOBALS['numbertype6'],1,0,'C');
		$this->Cell(10,5,'Pass',1,0,'C');
		$this->Cell(10,5,'Conv',1,0,'C');										
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
$pdf->AddPage('L');


				$data="select * from borno_result_eleven_twelve_subject_details where borno_school_id='$schId'  AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_school_stud_group= '$dept' AND borno_result_term_id= '$gttermId' order by borno_subject_eleven_twelve_id asc";
$sl=0;
					$qdata=$mysqli->query($data);
					while($showdata=$qdata->fetch_assoc()){ $sl++;
					
		             $subjectid=$showdata['borno_subject_eleven_twelve_id'];
		             $full=$showdata['borno_eleven_twelve_subfullmark'];	
		             $type1=$showdata['number_type1_marks'];
					 $type2=$showdata['number_type2_marks'];
					 $type3=$showdata['number_type3_marks'];
					 $type4=$showdata['number_type4_marks'];
					 $type5=$showdata['number_type5_marks'];
					 $type6=$showdata['number_type6_marks'];
					 $pass1=$showdata['number_type1_pass'];
					 $pass2=$showdata['number_type2_pass'];
					 $pass3=$showdata['number_type3_pass'];
					 $pass4=$showdata['number_type4_pass'];
					 $pass5=$showdata['number_type5_pass'];
					 $pass6=$showdata['number_type6_pass'];
					 $conv1=$showdata['number_type1_conv'];
					 $conv2=$showdata['number_type2_conv'];
					 $conv3=$showdata['number_type3_conv'];
					 $conv4=$showdata['number_type4_conv'];
					 $conv5=$showdata['number_type5_conv'];
					 $conv6=$showdata['number_type6_conv'];

			    	$data1="select * from borno_subject_eleven_twelve where  	borno_subject_eleven_twelve_id='$subjectid' ";
					$qdata1=$mysqli->query($data1);
					$shoqdata1=$qdata1->fetch_assoc();
					$stName=$shoqdata1['borno_subject_eleven_twelve_name'];				 
					 
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(50,5,$stName,1,0,"L");
		$pdf->Cell(20,5,$full,1,0,"C");
		$pdf->Cell(10,5,$type1,1,0,"C");
		$pdf->Cell(10,5,$pass1,1,0,"C");
		$pdf->Cell(10,5,$conv1,1,0,"C");
		$pdf->Cell(10,5,$type2,1,0,"C");
		$pdf->Cell(10,5,$pass2,1,0,"C");
		$pdf->Cell(10,5,$conv2,1,0,"C");
		$pdf->Cell(10,5,$type3,1,0,"C");
		$pdf->Cell(10,5,$pass3,1,0,"C");
		$pdf->Cell(10,5,$conv3,1,0,"C");
		$pdf->Cell(10,5,$type4,1,0,"C");
		$pdf->Cell(10,5,$pass4,1,0,"C");
		$pdf->Cell(10,5,$conv4,1,0,"C");
		$pdf->Cell(10,5,$type5,1,0,"C");
		$pdf->Cell(10,5,$pass5,1,0,"C");
		$pdf->Cell(10,5,$conv5,1,0,"C");
		$pdf->Cell(10,5,$type6,1,0,"C");
		$pdf->Cell(10,5,$pass6,1,0,"C");
		$pdf->Cell(10,5,$conv6,1,0,"C");
$pdf->Ln();
}
 
$pdf->Output();
?>