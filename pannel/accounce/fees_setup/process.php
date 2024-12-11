<?php require_once('fees_sett_top.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>:: [Fees Setup]::</title>
    <link rel="stylesheet" type="text/css" href="../../academic/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../academic/assets/css/font-awesome.css">
    <!-- Meta tag -->
    <meta charset="utf-8">
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
<style>    
tr:nth-child(even) {background-color: #dbebf3;}
/*tr:nth-child(odd) {background-color: #00968899;}*/
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
	 document.frmcontent.action="process.php";
	 document.frmcontent.submit();
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
                <h3> Fees Setup </h3>
                
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../../academic/assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body" style="margin-top:5px; margin-left:5px;">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Process</h2></div>
                <div class="form">
                    <center>
        <form name="frmcontent" action="" method="post" enctype="multipart/form-data">
                        
        <table style="border:1px #000 solid; margin-top:-35px;">
         
  <tr style="background-color: #75cbd6;">
    <td class="text_table">Process Name*:</td>
    <td ><select name="processid" id="processid" onchange="callpage();">
      <option value="">--Select--</option>
      <?php
                    $gtfiscalyear="select * from process_setup";
                    		$sl=0;
                    		$qgtfiscalyear=$mysqli->query($gtfiscalyear);
                    		while($shgtfiscalyear=$qgtfiscalyear->fetch_assoc()){$sl++;
				
				?>
      <option value=" <?php echo $shgtfiscalyear['process_setup_id']; ?>" <?php if($shgtfiscalyear['process_setup_id']==($_REQUEST['processid'])) { echo "selected"; }  ?>> <?php   echo $shgtfiscalyear['process_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>

       </form>   
                        </table>
                        <br>
                            <table width="800" border="1" style="border: 1px solid #005067;">
                              <tr style="background-color: #005067; color: #fff;">
                                <td align="center">SL</td>  
                                <td align="center">Month Name</td>
                               <td align="center">Status</td>
                                <td align="center">Action</td>
                              </tr>
                                <?php
                                
                                    
         	$processid=$_REQUEST['processid'];
        
			
			if($processid!=""){
	  
  		$gtfeeshead="SELECT * FROM `process_details` WHERE process_setup_id ='$processid' ";
		$sl=0;
		$qgtfeeshead=$mysqli->query($gtfeeshead);
		while($shgtfeeshead=$qgtfeeshead->fetch_assoc()){
		
		$sl++;
  
  ?>
    <tr>
    <td align="center" width="4%;"><?php echo $sl; ?></td>
    <td width="16%;" align="center"><?php echo $shgtfeeshead['month_name']; ?></td>
  
     <td width="18%;" align="center"><?php if ($shgtfeeshead['isProcessed']==1){echo "Processed";} else if($shgtfeeshead['isProcessed']==1 && $shgtfeeshead['isPublished']==1){ echo "Published";} else{ echo "Not Processed";} ?></td>
    <td align="center" width="16%;">
        
        <?php if ($shgtfeeshead['isProcessed']==0){ ?>
        <a style = "background-color: #68c34a; color: white; padding: 5px 16px;text-align: center;text-decoration: none;display: inline-block;" href="fees_process.php?detailsid=<?php echo $shgtfeeshead['process_details_id'];?>">Process</a>
        <?php } else { ?>
        <a style = "background-color: red; color: white; padding: 5px 16px;text-align: center;text-decoration: none;display: inline-block;" href="process_clear.php?detailsid=<?php  ?>">Process Clear</a>
      <?php }  
      //if($shgtfeeshead['isPublished']==0){ ?>
        <!--<a style = "background-color: #9c27b0; color: white; padding: 5px 16px;text-align: center;text-decoration: none;display: inline-block;" href="process_published.php?detailsid=<?php  ?>">Publish</a>-->
        <!--<?php // } ?>-->
    </td>
  </tr>
                              
      
  <?php }} ?>                    
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