<?php require_once('student_top.php');?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Student Pannel</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <!-- Meta tag -->
    
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    
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
                <h3>Student Panel</h3>
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
			alert("Please Select Class");
			document.frmcontent.studClass.focus();
			return (false);
		}
		
		if(document.frmcontent.shiftId.value=="")
		{
			alert("Please Select Shift");
			document.frmcontent.shiftId.focus();
			return (false);
		}
		
		if(document.frmcontent.section.value=="")
		{
			alert("Please Select Section");
			document.frmcontent.section.focus();
			return (false);
		}
		
		if(document.frmcontent.stsess.value=="")
		{
			alert("Please Select Session");
			document.frmcontent.stsess.focus();
			return (false);
		}
		
	if(document.frmcontent.norow.value=="")
		{
			alert("Please Write No. Row");
			document.frmcontent.norow.focus();
			return (false);
		}
		

	
	}
	
	
	function callpage()
	{
	 document.frmcontent.action="update_student_phone_number.php";
	 document.frmcontent.submit();
	}
	
	
	
</script>
        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading"><h2>Update Phone Number</h2></div>
                <div class="form">
                    <center>
                   <form name="frmcontent" id="myform" action="" method="post" enctype="multipart/form-data">
                    <?php
        	$msg=$_GET['msg'];
			if($msg==1) { echo "Student Added Successfully"; } 
			else if($msg==2) { echo "Failed"; }  
			else if($msg==3) { echo "Roll Is Already Exist Please Select Another On"; }
		?>
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
    <td class="text_table">Select Class *</td>
    
    <td>
    <select name="studClass" id="studClass" onChange="callpage();">
                                <option value="">--Select--</option>
                                <?php                                       
									    $gtfbranchId=$_REQUEST['branchId'];
										
										$getClassId="select * from borno_school_set_class where borno_school_id='$schId' AND borno_school_branch_id='$gtfbranchId'";
		
		
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
    <tr>
    <td class="text_table">Select Shift *</td>
   
    <td><select name="shiftId" id="shiftId" onchange="callpage();">
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
    <td class="text_table">Select  Section *</td>
     
    <td >
      <select name="section" id="section" onchange="callpage();">
       <option value="">--Select--</option>
      
        <?php
					$shiftId=$_REQUEST['shiftId'];
					$gstsection="select * from borno_school_section where borno_school_class_id='$studClass' AND borno_school_branch_id='$gtfbranchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId'";
					$qgstsection=$mysqli->query($gstsection);
					while($shggstsection=$qgstsection->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $shggstsection['borno_school_section_id']; ?>" <?php if($shggstsection['borno_school_section_id']==trim($_REQUEST['section'])) { echo "selected"; }  ?>> <?php echo $shggstsection['borno_school_section_name']; ?></option>
      <?php } ?>
      
      
      </select>
      
      </td>
  </tr>
  
  <?php $curyear= date("Y"); 
  $descuryear=$curyear-1;
  $inccuryear=$curyear+1;
  ?>
  
  <tr>
    <td class="text_table">Session *</td>
    <td><select name="stsess" id="stsess" onchange="callpage();">
       <option value="<?php echo $curyear; ?>" <?php if($curyear==$_REQUEST['stsess']) { echo "selected"; }  ?>> <?php echo $curyear; ?> </option>
       <option value="<?php echo $descuryear; ?>" <?php if($descuryear==$_REQUEST['stsess']) { echo "selected"; }  ?>> <?php echo $descuryear; ?> </option>
       <option value="<?php echo $inccuryear; ?>" <?php if($inccuryear==$_REQUEST['stsess']) { echo "selected"; }  ?>> <?php echo $inccuryear; ?> </option>
    </select></td>
    
    </tr>
     <tr>
        <td class="text_table">Organization Type *</td>
     <td><select name="orgType" id="orgType">
      <option value="School">School</option>
      <option value="College">College</option>
      </select></td>
      
  </tr>
  <tr>
<td colspan="4"><center><input type="submit" name="" value="Process" onClick="return contalt_valid()"></center></td>
                            </tr>
                        </table>
                        
                        
                        </form>
                        
                        
                  
                        
                        
                        </br>
     
                 
                        
    <form name="frmcontent1" id="myform" action="updating_phone_number.php" method="post" enctype="multipart/form-data">                     
         
           
         <table width="807" style="border: 1px solid #005067;">  
            <?php
           if(empty($_POST['section'])){
               $_POST['section']=null;
               
           }else{
           $sectionId=$_POST['section'];
           }
            if(empty($_POST['stsess'])){
               $_POST['stsess']=null;
               
           }else{
            $session=$_POST['stsess'];
           }
        //   echo $schId."<br>";
        //   echo $gtfbranchId."<br>";
        //   echo $studClass."<br>";
        //   echo $shiftId."<br>";
        //   echo $sectionId."<br>";
        //   echo $session."<br>";
          
           $update= mysqli_query($mysqli, "Select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$gtfbranchId' and borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' and borno_school_section_id='$sectionId' and borno_school_session ='$session' order by borno_school_roll ");    
           foreach($update as $update_data){
               
           ?>
               <tr  >  
                      
             <td width="31"  style="border:1px solid #005067; text-align:center" >Roll No *</td> 
             <td width="121"  style="border:1px solid #005067; text-align:center">Student Name*</td>
          
             <td width="110"  style="border:1px solid #005067; text-align:center">Mobile No * </td>  
 
                      </tr>   
                    
                   <tr>  
                         
       <td width="31"  style="border:1px solid #005067; text-align:center" ><?php echo $update_data['borno_school_roll']; ?></td> 
             <td width="121"  style="border:1px solid #005067; text-align:center"><?php echo $update_data['borno_school_student_name']; ?></td>
             
             <td width="110"  style="border:1px solid #005067; text-align:center"><input name="stuphone[]" type="text" id="stuphone[]" size="15" value="<?php echo $update_data['borno_school_phone']; ?>"></td>  
                
             
                      </tr>                   
               
                <tr>
<td colspan="7">
    <center>
    <input type="hidden" name="borno_student_info_id[]" id="borno_student_info_id" value="<?php echo $update_data['borno_student_info_id']; ?>" />
    <input type="hidden" name="borno_school_roll[]" id="borno_school_roll" value="<?php echo $update_data['borno_school_roll']; ?>" />
<?php } ?>
<input type="submit" name="" value="Save" onClick="return contalt_valid()">



</center></td>
                            </tr>          
                  </table>   
                 
                    </form>
                    			   
                    </center>
                </div>
            </div>
        </div><!-- Main Body part end -->
    </div><!-- Main Content end -->
</div>

<!--Script part-->

</body>
</html>