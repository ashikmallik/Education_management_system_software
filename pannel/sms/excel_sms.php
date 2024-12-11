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
			<a href=""><img src="images/sms/g02.jpg" height="80px" width="120px"></a>
		</div>
		<div class="logo"><img src="images/logo.jpg"></div>
	</div>
	<div class="main_content_ind">
		<div class="sm_main_part">
			<div class="in_form">
				<form name="frmart" action="excel_sms_do.php" method="post" enctype="multipart/form-data">
					
                    <center>
					EXCEL SMS
                    	<table>
							<tbody>
							<tr>
								<td width="190">Date :</td>
								<td width="251"><?php echo date('d.m.Y'); ?></td>
							</tr>
							<tr>
								<td colspan="2" align="center"><a style="color:#06F" href="sms.xlsx" target="_blank">Download Templates</a></td>
							  </tr>
							<tr>
							  <td><strong>Browse File (EXCEL File) </strong>:</td>
							  <td align="center"><input name="excel" type="file" id="xlsx" enctype="multipart/form-data" /></td>
							  </tr>
							
							</tbody>
						</table>
					</center>
                    <center><input type="submit" value="Upload">
					  <input type="hidden" name="schId" id="schId" value="<?php echo $schId; ?>" />
                      
                      <input type="hidden" name="avlSMS" id="avlSMS" value="<?php echo $avlSMS; ?>" />
					</center>
				</form> <br><br>
				
                
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