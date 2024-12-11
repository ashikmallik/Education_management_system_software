<?php

$branchId=$_GET['stbranch'];
$schId=$_GET['schoolId'];
$studClass=$_GET['classId'];
$shiftId=$_GET['shiftId'];
$section=$_GET['sectionId'];
$stsess=$_GET['scsess'];
$gttermId=$_GET['sctermId'];



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

$gtsection="SELECT * FROM borno_school_section where borno_school_section_id=$section";
					$qgtsection=$mysqli->query($gtsection);
					$sqgtsection=$qgtsection->fetch_assoc();
$fnssection=$sqgtsection['borno_school_section_name'];

$gtsection="select * from borno_result_add_term where borno_school_id=$schId AND borno_school_class_id=$studClass AND borno_school_session='$stsess' AND borno_result_term_id='$gttermId'";
					$qgtsection=$mysqli->query($gtsection);
					$sqgtsection=$qgtsection->fetch_assoc();
$fnschname1=$sqgtsection['borno_result_term_name'];

$gtmaxroll="select * from borno_student_info where borno_school_section_id=$section AND borno_school_session=$stsess order by borno_school_roll desc limit 0,1";
					$qgtmaxroll=$mysqli->query($gtmaxroll);
					$sqgtmaxroll=$qgtmaxroll->fetch_assoc();
$maxroll=$sqgtmaxroll['borno_school_roll'];
$maxroll1=$maxroll+1;

$gtminroll="select * from borno_student_info where borno_school_section_id=$section AND borno_school_session=$stsess order by borno_school_roll asc limit 0,1";
					$qgtminroll=$mysqli->query($gtminroll);
					$sqgtminroll=$qgtminroll->fetch_assoc();
$minroll=$sqgtminroll['borno_school_roll'];

