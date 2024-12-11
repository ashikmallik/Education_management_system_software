<?php


  $stdid=$_GET['teacherid'];


include('../../../connection.php');

	$data="select * from borno_teacher_info where borno_teacher_info_id='$stdid'";
					$qdata=$mysqli->query($data);
					$showdata=$qdata->fetch_assoc();
					
		$schId=$showdata['borno_school_id'];
		$branchId=$showdata['borno_school_branch_id'];
		$shiftId=$showdata['borno_school_shift_id'];
		$name=$showdata['borno_teacher_name'];
		$phone=substr($showdata['borno_teacher_phone'],2,11);
		$photo=$showdata['borno_teacher_photo'];
		$teachername="Teacher Name : $name";
	
		if($showdata['borno_teacher_photo']!=""){
	
	$stphotofina="../teacher/teacherphoto/$photo";
	
	} else {
	
	$stphotofina="../teacher/teacherphoto/nophoto.jpg";
	
	}
	   


$gtschoolName="SELECT * FROM borno_school where borno_school_id=$schId";
					$qgtschoolName=$mysqli->query($gtschoolName);
					$sqgtschoolName=$qgtschoolName->fetch_assoc();
$fnschname=$sqgtschoolName['borno_school_name'];

$gtbranch="SELECT * FROM borno_school_branch where borno_school_id=$schId AND borno_school_branch_id=$branchId";
					$qgtbranch=$mysqli->query($gtbranch);
					$sqgtbranch=$qgtbranch->fetch_assoc();
$fnsbranch=$sqgtbranch['borno_school_branch_name'];
$fnsbranchname="Branch : $fnsbranch";

$gtshift="SELECT * FROM borno_school_shift where borno_school_shift_id=$shiftId";
					$qgtshift=$mysqli->query($gtshift);
					$sqgtshift=$qgtshift->fetch_assoc();
