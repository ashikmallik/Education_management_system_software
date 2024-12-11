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
                  <h2>Edit  Quota</h2></div>
                <div class="form">
                    <center>
                    	
						<?php
	$smsqtaId=$_GET['smsqtaId'];
	
	$smsqta="SELECT * FROM `sms_quota` WHERE `sms_quota_id`='$smsqtaId'";
	$qsmsqta=$mysqli->query($smsqta);
	$shqtasms=$qsmsqta->fetch_assoc();


?>






<form action="update_sms_quota.php" method="post" enctype="multipart/form-data">
    <table width="500" border="0" cellspacing="0" cellpadding="0" class="projectlist">
      <tr>
        <td colspan="3" align="center">Update  SMS Quota</td>
      </tr>
      <tr>
        <td width="176">School Name</td>
        <td width="24" align="center"><strong>:</strong></td>
        <td width="400"><label for="schId"></label>
          <select name="instituteId" id="instituteId" onchange="callpage();">
            <option value=""> Select </option>
            <?php
                    	$school="select * from borno_school order by borno_school_name asc";
						$qschool=$mysqli->query($school);	
						while($shschool=$qschool->fetch_assoc()){
					?>
            <option value="<?php echo $shschool['borno_school_id']; ?>" <?php if($shschool['borno_school_id']==$shqtasms['schlog_id']) { echo "selected"; } ?>> <?php echo $shschool['borno_school_name']; ?></option>
            <?php } ?>
        </select></td>
      </tr>
      <tr>
        <td>SMS</td>
        <td align="center"><strong>:</strong></td>
        <td><label for="adsms"></label>
        <input type="text" name="adsms" id="adsms" value="<?php echo $shqtasms['total_sms']; ?>"></td>
      </tr>
      <tr>
        <td>Comments (For Admin)</td>
        <td align="center"><strong>:</strong></td>
        <td><input name="comments" type="text" id="comments" value="<?php echo $shqtasms['quota_comments']; ?>" /></td>
      </tr>
      <tr>
        <td>Comments (For Client)</td>
        <td align="center"><strong>:</strong></td>
        <td><input name="comentforClient" type="text" id="comentforClient" value="<?php echo $shqtasms['coments_clients']; ?>" /></td>
      </tr>
      <tr>
        <td>Message Expire Date</td>
        <td align="center"><strong>:</strong></td>
        <td>
    <table width="300" border="0" cellspacing="0" cellpadding="0" class="projectlist">
                  <tr>
                    <td colspan="3"><p><input type="text" id="datepicker" name="datepicker"></p></td>
                  </tr>
                  <tr>
                    <td align="center">Date :</td>
                    <td colspan="2"><?php echo $shqtasms['expire_date']; ?>
                    <input type="hidden" name="currdate" id="currdate" value="<?php echo $shqtasms['expire_date']; ?>"></td>
                  </tr>
                  <tr>
                    <td align="center">Day</td>
                    <td align="center">Month</td>
                    <td align="center">Year</td>
                  </tr>
                </table>

        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td><input type="submit" name="button" id="button" value="Update">
        <input type="hidden" name="smsqId" id="smsqId" value="<?php echo $shqtasms['sms_quota_id']; ?>"></td>
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




