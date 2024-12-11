<?php

$branchId=$_POST['branchId'];
$shiftId=$_POST['shiftId'];
$teacherid=$_POST['teacherid'];
$type=$_POST['type'];
$stsess=$_POST['stsess'];


require_once('student_top.php');

 $gtheadmaster="SELECT * FROM borno_teacher_info where borno_teacher_info_id=$stdid";
		$qgtheadmaster=$mysqli->query($gtheadmaster);
		$sqgtheadmaster=$qgtheadmaster->fetch_assoc();
		$tname=$sqgtheadmaster['borno_teacher_name']; 
		$tno=substr($sqgtheadmaster['borno_teacher_phone'],2,11);
		$schId=$sqgtheadmaster['borno_school_id'];
		$branchId=$sqgtheadmaster['borno_school_branch_id'];
		$shiftId=$sqgtheadmaster['borno_school_shift_id'];
        $teacherid=$stdid;
$teachername="Teacher Name : $tname    Mobile No : $tno";

					$gtschoolName="SELECT * FROM borno_school where borno_school_id=$schId";
					$qgtschoolName=$mysqli->query($gtschoolName);
					$sqgtschoolName=$qgtschoolName->fetch_assoc();

$fnschname=$sqgtschoolName['borno_school_name'];

$gtbranch="SELECT * FROM borno_school_branch where borno_school_id=$schId AND borno_school_branch_id=$branchId";
					$qgtbranch=$mysqli->query($gtbranch);
					$sqgtbranch=$qgtbranch->fetch_assoc();
$fnsbranch1=$sqgtbranch['borno_school_branch_name'];
$fnsbranch="Branch : $fnsbranch1";

$gtshift="SELECT * FROM borno_school_shift where borno_school_shift_id=$shiftId";
					$qgtshift=$mysqli->query($gtshift);
					$sqgtshift=$qgtshift->fetch_assoc();
$fnsshift1=$sqgtshift['borno_school_shift_name'];
$fnsshift="Shift : $fnsshift1";



if($type==1){$exam="Exam Type : Half Yearly    Exam Year : $stsess";}
if($type==2){$exam="Exam Type : Annual    Exam Year : $stsess";}
require('../../fpdf/fpdf.php');
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
//    $this->Image('logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',20);
    // Move to the right
    //$this->Cell(80);
    // Title


	$this->Cell(190,5,$GLOBALS['fnschname'],0,1,'C');
    // Line break
    $this->Ln();
    $this->SetFont('Arial','',14);
    $this->Cell(190,5,$GLOBALS['fnsbranch'],0,1,"C");
    $this->Ln();
    $this->SetFont('Arial','B',12);
    $this->Cell(190,5,$GLOBALS['fnsshift'],0,5,"C");
    $this->Ln();   
    $this->SetFont('Arial','B',13);
    $this->Cell(190,5,$GLOBALS['teachername'],0,5,"C");
    $this->Ln();
    $this->SetFont('Arial','B',12);
    $this->Cell(190,5,$GLOBALS['exam'],0,5,"C");
    $this->Ln();    


	
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();



 $pdf->SetFont('Arial','B',10);
	$result1 ="select * from borno_grading_chart where borno_school_session='$stsess' AND borno_school_id='$schId' AND borno_school_class_id=5";

					$qresult1=$mysqli->query($result1);
					$row1=$qresult1->fetch_assoc();
	
		$lg1=$row1['letter_grade1'];
		$lg2=$row1['letter_grade2'];
		$lg3=$row1['letter_grade3'];
		$lg4=$row1['letter_grade4'];
		$lg5=$row1['letter_grade5'];
		$lg6=$row1['letter_grade6'];
		$lg7=$row1['letter_grade7'];
					
	  
	  
	    $pdf->Cell(15,5,"Class",1,0,"C");
	    $pdf->Cell(15,5,"Section",1,0,"C");
	    $pdf->Cell(75,5,"Subject Name",1,0,"L");
	    $pdf->Cell(16,5,"Appeard",1,0,"L");
	    $pdf->Cell(14,5,"Absent",1,0,"L");
	  	$pdf->Cell(8,5,$lg1,1,0,"C");
		$pdf->Cell(8,5,$lg2,1,0,"C");
		$pdf->Cell(8,5,$lg3,1,0,"C");
		$pdf->Cell(8,5,$lg4,1,0,"C");
		$pdf->Cell(8,5,$lg5,1,0,"C");
		$pdf->Cell(8,5,$lg6,1,0,"C");
		$pdf->Cell(8,5,$lg7,1,0,"C");
		$pdf->Ln();			
