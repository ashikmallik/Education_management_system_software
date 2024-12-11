<?php
$branchId=$_GET['stbranch'];
$schId=$_GET['schoolId'];
$studClass=$_GET['classId'];
$shiftId=$_GET['shiftId'];
$section=$_GET['sectionId'];
$stsess=$_GET['scsess'];
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

$gtterm="select * from borno_result_add_term where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' order by borno_result_term_id asc";
				
				$qgterm=$mysqli->query($gtterm);
				$st=0;
				while($shsterm=$qgterm->fetch_assoc()){$st++;	
				$selTerm1=$shsterm['borno_result_term_id'];	
				
$gtterm="SELECT * FROM borno_result_add_term where borno_result_term_id=$selTerm1";
					$qgtterm=$mysqli->query($gtterm);
					$sqgtterm=$qgtterm->fetch_assoc();
$fnsterm=$sqgtterm['borno_result_term_name'];
				if($st==1)
				{
				$termid1=$selTerm1;
				$termname1=$fnsterm;
				}
				if($st==2)
				{
				$termid2=$selTerm1;
				$termname2=$fnsterm;
				}
				if($st==3)
				{
				$termid3=$selTerm1;
				$termname3=$fnsterm;
				}				
				}


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
$result23 ="select * from borno_school_910_avg_merit where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_subject_nine_ten_dept='$group' AND borno_result_term_id='0' AND borno_school_roll between '$rollf' AND '$rollt' order by borno_school_roll asc";
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
$pdf->Cell(220,2,"Branch : $fnsbranch",0,0,"C");



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
$pdf->Cell(10,5,"Roll :",0,0,"L");
$pdf->SetFont('Arial','I',10);
$pdf->Cell(70,5,$gtstotal111,0,0,"L");
$pdf->SetFont('Arial','',10);
$pdf->Cell(12,5,"Class :",0,0,"L");
$pdf->SetFont('Arial','I',10);
$pdf->Cell(58,5,$fnsclass,0,0,"L");
$pdf->SetFont('Arial','',10);
$pdf->Cell(10,5,"Shift :",0,0,"L");
$pdf->SetFont('Arial','I',10);
$pdf->Cell(60,5,$fnsshift,0,0,"L");



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
$pdf->Cell(49,5,Annual,0,0,"L");
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


		$pdf->Cell(50,10,"Subject Name",1);
		$pdf->Cell(20,10,"Full Mark",1,0,"C");
		$pdf->Cell(105,5,$termname1,1,0,"C");
		$pdf->Cell(105,5,$termname2,1,0,"C");
		$pdf->Ln();	
		$pdf->Cell(50,5,"",0);	
		$pdf->Cell(20,5,'',0,0,"C");
		$pdf->Cell(10,5,$type1,1,0,"C");
		$pdf->Cell(10,5,$type2,1,0,"C");
		$pdf->Cell(10,5,$type3,1,0,"C");
		$pdf->Cell(10,5,$type4,1,0,"C");
		$pdf->Cell(10,5,$type5,1,0,"C");
		$pdf->Cell(10,5,$type6,1,0,"C");
		$pdf->Cell(25,5,"Total Mark",1,0,"C");
		$pdf->Cell(10,5,GP,1,0,"C");
		$pdf->Cell(10,5,LG,1,0,"C");
		$pdf->Cell(10,5,$type1,1,0,"C");
		$pdf->Cell(10,5,$type2,1,0,"C");
		$pdf->Cell(10,5,$type3,1,0,"C");
		$pdf->Cell(10,5,$type4,1,0,"C");
		$pdf->Cell(10,5,$type5,1,0,"C");
		$pdf->Cell(10,5,$type6,1,0,"C");
		$pdf->Cell(25,5,"Total Mark",1,0,"C");
		$pdf->Cell(10,5,GP,1,0,"C");
		$pdf->Cell(10,5,LG,1,0,"C");
	
	$pdf->SetFont('Arial','',10);	
		
		


 $result = "select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$termid2' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' order by borno_subject_nine_ten_id asc";
