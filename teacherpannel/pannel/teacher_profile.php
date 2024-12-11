<?php
error_reporting(0);
//ob_start();
include('config.php');
//$schId = 1;

if(empty($teacherid)){
    session_destroy();
header("location:../index.php");
}


$gettecherinfo = "SELECT ti.*,`borno_school_class_name`,`borno_school_shift_name`,`borno_school_section_name` FROM `borno_set_class_teacher` AS ct
INNER JOIN `borno_teacher_info` AS ti ON ti.borno_teacher_info_id = ct.borno_school_teacher_id
INNER JOIN `borno_school_class` AS sc ON sc.borno_school_class_id = ct.borno_school_class_id
INNER JOIN `borno_school_shift` AS ss ON ss.borno_school_shift_id = ct.borno_school_shift_id
INNER JOIN `borno_school_section` AS sse ON sse.borno_school_section_id = ct.borno_school_section_id
WHERE `borno_school_teacher_id` = '$teacherid'";
	$qgettecherinfo =$mysqli->query($gettecherinfo);
	$sqgettecherinfo=$qgettecherinfo->fetch_assoc();
   
   $teacherImage = $sqgettecherinfo['borno_teacher_photo'];
   
   
   

?>


<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Teacher Portal</title>

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
                       <!--<div class="row">-->
                       <div class="col-lg-3">
                           <div class="studentprofileInf">
                               <div class="profileimage text-center">
                                   <img src="../../pannel/academic/teacher/teacherphoto/<?php echo $teacherImage; ?>" alt="">
                               </div>
                               <div class="profilinfName text-center">
                                   <h4><?php echo $sqgettecherinfo['borno_teacher_name']; ?></h4>
                                   <p><span>Teacher ID</span><?php echo $sqgettecherinfo['borno_teachers_id']; ?></p>
                               </div>
                               <!---profilename and image End-->


                               <div class="studentclassinf">
                                <!-----information ClassWise----->
                                <div class="stuinfomain">
                                    <div class="studentclasssinfopartr1">
                                     <h4>Version</h4>
                                     <h5>Bangla</h5>
                                    </div>
                                    <div class="studentclasssinfopartr2">
                                     <h4>Class Teacher</h4>
                                     <h5><?php echo $sqgettecherinfo['borno_school_class_name']."(".$sqgettecherinfo['borno_school_section_name'].")"; ?></h5>
                                   </div>
                                </div>
                               
                                <div class="stuinfomain">
                                    <div class="studentclasssinfopartr1">
                                        <h4>Subject Teacher</h4>
                                        <h5></h5>
                                    </div>

                            </div>
                            <div class="firstAdmitted text-center">
                                <h4>Joining Date In This School</h4>
                                <div class="admissionclass">
                                    <h4>Joining Date</h4>
                                    <h5><?php echo $sqgettecherinfo['borno_teachers_join_in_school']; ?></h5>
                                </div>
                            </div>
                           </div>
                       </div>
                       
                    </div>
                    <div class="col-lg-9">
                            <div class="studentbasicInf">
                                <ul class="nav nav-pills mb-3 sudentAllinf" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                      <a class="nav-link active" id="pills-Basic-tab" data-toggle="pill" href="#pills-Basic" role="tab" aria-controls="pills-Basic" aria-selected="true">Basic Information</a>
                                    </li>
                                    <!--<li class="nav-item">-->
                                    <!--  <a class="nav-link" id="pills-Guardian-tab" data-toggle="pill" href="#pills-Guardian" role="tab" aria-controls="pills-Guardian" aria-selected="false">Guardian</a>-->
                                    <!--</li>-->
                                    <!--<li class="nav-item">-->
                                    <!--  <a class="nav-link" id="pills-Academic-tab" data-toggle="pill" href="#pills-Academic" role="tab" aria-controls="pills-Academic" aria-selected="false">Academic</a>-->
                                    <!--</li>-->
                                    <!--<li class="nav-item">-->
                                    <!--    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>-->
                                    <!--</li>-->
                                    <!--<li class="nav-item">-->
                                    <!--    <a class="nav-link" id="pills-Sibling-tab" data-toggle="pill" href="#pills-Sibling" role="tab" aria-controls="pills-Sibling" aria-selected="false">Sibling</a>-->
                                    <!--</li>-->
                                  </ul>
                                  <div class="tab-content studentPillContent" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-Basic" role="tabpanel" aria-labelledby="pills-Basic-tab">
                                        <form>
                                            <div class="form-row studentinput">
                                              <div class="col-md-4">
                                                <label class="studentinfolabel">Designation</label>
                                                <input type="text" class="form-control" value="<?php echo $sqgettecherinfo['borno_teachers_designation']; ?>" readonly>
                                              </div>
                                              <div class="col-md-4">
                                                <label class="studentinfolabel">Teacher's ID</label>
                                                <input type="text" class="form-control"  value="<?php echo $sqgettecherinfo['borno_teachers_id']; ?>" readonly>
                                              </div>
                                              <div class="col-md-4">
                                                <label class="studentinfolabel">Shift</label>
                                                <input type="text" class="form-control" value="<?php echo $sqgettecherinfo['borno_school_shift_name']; ?>" readonly>
                                              </div>
                                            </div>
                                            <div class="form-row studentinput">
                                                <div class="col-md-4">
                                                  <label class="studentinfolabel">Name</label>
                                                  <input type="text" class="form-control" value="<?php echo $sqgettecherinfo['borno_teacher_name']; ?>" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                  <label class="studentinfolabel">Father's Name</label>
                                                  <input type="text" class="form-control"  value="<?php echo $sqgettecherinfo['borno_teachers_father_name']; ?>" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                  <label class="studentinfolabel">Mother's Name</label>
                                                  <input type="text" class="form-control" value="<?php echo $sqgettecherinfo['borno_teachers_mother_name']; ?>" readonly>
                                                </div>
                                              </div>
                                              <div class="form-row studentinput">
                                                <div class="col-md-4">
                                                  <label class="studentinfolabel">Spouse Name</label>
                                                  <input type="text" class="form-control" value="<?php echo $sqgettecherinfo['borno_teachers_spouse_name']; ?>" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                  <label class="studentinfolabel">Date of Birth</label>
                                                  <input type="text" class="form-control"  value="<?php echo $sqgettecherinfo['borno_teachers_dob']; ?>" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                  <label class="studentinfolabel">Religion</label>
                                                  <input type="text" class="form-control"  value="<?php echo $sqgettecherinfo['borno_teachers_religion']; ?>" readonly>
                                                </div>
                                              </div>
                                              <div class="form-row studentinput">
                                                <div class="col-md-4">
                                                  <label class="studentinfolabel">Marital Status</label>
                                                  <input type="text" class="form-control" value="<?php echo $sqgettecherinfo['borno_teachers_marital_status']; ?>" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                  <label class="studentinfolabel">Blood Group</label>
                                                  <input type="text" class="form-control" value="<?php echo $sqgettecherinfo['borno_teachers_blood_group']; ?>" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                  <label class="studentinfolabel">Qualification</label>
                                                  <input type="text" class="form-control" value="<?php echo $sqgettecherinfo['borno_teachers_qualification']; ?>" readonly>
                                                </div>
                                              </div>
                                              <div class="form-row studentinput">
                                                <div class="col-md-4">
                                                  <label class="studentinfolabel">Subject</label>
                                                  <input type="text" class="form-control" value="<?php echo $sqgettecherinfo['borno_teachers_subject']; ?>" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                  <label class="studentinfolabel">National ID</label>
                                                  <input type="text" class="form-control"  value="<?php echo $sqgettecherinfo['borno_teachers_national_id']; ?>" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                  <label class="studentinfolabel">Gadget Serial No</label>
                                                  <input type="text" class="form-control" value="<?php echo $sqgettecherinfo['borno_teachers_gadget_no']; ?>" readonly>
                                                </div>
                                              </div>
                                              <div class="form-row studentinput">
                                                <div class="col-md-4">
                                                  <label class="studentinfolabel">Mailing Address (Present)</label>
                                                  <input type="text" class="form-control" value="<?php echo $sqgettecherinfo['borno_teachers_mailing_address']; ?>" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                  <label class="studentinfolabel">Permanent Address</label>
                                                  <input type="text" class="form-control"  value="<?php echo $sqgettecherinfo['borno_teacher_permanent_address']; ?>" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                  <label class="studentinfolabel">Phone</label>
                                                  <input type="text" class="form-control" value="<?php echo $sqgettecherinfo['borno_teacher_phone']; ?>" readonly>
                                                </div>
                                              </div>
                                              <!--<div class="form-row studentinput">-->
                                              <!--  <div class="col-md-4">-->
                                              <!--    <label class="studentinfolabel">Date of Birth</label>-->
                                              <!--    <input type="text" class="form-control" value="Religion" readonly>-->
                                              <!--  </div>-->
                                              <!--  <div class="col-md-4">-->
                                              <!--    <label class="studentinfolabel">Age</label>-->
                                              <!--    <input type="text" class="form-control"  value="Enter Age" readonly>-->
                                              <!--  </div>-->
                                              <!--  <div class="col-md-4">-->
                                              <!--    <label class="studentinfolabel">Physical Drawback</label>-->
                                              <!--    <input type="text" class="form-control" value="Enter Physical Drawback" readonly>-->
                                              <!--  </div>-->
                                              <!--</div>-->
                                              <!--<div class="form-row studentinput">-->
                                              <!--  <div class="col-md-4">-->
                                              <!--    <label class="studentinfolabel">Description</label>-->
                                              <!--    <input type="text" class="form-control" value="Description" readonly>-->
                                              <!--  </div>-->
                                              <!--  <div class="col-md-4">-->
                                              <!--    <label class="studentinfolabel">Medicine Instruction</label>-->
                                              <!--    <input type="text" class="form-control"  value="Enter Medicine Instruction" readonly>-->
                                              <!--  </div>-->
                                              <!--  <div class="col-md-4">-->
                                              <!--    <label class="studentinfolabel">Height(ft)</label>-->
                                              <!--    <input type="text" class="form-control" value="Enter Physical Drawback" readonly>-->
                                              <!--  </div>-->
                                              <!--</div>-->
                                              <!--<div class="form-row studentinput">-->
                                              <!--  <div class="col-md-4">-->
                                              <!--    <label class="studentinfolabel">Weight(kg)</label>-->
                                              <!--    <input type="text" class="form-control" value="Weight" readonly>-->
                                              <!--  </div>-->
                                              <!--  <div class="col-md-4">-->
                                              <!--    <label class="studentinfolabel">SMS Notification No</label>-->
                                              <!--    <input type="text" class="form-control"  value="Enter Medicine Instruction" readonly>-->
                                              <!--  </div>-->
                                              <!--</div>-->
                                          </form>

                                          <!--<div class="basicingtable">-->
                                          <!--  <h4>Previous Institute Info</h4>-->

                                          <!--  <div class="table-responsive">-->
                                          <!--    <table class="table table-hover">-->
                                          <!--      <thead style="background: #F5F6FA 0% 0% no-repeat padding-box; border-radius: 5px;">-->
                                          <!--        <tr>-->
                                          <!--          <th >Name</th>-->
                                          <!--          <th >Class</th>-->
                                          <!--          <th >Section</th>-->
                                          <!--          <th >Group</th>-->
                                          <!--          <th >Session</th>-->
                                          <!--          <th >Version</th>-->
                                          <!--          <th >GPA</th>-->
                                          <!--          <th >TC No</th>-->
                                          <!--          <th >Date</th>-->
                                          <!--        </tr>-->
                                          <!--      </thead>-->
                                          <!--      <tbody>-->
                                          <!--        <tr>-->
                                          <!--          <td></td>-->
                                          <!--          <td></td>-->
                                          <!--          <td></td>-->
                                          <!--          <td></td>-->
                                          <!--          <td></td>-->
                                          <!--          <td></td>-->
                                          <!--          <td></td>-->
                                          <!--          <td></td>-->
                                          <!--          <td></td>-->
                                          <!--        </tr>-->
                                          <!--      </tbody>-->
                                          <!--    </table>-->
                                          <!--  </div>-->
                                          <!--</div>-->
                                    </div>

                                    <div class="tab-pane fade" id="pills-Guardian" role="tabpanel" aria-labelledby="pills-Guardian-tab">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="studentinput">
                                                    <h3>Father Information</h3>
                                                  <div class="col-md-8">
                                                    <label class="studentinfolabel">Father Name</label>
                                                    <input type="text" class="form-control" value="Enter Father Name" readonly>
                                                  </div>
                                                  <div class="col-md-8">
                                                    <label class="studentinfolabel">Qualification</label>
                                                    <input type="text" class="form-control" value="Enter Father Name" readonly>
                                                  </div>
                                                  <div class="col-md-8">
                                                    <label class="studentinfolabel">Profession</label>
                                                    <input type="text" class="form-control" value="Enter Profession" readonly>
                                                  </div>
                                                  <div class="col-md-8">
                                                    <label class="studentinfolabel">Monthly Income</label>
                                                    <input type="text" class="form-control" value="Enter Monthly Income" readonly>
                                                  </div>
                                                  <div class="col-md-8">
                                                    <label class="studentinfolabel">Office Address</label>
                                                    <input type="text" class="form-control" value="Enter Father Name" readonly>
                                                  </div>
                                                  <div class="col-md-8">
                                                    <label class="studentinfolabel">Mobile</label>
                                                    <input type="text" class="form-control" value="Enter Father Name" readonly>
                                                  </div>
                                                  <div class="col-md-8">
                                                    <label class="studentinfolabel">Email</label>
                                                    <input type="text" class="form-control" value="Enter Father Name" readonly>
                                                  </div>
                                                  <div class="col-md-8">
                                                    <label class="studentinfolabel">TIN</label>
                                                    <input type="text" class="form-control" value="Enter Father Name" readonly>
                                                  </div>
                                                  <div class="col-md-8">
                                                    <label class="studentinfolabel">NID No</label>
                                                    <input type="text" class="form-control" value="Enter Father Name" readonly>
                                                  </div>
                                                  <div class="col-md-8">
                                                    <label class="studentinfolabel">Father's photo</label>
                                                    <img src="assets/images/avatars/thumb-10.jpg" class="form-control guardianPhoto" alt="">
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="studentinput">
                                                    <h3>Mother Information</h3>
                                                  <div class="col-md-8">
                                                    <label class="studentinfolabel">Father Name</label>
                                                    <input type="text" class="form-control" value="Enter Father Name" readonly>
                                                  </div>
                                                  <div class="col-md-8">
                                                    <label class="studentinfolabel">Qualification</label>
                                                    <input type="text" class="form-control" value="Enter Father Name" readonly>
                                                  </div>
                                                  <div class="col-md-8">
                                                    <label class="studentinfolabel">Profession</label>
                                                    <input type="text" class="form-control" value="Enter Profession" readonly>
                                                  </div>
                                                  <div class="col-md-8">
                                                    <label class="studentinfolabel">Monthly Income</label>
                                                    <input type="text" class="form-control" value="Enter Monthly Income" readonly>
                                                  </div>
                                                  <div class="col-md-8">
                                                    <label class="studentinfolabel">Office Address</label>
                                                    <input type="text" class="form-control" value="Enter Father Name" readonly>
                                                  </div>
                                                  <div class="col-md-8">
                                                    <label class="studentinfolabel">Mobile</label>
                                                    <input type="text" class="form-control" value="Enter Father Name" readonly>
                                                  </div>
                                                  <div class="col-md-8">
                                                    <label class="studentinfolabel">Email</label>
                                                    <input type="text" class="form-control" value="Enter Father Name" readonly>
                                                  </div>
                                                  <div class="col-md-8">
                                                    <label class="studentinfolabel">TIN</label>
                                                    <input type="text" class="form-control" value="Enter Father Name" readonly>
                                                  </div>
                                                  <div class="col-md-8">
                                                    <label class="studentinfolabel">NID No</label>
                                                    <input type="text" class="form-control" value="Enter Father Name" readonly>
                                                  </div>
                                                  <div class="col-md-8">
                                                    <label class="studentinfolabel">Mother photo</label>
                                                    <img src="assets/images/avatars/thumb-8.jpg" class="form-control guardianPhoto" alt="">
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-Academic" role="tabpanel" aria-labelledby="pills-Academic-tab">
                                        <!-- <div class="addstuinfBtn text-right">
                                            <a href="" data-toggle="modal" data-target=".bd-example-modal-lg">Add New</a>
                                        </div> -->
                                        <div class="table-responsive academicTable">
                                            <table class="table table-striped">
                                                <thead class="tableHead">
                                                  <tr>
                                                    <th scope="col">Exam Name</th>
                                                    <th scope="col">Institute Name</th>
                                                    <th scope="col">Year</th>
                                                    <th scope="col">Exam Year</th>
                                                    <th scope="col">Pass Year</th>
                                                    <th scope="col">Session</th>
                                                    <th scope="col">Roll No</th>
                                                    <th scope="col">Reg. No</th>
                                                    <th scope="col">GPA</th>
                                                    <th scope="col">Board</th>
                                                    <th scope="col">Group</th>
                                                    <th scope="col">Action</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td>English</td>
                                                    <td>2019</td>
                                                    <td>Mani</td>
                                                    <td>Morning</td>
                                                    <td>Morning</td>
                                                    <td>Morning</td>
                                                    <td>Morning</td>
                                                    <td>Morning</td>
                                                    <td>Six</td>
                                                    <td>None</td>
                                                    <td>B</td>
                                                    <td>
                                                      <a href=""><img src="assets/images/Delete.svg" alt=""></a>
                                                      <a href=""><img src="assets/images/View.svg" alt=""></a>
                                                  </td>
                                                    
                                                  </tr>
                                                  <tr>
                                                    <td>English</td>
                                                    <td>2019</td>
                                                    <td>Mani</td>
                                                    <td>Morning</td>
                                                    <td>Morning</td>
                                                    <td>Morning</td>
                                                    <td>Morning</td>
                                                    <td>Morning</td>
                                                    <td>Six</td>
                                                    <td>None</td>
                                                    <td>B</td>
                                                    <td>
                                                      <a href=""><img src="assets/images/Delete.svg" alt=""></a>
                                                      <a href=""><img src="assets/images/View.svg" alt=""></a>
                                                  </td>
                                                    
                                                  </tr>
                                                  <tr>
                                                    <td>English</td>
                                                    <td>2019</td>
                                                    <td>Mani</td>
                                                    <td>Morning</td>
                                                    <td>Morning</td>
                                                    <td>Morning</td>
                                                    <td>Morning</td>
                                                    <td>Morning</td>
                                                    <td>Six</td>
                                                    <td>None</td>
                                                    <td>B</td>
                                                    <td>
                                                      <a href=""><img src="assets/images/Delete.svg" alt=""></a>
                                                      <a href=""><img src="assets/images/View.svg" alt=""></a>
                                                  </td>
                                                    
                                                  </tr>
                                                  
                                                </tbody>
                                              </table>
                                          </div>
                                         <!---Academic Info Modal start---->

                                         <!-- <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content pPortalModal">
                                              <div class="modal-header pPortalModalHead">
                                                <h5 class="modal-title text-center" id="exampleModalScrollableTitle">Academic Info</h5>
                                              </div>
                                              <div class="modal-body pPortalModalBody">
                                                <form>
                                                  <div class="form-group row">
                                                    <label  class="col-sm-3 col-form-label">Exam Name</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" placeholder="Enter Exam Name">
                                                    </div>
                                                  </div>
                                                  <div class="form-group row">
                                                    <label  class="col-sm-3 col-form-label">Institute Name</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" placeholder="Enter Institute Name">
                                                    </div>
                                                  </div>
                                                  <div class="form-group row">
                                                      <label  class="col-sm-3 col-form-label">Address</label>
                                                      <div class="col-sm-8">
                                                          <input type="text" class="form-control" placeholder="Enter Name">
                                                      </div>
                                                    </div>
                                                    
                                                  <div class="form-group row">
                                                      <label  class="col-sm-3 col-form-label">Group</label>
                                                      <div class="col-sm-8">
                                                        <select class="form-control" id="exampleFormControlSelect1">
                                                          <option>Shapla</option>
                                                          <option>Dolonchapa</option>
                                                          <option>Angkur</option>
                                                        </select>
                                                      </div>
                                                    </div>
                                                    <div class="form-group row">
                                                      <label  class="col-sm-3 col-form-label">Exam Year</label>
                                                      <div class="col-sm-8">
                                                        <select class="form-control" id="exampleFormControlSelect1">
                                                          <option>2020</option>
                                                          <option>2019</option>
                                                          <option>2018</option>
                                                          <option>2017</option>
                                                          <option>2016</option>
                                                        </select>
                                                      </div>
                                                    </div>
                                                    <div class="form-group row">
                                                      <label  class="col-sm-3 col-form-label">Pass Year</label>
                                                      <div class="col-sm-8">
                                                        <select class="form-control" id="exampleFormControlSelect1">
                                                          <option>2020</option>
                                                          <option>2019</option>
                                                          <option>2018</option>
                                                          <option>2017</option>
                                                          <option>2016</option>
                                                        </select>
                                                      </div>
                                                    </div>
                                                    <div class="form-group row">
                                                      <label  class="col-sm-3 col-form-label">Session</label>
                                                      <div class="col-sm-8">
                                                        <select class="form-control" id="exampleFormControlSelect1">
                                                          <option>2020</option>
                                                          <option>2019</option>
                                                          <option>2018</option>
                                                          <option>2017</option>
                                                          <option>2016</option>
                                                        </select>
                                                      </div>
                                                    </div>
                                                  <div class="form-group row">
                                                    <label  class="col-sm-3 col-form-label">Roll</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" placeholder="Enter Roll">
                                                    </div>
                                                  </div>
                                                  <div class="form-group row">
                                                      <label  class="col-sm-3 col-form-label">Reg. No</label>
                                                      <div class="col-sm-8">
                                                          <input type="text" class="form-control" placeholder="Enter Reg. No">
                                                      </div>
                                                    </div>
                                                  <div class="form-group row">
                                                    <label  class="col-sm-3 col-form-label">GPA</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" placeholder="Enter GPA">
                                                    </div>
                                                  </div>
                                                </form>
                                              </div>
                                              <div class="modal-footer pPortalModalFooter">
                                                <button type="button" class="btn btn-secondary pPortalclose" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div> -->
                                        <!---Academic Info Modal End---->
                                    </div>
                                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <div class="studentinput">
                                                    <h3>Present Address</h3>
                                                  <div class="col-md-8">
                                                    <label class="studentinfolabel">Address</label>
                                                    <input type="text" class="form-control" value="Enter Father Name" readonly>
                                                  </div>
                                                  <div class="col-md-8">
                                                    <label class="studentinfolabel">District</label>
                                                    <input type="text" class="form-control" value="Enter Father Name" readonly>
                                                  </div>
                                                  <div class="col-md-8">
                                                    <label class="studentinfolabel">Police Station</label>
                                                    <input type="text" class="form-control" value="Enter Profession" readonly>
                                                  </div>
                                                  <div class="col-md-8">
                                                    <label class="studentinfolabel">Post Office</label>
                                                    <input type="text" class="form-control" value="Enter Monthly Income" readonly>
                                                  </div>
                                                  <div class="col-md-8">
                                                    <label class="studentinfolabel">Post Code</label>
                                                    <input type="text" class="form-control" value="Enter Father Name" readonly>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="studentinput">
                                                    <h3>Permanent Address</h3>
                                                  <div class="col-md-8">
                                                    <label class="studentinfolabel">Address</label>
                                                    <input type="text" class="form-control" value="Enter Father Name" readonly>
                                                  </div>
                                                  <div class="col-md-8">
                                                    <label class="studentinfolabel">District</label>
                                                    <input type="text" class="form-control" value="Enter Father Name" readonly>
                                                  </div>
                                                  <div class="col-md-8">
                                                    <label class="studentinfolabel">Police Station</label>
                                                    <input type="text" class="form-control" value="Enter Profession" readonly>
                                                  </div>
                                                  <div class="col-md-8">
                                                    <label class="studentinfolabel">Post Office</label>
                                                    <input type="text" class="form-control" value="Enter Monthly Income" readonly>
                                                  </div>
                                                  <div class="col-md-8">
                                                    <label class="studentinfolabel">Post Code</label>
                                                    <input type="text" class="form-control" value="Enter Father Name" readonly>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <form class="buttons studeninfoCheck">
                                                    <label>
                                                <input type="checkbox" name="check">
                                                        <span class="label-text">Same</span>
                                                </input>
                                              </label>
                                                   
                                                </form>
                                            </div>
                                            <div class="col-lg-8 mt-3">
                                              <div class="studentinput">
                                                  <h3>Emergency contact</h3>
                                                  <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                      <label >Name</label>
                                                      <input type="text" class="form-control" value="Enter Name"  readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                      <label >Relation</label>
                                                      <input type="text" class="form-control" value="Enter Relation" readonly>
                                                    </div>
                                                  </div>
                                                  <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                      <label >Address</label>
                                                      <input type="text" class="form-control" value="Enter Address" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                      <label >Contact Number</label>
                                                      <input type="text" class="form-control" value="Enter Number" readonly>
                                                    </div>
                                                  </div>
                                                  <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                      <label >Email</label>
                                                      <input type="text" class="form-control" value="Enter Email" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                      <label >NID No</label>
                                                      <input type="text" class="form-control" value="Enter Nid" readonly>
                                                    </div>
                                                  </div>
                                              </div>
                                          </div>
                                        </div>
                                    </div>
                                    
                                  </div>
                            </div>
                       </div>

                    <!--</div>-->
                    <!----------------Content Start---------------->
                </div>
                <!-- Content Wrapper END -->

                <!-- Footer START -->
                    <div class="footer-content">
                        <p class="m-b-0">Copyright ©2020 Bornosky. All rights reserved.</p>
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

    <!-- page js -->
    <script src="assets/vendors/chartjs/Chart.min.js"></script>
    <script src="assets/js/pages/dashboard-default.js"></script>

    <!-- Core JS -->
    <script src="assets/js/app.min.js"></script>


   

