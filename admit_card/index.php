<?php 
include('../connection.php');

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
                <!--<h2 style="color: red;" >রক্ষণাবেক্ষণ কাজের জন্য অন-লাইনে বেতন আদায় সাময়িক সময়ের জন্য বন্ধ রয়েছে </h2>-->
               
                
                <div class="col-md-6 login-form-2" style="margin: auto;">
                    <h3>Admit Card</h3>
                    <form action="login_action.php" method="post" enctype="multipart/form-data" > 
                    <!--login_action.php-->
                        <div class="form-group">
                            <input type="text" id="sid" name="sid" class="form-control" placeholder="Student ID *" value=""/>
                            <input type="hidden" id="branchid" name="branchid" value="<?php echo $branchId; ?>"/>
                        </div>
                       <div class="row">
                            <div class="col-md-4">
                            <leble class="form-control">
                                Term :
                            </leble>
                            </div>
                            <div class="col-md-8">
            <select name="term" id="term"  class="form-control">
      <option value="">--Select--</option>
      <option value="Half Yearly Exam-2022">Half Yearly Exam-2022</option>
      <option value="Annual Exam-2022 ">Annual Exam-2022 </option>

    </select>
    </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Download" />
                        </div>
                        
                      
                    </form>
                </div>
            </div>
        </div>
</html>