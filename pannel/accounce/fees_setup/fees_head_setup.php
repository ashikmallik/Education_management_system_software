<?php require_once('fees_sett_top.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>:: [Fees Setup]::</title>
    <link rel="stylesheet" type="text/css" href="../../academic/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../academic/assets/css/font-awesome.css">
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
	 document.frmcontent.action="fees_head_setup.php";
	 document.frmcontent.submit();
	}
</script> 
<div class="wrapper">
    <div class="side_main_menu">
        <?php require_once('leftmenu.php');?>	
        <div class="fixed_logo">
            <a href=""><img src="../../academic/assets/images/logo.jpg" class="img-fluid"></a>
        </div>
    </div><!-- side bar end -->

    <div class="ot_main_content">
        <div class="admin_logout">
            <div class="admin_head">
                <h3> Fees Setup </h3>
                
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../../academic/assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body" style="margin-top:5px; margin-left:5px;">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Fees Head Setup</h2></div>
                <div class="form">
                    <center>
                    	<form name="frmcontent" action="fees_head_setup_do.php" method="post" enctype="multipart/form-data">
                        <?php
			$msg=$_GET['msg'];
			if($msg==1) { echo "Success"; }
			else if($msg==2) { echo "Failed"; }
            else if($msg==3) { echo "Fiscal Year Already Exist/ Date Range Problem"; }
 ?>
                        
                        <table style="border:1px #000 solid; margin-top:-35px;">
       

 <tr style="background-color: #75cbd6;">
    <td class="text_table">Branch*:</td>
    <td >
        <select name="studBranch" id="studBranch" onchange="callpage();">
    <option value="">--Select--</option>
        <?php                                       
$getBranchId="SELECT * FROM `borno_school_branch`";
		
		
		$qgetBranchId=$mysqli->query($getBranchId);
		while($shgetBranchId=$qgetBranchId->fetch_assoc()){
				
		
                                    
                                    ?>
                                <option value=" <?php echo $shgetBranchId['borno_school_branch_id']; ?>" <?php if($shgetBranchId['borno_school_branch_id']==$_POST['studBranch']) { echo "selected"; }  ?>> <?php echo $shgetBranchId['borno_school_branch_name']; ?></option>
                                <?php } ?>
                              </select>
  </tr>                      
<tr style="background-color: #75cbd6;">
    <td class="text_table">Class*:</td>
    <td >
        <select name="studClass" id="studClass" onchange="callpage();">
    <option value="">--Select--</option>
        <?php      
        
        $branchId = $_POST['studBranch'];
$getClassId="select * from borno_school_set_class where borno_school_id='$schId 'AND borno_school_branch_id = '$branchId' ";
		
		
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
  
  <?php 
  $getclassid=$_POST['studClass'];
//   $getgroupid="select * from `borno_student_info` WHERE `borno_school_class_id`='$getclassid' GROUP BY `borno_school_stud_group`";
//   $qgetgroupid=$mysqli->query($getgroupid);
//   $shqgetgroupid=$qgetgroupid->fetch_assoc();
//   if(!empty($shqgetgroupid['borno_school_stud_group'])) 
//   {
  ?>
  <!--<tr style="background-color: #75cbd6;">-->
  <!--  <td class="text_table">Group*:</td>-->
  <!--  <td >-->
  <!--      <select name="studGroup" id="studGroup" onchange="callpage();">-->
  <!--  <option value="">--Select--</option>-->
  <!--      <option value="1"<?php // if("1"==trim($_REQUEST['studGroup'])) { echo "selected"; }  ?>> Science </option>-->
  <!--      <option value="2"<?php // if("2"==trim($_REQUEST['studGroup'])) { echo "selected"; }  ?>> Business Studies </option>-->
  <!--      <option value="3"<?php // if("3"==trim($_REQUEST['studGroup'])) { echo "selected"; }  ?>> Humanities </option>-->
  <!--                            </select>-->
  <!--</tr>-->
  <?php 
