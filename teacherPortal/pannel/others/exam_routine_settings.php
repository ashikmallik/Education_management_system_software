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


<link rel="stylesheet" href="dateCss/jquery-ui.css">
 <link rel="stylesheet" href="dateCss/jquery-ui1.css">
  <link rel="stylesheet" href="dateCss/style.css">
  <script src="dateCss/jquery-1.12.4.js"></script>
  <script src="dateCss/jquery-ui.js"></script>
  <script src="dateCss/jquery-ui1.js"></script>

<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
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
	if(document.frmcontent.examtype.value=="")
		{
			alert("Please Select Exam Type");
			document.frmcontent.examtype.focus();
			return (false);
		}
		if(document.frmcontent.studClass.value=="")
		{
			alert("Please Select Class");
			document.frmcontent.studClass.focus();
			return (false);
		}
		
		if(document.frmcontent.subject.value=="")
		{
			alert("Please Select Subject");
			document.frmcontent.subject.focus();
			return (false);
		}
		

		
		if(document.frmcontent.dayid.value=="")
		{
			alert("Please Select Day");
			document.frmcontent.dayid.focus();
			return (false);
		}
	  if(document.frmcontent.datepicker.value=="")
		  {
			  alert("Please Select Date");
			  document.frmcontent.datepicker.focus();
			  return (false);
		  }
		
		if(document.frmcontent.timefrom.value=="")
		{
			alert("Please Write Time From");
			document.frmcontent.time.focus();
			return (false);
		}
	if(document.frmcontent.timeto.value=="")
		{
			alert("Please Write Time To");
			document.frmcontent.timeto.focus();
			return (false);
		}
		
			}
	
	
	function callpage()
	{
	 document.frmcontent.action="exam_routine_settings.php";
	 document.frmcontent.submit();
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
                  <h2>Exam Routine Set</h2></div>
                <div class="form">
                    <center>


<form name="frmcontent" id="myform" action="set_exam_routine_do.php" method="post" enctype="multipart/form-data">
<table width="450" border="0" cellspacing="0" cellpadding="0" class="projectlist" align="center">
  <tr>
    <td colspan="3" align="center"><h3> Set Exam Routine</h3></td>
    </tr>
  <tr>
    <td colspan="3" align="center" style="color: #FFFFFF; font-size:24px">
    	<?php
        	$msg=$_GET['msg'];
			if($msg==1) { echo "Set Exam Routine Successfully"; } else if($msg==2) { echo "Failed"; }  else if($msg==3) { echo "Already Exist Please Select Another"; }
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
    <td width="174"><strong>Select Exam Type *</strong></td>
    <td width="17" align="center"><strong>:</strong></td>
    <td width="259"><select  name="examtype" id="examtype" onchange="callpage();">
      <option value=""> --Select-- </option>
      <?php
					//$gtfbranchId=$_REQUEST['branchId'];
				$gstextype="select * from borno_result_add_term where   borno_school_id='$schId'   Group by borno_result_term_name";
					$qgstextype=$mysqli->query($gstextype);
					while($shgstextype=$qgstextype->fetch_assoc()){ $sl++;
				
				?>
      <option value="<?php echo $shgstextype['borno_result_term_name']; ?>"<?php if($shgstextype['borno_result_term_name']==$_POST['examtype']) { echo "selected"; } ?>> <?php echo $shgstextype['borno_result_term_name']; ?></option>
      <?php } ?>
      </select></td>
  </tr>
    <tr>
    <td><strong>Select Exam Year *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><select name="exyear" id="exyear">
        <option value="<?php echo date("Y");?>"> <?php echo date("Y");?> </option>
    </select></td>
  </tr>
  <tr>
    <td><strong>Select Class *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><select style="width:100px; height:25px;" name="studClass" id="studClass" onchange="callpage();">
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
      <option value=" <?php echo $shgstclass1['borno_school_class_id']; ?>" <?php if($shgstclass1['borno_school_class_id']==$_REQUEST['studClass']) { echo "selected"; }  ?>> <?php echo $shgstclass1['borno_school_class_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
   <tr>
    <td><strong>Select Subject *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><select style="width:100px; height:25px;" name="subject" id="subject" onchange="callpage();">
      
          <option value=""> --Select-- </option>
      
        <?php
					
				     $studClass=$_REQUEST['studClass'];
					$stsess=$_REQUEST['exyear'];
					
					if($studClass=='20' OR  $studClass=='19' OR  $studClass=='18' OR  $studClass=='15' OR  $studClass=='14' OR  $studClass=='13' OR  $studClass=='10' OR  $studClass=='6'){					
					
					
		$gsubjNamesixeight="select * from borno_result_subject where borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_school_id='$schId'";
			$qgsubjNamesixeight=$mysqli->query($gsubjNamesixeight);
			while($shgsubjNamesixeight=$qgsubjNamesixeight->fetch_assoc()){	
			
		?>
      <option value="<?php echo $shgsubjNamesixeight['borno_school_subject_name']; ?>"<?php if($shgsubjNamesixeight['borno_school_subject_name']==$_POST['subject']) { echo "selected"; } ?>> <?php echo $shgsubjNamesixeight['borno_school_subject_name']; ?></option>
      <?php 
	  	}
			}
			
			else if($studClass=='3' OR  $studClass=='4' OR  $studClass=='5' ){					
					
					
			$gsubjNamesixeight="select * from borno_set_subject_six_eight where borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_school_id='$schId'";
			$qgsubjNamesixeight=$mysqli->query($gsubjNamesixeight);
			while($shgsubjNamesixeight=$qgsubjNamesixeight->fetch_assoc()){
				
				$subjidsixeight=$shgsubjNamesixeight['subject_id_six_eight'];
				
				$getsubjnamesixeight="select * from borno_subject_six_eight where subject_id_six_eight='$subjidsixeight'";
				$qgetsubjnamesixeight=$mysqli->query($getsubjnamesixeight);
				$shgetsubjnamesixeight=$qgetsubjnamesixeight->fetch_assoc();
	  
	   ?>
        <option value="<?php echo $shgetsubjnamesixeight['six_eight_subject_name']; ?>"<?php if($shgetsubjnamesixeight['six_eight_subject_name']==$_POST['subject']) { echo "selected"; } ?>> <?php echo $shgetsubjnamesixeight['six_eight_subject_name']; ?></option>
        
        <?php
			}
			 }
			 
			 
	elseif($studClass=='1' OR  $studClass=='2' ){					
					
					
			$gsubjNamesixeight="select * from borno_subject_nine_ten   ";
			$qgsubjNamesixeight=$mysqli->query($gsubjNamesixeight);
			while($shgsubjNamesixeight=$qgsubjNamesixeight->fetch_assoc()){	
							
		?>
      <option value="<?php echo $shgsubjNamesixeight['borno_subject_nine_ten_name']; ?>"<?php if($shgsubjNamesixeight['borno_subject_nine_ten_name']==$_POST['subject']) { echo "selected"; } ?>> <?php echo $shgsubjNamesixeight['borno_subject_nine_ten_name']; ?></option>
      <?php 
	  	}
			}
			 
			 
		?>
        
      
    </select></td>
  </tr>


  <tr>
    <td><strong>Exam Day *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><select name="dayid" id="dayid" onchange="callpage();">
      <option value=""> --Select-- </option>
      <option value="Saturday" <?php if($_POST['dayid']==Saturday) { echo "selected"; } ?> > Saturday </option>
      <option value="Sunday" <?php if($_POST['dayid']==Sunday) { echo "selected"; } ?>> Sunday </option>
      <option value="Monday" <?php if($_POST['dayid']==Monday) { echo "selected"; } ?>> Monday </option>
      <option value="Tuesday" <?php if($_POST['dayid']==Tuesday) { echo "selected"; } ?>> Tuesday </option>
      <option value="Wednesday" <?php if($_POST['dayid']==Wednesday) { echo "selected"; } ?>> Wednesday </option>
      <option value="Thursday" <?php if($_POST['dayid']==Thursday) { echo "selected"; } ?>> Thursday </option>
      </select></td>
  </tr>
      	<?php
        
		date_default_timezone_set('Asia/Dhaka');	
		
		$cdate=date('Y-m-d');
		
		?>
    <tr>
    <td><strong>Exam Date  *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td>
      <input type="text" name="datepicker" id="datepicker" >
      </td>
  </tr>
  <tr>
    <td><strong>Time From * </strong></td>
    <td align="center"><strong>:</strong></td>
    <td><label>
      <input name="timefrom" type="text" id="timefrom" onKeyUp="checkInput(this)">
    </label></td>
  </tr>
    <tr>
    <td><strong>Time To * </strong></td>
    <td align="center"><strong>:</strong></td>
    <td><label>
      <input name="timeto" type="text" id="timeto" onKeyUp="checkInput(this)">
    </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><label>
      <input type="submit" name="Submit" value="Save" onClick="return contalt_valid()">
      <input type="hidden" name="schId" id="schId" value="<?php echo $schId; ?>" />
      </label></td>
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