<?php require_once('report_sett_top.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>:: [Fees Report]::</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <!-- Meta tag -->
    <meta charset="utf-8">
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
<style>    
tr:nth-child(even) {background-color: #dbebf3;}
</style>
    
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
	
		function callpage()
	{
	 document.frmcontent.action="due_correction.php";
	 document.frmcontent.submit();
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
                <h3> Fees Transection </h3>
                
            </div>
            <div class="log_out">
                <a href="logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body" style="margin-top:5px; margin-left:5px;">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Fund Create</h2></div>
                <div class="form">
                    <center>
                        
                        <?php
	$msg=$_GET['msg'];
	if($msg==1){	
?>

 <table width="600" border="0" cellspacing="0" cellpadding="0" class="projectlist" align="center">
          <tr>
            <td height="75" style="color:#008000; font-weight:bold; font-size:32px; text-align:center; background:#CCC">  Successfully Fund Created </td>
          </tr>
        </table>

<br>
<br>
<br>
<?php
	
   }	else if ($msg==2){	
?>

        <table width="600" border="0" cellspacing="0" cellpadding="0" class="projectlist" align="center">
          <tr>
            <td height="75" style="color:#F00; font-weight:bold; font-size:32px; text-align:center; background:#CCC"> Fund Create Failed </td>
          </tr>
        </table>
<br>
<br>
<br>
<?php
	
   }	
?>
                        
        <form name="frmcontent" method="post" action="fund_create_do.php" enctype="multipart/form-data">
                        
        <table style="border:1px #000 solid; margin-top:-35px;">
   <tr>
    <td class="text_table">Student ID *</td>
    <td><input type="text" id="studid" name="studid" class="form-control" placeholder="Student ID" value=""/></td>
  </tr>            

  <tr>
<td colspan="2" align="center"><input type="submit" name="button" id="button" value="Create" onclick="return contalt_valid()"></td>
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