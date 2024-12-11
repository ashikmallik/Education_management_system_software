<?php

$year=$_POST['year'];
$month=$_POST['month'];

require_once('student_top.php');
include('../../../connection.php');
           
					$gtschoolName="SELECT * FROM borno_school where borno_school_id='$schId'";
					$qgtschoolName=$mysqli->query($gtschoolName);
   				    $sqgtschoolName=$qgtschoolName->fetch_assoc();
$fnschname=$sqgtschoolName['borno_school_name'];



if($month==1){$monthname="January";}
elseif($month==2){$monthname="February";}
elseif($month==3){$monthname="March";}
elseif($month==4){$monthname="April";}
elseif($month==5){$monthname="May";}
elseif($month==6){$monthname="June";}
elseif($month==7){$monthname="July";}
elseif($month==8){$monthname="August";}
elseif($month==9){$monthname="September";}
elseif($month==10){$monthname="October";}
elseif($month==11){$monthname="November";}
elseif($month==12){$monthname="December";}

$bannar="Teacher Attandance $monthname-$year";

require('../../fpdf/fpdf.php');
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
//    $this->Image('logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',20);
    // Move to the right
    //$this->Cell(80);
    // Title
  
	$this->Cell(280,5,$GLOBALS['fnschname'],0,0,'C');
	$this->Cell(1,6,'',0,0,'C');	
    // Line break
    $this->Ln();
    $this->SetFont('Arial','',14);
    $this->Cell(280,5,$GLOBALS['bannar'],0,0,"C");

    $this->Ln();

    $this->SetFont('Arial','',10);
        $this->Cell(8,10,'SL',1,0,"C"); 		
		$this->Cell(52,10,"Teacher Name",1);
		$this->Cell(8,5,"1",1,0,'C');
        $this->Cell(8,5,"2",1,0,'C');
        $this->Cell(8,5,"3",1,0,'C');
        $this->Cell(8,5,"4",1,0,'C');
        $this->Cell(8,5,"5",1,0,'C');
        $this->Cell(8,5,"6",1,0,'C');
        $this->Cell(8,5,"7",1,0,'C');
        $this->Cell(8,5,"8",1,0,'C');
        $this->Cell(8,5,"9",1,0,'C');
        $this->Cell(8,5,"10",1,0,'C');
        $this->Cell(8,5,"11",1,0,'C');
        $this->Cell(8,5,"12",1,0,'C');
        $this->Cell(8,5,"13",1,0,'C');
        $this->Cell(8,5,"14",1,0,'C');
        $this->Cell(8,5,"15",1,0,'C');
        $this->Cell(8,5,"16",1,0,'C');
        $this->Cell(8,5,"17",1,0,'C');
        $this->Cell(8,5,"18",1,0,'C');
        $this->Cell(8,5,"19",1,0,'C');
        $this->Cell(8,5,"20",1,0,'C');
        $this->Cell(8,5,"21",1,0,'C');
        $this->Cell(8,5,"22",1,0,'C');
        $this->Cell(8,5,"23",1,0,'C');
        $this->Cell(8,5,"24",1,0,'C');
        $this->Cell(8,5,"25",1,0,'C');
        $this->Cell(8,5,"26",1,0,'C');
        $this->Cell(8,5,"27",1,0,'C');
        $this->Cell(8,5,"28",1,0,'C');
        $this->Cell(8,5,"29",1,0,'C');
        $this->Cell(8,5,"30",1,0,'C');
        $this->Cell(8,5,"31",1,0,'C');      
        $this->Cell(8,10,"TP",1,0,'C');
        $this->Cell(8,10,"TA",1,0,'C');     
        $this->Cell(1,5,"",0,0,'C');            
   $this->Ln();
       $this->SetFont('Arial','',7);
		$this->Cell(60,5,"",0,0,'C');
		$this->Cell(4,5,"In",1,0,'C');
		$this->Cell(4,5,"Out",1,0,'C');	
		$this->Cell(4,5,"In",1,0,'C');
		$this->Cell(4,5,"Out",1,0,'C');	
		$this->Cell(4,5,"In",1,0,'C');
		$this->Cell(4,5,"Out",1,0,'C');	
		$this->Cell(4,5,"In",1,0,'C');
		$this->Cell(4,5,"Out",1,0,'C');	
		$this->Cell(4,5,"In",1,0,'C');
		$this->Cell(4,5,"Out",1,0,'C');	
		$this->Cell(4,5,"In",1,0,'C');
		$this->Cell(4,5,"Out",1,0,'C');	
		$this->Cell(4,5,"In",1,0,'C');
		$this->Cell(4,5,"Out",1,0,'C');	
		$this->Cell(4,5,"In",1,0,'C');
		$this->Cell(4,5,"Out",1,0,'C');	
		$this->Cell(4,5,"In",1,0,'C');
		$this->Cell(4,5,"Out",1,0,'C');	
		$this->Cell(4,5,"In",1,0,'C');
		$this->Cell(4,5,"Out",1,0,'C');	
		$this->Cell(4,5,"In",1,0,'C');
		$this->Cell(4,5,"Out",1,0,'C');	
		$this->Cell(4,5,"In",1,0,'C');
		$this->Cell(4,5,"Out",1,0,'C');	
		$this->Cell(4,5,"In",1,0,'C');
		$this->Cell(4,5,"Out",1,0,'C');	
		$this->Cell(4,5,"In",1,0,'C');
		$this->Cell(4,5,"Out",1,0,'C');	
		$this->Cell(4,5,"In",1,0,'C');
		$this->Cell(4,5,"Out",1,0,'C');	
		$this->Cell(4,5,"In",1,0,'C');
		$this->Cell(4,5,"Out",1,0,'C');	
		$this->Cell(4,5,"In",1,0,'C');
		$this->Cell(4,5,"Out",1,0,'C');	
		$this->Cell(4,5,"In",1,0,'C');
		$this->Cell(4,5,"Out",1,0,'C');	
		$this->Cell(4,5,"In",1,0,'C');
		$this->Cell(4,5,"Out",1,0,'C');	
		$this->Cell(4,5,"In",1,0,'C');
		$this->Cell(4,5,"Out",1,0,'C');	
		$this->Cell(4,5,"In",1,0,'C');
		$this->Cell(4,5,"Out",1,0,'C');	
		$this->Cell(4,5,"In",1,0,'C');
		$this->Cell(4,5,"Out",1,0,'C');	
		$this->Cell(4,5,"In",1,0,'C');
		$this->Cell(4,5,"Out",1,0,'C');	
		$this->Cell(4,5,"In",1,0,'C');
		$this->Cell(4,5,"Out",1,0,'C');	
		$this->Cell(4,5,"In",1,0,'C');
		$this->Cell(4,5,"Out",1,0,'C');	
		$this->Cell(4,5,"In",1,0,'C');
		$this->Cell(4,5,"Out",1,0,'C');	
		$this->Cell(4,5,"In",1,0,'C');
		$this->Cell(4,5,"Out",1,0,'C');	
		$this->Cell(4,5,"In",1,0,'C');
		$this->Cell(4,5,"Out",1,0,'C');	
		$this->Cell(4,5,"In",1,0,'C');
		$this->Cell(4,5,"Out",1,0,'C');	
		$this->Cell(4,5,"In",1,0,'C');
		$this->Cell(4,5,"Out",1,0,'C');	
		$this->Cell(4,5,"In",1,0,'C');
		$this->Cell(4,5,"Out",1,0,'C');	
	
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

