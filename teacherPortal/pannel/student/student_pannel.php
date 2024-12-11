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
		
		if(document.frmcontent.stuName.value=="")
		{
			alert("Please Enter Student Name");
			document.frmcontent.stuName.focus();
			return (false);
		}
		
		
				
		if(document.frmcontent.stuphone.value=="")
		{
			alert("Please Enter Phone for SMS");
			document.frmcontent.stuphone.focus();
			return (false);
		}
					
		if(document.frmcontent.orgType.value=="")
		{
			alert("Please Select Organization");
			document.frmcontent.orgType.focus();
			return (false);
		}
		
		if(document.frmcontent.status.value=="")
		{
			alert("Please Select Status");
			document.frmcontent.status.focus();
			return (false);
		}
		
		if(document.frmcontent.sturoll.value=="")
		{
			alert("Please Enter Student Roll");
			document.frmcontent.sturoll.focus();
			return (false);
		}
	}
	
	
	function callpage()
	{
	 document.frmcontent.action="student_pannel.php";
	 document.frmcontent.submit();
	}
	
	
	
</script>
       <div class="ot_main_body" style="margin-top:2px; margin-left:2px;">
            <div class="ot_body_fixed">
                <div class="default_heading"><h2>Add Student</h2></div>
                <div class="form">
                    <center>
                   <form name="frmcontent" id="myform" action="student_do.php" method="post" enctype="multipart/form-data">
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
      <option value=""> Select Branch </option>
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
                                <option value=""> Select </option>
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
      <option value=""> Select Shift</option>
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
      <select name="section" id="section">
       <option value=""> Select Section</option>
      
        <?php
					$shiftId=$_REQUEST['shiftId'];
					$gstsection="select * from borno_school_section where borno_school_class_id='$studClass' AND borno_school_branch_id='$gtfbranchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId'";
					$qgstsection=$mysqli->query($gstsection);
					while($shggstsection=$qgstsection->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $shggstsection['borno_school_section_id']; ?>" <?php if($shggstsection['borno_school_section_id']==$_REQUEST['section']) { echo "selected"; }  ?>> <?php echo $shggstsection['borno_school_section_name']; ?></option>
      <?php } ?>
      
      
      </select>
      
      </td>
  </tr>
  
  
  <!--<tr>-->
  <!--  <td class="text_table">Session *</td>-->
  <!--  <td><select name="stsess" id="stsess">-->
  <!--    <option value="2020"> 2022 </option>-->
  <!--    <option value="2019"> 2021 </option>-->
  <!--    <option value="2020"> 2020 </option>-->
  <!--    <option value="2019"> 2019 </option>-->
      
  <!--    </select></td>-->
  
   <?php $curyear= date("Y"); 
  $descuryear=$curyear-1;
  $inccuryear=$curyear+1;
  ?>
  
  <tr>
    <td class="text_table">Session *</td>
    <td><select name="stsess" id="stsess" onchange="callpage();">
        <option value=""> Select Session</option>
        <option value="2020" <?php if("2020"==$_REQUEST['stsess']) { echo "selected"; }  ?>> 2020 </option>
    <option value="<?php echo $descuryear; ?>" <?php if($descuryear==$_REQUEST['stsess']) { echo "selected"; }  ?>> <?php echo $descuryear; ?> </option>
       <option value="<?php echo $curyear; ?>" <?php if($curyear==$_REQUEST['stsess']) { echo "selected"; }  ?>> <?php echo $curyear; ?> </option>
       <option value="<?php echo $inccuryear; ?>" <?php if($inccuryear==$_REQUEST['stsess']) { echo "selected"; }  ?>> <?php echo $inccuryear; ?> </option>
    </select></td>
      <td class="text_table">Student Name *</td>
      <td><input type="text" name="stuName" id="stuName"></td>
  </tr>
  <tr>
                    
                    <td class="text_table">Father's Name</td>
                    <td><input type="text" name="stuFname" id="stuFname"></td>
                     <td class="text_table">Mother's Name</td>
                     <td><input type="text" name="stuMname" id="stuMname"></td>
                  </tr>
                   <tr>
                                    <td class="text_table">Gender</td>
                                    <td>  <select name="gender" id="gender" style="color: white;">
                                        <option value="">--Select--</option>
                                        <option value="Female"> Female </option>
                                        <option value="Male"> Male </option>
                                      </select></td>

                                <td class="text_table">Phone * (For SMS)</td>
                                <td><input type="text" name="stuphone" id="stuphone"></td>
                            </tr>
                             <tr>
                               
                                 <td class="text_table">Blood Group</td>
   
    <td>
      <select name="blgroup" id="blgroup">
        	<option value="">Select Blood Group</option>
            <option value="O +"> O + </option>
            <option value="O -"> O - </option>
            <option value="A +"> A + </option>
            <option value="A -"> A - </option>
            <option value="B +"> B + </option>
            <option value="B -"> B - </option>
            <option value="AB +"> AB + </option>
            <option value="AB -"> AB - </option>
      </select>
    </td>
    	<?php
        
		date_default_timezone_set('Asia/Dhaka');	
		
		$cdate=date('d-m-Y');
		
		?>
    <td class="text_table">Date of birth</td>
     <td>
    	<input type="text" id="datepicker" name="datepicker" value="<?php echo $cdate; ?>"/>
    </td>
                            </tr>
                            <tr>
    
    <td class="text_table">Religion</td>
    <td>  <select name="religion" id="religion">
        <option value=""> Select Religion</option>
        <option value="Islam"> Islam </option>
        <option value="Hindu"> Hindu </option>
        <option value="Christian"> Christian </option>
        <option value="Buddhist"> Buddhist </option>
        <option value="Other"> Other </option>
      </select></td>
      <td class="text_table">Status *</td>
    <td><select name="status" id="status">
      
      <option value="Regular"> Regular </option>
      <option value="Irregular"> Irregular </option>
      <option value="Pass"> Pass </option>
      <option value="TC"> TC </option>
      
    </select></td>
  </tr>
   <tr>
    
      <td class="text_table">Student ID *</td>
    <td><input type="text" name="stuid" id="stuid"></td>
        <td class="text_table">Group </td>
    <td><select name="group" id="group">
      
      <option value=""> None </option>
      <option value="1"> Science </option>
      <option value="2"> Business Studies </option>
      <option value="3"> Humanities </option>
      <option value="4"> General </option>
      
      </select></td>
      
  </tr>
  
  <tr>
  
      <td class="text_table">Roll No *</td>
                                <td><input type="text" name="sturoll" id="sturoll"></td>
                                 <td class="text_table">Images</td>
		            <td><label for="timg"></label>
	                <input type="file" name="timg" id="timg"></td>
  </tr>
  <tr>
         <td class="text_table">Address</td>
        <td><input type="text" name="stuaddress" id="stuaddress"></td>
  </tr>
                              
                            
                            <tr>
                                <td colspan="4"><center><input type="submit" name="" value="Save" onClick="return contalt_valid()"></center></td>
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