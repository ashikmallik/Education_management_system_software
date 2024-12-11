<?php require_once('sms_top.php');?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Borno Sky</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- Meta -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    
    <script language="javascript">
		function callpage()
		{
		 document.frmart.action="create_group.php";
		 document.frmart.submit();
		}
	</script>
    
    <SCRIPT LANGUAGE="JavaScript">
function textCounter(field,cntfield,maxlimit) {
	if (field.value.length > maxlimit) // if too long...trim it!
		field.value = field.value.substring(0, maxlimit);
		// otherwise, update 'characters left' counter
	else
		cntfield.value = maxlimit - field.value.length;
	}
</script>
 
	
</head>
<body>
<div class="main">
	<div class="left_fixed">
		<div class="logo_top">
		  <a href="index.php"><img src="images/indiv/sms.jpg" height="80px" width="120px"></a>
			<a href=""><img src="../../images/sms/g01.jpg" height="80px" width="120px"></a>
		</div>
		<div class="logo"><img src="images/logo.jpg"></div>
	</div>
	<div class="main_content_ind">
		<div class="sm_main_part">
			<div class="in_form">
				<form name="frmart" action="create_group_do.php" method="post" enctype="multipart/form-data">
					<center>
						<table>
							<tbody>
                            <tr>
                              <td colspan="2" align="center">
                              <?php
                	$msg=$_GET['msg'];
					if($msg==1){ echo "Create Group Successfull"; }
					else if($msg==2){ echo "Failed"; }
					else if($msg==3){ echo "Group Already Created"; }
					else if($msg==4){ echo "Group Name Edited"; }
					else { echo "Create Group"; }
					
				?>
                              </td>
                            </tr>
							<tr>
								<td width="105">Data:</td>
								<td width="273"><?php echo date('d.m.Y'); ?></td>
							</tr>
							<tr>
								<td>Group Name :</td>
								<td><input type="text" name="group" id="group" /></td>
							</tr>
							</tbody>
						</table>
					</center>
				<center><input type="submit" value="Save">
					  <input type="hidden" name="schId" id="schId" value="<?php echo $schId; ?>" />
					</center>
                </form> <br><br>
				
                <form name="myForm" action="update_group_do.php" method="post" enctype="multipart/form-data">
                  <center>
                  <table width="569">
							<tbody>
							 <?php
							 
							 
							 
							$studId=$_GET['groupid1'];
							if($studId!=""){
		
							$deletestud="delete from borno_school_group where borno_school_group_id='$studId'";
							$mysqli->query($deletestud);
		
		}
                                        
                                        $data="select * from borno_school_group where borno_school_id='$schId'";
                                        $qdata=$mysqli->query($data);
                                        while($showdata=$qdata->fetch_assoc()){ $sl++;
                                    
                                    ?>
							<tr>
								<td width="130" height="37">Group Name :</td>
								<td width="335"><input type="text" name="group1[]" id="group1[]" Value="<?php echo $showdata['borno_school_group_Name'];?>"/>
                                <input type="hidden" name="groupid[]" id="groupid[]" value="<?php echo $showdata['borno_school_group_id']; ?>" /></td>
								<td width="88" align="center"><a href="create_group.php?groupid1=<?php echo $showdata['borno_school_group_id']; ?>" onclick="return confirm('Seure to Delete')">Delete</a></td>
                            </tr>
                               <?php } ?>     
							</tbody>
						</table>
                  <input type="submit" value="Update">
				    <input type="hidden" name="schId" id="schId" value="<?php echo $schId; ?>" />
					</center>
				</form>
		  </div>
		</div>
	</div>
</div>

<script type="text/javascript" src="../../js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../../js/bootstrap.min.js"></script>

<script>
$("#checkAll").change(function () {
      $("input:checkbox").prop('checked', $(this).prop("checked"));
});
</script>


 
</body>
</html>