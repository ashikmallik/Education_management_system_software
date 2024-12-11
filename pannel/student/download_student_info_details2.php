<?php

$branchId=$_GET['branchId'];
$schId=$_GET['schoolId'];
$studClass=$_GET['studClass'];
$shiftId=$_GET['shiftId'];
$section=$_GET['section'];
$stsess=trim($_GET['stsess']);

include('../../../connection.php');

$gtschoolName="SELECT * FROM borno_school where borno_school_id='$schId'";
					$qgtschoolName=$mysqli->query($gtschoolName);
					$sqgtschoolName=$qgtschoolName->fetch_assoc();
$fnschname=$sqgtschoolName['borno_school_name'];

$gtbranch="SELECT * FROM borno_school_branch where borno_school_id=$schId AND borno_school_branch_id='$branchId'";
					$qgtbranch=$mysqli->query($gtbranch);
					$sqgtbranch=$qgtbranch->fetch_assoc();
$fnsbranch=$sqgtbranch['borno_school_branch_name'];

$gtclass="SELECT * FROM borno_school_class where borno_school_class_id='$studClass'";
					$qgtclass=$mysqli->query($gtclass);
					$sqgtclass=$qgtclass->fetch_assoc();
$fnsclass=$sqgtclass['borno_school_class_name'];

$gtshift="SELECT * FROM borno_school_shift where borno_school_shift_id='$shiftId'";
					$qgtshift=$mysqli->query($gtshift);
					$sqgtshift=$qgtshift->fetch_assoc();
$fnsshift=$sqgtshift['borno_school_shift_name'];

$gtsection="SELECT * FROM borno_school_section where borno_school_section_id='$section'";
					$qgtsection=$mysqli->query($gtsection);
					$sqgtsection=$qgtsection->fetch_assoc();
