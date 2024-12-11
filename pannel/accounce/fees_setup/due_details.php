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
                  <h2>Due Details</h2></div>
                <div class="form">
                    <center>
        <form name="frmcontent" action="" method="post" enctype="multipart/form-data">
            <?php 
              $student_id = $_GET['studentId'];
              $yeardetails = $_GET['yeardetails'];
              $yearid = $_GET['yearid'];
              
            $gtstudentinfo="SELECT borno_school_student_name,borno_school_class_name,borno_school_section_name,borno_school_session, (CASE WHEN (bsi.borno_school_shift_id = 2 ) THEN 'Morning' ELSE 'DAY' END) AS shift FROM `borno_student_info` AS bsi INNER JOIN `borno_school_class` AS bsc ON bsc.borno_school_class_id=bsi.borno_school_class_id INNER JOIN `borno_school_section` AS bss ON bss.borno_school_section_id = bsi.borno_school_section_id WHERE `borno_student_info_id`= '$student_id'";
		    $qgtstudentinfo=$mysqli->query($gtstudentinfo);
		    $shgtstudentinfo=$qgtstudentinfo->fetch_assoc();
		    
		    $sname= $shgtstudentinfo['borno_school_student_name'];
		    $class= $shgtstudentinfo['borno_school_class_name'];
		    $section= $shgtstudentinfo['borno_school_section_name'];
		    $shift= $shgtstudentinfo['shift'];
		    $session= $shgtstudentinfo['borno_school_session'];
		    
		    
		    
            ?>
    <table style="border:1px #000 solid; margin-top:-35px;">
<tr style="background-color: #75cbd6;">
    <td class="text_table">Studen ID :</td>
    <td style="border:1px #000 solid;"><?php echo $student_id; ?></td> 
     
  </tr> 
  <tr style="background-color: #75cbd6; border:1px #000 solid;">
    <td class="text_table">Student Name :</td>
    <td style="border:1px #000 solid;">
     <?php echo $sname; ?>
    </td>
  </tr>
   <tr style="background-color: #75cbd6; border:1px #000 solid;">
    <td class="text_table">Class :</td>
    <td style="border:1px #000 solid;">
      <?php echo $class; ?>
    </td>
  </tr>
   <tr style="background-color: #75cbd6; border:1px #000 solid;">
    <td class="text_table">Shift :</td>
    <td style="border:1px #000 solid;">
       <?php echo $shift; ?>
    </td>
  </tr>
   <tr style="background-color: #75cbd6; border:1px #000 solid;">
    <td class="text_table">Section :</td>
    <td style="border:1px #000 solid;">
      <?php echo $section; ?>
    </td>
  </tr>
  
   <tr style="background-color: #75cbd6; ">
    <td class="text_table">Session :</td>
    <td style="border:1px #000 solid;">
      <?php echo $session; ?>
    </td>
  </tr>
            
       </table>     
            
        </form>
                      
                      
                      
                        
       
                        <br>
                            <table width="800" border="1" style="border: 1px solid #005067;">
                              <tr style="background-color: #005067; color: #fff;">
                                <td align="center">Head Name</td>
                               <td align="center">Month Name</td>
                               <td align="center">Due Amount</td>
                              </tr>
                                <?php
                                
                                    
	  
  		$gtduelist="SELECT `month_name`,`head_name`,`due_amount` FROM `student_fees` AS sf INNER JOIN fees_head AS fh ON fh.`fees_head_id` = sf.`fees_head_id` WHERE `due_amount` > 0 AND `student_id` ='$student_id'AND `fiscal_year_details_id` <= '$yeardetails' AND  sf.`fiscal_year_id`='$fiscalid'";
		$sl=0;
		$qgtduelist=$mysqli->query($gtduelist);
		while($shgtduelist=$qgtduelist->fetch_assoc()){
		
		$sl++;
  
  ?>
<tr>
    <td width="20%;" align="center"><?php echo $shgtduelist['head_name']; ?></td>
    <td width="20%;" align="center"><?php echo $shgtduelist['month_name']; ?></td>
    <td width="20%;" align="center"><?php echo $shgtduelist['due_amount']; ?></td>
  </tr>
                              
      
  <?php } ?>                    
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
</html>