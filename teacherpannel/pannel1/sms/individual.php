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
		 document.frmart.action="individual.php";
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
			<a href=""><img src="images/indiv/indivdual_sms.jpg" height="80px" width="120px"></a>
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
                                
                                <?php
                                
                                
                                        $brid=$shget_schoolName['borno_school_branch_id'];
                                        $schId=$shget_schoolName['borno_school_id'];
                                        $data="select * from borno_school_branch where borno_school_id='$schId' AND borno_school_branch_id='$brid'";
                                        $qdata=$mysqli->query($data);
                                        $showdata=$qdata->fetch_assoc(); 
                                    
                                    ?>
                                <option value=" <?php echo $showdata['borno_school_branch_id']; ?>" <?php if($showdata['borno_school_branch_id']==$_POST['branchId']) { echo "selected"; }  ?>> <?php echo $showdata['borno_school_branch_name']; ?></option>
                              
                              </select>
								</td>
							</tr>
							<tr>
								<td>Class :</td>
								<td>
                                    <select name="studClass" id="studClass" onChange="callpage();">
                                <?php                                       
						 $gtfbranchId=$_POST['branchId'];
						date_default_timezone_set('Asia/Dhaka');	
		                $year=date('Y');
		$getClassId="select * from borno_set_class_teacher where 	borno_school_teacher_id='$stdid' AND borno_school_session='$year'";
		$qgetClassId=$mysqli->query($getClassId);
		$shgetClassId=$qgetClassId->fetch_assoc();
		$getfsection=$shgetClassId['borno_school_section_id']; 

		$getClassId1="select * from borno_school_section where 	borno_school_section_id='$getfsection'";
		$qgetClassId1=$mysqli->query($getClassId1);
		$shgetClassId1=$qgetClassId1->fetch_assoc();
		$getfClassId=$shgetClassId1['borno_school_class_id']; 		
		
                                        $gstclass="select * from borno_school_class where borno_school_class_id='$getfClassId'";
                                        $qgstclass=$mysqli->query($gstclass);
                                        $shgstclass=$qgstclass->fetch_assoc(); 
                                    
                                    ?>
                                <option value=" <?php echo $shgstclass['borno_school_class_id']; ?>" <?php if($shgstclass['borno_school_class_id']==$_POST['studClass']) { echo "selected"; }  ?>> <?php echo $shgstclass['borno_school_class_name']; ?></option>
                               
                              </select>
								</td>
							</tr>
							
							
							<tr>
								<td>Section:</td>
								<td>
									
									    <select name="section" id="section" onChange="callpage();">
          
          
          <?php
				
					$gstsection="select * from borno_school_section where borno_school_section_id='$getfsection'";
					$qgstsection=$mysqli->query($gstsection);
					$shggstsection=$qgstsection->fetch_assoc();
				
				?>
          <option value=" <?php echo $shggstsection['borno_school_section_id']; ?>" <?php if($shggstsection['borno_school_section_id']==$_POST['section']) { echo "selected"; }  ?>> <?php echo $shggstsection['borno_school_section_name']; ?></option>
         
        </select>
									
								</td>
							</tr>
							<tr>
								<td>Session:</td>
								<td>
									<select name="stsess" id="stsess"  onchange="callpage();">

<option value="<?php $year; ?>" <?php if($_POST['stsess']==$year) { echo "selected"; } ?>> <?php echo $year; ?> </option>

       								 </select>
								</td>
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
				</form> 
                
                <br><br>
				
                <form name="myForm" action="individual_do.php" method="post" enctype="multipart/form-data">
				
					<?php
                    	$msgType=$_POST['msgType'];
						if($msgType==1){
					?>
                    
                    <table>
						<tbody>
							<tr>
								<td>English Message: &nbsp;<br><br></td>
								<td>
									
                                     <textarea name="message" cols="45" rows="3" id="message" onKeyDown="textCounter(document.myForm.message,document.myForm.remLen1,160)" onKeyUp="textCounter(document.myForm.message,document.myForm.remLen1,160)"></textarea>

                <br>

<input readonly type="text" name="remLen1" size="3" maxlength="3" value="160">
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
			$gtfbranchId=$_POST['branchId'];
			$studClass=$_POST['studClass'];
			$section=$_POST['section'];
	
	 $gtstudent="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$gtfbranchId' AND borno_school_class_id='$studClass' AND borno_school_section_id='$section' AND borno_school_session='$year' order by borno_school_roll asc";
	
	$qgtstudent=$mysqli->query($gtstudent);
	
	$sl=0;
	
	
	while($shroll=$qgtstudent->fetch_assoc()){ $sl++;

			   ?>
                      
                      
					    <tr>
					<th><input class="chk" type="checkbox" name="stdid[]" id="stdid[]" value="<?php echo $shroll['borno_student_info_id'];?>">                      
                          </th>
					      <td><?php echo $shroll['borno_school_roll'];?></td>
					      <td><?php echo $shroll['borno_school_student_name'];?></td>
					      <td><?php echo $shroll['borno_school_phone'];?></td>
                          <input type="hidden" name="smsShift[]" id="smsShift[]" value="<?php echo $_POST['shiftId']; ?>" />
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
									
                                     <textarea name="message" cols="45" rows="3" id="message" onKeyDown="textCounter(document.myForm.message,document.myForm.remLen1,70)" onKeyUp="textCounter(document.myForm.message,document.myForm.remLen1,70)"></textarea>

                <br>

<input readonly type="text" name="remLen1" size="3" maxlength="3" value="70">

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

			$gtfbranchId=$_POST['branchId'];
			$studClass=$_POST['studClass'];
			$section=$_POST['section'];
	
	
 $gtstudent="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$gtfbranchId' AND borno_school_class_id='$studClass' AND borno_school_section_id='$section' AND borno_school_session='$year' order by borno_school_roll asc";
	
	$qgtstudent=$mysqli->query($gtstudent);
	
	while($shroll=$qgtstudent->fetch_assoc()){

			   ?>
                      
                      
					    <tr>
					    <th>
                        <input class="chk" type="checkbox" name="stdid[]" id="stdid[]" value="<?php echo $shroll['borno_student_info_id'];?>">                                      </th>
					      <td><?php echo $shroll['borno_school_roll'];?></td>
					      <td><?php echo $shroll['borno_school_student_name'];?></td>
					      <td><?php echo $shroll['borno_school_phone'];?></td>
                          
                        
                          
					    </tr>
                        
             <?php } ?>           
					  </tbody>
					</table>
                    
                    <?php } ?>
					<center>
					  
                            <input type="submit" value="Send">
                            <input type="hidden" name="schId" id="schId" value="<?php echo $schId; ?>" />
                            <input type="hidden" name="branchid" id="branchid" value="<?php echo $_POST['branchId']; ?>" />
                            <input type="hidden" name="classid" id="classid" value="<?php echo $_POST['studClass']; ?>" />
                            <input type="hidden" name="shiftid" id="shiftid" value="<?php echo $_POST['shiftId']; ?>" />
                            <input type="hidden" name="section" id="section" value="<?php echo $_POST['section']; ?>" />
                            <input type="hidden" name="stsess" id="stsess" value="<?php echo $_POST['stsess']; ?>" />
                            
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