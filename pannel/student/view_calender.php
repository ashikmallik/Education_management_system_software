<?php require_once('student_top.php');?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>:: [Class Routine Settings]::</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <!-- Meta tag -->
    
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
   <!-- Event Calaender Start --> 
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="style.css">
    
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
                  <h2>View Calender</h2></div>
                <div class="form">
                    <center>


<script language="javascript">
function callpage()
{
	 document.frmcontent.action="view_calender.php";
	 document.frmcontent.submit();
}
</script>

 


<form name="frmcontent" action="calender_remarks_do.php" method="post" enctype="multipart/form-data">

<table width="400" border="0" cellspacing="0" cellpadding="0" align="center" class="projectlist">

    <tr>
    <td colspan="3" align="center" style="color: #FE0000; font-size:24px">
    	<?php
        	$msg=$_GET['msg'];
			if($msg==1) { echo "Successfull"; } else if($msg==2) { echo "Failed"; }  else if($msg==3) { echo "Already Exist"; } 
		?>
    </td>
    </tr>
  
  <tr>
  <td><strong>Year *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><select name="stsess" id="stsess" onchange="callpage();">
      <option value=""> --Select-- </option>
      <option value="2020" <?php if($_REQUEST['stsess']==2020) { echo "selected"; } ?>> 2020 </option>
      <option value="2021" <?php if($_REQUEST['stsess']==2021) { echo "selected"; } ?>> 2021 </option>
      <option value="2022" <?php if($_REQUEST['stsess']==2022) { echo "selected"; } ?>> 2022 </option>
    </select></td>
  </tr>
 <tr>
  <td><strong>Month *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><select name="month" id="month" onchange="callpage();">
            <option value=""> Select Month </option>
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
          </select></td>
  </tr>
  <?php 
    $stsess=$_REQUEST['stsess'];
    $month=$_REQUEST['month'];
    
  	$branch1="select * from `borno_school_calender` where `borno_school_id`='$schId' AND `borno_year`='$stsess' AND `borno_month`='$month' order by borno_date asc";
	$rsQuery11 = $mysqli->query($branch1);
	while($smsbranch1=$rsQuery11->fetch_assoc()){;
  ?>
  <?php } ?> 
</table>

</form>



<br>
 <br>
 
 
 <div class="col-md-9">
            <div class="calendar-container">
              <div class="calendar-header">
                
               <?php
               		if($_REQUEST['month']!=""){
			   ?>
                <h1>
                  <?php                 
    				$month=$_REQUEST['month'];
					if($month==1) { echo "January"; }
					else if($month==2) { echo "February"; }
					else if($month==3) { echo "March"; }
					else if($month==4) { echo "April"; }
					else if($month==5) { echo "May"; }
					else if($month==6) { echo "June"; }
					else if($month==7) { echo "July"; }
					else if($month==8) { echo "August"; }
					else if($month==9) { echo "September"; }
					else if($month==10) { echo "October"; }
					else if($month==11) { echo "November"; }
					else if($month==12) { echo "December"; }
				  ?>
                   - 
                   <?php echo $_REQUEST['stsess'];?>
                  
                </h1>
                <?php } else {?>
                <h1>
                	<?php echo date('F');?> - <?php echo date('Y'); ?>
                </h1>
                <?php } ?>
              </div>

              <div class="calendar">
                <span class="day-name">Sat</span><span class="day-name">Sun</span><span class="day-name">Mon</span><span class="day-name">Tue</span><span class="day-name">Wed</span><span class="day-name">Thu</span><span class="day-name">Fri</span>

              <?php
			  $gtToMonth=date('F');			  
			  $year1=$_REQUEST['stsess'];
			  if($year1=="") { $year=date('Y'); } else { $year=$year1;}
              $month1=$_REQUEST['month'];
			  if($month1=="") { $month=date("m", strtotime("$gtToMonth")); } else { $month=$month1;}		  
			  
			

              
		$data="select * from borno_school_calender where borno_school_id='$schId' AND borno_year='$year' AND borno_month='$month' order by borno_date asc";
					$qdata=$mysqli->query($data);
					$sl=0;
					while($showdata=$qdata->fetch_assoc()){$sl++;
				   $serial=$showdata['borno_week_serial'];	
				   $date=$showdata['borno_date'];
				   $remarks=$showdata['borno_remarks'];
				   
			if($sl==1 AND $serial==2){
			  ?>
              <div class="day"></div>
              <div class="day" style="background:<?php echo $showdata['borno_color']; ?>">
			  		<?php echo $date; ?> <br><span style="font-size:11px"><?php echo $remarks;?></span>              
              </div>
              
              <?php }elseif($sl==1 AND $serial==3){ ?> 
              <div class="day"></div>
              <div class="day"></div> 
              <div class="day" style="background:<?php echo $showdata['borno_color']; ?>">
			  		<?php echo $date; ?> <br><span style="font-size:11px"><?php echo $remarks;?></span>              
              </div>
              
               <?php }elseif($sl==1 AND $serial==4){ ?> 
              <div class="day"></div>
              <div class="day"></div> 
              <div class="day"></div>
              <div class="day" style="background:<?php echo $showdata['borno_color']; ?>">
			  		<?php echo $date; ?> <br><span style="font-size:11px"><?php echo $remarks;?></span>              
              </div>
              
              <?php }elseif($sl==1 AND $serial==5){ ?> 
              <div class="day"></div>
              <div class="day"></div> 
              <div class="day"></div>
              <div class="day"></div>
              <div class="day" style="background:<?php echo $showdata['borno_color']; ?>">
			  		<?php echo $date; ?> <br><span style="font-size:11px"><?php echo $remarks;?></span>              
              </div>
              
               <?php }elseif($sl==1 AND $serial==6){ ?> 
              <div class="day"></div>
              <div class="day"></div> 
              <div class="day"></div>
              <div class="day"></div>
              <div class="day"></div>
              <div class="day" style="background:<?php echo $showdata['borno_color']; ?>">
			  		<?php echo $date; ?> <br><span style="font-size:11px"><?php echo $remarks;?></span>
              </div>
              
               <?php }elseif($sl==1 AND $serial==7){ ?> 
              <div class="day"></div>
              <div class="day"></div> 
              <div class="day"></div>
              <div class="day"></div>
              <div class="day"></div>
              <div class="day"></div>
              <div class="day" style="background:<?php echo $showdata['borno_color']; ?>">
			  
			 <?php echo $date; ?> <br><span style="font-size:11px"><?php echo $remarks;?></span>
              
              
              </div>
              <?php }else{ ?> 
              <div class="day" style="background:<?php echo $showdata['borno_color']; ?>">
			  <?php echo $date; ?> <br><span style="font-size:11px"><?php echo $remarks;?></span>
              </div>
              <?php } } ?> 
               
              </div>
            </div>
        </div>
 
 
 
                        
                  </center>
                </div>
            </div>
        </div><!-- Main Body part end -->
    </div><!-- Main Content end -->
</div>

<!--Script part-->
<script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js"></script>

<!--Event Calander Script Startt-->
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>