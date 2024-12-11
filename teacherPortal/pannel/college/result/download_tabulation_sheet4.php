<?php
error_reporting(0);

$branchId=$_GET['stbranch'];
$schId=$_GET['schoolId'];
$studClass=$_GET['classId'];
$shiftId=$_GET['shiftId'];
$section=$_GET['sectionId'];
$stsess=$_GET['scsess'];
$term=$_GET['sctermId'];
$group=$_GET['group'];
$styear=$_GET['styear1'];

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

$gtterm="SELECT * FROM borno_result_add_term where borno_result_term_id=$term";
					$qgtterm=$mysqli->query($gtterm);
					$sqgtterm=$qgtterm->fetch_assoc();
$fnsterm=$sqgtterm['borno_result_term_name'];

$gtschoolName="SELECT * FROM borno_school where borno_school_id=$schId";
					$qgtschoolName=$mysqli->query($gtschoolName);
					$sqgtschoolName=$qgtschoolName->fetch_assoc();
					$fnschname=$sqgtschoolName['borno_school_name'];
						
  $subject ="select * from borno_class11_12_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_result_exam_year='$styear' group by borno_subject_eleven_twelve_id asc";
$s1l=0;
					$qsubject=$mysqli->query($subject);
					while($rowqsubject=$qsubject->fetch_assoc()){ $s1l++;
					$subid=$rowqsubject['borno_subject_eleven_twelve_id'];
				
					$subjectname ="select * from borno_subject_eleven_twelve where borno_subject_eleven_twelve_id='$subid'";

					$qsubjectname=$mysqli->query($subjectname);
					$rowqsubjectname=$qsubjectname->fetch_assoc();
					$subname=substr($rowqsubjectname['borno_subject_eleven_twelve_name'],0,20);
					if($s1l==19)
					{
					$sid7=$subid;	
					$subname7=$subname;	
					}
					elseif($s1l==20)
					{
					$sid8=$subid;		
					$subname8=$subname;	
					}
					elseif($s1l==21)
					{
					$sid9=$subid;		
					$subname9=$subname;	
					}
					elseif($s1l==22)
					{
					$sid10=$subid;		
					$subname10=$subname;	
					}
					elseif($s1l==23)
					{
					$sid11=$subid;		
					$subname11=$subname;	
					}
					elseif($s1l==24)
					{
					$sid12=$subid;		
					$subname12=$subname;	
					}
					elseif($s1l==25)
					{
					$sid13=$subid;	
					$subname13=$subname;	
					}
					}
				

				

					$numtype ="select * from borno_result_number_type where borno_school_class_id='$studClass' AND borno_school_id='$schId' AND borno_school_session='$stsess'";
					$qnumtype=$mysqli->query($numtype);
					$rowqqnumtypee=$qnumtype->fetch_assoc();
					$numbertype1=substr($rowqqnumtypee['borno_school_number_type1'],0,3);
					$numbertype2=substr($rowqqnumtypee['borno_school_number_type2'],0,3);
					$numbertype3=substr($rowqqnumtypee['borno_school_number_type3'],0,3);
					$numbertype4=substr($rowqqnumtypee['borno_school_number_type4'],0,3);
					$numbertype5=substr($rowqqnumtypee['borno_school_number_type5'],0,3);
					$numbertype6=substr($rowqqnumtypee['borno_school_number_type6'],0,3);
					
