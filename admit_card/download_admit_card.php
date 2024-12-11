<?php

$branchId=$_GET['stbranch'];
$schId=$_GET['schoolId'];
$studClass=$_GET['classId'];
$shiftId=$_GET['shiftId'];
$section=$_GET['sectionId'];
$stsess=$_GET['scsess'];
$gttermId=$_GET['sctermId'];



include('../connection.php');

$gtbranch="SELECT * FROM borno_school_branch where borno_school_id=$schId AND borno_school_branch_id=$branchId";
					$qgtbranch=$mysqli->query($gtbranch);
					$sqgtbranch=$qgtbranch->fetch_assoc();
$fnsbranch=$sqgtbranch['borno_school_branch_name'];

$gtclass="SELECT * FROM borno_school_class where borno_school_class_id=$studClass";
					$qgtclass=$mysqli->query($gtclass);
					$sqgtclass=$qgtclass->fetch_assoc();
$fnsclass=$sqgtclass['borno_school_class_name'];
//if($fnsclass1=='Eleven') { $fnsclass='Twelve';  } else { $fnsclass=$fnsclass1; }

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

$gtmaxroll="select * from borno_student_info where borno_school_section_id='$section' AND borno_school_session='$stsess' order by borno_school_roll desc limit 0,1";
					$qgtmaxroll=$mysqli->query($gtmaxroll);
					$sqgtmaxroll=$qgtmaxroll->fetch_assoc();
$maxroll=$sqgtmaxroll['borno_school_roll'];
$maxroll1=$maxroll+1;

$gtminroll="select * from borno_student_info where borno_school_section_id='$section' AND borno_school_session='$stsess' order by borno_school_roll asc limit 0,1";
					$qgtminroll=$mysqli->query($gtminroll);
					$sqgtminroll=$qgtminroll->fetch_assoc();
$minroll=$sqgtminroll['borno_school_roll'];

