<?php
    include('pannel_top.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title> :: [Admin Pannel] :: </title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <!-- Meta tag -->
    <meta charset="utf-8">
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <style>
    .tborder{
		border-bottom:1px #F90 solid;
		border-top:1px #C90 solid;
		border-right:1px #C90 solid;
		border-left:1px #C90 solid;}
    </style>


<script language="javascript">
	function contalt_valid()
	{
		if(document.frmcontent.studClass.value=="")
		{
			alert("Please Select Class");
			document.frmcontent.studClass.focus();
			return (false);
		}
		if(document.frmcontent.termsess.value=="")
		{
			alert("Please Select Session");
			document.frmcontent.termsess.focus();
			return (false);
		}

						
	}
	
	function callpage()
	{
	 document.frmcontent.action="#";
	 document.frmcontent.submit();
	}
	
</script>  



</head>
<body>


<div class="wrapper">
    <div class="side_main_menu">
        <?php require_once('leftmenu.php');?>	
        <div class="fixed_logo">
            <a href=""><img src="../assets/images/logo.jpg" class="img-fluid"></a>
        </div>
    </div><!-- side bar end -->

    <div class="ot_main_content">
        <div class="admin_logout">
            <div class="admin_head">
                
                 <h3> Admin Pannel [ Class Wise Student Report Section ] </h3> 
                
            </div>
            <div class="log_out">
                <a href="../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Class Wise Student</h2></div>
                <div class="form">
                     
                <br>
				

				  <form name="frmcontent" action="download_classwise_student.php" method="post" enctype="multipart/form-data">
                    <center>
						<table class="tborder">
						  <tbody>

							<tr >
								<td>Class :</td>
								<td>
        <select name="studClass" id="studClass" onchange="callpage();">
      <option value=""> Select </option>
      <?php
					$gstclass="select * from borno_school_class order by clorder asc";
					$qgstclass=$mysqli->query($gstclass);
					while($shgstclass=$qgstclass->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $shgstclass['borno_school_class_id']; ?>" <?php if($shgstclass['borno_school_class_id']==$_POST['studClass']) { echo "selected"; }  ?>> <?php echo $shgstclass['borno_school_class_name']; ?></option>
      <?php } ?>
      </select>
								</td>
							</tr>
							
							
		
							<tr>
								<td>Session:</td>
								<td>
								  <select name="stsess" id="stsess" onChange="callpage();">
                                  		<option value=""> Select </option>     
                                       	<option value="2018" <?php if($_POST['stsess']=='2018') { echo "selected";} ?> >2018</option>
                                        <option value="2019" <?php if($_POST['stsess']=='2019') { echo "selected";} ?>>2019</option>
                                  		
					              </select>
                                </td>
							</tr>
								
						  </tbody>
					  </table>
					</center>
					
					
                    <center>
                    <table>
						<tbody>
							<tr>
									<td>
									
 

								</td>
								<td></td>
							</tr>
						</tbody>
					</table>

					<table border="0" cellspacing="0" cellpadding="0" class="projectlist" align="center" >
					  <thead>
					    <tr >
					      <td scope="col">
					      	<input type="checkbox" id="checkAll" /> &nbsp;Select All
					      </td>

					      <td scope="col">School Name</td>

					    </tr>
					  </thead>
					  <tbody>
                      <?php	
	
 $studClass=$_POST['studClass'];
 $stsess=$_POST['stsess'];
 $gtschool="select * from borno_school  order by borno_school_id asc";
	
	$qgtschool=$mysqli->query($gtschool);
	
	$sl=0;
	
	
	while($shcoolid=$qgtschool->fetch_assoc()){ $sl++;

			   ?>
                      
                      
					    <tr >
	<td><input class="chk" type="checkbox" name="schlid[]" id="schlid[]" value="<?php echo $shcoolid['borno_school_id'];?>">                      
                          </td>

					      <td><?php echo $shcoolid['borno_school_name'];?></td>
					    </tr>
                        
             <?php } ?>           
					  </tbody>
					</table>	
           	</center>    
                    
      				<center>					  
                      <input type="submit" value="Show">
                      	</center>  
				  </form>
                        
                        

                </div>
            </div>
        </div><!-- Main Body part end -->
    </div><!-- Main Content end -->
</div>
<!--<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<script>
$("#checkAll").change(function () {
      $("input:checkbox").prop('checked', $(this).prop("checked"));
});
</script>
<script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js"></script>-->
</body>
</html>