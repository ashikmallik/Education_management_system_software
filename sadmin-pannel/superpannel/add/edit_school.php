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
                    	
                        <form action="update_school.php" method="post" enctype="multipart/form-data">
                                <table width="500" border="0" cellspacing="0" cellpadding="0" align="center" class="projectlist">
                                  <tr>
                                    <td colspan="3" align="center">
                                    
                                     <strong>
                                        <?php
                                            $msg=$_GET['msg'];
                                            if($msg==1) { echo "Success"; }
                                            else if($msg==2) { echo "Failed"; }
                                            else { echo "Edit School/Collage"; }
                                            
                                            $scId=$_GET['scId'];
                                            $gtschool="select * from borno_school where borno_school_id='$scId'";
                                            $qgtschool=$mysqli->query($gtschool);	
                                            $shgtschool=$qgtschool->fetch_assoc();
                                            
                                            
                                            
                                        ?>
                                        
                                        </strong>
                                    
                                    </td>
                                    </tr>
                                  <tr>
                                    <td width="173"><strong>School Name</strong></td>
                                    <td width="25" align="center"><strong>:</strong></td>
                                    <td width="502"><label for="schName"></label>
                                      <input name="schName" type="text" id="schName" size="30" value="<?php echo $shgtschool['borno_school_name']; ?>"></td>
                                  </tr>
                                  <tr>
                                    <td><strong>Address</strong></td>
                                    <td align="center"><strong>:</strong></td>
                                    <td><label for="schAddress"></label>
                                      <textarea name="schAddress" id="schAddress" cols="30" rows="5"> <?php echo $shgtschool['borno_school_address']; ?> </textarea></td>
                                  </tr>
                                  <tr>
                                    <td><strong>Phone</strong></td>
                                    <td align="center"><strong>:</strong></td>
                                    <td><input name="schPhone" type="text" id="schPhone" size="30" value="<?php echo $shgtschool['borno_school_phone']; ?>"></td>
                                  </tr>
                                  <tr>
                                    <td><strong>E-mail</strong></td>
                                    <td align="center"><strong>:</strong></td>
                                    <td><input name="schEmail" type="text" id="schEmail" size="30" value="<?php echo $shgtschool['borno_school_email']; ?>"></td>
                                  </tr>
                                  <tr>
                                    <td><strong>Total Student</strong></td>
                                    <td align="center"><strong>:</strong></td>
                                    <td>
                                        <?php 
                                                    $finalSchoolId=$shgtschool['borno_school_id'];
                                                    $gtttalst="select * from borno_student_info where borno_school_id='$finalSchoolId'";
                                                    $qschool=$mysqli->query($gtttalst);
                                                    echo mysqli_num_rows($qschool); 
                                            ?>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td><strong>Login Id</strong></td>
                                    <td align="center"><strong>:</strong></td>
                                    <td><input name="schlogId" type="text" id="schlogId" size="30" value="<?php echo $shgtschool['borno_school_logid']; ?>"></td>
                                  </tr>
                                  <tr>
                                    <td><strong>Password</strong></td>
                                    <td align="center"><strong>:</strong></td>
                                    <td><input name="schPass" type="text" id="schPass" size="30" value="<?php echo $shgtschool['borno_school_logpass']; ?>"></td>
                                  </tr>
                                  <tr>
                                    <td><strong>Head of School</strong></td>
                                    <td align="center"><strong>:</strong></td>
                                    <td><label for="hosch"></label>
                                      <input name="hosch" type="text" id="hosch" size="30" value="<?php echo $shgtschool['borno_school_head']; ?>"></td>
                                  </tr>
                                  <tr>
                                    <td><img src="school-logo/<?php echo $shgtschool['borno_school_logo']; ?>" width="100" height="50"></td>
                                    <td>&nbsp;</td>
                                    <td><input type="submit" name="button" id="button" value="Update">
                                      <input type="hidden" name="schoolId" id="schoolId" value="<?php echo $shgtschool['borno_school_id']; ?>"></td>
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