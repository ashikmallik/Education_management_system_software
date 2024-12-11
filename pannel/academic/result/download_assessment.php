<?php
error_reporting(0);


$schId=$_POST['schId'];
$studClass=$_POST['studClass'];
$shiftId=$_POST['shiftId'];
$section=$_POST['section'];
$stsess=$_POST['stsess'];
$stusubjId=$_POST['stusubjId'];

include('../../../connection.php');

//echo $stusubjId." "; echo $studClass

$gtclass="SELECT * FROM borno_school_class where borno_school_class_id=$studClass";
					$qgtclass=$mysqli->query($gtclass);
					$sqgtclass=$qgtclass->fetch_assoc();
$fnsclass=$sqgtclass['borno_school_class_name'];

$gtsection="SELECT * FROM borno_school_section where borno_school_section_id=$section";
					$qgtsection=$mysqli->query($gtsection);
					$sqgtsection=$qgtsection->fetch_assoc();
$fnssection=$sqgtsection['borno_school_section_name'];

$fnssection = "(".$fnssection.")";


$gtschoolName="SELECT * FROM borno_school where borno_school_id=$schId";
					$qgtschoolName=$mysqli->query($gtschoolName);
					$sqgtschoolName=$qgtschoolName->fetch_assoc();
					
					
					$fnschname=$sqgtschoolName['borno_school_name'];
					
	$assnty112="select * from `summetive_subject_table` where subject_id='$stusubjId'";
	$qassnty112=$mysqli->query($assnty112);
	$shassnty112=$qassnty112->fetch_assoc(); 
	$subject=$shassnty112['subject_name'];
					
