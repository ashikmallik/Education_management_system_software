<?php 



$datas = file_get_contents('php://input');
$data = json_decode($datas,true);
//$data = json_decode($sessionData, true );
//$dataPart1 = explode('"',$datas);

print_r($data);
//include('connection.php');


// //$phone = array();


// $getmax = "select COUNT(borno_school_roll) as max from borno_student_info where  borno_school_branch_id='1' AND borno_school_class_id='1'AND borno_school_session='2022' order by borno_school_roll asc";
// $qgetmax=$mysqli->query($getmax);
// $sqgetmax=$qgetmax->fetch_assoc();
// $max= $sqgetmax['max'];

// 	$gtstudent="select * from borno_student_info where  borno_school_branch_id='1' AND borno_school_class_id='1'AND borno_school_session='2022' order by borno_school_roll asc";
// 	$qgtstudent=$mysqli->query($gtstudent);
// 	$s=0;
// 	while($shroll=$qgtstudent->fetch_assoc()){ 
// 	       $s++;
		
// 			$shiftid=$shroll['borno_school_shift_id'];
// 			$section=$shroll['borno_school_section_id'];
// 			$roll=$shroll['borno_school_roll'];
// 			$name=$shroll['borno_school_student_name'];
// 			$To=$shroll['borno_school_phone'];
// 			if($s<$max)	{
// 			    $numbers = '"'.$To . '",';
// 			}		
// 			else{
// 			    $numbers = '"'.$To . '"';
// 			}
		
// 		    $tonumbers .=  $numbers;
		    
		    
// //	$phone[] = $numbers;	    
        

// }
// // $phones = JSON.stringify($phone,"");

// //$phone[] = $tonumbers;

// //print_r($phone);
// //echo $max;

// echo "[".$tonumbers."]";
?>
