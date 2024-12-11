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

$gtterm="SELECT * FROM borno_result_add_term_voc where borno_result_term_id=$term";
					$qgtterm=$mysqli->query($gtterm);
					$sqgtterm=$qgtterm->fetch_assoc();
$fnsterm=$sqgtterm['borno_result_term_name'];

$gtschoolName="SELECT * FROM borno_school where borno_school_id=$schId";
					$qgtschoolName=$mysqli->query($gtschoolName);
					$sqgtschoolName=$qgtschoolName->fetch_assoc();
					$fnschname=$sqgtschoolName['borno_school_name'];
					
					
 $subject ="select * from borno_class9_10voc_temp_mark1 where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_stud_group='$group' group by borno_subject_nine_ten_id asc";
$s1l=0;
					$qsubject=$mysqli->query($subject);
					while($rowqsubject=$qsubject->fetch_assoc()){ $s1l++;
					$subid=$rowqsubject['borno_subject_nine_ten_id'];
					
					$subjectname ="select * from borno_result_subject_voc where borno_result_subject_voc_id='$subid'";

					$qsubjectname=$mysqli->query($subjectname);
					$rowqsubjectname=$qsubjectname->fetch_assoc();
					$subname=substr($rowqsubjectname['borno_school_subject_name'],0,20);
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
				

				
			
					$numtype ="select * from borno_result_number_type_voc where borno_school_class_id='$studClass' AND borno_school_id='$schId' AND borno_school_session='$stsess'";
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
	$this->Cell(15,5,$GLOBALS['stsess'],0,0,'L');
	$this->Ln();
	$this->SetFont('Arial','',11);
	$this->Cell(8,10,"Roll",1,0,'C');
	//$this->Cell(10,10,"Student Name",1,0,'L');
	if($GLOBALS['s1l']==7)
	{
	$this->Cell(40,5,$GLOBALS['subname7'],1,0,'L');
	$this->Cell(15,5,Grand,1,0,'C');
	$this->Cell(10,5,GPA,1,0,'C');
	}
	if($GLOBALS['s1l']==8)
	{
	$this->Cell(40,5,$GLOBALS['subname7'],1,0,'L');
	$this->Cell(40,5,$GLOBALS['subname8'],1,0,'L');
	$this->Cell(15,5,Grand,1,0,'C');
	$this->Cell(10,5,GPA,1,0,'C');
	}
	if($GLOBALS['s1l']==9)
	{
	$this->Cell(40,5,$GLOBALS['subname7'],1,0,'L');
	$this->Cell(40,5,$GLOBALS['subname8'],1,0,'L');
	$this->Cell(40,5,$GLOBALS['subname9'],1,0,'L');
	$this->Cell(15,5,Grand,1,0,'C');
	$this->Cell(10,5,GPA,1,0,'C');
	}
	if($GLOBALS['s1l']==10)
	{
	$this->Cell(40,5,$GLOBALS['subname7'],1,0,'L');
	$this->Cell(40,5,$GLOBALS['subname8'],1,0,'L');
	$this->Cell(40,5,$GLOBALS['subname9'],1,0,'L');
	$this->Cell(40,5,$GLOBALS['subname10'],1,0,'L');
	$this->Cell(15,5,Grand,1,0,'C');
	$this->Cell(10,5,GPA,1,0,'C');
	}
	elseif($GLOBALS['s1l']==11)
	{
	$this->Cell(40,5,$GLOBALS['subname7'],1,0,'L');
	$this->Cell(40,5,$GLOBALS['subname8'],1,0,'L');
	$this->Cell(40,5,$GLOBALS['subname9'],1,0,'L');
	$this->Cell(40,5,$GLOBALS['subname10'],1,0,'L');
	$this->Cell(40,5,$GLOBALS['subname11'],1,0,'L');
	$this->Cell(15,5,Grand,1,0,'C');
	$this->Cell(10,5,GPA,1,0,'C');
	}
	elseif($GLOBALS['s1l']>=12)
	{
	$this->Cell(40,5,$GLOBALS['subname7'],1,0,'L');
	$this->Cell(40,5,$GLOBALS['subname8'],1,0,'L');
	$this->Cell(40,5,$GLOBALS['subname9'],1,0,'L');
	$this->Cell(40,5,$GLOBALS['subname10'],1,0,'L');
	$this->Cell(40,5,$GLOBALS['subname11'],1,0,'L');
	$this->Cell(40,5,$GLOBALS['subname12'],1,0,'L');
	$this->Cell(15,5,Grand,1,0,'C');
	$this->Cell(10,5,GPA,1,0,'C');
	}
	
	$this->Ln();
	$this->SetFont('Arial','',10);
	$this->Cell(8,5,'',0,0,'C');
	//$this->Cell(10,5,'',0,0,'L');
			if($GLOBALS['s1l']==7)
	{
	$this->SetFont('Arial','',8);       
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
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
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(5,5,G,1,0,'C');	
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
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
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(5,5,G,1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(5,5,G,1,0,'C');	
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(5,5,G,1,0,'C');
	$this->SetFont('Arial','',11);
	$this->Cell(15,5,Total,1,0,'C');
	$this->Cell(10,5,'',1,0,'C');
	}	
	if($GLOBALS['s1l']==10)
	{
	$this->SetFont('Arial','',8);       
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(5,5,G,1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(5,5,G,1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(5,5,G,1,0,'C');	
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(5,5,G,1,0,'C');
	$this->SetFont('Arial','',11);
	$this->Cell(15,5,Total,1,0,'C');
	$this->Cell(10,5,'',1,0,'C');
	}
	if($GLOBALS['s1l']==11)
	{
	$this->SetFont('Arial','',8);       
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(5,5,G,1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(5,5,G,1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(5,5,G,1,0,'C');	
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(5,5,G,1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(5,5,G,1,0,'C');
	$this->SetFont('Arial','',11);
	$this->Cell(15,5,Total,1,0,'C');
	$this->Cell(10,5,'',1,0,'L');
	}
	if($GLOBALS['s1l']>=12)
	{
	$this->SetFont('Arial','',8);       
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(5,5,G,1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(5,5,G,1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(5,5,G,1,0,'C');	
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(5,5,G,1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(5,5,G,1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(7,5,Total,1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(5,5,G,1,0,'C');
	$this->SetFont('Arial','',11);
	$this->Cell(15,5,Total,1,0,'C');
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



 $result23 ="select * from borno_class9_10voc_temp_mark1 where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_stud_group='$group' group by borno_school_roll asc";
$sl=0;
					$qgresult23=$mysqli->query($result23);
					while($row23=$qgresult23->fetch_assoc()){ $sl++;

					$gtstotal111=$row23['borno_school_roll'];
					$gtstname=substr($row23['borno_school_student_name'],0,15);

					$pdf->SetFont('Arial','',10);
					$pdf->Cell(8,5,$gtstotal111,1,0,'C');
				//	$pdf->Cell(10,5,$gtstname,1,0,'L');
				
	if($sid7=="" AND $sid8=="" AND $sid9=="" AND $sid10=="" AND $sid11==""AND $sid12==""AND $sid13==""AND $sid14==""AND $sid15==""){$subidend=$sid7;}	
	elseif($sid8=="" AND $sid9=="" AND $sid10=="" AND $sid11==""AND $sid12==""AND $sid13==""AND $sid14==""AND $sid15==""){$subidend=$sid7;}	
	elseif($sid9=="" AND $sid10=="" AND $sid11==""AND $sid12==""AND $sid13==""AND $sid14==""AND $sid15==""){$subidend=$sid8;}	
	elseif($sid10=="" AND $sid11==""AND $sid12==""AND $sid13==""AND $sid14==""AND $sid15==""){$subidend=$sid9;}	
	elseif($sid11==""AND $sid12==""AND $sid13==""AND $sid14==""AND $sid15==""){$subidend=$sid10;}	
	elseif($sid12==""AND $sid13==""AND $sid14==""AND $sid15==""){$subidend=$sid11;}	
	elseif($sid13==""AND $sid14==""AND $sid15==""){$subidend=$sid12;}	
	elseif($sid14==""AND $sid15==""){$subidend=$sid12;}
	elseif($sid15==""){$subidend=$sid12;}				
 $resultsub ="select * from borno_class9_10voc_temp_mark1 where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term'  AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id between '$sid7' AND '$subidend' order by borno_subject_nine_ten_id asc";

$sl2=0;
					$qresultsub=$mysqli->query($resultsub);
					while($rowqresultsub=$qresultsub->fetch_assoc()){$sl2++;
					$subjectid=$rowqresultsub['borno_subject_nine_ten_id'];
					$num1=$rowqresultsub['temp_res_number_type1'];
					$num2=$rowqresultsub['temp_res_number_type2'];
					$num3=$rowqresultsub['temp_res_number_type3'];	
					$num4=$rowqresultsub['temp_res_number_type4'];
								
 $resulttotal ="select * from borno_class9_10voc_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term'  AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111' AND borno_subject_nine_ten_id='$subjectid'";
					$qresulttotal=$mysqli->query($resulttotal);
					$rowqresulttotal=$qresulttotal->fetch_assoc();
					
					
					$total=$rowqresulttotal['res_total_conv'];	
					$lg=$rowqresulttotal['res_lg'];
					
					$pdf->Cell(7,5,$num1,1,0,'C');
					$pdf->Cell(7,5,$num2,1,0,'C');
					$pdf->Cell(7,5,$num3,1,0,'C');
					$pdf->Cell(7,5,$num4,1,0,'C');
					$pdf->Cell(7,5,$total,1,0,'C');
					$pdf->Cell(5,5,$lg,1,0,'C');
					}

$resultgrand ="select * from borno_school_9_10voc_merit where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111'";
					$qresultgrand=$mysqli->query($resultgrand);
					$rowqresultgrand=$qresultgrand->fetch_assoc();
					$grand=$rowqresultgrand['grandtotal'];	
					$gpa=$rowqresultgrand['gpa'];
					$pdf->Cell(15,5,$grand,1,0,'C');
					$pdf->Cell(10,5,$gpa,1,0,'C');					
								
					$pdf->Ln();
						}


$pdf->Output();
?>