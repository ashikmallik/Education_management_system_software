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

		if(document.frmcontent.stdid.value=="")
		{
			alert("Please Write Student ID");
			document.frmcontent.stdid.focus();
			return (false);
		}
						
	}
	
	
	function callpage()
	{
	 document.frmcontent.action="std_transaction.php";
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
 
<table width="821" height="82" style="border: 1px solid #005067;">
         <?php

 $stdid=trim($_REQUEST['stdid']);
 $gtstudent="select * from borno_student_info where borno_school_id='$schId' and borno_student_info_id='$stdid'";

	$qgtstudent=$mysqli->query($gtstudent);
	$shgtstudent=$qgtstudent->fetch_assoc();	
	$classid=$shgtstudent['borno_school_class_id'];
	$shiftid=$shgtstudent['borno_school_shift_id'];
	$sectionid=$shgtstudent['borno_school_section_id'];
		 ?>

         <tr>
         
           <td class="">Student Name : </td> 
    <td >      
 <input type="text" disabled id="name" name="name" value="<?php echo $shgtstudent['borno_school_student_name']; ?>" size="24">
      </td>
          <td width="136"  >Image :</td>
  <td width="233"><img src="" width="50" height="50"></td>
  

</tr>
<tr>    
     
               <?php
 $gtclass="select * from borno_school_class where  borno_school_class_id='$classid'";

	$qgtclass=$mysqli->query($gtclass);
	$shqgtclass=$qgtclass->fetch_assoc();	

		 ?>
 
  <td width="193" class="">Class  Name : </td> 
    <td width="265" >      
 <input type="text" disabled id="classname" name="classname" value="<?php echo $shqgtclass['borno_school_class_name']; ?>" size="24">
      </td>
        <?php
 $gtshift="select * from borno_school_shift where  borno_school_shift_id='$shiftid'";

	$qgtshift=$mysqli->query($gtshift);
	$shqgtshift=$qgtshift->fetch_assoc();	

		 ?>  
  <td class="">Shift Name : </td> 
    <td >      
 <input type="text" disabled id="shiftname" name="shiftname" value="<?php echo $shqgtshift['borno_school_shift_name']; ?>" size="24">
      </td>
</tr>  

<tr>  
       
</tr> 
<tr>  
         <?php
 $gtsection="select * from borno_school_section where  borno_school_section_id='$sectionid'";

	$qgtsection=$mysqli->query($gtsection);
	$shqgtsection=$qgtsection->fetch_assoc();	

		 ?>   
  <td class="">Section Name : </td> 
    <td >      
 <input type="text" disabled id="sectionname" name="sectionname" value="<?php echo $shqgtsection['borno_school_section_name']; ?>" size="24">
      </td>
        <td class="">Session : </td> 
    <td >      
 <input type="text" disabled id="stsession" name="stsession" value="<?php echo $shgtstudent['borno_school_session']; ?>" size="24">
      </td>
</tr>    
<tr>    
  <td class="">Roll No : </td> 
    <td >      
 <input type="text" disabled id="rollno" name="rollno" value="<?php echo $shgtstudent['borno_school_roll']; ?>" size="24">
      </td>
      <td class="">Student ID : </td> 
    <td >      
 <input type="text" disabled id="studentid" name="studentid" value="<?php echo $shgtstudent['borno_student_info_id']; ?>" size="24">
      </td>
</tr>    
            
</table>
</br>
  <form name="frmcontent" id="myform"  method="post" enctype="multipart/form-data">
<table width="316" style="border: 1px solid #005067;">
                <tr>
            <td width="127" >Student ID * :</td>
    <td width="177"><input type="text" name="stdid" id="stdid"  size="8"></td>
    
                </tr>

  
  </table>
  </form> 
  <br> 
    <form name="frmcontent" id="myform" action="std_transaction_do.php" method="post" enctype="multipart/form-data">
                            <?php
			$msg=$_GET['msg'];
			if($msg==1) { echo "Success"; }
			else if($msg==2) { echo "Failed"; }
    
 ?>
 
                <?php

 $stdid1=trim($_REQUEST['stdid']);
 $gtstudent1="select * from borno_student_info where borno_school_id='$schId' and borno_student_info_id='$stdid1'";

	$qgtstudent1=$mysqli->query($gtstudent1);
	$shgtstudent1=$qgtstudent1->fetch_assoc();	

		 ?> 
          <div style="width:900px; height:auto; overflow:hidden; border:1px #000 solid; margin-top:1px;">  
        <div style="width:900px; height:auto;; margin-top:10px; overflow:hidden">
                                 
                            <table width="707" border="0" cellspacing="0" cellpadding="0" align="center">
                              <tr >
                              
                                <td style="color:#00F" width="143">Total Amount : </td>
                                <td style="color:#00F" width="71"> <div id="totalDiv"></div></td>
                                <td width="107">Memo No :</td>
    <td width="185"><input type="text" disabled  name="memo" id="memo" value="<?php
        	$msg=$_GET['msg'];
			$msg1=$_GET['msg1'];
			if($msg==1) { echo $msg1; }
			
					?>"></td>
    <td width="201"><a href="download_memo_half.php?memo=<?php echo $msg1;?>" target="_blank">Print Money Receipt</a></td>
                              </tr>
                            </table>
        
                                
                                
<?php
   $gtctmarg="select * from borno_school_balance where borno_school_id='$schId'  AND borno_student_info_id='$stdid' order by borno_school_fund_id,borno_school_sub_fund_id";  
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
          ?><div style="width:425px; float:left; margin-left:15px; margin-top:10px;">  
                                    <table width="425" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="192">
                                        <?php echo $shggfund['borno_school_fund_name']; ?> <?php echo $shggsubfund['sub_fund_name']; ?> [<span style="color:#00F"><?php echo $shgtctmarg['borno_school_fee']; ?></span>]
<input type="hidden" name="fundid[]" id="fundid[]" value="<?php echo $shgtctmarg['borno_school_fund_id']; ?>" /> 
<input type="hidden" name="subfundid[]" id="subfundid[]" value="<?php echo $shgtctmarg['borno_school_sub_fund_id']; ?>" /> 
     <input type="hidden" name="balId[]" id="balId[]" value="<?php echo $shgtctmarg['borno_school_balance_id']; ?>" />    
         <input type="hidden" name="studId" id="studId" value="<?php echo $stdid; ?>" /> 
         <input type="hidden" name="branchId" id="branchId" value="<?php echo $shgtstudent1['borno_school_branch_id']; ?>" /> 
         <input type="hidden" name="studClass" id="studClass" value="<?php echo $shgtstudent1['borno_school_class_id']; ?>" /> 
         <input type="hidden" name="shiftId" id="shiftId" value="<?php echo $shgtstudent1['borno_school_shift_id']; ?>" /> 
         <input type="hidden" name="section" id="section" value="<?php echo $shgtstudent1['borno_school_section_id']; ?>" /> 
         <input type="hidden" name="stsess" id="stsess" value="<?php echo $shgtstudent1['borno_school_session']; ?>" /> 
         <input type="hidden" name="roll" id="roll" value="<?php echo $shgtstudent1['borno_school_roll']; ?>" /> 
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
    <input type="text" name="amount[]" class="form-control prc"  id="amount[]"   value="" size="20">
    	 </div>	 
    </td>
     
  </tr>
  					</table>
                    </div>
  <?php } ?>   
           </div>
           </div>
           
         <?php //} ?>  
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