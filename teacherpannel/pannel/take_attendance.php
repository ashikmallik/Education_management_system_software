<?php
error_reporting(0);
//ob_start();
include('config.php');
if(empty($teacherid)){
    session_destroy();
header("location:../index.php");
}



$gettecherinfo = "SELECT ct.`borno_school_section_id`,ct.`borno_school_class_id`,ct.`borno_school_shift_id`,`borno_school_session` FROM `borno_set_class_teacher` AS ct
INNER JOIN `borno_teacher_info` AS ti ON ti.borno_teacher_info_id = ct.borno_school_teacher_id
INNER JOIN `borno_school_class` AS sc ON sc.borno_school_class_id = ct.borno_school_class_id
INNER JOIN `borno_school_shift` AS ss ON ss.borno_school_shift_id = ct.borno_school_shift_id
INNER JOIN `borno_school_section` AS sse ON sse.borno_school_section_id = ct.borno_school_section_id
WHERE `borno_school_teacher_id` = '$teacherid'";
	$qgettecherinfo =$mysqli->query($gettecherinfo);
	$sqgettecherinfo=$qgettecherinfo->fetch_assoc();

    $stdclass = $sqgettecherinfo['borno_school_class_id'];
    $shift = $sqgettecherinfo['borno_school_shift_id'];
 	$section=$sqgettecherinfo['borno_school_section_id'];
	$stsess=trim($sqgettecherinfo['borno_school_session']);



?>
<script language="javascript">
	function callpage()
	{
	 document.frmcontent.action="take_attendance.php";
	 document.frmcontent.submit();
	}
	
	
	
</script>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Attendance Panel</title>

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
                                    <h3>Take Attendance</h3>
                                   </div>
                                    
                                </div>
                                <div class="col-lg-8">
                                    <center>
                                <form name="frmcontent" action="take_attendance_do.php"  method="post" enctype="multipart/form-data" id="myform">
                                    
      
                                         
					  	     
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
                                
                                <div class="table-responsive newRequestTable headerFixTable">
                                    <table id="data-table" class="table table-striped">
                                        <thead class="tableHead">
                                          <tr>
                                            <th scope="col" align="center">Student Name</th>
                                            <th scope="col" align="center">Roll No</th>
                                            <th scope="col" align="center">Absent Entry</th>
                                          </tr>
                                        </thead>
                                        <tbody>
  <?php
  	 

	if($section!="" and $stsess!=""){
	
$gtstudent="select * from borno_student_info where  borno_school_section_id='$section' AND borno_school_session='$stsess' order by borno_school_roll asc";
	
	$qgtstudent=$mysqli->query($gtstudent);
	$sl=0;
	while($shgtstudent=$qgtstudent->fetch_assoc()){ $sl++;
	

	
  
  ?>
   <tr>
    <td><?php echo stripslashes($shgtstudent['borno_school_student_name']); ?></td>
    <td><?php echo $shgtstudent['borno_school_roll']; ?></td>
    <input type="hidden" name="studId[]" id="studId[]" value="<?php echo $shgtstudent['borno_student_info_id']; ?>">
    <td><input class="chk" type="checkbox" name="stdid[]" id="stdid[]" value="<?php echo $shgtstudent['borno_student_info_id'];?>"></td>
     
  </tr>
                              
      
  <?php 
	    
	 } 
	}
  ?> 
   <tr>
       
    <td colspan="8" align="center">
        <input type="hidden" name="studClass" id="studClass" value="<?php echo $stdclass; ?>">
        <input type="hidden" name="shiftId" id="shiftId" value="<?php echo $shift; ?>">
        <input type="hidden" name="section" id="section" value="<?php echo $section; ?>">
        <input type="hidden" name="stsess" id="stsess" value="<?php echo $stsess; ?>">
        <input type="hidden" name="teacherid" id="teacherid" value="<?php echo $teacherid; ?>">
        <input type="submit" name="button" id="button" value="Save"></td>
    </tr>
                                          
                                        </tbody>
                                      </table>
    </form>                                 
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


</body>



</html>