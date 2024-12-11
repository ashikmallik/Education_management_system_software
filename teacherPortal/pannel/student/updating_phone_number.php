<?php
 require_once('student_top.php');
$borno_student_info_id= $_POST['borno_student_info_id'];
$borno_school_roll= $_POST['borno_school_roll'];
$stuphone= $_POST['stuphone'];

   
    
    $array = null;

        foreach ($borno_student_info_id as $key => $id) {
            
            foreach ($borno_school_roll as $key1 => $rool) {
             
        foreach ($stuphone as $key2 => $number) {
                if($key==$key1 && $key==$key2){
        
         
        // echo $id."rool shukriti".$rool." Number".$number."<br>";
        if(empty($number)){
            $number=null;
            $add_number=$number;
        }
        else if($number >=11){
            $add_number=$number;
        }
        else{
           $add_number="88".$number;
        }
        
        $result = mysqli_query($mysqli, "UPDATE borno_student_info set borno_school_phone='$add_number' where borno_student_info_id='$id' and borno_school_roll='$rool'");

        if ($result){

            
            $message = 'Phone Number Updated';

    echo "<SCRIPT> 
        alert('$message')
        window.location.replace('update_student_phone_number.php');
    </SCRIPT>";
      	
      }
        
        }
            
        }
            
        }
        
        }

?>