$fnssection=$sqgtsection['borno_school_section_name'];

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
   
	$this->Cell(170,5,$GLOBALS['fnschname'],0,1,'C');
    // Line break
    $this->Ln();
    $this->SetFont('Arial','',14);
    $this->Cell(135,5,"STUDENT ADMISSION INFORMATION $stsess",0,0,"R");
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
$pdf->AddPage('P');
             
             

	
		


			
					$data="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' order by borno_school_roll asc";
					$qdata=$mysqli->query($data);
					while($showdata=$qdata->fetch_assoc()){ $sl++;
					

		$rollno=$showdata['borno_school_roll'];
		$techname=$showdata['borno_school_student_name'];
		$techPhone=substr($showdata['borno_school_phone'],2,11);
		$fname=$showdata['borno_school_father_name'];
		$mname=$showdata['borno_school_mother_name'];
		$dob=$showdata['borno_school_dob'];	
		//echo $dob;
		$blg=$showdata['borno_school_blood_group'];	 
		$religion=$showdata['borno_school_religion'];
		$mobile=$showdata['borno_school_phone'];
		
		$student_id_office=$showdata['borno_student_info_id'];
		$blood_group=$showdata['blood_group'];
		$birth_reg_no=$showdata['birth_reg_no'];
		$father_occupation=$showdata['father_occupation'];
		$mother_occupation=$showdata['mother_occupation'];
		$father_mobile_no=$showdata['father_mobile_no'];
		$mother_mobile_no=$showdata['mother_mobile_no'];
		$father_nid_no=$showdata['father_nid_no'];
		$mother_nid_no=$showdata['mother_nid_no'];
		$guardians_name=$showdata['guardians_name'];
		$guardians_relationship=$showdata['guardians_relationship'];
		$pre_village=$showdata['pre_village'];
		$pre_post=$showdata['pre_post'];
		$pre_upazilla=$showdata['pre_upazilla'];
		$pre_district=$showdata['pre_district'];
		$pre_division=$showdata['pre_division'];
		$par_village=$showdata['par_village'];
		$par_post=$showdata['par_post'];
		$par_upazilla=$showdata['par_upazilla'];
		$par_district=$showdata['par_district'];
		$par_division=$showdata['par_division'];
		$guardians_mobile_no=$showdata['guardians_mobile_no'];
		
		$class_id=$showdata['borno_school_class_id'];
		
		$results=mysqli_query($mysqli, "SELECT borno_school_class_name FROM borno_school_class where borno_school_class_id='$class_id'");
		foreach($results as $result){
		   $class_name=$result['borno_school_class_name'];
		}
		
		$section_id=$showdata['borno_school_section_id'];
		
		$results2=mysqli_query($mysqli, "SELECT borno_school_section_name FROM borno_school_section where borno_school_section_id='$section_id'");
		foreach($results2 as $result2){
		   $section_name=$result2['borno_school_section_name'];
		}
		if($showdata['borno_school_shift_id']==2){
		    $shiftname="Morning";
		}else{
		    $shiftname="Day";
		}
		
		if(!empty($showdata['borno_school_photo'])){
		$photo=$showdata['borno_school_photo'];
		$image='studentphoto/'.$photo;
		}else{
		  $image='studentphoto/nophoto.jpg';
		}
		
		
				
		$pdf->SetFont('Arial','I',11);	
		 $pdf->setLeftMargin(7);
	   
	   $pdf->Cell(70,5,' ',0,0,"C");	
       $pdf->Ln(20);
       $pdf->Cell(197,5,' ',0,0,"C");
       $pdf->Image("$image", 175, 15, 27, 30);
       $pdf->Cell(1,1,'',0,0,"C");
       $pdf->Ln();
       $pdf->Ln();
       
      
       
		$pdf->Cell(10,7.5,'1',1,0,"C");
		$pdf->Cell(60,7.5,'Student Name',1);
		$pdf->Cell(7,7.5,':',1,0,"C");
		$pdf->Cell(120,7.5,$techname,1);
		$pdf->Ln();
		$pdf->Cell(10,7.5,'2',1,0,"C");
		$pdf->Cell(60,7.5,'Student Id Office',1);
		$pdf->Cell(7,7.5,':',1,0,"C");
		$pdf->Cell(120,7.5,$student_id_office,1);
		$pdf->Ln();
		$pdf->Cell(10,37.5,'3',1,0,"C");
		$pdf->Cell(60,37.5,'Student Fill Up',1);
		$pdf->Cell(7,7.5,':',1,0,"C");
		$pdf->Cell(30,7.5,'Class',1);
		$pdf->Cell(30,7.5,$class_name,1);
		$pdf->Cell(30,7.5,'Shift',1);
		$pdf->Cell(30,7.5,$shiftname,1);
		
		$pdf->Ln();
	    
	    $pdf->Cell(77,7.5,' ',0);
		$pdf->Cell(30,7.5,'Section',1);
		$pdf->Cell(30,7.5,$section_name,1);
		$pdf->Cell(30,7.5,'Roll',1);
		$pdf->Cell(30,7.5,$rollno,1);
		$pdf->Ln();
	    
	    $pdf->Cell(77,7.5,' ',0);
		$pdf->Cell(30,7.5,'Religion',1);
		$pdf->Cell(30,7.5,$religion,1);
		$pdf->Cell(30,7.5,'Date of Birth',1);
		$pdf->Cell(30,7.5,$dob,1);
		$pdf->Ln();
	    
	    $pdf->Cell(77,7.5,' ',0);
		$pdf->Cell(30,7.5,'Blood Group',1);
		$pdf->Cell(90,7.5,$blg,1);
		$pdf->Ln();
	    
	    $pdf->Cell(77,7.5,' ',0);
		$pdf->Cell(30,7.5,'Birth Reg.No',1);
		$pdf->Cell(90,7.5,$birth_reg_no,1);
		$pdf->Ln();
		
		$pdf->Cell(10,7.5,'4',1,0,"C");
		$pdf->Cell(60,7.5,"Father's Name",1);
		$pdf->Cell(7,7.5,':',1,0,"C");
		$pdf->Cell(120,7.5,$fname,1);
		$pdf->Ln();
		
		$pdf->Cell(10,7.5,'5',1,0,"C");
		$pdf->Cell(60,7.5,'Occupation',1);
		$pdf->Cell(7,7.5,':',1,0,"C");
		$pdf->Cell(120,7.5,$father_occupation,1);
		$pdf->Ln();
		
		$pdf->Cell(10,7.5,'6',1,0,"C");
		$pdf->Cell(60,7.5,'Mobile No.',1);
		$pdf->Cell(7,7.5,':',1,0,"C");
		$pdf->Cell(120,7.5,$father_mobile_no,1);
		$pdf->Ln();
		
		$pdf->Cell(10,7.5,'7',1,0,"C");
		$pdf->Cell(60,7.5,'Nid No.',1);
		$pdf->Cell(7,7.5,':',1,0,"C");
		$pdf->Cell(120,7.5,$father_nid_no,1);
		$pdf->Ln();
		
		$pdf->Cell(10,7.5,'8',1,0,"C");
		$pdf->Cell(60,7.5,"Mother's Name",1);
		$pdf->Cell(7,7.5,':',1,0,"C");
		$pdf->Cell(120,7.5,$mname,1);
		$pdf->Ln();
		
		$pdf->Cell(10,7.5,'9',1,0,"C");
		$pdf->Cell(60,7.5,'Occupation',1);
		$pdf->Cell(7,7.5,':',1,0,"C");
		$pdf->Cell(120,7.5,$mother_occupation,1);
		$pdf->Ln();
		
		$pdf->Cell(10,7.5,'10',1,0,"C");
		$pdf->Cell(60,7.5,'Mobile No.',1);
		$pdf->Cell(7,7.5,':',1,0,"C");
		$pdf->Cell(120,7.5,$mother_mobile_no,1);
		$pdf->Ln();
		
		$pdf->Cell(10,7.5,'11',1,0,"C");
		$pdf->Cell(60,7.5,'Nid No..',1);
		$pdf->Cell(7,7.5,':',1,0,"C");
		$pdf->Cell(120,7.5,$mother_nid_no,1);
		$pdf->Ln();
		
		
		$pdf->Cell(10,7.5,'12',1,0,"C");
		$pdf->Cell(60,7.5,'Guardian Name (if possiable)',1);
		$pdf->Cell(7,7.5,':',1,0,"C");
		$pdf->Cell(75,7.5,$guardians_name,1);
		$pdf->Cell(45,7.5,'Relationship',1);
		$pdf->Ln();
		
		
		
		
		$pdf->Cell(10,7.5,'13',1,0,"C");
		$pdf->Cell(60,7.5,'Mobile No.',1);
		$pdf->Cell(7,7.5,':',1,0,"C");
		$pdf->Cell(75,7.5,$guardians_mobile_no,1);
		$pdf->Cell(45,7.5,$guardians_relationship,1);
		$pdf->Ln();
		
		$pdf->Cell(10,22.5,'14',1,0,"C");
		$pdf->Cell(60,22.5,'Present Address',1);
		$pdf->Cell(27,7.5,'Vill:/Moholla',1);
		$pdf->Cell(100,7.5,$pre_village,1);
		$pdf->Ln();
		
		$pdf->Cell(70,7.5,' ',0);
		$pdf->Cell(27,7.5,'Post',1);
		$pdf->Cell(28,7.5,$pre_post,1);
		$pdf->Cell(27,7.5,'Upazilla',1);
		$pdf->Cell(45,7.5,$pre_upazilla,1);
		$pdf->Ln();
		
		$pdf->Cell(70,7.5,' ',0);
		$pdf->Cell(27,7.5,'District',1);
		$pdf->Cell(28,7.5,$pre_district,1);
		$pdf->Cell(27,7.5,'Division',1);
		$pdf->Cell(45,7.5,$pre_division,1);
		$pdf->Ln();
		
		$pdf->Cell(10,22.5,'14',1,0,"C");
		$pdf->Cell(60,22.5,'Parmanent Address',1);
		$pdf->Cell(27,7.5,'Vill:/Moholla',1);
		$pdf->Cell(100,7.5,$par_villag,1);
		$pdf->Ln();
		
		$pdf->Cell(70,7.5,' ',0);
		$pdf->Cell(27,7.5,'Post',1);
		$pdf->Cell(28,7.5,$par_post,1);
		$pdf->Cell(27,7.5,'Upazilla',1);
		$pdf->Cell(45,7.5,$par_upazilla,1);
		$pdf->Ln();
		
		$pdf->Cell(70,7.5,' ',0);
		$pdf->Cell(27,7.5,'District',1);
		$pdf->Cell(28,7.5,$par_district,1);
		$pdf->Cell(27,7.5,'Division',1);
		$pdf->Cell(45,7.5,$par_division,1);

		
		$pdf->Ln(25);
		
		$pdf->Cell(5,6,'',0);
	    $pdf->Cell(150,2,'________________',0);

		$pdf->Cell(31,2,'________________',0);
		$pdf->Ln();
        
        $pdf->Cell(5,6,'',0);
		$pdf->Cell(150,6,'Guardian Signature',0);

		$pdf->Cell(31,6,' Students Signature',0);

        $pdf->Ln(30);
        $pdf->Ln();
        
	}

$pdf->Output();
?>