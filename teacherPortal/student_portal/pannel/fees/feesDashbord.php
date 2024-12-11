<?php
error_reporting(0);
//ob_start();
	include('../../../connection.php');
	
	
	session_start();

	$stdid=$_SESSION['stdid'];
	if($stdid== "")
	{
	header("location:index.php");
	}

	
	$get_schoolName="select * from borno_school where borno_school_id='1'";
	$qget_schoolName =$mysqli->query($get_schoolName);
	$shget_schoolName=$qget_schoolName->fetch_assoc();
	
	
$get_Student="SELECT * FROM borno_student_info WHERE `borno_student_info_id`='$stdid'";
	$qget_Student =$mysqli->query($get_Student);
	$shget_Student=$qget_Student->fetch_assoc();
	$class_id =$shget_Student['borno_school_class_id'];
	
$get_class="SELECT * FROM `borno_school_class` WHERE `borno_school_class_id`='$class_id'";
$qget_class =$mysqli->query($get_class);
$shget_class=$qget_class->fetch_assoc();

$get_amount="SELECT Sum(`due_amount`) AS due_amount FROM `student_fees` WHERE `student_id`='$stdid'";
	$qget_amount =$mysqli->query($get_amount);
	$shget_amount=$qget_amount->fetch_assoc();
	$due_amount =$shget_amount['due_amount'];
	
$getp_amount="SELECT SUM(`paid_amount`) as paid_amount FROM `student_fees` WHERE `student_id`='$stdid' GROUP BY `receive_date` ORDER BY `receive_date` DESC";
	$qgetp_amount =$mysqli->query($getp_amount);
	$shgetp_amount=$qgetp_amount->fetch_assoc();
	if(empty($shget_amount['paid_amount'])){
	    $paid_amount = 0;
	}else{
	$paid_amount =$shget_amount['paid_amount'];
	}
?>

<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Student Portal</title>

     <!-- Favicon -->
     <link rel="shortcut icon" href="../assets/images/logo/bornoSky_logo.jpg">

    <!-- page css -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&amp;display=swap" rel="stylesheet">
    <!-- Core css -->
    <link href="../assets/css/app.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/media.css">

</head>

