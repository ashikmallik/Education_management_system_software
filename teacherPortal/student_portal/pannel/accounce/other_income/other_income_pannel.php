<?php require_once('other_sett_top.php');

$schId=$shget_schoolName['borno_school_id'];
	$session=trim($shget_schoolName['borno_school_session']);

    $colour="'#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#8B0000', '#808000', '#20B2AA', '#FF00FF', '#00FFFF', '#FFFF00', '#BC8F8F', '#C71585', '#8A2BE2'";
	
	$sql = "Select balance.borno_school_sub_fund_id, subFund.sub_fund_name, balance.borno_school_fee from borno_school_balance balance Left Join borno_school_sub_fund subFund On balance.borno_school_sub_fund_id=subFund.borno_school_sub_fund_id where balance.borno_school_id='$schId' AND balance.borno_student_info_id='$stdid' AND balance.borno_school_session='$session' AND balance.borno_school_fund_id=2 Group By balance.borno_school_sub_fund_id Asc";
    $sql=$mysqli->query($sql);
    While($rsInfo=$sql->fetch_assoc()){
    $subfundId=$rsInfo['borno_school_sub_fund_id'];
    $subName=$rsInfo['sub_fund_name'];
    $memono=$rsInfo['borno_school_memo'];
    /*
    $SQL = "SELECT SUM(borno_school_fee) As Ammount from borno_school_receipt where borno_school_memo='$memono' ";
	$qaamont=$mysqli->query($SQL);			
	$shqaamont=$qaamont->fetch_assoc();	
	*/
    $fee=$rsInfo['borno_school_fee'];
    
    
    $subFundName="$subFundName'$subName',";
    $subFundFee="$subFundFee'$fee',";

    }

?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>:: [Due Report]::</title>
    <link rel="stylesheet" type="text/css" href="../../academic/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../academic/assets/css/font-awesome.css">
    <!-- Meta tag -->
         <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> 
    
    
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


<body>

<div class="wrapper">
    <div class="side_main_menu">
        <?php require_once('leftmenu.php');?>	
        <div class="fixed_logo">
            <a href=""><img src="../../academic/assets/images/logo.jpg" class="img-fluid"></a>
        </div>
    </div><!-- side bar end -->

    <div class="ot_main_content">
        <div class="admin_logout">
            <div class="admin_head">
                <h3> Due Report [<?php echo $shget_schoolName['borno_school_student_name']; ?>] </h3>
                
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../../academic/assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

    <div class="ot_main_body" style="margin-top:5px; margin-left:0px;">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Due Report</h2></div>
                <div class="form">
 <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <div class="col-md-12">

            <!-- STACKED BAR CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Due Tution Fee</h3>

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
      labels  : [<?php echo $subFundName; ?>],
          
      datasets: [
          {
          label               : 'Due Amount',
          backgroundColor     : 'rgba(153,0,51,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php echo $subFundFee; ?>]
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