<!--<script type="text/javascript" src="../../www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Task', 'Hours per month'],
      ['Absent',     11],
      ['Present',      2],
      
    ]);

    var options = {
      title: '',
      pieHole: 0.5,
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
    chart.draw(data, options);
  }
</script>
<script type="text/javascript">
    $('.side-nav-menu').on('click', 'li', function(){
        $('.side-nav-menu li.inneractive').removeClass('inneractive');
        $(this).addClass('inneractive');
    })
</script>
 <script type="text/javascript">
    $('.ModuleNav').on('click', 'li', function(){
        $('.ModuleNav li.active').removeClass('active');
        $(this).addClass('active');
    })
</script>
<script type="text/javascript">
    $('.NavhideShow').on('click', 'li', function(){
        $('.stickyNav .navHideActive').removeClass('navHideActive');
        $(this).addClass('navHideActive');
    })
</script>
<script>
    $(document).ready(function(){
        $("#menuToggle").click(function(){
            $("#MobileToggle").fadeToggle();
        });
    });
</script>
<script>
    $(document).ready(function(){
        $("#menuToggle2").click(function(){
            $("#MobileToggle").fadeToggle();
        });
    });
</script>

<script>
    $(document).ready(function(){
        $(".Hidemybtn").click(function(){
            $(".Hidemybtn").show();
            $(this).hide();
        });
    });
</script> -->

</body>



</html>