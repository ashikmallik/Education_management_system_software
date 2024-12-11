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
	
	$finalSchoolLogo="../../../../new/pannel/academic/infosett/school-logo/$gtschoolLogo";
	
	} else {
		$finalSchoolLogo="../../../../new/pannel/academic/infosett/school-logo/nologo.png";
		}
		


$gtschoolsignature=$sqgtschoolName['signature'];
	if($gtschoolsignature!=""){
	
	$finalgtschoolsignature="../../../../new/pannel/academic/teacher/signature/$gtschoolsignature";
	
	} else {
		$finalgtschoolsignature="../../../../new/pannel/academic/teacher/signature/nophoto.jpg";
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
  
    $this->Image($finalSchoolLogo1,12,5,25,25);
	
	
}

// Page footer
function Footer()
{
    
	$finalgtschoolsignature1=$GLOBALS['finalgtschoolsignature'];
  
    $this->Image($finalgtschoolsignature1,220,185,30,10);
	
	// Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','',14);
    // Page number
	$this->Cell(90,1,"----------------------------",0,0,"C"); 
	$this->Cell(90,1,"-------------------------------------",0,0,"C"); 
	
	$this->Cell(90,1,"---------------------------------------",0,0,"C"); 
	$this->Ln();
	$this->Cell(90,5,"Guardian's Signature",0,0,"C"); 
	$this->Cell(90,5,"Class Teacher's Signature",0,0,"C"); 
	$this->Cell(45,5,$GLOBALS['fnshead'],0,0,"R");
	$this->Cell(45,5," Signature",0,0,"L"); 
	$this->SetFont('Arial','',8);
	$this->Ln();
	$this->Cell(20,5,"Publish Date : ",0,0,"L"); 
	$this->Cell(90,5,$GLOBALS['publish'],0,0,"L"); 
   // $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage(L);

if($studClass==1 OR $studClass==2)
{
  $result23 ="select * from borno_school_9_10_merit where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll between $rollf AND $rollt order by borno_school_roll asc";
$snl=0;
					$qgresult23=$mysqli->query($result23);
					while($row23=$qgresult23->fetch_assoc()){ $snl++;

					$gtstotal111=$row23['borno_school_roll'];
                    $gtstdid=$row23['borno_student_info_id'];

   

//----------------- School Name ------------------------------------------------------------------
$pdf->SetFont('Arial','',20);
$pdf->Cell(220,2,$fnschname,0,0,"C");
$pdf->SetFont('Arial','',7);  
$pdf->Cell(60,4,"Grading System",1,0,"C");

$pdf->Ln();


$pdf->Cell(220,1,'',0,0,"C");

$pdf->SetFont('Arial','',7);  
$pdf->Cell(28,4,"Mark Range",1,0,"C");
$pdf->Cell(12,4,"Grade",1,0,"C");
$pdf->Cell(20,4,"Grade Point",1,0,"C");
$pdf->Ln();

$pdf->SetFont('Arial','',16); 
if( $schId==81)
{ $pdf->Cell(220,2,"Tejgaon, Dhaka-1215",0,0,"C");
    
}
else{
$pdf->Cell(220,2,"Branch : $fnsbranch",0,0,"C");
}


$pdf->SetFont('Arial','',7); 
$result1 ="select * from borno_grading_chart where borno_school_session='$stsess' AND borno_school_id='$schId' AND borno_school_class_id=$studClass";

					$qresult1=$mysqli->query($result1);
					$row1=$qresult1->fetch_assoc();
	
		$stnn1=$row1['marks_from1'];
		$stnn2=$row1['marks_to1'];
		$stnn3=$row1['letter_grade1'];
		$stnn4=$row1['grade_point1'];
		
		$stnm1=$row1['marks_from2'];
		$stnm2=$row1['marks_to2'];
		$stnm3=$row1['letter_grade2'];
		$stnm4=$row1['grade_point2'];
			
		$stnm11=$row1['marks_from3'];
		$stnm21=$row1['marks_to3'];
		$stnm31=$row1['letter_grade3'];
		$stnm41=$row1['grade_point3'];	
		
		$stnm111=$row1['marks_from4'];
		$stnm211=$row1['marks_to4'];
		$stnm311=$row1['letter_grade4'];
		$stnm411=$row1['grade_point4'];		
		
		$stnm1111=$row1['marks_from5'];
		$stnm2111=$row1['marks_to5'];
		$stnm3111=$row1['letter_grade5'];
		$stnm4111=$row1['grade_point5'];
		
		$stnm1112=$row1['marks_from6'];
		$stnm2112=$row1['marks_to6'];
		$stnm3112=$row1['letter_grade6'];
		$stnm4112=$row1['grade_point6'];
		
		$stnm11121=$row1['marks_from7'];
		$stnm21121=$row1['marks_to7'];
		$stnm31121=$row1['letter_grade7'];
		$stnm41121=$row1['grade_point7'];				
		
		$pdf->Cell(14,4,$stnn1,1,0,"C");
		$pdf->Cell(14,4,$stnn2,1,0,"C");
		$pdf->Cell(12,4,$stnn3,1,0,"C");
		$pdf->Cell(20,4,$stnn4,1,0,"C");


	$pdf->Ln();
 
$pdf->Cell(220,1,'',0,0,"C"); 

//----------------- Branch Name ------------------------------------------------------------------


		$pdf->SetFont('Arial','',7);  
		$pdf->Cell(14,4,$stnm1,1,0,"C");
		$pdf->Cell(14,4,$stnm2,1,0,"C");
		$pdf->Cell(12,4,$stnm3,1,0,"C");
		$pdf->Cell(20,4,$stnm4,1,0,"C");

	$pdf->Ln();

	$pdf->SetFont('Arial','U',14);  
$pdf->Cell(220,2,'Progress Report',0,0,"C"); 

		$pdf->SetFont('Arial','',7);  
		$pdf->Cell(14,4,$stnm11,1,0,"C");
		$pdf->Cell(14,4,$stnm21,1,0,"C");
		$pdf->Cell(12,4,$stnm31,1,0,"C");
		$pdf->Cell(20,4,$stnm41,1,0,"C");
	$pdf->Ln();
	
	
	
 $gtstname ="select * from borno_student_info where borno_student_info_id='$gtstdid'";

$pdf->SetFont('Arial','U',12);
					$qgtstname=$mysqli->query($gtstname);
					$stgtstname=$qgtstname->fetch_assoc();
$fstname=$stgtstname['borno_school_student_name'];
$pdf->Cell(220,5,"Progress Report of : $fstname",0,0,"L");

		$pdf->SetFont('Arial','',7);  
		$pdf->Cell(14,4,$stnm111,1,0,"C");
		$pdf->Cell(14,4,$stnm211,1,0,"C");
		$pdf->Cell(12,4,$stnm311,1,0,"C");
		$pdf->Cell(20,4,$stnm411,1,0,"C");



$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->Cell(220,5,'',0,0,"L");


		$pdf->SetFont('Arial','',7);  
		$pdf->Cell(14,4,$stnm1111,1,0,"C");
		$pdf->Cell(14,4,$stnm2111,1,0,"C");
		$pdf->Cell(12,4,$stnm3111,1,0,"C");
		$pdf->Cell(20,4,$stnm4111,1,0,"C");
	

$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->Cell(15,5,"Class :",0,0,"L");
$pdf->SetFont('Arial','I',10);
$pdf->Cell(65,5,$fnsclass,0,0,"L");
$pdf->SetFont('Arial','',10);
$pdf->Cell(21,5,"Roll :",0,0,"L");
$pdf->SetFont('Arial','I',10);
$pdf->Cell(49,5,$gtstotal111,0,0,"L");
$pdf->SetFont('Arial','',10);
$pdf->Cell(20,5,"Shift :",0,0,"L");
$pdf->SetFont('Arial','I',10);
$pdf->Cell(50,5,$fnsshift,0,0,"L");


		$pdf->SetFont('Arial','',7);  
				
		
		$pdf->Cell(14,4,$stnm1112,1,0,"C");
		$pdf->Cell(14,4,$stnm2112,1,0,"C");
		$pdf->Cell(12,4,$stnm3112,1,0,"C");
		$pdf->Cell(20,4,$stnm4112,1,0,"C");



$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->Cell(15,5,"Section :",0,0,"L");
$pdf->SetFont('Arial','I',10);
$pdf->Cell(65,5,$fnssection,0,0,"L");
$pdf->SetFont('Arial','',10);
$pdf->Cell(21,5,"Exam Type :",0,0,"L");
$pdf->SetFont('Arial','I',10);
$pdf->Cell(49,5,$fnsterm,0,0,"L");
$pdf->SetFont('Arial','',10);
$pdf->Cell(20,5,"Exam Year :",0,0,"L");
$pdf->SetFont('Arial','I',10);
$pdf->Cell(50,5,$stsess,0,0,"L");



		$pdf->SetFont('Arial','',7);  
		$pdf->Cell(14,4,$stnm11121,1,0,"C");
		$pdf->Cell(14,4,$stnm21121,1,0,"C");
		$pdf->Cell(12,4,$stnm31121,1,0,"C");
		$pdf->Cell(20,4,$stnm41121,1,0,"C");
	
$pdf->Ln();
$pdf->SetFont('Arial','',10);
if($group==1)
{
$pdf->Cell(50,5,"Department : Science",0,0,"L");    
}  
elseif($group==2)
{
$pdf->Cell(50,5,"Department : Business Studies",0,0,"L");    
} 
elseif($group==3)
{
$pdf->Cell(50,5,"Department : Humanities",0,0,"L");    
} 
$pdf->Ln();
$pdf->SetFont('Arial','',10);
$numbertype ="select * from borno_result_number_type where borno_school_session='$stsess' AND borno_school_id='$schId' AND borno_school_class_id='$studClass'";
					$qnumbertype=$mysqli->query($numbertype);
					$sqnumbertype=$qnumbertype->fetch_assoc();
					
		$type1=$sqnumbertype['borno_school_number_type1'];
		$type2=$sqnumbertype['borno_school_number_type2'];
		$type3=$sqnumbertype['borno_school_number_type3'];
		$type4=$sqnumbertype['borno_school_number_type4'];
		$type5=$sqnumbertype['borno_school_number_type5'];
		$type6=$sqnumbertype['borno_school_number_type6'];



		$pdf->Cell(60,5,"Subject Name",1);
		$pdf->Cell(20,5,"Full Mark",1,0,"C");
		
		
		$pdf->Cell(20,5,$type1,1,0,"C");
		$pdf->Cell(20,5,$type2,1,0,"C");
		$pdf->Cell(20,5,$type3,1,0,"C");
		$pdf->Cell(20,5,$type4,1,0,"C");
		$pdf->Cell(20,5,$type5,1,0,"C");
		$pdf->Cell(20,5,$type6,1,0,"C");
		$pdf->Cell(20,5,Total,1,0,"C");
		$pdf->Cell(30,5,"Highest Mark",1,0,"C");
		$pdf->Cell(15,5,GP,1,0,"C");
		$pdf->Cell(15,5,LG,1,0,"C");

		$pdf->Ln();	
		
		


$result = "select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' order by borno_subject_nine_ten_id asc";
$sl=0;

					$qresult=$mysqli->query($result);
					while($row=$qresult->fetch_assoc()) { $sl++;

	//foreach($row as $column)
		
		$stroll=$s1;
		$stN=$row['borno_subject_nine_ten_id'];

$getsubjstatus1="select * from borno_result_nine_ten_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borin_subject_nine_ten_id='$stN' AND uncountable=1";
$qgetsubjstatus1=$mysqli->query($getsubjstatus1);
$shgetsubjstatus1=$qgetsubjstatus1->fetch_assoc();	
$uncountable=$shgetsubjstatus1['uncountable'];
if($uncountable!=""){goto lastline2;}

		$stN1=$row['temp_res_number_type1'];
		$stN2=$row['temp_res_number_type2'];
		$stN3=$row['temp_res_number_type3'];
		$stN4=$row['temp_res_number_type4'];
		$stN5=$row['temp_res_number_type5'];
		$stN6=$row['temp_res_number_type6'];

if($stN==1 OR $stN==2 OR $stN==3 OR $stN==4)
{
$gtstotal ="select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=$stN";
					$qgtstotal=$mysqli->query($gtstotal);
					$sqgtstotal=$qgtstotal->fetch_assoc();	
					$stName=$sqgtstotal['total_marks'];
					
if($stN==1 OR $stN==2)
{					
$gtstotal1 ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND pare=1";
					$qgtstotal1=$mysqli->query($gtstotal1);
					$sqgtstotal1=$qgtstotal1->fetch_assoc();
					$stName1=$sqgtstotal1['res_total_conv'];
					$stphone=$sqgtstotal1['res_gpa'];
					$stgp=$sqgtstotal1['res_lg'];
}
elseif($stN==3 OR $stN==4)
{					
$gtstotal1 ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND pare=2";
					$qgtstotal1=$mysqli->query($gtstotal1);
					$sqgtstotal1=$qgtstotal1->fetch_assoc();
					$stName1=$sqgtstotal1['res_total_conv'];
					$stphone=$sqgtstotal1['res_gpa'];
					$stgp=$sqgtstotal1['res_lg'];
}
}
else
{
$gtstotal ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=$stN";
					$qgtstotal=$mysqli->query($gtstotal);
					$sqgtstotal=$qgtstotal->fetch_assoc();
					$stName=$sqgtstotal['res_total_conv'];
					$stphone=$sqgtstotal['res_gpa'];
					$stgp=$sqgtstotal['res_lg'];	
}							
		
		
	
		$gtsubject ="select * from borno_subject_nine_ten where borno_subject_nine_ten_id=$stN";
					$qgtsubject=$mysqli->query($gtsubject);
					$stgtsubject=$qgtsubject->fetch_assoc();
					$fsstgtsubject=$stgtsubject['borno_subject_nine_ten_name'];

		
		$pdf->Cell(60,5,$fsstgtsubject,1);
		

$subjectdetails ="select * from borno_result_nine_ten_subject_details where borno_school_session='$stsess' AND borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_result_term_id='$term' AND borin_subject_nine_ten_id='$stN'";
					$qsubjectdetails=$mysqli->query($subjectdetails);
					$sqsubjectdetails=$qsubjectdetails->fetch_assoc();
					
		$fsstgtsubject1=$sqsubjectdetails['borno_nine_ten_subfullmark'];			
		$subtype1=$sqsubjectdetails['number_type1_marks'];
		$subtype2=$sqsubjectdetails['number_type2_marks'];
		$subtype3=$sqsubjectdetails['number_type3_marks'];
		$subtype4=$sqsubjectdetails['number_type4_marks'];
		$subtype5=$sqsubjectdetails['number_type5_marks'];
		$subtype6=$sqsubjectdetails['number_type6_marks'];					
		
		
		$pdf->Cell(20,5,$fsstgtsubject1,1,0,"C");
		if($subtype1!=0)
		{		
		$pdf->Cell(20,5,$stN1,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		if($subtype2!=0)
		{		
		$pdf->Cell(20,5,$stN2,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		if($subtype3!=0)
		{		
		$pdf->Cell(20,5,$stN3,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		if($subtype4!=0)
		{		
		$pdf->Cell(20,5,$stN4,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		if($subtype5!=0)
		{		
		$pdf->Cell(20,5,$stN5,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		if($subtype6!=0)
		{		
		$pdf->Cell(20,5,$stN6,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		
		
		
		
		
		
		
$result22 = "select * from borno_height_mark_class9_10 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_subject_nine_ten_id=$stN";
					$qresult22=$mysqli->query($result22);
					$row22=$qresult22->fetch_assoc();
				$fssthigh=$row22['getmaxmark'];	

        
		
		if($stN==1)
		{
		$pdf->Cell(10,5,$stName,1,0,"C");	
		$pdf->Cell(10,10,$stName1,1,0,"C");	
		$pdf->Cell(30,5,$fssthigh,1,0,"C");	
		$pdf->Cell(15,10,$stphone,1,0,"C");
		$pdf->Cell(15,10,$stgp,1,0,"C");
		$pdf->Cell(15,5,'',2,0,"C");
		}
		elseif($stN==2)
		{
		$pdf->Cell(10,5,$stName,1,0,"C");	
		$pdf->Cell(10,5,'',0,0,"C");	
		$pdf->Cell(30,5,$fssthigh,1,0,"C");	
		$pdf->Cell(15,5,'',0,0,"C");
		$pdf->Cell(15,5,'',0,0,"C");
		}
		elseif($stN==3)
		{
		$pdf->Cell(10,5,$stName,1,0,"C");	
		$pdf->Cell(10,10,$stName1,1,0,"C");	
		$pdf->Cell(30,5,$fssthigh,1,0,"C");	
		$pdf->Cell(15,10,$stphone,1,0,"C");
		$pdf->Cell(15,10,$stgp,1,0,"C");
		$pdf->Cell(15,5,'',2,0,"C");
		}
		elseif($stN==4)
		{
		$pdf->Cell(10,5,$stName,1,0,"C");	
		$pdf->Cell(10,5,'',0,0,"C");	
		$pdf->Cell(30,5,$fssthigh,1,0,"C");	
		$pdf->Cell(15,5,'',0,0,"C");
		$pdf->Cell(15,5,'',0,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,$stName,1,0,"C");	
		$pdf->Cell(30,5,$fssthigh,1,0,"C");	
		$pdf->Cell(15,5,$stphone,1,0,"C");
		$pdf->Cell(15,5,$stgp,1,0,"C");
		}
	$pdf->Ln();
	lastline2:				    
					}


$pdf->SetFont('Arial','',12);

	


		$pdf->Cell(200,6,"GrandTotal / GPA With 4th Subject",1);
$gtstotal ="select * from borno_school_9_10_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term AND borno_school_stud_group='$group' AND borno_school_roll=$gtstotal111";
					$qgtstotal=$mysqli->query($gtstotal);
					$stggtstotal=$qgtstotal->fetch_assoc();
$pdf->SetFont('Arial','',12);
$fstotal=$stggtstotal['grandtotal'];
$fstotal1=$stggtstotal['gpa'];
$fstotal13=$stggtstotal['grandtotal1'];
$fstotal114=$stggtstotal['gpa1'];


		$pdf->Cell(20,6,$fstotal,1,0,"C");
		$pdf->Cell(30,6,'',1);
		$pdf->Cell(30,6,$fstotal1,1,0,"C");
$pdf->Ln();
$pdf->Cell(200,6,"GrandTotal / GPA Without 4th Subject",1);
$pdf->Cell(20,6,$fstotal13,1,0,"C");
$pdf->Cell(30,6,'',1);
$pdf->Cell(30,6,$fstotal114,1,0,"C");
$pdf->Ln();	
$gt4th="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND 	stu4thsub=1";
					$qgt4th=$mysqli->query($gt4th);
					$stqgt4th=$qgt4th->fetch_assoc();
					$sub4th=$stqgt4th['borno_subject_nine_ten_id'];	
if($sub4th!="")
{
 $gtsubject12 ="select * from borno_subject_nine_ten where borno_subject_nine_ten_id=$sub4th";
					$qgtsubject12=$mysqli->query($gtsubject12);
					$stqgtsubject12=$qgtsubject12->fetch_assoc();
					$fsstgtsubject4th=$stqgtsubject12['borno_subject_nine_ten_name'];					
$pdf->SetFont('Arial','B',12);					
$pdf->Cell(280,6,"4th Subject Name : $fsstgtsubject4th",1);
}
else
{
				
$pdf->Cell(280,6,"4th Subject Name : ",1);
}
$pdf->Ln();	
$pdf->Cell(200,1,'',0,5,"C"); 
$pdf->Ln();

$pdf->SetFont('Arial','',10);
$resultun = "select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND uncountable=1 order by borno_subject_nine_ten_id asc";
$s11l=0;

					$qresultun=$mysqli->query($resultun);
					while($rowun=$qresultun->fetch_assoc()) { $s11l++;
		$stNun=$rowun['borno_subject_nine_ten_id'];			
        $stNun1=$rowun['temp_res_number_type1'];
		$stNun2=$rowun['res_number_type2'];
		$stNun3=$rowun['res_number_type3'];
		$stNun4=$rowun['res_number_type4'];
		$stNun5=$rowun['res_number_type5'];
		$stNun6=$rowun['res_number_type6'];
        $stNuncon1=$rowun['temp_res_number_type1_conv'];
		$stNuncon2=$rowun['res_number_type2_conv'];
		$stNuncon3=$rowun['res_number_type3_conv'];		
        $sttotal=$rowun['res_total_conv'];
        $stgpa=$rowun['res_gpa'];
        $stlg=$rowun['res_lg'];
        $convertun=$stNuncon1+$stNuncon2+$stNuncon3;
        
$result22un = "select * from borno_height_mark_class9_10 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_subject_nine_ten_id=$stNun";
					$qresult22un=$mysqli->query($result22un);
					$row22un=$qresult22un->fetch_assoc();
				$fssthighun=$row22un['getmaxmark'];	        

		$gtsubjectun ="select * from borno_subject_nine_ten where borno_subject_nine_ten_id=$stNun";
					$qgtsubjectun=$mysqli->query($gtsubjectun);
					$stgtsubjectun=$qgtsubjectun->fetch_assoc();
					$fsstgtsubjectun=$stgtsubjectun['borno_subject_nine_ten_name'];



	
$subjectdetailsun ="select * from borno_result_nine_ten_subject_details where borno_school_session='$stsess' AND borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_result_term_id='$term' AND borin_subject_nine_ten_id='$stNun'";
					$qsubjectdetailsun=$mysqli->query($subjectdetailsun);
					$sqsubjectdetailsun=$qsubjectdetailsun->fetch_assoc();
					
		$subtypeun1=$sqsubjectdetailsun['number_type1_marks'];
		$subtypeun2=$sqsubjectdetailsun['number_type2_marks'];
		$subtypeun3=$sqsubjectdetailsun['number_type3_marks'];
		$subtypeun4=$sqsubjectdetailsun['number_type4_marks'];
		$subtypeun5=$sqsubjectdetailsun['number_type5_marks'];
		$subtypeun6=$sqsubjectdetailsun['number_type6_marks'];					
		$fsstgtsubject1un=$sqsubjectdetailsun['borno_nine_ten_subfullmark'];
		$pdf->Cell(60,5,$fsstgtsubjectun,1);
		$pdf->Cell(20,5,$fsstgtsubject1un,1,0,"C");
		if($subtypeun1!=0)
		{		
		$pdf->Cell(20,5,$stNun1,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		if($subtypeun2!=0)
		{		
		$pdf->Cell(20,5,$stNun2,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		if($subtypeun3!=0)
		{		
		$pdf->Cell(20,5,$stNun3,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		

		if($subtypeun4!=0)
		{		
		$pdf->Cell(20,5,$stNun4,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		if($subtypeun5!=0)
		{		
		$pdf->Cell(20,5,$stNun5,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		if($subtypeun6!=0)
		{		
		$pdf->Cell(20,5,$stNun6,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		
        $pdf->Cell(20,5,$sttotal,1,0,"C");	
		$pdf->Cell(30,5,$fssthighun,1,0,"C");	
		$pdf->Cell(15,5,$stgpa,1,0,"C");
		$pdf->Cell(15,5,$stlg,1,0,"C");
 $pdf->Ln();       
}

$pdf->Cell(200,1,'',0,5,"C"); 
$pdf->Ln();
$pdf->SetFont('Arial','',12);

	


		
$gtstotal1 ="select * from borno_school_9_10_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term AND borno_school_stud_group='$group' AND borno_school_roll=$gtstotal111";
					$qgtstotal1=$mysqli->query($gtstotal1);
					$stggtstotal1=$qgtstotal1->fetch_assoc();
$pdf->SetFont('Arial','',12);
$fmerit1=$stggtstotal1['merit_section'];
$fmerit2=$stggtstotal1['merit_shift'];
$fmerit3=$stggtstotal1['merit_class'];
$failno=$stggtstotal1['failno'];


		$pdf->Cell(50,6,"Merit Position in Section",1);
	if ($failno!="0"){
		   $pdf->SetTextColor(255,0,0); 
		  $pdf->Cell(20,6,$fmerit1,1,0,"C");
		}
		else{
		    $pdf->SetTextColor(0,0,0);
		   $pdf->Cell(20,6,$fmerit1,1,0,"C");
		}
		
		$pdf->SetTextColor(0,0,0);
		$pdf->Cell(50,6,"Merit Position in Shift",1);
	if ($failno!="0"){
		   $pdf->SetTextColor(255,0,0); 
		$pdf->Cell(20,6,$fmerit2,1,0,"C");
		}
		else{
		    $pdf->SetTextColor(0,0,0);
		$pdf->Cell(20,6,$fmerit2,1,0,"C");
		}

		$pdf->SetTextColor(0,0,0);
		$pdf->Cell(50,6,"Merit Position in Class",1);
		
	if ($failno!="0"){
		   $pdf->SetTextColor(255,0,0); 
		$pdf->Cell(20,6,$fmerit3,1,0,"C");
		}
		else{
		    $pdf->SetTextColor(0,0,0);
		$pdf->Cell(20,6,$fmerit3,1,0,"C");
		}
		

		$pdf->SetTextColor(0,0,0);
		$pdf->Cell(50,6,"Total Fail Subject",1,0,"C");
		if ($failno!="0"){
		   $pdf->SetTextColor(255,0,0); 
		  $pdf->Cell(20,6,$failno,1,0,"C"); 
		}
		else{
		    $pdf->SetTextColor(0,0,0);
		    $pdf->Cell(20,6,"-",1,0,"C");
		}
		$pdf->SetTextColor(0,0,0);
		

$pdf->Ln();
$pdf->SetFont('Arial','',8);
$gtstotal1123 ="select * from borno_school_9_10_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term AND borno_school_stud_group='$group'";
	                $qgtstotal1123=$mysqli->query($gtstotal1123);
					$totalstudent=mysqli_num_rows($qgtstotal1123); 
					
$gtsattend ="select * from borno_school_attendence where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term AND borno_school_roll='$gtstotal111'";
	                $qggtsattend=$mysqli->query($gtsattend);
					$stgqqggtsattend=$qggtsattend->fetch_assoc();
					$presence=$stgqqggtsattend['borno_school_presence'];
					$absence=$stgqqggtsattend['borno_school_absence'];						
$pdf->Cell(25,5,"Total Students",1);
$pdf->Cell(15,5,$totalstudent,1,0,"C");
$pdf->Cell(25,5,"Schooling Day",1);
$pdf->Cell(10,5,$schoolingday,1);
$pdf->Cell(20,5,"Presence",1);
$pdf->Cell(10,5,$presence,1);
$pdf->Cell(20,5,"Absence",1);
$pdf->Cell(10,5,$absence,1);
$pdf->Cell(5,5,'',0);
$pdf->Cell(90,5,"Bahaviour",1,0,"C");
$pdf->Ln();	
$pdf->Cell(135,5,"Co-Educational Activities",1,0,"C");
$pdf->Cell(5,5,'',0);
$pdf->Cell(15,5,"Excellent",1);
$pdf->Cell(5,5,'',1);
$pdf->Cell(15,5,"Very Good",1);
$pdf->Cell(5,5,'',1);
$pdf->Cell(10,5,"Good",1);
$pdf->Cell(5,5,'',1);
$pdf->Cell(30,5,"Need To Improve",1);
$pdf->Cell(5,5,'',1);
$pdf->Ln();	
$pdf->Cell(35,5,"Cultural Activities",1);
$pdf->Cell(5,5,'',1);
$pdf->Cell(10,5,"BNCC",1);
$pdf->Cell(5,5,'',1);
$pdf->Cell(15,5,"Debate",1);
$pdf->Cell(5,5,'',1);
$pdf->Cell(15,5,"Scout",1);
$pdf->Cell(5,5,'',1);
$pdf->Cell(15,5,"Sports",1);
$pdf->Cell(5,5,'',1);
$pdf->Cell(15,5,"Others",1);
$pdf->Cell(5,5,'',1);
$pdf->Ln();	
if($schId==78 or $schId==81)
{
$pdf->Cell(200,1,'',0,5,"C"); 
$gtsattend1 ="select * from borno_school_assesment where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term AND borno_school_roll='$gtstotal111'";
	                $qggtsattend1=$mysqli->query($gtsattend1);
					$stgqqggtsattend1=$qggtsattend1->fetch_assoc();
					$regulation=$stgqqggtsattend1['regulation'];
					$patritism=$stgqqggtsattend1['patritism'];
					$honesty=$stgqqggtsattend1['honesty'];
					$leadership=$stgqqggtsattend1['leadership'];		
					$discipline=$stgqqggtsattend1['discipline'];	
					$cooperation=$stgqqggtsattend1['cooperation'];	
					$participation=$stgqqggtsattend1['participation'];	
					$sympathy=$stgqqggtsattend1['sympathy'];	
					$awareness=$stgqqggtsattend1['awareness'];	
					$punctuality=$stgqqggtsattend1['punctuality'];	
					$total_mark=$stgqqggtsattend1['total_mark'];	
					$remarks=$stgqqggtsattend1['remarks'];	
					
$pdf->Cell(24,5,"Regulation",1,0,"C");	
$pdf->Cell(24,5,"Patritism",1,0,"C");
$pdf->Cell(24,5,"Honesty",1,0,"C");
$pdf->Cell(24,5,"leadership",1,0,"C");
$pdf->Cell(24,5,"Discipline",1,0,"C");
$pdf->Cell(24,5,"Cooperation",1,0,"C");
$pdf->Cell(25,5,"Active Participation",1,0,"C");
$pdf->Cell(24,5,"Sympathy",1,0,"C");
$pdf->Cell(24,5,"Awareness",1,0,"C");
$pdf->Cell(24,5,"Punctuality",1,0,"C");
$pdf->Cell(10,5,"Total",1,0,"C");		
$pdf->Cell(29,5,"Remarks",1,0,"C");	
$pdf->Ln();	
$pdf->Cell(24,5,$regulation,1,0,"C");
$pdf->Cell(24,5,$patritism,1,0,"C");
$pdf->Cell(24,5,$honesty,1,0,"C");
$pdf->Cell(24,5,$leadership,1,0,"C");
$pdf->Cell(24,5,$discipline,1,0,"C");
$pdf->Cell(24,5,$cooperation,1,0,"C");
$pdf->Cell(25,5,$participation,1,0,"C");
$pdf->Cell(24,5,$sympathy,1,0,"C");
$pdf->Cell(24,5,$awareness,1,0,"C");
$pdf->Cell(24,5,$punctuality,1,0,"C");
$pdf->Cell(10,5,$total_mark,1,0,"C");
$pdf->Cell(29,5,$remarks,1,0,"C");
}

	
$pdf->Ln();	


$pdf->AddPage('L');
}

}
if($studClass==3 OR $studClass==4 OR $studClass==5)
{
$result23 ="select borno_school_roll,borno_student_info_id from borno_class6_8_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_roll between $rollf AND $rollt  group by borno_school_roll,borno_student_info_id asc";
$sl=0;
					$qgresult23=$mysqli->query($result23);
					while($row23=$qgresult23->fetch_assoc()){ $sl++;

					$gtstotal111=$row23['borno_school_roll'];
                    $gtstdid=$row23['borno_student_info_id'];



//----------------- School Name ------------------------------------------------------------------
$pdf->SetFont('Arial','',20);
$pdf->Cell(220,2,$fnschname,0,0,"C");
$pdf->SetFont('Arial','',7);  
$pdf->Cell(60,4,"Grading System",1,0,"C");

$pdf->Ln();


$pdf->Cell(220,1,'',0,0,"C");

$pdf->SetFont('Arial','',7);  
$pdf->Cell(28,4,"Range",1,0,"C");
$pdf->Cell(12,4,"Grade",1,0,"C");
$pdf->Cell(20,4,"Grade Point",1,0,"C");
$pdf->Ln();

$pdf->SetFont('Arial','',16); 
if( $schId==81)
{ $pdf->Cell(220,2,"Tejgaon, Dhaka-1215",0,0,"C");
    
}
else{
$pdf->Cell(220,2,"Branch : $fnsbranch",0,0,"C");
}



$pdf->SetFont('Arial','',7); 
$result1 ="select * from borno_grading_chart where borno_school_session='$stsess' AND borno_school_id='$schId' AND borno_school_class_id=$studClass";

					$qresult1=$mysqli->query($result1);
					$row1=$qresult1->fetch_assoc();
	
		$stnn1=$row1['marks_from1'];
		$stnn2=$row1['marks_to1'];
		$stnn3=$row1['letter_grade1'];
		$stnn4=$row1['grade_point1'];
		
		$stnm1=$row1['marks_from2'];
		$stnm2=$row1['marks_to2'];
		$stnm3=$row1['letter_grade2'];
		$stnm4=$row1['grade_point2'];
			
		$stnm11=$row1['marks_from3'];
		$stnm21=$row1['marks_to3'];
		$stnm31=$row1['letter_grade3'];
		$stnm41=$row1['grade_point3'];	
		
		$stnm111=$row1['marks_from4'];
		$stnm211=$row1['marks_to4'];
		$stnm311=$row1['letter_grade4'];
		$stnm411=$row1['grade_point4'];		
		
		$stnm1111=$row1['marks_from5'];
		$stnm2111=$row1['marks_to5'];
		$stnm3111=$row1['letter_grade5'];
		$stnm4111=$row1['grade_point5'];
		
		$stnm1112=$row1['marks_from6'];
		$stnm2112=$row1['marks_to6'];
		$stnm3112=$row1['letter_grade6'];
		$stnm4112=$row1['grade_point6'];
		
		$stnm11121=$row1['marks_from7'];
		$stnm21121=$row1['marks_to7'];
		$stnm31121=$row1['letter_grade7'];
		$stnm41121=$row1['grade_point7'];				
		
		$pdf->Cell(14,4,$stnn1,1,0,"C");
		$pdf->Cell(14,4,$stnn2,1,0,"C");
		$pdf->Cell(12,4,$stnn3,1,0,"C");
		$pdf->Cell(20,4,$stnn4,1,0,"C");


	$pdf->Ln();
 
$pdf->Cell(220,1,'',0,0,"C"); 

//----------------- Branch Name ------------------------------------------------------------------


		$pdf->SetFont('Arial','',7);  
		$pdf->Cell(14,4,$stnm1,1,0,"C");
		$pdf->Cell(14,4,$stnm2,1,0,"C");
		$pdf->Cell(12,4,$stnm3,1,0,"C");
		$pdf->Cell(20,4,$stnm4,1,0,"C");
	
	$pdf->Ln();

	$pdf->SetFont('Arial','U',14);  
$pdf->Cell(220,2,'Progress Report',0,0,"C"); 

		$pdf->SetFont('Arial','',7);  
		$pdf->Cell(14,4,$stnm11,1,0,"C");
		$pdf->Cell(14,4,$stnm21,1,0,"C");
		$pdf->Cell(12,4,$stnm31,1,0,"C");
		$pdf->Cell(20,4,$stnm41,1,0,"C");

	$pdf->Ln();
	
	
	
$gtstname ="select * from borno_student_info where borno_student_info_id='$gtstdid'";

$pdf->SetFont('Arial','U',12);
					$qgtstname=$mysqli->query($gtstname);
					$stgtstname=$qgtstname->fetch_assoc();
$fstname=$stgtstname['borno_school_student_name'];
$pdf->Cell(220,5,"Progress Report of : $fstname",0,0,"L");

		$pdf->SetFont('Arial','',7);  
		$pdf->Cell(14,4,$stnm111,1,0,"C");
		$pdf->Cell(14,4,$stnm211,1,0,"C");
		$pdf->Cell(12,4,$stnm311,1,0,"C");
		$pdf->Cell(20,4,$stnm411,1,0,"C");
	

$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->Cell(220,5,'',0,0,"L");


		$pdf->SetFont('Arial','',7);  
		$pdf->Cell(14,4,$stnm1111,1,0,"C");
		$pdf->Cell(14,4,$stnm2111,1,0,"C");
		$pdf->Cell(12,4,$stnm3111,1,0,"C");
		$pdf->Cell(20,4,$stnm4111,1,0,"C");
	


$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->Cell(15,5,"Class :",0,0,"L");
$pdf->SetFont('Arial','I',10);
$pdf->Cell(65,5,$fnsclass,0,0,"L");
$pdf->SetFont('Arial','',10);
$pdf->Cell(21,5,"Roll :",0,0,"L");
$pdf->SetFont('Arial','I',10);
$pdf->Cell(49,5,$gtstotal111,0,0,"L");
$pdf->SetFont('Arial','',10);
$pdf->Cell(20,5,"Shift :",0,0,"L");
$pdf->SetFont('Arial','I',10);
$pdf->Cell(50,5,$fnsshift,0,0,"L");



		$pdf->SetFont('Arial','',7);  
				
		
		$pdf->Cell(14,4,$stnm1112,1,0,"C");
		$pdf->Cell(14,4,$stnm2112,1,0,"C");
		$pdf->Cell(12,4,$stnm3112,1,0,"C");
		$pdf->Cell(20,4,$stnm4112,1,0,"C");
		


$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->Cell(15,5,"Section :",0,0,"L");
$pdf->SetFont('Arial','I',10);
$pdf->Cell(65,5,$fnssection,0,0,"L");
$pdf->SetFont('Arial','',10);
$pdf->Cell(21,5,"Exam Type :",0,0,"L");
$pdf->SetFont('Arial','I',10);
$pdf->Cell(49,5,$fnsterm,0,0,"L");
$pdf->SetFont('Arial','',10);
$pdf->Cell(20,5,"Exam Year :",0,0,"L");
$pdf->SetFont('Arial','I',10);
$pdf->Cell(50,5,$stsess,0,0,"L");


		$pdf->SetFont('Arial','',7);  
		$pdf->Cell(14,4,$stnm11121,1,0,"C");
		$pdf->Cell(14,4,$stnm21121,1,0,"C");
		$pdf->Cell(12,4,$stnm31121,1,0,"C");
		$pdf->Cell(20,4,$stnm41121,1,0,"C");
	

$pdf->Cell(220,5,'',0,0,"L");
$pdf->Ln();

$pdf->SetFont('Arial','',10);
$numbertype ="select * from borno_result_number_type where borno_school_session='$stsess' AND borno_school_id='$schId' AND borno_school_class_id='$studClass'";
					$qnumbertype=$mysqli->query($numbertype);
					$sqnumbertype=$qnumbertype->fetch_assoc();
		$type1=$sqnumbertype['borno_school_number_type1'];
		$type2=$sqnumbertype['borno_school_number_type2'];
		$type3=$sqnumbertype['borno_school_number_type3'];
		$type4=$sqnumbertype['borno_school_number_type4'];
		$type5=$sqnumbertype['borno_school_number_type5'];
		$type6=$sqnumbertype['borno_school_number_type6'];



		$pdf->Cell(60,5,"Subject Name",1);
		$pdf->Cell(20,5,"Full Mark",1,0,"C");
		
		
		$pdf->Cell(20,5,$type1,1,0,"C");
		$pdf->Cell(20,5,$type2,1,0,"C");
		$pdf->Cell(20,5,$type3,1,0,"C");
		$pdf->Cell(20,5,$type4,1,0,"C");
		$pdf->Cell(20,5,$type5,1,0,"C");
		$pdf->Cell(20,5,$type6,1,0,"C");
		$pdf->Cell(20,5,Total,1,0,"C");
		$pdf->Cell(30,5,"Highest Mark",1,0,"C");
		$pdf->Cell(15,5,GP,1,0,"C");
		$pdf->Cell(15,5,LG,1,0,"C");

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
		
if($stNbangla!=""){
    
 $gtstotalban1 ="select * from borno_class6_8_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight=18";
					$qgtstotalban1=$mysqli->query($gtstotalban1);
					$sqgtstotalban1=$qgtstotalban1->fetch_assoc();    
    				$stphoneban=$sqgtstotalban1['res_gpa'];
					$stgpban=$sqgtstotalban1['res_lg'];

 $gtstotalban1h ="select * from borno_height_mark_class6_8 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND subject_id_six_eight=18";
					$qgtstotalban1h=$mysqli->query($gtstotalban1h);
					$sqgtstotalban1h=$qgtstotalban1h->fetch_assoc();    
    				$stNamebanh=$sqgtstotalban1h['getmaxmark'];					

$gtsubjectb ="select * from borno_subject_six_eight where subject_id_six_eight=$stNbangla";
					$qgtsubjectb=$mysqli->query($gtsubjectb);
					$stgtsubjectb=$qgtsubjectb->fetch_assoc();
					$fsstgtsubjectb=$stgtsubjectb['six_eight_subject_name'];

		
		$pdf->Cell(60,5,$fsstgtsubjectb,1);
		
 $gtsubject1b ="select * from borno_set_subject_six_eight where borno_school_class_id=$studClass AND borno_school_id=$schId AND borno_school_session=$stsess AND subject_id_six_eight=$stNbangla";
					$qgtsubject1b=$mysqli->query($gtsubject1b);
					$stgtsubject1b=$qgtsubject1b->fetch_assoc();
 $fsstgtsubject1b=$stgtsubject1b['sub_six_eight_fullmark'];
        $pdf->Cell(20,5,$fsstgtsubject1b,1,0,"C");

$subjectdetailsb ="select * from borno_result_six_eight_subject_details where borno_school_session='$stsess' AND borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_result_term_id='$term' AND subject_id_six_eight='$stNbangla'";
					$qsubjectdetailsb=$mysqli->query($subjectdetailsb);
					$sqsubjectdetailsb=$qsubjectdetailsb->fetch_assoc();
					
		$subtypeb1=$sqsubjectdetailsb['number_type1_marks'];
		$subtypeb2=$sqsubjectdetailsb['number_type2_marks'];
		$subtypeb3=$sqsubjectdetailsb['number_type3_marks'];
		$subtypeb4=$sqsubjectdetailsb['number_type4_marks'];
		$subtypeb5=$sqsubjectdetailsb['number_type5_marks'];
		$subtypeb6=$sqsubjectdetailsb['number_type6_marks'];	

        if($subtypeb1!=0)
		{		
		 $pdf->Cell(20,5,$stNbangla1,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		if($subtypeb2!=0)
		{		
		$pdf->Cell(20,5,$stNbangla2,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		if($subtypeb3!=0)
		{		
	   $pdf->Cell(20,5,$stNbangla3,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		if($subtypeb4!=0)
		{		
		$pdf->Cell(20,5,$stNbangla4,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		if($subtypeb5!=0)
		{		
		$pdf->Cell(20,5,$stNbangla5,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		if($subtypeb6!=0)
		{		
		$pdf->Cell(20,5,$stNbangla6,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		
   
        $pdf->Cell(20,5,$stNbanglatotal,1,0,"C");	
		$pdf->Cell(30,5,$stNamebanh,1,0,"C");	
		$pdf->Cell(15,5,$stphoneban,1,0,"C");
		$pdf->Cell(15,5,$stgpban,1,0,"C");	

$pdf->Ln();    
}

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
		
if($stNenglish!=""){
    
 $gtstotaleng1 ="select * from borno_class6_8_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight=19";
					$qgtstotaleng1=$mysqli->query($gtstotaleng1);
					$sqgtstotaleng1=$qgtstotaleng1->fetch_assoc();    
    				$stphoneeng=$sqgtstotaleng1['res_gpa'];
					$stgpeng=$sqgtstotaleng1['res_lg'];

 $gtstotaleng1h ="select * from borno_height_mark_class6_8 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND subject_id_six_eight=19";
					$qgtstotaleng1h=$mysqli->query($gtstotaleng1h);
					$sqgtstotaleng1h=$qgtstotaleng1h->fetch_assoc();    
    				$stNameengh=$sqgtstotaleng1h['getmaxmark'];					

$gtsubjecte ="select * from borno_subject_six_eight where subject_id_six_eight=$stNenglish";
					$qgtsubjecte=$mysqli->query($gtsubjecte);
					$stgtsubjecte=$qgtsubjecte->fetch_assoc();
					$fsstgtsubjecte=$stgtsubjecte['six_eight_subject_name'];

		
		$pdf->Cell(60,5,$fsstgtsubjecte,1);
		
 $gtsubject1e ="select * from borno_set_subject_six_eight where borno_school_class_id=$studClass AND borno_school_id=$schId AND borno_school_session=$stsess AND subject_id_six_eight=$stNenglish";
					$qgtsubject1e=$mysqli->query($gtsubject1e);
					$stgtsubject1e=$qgtsubject1e->fetch_assoc();
 $fsstgtsubject1e=$stgtsubject1e['sub_six_eight_fullmark'];
        $pdf->Cell(20,5,$fsstgtsubject1e,1,0,"C");

$subjectdetailse ="select * from borno_result_six_eight_subject_details where borno_school_session='$stsess' AND borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_result_term_id='$term' AND subject_id_six_eight='$stNenglish'";
					$qsubjectdetailse=$mysqli->query($subjectdetailse);
					$sqsubjectdetailse=$qsubjectdetailse->fetch_assoc();
					
		$subtypee1=$sqsubjectdetailse['number_type1_marks'];
		$subtypee2=$sqsubjectdetailse['number_type2_marks'];
		$subtypee3=$sqsubjectdetailse['number_type3_marks'];
		$subtypee4=$sqsubjectdetailse['number_type4_marks'];
		$subtypee5=$sqsubjectdetailse['number_type5_marks'];
		$subtypee6=$sqsubjectdetailse['number_type6_marks'];	
		
		if($subtypee1!=0)
		{		
		$pdf->Cell(20,5,$stNenglish1,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		if($subtypee2!=0)
		{		
		$pdf->Cell(20,5,$stNenglish2,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		if($subtypee3!=0)
		{		
		$pdf->Cell(20,5,$stNenglish3,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		if($subtypee4!=0)
		{		
		$pdf->Cell(20,5,$stNenglish4,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		if($subtypee5!=0)
		{		
		$pdf->Cell(20,5,$stNenglish5,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		if($subtypee6!=0)
		{		
		$pdf->Cell(20,5,$stNenglish6,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		} 		

        $pdf->Cell(20,5,$stNenglishtotal,1,0,"C");	
		$pdf->Cell(30,5,$stNameengh,1,0,"C");	
		$pdf->Cell(15,5,$stphoneeng,1,0,"C");
		$pdf->Cell(15,5,$stgpeng,1,0,"C");	

	$pdf->Ln();    
}

 $result = "select * from borno_class6_8_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight!=18 AND subject_id_six_eight!=19 order by subject_id_six_eight asc";
$sl=0;

					$qresult=$mysqli->query($result);
					while($row=$qresult->fetch_assoc()) { $sl++;

	//foreach($row as $column)

		$stroll=$s1;
		$stN=$row['subject_id_six_eight'];
		
$getsubuncoun="select * from borno_result_six_eight_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND subject_id_six_eight='$stN' AND uncountable=1";
$qgetsubjcoun=$mysqli->query($getsubuncoun);
$shgetsubcount=$qgetsubjcoun->fetch_assoc();		
		$uncountable=$shgetsubcount['uncountable'];
		
		if($uncountable!=""){goto lastline;}

		$stN1=$row['temp_res_number_type1'];
		$stN2=$row['temp_res_number_type2'];
		$stN3=$row['temp_res_number_type3'];
		$stN4=$row['temp_res_number_type4'];
		$stN5=$row['temp_res_number_type5'];
		$stN6=$row['temp_res_number_type6'];

if($stN==1 OR $stN==2 OR $stN==3 OR $stN==4)
{
$gtstotal ="select * from borno_class6_8_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight=$stN";
					$qgtstotal=$mysqli->query($gtstotal);
					$sqgtstotal=$qgtstotal->fetch_assoc();	
					$stName=$sqgtstotal['total_mark'];
					
if($stN==1 OR $stN==2)
{					
$gtstotal1 ="select * from borno_class6_8_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND pare=1";
					$qgtstotal1=$mysqli->query($gtstotal1);
					$sqgtstotal1=$qgtstotal1->fetch_assoc();
					$stName1=$sqgtstotal1['res_total_conv'];
					$stphone=$sqgtstotal1['res_gpa'];
					$stgp=$sqgtstotal1['res_lg'];
}
elseif($stN==3 OR $stN==4)
{					
$gtstotal1 ="select * from borno_class6_8_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND pare=2";
					$qgtstotal1=$mysqli->query($gtstotal1);
					$sqgtstotal1=$qgtstotal1->fetch_assoc();
					$stName1=$sqgtstotal1['res_total_conv'];
					$stphone=$sqgtstotal1['res_gpa'];
					$stgp=$sqgtstotal1['res_lg'];
}
}
else
{
$gtstotal ="select * from borno_class6_8_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight=$stN";
					$qgtstotal=$mysqli->query($gtstotal);
					$sqgtstotal=$qgtstotal->fetch_assoc();
					$stName=$sqgtstotal['res_total_conv'];
					$stphone=$sqgtstotal['res_gpa'];
					$stgp=$sqgtstotal['res_lg'];	
}							
		
		
	
		$gtsubject ="select * from borno_subject_six_eight where subject_id_six_eight=$stN";
					$qgtsubject=$mysqli->query($gtsubject);
					$stgtsubject=$qgtsubject->fetch_assoc();
					$fsstgtsubject=$stgtsubject['six_eight_subject_name'];

		
		$pdf->Cell(60,5,$fsstgtsubject,1);
		
$gtsubject1 ="select * from borno_set_subject_six_eight where borno_school_class_id=$studClass AND borno_school_id=$schId AND borno_school_session=$stsess AND subject_id_six_eight=$stN";
					$qgtsubject1=$mysqli->query($gtsubject1);
					$stgtsubject1=$qgtsubject1->fetch_assoc();
$fsstgtsubject1=$stgtsubject1['sub_six_eight_fullmark'];
	
$subjectdetails ="select * from borno_result_six_eight_subject_details where borno_school_session='$stsess' AND borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_result_term_id='$term' AND subject_id_six_eight='$stN'";
					$qsubjectdetails=$mysqli->query($subjectdetails);
					$sqsubjectdetails=$qsubjectdetails->fetch_assoc();
					
		$subtype1=$sqsubjectdetails['number_type1_marks'];
		$subtype2=$sqsubjectdetails['number_type2_marks'];
		$subtype3=$sqsubjectdetails['number_type3_marks'];
		$subtype4=$sqsubjectdetails['number_type4_marks'];
		$subtype5=$sqsubjectdetails['number_type5_marks'];
		$subtype6=$sqsubjectdetails['number_type6_marks'];					
		
		
		$pdf->Cell(20,5,$fsstgtsubject1,1,0,"C");
		if($subtype1!=0)
		{		
		$pdf->Cell(20,5,$stN1,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		if($subtype2!=0)
		{		
		$pdf->Cell(20,5,$stN2,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		if($subtype3!=0)
		{		
		$pdf->Cell(20,5,$stN3,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		if($subtype4!=0)
		{		
		$pdf->Cell(20,5,$stN4,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		if($subtype5!=0)
		{		
		$pdf->Cell(20,5,$stN5,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		if($subtype6!=0)
		{		
		$pdf->Cell(20,5,$stN6,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		
		
		
		
		
		
		
$result22 = "select * from borno_height_mark_class6_8 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND subject_id_six_eight=$stN";
					$qresult22=$mysqli->query($result22);
					$row22=$qresult22->fetch_assoc();
				$fssthigh=$row22['getmaxmark'];	

        
		
		if($stN==1)
		{
		$pdf->Cell(10,5,$stName,1,0,"C");	
		$pdf->Cell(10,10,$stName1,1,0,"C");	
		$pdf->Cell(30,5,$fssthigh,1,0,"C");	
		$pdf->Cell(15,10,$stphone,1,0,"C");
		$pdf->Cell(15,10,$stgp,1,0,"C");
		$pdf->Cell(15,5,'',2,0,"C");
		}
		elseif($stN==2)
		{
		$pdf->Cell(10,5,$stName,1,0,"C");	
		$pdf->Cell(10,5,'',0,0,"C");	
		$pdf->Cell(30,5,$fssthigh,1,0,"C");	
		$pdf->Cell(15,5,'',0,0,"C");
		$pdf->Cell(15,5,'',0,0,"C");
		}
		elseif($stN==3)
		{
		$pdf->Cell(10,5,$stName,1,0,"C");	
		$pdf->Cell(10,10,$stName1,1,0,"C");	
		$pdf->Cell(30,5,$fssthigh,1,0,"C");	
		$pdf->Cell(15,10,$stphone,1,0,"C");
		$pdf->Cell(15,10,$stgp,1,0,"C");
		$pdf->Cell(15,5,'',2,0,"C");
		}
		elseif($stN==4)
		{
		$pdf->Cell(10,5,$stName,1,0,"C");	
		$pdf->Cell(10,5,'',0,0,"C");	
		$pdf->Cell(30,5,$fssthigh,1,0,"C");	
		$pdf->Cell(15,5,'',0,0,"C");
		$pdf->Cell(15,5,'',0,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,$stName,1,0,"C");	
		$pdf->Cell(30,5,$fssthigh,1,0,"C");	
		$pdf->Cell(15,5,$stphone,1,0,"C");
		$pdf->Cell(15,5,$stgp,1,0,"C");
		}
	$pdf->Ln();
lastline:					    
					}


$pdf->SetFont('Arial','',12);

	


		$pdf->Cell(200,6,"GrandTotal / GPA",1);
$gtstotal ="select * from borno_school_6_8_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term AND borno_school_roll=$gtstotal111";
					$qgtstotal=$mysqli->query($gtstotal);
					$stggtstotal=$qgtstotal->fetch_assoc();
$pdf->SetFont('Arial','',12);
$fstotal=$stggtstotal['grandtotal'];
$fstotal1=$stggtstotal['gpa'];



		$pdf->Cell(20,6,$fstotal,1,0,"C");
		$pdf->Cell(30,6,'',1);
		$pdf->Cell(30,6,$fstotal1,1,0,"C");
		

$pdf->Ln();
$pdf->SetFont('Arial','',12);
$pdf->Cell(200,1,'',0,5,"C"); 
$pdf->Ln();
$pdf->SetFont('Arial','',10);
 $resultun = "select * from borno_class6_8_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND uncountable=1 order by subject_id_six_eight asc";
$s11l=0;

					$qresultun=$mysqli->query($resultun);
					while($rowun=$qresultun->fetch_assoc()) { $s11l++;
		$stNun=$rowun['subject_id_six_eight'];			
        $stNun1=$rowun['temp_res_number_type1'];
		$stNun2=$rowun['res_number_type2'];
		$stNun3=$rowun['res_number_type3'];
		$stNun4=$rowun['res_number_type4'];
		$stNun5=$rowun['res_number_type5'];
		$stNun6=$rowun['res_number_type6'];
        $stNuncon1=$rowun['temp_res_number_type1_conv'];
		$stNuncon2=$rowun['res_number_type2_conv'];
		$stNuncon3=$rowun['res_number_type3_conv'];		
        $sttotal=$rowun['res_total_conv'];
        $stgpa=$rowun['res_gpa'];
        $stlg=$rowun['res_lg'];
        $convertun=$stNuncon1+$stNuncon2+$stNuncon3;
        
$result22un = "select * from borno_height_mark_class6_8 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND subject_id_six_eight=$stNun";
					$qresult22un=$mysqli->query($result22un);
					$row22un=$qresult22un->fetch_assoc();
				$fssthighun=$row22un['getmaxmark'];	        

		$gtsubjectun ="select * from borno_subject_six_eight where subject_id_six_eight=$stNun";
					$qgtsubjectun=$mysqli->query($gtsubjectun);
					$stgtsubjectun=$qgtsubjectun->fetch_assoc();
					$fsstgtsubjectun=$stgtsubjectun['six_eight_subject_name'];

$gtsubject1un ="select * from borno_set_subject_six_eight where borno_school_class_id=$studClass AND borno_school_id=$schId AND borno_school_session=$stsess AND subject_id_six_eight=$stNun";
					$qgtsubject1un=$mysqli->query($gtsubject1un);
					$stgtsubject1un=$qgtsubject1un->fetch_assoc();
$fsstgtsubject1un=$stgtsubject1un['sub_six_eight_fullmark'];
	
$subjectdetailsun ="select * from borno_result_six_eight_subject_details where borno_school_session='$stsess' AND borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_result_term_id='$term' AND subject_id_six_eight='$stNun'";
					$qsubjectdetailsun=$mysqli->query($subjectdetailsun);
					$sqsubjectdetailsun=$qsubjectdetailsun->fetch_assoc();
					
		$subtypeun1=$sqsubjectdetailsun['number_type1_marks'];
		$subtypeun2=$sqsubjectdetailsun['number_type2_marks'];
		$subtypeun3=$sqsubjectdetailsun['number_type3_marks'];
		$subtypeun4=$sqsubjectdetailsun['number_type4_marks'];
		$subtypeun5=$sqsubjectdetailsun['number_type5_marks'];
		$subtypeun6=$sqsubjectdetailsun['number_type6_marks'];					
		

		$pdf->Cell(60,5,$fsstgtsubjectun,1);
		$pdf->Cell(20,5,$fsstgtsubject1un,1,0,"C");
		if($subtypeun1!=0)
		{		
		$pdf->Cell(20,5,$stNun1,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		if($subtypeun2!=0)
		{		
		$pdf->Cell(20,5,$stNun2,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		if($subtypeun3!=0)
		{		
		$pdf->Cell(20,5,$stNun3,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		
	//	$pdf->Cell(15,5,$convertun,1,0,"C");
		
		if($subtypeun4!=0)
		{		
		$pdf->Cell(20,5,$stNun4,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		if($subtypeun5!=0)
		{		
		$pdf->Cell(20,5,$stNun5,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		if($subtypeun6!=0)
		{		
		$pdf->Cell(20,5,$stNun6,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		
        $pdf->Cell(20,5,$sttotal,1,0,"C");	
		$pdf->Cell(30,5,$fssthighun,1,0,"C");	
		$pdf->Cell(15,5,$stgpa,1,0,"C");
		$pdf->Cell(15,5,$stlg,1,0,"C");
 $pdf->Ln();       
}
	
$pdf->Cell(200,1,'',0,5,"C"); 
$pdf->Ln();

		
$gtstotal1 ="select * from borno_school_6_8_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term AND borno_school_roll=$gtstotal111";
					$qgtstotal1=$mysqli->query($gtstotal1);
					$stggtstotal1=$qgtstotal1->fetch_assoc();
$pdf->SetFont('Arial','',12);
$fmerit1=$stggtstotal1['merit_section'];
$fmerit2=$stggtstotal1['merit_shift'];
$fmerit3=$stggtstotal1['merit_class'];
$failno=$stggtstotal1['failno'];


		$pdf->Cell(50,6,"Merit Position in Section",1);
	if ($failno!="0"){
		   $pdf->SetTextColor(255,0,0); 
		  $pdf->Cell(20,6,$fmerit1,1,0,"C");
		}
		else{
		    $pdf->SetTextColor(0,0,0);
		   $pdf->Cell(20,6,$fmerit1,1,0,"C");
		}
		
		$pdf->SetTextColor(0,0,0);
		$pdf->Cell(50,6,"Merit Position in Shift",1);
	if ($failno!="0"){
		   $pdf->SetTextColor(255,0,0); 
		$pdf->Cell(20,6,$fmerit2,1,0,"C");
		}
		else{
		    $pdf->SetTextColor(0,0,0);
		$pdf->Cell(20,6,$fmerit2,1,0,"C");
		}

		$pdf->SetTextColor(0,0,0);
		$pdf->Cell(50,6,"Merit Position in Class",1);
		
	if ($failno!="0"){
		   $pdf->SetTextColor(255,0,0); 
		$pdf->Cell(20,6,$fmerit3,1,0,"C");
		}
		else{
		    $pdf->SetTextColor(0,0,0);
		$pdf->Cell(20,6,$fmerit3,1,0,"C");
		}
		

		$pdf->SetTextColor(0,0,0);
		$pdf->Cell(50,6,"Total Fail Subject",1,0,"C");
		if ($failno!="0"){
		   $pdf->SetTextColor(255,0,0); 
		  $pdf->Cell(20,6,$failno,1,0,"C"); 
		}
		else{
		    $pdf->SetTextColor(0,0,0);
		    $pdf->Cell(20,6,"-",1,0,"C");
		}
		$pdf->SetTextColor(0,0,0);
		

$pdf->Ln();
$pdf->Cell(200,1,'',0,5,"C"); 
$pdf->Ln();
$pdf->SetFont('Arial','',8);
$gtstotal1123 ="select * from borno_school_6_8_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term";
	                $qgtstotal1123=$mysqli->query($gtstotal1123);
					$totalstudent=mysqli_num_rows($qgtstotal1123); 
					
$gtsattend ="select * from borno_school_attendence where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term AND borno_school_roll='$gtstotal111'";
	                $qggtsattend=$mysqli->query($gtsattend);
					$stgqqggtsattend=$qggtsattend->fetch_assoc();
					$presence=$stgqqggtsattend['borno_school_presence'];
					$absence=$stgqqggtsattend['borno_school_absence'];					
$pdf->Cell(30,5,"Total Students",1);
$pdf->Cell(10,5,$totalstudent,1,0,"C");
$pdf->Cell(25,5,"Schooling Day",1);
$pdf->Cell(10,5,$schoolingday,1);
$pdf->Cell(20,5,"Presence",1);
$pdf->Cell(10,5,$presence,1);
$pdf->Cell(20,5,"Absence",1);
$pdf->Cell(10,5,$absence,1);
$pdf->Cell(5,5,'',0);
$pdf->Cell(90,5,"Bahaviour",1,0,"C");
$pdf->Ln();	
$pdf->Cell(135,5,"Co-Educational Activities",1,0,"C");

$pdf->Cell(5,5,'',0);
$pdf->Cell(15,5,"Excellent",1);
$pdf->Cell(5,5,'',1);
$pdf->Cell(15,5,"Very Good",1);
$pdf->Cell(5,5,'',1);
$pdf->Cell(10,5,"Good",1);
$pdf->Cell(5,5,'',1);
$pdf->Cell(30,5,"Need To Improve",1);
$pdf->Cell(5,5,'',1);
$pdf->Ln();	
$pdf->Cell(35,5,"Cultural Activities",1);
$pdf->Cell(5,5,'',1);
$pdf->Cell(10,5,"BNCC",1);
$pdf->Cell(5,5,'',1);
$pdf->Cell(15,5,"Debate",1);
$pdf->Cell(5,5,'',1);
$pdf->Cell(15,5,"Scout",1);
$pdf->Cell(5,5,'',1);
$pdf->Cell(15,5,"Sports",1);
$pdf->Cell(5,5,'',1);
$pdf->Cell(15,5,"Others",1);
$pdf->Cell(5,5,'',1);
$pdf->Ln();	
if($schId==78 or $schId==81)
{
$pdf->Cell(200,1,'',0,5,"C"); 
$gtsattend1 ="select * from borno_school_assesment where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term AND borno_school_roll='$gtstotal111'";
	                $qggtsattend1=$mysqli->query($gtsattend1);
					$stgqqggtsattend1=$qggtsattend1->fetch_assoc();
					$regulation=$stgqqggtsattend1['regulation'];
					$patritism=$stgqqggtsattend1['patritism'];
					$honesty=$stgqqggtsattend1['honesty'];
					$leadership=$stgqqggtsattend1['leadership'];		
					$discipline=$stgqqggtsattend1['discipline'];	
					$cooperation=$stgqqggtsattend1['cooperation'];	
					$participation=$stgqqggtsattend1['participation'];	
					$sympathy=$stgqqggtsattend1['sympathy'];	
					$awareness=$stgqqggtsattend1['awareness'];	
					$punctuality=$stgqqggtsattend1['punctuality'];	
					$total_mark=$stgqqggtsattend1['total_mark'];	
					$remarks=$stgqqggtsattend1['remarks'];	
					
$pdf->Cell(24,5,"Regulation",1,0,"C");	
$pdf->Cell(24,5,"Patritism",1,0,"C");
$pdf->Cell(24,5,"Honesty",1,0,"C");
$pdf->Cell(24,5,"leadership",1,0,"C");
$pdf->Cell(24,5,"Discipline",1,0,"C");
$pdf->Cell(24,5,"Cooperation",1,0,"C");
$pdf->Cell(25,5,"Active Participation",1,0,"C");
$pdf->Cell(24,5,"Sympathy",1,0,"C");
$pdf->Cell(24,5,"Awareness",1,0,"C");
$pdf->Cell(24,5,"Punctuality",1,0,"C");
$pdf->Cell(10,5,"Total",1,0,"C");		
$pdf->Cell(29,5,"Remarks",1,0,"C");	
$pdf->Ln();	
$pdf->Cell(24,5,$regulation,1,0,"C");
$pdf->Cell(24,5,$patritism,1,0,"C");
$pdf->Cell(24,5,$honesty,1,0,"C");
$pdf->Cell(24,5,$leadership,1,0,"C");
$pdf->Cell(24,5,$discipline,1,0,"C");
$pdf->Cell(24,5,$cooperation,1,0,"C");
$pdf->Cell(25,5,$participation,1,0,"C");
$pdf->Cell(24,5,$sympathy,1,0,"C");
$pdf->Cell(24,5,$awareness,1,0,"C");
$pdf->Cell(24,5,$punctuality,1,0,"C");
$pdf->Cell(10,5,$total_mark,1,0,"C");
$pdf->Cell(29,5,$remarks,1,0,"C");
}
$pdf->Ln();	






$pdf->AddPage('L');
}
}
else
{
$result23 ="select borno_school_roll,borno_student_info_id from borno_class1_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_roll between $rollf AND $rollt group by borno_school_roll,borno_student_info_id asc";
$sl=0;
					$qgresult23=$mysqli->query($result23);
					while($row23=$qgresult23->fetch_assoc()){ $sl++;

					$gtstotal111=$row23['borno_school_roll'];
                    $gtstdid=$row23['borno_student_info_id'];



//----------------- School Name ------------------------------------------------------------------
$pdf->SetFont('Arial','',20);
$pdf->Cell(220,2,$fnschname,0,0,"C");
$pdf->SetFont('Arial','',7);  
$pdf->Cell(60,4,"Grading System",1,0,"C");

$pdf->Ln();


$pdf->Cell(220,1,'',0,0,"C");

$pdf->SetFont('Arial','',7);  
$pdf->Cell(28,4,"Range",1,0,"C");
$pdf->Cell(12,4,"Grade",1,0,"C");
$pdf->Cell(20,4,"Grade Point",1,0,"C");
$pdf->Ln();

$pdf->SetFont('Arial','',16); 
if( $schId==81)
{ $pdf->Cell(220,2,"Tejgaon, Dhaka-1215",0,0,"C");
    
}
else{
$pdf->Cell(220,2,"Branch : $fnsbranch",0,0,"C");
}



$pdf->SetFont('Arial','',7); 
$result1 ="select * from borno_grading_chart where borno_school_session='$stsess' AND borno_school_id='$schId' AND borno_school_class_id=$studClass";

					$qresult1=$mysqli->query($result1);
					$row1=$qresult1->fetch_assoc();
	
		$stnn1=$row1['marks_from1'];
		$stnn2=$row1['marks_to1'];
		$stnn3=$row1['letter_grade1'];
		$stnn4=$row1['grade_point1'];
		
		$stnm1=$row1['marks_from2'];
		$stnm2=$row1['marks_to2'];
		$stnm3=$row1['letter_grade2'];
		$stnm4=$row1['grade_point2'];
			
		$stnm11=$row1['marks_from3'];
		$stnm21=$row1['marks_to3'];
		$stnm31=$row1['letter_grade3'];
		$stnm41=$row1['grade_point3'];	
		
		$stnm111=$row1['marks_from4'];
		$stnm211=$row1['marks_to4'];
		$stnm311=$row1['letter_grade4'];
		$stnm411=$row1['grade_point4'];		
		
		$stnm1111=$row1['marks_from5'];
		$stnm2111=$row1['marks_to5'];
		$stnm3111=$row1['letter_grade5'];
		$stnm4111=$row1['grade_point5'];
		
		$stnm1112=$row1['marks_from6'];
		$stnm2112=$row1['marks_to6'];
		$stnm3112=$row1['letter_grade6'];
		$stnm4112=$row1['grade_point6'];
		
		$stnm11121=$row1['marks_from7'];
		$stnm21121=$row1['marks_to7'];
		$stnm31121=$row1['letter_grade7'];
		$stnm41121=$row1['grade_point7'];				
		
		$pdf->Cell(14,4,$stnn1,1,0,"C");
		$pdf->Cell(14,4,$stnn2,1,0,"C");
		$pdf->Cell(12,4,$stnn3,1,0,"C");
		$pdf->Cell(20,4,$stnn4,1,0,"C");
	

	$pdf->Ln();
 
$pdf->Cell(220,1,'',0,0,"C"); 

//----------------- Branch Name ------------------------------------------------------------------


		$pdf->SetFont('Arial','',7);  
		$pdf->Cell(14,4,$stnm1,1,0,"C");
		$pdf->Cell(14,4,$stnm2,1,0,"C");
		$pdf->Cell(12,4,$stnm3,1,0,"C");
		$pdf->Cell(20,4,$stnm4,1,0,"C");


	$pdf->Ln();

	$pdf->SetFont('Arial','U',14);  
$pdf->Cell(220,2,'Progress Report',0,0,"C"); 

		$pdf->SetFont('Arial','',7);  
		$pdf->Cell(14,4,$stnm11,1,0,"C");
		$pdf->Cell(14,4,$stnm21,1,0,"C");
		$pdf->Cell(12,4,$stnm31,1,0,"C");
		$pdf->Cell(20,4,$stnm41,1,0,"C");

	$pdf->Ln();
	
	
	
$gtstname ="select * from borno_student_info where borno_student_info_id='$gtstdid'";

$pdf->SetFont('Arial','U',12);
					$qgtstname=$mysqli->query($gtstname);
					$stgtstname=$qgtstname->fetch_assoc();
$fstname=$stgtstname['borno_school_student_name'];
$pdf->Cell(220,5,"Progress Report of : $fstname",0,0,"L");

		$pdf->SetFont('Arial','',7);  
		$pdf->Cell(14,4,$stnm111,1,0,"C");
		$pdf->Cell(14,4,$stnm211,1,0,"C");
		$pdf->Cell(12,4,$stnm311,1,0,"C");
		$pdf->Cell(20,4,$stnm411,1,0,"C");



$pdf->Ln();
$pdf->SetFont('Arial','',12);
$pdf->Cell(220,5,'',0,0,"L");



		$pdf->SetFont('Arial','',7);  
		$pdf->Cell(14,4,$stnm1111,1,0,"C");
		$pdf->Cell(14,4,$stnm2111,1,0,"C");
		$pdf->Cell(12,4,$stnm3111,1,0,"C");
		$pdf->Cell(20,4,$stnm4111,1,0,"C");



$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->Cell(15,5,"Class :",0,0,"L");
$pdf->SetFont('Arial','I',10);
$pdf->Cell(65,5,$fnsclass,0,0,"L");
$pdf->SetFont('Arial','',10);
$pdf->Cell(21,5,"Roll :",0,0,"L");
$pdf->SetFont('Arial','I',10);
$pdf->Cell(49,5,$gtstotal111,0,0,"L");
$pdf->SetFont('Arial','',10);
$pdf->Cell(20,5,"Shift :",0,0,"L");
$pdf->SetFont('Arial','I',10);
$pdf->Cell(50,5,$fnsshift,0,0,"L");



		$pdf->SetFont('Arial','',7);  
				
		
		$pdf->Cell(14,4,$stnm1112,1,0,"C");
		$pdf->Cell(14,4,$stnm2112,1,0,"C");
		$pdf->Cell(12,4,$stnm3112,1,0,"C");
		$pdf->Cell(20,4,$stnm4112,1,0,"C");



$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->Cell(15,5,"Section :",0,0,"L");
$pdf->SetFont('Arial','I',10);
$pdf->Cell(65,5,$fnssection,0,0,"L");
$pdf->SetFont('Arial','',10);
$pdf->Cell(21,5,"Exam Type :",0,0,"L");
$pdf->SetFont('Arial','I',10);
$pdf->Cell(49,5,$fnsterm,0,0,"L");
$pdf->SetFont('Arial','',10);
$pdf->Cell(20,5,"Exam Year :",0,0,"L");
$pdf->SetFont('Arial','I',10);
$pdf->Cell(50,5,$stsess,0,0,"L");


		$pdf->SetFont('Arial','',7);  
		$pdf->Cell(14,4,$stnm11121,1,0,"C");
		$pdf->Cell(14,4,$stnm21121,1,0,"C");
		$pdf->Cell(12,4,$stnm31121,1,0,"C");
		$pdf->Cell(20,4,$stnm41121,1,0,"C");


$pdf->Cell(220,5,'',0,0,"L");
$pdf->Ln();

$pdf->SetFont('Arial','',10);
$numbertype ="select * from borno_result_number_type where borno_school_session='$stsess' AND borno_school_id='$schId' AND borno_school_class_id='$studClass'";
					$qnumbertype=$mysqli->query($numbertype);
					$sqnumbertype=$qnumbertype->fetch_assoc();
		$type1=$sqnumbertype['borno_school_number_type1'];
		$type2=$sqnumbertype['borno_school_number_type2'];
		$type3=$sqnumbertype['borno_school_number_type3'];
		$type4=$sqnumbertype['borno_school_number_type4'];
		$type5=$sqnumbertype['borno_school_number_type5'];
		$type6=$sqnumbertype['borno_school_number_type6'];



		$pdf->Cell(60,5,"Subject Name",1);
		$pdf->Cell(20,5,"Full Mark",1,0,"C");
		
		
		$pdf->Cell(20,5,$type1,1,0,"C");
		$pdf->Cell(20,5,$type2,1,0,"C");
		$pdf->Cell(20,5,$type3,1,0,"C");
		$pdf->Cell(20,5,$type4,1,0,"C");
		$pdf->Cell(20,5,$type5,1,0,"C");
		$pdf->Cell(20,5,$type6,1,0,"C");
		$pdf->Cell(25,5,"Total Mark",1,0,"C");
		$pdf->Cell(25,5,"Highest Mark",1,0,"C");
		$pdf->Cell(15,5,GP,1,0,"C");
		$pdf->Cell(15,5,LG,1,0,"C");

		$pdf->Ln();	
		
		


 $result = "select * from borno_class1_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' order by borno_result_subject_id asc";
$sl=0;

					$qresult=$mysqli->query($result);
					while($row=$qresult->fetch_assoc()) { $sl++;

	//foreach($row as $column)
		
		$stroll=$s1;
		$stN=$row['borno_result_subject_id'];
		
$getsubuncoun="select * from borno_result_subject_details where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_result_subject_id='$stN' AND subject_type=1";
$qgetsubjcoun=$mysqli->query($getsubuncoun);
$shgetsubcount=$qgetsubjcoun->fetch_assoc();		
		$uncountable=$shgetsubcount['subject_type'];
		
		if($uncountable!=""){goto lastline1;}		
		
		$pare=$row['pare'];
		$stN1=$row['temp_res_number_type1'];
		$stN2=$row['temp_res_number_type2'];
		$stN3=$row['temp_res_number_type3'];
		$stN4=$row['temp_res_number_type4'];
		$stN5=$row['temp_res_number_type5'];
		$stN6=$row['temp_res_number_type6'];
		$stName=$row['totalmark'];
		
		
		
	
		$gtsubject ="select * from borno_result_subject where borno_school_class_id=$studClass AND borno_school_id=$schId AND borno_school_session=$stsess AND borno_result_subject_id=$stN";
					$qgtsubject=$mysqli->query($gtsubject);
					$stgtsubject=$qgtsubject->fetch_assoc();
					$fsstgtsubject=$stgtsubject['borno_school_subject_name'];

		
		$pdf->Cell(60,5,$fsstgtsubject,1);
		
$gtsubject1 ="select * from borno_result_subject where borno_school_class_id=$studClass AND borno_school_id=$schId AND borno_school_session=$stsess AND borno_result_subject_id=$stN";
					$qgtsubject1=$mysqli->query($gtsubject1);
					$stgtsubject1=$qgtsubject1->fetch_assoc();
$fsstgtsubject1=$stgtsubject1['borno_school_subject_fullmark'];
	
$subjectdetails ="select * from borno_result_subject_details where borno_school_session='$stsess' AND borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_result_term_id='$term' AND borno_result_subject_id='$stN'";
					$qsubjectdetails=$mysqli->query($subjectdetails);
					$sqsubjectdetails=$qsubjectdetails->fetch_assoc();
					
		$subtype1=$sqsubjectdetails['number_type1_marks'];
		$subtype2=$sqsubjectdetails['number_type2_marks'];
		$subtype3=$sqsubjectdetails['number_type3_marks'];
		$subtype4=$sqsubjectdetails['number_type4_marks'];
		$subtype5=$sqsubjectdetails['number_type5_marks'];
		$subtype6=$sqsubjectdetails['number_type6_marks'];					
		
		
		$pdf->Cell(20,5,$fsstgtsubject1,1,0,"C");
		if($subtype1!=0)
		{		
		$pdf->Cell(20,5,$stN1,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		if($subtype2!=0)
		{		
		$pdf->Cell(20,5,$stN2,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		if($subtype3!=0)
		{		
		$pdf->Cell(20,5,$stN3,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		if($subtype4!=0)
		{		
		$pdf->Cell(20,5,$stN4,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		if($subtype5!=0)
		{		
		$pdf->Cell(20,5,$stN5,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		if($subtype6!=0)
		{		
		$pdf->Cell(20,5,$stN6,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		
$result22 = "select * from borno_maxnumber_class1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_result_subject_id=$stN";
					$qresult22=$mysqli->query($result22);
					$row22=$qresult22->fetch_assoc();
					$fssthigh=$row22['getmaxmark'];	
					
		if($pare==1)
		{
		$gtsubjectid ="select * from borno_result_subject_details where borno_school_session='$stsess' AND borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_result_term_id='$term' AND pare='1' order by borno_result_subject_id asc limit 0,1";
					$qgtsubjectid=$mysqli->query($gtsubjectid);
					$stqgtsubjectid=$qgtsubjectid->fetch_assoc();
					$fsstgtsubject=$stqgtsubjectid['borno_result_subject_id'];	
		if($stN==$fsstgtsubject)
		{
			
		$gtsgpa ="select * from borno_class1_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND pare='1'";
					$qggtsgpa=$mysqli->query($gtsgpa);
					$stgqggtsgpa=$qggtsgpa->fetch_assoc();
		$stName1=$stgqggtsgpa['res_total_conv'];			
		$stphone=$stgqggtsgpa['res_gpa'];
	    $stgp=$stgqggtsgpa['res_lg'];
					
		$pdf->Cell(12,5,$stName,1,0,"C");
		$pdf->Cell(13,10,$stName1,1,0,"C");
        $pdf->Cell(25,5,$fssthigh,1,0,"C");
		$pdf->Cell(15,10,$stphone,1,0,"C");
		$pdf->Cell(15,10,$stgp,1,0,"C");
		$pdf->Cell(15,5,'',2,0,"C");
			$pdf->Ln();
		}
		elseif($stN!=$fsstgtsubject)
		{
		$pdf->Cell(12,5,$stName,1,0,"C");
		$pdf->Cell(13,5,'',0,0,"C");
        $pdf->Cell(25,5,$fssthigh,1,0,"C");
		$pdf->Cell(15,5,'',0,0,"C");
		$pdf->Cell(15,5,'',0,0,"C");
			$pdf->Ln();
		}
		}
		elseif($pare==2)
		{
		$gtsubjectid ="select * from borno_result_subject_details where borno_school_session='$stsess' AND borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_result_term_id='$term' AND pare='2' order by borno_result_subject_id asc limit 0,1";
					$qgtsubjectid=$mysqli->query($gtsubjectid);
					$stqgtsubjectid=$qgtsubjectid->fetch_assoc();
					$fsstgtsubject=$stqgtsubjectid['borno_result_subject_id'];	
		if($stN==$fsstgtsubject)
		{

		$gtsgpa ="select * from borno_class1_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND pare='2'";
					$qggtsgpa=$mysqli->query($gtsgpa);
					$stgqggtsgpa=$qggtsgpa->fetch_assoc();
					
		$stName1=$stgqggtsgpa['res_total_conv'];			
		$stphone=$stgqggtsgpa['res_gpa'];
	    $stgp=$stgqggtsgpa['res_lg'];
					
		$pdf->Cell(12,5,$stName,1,0,"C");
		$pdf->Cell(13,10,$stName1,1,0,"C");
        $pdf->Cell(25,5,$fssthigh,1,0,"C");
		$pdf->Cell(15,10,$stphone,1,0,"C");
		$pdf->Cell(15,10,$stgp,1,0,"C");
		$pdf->Cell(15,5,'',2,0,"C");
			$pdf->Ln();
		}
		elseif($stN!=$fsstgtsubject)
		{
		$pdf->Cell(12,5,$stName,1,0,"C");
		$pdf->Cell(13,5,'',0,0,"C");
        $pdf->Cell(25,5,$fssthigh,1,0,"C");
		$pdf->Cell(15,5,'',0,0,"C");
		$pdf->Cell(15,5,'',0,0,"C");
			$pdf->Ln();
		}
		}
		else
		{
		$gtsgpa ="select * from borno_class1_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND borno_result_subject_id='$stN'";
					$qggtsgpa=$mysqli->query($gtsgpa);
					$stgqggtsgpa=$qggtsgpa->fetch_assoc();
					
		$stphone=$stgqggtsgpa['res_gpa'];
	    $stgp=$stgqggtsgpa['res_lg'];
		
						
		$pdf->Cell(25,5,$stName,1,0,"C");
        $pdf->Cell(25,5,$fssthigh,1,0,"C");
		$pdf->Cell(15,5,$stphone,1,0,"C");
		$pdf->Cell(15,5,$stgp,1,0,"C");

		    	$pdf->Ln();
		}
lastline1:
					}


$pdf->SetFont('Arial','',12);

	


		$pdf->Cell(200,6,"GrandTotal / GPA",1);
 $gtstotal ="select * from borno_school_play_5_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term AND borno_school_roll=$gtstotal111";
					$qgtstotal=$mysqli->query($gtstotal);
					$stggtstotal=$qgtstotal->fetch_assoc();
$pdf->SetFont('Arial','',12);
$fstotal=$stggtstotal['grandtotal'];
$fstotal1=$stggtstotal['gpa'];




		$pdf->Cell(25,6,$fstotal,1,0,"C");
		$pdf->Cell(25,6,'',1);
		$pdf->Cell(30,6,$fstotal1,1,0,"C");
		

$pdf->Ln();
$pdf->SetFont('Arial','',12);
$pdf->Cell(200,1,'',0,5,"C"); 
$pdf->Ln();
$pdf->SetFont('Arial','',10);
 $resultun = "select * from borno_class1_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subst=1 order by borno_result_subject_id asc";
$s11l=0;

					$qresultun=$mysqli->query($resultun);
					while($rowun=$qresultun->fetch_assoc()) { $s11l++;
		$stNun=$rowun['borno_result_subject_id'];			
        $stNun1=$rowun['temp_res_number_type1'];
		$stNun2=$rowun['res_number_type2'];
		$stNun3=$rowun['res_number_type3'];
		$stNun4=$rowun['res_number_type4'];
		$stNun5=$rowun['res_number_type5'];
		$stNun6=$rowun['res_number_type6'];
        $stNuncon1=$rowun['temp_res_number_type1_conv'];
		$stNuncon2=$rowun['res_number_type2_conv'];
		$stNuncon3=$rowun['res_number_type3_conv'];		
        $sttotal=$rowun['res_total_conv'];
        $stgpa=$rowun['res_gpa'];
        $stlg=$rowun['res_lg'];
        $convertun=$stNuncon1+$stNuncon2+$stNuncon3;
        
$result22un = "select * from borno_maxnumber_class1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_result_subject_id=$stNun";
					$qresult22un=$mysqli->query($result22un);
					$row22un=$qresult22un->fetch_assoc();
				$fssthighun=$row22un['getmaxmark'];	        

		$gtsubjectun ="select * from borno_result_subject where 	borno_result_subject_id=$stNun";
					$qgtsubjectun=$mysqli->query($gtsubjectun);
					$stgtsubjectun=$qgtsubjectun->fetch_assoc();
					$fsstgtsubjectun=$stgtsubjectun['borno_school_subject_name'];
$fsstgtsubject1un=$stgtsubjectun['borno_school_subject_fullmark'];

	
$subjectdetailsun ="select * from borno_result_subject_details where borno_school_session='$stsess' AND borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_result_term_id='$term' AND borno_result_subject_id='$stNun'";
					$qsubjectdetailsun=$mysqli->query($subjectdetailsun);
					$sqsubjectdetailsun=$qsubjectdetailsun->fetch_assoc();
					
		$subtypeun1=$sqsubjectdetailsun['number_type1_marks'];
		$subtypeun2=$sqsubjectdetailsun['number_type2_marks'];
		$subtypeun3=$sqsubjectdetailsun['number_type3_marks'];
		$subtypeun4=$sqsubjectdetailsun['number_type4_marks'];
		$subtypeun5=$sqsubjectdetailsun['number_type5_marks'];
		$subtypeun6=$sqsubjectdetailsun['number_type6_marks'];					
		

		$pdf->Cell(60,5,$fsstgtsubjectun,1);
		$pdf->Cell(20,5,$fsstgtsubject1un,1,0,"C");
		if($subtypeun1!=0)
		{		
		$pdf->Cell(20,5,$stNun1,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		if($subtypeun2!=0)
		{		
		$pdf->Cell(20,5,$stNun2,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		if($subtypeun3!=0)
		{		
		$pdf->Cell(20,5,$stNun3,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		
	//	$pdf->Cell(15,5,$convertun,1,0,"C");
		
		if($subtypeun4!=0)
		{		
		$pdf->Cell(20,5,$stNun4,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		if($subtypeun5!=0)
		{		
		$pdf->Cell(20,5,$stNun5,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		if($subtypeun6!=0)
		{		
		$pdf->Cell(20,5,$stNun6,1,0,"C");
		}
		else
		{
		$pdf->Cell(20,5,'-',1,0,"C");
		}
		
        $pdf->Cell(25,5,$sttotal,1,0,"C");	
		$pdf->Cell(25,5,$fssthighun,1,0,"C");	
		$pdf->Cell(15,5,$stgpa,1,0,"C");
		$pdf->Cell(15,5,$stlg,1,0,"C");
 $pdf->Ln();       
}
	
$pdf->Cell(200,1,'',0,5,"C"); 
$pdf->Ln();
	


		
$gtstotal1 ="select * from borno_school_play_5_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term AND borno_school_roll=$gtstotal111";
					$qgtstotal1=$mysqli->query($gtstotal1);
					$stggtstotal1=$qgtstotal1->fetch_assoc();
$pdf->SetFont('Arial','',12);
$fmerit1=$stggtstotal1['merit_section'];
$fmerit2=$stggtstotal1['merit_shift'];
$fmerit3=$stggtstotal1['merit_class'];
$failno=$stggtstotal1['failno'];


		$pdf->Cell(50,6,"Merit Position in Section",1);
	if ($failno!="0"){
		   $pdf->SetTextColor(255,0,0); 
		  $pdf->Cell(20,6,$fmerit1,1,0,"C");
		}
		else{
		    $pdf->SetTextColor(0,0,0);
		   $pdf->Cell(20,6,$fmerit1,1,0,"C");
		}
		
		$pdf->SetTextColor(0,0,0);
		$pdf->Cell(50,6,"Merit Position in Shift",1);
	if ($failno!="0"){
		   $pdf->SetTextColor(255,0,0); 
		$pdf->Cell(20,6,$fmerit2,1,0,"C");
		}
		else{
		    $pdf->SetTextColor(0,0,0);
		$pdf->Cell(20,6,$fmerit2,1,0,"C");
		}

		$pdf->SetTextColor(0,0,0);
		$pdf->Cell(50,6,"Merit Position in Class",1);
		
	if ($failno!="0"){
		   $pdf->SetTextColor(255,0,0); 
		$pdf->Cell(20,6,$fmerit3,1,0,"C");
		}
		else{
		    $pdf->SetTextColor(0,0,0);
		$pdf->Cell(20,6,$fmerit3,1,0,"C");
		}
		

		$pdf->SetTextColor(0,0,0);
		$pdf->Cell(50,6,"Total Fail Subject",1,0,"C");
		if ($failno!="0"){
		   $pdf->SetTextColor(255,0,0); 
		  $pdf->Cell(20,6,$failno,1,0,"C"); 
		}
		else{
		    $pdf->SetTextColor(0,0,0);
		    $pdf->Cell(20,6,"-",1,0,"C");
		}
		$pdf->SetTextColor(0,0,0);
		
		
		$pdf->Ln();
		$pdf->Cell(280,6,"Opinion about Result (Filled up by Class Teacher)",1,0,"C");
		$pdf->Ln();
		$pdf->Cell(280,18,'',1);

$pdf->Ln();
$pdf->Cell(200,1,'',0,5,"C"); 
$pdf->Ln();
$pdf->SetFont('Arial','',8);

$gtstotal1123 ="select * from borno_school_play_5_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term";
	                $qgtstotal1123=$mysqli->query($gtstotal1123);
					$totalstudent=mysqli_num_rows($qgtstotal1123);
					 
$pdf->Cell(30,5,"Total Students",1);
$pdf->Cell(10,5,$totalstudent,1,0,"C");


					
$pdf->Cell(25,5,"Schooling Day",1);
$pdf->Cell(10,5,$schoolingday,1,0,"C");

$gtsattend ="select * from borno_school_attendence where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term AND borno_school_roll='$gtstotal111'";
	                $qggtsattend=$mysqli->query($gtsattend);
					$stgqqggtsattend=$qggtsattend->fetch_assoc();
					$presence=$stgqqggtsattend['borno_school_presence'];
					$absence=$stgqqggtsattend['borno_school_absence'];

$pdf->Cell(20,5,"Presence",1);
$pdf->Cell(10,5,$presence,1,0,"C");
$pdf->Cell(20,5,"Absence",1);
$pdf->Cell(10,5,$absence,1,0,"C");
$pdf->Cell(5,5,'',0);
$pdf->Cell(90,5,"Bahaviour",1,0,"C");
$pdf->Ln();	
$pdf->Cell(135,5,"Co-Educational Activities",1,0,"C");

$pdf->Cell(5,5,'',0);
$pdf->Cell(15,5,"Excellent",1);
$pdf->Cell(5,5,'',1);
$pdf->Cell(15,5,"Very Good",1);
$pdf->Cell(5,5,'',1);
$pdf->Cell(10,5,"Good",1);
$pdf->Cell(5,5,'',1);
$pdf->Cell(30,5,"Need To Improve",1);
$pdf->Cell(5,5,'',1);
$pdf->Ln();	
$pdf->Cell(35,5,"Cultural Activities",1);
$pdf->Cell(5,5,'',1);
$pdf->Cell(10,5,"BNCC",1);
$pdf->Cell(5,5,'',1);
$pdf->Cell(15,5,"Debate",1);
$pdf->Cell(5,5,'',1);
$pdf->Cell(15,5,"Scout",1);
$pdf->Cell(5,5,'',1);
$pdf->Cell(15,5,"Sports",1);
$pdf->Cell(5,5,'',1);
$pdf->Cell(15,5,"Others",1);
$pdf->Cell(5,5,'',1);
$pdf->Ln();	
if($schId==78 or $schId==81)
{
$pdf->Cell(200,1,'',0,5,"C"); 
$gtsattend1 ="select * from borno_school_assesment where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term AND borno_school_roll='$gtstotal111'";
	                $qggtsattend1=$mysqli->query($gtsattend1);
					$stgqqggtsattend1=$qggtsattend1->fetch_assoc();
					$regulation=$stgqqggtsattend1['regulation'];
					$patritism=$stgqqggtsattend1['patritism'];
					$honesty=$stgqqggtsattend1['honesty'];
					$leadership=$stgqqggtsattend1['leadership'];		
					$discipline=$stgqqggtsattend1['discipline'];	
					$cooperation=$stgqqggtsattend1['cooperation'];	
					$participation=$stgqqggtsattend1['participation'];	
					$sympathy=$stgqqggtsattend1['sympathy'];	
					$awareness=$stgqqggtsattend1['awareness'];	
					$punctuality=$stgqqggtsattend1['punctuality'];	
					$total_mark=$stgqqggtsattend1['total_mark'];	
					$remarks=$stgqqggtsattend1['remarks'];	
					
$pdf->Cell(24,5,"Regulation",1,0,"C");	
$pdf->Cell(24,5,"Patritism",1,0,"C");
$pdf->Cell(24,5,"Honesty",1,0,"C");
$pdf->Cell(24,5,"leadership",1,0,"C");
$pdf->Cell(24,5,"Discipline",1,0,"C");
$pdf->Cell(24,5,"Cooperation",1,0,"C");
$pdf->Cell(25,5,"Active Participation",1,0,"C");
$pdf->Cell(24,5,"Sympathy",1,0,"C");
$pdf->Cell(24,5,"Awareness",1,0,"C");
$pdf->Cell(24,5,"Punctuality",1,0,"C");
$pdf->Cell(10,5,"Total",1,0,"C");		
$pdf->Cell(29,5,"Remarks",1,0,"C");	
$pdf->Ln();	
$pdf->Cell(24,5,$regulation,1,0,"C");
$pdf->Cell(24,5,$patritism,1,0,"C");
$pdf->Cell(24,5,$honesty,1,0,"C");
$pdf->Cell(24,5,$leadership,1,0,"C");
$pdf->Cell(24,5,$discipline,1,0,"C");
$pdf->Cell(24,5,$cooperation,1,0,"C");
$pdf->Cell(25,5,$participation,1,0,"C");
$pdf->Cell(24,5,$sympathy,1,0,"C");
$pdf->Cell(24,5,$awareness,1,0,"C");
$pdf->Cell(24,5,$punctuality,1,0,"C");
$pdf->Cell(10,5,$total_mark,1,0,"C");
$pdf->Cell(29,5,$remarks,1,0,"C");
}						
$pdf->Ln();	






$pdf->AddPage('L');
}
}

$pdf->Output();
?>