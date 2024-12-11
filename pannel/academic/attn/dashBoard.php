<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Academic Calender Panel</title>

     <!-- Favicon -->
     <link rel="shortcut icon" href="../assets/images/logo.jpg">

    <!-- page css -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&amp;display=swap" rel="stylesheet">
    <!-- Core css -->
    <link href="assets/css/app.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/media.css">

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
            <div class="side-nav" style ="background: #f1f6f7;">
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
                
               	//	require_once('topmenu.php');
			   ?>
                    <!----------------Content Start----------------->

                    <div class="row">
                        <div class="col-lg-4">
                         <div class="studentprofildashbord stuattendancedashbord">
                             <div class="studentprofildashbordInner">
                                 <div class="studentdashIcon">
                                     <div class="studentdashIconInner text-center">
                                         <img src="assets/images/attendace/news-admin.svg" alt="">
                                     </div>
                                 </div>
                                 <div class="studentdashText">
                                     <h3>Current Summary</h3>
                                 </div>
                                 <div class="fessImagedas text-center">
                                    <img src="assets/images/attendace/attendance.svg" alt="">
                                 </div>
                                 <div class="calenderdashbord text-center">
                                     <h3>Total Academic Calendar working Days</h3>
                                     <h6>250</h6>
                                 </div>
                                 <div class="dashbordTotal">
                                     <div class="totalwork">
                                         <p>Total Class till date</p>
                                         <h5>152</h5>
                                     </div>
                                     <div class="totalwork">
                                        <p>Total Present Till Date</p>
                                        <h5 style="color: #2262C6;">152</h5>
                                     </div>
                                     <div class="totalwork">
                                        <p>Total Leave Till Date</p>
                                        <h5 style="color: #FF6680;">152</h5>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="clickToPage text-center">
                             <a href="CurrentSummary.html">View Details</a>
                         </div>
                        </div>
                        <div class="col-lg-4">
                         <div class="studentprofildashbord stuattendancedashbord">
                             <div class="studentprofildashbordInner">
                                 <div class="studentdashIcon">
                                     <div class="studentdashIconInner studentdashIconInner1 text-center">
                                         <img src="assets/images/Icon/sumhistory.svg" alt="">
                                     </div>
                                 </div>
                                 <div class="studentdashText upadtestuText">
                                     <h3>Recent Attendance</h3>
                                 </div>
                                 <div class="fessImagedas text-center">
                                    <img src="assets/images/attendace/scheduling.svg" alt="">
                                 </div>
                                 <div class="scheduling text-center">
                                     <p>Current Date: <span>10.04.2020</span></p>
                                     <h3>Todays Attendance</h3>
                                     <h6>Attendance Status : <span>Present</span></h6>
                                 </div>
                                 <div class="shedulingmain">
                                     <div class="shedulingtime">
                                        <img src="assets/images/attendace/wall-clock.svg" alt="">
                                         <span class="walltime">In Time :</span class="walltime2"><span> 9.00am</span>
                                     </div>
                                     <div class="shedulingtime">
                                        <img src="assets/images/attendace/wall-clock.svg" alt="">
                                        <span class="walltime">Out Time :</span class="walltime2"><span> 12.30pm</span>
                                     </div>
                                 </div>
                                 
                             </div>
                         </div>
                         <div class="clickupdate text-center">
                             <a href="RecentAttendance.html">View Details</a>
                         </div>
                        </div>
                        <div class="col-lg-4">
                         <div class="studentprofildashbord stuattendancedashbord">
                             <div class="studentprofildashbordInner">
                                 <div class="studentdashIcon">
                                     <div class="studentdashIconInner studentdashIconInner2 text-center">
                                         <img src="assets/images/attendace/report (1).svg" alt="">
                                     </div>
                                 </div>
                                 <div class="studentdashText CurriculumText">
                                    <h3>Attendance Details</h3>
                                </div>
                                <div class="fessImagedas text-center">
                                    <img src="assets/images/attendace/refresh.svg" alt="">
                                 </div>
                                 <div class="calenderdashbord currentmoth text-center">
                                     <h3>Current Month: <span>May</span></h3>
                                 </div>
                                 <div class="dashbordTotal">
                                     <div class="attendancedash text-center">
                                         <p>Working Days</p>
                                         <h5>152</h5>
                                     </div>
                                     <div class="attendancedash text-center">
                                        <p>Present Days</p>
                                        <h5>152</h5>
                                     </div>
                                     <div class="attendancedash text-center">
                                        <p>Absent Days</p>
                                        <h5 >152</h5>
                                     </div>
                                 </div>
                                 <div class="attendancetotal">
                                     <div class="attendancetotalinner text-center">
                                        <p>Weekend Days</p>
                                        <h5>152</h5>
                                     </div>
                                     <div class="attendancetotalinner text-center">
                                        <p>Attendance Rate</p>
                                        <h5 style="color: #FF6680;">60%</h5>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="clickapply text-center">
                             <a href="monthlyAttendance.html">View Details</a>
                         </div>
                        </div>
                    </div>
                    <!----------------Content Start---------------->
                </div>
                <!-- Content Wrapper END -->

                <!-- Footer START -->
                    <div class="footer-content">
                        <p class="m-b-0">Copyright ©2020 Amareskul. All rights reserved.</p>
                    </div>
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
    <script src="assets/js/vendors.min.js"></script>

    <!-- page js -->
    <script src="assets/vendors/chartjs/Chart.min.js"></script>
    <script src="assets/js/pages/dashboard-default.js"></script>

    <!-- Core JS -->
    <script src="assets/js/app.min.js"></script>


   

<!--<script type="text/javascript" src="../../www.gstatic.com/charts/loader.js"></script>
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
 <script type="text/javascript">
    $('.ModuleNav').on('click', 'li', function(){
        $('.ModuleNav li.active').removeClass('active');
        $(this).addClass('active');
    })
</script>
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
</script> -->
</body>



</html>