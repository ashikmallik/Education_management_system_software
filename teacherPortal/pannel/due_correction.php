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
                <h3> Fees Report </h3>
                
            </div>
            <div class="log_out">
                <a href="logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body" style="margin-top:5px; margin-left:5px;">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Due List</h2></div>
                <div class="form">
                    <center>
        <form name="frmcontent" action="due_correction_do.php" method="post" enctype="multipart/form-data">
                        
        <table style="border:1px #000 solid; margin-top:-35px;">
   <tr>
    <td class="text_table">Select Branch *</td>
    <td><select name="branchId" id="branchId" onchange="callpage();">
      <option value="">--Select--</option>
      <?php
					$data="select * from borno_school_branch where borno_school_id='$schId'";
					$qdata=$mysqli->query($data);
					while($showdata=$qdata->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $showdata['borno_school_branch_id']; ?>" <?php if($showdata['borno_school_branch_id']==$_REQUEST['branchId']) { echo "selected"; }  ?>> <?php echo $showdata['borno_school_branch_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>            
            <tr style="background-color: #75cbd6;">
    <td class="text_table">Class*:</td>
    <td >
        <select name="studClass" id="studClass" onchange="callpage();">
    <option value="">--Select--</option>
        <?php  
        
           $gtfbranchId=$_POST['branchId'];
           $getClassId="select * from borno_school_set_class where borno_school_id='$schId' AND borno_school_branch_id='$gtfbranchId' order by class_order ";
		
		
		$qgetClassId=$mysqli->query($getClassId);
		while($shgetClassId=$qgetClassId->fetch_assoc()){
				
		$getfClassId=$shgetClassId['borno_school_class_id']; 
        $gstclass="select * from borno_school_class where borno_school_class_id='$getfClassId'";
                                        $qgstclass=$mysqli->query($gstclass);
                                        $shgstclass=$qgstclass->fetch_assoc(); 
                                    
                                    ?>
                                <option value=" <?php echo $shgstclass['borno_school_class_id']; ?>" <?php if($shgstclass['borno_school_class_id']==$_POST['studClass']) { echo "selected"; }  ?>> <?php echo $shgstclass['borno_school_class_name']; ?></option>
                                <?php } ?>
                              </select>
  </tr> 
  <tr style="background-color: #75cbd6;">
    <td class="text_table">Fiscal Year*:</td>
    <td ><select name="fiscalid" id="fiscalid" onchange="callpage();">
      <option value="">--Select--</option>
      <?php
                    $gtfiscalyear="select * from fiscal_year order by fiscal_year_id DESC";
                    		$sl=0;
                    		$qgtfiscalyear=$mysqli->query($gtfiscalyear);
                    		while($shgtfiscalyear=$qgtfiscalyear->fetch_assoc()){$sl++;
				
				?>
      <option value=" <?php echo $shgtfiscalyear['fiscal_year_id']; ?>" <?php if($shgtfiscalyear['fiscal_year_id']==($_REQUEST['fiscalid'])) { echo "selected"; }  ?>> <?php   echo $shgtfiscalyear['fiscal_year_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
  
    <tr style="background-color: #75cbd6;">
    <td class="text_table">Month*:</td>
    <td ><select name="monthid" id="monthid" onchange="callpage();">
      <option value="">--Select--</option>
      <?php
      $fiscalid=$_REQUEST['fiscalid'];
                    $gtfiscalmonth="select * from fiscal_year_details WHERE fiscal_year_id = '$fiscalid'";
                    		$sl=0;
                    		$qgtfiscalmonth=$mysqli->query($gtfiscalmonth);
                    		while($shgtfiscalmonth=$qgtfiscalmonth->fetch_assoc()){$sl++;
				
				?>
      <option value=" <?php echo $shgtfiscalmonth['month']; ?>" <?php if($shgtfiscalmonth['month']==($_REQUEST['monthid'])) { echo "selected"; }  ?>> <?php   echo $shgtfiscalmonth['month_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>

       </form>   
                        </table>
                        <br>
                            <table width="800" border="1" style="border: 1px solid #005067;">
                              <tr style="background-color: #005067; color: #fff;">
                                <td align="center">Student ID</td>
                               <td align="center">Student Name</td>
                               <td align="center">Due Amount</td>
                                <!--<td align="center">Action</td>-->
                              </tr>
                                <?php
                                
                                    
         	$fiscalid=$_REQUEST['fiscalid'];
        	$studClass=$_REQUEST['studClass'];
        	$monthid=$_REQUEST['monthid'];
			$gtfiscalyear="select * from fiscal_year_details WHERE fiscal_year_id = '$fiscalid' AND `month` ='$monthid' ";
			$qgtfiscalyear=$mysqli->query($gtfiscalyear);
			$shqgtfiscalyear=$qgtfiscalyear->fetch_assoc();
			$year = $shqgtfiscalyear['year'];
			$yeardetails = $shqgtfiscalyear['fiscal_year_details_id'];
			if($studClass!=""){
	  
  		$gtduelist="SELECT `student_id`,`borno_school_student_name`,`due_amount` FROM `student_fees` AS sf 
                     INNER JOIN borno_student_info AS si ON si.borno_student_info_id = sf.`student_id`
                     WHERE `fiscal_year_details_id` <= '$yeardetails' AND `fiscal_year_id`='$fiscalid' AND `borno_school_class_id` = '$studClass' AND borno_school_branch_id='$gtfbranchId'   AND `due_amount` != 0 AND `fees_head_id` = 4
                     GROUP BY `student_id`";
		$sl=0;
		$qgtduelist=$mysqli->query($gtduelist);
		while($shgtduelist=$qgtduelist->fetch_assoc()){
		
		$sl++;
  
  ?>
<tr>
    <td width="16%;" align="center"><?php echo $shgtduelist['student_id']; ?>
    <input type="hidden" name="studId[]" id="studId[]" value="<?php echo $shgtduelist['student_id']; ?>" /></td>
    <td width="24%;" align="center"><?php echo $shgtduelist['borno_school_student_name']; ?></td>
    <td width="12%;" align="center"><input name="prevDue[]" type="text" id="prevDue[]" size="2" tabindex=<?php echo $sl; ?> value="<?php echo $shgtduelist['due_amount']; ?>"></td>
    <!--<td align="center" width="10%;">-->
        <!--<a href="due_details.php?studentId=<?php echo $shgtduelist['student_id'];?>&yeardetails= <?php echo $yeardetails;?>&yearid=<?php echo $fiscalid;?>">Details</a>-->
    <!--</td>-->
  </tr>
                              
      
  <?php }} ?>    
  
  <tr>
    <td colspan="8" align="center"><input type="submit" name="button" id="button" value="Update"></td>
</tr>
                            </table>

                      
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