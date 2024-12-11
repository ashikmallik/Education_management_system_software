<?php require_once('accounce_sett_top.php');?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>:: [Accounce  Settings]::</title>
    <link rel="stylesheet" type="text/css" href="../../academic/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../academic/assets/css/font-awesome.css">
    <!-- Meta tag -->
    
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
	 document.frmcontent.action="fees_entry.php";
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
                  <h2>Fees Entry</h2></div>
                <div class="form">
                    <center>
                    	<form name="frmcontent" action="fees_entry_do.php" method="post" enctype="multipart/form-data">
                        <?php
			$msg=$_GET['msg'];
			if($msg==1) { echo "Success"; }
			else if($msg==2) { echo "Failed"; }
            else if($msg==3) { echo "Fees Already Exist"; }
 ?>
                      <table width="411" border="1" cellspacing="0" cellpadding="0" style="text-indent:10px;">
                          <tr>
    <td width="208" height="30" >Session *</td>
    <td width="197"><select name="stsess" id="stsess" onchange="callpage();">
      <option value="">--Select--</option>

      <option value="2019" <?php if($_REQUEST['stsess']==2019) { echo "selected"; } ?>> 2019 </option>
      <option value="2020" <?php if($_REQUEST['stsess']==2020) { echo "selected"; } ?>> 2020 </option>
     
    </select></td>
  </tr>
  							
                          <tr>
    <td width="208" height="30">Select Branch *</td>
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
    <td width="208" height="30">Select Class *</td>
    
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
                                <option value=" <?php echo $shgstclass['borno_school_class_id']; ?>" <?php if($shgstclass['borno_school_class_id']==$_POST['studClass']) { echo "selected"; }  ?>> <?php echo $shgstclass['borno_school_class_name']; ?></option>
                                <?php } ?>
                              </select>
    </td>
  </tr>
                        </table>

	<div style="width:925px; height:auto; overflow:hidden; border:1px #000 solid; margin-top:20px; margin-left:5px;">

	<?php
  
	
		$gtctmarg="select * from borno_school_fund where borno_school_id='$schId' order by borno_school_fund_id ";  
		$qgtctmarg=$mysqli->query($gtctmarg);
		while($shgtctmarg=$qgtctmarg->fetch_assoc()){
			
		$gtfundId=$shgtctmarg['borno_school_fund_id'];	
		
		$gtfundName="select * from borno_school_sub_fund where borno_school_id='$schId' AND borno_school_fund_id='$gtfundId' order by borno_school_fund_id,borno_school_fund_id";		
		$qgtfundName=$mysqli->query($gtfundName);
		$shgtfundName=$qgtfundName->fetch_assoc();
		
		$getsubfId=$shgtfundName['borno_school_fund_id'];
  		if($getsubfId==""){
  
  ?>
                        <div style="width:455px; float:left; margin-left:7px; margin-top:10px;">  
                        <table width="450" border="0" cellspacing="0" cellpadding="0">
                          <tr>
    <td width="170" class="text_table">
    <?php echo $shgtctmarg['borno_school_fund_name']; ?>
      <input type="hidden" name="fundName[]" id="fundName[]" value="<?php echo $shgtctmarg['borno_school_fund_name']; ?>" />
      <input type="hidden" name="fundId[]" id="fundId[]" value="<?php echo $shgtctmarg['borno_school_fund_id']; ?>" />    
    </td>
    <td width="280">
    <input name="fundAmount[]" type="text" id="fundAmount[]" size="29">
    </td>
     
  </tr>
                        </table>
						</div>
                       
                       
                       
                            
     <?php }}  ?>    
     
     
     
      <?php 
   
   $setsubfund="select * from borno_school_sub_fund where borno_school_id='$schId' ";		
	$qsetsubfund=$mysqli->query($setsubfund);
	while($shsetsubfund=$qsetsubfund->fetch_assoc()){	 ?>
     
     <div style="width:455px; float:left; margin-left:7px; margin-top:10px;">  
                        <table width="450" border="0" cellspacing="0" cellpadding="0">
   <tr>
    <td width="170" class="text_table">
    <?php echo $shsetsubfund['sub_fund_name']; ?>
      <input type="hidden" name="fundName[]" id="fundName[]" value="<?php echo $shsetsubfund['sub_fund_name']; ?>" />
      <input type="hidden" name="fundId[]" id="fundId[]" value="<?php echo $shsetsubfund['borno_school_fund_id']; ?>" />    
    </td>
    <td width="280">
    <input name="fundAmount[]" type="text" id="fundAmount[]" size="29">
    </td>
     
  </tr>
  </table>
  </div>
  
   <?php } ?>
                    
                        
   </div>  
    
  		<table width="450" border="0" cellspacing="0" cellpadding="0" align="center">
           <tr>
              <td>&nbsp;  </td>
           </tr>
           <tr>
              <td align="center"> <input type="submit" name="button" id="button" value="SET" onClick="return contalt_valid()"> </td>
           </tr>
           
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