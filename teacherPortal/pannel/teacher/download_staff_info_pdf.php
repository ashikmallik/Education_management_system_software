<?php




include('../../../connection.php');


 $schId=$_GET['schoolId'];
 $brnId=$_GET['brnId'];



require('../../fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();

					  $gtschoolName="SELECT * FROM borno_school where borno_school_id=$schId";
					$qgtschoolName=$mysqli->query($gtschoolName);
					$sqgtschoolName=$qgtschoolName->fetch_assoc();
					
			 $gtbranchName="SELECT * FROM borno_school_branch where borno_school_id=$schId and borno_school_branch_id=$brnId ";
					$qgtbranchName=$mysqli->query($gtbranchName);
					$sqgtbranchName=$qgtbranchName->fetch_assoc();			
					$fnbrnname=$sqgtbranchName['borno_school_branch_name'];

$pdf->SetFont('Arial','',20);
$fnschname=$sqgtschoolName['borno_school_name'];
$pdf->Cell(200,2,$fnschname,0,5,"C");

$pdf->SetFont('Arial','',14); 
$pdf->Cell(200,5,'',0,5,"C"); 
$pdf->Cell(200,5,"Staff's Info",0,5,"C");
$pdf->Cell(200,1,'',0,5,"C"); 
$pdf->Cell(200,5,"Branch : $fnbrnname",0,5,"C");
$pdf->Cell(200,1,'',0,5,"C"); 



$pdf->SetFont('Arial','',10);



		$pdf->Cell(8,5,SL,1);
		$pdf->Cell(80,5,Name,1);
		$pdf->Cell(30,5,Phone,1,0,"C");
		//$pdf->Cell(15,5,Shift,1,0,"C");
		$pdf->Cell(55,5,Designation,1);
		/*	$pdf->Ln();
			
					$gtheadmaster="SELECT * FROM borno_teacher_info where borno_school_id=$schId ";
					$qgtheadmaster=$mysqli->query($gtheadmaster);
					$sqgtheadmaster=$qgtheadmaster->fetch_assoc();
		$sl=1;
        $techname1=$sqgtheadmaster['borno_teacher_name'];
		$tecdesig1=$sqgtheadmaster['borno_teachers_designation'];
		$techPhone1=substr($sqgtheadmaster['borno_teacher_phone'],2,11);
		if ($techname1!="")
		{
		$pdf->Cell(8,5,$sl,1);
		$pdf->Cell(80,5,$techname1,1);
		$pdf->Cell(30,5,$techPhone1,1,0,"C");	
		$pdf->Cell(15,5,'No',1,0,"C");
		$pdf->Cell(55,5,$tecdesig1,1);	
		}
			*/
					$data="SELECT * FROM borno_mgt_staff_info where  borno_school_id=$schId order by borno_mgt_staff_info_id asc";
					$qdata=$mysqli->query($data);
					while($showdata=$qdata->fetch_assoc()){ $sl++;
					
		$pdf->Ln();
		//$shiftid=$showdata['borno_school_shift_id'];
		$techname=$showdata['borno_mgt_staff_name'];
		$tecdesig1=$showdata['borno_mgt_staf_desig'];
		$techPhone=substr($showdata['borno_mgt_staf_phone'],2,11);
		 
		 if($shiftid==1) { $final="No"; }
		 elseif($shiftid==2) { $final="Morning"; }
		 elseif($shiftid==3) { $final="Day"; }
		
					
	  
		$pdf->Cell(8,5,$sl,1);
		$pdf->Cell(80,5,$techname,1);
		$pdf->Cell(30,5,$techPhone,1,0,"C");	
		//$pdf->Cell(15,5,$final,1,0,"C");
		$pdf->Cell(55,5,$tecdesig1,1);
}



$pdf->Output();
?>