$fnsshift=$sqgtshift['borno_school_shift_name'];
$fnsshiftname="Shift : $fnsshift";

 
	   
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
  
	$this->Cell(280,5,$GLOBALS['fnschname'],0,1,'C');
    // Line break
    $this->Ln();
    $this->SetFont('Arial','B',12);
    $this->Cell(280,5,$GLOBALS['fnsbranchname'],0,0,"C");
    $this->Ln();
    $this->SetFont('Arial','',14);
    $this->Cell(280,5,$GLOBALS['fnsshiftname'],0,0,"C");
    $this->Ln();

    $this->Cell(280,5,$GLOBALS['teachername'],0,0,"C");
    $this->Ln();
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
$pdf->AddPage(L);
$pdf->SetFont('Arial','',12);

  
	    $pdf->Image("$stphotofina", 265, 18, 30, 30);
		
		$pdf->Cell(25,5,"Day/Period",1,0,"C");
		$pdf->Cell(32,5,"1st",1,0,"C");
		$pdf->Cell(32,5,"2nd",1,0,"C");
		$pdf->Cell(32,5,"3rd",1,0,"C");
		$pdf->Cell(32,5,"4th",1,0,"C");
		$pdf->Cell(32,5,"5th",1,0,"C");
		$pdf->Cell(32,5,"6th",1,0,"C");
		$pdf->Cell(32,5,"7th",1,0,"C");
		$pdf->Cell(32,5,"8th",1,0,"C");
		$pdf->Ln();
		$data1="select * from borno_school_class_routine where borno_school_teacher_id='$stdid' group by borno_school_routine_day asc";
					$qdata1=$mysqli->query($data1);
					while($showdata1=$qdata1->fetch_assoc()){
					$dayid=$showdata1['borno_school_routine_day'];
                    if($dayid==1){$rday="Saturday";}
                    elseif($dayid==2){$rday="Sunday";}
                    elseif($dayid==3){$rday="Monday";}
                    elseif($dayid==4){$rday="Tuesday";}
                    elseif($dayid==5){$rday="Wednesday";}
                    elseif($dayid==6){$rday="Thursday";}
                    elseif($dayid==7){$rday="Friday";}
                    $pdf->Cell(25,5,$rday,1,0,"C");	
                    
//=============================1st Period==================                    
 $gtday1="SELECT * FROM borno_school_class_routine where borno_school_teacher_id=$stdid AND borno_school_routine_day=$dayid AND  	borno_school_routine_period='First'";
					$qgtday1=$mysqli->query($gtday1);
					$sqgtday1=$qgtday1->fetch_assoc();
					$classid1=$sqgtday1['borno_school_class_id'];
					$sectionid1=$sqgtday1['borno_school_section_id'];
					$subid1=$sqgtday1['borno_school_subject_id'];

if($classid1!="")
{
$gtclass1="SELECT * FROM borno_school_class where borno_school_class_id=$classid1";
					$qgtclass1=$mysqli->query($gtclass1);
					$sqgtclass1=$qgtclass1->fetch_assoc();
$classname1=$sqgtclass1['borno_school_class_name'];

$gtsection1="SELECT * FROM borno_school_section where borno_school_section_id=$sectionid1";
					$qgtsection1=$mysqli->query($gtsection1);
					$sqgtsection1=$qgtsection1->fetch_assoc();
$sectionname1=substr($sqgtsection1['borno_school_section_name'],0,4);

if($classid1==1 OR $classid1==2){
$gtsubject1="SELECT * FROM borno_subject_nine_ten where borno_subject_nine_ten_id=$subid1";
					$qgtsubject1=$mysqli->query($gtsubject1);
					$sqgtsubject1=$qgtsubject1->fetch_assoc();
$subjectname1=substr($sqgtsubject1['borno_subject_name_short'],0,4);
}
elseif($classid1==3 OR $classid1==4 OR $classid1==5){
$gtsubject1="SELECT * FROM borno_subject_six_eight where subject_id_six_eight=$subid1";
					$qgtsubject1=$mysqli->query($gtsubject1);
					$sqgtsubject1=$qgtsubject1->fetch_assoc();
$subjectname1=substr($sqgtsubject1['borno_subject_name_short'],0,4);
}
else
{
$gtsubject1="SELECT * FROM borno_result_subject where borno_result_subject_id=$subid1";
					$qgtsubject1=$mysqli->query($gtsubject1);
					$sqgtsubject1=$qgtsubject1->fetch_assoc();
$subjectname1=substr($sqgtsubject1['borno_subject_name_short'],0,4);
}
$first="$classname1-$sectionname1-$subjectname1";

					$pdf->Cell(32,5,$first,1,0,"C");
}
else
{
 $pdf->Cell(32,5,"N/A",1,0,"C");   
}

//=============================2nd Period==================                    
 $gtday2="SELECT * FROM borno_school_class_routine where borno_school_teacher_id=$stdid AND borno_school_routine_day=$dayid AND  	borno_school_routine_period='Second'";
					$qgtday2=$mysqli->query($gtday2);
					$sqgtday2=$qgtday2->fetch_assoc();
					$classid2=$sqgtday2['borno_school_class_id'];
					$sectionid2=$sqgtday2['borno_school_section_id'];
					$subid2=$sqgtday2['borno_school_subject_id'];

if($classid2!="")
{
$gtclass2="SELECT * FROM borno_school_class where borno_school_class_id=$classid2";
					$qgtclass2=$mysqli->query($gtclass2);
					$sqgtclass2=$qgtclass2->fetch_assoc();
$classname2=$sqgtclass2['borno_school_class_name'];

$gtsection2="SELECT * FROM borno_school_section where borno_school_section_id=$sectionid2";
					$qgtsection2=$mysqli->query($gtsection2);
					$sqgtsection2=$qgtsection2->fetch_assoc();
$sectionname2=substr($sqgtsection2['borno_school_section_name'],0,4);

if($classid2==1 OR $classid2==2){
$gtsubject2="SELECT * FROM borno_subject_nine_ten where borno_subject_nine_ten_id=$subid2";
					$qgtsubject2=$mysqli->query($gtsubject2);
					$sqgtsubject2=$qgtsubject2->fetch_assoc();
$subjectname2=substr($sqgtsubject2['borno_subject_name_short'],0,4);
}
elseif($classid2==3 OR $classid2==4 OR $classid2==5){
$gtsubject2="SELECT * FROM borno_subject_six_eight where subject_id_six_eight=$subid2";
					$qgtsubject2=$mysqli->query($gtsubject2);
					$sqgtsubject2=$qgtsubject2->fetch_assoc();
$subjectname2=substr($sqgtsubject2['borno_subject_name_short'],0,4);
}
else
{
$gtsubject2="SELECT * FROM borno_result_subject where borno_result_subject_id=$subid2";
					$qgtsubject2=$mysqli->query($gtsubject2);
					$sqgtsubject2=$qgtsubject2->fetch_assoc();
$subjectname2=substr($sqgtsubject2['borno_subject_name_short'],0,4);
}
$second="$classname2-$sectionname2-$subjectname2";

					$pdf->Cell(32,5,$second,1,0,"C");
}
else
{
 $pdf->Cell(32,5,"N/A",1,0,"C");   
}

//=============================3rd Period==================                    
 $gtday3="SELECT * FROM borno_school_class_routine where borno_school_teacher_id=$stdid AND borno_school_routine_day=$dayid AND  	borno_school_routine_period='Third'";
					$qgtday3=$mysqli->query($gtday3);
					$sqgtday3=$qgtday3->fetch_assoc();
					$classid3=$sqgtday3['borno_school_class_id'];
					$sectionid3=$sqgtday3['borno_school_section_id'];
					$subid3=$sqgtday3['borno_school_subject_id'];

if($classid3!="")
{
$gtclass3="SELECT * FROM borno_school_class where borno_school_class_id=$classid3";
					$qgtclass3=$mysqli->query($gtclass3);
					$sqgtclass3=$qgtclass3->fetch_assoc();
$classname3=$sqgtclass3['borno_school_class_name'];

$gtsection3="SELECT * FROM borno_school_section where borno_school_section_id=$sectionid3";
					$qgtsection3=$mysqli->query($gtsection3);
					$sqgtsection3=$qgtsection3->fetch_assoc();
$sectionname3=substr($sqgtsection3['borno_school_section_name'],0,4);

if($classid3==1 OR $classid3==2){
$gtsubject3="SELECT * FROM borno_subject_nine_ten where borno_subject_nine_ten_id=$subid3";
					$qgtsubject3=$mysqli->query($gtsubject3);
					$sqgtsubject3=$qgtsubject3->fetch_assoc();
$subjectname3=substr($sqgtsubject3['borno_subject_name_short'],0,4);
}
elseif($classid3==3 OR $classid3==4 OR $classid3==5){
$gtsubject3="SELECT * FROM borno_subject_six_eight where subject_id_six_eight=$subid3";
					$qgtsubject3=$mysqli->query($gtsubject3);
					$sqgtsubject3=$qgtsubject3->fetch_assoc();
$subjectname3=substr($sqgtsubject3['borno_subject_name_short'],0,4);
}
else
{
$gtsubject3="SELECT * FROM borno_result_subject where borno_result_subject_id=$subid3";
					$qgtsubject3=$mysqli->query($gtsubject3);
					$sqgtsubject3=$qgtsubject3->fetch_assoc();
$subjectname3=substr($sqgtsubject3['borno_subject_name_short'],0,4);
}
$third="$classname3-$sectionname3-$subjectname3";

					$pdf->Cell(32,5,$third,1,0,"C");
}
else
{
 $pdf->Cell(32,5,"N/A",1,0,"C");   
}

//=============================4th Period==================                    
 $gtday4="SELECT * FROM borno_school_class_routine where borno_school_teacher_id=$stdid AND borno_school_routine_day=$dayid AND  	borno_school_routine_period='Fourth'";
					$qgtday4=$mysqli->query($gtday4);
					$sqgtday4=$qgtday4->fetch_assoc();
					$classid4=$sqgtday4['borno_school_class_id'];
					$sectionid4=$sqgtday4['borno_school_section_id'];
					$subid4=$sqgtday4['borno_school_subject_id'];

if($classid4!="")
{
$gtclass4="SELECT * FROM borno_school_class where borno_school_class_id=$classid4";
					$qgtclass4=$mysqli->query($gtclass4);
					$sqgtclass4=$qgtclass4->fetch_assoc();
$classname4=$sqgtclass4['borno_school_class_name'];

$gtsection4="SELECT * FROM borno_school_section where borno_school_section_id=$sectionid4";
					$qgtsection4=$mysqli->query($gtsection4);
					$sqgtsection4=$qgtsection4->fetch_assoc();
$sectionname4=substr($sqgtsection4['borno_school_section_name'],0,4);

if($classid4==1 OR $classid4==2){
$gtsubject4="SELECT * FROM borno_subject_nine_ten where borno_subject_nine_ten_id=$subid4";
					$qgtsubject4=$mysqli->query($gtsubject4);
					$sqgtsubject4=$qgtsubject4->fetch_assoc();
$subjectname4=substr($sqgtsubject4['borno_subject_name_short'],0,4);
}
elseif($classid4==3 OR $classid4==4 OR $classid4==5){
$gtsubject4="SELECT * FROM borno_subject_six_eight where subject_id_six_eight=$subid4";
					$qgtsubject4=$mysqli->query($gtsubject4);
					$sqgtsubject4=$qgtsubject4->fetch_assoc();
$subjectname4=substr($sqgtsubject4['borno_subject_name_short'],0,4);
}
else
{
$gtsubject4="SELECT * FROM borno_result_subject where borno_result_subject_id=$subid4";
					$qgtsubject4=$mysqli->query($gtsubject4);
					$sqgtsubject4=$qgtsubject4->fetch_assoc();
$subjectname4=substr($sqgtsubject4['borno_subject_name_short'],0,4);
}
$forth="$classname4-$sectionname4-$subjectname4";

					$pdf->Cell(32,5,$forth,1,0,"C");
}
else
{
 $pdf->Cell(32,5,"N/A",1,0,"C");   
}

//=============================5th Period==================                    
 $gtday5="SELECT * FROM borno_school_class_routine where borno_school_teacher_id=$stdid AND borno_school_routine_day=$dayid AND  	borno_school_routine_period='Fifth'";
					$qgtday5=$mysqli->query($gtday5);
					$sqgtday5=$qgtday5->fetch_assoc();
					$classid5=$sqgtday5['borno_school_class_id'];
					$sectionid5=$sqgtday5['borno_school_section_id'];
					$subid5=$sqgtday5['borno_school_subject_id'];

if($classid5!="")
{
$gtclass5="SELECT * FROM borno_school_class where borno_school_class_id=$classid5";
					$qgtclass5=$mysqli->query($gtclass5);
					$sqgtclass5=$qgtclass5->fetch_assoc();
$classname5=$sqgtclass5['borno_school_class_name'];

$gtsection5="SELECT * FROM borno_school_section where borno_school_section_id=$sectionid5";
					$qgtsection5=$mysqli->query($gtsection5);
					$sqgtsection5=$qgtsection5->fetch_assoc();
$sectionname5=substr($sqgtsection5['borno_school_section_name'],0,4);

if($classid5==1 OR $classid5==2){
$gtsubject5="SELECT * FROM borno_subject_nine_ten where borno_subject_nine_ten_id=$subid5";
					$qgtsubject5=$mysqli->query($gtsubject5);
					$sqgtsubject5=$qgtsubject5->fetch_assoc();
$subjectname5=substr($sqgtsubject5['borno_subject_name_short'],0,4);
}
elseif($classid5==3 OR $classid5==4 OR $classid5==5){
$gtsubject5="SELECT * FROM borno_subject_six_eight where subject_id_six_eight=$subid5";
					$qgtsubject5=$mysqli->query($gtsubject5);
					$sqgtsubject5=$qgtsubject5->fetch_assoc();
$subjectname5=substr($sqgtsubject5['borno_subject_name_short'],0,4);
}
else
{
$gtsubject5="SELECT * FROM borno_result_subject where borno_result_subject_id=$subid5";
					$qgtsubject5=$mysqli->query($gtsubject5);
					$sqgtsubject5=$qgtsubject5->fetch_assoc();
$subjectname5=substr($sqgtsubject5['borno_subject_name_short'],0,4);
}
$fifth="$classname5-$sectionname5-$subjectname5";

					$pdf->Cell(32,5,$fifth,1,0,"C");
}
else
{
 $pdf->Cell(32,5,"N/A",1,0,"C");   
}

//=============================Six Period==================                    
 $gtday6="SELECT * FROM borno_school_class_routine where borno_school_teacher_id=$stdid AND borno_school_routine_day=$dayid AND  	borno_school_routine_period='Sixth'";
					$qgtday6=$mysqli->query($gtday6);
					$sqgtday6=$qgtday6->fetch_assoc();
					$classid6=$sqgtday6['borno_school_class_id'];
					$sectionid6=$sqgtday6['borno_school_section_id'];
					$subid6=$sqgtday6['borno_school_subject_id'];

if($classid6!="")
{
$gtclass6="SELECT * FROM borno_school_class where borno_school_class_id=$classid6";
					$qgtclass6=$mysqli->query($gtclass6);
					$sqgtclass6=$qgtclass6->fetch_assoc();
$classname6=$sqgtclass6['borno_school_class_name'];

$gtsection6="SELECT * FROM borno_school_section where borno_school_section_id=$sectionid6";
					$qgtsection6=$mysqli->query($gtsection6);
					$sqgtsection6=$qgtsection6->fetch_assoc();
$sectionname6=substr($sqgtsection6['borno_school_section_name'],0,4);

if($classid6==1 OR $classid6==2){
$gtsubject6="SELECT * FROM borno_subject_nine_ten where borno_subject_nine_ten_id=$subid6";
					$qgtsubject6=$mysqli->query($gtsubject6);
					$sqgtsubject6=$qgtsubject6->fetch_assoc();
$subjectname6=substr($sqgtsubject6['borno_subject_name_short'],0,4);
}
elseif($classid6==3 OR $classid6==4 OR $classid6==5){
$gtsubject6="SELECT * FROM borno_subject_six_eight where subject_id_six_eight=$subid6";
					$qgtsubject6=$mysqli->query($gtsubject6);
					$sqgtsubject6=$qgtsubject6->fetch_assoc();
$subjectname6=substr($sqgtsubject6['borno_subject_name_short'],0,4);
}
else
{
$gtsubject6="SELECT * FROM borno_result_subject where borno_result_subject_id=$subid6";
					$qgtsubject6=$mysqli->query($gtsubject6);
					$sqgtsubject6=$qgtsubject6->fetch_assoc();
$subjectname6=substr($sqgtsubject6['borno_subject_name_short'],0,4);
}
$sixth="$classname6-$sectionname6-$subjectname6";

					$pdf->Cell(32,5,$sixth,1,0,"C");
}
else
{
 $pdf->Cell(32,5,"N/A",1,0,"C");   
}

//=============================7th Period==================                    
 $gtday7="SELECT * FROM borno_school_class_routine where borno_school_teacher_id=$stdid AND borno_school_routine_day=$dayid AND  	borno_school_routine_period='Seventh'";
					$qgtday7=$mysqli->query($gtday7);
					$sqgtday7=$qgtday7->fetch_assoc();
					$classid7=$sqgtday7['borno_school_class_id'];
					$sectionid7=$sqgtday7['borno_school_section_id'];
					$subid7=$sqgtday7['borno_school_subject_id'];

if($classid7!="")
{
$gtclass7="SELECT * FROM borno_school_class where borno_school_class_id=$classid7";
					$qgtclass7=$mysqli->query($gtclass7);
					$sqgtclass7=$qgtclass7->fetch_assoc();
$classname7=$sqgtclass7['borno_school_class_name'];

$gtsection7="SELECT * FROM borno_school_section where borno_school_section_id=$sectionid7";
					$qgtsection7=$mysqli->query($gtsection7);
					$sqgtsection7=$qgtsection7->fetch_assoc();
$sectionname7=substr($sqgtsection7['borno_school_section_name'],0,4);

if($classid7==1 OR $classid7==2){
$gtsubject7="SELECT * FROM borno_subject_nine_ten where borno_subject_nine_ten_id=$subid7";
					$qgtsubject7=$mysqli->query($gtsubject7);
					$sqgtsubject7=$qgtsubject7->fetch_assoc();
$subjectname7=substr($sqgtsubject7['borno_subject_name_short'],0,4);
}
elseif($classid7==3 OR $classid7==4 OR $classid7==5){
$gtsubject7="SELECT * FROM borno_subject_six_eight where subject_id_six_eight=$subid7";
					$qgtsubject7=$mysqli->query($gtsubject7);
					$sqgtsubject7=$qgtsubject7->fetch_assoc();
$subjectname7=substr($sqgtsubject7['borno_subject_name_short'],0,4);
}
else
{
$gtsubject7="SELECT * FROM borno_result_subject where borno_result_subject_id=$subid7";
					$qgtsubject7=$mysqli->query($gtsubject7);
					$sqgtsubject7=$qgtsubject7->fetch_assoc();
$subjectname7=substr($sqgtsubject7['borno_subject_name_short'],0,4);
}
$seventh="$classname7-$sectionname7-$subjectname7";

					$pdf->Cell(32,5,$seventh,1,0,"C");
}
else
{
 $pdf->Cell(32,5,"N/A",1,0,"C");   
}

//=============================8th Period==================                    
 $gtday8="SELECT * FROM borno_school_class_routine where borno_school_teacher_id=$stdid AND borno_school_routine_day=$dayid AND  	borno_school_routine_period='Eighth'";
					$qgtday8=$mysqli->query($gtday8);
					$sqgtday8=$qgtday8->fetch_assoc();
					$classid8=$sqgtday8['borno_school_class_id'];
					$sectionid8=$sqgtday8['borno_school_section_id'];
					$subid8=$sqgtday8['borno_school_subject_id'];

if($classid8!="")
{
$gtclass8="SELECT * FROM borno_school_class where borno_school_class_id=$classid8";
					$qgtclass8=$mysqli->query($gtclass8);
					$sqgtclass8=$qgtclass8->fetch_assoc();
$classname8=$sqgtclass8['borno_school_class_name'];

$gtsection8="SELECT * FROM borno_school_section where borno_school_section_id=$sectionid8";
					$qgtsection8=$mysqli->query($gtsection8);
					$sqgtsection8=$qgtsection8->fetch_assoc();
$sectionname8=substr($sqgtsection8['borno_school_section_name'],0,4);

if($classid8==1 OR $classid8==2){
$gtsubject8="SELECT * FROM borno_subject_nine_ten where borno_subject_nine_ten_id=$subid8";
					$qgtsubject8=$mysqli->query($gtsubject8);
					$sqgtsubject8=$qgtsubject8->fetch_assoc();
$subjectname8=substr($sqgtsubject8['borno_subject_name_short'],0,4);
}
elseif($classid8==3 OR $classid8==4 OR $classid8==5){
$gtsubject8="SELECT * FROM borno_subject_six_eight where subject_id_six_eight=$subid8";
					$qgtsubject8=$mysqli->query($gtsubject8);
					$sqgtsubject8=$qgtsubject8->fetch_assoc();
$subjectname8=substr($sqgtsubject8['borno_subject_name_short'],0,4);
}
else
{
$gtsubject8="SELECT * FROM borno_result_subject where borno_result_subject_id=$subid8";
					$qgtsubject8=$mysqli->query($gtsubject8);
					$sqgtsubject8=$qgtsubject8->fetch_assoc();
$subjectname8=substr($sqgtsubject8['borno_subject_name_short'],0,4);
}
$eighth="$classname8-$sectionname8-$subjectname8";

					$pdf->Cell(32,5,$eighth,1,0,"C");
}
else
{
 $pdf->Cell(32,5,"N/A",1,0,"C");   
}
                    $pdf->Ln();
					}

$pdf->Output();
?>