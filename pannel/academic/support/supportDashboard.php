<?php
error_reporting(0);
//ob_start();
include('config.php');

                                     
                                           $totarequest ="SELECT COUNT(`id`) as total FROM `student_support_ticket`";
                                           $qgtotarequest=$mysqli->query($totarequest);
                                           $shqgtotarequest=$qgtotarequest->fetch_assoc();
                                           $tolalRequest = $shqgtotarequest['total'];
                                           
                                           $totasolved ="SELECT COUNT(`id`) as total FROM `student_support_ticket` WHERE `status` = 1";
                                           $qgtotasolved=$mysqli->query($totasolved);
                                           $shqgtotasolved=$qgtotasolved->fetch_assoc();
                                           $tolalSolved = $shqgtotasolved['total'];
                                           
                                            $totapending ="SELECT COUNT(`id`) as total FROM `student_support_ticket` WHERE `status` NOT IN (1,2)";
                                           $qgtotapending=$mysqli->query($totapending);
                                           $shqgtotapending=$qgtotapending->fetch_assoc();
                                           $tolalPending = $shqgtotapending['total'];
                                     


?>

<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>AmarEskul</title>

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
                                         <img src="assets/images/attendace/news-admin.svg" alt="" style="margin-top: 21%;margin-left: 6%;">
                                     </div>
                                 </div>
                                 <div class="studentdashText">
                                     <h3>Solved Issue</h3>
                                 </div>
                                 <div class="fessImagedas text-center">
                                    <img src="assets/images/request/request-for-proposal.svg" alt="">
                                 </div>
                                 <div class="resuest">
                                     <div class="totalRequest text-center">
                                         <h3>Total Solved Issue </h3>
                                         <h4><span style="color: #2262C6;"><?php echo $tolalSolved; ?></span></h4>
                                     </div>
                                     
                                 </div>
                             </div>
                         </div>
                         <div class="clickToPage text-center">
                             <a href="total_solved.php">View Details</a>
                         </div>
                        </div>
                        <div class="col-lg-4">
                         <div class="studentprofildashbord stuattendancedashbord">
                             <div class="studentprofildashbordInner">
                                 <div class="studentdashIcon">
                                     <div class="studentdashIconInner studentdashIconInner1 text-center">
                                         <img src="assets/images/Icon/sumhistory.svg" alt="" style="margin-top: 21%;margin-left: 6%;">
                                     </div>
                                 </div>
                                 <div class="studentdashText upadtestuText">
                                     <h3>Total Requesting Issue</h3>
                                 </div>
                                 <div class="fessImagedas text-center">
                                    <img src="assets/images/request/conversation.svg" alt="">
                                 </div>
                                 <div class="resuest">
                                    <div class="totalRequest text-center">
                                        <h3>Total Requesting Issue</h3>

                                        <h4><span style="color: #0AB69F;"><?php echo $tolalRequest; ?></span></h4>
                                        
                                    </div>
                                    
                                </div>
                             </div>
                         </div>
                         <div class="clickupdate text-center">
                             <a href="total_request.php">View Details</a>
                         </div>
                        </div>
                        <div class="col-lg-4">
                         <div class="studentprofildashbord stuattendancedashbord">
                             <div class="studentprofildashbordInner">
                                 <div class="studentdashIcon">
                                     <div class="studentdashIconInner studentdashIconInner2 text-center">
                                         <img src="assets/images/attendace/report (1).svg" alt="" style="margin-top: 21%;margin-left: 6%;">
                                     </div>
                                 </div>
                                 <div class="studentdashText CurriculumText">
                                    <h3>Pending Issue</h3>
                                </div>
                                <div class="fessImagedas text-center">
                                    <img src="assets/images/request/Document-files.svg" alt="">
                                 </div>
                                 <div class="resuest">
                                    <div class="totalRequest text-center">
                                        <h3>Total Pending Issue</h3>
                                        <h4><span style="color: #FF6680;"><?php echo $tolalPending; ?></span></h4>
                                    </div>
                                </div>
                             </div>
                         </div>
                         <div class="clickapply text-center">
                             <a href="total_pending.php">View Details</a>
                         </div>
                        </div>
                    </div>
                    <!----------------Content Start---------------->
                </div>
                <!-- Content Wrapper END -->

                <!-- Footer START -->
                    <div class="footer-content">
                        <p class="m-b-0">Copyright ©2020 AMARESKUL. All rights reserved.</p>
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
    <script src="../assets/js/vendors.min.js"></script>

    <!-- page js -->
    <script src="../assets/vendors/chartjs/Chart.min.js"></script>
    <script src="../assets/js/pages/dashboard-default.js"></script>

    <!-- Core JS -->
    <script src="../assets/js/app.min.js"></script>


   

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