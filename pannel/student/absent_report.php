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
    
    
    <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">

  <link rel="stylesheet" href="assets/plugins/dropdown/our_multi_drop.css">
  <link rel="stylesheet" href="assets/plugins/tagsinput/bootstrap-tagsinput.css">
  
  <link rel="stylesheet" href="assets/bower_components/select2/dist/css/select2.min.css">

  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  
  

  <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="assets/bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="assets/bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="assets/plugins/timepicker/bootstrap-timepicker.min.css">
  

  <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">
  
  <link rel="stylesheet" href="assets/box/check-box-sm.css">
  <link rel="stylesheet" href="assets/plugins/calendar/bundle.css">
  
  <!--<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />-->

  <link rel="stylesheet" href="assets/custome_style.css">

  <style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>
  
  
  <style>
    .container_print{
        height: 794px;
        width: 1105px;
        margin: 0px auto;
    }
    .print_body{
        background-color: #fff;
        height: 794px;
        width: 1105px;
    }
    .box-body{
        padding: 10px 20px;
    }
    .print_btn_sty{
        position: absolute;
        right: 35px;
    }
    .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
        border: 1px solid #000;
    }
    .class_routine table tr td {
        padding: 2px 1px;
        vertical-align: middle;
		text-align:center;
		font-size:10px;
    }
    thead {
        border-top: 1px solid #000;
    }
    .table-bordered{
        border: 1px solid #000;
    }
    @media print {
      /* style sheet for print goes here */
      .noprint {
        visibility: hidden;
      }
      
    }
    .color_one {
        color: #000;
        margin-bottom: 5px;
        font-size: 12px;
        padding-top: 5px;
        font-weight: bold;
    }
    .color_two {
        color: #000;
        margin-bottom: 0px;
        font-size: 12px;
        padding-bottom: 5px;
    }
</style>
    
    
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
	   	if(document.frmcontent.stsess.value=="")
		{
			alert("Please Select Session");
			document.frmcontent.stsess.focus();
			return (false);
		}
		
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
		

		
		if(document.frmcontent.group.value=="")
		{
			alert("Please Select Group");
			document.frmcontent.group.focus();
			return (false);
		}
		
		
	}
	
	
	function callpage()
	{
	 document.frmcontent.action="absent_report.php";
	 document.frmcontent.submit();
	}
	
	
	
</script>
        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading"><h2>Attandance Report</h2></div>
                             
                <div class="form">
                    
          
                        <center>
