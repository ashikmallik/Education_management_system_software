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
	 document.frmcontent.action="increase_fees.php";
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
                <h3> Accounce Settings </h3>
                
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../../academic/assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Increase Fees</h2></div>
                <div class="form">
                    <center>
                    	<form name="frmcontent" action="increase_fees_do.php" method="post" enctype="multipart/form-data">
                        <?php
			$msg=$_GET['msg'];
			if($msg==1) { echo "Success"; }
			else if($msg==2) { echo "Failed"; }
            else if($msg==3) { echo "Fees Already Exist"; }
 ?>
                          <table width="411" border="1" cellspacing="0" cellpadding="0" style="text-indent:10px;">
 

                            <tr>
                        <td height="30" >Session *</td>
                        <td><select name="stsess" id="stsess" onchange="callpage();">
                          <option value="">--Select--</option>
                          <?php
                                        $data1="select * from borno_student_info where borno_school_id='$schId' group by borno_school_session asc";
                                        $qdata1=$mysqli->query($data1);
                                        while($showdata1=$qdata1->fetch_assoc()){ $sl++;
                                    
                                    ?>
                          <option value=" <?php echo $showdata1['borno_school_session']; ?>" <?php if($showdata1['borno_school_session']==$_REQUEST['stsess']) { echo "selected"; }  ?>> <?php echo $showdata1['borno_school_session']; ?></option>
                          <?php } ?>
                        </select></td>
                      </tr>                    
                            <tr>
                        <td height="30" >Select Branch *</td>
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
                            <tr>
                        <td height="30" >Select Class *</td>
                        
                        <td>
                        <select name="studClass" id="studClass" onchange="callpage();">
                        <option value="">--Select--</option>
                            <?php                                       
                                                            $gtfbranchId=$_REQUEST['branchId'];
                                                            
                                                            $getClassId="select * from borno_school_set_class where borno_school_id='$schId' AND borno_school_branch_id='$gtfbranchId' order by class_order";
                            
                            
                            $qgetClassId=$mysqli->query($getClassId);
                            while($shgetClassId=$qgetClassId->fetch_assoc()){
                                    
                            $getfClassId=$shgetClassId['borno_school_class_id']; 
                            $gstclass="select * from borno_school_class where borno_school_class_id='$getfClassId'";
                                                            $qgstclass=$mysqli->query($gstclass);
                                                            $shgstclass=$qgstclass->fetch_assoc(); 
                                                        
                                                        ?>
                                                    <option value=" <?php echo $shgstclass['borno_school_class_id']; ?>" <?php if($shgstclass['borno_school_class_id']==$_REQUEST['studClass']) { echo "selected"; }  ?>> <?php echo $shgstclass['borno_school_class_name']; ?></option>
                                                    <?php } ?>
                                                  </select>
                        </td>
                      </tr>  
  						</table>
                  
      <?php
         	$stsess=$_REQUEST['stsess'];
        	$studClass=$_REQUEST['studClass'];
    		$branchId=$_REQUEST['branchId'];
			
			if($studClass!=""){
	  ?>
      <div style="width:925px; height:auto; overflow:hidden; border:1px #000 solid; margin-top:20px; margin-left:5px;">
      <?php
		$gtctmarg="select * from borno_school_fees where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND  	borno_school_class_id='$studClass' AND borno_school_session='$stsess'  order by borno_school_fund_id,borno_school_sub_fund_id ";  
		$qgtctmarg=$mysqli->query($gtctmarg);
		while($shgtctmarg=$qgtctmarg->fetch_assoc()){
			
		
  ?>
    <div style="width:455px; float:left; margin-left:7px; margin-top:10px;">  
      <table width="450" border="0" cellspacing="0" cellpadding="0">  
        <tr>
        <td width="170" class="text_table">
  <?php echo $shgtctmarg['borno_school_fund_name']; ?>[<span style="color:#00F"><?php echo $shgtctmarg['borno_school_fee']; ?></span>]
          <input type="hidden" name="fundName[]" id="fundName[]" value="<?php echo $shgtctmarg['borno_school_fund_name']; ?>" />
          <input type="hidden" name="fundId[]" id="fundId[]" value="<?php echo $shgtctmarg['borno_school_fund_id']; ?>" />
        <input type="hidden" name="subfundId[]" id="subfundId[]" value="<?php echo $shgtctmarg['borno_school_sub_fund_id']; ?>" />  
        <input type="hidden" name="feesId[]" id="feesId[]" value="<?php echo $shgtctmarg['borno_school_fees_id']; ?>" />      
        </td>
        <td width="280">
        <input name="fundAmount[]" type="text" id="fundAmount[]" size="29">
        </td>
         
      </tr>
      </table>
   </div>
   <?php } ?>
   </div>
   	
      <?php } ?>	
    	
   <table style="border: 0px solid #005067;">    
   <tr>
    <td align="center"><input type="submit" name="button" id="button" value="SET" onClick="return contalt_valid()"></td>
  </tr>
  </table>
      
                        </table>
                         </form>   
                  </center>
                </div>
            </div>
        </div><!-- Main Body part end -->
    </div><!-- Main Content end -->
</div>


</body>
</html>