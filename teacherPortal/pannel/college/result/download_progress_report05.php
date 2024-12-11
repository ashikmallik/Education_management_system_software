<?php
$branchId=$_GET['stbranch'];
$schId=$_GET['schoolId'];
$studClass=$_GET['classId'];
$shiftId=$_GET['shiftId'];
$section=$_GET['sectionId'];
$stsess=$_GET['scsess'];
$term=$_GET['sctermId'];
$group=$_GET['group'];
$styear=$_GET['styear'];

include('../../../../connection.php');
					$gtschoolName="SELECT * FROM borno_school where borno_school_id=$schId";
					$qgtschoolName=$mysqli->query($gtschoolName);
					$sqgtschoolName=$qgtschoolName->fetch_assoc();
$fnschname=$sqgtschoolName['borno_school_name'];
$fnshead=$sqgtschoolName['borno_school_head'];


	$gtschoolLogo=$sqgtschoolName['borno_school_logo'];
	if($gtschoolLogo!=""){
	
	$finalSchoolLogo="../../infosett/school-logo/$gtschoolLogo";
	
	} else {
		$finalSchoolLogo="../../infosett/school-logo/nologo.png";
		}
		


$gtschoolsignature=$sqgtschoolName['signature'];
	if($gtschoolsignature!=""){
	
	$finalgtschoolsignature="../../teacher/signature/$gtschoolsignature";
	
	} else {
		$finalgtschoolsignature="../../teacher/signature/nophoto.jpg";
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
require('../../../fpdf/fpdf.php');
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
  
    $this->Image($finalSchoolLogo1,15,8,25,25);
	
	
}

