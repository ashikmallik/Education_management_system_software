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
 document.frmcontent.action="testimonial_settings.php";
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
                  <h2>Testimonial Settings</h2></div>
                <div class="form">
                    <center>
                    	<form name="frmcontent" action="testimonial_settings_do.php" method="post" enctype="multipart/form-data">
                   	    <br>
                        <?php
			$msg=$_GET['msg'];
	 if($msg==3) { echo "You already create settings"; }
			else if($msg==1) { echo "Add Settings Successful "; }
			else if($msg==2) { echo "Failed"; }

 ?>
                            <table width="400" style="border: 1px solid #005067;">
                       
                             
                               <tr>
                                 <td class="text_table">Exam Type</td>
                                 <td colspan="14" align="center"><select name="extype" id="extype" onchange="callpage();">
      <option value=""> Select</option>
      <option value="PEC" <?php if($_POST['extype']=='PEC') { echo "selected"; } ?>> PEC </option>
      <option value="JSC" <?php if($_POST['extype']=='JSC') { echo "selected"; } ?>> JSC </option>
      <option value="SSC" <?php if($_POST['extype']=='SSC') { echo "selected"; } ?>> SSC </option>
      <option value="HSC" <?php if($_POST['extype']=='HSC') { echo "selected"; } ?>> HSC </option>
          </select></td>
                               </tr>
                               <tr>
                                 <td width="131" class="text_table">School Address</td>
                                 <td width="257" colspan="14" align="center">
                                 <input type="text" name="address" id="address" size="28"></td>
                               </tr>
                               <tr>
                                 <td class="text_table">Exam Name</td>
                                 <td colspan="14" align="center">
                                 <input type="text" name="exam" id="exam" size="28"></td>
                               </tr>
                               <tr>
                                 <td class="text_table">Student Type1</td>
                                 <td colspan="14" align="center"><select name="stdtype1" id="stdtype1">
      <option value=""> Select</option>
      <option value="He" <?php if($_POST['stdtype1']=='He') { echo "selected"; } ?>> He </option>
      <option value="She" <?php if($_POST['stdtype1']=='She') { echo "selected"; } ?>> She </option>
      <option value="He/She" <?php if($_POST['stdtype1']=='He/She') { echo "selected"; } ?>> He/She </option>
          </select></td>
                               </tr>
                               <tr>
                                 <td class="text_table">Student Type2</td>
                                 <td colspan="14" align="center"><select name="stdtype2" id="stdtype2">
      <option value=""> Select</option>
      <option value="he" <?php if($_POST['stdtype2']=='he') { echo "selected"; } ?>> he </option>
      <option value="she" <?php if($_POST['stdtype2']=='she') { echo "selected"; } ?>> she </option>
      <option value="he/she" <?php if($_POST['stdtype2']=='he/she') { echo "selected"; } ?>> he/she </option>
          </select></td>
                               </tr>
                                <tr>
                                 <td class="text_table">Student Type3</td>
                                 <td colspan="14" align="center"><select name="stdtype3" id="stdtype3">
      <option value=""> Select</option>
      <option value="His" <?php if($_POST['stdtype3']=='His') { echo "selected"; } ?>> His </option>
      <option value="Her" <?php if($_POST['stdtype3']=='Her') { echo "selected"; } ?>> Her </option>
       <option value="His/Her" <?php if($_POST['stdtype3']=='His/Her') { echo "selected"; } ?>> His/Her </option>
        </select></td>
                               </tr>
                               <tr>
                                 <td class="text_table">Student Type4</td>
                                 <td colspan="14" align="center"><select name="stdtype4" id="stdtype4">
      <option value=""> Select</option>
      <option value="his" <?php if($_POST['stdtype4']=='his') { echo "selected"; } ?>> his </option>
      <option value="her" <?php if($_POST['stdtype4']=='her') { echo "selected"; } ?>> her </option>
      <option value="his/her" <?php if($_POST['stdtype4']=='his/her') { echo "selected"; } ?>> his/her </option>
          </select></td>
                               </tr>
                               <tr>
                                 <td class="text_table">Child Type</td>
                                 <td colspan="14" align="center"><select name="child" id="child">
      <option value=""> Select</option>
      <option value="son" <?php if($_POST['child']=='son') { echo "selected"; } ?>> son </option>
      <option value="daughter" <?php if($_POST['child']=='daughter') { echo "selected"; } ?>> daughter </option>
      <option value="son/daughter" <?php if($_POST['child']=="son/daughter") { echo "selected"; } ?>> son/daughter </option>
          </select></td>
                               </tr>
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