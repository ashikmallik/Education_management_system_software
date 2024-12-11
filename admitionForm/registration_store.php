<?php 
include('db_contection.php');





// $slno =$_POST['id'];
$group =$_POST['group'];
$std_name = $_POST['std_name'];
$std_name_b = $_POST['std_name_b'];
$blood_group = $_POST['blood_group'];
$birth_date = $_POST['birth_date'];
$ssc_group = $_POST['ssc_group'];
$ssc_board = $_POST['ssc_board'];
$ssc_year = $_POST['ssc_year'];
$ssc_rg_no = $_POST['ssc_rg_no'];
$std_phone = $_POST['std_phone'];
$district = $_POST['district'];
$present_address = $_POST['present_address'];
$permanent_address = $_POST['permanent_address'];
// $bangla = $_POST['bangla'];
// $english = $_POST['english'];
// $ict = $_POST['ict'];
$elective_subject1 = $_POST['elective_subject1'];
$elective_subject2 = $_POST['elective_subject2'];
$elective_subject3 = $_POST['elective_subject3'];
$elective_subject4 = $_POST['elective_subject4'];

    echo $elective_subject1." ";  echo $elective_subject2." "; echo $elective_subject3." "; echo $elective_subject4." ";




$forth_sub = $_POST['forth_sub'];
$legalguardian = $_POST['legalguardian'];
$ssc_gpa = $_POST['ssc_gpa'];
$ssc_roll = $_POST['ssc_roll'];
$vaccine = $_POST['vaccine'];
$religion = $_POST['religion'];
$bath_reg_no = $_POST['bath_reg_no'];
$merit_position = $_POST['merit'];
$quota = $_POST['quota'];
$fname = $_POST['fname'];
$fmobile = $_POST['fmobile'];
$foccupation = $_POST['foccupation'];
$annual_income = $_POST['annual_income'];
$mother_name = $_POST['mother_name'];
$mother_mobile = $_POST['mother_mobile'];
$mother_nid = $_POST['mother_nid'];
$mother_occupation = $_POST['mother_occupation'];
$f_nid = $_POST['f_nid'];
$addate = date("d/m/Y");

if(($elective_subject1 != "") AND ($elective_subject2 != "") AND ($elective_subject3 != "") AND ($elective_subject4 != ""))
{
   // echo $elective_subject1." ";  echo $elective_subject2." "; echo $elective_subject3." "; echo $elective_subject4." ";
    
     $message = "Please Select any three subject from the elective subjects";
		echo "<SCRIPT> 
        alert('$message')
        window.location.replace('registration_form.php');
        </SCRIPT>"; 
}

