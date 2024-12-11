<?php require_once('sms_top.php');?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Borno Sky</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- Meta -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    
    <link rel="stylesheet" href="../datCss/jquery-ui.css">
    <link rel="stylesheet" href="../datCss/jquery-ui1.css">
    <link rel="stylesheet" href="../datCss/style.css">
    <script src="../datCss/jquery-1.12.4.js"></script>
    <script src="../datCss/jquery-ui.js"></script>
    <script src="../datCss/jquery-ui1.js"></script>

<script>
  $( function() {
    $( "#datepicker" ).datepicker();
	$( "#datepicker1" ).datepicker1();
  } );
  </script> 
    
    <script language="javascript">
		function callpage()
		{
		 document.frmart.action="sms_report.php";
		 document.frmart.submit();
		}
	</script>
    
    <SCRIPT LANGUAGE="JavaScript">
function textCounter(field,cntfield,maxlimit) {
	if (field.value.length > maxlimit) // if too long...trim it!
		field.value = field.value.substring(0, maxlimit);
		// otherwise, update 'characters left' counter
	else
		cntfield.value = maxlimit - field.value.length;
	}
</script>
 
	
</head>
<body>
<div class="main">
	<div class="left_fixed">
		<div class="logo_top">
		    <a href="index.php"><img src="images/indiv/sms.jpg" height="80px" width="120px"></a>
			<a href="sms_report.php"><img src="images/sms/g06.jpg" height="80px" width="120px"></a>
            <a href="sms_report_details.php"><img src="images/sms/dr06.jpg" height="80px" width="120px"></a>
		</div>
        
		<div class="logo"><img src="images/logo.jpg"></div>
	</div>
	<div class="main_content_ind">
		<div class="sm_main_part">
			<div class="in_form">
				<form name="frmart" action="download_sms_summary.php" method="post" enctype="multipart/form-data" target="_blank">
					
                    <center>
					SMS Report
                    	<table>
                        <?php
        
		date_default_timezone_set('Asia/Dhaka');	
		
		$cdate=date('Y-m-d');
		
		?>
							<tbody>
							<tr>
							  <td>From Date :</td>
							  <td>
						      
                              <input type="text" id="datepicker" name="datepicker" value="<?php echo $cdate; ?>" > 
                              
                              </td>
							  </tr>
							<tr>
								<td width="158">To Date :</td>
								<td width="279">
							    <input type="text" name="datepicker1" id="datepicker1" value="<?php echo $cdate; ?>"/></td>
							</tr>
							
							</tbody>
						</table>
			    </center>
                    <center>

                    <input type="submit" value="Show">
					  <input type="hidden" name="schId" id="schId" value="<?php echo $schId; ?>" />
                      </center>
				</form>
                
                
                 <br><br>
		  
                
			</div>
		</div>
	</div>
</div>




 
</body>
</html>