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
 document.frmcontent.action="4thsubject_list.php";
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
                  <h2> 4th Subject List </h2></div>
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
                                          <option value="">--Select--</option>
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
      <option value="">--Select--</option>
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
      <option value="">--Select--</option>
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
       <option value="">--Select--</option>
      
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
    <td class="text_table">Session *</td>
    <td><select name="stsess" id="stsess" onchange="callpage();">
              <option value="">--Select--</option>
                    <option value="2019" <?php if($_POST['stsess']=='2019') { echo "selected"; } ?>> 2019 </option>                    <option value="2020" <?php if($_POST['stsess']=='2020') { echo "selected"; } ?>> 2020 </option>         
 <option value="2018-19" <?php if($_POST['stsess']=='2018-19') { echo "selected"; } ?>> 2018-19 </option>  
    </select></td>
  </tr>
  <tr>
    <td class="text_table">Group *</td>
    <td><select name="group" id="group" onchange="callpage();">
      <option value="">--Select--</option>
      <option value="1" <?php if($_POST['group']==1) { echo "selected"; } ?> > Science </option>
      <option value="2" <?php if($_POST['group']==2) { echo "selected"; } ?>> Business </option>
      <option value="3" <?php if($_POST['group']==3) { echo "selected"; } ?>> Humanities </option>

      
      </select></td>
  </tr>
 
    
    <?php
 $gtfbranchId=$_POST['branchId'];
 $studClass=$_POST['studClass'];
 $shiftId=$_POST['shiftId'];
 $section=$_POST['section'];
 $stsess=$_POST['stsess'];
 $group=$_POST['group'];
 


?>                      
                
                  <tr>


    <td>&nbsp;</td>
    <td><a href="download_4thsubject_list.php?schoolId=<?php echo $schId; ?>&stbranch=<?php echo $gtfbranchId; ?>&classId=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&sectionId=<?php echo $section; ?>&scsess=<?php echo $stsess; ?>&group=<?php echo $group; ?>" target="_blank">Show 4th Subject List</a></td>
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