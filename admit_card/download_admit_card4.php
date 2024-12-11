<?php

$branchId=$_GET['stbranch'];
$schId=$_GET['schoolId'];
$studClass=$_GET['classId'];
$shiftId=$_GET['shiftId'];
$section=$_GET['sectionId'];
$stsess=$_GET['scsess'];
$fnschname1=$_GET['sctermId'];

//echo $gttermId ; 

$studid = $_GET['studid'];


include('../connection.php');

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

// $gtsection="select * from borno_result_add_term where borno_school_id=$schId AND borno_school_class_id=$studClass AND borno_school_session='$stsess' AND borno_result_term_id='$gttermId'";
// 					$qgtsection=$mysqli->query($gtsection);
// 					$sqgtsection=$qgtsection->fetch_assoc();
// $fnschname1=$sqgtsection['borno_result_term_name'];



require('../pannel/fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage('P');

					$gtschoolName="SELECT * FROM borno_school where borno_school_id=$schId";
					$qgtschoolName=$mysqli->query($gtschoolName);
					$sqgtschoolName=$qgtschoolName->fetch_assoc();


$fnschname=$sqgtschoolName['borno_school_name'];
$fnshead=$sqgtschoolName['borno_school_head'];

$pdf->Ln();



			
				$data="select * from borno_student_info where borno_student_info_id = '$studid'";


					$qdata=$mysqli->query($data);
				    $showdata=$qdata->fetch_assoc();
		            $stName=$showdata['borno_school_student_name']; 
		            $stroll =  $showdata['borno_school_roll']; 
	 	$stphoto=$showdata['borno_school_photo'];
 	$stphoto=$row2['borno_school_photo'];
 	
	if($row2['borno_school_photo']!=""){
	
	$stphotofina="../student/studentphoto/$stphoto";
	
	} else {
	
	$stphotofina="../student/studentphoto/nophoto.jpg";
	
	}
	
	
	
	$getschLogo=$sqgtschoolName['borno_school_logo'];	
	if($sqgtschoolName['borno_school_logo']!=""){
	
	$getschLogof="../pannel/academic/infosett/school-logo/$getschLogo";
	
	} else {
	
	$getschLogof="../pannel/academic/infosett/school-logo/nologo.png";
	
	}
	
	
	
//	$pdf->Image("$stphotofina", 117, 20, 24, 24);
	$pdf->Image("$getschLogof", 30, 12, 24, 24);

	

$pdf->Cell(190,110,"",1,0,"C");
$pdf->Cell(10,5,"",0,0,"C");
$pdf->SetFont('Arial','',18);
$pdf->Ln();
$pdf->Cell(195,5,$fnschname,0,0,"C");
$pdf->SetFont('Arial','',14); 
$pdf->Ln();

$pdf->Cell(280,2,'',0,5,"C");
$pdf->Cell(195,5,"Motijheel Colony, Dhaka-1000 ",0,0,"C");
$pdf->Ln();
$pdf->Cell(280,2,'',0,5,"C");
$pdf->Cell(195,5,$fnschname1,0,0,"C");
// $pdf->Cell(15,5,'Exam',0,0,"L");
// $pdf->Cell(10,5,$stsess,0);

$pdf->Ln();
$pdf->SetFont('Arial','',16); 
$pdf->Cell(140,3,'',0,5,"C");
$pdf->Cell(195,5,'Admit Card',0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

   


		
	
		$pdf->SetFont('Arial','',14);
        $pdf->Cell(25,5,"",0);
		$pdf->Cell(27,7,"Student ID ",0);		
		$pdf->Cell(70,7,": $studid",0);
		$pdf->Ln();
        $pdf->Cell(25,5,"",0);
		$pdf->Cell(27,5,"Name ",0);		
		$pdf->Cell(70,5,": $stName",0);
		$pdf->Cell(20,5,"Class ",0);		
		$pdf->Cell(70,5,": $fnsclass",0);
		

		





$pdf->Ln();
		$pdf->Cell(280,2,'',0,5,"C");
		$pdf->Cell(25,5,"",0);
	  	$pdf->Cell(27,5,"Roll",0);
	 	$pdf->Cell(70,5,": $stroll",0);	
		$pdf->Cell(20,5,"Shift",0);
		$pdf->Cell(27,5,": $fnsshift",0);
			
	
		
	    $pdf->Ln();
		$pdf->Cell(280,2,'',0,5,"C");
		$pdf->Cell(25,5,"",0);
	  	$pdf->Cell(27,5,"Section",0);
	 	$pdf->Cell(70,5,": $fnssection",0);	
		$pdf->Cell(20,5,"Session",0);
		$pdf->Cell(20,5,": $stsess",0);
	


$pdf->Ln();
$pdf->Ln();	
$pdf->SetFont('Arial','B',12);
		//$pdf->Cell(280,2,'',0,5,"C");
		$pdf->Cell(25,5,"",0);
$pdf->Cell(70,7,"Exam Type",1,0,"C");
$pdf->Cell(70,7,"Payment Status",1,0,"C");
$pdf->Ln();	
$pdf->SetFont('Arial','B',12);
		//$pdf->Cell(280,2,'',0,5,"C");
		$pdf->Cell(25,5,"",0);
$pdf->Cell(70,5,"$fnschname1",1,0,"C");
$pdf->Cell(70,5,"Paid",1,0,"C");
$pdf->Cell(280,7,'',0,0,"C");

 $getHSsignature=$sqgtschoolName['signature'];
 if($sqgtschoolName['signature']!=""){
	
	$getHSsignaturef="../pannel/academic/teacher/signature/$getHSsignature";
	
	} else {
	
	$getHSsignaturef="../pannel/academic/teacher/signature/nophoto.jpg";
	
	}
 
 
$pdf->Image("$getHSsignaturef", 140, 97, 25, 10);
 
$pdf->Ln();	
$pdf->Ln();
$pdf->Cell(95,5,"----------------------------------",0,0,"C");
$pdf->Cell(95,5,"-----------------------------------",0,0,"C");

$pdf->Ln();	
$pdf->Cell(95,5,"Class Teacher Signature",0,0,"C");
	$pdf->Cell(48,5,$GLOBALS['fnshead'],0,0,"R");
	$pdf->Cell(47,5," Signature",0,0,"L"); 


$pdf->Ln();	
$pdf->Ln();	
$pdf->Ln();	
$pdf->Ln();	



					

$pdf->Output();
?>