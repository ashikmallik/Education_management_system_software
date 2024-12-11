<?php require_once('result_sett_top.php');?>
<!DOCTYPE html>
<html>
<head>
    <title> :: [Result  Settings]:: </title>
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
 document.frmcontent.action="manage_subject68.php";
 document.frmcontent.submit();
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
                <h3> Result Settings [ <?php echo $shget_schoolName['borno_school_name']; ?> ]</h3>
                
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Manage Subject Six to Eight</h2></div>
                <div class="form">
                    <center>
                    	<form name="frmcontent" action="manage_subject68_do.php" method="post" enctype="multipart/form-data">
                        <?php
			$msg=$_GET['msg'];
	 if($msg==3) { echo "You already create Subject "; }
			else if($msg==1) { echo "Manage Subject successful "; }
			else if($msg==2) { echo "Failed"; }

 ?>
                        <table style="border: 1px solid #005067;">
                                               
                         <tr>
    <td class="text_table">Select Class *</td>
    
    <td><select name="studClass" id="studClass" onchange="callpage();">
      <option value=""> Select </option>
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
      <?php }
      
      
      ?>
    </select></td>
  </tr>
                        </table>
                       </form>
                        <br>
                        <form name="frmcontent1" action="manage_subject68_do.php" method="post" enctype="multipart/form-data">
                            <table width="400" style="border: 1px solid #005067;">
                              <tr>
                                <td align="center">Subject Name</td>
                               
                                <td align="center">Mark</td>
                                <td align="center">Uncountable</td>
                                <td align="center">4th Subject</td>
                              </tr>
                               
                     
                              <tr>
                              <?php

						$studClass=$_POST['studClass'];
 						$stsess=$_POST['stsess'];
						$term = $_REQUEST['term'];
						
            $gtedtgrade="select * from borno_set_subject_six_eight where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id = '$term'  order by subject_id_six_eight asc";
			$s=0;
            $qgtedtgrade=$mysqli->query($gtedtgrade);
           while($shgtedtgrade=$qgtedtgrade->fetch_assoc()){$s++;
		   
		   	$subject=$shgtedtgrade['subject_id_six_eight'];
			
		   $gtsubject="select * from borno_subject_six_eight where subject_id_six_eight='$subject'";
			
            $qgtsubject=$mysqli->query($gtsubject);
          	$shqgtsubject=$qgtsubject->fetch_assoc();
		  
		   
		   
   ?>
                                <td align="center"><input name="subname[]" type="text" id="subname[]" size="30" value=" <?php echo $shqgtsubject['six_eight_subject_name']; ?>">
                                <input type="hidden" name="subid[]" id="subid[]" value="<?php echo $shgtedtgrade['borno_set_subject_six_eight_id']; ?>" />
                                <input type="hidden" name="pare[]" id="pare[]" value="<?php echo $shqgtsubject['six_eight_subject_pare']; ?>" />
                                
                                </td>
                                
                                
                                <td align="center"><input name="perc[]" type="text" id="perc[]" size="5" value=" <?php echo $shgtedtgrade['sub_six_eight_fullmark']; ?>">
                                
                                </td>
                                 <td align="center">
                                   <select name="uncountable[]" id="uncountable[]">
                                   		<option value="0" <?php if($shgtedtgrade['uncountable']=='0') { echo "selected"; } ?>> Main </option>
                                        <option value="1" <?php if($shgtedtgrade['uncountable']=='1') { echo "selected"; } ?>> Uncountable </option>
                                        
                                   </select>
                                 </td>
                                 </td>
                                 <td align="center">
                                   <select name="sub4th[]" id="sub4th[]">
                                   <option value="0" <?php if($shgtedtgrade['six_eight_4th_subject']=='0') { echo "selected"; } ?>> Main </option>
                                        <option value="1" <?php if($shgtedtgrade['six_eight_4th_subject']=='1') { echo "selected"; } ?>> 4th Subject </option>
                                   		
                                   </select>
                                 </td>
                              </tr>
                                <?php } ?>
                               
                               <tr>
                                <td colspan="4" align="center"><input type="submit" name="button" id="button" value="Set"></td>
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
<!--<script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js"></script>-->
</body>
</html>