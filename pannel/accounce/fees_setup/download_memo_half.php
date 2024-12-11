<?php
$memo=$_REQUEST['memo'];


include('fees_sett_top.php');

	date_default_timezone_set('Asia/Dhaka');
	$curdate=date('d-m-Y');	
	$curtime=date("h:i:sa");


$gtmemo="select * from borno_school_receipt where borno_school_memo='$memo'";
					$qgstmemo=$mysqli->query($gtmemo);
					$shmemo=$qgstmemo->fetch_assoc();
					$stdid1=$shmemo['borno_student_info_id'];
					$cdate=$shmemo['borno_school_date'];
				 	$borno_school_user=$shmemo['borno_school_user'];
				 	
					$cdate=date("d-M-Y",strtotime($cdate));
					
$gtUser ="select * from borno_user where borno_user_id='$borno_school_user'";
					$qgstUser=$mysqli->query($gtUser);
					$stUser=$qgstUser->fetch_assoc();
                  $UserName=$stUser['borno_user_name'];					
					
				


$gtstdName ="select * from borno_student_info where borno_student_info_id='$stdid1'";
					$qgststdName=$mysqli->query($gtstdName);
					$shsstdname=$qgststdName->fetch_assoc();
                    $newcl=$shsstdname['borno_school_class_id'];
                    $newsection=$shsstdname['borno_school_section_id'];	
                    $shift=$shsstdname['borno_school_shift_id'];	
                    $roll=$shsstdname['borno_school_roll'];
                    $name=$shsstdname['borno_school_student_name'];
                    $fmobile=substr($shsstdname['borno_school_phone'],2,11);
                    $bornoid=$shsstdname['borno_final_student_id'];		        
                    $stdid="$stdid1";
                    
$gtschoolName ="select * from borno_school where borno_school_id='$schId'";
					$qgstschoolName=$mysqli->query($gtschoolName);
					$shschname=$qgstschoolName->fetch_assoc();
                    $fnschname=$shschname['borno_school_name'];


                    
