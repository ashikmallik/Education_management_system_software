<?php 
include('../connection.php');
$memo=$_REQUEST['memo'];
		if(!empty($memo)){
		echo "<SCRIPT> 
        window.open('download_memo_half.php?memo=$memo').attr('target', '_blank');
        </SCRIPT>";
		}
?>


<?php
error_reporting(0);
//ob_start();


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
    
    <style>
    
    .login-container{
    margin-top: 5%;
    margin-bottom: 5%;
}
.login-form-1{
    padding: 5%;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-1 h3{
    text-align: center;
    color: #333;
}
.login-form-2{
    padding: 5%;
    background: #0062cc;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-2 h3{
    text-align: center;
    color: #fff;
}
.login-container form{
    padding: 10%;
}
.btnSubmit
{
    width: 50%;
    border-radius: 1rem;
    padding: 1.5%;
    border: none;
    cursor: pointer;
}
.login-form-1 .btnSubmit{
    font-weight: 600;
    color: #fff;
    background-color: #0062cc;
}
.login-form-2 .btnSubmit{
    font-weight: 600;
    color: #0062cc;
    background-color: #fff;
    margin-left: 25%;
}
.login-form-2 .ForgetPwd{
    color: #fff;
    font-weight: 600;
    text-decoration: none;
}
.login-form-1 .ForgetPwd{
    color: #0062cc;
    font-weight: 600;
    text-decoration: none;
}

    
</style>
    


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
                         <h4 style="margin-left: 28%;color: mediumvioletred;font-weight: bold;">Azimpur Government Girls' School And College</h4>
                         <h5 style="margin-left: 38%;color: darkgreen;font-weight: bold;">49/E,Azimpur, Dhaka-1205</h5>
                         <h6 style="margin-left: 35%;color: red;">Website: www.aggsc.edu.bd, EIIN:108163</h6>
                                

<div class="modal-content">

		      	<!-- Modal Header -->
		      	<!--<div class="modal-header">-->
			      <!--  <h4 class="modal-title"></h4>-->
			      <!--  <button type="button" class="close" data-bs-dismiss="modal">&times;</button>-->
		      	<!--</div>-->

		      	<!-- Modal body -->
		      	<div class="modal-body">
		     
			   <div class="col-md-6 login-form-2" style="margin: auto;">
                    <h3>Download Application</h3>
                    <form action="individual_print_app_form.php" method="post" enctype="multipart/form-data" > 
                    <!--login_action.php-->
                        <div class="form-group">
                            <input type="text" id="sid" name="sid" class="form-control" placeholder="Enter your SSC roll number" value=""/>
                        </div>
                       
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Submit" />
                        </div>
                      
                    </form>
                </div>


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
