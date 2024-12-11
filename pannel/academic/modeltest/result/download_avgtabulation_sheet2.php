<?php
$branchId=$_GET['stbranch'];
$schId=$_GET['schoolId'];
$studClass=$_GET['classId'];
$shiftId=$_GET['shiftId'];
$section=$_GET['sectionId'];
$stsess=$_GET['scsess'];
$group=$_GET['group'];
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
if($studClass==1 OR $studClass==2)
{						
 $subject ="select * from borno_class9_10_temp_mark1 where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_school_stud_group='$group' AND borno_result_term_id='$term' group by borno_subject_nine_ten_id asc";
$s1l=0;
					$qsubject=$mysqli->query($subject);
					while($rowqsubject=$qsubject->fetch_assoc()){ $s1l++;
					$subid=$rowqsubject['borno_subject_nine_ten_id'];
					
					$subjectname ="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$subid'";

					$qsubjectname=$mysqli->query($subjectname);
					$rowqsubjectname=$qsubjectname->fetch_assoc();
					$subname=substr($rowqsubjectname['borno_subject_nine_ten_name'],0,22);
				if($s1l==1)
					{
					$sid1=$subid;	
					$subname1=$subname;	
					}
					elseif($s1l==2)
					{
					$sid2=$subid;		
					$subname2=$subname;
					}
					elseif($s1l==3)
					{
					$sid3=$subid;		
					$subname3=$subname;	
					}
					elseif($s1l==4)
					{
					$sid4=$subid;		
					$subname4=$subname;	
					}
					elseif($s1l==5)
					{
					$sid5=$subid;		
					$subname5=$subname;	
					}
					elseif($s1l==6)
					{
					$sid6=$subid;		
					$subname6=$subname;
					}
					elseif($s1l==7)
					{
					$sid7=$subid;	
					$subname7=$subname;	
					}
					elseif($s1l==8)
					{
					$sid8=$subid;	
					$subname8=$subname;	
					}
					elseif($s1l==9)
					{
					$sid9=$subid;	
					$subname9=$subname;	
					}
					elseif($s1l==10)
					{
					$sid10=$subid;	
					$subname10=$subname;	
					}
					elseif($s1l==11)
					{
					$sid11=$subid;	
					$subname11=$subname;	
					}
					elseif($s1l==12)
					{
					$sid12=$subid;	
					$subname12=$subname;	
					}
					elseif($s1l==13)
					{
					$sid13=$subid;	
					$subname13=$subname;	
					}
					elseif($s1l==14)
					{
					$sid14=$subid;	
					$subname14=$subname;	
					}														
					elseif($s1l==15)
					{
					$sid15=$subid;	
					$subname15=$subname;	
					}
					}
}
elseif($studClass==3 OR $studClass==4 OR $studClass==5)
{						
 $subject ="select * from borno_class6_8_temp_mark1 where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' group by subject_id_six_eight asc";
$s1l=0;
					$qsubject=$mysqli->query($subject);
					while($rowqsubject=$qsubject->fetch_assoc()){ $s1l++;
					$subid=$rowqsubject['subject_id_six_eight'];
					
					$subjectname ="select * from borno_subject_six_eight where subject_id_six_eight='$subid'";

					$qsubjectname=$mysqli->query($subjectname);
					$rowqsubjectname=$qsubjectname->fetch_assoc();
					$subname=substr($rowqsubjectname['six_eight_subject_name'],0,26);
					if($s1l==1)
					{
					$sid1=$subid;	
					$subname1=$subname;	
					}
					elseif($s1l==2)
					{
					$sid2=$subid;		
					$subname2=$subname;
					}
					elseif($s1l==3)
					{
					$sid3=$subid;		
					$subname3=$subname;	
					}
					elseif($s1l==4)
					{
					$sid4=$subid;		
					$subname4=$subname;	
					}
					elseif($s1l==5)
					{
					$sid5=$subid;		
					$subname5=$subname;	
					}
					elseif($s1l==6)
					{
					$sid6=$subid;		
					$subname6=$subname;
					}
					elseif($s1l==7)
					{
					$sid7=$subid;	
					$subname7=$subname;	
					}
					elseif($s1l==8)
					{
					$sid8=$subid;	
					$subname8=$subname;	
					}
					elseif($s1l==9)
					{
					$sid9=$subid;	
					$subname9=$subname;	
					}
					elseif($s1l==10)
					{
					$sid10=$subid;	
					$subname10=$subname;	
					}
					elseif($s1l==11)
					{
					$sid11=$subid;	
					$subname11=$subname;	
					}
					elseif($s1l==12)
					{
					$sid12=$subid;	
					$subname12=$subname;	
					}
					elseif($s1l==13)
					{
					$sid13=$subid;	
					$subname13=$subname;	
					}										
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
	$this->Cell(20,5,$GLOBALS['stsess'],0,0,'L');
	$this->Cell(10,5,"Part-2",0,0,'L');
	$this->Ln();
	$this->SetFont('Arial','',10);
	$this->Cell(8,10,"Roll",1,0,'C');
	//$this->Cell(25,10,"Student Name",1,0,'L');
	$this->Cell(12,10,"Exam",1,0,'C');
    
    if($GLOBALS['s1l']==6)
	{
	$this->Cell(48,5,$GLOBALS['subname6'],1,0,'L');
	$this->Cell(12,5,Grand,1,0,'C');
	$this->Cell(10,5,GPA,1,0,'C');
	}
	if($GLOBALS['s1l']==7)
	{
	$this->Cell(48,5,$GLOBALS['subname6'],1,0,'L');
	$this->Cell(48,5,$GLOBALS['subname7'],1,0,'L');
	$this->Cell(12,5,Grand,1,0,'C');
	$this->Cell(10,5,GPA,1,0,'C');
	}
	if($GLOBALS['s1l']==8)
	{
	$this->Cell(48,5,$GLOBALS['subname6'],1,0,'L');
	$this->Cell(48,5,$GLOBALS['subname7'],1,0,'L');
	$this->Cell(48,5,$GLOBALS['subname8'],1,0,'L');
	$this->Cell(12,5,Grand,1,0,'C');
	$this->Cell(10,5,GPA,1,0,'C');
	}
	if($GLOBALS['s1l']==9)
	{
	$this->Cell(48,5,$GLOBALS['subname6'],1,0,'L');
	$this->Cell(48,5,$GLOBALS['subname7'],1,0,'L');
	$this->Cell(48,5,$GLOBALS['subname8'],1,0,'L');
	$this->Cell(48,5,$GLOBALS['subname9'],1,0,'L');
	$this->Cell(12,5,Grand,1,0,'C');
	$this->Cell(10,5,GPA,1,0,'C');
	}
	elseif($GLOBALS['s1l']>=10)
	{
	$this->Cell(48,5,$GLOBALS['subname6'],1,0,'L');
	$this->Cell(48,5,$GLOBALS['subname7'],1,0,'L');
	$this->Cell(48,5,$GLOBALS['subname8'],1,0,'L');
	$this->Cell(48,5,$GLOBALS['subname9'],1,0,'L');
	$this->Cell(48,5,$GLOBALS['subname10'],1,0,'L');
	$this->Cell(12,5,Grand,1,0,'C');
	$this->Cell(10,5,GPA,1,0,'C');
	}
	$this->Ln();
	
	$this->SetFont('Arial','',8); 
	$this->Cell(8,5,'',0,0,'C');
//	$this->Cell(25,5,'',0,0,'L');
	$this->Cell(12,5,'',0,0,'L');
   if($GLOBALS['s1l']==6)
	{
	$this->SetFont('Arial','',8);       
	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype6'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(5,5,G,1,0,'C');
	$this->SetFont('Arial','',11);
	$this->Cell(15,5,Total,1,0,'C');
	$this->Cell(10,5,'',1,0,'C');
	}
	if($GLOBALS['s1l']==7)
	{
	$this->SetFont('Arial','',8);       
	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype6'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(5,5,G,1,0,'C');	
	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype6'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(5,5,G,1,0,'C');
	$this->SetFont('Arial','',11);
	$this->Cell(15,5,Total,1,0,'C');
	$this->Cell(10,5,'',1,0,'C');
	}
	if($GLOBALS['s1l']==8)
	{
	$this->SetFont('Arial','',8);       
	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype6'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(5,5,G,1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype6'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(5,5,G,1,0,'C');	
	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype6'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(5,5,G,1,0,'C');
	$this->SetFont('Arial','',11);
	$this->Cell(15,5,Total,1,0,'C');
	$this->Cell(10,5,'',1,0,'C');
	}	
	if($GLOBALS['s1l']==9)
	{
	$this->SetFont('Arial','',8);       
	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype6'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(5,5,G,1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype6'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(5,5,G,1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype6'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(5,5,G,1,0,'C');	
	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype6'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(5,5,G,1,0,'C');
	$this->SetFont('Arial','',11);
	$this->Cell(15,5,Total,1,0,'C');
	$this->Cell(10,5,'',1,0,'C');
	}
	if($GLOBALS['s1l']>=10)
	{
	$this->SetFont('Arial','',8);       
	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype6'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(5,5,G,1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype6'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(5,5,G,1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype6'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(5,5,G,1,0,'C');	
	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype6'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(5,5,G,1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype5'],1,0,'C');
	$this->Cell(6,5,$GLOBALS['numbertype6'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(5,5,G,1,0,'C');
	$this->SetFont('Arial','',11);
	$this->Cell(12,5,Total,1,0,'C');
	$this->Cell(10,5,'',1,0,'L');
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
if($studClass==1 OR $studClass==2 )
{	
$result23 ="select * from borno_class9_10_average_mark1 where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_school_stud_group='$group' AND borno_result_term_id='0' group by borno_school_roll asc";
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
$fnsterm=substr($sqgtterm['borno_result_term_name'],0,8);
					
					$pdf->SetFont('Arial','',8);
					$pdf->Cell(8,5,$gtstotal111,1,0,'C');
				//	$pdf->Cell(35,5,$gtstname,1,0,'L');
					$pdf->Cell(12,5,$fnsterm,1,0,'C');	
					
$resultsub ="select * from borno_class9_10_temp_mark1 where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_school_stud_group='$group' AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id between '$sid6' AND '$sid10' order by borno_subject_nine_ten_id asc";
$sl2=0;
					$qresultsub=$mysqli->query($resultsub);
					while($rowqresultsub=$qresultsub->fetch_assoc()){$sl2++;
					$subid=$rowqresultsub['borno_subject_nine_ten_id'];
					$num1=$rowqresultsub['temp_res_number_type1'];
					$num2=$rowqresultsub['temp_res_number_type2'];
					$num3=$rowqresultsub['temp_res_number_type3'];
					$num4=$rowqresultsub['temp_res_number_type4'];			
					$num5=$rowqresultsub['temp_res_number_type5'];
					$num6=$rowqresultsub['temp_res_number_type6'];
					
$resultlg ="select * from borno_class9_10_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_school_stud_group='$group'  AND borno_result_term_id='$term' AND borno_subject_nine_ten_id='$subid' AND borno_school_roll='$gtstotal111'";

					$resultlg11=$mysqli->query($resultlg);
					$resultlg1123=$resultlg11->fetch_assoc();					
					
					$ttl=$resultlg1123['res_total_conv'];	
					$lg=$resultlg1123['res_lg'];

					$pdf->Cell(6,5,$num1,1,0,'C');
					$pdf->Cell(6,5,$num2,1,0,'C');
					$pdf->Cell(6,5,$num3,1,0,'C');
					$pdf->Cell(6,5,$num4,1,0,'C');
					$pdf->Cell(6,5,$num5,1,0,'C');	
					$pdf->Cell(6,5,$num6,1,0,'C');	
					$pdf->Cell(7,5,$ttl,1,0,'C');	
					$pdf->Cell(5,5,$lg,1,0,'C');			
					}
					
$resultgrand ="select * from borno_school_9_10_merit where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_school_stud_group='$group' AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111'";

					$qresultgrand=$mysqli->query($resultgrand);
					$rowqresultgrand=$qresultgrand->fetch_assoc();
					$grand=$rowqresultgrand['grandtotal'];
					$gpa=$rowqresultgrand['gpa'];					
					$pdf->Cell(12,5,$grand,1,0,'C');
					$pdf->Cell(10,5,$gpa,1,0,'C');					
					
					
$pdf->Ln();
				}
				
$pdf->SetFont('Arial','',8);
					$pdf->Cell(8,5,$gtstotal111,1,0,'C');
				//	$pdf->Cell(35,5,$gtstname,1,0,'L');
					$pdf->Cell(12,5,Average,1,0,'C');	
					
$resultsubavg ="select * from borno_class9_10_average_mark1 where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_school_stud_group='$group' AND borno_result_term_id='0' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id between '$sid6' AND '$sid10' order by borno_subject_nine_ten_id asc";
$sl2=0;
					$qresultsubavg=$mysqli->query($resultsubavg);
					while($rowqresultsubavg=$qresultsubavg->fetch_assoc()){$sl2++;
					$subida=$rowqresultsubavg['borno_subject_nine_ten_id'];
					$numa1=$rowqresultsubavg['temp_res_number_type1'];
					$numa2=$rowqresultsubavg['temp_res_number_type2'];
					$numa3=$rowqresultsubavg['temp_res_number_type3'];
					$numa4=$rowqresultsubavg['temp_res_number_type4'];
					$numa5=$rowqresultsubavg['temp_res_number_type5'];
					$numa6=$rowqresultsubavg['temp_res_number_type6'];
					
$resultlgavg ="select * from borno_class9_10_avg_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_school_stud_group='$group' AND borno_result_term_id='0' AND borno_subject_nine_ten_id='$subida' AND borno_school_roll='$gtstotal111'";

					$resultlg11avg=$mysqli->query($resultlgavg);
					$resultlg1123avg=$resultlg11avg->fetch_assoc();					
					
					$ttla=$resultlg1123avg['res_total_conv'];	
					$lga=$resultlg1123avg['res_lg'];

					$pdf->Cell(6,5,$numa1,1,0,'C');
					$pdf->Cell(6,5,$numa2,1,0,'C');
					$pdf->Cell(6,5,$numa3,1,0,'C');
					$pdf->Cell(6,5,$numa4,1,0,'C');
					$pdf->Cell(6,5,$numa5,1,0,'C');	
					$pdf->Cell(6,5,$numa6,1,0,'C');
					$pdf->Cell(7,5,$ttla,1,0,'C');	
					$pdf->Cell(5,5,$lga,1,0,'C');	
					}
					
$resultgrandavg ="select * from borno_school_910_avg_merit where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_subject_nine_ten_dept='$group' AND borno_result_term_id='0' AND borno_school_roll='$gtstotal111'";

					$qresultgrandavg=$mysqli->query($resultgrandavg);
					$rowqresultgrandavg=$qresultgrandavg->fetch_assoc();
					$grand1=$rowqresultgrandavg['grandtotal'];
					$gpa1=$rowqresultgrandavg['gpa'];					
					$pdf->Cell(12,5,$grand1,1,0,'C');
					$pdf->Cell(10,5,$gpa1,1,0,'C');					
					
					
$pdf->Ln();										
				$pdf->Cell(118,2,'',0,5,'C');	
	}
}


elseif($studClass==3 OR $studClass==4 OR $studClass==5)
{	
$result23 ="select * from borno_class6_8_avg_temp_mark where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='0' group by borno_school_roll asc";
$sl=0;
					$qgresult23=$mysqli->query($result23);
					while($row23=$qgresult23->fetch_assoc()){ $sl++;

					$gtstotal111=$row23['borno_school_roll'];
					$gtstname=$row23['borno_school_student_name'];

					
$gtterm="select * from borno_result_add_term where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' order by borno_result_term_id asc";
				
				$qgterm=$mysqli->query($gtterm);
				$st=0;
				while($shsterm=$qgterm->fetch_assoc()){$st++;	
				$term=$shsterm['borno_result_term_id'];						
					
$gtterm="SELECT * FROM borno_result_add_term where borno_result_term_id=$term";
					$qgtterm=$mysqli->query($gtterm);
					$sqgtterm=$qgtterm->fetch_assoc();
$fnsterm=substr($sqgtterm['borno_result_term_name'],0,8);
					
					$pdf->SetFont('Arial','',8);
					$pdf->Cell(8,5,$gtstotal111,1,0,'C');
			//		$pdf->Cell(35,5,$gtstname,1,0,'L');
					$pdf->Cell(12,5,$fnsterm,1,0,'C');	
					
 $resultsub ="select * from borno_class6_8_temp_mark1 where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight between '$sid6' AND '$sid10' order by subject_id_six_eight asc";
$sl2=0;
					$qresultsub=$mysqli->query($resultsub);
					while($rowqresultsub=$qresultsub->fetch_assoc()){$sl2++;
					$subid=$rowqresultsub['subject_id_six_eight'];
					$num1=$rowqresultsub['temp_res_number_type1'];
					$num2=$rowqresultsub['temp_res_number_type2'];
					$num3=$rowqresultsub['temp_res_number_type3'];
					$num4=$rowqresultsub['temp_res_number_type4'];			
					$num5=$rowqresultsub['temp_res_number_type5'];
					$num6=$rowqresultsub['temp_res_number_type6'];

					
$resultlg ="select * from borno_class6_8_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND subject_id_six_eight='$subid' AND borno_school_roll='$gtstotal111'";

					$resultlg11=$mysqli->query($resultlg);
					$resultlg1123=$resultlg11->fetch_assoc();					
					
					$ttl=$resultlg1123['res_total_conv'];	
					$lg=$resultlg1123['res_lg'];

					$pdf->Cell(6,5,$num1,1,0,'C');
					$pdf->Cell(6,5,$num2,1,0,'C');
					$pdf->Cell(6,5,$num3,1,0,'C');
					$pdf->Cell(6,5,$num4,1,0,'C');
					$pdf->Cell(6,5,$num5,1,0,'C');	
					$pdf->Cell(6,5,$num6,1,0,'C');				
					$pdf->Cell(7,5,$ttl,1,0,'C');	
					$pdf->Cell(5,5,$lg,1,0,'C');				
					}
					
$resultgrand ="select * from borno_school_6_8_merit where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111'";

					$qresultgrand=$mysqli->query($resultgrand);
					$rowqresultgrand=$qresultgrand->fetch_assoc();
					$grand=$rowqresultgrand['grandtotal'];
					$gpa=$rowqresultgrand['gpa'];					
					$pdf->Cell(12,5,$grand,1,0,'C');
					$pdf->Cell(10,5,$gpa,1,0,'C');					
					
					
$pdf->Ln();
				}
				

					$pdf->Cell(8,5,$gtstotal111,1,0,'C');
			//		$pdf->Cell(35,5,$gtstname,1,0,'L');
					$pdf->Cell(12,5,Average,1,0,'C');	
					
$resultsubavg ="select * from borno_class6_8_avg_temp_mark where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='0' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight between '$sid6' AND '$sid10' order by subject_id_six_eight asc";
$sl2=0;
					$qresultsubavg=$mysqli->query($resultsubavg);
					while($rowqresultsubavg=$qresultsubavg->fetch_assoc()){$sl2++;
					$subida=$rowqresultsubavg['subject_id_six_eight'];
					$numa1=$rowqresultsubavg['temp_res_number_type1'];
					$numa2=$rowqresultsubavg['res_number_type2'];
					$numa3=$rowqresultsubavg['res_number_type3'];
					$numa4=$rowqresultsubavg['res_number_type4'];	
					$numa5=$rowqresultsubavg['res_number_type5'];
					$numa6=$rowqresultsubavg['res_number_type6'];			
$resultlgavg ="select * from borno_class6_8_avg_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='0' AND subject_id_six_eight='$subida' AND borno_school_roll='$gtstotal111'";

					$resultlg11avg=$mysqli->query($resultlgavg);
					$resultlg1123avg=$resultlg11avg->fetch_assoc();					
					
					$ttla=$resultlg1123avg['res_total_conv'];	
					$lga=$resultlg1123avg['res_lg'];

					$pdf->Cell(6,5,$numa1,1,0,'C');
					$pdf->Cell(6,5,$numa2,1,0,'C');
					$pdf->Cell(6,5,$numa3,1,0,'C');
					$pdf->Cell(6,5,$numa4,1,0,'C');
					$pdf->Cell(6,5,$numa5,1,0,'C');	
					$pdf->Cell(6,5,$numa6,1,0,'C');		
					$pdf->Cell(7,5,$ttla,1,0,'C');	
					$pdf->Cell(5,5,$lga,1,0,'C');		
					}
					
$resultgrandavg ="select * from borno_school_68_avg_merit where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='0' AND borno_school_roll='$gtstotal111'";

					$qresultgrandavg=$mysqli->query($resultgrandavg);
					$rowqresultgrandavg=$qresultgrandavg->fetch_assoc();
					$grand1=$rowqresultgrandavg['grandtotal'];
					$gpa1=$rowqresultgrandavg['gpa'];					
					$pdf->Cell(12,5,$grand1,1,0,'C');
					$pdf->Cell(10,5,$gpa1,1,0,'C');					
					
					
$pdf->Ln();										
				$pdf->Cell(118,2,'',0,5,'C');	
						}
}
$pdf->Output();
?>