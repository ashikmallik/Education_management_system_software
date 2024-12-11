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
                <h3> Information Settings </h3>
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Add Branch</h2></div>
                <div class="form">
                    <center>
                    <form action="branch_do.php" method="post" enctype="multipart/form-data">
                        <table style="border: 1px solid #005067;">
                        <?php
                	$msg=$_GET['msg'];
					if($msg==1){ echo "Branch Add Successfull"; }
					else if($msg==2){ echo "Failed"; }
					else if($msg==3){ echo "Branch Already Exist"; }
					
				?>
                            <tr>
                                <td width="100" class="text_table">Branch Name :</td>
                                <td><input name="addBranch" type="text" id="addBranch"></td>
                            </tr>                            
                            <tr>
                                <td></td>
                                <td><center><input type="submit" name="" value="Save">
                                </center></td>
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