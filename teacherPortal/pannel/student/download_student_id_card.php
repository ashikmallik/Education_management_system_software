<?php

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
$getschLogo=$sqgtschoolName['borno_school_logo'];
$address=$sqgtschoolName['borno_school_address'];
	if($sqgtschoolName['borno_school_logo']!=""){
	
	$getschLogof="../infosett/school-logo/$getschLogo";
	
	} else {
	
	$getschLogof="../infosett/school-logo/nologo.png";
	
	}

 $getHSsignature=$sqgtschoolName['signature'];
 if($sqgtschoolName['signature']!=""){
	
	$getHSsignaturef="../teacher/signature/$getHSsignature";
	
	} else {
	
	$getHSsignaturef="../teacher/signature/nophoto.jpg";
	
	}	
	
$gtbranch="SELECT * FROM borno_school_branch where borno_school_id=$schId AND borno_school_branch_id='$branchId'";
					$qgtbranch=$mysqli->query($gtbranch);
					$sqgtbranch=$qgtbranch->fetch_assoc();
$fnsbranch=$sqgtbranch['borno_school_branch_name'];

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
$backimage="Student_Id.jpg";
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
 	$shoollogo=$GLOBALS['getschLogof']; 
 	$finalbackimage=$GLOBALS['backimage']; 

	
$this->Image("$finalbackimage", 10, 10, 190, 55);
$this->Image("$finalbackimage", 10, 66, 190, 55);
$this->Image("$finalbackimage", 10, 122, 190, 55);
$this->Image("$finalbackimage", 10, 178, 190, 55);
$this->Image("$finalbackimage", 10, 234, 190, 55);
$this->Image("$shoollogo", 118, 35, 24, 24);
$this->Image("$shoollogo", 118, 91, 24, 24);
$this->Image("$shoollogo", 118, 147, 24, 24);
$this->Image("$shoollogo", 118, 203, 24, 24);
$this->Image("$shoollogo", 118, 259, 24, 24);
 

	
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
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','',9);


     	

$data="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' order by borno_school_roll asc";
					$qdata=$mysqli->query($data);
					$sl=0;
					while($showdata=$qdata->fetch_assoc()){ $sl++;
					
		
		$roll=$showdata['borno_school_roll'];
		$stdname=substr($showdata['borno_school_student_name'],0,22);
		$stdPhone=substr($showdata['borno_school_phone'],2,13);
		$stdid=$showdata['borno_student_info_id'];
        $stphoto1=$showdata['borno_school_photo'];
	if($showdata['borno_school_photo']!=""){
	
	$finalstdphoto="../student/studentphoto/$stphoto1";
	
	} else {
	
	$finalstdphoto="../student/studentphoto/nophoto.jpg";
	
	}
	
 


$pdf->Image("$getHSsignaturef", 73, 52, 24, 8);	
$pdf->Image("$getHSsignaturef", 73, 108, 24, 8);
$pdf->Image("$getHSsignaturef", 73, 164, 24, 8);
$pdf->Image("$getHSsignaturef", 73, 220, 24, 8);
$pdf->Image("$getHSsignaturef", 73, 276, 24, 8);
	$pdf->SetTextColor(255,255,255);
		$pdf->Cell(100,5,$fnschname,0,0,"C");
$pdf->Ln();
		$pdf->Cell(100,5,$address,0,0,"C");
$pdf->Ln();
$pdf->SetTextColor(0,0,0);
		$pdf->Cell(100,5,'',0,0,"C");
		$pdf->SetFont('Arial','B',11);
					$pdf->Cell(90,-1,$fnschname,0,0,"C");
					$pdf->Cell(100,2,'',0,0,"C");
$pdf->Ln();
$pdf->SetFont('Arial','',9);
		$pdf->Cell(50,5,'',0);
		$pdf->Cell(50,5,$stdname,0);
					$pdf->Cell(90,5,$address,0,0,"C");		
				$pdf->Cell(1,5.5,'',0,0,"C");
$pdf->Ln();
		$pdf->Cell(50,5,'',0);
		$pdf->Cell(65,5,$fnsclass,0);
$pdf->Ln();
		$pdf->Cell(50,5,'',0);
		$pdf->Cell(65,5,$fnsshift,0);
$pdf->Ln();
		$pdf->Cell(50,5,'',0);
		$pdf->Cell(65,5,$fnssection,0);
$pdf->Ln();
		$pdf->Cell(50,5,'',0);
		$pdf->Cell(65,5,$roll,0);
$pdf->Ln();
		$pdf->Cell(50,5,'',0);
		$pdf->Cell(65,5,$stdPhone,0);		

		$pdf->Ln();

	if($sl==1 OR $sl==6 OR $sl==11 OR $sl==16 OR $sl==21 OR $sl==26 OR $sl==31 OR $sl==36 OR $sl==41 OR $sl==46 OR $sl==51 OR $sl==56 OR $sl==61 OR $sl==66 OR $sl==71 OR $sl==76 OR $sl==81 OR $sl==86 OR $sl==91 OR $sl==96){
$pdf->Image("$finalstdphoto", 17.5, 22, 26.5, 29.2);
}
if($sl==2 OR $sl==7 OR $sl==12 OR $sl==17 OR $sl==22 OR $sl==27 OR $sl==32 OR $sl==37 OR $sl==42 OR $sl==47 OR $sl==52 OR $sl==57 OR $sl==62 OR $sl==67 OR $sl==72 OR $sl==77 OR $sl==82 OR $sl==87 OR $sl==92 OR $sl==97){
$pdf->Image("$finalstdphoto", 17.5, 78, 26.5, 29.2);
}
if($sl==3 OR $sl==8 OR $sl==13 OR $sl==18 OR $sl==23 OR $sl==28 OR $sl==33 OR $sl==38 OR $sl==43 OR $sl==48 OR $sl==53 OR $sl==58 OR $sl==63 OR $sl==68 OR $sl==73 OR $sl==78 OR $sl==83 OR $sl==88 OR $sl==93 OR $sl==98){
$pdf->Image("$finalstdphoto", 17.5, 134, 26.5, 29.2);
}
if($sl==4 OR $sl==9 OR $sl==14 OR $sl==19 OR $sl==24 OR $sl==29 OR $sl==34 OR $sl==39 OR $sl==44 OR $sl==49 OR $sl==54 OR $sl==59 OR $sl==64 OR $sl==69 OR $sl==74 OR $sl==79 OR $sl==84 OR $sl==89 OR $sl==94 OR $sl==99){
$pdf->Image("$finalstdphoto", 17.5, 190, 26.5, 29.2);
}	
		if($sl==5 OR $sl==10 OR $sl==15 OR $sl==20 OR $sl==25 OR $sl==30 OR $sl==35 OR $sl==40 OR $sl==45 OR $sl==50 OR $sl==55 OR $sl==60 OR $sl==65 OR $sl==70 OR $sl==75 OR $sl==80 OR $sl==85 OR $sl==90 OR $sl==95 OR $sl==100){

$pdf->Image("$finalstdphoto", 17.5, 246, 26.5, 29.2);
$stdid1=$stdid;
	   	$pdf->Ln();
		}
		else{
		    	$pdf->Ln();
		$pdf->Cell(42,5,$stdid,0,0,"C");		
		$pdf->Cell(50,8.5,'',0);
					$pdf->Ln();
		}

		$finalstdphoto="";			    
		

					}



$pdf->Output();
?>