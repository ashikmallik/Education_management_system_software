<?php 
require_once('report_sett_top.php');

$id=$_GET['id'];
$status=$_GET['status'];
$solvedate = date("d/m/Y");

echo $id." "; echo $status." "; echo $solvedate." ";

if($status == 1){
    
    $update = "UPDATE `student_support_ticket` SET `status` ='$status' , `solved_date`='$solvedate', `solved_by` ='Amir' WHERE `id` ='$id'";
    $qinstdbbl=$mysqli->query($update);
        if($qinstdbbl){
                                $message = 'Issue Solved.';
                                echo "<SCRIPT> 
                                alert('$message')
                                window.location.replace('support_panel.php');
                                </SCRIPT>";
}
else{
                                    $message = 'Data not updated';
                                echo "<SCRIPT> 
                                alert('$message')
                                window.location.replace('support_panel.php');
                                </SCRIPT>";
}
}
else if($status == 2){

echo $id." "; echo $status." "; echo $solvedate." ";    
    
    $update = "UPDATE `student_support_ticket` SET `status` ='$status' , `solved_date`='$solvedate', `solved_by` ='Amir' WHERE `id` ='$id'";
    $qinstdbbl=$mysqli->query($update);
    if($qinstdbbl){
                                $message = 'Issue Rejected.';
                                echo "<SCRIPT> 
                                alert('$message')
                                window.location.replace('support_panel.php');
                                </SCRIPT>";
}
else{
                                    $message = 'Data not updated';
                                echo "<SCRIPT> 
                                alert('$message')
                                window.location.replace('support_panel.php');
                                </SCRIPT>";
}
}



?>