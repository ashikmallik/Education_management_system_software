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
        
        </div>
		<div class="logo"><img src="images/logo.jpg"></div>
	</div>
	<div class="main_content_ind">
		<div class="sm_main_part">
			<div class="in_form">
				<form name="frmart" action="#" method="post" enctype="multipart/form-data">
					<center>
                        <table width="600" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td colspan="2">&nbsp;</td>
                          </tr>
                          <tr>
                            <td>
                            <table width="250" border="0" cellspacing="0" cellpadding="0" align="center">
                                  <tr>
                                    <td height="50" align="center" bgcolor="#008000" style="color:#FFF"><strong>Morning Shift</strong></td>
                                  </tr>
                                </table>

                            </td>
                            <td>
                            	<table width="250" border="0" cellspacing="0" cellpadding="0" align="center">
                                  <tr>
                                    <td height="50" align="center" bgcolor="#0066FF" style="color:#FFF"><strong>Day Shift</strong></td>
                                  </tr>
                                </table>
                            </td>
                          </tr>
                          <tr>
                            <td align="center"><strong>Time : 8:30 PM</strong></td>
                            <td align="center"><strong>Time : 12:00 PM</strong></td>
                          </tr>
                        </table>

				  </center>
				</form> 
                
                <br><br>
				
                
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