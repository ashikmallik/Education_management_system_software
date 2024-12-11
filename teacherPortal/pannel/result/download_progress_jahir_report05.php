<?php
$branchId=$_GET['stbranch'];
$schId=$_GET['schoolId'];
$studClass=$_GET['classId'];
$shiftId=$_GET['shiftId'];
$section=$_GET['sectionId'];
$stsess=$_GET['scsess'];
$term=$_GET['sctermId'];
$group=$_GET['group'];
$rollf=$_GET['rollf'];
$rollt=$_GET['rollt'];

include('../../../connection.php');
					$gtschoolName="SELECT * FROM borno_school where borno_school_id=$schId";
					$qgtschoolName=$mysqli->query($gtschoolName);
					$sqgtschoolName=$qgtschoolName->fetch_assoc();
$fnschname=$sqgtschoolName['borno_school_name'];
$fnshead=$sqgtschoolName['borno_school_head'];


	$gtschoolLogo=$sqgtschoolName['borno_school_logo'];
	if($gtschoolLogo!=""){
	
	$finalSchoolLogo="../infosett/school-logo/$gtschoolLogo";
	
	} else {
		$finalSchoolLogo="../infosett/school-logo/nologo.png";
		}
		


$gtschoolsignature=$sqgtschoolName['signature'];
	if($gtschoolsignature!=""){
	
	$finalgtschoolsignature="../teacher/signature/$gtschoolsignature";
	
	} else {
		$finalgtschoolsignature="../teacher/signature/nophoto.jpg";
		}
		
	

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

$gtterm="SELECT * FROM borno_result_add_term where borno_result_term_id=$term";
					$qgtterm=$mysqli->query($gtterm);
					$sqgtterm=$qgtterm->fetch_assoc();
$fnsterm=$sqgtterm['borno_result_term_name'];

$gtgpa="SELECT * FROM borno_result_add_term where borno_result_term_id=$term";
					$qgtgpa=$mysqli->query($gtgpa);
					$sqqgtgpa=$qgtgpa->fetch_assoc();
$fnsterm=$sqgtterm['borno_result_term_name'];

$gtstotalday ="select * from borno_school_schooling_day where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term";
	                $qggtstotalday=$mysqli->query($gtstotalday);
					$stgqggtstotalday=$qggtstotalday->fetch_assoc();
					$schoolingday=$stgqggtstotalday['borno_school_schooling_day'];
					$publish=$stgqggtstotalday['borno_school_publish_date'];

if($studClass==3){					
$finalSchoolLogo="khjuhs.jpg";
}
elseif($studClass==4 OR $studClass==5){					
$finalSchoolLogo="khjuhs67.jpg";
}
elseif($studClass==1 OR $studClass==2){
if($group==1){    
$finalSchoolLogo="khjuhsScience.jpg";
}
elseif($group==2){    
$finalSchoolLogo="khjuhsBusiness.jpg";
}
elseif($group==3){    
$finalSchoolLogo="khjuhsHumanities.jpg";
}
}
$finalLogo="KHJUHSLogo.jpg";
require('../../fpdf/fpdf.php');
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    //$this->Image('logo.png',10,6,30);
    // Arial bold 15
    //$this->SetFont('Arial','B',15);
    // Move to the right
    //$this->Cell(80);
    // Title
  
	//$this->Cell(30,10,$GLOBALS['gtSchoolName'],0,1,'C');
    // Line break
    //$this->Ln(20);
	
	$finalSchoolLogo1=$GLOBALS['finalSchoolLogo'];
	if($GLOBALS['group']==2){
    $this->Image($finalSchoolLogo1,0,2,210,293);   
	}
	elseif($GLOBALS['group']==3){
    $this->Image($finalSchoolLogo1,0,2,210,293);   
	}	
	else{
	$this->Image($finalSchoolLogo1,0,2,210,294);    
	}
	$finalSchoolLogo13=$GLOBALS['finalLogo'];
  
    $this->Image($finalSchoolLogo13,10,10,32,32);	
}

