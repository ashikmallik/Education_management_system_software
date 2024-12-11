<?php require_once('result_top.php'); 
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
<head>
    <title>::[Result]::</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <!-- Meta tag -->
    <meta charset="utf-8">
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <script language="javascript">
	function contalt_valid()
	{
		
		if(document.frmcontent.branchId.value=="")
		{
			alert("Please Select Branch");
			document.frmcontent.branchId.focus();
			return (false);
		}
		
		if(document.frmcontent.studClass.value=="")
		{
			alert("Please Select Class");
			document.frmcontent.studClass.focus();
			return (false);
		}
		
		if(document.frmcontent.shiftId.value=="")
		{
			alert("Please Select Shift");
			document.frmcontent.shiftId.focus();
			return (false);
		}
		
		if(document.frmcontent.section.value=="")
		{
			alert("Please Select Section");
			document.frmcontent.section.focus();
			return (false);
		}
		
		if(document.frmcontent.stsess.value=="")
		{
			alert("Please Select Session");
			document.frmcontent.stsess.focus();
			return (false);
		}
		
		if(document.frmcontent.selTerm.value=="")
		{
			alert("Please Select Term");
			document.frmcontent.selTerm.focus();
			return (false);
		}
		
		
	}
	
	
	function callpage()
	{
	 document.frmcontent.action="tabulation_sheet_ngghs.php";
	 document.frmcontent.submit();
	}
	
	
	
</script>
    
    
</head>
<body>

<div class="wrapper">
    <div class="side_main_menu">
        <div class="top_part_menu">
            <h3>Result    Panel</h3>
            <ul>
               <?php
               		require_once('result_left.php');
			   ?>
            </ul>
             <h3>Average Result</h3>
            <ul>
               <?php
               		require_once('result_bottom.php');
			   ?>
            </ul>
        </div>
        <div class="fixed_logo">
            <a href=""><img src="../assets/images/logo.jpg" class="img-fluid"></a>
        </div>
    </div><!-- side bar end -->

    <div class="ot_main_content">
        <div class="admin_logout">
            <div class="admin_head">
                <h3 style="font-size:25px">Result Panel [ <?php echo $shget_schoolName['borno_school_name']; ?> ] </h3>
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2> Tabulation Sheet</h2></div>
                <div class="form">
               

 
      

 

       

<br>
<form name="frmcontent" id="myform" action="set_fail_do.php" method="post" enctype="multipart/form-data">
<table width="650" border="0" cellspacing="0" cellpadding="0" class="projectlist" align="center">
  <tr>
    <td width="195"><strong>Select Branch *</strong></td>
    <td width="35" align="center"><strong>:</strong></td>
    <td width="420"><select name="branchId" id="branchId" onchange="callpage();">
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
    <td><strong>Select Class *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><select name="studClass" id="studClass" onchange="callpage();">
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
    </select></td>
  </tr>
  <tr>
    <td><strong>Select Shift *</strong></td>
    <td align="center"><strong>:</strong></td>
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
    <td><strong>Select  Section *</strong></td>
    <td align="center"><strong>:</strong></td>
   
    <td><select name="section" id="section" onchange="callpage();">
      <option value="">--Select--</option>
      <?php
                                                
										$gtfbranchId=$_REQUEST['branchId'];
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
    </select></td>
  </tr>
  <tr>
    <td><strong>Session *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td>
    <select name="stsess" id="stsess" onchange="callpage();">
      <option value="">--Select--</option>

      <option value="2022" <?php if($_POST['stsess']==2022) { echo "selected"; } ?>> 2022 </option>
      <option value="2023" <?php if($_POST['stsess']==2023) { echo "selected"; } ?>> 2023 </option>
      <option value="2024" <?php if($_POST['stsess']==2024) { echo "selected"; } ?>> 2024 </option>
    </select></td>
  </tr>
   

  <tr>
    <td><strong>Select Term *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td>
      <select name="selTerm" id="selTerm" onchange="callpage();">
      <option value="">--Select--</option>
	  <?php
	  		$stsess=$_POST['stsess'];
			$schexterm="select * from borno_result_add_term where borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_school_id='$schId'";
			$qschexterm=$mysqli->query($schexterm);
			while($shschexterm=$qschexterm->fetch_assoc()){
	  ?>
        <option value="<?php echo $shschexterm['borno_result_term_id']; ?>" <?php if($shschexterm['borno_result_term_id']==$_REQUEST['selTerm']) { echo "selected"; } ?>><?php echo $shschexterm['borno_result_term_name']; ?></option>
        
      <?php } ?>  
        
      </select>
    </td>
  </tr>
    <?php if($studClass==1 OR $studClass==2) 
   {
	   ?>  
  <tr>
  <td><strong>Select Group *</strong></td>
    <td align="center"><strong>:</strong></td>
     <td><select name="group" id="group" onchange="callpage();">
      <option value="">--Select--</option>
      <option value="1" <?php if($_POST['group']==1) { echo "selected"; } ?> > Science </option>
      <option value="2" <?php if($_POST['group']==2) { echo "selected"; } ?>> Business </option>
      <option value="3" <?php if($_POST['group']==3) { echo "selected"; } ?>> Humanities </option>

      
      </select></td>
      
  </tr>
   <?php } ?>  
  <?php
