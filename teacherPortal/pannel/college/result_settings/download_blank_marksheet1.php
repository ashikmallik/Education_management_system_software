<?php

 $branchId=$_GET['stbranch'];
  $schId=$_GET['schoolId'];
  $studClass=$_GET['classId'];
  $shiftId=$_GET['shiftId'];
  $section=$_GET['sectionId'];
  $stsess=$_GET['scsess'];
   $gttermId=$_GET['sctermId'];
   $dept=$_GET['dept'];
include('../../../../connection.php');
$gtschoolName="SELECT * FROM borno_school where borno_school_id=$schId";
					$qgtschoolName=$mysqli->query($gtschoolName);
					$sqgtschoolName=$qgtschoolName->fetch_assoc();

                    $fnschname=$sqgtschoolName['borno_school_name'];

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

$gtsection="select * from borno_result_add_term where borno_school_id=$schId AND borno_school_class_id=$studClass AND borno_school_session='$stsess' AND borno_result_term_id='$gttermId'";
					$qgtsection=$mysqli->query($gtsection);
					$sqgtsection=$qgtsection->fetch_assoc();
$fnschname1=$sqgtsection['borno_result_term_name'];

$gtmaxroll="select * from borno_student_info where borno_school_section_id='$section' AND borno_school_session='$stsess' order by borno_school_roll desc limit 0,1";
					$qgtmaxroll=$mysqli->query($gtmaxroll);
					$sqgtmaxroll=$qgtmaxroll->fetch_assoc();
$maxroll=$sqgtmaxroll['borno_school_roll'];
$maxroll1=$maxroll+1;

$gtminroll="select * from borno_student_info where borno_school_section_id='$section' AND borno_school_session='$stsess' order by borno_school_roll asc limit 0,1";
					$qgtminroll=$mysqli->query($gtminroll);
					$sqgtminroll=$qgtminroll->fetch_assoc();
$minroll=$sqgtminroll['borno_school_roll'];




require('../../../fpdf/fpdf.php');
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
  
	$this->Cell(200,5,$GLOBALS['fnschname'],0,1,'C');
    // Line break
    $this->Ln();
    $this->SetFont('Arial','',14);
    $this->Cell(100,5,"Branch :",0,0,"R");
    $this->Cell(100,5,$GLOBALS['fnsbranch'],0,0,"L");
    $this->Ln();
    $this->SetFont('Arial','',12);
    $this->Cell(200,5,"Subject Name :",0,0,"L");
    $this->Ln();
    $this->SetFont('Arial','',11);
    $this->Cell(12,5,'Class :',0,0,'L');
    $this->Cell(18,5,$GLOBALS['fnsclass'],0,0,'L');
    $this->Cell(12,5,'Shift :',0,0,'L');
    $this->Cell(18,5,$GLOBALS['fnsshift'],0,0,'L');
    $this->Cell(15,5,'Section :',0,0,'L');
    $this->Cell(35,5,$GLOBALS['fnssection'],0,0,'L');
    $this->Cell(12,5,'Term :',0,0,'L');
    $this->Cell(33,5,$GLOBALS['fnschname1'],0,0,'L');
    $this->Cell(18,5,'Session :',0,0,'L');
    $this->Cell(10,5,$GLOBALS['stsess'],0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',10);
        $this->Cell(13,7,"Roll No",1,0,"C");
		$this->Cell(20,7,Creative,1,0,'C');
		$this->Cell(20,7,MCQ,1,0,'C');
		$this->Cell(20,7,Practical,1,0,'C');
		$this->Cell(20,7,CA,1,0,'C');
		$this->Cell(4,7,'',0,0,'C');
		$this->Cell(13,7,"Roll No",1,0,"C");
		$this->Cell(20,7,Creative,1,0,'C');
		$this->Cell(20,7,MCQ,1,0,'C');
		$this->Cell(20,7,Practical,1,0,'C');
		$this->Cell(20,7,CA,1,0,'C');
	$this->Ln();	
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','',10);
    $this->Cell(40,5,"Teacher's Name :",0,0,"L");
    $this->Ln();
    $this->Cell(40,2,'',0,5,"L");
    $this->Cell(40,5,"Teacher's Mobile No :",0,0,"L");
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,5,'Page '.$this->PageNo().'/{nb}',0,0,'R');
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

				$data="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_school_stud_group='$dept' AND borno_school_roll between '$minroll' AND '$maxroll' order by borno_school_roll asc";
