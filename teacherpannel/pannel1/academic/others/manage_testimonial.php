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
 document.frmcontent.action="manage_testimonial.php";
 document.frmcontent.submit();
}
</script>
<script language="javascript">
	function contalt_valid()
	{
		if(document.frmcontent.passyear.value=="")
		{
			alert("Please Select Class");
			document.frmcontent.passyear.focus();
			return (false);
		}
		if(document.frmcontent.datepicker.value=="")
		{
			alert("Please Select Date");
			document.frmcontent.datepicker.focus();
			return (false);
		}
						
	}
</script> 

 <link rel="stylesheet" href="datCss/jquery-ui.css">
    <link rel="stylesheet" href="datCss/jquery-ui1.css">
    <link rel="stylesheet" href="datCss/style.css">
    <script src="datCss/jquery-1.12.4.js"></script>
    <script src="datCss/jquery-ui.js"></script>
    <script src="datCss/jquery-ui1.js"></script>

<script>
  $( function() {
    $( "#datepicker" ).datepicker();
	
  } );
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
                  <h2>Manage Testimonial</h2></div>
                <div class="form">
                    <center>
                    	<form name="frmcontent" action="manage_testimonial_do.php" method="post" enctype="multipart/form-data">
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
      <option value="2019" <?php if($_POST['passyear']==2019) { echo "selected"; } ?>> 2019 </option>
      <option value="2020" <?php if($_POST['passyear']==2020) { echo "selected"; } ?>> 2020 </option>
       </select></td>
  </tr>	          
                
                <tr>
    <td class="text_table">Date *</td>
    <td><input type="text" name="datepicker" id="datepicker" size="28"></td>
  </tr>
                		
                        </table>
                        
                         <br>
                            <table width="600" border="1" style="border: 1px solid #005067;">
                              <tr>
                                 <td align="center">Roll</td>
                                 <td>Name</td>
                                 <td align="center">Birth</td>
                                 <td align="center">Session</td>
                                 <td align="center">Roll</td>
                                 <td align="center">Reg.</td>
                                 <td align="center">GPA</td>
                               </tr>
<?php 

$passyear=$_POST['passyear'];
$exam=$_POST['exam'];
$group=$_POST['group'];

  $stdinfo ="select * from borno_school_testimonial where borno_school_passing_year='$passyear' AND borno_school_exam='$exam' AND borno_school_group='$group' order by borno_school_roll asc";
					$qstdinfo=$mysqli->query($stdinfo);
					$sl=0;
					while($stqqstdinfo=$qstdinfo->fetch_assoc()){$sl++;
					

?>                   
                              
                             
                               <tr>
<td align="center"><?php echo $stqqstdinfo['borno_school_roll']; ?><input type="hidden" name="roll[]" id="roll[]" value="<?php echo $stqqstdinfo['borno_school_roll']; ?>" /></td>
<td align="center"><?php echo $stqqstdinfo['borno_school_student_name']; ?><input type="hidden" name="stuName[]" id="stuName[]" value="<?php echo $stqqstdinfo['borno_school_student_name']; ?>" />
<input type="hidden" name="tesid[]" id="tesid[]" value="<?php echo $stqqstdinfo['borno_school_testimonial_id']; ?>" />
<input type="hidden" name="father[]" id="father[]" value="<?php echo $stqqstdinfo['borno_school_father_name']; ?>" />
  <input type="hidden" name="mother[]" id="mother[]" value="<?php echo $stqqstdinfo['borno_school_mother_name']; ?>" /></td>
<td align="center"><?php echo $stqqstdinfo['borno_school_dob']; ?><input type="hidden" name="studob[]" id="studob[]" value="<?php echo $stqqstdinfo['borno_school_dob']; ?>" /></td>
<td align="center"><input type="text" name="sess[]" id="sess[]" size="5" value="<?php echo $stqqstdinfo['borno_school_exam_session']; ?>"></td>
<td align="center"><input type="text" name="roll1[]" id="roll1[]" size="5" value="<?php echo $stqqstdinfo['borno_school_board_roll']; ?>"></td>
<td align="center"><input type="text" name="reg[]" id="reg[]" size="5" value="<?php echo $stqqstdinfo['borno_school_reg']; ?>"></td>
<td align="center"><input type="text" name="gpa[]" id="gpa[]" size="5" value="<?php echo $stqqstdinfo['borno_school_gpa']; ?>"></td>
 </tr>
                               <?php }?>
                               <tr><td colspan="7" align="center"><input type="submit" name="button" id="button" value="Submit" onClick="return contalt_valid()"></td></tr>
                              
                               
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

</body>
</html>