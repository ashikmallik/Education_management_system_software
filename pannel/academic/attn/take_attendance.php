<?php
error_reporting(0);
//ob_start();
include('config.php');
$schId = 1;
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
                                    
                                   <div class="form-group row">
                                              <label  class="col-sm-6 col-form-label">Select Class</label>
                                              <div class="col-sm-6">
                                                <select name="studClass" id="studClass" class="form-control" onchange="callpage();">
                                                 <option value="">--Class--</option>
                                                      <?php
                                                					$getClassId="select * from borno_school_set_class where borno_school_id='1' ";
                                                		
                                                		
                                                		$qgetClassId=$mysqli->query($getClassId);
                                                		while($shgetClassId=$qgetClassId->fetch_assoc()){
                                                										
                                                										$getfClassId=$shgetClassId['borno_school_class_id']; 
                                                                                        $gstclass="select * from borno_school_class where borno_school_class_id='$getfClassId'";
                                                                                        $qgstclass=$mysqli->query($gstclass);
                                                                                        $shgstclass=$qgstclass->fetch_assoc(); 
                                                				
                                                				?>
                                                      <option value=" <?php echo $shgstclass['borno_school_class_id']; ?>" <?php if($shgstclass['borno_school_class_id']==$_REQUEST['studClass']) { echo "selected"; }  ?>> <?php echo $shgstclass['borno_school_class_name']; ?></option>
                                                      <?php } ?>
                                                </select>
                                              </div>
                                            </div>
                                   <div class="form-group row">
                                              <label  class="col-sm-6 col-form-label">Select Shift</label>
                                              <div class="col-sm-6">
                                                <select name="shiftId" id="shiftId" class="form-control" onchange="callpage();">
                                                      <option value="">--Shift--</option>
                                                      <?php
                                                					$studClass=$_REQUEST['studClass'];
                                                					$gstshift="select * from borno_school_shift";
                                                					$qggstshift=$mysqli->query($gstshift);
                                                					while($shggstshift=$qggstshift->fetch_assoc()){ $sl++;
                                                				
                                                				?>
                                                      <option value=" <?php echo $shggstshift['borno_school_shift_id']; ?>" <?php if($shggstshift['borno_school_shift_id']==$_REQUEST['shiftId']) { echo "selected"; }  ?>> <?php echo $shggstshift['borno_school_shift_name']; ?></option>
                                                      <?php } ?>
                                                </select>
                                              </div>
                                            </div>
                                   <div class="form-group row">
                                              <label  class="col-sm-6 col-form-label">Select  Section</label>
                                              <div class="col-sm-6">
                                                <select name="section" id="section" class="form-control" onchange="callpage();">
                                                       <option value="">--Section--</option>
                                                      
                                                        <?php
                                                					$shiftId=$_REQUEST['shiftId'];
                                                					$gstsection="select * from borno_school_section where borno_school_class_id='$studClass'  AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId'";
                                                					$qgstsection=$mysqli->query($gstsection);
                                                					while($shggstsection=$qgstsection->fetch_assoc()){ $sl++;
                                                				
                                                				?>
                                                      <option value=" <?php echo $shggstsection['borno_school_section_id']; ?>" <?php if($shggstsection['borno_school_section_id']==$_REQUEST['section']) { echo "selected"; }  ?>> <?php echo $shggstsection['borno_school_section_name']; ?></option>
                                                      <?php } ?>
                                                      
                                                      
                                                </select>
                                              </div>
                                            </div>
                                   <div class="form-group row">
                                              <label  class="col-sm-6 col-form-label">Session</label>
                                              <div class="col-sm-6">
                                                <select name="stsess" id="stsess" class="form-control" onchange="callpage();">
                                                    <option value="">--Session--</option>
                                                      <?php
                                                					$data1="select borno_school_session from borno_student_info where borno_school_id='$schId' group by borno_school_session asc";
                                                					$qdata1=$mysqli->query($data1);
                                                					while($showdata1=$qdata1->fetch_assoc()){ $sl++;
                                                				
                                                				?>
                                                      <option value=" <?php echo $showdata1['borno_school_session']; ?>" <?php if($showdata1['borno_school_session']==$_REQUEST['stsess']) { echo "selected"; }  ?>> <?php echo $showdata1['borno_school_session']; ?></option>
                                                      <?php } ?>
                                                </select>
                                              </div>
                                            </div>        
                                         
					  	     
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
  	 
 	$stsess=$_REQUEST['stsess'];
	$section=trim($_REQUEST['section']);
	if($section!="" and $stsess!=""){
	
$gtstudent="select * from borno_student_info where borno_school_id='$schId'  AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session=$stsess order by borno_school_roll asc";
	
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
    <td colspan="8" align="center"><input type="submit" name="button" id="button" value="Save"></td>
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
                        <p class="m-b-0">Copyright ©2020 Amareskul. All rights reserved.</p>
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

<!--<script type="text/javascript">
    $('.side-nav-menu').on('click', 'li', function(){
        $('.side-nav-menu li.inneractive').removeClass('inneractive');
        $(this).addClass('inneractive');
    })
</script>
<!-- <script type="text/javascript">
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

$(document).ready(function(){	
	$("#ticketForm").submit(function(event){
		submitForm();
		return false;
	});
});
function submitForm(){
	 $.ajax({
		type: "POST",
		url: "support_do.php",
		cache:false,
		data: $('form#ticketForm').serialize(),
		success: function(response){
			$("#ticketForm").html(response)
			$("#contact-modal").modal('hide');
		},
		error: function(){
			alert("Error");
		}
	});
}
    
</script> -->
</body>



</html>