//  } 
?>
<tr style="background-color: #75cbd6;">
    <td class="text_table">Session*:</td>
    <td ><select name="stsess" id="stsess" onchange="callpage();">
      <option value="">--Select--</option>
      <?php
					$data1="select * from borno_student_info where borno_school_id='$schId' group by borno_school_session asc";
					$qdata1=$mysqli->query($data1);
					while($showdata1=$qdata1->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $showdata1['borno_school_session']; ?>" <?php if($showdata1['borno_school_session']==trim($_REQUEST['stsess'])) { echo "selected"; }  ?>> <?php   echo $showdata1['borno_school_session']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
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
      <option value=" <?php echo $shgtfiscalyear['fiscal_year_id']; ?>" <?php if($shgtfiscalyear['fiscal_year_id']==trim($_REQUEST['fiscalid'])) { echo "selected"; }  ?>> <?php   echo $shgtfiscalyear['fiscal_year_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
    <tr style="background-color: #75cbd6;">
    <td class="text_table">Head Type*:</td>
    <td><select name="type" id="type" onchange="callpage();">
        <option value="">--Select--</option>
        <option value="Annual"<?php if("Annual"==trim($_REQUEST['type'])) { echo "selected"; }  ?>> Annual </option>
        <option value="Monthly"<?php if("Monthly"==trim($_REQUEST['type'])) { echo "selected"; }  ?>> Monthly </option>
        <option value="Exam_fee"<?php if("Exam_fee"==trim($_REQUEST['type'])) { echo "selected"; }  ?>> Exam fee </option>
        <option value="Others"<?php if("Others"==trim($_REQUEST['type'])) { echo "selected"; }  ?>> Others </option>
     </select></td>
  </tr> 

<tr style="background-color: #75cbd6;">
    <td class="text_table">Head Name*:</td>
    <td >
        <select name="headid" id="headid" onchange="callpage();">
    <option value="">--Select--</option>
        <?php                                       
         $getHeadId="SELECT * FROM `fees_head_name`";
		
		
		$qgetHeadId=$mysqli->query($getHeadId);
		while($sqgetHeadId=$qgetHeadId->fetch_assoc()){
				
		
                                    
                                    ?>
                                <option value=" <?php echo $sqgetHeadId['head_id']; ?>" <?php if($sqgetHeadId['head_id']==$_POST['headid']) { echo "selected"; }  ?>> <?php echo $sqgetHeadId['head_name']; ?></option>
                                <?php } ?>
                              </select>
  </tr> 
  <?php
  $type =trim($_REQUEST['type']); 
  
 // echo $type;
  if($type !="Monthly" || $type == ""){
  ?>
  
  <tr style="background-color: #75cbd6;">
    <td class="text_table">Month:</td>
    <td><select name="month" id="month">
        <option value="">--Select--</option>
        <option value="1"> January </option>
        <option value="2"> February </option>
        <option value="3"> March </option>
        <option value="4"> April </option>
        <option value="5"> May </option>
        <option value="6"> June </option>
        <option value="7"> July </option>
        <option value="8"> August </option>
        <option value="9"> September </option>
        <option value="10"> October </option>
        <option value="11"> November </option>
        <option value="12"> December </option>
        
     </select></td>
  </tr> 
 <?php } ?>
<tr style="background-color: #75cbd6;">
    <td class="text_table" >Amount *</td>
    <td><input type="text" name="amount" placeholder="Amount" id="amount" onkeypress=" return isNumber(event)" style ="width: 194px;"></td>
  </tr>       
  <!--<tr style="background-color: #75cbd6;">-->
  <!--  <td class="text_table" >Amount(For Civilian) *</td>-->
  <!--  <td><input type="text" name="civilian_amount" placeholder="Civilian_Amount" id="civilian_amount" onkeypress=" return isNumber(event)" style ="width: 194px;"></td>-->
  <!--</tr> -->

<tr style="background-color: #75cbd6;">
         <td colspan="2" align="center"><input type="submit" name="" id="" value="Add" onClick="return contalt_valid()"></td>
  </tr>
       </form>   
                        </table>


                      
                  </center>
                </div>
            </div>
        </div><!-- Main Body part end -->
    </div><!-- Main Content end -->
</div>

<!--Script part-->
<script type="text/javascript" src="../../academic/assets/js/jquery-3.2.1.min.js"></script>
</body>
<script>
function isNumber(evt)
		 {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true; }
    </script>
</html>