<?php require_once('report_sett_top.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>:: [Fees Report]::</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <!-- Meta tag -->
    <meta charset="utf-8">
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
<style>    
tr:nth-child(even) {background-color: #dbebf3;}
</style>
    
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
	function callpage()
	{
	 document.frmcontent.action="due_admission_student_wise.php";
	 document.frmcontent.submit();
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
                <h3> Fees Report </h3>
                
            </div>
            <div class="log_out">
                <a href="logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body" style="margin-top:5px; margin-left:5px;">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Admission Student List</h2></div>
                <div class="form">
                    <center>
        <form name="frmcontent1" method="post" enctype="multipart/form-data">
                        
        <table style="border:1px #000 solid; margin-top:-35px;">
   <tr>
    <td class="text_table">User ID *</td>
    <td><input type="text" id="uid" name="uid" class="form-control" placeholder="User ID" value=""/></td>
  </tr>            

  <tr>
<td colspan="2" align="center"><input type="submit" name="button" id="button" value="Show" onclick="return contalt_valid()"></td>
  </tr>
    

       
                        </table>
                        </form> 
                        
                        <br>
                        <form name="frmcontent" action="update_student_due.php" method="post" enctype="multipart/form-data">
                                                  <?php
                                  	$userid=$_REQUEST['uid'];
                                  	$getstudentinfo="SELECT * FROM `student_addmission` as si
                                                                INNER JOIN `borno_school_shift` AS ss ON ss.`borno_school_shift_id` = si.`shift_id`
                                                                INNER JOIN `borno_school_section` AS sse ON sse.`borno_school_section_id` = si.`section_id`
                                                                INNER JOIN `borno_school_class` AS sc ON sc.`borno_school_class_id` = si.`class_id`
                                                                INNER JOIN `borno_school_branch` AS sb ON sb.`borno_school_branch_id` = si.`branch_id`
                                                                WHERE `user_id` = '$userid'";
		
                                                        		$qgetstudentinfo=$mysqli->query($getstudentinfo);
                                                        		$shqgetstudentinfo=$qgetstudentinfo->fetch_assoc();
                                                        		
                                                        		$studid=$userid;
                                                                $branchid = $shqgetstudentinfo['borno_school_branch_id'];
                                                                $classid = $shqgetstudentinfo['borno_school_class_id'];
                                                               $session = $shqgetstudentinfo['borno_school_session'];
                                  ?>
                                  <table  width="800" border="1" style="border: 1px solid #005067;">
                                  <tr style="background-color: #005067; color: #fff;">
                                      <td>Student ID : <?php echo $studid; ?></td>
                                      <td>Name : <?php echo $shqgetstudentinfo['student_name']; ?></td>
                                      <td>Roll : <?php echo $shqgetstudentinfo['roll']; ?></td>
                                      <td>Class : <?php echo $shqgetstudentinfo['borno_school_class_name']; ?></td>
                                  </tr> 
                                <tr>
                                      <td>Section : <?php echo $shqgetstudentinfo['borno_school_section_name']; ?></td>
                                      <td>Shift : <?php echo $shqgetstudentinfo['borno_school_shift_name']; ?></td>
                                      <td>Branch : <?php echo $shqgetstudentinfo['borno_school_branch_name']; ?></td>
                                      
                                  </tr>
                                  </table>
                                  <br>
                            <table width="800" border="1" style="border: 1px solid #005067;">
           
                                
                              <tr style="background-color: #005067; color: #fff;">
                                 
                                  
                                  
                            
                                <!--<td align="center">Action</td>-->
                              </tr>
                                <?php
                                
                                    
         
         //	echo $studentid;

			if($studid!=""){
	  
  		$gtduelist="SELECT * FROM `student_addmission` WHERE `user_id` = '$userid'";
		$qgtduelist=$mysqli->query($gtduelist);
		while($shgtduelist=$qgtduelist->fetch_assoc()){
		
	
  
  ?>
<tr>
    <td width="15%;" align="center">Student ID : </td>
    <td width="15%;" align="center"><input name="sid" type="text" id="sid"   value="<?php echo $shgtduelist['student_id']; ?>"></td>
  </tr>
    <tr>
    <td width="15%;" align="center">Student Name : </td>
    <td width="15%;" align="center"><input name="name" type="text" id="name"   value="<?php echo $shgtduelist['student_name']; ?>"></td>
  </tr>
  <tr>
  <tr>
    <td width="15%;" align="center">Branch : </td>
    <td width="15%;" align="center"><select name="branchId" id="branchId" onchange="callpage();">
      <option value="">--Select--</option>
      <?php
                            
					$data="select * from borno_school_branch where borno_school_id='$schId'";
                            $qdata=$mysqli->query($data);
                           while($showdata=$qdata->fetch_assoc()){ $sl++;
                                            
                                            ?>
      <option value=" <?php echo $showdata['borno_school_branch_id']; ?>" <?php if($showdata['borno_school_branch_id']==$_REQUEST['branchId']) { echo "selected"; }  ?>> <?php echo $showdata['borno_school_branch_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
  <tr>
    <td width="15%;" align="center">Class : </td>
    <td width="15%;" align="center"><select name="studClass" id="studClass" onChange="callpage();">
                                <option value="">--Select--</option>
                                <?php                                       
  
									    $gtfbranchId=$_POST['branchId'];
										
										$getClassId="select * from borno_school_set_class where borno_school_id='$schId' AND borno_school_branch_id='$gtfbranchId' order by class_order ";
		
		
		$qgetClassId=$mysqli->query($getClassId);
		while($shgetClassId=$qgetClassId->fetch_assoc()){
										
										$getfClassId=$shgetClassId['borno_school_class_id']; 
                                        $gstclass="select * from borno_school_class where borno_school_class_id='$getfClassId'";
                                        $qgstclass=$mysqli->query($gstclass);
                                        $shgstclass=$qgstclass->fetch_assoc(); 
                                    
                                    ?>
                                <option value=" <?php echo $shgstclass['borno_school_class_id']; ?>" <?php if($shgstclass['borno_school_class_id']==$_POST['studClass']) { echo "selected"; }  ?>> <?php echo $shgstclass['borno_school_class_name']; ?></option>
                              
                                                              <?php 
		}
                               ?>
                              </select></td>
  </tr>
  <tr>
    <td width="15%;" align="center">Shift : </td>
    <td width="15%;" align="center"><input name="sid" type="text" id="sid"   value="<?php echo $shgtduelist['student_id']; ?>"></td>
  </tr>
  <tr>
    <td width="15%;" align="center">Section : </td>
    <td width="15%;" align="center"><input name="sid" type="text" id="sid"   value="<?php echo $shgtduelist['student_id']; ?>"></td>
  </tr>
  <tr>
    <td width="15%;" align="center">Version : </td>
    <td width="15%;" align="center"><input name="sid" type="text" id="sid"   value="<?php echo $shgtduelist['student_id']; ?>"></td>
  </tr>
  <tr>
    <td width="15%;" align="center">Group : </td>
    <td width="15%;" align="center"><input name="sid" type="text" id="sid"   value="<?php echo $shgtduelist['student_id']; ?>"></td>
  </tr>

    <td width="15%;" align="center">Mobile No : </td>
    <td width="15%;" align="center"><input name="contact_no" type="text" id="contact_no"   value="<?php echo $shgtduelist['contact_no']; ?>"></td>
  </tr>
  <tr>
    <td width="15%;" align="center">Amount : </td>
    <td width="15%;" align="center"><input name="amount" type="text" id="amount"   value="<?php echo $shgtduelist['due_amount']; ?>"></td>
  </tr>
  <tr>
    <td width="15%;" align="center">Student Category : </td>
    <td width="15%;" align="center"><input name="sid" type="text" id="sid"   value="<?php echo $shgtduelist['student_id']; ?>"></td>
  </tr>
                              
      
  <?php }} ?>    
  
  <tr>
    <td colspan="8" align="center"><input type="submit" name="button" id="button" value="Update"></td>
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