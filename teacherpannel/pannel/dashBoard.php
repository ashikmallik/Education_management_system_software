<?php
error_reporting(0);
//ob_start();
include('config.php');
//$schId = 1;

if(empty($teacherid)){
    session_destroy();
header("location:../index.php");
}


$gettecherinfo = "SELECT `borno_teacher_name`,`borno_teachers_designation`,`borno_teacher_photo`,`borno_school_class_name`,`borno_school_shift_name`,`borno_school_section_name` FROM `borno_set_class_teacher` AS ct
INNER JOIN `borno_teacher_info` AS ti ON ti.borno_teacher_info_id = ct.borno_school_teacher_id
INNER JOIN `borno_school_class` AS sc ON sc.borno_school_class_id = ct.borno_school_class_id
INNER JOIN `borno_school_shift` AS ss ON ss.borno_school_shift_id = ct.borno_school_shift_id
INNER JOIN `borno_school_section` AS sse ON sse.borno_school_section_id = ct.borno_school_section_id
WHERE `borno_school_teacher_id` = '$teacherid'";
	$qgettecherinfo =$mysqli->query($gettecherinfo);
	$sqgettecherinfo=$qgettecherinfo->fetch_assoc();
   
   $teacherImage = $sqgettecherinfo['borno_teacher_photo'];
   
   
   

?>