$gtshift ="select * from borno_school_shift where borno_school_shift_id='$shift'";
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
$SchoolLogo="khsc_log.png";
$schoolbanner="khsc_banner.JPG";
$box="sbox.jpg";
$bbox="bbox.jpg";
require('code128.php');
class PDF extends PDF_Code128
{
// Page header
function Header()
{
$finalbox=$GLOBALS['box']; 
$finalbbox=$GLOBALS['bbox']; 
$SchoolLogo1=$GLOBALS['SchoolLogo'];
$fschoolbanner=$GLOBALS['schoolbanner'];

$this->Image($SchoolLogo1,12,11,17,16);
$this->Image($SchoolLogo1,162,11,17,16);

$this->Image($fschoolbanner,30,10,100,15);
$this->Image($fschoolbanner,180,10,100,15);

$this->Image($finalbox,35,35,23,6);
$this->Image($finalbox,78,35,20,6);
$this->Image($finalbox,112,35,25,6);
$this->Image($finalbox,186,35,23,6);
$this->Image($finalbox,230,35,20,6);
$this->Image($finalbox,263,35,25,6);


$this->Image($finalbbox,40,46,100,12);
$this->Image($finalbbox,190,46,100,12);

$this->Image($finalbox,27,58,15,6);
$this->Image($finalbox,53,58,17,6);
$this->Image($finalbox,84,58,23,6);
$this->Image($finalbox,123,58,15,6);

$this->Image($finalbox,177,58,15,6);
$this->Image($finalbox,203,58,18,6);
$this->Image($finalbox,235,58,23,6);
$this->Image($finalbox,273,58,15,6);

$this->SetFont('Arial','',10);
$this->Cell(130,33,"",1,0,"C");
$this->Cell(20,15,"",0,0,"C");
$this->Cell(130,33,"",1,0,"R");
$this->Cell(5,1,"",0,0,"R");
$this->Ln();
$this->SetFont('Arial','',8);
$this->Cell(130,5,"",0,0,"C");
$this->Cell(20,5,"",0,0,"C");
$this->Cell(130,5,"",0,0,"C");
$this->Ln();
$this->SetFont('Arial','',11);
$this->Cell(90,5,"",0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(90,5,"",0,0,"C");
$this->Ln();
$this->SetFont('Arial','B',11);
$this->Cell(90,5,"",0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(90,5,"",0,0,"C");
$this->Ln();
$this->SetFont('Arial','B',11);
$this->Cell(23,5,"",0,0,"C");
$this->Cell(90,5,"Office Copy",0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(55,5,"",0,0,"C");
$this->Cell(90,5,"Student's Copy",0,0,"C");
$this->Ln();
$this->SetFont('Arial','B',11);
$this->Cell(90,5,"",0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(90,5,"",0,0,"C");
$this->Ln();
$this->SetFont('Arial','B',10);
$this->Cell(5,5,"",0,0,"C");
$this->Cell(20,5,"Student ID",0,0,"L");
$this->Cell(26,5,$GLOBALS['stdid'],0,0,"C");
$this->Cell(15,5,"Memo No",0,0,"L");
$this->Cell(20,5,$GLOBALS['memo'],0,0,"C");
$this->Cell(15,5,"Date",0,0,"R");
$this->Cell(26,5,$GLOBALS['cdate'],0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(20,5,"",0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(20,5,"Student ID",0,0,"L");
$this->Cell(26,5,$GLOBALS['stdid'],0,0,"C");
$this->Cell(15,5,"Memo No",0,0,"L");
$this->Cell(20,5,$GLOBALS['memo'],0,0,"C");
$this->Cell(15,5,"Date",0,0,"R");
$this->Cell(25,5,$GLOBALS['cdate'],0,0,"C");
$this->Ln();
$this->Cell(5,2,"",0,5,"C");
$this->Cell(130,22,"",1,0,"C");
$this->Cell(20,5,"",0,0,"C");
$this->Cell(130,22,"",1,0,"C");
$this->Cell(5,2,"",0,5,"C");
$this->Ln();
$this->SetFont('Arial','B',10);
$this->Cell(5,5,"",0,0,"C");
$this->Cell(27,5,"Student Name",0,0,"L");
$this->Cell(93,5,$GLOBALS['name'],0,0,"L");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(20,5,"|",0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(27,5,"Student Name",0,0,"L");
$this->Cell(95,5,$GLOBALS['name'],0,0,"L");
$this->Ln();
$this->Cell(5,5,"",0,0,"C");
$this->Cell(27,5,"Contact No",0,0,"L");
$this->Cell(93,5,$GLOBALS['fmobile'],0,0,"L");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(20,5,"|",0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(27,5,"Contact No",0,0,"L");
$this->Cell(95,5,$GLOBALS['fmobile'],0,0,"L");
$this->Ln();
$this->Cell(5,1,"",0,5,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(13,5,"Class",0,0,"L");
$this->Cell(14,5,$GLOBALS['classname1'],0,0,"C");
$this->Cell(12,5,"Shift",0,0,"L");
$this->Cell(16,5,$GLOBALS['fnscshift'],0,0,"C");
$this->Cell(15,5,"Section",0,0,"L");
$this->Cell(23,5,$GLOBALS['sectionname1'],0,0,"C");
$this->Cell(15,5,"Roll No",0,0,"L");
$this->Cell(13,5,$GLOBALS['roll'],0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(20,5,"|",0,0,"C");
$this->Cell(4,5,"",0,0,"C");
$this->Cell(13,5,"Class",0,0,"L");
$this->Cell(14,5,$GLOBALS['classname1'],0,0,"C");
$this->Cell(12,5,"Shift",0,0,"L");
$this->Cell(16,5,$GLOBALS['fnscshift'],0,0,"C");
$this->Cell(15,5,"Section",0,0,"L");
$this->Cell(23,5,$GLOBALS['sectionname1'],0,0,"C");
$this->Cell(15,5,"Roll No",0,0,"L");
$this->Cell(13,5,$GLOBALS['roll'],0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Ln();
$this->Cell(5,2,"",0,5,"C");
$this->Cell(130,135,"",1,0,"C");
$this->Cell(20,5,"",0,0,"C");
$this->Cell(130,135,"",1,0,"C");
$this->Cell(5,1,"",0,5,"C");
$this->Ln();
$this->SetFont('Arial','B',10);
$this->Cell(5,1,"",0,5,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(100,5,"Description",1,0,"L");
$this->Cell(20,5,"Amount",1,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->SetFont('Arial','',8);
$this->Cell(20,5,"|",0,0,"C");
$this->SetFont('Arial','B',10);
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
    $this->Cell(50,5,"---------------------------------------",0,0,"C");
    $this->Cell(5,5,"",0,0,"C");
    $this->Cell(90,5,"",0,0,"L");
    $this->Cell(50,5,"---------------------------------------",0,0,"C");
    $this->Ln();
    $this->SetFont('Arial','B',8);
    $this->Cell(20,5,$GLOBALS['curdate'],0,0,"C");
    $this->Cell(20,5,$GLOBALS['curtime'],0,0,"C");
    $this->Cell(40,5,'',0,0,"L");
    $this->Cell(25,5,"Recevied by :",0,0,"R");
    $this->Cell(25,5,$GLOBALS['UserName'],0,0,"L");
    $this->Cell(20,5,"",0,0,"C");
    $this->Cell(20,5,$GLOBALS['curdate'],0,0,"C");
    $this->Cell(20,5,$GLOBALS['curtime'],0,0,"C");
    $this->Cell(30,5,'',0,0,"L");
    $this->Cell(25,5,"Recevied by :",0,0,"R");
    $this->Cell(25,5,$GLOBALS['UserName'],0,0,"L");
    // Page number
    //$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L');


				
					
 $result2 ="select * from borno_school_receipt where borno_school_id='$schId' and borno_school_memo='$memo'  order by  borno_school_fund_id ";
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


if ($stamount!=""){$stamount1=$stamount."/-";}else
{$stamount1=$stamount;}

$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,5,'',0,0,"L");
$pdf->Cell(100,5,"$fstfund $fstsubfund",1,0,"L");
$pdf->Cell(20,5,"$stamount1",1,0,"R");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(20,5,"|",0,0,"C");
$pdf->Cell(5,5,'',0,0,"L");
$pdf->Cell(100,5,"$fstfund $fstsubfund",1,0,"L");
$pdf->Cell(20,5,"$stamount1",1,0,"R");


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

$pdf->SetFont('Arial','B',12);
$pdf->Cell(5,5,'',0,0,"L");
$pdf->Cell(100,5,"Total Amount",1,0,"L");
$pdf->Cell(20,5,"$totalamount/-",1,0,"R");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(20,5,"|",0,0,"C");
$pdf->Cell(5,5,'',0,0,"L");
$pdf->Cell(100,5,"Total Amount",1,0,"L");
$pdf->Cell(20,5,"$totalamount/-",1,0,"R");					
$pdf->Ln();
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
   $finalAmount3=$result.$points."";
   $finalAmount2=substr(($finalAmount3),0,46); 
   $finalAmount3=substr(($finalAmount3),46,100);
//============================================================================
$pdf->SetFont('Arial','B',10.5);
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(120,5,"In word : $finalAmount2 Taka Only",0,0,"L");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(20,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(120,5,"In word : $finalAmount2 Taka Only",0,0,"L");

$code=$stdid1;

$pdf->Code128(20,180,$code,40,8);
$pdf->SetXY(50,45);


$pdf->Code128(170,180,$code,40,8);
$pdf->SetXY(50,45);

$pdf->Output();
?>