<?php

include('others_top.php');

  $gtschoolName1 ="select * from borno_student_info  where borno_student_info_id=$stdid";
					$qgstschool=$mysqli->query($gtschoolName1);
					$shsch=$qgstschool->fetch_assoc();
					
                    $schId=$shsch['borno_school_id'];
                    $studClass=$shsch['borno_school_class_id'];
		            $shiftId=$shsch['borno_school_shift_id'];
	            	$section=$shsch['borno_school_section_id'];
	            	$stsess=$shsch['borno_school_session'];
	            	$roll=$shsch['borno_school_roll'];
	            	$name=$shsch['borno_school_student_name'];

 $gtschoolName ="select * from borno_school where borno_school_id=$schId";
					$qgstschoolName=$mysqli->query($gtschoolName);
					$shschname=$qgstschoolName->fetch_assoc();
                  $fnschname=$shschname['borno_school_name'];
                $fnaddress=$shschname['borno_school_address'];

	$gtschoolLogo=$shschname['borno_school_logo'];
	if($gtschoolLogo!=""){
	
	$finalSchoolLogo="../../../../pannel/academic/infosett/school-logo/$gtschoolLogo";
	
	} else {
		$finalSchoolLogo="../../../../pannel/academic/infosett/school-logo/nologo.png";
		}

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


$pageboder="../student/page_border.JPG";
require('../../fpdf/fpdf.php');
class PDF extends FPDF
{
// Page header
function Header()
{
    
  	$pageboder1=$GLOBALS['pageboder'];
  
    $this->Image($pageboder1,2,1,294,207);     
    
$finalSchoolLogo1=$GLOBALS['finalSchoolLogo'];

$this->Image($finalSchoolLogo1,15,5,20,20);	
$this->Ln();

    $this->Ln();
    $this->SetFont('Arial','B',20);
    $this->Cell(280,5,$GLOBALS['fnschname'],0,0,"C");
        $this->Ln();
         $this->Ln();
    $this->SetFont('Arial','B',14);
    $this->Cell(280,5,$GLOBALS['fnaddress'],0,0,"C");
      $this->Ln();
      $this->Ln();
    $this->SetFont('Arial','BU',14);
    $this->Cell(280,5,"Class Routine",0,0,"C");
    $this->Ln();
      $this->Ln();
       $this->SetFont('Arial','B',12);
    $this->Cell(50,5,"",0,0,"L");
$this->Cell(15,5,"Class :",1,0,"L");
 $this->Cell(30,5,$GLOBALS['fnsclass'],1,0,"L");
 $this->Cell(15,5,"Shift :",1,0,"L");
 $this->Cell(30,5,$GLOBALS['fnsshift'],1,0,"L");
  $this->Cell(20,5,"Section :",1,0,"L");
 $this->Cell(30,5,$GLOBALS['fnssection'],1,0,"L");
  $this->Cell(20,5,"Session :",1,0,"L");
 $this->Cell(20,5,$GLOBALS['stsess'],1,0,"L");

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
$pdf->AddPage('L');




$pdf->SetFont('Arial','',12);

		
		$pdf->Cell(30,7,"Day/Period",1,0,"C");
		$pdf->Cell(30,7,"First",1,0,"C");
		$pdf->Cell(30,7,"Second",1,0,"C");
		$pdf->Cell(30,7,"Third",1,0,"C");
		$pdf->Cell(30,7,"Fourth",1,0,"C");
		$pdf->Cell(30,7,"Fifth",1,0,"C");
		$pdf->Cell(30,7,"Sixth",1,0,"C");
		$pdf->Cell(30,7,"Seventh",1,0,"C");
		$pdf->Cell(30,7,"Eighth",1,0,"C");
		$pdf->Ln();
	   $sql ="select * from borno_school_class_routine where  borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' Group by borno_school_routine_day Asc";
					$qsql=$mysqli->query($sql);
					while($row=$qsql->fetch_assoc()){ 
				$dayId=$row['borno_school_routine_day'];
				if($dayId==1){$dayname='Saturday';}	
				elseif($dayId==2){$dayname='Sunday';}
				elseif($dayId==3){$dayname='Monday';}	
				elseif($dayId==4){$dayname='Tuesday';}	
				elseif($dayId==5){$dayname='Wednesday';}	
				elseif($dayId==6){$dayname='Thursday';}	
		        $pdf->Cell(30,7,"$dayname",1,0,"C");
		        
		       
     for($i=1;$i<9;$i++){
       $sql2 ="select * from borno_school_class_routine where  borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_school_routine_day='$dayId' AND borno_school_routine_period=$i";
					$qsql2=$mysqli->query($sql2);
					$rowsubject=$qsql2->fetch_assoc();
    $subId=$rowsubject['borno_school_subject_id'];

				
	if($studClass==1 OR $studClass==2){
	 $gsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id ='$subId'";
	$qgsubjName=$mysqli->query($gsubjName);
	$shgsubjName=$qgsubjName->fetch_assoc();				
	$subjectName=$shgsubjName['borno_subject_nine_ten_name'];	
	}
			
	elseif($studClass==3 OR $studClass==4 OR $studClass==5){
$gsubjName="select * from borno_set_subject_six_eight where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND subject_id_six_eight ='$subId'";
			$qgsubjName=$mysqli->query($gsubjName);		
			$shgsubjName=$qgsubjName->fetch_assoc();
			$subjectName=$shgsubjName['six_eight_subject_name'];
	}
	else{		
$gsubjName="select * from borno_result_subject where borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_school_id='$schId'";
			$qgsubjName=$mysqli->query($gsubjName);		
			$shgsubjName=$qgsubjName->fetch_assoc();
			$subjectName=$shgsubjName['borno_school_subject_name'];	
	}
	
	if ($subId==""){
	$pdf->Cell(30,7,"--",1,0,"C");
	}
	else
	 {
	     if  ($subjectName=="Bangladesh & Global Studies"){$pdf->Cell(30,7,"BGS",1,0,"C");}
	     elseif  ($subjectName=="Religion & Moral Education")$pdf->Cell(30,7,"Religion",1,0,"C");
	     else {$pdf->Cell(30,7,"$subjectName",1,0,"C");}
	         
	
	}
}
        $pdf->Ln();
	   
					}

	   
	  	
			
	
$pdf->Output();
?>