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

//if($fnsclass=='Eleven') { $fnsclass='Twelve'; } else  {$fnsclass=$fnsclass;}


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



require('../../fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();

					$gtschoolName="SELECT * FROM borno_school where borno_school_id=$schId";
					$qgtschoolName=$mysqli->query($gtschoolName);
					$sqgtschoolName=$qgtschoolName->fetch_assoc();


$fnschname=$sqgtschoolName['borno_school_name'];

$pdf->Ln();

$pdf->Cell(95,35,"",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(95,35,"",1,0,"C");
$pdf->SetFont('Arial','',12);
$pdf->Cell(100,1,'',0,0,"C");
$pdf->Cell(100,1,'',0,0,"C");
$pdf->Ln();
$pdf->Cell(100,1,'',0,5,"C");
$pdf->Cell(100,5,$fnschname,0,0,"C");
$pdf->Cell(100,5,$fnschname,0,0,"C");
$pdf->SetFont('Arial','',11); 
$pdf->Ln();
$pdf->Cell(50,5,$fnschname1,0,0,"R");
$pdf->Cell(12,5,'Exam',0,0,"L");
$pdf->Cell(13,5,$stsess,0);
$pdf->Cell(25,5,'',0);
$pdf->Cell(50,5,$fnschname1,0,0,"R");
$pdf->Cell(12,5,'Exam',0,0,"L");
$pdf->Cell(13,5,$stsess,0);
$pdf->Ln();
$pdf->SetFont('Arial','',11); 
$pdf->Cell(100,5,'Seat Card',0,0,"C");
$pdf->Cell(100,5,'Seat Card',0,0,"C");
$pdf->Ln();

			
		
		$pdf->SetFont('Arial','B',10);
    	$pdf->Cell(5,5,"",0);
  		$pdf->Cell(11,5,"Name:",0);		
		$pdf->Cell(50,5,"",0);
		$pdf->Cell(10,5,"Class:",0);
		$pdf->Cell(14,5,"",0);
		
	  


    	$pdf->Cell(13,5,"",0);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(11,5,"Name:",0);		
		$pdf->Cell(50,5,"",0);
		$pdf->Cell(10,5,"Class:",0);
		$pdf->Cell(14,5,"",0);



$pdf->Ln();
		$pdf->Cell(5,5,"",0);
		$pdf->Cell(10,5,"Roll:",0);
    	$pdf->Cell(51,5,"",0);
    	$pdf->Cell(10,5,"Shift:",0);
		$pdf->Cell(14,5,"",0);
    	$pdf->Cell(13,5,"",0);
		$pdf->Cell(10,5,"Roll:",0);
		$pdf->Cell(51,5,"",0);
		$pdf->Cell(10,5,"Shift:",0);
		$pdf->Cell(14,5,"",0);
		$pdf->Ln();	
		$pdf->Cell(5,5,"",0);
		$pdf->Cell(14,5,"Section:",0);
    	$pdf->Cell(47,5,"",0);
    	$pdf->Cell(14,5,"Session:",0);
		$pdf->Cell(10,5,$stsess,0);
    	$pdf->Cell(13,5,"",0);
		$pdf->Cell(14,5,"Section:",0);
		$pdf->Cell(47,5,"",0);
		$pdf->Cell(14,5,"Session:",0);
		$pdf->Cell(10,5,$stsess,0);
	
		

$pdf->Cell(100,16,'',0,0,"C");	

	
$pdf->Ln();	

$pdf->Cell(95,35,"",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(95,35,"",1,0,"C");
$pdf->SetFont('Arial','',12);
$pdf->Cell(100,1,'',0,0,"C");
$pdf->Cell(100,1,'',0,0,"C");
$pdf->Ln();
$pdf->Cell(100,1,'',0,5,"C");
$pdf->Cell(100,5,$fnschname,0,0,"C");
$pdf->Cell(100,5,$fnschname,0,0,"C");
$pdf->SetFont('Arial','',11); 
$pdf->Ln();
$pdf->Cell(50,5,$fnschname1,0,0,"R");
$pdf->Cell(12,5,'Exam',0,0,"L");
$pdf->Cell(13,5,$stsess,0);
$pdf->Cell(25,5,'',0);
$pdf->Cell(50,5,$fnschname1,0,0,"R");
$pdf->Cell(12,5,'Exam',0,0,"L");
$pdf->Cell(13,5,$stsess,0);
$pdf->Ln();
$pdf->SetFont('Arial','',11); 
$pdf->Cell(100,5,'Seat Card',0,0,"C");
$pdf->Cell(100,5,'Seat Card',0,0,"C");
$pdf->Ln();

			
		
		$pdf->SetFont('Arial','B',10);
    	$pdf->Cell(5,5,"",0);
  		$pdf->Cell(11,5,"Name:",0);		
		$pdf->Cell(50,5,"",0);
		$pdf->Cell(10,5,"Class:",0);
		$pdf->Cell(14,5,"",0);
		
	  


    	$pdf->Cell(13,5,"",0);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(11,5,"Name:",0);		
		$pdf->Cell(50,5,"",0);
		$pdf->Cell(10,5,"Class:",0);
		$pdf->Cell(14,5,"",0);



$pdf->Ln();
		$pdf->Cell(5,5,"",0);
		$pdf->Cell(10,5,"Roll:",0);
    	$pdf->Cell(51,5,"",0);
    	$pdf->Cell(10,5,"Shift:",0);
		$pdf->Cell(14,5,"",0);
    	$pdf->Cell(13,5,"",0);
		$pdf->Cell(10,5,"Roll:",0);
		$pdf->Cell(51,5,"",0);
		$pdf->Cell(10,5,"Shift:",0);
		$pdf->Cell(14,5,"",0);
		$pdf->Ln();	
		$pdf->Cell(5,5,"",0);
		$pdf->Cell(14,5,"Section:",0);
    	$pdf->Cell(47,5,"",0);
    	$pdf->Cell(14,5,"Session:",0);
		$pdf->Cell(10,5,$stsess,0);
    	$pdf->Cell(13,5,"",0);
		$pdf->Cell(14,5,"Section:",0);
		$pdf->Cell(47,5,"",0);
		$pdf->Cell(14,5,"Session:",0);
		$pdf->Cell(10,5,$stsess,0);
	
		

$pdf->Cell(100,16,'',0,0,"C");	

	
$pdf->Ln();	

$pdf->Cell(95,35,"",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(95,35,"",1,0,"C");
$pdf->SetFont('Arial','',12);
$pdf->Cell(100,1,'',0,0,"C");
$pdf->Cell(100,1,'',0,0,"C");
$pdf->Ln();
$pdf->Cell(100,1,'',0,5,"C");
$pdf->Cell(100,5,$fnschname,0,0,"C");
$pdf->Cell(100,5,$fnschname,0,0,"C");
$pdf->SetFont('Arial','',11); 
$pdf->Ln();
$pdf->Cell(50,5,$fnschname1,0,0,"R");
$pdf->Cell(12,5,'Exam',0,0,"L");
$pdf->Cell(13,5,$stsess,0);
$pdf->Cell(25,5,'',0);
$pdf->Cell(50,5,$fnschname1,0,0,"R");
$pdf->Cell(12,5,'Exam',0,0,"L");
$pdf->Cell(13,5,$stsess,0);
$pdf->Ln();
$pdf->SetFont('Arial','',11); 
$pdf->Cell(100,5,'Seat Card',0,0,"C");
$pdf->Cell(100,5,'Seat Card',0,0,"C");
$pdf->Ln();

			
		
		$pdf->SetFont('Arial','B',10);
    	$pdf->Cell(5,5,"",0);
  		$pdf->Cell(11,5,"Name:",0);		
		$pdf->Cell(50,5,"",0);
		$pdf->Cell(10,5,"Class:",0);
		$pdf->Cell(14,5,"",0);
		
	  


    	$pdf->Cell(13,5,"",0);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(11,5,"Name:",0);		
		$pdf->Cell(50,5,"",0);
		$pdf->Cell(10,5,"Class:",0);
		$pdf->Cell(14,5,"",0);



$pdf->Ln();
		$pdf->Cell(5,5,"",0);
		$pdf->Cell(10,5,"Roll:",0);
    	$pdf->Cell(51,5,"",0);
    	$pdf->Cell(10,5,"Shift:",0);
		$pdf->Cell(14,5,"",0);
    	$pdf->Cell(13,5,"",0);
		$pdf->Cell(10,5,"Roll:",0);
		$pdf->Cell(51,5,"",0);
		$pdf->Cell(10,5,"Shift:",0);
		$pdf->Cell(14,5,"",0);
		$pdf->Ln();	
		$pdf->Cell(5,5,"",0);
		$pdf->Cell(14,5,"Section:",0);
    	$pdf->Cell(47,5,"",0);
    	$pdf->Cell(14,5,"Session:",0);
		$pdf->Cell(10,5,$stsess,0);
    	$pdf->Cell(13,5,"",0);
		$pdf->Cell(14,5,"Section:",0);
		$pdf->Cell(47,5,"",0);
		$pdf->Cell(14,5,"Session:",0);
		$pdf->Cell(10,5,$stsess,0);
	
		

$pdf->Cell(100,16,'',0,0,"C");	

	
$pdf->Ln();	

$pdf->Cell(95,35,"",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(95,35,"",1,0,"C");
$pdf->SetFont('Arial','',12);
$pdf->Cell(100,1,'',0,0,"C");
$pdf->Cell(100,1,'',0,0,"C");
$pdf->Ln();
$pdf->Cell(100,1,'',0,5,"C");
$pdf->Cell(100,5,$fnschname,0,0,"C");
$pdf->Cell(100,5,$fnschname,0,0,"C");
$pdf->SetFont('Arial','',11); 
$pdf->Ln();
$pdf->Cell(50,5,$fnschname1,0,0,"R");
$pdf->Cell(12,5,'Exam',0,0,"L");
$pdf->Cell(13,5,$stsess,0);
$pdf->Cell(25,5,'',0);
$pdf->Cell(50,5,$fnschname1,0,0,"R");
$pdf->Cell(12,5,'Exam',0,0,"L");
$pdf->Cell(13,5,$stsess,0);
$pdf->Ln();
$pdf->SetFont('Arial','',11); 
$pdf->Cell(100,5,'Seat Card',0,0,"C");
$pdf->Cell(100,5,'Seat Card',0,0,"C");
$pdf->Ln();

			
		
		$pdf->SetFont('Arial','B',10);
    	$pdf->Cell(5,5,"",0);
  		$pdf->Cell(11,5,"Name:",0);		
		$pdf->Cell(50,5,"",0);
		$pdf->Cell(10,5,"Class:",0);
		$pdf->Cell(14,5,"",0);
		
	  


    	$pdf->Cell(13,5,"",0);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(11,5,"Name:",0);		
		$pdf->Cell(50,5,"",0);
		$pdf->Cell(10,5,"Class:",0);
		$pdf->Cell(14,5,"",0);



$pdf->Ln();
		$pdf->Cell(5,5,"",0);
		$pdf->Cell(10,5,"Roll:",0);
    	$pdf->Cell(51,5,"",0);
    	$pdf->Cell(10,5,"Shift:",0);
		$pdf->Cell(14,5,"",0);
    	$pdf->Cell(13,5,"",0);
		$pdf->Cell(10,5,"Roll:",0);
		$pdf->Cell(51,5,"",0);
		$pdf->Cell(10,5,"Shift:",0);
		$pdf->Cell(14,5,"",0);
		$pdf->Ln();	
		$pdf->Cell(5,5,"",0);
		$pdf->Cell(14,5,"Section:",0);
    	$pdf->Cell(47,5,"",0);
    	$pdf->Cell(14,5,"Session:",0);
		$pdf->Cell(10,5,$stsess,0);
    	$pdf->Cell(13,5,"",0);
		$pdf->Cell(14,5,"Section:",0);
		$pdf->Cell(47,5,"",0);
		$pdf->Cell(14,5,"Session:",0);
		$pdf->Cell(10,5,$stsess,0);
	
		

$pdf->Cell(100,16,'',0,0,"C");	

	
$pdf->Ln();	

$pdf->Cell(95,35,"",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(95,35,"",1,0,"C");
$pdf->SetFont('Arial','',12);
$pdf->Cell(100,1,'',0,0,"C");
$pdf->Cell(100,1,'',0,0,"C");
$pdf->Ln();
$pdf->Cell(100,1,'',0,5,"C");
$pdf->Cell(100,5,$fnschname,0,0,"C");
$pdf->Cell(100,5,$fnschname,0,0,"C");
$pdf->SetFont('Arial','',11); 
$pdf->Ln();
$pdf->Cell(50,5,$fnschname1,0,0,"R");
$pdf->Cell(12,5,'Exam',0,0,"L");
$pdf->Cell(13,5,$stsess,0);
$pdf->Cell(25,5,'',0);
$pdf->Cell(50,5,$fnschname1,0,0,"R");
$pdf->Cell(12,5,'Exam',0,0,"L");
$pdf->Cell(13,5,$stsess,0);
$pdf->Ln();
$pdf->SetFont('Arial','',11); 
$pdf->Cell(100,5,'Seat Card',0,0,"C");
$pdf->Cell(100,5,'Seat Card',0,0,"C");
$pdf->Ln();

			
		
		$pdf->SetFont('Arial','B',10);
    	$pdf->Cell(5,5,"",0);
  		$pdf->Cell(11,5,"Name:",0);		
		$pdf->Cell(50,5,"",0);
		$pdf->Cell(10,5,"Class:",0);
		$pdf->Cell(14,5,"",0);
		
	  


    	$pdf->Cell(13,5,"",0);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(11,5,"Name:",0);		
		$pdf->Cell(50,5,"",0);
		$pdf->Cell(10,5,"Class:",0);
		$pdf->Cell(14,5,"",0);



$pdf->Ln();
		$pdf->Cell(5,5,"",0);
		$pdf->Cell(10,5,"Roll:",0);
    	$pdf->Cell(51,5,"",0);
    	$pdf->Cell(10,5,"Shift:",0);
		$pdf->Cell(14,5,"",0);
    	$pdf->Cell(13,5,"",0);
		$pdf->Cell(10,5,"Roll:",0);
		$pdf->Cell(51,5,"",0);
		$pdf->Cell(10,5,"Shift:",0);
		$pdf->Cell(14,5,"",0);
		$pdf->Ln();	
		$pdf->Cell(5,5,"",0);
		$pdf->Cell(14,5,"Section:",0);
    	$pdf->Cell(47,5,"",0);
    	$pdf->Cell(14,5,"Session:",0);
		$pdf->Cell(10,5,$stsess,0);
    	$pdf->Cell(13,5,"",0);
		$pdf->Cell(14,5,"Section:",0);
		$pdf->Cell(47,5,"",0);
		$pdf->Cell(14,5,"Session:",0);
		$pdf->Cell(10,5,$stsess,0);
	
		

$pdf->Cell(100,16,'',0,0,"C");	

	
$pdf->Ln();	

$pdf->Cell(95,35,"",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(95,35,"",1,0,"C");
$pdf->SetFont('Arial','',12);
$pdf->Cell(100,1,'',0,0,"C");
$pdf->Cell(100,1,'',0,0,"C");
$pdf->Ln();
$pdf->Cell(100,1,'',0,5,"C");
$pdf->Cell(100,5,$fnschname,0,0,"C");
$pdf->Cell(100,5,$fnschname,0,0,"C");
$pdf->SetFont('Arial','',11); 
$pdf->Ln();
$pdf->Cell(50,5,$fnschname1,0,0,"R");
$pdf->Cell(12,5,'Exam',0,0,"L");
$pdf->Cell(13,5,$stsess,0);
$pdf->Cell(25,5,'',0);
$pdf->Cell(50,5,$fnschname1,0,0,"R");
$pdf->Cell(12,5,'Exam',0,0,"L");
$pdf->Cell(13,5,$stsess,0);
$pdf->Ln();
$pdf->SetFont('Arial','',11); 
$pdf->Cell(100,5,'Seat Card',0,0,"C");
$pdf->Cell(100,5,'Seat Card',0,0,"C");
$pdf->Ln();

			
		
		$pdf->SetFont('Arial','B',10);
    	$pdf->Cell(5,5,"",0);
  		$pdf->Cell(11,5,"Name:",0);		
		$pdf->Cell(50,5,"",0);
		$pdf->Cell(10,5,"Class:",0);
		$pdf->Cell(14,5,"",0);
		
	  


    	$pdf->Cell(13,5,"",0);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(11,5,"Name:",0);		
		$pdf->Cell(50,5,"",0);
		$pdf->Cell(10,5,"Class:",0);
		$pdf->Cell(14,5,"",0);



$pdf->Ln();
		$pdf->Cell(5,5,"",0);
		$pdf->Cell(10,5,"Roll:",0);
    	$pdf->Cell(51,5,"",0);
    	$pdf->Cell(10,5,"Shift:",0);
		$pdf->Cell(14,5,"",0);
    	$pdf->Cell(13,5,"",0);
		$pdf->Cell(10,5,"Roll:",0);
		$pdf->Cell(51,5,"",0);
		$pdf->Cell(10,5,"Shift:",0);
		$pdf->Cell(14,5,"",0);
		$pdf->Ln();	
		$pdf->Cell(5,5,"",0);
		$pdf->Cell(14,5,"Section:",0);
    	$pdf->Cell(47,5,"",0);
    	$pdf->Cell(14,5,"Session:",0);
		$pdf->Cell(10,5,$stsess,0);
    	$pdf->Cell(13,5,"",0);
		$pdf->Cell(14,5,"Section:",0);
		$pdf->Cell(47,5,"",0);
		$pdf->Cell(14,5,"Session:",0);
		$pdf->Cell(10,5,$stsess,0);
	
		


$pdf->Cell(100,16,'',0,0,"C");	
	
$pdf->Ln();	






				

$pdf->Output();
?>