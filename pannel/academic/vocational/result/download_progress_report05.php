<?php
$branchId=$_GET['stbranch'];
$schId=$_GET['schoolId'];
$studClass=$_GET['classId'];
$shiftId=$_GET['shiftId'];
$section=$_GET['sectionId'];
$stsess=$_GET['scsess'];
$term=$_GET['sctermId'];
$group=$_GET['group'];

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

$gtgpa="SELECT * FROM borno_result_add_term_voc where borno_result_term_id=$term";
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


$result23 ="select * from borno_school_9_10voc_merit where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_stud_group='$group'  group by borno_school_roll asc";
$sl=0;
					$qgresult23=$mysqli->query($result23);
					while($row23=$qgresult23->fetch_assoc()){ $sl++;

					$gtstotal111=$row23['borno_school_roll'];




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
$pdf->Cell(220,2,"Branch : $fnsbranch",0,0,"C");



$pdf->SetFont('Arial','',7); 
$result1 ="select * from borno_grading_chart_voc where borno_school_session='$stsess' AND borno_school_id='$schId' AND borno_school_class_id=$studClass";

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
	
	
	
$gtstname ="select * from borno_student_info where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111'";

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
$pdf->Cell(80,5,"Trade : $group",0,0,"L");
$pdf->Ln();
$pdf->SetFont('Arial','',10);
$numbertype ="select * from borno_result_number_type_voc where borno_school_session='$stsess' AND borno_school_id='$schId' AND borno_school_class_id='$studClass'";
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

		
		
		


$result = "select * from borno_class9_10voc_temp_mark1 where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' order by borno_subject_nine_ten_id asc";
$sl=0;

					$qresult=$mysqli->query($result);
					while($row=$qresult->fetch_assoc()) { $sl++;
	$pdf->Ln();
	//foreach($row as $column)
		
		$stroll=$s1;
		$stN=$row['borno_subject_nine_ten_id'];
		$stN1=$row['temp_res_number_type1'];
		$stN2=$row['temp_res_number_type2'];
		$stN3=$row['temp_res_number_type3'];
		$stN4=$row['temp_res_number_type4'];
		$stN5=$row['temp_res_number_type5'];
		$stN6=$row['temp_res_number_type6'];


$gtstotal ="select * from borno_class9_10voc_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id=$stN";
					$qgtstotal=$mysqli->query($gtstotal);
					$sqgtstotal=$qgtstotal->fetch_assoc();
					$stName=$sqgtstotal['res_total_conv'];
					$stphone=$sqgtstotal['res_gpa'];
					$stgp=$sqgtstotal['res_lg'];	
						
		
		
	
		$gtsubject ="select * from borno_result_subject_voc where borno_result_subject_voc_id=$stN";
					$qgtsubject=$mysqli->query($gtsubject);
					$stgtsubject=$qgtsubject->fetch_assoc();
					$fsstgtsubject=$stgtsubject['borno_school_subject_name'];
					$fsstgtsubject1=$stgtsubject['borno_school_subject_fullmark'];	
		
		$pdf->Cell(60,5,$fsstgtsubject,1);
		

$subjectdetails ="select * from borno_result_subject_details_voc where borno_school_session='$stsess' AND borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_result_term_id='$term' AND borno_result_trade='$group' AND borno_result_subject_id='$stN'";
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
		
		
		
		
		
		
		
$result22 = "select * from borno_height_mark_class9_10_voc where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_subject_nine_ten_id=$stN";
					$qresult22=$mysqli->query($result22);
					$row22=$qresult22->fetch_assoc();
				$fssthigh=$row22['getmaxmark'];	

        
		
		
		$pdf->Cell(20,5,$stName,1,0,"C");	
		$pdf->Cell(30,5,$fssthigh,1,0,"C");	
		$pdf->Cell(15,5,$stphone,1,0,"C");
		$pdf->Cell(15,5,$stgp,1,0,"C");
		
}

$pdf->Ln();
$pdf->SetFont('Arial','',12);

	


		$pdf->Cell(200,6,"GrandTotal / GPA With 4th Subject",1);
$gtstotal ="select * from borno_school_9_10voc_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term AND borno_school_stud_group='$group' AND borno_school_roll=$gtstotal111";
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
$gt4th="select * from borno_class9_10voc_final_result where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term AND borno_school_stud_group='$group' AND borno_school_roll=$gtstotal111 AND stu4thsub=1";
					$qgt4th=$mysqli->query($gt4th);
					$stqgt4th=$qgt4th->fetch_assoc();
					$sub4th=$stqgt4th['borno_subject_nine_ten_id'];
if($sub4th!="")
{						
$gtsubject12 ="select * from borno_result_subject_voc where borno_result_subject_voc_id=$sub4th";
					$qgtsubject12=$mysqli->query($gtsubject12);
					$stqgtsubject12=$qgtsubject12->fetch_assoc();
					$fsstgtsubject4th=$stqgtsubject12['borno_school_subject_name'];					
$pdf->SetFont('Arial','B',12);					
$pdf->Cell(280,6,"4th Subject Name : $fsstgtsubject4th",1);
}
else
{
				
$pdf->Cell(280,6,"4th Subject Name : ",1);
}
$pdf->Ln();	


$pdf->SetFont('Arial','',12);

	


		
$gtstotal1 ="select * from borno_school_9_10voc_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term AND borno_school_stud_group='$group' AND borno_school_roll=$gtstotal111";
					$qgtstotal1=$mysqli->query($gtstotal1);
					$stggtstotal1=$qgtstotal1->fetch_assoc();
$pdf->SetFont('Arial','',12);
$fmerit1=$stggtstotal1['merit_section'];
$fmerit2=$stggtstotal1['merit_shift'];
$fmerit3=$stggtstotal1['merit_class'];


		$pdf->Cell(60,6,"Merit Position in Section",1);
		$pdf->Cell(20,6,$fmerit1,1,0,"C");
		$pdf->Cell(60,6,"Merit Position in Shift",1);
		$pdf->Cell(20,6,$fmerit2,1,0,"C");
		$pdf->Cell(60,6,"Merit Position in Class",1);
		$pdf->Cell(20,6,$fmerit3,1,0,"C");
		$pdf->Cell(40,6,'',1,0,"C");
		$pdf->Ln();
		$pdf->Cell(280,6,"Opinion about Result (Filled up by Class Teacher)",1,0,"C");
		$pdf->Ln();
		$pdf->Cell(280,18,'',1);

$pdf->Ln();
$pdf->Cell(200,1,'',0,5,"C"); 
$pdf->Ln();
$pdf->SetFont('Arial','',8);
$gtstotal1123 ="select * from borno_school_9_10voc_merit where borno_school_class_id=$studClass AND borno_school_branch_id=$branchId AND borno_school_id=$schId AND borno_school_shift_id=$shiftId AND borno_school_section_id=$section AND borno_school_session=$stsess AND borno_result_term_id=$term AND borno_school_stud_group='$group'";
	                $qgtstotal1123=$mysqli->query($gtstotal1123);
					$totalstudent=mysqli_num_rows($qgtstotal1123); 
$pdf->Cell(25,5,"Total Students",1);
$pdf->Cell(15,5,$totalstudent,1,0,"C");
$pdf->Cell(25,5,"Schooling Day",1);
$pdf->Cell(10,5,'',1);
$pdf->Cell(20,5,"Presence",1);
$pdf->Cell(10,5,'',1);
$pdf->Cell(20,5,"Absence",1);
$pdf->Cell(10,5,'',1);
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







$pdf->AddPage('L');
}

$pdf->Output();
?>