$sl=0;
					$qdata=$mysqli->query($data);
					while($showdata=$qdata->fetch_assoc()){ $sl++;
		             $stroll=$showdata['borno_school_roll'];
		      if($sl==1){$stroll1=$stroll;}
		      if($sl==2){$stroll2=$stroll;}
		      if($sl==3){$stroll3=$stroll;}
		      if($sl==4){$stroll4=$stroll;}
		      if($sl==5){$stroll5=$stroll;}
		      if($sl==6){$stroll6=$stroll;}
		      if($sl==7){$stroll7=$stroll;}
		      if($sl==8){$stroll8=$stroll;}
		      if($sl==9){$stroll9=$stroll;}
		      if($sl==10){$stroll10=$stroll;}
		      if($sl==11){$stroll11=$stroll;}
		      if($sl==12){$stroll12=$stroll;}
		      if($sl==13){$stroll13=$stroll;}
		      if($sl==14){$stroll14=$stroll;}
		      if($sl==15){$stroll15=$stroll;}
		      if($sl==16){$stroll16=$stroll;}	
		      if($sl==17){$stroll17=$stroll;}
		      if($sl==18){$stroll18=$stroll;}
		      if($sl==19){$stroll19=$stroll;}
		      if($sl==20){$stroll20=$stroll;}
		      if($sl==21){$stroll21=$stroll;}
		      if($sl==22){$stroll22=$stroll;}
		      if($sl==23){$stroll23=$stroll;}
		      if($sl==24){$stroll24=$stroll;}
		      if($sl==25){$stroll25=$stroll;}
		      if($sl==26){$stroll26=$stroll;}
		      if($sl==27){$stroll27=$stroll;}
		      if($sl==28){$stroll28=$stroll;}
		      if($sl==29){$stroll29=$stroll;}
		      if($sl==30){$stroll30=$stroll;}
		      if($sl==31){$stroll31=$stroll;}
		      if($sl==32){$stroll32=$stroll;}
		      if($sl==33){$stroll33=$stroll;}
		      if($sl==34){$stroll34=$stroll;}
		      if($sl==35){$stroll35=$stroll;}
		      if($sl==36){$stroll36=$stroll;}
		      if($sl==37){$stroll37=$stroll;}
		      if($sl==38){$stroll38=$stroll;}
		      if($sl==39){$stroll39=$stroll;}
		      if($sl==40){$stroll40=$stroll;}
		      if($sl==41){$stroll41=$stroll;}
		      if($sl==42){$stroll42=$stroll;}
		      if($sl==43){$stroll43=$stroll;}
		      if($sl==44){$stroll44=$stroll;}
		      if($sl==45){$stroll45=$stroll;}
		      if($sl==46){$stroll46=$stroll;}
		      if($sl==47){$stroll47=$stroll;}
		      if($sl==48){$stroll48=$stroll;}	
		      if($sl==49){$stroll49=$stroll;}
		      if($sl==50){$stroll50=$stroll;}
		      if($sl==51){$stroll51=$stroll;}
		      if($sl==52){$stroll52=$stroll;}
		      if($sl==53){$stroll53=$stroll;}
		      if($sl==54){$stroll54=$stroll;}
		      if($sl==55){$stroll55=$stroll;}
		      if($sl==56){$stroll56=$stroll;}
		      if($sl==57){$stroll57=$stroll;}
		      if($sl==58){$stroll58=$stroll;}
		      if($sl==59){$stroll59=$stroll;}
		      if($sl==60){$stroll60=$stroll;}
		      if($sl==61){$stroll61=$stroll;}
		      if($sl==62){$stroll62=$stroll;}
		      if($sl==63){$stroll63=$stroll;}
		      if($sl==64){$stroll64=$stroll;}	
		      if($sl==65){$stroll65=$stroll;}
		      if($sl==66){$stroll66=$stroll;}	
		      if($sl==67){$stroll67=$stroll;}
		      if($sl==68){$stroll68=$stroll;}
		      if($sl==69){$stroll69=$stroll;}
		      if($sl==70){$stroll70=$stroll;}
		      if($sl==71){$stroll71=$stroll;}
		      if($sl==72){$stroll72=$stroll;}
		      if($sl==73){$stroll73=$stroll;}
		      if($sl==74){$stroll74=$stroll;}
		      if($sl==75){$stroll75=$stroll;}
		      if($sl==76){$stroll76=$stroll;}
		      if($sl==77){$stroll77=$stroll;}
		      if($sl==78){$stroll78=$stroll;}
		      if($sl==79){$stroll79=$stroll;}
		      if($sl==80){$stroll80=$stroll;}	
		      if($sl==81){$stroll81=$stroll;}
		      if($sl==82){$stroll82=$stroll;}
		      if($sl==83){$stroll83=$stroll;}
		      if($sl==84){$stroll84=$stroll;}
		      if($sl==85){$stroll85=$stroll;}
		      if($sl==86){$stroll86=$stroll;}
		      if($sl==87){$stroll87=$stroll;}
		      if($sl==88){$stroll88=$stroll;}
		      if($sl==89){$stroll89=$stroll;}
		      if($sl==90){$stroll90=$stroll;}
		      if($sl==91){$stroll91=$stroll;}
		      if($sl==92){$stroll92=$stroll;}	
		      if($sl==93){$stroll93=$stroll;}
		      if($sl==94){$stroll94=$stroll;}
		      if($sl==95){$stroll95=$stroll;}
		      if($sl==96){$stroll96=$stroll;}	
		      if($sl==97){$stroll97=$stroll;}
		      if($sl==98){$stroll98=$stroll;}
		      if($sl==99){$stroll99=$stroll;}
		      if($sl==100){$stroll100=$stroll;}	
		      if($sl==101){$stroll101=$stroll;}
		      if($sl==102){$stroll102=$stroll;}	
		      if($sl==103){$stroll103=$stroll;}
		      if($sl==104){$stroll104=$stroll;}
		      if($sl==105){$stroll105=$stroll;}
		      if($sl==106){$stroll106=$stroll;}	
		      if($sl==107){$stroll107=$stroll;}
		      if($sl==108){$stroll108=$stroll;}
		      if($sl==109){$stroll109=$stroll;}
		      if($sl==110){$stroll110=$stroll;}	
		      if($sl==111){$stroll111=$stroll;}
		      if($sl==112){$stroll112=$stroll;}	
		      if($sl==113){$stroll113=$stroll;}
		      if($sl==114){$stroll114=$stroll;}
		      if($sl==115){$stroll115=$stroll;}
		      if($sl==116){$stroll116=$stroll;}	
		      if($sl==117){$stroll117=$stroll;}
		      if($sl==118){$stroll118=$stroll;}
		      if($sl==119){$stroll119=$stroll;}
		      if($sl==120){$stroll120=$stroll;}	
		      if($sl==121){$stroll121=$stroll;}
		      if($sl==122){$stroll122=$stroll;}	
		      if($sl==123){$stroll123=$stroll;}
		      if($sl==124){$stroll124=$stroll;}
		      if($sl==125){$stroll125=$stroll;}
		      if($sl==126){$stroll126=$stroll;}	
		      if($sl==127){$stroll127=$stroll;}
		      if($sl==128){$stroll128=$stroll;}
		      if($sl==129){$stroll129=$stroll;}
		      if($sl==130){$stroll130=$stroll;}	
		      if($sl==131){$stroll131=$stroll;}
		      if($sl==132){$stroll132=$stroll;}	
		      if($sl==133){$stroll133=$stroll;}
		      if($sl==134){$stroll134=$stroll;}
		      if($sl==135){$stroll135=$stroll;}
		      if($sl==136){$stroll136=$stroll;}	
		      if($sl==137){$stroll137=$stroll;}
		      if($sl==138){$stroll138=$stroll;}
		      if($sl==139){$stroll139=$stroll;}
		      if($sl==140){$stroll140=$stroll;}			      
}
    	$pdf->SetFont('Arial','',10);
		$pdf->Cell(13,7,$stroll1,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll34,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll2,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll35,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll3,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll36,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll4,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll37,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll5,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll38,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll6,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll39,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll7,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll40,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll8,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll41,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll9,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll42,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll10,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll43,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll11,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll44,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll12,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll45,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll13,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll46,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll14,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll47,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll15,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll48,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll16,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll49,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll17,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll50,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll18,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll51,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll19,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll52,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll20,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll53,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll21,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll54,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll22,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll55,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll23,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll56,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll24,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll57,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll25,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll58,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll26,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll59,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll27,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll60,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll28,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll61,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll29,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll62,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll30,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll63,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll31,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll64,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll32,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll65,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();	
		$pdf->Cell(13,7,$stroll33,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll66,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();	
        
        $pdf->Cell(13,7,$stroll67,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll100,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll68,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll101,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll69,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll102,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll70,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll103,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll71,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll104,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll72,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll105,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll73,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll106,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll74,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll107,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll75,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll108,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll76,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll109,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll77,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll110,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll78,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll111,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll79,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll112,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll80,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll113,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll81,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll114,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll82,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll115,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll83,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll116,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll84,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll117,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll85,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll118,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll86,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll119,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll87,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll120,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll88,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll121,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll89,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll122,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll90,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll123,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll91,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll124,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll92,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll125,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll93,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll126,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll94,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll127,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll95,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll128,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll96,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll129,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll97,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll130,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();
		$pdf->Cell(13,7,$stroll98,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll131,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();	
		$pdf->Cell(13,7,$stroll99,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(4,7,'',0,0,'C');
		$pdf->Cell(13,7,$stroll132,1,0,"C");
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Cell(20,7,'',1);
		$pdf->Ln();	

$pdf->Ln();
$pdf->Output();
?>