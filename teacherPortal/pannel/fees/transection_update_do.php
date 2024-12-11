<?php 
require_once('report_sett_top.php');

// $paymentdate = date("d/m/Y");

// 	$update="UPDATE `student_fees` SET `receive_date`='$paymentdate' WHERE `student_fees_id` = '$feesid'";
// 		    $qinstemdbbl=$mysqli->query($update);
// $ip = $_SERVER['REMOTE_ADDR'];    
// echo 'User Real IP Address - '.$ip;  

// $updatestudentfees="SELECT * FROM `temp_table_dbbl` WHERE `bank_trans_id` = '2SA0YmyW3O1S5AHyucqjEmMG8w4='";
// 		$sl=0;
// 		$qupdatestudentfees=$mysqli->query($updatestudentfees);
// 		while($shqupdatestudentfees=$qupdatestudentfees->fetch_assoc()){
// 		$sl++;
// 		$feesid = $shqupdatestudentfees['student_fees_id'];
// 		$due = $shqupdatestudentfees['due_amount'];
// 		$sid = $shqupdatestudentfees['student_id'];
// 		$branchid = $shqupdatestudentfees['branch_id'];
// $receiptn=date("dhsi");

// $receiptno = $feesid.$receiptn;
// echo $receiptno;
// 		}

$trxnid=$_POST['trxnid'];

//include('config.php');
    $userid = '000599992240000';
    $pwd    = 'c57c26acea8df0df277ce225e4ece188256f84c9';
    
function logger($logmsg)
{
	try {
		$logmsg = "\n".date("Y.n.j H:i:s")."#".$logmsg;
		file_put_contents('./logs/dbblpay.'.date("Y.n.j").'.log',$logmsg,FILE_APPEND);
	} catch(Exception $e) {
		file_put_contents('./logs/dbblpay.'.date("Y.n.j").'.log',$e->getMessage(),FILE_APPEND);
	}
}    
logger('---------------------- Complete New Transaction---------------------');

$errmsg = "";
//$trans_id = $_SESSION['trans_id'];
//----- Result Value Fields Declare -----//
$_POST['trans_id'] = "$trxnid";
$RESULT = "N/A"; 
$RESULT_CODE = "N/A";
$DSECURE = "N/A"; 
$RRN = "N/A";
$APPROVAL_CODE = "N/A";
$CARD_NUMBER = "N/A";
$AMOUNT = "N/A";
$CARDNAME = "N/A"; 
$DESCRIPTION = "N/A";
$TRANS_DATE = "N/A";
$RESULTSTR = "N/A"; 

