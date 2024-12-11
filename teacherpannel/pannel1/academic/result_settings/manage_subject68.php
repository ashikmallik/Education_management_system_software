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
                <h3 style="font-size:25px"> Result Settings [ <?php echo $shget_schoolName['borno_school_name']; ?> ]</h3>
                
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
      <option value="">--Select--</option>
 <?php
					$gstclass="select * from borno_school_set_class where borno_school_id='$schId' and borno_school_class_id!=6 and borno_school_class_id!=7 and borno_school_class_id!=8 and borno_school_class_id!=9 and borno_school_class_id!=10 and borno_school_class_id!=11 and borno_school_class_id!=12 and borno_school_class_id!=13 and borno_school_class_id!=14 and borno_school_class_id!=15 and borno_school_class_id!=18 and borno_school_class_id!=19 and borno_school_class_id!=16 and borno_school_class_id!=17  order by class_order asc";
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
    <td>
    <select name="stsess" id="stsess" onchange="callpage();">
    <option value="">--Select--</option>
      <?php
	  $studClass=$_REQUEST['studClass'];
	  
					$data1="select borno_school_session from borno_set_subject_six_eight where borno_school_id='$schId' and borno_school_class_id='$studClass' group by borno_school_session asc";
					$qdata1=$mysqli->query($data1);
					while($showdata1=$qdata1->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $showdata1['borno_school_session']; ?>" <?php if($showdata1['borno_school_session']==trim($_REQUEST['stsess'])) { echo "selected"; }  ?>> <?php echo $showdata1['borno_school_session']; ?></option>
      <?php } ?>
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

						$studClass=trim($_POST['studClass']);
 						$stsess=trim($_POST['stsess']);
						
            $gtedtgrade="select * from borno_set_subject_six_eight where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess'  order by subject_id_six_eight asc";
			$s=0;
            $qgtedtgrade=$mysqli->query($gtedtgrade);
           while($shgtedtgrade=$qgtedtgrade->fetch_assoc()){$s++;
		   
		   	$subject=$shgtedtgrade['subject_id_six_eight'];
			
		   $gtsubject="select * from borno_subject_six_eight where   subject_id_six_eight='$subject'";
			
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