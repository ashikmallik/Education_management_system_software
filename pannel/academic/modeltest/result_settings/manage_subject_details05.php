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
 document.frmcontent.action="manage_subject_details05.php";
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
		if(document.frmcontent.termsess.value=="")
		{
			alert("Please Select Session");
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
                  <h2>Manage Subject Details Play to Five</h2></div>
                <div class="form">
                    <center>
                    	<form name="frmcontent" action="manage_subject_details05_do.php" method="post" enctype="multipart/form-data">
                        <?php
	$msg=$_GET['msg'];
	if($msg==1){echo "Manage Subject Details Successfull";} 
	else if($msg==2){echo "Failed";} 
	else if($msg==3){echo "Add Subject Details Successfull";} 


 ?>
                        <table style="border: 1px solid #005067;">
                                               
                         <tr>
    <td class="text_table">Select Class *</td>
    
    <td><select name="studClass" id="studClass" onchange="callpage();">
      <option value=""> Select Class</option>
     <?php
					$gstclass="select * from borno_school_set_class where borno_school_id='$schId' order by class_order asc";
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
    <td class="text_table">Session *</td>
    <td><select name="stsess" id="stsess" onchange="callpage();">
      <option value=""> Select</option>
      <option value="2018" <?php if($_POST['stsess']==2018) { echo "selected"; } ?>> 2018 </option>
      <option value="2019" <?php if($_POST['stsess']==2019) { echo "selected"; } ?>> 2019 </option>
      <option value="2020" <?php if($_POST['stsess']==2020) { echo "selected"; } ?>> 2020 </option>
    </select></td>
  </tr>
  						 <tr>
    <td class="text_table">Select Term *</td>
    
    <td><select name="term" id="term" onchange="callpage();">
      <option value=""> Select Term</option>
 <?php
 					$studClass=$_REQUEST['studClass'];
 					$stsess=$_REQUEST['stsess'];
					$gstterm="select * from modeltest_add_term where borno_school_id='$schId'  AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' order by borno_result_term_id asc";
					$qgstterm=$mysqli->query($gstterm);
					while($shqgstterm=$qgstterm->fetch_assoc()){ $sl++;
				
					
				?>
<option value=" <?php echo $shqgstterm['borno_result_term_id']; ?>" <?php if($shqgstterm['borno_result_term_id']==$_REQUEST['term']) { echo "selected"; }  ?>> <?php echo $shqgstterm['borno_result_term_name']; ?></option>
      <?php } ?>
    </select></td>
    <td><select name="term1" id="term1">
      <option value=""> Select Term</option>
 <?php
 					$studClass=$_REQUEST['studClass'];
 					$stsess=$_REQUEST['stsess'];
					$gstterm="select * from modeltest_add_term where borno_school_id='$schId'  AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' order by borno_result_term_id asc";
					$qgstterm=$mysqli->query($gstterm);
					while($shqgstterm=$qgstterm->fetch_assoc()){ $sl++;
				
					
				?>
<option value=" <?php echo $shqgstterm['borno_result_term_id']; ?>" <?php if($shqgstterm['borno_result_term_id']==$_REQUEST['term']) { echo "selected"; }  ?>> <?php echo $shqgstterm['borno_result_term_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
                        </table>
                        
                         <br>
                            <table style="border: 1px solid #005067;">
                            
                              <tr>
                                <td align="center">Subject Name</td>
                               <?php
 					$studClass=$_REQUEST['studClass'];
 					$stsess=$_REQUEST['stsess'];
					$gtype="select * from modeltest_assign_number_type where borno_school_id='$schId'  AND borno_school_class_id='$studClass' AND borno_school_session='$stsess'";
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
                                <td align="center">Subject Type</td>
                                <td align="center">Pare</td>
                              </tr>
                              <?php
 					$studClass=$_REQUEST['studClass'];
 					$stsess=$_REQUEST['stsess'];
					$term=$_REQUEST['term'];
					$gsubdetails="select * from modeltest_subject_details where borno_school_id='$schId'  AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id='$term' order by modeltest_subject_details_id asc";
					$qgsubdetails=$mysqli->query($gsubdetails);
					while($shqgsubdetails=$qgsubdetails->fetch_assoc()){$s++;
				
					$subjectname=$shqgsubdetails['borno_result_subject_id'];

					$gsubject="select * from modeltest_result_subject where borno_school_id='$schId'  AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND modeltest_result_subject_id='$subjectname'";
					$qgsubject=$mysqli->query($gsubject);
					$shqgsubject=$qgsubject->fetch_assoc();
				
					
				?>
                              <tr>
          <td align="center"><input name="subname[]" type="text" id="subname[]" value="<?php echo $shqgsubject['borno_school_subject_name']; ?>" size="15" readonly="readonly">
          <input type="hidden" name="subid[]" id="subid[]" value="<?php echo $shqgsubdetails['borno_result_subject_id']; ?>" /></td>
          <input type="hidden" name="subdetailid[]" id="subdetailid[]" value="<?php echo $shqgsubdetails['modeltest_subject_details_id']; ?>" /></td>
         <td align="center"><input name="Full[]" type="text" id="Full[]" value="<?php echo $shqgsubject['borno_school_subject_fullmark']; ?>" size="2" readonly="readonly"></td>         
         <td align="center"><input name="mark1[]" type="text" id="mark1[]" size="2" value="<?php echo $shqgsubdetails['number_type1_marks']; ?>"></td>
         <td align="center"><input name="pass1[]" type="text" id="pass1[]" size="2" value="<?php echo $shqgsubdetails['number_type1_pass']; ?>"></td>
         <td align="center"><input name="con1[]" type="text" id="con1[]" size="2" value="<?php echo $shqgsubdetails['number_type1_conv']; ?>"></td>
         <td align="center"><input name="mark2[]" type="text" id="mark2[]" size="2" value="<?php echo $shqgsubdetails['number_type2_marks']; ?>"></td>
         <td align="center"><input name="pass2[]" type="text" id="pass2[]" size="2" value="<?php echo $shqgsubdetails['number_type2_pass']; ?>"></td>
         <td align="center"><input name="con2[]" type="text" id="con2[]" size="2" value="<?php echo $shqgsubdetails['number_type2_conv']; ?>"></td>         			         <td align="center"><input name="mark3[]" type="text" id="mark3[]" size="2" value="<?php echo $shqgsubdetails['number_type3_marks']; ?>"></td>
         <td align="center"><input name="pass3[]" type="text" id="pass3[]" size="2" value="<?php echo $shqgsubdetails['number_type3_pass']; ?>"></td>
         <td align="center"><input name="con3[]" type="text" id="con3[]" size="2" value="<?php echo $shqgsubdetails['number_type3_conv']; ?>"></td> 
         <td align="center"><input name="mark4[]" type="text" id="mark4[]" size="2" value="<?php echo $shqgsubdetails['number_type4_marks']; ?>"></td>
         <td align="center"><input name="pass4[]" type="text" id="pass4[]" size="2" value="<?php echo $shqgsubdetails['number_type4_pass']; ?>"></td>
         <td align="center"><input name="con4[]" type="text" id="con4[]" size="2" value="<?php echo $shqgsubdetails['number_type4_conv']; ?>"></td>		 					         <td align="center"><input name="mark5[]" type="text" id="mark5[]" size="2" value="<?php echo $shqgsubdetails['number_type5_marks']; ?>"></td>
         <td align="center"><input name="pass5[]" type="text" id="pass5[]" size="2" value="<?php echo $shqgsubdetails['number_type5_pass']; ?>"></td>
         <td align="center"><input name="con5[]" type="text" id="con5[]" size="2" value="<?php echo $shqgsubdetails['number_type5_conv']; ?>"></td> 
         <td align="center"><input name="mark6[]" type="text" id="mark6[]" size="2" value="<?php echo $shqgsubdetails['number_type6_marks']; ?>"></td>
         <td align="center"><input name="pass6[]" type="text" id="pass6[]" size="2" value="<?php echo $shqgsubdetails['number_type6_pass']; ?>"></td>
         <td align="center"><input name="con6[]" type="text" id="con6[]" size="2" value="<?php echo $shqgsubdetails['number_type6_conv']; ?>"></td>  
         <td align="center"><select name="subtype[]" id="subtype[]">
<option value="0"<?php if($shqgsubdetails['subject_type']=='0') { echo "selected"; } ?>> Main </option>
<option value="1"<?php if($shqgsubdetails['subject_type']=='1') { echo "selected"; } ?>> Uncountable </option>
<option value="2"<?php if($shqgsubdetails['subject_type']=='2') { echo "selected"; } ?>> Reject </option>
                        
                            </select>
                                 </td>   
                                 <td align="center"><select name="pare[]" id="pare[]">
<option value="0"<?php if($shqgsubdetails['pare']=='0') { echo "selected"; } ?>> N/A </option>
<option value="1"<?php if($shqgsubdetails['pare']=='1') { echo "selected"; } ?>> Pare Bangla </option>
<option value="2"<?php if($shqgsubdetails['pare']=='2') { echo "selected"; } ?>> Pare English </option>
                        
                            </select>
                                 </td>                               </tr>
                               <?php } ?>
                               <tr>
                                <td colspan="15" align="center"><input type="submit" name="button" id="button" value="Submit"></td>
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