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
    
    <script language="javascript">
		function callpage()
		{
		 document.frmart.action="biometric.php";
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
			<a href="biometric.php"><img src="images/sms/biometric.jpg" height="80px" width="120px"></a>
            <a href="api.php"><img src="images/sms/api.jpg" height="80px" width="120px"></a>
            <a href="http://abascacc.com/attn/attendance_report_month.php" target="_blank"><img src="images/sms/report.jpg" height="80px" width="120px"></a>
           <!-- <a style="font-size:18px" href="student-report.pdf" target="_blank">REPORT</a>-->
        
        </div>
		<div class="logo"><img src="images/logo.jpg"></div>
	</div>
	<div class="main_content_ind">
		<div class="sm_main_part">
			<div class="in_form">
				<form name="frmart" action="#" method="post" enctype="multipart/form-data">
					<center>
						<table width="376">
							<tbody>
							<tr>
								<td width="98">Data:</td>
								<td width="266"><?php echo date('d.m.Y'); ?></td>
							</tr>
							<tr>
								<td>CSV</td>
								<td><label for="fileField"></label>
							    <input type="file" name="fileField" id="fileField" /></td>
							</tr>
							<tr>
							  <td colspan="2" align="center"><input type="submit" name="button" id="button" value="Upload" /></td>
							  </tr>
							</tbody>
						</table>
				  </center>
				</form> 
                
                <br><br>
				
                <form name="myForm" action="sms_all_branch_do.php" method="post" enctype="multipart/form-data">
				
					<?php
                    	$msgType=$_POST['msgType'];
						if($msgType==1){
					?>
                    
                    <table>
						<tbody>
							<tr>
								<td>English Message: &nbsp;<br><br></td>
								<td>
									
                                     <textarea name="message" cols="45" rows="3" id="message" onKeyDown="textCounter(document.myForm.message,document.myForm.remLen1,440)" onKeyUp="textCounter(document.myForm.message,document.myForm.remLen1,440)"></textarea>

                <br>

<input readonly type="text" name="remLen1" size="3" maxlength="3" value="440">
								<input name="smsType" type="hidden" value="<?php echo $msgType; ?>" />
                                <input type="hidden" name="branchId" id="branchId" value="<?php echo $_POST['branchId']; ?>" />
                                <input type="hidden" name="gtstsess" id="gtstsess" value="<?php echo trim($_POST['stsess']); ?>" />
								</td>
								<td></td>
							</tr>
						</tbody>
					</table>

					
                    
                    <?php
						} else if($msgType==2){ 
					?>
					
                    	<table>
						<tbody>
							<tr>
								<td>Bangla Message: &nbsp;<br><br></td>
								<td>
									
                                     <textarea name="message" cols="45" rows="3" id="message" onKeyDown="textCounter(document.myForm.message,document.myForm.remLen1,250)" onKeyUp="textCounter(document.myForm.message,document.myForm.remLen1,250)"></textarea>

                <br>

<input readonly type="text" name="remLen1" size="3" maxlength="3" value="250">

								<input name="smsType" type="hidden" value="<?php echo $msgType; ?>" />
                                 <input type="hidden" name="branchId" id="branchId" value="<?php echo $_POST['branchId']; ?>" />
                                <input type="hidden" name="gtstsess" id="gtstsess" value="<?php echo trim($_POST['stsess']); ?>" />
                                </td>
								<td></td>
							</tr>
						</tbody>
					</table>

					    
                    
                    <?php } ?>
					<center><input type="submit" value="Save">
					  <input type="hidden" name="schId" id="schId" value="<?php echo $schId; ?>" />
                      <input type="hidden" name="avlSMS" id="avlSMS" value="<?php echo $avlSMS; ?>" />
                      
					</center>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="../../js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../../js/bootstrap.min.js"></script>

<script>
$("#checkAll").change(function () {
      $("input:checkbox").prop('checked', $(this).prop("checked"));
});
</script>


 
</body>
</html>