try {
	// echo 'trans_id:'. $_SESSION['trans_id'];
	if(isset($_POST['trans_id']) && !empty($_POST['trans_id'])) {
		logger("Get trans_id From Post Value:".$_POST['trans_id']);
		$trans_id = $_POST['trans_id'];
	} else if(isset($_SESSION['trans_id']) && !empty($_SESSION['trans_id'])) {
		logger("Get trans_id From Session Value:".$_SESSION['trans_id']);
		$trans_id = $_SESSION['trans_id'];
	} else if(isset($_COOKIE['trans_id']) && !empty($_COOKIE['trans_id'])) {
		logger("Get trans_id From Cookie Value:".$_COOKIE['trans_id']);
		$trans_id = $_COOKIE['trans_id'];
	} else{
		$trans_id = "N/A";
	}
	
	
	if($trans_id == "N/A") { 
		$errmsg =  "transaction id missing";
		logger($errmsg);
	} else {

		$wsdlUrl = 'https://ecom1.dutchbanglabank.com/ecomws/dbblecomtxn?wsdl';

		$client = new SoapClient($wsdlUrl, [
					'stream_context' => stream_context_create([
					'ssl' => [
					'allow_self_signed' => true,
					],
			]),
		]);


		//---- Declare and Assign Web Service Data -----//
		
		$clientIp = $_SERVER['REMOTE_ADDR'];
		logger('clientIp:'.$clientIp);
		if(!empty($_POST['trans_id'])){
		    
		    $trans_id = $_POST['trans_id'];
		}
		elseif(!empty($_SESSION['trans_id'])){
		    $trans_id = $_SESSION['trans_id'];
		}
		
		$trans_id = trim($trans_id);
		logger('trans_id:'.$trans_id);
		
		$Parameters = array(
		'userid' => $userid,
		'pwd' => $pwd,
		'transid' => $trans_id,
		'clientip' => $clientIp,
		'billinginfo' => 'Test'
		);

		$result = $client->getresultfield($Parameters);
		//	print_r($result);
			
		foreach ($result as $value)
		logger('result:'.$value);	
		// echo 'Result:'.$value;	
			
		//echo "-------------Start of Array-----------------<br/>";
		
		$part1 = "";
		$part2 = "";
		if (strpos($value,"RESULT") !== false) {
			$arr = explode("^",$value);
			$arrlength = count($arr);
			for ($x = 0; $x < $arrlength; $x++) {
				$parts = explode(">", $arr[$x]);
				$part1 = $parts[0];
				$part2 = $parts[1];
				
				if ($part1 == "RESULT") {
					$RESULT = $part2;
				} else if ($part1 == "RESULT_CODE") {
					$RESULT_CODE = $part2;
				} else if ($part1  == "DSECURE") {
					$DSECURE = $part2;
				} else if ($part1 == "RRN") {
					$RRN = $part2;
				} else if ($part1  == "APPROVAL_CODE") {
					$APPROVAL_CODE = $part2;
				} else if ($part1 == "CARD_NUMBER") {
					$CARD_NUMBER = $part2;
				} else if ($part1 == "AMOUNT") {
					$AMOUNT = $part2;
					$AMOUNT = $AMOUNT/100;
				} else if ($part1 == "CARDNAME") {
					$CARDNAME = $part2;
				} else if ($part1 == "DESCRIPTION") {
					$DESCRIPTION = $part2;
				} else if ($part1 == "TRANS_DATE") {
					$TRANS_DATE = $part2;
					// echo "TRANS_DATE:".$TRANS_DATE;
				}else {
					// Unknown value;
					
				}
			}
			if($RESULT_CODE == '000' & $RESULT == 'OK'){
				$RESULTSTR = 'Successful';
		//	include('connection.php');

        
		$queryStr = "update dbbl_payment set 
					 result = '$RESULT', result_code = '$RESULT_CODE', dsecure = '$DSECURE', 
					 rrn = '$RRN', approval_code = '$APPROVAL_CODE', card_number = '$CARD_NUMBER', 
					 card_name = '$CARDNAME', trans_date = STR_TO_DATE('$TRANS_DATE', '%Y-%m-%d %h:%i:%s %p')
					 where bank_trans_id = '$trans_id'";
			$qinstdbbl=$mysqli->query($queryStr);
}

}
}

   }
   catch(Exception $e) {
	$errmsg =  "System Problem";
	logger($e->getMessage());
} 
   
   $gettrans="SELECT * FROM `dbbl_payment` WHERE `bank_trans_id` = '$trxnid'";
		$sl=0;
		$qgettrans=$mysqli->query($gettrans);
		while($shqgettrans=$qgettrans->fetch_assoc()){
     //   $dates = $shqgettrans['trans_date'];
	    $date = date_create($shqgettrans['trans_date']);
	    $paymentdate = date_format($date, 'd/m/Y');
	    $trans_id=$shqgettrans['bank_trans_id'];
	    $receiptn=date("dhsi");
	    $getfeesid="SELECT * FROM `temp_table_dbbl` WHERE `bank_trans_id` = '$trans_id'";
		$sl=0;
		$qgetfeesid=$mysqli->query($getfeesid);
		$shqgetfeesid=$qgetfeesid->fetch_assoc();	
		$feeid = $shqgetfeesid['student_fees_id'];
		$receiptno = $feeid.$receiptn;
		$updatestudentfees="SELECT * FROM `temp_table_dbbl` WHERE `bank_trans_id` = '$trans_id'";
		$sl=0;
		$qupdatestudentfees=$mysqli->query($updatestudentfees);
		while($shqupdatestudentfees=$qupdatestudentfees->fetch_assoc()){
		$sl++;
		$feesid = $shqupdatestudentfees['student_fees_id'];
		$due = $shqupdatestudentfees['due_amount'];
		$sid = $shqupdatestudentfees['student_id'];
		$branchid = $shqupdatestudentfees['branch_id'];
        $fees_head_id = $shqupdatestudentfees['fees_head_id'];
      // $receiptno = $feesid.$receiptn;
        
        
        echo $feesid." ";
        echo $due." ";
        echo $sid." ";
       // echo $date." ";
        echo $paymentdate."<br> ";
        
      //  $update="UPDATE `student_fees` SET `money_receipt_no` = '$receiptno' WHERE `bank_trans_id`='$trans_id'  ";
        
	$update="UPDATE `student_fees` SET `due_amount`=`due_amount`-'$due',`paid_amount`='$due',`receive_amount`='$due',`isPaid`='1',`isComplete`='1',`bank_trans_id`='$trans_id',`money_receipt_no`='$receiptno',`receive_date`='$paymentdate' WHERE `student_fees_id` = '$feesid'";
		    $qinstemdbbl=$mysqli->query($update);
		//   logger($receiptno,$trans_id,$due); 
		 if($due > 0 ){
		    
		   		 	$chk = "SELECT * FROM `student_addmission` where `student_id`='$sid'";
        	$qchk=$mysqli->query($chk);
			$shqchk=$qchk->fetch_assoc();
            $newstudentid = $shqchk['student_id'];
            
	if(!empty($newstudentid)){ 
	    		$updatestudentadmission="UPDATE `student_addmission` SET due_amount =0,`is_paid`='1',`tran_id`='$trans_id',`payment_date`='$paymentdate' WHERE `student_id` = '$newstudentid'";
		    $qupdatestudentadmission=$mysqli->query($updatestudentadmission);
		    
		    $insertStudent = "INSERT INTO `borno_student_info`(`borno_student_info_id`, `borno_school_id`, `borno_school_branch_id`, `borno_school_version`, `borno_school_class_id`, `borno_school_shift_id`, `borno_school_section_id`, `borno_school_session`, 
		    `borno_student_id`, `borno_final_student_id`, `borno_school_student_name`, `borno_school_father_name`, `borno_school_mother_name`, `borno_school_gender`, `borno_school_address`, 
		    `borno_school_permanentaddress`, `borno_school_phone`, `borno_school_blood_group`, `borno_school_dob`, `borno_student_birth_reg_no`, `borno_school_religion`, `borno_school_status`, `borno_school_org`, 
		    `borno_school_stud_group`, `borno_school_roll`, `borno_school_photo`, `borno_student_status`, `student_type`, `student_category`) 
		    SELECT '$newstudentid','1',`branch_id`,`version`,`class_id`, `shift_id`, `section_id`, `session`,'','',`student_name`,`father_name`,`mother_name`,'','','',`contact_no`,'','','','','','School',`student_group`,'0','','1','1',`student_category` FROM `student_addmission` WHERE `student_id` = '$newstudentid'";
		  $qinsertStudent=$mysqli->query($insertStudent);   
	}     
		     
		  $studentinfo = "SELECT * FROM `borno_student_info` WHERE `borno_student_info_id` = '$sid'";
		 $qstudentinfo=$mysqli->query($studentinfo);
		$shqstudentinfo=$qstudentinfo->fetch_assoc();	
		$branch_id = $shqstudentinfo['borno_school_branch_id'];
		$class_id = $shqstudentinfo['borno_school_class_id'];
		$shift_id = $shqstudentinfo['borno_school_shift_id'];
		$section_id = $shqstudentinfo['borno_school_section_id'];
		$session = $shqstudentinfo['borno_school_session'];
		$student_name = $shqstudentinfo['borno_school_student_name'];
		$roll = $shqstudentinfo['borno_school_roll'];
		    
		  $insertintocdetailsTable="INSERT INTO `collection_details`( `student_id`,`branch_id`, `class_id`, `shift_id`, `section_id`, `session`, `student_name`, `roll`, `student_fees_id`, `fees_head_id`, `receive_amount`, `bank_trans_id`, `money_receipt_no`, `receive_date`,`received_from`) 
	                         VALUES ('$sid','$branch_id','$class_id','$shift_id','$section_id','$session','$student_name','$roll','$feesid','$fees_head_id','$due','$trans_id','$receiptno','$paymentdate','Rocket_ecom')";
		    $qinscdetails=$mysqli->query($insertintocdetailsTable); 
		 }
		}
		}
		
		if($qinscdetails){ header('location:transection_update.php?msg=1');} else {  header('location:transection_update.php?msg=2'); }
?>