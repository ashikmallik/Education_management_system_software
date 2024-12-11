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
 document.frmcontent.action="manage_grading.php";
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
                  <h2>Manage Grading</h2></div>
                <div class="form">
                    <center>
                    	<form name="frmcontent" action="manage_grading_do.php" method="post" enctype="multipart/form-data">
                        <?php
	$msg=$_GET['msg'];
	if($msg==1){echo "Manage Grading Successfull";} 
	else if($msg==2){echo "Manage Grading Failed";} 
	else if($msg==3){echo "Manage Grading Failed";} 
	else if($msg==4){echo "Add Grading Successfull";} 
	else if($msg==5){echo "Add Grading Failed";} 


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
     
    
    <td><select name="studClass1" id="studClass1">
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
  
        
    <td><select name="stsess1" id="stsess1">
      <option value="2018" <?php if($_POST['stsess']==2018) { echo "selected"; } ?>> 2018 </option>        
      <option value="2019" <?php if($_POST['stsess']==2019) { echo "selected"; } ?>> 2019 </option>
      <option value="2020" <?php if($_POST['stsess']==2020) { echo "selected"; } ?>> 2020 </option>
    </select></td>
  </tr>
                                
                        </table>

                        <br>


    <table width="400" style="border: 1px solid #005067;">
                                          
                              <tr>
                                <td align="center">Marks From</td>
                                <td align="center">Marks To</td>
                                <td align="center">Letter grade</td>
                                <td align="center">Grade point</td>
                              </tr>
                                                                                                 <?php
    		$studClass=$_POST['studClass'];
            $stsess=$_POST['stsess'];
            
            $gtedtgrade="select * from borno_grading_chart where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess'";
            $qgtedtgrade=$mysqli->query($gtedtgrade);
           $shgtedtgrade=$qgtedtgrade->fetch_assoc();	
   ?> 
                              <tr>
            
                                <td align="center">
    
                                    
                                    <input name="mrkfrom1" type="text" id="mrkfrom1" size="5" value="<?php echo $shgtedtgrade['marks_from1']; ?>"></td>
                                <td align="center"><input name="mrkto1" type="text" id="mrkto1" size="5" value="<?php echo $shgtedtgrade['marks_to1']; ?>"></td>
                                <td align="center"><input name="lg1" type="text" id="lg1" size="5"value="<?php echo $shgtedtgrade['letter_grade1']; ?>"></td>
                                <td align="center"><input name="gpa1" type="text" id="gpa1" size="5" value="<?php echo $shgtedtgrade['grade_point1']; ?>"></td>
                              </tr>
                               <tr>
                                <td align="center"><input name="mrkfrom2" type="text" id="mrkfrom2" size="5" value="<?php echo $shgtedtgrade['marks_from2']; ?>"></td>
                                <td align="center"><input name="mrkto2" type="text" id="mrkto2" size="5" value="<?php echo $shgtedtgrade['marks_to2']; ?>"></td>
                                <td align="center"><input name="lg2" type="text" id="lg2" size="5"value="<?php echo $shgtedtgrade['letter_grade2']; ?>"></td>
                                <td align="center"><input name="gpa2" type="text" id="gpa2" size="5" value="<?php echo $shgtedtgrade['grade_point2']; ?>"></td>
                              </tr>
                               <tr>
                                <td align="center"><input name="mrkfrom3" type="text" id="mrkfrom3" size="5" value="<?php echo $shgtedtgrade['marks_from3']; ?>"></td>
                                <td align="center"><input name="mrkto3" type="text" id="mrkto3" size="5" value="<?php echo $shgtedtgrade['marks_to3']; ?>"></td>
                                <td align="center"><input name="lg3" type="text" id="lg3" size="5"value="<?php echo $shgtedtgrade['letter_grade3']; ?>"></td>
                                <td align="center"><input name="gpa3" type="text" id="gpa3" size="5" value="<?php echo $shgtedtgrade['grade_point3']; ?>"></td>
                              </tr>
                               <tr>
                                <td align="center"><input name="mrkfrom4" type="text" id="mrkfrom4" size="5" value="<?php echo $shgtedtgrade['marks_from4']; ?>"></td>
                                <td align="center"><input name="mrkto4" type="text" id="mrkto4" size="5" value="<?php echo $shgtedtgrade['marks_to4']; ?>"></td>
                                <td align="center"><input name="lg4" type="text" id="lg4" size="5"value="<?php echo $shgtedtgrade['letter_grade4']; ?>"></td>
                                <td align="center"><input name="gpa4" type="text" id="gpa4" size="5" value="<?php echo $shgtedtgrade['grade_point4']; ?>"></td>
                              </tr>
                               <tr>
                                <td align="center"><input name="mrkfrom5" type="text" id="mrkfrom5" size="5" value="<?php echo $shgtedtgrade['marks_from5']; ?>"></td>
                                <td align="center"><input name="mrkto5" type="text" id="mrkto5" size="5" value="<?php echo $shgtedtgrade['marks_to5']; ?>"></td>
                                <td align="center"><input name="lg5" type="text" id="lg5" size="5"value="<?php echo $shgtedtgrade['letter_grade5']; ?>"></td>
                                <td align="center"><input name="gpa5" type="text" id="gpa5" size="5" value="<?php echo $shgtedtgrade['grade_point5']; ?>"></td>
                              </tr>
                               <tr>
                                <td align="center"><input name="mrkfrom6" type="text" id="mrkfrom6" size="5" value="<?php echo $shgtedtgrade['marks_from6']; ?>"></td>
                                <td align="center"><input name="mrkto6" type="text" id="mrkto6" size="5" value="<?php echo $shgtedtgrade['marks_to6']; ?>"></td>
                                <td align="center"><input name="lg6" type="text" id="lg6" size="5"value="<?php echo $shgtedtgrade['letter_grade6']; ?>"></td>
                                <td align="center"><input name="gpa6" type="text" id="gpa6" size="5" value="<?php echo $shgtedtgrade['grade_point6']; ?>"></td>
                               </tr>
                               <tr>
                                <td align="center"><input name="mrkfrom7" type="text" id="mrkfrom7" size="5" value="<?php echo $shgtedtgrade['marks_from7']; ?>"></td>
                                <td align="center"><input name="mrkto7" type="text" id="mrkto7" size="5" value="<?php echo $shgtedtgrade['marks_to7']; ?>"></td>
                                <td align="center"><input name="lg7" type="text" id="lg7" size="5"value="<?php echo $shgtedtgrade['letter_grade7']; ?>"></td>
                                <td align="center"><input name="gpa7" type="text" id="gpa7" size="5" value="<?php echo $shgtedtgrade['grade_point7']; ?>"></td>
                               </tr>
                              
 <tr>
                                <td colspan="4" align="center"><input type="submit" name="button" id="button" value="Update" onClick="return contalt_valid()">

                                </td>
                              </tr>
                            </table>

                      </form>  
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