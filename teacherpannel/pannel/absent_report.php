<?php
error_reporting(0);
//ob_start();
include('config.php');

if(empty($teacherid)){
    session_destroy();
header("location:../index.php");
}



$gettecherinfo = "SELECT ct.`borno_school_section_id`,ct.`borno_school_class_id`,ct.`borno_school_shift_id`,`borno_school_session` FROM `borno_set_class_teacher` AS ct
INNER JOIN `borno_teacher_info` AS ti ON ti.borno_teacher_info_id = ct.borno_school_teacher_id
INNER JOIN `borno_school_class` AS sc ON sc.borno_school_class_id = ct.borno_school_class_id
INNER JOIN `borno_school_shift` AS ss ON ss.borno_school_shift_id = ct.borno_school_shift_id
INNER JOIN `borno_school_section` AS sse ON sse.borno_school_section_id = ct.borno_school_section_id
WHERE `borno_school_teacher_id` = '$teacherid'";
	$qgettecherinfo =$mysqli->query($gettecherinfo);
	$sqgettecherinfo=$qgettecherinfo->fetch_assoc();

    $stdclass = $sqgettecherinfo['borno_school_class_id'];
    $shift = $sqgettecherinfo['borno_school_shift_id'];
 	$section=$sqgettecherinfo['borno_school_section_id'];
	$stsess=trim($sqgettecherinfo['borno_school_session']);