$gtfbranchId=$_POST['branchId'];
echo $section=$_POST['section'];
$stsess=$_POST['stsess'];
$selTerm=$_POST['selTerm'];
$group=$_POST['group'];



if($studClass==1 OR $studClass==2)
{	
?>

   <tr>

  
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><a href="download_tabulation_sheet1_ngghs.php?schoolId=<?php echo $schId; ?>&stbranch=<?php echo $gtfbranchId; ?>&classId=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&sectionId=<?php echo $section; ?>&scsess=<?php echo $stsess; ?>&sctermId=<?php echo $selTerm; ?>&group=<?php echo $group; ?>" target="_blank">Tabulation Sheet-1</a></td>
 </tr>
 <tr>

  
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><a href="download_tabulation_sheet2_ngghs.php?schoolId=<?php echo $schId; ?>&stbranch=<?php echo $gtfbranchId; ?>&classId=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&sectionId=<?php echo $section; ?>&scsess=<?php echo $stsess; ?>&sctermId=<?php echo $selTerm; ?>&group=<?php echo $group; ?>" target="_blank">Tabulation Sheet-2</a></td>
 </tr>
  <tr>

  
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><a href="download_tabulation_sheet3_ngghs.php?schoolId=<?php echo $schId; ?>&stbranch=<?php echo $gtfbranchId; ?>&classId=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&sectionId=<?php echo $section; ?>&scsess=<?php echo $stsess; ?>&sctermId=<?php echo $selTerm; ?>&group=<?php echo $group; ?>" target="_blank">Tabulation Sheet-3</a></td>
 </tr>
  <tr>

  
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><a href="download_avg_tabulation_sheet_ngghs910.php?schoolId=<?php echo $schId; ?>&stbranch=<?php echo $gtfbranchId; ?>&classId=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&sectionId=<?php echo $section; ?>&scsess=<?php echo $stsess; ?>&sctermId=<?php echo $selTerm; ?>&group=<?php echo $group; ?>" target="_blank">Avg. Tabulation Sheet-1</a></td>
 </tr>
  <tr>

  
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><a href="download_avg_tabulation_sheet_ngghs910_2.php?schoolId=<?php echo $schId; ?>&stbranch=<?php echo $gtfbranchId; ?>&classId=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&sectionId=<?php echo $section; ?>&scsess=<?php echo $stsess; ?>&sctermId=<?php echo $selTerm; ?>&group=<?php echo $group; ?>" target="_blank">Avg. Tabulation Sheet-2</a></td>
 </tr>
 
   <tr>

  
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><a href="download_avg_tabulation_sheet_ngghs910_3.php?schoolId=<?php echo $schId; ?>&stbranch=<?php echo $gtfbranchId; ?>&classId=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&sectionId=<?php echo $section; ?>&scsess=<?php echo $stsess; ?>&sctermId=<?php echo $selTerm; ?>&group=<?php echo $group; ?>" target="_blank">Avg. Tabulation Sheet-3</a></td>
 </tr>
   <?php } elseif($studClass==3 OR $studClass==4 OR $studClass==5){ ?>
   
      <tr>

  
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><a href="download_tabulation_sheet1_ngghs.php?schoolId=<?php echo $schId; ?>&stbranch=<?php echo $gtfbranchId; ?>&classId=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&sectionId=<?php echo $section; ?>&scsess=<?php echo $stsess; ?>&sctermId=<?php echo $selTerm; ?>&group=<?php echo $group; ?>" target="_blank">Tabulation Sheet-1</a></td>
 </tr>
 <tr>

  
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><a href="download_tabulation_sheet2_ngghs.php?schoolId=<?php echo $schId; ?>&stbranch=<?php echo $gtfbranchId; ?>&classId=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&sectionId=<?php echo $section; ?>&scsess=<?php echo $stsess; ?>&sctermId=<?php echo $selTerm; ?>&group=<?php echo $group; ?>" target="_blank">Tabulation Sheet-2</a></td>
 </tr>
  <tr>

  
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><a href="download_tabulation_sheet3_ngghs.php?schoolId=<?php echo $schId; ?>&stbranch=<?php echo $gtfbranchId; ?>&classId=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&sectionId=<?php echo $section; ?>&scsess=<?php echo $stsess; ?>&sctermId=<?php echo $selTerm; ?>&group=<?php echo $group; ?>" target="_blank">Tabulation Sheet-3</a></td>
 </tr>
  <tr>

  
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><a href="download_avg_tabulation_sheet_ngghs68.php?schoolId=<?php echo $schId; ?>&stbranch=<?php echo $gtfbranchId; ?>&classId=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&sectionId=<?php echo $section; ?>&scsess=<?php echo $stsess; ?>&sctermId=<?php echo $selTerm; ?>&group=<?php echo $group; ?>" target="_blank">Avg. Tabulation Sheet-1</a></td>
 </tr>
  <tr>

  
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><a href="download_avg_tabulation_sheet_ngghs68_2.php?schoolId=<?php echo $schId; ?>&stbranch=<?php echo $gtfbranchId; ?>&classId=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&sectionId=<?php echo $section; ?>&scsess=<?php echo $stsess; ?>&sctermId=<?php echo $selTerm; ?>&group=<?php echo $group; ?>" target="_blank">Avg. Tabulation Sheet-2</a></td>
 </tr>
 
   <tr>

  
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><a href="download_avg_tabulation_sheet_ngghs68_3.php?schoolId=<?php echo $schId; ?>&stbranch=<?php echo $gtfbranchId; ?>&classId=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&sectionId=<?php echo $section; ?>&scsess=<?php echo $stsess; ?>&sctermId=<?php echo $selTerm; ?>&group=<?php echo $group; ?>" target="_blank">Avg. Tabulation Sheet-3</a></td>
 </tr>
  <?php } else {?>  
    <tr>
    <td><a href="download_tabulation_legal_sheet_ngghs.php?schoolId=<?php echo $schId; ?>&stbranch=<?php echo $gtfbranchId; ?>&classId=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&sectionId=<?php echo $section; ?>&scsess=<?php echo $stsess; ?>&sctermId=<?php echo $selTerm; ?>" target="_blank">Legal Size</a></td>
    <td>&nbsp;</td>
    <td><a href="download_tabulation_sheet_ngghs.php?schoolId=<?php echo $schId; ?>&stbranch=<?php echo $gtfbranchId; ?>&classId=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&sectionId=<?php echo $section; ?>&scsess=<?php echo $stsess; ?>&sctermId=<?php echo $selTerm; ?>" target="_blank">Tabulation Sheet-1</a></td>
 </tr>
 <tr>

    <td><a href="download_tabulation3_legal_sheet_ngghs.php?schoolId=<?php echo $schId; ?>&stbranch=<?php echo $gtfbranchId; ?>&classId=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&sectionId=<?php echo $section; ?>&scsess=<?php echo $stsess; ?>&sctermId=<?php echo $selTerm; ?>" target="_blank">Legal Size</a></td>
    <td>&nbsp;</td>
    <td><a href="download_tabulation3_sheet_ngghs.php?schoolId=<?php echo $schId; ?>&stbranch=<?php echo $gtfbranchId; ?>&classId=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&sectionId=<?php echo $section; ?>&scsess=<?php echo $stsess; ?>&sctermId=<?php echo $selTerm; ?>" target="_blank">Tabulation Sheet-2</a></td>
 </tr>
 <tr>

    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><a href="download_tabulation4_sheet_ngghs.php?schoolId=<?php echo $schId; ?>&stbranch=<?php echo $gtfbranchId; ?>&classId=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&sectionId=<?php echo $section; ?>&scsess=<?php echo $stsess; ?>&sctermId=<?php echo $selTerm; ?>" target="_blank">Tabulation Sheet-3</a></td>
 </tr>
     <tr>

    <td><a href="download_avgtabulation_legal_sheet_ngghs.php?schoolId=<?php echo $schId; ?>&stbranch=<?php echo $gtfbranchId; ?>&classId=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&sectionId=<?php echo $section; ?>&scsess=<?php echo $stsess; ?>&sctermId=<?php echo $selTerm; ?>" target="_blank">Legal Size</a></td>
    <td>&nbsp;</td>
    <td><a href="download_avg_tabulation_sheet_ngghs.php?schoolId=<?php echo $schId; ?>&stbranch=<?php echo $gtfbranchId; ?>&classId=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&sectionId=<?php echo $section; ?>&scsess=<?php echo $stsess; ?>&sctermId=<?php echo $selTerm; ?>" target="_blank">Avg. Tabulation Sheet-1</a></td>
 </tr>
 <tr>

    <td><a href="download_avgtabulation3_legal_sheet_ngghs.php?schoolId=<?php echo $schId; ?>&stbranch=<?php echo $gtfbranchId; ?>&classId=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&sectionId=<?php echo $section; ?>&scsess=<?php echo $stsess; ?>&sctermId=<?php echo $selTerm; ?>" target="_blank">Legal Size</a></td>
    <td>&nbsp;</td>
    <td><a href="download_avg_tabulation_sheet_ngghs_2.php?schoolId=<?php echo $schId; ?>&stbranch=<?php echo $gtfbranchId; ?>&classId=<?php echo $studClass; ?>&shiftId=<?php echo $shiftId; ?>&sectionId=<?php echo $section; ?>&scsess=<?php echo $stsess; ?>&sctermId=<?php echo $selTerm; ?>" target="_blank">Avg. Tabulation Sheet-2</a></td>
 </tr>
 <?php } ?>   
</table>


</form>
                </div>
            </div>
        </div><!-- Main Body part end -->
    </div><!-- Main Content end -->
</div>

<!--Script part-->
<!--<script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js"></script>-->
</body>
</html>