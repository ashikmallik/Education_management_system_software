<?php
error_reporting(0);
//ob_start();
include('config.php');
//listView();
echo '<script type="text/javascript">    
listView()      
</script>';
?>

<script language="javascript">
	function callpage()
	{
	 document.frmcontent.action="view_calender.php";
	 document.frmcontent.submit();
	 
	}
	
  function calenderView(){
  var x = document.getElementById("list");
  var y = document.getElementById("calender");
//   if (x.style.display === "none") {
//     x.style.display = "block";
//   } else {
    x.style.display = "none";
    y.style.display = "block";
 // }
  }	
    
    function listView(){
       var x = document.getElementById("calender");
       var y = document.getElementById("list");
//   if (x.style.display === "none") {
//     x.style.display = "block";
//   } else {
    x.style.display = "none";
    y.style.display = "block";
 // } 
  }
  
	
</script>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Calender Panel</title>

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
                        <div class="col-lg-12">
                            <div class="fessPayment">
                                <div class="requestTable">
                                   <div class="requestTableHead">
                                    <h3>View Calender</h3>
                                   </div>
                                    
                                </div>
                                <div class="col-lg-8">
                                    <center>
                                <form name="frmcontent"  method="post" enctype="multipart/form-data" id="myform">
                                    
                                   <div class="form-group row">
                                              <label  class="col-sm-6 col-form-label">Academic Year</label>
                                              <div class="col-sm-6">
                                                <select name="yearid" id="yearid" class="form-control" onChange="callpage();" >
                                                  <option value=""> SELECT </option>
                                                                                  <?php                                       
										
										$getyearid="select * from academic_year";
		
		
		$qgetyearid=$mysqli->query($getyearid);
		while($shqgetyearid=$qgetyearid->fetch_assoc()){
										
										 
                                    ?>
                                <option value=" <?php echo $shqgetyearid['academic_year_id']; ?>" <?php if($shqgetyearid['academic_year_id']==$_REQUEST['yearid']) { echo "selected"; }  ?>> <?php echo $shqgetyearid['year_name']; ?></option>
                                <?php } ?>
                                                </select>
                                              </div>
                                            </div>
                                    <div class="form-group row">
                                              <label  class="col-sm-6 col-form-label">Month</label>
                                              <div class="col-sm-6">
                                                <select name="monthid" id="monthid" class="form-control" onChange="callpage();" >
                                                  <option value=""> SELECT </option>
                                                                                  <?php  
                                                    $getyearid= $_REQUEST['yearid'];                              
										
										$getmonthid="select * from academic_year_details WHERE `academic_year_id` = '$getyearid'";
		
		
		$qgetmonthid=$mysqli->query($getmonthid);
		while($shqgetmonthid=$qgetmonthid->fetch_assoc()){
										
										 
                                    ?>
                                <option value=" <?php echo $shqgetmonthid['month_id']; ?>" <?php if($shqgetmonthid['month_id']==$_REQUEST['monthid']) { echo "selected"; }  ?>> <?php echo $shqgetmonthid['month_name']; ?></option>
                                <?php } ?>
                                                </select>
                                              </div>
                                            </div>
                                   <div class="form-group row">
                                              <label  class="col-sm-6 col-form-label">Category</label>
                                              <div class="col-sm-6">
                                                <select name="category" id="category" class="form-control"  onChange="callpage();">
                                                  <option value=""> SELECT </option>
                                                  <option value="Student" <?php if($_REQUEST['category'] == "Student"){ echo "selected"; }?>> Student </option>
                                                  <option value="Teacher" <?php if($_REQUEST['category'] == "Teacher"){ echo "selected"; }?>> Teacher </option>
                                                  <option value="Staff" <?php if($_REQUEST['category'] == "Staff"){ echo "selected"; }?>> Staff </option>
                                                  
                                                </select>
                                              </div>
                                            </div>
                                         
					  	     
				<!--</form>  -->
					</center>
					
					  	</div>

                                <!--<div class="RequestSearch">-->
                                  
                                <!--        <div class="reqSeach">-->
                                <!--            <input type="text" class="form-control" placeholder="Search Request">-->
                                <!--        </div>-->
                                <!--        <div class="reqSeach datereq">-->
                                <!--            <input type="text" class="form-control" placeholder="Search Date">-->
                                <!--        </div>-->
                                <!--        <div class="reqSeach statusReq">-->
                                <!--            <input type="text" class="form-control" placeholder="Search Status">-->
                                <!--        </div>-->
                                   
                                <!--</div>-->
                                <div>
                                    <button type="button" class="btn btn-primary" style="float: right; margin-left: 4px;" onclick="calenderView()">Calender View</button>
                                    <button type="button" class="btn btn-primary" style="float: right;" onclick="listView()">List View</button>
                                    
                                </div>
                                <div class="table-responsive newRequestTable headerFixTable" id="list">
                                    
                                    <table id="data-table" class="table">
                                        <thead class="tableHead">
                                          <tr>
                                            <th scope="col" align="center">Day</th>
                                            <th scope="col" align="center">Day Type</th>
                                            <th scope="col" align="center">Holiday Remarks</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                                                          <?php
                                
                                    
           $year_id = $_REQUEST['yearid'];
           $month_id = $_REQUEST['monthid'];
	        $cetagory = $_REQUEST['category'];
  		$gtfeeshead="SELECT * FROM `academic_calender_details` WHERE `academic_year_id` ='$year_id' AND `month_id` ='$month_id' AND `cetagory` = '$cetagory' ";
		$sl=0;
		$qgtfeeshead=$mysqli->query($gtfeeshead);
		while($shgtfeeshead=$qgtfeeshead->fetch_assoc()){
		
		$sl++;
  

  ?>
  
   <tr style="background-color: <?php echo $shgtfeeshead['holiday_color'];?>; color:<?php if($shgtfeeshead['holiday_type']=="Holiday") {echo "#ffffff";} else {echo "#000000";}?>" >
    <td><?php echo $shgtfeeshead['day_name'].",".$shgtfeeshead['month_short_name']." ".$shgtfeeshead['day'].",".$shgtfeeshead['year']; ?></td>
    <td><?php echo $shgtfeeshead['holiday_type'];?></td>
    <td><?php echo $shgtfeeshead['holiday_remarks'];?></td>
  </tr>
                              
      
  <?php } ?> 
                                          
                                        </tbody>
                                      </table>
    </form>                                 
                                  </div>
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
                                
                                   <!---Request Modal----
                                   
                                  
                                  <!---Reques Modal---->
                                  
                                  
                            </div>
                        </div>
                    </div>
                    <!----------------Content Start---------------->
                </div>
                <!-- Content Wrapper END -->

                <!-- Footer START -->
                    <div class="footer-content">
                        <p class="m-b-0">Copyright ©2020 bornoSKY. All rights reserved.</p>
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

    <!-- Core JS -->
    <script src="assets/js/app.min.js"></script>

<!--<script type="text/javascript">
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

$(document).ready(function(){	
	$("#ticketForm").submit(function(event){
		submitForm();
		return false;
	});
});
function submitForm(){
	 $.ajax({
		type: "POST",
		url: "support_do.php",
		cache:false,
		data: $('form#ticketForm').serialize(),
		success: function(response){
			$("#ticketForm").html(response)
			$("#contact-modal").modal('hide');
		},
		error: function(){
			alert("Error");
		}
	});
}
    
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