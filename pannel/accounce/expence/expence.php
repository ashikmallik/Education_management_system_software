<?php require_once('expence_sett_top.php');?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>:: [Expence]::</title>
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
	 document.frmcontent.action="expence.php";
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
                <h3> Expence </h3>
                
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../../academic/assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Expence Entry</h2></div>
                <div class="form">
                    <center>
                    	<form name="frmcontent" action="expence_do.php" method="post" enctype="multipart/form-data">
                        <?php
			$msg=$_GET['msg'];
			if($msg==1) { echo "Success"; }
			else if($msg==2) { echo "Failed"; }

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
    <td class="text_table">Month Name *</td>
    <td><select name="month" id="month" onchange="callpage();">
      <option value="">--Select--</option>
<option value="January"<?php if($_POST['month']=='January') { echo "selected"; } ?>> January </option>
<option value="February"<?php if($_POST['month']=='February') { echo "selected"; } ?>> February </option>
<option value="March"<?php if($_POST['month']=='March') { echo "selected"; } ?>> March </option>
<option value="April"<?php if($_POST['month']=='April') { echo "selected"; } ?>> April </option>
<option value="May"<?php if($_POST['month']=='May') { echo "selected"; } ?>> May </option>
<option value="June"<?php if($_POST['month']=='June') { echo "selected"; } ?>> June </option>
<option value="July"<?php if($_POST['month']=='July') { echo "selected"; } ?>> July </option>
<option value="August"<?php if($_POST['month']=='August') { echo "selected"; } ?>> August </option>
<option value="September"<?php if($_POST['month']=='September') { echo "selected"; } ?>> September </option>
<option value="October"<?php if($_POST['month']=='October') { echo "selected"; } ?>> October </option>
<option value="November"<?php if($_POST['month']=='November') { echo "selected"; } ?>> November </option>
<option value="December"<?php if($_POST['month']=='December') { echo "selected"; } ?>> December </option>
    </select></td>
  </tr>                    
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
    <td class="text_table">Expence Head *</td>
    
    <td>
    <select name="exhead" id="exhead">
    <option value="">--Select--</option>
               <?php
					$data1="select borno_school_exhead from borno_school_expence where borno_school_id='$schId' group by borno_school_exhead asc";
					$qdata1=$mysqli->query($data1);
					while($showdata1=$qdata1->fetch_assoc()){ 
				
	 ?>
     <option value=" <?php echo $showdata1['borno_school_exhead']; ?>" <?php if($showdata1['borno_school_exhead']== trim($_REQUEST["exhead"])) { echo "selected"; }  ?>> <?php echo $showdata1['borno_school_exhead']; ?></option>
     <?php } ?>
                              </select>
    </td>
    <td><input placeholder="Type Expence Head" name="exhead1" type="text" id="exhead1" size="30"/></td>
  </tr>                      
    <tr>
    <td class="text_table">Expence Name *</td>
    
    <td>
    <select name="exname" id="exname">
    <option value="">--Select--</option>
              <?php
					$data2="select borno_school_exname from borno_school_expence where borno_school_id='$schId' group by borno_school_exname asc";
					$qdata2=$mysqli->query($data2);
					while($showdata2=$qdata2->fetch_assoc()){ 
				
	 ?>
    <option value=" <?php echo $showdata2['borno_school_exname']; ?>" <?php if($showdata2['borno_school_exname']==trim($_POST["exname"])) { echo "selected"; }  ?>> <?php echo $showdata2['borno_school_exname']; ?></option>
      <?php } ?>
                              </select>
    </td>
    <td><input placeholder="Type Expence Name" name="exname1" type="text" id="exname1" size="30"/></td>
  </tr>     
    <tr>
    <td class="text_table">Expence By *</td>
    
    <td>
    <select name="exby" id="exby">
    <option value="">--Select--</option>
              <?php
					$data3="select borno_school_exby from borno_school_expence where borno_school_id='$schId' group by borno_school_exby ";
					$qdata3=$mysqli->query($data3);
					while($showdata3=$qdata3->fetch_assoc()){ 
				
	 ?>
    <option value=" <?php echo $showdata3['borno_school_exby']; ?>" <?php if($showdata3['borno_school_exby']==trim($_POST["exby"])) { echo "selected"; }  ?>> <?php echo $showdata3['borno_school_exby']; ?></option>
      <?php } ?>
                              </select>
    </td>
    <td><input placeholder="Type Expence By" name="exby1" type="text" id="exby1" size="30"/></td>
  </tr>  
     <tr>
 <td class="text_table">Amount *</td>
 <td><input type="text" placeholder="Type Amount" name="amount" id="amount" size="24"/></td>
  </tr>
   <tr>
<td colspan="2" align="center"><input type="submit" name="button" id="button" value="Expence" onClick="return contalt_valid()"></td>
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