require('../pannel/fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage('L');

					$gtschoolName="SELECT * FROM borno_school where borno_school_id=$schId";
					$qgtschoolName=$mysqli->query($gtschoolName);
					$sqgtschoolName=$qgtschoolName->fetch_assoc();


$fnschname=$sqgtschoolName['borno_school_name'];
$fnshead=$sqgtschoolName['borno_school_head'];

$pdf->Ln();



			
				$data="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_school_roll between '$minroll' AND '$maxroll' order by borno_school_roll asc";

$stroll=$minroll;
$sl=0;
					$qdata=$mysqli->query($data);
					while($showdata=$qdata->fetch_assoc()){ $sl++;
		
	

if ($stroll<=$maxroll)
{	

$pdf->Cell(135,83,"",1,0,"C");
$pdf->Cell(10,5,"",0,0,"C");
$pdf->Cell(135,83,"",1,0,"C");
$pdf->Cell(10,5,"",2,0,"C");
$pdf->SetFont('Arial','B',16);
$pdf->Ln();
$pdf->Cell(140,5,$fnschname,0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(140,5,$fnschname,0,0,"C");
$pdf->SetFont('Arial','',14); 
$pdf->Ln();
$pdf->Cell(280,2,'',0,5,"C");
$pdf->Cell(93,5,$fnschname1,0,0,"R");
// $pdf->Cell(15,5,'Exam',0,0,"L");
// $pdf->Cell(10,5,$stsess,0);
$pdf->Cell(50,5,'',0);
$pdf->Cell(93,5,$fnschname1,0,0,"R");
// $pdf->Cell(15,5,'Exam',0,0,"L");
// $pdf->Cell(10,5,$stsess,0);
$pdf->Ln();
$pdf->SetFont('Arial','',16); 
$pdf->Cell(140,3,'',0,5,"C");
$pdf->Cell(140,5,'Admit Card',0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(140,5,'Admit Card',0,0,"C");
$pdf->Cell(140,5,'',0,5,"C");
$pdf->Ln();
$pdf->Ln();
firstline:	
if ($stroll<=$maxroll)
{
 $result2 ="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_school_roll='$stroll'";
					$qresult2=$mysqli->query($result2);
					$row2=$qresult2->fetch_assoc();

   	$stName=substr($row2['borno_school_student_name'],0,22); 
   
 	$stphoto=$row2['borno_school_photo'];
	if($row2['borno_school_photo']!=""){
	
	$stphotofina="../student/studentphoto/$stphoto";
	
	} else {
	
	$stphotofina="../student/studentphoto/nophoto.jpg";
	
	}
	
	
	
	$getschLogo=$sqgtschoolName['borno_school_logo'];	
	if($sqgtschoolName['borno_school_logo']!=""){
	
	$getschLogof="../infosett/school-logo/$getschLogo";
	
	} else {
	
	$getschLogof="../infosett/school-logo/nologo.png";
	
	}
	

	
//	$pdf->Image("$stphotofina", 117, 20, 24, 24);
	$pdf->Image("$getschLogof", 12, 20, 24, 24);
		

if($stName=="")
{
  $stroll=$stroll+1;
  goto firstline;
}			
		
		$pdf->SetFont('Arial','B',12);
        $pdf->Cell(8,5,"",0);
		$pdf->Cell(15,5,"Name :",0);		
		$pdf->Cell(72,5,$stName,0);
		$pdf->Cell(15,5,"Class :",0);
		$pdf->Cell(25,5,$fnsclass,0);
		
	    $stroll1=$stroll+1;
		
lastline:
if ($stroll1<=$maxroll)
{
 $result1 ="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_school_roll='$stroll1'";
					$qresult1=$mysqli->query($result1);
					$row1=$qresult1->fetch_assoc();

$stName1=substr($row1['borno_school_student_name'],0,22);
$stphoto1=$row1['borno_school_photo'];
	if($row1['borno_school_photo']!=""){
	
	$stphotofina1="../student/studentphoto/$stphoto1";
	
	} else {
	
	$stphotofina1="../student/studentphoto/nophoto.jpg";
	
	}
//	$pdf->Image("$stphotofina1", 262, 20, 24, 24);
	$pdf->Image("$getschLogof", 157, 20, 24, 24);

 if($stName1=="")
{
  $stroll1=$stroll1+1;
  goto lastline;
}


    	$pdf->Cell(18,5,"",0);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(15,5,"Name :",0);		
		$pdf->Cell(72,5,$stName1,0);
		$pdf->Cell(15,5,"Class :",0);
		$pdf->Cell(25,5,$fnsclass,0);

}

$pdf->Ln();
		$pdf->Cell(280,2,'',0,5,"C");
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(8,5,"",0);
	  	$pdf->Cell(12,5,"Roll :",0);
	 	$pdf->Cell(75,5,$stroll,0);	
		$pdf->Cell(13,5,"Shift :",0);
		$pdf->Cell(27,5,$fnsshift,0);
		$pdf->Cell(18,5,"",0);
    	$pdf->Cell(12,5,"Roll :",0);
		$pdf->Cell(75,5,$stroll1,0);
		$pdf->Cell(13,5,"Shift :",0);
		$pdf->Cell(27,5,$fnsshift,0);			
	
		
	    $pdf->Ln();
		$pdf->Cell(280,2,'',0,5,"C");
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(8,5,"",0);
	  	$pdf->Cell(20,5,"Section :",0);
	 	$pdf->Cell(67,5,$fnssection,0);	
		$pdf->Cell(20,5,"Session :",0);
		$pdf->Cell(20,5,$stsess,0);
		$pdf->Cell(18,5,"",0);
    	$pdf->Cell(20,5,"Section :",0);
		$pdf->Cell(67,5,$fnssection,0);
		$pdf->Cell(20,5,"Session :",0);
		$pdf->Cell(20,5,$stsess,0);	
		$pdf->Ln();

if($schId==19){        $pdf->Cell(280,2,'',0,5,"C");}
else{        $pdf->Cell(280,5,'',0,5,"C");}



 $getHSsignature=$sqgtschoolName['signature'];
 if($sqgtschoolName['signature']!=""){
	
	$getHSsignaturef="../teacher/signature/$getHSsignature";
	
	} else {
	
	$getHSsignaturef="../teacher/signature/nophoto.jpg";
	
	}
 
 
 //$getHSsignaturef="../teacher/signature/$getHSsignature";
 
 //$pdf->Image("$getHSsignaturef", 240, 72, 30, 10); 
 $pdf->Image("$getHSsignaturef", 100, 72, 30, 10);
 
if($schId==19){
    

		$pdf->Cell(8,5,"",0);
	  	$pdf->Cell(20,5,"Hall No :",0);
	  	$pdf->Cell(125,5,"",0);
	  	$pdf->Cell(20,5,"Hall No :",0);
$pdf->Ln();
 $pdf->Cell(280,4,'',0,5,"C");
$pdf->Ln();    
}
else
{
$pdf->Ln();	
$pdf->Ln();
}
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
$pdf->Cell(280,3,'',0,5,"C");
$pdf->Ln();	
$stroll=$stroll1+1;
$stName1="";
$stName="";
$stphoto="";
$stphoto1="";
$stphotofina="";
$stphotofina1="";
}
}

if ($stroll<=$maxroll)
{	

$pdf->Cell(135,83,"",1,0,"C");
$pdf->Cell(10,5,"",0,0,"C");
$pdf->Cell(135,83,"",1,0,"C");
$pdf->Cell(10,5,"",2,0,"C");
$pdf->SetFont('Arial','B',16);
$pdf->Ln();
$pdf->Cell(140,5,$fnschname,0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(140,5,$fnschname,0,0,"C");
$pdf->SetFont('Arial','',14); 
$pdf->Ln();
$pdf->Cell(280,2,'',0,5,"C");
$pdf->Cell(93,5,$fnschname1,0,0,"R");
// $pdf->Cell(15,5,'Exam',0,0,"L");
// $pdf->Cell(10,5,$stsess,0);
$pdf->Cell(50,5,'',0);
$pdf->Cell(93,5,$fnschname1,0,0,"R");
// $pdf->Cell(15,5,'Exam',0,0,"L");
// $pdf->Cell(10,5,$stsess,0);
$pdf->Ln();
$pdf->SetFont('Arial','',16); 
$pdf->Cell(140,3,'',0,5,"C");
$pdf->Cell(140,5,'Admit Card',0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(140,5,'Admit Card',0,0,"C");
$pdf->Cell(140,5,'',0,5,"C");
$pdf->Ln();
$pdf->Ln();
firstline1:	
if ($stroll<=$maxroll)
{
$result2 ="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_school_roll='$stroll'";
					$qresult2=$mysqli->query($result2);
					$row2=$qresult2->fetch_assoc();

   	$stName=substr($row2['borno_school_student_name'],0,22); 
   
 	$stphoto=$row2['borno_school_photo'];
	if($row2['borno_school_photo']!=""){
	
	$stphotofina="../student/studentphoto/$stphoto";
	
	} else {
	
	$stphotofina="../student/studentphoto/nophoto.jpg";
	
	}
	
	
	
	//  $pdf->Image("$stphotofina", 117, 116, 24, 24);
	
	  $pdf->Image("$getschLogof", 12, 116, 24, 24);

		

if($stName=="")
{
  $stroll=$stroll+1;
  goto firstline1;
}			
		
		$pdf->SetFont('Arial','',14);
		$pdf->SetFont('Arial','B',12);
        $pdf->Cell(8,5,"",0);
		$pdf->Cell(15,5,"Name:",0);		
		$pdf->Cell(72,5,$stName,0);
		$pdf->Cell(15,5,"Class:",0);
		$pdf->Cell(25,5,$fnsclass,0);
		
	    $stroll1=$stroll+1;
		
lastline1:
if ($stroll1<=$maxroll)
{
$result1 ="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_school_roll='$stroll1'";
					$qresult1=$mysqli->query($result1);
					$row1=$qresult1->fetch_assoc();

$stName1=substr($row1['borno_school_student_name'],0,22);
$stphoto1=$row1['borno_school_photo'];
	if($row1['borno_school_photo']!=""){
	
	$stphotofina1="../student/studentphoto/$stphoto1";
	
	} else {
	
	$stphotofina1="../student/studentphoto/nophoto.jpg";
	
	}
//	$pdf->Image("$stphotofina1", 262, 116, 24, 24);
	$pdf->Image("$getschLogof", 157, 116, 24, 24);

 if($stName1=="")
{
  $stroll1=$stroll1+1;
  goto lastline1;
}


    	$pdf->Cell(18,5,"",0);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(15,5,"Name:",0);		
		$pdf->Cell(72,5,$stName1,0);
		$pdf->Cell(15,5,"Class:",0);
		$pdf->Cell(25,5,$fnsclass,0);

}

$pdf->Ln();
		$pdf->Cell(280,2,'',0,5,"C");
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(8,5,"",0);
	  	$pdf->Cell(12,5,"Roll:",0);
	 	$pdf->Cell(75,5,$stroll,0);	
		$pdf->Cell(13,5,"Shift:",0);
		$pdf->Cell(27,5,$fnsshift,0);
		$pdf->Cell(18,5,"",0);
    	$pdf->Cell(12,5,"Roll:",0);
		$pdf->Cell(75,5,$stroll1,0);
		$pdf->Cell(13,5,"Shift:",0);
		$pdf->Cell(27,5,$fnsshift,0);			
	
		
	    $pdf->Ln();
		$pdf->Cell(280,2,'',0,5,"C");
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(8,5,"",0);
	  	$pdf->Cell(20,5,"Section:",0);
	 	$pdf->Cell(67,5,$fnssection,0);	
		$pdf->Cell(20,5,"Session:",0);
		$pdf->Cell(20,5,$stsess,0);
		$pdf->Cell(18,5,"",0);
    	$pdf->Cell(20,5,"Section:",0);
		$pdf->Cell(67,5,$fnssection,0);
		$pdf->Cell(20,5,"Session:",0);
		$pdf->Cell(20,5,$stsess,0);		


if($schId==19){  
    $pdf->Ln();
    $pdf->Cell(280,2,'',0,5,"C");}
else{        $pdf->Cell(280,7.5,'',0,5,"C");}

 $pdf->Image("$getHSsignaturef", 240, 169, 30, 10); 
 $pdf->Image("$getHSsignaturef", 100, 169, 30, 10);
	
if($schId==19){
    

		$pdf->Cell(8,5,"",0);
	  	$pdf->Cell(20,5,"Hall No :",0);
	  	$pdf->Cell(125,5,"",0);
	  	$pdf->Cell(20,5,"Hall No :",0);
$pdf->Ln();
 $pdf->Cell(280,5,'',0,5,"C");
$pdf->Ln();    
}
else
{
$pdf->Ln();	
$pdf->Ln();
}
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
$stroll=$stroll1+1;
$stName1="";
$stName="";
$stphoto="";
$stphoto1="";
$stphotofina="";
$stphotofina1="";
}
}	
}

					

$pdf->Output();
?>