// Page footer
function Footer()
{
    
	$finalgtschoolsignature1=$GLOBALS['finalgtschoolsignature'];
  if($GLOBALS['studClass']==3){
  $this->Image($finalgtschoolsignature1,160,270,40,12);
  }
  elseif($GLOBALS['studClass']==4 OR $GLOBALS['studClass']==5){
  $this->Image($finalgtschoolsignature1,160,275,40,12);
  }
  elseif($GLOBALS['studClass']==1 OR $GLOBALS['studClass']==2){
  if($GLOBALS['group']==1 OR $GLOBALS['group']==3){          
  $this->Image($finalgtschoolsignature1,160,274,40,12);
  }
  else{          
  $this->Image($finalgtschoolsignature1,160,274,40,12);
  }
      
  }
	// Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','',14);
    // Page number
//	$this->Cell(90,1,"----------------------------",0,0,"C"); 
//	$this->Cell(90,1,"-------------------------------------",0,0,"C"); 
	
//	$this->Cell(90,1,"---------------------------------------",0,0,"C"); 
	$this->Ln();
//	$this->Cell(90,5,"Guardian's Signature",0,0,"C"); 
	

 //   $this->Cell(90,5,"Class Teacher's Signature",0,0,"C");
//	$this->Cell(45,5,$GLOBALS['fnshead'],0,0,"R");
//	$this->Cell(45,5," Signature",0,0,"L"); 
	$this->SetFont('Arial','',8);
	$this->Ln();
//	$this->Cell(20,5,"Publish Date : ",0,0,"L"); 
//	$this->Cell(90,5,$GLOBALS['publish'],0,0,"L"); 
   // $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

if($studClass==1 OR $studClass==2)
{
    
    
if($group==1){    
  $result23 ="select * from borno_school_9_10_merit where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll between $rollf AND $rollt order by borno_school_roll asc";
$snl=0;
					$qgresult23=$mysqli->query($result23);
					while($row23=$qgresult23->fetch_assoc()){ $snl++;

					$gtstotal111=$row23['borno_school_roll'];
                    $gtstdid=$row23['borno_student_info_id'];

   

//----------------- School Name ------------------------------------------------------------------
$gtstname ="select * from borno_student_info where borno_student_info_id='$gtstdid'";

$pdf->SetFont('Arial','U',12);
					$qgtstname=$mysqli->query($gtstname);
					$stgtstname=$qgtstname->fetch_assoc();
$fstname=substr($stgtstname['borno_school_student_name'],0,21);


	
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(40,4,'',0,0,"L");
$pdf->Ln();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,$fstname,0,0,"L");
$pdf->Ln();
$pdf->Cell(40,2.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,$fnsclass,0,0,"L");	
$pdf->Ln();
$pdf->Cell(40,2,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,$fnssection,0,0,"L");	
$pdf->Ln();
$pdf->Cell(40,2.5,'',0,0,"L");
$pdf->Ln();
if($group==1){    
$dept="Science";
}
elseif($group==2){    
$dept="Business";
}
elseif($group==3){    
$dept="Humanities";
}
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,$dept,0,0,"L");	
$pdf->Ln();
$pdf->Cell(40,2.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,$gtstotal111,0,0,"L");	
$pdf->Ln();
$pdf->Cell(40,2.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,$stsess,0,0,"L");	
$pdf->Ln();
$pdf->Cell(40,2.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,'',0,0,"L");	
$pdf->Ln();
$pdf->Cell(40,3,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,$fnsterm,0,0,"L");	





		$pdf->SetFont('Arial','',7);  
				
		
	
		


$pdf->Ln();




	

$pdf->Cell(220,4.5,'',0,0,"L");
$pdf->Ln();
$pdf->Ln();


		
		


$pdf->Ln();
		
		


$gtstotalban ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group'  AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=1";
					$qgtstotalban=$mysqli->query($gtstotalban);
					$sqgtstotalban=$qgtstotalban->fetch_assoc();		
		            $stNbangla=$sqgtstotalban['borno_subject_nine_ten_id'];
		            $stNbangla1=$sqgtstotalban['temp_res_number_type1'];
		            $stNbangla2=$sqgtstotalban['temp_res_number_type2'];
		            $stNbangla3=$sqgtstotalban['temp_res_number_type3'];
		            $stNbangla4=$sqgtstotalban['temp_res_number_type4'];
		            $stNbangla5=$sqgtstotalban['temp_res_number_type5'];
		            $stNbangla6=$sqgtstotalban['temp_res_number_type6'];
		            

 $gtstotalban1 ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=2";
					$qgtstotalban1=$mysqli->query($gtstotalban1);
					$sqgtstotalban1=$qgtstotalban1->fetch_assoc(); 
					$stNbanglatotal=$sqgtstotalban1['res_total_conv'];
    				$stphoneban=$sqgtstotalban1['res_gpa'];
					$stgpban=$sqgtstotalban1['res_lg'];

				


$pdf->SetFont('Arial','B',13);  	
$pdf->Cell(40,5.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(108,5,'',0,0,"L");
$pdf->Cell(13,5,$stNbangla1,0,0,"C");	
$pdf->Cell(16,5,$stNbangla2,0,0,"C");
$pdf->Cell(16,5,'',0,0,"L");
$pdf->Cell(15,10,$stNbanglatotal,0,0,"C");
$pdf->Cell(12,10,$stphoneban,0,0,"C");
$pdf->Cell(18,10,$stgpban,0,0,"C");
$pdf->Cell(1,5.5,'',0,0,"C"); 
 $gtstotalban22 ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=2";
					$qgtstotalban22=$mysqli->query($gtstotalban22);
					$sqgtstotalban22=$qgtstotalban22->fetch_assoc();		
		            $stNbangla=$sqgtstotalban22['borno_subject_nine_ten_id'];
		            $stNbangla11=$sqgtstotalban22['temp_res_number_type1'];
		            $stNbangla21=$sqgtstotalban22['temp_res_number_type2'];
		            $stNbangla31=$sqgtstotalban22['temp_res_number_type3'];
		            $stNbangla41=$sqgtstotalban22['temp_res_number_type4'];
		            $stNbangla51=$sqgtstotalban22['temp_res_number_type5'];
		            $stNbangla61=$sqgtstotalban22['temp_res_number_type6'];
		            $stNbanglatotal1=$sqgtstotalban22['total_mark'];

 $gtstotalban12 ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=2";
					$qgtstotalban12=$mysqli->query($gtstotalban12);
					$sqgtstotalban12=$qgtstotalban12->fetch_assoc();    
    				$stphoneban1=$sqgtstotalban12['res_gpa'];
					$stgpban1=$sqgtstotalban12['res_lg'];


				


$pdf->SetFont('Arial','B',13);  	
$pdf->Ln();

$pdf->Cell(108,5,'',0,0,"L");
$pdf->Cell(13,5,$stNbangla11,0,0,"C");	
$pdf->Cell(16,5,$stNbangla21,0,0,"C");
$pdf->Cell(16,5,'',0,0,"L");
$pdf->Cell(15,5,'',0,0,"C");
$pdf->Cell(12,5,'',0,0,"C");
$pdf->Cell(18,5,'',0,0,"C");

 $gtstotaleng ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=3";
					$qgtstotaleng=$mysqli->query($gtstotaleng);
					$sqgtstotaleng=$qgtstotaleng->fetch_assoc();		
		            $stNenglish=$sqgtstotaleng['borno_subject_nine_ten_id'];
		            $stNenglish1=$sqgtstotaleng['temp_res_number_type1'];
		            $stNenglish2=$sqgtstotaleng['temp_res_number_type2'];
		            $stNenglish3=$sqgtstotaleng['temp_res_number_type3'];
		            $stNenglish4=$sqgtstotaleng['temp_res_number_type4'];
		            $stNenglish5=$sqgtstotaleng['temp_res_number_type5'];
		            $stNenglish6=$sqgtstotaleng['temp_res_number_type6'];
	
		

 $gtstotaleng1 ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=4";
					$qgtstotaleng1=$mysqli->query($gtstotaleng1);
					$sqgtstotaleng1=$qgtstotaleng1->fetch_assoc(); 
					$stNenglishtotal=$sqgtstotaleng1['res_total_conv'];
    				$stphoneeng=$sqgtstotaleng1['res_gpa'];
					$stgpeng=$sqgtstotaleng1['res_lg'];

				
$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(108,5,'',0,0,"L");
$pdf->Cell(13,5,$stNenglish1,0,0,"C");	
$pdf->Cell(16,5,'',0,0,"C");
$pdf->Cell(16,5,'',0,0,"L");
$pdf->Cell(15,10,$stNenglishtotal,0,0,"C");
$pdf->Cell(12,10,$stphoneeng,0,0,"C");
$pdf->Cell(18,10,$stgpeng,0,0,"C");
$pdf->Cell(1,5,'',0,0,"C");

 $gtstotaleng11 ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=4";
					$qgtstotaleng11=$mysqli->query($gtstotaleng11);
					$sqgtstotaleng11=$qgtstotaleng11->fetch_assoc();		
		            $stNenglish=$sqgtstotaleng11['borno_subject_nine_ten_id'];
		            $stNenglish11=$sqgtstotaleng11['temp_res_number_type1'];
		            $stNenglish21=$sqgtstotaleng11['temp_res_number_type2'];
		            $stNenglish31=$sqgtstotaleng11['temp_res_number_type3'];
		            $stNenglish41=$sqgtstotaleng11['temp_res_number_type4'];
		            $stNenglish51=$sqgtstotaleng11['temp_res_number_type5'];
		            $stNenglish61=$sqgtstotaleng11['temp_res_number_type6'];
		            $stNenglishtotal1=$sqgtstotaleng11['total_mark'];
		

 $gtstotaleng12 ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=4";
					$qgtstotaleng12=$mysqli->query($gtstotaleng12);
					$sqgtstotaleng12=$qgtstotaleng12->fetch_assoc();    
    				$stphoneeng1=$sqgtstotaleng12['res_gpa'];
					$stgpeng1=$sqgtstotaleng12['res_lg'];

				
$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(108,5,'',0,0,"L");
$pdf->Cell(13,5,$stNenglish11,0,0,"C");	
$pdf->Cell(16,5,'',0,0,"C");
$pdf->Cell(16,5,'',0,0,"L");
$pdf->Cell(15,5,'',0,0,"C");
$pdf->Cell(12,5,'',0,0,"C");
$pdf->Cell(18,5,'',0,0,"C");

 $gtstotaleng11 ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=5";
					$qgtstotaleng11=$mysqli->query($gtstotaleng11);
					$sqgtstotaleng11=$qgtstotaleng11->fetch_assoc();		
		            $stNenglish11=$sqgtstotaleng11['temp_res_number_type1'];
		            $stNenglish21=$sqgtstotaleng11['temp_res_number_type2'];
		            $stNenglish31=$sqgtstotaleng11['temp_res_number_type3'];
		            $stNenglish41=$sqgtstotaleng11['temp_res_number_type4'];
		            $stNenglish51=$sqgtstotaleng11['temp_res_number_type5'];
		            $stNenglish61=$sqgtstotaleng11['temp_res_number_type6'];
		            $stNenglishtotal1=$sqgtstotaleng11['total_marks'];
		

 $gtstotaleng21 ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=5";
					$qgtstotaleng21=$mysqli->query($gtstotaleng21);
					$sqgtstotaleng21=$qgtstotaleng21->fetch_assoc();    
    				$stphoneeng1=$sqgtstotaleng21['res_gpa'];
					$stgpeng1=$sqgtstotaleng21['res_lg'];		

$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(108,5,'',0,0,"L");
$pdf->Cell(13,5,$stNenglish11,0,0,"C");	
$pdf->Cell(16,5,$stNenglish21,0,0,"C");
$pdf->Cell(16,5,'',0,0,"L");
$pdf->Cell(15,5,$stNenglishtotal1,0,0,"C");
$pdf->Cell(12,5,$stphoneeng1,0,0,"C");
$pdf->Cell(18,5,$stgpeng1,0,0,"C");

 $gtstotaleng112 ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=6";
					$qgtstotaleng112=$mysqli->query($gtstotaleng112);
					$sqgtstotaleng112=$qgtstotaleng112->fetch_assoc();		
		            $stNenglish112=$sqgtstotaleng112['temp_res_number_type1'];
		            $stNenglish212=$sqgtstotaleng112['temp_res_number_type2'];
		            $stNenglish312=$sqgtstotaleng112['temp_res_number_type3'];
		            $stNenglish412=$sqgtstotaleng112['temp_res_number_type4'];
		            $stNenglish512=$sqgtstotaleng112['temp_res_number_type5'];
		            $stNenglish612=$sqgtstotaleng112['temp_res_number_type6'];
		            $stNenglishtotal12=$sqgtstotaleng112['total_marks'];
		

 $gtstotaleng212 ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=6";
					$qgtstotaleng212=$mysqli->query($gtstotaleng212);
					$sqgtstotaleng212=$qgtstotaleng212->fetch_assoc();    
    				$stphoneeng12=$sqgtstotaleng212['res_gpa'];
					$stgpeng12=$sqgtstotaleng212['res_lg'];		

$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(108,5,'',0,0,"L");
$pdf->Cell(13,5,$stNenglish112,0,0,"C");	
$pdf->Cell(16,5,$stNenglish212,0,0,"C");
$pdf->Cell(16,5,'',0,0,"L");
$pdf->Cell(15,5,$stNenglishtotal12,0,0,"C");
$pdf->Cell(12,5,$stphoneeng12,0,0,"C");
$pdf->Cell(18,5,$stgpeng12,0,0,"C");

$gtstotaleng1123 ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=8";
					$qgtstotaleng1123=$mysqli->query($gtstotaleng1123);
					$sqgtstotaleng1123=$qgtstotaleng1123->fetch_assoc();		
		            $stNenglish1123=$sqgtstotaleng1123['temp_res_number_type1'];
		            $stNenglish2123=$sqgtstotaleng1123['temp_res_number_type2'];
		            $stNenglish3123=$sqgtstotaleng1123['temp_res_number_type3'];
		            $stNenglish4123=$sqgtstotaleng1123['temp_res_number_type4'];
		            $stNenglish5123=$sqgtstotaleng1123['temp_res_number_type5'];
		            $stNenglish6123=$sqgtstotaleng1123['temp_res_number_type6'];
		            $stNenglishtotal123=$sqgtstotaleng1123['total_marks'];
		

$gtstotaleng2123 ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=8";
					$qgtstotaleng2123=$mysqli->query($gtstotaleng2123);
					$sqgtstotaleng2123=$qgtstotaleng2123->fetch_assoc();    
    				$stphoneeng123=$sqgtstotaleng2123['res_gpa'];
					$stgpeng123=$sqgtstotaleng2123['res_lg'];		

$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(108,5,'',0,0,"L");
$pdf->Cell(13,5,'',0,0,"C");	
$pdf->Cell(16,5,$stNenglish2123,0,0,"C");
$pdf->Cell(16,5,$stNenglish3123,0,0,"C");
$pdf->Cell(15,5,$stNenglishtotal123,0,0,"C");
$pdf->Cell(12,5,$stphoneeng123,0,0,"C");
$pdf->Cell(18,5,$stgpeng123,0,0,"C");



$gtstotaleng11234 ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=10";
					$qgtstotaleng11234=$mysqli->query($gtstotaleng11234);
					$sqgtstotaleng11234=$qgtstotaleng11234->fetch_assoc();		
		      $stNenglish11234=$sqgtstotaleng11234['temp_res_number_type1'];
		      $stNenglish21234=$sqgtstotaleng11234['temp_res_number_type2'];
		      $stNenglish31234=$sqgtstotaleng11234['temp_res_number_type3'];
		      $stNenglish41234=$sqgtstotaleng11234['temp_res_number_type4'];
		      $stNenglish51234=$sqgtstotaleng11234['temp_res_number_type5'];
		      $stNenglish61234=$sqgtstotaleng11234['temp_res_number_type6'];
		      $stNenglishtotal1234=$sqgtstotaleng11234['total_marks'];
		

$gtstotaleng21234 ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=10";
					$qgtstotaleng21234=$mysqli->query($gtstotaleng21234);
					$sqgtstotaleng21234=$qgtstotaleng21234->fetch_assoc();    
    				$stphoneeng1234=$sqgtstotaleng21234['res_gpa'];
					$stgpeng1234=$sqgtstotaleng21234['res_lg'];		

$pdf->Cell(40,5.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(108,5,'',0,0,"L");
$pdf->Cell(13,5,$stNenglish11234,0,0,"C");	
$pdf->Cell(16,5,$stNenglish21234,0,0,"C");
$pdf->Cell(16,5,'',0,0,"L");
$pdf->Cell(15,5,$stNenglishtotal1234,0,0,"C");
$pdf->Cell(12,5,$stphoneeng1234,0,0,"C");
$pdf->Cell(18,5,$stgpeng1234,0,0,"C");




$gtstotaleng1123459 ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=11";
					$qgtstotaleng1123459=$mysqli->query($gtstotaleng1123459);
					$sqgtstotaleng1123459=$qgtstotaleng1123459->fetch_assoc();		
		      $stNenglish1123451=$sqgtstotaleng1123459['temp_res_number_type1'];
		      $stNenglish2123451=$sqgtstotaleng1123459['temp_res_number_type2'];
		      $stNenglish3123451=$sqgtstotaleng1123459['temp_res_number_type3'];
		      $stNenglish4123451=$sqgtstotaleng1123459['temp_res_number_type4'];
		      $stNenglish5123451=$sqgtstotaleng1123459['temp_res_number_type5'];
		      $stNenglish6123451=$sqgtstotaleng1123459['temp_res_number_type6'];
		      $stNenglishtotal123451=$sqgtstotaleng1123459['total_marks'];
		

$gtstotaleng2123459 ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=11";
					$qgtstotaleng2123459=$mysqli->query($gtstotaleng2123459);
					$sqgtstotaleng2123459=$qgtstotaleng2123459->fetch_assoc();    
    				$stphoneeng123451=$sqgtstotaleng2123459['res_gpa'];
					$stgpeng123451=$sqgtstotaleng2123459['res_lg'];		

$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(108,5,'',0,0,"L");
$pdf->Cell(13,5,$stNenglish1123451,0,0,"C");	
$pdf->Cell(16,5,$stNenglish2123451,0,0,"C");
$pdf->Cell(16,5,$stNenglish3123451,0,0,"C");
$pdf->Cell(15,5,$stNenglishtotal123451,0,0,"C");
$pdf->Cell(12,5,$stphoneeng123451,0,0,"C");
$pdf->Cell(18,5,$stgpeng123451,0,0,"C");

$gtstotaleng112345 ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=12";
					$qgtstotaleng112345=$mysqli->query($gtstotaleng112345);
					$sqgtstotaleng112345=$qgtstotaleng112345->fetch_assoc();		
		      $stNenglish112345=$sqgtstotaleng112345['temp_res_number_type1'];
		      $stNenglish212345=$sqgtstotaleng112345['temp_res_number_type2'];
		      $stNenglish312345=$sqgtstotaleng112345['temp_res_number_type3'];
		      $stNenglish412345=$sqgtstotaleng112345['temp_res_number_type4'];
		      $stNenglish512345=$sqgtstotaleng112345['temp_res_number_type5'];
		      $stNenglish612345=$sqgtstotaleng112345['temp_res_number_type6'];
		      $stNenglishtotal12345=$sqgtstotaleng112345['total_marks'];
		

$gtstotaleng212345 ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=12";
					$qgtstotaleng212345=$mysqli->query($gtstotaleng212345);
					$sqgtstotaleng212345=$qgtstotaleng212345->fetch_assoc();    
    				$stphoneeng12345=$sqgtstotaleng212345['res_gpa'];
					$stgpeng12345=$sqgtstotaleng212345['res_lg'];		

$pdf->Cell(40,5.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(108,5,'',0,0,"L");
$pdf->Cell(13,5,$stNenglish112345,0,0,"C");	
$pdf->Cell(16,5,$stNenglish212345,0,0,"C");
$pdf->Cell(16,5,$stNenglish312345,0,0,"C");
$pdf->Cell(15,5,$stNenglishtotal12345,0,0,"C");
$pdf->Cell(12,5,$stphoneeng12345,0,0,"C");
$pdf->Cell(18,5,$stgpeng12345,0,0,"C");			    
				


$gtstotaleng112345b ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=14";
					$qgtstotaleng112345b=$mysqli->query($gtstotaleng112345b);
					$sqgtstotaleng112345b=$qgtstotaleng112345b->fetch_assoc();		
		      $stNenglish112345b=$sqgtstotaleng112345b['temp_res_number_type1'];
		      $stNenglish212345b=$sqgtstotaleng112345b['temp_res_number_type2'];
		      $stNenglish312345b=$sqgtstotaleng112345b['temp_res_number_type3'];
		      $stNenglish412345b=$sqgtstotaleng112345b['temp_res_number_type4'];
		      $stNenglish512345b=$sqgtstotaleng112345b['temp_res_number_type5'];
		      $stNenglish612345b=$sqgtstotaleng112345b['temp_res_number_type6'];
		      $stNenglishtotal12345b=$sqgtstotaleng112345b['total_marks'];
		

$gtstotaleng212345b ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=14";
					$qgtstotaleng212345b=$mysqli->query($gtstotaleng212345b);
					$sqgtstotaleng212345b=$qgtstotaleng212345b->fetch_assoc();    
    				$stphoneeng12345b=$sqgtstotaleng212345b['res_gpa'];
					$stgpeng12345b=$sqgtstotaleng212345b['res_lg'];		

$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(108,5,'',0,0,"L");
$pdf->Cell(13,5,$stNenglish112345b,0,0,"C");	
$pdf->Cell(16,5,$stNenglish212345b,0,0,"C");
$pdf->Cell(16,5,$stNenglish312345b,0,0,"C");
$pdf->Cell(15,5,$stNenglishtotal12345b,0,0,"C");
$pdf->Cell(12,5,$stphoneeng12345b,0,0,"C");
$pdf->Cell(18,5,$stgpeng12345b,0,0,"C");	


//=========================Higher Math===========================
$gtstotaleng112345b1 ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=15";
					$qgtstotaleng112345b1=$mysqli->query($gtstotaleng112345b1);
					$sqgtstotaleng112345b1=$qgtstotaleng112345b1->fetch_assoc();		
		   $stNenglish112345b1=$sqgtstotaleng112345b1['temp_res_number_type1'];
		   $stNenglish212345b1=$sqgtstotaleng112345b1['temp_res_number_type2'];
		   $stNenglish312345b1=$sqgtstotaleng112345b1['temp_res_number_type3'];
		   $stNenglish412345b1=$sqgtstotaleng112345b1['temp_res_number_type4'];
		   $stNenglish512345b1=$sqgtstotaleng112345b1['temp_res_number_type5'];
		   $stNenglish612345b1=$sqgtstotaleng112345b1['temp_res_number_type6'];
		   $stNenglishtotal12345b1=$sqgtstotaleng112345b1['total_marks'];
		

$gtstotaleng212345b1 ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=15";
					$qgtstotaleng212345b1=$mysqli->query($gtstotaleng212345b1);
					$sqgtstotaleng212345b1=$qgtstotaleng212345b1->fetch_assoc();    
    				$stphoneeng12345b1=$sqgtstotaleng212345b1['res_gpa'];
					$stgpeng12345b1=$sqgtstotaleng212345b1['res_lg'];		


if($stgpeng12345b1!=""){
$pdf->Cell(40,5.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(108,5,'',0,0,"L");
$pdf->Cell(13,5,$stNenglish112345b1,0,0,"C");	
$pdf->Cell(16,5,$stNenglish212345b1,0,0,"C");
$pdf->Cell(16,5,$stNenglish312345b1,0,0,"C");
$pdf->Cell(15,5,$stNenglishtotal12345b1,0,0,"C");
$pdf->Cell(12,5,$stphoneeng12345b1,0,0,"C");
$pdf->Cell(18,5,$stgpeng12345b1,0,0,"C");}
//=========================Higher Math===========================

//=========================Agriculture===========================
$gtstotaleng112345b1a ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=16";
				$qgtstotaleng112345b1a=$mysqli->query($gtstotaleng112345b1a);
				$sqgtstotaleng112345b1a=$qgtstotaleng112345b1a->fetch_assoc();		
		  $stNenglish112345b1a=$sqgtstotaleng112345b1a['temp_res_number_type1'];
		  $stNenglish212345b1a=$sqgtstotaleng112345b1a['temp_res_number_type2'];
		  $stNenglish312345b1a=$sqgtstotaleng112345b1a['temp_res_number_type3'];
		  $stNenglish412345b1a=$sqgtstotaleng112345b1a['temp_res_number_type4'];
		  $stNenglish512345b1a=$sqgtstotaleng112345b1a['temp_res_number_type5'];
		  $stNenglish612345b1a=$sqgtstotaleng112345b1a['temp_res_number_type6'];
		  $stNenglishtotal12345b1a=$sqgtstotaleng112345b1a['total_marks'];
		

$gtstotaleng212345b1a ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=16";
				$qgtstotaleng212345b1a=$mysqli->query($gtstotaleng212345b1a);
				$sqgtstotaleng212345b1a=$qgtstotaleng212345b1a->fetch_assoc();    
    				$stphoneeng12345b1a=$sqgtstotaleng212345b1a['res_gpa'];
					$stgpeng12345b1a=$sqgtstotaleng212345b1a['res_lg'];		


if($stgpeng12345b1a!=""){
$pdf->Cell(40,5.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(108,5,'',0,0,"L");
$pdf->Cell(13,5,$stNenglish112345b1a,0,0,"C");	
$pdf->Cell(16,5,$stNenglish212345b1a,0,0,"C");
$pdf->Cell(16,5,$stNenglish312345b1a,0,0,"C");
$pdf->Cell(15,5,$stNenglishtotal12345b1a,0,0,"C");
$pdf->Cell(12,5,$stphoneeng12345b1a,0,0,"C");
$pdf->Cell(18,5,$stgpeng12345b1a,0,0,"C");}
//=========================Agriculture===========================

//=========================Home Science===========================
$gtstotaleng112345b1h ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=17";
				$qgtstotaleng112345b1h=$mysqli->query($gtstotaleng112345b1h);
				$sqgtstotaleng112345b1h=$qgtstotaleng112345b1h->fetch_assoc();		
		  $stNenglish112345b1h=$sqgtstotaleng112345b1h['temp_res_number_type1'];
		  $stNenglish212345b1h=$sqgtstotaleng112345b1h['temp_res_number_type2'];
		  $stNenglish312345b1h=$sqgtstotaleng112345b1h['temp_res_number_type3'];
		  $stNenglish412345b1h=$sqgtstotaleng112345b1h['temp_res_number_type4'];
		  $stNenglish512345b1h=$sqgtstotaleng112345b1h['temp_res_number_type5'];
		  $stNenglish612345b1h=$sqgtstotaleng112345b1h['temp_res_number_type6'];
		  $stNenglishtotal12345b1h=$sqgtstotaleng112345b1h['total_marks'];
		

$gtstotaleng212345b1h ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=17";
				$qgtstotaleng212345b1h=$mysqli->query($gtstotaleng212345b1h);
				$sqgtstotaleng212345b1h=$qgtstotaleng212345b1h->fetch_assoc();    
    				$stphoneeng12345b1h=$sqgtstotaleng212345b1h['res_gpa'];
					$stgpeng12345b1h=$sqgtstotaleng212345b1h['res_lg'];		


if($stgpeng12345b1h!=""){
$pdf->Cell(40,5.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(108,5,'',0,0,"L");
$pdf->Cell(13,5,$stNenglish112345b1h,0,0,"C");	
$pdf->Cell(16,5,$stNenglish212345b1h,0,0,"C");
$pdf->Cell(16,5,$stNenglish312345b1h,0,0,"C");
$pdf->Cell(15,5,$stNenglishtotal12345b1h,0,0,"C");
$pdf->Cell(12,5,$stphoneeng12345b1h,0,0,"C");
$pdf->Cell(18,5,$stgpeng12345b1h,0,0,"C");}
//=========================Home Science===========================
	
$gtstotal ="select * from borno_school_9_10_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term AND borno_school_stud_group='$group' AND borno_school_roll=$gtstotal111";
					$qgtstotal=$mysqli->query($gtstotal);
					$stggtstotal=$qgtstotal->fetch_assoc();

$fstotal=$stggtstotal['grandtotal'];
$fstotal1=$stggtstotal['gpa'];



$pdf->Cell(40,10,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(108,5,'',0,0,"L");
$pdf->Cell(13,5,'',0,0,"C");	
$pdf->Cell(16,5,'',0,0,"C");
$pdf->Cell(16,5,'',0,0,"L");
$pdf->Cell(15,5,$fstotal,0,0,"C");
$pdf->Cell(12,5,$fstotal1,0,0,"C");
$pdf->Cell(21,5,'',0,0,"C");	
		



		
$gtstotal1 ="select * from borno_school_9_10_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term AND borno_school_stud_group='$group' AND borno_school_roll=$gtstotal111";
					$qgtstotal1=$mysqli->query($gtstotal1);
					$stggtstotal1=$qgtstotal1->fetch_assoc();

$fmerit1=$stggtstotal1['merit_section'];
$fmerit2=$stggtstotal1['merit_shift'];
$fmerit3=$stggtstotal1['merit_class'];
$failno=$stggtstotal1['failno'];

$fnssection1=substr($fnssection,0,5);

if($fstotal1==0 OR $fstotal1=="")
{$status="Fail";}
else{$status="Pass";}
$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,3,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(35,7,'',0,0,"L");
$pdf->Cell(68,7,'',0,0,"L");
$pdf->Cell(35,5,"($fnssection1)",0,0,"L");
$pdf->Cell(40,7,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(34,5,$status,0,0,"C");
$pdf->Cell(40,5,$fmerit3,0,0,"C");
$pdf->Cell(40,5,$fmerit1,0,0,"C");
$pdf->Cell(41,5,$failno,0,0,"C");
$pdf->Cell(40,5,$status,0,0,"C");
$pdf->Cell(21,5,'',0,0,"C");
	
		
		
	


		


$gtstotal1123 ="select * from borno_school_9_10_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term AND borno_school_stud_group='$group'";
	                $qgtstotal1123=$mysqli->query($gtstotal1123);
					$totalstudent=mysqli_num_rows($qgtstotal1123); 
					
$gtsattend ="select * from borno_school_attendence where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term AND borno_school_roll='$gtstotal111'";
	                $qggtsattend=$mysqli->query($gtsattend);
					$stgqqggtsattend=$qggtsattend->fetch_assoc();
					$presence=$stgqqggtsattend['borno_school_presence'];
					$absence=$stgqqggtsattend['borno_school_absence'];					

$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,8,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(34,5,$schoolingday,0,0,"C");
$pdf->Cell(40,5,$presence,0,0,"C");
$pdf->Cell(40,5,$absence,0,0,"C");

$pdf->Ln();	


$pdf->AddPage('');
}
}

elseif($group==2){    
  $result23 ="select * from borno_school_9_10_merit where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll between $rollf AND $rollt order by borno_school_roll asc";
$snl=0;
					$qgresult23=$mysqli->query($result23);
					while($row23=$qgresult23->fetch_assoc()){ $snl++;

					$gtstotal111=$row23['borno_school_roll'];
                    $gtstdid=$row23['borno_student_info_id'];

   

//----------------- School Name ------------------------------------------------------------------
$gtstname ="select * from borno_student_info where borno_student_info_id='$gtstdid'";

$pdf->SetFont('Arial','U',12);
					$qgtstname=$mysqli->query($gtstname);
					$stgtstname=$qgtstname->fetch_assoc();
$fstname=substr($stgtstname['borno_school_student_name'],0,21);


	
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(40,7,'',0,0,"L");
$pdf->Ln();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,$fstname,0,0,"L");
$pdf->Ln();
$pdf->Cell(40,2.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,$fnsclass,0,0,"L");	
$pdf->Ln();
$pdf->Cell(40,2,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,$fnssection,0,0,"L");	
$pdf->Ln();
$pdf->Cell(40,2.5,'',0,0,"L");
$pdf->Ln();
if($group==1){    
$dept="Science";
}
elseif($group==2){    
$dept="Business";
}
elseif($group==3){    
$dept="Humanities";
}
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,$dept,0,0,"L");	
$pdf->Ln();
$pdf->Cell(40,2.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,$gtstotal111,0,0,"L");	
$pdf->Ln();
$pdf->Cell(40,2.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,$stsess,0,0,"L");	
$pdf->Ln();
$pdf->Cell(40,2.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,'',0,0,"L");	
$pdf->Ln();
$pdf->Cell(40,3,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,$fnsterm,0,0,"L");	





		$pdf->SetFont('Arial','',7);  
				
		
	
		


$pdf->Ln();




	

$pdf->Cell(220,4.5,'',0,0,"L");
$pdf->Ln();
$pdf->Ln();


		
		


$pdf->Ln();
		
		


$gtstotalban ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group'  AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=1";
					$qgtstotalban=$mysqli->query($gtstotalban);
					$sqgtstotalban=$qgtstotalban->fetch_assoc();		
		            $stNbangla=$sqgtstotalban['borno_subject_nine_ten_id'];
		            $stNbangla1=$sqgtstotalban['temp_res_number_type1'];
		            $stNbangla2=$sqgtstotalban['temp_res_number_type2'];
		            $stNbangla3=$sqgtstotalban['temp_res_number_type3'];
		            $stNbangla4=$sqgtstotalban['temp_res_number_type4'];
		            $stNbangla5=$sqgtstotalban['temp_res_number_type5'];
		            $stNbangla6=$sqgtstotalban['temp_res_number_type6'];
		            

 $gtstotalban1 ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=2";
					$qgtstotalban1=$mysqli->query($gtstotalban1);
					$sqgtstotalban1=$qgtstotalban1->fetch_assoc(); 
					$stNbanglatotal=$sqgtstotalban1['res_total_conv'];
    				$stphoneban=$sqgtstotalban1['res_gpa'];
					$stgpban=$sqgtstotalban1['res_lg'];

				


$pdf->SetFont('Arial','B',13);  	
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(92,5,'',0,0,"L");
$pdf->Cell(17,5,$stNbangla1,0,0,"C");	
$pdf->Cell(18,5,$stNbangla2,0,0,"C");
$pdf->Cell(18,5,'',0,0,"L");
$pdf->Cell(17,10,$stNbanglatotal,0,0,"C");
$pdf->Cell(17,10,$stphoneban,0,0,"C");
$pdf->Cell(18,10,$stgpban,0,0,"C");
$pdf->Cell(1,5.5,'',0,0,"C"); 
 $gtstotalban22 ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=2";
					$qgtstotalban22=$mysqli->query($gtstotalban22);
					$sqgtstotalban22=$qgtstotalban22->fetch_assoc();		
		            $stNbangla=$sqgtstotalban22['borno_subject_nine_ten_id'];
		            $stNbangla11=$sqgtstotalban22['temp_res_number_type1'];
		            $stNbangla21=$sqgtstotalban22['temp_res_number_type2'];
		            $stNbangla31=$sqgtstotalban22['temp_res_number_type3'];
		            $stNbangla41=$sqgtstotalban22['temp_res_number_type4'];
		            $stNbangla51=$sqgtstotalban22['temp_res_number_type5'];
		            $stNbangla61=$sqgtstotalban22['temp_res_number_type6'];
		            $stNbanglatotal1=$sqgtstotalban22['total_mark'];

 $gtstotalban12 ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=2";
					$qgtstotalban12=$mysqli->query($gtstotalban12);
					$sqgtstotalban12=$qgtstotalban12->fetch_assoc();    
    				$stphoneban1=$sqgtstotalban12['res_gpa'];
					$stgpban1=$sqgtstotalban12['res_lg'];


				


$pdf->SetFont('Arial','B',13);  	
$pdf->Ln();

$pdf->Cell(92,5,'',0,0,"L");
$pdf->Cell(17,5,$stNbangla11,0,0,"C");	
$pdf->Cell(18,5,$stNbangla21,0,0,"C");
$pdf->Cell(18,5,'',0,0,"L");
$pdf->Cell(17,5,'',0,0,"C");
$pdf->Cell(17,5,'',0,0,"C");
$pdf->Cell(18,5,'',0,0,"C");

 $gtstotaleng ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=3";
					$qgtstotaleng=$mysqli->query($gtstotaleng);
					$sqgtstotaleng=$qgtstotaleng->fetch_assoc();		
		            $stNenglish=$sqgtstotaleng['borno_subject_nine_ten_id'];
		            $stNenglish1=$sqgtstotaleng['temp_res_number_type1'];
		            $stNenglish2=$sqgtstotaleng['temp_res_number_type2'];
		            $stNenglish3=$sqgtstotaleng['temp_res_number_type3'];
		            $stNenglish4=$sqgtstotaleng['temp_res_number_type4'];
		            $stNenglish5=$sqgtstotaleng['temp_res_number_type5'];
		            $stNenglish6=$sqgtstotaleng['temp_res_number_type6'];
	
		

 $gtstotaleng1 ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=4";
					$qgtstotaleng1=$mysqli->query($gtstotaleng1);
					$sqgtstotaleng1=$qgtstotaleng1->fetch_assoc(); 
					$stNenglishtotal=$sqgtstotaleng1['res_total_conv'];
    				$stphoneeng=$sqgtstotaleng1['res_gpa'];
					$stgpeng=$sqgtstotaleng1['res_lg'];

				
$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(92,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglish1,0,0,"C");	
$pdf->Cell(18,5,'',0,0,"C");
$pdf->Cell(18,5,'',0,0,"L");
$pdf->Cell(17,10,$stNenglishtotal,0,0,"C");
$pdf->Cell(17,10,$stphoneeng,0,0,"C");
$pdf->Cell(18,10,$stgpeng,0,0,"C");
$pdf->Cell(1,5,'',0,0,"C");

 $gtstotaleng11 ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=4";
					$qgtstotaleng11=$mysqli->query($gtstotaleng11);
					$sqgtstotaleng11=$qgtstotaleng11->fetch_assoc();		
		            $stNenglish=$sqgtstotaleng11['borno_subject_nine_ten_id'];
		            $stNenglish11=$sqgtstotaleng11['temp_res_number_type1'];
		            $stNenglish21=$sqgtstotaleng11['temp_res_number_type2'];
		            $stNenglish31=$sqgtstotaleng11['temp_res_number_type3'];
		            $stNenglish41=$sqgtstotaleng11['temp_res_number_type4'];
		            $stNenglish51=$sqgtstotaleng11['temp_res_number_type5'];
		            $stNenglish61=$sqgtstotaleng11['temp_res_number_type6'];
		            $stNenglishtotal1=$sqgtstotaleng11['total_mark'];
		

 $gtstotaleng12 ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=4";
					$qgtstotaleng12=$mysqli->query($gtstotaleng12);
					$sqgtstotaleng12=$qgtstotaleng12->fetch_assoc();    
    				$stphoneeng1=$sqgtstotaleng12['res_gpa'];
					$stgpeng1=$sqgtstotaleng12['res_lg'];

				
$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(92,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglish11,0,0,"C");	
$pdf->Cell(18,5,'',0,0,"C");
$pdf->Cell(18,5,'',0,0,"L");
$pdf->Cell(17,5,'',0,0,"C");
$pdf->Cell(17,5,'',0,0,"C");
$pdf->Cell(18,5,'',0,0,"C");

 $gtstotaleng11 ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=5";
					$qgtstotaleng11=$mysqli->query($gtstotaleng11);
					$sqgtstotaleng11=$qgtstotaleng11->fetch_assoc();		
		            $stNenglish11=$sqgtstotaleng11['temp_res_number_type1'];
		            $stNenglish21=$sqgtstotaleng11['temp_res_number_type2'];
		            $stNenglish31=$sqgtstotaleng11['temp_res_number_type3'];
		            $stNenglish41=$sqgtstotaleng11['temp_res_number_type4'];
		            $stNenglish51=$sqgtstotaleng11['temp_res_number_type5'];
		            $stNenglish61=$sqgtstotaleng11['temp_res_number_type6'];
		            $stNenglishtotal1=$sqgtstotaleng11['total_marks'];
		

 $gtstotaleng21 ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=5";
					$qgtstotaleng21=$mysqli->query($gtstotaleng21);
					$sqgtstotaleng21=$qgtstotaleng21->fetch_assoc();    
    				$stphoneeng1=$sqgtstotaleng21['res_gpa'];
					$stgpeng1=$sqgtstotaleng21['res_lg'];		

$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(92,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglish11,0,0,"C");	
$pdf->Cell(18,5,$stNenglish21,0,0,"C");
$pdf->Cell(18,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglishtotal1,0,0,"C");
$pdf->Cell(17,5,$stphoneeng1,0,0,"C");
$pdf->Cell(18,5,$stgpeng1,0,0,"C");

 $gtstotaleng112 ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=6";
					$qgtstotaleng112=$mysqli->query($gtstotaleng112);
					$sqgtstotaleng112=$qgtstotaleng112->fetch_assoc();		
		            $stNenglish112=$sqgtstotaleng112['temp_res_number_type1'];
		            $stNenglish212=$sqgtstotaleng112['temp_res_number_type2'];
		            $stNenglish312=$sqgtstotaleng112['temp_res_number_type3'];
		            $stNenglish412=$sqgtstotaleng112['temp_res_number_type4'];
		            $stNenglish512=$sqgtstotaleng112['temp_res_number_type5'];
		            $stNenglish612=$sqgtstotaleng112['temp_res_number_type6'];
		            $stNenglishtotal12=$sqgtstotaleng112['total_marks'];
		

 $gtstotaleng212 ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=6";
					$qgtstotaleng212=$mysqli->query($gtstotaleng212);
					$sqgtstotaleng212=$qgtstotaleng212->fetch_assoc();    
    				$stphoneeng12=$sqgtstotaleng212['res_gpa'];
					$stgpeng12=$sqgtstotaleng212['res_lg'];		

$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(92,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglish112,0,0,"C");	
$pdf->Cell(18,5,$stNenglish212,0,0,"C");
$pdf->Cell(18,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglishtotal12,0,0,"C");
$pdf->Cell(17,5,$stphoneeng12,0,0,"C");
$pdf->Cell(18,5,$stgpeng12,0,0,"C");

$gtstotaleng1123 ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=8";
					$qgtstotaleng1123=$mysqli->query($gtstotaleng1123);
					$sqgtstotaleng1123=$qgtstotaleng1123->fetch_assoc();		
		            $stNenglish1123=$sqgtstotaleng1123['temp_res_number_type1'];
		            $stNenglish2123=$sqgtstotaleng1123['temp_res_number_type2'];
		            $stNenglish3123=$sqgtstotaleng1123['temp_res_number_type3'];
		            $stNenglish4123=$sqgtstotaleng1123['temp_res_number_type4'];
		            $stNenglish5123=$sqgtstotaleng1123['temp_res_number_type5'];
		            $stNenglish6123=$sqgtstotaleng1123['temp_res_number_type6'];
		            $stNenglishtotal123=$sqgtstotaleng1123['total_marks'];
		

$gtstotaleng2123 ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=8";
					$qgtstotaleng2123=$mysqli->query($gtstotaleng2123);
					$sqgtstotaleng2123=$qgtstotaleng2123->fetch_assoc();    
    				$stphoneeng123=$sqgtstotaleng2123['res_gpa'];
					$stgpeng123=$sqgtstotaleng2123['res_lg'];		

$pdf->Cell(40,11,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(92,5,'',0,0,"L");
$pdf->Cell(17,5,'',0,0,"C");	
$pdf->Cell(18,5,$stNenglish2123,0,0,"C");
$pdf->Cell(18,5,$stNenglish3123,0,0,"C");
$pdf->Cell(17,5,$stNenglishtotal123,0,0,"C");
$pdf->Cell(17,5,$stphoneeng123,0,0,"C");
$pdf->Cell(18,5,$stgpeng123,0,0,"C");



$gtstotaleng11234 ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=18";
					$qgtstotaleng11234=$mysqli->query($gtstotaleng11234);
					$sqgtstotaleng11234=$qgtstotaleng11234->fetch_assoc();		
		      $stNenglish11234=$sqgtstotaleng11234['temp_res_number_type1'];
		      $stNenglish21234=$sqgtstotaleng11234['temp_res_number_type2'];
		      $stNenglish31234=$sqgtstotaleng11234['temp_res_number_type3'];
		      $stNenglish41234=$sqgtstotaleng11234['temp_res_number_type4'];
		      $stNenglish51234=$sqgtstotaleng11234['temp_res_number_type5'];
		      $stNenglish61234=$sqgtstotaleng11234['temp_res_number_type6'];
		      $stNenglishtotal1234=$sqgtstotaleng11234['total_marks'];
		

$gtstotaleng21234 ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=18";
					$qgtstotaleng21234=$mysqli->query($gtstotaleng21234);
					$sqgtstotaleng21234=$qgtstotaleng21234->fetch_assoc();    
    				$stphoneeng1234=$sqgtstotaleng21234['res_gpa'];
					$stgpeng1234=$sqgtstotaleng21234['res_lg'];		

$pdf->Cell(40,5.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(92,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglish11234,0,0,"C");	
$pdf->Cell(18,5,$stNenglish21234,0,0,"C");
$pdf->Cell(18,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglishtotal1234,0,0,"C");
$pdf->Cell(17,5,$stphoneeng1234,0,0,"C");
$pdf->Cell(18,5,$stgpeng1234,0,0,"C");




$gtstotaleng1123459 ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=26";
					$qgtstotaleng1123459=$mysqli->query($gtstotaleng1123459);
					$sqgtstotaleng1123459=$qgtstotaleng1123459->fetch_assoc();		
		      $stNenglish1123451=$sqgtstotaleng1123459['temp_res_number_type1'];
		      $stNenglish2123451=$sqgtstotaleng1123459['temp_res_number_type2'];
		      $stNenglish3123451=$sqgtstotaleng1123459['temp_res_number_type3'];
		      $stNenglish4123451=$sqgtstotaleng1123459['temp_res_number_type4'];
		      $stNenglish5123451=$sqgtstotaleng1123459['temp_res_number_type5'];
		      $stNenglish6123451=$sqgtstotaleng1123459['temp_res_number_type6'];
		      $stNenglishtotal123451=$sqgtstotaleng1123459['total_marks'];
		

$gtstotaleng2123459 ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=26";
					$qgtstotaleng2123459=$mysqli->query($gtstotaleng2123459);
					$sqgtstotaleng2123459=$qgtstotaleng2123459->fetch_assoc();    
    				$stphoneeng123451=$sqgtstotaleng2123459['res_gpa'];
					$stgpeng123451=$sqgtstotaleng2123459['res_lg'];		

$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(92,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglish1123451,0,0,"C");	
$pdf->Cell(18,5,$stNenglish2123451,0,0,"C");
$pdf->Cell(18,5,'',0,0,"C");
$pdf->Cell(17,5,$stNenglishtotal123451,0,0,"C");
$pdf->Cell(17,5,$stphoneeng123451,0,0,"C");
$pdf->Cell(18,5,$stgpeng123451,0,0,"C");

$gtstotaleng112345 ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=28";
					$qgtstotaleng112345=$mysqli->query($gtstotaleng112345);
					$sqgtstotaleng112345=$qgtstotaleng112345->fetch_assoc();		
		      $stNenglish112345=$sqgtstotaleng112345['temp_res_number_type1'];
		      $stNenglish212345=$sqgtstotaleng112345['temp_res_number_type2'];
		      $stNenglish312345=$sqgtstotaleng112345['temp_res_number_type3'];
		      $stNenglish412345=$sqgtstotaleng112345['temp_res_number_type4'];
		      $stNenglish512345=$sqgtstotaleng112345['temp_res_number_type5'];
		      $stNenglish612345=$sqgtstotaleng112345['temp_res_number_type6'];
		      $stNenglishtotal12345=$sqgtstotaleng112345['total_marks'];
		

$gtstotaleng212345 ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=28";
					$qgtstotaleng212345=$mysqli->query($gtstotaleng212345);
					$sqgtstotaleng212345=$qgtstotaleng212345->fetch_assoc();    
    				$stphoneeng12345=$sqgtstotaleng212345['res_gpa'];
					$stgpeng12345=$sqgtstotaleng212345['res_lg'];		

$pdf->Cell(40,5.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(92,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglish112345,0,0,"C");	
$pdf->Cell(18,5,$stNenglish212345,0,0,"C");
$pdf->Cell(18,5,'',0,0,"C");
$pdf->Cell(17,5,$stNenglishtotal12345,0,0,"C");
$pdf->Cell(17,5,$stphoneeng12345,0,0,"C");
$pdf->Cell(18,5,$stgpeng12345,0,0,"C");			    
				


$gtstotaleng112345b ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=27";
					$qgtstotaleng112345b=$mysqli->query($gtstotaleng112345b);
					$sqgtstotaleng112345b=$qgtstotaleng112345b->fetch_assoc();		
		      $stNenglish112345b=$sqgtstotaleng112345b['temp_res_number_type1'];
		      $stNenglish212345b=$sqgtstotaleng112345b['temp_res_number_type2'];
		      $stNenglish312345b=$sqgtstotaleng112345b['temp_res_number_type3'];
		      $stNenglish412345b=$sqgtstotaleng112345b['temp_res_number_type4'];
		      $stNenglish512345b=$sqgtstotaleng112345b['temp_res_number_type5'];
		      $stNenglish612345b=$sqgtstotaleng112345b['temp_res_number_type6'];
		      $stNenglishtotal12345b=$sqgtstotaleng112345b['total_marks'];
		

$gtstotaleng212345b ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=27";
					$qgtstotaleng212345b=$mysqli->query($gtstotaleng212345b);
					$sqgtstotaleng212345b=$qgtstotaleng212345b->fetch_assoc();    
    				$stphoneeng12345b=$sqgtstotaleng212345b['res_gpa'];
					$stgpeng12345b=$sqgtstotaleng212345b['res_lg'];		

$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(92,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglish112345b,0,0,"C");	
$pdf->Cell(18,5,$stNenglish212345b,0,0,"C");
$pdf->Cell(18,5,'',0,0,"C");
$pdf->Cell(17,5,$stNenglishtotal12345b,0,0,"C");
$pdf->Cell(17,5,$stphoneeng12345b,0,0,"C");
$pdf->Cell(18,5,$stgpeng12345b,0,0,"C");	


//=========================Higher Math===========================
$gtstotaleng112345b1 ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=15";
					$qgtstotaleng112345b1=$mysqli->query($gtstotaleng112345b1);
					$sqgtstotaleng112345b1=$qgtstotaleng112345b1->fetch_assoc();		
		   $stNenglish112345b1=$sqgtstotaleng112345b1['temp_res_number_type1'];
		   $stNenglish212345b1=$sqgtstotaleng112345b1['temp_res_number_type2'];
		   $stNenglish312345b1=$sqgtstotaleng112345b1['temp_res_number_type3'];
		   $stNenglish412345b1=$sqgtstotaleng112345b1['temp_res_number_type4'];
		   $stNenglish512345b1=$sqgtstotaleng112345b1['temp_res_number_type5'];
		   $stNenglish612345b1=$sqgtstotaleng112345b1['temp_res_number_type6'];
		   $stNenglishtotal12345b1=$sqgtstotaleng112345b1['total_marks'];
		

$gtstotaleng212345b1 ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=15";
					$qgtstotaleng212345b1=$mysqli->query($gtstotaleng212345b1);
					$sqgtstotaleng212345b1=$qgtstotaleng212345b1->fetch_assoc();    
    				$stphoneeng12345b1=$sqgtstotaleng212345b1['res_gpa'];
					$stgpeng12345b1=$sqgtstotaleng212345b1['res_lg'];		


if($stgpeng12345b1!=""){
$pdf->Cell(40,5.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(92,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglish112345b1,0,0,"C");	
$pdf->Cell(18,5,$stNenglish212345b1,0,0,"C");
$pdf->Cell(18,5,$stNenglish312345b1,0,0,"C");
$pdf->Cell(17,5,$stNenglishtotal12345b1,0,0,"C");
$pdf->Cell(17,5,$stphoneeng12345b1,0,0,"C");
$pdf->Cell(18,5,$stgpeng12345b1,0,0,"C");}
//=========================Higher Math===========================

//=========================Agriculture===========================
$gtstotaleng112345b1a ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=16";
				$qgtstotaleng112345b1a=$mysqli->query($gtstotaleng112345b1a);
				$sqgtstotaleng112345b1a=$qgtstotaleng112345b1a->fetch_assoc();		
		  $stNenglish112345b1a=$sqgtstotaleng112345b1a['temp_res_number_type1'];
		  $stNenglish212345b1a=$sqgtstotaleng112345b1a['temp_res_number_type2'];
		  $stNenglish312345b1a=$sqgtstotaleng112345b1a['temp_res_number_type3'];
		  $stNenglish412345b1a=$sqgtstotaleng112345b1a['temp_res_number_type4'];
		  $stNenglish512345b1a=$sqgtstotaleng112345b1a['temp_res_number_type5'];
		  $stNenglish612345b1a=$sqgtstotaleng112345b1a['temp_res_number_type6'];
		  $stNenglishtotal12345b1a=$sqgtstotaleng112345b1a['total_marks'];
		

$gtstotaleng212345b1a ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=16";
				$qgtstotaleng212345b1a=$mysqli->query($gtstotaleng212345b1a);
				$sqgtstotaleng212345b1a=$qgtstotaleng212345b1a->fetch_assoc();    
    				$stphoneeng12345b1a=$sqgtstotaleng212345b1a['res_gpa'];
					$stgpeng12345b1a=$sqgtstotaleng212345b1a['res_lg'];		


if($stgpeng12345b1a!=""){
$pdf->Cell(40,5.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(92,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglish112345b1a,0,0,"C");	
$pdf->Cell(18,5,$stNenglish212345b1a,0,0,"C");
$pdf->Cell(18,5,$stNenglish312345b1a,0,0,"C");
$pdf->Cell(17,5,$stNenglishtotal12345b1a,0,0,"C");
$pdf->Cell(17,5,$stphoneeng12345b1a,0,0,"C");
$pdf->Cell(18,5,$stgpeng12345b1a,0,0,"C");}
//=========================Agriculture===========================

//=========================Home Science===========================
$gtstotaleng112345b1h ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=17";
				$qgtstotaleng112345b1h=$mysqli->query($gtstotaleng112345b1h);
				$sqgtstotaleng112345b1h=$qgtstotaleng112345b1h->fetch_assoc();		
		  $stNenglish112345b1h=$sqgtstotaleng112345b1h['temp_res_number_type1'];
		  $stNenglish212345b1h=$sqgtstotaleng112345b1h['temp_res_number_type2'];
		  $stNenglish312345b1h=$sqgtstotaleng112345b1h['temp_res_number_type3'];
		  $stNenglish412345b1h=$sqgtstotaleng112345b1h['temp_res_number_type4'];
		  $stNenglish512345b1h=$sqgtstotaleng112345b1h['temp_res_number_type5'];
		  $stNenglish612345b1h=$sqgtstotaleng112345b1h['temp_res_number_type6'];
		  $stNenglishtotal12345b1h=$sqgtstotaleng112345b1h['total_marks'];
		

$gtstotaleng212345b1h ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=17";
				$qgtstotaleng212345b1h=$mysqli->query($gtstotaleng212345b1h);
				$sqgtstotaleng212345b1h=$qgtstotaleng212345b1h->fetch_assoc();    
    				$stphoneeng12345b1h=$sqgtstotaleng212345b1h['res_gpa'];
					$stgpeng12345b1h=$sqgtstotaleng212345b1h['res_lg'];		


if($stgpeng12345b1h!=""){
$pdf->Cell(40,5.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(92,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglish112345b1h,0,0,"C");	
$pdf->Cell(18,5,$stNenglish212345b1h,0,0,"C");
$pdf->Cell(18,5,$stNenglish312345b1h,0,0,"C");
$pdf->Cell(17,5,$stNenglishtotal12345b1h,0,0,"C");
$pdf->Cell(17,5,$stphoneeng12345b1h,0,0,"C");
$pdf->Cell(18,5,$stgpeng12345b1h,0,0,"C");}
//=========================Home Science===========================
	
$gtstotal ="select * from borno_school_9_10_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term AND borno_school_stud_group='$group' AND borno_school_roll=$gtstotal111";
					$qgtstotal=$mysqli->query($gtstotal);
					$stggtstotal=$qgtstotal->fetch_assoc();

$fstotal=$stggtstotal['grandtotal'];
$fstotal1=$stggtstotal['gpa'];



$pdf->Cell(40,10,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(92,5,'',0,0,"L");
$pdf->Cell(17,5,'',0,0,"C");	
$pdf->Cell(18,5,'',0,0,"C");
$pdf->Cell(18,5,'',0,0,"L");
$pdf->Cell(17,5,$fstotal,0,0,"C");
$pdf->Cell(17,5,$fstotal1,0,0,"C");
$pdf->Cell(21,5,'',0,0,"C");	
		



		
$gtstotal1 ="select * from borno_school_9_10_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term AND borno_school_stud_group='$group' AND borno_school_roll=$gtstotal111";
					$qgtstotal1=$mysqli->query($gtstotal1);
					$stggtstotal1=$qgtstotal1->fetch_assoc();

$fmerit1=$stggtstotal1['merit_section'];
$fmerit2=$stggtstotal1['merit_shift'];
$fmerit3=$stggtstotal1['merit_class'];
$failno=$stggtstotal1['failno'];

$fnssection1=substr($fnssection,0,5);

if($fstotal1==0 OR $fstotal1=="")
{$status="Fail";}
else{$status="Pass";}
$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,3,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(35,7,'',0,0,"L");
$pdf->Cell(68,7,'',0,0,"L");
$pdf->Cell(35,5,"($fnssection1)",0,0,"L");
$pdf->Cell(40,7,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(34,5,$status,0,0,"C");
$pdf->Cell(40,5,$fmerit3,0,0,"C");
$pdf->Cell(40,5,$fmerit1,0,0,"C");
$pdf->Cell(41,5,$failno,0,0,"C");
$pdf->Cell(40,5,$status,0,0,"C");
$pdf->Cell(21,5,'',0,0,"C");
	
		
		
	


		


$gtstotal1123 ="select * from borno_school_9_10_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term AND borno_school_stud_group='$group'";
	                $qgtstotal1123=$mysqli->query($gtstotal1123);
					$totalstudent=mysqli_num_rows($qgtstotal1123); 
					
$gtsattend ="select * from borno_school_attendence where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term AND borno_school_roll='$gtstotal111'";
	                $qggtsattend=$mysqli->query($gtsattend);
					$stgqqggtsattend=$qggtsattend->fetch_assoc();
					$presence=$stgqqggtsattend['borno_school_presence'];
					$absence=$stgqqggtsattend['borno_school_absence'];					

$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,8,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(34,5,$schoolingday,0,0,"C");
$pdf->Cell(40,5,$presence,0,0,"C");
$pdf->Cell(40,5,$absence,0,0,"C");

$pdf->Ln();	


$pdf->AddPage('');
}
}
elseif($group==3){    
   $result23 ="select * from borno_school_9_10_merit where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll between $rollf AND $rollt order by borno_school_roll asc";
$snl=0;
					$qgresult23=$mysqli->query($result23);
					while($row23=$qgresult23->fetch_assoc()){ $snl++;

					$gtstotal111=$row23['borno_school_roll'];
                    $gtstdid=$row23['borno_student_info_id'];

   

//----------------- School Name ------------------------------------------------------------------
$gtstname ="select * from borno_student_info where borno_student_info_id='$gtstdid'";

$pdf->SetFont('Arial','U',12);
					$qgtstname=$mysqli->query($gtstname);
					$stgtstname=$qgtstname->fetch_assoc();
$fstname=substr($stgtstname['borno_school_student_name'],0,21);


	
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(40,6.5,'',0,0,"L");
$pdf->Ln();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,$fstname,0,0,"L");
$pdf->Ln();
$pdf->Cell(40,2.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,$fnsclass,0,0,"L");	
$pdf->Ln();
$pdf->Cell(40,2,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,$fnssection,0,0,"L");	
$pdf->Ln();
$pdf->Cell(40,2.5,'',0,0,"L");
$pdf->Ln();
if($group==1){    
$dept="Science";
}
elseif($group==2){    
$dept="Business";
}
elseif($group==3){    
$dept="Humanities";
}
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,$dept,0,0,"L");	
$pdf->Ln();
$pdf->Cell(40,2.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,$gtstotal111,0,0,"L");	
$pdf->Ln();
$pdf->Cell(40,2.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,$stsess,0,0,"L");	
$pdf->Ln();
$pdf->Cell(40,2.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,'',0,0,"L");	
$pdf->Ln();
$pdf->Cell(40,3,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,$fnsterm,0,0,"L");	





		$pdf->SetFont('Arial','',7);  
				
		
	
		


$pdf->Ln();




	

$pdf->Cell(220,5,'',0,0,"L");
$pdf->Ln();
$pdf->Ln();


		
		


$pdf->Ln();
		
		


$gtstotalban ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group'  AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=1";
					$qgtstotalban=$mysqli->query($gtstotalban);
					$sqgtstotalban=$qgtstotalban->fetch_assoc();		
		            $stNbangla=$sqgtstotalban['borno_subject_nine_ten_id'];
		            $stNbangla1=$sqgtstotalban['temp_res_number_type1'];
		            $stNbangla2=$sqgtstotalban['temp_res_number_type2'];
		            $stNbangla3=$sqgtstotalban['temp_res_number_type3'];
		            $stNbangla4=$sqgtstotalban['temp_res_number_type4'];
		            $stNbangla5=$sqgtstotalban['temp_res_number_type5'];
		            $stNbangla6=$sqgtstotalban['temp_res_number_type6'];
		            

 $gtstotalban1 ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=2";
					$qgtstotalban1=$mysqli->query($gtstotalban1);
					$sqgtstotalban1=$qgtstotalban1->fetch_assoc(); 
					$stNbanglatotal=$sqgtstotalban1['res_total_conv'];
    				$stphoneban=$sqgtstotalban1['res_gpa'];
					$stgpban=$sqgtstotalban1['res_lg'];

				


$pdf->SetFont('Arial','B',13);  	
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(92,5,'',0,0,"L");
$pdf->Cell(17,5,$stNbangla1,0,0,"C");	
$pdf->Cell(18,5,$stNbangla2,0,0,"C");
$pdf->Cell(18,5,'',0,0,"L");
$pdf->Cell(17,10,$stNbanglatotal,0,0,"C");
$pdf->Cell(17,10,$stphoneban,0,0,"C");
$pdf->Cell(18,10,$stgpban,0,0,"C");
$pdf->Cell(1,5.5,'',0,0,"C"); 
 $gtstotalban22 ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=2";
					$qgtstotalban22=$mysqli->query($gtstotalban22);
					$sqgtstotalban22=$qgtstotalban22->fetch_assoc();		
		            $stNbangla=$sqgtstotalban22['borno_subject_nine_ten_id'];
		            $stNbangla11=$sqgtstotalban22['temp_res_number_type1'];
		            $stNbangla21=$sqgtstotalban22['temp_res_number_type2'];
		            $stNbangla31=$sqgtstotalban22['temp_res_number_type3'];
		            $stNbangla41=$sqgtstotalban22['temp_res_number_type4'];
		            $stNbangla51=$sqgtstotalban22['temp_res_number_type5'];
		            $stNbangla61=$sqgtstotalban22['temp_res_number_type6'];
		            $stNbanglatotal1=$sqgtstotalban22['total_mark'];

 $gtstotalban12 ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=2";
					$qgtstotalban12=$mysqli->query($gtstotalban12);
					$sqgtstotalban12=$qgtstotalban12->fetch_assoc();    
    				$stphoneban1=$sqgtstotalban12['res_gpa'];
					$stgpban1=$sqgtstotalban12['res_lg'];


				


$pdf->SetFont('Arial','B',13);  	
$pdf->Ln();

$pdf->Cell(92,5,'',0,0,"L");
$pdf->Cell(17,5,$stNbangla11,0,0,"C");	
$pdf->Cell(18,5,$stNbangla21,0,0,"C");
$pdf->Cell(18,5,'',0,0,"L");
$pdf->Cell(17,5,'',0,0,"C");
$pdf->Cell(17,5,'',0,0,"C");
$pdf->Cell(18,5,'',0,0,"C");

 $gtstotaleng ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=3";
					$qgtstotaleng=$mysqli->query($gtstotaleng);
					$sqgtstotaleng=$qgtstotaleng->fetch_assoc();		
		            $stNenglish=$sqgtstotaleng['borno_subject_nine_ten_id'];
		            $stNenglish1=$sqgtstotaleng['temp_res_number_type1'];
		            $stNenglish2=$sqgtstotaleng['temp_res_number_type2'];
		            $stNenglish3=$sqgtstotaleng['temp_res_number_type3'];
		            $stNenglish4=$sqgtstotaleng['temp_res_number_type4'];
		            $stNenglish5=$sqgtstotaleng['temp_res_number_type5'];
		            $stNenglish6=$sqgtstotaleng['temp_res_number_type6'];
	
		

 $gtstotaleng1 ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=4";
					$qgtstotaleng1=$mysqli->query($gtstotaleng1);
					$sqgtstotaleng1=$qgtstotaleng1->fetch_assoc(); 
					$stNenglishtotal=$sqgtstotaleng1['res_total_conv'];
    				$stphoneeng=$sqgtstotaleng1['res_gpa'];
					$stgpeng=$sqgtstotaleng1['res_lg'];

				
$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(92,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglish1,0,0,"C");	
$pdf->Cell(18,5,'',0,0,"C");
$pdf->Cell(18,5,'',0,0,"L");
$pdf->Cell(17,10,$stNenglishtotal,0,0,"C");
$pdf->Cell(17,10,$stphoneeng,0,0,"C");
$pdf->Cell(18,10,$stgpeng,0,0,"C");
$pdf->Cell(1,5,'',0,0,"C");

 $gtstotaleng11 ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=4";
					$qgtstotaleng11=$mysqli->query($gtstotaleng11);
					$sqgtstotaleng11=$qgtstotaleng11->fetch_assoc();		
		            $stNenglish=$sqgtstotaleng11['borno_subject_nine_ten_id'];
		            $stNenglish11=$sqgtstotaleng11['temp_res_number_type1'];
		            $stNenglish21=$sqgtstotaleng11['temp_res_number_type2'];
		            $stNenglish31=$sqgtstotaleng11['temp_res_number_type3'];
		            $stNenglish41=$sqgtstotaleng11['temp_res_number_type4'];
		            $stNenglish51=$sqgtstotaleng11['temp_res_number_type5'];
		            $stNenglish61=$sqgtstotaleng11['temp_res_number_type6'];
		            $stNenglishtotal1=$sqgtstotaleng11['total_mark'];
		

 $gtstotaleng12 ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=4";
					$qgtstotaleng12=$mysqli->query($gtstotaleng12);
					$sqgtstotaleng12=$qgtstotaleng12->fetch_assoc();    
    				$stphoneeng1=$sqgtstotaleng12['res_gpa'];
					$stgpeng1=$sqgtstotaleng12['res_lg'];

				
$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(92,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglish11,0,0,"C");	
$pdf->Cell(18,5,'',0,0,"C");
$pdf->Cell(18,5,'',0,0,"L");
$pdf->Cell(17,5,'',0,0,"C");
$pdf->Cell(17,5,'',0,0,"C");
$pdf->Cell(18,5,'',0,0,"C");

 $gtstotaleng11 ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=5";
					$qgtstotaleng11=$mysqli->query($gtstotaleng11);
					$sqgtstotaleng11=$qgtstotaleng11->fetch_assoc();		
		            $stNenglish11=$sqgtstotaleng11['temp_res_number_type1'];
		            $stNenglish21=$sqgtstotaleng11['temp_res_number_type2'];
		            $stNenglish31=$sqgtstotaleng11['temp_res_number_type3'];
		            $stNenglish41=$sqgtstotaleng11['temp_res_number_type4'];
		            $stNenglish51=$sqgtstotaleng11['temp_res_number_type5'];
		            $stNenglish61=$sqgtstotaleng11['temp_res_number_type6'];
		            $stNenglishtotal1=$sqgtstotaleng11['total_marks'];
		

 $gtstotaleng21 ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=5";
					$qgtstotaleng21=$mysqli->query($gtstotaleng21);
					$sqgtstotaleng21=$qgtstotaleng21->fetch_assoc();    
    				$stphoneeng1=$sqgtstotaleng21['res_gpa'];
					$stgpeng1=$sqgtstotaleng21['res_lg'];		

$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(92,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglish11,0,0,"C");	
$pdf->Cell(18,5,$stNenglish21,0,0,"C");
$pdf->Cell(18,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglishtotal1,0,0,"C");
$pdf->Cell(17,5,$stphoneeng1,0,0,"C");
$pdf->Cell(18,5,$stgpeng1,0,0,"C");

 $gtstotaleng112 ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=6";
					$qgtstotaleng112=$mysqli->query($gtstotaleng112);
					$sqgtstotaleng112=$qgtstotaleng112->fetch_assoc();		
		            $stNenglish112=$sqgtstotaleng112['temp_res_number_type1'];
		            $stNenglish212=$sqgtstotaleng112['temp_res_number_type2'];
		            $stNenglish312=$sqgtstotaleng112['temp_res_number_type3'];
		            $stNenglish412=$sqgtstotaleng112['temp_res_number_type4'];
		            $stNenglish512=$sqgtstotaleng112['temp_res_number_type5'];
		            $stNenglish612=$sqgtstotaleng112['temp_res_number_type6'];
		            $stNenglishtotal12=$sqgtstotaleng112['total_marks'];
		

 $gtstotaleng212 ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=6";
					$qgtstotaleng212=$mysqli->query($gtstotaleng212);
					$sqgtstotaleng212=$qgtstotaleng212->fetch_assoc();    
    				$stphoneeng12=$sqgtstotaleng212['res_gpa'];
					$stgpeng12=$sqgtstotaleng212['res_lg'];		

$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(92,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglish112,0,0,"C");	
$pdf->Cell(18,5,$stNenglish212,0,0,"C");
$pdf->Cell(18,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglishtotal12,0,0,"C");
$pdf->Cell(17,5,$stphoneeng12,0,0,"C");
$pdf->Cell(18,5,$stgpeng12,0,0,"C");

$gtstotaleng1123 ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=8";
					$qgtstotaleng1123=$mysqli->query($gtstotaleng1123);
					$sqgtstotaleng1123=$qgtstotaleng1123->fetch_assoc();		
		            $stNenglish1123=$sqgtstotaleng1123['temp_res_number_type1'];
		            $stNenglish2123=$sqgtstotaleng1123['temp_res_number_type2'];
		            $stNenglish3123=$sqgtstotaleng1123['temp_res_number_type3'];
		            $stNenglish4123=$sqgtstotaleng1123['temp_res_number_type4'];
		            $stNenglish5123=$sqgtstotaleng1123['temp_res_number_type5'];
		            $stNenglish6123=$sqgtstotaleng1123['temp_res_number_type6'];
		            $stNenglishtotal123=$sqgtstotaleng1123['total_marks'];
		

$gtstotaleng2123 ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=8";
					$qgtstotaleng2123=$mysqli->query($gtstotaleng2123);
					$sqgtstotaleng2123=$qgtstotaleng2123->fetch_assoc();    
    				$stphoneeng123=$sqgtstotaleng2123['res_gpa'];
					$stgpeng123=$sqgtstotaleng2123['res_lg'];		

$pdf->Cell(40,11,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(92,5,'',0,0,"L");
$pdf->Cell(17,5,'',0,0,"C");	
$pdf->Cell(18,5,$stNenglish2123,0,0,"C");
$pdf->Cell(18,5,$stNenglish3123,0,0,"C");
$pdf->Cell(17,5,$stNenglishtotal123,0,0,"C");
$pdf->Cell(17,5,$stphoneeng123,0,0,"C");
$pdf->Cell(18,5,$stgpeng123,0,0,"C");



$gtstotaleng11234 ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=18";
					$qgtstotaleng11234=$mysqli->query($gtstotaleng11234);
					$sqgtstotaleng11234=$qgtstotaleng11234->fetch_assoc();		
		      $stNenglish11234=$sqgtstotaleng11234['temp_res_number_type1'];
		      $stNenglish21234=$sqgtstotaleng11234['temp_res_number_type2'];
		      $stNenglish31234=$sqgtstotaleng11234['temp_res_number_type3'];
		      $stNenglish41234=$sqgtstotaleng11234['temp_res_number_type4'];
		      $stNenglish51234=$sqgtstotaleng11234['temp_res_number_type5'];
		      $stNenglish61234=$sqgtstotaleng11234['temp_res_number_type6'];
		      $stNenglishtotal1234=$sqgtstotaleng11234['total_marks'];
		

$gtstotaleng21234 ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=18";
					$qgtstotaleng21234=$mysqli->query($gtstotaleng21234);
					$sqgtstotaleng21234=$qgtstotaleng21234->fetch_assoc();    
    				$stphoneeng1234=$sqgtstotaleng21234['res_gpa'];
					$stgpeng1234=$sqgtstotaleng21234['res_lg'];		

$pdf->Cell(40,5.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(92,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglish11234,0,0,"C");	
$pdf->Cell(18,5,$stNenglish21234,0,0,"C");
$pdf->Cell(18,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglishtotal1234,0,0,"C");
$pdf->Cell(17,5,$stphoneeng1234,0,0,"C");
$pdf->Cell(18,5,$stgpeng1234,0,0,"C");




$gtstotaleng1123459 ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=19";
					$qgtstotaleng1123459=$mysqli->query($gtstotaleng1123459);
					$sqgtstotaleng1123459=$qgtstotaleng1123459->fetch_assoc();		
		      $stNenglish1123451=$sqgtstotaleng1123459['temp_res_number_type1'];
		      $stNenglish2123451=$sqgtstotaleng1123459['temp_res_number_type2'];
		      $stNenglish3123451=$sqgtstotaleng1123459['temp_res_number_type3'];
		      $stNenglish4123451=$sqgtstotaleng1123459['temp_res_number_type4'];
		      $stNenglish5123451=$sqgtstotaleng1123459['temp_res_number_type5'];
		      $stNenglish6123451=$sqgtstotaleng1123459['temp_res_number_type6'];
		      $stNenglishtotal123451=$sqgtstotaleng1123459['total_marks'];
		

$gtstotaleng2123459 ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=19";
					$qgtstotaleng2123459=$mysqli->query($gtstotaleng2123459);
					$sqgtstotaleng2123459=$qgtstotaleng2123459->fetch_assoc();    
    				$stphoneeng123451=$sqgtstotaleng2123459['res_gpa'];
					$stgpeng123451=$sqgtstotaleng2123459['res_lg'];		

$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(92,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglish1123451,0,0,"C");	
$pdf->Cell(18,5,$stNenglish2123451,0,0,"C");
$pdf->Cell(18,5,'',0,0,"C");
$pdf->Cell(17,5,$stNenglishtotal123451,0,0,"C");
$pdf->Cell(17,5,$stphoneeng123451,0,0,"C");
$pdf->Cell(18,5,$stgpeng123451,0,0,"C");

$gtstotaleng112345 ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=20";
					$qgtstotaleng112345=$mysqli->query($gtstotaleng112345);
					$sqgtstotaleng112345=$qgtstotaleng112345->fetch_assoc();		
		      $stNenglish112345=$sqgtstotaleng112345['temp_res_number_type1'];
		      $stNenglish212345=$sqgtstotaleng112345['temp_res_number_type2'];
		      $stNenglish312345=$sqgtstotaleng112345['temp_res_number_type3'];
		      $stNenglish412345=$sqgtstotaleng112345['temp_res_number_type4'];
		      $stNenglish512345=$sqgtstotaleng112345['temp_res_number_type5'];
		      $stNenglish612345=$sqgtstotaleng112345['temp_res_number_type6'];
		      $stNenglishtotal12345=$sqgtstotaleng112345['total_marks'];
		

$gtstotaleng212345 ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=20";
					$qgtstotaleng212345=$mysqli->query($gtstotaleng212345);
					$sqgtstotaleng212345=$qgtstotaleng212345->fetch_assoc();    
    				$stphoneeng12345=$sqgtstotaleng212345['res_gpa'];
					$stgpeng12345=$sqgtstotaleng212345['res_lg'];		

$pdf->Cell(40,5.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(92,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglish112345,0,0,"C");	
$pdf->Cell(18,5,$stNenglish212345,0,0,"C");
$pdf->Cell(18,5,'',0,0,"C");
$pdf->Cell(17,5,$stNenglishtotal12345,0,0,"C");
$pdf->Cell(17,5,$stphoneeng12345,0,0,"C");
$pdf->Cell(18,5,$stgpeng12345,0,0,"C");			    
				


$gtstotaleng112345b ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=31";
					$qgtstotaleng112345b=$mysqli->query($gtstotaleng112345b);
					$sqgtstotaleng112345b=$qgtstotaleng112345b->fetch_assoc();		
		      $stNenglish112345b=$sqgtstotaleng112345b['temp_res_number_type1'];
		      $stNenglish212345b=$sqgtstotaleng112345b['temp_res_number_type2'];
		      $stNenglish312345b=$sqgtstotaleng112345b['temp_res_number_type3'];
		      $stNenglish412345b=$sqgtstotaleng112345b['temp_res_number_type4'];
		      $stNenglish512345b=$sqgtstotaleng112345b['temp_res_number_type5'];
		      $stNenglish612345b=$sqgtstotaleng112345b['temp_res_number_type6'];
		      $stNenglishtotal12345b=$sqgtstotaleng112345b['total_marks'];
		

$gtstotaleng212345b ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=31";
					$qgtstotaleng212345b=$mysqli->query($gtstotaleng212345b);
					$sqgtstotaleng212345b=$qgtstotaleng212345b->fetch_assoc();    
    				$stphoneeng12345b=$sqgtstotaleng212345b['res_gpa'];
					$stgpeng12345b=$sqgtstotaleng212345b['res_lg'];		

$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(92,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglish112345b,0,0,"C");	
$pdf->Cell(18,5,$stNenglish212345b,0,0,"C");
$pdf->Cell(18,5,'',0,0,"C");
$pdf->Cell(17,5,$stNenglishtotal12345b,0,0,"C");
$pdf->Cell(17,5,$stphoneeng12345b,0,0,"C");
$pdf->Cell(18,5,$stgpeng12345b,0,0,"C");	


//=========================Higher Math===========================
$gtstotaleng112345b1 ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=15";
					$qgtstotaleng112345b1=$mysqli->query($gtstotaleng112345b1);
					$sqgtstotaleng112345b1=$qgtstotaleng112345b1->fetch_assoc();		
		   $stNenglish112345b1=$sqgtstotaleng112345b1['temp_res_number_type1'];
		   $stNenglish212345b1=$sqgtstotaleng112345b1['temp_res_number_type2'];
		   $stNenglish312345b1=$sqgtstotaleng112345b1['temp_res_number_type3'];
		   $stNenglish412345b1=$sqgtstotaleng112345b1['temp_res_number_type4'];
		   $stNenglish512345b1=$sqgtstotaleng112345b1['temp_res_number_type5'];
		   $stNenglish612345b1=$sqgtstotaleng112345b1['temp_res_number_type6'];
		   $stNenglishtotal12345b1=$sqgtstotaleng112345b1['total_marks'];
		

$gtstotaleng212345b1 ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=15";
					$qgtstotaleng212345b1=$mysqli->query($gtstotaleng212345b1);
					$sqgtstotaleng212345b1=$qgtstotaleng212345b1->fetch_assoc();    
    				$stphoneeng12345b1=$sqgtstotaleng212345b1['res_gpa'];
					$stgpeng12345b1=$sqgtstotaleng212345b1['res_lg'];		


if($stgpeng12345b1!=""){
$pdf->Cell(40,5.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(92,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglish112345b1,0,0,"C");	
$pdf->Cell(18,5,$stNenglish212345b1,0,0,"C");
$pdf->Cell(18,5,$stNenglish312345b1,0,0,"C");
$pdf->Cell(17,5,$stNenglishtotal12345b1,0,0,"C");
$pdf->Cell(17,5,$stphoneeng12345b1,0,0,"C");
$pdf->Cell(18,5,$stgpeng12345b1,0,0,"C");}
//=========================Higher Math===========================

//=========================Agriculture===========================
$gtstotaleng112345b1a ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=16";
				$qgtstotaleng112345b1a=$mysqli->query($gtstotaleng112345b1a);
				$sqgtstotaleng112345b1a=$qgtstotaleng112345b1a->fetch_assoc();		
		  $stNenglish112345b1a=$sqgtstotaleng112345b1a['temp_res_number_type1'];
		  $stNenglish212345b1a=$sqgtstotaleng112345b1a['temp_res_number_type2'];
		  $stNenglish312345b1a=$sqgtstotaleng112345b1a['temp_res_number_type3'];
		  $stNenglish412345b1a=$sqgtstotaleng112345b1a['temp_res_number_type4'];
		  $stNenglish512345b1a=$sqgtstotaleng112345b1a['temp_res_number_type5'];
		  $stNenglish612345b1a=$sqgtstotaleng112345b1a['temp_res_number_type6'];
		  $stNenglishtotal12345b1a=$sqgtstotaleng112345b1a['total_marks'];
		

$gtstotaleng212345b1a ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=16";
				$qgtstotaleng212345b1a=$mysqli->query($gtstotaleng212345b1a);
				$sqgtstotaleng212345b1a=$qgtstotaleng212345b1a->fetch_assoc();    
    				$stphoneeng12345b1a=$sqgtstotaleng212345b1a['res_gpa'];
					$stgpeng12345b1a=$sqgtstotaleng212345b1a['res_lg'];		


if($stgpeng12345b1a!=""){
$pdf->Cell(40,5.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(92,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglish112345b1a,0,0,"C");	
$pdf->Cell(18,5,$stNenglish212345b1a,0,0,"C");
$pdf->Cell(18,5,$stNenglish312345b1a,0,0,"C");
$pdf->Cell(17,5,$stNenglishtotal12345b1a,0,0,"C");
$pdf->Cell(17,5,$stphoneeng12345b1a,0,0,"C");
$pdf->Cell(18,5,$stgpeng12345b1a,0,0,"C");}
//=========================Agriculture===========================

//=========================Home Science===========================
$gtstotaleng112345b1h ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=17";
				$qgtstotaleng112345b1h=$mysqli->query($gtstotaleng112345b1h);
				$sqgtstotaleng112345b1h=$qgtstotaleng112345b1h->fetch_assoc();		
		  $stNenglish112345b1h=$sqgtstotaleng112345b1h['temp_res_number_type1'];
		  $stNenglish212345b1h=$sqgtstotaleng112345b1h['temp_res_number_type2'];
		  $stNenglish312345b1h=$sqgtstotaleng112345b1h['temp_res_number_type3'];
		  $stNenglish412345b1h=$sqgtstotaleng112345b1h['temp_res_number_type4'];
		  $stNenglish512345b1h=$sqgtstotaleng112345b1h['temp_res_number_type5'];
		  $stNenglish612345b1h=$sqgtstotaleng112345b1h['temp_res_number_type6'];
		  $stNenglishtotal12345b1h=$sqgtstotaleng112345b1h['total_marks'];
		

$gtstotaleng212345b1h ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=17";
				$qgtstotaleng212345b1h=$mysqli->query($gtstotaleng212345b1h);
				$sqgtstotaleng212345b1h=$qgtstotaleng212345b1h->fetch_assoc();    
    				$stphoneeng12345b1h=$sqgtstotaleng212345b1h['res_gpa'];
					$stgpeng12345b1h=$sqgtstotaleng212345b1h['res_lg'];		


if($stgpeng12345b1h!=""){
$pdf->Cell(40,5.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(92,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglish112345b1h,0,0,"C");	
$pdf->Cell(18,5,$stNenglish212345b1h,0,0,"C");
$pdf->Cell(18,5,$stNenglish312345b1h,0,0,"C");
$pdf->Cell(17,5,$stNenglishtotal12345b1h,0,0,"C");
$pdf->Cell(17,5,$stphoneeng12345b1h,0,0,"C");
$pdf->Cell(18,5,$stgpeng12345b1h,0,0,"C");}
//=========================Home Science===========================
	
$gtstotal ="select * from borno_school_9_10_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term AND borno_school_stud_group='$group' AND borno_school_roll=$gtstotal111";
					$qgtstotal=$mysqli->query($gtstotal);
					$stggtstotal=$qgtstotal->fetch_assoc();

$fstotal=$stggtstotal['grandtotal'];
$fstotal1=$stggtstotal['gpa'];



$pdf->Cell(40,10,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(92,5,'',0,0,"L");
$pdf->Cell(17,5,'',0,0,"C");	
$pdf->Cell(18,5,'',0,0,"C");
$pdf->Cell(18,5,'',0,0,"L");
$pdf->Cell(17,5,$fstotal,0,0,"C");
$pdf->Cell(17,5,$fstotal1,0,0,"C");
$pdf->Cell(21,5,'',0,0,"C");	
		



		
$gtstotal1 ="select * from borno_school_9_10_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term AND borno_school_stud_group='$group' AND borno_school_roll=$gtstotal111";
					$qgtstotal1=$mysqli->query($gtstotal1);
					$stggtstotal1=$qgtstotal1->fetch_assoc();

$fmerit1=$stggtstotal1['merit_section'];
$fmerit2=$stggtstotal1['merit_shift'];
$fmerit3=$stggtstotal1['merit_class'];
$failno=$stggtstotal1['failno'];

$fnssection1=substr($fnssection,0,5);

if($fstotal1==0 OR $fstotal1=="")
{$status="Fail";}
else{$status="Pass";}
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,3,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(35,7,'',0,0,"L");
$pdf->Cell(68,7,'',0,0,"L");
$pdf->Cell(35,5,"($fnssection1)",0,0,"L");
$pdf->Cell(40,7,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(34,5,$status,0,0,"C");
$pdf->Cell(40,5,$fmerit3,0,0,"C");
$pdf->Cell(40,5,$fmerit1,0,0,"C");
$pdf->Cell(41,5,$failno,0,0,"C");
$pdf->Cell(40,5,$status,0,0,"C");
$pdf->Cell(21,5,'',0,0,"C");
	
		
		
	


		


$gtstotal1123 ="select * from borno_school_9_10_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term AND borno_school_stud_group='$group'";
	                $qgtstotal1123=$mysqli->query($gtstotal1123);
					$totalstudent=mysqli_num_rows($qgtstotal1123); 
					
$gtsattend ="select * from borno_school_attendence where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term AND borno_school_roll='$gtstotal111'";
	                $qggtsattend=$mysqli->query($gtsattend);
					$stgqqggtsattend=$qggtsattend->fetch_assoc();
					$presence=$stgqqggtsattend['borno_school_presence'];
					$absence=$stgqqggtsattend['borno_school_absence'];					

$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,8,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(34,5,$schoolingday,0,0,"C");
$pdf->Cell(40,5,$presence,0,0,"C");
$pdf->Cell(40,5,$absence,0,0,"C");

$pdf->Ln();	


$pdf->AddPage('');
}
}


}
elseif($studClass==3)
{
$result23 ="select borno_school_roll,borno_student_info_id from borno_class6_8_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_roll between $rollf AND $rollt  group by borno_school_roll,borno_student_info_id asc";
$sl=0;
					$qgresult23=$mysqli->query($result23);
					while($row23=$qgresult23->fetch_assoc()){ $sl++;

					$gtstotal111=$row23['borno_school_roll'];
                    $gtstdid=$row23['borno_student_info_id'];



//----------------- School Name ------------------------------------------------------------------

	
	
	
$gtstname ="select * from borno_student_info where borno_student_info_id='$gtstdid'";

$pdf->SetFont('Arial','U',12);
					$qgtstname=$mysqli->query($gtstname);
					$stgtstname=$qgtstname->fetch_assoc();
$fstname=substr($stgtstname['borno_school_student_name'],0,21);


	
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(40,3.5,'',0,0,"L");
$pdf->Ln();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,$fstname,0,0,"L");
$pdf->Ln();
$pdf->Cell(40,2.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,$fnsclass,0,0,"L");	
$pdf->Ln();
$pdf->Cell(40,2,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,$fnssection,0,0,"L");	
$pdf->Ln();
$pdf->Cell(40,2.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,"Not Applicable",0,0,"L");	
$pdf->Ln();
$pdf->Cell(40,2.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,$gtstotal111,0,0,"L");	
$pdf->Ln();
$pdf->Cell(40,2.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,$stsess,0,0,"L");	
$pdf->Ln();
$pdf->Cell(40,2.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,'',0,0,"L");	
$pdf->Ln();
$pdf->Cell(40,4,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,$fnsterm,0,0,"L");	





		$pdf->SetFont('Arial','',7);  
				
		
	
		


$pdf->Ln();




	

$pdf->Cell(220,4.5,'',0,0,"L");
$pdf->Ln();
$pdf->Ln();


		
		


$pdf->Ln();
 $gtstotalban ="select * from borno_class6_8_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight=18";
					$qgtstotalban=$mysqli->query($gtstotalban);
					$sqgtstotalban=$qgtstotalban->fetch_assoc();		
		            $stNbangla=$sqgtstotalban['subject_id_six_eight'];
		            $stNbangla1=$sqgtstotalban['temp_res_number_type1'];
		            $stNbangla2=$sqgtstotalban['temp_res_number_type2'];
		            $stNbangla3=$sqgtstotalban['temp_res_number_type3'];
		            $stNbangla4=$sqgtstotalban['temp_res_number_type4'];
		            $stNbangla5=$sqgtstotalban['temp_res_number_type5'];
		            $stNbangla6=$sqgtstotalban['temp_res_number_type6'];
		            $stNbanglatotal=$sqgtstotalban['total_mark'];

 $gtstotalban1 ="select * from borno_class6_8_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight=18";
					$qgtstotalban1=$mysqli->query($gtstotalban1);
					$sqgtstotalban1=$qgtstotalban1->fetch_assoc();    
    				$stphoneban=$sqgtstotalban1['res_gpa'];
					$stgpban=$sqgtstotalban1['res_lg'];

 $gtstotalban1h ="select * from borno_height_mark_class6_8 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND subject_id_six_eight=18";
					$qgtstotalban1h=$mysqli->query($gtstotalban1h);
					$sqgtstotalban1h=$qgtstotalban1h->fetch_assoc();    
    				$stNamebanh=$sqgtstotalban1h['getmaxmark'];					

	$pdf->SetFont('Arial','B',13);  	
$pdf->Ln();
$pdf->Cell(40,3.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(88,5,'',0,0,"L");
$pdf->Cell(18,5,$stNbangla1,0,0,"C");	
$pdf->Cell(18,5,$stNbangla2,0,0,"C");
$pdf->Cell(18,5,'',0,0,"L");
$pdf->Cell(17,5,$stNbanglatotal,0,0,"C");
$pdf->Cell(14,5,$stphoneban,0,0,"C");
$pdf->Cell(21,5,$stgpban,0,0,"C");
 


 $gtstotaleng ="select * from borno_class6_8_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight=19";
					$qgtstotaleng=$mysqli->query($gtstotaleng);
					$sqgtstotaleng=$qgtstotaleng->fetch_assoc();		
		            $stNenglish=$sqgtstotaleng['subject_id_six_eight'];
		            $stNenglish1=$sqgtstotaleng['temp_res_number_type1'];
		            $stNenglish2=$sqgtstotaleng['temp_res_number_type2'];
		            $stNenglish3=$sqgtstotaleng['temp_res_number_type3'];
		            $stNenglish4=$sqgtstotaleng['temp_res_number_type4'];
		            $stNenglish5=$sqgtstotaleng['temp_res_number_type5'];
		            $stNenglish6=$sqgtstotaleng['temp_res_number_type6'];
		            $stNenglishtotal=$sqgtstotaleng['total_mark'];
		

 $gtstotaleng1 ="select * from borno_class6_8_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight=19";
					$qgtstotaleng1=$mysqli->query($gtstotaleng1);
					$sqgtstotaleng1=$qgtstotaleng1->fetch_assoc();    
    				$stphoneeng=$sqgtstotaleng1['res_gpa'];
					$stgpeng=$sqgtstotaleng1['res_lg'];

 $gtstotaleng1h ="select * from borno_height_mark_class6_8 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND subject_id_six_eight=19";
					$qgtstotaleng1h=$mysqli->query($gtstotaleng1h);
					$sqgtstotaleng1h=$qgtstotaleng1h->fetch_assoc();    
    				$stNameengh=$sqgtstotaleng1h['getmaxmark'];					
$pdf->Cell(40,5.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(88,5,'',0,0,"L");
$pdf->Cell(18,5,$stNenglish1,0,0,"C");	
$pdf->Cell(18,5,'',0,0,"C");
$pdf->Cell(18,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglishtotal,0,0,"C");
$pdf->Cell(14,5,$stphoneeng,0,0,"C");
$pdf->Cell(21,5,$stgpeng,0,0,"C");

  	
 $gtstotaleng11 ="select * from borno_class6_8_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight=5";
					$qgtstotaleng11=$mysqli->query($gtstotaleng11);
					$sqgtstotaleng11=$qgtstotaleng11->fetch_assoc();		
		            $stNenglish11=$sqgtstotaleng11['temp_res_number_type1'];
		            $stNenglish21=$sqgtstotaleng11['temp_res_number_type2'];
		            $stNenglish31=$sqgtstotaleng11['temp_res_number_type3'];
		            $stNenglish41=$sqgtstotaleng11['temp_res_number_type4'];
		            $stNenglish51=$sqgtstotaleng11['temp_res_number_type5'];
		            $stNenglish61=$sqgtstotaleng11['temp_res_number_type6'];
		            $stNenglishtotal1=$sqgtstotaleng11['total_mark'];
		

 $gtstotaleng21 ="select * from borno_class6_8_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight=5";
					$qgtstotaleng21=$mysqli->query($gtstotaleng21);
					$sqgtstotaleng21=$qgtstotaleng21->fetch_assoc();    
    				$stphoneeng1=$sqgtstotaleng21['res_gpa'];
					$stgpeng1=$sqgtstotaleng21['res_lg'];		

$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(88,5,'',0,0,"L");
$pdf->Cell(18,5,$stNenglish11,0,0,"C");	
$pdf->Cell(18,5,$stNenglish21,0,0,"C");
$pdf->Cell(18,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglishtotal1,0,0,"C");
$pdf->Cell(14,5,$stphoneeng1,0,0,"C");
$pdf->Cell(21,5,$stgpeng1,0,0,"C");

 $gtstotaleng112 ="select * from borno_class6_8_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight=6";
					$qgtstotaleng112=$mysqli->query($gtstotaleng112);
					$sqgtstotaleng112=$qgtstotaleng112->fetch_assoc();		
		            $stNenglish112=$sqgtstotaleng112['temp_res_number_type1'];
		            $stNenglish212=$sqgtstotaleng112['temp_res_number_type2'];
		            $stNenglish312=$sqgtstotaleng112['temp_res_number_type3'];
		            $stNenglish412=$sqgtstotaleng112['temp_res_number_type4'];
		            $stNenglish512=$sqgtstotaleng112['temp_res_number_type5'];
		            $stNenglish612=$sqgtstotaleng112['temp_res_number_type6'];
		            $stNenglishtotal12=$sqgtstotaleng112['total_mark'];
		

 $gtstotaleng212 ="select * from borno_class6_8_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight=6";
					$qgtstotaleng212=$mysqli->query($gtstotaleng212);
					$sqgtstotaleng212=$qgtstotaleng212->fetch_assoc();    
    				$stphoneeng12=$sqgtstotaleng212['res_gpa'];
					$stgpeng12=$sqgtstotaleng212['res_lg'];		

$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(88,5,'',0,0,"L");
$pdf->Cell(18,5,$stNenglish112,0,0,"C");	
$pdf->Cell(18,5,$stNenglish212,0,0,"C");
$pdf->Cell(18,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglishtotal12,0,0,"C");
$pdf->Cell(14,5,$stphoneeng12,0,0,"C");
$pdf->Cell(21,5,$stgpeng12,0,0,"C");

$gtstotaleng1123 ="select * from borno_class6_8_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight=7";
					$qgtstotaleng1123=$mysqli->query($gtstotaleng1123);
					$sqgtstotaleng1123=$qgtstotaleng1123->fetch_assoc();		
		            $stNenglish1123=$sqgtstotaleng1123['temp_res_number_type1'];
		            $stNenglish2123=$sqgtstotaleng1123['temp_res_number_type2'];
		            $stNenglish3123=$sqgtstotaleng1123['temp_res_number_type3'];
		            $stNenglish4123=$sqgtstotaleng1123['temp_res_number_type4'];
		            $stNenglish5123=$sqgtstotaleng1123['temp_res_number_type5'];
		            $stNenglish6123=$sqgtstotaleng1123['temp_res_number_type6'];
		            $stNenglishtotal123=$sqgtstotaleng1123['total_mark'];
		

$gtstotaleng2123 ="select * from borno_class6_8_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight=7";
					$qgtstotaleng2123=$mysqli->query($gtstotaleng2123);
					$sqgtstotaleng2123=$qgtstotaleng2123->fetch_assoc();    
    				$stphoneeng123=$sqgtstotaleng2123['res_gpa'];
					$stgpeng123=$sqgtstotaleng2123['res_lg'];		

$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(88,5,'',0,0,"L");
$pdf->Cell(18,5,$stNenglish1123,0,0,"C");	
$pdf->Cell(18,5,$stNenglish2123,0,0,"C");
$pdf->Cell(18,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglishtotal123,0,0,"C");
$pdf->Cell(14,5,$stphoneeng123,0,0,"C");
$pdf->Cell(21,5,$stgpeng123,0,0,"C");


$gtstotaleng11234 ="select * from borno_class6_8_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight=8";
					$qgtstotaleng11234=$mysqli->query($gtstotaleng11234);
					$sqgtstotaleng11234=$qgtstotaleng11234->fetch_assoc();		
		      $stNenglish11234=$sqgtstotaleng11234['temp_res_number_type1'];
		      $stNenglish21234=$sqgtstotaleng11234['temp_res_number_type2'];
		      $stNenglish31234=$sqgtstotaleng11234['temp_res_number_type3'];
		      $stNenglish41234=$sqgtstotaleng11234['temp_res_number_type4'];
		      $stNenglish51234=$sqgtstotaleng11234['temp_res_number_type5'];
		      $stNenglish61234=$sqgtstotaleng11234['temp_res_number_type6'];
		      $stNenglishtotal1234=$sqgtstotaleng11234['total_mark'];
		

$gtstotaleng21234 ="select * from borno_class6_8_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight=8";
					$qgtstotaleng21234=$mysqli->query($gtstotaleng21234);
					$sqgtstotaleng21234=$qgtstotaleng21234->fetch_assoc();    
    				$stphoneeng1234=$sqgtstotaleng21234['res_gpa'];
					$stgpeng1234=$sqgtstotaleng21234['res_lg'];		

$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(88,5,'',0,0,"L");
$pdf->Cell(18,5,$stNenglish11234,0,0,"C");	
$pdf->Cell(18,5,$stNenglish21234,0,0,"C");
$pdf->Cell(18,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglishtotal1234,0,0,"C");
$pdf->Cell(14,5,$stphoneeng1234,0,0,"C");
$pdf->Cell(21,5,$stgpeng1234,0,0,"C");

$gtstotaleng112345 ="select * from borno_class6_8_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight=12";
					$qgtstotaleng112345=$mysqli->query($gtstotaleng112345);
					$sqgtstotaleng112345=$qgtstotaleng112345->fetch_assoc();		
		      $stNenglish112345=$sqgtstotaleng112345['temp_res_number_type1'];
		      $stNenglish212345=$sqgtstotaleng112345['temp_res_number_type2'];
		      $stNenglish312345=$sqgtstotaleng112345['temp_res_number_type3'];
		      $stNenglish412345=$sqgtstotaleng112345['temp_res_number_type4'];
		      $stNenglish512345=$sqgtstotaleng112345['temp_res_number_type5'];
		      $stNenglish612345=$sqgtstotaleng112345['temp_res_number_type6'];
		      $stNenglishtotal12345=$sqgtstotaleng112345['total_mark'];
		

$gtstotaleng212345 ="select * from borno_class6_8_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight=12";
					$qgtstotaleng212345=$mysqli->query($gtstotaleng212345);
					$sqgtstotaleng212345=$qgtstotaleng212345->fetch_assoc();    
    				$stphoneeng12345=$sqgtstotaleng212345['res_gpa'];
					$stgpeng12345=$sqgtstotaleng212345['res_lg'];		

$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(88,5,'',0,0,"L");
$pdf->Cell(18,5,$stNenglish112345,0,0,"C");	
$pdf->Cell(18,5,$stNenglish212345,0,0,"C");
$pdf->Cell(18,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglishtotal12345,0,0,"C");
$pdf->Cell(14,5,$stphoneeng12345,0,0,"C");
$pdf->Cell(21,5,$stgpeng12345,0,0,"C");

			    
				



	


	
$gtstotal ="select * from borno_school_6_8_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term AND borno_school_roll=$gtstotal111";
					$qgtstotal=$mysqli->query($gtstotal);
					$stggtstotal=$qgtstotal->fetch_assoc();

$fstotal=$stggtstotal['grandtotal'];
$fstotal1=$stggtstotal['gpa'];



$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(88,5,'',0,0,"L");
$pdf->Cell(18,5,'',0,0,"C");	
$pdf->Cell(18,5,'',0,0,"C");
$pdf->Cell(18,5,'',0,0,"L");
$pdf->Cell(17,5,$fstotal,0,0,"C");
$pdf->Cell(14,5,$fstotal1,0,0,"C");
$pdf->Cell(21,5,'',0,0,"C");	
		



		
$gtstotal1 ="select * from borno_school_6_8_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term AND borno_school_roll=$gtstotal111";
					$qgtstotal1=$mysqli->query($gtstotal1);
					$stggtstotal1=$qgtstotal1->fetch_assoc();

$fmerit1=$stggtstotal1['merit_section'];
$fmerit2=$stggtstotal1['merit_shift'];
$fmerit3=$stggtstotal1['merit_class'];
$failno=$stggtstotal1['failno'];

if($fstotal1==0 OR $fstotal1=="")
{$status="Fail";}
else{$status="Pass";}
$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(35,7,'',0,0,"L");
$pdf->Cell(40,7,'',0,0,"L");
$pdf->Cell(35,5,"($fnssection)",0,0,"R");
$pdf->Cell(40,7,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(34,5,$status,0,0,"C");
$pdf->Cell(40,5,$fmerit3,0,0,"C");
$pdf->Cell(40,5,$fmerit1,0,0,"C");
$pdf->Cell(41,5,$failno,0,0,"C");
$pdf->Cell(40,5,$status,0,0,"C");
$pdf->Cell(21,5,'',0,0,"C");
	
		
		
	


		


$gtstotal1123 ="select * from borno_school_6_8_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term";
	                $qgtstotal1123=$mysqli->query($gtstotal1123);
					$totalstudent=mysqli_num_rows($qgtstotal1123); 
					
$gtsattend ="select * from borno_school_attendence where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term AND borno_school_roll='$gtstotal111'";
	                $qggtsattend=$mysqli->query($gtsattend);
					$stgqqggtsattend=$qggtsattend->fetch_assoc();
					$presence=$stgqqggtsattend['borno_school_presence'];
					$absence=$stgqqggtsattend['borno_school_absence'];					

$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,8,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(34,5,$schoolingday,0,0,"C");
$pdf->Cell(40,5,$presence,0,0,"C");
$pdf->Cell(40,5,$absence,0,0,"C");

$pdf->Ln();	

$pdf->AddPage('');
}
}


elseif($studClass==4 OR $studClass==5)
{
$result23 ="select borno_school_roll,borno_student_info_id from borno_class6_8_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_roll between $rollf AND $rollt group by borno_school_roll,borno_student_info_id asc";
$sl=0;
					$qgresult23=$mysqli->query($result23);
					while($row23=$qgresult23->fetch_assoc()){ $sl++;
					$gtstotal111=$row23['borno_school_roll'];
                    $gtstdid=$row23['borno_student_info_id'];



//----------------- School Name ------------------------------------------------------------------

	
	
	
$gtstname ="select * from borno_student_info where borno_student_info_id='$gtstdid'";

$pdf->SetFont('Arial','U',12);
					$qgtstname=$mysqli->query($gtstname);
					$stgtstname=$qgtstname->fetch_assoc();
$fstname=substr($stgtstname['borno_school_student_name'],0,21);

$pdf->Cell(40,5,"",0,0,"L");
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(40,7.8,"",0,0,"L");
$pdf->Ln();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,$fstname,0,0,"L");
$pdf->Ln();
$pdf->Cell(40,2.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,$fnsclass,0,0,"L");	
$pdf->Ln();
$pdf->Cell(40,2,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,$fnssection,0,0,"L");	
$pdf->Ln();
$pdf->Cell(40,2.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,"Not Applicable",0,0,"L");	
$pdf->Ln();
$pdf->Cell(40,2.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,$gtstotal111,0,0,"L");	
$pdf->Ln();
$pdf->Cell(40,2.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,$stsess,0,0,"L");	
$pdf->Ln();
$pdf->Cell(40,2.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,'',0,0,"L");	
$pdf->Ln();
$pdf->Cell(40,4,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Cell(100,5,$fnsterm,0,0,"L");	
$pdf->SetFont('Arial','',7);  
				
		
	
		


$pdf->Ln();




	

$pdf->Cell(220,2,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(220,4.5,'',0,0,"L");
$pdf->Ln();


		
		


$pdf->Ln();
 $gtstotalban ="select * from borno_class6_8_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight=1";
					$qgtstotalban=$mysqli->query($gtstotalban);
					$sqgtstotalban=$qgtstotalban->fetch_assoc();		
		            $stNbangla=$sqgtstotalban['subject_id_six_eight'];
		            $stNbangla1=$sqgtstotalban['temp_res_number_type1'];
		            $stNbangla2=$sqgtstotalban['temp_res_number_type2'];
		            $stNbangla3=$sqgtstotalban['temp_res_number_type3'];
		            $stNbangla4=$sqgtstotalban['temp_res_number_type4'];
		            $stNbangla5=$sqgtstotalban['temp_res_number_type5'];
		            $stNbangla6=$sqgtstotalban['temp_res_number_type6'];
		            

 $gtstotalban1 ="select * from borno_class6_8_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight=2";
					$qgtstotalban1=$mysqli->query($gtstotalban1);
					$sqgtstotalban1=$qgtstotalban1->fetch_assoc(); 
					$stNbanglatotal=$sqgtstotalban1['res_total_conv'];
    				$stphoneban=$sqgtstotalban1['res_gpa'];
					$stgpban=$sqgtstotalban1['res_lg'];

 $gtstotalban1h ="select * from borno_height_mark_class6_8 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND subject_id_six_eight=1";
					$qgtstotalban1h=$mysqli->query($gtstotalban1h);
					$sqgtstotalban1h=$qgtstotalban1h->fetch_assoc();    
    				$stNamebanh=$sqgtstotalban1h['getmaxmark'];					


$pdf->SetFont('Arial','B',13);  	
$pdf->Ln();
$pdf->Cell(40,3.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(91,5,'',0,0,"L");
$pdf->Cell(17,5,$stNbangla1,0,0,"C");	
$pdf->Cell(17,5,$stNbangla2,0,0,"C");
$pdf->Cell(18,5,'',0,0,"L");
$pdf->Cell(20,10,$stNbanglatotal,0,0,"C");
$pdf->Cell(13,10,$stphoneban,0,0,"C");
$pdf->Cell(18,10,$stgpban,0,0,"C");
$pdf->Cell(1,5,'',0,0,"C"); 
 $gtstotalban22 ="select * from borno_class6_8_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight=2";
					$qgtstotalban22=$mysqli->query($gtstotalban22);
					$sqgtstotalban22=$qgtstotalban22->fetch_assoc();		
		            $stNbangla=$sqgtstotalban22['subject_id_six_eight'];
		            $stNbangla11=$sqgtstotalban22['temp_res_number_type1'];
		            $stNbangla21=$sqgtstotalban22['temp_res_number_type2'];
		            $stNbangla31=$sqgtstotalban22['temp_res_number_type3'];
		            $stNbangla41=$sqgtstotalban22['temp_res_number_type4'];
		            $stNbangla51=$sqgtstotalban22['temp_res_number_type5'];
		            $stNbangla61=$sqgtstotalban22['temp_res_number_type6'];
		            $stNbanglatotal1=$sqgtstotalban22['total_mark'];

 $gtstotalban12 ="select * from borno_class6_8_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight=2";
					$qgtstotalban12=$mysqli->query($gtstotalban12);
					$sqgtstotalban12=$qgtstotalban12->fetch_assoc();    
    				$stphoneban1=$sqgtstotalban12['res_gpa'];
					$stgpban1=$sqgtstotalban12['res_lg'];

 $gtstotalban1h ="select * from borno_height_mark_class6_8 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND subject_id_six_eight=2";
					$qgtstotalban1h=$mysqli->query($gtstotalban1h);
					$sqgtstotalban1h=$qgtstotalban1h->fetch_assoc();    
    				$stNamebanh=$sqgtstotalban1h['getmaxmark'];					


$pdf->SetFont('Arial','B',13);  	
$pdf->Ln();

$pdf->Cell(91,5,'',0,0,"L");
$pdf->Cell(17,5,$stNbangla11,0,0,"C");	
$pdf->Cell(17,5,$stNbangla21,0,0,"C");
$pdf->Cell(18,5,'',0,0,"L");
$pdf->Cell(20,5,'',0,0,"C");
$pdf->Cell(13,5,'',0,0,"C");
$pdf->Cell(18,5,'',0,0,"C");

 $gtstotaleng ="select * from borno_class6_8_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight=3";
					$qgtstotaleng=$mysqli->query($gtstotaleng);
					$sqgtstotaleng=$qgtstotaleng->fetch_assoc();		
		            $stNenglish=$sqgtstotaleng['subject_id_six_eight'];
		            $stNenglish1=$sqgtstotaleng['temp_res_number_type1'];
		            $stNenglish2=$sqgtstotaleng['temp_res_number_type2'];
		            $stNenglish3=$sqgtstotaleng['temp_res_number_type3'];
		            $stNenglish4=$sqgtstotaleng['temp_res_number_type4'];
		            $stNenglish5=$sqgtstotaleng['temp_res_number_type5'];
		            $stNenglish6=$sqgtstotaleng['temp_res_number_type6'];
	
		

 $gtstotaleng1 ="select * from borno_class6_8_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight=4";
					$qgtstotaleng1=$mysqli->query($gtstotaleng1);
					$sqgtstotaleng1=$qgtstotaleng1->fetch_assoc(); 
					$stNenglishtotal=$sqgtstotaleng1['res_total_conv'];
    				$stphoneeng=$sqgtstotaleng1['res_gpa'];
					$stgpeng=$sqgtstotaleng1['res_lg'];

 $gtstotaleng1h ="select * from borno_height_mark_class6_8 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND subject_id_six_eight=3";
					$qgtstotaleng1h=$mysqli->query($gtstotaleng1h);
					$sqgtstotaleng1h=$qgtstotaleng1h->fetch_assoc();    
    				$stNameengh=$sqgtstotaleng1h['getmaxmark'];					
$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(91,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglish1,0,0,"C");	
$pdf->Cell(17,5,'',0,0,"C");
$pdf->Cell(18,5,'',0,0,"L");
$pdf->Cell(20,10,$stNenglishtotal,0,0,"C");
$pdf->Cell(13,10,$stphoneeng,0,0,"C");
$pdf->Cell(18,10,$stgpeng,0,0,"C");
$pdf->Cell(1,5,'',0,0,"C");

 $gtstotaleng11 ="select * from borno_class6_8_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight=4";
					$qgtstotaleng11=$mysqli->query($gtstotaleng11);
					$sqgtstotaleng11=$qgtstotaleng11->fetch_assoc();		
		            $stNenglish=$sqgtstotaleng11['subject_id_six_eight'];
		            $stNenglish11=$sqgtstotaleng11['temp_res_number_type1'];
		            $stNenglish21=$sqgtstotaleng11['temp_res_number_type2'];
		            $stNenglish31=$sqgtstotaleng11['temp_res_number_type3'];
		            $stNenglish41=$sqgtstotaleng11['temp_res_number_type4'];
		            $stNenglish51=$sqgtstotaleng11['temp_res_number_type5'];
		            $stNenglish61=$sqgtstotaleng11['temp_res_number_type6'];
		            $stNenglishtotal1=$sqgtstotaleng11['total_mark'];
		

 $gtstotaleng12 ="select * from borno_class6_8_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight=4";
					$qgtstotaleng12=$mysqli->query($gtstotaleng12);
					$sqgtstotaleng12=$qgtstotaleng12->fetch_assoc();    
    				$stphoneeng1=$sqgtstotaleng12['res_gpa'];
					$stgpeng1=$sqgtstotaleng12['res_lg'];

 $gtstotaleng1h ="select * from borno_height_mark_class6_8 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND subject_id_six_eight=3";
					$qgtstotaleng1h=$mysqli->query($gtstotaleng1h);
					$sqgtstotaleng1h=$qgtstotaleng1h->fetch_assoc();    
    				$stNameengh=$sqgtstotaleng1h['getmaxmark'];					
$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(91,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglish11,0,0,"C");	
$pdf->Cell(17,5,'',0,0,"C");
$pdf->Cell(18,5,'',0,0,"L");
$pdf->Cell(20,5,'',0,0,"C");
$pdf->Cell(13,5,'',0,0,"C");
$pdf->Cell(18,5,'',0,0,"C");

 $gtstotaleng11 ="select * from borno_class6_8_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight=5";
					$qgtstotaleng11=$mysqli->query($gtstotaleng11);
					$sqgtstotaleng11=$qgtstotaleng11->fetch_assoc();		
		            $stNenglish11=$sqgtstotaleng11['temp_res_number_type1'];
		            $stNenglish21=$sqgtstotaleng11['temp_res_number_type2'];
		            $stNenglish31=$sqgtstotaleng11['temp_res_number_type3'];
		            $stNenglish41=$sqgtstotaleng11['temp_res_number_type4'];
		            $stNenglish51=$sqgtstotaleng11['temp_res_number_type5'];
		            $stNenglish61=$sqgtstotaleng11['temp_res_number_type6'];
		            $stNenglishtotal1=$sqgtstotaleng11['total_mark'];
		

 $gtstotaleng21 ="select * from borno_class6_8_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight=5";
					$qgtstotaleng21=$mysqli->query($gtstotaleng21);
					$sqgtstotaleng21=$qgtstotaleng21->fetch_assoc();    
    				$stphoneeng1=$sqgtstotaleng21['res_gpa'];
					$stgpeng1=$sqgtstotaleng21['res_lg'];		

$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(91,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglish11,0,0,"C");	
$pdf->Cell(17,5,$stNenglish21,0,0,"C");
$pdf->Cell(18,5,'',0,0,"L");
$pdf->Cell(20,5,$stNenglishtotal1,0,0,"C");
$pdf->Cell(13,5,$stphoneeng1,0,0,"C");
$pdf->Cell(18,5,$stgpeng1,0,0,"C");

 $gtstotaleng112 ="select * from borno_class6_8_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight=6";
					$qgtstotaleng112=$mysqli->query($gtstotaleng112);
					$sqgtstotaleng112=$qgtstotaleng112->fetch_assoc();		
		            $stNenglish112=$sqgtstotaleng112['temp_res_number_type1'];
		            $stNenglish212=$sqgtstotaleng112['temp_res_number_type2'];
		            $stNenglish312=$sqgtstotaleng112['temp_res_number_type3'];
		            $stNenglish412=$sqgtstotaleng112['temp_res_number_type4'];
		            $stNenglish512=$sqgtstotaleng112['temp_res_number_type5'];
		            $stNenglish612=$sqgtstotaleng112['temp_res_number_type6'];
		            $stNenglishtotal12=$sqgtstotaleng112['total_mark'];
		

 $gtstotaleng212 ="select * from borno_class6_8_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight=6";
					$qgtstotaleng212=$mysqli->query($gtstotaleng212);
					$sqgtstotaleng212=$qgtstotaleng212->fetch_assoc();    
    				$stphoneeng12=$sqgtstotaleng212['res_gpa'];
					$stgpeng12=$sqgtstotaleng212['res_lg'];		

$pdf->Cell(40,7,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(91,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglish112,0,0,"C");	
$pdf->Cell(17,5,$stNenglish212,0,0,"C");
$pdf->Cell(18,5,'',0,0,"L");
$pdf->Cell(20,5,$stNenglishtotal12,0,0,"C");
$pdf->Cell(13,5,$stphoneeng12,0,0,"C");
$pdf->Cell(18,5,$stgpeng12,0,0,"C");

$gtstotaleng1123 ="select * from borno_class6_8_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight=7";
					$qgtstotaleng1123=$mysqli->query($gtstotaleng1123);
					$sqgtstotaleng1123=$qgtstotaleng1123->fetch_assoc();		
		            $stNenglish1123=$sqgtstotaleng1123['temp_res_number_type1'];
		            $stNenglish2123=$sqgtstotaleng1123['temp_res_number_type2'];
		            $stNenglish3123=$sqgtstotaleng1123['temp_res_number_type3'];
		            $stNenglish4123=$sqgtstotaleng1123['temp_res_number_type4'];
		            $stNenglish5123=$sqgtstotaleng1123['temp_res_number_type5'];
		            $stNenglish6123=$sqgtstotaleng1123['temp_res_number_type6'];
		            $stNenglishtotal123=$sqgtstotaleng1123['total_mark'];
		

$gtstotaleng2123 ="select * from borno_class6_8_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight=7";
					$qgtstotaleng2123=$mysqli->query($gtstotaleng2123);
					$sqgtstotaleng2123=$qgtstotaleng2123->fetch_assoc();    
    				$stphoneeng123=$sqgtstotaleng2123['res_gpa'];
					$stgpeng123=$sqgtstotaleng2123['res_lg'];		

$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(91,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglish1123,0,0,"C");	
$pdf->Cell(17,5,$stNenglish2123,0,0,"C");
$pdf->Cell(18,5,'',0,0,"L");
$pdf->Cell(20,5,$stNenglishtotal123,0,0,"C");
$pdf->Cell(13,5,$stphoneeng123,0,0,"C");
$pdf->Cell(18,5,$stgpeng123,0,0,"C");


$gtstotaleng11234 ="select * from borno_class6_8_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight=8";
					$qgtstotaleng11234=$mysqli->query($gtstotaleng11234);
					$sqgtstotaleng11234=$qgtstotaleng11234->fetch_assoc();		
		      $stNenglish11234=$sqgtstotaleng11234['temp_res_number_type1'];
		      $stNenglish21234=$sqgtstotaleng11234['temp_res_number_type2'];
		      $stNenglish31234=$sqgtstotaleng11234['temp_res_number_type3'];
		      $stNenglish41234=$sqgtstotaleng11234['temp_res_number_type4'];
		      $stNenglish51234=$sqgtstotaleng11234['temp_res_number_type5'];
		      $stNenglish61234=$sqgtstotaleng11234['temp_res_number_type6'];
		      $stNenglishtotal1234=$sqgtstotaleng11234['total_mark'];
		

$gtstotaleng21234 ="select * from borno_class6_8_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight=8";
					$qgtstotaleng21234=$mysqli->query($gtstotaleng21234);
					$sqgtstotaleng21234=$qgtstotaleng21234->fetch_assoc();    
    				$stphoneeng1234=$sqgtstotaleng21234['res_gpa'];
					$stgpeng1234=$sqgtstotaleng21234['res_lg'];		

$pdf->Cell(40,6.5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(91,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglish11234,0,0,"C");	
$pdf->Cell(17,5,$stNenglish21234,0,0,"C");
$pdf->Cell(18,5,'',0,0,"L");
$pdf->Cell(20,5,$stNenglishtotal1234,0,0,"C");
$pdf->Cell(13,5,$stphoneeng1234,0,0,"C");
$pdf->Cell(18,5,$stgpeng1234,0,0,"C");

$gtstotaleng1123459 ="select * from borno_class6_8_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight=9";
					$qgtstotaleng1123459=$mysqli->query($gtstotaleng1123459);
					$sqgtstotaleng1123459=$qgtstotaleng1123459->fetch_assoc();		
		      $stNenglish1123451=$sqgtstotaleng1123459['temp_res_number_type1'];
		      $stNenglish2123451=$sqgtstotaleng1123459['temp_res_number_type2'];
		      $stNenglish3123451=$sqgtstotaleng1123459['temp_res_number_type3'];
		      $stNenglish4123451=$sqgtstotaleng1123459['temp_res_number_type4'];
		      $stNenglish5123451=$sqgtstotaleng1123459['temp_res_number_type5'];
		      $stNenglish6123451=$sqgtstotaleng1123459['temp_res_number_type6'];
		      $stNenglishtotal123451=$sqgtstotaleng1123459['total_mark'];
		

$gtstotaleng2123459 ="select * from borno_class6_8_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight=9";
					$qgtstotaleng2123459=$mysqli->query($gtstotaleng2123459);
					$sqgtstotaleng2123459=$qgtstotaleng2123459->fetch_assoc();    
    				$stphoneeng123451=$sqgtstotaleng2123459['res_gpa'];
					$stgpeng123451=$sqgtstotaleng2123459['res_lg'];		

$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(91,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglish1123451,0,0,"C");	
$pdf->Cell(17,5,$stNenglish2123451,0,0,"C");
$pdf->Cell(18,5,'',0,0,"L");
$pdf->Cell(20,5,$stNenglishtotal123451,0,0,"C");
$pdf->Cell(13,5,$stphoneeng123451,0,0,"C");
$pdf->Cell(18,5,$stgpeng123451,0,0,"C");

$gtstotaleng112345 ="select * from borno_class6_8_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight=12";
					$qgtstotaleng112345=$mysqli->query($gtstotaleng112345);
					$sqgtstotaleng112345=$qgtstotaleng112345->fetch_assoc();		
		      $stNenglish112345=$sqgtstotaleng112345['temp_res_number_type1'];
		      $stNenglish212345=$sqgtstotaleng112345['temp_res_number_type2'];
		      $stNenglish312345=$sqgtstotaleng112345['temp_res_number_type3'];
		      $stNenglish412345=$sqgtstotaleng112345['temp_res_number_type4'];
		      $stNenglish512345=$sqgtstotaleng112345['temp_res_number_type5'];
		      $stNenglish612345=$sqgtstotaleng112345['temp_res_number_type6'];
		      $stNenglishtotal12345=$sqgtstotaleng112345['total_mark'];
		

$gtstotaleng212345 ="select * from borno_class6_8_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight=12";
					$qgtstotaleng212345=$mysqli->query($gtstotaleng212345);
					$sqgtstotaleng212345=$qgtstotaleng212345->fetch_assoc();    
    				$stphoneeng12345=$sqgtstotaleng212345['res_gpa'];
					$stgpeng12345=$sqgtstotaleng212345['res_lg'];		

$pdf->Cell(40,11,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(91,5,'',0,0,"L");
$pdf->Cell(17,5,$stNenglish112345,0,0,"C");	
$pdf->Cell(17,5,$stNenglish212345,0,0,"C");
$pdf->Cell(18,5,'',0,0,"L");
$pdf->Cell(20,5,$stNenglishtotal12345,0,0,"C");
$pdf->Cell(13,5,$stphoneeng12345,0,0,"C");
$pdf->Cell(18,5,$stgpeng12345,0,0,"C");			    
				



	


	
$gtstotal ="select * from borno_school_6_8_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term AND borno_school_roll=$gtstotal111";
					$qgtstotal=$mysqli->query($gtstotal);
					$stggtstotal=$qgtstotal->fetch_assoc();

$fstotal=$stggtstotal['grandtotal'];
$fstotal1=$stggtstotal['gpa'];



$pdf->Cell(40,5,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(91,5,'',0,0,"L");
$pdf->Cell(17,5,'',0,0,"C");	
$pdf->Cell(17,5,'',0,0,"C");
$pdf->Cell(18,5,'',0,0,"L");
$pdf->Cell(20,5,$fstotal,0,0,"C");
$pdf->Cell(13,5,$fstotal1,0,0,"C");
$pdf->Cell(21,5,'',0,0,"C");	
		



		
$gtstotal1 ="select * from borno_school_6_8_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term AND borno_school_roll=$gtstotal111";
					$qgtstotal1=$mysqli->query($gtstotal1);
					$stggtstotal1=$qgtstotal1->fetch_assoc();

$fmerit1=$stggtstotal1['merit_section'];
$fmerit2=$stggtstotal1['merit_shift'];
$fmerit3=$stggtstotal1['merit_class'];
$failno=$stggtstotal1['failno'];

if($fstotal1==0 OR $fstotal1=="")
{$status="Fail";}
else{$status="Pass";}
$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(35,7,'',0,0,"L");
$pdf->Cell(40,7,'',0,0,"L");
$pdf->Cell(35,5,"($fnssection)",0,0,"R");
$pdf->Cell(40,7,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(34,5,$status,0,0,"C");
$pdf->Cell(40,5,$fmerit3,0,0,"C");
$pdf->Cell(40,5,$fmerit1,0,0,"C");
$pdf->Cell(41,5,$failno,0,0,"C");
$pdf->Cell(40,5,$status,0,0,"C");
$pdf->Cell(21,5,'',0,0,"C");
	
		
		
	


		


$gtstotal1123 ="select * from borno_school_6_8_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term";
	                $qgtstotal1123=$mysqli->query($gtstotal1123);
					$totalstudent=mysqli_num_rows($qgtstotal1123); 
					
$gtsattend ="select * from borno_school_attendence where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term AND borno_school_roll='$gtstotal111'";
	                $qggtsattend=$mysqli->query($gtsattend);
					$stgqqggtsattend=$qggtsattend->fetch_assoc();
					$presence=$stgqqggtsattend['borno_school_presence'];
					$absence=$stgqqggtsattend['borno_school_absence'];					

$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,6,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(40,8,'',0,0,"L");
$pdf->Ln();
$pdf->Cell(34,5,$schoolingday,0,0,"C");
$pdf->Cell(40,5,$presence,0,0,"C");
$pdf->Cell(40,5,$absence,0,0,"C");
$pdf->Ln();
$pdf->Ln();








}
}


$pdf->Output();
?>