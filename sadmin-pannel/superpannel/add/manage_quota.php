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
    
    
    <script language="javascript">
	function callpage()
		{
			 document.frmart.action="manage_quota.php";
			 document.frmart.submit();
		}
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
                  <h2>Manage Quota</h2></div>
                <div class="form">
                    <center>
                    	


   							 <form name="frmart" action="index1.php?action=sms_quota_do" method="post" enctype="multipart/form-data">
                                    <table width="500" border="0" cellspacing="0" cellpadding="0" class="projectlist">
                                      <tr>
                                        <td colspan="3" align="center">Manage SMS Quota</td>
                                      </tr>
                                      <tr>
                                        <td width="176">Select School</td>
                                        <td width="24" align="center"><strong>:</strong></td>
                                        <td width="400"><select name="instituteId" id="instituteId" onchange="callpage();">
                                          <option value=""> Select </option>
                                          <?php
                                                        $school="select * from borno_school order by borno_school_name asc";
                                                        $qschool=$mysqli->query($school);	
                                                        while($shschool=$qschool->fetch_assoc()){
                                                    ?>
                                          <option value="<?php echo $shschool['borno_school_id']; ?>" <?php if($shschool['borno_school_id']==$_POST['instituteId']) { echo "selected"; } ?>> <?php echo $shschool['borno_school_name']; ?></option>
                                          <?php } ?>
                                        </select></td>
                                      </tr>
                                    </table>
                         </form>

									<br>

							<table width="500" border="0" cellspacing="0" cellpadding="0" class="projectlist">
                              <tr>
                                <td width="108">Message Date</td>
                                <td width="137">Message Time</td>
                                <td width="106">Total Message</td>
                                <td width="152">Expire Date</td>
                                <td colspan="2" align="center">Action</td>
                              </tr>
                              
                              <?php
                                
                                $smsqtaId=$_GET['smsqtaId'];
                                $delsmsq="delete from `sms_quota` where `sms_quota_id`='$smsqtaId'";
                                $mysqli->query($delsmsq);
                                
                                
                                $schoolId=$_POST['instituteId'];
                                $smsqta="SELECT * FROM `sms_quota` WHERE `schlog_id`='$schoolId' order by `expire_date` desc";
                                $qsmsqta=$mysqli->query($smsqta);
                                while($shqtasms=$qsmsqta->fetch_assoc()){
                              ?>
                              
                              
                              <tr>
                                <td><?php echo $shqtasms['sms_date']; ?></td>
                                <td><?php echo $shqtasms['sms_time']; ?></td>
                                <td><?php echo $shqtasms['total_sms']; ?></td>
                                <td><?php echo $shqtasms['expire_date']; ?></td>
                                <td width="44" align="center"><a href="edit_quota.php?smsqtaId=<?php echo $shqtasms['sms_quota_id']; ?>">Edit</a></td>
                                <td width="53" align="center"><a href="manage_quota.php?smsqtaId=<?php echo $shqtasms['sms_quota_id']; ?>">Delete</a></td>
                              </tr>
                              
                              <?php } ?>
                              
                            </table>

                        
                        
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