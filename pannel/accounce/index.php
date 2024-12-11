<?php require_once('accounce_top.php');?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title> [:: Academic Pannel ::] </title>
	<link rel="stylesheet" type="text/css" href="../academic/assets/css/style.css">
	<!-- Meta tag -->
	
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
</head>
<body>

<div class="wrapper">
	<div class="side_main_menu">
		<div class="top_part_menu">
			
		</div>
		<div class="fixed_logo">
			<a href="../index.php"><img src="../academic/assets/images/logo.jpg" class="img-fluid"></a>
		</div>
	</div><!-- side bar end -->

	<div class="main_content">
		<div class="admin_logout">
			<div class="admin_head">
				<h3>Accounce [<?php echo $shget_schoolName['borno_school_name']; ?>]</h3>
			</div>
			<div class="log_out">
				<a href="../logout.php"><img src="../academic/assets/images/logout.jpg" class="img-fluid"></a>
			</div>
		</div><!-- Admin and logout part end -->

		<div class="main_body">
			<div class="main_item">
				<ul>
					<li><a href="../academic/student/student_pannel.php"><img src="../academic/assets/images/studentinfo.jpg"><p>Student Info</p></a></li> 
					 <li><a href="fees_setup/dashboard.php"><img src="../academic/assets/images/result-settings.jpg"><p>Fees</p></a></li>
                    <!--<li><a href="accounce_settings/accounce_settings.php"><img src="../academic/assets/images/result-settings.jpg"><p>Accounce Settings</p></a></li>-->
                    <!--<li><a href="transection/transection_pannel.php"><img src="../academic/assets/images/transaction.jpg"><p>Student Transection</p></a></li>-->
                    <li><a href="bank/bank_pannel.php"><img src="../academic/assets/images/220px-বাংলাদেশ_ব্যাংকের_প্রতীক.svg.png"><p>Bank Transection</p></a></li>                    
                    <li><a href="expence/expence_pannel.php"><img src="../academic/assets/images/Expenses.jpg"><p>Expence</p></a></li>
                    <li><a href="other_income/other_income_pannel.php"><img src="../academic/assets/images/other income.jpg"><p>Other Income</p></a></li>                    
                    <li><a href="report/report_pannel.php"><img src="../academic/assets/images/result-report.jpg">
                    <p>Report</p></a></li>
                    
                    
                    
				</ul>
                
               
			</div>
		</div><!-- Main Body part end -->
	</div><!-- Main Content end -->
</div>

<!--Script part-->
<script type="text/javascript" src="../academic/assets/js/jquery-3.2.1.min.js"></script>
</body>
</html>