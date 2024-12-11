<?php
error_reporting(0);
//ob_start();
include('db_contection.php');
?>

<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Admin Zone</title>

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
    <script>
	function callpage()
	{
	 document.frmcontent.action="applicant_list.php";
	 document.frmcontent.submit();
	}
	
</script>
    <div class="app">
        <div class="layout">
            <!-- Header START -->
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
                    <div class="col-sm-3" style="margin: auto;background: #efefef;">
                        
                                 
<form name="frmcontent" method="post" enctype="multipart/form-data">
                    
    	    
              
                <div class="form-group row">
                    
                      
                 <select class="form-control" id="group" name="group" onChange="callpage();" >
                        <option selected="" value="">None</option>
                            <option value="Science" <?php if("Science"==trim($_REQUEST['group'])) { echo "selected"; }  ?>>Science</option>
                            <option value="Business Studies" <?php if("Business Studies"==trim($_REQUEST['group'])) { echo "selected"; }  ?>>Business Studies</option>
                            <option value="Humanities" <?php if("Humanities"==trim($_REQUEST['group'])) { echo "selected"; }  ?>>Humanities</option>
                            

                            </select>
                                         
                    </div> 
    <?php 
    $group= trim($_REQUEST['group']);
    ?>                
 <a href="download_xi_candidet.php?group=<?php echo $group;?>" class="btn btn-primary"style="margin-left: 41%;
    margin-bottom: 1%;" target="_blank">Download List</a>
                    
                </form>
                 </div>  
                                   <div class="requestTableHead">
                                    <h3>Student List</h3>
                                   </div>
                                    <div class="addstuinfBtn requestTablBtn text-right">
                                        <div class="reqheadNumber">
                                            
                                        </div>
                                         
                                    </div>
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
                                              <th scope="col" style="text-align: center;">Sl</th>
                                            <th scope="col" style="text-align: center;">Student ID</th>
                                            <th scope="col" style="text-align: center;">Roll</th>
                                            <th scope="col" style="text-align: center;">Name</th>
                                            <th scope="col" style="text-align: center;">SSC Roll</th></th>
                                            <th scope="col" style="text-align: center;">Image</th>
                                            <th scope="col" style="text-align: center;">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
    <?php

      $group= trim($_REQUEST['group']);

	  if(!empty($group)){
  		$gtstudent="SELECT * FROM `admition_form` WHERE `group` = '$group' ORDER BY `id` ASC";
		$sl=0;
		$qgtstudent=$mysqli->query($gtstudent);
		while($shqgtstudent=$qgtstudent->fetch_assoc()){
		
		$sl++;
  
  ?>
   <tr>
    <td  align="center"><?php echo $sl; ?></td>
    <td  align="center"><?php echo $shqgtstudent['student_id']; ?></td>
    <td  align="center"><?php echo $shqgtstudent['roll']; ?></td>
    <td  align="center"><?php echo $shqgtstudent['std_name']; ?></td>
    <td  align="center"><?php echo $shqgtstudent['ssc_roll']; ?></td>
   
    <td  align="center"><img src="studentphoto/<?php echo $shqgtstudent['imagePath']; ?>" width="120" height="100"/></td>
    <td  align="center">
        <!--<a href="edit_slider.php?slider_id=<?php echo $shgtfeeshead['id']; ?>">Edit</a>-->
    <a href="print_app_form.php?sid=<?php echo $shqgtstudent['student_id']; ?>"target="_blank">Details View</a>
    </td>
  </tr>
                              
      
  <?php } } ?> 
  <tr>
      <td colspan="5" ></td>
      <td align="center">Total Student</td>
      <td align="center"><?php echo $sl;?></td>
      
  </tr>

                                          
                                        </tbody>
                                      </table>
                                  </div>
                                  <!--<div class="pegaeNation">-->
                                  <!--    <div class="paginationmain">-->
                                  <!--        <p>Displaying 1-10 out of 100</p>-->
                                  <!--    </div>-->
                                  <!--    <div class="paginationmain text-right">-->
                                  <!--        <ul>-->
                                  <!--            <li><a href="" class="pageActive">1</a></li>-->
                                  <!--            <li><a href="">2</a></li>-->
                                  <!--            <li><a href="">3</a></li>-->
                                  <!--            <li><a href="">4</a></li>-->
                                  <!--            <li><a href="">5</a></li>-->
                                  <!--        </ul>-->
                                  <!--    </div>-->
                                  <!--</div>-->
                                   <!---Request Modal---->
                                   <!-- The Modal -->

                                   
                                  
                                  <!---Reques Modal---->
                                  
                                  
                            </div>
                        </div>
                    </div>
                    <!----------------Content Start---------------->
                </div>
                <!-- Content Wrapper END -->

                <!-- Footer START -->
<div class="footer-content">
                        <p class="m-b-0">Copyright ©2020 <?php  echo $shqgetinstituteinfo['institutions_name']; ?>. All rights reserved.</p>
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