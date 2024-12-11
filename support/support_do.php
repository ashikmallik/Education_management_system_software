<?php 
include('../connection.php');


$sid= $_POST['sid'];
$contact= $_POST['contact'];
$category= $_POST['category'];
$subject= $_POST['subject'];
$description= $_POST['description'];



			$allowed =  array('gif','png' ,'jpg','JPG','pdf');
			$filename = $_FILES['attachemnet']['name'];
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			if(!in_array($ext,$allowed) ) {
			$fnme="";
			} else {
			
			$rand = time();
			$uploaddir = '../support_file/';
			$fnme = $rand."_".basename($_FILES['attachemnet']['name']);		
			$uploadfile = $uploaddir . $fnme;
			move_uploaded_file($_FILES['attachemnet']['tmp_name'], $uploadfile);
			
			if($_FILES['attachemnet']['name']!=""){ $fnme=$fnme; } else { $fnme=""; }
			}

//echo $sid." ";echo $contact." ";echo $category." ";echo $subject." ";echo $description." ";echo $fnme." ";

 $chek = "SELECT `borno_student_info_id` FROM `borno_student_info` WHERE `borno_student_info_id` ='$sid' AND `borno_school_phone` = '88$contact'";
 	$rsQuery1 = $mysqli->query($chek);
	$smsbranch=$rsQuery1->fetch_assoc();
    $student_id = $smsbranch['borno_student_info_id'];
    if($student_id == ""){
        $message = "Student ID OR Phone No. not matched";
		echo "<SCRIPT> 
        alert('$message')
        window.location.replace('index.php');
        </SCRIPT>";
    }
    else{
        
        $submitdate = date("d/m/Y");
        
        if($category == "Fees"){
            $priroty = 'High';
        }
        else if($category == "Result"){
            $priroty = 'Medium';
        }
        else if($category == "Information Update"){
            $priroty = 'Low';
        }
        
        $insert = "INSERT INTO `student_support_ticket`(`category`, `sub_catagory`, `problem_titel`, `description`, `attached_file`, `priroty`, `status`, `submit_date`, `solved_date`, `add_by`, `student_id`, `phone_no`, `solved_by`) 
        VALUES ('$category','','$subject','$description','$fnme','$priroty','0','$submitdate','','Parents','$sid','$contact','')";
        $qinsertst=$mysqli->query($insert);
        
        if($qinsertst){
             $message = "Submitted Successfully";
		echo "<SCRIPT> 
        alert('$message')
        window.location.replace('index.php');
        </SCRIPT>";
        }
        else{
             $message = "Failed";
		echo "<SCRIPT> 
        alert('$message')
        window.location.replace('index.php');
        </SCRIPT>";
        }
    }



?>