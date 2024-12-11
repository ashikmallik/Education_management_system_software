<?php

$branchId=$_GET['gtfbranchId'];
$schId=$_GET['schId'];
$shiftId=$_GET['shiftId'];



include('../../../connection.php');

$gtbranch="SELECT * FROM borno_school_branch where borno_school_id=$schId AND borno_school_branch_id=$branchId";
					$qgtbranch=$mysqli->query($gtbranch);
					$sqgtbranch=$qgtbranch->fetch_assoc();
$fnsbranch=$sqgtbranch['borno_school_branch_name'];



$gtshift="SELECT * FROM borno_school_shift where borno_school_shift_id=$shiftId";
					$qgtshift=$mysqli->query($gtshift);
					$sqgtshift=$qgtshift->fetch_assoc();
$fnsshift=$sqgtshift['borno_school_shift_name'];




require('../../fpdf/fpdf.php');
$pdf = new FPDF(L,mm,'legal');
$pdf->AddPage();

					$gtschoolName="SELECT * FROM borno_school where borno_school_id=$schId";
					$qgtschoolName=$mysqli->query($gtschoolName);
					$sqgtschoolName=$qgtschoolName->fetch_assoc();


$fnschname=$sqgtschoolName['borno_school_name'];




$pdf->SetFont('Arial','',18);
$pdf->Cell(280,5,$fnschname,0,0,"C");
$pdf->SetFont('Arial','',12); 
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial','',16); 
$pdf->Cell(280,5,"Shift Wise Class Routine ",0,0,"C");
$pdf->Ln();
$pdf->SetFont('Arial','',12); 
$pdf->Cell(140,5,"Branch : ",0,0,"R");
$pdf->Cell(140,5,$fnsbranch,0,0,"L");
$pdf->Ln();
$pdf->SetFont('Arial','',12); 
$pdf->Cell(140,5,"Shift : ",0,0,"R");
$pdf->Cell(140,5,$fnsshift,0,0,"L");



$pdf->Ln();
$pdf->Ln();
		
$pdf->SetFont('Arial','B',8); 
$pdf->Cell(17,5,"Day/Period",1,0,"C");	
$pdf->Cell(25,5,"Teacher Name",1,0,"L");
$pdf->Cell(37,5,"First Period",1,0,"C");
$pdf->Cell(37,5,"Second Period",1,0,"C");
$pdf->Cell(37,5,"Third Period",1,0,"C");
$pdf->Cell(37,5,"Forth Period",1,0,"C");
$pdf->Cell(37,5,"Fifth Period",1,0,"C");
$pdf->Cell(37,5,"Sixth Period",1,0,"C");
$pdf->Cell(37,5,"Seventh Period",1,0,"C");
$pdf->Cell(37,5,"Eight Period",1,0,"C");
$pdf->Ln();		
$pdf->SetFont('Arial','',8); 

			
$data="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$branchId' AND borno_school_routine_shift_id='$shiftId' group by borno_school_routine_day asc";
		

