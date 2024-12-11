<?php

$memo=$_GET['memo'];



include('transection_sett_top.php');





require('../../fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage('L');


date_default_timezone_set("Asia/Dhaka");
$time=date("h:i:s");
$date=date("d-m-y");

  $result ="select * from borno_school_receipt where borno_school_memo='$memo' group by borno_school_id,borno_school_branch_id,borno_school_class_id,borno_school_shift_id,borno_school_section_id,borno_school_session,borno_student_info_id,borno_school_date";
		$qresult=$mysqli->query($result);
		$shgresult=$qresult->fetch_assoc();

		
		$stsch=$shgresult['borno_school_id'];
		$stbr=$shgresult['borno_school_branch_id'];
		$stcls=$shgresult['borno_school_class_id'];
		$stsht=$shgresult['borno_school_shift_id'];
		$stsec=$shgresult['borno_school_section_id'];
		$stsess=$shgresult['borno_school_session'];
		$stdid=$shgresult['borno_student_info_id'];
		$stdate=$shgresult['borno_school_date'];

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
$pdf->Cell(90,2,"Office Copy-1",0,0,"C");
$pdf->Cell(90,2,"Office Copy-2",0,0,"C");
$pdf->Cell(10,2,'',0,0,"C");
$pdf->Cell(90,2,"Student Copy",0,0,"C");

$pdf->Ln();
$pdf->Cell(200,2,"",0,0,"C");
$pdf->Ln();
$pdf->Cell(200,5,"",0,0,"C");
$pdf->Ln();
$pdf->SetFont('Arial','',8); 
$pdf->Cell(13,2,"Memo No:",0,0,"L");
$pdf->Cell(39,2,$memo,0,0,"L");
$pdf->Cell(13,2,"Date:",0,0,"R");
$pdf->Cell(30,2,$date,0,0,"L");
$pdf->Cell(13,2,"Memo No:",0,0,"L");
$pdf->Cell(39,2,$memo,0,0,"L");
$pdf->Cell(13,2,"Date:",0,0,"R");
$pdf->Cell(27,2,$date,0,0,"L");
$pdf->Cell(8,5,'',0,0,"L");
$pdf->Cell(13,2,"Memo No:",0,0,"L");
$pdf->Cell(39,2,$memo,0,0,"L");
$pdf->Cell(10,2,"Date:",0,0,"R");
$pdf->Cell(17,2,$date,0,0,"L");
$pdf->Cell(200,3,"",0,0,"C");
$pdf->Ln();

//----------------- Branch Name ------------------------------------------------------------------


 $result1 ="select * from borno_student_info where borno_school_id=$stsch AND borno_school_branch_id=$stbr AND borno_school_class_id=$stcls AND borno_school_shift_id=$stsht AND borno_school_section_id=$stsec AND borno_school_session=$stsess AND borno_student_info_id='$stdid'";
					$qgstresult1=$mysqli->query($result1);
					$row1=$qgstresult1->fetch_assoc();
                    $stroll=$row1['borno_school_roll'];
		            $stdname=$row1['borno_school_student_name'];
					$stdinfoid=$row1['borno_student_info_id'];

$pdf->Cell(15,5,"Student ID :",0,0,"L");
$pdf->Cell(42,5,$stdinfoid,0,0,"L");
$pdf->Cell(25,5,"Time : $time",0,0,"L");
$pdf->Cell(13,5,'',0,0,"L");
$pdf->Cell(15,5,"Student ID :",0,0,"L");
$pdf->Cell(42,5,$stdinfoid,0,0,"L");
$pdf->Cell(30,5,"Time : $time",0,0,"L");
$pdf->Cell(13,5,'',0,0,"L");
$pdf->Cell(15,5,"Student ID:",0,0,"L");
$pdf->Cell(40,5,$stdinfoid,0,0,"L");	
$pdf->Cell(25,5,"Time : $time",0,0,"L");	
$pdf->Ln();	
		
$pdf->Cell(10,5,"Name :",0,0,"L");
$pdf->Cell(50,5,$stdname,0,0,"L");
$pdf->Cell(25,5,"Shift : $fstshift",0,0,"L");
$pdf->Cell(10,5,'',0,0,"L");
$pdf->Cell(10,5,"Name :",0,0,"L");
$pdf->Cell(50,5,$stdname,0,0,"L");
$pdf->Cell(30,5,"Shift : $fstshift",0,0,"L");
$pdf->Cell(10,5,'',0,0,"L");
$pdf->Cell(10,5,"Name :",0,0,"L");
$pdf->Cell(50,5,$stdname,0,0,"L");	
$pdf->Cell(25,5,"Shift : $fstshift",0,0,"L");	
$pdf->Ln();
$pdf->Cell(10,5,"Class :",0,0,"L");
$pdf->Cell(10,5,$fstClassName,0,0,"L");
$pdf->Cell(12,5,"Section :",0,0,"L");
$pdf->Cell(30,5,$fstsection,0,0,"L");
$pdf->Cell(8,5,"Roll :",0,0,"L");
$pdf->Cell(25,5,$stroll,0,0,"L");

$pdf->Cell(10,5,"Class :",0,0,"L");
$pdf->Cell(10,5,$fstClassName,0,0,"L");
$pdf->Cell(12,5,"Section :",0,0,"L");
$pdf->Cell(35,5,$fstsection,0,0,"L");
$pdf->Cell(8,5,"Roll :",0,0,"L");
$pdf->Cell(25,5,$stroll,0,0,"L");

$pdf->Cell(10,5,"Class :",0,0,"L");
$pdf->Cell(10,5,$fstClassName,0,0,"L");
$pdf->Cell(12,5,"Section :",0,0,"L");
$pdf->Cell(30,5,$fstsection,0,0,"L");
$pdf->Cell(7,5,"Roll :",0,0,"L");
$pdf->Cell(10,5,$stroll,0,0,"L");	

$pdf->Cell(200,5,"",0,0,"C");
$pdf->Ln();
$pdf->Cell(70,5,"Description",1,0,"L");
$pdf->Cell(10,5,"Taka",1,0,"L");
$pdf->Cell(15,5,'',0,0,"L");
$pdf->Cell(70,5,"Description",1,0,"L");
$pdf->Cell(10,5,"Taka",1,0,"L");
$pdf->Cell(20,5,'',0,0,"L");
$pdf->Cell(65,5,"Description",1,0,"L");
$pdf->Cell(10,5,"Taka",1,0,"L");	
$total = array();
$pdf->Ln();

 $gtfund ="select * from borno_school_fund where  borno_school_id='$stsch' order by borno_school_fund_id";
					$qgstfund=$mysqli->query($gtfund);
					while($row3=$qgstfund->fetch_assoc()){
                    $fstfund=$row3['borno_school_fund_name'];
					$stfund1=$row3['borno_school_fund_id'];

  $result2 ="select * from borno_school_receipt where borno_school_memo='$memo' and borno_school_fund_id='$stfund1' ";
					$qgstresult2=$mysqli->query($result2);
					$row2=$qgstresult2->fetch_assoc();
					$stsubfund=$row2['borno_school_sub_fund_id'];
					

   $gtsubfund ="select * from borno_school_sub_fund where  borno_school_sub_fund_id='$stsubfund'";
                    $qgstsubfund=$mysqli->query($gtsubfund);
					$stsubgtfund=$qgstsubfund->fetch_assoc();
                    $fstsubfund=$stsubgtfund['sub_fund_name'];
					$fstsubfundid=$stsubgtfund['borno_school_sub_fund_id'];
					
					

$stamount=$row2['borno_school_fee'];
$total[]=$row2['borno_school_fee'];  

if ($stamount!=""){$stamount1=$stamount."/-";}else
{$stamount1=$stamount;}


$pdf->Cell(70,5,"$fstfund $fstsubfund",1,0,"L");
$pdf->Cell(10,5,"$stamount1",1,0,"L");
$pdf->Cell(15,5,'',0,0,"L");
$pdf->Cell(70,5,"$fstfund $fstsubfund",1,0,"L");
$pdf->Cell(10,5,"$stamount1",1,0,"L");
$pdf->Cell(20,5,'',0,0,"L");
$pdf->Cell(65,5,"$fstfund $fstsubfund",1,0,"L");
$pdf->Cell(10,5,"$stamount1",1,0,"L");
$totalamount=array_sum($total);
$pdf->Ln();
}
$pdf->Cell(70,5,"Total Amount",1,0,"L");
$pdf->Cell(10,5,"$totalamount/-",1,0,"L");
$pdf->Cell(15,5,'',0,0,"L");
$pdf->Cell(70,5,"Total Amount",1,0,"L");
$pdf->Cell(10,5,"$totalamount/-",1,0,"L");
$pdf->Cell(20,5,'',0,0,"L");
$pdf->Cell(65,5,"Total Amount",1,0,"L");
$pdf->Cell(10,5,"$totalamount/-",1,0,"L");

//========================= In Word Code ===================================
		
 $number = $totalamount;
   $no = round($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'one', '2' => 'two',
    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
    '7' => 'seven', '8' => 'eight', '9' => 'nine',
    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
    '13' => 'thirteen', '14' => 'fourteen',
    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
    '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
    '60' => 'sixty', '70' => 'seventy',
    '80' => 'eighty', '90' => 'ninety');
   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
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