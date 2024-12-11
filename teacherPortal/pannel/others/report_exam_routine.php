<?php require_once('result_sett_top.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>:: [Others Info]::</title>
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
            <a href=""><img src="../assets/images/logo.jpg" class="img-fluid"></a>
        </div>
    </div><!-- side bar end -->

    <div class="ot_main_content">
        <div class="admin_logout">
            <div class="admin_head">
                <h3> Others Info </h3>
                
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2> Report Exam Routine</h2></div>
                <div class="form">
                    <center>


<script language="javascript">
	
	
	function callpage()
	{
	 document.frmcontent.action="report_exam_routine.php";
	 document.frmcontent.submit();
	}
	
	
	
</script>

<form name="frmcontent" id="myform" action="school_index.php?action=report_examroutine_class" method="post" enctype="multipart/form-data">
<table width="450" border="0" cellspacing="0" cellpadding="0" align="center" class="projectlist">
  <tr>
    <td colspan="3" align="center"><h3> Exam Routine Report </h3></td>
    </tr>
  
  
    <tr>
    <td width="174"><strong>Select Branch</strong></td>
    <td width="17" align="center"><strong>:</strong></td>
    <td width="259"><select name="branchId" id="branchId" onchange="callpage();">
      <option value=""> --Select-- </option>
      <?php
					$data="select * from borno_school_branch where borno_school_id='$schId'";
					$qdata=$mysqli->query($data);
					while($showdata=$qdata->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $showdata['borno_school_branch_id']; ?>" <?php if($showdata['borno_school_branch_id']==$_POST['branchId']) { echo "selected"; }  ?>> <?php echo $showdata['borno_school_branch_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
  
  <tr>
    <td width="174"><strong>Select Exam Type</strong></td>
    <td width="17" align="center"><strong>:</strong></td>
    <td width="259"><select  name="examtype" id="examtype" onchange="callpage();">
      <option value=""> --Select-- </option>
      <?php

		$gstextype="select * from borno_school_exam_routine where   borno_school_id='$schId'   Group by borno_exam_term_name";
					$qgstextype=$mysqli->query($gstextype);
					while($shgstextype=$qgstextype->fetch_assoc()){ $sl++;
				
				?>
      <option value="<?php echo $shgstextype['borno_exam_term_name']; ?>"<?php if($shgstextype['borno_exam_term_name']==$_POST['examtype']) { echo "selected"; } ?>> <?php echo $shgstextype['borno_exam_term_name']; ?></option>
      <?php } ?>
      </select></td>
  </tr>
    <tr>
    <td width="174"><strong>Select Exam Year</strong></td>
    <td width="17" align="center"><strong>:</strong></td>
    <td width="259"><select  name="examyear" id="examyear" onchange="callpage();">
      <option value=""> --Select-- </option>
      <?php
			$gtexamtype=$_REQUEST['examtype'];
		$gstexyear="select * from borno_school_exam_routine where   borno_school_id='$schId' AND borno_exam_term_name='$gtexamtype'   Group by borno_exam_term_year";
					$qgstexyear=$mysqli->query($gstexyear);
					while($shgstexyear=$qgstexyear->fetch_assoc()){ $sl++;
				
				?>
      <option value="<?php echo $shgstexyear['borno_exam_term_year']; ?>"<?php if($shgstexyear['borno_exam_term_year']==$_POST['examyear']) { echo "selected"; } ?>> <?php echo $shgstexyear['borno_exam_term_year']; ?></option>
      <?php } ?>
      </select></td>
  </tr>
 <tr>
  <td><strong>Select Class</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><select name="classId" id="classId" onchange="callpage();">

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
      <option value=" <?php echo $shgstclass1['borno_school_class_id']; ?>" <?php if($shgstclass1['borno_school_class_id']==$_REQUEST['classId']) { echo "selected"; }  ?>> <?php echo $shgstclass1['borno_school_class_name']; ?></option>
      <?php } ?>
    </select>
    
    </td>
  </tr>
  

    
</table>
</form>

<br>
<table width="450" border="0" cellspacing="0" cellpadding="0" align="center" class="projectlist">
  <tr>
    <td width="343" align="Center">
           
         <a href="download_examroutine_class_pdf.php?schId=<?php echo $schId; ?>&branchId=<?php echo $gtfbranchId; ?>&gtexamtype=<?php echo $_POST['examtype'] ?>&gtexamyear=<?php echo $_POST['examyear'] ?>&classId=<?php echo $_POST['classId']; ?>" target="_blank">Show Exam  Routine (Class) </a>
</td>

         </tr>
       <tr width="343" align="Center">
     <td>
  <a href="download_examroutine_all_pdf.php?schId=<?php echo $schId; ?>&gtexamtype=<?php echo $_POST['examtype'] ?>&gtexamyear=<?php echo $_POST['examyear'] ?>" target="_blank">Show Exam  Routine (All) </a></td>
        
  </tr>
  
    
</table>




                        
                        
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