$sl=0;

					$qresult=$mysqli->query($result);
					while($row=$qresult->fetch_assoc()) { $sl++;
	$pdf->Ln();
	//foreach($row as $column)
		
		$stroll=$s1;
		$stN=$row['borno_subject_nine_ten_id'];
		$pare=$row['subject_pare'];

		
$resultterm1 = "select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$termid1' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id='$stN'";


					$qresultterm1=$mysqli->query($resultterm1);
					$rowterm1=$qresultterm1->fetch_assoc();		
		$stN11=$rowterm1['temp_res_number_type1'];
		$stN12=$rowterm1['temp_res_number_type2'];
		$stN13=$rowterm1['temp_res_number_type3'];
		$stN14=$rowterm1['temp_res_number_type4'];
		$stN15=$rowterm1['temp_res_number_type5'];
		$stN16=$rowterm1['temp_res_number_type6'];
		$stName1=$rowterm1['total_marks'];		
	
$resultterm2 = "select * from borno_class9_10_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$termid2' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id='$stN'";


					$qresultterm2=$mysqli->query($resultterm2);
					$rowterm2=$qresultterm2->fetch_assoc();		
		$stN21=$rowterm2['temp_res_number_type1'];
		$stN22=$rowterm2['temp_res_number_type2'];
		$stN23=$rowterm2['temp_res_number_type3'];
		$stN24=$rowterm2['temp_res_number_type4'];
		$stN25=$rowterm2['temp_res_number_type5'];
		$stN26=$rowterm2['temp_res_number_type6'];
		$stName2=$rowterm2['total_marks'];	
				
		$gtsubject ="select * from borno_subject_nine_ten where borno_subject_nine_ten_id=$stN";
					$qgtsubject=$mysqli->query($gtsubject);
					$stgtsubject=$qgtsubject->fetch_assoc();
					$fsstgtsubject=$stgtsubject['borno_subject_nine_ten_name'];

		
		$pdf->Cell(50,5,$fsstgtsubject,1);
		


	
$subjectdetails ="select * from borno_result_nine_ten_subject_details where borno_school_session='$stsess' AND borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_result_term_id='$termid2' AND borin_subject_nine_ten_id='$stN'";
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
		$pdf->Cell(10,5,$stN11,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		if($subtype2!=0)
		{		
		$pdf->Cell(10,5,$stN12,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		if($subtype3!=0)
		{		
		$pdf->Cell(10,5,$stN13,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		if($subtype4!=0)
		{		
		$pdf->Cell(10,5,$stN14,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		if($subtype5!=0)
		{		
		$pdf->Cell(10,5,$stN15,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		if($subtype6!=0)
		{		
		$pdf->Cell(10,5,$stN16,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		

					
		if($pare==1)
		{
		$gtsubjectid ="select * from borno_result_nine_ten_subject_details where borno_school_session='$stsess' AND borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_result_term_id='$termid2' AND pare='1' order by borin_subject_nine_ten_id asc limit 0,1";
					$qgtsubjectid=$mysqli->query($gtsubjectid);
					$stqgtsubjectid=$qgtsubjectid->fetch_assoc();
					$fsstgtsubject=$stqgtsubjectid['borin_subject_nine_ten_id'];	
		if($stN==$fsstgtsubject)
		{
			
		$gtsgpa ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$termid1' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND pare='1'";
					$qggtsgpa=$mysqli->query($gtsgpa);
					$stgqggtsgpa=$qggtsgpa->fetch_assoc();
		$stNamef1=$stgqggtsgpa['res_total_conv'];			
		$stphone1=$stgqggtsgpa['res_gpa'];
	    $stgp1=$stgqggtsgpa['res_lg'];
					
		$pdf->Cell(11,5,$stName1,1,0,"C");
		$pdf->Cell(14,10,$stNamef1,1,0,"C");
        $pdf->Cell(10,10,$stphone1,1,0,"C");
		$pdf->Cell(10,10,$stgp1,1,0,"C");
		}
		elseif($stN!=$fsstgtsubject)
		{
		$pdf->Cell(11,5,$stName1,1,0,"C");
		$pdf->Cell(14,5,'',0,0,"C");
        $pdf->Cell(10,5,'',0,0,"C");
		$pdf->Cell(10,5,'',0,0,"C");
		}
		}
		elseif($pare==2)
		{
		$gtsubjectid ="select * from borno_result_nine_ten_subject_details where borno_school_session='$stsess' AND borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_result_term_id='$termid2' AND pare='2' order by borin_subject_nine_ten_id asc limit 0,1";
					$qgtsubjectid=$mysqli->query($gtsubjectid);
					$stqgtsubjectid=$qgtsubjectid->fetch_assoc();
					$fsstgtsubject=$stqgtsubjectid['borin_subject_nine_ten_id'];	
		if($stN==$fsstgtsubject)
		{

		$gtsgpa ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$termid1' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND pare='2'";
					$qggtsgpa=$mysqli->query($gtsgpa);
					$stgqggtsgpa=$qggtsgpa->fetch_assoc();
					
		$stNamef=$stgqggtsgpa['res_total_conv'];			
		$stphone1=$stgqggtsgpa['res_gpa'];
	    $stgp1=$stgqggtsgpa['res_lg'];
					
		$pdf->Cell(11,5,$stName1,1,0,"C");
		$pdf->Cell(14,10,$stNamef,1,0,"C");
		$pdf->Cell(10,10,$stphone1,1,0,"C");
		$pdf->Cell(10,10,$stgp1,1,0,"C");
		}
		elseif($stN!=$fsstgtsubject)
		{
		$pdf->Cell(11,5,$stName1,1,0,"C");
		$pdf->Cell(14,5,'',0,0,"C");
		$pdf->Cell(10,5,'',0,0,"C");
		$pdf->Cell(10,5,'',0,0,"C");
		}
		}
		else
		{
		$gtsgpa ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$termid1' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id='$stN'";
					$qggtsgpa=$mysqli->query($gtsgpa);
					$stgqggtsgpa=$qggtsgpa->fetch_assoc();
					
		$stphone1=$stgqggtsgpa['res_gpa'];
	    $stgp1=$stgqggtsgpa['res_lg'];
		
						
		$pdf->Cell(25,5,$stName1,1,0,"C");
		$pdf->Cell(10,5,$stphone1,1,0,"C");
		$pdf->Cell(10,5,$stgp1,1,0,"C");
}


		if($subtype1!=0)
		{		
		$pdf->Cell(10,5,$stN21,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		if($subtype2!=0)
		{		
		$pdf->Cell(10,5,$stN22,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		if($subtype3!=0)
		{		
		$pdf->Cell(10,5,$stN23,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		if($subtype4!=0)
		{		
		$pdf->Cell(10,5,$stN24,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		if($subtype5!=0)
		{		
		$pdf->Cell(10,5,$stN25,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		if($subtype6!=0)
		{		
		$pdf->Cell(10,5,$stN26,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		

					
		if($pare==1)
		{
		$gtsubjectid ="select * from borno_result_nine_ten_subject_details where borno_school_session='$stsess' AND borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_result_term_id='$termid2' AND pare='1' order by borin_subject_nine_ten_id asc limit 0,1";
					$qgtsubjectid=$mysqli->query($gtsubjectid);
					$stqgtsubjectid=$qgtsubjectid->fetch_assoc();
					$fsstgtsubject=$stqgtsubjectid['borin_subject_nine_ten_id'];	
		if($stN==$fsstgtsubject)
		{
			
		$gtsgpa ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$termid2' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND pare='1'";
					$qggtsgpa=$mysqli->query($gtsgpa);
					$stgqggtsgpa=$qggtsgpa->fetch_assoc();
		$stNamef2=$stgqggtsgpa['res_total_conv'];			
		$stphone2=$stgqggtsgpa['res_gpa'];
	    $stgp2=$stgqggtsgpa['res_lg'];
					
		$pdf->Cell(11,5,$stName2,1,0,"C");
		$pdf->Cell(14,10,$stNamef2,1,0,"C");
        $pdf->Cell(10,10,$stphone2,1,0,"C");
		$pdf->Cell(10,10,$stgp2,1,0,"C");
		$pdf->Cell(5,5,'',2,0,"C");	
		}
		elseif($stN!=$fsstgtsubject)
		{
		$pdf->Cell(11,5,$stName2,1,0,"C");
		$pdf->Cell(14,5,'',0,0,"C");
        $pdf->Cell(10,5,'',0,0,"C");
		$pdf->Cell(10,5,'',0,0,"C");
		}
		}
		elseif($pare==2)
		{
		$gtsubjectid ="select * from borno_result_nine_ten_subject_details where borno_school_session='$stsess' AND borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_result_term_id='$termid2' AND pare='2' order by borin_subject_nine_ten_id asc limit 0,1";
					$qgtsubjectid=$mysqli->query($gtsubjectid);
					$stqgtsubjectid=$qgtsubjectid->fetch_assoc();
					$fsstgtsubject=$stqgtsubjectid['borin_subject_nine_ten_id'];	
		if($stN==$fsstgtsubject)
		{

		$gtsgpa ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$termid2'  AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND pare='2'";
					$qggtsgpa=$mysqli->query($gtsgpa);
					$stgqggtsgpa=$qggtsgpa->fetch_assoc();
					
		$stNamef2=$stgqggtsgpa['res_total_conv'];			
		$stphone2=$stgqggtsgpa['res_gpa'];
	    $stgp2=$stgqggtsgpa['res_lg'];
					
		$pdf->Cell(11,5,$stName2,1,0,"C");
		$pdf->Cell(14,10,$stNamef2,1,0,"C");
		$pdf->Cell(10,10,$stphone2,1,0,"C");
		$pdf->Cell(10,10,$stgp2,1,0,"C");
		$pdf->Cell(5,5,'',2,0,"C");
		}
		elseif($stN!=$fsstgtsubject)
		{
		$pdf->Cell(11,5,$stName2,1,0,"C");
		$pdf->Cell(14,5,'',0,0,"C");
		$pdf->Cell(10,5,'',0,0,"C");
		$pdf->Cell(10,5,'',0,0,"C");
		}
		}
		else
		{
		$gtsgpa ="select * from borno_class9_10_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$termid2' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id='$stN'";
					$qggtsgpa=$mysqli->query($gtsgpa);
					$stgqggtsgpa=$qggtsgpa->fetch_assoc();
					
		$stphone2=$stgqggtsgpa['res_gpa'];
	    $stgp2=$stgqggtsgpa['res_lg'];
		
						
		$pdf->Cell(25,5,$stName2,1,0,"C");
		$pdf->Cell(10,5,$stphone2,1,0,"C");
		$pdf->Cell(10,5,$stgp2,1,0,"C");
}


		
					}

$pdf->Ln();
$pdf->SetFont('Arial','',12);

	


		$pdf->Cell(70,6,"GrandTotal / GPA",1);
		$pdf->Cell(60,6,"",1);
 $gtstotalg1 ="select * from borno_school_9_10_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$termid1 AND borno_school_stud_group='$group' AND borno_school_roll=$gtstotal111";
					$qgtstotalg1=$mysqli->query($gtstotalg1);
					$stggtstotalg1=$qgtstotalg1->fetch_assoc();
$pdf->SetFont('Arial','',12);
$fstotal=$stggtstotalg1['grandtotal'];
$fstotal1=$stggtstotalg1['gpa'];
$fstlg1=$stggtstotalg1['finallg'];


		$pdf->Cell(25,6,$fstotal,1,0,"C");
		$pdf->Cell(20,6,$fstotal1,1,0,"C");

 $gtstotalg2 ="select * from borno_school_9_10_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$termid2  AND borno_school_stud_group='$group' AND borno_school_roll=$gtstotal111";
					$qgtstotalg2=$mysqli->query($gtstotalg2);
					$stggtstotalg2=$qgtstotalg2->fetch_assoc();
$pdf->SetFont('Arial','',12);
$fstotal2=$stggtstotalg2['grandtotal'];
$fstotal12=$stggtstotalg2['gpa'];
$fstlg2=$stggtstotalg2['finallg'];

		$pdf->Cell(60,6,'',1);
		$pdf->Cell(25,6,$fstotal2,1,0,"C");
		$pdf->Cell(20,6,$fstotal12,1,0,"C");

		
 $gtstotalg3 ="select * from borno_school_910_avg_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=0  AND borno_subject_nine_ten_dept='$group' AND borno_school_roll=$gtstotal111";
					$qgtstotalg3=$mysqli->query($gtstotalg3);
					$stggtstotalg3=$qgtstotalg3->fetch_assoc();
$pdf->SetFont('Arial','',12);
$fstotal3=$stggtstotalg3['grandtotal'];
$fstotal13=$stggtstotalg3['gpa'];
$fstlg3=$stggtstotalg3['finallg'];


	
$pdf->Ln();
$pdf->SetFont('Arial','',12);

	


		
$gtstotal11 ="select * from borno_school_9_10_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$termid1 AND borno_school_stud_group='$group' AND borno_school_roll=$gtstotal111";
					$qgtstotal11=$mysqli->query($gtstotal11);
					$stggtstotal11=$qgtstotal11->fetch_assoc();
$pdf->SetFont('Arial','',12);
$fmerit11=$stggtstotal11['merit_section'];
$fmerit12=$stggtstotal11['merit_shift'];
$fmerit13=$stggtstotal11['merit_class'];

$gtstotal12 ="select * from borno_school_9_10_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$termid2 AND borno_school_stud_group='$group' AND borno_school_roll=$gtstotal111";
					$qgtstotal12=$mysqli->query($gtstotal12);
					$stggtstotal12=$qgtstotal12->fetch_assoc();
$pdf->SetFont('Arial','',12);
$fmerit21=$stggtstotal12['merit_section'];
$fmerit22=$stggtstotal12['merit_shift'];
$fmerit23=$stggtstotal12['merit_class'];

$gtstotal14 ="select * from borno_school_910_avg_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=0 AND borno_subject_nine_ten_dept='$group' AND borno_school_roll=$gtstotal111";
					$qgtstotal14=$mysqli->query($gtstotal14);
					$stggtstotal14=$qgtstotal14->fetch_assoc();
$pdf->SetFont('Arial','',12);
$fmerit1=$stggtstotal14['merit_section'];
$fmerit2=$stggtstotal14['merit_shift'];
$fmerit3=$stggtstotal14['merit_class'];

$gtstotal1123 ="select * from borno_school_9_10_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_school_stud_group='$group' AND borno_result_term_id=$termid1";
	                $qgtstotal1123=$mysqli->query($gtstotal1123);
					$totalstudent1=mysqli_num_rows($qgtstotal1123);
					 
$gtstotal1123t ="select * from borno_school_9_10_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_school_stud_group='$group' AND borno_result_term_id=$termid2";
	                $qgtstotal1123t=$mysqli->query($gtstotal1123t);
					$totalstudent2=mysqli_num_rows($qgtstotal1123t);
					
$gtstotalday ="select * from borno_school_schooling_day where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$termid1";
	                $qggtstotalday=$mysqli->query($gtstotalday);
					$stgqggtstotalday=$qggtstotalday->fetch_assoc();
					$schoolingday=$stgqggtstotalday['borno_school_schooling_day'];
					
$gtstotalday1 ="select * from borno_school_schooling_day where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$termid2";
	                $qggtstotalday1=$mysqli->query($gtstotalday1);
					$stgqggtstotalday1=$qggtstotalday1->fetch_assoc();
					$schoolingday1=$stgqggtstotalday1['borno_school_schooling_day'];					
					$publish=$stgqggtstotalday1['borno_school_publish_date'];

$gtsattend ="select * from borno_school_attendence where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$termid1 AND borno_school_roll='$gtstotal111'";
	                $qggtsattend=$mysqli->query($gtsattend);
					$stgqqggtsattend=$qggtsattend->fetch_assoc();
					$presence1=$stgqqggtsattend['borno_school_presence'];
					$absence1=$stgqqggtsattend['borno_school_absence'];	

$gtsattend1 ="select * from borno_school_attendence where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$termid2 AND borno_school_roll='$gtstotal111'";
	                $qggtsattend1=$mysqli->query($gtsattend1);
					$stgqqggtsattend1=$qggtsattend1->fetch_assoc();
					$presence2=$stgqqggtsattend1['borno_school_presence'];
					$absence2=$stgqqggtsattend1['borno_school_absence'];	
					

																			
$pdf->Cell(200,1,'',0,5,"C"); 
$pdf->SetFont('Arial','',9);
$pdf->Cell(25,5,'Exam Name',1,0,"L");
$pdf->Cell(20,5,'Grand Total',1,0,"C");	
$pdf->Cell(10,5,'GPA',1,0,"C");	
$pdf->Cell(12,5,'Grade',1,0,"C");
$pdf->Cell(25,5,'Result Status',1,0,"C");
$pdf->Cell(40,5,"Merit Position in Section",1,0,"C");
$pdf->Cell(35,5,"Merit Position in Shift",1,0,"C");
$pdf->Cell(35,5,"Merit Position in Class",1,0,"C");
$pdf->Cell(23,5,'Total Student',1,0,"C");
$pdf->Cell(23,5,'Working Days',1,0,"C");
$pdf->Cell(16,5,'Presence',1,0,"C");
$pdf->Cell(16,5,'Absence',1,0,"C");	
$pdf->Ln();

$pdf->Cell(25,5,$termname1,1,0,"L");
$pdf->Cell(20,5,$fstotal,1,0,"C");	
$pdf->Cell(10,5,$fstotal1,1,0,"C");	
$pdf->Cell(12,5,$fstlg1,1,0,"C");
if($fstotal1==0)
{
$pdf->Cell(25,5,'Failed',1,0,"C");
}
else
{
 $pdf->Cell(25,5,'Passed',1,0,"C");   
}
$pdf->Cell(40,5,$fmerit11,1,0,"C");
$pdf->Cell(35,5,$fmerit12,1,0,"C");
$pdf->Cell(35,5,$fmerit13,1,0,"C");
$pdf->Cell(23,5,$totalstudent1,1,0,"C");
$pdf->Cell(23,5,$schoolingday,1,0,"C");
$pdf->Cell(16,5,$presence1,1,0,"C");
$pdf->Cell(16,5,$absence1,1,0,"C");	
$pdf->Ln();

$pdf->Cell(25,5,$termname2,1,0,"L");
$pdf->Cell(20,5,$fstotal2,1,0,"C");	
$pdf->Cell(10,5,$fstotal12,1,0,"C");	
$pdf->Cell(12,5,$fstlg2,1,0,"C");
if($fstotal12==0)
{
$pdf->Cell(25,5,'Failed',1,0,"C");
}
else
{
 $pdf->Cell(25,5,'Passed',1,0,"C");   
}
$pdf->Cell(40,5,$fmerit21,1,0,"C");
$pdf->Cell(35,5,$fmerit22,1,0,"C");
$pdf->Cell(35,5,$fmerit23,1,0,"C");
$pdf->Cell(23,5,$totalstudent2,1,0,"C");
$pdf->Cell(23,5,$schoolingday1,1,0,"C");
$pdf->Cell(16,5,$presence2,1,0,"C");
$pdf->Cell(16,5,$absence2,1,0,"C");	
$pdf->Ln();	

$pdf->Cell(25,5,Average,1,0,"L");
$pdf->Cell(20,5,$fstotal3,1,0,"C");	
$pdf->Cell(10,5,$fstotal13,1,0,"C");	
$pdf->Cell(12,5,$fstlg3,1,0,"C");
if($fstotal13==0)
{
$pdf->Cell(25,5,'Failed',1,0,"C");
}
else
{
 $pdf->Cell(25,5,'Passed',1,0,"C");   
}
$pdf->Cell(40,5,$fmerit1,1,0,"C");
$pdf->Cell(35,5,$fmerit2,1,0,"C");
$pdf->Cell(35,5,$fmerit3,1,0,"C");
$pdf->Cell(23,5,$totalstudent2,1,0,"C");
$pdf->Cell(23,5,'-',1,0,"C");
$pdf->Cell(16,5,'-',1,0,"C");
$pdf->Cell(16,5,'-',1,0,"C");	
$pdf->Ln();			
$pdf->Cell(200,1,'',0,5,"C"); 
$pdf->Ln();
$pdf->SetFont('Arial','',8);





$pdf->Ln();	
$pdf->Cell(135,5,"Co-Educational Activities",1,0,"C");
$pdf->Cell(5,5,'',0);
$pdf->Cell(140,5,"Opinion about Result (Filled up by Class Teacher)",1,0,"C");
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
$pdf->Cell(5,5,'',0);
$pdf->Cell(140,15,'',1,0,"C");
$pdf->Cell(1,5,'',2,0,"C");
$pdf->Ln();	
$pdf->Cell(135,5,"Bahaviour",1,0,"C");
$pdf->Ln();	
$pdf->Cell(25,5,"Excellent",1);
$pdf->Cell(8,5,'',1);
$pdf->Cell(25,5,"Very Good",1);
$pdf->Cell(8,5,'',1);
$pdf->Cell(20,5,"Good",1);
$pdf->Cell(8,5,'',1);
$pdf->Cell(33,5,"Need To Improve",1);
$pdf->Cell(8,5,'',1);
$pdf->Ln();	






$pdf->AddPage('L');
}
}
if($studClass==3 OR $studClass==4 OR $studClass==5)
{
$result23 ="select * from borno_school_68_avg_merit where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='0' AND borno_school_roll between '$rollf' AND '$rollt' order by borno_school_roll asc";
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
$pdf->Cell(220,2,"Branch : $fnsbranch",0,0,"C");



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
$pdf->Cell(10,5,"Roll :",0,0,"L");
$pdf->SetFont('Arial','I',10);
$pdf->Cell(70,5,$gtstotal111,0,0,"L");
$pdf->SetFont('Arial','',10);
$pdf->Cell(12,5,"Class :",0,0,"L");
$pdf->SetFont('Arial','I',10);
$pdf->Cell(58,5,$fnsclass,0,0,"L");
$pdf->SetFont('Arial','',10);
$pdf->Cell(10,5,"Shift :",0,0,"L");
$pdf->SetFont('Arial','I',10);
$pdf->Cell(60,5,$fnsshift,0,0,"L");



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
$pdf->Cell(49,5,Annual,0,0,"L");
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


		$pdf->Cell(50,10,"Subject Name",1);
		$pdf->Cell(20,10,"Full Mark",1,0,"C");
		$pdf->Cell(105,5,$termname1,1,0,"C");
		$pdf->Cell(105,5,$termname2,1,0,"C");
		$pdf->Ln();	
		$pdf->Cell(50,5,"",0);	
		$pdf->Cell(20,5,'',0,0,"C");
		$pdf->Cell(10,5,$type1,1,0,"C");
		$pdf->Cell(10,5,$type2,1,0,"C");
		$pdf->Cell(10,5,$type3,1,0,"C");
		$pdf->Cell(10,5,$type4,1,0,"C");
		$pdf->Cell(10,5,$type5,1,0,"C");
		$pdf->Cell(10,5,$type6,1,0,"C");
		$pdf->Cell(25,5,"Total Mark",1,0,"C");
		$pdf->Cell(10,5,GP,1,0,"C");
		$pdf->Cell(10,5,LG,1,0,"C");
		$pdf->Cell(10,5,$type1,1,0,"C");
		$pdf->Cell(10,5,$type2,1,0,"C");
		$pdf->Cell(10,5,$type3,1,0,"C");
		$pdf->Cell(10,5,$type4,1,0,"C");
		$pdf->Cell(10,5,$type5,1,0,"C");
		$pdf->Cell(10,5,$type6,1,0,"C");
		$pdf->Cell(25,5,"Total Mark",1,0,"C");
		$pdf->Cell(10,5,GP,1,0,"C");
		$pdf->Cell(10,5,LG,1,0,"C");
	
	$pdf->SetFont('Arial','',10);	
		
		


$result = "select * from borno_class6_8_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$termid2' AND borno_school_roll='$gtstotal111' order by subject_id_six_eight asc";
$sl=0;

					$qresult=$mysqli->query($result);
					while($row=$qresult->fetch_assoc()) { $sl++;
	$pdf->Ln();
	//foreach($row as $column)
		
		$stroll=$s1;
		$stN=$row['subject_id_six_eight'];
		$pare=$row['subject_pare'];

		
$resultterm1 = "select * from borno_class6_8_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$termid1' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight='$stN'";


					$qresultterm1=$mysqli->query($resultterm1);
					$rowterm1=$qresultterm1->fetch_assoc();		
		$stN11=$rowterm1['temp_res_number_type1'];
		$stN12=$rowterm1['temp_res_number_type2'];
		$stN13=$rowterm1['temp_res_number_type3'];
		$stN14=$rowterm1['temp_res_number_type4'];
		$stN15=$rowterm1['temp_res_number_type5'];
		$stN16=$rowterm1['temp_res_number_type6'];
		$stName1=$rowterm1['total_mark'];		
	
$resultterm2 = "select * from borno_class6_8_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$termid2' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight='$stN'";


					$qresultterm2=$mysqli->query($resultterm2);
					$rowterm2=$qresultterm2->fetch_assoc();		
		$stN21=$rowterm2['temp_res_number_type1'];
		$stN22=$rowterm2['temp_res_number_type2'];
		$stN23=$rowterm2['temp_res_number_type3'];
		$stN24=$rowterm2['temp_res_number_type4'];
		$stN25=$rowterm2['temp_res_number_type5'];
		$stN26=$rowterm2['temp_res_number_type6'];
		$stName2=$rowterm2['total_mark'];	
				
		$gtsubject ="select * from borno_subject_six_eight where subject_id_six_eight=$stN";
					$qgtsubject=$mysqli->query($gtsubject);
					$stgtsubject=$qgtsubject->fetch_assoc();
					$fsstgtsubject=$stgtsubject['six_eight_subject_name'];

		
		$pdf->Cell(50,5,$fsstgtsubject,1);
		
$gtsubject1 ="select * from borno_set_subject_six_eight where borno_school_class_id=$studClass AND borno_school_id=$schId AND borno_school_session=$stsess AND subject_id_six_eight=$stN";
					$qgtsubject1=$mysqli->query($gtsubject1);
					$stgtsubject1=$qgtsubject1->fetch_assoc();
$fsstgtsubject1=$stgtsubject1['sub_six_eight_fullmark'];
	
$subjectdetails ="select * from borno_result_six_eight_subject_details where borno_school_session='$stsess' AND borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_result_term_id='$termid2' AND subject_id_six_eight='$stN'";
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
		$pdf->Cell(10,5,$stN11,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		if($subtype2!=0)
		{		
		$pdf->Cell(10,5,$stN12,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		if($subtype3!=0)
		{		
		$pdf->Cell(10,5,$stN13,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		if($subtype4!=0)
		{		
		$pdf->Cell(10,5,$stN14,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		if($subtype5!=0)
		{		
		$pdf->Cell(10,5,$stN15,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		if($subtype6!=0)
		{		
		$pdf->Cell(10,5,$stN16,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		

					
		if($pare==1)
		{
		$gtsubjectid ="select * from borno_set_subject_six_eight where borno_school_session='$stsess' AND borno_school_id='$schId' AND borno_school_class_id='$studClass' AND six_eight_subject_pare='1' order by subject_id_six_eight asc limit 0,1";
					$qgtsubjectid=$mysqli->query($gtsubjectid);
					$stqgtsubjectid=$qgtsubjectid->fetch_assoc();
					$fsstgtsubject=$stqgtsubjectid['subject_id_six_eight'];	
		if($stN==$fsstgtsubject)
		{
			
		$gtsgpa ="select * from borno_class6_8_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$termid1' AND borno_school_roll='$gtstotal111' AND pare='1'";
					$qggtsgpa=$mysqli->query($gtsgpa);
					$stgqggtsgpa=$qggtsgpa->fetch_assoc();
		$stNamef1=$stgqggtsgpa['res_total_conv'];			
		$stphone1=$stgqggtsgpa['res_gpa'];
	    $stgp1=$stgqggtsgpa['res_lg'];
					
		$pdf->Cell(11,5,$stName1,1,0,"C");
		$pdf->Cell(14,10,$stNamef1,1,0,"C");
        $pdf->Cell(10,10,$stphone1,1,0,"C");
		$pdf->Cell(10,10,$stgp1,1,0,"C");
		}
		elseif($stN!=$fsstgtsubject)
		{
		$pdf->Cell(11,5,$stName1,1,0,"C");
		$pdf->Cell(14,5,'',0,0,"C");
        $pdf->Cell(10,5,'',0,0,"C");
		$pdf->Cell(10,5,'',0,0,"C");
		}
		}
		elseif($pare==2)
		{
		$gtsubjectid ="select * from borno_set_subject_six_eight where borno_school_session='$stsess' AND borno_school_id='$schId' AND borno_school_class_id='$studClass' AND six_eight_subject_pare='2' order by subject_id_six_eight asc limit 0,1";
					$qgtsubjectid=$mysqli->query($gtsubjectid);
					$stqgtsubjectid=$qgtsubjectid->fetch_assoc();
					$fsstgtsubject=$stqgtsubjectid['subject_id_six_eight'];	
		if($stN==$fsstgtsubject)
		{

		$gtsgpa ="select * from borno_class6_8_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$termid1' AND borno_school_roll='$gtstotal111' AND pare='2'";
					$qggtsgpa=$mysqli->query($gtsgpa);
					$stgqggtsgpa=$qggtsgpa->fetch_assoc();
					
		$stNamef=$stgqggtsgpa['res_total_conv'];			
		$stphone1=$stgqggtsgpa['res_gpa'];
	    $stgp1=$stgqggtsgpa['res_lg'];
					
		$pdf->Cell(11,5,$stName1,1,0,"C");
		$pdf->Cell(14,10,$stNamef,1,0,"C");
		$pdf->Cell(10,10,$stphone1,1,0,"C");
		$pdf->Cell(10,10,$stgp1,1,0,"C");
		}
		elseif($stN!=$fsstgtsubject)
		{
		$pdf->Cell(11,5,$stName1,1,0,"C");
		$pdf->Cell(14,5,'',0,0,"C");
		$pdf->Cell(10,5,'',0,0,"C");
		$pdf->Cell(10,5,'',0,0,"C");
		}
		}
		else
		{
		$gtsgpa ="select * from borno_class6_8_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$termid1' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight='$stN'";
					$qggtsgpa=$mysqli->query($gtsgpa);
					$stgqggtsgpa=$qggtsgpa->fetch_assoc();
					
		$stphone1=$stgqggtsgpa['res_gpa'];
	    $stgp1=$stgqggtsgpa['res_lg'];
		
						
		$pdf->Cell(25,5,$stName1,1,0,"C");
		$pdf->Cell(10,5,$stphone1,1,0,"C");
		$pdf->Cell(10,5,$stgp1,1,0,"C");
}


		if($subtype1!=0)
		{		
		$pdf->Cell(10,5,$stN21,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		if($subtype2!=0)
		{		
		$pdf->Cell(10,5,$stN22,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		if($subtype3!=0)
		{		
		$pdf->Cell(10,5,$stN23,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		if($subtype4!=0)
		{		
		$pdf->Cell(10,5,$stN24,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		if($subtype5!=0)
		{		
		$pdf->Cell(10,5,$stN25,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		if($subtype6!=0)
		{		
		$pdf->Cell(10,5,$stN26,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		

					
		if($pare==1)
		{
		$gtsubjectid ="select * from borno_set_subject_six_eight where borno_school_session='$stsess' AND borno_school_id='$schId' AND borno_school_class_id='$studClass' AND six_eight_subject_pare='1' order by subject_id_six_eight asc limit 0,1";
					$qgtsubjectid=$mysqli->query($gtsubjectid);
					$stqgtsubjectid=$qgtsubjectid->fetch_assoc();
					$fsstgtsubject=$stqgtsubjectid['subject_id_six_eight'];	
		if($stN==$fsstgtsubject)
		{
			
		$gtsgpa ="select * from borno_class6_8_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$termid2' AND borno_school_roll='$gtstotal111' AND pare='1'";
					$qggtsgpa=$mysqli->query($gtsgpa);
					$stgqggtsgpa=$qggtsgpa->fetch_assoc();
		$stNamef2=$stgqggtsgpa['res_total_conv'];			
		$stphone2=$stgqggtsgpa['res_gpa'];
	    $stgp2=$stgqggtsgpa['res_lg'];
					
		$pdf->Cell(11,5,$stName2,1,0,"C");
		$pdf->Cell(14,10,$stNamef2,1,0,"C");
        $pdf->Cell(10,10,$stphone2,1,0,"C");
		$pdf->Cell(10,10,$stgp2,1,0,"C");
		$pdf->Cell(5,5,'',2,0,"C");	
		}
		elseif($stN!=$fsstgtsubject)
		{
		$pdf->Cell(11,5,$stName2,1,0,"C");
		$pdf->Cell(14,5,'',0,0,"C");
        $pdf->Cell(10,5,'',0,0,"C");
		$pdf->Cell(10,5,'',0,0,"C");
		}
		}
		elseif($pare==2)
		{
		$gtsubjectid ="select * from borno_set_subject_six_eight where borno_school_session='$stsess' AND borno_school_id='$schId' AND borno_school_class_id='$studClass' AND six_eight_subject_pare='2' order by subject_id_six_eight asc limit 0,1";
					$qgtsubjectid=$mysqli->query($gtsubjectid);
					$stqgtsubjectid=$qgtsubjectid->fetch_assoc();
					$fsstgtsubject=$stqgtsubjectid['subject_id_six_eight'];	
		if($stN==$fsstgtsubject)
		{

		$gtsgpa ="select * from borno_class6_8_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$termid2' AND borno_school_roll='$gtstotal111' AND pare='2'";
					$qggtsgpa=$mysqli->query($gtsgpa);
					$stgqggtsgpa=$qggtsgpa->fetch_assoc();
					
		$stNamef2=$stgqggtsgpa['res_total_conv'];			
		$stphone2=$stgqggtsgpa['res_gpa'];
	    $stgp2=$stgqggtsgpa['res_lg'];
					
		$pdf->Cell(11,5,$stName2,1,0,"C");
		$pdf->Cell(14,10,$stNamef2,1,0,"C");
		$pdf->Cell(10,10,$stphone2,1,0,"C");
		$pdf->Cell(10,10,$stgp2,1,0,"C");
		$pdf->Cell(5,5,'',2,0,"C");
		}
		elseif($stN!=$fsstgtsubject)
		{
		$pdf->Cell(11,5,$stName2,1,0,"C");
		$pdf->Cell(14,5,'',0,0,"C");
		$pdf->Cell(10,5,'',0,0,"C");
		$pdf->Cell(10,5,'',0,0,"C");
		}
		}
		else
		{
		$gtsgpa ="select * from borno_class6_8_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$termid2' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight='$stN'";
					$qggtsgpa=$mysqli->query($gtsgpa);
					$stgqggtsgpa=$qggtsgpa->fetch_assoc();
					
		$stphone2=$stgqggtsgpa['res_gpa'];
	    $stgp2=$stgqggtsgpa['res_lg'];
		
						
		$pdf->Cell(25,5,$stName2,1,0,"C");
		$pdf->Cell(10,5,$stphone2,1,0,"C");
		$pdf->Cell(10,5,$stgp2,1,0,"C");
}


		
					}

$pdf->Ln();
$pdf->SetFont('Arial','',12);

	


		$pdf->Cell(70,6,"GrandTotal / GPA",1);
		$pdf->Cell(60,6,"",1);
 $gtstotalg1 ="select * from borno_school_6_8_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$termid1 AND borno_school_roll=$gtstotal111";
					$qgtstotalg1=$mysqli->query($gtstotalg1);
					$stggtstotalg1=$qgtstotalg1->fetch_assoc();
$pdf->SetFont('Arial','',12);
$fstotal=$stggtstotalg1['grandtotal'];
$fstotal1=$stggtstotalg1['gpa'];
$fstlg1=$stggtstotalg1['finallg'];


		$pdf->Cell(25,6,$fstotal,1,0,"C");
		$pdf->Cell(20,6,$fstotal1,1,0,"C");

 $gtstotalg2 ="select * from borno_school_6_8_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$termid2 AND borno_school_roll=$gtstotal111";
					$qgtstotalg2=$mysqli->query($gtstotalg2);
					$stggtstotalg2=$qgtstotalg2->fetch_assoc();
$pdf->SetFont('Arial','',12);
$fstotal2=$stggtstotalg2['grandtotal'];
$fstotal12=$stggtstotalg2['gpa'];
$fstlg2=$stggtstotalg2['finallg'];

		$pdf->Cell(60,6,'',1);
		$pdf->Cell(25,6,$fstotal2,1,0,"C");
		$pdf->Cell(20,6,$fstotal12,1,0,"C");

		
 $gtstotalg3 ="select * from borno_school_68_avg_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=0 AND borno_school_roll=$gtstotal111";
					$qgtstotalg3=$mysqli->query($gtstotalg3);
					$stggtstotalg3=$qgtstotalg3->fetch_assoc();
$pdf->SetFont('Arial','',12);
$fstotal3=$stggtstotalg3['grandtotal'];
$fstotal13=$stggtstotalg3['gpa'];
$fstlg3=$stggtstotalg3['finallg'];


	
$pdf->Ln();
$pdf->SetFont('Arial','',12);

	


		
$gtstotal11 ="select * from borno_school_6_8_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$termid1 AND borno_school_roll=$gtstotal111";
					$qgtstotal11=$mysqli->query($gtstotal11);
					$stggtstotal11=$qgtstotal11->fetch_assoc();
$pdf->SetFont('Arial','',12);
$fmerit11=$stggtstotal11['merit_section'];
$fmerit12=$stggtstotal11['merit_shift'];
$fmerit13=$stggtstotal11['merit_class'];

$gtstotal12 ="select * from borno_school_6_8_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$termid2 AND borno_school_roll=$gtstotal111";
					$qgtstotal12=$mysqli->query($gtstotal12);
					$stggtstotal12=$qgtstotal12->fetch_assoc();
$pdf->SetFont('Arial','',12);
$fmerit21=$stggtstotal12['merit_section'];
$fmerit22=$stggtstotal12['merit_shift'];
$fmerit23=$stggtstotal12['merit_class'];

$gtstotal14 ="select * from borno_school_68_avg_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=0 AND borno_school_roll=$gtstotal111";
					$qgtstotal14=$mysqli->query($gtstotal14);
					$stggtstotal14=$qgtstotal14->fetch_assoc();
$pdf->SetFont('Arial','',12);
$fmerit1=$stggtstotal14['merit_section'];
$fmerit2=$stggtstotal14['merit_shift'];
$fmerit3=$stggtstotal14['merit_class'];

$gtstotal1123 ="select * from borno_school_6_8_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$termid1";
	                $qgtstotal1123=$mysqli->query($gtstotal1123);
					$totalstudent1=mysqli_num_rows($qgtstotal1123);
					 
$gtstotal1123t ="select * from borno_school_6_8_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$termid2";
	                $qgtstotal1123t=$mysqli->query($gtstotal1123t);
					$totalstudent2=mysqli_num_rows($qgtstotal1123t);
					
$gtstotalday ="select * from borno_school_schooling_day where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$termid1";
	                $qggtstotalday=$mysqli->query($gtstotalday);
					$stgqggtstotalday=$qggtstotalday->fetch_assoc();
					$schoolingday=$stgqggtstotalday['borno_school_schooling_day'];
					
$gtstotalday1 ="select * from borno_school_schooling_day where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$termid2";
	                $qggtstotalday1=$mysqli->query($gtstotalday1);
					$stgqggtstotalday1=$qggtstotalday1->fetch_assoc();
					$schoolingday1=$stgqggtstotalday1['borno_school_schooling_day'];					
					$publish=$stgqggtstotalday1['borno_school_publish_date'];

$gtsattend ="select * from borno_school_attendence where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$termid1 AND borno_school_roll='$gtstotal111'";
	                $qggtsattend=$mysqli->query($gtsattend);
					$stgqqggtsattend=$qggtsattend->fetch_assoc();
					$presence1=$stgqqggtsattend['borno_school_presence'];
					$absence1=$stgqqggtsattend['borno_school_absence'];	

$gtsattend1 ="select * from borno_school_attendence where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$termid2 AND borno_school_roll='$gtstotal111'";
	                $qggtsattend1=$mysqli->query($gtsattend1);
					$stgqqggtsattend1=$qggtsattend1->fetch_assoc();
					$presence2=$stgqqggtsattend1['borno_school_presence'];
					$absence2=$stgqqggtsattend1['borno_school_absence'];	
					

																			
$pdf->Cell(200,1,'',0,5,"C"); 
$pdf->SetFont('Arial','',9);
$pdf->Cell(25,5,'Exam Name',1,0,"L");
$pdf->Cell(20,5,'Grand Total',1,0,"C");	
$pdf->Cell(10,5,'GPA',1,0,"C");	
$pdf->Cell(12,5,'Grade',1,0,"C");
$pdf->Cell(25,5,'Result Status',1,0,"C");
$pdf->Cell(40,5,"Merit Position in Section",1,0,"C");
$pdf->Cell(35,5,"Merit Position in Shift",1,0,"C");
$pdf->Cell(35,5,"Merit Position in Class",1,0,"C");
$pdf->Cell(23,5,'Total Student',1,0,"C");
$pdf->Cell(23,5,'Working Days',1,0,"C");
$pdf->Cell(16,5,'Presence',1,0,"C");
$pdf->Cell(16,5,'Absence',1,0,"C");	
$pdf->Ln();

$pdf->Cell(25,5,$termname1,1,0,"L");
$pdf->Cell(20,5,$fstotal,1,0,"C");	
$pdf->Cell(10,5,$fstotal1,1,0,"C");	
$pdf->Cell(12,5,$fstlg1,1,0,"C");
if($fstotal1==0)
{
$pdf->Cell(25,5,'Failed',1,0,"C");
}
else
{
 $pdf->Cell(25,5,'Passed',1,0,"C");   
}
$pdf->Cell(40,5,$fmerit11,1,0,"C");
$pdf->Cell(35,5,$fmerit12,1,0,"C");
$pdf->Cell(35,5,$fmerit13,1,0,"C");
$pdf->Cell(23,5,$totalstudent1,1,0,"C");
$pdf->Cell(23,5,$schoolingday,1,0,"C");
$pdf->Cell(16,5,$presence1,1,0,"C");
$pdf->Cell(16,5,$absence1,1,0,"C");	
$pdf->Ln();

$pdf->Cell(25,5,$termname2,1,0,"L");
$pdf->Cell(20,5,$fstotal2,1,0,"C");	
$pdf->Cell(10,5,$fstotal12,1,0,"C");	
$pdf->Cell(12,5,$fstlg2,1,0,"C");
if($fstotal12==0)
{
$pdf->Cell(25,5,'Failed',1,0,"C");
}
else
{
 $pdf->Cell(25,5,'Passed',1,0,"C");   
}
$pdf->Cell(40,5,$fmerit21,1,0,"C");
$pdf->Cell(35,5,$fmerit22,1,0,"C");
$pdf->Cell(35,5,$fmerit23,1,0,"C");
$pdf->Cell(23,5,$totalstudent2,1,0,"C");
$pdf->Cell(23,5,$schoolingday1,1,0,"C");
$pdf->Cell(16,5,$presence2,1,0,"C");
$pdf->Cell(16,5,$absence2,1,0,"C");	
$pdf->Ln();	

$pdf->Cell(25,5,Average,1,0,"L");
$pdf->Cell(20,5,$fstotal3,1,0,"C");	
$pdf->Cell(10,5,$fstotal13,1,0,"C");	
$pdf->Cell(12,5,$fstlg3,1,0,"C");
if($fstotal13==0)
{
$pdf->Cell(25,5,'Failed',1,0,"C");
}
else
{
 $pdf->Cell(25,5,'Passed',1,0,"C");   
}
$pdf->Cell(40,5,$fmerit1,1,0,"C");
$pdf->Cell(35,5,$fmerit2,1,0,"C");
$pdf->Cell(35,5,$fmerit3,1,0,"C");
$pdf->Cell(23,5,$totalstudent2,1,0,"C");
$pdf->Cell(23,5,'-',1,0,"C");
$pdf->Cell(16,5,'-',1,0,"C");
$pdf->Cell(16,5,'-',1,0,"C");	
$pdf->Ln();			
$pdf->Cell(200,1,'',0,5,"C"); 
$pdf->Ln();
$pdf->SetFont('Arial','',8);





$pdf->Ln();	
$pdf->Cell(135,5,"Co-Educational Activities",1,0,"C");
$pdf->Cell(5,5,'',0);
$pdf->Cell(140,5,"Opinion about Result (Filled up by Class Teacher)",1,0,"C");
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
$pdf->Cell(5,5,'',0);
$pdf->Cell(140,15,'',1,0,"C");
$pdf->Cell(1,5,'',2,0,"C");
$pdf->Ln();	
$pdf->Cell(135,5,"Bahaviour",1,0,"C");
$pdf->Ln();	
$pdf->Cell(25,5,"Excellent",1);
$pdf->Cell(8,5,'',1);
$pdf->Cell(25,5,"Very Good",1);
$pdf->Cell(8,5,'',1);
$pdf->Cell(20,5,"Good",1);
$pdf->Cell(8,5,'',1);
$pdf->Cell(33,5,"Need To Improve",1);
$pdf->Cell(8,5,'',1);
$pdf->Ln();	






$pdf->AddPage('L');
}
}


else
{
$result23 ="select * from borno_school_play_5_avg_merit where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='0' AND borno_school_roll between '$rollf' AND '$rollt' order by borno_school_roll asc";
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
$pdf->Cell(220,2,"Branch : $fnsbranch",0,0,"C");



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
$pdf->Cell(10,5,"Roll :",0,0,"L");
$pdf->SetFont('Arial','I',10);
$pdf->Cell(70,5,$gtstotal111,0,0,"L");
$pdf->SetFont('Arial','',10);
$pdf->Cell(12,5,"Class :",0,0,"L");
$pdf->SetFont('Arial','I',10);
$pdf->Cell(58,5,$fnsclass,0,0,"L");
$pdf->SetFont('Arial','',10);
$pdf->Cell(10,5,"Shift :",0,0,"L");
$pdf->SetFont('Arial','I',10);
$pdf->Cell(60,5,$fnsshift,0,0,"L");



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
$pdf->Cell(49,5,Annual,0,0,"L");
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


		$pdf->Cell(50,10,"Subject Name",1);
		$pdf->Cell(20,10,"Full Mark",1,0,"C");
		$pdf->Cell(105,5,$termname1,1,0,"C");
		$pdf->Cell(105,5,$termname2,1,0,"C");
		$pdf->Ln();	
		$pdf->Cell(50,5,"",0);	
		$pdf->Cell(20,5,'',0,0,"C");
		$pdf->Cell(10,5,$type1,1,0,"C");
		$pdf->Cell(10,5,$type2,1,0,"C");
		$pdf->Cell(10,5,$type3,1,0,"C");
		$pdf->Cell(10,5,$type4,1,0,"C");
		$pdf->Cell(10,5,$type5,1,0,"C");
		$pdf->Cell(10,5,$type6,1,0,"C");
		$pdf->Cell(25,5,"Total Mark",1,0,"C");
		$pdf->Cell(10,5,GP,1,0,"C");
		$pdf->Cell(10,5,LG,1,0,"C");
		$pdf->Cell(10,5,$type1,1,0,"C");
		$pdf->Cell(10,5,$type2,1,0,"C");
		$pdf->Cell(10,5,$type3,1,0,"C");
		$pdf->Cell(10,5,$type4,1,0,"C");
		$pdf->Cell(10,5,$type5,1,0,"C");
		$pdf->Cell(10,5,$type6,1,0,"C");
		$pdf->Cell(25,5,"Total Mark",1,0,"C");
		$pdf->Cell(10,5,GP,1,0,"C");
		$pdf->Cell(10,5,LG,1,0,"C");
	
	$pdf->SetFont('Arial','',10);	
		
		


$result = "select * from borno_class1_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$termid2' AND borno_school_roll='$gtstotal111' order by borno_result_subject_id asc";
$sl=0;

					$qresult=$mysqli->query($result);
					while($row=$qresult->fetch_assoc()) { $sl++;
	$pdf->Ln();
	//foreach($row as $column)
		
		$stroll=$s1;
		$stN=$row['borno_result_subject_id'];
		$pare=$row['pare'];

		
$resultterm1 = "select * from borno_class1_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$termid1' AND borno_school_roll='$gtstotal111' AND borno_result_subject_id='$stN'";


					$qresultterm1=$mysqli->query($resultterm1);
					$rowterm1=$qresultterm1->fetch_assoc();		
		$stN11=$rowterm1['temp_res_number_type1'];
		$stN12=$rowterm1['temp_res_number_type2'];
		$stN13=$rowterm1['temp_res_number_type3'];
		$stN14=$rowterm1['temp_res_number_type4'];
		$stN15=$rowterm1['temp_res_number_type5'];
		$stN16=$rowterm1['temp_res_number_type6'];
		$stName1=$rowterm1['totalmark'];		
	
$resultterm2 = "select * from borno_class1_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$termid2' AND borno_school_roll='$gtstotal111' AND borno_result_subject_id='$stN'";


					$qresultterm2=$mysqli->query($resultterm2);
					$rowterm2=$qresultterm2->fetch_assoc();		
		$stN21=$rowterm2['temp_res_number_type1'];
		$stN22=$rowterm2['temp_res_number_type2'];
		$stN23=$rowterm2['temp_res_number_type3'];
		$stN24=$rowterm2['temp_res_number_type4'];
		$stN25=$rowterm2['temp_res_number_type5'];
		$stN26=$rowterm2['temp_res_number_type6'];
		$stName2=$rowterm2['totalmark'];	
				
		$gtsubject ="select * from borno_result_subject where borno_school_class_id=$studClass AND borno_school_id=$schId AND borno_school_session=$stsess AND borno_result_subject_id=$stN";
					$qgtsubject=$mysqli->query($gtsubject);
					$stgtsubject=$qgtsubject->fetch_assoc();
					$fsstgtsubject=$stgtsubject['borno_school_subject_name'];

		
		$pdf->Cell(50,5,$fsstgtsubject,1);
		
$gtsubject1 ="select * from borno_result_subject where borno_school_class_id=$studClass AND borno_school_id=$schId AND borno_school_session=$stsess AND borno_result_subject_id=$stN";
					$qgtsubject1=$mysqli->query($gtsubject1);
					$stgtsubject1=$qgtsubject1->fetch_assoc();
$fsstgtsubject1=$stgtsubject1['borno_school_subject_fullmark'];
	
$subjectdetails ="select * from borno_result_subject_details where borno_school_session='$stsess' AND borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_result_term_id='$termid2' AND borno_result_subject_id='$stN'";
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
		$pdf->Cell(10,5,$stN11,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		if($subtype2!=0)
		{		
		$pdf->Cell(10,5,$stN12,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		if($subtype3!=0)
		{		
		$pdf->Cell(10,5,$stN13,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		if($subtype4!=0)
		{		
		$pdf->Cell(10,5,$stN14,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		if($subtype5!=0)
		{		
		$pdf->Cell(10,5,$stN15,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		if($subtype6!=0)
		{		
		$pdf->Cell(10,5,$stN16,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		

					
		if($pare==1)
		{
		$gtsubjectid ="select * from borno_result_subject_details where borno_school_session='$stsess' AND borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_result_term_id='$termid1' AND pare='1' order by borno_result_subject_id asc limit 0,1";
					$qgtsubjectid=$mysqli->query($gtsubjectid);
					$stqgtsubjectid=$qgtsubjectid->fetch_assoc();
					$fsstgtsubject=$stqgtsubjectid['borno_result_subject_id'];	
		if($stN==$fsstgtsubject)
		{
			
		$gtsgpa ="select * from borno_class1_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$termid1' AND borno_school_roll='$gtstotal111' AND pare='1'";
					$qggtsgpa=$mysqli->query($gtsgpa);
					$stgqggtsgpa=$qggtsgpa->fetch_assoc();
		$stNamef1=$stgqggtsgpa['res_total_conv'];			
		$stphone1=$stgqggtsgpa['res_gpa'];
	    $stgp1=$stgqggtsgpa['res_lg'];
					
		$pdf->Cell(11,5,$stName1,1,0,"C");
		$pdf->Cell(14,10,$stNamef1,1,0,"C");
        $pdf->Cell(10,10,$stphone1,1,0,"C");
		$pdf->Cell(10,10,$stgp1,1,0,"C");
		}
		elseif($stN!=$fsstgtsubject)
		{
		$pdf->Cell(11,5,$stName1,1,0,"C");
		$pdf->Cell(14,5,'',0,0,"C");
        $pdf->Cell(10,5,'',0,0,"C");
		$pdf->Cell(10,5,'',0,0,"C");
		}
		}
		elseif($pare==2)
		{
		$gtsubjectid ="select * from borno_result_subject_details where borno_school_session='$stsess' AND borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_result_term_id='$termid1' AND pare='2' order by borno_result_subject_id asc limit 0,1";
					$qgtsubjectid=$mysqli->query($gtsubjectid);
					$stqgtsubjectid=$qgtsubjectid->fetch_assoc();
					$fsstgtsubject=$stqgtsubjectid['borno_result_subject_id'];	
		if($stN==$fsstgtsubject)
		{

		$gtsgpa ="select * from borno_class1_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$termid1' AND borno_school_roll='$gtstotal111' AND pare='2'";
					$qggtsgpa=$mysqli->query($gtsgpa);
					$stgqggtsgpa=$qggtsgpa->fetch_assoc();
					
		$stNamef=$stgqggtsgpa['res_total_conv'];			
		$stphone1=$stgqggtsgpa['res_gpa'];
	    $stgp1=$stgqggtsgpa['res_lg'];
					
		$pdf->Cell(11,5,$stName1,1,0,"C");
		$pdf->Cell(14,10,$stNamef,1,0,"C");
		$pdf->Cell(10,10,$stphone1,1,0,"C");
		$pdf->Cell(10,10,$stgp1,1,0,"C");
		}
		elseif($stN!=$fsstgtsubject)
		{
		$pdf->Cell(11,5,$stName1,1,0,"C");
		$pdf->Cell(14,5,'',0,0,"C");
		$pdf->Cell(10,5,'',0,0,"C");
		$pdf->Cell(10,5,'',0,0,"C");
		}
		}
		else
		{
		$gtsgpa ="select * from borno_class1_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$termid1' AND borno_school_roll='$gtstotal111' AND borno_result_subject_id='$stN'";
					$qggtsgpa=$mysqli->query($gtsgpa);
					$stgqggtsgpa=$qggtsgpa->fetch_assoc();
					
		$stphone1=$stgqggtsgpa['res_gpa'];
	    $stgp1=$stgqggtsgpa['res_lg'];
		
						
		$pdf->Cell(25,5,$stName1,1,0,"C");
		$pdf->Cell(10,5,$stphone1,1,0,"C");
		$pdf->Cell(10,5,$stgp1,1,0,"C");
}


		if($subtype1!=0)
		{		
		$pdf->Cell(10,5,$stN21,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		if($subtype2!=0)
		{		
		$pdf->Cell(10,5,$stN22,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		if($subtype3!=0)
		{		
		$pdf->Cell(10,5,$stN23,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		if($subtype4!=0)
		{		
		$pdf->Cell(10,5,$stN24,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		if($subtype5!=0)
		{		
		$pdf->Cell(10,5,$stN25,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		if($subtype6!=0)
		{		
		$pdf->Cell(10,5,$stN26,1,0,"C");
		}
		else
		{
		$pdf->Cell(10,5,'-',1,0,"C");
		}
		

					
		if($pare==1)
		{
		$gtsubjectid ="select * from borno_result_subject_details where borno_school_session='$stsess' AND borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_result_term_id='$termid2' AND pare='1' order by borno_result_subject_id asc limit 0,1";
					$qgtsubjectid=$mysqli->query($gtsubjectid);
					$stqgtsubjectid=$qgtsubjectid->fetch_assoc();
					$fsstgtsubject=$stqgtsubjectid['borno_result_subject_id'];	
		if($stN==$fsstgtsubject)
		{
			
		$gtsgpa ="select * from borno_class1_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$termid2' AND borno_school_roll='$gtstotal111' AND pare='1'";
					$qggtsgpa=$mysqli->query($gtsgpa);
					$stgqggtsgpa=$qggtsgpa->fetch_assoc();
		$stNamef2=$stgqggtsgpa['res_total_conv'];			
		$stphone2=$stgqggtsgpa['res_gpa'];
	    $stgp2=$stgqggtsgpa['res_lg'];
					
		$pdf->Cell(11,5,$stName2,1,0,"C");
		$pdf->Cell(14,10,$stNamef2,1,0,"C");
        $pdf->Cell(10,10,$stphone2,1,0,"C");
		$pdf->Cell(10,10,$stgp2,1,0,"C");
		$pdf->Cell(5,5,'',2,0,"C");	
		}
		elseif($stN!=$fsstgtsubject)
		{
		$pdf->Cell(11,5,$stName2,1,0,"C");
		$pdf->Cell(14,5,'',0,0,"C");
        $pdf->Cell(10,5,'',0,0,"C");
		$pdf->Cell(10,5,'',0,0,"C");
		}
		}
		elseif($pare==2)
		{
		$gtsubjectid ="select * from borno_result_subject_details where borno_school_session='$stsess' AND borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_result_term_id='$termid2' AND pare='2' order by borno_result_subject_id asc limit 0,1";
					$qgtsubjectid=$mysqli->query($gtsubjectid);
					$stqgtsubjectid=$qgtsubjectid->fetch_assoc();
					$fsstgtsubject=$stqgtsubjectid['borno_result_subject_id'];	
		if($stN==$fsstgtsubject)
		{

		$gtsgpa ="select * from borno_class1_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$termid2' AND borno_school_roll='$gtstotal111' AND pare='2'";
					$qggtsgpa=$mysqli->query($gtsgpa);
					$stgqggtsgpa=$qggtsgpa->fetch_assoc();
					
		$stNamef2=$stgqggtsgpa['res_total_conv'];			
		$stphone2=$stgqggtsgpa['res_gpa'];
	    $stgp2=$stgqggtsgpa['res_lg'];
					
		$pdf->Cell(11,5,$stName2,1,0,"C");
		$pdf->Cell(14,10,$stNamef2,1,0,"C");
		$pdf->Cell(10,10,$stphone2,1,0,"C");
		$pdf->Cell(10,10,$stgp2,1,0,"C");
		$pdf->Cell(5,5,'',2,0,"C");
		}
		elseif($stN!=$fsstgtsubject)
		{
		$pdf->Cell(11,5,$stName2,1,0,"C");
		$pdf->Cell(14,5,'',0,0,"C");
		$pdf->Cell(10,5,'',0,0,"C");
		$pdf->Cell(10,5,'',0,0,"C");
		}
		}
		else
		{
		$gtsgpa ="select * from borno_class1_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$termid2' AND borno_school_roll='$gtstotal111' AND borno_result_subject_id='$stN'";
					$qggtsgpa=$mysqli->query($gtsgpa);
					$stgqggtsgpa=$qggtsgpa->fetch_assoc();
					
		$stphone2=$stgqggtsgpa['res_gpa'];
	    $stgp2=$stgqggtsgpa['res_lg'];
		
						
		$pdf->Cell(25,5,$stName2,1,0,"C");
		$pdf->Cell(10,5,$stphone2,1,0,"C");
		$pdf->Cell(10,5,$stgp2,1,0,"C");
}


		
					}

$pdf->Ln();
$pdf->SetFont('Arial','',12);

	


		$pdf->Cell(70,6,"GrandTotal / GPA",1);
		$pdf->Cell(60,6,"",1);
 $gtstotalg1 ="select * from borno_school_play_5_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$termid1 AND borno_school_roll=$gtstotal111";
					$qgtstotalg1=$mysqli->query($gtstotalg1);
					$stggtstotalg1=$qgtstotalg1->fetch_assoc();
$pdf->SetFont('Arial','',12);
$fstotal=$stggtstotalg1['grandtotal'];
$fstotal1=$stggtstotalg1['gpa'];
$fstlg1=$stggtstotalg1['finallg'];


		$pdf->Cell(25,6,$fstotal,1,0,"C");
		$pdf->Cell(20,6,$fstotal1,1,0,"C");

 $gtstotalg2 ="select * from borno_school_play_5_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$termid2 AND borno_school_roll=$gtstotal111";
					$qgtstotalg2=$mysqli->query($gtstotalg2);
					$stggtstotalg2=$qgtstotalg2->fetch_assoc();
$pdf->SetFont('Arial','',12);
$fstotal2=$stggtstotalg2['grandtotal'];
$fstotal12=$stggtstotalg2['gpa'];
$fstlg2=$stggtstotalg2['finallg'];

		$pdf->Cell(60,6,'',1);
		$pdf->Cell(25,6,$fstotal2,1,0,"C");
		$pdf->Cell(20,6,$fstotal12,1,0,"C");

		
 $gtstotalg3 ="select * from borno_school_play_5_avg_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=0 AND borno_school_roll=$gtstotal111";
					$qgtstotalg3=$mysqli->query($gtstotalg3);
					$stggtstotalg3=$qgtstotalg3->fetch_assoc();
$pdf->SetFont('Arial','',12);
$fstotal3=$stggtstotalg3['grandtotal'];
$fstotal13=$stggtstotalg3['gpa'];
$fstlg3=$stggtstotalg3['finallg'];


	
$pdf->Ln();
$pdf->SetFont('Arial','',12);

	


		
$gtstotal11 ="select * from borno_school_play_5_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$termid1 AND borno_school_roll=$gtstotal111";
					$qgtstotal11=$mysqli->query($gtstotal11);
					$stggtstotal11=$qgtstotal11->fetch_assoc();
$pdf->SetFont('Arial','',12);
$fmerit11=$stggtstotal11['merit_section'];
$fmerit12=$stggtstotal11['merit_shift'];
$fmerit13=$stggtstotal11['merit_class'];

$gtstotal12 ="select * from borno_school_play_5_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$termid2 AND borno_school_roll=$gtstotal111";
					$qgtstotal12=$mysqli->query($gtstotal12);
					$stggtstotal12=$qgtstotal12->fetch_assoc();
$pdf->SetFont('Arial','',12);
$fmerit21=$stggtstotal12['merit_section'];
$fmerit22=$stggtstotal12['merit_shift'];
$fmerit23=$stggtstotal12['merit_class'];

$gtstotal14 ="select * from borno_school_play_5_avg_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=0 AND borno_school_roll=$gtstotal111";
					$qgtstotal14=$mysqli->query($gtstotal14);
					$stggtstotal14=$qgtstotal14->fetch_assoc();
$pdf->SetFont('Arial','',12);
$fmerit1=$stggtstotal14['merit_section'];
$fmerit2=$stggtstotal14['merit_shift'];
$fmerit3=$stggtstotal14['merit_class'];

$gtstotal1123 ="select * from borno_school_play_5_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$termid1";
	                $qgtstotal1123=$mysqli->query($gtstotal1123);
					$totalstudent1=mysqli_num_rows($qgtstotal1123);
					 
$gtstotal1123t ="select * from borno_school_play_5_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$termid2";
	                $qgtstotal1123t=$mysqli->query($gtstotal1123t);
					$totalstudent2=mysqli_num_rows($qgtstotal1123t);
					
$gtstotalday ="select * from borno_school_schooling_day where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$termid1";
	                $qggtstotalday=$mysqli->query($gtstotalday);
					$stgqggtstotalday=$qggtstotalday->fetch_assoc();
					$schoolingday=$stgqggtstotalday['borno_school_schooling_day'];
					
$gtstotalday1 ="select * from borno_school_schooling_day where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$termid2";
	                $qggtstotalday1=$mysqli->query($gtstotalday1);
					$stgqggtstotalday1=$qggtstotalday1->fetch_assoc();
					$schoolingday1=$stgqggtstotalday1['borno_school_schooling_day'];					
					$publish=$stgqggtstotalday1['borno_school_publish_date'];

$gtsattend ="select * from borno_school_attendence where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$termid1 AND borno_school_roll='$gtstotal111'";
	                $qggtsattend=$mysqli->query($gtsattend);
					$stgqqggtsattend=$qggtsattend->fetch_assoc();
					$presence1=$stgqqggtsattend['borno_school_presence'];
					$absence1=$stgqqggtsattend['borno_school_absence'];	

$gtsattend1 ="select * from borno_school_attendence where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$termid2 AND borno_school_roll='$gtstotal111'";
	                $qggtsattend1=$mysqli->query($gtsattend1);
					$stgqqggtsattend1=$qggtsattend1->fetch_assoc();
					$presence2=$stgqqggtsattend1['borno_school_presence'];
					$absence2=$stgqqggtsattend1['borno_school_absence'];	
					

																			
$pdf->Cell(200,1,'',0,5,"C"); 
$pdf->SetFont('Arial','',9);
$pdf->Cell(25,5,'Exam Name',1,0,"L");
$pdf->Cell(20,5,'Grand Total',1,0,"C");	
$pdf->Cell(10,5,'GPA',1,0,"C");	
$pdf->Cell(12,5,'Grade',1,0,"C");
$pdf->Cell(25,5,'Result Status',1,0,"C");
$pdf->Cell(40,5,"Merit Position in Section",1,0,"C");
$pdf->Cell(35,5,"Merit Position in Shift",1,0,"C");
$pdf->Cell(35,5,"Merit Position in Class",1,0,"C");
$pdf->Cell(23,5,'Total Student',1,0,"C");
$pdf->Cell(23,5,'Working Days',1,0,"C");
$pdf->Cell(16,5,'Presence',1,0,"C");
$pdf->Cell(16,5,'Absence',1,0,"C");	
$pdf->Ln();

$pdf->Cell(25,5,$termname1,1,0,"L");
$pdf->Cell(20,5,$fstotal,1,0,"C");	
$pdf->Cell(10,5,$fstotal1,1,0,"C");	
$pdf->Cell(12,5,$fstlg1,1,0,"C");
if($fstotal1==0)
{
$pdf->Cell(25,5,'Failed',1,0,"C");
}
else
{
 $pdf->Cell(25,5,'Passed',1,0,"C");   
}
$pdf->Cell(40,5,$fmerit1,1,0,"C");
$pdf->Cell(35,5,$fmerit2,1,0,"C");
$pdf->Cell(35,5,$fmerit3,1,0,"C");
$pdf->Cell(23,5,$totalstudent1,1,0,"C");
$pdf->Cell(23,5,$schoolingday,1,0,"C");
$pdf->Cell(16,5,$presence1,1,0,"C");
$pdf->Cell(16,5,$absence1,1,0,"C");	
$pdf->Ln();

$pdf->Cell(25,5,$termname2,1,0,"L");
$pdf->Cell(20,5,$fstotal2,1,0,"C");	
$pdf->Cell(10,5,$fstotal12,1,0,"C");	
$pdf->Cell(12,5,$fstlg2,1,0,"C");
if($fstotal12==0)
{
$pdf->Cell(25,5,'Failed',1,0,"C");
}
else
{
 $pdf->Cell(25,5,'Passed',1,0,"C");   
}
$pdf->Cell(40,5,$fmerit1,1,0,"C");
$pdf->Cell(35,5,$fmerit2,1,0,"C");
$pdf->Cell(35,5,$fmerit3,1,0,"C");
$pdf->Cell(23,5,$totalstudent2,1,0,"C");
$pdf->Cell(23,5,$schoolingday1,1,0,"C");
$pdf->Cell(16,5,$presence2,1,0,"C");
$pdf->Cell(16,5,$absence2,1,0,"C");	
$pdf->Ln();	

$pdf->Cell(25,5,Average,1,0,"L");
$pdf->Cell(20,5,$fstotal3,1,0,"C");	
$pdf->Cell(10,5,$fstotal13,1,0,"C");	
$pdf->Cell(12,5,$fstlg3,1,0,"C");
if($fstotal13==0)
{
$pdf->Cell(25,5,'Failed',1,0,"C");
}
else
{
 $pdf->Cell(25,5,'Passed',1,0,"C");   
}
$pdf->Cell(40,5,$fmerit1,1,0,"C");
$pdf->Cell(35,5,$fmerit2,1,0,"C");
$pdf->Cell(35,5,$fmerit3,1,0,"C");
$pdf->Cell(23,5,$totalstudent2,1,0,"C");
$pdf->Cell(23,5,'-',1,0,"C");
$pdf->Cell(16,5,'-',1,0,"C");
$pdf->Cell(16,5,'-',1,0,"C");	
$pdf->Ln();			
$pdf->Cell(200,1,'',0,5,"C"); 
$pdf->Ln();
$pdf->SetFont('Arial','',8);





$pdf->Ln();	
$pdf->Cell(135,5,"Co-Educational Activities",1,0,"C");
$pdf->Cell(5,5,'',0);
$pdf->Cell(140,5,"Opinion about Result (Filled up by Class Teacher)",1,0,"C");
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
$pdf->Cell(5,5,'',0);
$pdf->Cell(140,15,'',1,0,"C");
$pdf->Cell(1,5,'',2,0,"C");
$pdf->Ln();	
$pdf->Cell(135,5,"Bahaviour",1,0,"C");
$pdf->Ln();	
$pdf->Cell(25,5,"Excellent",1);
$pdf->Cell(8,5,'',1);
$pdf->Cell(25,5,"Very Good",1);
$pdf->Cell(8,5,'',1);
$pdf->Cell(20,5,"Good",1);
$pdf->Cell(8,5,'',1);
$pdf->Cell(33,5,"Need To Improve",1);
$pdf->Cell(8,5,'',1);
$pdf->Ln();	






$pdf->AddPage('L');
}
}
$pdf->Output();
?>