<?php require_once('transection_sett_top.php');
 $memo= $_POST['memo'];
   	$gsess="select * from borno_school_receipt where borno_school_memo = '$memo' group by borno_school_memo";
 	$qterm=$mysqli->query($gsess);
	$shterm=$qterm->fetch_assoc();

	$receiptdate1=$shterm['borno_school_date'];
	$studClass=$shterm['borno_school_class_id'];
	$shiftId=$shterm['borno_school_shift_id'];    
	$section=$shterm['borno_school_section_id'];
	$gbalsess=$shterm['borno_school_session'];
	$gbalinfo=$shterm['borno_student_info_id'];
	$rollId=$shterm['borno_school_roll'];
    $receiptdate1=date("d-M-Y",strtotime($receiptdate1));

$gtClassName ="select * from borno_school_class where borno_school_class_id='$studClass'";
					$qgstClassName=$mysqli->query($gtClassName);
					$stClassName=$qgstClassName->fetch_assoc();
                    $fstClassName=$stClassName['borno_school_class_name'];

$gtshift ="select * from borno_school_shift where borno_school_shift_id=$shiftId";
					$qgstshifte=$mysqli->query($gtshift);
					$stgtshift=$qgstshifte->fetch_assoc();
                    $fstshift=$stgtshift['borno_school_shift_name'];

$gtsection = "select * from borno_school_section where  borno_school_section_id='$section'";
					$qgstsection=$mysqli->query($gtsection);
					$stgtsection=$qgstsection->fetch_assoc();
                    $fstsection=$stgtsection['borno_school_section_name'];
                    
$gname = "select * from borno_student_info where borno_student_info_id='$gbalinfo'";
					$qgstname=$mysqli->query($gname);
					$stgtname=$qgstname->fetch_assoc();
                    $stdname=$stgtname['borno_school_student_name'];                    
?>
<!DOCTYPE html>
<html>
<head>
    <title>:: [Student Transection]::</title>
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
	 document.frmcontent.action="show_money_receipt.php";
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
               <h3>Student Transection</h3>
            </div>
            <div class="log_out">
                <a href="../../logout.php"><img src="../../academic/assets/images/logout.jpg" class="img-fluid"></a>
            </div>
        </div><!-- Admin and logout part end -->

        <div class="ot_main_body">
            <div class="ot_body_fixed">
                <div class="default_heading">
                  <h2>Student Transection</h2></div>
                <div class="form">
                    <center>
                    	<form name="frmcontent" action="delete_money_receipt_do.php" method="post" enctype="multipart/form-data">
                        <?php
			$msg=$_GET['msg'];
			if($msg==1) { echo "Delete Success"; }
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
            <td class="text_table">Class *</td>
    <td><input type="text" name="class" id="class" value="<?php echo $fstClassName; ?>" size="30"></td>
  </tr>                         
  <tr>
            <td class="text_table">Shift *</td>
    <td><input type="text" name="shift" id="shift" value="<?php echo $fstshift; ?>" size="30"></td>
  </tr>                           
     <tr>
            <td class="text_table">Section *</td>
    <td><input type="text" name="section" id="section" value="<?php echo $fstsection; ?>" size="30"></td>
  </tr>  
       <tr>
            <td class="text_table">Session *</td>
    <td><input type="text" name="session" id="session" value="<?php echo $gbalsess; ?>" size="30"></td>
  </tr> 
  <tr>
            <td class="text_table">Student ID *</td>
    <td><input type="text" name="stdid" id="stdid" value="<?php echo $gbalinfo; ?>" size="30"></td>
  </tr> 
    <tr>
            <td class="text_table">Roll No *</td>
    <td><input type="text" name="roll" id="roll" value="<?php echo $rollId; ?>" size="30"></td>
  </tr> 
    <tr>
    <td class="text_table">Student Name *</td>
    <td><input type="text" name="name" id="name" value="<?php echo $stdname; ?>" size="30"></td>
  </tr> 
  <?php 
   	$gbal="select * from borno_school_receipt where borno_school_memo = '$memo'  order by borno_school_fund_id,borno_school_sub_fund_id asc";
 	$qgbal=$mysqli->query($gbal);
	while($shqgbal=$qgbal->fetch_assoc())
	{
    $gbalfund=$shqgbal['borno_school_fund_id'];
	$gbalsubfund=$shqgbal['borno_school_sub_fund_id'];
	$gbalfee=$shqgbal['borno_school_fee'];	 
	
    $gfund = "select * from borno_school_fund where borno_school_fund_id='$gbalfund'";
					$qgstfund=$mysqli->query($gfund);
					$stgtfund=$qgstfund->fetch_assoc();
                    $fundname1=$stgtfund['borno_school_fund_name']; 
                    $fundname=$fundname1;
                    
    if($gbalsubfund!=0)
    {
    $gsubfund = "select * from borno_school_sub_fund where  borno_school_sub_fund_id='$gbalsubfund'";
					$qgstsubfund=$mysqli->query($gsubfund);
					$stgtsubfund=$qgstsubfund->fetch_assoc();
                    $subfundname=$stgtsubfund['sub_fund_name'];   
                $fundname="$fundname1 $subfundname";
               
    }
    
   
     ?>
      

     <tr>
            <td class="text_table"><?php echo $fundname; ?></td>
    <td><input type="text" name="fees[]" id="fees[]" value="<?php echo $gbalfee; ?>" size="30"></td>
  </tr>
  
  <? } 
  
   $totalamount=0;		
$total = array();		
 $result2 ="select * from borno_school_receipt where borno_school_memo='$memo' order by borno_school_fund_id,borno_school_sub_fund_id asc";
					$qgstresult2=$mysqli->query($result2);
					while($row2=$qgstresult2->fetch_assoc()){
					  $total[]=$row2['borno_school_fee'];
                      $totalamount=array_sum($total);  
					    
					}
					?>
  
      <tr>
    <td class="text_table">Total Amount *</td>
    <td><input type="text" name="total" id="total" value="<?php echo $totalamount; ?>" size="30"></td>
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