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
                  <h2>Exam Routine Manage</h2></div>
                <div class="form">
                    <center>


<script language="javascript">
function callpage()
{
	 document.frmcontent.action="exam_routine_manage.php";
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
		if(document.frmcontent.studClass.value=="")
		{
			alert("Please Select Class");
			document.frmcontent.studClass.focus();
			return (false);
		}

						
	}
</script> 


<form name="frmcontent" action="" method="post" enctype="multipart/form-data">

<table width="400" border="0" cellspacing="0" cellpadding="0" align="center" class="projectlist">

    <tr>

    
    <td colspan="3" align="center" style="color: #FE0000; font-size:24px">
    	<?php
        	$msg=$_GET['msg'];
	if($msg==1) { echo "Delete Successfully"; } else if($msg==2) { echo "Failed"; }  else if($msg==3) { echo "Already Exist"; } 
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
    <td><strong>Select Class *</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><select style="width:100px; height:25px;" name="studClass" id="studClass" onchange="callpage();">
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
      <option value=" <?php echo $shgstclass1['borno_school_class_id']; ?>" <?php if($shgstclass1['borno_school_class_id']==$_REQUEST['studClass']) { echo "selected"; }  ?>> <?php echo $shgstclass1['borno_school_class_name']; ?></option>
      <?php } ?>
    </select></td>
  </tr>

      
</table>

</form>
<br>

    
    
<table width="500" border="0" cellspacing="0" cellpadding="0" align="center" class="projectlist">
  <tr align="center">
    <td  align="center">Date</td>
    <td  align="center">Day</td>
    <td  align="center">Subject Name</td>
    <td  align="center">Action</td>
 </tr>
  <tr >
  <?php
  $subId=$_GET['subId'];
  		$deletestud="delete from borno_school_exam_routine where borno_school_exam_routine_id='$subId'";
		$mysqli->query($deletestud);
		//echo "Delete Success";
  
	 $studClass=trim($_REQUEST['studClass']);
	   $gtfbranchId=trim($_REQUEST['branchId']);
  
	 $getexam="select * from borno_school_exam_routine where borno_school_id ='$schId' AND borno_school_branch_id='$gtfbranchId' and `borno_school_exam_routine_class` ='$studClass' order by borno_school_exam_routine_date ";
    
    	$qgetexam=$mysqli->query($getexam);
	$sl=0;
	while($shqgetexam=$qgetexam->fetch_assoc()){ $sl++;
 
  
  
  ?>
   
     <td align="center" ><?php echo $shqgetexam['borno_school_exam_routine_date']; ?></td>
  <td align="center" ><?php echo $shqgetexam['borno_school_exam_routine_day']; ?></td>
    <td align="center" ><?php echo $shqgetexam['borno_school_exam_routine_subject']; ?></td>
   <td  align="center"><a href="exam_routine_manage.php?subId=<?php echo $shqgetexam['borno_school_exam_routine_id']; ?>&msg=1" onclick="return confirm('Seure to Delete')">Delete</a></td>
  
  
  </tr>
  


  <?php
  

	  	
	}
  ?>

  
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
<script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js"></script>
</body>
</html>