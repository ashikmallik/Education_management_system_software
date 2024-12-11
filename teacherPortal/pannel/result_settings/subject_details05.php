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
 document.frmcontent.action="subject_details05.php";
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
            <a href=""><img src="../assets/images/logo.jpg" class="img-fluid"></a>
        </div>
    </div><!-- side bar end -->

    <div class="ot_main_content">
        <div class="admin_logout">
            <div class="admin_head">
                <h3> Result Settings [ <?php echo $shget_schoolName['borno_school_name']; ?> ]</h3>
                
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Subject Details Play to Five</h2></div>
                <div class="form">
                    <center>
                    	<form name="frmcontent" action="subject_details05_do.php" method="post" enctype="multipart/form-data">
                        <?php
	$msg=$_GET['msg'];
	if($msg==1){echo "Add Subject Details Successfull";} 
	else if($msg==2){echo "Failed";} 
	else if($msg==3){echo "Subject Details Already Added";} 


 ?>
                        <table style="border: 1px solid #005067;">
                                               
                         <tr>
    <td class="text_table">Select Class *</td>
    
    <td><select name="studClass" id="studClass" onchange="callpage();">
      <option value=""> Select Class</option>
     <?php
					$gstclass="select * from borno_school_set_class where borno_school_id='$schId' GROUP BY borno_school_class_id order by class_order asc";
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
   <?php $curyear= date("Y"); 
  $descuryear=$curyear-1;
  $inccuryear=$curyear+1;
  ?>
  
  
    <td class="text_table">Session *</td>
    <td><select name="stsess" id="stsess" onchange="callpage();">
        <option value=""> Select Session</option>
    <option value="<?php echo $descuryear; ?>" <?php if($descuryear==$_REQUEST['stsess']) { echo "selected"; }  ?>> <?php echo $descuryear; ?> </option>
       <option value="<?php echo $curyear; ?>" <?php if($curyear==$_REQUEST['stsess']) { echo "selected"; }  ?>> <?php echo $curyear; ?> </option>
       <option value="<?php echo $inccuryear; ?>" <?php if($inccuryear==$_REQUEST['stsess']) { echo "selected"; }  ?>> <?php echo $inccuryear; ?> </option>
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
 					$term = $_REQUEST['term'];
					$gtype="select * from borno_result_number_type where borno_school_id='$schId'  AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id = '$term'";
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
 				
					$gsubject="select * from borno_result_subject where borno_school_id='$schId'  AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id = '$term' order by borno_result_subject_id Asc";
					$qgsubject=$mysqli->query($gsubject);
					while($shqgsubject=$qgsubject->fetch_assoc()){$s++;
				
					
				?>
                              <tr>
          <td align="center"><input name="subname[]" type="text" id="subname[]" value="<?php echo $shqgsubject['borno_school_subject_name']; ?>" size="15" readonly="readonly">
          <input type="hidden" name="subid[]" id="subid[]" value="<?php echo $shqgsubject['borno_result_subject_id']; ?>" /></td>
         <td align="center"><input name="Full[]" type="text" id="Full[]" value="<?php echo $shqgsubject['borno_school_subject_fullmark']; ?>" size="2" readonly="readonly"></td>         
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
         <td align="center"><select name="subtype[]" id="subtype[]" value="0">
<option value="0"<?php if($shqgsubject['subst']=='0') { echo "selected"; } ?>> Main </option>
<option value="1"<?php if($shqgsubject['subst']=='1') { echo "selected"; } ?>> Uncountable </option>
<option value="2"<?php if($shqgsubject['subst']=='2') { echo "selected"; } ?>> Reject </option>
                        
                            </select>
                                 </td>
         <td align="center"><select name="pare[]" id="pare[]">
<option value="0"<?php if($shqgsubject['pare']=='0') { echo "selected"; } ?>> N/A </option>
<option value="1"<?php if($shqgsubject['pare']=='1') { echo "selected"; } ?>> Pare Bangla </option>
<option value="2"<?php if($shqgsubject['pare']=='2') { echo "selected"; } ?>> Pare English </option>
                        
                            </select>
                                 </td>                                                          </tr>
                               <?php } ?>
                               <tr>
                                <td colspan="17" align="center"><input type="submit" name="button" id="button" value="Submit"></td>
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