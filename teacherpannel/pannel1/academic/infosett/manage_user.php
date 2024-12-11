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
    
    
    <script language="javascript">
		function callpage()
		{
		 document.frmart.action="manage_user.php";
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
                <h3> <?php echo $shget_schoolName['borno_school_name']; ?> </h3>
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2> Manage User</h2></div>
                <div class="form">
                    <center>
                    <form name="frmart" action="set_class_do.php" method="post" enctype="multipart/form-data">
                       	<?php
								$msg=$_GET['msg'];
								if($msg==1){ echo "Set Class Success"; }
								else if($msg==2){ echo "Failed"; }								
				         ?>

                        <table width="478" cellpadding="0" cellspacing="0" class="projectlist">
                            <tr align="center">
                              <td width="53" align="center" style="background:#FFF">SL</td>
                              <td width="246" align="center" style="background:#FFF">User Name</td>
                              <td width="112" align="center" style="background:#FFF">User ID</td>
                              <td width="65" align="center" style="background:#FFF">Action</td>
                            </tr>
                            <?php							
							$userid=$_GET['userid'];
							if($userid!=""){
								
								$delUserId="delete  from borno_user where borno_user_id='$userid'";
								$mysqli->query($delUserId);
								
								}
							 
							 
					 // $branchId=$_POST['branchId'];
					$getUserid="select * from borno_user where borno_school_id='$schId'  order by borno_user_id asc";
		
		$sl=0;
		$qgetUserid=$mysqli->query($getUserid);
		while($sqgetUserid=$qgetUserid->fetch_assoc()){
			$sl++; 
							
							?>
                            <tr>
                                <td align="center"> <?php echo $sl; ?> </td>
                                <td>
								<?php
									echo $sqgetUserid['borno_user_name']; 
								 
								 ?>
                                
                              </td>
                              
                              <td>
								<?php
									echo $sqgetUserid['borno_user_log_id']; 
								 
								 ?>
                                
                              </td>     
                              
                                <td align="center"><a href="manage_user.php?userid=<?php echo $sqgetUserid['borno_user_id']; ?>" onClick="return confirm('Seure To delete');"><img src="../images/b_drop.png" width="16" height="16"></a></td>
                          </tr>
                            <?php } ?>
                            
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