<?php require_once('result_sett_top.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>:: [Result  Settings]::</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <!-- Meta tag -->
    <meta charset="utf-8">
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
</head>
<body>
</script>
<script language="javascript">
function callpage()
{
 document.frmcontent.action="manage_subject05.php";
 document.frmcontent.submit();
}
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
            <a href=""><img src="../assets/images/logo.jpg" class="img-fluid"></a>
        </div>
    </div><!-- side bar end -->

    <div class="ot_main_content">
        <div class="admin_logout">
            <div class="admin_head">
                <h3 style="font-size:25px"> Result Settings [ <?php echo $shget_schoolName['borno_school_name']; ?> ]</h3>
                
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Manage Subject Play to Five</h2></div>
                <div class="form">
                    <center>
                    	<form name="frmcontent" action="manage_subject05_do.php" method="post" enctype="multipart/form-data">
                        <?php
			$msg=$_GET['msg'];
			if($msg==1) { echo "Manage Subject successful "; }
			else if($msg==2) { echo "Failed"; }

 ?>
                        <table style="border: 1px solid #005067;">
                                               
                         <tr>
    <td class="text_table">Select Class *</td>
    
    <td><select name="studClass" id="studClass" onchange="callpage();">
      <option value="">--Select--</option>
 <?php
					$gstclass="select * from borno_school_set_class where borno_school_id='$schId' and borno_school_class_id!=1 and borno_school_class_id!=2 and borno_school_class_id!=3 and borno_school_class_id!=4 and borno_school_class_id!=5 and borno_school_class_id!=16 and borno_school_class_id!=17  order by class_order asc";
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
  <tr>
    <td class="text_table">Session *</td>
    <td><select name="stsess" id="stsess" onchange="callpage();">
    <option value="">--Select--</option>
      <?php
	  $studClass=$_REQUEST['studClass'];
	  
					$data1="select borno_school_session from borno_result_subject where borno_school_id='$schId' and borno_school_class_id='$studClass' group by borno_school_session asc";
					$qdata1=$mysqli->query($data1);
					while($showdata1=$qdata1->fetch_assoc()){ $sl++;
				
				?>
      <option value=" <?php echo $showdata1['borno_school_session']; ?>" <?php if($showdata1['borno_school_session']==trim($_REQUEST['stsess'])) { echo "selected"; }  ?>> <?php echo $showdata1['borno_school_session']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
                        </table>
                        </form>
                        <br>
                        <form name="frmcontent1" action="manage_subject05_do.php" method="post" enctype="multipart/form-data">
                        
                            <table width="400" style="border: 1px solid #005067;">
                              <tr>
                                <td align="center">Subject Name</td>
                                <td align="center">Mark</td>
                                <td align="center">Subject Type</td>
                                <td align="center">Action</td>
                              </tr>
                              <?php
							  
							  $subId=$_GET['subId'];
					if($subId!=""){
						
						$delterm="DELETE from borno_result_subject where borno_result_subject_id='$subId'";
						$mysqli->query($delterm);
						}
							  
							  
    		$studClass=trim($_POST['studClass']);
            $stsess=trim($_POST['stsess']);
           
		   
		    
						
						
            $gtedtgrade="select * from borno_result_subject where borno_school_id='$schId' AND borno_school_class_id='$studClass' AND borno_school_session='$stsess' order by borno_result_subject_id asc";
			$s=0;
            $qgtedtgrade=$mysqli->query($gtedtgrade);
           while($shgtedtgrade=$qgtedtgrade->fetch_assoc()){$s++;	
		   
		  
		   
		   
   ?>
                              <tr>
                              

                              
                                <td align="center"><input name="termName[]" type="text" id="termName[]" size="30" value=" <?php echo $shgtedtgrade['borno_school_subject_name']; ?>">
                                 <input type="hidden" name="termtype[]" id="termtype[]" value="<?php echo $shgtedtgrade['borno_result_subject_id']; ?>" />
                                
                                </td>
                                <td align="center"><input name="perc[]" type="text" id="perc[]" size="5" value=" <?php echo $shgtedtgrade['borno_school_subject_fullmark']; ?>"></td>
                                <td align="center"><select name="addsub[]" id="addsub[]">
                                <option value="0"<?php if($shgtedtgrade['subst']=='0') { echo "selected"; } ?>> Main </option>
                                 <option value="1"<?php if($shgtedtgrade['subst']=='1') { echo "selected"; } ?>> Uncountable </option>
                                   		
                                   </select></td>
                               
                                <td align="center"><a href="manage_subject05.php?subId=<?php echo $shgtedtgrade['borno_result_subject_id']; ?>" onClick="return confirm ('Sure to Delete')">Delete</a></td>
                              </tr>
                             <?php } ?>
                              
                               
                               <tr>
 <td colspan="5" align="center"><input type="submit" name="submit" id="submit" value="Update" onClick="return contalt_valid()">
  <input type="hidden" name="stuclass" id="stuclass" value="<?php echo $_POST['studClass']; ?>" />
  <input type="hidden" name="studess" id="studess" value="<?php echo $_POST['stsess']; ?>" /></td>
                              </tr>
                            </table>

                        </form>
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