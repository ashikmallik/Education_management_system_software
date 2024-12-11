<?php require_once('result_sett_top.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>:: [Result  Settings]::</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <!-- Meta tag -->
    <meta charset="utf-8">
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
</head>
<body>
</script>
<script language="javascript">
function callpage()
{
 document.frmcontent.action="subject_details_eleven_twelve.php";
 document.frmcontent.submit();
}
</script>
<script language="javascript">
	function contalt_valid()
	{
		if(document.frmcontent.studClass.value=="")
		{
			alert("Please Select Class");
			document.frmcontent.studClass.focus();
			return (false);
		}
		if(document.frmcontent.stsess.value=="")
		{
			alert("Please Select Session");
			document.frmcontent.stsess.focus();
			return (false);
		}
		if(document.frmcontent.termsess.value=="")
		{
			alert("Please Select Term");
			document.frmcontent.termsess.focus();
			return (false);
		}
						
	}
</script> 
<div class="wrapper">
    <div class="side_main_menu">
        <?php require_once('leftmenu.php');?>	
        <div class="fixed_logo">
<!--            <a href=""><img src="../assets/images/logo.jpg" class="img-fluid"></a>
-->        </div>
    </div><!-- side bar end -->

    <div class="ot_main_content">
        <div class="admin_logout">
            <div class="admin_head">
                <h3> Result Settings </h3>
                
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Subject Details Eleven to Twelve</h2></div>
                <div class="form">
                    <center>
                    	<form name="frmcontent" action="subject_details_eleven_twelve_do.php" method="post" enctype="multipart/form-data">
                        <?php
	$msg=$_GET['msg'];
	if($msg==1){echo "Add Subject Details Successfull";} 
	else if($msg==2){echo "Failed";} 
	else if($msg==3){echo "Subject Details Already Added";} 


 ?>
                        <table style="border: 1px solid #005067;">
                         
  						 <tr>
    <td class="text_table">Session *</td>
    <td><select name="stsess" id="stsess" onchange="callpage();">
      <option value=""> Select</option>
      
      <option value="2019-20" <?php if($_POST['stsess']=='2019-20') { echo "selected"; } ?>> 2019-20 </option>
      <option value="2020-21" <?php if($_POST['stsess']=='2020-21') { echo "selected"; } ?>> 2020-21 </option>
      <option value="2021-22" <?php if($_POST['stsess']=='2021-22') { echo "selected"; } ?>> 2021-22 </option>
      <option value="2022-23" <?php if($_POST['stsess']=='2022-23') { echo "selected"; } ?>> 2022-23 </option>
    </select></td>
  </tr>                       
                         <tr>
    <td class="text_table">Select Class *</td>
    
    <td><select name="studClass" id="studClass" onchange="callpage();">
      <option value=""> Select Class</option>
     <?php
					$gstclass="select * from borno_school_set_class where borno_school_id='$schId' AND class_order between 14 AND 15";
					$qgstclass=$mysqli->query($gstclass);
					while($shgstclass=$qgstclass->fetch_assoc()){ $sl++;
				
					$getfClassId=$shgstclass['borno_school_class_id']; 
                    $gstclass1="select * from borno_school_class where borno_school_class_id='$getfClassId'";
                                        $qgstclass1=$mysqli->query($gstclass1);
                                        $shgstclass1=$qgstclass1->fetch_assoc(); 
				?>
      <option value=" <?php echo $shgstclass1['borno_school_class_id']; ?>" <?php if($shgstclass1['borno_school_class_id']==$_REQUEST['studClass']) { echo "selected"; }  ?>> <?php echo $shgstclass1['borno_school_class_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
  
  <tr>
    <td class="text_table">Department*</td>
    <td><select name="dept" id="dept" onchange="callpage();">
      <option value=""> None </option>
      <option value="1" <?php if($_POST['dept']==1) { echo "selected"; } ?>> Science </option>
      <option value="3" <?php if($_POST['dept']==3) { echo "selected"; } ?>> Humanities </option>
      <option value="2" <?php if($_POST['dept']==2) { echo "selected"; } ?>> Business Studies </option>
    </select></td>
  </tr>
  						 <tr>
    <td class="text_table">Select Term *</td>
    
    <td><select name="term" id="term" onchange="callpage();">
      <option value=""> Select Term</option>
 <?php
 					$studClass=$_REQUEST['studClass'];
 					$stsess=$_REQUEST['stsess'];
					$gstterm="select * from borno_result_add_term where borno_school_id='$schId'  AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' order by borno_result_term_id asc";
					$qgstterm=$mysqli->query($gstterm);
					while($shqgstterm=$qgstterm->fetch_assoc()){ $sl++;
				
					
				?>
<option value=" <?php echo $shqgstterm['borno_result_term_id']; ?>" <?php if($shqgstterm['borno_result_term_id']==$_REQUEST['term']) { echo "selected"; }  ?>> <?php echo $shqgstterm['borno_result_term_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
                        </table>
                        
                         <br>
                            <table width="400" style="border: 1px solid #005067;">
                            
                              <tr>
                                <td align="center">Subject Name</td>
                               <?php
 					$studClass=$_REQUEST['studClass'];
 					$stsess=$_REQUEST['stsess'];
					$gtype="select * from borno_result_number_type where borno_school_id='$schId'  AND borno_school_class_id='$studClass' AND borno_school_session='$stsess'";
					$qgtype=$mysqli->query($gtype);
					$shqgtype=$qgtype->fetch_assoc();
				
					
				?>
                				<td align="center">Full Mark</td>
                                <td align="center"><?php echo substr($shqgtype['borno_school_number_type1'],0,3); ?> Mark</td>
                                <td align="center"><?php echo substr($shqgtype['borno_school_number_type1'],0,3); ?> Pass</td>
                                <td align="center"><?php echo substr($shqgtype['borno_school_number_type1'],0,3); ?> Conv</td>
                                <td align="center"><?php echo substr($shqgtype['borno_school_number_type2'],0,3); ?> Mark</td>
                                <td align="center"><?php echo substr($shqgtype['borno_school_number_type2'],0,3); ?> Pass</td>
                                <td align="center"><?php echo substr($shqgtype['borno_school_number_type2'],0,3); ?> Conv</td>
                                <td align="center"><?php echo substr($shqgtype['borno_school_number_type3'],0,3); ?> Mark</td>
                                <td align="center"><?php echo substr($shqgtype['borno_school_number_type3'],0,3); ?> Pass</td>
                                <td align="center"><?php echo substr($shqgtype['borno_school_number_type3'],0,3); ?> Conv</td>
                                <td align="center"><?php echo substr($shqgtype['borno_school_number_type4'],0,3); ?> Mark</td>
                                 <td align="center"><?php echo substr($shqgtype['borno_school_number_type4'],0,3); ?> Pass</td>
                                 <td align="center"><?php echo substr($shqgtype['borno_school_number_type4'],0,3); ?> Conv</td>
                                <td align="center"><?php echo substr($shqgtype['borno_school_number_type5'],0,3); ?> Mark</td>
                                <td align="center"><?php echo substr($shqgtype['borno_school_number_type5'],0,3); ?> Pass</td>
                                <td align="center"><?php echo substr($shqgtype['borno_school_number_type5'],0,3); ?> Conv</td>
                                <td align="center"><?php echo substr($shqgtype['borno_school_number_type6'],0,3); ?> Mark</td>
                                <td align="center"><?php echo substr($shqgtype['borno_school_number_type6'],0,3); ?> Pass</td>
                                <td align="center"><?php echo substr($shqgtype['borno_school_number_type6'],0,3); ?> Conv</td>
                                                              </tr>
                              
                              <?php
 					$studClass=$_REQUEST['studClass'];
 					$stsess=$_REQUEST['stsess'];
					$dept=$_REQUEST['dept'];
					$gsubject="select * from borno_subject_eleven_twelve where borno_subject_eleven_twelve_dept='$dept' OR borno_subject_eleven_twelve_dept='0'";
					$qgsubject=$mysqli->query($gsubject);
					while($shqgsubject=$qgsubject->fetch_assoc()){$s++;
					

				?>
                              <tr>
          <td align="center"><input name="subname[]" type="text" id="subname[]" value="<?php echo $shqgsubject['borno_subject_eleven_twelve_name']; ?>" size="15" readonly="readonly">
          <input type="hidden" name="subid[]" id="subid[]" value="<?php echo $shqgsubject['borno_subject_eleven_twelve_id']; ?>" /></td>
         <td align="center"><input name="Full[]" type="text" id="Full[]" size="2"></td>         
         <td align="center"><input name="mark1[]" type="text" id="mark1[]" size="2" value="0"></td>
         <td align="center"><input name="pass1[]" type="text" id="pass1[]" size="2" value="0"></td>
         <td align="center"><input name="con1[]" type="text" id="con1[]" size="2" value="0"></td>
         <td align="center"><input name="mark2[]" type="text" id="mark2[]" size="2" value="0"></td>
         <td align="center"><input name="pass2[]" type="text" id="pass2[]" size="2" value="0"></td>
         <td align="center"><input name="con2[]" type="text" id="con2[]" size="2" value="0"></td>         			         <td align="center"><input name="mark3[]" type="text" id="mark3[]" size="2" value="0"></td>
         <td align="center"><input name="pass3[]" type="text" id="pass3[]" size="2" value="0"></td>
         <td align="center"><input name="con3[]" type="text" id="con3[]" size="2" value="0"></td> 
         <td align="center"><input name="mark4[]" type="text" id="mark4[]" size="2" value="0"></td>
         <td align="center"><input name="pass4[]" type="text" id="pass4[]" size="2" value="0"></td>
         <td align="center"><input name="con4[]" type="text" id="con4[]" size="2" value="0"></td>		 					         <td align="center"><input name="mark5[]" type="text" id="mark5[]" size="2" value="0"></td>
         <td align="center"><input name="pass5[]" type="text" id="pass5[]" size="2" value="0"></td>
         <td align="center"><input name="con5[]" type="text" id="con5[]" size="2" value="0"></td> 
         <td align="center"><input name="mark6[]" type="text" id="mark6[]" size="2" value="0"></td>
         <td align="center"><input name="pass6[]" type="text" id="pass6[]" size="2" value="0"></td>
         <td align="center"><input name="con6[]" type="text" id="con6[]" size="2" value="0"></td>
                                   </tr>
                               <?php } ?>
                               <tr>
                                <td colspan="16" align="center"><input type="submit" name="button" id="button" value="Submit" onClick="return contalt_valid()"></td>
                              </tr>
                            </table>
                        
                        
                        </form>
                        <br>
                        
                  </center>
                </div>
            </div>
        </div><!-- Main Body part end -->
    </div><!-- Main Content end -->
</div>

<!--Script part-->
<script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js"></script>
</body>
</html>