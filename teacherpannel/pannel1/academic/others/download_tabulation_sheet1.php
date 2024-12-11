<?php
$branchId=$_GET['stbranch'];
$schId=$_GET['schoolId'];
$studClass=$_GET['classId'];
$shiftId=$_GET['shiftId'];
$section=$_GET['sectionId'];
$stsess=$_GET['scsess'];
$term=$_GET['sctermId'];
$group=$_GET['group'];
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
 $subject ="select borno_subject_nine_ten_id from borno_class9_10_temp_mark1 where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_stud_group='$group' group by borno_subject_nine_ten_id asc";
$s1l=0;
					$qsubject=$mysqli->query($subject);
					while($rowqsubject=$qsubject->fetch_assoc()){ $s1l++;
					$subid=$rowqsubject['borno_subject_nine_ten_id'];
					
					$subjectname ="select * from borno_subject_nine_ten where borno_subject_nine_ten_id='$subid'";

					$qsubjectname=$mysqli->query($subjectname);
					$rowqsubjectname=$qsubjectname->fetch_assoc();
					$subname=substr($rowqsubjectname['borno_subject_nine_ten_name'],0,20);
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
					$subname7=$subname;	
					}
					elseif($s1l==8)
					{
					$subname8=$subname;	
					}
					elseif($s1l==9)
					{
					$subname9=$subname;	
					}
					elseif($s1l==10)
					{
					$subname10=$subname;	
					}
					elseif($s1l==11)
					{
					$subname11=$subname;	
					}
					elseif($s1l==12)
					{
					$subname12=$subname;	
					}
					elseif($s1l==13)
					{
					$subname13=$subname;	
					}
					}
				
}					
elseif($studClass==3 OR $studClass==4 OR $studClass==5)
{						
 $subject ="select subject_id_six_eight from borno_class6_8_temp_mark1 where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' group by subject_id_six_eight asc";
$s1l=0;
					$qsubject=$mysqli->query($subject);
					while($rowqsubject=$qsubject->fetch_assoc()){ $s1l++;
					$subid=$rowqsubject['subject_id_six_eight'];
					
					$subjectname ="select * from borno_subject_six_eight where subject_id_six_eight='$subid'";

					$qsubjectname=$mysqli->query($subjectname);
					$rowqsubjectname=$qsubjectname->fetch_assoc();
					$subname=substr($rowqsubjectname['six_eight_subject_name'],0,20);
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
					$subname7=$subname;	
					}
					elseif($s1l==8)
					{
					$subname8=$subname;	
					}
					elseif($s1l==9)
					{
					$subname9=$subname;	
					}
					elseif($s1l==10)
					{
					$subname10=$subname;	
					}
					elseif($s1l==11)
					{
					$subname11=$subname;	
					}
					elseif($s1l==12)
					{
					$subname12=$subname;	
					}
					elseif($s1l==13)
					{
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
	$this->Cell(8,10,"Roll",1,0,'C');
	$this->Cell(35,10,"Student Name",1,0,'L');
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
	

	$this->Ln();
	$this->SetFont('Arial','',10);
	$this->Cell(8,5,'',0,0,'C');
	$this->Cell(35,5,'',0,0,'L');
	if($GLOBALS['s1l']==1)
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
	}
	if($GLOBALS['s1l']==2)
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
	}
	if($GLOBALS['s1l']==3)
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
	}
	if($GLOBALS['s1l']==4)
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
	}
	if($GLOBALS['s1l']>=5)
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


					
if($studClass==1 OR $studClass==2)
{
 $result23 ="select borno_school_roll,borno_school_student_name from borno_class9_10_temp_mark1 where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_stud_group='$group' group by borno_school_roll,borno_school_student_name asc";
$sl=0;
					$qgresult23=$mysqli->query($result23);
					while($row23=$qgresult23->fetch_assoc()){ $sl++;

					$gtstotal111=$row23['borno_school_roll'];
					$gtstname=substr($row23['borno_school_student_name'],0,14);

					$pdf->SetFont('Arial','',9);
					$pdf->Cell(8,5,$gtstotal111,1,0,'C');
					$pdf->Cell(35,5,$gtstname,1,0,'L');
	if($sid1=="" AND $sid2=="" AND $sid3=="" AND $sid4=="" AND $sid5=="" AND $sid6==""){$subidend=$sid1;}	
	elseif($sid2=="" AND $sid3=="" AND $sid4=="" AND $sid5=="" AND $sid6==""){$subidend=$sid1;}
	elseif($sid2=="" AND $sid3=="" AND $sid4=="" AND $sid5=="" AND $sid6==""){$subidend=$sid1;}
	elseif($sid3=="" AND $sid4=="" AND $sid5=="" AND $sid6==""){$subidend=$sid2;}
	elseif($sid4=="" AND $sid5=="" AND $sid6==""){$subidend=$sid3;}
	elseif($sid5=="" AND $sid6==""){$subidend=$sid4;}
	elseif($sid6==""){$subidend=$sid5;}
	else{$subidend=$sid5;}
 $resultsub ="select borno_subject_nine_ten_id from borno_class9_10_temp_mark1 where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term'  AND borno_school_stud_group='$group' AND borno_subject_nine_ten_id between '$sid1' AND '$subidend' group by borno_subject_nine_ten_id asc";

$sl2=0;
					$qresultsub=$mysqli->query($resultsub);
					while($rowqresultsub=$qresultsub->fetch_assoc()){$sl2++;
					$subjectid=$rowqresultsub['borno_subject_nine_ten_id'];
					
 $resulttotal1 ="select * from borno_class9_10_temp_mark1 where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term'  AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id='$subjectid'";
					$qresulttotal1=$mysqli->query($resulttotal1);
					$rowqresulttotal1=$qresulttotal1->fetch_assoc();					
					$subjectid1=$rowqresulttotal1['borno_subject_nine_ten_id'];
					$num1=$rowqresulttotal1['temp_res_number_type1'];
					$num2=$rowqresulttotal1['temp_res_number_type2'];
					$num3=$rowqresulttotal1['temp_res_number_type3'];	
					$num4=$rowqresulttotal1['temp_res_number_type4'];
					$num5=$rowqresulttotal1['temp_res_number_type5'];	
					$num6=$rowqresulttotal1['temp_res_number_type6'];			
					

		       if($subjectid1!="")
                {				
 $resulttotal ="select * from borno_class9_10_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term'  AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id='$subjectid'";
					$qresulttotal=$mysqli->query($resulttotal);
					$rowqresulttotal=$qresulttotal->fetch_assoc();
					
					
					$total=$rowqresulttotal['res_total_conv'];	
					$lg=$rowqresulttotal['res_lg'];
					
					$pdf->Cell(6,5,$num1,1,0,'C');
					$pdf->Cell(6,5,$num2,1,0,'C');
					$pdf->Cell(6,5,$num3,1,0,'C');
					$pdf->Cell(6,5,$num4,1,0,'C');
					$pdf->Cell(6,5,$num5,1,0,'C');
					$pdf->Cell(6,5,$num6,1,0,'C');					
					$pdf->Cell(7,5,$total,1,0,'C');
					$pdf->Cell(5,5,$lg,1,0,'C');
					
                }	
				else
				{
					$pdf->Cell(6,5,'',1,0,'C');
					$pdf->Cell(6,5,'',1,0,'C');
					$pdf->Cell(6,5,'',1,0,'C');
					$pdf->Cell(6,5,'',1,0,'C');
					$pdf->Cell(6,5,'',1,0,'C');
					$pdf->Cell(6,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(5,5,'',1,0,'C');
                }		
					}

					
								
					$pdf->Ln();
						}
}

elseif($studClass==3 OR $studClass==4 OR $studClass==5)
{
 $result23 ="select borno_school_roll,borno_school_student_name from borno_class6_8_temp_mark1 where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' group by borno_school_roll,borno_school_student_name asc";
$sl=0;
					$qgresult23=$mysqli->query($result23);
					while($row23=$qgresult23->fetch_assoc()){ $sl++;

					$gtstotal111=$row23['borno_school_roll'];
					$gtstname=substr($row23['borno_school_student_name'],0,15);

					$pdf->SetFont('Arial','',9);
					$pdf->Cell(8,5,$gtstotal111,1,0,'C');
					$pdf->Cell(35,5,$gtstname,1,0,'L');
	if($sid1=="" AND $sid2=="" AND $sid3=="" AND $sid4=="" AND $sid5=="" AND $sid6==""){$subidend=$sid1;}	
	elseif($sid2=="" AND $sid3=="" AND $sid4=="" AND $sid5=="" AND $sid6==""){$subidend=$sid1;}
	elseif($sid2=="" AND $sid3=="" AND $sid4=="" AND $sid5=="" AND $sid6==""){$subidend=$sid1;}
	elseif($sid3=="" AND $sid4=="" AND $sid5=="" AND $sid6==""){$subidend=$sid2;}
	elseif($sid4=="" AND $sid5=="" AND $sid6==""){$subidend=$sid3;}
	elseif($sid5=="" AND $sid6==""){$subidend=$sid4;}
	elseif($sid6==""){$subidend=$sid5;}
	else{$subidend=$sid5;}					
$resultsub ="select subject_id_six_eight from borno_class6_8_temp_mark1 where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND subject_id_six_eight between '$sid1' AND '$subidend' group by subject_id_six_eight asc";
$sl2=0;
					$qresultsub=$mysqli->query($resultsub);
					while($rowqresultsub=$qresultsub->fetch_assoc()){$sl2++;
					$subjectid=$rowqresultsub['subject_id_six_eight'];
					
 $resulttotal1 ="select * from borno_class6_8_temp_mark1 where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight='$subjectid'";
					$qresulttotal1=$mysqli->query($resulttotal1);
					$rowqresulttotal1=$qresulttotal1->fetch_assoc();					
					$subjectid1=$rowqresulttotal1['subject_id_six_eight'];
					$num1=$rowqresulttotal1['temp_res_number_type1'];
					$num2=$rowqresulttotal1['temp_res_number_type2'];
					$num3=$rowqresulttotal1['temp_res_number_type3'];	
					$num4=$rowqresulttotal1['temp_res_number_type4'];
					$num5=$rowqresulttotal1['temp_res_number_type5'];	
					$num6=$rowqresulttotal1['temp_res_number_type6'];			
					

		       if($subjectid1!="")
                {					
 $resulttotal ="select * from borno_class6_8_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_roll='$gtstotal111' AND subject_id_six_eight='$subjectid'";
					$qresulttotal=$mysqli->query($resulttotal);
					$rowqresulttotal=$qresulttotal->fetch_assoc();
					
					
					$total=$rowqresulttotal['res_total_conv'];	
					$lg=$rowqresulttotal['res_lg'];
					
					$pdf->Cell(6,5,$num1,1,0,'C');
					$pdf->Cell(6,5,$num2,1,0,'C');
					$pdf->Cell(6,5,$num3,1,0,'C');
					$pdf->Cell(6,5,$num4,1,0,'C');
					$pdf->Cell(6,5,$num5,1,0,'C');
					$pdf->Cell(6,5,$num6,1,0,'C');	
					$pdf->Cell(7,5,$total,1,0,'C');
					$pdf->Cell(5,5,$lg,1,0,'C');
					
                }	
				else
				{
					$pdf->Cell(6,5,'',1,0,'C');
					$pdf->Cell(6,5,'',1,0,'C');
					$pdf->Cell(6,5,'',1,0,'C');
					$pdf->Cell(6,5,'',1,0,'C');
					$pdf->Cell(6,5,'',1,0,'C');
					$pdf->Cell(6,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(5,5,'',1,0,'C');
                }    
                }

					
								
					$pdf->Ln();
						}
}
$pdf->Output();
?>