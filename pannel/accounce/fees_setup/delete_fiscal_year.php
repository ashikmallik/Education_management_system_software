<?php require_once('fees_sett_top.php');

$yearId=$_GET['yearId'];

		$getFeesHeadName="select * from fees_head WHERE  fiscal_year_id = '$yearId'";
 	$qgetFeesHeadName=$mysqli->query($getFeesHeadName);
	$shFeesHeadName=$qgetFeesHeadName->fetch_assoc();
	
	$gheadname=$shFeesHeadName['fiscal_year_id'];

	if($gheadname==$yearId) { 
	    
	   // echo "tes1";
	  //  header('Location: fiscal_year_setup.php?msg=3');  
	
	$message = 'Fiscal year already in exist in Fees head setup';

    echo "<SCRIPT> 
        alert('$message')
        window.location.replace('fiscal_year_setup.php');
    </SCRIPT>";
	    
	}
else{
    
    	$gtfiscalyear="DELETE FROM `fiscal_year` WHERE `fiscal_year_id`=$yearId";
		$qgtfiscalyear=$mysqli->query($gtfiscalyear);
		
		if($qgtfiscalyear){
		    
		        	$gtfiscalyeardetails="DELETE FROM `fiscal_year_details` WHERE `fiscal_year_id`=$yearId";
		            $qgtfiscalyeardetails=$mysqli->query($gtfiscalyeardetails);
		            
		            
		            if($qgtfiscalyeardetails){
		                
		                	$message = 'Fiscal Year Delete Sucssesfully';

                                echo "<SCRIPT> 
                                    alert('$message')
                                    window.location.replace('fiscal_year_setup.php');
                                </SCRIPT>";
		            }
		                
		          
		}
}

?>