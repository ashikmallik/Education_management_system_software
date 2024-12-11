<?php
error_reporting(0);
require_once('result_sett_top.php');

?>
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
 document.frmcontent.action="admit_card.php";
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
                  <h2> Admit Card </h2></div>
                <div class="form">
                    <center>
                    	<form name="frmcontent" action="download_admit_card.php" method="post" enctype="multipart/form-data">
                        <?php
			$msg=$_GET['msg'];
			if($msg==1) { echo "Your marks less than 100 it's must be sum of 100"; }
			else if($msg==2) { echo "Your marks more than 100 it's must be sum of 100"; }
			else if($msg==3) { echo "No data Found"; }
			else if($msg==4) { echo "Manage Term successful "; }
			else if($msg==5) { echo "Failed"; }

 ?>
                        <table style="border: 1px solid #005067;">
                                               
                             <tr>
                                <td class="text_table">Select Branch *</td>
                                <td>
                                        <select name="branchId" id="branchId" onchange="callpage();">
                                          <option value=""> Select Branch </option>
                                          <?php
                                                        $data="select * from borno_school_branch where borno_school_id='$schId'";
                                                        $qdata=$mysqli->query($data);
                                                        while($showdata=$qdata->fetch_assoc()){ 
                                                    
                                                    ?>
                                          <option value=" <?php echo $showdata['borno_school_branch_id']; ?>" <?php if($showdata['borno_school_branch_id']==$_REQUEST['branchId']) { echo "selected"; }  ?>> <?php echo $showdata['borno_school_branch_name']; ?></option>
                                          <?php } ?>
                                        </select>
                                </td>
                              </tr> 
                              
                                
                         <tr>
    <td class="text_table">Select Class *</td>
    
    <td><select name="studClass" id="studClass" onchange="callpage();">
      <option value=""> Select Class</option>
     <?php
	 				$gtfbranchId=$_POST['branchId'];
					$gstclass="select * from borno_school_set_class where borno_school_id='$schId' AND borno_school_branch_id='$gtfbranchId' order by class_order asc";
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
    <td class="text_table">Select Shift *</td>
   
    <td><select name="shiftId" id="shiftId" onchange="callpage();">
      <option value=""> Select Shift</option>
      <?php
					$studClass=$_REQUEST['studClass'];
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
       <option value=""> Select Section</option>
      
        <?php
					$shiftId=$_REQUEST['shiftId'];
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
   <?php $curyear= date("Y"); 
  $descuryear=$curyear-1;
  $inccuryear=$curyear+1;
  ?>
  
  <tr>
    <td class="text_table">Session *</td>
    <td><select name="stsess" id="stsess" onchange="callpage();">
        <option value=""> Select Session</option>
    <option value="<?php echo $descuryear; ?>" <?php if($descuryear==$_REQUEST['stsess']) { echo "selected"; }  ?>> <?php echo $descuryear; ?> </option>
       <option value="<?php echo $curyear; ?>" <?php if($curyear==$_REQUEST['stsess']) { echo "selected"; }  ?>> <?php echo $curyear; ?> </option>
       <option value="<?php echo $inccuryear; ?>" <?php if($inccuryear==$_REQUEST['stsess']) { echo "selected"; }  ?>> <?php echo $inccuryear; ?> </option>
    </select></td>
  </tr>
  <tr>
    <td class="text_table">Term *</td>
    <td><select name="selTerm" id="selTerm" onchange="callpage();">
        <option value=""> Select </option>
        <?php
			$stsess=$_POST['stsess'];
			$schexterm="select * from borno_result_add_term where borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_school_id='$schId'";
			$qschexterm=$mysqli->query($schexterm);
			while($shschexterm=$qschexterm->fetch_assoc()){
	  ?>
        <option value="<?php echo $shschexterm['borno_result_term_id']; ?>" <?php if($shschexterm['borno_result_term_id']==$_POST['selTerm']) { echo "selected"; } ?>><?php echo $shschexterm['borno_result_term_name']; ?></option>
        
        <?php } ?>  
        
        </select></td>
  </tr>
 
  <tr>
    <td class="text_table">Roll *</td>
    <td><select name="roll" id="roll" onchange="callpage();">
        <option value=""> Select </option>
        <?php
			$stsess=$_POST['stsess'];
			$branchId=$_POST['branchId'];
			$section=$_POST['section'];
			$schexroll="select * from borno_student_info where borno_school_id='$schId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' order by borno_school_roll asc";
			$qschexroll=$mysqli->query($schexroll);
			while($shschexroll=$qschexroll->fetch_assoc()){
	  ?>
        <option value="<?php echo $shschexroll['borno_school_roll']; ?>" <?php if($shschexroll['borno_school_roll']==$_POST['roll']) { echo "selected"; } ?>><?php echo $shschexroll['borno_school_roll']; ?></option>
        
        <?php } ?>  
        
        </select></td>
  </tr>       
    <?php
 $gtfbranchId=$_POST['branchId'];
 $section=$_POST['section'];
 $stsess=$_POST['stsess'];
 $selTerm=$_POST['selTerm'];
 $roll=$_POST['roll'];

if($selTerm!="")
{
?>                      
 <?php if($schId!=51) { ?>                  
                  <tr>


    <td>&nbsp;</td>
    <td><a href="download_admit_card.php?schoolId=<?php echo $schId; ?>&stbranch=<?php echo $gtfbranchId; ?>&classId=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&sectionId=<?php echo $section; ?>&scsess=<?php echo $stsess; ?>&sctermId=<?php echo $selTerm; ?>" target="_blank">Show Admit Section Wise</a></td>
 </tr> 
  <tr>


    <td>&nbsp;</td>
    <td><a href="download_admit_card2.php?schoolId=<?php echo $schId; ?>&stbranch=<?php echo $gtfbranchId; ?>&classId=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&sectionId=<?php echo $section; ?>&scsess=<?php echo $stsess; ?>&sctermId=<?php echo $selTerm; ?>" target="_blank">Show Admit Class Wise</a></td>
 </tr>
  <tr>


    <td>&nbsp;</td>
    <td><a href="download_admit_card3.php?schoolId=<?php echo $schId; ?>&stbranch=<?php echo $gtfbranchId; ?>&classId=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&sectionId=<?php echo $section; ?>&scsess=<?php echo $stsess; ?>&sctermId=<?php echo $selTerm; ?>" target="_blank">Show Admit Shift Wise</a></td>
 </tr> 
 <tr>


    <td>&nbsp;</td>
    <td><a href="download_admit_card4.php?schoolId=<?php echo $schId; ?>&stbranch=<?php echo $gtfbranchId; ?>&classId=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&sectionId=<?php echo $section; ?>&scsess=<?php echo $stsess; ?>&sctermId=<?php echo $selTerm; ?>&roll=<?php echo $roll; ?>" target="_blank">Show Admit Individual</a></td>
 </tr> 
 <?php } if($schId==51) { ?>
 <tr>


    <td>&nbsp;</td>
    <td><a href="download_admit_card1.php?schoolId=<?php echo $schId; ?>&stbranch=<?php echo $gtfbranchId; ?>&classId=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&sectionId=<?php echo $section; ?>&scsess=<?php echo $stsess; ?>&sctermId=<?php echo $selTerm; ?>" target="_blank">Show Admit</a></td>
 </tr>  
 <?php } ?>
       <?php }?>                 </table>
                        
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