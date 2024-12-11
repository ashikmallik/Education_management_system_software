<?php require_once('student_top.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Pannel</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <!-- Meta tag -->
    <meta charset="utf-8">
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    
      <link rel="stylesheet" href="datCss/jquery-ui.css">
    <link rel="stylesheet" href="datCss/jquery-ui1.css">
    <link rel="stylesheet" href="datCss/style.css">
    <script src="datCss/jquery-1.12.4.js"></script>
    <script src="datCss/jquery-ui.js"></script>
    <script src="datCss/jquery-ui1.js"></script>

    
</head>
<body>


<div class="wrapper">
    <div class="side_main_menu">
 <div class="top_part_menu">
            <h3>Student   Panel</h3>
            <ul>
                <?php
               		require_once('leftmenu.php');
			   ?>         
            </ul>
        </div>
        <div class="fixed_logo">
            <a href=""><img src="../assets/images/logo.jpg" class="img-fluid"></a>
        </div>
    </div><!-- side bar end -->

    <div class="ot_main_content">
        <div class="admin_logout">
            <div class="admin_head">
                <h3> Student   Panel </h3>
                 
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->
        
        
        <script language="javascript">
	function contalt_valid()
	{
		
		if(document.frmcontent.branchId.value=="")
		{
			alert("Please Select Branch");
			document.frmcontent.branchId.focus();
			return (false);
		}
		
		if(document.frmcontent.studClass.value=="")
		{
			alert("Please Select Old Class");
			document.frmcontent.studClass.focus();
			return (false);
		}
		
		if(document.frmcontent.shiftId.value=="")
		{
			alert("Please Select Old Shift");
			document.frmcontent.shiftId.focus();
			return (false);
		}
		
		if(document.frmcontent.section.value=="")
		{
			alert("Please Select Old Section");
			document.frmcontent.section.focus();
			return (false);
		}
		
		if(document.frmcontent.stsess.value=="")
		{
			alert("Please Select Old Session");
			document.frmcontent.stsess.focus();
			return (false);
		}
		
		if(document.frmcontent.nstudClass.value=="")
		{
				alert("Please Select New Class");
			document.frmcontent.nstudClass.focus();
			return (false);
		}
		
		
				
		if(document.frmcontent.nshiftId.value=="")
		{
			alert("Please Select New Shift");
			document.frmcontent.nshiftId.focus();
			return (false);
		}
					
		if(document.frmcontent.nsection.value=="")
		{
			alert("Please Select New Section");
			document.frmcontent.nsection.focus();
			return (false);
		}
		
		if(document.frmcontent.nstsess.value=="")
		{
			alert("Please Select New Session");
			document.frmcontent.nstsess.focus();
			return (false);
		}
		

	}
	
		function callpage()
	{
	 document.frmcontent.action="promotion.php";
	 document.frmcontent.submit();
	}
	
</script> 
        
        
        

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Promotion</h2></div>
                <div class="form">
                    <center>
                    	<form name="frmcontent" action="promotion_do.php" method="post" enctype="multipart/form-data">
                        <?php
	$msg=$_GET['msg'];
	if($msg==1){echo "Manage Schooling Day Successfull";} 
	else if($msg==2){echo "Failed";} 
	else if($msg==3){echo "Successfull";} 


 ?>
                        <table style="border: 1px solid #005067;">
                          <tr>
    <td class="text_table">Select Branch *</td>
    
    <td><select name="branchId" id="branchId" onchange="callpage();">
      <option value=""> Select Branch</option>
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
      <option value="">-Old Class-</option>
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
      <option value="">-Old Shift-</option>
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
      <option value="">-Old Section-</option>
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
      <option value="">-Old Select-</option>

      <option value="2020" <?php if($_POST['stsess']==2020) { echo "selected"; } ?>> 2020 </option>
      <option value="2021" <?php if($_POST['stsess']==2021) { echo "selected"; } ?>> 2021 </option>
      <option value="2022" <?php if($_POST['stsess']==2022) { echo "selected"; } ?>> 2022 </option>
      <option value="2023" <?php if($_POST['stsess']==2023) { echo "selected"; } ?>> 2023 </option>
    </select></td>
  </tr>
  
                           <tr>
    <td class="text_table">New Class *</td>
    
    <td><select name="nstudClass" id="nstudClass" onchange="callpage();">
      <option value="">-New Class-</option>
     <?php
					$gstclass="select * from borno_school_set_class where borno_school_id='$schId' order by class_order asc";
					$qgstclass=$mysqli->query($gstclass);
					while($shgstclass=$qgstclass->fetch_assoc()){ $sl++;
				
					$getfClassId=$shgstclass['borno_school_class_id']; 
                    $gstclass1="select * from borno_school_class where borno_school_class_id='$getfClassId'";
                                        $qgstclass1=$mysqli->query($gstclass1);
                                        $shgstclass1=$qgstclass1->fetch_assoc(); 
				?>
      <option value=" <?php echo $shgstclass1['borno_school_class_id']; ?>" <?php if($shgstclass1['borno_school_class_id']==$_REQUEST['nstudClass']) { echo "selected"; }  ?>> <?php echo $shgstclass1['borno_school_class_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
  		                         <tr>
    <td class="text_table">New Shift *</td>
    
    <td><select name="nshiftId" id="nshiftId" onchange="callpage();">
      <option value="">-New Shift-</option>
    <?php
                                                $studClass=$_POST['nstudClass'];
                                                $gstshift="select * from borno_school_shift";
                                                $qggstshift=$mysqli->query($gstshift);
                                                while($shggstshift=$qggstshift->fetch_assoc()){ $sl++;
                                            
                                            ?>
     <option value=" <?php echo $shggstshift['borno_school_shift_id']; ?>" <?php if($shggstshift['borno_school_shift_id']==$_REQUEST['nshiftId']) { echo "selected"; }  ?>> <?php echo $shggstshift['borno_school_shift_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>	
  
    		                         <tr>
    <td class="text_table">New Section *</td>
    
    <td><select name="nsection" id="nsection" onchange="callpage();">
      <option value="">-New Section-</option>
    <?php
                                                
											$gtfbranchId=$_POST['branchId'];
											$shiftId=$_POST['nshiftId'];
												
												
                                                $gstsection="select * from borno_school_section where borno_school_class_id='$studClass' AND borno_school_branch_id='$gtfbranchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId'";
                                                $qgstsection=$mysqli->query($gstsection);
                                                while($shggstsection=$qgstsection->fetch_assoc()){ $sl++;
                                            
                                            ?>
     <option value=" <?php echo $shggstsection['borno_school_section_id']; ?>" <?php if($shggstsection['borno_school_section_id']==$_REQUEST['nsection']) { echo "selected"; }  ?>> <?php echo $shggstsection['borno_school_section_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>	
  
  						 <tr>
    <td class="text_table">New Session *</td>
    
    <td><select name="nstsess" id="nstsess">
      <option value="">-New Session-</option>

      <option value="2021" <?php if($_POST['nstsess']==2021) { echo "selected"; } ?>> 2021 </option>
      <option value="2022" <?php if($_POST['nstsess']==2022) { echo "selected"; } ?>> 2022 </option>
      <option value="2023" <?php if($_POST['nstsess']==2023) { echo "selected"; } ?>> 2023 </option>
      <option value="2024" <?php if($_POST['nstsess']==2024) { echo "selected"; } ?>> 2024 </option>
    </select></td>
   
  </tr>
   
                        </table>
                        
                       
                            <table width="400" border="1" style="border: 1px solid #005067;">
                
                 <tr>
               <td width="40" align="center">Roll</td>
               <td width="260">Name</td>
               <td width="100" align="center">New Roll</td> </tr>
                               
                               <tr>
                  <?php       
		    $studClass=$_POST['studClass'];
		    $shiftId=$_POST['shiftId'];
			$section=$_POST['section'];
			$stsess=$_POST['stsess'];			
							 $gtctmarg="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$gtfbranchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' order by borno_school_roll asc";
 
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){
		?>
                               
                               <tr>
               <td width="40" align="center"><?php echo $shgtctmarg['borno_school_roll']; ?>
                <input type="hidden" name="roll[]" id="roll[]" value="<?php echo $shgtctmarg['borno_school_roll']; ?>" />
                 <input type="hidden" name="stdid[]" id="stdid[]" value="<?php echo $shgtctmarg['borno_student_info_id']; ?>" />
                  <input type="hidden" name="stname[]" id="stname[]" value="<?php echo $shgtctmarg['borno_school_student_name']; ?>" />
               </td>
               <td width="260"><?php echo $shgtctmarg['borno_school_student_name']; ?></td>
               <td width="100"><input type="text" name="newroll[]" id="newroll[]" size="10"></td> </tr>
                                <?php } ?>
                               <tr>
                              
                                 <td colspan="3" align="center"><input type="submit" name="button" id="button" value="Submit" onClick="return contalt_valid()"></td>
                               </tr>
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