$pdf = new PDF('L','mm','legal');
$pdf->AliasNbPages();
$pdf->AddPage('L');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','',9);

		$data="select * from borno_teacher_info where borno_school_id='$schId' order by borno_teacher_info_id asc";
					$qdata=$mysqli->query($data);
					while($showdata=$qdata->fetch_assoc()){ $sl++;
					
		
		$stdid=$showdata['borno_teacher_info_id'];
		$techname=$showdata['borno_teacher_name'];

		
		

		$pdf->Cell(8,5,$sl,1,0,"C");
		$pdf->Cell(52,5,$techname,1);
		
	$branch="select * from `borno_teacher_attandance` where `borno_teacher_info_id`='$stdid' AND `borno_school_date`='$year-$month-01'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$intime=$smsbranch['borno_in_time'];
	$outtime=$smsbranch['borno_out_time']; 	
	$absent=$smsbranch['borno_absent'];	
	if($intime!=""){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);  
	$pdf->Cell(4,5,$outtime,1,0,"C",1);
	}  
	elseif($absent=="True"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}
    else{
    $pdf->Cell(4,5,$intime,1,0,"C");   	$pdf->Cell(4,5,$outtime,1,0,"C");    
    }
			
		
	$branch="select * from `borno_teacher_attandance` where `borno_teacher_info_id`='$stdid' AND `borno_school_date`='$year-$month-2'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$intime=$smsbranch['borno_in_time']; 	
	$outtime=$smsbranch['borno_out_time']; 	$absent=$smsbranch['borno_absent'];		
	if($intime!=""){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}  
	elseif($absent=="True"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}
	else{
    $pdf->Cell(4,5,$intime,1,0,"C");   	$pdf->Cell(4,5,$outtime,1,0,"C");    
    }

		
	$branch="select * from `borno_teacher_attandance` where `borno_teacher_info_id`='$stdid' AND `borno_school_date`='$year-$month-3'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$intime=$smsbranch['borno_in_time']; 	
	$outtime=$smsbranch['borno_out_time']; 	$absent=$smsbranch['borno_absent'];		
	if($intime!=""){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}  
	elseif($absent=="True"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}
	else{
    $pdf->Cell(4,5,$intime,1,0,"C");   	$pdf->Cell(4,5,$outtime,1,0,"C");    
    }

		
	$branch="select * from `borno_teacher_attandance` where `borno_teacher_info_id`='$stdid' AND `borno_school_date`='$year-$month-4'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$intime=$smsbranch['borno_in_time']; 	
	$outtime=$smsbranch['borno_out_time']; 	$absent=$smsbranch['borno_absent'];		
	if($intime!=""){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}  
	elseif($absent=="True"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}
	else{
    $pdf->Cell(4,5,$intime,1,0,"C");   	$pdf->Cell(4,5,$outtime,1,0,"C");    
    }

		
	$branch="select * from `borno_teacher_attandance` where `borno_teacher_info_id`='$stdid' AND `borno_school_date`='$year-$month-5'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$intime=$smsbranch['borno_in_time']; 	
	$outtime=$smsbranch['borno_out_time']; 	$absent=$smsbranch['borno_absent'];		
	if($intime!=""){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}  
	elseif($absent=="True"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}
	else{
    $pdf->Cell(4,5,$intime,1,0,"C");   	$pdf->Cell(4,5,$outtime,1,0,"C");    
    }

		
		
	$branch="select * from `borno_teacher_attandance` where `borno_teacher_info_id`='$stdid' AND `borno_school_date`='$year-$month-6'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$intime=$smsbranch['borno_in_time']; 	
	$outtime=$smsbranch['borno_out_time']; 	$absent=$smsbranch['borno_absent'];		
	if($intime!=""){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}  
	elseif($absent=="True"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}
	else{
    $pdf->Cell(4,5,$intime,1,0,"C");   	$pdf->Cell(4,5,$outtime,1,0,"C");    
    }
	
		
	$branch="select * from `borno_teacher_attandance` where `borno_teacher_info_id`='$stdid' AND `borno_school_date`='$year-$month-7'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$intime=$smsbranch['borno_in_time']; 	
	$outtime=$smsbranch['borno_out_time']; 	$absent=$smsbranch['borno_absent'];		
	if($intime!=""){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}  
	elseif($absent=="True"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}
	else{
    $pdf->Cell(4,5,$intime,1,0,"C");   	$pdf->Cell(4,5,$outtime,1,0,"C");    
    }
	
	$branch="select * from `borno_teacher_attandance` where `borno_teacher_info_id`='$stdid' AND `borno_school_date`='$year-$month-8'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$intime=$smsbranch['borno_in_time']; 	
	$outtime=$smsbranch['borno_out_time']; 	$absent=$smsbranch['borno_absent'];		
	if($intime!=""){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}  
	elseif($absent=="True"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}
	else{
    $pdf->Cell(4,5,$intime,1,0,"C");   	$pdf->Cell(4,5,$outtime,1,0,"C");    
    }
		
	$branch="select * from `borno_teacher_attandance` where `borno_teacher_info_id`='$stdid' AND `borno_school_date`='$year-$month-9'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$intime=$smsbranch['borno_in_time']; 	
	$outtime=$smsbranch['borno_out_time']; 	$absent=$smsbranch['borno_absent'];		
	if($intime!=""){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}  
	elseif($absent=="True"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}
	else{
    $pdf->Cell(4,5,$intime,1,0,"C");   	$pdf->Cell(4,5,$outtime,1,0,"C");    
    }
	
		
	$branch="select * from `borno_teacher_attandance` where `borno_teacher_info_id`='$stdid' AND `borno_school_date`='$year-$month-10'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$intime=$smsbranch['borno_in_time']; 	
	$outtime=$smsbranch['borno_out_time']; 	$absent=$smsbranch['borno_absent'];		
	if($intime!=""){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}  
	elseif($absent=="True"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}
	else{
    $pdf->Cell(4,5,$intime,1,0,"C");   	$pdf->Cell(4,5,$outtime,1,0,"C");    
    }

		
	$branch="select * from `borno_teacher_attandance` where `borno_teacher_info_id`='$stdid' AND `borno_school_date`='$year-$month-11'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$intime=$smsbranch['borno_in_time']; 	
	$outtime=$smsbranch['borno_out_time']; 	$absent=$smsbranch['borno_absent'];		
	if($intime!=""){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}  
	elseif($absent=="True"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}
	else{
    $pdf->Cell(4,5,$intime,1,0,"C");   	$pdf->Cell(4,5,$outtime,1,0,"C");    
    }

		
	$branch="select * from `borno_teacher_attandance` where `borno_teacher_info_id`='$stdid' AND `borno_school_date`='$year-$month-12'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$intime=$smsbranch['borno_in_time']; 	
	$outtime=$smsbranch['borno_out_time']; 	$absent=$smsbranch['borno_absent'];		
	if($intime!=""){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}  
	elseif($absent=="True"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}
	else{
    $pdf->Cell(4,5,$intime,1,0,"C");   	$pdf->Cell(4,5,$outtime,1,0,"C");    
    }
	
		
	$branch="select * from `borno_teacher_attandance` where `borno_teacher_info_id`='$stdid' AND `borno_school_date`='$year-$month-13'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$intime=$smsbranch['borno_in_time']; 	
	$outtime=$smsbranch['borno_out_time']; 	$absent=$smsbranch['borno_absent'];		
	if($intime!=""){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}  
	elseif($absent=="True"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}
	else{
    $pdf->Cell(4,5,$intime,1,0,"C");   	$pdf->Cell(4,5,$outtime,1,0,"C");    
    }
	
	$branch="select * from `borno_teacher_attandance` where `borno_teacher_info_id`='$stdid' AND `borno_school_date`='$year-$month-14'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$intime=$smsbranch['borno_in_time']; 
	$outtime=$smsbranch['borno_out_time']; 	$absent=$smsbranch['borno_absent'];		
	if($intime!=""){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}  
	elseif($absent=="True"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}
	else{
    $pdf->Cell(4,5,$intime,1,0,"C");   	$pdf->Cell(4,5,$outtime,1,0,"C");    
    }

		
	$branch="select * from `borno_teacher_attandance` where `borno_teacher_info_id`='$stdid' AND `borno_school_date`='$year-$month-15'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$intime=$smsbranch['borno_in_time']; 
	$outtime=$smsbranch['borno_out_time']; 	$absent=$smsbranch['borno_absent'];		
	if($intime!=""){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}  
	elseif($absent=="True"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}
	else{
    $pdf->Cell(4,5,$intime,1,0,"C");   	$pdf->Cell(4,5,$outtime,1,0,"C");    
    }

		
	$branch="select * from `borno_teacher_attandance` where `borno_teacher_info_id`='$stdid' AND `borno_school_date`='$year-$month-16'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$intime=$smsbranch['borno_in_time']; 
	$outtime=$smsbranch['borno_out_time']; 	$absent=$smsbranch['borno_absent'];		
	if($intime!=""){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}  
	elseif($absent=="True"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}
	else{
    $pdf->Cell(4,5,$intime,1,0,"C");   	$pdf->Cell(4,5,$outtime,1,0,"C");    
    }
	
		
	$branch="select * from `borno_teacher_attandance` where `borno_teacher_info_id`='$stdid' AND `borno_school_date`='$year-$month-17'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$intime=$smsbranch['borno_in_time']; 	
	$outtime=$smsbranch['borno_out_time']; 	$absent=$smsbranch['borno_absent'];		
	if($intime!=""){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}  
	elseif($absent=="True"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}
	else{
    $pdf->Cell(4,5,$intime,1,0,"C");   	$pdf->Cell(4,5,$outtime,1,0,"C");    
    }

		
	$branch="select * from `borno_teacher_attandance` where `borno_teacher_info_id`='$stdid' AND `borno_school_date`='$year-$month-18'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$intime=$smsbranch['borno_in_time']; 	
	$outtime=$smsbranch['borno_out_time']; 	$absent=$smsbranch['borno_absent'];		
	if($intime!=""){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}  
	elseif($absent=="True"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}
	else{
    $pdf->Cell(4,5,$intime,1,0,"C");   	$pdf->Cell(4,5,$outtime,1,0,"C");    
    }

	$branch="select * from `borno_teacher_attandance` where `borno_teacher_info_id`='$stdid' AND `borno_school_date`='$year-$month-19'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$intime=$smsbranch['borno_in_time']; 	
	$outtime=$smsbranch['borno_out_time']; 	$absent=$smsbranch['borno_absent'];		
	if($intime!=""){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}  
	elseif($absent=="True"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}
	else{
    $pdf->Cell(4,5,$intime,1,0,"C");   	$pdf->Cell(4,5,$outtime,1,0,"C");    
    }
	
		
	$branch="select * from `borno_teacher_attandance` where `borno_teacher_info_id`='$stdid' AND `borno_school_date`='$year-$month-20'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$intime=$smsbranch['borno_in_time']; 	
	$outtime=$smsbranch['borno_out_time']; 	$absent=$smsbranch['borno_absent'];		
	if($intime!=""){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}  
	elseif($absent=="True"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}
	else{
    $pdf->Cell(4,5,$intime,1,0,"C");   	$pdf->Cell(4,5,$outtime,1,0,"C");    
    }
	
		
	$branch="select * from `borno_teacher_attandance` where `borno_teacher_info_id`='$stdid' AND `borno_school_date`='$year-$month-21'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$intime=$smsbranch['borno_in_time']; 	
	$outtime=$smsbranch['borno_out_time']; 	$absent=$smsbranch['borno_absent'];		
	if($intime!=""){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}  
	elseif($absent=="True"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}
	else{
    $pdf->Cell(4,5,$intime,1,0,"C");   	$pdf->Cell(4,5,$outtime,1,0,"C");    
    }
	
		
	$branch="select * from `borno_teacher_attandance` where `borno_teacher_info_id`='$stdid' AND `borno_school_date`='$year-$month-22'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$intime=$smsbranch['borno_in_time']; 
	$outtime=$smsbranch['borno_out_time']; 	$absent=$smsbranch['borno_absent'];		
	if($intime!=""){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}  
	elseif($absent=="True"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}
	else{
    $pdf->Cell(4,5,$intime,1,0,"C");   	$pdf->Cell(4,5,$outtime,1,0,"C");    
    }
	
		
	$branch="select * from `borno_teacher_attandance` where `borno_teacher_info_id`='$stdid' AND `borno_school_date`='$year-$month-23'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$intime=$smsbranch['borno_in_time']; 
	$outtime=$smsbranch['borno_out_time']; 	$absent=$smsbranch['borno_absent'];		
	if($intime!=""){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}  
	elseif($absent=="True"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}
	else{
    $pdf->Cell(4,5,$intime,1,0,"C");   	$pdf->Cell(4,5,$outtime,1,0,"C");    
    }
	
		
	$branch="select * from `borno_teacher_attandance` where `borno_teacher_info_id`='$stdid' AND `borno_school_date`='$year-$month-24'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$intime=$smsbranch['borno_in_time']; 	
	$outtime=$smsbranch['borno_out_time']; 	$absent=$smsbranch['borno_absent'];		
	if($intime!=""){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}  
	elseif($absent=="True"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}
	else{
    $pdf->Cell(4,5,$intime,1,0,"C");   	$pdf->Cell(4,5,$outtime,1,0,"C");    
    }
	
		
	$branch="select * from `borno_teacher_attandance` where `borno_teacher_info_id`='$stdid' AND `borno_school_date`='$year-$month-25'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$intime=$smsbranch['borno_in_time']; 
	$outtime=$smsbranch['borno_out_time']; 	$absent=$smsbranch['borno_absent'];		
	if($intime!=""){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}  
	elseif($absent=="True"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}
	else{
    $pdf->Cell(4,5,$intime,1,0,"C");   	$pdf->Cell(4,5,$outtime,1,0,"C");    
    }

		
	$branch="select * from `borno_teacher_attandance` where `borno_teacher_info_id`='$stdid' AND `borno_school_date`='$year-$month-26'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$intime=$smsbranch['borno_in_time']; 	
	$outtime=$smsbranch['borno_out_time']; 	$absent=$smsbranch['borno_absent'];		
	if($intime!=""){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}  
	elseif($absent=="True"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}
	else{
    $pdf->Cell(4,5,$intime,1,0,"C");   	$pdf->Cell(4,5,$outtime,1,0,"C");    
    }
	
		
	$branch="select * from `borno_teacher_attandance` where `borno_teacher_info_id`='$stdid' AND `borno_school_date`='$year-$month-27'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$intime=$smsbranch['borno_in_time']; 
	$outtime=$smsbranch['borno_out_time']; 	$absent=$smsbranch['borno_absent'];		
	if($intime!=""){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}  
	elseif($absent=="True"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}
	else{
    $pdf->Cell(4,5,$intime,1,0,"C");   	$pdf->Cell(4,5,$outtime,1,0,"C");    
    }
	
		
	$branch="select * from `borno_teacher_attandance` where `borno_teacher_info_id`='$stdid' AND `borno_school_date`='$year-$month-28'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$intime=$smsbranch['borno_in_time']; 
	$outtime=$smsbranch['borno_out_time']; 	$absent=$smsbranch['borno_absent'];		
	if($intime!=""){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}  
	elseif($absent=="True"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}
	else{
    $pdf->Cell(4,5,$intime,1,0,"C");   	$pdf->Cell(4,5,$outtime,1,0,"C");    
    }
	
		
	$branch="select * from `borno_teacher_attandance` where `borno_teacher_info_id`='$stdid' AND `borno_school_date`='$year-$month-29'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$intime=$smsbranch['borno_in_time']; 	
	$outtime=$smsbranch['borno_out_time']; 	$absent=$smsbranch['borno_absent'];		
	if($intime!=""){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}  
	elseif($absent=="True"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}
	else{
    $pdf->Cell(4,5,$intime,1,0,"C");   	$pdf->Cell(4,5,$outtime,1,0,"C");    
    }
	
		
	$branch="select * from `borno_teacher_attandance` where `borno_teacher_info_id`='$stdid' AND `borno_school_date`='$year-$month-30'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$intime=$smsbranch['borno_in_time']; 	
	$outtime=$smsbranch['borno_out_time']; 	$absent=$smsbranch['borno_absent'];		
	if($intime!=""){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}  
	elseif($absent=="True"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}
	else{
    $pdf->Cell(4,5,$intime,1,0,"C");   	$pdf->Cell(4,5,$outtime,1,0,"C");    
    }
		
	$branch="select * from `borno_teacher_attandance` where `borno_teacher_info_id`='$stdid' AND `borno_school_date`='$year-$month-31'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$intime=$smsbranch['borno_in_time']; 
	$outtime=$smsbranch['borno_out_time']; 	$absent=$smsbranch['borno_absent'];		
	if($intime!=""){
	$pdf->setFillColor(0,230,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}  
	elseif($absent=="True"){
	$pdf->setFillColor(250,0,0);     
	$pdf->Cell(4,5,$intime,1,0,"C",1);   	$pdf->Cell(4,5,$outtime,1,0,"C",1);    
	}
	else{
    $pdf->Cell(4,5,$intime,1,0,"C");   	$pdf->Cell(4,5,$outtime,1,0,"C");    
    }

	$branch="select Count(borno_teacher_info_id) As presence from `borno_teacher_attandance` where `borno_teacher_info_id`='$stdid' AND `borno_absent`=''";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$presence=$smsbranch['presence'];
	    $pdf->Cell(8,5,$presence,1,0,"C");
	    
	$branch="select Count(borno_teacher_info_id) As absent from `borno_teacher_attandance` where `borno_teacher_info_id`='$stdid' AND `borno_absent`='True'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	$absent=$smsbranch['absent'];
	    $pdf->Cell(8,5,$absent,1,0,"C");	    
	
$pdf->Ln();
}






		


$pdf->Output();
?>