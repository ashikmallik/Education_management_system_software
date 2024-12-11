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

$gtterm="SELECT * FROM modeltest_add_term where borno_result_term_id=$term";
					$qgtterm=$mysqli->query($gtterm);
					$sqgtterm=$qgtterm->fetch_assoc();
$fnsterm=$sqgtterm['borno_result_term_name'];

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
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8

	$this->SetFont('Arial','',8);
	$this->Ln();
	$date=date('d-m-Y');
	$time=date('h:i:s');
	$this->Cell(90,5,"Print Date & Time : $date $time",0,0,"L"); 
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'R');
}
}


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

					$gtschoolName="SELECT * FROM borno_school where borno_school_id=$schId";
					$qgtschoolName=$mysqli->query($gtschoolName);
					$sqgtschoolName=$qgtschoolName->fetch_assoc();

$pdf->SetFont('Arial','',20);
$fnschname=$sqgtschoolName['borno_school_name'];
$pdf->Cell(200,2,$fnschname,0,5,"C");

$pdf->SetFont('Arial','',14); 
$pdf->Cell(200,5,'',0,5,"C"); 
$pdf->Cell(200,5,'Merit Summary',0,5,"C");
if($studClass==1 OR $studClass==2)
{
if($group==1)   
{
$pdf->Cell(200,5,"Department : Science",0,5,"C");
}
elseif($group==2)   
{
$pdf->Cell(200,5,"Department : Business Studies",0,5,"C");
} 
elseif($group==3)   
{
$pdf->Cell(200,5,"Department : Humanities",0,5,"C");
}  
}
else
{
$pdf->Cell(200,5,'',0,5,"C");
}
$pdf->SetFont('Arial','',12); 
$pdf->Cell(200,5,"Branch : $fnsbranch Class : $fnsclass Shift : $fnsshift Section : $fnssection Session : $stsess Term : $fnsterm",0,5,"L"); 
$pdf->Cell(200,1,'',0,5,"C"); 
$pdf->SetFont('Arial','',10);
		
		$result1 ="select * from borno_grading_chart where borno_school_session='$stsess' AND borno_school_id='$schId' AND borno_school_class_id=$studClass";

					$qresult1=$mysqli->query($result1);
					$row1=$qresult1->fetch_assoc();
	
		$lg1=$row1['letter_grade1'];
		$lg2=$row1['letter_grade2'];
		$lg3=$row1['letter_grade3'];
		$lg4=$row1['letter_grade4'];
		$lg5=$row1['letter_grade5'];
		$lg6=$row1['letter_grade6'];
		$lg7=$row1['letter_grade7'];		
		
		



		$pdf->Cell(100,5,"Subject Name",1,0,"L");
		$pdf->Cell(20,5,'Appeard',1,0,"C");
		$pdf->Cell(10,5,$lg1,1,0,"C");
		$pdf->Cell(10,5,$lg2,1,0,"C");
		$pdf->Cell(10,5,$lg3,1,0,"C");
		$pdf->Cell(10,5,$lg4,1,0,"C");
		$pdf->Cell(10,5,$lg5,1,0,"C");
		$pdf->Cell(10,5,$lg6,1,0,"C");
		$pdf->Cell(10,5,$lg7,1,0,"C");

				$pdf->Ln();

