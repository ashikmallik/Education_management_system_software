<?php 
ob_start();
require_once('result_top.php');
extract($_GET);
$studClass=$_GET['classId'];

//====================Nine Ten Start============================
if($studClass==1 OR $studClass==2)
{
$gtresSubd="select * from borno_result_nine_ten_subject_details where borno_school_id='$schoolId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id='$gttermId' AND borin_subject_nine_ten_id='$stusubjId'";
$qgtresSubd=$mysqli->query($gtresSubd);
$showgtresSubd=$qgtresSubd->fetch_assoc();

$gtsubjdet_ntype1=$showgtresSubd['number_type1_marks'];
$gtsubjdet_ntype2=$showgtresSubd['number_type2_marks'];
$gtsubjdet_ntype3=$showgtresSubd['number_type3_marks'];
$gtsubjdet_ntype4=$showgtresSubd['number_type4_marks']; 
$gtsubjdet_ntype5=$showgtresSubd['number_type5_marks'];
$gtsubjdet_ntype6=$showgtresSubd['number_type6_marks'];
}
//====================Nine Ten End============================
//====================Six to Eight Start============================
elseif($studClass==3 OR $studClass==4 OR $studClass==5)
{
$gtresSubd="select * from borno_result_six_eight_subject_details where borno_school_id='$schoolId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id='$gttermId' AND subject_id_six_eight='$stusubjId'";
$qgtresSubd=$mysqli->query($gtresSubd);
$showgtresSubd=$qgtresSubd->fetch_assoc();

$gtsubjdet_ntype1=$showgtresSubd['number_type1_marks'];
$gtsubjdet_ntype2=$showgtresSubd['number_type2_marks'];
$gtsubjdet_ntype3=$showgtresSubd['number_type3_marks'];
$gtsubjdet_ntype4=$showgtresSubd['number_type4_marks']; 
$gtsubjdet_ntype5=$showgtresSubd['number_type5_marks'];
$gtsubjdet_ntype6=$showgtresSubd['number_type6_marks'];
}
//====================Six to Eight End============================
//====================Play to Five Start============================
else
{
$gtresSubd="select * from borno_result_subject_details where borno_school_id='$schoolId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_result_term_id='$gttermId' AND borno_result_subject_id='$stusubjId'";
$qgtresSubd=$mysqli->query($gtresSubd);
$showgtresSubd=$qgtresSubd->fetch_assoc();

$gtsubjdet_ntype1=$showgtresSubd['number_type1_marks'];
$gtsubjdet_ntype2=$showgtresSubd['number_type2_marks'];
$gtsubjdet_ntype3=$showgtresSubd['number_type3_marks'];
$gtsubjdet_ntype4=$showgtresSubd['number_type4_marks']; 
$gtsubjdet_ntype5=$showgtresSubd['number_type5_marks'];
$gtsubjdet_ntype6=$showgtresSubd['number_type6_marks'];
		}
//====================Play to Five End============================		
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
		
		if(document.frmcontent.stusubjId.value=="")
		{
			alert("Please Select Subject");
			document.frmcontent.stusubjId.focus();
			return (false);
		}
		
		if(document.frmcontent.stuFname.value=="")
		{
			alert("Please Enter Student Father Name");
			document.frmcontent.stuFname.focus();
			return (false);
		}
		
		if(document.frmcontent.stuaddress.value=="")
		{
			alert("Please Enter Student Address");
			document.frmcontent.stuaddress.focus();
			return (false);
		}
		
		if(document.frmcontent.stuphone.value=="")
		{
			alert("Please Enter Phone for SMS");
			document.frmcontent.stuphone.focus();
			return (false);
		}
		
		if(document.frmcontent.datepicker.value=="")
		{
			alert("Please Enter Date of Birth");
			document.frmcontent.datepicker.focus();
			return (false);
		}
		
		if(document.frmcontent.religion.value=="")
		{
			alert("Please Select Religion");
			document.frmcontent.religion.focus();
			return (false);
		}
		
		if(document.frmcontent.sturoll.value=="")
		{
			alert("Please Enter Student Roll");
			document.frmcontent.sturoll.focus();
			return (false);
		}
	}
	
	
	function callpage()
	{
	 document.frmcontent.action="upload_marks.php";
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
        </div>
        <div class="fixed_logo">
            <a href=""><img src="../assets/images/logo.jpg" class="img-fluid"></a>
        </div>
    </div><!-- side bar end -->

    <div class="ot_main_content">
        <div class="admin_logout">
            <div class="admin_head">
                <h3>Result Panel [ <?php echo $shget_schoolName['borno_school_name']; ?> ] </h3>
            </div>
            <div class="log_out">
                <a href=""><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2> Upload Marks </h2></div>
                <div class="form">
               

       <table width="800" border="0" cellspacing="0" cellpadding="0" class="projectlist" align="center">
          <tr>
            <td height="75" style="color:#008000; font-weight:bold; font-size:32px; text-align:center; background:#CCC"> Result Upload Success. Would You Like to Show </td>
          </tr>
        </table>

<br>

<form name="frmcontent" id="myform" action="show_marks_temp.php" method="post" enctype="multipart/form-data">



<table width="650" border="0" cellspacing="0" cellpadding="0" align="center" class="projectlist">
  <?php
	$assnty="select * from borno_result_number_type where borno_school_id='$schoolId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess'";
	$qassnty=$mysqli->query($assnty);
	$shassnty=$qassnty->fetch_assoc();
	
	$gtnumberty1=$shassnty['borno_school_number_type1'];
	$gtnumberty2=$shassnty['borno_school_number_type2'];
	$gtnumberty3=$shassnty['borno_school_number_type3'];
	$gtnumberty4=$shassnty['borno_school_number_type4'];
	$gtnumberty5=$shassnty['borno_school_number_type5'];
	$gtnumberty6=$shassnty['borno_school_number_type6'];
  
  ?>
  
  <?php
  
	
		$gtctmarg="select * from borno_class1_temp_mark where borno_school_id='$schoolId' AND borno_school_branch_id='$branchId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_result_term_id='$gttermId' AND borno_result_subject_id='$stusubjId' order by borno_school_roll asc";
  
    $qgtctmarg=$mysqli->query($gtctmarg);
	while($shgtctmarg=$qgtctmarg->fetch_assoc()){
  
  
  ?>
  
  <?php } ?>
  <tr>
    <td colspan="8" align="center"><input type="submit" name="button" id="button" value="Show Marks">
      <input type="hidden" name="schoolId" id="schoolId" value="<?php echo $_GET['schoolId'];?>" />
      <input type="hidden" name="branchId" id="branchId" value="<?php echo $_GET['branchId']; ?>" />
      <input type="hidden" name="studClass" id="studClass" value="<?php echo $_GET['classId']; ?>" />
      <input type="hidden" name="shiftId" id="shiftId" value="<?php echo $_GET['shiftId']; ?>" />
      <input type="hidden" name="stsess" id="stsess" value="<?php echo $_GET['stsess']; ?>"/>
      <input type="hidden" name="stusubjId" id="stusubjId" value="<?php echo $_GET['subjId']; ?>" />
      <input type="hidden" name="gttermId" id="gttermId" value="<?php echo $_GET['gttermId']; ?>" />
      <input type="hidden" name="section" id="section" value="<?php echo $_GET['sectionId']; ?>" /></td>
    </tr>
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