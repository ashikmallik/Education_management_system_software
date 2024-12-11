<?php
error_reporting(0);
ob_start();
	include('../../connection.php');
	
	
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

$get_amount="SELECT Sum(`due_amount`) AS due_amount  FROM `student_fees` WHERE `student_id`='$stdid'";
	$qget_amount =$mysqli->query($get_amount);
	$shget_amount=$qget_amount->fetch_assoc();
	$due_amount =$shget_amount['due_amount'];
?>
<!DOCTYPE html>
<!--<html>-->
<!--<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">-->
<!--	<title>Borno Sky</title>-->
<!--	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">-->
<!--	<link rel="stylesheet" type="text/css" href="../css/style.css">-->
	<!-- Meta -->
	
<!--	<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--</head>-->
<!--<body>-->
<!--<div class="main">-->
<!--	<div class="left_fixed">-->
<!--		<div class="logo_top">-->
			
<!--		</div>-->
<!--		<div class="logo">-->
<!--			<img src="../images/logo.jpg">-->
<!--		</div>-->
<!--	</div>-->
<!--	<div class="main_content">    -->
    
   		
<!--				<div class="top_item" style="margin-left:650px;">-->

<!--					<a href="logout.php"><img src="../images/sms/06.jpg" height="60px" width="85px"></a>-->
<!--				</div>-->
			
    
<!--		<div class="main_part">-->
<!--			<div class="admin">-->
<!--				<div class="admin_top">-->
<!--					<div class="admin_item item1">-->
<!--					    	<a href="academic/index.php">-->
<!--							<img src="../images/admin/Academic.jpg" height="160px" width="230px">-->
<!--							<p>Academic</p>-->
<!--						</a>-->
<!--					</div>-->
<!--					<div class="admin_item">-->
<!--						<a href="accounce/index.php">-->
<!--							<img src="../images/admin/account.jpg" height="160px" width="230px">-->
<!--							<p>Accounce History</p>-->
<!--						</a>-->
<!--					</div>-->
<!--				</div>-->

<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--</div>-->

