<?php 
include('config.php');

if(isset($_POST['add'])){
$sid= $_POST['sid'];
$contact= $_POST['contact'];
$category= $_POST['category'];
$subject= $_POST['subject'];
$description= $_POST['description'];
$remarks= $_POST['remarks'];
if(empty($_POST['forsms'])){
    $_POST['forsms'] = 0;
}
$forsms= $_POST['forsms'];

 $chek = "SELECT `borno_student_info_id` FROM `borno_student_info` WHERE `borno_student_info_id` ='$sid'";
 	$rsQuery1 = $mysqli->query($chek);
	$smsbranch=$rsQuery1->fetch_assoc();
    $student_id = $smsbranch['borno_student_info_id'];
    if($student_id == ""){
        $message = "Student ID not in the database";
		echo "<SCRIPT> 
        alert('$message')
        window.location.replace('total_request.php');
        </SCRIPT>";
    }
    



			$allowed =  array('gif','png' ,'jpg','JPG','pdf');
			$filename = $_FILES['attachemnet']['name'];
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			if(!in_array($ext,$allowed) ) {
			$fnme="";
			} else {
			
			$rand = time();
			$uploaddir = '../../../support_file/';
			$fnme = $rand."_".basename($_FILES['attachemnet']['name']);		
			$uploadfile = $uploaddir . $fnme;
			move_uploaded_file($_FILES['attachemnet']['tmp_name'], $uploadfile);
			
			if($_FILES['attachemnet']['name']!=""){ $fnme=$fnme; } else { $fnme=""; }
			}

//echo $sid." ";echo $contact." ";echo $category." ";echo $subject." ";echo $description." ";echo $fnme." ";

        
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
        else{
           $priroty = 'Low'; 
        }
        
    
        
       $gettid = "SELECT `id` FROM `student_support_ticket` ORDER BY `id` DESC LIMIT 1";
    $rgettid = $mysqli->query($gettid);
	$srgettid=$rgettid->fetch_assoc();
    $id = $srgettid['id'];
    if(empty($id)){
        $date=date("y"); 
        $ticketid = "T"."$date"."00001";
    }
    else{
        $id = $id + 1;
        $date=date("y");
        if($id < 10){
          
          $ticketid =  "T"."$date"."0000".$id;
            
        }
       if($id < 100 AND $id > 9){
          $ticketid =  "T"."$date"."000".$id; 
       }
       if($id < 1000 AND $id > 99){
          $ticketid =  "T"."$date"."00".$id; 
       }
       if($id < 10000 AND $id > 999){
          $ticketid =  "T"."$date"."0".$id; 
       }
    }
       
        $insert = "INSERT INTO `student_support_ticket`(`ticket_id`, `category`, `sub_catagory`, `problem_titel`, `description`, `attached_file`, `remarks`, `priroty`, `status`, `submit_date`, `solved_date`, `add_by`, `student_id`, `phone_no`, `solved_by`) 
        VALUES ('$ticketid','$category','','$subject','$description','$fnme','$remarks','$priroty','0','$submitdate','','mmsc_operetor','$sid','$contact','')";
        $qinsertst=$mysqli->query($insert);
        
        if($qinsertst){
        
         if($forsms == 0){
$ap_key='17516479398382452022/12/0806:14:11pmr60g2NbL'; 
$sender_id='105';
$mobile_no=$contact;
$message="Your complaint has been received. Your ticket No"." ".$ticketid;
$user_email='bdsoft2020@gmail.com';
//echo $message;
techno_bulk_sms($ap_key,$sender_id,$mobile_no,$message,$user_email);
         }
            
             $message = "Submitted Successfully";
		echo "<SCRIPT> 
        alert('$message')
        window.location.replace('total_request.php');
        </SCRIPT>";
        }
        else{
             $message = "Failed";
		echo "<SCRIPT> 
        alert('$message')
        window.location.replace('total_request.php');
        </SCRIPT>";
        }
   
}
function techno_bulk_sms($ap_key,$sender_id,$mobile_no,$message,$user_email){
	$url = 'https://24bulksms.com/24bulksms/api/api-sms-send';
	$data = array('api_key' => $ap_key,
	 'sender_id' => $sender_id,
	 'message' => $message,
	 'mobile_no' =>$mobile_no,
	 'user_email'=> $user_email		
	 );

	// use key 'http' even if you send the request to https://...
	 $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);     
    $output = curl_exec($curl);
    curl_close($curl);
	print_r($output); 
}

?>