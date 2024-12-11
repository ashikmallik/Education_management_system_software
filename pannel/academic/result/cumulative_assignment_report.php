
<?php
$schId=$_GET['schoolId'];
$studClass=$_GET['classId'];
$shiftId=$_GET['shiftId'];
$section=$_GET['sectionId'];
$stsess=$_GET['scsess'];
$term=$_GET['sctermId'];
$group=$_GET['group'];

include('../../../connection.php');
 

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
 $subject ="select borno_subject_nine_ten_id from borno_class9_10_temp_mark1 where borno_school_class_id='$studClass'  AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' AND borno_school_stud_group='$group' group by borno_subject_nine_ten_id asc ";
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
 $subject ="select subject_id_six_eight from borno_class6_8_temp_mark1 where borno_school_class_id='$studClass'  AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$term' group by subject_id_six_eight asc";
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
$pdf->AddPage('p');
    

     $results = mysqli_query($mysqli, "SELECT * FROM `borno_student_info` WHERE `borno_school_id`='$schId' and `borno_school_class_id`='$studClass' and `borno_school_shift_id`='$shiftId' and `borno_school_section_id`='$section' and  `borno_school_session`='$stsess' order by `borno_school_roll` ASC ");
while ($res2= mysqli_fetch_array($results)){ 
    $class_id=$res2['borno_school_class_id'];
    $section_id=$res2['borno_school_section_id'];
    $shift_id=$res2['borno_school_shift_id'];
   $pdf->AddPage('p');
       // Arial bold 15
    $pdf->SetFont('Arial','',20);
    // Move to the right
    //$this->Cell(80);
    // Title
     $resul = mysqli_query($mysqli, "SELECT * FROM `borno_school` WHERE `borno_school_id`='$schId'");
    while ($r= mysqli_fetch_array($resul)){ 
        $logo=$r['borno_school_logo'];
        $finallogo="../infosett/school-logo/$logo";
    $pdf->Image($finallogo,95,6,30);
    }
    // $pdf->Image('Capture2.PNG',30,38,160);
    $pdf->Ln();
     $pdf->SetFont('Arial','',20);
    $pdf->Cell(25,5,'',0,0,'C');
    $pdf->Ln();$pdf->Ln();$pdf->Ln();$pdf->Ln(); $pdf->Ln(); $pdf->Ln(); 
     $result = mysqli_query($mysqli, "SELECT * FROM `borno_school` WHERE `borno_school_id`='$schId'");
    while ($re= mysqli_fetch_array($result)){ 
    $pdf->Cell(190,15,$re['borno_school_name'],0,0,'C');
    }
    $pdf->Ln(); 
   
    $pdf->Cell(190,5,'Cumulative Assesment',0,0,'C');
    $pdf->Ln(); 
    $pdf->Ln(); 
    
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(47,5,'Ex- Excellent',1,0,'C');
    $pdf->Cell(47,5,'VG- Very Good',1,0,'C');
    $pdf->Cell(47,5,'GD- Good',1,0,'C');
    
    $pdf->Cell(47,5,'PN- Progress Needed',1,0,'C');
    $pdf->Ln(); 
    $pdf->Ln();
    
    $pdf->SetFont('Arial','',20);
    $pdf->Cell(48,5,'Name:',0,0,'C');
    $pdf->Cell(100,5,$res2['borno_school_student_name'],0,0,'L');
    

    
    $pdf->Ln(); 
    $pdf->Ln();
    $pdf->Cell(46,5,'Class:',0,0,'C');
    $results2 = mysqli_query($mysqli, "SELECT * FROM `borno_school_class` WHERE `borno_school_class_id`='$studClass'");
    while ($res3= mysqli_fetch_array($results2)){ 
    $pdf->Cell(-6,5,$res3['borno_school_class_name'],0,0,'C');
    }
    $pdf->Cell(60,5,'Section:',0,0,'C');
    
    $results4 = mysqli_query($mysqli, "SELECT * FROM `borno_school_section` WHERE `borno_school_id`='$schId' and `borno_school_class_id`='$studClass' and `borno_school_shift_id`='$shiftId' and `borno_school_section_id`='$section'");
    while ($res4= mysqli_fetch_array($results4)){ 
    $pdf->Cell(-20,5,$res4['borno_school_section_name'],0,0,'C');
    }
    $pdf->Cell(50,5,'Roll:',0,0,'C');
    $pdf->Cell(-20,5,$res2['borno_school_roll'],0,0,'C');
    $pdf->Cell(65,5,'Shift:',0,0,'C');
    
        $results5 = mysqli_query($mysqli, "SELECT * FROM `borno_school_shift` WHERE `borno_school_shift_id`='$shiftId'");
    while ($res5= mysqli_fetch_array($results5)){ 
    $pdf->Cell(-20,5,$res5['borno_school_shift_name'],0,0,'C');
    }
    $pdf->Ln(); 
    $pdf->Ln();

	$pdf->Cell(50,20,"Subject",1,0,'C');
	

	$pdf->Cell(60,10,'Assignment',1,0,'C');
	$pdf->Cell(32,20,'Average',1,0,'C');
	$pdf->Cell(48,20,'Final Average',1,0,'C');

		
	
    
    // $pdf->SetFont('Arial','',8);
// 	$pdf->Cell(20,5,'Remarks',1,0,'C');
// 	$pdf->Cell(8,5,'GPA',1,0,'C');
    
    
    $pdf->Ln();
// 	$pdf->SetFont('Arial','',8);
	$pdf->Cell(50,5,'',0,0,'C');
	
	$pdf->Cell(20,-10,'1st',1,0,'C');
	$pdf->Cell(20,-10,'2nd',1,0,'C');
	$pdf->Cell(20,-10,'3rd',1,0,'C');
	
	
	
	
	
	
	
	
	$pdf->Cell(-111);
	$pdf->Cell(1,10,'',0,0,'L');
	
	$pdf->Cell(50,10,'Bangla',1,0,'L');
	$pdf->Cell(20,10,' ',1,0,'C');
	$pdf->Cell(20,10,' ',1,0,'C');
	$pdf->Cell(20,10,' ',1,0,'C');
	$pdf->Cell(32,10,' ',1,0,'C');
	$pdf->Ln();
	
	$pdf->Cell(50,10,'English',1,0,'L');
	$pdf->Cell(20,10,' ',1,0,'C');
	$pdf->Cell(20,10,' ',1,0,'C');
	$pdf->Cell(20,10,' ',1,0,'C');
	$pdf->Cell(32,10,' ',1,0,'C');
	$pdf->Ln();
	
	$pdf->Cell(50,10,'Mathematics',1,0,'L');
	$pdf->Cell(20,10,' ',1,0,'C');
	$pdf->Cell(20,10,' ',1,0,'C');
	$pdf->Cell(20,10,' ',1,0,'C');
	$pdf->Cell(32,10,' ',1,0,'C');
	$pdf->Ln();
	$pdf->Cell(50,10,'BGS',1,0,'L');
	$pdf->Cell(20,10,' ',1,0,'C');
	$pdf->Cell(20,10,' ',1,0,'C');
	$pdf->Cell(20,10,' ',1,0,'C');
	$pdf->Cell(32,10,' ',1,0,'C');
	$pdf->Ln();
	$pdf->Cell(50,10,'Science',1,0,'L');
	$pdf->Cell(20,10,' ',1,0,'C');
	$pdf->Cell(20,10,' ',1,0,'C');
	$pdf->Cell(20,10,' ',1,0,'C');
	$pdf->Cell(32,10,' ',1,0,'C');
	$pdf->Ln();
	$pdf->Cell(50,10,'Religion',1,0,'L');
	$pdf->Cell(20,10,' ',1,0,'C');
	$pdf->Cell(20,10,' ',1,0,'C');
	$pdf->Cell(20,10,' ',1,0,'C');
	$pdf->Cell(32,10,' ',1,0,'C');
	$pdf->Ln();
	$pdf->Cell(50,10,'ICT',1,0,'L');
	$pdf->Cell(20,10,' ',1,0,'C');
	$pdf->Cell(20,10,' ',1,0,'C');
	$pdf->Cell(20,10,' ',1,0,'C');
	$pdf->Cell(32,10,' ',1,0,'C');
	$pdf->Ln();
	$pdf->Cell(50,10,'Home Science',1,0,'L');
	$pdf->Cell(20,10,' ',1,0,'C');
	$pdf->Cell(20,10,' ',1,0,'C');
	$pdf->Cell(20,10,' ',1,0,'C');
	$pdf->Cell(32,10,' ',1,0,'C');
	$pdf->Ln();
	
	$pdf->Cell(142);
	$pdf->Cell(48,-80,' ',1,0,'C');
    $pdf->Cell(48,10,' ',0,0,'C');
    $pdf->Ln();
    $pdf->Ln();
    
    
    $pdf->Cell(80,0,"Class Teacher's Signature",0,0,'C');
    $pdf->Cell(150,0,"Headmaster's Signature",0,0,'C');
    $pdf->Cell(48,10,' ',0,0,'C');
     $pdf->Ln();
     $pdf->Ln();
     
      $pdf->Cell(65,10,"Guardian's Signature",0,0,'C');
	 $pdf->Ln(); $pdf->Ln(); $pdf->Ln(); $pdf->Ln(); $pdf->Ln(); $pdf->Ln();

	

	

	
	
	

	

	
	

    }
$pdf->Output();

?>