if($studClass==1 OR $studClass==2)
{	
$gttotaldelete="delete from borno_school_summary where empty='0'";
					$qgttotaldel=$mysqli->query($gttotaldelete);
					
$gttotal="select * from modeltest_class9_10_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_stud_group='$group' group by borno_school_roll asc";
					$qgttotal=$mysqli->query($gttotal);
					$total=mysqli_num_rows($qgttotal); 
			
					$data="select * from modeltest_class9_10_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_stud_group='$group' group by borno_subject_nine_ten_id asc";
					$qdata=$mysqli->query($data);
					$sl=0;
					while($showdata=$qdata->fetch_assoc()){ $sl++;
					
	
		$subid=$showdata['borno_subject_nine_ten_id'];
		
		
					 
$gttotal1="select * from modeltest_class9_10_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_subject_nine_ten_id='$subid' AND res_lg='$lg1'";
					$qgttotal1=$mysqli->query($gttotal1);
					$leterrgrade1=mysqli_num_rows($qgttotal1);		

$gttotal2="select * from modeltest_class9_10_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_subject_nine_ten_id='$subid' AND res_lg='$lg2'";
					$qgttotal2=$mysqli->query($gttotal2);
					$leterrgrade2=mysqli_num_rows($qgttotal2);			

$gttotal3="select * from modeltest_class9_10_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_subject_nine_ten_id='$subid' AND res_lg='$lg3'";
					$qgttotal3=$mysqli->query($gttotal3);
					$leterrgrade3=mysqli_num_rows($qgttotal3);	
					
$gttotal4="select * from modeltest_class9_10_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_subject_nine_ten_id='$subid' AND res_lg='$lg4'";
					$qgttotal4=$mysqli->query($gttotal4);
					$leterrgrade4=mysqli_num_rows($qgttotal4);	
					
$gttotal5="select * from modeltest_class9_10_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_subject_nine_ten_id='$subid' AND res_lg='$lg5'";
					$qgttotal5=$mysqli->query($gttotal5);
					$leterrgrade5=mysqli_num_rows($qgttotal5);	
					
$gttotal6="select * from modeltest_class9_10_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_subject_nine_ten_id='$subid' AND res_lg='$lg6'";
					$qgttotal6=$mysqli->query($gttotal6);
					$leterrgrade6=mysqli_num_rows($qgttotal6);	
					
$gttotal7="select * from modeltest_class9_10_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_subject_nine_ten_id='$subid' AND res_lg='$lg7'";
					$qgttotal7=$mysqli->query($gttotal7);
					$leterrgrade7=mysqli_num_rows($qgttotal7);																										

 $insmk="INSERT INTO `borno_school_summary` (`borno_school_id`,`borno_school_branch_id`,`borno_school_class_id`,`borno_school_shift_id`,`borno_school_section_id`,`borno_school_session`, `borno_result_term_id`, `borno_school_stud_group`,`borno_subject_nine_ten_id`,`borno_school_appeard`,`letter_grade1`,`letter_grade2`,`letter_grade3`,`letter_grade4`,`letter_grade5`,`letter_grade6`,`letter_grade7`)
											
 VALUES ('$schId','$branchId','$studClass','$shiftId','$section','$stsess', '$term', '$group','$subid','$total','$leterrgrade1','$leterrgrade2','$leterrgrade3','$leterrgrade4','$leterrgrade5','$leterrgrade6','$leterrgrade7')";

											
											 $qterm=$mysqli->query($insmk);
											 
	
}
$data1="select * from borno_school_summary order by borno_subject_nine_ten_id asc";
					$qdata1=$mysqli->query($data1);
					$sl=0;
					while($showdata1=$qdata1->fetch_assoc()){ $sl++;
		
		$subjectid=$showdata1['borno_subject_nine_ten_id'];
		$apeard=$showdata1['borno_school_appeard'];
		$leg1=$showdata1['letter_grade1'];
		$leg2=$showdata1['letter_grade2'];
		$leg3=$showdata1['letter_grade3'];
		$leg4=$showdata1['letter_grade4'];
		$leg5=$showdata1['letter_grade5'];
		$leg6=$showdata1['letter_grade6'];
		$leg7=$showdata1['letter_grade7'];		
			
$gtsubject="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$subjectid'";
					$qgtsubject=$mysqli->query($gtsubject);
					$shqgtsubject=$qgtsubject->fetch_assoc();
		$subname=$shqgtsubject['borno_subject_nine_ten_name'];			
											
		$pdf->Cell(100,5,$subname,1,0,"L");
		$pdf->Cell(20,5,$apeard,1,0,"C");
		$pdf->Cell(10,5,$leg1,1,0,"C");
		$pdf->Cell(10,5,$leg2,1,0,"C");
		$pdf->Cell(10,5,$leg3,1,0,"C");
		$pdf->Cell(10,5,$leg4,1,0,"C");
		$pdf->Cell(10,5,$leg5,1,0,"C");
		$pdf->Cell(10,5,$leg6,1,0,"C");
		$pdf->Cell(10,5,$leg7,1,0,"C");	
				$pdf->Ln();				
					}
}
elseif($studClass==3 OR $studClass==4 OR $studClass==5)
{	
$gttotaldelete="delete from borno_school_summary where empty='0'";
					$qgttotaldel=$mysqli->query($gttotaldelete);
					
		$gttotal="select * from modeltest_class6_8_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' group by borno_school_roll asc";
					$qgttotal=$mysqli->query($gttotal);
					$total=mysqli_num_rows($qgttotal); 
			
					$data="select * from modeltest_class6_8_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' group by subject_id_six_eight asc";
					$qdata=$mysqli->query($data);
					$sl=0;
					while($showdata=$qdata->fetch_assoc()){ $sl++;
					

		$subid=$showdata['subject_id_six_eight'];
		
		
					 
$gttotal1="select * from modeltest_class6_8_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND subject_id_six_eight='$subid' AND res_lg='$lg1'";
					$qgttotal1=$mysqli->query($gttotal1);
					$leterrgrade1=mysqli_num_rows($qgttotal1);		

$gttotal2="select * from modeltest_class6_8_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND subject_id_six_eight='$subid' AND res_lg='$lg2'";
					$qgttotal2=$mysqli->query($gttotal2);
					$leterrgrade2=mysqli_num_rows($qgttotal2);			

$gttotal3="select * from modeltest_class6_8_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND subject_id_six_eight='$subid' AND res_lg='$lg3'";
					$qgttotal3=$mysqli->query($gttotal3);
					$leterrgrade3=mysqli_num_rows($qgttotal3);	
					
$gttotal4="select * from modeltest_class6_8_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND subject_id_six_eight='$subid' AND res_lg='$lg4'";
					$qgttotal4=$mysqli->query($gttotal4);
					$leterrgrade4=mysqli_num_rows($qgttotal4);	
					
$gttotal5="select * from modeltest_class6_8_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND subject_id_six_eight='$subid' AND res_lg='$lg5'";
					$qgttotal5=$mysqli->query($gttotal5);
					$leterrgrade5=mysqli_num_rows($qgttotal5);	
					
$gttotal6="select * from modeltest_class6_8_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND subject_id_six_eight='$subid' AND res_lg='$lg6'";
					$qgttotal6=$mysqli->query($gttotal6);
					$leterrgrade6=mysqli_num_rows($qgttotal6);	
					
$gttotal7="select * from modeltest_class6_8_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND subject_id_six_eight='$subid' AND res_lg='$lg7'";
					$qgttotal7=$mysqli->query($gttotal7);
					$leterrgrade7=mysqli_num_rows($qgttotal7);																										

 $insmk="INSERT INTO `borno_school_summary` (`borno_school_id`,`borno_school_branch_id`,`borno_school_class_id`,`borno_school_shift_id`,`borno_school_section_id`,`borno_school_session`, `borno_result_term_id`, `borno_school_stud_group`,`borno_subject_nine_ten_id`,`borno_school_appeard`,`letter_grade1`,`letter_grade2`,`letter_grade3`,`letter_grade4`,`letter_grade5`,`letter_grade6`,`letter_grade7`)
											
 VALUES ('$schId','$branchId','$studClass','$shiftId','$section','$stsess', '$term', '$group','$subid','$total','$leterrgrade1','$leterrgrade2','$leterrgrade3','$leterrgrade4','$leterrgrade5','$leterrgrade6','$leterrgrade7')";
										
											 $qterm=$mysqli->query($insmk);
}

$data1="select * from borno_school_summary order by borno_subject_nine_ten_id asc";
					$qdata1=$mysqli->query($data1);
					$sl=0;
					while($showdata1=$qdata1->fetch_assoc()){ $sl++;
		
		$subjectid=$showdata1['borno_subject_nine_ten_id'];
		$apeard=$showdata1['borno_school_appeard'];
		$leg1=$showdata1['letter_grade1'];
		$leg2=$showdata1['letter_grade2'];
		$leg3=$showdata1['letter_grade3'];
		$leg4=$showdata1['letter_grade4'];
		$leg5=$showdata1['letter_grade5'];
		$leg6=$showdata1['letter_grade6'];
		$leg7=$showdata1['letter_grade7'];		
			
$gtsubject="select * from borno_subject_six_eight where subject_id_six_eight='$subjectid'";
					$qgtsubject=$mysqli->query($gtsubject);
					$shqgtsubject=$qgtsubject->fetch_assoc();
		$subname=$shqgtsubject['six_eight_subject_name'];			
											
		$pdf->Cell(100,5,$subname,1,0,"L");
		$pdf->Cell(20,5,$apeard,1,0,"C");
		$pdf->Cell(10,5,$leg1,1,0,"C");
		$pdf->Cell(10,5,$leg2,1,0,"C");
		$pdf->Cell(10,5,$leg3,1,0,"C");
		$pdf->Cell(10,5,$leg4,1,0,"C");
		$pdf->Cell(10,5,$leg5,1,0,"C");
		$pdf->Cell(10,5,$leg6,1,0,"C");
		$pdf->Cell(10,5,$leg7,1,0,"C");	
				$pdf->Ln();				
					}
}
else
{	
$gttotaldelete="delete from borno_school_summary where empty='0'";
					$qgttotaldel=$mysqli->query($gttotaldelete);
			
		$gttotal="select * from modeltest_class1_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' group by borno_school_roll asc";
					$qgttotal=$mysqli->query($gttotal);
					$total=mysqli_num_rows($qgttotal); 
			
					$data="select * from modeltest_class1_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' group by borno_result_subject_id asc";
					$qdata=$mysqli->query($data);
					$sl=0;
					while($showdata=$qdata->fetch_assoc()){ $sl++;
					
		
		$subid=$showdata['borno_result_subject_id'];
		
		
					 
$gttotal1="select * from modeltest_class1_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_result_subject_id='$subid' AND res_lg='$lg1'";
					$qgttotal1=$mysqli->query($gttotal1);
					$leterrgrade1=mysqli_num_rows($qgttotal1);		

$gttotal2="select * from modeltest_class1_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_result_subject_id='$subid' AND res_lg='$lg2'";
					$qgttotal2=$mysqli->query($gttotal2);
					$leterrgrade2=mysqli_num_rows($qgttotal2);			

$gttotal3="select * from modeltest_class1_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_result_subject_id='$subid' AND res_lg='$lg3'";
					$qgttotal3=$mysqli->query($gttotal3);
					$leterrgrade3=mysqli_num_rows($qgttotal3);	
					
$gttotal4="select * from modeltest_class1_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_result_subject_id='$subid' AND res_lg='$lg4'";
					$qgttotal4=$mysqli->query($gttotal4);
					$leterrgrade4=mysqli_num_rows($qgttotal4);	
					
$gttotal5="select * from modeltest_class1_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_result_subject_id='$subid' AND res_lg='$lg5'";
					$qgttotal5=$mysqli->query($gttotal5);
					$leterrgrade5=mysqli_num_rows($qgttotal5);	
					
$gttotal6="select * from modeltest_class1_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_result_subject_id='$subid' AND res_lg='$lg6'";
					$qgttotal6=$mysqli->query($gttotal6);
					$leterrgrade6=mysqli_num_rows($qgttotal6);	
					
$gttotal7="select * from modeltest_class1_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_result_subject_id='$subid' AND res_lg='$lg7'";
					$qgttotal7=$mysqli->query($gttotal7);
					$leterrgrade7=mysqli_num_rows($qgttotal7);																										

 $insmk="INSERT INTO `borno_school_summary` (`borno_school_id`,`borno_school_branch_id`,`borno_school_class_id`,`borno_school_shift_id`,`borno_school_section_id`,`borno_school_session`, `borno_result_term_id`, `borno_school_stud_group`,`borno_subject_nine_ten_id`,`borno_school_appeard`,`letter_grade1`,`letter_grade2`,`letter_grade3`,`letter_grade4`,`letter_grade5`,`letter_grade6`,`letter_grade7`)
											
 VALUES ('$schId','$branchId','$studClass','$shiftId','$section','$stsess', '$term', '$group','$subid','$total','$leterrgrade1','$leterrgrade2','$leterrgrade3','$leterrgrade4','$leterrgrade5','$leterrgrade6','$leterrgrade7')";
									
											 $qterm=$mysqli->query($insmk);
}

		$data1="select * from borno_school_summary order by borno_subject_nine_ten_id asc";
					$qdata1=$mysqli->query($data1);
					$sl=0;
					while($showdata1=$qdata1->fetch_assoc()){ $sl++;
		
		$subjectid=$showdata1['borno_subject_nine_ten_id'];
		$apeard=$showdata1['borno_school_appeard'];
		$leg1=$showdata1['letter_grade1'];
		$leg2=$showdata1['letter_grade2'];
		$leg3=$showdata1['letter_grade3'];
		$leg4=$showdata1['letter_grade4'];
		$leg5=$showdata1['letter_grade5'];
		$leg6=$showdata1['letter_grade6'];
		$leg7=$showdata1['letter_grade7'];		
			
$gtsubject="select * from modeltest_result_subject where modeltest_result_subject_id='$subjectid'";
					$qgtsubject=$mysqli->query($gtsubject);
					$shqgtsubject=$qgtsubject->fetch_assoc();
		$subname=$shqgtsubject['borno_school_subject_name'];			
											
		$pdf->Cell(100,5,$subname,1,0,"L");
		$pdf->Cell(20,5,$apeard,1,0,"C");
		$pdf->Cell(10,5,$leg1,1,0,"C");
		$pdf->Cell(10,5,$leg2,1,0,"C");
		$pdf->Cell(10,5,$leg3,1,0,"C");
		$pdf->Cell(10,5,$leg4,1,0,"C");
		$pdf->Cell(10,5,$leg5,1,0,"C");
		$pdf->Cell(10,5,$leg6,1,0,"C");
		$pdf->Cell(10,5,$leg7,1,0,"C");	
				$pdf->Ln();				
					}
}

$pdf->Output();
?>