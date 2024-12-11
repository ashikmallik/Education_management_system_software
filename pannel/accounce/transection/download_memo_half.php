<?php
$memo=$_REQUEST['memo'];


include('transection_sett_top.php');

$gtmemo="select * from borno_school_receipt where borno_school_memo='$memo'";
					$qgstmemo=$mysqli->query($gtmemo);
					$shmemo=$qgstmemo->fetch_assoc();
					$stdid1=$shmemo['borno_student_info_id'];
					$cdate=$shmemo['borno_school_date'];
				
$cdate=date("d-M-Y",strtotime($cdate));

$gtstdName ="select * from borno_student_info where borno_student_info_id='$stdid1'";
					$qgststdName=$mysqli->query($gtstdName);
					$shsstdname=$qgststdName->fetch_assoc();
					$branchId=$shsstdname['borno_school_branch_id'];
                    $newcl=$shsstdname['borno_school_class_id'];
                    $newsection=$shsstdname['borno_school_section_id'];	
                    $shift=$shsstdname['borno_school_shift_id'];	
                    $roll=$shsstdname['borno_school_roll'];
                    $name=$shsstdname['borno_school_student_name'];
                    $fmobile=substr($shsstdname['borno_school_phone'],2,11);
                    $bornoid=$shsstdname['borno_final_student_id'];		        
                    $stdid="$stdid1";
                    
$gtschoolName ="select * from borno_school where borno_school_id=$schId";
					$qgstschoolName=$mysqli->query($gtschoolName);
					$shschname=$qgstschoolName->fetch_assoc();
                     $fnschname=$shschname['borno_school_name'];
                     $fnaddress=$shschname['borno_school_address'];
                     
 	$gtschoolLogo=$shschname['borno_school_logo'];
	if($gtschoolLogo!=""){
	
	$finalSchoolLogo="../../academic/infosett/school-logo/$gtschoolLogo";
	
	} else {
		$finalSchoolLogo="../../academic/infosett/school-logo/nologo.png";
		}                    
                     
                     

$gtbranchName ="select * from borno_school_branch where borno_school_branch_id=$branchId";
					$qgstbranchName=$mysqli->query($gtbranchName);
					$shbrname=$qgstbranchName->fetch_assoc();
                    $fnbranchname=$shbrname['borno_school_branch_name'];
                    
$gtshift ="select * from borno_school_shift where borno_school_shift_id=$shift";
					$qgstshift=$mysqli->query($gtshift);
					$shscshift=$qgstshift->fetch_assoc();
                    $fnscshift=$shscshift['borno_school_shift_name'];


	
	 $gsectionName11 ="select * from borno_school_section where borno_school_section_id='$newsection'";
					$qgsectionName11=$mysqli->query($gsectionName11);
					$shsectionname11=$qgsectionName11->fetch_assoc();
					$sectionname1=$shsectionname11['borno_school_section_name'];
					

	 $gsectionName13 ="select * from borno_school_class where borno_school_class_id='$newcl'";
					$qgsectionName13=$mysqli->query($gsectionName13);
					$shsectionname13=$qgsectionName13->fetch_assoc();
					$classname1=$shsectionname13['borno_school_class_name'];
					

