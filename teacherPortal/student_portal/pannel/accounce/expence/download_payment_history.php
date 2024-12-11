<?php

include('expence_sett_top.php');
$stdsession= trim($_POST['stsess']);
 $result ="select * from borno_student_info where borno_student_info_id='$stdid'";
 
		$qresult=$mysqli->query($result);
		$shgresult=$qresult->fetch_assoc();

		$name=$shgresult['borno_school_student_name'];
		$fname=$shgresult['borno_school_father_name'];
		$mname=$shgresult['borno_school_mother_name'];
		$fno=substr($shgresult['borno_school_phone'],2,11);
		$schId=$shgresult['borno_school_id'];
		$photo=$shgresult['borno_school_photo'];	
			if($shgresult['borno_school_photo']!=""){
	
	$stphotofina="../../../../pannel/academic/student/studentphoto/$photo";
	
	} else {
	
	$stphotofina="../../../../pannel/academic/student/studentphoto/nophoto.jpg";
	
	}
		
		
		

				$gtschoolName="SELECT * FROM borno_school where borno_school_id=$schId";
		
					$qgtschoolName=$mysqli->query($gtschoolName);
					$sqgtschoolName=$qgtschoolName->fetch_assoc();				
				
 $fnschname=$sqgtschoolName['borno_school_name'];
 $fnaddress=$sqgtschoolName['borno_school_address'];

	$gtschoolLogo=$sqgtschoolName['borno_school_logo'];
	if($gtschoolLogo!=""){
	
	$finalSchoolLogo="../../../../pannel/academic/infosett/school-logo/$gtschoolLogo";
	
	} else {
		$finalSchoolLogo="../../../../pannel/academic/infosett/school-logo/nologo.png";
		}

 $sql ="select * from borno_school_receipt where borno_student_info_id='$stdid' and borno_school_session='$stdsession' group by borno_school_class_id,borno_school_section_id,borno_school_shift_id ";

					$qsql=$mysqli->query($sql);
					$shqsql=$qsql->fetch_assoc();
        $stcls=$shqsql['borno_school_class_id'];
		$oldsection=$shqsql['borno_school_section_id'];
		$stshift=$shqsql['borno_school_shift_id']; 
	   	$roll=$shqsql['borno_school_roll'];
	   	 
	   	 if ($stshift==2){$shiftname='Morning';}
	   	 else{$shiftname='Day';}
	   	
$gsectionName13 ="select * from borno_school_class where borno_school_class_id='$stcls'";
					$qgsectionName13=$mysqli->query($gsectionName13);
					$shsectionname13=$qgsectionName13->fetch_assoc();
					$classname1=$shsectionname13['borno_school_class_name'];                    

 $gsectionName12 ="select * from borno_school_section where borno_school_section_id='$oldsection'";
					$qgsectionName12=$mysqli->query($gsectionName12);
					$shsectionname12=$qgsectionName12->fetch_assoc();
					$sectionname2=$shsectionname12['borno_school_section_name'];
				
					
$pageboder="../../academic/student/page_border.JPG";

require('../../fpdf/fpdf.php');
class PDF extends FPDF
{
// Page header
function Header()
{
 	$pageboder1=$GLOBALS['pageboder'];
  
    $this->Image($pageboder1,3,1,205,297);      
    
$finalSchoolLogo1=$GLOBALS['finalSchoolLogo'];

$this->Image($finalSchoolLogo1,15,5,20,20);	
$this->Ln();	
$this->SetFont('Arial','B',18);
$this->Cell(200,5,$GLOBALS['fnschname'],0,0,"C");
        $this->Ln();
         $this->Ln();
    $this->SetFont('Arial','B',14);
    $this->Cell(190,5,$GLOBALS['fnaddress'],0,0,"C");
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-25);
    // Arial italic 8

    $this->SetFont('Arial','B',8);

    // Page number
   $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

