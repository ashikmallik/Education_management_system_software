<?php

$branchId=$_GET['branchId'];
$schId=$_GET['schoolId'];
$studClass=$_GET['studClass'];
$shiftId=$_GET['shiftId'];
$section=$_GET['section'];
$stsess=trim($_GET['stsess']);

include('../../../connection.php');

					$gtschoolName="SELECT * FROM borno_school where borno_school_id=$schId";
					$qgtschoolName=$mysqli->query($gtschoolName);
					$sqgtschoolName=$qgtschoolName->fetch_assoc();
$fnschname=$sqgtschoolName['borno_school_name'];

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
    $this->SetFont('Arial','',10);
    	$this->Cell(8,5,SL,1,0,'C');
        $this->Cell(10,5,Roll,1,0,"C");
		$this->Cell(80,5,"Student Name",1);
		$this->Cell(35,5,"Contact No",1,0,'C');
		$this->Cell(15,5,Photo,1,0,'C');
		$this->Cell(40,5,Remarks,1,0,'C');
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

					$data="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' order by borno_school_roll asc";
					$qdata=$mysqli->query($data);
					while($showdata=$qdata->fetch_assoc()){ $sl++;
					
		
		$roll=$showdata['borno_school_roll'];
		$techname=$showdata['borno_school_student_name'];
		$techPhone=substr($showdata['borno_school_phone'],2,13);
		$stphoto1=$showdata['borno_school_photo'];
	if($showdata['borno_school_photo']!=""){
	
	$stphotofina1="../../academic/student/studentphoto/$stphoto1";
	
	} else {
	$stphotofina1="../../academic/student/studentphoto/nophoto.jpg";
	}

if($sl==1) {$pdf->Image("$stphotofina1", 143, 35, 15, 15);}
elseif($sl==2) {$pdf->Image("$stphotofina1", 143, 50, 15, 15);}
elseif($sl==3) {$pdf->Image("$stphotofina1", 143, 65, 15, 15);}
elseif($sl==4) {$pdf->Image("$stphotofina1", 143, 80, 15, 15);}
elseif($sl==5) {$pdf->Image("$stphotofina1", 143, 95, 15, 15);}
elseif($sl==6) {$pdf->Image("$stphotofina1", 143,110, 15, 15);}
elseif($sl==7) {$pdf->Image("$stphotofina1", 143,125, 15, 15);}
elseif($sl==8) {$pdf->Image("$stphotofina1", 143,140, 15, 15);}
elseif($sl==9) {$pdf->Image("$stphotofina1", 143,155, 15, 15);}
elseif($sl==10) {$pdf->Image("$stphotofina1", 143,170, 15, 15);}
elseif($sl==11) {$pdf->Image("$stphotofina1", 143,185, 15, 15);}
elseif($sl==12) {$pdf->Image("$stphotofina1", 143,200, 15, 15);}
elseif($sl==13) {$pdf->Image("$stphotofina1", 143,215, 15, 15);}
elseif($sl==14) {$pdf->Image("$stphotofina1", 143,230, 15, 15);}
elseif($sl==15) {$pdf->Image("$stphotofina1", 143,245, 15, 15);}
elseif($sl==16) {$pdf->Image("$stphotofina1", 143,260, 15, 15);}
	
elseif($sl==17) {$pdf->AddPage();$pdf->Image("$stphotofina1", 143, 35, 15, 15);}
elseif($sl==18) {$pdf->Image("$stphotofina1", 143, 50, 15, 15);}
elseif($sl==19) {$pdf->Image("$stphotofina1", 143, 65, 15, 15);}
elseif($sl==20) {$pdf->Image("$stphotofina1", 143, 80, 15, 15);}
elseif($sl==21) {$pdf->Image("$stphotofina1", 143, 95, 15, 15);}
elseif($sl==22) {$pdf->Image("$stphotofina1", 143,110, 15, 15);}
elseif($sl==23) {$pdf->Image("$stphotofina1", 143,125, 15, 15);}
elseif($sl==24) {$pdf->Image("$stphotofina1", 143,140, 15, 15);}
elseif($sl==25) {$pdf->Image("$stphotofina1", 143,155, 15, 15);}
elseif($sl==26) {$pdf->Image("$stphotofina1", 143,170, 15, 15);}
elseif($sl==27) {$pdf->Image("$stphotofina1", 143,185, 15, 15);}
elseif($sl==28) {$pdf->Image("$stphotofina1", 143,200, 15, 15);}
elseif($sl==29) {$pdf->Image("$stphotofina1", 143,215, 15, 15);}
elseif($sl==30) {$pdf->Image("$stphotofina1", 143,230, 15, 15);}
elseif($sl==31) {$pdf->Image("$stphotofina1", 143,245, 15, 15);}
elseif($sl==32) {$pdf->Image("$stphotofina1", 143,260, 15, 15);}

elseif($sl==33) {$pdf->AddPage();$pdf->Image("$stphotofina1", 143, 35, 15, 15);}
elseif($sl==34) {$pdf->Image("$stphotofina1", 143, 50, 15, 15);}
elseif($sl==35) {$pdf->Image("$stphotofina1", 143, 65, 15, 15);}
elseif($sl==36) {$pdf->Image("$stphotofina1", 143, 80, 15, 15);}
elseif($sl==37) {$pdf->Image("$stphotofina1", 143, 95, 15, 15);}
elseif($sl==38) {$pdf->Image("$stphotofina1", 143,110, 15, 15);}
elseif($sl==39) {$pdf->Image("$stphotofina1", 143,125, 15, 15);}
elseif($sl==40) {$pdf->Image("$stphotofina1", 143,140, 15, 15);}
elseif($sl==41) {$pdf->Image("$stphotofina1", 143,155, 15, 15);}
elseif($sl==42) {$pdf->Image("$stphotofina1", 143,170, 15, 15);}
elseif($sl==43) {$pdf->Image("$stphotofina1", 143,185, 15, 15);}
elseif($sl==44) {$pdf->Image("$stphotofina1", 143,200, 15, 15);}
elseif($sl==45) {$pdf->Image("$stphotofina1", 143,215, 15, 15);}
elseif($sl==46) {$pdf->Image("$stphotofina1", 143,230, 15, 15);}
elseif($sl==47) {$pdf->Image("$stphotofina1", 143,245, 15, 15);}
elseif($sl==48) {$pdf->Image("$stphotofina1", 143,260, 15, 15);}

elseif($sl==49) {$pdf->AddPage();$pdf->Image("$stphotofina1", 143, 35, 15, 15);}
elseif($sl==50) {$pdf->Image("$stphotofina1", 143, 50, 15, 15);}
elseif($sl==51) {$pdf->Image("$stphotofina1", 143, 65, 15, 15);}
elseif($sl==52) {$pdf->Image("$stphotofina1", 143, 80, 15, 15);}
elseif($sl==53) {$pdf->Image("$stphotofina1", 143, 95, 15, 15);}
elseif($sl==54) {$pdf->Image("$stphotofina1", 143,110, 15, 15);}
elseif($sl==55) {$pdf->Image("$stphotofina1", 143,125, 15, 15);}
elseif($sl==56) {$pdf->Image("$stphotofina1", 143,140, 15, 15);}
elseif($sl==57) {$pdf->Image("$stphotofina1", 143,155, 15, 15);}
elseif($sl==58) {$pdf->Image("$stphotofina1", 143,170, 15, 15);}
elseif($sl==59) {$pdf->Image("$stphotofina1", 143,185, 15, 15);}
elseif($sl==60) {$pdf->Image("$stphotofina1", 143,200, 15, 15);}
elseif($sl==61) {$pdf->Image("$stphotofina1", 143,215, 15, 15);}
elseif($sl==62) {$pdf->Image("$stphotofina1", 143,230, 15, 15);}
elseif($sl==63) {$pdf->Image("$stphotofina1", 143,245, 15, 15);}
elseif($sl==64) {$pdf->Image("$stphotofina1", 143,260, 15, 15);}

elseif($sl==65) {$pdf->AddPage();$pdf->Image("$stphotofina1", 143, 35, 15, 15);}
elseif($sl==66) {$pdf->Image("$stphotofina1", 143, 50, 15, 15);}
elseif($sl==67) {$pdf->Image("$stphotofina1", 143, 65, 15, 15);}
elseif($sl==68) {$pdf->Image("$stphotofina1", 143, 80, 15, 15);}
elseif($sl==69) {$pdf->Image("$stphotofina1", 143, 95, 15, 15);}
elseif($sl==70) {$pdf->Image("$stphotofina1", 143,110, 15, 15);}
elseif($sl==71) {$pdf->Image("$stphotofina1", 143,125, 15, 15);}
elseif($sl==72) {$pdf->Image("$stphotofina1", 143,140, 15, 15);}
elseif($sl==73) {$pdf->Image("$stphotofina1", 143,155, 15, 15);}
elseif($sl==74) {$pdf->Image("$stphotofina1", 143,170, 15, 15);}
elseif($sl==75) {$pdf->Image("$stphotofina1", 143,185, 15, 15);}
elseif($sl==76) {$pdf->Image("$stphotofina1", 143,200, 15, 15);}
elseif($sl==77) {$pdf->Image("$stphotofina1", 143,215, 15, 15);}
elseif($sl==78) {$pdf->Image("$stphotofina1", 143,230, 15, 15);}
elseif($sl==79) {$pdf->Image("$stphotofina1", 143,245, 15, 15);}
elseif($sl==80) {$pdf->Image("$stphotofina1", 143,260, 15, 15);}

elseif($sl==81) {$pdf->AddPage();$pdf->Image("$stphotofina1", 143, 35, 15, 15);}
elseif($sl==82) {$pdf->Image("$stphotofina1", 143, 50, 15, 15);}
elseif($sl==83) {$pdf->Image("$stphotofina1", 143, 65, 15, 15);}
elseif($sl==84) {$pdf->Image("$stphotofina1", 143, 80, 15, 15);}
elseif($sl==85) {$pdf->Image("$stphotofina1", 143, 95, 15, 15);}
elseif($sl==86) {$pdf->Image("$stphotofina1", 143,110, 15, 15);}
elseif($sl==87) {$pdf->Image("$stphotofina1", 143,125, 15, 15);}
elseif($sl==88) {$pdf->Image("$stphotofina1", 143,140, 15, 15);}
elseif($sl==89) {$pdf->Image("$stphotofina1", 143,155, 15, 15);}
elseif($sl==90) {$pdf->Image("$stphotofina1", 143,170, 15, 15);}
elseif($sl==91) {$pdf->Image("$stphotofina1", 143,185, 15, 15);}
elseif($sl==92) {$pdf->Image("$stphotofina1", 143,200, 15, 15);}
elseif($sl==93) {$pdf->Image("$stphotofina1", 143,215, 15, 15);}
elseif($sl==94) {$pdf->Image("$stphotofina1", 143,230, 15, 15);}
elseif($sl==95) {$pdf->Image("$stphotofina1", 143,245, 15, 15);}
elseif($sl==96) {$pdf->Image("$stphotofina1", 143,260, 15, 15);}

elseif($sl==97) {$pdf->AddPage();$pdf->Image("$stphotofina1", 143, 35, 15, 15);}
elseif($sl==98) {$pdf->Image("$stphotofina1", 143, 50, 15, 15);}
elseif($sl==99) {$pdf->Image("$stphotofina1", 143, 65, 15, 15);}
elseif($sl==100) {$pdf->Image("$stphotofina1", 143, 80, 15, 15);}
elseif($sl==101) {$pdf->Image("$stphotofina1", 143, 95, 15, 15);}
elseif($sl==102) {$pdf->Image("$stphotofina1", 143,110, 15, 15);}
elseif($sl==103) {$pdf->Image("$stphotofina1", 143,125, 15, 15);}
elseif($sl==104) {$pdf->Image("$stphotofina1", 143,140, 15, 15);}
elseif($sl==105) {$pdf->Image("$stphotofina1", 143,155, 15, 15);}
elseif($sl==106) {$pdf->Image("$stphotofina1", 143,170, 15, 15);}
elseif($sl==107) {$pdf->Image("$stphotofina1", 143,185, 15, 15);}
elseif($sl==108) {$pdf->Image("$stphotofina1", 143,200, 15, 15);}
elseif($sl==109) {$pdf->Image("$stphotofina1", 143,215, 15, 15);}
elseif($sl==110) {$pdf->Image("$stphotofina1", 143,230, 15, 15);}
elseif($sl==111) {$pdf->Image("$stphotofina1", 143,245, 15, 15);}
elseif($sl==112) {$pdf->Image("$stphotofina1", 143,260, 15, 15);}

elseif($sl==113){$pdf->AddPage();$pdf->Image("$stphotofina1", 143, 35, 15, 15);}
elseif($sl==114){$pdf->Image("$stphotofina1", 143, 50, 15, 15);}
elseif($sl==115){$pdf->Image("$stphotofina1", 143, 65, 15, 15);}
elseif($sl==116){$pdf->Image("$stphotofina1", 143, 80, 15, 15);}
elseif($sl==117){$pdf->Image("$stphotofina1", 143, 95, 15, 15);}
elseif($sl==118){$pdf->Image("$stphotofina1", 143,110, 15, 15);}
elseif($sl==119){$pdf->Image("$stphotofina1", 143,125, 15, 15);}
elseif($sl==120){$pdf->Image("$stphotofina1", 143,140, 15, 15);}
elseif($sl==121){$pdf->Image("$stphotofina1", 143,155, 15, 15);}
elseif($sl==122){$pdf->Image("$stphotofina1", 143,170, 15, 15);}
elseif($sl==123){$pdf->Image("$stphotofina1", 143,185, 15, 15);}
elseif($sl==124){$pdf->Image("$stphotofina1", 143,200, 15, 15);}
elseif($sl==125){$pdf->Image("$stphotofina1", 143,215, 15, 15);}
elseif($sl==126){$pdf->Image("$stphotofina1", 143,230, 15, 15);}
elseif($sl==127){$pdf->Image("$stphotofina1", 143,245, 15, 15);}
elseif($sl==128){$pdf->Image("$stphotofina1", 143,260, 15, 15);}

elseif($sl==129){$pdf->AddPage();$pdf->Image("$stphotofina1", 143, 35, 15, 15);}
elseif($sl==130){$pdf->Image("$stphotofina1", 143, 50, 15, 15);}
elseif($sl==131){$pdf->Image("$stphotofina1", 143, 65, 15, 15);}
elseif($sl==132){$pdf->Image("$stphotofina1", 143, 80, 15, 15);}
elseif($sl==133){$pdf->Image("$stphotofina1", 143, 95, 15, 15);}
elseif($sl==134){$pdf->Image("$stphotofina1", 143,110, 15, 15);}
elseif($sl==135){$pdf->Image("$stphotofina1", 143,125, 15, 15);}
elseif($sl==136){$pdf->Image("$stphotofina1", 143,140, 15, 15);}
elseif($sl==137){$pdf->Image("$stphotofina1", 143,155, 15, 15);}
elseif($sl==138){$pdf->Image("$stphotofina1", 143,170, 15, 15);}
elseif($sl==139){$pdf->Image("$stphotofina1", 143,185, 15, 15);}
elseif($sl==140){$pdf->Image("$stphotofina1", 143,200, 15, 15);}
elseif($sl==141){$pdf->Image("$stphotofina1", 143,215, 15, 15);}
elseif($sl==142){$pdf->Image("$stphotofina1", 143,230, 15, 15);}
elseif($sl==143){$pdf->Image("$stphotofina1", 143,245, 15, 15);}
elseif($sl==144){$pdf->Image("$stphotofina1", 143,260, 15, 15);}

elseif($sl==145){$pdf->AddPage();$pdf->Image("$stphotofina1", 143, 35, 15, 15);}
elseif($sl==146){$pdf->Image("$stphotofina1", 143, 50, 15, 15);}
elseif($sl==147){$pdf->Image("$stphotofina1", 143, 65, 15, 15);}
elseif($sl==148){$pdf->Image("$stphotofina1", 143, 80, 15, 15);}
elseif($sl==149){$pdf->Image("$stphotofina1", 143, 95, 15, 15);}
elseif($sl==150){$pdf->Image("$stphotofina1", 143,110, 15, 15);}
elseif($sl==151){$pdf->Image("$stphotofina1", 143,125, 15, 15);}
elseif($sl==152){$pdf->Image("$stphotofina1", 143,140, 15, 15);}
elseif($sl==153){$pdf->Image("$stphotofina1", 143,155, 15, 15);}
elseif($sl==154){$pdf->Image("$stphotofina1", 143,170, 15, 15);}
elseif($sl==155){$pdf->Image("$stphotofina1", 143,185, 15, 15);}
elseif($sl==156){$pdf->Image("$stphotofina1", 143,200, 15, 15);}
elseif($sl==157){$pdf->Image("$stphotofina1", 143,215, 15, 15);}
elseif($sl==158){$pdf->Image("$stphotofina1", 143,230, 15, 15);}
elseif($sl==159){$pdf->Image("$stphotofina1", 143,245, 15, 15);}
elseif($sl==160){$pdf->Image("$stphotofina1", 143,260, 15, 15);}

		$pdf->Cell(8,15,$sl,1);
		$pdf->Cell(10,15,$roll,1);
		$pdf->Cell(80,15,$techname,1);
		$pdf->Cell(35,15,$techPhone,1);	
		$pdf->Cell(15,15,'',1);	
		$pdf->Cell(40,15,'',1);
		$pdf->Ln();
}



$pdf->Output();
?>