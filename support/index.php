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
                <div class="col-md-12 login-form-2">
                    <h3>Create New Support Request</h3>
                    <form action="support_do.php" name="frmcontent" method="post" enctype="multipart/form-data">
                            <div class="row">
                    <div class="col-md-3">
                            <leble class="form-control">
                                Student Id :
                            </leble>
                            </div>
                            <div class="col-md-3">
         <input type="text" id="sid" name="sid" placeholder="Enter your ID" class="form-control"  size="27">
                            </div>
            <div class="col-md-3">
                            <leble class="form-control">
                                Contact No :
                            </leble>
                            </div>
                            <div class="col-md-3">
         <input type="text" id="contact" name="contact" placeholder="017XXXXXXX" class="form-control"  size="27">
                            </div>
                        </div>
 <br>
                        <div class="row">
                            <div class="col-md-3">
                            <leble class="form-control">
                                Problem Category :
                            </leble>
                            </div>
                            <div class="col-md-3">
                            <select name="category" id="category" class="form-control" >
      
      <option value=""> SELECT </option>
      <option value="Fees"> Fees </option>
      <option value="Result"> Result </option>
      <option value="Information Update"> Information Update </option>
      
    </select>
    </div>
    <!--                            <div class="col-md-3">-->
    <!--                        <leble class="form-control">-->
    <!--                            Problem Sub Category :-->
    <!--                        </leble>-->
    <!--                        </div>-->
    <!--                        <div class="col-md-3">-->
    <!--                        <select name="dept" id="dept" class="form-control" >-->
      
    <!--  <option value=""> SELECT </option>-->
    <!--  <option value="Fees"> Fees </option>-->
    <!--  <option value="Result"> Result </option>-->
    <!--  <option value="Information Update"> Information Update </option>-->
      
    <!--</select>-->
    <!--</div>-->
                        </div>
  <br>              
              <div class="row">
                    <div class="col-md-3">
                            <leble class="form-control">
                                Subject :
                            </leble>
                            </div>
                            <div class="col-md-9">
         <input type="text" id="subject" name="subject" placeholder=" " class="form-control"  size="27">
                            </div>
   
                        </div>  
  <br>              
              <div class="row">
                    <div class="col-md-3">
                            <leble class="form-control">
                                Description :
                            </leble>
                            </div>
                            <div class="col-md-9">
         <textarea type="text" id="description" name="description" rows="4" class="form-control"></textarea>
                            </div>
   
                        </div>  
              <br>              
              <div class="row">
                    <div class="col-md-3">
                            <leble class="form-control">
                                Attachments :
                            </leble>
                            </div>
                            <div class="col-md-3">
                            <input type="file" id="attachemnet" name="attachemnet">
                            </div>
   
                        </div>             
                        
<br>
                        <div class="form-group">
                         
                            <input type="submit" class="btn btn-primary" style="margin-left: 50%;" value="Submit" />
                        
                        </div>

                             

                </div>
                

            </div>
        </div>
</html>