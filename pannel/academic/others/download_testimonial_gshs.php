<?php

		
		$schId=$_GET['schId'];
		$branchId = $_GET['branchId'];
		$studClass = $_GET['studClass'];
		$shiftId = $_GET['shiftId'];
		$section = $_GET['section'];
		$stsess = $_GET['stsess'];
		$exam = $_GET['exam'];

include('../../../connection.php');

$gtschoolName="SELECT * FROM borno_school where borno_school_id=$schId";
					$qgtschoolName=$mysqli->query($gtschoolName);
					$sqgtschoolName=$qgtschoolName->fetch_assoc();
                    $fnschname=$sqgtschoolName['borno_school_name'];
					$fnschead=$sqgtschoolName['borno_school_head'];
					

$gtsctest="SELECT * FROM borno_testimonial_settings where borno_school_id='$schId' AND borno_school_exam_type='$exam'";
					$qgtgtsctest=$mysqli->query($gtsctest);
					$sqgqgtgtsctest=$qgtgtsctest->fetch_assoc();
                    $fnsaddress=$sqgqgtgtsctest['borno_school_address'];
					$fnsexname=$sqgqgtgtsctest['borno_school_exam'];
					$fnsexname1="$fnsexname- $stsess";
					$fnschild=$sqgqgtgtsctest['borno_school_child_type'];
					$fnsstd1=$sqgqgtgtsctest['borno_school_std_type1'];
					$fnsstd2=$sqgqgtgtsctest['borno_school_std_type2'];
					$fnsstd3=$sqgqgtgtsctest['borno_school_std_type3'];
					$fnsstd4=$sqgqgtgtsctest['borno_school_std_type4'];
			

					
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
 	 //$this->Image("123.jpg",4 , 4, 290,200);
 	 $this->Image("dot image.jpg",84 , 92, 170,5);
     $this->Image("dot image.jpg",39 , 100, 110,5);
     $this->Image("dot image.jpg",163 , 100, 110,5);
     $this->Image("dot image2.jpg",63, 115, 20,5); 
     $this->Image("dot image2.jpg",253, 115, 20,5);
     $this->Image("dot image2.jpg",83, 123, 36,5);
     $this->Image("dot image2.jpg",178, 123, 40,5);  
     $this->Image("dot image2.jpg",238, 123, 30,5);
     $this->Image("dot image2.jpg",168, 131, 36,5);
     $this->Image("dot image1.jpg",43, 173, 40,5);
     $this->Image("dot image1.jpg",111, 173, 42,5);
     
	/*$this->Cell(280,2,'',0,5,"C");
	$this->Cell(280,5,$GLOBALS['fnschname'],0,0,"C");
    // Line break

    $this->Ln();
    $this->SetFont('Arial','',12);
	$this->Cell(280,2,'',0,5,"C");
    $this->Cell(280,5,$GLOBALS['fnsaddress'],0,0,"C");
    $this->Ln();
    $this->SetFont('Arial','B',18);
	$this->Cell(280,3,'',0,5,"C");
	$this->Cell(280,5,"Testimonial",0,0,"C");
	$this->Ln();
	$this->SetFont('Arial','I',14);
	$this->Cell(20,5,'',0,0,"L");
	$this->Cell(260,5,"Serial No :",0,0,"L");
	$this->Ln();*/
	
	$this->SetFont('Arial','B',16);
    $this->Cell(285,55,'',0,5,"C");
    $this->Cell(290,5,$GLOBALS['fnsexname1'],0,0,"C");
	$this->Ln();	
	$this->Ln();
	$this->Ln();
	$this->Ln();
	$this->Ln();
}
/*
// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
	$this->SetFont('Arial','',15);
 //   $this->Cell(280,5,$GLOBALS['fnschead'],0,5,"R");
	$this->SetFont('Arial','',12);
//	$this->Cell(280,5,$GLOBALS['fnschname'],0,0,"R");
	$this->SetFont('Arial','I',8);
    // Page number
	  // $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}*/
}

