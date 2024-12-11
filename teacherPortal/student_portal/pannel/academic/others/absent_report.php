<?php require_once('others_top.php');?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Absent Pannel</title>
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
<script language="javascript">
	function contalt_valid()
	{

	
	}
	
	function callpage()
	{
	 document.frmcontent.action="absent_report.php";
	 document.frmcontent.submit();
	}
	
	
	
</script>    
    
    

<div class="wrapper">
    <div class="side_main_menu">
        <?php require_once('leftmenu.php');?>	
        <div class="fixed_logo">
           <a href="../index.php"><img src="../assets/images/logo.jpg" class="img-fluid"></a>
        </div>
    </div><!-- side bar end -->

    <div class="ot_main_content">
        <div class="admin_logout">
            <div class="admin_head" >
                <h3>Attendance Report</h3>
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

    <div class="ot_main_body" style="margin-top:1px; margin-left:0px;">
            <div class="ot_body_fixed">
                <div class="default_heading" style="margin-top:-18px"><h2>Attandance Report</h2></div>
                             
                <div class="form">
                    
          
                        <center>

</center>
                    </br>
                    
                    <div class="col-sm-12 class_routine print_table">
                        <table class="table table-bordered">
                          <thead>
                            <tr class="info">
                              <th rowspan="2">SL</th>
                              <th rowspan="2"> Month Name</th>
                                 </tr>
                            <tr class="info">
                              <th>1</th>
                              <th>2</th>
                              <th >3</th>
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
							$stsess=date('Y');	
							$stSession=date('Y');
							$gtstudent="select * from borno_student_info where borno_student_info_id='$stdid'";							
							$qgtstudent=$mysqli->query($gtstudent);	
							$shroll=$qgtstudent->fetch_assoc();	
							
							$roll=$shroll['borno_school_roll'];
							$techname=$shroll['borno_school_student_name'];
							$techPhone=substr($shroll['borno_school_phone'],2,13);
							$stdid=$shroll['borno_student_info_id'];
							$stdid1=$shroll['borno_school_student_id'];	
	
			   ?>
                          <tbody>
                          
                            <tr class="success">
                              <td>1</td>
                              <td style="text-align:left"> January </td>
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='1' AND `borno_school_date`='1' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='1' AND `borno_school_date`='2' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='1' AND `borno_school_date`='3' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='1' AND `borno_school_date`='4' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='1' AND `borno_school_date`='5' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='1' AND `borno_school_date`='6' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='1' AND `borno_school_date`='7' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='1' AND `borno_school_date`='8' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='1' AND `borno_school_date`='9' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='1' AND `borno_school_date`='10' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='1' AND `borno_school_date`='11' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='1' AND `borno_school_date`='12' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='1' AND `borno_school_date`='13' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='1' AND `borno_school_date`='14' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='1' AND `borno_school_date`='15' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='1' AND `borno_school_date`='16' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='1' AND `borno_school_date`='17' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='1' AND `borno_school_date`='18' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='1' AND `borno_school_date`='19' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='1' AND `borno_school_date`='20' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='1' AND `borno_school_date`='21' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='1' AND `borno_school_date`='22' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='1' AND `borno_school_date`='23' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='1' AND `borno_school_date`='24' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='1' AND `borno_school_date`='25' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='1' AND `borno_school_date`='26' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='1' AND `borno_school_date`='27' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='1' AND `borno_school_date`='28' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='1' AND `borno_school_date`='29' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='1' AND `borno_school_date`='30' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='1' AND `borno_school_date`='31' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              <td>	 
							  <?php
                              $branch="select Count(borno_student_info_id) As presence from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='1' AND `borno_school_attandance`='P'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	echo $presence=$smsbranch['presence'];
							  ?>	 
                              </td>                             
                              <td>	
                              <?php
                              $branch="select Count(borno_student_info_id) As absent from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='1' AND `borno_school_attandance`='A'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	echo $absent=$smsbranch['absent'];
							  ?>
                              
                               </td>                               
                              
                            </tr>
                            
                            
                            <tr class="success">
                              <td>2</td>
                              <td style="text-align:left"> February </td>
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='2' AND `borno_school_date`='1' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='2' AND `borno_school_date`='2' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='2' AND `borno_school_date`='3' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='2' AND `borno_school_date`='4' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='2' AND `borno_school_date`='5' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='2' AND `borno_school_date`='6' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='2' AND `borno_school_date`='7' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='2' AND `borno_school_date`='8' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='2' AND `borno_school_date`='9' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='2' AND `borno_school_date`='10' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='2' AND `borno_school_date`='11' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='2' AND `borno_school_date`='12' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='2' AND `borno_school_date`='13' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='2' AND `borno_school_date`='14' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='2' AND `borno_school_date`='15' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='2' AND `borno_school_date`='16' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='2' AND `borno_school_date`='17' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='2' AND `borno_school_date`='18' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='2' AND `borno_school_date`='19' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='2' AND `borno_school_date`='20' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='2' AND `borno_school_date`='21' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='2' AND `borno_school_date`='22' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='2' AND `borno_school_date`='23' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='2' AND `borno_school_date`='24' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='2' AND `borno_school_date`='25' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='2' AND `borno_school_date`='26' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='2' AND `borno_school_date`='27' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='2' AND `borno_school_date`='28' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='2' AND `borno_school_date`='29' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='2' AND `borno_school_date`='30' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='2' AND `borno_school_date`='31' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              <td>	 
							  <?php
                              $branch="select Count(borno_student_info_id) As presence from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='2' AND `borno_school_attandance`='P'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	echo $presence=$smsbranch['presence'];
							  ?>	 
                              </td>                             
                              <td>	
                              <?php
                              $branch="select Count(borno_student_info_id) As absent from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='2' AND `borno_school_attandance`='A'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	echo $absent=$smsbranch['absent'];
							  ?>
                              
                               </td>                               
                              
                            </tr>
                            
                            
                            <tr class="success">
                              <td>3</td>
                              <td style="text-align:left"> March </td>
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='3' AND `borno_school_date`='1' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='3' AND `borno_school_date`='2' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='3' AND `borno_school_date`='3' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='3' AND `borno_school_date`='4' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='3' AND `borno_school_date`='5' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='3' AND `borno_school_date`='6' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='3' AND `borno_school_date`='7' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='3' AND `borno_school_date`='8' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='3' AND `borno_school_date`='9' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='3' AND `borno_school_date`='10' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='3' AND `borno_school_date`='11' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='3' AND `borno_school_date`='12' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='3' AND `borno_school_date`='13' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='3' AND `borno_school_date`='14' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='3' AND `borno_school_date`='15' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='3' AND `borno_school_date`='16' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='3' AND `borno_school_date`='17' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='3' AND `borno_school_date`='18' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='3' AND `borno_school_date`='19' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='3' AND `borno_school_date`='20' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='3' AND `borno_school_date`='21' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='3' AND `borno_school_date`='22' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='3' AND `borno_school_date`='23' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='3' AND `borno_school_date`='24' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='3' AND `borno_school_date`='25' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='3' AND `borno_school_date`='26' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='3' AND `borno_school_date`='27' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='3' AND `borno_school_date`='28' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='3' AND `borno_school_date`='29' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='3' AND `borno_school_date`='30' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='3' AND `borno_school_date`='31' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              <td>	 
							  <?php
                              $branch="select Count(borno_student_info_id) As presence from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='3' AND `borno_school_attandance`='P'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	echo $presence=$smsbranch['presence'];
							  ?>	 
                              </td>                             
                              <td>	
                              <?php
                              $branch="select Count(borno_student_info_id) As absent from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='3' AND `borno_school_attandance`='A'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	echo $absent=$smsbranch['absent'];
							  ?>
                              
                               </td>                               
                              
                            </tr>
                            
                            <tr class="success">
                              <td>4</td>
                              <td style="text-align:left"> April </td>
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='4' AND `borno_school_date`='1' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='4' AND `borno_school_date`='2' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='4' AND `borno_school_date`='3' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='4' AND `borno_school_date`='4' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='4' AND `borno_school_date`='5' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='4' AND `borno_school_date`='6' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='4' AND `borno_school_date`='7' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='4' AND `borno_school_date`='8' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='4' AND `borno_school_date`='9' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='4' AND `borno_school_date`='10' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='4' AND `borno_school_date`='11' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='4' AND `borno_school_date`='12' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='4' AND `borno_school_date`='13' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='4' AND `borno_school_date`='14' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='4' AND `borno_school_date`='15' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='4' AND `borno_school_date`='16' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='4' AND `borno_school_date`='17' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='4' AND `borno_school_date`='18' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='4' AND `borno_school_date`='19' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='4' AND `borno_school_date`='20' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='4' AND `borno_school_date`='21' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='4' AND `borno_school_date`='22' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='4' AND `borno_school_date`='23' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='4' AND `borno_school_date`='24' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='4' AND `borno_school_date`='25' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='4' AND `borno_school_date`='26' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='4' AND `borno_school_date`='27' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='4' AND `borno_school_date`='28' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='4' AND `borno_school_date`='29' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='4' AND `borno_school_date`='30' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='4' AND `borno_school_date`='31' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              <td>	 
							  <?php
                              $branch="select Count(borno_student_info_id) As presence from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='4' AND `borno_school_attandance`='P'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	echo $presence=$smsbranch['presence'];
							  ?>	 
                              </td>                             
                              <td>	
                              <?php
                              $branch="select Count(borno_student_info_id) As absent from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='4' AND `borno_school_attandance`='A'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	echo $absent=$smsbranch['absent'];
							  ?>
                              
                               </td>                               
                              
                            </tr>
                            
                            <tr class="success">
                              <td>5</td>
                              <td style="text-align:left"> May </td>
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='5' AND `borno_school_date`='1' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='5' AND `borno_school_date`='2' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='5' AND `borno_school_date`='3' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='5' AND `borno_school_date`='4' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='5' AND `borno_school_date`='5' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='5' AND `borno_school_date`='6' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='5' AND `borno_school_date`='7' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='5' AND `borno_school_date`='8' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='5' AND `borno_school_date`='9' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='5' AND `borno_school_date`='10' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='5' AND `borno_school_date`='11' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='5' AND `borno_school_date`='12' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='5' AND `borno_school_date`='13' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='5' AND `borno_school_date`='14' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='5' AND `borno_school_date`='15' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='5' AND `borno_school_date`='16' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='5' AND `borno_school_date`='17' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='5' AND `borno_school_date`='18' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='5' AND `borno_school_date`='19' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='5' AND `borno_school_date`='20' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='5' AND `borno_school_date`='21' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='5' AND `borno_school_date`='22' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='5' AND `borno_school_date`='23' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='5' AND `borno_school_date`='24' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='5' AND `borno_school_date`='25' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='5' AND `borno_school_date`='26' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='5' AND `borno_school_date`='27' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='5' AND `borno_school_date`='28' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='5' AND `borno_school_date`='29' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='5' AND `borno_school_date`='30' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='5' AND `borno_school_date`='31' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              <td>	 
							  <?php
                              $branch="select Count(borno_student_info_id) As presence from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='5' AND `borno_school_attandance`='P'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	echo $presence=$smsbranch['presence'];
							  ?>	 
                              </td>                             
                              <td>	
                              <?php
                              $branch="select Count(borno_student_info_id) As absent from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='5' AND `borno_school_attandance`='A'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	echo $absent=$smsbranch['absent'];
							  ?>
                              
                               </td>                               
                              
                            </tr>	
                            
                            <tr class="success">
                              <td>6</td>
                              <td style="text-align:left"> June </td>
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='6' AND `borno_school_date`='1' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='6' AND `borno_school_date`='2' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='6' AND `borno_school_date`='3' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='6' AND `borno_school_date`='4' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='6' AND `borno_school_date`='5' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='6' AND `borno_school_date`='6' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='6' AND `borno_school_date`='7' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='6' AND `borno_school_date`='8' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='6' AND `borno_school_date`='9' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='6' AND `borno_school_date`='10' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='6' AND `borno_school_date`='11' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='6' AND `borno_school_date`='12' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='6' AND `borno_school_date`='13' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='6' AND `borno_school_date`='14' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='6' AND `borno_school_date`='15' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='6' AND `borno_school_date`='16' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='6' AND `borno_school_date`='17' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='6' AND `borno_school_date`='18' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='6' AND `borno_school_date`='19' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='6' AND `borno_school_date`='20' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='6' AND `borno_school_date`='21' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='6' AND `borno_school_date`='22' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='6' AND `borno_school_date`='23' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='6' AND `borno_school_date`='24' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='6' AND `borno_school_date`='25' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='6' AND `borno_school_date`='26' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='6' AND `borno_school_date`='27' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='6' AND `borno_school_date`='28' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='6' AND `borno_school_date`='29' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='6' AND `borno_school_date`='30' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='6' AND `borno_school_date`='31' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              <td>	 
							  <?php
                              $branch="select Count(borno_student_info_id) As presence from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='6' AND `borno_school_attandance`='P'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	echo $presence=$smsbranch['presence'];
							  ?>	 
                              </td>                             
                              <td>	
                              <?php
                              $branch="select Count(borno_student_info_id) As absent from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='6' AND `borno_school_attandance`='A'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	echo $absent=$smsbranch['absent'];
							  ?>
                              
                               </td>                               
                              
                            </tr>
                            
                            <tr class="success">
                              <td>7</td>
                              <td style="text-align:left"> July </td>
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='7' AND `borno_school_date`='1' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='7' AND `borno_school_date`='2' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='7' AND `borno_school_date`='3' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='7' AND `borno_school_date`='4' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='7' AND `borno_school_date`='5' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='7' AND `borno_school_date`='6' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='7' AND `borno_school_date`='7' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='7' AND `borno_school_date`='8' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='7' AND `borno_school_date`='9' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='7' AND `borno_school_date`='10' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='7' AND `borno_school_date`='11' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='7' AND `borno_school_date`='12' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='7' AND `borno_school_date`='13' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='7' AND `borno_school_date`='14' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='7' AND `borno_school_date`='15' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='7' AND `borno_school_date`='16' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='7' AND `borno_school_date`='17' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='7' AND `borno_school_date`='18' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='7' AND `borno_school_date`='19' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='7' AND `borno_school_date`='20' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='7' AND `borno_school_date`='21' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='7' AND `borno_school_date`='22' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='7' AND `borno_school_date`='23' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='7' AND `borno_school_date`='24' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='7' AND `borno_school_date`='25' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='7' AND `borno_school_date`='26' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='7' AND `borno_school_date`='27' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='7' AND `borno_school_date`='28' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='7' AND `borno_school_date`='29' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='7' AND `borno_school_date`='30' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='7' AND `borno_school_date`='31' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              <td>	 
							  <?php
                              $branch="select Count(borno_student_info_id) As presence from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='7' AND `borno_school_attandance`='P'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	echo $presence=$smsbranch['presence'];
							  ?>	 
                              </td>                             
                              <td>	
                              <?php
                              $branch="select Count(borno_student_info_id) As absent from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='7' AND `borno_school_attandance`='A'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	echo $absent=$smsbranch['absent'];
							  ?>
                              
                               </td>                               
                              
                            </tr>
                            
                            <tr class="success">
                              <td>8</td>
                              <td style="text-align:left"> August </td>
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='8' AND `borno_school_date`='1' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='8' AND `borno_school_date`='2' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='8' AND `borno_school_date`='3' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='8' AND `borno_school_date`='4' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='8' AND `borno_school_date`='5' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='8' AND `borno_school_date`='6' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='8' AND `borno_school_date`='7' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='8' AND `borno_school_date`='8' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='8' AND `borno_school_date`='9' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='8' AND `borno_school_date`='10' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='8' AND `borno_school_date`='11' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='8' AND `borno_school_date`='12' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='8' AND `borno_school_date`='13' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='8' AND `borno_school_date`='14' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='8' AND `borno_school_date`='15' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='8' AND `borno_school_date`='16' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='8' AND `borno_school_date`='17' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='8' AND `borno_school_date`='18' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='8' AND `borno_school_date`='19' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='8' AND `borno_school_date`='20' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='8' AND `borno_school_date`='21' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='8' AND `borno_school_date`='22' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='8' AND `borno_school_date`='23' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='8' AND `borno_school_date`='24' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='8' AND `borno_school_date`='25' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='8' AND `borno_school_date`='26' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='8' AND `borno_school_date`='27' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='8' AND `borno_school_date`='28' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='8' AND `borno_school_date`='29' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='8' AND `borno_school_date`='30' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='8' AND `borno_school_date`='31' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              <td>	 
							  <?php
                              $branch="select Count(borno_student_info_id) As presence from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='8' AND `borno_school_attandance`='P'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	echo $presence=$smsbranch['presence'];
							  ?>	 
                              </td>                             
                              <td>	
                              <?php
                              $branch="select Count(borno_student_info_id) As absent from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='8' AND `borno_school_attandance`='A'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	echo $absent=$smsbranch['absent'];
							  ?>
                              
                               </td>                               
                              
                            </tr>
                            
                            <tr class="success">
                              <td>9</td>
                              <td style="text-align:left"> September </td>
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='9' AND `borno_school_date`='1' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='9' AND `borno_school_date`='2' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='9' AND `borno_school_date`='3' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='9' AND `borno_school_date`='4' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='9' AND `borno_school_date`='5' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='9' AND `borno_school_date`='6' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='9' AND `borno_school_date`='7' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='9' AND `borno_school_date`='8' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);

	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='9' AND `borno_school_date`='9' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='9' AND `borno_school_date`='10' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='9' AND `borno_school_date`='11' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='9' AND `borno_school_date`='12' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='9' AND `borno_school_date`='13' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='9' AND `borno_school_date`='14' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='9' AND `borno_school_date`='15' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='9' AND `borno_school_date`='16' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='9' AND `borno_school_date`='17' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='9' AND `borno_school_date`='18' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='9' AND `borno_school_date`='19' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='9' AND `borno_school_date`='20' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='9' AND `borno_school_date`='21' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='9' AND `borno_school_date`='22' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='9' AND `borno_school_date`='23' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='9' AND `borno_school_date`='24' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='9' AND `borno_school_date`='25' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='9' AND `borno_school_date`='26' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='9' AND `borno_school_date`='27' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='9' AND `borno_school_date`='28' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='9' AND `borno_school_date`='29' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='9' AND `borno_school_date`='30' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='9' AND `borno_school_date`='31' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              <td>	 
							  <?php
                              $branch="select Count(borno_student_info_id) As presence from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='9' AND `borno_school_attandance`='P'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	echo $presence=$smsbranch['presence'];
							  ?>	 
                              </td>                             
                              <td>	
                              <?php
                              $branch="select Count(borno_student_info_id) As absent from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='9' AND `borno_school_attandance`='A'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	echo $absent=$smsbranch['absent'];
							  ?>
                              
                               </td>                               
                              
                            </tr>
                            
                            <tr class="success">
                              <td>10</td>
                              <td style="text-align:left"> October </td>
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='10' AND `borno_school_date`='1' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='10' AND `borno_school_date`='2' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='10' AND `borno_school_date`='3' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='10' AND `borno_school_date`='4' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='10' AND `borno_school_date`='5' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='10' AND `borno_school_date`='6' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='10' AND `borno_school_date`='7' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='10' AND `borno_school_date`='8' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);

	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='10' AND `borno_school_date`='9' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='10' AND `borno_school_date`='10' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='10' AND `borno_school_date`='11' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='10' AND `borno_school_date`='12' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='10' AND `borno_school_date`='13' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='10' AND `borno_school_date`='14' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='10' AND `borno_school_date`='15' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='10' AND `borno_school_date`='16' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='10' AND `borno_school_date`='17' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='10' AND `borno_school_date`='18' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='10' AND `borno_school_date`='19' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='10' AND `borno_school_date`='20' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='10' AND `borno_school_date`='21' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='10' AND `borno_school_date`='22' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='10' AND `borno_school_date`='23' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='10' AND `borno_school_date`='24' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='10' AND `borno_school_date`='25' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='10' AND `borno_school_date`='26' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='10' AND `borno_school_date`='27' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='10' AND `borno_school_date`='28' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='10' AND `borno_school_date`='29' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='10' AND `borno_school_date`='30' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='10' AND `borno_school_date`='31' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              <td>	 
							  <?php
                              $branch="select Count(borno_student_info_id) As presence from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='10' AND `borno_school_attandance`='P'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	echo $presence=$smsbranch['presence'];
							  ?>	 
                              </td>                             
                              <td>	
                              <?php
                              $branch="select Count(borno_student_info_id) As absent from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='10' AND `borno_school_attandance`='A'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	echo $absent=$smsbranch['absent'];
							  ?>
                              
                               </td>                               
                              
                            </tr>
                            
                            <tr class="success">
                              <td>11</td>
                              <td style="text-align:left"> November </td>
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='11' AND `borno_school_date`='1' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='11' AND `borno_school_date`='2' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='11' AND `borno_school_date`='3' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='11' AND `borno_school_date`='4' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='11' AND `borno_school_date`='5' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='11' AND `borno_school_date`='6' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='11' AND `borno_school_date`='7' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='11' AND `borno_school_date`='8' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);

	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='11' AND `borno_school_date`='9' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='11' AND `borno_school_date`='10' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='11' AND `borno_school_date`='11' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='11' AND `borno_school_date`='12' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='11' AND `borno_school_date`='13' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='11' AND `borno_school_date`='14' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='11' AND `borno_school_date`='15' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='11' AND `borno_school_date`='16' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='11' AND `borno_school_date`='17' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='11' AND `borno_school_date`='18' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='11' AND `borno_school_date`='19' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='11' AND `borno_school_date`='20' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='11' AND `borno_school_date`='21' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='11' AND `borno_school_date`='22' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='11' AND `borno_school_date`='23' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='11' AND `borno_school_date`='24' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='11' AND `borno_school_date`='25' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='11' AND `borno_school_date`='26' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='11' AND `borno_school_date`='27' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='11' AND `borno_school_date`='28' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='11' AND `borno_school_date`='29' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='11' AND `borno_school_date`='30' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='11' AND `borno_school_date`='31' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              <td>	 
							  <?php
                              $branch="select Count(borno_student_info_id) As presence from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='11' AND `borno_school_attandance`='P'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	echo $presence=$smsbranch['presence'];
							  ?>	 
                              </td>                             
                              <td>	
                              <?php
                              $branch="select Count(borno_student_info_id) As absent from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='1' AND `borno_school_attandance`='A'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	echo $absent=$smsbranch['absent'];
							  ?>
                              
                               </td>                               
                              
                            </tr>
                            
                            <tr class="success">
                              <td>12</td>
                              <td style="text-align:left"> December </td>
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='12' AND `borno_school_date`='1' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='12' AND `borno_school_date`='2' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='12' AND `borno_school_date`='3' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='12' AND `borno_school_date`='4' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='12' AND `borno_school_date`='5' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='12' AND `borno_school_date`='6' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='12' AND `borno_school_date`='7' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='12' AND `borno_school_date`='8' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);

	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='12' AND `borno_school_date`='9' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='12' AND `borno_school_date`='10' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='12' AND `borno_school_date`='11' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='12' AND `borno_school_date`='12' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='12' AND `borno_school_date`='13' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='12' AND `borno_school_date`='14' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='12' AND `borno_school_date`='15' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='12' AND `borno_school_date`='16' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='12' AND `borno_school_date`='17' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='12' AND `borno_school_date`='18' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='12' AND `borno_school_date`='19' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='12' AND `borno_school_date`='20' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='12' AND `borno_school_date`='21' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='12' AND `borno_school_date`='22' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='12' AND `borno_school_date`='23' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='12' AND `borno_school_date`='24' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='12' AND `borno_school_date`='25' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='12' AND `borno_school_date`='26' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='12' AND `borno_school_date`='27' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='12' AND `borno_school_date`='28' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='12' AND `borno_school_date`='29' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='12' AND `borno_school_date`='30' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <td>							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_month`='12' AND `borno_school_date`='31' AND borno_school_session='$stSession'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              <td>	 
							  <?php
                              $branch="select Count(borno_student_info_id) As presence from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stSession' AND `borno_school_month`='12' AND `borno_school_attandance`='P'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	echo $presence=$smsbranch['presence'];
							  ?>	 
                              </td>                             
                              <td>	
                              <?php
                              $branch="select Count(borno_student_info_id) As absent from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$stsess' AND `borno_school_month`='12' AND `borno_school_attandance`='A'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	echo $absent=$smsbranch['absent'];
							  ?>
                              
                               </td>                               
                              
                            </tr>
                            
                          
                            
                          </tbody>
                       
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