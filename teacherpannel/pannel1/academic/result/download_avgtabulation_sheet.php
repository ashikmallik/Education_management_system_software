<?php
$branchId=$_GET['stbranch'];
$schId=$_GET['schoolId'];
$studClass=$_GET['classId'];
$shiftId=$_GET['shiftId'];
$section=$_GET['sectionId'];
$stsess=$_GET['scsess'];
$term=$_GET['sctermId'];

include('../../../connection.php');

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

$gtschoolName="SELECT * FROM borno_school where borno_school_id=$schId";
					$qgtschoolName=$mysqli->query($gtschoolName);
					$sqgtschoolName=$qgtschoolName->fetch_assoc();
					
					
					$fnschname=$sqgtschoolName['borno_school_name'];
					
 $subject ="select * from borno_class1_temp_mark1 where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' group by borno_result_subject_id asc";
$s1l=0;
					$qsubject=$mysqli->query($subject);
					while($rowqsubject=$qsubject->fetch_assoc()){ $s1l++;
					$subid=$rowqsubject['borno_result_subject_id'];
					
					$subjectname ="select * from borno_result_subject where borno_school_class_id='$studClass' AND borno_school_id='$schId' AND borno_school_session='$stsess' AND borno_result_subject_id='$subid'";

					$qsubjectname=$mysqli->query($subjectname);
					$rowqsubjectname=$qsubjectname->fetch_assoc();
					$subname=$rowqsubjectname['borno_school_subject_name'];
					if($s1l==1)
					{
					$subid1=$subid;
					$subname1=$subname;	
					}
					elseif($s1l==2)
					{
					$subid2=$subid;	
					$subname2=$subname;
					}
					elseif($s1l==3)
					{
					$subid3=$subid;	
					$subname3=$subname;	
					}
					elseif($s1l==4)
					{
					$subid4=$subid;	
					$subname4=$subname;	
					}
					elseif($s1l==5)
					{
					$subid5=$subid;	
					$subname5=$subname;	
					}
					elseif($s1l==6)
					{
					$subid6=$subid;	
					$subname6=$subname;
					}
					elseif($s1l==7)
					{
					$subid7=$subid;		
					$subname7=$subname;	
					}
					
					}
				
					
					$numtype ="select * from borno_result_number_type where borno_school_class_id='$studClass' AND borno_school_id='$schId' AND borno_school_session='$stsess'";
					$qnumtype=$mysqli->query($numtype);
					$rowqqnumtypee=$qnumtype->fetch_assoc();
					$numbertype1=$rowqqnumtypee['borno_school_number_type1'];
					$numbertype2=$rowqqnumtypee['borno_school_number_type2'];
					$numbertype3=$rowqqnumtypee['borno_school_number_type3'];
					$numbertype4=$rowqqnumtypee['borno_school_number_type4'];
					$numbertype5=$rowqqnumtypee['borno_school_number_type5'];
					$numbertype6=$rowqqnumtypee['borno_school_number_type6'];
					
