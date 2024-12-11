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
                  <h2>Fund Assign</h2></div>
                <div class="form">
                    <center>
                    	<form name="frmcontent" action="assign_fund_do.php" method="post" enctype="multipart/form-data">
                        <?php
			$msg=$_GET['msg'];
			if($msg==1) { echo "Success"; }
			else if($msg==2) { echo "Failed"; }
            else if($msg==3) { echo "Fund Already Exist"; }
 ?>
                        <table style="border: 1px solid #005067;">
                                               
                         <tr>
    <td class="text_table">Fund Name *</td>
    
    <td><input type="text" name="fandName" id="fandName" size="30">
      </td>
  </tr>
  <tr>
    <td class="text_table">Fund Type *</td>
    <td><select name="fundStutas" id="fundStutas">       
        <option value="1"> Regular </option>
        <option value="0"> Irregular </option>
      </select></td>
  </tr>

    <tr>
         <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Set" onClick="return contalt_valid()"></td>
  </tr>
       </form>   
                        </table>
                        <br>
                            <table width="400" border="1" style="border: 1px solid #005067;">
                              <tr>
                                <td align="center">SL</td>  
                                <td align="center">Fund Name</td>
                               
                                <td align="center">Action</td>
                              </tr>
                                <?php
  		$gtfundName="select * from borno_school_fund where borno_school_id='$schId' order by borno_school_fund_id";
		$sl=0;
		$qgtfundName=$mysqli->query($gtfundName);
		while($shgtfundName=$qgtfundName->fetch_assoc()){
		
		$sl++;
  
  ?>
                             <tr>
    <td align="center"><?php echo $sl; ?></td>
    <td><?php echo $shgtfundName['borno_school_fund_name']; ?></td>
    <td align="center"><a href="edit_fund.php?fundId=<?php echo $shgtfundName['borno_school_fund_id']; ?>">Edit</a></td>
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
<script type="text/javascript" src="../../academic/assets/js/jquery-3.2.1.min.js"></script>
</body>
</html>