<form name="frmcontent" id="myform" action="download_attandance_report.php" method="post" enctype="multipart/form-data">
                    
					
		<?php
        	$msg=$_GET['msg'];
			if($msg==1) { echo "Manage Group Successfully"; } 
			else if($msg==2) { echo "Failed"; }  
			else if($msg==3) { echo "Roll Is Already Exist Please Select Another On"; }
		?>
   
   <table align="center" style="border: 1px solid #005067;">
  <tr>
    <td class="text_table">Session *</td>
    <td><select name="stsess" id="stsess" onchange="callpage();">
      <option value="">--Select--</option>
      <option value="2018" <?php if($_REQUEST['stsess']==2018) { echo "selected"; } ?>> 2018 </option>
      <option value="2019" <?php if($_REQUEST['stsess']==2019) { echo "selected"; } ?>> 2019 </option>
      <option value="2020" <?php if($_REQUEST['stsess']==2020) { echo "selected"; } ?>> 2020 </option>
    </select></td>
    
  </tr>
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
  </tr>
  <tr>
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
  </tr>
  <?php
 // $shiftId=$_POST['shiftId'];
			//	echo	$gstsection="select * from borno_school_section where borno_school_class_id='$studClass' AND borno_school_branch_id='$gtfbranchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId'";
  ?>
  <tr>
    <td class="text_table">Select  Section *</td>
     
    <td >
      <select name="section" id="section" onchange="callpage();">
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
   <tr>
  <td class="text_table">Select Month *</td>
    <td><select name="month" id="month" onchange="callpage();">
      <option value="">--Select--</option>
      <option value="1" <?php if($_POST['month']==1) { echo "selected"; } ?>> January </option>
      <option value="2" <?php if($_POST['month']==2) { echo "selected"; } ?>> February </option>
      <option value="3" <?php if($_POST['month']==3) { echo "selected"; } ?>> March </option>

      
      </select></td>
      
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="button" id="button" value="Show" formtarget="_blank"  onClick="return contalt_valid()"></td>
   </tr>                      </table>
                   
                   </form>


                  
                    </center>
                    
                    
                    <div class="col-sm-12 class_routine print_table">
                        <table class="table table-bordered">
                          <thead>
                            <tr class="info">
                              <th rowspan="2">Sl</th>
                              <th rowspan="2">Name</th>
                              <th rowspan="2">Roll</th>
                              <th colspan="30">Date/January</th>
                            </tr>
                            <tr class="info">
                              <th>1</th>
                              <th>2</th>
                              <th class="danger">3</th>
                              <th>4</th>
                              <th>5</th>
                              <th>6</th>
                              <th>7</th>
                              <th>8</th>
                              <th>9</th>
                              <th>10</th>
                              
                              <th>11</th>
                              <th>12</th>
                              <th>13</th>
                              <th>14</th>
                              <th>15</th>
                              <th>16</th>
                              <th>17</th>
                              <th>18</th>
                              <th>19</th>
                              <th>20</th>
                              
                              <th>21</th>
                              <th>22</th>
                              <th>23</th>
                              <th>24</th>
                              <th>25</th>
                              <th>26</th>
                              <th>27</th>
                              <th>28</th>
                              <th>29</th>
                              <th>30</th>
                              <th>31</th>
                              <th>TP</th>
                              <th>TA</th>
                             
                              
                            </tr>
                          </thead>
    				<?php

			$stsess=trim($_POST['stsess']);
			$section=$_POST['section'];
			$month=$_POST['month'];
	
	
 $gtstudent="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$gtfbranchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' order by borno_school_roll asc";
	
	$qgtstudent=$mysqli->query($gtstudent);
	$sl=0;
	while($shroll=$qgtstudent->fetch_assoc()){ $sl++;	
	
	    $roll=$shroll['borno_school_roll'];
		$techname=$shroll['borno_school_student_name'];
		$techPhone=substr($shroll['borno_school_phone'],2,13);
		$stdid=$shroll['borno_student_info_id'];
		$stdid1=$shroll['borno_school_student_id'];
	
	
	
	
	

			   ?>
                          <tbody>
                            <tr class="success">
                              <td><?php echo $sl; ?></td>
                              <td><?php echo $shroll['borno_school_student_name']; ?></td>
                               <td><?php echo $shroll['borno_school_roll']; ?></td>
                              
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='$month' AND `borno_school_date`='1'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='$month' AND `borno_school_date`='2'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='$month' AND `borno_school_date`='3'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='$month' AND `borno_school_date`='4'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='$month' AND `borno_school_date`='5'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='$month' AND `borno_school_date`='6'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='$month' AND `borno_school_date`='7'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='$month' AND `borno_school_date`='8'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='$month' AND `borno_school_date`='9'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='$month' AND `borno_school_date`='10'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='$month' AND `borno_school_date`='11'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='$month' AND `borno_school_date`='12'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='$month' AND `borno_school_date`='13'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='$month' AND `borno_school_date`='14'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='$month' AND `borno_school_date`='15'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='$month' AND `borno_school_date`='16'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='$month' AND `borno_school_date`='17'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='$month' AND `borno_school_date`='18'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='$month' AND `borno_school_date`='19'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='$month' AND `borno_school_date`='20'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='$month' AND `borno_school_date`='21'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='$month' AND `borno_school_date`='22'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='$month' AND `borno_school_date`='23'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='$month' AND `borno_school_date`='24'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='$month' AND `borno_school_date`='25'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='$month' AND `borno_school_date`='26'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='$month' AND `borno_school_date`='27'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='$month' AND `borno_school_date`='28'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='$month' AND `borno_school_date`='29'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='$month' AND `borno_school_date`='30'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='$month' AND `borno_school_date`='31'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              <td>	 
							  <?php
                              $branch="select Count(borno_student_info_id) As presence from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='$month' AND `borno_school_attandance`='P'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	echo $presence=$smsbranch['presence'];
							  ?>	 
                              </td>                             
                              <td>	
                              <?php
                              $branch="select Count(borno_student_info_id) As absent from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='$month' AND `borno_school_attandance`='A'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	echo $absent=$smsbranch['absent'];
							  ?>
                              
                               </td>  
                              
                              
                            </tr>
                          </tbody>
               <?php } ?>           
                        </table>
                </div>
                   
                      </div>  
               
            </div>
        </div><!-- Main Body part end -->
    </div><!-- Main Content end -->
</div>

<!--Script part-->
<script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js"></script>
</body>
</html>