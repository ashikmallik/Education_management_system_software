<?php
$memo=$_POST['memo'];


include('expence_sett_top.php');


$gtmemo="select * from borno_school_receipt where borno_school_memo='$memo' group by borno_student_info_id asc";
					$qgstmemo=$mysqli->query($gtmemo);
					$shmemo=$qgstmemo->fetch_assoc();
					$stdid1=$shmemo['borno_student_info_id'];
					$cdate=$shmemo['borno_school_date'];
                    $cdate=date("d-M-Y",strtotime($cdate));
if($stdid!=$stdid1){goto lastline;}
$gtstdName ="select * from borno_student_info where borno_student_info_id='$stdid1'";
					$qgststdName=$mysqli->query($gtstdName);
					$shsstdname=$qgststdName->fetch_assoc();
					$branchId=$shsstdname['borno_school_branch_id'];
                    $newcl=$shsstdname['borno_school_class_id'];
                    $newsection=$shsstdname['borno_school_section_id'];	
                    $roll=$shsstdname['borno_school_roll'];
                    $name=$shsstdname['borno_school_student_name'];
                    $fmobile=substr($shsstdname['borno_school_phone'],2,11);
                    $mmobile=substr($shsstdname['borno_school_mother_phone'],2,11);
		            $bornoid=$shsstdname['borno_final_student_id'];		            


                    
$gtschoolName ="select * from borno_school where borno_school_id=1";
					$qgstschoolName=$mysqli->query($gtschoolName);
					$shschname=$qgstschoolName->fetch_assoc();
                    $fnschname=$shschname['borno_school_name'];

$gtbranchName ="select * from borno_school_branch where borno_school_branch_id=$branchId";
					$qgstbranchName=$mysqli->query($gtbranchName);
					$shbrname=$qgstbranchName->fetch_assoc();
                    $fnbranchname=$shbrname['borno_school_branch_name'];
                    





	
	 $gsectionName11 ="select * from borno_school_section where borno_school_section_id='$newsection'";
					$qgsectionName11=$mysqli->query($gsectionName11);
					$shsectionname11=$qgsectionName11->fetch_assoc();
					$sectionname1=$shsectionname11['borno_school_section_name'];
					

	 $gsectionName13 ="select * from borno_school_class where borno_school_class_id='$newcl'";
					$qgsectionName13=$mysqli->query($gsectionName13);
					$shsectionname13=$qgsectionName13->fetch_assoc();
					$classname1=$shsectionname13['borno_school_class_name'];
					

