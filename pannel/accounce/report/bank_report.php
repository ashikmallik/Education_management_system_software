<?php require_once('report_sett_top.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>:: [Accounce Report]::</title>
    <link rel="stylesheet" type="text/css" href="../../academic/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../academic/assets/css/font-awesome.css">
    <!-- Meta tag -->
    <meta charset="utf-8">
    <!-- Include media queries -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

      <link rel="stylesheet" href="../student/datCss/jquery-ui.css">
    <link rel="stylesheet" href="../student/datCss/jquery-ui1.css">
    <link rel="stylesheet" href="../student/datCss/style.css">
    <script src="../student/datCss/jquery-1.12.4.js"></script>
    <script src="../student/datCss/jquery-ui.js"></script>
    <script src="../student/datCss/jquery-ui1.js"></script>

<script>
  $( function() {
    $( "#datepicker" ).datepicker();
    $( "#datepicker1" ).datepicker();
	
  } );
  </script>     
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
	 document.frmcontent.action="bank_report.php";
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
               <h3>Accounce Report [<?php echo $shget_schoolName['borno_school_name']; ?>]</h3>
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../../academic/assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Bank Report </h2></div>
                <div class="form">
                    <center>
                    	<form name="frmcontent" action="download_bank_report.php" method="post" enctype="multipart/form-data" target="_blank">
                        <?php
			$msg=$_GET['msg'];
			if($msg==1) { echo "Success"; }
			else if($msg==2) { echo "Failed"; }
            else if($msg==3) { echo "Fees Already Exist"; }
 ?>
                        <table style="border: 1px solid #005067;">
                	<?php
        
		date_default_timezone_set('Asia/Dhaka');	
		
		$cdate=date('d-m-Y');
		
		?>
                <tr>
            <td class="text_table">From Date *</td>
    <td><input type="date" name="datepicker" id="datepicker" value="<?php echo $cdate; ?>"></td>
  </tr>                    
     <tr>
            <td class="text_table">To Date *</td>
    <td><input type="date" name="datepicker1" id="datepicker1" value="<?php echo $cdate; ?>"></td>
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