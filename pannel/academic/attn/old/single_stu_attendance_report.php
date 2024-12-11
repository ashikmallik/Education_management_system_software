<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <title>[:: Attendence Panel ::]</title>
  
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
</head>
  
  <style>
      .table > thead > tr > th {
        padding: 8px 0px;
    }
  </style>


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper _custome">

    <section>
      <div class="content container">

      <div class="row">
          <div class="col-md-12 custome_box_header">
            <div class="box box-success">
              <div class="box-header with-border">
                <center><h3 class="box-title">Academic Mgt. <i class="fa fa-angle-double-right"></i> Attendance </h3></center>
              </div>
            </div>
          </div>
        </div>
        


      </div>
    </section>


    <!-- Main content -->
    <div class="container">

      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Single Student Attendence Report</h3>
              
                <a href="academic/attendance/single_stu_attendance_report_print.php" class="right noprint" target="_blank">
                    <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Report Print</button>
                </a>
            </div>
            <!-- /.box-header -->

            <!-- form start -->
            <form class="form-horizontal" name="frmcontent" action="academic/attendance/attendance_entry_do.php" method="post" enctype="multipart/form-data">
              <div class="box-body">
                

                <div class="form-group"></div>
                <div class="form-group"></div>

                <div class="row">
                  <div class="col-md-2">
                    <div class="form-group">
                      <!-- <label for="" class="col-sm-4 control-label">Branch</label> -->

                      <div class="col-sm-12">
                        <select class="form-control" name="branchId" onChange="callpage();">
                          <option value="">Select Branch</option>
                          <option value=""> AAA </option>
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
                                
                             
                          <option value=""> AAA </option>
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
                         <option value=""> AAA </option>                   
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
      
       <option value=""> AAA </option>
      
      
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
                          <option value="2019"> 2019 </option>
                         
                        </select>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-2">
                    <div class="form-group">
                      <!-- <label for="" class="col-sm-5 control-label">Section</label> -->

                      <div class="col-sm-12">
                        <select name="stsess" class="form-control" id="stsess" onChange="callpage();">
                          <option value=""> Roll</option>
                          <option value="">01</option>
                          <option value="">02</option>
                          <option value="">03</option>
                          <option value="">04</option>
                          <option value="">05</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group"></div>
                <div class="form-group"></div>

                <div class="form-group">
                
                  <div class="col-md-12">
                    <div class="table-responsive exam_table">
                        <table class="table table-bordered">
                          <thead>
                            <tr class="info">
                              <th rowspan="2">Month</th>
                              <th colspan="36">Day / Md. Shiam Hossain / Roll 04</th>
                            </tr>
                            <tr class="info">
                              <th>01</th>
                              <th>02</th>
                              <th>03</th>
                              <th>04</th>
                              <th>05</th>
                              <th>06</th>
                              <th>07</th>
                              <th>08</th>
                              <th>09</th>
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
                              <th>T.S.D</th>
                              <th>Pre</th>
                              <th>% Pre</th>
                              <th>Ab</th>
                              <th>% Ab</th>
                            </tr>
                          </thead>
    				
                          <tbody>
                            <tr class="success">
                              <td>Jan</td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: red"><i class="fa fa-times"></i></td>
                              <td class="danger">Fri</td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: red"><i class="fa fa-times"></i></td>
                              <td class="danger">Fri</td>
                              <td style="color: red"><i class="fa fa-times"></i></td>
                              <td style="color: red"><i class="fa fa-times"></i></td>
                              <td style="color: red"><i class="fa fa-times"></i></td>
                              <td style="color: red"><i class="fa fa-times"></i></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: red"><i class="fa fa-times"></i></td>
                              <td class="danger">Fri</td>
                              <td style="color: red"><i class="fa fa-times"></i></td>
                              <td style="color: red"><i class="fa fa-times"></i></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: red"><i class="fa fa-times"></i></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: red"><i class="fa fa-times"></i></td>
                              <td class="danger">Fri</td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: red"><i class="fa fa-times"></i></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: red"><i class="fa fa-times"></i></td>
                              <td class="danger">Fri</td>
                              <td>26</td>
                              <td>13</td>
                              <td>50%</td>
                              <td>13</td>
                              <td>50%</td>
                            </tr>
                            <tr class="success">
                              <td>Feb</td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: red"><i class="fa fa-times"></i></td>
                              <td style="color: red"><i class="fa fa-times"></i></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td class="danger">Fri</td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: red"><i class="fa fa-times"></i></td>
                              <td class="danger">Fri</td>
                              <td style="color: red"><i class="fa fa-times"></i></td>
                              <td style="color: red"><i class="fa fa-times"></i></td>
                              <td style="color: red"><i class="fa fa-times"></i></td>
                              <td style="color: red"><i class="fa fa-times"></i></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: red"><i class="fa fa-times"></i></td>
                              <td class="danger">Fri</td>
                              <td style="color: red"><i class="fa fa-times"></i></td>
                              <td style="color: red"><i class="fa fa-times"></i></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: red"><i class="fa fa-times"></i></td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td style="color: red"><i class="fa fa-times"></i></td>
                              <td class="danger">Fri</td>
                              <td style="color: green"><i class="fa fa-check"></i></td>
                              <td></td>
                              <td></td>
                              <td>25</td>
                              <td>13</td>
                              <td>55%</td>
                              <td>12</td>
                              <td>45%</td>
                            </tr>
                            <tr class="success">
                              <td>Mar</td>
                              
                              <td style="color: red"><i class="fa fa-times"></i></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr class="success">
                              <td>Apr</td>
                              <td style="color: red"><i class="fa fa-times"></i></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr class="success">
                              <td>May</td>
                              <td style="color: red"><i class="fa fa-times"></i></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr class="success">
                              <td>Jun</td>
                              <td style="color: red"><i class="fa fa-times"></i></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr class="success">
                              <td>Jul</td>
                              <td style="color: red"><i class="fa fa-times"></i></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr class="success">
                              <td>Aug</td>
                              <td style="color: red"><i class="fa fa-times"></i></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr class="success">
                              <td>Sep</td>
                              <td style="color: red"><i class="fa fa-times"></i></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr class="success">
                              <td>Oct</td>
                              <td style="color: red"><i class="fa fa-times"></i></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr><!-- 1st 10 day end -->
                            
                            <tr class="success">
                              <td>Nov</td>
                              <td style="color: red"><i class="fa fa-times"></i></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr class="success">
                              <td>Dec</td>
                              <td style="color: red"><i class="fa fa-times"></i></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                            
                            <tr class="success">
                              <td colspan="32" style="text-align: right"><b>Grand Total: </b></td>
                              
                              <td><b>230</b></td>
                              <td><b>200</b></td>
                              <td><b>85%</b></td>
                              <td><b>30</b></td>
                              <td><b>15%</b></td>
                            </tr>
                          </tbody>
                          
                        </table>
                        <label>T.S.D = Total Schooling Day, Pre = Present, Ab = Absent</label>
                    </div>
                  </div>
                  
                    <!--<div class="col-md-6 col-md-offset-3 text-center">-->
                    <!--    <h4>-------------- Grand Total -------------- </h4>-->
                    <!--    <h4>Total Schooling Day = 230 Days</h4>-->
                    <!--    <h4>Present in School = 200 Days</h4>-->
                    <!--    <h4>% of Present in School = 85%</h4>-->
                    <!--    <br>-->
                    <!--    <h4>Absent in School = 30 Days</h4>-->
                    <!--    <h4>% of Absent in School = 15%</h4>-->
                    <!--</div>-->
                </div>
              </div>
              <!-- /.box-body -->

              <!--<div class="box-footer">-->
              <!--  <button type="submit" class="btn btn-primary custome_save_btn">Submit</button>-->
              <!--</div>-->
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>

    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->

<?php include_once("../../include/academic_admin_footer.php"); ?>

<script>
    $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-red',
      radioClass: 'iradio_square-red',
      increaseArea: '20%' /* optional */
    });
  });
</script>
