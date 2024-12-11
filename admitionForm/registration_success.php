<?php
error_reporting(0);
//ob_start();
include('db_contection.php');


$cheksl ="SELECT `sl_no` FROM `sirat_app_info` ORDER BY `sl_no` DESC LIMIT 1";
$qcheksl=$mysqli->query($cheksl);
$shqcheksl=$qcheksl->fetch_assoc();

if(empty($shqcheksl['sl_no'])){
    
    $sl = 23001;
}
else{
    
   $sl =  $shqcheksl['sl_no'];
   $sl = $sl+1;
}

//echo $sl;


?>

<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Admin Zone</title>

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

            <div class="page-container">
                

                <!-- Content Wrapper START -->

                    <!----------------Content Start----------------->
                   
 <div class="row">
                        <div class="col-lg-8" style="margin-left: 15%;">
                           
                          
                            <div class="fessPayment">
                         <h5 style="margin-left: 22%;color: mediumvioletred;font-weight: bold;">"পড়ো তোমার প্রভুর নামে যিনি তোমাকে সৃষ্টি করেছেন"</h5>
                         <h1 style="margin-left: 20%;color: darkgreen;font-weight: bold;">সিরাত পাঠ ও প্রতিযোগিতা - ২০২৩</h1>
                         <h2 style="margin-left: 19%;color: red;">রেজিস্ট্রেশনের শেষ তারিখ : ৩০ সেপ্টেম্বর ২০২৩</h2>
                                <div class="requestTable">
                                   <div class="requestTableHead">
                                  
                                   </div>
                                </div>

<div class="modal-content">

		      	<!-- Modal Header -->
		      	<!--<div class="modal-header">-->
			      <!--  <h4 class="modal-title"></h4>-->
			      <!--  <button type="button" class="close" data-bs-dismiss="modal">&times;</button>-->
		      	<!--</div>-->

		      	<!-- Modal body -->
		      	<div class="modal-body">
		        	<form action="registration_store.php" method="post" enctype="multipart/form-data" id="add-form">
		        	    <div class="form-group row">
                                              <label  class="col-sm-3 col-form-label"></label>
                                              <div class="col-sm-8">
                                       <h4 style="color: green;font-weight: bold;">জাজাকাল্লাহ,
আপনার আবেদন সফল হয়েছে</h4>
                                              </div>
                                            </div>

					 <a href="registration_form.php">আরো আবেদন করতে চাইলে এখানে ক্লিক করুন</a>
					</form>


		      	</div>

		    </div>
                                   <!---Request Modal---->
                                   <!-- The Modal -->
	
                                   
                                  
                                  <!---Reques Modal---->
                                  
                                  
                            </div>
                           
                        </div>
                    </div>
                  
                    <!----------------Content Start---------------->
                </div>


            </div>

        </div>
    </div>

    
    <!-- Core Vendors JS -->
    <script src="assets/js/vendors.min.js"></script>

    <!-- Core JS -->
    <script src="assets/js/app.min.js"></script>


</body>



</html>