require('../../../fpdf/fpdf.php');
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
	$this->Cell(20,5,$GLOBALS['stsess'],0,0,'L');
	$this->Cell(25,5,"Exam Year : ",0,0,'L');
	$this->Cell(15,5,$GLOBALS['styear'],0,0,'L');	
	$this->Ln();
	$this->SetFont('Arial','',11);
	$this->Cell(9,10,"Roll",1,0,'C');
    if($GLOBALS['s1l']==19)
	{
	$this->Cell(39,5,$GLOBALS['subname7'],1,0,'L');
	}
	if($GLOBALS['s1l']==20)
	{
	$this->Cell(39,5,$GLOBALS['subname7'],1,0,'L');
	$this->Cell(39,5,$GLOBALS['subname8'],1,0,'L');
	}
	if($GLOBALS['s1l']==21)
	{
	$this->Cell(39,5,$GLOBALS['subname7'],1,0,'L');
	$this->Cell(39,5,$GLOBALS['subname8'],1,0,'L');
	$this->Cell(39,5,$GLOBALS['subname9'],1,0,'L');
	}	
	if($GLOBALS['s1l']==22)
	{
	$this->Cell(39,5,$GLOBALS['subname7'],1,0,'L');
	$this->Cell(39,5,$GLOBALS['subname8'],1,0,'L');
	$this->Cell(39,5,$GLOBALS['subname9'],1,0,'L');
	$this->Cell(39,5,$GLOBALS['subname10'],1,0,'L');
	}	
	if($GLOBALS['s1l']==23)
	{
	$this->Cell(39,5,$GLOBALS['subname7'],1,0,'L');
	$this->Cell(39,5,$GLOBALS['subname8'],1,0,'L');
	$this->Cell(39,5,$GLOBALS['subname9'],1,0,'L');
	$this->Cell(39,5,$GLOBALS['subname10'],1,0,'L');
	$this->Cell(39,5,$GLOBALS['subname11'],1,0,'L');
	}	
	if($GLOBALS['s1l']==24)
	{
	$this->Cell(39,5,$GLOBALS['subname7'],1,0,'L');
	$this->Cell(39,5,$GLOBALS['subname8'],1,0,'L');
	$this->Cell(39,5,$GLOBALS['subname9'],1,0,'L');
	$this->Cell(39,5,$GLOBALS['subname10'],1,0,'L');
	$this->Cell(39,5,$GLOBALS['subname11'],1,0,'L');
	$this->Cell(39,5,$GLOBALS['subname12'],1,0,'L');	
	}	
	if($GLOBALS['s1l']>=25)
	{
	$this->Cell(39,5,$GLOBALS['subname7'],1,0,'L');
	$this->Cell(39,5,$GLOBALS['subname8'],1,0,'L');
	$this->Cell(39,5,$GLOBALS['subname9'],1,0,'L');
	$this->Cell(39,5,$GLOBALS['subname10'],1,0,'L');
	$this->Cell(39,5,$GLOBALS['subname11'],1,0,'L');
	$this->Cell(39,5,$GLOBALS['subname12'],1,0,'L');	
	$this->Cell(39,5,$GLOBALS['subname13'],1,0,'L');	
	}
	if($GLOBALS['s1l']<27)
	{
//	$this->Cell(39,5,$GLOBALS['subname12'],1,0,'L');	
//	$this->Cell(39,5,$GLOBALS['subname13'],1,0,'L');
	$this->Cell(15,5,Grand,1,0,'C');
	$this->Cell(15,5,GPA,1,0,'C');
	}
	$this->Ln();
	$this->SetFont('Arial','',10);
	$this->Cell(9,5,'',0,0,'C');

	if($GLOBALS['s1l']==19)
	{
	$this->SetFont('Arial','',8);    
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8); 
	$this->Cell(4,5,G,1,0,'C');
	}
	if($GLOBALS['s1l']==20)
	{
	$this->SetFont('Arial','',8);    
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8); 
	$this->Cell(4,5,G,1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(4,5,G,1,0,'C');
	}
	if($GLOBALS['s1l']==21)
	{
	$this->SetFont('Arial','',8);    
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8); 
	$this->Cell(4,5,G,1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(4,5,G,1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8); 
	$this->Cell(4,5,G,1,0,'C');	
	}
	if($GLOBALS['s1l']==22)
	{
	$this->SetFont('Arial','',8);    
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8); 
	$this->Cell(4,5,G,1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(4,5,G,1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8); 
	$this->Cell(4,5,G,1,0,'C');	
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8); 
	$this->Cell(4,5,G,1,0,'C');
	}
	if($GLOBALS['s1l']==23)
	{
	$this->SetFont('Arial','',8);       
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8); 
	$this->Cell(4,5,G,1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8); 
	$this->Cell(4,5,G,1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8); 
	$this->Cell(4,5,G,1,0,'C');	
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8); 
	$this->Cell(4,5,G,1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8); 
	$this->Cell(4,5,G,1,0,'C');
	}
	if($GLOBALS['s1l']==24)
	{
	$this->SetFont('Arial','',8);     
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8); 
	$this->Cell(4,5,G,1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8); 
	$this->Cell(4,5,G,1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8); 
	$this->Cell(4,5,G,1,0,'C');	
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8); 
	$this->Cell(4,5,G,1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8); 
	$this->Cell(4,5,G,1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8); 
	$this->Cell(4,5,G,1,0,'C');
	}
	if($GLOBALS['s1l']>=25)
	{
	$this->SetFont('Arial','',8);     
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8); 
	$this->Cell(4,5,G,1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8); 
	$this->Cell(4,5,G,1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8); 
	$this->Cell(4,5,G,1,0,'C');	
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8); 
	$this->Cell(4,5,G,1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8); 
	$this->Cell(4,5,G,1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8); 
	$this->Cell(4,5,G,1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8); 
	$this->Cell(4,5,G,1,0,'C');
	}
	if($GLOBALS['s1l']<27)
	{
	$this->SetFont('Arial','',11);    
	$this->Cell(15,5,Total,1,0,'C');
	$this->Cell(15,5,'',1,0,'C');
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
       $this->SetFont('Arial','',14);
    
    $this->Cell(90,5,"-------------------------",0,0,"L");
    $this->Cell(105);
    $this->Cell(200,5,"--------------------------------------",0,0,"L");
    $this->Ln();
    
    $this->Cell(90,5,"Principal Signature",0,0,"L");
    $this->Cell(102 );
    $this->Cell(200,5,"Convenor of Exam Committee",0,0,"L");
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

	$getminroll="select * from borno_class11_12_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_result_exam_year='$styear' order by borno_school_roll asc limit 0,1";
			
			
			$qgetminroll=$mysqli->query($getminroll);
	        $shqgetminroll=$qgetminroll->fetch_assoc();
			$genminroll=$shqgetminroll['borno_school_roll'];
	
	$countsubject="select * from borno_class11_12_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_result_exam_year='$styear' AND borno_school_roll='$genminroll' group by borno_subject_eleven_twelve_id asc";
	    $qcountsubject=$mysqli->query($countsubject);
		$subsl=0;
	while($shqcountsubject=$qcountsubject->fetch_assoc()){$subsl++;
	
	}					

 $result23 ="select * from borno_class11_12_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_result_exam_year='$styear' group by borno_school_roll asc";
$sl=0;
					$qgresult23=$mysqli->query($result23);
					$sl=0;
					while($row23=$qgresult23->fetch_assoc()){ $sl++;

					$gtstotal111=$row23['borno_school_roll'];
					$gtstname=substr($row23['borno_school_student_name'],0,15);

					$pdf->SetFont('Arial','',10);
					$pdf->Cell(9,5,$gtstotal111,1,0,'C');
					
 $resultsub1 ="select * from borno_class11_12_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term'  AND borno_school_stud_group='$group'  AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111' AND borno_subject_eleven_twelve_id='$sid7'";

					$qresultsub1=$mysqli->query($resultsub1);
					$rowqresultsub1=$qresultsub1->fetch_assoc();
					$subjectid=$rowqresultsub1['borno_subject_eleven_twelve_id'];
					$num1=$rowqresultsub1['temp_res_number_type1'];
					$num2=$rowqresultsub1['res_number_type2'];
					$num3=$rowqresultsub1['res_number_type3'];	
					$num4=$rowqresultsub1['res_number_type4'];
					$total=$rowqresultsub1['res_total_conv'];	
					$lg=$rowqresultsub1['res_lg'];

if($subsl>7)
{
$resultsub11 ="select * from borno_class11_12_test_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term'  AND borno_school_stud_group='$group'  AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111' AND borno_subject_eleven_twelve_id='$sid7'";

					$qresultsub11=$mysqli->query($resultsub11);
					$rowqresultsub11=$qresultsub11->fetch_assoc();
					$total=$rowqresultsub11['res_total_conv'];	
					$lg=$rowqresultsub11['res_lg'];	
}
if($sid7!="")
{
					if($subjectid!="")
					{
					$pdf->Cell(7,5,$num1,1,0,'C');
					$pdf->Cell(7,5,$num2,1,0,'C');
					$pdf->Cell(7,5,$num3,1,0,'C');
					$pdf->Cell(7,5,$num4,1,0,'C');
					$pdf->Cell(7,5,$total,1,0,'C');
					$pdf->Cell(4,5,$lg,1,0,'C');
					}
					else
					{
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(4,5,'',1,0,'C');
					}
}
 $resultsub2 ="select * from borno_class11_12_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term'  AND borno_school_stud_group='$group'  AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111' AND borno_subject_eleven_twelve_id='$sid8'";

					$qresultsub2=$mysqli->query($resultsub2);
					$rowqresultsub2=$qresultsub2->fetch_assoc();
					$subjectid=$rowqresultsub2['borno_subject_eleven_twelve_id'];
					$num1=$rowqresultsub2['temp_res_number_type1'];
					$num2=$rowqresultsub2['res_number_type2'];
					$num3=$rowqresultsub2['res_number_type3'];	
					$num4=$rowqresultsub2['res_number_type4'];
					$total=$rowqresultsub2['res_total_conv'];	
					$lg=$rowqresultsub2['res_lg'];
					
if($subsl>7)
{
$resultsub12 ="select * from borno_class11_12_test_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term'  AND borno_school_stud_group='$group'  AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111' AND borno_subject_eleven_twelve_id='$sid8'";

					$qresultsub12=$mysqli->query($resultsub12);
					$rowqresultsub12=$qresultsub12->fetch_assoc();
					$total=$rowqresultsub12['res_total_conv'];	
					$lg=$rowqresultsub12['res_lg'];	
}
if($sid8!="")
{
					if($subjectid!="")
					{
					$pdf->Cell(7,5,$num1,1,0,'C');
					$pdf->Cell(7,5,$num2,1,0,'C');
					$pdf->Cell(7,5,$num3,1,0,'C');
					$pdf->Cell(7,5,$num4,1,0,'C');
					$pdf->Cell(7,5,$total,1,0,'C');
					$pdf->Cell(4,5,$lg,1,0,'C');
					}
					else
					{
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(4,5,'',1,0,'C');
					}
}
 $resultsub3 ="select * from borno_class11_12_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term'  AND borno_school_stud_group='$group'  AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111' AND borno_subject_eleven_twelve_id='$sid9'";

					$qresultsub3=$mysqli->query($resultsub3);
					$rowqresultsub3=$qresultsub3->fetch_assoc();
					$subjectid=$rowqresultsub3['borno_subject_eleven_twelve_id'];
					$num1=$rowqresultsub3['temp_res_number_type1'];
					$num2=$rowqresultsub3['res_number_type2'];
					$num3=$rowqresultsub3['res_number_type3'];	
					$num4=$rowqresultsub3['res_number_type4'];
					$total=$rowqresultsub3['res_total_conv'];	
					$lg=$rowqresultsub3['res_lg'];

if($subsl>7)
{
$resultsub13 ="select * from borno_class11_12_test_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term'  AND borno_school_stud_group='$group'  AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111' AND borno_subject_eleven_twelve_id='$sid9'";

					$qresultsub13=$mysqli->query($resultsub13);
					$rowqresultsub13=$qresultsub13->fetch_assoc();
					$total=$rowqresultsub13['res_total_conv'];	
					$lg=$rowqresultsub13['res_lg'];	
}
if($sid9!="")
{				
					if($subjectid!="")
					{
					$pdf->Cell(7,5,$num1,1,0,'C');
					$pdf->Cell(7,5,$num2,1,0,'C');
					$pdf->Cell(7,5,$num3,1,0,'C');
					$pdf->Cell(7,5,$num4,1,0,'C');
					$pdf->Cell(7,5,$total,1,0,'C');
					$pdf->Cell(4,5,$lg,1,0,'C');
					}
					else
					{
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(4,5,'',1,0,'C');
					}
}
 $resultsub4 ="select * from borno_class11_12_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term'  AND borno_school_stud_group='$group'  AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111' AND borno_subject_eleven_twelve_id='$sid10'";

					$qresultsub4=$mysqli->query($resultsub4);
					$rowqresultsub4=$qresultsub4->fetch_assoc();
					$subjectid=$rowqresultsub4['borno_subject_eleven_twelve_id'];
					$num1=$rowqresultsub4['temp_res_number_type1'];
					$num2=$rowqresultsub4['res_number_type2'];
					$num3=$rowqresultsub4['res_number_type3'];	
					$num4=$rowqresultsub4['res_number_type4'];
					$total=$rowqresultsub4['res_total_conv'];	
					$lg=$rowqresultsub4['res_lg'];
					
if($subsl>7)
{
$resultsub14 ="select * from borno_class11_12_test_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term'  AND borno_school_stud_group='$group'  AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111' AND borno_subject_eleven_twelve_id='$sid10'";

					$qresultsub14=$mysqli->query($resultsub14);
					$rowqresultsub14=$qresultsub14->fetch_assoc();
					$total=$rowqresultsub14['res_total_conv'];	
					$lg=$rowqresultsub14['res_lg'];	
}
if($sid10!="")
{
					if($subjectid!="")
					{
					$pdf->Cell(7,5,$num1,1,0,'C');
					$pdf->Cell(7,5,$num2,1,0,'C');
					$pdf->Cell(7,5,$num3,1,0,'C');
					$pdf->Cell(7,5,$num4,1,0,'C');
					$pdf->Cell(7,5,$total,1,0,'C');
					$pdf->Cell(4,5,$lg,1,0,'C');
					}
					else
					{
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(4,5,'',1,0,'C');
					}
}
 $resultsub5 ="select * from borno_class11_12_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term'  AND borno_school_stud_group='$group'  AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111' AND borno_subject_eleven_twelve_id='$sid11'";

					$qresultsub5=$mysqli->query($resultsub5);
					$rowqresultsub5=$qresultsub5->fetch_assoc();
					$subjectid=$rowqresultsub5['borno_subject_eleven_twelve_id'];
					$num1=$rowqresultsub5['temp_res_number_type1'];
					$num2=$rowqresultsub5['res_number_type2'];
					$num3=$rowqresultsub5['res_number_type3'];	
					$num4=$rowqresultsub5['res_number_type4'];
					$total=$rowqresultsub5['res_total_conv'];	
					$lg=$rowqresultsub5['res_lg'];
					
if($subsl>7)
{
$resultsub15 ="select * from borno_class11_12_test_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term'  AND borno_school_stud_group='$group'  AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111' AND borno_subject_eleven_twelve_id='$sid11'";

					$qresultsub15=$mysqli->query($resultsub15);
					$rowqresultsub15=$qresultsub15->fetch_assoc();
					$total=$rowqresultsub15['res_total_conv'];	
					$lg=$rowqresultsub15['res_lg'];	
}
if($sid11!="")
{
					if($subjectid!="")
					{
					$pdf->Cell(7,5,$num1,1,0,'C');
					$pdf->Cell(7,5,$num2,1,0,'C');
					$pdf->Cell(7,5,$num3,1,0,'C');
					$pdf->Cell(7,5,$num4,1,0,'C');
					$pdf->Cell(7,5,$total,1,0,'C');
					$pdf->Cell(4,5,$lg,1,0,'C');
					}
					else
					{
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(4,5,'',1,0,'C');
					}
}
 $resultsub6 ="select * from borno_class11_12_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term'  AND borno_school_stud_group='$group'  AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111' AND borno_subject_eleven_twelve_id='$sid12'";

					$qresultsub6=$mysqli->query($resultsub6);
					$rowqresultsub6=$qresultsub6->fetch_assoc();
					$subjectid=$rowqresultsub6['borno_subject_eleven_twelve_id'];
					$num1=$rowqresultsub6['temp_res_number_type1'];
					$num2=$rowqresultsub6['res_number_type2'];
					$num3=$rowqresultsub6['res_number_type3'];	
					$num4=$rowqresultsub6['res_number_type4'];
					$total=$rowqresultsub6['res_total_conv'];	
					$lg=$rowqresultsub6['res_lg'];
					
if($subsl>7)
{
$resultsub16 ="select * from borno_class11_12_test_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term'  AND borno_school_stud_group='$group'  AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111' AND borno_subject_eleven_twelve_id='$sid12'";

					$qresultsub16=$mysqli->query($resultsub16);
					$rowqresultsub16=$qresultsub16->fetch_assoc();
					$total=$rowqresultsub16['res_total_conv'];	
					$lg=$rowqresultsub16['res_lg'];	
}
if($sid12!="")
{
					if($subjectid!="")
					{
					$pdf->Cell(7,5,$num1,1,0,'C');
					$pdf->Cell(7,5,$num2,1,0,'C');
					$pdf->Cell(7,5,$num3,1,0,'C');
					$pdf->Cell(7,5,$num4,1,0,'C');
					$pdf->Cell(7,5,$total,1,0,'C');
					$pdf->Cell(4,5,$lg,1,0,'C');
					}
					else
					{
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(4,5,'',1,0,'C');
					}
}					
 $resultsub7 ="select * from borno_class11_12_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term'  AND borno_school_stud_group='$group'  AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111' AND borno_subject_eleven_twelve_id='$sid13'";

					$qresultsub7=$mysqli->query($resultsub7);
					$rowqresultsub7=$qresultsub7->fetch_assoc();
					$subjectid=$rowqresultsub7['borno_subject_eleven_twelve_id'];
					$num1=$rowqresultsub7['temp_res_number_type1'];
					$num2=$rowqresultsub7['res_number_type2'];
					$num3=$rowqresultsub7['res_number_type3'];	
					$num4=$rowqresultsub7['res_number_type4'];
					$total=$rowqresultsub7['res_total_conv'];	
					$lg=$rowqresultsub7['res_lg'];
					
if($subsl>7)
{
$resultsub17 ="select * from borno_class11_12_test_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term'  AND borno_school_stud_group='$group'  AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111' AND borno_subject_eleven_twelve_id='$sid13'";

					$qresultsub17=$mysqli->query($resultsub17);
					$rowqresultsub17=$qresultsub17->fetch_assoc();
					$total=$rowqresultsub17['res_total_conv'];	
					$lg=$rowqresultsub17['res_lg'];	
}
if($sid13!="")
{
                    if($subjectid!="")
					{
					$pdf->Cell(7,5,$num1,1,0,'C');
					$pdf->Cell(7,5,$num2,1,0,'C');
					$pdf->Cell(7,5,$num3,1,0,'C');
					$pdf->Cell(7,5,$num4,1,0,'C');
					$pdf->Cell(7,5,$total,1,0,'C');
					$pdf->Cell(4,5,$lg,1,0,'C');
					}
					else
					{
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(4,5,'',1,0,'C');
					}
}

$resultgrand ="select * from borno_school_11_12_merit where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term'  AND borno_school_stud_group='$group'  AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111'";

					$qresultgrand=$mysqli->query($resultgrand);
					$rowqresultgrand=$qresultgrand->fetch_assoc();
					$grandtotal=$rowqresultgrand['grandtotal'];	
					$gpa=$rowqresultgrand['gpa'];
					
					
if($sid8=="" OR $sid9=="" OR $sid10=="" OR $sid11=="" OR $sid12=="" OR $sid13=="")
{
$pdf->SetFont('Arial','',11);    
$pdf->Cell(15,5,$grandtotal,1,0,'C');
$pdf->Cell(15,5,$gpa,1,0,'C');    
}	
$pdf->Ln();					
					
					
					
					
								
					
						}
$pdf->Output();
?>