$pdf = new PDF();
//$pdf->AddFont('Mtcor','','MTCORSVA.php');
$pdf->AliasNbPages();
$pdf->AddPage('L');


				$data="select * from borno_school_testimonial where borno_school_id='$schId'  AND borno_school_exam='$exam' AND borno_school_passing_year='$stsess' AND borno_school_class_id= '$studClass' AND borno_school_shift_id= '$shiftId' AND borno_school_section_id= '$section' order by borno_school_roll asc";

					$qdata=$mysqli->query($data);
					while($showdata=$qdata->fetch_assoc()){ 
					$stdntid=$showdata['borno_student_info_id'];
					$board=$showdata['borno_school_board'];
					$session=$showdata['borno_school_exam_session'];
					$roll=$showdata['borno_school_board_roll'];
					$reg=$showdata['borno_school_reg'];
					$gpa=$showdata['borno_school_gpa'];
					$date=$showdata['borno_school_date'];
					$group=$showdata['borno_school_group'];
					
				if($group==1){ $dep="Science";}
elseif($group==2){$dep="Business Studies";}
elseif($group==3){$dep="Humanities";}	

elseif($group==0){$dep="";}	
					
$datainfo="select * from borno_student_info where borno_student_info_id='$stdntid'  ";

					$qdatainfo=$mysqli->query($datainfo);
					$showdatainfo=$qdatainfo->fetch_assoc();
					
					$stname=$showdatainfo['borno_school_student_name'];
		            $father=$showdatainfo['borno_school_father_name'];	
		            $mother=$showdatainfo['borno_school_mother_name'];
					$dob=$showdatainfo['borno_school_dob'];					
					
					
					$pdf->SetFont('Arial','',14);
					$pdf->Cell(28,5,'',0,0,"L");
					$pdf->Cell(50,5,"This is to certify that ",0,0,"L");
					$pdf->SetFont('Arial','B',14);
					$pdf->Cell(145,5,$stname,0,0,"L");
					$pdf->SetFont('Arial','',13);
					$pdf->Cell(38,5,"$fnschild of",0,0,"R");
					$pdf->Ln();
					
					$pdf->Cell(28);
					$pdf->SetFont('Arial','B',14);
					$pdf->Cell(111,10,$father,0,0,"L");
					$pdf->SetFont('Arial','',13);
					$pdf->Cell(13,10,"and ",0,0,"L");
					$pdf->SetFont('Arial','B',14);
					$pdf->Cell(100,10,$mother,0,0,"L");	
					$pdf->Ln();

					$pdf->Cell(28,5,'',0,0,"L");
					$pdf->SetFont('Arial','',13);
					$pdf->Cell(140,5,"passed  the Secondary School Certificate Examination of the Board of Intermediate and  Secondary  Education, Dhaka",0,0,"L");	
					$pdf->Ln();

					$pdf->Cell(28,10,'',0,0,"L");
					$pdf->SetFont('Arial','',14);
					$pdf->Cell(25,10,"in the year ",0,0,"L");
					$pdf->SetFont('Arial','B',15);	
					$pdf->Cell(22,10,$stsess,0,0,"C");
					$pdf->SetFont('Arial','',14);
					$pdf->Cell(5,10,'in',0,0,"C");
					$pdf->SetFont('Arial','',14);
					$pdf->Cell(165,10,"$dep group from this school and secured Grade Point Average (G.P.A) ",0,0,"L");
					$pdf->SetFont('Arial','B',15);
					$pdf->Cell(40,10,$gpa,0,0,"L");
					$pdf->Ln();

					$pdf->Cell(28,5,'',0,0,"L");
					$pdf->SetFont('Arial','',14);
					$pdf->Cell(45,5,"$fnsstd3 Roll Number is ",0,0,"L");
					$pdf->SetFont('Arial','B',16);
					$pdf->Cell(40,5,$roll,0,0,"C");
					$pdf->SetFont('Arial','',14);
					$pdf->Cell(55,5,"And Registration No. is ",0,0,"L");
					$pdf->SetFont('Arial','B',16);
					$pdf->Cell(40,5,$reg,0,0,"C");
					$pdf->SetFont('Arial','',14);
					$pdf->Cell(22,5,"Session ",0,0,"L");
					$pdf->SetFont('Arial','B',16);
					$pdf->Cell(20,5,"$session",0,0,"L");
					$pdf->Ln();

					$pdf->Cell(28,10,'',0,0,"L");
					$pdf->SetFont('Arial','',14);
					$pdf->Cell(130,10,"According to the Admission Register $fnsstd4 date of birth is ",0,0,"L");			
					$pdf->SetFont('Arial','B',16);
					$pdf->Cell(30,10,"$dob",0,0,"L");
					$pdf->Ln();

					$pdf->Cell(28,10,'',0,0,"L");
					$pdf->SetFont('Arial','',14);
					$pdf->Cell(38,10,"So far as I know $fnsstd2 did not take part in any activity subversive of the state or of discipline during $fnsstd4 study",0,0,"L");
					$pdf->Ln();
					
					$pdf->Cell(28,5,'',0,0,"L");
					$pdf->Cell(200,5,"period in the school. $fnsstd1 bears a good moral character.",0,0,"L");
					$pdf->Ln();
					
					$pdf->Cell(28,13,'',0,0,"L");
					$pdf->Cell(200,13,"I wish him every success in life.",0,0,"L");	
					$pdf->Ln();

					$pdf->SetFont('Arial','B',16);
					$pdf->Cell(143,7,'',0,0,"C");
					$pdf->Cell(140,7,"Headmaster",0,0,"C");
					$pdf->Ln();
					
				/*	$pdf->SetFont('Arial','B',16);
					$pdf->Cell(45,5,'',0,0,"C");
					$pdf->Cell(20,9,"Writer",0,0,"C");	
					$pdf->Cell(50,5,'',0,0,"C");
					$pdf->Cell(25,9,"Scrutineer",0,0,"C");	
					$pdf->SetFont('Arial','',14);
					$pdf->Cell(60,5,'',0,0,"C");
					$pdf->Cell(25,9,$fnschname,0,0,"C");	
					$pdf->Ln();
					
					$pdf->SetFont('Arial','',14);
					$pdf->Cell(143,5,'',0,0,"C");
					$pdf->Cell(130,5,"Dhaka-1215",0,0,"C");	
					$pdf->Ln();*/
					
					$pdf->SetFont('Arial','',16);
					$pdf->Cell(200,5,'',0,0,"C");
					$pdf->Cell(25,9,$fnschname,0,0,"C");	
					$pdf->Ln();
					
					$pdf->SetFont('Arial','B',14);
					$pdf->Cell(45,5,'',0,0,"C");
					$pdf->Cell(20,0,"Writer",0,0,"C");	
					$pdf->Cell(46,5,'',0,0,"C");
					$pdf->Cell(25,0,"Scrutineer",0,0,"C");	
					$pdf->SetFont('Arial','',14);
					$pdf->Cell(63,5,'',0,0,"C");
					$pdf->Cell(40,5,"Dhaka-1215",0,0,"C");	
					$pdf->Ln();

					$pdf->Cell(28,5,'',0,0,"C");
					$pdf->Cell(120,5,"Dated of publication of Result: $date",0,0,"L");	
					$pdf->Ln();
					}


$pdf->Output();
?>