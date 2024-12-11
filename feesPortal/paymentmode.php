<?php
ob_start();
	include('../connection.php');
	session_start();
	$studentid=$_SESSION['studentid'];
//	$branchid=$_SESSION['branchid'];
		if($studentid== "")
	{
	   $message = 'Student ID doesnot Exist.';
                                
                                echo "<SCRIPT> 
                                alert('$message')
                                window.location.replace('index.php');
                                </SCRIPT>";
	}

?>


<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
  <body>
      <div class="container login-container">
           <div class="row">
                <div class="col-md-12" style="margin-left: 30%;margin-top: 15%;">
      <div class="row">
          <div class="form-group">
              <img alt="Rocket" src="mlogo.png"  />  
               <a href="feesPaymentWithdbbl.php" class="btn btn-primary">Pay With DBBL Rocket</a>
          </div>
          
      </div>
            <div class="row">
          <div class="form-group">
              <img alt="spg" src="sonali-bank-logo.jpg" style="width: 25%;" />  
              <a href="feesPaymentWithspg.php" class="btn btn-success">Pay With Sonali Bank</a>
          </div>
          
      </div>
    
    </div>
    </div>
    </div>
  </body>  
    

</html>