<?php
error_reporting(0);

$branchId=$_GET['branchId'];
 $schId=$_GET['schoolId'];

$studClass=$_GET['studClass'];
$shiftId=$_GET['shiftId'];
$section=$_GET['section'];
$stsess=trim($_GET['stsess']);

include('../../../connection.php');
           
$gtschoolName="SELECT * FROM borno_school where borno_school_id='$schId'";
					$qgtschoolName=$mysqli->query($gtschoolName);
					$sqgtschoolName=$qgtschoolName->fetch_assoc();
$fnschname=$sqgtschoolName['borno_school_name'];

 $getHSsignature=$sqgtschoolName['signature'];
 if($sqgtschoolName['signature']!=""){
	
	$gHSsignaturef="../teacher/signature/$getHSsignature";
	} else {
	
	$gHSsignaturef="../teacher/signature/nophoto.jpg";
	
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

$gtcountroll="select COUNT(borno_school_roll) As count from borno_student_info where borno_school_section_id='$section' AND borno_school_session='$stsess'";
					$qgtcountroll=$mysqli->query($gtcountroll);
					$sqgtcountroll=$qgtcountroll->fetch_assoc();
$count=$sqgtcountroll['count'];

$gtminroll="select MIN(borno_school_roll) As minroll from borno_student_info where borno_school_section_id='$section' AND borno_school_session='$stsess'";
					$qgtminroll=$mysqli->query($gtminroll);
					$sqgtinroll=$qgtminroll->fetch_assoc();
$roll=$sqgtinroll['minroll'];

$gtmaxroll="select MAX(borno_school_roll) As maxroll from borno_student_info where borno_school_section_id='$section' AND borno_school_session='$stsess'";
					$qgtmaxroll=$mysqli->query($gtmaxroll);
					$sqgtmaxroll=$qgtmaxroll->fetch_assoc();
$maxroll=$sqgtmaxroll['maxroll'];

if($schId==14){
$fontimage="../student/idcard/Police id card.png";
}
elseif($schId==96){
$fontimage="../student/idcard/kamalpur id card.png";
}

elseif($schId==97){
$fontimage="../student/idcard/Shahid Arju id card.png";
}

elseif ($schId==113){
$fontimage="../student/idcard/mirka id card.png";
}

elseif ($schId==116){
$fontimage="../student/idcard/jagadish id card.png";
}
elseif ($schId==33){
$fontimage="../student/idcard/jagadish id card.png";
}
require('../../fpdf/fpdf.php');
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
//    $this->Image('logo.png',10,6,30);
    // Arial bold 15
    //$this->SetFont('Arial','B',20);
    // Move to the right
    //$this->Cell(80);
    // Title

 	$finalfontimage=$GLOBALS['fontimage']; 
 	
 	$getHSsignaturef=$GLOBALS['gHSsignaturef'];

	
$this->Image("$finalfontimage", 11, 2, 57.5, 90.4);
$this->Image("$finalfontimage",79, 2, 57.5, 90.4);
$this->Image("$finalfontimage", 148, 2, 57.5, 90.4);

$this->Image("$finalfontimage", 11, 97, 57.5, 90.4);
$this->Image("$finalfontimage",79, 97, 57.5, 90.4);
$this->Image("$finalfontimage", 148,97, 57.5, 90.4);

 
$this->Image("$finalfontimage", 11, 192, 57.5, 90.4);
$this->Image("$finalfontimage",79, 192, 57.5, 90.4);
$this->Image("$finalfontimage", 148,192, 57.5, 90.4);


$this->Image("$getHSsignaturef", 48, 81.5, 18, 6);	
$this->Image("$getHSsignaturef", 116, 81.5, 18, 6);
$this->Image("$getHSsignaturef", 185, 81.5, 18, 6);

$this->Image("$getHSsignaturef", 48, 176.5, 18, 6);	
$this->Image("$getHSsignaturef", 116, 176.5, 18, 6);
$this->Image("$getHSsignaturef", 185, 176.5, 18, 6);

$this->Image("$getHSsignaturef", 48, 271.5, 18, 6);	
$this->Image("$getHSsignaturef", 116, 271.5, 18, 6);
$this->Image("$getHSsignaturef", 185, 271.5, 18, 6);
	
}

