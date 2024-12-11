<?php
error_reporting(0);
//ob_start();
include('config.php');
?>


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
                              
                            
                                <div class="calender protalcalender" id="calender">
                               
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


<script>

 var attn = '';
//     fetch("get_remarks.php")
//           .then((res) => res.json())
//           .then((data) => {
//               var result = JSON.stringify(data);
//               attn = data;
//              // result.textContent=JSON.stringify(data);
//             //  console.log(attn);
//                     // console.log(data[1].day);

          

//           });
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
async function days(x) {
  'use strict';
  dayItems.innerHTML = "";
  
  monthes = monthes + x;
   
  
                 attn = await fetch("get_remarks.php")
                 .then((res) => res.json())
                 .then((data) => data)
               //  console.log(attn);
  
//let abc = await getattStatus(monthes, years);
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
  
//   console.log(monthes);
//  console.log(abc);
  /////////////////////////////////////////////////
  yearDiv.innerHTML = years;
  monthDiv.innerHTML = monthNames[monthes];
  for (i = 0; i <= dayOfFirstDateOfMonth; i = i + 1) {
    if (dayOfFirstDateOfMonth === 6) { break; }
    dayItems.innerHTML += "<li> - </li>";
  }
  for (counter = 1; counter <= lastDayOfMonth; counter = counter + 1) {
      
    // for(z=0; z < abc.length; z=z+1){
        
    //   let  uv=abc[z].holiday_type;
    //   let   cd = abc[z].day;
        
    //     if(cd==counter){
    //     dayItems.innerHTML += "<li><h6> " + (counter) + "</h6><p>" + uv + "</p></li>";
    //     }
    // }
    
//  let p = abc[counter].day;
//   //  console.log(p);
//   if(p==counter){
      dayItems.innerHTML += "<li style=background-color:" + getcolor(counter, monthes+1, years) + ";><h6 style='color:" + getdateandremarkcolor(counter, monthes+1, years) + ";'>" + (counter) + "</h6><p style='color:" + getdateandremarkcolor(counter, monthes+1, years) + ";'>" + getattStatus(counter, monthes+1, years) + "</p></li>"; 
      console.log(getcolor(counter, monthes+1, years))
//   }
//     else{
  //      dayItems.innerHTML += "<li><h6> " + (counter) + "</h6></li>";
//     }    
        
    
      
    
    
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


//var attnsat ='';

        //   async function getattStatus(day, month, year) {
        //         var Status = '';
        //         var Status1 = '';
                
        //       attnsat = await fetch("get_calender_details.php?day="+day+"&month="+month+"&year="+year)
        //          .then((res) => res.json())
        //          .then((data) => data)
        //  // console.log(Status1);
        //   Status = attnsat.dayType;
        //  //  console.log(attnsat);
        //  //  console.log(Status);
        //       return Status;    
        //     }
        //       async function getattStatus(month, year) {
        //         var Status = '';
        //         var Status1 = '';
                
        //       attnsat = await fetch("get_calender_details.php?month="+month+"&year="+year)
        //          .then((res) => res.json())
        //          .then((data) => data)
        // //  console.log(data);
        //   Status = attnsat;
        //   //console.log(attnsat);
        //  //  console.log(Status);
        //       return Status;     
        //     } 
            
                function getattStatus(day, month, year) {
                var Status = '';
                for (var i = 0; i < attn.length; i++) {
                    var sDate = attn[i].day;
                    var sM = attn[i].month_id;
                    var sY = attn[i].year;
                   // console.log(sDate);
                    // if (sDate.getMonth() == 2 && day == 5) {
                    //     // console.log(sDate.getMonth());
                    // }



                    if (sM == month && sY == year && sDate== day) {
                      //  console.log(month)
                        if (attn[i].holiday_type == 'Holiday'){
                            if(attn[i].holiday_remarks ==''){
                               Status = 'Holiday'; 
                            }
                            else{
                                Status = attn[i].holiday_remarks;
                            }
                        }
                        else if(attn[i].holiday_type == 'Long Holiday'){
                        if(attn[i].holiday_remarks ==''){
                               Status = 'Long Holiday'; 
                            }
                            else{
                                Status = attn[i].holiday_remarks;
                            }
                        }
                        else{
                            Status = 'Regular';
                        }
                            
                    //     else if (attn[i].DayStaus == 'P')
                    //         Status = 'Present'
                    //     else if (attn[i].DayStaus == 'H')
                    //         Status = attn[i].HolidayName;
                    //     else if (attn[i].DayStaus == 'W')
                    //         Status = attn[i].DayType;
                     }
        
                     // console.log(Status);
                  }

                return Status;
            }  
            
            function getcolor(day, month, year) {
                var Color = '';
                for (var i = 0; i < attn.length; i++) {
                    var sDate = attn[i].day;
                    var sM = attn[i].month_id;
                    var sY = attn[i].year;
                   // console.log(sDate);
                    // if (sDate.getMonth() == 2 && day == 5) {
                    //     // console.log(sDate.getMonth());
                    // }



                    if (sM == month && sY == year && sDate== day) {
                      //  console.log(month)
                        if (attn[i].holiday_type == 'Holiday'){

                                Color = attn[i].holiday_color;
                            }
                        else if (attn[i].holiday_type == 'Long Holiday'){

                                Color = attn[i].holiday_color;
                            }    
                        else{
                            Color = '#ffffff';
                        }
                        }

                            
                    //     else if (attn[i].DayStaus == 'P')
                    //         Status = 'Present'
                    //     else if (attn[i].DayStaus == 'H')
                    //         Status = attn[i].HolidayName;
                    //     else if (attn[i].DayStaus == 'W')
                    //         Status = attn[i].DayType;
                     }
                         return Color;
                     // console.log(Status);
                  }
            function getdateandremarkcolor(day, month, year) {
                var Color = '';
                for (var i = 0; i < attn.length; i++) {
                    var sDate = attn[i].day;
                    var sM = attn[i].month_id;
                    var sY = attn[i].year;
                   // console.log(sDate);
                    // if (sDate.getMonth() == 2 && day == 5) {
                    //     // console.log(sDate.getMonth());
                    // }



                    if (sM == month && sY == year && sDate== day) {
                      //  console.log(month)
                        if (attn[i].holiday_type == 'Holiday' || attn[i].holiday_type == 'Long Holiday'){

                                Color = '#ffffff';
                            }
                        else{
                            Color = '#2a2a2a';
                        }
                        }

                            
                    //     else if (attn[i].DayStaus == 'P')
                    //         Status = 'Present'
                    //     else if (attn[i].DayStaus == 'H')
                    //         Status = attn[i].HolidayName;
                    //     else if (attn[i].DayStaus == 'W')
                    //         Status = attn[i].DayType;
                     }
                         return Color;
                     // console.log(Status);
                  }

            //    return Color;
           // } 

//end
 </script>
</body>



</html>