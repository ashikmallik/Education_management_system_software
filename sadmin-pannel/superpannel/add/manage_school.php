<?php
    include('pannel_top.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title> :: [Admin Pannel] :: </title>
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
                
                 <h3> Admin Pannel [ Add Data Section ] </h3> 
                
            </div>
            <div class="log_out">
                <a href="../logout.php"><img src="../assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Manage  School</h2></div>
                <div class="form">
                    <center>
                    	
                            <table width="748" border="0" cellspacing="0" cellpadding="0" class="projectlist" align="center">
                              <tr>
                                <td width="312" height="29"><strong>School Name</strong></td>
                                <td width="155"><strong>School Email</strong></td>
                                <td width="156"><strong>Phone</strong></td>
                                <td colspan="3" align="center"><strong>Action</strong></td>
                              </tr>
                              <?php
                                $scId=$_GET['scId'];
                                if($scId!=""){
                                    
                                    $delschool="delete from borno_school where borno_school_id='$scId'";
                                    $mysqli->query($delschool);
                                    
                                    }
                              
                                $school="select * from borno_school order by borno_school_name asc";
                                $qschool=$mysqli->query($school);	
                                while($shschool=$qschool->fetch_assoc()){
                              ?>
                              <tr>
                                <td><?php echo $shschool['borno_school_name']; ?>  </td>
                                <td><?php echo $shschool['borno_school_email']; ?></td>
                                <td><?php echo $shschool['borno_school_phone']; ?></td>
                                <td width="58" align="center"><a href="edit_school.php?scId=<?php echo $shschool['borno_school_id']; ?>">Edit</a></td>
                                <td width="66" colspan="2" align="center"><a href="manage_school.php?scId=<?php echo $shschool['borno_school_id']; ?>" onclick="return confirm('Are You Want To Delete')">Delete</a></td>
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
<script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js"></script>
</body>
</html>