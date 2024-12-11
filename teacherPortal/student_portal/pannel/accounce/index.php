<?php require_once('accounce_top.php');?>
<!DOCTYPE html>
<html>
<head>
	<title> [:: Academic Pannel ::] </title>
	<link rel="stylesheet" type="text/css" href="../academic/assets/css/style.css">
	<!-- Meta tag -->
	<meta charset="utf-8">
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
				<h3>Accounce [<?php echo $shget_schoolName['borno_school_student_name']; ?>]</h3>
			</div>
			<div class="log_out">
				<a href="../logout.php"><img src="../academic/assets/images/logout.jpg" class="img-fluid"></a>
			</div>
		</div><!-- Admin and logout part end -->

		<div class="main_body">
			<div class="main_item">
				<ul>
                    <li><a href="expence/expence_pannel.php"><img src="../academic/assets/images/Expenses.jpg"><p>Payment History</p></a></li>
                    <li><a href="other_income/other_income_pannel.php"><img src="../academic/assets/images/other income.jpg"><p>Due Report</p></a></li>                    
               
                    
                    
				</ul>
                
               
			</div>
		</div><!-- Main Body part end -->
	</div><!-- Main Content end -->
</div>

<!--Script part-->
<script type="text/javascript" src="../academic/assets/js/jquery-3.2.1.min.js"></script>
</body>
</html>