<!--<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>-->
<!--<script type="text/javascript" src="../js/bootstrap.min.js"></script>-->
<!--</body>-->
<!--</html>-->

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from css.odhyyon.com/ParentsPortal/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Jan 2022 06:20:32 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Student Portal</title>

     <!-- Favicon -->
     <link rel="shortcut icon" href="assets/images/logo/bornoSky_logo.jpg">
     <script src="../../kit.fontawesome.com/0701ececad.js" crossorigin="anonymous"></script>
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
            <div class="side-nav" style ="background: #cbf9ff;" >
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
                    
                    <!---dashbord start---->

                    <div class="row">
                        <div class="col-lg-3">
                            <div class="studentprofile">
                                <h3>Student Profile</h3>
                                <div class="studentprofileParent">
                                    <div class="parentsImg">
                                        <img src="../../pannel/academic/student/studentphoto" alt="">
                                    </div>
                                </div>
                                <div class="studentprofileParentName">
                                    <h4><?php echo $shget_Student['borno_school_student_name']; ?></span></h4>
                                    <h5>ID :<span> <?php echo $stdid; ?></span></h5>
                                    <h6>Class :<span> <?php echo $shget_class['borno_school_class_name']?></span></h6>
                                </div>
                                <div class="ParentprofileButton text-center">
                                    <a href="#" style="background-color: #1F8DDD; color: #fff;">View</a>
                                    <!-- <a href="">Edit</a> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="payment">
                                <h3>Next Payment</h3>
                                <div class="totalamount text-center">
                                    <p>Taka <span><?php echo $due_amount; ?></span></p>
                                </div>
                                <div class="fessdashbord">
                                    <!-- <div class="fessdashbordleft">
                                        <h4>Payment Type</h4>
                                        <h5>Tuition Fee</h5>
                                    </div> -->
                                    <!-- <div class="fessdashbordRight">
                                        <h4>Due Date</h4>
                                        <h5>23 March, 2019</h5>
                                    </div> -->
                                </div>
                                <div class="paymentbutton text-center">
                                    <a href="feesDashbord.php">Make Payment</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="attendance">
                                <h3>Attendence</h3>
                                <div id="donutchart" ></div>
                            </div>
                        </div>
                       
                        <div class="col-lg-3">
                            <div class="smsList">
                                <span>SMS List</span> <a href="#" class="viewButton">View all</a>
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
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12 col-lg-8">
                            <div class="calender protalcalender">
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
                        <div class="col-md-12 col-lg-4">
                            <div class="class-routine">
                                <h3>Class Routine</h3>
                                <div class="routineListmain">
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
                                                    <p>09:00</p>
                                                </div>
                                                <div class="subjectname">
                                                    <p>English</p>
                                                </div>
                                                <div class="backicon">
                                                    <a href="#"><img src="assets/images/arrow.png" alt=""></a>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="subjectroutineUp">
                                                <div class="subjecttime text-center">
                                                    <p>09:00</p>
                                                </div>
                                                <div class="subjectname">
                                                    <p>English</p>
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
                                                    <p>09:00</p>
                                                </div>
                                                <div class="subjectname">
                                                    <p>English</p>
                                                </div>
                                                <div class="backicon">
                                                    <a href="#"><img src="assets/images/arrow.png" alt=""></a>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="subjectroutineUp">
                                                <div class="subjecttime text-center">
                                                    <p>09:00</p>
                                                </div>
                                                <div class="subjectname">
                                                    <p>English</p>
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
                                                    <p>09:00</p>
                                                </div>
                                                <div class="subjectname">
                                                    <p>English</p>
                                                </div>
                                                <div class="backicon">
                                                    <a href="#"><img src="assets/images/arrow.png" alt=""></a>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="subjectroutineUp">
                                                <div class="subjecttime text-center">
                                                    <p>09:00</p>
                                                </div>
                                                <div class="subjectname">
                                                    <p>English</p>
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
                                                    <p>09:00</p>
                                                </div>
                                                <div class="subjectname">
                                                    <p>English</p>
                                                </div>
                                                <div class="backicon">
                                                    <a href="#"><img src="assets/images/arrow.png" alt=""></a>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="subjectroutineUp">
                                                <div class="subjecttime text-center">
                                                    <p>09:00</p>
                                                </div>
                                                <div class="subjectname">
                                                    <p>English</p>
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
                                                    <p>09:00</p>
                                                </div>
                                                <div class="subjectname">
                                                    <p>English</p>
                                                </div>
                                                <div class="backicon">
                                                    <a href="#"><img src="assets/images/arrow.png" alt=""></a>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="subjectroutineUp">
                                                <div class="subjecttime text-center">
                                                    <p>09:00</p>
                                                </div>
                                                <div class="subjectname">
                                                    <p>English</p>
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
                                                    <p>09:00</p>
                                                </div>
                                                <div class="subjectname">
                                                    <p>English</p>
                                                </div>
                                                <div class="backicon">
                                                    <a href="#"><img src="assets/images/arrow.png" alt=""></a>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="subjectroutineUp">
                                                <div class="subjecttime text-center">
                                                    <p>09:00</p>
                                                </div>
                                                <div class="subjectname">
                                                    <p>English</p>
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
                                                    <p>09:00</p>
                                                </div>
                                                <div class="subjectname">
                                                    <p>English</p>
                                                </div>
                                                <div class="backicon">
                                                    <a href="#"><img src="assets/images/arrow.png" alt=""></a>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="subjectroutineUp">
                                                <div class="subjecttime text-center">
                                                    <p>09:00</p>
                                                </div>
                                                <div class="subjectname">
                                                    <p>English</p>
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
    <script src="assets/js/vendors.min.js"></script>
    
    <!-- page js -->
    <!-- <script src="assets/vendors/chartjs/Chart.min.js"></script> -->
    <!-- <script src="assets/js/pages/dashboard-default.js"></script> -->

    <!-- Core JS -->
    <script src="assets/js/app.min.js"></script>
    <script src="assets/js/custom.js"></script>


   
   
   

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
    dayItems.innerHTML += "<li>" + (counter) + "</li>";
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

<script type="text/javascript" src="../../www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Task', 'Hours per month'],
      ['Absent',     11],
      ['Present',      10],
      
    ]);

    var options = {
      title: '',
      pieHole: 0.3,
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


<!-- Mirrored from css.odhyyon.com/ParentsPortal/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Jan 2022 06:20:50 GMT -->
</html>