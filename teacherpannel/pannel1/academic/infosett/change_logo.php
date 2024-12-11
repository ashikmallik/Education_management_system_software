<?php require_once('information_top.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>Information Settings</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <!-- Meta tag -->
    <meta charset="utf-8">
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
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
                <h3> <?php echo $shget_schoolName['borno_school_name']; ?> </h3>
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Add Logo</h2></div>
                <div class="form">
                    <center>
                    <form action="change_logo_do.php" method="post" enctype="multipart/form-data">
<table width="465" border="0" cellspacing="0" cellpadding="0" align="center" class="projectlist">
  
  
  <tr>
    <td colspan="3" align="center">
    
    			<?php
                	$msg=$_GET['msg'];
					if($msg==1) { echo "Logo Changed Successfully"; }
					if($msg==2) { echo "! error Not Possible To Change"; }
					
				?>
    
    </td>
    </tr>
 
  
  
  <tr>
    <td width="132"><strong>Add Logo</strong></td>
    <td width="18" align="center"><strong>:</strong></td>
    <td width="315"><label for="schlogo"></label>
      <input type="file" name="schlogo" id="schlogo"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="button" id="button" value="Add"></td>
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

