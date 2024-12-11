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
		 document.frmart.action="office_staff_sms.php";
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
			<a href=""><img src="../../images/sms/in12.jpg" height="80px" width="120px"></a>
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
								<td>Data:</td>
								<td><?php echo date('d.m.Y'); ?></td>
							</tr>
							<tr>
								<td>Branch:</td>                               
								<td>									
                                <select name="branchId" id="branchId" onChange="callpage();">
                                <option value="">--Select--</option>
                                <?php
                                        
                                        $data="select * from borno_school_branch where borno_school_id='$schId'";
                                        $qdata=$mysqli->query($data);
                                        while($showdata=$qdata->fetch_assoc()){ $sl++;
                                    
                                    ?>
                                <option value=" <?php echo $showdata['borno_school_branch_id']; ?>" <?php if($showdata['borno_school_branch_id']==$_POST['branchId']) { echo "selected"; }  ?>> <?php echo $showdata['borno_school_branch_name']; ?></option>
                                <?php } ?>
                              </select>
								</td>
							</tr>
							<tr>
								<td>Message Type: &nbsp;</td>
								<td>
									<select name="msgType" id="msgType" onChange="callpage();">
                                      <option value="">--Select--</option>
                                      <option value="1" <?php if($_POST['msgType']==1) { echo "selected"; } ?> > English </option>
                                      <option value="2" <?php if($_POST['msgType']==2) { echo "selected"; } ?>> Bangla </option>
                                    </select>
								</td>
							</tr>
							</tbody>
						</table>
				  </center>
				</form> 
                <br><br>				
                <form name="myForm" action="office_staff_sms_do.php" method="post" enctype="multipart/form-data">
				
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
                                <input type="hidden" name="gtstsess" id="gtstsess" value="<?php echo $_POST['stsess']; ?>" />
								</td>
								<td></td>
							</tr>
						</tbody>
					</table>

					<table class="table table-bordered">
					  <thead>
					    <tr>
					      <th scope="col">
					      	<input type="checkbox" id="checkAll" /> &nbsp;Select All
					      </th>
					      <th scope="col">Name</th>
					      <th scope="col">Phone</th>
					    </tr>
					  </thead>
					  <tbody>
                      <?php

	
$gtfbranchId=$_POST['branchId'];


 $gtstudent="select * from borno_mgt_staff_info where borno_school_id='$schId' AND borno_school_branch_id='$gtfbranchId' order by borno_mgt_staff_info_id asc";

	$qgtstudent=$mysqli->query($gtstudent);

	$sl=0;
	
	
	while($shroll=$qgtstudent->fetch_assoc()){ $sl++;

			   ?>
                      
                      
					    <tr>
					      <th><input class="chk" type="checkbox" name="stPhone[]" id="stPhone[]" value="<?php echo $shroll['borno_mgt_staf_phone'];?>"></th>
					    
					      <td><?php echo $shroll['borno_mgt_staff_name'];?></td>
					      <td><?php echo $shroll['borno_mgt_staf_phone'];?></td>

					    </tr>
                        
             <?php } ?>           
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
                                <input type="hidden" name="gtstsess" id="gtstsess" value="<?php echo $_POST['stsess']; ?>" />
                                </td>
								<td></td>
							</tr>
						</tbody>
					</table>

					  <table class="table table-bordered">
					  <thead>
					    <tr>
					      <th scope="col">
					      	<input type="checkbox" id="checkAll" /> &nbsp;Select All
					      </th>
					      <th scope="col">Name</th>
					      <th scope="col">Phone</th>
					    </tr>
					  </thead>
					  <tbody>
                      <?php

	
$gtfbranchId=$_POST['branchId'];


 $gtstudent="select * from borno_mgt_staff_info where borno_school_id='$schId' AND borno_school_branch_id='$gtfbranchId' order by borno_mgt_staff_info_id asc";

	$qgtstudent=$mysqli->query($gtstudent);

	$sl=0;
	
	
	while($shroll=$qgtstudent->fetch_assoc()){ $sl++;

			   ?>
                      
                      
					    <tr>
					      <th><input class="chk" type="checkbox" name="stPhone[]" id="stPhone[]" value="<?php echo $shroll['borno_mgt_staf_phone'];?>"></th>
					    
					      <td><?php echo $shroll['borno_mgt_staf_name'];?></td>
					      <td><?php echo $shroll['borno_mgt_staf_phone'];?></td>

					    </tr>
                        
             <?php } ?>           
					  </tbody>
					</table>  
                    
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