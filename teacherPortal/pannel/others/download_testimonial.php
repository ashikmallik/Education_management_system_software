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
					$fnsexname1="$fnsexname-$stsess";
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
 	 $this->Image("123.jpg",4 , 4, 290,200);
 	 $this->Image("dot image.jpg",66 , 65, 170,5);
     $this->Image("dot image.jpg",28 , 75, 102,5); 
     $this->Image("dot image.jpg",150 , 75, 120,5);
     $this->Image("dot image1.jpg",21, 95, 23,5); 
    $this->Image("dot image2.jpg",69, 95, 15,5);
     //$this->Image("dot image1.jpg",90, 95, 50,5);
      $this->Image("dot image1.jpg",107, 105, 36,5);
 $this->Image("dot image1.jpg",197, 105, 40,5);  
     $this->Image("dot image2.jpg",255, 105, 15,5);
       $this->Image("dot image1.jpg",150, 115, 36,5);
      
     
	$this->Cell(280,2,'',0,5,"C");
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
	$this->Ln();
	$this->SetFont('Arial','',16);
	$this->Cell(280,5,$GLOBALS['fnsexname1'],0,0,"C");
	$this->Ln();	
	$this->Ln();
	$this->Ln();
	$this->Ln();
	$this->Ln();
}

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
}
}

$pdf = new PDF();
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
					$pdf->Cell(10,5,'',0,0,"L");
					$pdf->Cell(50,5,"This is to certify that ",0,0,"L");
					$pdf->SetFont('Arial','B',16);
					$pdf->Cell(163,5,$stname,0,0,"L");
					$pdf->SetFont('Arial','',14);
					$pdf->Cell(38,5,"$fnschild of",0,0,"R");
		
					$pdf->Ln();
					$pdf->Ln();
					$pdf->Cell(10,5,'',0,0,"L");
					$pdf->Cell(10,5,"Mr.",0,0,"L");
					$pdf->SetFont('Arial','B',16);
					$pdf->Cell(100,5,$father,0,0,"L");
					$pdf->SetFont('Arial','',14);
					$pdf->Cell(20,5,"and Mrs. ",0,0,"L");
					$pdf->SetFont('Arial','B',16);
					$pdf->Cell(100,5,$mother,0,0,"L");	
					$pdf->Ln();
					$pdf->Ln();
					$pdf->Cell(10,5,'',0,0,"L");
					$pdf->SetFont('Arial','',14);
					if ($studClass==1){
					$pdf->Cell(110,5,"passed  the  $fnsexname  ",0,0,"L");
					}
										
					else
					{
						$pdf->Cell(85,5,"passed  the  $fnsexname  ",0,0,"L");
							}
					$pdf->Cell(140,5,"of the Board of Intermediate and  Secondary  Education,",0,0,"L");	
					
					$pdf->Ln();
					$pdf->Ln();
					$pdf->Cell(10,5,'',0,0,"L");
					$pdf->SetFont('Arial','B',16);
					$pdf->Cell(25,5,$board,0,0,"L");
					$pdf->SetFont('Arial','',14);
					$pdf->Cell(25,5,"in the year ",0,0,"L");
					$pdf->SetFont('Arial','B',16);	
					$pdf->Cell(15,5,$stsess,0,0,"C");
					$pdf->SetFont('Arial','',14);
					if ($studClass==1){
					 
					$pdf->Cell(5,5,'in',0,0,"C");
					$pdf->SetFont('Arial','B',16);
					$pdf->Cell(50,5,$dep,0,0,"L");
					$pdf->SetFont('Arial','',14);
					$pdf->Cell(150,5," group from this institute and secured Grade Point Average ",0,0,"L");
						}
						else{
							
					$pdf->SetFont('Arial','',14);
					$pdf->Cell(150,5,"from this institute and secured Grade Point Average ",0,0,"L");	
							}
						
					$pdf->Ln();
					$pdf->Ln();
					$pdf->Cell(10,5,'',0,0,"L");
					$pdf->SetFont('Arial','B',16);
					$pdf->Cell(35,5,"(G.P.A) $gpa . ",0,0,"L");
					$pdf->SetFont('Arial','',14);
					$pdf->Cell(17,5,"$fnsstd3",0,0,"L");
					$pdf->Cell(35,5," Roll Number is ",0,0,"L");
					$pdf->SetFont('Arial','B',16);
					$pdf->Cell(37,5,$roll,0,0,"C");
					$pdf->SetFont('Arial','',14);
					$pdf->Cell(55,5,"And Registration No. is ",0,0,"L");
					$pdf->SetFont('Arial','B',16);
					$pdf->Cell(37,5,$reg,0,0,"C");
					$pdf->SetFont('Arial','',14);
					$pdf->Cell(20,5,"Session ",0,0,"L");
					$pdf->SetFont('Arial','B',16);
					$pdf->Cell(20,5,"$session.",0,0,"L");
					$pdf->Ln();
					$pdf->Ln();
					$pdf->Cell(10,5,'',0,0,"L");
					$pdf->SetFont('Arial','',14);
					$pdf->Cell(135,5,"According to the Admission Register $fnsstd4 date of birth is ",0,0,"L");			$pdf->SetFont('Arial','B',16);
					$pdf->Cell(30,5,"$dob.",0,0,"L");
					$pdf->Ln();
					$pdf->Ln();
					$pdf->Ln();
					$pdf->Cell(10,5,'',0,0,"L");
					$pdf->SetFont('Arial','',14);
					$pdf->Cell(38,5,"So far as I know ",0,0,"L");
					$pdf->Cell(15,5,"$fnsstd2",0,0,"L");
					$pdf->Cell(182,5," did not take part in any activity subversive of the state or of discipline during $fnsstd4",0,0,"L");
					$pdf->Cell(10,5," study",0,0,"L");
					$pdf->Ln();
					$pdf->Ln();
					$pdf->Cell(10,5,'',0,0,"L");
					$pdf->Cell(200,5,"period in the institute. $fnsstd1 bears a good moral character.",0,0,"L");
					$pdf->Ln();
					$pdf->Ln();
					$pdf->Cell(10,5,'',0,0,"L");
					$pdf->Cell(200,5,"I wish $fnsstd4 every success in life.",0,0,"L");	
					$pdf->Ln();
					$pdf->Ln();
					$pdf->Ln();
					$pdf->Cell(20,5,'',0,0,"C");
					$pdf->Cell(120,5,"Dated : $date",0,0,"L");	
					$pdf->SetFont('Arial','B',16);
					$pdf->Cell(135,8,$fnschead,0,0,"C");
					$pdf->Ln();
					$pdf->SetFont('Arial','',14);
					$pdf->Cell(140,5,'',0,0,"C");
					$pdf->Cell(135,5,$fnschname,0,0,"C");	
					$pdf->Ln();
					$pdf->Ln();	
					$pdf->Ln();
					}


$pdf->Output();
?>