<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Teacher Portal</title>

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
                       <!--<div class="row">-->
                        <div class="col-lg-4">
                            <div class="studentprofile">
                                <h3>Teacher Profile</h3>
                                <div class="studentprofileParent">
                                    <div class="parentsImg">
                                        <img src="../../pannel/academic/teacher/teacherphoto/<?php echo $teacherImage; ?>" alt="">
                                    </div>
                                </div>
                                <div class="studentprofileParentName">
                                    <h4><?php echo $sqgettecherinfo['borno_teacher_name']; ?></h4>
                                    <h5><span><?php echo $sqgettecherinfo['borno_teachers_designation']; ?></span></h5>
                                    <h6>Class Teacher : <span><?php echo $sqgettecherinfo['borno_school_class_name']."(".$sqgettecherinfo['borno_school_section_name'].")"; ?></span></h6>
                                </div>
                                <div class="ParentprofileButton text-center">
                                    <a href="teacher_profile.php" style="background-color: #1F8DDD; color: #fff;">View</a>
                                    <!-- <a href="">Edit</a> -->
                                </div>
                            </div>
                        </div>
                       
                        
                       
                        <div class="col-lg-4">
                            <div class="smsList">
                                <span>SMS List</span> <a href="" class="viewButton">View all</a>
                                <div class="classlist">
                                    <div class="innerclasslist">
                                        <div class="subjectName">
                                            <p>Object Oriented Programing</p>
                                        </div>
                                        <div class="classTime text-center">
                                            <h5>New</h5>
                                            <h6>12:05AM</h6>
                                        </div>
                                    </div>
                                    <div class="innerclasslist">
                                        <div class="subjectName">
                                            <p>OComputer System</p>
                                        </div>
                                        <div class="classTime text-center">
                                            <h5>Yesterday</h5>
                                            <h6>12:05AM</h6>
                                        </div>
                                    </div>
                                    <div class="innerclasslist">
                                        <div class="subjectName">
                                            <p>Mathematical Analysis</p>
                                        </div>
                                        <div class="classTime text-center">
                                            <h5>12-03-2020</h5>
                                            <h6>12:05AM</h6>
                                        </div>
                                    </div>
                                    <div class="innerclasslist">
                                        <div class="subjectName">
                                            <p>Mathematical Analysis</p>
                                        </div>
                                        <div class="classTime text-center">
                                            <h5>12-03-2020</h5>
                                            <h6>12:05AM</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4">
                            <div class="class-routine">
                                <span>Class Routine</span> <a href="" class="viewButton">View all</a>
                                <div class="classlist">
                                        <div class="routinemain">
                                        <div class="calenderroutine">
                                            <div class="calenderIcon text-center">
                                                <img src="assets/images/calenderroutine.svg" alt="">
                                            </div>
                                            <div class="calenderdateRoutine text-center">
                                                <h4>Sunday</h4>
                                                <p>02.02.2019</p>
                                            </div>
                                        </div>
                                        <div class="Subjectroutine">
                                            <div class="subjectroutineUp">
                                                <div class="subjecttime text-center">
                                                    <p>08:00</p>
                                                </div>
                                                <div class="subjectname">
                                                    <p>English</p>
                                                </div>
                                                <div class="backicon">
                                                    <a href=""><img src="assets/images/arrow.png" alt=""></a>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="subjectroutineUp">
                                                <div class="subjecttime text-center">
                                                    <p>09:00</p>
                                                </div>
                                                <div class="subjectname">
                                                    <p>Bangla</p>
                                                </div>
                                                <div class="backicon">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="routinemain">
                                        <div class="calenderroutine">
                                            <div class="calenderIcon text-center">
                                                <img src="assets/images/calenderroutine.svg" alt="">
                                            </div>
                                            <div class="calenderdateRoutine text-center">
                                                <h4>Sunday</h4>
                                                <p>02.02.2019</p>
                                            </div>
                                        </div>
                                        <div class="Subjectroutine">
                                            <div class="subjectroutineUp">
                                                <div class="subjecttime text-center">
                                                    <p>08:00</p>
                                                </div>
                                                <div class="subjectname">
                                                    <p>English</p>
                                                </div>
                                                <div class="backicon">
                                                    <a href=""><img src="assets/images/arrow.png" alt=""></a>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="subjectroutineUp">
                                                <div class="subjecttime text-center">
                                                    <p>09:00</p>
                                                </div>
                                                <div class="subjectname">
                                                    <p>Bangla</p>
                                                </div>
                                                <div class="backicon">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="routinemain">
                                        <div class="calenderroutine">
                                            <div class="calenderIcon text-center">
                                                <img src="assets/images/calenderroutine.svg" alt="">
                                            </div>
                                            <div class="calenderdateRoutine text-center">
                                                <h4>Sunday</h4>
                                                <p>02.02.2019</p>
                                            </div>
                                        </div>
                                        <div class="Subjectroutine">
                                            <div class="subjectroutineUp">
                                                <div class="subjecttime text-center">
                                                    <p>08:00</p>
                                                </div>
                                                <div class="subjectname">
                                                    <p>English</p>
                                                </div>
                                                <div class="backicon">
                                                    <a href=""><img src="assets/images/arrow.png" alt=""></a>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="subjectroutineUp">
                                                <div class="subjecttime text-center">
                                                    <p>09:00</p>
                                                </div>
                                                <div class="subjectname">
                                                    <p>Bangla</p>
                                                </div>
                                                <div class="backicon">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="calender protalcalender" id="calender">
                                <h3>Academic Calender</h3>
                                <ul class="month">
                                  <li>
                                    <h1>January</h1>
                                    <h2>2016</h2>
                                  </li>
                                  <span class="prev">&#10094;</span>
                                  <span class="next">&#10095;</span>
                                </ul>
                                <ul class="weeks">
                                  <li>Sa</li>
                                  <li>Su</li>
                                  <li>Mo</li>
                                  <li>Tu</li>
                                  <li>We</li>
                                  <li>Th</li>
                                  <li>Fr</li>
                                </ul>
                                <ul class="days">
                              
                                </ul>
                              </div>
                    </div>
                    <!--</div>-->
                    <!----------------Content Start---------------->
                </div>
                <!-- Content Wrapper END -->

                <!-- Footer START -->
                    <div class="footer-content">
                        <p class="m-b-0">Copyright ©2020 Bornosky. All rights reserved.</p>
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
<script>
        //punblic variables
  var calender = document.querySelector(".calender"),//container of calender
    topDiv = document.querySelector('.month'),
    monthDiv = calender.querySelector('h1'),//h1 of monthes
    yearDiv = calender.querySelector('h2'),//h2 for years
    weekDiv = calender.querySelector(".weeks"),//week container
    dayNames = weekDiv.querySelectorAll("li"),//dayes name
    dayItems = calender.querySelector(".days"),//date of day container
    prev = calender.querySelector(".prev"),
    next = calender.querySelector(".next"),

    // date variables
    years = new Date().getFullYear(),
    monthes = new Date(new Date().setFullYear(years)).getMonth(),
    lastDayOfMonth = new Date(new Date(new Date().setMonth(monthes + 1)).setDate(0)).getDate(),
    dayOfFirstDateOfMonth = new Date(new Date(new Date().setMonth(monthes)).setDate(1)).getDay(),

    // array to define name of monthes
    monthNames = ["January", "February", "March", "April", "May", "June",
                  "July", "August", "September", "October", "November", "December"],
    //colors = ['#FFA549', '#ABABAB', '#1DABB8', '#953163', '#E7DF86', '#E01931', '#92F22A', '#FEC606', '#563D28', '#9E58DC', '#48AD01', '#0EBB9F'],
    i,//counter for day before month first day in week
    x,//counter for prev , next
    counter;//counter for day of month  days;

