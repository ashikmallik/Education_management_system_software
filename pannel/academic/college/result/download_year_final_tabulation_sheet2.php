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
						
  $subject ="select * from borno_class11_12_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess'  AND borno_school_stud_group='$group' AND borno_result_exam_year='$styear' group by borno_subject_eleven_twelve_id asc";
$s1l=0;
					$qsubject=$mysqli->query($subject);
					while($rowqsubject=$qsubject->fetch_assoc()){ $s1l++;
					$subid=$rowqsubject['borno_subject_eleven_twelve_id'];
				if($group == 3){			
					$subjectname ="select * from borno_subject_eleven_twelve where borno_subject_eleven_twelve_id='$subid'";

					$qsubjectname=$mysqli->query($subjectname);
					$rowqsubjectname=$qsubjectname->fetch_assoc();
					$subname=substr($rowqsubjectname['borno_subject_eleven_twelve_name'],0,20);
					
					
					    
					    if($subid==24)
					{
					$sid1=$subid;	
					$subname1=$subname;	
					}
					elseif($subid==32)
					{
					$sid2=$subid;		
					$subname2=$subname;
					}
					elseif($subid==28)
					{
					$sid3=$subid;		
					$subname3=$subname;	
					}
					elseif($subid==22)
					{
					$sid4=$subid;		
					$subname4=$subname;	
					}
				// 	elseif($subid==24)
				// 	{
				// 	$sid5=$subid;		
				// 	$subname5=$subname;	
				// 	}
				    
				}
				else{
				    					$subjectname ="select * from borno_subject_eleven_twelve where borno_subject_eleven_twelve_id='$subid'";

					$qsubjectname=$mysqli->query($subjectname);
					$rowqsubjectname=$qsubjectname->fetch_assoc();
					$subname=substr($rowqsubjectname['borno_subject_eleven_twelve_name'],0,20);
				    
					if($s1l==5)
					{
					$sid1=$subid;	
					$subname1=$subname;	
					}
					elseif($s1l==6)
					{
					$sid2=$subid;		
					$subname2=$subname;
					}
					elseif($s1l==7)
					{
					$sid3=$subid;		
					$subname3=$subname;	
					}
					elseif($s1l==8)
					{
					$sid4=$subid;		
					$subname4=$subname;	
					}
				// 	elseif($s1l==5)
				// 	{
				// 	$sid5=$subid;		
				// 	$subname5=$subname;	
				// 	}
				// 	elseif($s1l==6)
				// 	{
				// 	$sid6=$subid;		
				// 	$subname6=$subname;
				// 	}
				// 	elseif($s1l==7)
				// 	{
				// 	$subname7=$subname;	
				// 	}
				// 	elseif($s1l==8)
				// 	{
				// 	$subname8=$subname;	
				// 	}
				// 	elseif($s1l==9)
				// 	{
				// 	$subname9=$subname;	
				// 	}
				// 	elseif($s1l==10)
				// 	{
				// 	$subname10=$subname;	
				// 	}
				// 	elseif($s1l==11)
				// 	{
				// 	$subname11=$subname;	
				// 	}
				// 	elseif($s1l==12)
				// 	{
				// 	$subname12=$subname;	
				// 	}
				// 	elseif($s1l==13)
				// 	{
				// 	$subname13=$subname;	
				// 	}
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
	$this->Cell(30,5,$GLOBALS['fnssection'],0,0,'L');
	$this->Cell(15,5,"Term : ",0,0,'L');
	$this->Cell(55,5,"",0,0,'L');
	$this->Cell(20,5,"Session : ",0,0,'L');
	$this->Cell(20,5,$GLOBALS['stsess'],0,0,'L');
	$this->Cell(25,5,"Exam Year : ",0,0,'L');
	$this->Cell(15,5,$GLOBALS['styear'],0,0,'L');	
	$this->Ln();
	$this->SetFont('Arial','',11);
	$this->Cell(9,10,"Roll",1,0,'C');
	$this->Cell(47,10,"Student Name",1,0,'L');
	$this->Cell(13,10,"Term",1,0,'C');
	if(empty($GLOBALS['subname3'])){
	    $GLOBALS['subname3']=null;
	}
	$this->Cell(48,5,$GLOBALS['subname1'],1,0,'L');
	$this->Cell(48,5,$GLOBALS['subname2'],1,0,'L');
	$this->Cell(48,5,$GLOBALS['subname3'],1,0,'L');
	$this->Cell(48,5,$GLOBALS['subname4'],1,0,'L');
	$this->Ln();
	$this->SetFont('Arial','',10);
	$this->Cell(9,5,'',0,0,'C');
	$this->Cell(47,5,'',0,0,'L');
	$this->Cell(13,5,'',0,0,'L');
	if($GLOBALS['s1l']==1)
	{
	$this->SetFont('Arial','',8);    
	$this->Cell(7,5,"CQ",1,0,'C');
	$this->Cell(7,5,"MCQ",1,0,'C');
	$this->Cell(7,5,"80%",1,0,'C');
	$this->Cell(7,5,"CT",1,0,'C');
	$this->Cell(7,5,"20%",1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(8,5,'Total',1,0,'C');
	$this->SetFont('Arial','',8); 
	$this->Cell(5,5,'G',1,0,'C');
	}
	if($GLOBALS['s1l']==2)
	{
	$this->SetFont('Arial','',8);    
	$this->Cell(7,5,"CQ",1,0,'C');
	$this->Cell(7,5,"MCQ",1,0,'C');
	$this->Cell(7,5,"80%",1,0,'C');
	$this->Cell(7,5,"CT",1,0,'C');
	$this->Cell(7,5,"20%",1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(8,5,'Total',1,0,'C');
	$this->SetFont('Arial','',8); 
	$this->Cell(5,5,'G',1,0,'C');
	$this->Cell(7,5,"CQ",1,0,'C');
	$this->Cell(7,5,"MCQ",1,0,'C');
	$this->Cell(7,5,"80%",1,0,'C');
	$this->Cell(7,5,"CT",1,0,'C');
	$this->Cell(7,5,"20%",1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(8,5,'Total',1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(5,5,'G',1,0,'C');
	}
	if($GLOBALS['s1l']==3)
	{
	$this->SetFont('Arial','',8);    
	$this->Cell(7,5,"CQ",1,0,'C');
	$this->Cell(7,5,"MCQ",1,0,'C');
	$this->Cell(7,5,"80%",1,0,'C');
	$this->Cell(7,5,"CT",1,0,'C');
	$this->Cell(7,5,"20%",1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(8,5,'Total',1,0,'C');
	$this->SetFont('Arial','',8); 
	$this->Cell(5,5,'G',1,0,'C');
	$this->Cell(7,5,"CQ",1,0,'C');
	$this->Cell(7,5,"MCQ",1,0,'C');
	$this->Cell(7,5,"80%",1,0,'C');
	$this->Cell(7,5,"CT",1,0,'C');
	$this->Cell(7,5,"20%",1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(8,5,'Total',1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(5,5,'G',1,0,'C');
	$this->Cell(7,5,"CQ",1,0,'C');
	$this->Cell(7,5,"MCQ",1,0,'C');
	$this->Cell(7,5,"80%",1,0,'C');
	$this->Cell(7,5,"CT",1,0,'C');
	$this->Cell(7,5,"20%",1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(8,5,'Total',1,0,'C');
	$this->SetFont('Arial','',8); 
	$this->Cell(5,5,'G',1,0,'C');	
	}
			if($GLOBALS['s1l']>=4)
	{
	$this->SetFont('Arial','',8);    
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype5'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(8,5,'Total',1,0,'C');
	$this->SetFont('Arial','',8); 
	$this->Cell(5,5,'G',1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype5'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(8,5,'Total',1,0,'C');
	$this->SetFont('Arial','',8);   
	$this->Cell(5,5,'G',1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype5'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(8,5,'Total',1,0,'C');
	$this->SetFont('Arial','',8); 
	$this->Cell(5,5,'G',1,0,'C');	
	$this->Cell(7,5,$GLOBALS['numbertype1'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype2'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype3'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype4'],1,0,'C');
	$this->Cell(7,5,$GLOBALS['numbertype5'],1,0,'C');
	$this->SetFont('Arial','',7);
	$this->Cell(8,5,'Total',1,0,'C');
	$this->SetFont('Arial','',8); 
	$this->Cell(5,5,'G',1,0,'C');
	}
// 	if($GLOBALS['s1l']>=4)
// 	{
// 	$this->SetFont('Arial','',8);       
// 	$this->Cell(7,5,"CQ",1,0,'C');
// 	$this->Cell(7,5,"MCQ",1,0,'C');
// 	$this->Cell(7,5,"PRC",1,0,'C');
// 	$this->Cell(7,5,"80%",1,0,'C');
// 	$this->Cell(7,5,"CT",1,0,'C');
// 	$this->Cell(7,5,"20%",1,0,'C');
// 	$this->SetFont('Arial','',7);
// 	$this->Cell(8,5,'Total',1,0,'C');
// 	$this->SetFont('Arial','',8); 
// 	$this->Cell(5,5,'G',1,0,'C');
// 	$this->Cell(7,5,"CQ",1,0,'C');
// 	$this->Cell(7,5,"MCQ",1,0,'C');
// 	$this->Cell(7,5,"PRC",1,0,'C');
// 	$this->Cell(7,5,"80%",1,0,'C');
// 	$this->Cell(7,5,"CT",1,0,'C');
// 	$this->Cell(7,5,"20%",1,0,'C');
// 	$this->SetFont('Arial','',7);
// 	$this->Cell(8,5,'Total',1,0,'C');
// 	$this->SetFont('Arial','',8); 
// 	$this->Cell(5,5,'G',1,0,'C');
// 	$this->Cell(7,5,"CQ",1,0,'C');
// 	$this->Cell(7,5,"MCQ",1,0,'C');
// 	$this->Cell(7,5,"PRC",1,0,'C');
// 	$this->Cell(7,5,"80%",1,0,'C');
// 	$this->Cell(7,5,"CT",1,0,'C');
// 	$this->Cell(7,5,"20%",1,0,'C');
// 	$this->SetFont('Arial','',7);
// 	$this->Cell(8,5,'Total',1,0,'C');
// 	$this->SetFont('Arial','',8); 
// 	$this->Cell(5,5,'G',1,0,'C');	
// 	$this->Cell(7,5,"CQ",1,0,'C');
// 	$this->Cell(7,5,"MCQ",1,0,'C');
// 	$this->Cell(7,5,"PRC",1,0,'C');
// 	$this->Cell(7,5,"80%",1,0,'C');
// 	$this->Cell(7,5,"CT",1,0,'C');
// 	$this->Cell(7,5,"20%",1,0,'C');
// 	$this->SetFont('Arial','',7);
// 	$this->Cell(8,5,'Total',1,0,'C');
// 	$this->SetFont('Arial','',8); 
// 	$this->Cell(5,5,'G',1,0,'C');
// 	}
// 	if($GLOBALS['s1l']>=5)
// 	{
// 	$this->SetFont('Arial','',8);       
// 	$this->Cell(7,5,"CQ",1,0,'C');
// 	$this->Cell(7,5,"MCQ",1,0,'C');
// 	$this->Cell(7,5,"PRC",1,0,'C');
// 	$this->Cell(7,5,"80%",1,0,'C');
// 	$this->Cell(7,5,"CT",1,0,'C');
// 	$this->Cell(7,5,"20%",1,0,'C');
// 	$this->SetFont('Arial','',7);
// 	$this->Cell(8,5,'Total',1,0,'C');
// 	$this->SetFont('Arial','',8); 
// 	$this->Cell(5,5,'G',1,0,'C');
// 	$this->Cell(7,5,"CQ",1,0,'C');
// 	$this->Cell(7,5,"MCQ",1,0,'C');
// 	$this->Cell(7,5,"PRC",1,0,'C');
// 	$this->Cell(7,5,"80%",1,0,'C');
// 	$this->Cell(7,5,"CT",1,0,'C');
// 	$this->Cell(7,5,"20%",1,0,'C');
// 	$this->SetFont('Arial','',7);
// 	$this->Cell(8,5,'Total',1,0,'C');
// 	$this->SetFont('Arial','',8); 
// 	$this->Cell(5,5,'G',1,0,'C');
// 	$this->Cell(7,5,"CQ",1,0,'C');
// 	$this->Cell(7,5,"MCQ",1,0,'C');
// 	$this->Cell(7,5,"PRC",1,0,'C');
// 	$this->Cell(7,5,"80%",1,0,'C');
// 	$this->Cell(7,5,"CT",1,0,'C');
// 	$this->Cell(7,5,"20%",1,0,'C');
// 	$this->SetFont('Arial','',7);
// 	$this->Cell(8,5,'Total',1,0,'C');
// 	$this->SetFont('Arial','',8); 
// 	$this->Cell(5,5,'G',1,0,'C');	
// 	$this->Cell(7,5,"CQ",1,0,'C');
// 	$this->Cell(7,5,"MCQ",1,0,'C');
// 	$this->Cell(7,5,"PRC",1,0,'C');
// 	$this->Cell(7,5,"80%",1,0,'C');
// 	$this->Cell(7,5,"CT",1,0,'C');
// 	$this->Cell(7,5,"20%",1,0,'C');
// 	$this->SetFont('Arial','',7);
// 	$this->Cell(8,5,'Total',1,0,'C');
// 	$this->SetFont('Arial','',8); 
// 	$this->Cell(5,5,'G',1,0,'C');
// 	$this->Cell(7,5,"CQ",1,0,'C');
// 	$this->Cell(7,5,"MCQ",1,0,'C');
// 	$this->Cell(7,5,"PRC",1,0,'C');
// 	$this->Cell(7,5,"80%",1,0,'C');
// 	$this->Cell(7,5,"CT",1,0,'C');
// 	$this->Cell(7,5,"20%",1,0,'C');
// 	$this->SetFont('Arial','',7);
// 	$this->Cell(8,5,'Total',1,0,'C');
// 	$this->SetFont('Arial','',8); 
// 	$this->Cell(5,5,'G',1,0,'C');
// 	}
	
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
$pdf->AddPage('L');

	$getminroll="select * from borno_class11_12_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess'  AND borno_school_stud_group='$group' AND borno_result_exam_year='$styear' order by borno_school_roll asc limit 0,1";
			
			
			$qgetminroll=$mysqli->query($getminroll);
	        $shqgetminroll=$qgetminroll->fetch_assoc();
			$genminroll=$shqgetminroll['borno_school_roll'];
	
	$countsubject="select * from borno_class11_12_final_result where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess'  AND borno_school_stud_group='$group' AND borno_result_exam_year='$styear' AND borno_school_roll='$genminroll' group by borno_subject_eleven_twelve_id asc";
	    $qcountsubject=$mysqli->query($countsubject);
		$subsl=0;
	while($shqcountsubject=$qcountsubject->fetch_assoc()){$subsl++;
	
	}
					

 $result23 ="select * from borno_class11_12_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess'  AND borno_school_stud_group='$group' AND borno_result_exam_year='$styear'  group by borno_school_roll asc";

					$qgresult23=$mysqli->query($result23);
					$sl=0;
					while($row23=$qgresult23->fetch_assoc()){ $sl++;
        $gtstotal111=$row23['borno_school_roll'];
        $sid=$row23['borno_student_info_id'];

  
      $getterm ="select * from borno_class11_12_final_result where borno_student_info_id='$sid' AND `borno_result_term_id` IN (25,26)  GROUP BY borno_result_term_id ASC ";
  $qgetterm=$mysqli->query($getterm);
					$sl1=0;
  while($row1=$qgetterm->fetch_assoc()){ $sl1++;
  
  $tremid = $row1['borno_result_term_id'];    
	$getminstname="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_school_stud_group='$group' AND borno_school_roll='$gtstotal111'";
			
			
		$qgetminstname=$mysqli->query($getminstname);
	    $shqgetminstname=$qgetminstname->fetch_assoc();
		$gtstname=substr($shqgetminstname['borno_school_student_name'],0,15);

					
		$get4thsub = "SELECT * FROM `borno_set_subject_eleven_twelve` WHERE `borno_student_info_id` = '$sid'";
				$qget4thsub=$mysqli->query($get4thsub);
	    $shqget4thsub=$qget4thsub->fetch_assoc();
		$get4thsubname=$shqget4thsub['borno_school_subject_12th'];
		$subjectname1 ="select * from borno_subject_eleven_twelve where borno_subject_eleven_twelve_id='$get4thsubname'";

					$qsubjectname1=$mysqli->query($subjectname1);
					$rowqsubjectname1=$qsubjectname1->fetch_assoc();
					$subname12=substr($rowqsubjectname1['borno_subject_eleven_twelve_name'],0,20);

					$pdf->SetFont('Arial','',10);
					if($tremid == 25){
					    	$pdf->Cell(9,5,$gtstotal111,1,0,'C');
					$pdf->Cell(47,5,$gtstname,1,0,'L');    
				
					$pdf->Cell(13,5,"1st-sem",1,0,'C');    
				
					}
					else{
				   		$pdf->Cell(9,5,"4th",1,0,'C');
					$pdf->Cell(47,5,$subname12,1,0,'L');
					$pdf->Cell(13,5,"Final",1,0,'C');
					}
 $resultsub1 ="select * from borno_class11_12_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND `borno_result_term_id`='$tremid' AND borno_school_stud_group='$group'  AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111' AND borno_subject_eleven_twelve_id='$sid1'";

					$qresultsub1=$mysqli->query($resultsub1);
					$rowqresultsub1=$qresultsub1->fetch_assoc();
					$subjectid=$rowqresultsub1['borno_subject_eleven_twelve_id'];
					$subjectpare=$rowqresultsub1['pare'];
										$num1=$rowqresultsub1['temp_res_number_type1'];
					$num2=$rowqresultsub1['res_number_type2'];
					$num3=$rowqresultsub1['res_number_type3'];	
					$num4=$rowqresultsub1['res_number_type4'];
					$num5=$rowqresultsub1['res_number_type5'];
					$total=$rowqresultsub1['res_total_conv'];	
					$lg=$rowqresultsub1['res_lg'];
// 					$num1=$rowqresultsub1['temp_res_number_type1'];
// 					$num2=$rowqresultsub1['res_number_type2'];
// 					$num3=$rowqresultsub1['res_number_type3'];
// 					$num4=round(((($num1+$num2+$num3)*80)/100));
// if($sl1 ==1 ){
//     $ctresultsub1 ="select * from borno_class11_12_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND `borno_result_term_id`='24' AND borno_school_stud_group='$group'  AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111' AND borno_subject_eleven_twelve_id='$sid1'";
//     $qctresultsub1=$mysqli->query($ctresultsub1);
// 	$rowqctresultsub1=$qctresultsub1->fetch_assoc();
//     $ctnum1=$rowqctresultsub1['temp_res_number_type1'];
// 	$ctnum2=$rowqctresultsub1['res_number_type2'];
// 	$ct = $ctnum1 + $ctnum2;
// }					
// else{
//     $ctresultsub1 ="select * from borno_class11_12_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND `borno_result_term_id`='59' AND borno_school_stud_group='$group'  AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111' AND borno_subject_eleven_twelve_id='$sid1'";
//     $qctresultsub1=$mysqli->query($ctresultsub1);
// 	$rowqctresultsub1=$qctresultsub1->fetch_assoc();
//     $ctnum1=$rowqctresultsub1['temp_res_number_type1'];
// 	$ctnum2=$rowqctresultsub1['res_number_type2'];
// 	$ct = $ctnum1 + $ctnum2;
    
// }					
					
// 					$num5=$ct;
// 					$num6= round(($num5*50)/100);
// 					$total=$num4+$num6;	
// 					if($total> 79){
// 					  $lg="A+";
// 					}
// 				   else if($total> 69){
// 					  $lg="A";
// 					}
// 					else if($total> 59){
// 					  $lg="A-";
// 					}
// 					else if($total> 49){
// 					  $lg="B";
// 					}
// 					else if($total> 39){
// 					  $lg="C";
// 					}
// 					else if($total> 32){
// 					  $lg="D";
// 					}
// 					else{
// 					  $lg="F";
// 					}
					
// if($subsl>7)
// {
// $resultsub11 ="select * from borno_class11_12_test_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess'   AND borno_school_stud_group='$group'  AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111' AND borno_subject_eleven_twelve_id='$sid1'";

// 					$qresultsub11=$mysqli->query($resultsub11);
// 					$rowqresultsub11=$qresultsub11->fetch_assoc();
// 					$total=$rowqresultsub11['res_total_conv'];	
// 					$lg=$rowqresultsub11['res_lg'];	
// }					
					
					if($subjectid!="")
					{
					$pdf->Cell(7,5,$num1,1,0,'C');
					$pdf->Cell(7,5,$num2,1,0,'C');
					$pdf->Cell(7,5,$num3,1,0,'C');
					$pdf->Cell(7,5,$num4,1,0,'C');
					$pdf->Cell(7,5,$num5,1,0,'C');
			//		$pdf->Cell(7,5,$num6,1,0,'C');
					$pdf->Cell(8,5,$total,1,0,'C');
					$pdf->Cell(5,5,$lg,1,0,'C');
					}
					else
					{
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
			//		$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(8,5,'',1,0,'C');
					$pdf->Cell(5,5,'',1,0,'C');
					}

 $resultsub2 ="select * from borno_class11_12_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND `borno_result_term_id`='$tremid' AND borno_school_stud_group='$group'  AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111' AND borno_subject_eleven_twelve_id='$sid2'";

					$qresultsub2=$mysqli->query($resultsub2);
					$rowqresultsub2=$qresultsub2->fetch_assoc();
					$subjectid=$rowqresultsub2['borno_subject_eleven_twelve_id'];
										$num1=$rowqresultsub2['temp_res_number_type1'];
					$num2=$rowqresultsub2['res_number_type2'];
					$num3=$rowqresultsub2['res_number_type3'];	
					$num4=$rowqresultsub2['res_number_type4'];
					$num5=$rowqresultsub2['res_number_type5'];
					$total=$rowqresultsub2['res_total_conv'];	
					$lg=$rowqresultsub2['res_lg'];
// 					$num1=$rowqresultsub2['temp_res_number_type1'];
// 					$num2=$rowqresultsub2['res_number_type2'];
// 					$num3=$rowqresultsub2['res_number_type3'];
// 					$num4=round(((($num1+$num2+$num3)*80)/100));
					
// 				if($sl1 ==1 ){
//     $ctresultsub2 ="select * from borno_class11_12_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND `borno_result_term_id`='24' AND borno_school_stud_group='$group'  AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111' AND borno_subject_eleven_twelve_id='$sid2'";
//     $qctresultsub2=$mysqli->query($ctresultsub2);
// 	$rowqctresultsub2=$qctresultsub2->fetch_assoc();
//     $ctnum1=$rowqctresultsub2['temp_res_number_type1'];
// 	$ctnum2=$rowqctresultsub2['res_number_type2'];
// 	$ct = $ctnum1 + $ctnum2;
// }					
// else{
//     $ctresultsub2 ="select * from borno_class11_12_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND `borno_result_term_id`='59' AND borno_school_stud_group='$group'  AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111' AND borno_subject_eleven_twelve_id='$sid2'";
//     $qctresultsub2=$mysqli->query($ctresultsub2);
// 	$rowqctresultsub2=$qctresultsub2->fetch_assoc();
//     $ctnum1=$rowqctresultsub2['temp_res_number_type1'];
// 	$ctnum2=$rowqctresultsub2['res_number_type2'];
// 	$ct = $ctnum1 + $ctnum2;
    
// }					
					
// 					$num5=$ct;
// 					$num6= round(($num5*50)/100);
// 					$total=$num4+$num6;	
// 					if($total> 79){
// 					  $lg="A+";
// 					}
// 				   else if($total> 69){
// 					  $lg="A";
// 					}
// 					else if($total> 59){
// 					  $lg="A-";
// 					}
// 					else if($total> 49){
// 					  $lg="B";
// 					}
// 					else if($total> 39){
// 					  $lg="C";
// 					}
// 					else if($total> 32){
// 					  $lg="D";
// 					}
// 					else{
// 					  $lg="F";
// 					}	

					
// if($subsl>7)
// {
// $resultsub12 ="select * from borno_class11_12_test_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess'   AND borno_school_stud_group='$group'  AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111' AND borno_subject_eleven_twelve_id='$sid2'";

// 					$qresultsub12=$mysqli->query($resultsub12);
// 					$rowqresultsub12=$qresultsub12->fetch_assoc();
// 					$total=$rowqresultsub12['res_total_conv'];	
// 					$lg=$rowqresultsub12['res_lg'];	
// }
					if($subjectid!="")
					{
					$pdf->Cell(7,5,$num1,1,0,'C');
					$pdf->Cell(7,5,$num2,1,0,'C');
					$pdf->Cell(7,5,$num3,1,0,'C');
					$pdf->Cell(7,5,$num4,1,0,'C');
					$pdf->Cell(7,5,$num5,1,0,'C');
			//		$pdf->Cell(7,5,$num6,1,0,'C');
					$pdf->Cell(8,5,$total,1,0,'C');
					$pdf->Cell(5,5,$lg,1,0,'C');
					}
					else
					{
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
				//	$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(8,5,'',1,0,'C');
					$pdf->Cell(5,5,'',1,0,'C');
					}

 $resultsub3 ="select * from borno_class11_12_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND `borno_result_term_id`='$tremid' AND borno_school_stud_group='$group'  AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111' AND borno_subject_eleven_twelve_id='$sid3'";

					$qresultsub3=$mysqli->query($resultsub3);
					$rowqresultsub3=$qresultsub3->fetch_assoc();
					$subjectid=$rowqresultsub3['borno_subject_eleven_twelve_id'];
										$num1=$rowqresultsub3['temp_res_number_type1'];
					$num2=$rowqresultsub3['res_number_type2'];
					$num3=$rowqresultsub3['res_number_type3'];	
					$num4=$rowqresultsub3['res_number_type4'];
					$num5=$rowqresultsub3['res_number_type5'];
					$total=$rowqresultsub3['res_total_conv'];	
					$lg=$rowqresultsub3['res_lg'];
// 					$num1=$rowqresultsub3['temp_res_number_type1'];
// 					$num2=$rowqresultsub3['res_number_type2'];
// 					$num3=$rowqresultsub3['res_number_type3'];
// 					$num4=round(((($num1+$num2+$num3)*80)/100));
					
// 				if($sl1 ==1 ){
//     $ctresultsub3 ="select * from borno_class11_12_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND `borno_result_term_id`='24' AND borno_school_stud_group='$group'  AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111' AND borno_subject_eleven_twelve_id='$sid3'";
//     $qctresultsub3=$mysqli->query($ctresultsub2);
// 	$rowqctresultsub3=$qctresultsub3->fetch_assoc();
//     $ctnum1=$rowqctresultsub3['temp_res_number_type1'];
// 	$ctnum2=$rowqctresultsub3['res_number_type2'];
// 	$ct = $ctnum1 + $ctnum2;
// }					
// else{
//     $ctresultsub3 ="select * from borno_class11_12_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND `borno_result_term_id`='59' AND borno_school_stud_group='$group'  AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111' AND borno_subject_eleven_twelve_id='$sid3'";
//     $qctresultsub3=$mysqli->query($ctresultsub3);
// 	$rowqctresultsub3=$qctresultsub3->fetch_assoc();
//     $ctnum1=$rowqctresultsub3['temp_res_number_type1'];
// 	$ctnum2=$rowqctresultsub3['res_number_type2'];
// 	$ct = $ctnum1 + $ctnum2;
    
// }					
					
// 					$num5=$ct;
// 					$num6= round(($num5*50)/100);
// 					$total=$num4+$num6;	
// 					if($total> 79){
// 					  $lg="A+";
// 					}
// 				   else if($total> 69){
// 					  $lg="A";
// 					}
// 					else if($total> 59){
// 					  $lg="A-";
// 					}
// 					else if($total> 49){
// 					  $lg="B";
// 					}
// 					else if($total> 39){
// 					  $lg="C";
// 					}
// 					else if($total> 32){
// 					  $lg="D";
// 					}
// 					else{
// 					  $lg="F";
// 					}

					
// if($subsl>7)
// {
// $resultsub13 ="select * from borno_class11_12_test_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess'   AND borno_school_stud_group='$group'  AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111' AND borno_subject_eleven_twelve_id='$sid3'";

// 					$qresultsub13=$mysqli->query($resultsub13);
// 					$rowqresultsub13=$qresultsub13->fetch_assoc();
// 					$total=$rowqresultsub13['res_total_conv'];	
// 					$lg=$rowqresultsub13['res_lg'];	
// }
					if($subjectid!="")
					{
					$pdf->Cell(7,5,$num1,1,0,'C');
					$pdf->Cell(7,5,$num2,1,0,'C');
					$pdf->Cell(7,5,$num3,1,0,'C');
					$pdf->Cell(7,5,$num4,1,0,'C');
					$pdf->Cell(7,5,$num5,1,0,'C');
				//	$pdf->Cell(7,5,$num6,1,0,'C');
					$pdf->Cell(8,5,$total,1,0,'C');
					$pdf->Cell(5,5,$lg,1,0,'C');
					}
					else
					{
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
				//	$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(8,5,'',1,0,'C');
					$pdf->Cell(5,5,'',1,0,'C');
					}

 $resultsub4 ="select * from borno_class11_12_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND `borno_result_term_id`='$tremid' AND borno_school_stud_group='$group'  AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111' AND borno_subject_eleven_twelve_id='$sid4'";

					$qresultsub4=$mysqli->query($resultsub4);
					$rowqresultsub4=$qresultsub4->fetch_assoc();
					$subjectid=$rowqresultsub4['borno_subject_eleven_twelve_id'];
										$num1=$rowqresultsub4['temp_res_number_type1'];
					$num2=$rowqresultsub4['res_number_type2'];
					$num3=$rowqresultsub4['res_number_type3'];	
					$num4=$rowqresultsub4['res_number_type4'];
					$num5=$rowqresultsub4['res_number_type5'];
					$total=$rowqresultsub4['res_total_conv'];	
					$lg=$rowqresultsub4['res_lg'];
// 					$num1=$rowqresultsub4['temp_res_number_type1'];
// 					$num2=$rowqresultsub4['res_number_type2'];
// 					$num3=$rowqresultsub4['res_number_type3'];
// 					$num4=round(((($num1+$num2+$num3)*80)/100));
					
// 				if($sl1 ==1 ){
//     $ctresultsub4 ="select * from borno_class11_12_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND `borno_result_term_id`='24' AND borno_school_stud_group='$group'  AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111' AND borno_subject_eleven_twelve_id='$sid4'";
//     $qctresultsub4=$mysqli->query($ctresultsub4);
// 	$rowqctresultsub4=$qctresultsub4->fetch_assoc();
//     $ctnum1=$rowqctresultsub4['temp_res_number_type1'];
// 	$ctnum2=$rowqctresultsub4['res_number_type2'];
// 	$ct = $ctnum1 + $ctnum2;
// }					
// else{
//     $ctresultsub4 ="select * from borno_class11_12_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND `borno_result_term_id`='59' AND borno_school_stud_group='$group'  AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111' AND borno_subject_eleven_twelve_id='$sid4'";
//     $qctresultsub4=$mysqli->query($ctresultsub4);
// 	$rowqctresultsub4=$qctresultsub4->fetch_assoc();
//     $ctnum1=$rowqctresultsub4['temp_res_number_type1'];
// 	$ctnum2=$rowqctresultsub4['res_number_type2'];
// 	$ct = $ctnum1 + $ctnum2;
    
// }					
					
// 					$num5=$ct;
// 					$num6= round(($num5*50)/100);
// 					$total=$num4+$num6;	
// 					if($total> 79){
// 					  $lg="A+";
// 					}
// 				   else if($total> 69){
// 					  $lg="A";
// 					}
// 					else if($total> 59){
// 					  $lg="A-";
// 					}
// 					else if($total> 49){
// 					  $lg="B";
// 					}
// 					else if($total> 39){
// 					  $lg="C";
// 					}
// 					else if($total> 32){
// 					  $lg="D";
// 					}
// 					else{
// 					  $lg="F";
// 					}	

					
// if($subsl>7)
// {
// $resultsub14 ="select * from borno_class11_12_test_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess'   AND borno_school_stud_group='$group'  AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111' AND borno_subject_eleven_twelve_id='$sid4'";

// 					$qresultsub14=$mysqli->query($resultsub14);
// 					$rowqresultsub14=$qresultsub14->fetch_assoc();
// 					$total=$rowqresultsub14['res_total_conv'];	
// 					$lg=$rowqresultsub14['res_lg'];	
// }
					if($subjectid!="")
					{
					$pdf->Cell(7,5,$num1,1,0,'C');
					$pdf->Cell(7,5,$num2,1,0,'C');
					$pdf->Cell(7,5,$num3,1,0,'C');
					$pdf->Cell(7,5,$num4,1,0,'C');
					$pdf->Cell(7,5,$num5,1,0,'C');
				//	$pdf->Cell(7,5,$num6,1,0,'C');
					$pdf->Cell(8,5,$total,1,0,'C');
					$pdf->Cell(5,5,$lg,1,0,'C');
					}
					else
					{
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(7,5,'',1,0,'C');
				//	$pdf->Cell(7,5,'',1,0,'C');
					$pdf->Cell(8,5,'',1,0,'C');
					$pdf->Cell(5,5,'',1,0,'C');
					}

//  $resultsub5 ="select * from borno_class11_12_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND `borno_result_term_id`='$termid' AND borno_school_stud_group='$group'  AND borno_result_exam_year='$styear' AND `borno_result_term_id`='$tremid' AND borno_school_roll='$gtstotal111' AND borno_subject_eleven_twelve_id='$sid5'";

// 					$qresultsub5=$mysqli->query($resultsub5);
// 					$rowqresultsub5=$qresultsub5->fetch_assoc();
// 					$subjectid=$rowqresultsub5['borno_subject_eleven_twelve_id'];
// 					$num1=$rowqresultsub5['temp_res_number_type1'];
// 					$num2=$rowqresultsub5['res_number_type2'];
// 					$num3=round(((($num1+$num2)*80)/100));
					
// 				if($sl1 ==1 ){
//     $ctresultsub5 ="select * from borno_class11_12_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND `borno_result_term_id`='24' AND borno_school_stud_group='$group'  AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111' AND borno_subject_eleven_twelve_id='$sid5'";
//     $qctresultsub5=$mysqli->query($ctresultsub5);
// 	$rowqctresultsub5=$qctresultsub5->fetch_assoc();
//     $ctnum1=$rowqctresultsub5['temp_res_number_type1'];
// 	$ctnum2=$rowqctresultsub5['res_number_type2'];
// 	$ct = $ctnum1 + $ctnum2;
// }					
// else{
//     $ctresultsub5 ="select * from borno_class11_12_final_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND `borno_result_term_id`='59' AND borno_school_stud_group='$group'  AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111' AND borno_subject_eleven_twelve_id='$sid5'";
//     $qctresultsub5=$mysqli->query($ctresultsub5);
// 	$rowqctresultsub5=$qctresultsub5->fetch_assoc();
//     $ctnum1=$rowqctresultsub5['temp_res_number_type1'];
// 	$ctnum2=$rowqctresultsub5['res_number_type2'];
// 	$ct = $ctnum1 + $ctnum2;
    
// }					
					
// 					$num4=$ct;
// 					$num5= round(($num4*50)/100);
// 					$total=$num3+$num5;	
// 					if($total> 79){
// 					  $lg="A+";
// 					}
// 				   else if($total> 69){
// 					  $lg="A";
// 					}
// 					else if($total> 64){
// 					  $lg="A-";
// 					}
// 					else if($total> 59){
// 					  $lg="B";
// 					}
// 					else if($total> 49){
// 					  $lg="C";
// 					}
// 					else if($total> 39){
// 					  $lg="D";
// 					}
// 					else{
// 					  $lg="F";
// 					}
					
// // if($subsl>7)
// // {
// // $resultsub15 ="select * from borno_class11_12_test_result where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess'   AND borno_school_stud_group='$group'  AND borno_result_exam_year='$styear' AND borno_school_roll='$gtstotal111' AND borno_subject_eleven_twelve_id='$sid5'";

// // 					$qresultsub15=$mysqli->query($resultsub15);
// // 					$rowqresultsub15=$qresultsub15->fetch_assoc();
// // 					$total=$rowqresultsub15['res_total_conv'];	
// // 					$lg=$rowqresultsub15['res_lg'];	
// // }
// 					if($subjectid!="")
// 					{
// 					$pdf->Cell(7,5,$num1,1,0,'C');
// 					$pdf->Cell(7,5,$num2,1,0,'C');
// 					$pdf->Cell(7,5,$num3,1,0,'C');
// 					$pdf->Cell(7,5,$num4,1,0,'C');
// 					$pdf->Cell(7,5,$num5,1,0,'C');
// 					$pdf->Cell(8,5,$total,1,0,'C');
// 					$pdf->Cell(5,5,$lg,1,0,'C');
// 					}
// 					else
// 					{
// 					$pdf->Cell(7,5,'',1,0,'C');
// 					$pdf->Cell(7,5,'',1,0,'C');
// 					$pdf->Cell(7,5,'',1,0,'C');
// 					$pdf->Cell(7,5,'',1,0,'C');
// 					$pdf->Cell(7,5,'',1,0,'C');
// 					$pdf->Cell(8,5,'',1,0,'C');
// 					$pdf->Cell(5,5,'',1,0,'C');
// 					}

 
$pdf->Ln();					
					
					
					
					
  }								
					
						}
$pdf->Output();
?>