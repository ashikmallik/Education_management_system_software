<?php require_once('academic_top.php');

if($userid ==""){
    session_destroy();
}


	$query="SELECT * FROM `borno_set_class_teacher` WHERE `borno_school_teacher_id`='$teacherid'";

								
									$rsquery =$mysqli->query($query);								

									$result=$rsquery->fetch_assoc();

									$class=$result['borno_school_class_id'];
								
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title> [:: Teacher Portal ::] </title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<!-- Meta tag -->
	
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
</head>
<body>

<div class="">
	<div class="side_main_menu">
		<div class="top_part_menu">
			
		</div>
		<div class="fixed_logo">
			<a href="../index.php"><img src="../../../amarEskul.jpg" class="img-fluid"></a>
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
					<?php
					
					if($userid == "Amir"){
					?>
                    <li><a href="teacher/teacher_pannel.php"><img src="assets/images/teacherinfo.jpg"><p>Teacher Info</p></a></li>
					<li><a href="student/student_pannel.php"><img src="assets/images/studentinfo.jpg"><p>Student Info</p></a></li> 
                    <li><a href="result_settings/result_settings.php"><img src="assets/images/result-settings.jpg"><p>Result Settings</p></a></li>
                    <li><a href="result/result_pannel.php"><img src="assets/images/result.jpg"><p>Result Info</p></a></li>
                    <li><a href="others/others_info.php"><img src="assets/images/result-report.jpg">
                    <p>Others</p></a></li>
                    <li><a href="college/index.php"><img src="assets/images/college.jpg">
                    <p>College</p></a></li>
                    
                    <li><a href="fees/report_pannel.php"><img src="assets/images/other income.jpg">
                    <p>Fees</p></a></li>
                  	<?php
					}
					elseif($userid == "Fahad"){
					?>
                    <li><a href="teacher/teacher_pannel.php"><img src="assets/images/teacherinfo.jpg"><p>Teacher Info</p></a></li>
					<li><a href="student/student_pannel.php"><img src="assets/images/studentinfo.jpg"><p>Student Info</p></a></li> 
                    <li><a href="result_settings/result_settings.php"><img src="assets/images/result-settings.jpg"><p>Result Settings</p></a></li>
                    <li><a href="result/result_pannel.php"><img src="assets/images/result.jpg"><p>Result Info</p></a></li>
                    <li><a href="others/others_info.php"><img src="assets/images/result-report.jpg">
                    <p>Others</p></a></li>
                    <!--<li><a href="college/index.php"><img src="assets/images/college.jpg">-->
                    <!--<p>College</p></a></li>-->
                    
                    <li><a href="fees/report_pannel.php"><img src="assets/images/other income.jpg">
                    <p>Fees</p></a></li>
                  	<?php
					}
					elseif($userid == "Mintu"){
					?>
					<li><a href="student/student_pannel.php"><img src="assets/images/studentinfo.jpg"><p>Student Info</p></a></li> 
                    <li><a href="fees/report_pannel.php"><img src="assets/images/other income.jpg">
                    <p>Fees Reports</p></a></li>
                  	<?php
					}
					else{
					    
					?>
                      
					<li><a href="student/student_report.php"><img src="assets/images/studentinfo.jpg"><p><?php echo $teacherid; ?>Student Info</p></a></li> 
				<?php if($class == 1 OR $class == 2 ) { ?>
     <!--               <li><a href="result_settings/set_3rd_4th_subject.php"><img src="assets/images/result-settings.jpg"><p>Result Settings</p></a></li>-->
                   <?php } ?>
                    <li><a href="result/result_pannel.php"><img src="assets/images/result.jpg"><p>Result Info</p></a></li>
                    <li><a href="fees/report_pannel.php"><img src="assets/images/other income.jpg">
                    <p>Fees</p></a></li>
                    <li><a href="change_password.php"><img src="assets/images/result-settings.jpg">
                    <p>Change Password</p></a></li>
                                 	<?php
					}
				
					?>
				</ul>
                
               
			</div>
		</div><!-- Main Body part end -->
	</div><!-- Main Content end -->
</div>

<!--Script part-->
<script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
</body>
</html>