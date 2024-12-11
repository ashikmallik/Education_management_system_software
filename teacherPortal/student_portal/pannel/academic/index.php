<?php require_once('academic_top.php');?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title> [:: Academic Pannel ::] </title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
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
			<a href="../index.php"><img src="assets/images/logo.jpg" class="img-fluid"></a>
		</div>
	</div><!-- side bar end -->

	<div class="main_content">
		<div class="admin_logout">
			<div class="admin_head">
				<h3>Student Pannel [<?php echo $shget_schoolName['borno_school_student_name']; ?>]</h3>
			</div>
			<div class="log_out">
				<a href="../logout.php"><img src="assets/images/logout.jpg" class="img-fluid"></a>
			</div>
		</div><!-- Admin and logout part end -->

		<div class="main_body">
			<div class="main_item">
				<ul>
					<li><a href="student/student_pannel.php"><img src="assets/images/studentinfo.jpg"><p>My Profile</p></a></li> 
                    <li><a href="result/result_pannel.php"><img src="assets/images/result.jpg"><p>Result</p></a></li>
                    <li><a href="others/others_info.php"><img src="assets/images/result-report.jpg"><p>Attendance</p></a></li>
                    <li><a href="classroutine/others_info.php"><img src="assets/images/result-report.jpg"><p>Class Routine</p></a></li>

				</ul>
                
               
			</div>
		</div><!-- Main Body part end -->
	</div><!-- Main Content end -->
</div>

<!--Script part-->
<script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
</body>
</html>