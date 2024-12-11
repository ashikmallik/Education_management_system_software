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
                <h3 style="font-size:25px"> Result Settings [ <?php echo $shget_schoolName['borno_school_name']; ?> ]</h3>
                
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
      <option value="">--Select--</option>
     <?php
					$gstclass="select * from borno_school_set_class where borno_school_id='$schId' and borno_school_class_id!=16 and borno_school_class_id!=17 order by class_order asc";
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
      <option value="">--Select--</option>
     <?php
					$gstclass="select * from borno_school_set_class where borno_school_id='$schId' and borno_school_class_id!=16 and borno_school_class_id!=17 order by class_order asc";
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
    <option value="">--Session--</option>
      <?php
	  $studClass=$_REQUEST['studClass'];
	  
					$data1="select borno_school_session from borno_grading_chart where borno_school_id='$schId' and borno_school_class_id='$studClass' group by borno_school_session asc";
					$qdata1=$mysqli->query($data1);
					while($showdata1=$qdata1->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $showdata1['borno_school_session']; ?>" <?php if($showdata1['borno_school_session']==trim($_REQUEST['stsess'])) { echo "selected"; }  ?>> <?php echo $showdata1['borno_school_session']; ?></option>
      <?php } ?>
    </select></td>
        
    <td><select name="stsess1" id="stsess1" onchange="callpage();">
    <option value="">--Session--</option>
      <?php
	  
	  $studClass1=$_REQUEST['studClass1'];
					$data1="select borno_school_session from borno_grading_chart where borno_school_id='$schId' and borno_school_class_id='$studClass1' group by borno_school_session asc";
					$qdata1=$mysqli->query($data1);
					while($showdata1=$qdata1->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $showdata1['borno_school_session']; ?>" <?php if($showdata1['borno_school_session']==trim($_REQUEST['stsess'])) { echo "selected"; }  ?>> <?php echo $showdata1['borno_school_session']; ?></option>
      <?php } ?>
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
    		$studClass=trim($_POST['studClass']);
            $stsess=trim($_POST['stsess']);
            
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