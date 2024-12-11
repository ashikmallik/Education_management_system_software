<?php


$studClass=$_POST['studClass'];
$shiftId=$_POST['shiftId'];
$section=$_POST['section'];
$stsess=trim($_POST['stsess']);
$month=$_POST['month1'];
$year=$_POST['year1'];

include('config.php');
//include('../../../connection.php');
           
					$gtschoolName="SELECT * FROM borno_school where borno_school_id='134'";
					$qgtschoolName=$mysqli->query($gtschoolName);
   				    $sqgtschoolName=$qgtschoolName->fetch_assoc();
$fnschname=$sqgtschoolName['borno_school_name'];



$gtclass="SELECT * FROM borno_school_class where borno_school_class_id='$studClass'";
					$qgtclass=$mysqli->query($gtclass);
					$sqgtclass=$qgtclass->fetch_assoc();
$fnsclass=$sqgtclass['borno_school_class_name'];

$gtshift="SELECT * FROM borno_school_shift where borno_school_shift_id='$shiftId'";
					$qgtshift=$mysqli->query($gtshift);
					$sqgtshift=$qgtshift->fetch_assoc();
$fnsshift=$sqgtshift['borno_school_shift_name'];

$gtsection="SELECT * FROM borno_school_section where borno_school_section_id='$section'";
					$qgtsection=$mysqli->query($gtsection);
					$sqgtsection=$qgtsection->fetch_assoc();
$fnssection=$sqgtsection['borno_school_section_name'];


//echo $studClass." ";echo $shiftId." ";echo $section." ";echo $stsess." ";echo $month." ";echo $year." ";

if($month==1){$monthname="January";}
elseif($month==2){$monthname="February";}
elseif($month==3){$monthname="March";}
elseif($month==4){$monthname="April";}
elseif($month==5){$monthname="May";}
elseif($month==6){$monthname="June";}
elseif($month==7){$monthname="July";}
elseif($month==8){$monthname="August";}
elseif($month==9){$monthname="September";}
elseif($month==10){$monthname="October";}
elseif($month==11){$monthname="November";}
elseif($month==12){$monthname="December";}

 $bannar="Student Attandance $monthname-$year";
 $bannar1="Class : $fnsclass    Shift : $fnsshift    Section : $fnssection    Session : $stsess";
