<?php require_once('others_top.php');?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>:: [Attendance]::</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <!-- Meta tag -->
    
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
                <h3>[<?php echo $shget_schoolName['borno_school_student_name']; ?>] </h3>
                
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

 <div class="ot_main_body" style="margin-top:5px; margin-left:5px;">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2><span style="font-size:25px">Class Routine Report</span></h2>
              </div>
                <div class="form">
                    <center>


<script language="javascript">
function callpage()
{
	 document.frmcontent.action="class_routine_report.php";
	 document.frmcontent.submit();
}
</script>




	<form name="frmcontent" action="download_routine.php" method="post" enctype="multipart/form-data" target="_blank">
<table width="500" border="1"  align="center" style="margin-top:-20px; text-indent:5px" >
<?php
 	$data="select * from borno_student_info where borno_student_info_id='$stdid'";
	$qdata=$mysqli->query($data);
	$showdata=$qdata->fetch_assoc();
					
$schId=$showdata['borno_school_id'];
$studClass=$showdata['borno_school_class_id'];
$shiftId=$showdata['borno_school_shift_id'];
$section=$showdata['borno_school_section_id'];
$stsess=trim($showdata['borno_school_session']);
?>
     <tr>
     <td bgcolor="#6699CC" align="center">Day/Period</td>
     
     
    <td bgcolor="#6699CC" align="center">First</td>
    <td bgcolor="#6699CC" align="center">Second</td>
    <td bgcolor="#6699CC" align="center">Third</td>
    <td bgcolor="#6699CC" align="center">Fourth</td>
    <td bgcolor="#6699CC" align="center">Fifth</td>
    <td bgcolor="#6699CC" align="center">Sixth</td>
    <td bgcolor="#6699CC" align="center">Seventh</td>
    <td bgcolor="#6699CC" align="center">Eighth</td>
    
    
    
  </tr> 
  <?php
   $sql ="select * from borno_school_class_routine where  borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' Group by borno_school_routine_day Asc";
					$qsql=$mysqli->query($sql);
					while($row=$qsql->fetch_assoc()){ 
				$dayId=$row['borno_school_routine_day'];
				if($dayId==1){$dayname='Saturday';}	
				elseif($dayId==2){$dayname='Sunday';}
				elseif($dayId==3){$dayname='Monday';}	
				elseif($dayId==4){$dayname='Tuesday';}	
				elseif($dayId==5){$dayname='Wednesday';}	
				elseif($dayId==6){$dayname='Thursday';}	
			
 				 ?>
                     
    <tr> 
    <td>
    <?php echo $dayname;  ?>
    </td>
     <?php
     
     for($i=1;$i<9;$i++){
       $sql2 ="select * from borno_school_class_routine where  borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_shift_id='$shiftId' AND borno_school_section_id='$section' AND borno_school_session='$stsess' AND borno_school_routine_day='$dayId' AND borno_school_routine_period=$i";
					$qsql2=$mysqli->query($sql2);
					$rowsubject=$qsql2->fetch_assoc();
    $subId=$rowsubject['borno_school_subject_id'];

				
	if($studClass==1 OR $studClass==2){
	 $gsubjName="select * from borno_subject_nine_ten where borno_subject_nine_ten_id ='$subId'";
	$qgsubjName=$mysqli->query($gsubjName);
	$shgsubjName=$qgsubjName->fetch_assoc();				
	$subjectName=$shgsubjName['borno_subject_nine_ten_name'];	
	}
			
	elseif($studClass==3 OR $studClass==4 OR $studClass==5){
$gsubjName="select * from borno_set_subject_six_eight where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND subject_id_six_eight ='$subId'";
			$qgsubjName=$mysqli->query($gsubjName);		
			$shgsubjName=$qgsubjName->fetch_assoc();
			$subjectName=$shgsubjName['six_eight_subject_name'];
	}
	else{		
$gsubjName="select * from borno_result_subject where borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_school_id='$schId'";
			$qgsubjName=$mysqli->query($gsubjName);		
			$shgsubjName=$qgsubjName->fetch_assoc();
			$subjectName=$shgsubjName['borno_school_subject_name'];	
	}
	
    if($subId==""){
      ?>
      <td align="center">
    ---
    </td>  

        <?php } else{ ?>       
    <td>
    <?php echo $subjectName;  ?>
    </td>  

        <?php } } ?>          
    </tr>                        
      <?php } ?>                      
        
   <tr>
<td colspan="9" align="center"><input type="submit" name="button" id="button" value="Download Class Rourine" formtarget="_blank" ></td>
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