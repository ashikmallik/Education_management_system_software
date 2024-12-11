<?php 

require_once('fees_sett_top.php');

if(isset($_POST['search'])){
    $search = $_POST['search'];

    $query = "SELECT * FROM borno_student_info WHERE borno_school_student_name like'%$search%'";
    $result = $mysqli->query($query);
    
    while($row = mysqli_fetch_array($result) ){
        $response[] = array("value"=>$row['borno_student_info_id'],"label"=>$row['borno_school_student_name']."-".$row['borno_student_info_id']);
    }

    echo json_encode($response);
}

exit;
?>