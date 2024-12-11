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
	 document.frmcontent.action="due_report.php";
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
                <a href="logout.php"><img src="../../pannel/academic/assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body" style="margin-top:5px; margin-left:5px;">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Due List</h2></div>
                <div class="form">
                    <center>
        <form name="frmcontent" action="" method="post" enctype="multipart/form-data">
                        
        <table style="border:1px #000 solid; margin-top:-35px;">
             <tr style="background-color: #75cbd6;">
    <td class="text_table">Fiscal Year*:</td>
    <td ><select name="fiscalid" id="fiscalid" onchange="callpage();">
      <option value="">--Select--</option>
      <?php
                    $gtfiscalyear="select * from fiscal_year order by fiscal_year_id DESC";
                    		$sl=0;
                    		$qgtfiscalyear=$mysqli->query($gtfiscalyear);
                    		while($shgtfiscalyear=$qgtfiscalyear->fetch_assoc()){$sl++;
				
				?>
      <option value=" <?php echo $shgtfiscalyear['fiscal_year_id']; ?>" <?php if($shgtfiscalyear['fiscal_year_id']==($_REQUEST['fiscalid'])) { echo "selected"; }  ?>> <?php   echo $shgtfiscalyear['fiscal_year_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
   <tr style="background-color: #75cbd6;">
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
            <tr style="background-color: #75cbd6;">
    <td class="text_table">Class*:</td>
    <td >
        <select name="studClass" id="studClass" onchange="callpage();">
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
                                <?php } ?>
                              </select>
  </tr> 
  
   <tr style="background-color: #75cbd6;">
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
  <?php
 // $shiftId=$_POST['shiftId'];
			//	echo	$gstsection="select * from borno_school_section where borno_school_class_id='$studClass' AND borno_school_branch_id='$gtfbranchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId'";
  ?>
  <tr style="background-color: #75cbd6;">
    <td class="text_table">Select Section *</td>
     
    <td >
      <select name="section" id="section" onchange="callpage();">
       <option value="">--Select--</option>
      
        <?php
					$shiftId=$_REQUEST['shiftId'];
					$fiscalid=$_REQUEST['fiscalid'];
					$gstsess="select * from fiscal_year WHERE fiscal_year_id = '$fiscalid' ";
                    $qgstsess=$mysqli->query($gstsess);
                    $shgstsess=$qgstsess->fetch_assoc(); 
					$stsess=$shgstsess['session'];
					$type=$shgstsess['type'];
					
                    if($type =="School"){                           				
					$gstsection="select * from borno_school_section where borno_school_class_id='$studClass' AND borno_school_branch_id='$gtfbranchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId' AND year ='$stsess'";
                    }
                    else{
                        $gstsection="select * from borno_school_section where borno_school_class_id='$studClass' AND borno_school_branch_id='$gtfbranchId' AND borno_school_id='$schId' AND borno_school_shift_id='$shiftId'";
                    }

                                                $qgstsection=$mysqli->query($gstsection);
                                                while($shggstsection=$qgstsection->fetch_assoc()){ $sl++;
                                            
                                            ?>
      <option value=" <?php echo $shggstsection['borno_school_section_id']; ?>" <?php if($shggstsection['borno_school_section_id']==$_REQUEST['section']) { echo "selected"; }  ?>> <?php echo $shggstsection['borno_school_section_name']; ?></option>
      <?php } ?>
      
      
      </select>
      
      </td>
  </tr>
  <tr style="background-color: #75cbd6;">
    <td class="text_table">Select Fund *</td>
    <td><select name="fundId" id="fundId" onchange="callpage();">
      <option value="">--Select--</option>
      <?php
					$getfund="SELECT * FROM `fees_head_name`";
					$qgetfund=$mysqli->query($getfund);
					while($showfund=$qgetfund->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $showfund['head_id']; ?>" <?php if($showfund['head_id']==$_REQUEST['fundId']) { echo "selected"; }  ?>> <?php echo $showfund['head_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
  <?php
   $fundId=$_REQUEST['fundId'];
  if($fundId == 2) {?>
    <tr style="background-color: #75cbd6;">
    <td class="text_table">Month*:</td>
    <td ><select name="monthid" id="monthid" onchange="callpage();">
      <option value="">--Select--</option>
      <?php
      
                    $gtfiscalmonth="select * from fiscal_year_details WHERE fiscal_year_id = '$fiscalid'";
                    		$sl=0;
                    		$qgtfiscalmonth=$mysqli->query($gtfiscalmonth);
                    		while($shgtfiscalmonth=$qgtfiscalmonth->fetch_assoc()){$sl++;
				
				?>
      <option value=" <?php echo $shgtfiscalmonth['month']; ?>" <?php if($shgtfiscalmonth['month']==($_REQUEST['monthid'])) { echo "selected"; }  ?>> <?php   echo $shgtfiscalmonth['month_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
  <?php } ?>
       </form>
       
                        </table>
        <?php 
            $fiscalid=$_REQUEST['fiscalid'];
        	$section=$_REQUEST['section'];
        	$section=$_REQUEST['section'];
        	$monthid=$_REQUEST['monthid'];
        ?>                
                        <br>
      <table>                  
                        <tr>
    <td class="text_table" align="center"><a href="download_due_report_section_head_wise_csv.php?classid=0&branchid=<?php echo $gtfbranchId; ?>&section=<?php echo $section; ?>&session=<?php    ?>&fiscalid=<?php echo $fiscalid; ?>&type=<?php echo $type; ?>&fundId=<?php echo $fundId; ?>&monthid=<?php echo $monthid; ?>" target="_blank">Download Due List(Section Wise)</a></td>                        
  </tr>
                          <tr>
    <td class="text_table" align="center"><a href="download_paid_report_section_head_wise_csv.php?classid=0&branchid=<?php echo $gtfbranchId; ?>&section=<?php echo $section; ?>&session=<?php    ?>&fiscalid=<?php echo $fiscalid; ?>&type=<?php echo $type; ?>&fundId=<?php echo $fundId; ?>&monthid=<?php echo $monthid; ?>" target="_blank">Download Paid List(Section Wise)</a></td>
  </tr
 <tr>
    <td class="text_table" align="center"><a href="download_due_report_section_head_wise_csv.php?classid=<?php echo $studClass; ?>&branchid=<?php echo $gtfbranchId; ?>&section=0&session=<?php    ?>&fiscalid=<?php echo $fiscalid; ?>&type=<?php echo $type; ?>&fundId=<?php echo $fundId; ?>&monthid=<?php echo $monthid; ?>" target="_blank">Download Due List(Class Wise)</a></td>                        
  </tr>
                          <tr>
    <td class="text_table" align="center"><a href="download_paid_report_section_head_wise_csv.php?classid=<?php echo $studClass; ?>&branchid=<?php echo $gtfbranchId; ?>&section=0&session=<?php    ?>&fiscalid=<?php echo $fiscalid; ?>&type=<?php echo $type; ?>&fundId=<?php echo $fundId; ?>&monthid=<?php echo $monthid; ?>" target="_blank">Download Paid List(Class Wise)</a></td>
  </tr>
         </table>
                        <br>
                        <br>
                           
                      
                  </center>
                </div>
            </div>
        </div><!-- Main Body part end -->
    </div><!-- Main Content end -->
</div>

<!--Script part-->
<script type="text/javascript" src="../../pannel/academic/assets/js/jquery-3.2.1.min.js"></script>
</body>
</html>