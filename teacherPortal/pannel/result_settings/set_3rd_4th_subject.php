<?php require_once('result_sett_top.php');

	$query="SELECT * FROM `borno_set_class_teacher` WHERE `borno_school_teacher_id`='$teacherid'";

								
									$rsquery =$mysqli->query($query);								

									$result=$rsquery->fetch_assoc();
									$branch=$result['borno_school_branch_id'];
									$shift=$result['borno_school_shift_id'];
									$session=$result['borno_school_session'];
									$class=$result['borno_school_class_id'];
									$secid=$result['borno_school_section_id'];
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title> :: [Result  Settings]:: </title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <!-- Meta tag -->
    
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
</head>
<body>
</script>

<script language="javascript">
	
function callpage()
{
 document.frmcontent.action="set_3rd_4th_subject.php";
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
                <h3> Result Settings [ <?php echo $shget_schoolName['borno_school_name']; ?> ]</h3>
                
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Set 3rd And 4th Subject</h2></div>
                <div class="form">
                    <center>
                    	<form name="frmcontent" action="set_3rd_4th_subject_do.php" method="post" enctype="multipart/form-data">
                        <?php
			$msg=$_GET['msg'];
	 if($msg==3) { echo "You already create 3rd AND 4th Subject"; }
			else if($msg==1) { echo "Set 3rd AND 4th Subject successful "; }
			else if($msg==2) { echo "Failed"; }

 ?>
                        <table style="border: 1px solid #005067;">
                                               
                         <tr>
    <td class="text_table">Select Branch *</td>
    <td><select name="branchId" id="branchId" onchange="callpage();">
      <option value="">--Select--</option>
      <?php
                                        if(empty($branch)){
					$data="select * from borno_school_branch where borno_school_id='$schId'";
                    }
                    else{
                        $data="select * from borno_school_branch where borno_school_branch_id='$branch'";
                    }
		
					$qdata=$mysqli->query($data);
					while($showdata=$qdata->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $showdata['borno_school_branch_id']; ?>" <?php if($showdata['borno_school_branch_id']==$_REQUEST['branchId']) { echo "selected"; }  ?>> <?php echo $showdata['borno_school_branch_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
  <tr>
    <td class="">Select Class *</td>
    
    <td>
    <select name="studClass" id="studClass" onChange="callpage();">
                                <option value="">--Select--</option>
                                <?php  
                                
                                if(empty($class)){
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
                                }
                                else{
                                 $gstclass="select * from borno_school_class where borno_school_class_id IN (SELECT borno_school_class_id FROM `borno_set_class_teacher` WHERE `borno_school_teacher_id`='$teacherid')";
                                        $qgstclass=$mysqli->query($gstclass);
                                         
                                        while($shgstclass=$qgstclass->fetch_assoc()){ $sl++;
                              ?>
                              										
                                     
                                    
                              
                                <option value=" <?php echo $shgstclass['borno_school_class_id']; ?>" <?php if($shgstclass['borno_school_class_id']==$_POST['studClass']) { echo "selected"; }  ?>> <?php echo $shgstclass['borno_school_class_name']; ?></option>
                              
                              <?php
                                        }
                              }?>
                              </select>

    </td>
  </tr>
  <tr>
    <td class="text_table">Select Shift *</td>
   
    <td><select name="shiftId" id="shiftId" onchange="callpage();">
      <option value="">--Select--</option>
      <?php
					$studClass=$_REQUEST['studClass'];
										if(empty($shift)){
					$gstshift="select * from borno_school_shift";
					}
					else{
					    $gstshift="select * from borno_school_shift Where borno_school_shift_id IN (SELECT borno_school_shift_id FROM `borno_set_class_teacher` WHERE `borno_school_teacher_id`='$teacherid')";
					}
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
					$shiftId=$_REQUEST['shiftId'];
									if(empty($secid)){
					$gstsection="select * from borno_school_section where borno_school_class_id='$studClass' AND borno_school_branch_id='$gtfbranchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId'";
					}
					else{
					    $gstsection="select * from borno_school_section where borno_school_section_id IN (SELECT borno_school_section_id FROM `borno_set_class_teacher` WHERE `borno_school_teacher_id`='$teacherid') ";
					}
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

      <option value="2021" <?php if($_POST['stsess']==2021) { echo "selected";} ?>> 2021 </option>
            <option value="2022" <?php if($_POST['stsess']==2022) { echo "selected";} ?>> 2022 </option>
      <option value="2023" <?php if($_POST['stsess']==2023) { echo "selected";} ?>> 2023 </option>
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
    <tr>
    <td class="text_table">Common 4th Subject*</td>
    <td><select name="subject4th" id="subject4th" onchange="callpage();">
      <option value="">--Select--</option>
      <?php      
      $dept=$_REQUEST['dept'];
      
      	if($dept==2) {  
			
			$fourthsubj1="select * from borno_subject_nine_ten where borno_subject_nine_ten_dept1=2";
			
			} 
			else if($dept==3) {  
			
			$fourthsubj1="select * from borno_subject_nine_ten where borno_subject_nine_ten_dept2=4";
			
			} else {
				$fourthsubj1="select * from borno_subject_nine_ten where borno_subject_nine_ten_dept='$dept'";
				}
			
			
			$qfourthsubj1=$mysqli->query($fourthsubj1);
	        while($shfourthsubj1=$qfourthsubj1->fetch_assoc()){
		?>
   <option value="<?php echo $shfourthsubj1['borno_subject_nine_ten_id']; ?>" <?php if($_REQUEST['subject4th']==$shfourthsubj1['borno_subject_nine_ten_id']){ echo "selected"; }
   ?>> <?php echo $shfourthsubj1['borno_subject_nine_ten_name']; ?></option>
      <?php } ?>
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
                              </tr>
                               
                     
                              <tr>
                              <?php

						$branchId=$_POST['branchId'];
						$studClass=$_POST['studClass'];
						$shiftId=$_POST['shiftId'];
						$section=$_POST['section'];
						$stsess=$_POST['stsess'];
						$dept=$_POST['dept'];
						$subject4th=$_POST['subject4th'];
			
			if($subject4th!=""){
			$fourthsubj2="select * from borno_subject_nine_ten where borno_subject_nine_ten_id=$subject4th";	
			$qfourthsubj2=$mysqli->query($fourthsubj2);
	        $shfourthsubj2=$qfourthsubj2->fetch_assoc();
			}
			
			
            $getstudinfo="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_school_stud_group='$dept'  order by borno_school_roll asc";
			$sl=0;
		
			$qgetstudinfo=$mysqli->query($getstudinfo);
			while($sgetstudinfo=$qgetstudinfo->fetch_assoc()){ $sl++;
		 
   ?>
    	<td align="center"><input name="sl[]" type="text" id="sl[]" size="2" value=" <?php echo  $sl; ?>"></td>
                                <td align="center"><input name="roll[]" type="text" id="roll[]" size="2" value=" <?php echo $sgetstudinfo['borno_school_roll']; ?>">
                                <input type="hidden" name="stdid[]" id="stdid[]" value="<?php echo $sgetstudinfo['borno_student_info_id']; ?>" />
                                
                                
                                </td>
                                
                                
                                <td align="center"><input name="name[]" type="text" id="name[]" size="30" value=" <?php echo $sgetstudinfo['borno_school_student_name']; ?>">
                                
                                </td>
                                
                                 <td align="center">
                                 
                   <?php
     	$dept=$_REQUEST['dept'];
		if($dept==1){
	 
	 ?>
       <select name="sub3rd[]" id="sub3rd[]">
        <option value="14"> Biology </option>
 <option value="15"> Higher Math </option>
        
      </select>
  <?php
		} else if($dept==2){
	  ?>
          <select name="sub3rd[]" id="sub3rd[]">
          <option value="27"> Finance & Banking </option>

        
      </select>
       <?php } else if($dept==3) {  ?> 
       <select name="sub3rd[]" id="sub3rd[]">
     	<option value="21"> Economics/Civics </option>
     		<option value="31"> Civics </option> 

        
      </select>
         <?php }  ?>  
                                
                                 </td>
                                 
                                 <td align="center">
                                 
                                   <select name="sub4th[]" id="sub4th[]">
 <option value="<?php echo $shfourthsubj2['borno_subject_nine_ten_id']; ?>"> <?php echo $shfourthsubj2['borno_subject_nine_ten_name']; ?> </option>                                               
<?php
			
			if($dept==2) {  
			
			$fourthsubj="select * from borno_subject_nine_ten where borno_subject_nine_ten_dept1=2";
			
			} 
			else if($dept==3) {  
			
			$fourthsubj="select * from borno_subject_nine_ten where borno_subject_nine_ten_dept2=4";
			
			} else {
				$fourthsubj="select * from borno_subject_nine_ten where borno_subject_nine_ten_dept='$dept' OR borno_subject_nine_ten_13th=4";
				}
			
			
			$qfourthsubj=$mysqli->query($fourthsubj);
	        while($shfourthsubj=$qfourthsubj->fetch_assoc()){
		?>
<option value="<?php echo $shfourthsubj['borno_subject_nine_ten_id']; ?>"> <?php echo $shfourthsubj['borno_subject_nine_ten_name']; ?></option>
      <?php } ?>
  
      </select></td>
  </tr>
  <?php }  ?>   
                               
                               <tr>
                                <td colspan="4" align="center"><input type="submit" name="button" id="button" value="Set"></td>
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