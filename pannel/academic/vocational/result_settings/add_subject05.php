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
                <h3> Result Settings </h3>
                
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Add Subject Vocational</h2></div>
                <div class="form">
                    <center>
                    	<form name="frmcontent" action="add_subject_do.php" method="post" enctype="multipart/form-data">
                        <?php
			$msg=$_GET['msg'];
	 if($msg==3) { echo "You already create Subject "; }
			else if($msg==4) { echo "Add Subject successful "; }
			else if($msg==5) { echo "Failed"; }

 ?>
                        <table style="border: 1px solid #005067;">
                                               
                         <tr>
    <td class="text_table">Select Class *</td>
    
    <td><select name="studClass" id="studClass" onchange="callpage();">
      <option value=""> Select Class</option>
 <?php
					$gstclass="select * from borno_school_set_class where borno_school_id='$schId' AND class_order between 12 AND 13";
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
    <td><select name="stsess" id="stsess">
      <option value="2019"> 2019 </option>
      <option value="2020"> 2020 </option>
    </select></td>
  </tr>
  </tr>
  
                        </table>
                        <br>
                            <table width="500" style="border: 1px solid #005067;">
                              <tr>
                                <td align="center">Subject Name</td>
                               
                                <td align="center">Mark</td>
                                <td align="center">Uncountable</td>
                                <td align="center">4th Subject</td>
                              </tr>
                              <tr>
                                <td align="center"><input name="termName[]" type="text" id="termName[]" size="30">
                                </td>
                                
                                
                                <td align="center"><input name="perc[]" type="text" id="perc[]" size="5">
                                
                                </td>
                                 <td align="center">
                                   <select name="addsub[]" id="addsub[]">
                                   		<option value="0"> Main </option>
                                        <option value="1"> Uncountable </option>
                                   </select>
                                 </td>
                                 <td align="center">
                                	<select name="add4sub[]" id="add4sub[]">
                                   		<option value="0"> Main </option>
                                        <option value="1"> 4th Subject </option>
                                   </select>
                                </td>
                              </tr>
                               <tr>
                                <td align="center"><input name="termName[]" type="text" id="termName[]" size="30">
                               </td>
                               
                                <td align="center"><input name="perc[]" type="text" id="perc[]" size="5">
                               </td>
                               <td align="center">
                                   <select name="addsub[]" id="addsub[]">
                                   		<option value="0"> Main </option>
                                        <option value="1"> Uncountable </option>
                                   </select>
                               </td>
                               <td align="center">
                                	<select name="add4sub[]" id="add4sub[]">
                                   		<option value="0"> Main </option>
                                        <option value="1"> 4th Subject </option>
                                   </select>
                                </td>
                              </tr>
                               <tr>
                                <td align="center"><input name="termName[]" type="text" id="termName[]" size="30">
                                </td>
                                
                                <td align="center"><input name="perc[]" type="text" id="perc[]" size="5">
                                </td>
                                <td align="center">
                                
                                	<select name="addsub[]" id="addsub[]">
                                   		<option value="0"> Main </option>
                                        <option value="1"> Uncountable </option>
                                   </select>
                                </td>
                                <td align="center">
                                	<select name="add4sub[]" id="add4sub[]">
                                   		<option value="0"> Main </option>
                                        <option value="1"> 4th Subject </option>
                                   </select>
                                </td>
                              </tr>
                               <tr>
                                <td align="center"><input name="termName[]" type="text" id="termName[]" size="30">
                               </td>
                               
                                <td align="center"><input name="perc[]" type="text" id="perc[]" size="5">
                                </td>
                                <td align="center">
                                	<select name="addsub[]" id="addsub[]">
                                   		<option value="0"> Main </option>
                                        <option value="1"> Uncountable </option>
                                   </select>
                                </td>
                                <td align="center">
                                	<select name="add4sub[]" id="add4sub[]">
                                   		<option value="0"> Main </option>
                                        <option value="1"> 4th Subject </option>
                                   </select>
                                </td>
                              </tr>
                               <tr>
                                <td align="center"><input name="termName[]" type="text" id="termName[]" size="30">
                                </td>
                                
                                <td align="center"><input name="perc[]" type="text" id="perc[]" size="5">
                                </td>
                                <td align="center">
                                  <select name="addsub[]" id="addsub[]">
                                   		<option value="0"> Main </option>
                                        <option value="1"> Uncountable </option>
                                   </select>
                                </td>
                                <td align="center">
                                	<select name="add4sub[]" id="add4sub[]">
                                   		<option value="0"> Main </option>
                                        <option value="1"> 4th Subject </option>
                                   </select>
                                </td>
                              </tr>
                               <tr>
                                <td align="center"><input name="termName[]" type="text" id="termName[]" size="30">
                                </td>
                            
                                <td align="center"><input name="perc[]" type="text" id="perc[]" size="5">
                                </td>
                                <td align="center">
                                   <select name="addsub[]" id="addsub[]">
                                   		<option value="0"> Main </option>
                                        <option value="1"> Uncountable </option>
                                   </select>
                                </td>
                                <td align="center">
                                	<select name="add4sub[]" id="add4sub[]">
                                   		<option value="0"> Main </option>
                                        <option value="1"> 4th Subject </option>
                                   </select>
                                </td>
                               </tr>
                              <tr>
                                <td align="center"><input name="termName[]" type="text" id="termName[]" size="30">
                                </td>
                            
                                <td align="center"><input name="perc[]" type="text" id="perc[]" size="5">
                                </td>
                                <td align="center">
                                
                                	<select name="addsub[]" id="addsub[]">
                                   		<option value="0"> Main </option>
                                        <option value="1"> Uncountable </option>
                                   </select>
                                </td>
                                <td align="center">
                                	<select name="add4sub[]" id="add4sub[]">
                                   		<option value="0"> Main </option>
                                        <option value="1"> 4th Subject </option>
                                   </select>
                                </td>
                               </tr>
                               <tr>
                                <td align="center"><input name="termName[]" type="text" id="termName[]" size="30">
                                </td>
                            
                                <td align="center"><input name="perc[]" type="text" id="perc[]" size="5">
                                </td>
                                <td align="center">
                                	<select name="addsub[]" id="addsub[]">
                                   		<option value="0"> Main </option>
                                        <option value="1"> Uncountable </option>
                                     </select>
                                </td>
                                <td align="center">
                                	<select name="add4sub[]" id="add4sub[]">
                                   		<option value="0"> Main </option>
                                        <option value="1"> 4th Subject </option>
                                   </select>
                                </td>
                               </tr>
                               <tr>
                                <td align="center"><input name="termName[]" type="text" id="termName[]" size="30">
                                </td>
                            
                                <td align="center"><input name="perc[]" type="text" id="perc[]" size="5">
                                </td>
                                <td align="center">
                                	<select name="addsub[]" id="addsub[]">
                                   		<option value="0"> Main </option>
                                        <option value="1"> Uncountable </option>
                                   </select>
                                </td>
                                <td align="center">
                                	<select name="add4sub[]" id="add4sub[]">
                                   		<option value="0"> Main </option>
                                        <option value="1"> 4th Subject </option>
                                   </select>
                                </td>
                               </tr>
                               <tr>
                                <td align="center"><input name="termName[]" type="text" id="termName[]" size="30">
                                </td>
                            
                                <td align="center"><input name="perc[]" type="text" id="perc[]" size="5">
                                </td>
                                <td align="center">
                                	<select name="addsub[]" id="addsub[]">
                                   		<option value="0"> Main </option>
                                        <option value="1"> Uncountable </option>
                                   </select>
                                </td>
                                <td align="center">
                                	<select name="add4sub[]" id="add4sub[]">
                                   		<option value="0"> Main </option>
                                        <option value="1"> 4th Subject </option>
                                   </select>
                                </td>
                               </tr>
                                <tr>
                                <td align="center"><input name="termName[]" type="text" id="termName[]" size="30">
                                </td>
                            
                                <td align="center"><input name="perc[]" type="text" id="perc[]" size="5">
                                </td>
                                <td align="center">
                                	<select name="addsub[]" id="addsub[]">
                                   		<option value="0"> Main </option>
                                        <option value="1"> Uncountable </option>
                                   </select>
                                </td>
                                <td align="center">
                                	<select name="add4sub[]" id="add4sub[]">
                                   		<option value="0"> Main </option>
                                        <option value="1"> 4th Subject </option>
                                   </select>
                                </td>
                               </tr>
                               <tr>
                                <td align="center"><input name="termName[]" type="text" id="termName[]" size="30">
                                </td>
                            
                                <td align="center"><input name="perc[]" type="text" id="perc[]" size="5">
                                </td>
                                <td align="center">
                                	<select name="addsub[]" id="addsub[]">
                                   		<option value="0"> Main </option>
                                        <option value="1"> Uncountable </option>
                                   </select>
                                </td>
                                <td align="center">
                                	<select name="add4sub[]" id="add4sub[]">
                                   		<option value="0"> Main </option>
                                        <option value="1"> 4th Subject </option>
                                   </select>
                                </td>
                               </tr>
                               <tr>
                                <td align="center"><input name="termName[]" type="text" id="termName[]" size="30">
                                </td>
                            
                                <td align="center"><input name="perc[]" type="text" id="perc[]" size="5">
                                </td>
                                <td align="center">
                                	<select name="addsub[]" id="addsub[]">
                                   		<option value="0"> Main </option>
                                        <option value="1"> Uncountable </option>
                                   </select>
                                </td>
                                <td align="center">
                                	<select name="add4sub[]" id="add4sub[]">
                                   		<option value="0"> Main </option>
                                        <option value="1"> 4th Subject </option>
                                   </select>
                                </td>
                               </tr>
                               <tr>
                                <td align="center"><input name="termName[]" type="text" id="termName[]" size="30">
                                </td>
                            
                                <td align="center"><input name="perc[]" type="text" id="perc[]" size="5">
                                </td>
                                <td align="center">
                                	<select name="addsub[]" id="addsub[]">
                                   		<option value="0"> Main </option>
                                        <option value="1"> Uncountable </option>
                                   </select>
                                </td>
                                <td align="center">
                                	<select name="add4sub[]" id="add4sub[]">
                                   		<option value="0"> Main </option>
                                        <option value="1"> 4th Subject </option>
                                   </select>
                                </td>
                               </tr>                               <tr>
                                <td align="center"><input name="termName[]" type="text" id="termName[]" size="30">
                                </td>
                            
                                <td align="center"><input name="perc[]" type="text" id="perc[]" size="5">
                                </td>
                                <td align="center">
                                	<select name="addsub[]" id="addsub[]">
                                   		<option value="0"> Main </option>
                                        <option value="1"> Uncountable </option>
                                   </select>
                                </td>
                                <td align="center">
                                	<select name="add4sub[]" id="add4sub[]">
                                   		<option value="0"> Main </option>
                                        <option value="1"> 4th Subject </option>
                                   </select>
                                </td>
                               </tr>                               <tr>
                                <td align="center"><input name="termName[]" type="text" id="termName[]" size="30">
                                </td>
                            
                                <td align="center"><input name="perc[]" type="text" id="perc[]" size="5">
                                </td>
                                <td align="center">
                                	<select name="addsub[]" id="addsub[]">
                                   		<option value="0"> Main </option>
                                        <option value="1"> Uncountable </option>
                                   </select>
                                </td>
                                <td align="center">
                                	<select name="add4sub[]" id="add4sub[]">
                                   		<option value="0"> Main </option>
                                        <option value="1"> 4th Subject </option>
                                   </select>
                                </td>
                               </tr>                                                                                                                           
                               <tr>
                                <td colspan="5" align="center"><input type="submit" name="submit" id="submit" value="Set" onClick="return contalt_valid()"></td>
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