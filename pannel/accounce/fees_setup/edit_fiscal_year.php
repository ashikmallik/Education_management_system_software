<?php require_once('fees_sett_top.php');

$yearId=$_GET['yearId'];

		$getFeesHeadName="select * from fees_head WHERE  fiscal_year_id = '$yearId'";
 	$qgetFeesHeadName=$mysqli->query($getFeesHeadName);
	$shFeesHeadName=$qgetFeesHeadName->fetch_assoc();
	
	$gheadname=$shFeesHeadName['fiscal_year_id'];

	if($gheadname==$yearId) { 
	    
	   // echo "tes1";
	  //  header('Location: fiscal_year_setup.php?msg=3');  
	
	$message = 'Fiscal year already in exist in Fees head setup';

    echo "<SCRIPT> 
        alert('$message')
        window.location.replace('fiscal_year_setup.php');
    </SCRIPT>";
	    
	}


?>
<!DOCTYPE html>
<html>
<head>
    <title>:: [Fees Setup]::</title>
    <link rel="stylesheet" type="text/css" href="../../academic/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../academic/assets/css/font-awesome.css">
    <!-- Meta tag -->
    <meta charset="utf-8">
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
</head>
<body>
</script>

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
</script> 
<div class="wrapper">
    <div class="side_main_menu">
        <?php require_once('leftmenu.php');?>	
        <div class="fixed_logo">
            <a href=""><img src="../../academic/assets/images/logo.jpg" class="img-fluid"></a>
        </div>
    </div><!-- side bar end -->

    <div class="ot_main_content">
        <div class="admin_logout">
            <div class="admin_head">
                <h3> Fees Setup </h3>
                
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../../academic/assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Edit Fiscal Year</h2></div>
                <div class="form">
                    <center>
 <form name="frmcontent" action="fiscal_year_setup_do.php" method="post" enctype="multipart/form-data">
                        <?php
			$msg=$_GET['msg'];
			if($msg==1) { echo "Success"; }
			else if($msg==2) { echo "Failed"; }
            else if($msg==3) { echo "Fiscal Year Already Exist/ Date Range Problem"; }
 ?>
                        
                        <table style="border:1px #000 solid; margin-top:-35px;">
                                               <?php
  		
		$gtfundName="select * from fiscal_year where fiscal_year_id='$yearId'";		
		$qgtfundName=$mysqli->query($gtfundName);
		$shgtfundName=$qgtfundName->fetch_assoc();
		
		
		
  
  ?> 
                                               
                         <tr>
    <td class="text_table">Fiscal Year  Name*</td>
    
    <td><input type="text" name="fiscalyearname" id="fiscalyearname" value="<?php echo $shgtfundName['fiscal_year_name']; ?>"  style ="width: 194px;">
      </td>
  </tr>
  <tr style="background-color: #75cbd6;">
    <td class="text_table" >From Date *</td>
    <td><input type="text" name="fromdate" id="fromdate" value="<?php echo $shgtfundName['fiscal_year_name']; ?>" style ="width: 194px;"></td>
  </tr>                    
  <tr>
    <td class="text_table">To Date *</td>
    <td><input type="text" name="todate" id="todate" value="<?php echo $shgtfundName['fiscal_year_name']; ?>" style ="width: 194px;"></td>
  </tr> 
  
   <tr style="background-color: #75cbd6;">
    <td class="text_table">Session *</td>
    <td ><select name="stsess" id="stsess" onchange="callpage();">
      <option value="">--Select--</option>
      <?php
					$data1="select * from borno_student_info where borno_school_id='$schId' group by borno_school_session asc";
					$qdata1=$mysqli->query($data1);
					while($showdata1=$qdata1->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $showdata1['borno_school_session']; ?>" <?php if($showdata1['borno_school_session']==trim($_REQUEST['stsess'])) { echo "selected"; }  ?>> <?php   echo $showdata1['borno_school_session']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
  <tr>
    <td class="text_table">Type</td>
    <td><select name="type" id="type">
        <option value="">--Select--</option>
         <option value="School"> School </option>
        <option value="College"> College </option>
     </select></td>
  </tr> 
  <tr style="background-color: #75cbd6;">
         <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Update" onClick="return contalt_valid()"></td>
  </tr>
   </table>
 </form> 
                   
                            

                      
                  </center>
                </div>
            </div>
        </div><!-- Main Body part end -->
    </div><!-- Main Content end -->
</div>

<!--Script part-->
<script type="text/javascript" src="../../academic/assets/js/jquery-3.2.1.min.js"></script>
</body>
</html>