<?php require_once('others_top.php');

$schId=$shget_schoolName['borno_school_id'];
$session=trim($shget_schoolName['borno_school_session']);

    $colour="'#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#8B0000', '#808000', '#20B2AA', '#FF00FF', '#00FFFF', '#FFFF00', '#BC8F8F', '#C71585', '#8A2BE2'";
	
	
	for($i=1;$i<13;$i++){
	
	$psql = "Select count(borno_student_info_id) as student_id_p from borno_student_attandance where borno_school_id='$schId' AND borno_student_info_id='$stdid' AND borno_school_session='$session' AND borno_school_month=$i AND borno_school_attandance='P' order by borno_school_month asc ";
    
    $psql=$mysqli->query($psql);
    $prsInfo=$psql->fetch_assoc();
    $prsent=$prsInfo['student_id_p'];
  if ($prsent==""){$prsent="0";} 
$fpresent="$fpresent$prsent,";	
	
	
	$asql = "Select count(borno_student_info_id) as student_id_a from borno_student_attandance where borno_school_id='$schId' AND borno_student_info_id='$stdid' AND borno_school_session='$session' AND borno_school_month=$i AND borno_school_attandance='A' order by borno_school_month asc  ";
    $asql=$mysqli->query($asql);
    $arsInfo=$asql->fetch_assoc();

    $absent=$arsInfo['student_id_a'];
    
if ($absent==""){$absent="0";} 
$fabsent="$fabsent$absent,";

	}

?>

<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>:: [Attendance Panel]::</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <!-- Meta tag -->
          <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    
    <!-- Meta tag -->
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
</head>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->

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
                <h3>[<?php echo $shget_schoolName['borno_school_student_name']; ?>]</h3>
                
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

 <div class="ot_main_body" style="margin-top:1px; margin-left:0px;">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Attendance Pannel</h2></div>
                <div class="form">
                

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <div class="col-md-12">

            <!-- STACKED BAR CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Attendance & Absent Statistics</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


          </div>
          <!-- /.col (RIGHT) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Add Content Here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



<script>
  $(function () {

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')

    var stackedBarChartData = {
      labels  : ['January','February','March','April','May','June','July','August','September','October','November','December'],
          
      datasets: [
          {
          label               : 'Present',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php echo $fpresent; ?>]
        },
          {
          label               : 'Absent',
          backgroundColor     : 'rgba(191,4,4,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php echo $fabsent; ?>]
        },
      ]
    }

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    var stackedBarChart = new Chart(stackedBarChartCanvas, {
      type: 'bar', 
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })


  })
</script>

                
                
                </div>
            </div>
        </div><!-- Main Body part end -->
    </div><!-- Main Content end -->
</div>

<!--Script part-->
<script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js"></script>
</body>
</html>