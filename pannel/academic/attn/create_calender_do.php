<?php
include('config.php');
extract($_POST);

for($i=0; $i<count($cdetailsid); $i++){

//echo $category." ";echo $cdetailsid[$i]." ";echo $daytype[$i]." ";echo $remarks[$i]." ";echo $color[$i]."<br>";
if(empty($daytype[$i])){
    $updatecdetailsid = "UPDATE `academic_calender_details` SET `holiday_type` = 'Regular',`holiday_remarks` = '',`holiday_color` = '#ffffff',`cetagory` ='$ctgry'  WHERE `calender_details_id` = '$cdetailsid[$i]'";
    $qinstm1=$mysqli->query($updatecdetailsid);
}
else{
    $updatecdetailsid = "UPDATE `academic_calender_details` SET `holiday_type` = '$daytype[$i]',`holiday_remarks` = '$remarks[$i]',`holiday_color` = '$color[$i]',`cetagory` ='$ctgry' WHERE `calender_details_id` = '$cdetailsid[$i]'";
    $qinstm1=$mysqli->query($updatecdetailsid);
}

}

             if($qinstm1) {
	        						   // header('location:fiscal_year_setup.php?msg=1');
	        						   echo "test5" ;
	        						   	$message = 'Success.';
                                            echo "<SCRIPT> 
                                                alert('$message')
                                                window.location.replace('create_calender.php');
                                            </SCRIPT>";
    
                             } 
                             else {
                                 
                                // header('location:fiscal_year_setup.php?msg=2');
                                 	  $message = 'Failed.';
                                            echo "<SCRIPT> 
                                                alert('$message')
                                                window.location.replace('create_calender.php');
                                            </SCRIPT>";
                             }



?>