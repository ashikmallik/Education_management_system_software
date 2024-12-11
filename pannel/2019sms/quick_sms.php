<?php 
	require_once('sms_top.php');
	$extlimit="select * from set_sms_limit where schlog_id='$schId'";
	$qextlimit=$mysqli->query($extlimit);
	$shextlimit=$qextlimit->fetch_assoc();	
?>
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
		 document.frmart.action="quick_sms.php";
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
			<a href=""><img src="images/sms/g04.jpg" height="80px" width="120px"></a>
		</div>
		<div class="logo"><img src="images/logo.jpg"></div>
	</div>
	<div class="main_content_ind">
		<div class="sm_main_part">
			<div class="in_form">
				<form name="frmart" action="#" method="post" enctype="multipart/form-data">
					
                    <center>
					Quick SMS
                    	<table>
							<tbody>
							<tr>
								<td width="122">Data:</td>
								<td width="344"><?php echo date('d.m.Y'); ?></td>
							</tr>
							<tr>
								<td>Message Type: &nbsp;</td>
								<td>
									<select name="msgType" id="msgType" onChange="callpage();">
                                      <option value=""> Select </option>
                                      <option value="1" <?php if($_POST['msgType']==1) { echo "selected"; } ?> > English </option>
                                      <option value="2" <?php if($_POST['msgType']==2) { echo "selected"; } ?>> Bangla </option>
                                    </select>
								</td>
							</tr>
							
							</tbody>
						</table>
					</center>
				</form> <br><br>
				
                <form name="myForm" action="quick_sms_do.php" method="post" enctype="multipart/form-data">
				
					<?php
                    	$msgType=$_POST['msgType'];
						if($msgType==1){
					?>
                    <center>
                    <table>
						<tbody>
                        <tr>
							  <td>Phone Number :</td>
							  <td><textarea name="number" id="number"></textarea></td>
						  </tr>
							<tr>
								<td>English Message: &nbsp;<br><br></td>
								<td>
									
                                     <textarea name="message" cols="45" rows="3" id="message" onKeyDown="textCounter(document.myForm.message,document.myForm.remLen1,<?php echo $shextlimit['english_limit']; ?>)" onKeyUp="textCounter(document.myForm.message,document.myForm.remLen1,<?php echo $shextlimit['english_limit']; ?>)"></textarea>

                <br>

<input readonly type="text" name="remLen1" size="3" maxlength="3" value="<?php echo $shextlimit['english_limit']; ?>">
								<input name="smsType" type="hidden" value="<?php echo $msgType; ?>" />
								
                                </td>
								<td></td>
							</tr>
						</tbody>
					</table>
</center>
					
                    
                    <?php
						} else if($msgType==2){ 
					?>
					<center>
                    	<table>
						<tbody>
                        <tr>
							  <td>Phone Number :</td>
							  <td><textarea name="number" id="number"></textarea></td>
						  </tr>
							<tr>
								<td>Bangla Message: &nbsp;<br><br></td>
								<td>
									
                                     <textarea name="message" cols="45" rows="3" id="message" onKeyDown="textCounter(document.myForm.message,document.myForm.remLen1,<?php echo $shextlimit['bangla_limit']; ?>)" onKeyUp="textCounter(document.myForm.message,document.myForm.remLen1,<?php echo $shextlimit['bangla_limit']; ?>)"></textarea>

                <br>

<input readonly type="text" name="remLen1" size="3" maxlength="3" value="<?php echo $shextlimit['bangla_limit']; ?>">

								<input name="smsType" type="hidden" value="<?php echo $msgType; ?>" />
                                
								</td>
								<td></td>
							</tr>
						</tbody>
					</table>

					 </center>   
                    
                    <?php } ?>
					<center><input type="submit" value="Send">
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