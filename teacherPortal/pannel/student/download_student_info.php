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
$fnschId=$sqgtschoolName['borno_school_id'];

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

$gtsection="SELECT * FROM borno_school_section where borno_school_section_id='$section' AND `year`='$stsess'";
					$qgtsection=$mysqli->query($gtsection);
					$sqgtsection=$qgtsection->fetch_assoc();
$fnssection=$sqgtsection['borno_school_section_name'];

require('../../fpdf/fpdf.php');
 if($schId == 131){
class PDF extends FPDF
{
// Page header
  
  function mycell($w,$h,$x,$t){
    
    $hig = $h/3;
    $fir = $hig+2;
    $sec = $hig+$hig+$hig+3;
    $len = strlen($t);
    if($len>28){
        $txt = str_split($t,28);
        $this->setX($x);
        $this->cell($w,$fir,$txt[0],'','L','');
        $this->setX($x);
        $this->cell($w,$sec,$txt[1],'','L','');
        $this->setX($x);
        $this->cell($w,$h,'','LTRB',0,'L',0);
        
    }
    else{
        $this->setX($x);
        $this->cell($w,$h,$t,'LTRB',0,'L',0);
    }
    
}
  
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
    $this->Cell(200,5,"Student List",0,0,"C");

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
    	$this->Cell(8,5,'SL',1,0,'C');
    	
	//	$this->Cell(35,5,"Student ID",1,0,'C');
    	
		 $this->Cell(10,5,'Roll',1,0,"C");
	
		$this->Cell(65,5,"Student Name",1);
		$this->Cell(30,5,"Contact No",1,0,'C');
		$this->Cell(40,5,'Remarks',1,0,'C');
   
   $this->Ln();

	
}
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
 else{
class PDF extends FPDF
{
// Page header
  function mycell($w,$h,$x,$t){
    
    $hig = $h/3;
    $fir = $hig+2;
    $sec = $hig+$hig+$hig+3;
    $len = strlen($t);
    if($len>28){
        $txt = str_split($t,28);
        $this->setX($x);
        $this->cell($w,$fir,$txt[0],'','L','');
        $this->setX($x);
        $this->cell($w,$sec,$txt[1],'','L','');
        $this->setX($x);
        $this->cell($w,$h,'','LTRB',0,'L',0);
        
    }
    else{
        $this->setX($x);
        $this->cell($w,$h,$t,'LTRB',0,'L',0);
    }
    
}
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
    $this->Cell(200,5,"Student List",0,0,"C");

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
    	$this->Cell(8,5,'SL',1,0,'C');
    	
		$this->Cell(35,5,"Student ID",1,0,'C');
    	
		 $this->Cell(10,5,'Roll',1,0,"C");
	
		$this->Cell(65,5,"Student Name",1);
		$this->Cell(30,5,"Contact No",1,0,'C');
		$this->Cell(40,5,'Remarks',1,0,'C');
   
   $this->Ln();

	
}
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
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','',9);

/*			$data="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' order by borno_school_roll asc";
					$qdata=$mysqli->query($data);
					while($showdata=$qdata->fetch_assoc()){ $sl++;
					
		
		$roll=$showdata['borno_school_roll'];
		$techname=$showdata['borno_school_student_name'];
		$techPhone=substr($showdata['borno_school_phone'],2,13);
		$stdid=$showdata['borno_student_info_id'];
		$stdid1=$showdata['borno_school_student_id'];
		
		
		$pdf->Cell(8,5,$sl,1);
		if($schId==33){
		if($stdid1==""){$stdid1=$stdid;}    
		$pdf->Cell(35,5,$stdid1,1,0,"C");
		}
		else
		{
		$pdf->Cell(35,5,$stdid,1,0,"C");
		}
		$pdf->Cell(10,5,$roll,1,0,"C");
		$pdf->Cell(65,5,$techname,1);
		$pdf->Cell(30,5,$techPhone,1,0,"C");	
		$pdf->Cell(40,5,'',1);
		$pdf->Ln();
}



*/


// 			$data="Call `sp_std_info_getby` ($section,$stsess)";
// 					$qdata=$mysqli->query($data);
// 					$sl=0;
// 					while($showdata=$qdata->fetch_assoc()){ $sl++;
					
		
// 		$roll=$showdata['borno_school_roll'];
// 		$techname=$showdata['borno_school_student_name'];
// 		$techPhone=substr($showdata['borno_school_phone'],2,13);
// 		$stdid=$showdata['borno_student_info_id'];
// 		$eightDigit = $showdata['eight_digit_student_id'];
	$data="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND `borno_student_status` = 1 ORDER BY `borno_school_roll` ASC";
		$qdata=$mysqli->query($data);
 					$sl=0;
					while($showdata=$qdata->fetch_assoc()){ $sl++;
							$roll=$showdata['borno_school_roll'];
		$techname=$showdata['borno_school_student_name'];
		//$techPhone=substr($showdata['borno_school_phone'],2,13);
		$techPhone= $showdata['borno_school_phone'];
		$stdid=$showdata['borno_student_info_id'];
		$eightDigit = $showdata['eight_digit_student_id'];
		$session = $showdata['borno_school_session'];
		
		$getstatus = "SELECT * FROM `collection_details` WHERE `student_id` ='$stdid' AND `session` ='$session' AND `fees_head_id` = 1";
		$qgetstatus=$mysqli->query($getstatus);
		$showgetstatus=$qgetstatus->fetch_assoc();
		
		$getstudent = $showgetstatus['student_id'];
		
		if(!empty($getstudent)){
		    $remark = "Admitted";
		}
		else{
		    $remark = "Not Admitted";
		}
		
					
		$pdf->Cell(8,10,$sl,1);
		 if($schId != 131){
		if($schId == 33 || $schId == 139 ){
		   $pdf->Cell(35,10,$eightDigit,1,0,"C");
		}
		else{
		    $pdf->Cell(35,10,$stdid,1,0,"C");
		}
		 }
		if($schId == 33 || $schId == 139){
		$pdf->Cell(10,10,'',1,0,"C");
		}
		else{
		    $pdf->Cell(10,10,$roll,1,0,"C");
		}
		 $w =65;
         $h =10;
		$x= $pdf->getX();
        $pdf->mycell($w,$h,$x,$techname);
		//$pdf->Cell(65,5,$techname,1);
		$pdf->Cell(30,10,$techPhone,1,0,"C");
		if($remark == 'Not Admitted'){
		    $pdf->SetFont('Arial','B',9);
		   $pdf->Cell(40,10,$remark,1); 
		}
		else{
		    $pdf->SetFont('Arial','',9);
		    $pdf->Cell(40,10,$remark,1);
		}
		$pdf->Ln();
		$pdf->SetFont('Arial','',9);
}


$pdf->Output();
?>