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
        
        
        
        <script language="javascript">
	function contalt_valid()
	{
		

		
		if(document.frmcontent.username.value=="")
		{
			alert("Please Enter User Name");
			document.frmcontent.username.focus();
			return (false);
		}
		

		
		if(document.frmcontent.address.value=="")
		{
			alert("Please Enter Address Name");
			document.frmcontent.address.focus();
			return (false);
		}
		if(document.frmcontent.phone.value=="")
		{
			alert("Please Enter Phone No");
			document.frmcontent.phone.focus();
			return (false);
		}
	if(document.frmcontent.email.value=="")
		{
			alert("Please Enter Email ID");
			document.frmcontent.email.focus();
			return (false);
		}	
	if(document.frmcontent.gender.value=="")
		{
			alert("Please Select Gender");
			document.frmcontent.gender.focus();
			return (false);
		}		
	if(document.frmcontent.ustype.value=="")
		{
			alert("Please Select User Type");
			document.frmcontent.ustype.focus();
			return (false);
		}	
	if(document.frmcontent.loginId.value=="")
		{
			alert("Please Enter Login ID");
			document.frmcontent.loginId.focus();
			return (false);
		}	
	if(document.frmcontent.loginpw.value=="")
		{
			alert("Please Enter Login Password");
			document.frmcontent.loginpw.focus();
			return (false);
		}
	}
	
	
	function callpage()
	{
	 document.frmcontent.action="add_user.php";
	 document.frmcontent.submit();
	}
	
	
	
</script>
        

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Add User</h2></div>
                <div class="form">
                    <center>
                    <form name="frmcontent" action="add_user_do.php" method="post" enctype="multipart/form-data">
                        <?php
                	$msg=$_GET['msg'];
					if($msg==1){ echo "User Add Successfull"; }
					else if($msg==2){ echo "Failed"; }
					else if($msg==3) { echo "Login ID Already Exist Please Select Another ID"; }
								
				?>
                        <table style="border: 1px solid #005067;">
                            <tr>
                                <td width="140" class="text_table">User Name :</td>
                                <td width="228"><input name="username" type="text" id="username"></td>
                            </tr>
                             <tr>
                                <td width="140" class="text_table">Address  :</td>
                                <td><input name="address" type="text" id="address"></td>
                            </tr>
                             <tr>
                                <td width="140" class="text_table">Phone :</td>
                                <td><input name="phone" type="text" id="phone"></td>
                            </tr>
                             <tr>
                                <td width="140" class="text_table">E-mail :</td>
                                <td><input name="email" type="text" id="email"></td>
                            </tr>
                             <tr>
                               <td class="text_table">Gender</td>
                               <td><select name="gender" id="gender">
                                 <option value="">--Select--</option>
                                 <option value="Male"> Male </option>
                                 <option value="Female"> Female </option>
                               </select></td>
                             </tr>
                                <tr>
                               <td class="text_table">Select User Type</td>
                               <td><select name="ustype" id="ustype">
                                 <option value="">--Select--</option>
                                 <option value="1"> Chief Accountant </option>
                                <option value="3"> Asst. Accountant </option>
                                 <option value="2"> Normal User </option>
                               
                               </select></td>
                             </tr>        
                             
                             <tr>
                                <td width="140" class="text_table">Login ID :</td>
                                <td><input name="loginId" type="text" id="loginId"></td>
                            </tr>
                               <tr>
                                <td width="140" class="text_table">Login Password :</td>
                                <td><input name="loginpw" type="password" id="loginpw"></td>
                            </tr>   
                            
                              <tr>
  
                                 <td class="text_table">Images :</td>
		            <td><label for="timg"></label>
	                <input type="file" name="timg" id="timg"></td>
  </tr>
                                
                            <tr>
                                <td></td>
                                <td><center><input type="submit" name="" value="Save" onClick="return contalt_valid()"></center></td>
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