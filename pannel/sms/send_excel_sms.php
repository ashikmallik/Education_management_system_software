<?php  error_reporting(0);
$server = 'localhost';
$user = 'bornosky_usborno';
$pass = 'Bangladesh`123';
$db_name = 'bornosky_borno18';
//$connReal = mysql_connect($server,$user,$pass) or die(mysql_error());

$con = mysqli_connect($server, $user, $pass, $db_name);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
require('PHPExcel/PHPExcel.php'); 
require('PHPExcel/PHPExcel/IOFactory.php'); 
$schId=$_POST['schId'];

if(empty($_POST['a1'])){
   $_POST['a1'] = null;
}else{
    $a1=$_POST['a1'];
}
if(empty($_POST['a2'])){
   $_POST['a2'] = null;
}else{
    $a2=$_POST['a2'];
}
if(empty($_POST['b1'])){
   $_POST['b1'] = null;
}else{
    $b1=$_POST['b1'];
}
if(empty($_POST['b2'])){
   $_POST['b2'] = null;
}else{
    $b2=$_POST['b2'];
}
if(empty($_POST['c1'])){
   $_POST['c1'] = null;
}else{
    $c1=$_POST['c1'];
}
if(empty($_POST['c2'])){
   $_POST['c2'] = null;
}else{
    $c2=$_POST['c2'];
}
if(empty($_POST['d1'])){
   $_POST['d1'] = null;
}else{
    $d1=$_POST['d1'];
}
if(empty($_POST['d2'])){
   $_POST['d2'] = null;
}else{
    $d2=$_POST['d2'];
}
if(empty($_POST['e1'])){
   $_POST['e1'] = null;
}else{
    $e1=$_POST['e1'];
}
if(empty($_POST['e2'])){
   $_POST['e2'] = null;
}else{
    $e2=$_POST['e2'];
}
if(empty($_POST['f1'])){
   $_POST['f1'] = null;
}else{
    $f1=$_POST['f1'];
}
if(empty($_POST['f2'])){
   $_POST['f2'] = null;
}else{
    $f2=$_POST['f2'];
}
if(empty($_POST['g1'])){
   $_POST['g1'] = null;
}else{
    $g1=$_POST['g1'];
}
if(empty($_POST['g2'])){
   $_POST['g2'] = null;
}else{
    $g2=$_POST['g2'];
}
if(empty($_POST['h1'])){
   $_POST['h1'] = null;
}else{
    $h1=$_POST['h1'];
}
if(empty($_POST['h2'])){
   $_POST['h2'] = null;
}else{
    $h2=$_POST['h2'];
}
if(empty($_POST['i1'])){
   $_POST['i1'] = null;
}else{
    $i1=$_POST['i1'];
}
if(empty($_POST['i2'])){
   $_POST['i2'] = null;
}else{
    $i2=$_POST['i2'];
}
if(empty($_POST['j1'])){
   $_POST['j1'] = null;
}else{
    $j1=$_POST['j1'];
}
if(empty($_POST['j2'])){
   $_POST['j2'] = null;
}else{
    $j2=$_POST['j2'];
}
if(empty($_POST['k1'])){
   $_POST['k1'] = null;
}else{
    $k1=$_POST['k1'];
}
if(empty($_POST['k2'])){
   $_POST['k2'] = null;
}else{
    $k2=$_POST['k2'];
}




if(empty($_POST['1st'])){
   $_POST['1st'] = 'empty'; 
}
$first=$_POST['1st'];
if(empty($_POST['2nd'])){
   $_POST['2nd'] = 'empty'; 
}
$snd=$_POST['2nd'];
if(empty($_POST['3rd'])){
  $_POST['3rd'] = 'empty'; 
}
$trd=$_POST['3rd'];
if(empty($_POST['4th'])){
   $_POST['4th'] = 'empty'; 
}
$frth=$_POST['4th'];
if(empty($_POST['5th'])){
   $_POST['5th'] = 'empty'; 
}
$fifth=$_POST['5th'];
if(empty($_POST['6th'])){
   $_POST['6th'] = 'empty'; 
}
$sixth=$_POST['6th'];
if(empty($_POST['7th'])){
   $_POST['7th'] = 'empty'; 
}
$sevth=$_POST['7th'];
if(empty($_POST['8th'])){
   $_POST['8th'] = 'empty'; 
}
$eith=$_POST['8th'];
if(empty($_POST['9th'])){
   $_POST['9th'] = 'empty'; 
}
$nith=$_POST['9th'];
if(empty($_POST['10th'])){
   $_POST['10th'] = 'empty'; 
}
$tenth=$_POST['10th'];
if(empty($_POST['11th'])){
   $_POST['11th'] = 'empty'; 
}
$elth=$_POST['11th'];

$message = $_POST['message'];

$result = mysqli_query($con, "SELECT * FROM excel_sms ");

 
foreach($result as $res){
   $message1 = null;
    $to = '880'. stripslashes($res['ContactNo']);
    
    
  $message1= $a1 .''. stripslashes($res[$first]).' '. $a2 .' '. $b1 . stripslashes($res[$snd]).' '. $b2 . ''. $c1.''. stripslashes($res[$trd]).' '.$c2.''. $d1.''. stripslashes($res[$frth]).' '.$d2.'' .$e1.''. stripslashes($res[$fifth]).' '.$e2.''.$f1.''. stripslashes($res[$sixth]).' '.$f2.''.$g1.''. stripslashes($res[$sevth]).' '.$g2.''.$h1.''. stripslashes($res[$eith]).''.$h2.''.$i1.''. stripslashes($res[$nith]).' '.$i2.''.$j1.''. stripslashes($res[$tenth]).' '.$j2.''.$k1.''. stripslashes($res[$elth]).' '.$k2; 
    
   
    	    $sender_id='45';
            $apiKey='YmRzb2Z0OjEyMzQ1Ng=='; 
            $mobileNo= $to;
            $message=$message1;
            techno_bulk_sms($sender_id,$apiKey,$mobileNo,$message);	
            
            
      $sql =mysqli_query($con,"INSERT INTO `back_up_bulk_sms`(`mobile`, `massege`) VALUES ('$to','$message1')");
    

}
 
function techno_bulk_sms($sender_id,$apiKey,$mobileNo,$message){
$url = 'https://smspanellogin.com/api/bulkSmsApi';
$data = array('sender_id' => $sender_id,
 'apiKey' => $apiKey,
 'mobileNo' => $mobileNo,
 'message' =>$message	
 );

 $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);     
    $output = curl_exec($curl);
    curl_close($curl);

    

 
}

    $result = mysqli_query($con, "delete  FROM excel_sms");
    
    
    include 'success.php';

?>