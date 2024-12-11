<?php require_once('bank_sett_top.php');?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>:: [Bank]::</title>
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
	 document.frmcontent.action="bank.php";
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
                <h3> Bank </h3>
                
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../../academic/assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Bank Transection</h2></div>
                <div class="form">
                    <center>
                    	<form name="frmcontent" action="bank_do.php" method="post" enctype="multipart/form-data">
                        <?php
			$msg=$_GET['msg'];
			if($msg==1) { echo "Success"; }
			else if($msg==2) { echo "Failed"; }
			else if($msg==3) { echo "Insufficient Balance"; }

 ?>
 
   <table  style="border: 1px solid #005067;">
   <tr>
                       <td width="150">Memo No *</td>
                    <td width="150"><input type="text" disabled size="23" name="memo" id="memo" value="<?php
        	$msg=$_GET['msg'];
			$memono=$_GET['memono'];
			if($msg==1) { echo $memono; }
			
					?>"></td>
              <td  colspan="2"> <a href="download_receipt2.php?memo=<?php echo $memono;?>" target="_blank">Print Memo</a></td> 
   </tr>

   </table>
    </br>
 
                        <table style="border: 1px solid #005067;">
          
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
  <tr>
    <td class="text_table">Transection Type *</td>
    
    <td>
    <select name="type" id="type" onchange="callpage();">
    <option value="">--Select--</option>
    <option value="1"<?php if($_POST['type']==1) { echo "selected"; } ?>> Deposit </option>
<option value="2"<?php if($_POST['type']==2) { echo "selected"; } ?>> Withdraw </option>
<option value="3"<?php if($_POST['type']==3) { echo "selected"; } ?>> Profit </option>
<option value="4"<?php if($_POST['type']==4) { echo "selected"; } ?>> Service Charge </option>          
                              </select>
    </td>
     </tr>
  <tr>
    <td class="text_table">Select Bank *</td>
    
    <td>
    <select name="bankname" id="bankname" onchange="callpage();">
    <option value="">--Select--</option>
               <?php
					$data1="select borno_school_bank_name from borno_school_bank where borno_school_id='$schId' group by borno_school_bank_name asc";
					$qdata1=$mysqli->query($data1);
					while($showdata1=$qdata1->fetch_assoc()){ 
				
	 ?>
     <option value=" <?php echo $showdata1['borno_school_bank_name']; ?>" <?php if($showdata1['borno_school_bank_name']== trim($_REQUEST["bankname"])) { echo "selected"; }  ?>> <?php echo $showdata1['borno_school_bank_name']; ?></option>
     <?php } ?>
                              </select>
    </td>
    <td><input placeholder="Type Bank Name" name="bankname1" type="text" id="bankname1" size="30"/></td>
  </tr>  

    <tr>
    <td class="text_table">Select A/C No*</td>
    
    <td>
    <select name="acno" id="acno" onchange="callpage();">
    <option value="">--Select--</option>
              <?php
               $bankname=trim($_REQUEST['bankname']);
			echo		$data2="select 	borno_school_bank_ac_no from borno_school_bank where borno_school_id='$schId' AND borno_school_bank_name='$bankname' group by borno_school_bank_ac_no asc";
					$qdata2=$mysqli->query($data2);
					while($showdata2=$qdata2->fetch_assoc()){ 
				
	 ?>
    <option value=" <?php echo $showdata2['borno_school_bank_ac_no']; ?>" <?php if($showdata2['borno_school_bank_ac_no']==trim($_REQUEST["acno"])) { echo "selected"; }  ?>> <?php echo $showdata2['borno_school_bank_ac_no']; ?></option>
      <?php } ?>
                              </select>
    </td>
    <td><input placeholder="Type Acount No" name="acno1" type="text" id="acno1" size="30"/></td>
  </tr>     
    
     <?php $type=$_REQUEST['type']; 
     if($type==2)
     {
     ?>
          <tr>
 <td class="text_table">Cheak No *</td>
 <td><input placeholder="Type Cheak No" name="typeno" type="text" id="typeno" size="24"/></td>
  </tr>
  <?php } elseif($type==1)
     {
     ?>
          <tr>
 <td class="text_table">Deposited By *</td>
 <td><input placeholder="Type Deposited By" name="typeno" type="text" id="typeno" size="24"/></td>
  </tr>
  <?php } elseif($type==3 OR $type==4)
     {
     ?>
          <tr>
 <td class="text_table">Remarks *</td>
 <td><input placeholder="Type Remarks" name="typeno" type="text" id="typeno" size="24"/></td>
  </tr>
  <?php } ?>
    
     <tr>
 <td class="text_table">Amount *</td>
 <td><input placeholder="Type Amount" name="amount" type="text" id="amount" size="24"/></td>
  </tr>
   <tr>
<td colspan="2" align="center"><input type="submit" name="button" id="button" value="Set" onClick="return contalt_valid()"></td>
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