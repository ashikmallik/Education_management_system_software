<?php

$fdate=$_POST['datepicker'];
$tdate=$_POST['datepicker1'];
$schId=1;

$fdate=date("d/m/Y",strtotime($fdate));
$tdate=date("d/m/Y",strtotime($tdate));

// echo $fdate;
 //echo $fdate;
// echo $tdate;

include('report_sett_top.php');

$gtschoolName ="select * from borno_school where borno_school_id=$schId";
					$qgstschoolName=$mysqli->query($gtschoolName);
					$shschname=$qgstschoolName->fetch_assoc();
                    $fnschname=$shschname['borno_school_name'];



require('../../fpdf/fpdf.php');
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
$this->SetFont('Arial','B',10);
$this->Cell(80,5,"From : ",0,0,"R");
$this->SetFont('Arial','',10);
$this->Cell(20,5,$GLOBALS['fdate'],0,0,"L");
$this->SetFont('Arial','B',10);
$this->Cell(10,5,"To : ",0,0,"L");
$this->SetFont('Arial','',10);
$this->Cell(90,5,$GLOBALS['tdate'],0,0,"L");
$this->Ln();
$this->Cell(200,2,"",0,0,"C");
$this->SetFont('Arial','B',10); 
$this->Ln();
$this->Cell(200,5,"Student Collection",0,0,"C");
$this->Ln();
$this->Cell(200,5,"",0,0,"C");
$this->Ln();
$this->SetFont('Arial','',8); 
$this->Cell(15,5,"Date",1,0,"C");

$this->Cell(15,5,"Branch",1,0,"C");
$this->Cell(15,5,"Class",1,0,"C");
$this->Cell(15,5,"Shift",1,0,"C");
$this->Cell(20,5,"Section",1,0,"C");
$this->Cell(25,5,"Student ID",1,0,"C");
$this->Cell(10,5,"Roll",1,0,"C");
$this->Cell(60,5,"Student Name",1,0,"L");
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



$stuinfo = "SELECT * FROM `collection_details` as sf
            WHERE STR_TO_DATE(`receive_date`, '%d/%m/%Y') BETWEEN STR_TO_DATE('$fdate', '%d/%m/%Y') AND STR_TO_DATE('$tdate', '%d/%m/%Y') group by `money_receipt_no` ORDER BY STR_TO_DATE(`receive_date`, '%d/%m/%Y') ASC";
     $qstuinfo=$mysqli->query($stuinfo);
		while($shgresult=$qstuinfo->fetch_assoc()){

		
		$student_id=$shgresult['student_id'];
		$memo = $shgresult['money_receipt_no'];
		$stdate=$shgresult['receive_date'];
		
//	echo $student_id." ";
		
$gtreceipt ="select * from borno_student_info where `borno_student_info_id`='$student_id'";
					$qgstreceipt=$mysqli->query($gtreceipt);
					$streceipt=$qgstreceipt->fetch_assoc();
                    
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

    if($stsess == '2022' OR $stsess == '2023'OR $stsess == '2021'){
        if($stsess == '2021'){
        $stsess = "2022";
        }
$gtsection = "select * from borno_school_section where  borno_school_section_id='$stsec' AND `year` = '$stsess'";
}else{
    $gtsection = "select * from borno_school_section where  borno_school_section_id='$stsec'";
}
					$qgstsection=$mysqli->query($gtsection);
					$stgtsection=$qgstsection->fetch_assoc();
                    $fstsection=$stgtsection['borno_school_section_name'];
                    
$gtbranch = "SELECT * FROM `borno_school_branch` WHERE `borno_school_branch_id`='$branch'";
					$qgtbranch=$mysqli->query($gtbranch);
					$stqgtbranch=$qgtbranch->fetch_assoc();
                    $fstbranch=$stqgtbranch['borno_school_branch_name'];                    


$totalamount=0;		
$total = array();		
 $result2 ="SELECT * FROM `collection_details` where `money_receipt_no`='$memo'";
					$qgstresult2=$mysqli->query($result2);
					while($row2=$qgstresult2->fetch_assoc()){
					  $total[]=$row2['receive_amount'];
                      $totalamount=array_sum($total);  
					    

					}

$alltotal[]=$totalamount;
$alltotalamount=array_sum($alltotal);
//$stdate=date("d-m-y",strtotime($stdate));
$pdf->Cell(15,5,$stdate,1,0,"C");
$pdf->Cell(15,5,$fstbranch,1,0,"C");
$pdf->Cell(15,5,$fstClassName,1,0,"C");
$pdf->Cell(15,5,$fstshift,1,0,"C");
$pdf->Cell(20,5,$fstsection,1,0,"C");
$pdf->Cell(25,5,$stdid,1,0,"C");
$pdf->Cell(10,5,$stroll,1,0,"C");
$pdf->Cell(60,5,$stdname,1,0,"L");
$pdf->Cell(20,5,"$totalamount/-",1,0,"C");
$pdf->Ln();	

//  echo $stdate ."<br>";
//  echo $fstbranch;
}
	
$pdf->Cell(170,5,"Total Amount :",0,0,"R");
$pdf->Cell(20,5,"$alltotalamount/-",0,0,"C");	

$pdf->Output();
?>