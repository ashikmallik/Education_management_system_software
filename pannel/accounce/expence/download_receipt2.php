<?php

$memo=$_REQUEST['memo'];



include('expence_sett_top.php');





require('../../fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage('L');



   $result ="select * from borno_school_expence where borno_school_expence_memo='$memo'"; 
		$qresult=$mysqli->query($result);
		$shgresult=$qresult->fetch_assoc();

		
		$stsch=$shgresult['borno_school_id'];
		$stbr=$shgresult['borno_school_branch_id'];
	$stcls=$shgresult['borno_school_month'];
		$stsht=$shgresult['borno_school_exhead'];
		$stsec=$shgresult['borno_school_exname'];
		$stsess=$shgresult['borno_school_exby'];
		$stdid=$shgresult['borno_school_expence_amount'];
		$stuid=$shgresult['borno_school_user_id'];
		$stuname=$shgresult['borno_school_user_name'];
		$stdate=$shgresult['borno_school_ex_date'];

$gtsection = "select * from borno_school_branch where  borno_school_branch_id='$stbr'";
					$qgstsection=$mysqli->query($gtsection);
					$stgtsection=$qgstsection->fetch_assoc();
                    $fstsection=$stgtsection['borno_school_branch_name'];


//----------------- School Name ------------------------------------------------------------------

$gtschoolName ="select * from borno_school where borno_school_id=$stsch";
					$qgstschoolName=$mysqli->query($gtschoolName);
					$shschname=$qgstschoolName->fetch_assoc();
                    $fnschname=$shschname['borno_school_name'];

$pdf->SetFont('Arial','',11);
$pdf->Cell(90,2,$fnschname,0,0,"C");
$pdf->Cell(90,2,$fnschname,0,0,"C");
$pdf->Cell(10,2,'',0,0,"C");
$pdf->Cell(90,2,$fnschname,0,0,"C");


$pdf->Ln();
$pdf->Cell(200,2,"",0,0,"C");
$pdf->Ln();
$pdf->Cell(200,2,"",0,0,"C");
$pdf->Ln();

$pdf->SetFont('Arial','',9); 
$pdf->Cell(90,2,"Expence Office Copy-1",0,0,"C");
$pdf->Cell(90,2,"Expence Office Copy-2",0,0,"C");
$pdf->Cell(10,2,'',0,0,"C");
$pdf->Cell(90,2,"Expence Office Copy-3",0,0,"C");

$pdf->Ln();
$pdf->Cell(200,2,"",0,0,"C");
$pdf->Ln();
$pdf->Cell(200,5,"",0,0,"C");
$pdf->Ln();
$pdf->SetFont('Arial','',8); 
$pdf->Cell(13,2,"Memo No:",0,0,"L");
$pdf->Cell(39,2,$memo,0,0,"L");
$pdf->Cell(13,2,"Date:",0,0,"R");
$pdf->Cell(30,2,$stdate,0,0,"L");
$pdf->Cell(13,2,"Memo No:",0,0,"L");
$pdf->Cell(39,2,$memo,0,0,"L");
$pdf->Cell(13,2,"Date:",0,0,"R");
$pdf->Cell(27,2,$stdate,0,0,"L");
$pdf->Cell(8,5,'',0,0,"L");
$pdf->Cell(13,2,"Memo No:",0,0,"L");
$pdf->Cell(39,2,$memo,0,0,"L");
$pdf->Cell(10,2,"Date:",0,0,"R");
$pdf->Cell(17,2,$stdate,0,0,"L");
$pdf->Cell(200,3,"",0,0,"C");
$pdf->Ln();

//----------------- Branch Name ------------------------------------------------------------------


$pdf->Cell(200,5,"",0,0,"C");
$pdf->Ln();
$pdf->Cell(30,5,"Expence Month",1,0,"L");
$pdf->Cell(50,5,$stcls,1,0,"L");
$pdf->Cell(15,5,'',0,0,"L");
$pdf->Cell(30,5,"Expence Month",1,0,"L");
$pdf->Cell(50,5,$stcls,1,0,"L");
$pdf->Cell(20,5,'',0,0,"L");
$pdf->Cell(30,5,"Expence Month",1,0,"L");
$pdf->Cell(45,5,$stcls,1,0,"L");	
$pdf->Ln();

$pdf->Cell(30,5,"Expence Head",1,0,"L");
$pdf->Cell(50,5,$stsht,1,0,"L");
$pdf->Cell(15,5,'',0,0,"L");
$pdf->Cell(30,5,"Expence Head",1,0,"L");
$pdf->Cell(50,5,$stsht,1,0,"L");
$pdf->Cell(20,5,'',0,0,"L");
$pdf->Cell(30,5,"Expence Head",1,0,"L");
$pdf->Cell(45,5,$stsht,1,0,"L");	
$pdf->Ln();

$pdf->Cell(30,5,"Expence Name",1,0,"L");
$pdf->Cell(50,5,$stsec,1,0,"L");
$pdf->Cell(15,5,'',0,0,"L");
$pdf->Cell(30,5,"Expence Name",1,0,"L");
$pdf->Cell(50,5,$stsec,1,0,"L");
$pdf->Cell(20,5,'',0,0,"L");
$pdf->Cell(30,5,"Expence Name",1,0,"L");
$pdf->Cell(45,5,$stsec,1,0,"L");	
$pdf->Ln();

$pdf->Cell(30,5,"Expence By",1,0,"L");
$pdf->Cell(50,5,$stsess,1,0,"L");
$pdf->Cell(15,5,'',0,0,"L");
$pdf->Cell(30,5,"Expence By",1,0,"L");
$pdf->Cell(50,5,$stsess,1,0,"L");
$pdf->Cell(20,5,'',0,0,"L");
$pdf->Cell(30,5,"Expence By",1,0,"L");
$pdf->Cell(45,5,$stsess,1,0,"L");	
$pdf->Ln();

$pdf->Cell(30,5,"Amount",1,0,"L");
$pdf->Cell(50,5,$stdid,1,0,"L");
$pdf->Cell(15,5,'',0,0,"L");
$pdf->Cell(30,5,"Amount",1,0,"L");
$pdf->Cell(50,5,$stdid,1,0,"L");
$pdf->Cell(20,5,'',0,0,"L");
$pdf->Cell(30,5,"Amount",1,0,"L");
$pdf->Cell(45,5,$stdid,1,0,"L");	
$pdf->Ln();
//========================= In Word Code ===================================
		
 $number = $stdid;
   $no = round($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'One', '2' => 'Two',
    '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
    '13' => 'Thirteen', '14' => 'Fourteen',
    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
    '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
    '60' => 'Sixty', '70' => 'Seventy',
    '80' => 'Eighty', '90' => 'Ninety');
   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
   $finalAmount=$result."Taka ".$points."only";

		
		
	//$pdf->Cell(125,10,"Amount In Word : $finalAmount",0,0,"L");
		

//============================================================================	


$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','',7);
$pdf->Cell(95,5,"Amount In Word : $finalAmount",0,0,"L");
$pdf->Cell(100,5,"Amount In Word : $finalAmount",0,0,"L");
$pdf->Cell(90,5,"Amount In Word : $finalAmount",0,0,"L");


$pdf->Ln();
$pdf->SetFont('Arial','',8);
$pdf->Cell(80,5,"Received By- - - - - - - - - - - - - - - - - - - - - - - - -",0,0,"L");
$pdf->Cell(15,5,'',0,0,"L");
$pdf->Cell(80,5,"Received By- - - - - - - - - - - - - - - - - - - - - - - - -",0,0,"L");
$pdf->Cell(20,5,'',0,0,"L");
$pdf->Cell(75,5,"Received By- - - - - - - - - - - - - - - - - - - - - - -",0,0,"L");
$pdf->Cell(10,5,'',0,0,"L");




$pdf->Output();
?>