//=========================Add Student Info==============================
$finalSchoolLogo="frii.jpg";
require('../../fpdf/fpdf.php');
class PDF extends FPDF
{
// Page header
function Header()
{
$finalSchoolLogo1=$GLOBALS['finalSchoolLogo'];    
$this->Image($finalSchoolLogo1,15,13,70,10);
$this->Image($finalSchoolLogo1,110,13,70,10);
$this->Image($finalSchoolLogo1,205,13,70,10);
$this->Cell(80,15,"",1,0,"R");
$this->Cell(15,15,"",0,0,"C");
$this->Cell(80,15,"",1,0,"R");
$this->Cell(15,15,"",0,0,"C");
$this->Cell(80,15,"",1,0,"R");
$this->Cell(15,1,"",0,0,"C");
$this->Ln();
$this->SetFont('Arial','',8);
$this->Cell(80,5,"Office Copy",0,0,"R");
$this->Cell(15,5,"",0,0,"C");
$this->Cell(80,5,"Teacher Copy",0,0,"R");
$this->Cell(15,5,"",0,0,"C");
$this->Cell(80,5,"Student Copy",0,0,"R");
$this->Ln();
$this->SetFont('Arial','',11);
$this->Cell(90,5,"",0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(90,5,"",0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(90,5,"",0,0,"C");
$this->Ln();
$this->SetFont('Arial','B',11);
$this->Cell(90,5,"",0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(90,5,"",0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(90,4,"",0,0,"C");
$this->Ln();
$this->Cell(80,175,"",1,0,"R");
$this->Cell(15,175,"",0,0,"C");
$this->Cell(80,175,"",1,0,"R");
$this->Cell(15,175,"",0,0,"C");
$this->Cell(80,175,"",1,0,"R");
$this->Cell(15,1,"",0,0,"C");
$this->Ln();
$this->SetFont('Arial','B',8);
$this->Cell(5,5,"",0,0,"C");
$this->Cell(20,5,"Memo No : ",0,0,"L");
$this->Cell(20,5,$GLOBALS['memo'],0,0,"L");
$this->Cell(13,5,"Date : ",0,0,"L");
$this->Cell(27,5,$GLOBALS['cdate'],0,0,"L");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(20,5,"Memo No : ",0,0,"L");
$this->Cell(20,5,$GLOBALS['memo'],0,0,"L");
$this->Cell(13,5,"Date : ",0,0,"L");
$this->Cell(27,5,$GLOBALS['cdate'],0,0,"L");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(20,5,"Memo No : ",0,0,"L");
$this->Cell(20,5,$GLOBALS['memo'],0,0,"L");
$this->Cell(13,5,"Date : ",0,0,"L");
$this->Cell(27,5,$GLOBALS['cdate'],0,0,"L");
$this->Ln();
$this->Cell(5,5,"",0,0,"C");
$this->Cell(70,11,"",1,0,"R");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(15,11,"",0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(70,11,"",1,0,"R");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(15,11,"",0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(70,11,"",1,0,"R");
$this->Cell(15,1,"",0,0,"C");
$this->Ln();
$this->SetFont('Arial','B',8);
$this->Cell(5,5,"",0,0,"C");
$this->Cell(25,5,"Student Name   : ",0,0,"L");
$this->Cell(55,5,$GLOBALS['name'],0,0,"L");
$this->Cell(5,5,"|",0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(25,5,"Student Name   : ",0,0,"L");
$this->Cell(55,5,$GLOBALS['name'],0,0,"L");
$this->Cell(5,5,"|",0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(25,5,"Student Name   : ",0,0,"L");
$this->Cell(55,5,$GLOBALS['name'],0,0,"L");
$this->Ln();
$this->Cell(5,5,"",0,0,"C");
$this->Cell(25,5,"Contact No        : ",0,0,"L");
$this->Cell(18,5,$GLOBALS['fmobile'],0,0,"L");
$this->Cell(5,5,",",0,0,"L");
$this->Cell(32,5,$GLOBALS['mmobile'],0,0,"L");
$this->Cell(5,5,"|",0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(25,5,"Contact No        : ",0,0,"L");
$this->Cell(18,5,$GLOBALS['fmobile'],0,0,"L");
$this->Cell(5,5,",",0,0,"L");
$this->Cell(32,5,$GLOBALS['mmobile'],0,0,"L");
$this->Cell(5,5,"|",0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(25,5,"Contact No        : ",0,0,"L");
$this->Cell(18,5,$GLOBALS['fmobile'],0,0,"L");
$this->Cell(5,5,",",0,0,"L");
$this->Cell(32,5,$GLOBALS['mmobile'],0,0,"L");
$this->Ln();
$this->Cell(5,5,"",0,0,"C");
$this->Cell(12,5,"Class : ",0,0,"L");
$this->Cell(23,5,$GLOBALS['classname1'],0,0,"L");
$this->Cell(15,5,"Section : ",0,0,"L");
$this->Cell(20,5,$GLOBALS['sectionname1'],0,0,"L");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(15,5,"|",0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(12,5,"Class : ",0,0,"L");
$this->Cell(23,5,$GLOBALS['classname1'],0,0,"L");
$this->Cell(15,5,"Section : ",0,0,"L");
$this->Cell(20,5,$GLOBALS['sectionname1'],0,0,"L");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(15,5,"|",0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(12,5,"Class : ",0,0,"L");
$this->Cell(23,5,$GLOBALS['classname1'],0,0,"L");
$this->Cell(15,5,"Section : ",0,0,"L");
$this->Cell(20,5,$GLOBALS['sectionname1'],0,0,"L");
$this->Cell(5,5,"",0,0,"C");
$this->Ln();
$this->Cell(5,5,"",0,0,"C");
$this->Cell(15,5,"Roll No : ",0,0,"L");
$this->Cell(10,5,$GLOBALS['roll'],0,0,"L");
$this->Cell(12,5,"Place : ",0,0,"L");
$this->Cell(33,5,$GLOBALS['fnbranchname'],0,0,"L");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(15,5,"|",0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(15,5,"Roll No : ",0,0,"L");
$this->Cell(10,5,$GLOBALS['roll'],0,0,"L");
$this->Cell(12,5,"Place : ",0,0,"L");
$this->Cell(33,5,$GLOBALS['fnbranchname'],0,0,"L");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(15,5,"|",0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->Cell(15,5,"Roll No : ",0,0,"L");
$this->Cell(10,5,$GLOBALS['roll'],0,0,"L");
$this->Cell(12,5,"Place : ",0,0,"L");
$this->Cell(33,5,$GLOBALS['fnbranchname'],0,0,"L");
$this->Ln();
$this->Cell(5,5,"",0,0,"C");
$this->Cell(55,5,"Description",1,0,"L");
$this->Cell(15,5,"Amount",1,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->SetFont('Arial','',8);
$this->Cell(15,5,"|",0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->SetFont('Arial','B',8);
$this->Cell(55,5,"Description",1,0,"L");
$this->Cell(15,5,"Amount",1,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->SetFont('Arial','',8);
$this->Cell(15,5,"|",0,0,"C");
$this->Cell(5,5,"",0,0,"C");
$this->SetFont('Arial','B',8);
$this->Cell(55,5,"Description",1,0,"L");
$this->Cell(15,5,"Amount",1,0,"C");
$this->Ln();
	
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-25);
    // Arial italic 8
    $this->Cell(40,5,"",0,0,"L");
    $this->Cell(50,5,"--------------------------",0,0,"C");
    $this->Cell(5,5,"",0,0,"C");
    $this->Cell(40,5,"",0,0,"L");
    $this->Cell(50,5,"--------------------------",0,0,"C");
    $this->Cell(5,5,"",0,0,"C");
    $this->Cell(40,5,"",0,0,"L");
    $this->Cell(50,5,"--------------------------",0,0,"C");
    $this->Ln();
    $this->SetFont('Arial','B',8);
    $this->Cell(40,5,"",0,0,"L");
    $this->Cell(50,5,"Received By",0,0,"C");
    $this->Cell(5,5,"",0,0,"C");
    $this->Cell(40,5,"",0,0,"L");
    $this->Cell(50,5,"Received By",0,0,"C");
    $this->Cell(5,5,"",0,0,"C");
    $this->Cell(40,5,"",0,0,"L");
    $this->Cell(50,5,"Received By",0,0,"C");
    // Page number
    //$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage(L);
$gtmemo1="select * from borno_school_receipt where borno_school_memo='$memo' AND borno_school_fund_id=1 AND borno_school_sub_fund_id=1";
					$qgstmemo1=$mysqli->query($gtmemo1);
					$shmemo1=$qgstmemo1->fetch_assoc();
$tuition1=$shmemo1['borno_school_fee'];

$gtmemo2="select * from borno_school_receipt where borno_school_memo='$memo' AND borno_school_fund_id=1 AND borno_school_sub_fund_id=2";
					$qgstmemo2=$mysqli->query($gtmemo2);
					$shmemo2=$qgstmemo2->fetch_assoc();
$tuition2=$shmemo2['borno_school_fee'];
					
$gtmemo3="select * from borno_school_receipt where borno_school_memo='$memo' AND borno_school_fund_id=1 AND borno_school_sub_fund_id=3";
					$qgstmemo3=$mysqli->query($gtmemo3);
					$shmemo3=$qgstmemo3->fetch_assoc();
$tuition3=$shmemo3['borno_school_fee'];

$gtmemo4="select * from borno_school_receipt where borno_school_memo='$memo' AND borno_school_fund_id=1 AND borno_school_sub_fund_id=4";
					$qgstmemo4=$mysqli->query($gtmemo4);
					$shmemo4=$qgstmemo4->fetch_assoc();
$tuition4=$shmemo4['borno_school_fee'];

$gtmemo5="select * from borno_school_receipt where borno_school_memo='$memo' AND borno_school_fund_id=1 AND borno_school_sub_fund_id=5";
					$qgstmemo5=$mysqli->query($gtmemo5);
					$shmemo5=$qgstmemo5->fetch_assoc();
$tuition5=$shmemo5['borno_school_fee'];

$gtmemo6="select * from borno_school_receipt where borno_school_memo='$memo' AND borno_school_fund_id=1 AND borno_school_sub_fund_id=6";
					$qgstmemo6=$mysqli->query($gtmemo6);
					$shmemo6=$qgstmemo6->fetch_assoc();
$tuition6=$shmemo6['borno_school_fee'];

$gtmemo7="select * from borno_school_receipt where borno_school_memo='$memo' AND borno_school_fund_id=1 AND borno_school_sub_fund_id=7";
					$qgstmemo7=$mysqli->query($gtmemo7);
					$shmemo7=$qgstmemo7->fetch_assoc();
$tuition7=$shmemo7['borno_school_fee'];

$gtmemo8="select * from borno_school_receipt where borno_school_memo='$memo' AND borno_school_fund_id=1 AND borno_school_sub_fund_id=8";
					$qgstmemo8=$mysqli->query($gtmemo8);
					$shmemo8=$qgstmemo8->fetch_assoc();
$tuition8=$shmemo8['borno_school_fee'];

$gtmemo9="select * from borno_school_receipt where borno_school_memo='$memo' AND borno_school_fund_id=1 AND borno_school_sub_fund_id=9";
					$qgstmemo9=$mysqli->query($gtmemo9);
					$shmemo9=$qgstmemo9->fetch_assoc();
$tuition9=$shmemo9['borno_school_fee'];

$gtmemo10="select * from borno_school_receipt where borno_school_memo='$memo' AND borno_school_fund_id=1 AND borno_school_sub_fund_id=10";
					$qgstmemo10=$mysqli->query($gtmemo10);
					$shmemo10=$qgstmemo10->fetch_assoc();
$tuition10=$shmemo10['borno_school_fee'];

$gtmemo11="select * from borno_school_receipt where borno_school_memo='$memo' AND borno_school_fund_id=1 AND borno_school_sub_fund_id=11";
					$qgstmemo11=$mysqli->query($gtmemo11);
					$shmemo11=$qgstmemo11->fetch_assoc();
$tuition11=$shmemo11['borno_school_fee'];

$gtmemo12="select * from borno_school_receipt where borno_school_memo='$memo' AND borno_school_fund_id=1 AND borno_school_sub_fund_id=12";
					$qgstmemo12=$mysqli->query($gtmemo12);
					$shmemo12=$qgstmemo12->fetch_assoc();
$tuition12=$shmemo12['borno_school_fee'];

$tuitionfee1=$tuition1+$tuition2+$tuition3+$tuition4+$tuition5+$tuition6+$tuition7+$tuition8+$tuition9+$tuition10+$tuition11+$tuition12;
if($tuitionfee1=="" OR $tuitionfee1==0)
{
$tuitionfee="";
}
else
{
$tuitionfee="$tuitionfee1/-";
}

$gtmonth="select * from borno_school_receipt where borno_school_memo='$memo' AND borno_school_fund_id=1 order by borno_school_sub_fund_id asc";
					$qgtmonth=$mysqli->query($gtmonth);
					$sl=0;
					while($shmonth=$qgtmonth->fetch_assoc()){$sl++;
					$subfundid=$shmonth['borno_school_sub_fund_id'];
					
					if($subfundid==1){$sfname="January";}
					if($subfundid==2){$sfname="February";}
					if($subfundid==3){$sfname="March";}
					if($subfundid==4){$sfname="April";}
					if($subfundid==5){$sfname="May";}
					if($subfundid==6){$sfname="June";}
					if($subfundid==7){$sfname="July";}
					if($subfundid==8){$sfname="August";}
					if($subfundid==9){$sfname="September";}
					if($subfundid==10){$sfname="October";}
					if($subfundid==11){$sfname="November";}
					if($subfundid==12){$sfname="December";}
                    
                    if($sl==1)
                    {
                    $subid1=$subfundid; 
                    $subfname1=$sfname;
                    }
					elseif($sl==2)
                    {
                    $subid2=$subfundid;
                    $subfname2=$sfname;
                    } 
					elseif($sl==3)
                    {
                    $subid3=$subfundid; 
                    $subfname3=$sfname;
                    }
					elseif($sl==4)
                    {
                    $subid4=$subfundid; 
                    $subfname4=$sfname;
                    }
					elseif($sl==5)
                    {
                    $subid5=$subfundid; 
                    $subfname5=$sfname;
                    }
					elseif($sl==6)
                    {
                    $subid6=$subfundid;  
                    $subfname6=$sfname;
                    }
					elseif($sl==7)
                    {
                    $subid7=$subfundid;
                    $subfname7=$sfname;
                    }
					elseif($sl==8)
                    {
                    $subid8=$subfundid;
                    $subfname8=$sfname;
                    }
					elseif($sl==9)
                    {
                    $subid9=$subfundid; 
                    $subfname9=$sfname;
                    }
					elseif($sl==10)
                    {
                    $subid10=$subfundid;
                    $subfname10=$sfname;
                    }
					elseif($sl==11)
                    {
                    $subid11=$subfundid; 
                    $subfname11=$sfname;
                    } 
					elseif($sl==12)
                    {
                    $subid12=$subfundid;  
                    $subfname12=$sfname;
                    }                       
					}
if($sl==1){$ttfm=$subfname1;}					
elseif($sl==2){$ttfm="$subfname1-$subfname2";}
elseif($sl==3){$ttfm="$subfname1-$subfname3";}
elseif($sl==4){$ttfm="$subfname1-$subfname4";}
elseif($sl==5){$ttfm="$subfname1-$subfname5";}
elseif($sl==6){$ttfm="$subfname1-$subfname6";}
elseif($sl==7){$ttfm="$subfname1-$subfname7";}
elseif($sl==8){$ttfm="$subfname1-$subfname8";}
elseif($sl==9){$ttfm="$subfname1-$subfname9";}
elseif($sl==10){$ttfm="$subfname1-$subfname10";}
elseif($sl==11){$ttfm="$subfname1-$subfname11";}
elseif($sl==12){$ttfm="$subfname1-$subfname12";}
$pdf->SetFont('Arial','',8);
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Tuition Fee $ttfm",1,0,"L");
$pdf->Cell(15,5,"$tuitionfee",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Tuition Fee $ttfm",1,0,"L");
$pdf->Cell(15,5,"$tuitionfee",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Tuition Fee $ttfm",1,0,"L");
$pdf->Cell(15,5,"$tuitionfee",1,0,"C");
$pdf->Ln();

$gtmemo13="select * from borno_school_receipt where borno_school_memo='$memo' AND borno_school_fund_id=2 AND borno_school_sub_fund_id=0";
					$qgstmemo13=$mysqli->query($gtmemo13);
					$shmemo13=$qgstmemo13->fetch_assoc();
$admission1=$shmemo13['borno_school_fee'];

if($admission1=="" OR $admission1==0)
{
$admission="";     
}
else
{
$admission="$admission1/-";   
}
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Admission Fee ",1,0,"L");
$pdf->Cell(15,5,"$admission",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Admission Fee ",1,0,"L");
$pdf->Cell(15,5,"$admission",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Admission Fee ",1,0,"L");
$pdf->Cell(15,5,"$admission",1,0,"C");
$pdf->Ln();

$gtmemo14="select * from borno_school_receipt where borno_school_memo='$memo' AND borno_school_fund_id=3 AND borno_school_sub_fund_id=0";
					$qgstmemo14=$mysqli->query($gtmemo14);
					$shmemo14=$qgstmemo14->fetch_assoc();
$session1=$shmemo14['borno_school_fee'];

if($session1=="" OR $session1==0)
{
$session="";    
}
else
{
$session="$session1/-";    
}
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Session Charge 2019",1,0,"L");
$pdf->Cell(15,5,"$session",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Session Charge 2019",1,0,"L");
$pdf->Cell(15,5,"$session",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Session Charge 2019",1,0,"L");
$pdf->Cell(15,5,"$session",1,0,"C");
$pdf->Ln();

$gtmemo15="select * from borno_school_receipt where borno_school_memo='$memo' AND borno_school_fund_id=6 AND borno_school_sub_fund_id=0";
					$qgstmemo15=$mysqli->query($gtmemo15);
					$shmemo15=$qgstmemo15->fetch_assoc();
$areardue1=$shmemo15['borno_school_fee'];

if($areardue1=="" OR $areardue1==0)
{
$areardue="";    
}
else
{
$areardue="$areardue1/-";    
}

$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Arear Due",1,0,"L");
$pdf->Cell(15,5,"$areardue",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Arear Due",1,0,"L");
$pdf->Cell(15,5,"$areardue",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Arear Due",1,0,"L");
$pdf->Cell(15,5,"$areardue",1,0,"C");
$pdf->Ln();
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Advance Tuition Fee",1,0,"L");
$pdf->Cell(15,5,"",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Advance Tuition Fee",1,0,"L");
$pdf->Cell(15,5,"",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Advance Tuition Fee",1,0,"L");
$pdf->Cell(15,5,"",1,0,"C");
$pdf->Ln();
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Delay Fine",1,0,"L");
$pdf->Cell(15,5,"",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Delay Fine",1,0,"L");
$pdf->Cell(15,5,"",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Delay Fine",1,0,"L");
$pdf->Cell(15,5,"",1,0,"C");
$pdf->Ln();
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Absence Fine",1,0,"L");
$pdf->Cell(15,5,"",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Absence Fine",1,0,"L");
$pdf->Cell(15,5,"",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Absence Fine",1,0,"L");
$pdf->Cell(15,5,"",1,0,"C");
$pdf->Ln();
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Exam Fee",1,0,"L");
$pdf->Cell(15,5,"",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Exam Fee",1,0,"L");
$pdf->Cell(15,5,"",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Exam Fee",1,0,"L");
$pdf->Cell(15,5,"",1,0,"C");
$pdf->Ln();

$gtmemo20="select * from borno_school_receipt where borno_school_memo='$memo' AND borno_school_fund_id=4 AND borno_school_sub_fund_id=0";
					$qgstmemo20=$mysqli->query($gtmemo20);
					$shmemo20=$qgstmemo20->fetch_assoc();
$diary1=$shmemo20['borno_school_fee'];

if($diary1=="" OR $diary1==0)
{
$diary="";    
}
else
{
$diary="$diary1/-";    
}

$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Diary, Syllabus, Calendar,ID Card",1,0,"L");
$pdf->Cell(15,5,"$diary",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Diary, Syllabus, Calendar,ID Card",1,0,"L");
$pdf->Cell(15,5,"$diary",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Diary, Syllabus, Calendar,ID Card",1,0,"L");
$pdf->Cell(15,5,"$diary",1,0,"C");
$pdf->Ln();

$gtmemo21="select * from borno_school_receipt where borno_school_memo='$memo' AND borno_school_fund_id=5 AND borno_school_sub_fund_id=0";
					$qgstmemo21=$mysqli->query($gtmemo21);
					$shmemo21=$qgstmemo21->fetch_assoc();
$ict1=$shmemo21['borno_school_fee'];

if($ict1=="" OR $ict1==0)
{
$ict="";    
}
else
{
$ict="$ict1/-";    
}

$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"ICT Fee",1,0,"L");
$pdf->Cell(15,5,"$ict",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"ICT Fee",1,0,"L");
$pdf->Cell(15,5,"$ict",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"ICT Fee",1,0,"L");
$pdf->Cell(15,5,"$ict",1,0,"C");
$pdf->Ln();
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Sports",1,0,"L");
$pdf->Cell(15,5,"",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Sports",1,0,"L");
$pdf->Cell(15,5,"",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Sports",1,0,"L");
$pdf->Cell(15,5,"",1,0,"C");
$pdf->Ln();
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Library",1,0,"L");
$pdf->Cell(15,5,"",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Library",1,0,"L");
$pdf->Cell(15,5,"",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Library",1,0,"L");
$pdf->Cell(15,5,"",1,0,"C");
$pdf->Ln();
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Health Treatment",1,0,"L");
$pdf->Cell(15,5,"",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Health Treatment",1,0,"L");
$pdf->Cell(15,5,"",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Health Treatment",1,0,"L");
$pdf->Cell(15,5,"",1,0,"C");
$pdf->Ln();
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Magazine",1,0,"L");
$pdf->Cell(15,5,"",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Magazine",1,0,"L");
$pdf->Cell(15,5,"",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Magazine",1,0,"L");
$pdf->Cell(15,5,"",1,0,"C");
$pdf->Ln();
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Boy Scouts/Girls Guide",1,0,"L");
$pdf->Cell(15,5,"",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Boy Scouts/Girls Guide",1,0,"L");
$pdf->Cell(15,5,"",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Boy Scouts/Girls Guide",1,0,"L");
$pdf->Cell(15,5,"",1,0,"C");
$pdf->Ln();
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Religious Program",1,0,"L");
$pdf->Cell(15,5,"",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Religious Program",1,0,"L");
$pdf->Cell(15,5,"",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Religious Program",1,0,"L");
$pdf->Cell(15,5,"",1,0,"C");
$pdf->Ln();
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Registration Fee",1,0,"L");
$pdf->Cell(15,5,"",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Registration Fee",1,0,"L");
$pdf->Cell(15,5,"",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Registration Fee",1,0,"L");
$pdf->Cell(15,5,"",1,0,"C");
$pdf->Ln();
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Testimonial Fee",1,0,"L");
$pdf->Cell(15,5,"",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Testimonial Fee",1,0,"L");
$pdf->Cell(15,5,"",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Testimonial Fee",1,0,"L");
$pdf->Cell(15,5,"",1,0,"C");
$pdf->Ln();

$gtmemo30="select * from borno_school_receipt where borno_school_memo='$memo' AND borno_school_fund_id=7 AND borno_school_sub_fund_id=0";
					$qgstmemo30=$mysqli->query($gtmemo30);
					$shmemo30=$qgstmemo30->fetch_assoc();
$tc1=$shmemo30['borno_school_fee'];

if($tc1=="" OR $tc1==0)
{
$tc="";    
}
else
{
$tc="$tc1/-";    
}

$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"TC Fee",1,0,"L");
$pdf->Cell(15,5,"$tc",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"TC Fee",1,0,"L");
$pdf->Cell(15,5,"$tc",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"TC Fee",1,0,"L");
$pdf->Cell(15,5,"$tc",1,0,"C");
$pdf->Ln();
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Board/Centre Fee",1,0,"L");
$pdf->Cell(15,5,"",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Board/Centre Fee",1,0,"L");
$pdf->Cell(15,5,"",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Board/Centre Fee",1,0,"L");
$pdf->Cell(15,5,"",1,0,"C");
$pdf->Ln();

$gtmemo32="select * from borno_school_receipt where borno_school_memo='$memo' AND borno_school_fund_id=8 AND borno_school_sub_fund_id=0";
					$qgstmemo32=$mysqli->query($gtmemo32);
					$shmemo32=$qgstmemo32->fetch_assoc();
$others1=$shmemo32['borno_school_fee'];

if($others1=="" OR $others1==0)
{
$others="";    
}
else
{
$others="$others1/-";    
}

$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Others",1,0,"L");
$pdf->Cell(15,5,"$others",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Others",1,0,"L");
$pdf->Cell(15,5,"$others",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Others",1,0,"L");
$pdf->Cell(15,5,"$others",1,0,"C");
$pdf->Ln();

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
$pdf->Cell(55,5,"Total = ",1,0,"R");
$pdf->Cell(15,5,"$totalamount/-",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Total = ",1,0,"R");
$pdf->Cell(15,5,"$totalamount/-",1,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(55,5,"Total = ",1,0,"R");
$pdf->Cell(15,5,"$totalamount/-",1,0,"C");
$pdf->Ln();

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
   $finalAmount="Taka ".$result.$points." only";

//============================================================================	

$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(70,5,"In word: $finalAmount",0,0,"L");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(70,5,"In word: $finalAmount",0,0,"L");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(15,5,"|",0,0,"C");
$pdf->Cell(5,5,"",0,0,"C");
$pdf->Cell(70,5,"In word: $finalAmount",0,0,"L");
$pdf->Ln();
lastline:
$pdf->Output();
?>