<?php

$branchId=$_GET['branchId'];
$studClass=$_GET['studClass'];
$shiftId=$_GET['shiftId'];
$section=$_GET['section'];
$stsess=trim($_GET['stsess']);

include('report_sett_top.php');

$gtschoolName ="select * from borno_school where borno_school_id=1";
					$qgstschoolName=$mysqli->query($gtschoolName);
					$shschname=$qgstschoolName->fetch_assoc();
                    $fnschname=$shschname['borno_school_name'];

$gtbranchName ="select * from borno_school_branch where borno_school_branch_id=$branchId";
					$qgstbranchName=$mysqli->query($gtbranchName);
					$shbrname=$qgstbranchName->fetch_assoc();
                    $fnbranchname=$shbrname['borno_school_branch_name'];
                    $branchname="Branch : $fnbranchname";


$gtClassName ="select * from borno_school_class where borno_school_class_id='$studClass'";
					$qgstClassName=$mysqli->query($gtClassName);
					$stClassName=$qgstClassName->fetch_assoc();
                    $fstClassName=$stClassName['borno_school_class_name'];
                    $classname="Class : $fstClassName";

$gtshift = "select * from borno_school_shift where borno_school_shift_id='$shiftId'";
					$qgstshift=$mysqli->query($gtshift);
					$stgtshift=$qgstshift->fetch_assoc();
                    $fstshift=$stgtshift['borno_school_shift_name'];
                    $shiftname="Shift : $fstshift";
                    
$gtsection = "select * from borno_school_section where  borno_school_section_id='$section' AND `year` = '$stsess'";
					$qgstsection=$mysqli->query($gtsection);
					$stgtsection=$qgstsection->fetch_assoc();
                    $fstsection=$stgtsection['borno_school_section_name'];
                    $sectionname="Section : $fstsection";


//  $gstdbal ="select * from borno_school_balance where borno_school_section_id='$section' AND borno_school_session='$stsess' group by borno_school_fund_id,borno_school_sub_fund_id asc";
// 					$qgstdbal=$mysqli->query($gstdbal);
// 					$sl=0;
// 					while($shstdbal=$qgstdbal->fetch_assoc()){$sl++;
					
// 					if($sl==1)
// 					{
// 					$fundid1=$shstdbal['borno_school_fund_id']; 
// 					$subfundid1=$shstdbal['borno_school_sub_fund_id'];
// 	                if($subfundid1!=0)
// 	                {
// $gtsubfund1 = "select * from borno_school_sub_fund where borno_school_fund_id='$fundid1' AND borno_school_sub_fund_id='$subfundid1'";
// 					$qgstsubfund1=$mysqli->query($gtsubfund1);
// 					$stgtsubfund1=$qgstsubfund1->fetch_assoc();	               
// 					$fundname1=substr($stgtsubfund1['sub_fund_name'],0,3);
// 	                }
// 	                else
// 	                {
// $gtsubfund1 = "select * from borno_school_fund where borno_school_fund_id='$fundid1'";
// 					$qgstsubfund1=$mysqli->query($gtsubfund1);
// 					$stgtsubfund1=$qgstsubfund1->fetch_assoc();	               
// 					$fundname1=substr($stgtsubfund1['borno_school_fund_name'],0,3);	   
// 	                }
// 					}
					
// 					if($sl==2)
// 					{
// 					$fundid2=$shstdbal['borno_school_fund_id']; 
// 					$subfundid2=$shstdbal['borno_school_sub_fund_id'];
// 	                if($subfundid2!=0)
// 	                {
// $gtsubfund2 = "select * from borno_school_sub_fund where borno_school_fund_id='$fundid2' AND borno_school_sub_fund_id='$subfundid2'";
// 					$qgstsubfund2=$mysqli->query($gtsubfund2);
// 					$stgtsubfund2=$qgstsubfund2->fetch_assoc();	               
// 					$fundname2=substr($stgtsubfund2['sub_fund_name'],0,3);
// 	                }
// 	                else
// 	                {
// $gtsubfund2 = "select * from borno_school_fund where borno_school_fund_id='$fundid2'";
// 					$qgstsubfund2=$mysqli->query($gtsubfund2);
// 					$stgtsubfund2=$qgstsubfund2->fetch_assoc();	               
// 					$fundname2=substr($stgtsubfund2['borno_school_fund_name'],0,3);	   
// 	                }
// 					}	
					
//                     if($sl==3)
// 					{
// 					$fundid3=$shstdbal['borno_school_fund_id']; 
// 					$subfundid3=$shstdbal['borno_school_sub_fund_id'];
// 	                if($subfundid3!=0)
// 	                {
// $gtsubfund3 = "select * from borno_school_sub_fund where borno_school_fund_id='$fundid3' AND borno_school_sub_fund_id='$subfundid3'";
// 					$qgstsubfund3=$mysqli->query($gtsubfund3);
// 					$stgtsubfund3=$qgstsubfund3->fetch_assoc();	               
// 					$fundname3=substr($stgtsubfund3['sub_fund_name'],0,3);
// 	                }
// 	                else
// 	                {
// $gtsubfund3 = "select * from borno_school_fund where borno_school_fund_id='$fundid3'";
// 					$qgstsubfund3=$mysqli->query($gtsubfund3);
// 					$stgtsubfund3=$qgstsubfund3->fetch_assoc();	               
// 					$fundname3=substr($stgtsubfund3['borno_school_fund_name'],0,3);	   
// 	                }
// 					}	
					
