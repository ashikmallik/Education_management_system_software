<?php require_once('result_sett_top.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>:: [Result  Settings]::</title>
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
 document.frmcontent.action="manage_number_type05.php";
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
                <h3> Result Settings [ <?php echo $shget_schoolName['borno_school_name']; ?> ]</h3>
                
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Manage Number Type Play to Ten</h2></div>
                <div class="form">
                    <center>
                    	<form name="frmcontent" action="manage_number_type05_do.php" method="post" enctype="multipart/form-data">
                        <?php
			$msg=$_GET['msg'];
			if($msg==1) { echo "Manage Number Type successful "; }
			else if($msg==2) { echo "Failed"; }

 ?>
                        <table style="border: 1px solid #005067;">
                                               
                         <tr>
    <td class="text_table">Select Class *</td>
    
    <td><select name="studClass" id="studClass" onchange="callpage();">
      <option value=""> Select Class</option>
 <?php
					$gstclass="select * from borno_school_set_class where borno_school_id='$schId' GROUP BY borno_school_class_id order by class_order asc";
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
   <?php $curyear= date("Y"); 
  $descuryear=$curyear-1;
  $inccuryear=$curyear+1;
  ?>
  
  
    <td class="text_table">Session *</td>
    <td><select name="stsess" id="stsess" onchange="callpage();">
        <option value=""> Select Session</option>
    <option value="<?php echo $descuryear; ?>" <?php if($descuryear==$_REQUEST['stsess']) { echo "selected"; }  ?>> <?php echo $descuryear; ?> </option>
       <option value="<?php echo $curyear; ?>" <?php if($curyear==$_REQUEST['stsess']) { echo "selected"; }  ?>> <?php echo $curyear; ?> </option>
       <option value="<?php echo $inccuryear; ?>" <?php if($inccuryear==$_REQUEST['stsess']) { echo "selected"; }  ?>> <?php echo $inccuryear; ?> </option>
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
      <?php }
      
      
      ?>
    </select></td>
  </tr>
                        </table >
                        </form>
                        <br>
                        <form name="frmcontent1" action="manage_number_type05_do.php" method="post" enctype="multipart/form-data">
                        
                            <table width="400" style="border: 1px solid #005067;">
                              <tr>
                                <td align="center">Number Type</td>
                                <td align="center">Action</td>
                              </tr>
                              <?php
							  
							  $typeId=$_GET['typeId'];
					if($typeId!=""){
						
						$delterm="DELETE from borno_result_number_type where borno_result_number_type_id='$typeId'";
						$mysqli->query($delterm);
						}
							  
							  
    		$studClass=$_POST['studClass'];
            $stsess=$_POST['stsess'];
            $term = $_REQUEST['term'];
		   
		    
						
						
            $gtedtgrade="select * from borno_result_number_type where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id = '$term'";
			
            $qgtedtgrade=$mysqli->query($gtedtgrade);
           $shgtedtgrade=$qgtedtgrade->fetch_assoc();	
		   
		  
		   
		   
   ?>
                              
 								<tr>
 <td align="center"><input name="termName1" type="text" id="termName1" size="30" value=" <?php echo $shgtedtgrade['borno_school_number_type1']; ?>"> </td>
                                                           
<td rowspan="6" align="center"><a href="manage_number_type05.php?typeId=<?php echo $shgtedtgrade['borno_result_number_type_id']; ?>" onClick="return confirm ('Sure to Delete')">Delete</a></td>
                              </tr>
                              <tr>
 <td align="center"><input name="termName2" type="text" id="termName2" size="30" value=" <?php echo $shgtedtgrade['borno_school_number_type2']; ?>"> </td>
</tr>
                              <tr>
 <td align="center"><input name="termName3" type="text" id="termName3" size="30" value=" <?php echo $shgtedtgrade['borno_school_number_type3']; ?>"> </td>
</tr>
                              <tr>
 <td align="center"><input name="termName4" type="text" id="termName4" size="30" value=" <?php echo $shgtedtgrade['borno_school_number_type4']; ?>"> </td>
</tr>
                              <tr>
 <td align="center"><input name="termName5" type="text" id="termName5" size="30" value=" <?php echo $shgtedtgrade['borno_school_number_type5']; ?>"> </td>
</tr>
                              <tr>
 <td align="center"><input name="termName6" type="text" id="termName6" size="30" value=" <?php echo $shgtedtgrade['borno_school_number_type6']; ?>"> </td>
</tr>
                            
                              
                               
                               <tr>
                                <td colspan="5" align="center"><input type="submit" name="submit" id="submit" value="Update" onClick="return contalt_valid()">
<input type="hidden" name="termtype" id="termtype" value="<?php echo $shgtedtgrade['borno_result_number_type_id']; ?>" />
  <input type="hidden" name="stuclass" id="stuclass" value="<?php echo $_POST['studClass']; ?>" />
  <input type="hidden" name="studess" id="studess" value="<?php echo $_POST['stsess']; ?>" />
  <input type="hidden" name="term" id="term" value="<?php echo $term; ?>" /></td>
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
<script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js"></script>
</body>
</html>