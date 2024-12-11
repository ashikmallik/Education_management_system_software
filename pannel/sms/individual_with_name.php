<?php 
    require_once('sms_top.php');
	$extlimit="select * from set_sms_limit where schlog_id='$schId'";
	$qextlimit=$mysqli->query($extlimit);
	$shextlimit=$qextlimit->fetch_assoc();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Borno Sky</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- Meta -->
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    
    <script language="javascript">
		function callpage()
		{
		 document.frmart.action="individual_with_name.php";
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
			<a href=""><img src="images/indiv/in02.jpg" height="80px" width="120px"></a>
		</div>
		<div class="logo"><img src="images/logo.jpg"></div>
	</div>
	<div class="main_content_ind">
		<div class="sm_main_part">
			<div class="in_form">
				<form name="frmart" action="#" method="post" enctype="multipart/form-data">
					<center>
						<table>
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
								<td>Class :</td>
								<td>
                                     <select name="studClass" id="studClass" onChange="callpage();">
                                <option value="">--Select--</option>
                                <?php                                       
									    $gtfbranchId=$_POST['branchId'];
										
										$getClassId="select * from borno_school_set_class where borno_school_id='$schId' AND borno_school_branch_id='$gtfbranchId'";
		
		
		$qgetClassId=$mysqli->query($getClassId);
		while($shgetClassId=$qgetClassId->fetch_assoc()){
										
										$getfClassId=$shgetClassId['borno_school_class_id']; 
                                        $gstclass="select * from borno_school_class where borno_school_class_id='$getfClassId'";
                                        $qgstclass=$mysqli->query($gstclass);
                                        $shgstclass=$qgstclass->fetch_assoc(); 
                                    
                                    ?>
                                <option value=" <?php echo $shgstclass['borno_school_class_id']; ?>" <?php if($shgstclass['borno_school_class_id']==$_POST['studClass']) { echo "selected"; }  ?>> <?php echo $shgstclass['borno_school_class_name']; ?></option>
                                <?php } ?>
                              </select>
								</td>
							</tr>
							<tr>
								<td>Shift :</td>
								<td>
                                  <select name="shiftId" id="shiftId" onChange="callpage();">
            <option value="">--Select--</option>
            <?php
					$studClass=$_POST['studClass'];
					$gstshift="select * from borno_school_shift";
					$qggstshift=$mysqli->query($gstshift);
					while($shggstshift=$qggstshift->fetch_assoc()){ $sl++;
				
				?>
            <option value=" <?php echo $shggstshift['borno_school_shift_id']; ?>" <?php if($shggstshift['borno_school_shift_id']==$_POST['shiftId']) { echo "selected"; }  ?>> <?php echo $shggstshift['borno_school_shift_name']; ?></option>
            <?php } ?>
          </select>
								</td>
							</tr>
							
							<tr>
								<td>Section:</td>
								<td>
									
									    <select name="section" id="section" onChange="callpage();">
          <option value="">--Select--</option>
          
          <?php
					$shiftId=$_POST['shiftId'];
					$gstsection="select * from borno_school_section where borno_school_class_id='$studClass' AND borno_school_branch_id='$gtfbranchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId'";
					$qgstsection=$mysqli->query($gstsection);
					while($shggstsection=$qgstsection->fetch_assoc()){ $sl++;
				
				?>
          <option value=" <?php echo $shggstsection['borno_school_section_id']; ?>" <?php if($shggstsection['borno_school_section_id']==$_POST['section']) { echo "selected"; }  ?>> <?php echo $shggstsection['borno_school_section_name']; ?></option>
          <?php } ?>
        </select>
									
								</td>
							</tr>
							<tr>
								<td>Session:</td>
								<td>
									<select name="stsess" id="stsess" onchange="callpage();">
    <option value="">--Select--</option>
      <?php
	  
	  		$studClass=$_POST['studClass'];
	   		$shiftId=$_POST['shiftId'];
			$section=$_REQUEST['section'];
	  
					$data1="select borno_school_session from borno_student_info where borno_school_id='$schId' and borno_school_class_id='$studClass' and borno_school_shift_id='$shiftId' and borno_school_section_id='$section' group by borno_school_session asc";
					$qdata1=$mysqli->query($data1);
					while($showdata1=$qdata1->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $showdata1['borno_school_session']; ?>" <?php if($showdata1['borno_school_session']==trim($_REQUEST['stsess'])) { echo "selected"; }  ?>> <?php echo $showdata1['borno_school_session']; ?></option>
      <?php } ?>
    </select>
								</td>
							</tr>
							
						  </tbody>
						</table>
					</center>
				</form> 
                <br><br>
				
                <form name="myForm" action="individual_sms_name_do.php" method="post" enctype="multipart/form-data">
				
				
                    
                    <table>
						<tbody>
							<tr>
							  <td>Message Header : </td>
							  <td><label for="msgHead"></label>
						      <input type="text" name="msgHead" id="msgHead" /></td>
							  <td></td>
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

					<table class="table table-bordered">
					  <thead>
					    <tr>
					      <th scope="col">
					      	<input type="checkbox" id="checkAll" /> &nbsp;Select All
					      </th>
					      <th scope="col">Roll</th>
					      <th scope="col">Name</th>
					      <th scope="col">Phone</th>
					    </tr>
					  </thead>
					  <tbody>
                      <?php

			$stsess=trim($_POST['stsess']);
			$section=$_POST['section'];
	
	
 $gtstudent="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$gtfbranchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' order by borno_school_roll asc";
	
	$qgtstudent=$mysqli->query($gtstudent);
	
	$sl=0;
	
	
	while($shroll=$qgtstudent->fetch_assoc()){ $sl++;

			   ?>
                      
                      
					    <tr>
					      <th>
                          <input class="chk" type="checkbox" name="stdid[]" id="stdid[]" value="<?php echo $shroll['borno_student_info_id'];?>">
                         
                          </th>
					      <td><?php echo $shroll['borno_school_roll'];?></td>
					      <td><?php echo $shroll['borno_school_student_name'];?></td>
					      <td><?php echo $shroll['borno_school_phone'];?></td>
                            </tr>
                        
             <?php } ?>           
					  </tbody>
					</table>
                    
                    
			    <center>
                    <input type="submit" value="Send">
                    <input type="hidden" name="schId" id="schId" value="<?php echo $schId; ?>" />
                    <input type="hidden" name="branchId" id="branchId" value="<?php echo $_POST['branchId'];?>" />
                    <input type="hidden" name="studClass" id="studClass" value="<?php echo $_POST['studClass']; ?>" />
                    <input type="hidden" name="shiftId" id="shiftId" value="<?php echo $_POST['shiftId'];?>" />
                    <input type="hidden" name="section" id="section" value="<?php echo $_POST['section']; ?>" />
                    <input type="hidden" name="stsess" id="stsess" value="<?php echo trim($_POST['stsess']); ?>" />
                    
                    
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