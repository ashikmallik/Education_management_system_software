<?php


$schId=1;
$branchId=$_POST['branchId'];
$studClass=$_POST['studClass'];
$fiscalid=$_POST['fiscalid'];
if(empty($_POST['monthid'])){
  $_POST['monthid'] = 0;  
}
$monthid=$_POST['monthid'];
// echo $fdate;
// echo $tdate;

include('report_sett_top.php');

$gtschoolName ="select * from borno_school where borno_school_id=$schId";
					$qgstschoolName=$mysqli->query($gtschoolName);
					$shschname=$qgstschoolName->fetch_assoc();
                    $fnschname=$shschname['borno_school_name'];
                    
$getStssn = "SELECT * FROM `fiscal_year` WHERE `fiscal_year_id` = '$fiscalid'";
                    $qgetStssn=$mysqli->query($getStssn);
					$shqgetStssn=$qgetStssn->fetch_assoc();
                    $stsession=trim($shqgetStssn['session']);

//echo $stsession ;

require('../../pannel/fpdf/fpdf.php');
class PDF extends FPDF
{
// Page header
function Header()
{

    $this->SetFont('Arial','B',20);
$this->Cell(200,5,$GLOBALS['fnschname'],0,0,"C");
$this->Ln();
$this->Cell(200,2,"",0,0,"C");
$this->Ln();
// $this->SetFont('Arial','B',10);
// $this->Cell(80,5,"From : ",0,0,"R");
// $this->SetFont('Arial','',10);
// $this->Cell(20,5,$GLOBALS['fdate'],0,0,"L");
// $this->SetFont('Arial','B',10);
// $this->Cell(10,5,"To : ",0,0,"L");
// $this->SetFont('Arial','',10);
// $this->Cell(90,5,$GLOBALS['tdate'],0,0,"L");
$this->Ln();
$this->Cell(200,2,"",0,0,"C");
$this->SetFont('Arial','B',10); 
$this->Ln();
$this->Cell(200,5,"Student Due",0,0,"C");
$this->Ln();
$this->Cell(200,5,"",0,0,"C");
$this->Ln();
$this->SetFont('Arial','',8); 
// $this->Cell(20,5,"Date",1,0,"C");
// $this->Cell(25,5,"Memo",1,0,"C");
$this->Cell(20,5,"Branch",1,0,"C");
$this->Cell(15,5,"Class",1,0,"C");
$this->Cell(15,5,"Shift",1,0,"C");
$this->Cell(20,5,"Section",1,0,"C");
$this->Cell(10,5,"Roll",1,0,"C");
$this->Cell(70,5,"Student Name",1,0,"L");
$this->Cell(20,5,"Amount",1,0,"C");
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
$pdf->AddPage();

// $fdate=date("d-m-y",strtotime($fdate));
// $tdate=date("d-m-y",strtotime($tdate));


  $gtreceipt ="select * from `borno_student_info` where `borno_school_class_id` = '$studClass'  AND `borno_school_branch_id`='$branchId' AND trim(`borno_school_session`) = '$stsession'";
  $qgstreceipt=$mysqli->query($gtreceipt);
//   $result ="SELECT * FROM `student_fees` WHERE `receive_date` between '$fdate' AND '$tdate'  group by `money_receipt_no` asc";
// 		$qresult=$mysqli->query($result);
		while($streceipt=$qgstreceipt->fetch_assoc()){

        $stcls=$streceipt['borno_school_class_id'];            
		$stsht=$streceipt['borno_school_shift_id'];
		$stsec=$streceipt['borno_school_section_id'];
		$stsess=$streceipt['borno_school_session'];
    	$stdid=$streceipt['borno_student_info_id'];
		$branch=$streceipt['borno_school_branch_id'];
		$stroll=$streceipt['borno_school_roll'];
	   $stdname=$streceipt['borno_school_student_name'];
	

                    

$gtClassName ="select * from borno_school_class where borno_school_class_id='$stcls'";
					$qgstClassName=$mysqli->query($gtClassName);
					$stClassName=$qgstClassName->fetch_assoc();
                    $fstClassName=$stClassName['borno_school_class_name'];



$gtshift ="select * from borno_school_shift where borno_school_shift_id=$stsht";
					$qgstshifte=$mysqli->query($gtshift);
					$stgtshift=$qgstshifte->fetch_assoc();
                    $fstshift=$stgtshift['borno_school_shift_name'];


$gtsection = "select * from borno_school_section where  borno_school_section_id='$stsec'";
					$qgstsection=$mysqli->query($gtsection);
					$stgtsection=$qgstsection->fetch_assoc();
                    $fstsection=$stgtsection['borno_school_section_name'];
                    
$gtbranch = "SELECT * FROM `borno_school_branch` WHERE `borno_school_branch_id`='$branch'";
					$qgtbranch=$mysqli->query($gtbranch);
					$stqgtbranch=$qgtbranch->fetch_assoc();
                    $fstbranch=$stqgtbranch['borno_school_branch_name'];                     


$totalamount=0;		
$total = array();	
if($monthid == 0){
 $result2 ="SELECT * FROM `student_fees` where `student_id` = '$stdid' AND `fiscal_year_id` ='$fiscalid'";
}
else{
    $result2 ="SELECT * FROM `student_fees` where `student_id` = '$stdid' AND `fiscal_year_id` ='$fiscalid' `fiscal_year_details_id` <= '$monthid' AND `due_amount` != 0
                     GROUP BY `student_id`";
}
					$qgstresult2=$mysqli->query($result2);
					while($row2=$qgstresult2->fetch_assoc()){
					  $total[]=$row2['receive_amount'];
                      $totalamount=array_sum($total);  
					    
					}

$alltotal[]=$totalamount;
$alltotalamount=array_sum($alltotal);
//$stdate=date("d-m-y",strtotime($stdate));
//$pdf->Cell(20,5,$stdate,1,0,"C");
//$pdf->Cell(25,5,$memo,1,0,"C");
$pdf->Cell(20,5,$fstbranch,1,0,"C");
$pdf->Cell(15,5,$fstClassName,1,0,"C");
$pdf->Cell(15,5,$fstshift,1,0,"C");
$pdf->Cell(20,5,$fstsection,1,0,"C");
$pdf->Cell(10,5,$stroll,1,0,"C");
$pdf->Cell(70,5,$stdname,1,0,"L");
$pdf->Cell(20,5,"$totalamount/-",1,0,"C");
$pdf->Ln();	
}
	
$pdf->Cell(145,5,"Total Amount :",0,0,"R");
$pdf->Cell(20,5,"$alltotalamount/-",0,0,"C");	

//$pdf->Output();
?>