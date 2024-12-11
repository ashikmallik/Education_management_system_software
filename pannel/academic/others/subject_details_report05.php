<?php require_once('result_sett_top.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>:: [Others Info]::</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <!-- Meta tag -->
    <meta charset="utf-8">
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
</head>
<body>
</script>
<script language="javascript">
function callpage()
{
 document.frmcontent.action="subject_details_report05.php";
 document.frmcontent.submit();
}
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
            <a href=""><img src="../assets/images/logo.jpg" class="img-fluid"></a>
        </div>
    </div><!-- side bar end -->

    <div class="ot_main_content">
        <div class="admin_logout">
            <div class="admin_head">
                <h3> Others Info </h3>
                
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Subject Details Report</h2></div>
                <div class="form">
                    <center>
                    	<form name="frmcontent" action="subject_details05_do.php" method="post" enctype="multipart/form-data">
                        <?php
	$msg=$_GET['msg'];
	if($msg==1){echo "Add Subject Details Successfull";} 
	else if($msg==2){echo "Failed";} 
	else if($msg==3){echo "Subject Details Already Added";} 


 ?>
                        <table style="border: 1px solid #005067;">
                                               
                         <tr>
    <td class="text_table">Select Class *</td>
    
    <td><select name="studClass" id="studClass" onchange="callpage();">
      <option value=""> Select Class</option>
     <?php
					$gstclass="select * from borno_school_set_class where borno_school_id='$schId' order by class_order asc";
					$qgstclass=$mysqli->query($gstclass);
					while($shgstclass=$qgstclass->fetch_assoc()){ $sl++;
				
					$getfClassId=$shgstclass['borno_school_class_id']; 
                    $gstclass1="select * from borno_school_class where borno_school_class_id='$getfClassId'";
                                        $qgstclass1=$mysqli->query($gstclass1);
                                        $shgstclass1=$qgstclass1->fetch_assoc(); 
				?>
      <option value=" <?php echo $shgstclass1['borno_school_class_id']; ?>" <?php if($shgstclass1['borno_school_class_id']==$_REQUEST['studClass']) { echo "selected"; }  ?>> <?php echo $shgstclass1['borno_school_class_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
  						 <tr>
    <td class="text_table">Session *</td>
    <td><select name="stsess" id="stsess" onchange="callpage();">
      <option value=""> Select</option>
      <option value="2018" <?php if($_POST['stsess']==2018) { echo "selected"; } ?>> 2018 </option>
      <option value="2019" <?php if($_POST['stsess']==2019) { echo "selected"; } ?>> 2019 </option>
      <option value="2020" <?php if($_POST['stsess']==2020) { echo "selected"; } ?>> 2020 </option>
    </select></td>
  </tr>
  						 <tr>
    <td class="text_table">Select Term *</td>
    
    <td><select name="term" id="term" onchange="callpage();">
      <option value=""> Select Term</option>
 <?php
 					$studClass=$_REQUEST['studClass'];
 					$stsess=$_REQUEST['stsess'];
					$gstterm="select * from borno_result_add_term where borno_school_id='$schId'  AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' order by borno_result_term_id asc";
					$qgstterm=$mysqli->query($gstterm);
					while($shqgstterm=$qgstterm->fetch_assoc()){ $sl++;
				
					
				?>
<option value=" <?php echo $shqgstterm['borno_result_term_id']; ?>" <?php if($shqgstterm['borno_result_term_id']==$_REQUEST['term']) { echo "selected"; }  ?>> <?php echo $shqgstterm['borno_result_term_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
   <tr>

  <?php
 $gtfbranchId=$_POST['branchId'];
 $stsess=$_POST['stsess'];
 $selTerm=$_POST['term'];


?>
    <td>&nbsp;</td>
    <td><a href="download_subject_details05.php?schoolId=<?php echo $schId; ?>&classId=<?php echo $studClass; ?>&scsess=<?php echo $stsess; ?>&sctermId=<?php echo $selTerm; ?>" target="_blank">Show List</a></td>
 </tr>     
                        </table>
                        
                         <br>
                            
                        
                        
                        </form>
                        <br>
                        
                  </center>
                </div>
            </div>
        </div><!-- Main Body part end -->
    </div><!-- Main Content end -->
</div>

<!--Script part-->
<script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js"></script>
</body>
</html>