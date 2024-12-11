<?php require_once('result_top.php'); ?>
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
		
		
		
	}
	
	
	function callpage()
	{
	 document.frmcontent.action="progress_report.php";
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
                <h3>Result Panel [ <?php echo $shget_schoolName['borno_school_student_name']; ?> ] </h3>
            </div>
            <div class="log_out">
                <a href=""><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2> Progress Report</h2></div>
                <div class="form">

<form name="frmcontent" id="myform" action="download_progress_report.php" method="post" enctype="multipart/form-data" >
  
<table width="50%" border="1" cellspacing="3" cellpadding="3" class="projectlist">

            <?php

        $data1="select borno_school_id from borno_student_info where borno_student_info_id='$stdid' group by borno_school_id";
         $qdata1=$mysqli->query($data1);
	$showdata1=$qdata1->fetch_assoc();  
	
 $schlId=$showdata1['borno_school_id'];

    $gtfbranchId=$showdata1['borno_school_branch_id'];   
	


        ?>

              <tr>
                <td><strong>Class *</strong></td>
                <td align="center"><strong>:</strong></td>
                <td><select name="studClass" id="studClass" onChange="callpage();">
                                <option value="">--Select--</option>
                                <?php                                       

										
		$getClassId="select * from borno_school_set_class where borno_school_id ='$schlId' ";
		
		
		$qgetClassId=$mysqli->query($getClassId);
		while($shgetClassId=$qgetClassId->fetch_assoc()){
										
										$getfClassId=$shgetClassId['borno_school_class_id']; 
                                        $gstclass="select * from borno_school_class where borno_school_class_id='$getfClassId'";
                                        $qgstclass=$mysqli->query($gstclass);
                                        $shgstclass=$qgstclass->fetch_assoc(); 
                                    
                                    ?>
                                <option value=" <?php echo $shgstclass['borno_school_class_id']; ?>" <?php if($shgstclass['borno_school_class_id']==$_POST['studClass']) { echo "selected"; }  ?>> <?php echo $shgstclass['borno_school_class_name']; ?></option>
                                <?php } ?>
                              </select></td>
              </tr>
              
              <tr>
                <td><strong>Session *</strong></td>
                <td align="center"><strong>:</strong></td>
                <td><select name="stsess" id="stsess" onchange="callpage();">
      <option value="">--Select--</option>
      <?php
		$datasession="select * from borno_student_info where borno_school_id ='$schlId'  Group By borno_school_session";
					$qdatasession=$mysqli->query($datasession);
					while($showdatasession=$qdatasession->fetch_assoc()){ 
				
				?>
      <option value=" <?php echo $showdatasession['borno_school_session']; ?>" <?php if($showdatasession['borno_school_session']==$_POST['stsess']) { echo "selected"; }  ?>> <?php echo $showdatasession['borno_school_session']; ?></option>
      <?php } ?>
      </select></td>
              </tr>

              <tr>
                <td><strong>Exam Type *</strong></td>
                <td align="center"><strong>:</strong></td>
                <td>
                  <select name="selTerm" id="selTerm" onchange="callpage();">
        <option value="">--Select--</option>
        <?php
			$studClass=trim($_POST['studClass']);
			$stsess=trim($_POST['stsess']);
			$schexterm="select * from borno_result_add_term where borno_school_class_id='$studClass' AND borno_school_session='$stsess' AND borno_school_id='$schlId'";
			$qschexterm=$mysqli->query($schexterm);
			while($shschexterm=$qschexterm->fetch_assoc()){
	  ?>
        <option value="<?php echo $shschexterm['borno_result_term_id']; ?>" <?php if($shschexterm['borno_result_term_id']==$_POST['selTerm']) { echo "selected"; } ?>><?php echo $shschexterm['borno_result_term_name']; ?></option>
        
        <?php } ?>  
        
        </select>
                </td>
              </tr>
              <tr>
              
       </tr>

       
              
              <tr>
              <?php
			  		$selTerm=trim($_POST['selTerm']);

			  ?>
              
                
              </tr>

  </table>
  
  <table width="50%" border="1px" cellspacing="3" cellpadding="3" class="projectlist" align="center">

  <tr>
    <td align="center" ><a href="download_progress_report.php?schId=<?php echo $schlId; ?>&studClass=<?php echo $studClass; ?>&stsess=<?php echo $stsess; ?>&selTerm=<?php echo $selTerm; ?>&stdId=<?php echo $stdid; ?>" target="_blank">One Term Progress Report</a></td>
  </tr>

  <tr>
    <td  align="center" ><a href="download_avg_progress_report.php?schId=<?php echo $schlId; ?>&studClass=<?php echo $studClass; ?>&stsess=<?php echo $stsess; ?>&selTerm=<?php echo $selTerm; ?>&stdId=<?php echo $stdid; ?>" target="_blank">Avg. Progress Report</a></td>
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