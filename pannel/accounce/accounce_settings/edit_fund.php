<?php require_once('accounce_sett_top.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>:: [Accounce  Settings]::</title>
    <link rel="stylesheet" type="text/css" href="../../academic/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../academic/assets/css/font-awesome.css">
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
            <a href=""><img src="../../academic/assets/images/logo.jpg" class="img-fluid"></a>
        </div>
    </div><!-- side bar end -->

    <div class="ot_main_content">
        <div class="admin_logout">
            <div class="admin_head">
                <h3> Accounce Settings </h3>
                
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../../academic/assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Edit Fund</h2></div>
                <div class="form">
                    <center>
                    	<form name="frmcontent" action="edit_fund_do.php" method="post" enctype="multipart/form-data">
                        <?php
			$msg=$_GET['msg'];
			if($msg==1) { echo "Success"; }
			else if($msg==2) { echo "Failed"; }
            else if($msg==3) { echo "Fund Edit Not Possible"; }
 ?>
                        <table style="border: 1px solid #005067;">
                        
                        <?php
  		$fundId=$_GET['fundId'];
		$gtfundName="select * from borno_school_fund where borno_school_fund_id='$fundId'";		
		$qgtfundName=$mysqli->query($gtfundName);
		$shgtfundName=$qgtfundName->fetch_assoc();		
		
  
  ?>                       
                         <tr>
    <td class="text_table">Fund Name *</td>
    
    <td><input type="text" name="fandName" id="fandName" size="30" value="<?php echo $shgtfundName['borno_school_fund_name']; ?>">
      </td>
  </tr>
  <tr>
    <td class="text_table">Fund Type *</td>
    <td><select name="fundStutas" id="fundStutas"> 
         <option value=""> Select </option>
        <option value="1"<?php if($shgtfundName['fund_type']=='1') { echo "selected"; } ?>> Regular </option>
        <option value="0"<?php if($shgtfundName['fund_type']=='0') { echo "selected"; } ?>> Irregular </option>
      </select></td>
  </tr>

    <tr>
         <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Update" onClick="return contalt_valid()">
          <input type="hidden" name="fundId" id="fundId" value="<?php echo $shgtfundName['borno_school_fund_id']; ?>">
                  </td>
  </tr>
       </form>   
                        </table>
                   
                            

                      
                  </center>
                </div>
            </div>
        </div><!-- Main Body part end -->
    </div><!-- Main Content end -->
</div>

<!--Script part-->
<script type="text/javascript" src="../../academic/assets/js/jquery-3.2.1.min.js"></script>
</body>
</html>