<?php require_once('result_sett_top.php');?>
<!DOCTYPE html>
<html>
<head>
    <title> :: [Result  Settings]:: </title>
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
 document.frmcontent.action="manage_3rd_4th_subject.php";
 document.frmcontent.submit();
}						
	
</script> 
<div class="wrapper">
    <div class="side_main_menu">
        <?php require_once('leftmenu.php');?>	
        <div class="fixed_logo">
<!--            <a href=""><img src="../assets/images/logo.jpg" class="img-fluid"></a>
-->        </div>
    </div><!-- side bar end -->

    <div class="ot_main_content">
        <div class="admin_logout">
            <div class="admin_head">
                <h3 style="font-size:25px"> Result Settings [ <?php echo $shget_schoolName['borno_school_name']; ?> ]</h3>
                
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Manage 3rd And 4th Subject</h2></div>
                <div class="form">
                    <center>
                    	<form name="frmcontent" action="manage_3rd_4th_subject_do.php" method="post" enctype="multipart/form-data">
                        <?php
			$msg=$_GET['msg'];
			if($msg==1) { echo "Manage 3rd AND 4th Subject successful "; }
			else if($msg==2) { echo "Failed"; }

 ?>
                        <table style="border: 1px solid #005067;">
                                               
                         <tr>
    <td class="text_table">Select Branch *</td>
    <td><select name="branchId" id="branchId" onchange="callpage();">
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
    <td class="text_table">Select Class *</td>
    
    <td><select name="studClass" id="studClass" onchange="callpage();">
      <option value="">--Select--</option>
      <?php
					$gtfbranchId=trim($_REQUEST['branchId']);
					$getClassId="select * from borno_school_set_class where borno_school_id='$schId'  AND borno_school_branch_id='$gtfbranchId' and borno_school_class_id!=3 and borno_school_class_id!=4 and borno_school_class_id!=5 and borno_school_class_id!=6 and borno_school_class_id!=7 and borno_school_class_id!=8 and borno_school_class_id!=9 and borno_school_class_id!=10 and borno_school_class_id!=11 and borno_school_class_id!=12 and borno_school_class_id!=13 and borno_school_class_id!=14 and borno_school_class_id!=15 and borno_school_class_id!=18 and borno_school_class_id!=19 and borno_school_class_id!=16 and borno_school_class_id!=17  order by class_order asc";
		
		
		$qgetClassId=$mysqli->query($getClassId);
		while($shgetClassId=$qgetClassId->fetch_assoc()){
										
										$getfClassId=$shgetClassId['borno_school_class_id']; 
                                        $gstclass="select * from borno_school_class where borno_school_class_id='$getfClassId'";
                                        $qgstclass=$mysqli->query($gstclass);
                                        $shgstclass=$qgstclass->fetch_assoc(); 
				
				?>
      <option value=" <?php echo $shgstclass['borno_school_class_id']; ?>" <?php if($shgstclass['borno_school_class_id']==$_REQUEST['studClass']) { echo "selected"; }  ?>> <?php echo $shgstclass['borno_school_class_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
  <tr>
    <td class="text_table">Select Shift *</td>
   
    <td><select name="shiftId" id="shiftId" onchange="callpage();">
      <option value="">--Select--</option>
      <?php
					$studClass=trim($_REQUEST['studClass']);
					$gstshift="select * from borno_school_shift";
					$qggstshift=$mysqli->query($gstshift);
					while($shggstshift=$qggstshift->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $shggstshift['borno_school_shift_id']; ?>" <?php if($shggstshift['borno_school_shift_id']==$_REQUEST['shiftId']) { echo "selected"; }  ?>> <?php echo $shggstshift['borno_school_shift_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
  
  <tr>
    <td class="text_table">Select  Section *</td>
     
    <td >
      <select name="section" id="section" onchange="callpage();">
       <option value="">--Select--</option>
      
        <?php
					$shiftId=trim($_REQUEST['shiftId']);
					$gstsection="select * from borno_school_section where borno_school_class_id='$studClass' AND borno_school_branch_id='$gtfbranchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId'";
					$qgstsection=$mysqli->query($gstsection);
					while($shggstsection=$qgstsection->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $shggstsection['borno_school_section_id']; ?>" <?php if($shggstsection['borno_school_section_id']==$_REQUEST['section']) { echo "selected"; }  ?>> <?php echo $shggstsection['borno_school_section_name']; ?></option>
      <?php } ?>
      
      
      </select>
      
      </td>
  </tr>
  <tr>
    <td class="text_table">Session *</td>
    <td><select name="stsess" id="stsess" onchange="callpage();">
    <option value="">--Select--</option>
      <?php
	  $studClass=trim($_REQUEST['studClass']);
	  
					$data1="select borno_school_session from borno_set_subject_nine_ten where borno_school_id='$schId' and borno_school_class_id='$studClass' group by borno_school_session asc";
					$qdata1=$mysqli->query($data1);
					while($showdata1=$qdata1->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $showdata1['borno_school_session']; ?>" <?php if($showdata1['borno_school_session']==trim($_REQUEST['stsess'])) { echo "selected"; }  ?>> <?php echo $showdata1['borno_school_session']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
  <tr>
    <td class="text_table">Department*</td>
    <td><select name="dept" id="dept" onchange="callpage();">
      <option value="">--Select--</option>
      <option value="1" <?php if($_REQUEST['dept']==1) { echo "selected"; } ?>> Science </option>
      <option value="3" <?php if($_REQUEST['dept']==3) { echo "selected"; } ?>> Humanities </option>
      <option value="2" <?php if($_REQUEST['dept']==2) { echo "selected"; } ?>> Business Studies </option>
    </select></td>
  </tr>
                        </table>
                       <!--</form>-->
                        <br>
                       <!-- <form name="frmcontent1" action="set_3rd_4th_subject_do.php" method="post" enctype="multipart/form-data">-->
                       
                            <table width="400" style="border: 1px solid #005067;">
                              <tr>
                                <td align="center">SL</td>
                               <td align="center">Roll</td>
                                <td align="center">Name</td>
                                <td align="center">3rd Subject</td>
                                <td align="center">4th Subject</td>
                                <td align="center">Action</td>
                              </tr>
                               
                     
                              <tr>
                              <?php
							  
							  $stdstudId=$_REQUEST['stdstudId'];
					if($stdstudId!=""){
						
						$delterm="DELETE from borno_set_subject_nine_ten where borno_student_info_id='$stdstudId'";
						$mysqli->query($delterm);
						}

						$branchId=$_REQUEST['branchId'];
						$studClass=$_REQUEST['studClass'];
						$shiftId=$_REQUEST['shiftId'];
						$section=$_REQUEST['section'];
						$stsess=trim($_REQUEST['stsess']);
						
						$dept=$_REQUEST['dept'];
						
			$getstudinfo="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_school_stud_group='$dept' order by borno_school_roll asc";
			$sl=0;
		
			$qgetstudinfo=$mysqli->query($getstudinfo);
			while($sgetstudinfo=$qgetstudinfo->fetch_assoc()){ $sl++;
			$gtstdid=$sgetstudinfo['borno_student_info_id'];
			
	
	
	 $gsess="select * from borno_set_subject_nine_ten where borno_student_info_id=$gtstdid";
	$qterm=$mysqli->query($gsess);
	$shterm=$qterm->fetch_assoc();
	
	//$gt3rdsubId=$shterm['borno_subject_nine_ten_13sub'];
	//$gt4thsubId=$shterm['borno_subject_nine_ten_4thsub'];
	
	if($shterm['borno_student_info_id']!=""){
	 
   ?>
    	<td align="center"><input name="sl[]" type="text" id="sl[]" size="2" value=" <?php echo  $sl; ?>"></td>
                                <td align="center"><input name="roll[]" type="text" id="roll[]" size="2" value=" <?php echo $sgetstudinfo['borno_school_roll']; ?>">
                                <input type="hidden" name="stdid[]" id="stdid[]" value="<?php echo $sgetstudinfo['borno_student_info_id']; ?>" />
                                
                                
                               </td>
                                
                                
                                <td align="center"><input name="name[]" type="text" id="name[]" size="30" value=" <?php echo $sgetstudinfo['borno_school_student_name']; ?>">
                                
                                </td>
<td align="center">
   <?php
     	$dept=$_POST['dept'];
		if($dept==1){
	 
	 ?>
<select name="sub3rd[]" id="sub3rd[]">
                                   	  <?php
					
					$gssub3rd="select * from borno_subject_nine_ten where borno_subject_nine_ten_dept='1'";
					$qgssub3rd=$mysqli->query($gssub3rd);
					while($shqgssub3rd=$qgssub3rd->fetch_assoc()){$s1++;
				
				?>
               <option value="<?php echo $shterm['borno_subject_nine_ten_13sub']; ?>"<?php if($shterm['borno_subject_nine_ten_13sub']==$shqgssub3rd['borno_subject_nine_ten_id']) { echo "selected"; }  ?>> <?php echo $shqgssub3rd['borno_subject_nine_ten_name']; ?> </option>
               <?php }  ?>   
             </select>
   <?php
		} elseif($dept==2){
	  ?> 
      <select name="sub3rd[]" id="sub3rd[]">
                                   	  <?php 
					
					$gssub3rd="select * from borno_subject_nine_ten where borno_subject_nine_ten_dept='2'";
					$qgssub3rd=$mysqli->query($gssub3rd);
					while($shqgssub3rd=$qgssub3rd->fetch_assoc()){$s1++;
				
				?>
               <option value="<?php echo $shterm['borno_subject_nine_ten_13sub']; ?>"<?php if($shterm['borno_subject_nine_ten_13sub']==$shqgssub3rd['borno_subject_nine_ten_id']) { echo "selected"; }  ?>> <?php echo $shqgssub3rd['borno_subject_nine_ten_name']; ?> </option>
               <?php }  ?>   
             </select>
   <?php
		} elseif($dept==3){
		?>
        <select name="sub3rd[]" id="sub3rd[]">
                                   	  <?php
					
					$gssub3rd="select * from borno_subject_nine_ten where borno_subject_nine_ten_dept='3'";
					$qgssub3rd=$mysqli->query($gssub3rd);
					while($shqgssub3rd=$qgssub3rd->fetch_assoc()){$s1++;
				
				?>
               <option value="<?php echo $shterm['borno_subject_nine_ten_13sub']; ?>"<?php if($shterm['borno_subject_nine_ten_13sub']==$shqgssub3rd['borno_subject_nine_ten_id']) { echo "selected"; }  ?>> <?php echo $shqgssub3rd['borno_subject_nine_ten_name']; ?> </option>
               <?php }  ?>   
             </select>
   <?php
		} 
	  ?>                                                  
                                 </td>
                                  
                                 <td align="center">
                                  <?php
     	$dept=$_POST['dept'];
		if($dept==1){
	 
	 ?>
                                   <select name="sub4th[]" id="sub4th[]">
                                    <?php
					
					$gssub4th="select * from borno_subject_nine_ten where borno_subject_nine_ten_dept='1'";
					$qgssub4th=$mysqli->query($gssub4th);
					while($shqgssub4th=$qgssub4th->fetch_assoc()){$s2++;
				
				?>
               <option value="<?php echo $shterm['borno_subject_nine_ten_4thsub']; ?>"<?php if($shterm['borno_subject_nine_ten_4thsub']==$shqgssub4th['borno_subject_nine_ten_id']) { echo "selected"; }  ?>> <?php echo $shqgssub4th['borno_subject_nine_ten_name']; ?> </option>
      <?php }  ?>   
      </select>
        <?php
		} elseif($dept==2){
	  ?>
          <select name="sub4th[]" id="sub4th[]">
                                    <?php
					
					$gssub4th="select * from borno_subject_nine_ten where borno_subject_nine_ten_dept1='2'";
					$qgssub4th=$mysqli->query($gssub4th);
					while($shqgssub4th=$qgssub4th->fetch_assoc()){$s2++;
				
				?>
               <option value="<?php echo $shterm['borno_subject_nine_ten_4thsub']; ?>"<?php if($shterm['borno_subject_nine_ten_4thsub']==$shqgssub4th['borno_subject_nine_ten_id']) { echo "selected"; }  ?>> <?php echo $shqgssub4th['borno_subject_nine_ten_name']; ?> </option>
      <?php }  ?>   
      </select>
        <?php
		} elseif($dept==3){
	  ?>
      <select name="sub4th[]" id="sub4th[]">
                                    <?php
					
					$gssub4th="select * from borno_subject_nine_ten where borno_subject_nine_ten_dept2='4'";
					$qgssub4th=$mysqli->query($gssub4th);
					while($shqgssub4th=$qgssub4th->fetch_assoc()){$s2++;
				
				?>
               <option value="<?php echo $shterm['borno_subject_nine_ten_4thsub']; ?>"<?php if($shterm['borno_subject_nine_ten_4thsub']==$shqgssub4th['borno_subject_nine_ten_id']) { echo "selected"; }  ?>> <?php echo $shqgssub4th['borno_subject_nine_ten_name']; ?> </option>
      <?php }  ?>   
      </select>
        <?php
		}
		
		
	  ?>
      </td>
      
      <td align="center"><a href="manage_3rd_4th_subject.php?stdstudId=<?php echo $shterm['borno_student_info_id']; ?>&branchId=<?php echo $_POST['branchId'];?>&studClass=<?php echo $_POST['studClass']; ?>&shiftId=<?php echo $_POST['shiftId']; ?>&section=<?php echo $_POST['section']; ?>&stsess=<?php echo $_POST['stsess']; ?>" onClick="return confirm ('Sure to Delete')">Delete</a></td>
  </tr>
  <?php } }  ?>   
                               
                               <tr>
                                <!--<td colspan="4" align="center"><input type="submit" name="button" id="button" value="Update"></td>-->
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
<!--<script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js"></script>-->
</body>
</html>