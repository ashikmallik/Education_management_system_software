<?php
    include('pannel_top.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title> :: [Admin Pannel] :: </title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <!-- Meta tag -->
    <meta charset="utf-8">
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
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
      
       <script>
      $( function() {
        $( "#datepicker1" ).datepicker1();
      } );
      </script>
    
    
</head>
<body>
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
                
                 <h3> Admin Pannel [ Add Data Section ] </h3> 
                
            </div>
            <div class="log_out">
                <a href="../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Add School</h2></div>
                <div class="form">
                    <center>
                    	
                        
                        <form name="frmcontent" action="sms_quota_do.php" method="post" enctype="multipart/form-data">
        <table width="500" border="0" cellspacing="0" cellpadding="0" class="projectlist">
      <tr>
        <td colspan="3" align="center" style="color:#FFFFFF; font-weight:bold">
        		<?php
                	$msg=$_GET['msg'];
					if($msg==1) { echo "Set Quota Successfull"; }
					else if($msg==2) { echo "Quota Set Failed"; }
				?>
        </td>
      </tr>
      <tr>
        <td colspan="3" align="center">Increase SMS Quota</td>
      </tr>
      <tr>
        <td width="180">Select School</td>
        <td width="20" align="center"><strong>:</strong></td>
        <td width="300"><label for="schId">
          <select name="instituteId" id="instituteId" onchange="callpage();">
            <option value=""> Select </option>
            <?php
                    	$school="select * from borno_school order by borno_school_name asc";
						$qschool=$mysqli->query($school);	
						while($shschool=$qschool->fetch_assoc()){
					?>
            <option value="<?php echo $shschool['borno_school_id']; ?>" <?php if($shschool['borno_school_id']==$_POST['instituteId']) { echo "selected"; } ?>> <?php echo $shschool['borno_school_name']; ?></option>
            <?php } ?>
          </select>
        </label></td>
      </tr>
      <tr>
        <td>SMS</td>
        <td align="center"><strong>:</strong></td>
        <td><label for="adsms"></label>
        <input type="text" name="adsms" id="adsms"></td>
      </tr>
      <tr>
        <td>Comments (For Admin)</td>
        <td align="center"><strong>:</strong></td>
        <td><label for="comments"></label>
        <input name="comments" type="text" id="comments" /></td>
      </tr>
      <tr>
        <td>Comments (For Client)</td>
        <td align="center">&nbsp;</td>
        <td><label for="comentforClient"></label>
        <input name="comentforClient" type="text" id="comentforClient" /></td>
      </tr>
      <tr>
        <td>Message Expire Date</td>
        <td align="center"><strong>:</strong></td>
        <td>
    			<p><input type="text" id="datepicker" name="datepicker"></p>

        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td><input type="submit" name="button" id="button" value="Save"></td>
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