<?php require_once('information_top.php');
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <title>[:: Attendance Panel ::]</title>
  
  
  

  <!-- Tell the browser to be responsive to screen width -->
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

  <!-- Google Font -->
  <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
<script language="javascript">
		function callpage()
			{
			 document.frmart.action="attendance_report_print.php";
			 document.frmart.submit();
			}
	
      </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper _custome">
      
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
        padding: 8px 5px;
        vertical-align: middle;
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

    <!-- Main content -->
    <div class="container_print">
           <?php require_once('leftmenu.php');?>	     
      <div class="row">
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="print_body">
              
            <form class="form-horizontal" name="frmart" action="#" method="post" enctype="multipart/form-data">
            <div class="box-body">
                
                
		        <div class="row">
		            <div class="row">
                  <div class="col-md-2">
                    <div class="form-group">
                      <!-- <label for="" class="col-sm-4 control-label">Branch</label> -->

                      <div class="col-sm-12">
                        <select class="form-control" name="branchId" onChange="callpage();">
                          <option value="">--Select--</option>
                                <?php
                                        
                                        $data="select * from borno_school_branch where borno_school_id='$schId'";
                                        $qdata=$mysqli->query($data);
                                        while($showdata=$qdata->fetch_assoc()){ $sl++;
                                    
                                    ?>
                                <option value=" <?php echo $showdata['borno_school_branch_id']; ?>" <?php if($showdata['borno_school_branch_id']==$_POST['branchId']) { echo "selected"; }  ?>> <?php echo $showdata['borno_school_branch_name']; ?></option>
                                <?php } ?>
                       </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <!-- <label for="" class="col-sm-5 control-label">Shift</label> -->

                      <div class="col-sm-12">
                        <select class="form-control" name="studClass" id="studClass" onChange="callpage();">
                          <option value="" required> Select Class </option>
                                
                             <?php                                       
									    $gtfbranchId=$_POST['branchId'];
										
										$getClassId="select * from borno_school_set_class where borno_school_id='$schId' AND borno_school_branch_id='$gtfbranchId'";
		
		
		$qgetClassId=$mysqli->query($getClassId);
		while($shgetClassId=$qgetClassId->fetch_assoc()){
										
										$getfClassId=$shgetClassId['borno_school_class_id']; 
                                        $gstclass="select * from borno_school_class where borno_school_class_id='$getfClassId'";
                                        $qgstclass=$mysqli->query($gstclass);
                                        $shgstclass=$qgstclass->fetch_assoc(); 
                                    
                                    ?>
                                <option value=" <?php echo $shgstclass['borno_school_class_id']; ?>" <?php if($shgstclass['borno_school_class_id']==$_POST['studClass']) { echo "selected"; }  ?>> <?php echo $shgstclass['borno_school_class_name']; ?></option>
                                <?php } ?>
                          
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <!-- <label for="" class="col-sm-4 control-label">Class</label> -->

                      <div class="col-sm-12">
                       
                          <select name="shiftId" class="form-control" id="shiftId" onChange="callpage();">
                          <option value=""> Select Shift</option>
                          <?php
					$studClass=$_POST['studClass'];
					$gstshift="select * from borno_school_shift";
					$qggstshift=$mysqli->query($gstshift);
					while($shggstshift=$qggstshift->fetch_assoc()){ $sl++;
				
				?>
            <option value=" <?php echo $shggstshift['borno_school_shift_id']; ?>" <?php if($shggstshift['borno_school_shift_id']==$_POST['shiftId']) { echo "selected"; }  ?>> <?php echo $shggstshift['borno_school_shift_name']; ?></option>
            <?php } ?>            
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <!-- <label for="" class="col-sm-5 control-label">Section</label> -->

                      <div class="col-sm-12">
                        
                          <select name="section" id="section" class="form-control" onChange="callpage();">
       <option value=""> Select Section</option>
      
        <?php
					$shiftId=$_POST['shiftId'];
					$gstsection="select * from borno_school_section where borno_school_class_id='$studClass' AND borno_school_branch_id='$gtfbranchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId'";
					$qgstsection=$mysqli->query($gstsection);
					while($shggstsection=$qgstsection->fetch_assoc()){ $sl++;
				
				?>
          <option value=" <?php echo $shggstsection['borno_school_section_id']; ?>" <?php if($shggstsection['borno_school_section_id']==$_POST['section']) { echo "selected"; }  ?>> <?php echo $shggstsection['borno_school_section_name']; ?></option>
          <?php } ?>
      
      
      </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <!-- <label for="" class="col-sm-5 control-label">Section</label> -->

                      <div class="col-sm-12">
                        <select name="stsess" class="form-control" id="stsess" onChange="callpage();">
                          <option value=""> Session</option>
                           <?php
	  
	  		$studClass=$_POST['studClass'];
	   		$shiftId=$_POST['shiftId'];
			$section=$_REQUEST['section'];
	  
					$data1="select borno_school_session from borno_student_info where borno_school_id='$schId' and borno_school_class_id='$studClass' and borno_school_shift_id='$shiftId' and borno_school_section_id='$section' group by borno_school_session asc";
					$qdata1=$mysqli->query($data1);
					while($showdata1=$qdata1->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $showdata1['borno_school_session']; ?>" <?php if($showdata1['borno_school_session']==trim($_REQUEST['stsess'])) { echo "selected"; }  ?>> <?php echo $showdata1['borno_school_session']; ?></option>
      <?php } ?>
                         
                        </select>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-2">
                    <div class="form-group">
                      <!-- <label for="" class="col-sm-5 control-label">Section</label> -->

                      <div class="col-sm-12">
                        <select name="month" class="form-control" id="month" onChange="callpage();">
                          <option value=""> Month </option>
                          
      <option value="01" <?php if($_REQUEST['month']=="01") { echo "selected"; }  ?>> January </option>
      <option value="02" <?php if($_REQUEST['month']=="02") { echo "selected"; }  ?>> February </option>
      <option value="03" <?php if($_REQUEST['month']=="03") { echo "selected"; }  ?>> March </option>
      <option value="04" <?php if($_REQUEST['month']=="04") { echo "selected"; }  ?>> April </option>
      <option value="05" <?php if($_REQUEST['month']=="05") { echo "selected"; }  ?>> May </option>
      <option value="06" <?php if($_REQUEST['month']=="06") { echo "selected"; }  ?>> June </option>
      <option value="07" <?php if($_REQUEST['month']=="07") { echo "selected"; }  ?>> July </option>
      <option value="08" <?php if($_REQUEST['month']=="08") { echo "selected"; }  ?>> August </option>
      <option value="09" <?php if($_REQUEST['month']=="09") { echo "selected"; }  ?>> September </option>
      <option value="10" <?php if($_REQUEST['month']=="10") { echo "selected"; }  ?>> October </option>
      <option value="11" <?php if($_REQUEST['month']=="11") { echo "selected"; }  ?>> November </option>
      <option value="12" <?php if($_REQUEST['month']=="12") { echo "selected"; }  ?>> December </option>
      
                         
                        </select>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-2">
                    <div class="form-group">
                      <!-- <label for="" class="col-sm-5 control-label">Section</label> -->

                      
                    </div>
                  </div>
                </div>                    
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
                              <th class="danger">10</th>
                              
                              <th>11</th>
                              <th>12</th>
                              <th>13</th>
                              <th>14</th>
                              <th>15</th>
                              <th>16</th>
                              <th class="danger">17</th>
                              <th>18</th>
                              <th>19</th>
                              <th>20</th>
                              
                              <th>21</th>
                              <th>22</th>
                              <th>23</th>
                              <th class="danger">24</th>
                              <th>25</th>
                              <th>26</th>
                              <th>27</th>
                              <th>28</th>
                              <th>29</th>
                              <th>30</th>
                            </tr>
                          </thead>
    				<?php

			$stsess=trim($_POST['stsess']);
			$section=$_POST['section'];
	
	
 $gtstudent="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$gtfbranchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' order by borno_school_roll asc";
	
	$qgtstudent=$mysqli->query($gtstudent);
	$sl=0;
	while($shroll=$qgtstudent->fetch_assoc()){ $sl++;

			   ?>
                          <tbody>
                            <tr class="success">
                              <td><?php echo $sl; ?></td>
                              <td><?php echo $shroll['borno_school_student_name']; ?></td>
                              <td><?php echo $shroll['borno_school_roll'];?></td>
                              <td style="color: green">
                              	<?php
                                
								//$date=date_create("2013-03-15");
								//date_format($date,"d");
								$gattn=$mysqli->query("select * from borno_sent_sms where borno_school_id='$schId' AND borno_school_branch_id='$gtfbranchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess'");
								$shgattn=$gattn->fetch_assoc();
								$date=$shgattn['borno_sms_date'];
								echo date_format($date,"d");
								?>
                              </td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td class="danger"></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: red"><i class="fa fa-times"></i></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td class="danger"></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: red"><i class="fa fa-times"></i></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td class="danger"></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td class="danger"></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: red"><i class="fa fa-times"></i></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                            </tr>
                          </tbody>
               <?php } ?>           
                        </table>
                    </div>
                </div>

              </div>

            </form>

          </div>
          <!-- /.box -->
        </div>
      </div>

    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php //include_once("../../include/print_footer.php"); ?>