?>
<script language="javascript">
	function contalt_valid()
	{
	   	if(document.frmcontent.stsess.value=="")
		{
			alert("Please Select Session");
			document.frmcontent.stsess.focus();
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
		

		
		if(document.frmcontent.month.value=="")
		{
			alert("Please Select Month");
			document.frmcontent.month.focus();
			return (false);
		}
		
		
	}
	function callpage()
	{
	 document.frmcontent.action="absent_report.php";
	 document.frmcontent.submit();
	}
	
	
	
</script>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Attandance Report</title>

     <!-- Favicon -->
     <link rel="shortcut icon" href="../assets/images/logo.jpg">

    <!-- page css -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&amp;display=swap" rel="stylesheet">
    <!-- Core css -->
    <link href="assets/css/app.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/media.css">

</head>

<body>
    <div class="app">
        <div class="layout">
            <!-- Header START -->
            <section id="mainnav">
            <?php
               		require_once('header.php');
			   ?> 

            </section> 
            <!---Header End-->

            <!-- Side Nav START -->
            <div class="side-nav" style ="background: #f1f6f7;">
            <?php
               		require_once('leftmenu.php');
			   ?>
            </div>
            <!-- Side Nav END -->

            <!-- Page Container START -->
            <div class="page-container">
                

                <!-- Content Wrapper START -->
                <div class="main-content">
                <?php
               	//	require_once('topmenu.php');
			   ?>
                    <!----------------Content Start----------------->
 <div class="row">
                        <div class="col-lg-12">
                            <div class="fessPayment">
                                <div class="requestTable">
                                   <div class="requestTableHead">
                                    <h3>Attandance Report</h3>
                                   </div>
                                    
                                </div>
                                <div class="col-lg-8">
                                    <center>
                                <form name="frmcontent" action="download_attandance_report.php" method="post" enctype="multipart/form-data" id="myform">
                                    

                                  <div class="form-group row">
                                              <label  class="col-sm-6 col-form-label">Year</label>
                                              <div class="col-sm-6">
                                                  <select name="year" id="year" class="form-control" onChange="callpage();" >
      <option value="">--Select Month--</option>
            <option value="2022" <?php if($_REQUEST['year']==2022) { echo "selected"; } ?>> 2022 </option>
            <option value="2023" <?php if($_REQUEST['year']==2023) { echo "selected"; } ?>> 2023 </option>
            <option value="2024" <?php if($_REQUEST['year']==2024) { echo "selected"; } ?>> 2024 </option>   
            <option value="2025" <?php if($_REQUEST['year']==2025) { echo "selected"; } ?>> 2025 </option>
            <option value="2026" <?php if($_REQUEST['year']==2026) { echo "selected"; } ?>> 2026 </option>
            <option value="2027" <?php if($_REQUEST['year']==2027) { echo "selected"; } ?>> 2027 </option> 
            <option value="2028" <?php if($_REQUEST['year']==2028) { echo "selected"; } ?>> 2028 </option>
            <option value="2029" <?php if($_REQUEST['year']==2029) { echo "selected"; } ?>> 2029 </option>
            <option value="2030" <?php if($_REQUEST['year']==2030) { echo "selected"; } ?>> 2030 </option> 
            <option value="2031" <?php if($_REQUEST['year']==2031) { echo "selected"; } ?>> 2031 </option>
            <option value="2032" <?php if($_REQUEST['year']==2032) { echo "selected"; } ?>> 2032 </option>
      </select>
                                                
                                              </div>
                                            </div>
                                  <div class="form-group row">
                                              <label  class="col-sm-6 col-form-label">Month</label>
                                              <div class="col-sm-6">
                                                  <select name="month" id="month" class="form-control" onChange="callpage();" >
      <option value="">--Select Month--</option>
            <option value="1" <?php if($_REQUEST['month']==1) { echo "selected"; } ?>> January </option>
            <option value="2" <?php if($_REQUEST['month']==2) { echo "selected"; } ?>> February </option>
            <option value="3" <?php if($_REQUEST['month']==3) { echo "selected"; } ?>> March </option>   
            <option value="4" <?php if($_REQUEST['month']==4) { echo "selected"; } ?>> April </option>
            <option value="5" <?php if($_REQUEST['month']==5) { echo "selected"; } ?>> May </option>
            <option value="6" <?php if($_REQUEST['month']==6) { echo "selected"; } ?>> June </option> 
            <option value="7" <?php if($_REQUEST['month']==7) { echo "selected"; } ?>> July </option>
            <option value="8" <?php if($_REQUEST['month']==8) { echo "selected"; } ?>> August </option>
            <option value="9" <?php if($_REQUEST['month']==9) { echo "selected"; } ?>> September </option> 
            <option value="10" <?php if($_REQUEST['month']==10) { echo "selected"; } ?>> October </option>
            <option value="11" <?php if($_REQUEST['month']==11) { echo "selected"; } ?>> November </option>
            <option value="12" <?php if($_REQUEST['month']==12) { echo "selected"; } ?>> December </option>       
      </select>
                                                
                                              </div>
                                            </div>
                                  
          <button >

        <input type="hidden" name="studClass" id="studClass" value="<?php echo $stdclass; ?>">
        <input type="hidden" name="shiftId" id="shiftId" value="<?php echo $shift; ?>">
        <input type="hidden" name="section" id="section" value="<?php echo $section; ?>">
        <input type="hidden" name="stsess" id="stsess" value="<?php echo $stsess; ?>">
        <input type="hidden" name="month1" id="month1" value="<?php echo $_REQUEST['month']; ?>">
        <input type="hidden" name="year1" id="year1" value="<?php echo $_REQUEST['year']; ?>">
              <input type="submit" name="button" id="button"  value="Print" formtarget="_blank"  onClick="return contalt_valid()">
              </button>
                                            
                                   
                                         
					  	     
				<!--</form>  -->
					</center>
					  	</div>

                                <!--<div class="RequestSearch">-->
                                  
                                <!--        <div class="reqSeach">-->
                                <!--            <input type="text" class="form-control" placeholder="Search Request">-->
                                <!--        </div>-->
                                <!--        <div class="reqSeach datereq">-->
                                <!--            <input type="text" class="form-control" placeholder="Search Date">-->
                                <!--        </div>-->
                                <!--        <div class="reqSeach statusReq">-->
                                <!--            <input type="text" class="form-control" placeholder="Search Status">-->
                                <!--        </div>-->
                                   
                                <!--</div>-->
                                
                                <div class="table-responsive newRequestTable headerFixTable">
                                    <table id="data-table" class="table table-bordered">
                          <thead>
                            <tr class="info">
                              <th rowspan="2">SL</th>
                              <th rowspan="2">Name</th>
                              <th rowspan="2">Roll</th>
                              <th colspan="33"><b><?php 
							  if ($_POST['month']==1) {echo "January";}
							  elseif ($_POST['month']==2) {echo "February";}
							  elseif ($_POST['month']==3) {echo "March";}
							  elseif ($_POST['month']==4) {echo "April";}
							  elseif ($_POST['month']==5) {echo "May";}
							  elseif ($_POST['month']==6) {echo "June";}
							  elseif ($_POST['month']==7) {echo "July";}
							  elseif ($_POST['month']==8) {echo "August";}
							  elseif ($_POST['month']==9) {echo "September";}
							  elseif ($_POST['month']==10) {echo "October";}
							  elseif ($_POST['month']==11) {echo "November";}
							  elseif ($_POST['month']==12) {echo "December";}
							  
							  ?></b></th>
                            </tr>
                            <tr class="info">
                              <th>1</th>
                              <th>2</th>
                              <th>3</th>
                              <th>4</th>
                              <th>5</th>
                              <th>6</th>
                              <th>7</th>
                              <th>8</th>
                              <th>9</th>
                              <th>10</th>
                              
                              <th>11</th>
                              <th>12</th>
                              <th>13</th>
                              <th>14</th>
                              <th>15</th>
                              <th>16</th>
                              <th>17</th>
                              <th>18</th>
                              <th>19</th>
                              <th>20</th>
                              
                              <th>21</th>
                              <th>22</th>
                              <th>23</th>
                              <th>24</th>
                              <th>25</th>
                              <th>26</th>
                              <th>27</th>
                              <th>28</th>
                              <th>29</th>
                              <th>30</th>
                              <th>31</th>
                              <th>TP</th>
                              <th>TA</th>
                             
                              
                            </tr>
                          </thead>
    				<?php			
		//	$year=date('Y');


			              			$month=$_POST['month'];
			            $year=$_POST['year'];	
	
	
 $gtstudent="select * from borno_student_info where borno_school_section_id='$section' AND borno_school_session='$stsess' order by borno_school_roll asc";
	
	$qgtstudent=$mysqli->query($gtstudent);
	$sl=0;
	while($shroll=$qgtstudent->fetch_assoc()){ 	
	
	    $roll=$shroll['borno_school_roll'];
		$techname=$shroll['borno_school_student_name'];
		$techPhone=substr($shroll['borno_school_phone'],2,13);
		$stdid=$shroll['borno_student_info_id'];
		$stdid1=$shroll['borno_school_student_id'];
		 $sl=$sl+1;
	
	
	
	

			   ?>
                          <tbody>
                            <tr  <?php if($sl%2==0){ ?> bgcolor="#83E0D7" <?php } else {?>  bgcolor="#C4BDC0" <?php }?>
                            
                            
                            >
                              <td><?php echo $sl; ?></td>
                              <td style="text-align:left"><?php echo $shroll['borno_school_student_name']; ?></td>
                               <td><?php echo $shroll['borno_school_roll']; ?></td>
                              
                              <?php
							  //=== Set Color Code =============
							  $data="select * from borno_school_calender where borno_school_id='$schId' AND borno_year='$year' AND borno_month='$month' AND borno_date=1";
					$qdata=$mysqli->query($data);					
					$showdata=$qdata->fetch_assoc();
					$finalColor=$showdata['borno_color'];
							  
							  ?>
                              <td style="background:<?php echo $finalColor; ?>">							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='1'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                             <?php
							  //=== Set Color Code =============
							  $data="select * from borno_school_calender where borno_school_id='$schId' AND borno_year='$year' AND borno_month='$month' AND borno_date=2";
					$qdata=$mysqli->query($data);					
					$showdata=$qdata->fetch_assoc();
					$finalColor=$showdata['borno_color'];
							  
							  ?>
                              <td style="background:<?php echo $finalColor; ?>">							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='2'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                             <?php
							  //=== Set Color Code =============
							  $data="select * from borno_school_calender where borno_school_id='$schId' AND borno_year='$year' AND borno_month='$month' AND borno_date=3";
					$qdata=$mysqli->query($data);					
					$showdata=$qdata->fetch_assoc();
					$finalColor=$showdata['borno_color'];
							  
							  ?>
                              <td style="background:<?php echo $finalColor; ?>">						  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='3'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <?php
							  //=== Set Color Code =============
							  $data="select * from borno_school_calender where borno_school_id='$schId' AND borno_year='$year' AND borno_month='$month' AND borno_date=4";
					$qdata=$mysqli->query($data);					
					$showdata=$qdata->fetch_assoc();
					$finalColor=$showdata['borno_color'];
							  
							  ?>
                              <td style="background:<?php echo $finalColor; ?>">								  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='4'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                             <?php
							  //=== Set Color Code =============
							  $data="select * from borno_school_calender where borno_school_id='$schId' AND borno_year='$year' AND borno_month='$month' AND borno_date=5";
					$qdata=$mysqli->query($data);					
					$showdata=$qdata->fetch_assoc();
					$finalColor=$showdata['borno_color'];
							  
							  ?>
                              <td style="background:<?php echo $finalColor; ?>">							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='5'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <?php
							  //=== Set Color Code =============
							  $data="select * from borno_school_calender where borno_school_id='$schId' AND borno_year='$year' AND borno_month='$month' AND borno_date=6";
					$qdata=$mysqli->query($data);					
					$showdata=$qdata->fetch_assoc();
					$finalColor=$showdata['borno_color'];
							  
							  ?>
                              <td style="background:<?php echo $finalColor; ?>">							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='6'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <?php
							  //=== Set Color Code =============
							  $data="select * from borno_school_calender where borno_school_id='$schId' AND borno_year='$year' AND borno_month='$month' AND borno_date=7";
					$qdata=$mysqli->query($data);					
					$showdata=$qdata->fetch_assoc();
					$finalColor=$showdata['borno_color'];
							  
							  ?>
                              <td style="background:<?php echo $finalColor; ?>">							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='7'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <?php
							  //=== Set Color Code =============
							  $data="select * from borno_school_calender where borno_school_id='$schId' AND borno_year='$year' AND borno_month='$month' AND borno_date=8";
					$qdata=$mysqli->query($data);					
					$showdata=$qdata->fetch_assoc();
					$finalColor=$showdata['borno_color'];
							  
							  ?>
                              <td style="background:<?php echo $finalColor; ?>">								  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='8'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <?php
							  //=== Set Color Code =============
							  $data="select * from borno_school_calender where borno_school_id='$schId' AND borno_year='$year' AND borno_month='$month' AND borno_date=9";
					$qdata=$mysqli->query($data);					
					$showdata=$qdata->fetch_assoc();
					$finalColor=$showdata['borno_color'];
							  
							  ?>
                              <td style="background:<?php echo $finalColor; ?>">							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='9'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                             <?php
							  //=== Set Color Code =============
							  $data="select * from borno_school_calender where borno_school_id='$schId' AND borno_year='$year' AND borno_month='$month' AND borno_date=10";
					$qdata=$mysqli->query($data);					
					$showdata=$qdata->fetch_assoc();
					$finalColor=$showdata['borno_color'];
							  
							  ?>
                              <td style="background:<?php echo $finalColor; ?>">							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='10'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <?php
							  //=== Set Color Code =============
							  $data="select * from borno_school_calender where borno_school_id='$schId' AND borno_year='$year' AND borno_month='$month' AND borno_date=11";
					$qdata=$mysqli->query($data);					
					$showdata=$qdata->fetch_assoc();
					$finalColor=$showdata['borno_color'];
							  
							  ?>
                              <td style="background:<?php echo $finalColor; ?>">							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='11'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <?php
							  //=== Set Color Code =============
							  $data="select * from borno_school_calender where borno_school_id='$schId' AND borno_year='$year' AND borno_month='$month' AND borno_date=12";
					$qdata=$mysqli->query($data);					
					$showdata=$qdata->fetch_assoc();
					$finalColor=$showdata['borno_color'];
							  
							  ?>
                              <td style="background:<?php echo $finalColor; ?>">							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='12'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <?php
							  //=== Set Color Code =============
							  $data="select * from borno_school_calender where borno_school_id='$schId' AND borno_year='$year' AND borno_month='$month' AND borno_date=13";
					$qdata=$mysqli->query($data);					
					$showdata=$qdata->fetch_assoc();
					$finalColor=$showdata['borno_color'];
							  
							  ?>
                              <td style="background:<?php echo $finalColor; ?>">							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='13'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <?php
							  //=== Set Color Code =============
							  $data="select * from borno_school_calender where borno_school_id='$schId' AND borno_year='$year' AND borno_month='$month' AND borno_date=14";
					$qdata=$mysqli->query($data);					
					$showdata=$qdata->fetch_assoc();
					$finalColor=$showdata['borno_color'];
							  
							  ?>
                              <td style="background:<?php echo $finalColor; ?>">						  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='14'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <?php
							  //=== Set Color Code =============
							  $data="select * from borno_school_calender where borno_school_id='$schId' AND borno_year='$year' AND borno_month='$month' AND borno_date=15";
					$qdata=$mysqli->query($data);					
					$showdata=$qdata->fetch_assoc();
					$finalColor=$showdata['borno_color'];
							  
							  ?>
                              <td style="background:<?php echo $finalColor; ?>">							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='15'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <?php
							  //=== Set Color Code =============
							  $data="select * from borno_school_calender where borno_school_id='$schId' AND borno_year='$year' AND borno_month='$month' AND borno_date=16";
					$qdata=$mysqli->query($data);					
					$showdata=$qdata->fetch_assoc();
					$finalColor=$showdata['borno_color'];
							  
							  ?>
                              <td style="background:<?php echo $finalColor; ?>">						  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='16'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <?php
							  //=== Set Color Code =============
							  $data="select * from borno_school_calender where borno_school_id='$schId' AND borno_year='$year' AND borno_month='$month' AND borno_date=17";
					$qdata=$mysqli->query($data);					
					$showdata=$qdata->fetch_assoc();
					$finalColor=$showdata['borno_color'];
							  
							  ?>
                              <td style="background:<?php echo $finalColor; ?>">							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='17'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                             <?php
							  //=== Set Color Code =============
							  $data="select * from borno_school_calender where borno_school_id='$schId' AND borno_year='$year' AND borno_month='$month' AND borno_date=18";
					$qdata=$mysqli->query($data);					
					$showdata=$qdata->fetch_assoc();
					$finalColor=$showdata['borno_color'];
							  
							  ?>
                              <td style="background:<?php echo $finalColor; ?>">							  							  
							  <?php
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='18'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <?php
							  //=== Set Color Code =============
							  $data="select * from borno_school_calender where borno_school_id='$schId' AND borno_year='$year' AND borno_month='$month' AND borno_date=19";
					$qdata=$mysqli->query($data);					
					$showdata=$qdata->fetch_assoc();
					$finalColor=$showdata['borno_color'];
							  
							  ?>
                              <td style="background:<?php echo $finalColor; ?>">						  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='19'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <?php
							  //=== Set Color Code =============
							  $data="select * from borno_school_calender where borno_school_id='$schId' AND borno_year='$year' AND borno_month='$month' AND borno_date=20";
					$qdata=$mysqli->query($data);					
					$showdata=$qdata->fetch_assoc();
					$finalColor=$showdata['borno_color'];
							  
							  ?>
                              <td style="background:<?php echo $finalColor; ?>">							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='20'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                             <?php
							  //=== Set Color Code =============
							$data="select * from borno_school_calender where borno_school_id='$schId' AND borno_year='$year' AND borno_month='$month' AND borno_date=21";
					$qdata=$mysqli->query($data);					
					$showdata=$qdata->fetch_assoc();
					$finalColor=$showdata['borno_color'];
							  
							  ?>
                              <td style="background:<?php echo $finalColor; ?>">								  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='21'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <?php
							  //=== Set Color Code =============
							  $data="select * from borno_school_calender where borno_school_id='$schId' AND borno_year='$year' AND borno_month='$month' AND borno_date=22";
					$qdata=$mysqli->query($data);					
					$showdata=$qdata->fetch_assoc();
					$finalColor=$showdata['borno_color'];
							  
							  ?>
                              <td style="background:<?php echo $finalColor; ?>">							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='22'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <?php
							  //=== Set Color Code =============
							  $data="select * from borno_school_calender where borno_school_id='$schId' AND borno_year='$year' AND borno_month='$month' AND borno_date=23";
					$qdata=$mysqli->query($data);					
					$showdata=$qdata->fetch_assoc();
					$finalColor=$showdata['borno_color'];
							  
							  ?>
                              <td style="background:<?php echo $finalColor; ?>">							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='23'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <?php
							  //=== Set Color Code =============
							  $data="select * from borno_school_calender where borno_school_id='$schId' AND borno_year='$year' AND borno_month='$month' AND borno_date=24";
					$qdata=$mysqli->query($data);					
					$showdata=$qdata->fetch_assoc();
					$finalColor=$showdata['borno_color'];
							  
							  ?>
                              <td style="background:<?php echo $finalColor; ?>">								  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='24'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <?php
							  //=== Set Color Code =============
							  $data="select * from borno_school_calender where borno_school_id='$schId' AND borno_year='$year' AND borno_month='$month' AND borno_date=25";
					$qdata=$mysqli->query($data);					
					$showdata=$qdata->fetch_assoc();
					$finalColor=$showdata['borno_color'];
							  
							  ?>
                              <td style="background:<?php echo $finalColor; ?>">								  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='25'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <?php
							  //=== Set Color Code =============
							  $data="select * from borno_school_calender where borno_school_id='$schId' AND borno_year='$year' AND borno_month='$month' AND borno_date=26";
					$qdata=$mysqli->query($data);					
					$showdata=$qdata->fetch_assoc();
					$finalColor=$showdata['borno_color'];
							  
							  ?>
                              <td style="background:<?php echo $finalColor; ?>">							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='26'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <?php
							  //=== Set Color Code =============
							  $data="select * from borno_school_calender where borno_school_id='$schId' AND borno_year='$year' AND borno_month='$month' AND borno_date=27";
					$qdata=$mysqli->query($data);					
					$showdata=$qdata->fetch_assoc();
					$finalColor=$showdata['borno_color'];
							  
							  ?>
                              <td style="background:<?php echo $finalColor; ?>">								  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='27'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <?php
							  //=== Set Color Code =============
							  $data="select * from borno_school_calender where borno_school_id='$schId' AND borno_year='$year' AND borno_month='$month' AND borno_date=28";
					$qdata=$mysqli->query($data);					
					$showdata=$qdata->fetch_assoc();
					$finalColor=$showdata['borno_color'];
							  
							  ?>
                              <td style="background:<?php echo $finalColor; ?>">							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='28'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <?php
							  //=== Set Color Code =============
							  $data="select * from borno_school_calender where borno_school_id='$schId' AND borno_year='$year' AND borno_month='$month' AND borno_date=29";
					$qdata=$mysqli->query($data);					
					$showdata=$qdata->fetch_assoc();
					$finalColor=$showdata['borno_color'];
							  
							  ?>
                              <td style="background:<?php echo $finalColor; ?>">								  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='29'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							   echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                              <?php
							  //=== Set Color Code =============
							  $data="select * from borno_school_calender where borno_school_id='$schId' AND borno_year='$year' AND borno_month='$month' AND borno_date=30";
					$qdata=$mysqli->query($data);					
					$showdata=$qdata->fetch_assoc();
					$finalColor=$showdata['borno_color'];
							  
							  ?>
                              <td style="background:<?php echo $finalColor; ?>">							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='30'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							    echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              
                               <?php
							  //=== Set Color Code =============
							  $data="select * from borno_school_calender where borno_school_id='$schId' AND borno_year='$year' AND borno_month='$month' AND borno_date=31";
					$qdata=$mysqli->query($data);					
					$showdata=$qdata->fetch_assoc();
					$finalColor=$showdata['borno_color'];
							  
							  ?>
                              <td style="background:<?php echo $finalColor; ?>">							  							  
							  <?php 
							  $branch="select * from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_date`='31'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
							  echo $smsbranch['borno_school_attandance'];
							  
							  ?>
                              
                              </td>
                              <td>	 
							  <?php
                              $branch="select Count(borno_student_info_id) As presence from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_attandance`='P'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	echo $presence=$smsbranch['presence'];
							  ?>	 
                              </td>                             
                              <td>	
                              <?php
                              $branch="select Count(borno_student_info_id) As absent from `borno_student_attandance` where `borno_student_info_id`='$stdid' AND `borno_school_year`='$year' AND `borno_school_month`='$month' AND `borno_school_attandance`='A'";
	$rsQuery1 = $mysqli->query($branch);
	$smsbranch=$rsQuery1->fetch_assoc();
	echo $absent=$smsbranch['absent'];
							  ?>
                              
                               </td>  
                              
                              
                            </tr>
                          </tbody>
               <?php } ?> 
                                      </table>
    </form>                                 
                                  </div>
                                
                                   <!---Request Modal----
                                   
                                  
                                  <!---Reques Modal---->
                                  
                                  
                            </div>
                        </div>
                    </div>
                    <!----------------Content Start---------------->
                </div>
                <!-- Content Wrapper END -->

                <!-- Footer START -->
                    <div class="footer-content">
                        <p class="m-b-0">Copyright ©2020 bornoSKY. All rights reserved.</p>
                    </div>
                <!-- Footer END -->

            </div>
            <!-- Page Container END -->

            <!-- Search Start-->
            
            <!-- Search End-->

            <!-- Quick View START -->
            
            <!-- Quick View END -->
        </div>
    </div>

    
    <!-- Core Vendors JS -->
    <script src="assets/js/vendors.min.js"></script>

    <!-- Core JS -->
    <script src="assets/js/app.min.js"></script>

<!--<script type="text/javascript">
    $('.side-nav-menu').on('click', 'li', function(){
        $('.side-nav-menu li.inneractive').removeClass('inneractive');
        $(this).addClass('inneractive');
    })
</script>
<!-- <script type="text/javascript">
    $('.ModuleNav').on('click', 'li', function(){
        $('.ModuleNav li.active').removeClass('active');
        $(this).addClass('active');
    })
</script> 
<script type="text/javascript">
    $('.NavhideShow').on('click', 'li', function(){
        $('.stickyNav .navHideActive').removeClass('navHideActive');
        $(this).addClass('navHideActive');
    })
</script>
<script>
    $(document).ready(function(){
        $("#menuToggle").click(function(){
            $("#MobileToggle").fadeToggle();
        });
    });
</script>
<script>
    $(document).ready(function(){
        $("#menuToggle2").click(function(){
            $("#MobileToggle").fadeToggle();
        });
    });
</script>

<script>
    $(document).ready(function(){
        $(".Hidemybtn").click(function(){
            $(".Hidemybtn").show();
            $(this).hide();
        });
    });

$(document).ready(function(){	
	$("#ticketForm").submit(function(event){
		submitForm();
		return false;
	});
});
function submitForm(){
	 $.ajax({
		type: "POST",
		url: "support_do.php",
		cache:false,
		data: $('form#ticketForm').serialize(),
		success: function(response){
			$("#ticketForm").html(response)
			$("#contact-modal").modal('hide');
		},
		error: function(){
			alert("Error");
		}
	});
}
    
</script> -->
</body>



</html>