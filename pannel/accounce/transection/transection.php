<?php require_once('transection_sett_top.php');?>

<!DOCTYPE html>
<html>
<head>
    <title>:: [Student Transection]::</title>
    <link rel="stylesheet" type="text/css" href="../../academic/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../academic/assets/css/font-awesome.css">
    <!-- Meta tag -->
    <meta charset="utf-8">
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    
    
    <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
    	<script type="text/javascript">
    	$(document).ready(function(){
    		$(".check").change(function(){
    			if($(this).is(':checked')) {
                    $(this).closest('tr').find('.textVal').val($(this).val());
                } else {
                    $(this).closest('tr').find('.textVal').val('');
                }

                var total = 0;
                $(".textVal").each(function(i,j){
                    if(!isNaN(parseFloat($(this).val()))) {
                        total += parseFloat($(this).val());
                    }
                });
                $('#totalDiv').html(total);
    		});
    	});
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
	 document.frmcontent.action="transection.php";
	 document.frmcontent.submit();
	}	
	
		
</script>
    
    
</head>
<body>
 
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
               <h3>Student Transection</h3>
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../../academic/assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Student Transection</h2></div>
                <div class="form">
                    <center>
                    	<form name="frmcontent" action="transection_do.php" method="post" enctype="multipart/form-data">
                        <?php
			$msg=$_GET['msg'];
			if($msg==1) { echo "Success"; }
			else if($msg==2) { echo "Failed"; }
    
 ?>
       
         <table width="866" border="1" cellspacing="0" cellpadding="0" style="text-indent:10px;">
 

                <tr>
                    <td width="162">Memo No *</td>
                    <td width="264"><input type="text" disabled size="23" name="memo" id="memo" value="<?php
        	$msg=$_GET['msg'];
			$msg1=$_GET['msg1'];
			if($msg==1) { echo $msg1; }
			
					?>"></td>
              <td colspan="2"> <a href="download_memo_half.php?memo=<?php echo $msg1;?>" target="_blank">Print Money Receipt</a> </td>  
              </tr>                    
                             
                            
                            
        <tr>
    <td>Session *</td>
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
     <td width="179">Select  Shift *</td>
     
    <td width="235"><select name="shiftId" id="shiftId" onchange="callpage();">
      <option value="">--Select--</option>
      <?php
					$studClass=$_REQUEST['studClass'];
					$gstshift="select * from borno_school_shift";
					$qggstshift=$mysqli->query($gstshift);
					while($shggstshift=$qggstshift->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $shggstshift['borno_school_shift_id']; ?>" <?php if($shggstshift['borno_school_shift_id']==$_REQUEST['shiftId']) { echo "selected"; }  ?>> <?php echo $shggstshift['borno_school_shift_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>            
                       
  <tr>
    <td>Select Branch *</td>
    
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
     <td>Select Section *</td>
   
    <td><select name="section" id="section" onchange="callpage();">
      <option value="">--Select--</option>
      <?php
					$studClass=$_REQUEST['studClass'];
    		        $branchId=$_REQUEST['branchId'];
					$shiftId=$_REQUEST['shiftId'];
					$gstsection="select * from borno_school_section where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId'";
					$qgstsection=$mysqli->query($gstsection);
					while($shggstsection=$qgstsection->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $shggstsection['borno_school_section_id']; ?>" <?php if($shggstsection['borno_school_section_id']==$_REQUEST['section']) { echo "selected"; }  ?>> <?php echo $shggstsection['borno_school_section_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr> 
  

  <tr>
    <td>Select  Class *</td>
    
    <td ><select name="studClass" id="studClass" onchange="callpage();">
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
    </select></td>
    
    <td>Select Roll No.*</td>
   
    
    <td ><select name="roll" id="roll" onchange="callpage();">
      <option value="">--Select--</option>
    	  <?php
                    $stsess=trim($_REQUEST['stsess']);
        	        $studClass=$_REQUEST['studClass'];
    		        $branchId=$_REQUEST['branchId'];
					$shiftId=$_REQUEST['shiftId'];
					$section=$_REQUEST['section'];
					
					$gststdinfo="select * from borno_student_info where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND  	borno_school_section_id='$section' AND borno_school_session='$stsess' order by borno_school_roll";
					$qgststdinfo=$mysqli->query($gststdinfo);
					while($shggststdinfo=$qgststdinfo->fetch_assoc()){ $sl++;
				
				?>
    	  <option value=" <?php echo $shggststdinfo['borno_school_roll']; ?>" <?php if($shggststdinfo['borno_school_roll']==$_REQUEST['roll']) { echo "selected"; }  ?>> <?php echo $shggststdinfo['borno_school_roll']; ?></option>
    	  <?php } ?>
	  </select></td>  
  </tr>

    <tr>
                      <?php
                    $stsess=trim($_REQUEST['stsess']);
        	        $studClass=$_REQUEST['studClass'];
    		        $branchId=$_REQUEST['branchId'];
					$shiftId=$_REQUEST['shiftId'];
					$section=$_REQUEST['section'];
					$roll=$_REQUEST['roll'];
					
					if($stsess!="" and ($studClass!="") and ($branchId!="") and ($shiftId!="") and ($section!="") and ($roll!=""))
					
					
					
					{
					
					$gststdinfoname="select * from borno_student_info where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_school_roll=$roll";
					$qgststdinfoname=$mysqli->query($gststdinfoname);
			    	$shggststdinfoname=$qgststdinfoname->fetch_assoc();
					} else { echo ""; }
			    	 
?>
    <td>Student ID :</td>

				

 <td ><input type="text" disabled id="stid" name="stid" value="<?php echo $shggststdinfoname['borno_student_info_id']; ?>" size="14"></td>
    <td>Student Name :</td>
     
    <td ><input type="text" disabled id="name" name="name" value="<?php echo $shggststdinfoname['borno_school_student_name']; ?>" size="23"></td>
  </tr>
  </tr>
 </table>
                         
                         
                    <div style="width:900px; height:auto; overflow:hidden; border:1px #000 solid; margin-top:20px;">   
                       <div style="width:900px; height:auto;; margin-top:10px; overflow:hidden">
                         
                    <table width="204" border="0" cellspacing="0" cellpadding="0" align="center">
                      <tr >
                        <td style="color:#00F" width="109">Total Amount : </td>
                        <td style="color:#00F" width="95"> <div id="totalDiv"></div></td>
                      </tr>
                    </table>

                        
                        
                             <?php
         	$stsess=trim($_REQUEST['stsess']);
        	$studClass=$_REQUEST['studClass'];
    		$branchId=$_REQUEST['branchId'];
			$shiftId=$_REQUEST['shiftId'];
			$section=$_REQUEST['section'];
			$roll=$_REQUEST['roll'];
			
	   $gststdinfoid="select * from borno_student_info where borno_school_class_id='$studClass' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_school_roll='$roll'";
					$qgststdinfoid=$mysqli->query($gststdinfoid);
					$shggststdinfoid=$qgststdinfoid->fetch_assoc();
	                $studId=$shggststdinfoid['borno_student_info_id'];
	                
		$gtctmarg="select * from borno_school_balance where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND  	borno_school_class_id='$studClass'  AND borno_school_shift_id='$shiftId'  AND borno_school_section_id='$section'  AND borno_school_session='$stsess' AND borno_student_info_id='$studId' order by borno_school_fund_id,borno_school_sub_fund_id";  
		$qgtctmarg=$mysqli->query($gtctmarg);
		while($shgtctmarg=$qgtctmarg->fetch_assoc()){
		$fundid=$shgtctmarg['borno_school_fund_id'];
		$subfundid=$shgtctmarg['borno_school_sub_fund_id'];
        
		$gstfund="select * from borno_school_fund where borno_school_id='$schId' AND borno_school_fund_id='$fundid'";
					$qgstfund=$mysqli->query($gstfund);
					$shggfund=$qgstfund->fetch_assoc();

		$gstsubfund="select * from borno_school_sub_fund where borno_school_id='$schId' AND borno_school_fund_id='$fundid' AND  	borno_school_sub_fund_id='$subfundid'";
					$qgstsubfund=$mysqli->query($gstsubfund);
					$shggsubfund=$qgstsubfund->fetch_assoc();		
  ?>
                          <div style="width:425px; float:left; margin-left:15px; margin-top:10px;">  
                            <table width="425" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="192">
                                <?php echo $shggfund['borno_school_fund_name']; ?> <?php echo $shggsubfund['sub_fund_name']; ?> [<span style="color:#00F"><?php echo $shgtctmarg['borno_school_fee']; ?></span>]
<input type="hidden" name="fundid[]" id="fundid[]" value="<?php echo $shgtctmarg['borno_school_fund_id']; ?>" /> 
<input type="hidden" name="subfundid[]" id="subfundid[]" value="<?php echo $shgtctmarg['borno_school_sub_fund_id']; ?>" /> 
     <input type="hidden" name="balId[]" id="balId[]" value="<?php echo $shgtctmarg['borno_school_balance_id']; ?>" />    
         <input type="hidden" name="studId" id="studId" value="<?php echo $studId; ?>" /> 
                                </td>
                                <td width="208">
                                	<div class="form-group"> 
    <input type="text" class="textVal"  id="amount[]" name="amount[]"  size="20">
    <input type="checkbox" class="check" value="<?php echo $shgtctmarg['borno_school_fee']; ?>" />
    	 </div>	 
                                
                                </td>
                              </tr>
                            </table>
                            
                            </div> 

   <?php } ?>            
                                       
                        </div>
                       <div style="width:900px; height: auto; margin-top:5px;">        
                        <?php 
   		$gstfund1="select * from borno_school_fund where borno_school_id='$schId' AND fund_type='0' order by borno_school_fund_id asc";
					$qgstfund1=$mysqli->query($gstfund1);
					while($shggfund1=$qgstfund1->fetch_assoc()){;
   
   ?>
   					<div style="width:425px; float:left; margin-left:15px; margin-top:10px;">  
                    <table width="425" border="0" cellspacing="0" cellpadding="0">
                       <tr>
    <td width="192">
    <?php echo $shggfund1['borno_school_fund_name']; ?> 
<input type="hidden" name="fundid[]" id="fundid[]" value="<?php echo $shggfund1['borno_school_fund_id']; ?>" /> 
<input type="hidden" name="subfundid[]" id="subfundid[]" value="0" />  
         
    </td>
    <td width="221">
         <div class="form-group"> 
    <input type="text" name="amount[]" class="form-control "  id="amount[]"   value="" size="20">
    	 </div>	 
    </td>
     
  </tr>
  					</table>
                    </div>
  <?php } ?>   
           </div>             
                 	</div>	
                      <table width="204" border="0" cellspacing="0" cellpadding="0" align="center">
                       <tr>
                        <td width="109">&nbsp;  </td>
                      </tr>
                      <tr>
                        <td width="109"> <input type="submit" name="button" id="button" value="Receive" onClick="return contalt_valid()"> </td>
                      </tr>                     
                    </table>   
                 </form>  

                      
                         
                  </center>
                    
                </div>
            </div>
        </div><!-- Main Body part end -->
    </div><!-- Main Content end -->
    
    
    
</div>




                    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
                    
                    <script type="text/javascript">
                    
                    $('.form-group').on('input','.prc',function(){
                        var totalSum = 0;
                        $('.form-group .prc').each(function(){
                            var inputVal = $(this).val();
                            if($.isNumeric(inputVal)){
                                totalSum += parseFloat(inputVal);
                            }
                        });
                            $('#result').val(totalSum);
                    });
                    
                    </script>
</body>
</html>