<?php require_once('information_top.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>Information Settings</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <!-- Meta tag -->
    <meta charset="utf-8">
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    
    <script language="javascript">
		function callpage()
		{
		 document.frmart.action="school_class_list.php";
		 document.frmart.submit();
		}
	</script>
    
</head>
<body>

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
                <h3> <?php echo $shget_schoolName['borno_school_name']; ?> </h3>
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading"><h2> Set Institute Class </h2></div>
                <div class="form">
                    <center>
                    <form name="frmart" action="set_class_do.php" method="post" enctype="multipart/form-data">
                       	<?php
								$msg=$_GET['msg'];
								if($msg==1){ echo "Set Class Success"; }
								else if($msg==2){ echo "Failed"; }								
				         ?>
                        <table width="300" border="0" cellspacing="0" cellpadding="0" class="projectlist">
                          <tr>
                            <td width="114">Select Branch</td>
                            <td width="17" align="center">:</td>
                            <td width="168">
                            <select name="branchId" id="branchId" onChange="callpage();">
                              <option value=""> Select Branch </option>
                              <?php
                                      						   
									    $data="select * from borno_school_branch where borno_school_id='$schId'";
                                        $qdata=$mysqli->query($data);
                                        while($showdata=$qdata->fetch_assoc()){ $sl++;
                                    
                                    ?>
                              <option value=" <?php echo $showdata['borno_school_branch_id']; ?>" <?php if($showdata['borno_school_branch_id']==$_POST['branchId']) { echo "selected"; }  ?>> <?php echo $showdata['borno_school_branch_name']; ?></option>
                              <?php } ?>
                            </select></td>
                          </tr>                          
                        </table>
						<br>
                        
                        <table width="300" cellpadding="0" cellspacing="0" class="projectlist">
                            <tr>
                              <th width="42">SL</th>
                              <th width="199">Class Name</th>
                              <th width="57">Action</th>
                            </tr>
                            <?php							
							$stclsid=$_GET['stclsid'];
							if($stclsid!=""){
								
								$delClass="delete from borno_school_set_class where borno_school_set_class_id='$stclsid'";
								$mysqli->query($delClass);
								
								}
							 
							 
							 $branchId=$_POST['branchId'];
									   $getClassId="select * from borno_school_set_class where borno_school_id='$schId' AND borno_school_branch_id='$branchId' order by class_order asc";
		
		$sl=0;
		$qgetClassId=$mysqli->query($getClassId);
		while($shgetClassId=$qgetClassId->fetch_assoc()){
			$sl++; 
							
							?>
                            <tr>
                                <td align="center"> <?php echo $sl; ?> </td>
                                <td>
								<?php
								    $getfClassId=$shgetClassId['borno_school_class_id']; 
									$classSet="select * from borno_school_class where borno_school_class_id='$getfClassId'";							
									$qclassSet=$mysqli->query($classSet);
									$shclassSet=$qclassSet->fetch_assoc();
									echo $shclassSet['borno_school_class_name']; 
								 
								 ?>
                                
                              </td>
                                <td align="center"><a href="school_class_list.php?stclsid=<?php echo $shgetClassId['borno_school_set_class_id']; ?>" onClick="return confirm('Seure To delete');"><img src="../images/b_drop.png" width="16" height="16"></a></td>
                          </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="3"><center>
                              </center></td>
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