//                     if($sl==4)
// 					{
// 					$fundid4=$shstdbal['borno_school_fund_id']; 
// 					$subfundid4=$shstdbal['borno_school_sub_fund_id'];
// 	                if($subfundid4!=0)
// 	                {
// $gtsubfund4 = "select * from borno_school_sub_fund where borno_school_fund_id='$fundid4' AND borno_school_sub_fund_id='$subfundid4'";
// 					$qgstsubfund4=$mysqli->query($gtsubfund4);
// 					$stgtsubfund4=$qgstsubfund4->fetch_assoc();	               
// 					$fundname4=substr($stgtsubfund4['sub_fund_name'],0,3);
// 	                }
// 	                else
// 	                {
// $gtsubfund4 = "select * from borno_school_fund where borno_school_fund_id='$fundid4'";
// 					$qgstsubfund4=$mysqli->query($gtsubfund4);
// 					$stgtsubfund4=$qgstsubfund4->fetch_assoc();	               
// 					$fundname4=substr($stgtsubfund4['borno_school_fund_name'],0,3);	   
// 	                }
// 					}
					
//                     if($sl==5)
// 					{
// 					$fundid5=$shstdbal['borno_school_fund_id']; 
// 					$subfundid5=$shstdbal['borno_school_sub_fund_id'];
// 	                if($subfundid5!=0)
// 	                {
// $gtsubfund5 = "select * from borno_school_sub_fund where borno_school_fund_id='$fundid5' AND borno_school_sub_fund_id='$subfundid5'";
// 					$qgstsubfund5=$mysqli->query($gtsubfund5);
// 					$stgtsubfund5=$qgstsubfund5->fetch_assoc();	               
// 					$fundname5=substr($stgtsubfund5['sub_fund_name'],0,3);
// 	                }
// 	                else
// 	                {
// $gtsubfund5 = "select * from borno_school_fund where borno_school_fund_id='$fundid5'";
// 					$qgstsubfund5=$mysqli->query($gtsubfund5);
// 					$stgtsubfund5=$qgstsubfund5->fetch_assoc();	               
// 					$fundname5=substr($stgtsubfund5['borno_school_fund_name'],0,3);	   
// 	                }
// 					}					

//                     if($sl==6)
// 					{
// 					$fundid6=$shstdbal['borno_school_fund_id']; 
// 					$subfundid6=$shstdbal['borno_school_sub_fund_id'];
// 	                if($subfundid6!=0)
// 	                {
// $gtsubfund6 = "select * from borno_school_sub_fund where borno_school_fund_id='$fundid6' AND borno_school_sub_fund_id='$subfundid6'";
// 					$qgstsubfund6=$mysqli->query($gtsubfund6);
// 					$stgtsubfund6=$qgstsubfund6->fetch_assoc();	               
// 					$fundname6=substr($stgtsubfund6['sub_fund_name'],0,3);
// 	                }
// 	                else
// 	                {
// $gtsubfund6 = "select * from borno_school_fund where borno_school_fund_id='$fundid6'";
// 					$qgstsubfund6=$mysqli->query($gtsubfund6);
// 					$stgtsubfund6=$qgstsubfund6->fetch_assoc();	               
// 					$fundname6=substr($stgtsubfund6['borno_school_fund_name'],0,3);	   
// 	                }
// 					}					

//                     if($sl==7)
// 					{
// 					$fundid7=$shstdbal['borno_school_fund_id']; 
// 					$subfundid7=$shstdbal['borno_school_sub_fund_id'];
// 	                if($subfundid7!=0)
// 	                {
// $gtsubfund7 = "select * from borno_school_sub_fund where borno_school_fund_id='$fundid7' AND borno_school_sub_fund_id='$subfundid7'";
// 					$qgstsubfund7=$mysqli->query($gtsubfund7);
// 					$stgtsubfund7=$qgstsubfund7->fetch_assoc();	               
// 					$fundname7=substr($stgtsubfund7['sub_fund_name'],0,3);
// 	                }
// 	                else
// 	                {
// $gtsubfund7 = "select * from borno_school_fund where borno_school_fund_id='$fundid7'";
// 					$qgstsubfund7=$mysqli->query($gtsubfund7);
// 					$stgtsubfund7=$qgstsubfund7->fetch_assoc();	               
// 					$fundname7=substr($stgtsubfund7['borno_school_fund_name'],0,3);	   
// 	                }
// 					}
					
//                     if($sl==8)
// 					{
// 					$fundid8=$shstdbal['borno_school_fund_id']; 
// 					$subfundid8=$shstdbal['borno_school_sub_fund_id'];
// 	                if($subfundid8!=0)
// 	                {
// $gtsubfund8 = "select * from borno_school_sub_fund where borno_school_fund_id='$fundid8' AND borno_school_sub_fund_id='$subfundid8'";
// 					$qgstsubfund8=$mysqli->query($gtsubfund8);
// 					$stgtsubfund8=$qgstsubfund8->fetch_assoc();	               
// 					$fundname8=substr($stgtsubfund8['sub_fund_name'],0,3);
// 	                }
// 	                else
// 	                {
// $gtsubfund8 = "select * from borno_school_fund where borno_school_fund_id='$fundid8'";
// 					$qgstsubfund8=$mysqli->query($gtsubfund8);
// 					$stgtsubfund8=$qgstsubfund8->fetch_assoc();	               
// 					$fundname8=substr($stgtsubfund8['borno_school_fund_name'],0,3);	   
// 	                }
// 					}	
					
//                     if($sl==9)
// 					{
// 					$fundid9=$shstdbal['borno_school_fund_id']; 
// 					$subfundid9=$shstdbal['borno_school_sub_fund_id'];
// 	                if($subfundid9!=0)
// 	                {
// $gtsubfund9 = "select * from borno_school_sub_fund where borno_school_fund_id='$fundid9' AND borno_school_sub_fund_id='$subfundid9'";
// 					$qgstsubfund9=$mysqli->query($gtsubfund9);
// 					$stgtsubfund9=$qgstsubfund9->fetch_assoc();	               
// 					$fundname9=substr($stgtsubfund9['sub_fund_name'],0,3);
// 	                }
// 	                else
// 	                {
// $gtsubfund9 = "select * from borno_school_fund where borno_school_fund_id='$fundid9'";
// 					$qgstsubfund9=$mysqli->query($gtsubfund9);
// 					$stgtsubfund9=$qgstsubfund9->fetch_assoc();	               
// 					$fundname9=substr($stgtsubfund9['borno_school_fund_name'],0,3);	   
// 	                }
// 					}
					
