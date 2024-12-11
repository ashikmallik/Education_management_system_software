 <?php
/*  ----- DB Configuration  -----  */ 
$DB_NAME = 'ecomtest';
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = 'root@123';


// Service Hub
$userid = '000599992240000';
$pwd    = '725dae4debef66aaa3f6e65088a0b222f54658ba'; //-- UAT


 $dbblurl = "https://ecomtest.dutchbanglabank.com"; // --- Test Server ---//
// $dbblurl = "https://ecom.dutchbanglabank.com";  // --- Live Server 1 ---//
// $dbblurl = "https://ecom1.dutchbanglabank.com"; // --- Live Server 2 ---//

function logger($logmsg)
{
	try {
		$logmsg = "\n".date("Y.n.j H:i:s")."#".$logmsg;
		file_put_contents('./logs/dbblpay.'.date("Y.n.j").'.log',$logmsg,FILE_APPEND);
	} catch(Exception $e) {
		file_put_contents('./logs/dbblpay.'.date("Y.n.j").'.log',$e->getMessage(),FILE_APPEND);
	}
}
?>
