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
                  <h2>Fiscal Year Setup</h2></div>
                <div class="form">
                    <center>
                    	<form name="frmcontent" action="fiscal_year_setup_do.php" method="post" enctype="multipart/form-data">
                        <?php
			$msg=$_GET['msg'];
			if($msg==1) { echo "Success"; }
			else if($msg==2) { echo "Failed"; }
            else if($msg==3) { echo "Fiscal Year Already Exist/ Date Range Problem"; }
 ?>
                        
                        <table style="border:1px #000 solid; margin-top:-35px;">
                       
                                               
                         <tr>
    <td class="text_table">Fiscal Year  Name*</td>
    
    <td><input type="text" name="fiscalyearname" id="fiscalyearname" placeholder="2021 or 2020-21" style ="width: 194px;">
      </td>
  </tr>
    <?php
        
		date_default_timezone_set('Asia/Dhaka');	
		
		$cdate=date('d-m-Y');
		
	?>
  <tr style="background-color: #75cbd6;">
    <td class="text_table" >From Date *</td>
    <td><input type="text" name="fromdate" id="fromdate" value="<?php echo $cdate;?>" style ="width: 194px;"></td>
  </tr>                    
  <tr>
    <td class="text_table">To Date *</td>
    <td><input type="text" name="todate" id="todate" value="<?php echo $cdate;?>" style ="width: 194px;"></td>
  </tr> 
  
   <tr style="background-color: #75cbd6;">
    <td class="text_table">Session *</td>
    <td ><select name="stsess" id="stsess" onchange="callpage();">
      <option value="">--Select--</option>
      <?php
					$data1="select * from borno_student_info where borno_school_id='$schId' group by borno_school_session asc";
					$qdata1=$mysqli->query($data1);
					while($showdata1=$qdata1->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $showdata1['borno_school_session']; ?>" <?php if($showdata1['borno_school_session']==trim($_REQUEST['stsess'])) { echo "selected"; }  ?>> <?php   echo $showdata1['borno_school_session']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
  <tr>
    <td class="text_table">Type</td>
    <td><select name="type" id="type">
        <option value="">--Select--</option>
         <option value="School"> School </option>
        <option value="College"> College </option>
     </select></td>
  </tr> 
  <tr style="background-color: #75cbd6;">
         <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Set" onClick="return contalt_valid()"></td>
  </tr>
       </form>   
                        </table>
                        <br>
                            <table width="800" border="1" style="border: 1px solid #005067;">
                              <tr style="background-color: #005067; color: #fff;">
                                <td align="center">SL</td>  
                                <td align="center">Fiscal Year</td>
                               <td align="center">From Date</td>
                               <td align="center">To Date</td>
                               <td align="center">Type</td>
                               <td align="center">Status</td>
                                <td align="center">Action</td>
                              </tr>
                                <?php
  		$gtfiscalyear="select * from fiscal_year order by fiscal_year_id DESC";
		$sl=0;
		$qgtfiscalyear=$mysqli->query($gtfiscalyear);
		while($shgtfiscalyear=$qgtfiscalyear->fetch_assoc()){
		
		$sl++;
  
  ?>
                             <tr>
    <td align="center" width="4%;"><?php echo $sl; ?></td>
    <td width="16%;" align="center"><?php echo $shgtfiscalyear['fiscal_year_name']; ?></td>
    <td width="15%;" align="center"><?php echo $shgtfiscalyear['from_date']; ?></td>
    <td width="15%;" align="center"><?php echo $shgtfiscalyear['to_date']; ?></td>
    <td width="14%;" align="center"><?php echo $shgtfiscalyear['type']; ?></td>
    <td width="14%;" align="center"><?php if ($shgtfiscalyear['status']==1){echo "Active";} else{ echo "Inactive";} ?></td>
    <td align="center" width="34%;">
        <a href="edit_fiscal_year.php?fundId=<?php  ?>">Edit</a>
        <a href="delete_fiscal_year.php?fundId=<?php  ?>">Delete</a>
        <?php if ($shgtfiscalyear['status']==0){ ?>
        <a href="active_fiscal_year.php?fundId=<?php  ?>">Active</a>
        <?php } else{ ?>
        <a href="inactive_fiscal_year.php?fundId=<?php  ?>">Inactive</a>
        <?php } ?>
    </td>
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