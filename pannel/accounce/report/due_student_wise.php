<?php require_once('report_sett_top.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>:: [Fees Report]::</title>
    <link rel="stylesheet" type="text/css" href="../../academic/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../academic/assets/css/font-awesome.css">
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
	 document.frmcontent.action="due_correction.php";
	 document.frmcontent.submit();
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
                <h3> Fees Report </h3>
                
            </div>
            <div class="log_out">
                <a href="logout.php"><img src="../../academic/assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body" style="margin-top:5px; margin-left:5px;">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Due List</h2></div>
                <div class="form">
                    <center>
        <form name="frmcontent" method="post" enctype="multipart/form-data">
                        
        <table style="border:1px #000 solid; margin-top:-35px;">
   <tr>
    <td class="text_table">Student ID *</td>
    <td><input type="text" id="sid" name="sid" class="form-control" placeholder="Student ID" value=""/></td>
  </tr>            

  <tr>
<td colspan="2" align="center"><input type="submit" name="button" id="button" value="Show" onclick="return contalt_valid()"></td>
  </tr>
    

       
                        </table>
                        </form> 
                        
                        <br>
                        <form name="frmcontent" action="update_student_due.php" method="post" enctype="multipart/form-data">
                                                  <?php
                                  	$studentid=$_REQUEST['sid'];
                                  	$getstudentinfo="SELECT * FROM `borno_student_info` as si
                                                                INNER JOIN `borno_school_shift` AS ss ON ss.`borno_school_shift_id` = si.`borno_school_shift_id`
                                                                INNER JOIN `borno_school_section` AS sse ON sse.`borno_school_section_id` = si.`borno_school_section_id`
                                                                INNER JOIN `borno_school_class` AS sc ON sc.`borno_school_class_id` = si.`borno_school_class_id`
                                                                INNER JOIN `borno_school_branch` AS sb ON sb.`borno_school_branch_id` = si.`borno_school_branch_id`
                                                                WHERE `borno_student_info_id` = '$studentid'";
		
                                                        		$qgetstudentinfo=$mysqli->query($getstudentinfo);
                                                        		$shqgetstudentinfo=$qgetstudentinfo->fetch_assoc();
                                                        		
                                                        		$studid=$shqgetstudentinfo['borno_student_info_id'];
                                                                $branchid = $shqgetstudentinfo['borno_school_branch_id'];
                                                                $classid = $shqgetstudentinfo['borno_school_class_id'];
                                                               $session = $shqgetstudentinfo['borno_school_session'];
                                  ?>
                                  <table  width="800" border="1" style="border: 1px solid #005067;">
                                  <tr style="background-color: #005067; color: #fff;">
                                      <td>Student ID : <?php echo $studid; ?></td>
                                      <td>Name : <?php echo $shqgetstudentinfo['borno_school_student_name']; ?></td>
                                      <td>Roll : <?php echo $shqgetstudentinfo['borno_school_roll']; ?></td>
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
                                 
                                  
                                  
                                <td align="center">Head</td>
                               <td align="center">Month</td>
                               <td align="center">Due Amount</td>
                                <!--<td align="center">Action</td>-->
                              </tr>
                                <?php
                                
                                    
         
         //	echo $studentid;

			if($studentid!=""){
	  
  		$gtduelist="SELECT `student_fees_id`,`month_name`,`head_name`,`due_amount`,sf.`fees_head_id` FROM `student_fees` AS sf 
  		INNER JOIN fees_head AS fh ON fh.`head_id` = sf.`fees_head_id` AND fh.`branch_id` = $branchid AND fh.`class_id` =$classid AND `stsess` = '$session' 
  		WHERE `due_amount` >=0 AND `student_id` ='$studid' AND `stsess` = '$session' ";
		$sl=0;
		$qgtduelist=$mysqli->query($gtduelist);
		while($shgtduelist=$qgtduelist->fetch_assoc()){
		
		$sl++;
  
  ?>
<tr>
    <td width="16%;" align="center"><?php echo $shgtduelist['head_name']; ?>
    <input type="hidden" name="feesmasterid[]" id="feesmasterid[]" value="<?php echo $shgtduelist['student_fees_id']; ?>" /></td>
    <td width="15%;" align="center"><?php echo $shgtduelist['month_name']; ?></td>
    <td width="12%;" align="center"><input name="due[]" type="text" id="due[]" size="2" tabindex=<?php echo $sl; ?> value="<?php echo $shgtduelist['due_amount']; ?>"></td>
    <!--<td align="center" width="10%;">-->
        <!--<a href="due_details.php?studentId=<?php echo $shgtduelist['student_id'];?>&yeardetails= <?php echo $yeardetails;?>&yearid=<?php echo $fiscalid;?>">Details</a>-->
    <!--</td>-->
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
<script type="text/javascript" src="../../academic/assets/js/jquery-3.2.1.min.js"></script>
</body>
</html>