//=========================Add Student Info==============================
//$finalSchoolLogo="abasc.jpg";
$box="sbox.jpg";
$bbox="bbox.jpg";
require('../../fpdf/fpdf.php');
class PDF extends FPDF
{
// Page header
function Header()
{
$finalbox=$GLOBALS['box']; 
$finalbbox=$GLOBALS['bbox']; 
$finalSchoolLogo1=$GLOBALS['finalSchoolLogo'];
$this->Image($finalSchoolLogo1,11,11,20,20);
$this->Image($finalSchoolLogo1,161,11,20,20);


/*
$this->Image($finalbox,34,36,23,6);
$this->Image($finalbox,75,36,20,6);
$this->Image($finalbox,112,36,23,6);
$this->Image($finalbox,185,36,23,6);
$this->Image($finalbox,227,36,20,6);
$this->Image($finalbox,263,36,23,6);


$this->Image($finalbbox,37,46,100,12);
$this->Image($finalbbox,187,46,100,12);

$this->Image($finalbox,24,58,15,6);
$this->Image($finalbox,54,58,17,6);
$this->Image($finalbox,86,58,17,6);
$this->Image($finalbox,121,58,15,6);

$this->Image($finalbox,174,58,15,6);
$this->Image($finalbox,204,58,17,6);
$this->Image($finalbox,236,58,17,6);
$this->Image($finalbox,271,58,15,6);
*/
$this->Cell(130,33,"",1,0,"R");
$this->Cell(20,15,"",0,0,"C");
$this->Cell(130,33,"",1,0,"R");
$this->Cell(5,1,"",0,0,"R");
$this->Ln();




$this->SetFont('Arial','B',14);
$this->Cell(130,5,$GLOBALS['fnschname'],0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(150,5,$GLOBALS['fnschname'],0,0,"C");
$this->Ln();
$this->Ln();
$this->SetFont('Arial','',10); 
$this->Cell(130,5,$GLOBALS['fnaddress'],0,0,"C");
$this->Cell(5,5,'',0,0,"C");
$this->Cell(150,5,$GLOBALS['fnaddress'],0,0,"C");
$this->Ln();
$this->Ln();
$this->SetFont('Arial','',10); 
$this->Cell(130,2,"Office Copy",0,0,"C");
$this->Cell(5,5,'',0,0,"C");
$this->Cell(150,2,"Student Copy",0,0,"C");

$this->Ln();
$this->SetFont('Arial','B',11);
$this->Cell(90,5,"",0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(90,5,"",0,0,"C");

$this->Ln();
$this->SetFont('Arial','B',8);
$this->Cell(5,5,"",0,0,"C");
$this->Cell(20,5,"Student ID : ",0,0,"L");
$this->Cell(26,5,$GLOBALS['stdid'],0,0,"L");
$this->Cell(15,5,"Memo No : ",0,0,"L");
$this->Cell(20,5,$GLOBALS['memo'],0,0,"L");
$this->Cell(15,5,"Date : ",0,0,"R");
$this->Cell(26,5,$GLOBALS['cdate'],0,0,"L");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(20,5,"",0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(20,5,"Student ID :",0,0,"L");
$this->Cell(26,5,$GLOBALS['stdid'],0,0,"L");
$this->Cell(15,5,"Memo No : ",0,0,"L");
$this->Cell(20,5,$GLOBALS['memo'],0,0,"L");
$this->Cell(15,5,"Date : ",0,0,"R");
$this->Cell(25,5,$GLOBALS['cdate'],0,0,"L");
$this->Ln();
$this->Cell(5,2,"",0,5,"C");
$this->Cell(130,22,"",1,0,"C");
$this->Cell(20,5,"",0,0,"C");
$this->Cell(130,22,"",1,0,"C");
$this->Cell(5,2,"",0,5,"C");
$this->Ln();
$this->SetFont('Arial','B',8);
$this->Cell(5,5,"",0,0,"C");
$this->Cell(25,5,"Student Name : ",0,0,"L");
$this->Cell(95,5,$GLOBALS['name'],0,0,"L");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(20,5,"|",0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(25,5,"Student Name : ",0,0,"L");
$this->Cell(95,5,$GLOBALS['name'],0,0,"L");
$this->Ln();
$this->Cell(5,5,"",0,0,"C");
$this->Cell(25,5,"Contact No : ",0,0,"L");
$this->Cell(95,5,$GLOBALS['fmobile'],0,0,"L");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(20,5,"|",0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(25,5,"Contact No :",0,0,"L");
$this->Cell(95,5,$GLOBALS['fmobile'],0,0,"L");
$this->Ln();
$this->Cell(5,1,"",0,5,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(10,5,"Class : ",0,0,"L");
$this->Cell(20,5,$GLOBALS['classname1'],0,0,"L");
$this->Cell(10,5,"Shift : ",0,0,"L");
$this->Cell(20,5,$GLOBALS['fnscshift'],0,0,"L");
$this->Cell(12,5,"Section : ",0,0,"L");
$this->Cell(23,5,$GLOBALS['sectionname1'],0,0,"L");
$this->Cell(12,5,"Roll No : ",0,0,"L");
$this->Cell(13,5,$GLOBALS['roll'],0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(20,5,"|",0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(10,5,"Class : ",0,0,"L");
$this->Cell(20,5,$GLOBALS['classname1'],0,0,"L");
$this->Cell(10,5,"Shift : ",0,0,"L");
$this->Cell(20,5,$GLOBALS['fnscshift'],0,0,"L");
$this->Cell(12,5,"Section : ",0,0,"L");
$this->Cell(23,5,$GLOBALS['sectionname1'],0,0,"L");
$this->Cell(12,5,"Roll No : ",0,0,"L");
$this->Cell(13,5,$GLOBALS['roll'],0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Ln();
$this->Cell(5,2,"",0,5,"C");
$this->Cell(130,135,"",1,0,"C");
$this->Cell(20,5,"",0,0,"C");
$this->Cell(130,135,"",1,0,"C");
$this->Cell(5,1,"",0,5,"C");
$this->Ln();
$this->Cell(5,1,"",0,5,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(100,5,"Description",1,0,"L");
$this->Cell(20,5,"Amount",1,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->SetFont('Arial','',8);
$this->Cell(20,5,"|",0,0,"C");
$this->SetFont('Arial','B',8);
$this->Cell(5,5,"",0,0,"C");
$this->Cell(100,5,"Description",1,0,"L");
$this->Cell(20,5,"Amount",1,0,"C");
$this->Ln();
	
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-25);
    // Arial italic 8
    $this->Cell(80,5,"",0,0,"L");
    $this->Cell(50,5,"--------------------------",0,0,"C");
    $this->Cell(5,5,"",0,0,"C");
    $this->Cell(90,5,"",0,0,"L");
    $this->Cell(50,5,"--------------------------",0,0,"C");
    $this->Ln();
    $this->SetFont('Arial','B',8);
    $this->Cell(5,5,"",0,0,"C");
    $this->Cell(75,5,'',0,0,"L");
    $this->Cell(50,5,"Received By",0,0,"C");
    $this->Cell(20,5,"",0,0,"C");
    $this->Cell(75,5,'',0,0,"L");
    $this->Cell(50,5,"Received By",0,0,"C");
    // Page number
    //$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L');


				
					
	  $result2 ="select * from borno_school_receipt where borno_school_id='$schId' and borno_school_memo='$memo' order by borno_school_fund_id ";
					$qgstresult2=$mysqli->query($result2);
					while($row2=$qgstresult2->fetch_assoc()){
					$fundid=$row2['borno_school_fund_id'];
					$stsubfundid=$row2['borno_school_sub_fund_id'];

 $gtfund ="select * from borno_school_fund where  borno_school_id='$schId' and borno_school_fund_id='$fundid' ";
					$qgstfund=$mysqli->query($gtfund);
					$row3=$qgstfund->fetch_assoc();
                    $fstfund=$row3['borno_school_fund_name'];
		

   $gtsubfund ="select * from borno_school_sub_fund where borno_school_id='$schId' and borno_school_fund_id='$fundid' and borno_school_sub_fund_id='$stsubfundid'";
                    $qgstsubfund=$mysqli->query($gtsubfund);
					$stsubgtfund=$qgstsubfund->fetch_assoc();
                    $fstsubfund=$stsubgtfund['sub_fund_name'];				
					
					
					

$stamount=$row2['borno_school_fee'];
$total[]=$row2['borno_school_fee'];  

if ($stamount!=""){$stamount1=$stamount."/-";}else
{$stamount1=$stamount;}

$pdf->Cell(5,5,'',0,0,"L");
$pdf->Cell(100,5,"$fstfund $fstsubfund",1,0,"L");
$pdf->Cell(20,5,"$stamount1",1,0,"L");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(20,5,"|",0,0,"C");
$pdf->Cell(5,5,'',0,0,"L");
$pdf->Cell(100,5,"$fstfund $fstsubfund",1,0,"L");
$pdf->Cell(20,5,"$stamount1",1,0,"L");

$totalamount=array_sum($total);
$pdf->Ln();
}
$pdf->Cell(5,5,'',0,0,"L");
$pdf->Cell(100,5,"Total Amount",1,0,"L");
$pdf->Cell(20,5,"$totalamount/-",1,0,"L");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(20,5,"|",0,0,"C");
$pdf->Cell(5,5,'',0,0,"L");
$pdf->Cell(100,5,"Total Amount",1,0,"L");
$pdf->Cell(20,5,"$totalamount/-",1,0,"L");




$totalamount=0;		
$total = array();		
 $result2 ="select * from borno_school_receipt where borno_school_memo='$memo' order by borno_school_fund_id,borno_school_sub_fund_id asc";
					$qgstresult2=$mysqli->query($result2);
					while($row2=$qgstresult2->fetch_assoc()){
					  $total[]=$row2['borno_school_fee'];
                      $totalamount=array_sum($total);  
					    
					}
					
$pdf->SetFont('Arial','B',8);
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(100,5,"Total = ",1,0,"R");
$pdf->Cell(20,5,"$totalamount/-",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(20,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(100,5,"Total = ",1,0,"R");
$pdf->Cell(20,5,"$totalamount/-",1,0,"C");
$pdf->Ln();

//========================= In Word Code ===================================
		
 $number = $totalamount;
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
   $finalAmount3=$result.$points."Taka Only";
   $finalAmount2=substr(($finalAmount3),0,44); 
   $finalAmount3=substr(($finalAmount3),44,100);
//============================================================================	
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(120,5,"In word : $finalAmount2",0,0,"L");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(20,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(120,5,"In word : $finalAmount2",0,0,"L");
$pdf->Ln();
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(110,5,"$finalAmount3",0,0,"L");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(20,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(110,5,"$finalAmount3",0,0,"L");
$pdf->Ln();
$pdf->Output();
?>