<body>
    <div class="app">
        <div class="layout">
            <!-- Header START -->
            <section id="mainnav">
            <?php
               		require_once('header.php');
			   ?> 

            </section> 
            <!---Header End-->

            <!-- Side Nav START -->
            <div class="side-nav" style ="background: #cbf9ff;">
            <?php
               		require_once('leftmenu.php');
			   ?>
            </div>
            <!-- Side Nav END -->

            <!-- Page Container START -->
            <div class="page-container">
                

                <!-- Content Wrapper START -->
                <div class="main-content">
                <?php
               		require_once('topmenu.php');
			   ?>
                    <!----------------Content Start----------------->

                    <div class="row">
                        <div class="col-lg-4">
                         <div class="studentprofildashbord">
                             <div class="studentprofildashbordInner">
                                 <div class="studentdashIcon">
                                     <div class="studentdashIconInner text-center">
                                         <img src="../assets/images/Icon/feespay.svg" alt="">
                                     </div>
                                 </div>
                                 <div class="studentdashText">
                                     <h3>Fee Payment</h3>
                                 </div>
                                 <div class="fessImagedas text-center">
                                    <img src="../assets/images/Icon/Feepayment.svg" alt="">
                                 </div>
                                 <div class="fessdasbordamount text-center">
                                     <h3>Current Outstanding</h3>
                                     <h4> <img src="../assets/images/Icon/taka.svg" alt=""> <?php echo $due_amount; ?></h4>
                                 </div>
                                 <div class="fesspaymentdate text-center">
                                     <a href="pay2fee.html">Pay Now</a>
                                 </div>
                             </div>
                         </div>
                         <div class="clickToPage text-center">
                             <a href="fess.html">View Details</a>
                         </div>
                        </div>
                        <div class="col-lg-4">
                         <div class="studentprofildashbord">
                             <div class="studentprofildashbordInner">
                                 <div class="studentdashIcon">
                                     <div class="studentdashIconInner studentdashIconInner1 text-center">
                                         <img src="../assets/images/Icon/sumhistory.svg" alt="">
                                     </div>
                                 </div>
                                 <div class="studentdashText upadtestuText">
                                     <h3>Payment History</h3>
                                 </div>
                                 <div class="lastpayment text-center">
                                     <p>Last Payment Amount</p>
                                     <h4><img src="../assets/images/Icon/taka2.svg" alt=""> <?php echo $paid_amount; ?></h4>
                                 </div>
                                 <div class="fessdasamountdate">
                                     <div class="amounytpayDate">
                                        <h3> <img src="../assets/images/Icon/calendar%20(1).svg" alt=""> </h3>
                                     </div>
                                     <div class="amounytpayTime">
                                         <h3><img src="../assets/images/Icon/wall-clock.svg" alt=""> </h3>
                                    </div>
                                 </div>
                                 <div class="paymentby text-center">
                                     <p>Payment Mood: <span></span></p>

                                     <h4>Transaction ID: <span></span></h4>
                                 </div>
                             </div>
                         </div>
                         <div class="clickupdate text-center">
                             <a href="paymentHistory.html">View Details</a>
                         </div>
                        </div>
                        <div class="col-lg-4">
                         <div class="studentprofildashbord">
                             <div class="studentprofildashbordInner">
                                 <div class="studentdashIcon">
                                     <div class="studentdashIconInner studentdashIconInner2 text-center">
                                         <img src="../assets/images/Icon/summary.svg" alt="">
                                     </div>
                                 </div>
                                 <div class="studentdashText CurriculumText">
                                    <h3>Yearly Payment Details</h3>
                                </div>
                                 <div class="lastpayment text-center">
                                     <h3>Current Month</h3>
                                    <p style="color: #5E5E5E;">Payment Amount</p>
                                    <h4 style="color: #5E5E5E;"><img src="../assets/images/Icon/taka3.svg" alt=""></h4>
                                </div>
                                <div class="fessdasamountMonthly">
                                    <div class="amounytpayDate">
                                       <p>Previous Due</p>
                                       <h4 style="color: #5E5E5E;"><img src="../assets/images/Icon/taka3.svg" alt=""></h4>
                                    </div>
                                    <div class="amounytpayTime">
                                        <p>Current Due</p>
                                       <h4 style="color: #5E5E5E;"><img src="../assets/images/Icon/taka3.svg" alt=""></h4>
                                   </div>
                                </div>
                                <div class="fessdasamountMonthly2">
                                    <div class="amounytpayDate">
                                       <p style="color: #5E5E5E">Advance Amount</p>
                                       <h4 style="color: #FF6680"><img src="../assets/images/Icon/taka2.svg" alt=""></h4>
                                    </div>
                                    <div class="amounytpayTime">
                                        <p style="color: #5E5E5E">Total Paid</p>
                                       <h4 style="color: #FF6680;"><img src="../assets/images/Icon/taka2.svg" alt=""></h4>
                                   </div>
                                </div>
                             </div>
                         </div>
                         <div class="clickapply text-center">
                             <a href="#">View Details</a>
                         </div>
                        </div>
                    </div>
                    <!----------------Content Start---------------->
                </div>
                <!-- Content Wrapper END -->

                <!-- Footer START -->

                <!-- Footer END -->

            </div>
            <!-- Page Container END -->

            <!-- Search Start-->
            
            <!-- Search End-->

            <!-- Quick View START -->
            
            <!-- Quick View END -->
        </div>
    </div>

    
    <!-- Core Vendors JS -->
    <script src="../assets/js/vendors.min.js"></script>

    <!-- page js -->
    <script src="../assets/vendors/chartjs/Chart.min.js"></script>
    <script src="../assets/js/pages/dashboard-default.js"></script>

    <!-- Core JS -->
    <script src="../assets/js/app.min.js"></script>


   

<script type="text/javascript" src="../../www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Task', 'Hours per month'],
      ['Absent',     11],
      ['Present',      2],
      
    ]);

    var options = {
      title: '',
      pieHole: 0.5,
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
    chart.draw(data, options);
  }
</script>
<script type="text/javascript">
    $('.side-nav-menu').on('click', 'li', function(){
        $('.side-nav-menu li.inneractive').removeClass('inneractive');
        $(this).addClass('inneractive');
    })
</script>
<!-- <script type="text/javascript">
    $('.ModuleNav').on('click', 'li', function(){
        $('.ModuleNav li.active').removeClass('active');
        $(this).addClass('active');
    })
</script> -->
<script type="text/javascript">
    $('.NavhideShow').on('click', 'li', function(){
        $('.stickyNav .navHideActive').removeClass('navHideActive');
        $(this).addClass('navHideActive');
    })
</script>
<script>
    $(document).ready(function(){
        $("#menuToggle").click(function(){
            $("#MobileToggle").fadeToggle();
        });
    });
</script>
<script>
    $(document).ready(function(){
        $("#menuToggle2").click(function(){
            $("#MobileToggle").fadeToggle();
        });
    });
</script>

<script>
    $(document).ready(function(){
        $(".Hidemybtn").click(function(){
            $(".Hidemybtn").show();
            $(this).hide();
        });
    });
</script>
</body>



</html>