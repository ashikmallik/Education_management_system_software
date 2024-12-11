<?php
error_reporting(0);
//ob_start();
include('config.php');
?>
<script language="javascript">
	function callpage()
	{
	 document.frmcontent.action="create_calender.php";
	 document.frmcontent.submit();
	}
	
	
	
</script>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Calender Panel</title>

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
                                    <h3>Set Calender</h3>
                                   </div>
                                    
                                </div>
                                <div class="col-lg-8">
                                    <center>
                                <form name="frmcontent" action="create_calender_do.php"  method="post" enctype="multipart/form-data" id="myform">
                                    
                                   <div class="form-group row">
                                              <label  class="col-sm-6 col-form-label">Academic Year</label>
                                              <div class="col-sm-6">
                                                <select name="yearid" id="yearid" class="form-control" onChange="callpage();" >
                                                  <option value=""> SELECT </option>
                                                                                  <?php                                       
										
										$getyearid="select * from academic_year";
		
		
		$qgetyearid=$mysqli->query($getyearid);
		while($shqgetyearid=$qgetyearid->fetch_assoc()){
										
										 
                                    ?>
                                <option value=" <?php echo $shqgetyearid['academic_year_id']; ?>" <?php if($shqgetyearid['academic_year_id']==$_REQUEST['yearid']) { echo "selected"; }  ?>> <?php echo $shqgetyearid['year_name']; ?></option>
                                <?php } ?>
                                                </select>
                                              </div>
                                            </div>
                                    <div class="form-group row">
                                              <label  class="col-sm-6 col-form-label">Month</label>
                                              <div class="col-sm-6">
                                                <select name="monthid" id="monthid" class="form-control" onChange="callpage();" >
                                                  <option value=""> SELECT </option>
                                                                                  <?php  
                                                    $getyearid= $_REQUEST['yearid'];                              
										
										$getmonthid="select * from academic_year_details WHERE `academic_year_id` = '$getyearid'";
		
		
		$qgetmonthid=$mysqli->query($getmonthid);
		while($shqgetmonthid=$qgetmonthid->fetch_assoc()){
										
										 
                                    ?>
                                <option value=" <?php echo $shqgetmonthid['month_id']; ?>" <?php if($shqgetmonthid['month_id']==$_REQUEST['monthid']) { echo "selected"; }  ?>> <?php echo $shqgetmonthid['month_name']; ?></option>
                                <?php } ?>
                                                </select>
                                              </div>
                                            </div>
                                   <div class="form-group row">
                                              <label  class="col-sm-6 col-form-label">Category</label>
                                              <div class="col-sm-6">
                                                <select name="category" id="category" class="form-control"  onChange="callpage();">
                                                  <option value=""> SELECT </option>
                                                  <option value="Student" <?php if($_REQUEST['category'] == "Student"){ echo "selected"; }?>> Student </option>
                                                  <option value="Teacher" <?php if($_REQUEST['category'] == "Teacher"){ echo "selected"; }?>> Teacher </option>
                                                  <option value="Staff" <?php if($_REQUEST['category'] == "Staff"){ echo "selected"; }?>> Staff </option>
                                                  
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
                                            <th scope="col" align="center">Day</th>
                                            <th scope="col" align="center">Day Type</th>
                                            <th scope="col" align="center">Holiday Remarks</th>
                                            <th scope="col" align="center">Holiday Color</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                                                          <?php
                                
                                    
           $year_id = $_REQUEST['yearid'];
           $month_id = $_REQUEST['monthid'];
           $cetagory = $_REQUEST['category'];
	  
  		$gtfeeshead="SELECT * FROM `academic_calender_details` WHERE `academic_year_id` ='$year_id' AND `month_id` ='$month_id'";
		$sl=0;
		$qgtfeeshead=$mysqli->query($gtfeeshead);
		while($shgtfeeshead=$qgtfeeshead->fetch_assoc()){
		
		$sl++;
  
  ?>
   <tr>
    <td><input type="hidden" id="cdetailsid[]" name="cdetailsid[]" value="<?php  echo $shgtfeeshead['calender_details_id']; ?>"><?php echo $shgtfeeshead['day_name'].",".$shgtfeeshead['month_short_name']." ".$shgtfeeshead['day'].",".$shgtfeeshead['year']; ?></td>
    <td><select name="daytype[]" id="daytype[]" class="form-control">
       <option value=""> SELECT </option> 
       <option value="Regular"> Regular </option> 
       <option value="Holiday"> Holiday </option> 
       <option value="Long Holiday"> Long Holiday </option> 
       <option value="Day Off"> Day Off </option>
       
    </select></td>
    <td><textarea type="text" id="remarks[]" name="remarks[]" ></textarea></td>
    <td><input type="color" id="color[]" name="color[]"></td>
     
  </tr>
                              
      
  <?php } ?> 
   <tr>
    <td colspan="8" align="center">
        <input type="hidden" id="ctgry" name="ctgry" value="<?php echo $cetagory;?>">
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