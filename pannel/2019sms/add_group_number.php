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
		 document.frmart.action="add_group_number.php";
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
			<a href=""><img src="../../images/sms/gnumb.jpg" height="80px" width="120px"></a>
		</div>
		<div class="logo"><img src="images/logo.jpg"></div>
	</div>
	<div class="main_content_ind">
		<div class="sm_main_part">
			<div class="in_form">
				<form name="frmart" action="add_group_number_do.php" method="post" enctype="multipart/form-data">
					<center>
						<table>
							<tbody>
                            <tr>
                              <td colspan="2" align="center">
                              <?php
                	$msg=$_GET['msg'];
					if($msg==1){ echo "Add Number Successfull"; }
					else if($msg==2){ echo "Failed"; }
					else if($msg==3){ echo "Number Already Added"; }
					else { echo "Add Number of Group"; }
					
				?>
                              </td>
                            </tr>
							<tr>
								<td width="105">Data:</td>
								<td><?php echo date('d.m.Y'); ?></td>
							  </tr>
							<tr>
								<td>Select Group :</td>
								<td><select name="group" id="group">
								  <option value=""> Select Group </option>
								  <?php
                                        
                                        $data="select * from borno_school_group where borno_school_id='$schId'";
                                        $qdata=$mysqli->query($data);
                                        while($showdata=$qdata->fetch_assoc()){ $sl++;
                                    
                                    ?>
								  <option value=" <?php echo $showdata['borno_school_group_Name']; ?>" <?php if($showdata['borno_school_group_Name']==$_POST['group']) { echo "selected"; }  ?>> <?php echo $showdata['borno_school_group_Name']; ?>
                                  
                                  </option>
                                  <?php } ?>
						   
	                                </select>
                                </td>
                           	  </tr>
							<tr>
							  <td>Name :</td>
							  <td>
						      <input type="text" name="name" id="name" /></td>
							  </tr>
							<tr>
							  <td>Number :</td>
							  <td>
						      <input type="text" name="number" id="number" /></td>
							  </tr>
							</tbody>
						</table>
					</center>
				<center><input type="submit" value="Save">
					  <input type="hidden" name="schId" id="schId" value="<?php echo $schId; ?>" />
					</center>
                </form> <br><br>
				
                
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