// Page footer
function Footer()
{
    
	$finalgtschoolsignature1=$GLOBALS['finalgtschoolsignature'];
  
    $this->Image($finalgtschoolsignature1,155,270,30,10);
	
	// Position at 1.5 cm from bottom
    $this->SetY(-16);
    // Arial italic 8
   
	$this->SetFont('Arial','',10); 
// 	$this->Cell(60,1,"----------------------------",0,0,"C"); 
// 	$this->Cell(70,1,"-------------------------------------",0,0,"C"); 
// 	$this->Cell(60,1,"--------------------------------",0,0,"C"); 
// 	$this->Ln();
	$this->Cell(60,1,"Class Teacher",0,0,"C"); 
	$this->Cell(70,1,"Masuda Ahmed",0,0,"C"); 
	$this->Cell(70,3,"Dr. Munshi Sharif Uz Zaman",0,0,"C"); 
	$this->Ln();
	$this->Cell(60,5,"",0,0,"C"); 
	$this->Cell(70,5,"In-Charge(College)",0,0,"C"); 
	$this->Cell(25,5,$GLOBALS['fnshead'],0,0,"R");
	$this->Cell(-20,5,"BCS(EDU)",0,0,"L"); 
// 	$this->Cell(60,5,"Guardian's Signature",0,0,"C"); 
// 	$this->Cell(70,5,"Class Teacher's Signature",0,0,"C"); 
// 	$this->Cell(14,5,$GLOBALS['fnshead'],0,0,"R");
// 	$this->Cell(-10,5,"Principal's Signature",0,0,"L"); 
    // Page number
	$this->SetFont('Arial','',8);
	$this->Ln();
	$this->Cell(20,5,"Publish Date : ",0,0,"L"); 
	$this->Cell(90,5,$GLOBALS['publish'],0,0,"L"); 
		$this->SetFont('Arial','',10);
	$this->Cell(108,3,"Principal",0,0,"C");
   // $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();


$result23 ="select * from borno_class11_12_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_result_exam_year='$styear' group by borno_school_roll asc";
$sl=0;
					$qgresult23=$mysqli->query($result23);
					while($row23=$qgresult23->fetch_assoc()){ $sl++;

					$gtstotal111=$row23['borno_school_roll'];




//----------------- School Name ------------------------------------------------------------------
$pdf->SetFont('Arial','',20);
$pdf->Cell(190,2,$fnschname,0,0,"C");
$pdf->SetFont('Arial','',7);  


$pdf->Ln();


$pdf->Cell(190,3,'',0,0,"C");

$pdf->SetFont('Arial','',7);  

$pdf->Ln();

$pdf->SetFont('Arial','',16); 
$pdf->Cell(190,5,"Branch : $fnsbranch",0,0,"C");



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
		
	$pdf->Ln();
 
$pdf->Cell(190,1,'',0,0,"C"); 

//----------------- Branch Name ------------------------------------------------------------------




	$pdf->Ln();

	$pdf->SetFont('Arial','U',14);  
$pdf->Cell(190,5,'Progress Report',0,0,"C"); 

	

	$pdf->Ln();
		$pdf->SetFont('Arial','',7);  
		$pdf->Cell(130,4,'',0,0,"C"); 
		$pdf->Cell(60,4,"Grading System",1,0,"C");
	
$pdf->Ln();
$pdf->Cell(130,4,'',0,0,"C"); 
$pdf->Cell(28,4,"Mark Range",1,0,"C");
$pdf->Cell(12,4,"Grade",1,0,"C");
$pdf->Cell(20,4,"Grade Point",1,0,"C");
$pdf->Ln();
$pdf->Cell(130,4,'',0,0,"C"); 
$pdf->Cell(14,4,$stnn1,1,0,"C");
$pdf->Cell(14,4,$stnn2,1,0,"C");
$pdf->Cell(12,4,$stnn3,1,0,"C");
$pdf->Cell(20,4,$stnn4,1,0,"C");
$pdf->Ln();
$pdf->Cell(130,4,'',0,0,"C");
$pdf->Cell(14,4,$stnm1,1,0,"C");
$pdf->Cell(14,4,$stnm2,1,0,"C");
$pdf->Cell(12,4,$stnm3,1,0,"C");
$pdf->Cell(20,4,$stnm4,1,0,"C");
$pdf->Ln();	
$pdf->Cell(130,4,'',0,0,"C");
$pdf->Cell(14,4,$stnm11,1,0,"C");
$pdf->Cell(14,4,$stnm21,1,0,"C");
$pdf->Cell(12,4,$stnm31,1,0,"C");
$pdf->Cell(20,4,$stnm41,1,0,"C");
$pdf->Ln();
$pdf->Cell(130,4,'',0,0,"C");
$pdf->Cell(14,4,$stnm111,1,0,"C");
$pdf->Cell(14,4,$stnm211,1,0,"C");
$pdf->Cell(12,4,$stnm311,1,0,"C");
$pdf->Cell(20,4,$stnm411,1,0,"C");
$pdf->Ln();
$pdf->Cell(130,4,'',0,0,"C");
$pdf->Cell(14,4,$stnm1111,1,0,"C");
$pdf->Cell(14,4,$stnm2111,1,0,"C");
$pdf->Cell(12,4,$stnm3111,1,0,"C");
$pdf->Cell(20,4,$stnm4111,1,0,"C");
$pdf->Ln();	
$pdf->Cell(130,4,'',0,0,"C");
$pdf->Cell(14,4,$stnm1112,1,0,"C");
$pdf->Cell(14,4,$stnm2112,1,0,"C");
$pdf->Cell(12,4,$stnm3112,1,0,"C");
$pdf->Cell(20,4,$stnm4112,1,0,"C");
$pdf->Ln();	
$pdf->Cell(130,4,'',0,0,"C");
$pdf->Cell(14,4,$stnm11121,1,0,"C");
$pdf->Cell(14,4,$stnm21121,1,0,"C");
$pdf->Cell(12,4,$stnm31121,1,0,"C");
$pdf->Cell(20,4,$stnm41121,1,0,"C");
$pdf->Ln();	
$gtstname ="select * from borno_student_info where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111'";

$pdf->SetFont('Arial','U',14);
					$qgtstname=$mysqli->query($gtstname);
					$stgtstname=$qgtstname->fetch_assoc();
$fstname=$stgtstname['borno_school_student_name'];
$pdf->Cell(190,5,"Progress Report of : $fstname",0,0,"L");

		$pdf->SetFont('Arial','',7);  




$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->Cell(220,5,'',0,0,"L");


		$pdf->SetFont('Arial','',7);  

	

$pdf->Ln();
$pdf->SetFont('Arial','',11);
$pdf->Cell(10,5,"Roll :",0,0,"L");
$pdf->SetFont('Arial','I',11);
$pdf->Cell(70,5,$gtstotal111,0,0,"L");
$pdf->SetFont('Arial','',11);
$pdf->Cell(13,5,"Class :",0,0,"L");
$pdf->SetFont('Arial','I',11);
$pdf->Cell(56,5,$fnsclass,0,0,"L");
$pdf->SetFont('Arial','',11);
$pdf->Cell(10,5,"Shift :",0,0,"L");
$pdf->SetFont('Arial','I',11);
$pdf->Cell(60,5,$fnsshift,0,0,"L");

			
$pdf->Ln();
$pdf->SetFont('Arial','',11);
$pdf->Cell(20,5,"Section :",0,0,"L");
$pdf->SetFont('Arial','I',11);
$pdf->Cell(60,5,$fnssection,0,0,"L");
$pdf->SetFont('Arial','',11);
$pdf->Cell(24,5,"Exam Type :",0,0,"L");
$pdf->SetFont('Arial','I',11);
$pdf->Cell(45,5,$fnsterm,0,0,"L");
$pdf->SetFont('Arial','',11);
$pdf->Cell(25,5,"Exam Year :",0,0,"L");
$pdf->SetFont('Arial','I',11);
$pdf->Cell(50,5,$styear,0,0,"L");




	
$pdf->Ln();
$pdf->SetFont('Arial','',11);
if($group==1)
{
$pdf->Cell(80,5,"Department : Science",0,0,"L");    
}  
elseif($group==2)
{
$pdf->Cell(80,5,"Department : Business Studies",0,0,"L");    
} 
elseif($group==3)
{
$pdf->Cell(80,5,"Department : Humanities",0,0,"L");    
} 
$pdf->SetFont('Arial','',11);
$pdf->Cell(24,5,"Session :",0,0,"L");
$pdf->SetFont('Arial','I',11);
$pdf->Cell(45,5,$stsess,0,0,"L");
$pdf->Ln();
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



		$pdf->Cell(50,5,"Subject Name",1);
		$pdf->Cell(18,5,"Full Mark",1,0,"C");
		
		
		$pdf->Cell(15,5,$type1,1,0,"C");
		$pdf->Cell(10,5,$type2,1,0,"C");
		$pdf->Cell(15,5,$type3,1,0,"C");
		$pdf->Cell(10,5,$type4,1,0,"C");
		$pdf->Cell(10,5,$type5,1,0,"C");
		$pdf->Cell(10,5,$type6,1,0,"C");
		$pdf->Cell(20,5,'Total',1,0,"C");
		$pdf->Cell(15,5,"Highest",1,0,"C");
		$pdf->Cell(10,5,'GP',1,0,"C");
		$pdf->Cell(7,5,'LG',1,0,"C");

		
		
		


$result = "select * from borno_class11_12_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111' order by borno_subject_eleven_twelve_id asc";
$sl=0;

					$qresult=$mysqli->query($result);
					while($row=$qresult->fetch_assoc()) { $sl++;
	$pdf->Ln();
	//foreach($row as $column)
		
		$stroll=$sl;
		$stN=$row['borno_subject_eleven_twelve_id'];
		$stN1=$row['temp_res_number_type1'];
		$stN2=$row['res_number_type2'];
		$stN3=$row['res_number_type3'];
		$stN4=$row['res_number_type4'];
		$stN5=$row['res_number_type5'];
		$stN6=$row['res_number_type6'];
		$stName=$row['res_total_conv'];
		$stphone=$row['res_gpa'];
		$stgp=$row['res_lg'];
		$subpare=$row['pare'];	
	



		
	
		$gtsubject ="select * from borno_subject_eleven_twelve where borno_subject_eleven_twelve_id=$stN";
					$qgtsubject=$mysqli->query($gtsubject);
					$stgtsubject=$qgtsubject->fetch_assoc();
					$fsstgtsubject=substr($stgtsubject['borno_subject_eleven_twelve_name'],0,25);

		if($schId==65 AND $fsstgtsubject!="ICT"){$fsstgtsubject=substr($fsstgtsubject,0,-2);}
		$pdf->Cell(50,5,$fsstgtsubject,1);
		

$subjectdetails ="select * from borno_result_eleven_twelve_subject_details where borno_school_session='$stsess' AND borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_result_term_id='$term' AND borno_subject_eleven_twelve_id='$stN'";
					$qsubjectdetails=$mysqli->query($subjectdetails);
					$sqsubjectdetails=$qsubjectdetails->fetch_assoc();
					
		$fsstgtsubject1=$sqsubjectdetails['borno_eleven_twelve_subfullmark'];			
		$subtype1=$sqsubjectdetails['number_type1_marks'];
		$subtype2=$sqsubjectdetails['number_type2_marks'];
		$subtype3=$sqsubjectdetails['number_type3_marks'];
		$subtype4=$sqsubjectdetails['number_type4_marks'];
		$subtype5=$sqsubjectdetails['number_type5_marks'];
		$subtype6=$sqsubjectdetails['number_type6_marks'];					
		
		
		$pdf->Cell(18,5,$fsstgtsubject1,1,0,"C");
		if($subtype1!=0)
		{		
		$pdf->Cell(15,5,$stN1,1,0,"C");
		}
		else
		{
		$pdf->Cell(15,5,'-',1,0,"C");
		}
		if($subtype2!=0)
		{		
		$pdf->Cell(10,5,$stN2,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		if($subtype3!=0)
		{		
		$pdf->Cell(15,5,$stN3,1,0,"C");
		}
		else
		{
		$pdf->Cell(15,5,'-',1,0,"C");
		}
		if($subtype4!=0)
		{		
		$pdf->Cell(10,5,$stN4,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		if($subtype5!=0)
		{		
		$pdf->Cell(10,5,$stN5,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		if($subtype6!=0)
		{		
		$pdf->Cell(10,5,$stN6,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		
		
		
		
		
		
		
$result22 = "select * from borno_height_mark_class11_12 where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_result_exam_year='$styear' AND borno_subject_eleven_twelve_id='$stN'";
					$qresult22=$mysqli->query($result22);
					$row22=$qresult22->fetch_assoc();
				$fssthigh=$row22['getmaxmark'];	

 if($subpare!=0)
 {       
 $gtsubjectpare ="select * from borno_class11_12_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111' AND borno_subject_eleven_twelve_id!=$stN AND pare='$subpare'";
					$qgtsubjectpare=$mysqli->query($gtsubjectpare);
					$stqgtsubjectpare=$qgtsubjectpare->fetch_assoc();
					$fsstgtsubjectpare=$stqgtsubjectpare['borno_subject_eleven_twelve_id'];		
	
$gtsubjectpare1 ="select * from borno_class11_12_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111' AND pare='$subpare' order by borno_subject_eleven_twelve_id asc limit 0,1";
					$qgtsubjectpare1=$mysqli->query($gtsubjectpare1);
					$stqgtsubjectpare1=$qgtsubjectpare1->fetch_assoc();	
					$fsstgtsubjectpare1=$stqgtsubjectpare1['borno_subject_eleven_twelve_id'];

$gtsubjectpare3 ="select * from borno_class11_12_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111' AND pare='$subpare' order by borno_subject_eleven_twelve_id desc limit 0,1";
					$qgtsubjectpare3=$mysqli->query($gtsubjectpare3);
					$stqgtsubjectpare3=$qgtsubjectpare3->fetch_assoc();	
					$fsstgtsubjectpare2=$stqgtsubjectpare3['borno_subject_eleven_twelve_id'];
					
$gtsubjectpare2 ="select * from borno_class11_12_test_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111' AND pare='$subpare' AND borno_subject_eleven_twelve_id='$fsstgtsubjectpare2'";
					$qgtsubjectpare2=$mysqli->query($gtsubjectpare2);
					$stqgtsubjectpare2=$qgtsubjectpare2->fetch_assoc();	
					$stName1=$stqgtsubjectpare2['res_total_conv'];	
					$stphone1=$stqgtsubjectpare2['res_gpa'];
					$stgp1=$stqgtsubjectpare2['res_lg'];				
		
		if($fsstgtsubjectpare!="" AND $fsstgtsubjectpare1==$stN)	
		{		
		$pdf->Cell(10,5,$stName,1,0,"C");
		$pdf->Cell(10,10,$stName1,1,0,"C");	
		$pdf->Cell(15,5,$fssthigh,1,0,"C");	
		$pdf->Cell(10,10,$stphone1,1,0,"C");
		$pdf->Cell(7,10,$stgp1,1,0,"C");
		$pdf->Cell(10,5,'',2,0,"C");
		}
		elseif($fsstgtsubjectpare=="" AND $fsstgtsubjectpare1==$stN)	
		{		
		$pdf->Cell(20,5,$stName,1,0,"C");	
		$pdf->Cell(15,5,$fssthigh,1,0,"C");	
		$pdf->Cell(10,5,$stphone,1,0,"C");
		$pdf->Cell(7,5,$stgp,1,0,"C");
		
		}
		elseif($fsstgtsubjectpare!="" AND $fsstgtsubjectpare1!=$stN)	
		{		
		$pdf->Cell(10,5,$stName,1,0,"C");
		$pdf->Cell(10,5,'',0,0,"C");	
		$pdf->Cell(15,5,$fssthigh,1,0,"C");	
		$pdf->Cell(10,5,'',0,0,"C");
		$pdf->Cell(7,5,'',0,0,"C");
		}
 }
else
 {       
	
		$pdf->Cell(20,5,$stName,1,0,"C");	
		$pdf->Cell(15,5,$fssthigh,1,0,"C");	
		$pdf->Cell(10,5,$stphone,1,0,"C");
		$pdf->Cell(7,5,$stgp,1,0,"C");
 }
}

$pdf->Ln();
$pdf->SetFont('Arial','',12);

	


		$pdf->Cell(138,6,"GrandTotal / GPA With 4th Subject",1);
$gtstotal ="select * from borno_school_11_12_merit where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111'";
					$qgtstotal=$mysqli->query($gtstotal);
					$stggtstotal=$qgtstotal->fetch_assoc();
$pdf->SetFont('Arial','',12);
$fstotal=$stggtstotal['grandtotal'];
$fstotal1=$stggtstotal['gpa'];
$fstotal13=$stggtstotal['grandtotalwithout4th'];
$fstotal114=$stggtstotal['gpawithout4th'];


		$pdf->Cell(20,6,$fstotal,1,0,"C");
		$pdf->Cell(15,6,'',1);
		$pdf->Cell(17,6,$fstotal1,1,0,"C");
$pdf->Ln();
$pdf->Cell(138,6,"GrandTotal / GPA Without 4th Subject",1);
$pdf->Cell(20,6,$fstotal13,1,0,"C");
$pdf->Cell(15,6,'',1);
$pdf->Cell(17,6,$fstotal114,1,0,"C");
$pdf->Ln();	
 $gt4th="select * from borno_class11_12_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111' AND stu4thsub='1'";
					$qgt4th=$mysqli->query($gt4th);
					$snl=0;
					while($stqgt4th=$qgt4th->fetch_assoc()){$snl++;
					$sub4th=$stqgt4th['borno_subject_eleven_twelve_id'];	


$gtsubject12 ="select * from borno_subject_eleven_twelve where borno_subject_eleven_twelve_id=$sub4th";
					$qgtsubject12=$mysqli->query($gtsubject12);
					$stqgtsubject12=$qgtsubject12->fetch_assoc();
					$fsstgtsubject4th=$stqgtsubject12['borno_subject_eleven_twelve_name'];	
					if($snl==1){$subj4th1=$fsstgtsubject4th;}
					if($snl==2){$subj4th2=$fsstgtsubject4th;}
					}
$pdf->SetFont('Arial','B',12);	


if($snl==2)
{				
//$pdf->Cell(190,6,"4th Subject Name : $subj4th1,  $subj4th2",1);
$pdf->Cell(190,6,"4th Subject Name : $subj4th2",1);
}
if($snl==1)
{				
$pdf->Cell(190,6,"4th Subject Name : $subj4th1",1);
}
$pdf->Ln();	


$pdf->SetFont('Arial','',11);

	


		
$gtstotal1 ="select * from borno_school_11_12_merit where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111'";
					$qgtstotal1=$mysqli->query($gtstotal1);
					$stggtstotal1=$qgtstotal1->fetch_assoc();
$pdf->SetFont('Arial','',12);
$fmerit1=$stggtstotal1['merit_section'];
$fmerit2=$stggtstotal1['merit_shift'];
$fmerit3=$stggtstotal1['merit_class'];


		$pdf->Cell(50,6,"Merit Position in Section",1);
		$pdf->Cell(15,6,$fmerit1,1,0,"C");
		$pdf->Cell(50,6,"Merit Position in Shift",1);
		$pdf->Cell(15,6,$fmerit2,1,0,"C");
		$pdf->Cell(45,6,"Merit Position in Class",1);
		$pdf->Cell(15,6,$fmerit3,1,0,"C");
		$pdf->Ln();



$pdf->Ln();
$pdf->Cell(200,1,'',0,5,"C"); 
$pdf->Ln();

$gtstotal1123 ="select * from borno_school_11_12_merit where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_result_exam_year='$styear'";
	                $qgtstotal1123=$mysqli->query($gtstotal1123);
					$totalstudent=mysqli_num_rows($qgtstotal1123); 

$pdf->SetFont('Arial','',10);
$pdf->Cell(50,5,"Total Students",1);
$pdf->Cell(10,5,$totalstudent,1,0,"C");
$pdf->Cell(40,5,"Schooling Day",1);
$pdf->Cell(10,5,'',1);
$pdf->Cell(30,5,"Presence",1);
$pdf->Cell(10,5,'',1);
$pdf->Cell(30,5,"Absence",1);
$pdf->Cell(10,5,'',1);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(190,5,"Co-Educational Activities",1,0,"C");
$pdf->Ln();
$pdf->Cell(45,5,"Cultural Activities",1);
$pdf->Cell(5,5,'',1);
$pdf->Cell(15,5,"BNCC",1);
$pdf->Cell(5,5,'',1);
$pdf->Cell(25,5,"Debate",1);
$pdf->Cell(5,5,'',1);
$pdf->Cell(25,5,"Scout",1);
$pdf->Cell(5,5,'',1);
$pdf->Cell(25,5,"Sports",1);
$pdf->Cell(5,5,'',1);
$pdf->Cell(25,5,"Others",1);
$pdf->Cell(5,5,'',1);
$pdf->Ln();	
$pdf->Ln();	
$pdf->Cell(190,5,"Bahaviour",1,0,"C");
$pdf->Ln();	
$pdf->Cell(30,5,"Excellent",1);
$pdf->Cell(5,5,'',1);
$pdf->Cell(25,5,"Very Good",1);
$pdf->Cell(5,5,'',1);
$pdf->Cell(20,5,"Good",1);
$pdf->Cell(5,5,'',1);
$pdf->Cell(45,5,"Need To Improve",1);
$pdf->Cell(5,5,'',1);
$pdf->Cell(45,5,"Not Satisfied",1);
$pdf->Cell(5,5,'',1);
$pdf->Ln();	
$pdf->Ln();	
$pdf->Cell(190,5,"Opinion about Result (Filled up by Class Teacher)",1,0,"C");
$pdf->Ln();	
$pdf->Cell(190,18,"",1,0,"C");

	
$pdf->Ln();	






$pdf->AddPage('');
}

$pdf->Output();
?>