require('../../fpdf/fpdf.php');
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    //$this->Image('logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','',20);
    // Move to the right
    //$this->Cell(80);
    // Title
  
	$this->Cell(280,5,$GLOBALS['fnschname'],0,1,'C');
	$this->Cell(280,2,'',0,1,'R');
	$this->SetFont('Arial','',14);
	$this->Cell(280,2,'',0,1,'R');
	$this->SetFont('Arial','',16);
	$this->Cell(280,5,"Average Tabulation Sheet",0,0,'C');
	$this->Ln();
	$this->Ln();	
	$this->SetFont('Arial','',12);
	$this->Cell(15,5,"Class : ",0,0,'L');
	$this->Cell(20,5,$GLOBALS['fnsclass'],0,0,'L');
	$this->Cell(12,5,"Shift : ",0,0,'L');
	$this->Cell(18,5,$GLOBALS['fnsshift'],0,0,'L');
	$this->Cell(20,5,"Section : ",0,0,'L');
	$this->Cell(50,5,$GLOBALS['fnssection'],0,0,'L');
	$this->Cell(15,5,"Term : ",0,0,'L');
	$this->Cell(45,5,$GLOBALS['fnsterm'],0,0,'L');
	$this->Cell(20,5,"Session : ",0,0,'L');
	$this->Cell(15,5,$GLOBALS['stsess'],0,0,'L');
	$this->Cell(20,5,"Part-1",0,0,'L');
	$this->Ln();
	$this->SetFont('Arial','',10);
	$this->Cell(8,10,"Roll",1,0,'C');
	$this->Cell(25,10,"Student Name",1,0,'L');
	$this->Cell(10,10,"Exam",1,0,'C');
    if($GLOBALS['s1l']==1)
	{	
	$this->Cell(48,5,$GLOBALS['subname1'],1,0,'L');
	}
    if($GLOBALS['s1l']==2)
	{	
	$this->Cell(48,5,$GLOBALS['subname1'],1,0,'L');
	$this->Cell(48,5,$GLOBALS['subname2'],1,0,'L');
	}
    if($GLOBALS['s1l']==3)
	{	
	$this->Cell(48,5,$GLOBALS['subname1'],1,0,'L');
	$this->Cell(48,5,$GLOBALS['subname2'],1,0,'L');
	$this->Cell(48,5,$GLOBALS['subname3'],1,0,'L');
	}
    if($GLOBALS['s1l']==4)
	{	
	$this->Cell(48,5,$GLOBALS['subname1'],1,0,'L');
	$this->Cell(48,5,$GLOBALS['subname2'],1,0,'L');
	$this->Cell(48,5,$GLOBALS['subname3'],1,0,'L');
	$this->Cell(48,5,$GLOBALS['subname4'],1,0,'L');	
	}
    if($GLOBALS['s1l']>=5)
	{	
	$this->Cell(48,5,$GLOBALS['subname1'],1,0,'L');
	$this->Cell(48,5,$GLOBALS['subname2'],1,0,'L');
	$this->Cell(48,5,$GLOBALS['subname3'],1,0,'L');
	$this->Cell(48,5,$GLOBALS['subname4'],1,0,'L');
	$this->Cell(48,5,$GLOBALS['subname5'],1,0,'L');	
	}
    if($GLOBALS['s1l']<=4)
    {
    $this->SetFont('Arial','',8);
	$this->Cell(10,5,'Grand',1,0,'C');
	$this->Cell(8,5,'GPA',1,0,'C');
    }
	$this->Ln();
	$this->SetFont('Arial','',8);
	$this->Cell(8,5,'',0,0,'C');
	$this->Cell(25,5,'',0,0,'L');
	$this->Cell(10,5,'',0,0,'L');
    if($GLOBALS['s1l']==1)
	{
	$this->Cell(12,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(12,5,$GLOBALS['numbertype2'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype6'],1,0,'C');	
	$this->Cell(16,5,'Total',1,0,'C');
	$this->Cell(8,5,'LG',1,0,'C');
	}
	if($GLOBALS['s1l']==2)
	{
	$this->Cell(12,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(12,5,$GLOBALS['numbertype2'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype6'],1,0,'C');	
	$this->Cell(16,5,'Total',1,0,'C');
	$this->Cell(8,5,'LG',1,0,'C');
	$this->Cell(12,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(12,5,$GLOBALS['numbertype2'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype6'],1,0,'C');	
	$this->Cell(16,5,'Total',1,0,'C');
	$this->Cell(8,5,'LG',1,0,'C');
	}
	if($GLOBALS['s1l']==3)
	{
	$this->Cell(12,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(12,5,$GLOBALS['numbertype2'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype6'],1,0,'C');	
	$this->Cell(16,5,'Total',1,0,'C');
	$this->Cell(8,5,'LG',1,0,'C');
	$this->Cell(12,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(12,5,$GLOBALS['numbertype2'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype6'],1,0,'C');	
	$this->Cell(16,5,'Total',1,0,'C');
	$this->Cell(8,5,'LG',1,0,'C');
	$this->Cell(12,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(12,5,$GLOBALS['numbertype2'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype6'],1,0,'C');	
	$this->Cell(16,5,'Total',1,0,'C');
	$this->Cell(8,5,'LG',1,0,'C');
	}
	if($GLOBALS['s1l']==4)
	{
$this->Cell(12,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(12,5,$GLOBALS['numbertype2'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype6'],1,0,'C');	
	$this->Cell(16,5,'Total',1,0,'C');
	$this->Cell(8,5,'LG',1,0,'C');
$this->Cell(12,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(12,5,$GLOBALS['numbertype2'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype6'],1,0,'C');	
	$this->Cell(16,5,'Total',1,0,'C');
	$this->Cell(8,5,'LG',1,0,'C');
	$this->Cell(12,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(12,5,$GLOBALS['numbertype2'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype6'],1,0,'C');	
	$this->Cell(16,5,'Total',1,0,'C');
	$this->Cell(8,5,'LG',1,0,'C');
	$this->Cell(12,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(12,5,$GLOBALS['numbertype2'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype6'],1,0,'C');	
	$this->Cell(16,5,'Total',1,0,'C');
	$this->Cell(8,5,'LG',1,0,'C');
	}
	if($GLOBALS['s1l']>=5)
	{
$this->Cell(12,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(12,5,$GLOBALS['numbertype2'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype6'],1,0,'C');	
	$this->Cell(16,5,'Total',1,0,'C');
	$this->Cell(8,5,'LG',1,0,'C');
$this->Cell(12,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(12,5,$GLOBALS['numbertype2'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype6'],1,0,'C');	
	$this->Cell(16,5,'Total',1,0,'C');
	$this->Cell(8,5,'LG',1,0,'C');
$this->Cell(12,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(12,5,$GLOBALS['numbertype2'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype6'],1,0,'C');	
	$this->Cell(16,5,'Total',1,0,'C');
	$this->Cell(8,5,'LG',1,0,'C');
$this->Cell(12,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(12,5,$GLOBALS['numbertype2'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype6'],1,0,'C');	
	$this->Cell(16,5,'Total',1,0,'C');
	$this->Cell(8,5,'LG',1,0,'C');
$this->Cell(12,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(12,5,$GLOBALS['numbertype2'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	//$this->Cell(6,5,$GLOBALS['numbertype6'],1,0,'C');	
	$this->Cell(16,5,'Total',1,0,'C');
	$this->Cell(8,5,'LG',1,0,'C');
	}
    if($GLOBALS['s1l']<=4)
    {
	$this->Cell(10,5,'Total',1,0,'C');
	$this->Cell(8,5,'',1,0,'L');
    }
	$this->Ln();
    // Line break
    //$this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','',14);
    // Page number
	
	$this->SetFont('Arial','',8);

	$date=date('d-m-Y');
	$time=date('h:i:s');
	$this->Cell(90,5,"Print Date & Time : $date $time",0,0,"L"); 
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'R');
}
}


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage(L);


					



$result23 ="select * from borno_class1_avgtemp_mark1 where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='0' group by borno_school_roll asc";
$sl=0;
					$qgresult23=$mysqli->query($result23);
					while($row23=$qgresult23->fetch_assoc()){ $sl++;

					$gtstotal111=$row23['borno_school_roll'];
					$gtstname=substr($row23['borno_school_student_name'],0,13);

					
$gtterm="select * from borno_result_add_term where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' order by borno_result_term_id asc";
				
				$qgterm=$mysqli->query($gtterm);
				$st=0;
				while($shsterm=$qgterm->fetch_assoc()){$st++;	
				$term=$shsterm['borno_result_term_id'];						
					
$gtterm="SELECT * FROM borno_result_add_term where borno_result_term_id=$term";
					$qgtterm=$mysqli->query($gtterm);
					$sqgtterm=$qgtterm->fetch_assoc();
$fnsterm=substr($sqgtterm['borno_result_term_name'],0,7);
					
					$pdf->SetFont('Arial','',8);
					$pdf->Cell(8,5,$gtstotal111,1,0,'C');
					$pdf->Cell(25,5,$gtstname,1,0,'L');
					$pdf->Cell(10,5,$fnsterm,1,0,'C');	

	if($subid1=="" AND $subid2=="" AND $subid3=="" AND $subid4=="" AND $subid5=="" AND $subid6=="" AND $subid7==""){$subidend=$subid1;}	
	elseif($subid2=="" AND $subid3=="" AND $subid4=="" AND $subid5=="" AND $subid6=="" AND $subid7==""){$subidend=$subid1;}	
	elseif($subid3=="" AND $subid4=="" AND $subid5=="" AND $subid6=="" AND $subid7==""){$subidend=$subid2;}	
	elseif($subid4=="" AND $subid5=="" AND $subid6=="" AND $subid7==""){$subidend=$subid3;}	
	elseif($subid5=="" AND $subid6=="" AND $subid7==""){$subidend=$subid4;}	
	elseif($subid6=="" AND $subid7==""){$subidend=$subid5;}	
	elseif($subid7=="" AND $subid8==""){$subidend=$subid5;}
	elseif($subid8==""){$subidend=$subid5;}
	else{$subidend=$subid5;}					
$resultsub ="select * from borno_class1_temp_mark1 where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND borno_result_subject_id between '$subid1' AND '$subidend' order by borno_result_subject_id asc";
$sl2=0;
					$qresultsub=$mysqli->query($resultsub);
					while($rowqresultsub=$qresultsub->fetch_assoc()){$sl2++;
					$subid=$rowqresultsub['borno_result_subject_id'];
					$num1=$rowqresultsub['temp_res_number_type1'];
					$num2=$rowqresultsub['temp_res_number_type2'];
					$num3=$rowqresultsub['temp_res_number_type3'];
					$num4=$rowqresultsub['temp_res_number_type4'];
					$num5=$rowqresultsub['temp_res_number_type5'];
					$num6=$rowqresultsub['temp_res_number_type6'];					
$resultlg ="select * from borno_class1_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_result_subject_id='$subid' AND borno_school_roll='$gtstotal111'";

					$resultlg11=$mysqli->query($resultlg);
					$resultlg1123=$resultlg11->fetch_assoc();					
					
					$ttl=$resultlg1123['res_total_conv'];	
					$lg=$resultlg1123['res_lg'];
					
					$pdf->SetFont('Arial','',10);

					$pdf->Cell(12,5,$num1,1,0,'C');
					$pdf->Cell(12,5,$num2,1,0,'C');
					//$pdf->Cell(6,5,$num3,1,0,'C');
					//$pdf->Cell(6,5,$num4,1,0,'C');
					//$pdf->Cell(6,5,$num5,1,0,'C');
					//$pdf->Cell(6,5,$num6,1,0,'C');
					$pdf->Cell(16,5,$ttl,1,0,'C');
					$pdf->Cell(8,5,$lg,1,0,'C');
					}
	  if($s1l<=4)
    {				
	$resultgrand ="select * from borno_school_play_5_merit where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111'";

					$qresultgrand=$mysqli->query($resultgrand);
					$rowqresultgrand=$qresultgrand->fetch_assoc();
					$grand=$rowqresultgrand['grandtotal'];
					$gpa=$rowqresultgrand['gpa'];					
					$pdf->Cell(10,5,$grand,1,0,'C');
					$pdf->Cell(8,5,$gpa,1,0,'C');			
    }					
					
$pdf->Ln();
				}
				
					$pdf->Cell(8,5,$gtstotal111,1,0,'C');
					$pdf->Cell(25,5,$gtstname,1,0,'L');
					$pdf->Cell(10,5,Average,1,0,'C');
		if($subid1=="" AND $subid2=="" AND $subid3=="" AND $subid4=="" AND $subid5=="" AND $subid6=="" AND $subid7==""){$subidend=$subid1;}	
	elseif($subid2=="" AND $subid3=="" AND $subid4=="" AND $subid5=="" AND $subid6=="" AND $subid7==""){$subidend=$subid1;}	
	elseif($subid3=="" AND $subid4=="" AND $subid5=="" AND $subid6=="" AND $subid7==""){$subidend=$subid2;}	
	elseif($subid4=="" AND $subid5=="" AND $subid6=="" AND $subid7==""){$subidend=$subid3;}	
	elseif($subid5=="" AND $subid6=="" AND $subid7==""){$subidend=$subid4;}	
	elseif($subid6=="" AND $subid7==""){$subidend=$subid5;}	
	elseif($subid7=="" AND $subid8==""){$subidend=$subid5;}
	elseif($subid8==""){$subidend=$subid5;}
	else{$subidend=$subid5;}				
					
$resultsubavg ="select * from borno_class1_avgtemp_mark1 where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='0' AND borno_school_roll='$gtstotal111' AND borno_result_subject_id between '$subid1' AND '$subidend'order by borno_result_subject_id asc";
$sl2=0;
					$qresultsubavg=$mysqli->query($resultsubavg);
					while($rowqresultsubavg=$qresultsubavg->fetch_assoc()){$sl2++;
					$subida=$rowqresultsubavg['borno_result_subject_id'];
					$numa1=$rowqresultsubavg['temp_res_number_type1'];
					$numa2=$rowqresultsubavg['temp_res_number_type2'];
					$numa3=$rowqresultsubavg['temp_res_number_type3'];
					$numa4=$rowqresultsubavg['temp_res_number_type4'];
					$numa5=$rowqresultsubavg['temp_res_number_type5'];
					$numa6=$rowqresultsubavg['temp_res_number_type6'];
					
$resultlgavg ="select * from borno_play_five_avg_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='0' AND borno_result_subject_id='$subida' AND borno_school_roll='$gtstotal111'";

					
					
					$resultlg11avg=$mysqli->query($resultlgavg);
					$resultlg1123avg=$resultlg11avg->fetch_assoc();					
					
					$ttla=$resultlg1123avg['res_total_conv'];	
					$lga=$resultlg1123avg['res_lg'];

					$pdf->Cell(12,5,$numa1,1,0,'C');
					$pdf->Cell(12,5,$numa2,1,0,'C');
					//$pdf->Cell(6,5,$numa3,1,0,'C');
					//$pdf->Cell(6,5,$numa4,1,0,'C');
					//$pdf->Cell(6,5,$numa5,1,0,'C');
					//$pdf->Cell(6,5,$numa6,1,0,'C');
					$pdf->Cell(16,5,$ttla,1,0,'C');
					$pdf->Cell(8,5,$lga,1,0,'C');
					}
					
			
	  if($s1l<=4)
    {				
	$resultgrand ="select * from borno_school_play_5_avg_merit  where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='0' AND borno_school_roll='$gtstotal111'";

					$qresultgrand=$mysqli->query($resultgrand);
					$rowqresultgrand=$qresultgrand->fetch_assoc();
					$grand=$rowqresultgrand['grandtotal'];
					$gpa=$rowqresultgrand['gpa'];					
					$pdf->Cell(10,5,$grand,1,0,'C');
					$pdf->Cell(8,5,$gpa,1,0,'C');			
    }					
					
$pdf->Ln();										
				$pdf->Cell(118,2,'',0,5,'C');	
						}

$pdf->Output();
?>