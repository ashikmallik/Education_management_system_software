<?php
error_reporting(0);

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

$gtsection="SELECT * FROM borno_school_section where borno_school_section_id=$section AND `year` ='$stsess'";
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
					
 $subject ="select borno_result_subject_id from borno_class1_temp_mark1 where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' group by borno_result_subject_id asc";
$s1l=0;
					$qsubject=$mysqli->query($subject);
					while($rowqsubject=$qsubject->fetch_assoc()){ $s1l++;
					$subid=$rowqsubject['borno_result_subject_id'];
					
					$subjectname ="select * from borno_result_subject where borno_school_class_id='$studClass' AND borno_school_id='$schId' AND borno_school_session='$stsess' AND borno_result_subject_id='$subid' AND borno_result_term_id='$term'";

					$qsubjectname=$mysqli->query($subjectname);
					$rowqsubjectname=$qsubjectname->fetch_assoc();
				$subname=substr($rowqsubjectname['borno_school_subject_name'],0,20);
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
					elseif($s1l==8)
					{
					$subid8=$subid;
					$subname8=$subname;	
					}
					elseif($s1l==9)
					{
					$subid9=$subid;
					$subname9=$subname;	
					}
					elseif($s1l==10)
					{
					$subid10=$subid;
					$subname10=$subname;	
					}
					elseif($s1l==11)
					{
					$subid11=$subid;
					$subname11=$subname;	
					}
					elseif($s1l==12)
					{
					$subid12=$subid;
					$subname12=$subname;	
					}
					elseif($s1l==13)
					{
					$subid13=$subid;
					$subname13=$subname;	
					}
					elseif($s1l==14)
					{
					$subid14=$subid;
					$subname14=$subname;	
					}
					elseif($s1l==15)
					{
					$subid15=$subid;
					$subname15=$subname;	
					}
					}
				
					
					$numtype ="select * from borno_result_number_type where borno_school_class_id='$studClass' AND borno_school_id='$schId' AND borno_school_session='$stsess' AND borno_result_term_id='$term'";
					$qnumtype=$mysqli->query($numtype);
					$rowqqnumtypee=$qnumtype->fetch_assoc();
		$numbertype1=substr($rowqqnumtypee['borno_school_number_type1'],0,3);
		$numbertype2=substr($rowqqnumtypee['borno_school_number_type2'],0,3);
		$numbertype3=substr($rowqqnumtypee['borno_school_number_type3'],0,3);
		$numbertype4=substr($rowqqnumtypee['borno_school_number_type4'],0,3);
		$numbertype5=substr($rowqqnumtypee['borno_school_number_type5'],0,3);
		$numbertype6=substr($rowqqnumtypee['borno_school_number_type6'],0,3);
					
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
	$this->Cell(145,5,"Branch : ",0,0,'R');
	$this->Cell(135,5,$GLOBALS['fnsbranch'],0,0,'L');
	$this->Ln();
	$this->Cell(280,2,'',0,1,'R');
	$this->SetFont('Arial','',16);
	$this->Cell(280,5,"Tabulation Sheet",0,0,'C');
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
	$this->Ln();
	$this->SetFont('Arial','',11);
	$this->Cell(10,10,"Roll",1,0,'C');
	$this->Cell(40,10,"Student Name",1,0,'L');
	if($GLOBALS['s1l']==11)
	{	
	$this->Cell(42,5,$GLOBALS['subname11'],1,0,'L');
	}
	if($GLOBALS['s1l']==12)
	{
	$this->Cell(42,5,$GLOBALS['subname11'],1,0,'L');
	$this->Cell(42,5,$GLOBALS['subname12'],1,0,'L');
	}
	if($GLOBALS['s1l']==13)
	{
	$this->Cell(42,5,$GLOBALS['subname11'],1,0,'L');
	$this->Cell(42,5,$GLOBALS['subname12'],1,0,'L');
	$this->Cell(42,5,$GLOBALS['subname13'],1,0,'L');	
	}
	if($GLOBALS['s1l']==14)
	{
	$this->Cell(42,5,$GLOBALS['subname11'],1,0,'L');
	$this->Cell(42,5,$GLOBALS['subname12'],1,0,'L');
	$this->Cell(42,5,$GLOBALS['subname13'],1,0,'L');	
	$this->Cell(42,5,$GLOBALS['subname14'],1,0,'L');
	}	
	if($GLOBALS['s1l']>=15)
	{
	$this->Cell(42,5,$GLOBALS['subname11'],1,0,'L');
	$this->Cell(42,5,$GLOBALS['subname12'],1,0,'L');
	$this->Cell(42,5,$GLOBALS['subname13'],1,0,'L');	
	$this->Cell(42,5,$GLOBALS['subname14'],1,0,'L');
	$this->Cell(42,5,$GLOBALS['subname15'],1,0,'L');
	}	
	

    $this->SetFont('Arial','',9);
	$this->Cell(10,5,Grand,1,0,'C');
	$this->Cell(8,5,GPA,1,0,'L');
	$this->Ln();
	
	$this->Cell(10,5,'',0,0,'C');
	$this->Cell(40,5,'',0,0,'L');
	if($GLOBALS['s1l']==11)
	{
	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');		
	$this->Cell(8,5,Total,1,0,'C');
	$this->Cell(4,5,G,1,0,'C');
	}
	if($GLOBALS['s1l']==12)
	{
	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	$this->Cell(8,5,Total,1,0,'C');
	$this->Cell(4,5,G,1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	$this->Cell(8,5,Total,1,0,'C');
	$this->Cell(4,5,G,1,0,'C');
	}
	if($GLOBALS['s1l']==13)
	{
	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	$this->Cell(8,5,Total,1,0,'C');
	$this->Cell(4,5,G,1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	$this->Cell(8,5,Total,1,0,'C');
	$this->Cell(4,5,G,1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	$this->Cell(8,5,Total,1,0,'C');
	$this->Cell(4,5,G,1,0,'C');
	}
	if($GLOBALS['s1l']==14)
	{
	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	$this->Cell(8,5,Total,1,0,'C');
	$this->Cell(4,5,G,1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	$this->Cell(8,5,Total,1,0,'C');
	$this->Cell(4,5,G,1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	$this->Cell(8,5,Total,1,0,'C');
	$this->Cell(4,5,G,1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	$this->Cell(8,5,Total,1,0,'C');
	$this->Cell(4,5,G,1,0,'C');
	}
	if($GLOBALS['s1l']>=15)
	{
	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');	
	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	$this->Cell(8,5,Total,1,0,'C');
	$this->Cell(4,5,G,1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	$this->Cell(8,5,Total,1,0,'C');
	$this->Cell(4,5,G,1,0,'C');
    $this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	$this->Cell(8,5,Total,1,0,'C');
	$this->Cell(4,5,G,1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	$this->Cell(8,5,Total,1,0,'C');
	$this->Cell(4,5,G,1,0,'C');
    $this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	$this->Cell(8,5,Total,1,0,'C');
	$this->Cell(4,5,G,1,0,'C');
	}

	
	$this->SetFont('Arial','',9);
	$this->Cell(10,5,Total,1,0,'C');
	$this->Cell(8,5,'',1,0,'L');
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


					



$result23 ="select * from borno_class1_temp_mark1 where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' group by borno_school_roll asc";
$sl=0;
					$qgresult23=$mysqli->query($result23);
					while($row23=$qgresult23->fetch_assoc()){ $sl++;

					$gtstotal111=$row23['borno_school_roll'];
					$gtstname=substr($row23['borno_school_student_name'],0,17);

					$pdf->SetFont('Arial','',9);
					$pdf->Cell(10,5,$gtstotal111,1,0,'C');
					$pdf->Cell(40,5,$gtstname,1,0,'L');
					
	if($subid11=="" AND $subid12=="" AND $subid13=="" AND $subid14=="" AND $subid15==""){$subidend=$subid11;}	
	elseif($subid12=="" AND $subid13=="" AND $subid14=="" AND $subid15==""){$subidend=$subid11;}
	elseif($subid13=="" AND $subid14=="" AND $subid15==""){$subidend=$subid12;}
	elseif($subid14=="" AND $subid15==""){$subidend=$subid13;}
	elseif($subid15==""){$subidend=$subid14;}
	else{$subidend=$subid15;}			
 $resultsub ="select * from borno_class1_temp_mark1 where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND borno_result_subject_id!='$subid1' AND borno_result_subject_id!='$subid2' AND borno_result_subject_id!='$subid3' AND borno_result_subject_id!='$subid4' AND borno_result_subject_id!='$subid5' AND borno_result_subject_id!='$subid6' AND borno_result_subject_id!='$subid7' AND borno_result_subject_id!='$subid8' AND borno_result_subject_id!='$subid9' AND borno_result_subject_id!='$subid10' AND borno_result_subject_id between '$subid11' AND '$subidend' order by borno_result_subject_id asc";
$sl2=0;
					$qresultsub=$mysqli->query($resultsub);
					while($rowqresultsub=$qresultsub->fetch_assoc()){$sl2++;
					$subid=$rowqresultsub['borno_result_subject_id'];
					$num1=$rowqresultsub['temp_res_number_type1'];
					$num2=$rowqresultsub['temp_res_number_type2'];
					$num3=$rowqresultsub['temp_res_number_type3'];
					$num4=$rowqresultsub['temp_res_number_type4'];	
					$num5=$rowqresultsub['temp_res_number_type5'];				
$resultlg ="select * from borno_class1_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_result_subject_id='$subid' AND borno_school_roll='$gtstotal111'";

					$resultlg11=$mysqli->query($resultlg);
					$resultlg1123=$resultlg11->fetch_assoc();					
					
					$ttl=$resultlg1123['res_total_conv'];	
					$gp=$resultlg1123['res_lg'];
					
					$pdf->Cell(6,5,$num1,1,0,'C');
					$pdf->Cell(6,5,$num2,1,0,'C');
					$pdf->Cell(6,5,$num3,1,0,'C');
					$pdf->Cell(6,5,$num4,1,0,'C');
					$pdf->Cell(6,5,$num5,1,0,'C');
					$pdf->Cell(8,5,$ttl,1,0,'C');
					$pdf->Cell(4,5,$gp,1,0,'C');
					}
$resultgrand ="select * from borno_school_play_5_merit where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111'";

					$qresultgrand=$mysqli->query($resultgrand);
					$rowqresultgrand=$qresultgrand->fetch_assoc();
					$grand=$rowqresultgrand['grandtotal'];
					$gpa=$rowqresultgrand['gpa'];					
					$pdf->Cell(10,5,$grand,1,0,'C');
					$pdf->Cell(8,5,$gpa,1,0,'C');
					
										
					$pdf->Ln();
						}

$pdf->Output();
?>