// Page footer
function Footer()
{


    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','',9);
    $this->SetTextColor(0,0,0);
   	//$this->Cell(42,5,$GLOBALS['stdid1'],0,1,'C');
	$this->Cell(42,5,'',0,1,'C');
    $this->SetFont('Arial','I',8);
    // Page number
    //$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
for($sl=1;$sl<$count;$sl++){

    firstline1:  
    if($roll>$maxroll) {goto lastline;}   
	$data="select * from borno_student_info where borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_school_roll='$roll'";
	$qdata=$mysqli->query($data);
	$showdata=$qdata->fetch_assoc();					

		$stdname=$showdata['borno_school_student_name'];
		$stdPhone=substr($showdata['borno_school_phone'],2,13);
		$stdid=$showdata['borno_student_info_id'];
		$photo=$showdata['borno_school_photo'];
		
		if($photo==""){$roll=$roll+1; goto firstline1;}		
if($showdata['borno_school_photo']!="" ){
	
	$stphotofina="../student/studentphoto/$photo";

	} else {

	$stphotofina="../student/studentphoto/nophoto.jpg";
	}

 
 $roll1=$roll+1;
    firstline2:  
    if($roll1>$maxroll) {goto lastline;}    
	$data1="select * from borno_student_info where borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_school_roll='$roll1'";
	$qdata1=$mysqli->query($data1);
	$showdata1=$qdata1->fetch_assoc();					
		
		$stdname1=$showdata1['borno_school_student_name'];
		$stdPhone1=substr($showdata1['borno_school_phone'],2,13);
		$stdid1=$showdata1['borno_student_info_id'];
		$photo1=$showdata1['borno_school_photo'];
		
			if($photo1==""){$roll1=$roll1+1; goto firstline2;}		
if($showdata1['borno_school_photo']!="" ){
	
	$stphotofina1="../student/studentphoto/$photo1";

	} else {

	$stphotofina1="../student/studentphoto/nophoto.jpg";
	}	
		
 $roll2=$roll1+1;
    firstline3:  
    if($roll2>$maxroll) {goto lastline;}    
	$data2="select * from borno_student_info where borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_school_roll='$roll2'";
	$qdata2=$mysqli->query($data2);
	$showdata2=$qdata2->fetch_assoc();					
		
		$stdname2=$showdata2['borno_school_student_name'];
		$stdPhone2=substr($showdata2['borno_school_phone'],2,13);
		$stdid2=$showdata2['borno_student_info_id'];
		$photo2=$showdata2['borno_school_photo'];		
		
		if($photo2==""){$roll2=$roll2+1; goto firstline3;}		
        if($showdata2['borno_school_photo']!="" ){
	    $stphotofina2="../student/studentphoto/$photo2";
	} else {

	$stphotofina2="../student/studentphoto/nophoto.jpg";
	}

    	//$pdf->Cell(1,30,'',0);
		//$pdf->Cell(90,30,'',0);
		//$pdf->Cell(10,30,'',0,0,"C");		
		//$pdf->Cell(90,30,'',0);
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Cell(1,26.4,'',0);

	    $pdf->Ln();
		$pdf->SetTextColor(255,255,255);
		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(35,4.75,'',0);
		$pdf->Cell(12,4.75,"$fnsclass",0,0,"L");			
		$pdf->Cell(56,4.75," ",0,0,"L");
		$pdf->Cell(69,4.75,"$fnsclass",0,0,"L");
		$pdf->Cell(2,4.75,"$fnsclass",0,0,"L");			
		$pdf->Cell(10,8," ",0,0,"L");
		
	    $pdf->Ln();
	    $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Arial','',10);
		$pdf->Cell(28,3.5,'',0);
		$pdf->Cell(12,3.5,"$stdid",0,0,"L");			
		$pdf->Cell(56,3.5," ",0,0,"L");
		$pdf->Cell(69,3.5,"$stdid1",0,0,"L");
		$pdf->Cell(2,3.5,"$stdid2",0,0,"L");		
		$pdf->Cell(10,3.5," ",0,0,"L");
		
		$pdf->Ln();	
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(19,7.5,'',0);
		$pdf->Cell(56,7.5,"$stdname",0,0,"L");
		$pdf->Cell(10,7.5,"",0,0,"C");
		$pdf->Cell(2,7.5,'',0);			
		$pdf->Cell(69,7.5,"$stdname1",0,0,"L");
		$pdf->Cell(10,7.5,"$stdname2",0,0,"L");
		
		$pdf->Ln();	
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(28,3.5,'',0);
		$pdf->Cell(12,3.5,"$fnsshift",0,0,"L");			
		$pdf->Cell(56,3.5," ",0,0,"L");
		$pdf->Cell(69,3.5,"$fnsshift",0,0,"L");
		$pdf->Cell(2,3.5,"$fnsshift",0);			
		$pdf->Cell(10,7," ",0,0,"L");
		
		$pdf->Ln();
		$pdf->Cell(28,0.5,'',0);
		$pdf->Cell(12,0.5,"$fnssection",0,0,"L");			
		$pdf->Cell(56,0.5," ",0,0,"L");
		$pdf->Cell(69,0.5,"$fnssection",0,0,"L");
		$pdf->Cell(2,0.5,"$fnssection",0);			
		$pdf->Cell(10,3.7," ",0,0,"L");
		
		$pdf->Ln();
		$pdf->Cell(28,3.5,'',0);
		$pdf->Cell(12,3.5,"$stsess",0,0,"L");			
		$pdf->Cell(56,3.5," ",0,0,"L");
		$pdf->Cell(69,3.5,"$stsess",0,0,"L");
		$pdf->Cell(2,3.5,"$stsess",0,0,"L");
		$pdf->Cell(10,5.8,'',0);	
		
		$pdf->Ln();
		$pdf->Cell(28,3.5,'',0);
		$pdf->Cell(12,3.5,"$roll",0,0,"L");			
		$pdf->Cell(56,3.5," ",0,0,"L");
		$pdf->Cell(69,3.5,"$roll1",0,0,"L");
		$pdf->Cell(2,3.5,"$roll2",0,0,"L");
		$pdf->Cell(10,5.5,'',0);
		
		$pdf->Ln();
		$pdf->Cell(28,3.5,'',0);
		$pdf->Cell(12,3.5,"$stdPhone",0,0,"L");			
		$pdf->Cell(56,3.5," ",0,0,"L");
		$pdf->Cell(69,3.5,"$stdPhone1",0,0,"L");
		$pdf->Cell(2,3.5,"$stdPhone1",0,0,"L");
		$pdf->Cell(5,3.45,'',0);	

		$pdf->Ln();
		
		
if($sl==1 OR $sl==4 OR $sl==7 OR $sl==10 OR $sl==13 OR $sl==16 OR $sl==19 OR $sl==22 OR $sl==25 OR $sl==28 OR $sl==31 OR $sl==34 OR $sl==37 OR $sl==40 OR $sl==43 OR $sl==46 OR $sl==49 OR $sl==52 OR $sl==55 OR $sl==58 OR $sl==61 OR $sl==64 OR $sl==67 OR $sl==71 OR $sl==74 OR $sl==77 OR $sl==80 OR $sl==83 OR $sl==86 OR $sl==89 OR $sl==92 OR $sl==95 OR $sl==98 OR $sl==101 OR $sl==104 OR $sl==107 OR $sl==110)
{$inr1=8.5;$inr2=8.5;$inr3=8.5;}
else{
		$inr1=$inr1+95;
		$inr2=$inr2+95;
		$inr3=$inr3+95; 
}
        $pdf->Image("$stphotofina", 31.5, $inr1, 23, 24.5);
        $pdf->Image("$stphotofina1", 99.5, $inr2, 23, 24.5);
        $pdf->Image("$stphotofina2",168.5, $inr3, 23, 24.5);

$roll=$roll2+1;
}
lastline:

$pdf->Output();
?>