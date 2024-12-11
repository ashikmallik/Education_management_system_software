<?php
error_reporting(0);


$schId=$_GET['schId'];
$studClass=$_GET['studClass'];
$shiftId=$_GET['shiftId'];
$section=$_GET['section'];
$stsess=$_GET['stsess'];
$stusubjId=$_GET['stusubjId'];

include('../../../connection.php');

//echo $schId." ";echo $shiftId." ";echo $section." ";echo $stsess." ";echo $stusubjId." "; echo $studClass;

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
					$fnshead=$sqgtschoolName['borno_school_head'];
					
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
    
//     //$header="67.jpg";
//     // Logo
if($GLOBALS['studClass'] == 5){
    
    if($GLOBALS['stusubjId'] == 1){
        $stphotofina ="6_bangla.jpg";
    }
    else if($GLOBALS['stusubjId'] == 2){
        $stphotofina ="6_eng.jpg";
        
    }    else if($GLOBALS['stusubjId'] == 3){
        $stphotofina ="6_math.jpg";
    }
        else if($GLOBALS['stusubjId'] == 4){
        $stphotofina ="6_relegion.jpg";
    }
        else if($GLOBALS['stusubjId'] == 5){
        $stphotofina ="6_sci.jpg";
    }
        else if($GLOBALS['stusubjId'] == 6){
        $stphotofina ="6_work.jpg";
    }
        else if($GLOBALS['stusubjId'] == 7){
        $stphotofina ="6_bgs.jpg";
    }
        else if($GLOBALS['stusubjId'] == 8){
       $stphotofina ="6_dt.jpg"; 
    }
        else if($GLOBALS['stusubjId'] == 9){
        $stphotofina ="6_wel.jpg";
    }
    else{
        $stphotofina ="6_art.jpg";
    }
    
    
}
else{
        if($GLOBALS['stusubjId'] == 1){
        $stphotofina ="7_ban.jpg";
    }
    else if($GLOBALS['stusubjId'] == 2){
        $stphotofina ="7_eng.jpg";
        
    }    else if($GLOBALS['stusubjId'] == 3){
        $stphotofina ="7_math.jpg";
    }
        else if($GLOBALS['stusubjId'] == 4){
        $stphotofina ="7_relegion.jpg";
    }
        else if($GLOBALS['stusubjId'] == 5){
        $stphotofina ="7_sci.jpg";
    }
        else if($GLOBALS['stusubjId'] == 6){
        $stphotofina ="7_work.jpg";
    }
        else if($GLOBALS['stusubjId'] == 7){
        $stphotofina ="7_bgs.jpg";
    }
        else if($GLOBALS['stusubjId'] == 8){
       $stphotofina ="7_dt.jpg"; 
    }
        else if($GLOBALS['stusubjId'] == 9){
        $stphotofina ="7_wel.jpg";
    }
    else{
        $stphotofina ="7_art.jpg";
    }
}

  $this->Ln(4);
     $this->Image($stphotofina,9.5,10,200,250);
//     // Arial bold 15
     $this->SetFont('Arial','',12);
//     // Move to the right
//     //$this->Cell(80);
//     // Title
     $this->Ln(22);
    $this->Cell(60,5,"",0,0,'L');
    $this->Cell(20,5,$GLOBALS['fnschname'],0,0,'L');
     $this->Ln(10);
    // $this->Cell(65,2,"",0,0,'L');
    // $this->Cell(15,5,$GLOBALS['fnsclass'],0,0,'L');
//     $this->Cell(20,5,$GLOBALS['fnssection'],0,0,'L');
//     $this->Cell(60,5,"",0,0,'L');
//     $this->Cell(20,5,$GLOBALS['subject'],0,0,'L');
// 	$this->Ln(9);

 $this->Ln(-7);
// 	$this->SetFont('Arial','',12);
// // 	$this->Cell(15,5,"Class : ",0,0,'L');
// // 	$this->Cell(20,5,$GLOBALS['fnsclass'],0,0,'L');
// // 	$this->Cell(12,5,"Shift : ",0,0,'L');
// // 	$this->Cell(18,5,$GLOBALS['fnsshift'],0,0,'L');
// // 	$this->Cell(20,5,"Section : ",0,0,'L');
// // 	$this->Cell(50,5,$GLOBALS['fnssection'],0,0,'L');
// // 	$this->Cell(15,5,"Term : ",0,0,'L');
// // 	$this->Cell(45,5,$GLOBALS['fnsterm'],0,0,'L');
// // 	$this->Cell(20,5,"Session : ",0,0,'L');
// // 	$this->Cell(15,5,$GLOBALS['stsess'],0,0,'L');
// 	$this->Ln();
// 	$this->SetFont('Arial','',11);
// 	$this->Cell(25,10,"Roll No",1,0,'C');
// 	$this->Cell(85,10,"Student Name",1,0,'L');
// 	$this->Cell(17,10," ",1,0,'C');
// 	$this->Cell(17,10," ",1,0,'C');
// 	$this->Cell(17,10," ",1,0,'C');
// 	$this->Cell(17,10," ",1,0,'C');
// 	$this->Cell(17,10," ",1,0,'C');
// 	$this->Cell(17,10," ",1,0,'C');
// 	$this->Cell(17,10," ",1,0,'C');
// 	$this->Cell(17,10," ",1,0,'C');
// 	$this->Cell(17,10," ",1,0,'C');
// 	$this->Cell(15.6,10," ",1,0,'C');
// 	$this->Ln();

}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','',14);
    // Page number
    $this->Cell(95,5,"",0,0,"R");	
	$this->Cell(90,1,"------------------------------------",0,0,"C"); 
	$this->Ln();
    $this->Cell(100,5,"",0,0,"R");
    $this->Cell(45,5,$GLOBALS['fnshead'],0,0,"R");
	$this->Cell(45,5," Signature",0,0,"L");
	$this->Ln();
	$this->SetFont('Arial','',8);

	$date=date('d-m-Y');
	$time=date('h:i:s');
	$this->Cell(90,5,"Print Date & Time : $date $time",0,0,"L"); 
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'R');
}
}


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P');


					
$result23 ="select * from `borno_student_info` where borno_school_class_id='$studClass'  AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' order by `borno_school_roll` asc";
$sl=0;
					$qgresult23=$mysqli->query($result23);
					while($row23=$qgresult23->fetch_assoc()){ $sl++;

					$gtstotal111=$row23['borno_school_roll'];
					$gtstdid=$row23['borno_student_info_id'];
			        $gtstname=substr($row23['borno_school_student_name'],0,23);
			        

					$pdf->SetFont('Arial','',10);
					$pdf->Cell(35,1,'',0);
					$pdf->Cell(65,10,$gtstname,0,0,'L');
					$pdf->Ln(8);
					$pdf->Cell(12,1,'',0);
					$pdf->Cell(20,10,$gtstdid,0,0,'L');
					$pdf->Cell(25,10,"Roll : $gtstotal111",0,0,'L');
					$pdf->Cell(65,10,"Section : $fnssection",0,0,'L');

	                
	       //         $stphotofina ="আচরণিক ট্রান্সক্রিপ্ট.jpg";

			     //   $pdf->Image("$stphotofina", 10, $position, 200, 250);
			     		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();

        $pdf->Ln(100);
		$pdf->Ln(100);
						}

$pdf->Output();
?>