require('../../pannel/fpdf/fpdf.php');
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
  
	$this->Cell(280,5,$GLOBALS['fnschname'],0,0,'C');
	$this->Cell(1,6,'',0,0,'C');	
    // Line break
    $this->Ln();
    $this->SetFont('Arial','',14);
    $this->Cell(280,5,$GLOBALS['bannar'],0,0,"C");

    $this->Ln();
    $this->SetFont('Arial','',11);
    $this->Cell(280,5,$GLOBALS['bannar1'],0,0,"C");
    $this->Ln();
    
    $this->SetFont('Arial','',10);
        $this->Cell(10,5,'Roll',1,0,"C"); 		
		$this->Cell(50,5,"Student Name",1);
		$this->Cell(6.5,5,"1",1,0,'C');
        $this->Cell(6.5,5,"2",1,0,'C');
        $this->Cell(6.5,5,"3",1,0,'C');
        $this->Cell(6.5,5,"4",1,0,'C');
        $this->Cell(6.5,5,"5",1,0,'C');
        $this->Cell(6.5,5,"6",1,0,'C');
        $this->Cell(6.5,5,"7",1,0,'C');
        $this->Cell(6.5,5,"8",1,0,'C');
        $this->Cell(6.5,5,"9",1,0,'C');
        $this->Cell(6.5,5,"10",1,0,'C');
        $this->Cell(6.5,5,"11",1,0,'C');
        $this->Cell(6.5,5,"12",1,0,'C');
        $this->Cell(6.5,5,"13",1,0,'C');
        $this->Cell(6.5,5,"14",1,0,'C');
        $this->Cell(6.5,5,"15",1,0,'C');
        $this->Cell(6.5,5,"16",1,0,'C');
        $this->Cell(6.5,5,"17",1,0,'C');
        $this->Cell(6.5,5,"18",1,0,'C');
        $this->Cell(6.5,5,"19",1,0,'C');
        $this->Cell(6.5,5,"20",1,0,'C');
        $this->Cell(6.5,5,"21",1,0,'C');
        $this->Cell(6.5,5,"22",1,0,'C');
        $this->Cell(6.5,5,"23",1,0,'C');
        $this->Cell(6.5,5,"24",1,0,'C');
        $this->Cell(6.5,5,"25",1,0,'C');
        $this->Cell(6.5,5,"26",1,0,'C');
        $this->Cell(6.5,5,"27",1,0,'C');
        $this->Cell(6.5,5,"28",1,0,'C');
        $this->Cell(6.5,5,"29",1,0,'C');
        $this->Cell(6.5,5,"30",1,0,'C');
        $this->Cell(6.5,5,"31",1,0,'C');      
        $this->Cell(6.5,5,"TP",1,0,'C');
        $this->Cell(6.5,5,"TA",1,0,'C');          
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
$pdf->AddPage('L');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','',9);

		$data="select * from borno_student_info where borno_school_id='134'  AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' order by borno_school_roll asc";
					$qdata=$mysqli->query($data);
					while($showdata=$qdata->fetch_assoc()){ $sl++;
					
		
		$roll=$showdata['borno_school_roll'];
		$techname=$showdata['borno_school_student_name'];
		$techPhone=$showdata['borno_school_phone'];
		$stdid=$showdata['borno_student_info_id'];
	///	$stdid1=$showdata['borno_school_student_id'];
		
		//echo $roll."";

		$pdf->Cell(10,5,$roll,1,0,"C");
		$pdf->Cell(50,5,$techname,1);
		
	$branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='1'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$attandance=$smsbranch['borno_school_attandance'];	
	if($attandance=="P"){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}  
	elseif($attandance=="A"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}
	else{
	$pdf->Cell(6.5,5,$attandance,1,0,"C");    
	}
			
		
	$branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='2'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$attandance=$smsbranch['borno_school_attandance'];	
	if($attandance=="P"){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}  
	elseif($attandance=="A"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}
	else{
	$pdf->Cell(6.5,5,$attandance,1,0,"C");    
	}
		
	$branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='3'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$attandance=$smsbranch['borno_school_attandance'];	
	if($attandance=="P"){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}  
	elseif($attandance=="A"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}
	else{
	$pdf->Cell(6.5,5,$attandance,1,0,"C");    
	}
		
	$branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='4'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$attandance=$smsbranch['borno_school_attandance'];	
	if($attandance=="P"){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}  
	elseif($attandance=="A"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}
	else{
	$pdf->Cell(6.5,5,$attandance,1,0,"C");    
	}
		
	$branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='5'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$attandance=$smsbranch['borno_school_attandance'];	
	if($attandance=="P"){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}  
	elseif($attandance=="A"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}
	else{
	$pdf->Cell(6.5,5,$attandance,1,0,"C");    
	}
		
		
	$branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='6'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$attandance=$smsbranch['borno_school_attandance'];	
	if($attandance=="P"){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}  
	elseif($attandance=="A"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}
	else{
	$pdf->Cell(6.5,5,$attandance,1,0,"C");    
	}
		
	$branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='7'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$attandance=$smsbranch['borno_school_attandance'];	
	if($attandance=="P"){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}  
	elseif($attandance=="A"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}
	else{
	$pdf->Cell(6.5,5,$attandance,1,0,"C");    
	}
		
	$branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='8'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$attandance=$smsbranch['borno_school_attandance'];	
	if($attandance=="P"){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}  
	elseif($attandance=="A"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}
	else{
	$pdf->Cell(6.5,5,$attandance,1,0,"C");    
	}
		
	$branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='9'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$attandance=$smsbranch['borno_school_attandance'];	
	if($attandance=="P"){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}  
	elseif($attandance=="A"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}
	else{
	$pdf->Cell(6.5,5,$attandance,1,0,"C");    
	}
		
	$branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='10'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$attandance=$smsbranch['borno_school_attandance'];	
	if($attandance=="P"){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}  
	elseif($attandance=="A"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}
	else{
	$pdf->Cell(6.5,5,$attandance,1,0,"C");    
	}
		
	$branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='11'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$attandance=$smsbranch['borno_school_attandance'];	
	if($attandance=="P"){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}  
	elseif($attandance=="A"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}
	else{
	$pdf->Cell(6.5,5,$attandance,1,0,"C");    
	}
		
	$branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='12'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$attandance=$smsbranch['borno_school_attandance'];	
	if($attandance=="P"){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}  
	elseif($attandance=="A"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}
	else{
	$pdf->Cell(6.5,5,$attandance,1,0,"C");    
	}
		
	$branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='13'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$attandance=$smsbranch['borno_school_attandance'];	
	if($attandance=="P"){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}  
	elseif($attandance=="A"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}
	else{
	$pdf->Cell(6.5,5,$attandance,1,0,"C");    
	}
		
	$branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='14'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$attandance=$smsbranch['borno_school_attandance'];	
	if($attandance=="P"){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}  
	elseif($attandance=="A"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}
	else{
	$pdf->Cell(6.5,5,$attandance,1,0,"C");    
	}
		
	$branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='15'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$attandance=$smsbranch['borno_school_attandance'];	
	if($attandance=="P"){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}  
	elseif($attandance=="A"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}
	else{
	$pdf->Cell(6.5,5,$attandance,1,0,"C");    
	}
		
	$branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='16'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$attandance=$smsbranch['borno_school_attandance'];	
	if($attandance=="P"){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}  
	elseif($attandance=="A"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}
	else{
	$pdf->Cell(6.5,5,$attandance,1,0,"C");    
	}
		
	$branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='17'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$attandance=$smsbranch['borno_school_attandance'];	
	if($attandance=="P"){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}  
	elseif($attandance=="A"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}
	else{
	$pdf->Cell(6.5,5,$attandance,1,0,"C");    
	}
		
	$branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='18'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$attandance=$smsbranch['borno_school_attandance'];	
	if($attandance=="P"){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}  
	elseif($attandance=="A"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}
	else{
	$pdf->Cell(6.5,5,$attandance,1,0,"C");    
	}
		
	$branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='19'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$attandance=$smsbranch['borno_school_attandance'];	
	if($attandance=="P"){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}  
	elseif($attandance=="A"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}
	else{
	$pdf->Cell(6.5,5,$attandance,1,0,"C");    
	}
		
	$branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='20'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$attandance=$smsbranch['borno_school_attandance'];	
	if($attandance=="P"){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}  
	elseif($attandance=="A"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}
	else{
	$pdf->Cell(6.5,5,$attandance,1,0,"C");    
	}
		
	$branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='21'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$attandance=$smsbranch['borno_school_attandance'];	
	if($attandance=="P"){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}  
	elseif($attandance=="A"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}
	else{
	$pdf->Cell(6.5,5,$attandance,1,0,"C");    
	}
		
	$branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='22'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$attandance=$smsbranch['borno_school_attandance'];	
	if($attandance=="P"){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}  
	elseif($attandance=="A"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}
	else{
	$pdf->Cell(6.5,5,$attandance,1,0,"C");    
	}
		
	$branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='23'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$attandance=$smsbranch['borno_school_attandance'];	
	if($attandance=="P"){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}  
	elseif($attandance=="A"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}
	else{
	$pdf->Cell(6.5,5,$attandance,1,0,"C");    
	}
		
	$branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='24'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$attandance=$smsbranch['borno_school_attandance'];	
	if($attandance=="P"){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}  
	elseif($attandance=="A"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}
	else{
	$pdf->Cell(6.5,5,$attandance,1,0,"C");    
	}
		
	$branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='25'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$attandance=$smsbranch['borno_school_attandance'];	
	if($attandance=="P"){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}  
	elseif($attandance=="A"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}
	else{
	$pdf->Cell(6.5,5,$attandance,1,0,"C");    
	}
		
	$branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='26'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$attandance=$smsbranch['borno_school_attandance'];	
	if($attandance=="P"){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}  
	elseif($attandance=="A"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}
	else{
	$pdf->Cell(6.5,5,$attandance,1,0,"C");    
	}
		
	$branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='27'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$attandance=$smsbranch['borno_school_attandance'];	
	if($attandance=="P"){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}  
	elseif($attandance=="A"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}
	else{
	$pdf->Cell(6.5,5,$attandance,1,0,"C");    
	}
		
	$branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='28'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$attandance=$smsbranch['borno_school_attandance'];	
	if($attandance=="P"){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}  
	elseif($attandance=="A"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}
	else{
	$pdf->Cell(6.5,5,$attandance,1,0,"C");    
	}
		
	$branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='29'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$attandance=$smsbranch['borno_school_attandance'];	
	if($attandance=="P"){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}  
	elseif($attandance=="A"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}
	else{
	$pdf->Cell(6.5,5,$attandance,1,0,"C");    
	}
		
	$branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='30'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$attandance=$smsbranch['borno_school_attandance'];	
	if($attandance=="P"){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}  
	elseif($attandance=="A"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}
	else{
	$pdf->Cell(6.5,5,$attandance,1,0,"C");    
	}
		
	$branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='31'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$attandance=$smsbranch['borno_school_attandance'];	
	if($attandance=="P"){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}  
	elseif($attandance=="A"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(6.5,5,$attandance,1,0,"C",1);    
	}
	else{
	$pdf->Cell(6.5,5,$attandance,1,0,"C");    
	}

	$branch="select Count(borno_student_info_id) As presence from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_attandance`='P'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$presence=$smsbranch['presence'];
	    $pdf->Cell(6.5,5,$presence,1,0,"C");
	    
	$branch="select Count(borno_student_info_id) As absent from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_attandance`='A'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$absent=$smsbranch['absent'];
	    $pdf->Cell(6.5,5,$absent,1,0,"C");	    
	
$pdf->Ln();
}






		


$pdf->Output();
?>