//                     if($sl==10)
// 					{
// 					$fundid10=$shstdbal['borno_school_fund_id']; 
// 					$subfundid10=$shstdbal['borno_school_sub_fund_id'];
// 	                if($subfundid10!=0)
// 	                {
// $gtsubfund10 = "select * from borno_school_sub_fund where borno_school_fund_id='$fundid10' AND borno_school_sub_fund_id='$subfundid10'";
// 					$qgstsubfund10=$mysqli->query($gtsubfund10);
// 					$stgtsubfund10=$qgstsubfund10->fetch_assoc();	               
// 					$fundname10=substr($stgtsubfund10['sub_fund_name'],0,3);
// 	                }
// 	                else
// 	                {
// $gtsubfund10 = "select * from borno_school_fund where borno_school_fund_id='$fundid10'";
// 					$qgstsubfund10=$mysqli->query($gtsubfund10);
// 					$stgtsubfund10=$qgstsubfund10->fetch_assoc();	             
// 					$fundname10=substr($stgtsubfund10['borno_school_fund_name'],0,3);	   
// 	                }
// 					}	
					
//                     if($sl==11)
// 					{
// 					$fundid11=$shstdbal['borno_school_fund_id']; 
// 					$subfundid11=$shstdbal['borno_school_sub_fund_id'];
// 	                if($subfundid11!=0)
// 	                {
// $gtsubfund11 = "select * from borno_school_sub_fund where borno_school_fund_id='$fundid11' AND borno_school_sub_fund_id='$subfundid11'";
// 					$qgstsubfund11=$mysqli->query($gtsubfund11);
// 					$stgtsubfund11=$qgstsubfund11->fetch_assoc();	               
// 					$fundname11=substr($stgtsubfund11['sub_fund_name'],0,3);
// 	                }
// 	                else
// 	                {
// $gtsubfund11 = "select * from borno_school_fund where borno_school_fund_id='$fundid11'";
// 					$qgstsubfund11=$mysqli->query($gtsubfund11);
// 					$stgtsubfund11=$qgstsubfund11->fetch_assoc();	             
// 					$fundname11=substr($stgtsubfund11['borno_school_fund_name'],0,3);	   
// 	                }
// 					}	
					
//                     if($sl==12)
// 					{
// 					$fundid12=$shstdbal['borno_school_fund_id']; 
// 					$subfundid12=$shstdbal['borno_school_sub_fund_id'];
// 	                if($subfundid12!=0)
// 	                {
// $gtsubfund12 = "select * from borno_school_sub_fund where borno_school_fund_id='$fundid12' AND borno_school_sub_fund_id='$subfundid12'";
// 					$qgstsubfund12=$mysqli->query($gtsubfund12);
// 					$stgtsubfund12=$qgstsubfund12->fetch_assoc();	               
// 					$fundname12=substr($stgtsubfund12['sub_fund_name'],0,3);
// 	                }
// 	                else
// 	                {
// $gtsubfund12 = "select * from borno_school_fund where borno_school_fund_id='$fundid12'";
// 					$qgstsubfund12=$mysqli->query($gtsubfund12);
// 					$stgtsubfund12=$qgstsubfund12->fetch_assoc();	             
// 					$fundname12=substr($stgtsubfund12['borno_school_fund_name'],0,3);	   
// 	                }
// 					}
					
//                     if($sl==13)
// 					{
// 					$fundid13=$shstdbal['borno_school_fund_id']; 
// 					$subfundid13=$shstdbal['borno_school_sub_fund_id'];
// 	                if($subfundid13!=0)
// 	                {
// $gtsubfund13 = "select * from borno_school_sub_fund where borno_school_fund_id='$fundid13' AND borno_school_sub_fund_id='$subfundid13'";
// 					$qgstsubfund13=$mysqli->query($gtsubfund13);
// 					$stgtsubfund13=$qgstsubfund13->fetch_assoc();	               
// 					$fundname13=substr($stgtsubfund13['sub_fund_name'],0,3);
// 	                }
// 	                else
// 	                {
// $gtsubfund13 = "select * from borno_school_fund where borno_school_fund_id='$fundid13'";
// 					$qgstsubfund13=$mysqli->query($gtsubfund13);
// 					$stgtsubfund13=$qgstsubfund13->fetch_assoc();	             
// 					$fundname13=substr($stgtsubfund13['borno_school_fund_name'],0,3);	   
// 	                }
// 					}
					
//                     if($sl==14)
// 					{
// 					$fundid14=$shstdbal['borno_school_fund_id']; 
// 					$subfundid14=$shstdbal['borno_school_sub_fund_id'];
// 	                if($subfundid14!=0)
// 	                {
// $gtsubfund14 = "select * from borno_school_sub_fund where borno_school_fund_id='$fundid14' AND borno_school_sub_fund_id='$subfundid14'";
// 					$qgstsubfund14=$mysqli->query($gtsubfund14);
// 					$stgtsubfund14=$qgstsubfund14->fetch_assoc();	               
// 					$fundname14=substr($stgtsubfund14['sub_fund_name'],0,3);
// 	                }
// 	                else
// 	                {
// $gtsubfund14 = "select * from borno_school_fund where borno_school_fund_id='$fundid14'";
// 					$qgstsubfund14=$mysqli->query($gtsubfund14);
// 					$stgtsubfund14=$qgstsubfund14->fetch_assoc();	             
// 					$fundname14=substr($stgtsubfund14['borno_school_fund_name'],0,3);	   
// 	                }
// 					}	
					
