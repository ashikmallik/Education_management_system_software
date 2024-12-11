<?php require_once('result_sett_top.php');
 $TechId=$_GET['TechId'];
 $period=$_GET['period'];
	$getTechid="select * from borno_school_class_routine where borno_school_routine_id='$TechId'";
    $qgetTechid=$mysqli->query($getTechid);
	$shgetTechid=$qgetTechid->fetch_assoc();

?>
<!DOCTYPE html>
<html>
<head>
    <title>:: [Class Routine Settings]::</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <!-- Meta tag -->
    <meta charset="utf-8">
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
</head>
<body>

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
                  <h2>Class Routine Edit</h2></div>
                <div class="form">
                    <center>


<script language="javascript">
function callpage()
{
	document.frmcontent.action="class_routine_edit.php?TechId=<?php echo $TechId; ?>";
	document.frmcontent.submit();
}
</script>

<script language="javascript">
	function contalt_valid()
	{
		if(document.frmcontent.branchId.value=="")
		{
			alert("Please Select Branch");
			document.frmcontent.branchId.focus();
			return (false);
		}
		if(document.frmcontent.shiftId.value=="")
		{
			alert("Please Select Shift");
			document.frmcontent.shiftId.focus();
			return (false);
		}

	if(document.frmcontent.stsess.value=="")
		{
			alert("Please Select Session");
			document.frmcontent.stsess.focus();
			return (false);
		}
	if(document.frmcontent.teacherid.value=="")
		{
			alert("Please Select Teacher");
			document.frmcontent.teacherid.focus();
			return (false);
		}
	if(document.frmcontent.dayid.value=="")
		{
			alert("Please Select Day");
			document.frmcontent.dayid.focus();
			return (false);
		}
						
	}
</script> 


<form name="frmcontent" action="edit_routine_do.php" method="post" enctype="multipart/form-data">

