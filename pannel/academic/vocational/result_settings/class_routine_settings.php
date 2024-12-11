<?php require_once('result_sett_top.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>:: [Class Routine Settings]::</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <!-- Meta tag -->
    <meta charset="utf-8">
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
</head>
<body>

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
                <h3> Result Settings </h3>
                
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Class Routine Set</h2></div>
                <div class="form">
                    <center>


<script language="javascript">
function callpage()
{
	 document.frmcontent.action="class_routine_settings.php";
	 document.frmcontent.submit();
}
</script>

<script language="javascript">
	function contalt_valid()
	{
		if(document.frmcontent.branchId.value=="")
		{
			alert("Please Select Branch");
			document.frmcontent.branchId.focus();
			return (false);
		}
		if(document.frmcontent.shiftId.value=="")
		{
			alert("Please Select Shift");
			document.frmcontent.shiftId.focus();
			return (false);
		}

	if(document.frmcontent.stsess.value=="")
		{
			alert("Please Select Session");
			document.frmcontent.stsess.focus();
			return (false);
		}
	if(document.frmcontent.teacherid.value=="")
		{
			alert("Please Select Teacher");
			document.frmcontent.teacherid.focus();
			return (false);
		}
	if(document.frmcontent.dayid.value=="")
		{
			alert("Please Select Day");
			document.frmcontent.dayid.focus();
			return (false);
		}
						
	}
</script> 


<form name="frmcontent" action="set_routine_do.php" method="post" enctype="multipart/form-data">

<table width="400" border="0" cellspacing="0" cellpadding="0" align="center" class="projectlist">

    <tr>
    <td colspan="3" align="center" style="color: #FE0000; font-size:24px">
    	<?php
        	$msg=$_GET['msg'];
			if($msg==1) { echo "Routine Set Successfully"; } else if($msg==2) { echo "Failed"; }  else if($msg==3) { echo "Already Exist"; } 
		?>
    </td>
    </tr>
  <tr>
    <td><strong>Select Branch *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><select name="branchId" id="branchId" onchange="callpage();">
      <option value=""> --Select-- </option>
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
    <td><strong>Select Shift *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><select name="shiftId" id="shiftId" onchange="callpage();">
      <option value=""> --Select-- </option>
      <?php
					
					$gstshift="select * from borno_school_shift";
					$qggstshift=$mysqli->query($gstshift);
					while($shggstshift=$qggstshift->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $shggstshift['borno_school_shift_id']; ?>" <?php if($shggstshift['borno_school_shift_id']==$_REQUEST['shiftId']) { echo "selected"; }  ?>> <?php echo $shggstshift['borno_school_shift_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
  
  <tr>
    <td><strong>Select Teacher *</strong></td>
    <td align="center"><strong>:</strong></td>
    
    <td>
      <select name="teacherid" id="teacherid"  onchange="callpage();">
      <option value=""> --Select-- </option>
		  <?php
                        $branchId=$_REQUEST['branchId'];
                        $shiftId=$_REQUEST['shiftId'];
                        $gstteacher="select * from borno_teacher_info where borno_school_id='$schId'  and borno_school_shift_id='$shiftId' AND borno_school_branch_id='$branchId'";
                        $qgstteacher=$mysqli->query($gstteacher);
                        while($shgstteacher=$qgstteacher->fetch_assoc()){ $sl++;				
         ?>
        <option value=" <?php echo $shgstteacher['borno_teacher_info_id']; ?>" <?php if($shgstteacher['borno_teacher_info_id']==$_REQUEST['teacherid']) { echo "selected"; }  ?>> <?php echo $shgstteacher['borno_teacher_name']; ?></option>
        
        <?php } ?>
        
      </select>
    </td>
  </tr>
  <tr>
  <td><strong>Session *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><select name="stsess" id="stsess" onchange="callpage();">
      <option value=""> --Select-- </option>
      <option value="2019" <?php if($_REQUEST['stsess']==2019) { echo "selected"; } ?>> 2019 </option>
      <option value="2020" <?php if($_REQUEST['stsess']==2020) { echo "selected"; } ?>> 2020 </option>
      <option value="2021" <?php if($_REQUEST['stsess']==2021) { echo "selected"; } ?>> 2021 </option>
    </select></td>
  </tr>
  
  
    
   
   
      
      <tr>
  <td><strong>Day *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td>
    <select name="dayid" id="dayid" onchange="callpage();">
      <option value=""> --Select-- </option>
      <option value="1" <?php if($_POST['dayid']==1) { echo "selected"; } ?> > Saturday </option>
      <option value="2" <?php if($_POST['dayid']==2) { echo "selected"; } ?>> Sunday </option>
      <option value="3" <?php if($_POST['dayid']==3) { echo "selected"; } ?>> Monday </option>
      <option value="4" <?php if($_POST['dayid']==4) { echo "selected"; } ?>> Tuesday </option>
      <option value="5" <?php if($_POST['dayid']==5) { echo "selected"; } ?>> Wednesday </option>
      <option value="6" <?php if($_POST['dayid']==6) { echo "selected"; } ?>> Thursday </option>
      <option value="7" <?php if($_POST['dayid']==7) { echo "selected"; } ?>> Friday </option>      
    </select></td>
  </tr>
      
</table>

<br>
<table width="500" border="0" cellspacing="0" cellpadding="0" align="center" class="projectlist">
  <tr align="center">
    <th bgcolor="#99CC00" align="center">Period</th>
    <th bgcolor="#99CC00" align="center">Class</th>
    <th bgcolor="#99CC00" align="center">Section</th>
    <th bgcolor="#99CC00" align="center">Subject</th>
    <th bgcolor="#99CC00" align="center">Time</th>
  </tr>
  <tr>
    <td align="center" >      <strong>
      <input type="text"  value="First"  size="10" disabled>
      <input type="hidden" name="firstp" id="firstp" value="First" />
    </strong></td>
       
    <td align="center" >
      <select style="width:100px; height:25px;" name="studClass1" id="studClass1" onchange="callpage();">
      <option value=""> --Select-- </option>
      <?php
					$gtfbranchId=$_REQUEST['branchId'];


$gstclass="select * from borno_school_set_class where borno_school_id='$schId' and borno_school_branch_id='$gtfbranchId' order by class_order asc";
					$qgstclass=$mysqli->query($gstclass);
					while($shgstclass=$qgstclass->fetch_assoc()){ $sl++;
				
					$getfClassId=$shgstclass['borno_school_class_id']; 
                    $gstclass1="select * from borno_school_class where borno_school_class_id='$getfClassId'";
                                        $qgstclass1=$mysqli->query($gstclass1);
                                        $shgstclass1=$qgstclass1->fetch_assoc(); 

				
				?>
      <option value=" <?php echo $shgstclass1['borno_school_class_id']; ?>" <?php if($shgstclass1['borno_school_class_id']==$_REQUEST['studClass1']) { echo "selected"; }  ?>> <?php echo $shgstclass1['borno_school_class_name']; ?></option>
      <?php } ?>
    </select>
    </td>
      
    <td align="center" >
    	<select style="width:100px; height:25px;" name="studSection1" id="studSection1" onchange="callpage();">      
          <option value=""> --Select-- </option>      
        <?php
					$shiftId=$_REQUEST['shiftId'];
					$studClass1=$_REQUEST['studClass1'];
										
					$gstsection="select * from borno_school_section where borno_school_class_id='$studClass1' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId'";
					$qgstsection=$mysqli->query($gstsection);
					while($shggstsection=$qgstsection->fetch_assoc()){ $sl++;				
				?>
      <option value=" <?php echo $shggstsection['borno_school_section_id']; ?>" <?php if($shggstsection['borno_school_section_id']==$_REQUEST['studSection1']) { echo "selected"; }  ?>> <?php echo $shggstsection['borno_school_section_name']; ?></option>
      <?php } ?>      
    </select>
    </td>
   			
   
    <td align="center" >
      <select style="width:100px; height:25px;" name="sub1" id="sub1" onchange="callpage();">
      
          <option value=""> --Select-- </option>
      
        <?php
					
				     $studClass1=$_REQUEST['studClass1'];
					$stsess=$_REQUEST['stsess'];
					
					if($studClass1=='1' OR  $studClass1=='2'){					
					
					
			$gsubjNamesixeight="select * from borno_result_subject_voc where borno_school_class_id='$studClass1' AND borno_school_session='$stsess' AND borno_school_id='$schId'";
			$qgsubjNamesixeight=$mysqli->query($gsubjNamesixeight);
			while($shgsubjNamesixeight=$qgsubjNamesixeight->fetch_assoc()){	
							
		?>
      <option value="<?php echo $shgsubjNamesixeight['borno_result_subject_id']; ?>"<?php if($shgsubjNamesixeight['borno_result_subject_id']==$_POST['sub1']) { echo "selected"; } ?>> <?php echo $shgsubjNamesixeight['borno_school_subject_name']; ?></option>
      <?php 
	  	}
			}
		?>
        
      
    </select>
    </td>
    
      <td align="center" ><label for="time1"></label>
      <input name="time1" type="text" id="time1" size="10"></td>
  </tr>
  <tr>
    <td align="center"><label for=""></label>
      <input  type="text" value="Second" size="10" disabled>
      <input type="hidden" name="secondp" id="secondp" value="Second" /></td>
    <td align="center" >
    <select style="width:100px; height:25px;" name="studClass2" id="studClass2" onchange="callpage();">
      <option value=""> --Select-- </option>
      <?php
					$gtfbranchId=$_REQUEST['branchId'];
$gstclass1="select * from borno_school_set_class where borno_school_id='$schId' and borno_school_branch_id='$gtfbranchId' order by class_order asc";
					$qgstclass1=$mysqli->query($gstclass1);
					while($shgstclass1=$qgstclass1->fetch_assoc()){ $sl++;
				
					$getfClassId1=$shgstclass1['borno_school_class_id']; 
                    $gstclass11="select * from borno_school_class where borno_school_class_id='$getfClassId1'";
                                        $qgstclass11=$mysqli->query($gstclass11);
                                        $shgstclass11=$qgstclass11->fetch_assoc(); 
				
				?>
      <option value=" <?php echo $shgstclass11['borno_school_class_id']; ?>" <?php if($shgstclass11['borno_school_class_id']==$_REQUEST['studClass2']) { echo "selected"; }  ?>> <?php echo $shgstclass11['borno_school_class_name']; ?></option>
      <?php } ?>
    </select></td>
    <td align="center" >
    <select style="width:100px; height:25px;" name="studSection2" id="studSection2" onchange="callpage();">      
          <option value=""> --Select-- </option>      
        <?php
					$shiftId=$_REQUEST['shiftId'];
					$studClass2=$_REQUEST['studClass2'];
										
					$gstsection1="select * from borno_school_section where borno_school_class_id='$studClass2' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId'";
					$qgstsection1=$mysqli->query($gstsection1);
					while($shggstsection1=$qgstsection1->fetch_assoc()){ $sl++;				
				?>
      <option value=" <?php echo $shggstsection1['borno_school_section_id']; ?>" <?php if($shggstsection1['borno_school_section_id']==$_REQUEST['studSection2']) { echo "selected"; }  ?>> <?php echo $shggstsection1['borno_school_section_name']; ?></option>
      <?php } ?>      
    </select>    
      </td>
    <td align="center" >
    <select style="width:100px; height:25px;" name="sub2" id="sub2" onchange="callpage();">
      
          <option value=""> --Select-- </option>
      
        <?php
					$studClass2=$_REQUEST['studClass2'];
					$stsess=$_REQUEST['stsess'];
					
	if($studClass2=='1' OR  $studClass2=='2'){					
					
					
			$gsubjNamesixeight1="select * from borno_result_subject_voc where borno_school_class_id='$studClass2' AND borno_school_session='$stsess' AND borno_school_id='$schId'";
			$qgsubjNamesixeight1=$mysqli->query($gsubjNamesixeight1);
			while($shgsubjNamesixeight1=$qgsubjNamesixeight1->fetch_assoc()){	
							
		?>
      <option value="<?php echo $shgsubjNamesixeight1['borno_result_subject_id']; ?>"<?php if($shgsubjNamesixeight1['borno_result_subject_id']==$_POST['sub2']) { echo "selected"; } ?>> <?php echo $shgsubjNamesixeight1['borno_school_subject_name']; ?></option>
      <?php 
	  	}
			}

	  ?>
      
      
      
    </select>
      </td>
    <td align="center" ><label for="time2"></label>
      <input name="time2" type="text" id="time2" size="10"></td>
  </tr>
  <tr>
    <td align="center"><label for="thirdp"></label>
      <input type="text"  name="thirdp"  id="thirdp" value="Third"  size="10" disabled>
      <input type="hidden" name="thirdp" id="thirdp" value="Third"/></td>
    <td align="center" >
    <select style="width:100px; height:25px;" name="studClass3" id="studClass3" onchange="callpage();">
      <option value=""> --Select-- </option>
      <?php
					$gtfbranchId=$_REQUEST['branchId'];

$gstclass2="select * from borno_school_set_class where borno_school_id='$schId' and borno_school_branch_id='$gtfbranchId' order by class_order asc";
					$qgstclass2=$mysqli->query($gstclass2);
					while($shgstclass2=$qgstclass2->fetch_assoc()){ $sl++;
				
					$getfClassId2=$shgstclass2['borno_school_class_id']; 
                    $gstclass12="select * from borno_school_class where borno_school_class_id='$getfClassId2'";
                                        $qgstclass12=$mysqli->query($gstclass12);
                                        $shgstclass12=$qgstclass12->fetch_assoc(); 
				
				?>
      <option value=" <?php echo $shgstclass12['borno_school_class_id']; ?>" <?php if($shgstclass12['borno_school_class_id']==$_REQUEST['studClass3']) { echo "selected"; }  ?>> <?php echo $shgstclass12['borno_school_class_name']; ?></option>
      <?php } ?>
    </select>
    </td>
    <td align="center" >
    <select style="width:100px; height:25px;" name="studSection3" id="studSection3" onchange="callpage();">      
          <option value=""> --Select-- </option>      
        <?php
					$shiftId=$_REQUEST['shiftId'];
					$studClass3=$_REQUEST['studClass3'];
										
					$gstsection2="select * from borno_school_section where borno_school_class_id='$studClass3' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId'";
					$qgstsection2=$mysqli->query($gstsection2);
					while($shggstsection2=$qgstsection2->fetch_assoc()){ $sl++;				
				?>
      <option value=" <?php echo $shggstsection2['borno_school_section_id']; ?>" <?php if($shggstsection2['borno_school_section_id']==$_REQUEST['studSection3']) { echo "selected"; }  ?>> <?php echo $shggstsection2['borno_school_section_name']; ?></option>
      <?php } ?>      
    </select>
    
      </td>
    <td align="center" >
    <select style="width:100px; height:25px;" name="sub3" id="sub3" onchange="callpage();">
      
          <option value=""> --Select-- </option>
      
        <?php
					$studClass3=$_REQUEST['studClass3'];
					$stsess=$_REQUEST['stsess'];
					
		if($studClass3=='1' OR  $studClass3=='2'){					
					
					
			$gsubjNamesixeight2="select * from borno_result_subject_voc where borno_school_class_id='$studClass3' AND borno_school_session='$stsess' AND borno_school_id='$schId'";
			$qgsubjNamesixeight2=$mysqli->query($gsubjNamesixeight2);
			while($shgsubjNamesixeight2=$qgsubjNamesixeight2->fetch_assoc()){	
							
		?>
      <option value="<?php echo $shgsubjNamesixeight2['borno_result_subject_id']; ?>"<?php if($shgsubjNamesixeight2['borno_result_subject_id']==$_POST['sub3']) { echo "selected"; } ?>> <?php echo $shgsubjNamesixeight2['borno_school_subject_name']; ?></option>
      <?php 
	  	}
			}

	   ?>
      
    </select>
      </td>
     <td align="center" ><label for="time3"></label>
      <input name="time3" type="text" id="time3" size="10"></td>
  </tr>
  <tr>
    <td align="center"><label for=""></label>
      <input type="text"  value="Fourth"  size="10" disabled>
      <input type="hidden" name="fourthp" id="fourthp" value="Fourth" /></td>
    <td align="center" >
    <select style="width:100px; height:25px;" name="studClass4" id="studClass4" onchange="callpage();">
      <option value=""> --Select-- </option>
      <?php
					$gtfbranchId=$_REQUEST['branchId'];
$gstclass3="select * from borno_school_set_class where borno_school_id='$schId' and borno_school_branch_id='$gtfbranchId' order by class_order asc";
					$qgstclass3=$mysqli->query($gstclass3);
					while($shgstclass3=$qgstclass3->fetch_assoc()){ $sl++;
				
					$getfClassId3=$shgstclass3['borno_school_class_id']; 
                    $gstclass13="select * from borno_school_class where borno_school_class_id='$getfClassId3'";
                                        $qgstclass13=$mysqli->query($gstclass13);
                                        $shgstclass13=$qgstclass13->fetch_assoc(); 
				
				?>
      <option value=" <?php echo $shgstclass13['borno_school_class_id']; ?>" <?php if($shgstclass13['borno_school_class_id']==$_REQUEST['studClass4']) { echo "selected"; }  ?>> <?php echo $shgstclass13['borno_school_class_name']; ?></option>
      <?php } ?>
    </select>
    </td>
    <td align="center" >
    
    <select style="width:100px; height:25px;" name="studSection4" id="studSection4" onchange="callpage();">      
          <option value=""> --Select-- </option>      
        <?php
					$shiftId=$_REQUEST['shiftId'];
					$studClass4=$_REQUEST['studClass4'];
										
					$gstsection3="select * from borno_school_section where borno_school_class_id='$studClass4' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId'";
					$qgstsection3=$mysqli->query($gstsection3);
					while($shggstsection3=$qgstsection3->fetch_assoc()){ $sl++;				
				?>
      <option value=" <?php echo $shggstsection3['borno_school_section_id']; ?>" <?php if($shggstsection3['borno_school_section_id']==$_REQUEST['studSection4']) { echo "selected"; }  ?>> <?php echo $shggstsection3['borno_school_section_name']; ?></option>
      <?php } ?>      
    </select>  
      </td>
    <td align="center" >
    <select style="width:100px; height:25px;" name="sub4" id="sub4" onchange="callpage();">
      
          <option value=""> --Select-- </option>
      
        <?php
					$studClass4=$_REQUEST['studClass4'];
					$stsess=$_REQUEST['stsess'];
					
									
	if($studClass4=='1' OR  $studClass4=='2'){					
					
					
			$gsubjNamesixeight3="select * from borno_result_subject_voc where borno_school_class_id='$studClass4' AND borno_school_session='$stsess' AND borno_school_id='$schId'";
			$qgsubjNamesixeight3=$mysqli->query($gsubjNamesixeight3);
			while($shgsubjNamesixeight3=$qgsubjNamesixeight3->fetch_assoc()){	
							
		?>
      <option value="<?php echo $shgsubjNamesixeight3['borno_result_subject_id']; ?>"<?php if($shgsubjNamesixeight3['borno_result_subject_id']==$_POST['sub4']) { echo "selected"; } ?>> <?php echo $shgsubjNamesixeight3['borno_school_subject_name']; ?></option>
      <?php 
	  	}
			}
	  ?>
      
    </select>
      </td>
     <td align="center" ><label for="time4"></label>
      <input name="time4" type="text" id="time4" size="10"></td>
  </tr>
  <tr>
    <td align="center"><label for=""></label>
      <input type="text"  value="Fifth"  size="10" disabled>
      <input type="hidden" name="fifthp" id="fifthp" value="Fifth" /></td>
    <td align="center" >
    <select style="width:100px; height:25px;" name="studClass5" id="studClass5" onchange="callpage();">
      <option value=""> --Select-- </option>
      <?php
					$gtfbranchId=$_REQUEST['branchId'];


$gstclass4="select * from borno_school_set_class where borno_school_id='$schId' and borno_school_branch_id='$gtfbranchId' order by class_order asc";
					$qgstclass4=$mysqli->query($gstclass4);
					while($shgstclass4=$qgstclass4->fetch_assoc()){ $sl++;
				
					$getfClassId4=$shgstclass4['borno_school_class_id']; 
                    $gstclass14="select * from borno_school_class where borno_school_class_id='$getfClassId4'";
                                        $qgstclass14=$mysqli->query($gstclass14);
                                        $shgstclass14=$qgstclass14->fetch_assoc(); 
				
				?>
      <option value=" <?php echo $shgstclass14['borno_school_class_id']; ?>" <?php if($shgstclass14['borno_school_class_id']==$_REQUEST['studClass5']) { echo "selected"; }  ?>> <?php echo $shgstclass14['borno_school_class_name']; ?></option>
      <?php } ?>
    </select>
    </td>
    <td align="center" >
    
    <select style="width:100px; height:25px;" name="studSection5" id="studSection5" onchange="callpage();">      
          <option value=""> --Select-- </option>      
        <?php
					$shiftId=$_REQUEST['shiftId'];
					$studClass5=$_REQUEST['studClass5'];
										
					$gstsection4="select * from borno_school_section where borno_school_class_id='$studClass5' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId'";
					$qgstsection4=$mysqli->query($gstsection4);
					while($shggstsection4=$qgstsection4->fetch_assoc()){ $sl++;				
				?>
      <option value=" <?php echo $shggstsection4['borno_school_section_id']; ?>" <?php if($shggstsection4['borno_school_section_id']==$_REQUEST['studSection5']) { echo "selected"; }  ?>> <?php echo $shggstsection4['borno_school_section_name']; ?></option>
      <?php } ?>      
    </select>
      </td>
    <td align="center" >
    <select style="width:100px; height:25px;" name="sub5" id="sub5" onchange="callpage();">
      
          <option value=""> --Select-- </option>
      
        <?php
					$studClass5=$_REQUEST['studClass5'];
					$stsess=$_REQUEST['stsess'];
					
					if($studClass5=='1' OR  $studClass5=='2'){					
					
					
			$gsubjNamesixeight4="select * from borno_result_subject_voc where borno_school_class_id='$studClass5' AND borno_school_session='$stsess' AND borno_school_id='$schId'";
			$qgsubjNamesixeight4=$mysqli->query($gsubjNamesixeight4);
			while($shgsubjNamesixeight4=$qgsubjNamesixeight4->fetch_assoc()){	
							
		?>
      <option value="<?php echo $shgsubjNamesixeight4['borno_result_subject_id']; ?>"<?php if($shgsubjNamesixeight4['borno_result_subject_id']==$_POST['sub5']) { echo "selected"; } ?>> <?php echo $shgsubjNamesixeight4['borno_school_subject_name']; ?></option>
      <?php 
	  	}
			}

	  
	  ?>
      
    </select>
      </td>
          <td align="center" ><label for="time5"></label>
      <input name="time5" type="text" id="time5" size="10"></td>
  </tr>
  <tr>
    <td align="center"><label for=""></label>
      <input type="text"  value="Sixth"  size="10" disabled>
      <input type="hidden" name="sixthp" id="sixthp" value="Sixth" /></td>
    <td align="center" >
    <select style="width:100px; height:25px;" name="studClass6" id="studClass6" onchange="callpage();">
      <option value=""> --Select-- </option>
      <?php
					$gtfbranchId=$_REQUEST['branchId'];


$gstclass5="select * from borno_school_set_class where borno_school_id='$schId' and borno_school_branch_id='$gtfbranchId' order by class_order asc";
					$qgstclass5=$mysqli->query($gstclass5);
					while($shgstclass5=$qgstclass5->fetch_assoc()){ $sl++;
				
					$getfClassId5=$shgstclass5['borno_school_class_id']; 
                    $gstclass15="select * from borno_school_class where borno_school_class_id='$getfClassId5'";
                                        $qgstclass15=$mysqli->query($gstclass15);
                                        $shgstclass15=$qgstclass15->fetch_assoc(); 
				
				?>
      <option value=" <?php echo $shgstclass15['borno_school_class_id']; ?>" <?php if($shgstclass15['borno_school_class_id']==$_REQUEST['studClass6']) { echo "selected"; }  ?>> <?php echo $shgstclass15['borno_school_class_name']; ?></option>
      <?php } ?>
    </select>
    </td>
    <td align="center" >
    
    <select style="width:100px; height:25px;" name="studSection6" id="studSection6" onchange="callpage();">      
          <option value=""> --Select-- </option>      
        <?php
					$shiftId=$_REQUEST['shiftId'];
					$studClass6=$_REQUEST['studClass6'];
										
					$gstsection5="select * from borno_school_section where borno_school_class_id='$studClass6' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId'";
					$qgstsection5=$mysqli->query($gstsection5);
					while($shggstsection5=$qgstsection5->fetch_assoc()){ $sl++;				
				?>
      <option value=" <?php echo $shggstsection5['borno_school_section_id']; ?>" <?php if($shggstsection5['borno_school_section_id']==$_REQUEST['studSection6']) { echo "selected"; }  ?>> <?php echo $shggstsection5['borno_school_section_name']; ?></option>
      <?php } ?>      
    </select>
      </td>
    <td align="center" >
    <select style="width:100px; height:25px;" name="sub6" id="sub6" onchange="callpage();">
      
          <option value=""> --Select-- </option>
      
        <?php
					$studClass6=$_REQUEST['studClass6'];
					$stsess=$_REQUEST['stsess'];
					
					
	if($studClass6=='1' OR  $studClass6=='2'){					
					
					
			$gsubjNamesixeight5="select * from borno_result_subject_voc where borno_school_class_id='$studClass6' AND borno_school_session='$stsess' AND borno_school_id='$schId'";
			$qgsubjNamesixeight5=$mysqli->query($gsubjNamesixeight5);
			while($shgsubjNamesixeight5=$qgsubjNamesixeight5->fetch_assoc()){	
							
		?>
      <option value="<?php echo $shgsubjNamesixeight5['borno_result_subject_id']; ?>"<?php if($shgsubjNamesixeight5['borno_result_subject_id']==$_POST['sub6']) { echo "selected"; } ?>> <?php echo $shgsubjNamesixeight5['borno_school_subject_name']; ?></option>
      <?php 
	  	}
			}
	  ?>
      
    </select>
      </td>
          <td align="center" ><label for="time6"></label>
      <input name="time6" type="text" id="time6" size="10"></td>
  </tr>
  <tr>
    <td align="center"><label for=""></label>
      <input type="text"  value="Seventh"  size="10" disabled>
      <input type="hidden" name="seventhp" id="seventhp" value="Seventh" /></td>
    <td align="center" >
        <select style="width:100px; height:25px;" name="studClass7" id="studClass7" onchange="callpage();">
      <option value=""> --Select-- </option>
      <?php
					$gtfbranchId=$_REQUEST['branchId'];


$gstclass6="select * from borno_school_set_class where borno_school_id='$schId' and borno_school_branch_id='$gtfbranchId' order by class_order asc";
					$qgstclass6=$mysqli->query($gstclass6);
					while($shgstclass6=$qgstclass6->fetch_assoc()){ $sl++;
				
					$getfClassId6=$shgstclass6['borno_school_class_id']; 
                    $gstclass16="select * from borno_school_class where borno_school_class_id='$getfClassId6'";
                                        $qgstclass16=$mysqli->query($gstclass16);
                                        $shgstclass16=$qgstclass16->fetch_assoc(); 
				
				?>
      <option value=" <?php echo $shgstclass16['borno_school_class_id']; ?>" <?php if($shgstclass16['borno_school_class_id']==$_REQUEST['studClass7']) { echo "selected"; }  ?>> <?php echo $shgstclass16['borno_school_class_name']; ?></option>
      <?php } ?>
    </select>
    </td>
    <td align="center" >
    <select style="width:100px; height:25px;" name="studSection7" id="studSection7" onchange="callpage();">      
          <option value=""> --Select-- </option>      
        <?php
					$shiftId=$_REQUEST['shiftId'];
					$studClass7=$_REQUEST['studClass7'];
										
					$gstsection6="select * from borno_school_section where borno_school_class_id='$studClass7' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId'";
					$qgstsection6=$mysqli->query($gstsection6);
					while($shggstsection6=$qgstsection6->fetch_assoc()){ $sl++;				
				?>
      <option value=" <?php echo $shggstsection6['borno_school_section_id']; ?>" <?php if($shggstsection6['borno_school_section_id']==$_REQUEST['studSection7']) { echo "selected"; }  ?>> <?php echo $shggstsection6['borno_school_section_name']; ?></option>
      <?php } ?>      
    </select>
    
      </td>
    <td align="center" >
    <select style="width:100px; height:25px;" name="sub7" id="sub7" onchange="callpage();">
      
          <option value=""> --Select-- </option>
      
        <?php
					$studClass7=$_REQUEST['studClass7'];
					$stsess=$_REQUEST['stsess'];
					
	if($studClass7=='1' OR  $studClass7=='2'){					
					
					
			$gsubjNamesixeight6="select * from borno_result_subject_voc where borno_school_class_id='$studClass7' AND borno_school_session='$stsess' AND borno_school_id='$schId'";
			$qgsubjNamesixeight6=$mysqli->query($gsubjNamesixeight6);
			while($shgsubjNamesixeight6=$qgsubjNamesixeight6->fetch_assoc()){	
							
		?>
      <option value="<?php echo $shgsubjNamesixeight6['borno_result_subject_id']; ?>"<?php if($shgsubjNamesixeight6['borno_result_subject_id']==$_POST['sub7']) { echo "selected"; } ?>> <?php echo $shgsubjNamesixeight6['borno_school_subject_name']; ?></option>
      <?php 
	  	}
			}
	
	  
	   ?>
      
    </select>
      </td>
      <td align="center" ><label for="time7"></label>
      <input name="time7" type="text" id="time7" size="10"></td>
  </tr>
    <tr>
    <td align="center"><label for=""></label>
      <input type="text"  value="Eighth"  size="10" disabled>
      <input type="hidden" name="eighthp" id="eighthp" value="Eighth"/></td>
    <td align="center" >
            <select style="width:100px; height:25px;" name="studClass8" id="studClass8" onchange="callpage();">
      <option value=""> --Select-- </option>
      <?php
					$gtfbranchId=$_REQUEST['branchId'];


$gstclass7="select * from borno_school_set_class where borno_school_id='$schId' and borno_school_branch_id='$gtfbranchId' order by class_order asc";
					$qgstclass7=$mysqli->query($gstclass7);
					while($shgstclass7=$qgstclass7->fetch_assoc()){ $sl++;
				
					$getfClassId7=$shgstclass7['borno_school_class_id']; 
                    $gstclass17="select * from borno_school_class where borno_school_class_id='$getfClassId7'";
                                        $qgstclass17=$mysqli->query($gstclass17);
                                        $shgstclass17=$qgstclass17->fetch_assoc(); 
				
				?>
      <option value=" <?php echo $shgstclass17['borno_school_class_id']; ?>" <?php if($shgstclass17['borno_school_class_id']==$_REQUEST['studClass8']) { echo "selected"; }  ?>> <?php echo $shgstclass17['borno_school_class_name']; ?></option>
      <?php } ?>
    </select>
    </td>
    <td align="center" >
    <select style="width:100px; height:25px;" name="studSection8" id="studSection8" onchange="callpage();">      
          <option value=""> --Select-- </option>      
        <?php
					$shiftId=$_REQUEST['shiftId'];
					$studClass8=$_REQUEST['studClass8'];
										
					$gstsection7="select * from borno_school_section where borno_school_class_id='$studClass8' AND borno_school_branch_id='$branchId' AND borno_school_id='$schId'";
					$qgstsection7=$mysqli->query($gstsection7);
					while($shggstsection7=$qgstsection7->fetch_assoc()){ $sl++;				
				?>
      <option value=" <?php echo $shggstsection7['borno_school_section_id']; ?>" <?php if($shggstsection7['borno_school_section_id']==$_REQUEST['studSection8']) { echo "selected"; }  ?>> <?php echo $shggstsection7['borno_school_section_name']; ?></option>
      <?php } ?>      
    </select>
    
      </td>
    <td align="center" >
    <select style="width:100px; height:25px;" name="sub8" id="sub8" onchange="callpage();">
      
          <option value=""> --Select-- </option>
      
        <?php
					$studClass8=$_REQUEST['studClass8'];
					$stsess=$_REQUEST['stsess'];
					
	if($studClass8=='1' OR  $studClass8=='2'){					
					
					
		$gsubjNamesixeight7="select * from borno_result_subject_voc where borno_school_class_id='$studClass8' AND borno_school_session='$stsess' AND borno_school_id='$schId'";
			$qgsubjNamesixeight7=$mysqli->query($gsubjNamesixeight7);
			while($shgsubjNamesixeight7=$qgsubjNamesixeight7->fetch_assoc()){	
							
		?>
      <option value="<?php echo $shgsubjNamesixeight7['borno_result_subject_id']; ?>"<?php if($shgsubjNamesixeight7['borno_result_subject_id']==$_POST['sub8']) { echo "selected"; } ?>> <?php echo $shgsubjNamesixeight7['borno_school_subject_name']; ?></option>
      <?php 
	  	}
			}

	  
	   ?>
      
    </select>
      </td>
      <td align="center" ><label for="time8"></label>
      <input name="time8" type="text" id="time8" size="10"></td>
  </tr>
  
  <tr>
    <td colspan="6" align="center"><input type="submit" name="button" id="button" value="Set" onClick="return contalt_valid()" /></td>
    </tr>
</table>
</form>
<br>





                        <br>
                        
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