//                     if($sl==15)
// 					{
// 					$fundid15=$shstdbal['borno_school_fund_id']; 
// 					$subfundid15=$shstdbal['borno_school_sub_fund_id'];
// 	                if($subfundid15!=0)
// 	                {
// $gtsubfund15 = "select * from borno_school_sub_fund where borno_school_fund_id='$fundid15' AND borno_school_sub_fund_id='$subfundid15'";
// 					$qgstsubfund15=$mysqli->query($gtsubfund15);
// 					$stgtsubfund15=$qgstsubfund15->fetch_assoc();	               
// 					$fundname15=substr($stgtsubfund15['sub_fund_name'],0,3);
// 	                }
// 	                else
// 	                {
// $gtsubfund15 = "select * from borno_school_fund where borno_school_fund_id='$fundid15'";
// 					$qgstsubfund15=$mysqli->query($gtsubfund15);
// 					$stgtsubfund15=$qgstsubfund15->fetch_assoc();	             
// 					$fundname15=substr($stgtsubfund15['borno_school_fund_name'],0,3);	   
// 	                }
// 					}	
					
//                     if($sl==16)
// 					{
// 					$fundid16=$shstdbal['borno_school_fund_id']; 
// 					$subfundid16=$shstdbal['borno_school_sub_fund_id'];
// 	                if($subfundid16!=0)
// 	                {
// $gtsubfund16 = "select * from borno_school_sub_fund where borno_school_fund_id='$fundid16' AND borno_school_sub_fund_id='$subfundid16'";
// 					$qgstsubfund16=$mysqli->query($gtsubfund16);
// 					$stgtsubfund16=$qgstsubfund16->fetch_assoc();	               
// 					$fundname16=substr($stgtsubfund16['sub_fund_name'],0,3);
// 	                }
// 	                else
// 	                {
// $gtsubfund16 = "select * from borno_school_fund where borno_school_fund_id='$fundid16'";
// 					$qgstsubfund16=$mysqli->query($gtsubfund16);
// 					$stgtsubfund16=$qgstsubfund16->fetch_assoc();	             
// 					$fundname16=substr($stgtsubfund16['borno_school_fund_name'],0,3);	   
// 	                }
// 					}	
					
//                     if($sl==17)
// 					{
// 					$fundid17=$shstdbal['borno_school_fund_id']; 
// 					$subfundid17=$shstdbal['borno_school_sub_fund_id'];
// 	                if($subfundid17!=0)
// 	                {
// $gtsubfund17 = "select * from borno_school_sub_fund where borno_school_fund_id='$fundid17' AND borno_school_sub_fund_id='$subfundid17'";
// 					$qgstsubfund17=$mysqli->query($gtsubfund17);
// 					$stgtsubfund17=$qgstsubfund17->fetch_assoc();	               
// 					$fundname17=substr($stgtsubfund17['sub_fund_name'],0,3);
// 	                }
// 	                else
// 	                {
// $gtsubfund17 = "select * from borno_school_fund where borno_school_fund_id='$fundid17'";
// 					$qgstsubfund17=$mysqli->query($gtsubfund17);
// 					$stgtsubfund17=$qgstsubfund17->fetch_assoc();	             
// 					$fundname17=substr($stgtsubfund17['borno_school_fund_name'],0,3);	   
// 	                }
// 					}
					
//                     if($sl==18)
// 					{
// 					$fundid18=$shstdbal['borno_school_fund_id']; 
// 					$subfundid18=$shstdbal['borno_school_sub_fund_id'];
// 	                if($subfundid18!=0)
// 	                {
// $gtsubfund18 = "select * from borno_school_sub_fund where borno_school_fund_id='$fundid18' AND borno_school_sub_fund_id='$subfundid18'";
// 					$qgstsubfund18=$mysqli->query($gtsubfund18);
// 					$stgtsubfund18=$qgstsubfund18->fetch_assoc();	               
// 					$fundname18=substr($stgtsubfund18['sub_fund_name'],0,3);
// 	                }
// 	                else
// 	                {
// $gtsubfund18 = "select * from borno_school_fund where borno_school_fund_id='$fundid18'";
// 					$qgstsubfund18=$mysqli->query($gtsubfund18);
// 					$stgtsubfund18=$qgstsubfund18->fetch_assoc();	             
// 					$fundname18=substr($stgtsubfund18['borno_school_fund_name'],0,3);	   
// 	                }
// 					}	
					
//                     if($sl==19)
// 					{
// 					$fundid19=$shstdbal['borno_school_fund_id']; 
// 					$subfundid19=$shstdbal['borno_school_sub_fund_id'];
// 	                if($subfundid19!=0)
// 	                {
// $gtsubfund19 = "select * from borno_school_sub_fund where borno_school_fund_id='$fundid19' AND borno_school_sub_fund_id='$subfundid19'";
// 					$qgstsubfund19=$mysqli->query($gtsubfund19);
// 					$stgtsubfund19=$qgstsubfund19->fetch_assoc();	               
// 					$fundname19=substr($stgtsubfund19['sub_fund_name'],0,3);
// 	                }
// 	                else
// 	                {
// $gtsubfund19 = "select * from borno_school_fund where borno_school_fund_id='$fundid19'";
// 					$qgstsubfund19=$mysqli->query($gtsubfund19);
// 					$stgtsubfund19=$qgstsubfund19->fetch_assoc();	             
// 					$fundname19=substr($stgtsubfund19['borno_school_fund_name'],0,3);	   
// 	                }
// 					}					
// 					}
				
