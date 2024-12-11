<?php require_once('teacher_top.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>Teacher Panel</title>
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
        <?php include('lefymenu.php'); ?>
        <div class="fixed_logo">
            <a href=""><img src="../assets/images/logo.jpg" class="img-fluid"></a>
        </div>
    </div><!-- side bar end -->
<script language="javascript">
	function contalt_valid()
	{
				
		if(document.frmcontent.timg.value=="")
		{
			alert("Please Uploar Signature");
			document.frmcontent.timg.focus();
			return (false);
		}
		
		
	}
	
	
	
</script>
    <div class="ot_main_content">
        <div class="admin_logout">
            <div class="admin_head">
                <h3>Teacher Panel [<?php echo $shget_schoolName['borno_school_name']; ?>]</h3>
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Add Head of School Signature</h2></div>
                <div class="form">
                    <center>
                    <form name="frmcontent" action="signature_do.php" method="post" enctype="multipart/form-data">
                     <?php
						$msg=$_GET['msg'];
						if($msg==1){ echo "Add Signature Successfull"; }
						else if($msg==2){ echo "Failed"; }
						//else if($msg==3){ echo "This Teacher is Already Added"; }					
				     ?>
                        <table width="434" style="border: 1px solid #005067;">
                           <tr>
                                <td width="172" class="text_table">Signature</td>
                                <td width="250"><input type="file" name="timg" id="timg"></td>
                            </tr>
                           <tr>
                             <td class="text_table">&nbsp;</td>
                             <td><input type="submit" name="button" id="button" value="Set"></td>
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