else{
if($elective_subject3 == $forth_sub) {
    
         $message = "You have taken this subject as an elective subject please change your forth subject";
		echo "<SCRIPT> 
        alert('$message')
        window.location.replace('registration_form.php');
        </SCRIPT>";
}
else{
$chekpaymnet="SELECT * FROM `Rocket_payment` WHERE `student_id` ='$ssc_roll' AND `result_code` = 00"; 
	$qchekpaymnet = $mysqli->query($chekpaymnet);
	$smsqchekpaymneth=$qchekpaymnet->fetch_assoc();
	$sid = $smsqchekpaymneth['student_id'];
	if(empty($sid)){
	   $message = "Please pay your admission fee";
		echo "<SCRIPT> 
        alert('$message')
        window.location.replace('index.php');
        </SCRIPT>";  
	}
	else{
$chekpaymnet1="SELECT * FROM `admition_form` WHERE `ssc_roll` = '$ssc_roll'"; 
	$qchekpaymnet1 = $mysqli->query($chekpaymnet1);
	$smsqchekpaymneth1=$qchekpaymnet1->fetch_assoc();
	$sid1 = $smsqchekpaymneth1['ssc_roll'];
	if(!empty($sid1)){
	   $message = "You have already filled up the form";
		echo "<SCRIPT> 
        alert('$message')
        window.location.replace('index.php');
        </SCRIPT>";  
	}
	else{
	    
	$chekpaymnet2="SELECT * FROM `admition_form` WHERE `ssc_rg_no` = '$ssc_rg_no'"; 
	$qchekpaymnet2 = $mysqli->query($chekpaymnet2);
	$smsqchekpaymneth2=$qchekpaymnet2->fetch_assoc();
	$sid2 = $smsqchekpaymneth2['ssc_rg_no'];
	if(!empty($sid2)){
	   $message = "You have already filled up the form";
		echo "<SCRIPT> 
        alert('$message')
        window.location.replace('index.php');
        </SCRIPT>";  
	}    
	
	else{
	    
	$chekpaymnet3="SELECT * FROM `admition_form` WHERE `std_phone` = '$std_phone'"; 
	$qchekpaymnet3 = $mysqli->query($chekpaymnet3);
	$smsqchekpaymneth3=$qchekpaymnet3->fetch_assoc();
	$sid3 = $smsqchekpaymneth3['std_phone'];
	if(!empty($sid3)){
	   $message = "Phone number already used";
		echo "<SCRIPT> 
        alert('$message')
        window.location.replace('registration_form.php');
        </SCRIPT>";  
	}    
	
	else{  

			$allowed =  array('png','jpg','JPG');
			$filename = $_FILES['student_image']['name'];
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			if(!in_array($ext,$allowed) ) {
		$message = "Image extension must be jpg or png";
		echo "<SCRIPT> 
        alert('$message')
        window.location.replace('registration_form.php');
        </SCRIPT>";
			} else {
			
			$rand = time();
			$uploaddir = 'studentphoto/';
			$fnme = $rand."_".basename($_FILES['student_image']['name']);		
			$uploadfile = $uploaddir . $fnme;
			move_uploaded_file($_FILES['student_image']['tmp_name'], $uploadfile);
			
			if($_FILES['student_image']['name']!=""){ $fnme=$fnme; } else { $fnme=""; }
			}

$cheksl ="SELECT * FROM `admition_form` WHERE `group` = '$group' ORDER BY `id` DESC";
$qcheksl=$mysqli->query($cheksl);
$shqcheksl=$qcheksl->fetch_assoc();

if(empty($shqcheksl['id'])){
   if($group =="Humanities") {
      $sid = 230101; 
      $roll = 101;
   }
     if($group =="Business Studies") {
      $sid = 230501; 
      $roll = 501;
   }
      if($group =="Science") {
      $sid = 230901;
       $roll = 901;
   }
    
}
else{
    
  $sid =  $shqcheksl['student_id'];
  $sid = $sid+1;
  
  $roll = $shqcheksl['roll'];
  $roll = $roll+1;
}

		
 $insert = "INSERT INTO `admition_form`(`group`,`student_id`,`roll`, `std_name`, `std_name_b`, `blood_group`, `birth_date`, `ssc_group`, `ssc_board`, `ssc_year`, `ssc_rg_no`, `std_phone`, `district`, `present_address`, `permanent_address`, `sub_bangla`, `sub_eng`, `sub_ict`, `elective_subject1`, `elective_subject2`, `elective_subject3`,`elective_subject4`,`fourth_subject`, `guardian`, `ssc_gpa`, `ssc_roll`, `vaccine`,`religion`, `bath_reg_no`, `merit_position`, `quota`, `fname`, `fmobile`,`fnid`, `foccupation`, `annual_income`, `mother_name`, `mother_mobile`, `mother_nid`, `mother_occupation`, `add_date`,`imagePath`) 
VALUES ('$group','$sid','$roll','$std_name','$std_name_b','$blood_group','$birth_date','$ssc_group','$ssc_board','$ssc_year','$ssc_rg_no','$std_phone','$district','$present_address','$permanent_address','BEN-101','ENG-107','ICT-275','$elective_subject1','$elective_subject2','$elective_subject3','$elective_subject4','$forth_sub','$legalguardian','$ssc_gpa','$ssc_roll','$vaccine','$religion','$bath_reg_no','$merit_position','$quota','$fname','$fmobile','$f_nid','$foccupation','$annual_income','$mother_name','$mother_mobile','$mother_nid','$mother_occupation','$addate','$fnme')"; 
		$qinsert=$mysqli->query($insert);
		
  		
		
		if($qinsert){
        //header("registration_success.php");
        //$message = "Form";
        		echo "<SCRIPT> 
  
        window.location.replace('print_app_form.php?sid=$sid');
        </SCRIPT>";
      // window.location.replace('registration_success.php');$sid
        }
        else{
             $message = "Failed";
		echo "<SCRIPT> 
        alert('$message')
        window.location.replace('registration_form.php');
        </SCRIPT>";
        }
	}		
}
}

}
}
}


?>