$sl=0;
					$qdata=$mysqli->query($data);
					while($showdata=$qdata->fetch_assoc()){ $sl++;
		$routinedayid=$showdata['borno_school_routine_day'];
		if($routinedayid==1){$routineday="Saturday";}
		elseif($routinedayid==2){$routineday="Sunday";}
		elseif($routinedayid==3){$routineday="Monday";}
		elseif($routinedayid==4){$routineday="Tuesday";}
		elseif($routinedayid==5){$routineday="Wednesday";}
		elseif($routinedayid==6){$routineday="Thrusday";}
		
$gttotal="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$branchId' AND borno_school_routine_shift_id='$shiftId' AND borno_school_routine_day='$routinedayid'";
					$qgttotal=$mysqli->query($gttotal);
					$total=mysqli_num_rows($qgttotal); 
		$slnm=5*$total;			
		$pdf->Cell(17,$slnm,$routineday,1,0,"C");
		
$gteacher="select * from borno_school_class_routine where borno_school_id='$schId' AND borno_school_routine_branch_id='$branchId' AND borno_school_routine_shift_id='$shiftId' AND borno_school_routine_day='$routinedayid' order by borno_school_routine_teacher_name asc";
			$qgteacher=$mysqli->query($gteacher);
			$sl=0;
			while($sqgteacher=$qgteacher->fetch_assoc()){$sl++;	
			
            $teacherid=$sqgteacher['borno_school_routine_teacher_name'];
            
$gtteachername="SELECT * FROM borno_teacher_info where  	borno_teacher_info_id=$teacherid";
					$qgtteachername=$mysqli->query($gtteachername);
					$sqgtteachername=$qgtteachername->fetch_assoc();
$teachername=$sqgtteachername['borno_teacher_name']; 

            $classid1=$sqgteacher['borno_school_routine_studClass1'];

if($classid1!="")
{              
 $gtclass1="SELECT * FROM borno_school_class where borno_school_class_id=$classid1";
					$qgtclass1=$mysqli->query($gtclass1);
					$sqgclass1=$qgtclass1->fetch_assoc();
$classname1=$sqgclass1['borno_school_class_name']; 
$classstep1=$sqgclass1['class_step']; 
}
else{$classname1=="";}

            $classid2=$sqgteacher['borno_school_routine_studClass2'];

if($classid2!="")
{              
 $gtclass2="SELECT * FROM borno_school_class where borno_school_class_id=$classid2";
					$qgtclass2=$mysqli->query($gtclass2);
					$sqgclass2=$qgtclass2->fetch_assoc();
$classname2=$sqgclass2['borno_school_class_name']; 
$classstep2=$sqgclass2['class_step']; 
}
else{$classname2=="";}

            $classid3=$sqgteacher['borno_school_routine_studClass3'];

if($classid3!="")
{             
 $gtclass3="SELECT * FROM borno_school_class where borno_school_class_id=$classid3";
					$qgtclass3=$mysqli->query($gtclass3);
					$sqgclass3=$qgtclass3->fetch_assoc();
$classname3=$sqgclass3['borno_school_class_name']; 
$classstep3=$sqgclass3['class_step']; 
}
else{$classname3=="";}

            $classid4=$sqgteacher['borno_school_routine_studClass4'];

if($classid4!="")
{             
 $gtclass4="SELECT * FROM borno_school_class where borno_school_class_id=$classid4";
					$qgtclass4=$mysqli->query($gtclass4);
					$sqgclass4=$qgtclass4->fetch_assoc();
$classname4=$sqgclass4['borno_school_class_name']; 
$classstep4=$sqgclass4['class_step']; 
}
else{$classname4=="";}

           $classid5=$sqgteacher['borno_school_routine_studClass5'];

if($classid5!="")
{              
$gtclass5="SELECT * FROM borno_school_class where borno_school_class_id=$classid5";
					$qgtclass5=$mysqli->query($gtclass5);
					$sqgclass5=$qgtclass5->fetch_assoc();
$classname5=$sqgclass5['borno_school_class_name'];
$classstep5=$sqgclass5['class_step']; 
}
else{$classname5=="";}

            $classid6=$sqgteacher['borno_school_routine_studClass6'];
 
if($classid6!="")
{             
$gtclass6="SELECT * FROM borno_school_class where borno_school_class_id=$classid6";
					$qgtclass6=$mysqli->query($gtclass6);
					$sqgclass6=$qgtclass6->fetch_assoc();
$classname6=$sqgclass6['borno_school_class_name']; 
$classstep6=$sqgclass6['class_step']; 
}
else{$classname6=="";}

            $classid7=$sqgteacher['borno_school_routine_studClass7'];

if($classid7!="")
{            
$gtclass7="SELECT * FROM borno_school_class where borno_school_class_id=$classid7";
					$qgtclass7=$mysqli->query($gtclass7);
					$sqgclass7=$qgtclass7->fetch_assoc();
$classname7=$sqgclass7['borno_school_class_name'];
$classstep7=$sqgclass7['class_step']; 
}
else{$classname7=="";}

            $classid8=$sqgteacher['borno_school_routine_studClass8'];

if($classid8!="")
{
$gtclass8="SELECT * FROM borno_school_class where borno_school_class_id=$classid8";
					$qgtclass8=$mysqli->query($gtclass8);
					$sqgclass8=$qgtclass8->fetch_assoc();
$classname8=$sqgclass8['borno_school_class_name'];
$classstep8=$sqgclass8['class_step']; 
}
else{$classname8=="";}

            $sectionid1=$sqgteacher['borno_school_routine_studSection1'];

if($sectionid1!="")
{
$gtsection1="SELECT * FROM borno_school_section where borno_school_section_id=$sectionid1";
					$qgtsection1=$mysqli->query($gtsection1);
					$sqgsection1=$qgtsection1->fetch_assoc();
$sectionname1=substr($sqgsection1['borno_school_section_name'],0,10);
}
else{$sectionname1=="";}

            $sectionid2=$sqgteacher['borno_school_routine_studSection2'];

if($sectionid2!="")
{
$gtsection2="SELECT * FROM borno_school_section where borno_school_section_id=$sectionid2";
					$qgtsection2=$mysqli->query($gtsection2);
					$sqgsection2=$qgtsection2->fetch_assoc();
$sectionname2=substr($sqgsection2['borno_school_section_name'],0,10);
}
else{$sectionname2=="";}

            $sectionid3=$sqgteacher['borno_school_routine_studSection3'];
 
if($sectionid3!="")
{            
$gtsection3="SELECT * FROM borno_school_section where borno_school_section_id=$sectionid3";
					$qgtsection3=$mysqli->query($gtsection3);
					$sqgsection3=$qgtsection3->fetch_assoc();
$sectionname3=substr($sqgsection3['borno_school_section_name'],0,10);
}
else{$sectionname3=="";}

            $sectionid4=$sqgteacher['borno_school_routine_studSection4'];

if($sectionid4!="")
{            
$gtsection4="SELECT * FROM borno_school_section where borno_school_section_id=$sectionid4";
					$qgtsection4=$mysqli->query($gtsection4);
					$sqgsection4=$qgtsection4->fetch_assoc();
$sectionname4=substr($sqgsection4['borno_school_section_name'],0,10);
}
else{$sectionname4=="";}

            $sectionid5=$sqgteacher['borno_school_routine_studSection5'];

if($sectionid5!="")
{            
$gtsection5="SELECT * FROM borno_school_section where borno_school_section_id=$sectionid5";
					$qgtsection5=$mysqli->query($gtsection5);
					$sqgsection5=$qgtsection5->fetch_assoc();
$sectionname5=substr($sqgsection5['borno_school_section_name'],0,10);
}
else{$sectionname5=="";}

            $sectionid6=$sqgteacher['borno_school_routine_studSection6'];

if($sectionid6!="")
{            
$gtsection6="SELECT * FROM borno_school_section where borno_school_section_id=$sectionid6";
					$qgtsection6=$mysqli->query($gtsection6);
					$sqgsection6=$qgtsection6->fetch_assoc();
$sectionname6=substr($sqgsection6['borno_school_section_name'],0,10);
}
else{$sectionname6=="";}

            $sectionid7=$sqgteacher['borno_school_routine_studSection7'];

if($sectionid7!="")
{            
$gtsection7="SELECT * FROM borno_school_section where borno_school_section_id=$sectionid7";
					$qgtsection7=$mysqli->query($gtsection7);
					$sqgsection7=$qgtsection7->fetch_assoc();
$sectionname7=substr($sqgsection7['borno_school_section_name'],0,10);
}
else{$sectionname7=="";}

            $sectionid8=$sqgteacher['borno_school_routine_studSection8'];

if($sectionid8!="")
{
$gtsection8="SELECT * FROM borno_school_section where borno_school_section_id=$sectionid8";
					$qgtsection8=$mysqli->query($gtsection8);
					$sqgsection8=$qgtsection8->fetch_assoc();
$sectionname8=substr($sqgsection8['borno_school_section_name'],0,10);       
}
else{$sectionname8=="";}
                        
            $subjectid1=$sqgteacher['borno_school_routine_sub1'];
            $subjectid2=$sqgteacher['borno_school_routine_sub2'];
            $subjectid3=$sqgteacher['borno_school_routine_sub3'];
            $subjectid4=$sqgteacher['borno_school_routine_sub4'];
            $subjectid5=$sqgteacher['borno_school_routine_sub5'];
            $subjectid6=$sqgteacher['borno_school_routine_sub6'];
            $subjectid7=$sqgteacher['borno_school_routine_sub7'];
            $subjectid8=$sqgteacher['borno_school_routine_sub8'];
                                    
            $time1=$sqgteacher['borno_school_routine_time1'];
            $time2=$sqgteacher['borno_school_routine_time2'];
            $time3=$sqgteacher['borno_school_routine_time3'];
            $time4=$sqgteacher['borno_school_routine_time4'];
            $time5=$sqgteacher['borno_school_routine_time5'];
            $time6=$sqgteacher['borno_school_routine_time6'];
            $time7=$sqgteacher['borno_school_routine_time7'];
            $time8=$sqgteacher['borno_school_routine_time8'];
  
if($classstep1==0)
{
if($subjectid1!="")
{      
$gtsubject1="SELECT * FROM borno_result_subject where borno_result_subject_id=$subjectid1";
					$qgtsubject1=$mysqli->query($gtsubject1);
					$sqgsubject1=$qgtsubject1->fetch_assoc();
$subjectname1=substr($sqgsubject1['borno_school_subject_name'],0,8); 
}
else
{$subjectname1=="";}
}
elseif($classstep1==1)
{
if($subjectid1!="")
{      
$gtsubject1="SELECT * FROM borno_subject_six_eight where subject_id_six_eight=$subjectid1";
					$qgtsubject1=$mysqli->query($gtsubject1);
					$sqgsubject1=$qgtsubject1->fetch_assoc();
$subjectname1=substr($sqgsubject1['six_eight_subject_name'],0,8);  
}
else
{$subjectname1=="";}
}
elseif($classstep1==2)
{
if($subjectid1!="")
{     
$gtsubject1="SELECT * FROM borno_subject_nine_ten where borno_subject_nine_ten_id=$subjectid1";
					$qgtsubject1=$mysqli->query($gtsubject1);
					$sqgsubject1=$qgtsubject1->fetch_assoc();
$subjectname1=substr($sqgsubject1['borno_subject_nine_ten_name'],0,8);  
}
else
{$subjectname1=="";} 
}


if($classstep2==0)
{
if($subjectid2!="")
{     
$gtsubject2="SELECT * FROM borno_result_subject where borno_result_subject_id=$subjectid2";
					$qgtsubject2=$mysqli->query($gtsubject2);
					$sqgsubject2=$qgtsubject2->fetch_assoc();
$subjectname2=substr($sqgsubject2['borno_school_subject_name'],0,8);  
}
else
{$subjectname2=="";} 
}
elseif($classstep2==1)
{
if($subjectid2!="")
{     
$gtsubject2="SELECT * FROM borno_subject_six_eight where subject_id_six_eight=$subjectid2";
					$qgtsubject2=$mysqli->query($gtsubject2);
					$sqgsubject2=$qgtsubject2->fetch_assoc();
$subjectname2=substr($sqgsubject2['six_eight_subject_name'],0,8);   
}
else
{$subjectname2=="";} 
}
elseif($classstep2==2)
{
if($subjectid2!="")
{     
$gtsubject2="SELECT * FROM borno_subject_nine_ten where borno_subject_nine_ten_id=$subjectid2";
					$qgtsubject2=$mysqli->query($gtsubject2);
					$sqgsubject2=$qgtsubject2->fetch_assoc();
$subjectname2=substr($sqgsubject2['borno_subject_nine_ten_name'],0,8);  
}
else
{$subjectname2=="";} 
}


if($classstep3==0)
{
if($subjectid3!="")
{     
$gtsubject3="SELECT * FROM borno_result_subject where borno_result_subject_id=$subjectid3";
					$qgtsubject3=$mysqli->query($gtsubject3);
					$sqgsubject3=$qgtsubject3->fetch_assoc();
$subjectname3=substr($sqgsubject3['borno_school_subject_name'],0,8); 
}
else
{$subjectname3=="";} 
}
elseif($classstep3==1)
{
if($subjectid3!="")
{     
$gtsubject3="SELECT * FROM borno_subject_six_eight where subject_id_six_eight=$subjectid3";
					$qgtsubject3=$mysqli->query($gtsubject3);
					$sqgsubject3=$qgtsubject3->fetch_assoc();
$subjectname3=substr($sqgsubject3['six_eight_subject_name'],0,8);  
}
else
{$subjectname3=="";} 
}
elseif($classstep3==2)
{
if($subjectid3!="")
{     
$gtsubject3="SELECT * FROM borno_subject_nine_ten where borno_subject_nine_ten_id=$subjectid3";
					$qgtsubject3=$mysqli->query($gtsubject3);
					$sqgsubject3=$qgtsubject3->fetch_assoc();
$subjectname3=substr($sqgsubject3['borno_subject_nine_ten_name'],0,8);   
}
else
{$subjectname3=="";} 
}


if($classstep4==0)
{
if($subjectid4!="")
{     
$gtsubject4="SELECT * FROM borno_result_subject where borno_result_subject_id=$subjectid4";
					$qgtsubject4=$mysqli->query($gtsubject4);
					$sqgsubject4=$qgtsubject4->fetch_assoc();
$subjectname4=substr($sqgsubject4['borno_school_subject_name'],0,8);  
}
else
{$subjectname4=="";} 
}
elseif($classstep4==1)
{
if($subjectid4!="")
{     
$gtsubject4="SELECT * FROM borno_subject_six_eight where subject_id_six_eight=$subjectid4";
					$qgtsubject4=$mysqli->query($gtsubject4);
					$sqgsubject4=$qgtsubject4->fetch_assoc();
$subjectname4=substr($sqgsubject4['six_eight_subject_name'],0,8); 
}
else
{$subjectname4=="";} 
}
elseif($classstep4==2)
{
if($subjectid4!="")
{      
$gtsubject4="SELECT * FROM borno_subject_nine_ten where borno_subject_nine_ten_id=$subjectid4";
					$qgtsubject4=$mysqli->query($gtsubject4);
					$sqgsubject4=$qgtsubject4->fetch_assoc();
$subjectname4=substr($sqgsubject4['borno_subject_nine_ten_name'],0,8);  
}
else
{$subjectname4=="";} 
}


if($classstep5==0)
{
if($subjectid5!="")
{      
$gtsubject5="SELECT * FROM borno_result_subject where borno_result_subject_id=$subjectid5";
					$qgtsubject5=$mysqli->query($gtsubject5);
					$sqgsubject5=$qgtsubject5->fetch_assoc();
$subjectname5=substr($sqgsubject5['borno_school_subject_name'],0,8);  
}
else
{$subjectname5=="";} 
}
elseif($classstep5==1)
{
if($subjectid5!="")
{     
$gtsubject5="SELECT * FROM borno_subject_six_eight where subject_id_six_eight=$subjectid5";
					$qgtsubject5=$mysqli->query($gtsubject5);
					$sqgsubject5=$qgtsubject5->fetch_assoc();
$subjectname5=substr($sqgsubject5['six_eight_subject_name'],0,8);  
}
else
{$subjectname5=="";} 
}
elseif($classstep5==2)
{
if($subjectid5!="")
{      
$gtsubject5="SELECT * FROM borno_subject_nine_ten where borno_subject_nine_ten_id=$subjectid5";
					$qgtsubject5=$mysqli->query($gtsubject5);
					$sqgsubject5=$qgtsubject5->fetch_assoc();
$subjectname5=substr($sqgsubject5['borno_subject_nine_ten_name'],0,8);  
}
else
{$subjectname5=="";} 
}


if($classstep6==0)
{
if($subjectid6!="")
{      
$gtsubject6="SELECT * FROM borno_result_subject where borno_result_subject_id=$subjectid6";
					$qgtsubject6=$mysqli->query($gtsubject6);
					$sqgsubject6=$qgtsubject6->fetch_assoc();
$subjectname6=substr($sqgsubject6['borno_school_subject_name'],0,8);  
}
else
{$subjectname6=="";} 
}
elseif($classstep6==1)
{
if($subjectid6!="")
{      
$gtsubject6="SELECT * FROM borno_subject_six_eight where subject_id_six_eight=$subjectid6";
					$qgtsubject6=$mysqli->query($gtsubject6);
					$sqgsubject6=$qgtsubject6->fetch_assoc();
$subjectname6=substr($sqgsubject6['six_eight_subject_name'],0,8);  
}
else
{$subjectname6=="";} 
}
elseif($classstep6==2)
{
if($subjectid6!="")
{    
$gtsubject6="SELECT * FROM borno_subject_nine_ten where borno_subject_nine_ten_id=$subjectid6";
					$qgtsubject6=$mysqli->query($gtsubject6);
					$sqgsubject6=$qgtsubject6->fetch_assoc();
$subjectname6=substr($sqgsubject6['borno_subject_nine_ten_name'],0,8);
}
else
{$subjectname6=="";} 
}


if($classstep7==0)
{
if($subjectid7!="")
{    
$gtsubject7="SELECT * FROM borno_result_subject where borno_result_subject_id=$subjectid7";
					$qgtsubject7=$mysqli->query($gtsubject7);
					$sqgsubject7=$qgtsubject7->fetch_assoc();
$subjectname7=substr($sqgsubject7['borno_school_subject_name'],0,8);   
}
else
{$subjectname7=="";} 
}
elseif($classstep7==1)
{
if($subjectid7!="")
{    
$gtsubject7="SELECT * FROM borno_subject_six_eight where subject_id_six_eight=$subjectid7";
					$qgtsubject7=$mysqli->query($gtsubject7);
					$sqgsubject7=$qgtsubject7->fetch_assoc();
$subjectname7=substr($sqgsubject7['six_eight_subject_name'],0,8);  
}
else
{$subjectname7=="";} 
}
elseif($classstep7==2)
{
if($subjectid7!="")
{      
$gtsubject7="SELECT * FROM borno_subject_nine_ten where borno_subject_nine_ten_id=$subjectid7";
					$qgtsubject7=$mysqli->query($gtsubject7);
					$sqgsubject7=$qgtsubject7->fetch_assoc();
$subjectname7=substr($sqgsubject7['borno_subject_nine_ten_name'],0,8);  
}
else
{$subjectname7=="";} 
}


if($classstep8==0)
{
if($subjectid8!="")
{
$gtsubject8="SELECT * FROM borno_result_subject where borno_result_subject_id=$subjectid8";
					$qgtsubject8=$mysqli->query($gtsubject8);
					$sqgsubject8=$qgtsubject8->fetch_assoc();
$subjectname8=substr($sqgsubject8['borno_school_subject_name'],0,8);    
}
else
{$subjectname8=="";}    
}
elseif($classstep8==1)
{
if($subjectid8!="")
{    
$gtsubject8="SELECT * FROM borno_subject_six_eight where subject_id_six_eight=$subjectid8";
					$qgtsubject8=$mysqli->query($gtsubject8);
					$sqgsubject8=$qgtsubject8->fetch_assoc();
$subjectname8=substr($sqgsubject8['six_eight_subject_name'],0,8);    
}
else
{$subjectname8=="";}  
}
elseif($classstep8==2)
{
if($subjectid8!="")
{    
$gtsubject8="SELECT * FROM borno_subject_nine_ten where borno_subject_nine_ten_id=$subjectid8";
					$qgtsubject8=$mysqli->query($gtsubject8);
					$sqgsubject8=$qgtsubject8->fetch_assoc();
$subjectname8=substr($sqgsubject8['borno_subject_nine_ten_name'],0,8); 
}
else
{$subjectname8=="";}  
}




if($sl!=1)
{
$pdf->Cell(17,5,'',0,0,"C");
}
$pdf->Cell(25,5,$teachername,1,0,"L");
$pdf->Cell(37,5,"$classname1-$sectionname1-$subjectname1",1,0,"C");
$pdf->Cell(37,5,"$classname2-$sectionname2-$subjectname2",1,0,"C");
$pdf->Cell(37,5,"$classname3-$sectionname3-$subjectname3",1,0,"C");
$pdf->Cell(37,5,"$classname4-$sectionname4-$subjectname4",1,0,"C");
$pdf->Cell(37,5,"$classname5-$sectionname5-$subjectname5",1,0,"C");
$pdf->Cell(37,5,"$classname6-$sectionname6-$subjectname6",1,0,"C");
$pdf->Cell(37,5,"$classname7-$sectionname7-$subjectname7",1,0,"C");
$pdf->Cell(37,5,"$classname8-$sectionname8-$subjectname8",1,0,"C");         
$pdf->Ln();

$classname1="";
$classname2="";
$classname3="";
$classname4="";
$classname5="";
$classname6="";
$classname7="";
$classname8="";

$sectionname1="";
$sectionname2="";
$sectionname3="";
$sectionname4="";
$sectionname5="";
$sectionname6="";
$sectionname7="";
$sectionname8="";

$subjectname1="";
$subjectname2="";
$subjectname3="";
$subjectname4="";
$subjectname5="";
$subjectname6="";
$subjectname7="";
$subjectname8="";
            
}
		
}

					

$pdf->Output();
?>