<table width="400" border="0" cellspacing="0" cellpadding="0" align="center" class="projectlist">

    <tr>
    <td colspan="3" align="center" style="color: #FE0000; font-size:24px">
    	<?php
        	$msg=$_GET['msg'];
			if($msg==1) { echo "Routine Set Successfully"; } else if($msg==2) { echo "Failed"; }  else if($msg==3) { echo "Already Exist"; } 
		?>
    </td>
    </tr>
  <tr>
    <td><strong>Select Branch *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><select name="branchId" id="branchId" onchange="callpage();">
      <option value=""> --Select-- </option>
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
    <td><strong>Select Shift *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><select name="shiftId" id="shiftId" onchange="callpage();">
      <option value=""> --Select-- </option>
      <?php
					
					$gstshift="select * from borno_school_shift";
					$qggstshift=$mysqli->query($gstshift);
					while($shggstshift=$qggstshift->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $shggstshift['borno_school_shift_id']; ?>" <?php if($shggstshift['borno_school_shift_id']==$_REQUEST['shiftId']) { echo "selected"; }  ?>> <?php echo $shggstshift['borno_school_shift_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
  
  <tr>
    <td><strong>Select Teacher *</strong></td>
    <td align="center"><strong>:</strong></td>
    
    <td>
      <select name="teacherid" id="teacherid"  onchange="callpage();">
      <option value=""> --Select-- </option>
		  <?php
                        $branchId=$_REQUEST['branchId'];
                        $shiftId=$_REQUEST['shiftId'];
                        $gstteacher="select * from borno_teacher_info where borno_school_id='$schId'  and borno_school_shift_id='$shiftId' AND borno_school_branch_id='$branchId'";
                        $qgstteacher=$mysqli->query($gstteacher);
                        while($shgstteacher=$qgstteacher->fetch_assoc()){ $sl++;				
         ?>
        <option value=" <?php echo $shgstteacher['borno_teacher_info_id']; ?>" <?php if($shgstteacher['borno_teacher_info_id']==$_REQUEST['teacherid']) { echo "selected"; }  ?>> <?php echo $shgstteacher['borno_teacher_name']; ?></option>
        
        <?php } ?>
        
      </select>
    </td>
  </tr>
  <tr>
  <td><strong>Session *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><select name="stsess" id="stsess" onchange="callpage();">
      <option value=""> --Select-- </option>
      <option value="2019" <?php if($_REQUEST['stsess']==2019) { echo "selected"; } ?>> 2019 </option>
      <option value="2020" <?php if($_REQUEST['stsess']==2020) { echo "selected"; } ?>> 2020 </option>
      <option value="2021" <?php if($_REQUEST['stsess']==2021) { echo "selected"; } ?>> 2021 </option>
    </select></td>
  </tr>
  
  
    
   
   
      
      <tr>
  <td><strong>Day *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td>
    <select name="dayid" id="dayid" onchange="callpage();">
      <option value=""> --Select-- </option>
      <option value="1" <?php if($_REQUEST['dayid']==1) { echo "selected"; } ?> > Saturday </option>
      <option value="2" <?php if($_REQUEST['dayid']==2) { echo "selected"; } ?>> Sunday </option>
      <option value="3" <?php if($_REQUEST['dayid']==3) { echo "selected"; } ?>> Monday </option>
      <option value="4" <?php if($_REQUEST['dayid']==4) { echo "selected"; } ?>> Tuesday </option>
      <option value="5" <?php if($_REQUEST['dayid']==5) { echo "selected"; } ?>> Wednesday </option>
      <option value="6" <?php if($_REQUEST['dayid']==6) { echo "selected"; } ?>> Thursday </option>
      <option value="7" <?php if($_REQUEST['dayid']==7) { echo "selected"; } ?>> Friday </option>      
    </select></td>
  </tr>
      
</table>

<br>
<table width="500" border="0" cellspacing="0" cellpadding="0" align="center" class="projectlist">
  <tr align="center">
    <th bgcolor="#99CC00" align="center">Period</th>
    <th bgcolor="#99CC00" align="center">Class</th>
    <th bgcolor="#99CC00" align="center">Section</th>
    <th bgcolor="#99CC00" align="center">Subject</th>
    <th bgcolor="#99CC00" align="center">Time</th>
  </tr>
  <tr>
    <td align="center" > 

    <strong>
   <select name="period" id="period" onchange="callpage();">
      <option value="First" <?php if($_REQUEST['period']==First) { echo "selected"; } ?> > First </option>
      <option value="Second" <?php if($_REQUEST['period']==Second) { echo "selected"; } ?>> Second </option>
      <option value="Third" <?php if($_REQUEST['period']==Third) { echo "selected"; } ?>> Third </option>
      <option value="Fourth" <?php if($_REQUEST['period']==Fourth) { echo "selected"; } ?>> Fourth </option>
      <option value="Fifth" <?php if($_REQUEST['period']==Fifth) { echo "selected"; } ?>> Fifth </option>
      <option value="Sixth" <?php if($_REQUEST['period']==Sixth) { echo "selected"; } ?>> Sixth </option>
      <option value="Seventh" <?php if($_REQUEST['period']==Seventh) { echo "selected"; } ?>> Seventh </option>      
    </select>
      
    </strong></td>
       
    <td align="center" >
      <select style="width:100px; height:25px;" name="studClass1" id="studClass1" onchange="callpage();">
      <option value=""> --Select-- </option>
      <?php
					$gtfbranchId=$_REQUEST['branchId'];


$gstclass="select * from borno_school_set_class where borno_school_id='$schId' and borno_school_branch_id='$gtfbranchId' order by class_order asc";
					$qgstclass=$mysqli->query($gstclass);
					while($shgstclass=$qgstclass->fetch_assoc()){ $sl++;
				
					$getfClassId=$shgstclass['borno_school_class_id']; 
                    $gstclass1="select * from borno_school_class where borno_school_class_id='$getfClassId'";
                                        $qgstclass1=$mysqli->query($gstclass1);
                                        $shgstclass1=$qgstclass1->fetch_assoc(); 

				
				?>
      <option value=" <?php echo $shgstclass1['borno_school_class_id']; ?>" <?php if($shgstclass1['borno_school_class_id']==$_REQUEST['studClass1']) { echo "selected"; }  ?>> <?php echo $shgstclass1['borno_school_class_name']; ?></option>
      <?php } ?>
    </select>
    </td>
      
    <td align="center" >
    	<select style="width:100px; height:25px;" name="studSection1" id="studSection1" onchange="callpage();">      
          <option value=""> --Select-- </option>      
        <?php
					$shiftId=$_REQUEST['shiftId'];
					$studClass1=$_REQUEST['studClass1'];
										
					$gstsection="select * from borno_school_section where borno_school_class_id='$studClass1' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId'";
					$qgstsection=$mysqli->query($gstsection);
					while($shggstsection=$qgstsection->fetch_assoc()){ $sl++;				
				?>
      <option value=" <?php echo $shggstsection['borno_school_section_id']; ?>" <?php if($shggstsection['borno_school_section_id']==$_REQUEST['studSection1']) { echo "selected"; }  ?>> <?php echo $shggstsection['borno_school_section_name']; ?></option>
      <?php } ?>      
    </select>
    </td>
   			
   
    <td align="center" >
      <select style="width:100px; height:25px;" name="sub1" id="sub1" onchange="callpage();">
      
          <option value=""> --Select-- </option>
      
        <?php
					
				     $studClass1=$_REQUEST['studClass1'];
					$stsess=$_REQUEST['stsess'];
					
					if($studClass1=='20' OR  $studClass1=='19' OR  $studClass1=='18' OR  $studClass1=='15' OR  $studClass1=='14' OR  $studClass1=='13' OR  $studClass1=='10' OR  $studClass1=='6'){					
					
					
			$gsubjNamesixeight="select * from borno_result_subject where borno_school_class_id='$studClass1' AND borno_school_session='$stsess' AND borno_school_id='$schId'";
			$qgsubjNamesixeight=$mysqli->query($gsubjNamesixeight);
			while($shgsubjNamesixeight=$qgsubjNamesixeight->fetch_assoc()){	
							
		?>
      <option value="<?php echo $shgsubjNamesixeight['borno_result_subject_id']; ?>"<?php if($shgsubjNamesixeight['borno_result_subject_id']==$_REQUEST['sub1']) { echo "selected"; } ?>> <?php echo $shgsubjNamesixeight['borno_school_subject_name']; ?></option>
      <?php 
	  	}
			}
			
			else if($studClass1=='3' OR  $studClass1=='4' OR  $studClass1=='5' ){					
					
					
			$gsubjNamesixeight="select * from borno_set_subject_six_eight where borno_school_class_id='$studClass1' AND borno_school_session='$stsess' AND borno_school_id='$schId'";
			$qgsubjNamesixeight=$mysqli->query($gsubjNamesixeight);
			while($shgsubjNamesixeight=$qgsubjNamesixeight->fetch_assoc()){
				
				$subjidsixeight=$shgsubjNamesixeight['subject_id_six_eight'];
				
				$getsubjnamesixeight="select * from borno_subject_six_eight where subject_id_six_eight='$subjidsixeight'";
				$qgetsubjnamesixeight=$mysqli->query($getsubjnamesixeight);
				$shgetsubjnamesixeight=$qgetsubjnamesixeight->fetch_assoc();
	  
	   ?>
        <option value="<?php echo $shgetsubjnamesixeight['subject_id_six_eight']; ?>"<?php if($shgetsubjnamesixeight['subject_id_six_eight']==$_REQUEST['sub1']) { echo "selected"; } ?>> <?php echo $shgetsubjnamesixeight['six_eight_subject_name']; ?></option>
        
        <?php
			}
			 }
			 
			 
	elseif($studClass1=='1' OR  $studClass1=='2' ){					
					
					
			$gsubjNamesixeight="select * from borno_subject_nine_ten   ";
			$qgsubjNamesixeight=$mysqli->query($gsubjNamesixeight);
			while($shgsubjNamesixeight=$qgsubjNamesixeight->fetch_assoc()){	
							
		?>
      <option value="<?php echo $shgsubjNamesixeight['borno_subject_nine_ten_id']; ?>"<?php if($shgsubjNamesixeight['borno_subject_nine_ten_id']==$_REQUEST['sub1']) { echo "selected"; } ?>> <?php echo $shgsubjNamesixeight['borno_subject_nine_ten_name']; ?></option>
      <?php 
	  	}
			}
			 
			 
		?>
        
      
    </select>
    </td>
    
      <td align="center" ><label for="time1"></label>
      <input name="time1" type="text" id="time1" size="10">
          <input type="hidden" name="routineid"  id="routineid" value="<?php echo $TechId; ?>">
      </td>
  </tr>
  

  <tr>
    <td colspan="6" align="center"><input type="submit" name="button" id="button" value="Update" onClick="return contalt_valid()" /></td>
    </tr>
</table>
</form>
<br>





                        <br>
                        
                  </center>
                </div>
            </div>
        </div><!-- Main Body part end -->
    </div><!-- Main Content end -->
</div>

<!--Script part-->
<script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js"></script>
</body>
</html>