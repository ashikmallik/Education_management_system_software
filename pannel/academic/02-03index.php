<?php require_once('academic_top.php');?>
<!DOCTYPE html>
<html>
<head>
	<title> [:: Academic Pannel ::] </title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
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
			<a href="../index.php"><img src="assets/images/logo.jpg" class="img-fluid"></a>
		</div>
	</div><!-- side bar end -->

	<div class="main_content">
		<div class="admin_logout">
			<div class="admin_head">
				<h3><?php echo $shget_schoolName['borno_school_name']; ?></h3>
			</div>
			<div class="log_out">
				<a href="../logout.php"><img src="assets/images/logout.jpg" class="img-fluid"></a>
			</div>
		</div><!-- Admin and logout part end -->

		<div class="main_body">
			<div class="main_item">
				<ul>
					<li><a href="infosett/information_pannel.php"><img src="assets/images/others.jpg"><p>Information Settings</p></a></li>
                    <li><a href="teacher/teacher_pannel.php"><img src="assets/images/teacherinfo.jpg"><p>Teacher Info</p></a></li>
					<li><a href="student/student_pannel.php"><img src="assets/images/studentinfo.jpg"><p>Student Info</p></a></li> 
                    <li><a href="result_settings/result_settings.php"><img src="assets/images/result-settings.jpg"><p>Result Settings</p></a></li>
                    <li><a href="result/result_pannel.php"><img src="assets/images/result.jpg"><p>Result Info</p></a></li>
                    <li><a href="others/others_info.php"><img src="assets/images/result-report.jpg">
                    <p>Others</p></a></li>
                    
                    <li><a href="college/index.php"><img src="assets/images/college.jpg">
                    <p>College</p></a></li>
                    
                    <li><a href="vocational/index.php"><img src="assets/images/vocational.jpg">
                    <p>Vocational</p></a></li>
                  
                    <li><a href="modeltest/index.php"><img src="assets/images/modeltest.jpg">
                    <p>Model Test</p></a></li>
                    <li><a href="#"><img src="assets/images/btn-attendance.jpg">
                    <p>Attendance</p></a></li>
                    
				</ul>
                
               
			</div>
		</div><!-- Main Body part end -->
	</div><!-- Main Content end -->
</div>

<!--Script part-->
<script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
</body>
</html>