<?php 
include('../connection.php');
$memo=$_REQUEST['memo'];
		if(!empty($memo)){
		echo "<SCRIPT> 
        window.open('download_memo_half.php?memo=$memo').attr('target', '_blank');
        </SCRIPT>";
		}
?>
<html>
<head>
    <title>amarEskul</title>
    <link rel="stylesheet" type="text/css" href="style.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

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
function callpage()
	{
	 document.frmcontent.action="index.php";
	 document.frmcontent.submit();
	}
</script> 

<!------ Include the above in your HEAD tag ---------->

<div class="container login-container">
            <div class="row">
                
                
                
                <div class="col-md-8 login-form-2">
                    <h3>Login for Payment</h3>
                    <form action="login_action.php" method="post" enctype="multipart/form-data" > 
                    <!--login_action.php-->
                        <div class="form-group">
                            <input type="text" id="sid" name="sid" class="form-control" placeholder="Student ID or User ID" value=""/>
                            <input type="hidden" id="branchid" name="branchid" value="<?php echo $branchId; ?>"/>
                        </div>
                       
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Login" />
                        </div>
                      
                    </form>
                </div>
            </div>
        </div>
</html>