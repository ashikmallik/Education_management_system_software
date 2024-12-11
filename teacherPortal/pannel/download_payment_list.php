<?php

$branchId=$_GET['branchId'];
$studClass=$_GET['studClass'];
$shiftId=$_GET['shiftId'];
$section=$_GET['section'];
$stsess=trim($_GET['stsess']);
$schId=$_GET['schoolId'];

include('report_sett_top.php');

$gtschoolName ="select * from borno_school where borno_school_id=$schId";
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
                    
$gtsection = "select * from borno_school_section where  borno_school_section_id='$section'";
					$qgstsection=$mysqli->query($gtsection);
					$stgtsection=$qgstsection->fetch_assoc();
                    $fstsection=$stgtsection['borno_school_section_name'];
                    $sectionname="Section : $fstsection";


 $gstdbal ="SELECT `fees_head_id`,`month_id` FROM `student_fees` WHERE `student_id` = (SELECT `borno_student_info_id` FROM `borno_student_info`WHERE `borno_school_section_id` = '$section' AND `session` = '$stsess' GROUP BY `borno_school_section_id`) ORDER BY `fees_head_id`";
					$qgstdbal=$mysqli->query($gstdbal);
					$sl=0;
					while($shstdbal=$qgstdbal->fetch_assoc()){$sl++;
					
					if($sl==1)
					{
					$fundid1=$shstdbal['fees_head_id']; 
					$subfundid1=$shstdbal['month_id'];
	                if($subfundid1!=0)
	                {
$gtsubfund1 ="SELECT * FROM `fiscal_year_details` WHERE `month`= '$subfundid1' GROUP BY `month`";
					$qgstsubfund1=$mysqli->query($gtsubfund1);
					$stgtsubfund1=$qgstsubfund1->fetch_assoc();	               
					$fundname1=substr($stgtsubfund1['month_name'],0,3);
	                }
	                else
	                {
$gtsubfund1 = "SELECT * FROM `fees_head` WHERE `branch_id` ='$branchId' AND `class_id`='$studClass' AND `stsess` ='$stsess' AND `head_id`='$fundid1'";
					$qgstsubfund1=$mysqli->query($gtsubfund1);
					$stgtsubfund1=$qgstsubfund1->fetch_assoc();	               
					$fundname1=substr($stgtsubfund1['borno_school_fund_name'],0,3);	   
	                }
					}
					
					if($sl==2)
					{
					$fundid2=$shstdbal['borno_school_fund_id']; 
					$subfundid2=$shstdbal['borno_school_sub_fund_id'];
	                if($subfundid2!=0)
	                {
$gtsubfund2 = "SELECT * FROM `fiscal_year_details` WHERE `month`= '$subfundid2' GROUP BY `month`";
					$qgstsubfund2=$mysqli->query($gtsubfund2);
					$stgtsubfund2=$qgstsubfund2->fetch_assoc();	               
					$fundname2=substr($stgtsubfund2['month_name'],0,3);
	                }
	                else
	                {
$gtsubfund2 = "SELECT * FROM `fees_head` WHERE `branch_id` ='$branchId' AND `class_id`='$studClass' AND `stsess` ='$stsess' AND `head_id`='$fundid2'";
					$qgstsubfund2=$mysqli->query($gtsubfund2);
					$stgtsubfund2=$qgstsubfund2->fetch_assoc();	               
					$fundname2=substr($stgtsubfund2['borno_school_fund_name'],0,3);	   
	                }
					}	
					
                    if($sl==3)
					{
					$fundid3=$shstdbal['borno_school_fund_id']; 
					$subfundid3=$shstdbal['borno_school_sub_fund_id'];
	                if($subfundid3!=0)
	                {
$gtsubfund3 = "SELECT * FROM `fiscal_year_details` WHERE `month`= '$subfundid3' GROUP BY `month`";
					$qgstsubfund3=$mysqli->query($gtsubfund3);
					$stgtsubfund3=$qgstsubfund3->fetch_assoc();	               
					$fundname3=substr($stgtsubfund3['month_name'],0,3);
	                }
	                else
	                {
$gtsubfund3 = "SELECT * FROM `fees_head` WHERE `branch_id` ='$branchId' AND `class_id`='$studClass' AND `stsess` ='$stsess' AND `head_id`='$fundid3'";
					$qgstsubfund3=$mysqli->query($gtsubfund3);
					$stgtsubfund3=$qgstsubfund3->fetch_assoc();	               
					$fundname3=substr($stgtsubfund3['borno_school_fund_name'],0,3);	   
	                }
					}	
					
                    if($sl==4)
					{
					$fundid4=$shstdbal['borno_school_fund_id']; 
					$subfundid4=$shstdbal['borno_school_sub_fund_id'];
	                if($subfundid4!=0)
	                {
$gtsubfund4 = "SELECT * FROM `fiscal_year_details` WHERE `month`= '$subfundid4' GROUP BY `month`";
					$qgstsubfund4=$mysqli->query($gtsubfund4);
					$stgtsubfund4=$qgstsubfund4->fetch_assoc();	               
					$fundname4=substr($stgtsubfund4['month_name'],0,3);
	                }
	                else
	                {
$gtsubfund4 = "SELECT * FROM `fees_head` WHERE `branch_id` ='$branchId' AND `class_id`='$studClass' AND `stsess` ='$stsess' AND `head_id`='$fundid4'";
					$qgstsubfund4=$mysqli->query($gtsubfund4);
					$stgtsubfund4=$qgstsubfund4->fetch_assoc();	               
					$fundname4=substr($stgtsubfund4['borno_school_fund_name'],0,3);	   
	                }
					}
					
                    if($sl==5)
					{
					$fundid5=$shstdbal['borno_school_fund_id']; 
					$subfundid5=$shstdbal['borno_school_sub_fund_id'];
	                if($subfundid5!=0)
	                {
$gtsubfund5 = "SELECT * FROM `fiscal_year_details` WHERE `month`= '$subfundid5' GROUP BY `month`";
					$qgstsubfund5=$mysqli->query($gtsubfund5);
					$stgtsubfund5=$qgstsubfund5->fetch_assoc();	               
					$fundname5=substr($stgtsubfund5['month_name'],0,3);
	                }
	                else
	                {
$gtsubfund5 = "SELECT * FROM `fees_head` WHERE `branch_id` ='$branchId' AND `class_id`='$studClass' AND `stsess` ='$stsess' AND `head_id`='$fundid5'";
					$qgstsubfund5=$mysqli->query($gtsubfund5);
					$stgtsubfund5=$qgstsubfund5->fetch_assoc();	               
					$fundname5=substr($stgtsubfund5['borno_school_fund_name'],0,3);	   
	                }
					}					

                    if($sl==6)
					{
					$fundid6=$shstdbal['borno_school_fund_id']; 
					$subfundid6=$shstdbal['borno_school_sub_fund_id'];
	                if($subfundid6!=0)
	                {
$gtsubfund6 = "SELECT * FROM `fiscal_year_details` WHERE `month`= '$subfundid6' GROUP BY `month`";
					$qgstsubfund6=$mysqli->query($gtsubfund6);
					$stgtsubfund6=$qgstsubfund6->fetch_assoc();	               
					$fundname6=substr($stgtsubfund6['month_name'],0,3);
	                }
	                else
	                {
$gtsubfund6 = "SELECT * FROM `fees_head` WHERE `branch_id` ='$branchId' AND `class_id`='$studClass' AND `stsess` ='$stsess' AND `head_id`='$fundid6'";
					$qgstsubfund6=$mysqli->query($gtsubfund6);
					$stgtsubfund6=$qgstsubfund6->fetch_assoc();	               
					$fundname6=substr($stgtsubfund6['borno_school_fund_name'],0,3);	   
	                }
					}					

                    if($sl==7)
					{
					$fundid7=$shstdbal['borno_school_fund_id']; 
					$subfundid7=$shstdbal['borno_school_sub_fund_id'];
	                if($subfundid7!=0)
	                {
$gtsubfund7 = "SELECT * FROM `fiscal_year_details` WHERE `month`= '$subfundid7' GROUP BY `month`";
					$qgstsubfund7=$mysqli->query($gtsubfund7);
					$stgtsubfund7=$qgstsubfund7->fetch_assoc();	               
					$fundname7=substr($stgtsubfund7['month_name'],0,3);
	                }
	                else
	                {
$gtsubfund7 = "SELECT * FROM `fees_head` WHERE `branch_id` ='$branchId' AND `class_id`='$studClass' AND `stsess` ='$stsess' AND `head_id`=";
					$qgstsubfund7=$mysqli->query($gtsubfund7);
					$stgtsubfund7=$qgstsubfund7->fetch_assoc();	               
					$fundname7=substr($stgtsubfund7['borno_school_fund_name'],0,3);	   
	                }
					}
					
                    if($sl==8)
					{
					$fundid8=$shstdbal['borno_school_fund_id']; 
					$subfundid8=$shstdbal['borno_school_sub_fund_id'];
	                if($subfundid8!=0)
	                {
$gtsubfund8 = "SELECT * FROM `fiscal_year_details` WHERE `month`= '$subfundid8' GROUP BY `month`";
					$qgstsubfund8=$mysqli->query($gtsubfund8);
					$stgtsubfund8=$qgstsubfund8->fetch_assoc();	               
					$fundname8=substr($stgtsubfund8['month_name'],0,3);
	                }
	                else
	                {
$gtsubfund8 = "SELECT * FROM `fees_head` WHERE `branch_id` ='$branchId' AND `class_id`='$studClass' AND `stsess` ='$stsess' AND `head_id`='$fundid8'";
					$qgstsubfund8=$mysqli->query($gtsubfund8);
					$stgtsubfund8=$qgstsubfund8->fetch_assoc();	               
					$fundname8=substr($stgtsubfund8['borno_school_fund_name'],0,3);	   
	                }
					}	
					
                    if($sl==9)
					{
					$fundid9=$shstdbal['borno_school_fund_id']; 
					$subfundid9=$shstdbal['borno_school_sub_fund_id'];
	                if($subfundid9!=0)
	                {
$gtsubfund9 = "SELECT * FROM `fiscal_year_details` WHERE `month`= '$subfundid9' GROUP BY `month`";
					$qgstsubfund9=$mysqli->query($gtsubfund9);
					$stgtsubfund9=$qgstsubfund9->fetch_assoc();	               
					$fundname9=substr($stgtsubfund9['month_name'],0,3);
	                }
	                else
	                {
$gtsubfund9 = "SELECT * FROM `fees_head` WHERE `branch_id` ='$branchId' AND `class_id`='$studClass' AND `stsess` ='$stsess' AND `head_id`='$fundid9'";
					$qgstsubfund9=$mysqli->query($gtsubfund9);
					$stgtsubfund9=$qgstsubfund9->fetch_assoc();	               
					$fundname9=substr($stgtsubfund9['borno_school_fund_name'],0,3);	   
	                }
					}
					
                    if($sl==10)
					{
					$fundid10=$shstdbal['borno_school_fund_id']; 
					$subfundid10=$shstdbal['borno_school_sub_fund_id'];
	                if($subfundid10!=0)
	                {
$gtsubfund10 = "SELECT * FROM `fiscal_year_details` WHERE `month`= '$subfundid10' GROUP BY `month`";
					$qgstsubfund10=$mysqli->query($gtsubfund10);
					$stgtsubfund10=$qgstsubfund10->fetch_assoc();	               
					$fundname10=substr($stgtsubfund10['month_name'],0,3);
	                }
	                else
	                {
$gtsubfund10 = "SELECT * FROM `fees_head` WHERE `branch_id` ='$branchId' AND `class_id`='$studClass' AND `stsess` ='$stsess' AND `head_id`='$fundid10'";
					$qgstsubfund10=$mysqli->query($gtsubfund10);
					$stgtsubfund10=$qgstsubfund10->fetch_assoc();	             
					$fundname10=substr($stgtsubfund10['borno_school_fund_name'],0,3);	   
	                }
					}	
					
                    if($sl==11)
					{
					$fundid11=$shstdbal['borno_school_fund_id']; 
					$subfundid11=$shstdbal['borno_school_sub_fund_id'];
	                if($subfundid11!=0)
	                {
$gtsubfund11 = "SELECT * FROM `fiscal_year_details` WHERE `month`= '$subfundid11' GROUP BY `month`";
					$qgstsubfund11=$mysqli->query($gtsubfund11);
					$stgtsubfund11=$qgstsubfund11->fetch_assoc();	               
					$fundname11=substr($stgtsubfund11['month_name'],0,3);
	                }
	                else
	                {
$gtsubfund11 = "SELECT * FROM `fees_head` WHERE `branch_id` ='$branchId' AND `class_id`='$studClass' AND `stsess` ='$stsess' AND `head_id`='$fundid11'";
					$qgstsubfund11=$mysqli->query($gtsubfund11);
					$stgtsubfund11=$qgstsubfund11->fetch_assoc();	             
					$fundname11=substr($stgtsubfund11['borno_school_fund_name'],0,3);	   
	                }
					}	
					
                    if($sl==12)
					{
					$fundid12=$shstdbal['borno_school_fund_id']; 
					$subfundid12=$shstdbal['borno_school_sub_fund_id'];
	                if($subfundid12!=0)
	                {
$gtsubfund12 = "SELECT * FROM `fiscal_year_details` WHERE `month`= '$subfundid12' GROUP BY `month`";
					$qgstsubfund12=$mysqli->query($gtsubfund12);
					$stgtsubfund12=$qgstsubfund12->fetch_assoc();	               
					$fundname12=substr($stgtsubfund12['month_name'],0,3);
	                }
	                else
	                {
$gtsubfund12 = "SELECT * FROM `fees_head` WHERE `branch_id` ='$branchId' AND `class_id`='$studClass' AND `stsess` ='$stsess' AND `head_id`='$fundid12'";
					$qgstsubfund12=$mysqli->query($gtsubfund12);
					$stgtsubfund12=$qgstsubfund12->fetch_assoc();	             
					$fundname12=substr($stgtsubfund12['borno_school_fund_name'],0,3);	   
	                }
					}
					
                    if($sl==13)
					{
					$fundid13=$shstdbal['borno_school_fund_id']; 
					$subfundid13=$shstdbal['borno_school_sub_fund_id'];
	                if($subfundid13!=0)
	                {
$gtsubfund13 = "SELECT * FROM `fiscal_year_details` WHERE `month`= '$subfundid13' GROUP BY `month`";
					$qgstsubfund13=$mysqli->query($gtsubfund13);
					$stgtsubfund13=$qgstsubfund13->fetch_assoc();	               
					$fundname13=substr($stgtsubfund13['month_name'],0,3);
	                }
	                else
	                {
$gtsubfund13 = "SELECT * FROM `fees_head` WHERE `branch_id` ='$branchId' AND `class_id`='$studClass' AND `stsess` ='$stsess' AND `head_id`='$fundid13'";
					$qgstsubfund13=$mysqli->query($gtsubfund13);
					$stgtsubfund13=$qgstsubfund13->fetch_assoc();	             
					$fundname13=substr($stgtsubfund13['borno_school_fund_name'],0,3);	   
	                }
					}
					
                    if($sl==14)
					{
					$fundid14=$shstdbal['borno_school_fund_id']; 
					$subfundid14=$shstdbal['borno_school_sub_fund_id'];
	                if($subfundid14!=0)
	                {
$gtsubfund14 = "SELECT * FROM `fiscal_year_details` WHERE `month`= '$subfundid14' GROUP BY `month`";
					$qgstsubfund14=$mysqli->query($gtsubfund14);
					$stgtsubfund14=$qgstsubfund14->fetch_assoc();	               
					$fundname14=substr($stgtsubfund14['month_name'],0,3);
	                }
	                else
	                {
$gtsubfund14 = "SELECT * FROM `fees_head` WHERE `branch_id` ='$branchId' AND `class_id`='$studClass' AND `stsess` ='$stsess' AND `head_id`='$fundid14'";
					$qgstsubfund14=$mysqli->query($gtsubfund14);
					$stgtsubfund14=$qgstsubfund14->fetch_assoc();	             
					$fundname14=substr($stgtsubfund14['borno_school_fund_name'],0,3);	   
	                }
					}	
					
                    if($sl==15)
					{
					$fundid15=$shstdbal['borno_school_fund_id']; 
					$subfundid15=$shstdbal['borno_school_sub_fund_id'];
	                if($subfundid15!=0)
	                {
$gtsubfund15 = "SELECT * FROM `fiscal_year_details` WHERE `month`= '$subfundid15' GROUP BY `month`";
					$qgstsubfund15=$mysqli->query($gtsubfund15);
					$stgtsubfund15=$qgstsubfund15->fetch_assoc();	               
					$fundname15=substr($stgtsubfund15['month_name'],0,3);
	                }
	                else
	                {
$gtsubfund15 = "SELECT * FROM `fees_head` WHERE `branch_id` ='$branchId' AND `class_id`='$studClass' AND `stsess` ='$stsess' AND `head_id`='$fundid15'";
					$qgstsubfund15=$mysqli->query($gtsubfund15);
					$stgtsubfund15=$qgstsubfund15->fetch_assoc();	             
					$fundname15=substr($stgtsubfund15['borno_school_fund_name'],0,3);	   
	                }
					}	
					
                    if($sl==16)
					{
					$fundid16=$shstdbal['borno_school_fund_id']; 
					$subfundid16=$shstdbal['borno_school_sub_fund_id'];
	                if($subfundid16!=0)
	                {
$gtsubfund16 = "SELECT * FROM `fiscal_year_details` WHERE `month`= '$subfundid16' GROUP BY `month`";
					$qgstsubfund16=$mysqli->query($gtsubfund16);
					$stgtsubfund16=$qgstsubfund16->fetch_assoc();	               
					$fundname16=substr($stgtsubfund16['month_name'],0,3);
	                }
	                else
	                {
$gtsubfund16 = "SELECT * FROM `fees_head` WHERE `branch_id` ='$branchId' AND `class_id`='$studClass' AND `stsess` ='$stsess' AND `head_id`='$fundid16'";
					$qgstsubfund16=$mysqli->query($gtsubfund16);
					$stgtsubfund16=$qgstsubfund16->fetch_assoc();	             
					$fundname16=substr($stgtsubfund16['borno_school_fund_name'],0,3);	   
	                }
					}	
					
                    if($sl==17)
					{
					$fundid17=$shstdbal['borno_school_fund_id']; 
					$subfundid17=$shstdbal['borno_school_sub_fund_id'];
	                if($subfundid17!=0)
	                {
$gtsubfund17 = "SELECT * FROM `fiscal_year_details` WHERE `month`= '$subfundid17' GROUP BY `month`";
					$qgstsubfund17=$mysqli->query($gtsubfund17);
					$stgtsubfund17=$qgstsubfund17->fetch_assoc();	               
					$fundname17=substr($stgtsubfund17['month_name'],0,3);
	                }
	                else
	                {
$gtsubfund17 = "SELECT * FROM `fees_head` WHERE `branch_id` ='$branchId' AND `class_id`='$studClass' AND `stsess` ='$stsess' AND `head_id`='$fundid17'";
					$qgstsubfund17=$mysqli->query($gtsubfund17);
					$stgtsubfund17=$qgstsubfund17->fetch_assoc();	             
					$fundname17=substr($stgtsubfund17['borno_school_fund_name'],0,3);	   
	                }
					}
					
                    if($sl==18)
					{
					$fundid18=$shstdbal['borno_school_fund_id']; 
					$subfundid18=$shstdbal['borno_school_sub_fund_id'];
	                if($subfundid18!=0)
	                {
$gtsubfund18 = "SELECT * FROM `fiscal_year_details` WHERE `month`= '$subfundid18' GROUP BY `month`";
					$qgstsubfund18=$mysqli->query($gtsubfund18);
					$stgtsubfund18=$qgstsubfund18->fetch_assoc();	               
					$fundname18=substr($stgtsubfund18['month_name'],0,3);
	                }
	                else
	                {
$gtsubfund18 = "SELECT * FROM `fees_head` WHERE `branch_id` ='$branchId' AND `class_id`='$studClass' AND `stsess` ='$stsess' AND `head_id`='$fundid18'";
					$qgstsubfund18=$mysqli->query($gtsubfund18);
					$stgtsubfund18=$qgstsubfund18->fetch_assoc();	             
					$fundname18=substr($stgtsubfund18['borno_school_fund_name'],0,3);	   
	                }
					}	
					
                    if($sl==19)
					{
					$fundid19=$shstdbal['borno_school_fund_id']; 
					$subfundid19=$shstdbal['borno_school_sub_fund_id'];
	                if($subfundid19!=0)
	                {
$gtsubfund19 = "SELECT * FROM `fiscal_year_details` WHERE `month`= '$subfundid19' GROUP BY `month`";
					$qgstsubfund19=$mysqli->query($gtsubfund19);
					$stgtsubfund19=$qgstsubfund19->fetch_assoc();	               
					$fundname19=substr($stgtsubfund19['month_name'],0,3);
	                }
	                else
	                {
$gtsubfund19 = "SELECT * FROM `fees_head` WHERE `branch_id` ='$branchId' AND `class_id`='$studClass' AND `stsess` ='$stsess' AND `head_id`='$fundid19'";
					$qgstsubfund19=$mysqli->query($gtsubfund19);
					$stgtsubfund19=$qgstsubfund19->fetch_assoc();	             
					$fundname19=substr($stgtsubfund19['borno_school_fund_name'],0,3);	   
	                }
					}					
					}
				
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
$this->Cell(60,5,"Student Name",1,0,"C");
$this->Cell(10,5,$GLOBALS['fundname1'],1,0,"C");
$this->Cell(10,5,$GLOBALS['fundname2'],1,0,"C");
$this->Cell(10,5,$GLOBALS['fundname3'],1,0,"C");
$this->Cell(10,5,$GLOBALS['fundname4'],1,0,"C");
$this->Cell(10,5,$GLOBALS['fundname5'],1,0,"C");
$this->Cell(10,5,$GLOBALS['fundname6'],1,0,"C");
$this->Cell(10,5,$GLOBALS['fundname7'],1,0,"C");
$this->Cell(10,5,$GLOBALS['fundname8'],1,0,"C");
$this->Cell(10,5,$GLOBALS['fundname9'],1,0,"C");
$this->Cell(10,5,$GLOBALS['fundname10'],1,0,"C");
$this->Cell(10,5,$GLOBALS['fundname11'],1,0,"C");
$this->Cell(10,5,$GLOBALS['fundname12'],1,0,"C");
$this->Cell(10,5,$GLOBALS['fundname13'],1,0,"C");
$this->Cell(10,5,$GLOBALS['fundname14'],1,0,"C");
$this->Cell(10,5,$GLOBALS['fundname15'],1,0,"C");
if(!empty($GLOBALS['fundname16'])){
$this->Cell(10,5,$GLOBALS['fundname16'],1,0,"C");
if(!empty($GLOBALS['fundname17'])){
$this->Cell(10,5,$GLOBALS['fundname17'],1,0,"C");
if(!empty($GLOBALS['fundname18'])){
$this->Cell(10,5,$GLOBALS['fundname18'],1,0,"C");
if(!empty($GLOBALS['fundname19'])){
$this->Cell(10,5,$GLOBALS['fundname19'],1,0,"C");
}
}
}
}
$this->Cell(20,5,"Total",1,0,"C");
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


		


$memo191 ="SELECT SUM(`receive_amount`) FROM `student_fees` WHERE `student_id` IN (SELECT `borno_student_info_id` FROM `borno_student_info`WHERE `borno_school_section_id` = '$section' AND `session` = '$stsess' ) AND `receive_amount` > 0";
		$qmemo191=$mysqli->query($memo191);
		$shgmemo191=$qmemo191->fetch_assoc();
		$fees191=$shgmemo191['total']; 
		
$pdf->Cell(230,5,'',1,0,"C");	
$pdf->Cell(30,5,"Total Amount",1,0,"C");
$pdf->Cell(20,5,$fees191,1,0,"C");
$pdf->Output();
?>