require('../../fpdf/fpdf.php');
class PDF extends FPDF
{
// Page header
function Header()
{
  
$this->SetFont('Arial','B',20);
$this->Cell(280,5,$GLOBALS['fnschname'],0,0,"C");
$this->Ln();
$this->SetFont('Arial','B',11); 
$this->Ln();
$this->Cell(280,5,"Payment History",0,0,"C");
$this->Ln();
$this->Cell(100,2,"",0,0,"L");
$this->Ln();
$this->SetFont('Arial','B',11);
$this->Cell(70,5,$GLOBALS['branchname'],0,0,"C");
$this->Cell(70,5,$GLOBALS['classname'],0,0,"C");
$this->Cell(70,5,$GLOBALS['shiftname'],0,0,"C");
$this->Cell(70,5,$GLOBALS['sectionname'],0,0,"C");
$this->Ln();
$this->SetFont('Arial','B',9); 
$this->Cell(10,5,"Roll",1,0,"C");
$this->Cell(50,5,"Student Name",1,0,"C");
$this->Cell(20,5,"Session Fee",1,0,"C");
$this->Cell(120,5,"Tuition Fee",1,0,"C");
$this->Cell(25,5,"Exam Fee",1,0,"C");
$this->Cell(23,5,"Previous Due",1,0,"C");
if($GLOBALS['studClass'] == 1){
$this->Cell(20,5,"Form Fill-up",1,0,"C");
$this->Cell(17,5,"Total Due",1,0,"C");
}
    else{
        $this->Cell(20,5,"Total Due",1,0,"C");
$this->Cell(17,5,"Total Paid",1,0,"C");
    }

// $this->Cell(25,5,"Total",1,0,"C");
$this->Ln();
$this->Cell(10,5,"",1,0,"C");
$this->Cell(50,5,"",1,0,"C");
$this->Cell(20,5,"",1,0,"C");
$this->Cell(10,5,"Jan",1,0,"C");
$this->Cell(10,5,"Feb",1,0,"C");
$this->Cell(10,5,"Mar",1,0,"C");
$this->Cell(10,5,"Apr",1,0,"C");
$this->Cell(10,5,"May",1,0,"C");
$this->Cell(10,5,"Jun",1,0,"C");
$this->Cell(10,5,"Jul",1,0,"C");
$this->Cell(10,5,"Aug",1,0,"C");
$this->Cell(10,5,"Sep",1,0,"C");
$this->Cell(10,5,"Oct",1,0,"C");
$this->Cell(10,5,"Nov",1,0,"C");
$this->Cell(10,5,"Dec",1,0,"C");
$this->Cell(12.5,5,"Half",1,0,"C");
$this->Cell(12.5,5,"Anual",1,0,"C");
$this->Cell(23,5,"",1,0,"C");
$this->Cell(20,5,"",1,0,"C");
$this->Cell(17,5,"",1,0,"C");
// $this->Cell(25,5,"",1,0,"C");
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
$pdf->AddPage('L');


 $fees191 = 0;		
 $gstdinfo ="select * from borno_student_info where borno_school_section_id='$section' AND borno_school_session='$stsess' AND `borno_student_status` = '1' order by borno_school_roll asc";
					$qgstdinfo=$mysqli->query($gstdinfo);
					while($shstdinfo=$qgstdinfo->fetch_assoc()){
					$studentid=$shstdinfo['borno_student_info_id'];    
                    $roll=$shstdinfo['borno_school_roll'];
                    $name=substr($shstdinfo['borno_school_student_name'],0,20);
          $pdf->SetFont('Arial','',9);                
          $pdf->Cell(10,5,$roll,1,0,"C");   
          $pdf->Cell(50,5,$name,1,0,"L"); 
           
 $pdf->SetTextColor(0,0,255); 
 
 $tcfee = "SELECT `paid_amount` FROM `student_fees` WHERE `student_id` ='$studentid' AND `session` <= '$stsess' AND  `fees_head_id` = 12";
 		$qtcfee=$mysqli->query($tcfee);
		$shqtcfee=$qtcfee->fetch_assoc();
		$tc=$shqtcfee['paid_amount'];  
 

$memo1 ="SELECT `due_amount` FROM `student_fees` WHERE `student_id` ='$studentid' AND `session` = '$stsess' AND  `fees_head_id` = 1";
		$qmemo1=$mysqli->query($memo1);
		$shgmemo1=$qmemo1->fetch_assoc();
		$fees1=$shgmemo1['due_amount'];
if($tc > 0){
       if($fees1!=0){
    $pdf->SetTextColor(255,0,0);
    $pdf->Cell(20,5," ",1,0,"C");}
else{$pdf->SetTextColor(0,0,255);
    $pdf->Cell(20,5,"Paid",1,0,"C");} 
}
else{
   if($fees1!=0){
    $pdf->SetTextColor(255,0,0);
    $pdf->Cell(20,5,$fees1,1,0,"C");}
else{$pdf->SetTextColor(0,0,255);
    $pdf->Cell(20,5,"Paid",1,0,"C");} 
}

$memo2 ="SELECT `due_amount` FROM `student_fees` WHERE `student_id` = '$studentid' AND `session` = '$stsess' AND  `fees_head_id` = '2'  AND `month_id` =  '1'";
		$qmemo2=$mysqli->query($memo2);
		$shgmemo2=$qmemo2->fetch_assoc();
		$fees2=$shgmemo2['due_amount'];
if($tc > 0){
    if($fees2!=0){
    $pdf->SetTextColor(255,0,0);
    $pdf->Cell(10,5," ",1,0,"C");}
else{$pdf->SetTextColor(0,0,255);
    $pdf->Cell(10,5,"Paid",1,0,"C");}
}
else{		
if($fees2!=0){
    $pdf->SetTextColor(255,0,0);
    $pdf->Cell(10,5,$fees2,1,0,"C");}
else{$pdf->SetTextColor(0,0,255);
    $pdf->Cell(10,5,"Paid",1,0,"C");}
}
$memo3 ="SELECT `due_amount` FROM `student_fees` WHERE `student_id` = '$studentid' AND `session` = '$stsess' AND  `fees_head_id` = '2'  AND `month_id` =  '2'";
		$qmemo3=$mysqli->query($memo3);
		$shgmemo3=$qmemo3->fetch_assoc();
		$fees3=$shgmemo3['due_amount'];
if($tc > 0){
    $pdf->Cell(10,5," ",1,0,"C");
}
else{		
if($fees3!=0){
    $pdf->SetTextColor(255,0,0);
    $pdf->Cell(10,5,$fees3,1,0,"C");}
else{$pdf->SetTextColor(0,0,255);     $pdf->Cell(10,5,"Paid",1,0,"C");}
}
$memo4 ="SELECT `due_amount` FROM `student_fees` WHERE `student_id` = '$studentid' AND `session` = '$stsess' AND  `fees_head_id` = '2'  AND `month_id` =  '3'";
		$qmemo4=$mysqli->query($memo4);
		$shgmemo4=$qmemo4->fetch_assoc();
		$fees4=$shgmemo4['due_amount']; 
if($tc > 0){
    if($fees4!=0){
    $pdf->SetTextColor(255,0,0);
    $pdf->Cell(10,5," ",1,0,"C");}
else{$pdf->SetTextColor(0,0,255);     $pdf->Cell(10,5,"Paid",1,0,"C");}
}
else{		
if($fees4!=0){
    $pdf->SetTextColor(255,0,0);
    $pdf->Cell(10,5,$fees4,1,0,"C");}
else{$pdf->SetTextColor(0,0,255);     $pdf->Cell(10,5,"Paid",1,0,"C");}
}
$memo5 ="SELECT `due_amount` FROM `student_fees` WHERE `student_id` = '$studentid' AND `session` = '$stsess' AND  `fees_head_id` = '2'  AND `month_id` =  '4'";
		$qmemo5=$mysqli->query($memo5);
		$shgmemo5=$qmemo5->fetch_assoc();
		$fees5=$shgmemo5['due_amount'];

if($tc > 0){
    if($fees5!=0){
    $pdf->SetTextColor(255,0,0);
    $pdf->Cell(10,5," ",1,0,"C");}
else{$pdf->SetTextColor(0,0,255);     $pdf->Cell(10,5,"Paid",1,0,"C");}
}
else{		
if($fees5!=0){
    $pdf->SetTextColor(255,0,0);
    $pdf->Cell(10,5,$fees5,1,0,"C");}
else{$pdf->SetTextColor(0,0,255);     $pdf->Cell(10,5,"Paid",1,0,"C");}
}
$memo6 ="SELECT `due_amount` FROM `student_fees` WHERE `student_id` = '$studentid' AND `session` = '$stsess' AND  `fees_head_id` = '2'  AND `month_id` =  '5'";
		$qmemo6=$mysqli->query($memo6);
		$shgmemo6=$qmemo6->fetch_assoc();
		$fees6=$shgmemo6['due_amount']; 
		
if($tc > 0){
    if($fees6!=0){
    $pdf->SetTextColor(255,0,0);
    $pdf->Cell(10,5," ",1,0,"C");}
else{$pdf->SetTextColor(0,0,255);     $pdf->Cell(10,5,"Paid",1,0,"C");}
}
else{		
if($fees6!=0){
    $pdf->SetTextColor(255,0,0);
    $pdf->Cell(10,5,$fees6,1,0,"C");}
else{$pdf->SetTextColor(0,0,255);     $pdf->Cell(10,5,"Paid",1,0,"C");}
}
$memo7 ="SELECT `due_amount` FROM `student_fees` WHERE `student_id` = '$studentid' AND `session` = '$stsess' AND  `fees_head_id` = '2'  AND `month_id` =  '6'";
		$qmemo7=$mysqli->query($memo7);
		$shgmemo7=$qmemo7->fetch_assoc();
		$fees7=$shgmemo7['due_amount'];  
if($tc > 0){
    if($fees7!=0){
    $pdf->SetTextColor(255,0,0);
    $pdf->Cell(10,5," ",1,0,"C");}
else{$pdf->SetTextColor(0,0,255);     $pdf->Cell(10,5,"Paid",1,0,"C");}
}
else{		
if($fees7!=0){
    $pdf->SetTextColor(255,0,0);
    $pdf->Cell(10,5,$fees7,1,0,"C");}
else{$pdf->SetTextColor(0,0,255);     $pdf->Cell(10,5,"Paid",1,0,"C");}
}
$memo8 ="SELECT `due_amount` FROM `student_fees` WHERE `student_id` = '$studentid' AND `session` = '$stsess' AND  `fees_head_id` = '2'  AND `month_id` =  '7'";
		$qmemo8=$mysqli->query($memo8);
		$shgmemo8=$qmemo8->fetch_assoc();
		$fees8=$shgmemo8['due_amount']; 
if($tc > 0){
    if($fees8!=0){
    $pdf->SetTextColor(255,0,0);
    $pdf->Cell(10,5," ",1,0,"C");}
else{$pdf->SetTextColor(0,0,255);     $pdf->Cell(10,5,"Paid",1,0,"C");}
}
else{		
if($fees8!=0){
    $pdf->SetTextColor(255,0,0);
    $pdf->Cell(10,5,$fees8,1,0,"C");}
else{$pdf->SetTextColor(0,0,255);     $pdf->Cell(10,5,"Paid",1,0,"C");}
}
$memo9 ="SELECT `due_amount` FROM `student_fees` WHERE `student_id` = '$studentid' AND `session` = '$stsess' AND  `fees_head_id` = '2'  AND `month_id` =  '8'";
		$qmemo9=$mysqli->query($memo9);
		$shgmemo9=$qmemo9->fetch_assoc();
		$fees9=$shgmemo9['due_amount'];
if($tc > 0){
    if($fees9!=0){
    $pdf->SetTextColor(255,0,0);
    $pdf->Cell(10,5," ",1,0,"C");}
else{$pdf->SetTextColor(0,0,255);     $pdf->Cell(10,5,"Paid",1,0,"C");}
}
else{		
if($fees9!=0){
    $pdf->SetTextColor(255,0,0);
    $pdf->Cell(10,5,$fees9,1,0,"C");}
else{$pdf->SetTextColor(0,0,255);     $pdf->Cell(10,5,"Paid",1,0,"C");}
}
$memo10 ="SELECT `due_amount` FROM `student_fees` WHERE `student_id` = '$studentid' AND `session` = '$stsess' AND  `fees_head_id` = '2'  AND `month_id` =  '9'";
		$qmemo10=$mysqli->query($memo10);
		$shgmemo10=$qmemo10->fetch_assoc();
		$fees10=$shgmemo10['due_amount']; 
		if($tc > 0){
    if($fees10!=0){
    $pdf->SetTextColor(255,0,0);
    $pdf->Cell(10,5," ",1,0,"C");}
else{$pdf->SetTextColor(0,0,255);     $pdf->Cell(10,5,"Paid",1,0,"C");}
}
else{
if($fees10!=0){
    $pdf->SetTextColor(255,0,0);
    $pdf->Cell(10,5,$fees10,1,0,"C");}
else{$pdf->SetTextColor(0,0,255);     $pdf->Cell(10,5,"Paid",1,0,"C");}
}
$memo11 ="SELECT `due_amount` FROM `student_fees` WHERE `student_id` = '$studentid' AND `session` = '$stsess' AND  `fees_head_id` = '2'  AND `month_id` =  '10'";
		$qmemo11=$mysqli->query($memo11);
		$shgmemo11=$qmemo11->fetch_assoc();
		$fees11=$shgmemo11['due_amount'];
if($tc > 0){
    if($fees11!=0){
    $pdf->SetTextColor(255,0,0);
    $pdf->Cell(10,5," ",1,0,"C");}
else{$pdf->SetTextColor(0,0,255);     $pdf->Cell(10,5,"Paid",1,0,"C");}
}
else{		
if($fees11!=0){
    $pdf->SetTextColor(255,0,0);
    $pdf->Cell(10,5,$fees11,1,0,"C");}
else{$pdf->SetTextColor(0,0,255);     $pdf->Cell(10,5,"Paid",1,0,"C");}
}
$memo12 ="SELECT `due_amount` FROM `student_fees` WHERE `student_id` = '$studentid' AND `session` = '$stsess' AND  `fees_head_id` = '2'  AND `month_id` =  '11'";
		$qmemo12=$mysqli->query($memo12);
		$shgmemo12=$qmemo12->fetch_assoc();
		$fees12=$shgmemo12['due_amount']; 
if($tc > 0){
   if($fees12!=0){
    $pdf->SetTextColor(255,0,0);
    $pdf->Cell(10,5," ",1,0,"C");}
else{$pdf->SetTextColor(0,0,255);     $pdf->Cell(10,5,"Paid",1,0,"C");}
}
else{		
if($fees12!=0){
    $pdf->SetTextColor(255,0,0);
    $pdf->Cell(10,5,$fees12,1,0,"C");}
else{$pdf->SetTextColor(0,0,255);     $pdf->Cell(10,5,"Paid",1,0,"C");}
}
$memo13 ="SELECT `due_amount` FROM `student_fees` WHERE `student_id` = '$studentid' AND `session` = '$stsess' AND  `fees_head_id` = '2'  AND `month_id` =  '12'";
		$qmemo13=$mysqli->query($memo13);
		$shgmemo13=$qmemo13->fetch_assoc();
		$fees13=$shgmemo13['due_amount'];
if($tc > 0){
   if($fees13!=0){
    $pdf->SetTextColor(255,0,0);
    $pdf->Cell(10,5," ",1,0,"C");}
else{$pdf->SetTextColor(0,0,255);     $pdf->Cell(10,5,"Paid",1,0,"C");}
}
else{		
if($fees13!=0){
    $pdf->SetTextColor(255,0,0);
    $pdf->Cell(10,5,$fees13,1,0,"C");}
else{$pdf->SetTextColor(0,0,255);     $pdf->Cell(10,5,"Paid",1,0,"C");}
}
$memo14 ="SELECT `due_amount` FROM `student_fees` WHERE `student_id` = '$studentid' AND `session` = '$stsess' AND  `fees_head_id` = '3'";
		$qmemo14=$mysqli->query($memo14);
		$shgmemo14=$qmemo14->fetch_assoc();
		$fees14=$shgmemo14['due_amount'];
//if(!empty($fees14)){
if($fees14!=0){
    $pdf->SetTextColor(255,0,0);
    $pdf->Cell(12.5,5,$fees14,1,0,"C");}
else{$pdf->SetTextColor(0,0,255);
    $pdf->Cell(12.5,5,"Paid",1,0,"C");}
// }
// else{
//     $pdf->SetTextColor(255,0,0);
//   $pdf->Cell(12.5,5,"-",1,0,"C");  
// } 
if($studClass == 1 AND $stsess == '2022'){
        $memo15 ="SELECT `due_amount` FROM `student_fees` WHERE `student_id` = '$studentid' AND `session` = '$stsess' AND `fees_head_id` = '9'";// AND `month_id` =  '1'";
		$qmemo15=$mysqli->query($memo15);
		$shgmemo15=$qmemo15->fetch_assoc();
		$fees15=$shgmemo15['due_amount']; 
if(!empty($fees15)){		
if($fees15!=0){
    $pdf->SetTextColor(255,0,0);
    $pdf->Cell(12.5,5,$fees15,1,0,"C");}
else{$pdf->SetTextColor(0,0,255);
    $pdf->Cell(12.5,5,"Paid",1,0,"C");}
}
else{
    $pdf->SetTextColor(255,0,0);
  $pdf->Cell(15,5,"-",1,0,"C");  
}
    }
    else{
      $memo15 ="SELECT `due_amount` FROM `student_fees` WHERE `student_id` = '$studentid' AND `session` = '$stsess' AND `fees_head_id`='11'";// AND `month_id` =  '1'";
		$qmemo15=$mysqli->query($memo15);
		$shgmemo15=$qmemo15->fetch_assoc();
		$fees15=$shgmemo15['due_amount']; 
if(!empty($fees15)){		
if($fees15!=0){
    $pdf->SetTextColor(255,0,0);
    $pdf->Cell(12.5,5,$fees15,1,0,"C");}
else{$pdf->SetTextColor(0,0,255);
    $pdf->Cell(12.5,5,"Paid",1,0,"C");}
}
else{
    $pdf->SetTextColor(255,0,0);
  $pdf->Cell(12.5,5,"-",1,0,"C");  
}  
    }

$memo16 ="SELECT sum(`due_amount`)as due_amount FROM `student_fees` WHERE `student_id` = '$studentid' AND `session` < '$stsess'";
		$qmemo16=$mysqli->query($memo16);
		$shgmemo16=$qmemo16->fetch_assoc();
		$fees16=$shgmemo16['due_amount']; 
if(!empty($fees16)){
if($fees16!=0){
     $pdf->SetTextColor(255,0,0);
    $pdf->Cell(23,5,$fees16,1,0,"C");}
else{$pdf->SetTextColor(0,0,255);
    $pdf->Cell(23,5,"Paid",1,0,"C");}
   } else{
    $pdf->SetTextColor(255,0,0);
  $pdf->Cell(23,5,"-",1,0,"C");  
} 
if($studClass == 1){
    
    
        $memo18 ="SELECT `due_amount`FROM `student_fees` WHERE `student_id` = '$studentid' AND `session` = '$stsess' AND `fees_head_id` = '6'";
		$qmemo18=$mysqli->query($memo18);
		$shgmemo18=$qmemo18->fetch_assoc();
		$fees18=$shgmemo18['due_amount'];  
if($fees18!=0){$pdf->SetTextColor(255,0,0);
    $pdf->Cell(20,5,"$fees18",1,0,"C");}
else{$pdf->SetTextColor(0,0,255);
    $pdf->Cell(20,5,"-",1,0,"C");}
    
    
    $memo17 ="SELECT SUM(`due_amount`) as due_amount  FROM `student_fees` WHERE `student_id` = '$studentid' AND `session` = '$stsess' AND `due_amount` > 0";
		$qmemo17=$mysqli->query($memo17);
		$shgmemo17=$qmemo17->fetch_assoc();
		$fees17=$shgmemo17['due_amount'];  
if($fees17!=0){$pdf->SetTextColor(255,0,0);
    $pdf->Cell(17,5,$fees17,1,0,"C");}
else{$pdf->SetTextColor(255,0,0);
    $pdf->Cell(17,5,"-",1,0,"C");}
    
  $fees191 = $fees191 +  $fees17;   
    

}    
else{
    $memo17 ="SELECT SUM(`due_amount`) as due_amount  FROM `student_fees` WHERE `student_id` = '$studentid' AND `session` <= '$stsess' AND `due_amount` > 0";
		$qmemo17=$mysqli->query($memo17);
		$shgmemo17=$qmemo17->fetch_assoc();
		$fees17=$shgmemo17['due_amount'];
if($tc > 0){
    $pdf->Cell(20,5," ",1,0,"C");
     $fees191 = $fees191;
}
else{
if($fees17!=0){$pdf->SetTextColor(255,0,0);
    $pdf->Cell(20,5,$fees17,1,0,"C");}
else{$pdf->SetTextColor(255,0,0);
    $pdf->Cell(20,5,"-",1,0,"C");}
 
  $fees191 = $fees191 +  $fees17;   
}
    
    $memo18 ="SELECT SUM(`paid_amount`) as paid_amount FROM `student_fees` WHERE `student_id` = '$studentid' AND `session` = '$stsess' AND `paid_amount` > 0";
		$qmemo18=$mysqli->query($memo18);
		$shgmemo18=$qmemo18->fetch_assoc();
		$fees18=$shgmemo18['paid_amount'];  
if($fees18!=0){$pdf->SetTextColor(0,0,255);
    $pdf->Cell(17,5,"",1,0,"C");}
else{$pdf->SetTextColor(0,0,255);
    $pdf->Cell(17,5,"-",1,0,"C");}
}


// $amount=0;
// $total = array();
// $totalamount ="select * from borno_school_receipt where borno_student_info_id='$studentid' AND borno_school_session='$stsess' order by borno_school_fund_id,borno_school_sub_fund_id asc";
// 		$totalamount1=$mysqli->query($totalamount);
// 		while($stotalamount1=$totalamount1->fetch_assoc()){;
// 		$feess=$stotalamount1['borno_school_fee']; 
// 		$total[]=$stotalamount1['borno_school_fee'];
// 		$amount=array_sum($total);    
// 		}
// if($amount!=""){$pdf->Cell(25,5,$amount,1,0,"C");}
// else{$pdf->Cell(25,5,'',1,0,"C");}

$pdf->SetTextColor(0,0,0); 
$pdf->Ln();                    
}

// $memo191 ="select SUM(borno_school_fee) As total from borno_school_receipt where borno_school_session='$stsess' AND borno_school_section_id='$section'";
// 		$qmemo191=$mysqli->query($memo191);
// 		$shgmemo191=$qmemo191->fetch_assoc();
// 		$fees191=$shgmemo191['total']; 
		
$pdf->Cell(225,5,'',1,0,"C");
$pdf->SetTextColor(255,0,0);
$pdf->SetFont('Arial','B',9);
if($studClass == 1){
$pdf->Cell(23,5,"",1,0,"C");
$pdf->Cell(20,5,"Grand Total",1,0,"C");
$pdf->Cell(17,5,$fees191,1,0,"C");
}
else{
  $pdf->Cell(23,5,"Grand Total",1,0,"C");
$pdf->Cell(20,5,$fees191,1,0,"C");
$pdf->Cell(17,5," ",1,0,"C");  
}
$pdf->Output();
?>