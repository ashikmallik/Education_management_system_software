<?php


$schId=$_GET['schoolId'];
$stsess=trim($_GET['stsess']);

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
$pdf->Cell(200,5,"Student Summary of $stsess",0,5,"C");
$pdf->Cell(200,5,'',0,5,"C"); 
$pdf->SetFont('Arial','',12); 
$pdf->Cell(200,1,'',0,5,"C"); 
$pdf->SetFont('Arial','',10);




		$pdf->Cell(40,5,'',0,0,"C");
		$pdf->Cell(20,5,'Class',1,0,"C");
		$pdf->Cell(20,5,'Shift',1,0,"C");
		$pdf->Cell(40,5,'Section',1,0,"C");
		$pdf->Cell(30,5,'Total Student',1,0,"C");
		


			
					$data="select * from borno_school_set_class where borno_school_id='$schId' order by class_order asc";
					$qdata=$mysqli->query($data);
					$sl1=0;
					while($showdata=$qdata->fetch_assoc()){ $sl1++;
					$stclass=$showdata['borno_school_class_id'];
						
				$data1="select * from borno_student_info where borno_school_id='$schId' AND borno_school_session='$stsess' AND borno_school_class_id='$stclass' group by borno_school_shift_id asc";
					$qdata1=$mysqli->query($data1);
					$sl=0;
					while($showdata1=$qdata1->fetch_assoc()){ $sl++;
					
					$stshift=$showdata1['borno_school_shift_id'];
					
					$data2="select * from borno_student_info where borno_school_id='$schId' AND borno_school_session='$stsess' AND borno_school_class_id='$stclass' AND borno_school_shift_id='$stshift' group by borno_school_section_id asc";
					$qdata2=$mysqli->query($data2);
					$sll=0;
					while($showdata2=$qdata2->fetch_assoc()){ $sll++;
					
					
					$stsection=$showdata2['borno_school_section_id'];
		
	
					$gtsection1="select * from borno_student_info where borno_school_id='$schId' AND borno_school_session='$stsess' AND borno_school_class_id='$stclass' AND borno_school_shift_id='$stshift' AND borno_school_section_id='$stsection'";
					$qgtsection1=$mysqli->query($gtsection1);							
					$stroll=mysqli_num_rows($qgtsection1); 
					
					
					$gtclass="SELECT * FROM borno_school_class where borno_school_class_id=$stclass";
					$qgtclass=$mysqli->query($gtclass);
					$sqgtclass=$qgtclass->fetch_assoc();
					$fnsclass=$sqgtclass['borno_school_class_name'];
		
					$gtshift="SELECT * FROM borno_school_shift where borno_school_shift_id=$stshift";
					$qgtshift=$mysqli->query($gtshift);
					$sqgtshift=$qgtshift->fetch_assoc();
					$fnsshift=$sqgtshift['borno_school_shift_name'];

					$gtsection="SELECT * FROM borno_school_section where borno_school_section_id=$stsection";
					$qgtsection=$mysqli->query($gtsection);
					$sqgtsection=$qgtsection->fetch_assoc();
					$fnssection=$sqgtsection['borno_school_section_name'];
		
	
					
$pdf->Ln();
		$pdf->Cell(40,5,'',0,0,"C");
		$pdf->Cell(20,5,$fnsclass,1,0,"C");
		$pdf->Cell(20,5,$fnsshift,1,0,"C");
		$pdf->Cell(40,5,$fnssection,1,0,"C");
		$pdf->Cell(30,5,$stroll,1,0,"C");
}

}					}
		
					$pdf->Ln();
					$gtshiftmor="select * from borno_student_info where borno_school_id='$schId' AND borno_school_session='$stsess' AND borno_school_shift_id=2";
					$qgtshiftmor=$mysqli->query($gtshiftmor);
					$stmor=mysqli_num_rows($qgtshiftmor); 
					
					$pdf->Cell(40,5,'',0,0,"C");
					$pdf->Cell(80,5,"Total Student of Morning Shift",1,0,"L");
    				$pdf->Cell(30,5,$stmor,1,0,"C");
					
					$pdf->Ln();
					$gtshiftday="select * from borno_student_info where borno_school_id='$schId' AND borno_school_session='$stsess' AND borno_school_shift_id=3";
					$qgtshiftday=$mysqli->query($gtshiftday);
					$stday=mysqli_num_rows($qgtshiftday); 
					
					$pdf->Cell(40,5,'',0,0,"C");
					$pdf->Cell(80,5,"Total Student of Day Shift",1,0,"L");
    				$pdf->Cell(30,5,$stday,1,0,"C");
					
					$pdf->Ln();
					$gttotal="select * from borno_student_info where borno_school_id='$schId' AND borno_school_session='$stsess'";
					$qgttotal=$mysqli->query($gttotal);
					$total=mysqli_num_rows($qgttotal); 
					
					$pdf->Cell(40,5,'',0,0,"C");
					$pdf->Cell(80,5,"Total Student",1,0,"L");
    				$pdf->Cell(30,5,$total,1,0,"C");

$pdf->Output();
?>