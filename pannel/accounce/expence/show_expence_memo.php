<?php require_once('expence_sett_top.php');
 $memo= $_POST['memo'];
   	$gsess="select * from borno_school_expence where borno_school_expence_memo = '$memo'";
 	$qterm=$mysqli->query($gsess);
	$shterm=$qterm->fetch_assoc();

	$receiptdate1=$shterm['borno_school_ex_date'];
	$studClass=$shterm['borno_school_month'];
	$shiftId=$shterm['borno_school_exhead'];    
	$section=$shterm['borno_school_exname'];
	$gbalsess=$shterm['borno_school_exby'];
	$gbalinfo=$shterm['borno_school_expence_amount'];

    $receiptdate1=date("d-M-Y",strtotime($receiptdate1));
?>
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
	 document.frmcontent.action="show_expence_memo.php";
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
                  <h2>Delete Expence Memo </h2></div>
                <div class="form">
                    <center>
                    	<form name="frmcontent" action="delete_expence_do.php" method="post" enctype="multipart/form-data">
                        <?php
			$msg=$_GET['msg'];
			if($msg==1) { echo "Success"; }
			else if($msg==2) { echo "Failed"; }
            else if($msg==3) { echo "Memo Not Found"; }
 ?>
                        <table style="border: 1px solid #005067;">
                <tr>
            <td class="text_table">Memo No *</td>
    <td><input type="text" name="memo" id="memo" value="<?php echo $memo; ?>" size="30"></td>
  </tr>                    
   <tr>
            <td class="text_table">Date *</td>
    <td><input type="text" name="date" id="date" value="<?php echo $receiptdate1; ?>" size="30"></td>
  </tr>                             
   <tr>
            <td class="text_table">Month *</td>
    <td><input type="text" name="class" id="class" value="<?php echo $studClass; ?>" size="30"></td>
  </tr>                          
  <tr>
            <td class="text_table">Expence Head *</td>
    <td><input type="text" name="shift" id="shift" value="<?php echo $shiftId; ?>" size="30"></td>
  </tr>                           
     <tr>
            <td class="text_table">Expence Name *</td>
    <td><input type="text" name="section" id="section" value="<?php echo $section; ?>" size="30"></td>
  </tr>  
       <tr>
            <td class="text_table">Expence By *</td>
    <td><input type="text" name="session" id="session" value="<?php echo $gbalsess; ?>" size="30"></td>
  </tr> 
  <tr>
            <td class="text_table">Amount *</td>
    <td><input type="text" name="stdid" id="stdid" value="<?php echo $gbalinfo; ?>" size="30"></td>
  </tr>                           
        
   <tr>
<td colspan="2" align="center"><input type="submit" name="button" id="button" value="Delete" onclick="return confirm('Seure to Delete')"></td>
  </tr>

                        </table>
                         </form>  

                      
                         
                  </center>
                </div>
            </div>
        </div><!-- Main Body part end -->
    </div><!-- Main Content end -->
</div>



</body>
</html>