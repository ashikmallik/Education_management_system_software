<?php require_once('result_sett_top.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>:: [Others Info]::</title>
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
 document.frmcontent.action="show_testimonial.php";
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
                <h3> Others Info </h3>
                
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Show Testimonial</h2></div>
                <div class="form">
                    <center>
                    	<form name="frmcontent" action="testimonial_entry_do.php" method="post" enctype="multipart/form-data">
                        <?php
	$msg=$_GET['msg'];
	if($msg==1){echo "Successfull";} 
	else if($msg==2){echo "Failed";} 
	else if($msg==3){echo "Already Exist";} 


 ?>
                        <table style="border: 1px solid #005067;">

             			 <tr>
    <td class="text_table">Group *</td>
    <td><select name="group" id="group" onchange="callpage();">
      <option value="">--Select--</option>
      <option value="1" <?php if($_POST['group']==1) { echo "selected"; } ?> > Science </option>
      <option value="2" <?php if($_POST['group']==2) { echo "selected"; } ?>> Business </option>
      <option value="3" <?php if($_POST['group']==3) { echo "selected"; } ?>> Humanities </option>
       </select></td>
  </tr>	
   <tr>
    <td class="text_table">Exam Name *</td>
    <td><select name="exam" id="exam" onchange="callpage();">
      <option value="">--Select--</option>
      <option value="PEC" <?php if($_POST['exam']==PEC) { echo "selected"; } ?>> PEC </option>
      <option value="JSC" <?php if($_POST['exam']==JSC) { echo "selected"; } ?>> JSC </option>
      <option value="SSC" <?php if($_POST['exam']==SSC) { echo "selected"; } ?>> SSC </option>
      <option value="HSC" <?php if($_POST['exam']==HSC) { echo "selected"; } ?>> HSC </option>
       </select></td>
  </tr>	 
      <tr>
    <td class="text_table">Passing Year *</td>
    <td><select name="passyear" id="passyear" onchange="callpage();">
      <option value="">--Select--</option>
      <option value="2018" <?php if($_POST['passyear']==2018) { echo "selected"; } ?>> 2018 </option>
      <option value="2019" <?php if($_POST['passyear']==2019) { echo "selected"; } ?>> 2019 </option>
      <option value="2020" <?php if($_POST['passyear']==2020) { echo "selected"; } ?>> 2020 </option>
       </select></td>
  </tr>	   
  <?php
 $group=$_POST['group'];
  $exam=$_POST['exam'];
  $passyear=$_POST['passyear'];


?>       
           <tr>
    <td colspan="2" align="center"><a href="download_testimonial.php?schoolId=<?php echo $schId; ?>&group=<?php echo $group; ?>&exam=<?php echo $exam; ?>&passyear=<?php echo $passyear; ?>" target="_blank">Show Testimonial</a></td>
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