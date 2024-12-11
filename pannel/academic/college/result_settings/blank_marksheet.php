<?php 
error_reporting(0);
require_once('result_sett_top.php');?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>:: [Result  Settings]::</title>
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
 document.frmcontent.action="blank_marksheet.php";
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
                <h3> Result  Settings </h3>
                
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2> Blank Mark Sheet</h2></div>
                <div class="form">
                    <center>
                    	<form name="frmcontent" action="download_blank_marksheet.php" method="post" enctype="multipart/form-data">
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
    <td class="text_table">Session *</td>
    <td><select name="stsess" id="stsess" onchange="callpage();">
      <option value=""> Select</option>
      <option value="2018-19" <?php if($_POST['stsess']=='2018-19') { echo "selected"; } ?>> 2018-19 </option>
      <option value="2019-20" <?php if($_POST['stsess']=='2019-20') { echo "selected"; } ?>> 2019-20 </option>
      <option value="2020-21" <?php if($_POST['stsess']=='2020-21') { echo "selected"; } ?>> 2020-21 </option>
    </select></td>
  </tr>                                   
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
					$gstclass="select * from borno_school_set_class where borno_school_id='$schId' AND borno_school_branch_id='$gtfbranchId' AND class_order between 14 AND 15";
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
    <td class="text_table">Department*</td>
    <td><select name="dept" id="dept" onchange="callpage();">
      <option value=""> None </option>
      <option value="1" <?php if($_POST['dept']==1) { echo "selected"; } ?>> Science </option>
      <option value="3" <?php if($_POST['dept']==3) { echo "selected"; } ?>> Humanities </option>
      <option value="2" <?php if($_POST['dept']==2) { echo "selected"; } ?>> Business Studies </option>
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
    <td class="text_table">Exam Year *</td>
    <td><select name="styear" id="styear" onchange="callpage();">

<option value="2019" <?php if($_POST['styear']==2019) { echo "selected"; } ?> > 2019 </option>
<option value="2020" <?php if($_POST['styear']==2020) { echo "selected"; } ?> > 2020 </option>
<option value="2021" <?php if($_POST['styear']==2021) { echo "selected"; } ?> > 2021 </option>

    </select></td>
  </tr>
     <tr>

  <?php
 $gtfbranchId=$_POST['branchId'];
 $section=$_POST['section'];
 $stsess=$_POST['stsess'];
 $selTerm=$_POST['selTerm'];
 $dept=$_POST['dept'];
  $styear=$_POST['styear'];

?>
    <td>&nbsp;</td>
    <td><a href="download_blank_marksheet.php?schoolId=<?php echo $schId; ?>&stbranch=<?php echo $gtfbranchId; ?>&classId=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&sectionId=<?php echo $section; ?>&scsess=<?php echo $stsess; ?>&dept=<?php echo $dept; ?>&sctermId=<?php echo $selTerm; ?>&styear=<?php echo $styear; ?>" target="_blank">Show List 1</a></td>
 </tr>  
 <tr>

    <td>&nbsp;</td>
    <td><a href="download_blank_marksheet1.php?schoolId=<?php echo $schId; ?>&stbranch=<?php echo $gtfbranchId; ?>&classId=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&sectionId=<?php echo $section; ?>&scsess=<?php echo $stsess; ?>&dept=<?php echo $dept; ?>&sctermId=<?php echo $selTerm; ?>" target="_blank">Show List 2</a></td>
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