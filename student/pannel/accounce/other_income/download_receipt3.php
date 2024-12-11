<?php
include('other_sett_top.php');
 $result ="select * from borno_student_info where borno_student_info_id='$stdid'";
		$qresult=$mysqli->query($result);
		$shgresult=$qresult->fetch_assoc();

		$stbr=$shgresult['borno_school_branch_id'];
		$stcls=$shgresult['borno_school_class_id'];
		$oldsection=$shgresult['borno_school_section_id'];
		$stsess=$shgresult['borno_school_session'];
		$name=$shgresult['borno_school_student_name'];
		$fname=$shgresult['borno_school_father_name'];
		$mname=$shgresult['borno_school_mother_name'];
		$fno=substr($shgresult['borno_school_phone'],2,11);
		$roll=$shgresult['borno_school_roll'];		
		$schId=$shgresult['borno_school_id'];
		
		 $stdsession= date("Y"); 
		
		
				$gtschoolName="SELECT * FROM borno_school where borno_school_id=$schId";
		
					$qgtschoolName=$mysqli->query($gtschoolName);
					$sqgtschoolName=$qgtschoolName->fetch_assoc();				
				
 $fnschname=$sqgtschoolName['borno_school_name'];
		

$gtsection = "select * from borno_school_branch where  borno_school_branch_id='$stbr'";
					$qgstsection=$mysqli->query($gtsection);
					$stgtsection=$qgstsection->fetch_assoc();
                    $fstsection=$stgtsection['borno_school_branch_name'];
                    
	    
$gsectionName13 ="select * from borno_school_class where borno_school_class_id='$stcls'";
					$qgsectionName13=$mysqli->query($gsectionName13);
					$shsectionname13=$qgsectionName13->fetch_assoc();
					$classname1=$shsectionname13['borno_school_class_name'];                    

 $gsectionName12 ="select * from borno_school_section where borno_school_section_id='$oldsection'";
					$qgsectionName12=$mysqli->query($gsectionName12);
					$shsectionname12=$qgsectionName12->fetch_assoc();
					$sectionname2=$shsectionname12['borno_school_section_name'];
				
					
//$finalSchoolLogo="../expence/frii.jpg";

require('../../fpdf/fpdf.php');
class PDF extends FPDF
{
// Page header
function Header()
{
$this->SetFont('Arial','',20);
//$this->Cell(220,2,$fnschname,0,0,"C");
$this->Cell(200,5,$GLOBALS['fnschname'],0,0,"C");

$this->SetFont('Arial','U',16);
$this->Cell(100,5,"",0,0,"L");
$this->Ln();
$this->Cell(100,5,"",0,0,"L");
$this->Ln();
$this->Cell(100,5,"",0,0,"L");
$this->Ln();
$this->Cell(190,5,"Due Report",0,0,"C");
$this->Ln();
$this->Cell(100,2,"",0,0,"L");
$this->Ln();
$this->SetFont('Arial','B',11);
$this->Cell(30,5,"",0,0,"L");
$this->Cell(30,5,"Student Name ",0,0,"L");
$this->Cell(5,5,":",0,0,"C");
$this->Cell(100,5,$GLOBALS['name'],0,0,"L");
$this->Ln();
$this->Cell(30,5,"",0,0,"L");
$this->Cell(30,5,"Father Name ",0,0,"L");
$this->Cell(5,5,":",0,0,"C");
$this->Cell(100,5,$GLOBALS['fname'],0,0,"L");
$this->Ln();
$this->Cell(30,5,"",0,0,"L");
$this->Cell(30,5,"Mother Name ",0,0,"L");
$this->Cell(5,5,":",0,0,"C");
$this->Cell(100,5,$GLOBALS['mname'],0,0,"L");
$this->Ln();
$this->Cell(30,5,"",0,0,"L");
$this->Cell(30,5,"Contact No ",0,0,"L");
$this->Cell(5,5,":",0,0,"C");
$this->Cell(30,5,$GLOBALS['fno'],0,0,"L");

$this->Ln();
$this->Cell(30,5,"",0,0,"L");
$this->Cell(30,5,"Class",0,0,"L");
$this->Cell(5,5,":",0,0,"C");
$this->Cell(30,5,$GLOBALS['classname1'],0,0,"L");
$this->Cell(30,5,"Section",0,0,"L");
$this->Cell(5,5,":",0,0,"C");
$this->Cell(15,5,$GLOBALS['sectionname2'],0,0,"L");
$this->Cell(20,5,"Roll No",0,0,"L");
$this->Cell(5,5,":",0,0,"C");
$this->Cell(15,5,$GLOBALS['roll'],0,0,"L");
$this->Ln();
$this->Cell(100,5,"",0,0,"L");
$this->Ln();
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

$pdf->SetFont('Arial','B',10);					
$pdf->Cell(145,5,"Fund Name",1,0,"L");
$pdf->Cell(45,5,"Amount",1,0,"R");

$pdf->Ln();

$gmemo1 ="select * from borno_school_balance where borno_student_info_id='$stdid' and borno_school_session='$stdsession'  order by borno_school_fund_id,borno_school_sub_fund_id asc";
					$qgmemo1=$mysqli->query($gmemo1);
					while($shsmemo1=$qgmemo1->fetch_assoc()){
                    $fundid=$shsmemo1['borno_school_fund_id'];
                    $subfundid=$shsmemo1['borno_school_sub_fund_id'];
                    $fees=$shsmemo1['borno_school_fee'];
                    if($fees=="0"){$fees="Paid";}
                    else{$fees="$fees/-";}
 $gfundname ="select * from borno_school_fund where borno_school_fund_id='$fundid'";
					$qgfundname=$mysqli->query($gfundname);
					$shsfundname=$qgfundname->fetch_assoc();
					$fundname=$shsfundname['borno_school_fund_name'];

if($subfundid!="0")
{
 $gsubfundname ="select * from borno_school_sub_fund where borno_school_sub_fund_id='$subfundid'";
					$qgsubfundname=$mysqli->query($gsubfundname);
					$shssubfundname=$qgsubfundname->fetch_assoc();
					$subfundname=$shssubfundname['sub_fund_name'];				}
$pdf->SetFont('Arial','',10);
$pdf->Cell(145,5,"$fundname $subfundname",1,0,"L");					
$pdf->Cell(45,5,"$fees",1,0,"R");
$pdf->Ln();
					}
$totalamount=0;		
$total = array();		
 $result2 ="select * from borno_school_balance where borno_student_info_id='$stdid' and borno_school_session='$stdsession' order by borno_school_fund_id,borno_school_sub_fund_id asc";
					$qgstresult2=$mysqli->query($result2);
					while($row2=$qgstresult2->fetch_assoc()){
					  $total[]=$row2['borno_school_fee'];
                      $totalamount=array_sum($total);  
					    
					}
$pdf->Cell(145,5,"Total Due Amount",1,0,"L");
if($totalamount==0)
{
$pdf->Cell(45,5,"Paid",1,0,"R");    
}
else
{
$pdf->Cell(45,5,"$totalamount/-",1,0,"R");					
}			





$pdf->Output();
?>