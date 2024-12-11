<?php

 $branchId=$_GET['branchId'];
 $schId=$_GET['schoolId'];
$mgtType=trim($_GET['type']);

include('../../../connection.php');





require('../../fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();

					$gtschoolName="SELECT * FROM borno_school where borno_school_id=$schId";
					$qgtschoolName=$mysqli->query($gtschoolName);
					$sqgtschoolName=$qgtschoolName->fetch_assoc();

$pdf->SetFont('Arial','',20);
$fnschname=$sqgtschoolName['borno_school_name'];
$pdf->Cell(200,2,$fnschname,0,5,"C");

$pdf->SetFont('Arial','',14); 
$pdf->Cell(200,5,'',0,5,"C"); 
$pdf->Cell(200,5,'GB Info',0,5,"C");
$pdf->Cell(200,1,'',0,5,"C"); 



$pdf->SetFont('Arial','',10);



 $pdf->Cell(20,5,'',0);
		$pdf->Cell(8,5,SL,1);
		$pdf->Cell(80,5,Name,1);
		$pdf->Cell(35,5,Phone,1);
		$pdf->Cell(25,5,Tpye,1);
		

			$data="SELECT * FROM borno_gb_info where borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_gb_type ='$mgtType' order by borno_gb_info_id asc";
			
	
					$qdata=$mysqli->query($data);
					while($showdata=$qdata->fetch_assoc()){ $sl++;
					
		$pdf->Ln();
		$shiftid=$showdata['borno_gb_type'];
		$techname=$showdata['borno_gb_name'];
		$techPhone=$showdata['borno_gb_phone'];
		 
		
		
					
	   $pdf->Cell(20,5,'',0);
		$pdf->Cell(8,5,$sl,1);
		$pdf->Cell(80,5,$techname,1);
		$pdf->Cell(35,5,$techPhone,1);	
		$pdf->Cell(25,5,$shiftid,1);
}



$pdf->Output();
?>