<?php require_once('result_sett_top.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>:: [Result  Settings]::</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <!-- Meta tag -->
    <meta charset="utf-8">
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
</head>
<body>
</script>
<link rel="stylesheet" href="datCss/jquery-ui.css">
    <link rel="stylesheet" href="datCss/jquery-ui1.css">
    <link rel="stylesheet" href="datCss/style.css">
    <script src="datCss/jquery-1.12.4.js"></script>
    <script src="datCss/jquery-ui.js"></script>
    <script src="datCss/jquery-ui1.js"></script>

<script>
  $( function() {
    $( "#datepicker" ).datepicker();
	
  } );
  </script> 

<script language="javascript">
function callpage()
{
 document.frmcontent.action="set_schooling_day.php";
 document.frmcontent.submit();
}
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
<!--            <a href=""><img src="../assets/images/logo.jpg" class="img-fluid"></a>
-->        </div>
    </div><!-- side bar end -->

    <div class="ot_main_content">
        <div class="admin_logout">
            <div class="admin_head">
                <h3> Result Settings </h3>
                
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Set Schooling Day</h2></div>
                <div class="form">
                    <center>
                    	<form name="frmcontent" action="set_schooling_day_do.php" method="post" enctype="multipart/form-data">
                        <?php
	$msg=$_GET['msg'];
	if($msg==1){echo "Manage Schooling Day Successfull";} 
	else if($msg==2){echo "Failed";} 
	else if($msg==3){echo "Set Schooling Day Successfull";} 


 ?>
                        <table style="border: 1px solid #005067;">
                          <tr>
    <td class="text_table">Select Branch *</td>
    
    <td><select name="branchId" id="branchId" onchange="callpage();">
      <option value=""> Select Class</option>
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
    <td class="text_table">Select Class *</td>
    
    <td><select name="studClass" id="studClass" onchange="callpage();">
      <option value=""> Select Class</option>
     <?php
					$gstclass="select * from borno_school_set_class where borno_school_id='$schId' order by class_order asc";
					$qgstclass=$mysqli->query($gstclass);
					while($shgstclass=$qgstclass->fetch_assoc()){ $sl++;
				
					$getfClassId=$shgstclass['borno_school_class_id']; 
                    $gstclass1="select * from borno_school_class where borno_school_class_id='$getfClassId'";
                                        $qgstclass1=$mysqli->query($gstclass1);
                                        $shgstclass1=$qgstclass1->fetch_assoc(); 
				?>
      <option value=" <?php echo $shgstclass1['borno_school_class_id']; ?>" <?php if($shgstclass1['borno_school_class_id']==$_REQUEST['studClass']) { echo "selected"; }  ?>> <?php echo $shgstclass1['borno_school_class_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
  		                         <tr>
    <td class="text_table">Select Shift *</td>
    
    <td><select name="shiftId" id="shiftId" onchange="callpage();">
      <option value=""> Select Class</option>
    <?php
                                                $studClass=$_POST['studClass'];
                                                $gstshift="select * from borno_school_shift";
                                                $qggstshift=$mysqli->query($gstshift);
                                                while($shggstshift=$qggstshift->fetch_assoc()){ $sl++;
                                            
                                            ?>
     <option value=" <?php echo $shggstshift['borno_school_shift_id']; ?>" <?php if($shggstshift['borno_school_shift_id']==$_REQUEST['shiftId']) { echo "selected"; }  ?>> <?php echo $shggstshift['borno_school_shift_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>	
  
    		                         <tr>
    <td class="text_table">Select Section *</td>
    
    <td><select name="section" id="section" onchange="callpage();">
      <option value=""> Select Class</option>
    <?php
                                                
											$gtfbranchId=$_POST['branchId'];
											$shiftId=$_POST['shiftId'];
												
												
                                                $gstsection="select * from borno_school_section where borno_school_class_id='$studClass' AND borno_school_branch_id='$gtfbranchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId'";
                                                $qgstsection=$mysqli->query($gstsection);
                                                while($shggstsection=$qgstsection->fetch_assoc()){ $sl++;
                                            
                                            ?>
     <option value=" <?php echo $shggstsection['borno_school_section_id']; ?>" <?php if($shggstsection['borno_school_section_id']==$_REQUEST['section']) { echo "selected"; }  ?>> <?php echo $shggstsection['borno_school_section_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>	
            			 <tr>
    <td class="text_table">Session *</td>
    <td><select name="stsess" id="stsess" onchange="callpage();">
      <option value=""> Select</option>
      <option value="2018" <?php if($_POST['stsess']==2018) { echo "selected"; } ?>> 2018 </option>
      <option value="2019" <?php if($_POST['stsess']==2019) { echo "selected"; } ?>> 2019 </option>
      <option value="2020" <?php if($_POST['stsess']==2020) { echo "selected"; } ?>> 2020 </option>
    </select></td>
  </tr>
  						 <tr>
    <td class="text_table">Select Term *</td>
    
    <td><select name="term" id="term" onchange="callpage();">
      <option value=""> Select Term</option>
 <?php
 					$studClass=$_REQUEST['studClass'];
 					$stsess=$_REQUEST['stsess'];
					$gstterm="select * from borno_result_add_term where borno_school_id='$schId'  AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' order by borno_result_term_id asc";
					$qgstterm=$mysqli->query($gstterm);
					while($shqgstterm=$qgstterm->fetch_assoc()){ $sl++;
				
					
				?>
<option value=" <?php echo $shqgstterm['borno_result_term_id']; ?>" <?php if($shqgstterm['borno_result_term_id']==$_REQUEST['term']) { echo "selected"; }  ?>> <?php echo $shqgstterm['borno_result_term_name']; ?></option>
      <?php } ?>
    </select></td>
   
  </tr>
                        </table>
                        
                         <br>
                            <table width="400" style="border: 1px solid #005067;">
                       
                             
                               <tr>
                                 <td width="131" class="text_table">Teacher Name</td>
                                 <td width="257" colspan="14" align="center">
                                 <input type="text" name="teacher" id="teacher" size="40"></td>
                               </tr>
                               <tr>
                                 <td class="text_table">Schooling Day</td>
                                 <td colspan="14" align="center">
                                 <input type="text" name="schooling" id="schooling" size="40"></td>
                               </tr>
                               <tr>
                                 <td class="text_table">Publish Date</td>
                                 <td colspan="14" align="center">
                                 <input type="text" name="datepicker" id="datepicker" size="40"></td>
                               </tr>
                               <tr>
                                 <td colspan="15" align="center"><input type="submit" name="button" id="button" value="Submit"></td>
                              </tr>
                            </table>
                        
                        
                        </form>
                        <br>
                        
                  </center>
                </div>
            </div>
        </div><!-- Main Body part end -->
    </div><!-- Main Content end -->
</div>

<!--Script part-->

</body>
</html>