//display dayes of month in items
function days(x) {
  'use strict';
  dayItems.innerHTML = "";
  monthes = monthes + x;

  /////////////////////////////////////////////////
  //test for last month useful while prev ,max prevent go over array
  if (monthes > 11) {
    years = years + 1;
    monthes = new Date(new Date(new Date().setFullYear(years)).setMonth(0)).getMonth();
  }
  if (monthes < 0) {
    years = years - 1;
    monthes = new Date(new Date(new Date().setFullYear(years)).setMonth(11)).getMonth();
  }
   next,prev
  lastDayOfMonth = new Date(new Date(new Date(new Date().setFullYear(years)).setMonth(monthes + 1)).setDate(0)).getDate();

  dayOfFirstDateOfMonth = new Date(new Date(new Date(new Date().setFullYear(years)).setMonth(monthes)).setDate(1)).getDay();

  /////////////////////////////////////////////////
  yearDiv.innerHTML = years;
  monthDiv.innerHTML = monthNames[monthes];
  for (i = 0; i <= dayOfFirstDateOfMonth; i = i + 1) {
    if (dayOfFirstDateOfMonth === 6) { break; }
    dayItems.innerHTML += "<li> - </li>";
  }
  for (counter = 1; counter <= lastDayOfMonth; counter = counter + 1) {
    
    <?php 
    
    // $year = "<script>document.write(years)</script>";
    // $month = "<script>document.write(monthes)</script>";
    // $day = "<script>document.write(counter)</script>";
    // $gtfeeshead1="SELECT * FROM `academic_calender_details` WHERE `year` ='$year' AND `month_id` ='$month' AND `day` = '$day' AND `cetagory` = '$cetagory'";
    // $qgtfeeshead1=$mysqli->query($gtfeeshead1);
    // $shgtfeeshead1=$qgtfeeshead1->fetch_assoc();
    
    // $remarks = $shgtfeeshead1['holiday_remarks'];
    // $dayType = $shgtfeeshead1['holiday_type'];
    // $bgColor = $shgtfeeshead1['holiday_color'];
    // $cday = $shgtfeeshead1['day'];
    
    ?> 
      
    //   var dayType = <?php echo $dayType; ?>
    //   var bgColor = <?php echo $bgColor; ?>
    //   var remarks = <?php echo $remarks; ?>
    // if(dayType != "Regular"){
    //   dayItems.innerHTML += "<li style='background-color:#f00;color: white'>" + (counter) +"<br>"+(remarks)+ "</li>"; 
    // }  
    // else{
    dayItems.innerHTML += "<li>" + (counter) + "</li>";
   // }
  }
   
  topDiv.style.background = colors[monthes];
  dayItems.style.background = colors[monthes];
  
  if (monthes === new Date().getMonth() && years === new Date().getFullYear()) {
    
    dayItems.children[new Date().getDate() + dayOfFirstDateOfMonth].style.background = "#c00";
  }
}
prev.onclick = function () {
  'use strict';
  days(-1);//decrement monthes
};
next.onclick = function () {
  'use strict';
  days(1);//increment monthes
};
days(0);

//end
</script>
</body>



</html>