require('../../fpdf/fpdf.php');
class PDF extends FPDF
{
// Page header
function Header()
{
    
    //$header="67.jpg";
    // Logo
   	$finalSchoolLogo1="67.jpg";
  
    $this->Image($finalSchoolLogo1,9.5,10,280,45);
    // Arial bold 15
    $this->SetFont('Arial','',14);
    // Move to the right
    //$this->Cell(80);
    // Title
    $this->Ln(13);
    $this->Cell(75,5,"",0,0,'L');
    $this->Cell(20,5,$GLOBALS['fnschname'],0,0,'L');
    $this->Ln(13);
    $this->Cell(25,5,"",0,0,'L');
    $this->Cell(15,5,$GLOBALS['fnsclass'],0,0,'L');
    $this->Cell(20,5,$GLOBALS['fnssection'],0,0,'L');
    $this->Cell(60,5,"",0,0,'L');
    $this->Cell(20,5,$GLOBALS['subject'],0,0,'L');
	$this->Ln(9);

	$this->Ln();
	$this->SetFont('Arial','',12);
// 	$this->Cell(15,5,"Class : ",0,0,'L');
// 	$this->Cell(20,5,$GLOBALS['fnsclass'],0,0,'L');
// 	$this->Cell(12,5,"Shift : ",0,0,'L');
// 	$this->Cell(18,5,$GLOBALS['fnsshift'],0,0,'L');
// 	$this->Cell(20,5,"Section : ",0,0,'L');
// 	$this->Cell(50,5,$GLOBALS['fnssection'],0,0,'L');
// 	$this->Cell(15,5,"Term : ",0,0,'L');
// 	$this->Cell(45,5,$GLOBALS['fnsterm'],0,0,'L');
// 	$this->Cell(20,5,"Session : ",0,0,'L');
// 	$this->Cell(15,5,$GLOBALS['stsess'],0,0,'L');
	$this->Ln();
	$this->SetFont('Arial','',11);
	$this->Cell(25,10,"Roll No",1,0,'C');
	$this->Cell(85,10,"Student Name",1,0,'L');
	$this->Cell(17,10," ",1,0,'C');
	$this->Cell(17,10," ",1,0,'C');
	$this->Cell(17,10," ",1,0,'C');
	$this->Cell(17,10," ",1,0,'C');
	$this->Cell(17,10," ",1,0,'C');
	$this->Cell(17,10," ",1,0,'C');
	$this->Cell(17,10," ",1,0,'C');
	$this->Cell(17,10," ",1,0,'C');
	$this->Cell(17,10," ",1,0,'C');
	$this->Cell(15.6,10," ",1,0,'C');
	$this->Ln();
// 	if($GLOBALS['s1l']==1)
// 	{
// 	$this->Cell(42,5,$GLOBALS['subname1'],1,0,'L');
// 	}
// 	if($GLOBALS['s1l']==2)
// 	{
// 	$this->Cell(42,5,$GLOBALS['subname1'],1,0,'L');
// 	$this->Cell(42,5,$GLOBALS['subname2'],1,0,'L');	
// 	}
// 	if($GLOBALS['s1l']==3)
// 	{
// 	$this->Cell(42,5,$GLOBALS['subname1'],1,0,'L');
// 	$this->Cell(42,5,$GLOBALS['subname2'],1,0,'L');	
// 	$this->Cell(42,5,$GLOBALS['subname3'],1,0,'L');	
// 	}
// 	if($GLOBALS['s1l']==4)
// 	{
// 	$this->Cell(42,5,$GLOBALS['subname1'],1,0,'L');
// 	$this->Cell(42,5,$GLOBALS['subname2'],1,0,'L');	
// 	$this->Cell(42,5,$GLOBALS['subname3'],1,0,'L');	
// 	$this->Cell(42,5,$GLOBALS['subname4'],1,0,'L');	
// 	}
// 	if($GLOBALS['s1l']>=5)
// 	{
// 	$this->Cell(42,5,$GLOBALS['subname1'],1,0,'L');
// 	$this->Cell(42,5,$GLOBALS['subname2'],1,0,'L');	
// 	$this->Cell(42,5,$GLOBALS['subname3'],1,0,'L');	
// 	$this->Cell(42,5,$GLOBALS['subname4'],1,0,'L');	
// 	$this->Cell(42,5,$GLOBALS['subname5'],1,0,'L');	
// 	}

//     $this->SetFont('Arial','',9);
// 	$this->Cell(10,5,'Grand',1,0,'C');
// 	$this->Cell(8,5,'GPA',1,0,'L');
// 	$this->Ln();
// 	$this->SetFont('Arial','',9);
// 	$this->Cell(10,5,'',0,0,'C');
// 	$this->Cell(40,5,'',0,0,'L');

// 	if($GLOBALS['s1l']==1)
// 	{
// 	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');	
// 	$this->Cell(8,5,'Total',1,0,'C');
// 	$this->Cell(4,5,'G',1,0,'C');
// 	}
// 	if($GLOBALS['s1l']==2)
// 	{
// 	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');	
// 	$this->Cell(8,5,'Total',1,0,'C');
// 	$this->Cell(4,5,'G',1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');	
// 	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');	
// 	$this->Cell(8,5,'Total',1,0,'C');
// 	$this->Cell(4,5,'G',1,0,'C');
// 	}
// 	if($GLOBALS['s1l']==3)
// 	{
// 	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');	
// 	$this->Cell(8,5,'Total',1,0,'C');
// 	$this->Cell(4,5,'G',1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');	
// 	$this->Cell(8,5,'Total',1,0,'C');
// 	$this->Cell(4,5,'G',1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');	
// 	$this->Cell(8,5,'Total',1,0,'C');
// 	$this->Cell(4,5,'G',1,0,'C');  
// 	}
// 	if($GLOBALS['s1l']==4)
// 	{
// 	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');	
// 	$this->Cell(8,5,'Total',1,0,'C');
// 	$this->Cell(4,5,'G',1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');	
// 	$this->Cell(8,5,'Total',1,0,'C');
// 	$this->Cell(4,5,'G',1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');	
// 	$this->Cell(8,5,'Total',1,0,'C');
// 	$this->Cell(4,5,'G',1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');	
// 	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');	
// 	$this->Cell(8,5,'Total',1,0,'C');
// 	$this->Cell(4,5,'G',1,0,'C');
// 	}
// 	if($GLOBALS['s1l']>=5)
// 	{
// 	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');	
// 	$this->Cell(8,5,'Total',1,0,'C');
// 	$this->Cell(4,5,'G',1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');	
// 	$this->Cell(8,5,'Total',1,0,'C');
// 	$this->Cell(4,5,'G',1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');	
// 	$this->Cell(8,5,'Total',1,0,'C');
// 	$this->Cell(4,5,'G',1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');	
// 	$this->Cell(8,5,'Total',1,0,'C');
// 	$this->Cell(4,5,'G',1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
// 	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');	
// 	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');	
// 	$this->Cell(8,5,'Total',1,0,'C');
// 	$this->Cell(4,5,'G',1,0,'C');
// 	}
	
// 	$this->SetFont('Arial','',10);
// 	$this->Cell(10,5,'Total',1,0,'C');
// 	$this->Cell(8,5,'',1,0,'L');
// 	$this->Ln();
    // Line break
    //$this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','',14);
    // Page number
	
	$this->SetFont('Arial','',8);

	$date=date('d-m-Y');
	$time=date('h:i:s');
	$this->Cell(90,5,"Print Date & Time : $date $time",0,0,"L"); 
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'R');
}
}


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L');


					
$result23 ="select * from `borno_student_info` where borno_school_class_id='$studClass'  AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' order by `borno_school_roll` asc";
$sl=0;
					$qgresult23=$mysqli->query($result23);
					while($row23=$qgresult23->fetch_assoc()){ $sl++;

					$gtstotal111=$row23['borno_school_roll'];
					$gtstdid=$row23['borno_student_info_id'];
			        $gtstname=substr($row23['borno_school_student_name'],0,23);
			        

					$pdf->SetFont('Arial','',9);
					$pdf->Cell(25,10,$gtstotal111,1,0,'C');
					$pdf->Cell(85,10,$gtstname,1,0,'L');
	                $pdf->Cell(17,10,'',1,0,'L');
	                $pdf->Cell(17,10,'',1,0,'L');
	                $pdf->Cell(17,10,'',1,0,'L');
	                $pdf->Cell(17,10,'',1,0,'L');
	                $pdf->Cell(17,10,'',1,0,'L');
	                $pdf->Cell(17,10,'',1,0,'L');
	                $pdf->Cell(17,10,'',1,0,'L');
	                $pdf->Cell(17,10,'',1,0,'L');
	                $pdf->Cell(17,10,'',1,0,'L');
	               // $pdf->Cell(17,10,'',1,0,'L');
	                $pdf->Cell(15.6,10,'',1,0,'L');
	                
	                $stphotofina ="singel.png";
	                if($sl == 1 OR $sl == 13 OR $sl == 25 OR $sl == 37 OR $sl == 49 OR $sl == 61 OR $sl == 73 OR $sl == 85 OR $sl == 97){
	                $position = 66.5;
	                }
	                else{
	                   $position = $position + 10;
	                }
			        $pdf->Image("$stphotofina", 122.5, $position, 10, 8);
                    $pdf->Image("$stphotofina", 140.5, $position, 10, 8);
                    $pdf->Image("$stphotofina", 156.5, $position, 10, 8);
                    $pdf->Image("$stphotofina", 174.5, $position, 10, 8);
                    $pdf->Image("$stphotofina", 190.5, $position, 10, 8);
                    $pdf->Image("$stphotofina", 208.5, $position, 10, 8);
                    $pdf->Image("$stphotofina", 224.5, $position, 10, 8);
                    $pdf->Image("$stphotofina", 242.5, $position, 10, 8);
                    $pdf->Image("$stphotofina", 258.5, $position, 10, 8);
                    $pdf->Image("$stphotofina", 276.5, $position, 10, 8);
					
					$pdf->Ln();
						}

$pdf->Output();
?>