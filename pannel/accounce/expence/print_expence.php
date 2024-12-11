<?php require_once('expence_sett_top.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>:: [Expence]::</title>
    <link rel="stylesheet" type="text/css" href="../../academic/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../academic/assets/css/font-awesome.css">
    <!-- Meta tag -->
    <meta charset="utf-8">
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
</head>
<body>
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
	 document.frmcontent.action="print_expence.php";
	 document.frmcontent.submit();
	}	
	
		
</script> 
<div class="wrapper">
    <div class="side_main_menu">
        <?php require_once('leftmenu.php');?>	
        <div class="fixed_logo">
            <a href=""><img src="../../academic/assets/images/logo.jpg" class="img-fluid"></a>
        </div>
    </div><!-- side bar end -->

    <div class="ot_main_content">
        <div class="admin_logout">
            <div class="admin_head">
               <h3>Expence </h3>
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../../academic/assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Print Expence Memo </h2></div>
                <div class="form">
                    <center>
                    	<form name="frmcontent" action="download_receipt2.php" method="post" enctype="multipart/form-data" target="_blank">
                        <?php
			$msg=$_GET['msg'];
			if($msg==1) { echo "Success"; }
			else if($msg==2) { echo "Failed"; }
            else if($msg==3) { echo "Fees Already Exist"; }
 ?>
                        <table style="border: 1px solid #005067;">
                <tr>
            <td class="text_table">Memo No *</td>
    <td><input type="text" name="memo" id="memo"></td>
  </tr>                    
                             
                            
                            
        
   <tr>
<td colspan="2" align="center"><input type="submit" name="button" id="button" value="Print" onClick="return contalt_valid()"></td>
  </tr>

                        </table>
                         </form>  

                      
                         
                  </center>
                </div>
            </div>
        </div><!-- Main Body part end -->
    </div><!-- Main Content end -->
</div>


<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>

<script type="text/javascript">

$('.form-group').on('input','.prc',function(){
    var totalSum = 0;
    $('.form-group .prc').each(function(){
        var inputVal = $(this).val();
        if($.isNumeric(inputVal)){
            totalSum += parseFloat(inputVal);
        }
    });
        $('#result').val(totalSum);
});

</script>
</body>
</html>