$pdf->SetFont('Arial','',10);	
					$data="SELECT * FROM borno_school_class_routine where borno_school_session='$stsess' AND borno_school_teacher_id='$teacherid' group by 	borno_school_class_id,borno_school_section_id,borno_school_subject_id asc";
					$qdata=$mysqli->query($data);
					while($showdata=$qdata->fetch_assoc()){ $sl++;
					
		
		$classid=$showdata['borno_school_class_id'];
		$sectionid=$showdata['borno_school_section_id'];
		$subjectid=$showdata['borno_school_subject_id']; 
		
$gtclass="SELECT * FROM borno_school_class where borno_school_class_id=$classid";
					$qgtclass=$mysqli->query($gtclass);
					$sqgtclass=$qgtclass->fetch_assoc();
$fnsclass=$sqgtclass['borno_school_class_name'];

$gtsection="SELECT * FROM borno_school_section where borno_school_section_id=$sectionid";
					$qgtsection=$mysqli->query($gtsection);
					$sqgtsection=$qgtsection->fetch_assoc();
$fnssection=$sqgtsection['borno_school_section_name'];
			

$gtterm="SELECT * FROM borno_result_add_term where borno_school_id='$schId' AND borno_school_class_id='$classid' AND borno_school_session='$stsess' AND term_type='$type'";
					$qgtterm=$mysqli->query($gtterm);
					$sqgtterm=$qgtterm->fetch_assoc();
$term=$sqgtterm['borno_result_term_id'];

if($classid==1 OR $classid==2)
{
$gtsubject="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$subjectid'";
					$qgtsubject=$mysqli->query($gtsubject);
					$shqgtsubject=$qgtsubject->fetch_assoc();
 $subname=$shqgtsubject['borno_subject_nine_ten_name']; 

$gttotal1="select * from borno_class9_10_final_result where borno_school_id='$schId' AND borno_school_section_id='$sectionid' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_result_subject_id='$subjectid' AND res_lg='$lg1'";
					$qgttotal1=$mysqli->query($gttotal1);
					$leterrgrade1=mysqli_num_rows($qgttotal1);		

$gttotal2="select * from borno_class9_10_final_result where borno_school_id='$schId' AND borno_school_section_id='$sectionid' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_result_subject_id='$subjectid' AND res_lg='$lg2'";
					$qgttotal2=$mysqli->query($gttotal2);
					$leterrgrade2=mysqli_num_rows($qgttotal2);			

$gttotal3="select * from borno_class9_10_final_result where borno_school_id='$schId' AND borno_school_section_id='$sectionid' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_result_subject_id='$subjectid' AND res_lg='$lg3'";
					$qgttotal3=$mysqli->query($gttotal3);
					$leterrgrade3=mysqli_num_rows($qgttotal3);	
					
$gttotal4="select * from borno_class9_10_final_result where borno_school_id='$schId' AND borno_school_section_id='$sectionid' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_result_subject_id='$subjectid' AND res_lg='$lg4'";
					$qgttotal4=$mysqli->query($gttotal4);
					$leterrgrade4=mysqli_num_rows($qgttotal4);	
					
$gttotal5="select * from borno_class9_10_final_result where borno_school_id='$schId' AND borno_school_section_id='$sectionid' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_result_subject_id='$subjectid' AND res_lg='$lg5'";
					$qgttotal5=$mysqli->query($gttotal5);
					$leterrgrade5=mysqli_num_rows($qgttotal5);	
					
$gttotal6="select * from borno_class9_10_final_result where borno_school_id='$schId' AND borno_school_section_id='$sectionid' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_result_subject_id='$subjectid' AND res_lg='$lg6'";
					$qgttotal6=$mysqli->query($gttotal6);
					$leterrgrade6=mysqli_num_rows($qgttotal6);	
					
$gttotal7="select * from borno_class9_10_final_result where borno_school_id='$schId' AND borno_school_section_id='$sectionid' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_result_subject_id='$subjectid' AND res_lg='$lg7'";
					$qgttotal7=$mysqli->query($gttotal7);
					$leterrgrade7=mysqli_num_rows($qgttotal7);																										
$gtpass="select * from borno_school_9_10_merit where borno_school_id='$schId' AND borno_school_section_id='$sectionid' AND borno_school_session='$stsess' AND borno_result_term_id='$term'";
					$qgtpass=$mysqli->query($gtpass);
					$passstd=mysqli_num_rows($qgtpass);	    

$gtstd="select borno_school_roll from borno_class9_10_final_result where borno_school_id='$schId' AND borno_school_section_id='$sectionid' AND borno_school_session='$stsess' AND borno_result_term_id='$term' group by borno_school_roll asc";
					$qgtstd=$mysqli->query($gtstd);
					$stdtotal=mysqli_num_rows($qgtstd);    
					$stdtotal=$stdtotal-$passstd;
}
elseif($classid==3 OR $classid==4 OR $classid==5)
{
$gtsubject="select * from borno_subject_six_eight where subject_id_six_eight='$subjectid'";
					$qgtsubject=$mysqli->query($gtsubject);
					$shqgtsubject=$qgtsubject->fetch_assoc();
				$subname=$shqgtsubject['six_eight_subject_name'];    

$gttotal1="select * from borno_class6_8_final_result where borno_school_id='$schId' AND borno_school_section_id='$sectionid' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_result_subject_id='$subjectid' AND res_lg='$lg1'";
					$qgttotal1=$mysqli->query($gttotal1);
					$leterrgrade1=mysqli_num_rows($qgttotal1);		

$gttotal2="select * from borno_class6_8_final_result where borno_school_id='$schId' AND borno_school_section_id='$sectionid' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_result_subject_id='$subjectid' AND res_lg='$lg2'";
					$qgttotal2=$mysqli->query($gttotal2);
					$leterrgrade2=mysqli_num_rows($qgttotal2);			

$gttotal3="select * from borno_class6_8_final_result where borno_school_id='$schId' AND borno_school_section_id='$sectionid' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_result_subject_id='$subjectid' AND res_lg='$lg3'";
					$qgttotal3=$mysqli->query($gttotal3);
					$leterrgrade3=mysqli_num_rows($qgttotal3);	
					
$gttotal4="select * from borno_class6_8_final_result where borno_school_id='$schId' AND borno_school_section_id='$sectionid' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_result_subject_id='$subjectid' AND res_lg='$lg4'";
					$qgttotal4=$mysqli->query($gttotal4);
					$leterrgrade4=mysqli_num_rows($qgttotal4);	
					
$gttotal5="select * from borno_class6_8_final_result where borno_school_id='$schId' AND borno_school_section_id='$sectionid' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_result_subject_id='$subjectid' AND res_lg='$lg5'";
					$qgttotal5=$mysqli->query($gttotal5);
					$leterrgrade5=mysqli_num_rows($qgttotal5);	
					
$gttotal6="select * from borno_class6_8_final_result where borno_school_id='$schId' AND borno_school_section_id='$sectionid' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_result_subject_id='$subjectid' AND res_lg='$lg6'";
					$qgttotal6=$mysqli->query($gttotal6);
					$leterrgrade6=mysqli_num_rows($qgttotal6);	
					
$gttotal7="select * from borno_class6_8_final_result where borno_school_id='$schId' AND borno_school_section_id='$sectionid' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_result_subject_id='$subjectid' AND res_lg='$lg7'";
					$qgttotal7=$mysqli->query($gttotal7);
					$leterrgrade7=mysqli_num_rows($qgttotal7);																										
$gtpass="select * from borno_school_6_8_merit where borno_school_id='$schId' AND borno_school_section_id='$sectionid' AND borno_school_session='$stsess' AND borno_result_term_id='$term'";
					$qgtpass=$mysqli->query($gtpass);
					$passstd=mysqli_num_rows($qgtpass);	    

$gtstd="select borno_school_roll from borno_class6_8_final_result where borno_school_id='$schId' AND borno_school_section_id='$sectionid' AND borno_school_session='$stsess' AND borno_result_term_id='$term' group by borno_school_roll asc";
					$qgtstd=$mysqli->query($gtstd);
					$stdtotal=mysqli_num_rows($qgtstd);    
					$stdtotal=$stdtotal-$passstd;				
}
else
{
$gtsubject="select * from borno_result_subject where borno_result_subject_id='$subjectid'";
					$qgtsubject=$mysqli->query($gtsubject);
					$shqgtsubject=$qgtsubject->fetch_assoc();
		$subname=$shqgtsubject['borno_school_subject_name'];	    

$gttotal1="select * from borno_class1_final_result where borno_school_id='$schId' AND borno_school_section_id='$sectionid' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_result_subject_id='$subjectid' AND res_lg='$lg1'";
					$qgttotal1=$mysqli->query($gttotal1);
					$leterrgrade1=mysqli_num_rows($qgttotal1);		

$gttotal2="select * from borno_class1_final_result where borno_school_id='$schId' AND borno_school_section_id='$sectionid' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_result_subject_id='$subjectid' AND res_lg='$lg2'";
					$qgttotal2=$mysqli->query($gttotal2);
					$leterrgrade2=mysqli_num_rows($qgttotal2);			

$gttotal3="select * from borno_class1_final_result where borno_school_id='$schId' AND borno_school_section_id='$sectionid' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_result_subject_id='$subjectid' AND res_lg='$lg3'";
					$qgttotal3=$mysqli->query($gttotal3);
					$leterrgrade3=mysqli_num_rows($qgttotal3);	
					
$gttotal4="select * from borno_class1_final_result where borno_school_id='$schId' AND borno_school_section_id='$sectionid' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_result_subject_id='$subjectid' AND res_lg='$lg4'";
					$qgttotal4=$mysqli->query($gttotal4);
					$leterrgrade4=mysqli_num_rows($qgttotal4);	
					
$gttotal5="select * from borno_class1_final_result where borno_school_id='$schId' AND borno_school_section_id='$sectionid' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_result_subject_id='$subjectid' AND res_lg='$lg5'";
					$qgttotal5=$mysqli->query($gttotal5);
					$leterrgrade5=mysqli_num_rows($qgttotal5);	
					
$gttotal6="select * from borno_class1_final_result where borno_school_id='$schId' AND borno_school_section_id='$sectionid' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_result_subject_id='$subjectid' AND res_lg='$lg6'";
					$qgttotal6=$mysqli->query($gttotal6);
					$leterrgrade6=mysqli_num_rows($qgttotal6);	
					
$gttotal7="select * from borno_class1_final_result where borno_school_id='$schId' AND borno_school_section_id='$sectionid' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_result_subject_id='$subjectid' AND res_lg='$lg7'";
					$qgttotal7=$mysqli->query($gttotal7);
					$leterrgrade7=mysqli_num_rows($qgttotal7);																										
$gtpass="select * from borno_school_play_5_merit where borno_school_id='$schId' AND borno_school_section_id='$sectionid' AND borno_school_session='$stsess' AND borno_result_term_id='$term'";
					$qgtpass=$mysqli->query($gtpass);
					$passstd=mysqli_num_rows($qgtpass);	    

$gtstd="select borno_school_roll from borno_class1_final_result where borno_school_id='$schId' AND borno_school_section_id='$sectionid' AND borno_school_session='$stsess' AND borno_result_term_id='$term' group by borno_school_roll asc";
					$qgtstd=$mysqli->query($gtstd);
					$stdtotal=mysqli_num_rows($qgtstd);    
					$stdtotal=$stdtotal-$passstd;
}
			
		$pdf->Cell(15,5,$fnsclass,1,0,"C");	
		$pdf->Cell(15,5,$fnssection,1,0,"C");
		$pdf->Cell(75,5,$subname,1,0,"L");
	    $pdf->Cell(16,5,$passstd,1,0,"C");
	    $pdf->Cell(14,5,$stdtotal,1,0,"C");		
	  	$pdf->Cell(8,5,$leterrgrade1,1,0,"C");
		$pdf->Cell(8,5,$leterrgrade2,1,0,"C");
		$pdf->Cell(8,5,$leterrgrade3,1,0,"C");
		$pdf->Cell(8,5,$leterrgrade4,1,0,"C");
		$pdf->Cell(8,5,$leterrgrade5,1,0,"C");
		$pdf->Cell(8,5,$leterrgrade6,1,0,"C");
		$pdf->Cell(8,5,$leterrgrade7,1,0,"C");		
		
		$pdf->Ln();
}



$pdf->Output();
?>