require('../../fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage('L');

					$gtschoolName="SELECT * FROM borno_school where borno_school_id=$schId";
					$qgtschoolName=$mysqli->query($gtschoolName);
					$sqgtschoolName=$qgtschoolName->fetch_assoc();


$fnschname=$sqgtschoolName['borno_school_name'];
$fnshead=$sqgtschoolName['borno_school_head'];

	
	$getschLogo=$sqgtschoolName['borno_school_logo'];	
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
	
$pdf->Ln();

$pdf->Image("$getschLogof", 12, 20, 24, 24);
$pdf->Image("$getschLogof", 157, 20, 24, 24);
$pdf->Image("$getschLogof", 12, 116, 24, 24);	
$pdf->Image("$getschLogof", 157, 116, 24, 24);
 $pdf->Image("$getHSsignaturef", 240, 72, 30, 10); 
 $pdf->Image("$getHSsignaturef", 100, 72, 30, 10);
 $pdf->Image("$getHSsignaturef", 240, 169, 30, 10); 
 $pdf->Image("$getHSsignaturef", 100, 169, 30, 10);
$pdf->Cell(135,83,"",1,0,"C");
$pdf->Cell(10,5,"",0,0,"C");
$pdf->Cell(135,83,"",1,0,"C");
$pdf->Cell(10,5,"",2,0,"C");
$pdf->SetFont('Arial','',18);
$pdf->Ln();
$pdf->Cell(140,5,$fnschname,0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(140,5,$fnschname,0,0,"C");
$pdf->SetFont('Arial','',14); 
$pdf->Ln();
$pdf->Cell(280,2,'',0,5,"C");
$pdf->Cell(70,5,$fnschname1,0,0,"R");
$pdf->Cell(15,5,'Exam',0,0,"L");
$pdf->Cell(10,5,$stsess,0);
$pdf->Cell(50,5,'',0);
$pdf->Cell(70,5,$fnschname1,0,0,"R");
$pdf->Cell(15,5,'Exam',0,0,"L");
$pdf->Cell(10,5,$stsess,0);
$pdf->Ln();
$pdf->SetFont('Arial','',16); 
$pdf->Cell(140,3,'',0,5,"C");
$pdf->Cell(140,5,'Admit Card',0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(140,5,'Admit Card',0,0,"C");
$pdf->Cell(140,5,'',0,5,"C");
$pdf->Ln();
$pdf->Ln();

		
		$pdf->SetFont('Arial','',14);
        $pdf->Cell(8,5,"",0);
		$pdf->Cell(15,5,"Name:",0);		
		$pdf->Cell(72,5,"",0);
		$pdf->Cell(15,5,"Class:",0);
		$pdf->Cell(25,5,"",0);
		


    	$pdf->Cell(18,5,"",0);
		$pdf->Cell(15,5,"Name:",0);		
		$pdf->Cell(72,5,"",0);
		$pdf->Cell(15,5,"Class:",0);
		$pdf->Cell(25,5,'',0);


$pdf->Ln();
		$pdf->Cell(280,2,'',0,5,"C");
		$pdf->Cell(8,5,"",0);
	  	$pdf->Cell(12,5,"Roll:",0);
	 	$pdf->Cell(75,5,"",0);	
		$pdf->Cell(13,5,"Shift:",0);
		$pdf->Cell(27,5,'',0);
		$pdf->Cell(18,5,"",0);
    	$pdf->Cell(12,5,"Roll:",0);
		$pdf->Cell(75,5,"",0);
		$pdf->Cell(13,5,"Shift:",0);
		$pdf->Cell(27,5,'',0);			
	
		
	    $pdf->Ln();
		$pdf->Cell(280,2,'',0,5,"C");
		$pdf->Cell(8,5,"",0);
	  	$pdf->Cell(20,5,"Section:",0);
	 	$pdf->Cell(67,5,'',0);	
		$pdf->Cell(20,5,"Session:",0);
		$pdf->Cell(20,5,'',0);
		$pdf->Cell(18,5,"",0);
    	$pdf->Cell(20,5,"Section:",0);
		$pdf->Cell(67,5,'',0);
		$pdf->Cell(20,5,"Session:",0);
		$pdf->Cell(20,5,'',0);		


$pdf->Cell(280,11,'',0,0,"C");
	
$pdf->Ln();	
$pdf->Ln();
$pdf->Cell(70,5,"----------------------------------",0,0,"C");
$pdf->Cell(70,5,"-----------------------------------",0,0,"C");
$pdf->Cell(70,5,"----------------------------------",0,0,"C");
$pdf->Cell(70,5,"-----------------------------------",0,0,"C");
$pdf->Ln();	
$pdf->Cell(70,5,"Class Teacher Signature",0,0,"C");
	$pdf->Cell(35,5,$GLOBALS['fnshead'],0,0,"R");
	$pdf->Cell(35,5," Signature",0,0,"L"); 
$pdf->Cell(70,5,"Class Teacher Signature",0,0,"C");
	$pdf->Cell(35,5,$GLOBALS['fnshead'],0,0,"R");
	$pdf->Cell(35,5," Signature",0,0,"L");

$pdf->Ln();	
$pdf->Ln();	
$pdf->Ln();	
$pdf->Ln();	
	

$pdf->Cell(135,83,"",1,0,"C");
$pdf->Cell(10,5,"",0,0,"C");
$pdf->Cell(135,83,"",1,0,"C");
$pdf->Cell(10,5,"",2,0,"C");
$pdf->SetFont('Arial','',18);
$pdf->Ln();
$pdf->Cell(140,5,$fnschname,0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(140,5,$fnschname,0,0,"C");
$pdf->SetFont('Arial','',14); 
$pdf->Ln();
$pdf->Cell(280,2,'',0,5,"C");
$pdf->Cell(70,5,$fnschname1,0,0,"R");
$pdf->Cell(15,5,'Exam',0,0,"L");
$pdf->Cell(10,5,$stsess,0);
$pdf->Cell(50,5,'',0);
$pdf->Cell(70,5,$fnschname1,0,0,"R");
$pdf->Cell(15,5,'Exam',0,0,"L");
$pdf->Cell(10,5,$stsess,0);
$pdf->Ln();
$pdf->SetFont('Arial','',16); 
$pdf->Cell(140,3,'',0,5,"C");
$pdf->Cell(140,5,'Admit Card',0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(140,5,'Admit Card',0,0,"C");
$pdf->Cell(140,5,'',0,5,"C");
$pdf->Ln();
$pdf->Ln();

		$pdf->SetFont('Arial','',14);
        $pdf->Cell(8,5,"",0);
		$pdf->Cell(15,5,"Name:",0);		
		$pdf->Cell(72,5,"",0);
		$pdf->Cell(15,5,"Class:",0);
		$pdf->Cell(25,5,'',0);
		
    	$pdf->Cell(18,5,"",0);
		$pdf->Cell(15,5,"Name:",0);		
		$pdf->Cell(72,5,"",0);
		$pdf->Cell(15,5,"Class:",0);
		$pdf->Cell(25,5,'',0);

$pdf->Ln();
		$pdf->Cell(280,2,'',0,5,"C");
		$pdf->Cell(8,5,"",0);
	  	$pdf->Cell(12,5,"Roll:",0);
	 	$pdf->Cell(75,5,"",0);	
		$pdf->Cell(13,5,"Shift:",0);
		$pdf->Cell(27,5,'',0);
		$pdf->Cell(18,5,"",0);
    	$pdf->Cell(12,5,"Roll:",0);
		$pdf->Cell(75,5,"",0);
		$pdf->Cell(13,5,"Shift:",0);
		$pdf->Cell(27,5,'',0);			
	
		
	    $pdf->Ln();
		$pdf->Cell(280,2,'',0,5,"C");
		$pdf->Cell(8,5,"",0);
	  	$pdf->Cell(20,5,"Section:",0);
	 	$pdf->Cell(67,5,'',0);	
		$pdf->Cell(20,5,"Session:",0);
		$pdf->Cell(20,5,'',0);
		$pdf->Cell(18,5,"",0);
    	$pdf->Cell(20,5,"Section:",0);
		$pdf->Cell(67,5,'',0);
		$pdf->Cell(20,5,"Session:",0);
		$pdf->Cell(20,5,'',0);		


$pdf->Cell(280,11,'',0,0,"C");
	
$pdf->Ln();	
$pdf->Ln();
$pdf->Cell(70,5,"----------------------------------",0,0,"C");
$pdf->Cell(70,5,"-----------------------------------",0,0,"C");
$pdf->Cell(70,5,"----------------------------------",0,0,"C");
$pdf->Cell(70,5,"-----------------------------------",0,0,"C");
$pdf->Ln();	


$pdf->Cell(70,5,"Class Teacher Signature",0,0,"C");
	$pdf->Cell(35,5,$GLOBALS['fnshead'],0,0,"R");
	$pdf->Cell(35,5," Signature",0,0,"L"); 
$pdf->Cell(70,5,"Class Teacher Signature",0,0,"C");
	$pdf->Cell(35,5,$GLOBALS['fnshead'],0,0,"R");
	$pdf->Cell(35,5," Signature",0,0,"L");



					

$pdf->Output();
?>