  $pdf->Image("$stphotofina", 145, 20, 30, 30);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','U',16);
$pdf->Cell(190,5,"Payment History",0,0,"C");
$pdf->Ln();
$pdf->Cell(100,2,"",0,0,"L");
$pdf->Ln();
$pdf->SetFont('Arial','B',11);
$pdf->Cell(30,5,"",0,0,"L");
$pdf->Cell(30,5,"Student Name ",0,0,"L");
$pdf->Cell(5,5,":",0,0,"C");
$pdf->Cell(100,5,$GLOBALS['name'],0,0,"L");
$pdf->Ln();
$pdf->Cell(30,5,"",0,0,"L");
$pdf->Cell(30,5,"Father Name ",0,0,"L");
$pdf->Cell(5,5,":",0,0,"C");
$pdf->Cell(100,5,$GLOBALS['fname'],0,0,"L");
$pdf->Ln();
$pdf->Cell(30,5,"",0,0,"L");
$pdf->Cell(30,5,"Mother Name ",0,0,"L");
$pdf->Cell(5,5,":",0,0,"C");
$pdf->Cell(100,5,$GLOBALS['mname'],0,0,"L");
$pdf->Ln();
$pdf->Cell(30,5,"",0,0,"L");
$pdf->Cell(30,5,"Contact No ",0,0,"L");
$pdf->Cell(5,5,":",0,0,"C");
$pdf->Cell(30,5,$GLOBALS['fno'],0,0,"L");

$pdf->Ln();
$pdf->Cell(10,5,"",0,0,"L");
$pdf->Cell(20,5,"Class",0,0,"L");
$pdf->Cell(5,5,":",0,0,"C");
$pdf->Cell(20,5,$GLOBALS['classname1'],0,0,"L");
$pdf->Cell(15,5,"Shift",0,0,"L");
$pdf->Cell(5,5,":",0,0,"C");
$pdf->Cell(25,5,$GLOBALS['shiftname'],0,0,"L");
$pdf->Cell(20,5,"Section",0,0,"L");
$pdf->Cell(5,5,":",0,0,"C");
$pdf->Cell(25,5,$GLOBALS['sectionname2'],0,0,"L");
$pdf->Cell(20,5,"Roll No",0,0,"L");
$pdf->Cell(5,5,":",0,0,"C");
$pdf->Cell(15,5,$GLOBALS['roll'],0,0,"L");
$pdf->Ln();
$pdf->Cell(80,5,"",0,0,"L");
$pdf->Ln();



 $gmemo ="select * from borno_school_receipt where borno_student_info_id='$stdid' and borno_school_session='$stdsession'  group by borno_school_memo asc";

					$qgmemo=$mysqli->query($gmemo);
					while($shsmemo=$qgmemo->fetch_assoc()){
					$memo=$shsmemo['borno_school_memo'];  
					$date=$shsmemo['borno_school_date']; 
					$date=date("d-M-Y",strtotime($date));
$pdf->SetFont('Arial','B',10);					
$pdf->Cell(50,5,"Payment Date",1,0,"L");
$pdf->Cell(45,5,$date,1,0,"L");
$pdf->Cell(50,5,"Memo No",1,0,"L");
$pdf->Cell(45,5,$memo,1,0,"L");
$pdf->Ln();
$pdf->Cell(190,5,"Payment Details",1,0,"C");
$pdf->Ln();
$gmemo1 ="select * from borno_school_receipt where borno_school_memo='$memo' order by borno_school_fund_id,borno_school_sub_fund_id asc";
					$qgmemo1=$mysqli->query($gmemo1);
					while($shsmemo1=$qgmemo1->fetch_assoc()){
                    $fundid=$shsmemo1['borno_school_fund_id'];
                    $subfundid=$shsmemo1['borno_school_sub_fund_id'];
                    $fees=$shsmemo1['borno_school_fee'];
 $gfundname ="select * from borno_school_fund where borno_school_fund_id='$fundid'";
					$qgfundname=$mysqli->query($gfundname);
					$shsfundname=$qgfundname->fetch_assoc();
					$fundname=$shsfundname['borno_school_fund_name'];

if($subfundid=="0")
{
  $subfundname='';
}
else{
 $gsubfundname ="select * from borno_school_sub_fund where  borno_school_sub_fund_id='$subfundid'";
					$qgsubfundname=$mysqli->query($gsubfundname);
					$shssubfundname=$qgsubfundname->fetch_assoc();
					$subfundname=$shssubfundname['sub_fund_name'];				}
$pdf->SetFont('Arial','',10);
$pdf->Cell(145,5,"$fundname $subfundname",1,0,"L");					
$pdf->Cell(45,5,"$fees/-",1,0,"R");
$pdf->Ln();
					}
$totalamount=0;		
$total = array();		
 $result2 ="select * from borno_school_receipt where borno_school_memo='$memo' order by borno_school_fund_id,borno_school_sub_fund_id asc";
					$qgstresult2=$mysqli->query($result2);
					while($row2=$qgstresult2->fetch_assoc()){
					  $total[]=$row2['borno_school_fee'];
                      $totalamount=array_sum($total);  
					    
					}
$pdf->SetFont('Arial','B',10);					
$pdf->Cell(145,5,"Total Amount",1,0,"L");					
$pdf->Cell(45,5,"$totalamount/-",1,0,"R");
$pdf->Ln();
					}






$pdf->Output();
?>